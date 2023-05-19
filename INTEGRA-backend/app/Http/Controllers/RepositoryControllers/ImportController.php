<?php

namespace App\Http\Controllers\RepositoryControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\Repository\ImportCollection;
use App\Http\Resources\Repository\ImportResource;
use App\Models\Repository\Import;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImportController extends Controller
{
    public function index () : ImportCollection {
        return new ImportCollection(Import::all());
    }

    public function show($id) : ImportResource{
        return new ImportResource(Import::findOrFail($id));
    } 

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'         => 'required | alpha:regex:/^[a-zA-Z0-9\s]+$/',
            'date'         => 'required | date',
            'total_amount' => 'required | numeric',
            'supplier_id'  => 'required | numeric',
            'pdf_id'       => 'required | numeric',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        Import::create([
            'name'         => request('name'),
            'date'         => request('date'),
            'total_amount' => request('total_amount'),
            'supplier_id'  => request('supplier_id'),
            'pdf_id'       => request('pdf_id'),
        ]);

        return $this->success();
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name'         => 'required | alpha:regex:/^[a-zA-Z0-9\s]+$/',
            'date'         => 'required | date',
            'total_amount' => 'required | numeric',
            'supplier_id'  => 'required | numeric',
            'pdf_id'       => 'required | numeric',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        $import = Import::findOrFail($id);

        $import->name         = request('name');
        $import->date         = request('date');
        $import->total_amount = request('total_amount');
        $import->supplier_id  = request('supplier_id');
        $import->pdf_id       = request('pdf_id');

        if($import->isDirty(['name', 'date', 'total_amount', 'supplier_id', 'pdf_id'])){
            $import->save();
            return response()->json(['message' => 'im$import is updated']);
        }
        else {
            return response()->json(['message' => 'Nothing changed']);
        }
    }

    public function destroy($id) {
        $import = Import::findOrFail($id);
        $import->delete();

        return $this->success();
    }
}
