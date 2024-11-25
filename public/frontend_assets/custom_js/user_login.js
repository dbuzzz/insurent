$("#_login").on("submit",function(e){
	// alert(1);
	e.preventDefault();
	$.ajax({
		type:"post",
		url:siteUrl + "/login_user",
		data:new FormData(this),
		processData: false,
    	contentType: false,
		success:function(res){
			if(res.status_code == 200){
				window.location.href = siteUrl+"/";
				console.log('logib');			
			}else if(res.status_code == 202){
				$.each(res.error,function(key , value){
					toastr.warning(value);
				});
			}else if(res.status_code == 201){
				toastr.warning(res.message);
			}
		},error:function(e){
			console.log(e);		
		}
	});
})


$("#signup_form").on("submit",function(e){
	e.preventDefault();
	$.ajax({
		type:"post",
		url:siteUrl + "/SignUpuser",
		data:new FormData(this),
		processData: false,
    	contentType: false,
		success:function(res){
			if(res.status_code == 200){
				window.location.href = siteUrl+"/user-opt_verify/"+res.id;
			}else if(res.status_code == 202){
				$.each(res.error,function(key , value){
					console.log(value);
					toastr.warning(value);
				});
			}else if(res.status_code == 201){
				toastr.warning(res.message);
			}
		},error:function(e){
			console.log(e);		
		}
	});
})

$("#otp_vrify").on("submit",function(e){
	e.preventDefault();
	$.ajax({
		type:"post",
		url:siteUrl + "/verify_otp",
		data:new FormData(this),
		processData: false,
    	contentType: false,
		success:function(res){
			if(res.status_code == 200){
				window.location.href = siteUrl+"/user-login";
			}else if(res.status_code == 202){
				$.each(res.error,function(key , value){
					console.log(value);
					toastr.warning(value);
				});
			}else if(res.status_code == 201){
				toastr.warning(res.message);
			}
		},error:function(e){
			console.log(e);		
		}
	});
})