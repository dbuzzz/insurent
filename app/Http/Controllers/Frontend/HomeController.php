<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Brand,Category,SubCategory,Product,Contact,HomePage,NewsLetter,ContactUsPage,GenralPage,Address,User,EclinicPage,DoctorCategory,DoctorInfo,DoctorReview,Coupon,CouponUsed,ProductVariant,Blog,BlogCategory,Wishlist,Order,OrderDetail,Leads,Ponter,Community,CommunityChat,Testimonial};
use Validator;
use Auth;
use Str;
use Schema;
use DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use Share;

class HomeController extends Controller
{
    public function index()
    {
      $data['title'] = 'Home';
      $data['testimonial'] = Testimonial::join('users','testimonials.user_id','=','users.id')->where(['testimonials.is_deleted'=>0,'testimonials.active_status'=>1])->orderBy('testimonials.id','DESC')->get(['users.name','users.image','users.email','testimonials.message','testimonials.designation','testimonials.id','testimonials.active_status']);
      return view('frontend.home',$data);
    }//end of method

    public function contact(Request $request)
    {
      $data['title'] = 'Contact-US';
      return view('frontend.contact_us',$data);
    }//end of method

    public function user_testimonial(Request $request)
    {
      $data['title'] = 'Testimonial';
      return view('frontend.testimonial',$data);
    }//end of method

    public function send_whatsapp(Request $request)
    {
      $data['title'] = 'Whatsapp';
      return view('frontend.whatsapp',$data);
    }//end of method
    public function forget_password(Request $request)
        {
          $data['title'] = 'Forget Password';
          return view('frontend.forger_password',$data);
        }//end of method

    public function about(Request $request)
    {
      $data['title'] = 'About-US';
      return view('frontend.about',$data);
    }//end of method

    public function Community(Request $request)
    {
        $data['community'] = Community::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['title'] = 'Community';
      return view('frontend.community',$data);
    }//end of method

    public function user_opt_verify($id)
    {
      $data['title'] = 'OTP Verification';
      $data['id'] = $id;
      
      return view('frontend.otpverify',$data);
    }//end of method

    public function communityChat(Request $request)
    {
        $data['CommunityChat'] = CommunityChat::where(['is_deleted'=>0,'active_status'=>1,'community_id'=>$request->id])->get();
        $data['community'] = Community::where(['is_deleted'=>0,'active_status'=>1,'id'=>$request->id])->first();

        $receiver_id = Auth::user()->id;
        $response = User::join('community_chats','users.id','=','community_chats.user_id');
      
        $response = $response->where('community_id',$request->id);
        
        $response = $response->orderBy('community_chats.id','ASC');
        $data['chat'] = $response->get(['community_chats.user_id','community_chats.message','users.name',DB::raw("( CASE WHEN DATE_FORMAT(community_chats.created_at,'%Y-%m-%d ') = DATE_FORMAT(NOW(),'%Y-%m-%d') THEN DATE_FORMAT(community_chats.created_at,'%H:%i %p') ELSE DATE_FORMAT(community_chats.created_at,'%d %M %Y %H:%i %p') END) AS created_date")]);
        // dd($data['chat']);
        

      $data['title'] = 'Community';
      return view('frontend.community_chat',$data);
    }//end of method

    public function show_comm_chat($id){

        $data['title'] = "Message";
        $data['users'] = User::where(['is_deleted'=>0,'active_status'=>1,'id'=>$id])->first();
        $receiver_id = Auth::user()->id;
        $response = User::join('community_chats','users.id','=','community_chats.user_id');
      
        $response = $response->where('community_id',$id);
        
        $response = $response->orderBy('community_chats.id','ASC');
        $data['chat'] = $response->get(['community_chats.user_id','community_chats.message','users.name',DB::raw("( CASE WHEN DATE_FORMAT(community_chats.created_at,'%Y-%m-%d ') = DATE_FORMAT(NOW(),'%Y-%m-%d') THEN DATE_FORMAT(community_chats.created_at,'%H:%i %p') ELSE DATE_FORMAT(community_chats.created_at,'%d %M %Y %H:%i %p') END) AS created_date")]);
        return view('frontend.chat_container',$data);
        
    }//end of function

    public function report(Request $request)
    {
      $data['pointer'] = Ponter::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['lead'] = Leads::where(['is_deleted'=>0,'active_status'=>1,'id'=>$request->id])->first();
      $data['title'] = 'Report';
      return view('admin.report',$data);
    }//end of method

    public function report_graph(Request $request)
    {
      $data['pointer'] = Ponter::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['lead'] = Leads::where(['is_deleted'=>0,'active_status'=>1,'id'=>$request->id])->first();
      $data['title'] = 'Report';
      return view('admin.report_graph',$data);
    }//end of method

    public function form(Request $request)
    {
      $data['title'] = 'Form';
      if ($request->insurance == 1) {
          return view('frontend.form',$data);
      }else if ($request->insurance == 3) {
          return view('frontend.form2',$data);
      }else{
        return view('frontend.form3',$data);

      }
      
    }//end of method

    public function getmenu()
    {
      $resp = array();
      $data['brand'] = Brand::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['category'] = Category::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['sub_cat'] = SubCategory::where(['is_deleted'=>0,'active_status'=>1])->orderBy('id','DESC')->limit(5)->get();
      foreach ($data['category'] as $key => $value) {
        $cat['cat'][$key] = $value->name;
        $resp[$key]['cat_name']= $value->name;
        $resp[$key]['cat_id']= $value->id;
        $resp[$key]['sub_cat']= SubCategory::where(['is_deleted'=>0,'active_status'=>1,'cat_id'=>$value->id])->get()->toArray();
      }
      $data['menu_cat'] = $resp;
      $data['genral_page'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      return $data;
    }//end of method

    public function save_form(Request $request){
       $couponData['user_id'] = Auth::user()->id;
        $couponData['email'] = $request->email;
        $couponData['phone'] = $request->phone;
        $couponData['insurance'] = $request->insurance;
        $couponData['json'] = json_encode($request->all());
        Leads::insertGetId($couponData);
        return true;

            if($wishlist){

                    return response()->json(['status'=>1,'count'=>count($count)]);  
            }else{
                
                    return response()->json(['status' => 3]);
            }
    }


    public function product_list(Request $request)
    {
        $per_page = 10;
        $data['genral_pages'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      $data['title'] = 'ProductList';
      $data['home_category'] = Category::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['home_sub_category'] = SubCategory::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['home_brand'] = Brand::where(['is_deleted'=>0,'active_status'=>1])->get();
      $datas = Product::query();
            $datas = $datas->join('product_images','product_images.prd_id','=','products.id')->join('categories','categories.id','=','products.cat_id')->join('sub_categories','sub_categories.id','=','products.sub_cat_id')->join('brands','brands.id','=','products.brand_id')->join('users','users.id','=','products.added_by')->where(['products.is_deleted'=>0,'products.active_status'=>1,'users.is_deleted'=>0,'users.active_status'=>1,'categories.is_deleted'=>0,'categories.active_status'=>1,'sub_categories.is_deleted'=>0,'sub_categories.active_status'=>1,'brands.is_deleted'=>0,'brands.active_status'=>1]);
      if ($request->cat_id) {
            $datas = $datas->where(['products.cat_id'=>$request->cat_id]);
      }else if(!empty($request->sub_cat_id)){
            $datas = $datas->where(['products.sub_cat_id'=>$request->sub_cat_id]);
      }else if(!empty($request->brand)){
            $datas = $datas->where(['products.brand_id'=>$request->brand]);
      }
       if(@$request->page){
            $datas = $datas->limit($per_page);
            $offset = ($request->page * $per_page) - $per_page;
            $datas = $datas->offset($offset);
        }else{
            $datas = $datas->limit($per_page);
        }

      if(!empty($request->search)){
            $datas = $datas->whereRaw('(products.name LIKE "%'.$request->search.'%" or products.description LIKE "%'.$request->search.'%")');
      }
      // if(!empty($request->page)){
      //       // $count = $count->whereRaw('(products.name LIKE "%'.$request->search.'%" or products.description LIKE "%'.$request->search.'%")');
      // }else{
      //       $data = $data->limit(1)->offset(1);
      // }

      $datas = $datas->groupBy('product_images.prd_id')->orderBy('products.id','DESC')->get(['products.name','products.id','products.description','products.tag','products.image','products.active_status','products.qty','products.mrp','products.price','products.stock_warning','products.is_return','products.best_selling','products.sale','products.brand_id','products.sub_cat_id','products.cat_id','products.tax_id','brands.name as brand','categories.name as category','sub_categories.name as sub_category',DB::raw('GROUP_CONCAT(path) as path')]);


      // for count

      $count = Product::query();
            $count = $count->join('product_images','product_images.prd_id','=','products.id')->join('categories','categories.id','=','products.cat_id')->join('sub_categories','sub_categories.id','=','products.sub_cat_id')->join('brands','brands.id','=','products.brand_id')->join('users','users.id','=','products.added_by')->where(['products.is_deleted'=>0,'products.active_status'=>1,'users.is_deleted'=>0,'users.active_status'=>1,'categories.is_deleted'=>0,'categories.active_status'=>1,'sub_categories.is_deleted'=>0,'sub_categories.active_status'=>1,'brands.is_deleted'=>0,'brands.active_status'=>1]);
      if ($request->cat_id) {
            $count = $count->where(['products.cat_id'=>$request->cat_id]);
      }else if(!empty($request->sub_cat_id)){
            $count = $count->where(['products.sub_cat_id'=>$request->sub_cat_id]);
      }else if(!empty($request->brand)){
            $count = $count->where(['products.brand_id'=>$request->brand]);
      }


      if(!empty($request->search)){
            $count = $count->whereRaw('(products.name LIKE "%'.$request->search.'%" or products.description LIKE "%'.$request->search.'%")');
      }


      $count = $count->groupBy('product_images.prd_id')->orderBy('products.id','DESC')->get(['products.name','products.id','products.description','products.tag','products.image','products.active_status','products.qty','products.mrp','products.price','products.stock_warning','products.is_return','products.best_selling','products.sale','products.brand_id','products.sub_cat_id','products.cat_id','products.tax_id','brands.name as brand','categories.name as category','sub_categories.name as sub_category',DB::raw('GROUP_CONCAT(path) as path')]);

      // dd(count($count));
      $data['product_list'] = $datas;
      $data['count'] = count($count);
      return view('frontend.product_list',$data);
    }//end of method

    

    public function e_clinic(Request $request)
    {
      $data['home_page'] = EclinicPage::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['home_category'] = DoctorCategory::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['datacontact'] = ContactUsPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      $data['title'] = 'E-Clinic';
      return view('frontend.e_clinic',$data);
    }//end of method

    public function doctor_list(Request $request)
    {
      $data['title'] = 'Doctor-List';
      $data['doctor'] = DoctorInfo::where(['is_deleted'=>0,'active_status'=>1])->get();
      return view('frontend.doctorlist',$data);
    }//end of method

    public function doctor_detail(Request $request)
    {
        $data['genral_pages'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      $data['title'] = 'DoctorDetail';
      $data['doctor'] = DoctorInfo::where(['is_deleted'=>0,'active_status'=>1,'id'=>$request->doctor])->first();

      $data['review'] = DoctorReview::join('users','doctor_reviews.user_id','=','users.id')->where(['users.is_deleted'=>0,'product_id'=>$request->doctor])->get(['doctor_reviews.review','doctor_reviews.created_at','users.name',]);
      // $data['related_product'] = Product::where(['is_deleted'=>0,'active_status'=>1,'cat_id'=>$data['product']->cat_id])->get();

      // $data['related_product'] = Product::join('product_images','product_images.prd_id','=','products.id')->join('categories','categories.id','=','products.cat_id')->join('sub_categories','sub_categories.id','=','products.sub_cat_id')->join('brands','brands.id','=','products.brand_id')->join('users','users.id','=','products.added_by')->where(['products.cat_id'=>$data['product']->cat_id,'products.is_deleted'=>0,'products.active_status'=>1,'users.is_deleted'=>0,'users.active_status'=>1,'categories.is_deleted'=>0,'categories.active_status'=>1,'sub_categories.is_deleted'=>0,'sub_categories.active_status'=>1,'brands.is_deleted'=>0,'brands.active_status'=>1])->groupBy('product_images.prd_id')->get(['products.name','products.id','products.description','products.tag','products.image','products.active_status','products.qty','products.mrp','products.price','products.stock_warning','products.is_return','products.best_selling','products.sale','products.brand_id','products.sub_cat_id','products.cat_id','products.tax_id','brands.name as brand','categories.name as category','sub_categories.name as sub_category',DB::raw('GROUP_CONCAT(path) as path')]);
      return view('frontend.doctor_detail',$data);
    }//end of method

    public function cart_page(Request $request)
    {
        $data['genral_pages'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      $data['title'] = 'Cart';
      return view('frontend.cart',$data);
    }//end of method

    public function wishlist(Request $request)
    {
        $data['genral_pages'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      $data['title'] = 'Wishlist';
      $data['wishlist'] =Wishlist::join('products','products.id','=','wishlists.prod_id')->where(['wishlists.user_id'=>Auth::user()->id,'products.is_deleted'=>0,'products.active_status'=>1])->get(['products.id','products.name']);
      // dd($data['wishlist']);
      return view('frontend.wishlist',$data);
    }//end of method

    public function user_profile(Request $request)
    {
        $data['add'] = User::leftjoin('addresses','addresses.user_id','=','users.id')->where(['users.is_deleted'=>0,'users.id'=>Auth::user()->id])->first(['users.name','users.email','users.mobile','addresses.country','addresses.state','addresses.city','addresses.pincode','addresses.address','addresses.id']);
        $data['order'] = array();
      $data['title'] = 'profile';
      return view('frontend.user_profile',$data);
    }//end of method

   
    public function order_detail(Request $request)
    {
        $data['order_details'] = OrderDetail::join('orders','orders.id','=','order_details.order_id')->join('products','products.id','=','order_details.prod_id')->join('users','users.id','=','products.added_by')->where(['products.is_deleted'=>0,'products.active_status'=>1, 'order_id' =>$request->id, 'orders.user_id' =>Auth::user()->id])->get(['products.name','products.image','users.name as username','order_details.variation','order_details.price','order_details.tax','order_details.shipping','order_details.coupon_discount','order_details.quantity','order_details.order_status','products.id','orders.tax as all_tax','orders.discount as all_discount','orders.total as all_total']);
        // dd($data['order_details']);
      $data['title'] = 'order_detail';
      return view('frontend.order_detail',$data);
    }//end of method

    public function checkout_page(Request $request)
    {
        // dd(\Cart::getcontent());
        $coupon_discount_amount = 0;
            if ($request->coupon) {
                $coupon = Coupon::where('code',$request->coupon)->whereRaw('date(validity_from)<=date("'.date('Y-m-d').'") and date(validity_to)>=date("'.date('Y-m-d').'")')->first();
                if (!empty($coupon->usage)) {
                    $usage = CouponUsed::where(['coupon_id'=>$coupon->id,'user_id'=>Auth::user()->id])->get(DB::raw('count(id) as count'));
                    if ($usage[0]->count>=$coupon->usage) {
                        // return response()->json(['status_code' => 201,'message'=> 'You Have Reached The limit']);
                    }
                }
                $price =0;
                if ($coupon) {
                    if (\Cart::getcontent()) {
                    foreach(\Cart::getcontent() as $key=>$value){
                        if ($value->attributes['coupon_valid']) {
                            $price+=$value->price*$value->quantity;
                        }

                    }

                    if($price And $price>=$coupon->order_amount){
                        if ($coupon->type == 1) {
                            $coupon_discount_amount = ($coupon->value / 100) * $price;
                        }else{
                            $coupon_discount_amount = $price - $coupon->value;
                        }
                        // return response()->json(['status_code'=>200,'message'=> 'Coupon Applied','amount'=>$amount]);  
                    }
                }
                }
            }
            // Coupon Calculation

            // TAx Calculation
            $tax = 0;
            $price = 0;
            $cart = \Cart::getcontent();
            if(count($cart) !=0)
            {
                foreach($cart as $key=>$value){
                    $price =(int)$value->price*(int)$value->quantity;
                    $tax += ($value->attributes['tax'] / 100) * $price;

                }
            }

      $data['genral_pages'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      $data['title'] = 'checkout';
      $data['coupon_discount_amount'] = $coupon_discount_amount;
      $data['shipping'] = 50;
      $data['price'] = $price;
      $data['tax'] = $tax;
      $data['total'] = ($tax+$price+50)-$coupon_discount_amount;
      return view('frontend.checkout',$data);
    }//end of method

    public function user_login(Request $request)
    {
      $data['title'] = 'Login';
      if(Auth::user()){
        if (Auth::user()->user_type == 4) {
            return Redirect::to(url()->previous());
        }
        }
      return view('frontend.login',$data);
    }//end of method

    public function user_register(Request $request)
    {
      $data['title'] = 'register';
      return view('frontend.register',$data);
    }//end of method

    public function product_detail(Request $request)
    {
        $data['genral_pages'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      $data['title'] = 'ProductDetail';
      $data['product'] =  Product::join('product_images','product_images.prd_id','=','products.id')->join('categories','categories.id','=','products.cat_id')->join('sub_categories','sub_categories.id','=','products.sub_cat_id')->join('brands','brands.id','=','products.brand_id')->join('users','users.id','=','products.added_by')->where('products.id',$request->product)->where(['products.is_deleted'=>0,'products.active_status'=>1,'users.is_deleted'=>0,'users.active_status'=>1,'categories.is_deleted'=>0,'categories.active_status'=>1,'sub_categories.is_deleted'=>0,'sub_categories.active_status'=>1,'brands.is_deleted'=>0,'brands.active_status'=>1])->groupBy('product_images.prd_id')->first(['products.name','products.id','products.description','products.tag','products.image','products.active_status','products.qty','products.mrp','products.price','products.stock_warning','products.is_return','products.best_selling','products.sale','products.brand_id','products.sub_cat_id','products.cat_id','products.tax_id','brands.name as brand','categories.name as category','sub_categories.name as sub_category',DB::raw('GROUP_CONCAT(path) as path')]);

      $data['variant'] = ProductVariant::where(['is_deleted'=>0,'active_status'=>1,'prod_id'=>$request->product])->get();

      // dd($data['variation']);

      $data['related_product'] = Product::join('product_images','product_images.prd_id','=','products.id')->join('categories','categories.id','=','products.cat_id')->join('sub_categories','sub_categories.id','=','products.sub_cat_id')->join('brands','brands.id','=','products.brand_id')->join('users','users.id','=','products.added_by')->where(['products.cat_id'=>$data['product']->cat_id,'products.is_deleted'=>0,'products.active_status'=>1,'users.is_deleted'=>0,'users.active_status'=>1,'categories.is_deleted'=>0,'categories.active_status'=>1,'sub_categories.is_deleted'=>0,'sub_categories.active_status'=>1,'brands.is_deleted'=>0,'brands.active_status'=>1])->groupBy('product_images.prd_id')->get(['products.name','products.id','products.description','products.tag','products.image','products.active_status','products.qty','products.mrp','products.price','products.stock_warning','products.is_return','products.best_selling','products.sale','products.brand_id','products.sub_cat_id','products.cat_id','products.tax_id','brands.name as brand','categories.name as category','sub_categories.name as sub_category',DB::raw('GROUP_CONCAT(path) as path')]);
      return view('frontend.product_detail',$data);
    }//end of method

    public function blog(Request $request)
        {
            $data['genral_pages'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
          $data['title'] = 'Blog';

          $data['blog'] = Blog::join('blog_categories','blog_categories.id','=','blogs.cat_id')->where(['blogs.is_deleted'=>0,'blogs.active_status'=>1,'blog_categories.is_deleted'=>0,'blog_categories.active_status'=>1])->orderBy('blogs.id','DESC')->get(['blogs.name','blogs.id','blogs.description','blog_categories.name as cat','blogs.image','blogs.created_at']);

          return view('frontend.blog',$data);
        }//end of method

        public function blog_detail(Request $request)
        {
            $data['genral_pages'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
          $data['title'] = 'Blog Detail';
          $data['blog'] = Blog::join('blog_categories','blog_categories.id','=','blogs.cat_id')->where(['blogs.is_deleted'=>0,'blogs.id'=>$request->id,'blogs.active_status'=>1,'blog_categories.is_deleted'=>0,'blog_categories.active_status'=>1])->first(['blogs.name','blogs.id','blogs.description','blog_categories.name as cat','blogs.image','blogs.created_at']);
          $data['share'] = Share::page(route('blog_detail',['product'=>$request->id]), $data['blog']->name)
    ->facebook()
    ->twitter()
    ->linkedin('Extra linkedin summary can be passed here')
    ->whatsapp()->getRawLinks();

          $data['blogs'] = Blog::join('blog_categories','blog_categories.id','=','blogs.cat_id')->where(['blogs.is_deleted'=>0,'blogs.active_status'=>1,'blog_categories.is_deleted'=>0,'blog_categories.active_status'=>1])->orderBy('blogs.id','DESC')->get(['blogs.name','blogs.id','blogs.description','blog_categories.name as cat','blogs.image','blogs.created_at']);

          return view('frontend.blog_detail',$data);
        }//end of method

    public function add_wishlist(Request $request){
        $wishlist = Wishlist::where(['prod_id'=>$request->id,'user_id'=>Auth::user()->id])->first();
        if ($wishlist) {
            return response()->json(['status' => 4]);
        }
        $formdata['prod_id'] = $request->id;
            $formdata['user_id'] = Auth::user()->id;
            $formdata['added_by'] = Auth::user()->id;
            $row = Wishlist::insertGetId($formdata);
            $count = Wishlist::where(['user_id'=>Auth::user()->id])->get();


            if($row){

                    return response()->json(['status'=>1,'count'=>count($count)]);  
            }else{
                
                    return response()->json(['status' => 3]);
            }
    }

    public function remove_wishlist(Request $request){
        $wishlist = Wishlist::where(['prod_id'=>$request->id,'user_id'=>Auth::user()->id])->delete();
       
            $count = Wishlist::where(['user_id'=>Auth::user()->id])->get();


            if($wishlist){

                    return response()->json(['status'=>1,'count'=>count($count)]);  
            }else{
                
                    return response()->json(['status' => 3]);
            }
    }

    public function count_wishlist(Request $request){
       
            $count = Wishlist::where(['user_id'=>Auth::user()->id])->get();


            if($count){

                    return response()->json(['status'=>1,'count'=>count($count)]);  
            }else{
                
                    return response()->json(['status' => 3]);
            }
    }
    public function cart(Request $request){

                $id = $request->post('id');//for edit functionality
                $prod = Product::query();
                if ($request->variant_id) {
                    $prod = $prod->where('product_variants.id',$request->variant_id);
                }
                $prod = $prod->join('taxations','products.tax_id','=','taxations.id')->join('product_variants','products.id','=','product_variants.prod_id')->where('products.id',$id)->first(['products.id','products.name','product_variants.price','product_variants.variant','product_variants.length','product_variants.breath','product_variants.height','product_variants.weight','product_variants.id as v_id','products.coupon_valid','products.image','taxations.value']);
               $s =  \Cart::add([
                'id' => $prod->id,
                'name' => $prod->name,
                'price' => $prod->price,
                'quantity' => 1,
                'attributes' => array(
                'coupon_valid' => $prod->coupon_valid,
                'variant' => $prod->variant,
                'variant_id' => $prod->v_id,
                'length' => $prod->length,
                'breath' => $prod->breath,
                'height' => $prod->height,
                'weight' => $prod->weight,
                'tax' => $prod->value,
                'image' => $prod->image,
                )
            ]);
               $cart = \Cart::getcontent();

               $count = count(\Cart::getcontent());

                if($cart){

                        return response()->json(['status'=>1,'count'=>$count]);  
                }else{
                    
                        return response()->json(['status' => 3]);
                }
        }

    public function couponcheck(Request $request){
        if ($request->code) {
            $coupon = Coupon::where('code',$request->code)->whereRaw('date(validity_from)<=date("'.date('Y-m-d').'") and date(validity_to)>=date("'.date('Y-m-d').'")')->first();
            if (!empty($coupon->usage)) {
                $usage = CouponUsed::where(['coupon_id'=>$coupon->id,'user_id'=>Auth::user()->id])->get(DB::raw('count(id) as count'));
                if ($usage[0]->count>=$coupon->usage) {
                    return response()->json(['status_code' => 201,'message'=> 'You Have Reached The limit']);
                }
            }
            $price =0;
            if ($coupon) {
                if (\Cart::getcontent()) {
                foreach(\Cart::getcontent() as $key=>$value){
                    if ($value->attributes['coupon_valid']) {
                        $price+=$value->price*$value->quantity;
                    }

                }

                if($price And $price>=$coupon->order_amount){
                    if ($coupon->type == 1) {
                        $amount = ($coupon->value / 100) * $price;
                    }else{
                        $amount = $price - $coupon->value;
                    }
                    return response()->json(['status_code'=>200,'message'=> 'Coupon Applied','amount'=>$amount]);  
                }else{
                    return response()->json(['status_code' => 201,'message'=> 'Mininmum Order Amount is '.$coupon->order_amount.'']);
                }
            }
            }else{
           return response()->json(['status_code' => 201,'message'=> 'Please Enter Valid Coupon Code']);
        }

        }else{
           return response()->json(['status_code' => 201,'message'=> 'Please Enter Coupon Code']);
        }
    }

    public function remove_cart(Request $request)
    {
        $cart = \Cart::remove($request->id);
        $count = count(\Cart::getcontent());
        if($cart){

                    return response()->json(['status'=>1,'count'=>$count]);   
            }else{
                
                    return response()->json(['status' => 3]);
            }
    }

    public function updateCart(Request $request)
    {
       $cart = \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->qty
                ],
            ]
        );

        if($cart){

                    return response()->json(['status'=>1]);  
            }else{
                
                    return response()->json(['status' => 3]);
            }


    }

    public function count_cart(Request $request)
    {
        $count = count(\Cart::getcontent());
        if($count){

                    return response()->json(['status'=>1,'count'=>$count]);   
            }else{
                
                    return response()->json(['status' => 3]);
            }
    }

    public function cart_item(Request $request)
        {
            $cart_item =\Cart::getcontent();
            if($cart_item){

                        return response()->json(['status'=>1,'cart_item'=>$cart_item]);   
                }else{
                    
                        return response()->json(['status' => 3]);
                }
        }

    public function save_contact(Request $request){
            $validator = Validator::make($request->all(),[
                'name'=>'required',
                'email'=>'required',
                'message'=>'required',
                'phone' => 'required|numeric|digits:10|regex:/^[6-9]{1}[0-9]{9}$/', 
            ]);
        if($validator->passes()) {
            $formdata['name'] = $request->name;
            $formdata['email'] = $request->email;
            $formdata['message'] = $request->message;
            $formdata['phone'] = $request->phone;
            $row = Contact::insertGetId($formdata);
            $msg = 'Message Placed';
                 if($row){
                    return ['status_code' => 200 , 'message' =>$msg];
                }else{
                    return ['status_code' => 201 , 'message' => "Something went wrong !"];
                }
            }
           
        return ['message'=>$validator->errors()->all(),'status_code'=>301];      
    }//end of method

    public function save_testimonial(Request $request){
            $validator = Validator::make($request->all(),[
                'message'=>'required',
                'designation'=>'required',
            ]);
        if($validator->passes()) {
            $formdata['user_id'] = Auth::user()->id;
            $formdata['message'] = $request->message;
            $formdata['designation'] = $request->designation;
            $formdata['active_status'] = 0;
            $row = Testimonial::insertGetId($formdata);
            $msg = 'Message Placed';
                 if($row){
                    return ['status_code' => 200 , 'message' =>$msg];
                }else{
                    return ['status_code' => 201 , 'message' => "Something went wrong !"];
                }
            }
           
        return ['message'=>$validator->errors()->all(),'status_code'=>301];      
    }//end of method


    public function save_newsletter(Request $request){
            $validator = Validator::make($request->all(),[
                'email'=>'required|regex:/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/|unique:news_letters',
            ]);
        if($validator->passes()) {
            $formdata['email'] = $request->email;
            $row = NewsLetter::insertGetId($formdata);
            $msg = 'Subscribed';
                 if($row){
                    return ['status_code' => 200 , 'message' =>$msg];
                }else{
                    return ['status_code' => 201 , 'message' => "Something went wrong !"];
                }
            }
           
        return ['message'=>$validator->errors()->all(),'status_code'=>301];      
    }//end of method


    public function save_review(Request $request){
            $validator = Validator::make($request->all(),[
                'review'=>'required'
            ]);
            // print_r($request->all());
            // die;
        if($validator->passes()) {
            $formdata['review'] = $request->review;
            $formdata['product_id'] = $request->id;
            $formdata['user_id'] = Auth::user()->id;
            $row = DoctorReview::insertGetId($formdata);
            $msg = 'Subscribed';
                 if($row){
                    return ['status_code' => 200 , 'message' =>$msg];
                }else{
                    return ['status_code' => 201 , 'message' => "Something went wrong !"];
                }
            }
           
        return ['message'=>$validator->errors()->all(),'status_code'=>301];      
    }//end of method

    public function payment(Request $request){
            $validator = Validator::make($request->all(),[
                'name'=>'required',
                'email'=>'required',
                'mobile'=>'required',
                'city'=>'required',
                'state'=>'required',
                'country'=>'required',
                'pincode'=>'required',
                'address'=>'required',
            ]);
            // print_r($request->all());
            // die;
        if($validator->passes()) {
            $formdata['user_id'] = Auth::user()->id;
            $formdata['name'] = $request->name;
            $formdata['email'] = $request->email;
            $formdata['mobile'] = $request->mobile;
            $formdata['address'] = $request->address;
            $formdata['country'] = $request->country;
            $formdata['city'] = $request->city;
            $formdata['state'] = $request->state;
            $formdata['pincode'] = $request->pincode;
            $formdata['tax'] = $request->tax;
            $formdata['discount'] = $request->discount;
            $formdata['total'] = $request->total;
            $formdata['active_status'] =0;
            $row = Order::insertGetId($formdata);

            // $lastid = OrderDetail::insertGetId($formdata);
            // Coupon
            $coupon_discount_amount = '';
            $coupon = '';
            if ($request->coupon) {
                $coupon = Coupon::where('code',$request->coupon)->whereRaw('date(validity_from)<=date("'.date('Y-m-d').'") and date(validity_to)>=date("'.date('Y-m-d').'")')->first();
                if (!empty($coupon->usage)) {
                    $usage = CouponUsed::where(['coupon_id'=>$coupon->id,'user_id'=>Auth::user()->id])->get(DB::raw('count(id) as count'));
                    if ($usage[0]->count>=$coupon->usage) {
                        // return response()->json(['status_code' => 201,'message'=> 'You Have Reached The limit']);
                    }
                }}
                $price =0;
                
                    if (\Cart::getcontent()) {
                    foreach(\Cart::getcontent() as $key=>$value){


                        $variantdata['price'] = $price =(int)$value->price*(int)$value->quantity;
                        $variantdata['tax'] = $tax = ($value->attributes['tax'] / 100) * $price;
                        if ($coupon) {
                        if ($value->attributes['coupon_valid']) {
                            if ($coupon->type == 1) {

                               $variantdata['coupon_discount'] =  $coupon_discount_amount = ($coupon->value / 100) * $price;
                               $variantdata['coupon_id'] =  $coupon->id;
                            }
                            
                        }
                    }
                        $variantdata['variant_id'] = $value->attributes['variant_id'];
                        $variantdata['variation'] = $value->attributes['variant'];
                        $variantdata['length'] = $value->attributes['length'];
                        $variantdata['breath'] = $value->attributes['breath'];
                        $variantdata['height'] = $value->attributes['height'];
                        $variantdata['weight'] = $value->attributes['weight'];
                        $variantdata['prod_id'] = $value->id;
                        $variantdata['quantity'] = $value->quantity;
                        $variantdata['quantity'] = $value->quantity;
                        $variantdata['order_id'] = $row;
                        $variantdata['added_by'] = Auth::user()->id;
                        $lastid = OrderDetail::insertGetId($variantdata);

                    }

                }
                if (!empty($coupon)) {
                    $couponData['added_by'] = Auth::user()->id;
                    $couponData['user_id'] = Auth::user()->id;
                    $couponData['coupon_id'] = $coupon->id;
                    CouponUsed::insertGetId($couponData);
                }
                
           

            $parameters = [
            // 'tid' => '1',
            'order_id' => $row,
            'amount' => $request->total,
            'billing_full_name'=> $request->name,
            'billing_email' => $request->email,
            'billing_contact_number' => $request->mobile,
            'billing_address' => $request->review,
            'billing_city' => $request->review,
            'billing_state' => $request->review,
            'billing_country' => $request->review,
        ];
        $order = Indipay::prepare($parameters);
         return Indipay::process($order);
                 if($row){
                    return ['status_code' => 200 , 'message' =>$msg];
                }else{
                    return ['status_code' => 201 , 'message' => "Something went wrong !"];
                }
            }
           
        return ['message'=>$validator->errors()->all(),'status_code'=>301];      
    }//end of method

    public function send_community_chat(Request $request){
     $validator = Validator::make($request->all(),[
             'message'=>'required',
            
            ]);
            if($validator->passes()) {
             $files =array();
             $formdata['user_id'] = Auth::user()->id;
             $formdata['community_id'] = $request->id;
             $formdata['message'] = $request->message;
             if(!empty($request->file('file'))){
                foreach ($request->file('file') as $key => $value) {
                    $filename = time().'.'.$value->getClientOriginalExtension(); 
                    $value->move(public_path('uploads/chats/'), $filename);
                    $files[$key] = $filename;
                }
            }
             // $formdata['file'] = serialize($files);         
             $formdata['added_by'] = Auth::user()->id;
             $row = CommunityChat::insertGetId($formdata);
             $msg = "Added Successfully !";
             if($row){
                 return ['status_code' => 200 , 'message' => $msg];
             }else{
                 return ['status_code' => 201 , 'message' => "Something went wrong !"];
             }
            }    
         return ['message'=>$validator->errors()->all(),'status_code'=>301];      
    }//end of Function

    public function send_whatsapp_chat(Request $request){
     $validator = Validator::make($request->all(),[
             'name'=>'required',
             'email'=>'required',
             'phone'=>'required',
             'message'=>'required',
            
            ]);
            if($validator->passes()) {
             $body = array(
                'secret' => 'e136e8df711eb3e9ccea28c6037cfd747aef3a4a',
                'account' => '90',
                'recipient' => '+916393228471',
                'type' => 'text',
                'message' => 'You Have Received A Query From '.$request->name.' Mobile: '.$request->phone.' Email: '.$request->email.' Message: '.$request->message,
                );
                $client = new Client();
                $res = $client->request('POST', 'https://smsbulk.net/api/send/whatsapp',['form_params' => $body]);

             $msg = "Message Sent! We Will Contact You Soon";
             if($res){
                 return ['status_code' => 200 , 'message' => $msg];
             }else{
                 return ['status_code' => 201 , 'message' => "Something went wrong !"];
             }
            }    
         return ['message'=>$validator->errors()->all(),'status_code'=>301];      
    }//end of Function



}
