<?php

include('db.php');

session_start();



if((@$_SESSION['email_otp']=='')  && (@$_SESSION['mobile_otp']==''))

{

	session_destroy();

	header('location:ra.php');

}



     $sess_otp_email = $_SESSION['email_otp'];

     $sess_otp_mobile = $_SESSION['mobile_otp'];







  if(isset($_POST['submit_email']))

  {

  	$otp_email = $_POST['otp_email'];

  	if($otp_email == $sess_otp_email)

  	{

  		$_SESSION['email_verify'] = "verify";

  	}

  	else

  	{

  		$msg_email = "Email OTP not Match";

  	}

  }

  else

  {



  }





  if(isset($_POST['submit_mobile']))

  {

  	

  	$otp_mobile = $_POST['otp_mobile'];

  	if($otp_mobile == $sess_otp_mobile)

  	{

  		$_SESSION['mobile_verify'] = "verify";

  		

  	}

  	else

  	{

  		$msg_mobile = "Mobile OTP mot match";

  	}

  }

  else

  {



  }



?>



<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta https-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="https://www.rnwmultimedia.com/wp-content/uploads/2019/03/favicon-16x16.png" type="image/x-icon">

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



<style type="text/css">

	.form-box h3{

		font-size: 18px;

	}

	.btn-text {

	    font-size: 12px !important;

	    line-height: 30px !important;

	    padding: 0 30px !important;

	}

</style>



<div class="color-theme-1">

<div class="container text-center pt-3 pb-3">

    <a href="https://www.rnwmultimedia.com/" target="_blank" style="display: inline-block;"> <img src="img/rnw.png" width="320" alt="Red & White MUltimedia Education" title="Red & White MUltimedia Education"/></a>

</div>

</div>



<section>

<div class="container">

		<?php if(isset($_SESSION['msg'])){ ?>



			<div class="alert alert-danger" id="already_applied_msg"><?php echo $_SESSION['msg']; ?></div>

		<?php } ?>

		

    <?php if(isset($_SESSION['success'])) { ?>



            <div class="alert alert-success" id="suc_msg"><?php echo $_SESSION['success']; ?></div>



    <?php } 



    ?>

	<!-- <div class="main-title" style="display: inline-block; width: 100%;">

        <h2>Employment Application -->

        <!-- <span>APPLICATION NO.: <span> <?php echo $app_no; ?></span></span> -->

        <!-- <span><a href="https://demo.rnwmultimedia.com/placement/" style="text-decoration: none; padding:5px; color:white; background-color: #C52410; border-radius: 5px;">FIND JOBS</a> <span> <?php echo $app_no; ?></span></span> -->

        <!-- <input type="hidden" class="form-control" name="application_number" required  value="<?php echo $app_no; ?>" /></h2>

    </div> -->

    

	<div class="form-box">

	

		<h3>OTP Send Your Registered Email And Mobile No1</h3>

			<div class="row">			

				<div class="col-lg-6 col-12 mx-auto" style="margin-top:20px;">

					<div class="box-inner">

						<form method="post" >

							<div class="row">

								<div class="col-md-12">

									<div class="form-group">

								    <?php if(@$_SESSION['email_verify'] == 'verify') {  ?>

								    	<label for="GrId" style="color:green; ">Your Email is Verified Success!!</label>

								    <?php } else {  ?>

										<label for="GrId">Email OTP</label>

										<input type="text" class="form-control" id="otp_email" name="otp_email" placeholder="0001"  required  />

									<?php } ?>

									</div>

									<!-- <span style="color:red;" id="error_email_otp"><?php if(isset($msg_email)) { echo $msg_email;  }?></span>

									<br> -->

									<?php if(@$_SESSION['email_verify'] == 'verify') {  ?>

										<!-- <input class="btn btn-success" type="button" name="submit" value="Verify" id="_send_verify_otp_email"> -->

									<?php } else { ?>

										<div class="btn-cust">

											<input class="btn btn-success btn-text" type="submit" name="submit_email" value="Verify" >

										</div>

									<?php } ?>

								</div>

							</div>

						</form>

					</div>

				</div>

				<!-- <div class="col-lg-6 col-12 mx-auto" style="margin-top:20px;">

					<div class="box-inner">

						<form method="post" >

							<div class="row">

								<div class="col-md-12">

									<div class="form-group">

									<?php if(@$_SESSION['mobile_verify'] == 'verify') {  ?>

										<label for="GrId" style="color:green; ">Your mobile is Verified Success!!</label>

									<?php } else { ?>

										<label for="GrId">Mobile OTP</label>

										<input type="text" class="form-control" id="otp_mobile" name="otp_mobile"   required  />

									<?php } ?>

									</div>

								

									<?php if(@$_SESSION['mobile_verify'] == 'verify') {  ?>

									<?php } else { ?>

										<div class="btn-cust">

											<input class="btn btn-success btn-text" type="submit" name="submit_mobile" value="Verify" >

										</div>

									<?php } ?>

								</div>

							</div>

						</form>

					</div>

				</div> -->

			</div>		

		</div>

	<?php if(isset($_SESSION['email_verify'])=='verify') { ?>

			<a href="alumini_ra_confirm_placement_form.php" class="btn btn-danger">Go to Form</a>

	<?php } ?>

	</div>

	

	

</div>

</section>





<!--  Terms & Conditions for students modal -->



<!--  email Confimation modal -->







<!--  Footer Section  -->

<section class="pt-3 pb-3 text-center text-white copyright" style="background-color: #1c2023;">

<div class="container">

    © Copyright 2020. <a href="https://www.rnwmultimedia.com/" target="_blank">Red & White Multimedia Education</a>. All Rights Reserved.

</div>

</section>



<script src="https://code.jquery.com/jquery-3.3.1.slim.js" type="text/javascript"></script>

<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script src="js/datepicker.min.js" type="text/javascript"></script>

<script>

    $('[data-toggle="datepicker"]').datepicker();

</script>









</body>

</html>



<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>





<script>





$(document).ready(function () {

  //called when key is pressed in textbox

  $("#GrId").keypress(function (e) {

     //if the letter is not digit then display error and don't type anything

     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {

        //display error message

        $("#error_grid").html("Digits Only").show();

               return false;

    }

    else

    {

    	$("#error_grid").html("").show();

    	return true;

    }

   });

});







// $('#already_applied_msg').fadeOut(5000);

</script>





<script>



$('#_send_verify_otp_email').click(function(event){

	event.preventDefault();

	var ee = document.querySelector('#otp_email');

	var email_otp = $('#otp_email').val();

	if(email_otp == '')

	{

		ee.style.borderColor ='red';

	

		$('#error_email_otp').html('');

			// $('#error_email_otp').html('Please enter email OTP!');

	}

	else

	{

	

	// var ee = document.querySelector('#otp_email');

	$('#error_email_otp').html('');

	ee.style.borderColor ='';



	console.log(email_otp);

	$.ajax({

		url : "ra_check_email_otp_verify.php",

		type : "POST",

		data : {

			'otp_email' : email_otp

		},

		success:function(response)

		{

			// $('#_send_verify_otp_email').remove('btn');

			console.log(response);

			// if(response == 1)

			// {



			// }

			// else

			// {

			// 	$('#error_email_otp').html(response);

			// 	ee.style.borderColor ='red';

			// }

		}

	});

	// return false;



	}

	// return false;

});





	</script>