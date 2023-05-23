<?php

namespace App\Http\Controllers\HRControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\HR\EmployeePerformanceCollection;
use App\Http\Resources\HR\EmployeePerformanceResource;
use App\Models\HR\EmployeePerformance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'employee_id'       => 'required | numeric',
            'performanceRating' => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'comments'          => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'reviewDate'        => 'required | date',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        EmployeePerformance::create([
            'employee_id' => request('employeeId'),
            'performanceRating' => request('performanceRating'),
            'comments' => request('comments'),
            'reviewDate' => request('reviewDate'),
        ]);

        return response()->json(["message" => "The process has been succeded"]);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'employee_id'       => 'required | numeric',
            'performanceRating' => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'comments'          => 'required | regex:/^[^\'"]+$/',
            'reviewDate'        => 'required | date',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

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
