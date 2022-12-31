<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // profile deshborard
    public function dashboard(){
        $data=[
            'title'=>'Dashboard'
        ];
        return view('admin.dashboard',$data);
    }
    // // profile logout
    public function logout(){
        auth()->logout();
        return redirect()->route('getLogin')->with('success','You have been successfully logged out');
    }
}
