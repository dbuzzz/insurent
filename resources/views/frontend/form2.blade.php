@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

<style type="text/css">
	/* Style the form */
#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h3 {
    position: relative;
    font-size: 26px;
    line-height: 1.4em;
    font-weight: 700;
    color: black;
}
h1 {
    font-size: 56px;
    color: black;
}

/* Style the input fields */
input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}
.row {
  padding: 40px !important;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
</style>
 
@endsection
@section('content')
<!-- Success Section -->
    <section class="success-section">
		<form id="regForm">

		<h1>Motor Insurance : </h1>

		

	

		<div class="tab"><h3>What Type Of Vehicle It Is ? </h3>
		<div class="row">

			<div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="4" name="health_coverage" checked>
		            <label class="custom-control-label" for="4">
		            	Two Wheeler 
		            </label>
		        </div>
		    </div>

		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="5" name="health_coverage">
		            <label class="custom-control-label" for="5">
		            	Four Wheeler
		            </label>
		        </div>
		    </div>
		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="6" name="health_coverage">
		            <label class="custom-control-label" for="6">
		            	Commercial
		            </label>
		        </div>
		    </div>


			
		</div>
		 
		</div>

		<div class="tab"><h3>Registration Type [ Only For Commercial & Cars ] </h3>
		<div class="row">

			<div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="7" name="health_coverage" checked>
		            <label class="custom-control-label" for="7">
		            	TPublic
		            </label>
		        </div>
		    </div>

		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="8" name="health_coverage">
		            <label class="custom-control-label" for="8">
		            	Private
		            </label>
		        </div>
		    </div>
			
		</div>
		 
		</div>

		<div class="tab"><h3>Do You Currently Have Motor Insurance Coverage?</h3>
		<div class="row">

			<div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input type="radio" class="custom-control-input" id="ck2d1" name="health_coverage" checked>
		            <label class="custom-control-label" for="ck2d1">
		                <img src="{{asset('uploads/default/yes.png')}}" alt="#" class="img-fluid">
		            </label>
		        </div>
		    </div>

		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input type="radio" class="custom-control-input" id="ck3d2" name="health_coverage">
		            <label class="custom-control-label" for="ck3d2">
		                <img src="{{asset('uploads/default/no.jpg')}}" alt="#" class="img-fluid">
		            </label>
		        </div>
		    </div>


			
		</div>
		 
		</div>

		<div class="tab"><h3>Registration Type [ Only For Commercial & Cars ] </h3>
		<div class="row">

			<div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="9" name="health_coverage" checked>
		            <label class="custom-control-label" for="9">
		            	Comprehensive
		            </label>
		        </div>
		    </div>

		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="109" name="health_coverage">
		            <label class="custom-control-label" for="109">
		            	Third Party
		            </label>
		        </div>
		    </div>

		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="10" name="health_coverage">
		            <label class="custom-control-label" for="10">
		            	Own Damage
		            </label>
		        </div>
		    </div>
			
		</div>
		 
		</div>

		<div class="tab"><h3>Name Of The Current Insurance Provider?</h3>
		<div class="row">

			<div class="col-md-3">
		        <select>
		        	<option>insurance1</option>
		        	<option>insurance1</option>
		        	<option>insurance1</option>
		        	<option>insurance1</option>
		        </select>
		    </div>
			
		</div>
		 
		</div>

		<div class="tab"><h3>How Long Have You Been Associated With Your Current Insurance Provider ? </h3>
		<div class="row">

			<div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="checkbox" class="custom-control-input" id="a4" name="health_coverage" checked>
		            <label class="custom-control-label" for="a4">
		            	Less Than A Year
		            </label>
		        </div>
		    </div>

		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="checkbox" class="custom-control-input" id="a14" name="health_coverage">
		            <label class="custom-control-label" for="a14">
		            	1 - 2 Year
		            </label>
		        </div>
		    </div>

		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="checkbox" class="custom-control-input" id="a5" name="health_coverage">
		            <label class="custom-control-label" for="a5">
		            	2 - 3 Year
		            </label>
		        </div>
		    </div>
		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="checkbox" class="custom-control-input" id="a6" name="health_coverage">
		            <label class="custom-control-label" for="a6">
		            	3 - 4 Year
		            </label>
		        </div>
		    </div><div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="checkbox" class="custom-control-input" id="a7" name="health_coverage">
		            <label class="custom-control-label" for="a7">
		            	4+ Year
		            </label>
		        </div>
		    </div>


			
		</div>
		 
		</div>


		<div class="tab"><h3>What Is Your Pin Code?</h3>
		  <p><input placeholder="Pincode" oninput="this.className = ''"></p>
		</div>

		<div class="tab"><h3>What Is Your Income Bracket?</h3>
		<div class="row">

			<div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="checkbox" class="custom-control-input" id="b4" name="health_coverage" checked>
		            <label class="custom-control-label" for="b4">
		            	Less Than 2.5 Lakhs PA
		            </label>
		        </div>
		    </div>

		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="checkbox" class="custom-control-input" id="b5" name="health_coverage">
		            <label class="custom-control-label" for="b5">
		            	2.5 - 5 Lakhs PA
		            </label>
		        </div>
		    </div>
		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="checkbox" class="custom-control-input" id="b6" name="health_coverage">
		            <label class="custom-control-label" for="b6">
		            	5 -10 Lakhs PA
		            </label>
		        </div>
		    </div><div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="checkbox" class="custom-control-input" id="b7" name="health_coverage">
		            <label class="custom-control-label" for="b7">
		            	More Than 10 Lakhs PA
		            </label>
		        </div>
		    </div>


			
		</div>
		 
		</div>	

		<div class="tab"><h3>Planning To Update Your Health Insurance Policy?</h3>
		<div class="row">

			<div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input type="radio" class="custom-control-input" id="ck2dad" name="health_coverage" checked>
		            <label class="custom-control-label" for="ck2dad">
		                <img src="{{asset('uploads/default/yes.png')}}" alt="#" class="img-fluid">
		            </label>
		        </div>
		    </div>

		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input type="radio" class="custom-control-input" id="ck3dad" name="health_coverage">
		            <label class="custom-control-label" for="ck3dad">
		                <img src="{{asset('uploads/default/no.jpg')}}" alt="#" class="img-fluid">
		            </label>
		        </div>
		    </div>

		</div>
		 
		</div>

		<div class="tab"><h3>How Important You Considered Health Insurance To be?</h3>
		<div class="row">

			<div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="checkbox" class="custom-control-input" id="p4" name="health_coverage" checked>
		            <label class="custom-control-label" for="p4">
		            	Extremely Important 	
		            </label>
		        </div>
		    </div>

		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="checkbox" class="custom-control-input" id="p5" name="health_coverage">
		            <label class="custom-control-label" for="p5">
		            	Somewhat Important 
		            </label>
		        </div>
		    </div>
		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="checkbox" class="custom-control-input" id="p6" name="health_coverage">
		            <label class="custom-control-label" for="p6">
		            	Neutral
		            </label>
		        </div>
		    </div><div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="checkbox" class="custom-control-input" id="p7" name="health_coverage">
		            <label class="custom-control-label" for="p7">
		            	Somewhat Unimportant
		            </label>
		        </div>
		    </div><div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="checkbox" class="custom-control-input" id="p7" name="health_coverage">
		            <label class="custom-control-label" for="p7">
		            	Extremely Unimportant
		            </label>
		        </div>
		    </div>


			
		</div>
		 
		</div>	

		<div style="overflow:auto;">
		  <div style="float:right;">
		    <button type="button" class="theme-btn btn-style-three" id="prevBtn" onclick="nextPrev(-1)"><span class="txt">Previous</span></button>
		    <button type="button" class="theme-btn btn-style-three" id="nextBtn" onclick="nextPrev(1)"><span class="txt">Next</span></button>
		  </div>
		</div>

		<!-- Circles which indicates the steps of the form: -->
		<div style="text-align:center;margin-top:40px;">
		  <span class="step"></span>
		  <span class="step"></span>
		  <span class="step"></span>
		  <span class="step"></span>
		  <span class="step"></span>
		  <span class="step"></span>
		  <span class="step"></span>
		  <span class="step"></span>
		  <span class="step"></span>
		  <span class="step"></span>
		  
		</div>

		</form>
	</section>
	


@endsection
@section('extern-js')

<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
<script type="text/javascript">
	var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
    $('#nextBtn').attr('type','submit');
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  // if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  // if (currentTab >= x.length) {
  //   //...the form gets submitted:
  //   document.getElementById("regForm").submit();
  //   return false;
  // }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

// function validateForm() {
//   // This function deals with validation of the form fields
//   var x, y, i, valid = true;
//   x = document.getElementsByClassName("tab");
//   y = x[currentTab].getElementsByTagName("input");
//   // A loop that checks every input field in the current tab:
//   for (i = 0; i < y.length; i++) {
//     // If a field is empty...
//     if (y[i].value == "") {
//       // add an "invalid" class to the field:
//       y[i].className += " invalid";
//       // and set the current valid status to false:
//       valid = false;
//     }
//   }
//   // If the valid status is true, mark the step as finished and valid:
//   if (valid) {
//     document.getElementsByClassName("step")[currentTab].className += " finish";
//   }
//   return valid; // return the valid status
// }

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}

function add_div(id){
	if (id) {
		html ='<div id="added_div"> <h3>WHAT ARE THE CONDITIONS LIST OF REASONS INCLUDING -:</h3> <div class="col-md-12"> <div class="custom-control custom-radio image-checkbox"> <input type="radio" class="custom-control-input" id="ck3d1" name="health_condition"> <label class="custom-control-label" for="ck3d1">I HAVE ANY PRE EXISTING DISEASE </label> </div> </div> <div class="col-md-12"> <div class="custom-control custom-radio image-checkbox"> <input type="radio" class="custom-control-input" id="ck3d2" name="health_condition"> <label class="custom-control-label" for="ck3d2">MY FAMILY MEMBER HAS PRE EXISTING DISEASE </label> </div> </div> <div class="col-md-12"> <div class="custom-control custom-radio image-checkbox"> <input type="radio" class="custom-control-input" id="ck3d3" name="health_condition"> <label class="custom-control-label" for="ck3d3">HAVE SERVICES ISSUE </label> </div> </div> <div class="col-md-12"> <div class="custom-control custom-radio image-checkbox"> <input type="radio" class="custom-control-input" id="ck3d4" name="health_condition"> <label class="custom-control-label" for="ck3d4">HAVE CLAIM ISSUES </label> </div> </div> <div class="col-md-12"> <div class="custom-control custom-radio image-checkbox"> <input type="radio" class="custom-control-input" id="ck3d5" name="health_condition"> <label class="custom-control-label" for="ck3d5">HAVE PREMIUM ISSUES </label> </div> </div> </div>';
		$('#add_feilds').after(html);
	}else{
		$('#added_div').remove();
	}
}

$("#regForm").on("submit",function(e){
  e.preventDefault(); 
  $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
    });
	$.ajax({ 
		type:"post",
		url:siteUrl + "/save_form",  
		data:new FormData(this),
		processData: false, 
        contentType: false, 
		success:function(res){
			toastr.success('Data inserted');
			setTimeout( window.location.href = siteUrl+ "/",2000);   
			if(res.status_code == 200){
				toastr.success(res.message);
				reset();
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
</script>
@endsection