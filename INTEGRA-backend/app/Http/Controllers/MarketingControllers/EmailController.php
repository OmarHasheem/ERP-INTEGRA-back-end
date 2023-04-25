<?php

namespace App\Http\Controllers\MarketingControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marketing\Email;
use App\Http\Resources\Marketing\EmailResource;
use App\Http\Resources\Marketing\EmailCollection;
use Illuminate\Support\Facades\Validator;



class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new EmailCollection(Email::all());
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
            'content' => 'required | alpha:ascii',
            'sender'  => 'required | alpha:ascii',
            'reciver' => 'required | alpha:ascii',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        if($email = Email::create ([
            'content' => request('content') ,
            'sender'  => request('sender') ,
            'reciver' => request('reciver') ,
        ]));

        return response()->json( ['message'=> 'email has been created']);
    }

    public function attach($id) {

        $email = Email::find($id)->leads()->attach(request('lead_id'));

        return response()->json( [ 'message' => 'Done' ]);

    }


    public function detach($id) {

        $email = Email::find($id)->leads()->detach(request('lead_id'));

        return response()->json( [ 'message' => 'Done' ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new EmailResource(Email::find($id));
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
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'content' => 'required | alpha:ascii',
            'sender'  => 'required | alpha:ascii',
            'reciver' => 'required | alpha:ascii',
            'expected_revenue' => 'required | numeric',
            'actual_revenue'   => 'required | numeric',
        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        $email = Email::findOrFail($id);

        $email->content = request('content');
        $email->sender = request('sender');
        $email->reciver = request('reciver');

        if($email->isDirty(['content' , 'sender' , 'reciver'])){
            $email->save();
            return response()->json( ['message' => 'Email is updated']);
        }

        else {
            return response()->json([ 'message' => 'Nothing changed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $email = Email::findOrFail($id);
        $email->delete();
        return response()->json(['message' => 'email ' . $email->name . " has been deleted"]);
    }
}
