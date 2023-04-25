<?php

namespace App\Http\Controllers\HRControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\HR\EmployeeVacationCollection;
use App\Http\Resources\HR\EmployeeVacationResource;
use App\Models\HR\EmployeeVacation;

class EmployeeVacationController extends Controller
{
    public function index() : EmployeeVacationCollection
    {
        return new EmployeeVacationCollection(EmployeeVacation::all());
    }

    public function show($id) : EmployeeVacationResource
    {
        $employeeVacation = EmployeeVacation::findOrFail($id);
        return new EmployeeVacationResource($employeeVacation);
    }

    public function store()
    {
        request()->validate([
            'employee_id' => ['required'],
            'startDate' => ['required'],
            'endDate' => ['required'],
            'typeOfVacation' => ['required'],
            'reasonOfVacation' => ['required'],
            'status' => ['required'],
        ]);

        EmployeeVacation::create([
            'employee_id' => request('employeeId'),
            'startDate' => request('startDate'),
            'endDate' => request('endDate'),
            'typeOfVacation' => request('typeOfVacation'),
            'reasonOfVacation' => request('reasonOfVacation'),
            'status' => request('status'),
        ]);

        return $this->success();
    }

    public function update($id)
    {
        $employeeVacation = EmployeeVacation::findOrFail($id);

        request()->validate([
            'employee_id' => ['required'],
            'startDate' => ['required'],
            'endDate' => ['required'],
            'typeOfVacation' => ['required'],
            'reasonOfVacation' => ['required'],
            'status' => ['required'],
        ]);

        $employeeVacation->update([
            'employee_id' => request('employeeId'),
            'startDate' => request('startDate'),
            'endDate' => request('endDate'),
            'typeOfVacation' => request('typeOfVacation'),
            'reasonOfVacation' => request('reasonOfVacation'),
            'status' => request('status'),
        ]);

        return $this->success();
    }

    public function destroy($id)
    {
        $employeeVacation = EmployeeVacation::findOrFail($id);
        $employeeVacation->delete();

        return $this->success();
    }
}
