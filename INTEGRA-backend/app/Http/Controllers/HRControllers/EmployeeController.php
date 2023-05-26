<?php

namespace App\Http\Controllers\HRControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\HR\EmployeeCollection;
use App\Http\Resources\HR\EmployeeResource;
use App\Models\HR\Employee;
use Illuminate\Http\Request;
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
        $employee = Employee::find($id);
        if($employee)
             return new EmployeeResource($employee);
        else 
             return $this->failure();
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
    public function update(Request $request, $id)
=======
    public function update(Request $request , $id)
>>>>>>> 79f768b69fe31d06176c0ff9f21327c8f556cc94
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
        
        $employee->firstName    = request('firstName');
        $employee->lastName     = request('lastName');
        $employee->dateOfBrith  = request('dateOfBrith');
        $employee->gender       = request('gender');
        $employee->address      = request('address');
        $employee->email        = request('email');
        $employee->phone        = request('phone');
        $employee->dateOfHire   = request('dateOfHire');
        $employee->salary       = request('salary');
        $employee->supervisorId = request('supervisorId');
        $employee->status       = request('status');
        $employee->departmentId = request('departmentId');

        if($employee->isDirty(['firstName' , 'lastName' ,  'dateOfBrith',  'gender',  'address',  'email',  'phone',  'dateOfHire',  'salary',  'supervisorId',  'status',  'departmentId'])){
            $employee->save();
            return $this->success();
        }
        else 
            return $this->failure();
    }

    public function destroy($id)
    {
        if( $employee = Employee::findOrFail($id)){
            $employee->delete();
            return $this->success();
        } 
        else
            return $this->failure();
    }

    public function attachBenefitToEmployee($id)
    {
        $benefitId         = request('benefitId');
        $enrollmentDate    = request('enrollmentDate');
        $coverageStartDate = request('coverageStartDate');
        $coverageEndDate   = request('coverageEndDate');

        $employee = Employee::findOrFail($id);
        if($employee->benefits()->attach($benefitId,
         [
            'enrollmentDate'    => $enrollmentDate,
            'coverageStartDate' => $coverageStartDate,
            'coverageEndDate'   => $coverageEndDate,
        ]))
            return $this->success();
        else
            return $this->failure();    

    }
}
