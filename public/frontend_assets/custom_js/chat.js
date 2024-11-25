$(document).ready(function() {
     uri = window.location.href.substr(window.location.protocol.length + window.location.hostname.length + 2);
    show_chats(uri.split("?")[1].split("=")[1]);
});
function show_chats(id){
    $(".nav-item").removeClass("bg-info");
    $("#chat"+id).addClass("bg-info");
    $('#search').val('');
    $(".direct-chat-messages ul li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf('') > -1)
    });
    $("#count_chat"+id).remove();
        if (id) {
            // showLoader();
            $("tr.tr-active").removeClass("tr-active");
            $(this).addClass("tr-active");
            $.ajax({
                url: siteUrl + "/show_comm_chat/" + id,
                success: function (result) {
                    $("#message_container").html(result);
                    $("#chat-app").animate({ scrollTop: $('#chat-app').height()+$(document).height()});
                },
            });
        }
    
}

$(document).on('submit','#chat_form',function(e){ 
      e.preventDefault();  
      $.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
      $.ajax({    
         url:siteUrl + '/send_community_chat',     
         type:'post',      
         data:new FormData(this),      
         dataType:'json', 
         contentType:false,
         processData: false,     
         success:function(response){ 
            if(response.status_code == 200){
               toastr["success"]("Message sent");
               show_chats(uri.split("?")[1].split("=")[1]);
               $('#chat_form').trigger('reset');
            }else if(response.status_code ==301){
               var dd = response.message ;
               for(var i=0; i<dd.length;i++){
                  toastr["error"](dd[i]);
               }
            }             
         },
      })
   });