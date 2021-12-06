<?php
ob_start();
session_start();
if(isset($_SESSION['otp'])=='')
{
	header("location:student_placement_form.php");
}
if(isset($_POST['submit']))
{
	$otp =  $_POST['otp'];
	$otp_check =  $_SESSION['otp'];
	if($otp ==  $otp_check)
	{
		header("location:confirm_student_form.php");
	}
	else
	{
		$_SESSION['error'] = "Please Enter Valid OTP";
	}
}
// echo $_SESSION['otp'];
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
    <a href="https://www.rnwmultimedia.com/" target="_blank"><img src="img/rnw.png" width="320" alt="Red & White MUltimedia Education" title="Red & White MUltimedia Education"/></a>
</div>
</div>

<section>
<div class="container">

    <?php if(isset($_SESSION['success'])) { ?>

            <div class="alert alert-success" id="suc_msg"><?php echo $_SESSION['success']; ?></div>

    <?php } 

     if(isset($_SESSION['error'])) { ?>

            <div class="alert alert-danger" id="suc_msg"><?php echo $_SESSION['error']; ?></div>

    <?php } 

    unset($_SESSION['success']);
    unset($_SESSION['error']); ?>
	<div class="main-title">
        <h2>Employment OTP Check
        <!-- <span>APPLICATION NO.: <span> <?php echo $app_no; ?></span></span> -->
        <input type="hidden" class="form-control" name="application_number" required  value="<?php echo $app_no; ?>" /></h2>
    </div>
    <form method="post" enctype="multipart/form-data" id="placement_form" >
	<div class="form-box">
		
		<div class="box-inner">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="GrId">Enter OTP::</label>
						<input type="text" class="form-control" id="otp" name="otp" placeholder="12345"  required  />
					</div>
					<span style="color:red;" id="otp_check"></span>
				</div>
				
				
			</div>
		</div>
	</div>
	
	
	
  
    <div class="btn-cust">
        <input class="btn btn-success" type="submit" name="submit" value="submit"
       >
       
    </div>
</form>
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


