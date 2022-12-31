<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiOAuth;
use Illuminate\Http\Request;
use Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Validator;
use App\Models\User;
use App\Models\Userlog;
use App\Models\Visit;
use App\Models\Occasion;
use App\Models\Psale;
use Illuminate\Support\Facades\Hash;

class ApiMarketingExecutiveController extends Controller
{
    public function createVisit(Request $request){

        $data = $request->all();

        $resData = ApiOAuth::check();

        if( $resData["status"] == 0 ) {
            $this->arr['status'] = 0;
            $this->arr["message"] = "Invalid token!";
            return Response::json($this->arr);
        }
        $user_id = $resData["user_id"];

        $validator = Validator::make($request->all(), [

            'in_time' => 'required',
            'out_time' => 'required',
            'outlet_id' => 'required|exists:outlets,outlet_id',

        ]);

        if ($validator->fails()){

            $error =  $validator->errors()->all();
            $this->arr['status'] = 0;
            $this->arr['message'] = $error;
            return Response::json($this->arr);
        } else {

            $visits = new Visit();
            $visits->user_id = $user_id;
            $visits->outlet_id = $data['outlet_id'];
            $visits->in_time = $data['in_time'];
            $visits->out_time = $data['out_time'];
            $visits->login_date = date('Y-m-d');
            $saved = $visits->save();

            if($saved){
                $this->arr['status'] = 1;
                $this->arr["message"] = "User visited successfully";
                return Response::json($this->arr);
            } else {
                $this->arr['status'] = 0;
                $this->arr["message"] = "visits data not created!";
                return Response::json($this->arr);
            }
        }

    }

    public function occasionList(){

        $resData = ApiOAuth::check();

        if( $resData["status"] == 0 ) {
            $this->arr['status'] = 0;
            $this->arr["message"] = "Invalid token!";
            return Response::json($this->arr);
        }
        $user_id = $resData["user_id"];
        $tubewell = array();
        // Get Data
        $occasion_info = Occasion::leftjoin('users','occasions.user_id','=','users.id')
            ->leftjoin('campaigns','occasions.campaign_id','=','campaigns.campaign_id')
            ->leftjoin('products','campaigns.product_id','=','products.product_id')
            ->where('occasions.date','>=',date('Y-m-d'))

            ->select(
                'users.name as userName',
                'campaigns.campaign_name as campaignName',
                'products.product_name as productName',
                'occasions.date as occationDate')
            ->orderBy('occasions.occasion_id', 'asc')
            ->get();        

        if(!is_null($occasion_info)){
            $this->arr['status'] = 1;
            $this->arr["message"] = "User occasion list found!";
            $this->arr["occasion"] = $occasion_info;
            return Response::json($this->arr);
        } else {
            $this->arr['status'] = 0;
            $this->arr["message"] = "User occasion list not found!";
            return Response::json($this->arr);
        }

    }

    public function productSale(Request $request){

        $data = $request->all();

        $resData = ApiOAuth::check();

        if( $resData["status"] == 0 ) {
            $this->arr['status'] = 0;
            $this->arr["message"] = "Invalid token!";
            return Response::json($this->arr);
        }
        $user_id = $resData["user_id"];

        $validator = Validator::make($request->all(), [
            'product_price' => 'required',
            'product_id' => 'required|exists:products,product_id',
            'campaign_id' => 'required|exists:campaigns,campaign_id',
        ]);

        if ($validator->fails()){

            $error =  $validator->errors()->all();
            $this->arr['status'] = 0;
            $this->arr['message'] = $error;
            return Response::json($this->arr);
        } else {

            $psales = new Psale();
            $psales->user_id = $user_id;
            $psales->product_id = $data['product_id'];
            $psales->campaign_id = $data['campaign_id'];
            $psales->product_price = $data['product_price'];
            $psales->date = date('Y-m-d');
            $saved = $psales->save();

            if($saved){
                $this->arr['status'] = 1;
                $this->arr["message"] = "User sale the product on occasion campaign successfully";
                return Response::json($this->arr);
            } else {
                $this->arr['status'] = 0;
                $this->arr["message"] = "User not to sale the product on occasion campaign!";
                return Response::json($this->arr);
            }
        }

    }
   
}
