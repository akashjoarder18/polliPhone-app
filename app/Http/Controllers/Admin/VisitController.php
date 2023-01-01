<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Visit;
use App\Models\Psale;
use App\Models\Campaign;

class VisitController extends Controller
{
    // Executive visit Details

    public function index(Request $request){
        $search = $request['search'];
        if(!is_null($search)){
            $visits = Visit::leftjoin('users','visits.user_id','=','users.id')
            ->leftjoin('outlets','visits.outlet_id','=','outlets.outlet_id')
            ->leftjoin('banners','outlets.outlet_id','=','banners.outlet_id')
            ->where("users.name","like","%".$search."%")
            ->orWhere("outlets.outlet_name","like","%".$search."%")
            ->orWhere("outlets.address","like","%".$search."%")
            ->orWhere("banners.banner_name","like","%".$search."%")
            ->select(
                'visits.*',
                'users.name as userName',
                'outlets.outlet_name as outletName',
                'outlets.address as outletAddress',
                'banners.banner_name as bannerName',
                )
            ->orderBy('visits.visit_id', 'desc')
            ->get(); 
        }else{
            $visits = Visit::leftjoin('users','visits.user_id','=','users.id')
            ->leftjoin('outlets','visits.outlet_id','=','outlets.outlet_id')
            ->leftjoin('banners','outlets.outlet_id','=','banners.outlet_id')            
            ->select(
                'visits.*',
                'users.name as userName',
                'outlets.outlet_name as outletName',
                'outlets.address as outletAddress',
                'banners.banner_name as bannerName',
                )            
            ->orderBy('visits.visit_id', 'desc')
            ->get(); 
        }
        
        $data=[
            'title'=>'Visits',
            'visits'=>$visits
        ];
        return view('admin.visits.index',$data);
    }

    // Executive visit Details

    public function productSale(Request $request){
        $search = $request['search'];
        if(!is_null($search)){
            $psales = Psale::leftjoin('users','psales.user_id','=','users.id')
            ->leftjoin('products','psales.product_id','=','products.product_id')
            ->leftjoin('campaigns','psales.campaign_id','=','campaigns.campaign_id')
            ->where("users.name","like","%".$search."%")
            ->orWhere("products.product_name","like","%".$search."%")
            ->orWhere("campaigns.campaign_name","like","%".$search."%")
            ->select(
                'psales.*',
                'users.name as userName',
                'products.product_name as productName',
                'campaigns.campaign_name as campaignName',
                )
            ->orderBy('psales.psale_id', 'desc')
            ->get(); 
        }else{
            $psales = Psale::leftjoin('users','psales.user_id','=','users.id')
            ->leftjoin('products','psales.product_id','=','products.product_id')
            ->leftjoin('campaigns','psales.campaign_id','=','campaigns.campaign_id')           
            ->select(
                'psales.*',
                'users.name as userName',
                'products.product_name as productName',
                'campaigns.campaign_name as campaignName',
                )            
            ->orderBy('psales.psale_id', 'desc')
            ->get(); 
        }
        $data=[
            'title'=>'Psales',
            'psales'=>$psales
        ];
        return view('admin.psales.index',$data);
    }

    

    
    
}
