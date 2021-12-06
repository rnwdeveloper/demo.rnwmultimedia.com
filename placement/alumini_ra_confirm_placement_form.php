<?php

//ob_start();

session_start();



if(isset($_SESSION['email_verify'])!='verify')

{

	header('location:ra.php');

}


include('db.php');
// $con  = mysqli_connect("localhost","mzfrxmujjb","Q23bQYkskc","mzfrxmujjb") or die("Db not connected");



$branch_data  ="select * from branch";

$branch_data1 = mysqli_query($con,$branch_data);



$course_data  ="select * from course";

$course_data1 = mysqli_query($con,$course_data);



$package_data  ="select * from course";

$package_data1 = mysqli_query($con,$package_data);



$faculty_data  ="select * from faculty";

$faculty_data1 = mysqli_query($con,$faculty_data);



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

    if($num>0 && $num<10)

    {

      $app_no = "RWTP000".$num;

    }

    else if($num>=10 && $num <100)

    {



      $app_no = "RWTP00".$num;

    }

    else if($num>=100 && $num <1000)

    {

        $app_no = "RWTP0".$num;

    }

     else if($num>=1000 && $num <10000)

    {

        $app_no = "RWTP".$num;

    }





    $g_id = "SELECT gr_id FROM application_job where `gr_id` LIKE 'Alumini%' ORDER BY application_id DESC LIMIT 1";

$g_id1 = mysqli_query($con,$g_id);

$g_id2 = mysqli_fetch_array($g_id1);

$new_no = $g_id2['gr_id'];



$num = number_format(substr($new_no,8,12));

  $num = $num + 1; 

// $num = 199;

    if($num>0 && $num<10)

    {

      $gr_id = "Alumini_000".$num;

    }

    else if($num>=10 && $num <100)

    {



      $gr_id = "Alumini_00".$num;

    }

    else if($num>=100 && $num <1000)

    {

        $gr_id = "Alumini_0".$num;

    }

     else if($num>=1000 && $num <10000)

    {

        $gr_id = "Alumini_".$num;

    }









if(isset($_POST['submit']))

{

    $application_id = $_POST['application_id'];

    $application_number = $_POST['application_number'];

    

    $fname = $_POST['fname'];

    $mname = $_POST['mname'];

    $lname = $_POST['lname'];

    $name = $fname." ".$mname." ".$lname;



    $admission_date=  $_POST['admdate'];

    $pphone =  $_POST['pphone'];



    $no_r =  rand(10000,99999);

    $username_data =  $_POST['email'];

    $pas =  $fname.$no_r;



    $_SESSION['username'] = $username_data;

    $_SESSION['password'] = $pas;



    $branch_id = $_POST['branch_id'];

    $address = $_POST['address'];

    $city = $_POST['city'];

    $email = $_POST['email'];

    $zipcode = $_POST['zipcode'];

    $number = $_POST['phone'];

    $gr_id = $_POST['gr_id'];

    $course = $_POST['course'];

    $qualification = isset($_POST['qualification'])?$_POST['qualification'] : "";

    $faculty_id = isset($_POST['faculty_id'])? $_POST['faculty_id']:"";

    $position_for_apply = isset($_POST['position_for_apply'])?$_POST['position_for_apply']:"";

   

    $job_main_category = isset($_POST['job_main_category'])?$_POST['job_main_category']:"";

   

    $job_subcategory = isset($_POST['job_subcategory'])?$_POST['job_subcategory']:"";

   

    $salary_expectation = isset($_POST['salary_expectation'])?$_POST['salary_expectation']:"";

    $running_topic = isset($_POST['running_topic'])? $_POST['running_topic'] : "";

    $prefer_job_location = isset($_POST['prefer_job_location'])? $_POST['prefer_job_location'] : "" ;

    $batch_time = isset($_POST['batch_time'])? $_POST['batch_time'] : "";

    $remarks = isset($_POST['remarks'])? : "";

    $company_name = isset($_POST['company_name'])? $_POST['company_name'] : "";

    $company_number = isset($_POST['company_number'])? $_POST['company_number'] : "";

    $company_sup_name = isset($_POST['company_sup_name'])? $_POST['company_sup_name'] : "";

    $job_title = isset($_POST['job_title'])? $_POST['job_title'] :"";

    $starting_salary = isset($_POST['starting_salary'])? $_POST['starting_salary'] : "";

    $ending_salary = isset($_POST['ending_salary'])? $_POST['ending_salary'] : "";

    $responsibilities = isset($_POST['responsibilities'])? $_POST['responsibilities'] : "";

    $leave_from = isset($_POST['leave_from'])? $_POST['leave_from'] :"";

    $leave_to = isset($_POST['leave_to'])? $_POST['leave_to'] :"";

    $leave_reason = isset($_POST['leave_reason'])? $_POST['leave_reason'] : "" ;

    $application_date = isset($_POST['application_date'])? $_POST['application_date'] : "";

    $skill = isset($_POST['skills'])? $_POST['skills']:"";

    $Signature = $_FILES['Signature']['name'];

    $photo = $_FILES['photo']['name'];



	  $type = $_FILES['photo']['type'];

	  $format = array("png","jpg","jpeg","gif","svg");



	  $image_type = $_FILES['Signature']['type'];

	  $image_format = array("png","jpg","jpeg","gif","svg");



	  	$q ="select * from ayush where `email`='$email'";

		  $qu = mysqli_query($con,$q);

		  $num = mysqli_num_rows($qu);

		  if($email=='')

		  {

		     $email_error =  "Email should not be Blank";

		  }

		  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

		     $email_error = "Invalid email format";

		   }

		   else if($num>=1)

		   {

		    $email_error ="Email is already exist";

		   }

	   	   else if($Signature  == '')

		  {

		     $image_error =  "select image";

		  }

		  else if(!in_array($image_type,$image_format))

		  {

		     $image_error = "Invalid file format";

		  }

		  else if($photo  == '')

		  {

		     $image_error =  "select image";

		  }

		  else if(!in_array($type,$format))

		  {

		     $image_error = "Invalid file format";

		  }

		  







	



    $query ="insert into application_job(`application_id`,`application_number`,`admission_date`,`parents_phone`,`name`,`branch_id`,`skill`,`address`,`city`,`email`,`zipcode`,`number`,`gr_id`,`course`,`qualification`,`faculty_id`,`job_main_category`,`job_subcategory`,`position_for_apply`,`salary_expectation`,`running_topic`,`prefer_job_location`,`batch_time`,`remarks`,`company_name`,`company_number`,`company_sup_name`,`job_title`,`starting_salary`,`ending_salary`,`responsibilities`,`leave_from`,`leave_to`,`leave_reason`,`application_date`,`photo`,`username`,`password`,`Signature`,`certificate_no`)values('$application_id','$application_number','$admission_date','$pphone','$name','$branch_id','$skill','$address','$city','$email','$zipcode','$number','$gr_id','$course','$qualification','$faculty_id','$job_main_category','$job_subcategory','$position_for_apply','$salary_expectation','$running_topic','$prefer_job_location','$batch_time','$remarks','$company_name','$company_number','$company_sup_name','$job_title','$starting_salary','$ending_salary','$responsibilities','$leave_from','$leave_to','$leave_reason','$application_date','$photo','$username_data','$pas','$Signature','$certificate_no')";



    $already_record = "select * from application_job where `email`='$email' AND `application_status`!='2'";

     	   	 $already_record1 = mysqli_query($con,$already_record);

     	   	 $num = mysqli_num_rows($already_record1);

     	   	 if($num > 0 )

     	   	 {

     	   	 	$_SESSION['msg'] = "You Have Already Applied On This Application";

     	   	 	?>

     	   	 	<script>window.location="ra.php";

     	   	 	</script>

     	   	 	<?php

     	   	 }

     	   	 else

     	   	 {

     	   	 	     move_uploaded_file($_FILES['Signature']['tmp_name'], "img/".$Signature);

     	   	 	     move_uploaded_file($_FILES['photo']['tmp_name'], "img/".$photo);

		     	   	 $re =  mysqli_query($con,$query);

		     	   	 if($re)

		     	   	 {

		     	   	 	$_SESSION['success'] = "Registeration successfully done";

        				header("location:alumini_ra_testmail.php?email=$email");

		     	   	 }

		     	   	 else

		     	   	 {

		     	   	 	$data_wrong = "Something Wrong";

		     	   	 }

     	   	}



	

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

    <a href="https://www.rnwmultimedia.com/" target="_blank"><img src="img/rnw.png" width="320" alt="Red & White MUltimedia Education" title="Red & White MUltimedia Education"/></a>

</div>

</div>



<section>

<div class="container">

<form method="post" enctype="multipart/form-data" id="placement_form">

    <?php if(isset($_SESSION['success'])) { ?>



            <div class="alert alert-success" id="suc_msg"><?php echo $_SESSION['success']; ?></div>



    <?php } 



    unset($_SESSION['success']); ?>

	<div class="main-title">

        <h2>Employment Application

        <span>APPLICATION NO.: <span> <?php echo $app_no; ?></span></span>

        <input type="hidden" class="form-control" name="application_number" required  value="<?php echo $app_no; ?>" /></h2>

    </div>

    <span  style="color:red;"><?php echo @$data_wrong; ?></span>

	<div class="form-box">

		<h3>Applicant Information</h3>

		<div class="box-inner">

			<div class="row">

				<div class="col-md-6">

					<div class="form-group">

						<label for="GrId">Gr Id</label>

						<input type="text" class="form-control" id="GrId" name="gr_id" value="<?php if(isset($gr_id)){ echo $gr_id; } ?>" placeholder="0001"  required readonly/>

					</div>

				</div>

				<div class="col-md-6">

					<div class="form-group">

						<?php date_default_timezone_set("Asia/Calcutta");



                                $admdate =  date('d/m/Y h:i A'); ?>

						<label>Admission Date</label>

						<input type="text" class="form-control" name="admdate" placeholder="Admission Date" value="<?php if(isset($admdate)){ echo $admdate; } ?>" id="admdate"

						 required readonly/>

					</div>

				</div>

				<br>

				<div class="col-md-4">

					<div class="form-group">

						<label>First Name</label>

						<input type="text" class="form-control" name="fname" placeholder="First Name" id="fname" required />

					</div>

				</div>

				<div class="col-md-4">

					<div class="form-group">

						<label>Middle Name</label>

						<input type="text" class="form-control" name="mname"  id="mname" placeholder="Middle Name" required />

						

					</div>

				</div>

				<div class="col-md-4">

					<div class="form-group">

						<label>Last Name</label>

						<input type="text" class="form-control" name="lname" placeholder="Last Name" id="lname" required 

						 />

					</div>

				</div>

				<!-- <input type="hidden" id="image_data" name="image_data"  value="<?php if(isset($decode->data[0]->image->content)){echo $decode->data[0]->image->content; } ?>"> -->

				<!-- <div class="col-md-4">

					<div class="form-group">

						<label>Upload Photo</label>

						<input type="file" class="form-control"  name="image" readonly/>

						<div id="image">

							<input type="hidden" id="image_data" name="image_data"></div>

						</div>

				</div> -->

				<div class="col-md-4">

					<div class="form-group">

						<label>Branch Name</label>

						<select id="branch" class="form-control" required name="name">

							<option  value=''>Branch</option>

							<?php while($branch_data2 = mysqli_fetch_array($branch_data1))  { ?>

									<option value="<?php echo $branch_data2['branch_id']; ?>"><?php echo $branch_data2['branch_name']; ?></option>

							<?php } ?>

						</select>

					</div>

				</div>

				<div class="col-md-4">

					<div class="form-group">

						<label>City</label>

						<input type="text" class="form-control"  placeholder="City" required name="city"/>

					</div>

				</div>



				<div class="col-md-12">

					<div class="form-group">

						<label>Residential Address</label>

						<textarea type="text" class="form-control" placeholder="Your Address" name="address" id="address" required 

						></textarea>

					</div>

				</div>

				

				<div class="col-md-4">

					<div class="form-group">

						<label>Zipcode</label>

						<input type="text" class="form-control"  placeholder="395006" required maxlength="6" name="zipcode"/>

					</div>

				</div>



				<div class="col-md-4">

					<div class="form-group">

						<label>Email Id</label>

						<input type="text" id="email" class="form-control" placeholder="Enter Email" id="email" required name="email"  readonly value="<?php if(isset($_SESSION['email_alumini'])) { echo $_SESSION['email_alumini']; } ?>" />

						<?php if(isset($email_error)) { ?>

	                      <span style="color:red;"> <?php  echo $email_error; ?></span> 

	                <?php } ?>

					</div>

				</div> 





				<div class="col-md-4">

					<div class="form-group">

						<label>Student Mobile No</label>

						<input type="text" class="form-control" placeholder="Enter phone" id="phone" required name="phone"   maxlength="10"  value="<?php if(isset($_SESSION['mobile_alumini'])) { echo $_SESSION['mobile_alumini']; } ?>"  readonly/>

					</div>

				

				</div>



				<!-- <div class="col-md-4">

					<div class="form-group">

						<label  >Phone</label>

						<div class="input-group mb-2 mr-sm-2">

							<div class="input-group-prepend">

								<div class="input-group-text">+91</div>

							</div>

							<input type="text" class="form-control" id="phone" name="phone" placeholder="Mobile Number" required onkeypress="return isNumberKey(event);" maxlength="10" />

						</div>

					</div>

				</div> -->

				<div class="col-md-3">

					<div class="form-group">

						<label>Parent's Mobile No</label>

						<input type="text" class="form-control" placeholder="Enter phone" id="pphone" required name="pphone"   maxlength="10" />

					</div>

				</div>

				

				<div class="col-md-3">

					<div class="form-group">

						<label>Courses</label>

						<select id="branch" class="form-control" required name="name">

							<option  value=''>Course</option>

							<?php while($course_data2 = mysqli_fetch_array($course_data1))  { ?>

									<option value="<?php echo $course_data2['course_id']; ?>"><?php echo $course_data2['course_name']; ?></option>

							<?php } ?>

						</select>

					</div>

				</div>

				<!-- <div class="col-md-3">

					<div class="form-group select_course_package">

						<label>Package</label>

						<select id="branch" class="form-control" required name="name">

							<option  value=''>Package</option>

							<?php while($package_data2 = mysqli_fetch_array($package_data1))  { ?>

									<option value="<?php echo $package_data2['package_id']; ?>"><?php echo $package_data2['package_name']; ?></option>

							<?php } ?>

						</select>

					</div>

				</div> -->

				<div class="col-md-3">

					<div class="form-group">

						<label >Qualification</label>

						<select id="qualification" class="form-control" required name="qualification">

							<option  value=''>Qualification</option>

							<option>10TH</option>

							<option>12TH</option>

							<option>Graduation</option>

							<option>Post Graduation</option>

						</select>

					</div>

				</div>

				<div class="col-md-3">

					<div class="form-group">

						<label >Faculty Name</label>

						<select id="faculty_id" class="form-control" required  name="faculty_id">

							<option  value=''>--select--</option>

							 <?php while($faculty_data2 = mysqli_fetch_array($faculty_data1))  { ?>

							 <option value="<?php echo $faculty_data2['faculty_id']; ?>"><?php echo $faculty_data2['name']; ?></option>

							<?php } ?>

						</select>

					</div>

				</div>



				<div class="col-md-4">

					<div class="form-group">

						<label >Select Job Category</label>

						<select id="job_main_category" class="form-control" required name="job_main_category" onchange="return get_position_ca()">

							<option value=''>--select--</option>

							<?php $qu_job ="select * from job_main_category";

								  $qu_job1 = mysqli_query($con,$qu_job);

								  while($quJob2 = mysqli_fetch_array($qu_job1)) { ?>

							<option><?php echo $quJob2['job_category_name']; ?></option>

						<?php } ?>

							<!-- <option>Video Editor</option>

							<option>Web Designer</option>

							<option>Graphic Designer</option>

							<option>Front Developer</option>

							<option>Laravel Developer</option>

							<option>Core PHP</option>

							<option>Codeigniter</option>

							<option>Autocad</option>

							<option>Android</option>

							<option>Fashion</option>

							<option>Interior</option> -->

						</select>

					</div>

				</div>





				<div class="col-md-4">

					<div class="form-group">

						<label >Position Applied for</label>

						<select id="position_for_apply" class="form-control" required name="position_for_apply" onchange="return get_job_sub_cat()">

										

							<!-- <option>Video Editor</option>

							<option>Web Designer</option>

							<option>Graphic Designer</option>

							<option>Front Developer</option>

							<option>Laravel Developer</option>

							<option>Core PHP</option>

							<option>Codeigniter</option>

							<option>Autocad</option>

							<option>Android</option>

							<option>Fashion</option>

							<option>Interior</option> -->

						</select>

					</div>

				</div>



				<div class="col-md-4">

					<div class="form-group">

						<label >Position Sub Category</label>

						<select id="job_subcategory" class="form-control" required name="job_subcategory">

							

							<!-- <option>Video Editor</option>

							<option>Web Designer</option>

							<option>Graphic Designer</option>

							<option>Front Developer</option>

							<option>Laravel Developer</option>

							<option>Core PHP</option>

							<option>Codeigniter</option>

							<option>Autocad</option>

							<option>Android</option>

							<option>Fashion</option>

							<option>Interior</option> -->

						</select>

					</div>

				</div>

				<div class="col-md-4">

					<div class="form-group">

						<label>Salary expectation</label>

						<input type="text" class="form-control"  placeholder="15000/-" required  name="salary_expectation" id="salary_expectation"/>

					</div>

				</div>

				<div class="col-md-4">

					<div class="form-group">

						<label>Prefer Location For Job</label>

						<select id="prefer_job_location" class="form-control" required name="prefer_job_location">

							<option value=''>--select--</option>

							<option>Varachha</option>

							<option>Yogichowck</option>

							<option>Sarthana</option>

							<option>Amroli</option>

							<option>Station</option>

							<option>Lal Darawaja</option>

							<option>Bhattar</option>

							<option>Uttran</option>

							<option>Piplod</option>

							<option>Vesu</option>

							<option>Adajan</option>

							<option>Nanpura</option>

						</select>

					</div>

				</div>

				<div class="col-md-4">

					<div class="form-group">

						<label >Running Topic</label>

						<input type="text" class="form-control" id="running_topic" placeholder="Enter Running Topic" required  name="running_topic" />

					</div>

				</div>

				<div class="col-md-4">

					<div class="form-group">

						<label>Batch Time</label>

						<select id="batch_time" class="form-control" required name="batch_time">

							<option value=''>--select--</option>

							<option>8:00 AM</option>

							<option>9:00 AM</option>

							<option>10:00 AM</option>

							<option>11:00 AM</option>

							<option>12:00 PM</option>

							<option>1:00 PM</option>

							<option>2:00 PM</option>

							<option>3:00 PM</option>

							<option>4:00 PM</option>

							<option>5:00 PM</option>

							<option>6:00 PM</option>

							<option>7:00 PM</option>

						</select>

					</div>

				</div>

				<div class="col-md-4">

					<div class="form-group">

						<label>Skills</label>

						<input type="text" class="form-control" id="skills"  placeholder="Like Banner, web Appli" required  name="skills"/>

					</div>

				</div>

				<div class="col-md-4">

					<div class="form-group">

						<label for="photo">Upload Your Image</label>

						<input type="file" class="form-control form-control-file" placeholder="" name="photo" id="Signature" required />

						<?php if(isset($image_error)) { ?>

                      <span style="color:red;"> <?php  echo $image_error; ?></span> 

                		<?php } ?>

					</div>

				</div>

				<div class="col-md-12">

					<div class="form-group">

						<label>Remarks</label>

						<textarea type="text" id="remarks" class="form-control"  placeholder="Any Remarks" required  name="remarks"/></textarea>

					</div>

				



			</div>

			</div>

		</div>

	</div>

	<div class="form-box">

		<h3>Previous Employment</h3>

		<div class="box-inner">

			<div class="row">

				<div class="col-md-12">

					<div class="form-group form-inline mb-0">

						<label class="mb-0">If Previous Employement</label>

						<div class="custom-control custom-checkbox ml-sm-2 mr-sm-2">

							<input type="checkbox" class="custom-control-input" name="" onclick="return emplo_pre_data_yes();" id="yes"/>

							<label class="custom-control-label" for="yes">Yes</label>

						</div>

						<div class="custom-control custom-checkbox mr-sm-2">

							<input type="checkbox" name="" class="custom-control-input" onclick=" return emplo_pre_data_no();" checked id="no"/>

							<label class="custom-control-label" for="no">No</label>

						</div>

					</div>

				</div>

				<div id="Employement_previous" class="col-12">

					<div class="row">

						<div class="col-sm-12">

							<hr class="mt-2 mb-4">

						</div>

						<div class="col-md-4">

							<div class="form-group">

								<label>Company</label>

								<input type="text" class="form-control"  placeholder="Company Name"  name="company_name" />

							</div>

						</div>

						<div class="col-md-4">

							<div class="form-group">

								<label>Supervisor</label>

								<input type="text" class="form-control"  placeholder="Company Supervisor"  name="company_sup_name" />

							</div>

						</div>

						<div class="col-md-4">

							<div class="form-group">

								<label>Company Number</label>

								<div class="input-group mb-2 mr-sm-2">

									<div class="input-group-prepend">

										<div class="input-group-text">+91</div>

									</div>

									<input type="text" class="form-control" id="phone-2" placeholder="company mobile number" name="company_number"   onkeypress="return isNumberKey(event);" maxlength="10" />

								</div>

							</div>

						</div>  

						<div class="col-md-12">

							<div class="form-group">

								<label>Company Address</label>

								<textarea class="form-control"  placeholder="Company Address" name="company_address"></textarea>

							</div>

						</div>

						<div class="col-md-3">

							<div class="form-group">

								<label>Job Title</label>

								<input type="text" class="form-control"  placeholder="Designation"  name="job_title" />

							</div>

						</div>

						<div class="col-md-3">

							<div class="form-group">

								<label>Responsibilities</label>

								<input type="text" class="form-control"  placeholder=""  name="responsibilities"/>

							</div>

						</div>

						<div class="col-md-3">

							<div class="form-group">

								<label>Form</label>

								<input type="text" class="form-control"  placeholder="MM/DD/YYYY"  data-toggle="datepicker" name="leave_from"/>

							</div>

						</div>

						<div class="col-md-3">

							<div class="form-group">

								<label>To</label>

								<input type="text" class="form-control"  placeholder="MM/DD/YYYY"  data-toggle="datepicker" name="leave_to"/>

							</div>

						</div>

						<div class="col-md-4">

							<div class="form-group">

								<label>Starting Salary</label>

								<input type="text" class="form-control"  placeholder="8000/-"  name="starting_salary"/>

							</div>

						</div>

						<div class="col-md-4">

							<div class="form-group">

								<label>Ending Salary</label>

								<input type="text" class="form-control"  placeholder="12000/-"  name="ending_salary"/>

							</div>

						</div>

						<div class="col-md-4">

							<div class="form-group">

								<label>Reason For Leaving</label>

								<input type="text" class="form-control"  placeholder=""  name="leave_reason"/>

							</div>

						</div>

						<div class="col-md-12">

							<div class="form-group form-inline">

								<label class="mb-0 mr-3">May we contact your previous supervisor for a reference?</label>

								<div class="custom-control custom-radio mr-sm-2">

									<input class="custom-control-input" type="radio" name="exampleRadios" id="Yes" value="option1" checked />

									<label class="custom-control-label" for="Yes">Yes</label>

								</div>

								<div class="custom-control custom-radio mr-sm-2">

									<input class="custom-control-input" type="radio" name="exampleRadios" id="No" value="option2" />

									<label class="custom-control-label" for="No">No</label>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

	<div class="form-box">

		<div class="box-inner">

			<div class="row">

				<div class="col-md-4">

					<div class="form-group">

						<label for="Signature">Student Signature</label>

						<input type="file" class="form-control form-control-file" placeholder="" name="Signature" id="Signature" required />

						<?php if(isset($image_error)) { ?>

                      <span style="color:red;"> <?php  echo $image_error; ?></span> 

                		<?php } ?>

					</div>

				</div>

				<div class="col-md-4 ml-auto">

					<div class="form-group">

						<label>Select Date</label>

						<?php $date = date("m/d/Y"); ?>

						<input type="text" class="form-control"  name="application_date" value="<?php echo $date; ?>"  placeholder="MM/DD/YYYY" required data-toggle="datepicker" readonly/>

					</div>

				</div>

				<div class="col-md-12">

					<div class="form-group mb-0">

						<div class="custom-control custom-checkbox mr-sm-2">

							<input type="checkbox" name="cust_checkbox" class="custom-control-input" id="cust_checkbox" data-toggle="modal" data-target="#exampleModal">

							<label class="custom-control-label" for="cust_checkbox">I have read the rules of job application and I agree with it. Which attach with this application.</label>

						</div>

					</div>

				</div>

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

<div class="modal fade bd-example-modal-lg form-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

	  <div class="modal-dialog modal-lg" role="document">

		<div class="modal-content">

		  <div class="modal-header">

			<h5 class="modal-title" id="exampleModalLabel">RNW Training & Placement Department</h5>

			<button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">

			  <span aria-hidden="true">&times;</span>

			</button>

		  </div>

		  <div class="modal-body">

			<form>

				<h3>Student Rules</h3>

				<ul class="modal-tnq-list">

					<li>જયારે વિદ્યાર્થી જોબ માટે એપ્લાય કરવા માંગે છે તો એમને સૌથી પહેલા પોતાની  બ્રાન્ચના  Training & Placement Responsible Person ને મળવું. જો વિદ્યાર્થી  Main Branch  ના છે તો એમને આ બ્રાન્ચ ના  Training & Placement Department ની મુલાકાત લેવી.</li>

					<li>Training & Placement Responsible Person  જે પ્રમાણે સૂચના આપે આ પ્રમાણે વિદ્યાર્થીએ કાર્ય કરવાનું રહેશે.</li>

					<li>જયારે પણ વિદ્યાર્થી ને વર્ક અને  Resume લઈને આવવા જાણવવામાં આવે ત્યારે નિયત કરેલા સમય કરતા ૧૫ મિનિટ વહેલા આવવાનું રહેશે. જો કોઈ વિદ્યાર્થી નિયત કરેલા સમય કરતા મોડો આવે છે અને જો એમને વેઇટ કરવો પડે છે તો એમના માટે એ પોતે જવાબદાર રહેશે.</li>

					<li>જો તમને કોઈ પણ ટાસ્ક આપવામાં આવ્યું છે તો એ વર્ક તમારે ફેકલટીને નિયત કરેલા સમયે બતાવાનું રહેશે.</li>

					<li>જયારે પણ વિદ્યાર્થી વર્ક અને  Resume લઈને આવે છે ત્યારે એમને  Resume ની હાર્ડ અને સોફ્ટ એમ બંને કોપી લાવવાની રહેશે.</li>

					<li>જયારે વિદ્યાર્થી વર્ક લઈને આવે છે ત્યારે એમને પ્રોજેક્ટ જેમાંથી બનાવ્યો છે એ પ્રોજેક્ટ અથવા એની જો લિંક હોઈ તો આ લઈને આવવું કમ્પલસરી છે.</li>

					<li>વિદ્યાર્થી જયારે પણ ઇન્ટરવ્યૂ માટે જાય છે તો  Compaulsary એમને  Formal Dress Wearing કરવાના રહેશે.</li>

					<li>જ્યાં સુધી બ્રાન્ચ પરથી જોબ એપ્લિકેશન નઈ આવે ત્યાં સુધી વિદ્યાર્થીને જોબ પર મોકલવા માં આવશે નઈ. </li>

				</ul>

				<h3>Resume</h3>

				<ul class="modal-tnq-list">

					<li>વિદ્યાર્થી એ  Resume માં નીચે પ્રમાણે ની કાળજી રાખવી.

						<ul>

							<li>Resume માં  Reference માં " Red & White Group of Institute" લખવું.</li>

							<li>વિદ્યાર્થીએ  Carrer Goal / Objective Resume માં લખવો જેથી કંપનીને એને આધારે  Desicion લઇ શકે.</li>

							<li>વિદ્યાર્થીએ  Professional Resume બનાવવાનું રહેશે.</li>

						</ul>

					</li>

				</ul>

				<h3>Discipline</h3>

				<ul class="modal-tnq-list">

					<li>વિદ્યાર્થીઓએ પ્લેસમેન્ટ પ્રક્રિયા દરમિયાન લેતી દરેક ક્રિયામાં શિસ્ત જાળવવી જોઈએ અને નૈતિક વર્તન બતાવવું જોઈએ. કોઈપણ વિદ્યાર્થી કંપની દ્વારા નિયુક્ત શિસ્ત નિયમોનું ઉલ્લંઘન કરતી હોય અથવા સંસ્થાના નામની બદનામી કરતું જોવા મળે છે, તેને બાકીના શૈક્ષણિક વર્ષ માટે પ્લેસમેન્ટમાંથી મંજૂરી આપવામાં આવશે નહીં.</li>

					<li>પસંદગી પ્રક્રિયામાં (છેતરપિંડી / જીડી / ઇન્ટરવ્યુ) છેતરપિંડી અથવા ગેરવર્તણૂંક કરનાર વિદ્યાર્થીઓને બાકીના શૈક્ષણિક વર્ષ માટે પ્લેસમેન્ટમાંથી મંજૂરી આપવામાં આવશે નહીં.</li>

				</ul>

				<h3>Job Offers</h3>

				<ul class="modal-tnq-list">

					<li>Offer લેટરની નકલ પ્લેસમેન્ટ Department માં સબમિટ કરવાની રહેશે.</li>

					<li>જો વિદ્યાર્થીને બીજી નોકરીની ઓફર કરવામાં આવે છે, તો તેણે / તેણીએ કંપનીને અફસોસનો પત્ર આપવો જ જોઇએ, જેમાં પ્રથમ નોકરી અને બીજીને સ્વીકૃતિનો પત્ર આપવામાં આવ્યો હતો.</li>

					<li>જોબ Offer સ્વીકાર્યા પછી, જો કોઈ પણ વિદ્યાર્થી વર્ષ દરમિયાન કોઈપણ સમયે તેની સ્વીકૃતિ પાછો લેવાનો નિર્ણય લે છે, તો તેણે સંબંધિત કંપનીને તાત્કાલિક જાણ કરવી પડશે.</li>

					<li>પોસ્ટ પ્લેસમેન્ટ :- જો કોઈ પણ કારણસર કંપની ઉમેદવારની  Joining બંધ કરે છે તો એના માટે કોલેજ કે ઈન્ટિટ્યૂટ જવાબદાર નથી.</li>

				</ul>

			

		  </div>

		  <div class="modal-footer">

			<button type="button" class="btn btn-secondary  close-btn"  data-dependent="reject" data-dismiss="modal"  onclick="return acceRejTerms('reject')">Close</button>

			<button type="button" class="btn btn-primary " data-dependent="accept"  data-dismiss="modal" onclick="return acceRejTerms('accept')">Accept T&C </button>

		  </div>

		</div>

	  </div>

</div>



<!--  email Confimation modal -->

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">RNW Training & Placement Department</h5>

        <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <form>



          <div class="form-group">

            <label for="email-name" class="col-form-label">Email:</label>

            <input type="text" class="form-control" id="email-name">

          </div>

        </form>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-primary">Proceed</button>

      </div>

    </div>

  </div>

</div>





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







<script>



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

	    fname: {

	      required: true

	    },

	    mname:{

	    	required:true

	    },

	    lname:{

	    	required:true

	    },

	    branch_id:{

	    	required:true

	    },

	    city:{

	    	required:true

	    },

	    address:{

	    	required:true

	    },

	    zipcode:{

	    	required:true

	    },

	    email:{

	    	required:true,

	    	email:true

	    },

	    phone:{

	    	required:true,

	    	minlength:10,

	    	maxlength:10

	    },

	    gr_id:{

	    	required:true

	    },

	    course:{

	    	required:true

	    },

	    qualification:{

	    	required:true

	    },

	    faculty_id: {	

	    	required:true

	    },

	   job_main_category :{

	   	required : true

	   },

	    position_for_apply:{

	    	required:true

	    },

	    job_subcategory:{

	    	required : true

	    },

	    salary_expectation:{

	    	required:true

	    },

	    prefer_job_location:{

	    	required:true

	    },

	    running_topic:{

	    	required:true

	    },

	    batch_time:{

	    	required:true

	    },

	    skills:{

	    	required:true

	    },

	    remarks:{

	    	required:true

	    },

	    Signature:{

	    	required:true

	    },

	    cust_checkbox:{

	    	required:true

	    }



	  },

	  messages:{

	  	fname:{

	  		required:"<div style='color:red'>Enter First Name</div>"

	  	},

	  	mname:{

	  		required:"<div style='color:red'>Enter Middle Name</div>"

	  	},

	  	lname:{

	  		required:"<div style='color:red'>Enter Last Name</div>"

	  	},

	  	branch_id:{

	  		required:"<div style='color:red'>Please select Branch</div>"

	  	},

	  	city:{

	  		required:"<div style='color:red'>Enter Your city</div>"

	  	},

	  	address:{

	  		required:"<div style='color:red'>Enter Your Address</div>"

	  	},

	  	zipcode:{

	  		required:"<div style='color:red'>Enter Your zipcode</div>"

	  	},

	  	email:{

	  		required:"<div style='color:red'>Enter email address</div>",

	  		email:"<div style='color:red'>Enter Valid Email address</div>"

	  	},

	  	phone:{

	  		required:"<div style='color:red'>Enter phone number</div>",

	  		minlength:"<div style='color:red'>Enter minimum 10 characters</div>",

	  		maxlength:"<div style='color:red'>Enter maximum  10 characters</div>"



	  	},

	  	gr_id:{

	  		required:"<div style='color:red'>Enter Your GRID</div>",

	  	},

	  	course:{

	  		required:"<div style='color:red'>Select Course </div>",

	  	},

	  	qualification:{

	  		required:"<div style='color:red'>Select Your Qualification </div>",

	  	},

	  	faculty_id:{

	  		required:"<div style='color:red'>Select Faculty</div>",

	  	},

	  	job_main_category : {

	  		required:"<div style='color:red'>Select Job Category</div>",

	  	},

	  	position_for_apply:{

	  		required:"<div style='color:red'>Select Position Apply</div>",

	  	},

	  	job_subcategory:{

	  		required:"<div style='color:red'>Select Job Subcategory </div>",

	  	},

	  	salary_expectation:{

	  		required:"<div style='color:red'>Select Salary Expectation</div>",	

	  	},

	  	prefer_job_location:{

	  		required:"<div style='color:red'>Select prefer job location</div>",

	  	},

	  	running_topic:{

	  		required:"<div style='color:red'>Select Running Topic</div>",

	  	},

	  	batch_time:{

	  		required:"<div style='color:red'>Select Batch Time</div>",

	  	},

	  	skills:{

	  		required:"<div style='color:red'>Select Skills</div>",

	  	},

	  	remarks:{

	  		required:"<div style='color:red'>Enter Remarks</div>",

	  	},

	  	Signature:{

	  		required:"<div style='color:red'>Select Signature image</div>",

	  	},

	  	cust_checkbox:{

	  		required: "<div style='color:red'>Select Terms & Condition</div>",

	  	}







	  }

	});

});





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

    else if(numb > 0.7){

      alert('to big, maximum is 700KB. You file size is: '+ numb +' KB');

       $(this).val('');

    }





});

 </script>

