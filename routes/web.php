<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLogin; 
use App\Http\Controllers\Admin\DashboardController; 
use App\Http\Controllers\Admin\RoleController; 
use App\Http\Controllers\Admin\CategoryController; 
use App\Http\Controllers\Admin\SubCategoryController; 
use App\Http\Controllers\Admin\BrandController; 
use App\Http\Controllers\Admin\VendorController; 
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\TaxationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\FormController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\EclinicController;
use App\Http\Controllers\Admin\GenralPageController;
use App\Http\Controllers\Admin\ContactPageController;
use App\Http\Controllers\Admin\DoctorCategoryController;
use App\Http\Controllers\Admin\DoctorInfoController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\LeadsController;
use App\Http\Controllers\Admin\CommunityController;
use App\Http\Controllers\Admin\PointerController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\TestimonialController;

// **************frontend******************* 
use App\Http\Controllers\Frontend\HomeController; 
use App\Http\Controllers\Frontend\UserLoginController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('admin',[AdminLogin::class,'admin_login']);
Route::get('SignUp',[AdminLogin::class,'SignUp']);
Route::post('admin_login',[AdminLogin::class,'Adminlogin']);
Route::post('saveSignUp',[AdminLogin::class,'saveSignUp']);
Route::get('verification/{id}',[AdminLogin::class,'verification']);
Route::post('verify',[AdminLogin::class,'verify']);
Route::get('logout',[AdminLogin::class,'logout']);
Route::get('/attendace_check',[AdminLogin::class , 'attendace_check']);
Route::post('/mark_attendance',[AdminLogin::class , 'mark_attendance']);
    Route::get('basic_email',[DashboardController::class,'basic_email']);

Route::middleware("VendorAuth")->group(function(){
    Route::get('dashboard',[DashboardController::class,'index']);
    Route::get('profile',[DashboardController::class,'profile'])->name('profile');

    //product management
    Route::group(['prefix' => 'product-management'], function() {
        Route::get('/', [ProductController::class,'index'])->name('product-management.index');

        Route::get('/view', [ProductController::class,'view'])->name('product-management.view');
        Route::post('/save', [ProductController::class,'save'])->name('product-management.save');
        Route::get('/show', [ProductController::class,'show'])->name('product-management.show');
        Route::get('/status', [ProductController::class,'status'])->name('product-management.status');

        Route::get('/price_calc', [ProductController::class,'price_calc'])->name('product-management.price_calc');
        Route::get('/delete', [ProductController::class,'delete'])->name('product-management.delete');
        Route::get('/edit', [ProductController::class,'edit'])->name('product-management.edit');
        Route::get('/sub_cat', [ProductController::class,'sub_cat'])->name('product-management.sub_cat');
        Route::post('/import_product', [ProductController::class,'import_product'])->name('product-management.import_product');
    });

    Route::group(['prefix' => 'user-management'], function() {
        Route::get('/', [UserController::class,'index'])->name('user-management.index');
        Route::post('/save', [UserController::class,'save'])->name('user-management.save');
        Route::get('/show', [UserController::class,'show'])->name('user-management.show');
        Route::get('/status', [UserController::class,'status'])->name('user-management.status');
        Route::get('/delete', [UserController::class,'delete'])->name('user-management.delete');
        Route::get('/edit', [UserController::class,'edit'])->name('user-management.edit');
    });

    Route::group(['prefix' => 'leads'], function() {
        Route::get('/', [LeadsController::class,'index'])->name('leads.index');
        Route::post('/save', [LeadsController::class,'save'])->name('leads.save');
        Route::get('/show', [LeadsController::class,'show'])->name('leads.show');
        Route::get('/status', [LeadsController::class,'status'])->name('leads.status');
        Route::get('/delete', [LeadsController::class,'delete'])->name('leads.delete');
        Route::get('/edit', [LeadsController::class,'edit'])->name('leads.edit');
    });

     Route::group(['prefix' => 'message'], function() {
        Route::get('/', [MessageController::class,'index'])->name('message.index');
        Route::post('/save', [MessageController::class,'save'])->name('message.save');
        Route::get('/show', [MessageController::class,'show'])->name('message.show');
        Route::get('/status', [MessageController::class,'status'])->name('message.status');
        Route::get('/delete', [MessageController::class,'delete'])->name('message.delete');
        Route::get('/edit', [MessageController::class,'edit'])->name('message.edit');
        Route::get('/show_chat/{id}', [MessageController::class,'show_chat'])->name('message.show_chat');
        Route::post('/send_chat', [MessageController::class,'send_chat'])->name('message.send_chat');
    });


    // ********************admin middle ware starts******************
Route::middleware("AdminLogin")->group(function(){
    // roles
    Route::group(['prefix' => 'role'], function() {
        Route::get('/', [RoleController::class,'index'])->name('role.index');
        Route::post('/save', [RoleController::class,'save'])->name('role.save');
        Route::get('/show', [RoleController::class,'show'])->name('role.show');
        Route::get('/status', [RoleController::class,'status'])->name('role.status');
        Route::get('/delete', [RoleController::class,'delete'])->name('role.delete');
        Route::get('/edit', [RoleController::class,'edit'])->name('role.edit');
    });


    Route::group(['prefix' => 'attribute'], function() {
        Route::get('/', [AttributeController::class,'index'])->name('attribute.index');
        Route::post('/save', [AttributeController::class,'save'])->name('attribute.save');
        Route::get('/show', [AttributeController::class,'show'])->name('attribute.show');
        Route::get('/status', [AttributeController::class,'status'])->name('attribute.status');
        Route::get('/delete', [AttributeController::class,'delete'])->name('attribute.delete');
        Route::get('/edit', [AttributeController::class,'edit'])->name('attribute.edit');
    });

    // Route::group(['prefix' => 'form'], function() {
    //     Route::get('/', [FormController::class,'index'])->name('form.index');
    //     Route::post('/save', [FormController::class,'save'])->name('form.save');
    //     Route::get('/show', [FormController::class,'show'])->name('form.show');
    //     Route::get('/status', [FormController::class,'status'])->name('form.status');
    //     Route::get('/delete', [FormController::class,'delete'])->name('form.delete');
    //     Route::get('/edit', [FormController::class,'edit'])->name('form.edit');
    // });

    Route::group(['prefix' => 'category'], function() {
        Route::get('/', [CategoryController::class,'index'])->name('category.index');
        Route::post('/save', [CategoryController::class,'save'])->name('category.save');
        Route::get('/show', [CategoryController::class,'show'])->name('category.show');
        Route::get('/status', [CategoryController::class,'status'])->name('category.status');
        Route::get('/delete', [CategoryController::class,'delete'])->name('category.delete');
        Route::get('/edit', [CategoryController::class,'edit'])->name('category.edit');
    });

    

    Route::group(['prefix' => 'blog-category'], function() {
        Route::get('/', [BlogCategoryController::class,'index'])->name('blog-category.index');
        Route::post('/save', [BlogCategoryController::class,'save'])->name('blog-category.save');
        Route::get('/show', [BlogCategoryController::class,'show'])->name('blog-category.show');
        Route::get('/status', [BlogCategoryController::class,'status'])->name('blog-category.status');
        Route::get('/delete', [BlogCategoryController::class,'delete'])->name('blog-category.delete');
        Route::get('/edit', [BlogCategoryController::class,'edit'])->name('blog-category.edit');
    });

    Route::group(['prefix' => 'blog-management'], function() {
        Route::get('/', [BlogController::class,'index'])->name('blog-management.index');
        Route::post('/save', [BlogController::class,'save'])->name('blog-management.save');
        Route::get('/show', [BlogController::class,'show'])->name('blog-management.show');
        Route::get('/status', [BlogController::class,'status'])->name('blog-management.status');
        Route::get('/delete', [BlogController::class,'delete'])->name('blog-management.delete');
        Route::get('/edit', [BlogController::class,'edit'])->name('blog-management.edit');
    });

    Route::group(['prefix' => 'homepage'], function() {
        Route::get('/', [HomePageController::class,'index'])->name('homepage.index');
        Route::post('/save', [HomePageController::class,'save'])->name('homepage.save');
        Route::get('/show', [HomePageController::class,'show'])->name('homepage.show');
        Route::get('/status', [HomePageController::class,'status'])->name('homepage.status');
        Route::get('/delete', [HomePageController::class,'delete'])->name('homepage.delete');
        Route::get('/edit', [HomePageController::class,'edit'])->name('homepage.edit');
    });

    Route::group(['prefix' => 'e_clinic'], function() {
        Route::get('/', [EclinicController::class,'index'])->name('e_clinic.index');
        Route::post('/save', [EclinicController::class,'save'])->name('e_clinic.save');
        Route::get('/show', [EclinicController::class,'show'])->name('e_clinic.show');
        Route::get('/status', [EclinicController::class,'status'])->name('e_clinic.status');
        Route::get('/delete', [EclinicController::class,'delete'])->name('e_clinic.delete');
        Route::get('/edit', [EclinicController::class,'edit'])->name('e_clinic.edit');
    });

    Route::group(['prefix' => 'genralPages'], function() {
        Route::get('/', [GenralPageController::class,'index'])->name('genralPages.index');
        Route::post('/save', [GenralPageController::class,'save'])->name('genralPages.save');
        Route::get('/show', [GenralPageController::class,'show'])->name('genralPages.show');
        Route::get('/status', [GenralPageController::class,'status'])->name('genralPages.status');
        Route::get('/delete', [GenralPageController::class,'delete'])->name('genralPages.delete');
        Route::get('/edit', [GenralPageController::class,'edit'])->name('genralPages.edit');
    });

    Route::group(['prefix' => 'contactpage'], function() {
        Route::get('/', [ContactPageController::class,'index'])->name('contactpage.index');
        Route::post('/save', [ContactPageController::class,'save'])->name('contactpage.save');
        Route::get('/show', [ContactPageController::class,'show'])->name('contactpage.show');
        Route::get('/status', [ContactPageController::class,'status'])->name('contactpage.status');
        Route::get('/delete', [ContactPageController::class,'delete'])->name('contactpage.delete');
        Route::get('/edit', [ContactPageController::class,'edit'])->name('contactpage.edit');
    });

    Route::group(['prefix' => 'testimonial'], function() {
        Route::get('/', [TestimonialController::class,'index'])->name('contactpage.index');
        // Route::post('/save', [ContactPageController::class,'save'])->name('contactpage.save');
        Route::get('/show', [TestimonialController::class,'show'])->name('contactpage.show');
        Route::get('/status', [TestimonialController::class,'status'])->name('contactpage.status');
        // Route::get('/delete', [ContactPageController::class,'delete'])->name('contactpage.delete');
        // Route::get('/edit', [ContactPageController::class,'edit'])->name('contactpage.edit');
    });

    Route::group(['prefix' => 'order'], function() {
        Route::get('/', [OrderController::class,'index'])->name('order.index');
        Route::get('/show', [OrderController::class,'show'])->name('order.show');
        Route::get('/order_detail', [OrderController::class,'order_detail'])->name('order.order_detail');
        Route::get('/order_status', [OrderController::class,'order_status'])->name('order.order_status');
    });

    Route::group(['prefix' => 'sub-category'], function() {
        Route::get('/', [SubCategoryController::class,'index'])->name('sub-category.index');
        Route::post('/save', [SubCategoryController::class,'save'])->name('sub-category.save');
        Route::get('/show', [SubCategoryController::class,'show'])->name('sub-category.show');
        Route::get('/status', [SubCategoryController::class,'status'])->name('sub-category.status');
        Route::get('/delete', [SubCategoryController::class,'delete'])->name('sub-category.delete');
        Route::get('/edit', [SubCategoryController::class,'edit'])->name('sub-category.edit');
    });


    Route::group(['prefix' => 'vendor-management'], function() {
        Route::get('/', [VendorController::class,'index'])->name('vendor-management.index');
        Route::post('/save', [VendorController::class,'save'])->name('vendor-management.save');
        Route::get('/show', [VendorController::class,'show'])->name('vendor-management.show');
        Route::get('/status', [VendorController::class,'status'])->name('vendor-management.status');
        Route::get('/delete', [VendorController::class,'delete'])->name('vendor-management.delete');
        Route::get('/edit', [VendorController::class,'edit'])->name('vendor-management.edit');
    });


    

    Route::group(['prefix' => 'notification'], function() {
        Route::get('/', [NotificationController::class,'index'])->name('notification.index');
        Route::post('/save', [NotificationController::class,'save'])->name('notification.save');
        Route::get('/show', [NotificationController::class,'show'])->name('notification.show');
        Route::get('/status', [NotificationController::class,'status'])->name('notification.status');
        Route::get('/delete', [NotificationController::class,'delete'])->name('notification.delete');
        Route::get('/edit', [NotificationController::class,'edit'])->name('notification.edit');
    });

    Route::group(['prefix' => 'community'], function() {
        Route::get('/', [CommunityController::class,'index'])->name('community.index');
        Route::post('/save', [CommunityController::class,'save'])->name('community.save');
        Route::get('/show', [CommunityController::class,'show'])->name('community.show');
        Route::get('/status', [CommunityController::class,'status'])->name('community.status');
        Route::get('/delete', [CommunityController::class,'delete'])->name('community.delete');
        Route::get('/edit', [CommunityController::class,'edit'])->name('community.edit');
    });

    Route::group(['prefix' => 'pointer'], function() {
        Route::get('/', [PointerController::class,'index'])->name('pointer.index');
        Route::post('/save', [PointerController::class,'save'])->name('pointer.save');
        Route::get('/show', [PointerController::class,'show'])->name('pointer.show');
        Route::get('/status', [PointerController::class,'status'])->name('pointer.status');
        Route::get('/delete', [PointerController::class,'delete'])->name('pointer.delete');
        Route::get('/edit', [PointerController::class,'edit'])->name('pointer.edit');
    });

    Route::group(['prefix' => 'price'], function() {
        Route::get('/', [PriceController::class,'index'])->name('price.index');
        Route::post('/save', [PriceController::class,'save'])->name('price.save');
        Route::get('/show', [PriceController::class,'show'])->name('price.show');
        Route::get('/status', [PriceController::class,'status'])->name('price.status');
        Route::get('/delete', [PriceController::class,'delete'])->name('price.delete');
        Route::get('/edit', [PriceController::class,'edit'])->name('price.edit');
    });

    

   


    Route::group(['prefix' => 'coupon-management'], function() {
        Route::get('/', [CouponController::class,'index'])->name('coupon-management.index');
        Route::post('/save', [CouponController::class,'save'])->name('coupon-management.save');
        Route::get('/show', [CouponController::class,'show'])->name('coupon-management.show');
        Route::get('/status', [CouponController::class,'status'])->name('coupon-management.status');
        Route::get('/delete', [CouponController::class,'delete'])->name('coupon-management.delete');
        Route::get('/edit', [CouponController::class,'edit'])->name('coupon-management.edit');
    });

    Route::group(['prefix' => 'brand'], function() {
        Route::get('/', [BrandController::class,'index'])->name('brand.index');
        Route::post('/save', [BrandController::class,'save'])->name('brand.save');
        Route::get('/show', [BrandController::class,'show'])->name('brand.show');
        Route::get('/status', [BrandController::class,'status'])->name('brand.status');
        Route::get('/delete', [BrandController::class,'delete'])->name('brand.delete');
        Route::get('/edit', [BrandController::class,'edit'])->name('brand.edit');
    });

    Route::group(['prefix' => 'taxation'], function() {
        Route::get('/', [TaxationController::class,'index'])->name('taxation.index');
        Route::post('/save', [TaxationController::class,'save'])->name('taxation.save');
        Route::get('/show', [TaxationController::class,'show'])->name('taxation.show');
        Route::get('/status', [TaxationController::class,'status'])->name('taxation.status');
        Route::get('/delete', [TaxationController::class,'delete'])->name('taxation.delete');
        Route::get('/edit', [TaxationController::class,'edit'])->name('taxation.edit');
    });

    Route::group(['prefix' => 'department'], function() {
        Route::get('/', [DepartmentController::class,'index'])->name('department.index');
        Route::post('/save', [DepartmentController::class,'save'])->name('department.save');
        Route::get('/show', [DepartmentController::class,'show'])->name('department.show');
        Route::get('/status', [DepartmentController::class,'status'])->name('department.status');
        Route::get('/delete', [DepartmentController::class,'delete'])->name('department.delete');
        Route::get('/edit', [DepartmentController::class,'edit'])->name('department.edit');
    });

    
    });
// ****************admin middle ware ends*********************

Route::group(['prefix' => 'taxation'], function() {
        Route::get('/', [TaxationController::class,'index'])->name('taxation.index');
        Route::get('/show', [TaxationController::class,'show'])->name('taxation.show');
    });

Route::group(['prefix' => 'coupon-management'], function() {
        Route::get('/', [CouponController::class,'index'])->name('coupon-management.index');
        Route::get('/show', [CouponController::class,'show'])->name('coupon-management.show');
    });

Route::group(['prefix' => 'category'], function() {
        Route::get('/', [CategoryController::class,'index'])->name('category.index');
        Route::get('/show', [CategoryController::class,'show'])->name('category.show');
    });
});
// ****************vendor middle ware ends*********************


// ******************************frontend*************************************
    Route::get('/',[HomeController::class,'index']);
    Route::get('/contact-us',[HomeController::class , 'contact']);
    
    Route::get('/about-us',[HomeController::class , 'about']);
    
    Route::get('/user-login',[HomeController::class , 'user_login']);
    Route::get('/user-register',[HomeController::class , 'user_register']);
    Route::post('/login_user',[UserLoginController::class,'login_user']);
    Route::post('SignUpuser',[UserLoginController::class,'SignUpuser']);
    Route::get('logout-user',[UserLoginController::class,'logout']);
    Route::post('/save_form',[HomeController::class , 'save_form']);
    Route::get('/report',[HomeController::class , 'report'])->name('report');
    Route::get('/report_graph',[HomeController::class , 'report_graph'])->name('report_graph');
    Route::get('/send_whatsapp',[HomeController::class , 'send_whatsapp']);
    Route::post('/send_whatsapp_chat',[HomeController::class , 'send_whatsapp_chat']);
    Route::get('/forget_password',[HomeController::class , 'forget_password']);
    Route::get('/blog', [HomeController::class,'blog'])->name('blog');
    Route::get('/blog_detail', [HomeController::class,'blog_detail'])->name('blog_detail');
    Route::get('user-profile',[HomeController::class,'user_profile']);
    Route::get('/user-opt_verify/{id}',[HomeController::class , 'user_opt_verify']);
    Route::post('verify_otp',[UserLoginController::class,'verify_otp']);
    
//     Route::get('/product-list', [HomeController::class,'product_list'])->name('product_list');
//     Route::get('/product-detail', [HomeController::class,'product_detail'])->name('product_detail');
//     Route::get('/doctor-detail', [HomeController::class,'doctor_detail'])->name('doctor_detail');
//     Route::get('/blog', [HomeController::class,'blog'])->name('blog');

//     Route::get('/blog_detail', [HomeController::class,'blog_detail'])->name('blog_detail');


    
//     Route::post('/count_wishlist',[HomeController::class , 'count_wishlist']);
//     Route::post('/add_wishlist',[HomeController::class , 'add_wishlist']);
//     Route::post('/remove_wishlist',[HomeController::class , 'remove_wishlist']);
//     Route::post('/cart',[HomeController::class , 'cart']);
//     Route::post('/remove_cart',[HomeController::class , 'remove_cart']);
//     Route::post('/updateCart',[HomeController::class , 'updateCart']);
//     Route::post('/count_cart',[HomeController::class , 'count_cart']);
//     Route::post('/cart_item',[HomeController::class , 'cart_item']);
//     Route::post('/couponcheck',[HomeController::class , 'couponcheck']);

//     Route::get('/contact-us',[HomeController::class , 'contact']);
//     Route::get('/e-clinic',[HomeController::class , 'e_clinic']);
//     Route::get('/doctor_list',[HomeController::class , 'doctor_list'])->name('doctor_list');
//     Route::post('/save_contact',[HomeController::class , 'save_contact']);

//      Route::post('/save_newsletter',[HomeController::class , 'save_newsletter']);
//      Route::post('/payment',[HomeController::class , 'payment']);

//      Route::post('/save_review',[HomeController::class , 'save_review']);

Route::middleware("UserAuth")->group(function(){

    Route::post('/save_contact',[HomeController::class , 'save_contact']);
    Route::get('/user_testimonial',[HomeController::class , 'user_testimonial']);
    Route::post('/save_testimonial',[HomeController::class , 'save_testimonial']);
    Route::post('/send_community_chat', [HomeController::class,'send_community_chat'])->name('send_community_chat');
    Route::get('/Community',[HomeController::class , 'Community']);
    Route::get('/communityChat',[HomeController::class , 'communityChat'])->name('communityChat');
    Route::get('/show_comm_chat/{id}', [HomeController::class,'show_comm_chat'])->name('show_comm_chat');
    Route::get('/form',[HomeController::class , 'form']);
});
// ****************UserAuth middle ware ends*********************

// Route::get('admin',[AdminLogin::class,'index']);