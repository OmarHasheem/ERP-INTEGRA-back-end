<?php

namespace App\Http\Controllers\HRControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\HR\EmployeeCollection;
use App\Http\Resources\HR\EmployeeResource;
use App\Models\HR\Employee;
<<<<<<< HEAD
=======
use Illuminate\Http\Request;
>>>>>>> 69fa921c485ba7180d0f275486482a80fc772c95
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    //

    public function index() : EmployeeCollection
    {
        return new EmployeeCollection(Employee::all());
    }

    public function show($id) : EmployeeResource
    {
        $employee = Employee::findOrFail($id);
        return new EmployeeResource($employee);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'firstName'    => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'lastName'     => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'dateOfBrith'  => 'required | date',
            'gender'       => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'address'      => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'email'        => 'required | email',
            'phone'        => 'required | numeric',
            'dateOfHire'   => 'required | date',
            'salary'       => 'required | numeric',
            'supervisorId' => 'required | numeric',
            'status'       => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'departmentId' => 'required | numeric',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        Employee::create([
            'firstName' => request('firstName'),
            'lastName' => request('lastName'),
            'dateOfBrith' => request('dateOfBrith'),
            'gender' => request('gender'),
            'address' => request('address'),
            'email' => request('email'),
            'phone' => request('phone'),
            'dateOfHire' => request('dateOfHire'),
            'salary' => request('salary'),
            'supervisorId' => request('supervisorId'),
            'status' => request('status'),
            'departmentId' => request('departmentId'),
        ]);

        return response()->json(["message" => "The process has been succeded"]);
    }

<<<<<<< HEAD
    public function update(Request $request , $id)
=======
    public function update(Request $request, $id)
>>>>>>> 69fa921c485ba7180d0f275486482a80fc772c95
    {

        $validator = Validator::make($request->all(), [
            'firstName'    => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'lastName'     => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'dateOfBrith'  => 'required | date',
            'gender'       => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'address'      => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'email'        => 'required | email',
            'phone'        => 'required | numeric',
            'dateOfHire'   => 'required | date',
            'salary'       => 'required | numeric',
            'supervisorId' => 'required | numeric',
            'status'       => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'departmentId' => 'required | numeric',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        $employee = Employee::findOrFail($id);

        request()->validate([
            'firstName' => ['required'],
            'lastName' => ['required'],
            'dateOfBrith' => ['required'],
            'gender' => ['required'],
            'address' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'dateOfHire' => ['required'],
            'salary' => ['required'],
            'supervisorId' => ['required'],
            'status' => ['required'],
            'departmentId' => ['required'],
        ]);

        $employee->update([
            'firstName' => request('firstName'),
            'lastName' => request('lastName'),
            'dateOfBrith' => request('dateOfBrith'),
            'gender' => request('gender'),
            'address' => request('address'),
            'email' => request('email'),
            'phone' => request('phone'),
            'dateOfHire' => request('dateOfHire'),
            'salary' => request('salary'),
            'supervisorId' => request('supervisorId'),
            'status' => request('status'),
            'departmentId' => request('departmentId'),
        ]);

        return response()->json(["message" => "The process has been succeded"]);
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response()->json(["message" => "The process has been succeded"]);
    }

    public function attachBenefitToEmployee($id)
    {
        $benefitId = request('benefitId');
        $enrollmentDate = request('enrollmentDate');
        $coverageStartDate = request('coverageStartDate');
        $coverageEndDate = request('coverageEndDate');

        $employee = Employee::findOrFail($id);
        $employee->benefits()->attach($benefitId,
         [
            'enrollmentDate' => $enrollmentDate,
            'coverageStartDate' => $coverageStartDate,
            'coverageEndDate' => $coverageEndDate,
        ]);

        return response()->json(["message" => "The process has been succeded"]);
    }
}
