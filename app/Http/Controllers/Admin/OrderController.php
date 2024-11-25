<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Order,OrderDetail};
use Validator;
use Yajra\DataTables\DataTables;
use Auth;
use Str;
use Schema;
use DB;
use Illuminate\Support\Arr;

class OrderController extends Controller
{
    public function index()
    {
      return view('admin.order');
    }//end of method

    public function order_detail(Request $request)
    {
        $data['order'] = Order::where(['is_deleted'=>0,'active_status'=>0, 'id' =>$request->id])->first();

        $data['order_details'] = OrderDetail::join('products','products.id','=','order_details.prod_id')->join('users','users.id','=','products.added_by')->where(['products.is_deleted'=>0,'products.active_status'=>1, 'order_id' =>$request->id])->get(['products.name','users.name as username','order_details.variation','order_details.price','order_details.tax','order_details.shipping','order_details.coupon_discount','order_details.quantity','order_details.order_status','order_details.id']);
        // dd($data['order_details']);
      return view('admin.order_detail',$data);
    }//end of method



    public function show(Request $request){
        if ($request->ajax()) {
            $data = Order::where(['is_deleted'=>0,'active_status'=>0])->orderBy('id','DESC')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<ul class="orderDatatable_actions mb-0 d-flex flex-wrap" style="min-width:90px;justify-content:unset;"> ';
                           $btn .= '<li > <a href="'.route('order.order_detail',['id'=>$row->id]).'" class="edit" target="_blank"> <i class="fa fa-eye"></i></a> </li>';

                           
                           $btn .= '</ul>';
                            return $btn;
                    })

                    ->addColumn('info', function($row){
                        $btn = '';
                           $btn.= 'Order-id:-<span class="badge badge-success" style="cursor:pointer;">'.$row->id.'</span>';

                           $btn.= '<br>name:-<strong>'.$row->name.'</strong>';
                           $btn.= '<br>Email:-<strong>'.$row->email.'</strong>';
                           $btn.= '<br>Mobile:-<strong>'.$row->mobile.'</strong>';
                          
                            return $btn;
                    })

                    ->addColumn('location', function($row){
                           $btn = '';
                            $btn.= '<br>Country:-<strong>'.$row->country.'</strong>';
                           $btn.= '<br>State:-<strong>'.$row->state.'</strong>';
                           $btn.= '<br>City:-<strong>'.$row->city.'</strong>';
                           $btn.= '<br>Pincode:-<strong>'.$row->pincode.'</strong>';
                          
                            return $btn;
                    })

                    ->rawColumns(['info','location','action'])
                    ->make(true);
        }
    }//end of method

    public function order_status(Request $request){
        $data['order_status'] = $request->status;
        $data['updated_by'] = Auth::user()->id;
        $row = OrderDetail::where('id',$request->id)->update($data);

        if(empty($row)){
            return ['message'=>"Can't Update Status!",'status_code'=>201];
        }else{
            return ['message'=>'Status Updated!','status_code'=>200];
        }
    }//end of method

}
