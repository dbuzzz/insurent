$(document).ready(function() {
    
    count_cart();
    count_wishlist();
});
$('#place_order').on('submit',function(e){
console.log(1); 
      e.preventDefault();  
      $.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
      $.ajax({    
         url:siteUrl +'/place_orders',      
         type:'post',      
         data:new FormData(this),      
         dataType:'json', 
         contentType:false,
         processData: false,    
         success:function(response){ 
            if(response.status == 1){
               toastr["success"]("Order Placed");
                setTimeout( location.reload(),2000);        
            }else if(response.status==2){
               var dd = response.error ;
               for(var i=0; i<dd.length;i++){
                  toastr["error"](dd[i]);
               }
            }else if(response.status == 3){
               toastr["error"]("Couldn't Place Right Now");
            }
            // else if(response.status == 4){
            //    toastr["success"]("data Updated");
            //    setTimeout( "redirect(siteUrl +'/view_product')",2000);  
            // }             
         },
      })
   });


$('#contact_form').on('submit',function(e){
      e.preventDefault();  
      $.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
      $.ajax({    
         url:siteUrl +'/add_contact',      
         type:'post',      
         data:new FormData(this),      
         dataType:'json', 
         contentType:false,
         processData: false,    
         success:function(response){ 
            if(response.status == 1){
               toastr["success"]("We Will contact You Soon");
                setTimeout( location.reload(),5000);        
            }else if(response.status==2){
               var dd = response.error ;
               for(var i=0; i<dd.length;i++){
                  toastr["error"](dd[i]);
               }
            }else if(response.status == 3){
               toastr["error"]("Couldn't Contact");
            }
            // else if(response.status == 4){
            //    toastr["success"]("data Updated");
            //    setTimeout( "redirect(siteUrl +'/view_product')",2000);  
            // }             
         },
      })
   });

$('#review_form').on('submit',function(e){
      e.preventDefault();  
      $.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
      $.ajax({    
         url:siteUrl +'/save_review',      
         type:'post',      
         data:new FormData(this),      
         dataType:'json', 
         contentType:false,
         processData: false,    
         success:function(response){ 
            if(response.status == 1){
               toastr["success"]("Review Added");
                setTimeout( location.reload(),5000);        
            }else if(response.status_code == 201){
               var dd = response.error ;
               for(var i=0; i<dd.length;i++){
                  toastr["warning"](dd[i]);
               }
            }else if(response.status == 3){
               toastr["error"]("Couldn't Connect");
            }
            // else if(response.status == 4){
            //    toastr["success"]("data Updated");
            //    setTimeout( "redirect(siteUrl +'/view_product')",2000);  
            // }             
         },
      })
   });
variant_id = '';
function variant_store(id){
   variant_id = id;
   $(".variant").css("background-color", "");
   $(".variant").css("color", "");
   $(".variant_price").hide();

   $("#variant"+id).css("background-color", "#679509");
   $("#variant"+id).css("color", "#fff");
   $("#variant_price"+id).show();
}


function add_cart(id){
   console.log(variant_id);
      $.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
      $.ajax({    
         url:siteUrl +'/cart',      
         type:'post',      
         data:{'id':id,'variant_id':variant_id,},      
         dataType:'json', 
         success:function(response){ 
            if(response.status == 1){
               $('.cart_count').html(response.count);
               toastr["success"]("Added To Cart");
               cart_item();
                // setTimeout( "redirect(siteUrl +'/view_product')",2000);        
            }else if(response.status==2){
               var dd = response.error ;
               for(var i=0; i<dd.length;i++){
                  toastr["error"](dd[i]);
               }
            }else if(response.status == 3){
               toastr["error"]("Couldn't insert right now");
            }else if(response.status == 4){
               toastr["success"]("data Updated");
               // setTimeout( "redirect(siteUrl +'/view_product')",2000);  
            }             
         },
      })
}

function add_wishlist(id){
   console.log(variant_id);
      $.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
      $.ajax({    
         url:siteUrl +'/add_wishlist',      
         type:'post',      
         data:{'id':id},      
         dataType:'json', 
         success:function(response){ 
            if(response.status == 1){
               $('.wishlist_count').html(response.count);
               toastr["success"]("Added To wishlist");
            }else if(response.status==2){
               var dd = response.error ;
               for(var i=0; i<dd.length;i++){
                  toastr["error"](dd[i]);
               }
            }else if(response.status == 3){
               toastr["error"]("Couldn't insert right now");
            }else if(response.status == 4){
               toastr["success"]("Already Added");
            }             
         },
      })
}

function remove_wishlist(id){
      $.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
      $.ajax({    
         url:siteUrl +'/remove_wishlist',      
         type:'post',      
         data:{'id':id},      
         dataType:'json', 
         success:function(response){ 
            if(response.status == 1){
               $('.wishlist_count').html(response.count);
               toastr["success"]("Removed");
               window.location.reload();
            }else if(response.status==2){
               var dd = response.error ;
               for(var i=0; i<dd.length;i++){
                  toastr["error"](dd[i]);
               }
            }else if(response.status == 3){
               toastr["error"]("Couldn't insert right now");
            }else if(response.status == 4){
               toastr["success"]("Already Added");
            }             
         },
      })
}

function count_wishlist(id){
      $.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
      $.ajax({    
         url:siteUrl +'/count_wishlist',      
         type:'post',      
         data:{'id':id},      
         dataType:'json', 
         success:function(response){ 
            if(response.status == 1){
               $('.wishlist_count').html(response.count);
            }          
         },
      })
}

function remove_cart(id){
   // e.preventDefault(); 
      $.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
      $.ajax({    
         url:siteUrl +'/remove_cart',      
         type:'post',      
         data:{'id':id},      
         dataType:'json', 
         success:function(response){ 
            if(response.status == 1){
               $('.cart_count').html(response.count);
               $('#remone_cart'+id).remove();
               cart_item();
               toastr["success"]("cart Removed");
            }else if(response.status==2){
               var dd = response.error ;
               for(var i=0; i<dd.length;i++){
                  toastr["error"](dd[i]);
               }
            }else if(response.status == 3){
               toastr["error"]("Couldn't insert right now");
            }else if(response.status == 4){
               toastr["success"]("data Updated");
               // setTimeout( "redirect(siteUrl +'/view_product')",2000);  
            }             
         },
      })
}

function updatecart(obj){
   id = $(obj).attr('data-id');
   qty = $(obj).val();
   // console.log($(obj).attr('data-id'),$(obj).val());
      $.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
      $.ajax({    
         url:siteUrl +'/updateCart',      
         type:'post',      
         data:{'id':id,'qty':qty},      
         dataType:'json', 
         success:function(response){ 
            if(response.status == 1){
               toastr["success"]("cart Updated");
                setTimeout( location.reload(),2000);        
            }else if(response.status==2){
               var dd = response.error ;
               for(var i=0; i<dd.length;i++){
                  toastr["error"](dd[i]);
               }
            }else if(response.status == 3){
               toastr["error"]("Couldn't update");
            }else if(response.status == 4){
               toastr["success"]("data Updated");
               // setTimeout( "redirect(siteUrl +'/view_product')",2000);  
            }             
         },
      })
}

function count_cart(id){
   // e.preventDefault(); 
      $.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
      $.ajax({    
         url:siteUrl +'/count_cart',      
         type:'post',      
         // data:{'id':id},      
         dataType:'json', 
         success:function(response){ 
            if(response.status == 1){
               $('.cart_count').html(response.count);
            }            
         },
      })
}



function cart_item(id){
   // e.preventDefault(); 
      $.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
      $.ajax({    
         url:siteUrl +'/cart_item',      
         type:'post',      
         // data:{'id':id},      
         dataType:'json', 
         success:function(response){ 
            if(response.status == 1){
               var html = '';
               var price = 0;
               $.each(response.cart_item, function(key,val) {
                   html += '<div class="mcp-item-single" id="remone_cart'+val.id+'"> <div class="thumbnail"> <a href="#"> <img src="'+val.attributes.image+'" alt="img"> </a> </div> <div class="content"> <h4><a href="#">'+val.name+'</a></h4> <div class="price"> <span>'+val.price+' x '+val.quantity+'</span> </div> </div> <div class="remove"> <a href="javascript:void(0)" onclick="remove_cart('+val.id+')"><i class="bi bi-x-lg"></i></a> </div> </div>';
                   price+= val.price*val.quantity;
               });
               $('#add_cart_product').html(html);
               $('#total_cart_price').html(price);
            }            
         },
      })
}


$("#couponcheck").on("click",function(e){
  e.preventDefault(); 
  $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
    });
   $.ajax({ 
      type:"post",
      data:{code:$('#couponCode').val(),subTotal:$('#subTotal').val()},
      url:siteUrl + "/couponcheck",  
      success:function(res){
         if(res.status_code == 200){
            toastr.success(res.message);
            $("#discount").html(res.amount);
            new_total = $("#grand_total").html() - res.amount;
            $("#grand_total").html(new_total.toFixed(2));
         }else if(res.status_code == 301){
            $.each(res.message,function(key , value){
               toastr.warning(value);
            });
         }else if(res.status_code == 201){
            toastr.warning(res.message);
         }
      },error:function(e){
         console.log(e);       
      }
   });
});

function checkout(){
   if ($('#couponCode').val()) {
      window.location.href = siteUrl+'/checkout-page?coupon='+$('#couponCode').val();
   }else{
      window.location.href = siteUrl+'/checkout-page';
   }

}

$("#save_form").on("submit",function(e){
  e.preventDefault(); 
  $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
    });
   $.ajax({ 
      type:"post",
      url:siteUrl + "/save_contact",  
      data:new FormData(this),
      processData: false, 
        contentType: false, 
      success:function(res){
         if(res.status_code == 200){
            toastr.success(res.message);
            $("#save_form").trigger("reset");
         }else if(res.status_code == 301){
            $.each(res.message,function(key , value){
               toastr.warning(value);
            });
         }else if(res.status_code == 201){
            toastr.warning(res.message);
         }
      },error:function(e){
         console.log(e);       
      }
   });
});

$("#save_testimonial").on("submit",function(e){
  e.preventDefault(); 
  $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
    });
   $.ajax({ 
      type:"post",
      url:siteUrl + "/save_testimonial",  
      data:new FormData(this),
      processData: false, 
        contentType: false, 
      success:function(res){
         if(res.status_code == 200){
            toastr.success(res.message);
            $("#save_testimonial").trigger("reset");
         }else if(res.status_code == 301){
            $.each(res.message,function(key , value){
               toastr.warning(value);
            });
         }else if(res.status_code == 201){
            toastr.warning(res.message);
         }
      },error:function(e){
         console.log(e);       
      }
   });
});

$("#send_whatsapp").on("submit",function(e){
  e.preventDefault(); 
  $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
    });
   $.ajax({ 
      type:"post",
      url:siteUrl + "/send_whatsapp_chat",  
      data:new FormData(this),
      processData: false, 
        contentType: false, 
      success:function(res){
         if(res.status_code == 200){
            toastr.success(res.message);
            $("#send_whatsapp").trigger("reset");
         }else if(res.status_code == 301){
            $.each(res.message,function(key , value){
               toastr.warning(value);
            });
         }else if(res.status_code == 201){
            toastr.warning(res.message);
         }
      },error:function(e){
         console.log(e);       
      }
   });
});

$("#newslatter").on("submit",function(e){
  e.preventDefault(); 
  $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
    });
   $.ajax({ 
      type:"post",
      url:siteUrl + "/save_newsletter",  
      data:new FormData(this),
      processData: false, 
        contentType: false, 
      success:function(res){
         if(res.status_code == 200){
            toastr.success(res.message);
            $("#newslatter").trigger("reset");
         }else if(res.status_code == 301){
            $.each(res.message,function(key , value){
               toastr.warning(value);
            });
         }else if(res.status_code == 201){
            toastr.warning(res.message);
         }
      },error:function(e){
         console.log(e);       
      }
   });
});

// $("#payment").on("submit",function(e){
//   e.preventDefault(); 
//   $.ajaxSetup({
//         headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
//     });
//    $.ajax({ 
//       type:"post",
//       url:siteUrl + "/payment",  
//       data:new FormData(this),
//       processData: false, 
//         contentType: false, 
//       success:function(res){
//          if(res.status_code == 200){
//             toastr.success(res.message);
//             $("#newslatter").trigger("reset");
//          }else if(res.status_code == 301){
//             $.each(res.message,function(key , value){
//                toastr.warning(value);
//             });
//          }else if(res.status_code == 201){
//             toastr.warning(res.message);
//          }
//       },error:function(e){
//          console.log(e);       
//       }
//    });
// });

function validatecheck(){
   if ($('#name').val() =='' || $('#email').val() =='' || $('#country').val() =='' || $('#state').val() =='' || $('#city').val() =='' || $('#pincode').val() =='' || $('#address').val() =='') {
         toastr.warning('All Feilds Marked With * Are Required');
         $('#btn').attr('disabled',true);
   }else{
      $('#btn').attr('disabled',false);
   }
}

function show_passs(){
   val = $("#show_pass").val();
   if (val==1) {
      $("input:password").attr("type","text");
      $("#show_pass").val(2);
   }else{
      $("input[name=password]").attr("type","password");
      $("input[name=confirm_password]").attr("type","password");
      $("#show_pass").val(1);
   }
}

function submit(){
    id = $('#community_id').val();
    message = $('#message').val();
    $.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
      $.ajax({    
         url:siteUrl + '/send_community_chat',      
         type:'post',      
         data:{'id':id,'message':message},      
         success:function(response){ 
            if(response.status_code == 200){
               toastr["success"]("Message sent");
               show_chats($('#receiver_id').val());
               $('#chat_form').trigger('reset');
            }else if(response.status_code ==301){
               var dd = response.message ;
               for(var i=0; i<dd.length;i++){
                  toastr["error"](dd[i]);
               }
            }             
         },
      })
}


$(document).on("click",".icon", function(e){ 
    if ($(this).hasClass("fa fa-fw fa-eye-slash")) {
        $(this).removeClass('fa fa-fw fa-eye-slash');
        $(this).addClass('fa fa-fw fa-eye');
        $("#"+$(this).attr('data-ic')).attr("type", "text");
    } else {
        $(this).removeClass('fa fa-fw fa-eye');
        $(this).addClass('fa fa-fw fa-eye-slash');
        $("#"+$(this).attr('data-ic')).attr("type", "password");
    }
    
})

$(function() {
    $("#aadhar_front").on('change',function() {
        $('#image').attr('src','');
        if (this.files && this.files[0]) {
            position = 0 ;
            const image_name = [];
            const image_type = [];
            
            for (var i = 0; i < this.files.length; i++) {
            var reader = new FileReader();
            
            
            image_name.push(this.files[i].name);
            image_type.push(this.files[i].type.split('/')[1]);
            
            console.log(image_type[position]);
            console.log(this.files.length);
            console.log(this.files[i].type.split('/')[1]);
            reader.onload = function(e) {
                
                    $('#image').attr('src',e.target.result);
            }
            reader.readAsDataURL(this.files[i]);
            }
        }
    });
});

$(function() {
    $("#aadhar_back").on('change',function() {
        $('#image1').attr('src','');
        if (this.files && this.files[0]) {
            position = 0 ;
            const image_name = [];
            const image_type = [];
            
            for (var i = 0; i < this.files.length; i++) {
            var reader = new FileReader();
            
            
            image_name.push(this.files[i].name);
            image_type.push(this.files[i].type.split('/')[1]);
            
            console.log(image_type[position]);
            console.log(this.files.length);
            console.log(this.files[i].type.split('/')[1]);
            reader.onload = function(e) {
                
                    $('#image1').attr('src',e.target.result);
            }
            reader.readAsDataURL(this.files[i]);
            }
        }
    });
});

$(function() {
    $("#pan").on('change',function() {
        $('#image2').attr('src','');
        if (this.files && this.files[0]) {
            position = 0 ;
            const image_name = [];
            const image_type = [];
            
            for (var i = 0; i < this.files.length; i++) {
            var reader = new FileReader();
            
            
            image_name.push(this.files[i].name);
            image_type.push(this.files[i].type.split('/')[1]);
            
            console.log(image_type[position]);
            console.log(this.files.length);
            console.log(this.files[i].type.split('/')[1]);
            reader.onload = function(e) {
                
                    $('#image2').attr('src',e.target.result);
            }
            reader.readAsDataURL(this.files[i]);
            }
        }
    });
});