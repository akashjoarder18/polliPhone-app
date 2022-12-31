<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outlet;

class OutletController extends Controller
{
    // Outlet Details
    public function index(){
        $outlet = Outlet::all();
        if(is_null($outlet)){
            return redirect()->back();
        }
        $data=[
            'title'=>'Outlet',
            'outlets'=>$outlet
        ];
        return view('admin.outlets.index',$data);
    }

    // Outlet register
    public function register(){        
        $url = '/admin/outlets/store';
        $title = 'Outlet Register';
        $data= compact('url','title');
        return view('admin.outlets.register')->with($data);
    }

    // Outlet store
    public function store(Request $request){
        $request->validate(
            [
                'outlet_name'=>'required',
                'address'=>'required'
            ]
        );

        $outlet = new Outlet;
        $outlet->outlet_name = $request['outlet_name'];
        $outlet->address = $request['address'];
        $outlet->save();
        return redirect('/admin/outlets');

    }

    // Outlet edit
    public function edit($id){
        $outlet = Outlet::find($id);
        if(is_null($outlet)){
            // outlet not found
            return redirect('/admin/outlets');
        }else {
            // outlet found
            $url = '/admin/outlets/update'.'/'.$id;
            $title = 'Outlet Edit';

            $data= compact('outlet','url','title');
            return view('admin.outlets.register')->with($data);

        }
    }

    // Outlet update
    public function update($id, Request $request){
        $outlet = Outlet::find($id);
        $outlet->outlet_name = $request['outlet_name'];
        $outlet->address = $request['address'];

        $outlet->save();

        return redirect('/admin/outlets');

    }

    // Outlet delete
    public function delete($id){
        $outlet = Outlet::find($id);
        if(!is_null($outlet)){
            $outlet->delete();
        }

        return redirect()->back();

    }
}
