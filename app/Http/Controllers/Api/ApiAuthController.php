<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Validator;
use App\Models\User;
use App\Models\Userlog;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    public function login(Request $request){
        $data = $request->all();

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);        

        if ($validator->fails())
        {
            $error =  $validator->errors()->all();
            $this->arr['status'] = 0;
            $this->arr['message'] = $error;
            return Response::json($this->arr);
        } else {

            $user_info = User::where('email',$data['email'])->first();
            
            if(!is_null($user_info)){

                if (Hash::check($data['password'], $user_info->password)) {
                    
                    $isExists = Userlog::where("user_id", $user_info->id)->where("status", 1)->first();

                    if(!is_null($isExists)){
                        $this->arr["status"] = 1;
                        $this->arr["message"] = "You are already logged in.";
                        $this->arr["auth_token"] = $isExists->auth_token;
                        $this->arr["profile"] = $user_info;
                        return Response::json($this->arr);
                    } else {

                        // Generate oAuth Token
                        $oauth_token=$user_info->id . time() . $_SERVER["REMOTE_ADDR"];
                        $oauth_token=base64_encode(md5($oauth_token));

                        // Add Token
                        $userLog = new Userlog();
                        $userLog->auth_token=$oauth_token;
                        $userLog->user_id=$user_info->id;
                        $userLog->login_date=date("Y-m-d");
                        $userLog->status=1;

                        if ($userLog->save()) {
                            $this->arr["status"] = 1;
                            $this->arr["message"] = "login successfully.";
                            $this->arr["auth_token"] = $oauth_token;
                            $this->arr["profile"] = $user_info;
                            return Response::json($this->arr);
                        } else {
                            $this->arr["status"] = 1;
                            $this->arr["message"] = "Something went wrong. Please try again !";
                            return Response::json($this->arr);
                        }
                    }
                }else{
                    $this->arr['status'] = 0;
                    $this->arr['message'] = 'worng password!';
                    return Response::json($this->arr);
                }

            } else {
                $this->arr['status'] = 0;
                $this->arr['message'] = 'user not found!';
                return Response::json($this->arr);
            }

        }

    }

    public function logout(Request $request){

        $data = $request->input();
        $validator = Validator::make($request->all(), [
            'auth_token' => 'required',
        ]);

        if ($validator->fails())
        {
            $error =  $validator->errors()->all();
            $this->arr['status'] = 0;
            $this->arr['message'] = $error;
            return Response::json($this->arr);
        } else {

            $isUserLogEx = Userlog::where('auth_token', $data['auth_token'])->where('status',1)->first();
            if(!is_null($isUserLogEx)){
                Userlog::where('auth_token', $data['auth_token'])->update(['logout_date' => date('Y-m-d'),'status' => 0]);
                $this->arr['status'] = 1;
                $this->arr['message'] = "you are sucessfully logout!";
                return Response::json($this->arr);
            } else {
                $this->arr['status'] = 0;
                $this->arr['message'] = 'token not found try again!';
                return Response::json($this->arr);
            }
        }
    }
    public function b(){
        return 'hello';
    }
}
