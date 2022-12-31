<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Outlet;

class BannerController extends Controller
{
    // Outlet Banner Details
    public function index(){
        $banner = Banner::join('outlets', 'outlets.outlet_id', '=', 'banners.outlet_id')
        ->where('banners.date', date('Y-m-d'))
        ->get(['banners.*', 'outlets.outlet_name']);
        if(is_null($banner)){
            return redirect()->back();
        }
        $data=[
            'title'=>'Banner',
            'banners'=>$banner
        ];
        return view('admin.banners.index',$data);
    }

    // Outlet Banner register
    public function register(){   
        $outlets = Outlet::all();     
        $url = '/admin/outlets/banners/store';
        $title = 'Outlet Banner Register';
        $data= compact('url','title','outlets');
        return view('admin.banners.register')->with($data);
    }

    // Outlet banner store
    public function store(Request $request){
        
        $request->validate(
            [
                'banner_name'=>'required',
                'outlet_id'=>'required',
                'date'=>'required',
            ]
        );
        $bannerExistWithOutletsInDate = Banner::where('date',$request['date'])->where('outlet_id',$request['outlet_id'])->first();
        if(!is_null($bannerExistWithOutletsInDate)){
            return redirect()->back()->with('error','On same date already has been created banner with this outlet choose another outlet or another date');
        }        
        $banner = new Banner;
        $banner->banner_name = $request['banner_name'];
        $banner->outlet_id = $request['outlet_id'];
        $banner->date = $request['date'];
        $banner->save();
        return redirect('/admin/outlets/banners');

    }

    // Outlet Banner edit
    public function edit($id){
        $outlets = Outlet::all();
        
        $banner = Banner::find($id);
        if(is_null($banner)){
            // outlet banner not found
            return redirect('/admin/outlets/banners');
        }else {
            // outlet banner found
            $url = '/admin/outlets/banners/update'.'/'.$id;
            $title = 'Outlet Banner Edit';

            $data= compact('banner','url','title','outlets');
            return view('admin.banners.register')->with($data);

        }
    }

    // Outlet banner update
    public function update($id, Request $request){
        $bannerExistWithOutletsInDate = Banner::where('date',$request['date'])->where('outlet_id',$request['outlet_id'])->where('banner_id','!=',$id)->first();
        if(!is_null($bannerExistWithOutletsInDate)){
            return redirect()->back()->with('error','Edit cearfully becouse on same date already has been created banner with this outlet choose another outlet or another date');
        }
        $banner = Banner::find($id);
        $banner->banner_name = $request['banner_name'];
        $banner->outlet_id = $request['outlet_id'];
        $banner->date = $request['date'];

        $banner->save();

        return redirect('/admin/outlets/banners');

    }

    // Outlet banner delete
    public function delete($id){
        $banner = Banner::find($id);
        if(!is_null($banner)){
            $banner->delete();
        }

        return redirect()->back();

    }
}
