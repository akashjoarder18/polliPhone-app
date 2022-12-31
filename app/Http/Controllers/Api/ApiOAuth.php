<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Userlog;

class ApiOAuth extends Controller
{
    public static function check() {

        $res = array();
        $res["status"] = 0;
        if( !isset( $_SERVER["HTTP_AUTHORIZATION"] ) ) {
            return $res;
        }
        if( strlen( $_SERVER["HTTP_AUTHORIZATION"] ) < 7 ) {
            return $res;
        }
        $oauth_token = strip_tags($_SERVER["HTTP_AUTHORIZATION"]);

        //$oauth_token = substr($oauth_token, 7);

        $data = Userlog::where("status",1)->where("auth_token",$oauth_token)->first();
        if(!is_null($data)) {
            $res["status"] = 1;
            $res["id"] = $data->id;
            $res["user_id"] = $data->user_id;
        }
        return $res;
    }
}
