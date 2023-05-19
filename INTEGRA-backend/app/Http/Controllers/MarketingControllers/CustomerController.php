<?php

namespace App\Http\Controllers\MarketingControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marketing\Customer;
use App\Http\Resources\Marketing\CustomerResource;
use App\Http\Resources\Marketing\CustomerCollection;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CustomerCollection(Customer::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'    => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'gender'  => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'age'     => 'required | numeric | max:99',
            'address' => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'email'   => 'required | email:rfc',
            'phone'   => 'required | numeric | max:9999999999 ',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        if(Customer::create ([

            'name'    => request('name') ,
            'gender'  => request('gender') ,
            'age'     => request('age') ,
            'address' => request('address') ,
            'email'   => request('email') ,
            'phone'   => request('phone') ,
        ]));

        return response()->json( ['message'=> 'customer has been created']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new CustomerResource(Customer::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {

        $validator = Validator::make($request->all(), [
            'name'    => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'gender'  => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'age'     => 'required | numeric | max:99',
            'address' => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'email'   => 'required | email:rfc',
            'phone'   => 'required | numeric | max:99999999999999 ',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        $customer = Customer::findOrFail($id);

        $customer->name    = request('name');
        $customer->gender  = request('gender');
        $customer->age     = request('age');
        $customer->address = request('address');
        $customer->email   = request('email');
        $customer->phone   = request('phone');


        if($customer->isDirty(['name' , 'gender' , 'age', 'address' , 'email' , 'phone'])){
            $customer->save();
            return response()->json(['message' => 'Customer is updated']);
        }

        else {
            return response()->json(['message' => 'Nothing changed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return response()->json(['message' => 'Customer  has been deleted']);
    }
}
