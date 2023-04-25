<?php

namespace App\Http\Controllers\HRControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\HR\EmployeeCertificateCollection;
use App\Http\Resources\HR\EmployeeCertificateResource;
use App\Models\HR\EmployeeCertificate;

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

    public function store()
    {
        request()->validate([
            'employee_id' => ['required'],
            'name' => ['required'],
            'level' => ['required'],
        ]);

        EmployeeCertificate::create([
            'employee_id' => request('employeeId'),
            'name' => request('name'),
            'level' => request('level'),
        ]);

        return response()->json(["message" => "The process has been succeded"]);
    }

    public function update($id)
    {
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
