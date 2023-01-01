<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Product;
use App\Models\User;
use App\Models\Occasion;

class CampaignController extends Controller
{
    // Campaign Details
    public function index(){
        $campaigns = Campaign::leftjoin('products','campaigns.product_id','=','products.product_id')
        ->select(
            'campaigns.*',
            'products.product_name as productName',
            //'users.name as userName',
            )
        ->get();
        $data=[
            'title'=>'Campaigns',
            'campaigns'=>$campaigns
        ];
        return view('admin.campaigns.index',$data);
    }

    public function executives($id){
        $occasions = Occasion::leftjoin('campaigns','occasions.campaign_id','=','campaigns.campaign_id')
        ->leftjoin('users','occasions.user_id','=','users.id')
        ->where('occasions.campaign_id',$id)
        ->select(
            'occasions.occasion_id as id',
            'users.name as userName',
        )
        ->get();

        $data=[
            'title'=>'Campaigns',
            'executives'=>$occasions
        ];
        return view('admin.campaigns.executive',$data);

    }

    // Campaign register
    public function register(){  
        $products = Product::all();       
        $users = User::where('role','=',3)->get();      
        $url = '/admin/campaigns/store';
        $title = 'Campaign Register';
        $data= compact('url','title','products','users');
        return view('admin.campaigns.register')->with($data);
    }

    // Campaign store
    public function store(Request $request){
        
        $request->validate(
            [
                'campaign_name'=>'required',
                'product_id'=>'required|exists:products,product_id',
                'date'=>'required'
            ]
        );

        if(is_null($request['executives'])){
            return redirect()->back()->with('error','select marketing executive for occasion campaign!!');
        }

        
        $campaignExistWithProductInDate = Campaign::where('date',$request['date'])->where('product_id',$request['product_id'])->first();
        
        if(!is_null($campaignExistWithProductInDate)){
            return redirect()->back()->with('error','On same date already has been created campaign with same product, choose another product or another date');
        }

        $campaign = new Campaign;
        $campaign->campaign_name = $request['campaign_name'];
        $campaign->product_id = $request['product_id'];
        $campaign->date = $request['date'];
        $campaign->save();

        if(!is_null($request['executives'])){
            foreach($request['executives'] as $row){
                $occasion = new Occasion;
                $occasion->campaign_id = $campaign->campaign_id;
                $occasion->user_id = $row;
                $occasion->date = $request['date'];
                $occasion->save();
            }            
        }
        return redirect('/admin/campaigns');

    }

    // campaign edit
    public function edit($id){
        $products = Product::all();
        $users = User::where('role','=',3)->get();
        $campaign = Campaign::find($id);
        if(is_null($campaign)){
            // campaign not found
            return redirect('/admin/campaigns');
        }else {
            // campaign found
            $url = '/admin/campaigns/update'.'/'.$id;
            $title = 'Campaign Edit';
            $data= compact('campaign','url','title','products','users');
            return view('admin.campaigns.register')->with($data);

        }
    }

    // campaign update
    public function update($id, Request $request){
        $campaignExistWithProductsInDate = Campaign::where('date',$request['date'])->where('product_id',$request['product_id'])->where('campaign_id','!=',$id)->first();
        if(!is_null($campaignExistWithProductsInDate)){
            return redirect()->back()->with('error','Edit cearfully becouse on same date already has been created campaign with same product choose another product or another date');
        }
        $campaign = Campaign::find($id);
        $campaign->campaign_name = $request['campaign_name'];
        $campaign->product_id = $request['product_id'];
        $campaign->date = $request['date'];

        $campaign->save();

        return redirect('/admin/campaigns');

    }

    // campaign delete
    public function delete($id){
        $campaign = Campaign::find($id);
        if(!is_null($campaign)){
            $campaign->delete();
        }

        return redirect()->back();

    }
}
