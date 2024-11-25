<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\{User,Address};
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;

class UserLoginController extends Controller
{

     public function login_user(Request $request){
        $validated = Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required',
        ]);
        if($validated->passes()){
            if(Auth::attempt(['email'=>$request->email , 'password' => $request->password])){
                if((Auth::user()->user_type == 4) and Auth::user()->is_deleted == 0){
                    return response()->json(['status_code'=>200]);
                }else{
                    return response()->json(['status_code'=>201 , 'message' => 'Account Does not Exist Or Deleted']);
                }
            }else{
                return response()->json(['status_code'=>201 , 'message' => 'Wrong Username or Password']);
            }
        }else{
            return response()->json(['status'=>'error','status_code'=>202,'error' => $validated->errors()->all() ]);
        }
    }//end of method

    public function SignUpuser(Request $request){
        if (!empty($request->id)) {
            $validated = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|regex:/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/|unique:users,email,'.$request->id.'',
            'confirm_password'=>'required_with:password|same:password',
            'mobile' => 'required|numeric|digits:10|regex:/^[6-9]{1}[0-9]{9}$/', 
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'pincode'=>'required',
            'address'=>'required',
            ]);
        }else{
            $validated = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|regex:/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/|unique:users',
            'password'=>'required|min:8',
            'confirm_password'=>'required_with:password|same:password',
            'mobile' => 'required|numeric|digits:10|regex:/^[6-9]{1}[0-9]{9}$/|unique:users', 
           ]);
        }
        if($validated->passes()){
            $formdata['name'] = $request->name;
            $formdata['email'] = $request->email;
            $formdata['password'] = bcrypt($request->password);
            $formdata['mobile'] =$request->mobile;
            $formdata['user_type'] =4;
            $formdata['active_status'] =0;
            $formdata['password_reset_token'] =rand(10,10000);
            $body = array(
                'secret' => 'e136e8df711eb3e9ccea28c6037cfd747aef3a4a',
                'account' => '90',
                'recipient' => '+91'.$request->mobile,
                'type' => 'text',
                'message' => 'OTP For Signup Is '.$formdata['password_reset_token'],
                );
                $client = new Client();
                $res = $client->request('POST', 'https://smsbulk.net/api/send/whatsapp',['form_params' => $body]);

            if (!empty($request->id)) {
                $addressdata['country'] =$request->country;
                $addressdata['user_id'] =$request->id;
                $addressdata['state'] =$request->state;
                $addressdata['city'] =$request->city;
                $addressdata['pincode'] =$request->pincode;
                $addressdata['address'] =$request->address;
                if ($request->address_id) {
                    $res = Address::where('id',$request->address_id)->update($addressdata);
                }else{
                    $res = Address::insertGetId($addressdata);
                }
                $res = User::where('id',$request->id)->update($formdata);
            }else{
                $res = User::insertGetId($formdata);

            }
            if($res){
                return response()->json(['status'=>'sucess','status_code'=>200,'message'=>'Sign Up successfully!','id'=>$res]);
             }else{
                return response()->json(['status'=>'error','status_code'=>201,'message'=>"Can't Signup !"]);
            }
        }else{
                return response()->json(['status'=>'error','status_code'=>202,'error' => $validated->errors()->all() ]);
        }
    }

    public function verify_otp(Request $request){

            $validated = Validator::make($request->all(),[
            'otp'=>'required',
            ]);
           
        if($validated->passes()){
            $data =User::where('id',$request->id)->first();
            if ($data->password_reset_token == $request->otp) {
                $res = User::where('id',$request->id)->update(['active_status'=>1,'password_reset_token'=>null]);
                $body = array(
                'secret' => 'e136e8df711eb3e9ccea28c6037cfd747aef3a4a',
                'account' => '90',
                'recipient' => '+91'.$request->mobile,
                'type' => 'text',
                'message' => 'Welcome to Insurent',
                );
                $client = new Client();
                $res = $client->request('POST', 'https://smsbulk.net/api/send/whatsapp',['form_params' => $body]);
            }else{
                $res = 0;
            }
            
            

            
            if($res){
                return response()->json(['status'=>'sucess','status_code'=>200,'id'=>$res,'message'=>'Sign Up successfully!']);
             }else{
                return response()->json(['status'=>'error','status_code'=>201,'message'=>"Otp Does Not Match"]);
            }
        }else{
                return response()->json(['status'=>'error','status_code'=>202,'error' => $validated->errors()->all() ]);
        }
    }

     public function logout(){
        Auth::logout();
        return redirect("/");
    }
}
