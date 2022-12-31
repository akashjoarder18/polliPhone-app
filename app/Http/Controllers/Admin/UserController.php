<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // User Details
    public function index(){
        $users = User::all();
        $data=[
            'title'=>'Users',
            'users'=>$users
        ];
        return view('admin.users.index',$data);
    }

    // User register
    public function register(){        
        $url = '/admin/users/store';
        $title = 'Users Register';
        $data= compact('url','title');
        return view('admin.users.register')->with($data);
    }

    // user store
    public function store(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'password'=>'required',
                'role'=>'required',
                'gender'=>'required'
            ]
        );

        $user = new User;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->gender = $request['gender'];
        $user->role = $request['role'];
        $user->address = $request['address'];
        $user->status = 1;
        $user->password = \Hash::make($request['password']);
        $user->save();
        return redirect('/admin/users');

    }

    // user edit
    public function edit($id){
        $user = User::find($id);
        if(is_null($user)){
            // user not found
            return redirect('/admin/users');
        }else {
            // user found
            $url = '/admin/users/update'.'/'.$id;
            $title = 'User Edit';

            $data= compact('user','url','title');
            return view('admin.users.register')->with($data);

        }
    }

    // user update
    public function update($id, Request $request){
        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->role = $request['role'];
        $user->gender = $request['gender'];
        $user->address = $request['address'];

        $user->save();

        return redirect('/admin/users');

    }

    // user delete
    public function delete($id){
        $user = User::find($id);
        if(!is_null($user)){
            $user->delete();
        }

        return redirect()->back();

    }
}
