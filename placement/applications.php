<div class="post_a_job_page"></div>





<?php include('new_header.php');

	  include('db.php');

	   $a='PHPMailer/PHPMailer/PHPMailerAutoload.php';

            require $a;





	  if(@$_POST['Interview_session'])

	  {

	  	$student_id = $_POST['student_id'];

	  	$jobpost_id = $_POST['add_jobpost'];

	  	$company_id = $_POST['add_company'];

	  	$response = $_POST['response'];



         $conquery ="select * from student_applied_job JOIN application_job ON student_applied_job.student_id=application_job.gr_id where `jobpost_id`='$jobpost_id' AND `company_id`='$company_id'";

         $conquery1 = mysqli_query($con,$conquery);

         $conquery2= mysqli_fetch_array($conquery1);

         

         $student_email = $conquery2['email'];

         // $student_email = "piyush0101nakarani@gmail.com";



	  	 $response_query ="update student_applied_job set `response`='$response' where (`company_id`='$company_id' AND `jobpost_id`='$jobpost_id' AND `student_id`='$student_id')";

	  

	  	$response_query1 = mysqli_query($con,$response_query);

	  	if($response_query1)

	  	{

	  		 $qu = "select * from company_detail where `company_id`='$company_id'";

	  		$qu1 = mysqli_query($con,$qu);

	  		$qu2 = mysqli_fetch_array($qu1);



	  		 $que = "select * from job_post where `jobpost_id`='$jobpost_id'";

	  		$que1 = mysqli_query($con,$que);

	  		$que2 = mysqli_fetch_array($que1);
            // echo "<pre>";
            // print_r($qu2);
            // print_r($que2);
            // exit;


	  		$co_name = $qu2['company_name'];

	  		$co_contact_no = $qu2['company_number'];

	  		$co_address =  $qu2['company_address'];

	  		$co_job_name = $que2['job_name'];

	  		$co_position =  $que2['position'];







	  		  $email_co =  $student_email;
               // $email_co =  "piyush0101nakarani@gmail.com";
               // $email_co =  "rwn2developerfaculty@gmail.com";
               // $email_co =  "rnwycchirag@gmail.com";

	  		   $mail_formate="Hello all this is testing mail";

	           $username = "Riddhi Borda";

	           $mail = new PHPMailer;

	           $mail->isSMTP();  

	           // $mail->Host = 'smtp.gmail.com';                    
               $mail->Host = 'shared3.accountservergroup.com'; 

	           $mail->SMTPAuth = true;                          

	           // $mail->Username = 'piyush0101nakarani@gmail.com'; 

	           // $mail->Password = '0101Piyush!@#$0101*&^';

                $mail->Username = 'placement@rnwmultimedia.com';         
                // SMTP username
                $mail->Password = 'HR#red&white';

	           $mail->SMTPSecure = 'ssl';

	           $mail->Port = 465;

	           $mail->setFrom('placement@rnwmultimedia.com', 'Training & Placement Department -  Red & White Group of Institute');

	           $mail->addReplyTo($email_co, 'Training & Placement Department -  Red & White Group of Institute');

	           $mail->addAddress($email_co);   // Add a recipient

	           $mail->isHTML(true); 

	           $mail->Subject = "::Your Interview Scheduled::";

	           $mail->Body    = '<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">



<head>

    <title>T&P</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="x-apple-disable-message-reformatting">

    <title></title>



    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">



    <style>

        html,

        body {

            margin: 0 auto !important;

            padding: 0 !important;

            height: 100% !important;

            width: 100% !important;

            background: #f1f1f1;

        }

        

        * {

            -ms-text-size-adjust: 100%;

            -webkit-text-size-adjust: 100%;

        }

        

        div[style*="margin: 16px 0"] {

            margin: 0 !important;

        }

        

        table,

        td {

            mso-table-lspace: 0pt !important;

            mso-table-rspace: 0pt !important;

        }

        .footer-icon td{

            width: 30px;

            height: 30px;

        }

        .footer-icon {

            text-align: center;

        }

        .footer-icon a{

            display: inline-block;

            width: 30px;

            height: 30px;

            vertical-align: middle;

        }

        .Notice_info{

            padding-left: 15px !important;

        }

        .Notice_info li{

            margin-bottom: 0px;

        }

        table {

            border-spacing: 0 !important;

            border-collapse: collapse !important;

            table-layout: fixed !important;

            margin: 0 auto !important;

        }

        

        img {

            -ms-interpolation-mode: bicubic;

        }

        

        a {

            text-decoration: none;

        }

    </style>

    <style>

        .primary {

            background: #0b527e;

        }

        

        .bg_white {

            background: #ffffff;

        }

        

        .bg_light {

            background: #fafafa;

        }

        

        .bg_black {

            background: #000000;

        }

        

        .bg_dark {

            background: rgba(0, 0, 0, .8);

        }



        .bg_gray{

            background: #e8e8e8;

        }

        

        .email-section {

            padding: 2.5em;

        }

        

        .worning {

            display: inline-block;

            padding: 3px 26px;

            background: rgba(0, 128, 0, 0.5);

            color: #fff;

        }

        .cirecil{

            width: 186px;

            height: 186px;

            border-radius: 100%;

            overflow: hidden;

            display: inline-block;

            margin: 0 auto;

            border: 5px solid #fff;

            box-shadow: 0 0 6px 0 rgba(0,0,0,.2);

        }

        ol{

            margin: 0;

            padding: 0;

        }

        p{



        }

        

        .btn {

            padding: 5px 15px;

            display: inline-block;

        }

        

        .btn.btn-primary {

            border-radius: 5px;

            background: #0d0cb5;

            color: #ffffff;

        }

        

        .btn.btn-white {

            border-radius: 5px;

            background: #ffffff;

            color: #000000;

        }

        

        .btn.btn-white-outline {

            border-radius: 5px;

            background: transparent;

            border: 1px solid #fff;

            color: #fff;

        }

        

        h1,

        h2,

        h3,

        h4,

        h5,

        h6 {

            font-family: "Poppins", sans-serif;

            color: #000000;

            margin-top: 0;

        }

        

        body {

            font-family: "Poppins", sans-serif;

            font-weight: 400;

            font-size: 15px;

            line-height: 1.8;

            color: rgba(0, 0, 0, .4);

        }

        

        a {

            color: #0d0cb5;

        }

        

        .services {

            background: rgba(0, 0, 0, .03);

        }

        

        .text-services {

            padding: 10px 10px 0;

            text-align: center;

        }

        

        .text-services h3 {

            font-size: 16px;

            font-weight: 600;

        }

        .services-list p{

            color: rgba(0, 0, 0, .4);

        }

        .services-list {

            padding: 12px;

            box-sizing: border-box;

            width: 100%;

            float: left;

            text-align: center;

        }

        .services-list h5{

            margin-bottom: 0;

        }

        

        .services-list img {

            float: left;

        }

        

        .services-list .text {

            width: calc(100% - 60px);

            float: right;

        }

        

        .services-list h3 {

            margin-top: 0;

            margin-bottom: 0;

            color: #212529;

        }

        

        .services-list p {

            margin: 0;

        }

        

        .footer {

            color: rgba(255, 255, 255, .5);

        }

        

        .footer .heading {

            color: #ffffff;

            font-size: 20px;

        }

        

        .footer ul {

            margin: 0;

            padding: 0;

        }

        

        .footer ul li {

            list-style: none;

            margin-bottom: 10px;

        }

        

        .footer ul li a {

            color: rgba(255, 255, 255, 1);

        }

        

        @media screen and (max-width: 500px) {

            .icon {

                text-align: left;

            }

            .text-services {

                padding-left: 0;

                padding-right: 20px;

                text-align: left;

            }

        }

    </style>



</head>



<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly;">

    <center style="width: 100%; background-color: #f1f1f1;">

        <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">

        </div>

        <div style="max-width: 600px; margin: 0 auto;" class="email-container">

            

            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">

                <tr>

                    <td valign="middle" class="primary footer email-section" style="padding-bottom: 0; padding-top: 0;">

                        <table>

                            <tbody>

                                <tr>

                                    <td valign="top" width="33.333%" style="padding-top: 20px;">

                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">

                                            <tbody>

                                                <tr>

                                                    <td style="text-align: left; padding-left: 5px; padding-right: 5px;">

                                                        <h3 class="heading" style="margin-bottom: 10px; color: #fff;">Your Interview Schedule</h3>

                                                        <table width="100%">

                                                            <tr>

                                                                <td><p style="color: #dedede; margin-bottom: 5px; margin-top: 0px;">Company Name : <a style="color: #fff;" href="tel:9327506324">'.$co_name.' </a></p>

                                                                </td>

                                                            </tr>

                                                            <tr>    

                                                                <td>

                                                                    <p style="color: #dedede; margin-bottom: 5px; margin-top: 0px;">Job Name : <a style="color: #fff;" href="tel:7650050042"> '.$co_job_name.'</a></p>

                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>

                                                                    <p style="color: #dedede; margin-bottom: 5px; margin-top: 0px;">Job Position : <a style="color: #fff;" href="tel:7650050042">'.$co_position.'</a></p>

                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>

                                                                    <p style="color: #dedede; margin-bottom: 5px; margin-top: 0px;">Company Contact No: <a style="color: #fff;" href="tel:9277760777">'.$co_contact_no.'</a></p>

                                                                </td>

                                                            </tr>



                                                             <tr>

                                                                <td>

                                                                    <p style="color: #dedede; margin-bottom: 5px; margin-top: 0px;">Company Address : <a style="color: #fff;" href="tel:7650050042">'.$co_address.'</a></p>

                                                                </td>

                                                              </tr>

                                                              <tr>

                                                                <td>

                                                                    <p style="color: #dedede; margin-bottom: 5px; margin-top: 0px;">Response: <a style="color:#fff;" href="tel:9277760777">'.$response.'</a></p>

                                                                </td>

                                                            </tr>



                                                        </table>

                                                        

                                                    </td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </td>

                </tr>

                <tr>

                   <td valign="middle" class=" footer email-section" style="text-align: center; padding-top: 0; padding-bottom: 0; background:#e31e25;;">

                       <table>

                           <tbody>

                               <tr>

                                   <td valign="top" width="100%">

                                       <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">

                                           <tbody>

                                               <tr>

                                                   <td style="text-align: left; padding-right: 8px; text-align: center; color: white; font-size: 12px;">

                                                       <p style="margin-top: 10px;">© Copyright 2020. Red & White Placement Department. All Rights Reserved.</p>

                                                   </td>

                                               </tr>

                                           </tbody>

                                       </table>

                                   </td>



                               </tr>

                           </tbody>

                       </table>

                   </td>

                </tr>



             

            </table>



        </div>

    </center>

</body>

</html>

';

	           if(!$mail->send()) {

	                // $_SESSION['success'] =  "Something Wrong";

	                // header("location:applications.php");

	           } 

	           else

	           {

                $data_success ="Response give successfully";

	                // $_SESSION['success'] =  "OTP SEND YOUR EMAIL";

	                // header("location:job_post.php");

	           }

	  		

	  	}

	  }





	    $company_id = strtr(base64_decode($_GET['company_id']), '+/=', '._-'); 

        $job_post_id = strtr(base64_decode($_GET['jobpost_id']), '+/=', '._-'); 

        



	  if(isset($job_post_id) && isset($company_id)) { 



	  	if(!empty($_GET['resume'])){

		    $fileName = urldecode($_GET['resume']);

		    $filePath = '../placement/resumes/'.$fileName;

			

			

		

		   

		    if(!empty($fileName) && file_exists($filePath)){

		        // Define headers

		        // header("Cache-Control: public");

		        // header('Content-Type: application/octet-stream');

		        // header("Content-Description: File Transfer");

		        // header("Content-Disposition: attachment; filename=$fileName");

		        // header('Expires: 0');

		        // header("Content-Type: application/zip");

		        // header("Content-Transfer-Encoding: binary");

		        // header('Content-Length: ' . filesize($filePath));

		        // // Read the file

		        // readfile($filePath);

				$extension = end(explode(".", $fileName));

                // echo $extension;
                // exit;

				if($extension == 'pdf')

				{

					$mime =  "application/pdf";

				}				

				else {

					$mime =  "images/jpg";

				}

				

		        $fp = fopen($filePath, "r") ;



header("Cache-Control: maxage=1");

header("Pragma: public");

header("Content-type:". $mime);

header("Content-Disposition: inline; filename=".$fileName."");

header("Content-Description: PHP Generated Data");

header("Content-Transfer-Encoding: binary");

header('Content-Length:' . filesize($filePath));

ob_clean();

flush();

while (!feof($fp)) {

   $buff = fread($fp, 1024);

   print $buff;

}



		      

		        exit;

		    }else{

		        $data_success = 'The file does not exist.';

		    }

		}

	  	$jobpost_id = $job_post_id;

	  	$company_id = $company_id;



	  	if(isset($_POST['submit']))

	  	{

	  		$name =  @$_POST['name'];

	  		$education =  @$_POST['education'];

	  		$skill =  @$_POST['skill'];



	  		if($name != '' && $education != '' && $skill != '')

	  		{

	  			 $query ="select * from student_applied_job JOIN application_job ON student_applied_job.student_id=application_job.gr_id where `jobpost_id`='$jobpost_id' AND `company_id`='$company_id' AND `student_id` != '0' AND (`name` LIKE '%$name%' AND `qualification` LIKE '%$education%' AND `skill` LIKE '%$skill%')";

	  		}

	  		else if($name != '' && $education != '')

	  		{

	  			 $query ="select * from student_applied_job JOIN application_job ON student_applied_job.student_id=application_job.gr_id where `jobpost_id`='$jobpost_id' AND `company_id`='$company_id' AND `student_id` != '0' AND  (`name` LIKE '%$name%' AND `qualification` LIKE '%$education%')";

	  		}

	  		else if($name != '' && $skill != '')

	  		{

	  			  $query ="select * from student_applied_job JOIN application_job ON student_applied_job.student_id=application_job.gr_id where `jobpost_id`='$jobpost_id' AND `company_id`='$company_id' AND (`name` LIKE '%$name%' AND `skill` LIKE '%$skill%')";	

	  		}

	  		else if($education != '' && $skill != '')

	  		{

	  			 $query ="select * from student_applied_job JOIN application_job ON student_applied_job.student_id=application_job.gr_id where `jobpost_id`='$jobpost_id' AND `company_id`='$company_id' AND `student_id` != '0' AND (`qualification` LIKE '%$education%' AND `skill` LIKE '%$skill%')";

	  		}

	  		else if($name != '')

	  		{

	  			  $query ="select * from student_applied_job JOIN application_job ON student_applied_job.student_id=application_job.gr_id where `jobpost_id`='$jobpost_id' AND `company_id`='$company_id' AND `student_id` != '0' AND (`name` LIKE '%$name%')";

	  		}

	  		else if($education != '')

	  		{

	  			 $query ="select * from student_applied_job JOIN application_job ON student_applied_job.student_id=application_job.gr_id where `jobpost_id`='$jobpost_id' AND `company_id`='$company_id' AND `student_id` != '0' AND (`qualification` LIKE '%$education%')";

	  		}

	  		else if($skill != '')

	  		{

	  			 $query ="select * from student_applied_job JOIN application_job ON student_applied_job.student_id=application_job.gr_id where `jobpost_id`='$jobpost_id' AND `company_id`='$company_id' AND`student_id` != '0' AND  (`skill` LIKE '%$skill%')";

	  		}

	  		else 

	  		{

				 $query ="select * from student_applied_job JOIN application_job ON student_applied_job.student_id=application_job.gr_id where `jobpost_id`='$jobpost_id' AND `company_id`='$company_id' AND `student_id` != '0'";



	  		}

	  	}

	  	else

	  	{

	  	    $query ="select * from student_applied_job JOIN application_job ON student_applied_job.student_id=application_job.gr_id where `jobpost_id`='$jobpost_id' AND `company_id`='$company_id' AND `student_id`!='0'";

	  	}

	  	$query1 = mysqli_query($con,$query);



	  }

	  else

	  {

	  	header('location:posted_job.php');

	  }

	  



?>

	



	<section class="posted_job_form d-inline-block w-100 position: relative" id="post_a_job">

		<div class="container">

			<div class="row">

				<div class="col-xl-12">

					<div class="sec-heading text-center">

			            <h2>Hire Your Best Candidatess</h2>

			            <h3>Searching</h3>

			        </div>

				</div>

			</div>

			<div class="col-xl-10 mx-auto">

				<form class="row">

					<div class="col-xl-12 border p-3">

						<div class="row">

							 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">

							 	<div class="form-group">

							 		<label>Name</label>

							 		<input type="text" name="start_dates" placeholder="Name" class="form-control">

							 	</div>

							 </div>

							 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">

							 	<div class="form-group">

							 		<label>Education</label>

							 		<select name="education" id="" class="form-control">

							 		    <option value="">Category</option>

							 		    <option value="10th">10th</option>

							 		    <option value="12th">12th</option>

							 		    <option value="graduation">Graduation</option>

							 		    <option value="post graduation">Post Graduation</option>

							 		    <option value="any">Any</option>

							 		</select>

							 	</div>

							 </div>

							 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">

							 	<div class="form-group">

							 		<label>Skill</label>

							 		<input type="text" name="start_date" placeholder="Skill" class="form-control">

							 	</div>

							 </div>

							 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">

							 	<label>&nbsp;</label>

							 	<button type="button" class="btn btn-primary btn-block">Search</button>

							 </div>

						</div>

					</div>

				</form>

			</div>

			<?php 

			

						if(isset($data_success)) { ?>

    						<div class="alert alert-success">

    							<?php echo $data_success; ?>

    						</div>

						<?php } ?>

			<div class="col-xl-12 mt-4">

				<div class="row">

					 	

						<?php 

    					 $num = mysqli_num_rows($query1);

    					if($num > 0 ) { $i=0; 

    					    						while($query2 = mysqli_fetch_array($query1)) { 

    						// if($query2['application_status'] == 1){

    					?>

					<div class="col-xl-4 col-lg-4 col-md-6">

						<div class="posted_job_box" style="height:95%">

							<p class="start_end_date location"><?php echo $query2['city']; ?></p>

							<span class="Job_student_name"><?php $name =  explode(' ',$query2['name']); echo @$name[0]." ".@$name[1];  ?></span>

							<p class="student_position"><?php echo $query2['qualification'];?></p>

							<p class="student_skill"><?php echo $query2['skill']; ?></p>

							<?php if($query2['application_status'] != 2){ ?>

							<ul class="student_contact_info">

								<li><a href="mailto:parthkachhadiya555@gmail.com"><?php echo $query2['email']; ?></a></li>

								<li><a href="tel:9737597253"><?php echo $query2['number'];?></a></li>

							</ul>

						<?php } ?>

							<div class="student_contact_info_btns">

                                <?php



                                $company_id = strtr(base64_encode($query2['company_id']), '+/=', '._-'); 

                                $job_post_id = strtr(base64_encode($query2['jobpost_id']), '+/=', '._-');



                                ?>

								<!--<a href="applications.php?jobpost_id=<?php echo   $job_post_id; ?>&company_id=<?php echo $company_id; ?>&resume=<?php echo $query2['resume']; ?>" class="btn btn-primary">Download Resume</a>-->


                                <a href="https://demo.rnwmultimedia.com/placement/resumes/<?php echo $query2['resume']; ?>" class="btn btn-primary" download>Download Resume</a>

								<?php 

								$co_id = $query2['company_id'];

								$jo_id = $query2['jobpost_id'];

								$st_id = $query2['student_id'];

								 $check_applied = "select * from student_applied_job where `company_id`='$co_id' AND `jobpost_id`='$jo_id' AND `student_id`='$st_id'";

								$check_applied1 = mysqli_query($con,$check_applied);

								$reco =  mysqli_fetch_array($check_applied1);

								 $rs =  $reco['response'];

								if($rs != ''){

								?>

								<a href="javascript:al()" onclick="return set_interview_data()" class="btn btn-danger">Already Set Interview</a>

								<?php } else { ?>

								<a href="javascript:al()" class="btn btn-primary" data-toggle="modal" data-target="#myModal"  onclick="return get_response_data(<?php echo $i; ?>)">Timing for Interview session</a>



							<?php } ?>

							<input type="hidden" name="add_jobpost_id" id="add_jobpost_id<?php echo $i; ?>" value="<?php echo $query2['jobpost_id']; ?>" >

								  <input type="hidden" name="add_company_id" id="add_company_id<?php echo $i; ?>" value="<?php  echo $query2['company_id']; ?>" >

								  <input type="hidden" name="add_email" id="add_email<?php echo $i; ?>" value="<?php echo $query2['gr_id'];; ?>" >	

							</div>

						</div>

					</div>

				<?php $i++; }  }  else { ?>



					<div class="col-xl-4 col-lg-4 col-md-6">

						<div class="posted_job_box">

							<!-- <p class="start_end_date location">Surat</p> -->

							<span class="Job_student_name">No Record Found</span>

							<!-- <p class="student_position">Graduation</p> -->

							<!-- <p class="student_skill">UI/UX DESIGN, WEB DESIGN , LOGO DESIGN ,BROCHURE DESIGN ,  PACKAGING DESIGN, T-SHIRT DESIGN, GRAPHICS DESIGN ,BRANDING  DESIGN</p> -->

							<!-- <ul class="student_contact_info">

								<li><a href="mailto:parthkachhadiya555@gmail.com">parthkachhadiya555@gmail.com</a></li>

								<li><a href="tel:9737597253">9737597253</a></li>

							</ul>

							<div class="student_contact_info_btns">

								<a href="#" class="btn btn-primary">Download Resume</a>

								<a href="#" class="btn btn-danger">Already Set Interview</a>

							</div> -->

						</div>

					</div>

					<?php }   ?>

					

				</div>

			</div>

		</div>

	</section>





	 <div class="modal fade" id="myModal" role="dialog">

    <div class="modal-dialog">

    

      <!-- Modal content-->

      <div class="modal-content">

        <div class="modal-header">

        <h4 class="modal-title" >For Interview Session</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>

         

        </div>

        <form method="post"  enctype="multipart/form-data" >

            <div class="modal-body">

                <input type="hidden" name="add_jobpost" id="add_jobpost">
                <input type="hidden" name="add_company" id="add_company">
                <input type="hidden" name="student_id" id="email_add">
                    <label>Enter time and Date For Interview Session</label>
                    <textarea class="form-control" name="response" id="response" rows="5" placeholder="Enter ..."></textarea>
                    <span id="about_skill_error" style="color:red"></span>
                </div>
            <div class="modal-footer ">
                <button type="submit" value="Interview_session" name="Interview_session" onclick="return validateForm()" class="btn btn-primary">Save changes</button>

            </div>

          </form>



        </div>

        

      </div>

      

    </div>

  </div>





<?php include('footer.php'); ?>	



<script>

function set_interview_data()

{

	alert("already set interview");

}



  </script>







  <script>

     function get_response_data(id)

     {

     	// alert(id);

        var job_post =  "add_jobpost_id"+id;

        var compnay  =  "add_company_id"+id;

        var email    =  "add_email"+id;



        var jobpost_id =  $('#'+job_post).val();

        var company_id =  $('#'+compnay).val();

        var email_id =  $('#'+email).val();

        $('#add_jobpost').val(jobpost_id);

        $('#add_company').val(company_id);

        $('#email_add').val(email_id);

        // alert(company_id);

     }

  </script>