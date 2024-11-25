<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Testimonial};
use Validator;
use Yajra\DataTables\DataTables;
use Auth;
use Str;
use Schema;
use DB;
use Illuminate\Support\Arr;

class TestimonialController extends Controller
{
    public function index()
    {
      return view('admin.testimonial');
    }//end of method
    
    public function save(Request $request){
        $id = $request->id;
            $validator = Validator::make($request->all(),[
                'location'=>'required',
                'mail'=>'required',
                'contact'=>'required',
            ]);
        if($validator->passes()) {
                    
            $formdata['location'] = $request->location;
            $formdata['mail'] = $request->mail;
            $formdata['contact'] = $request->contact;
            

            if (!empty($id)) {
                $formdata['updated_by'] = Auth::user()->id;
                $row = Testimonial::where('id',$id)->update($formdata);
                $msg = 'Data Updated';
            }else{
                $formdata['added_by'] = Auth::user()->id;
                $row = Testimonial::insertGetId($formdata);
                $msg = 'Data Inserted';

            }
           
            if($row){
                return ['status_code' => 200 , 'message' =>$msg];
            }else{
                return ['status_code' => 201 , 'message' => "Something went wrong !"];
            }
        }    
        return ['message'=>$validator->errors()->all(),'status_code'=>301];      
    }//end of method


    public function show(Request $request){
        if ($request->ajax()) {
            $data = Testimonial::join('users','testimonials.user_id','=','users.id')->where(['testimonials.is_deleted'=>0])->orderBy('testimonials.id','DESC')->get(['users.name','users.email','testimonials.message','testimonials.designation','testimonials.id','testimonials.active_status']);
            return DataTables::of($data)
                    ->addIndexColumn()
                    


                    ->addColumn('status', function($row){
                        if ($row->active_status == 1) {
                           $btn = '<span class="badge badge-success" style="cursor:pointer;" onclick="status('.$row->id.',0)">Active</span>';
                        }else{
                           $btn = '<span class="badge badge-warning" style="cursor:pointer;" onclick="status('.$row->id.',1)">De-Active</span>';

                        }
                          
                            return $btn;
                    })
                    ->rawColumns(['status'])
                    ->make(true);
        }
    }//end of method

    public function edit(request $request){
        $data = Testimonial::where('id',$request->id)->first();
        // dd($data);
        if(empty($data)){
            return ['message'=>"Something went wrong !",'status_code'=>201];
        }else{
            return ['message'=>'Success !','status_code'=>200 , 'data' => $data];
        }

    }//end of method

    public function delete(Request $request){
        $data['is_deleted'] = 1;
        $formdata['deleted_by'] = Auth::user()->id;
        $row = Testimonial::where('id',$request->id)->update($data);

        if(empty($row)){
            return ['message'=>"Can't Delete!",'status_code'=>201];
        }else{
            return ['message'=>'Deleted !','status_code'=>200];
        }
    }//end of method


    public function status(Request $request){
        $data['active_status'] = $request->status;
        $data['updated_by'] = Auth::user()->id;
        $row = Testimonial::where('id',$request->id)->update($data);

        if(empty($row)){
            return ['message'=>"Can't Update Status!",'status_code'=>201];
        }else{
            return ['message'=>'Status Updated!','status_code'=>200];
        }
    }//end of method
}
