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
use Illuminate\Support\Facades\Hash;
use App\Models\Outlet;
use App\Models\Product;
use App\Models\Campaign;
use Auth;


class ApiListOfOuteletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resData = ApiOAuth::check();

        if( $resData["status"] == 0 ) {
            $this->arr['status'] = 0;
            $this->arr["message"] = "Invalid token!";
            return Response::json($this->arr);
        }
        $outlet = Outlet::all();

        if(!is_null($outlet)){
            $this->arr['status'] = 1;
            $this->arr["message"] = "Outlet list found!";
            $this->arr["outletList"] = $outlet;
            return Response::json($this->arr);
        } else {
            $this->arr['status'] = 0;
            $this->arr["message"] = "Outlet list not found!";
            return Response::json($this->arr);
        }
    }

    public function productList(Request $request)
    {
        $resData = ApiOAuth::check();

        if( $resData["status"] == 0 ) {
            $this->arr['status'] = 0;
            $this->arr["message"] = "Invalid token!";
            return Response::json($this->arr);
        }
        $product = Product::all();

        if(!is_null($product)){
            $this->arr['status'] = 1;
            $this->arr["message"] = "Product list found!";
            $this->arr["productList"] = $product;
            return Response::json($this->arr);
        } else {
            $this->arr['status'] = 0;
            $this->arr["message"] = "Product list not found!";
            return Response::json($this->arr);
        }
    }

    public function campaignList(Request $request)
    {
        $resData = ApiOAuth::check();

        if( $resData["status"] == 0 ) {
            $this->arr['status'] = 0;
            $this->arr["message"] = "Invalid token!";
            return Response::json($this->arr);
        }
        $campaign = Campaign::all();

        if(!is_null($campaign)){
            $this->arr['status'] = 1;
            $this->arr["message"] = "Campaign list found!";
            $this->arr["campaignList"] = $campaign;
            return Response::json($this->arr);
        } else {
            $this->arr['status'] = 0;
            $this->arr["message"] = "Campaign list not found!";
            return Response::json($this->arr);
        }
    }

    
}
