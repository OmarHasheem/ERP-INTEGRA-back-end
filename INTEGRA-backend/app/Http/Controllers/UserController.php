<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserManagement\UserResource;
use App\Http\Resources\UserManagement\UserCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return new UserCollection(User::all());
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'fullName'    => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'username'    => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'email'       => 'required | email:rfc',
            'password'    => 'required',
            'employee_id' => 'required | numeric',

        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        if (User::create ([

            'fullName'    => request('fullName') ,
            'username'    => request('username') ,
            'email'       => request('email') ,
            'password'    => Hash::make(request('password')) ,
            'employee_id' => request('employee_id') ,


        ]))

            return $this->success();
        else
            return $this->failure();
    }

    public function show($id) : UserResource
    {
        $user = User::find($id);

        if($user)
            return new UserResource($user);
        else
            return $this->failure();
    }

    public function update(Request $request,  $id)
    {

        $validator = Validator::make($request->all(), [
            'fullName'    => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'username'    => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'email'       => 'required | email:rfc',
            'password'    => 'required',
            'employee_id' => 'required | numeric',

        ]);

        if ($validator->fails()) {
            return  $validator->errors();
        }

        $user = User::findOrFail($id);

        $user->fullName    = request('fullName');
        $user->username    = request('username');
        $user->email       = request('email');
        $user->password    = Hash::make(request('password'));
        $user->employee_id = request('employee_id');

        if($user->isDirty(['fullName' , 'username' , 'email' , 'password' , 'employee_id' ])){
            $user->save();
            return $this->success();
        }
        else
            return $this->failure();

    }

    public function destroy($id)
    {
        if( $user = User::findOrFail($id)) {
            $user->delete();
            return $this->success();
        }
        else
            return $this->failure();
    }

}
