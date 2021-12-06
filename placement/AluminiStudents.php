

<?php

ob_start();
session_start();
// $con  = mysqli_connect("localhost","mzfrxmujjb","Q23bQYkskc","mzfrxmujjb") or die("Db not connected");
include('db.php');

$branch_data  ="select * from branch";
$branch_data1 = mysqli_query($con,$branch_data);
$course_data  ="select * from course";
$course_data1 = mysqli_query($con,$course_data);
// $app_job  = "select * from application_job";
// $app_job1 = mysqli_query($con,$app_job);
// $num = mysqli_num_rows($app_job1);
$app_job_number = "SELECT application_number FROM application_job ORDER BY application_id DESC LIMIT 1";
$app_job_number1 = mysqli_query($con,$app_job_number);
$app_job_number2 = mysqli_fetch_array($app_job_number1);
$new_no = $app_job_number2['application_number'];
$num = number_format(substr($new_no,4,7));
$num = $num + 1; 
// $num = 199;
	if($num>0 && $num<10){
		$app_no = "RWTP000".$num;
	}
	else if($num>=10 && $num <100){
		$app_no = "RWTP00".$num;
	}
	else if($num>=100 && $num <1000){
		$app_no = "RWTP0".$num;
	}
	else if($num>=1000 && $num <10000){
		$app_no = "RWTP".$num;
	}

	if(isset($_POST['submit']))
	{

	    $application_id = $_POST['application_id'];
		$application_number = $app_no;
		$name = $_POST['name'];
	    $wnumber = $_POST['wnumber'];
	    $schoolname = $_POST['schoolname'];
	    $owner_employee = $_POST['owner_employee'];

		if($name==''){
		    $name_error =  "enter Your Name";
		}
		else if ($wnumber == ''){
			$wnumber_error = "enter your Number";
		}
		else if($owner_employee == ''){
			$owner_error = "Please select Owner/employee";
		}
		else
		{


			if(!empty($_FILES['ophoto']['name'])){
				$imagephoto = $_FILES['ophoto']['name'];
				move_uploaded_file($_FILES['ophoto']['tmp_name'],"img/".$imagephoto);
			}else if(!empty($_FILES['ephoto']['name'])){
				$imagephoto = $_FILES['ephoto']['name'];
				move_uploaded_file($_FILES['ephoto']['tmp_name'],"img/".$imagephoto);
			}else{
				$imagephoto = '';
			}

			if(!empty($_POST['ocompany_name'])){
				$company_name = $_POST['ocompany_name'];
			}else if(!empty($_POST['ecompany_name'])){
				$company_name = $_POST['ecompany_name'];
			}else{
				$company_name ='';
			}


			if(!empty($_POST['schoolname'])){
				$schoolname = $_POST['schoolname'];
			}else{
				$schoolname ='';
			}

			if(!empty($_POST['odesignation'])){
				$designation = $_POST['odesignation'];
			}else if(!empty($_POST['edesignation'])){
				$designation = $_POST['edesignation'];
			}else{
				$designation ='';
			}

			if(!empty($_POST['ono_of_employee'])){
				$ono_of_employee = $_POST['ono_of_employee'];
			}else{
				$ono_of_employee ='';
			}

			if(!empty($_POST['esalary'])){
				$esalary = $_POST['esalary'];
			}else{
				$esalary = '0';
			}

			 $query ="insert into application_job(`application_number`,`name`,`number`,`school_name`,`owner_employee_type`,`photo`,`confirm_company_name`,`designation`,`no_of_employee`,`confirm_starting_salary_confirm`,`application_status`)values('$application_number','$name','$wnumber','$schoolname','$owner_employee','$imagephoto','$company_name','$designation','$ono_of_employee','$esalary','7')";
			// exit;
			 $already_record = "select * from application_job where `number`='$wnumber' AND `application_status`='7'";
     	   	 $already_record1 = mysqli_query($con,$already_record);
     	   	 $num = mysqli_num_rows($already_record1);
     	   	 if($num > 0 )
     	   	 {
     	   	 	$_SESSION['msg'] = "You Already Applied On This Application";
     	   	 	
     	   	 }
     	   	 else
     	   	 {
     	   	 	     // move_uploaded_file($_FILES['Signature']['tmp_name'], "img/".$Signature);
		     	   	 $re =  mysqli_query($con,$query);
		     	   	 if($re)
		     	   	 {
		     	   	 	$_SESSION['success'] = "successfully done";
        				// header("location:placement_ooPage.php");
		     	   	 }
		     	   	 else
		     	   	 {
		     	   	 	$data_wrong = "Something Wrong";
		     	   	 }
     	   	}
     	   }
}



//fill data

if(isset($_SESSION['grId']))
{
	$grid = $_SESSION['grId'];
	$service_url = 'https://erp.eduzilla.in/api/students/details';
	$curl = curl_init($service_url);
	$curl_post_data = array(
		'GR_ID' => $grid,
		'Inst_code' => 'RNWEDU',
        'Inst_security_code' => 'rnw',
	);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
	$curl_response = curl_exec($curl);
	if ($curl_response === false) {
	    $info = curl_getinfo($curl);
	    curl_close($curl);
	    die('error occured during curl exec. Additioanl info: ' . var_export($info));
	}
	curl_close($curl);
	$decode = json_decode($curl_response);
	$email = $decode->data[0]->email;
}

?>



<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

    <title>Job Application Submission Form</title>

    <script type="text/javascript">

			// function closeCurrentTab(){

			// 	var conf=confirm("Are you sure, you want to close this tab?");

			// 	if(conf==true){

			// 		alert('hello');

			// 		var myWindow = window.open("", "_self");

  	// 					myWindow.document.write("");

  	// 				setTimeout (function() {myWindow.close();},1000);

			// 	}

			// }



			function leave() {

				alert(open(location, '_self'));

				// 	var conf=confirm("Are you sure, you want to close this tab?");

			// 	if(conf==true){

				//close();

				}

</script>

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <link rel="stylesheet" href="css/style.css" type="text/css">

    <link rel="stylesheet" href="css/datepicker.min.css" type="text/css">

</head>



<body>







<div class="color-theme-1">

<div class="container text-center pt-3 pb-1">

    <a href="https://www.rnwmultimedia.com/" target="_blank"><img src="https://www.rnwmultimedia.com/wp-content/uploads/2021/01/GROUP-OF-INSTITUTES-1-01-01-1.png" width="320" alt="Red & White MUltimedia Education" title="Red & White MUltimedia Education"/></a>

</div>

</div>



<section>

<div class="container">

<form method="post" enctype="multipart/form-data" id="placement_form">

    

	<?php if(isset($_SESSION['msg'])) { ?>
		<div class="alert alert-danger" id="suc_msg"><?php echo $_SESSION['msg']; ?></div>
	<?php 
	unset($_SESSION['msg']); } ?>

	<?php if(isset($_SESSION['success'])) { ?>
		<div class="alert alert-success" id="suc_msg"><?php echo $_SESSION['success']; ?></div>
	<?php 
	 } unset($_SESSION['success']);?>

	<!-- <h3>Job Application</h3> --> 

    <span  style="color:red;"><?php echo @$data_wrong; ?></span>

	<div class="form-box">

		<div class="main-title">

        <!-- <h2>Applicant Information -->
        <h2>Placed Employee Form

        <span>Reg No. :&nbsp; <span> <?php echo $app_no; ?></span></span>

        <input type="hidden" class="form-control" name="application_number" required  value="<?php echo $app_no; ?>" /></h2>

    </div>

		

		<div class="box-inner">

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="GrId">Your Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter your full Name"  required/>
						<?php if(!empty($name_error)) { ?>
							<span style="color:red"><?php echo $name_error; ?></span>
						<?php } ?>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="GrId">What'sApp Number</label>
						<input type="text" class="form-control" id="wnumber" name="wnumber" placeholder="Enter your What'sapp Number" onkeypress="return isNumberKey(event);"  required/>
						<?php if(!empty($wnumber_error)) { ?>
							<span style="color:red"><?php echo $wnumber_error; ?></span>
						<?php } ?>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="GrId">School Name</label>
						<input type="text" class="form-control" id="schoolname" name="schoolname" placeholder="Enter School Name"   />
						<?php if(!empty($school_error)) { ?>
							<span style="color:red"><?php echo $school_error; ?></span>
						<?php } ?>
					</div>
				</div>


				<div class="col-md-6">
					<div class="form-group">
						<label>Select Owner/Employee</label>
						<select id="owner_employee" class="form-control"  name="owner_employee" required>
							<option value="">--Select Option --</option>
							<option value="owner">Owner</option>
							<option value="employee">Employee</option>
						</select>
					</div>
					<?php if(!empty($owner_error)) { ?>
							<span style="color:red"><?php echo $owner_error; ?></span>
						<?php } ?>
				</div>

			</div>


			<div class="row" id="owner">
				<div class="col-md-6">
					<div class="form-group">
						<label for="GrId">Company Name</label>
						<input type="text" class="form-control" id="ocompany_name" name="ocompany_name" placeholder="Enter Company name"  required/>
					</div>
				</div>

				<div class="col-md-6" id="owner_designation">
					<div class="form-group">
						<label for="GrId">Designation</label>
						<input type="text" class="form-control" id="odesignation" name="odesignation" placeholder="Enter Your Designation"  required/>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="GrId">No of Employee</label>
						<input type="text" class="form-control" id="ono_of_employee" name="ono_of_employee" placeholder="50"   required/>
					</div>
				</div>


				<div class="col-md-6">
					<div class="form-group">
						<label>Upload Photo</label>
						<input type="file" class="form-control" id="ophoto" name="ophoto"   required/>
						<img src="https://lh5.googleusercontent.com/ed5tXVbyVO2ILuXeHSa4nejZfMVcAC-woSqcA9XaeR2BYsgYjEe2Kr_EPL6HOFmY5mJxiYjS8o1ZAbC7ZDfFBMoNZo3Hea-6WfOmwyEMYCXo6BmqfKGlhjXRxBnpn7x9nA=w294" height="200" width="200">
					</div>
				</div>

			</div>


			<div class="row" id="employee">
				<div class="col-md-6">
					<div class="form-group">
						<label for="GrId">Company Name</label>
						<input type="text" class="form-control" id="ecompany_name" name="ecompany_name" placeholder="Enter Company name"  required/>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="GrId">Designation</label>
						<input type="text" class="form-control" id="edesignation" name="edesignation" placeholder="Enter Your Designation"  required/>
					</div>
				</div>

				

				<div class="col-md-12">
					<div class="form-group">
						<label>Upload Photo</label>
						<input type="file" class="form-control" id="ephoto" name="ephoto"    required/>
						<img src="https://lh5.googleusercontent.com/ed5tXVbyVO2ILuXeHSa4nejZfMVcAC-woSqcA9XaeR2BYsgYjEe2Kr_EPL6HOFmY5mJxiYjS8o1ZAbC7ZDfFBMoNZo3Hea-6WfOmwyEMYCXo6BmqfKGlhjXRxBnpn7x9nA=w294" height="200" width="200">
					</div>
				</div>

				<div class="col-md-12">
					<div class="form-group">
						<label for="GrId">Have You disclose your Salary?</label><br>
						<input type="radio"  id="dsalary" name="dsalary" value="yes" onclick="return getSalary('yes')" required/> YES<br><input type="radio"  id="dsalary" name="dsalary" value="no"   onclick="return getSalary('no')" required/> NO
					</div>
					<label id="dsalary-error" class="error" for="dsalary"></label>
				</div>

				<div class="col-md-12"  id="disclose_salary">
					<div class="form-group">
						<label>Enter Your Salary</label>
						<input type="text" class="form-control" id="esalary" name="esalary"   required placeholder="10000-100000" />
					</div>

				</div>

			</div>





			

				<br>

				

				

				
			</div>

		</div>

	</div>

	

	

  

    <div class="btn-cust">

        <input class="btn btn-success" type="submit" name="submit" value="submit">

       

    </div>

</form>

</div>

</section>





<!--  Terms & Conditions for students modal -->




<!--  email Confimation modal -->







<!--  Footer Section  -->



<script src="https://code.jquery.com/jquery-3.3.1.slim.js" type="text/javascript"></script>

<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script src="js/datepicker.min.js" type="text/javascript"></script>

<script>

    $('[data-toggle="datepicker"]').datepicker();

</script>







<script>

  $('#owner').hide();
  $('#employee').hide();
  $('#disclose_salary').hide();

  $("#owner_employee").change(function(){
  	  var oe = $("#owner_employee").val();
  	  // alert(oe);
  	  if(oe == 'owner'){
  	  	 $('#owner').show();
 		 $('#employee').hide();
 		 $('#owner_designation').hide();
  	  }else{
  	  	 $('#owner').hide();
 		 $('#employee').show();
 		 $('#owner_designation').show();
  	  }
  });

  function getSalary(data){
 	var radioValue = $("input[name='dsalary']:checked").val();
 	if(radioValue == 'yes'){
 		$('#disclose_salary').show();
 	}else{
 		$('#disclose_salary').hide();
 	}
 };

  

    $('#Employement_previous').hide();



    function acceRejTerms(data)

    {

    	if(data == 'reject')

    	{

    	$("#cust_checkbox").prop("checked", false);

    	}

    	else

    	{

    		$("#cust_checkbox").prop("checked", true);

    	

    		var email = $('#email').val();

    		// alert(email);

    		$.ajax({

    			url:'email_terms_condition.php',

    			type:'post',

    			data:{

    				'email' : email,

    				'terms' : 'accept'

    			},

    			success:function(data){

    				alert(data);	

    			}

    		});

    		return false;

    	}

    	

    }



function emplo_pre_data_yes()

{

    $('#Employement_previous').show(1000);

    $('#yes').prop('checked', true).attr('checked', 'checked');

    $('#no').prop('checked', false).attr('checked', 'checked');

}



function  emplo_pre_data_no()

{

    $('#Employement_previous').hide(1000);  

    $('#yes').prop('checked', false).attr('checked', 'checked');

    $('#no').prop('checked', true).attr('checked', 'checked'); 

}

function isNumberKey(evt)

      {

         var charCode = (evt.which) ? evt.which : event.keyCode

         if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;



         return true;

      }









   $('input[type="checkbox"]').on('change', function(e){

        if(e.target.checked){

     $('#exampleModalLong').modal();

   }

});





 function get_position_ca()

 {

 	var main_cat =  $('#job_main_category').val();

 	$.ajax({

 		url : "ajax_posi_cate.php",

 		type : "post",

 		data:{

 			'main_cate' : main_cat

 		},

 		success:function(Resp)

 		{

 			$('#position_for_apply').html(Resp);

 		}

 	});

 }



 function get_job_sub_cat()

 {

 	var sub_cat =  $('#position_for_apply').val();

 	

 	$.ajax({

 		url : "ajax_sub_cat_data.php",

 		type : "post",

 		data:{

 			'sub_cate_data':sub_cat

 		},

 		success: function(resp)

 		{

 			$('#job_subcategory').html(resp);

 		}

 	});

 }



</script>





<!-- <script>

$(document).ready(function(){

    $(".close-btn").click(function(){

        $("#cust_checkbox").prop("checked", false);

    });

});

</script> -->



<!-- Button trigger modal -->

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">

  Launch demo modal

</button> -->



<div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        ...

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <button type="button" class="btn btn-primary">Save changes</button>

      </div>

    </div>

  </div> 

</div>

</body>

</html>



<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>





<script>

	$('#suc_msg').fadeOut(5000);

// just for the demos, avoids form submit

$(document).ready(function(){
	$( "#placement_form" ).validate({
		rules: {
			name: {
				required: true
			},
			wnumber:{
				required:true,
				maxlength:10,
				minlength:10
			},
			schoolname :{

			},
			owner_employee:{
				required : true
			},
			ocompany_name:{
				required : true
			},
			odesignation:{
				required : true
			},
			ono_of_employee:{
				required : true,
				number : true
			},
			ophoto:{
				required: true
			},
			ecompany_name:{
				required : true
			},
			edesignation:{
				required : true
			},
			ephoto:{
				required : true
			},
			dsalary:{
				required : true
			},
			esalary:{
				required : true,
				number : true
			}
		},
		messages:{
			name:{
				required:"<div style='color:red'>Enter Name</div>"
			},
			wnumber:{
				required:"<div style='color:red'>Enter Phone Number</div>",
				maxlength:"<div style='color:red'>Enter Maximum 10 digits</div>",
				minlength:"<div style='color:red'>Enter Minimum 10 digits</div>"
			},
			owner_employee:{
				required:"<div style='color:red'>Select Owner/Employee</div>",
			},
			ocompany_name:{
				required:"<div style='color:red'>Enter Company Name</div>",
			},
			odesignation:{
				required:"<div style='color:red'>Enter your Designation</div>",
			},
			ono_of_employee:{
				required:"<div style='color:red'>How many employee</div>",
				number : "<div style='color:red'>Enter only Numbers</div>"
			},
			ophoto:{
				required : "<div style='color:red'>Upload Your Photo</div>",
			},
			ecompany_name:{
				required : "<div style='color:red'>Enter Company Name</div>",
			},
			edesignation:{
				required : "<div style='color:red'>Enter Your Designation</div>",
			},
			ephoto:{
				required : "<div style='color:red'>Upload Your Image</div>",
			},
			dsalary:{
				required : "<div style='color:red'>Have You Disclose salary or Not</div>",
			},
			esalary :{
				required : "<div style='color:red'>Enter Your Salary</div>",
				number : "<div style='color:red'>Enter Only Numbers</div>"
			}
		}
	});
});





// function get_student_record_grId()

// {

// 	var grid = $('#GrId').val();

// 	$.ajax({

// 		url:"ajax_api_student.php",

// 		type:"post",

// 		dataType : "json",

// 		data:{

// 			'grid' : grid

// 		},

// 		success:function(res)

// 		{

// 			console.log(res);

// 			$('#fname').val(res[0].fname);

// 			$('#lname').val(res[0].lname);

// 			$('#email').val(res[0].email);

// 			$('#phone').val(res[0].mobile);

// 			$('#admdate').val(res[0].admission_date);

// 			$('#mname').val(res[0].father_name);

// 			$('#pphone').val(res[0].father_mobile);



// 			if(res[0].branch_name == "Web Technology")

// 			{

// 				$("#branch").val(res[0].branch_name);

// 				$('#branch1').val("1");

// 			}

// 			else if(res[0].branch_name == "Yogichowk")

// 			{

// 				$("#branch").val(res[0].branch_name);

// 				$('#branch1').val("5");

// 			}



// 			// $('#branch').val(res[0].branch_name);

// 			$('#address').val(res[0].address);

// 			$('#coursePackage').val(res[0].course_package);

// 			// $('#course').val(res[0].lname);

// 			// $('#image').html(res[0]);

// 			$('#image_data').val(res[0].image['content']);

// 		}

// 	});

// }



function get_student_record_grId()

{

	var grid = $('#GrId').val();

	$.ajax({

		url:"ajax_api_student.php",

		type:"post",

		dataType : "json",

		data:{

			'grid' : grid

		},

		success:function(res)

		{

			console.log(res);

			$('#fname').val(res[0].fname);

			$('#lname').val(res[0].lname);

			$('#email').val(res[0].email);

			$('#phone').val(res[0].mobile);

			$('#admdate').val(res[0].admission_date);

			$('#mname').val(res[0].father_name);

			$('#pphone').val(res[0].father_mobile);



			if(res[0].branch_name == "Web Technology")

			{

				$("#branch").val(res[0].branch_name);

				$('#branch1').val("1");

			}

			else if(res[0].branch_name == "Yogichowk")

			{

				$("#branch").val(res[0].branch_name);

				$('#branch1').val("5");

			}



			// $('#branch').val(res[0].branch_name);

			$('#address').val(res[0].address);

			$('#coursePackage').val(res[0].course_package);

			// $('#course').val(res[0].lname);

			// $('#image').html(res[0]);

			$('#image_data').val(res[0].image['content']);

		}

	});

}

</script>







<script>
$("#Signature").change(function () {
	var validExtensions = ["png","jpeg","jpg"]
	var file = $(this).val().split('.').pop();
	var numb = $(this)[0].files[0].size/1024/1024;
	console.log(numb);
	numb = numb.toFixed(2);
	console.log(numb);
	if (validExtensions.indexOf(file) == -1) {
	    alert("Only formats are allowed : "+validExtensions.join(', '));
	    $(this).val('');
	}
	else if(numb > 0.1){
	  alert('to big, maximum is 100KB. You file size is: '+ numb +' KB');
	   $(this).val('');
	}
});
</script>