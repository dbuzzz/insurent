<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use Auth;
use DB;
use App\Models\{User,Role,VendorCommision};

class DashboardController extends Controller
{
    public function index()
    {
      return view('admin.dashboard');
    }//end of method

    public function profile(request $request)
    {
       $data = User::query();
       if ($request->id) {
        $data = $data->where('users.id',$request->id);
       }else{
        $data = $data->where('users.id',Auth::user()->id);
       }
       $data = $data->leftjoin('vendor_commisions','users.id','=','vendor_commisions.user_id')->leftjoin('roles','roles.id','=','users.user_type')->leftjoin('categories','categories.id','=','vendor_commisions.cat_id')->groupBy('vendor_commisions.user_id')->first(['users.mobile','users.email','users.name','users.extra_info','users.extra_file','roles.name as role',DB::raw('GROUP_CONCAT(vendor_commisions.commision) as vendor_commision'),DB::raw('GROUP_CONCAT(categories.name) as category')]);

       $data['data'] = $data;
      $data['vendor_commision'] = !empty($data['data']->vendor_commision)?explode(',', $data['data']->vendor_commision):'';
      $data['category'] = !empty($data['data']->category)?explode(',', $data['data']->category):'';
      $data['extra_info'] = !empty($data['data']->extra_info)?json_decode($data['data']->extra_info,true):'';
      $data['extra_file'] = !empty($data['data']->extra_file)?json_decode($data['data']->extra_file,true):'';
      return view('admin.profile',$data);
    }//end of method

    public function basic_email($email = '',$token = '') {
      $data['data'] = array('name'=>"Ayusharogyam",'token'=>$token);
   
     $ms =  Mail::send('admin.mail', $data, function($message) {
         $message->to('harshsrivastava261@gmail.com', 'Tutorials Point')->subject
            ('Profile Verification Mail');
         $message->from('xyz@gmail.com','Ayusharogyam');
      });
      dd($ms);
      return true;
   }
}
