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

.row {
  padding: 40px !important;
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
			@csrf
			<input type="hidden" name="insurance" value="{{@$_GET['insurance']}}">
			<input type="hidden" name="policy" value="{{@$_GET['policy']}}">
			<input type="hidden" name="email" value="{{@$_GET['email']}}">
			<input type="hidden" name="phone" value="{{@$_GET['phone']}}">

		<h1>Health Insurance:</h1>

		<!-- One "tab" for each step in the form: -->
		<div class="tab"><h3>Do you have Health Insurance Coverage?</h3>
		<div class="row">

			<div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input oninput="add_div(0)" type="radio" class="custom-control-input" id="ck2d" name="health_coverage" checked>
		            <label class="custom-control-label" for="ck2d">
		                <img src="{{asset('uploads/default/yes.png')}}" alt="#" class="img-fluid">
		            </label>
		        </div>
		    </div>

		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input oninput="add_div(1)" type="radio" class="custom-control-input" id="ck3d" name="health_coverage">
		            <label class="custom-control-label" for="ck3d">
		                <img src="{{asset('uploads/default/no.jpg')}}" alt="#" class="img-fluid">
		            </label>
		        </div>
		    </div>


		    <div id="add_feilds"></div>
			
		</div>
		 
		</div>

		<div class="tab"><h3>Tell Us A Little Bit About Yourself -</h3>
		<div class="row">

			<div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="2" name="gender" checked>
		            <label class="custom-control-label" for="2">
		                <img src="{{asset('uploads/default/mal.png')}}" alt="#" class="img-fluid">
		            </label>
		        </div>
		    </div>

		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="3" name="gender">
		            <label class="custom-control-label" for="3">
		                <img src="{{asset('uploads/default/female.jpg')}}" alt="#" class="img-fluid">
		            </label>
		        </div>
		    </div>
		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="ck4d" name="gender">
		            <label class="custom-control-label" for="ck4d">
		                <img src="{{asset('uploads/default/other.png')}}" alt="#" class="img-fluid">
		            </label>
		        </div>
		    </div>


			
		</div>
		 
		</div>

		<div class="tab"><h3>How Many Members In Your Family Are Covered ?</h3>
		<div class="row">

			<div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="checkbox" class="custom-control-input" id="4" name="menbers[]" value="Wife" checked>
		            <label class="custom-control-label" for="4">
		            	Wife
		            </label>
		        </div>
		    </div>

		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="checkbox" class="custom-control-input" id="5" name="menbers[]" value="Son">
		            <label class="custom-control-label" for="5">
		            	Son
		            </label>
		        </div>
		    </div>
		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="checkbox" class="custom-control-input" id="6" name="menbers[]" value="Mother">
		            <label class="custom-control-label" for="6">
		            	Mother
		            </label>
		        </div>
		    </div><div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="checkbox" class="custom-control-input" id="7" name="menbers[]" value="Father">
		            <label class="custom-control-label" for="7">
		            	Father
		            </label>
		        </div>
		    </div><div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="checkbox" class="custom-control-input" id="8" name="menbers[]" value="Daughter">
		            <label class="custom-control-label" for="8">
		            	Daughter
		            </label>
		        </div>
		    </div>


			
		</div>
		 
		</div>

		<div class="tab"><h3>Age Of Members Already Covered ? (Comma Separated Ages Of Members)</h3>
		  <p><input placeholder="Age" name="age_already_covered" oninput="this.className = ''"></p>
		</div>

		<div class="tab"><h3>AGE OF THE MEMBERS NOT COVERED ?(Comma Separated Ages Of Members)</h3>
		  <p><input placeholder="Age" name="age_not_covered" oninput="this.className = ''"></p>
		</div>

		<div class="tab"><h3>DO YOU WANT TO COVER THOSE MEMBERS</h3>
		<div class="row">

			<div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input type="radio" class="custom-control-input" id="36" name="want_cover" checked>
		            <label class="custom-control-label" for="36">
		                <img src="{{asset('uploads/default/yes.png')}}" alt="#" class="img-fluid">
		            </label>
		        </div>
		    </div>

		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input type="radio" class="custom-control-input" id="37" name="want_cover">
		            <label class="custom-control-label" for="37">
		                <img src="{{asset('uploads/default/no.jpg')}}" alt="#" class="img-fluid">
		            </label>
		        </div>
		    </div>


			
		</div>
		 
		</div>

		<div class="tab"><h3>Name Of The Current Insurance Provider?</h3>
		<div class="row">

			<div class="col-md-3">
		        <select name="insurance_provider">
		        	<option>insurance1</option>
		        	<option>insurance1</option>
		        	<option>insurance1</option>
		        	<option>insurance1</option>
		        </select>
		    </div>
			
		</div>
		 
		</div>

		<div class="tab"><h3>How Long Have You Been Associated With Your Current Insurance Provider ?</h3>
		<div class="row">

				<div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="31" name="insurance_provider_time" checked>
		            <label class="custom-control-label" for="31">
		            	 Less Than A Year
		            </label>
		        </div>
		    </div>

		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="1131" name="insurance_provider_time">
		            <label class="custom-control-label" for="1131">
		            	1 - 2 Year
		            </label>
		        </div>
		    </div>

		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="32" name="insurance_provider_time">
		            <label class="custom-control-label" for="32">
		            	2 - 3 Year
		            </label>
		        </div>
		    </div>
		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="33" name="insurance_provider_time">
		            <label class="custom-control-label" for="33">
		            	3 - 4 Year
		            </label>
		        </div>
		    </div><div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="34" name="insurance_provider_time">
		            <label class="custom-control-label" for="34">
		            	4+ Year
		            </label>
		        </div>
		    </div>


			
		</div>
		 
		</div>

		<div class="tab"><h3>Are You Or Any Family Member Facing Any Disease?</h3>
		<div class="row">

			<div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input type="radio" class="custom-control-input" id="38" name="facing_desease" checked>
		            <label class="custom-control-label" for="38">
		                <img src="{{asset('uploads/default/yes.png')}}" alt="#" class="img-fluid">
		            </label>
		        </div>
		    </div>

		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input type="radio" class="custom-control-input" id="39" name="facing_desease">
		            <label class="custom-control-label" for="39">
		                <img src="{{asset('uploads/default/no.jpg')}}" alt="#" class="img-fluid">
		            </label>
		        </div>
		    </div>


			
		</div>
		 
		</div>

		<div class="tab"><h3>Disease You Or Your Family Member Is Currently Facing?</h3>
		  <p><input placeholder="Disease" name="desease" oninput="this.className = ''"></p>
		</div>

		<div class="tab"><h3>Time You First Diagnosed Your Disease?</h3>
		  <p><input placeholder="Disease" name="Diagnosed" oninput="this.className = ''"></p>
		</div>

		<div class="tab"><h3>What Is Your Pin Code?</h3>
		  <p><input placeholder="Pincode" name="pincode" oninput="this.className = ''"></p>
		</div>

		<div class="tab"><h3>What Is Your Income Bracket?</h3>
		<div class="row">

			<div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="11" name="income_bracket" checked>
		            <label class="custom-control-label" for="11">
		            	Less Than 2.5 Lakhs PA
		            </label>
		        </div>
		    </div>

		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="12" name="income_bracket">
		            <label class="custom-control-label" for="12">
		            	2.5 - 5 Lakhs PA
		            </label>
		        </div>
		    </div>
		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="13" name="income_bracket">
		            <label class="custom-control-label" for="13">
		            	5 -10 Lakhs PA
		            </label>
		        </div>
		    </div><div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="14" name="income_bracket">
		            <label class="custom-control-label" for="14">
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
		            <input type="radio" class="custom-control-input" id="16" name="update_policy" checked>
		            <label class="custom-control-label" for="16">
		                <img src="{{asset('uploads/default/yes.png')}}" alt="#" class="img-fluid">
		            </label>
		        </div>
		    </div>

		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input type="radio" class="custom-control-input" id="17" name="update_policy">
		            <label class="custom-control-label" for="17">
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
		            <input  type="radio" class="custom-control-input" id="18" name="health_insurance_importance" checked>
		            <label class="custom-control-label" for="18">
		            	Extremely Important 	
		            </label>
		        </div>
		    </div>

		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="19" name="health_insurance_importance">
		            <label class="custom-control-label" for="19">
		            	Somewhat Important 
		            </label>
		        </div>
		    </div>
		    <div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="20" name="health_insurance_importance">
		            <label class="custom-control-label" for="20">
		            	Neutral
		            </label>
		        </div>
		    </div><div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="21" name="health_insurance_importance">
		            <label class="custom-control-label" for="21">
		            	Somewhat Unimportant
		            </label>
		        </div>
		    </div><div class="col-md-3">
		        <div class="custom-control custom-radio image-checkbox">
		            <input  type="radio" class="custom-control-input" id="22" name="health_insurance_importance">
		            <label class="custom-control-label" for="22">
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