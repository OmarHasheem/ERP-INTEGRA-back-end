<?php

namespace App\Http\Controllers\HRControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\HR\EmployeeCertificateCollection;
use App\Http\Resources\HR\EmployeeCertificateResource;
use App\Models\HR\EmployeeCertificate;
use Illuminate\Support\Facades\Validator;

class EmployeeCertificateController extends Controller
{
    public function index() : EmployeeCertificateCollection
    {
        return new EmployeeCertificateCollection(EmployeeCertificate::all());
    }

    public function show($id) : EmployeeCertificateResource
    {
        $employeeCertificate = EmployeeCertificate::findOrFail($id);
        return new EmployeeCertificateResource($employeeCertificate);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'employee_id' => 'required | numeric',
            'name'        => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'level'       => 'required | regex:/^[a-zA-Z0-9\s]+$/',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        EmployeeCertificate::create([
            'employee_id' => request('employeeId'),
            'name' => request('name'),
            'level' => request('level'),
        ]);

        return response()->json(["message" => "The process has been succeded"]);
    }

    public function update(Request $request , $id)
    {

        $validator = Validator::make($request->all(), [
            'employee_id' => 'required | numeric',
            'name'        => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'level'       => 'required | regex:/^[a-zA-Z0-9\s]+$/',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        $employeeCertificate = EmployeeCertificate::findOrFail($id);

        request()->validate([
            'employee_id' => ['required'],
            'name' => ['required'],
            'level' => ['required'],
        ]);

        $employeeCertificate->update([
            'employee_id' => request('employeeId'),
            'name' => request('name'),
            'level' => request('level'),
        ]);

        return response()->json(["message" => "The process has been succeded"]);
    }

    public function destroy($id)
    {
        $employeeCertificate = EmployeeCertificate::findOrFail($id);
        $employeeCertificate->delete();

        return response()->json(["message" => "The process has been succeded"]);
    }
}
