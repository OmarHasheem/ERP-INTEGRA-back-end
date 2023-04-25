<?php

namespace App\Http\Controllers\HRControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\HR\EmployeePerformanceCollection;
use App\Http\Resources\HR\EmployeePerformanceResource;
use App\Models\HR\EmployeePerformance;

class EmployeePerformanceController extends Controller
{
    public function index() : EmployeePerformanceCollection
    {
        return new EmployeePerformanceCollection(EmployeePerformance::all());
    }

    public function show($id) : EmployeePerformanceResource
    {
        $employeePerformance = EmployeePerformance::findOrFail($id);
        return new EmployeePerformanceResource($employeePerformance);
    }

    public function store()
    {
        request()->validate([
            'employee_id' => ['required'],
            'performanceRating' => ['required'],
            'comments' => ['required'],
            'reviewDate' => ['required'],
        ]);

        EmployeePerformance::create([
            'employee_id' => request('employeeId'),
            'performanceRating' => request('performanceRating'),
            'comments' => request('comments'),
            'reviewDate' => request('reviewDate'),
        ]);

        return response()->json(["message" => "The process has been succeded"]);
    }

    public function update($id)
    {
        $employeePerformance = EmployeePerformance::findOrFail($id);

        request()->validate([
            'employee_id' => ['required'],
            'performanceRating' => ['required'],
            'comments' => ['required'],
            'reviewDate' => ['required'],
        ]);

        $employeePerformance->update([
            'employee_id' => request('employeeId'),
            'performanceRating' => request('performanceRating'),
            'comments' => request('comments'),
            'reviewDate' => request('reviewDate'),
        ]);

        return response()->json(["message" => "The process has been succeded"]);
    }

    public function destroy($id)
    {
        $employeePerformance = EmployeePerformance::findOrFail($id);
        $employeePerformance->delete();

        return response()->json(["message" => "The process has been succeded"]);
    }
}
