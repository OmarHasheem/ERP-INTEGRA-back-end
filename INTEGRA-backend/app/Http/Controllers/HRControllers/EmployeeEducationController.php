<?php

namespace App\Http\Controllers\HRControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\HR\EmployeeEducationCollection;
use App\Http\Resources\HR\EmployeeEducationResource;
use App\Models\HR\EmployeeEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeEducationController extends Controller
{
    public function index() : EmployeeEducationCollection
    {
        return new EmployeeEducationCollection(EmployeeEducation::all());
    }

    public function show($id) : EmployeeEducationResource
    {
        $employeeEducation = EmployeeEducation::findOrFail($id);
        return new EmployeeEducationResource($employeeEducation);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'employee_id'    => 'required | numeric',
            'specialization' => 'required | alpha:ascii',
            'degree'         => 'required | alpha:ascii',
            'grantingBy'     => 'required | alpha:ascii',
            'graduationDate' => 'required | date',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        EmployeeEducation::create([
            'employee_id' => request('employeeId'),
            'specialization' => request('specialization'),
            'degree' => request('degree'),
            'grantingBy' => request('grantingBy'),
            'graduationDate' => request('graduationDate'),
        ]);

        return response()->json(["message" => "The process has been succeded"]);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'employee_id'    => 'required | numeric',
            'specialization' => 'required | alpha:ascii',
            'degree'         => 'required | alpha:ascii',
            'grantingBy'     => 'required | alpha:ascii',
            'graduationDate' => 'required | date',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        $employeeEducation = EmployeeEducation::findOrFail($id);

        request()->validate([
            'employee_id' => ['required'],
            'specialization' => ['required'],
            'degree' => ['required'],
            'grantingBy' => ['required'],
            'graduationDate' => ['required'],
        ]);

        $employeeEducation->update([
            'employee_id' => request('employeeId'),
            'specialization' => request('specialization'),
            'degree' => request('degree'),
            'grantingBy' => request('grantingBy'),
            'graduationDate' => request('graduationDate'),
        ]);

        return response()->json(["message" => "The process has been succeded"]);
    }

    public function destroy($id)
    {
        $employeeEducation = EmployeeEducation::findOrFail($id);
        $employeeEducation->delete();

        return response()->json(["message" => "The process has been succeded"]);
    }
}
