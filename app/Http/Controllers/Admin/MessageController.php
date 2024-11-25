<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Messsage;
use DataTables;
use Validator;
use Auth;
use DB;
class MessageController extends Controller
{
    public function index(){
        $data['title'] = "Message";
        // $data['users'] = User::where(['is_deleted'=>0,'active_status'=>1])->get();
        $data['users'] = User::leftJoin('messsages','users.id','=','messsages.receiver_id')
        ->leftJoin('messsages as ct','users.id','=','ct.sender_id')
        ->where(['users.active_status'=>1,'users.is_deleted'=>0])
        ->where('users.id','!=',Auth::user()->id)
        ->groupBy('users.id')
        ->orderBy('created_at','DESC')
        ->get(['users.id','users.image','users.name','messsages.sender_id','messsages.receiver_id',
            DB::raw("(SELECT message FROM messsages AS mct WHERE  (mct.sender_id =users.id OR mct.receiver_id = users.id) AND (mct.sender_id =".Auth::user()->id." OR mct.receiver_id = ".Auth::user()->id.")  ORDER BY mct.id DESC LIMIT 1) AS message"),
            DB::raw("(SELECT ( CASE WHEN DATE_FORMAT(mct.created_at,'%Y-%m-%d ') = DATE_FORMAT(NOW(),'%Y-%m-%d') THEN DATE_FORMAT(mct.created_at,'%h:%i %p') ELSE DATE_FORMAT(mct.created_at,'%d %M %Y %H:%i %p') END) FROM messsages AS mct WHERE  (mct.sender_id =users.id OR mct.receiver_id = users.id) AND (mct.sender_id =".Auth::user()->id." OR mct.receiver_id = ".Auth::user()->id.")  ORDER BY mct.id DESC LIMIT 1) AS created_at"),
            DB::raw("(SELECT COUNT(id) FROM messsages as ct WHERE ct.is_seen=1 AND ct.sender_id = users.id AND ct.receiver_id = ".Auth::user()->id.") AS msg_count")]);

        return view('admin.message',$data);
        
    }//end of function

    public function show_chat($id){

        $data['title'] = "Message";
        $data['users'] = User::where(['is_deleted'=>0,'active_status'=>1,'id'=>$id])->first();
        $receiver_id = Auth::user()->id;
        Messsage::where(["receiver_id" => Auth::user()->id,'sender_id'=>$id])->update(['is_seen'=>2]);
        $response = User::join('messsages','users.id','=','messsages.sender_id');
        // $response = $response->where(['messsages.sender_id'=>$id,'messsages.receiver_id'=>$receiver_id]);
        // $response = $response->orWhereRaw('messsages.sender_id = '.$receiver_id.' AND messsages.receiver_id = '.$id);
        // $response = $response->where(['users.active_status'=>1,'users.is_deleted'=>0]);
        // $response = $response->where(['messsages.active_status'=>1,'messsages.is_deleted'=>0]);
        $response = $response->orWhereRaw(' ((
        `messsages`.`sender_id` = '.$id.' AND `messsages`.`receiver_id` = '.Auth::user()->id.'
    ) OR messsages.sender_id = '.Auth::user()->id.' AND messsages.receiver_id = '.$id.') AND(
        `users`.`active_status` = 1 AND `users`.`is_deleted` = 0
    ) AND(
        `messsages`.`active_status` = 1 AND `messsages`.`is_deleted` = 1
    )');
        // if($request->page_num and $request->limit_page) {
        //         $response = $response->limit($request->limit_page);
        //         $offset = ($request->page_num * $request->limit_page) - $request->limit_page;
        //         $response = $response->offset($offset);
        // }
        $response = $response->orderBy('messsages.id','ASC');
        $data['chat'] = $response->get(['messsages.sender_id','messsages.file','messsages.receiver_id','messsages.message','users.name',DB::raw("( CASE WHEN DATE_FORMAT(messsages.created_at,'%Y-%m-%d ') = DATE_FORMAT(NOW(),'%Y-%m-%d') THEN DATE_FORMAT(messsages.created_at,'%H:%i %p') ELSE DATE_FORMAT(messsages.created_at,'%d %M %Y %H:%i %p') END) AS created_date")]);
        // print_r($data['chat']);
        // die;
        return view('admin.chat_container',$data);
        
    }//end of function

    public function send_chat(Request $request){
             $validator = Validator::make($request->all(),[
             'message'=>'required',
            
            ]);
            if($validator->passes()) {
             $files =array();
             $formdata['sender_id'] = Auth::user()->id;
             $formdata['receiver_id'] = $request->id;
             $formdata['message'] = $request->message;
             if(!empty($request->file('file'))){
                foreach ($request->file('file') as $key => $value) {
                    
                    $filename = time().'.'.$value->getClientOriginalExtension(); 
                    $value->move(public_path('uploads/chats/'), $filename);
                    $files[$key] = $filename;
                    // print_r($value);
                    // print_r($files);
                    // die;
                }
            }

             $formdata['file'] = serialize($files);         
             $formdata['created_by'] = Auth::user()->id;
             $row = Messsage::insertGetId($formdata);
             $msg = "Added Successfully !";
             if($row){
                 return ['status_code' => 200 , 'message' => $msg];
             }else{
                 return ['status_code' => 201 , 'message' => "Something went wrong !"];
             }
            }    
         return ['message'=>$validator->errors()->all(),'status_code'=>301];      
    }//end of Function


    public static function getChatUsers(){
        $data = User::leftJoin('roles','users.role_id','=','roles.id')
        ->leftJoin('chats','users.id','=','chats.receiver_id')
        ->leftJoin('chats as ct','users.id','=','ct.sender_id')
        ->where(['users.active_status'=>1,'users.is_deleted'=>0])
        ->where('users.id','!=',Auth::user()->id)
        ->where('users.created_by',Auth::user()->created_by)
        ->groupBy('users.id')
        ->orderBy('ct.id','DESC')
        ->get(['users.id','roles.name as role','users.name',DB::raw('CONCAT("'.url('uploads').'","/",users.image) AS image'),'users.is_online','chats.sender_id','chats.receiver_id',
            DB::raw("( CASE WHEN chats.message IS NULL THEN ct.created_at ELSE chats.created_at END) AS created_at"),
            DB::raw("(SELECT message FROM chats AS mct WHERE  (mct.sender_id =users.id OR mct.receiver_id = users.id) AND (mct.sender_id =".Auth::user()->id." OR mct.receiver_id = ".Auth::user()->id.")  ORDER BY mct.id DESC LIMIT 1) AS message"),
            DB::raw("(SELECT COUNT(id) FROM chats as ct WHERE ct.is_seen=0 AND ct.sender_id = users.id AND ct.receiver_id = ".Auth::user()->id.") AS msg_count")]);
        return $data;
    }//end of method

    public static function getAllChats($request){ 
        // Chat::where("receiver_id" , Auth::user()->id)->update(['is_seen'=>1]);
        $receiver_id = Auth::user()->id;
        $response = User::join('chats','users.id','=','chats.sender_id');
        $response = $response->where(['chats.sender_id'=>$request->sender,'chats.receiver_id'=>$receiver_id]);
        $response = $response->orWhereRaw('chats.sender_id = '.$receiver_id.' AND chats.receiver_id = '.$request->sender);
        $response = $response->where(['users.active_status'=>1,'users.is_deleted'=>0]);
        $response = $response->where(['chats.active_status'=>1,'chats.is_deleted'=>0]);
        if($request->page_num and $request->limit_page) {
                $response = $response->limit($request->limit_page);
                $offset = ($request->page_num * $request->limit_page) - $request->limit_page;
                $response = $response->offset($offset);
        }
        $response = $response->orderBy('chats.id','DESC');
        $data = $response->get(['users.id','users.name',DB::raw('CONCAT("'.url('uploads').'","/",users.image) AS image'),'users.is_online','chats.message','chats.created_at',DB::raw("( CASE WHEN users.id = ".Auth::user()->id." THEN 1 ELSE 2 END) AS user_role"),DB::raw("( CASE WHEN DATE_FORMAT(chats.created_at,'%Y-%m-%d ') = DATE_FORMAT(NOW(),'%Y-%m-%d') THEN DATE_FORMAT(chats.created_at,'%H:%i %p') ELSE DATE_FORMAT(chats.created_at,'%d %M %Y %H:%i %p') END) AS created_date")]);
        if(count($data) > 0){
            return ($data->reverse()->values());
        }else{
            return false;
        }
    }//end of method

}
