
<?php include('student_header.php'); 
 include('db.php');

   
            $a='PHPMailer/PHPMailer/PHPMailerAutoload.php';
            require $a;

            $first_day_this_month = date('Y-m-01'); // hard-coded '01' for first da y
             $last_day_this_month  = date('Y-m-t');
           // eexit;cho "<pre>";
 
       
          date_default_timezone_set('Asia/Kolkata'); 
           $currentTime = date( 'Y-m-d', time()); 

          // $end_date =date('2020-09-12');


           date_default_timezone_set("Asia/Calcutta");
           $date =  date('d-m-Y h:i:s A');
            $position =  $_SESSION['student_record']['position_for_apply'];
            $applicant_no = $_SESSION['student_record']['application_number'];
    
           $query = "select * from job_post";
          $query1 = mysqli_query($con,$query);
          while($query2 = mysqli_fetch_array($query1)){
            $end_date = date($query2['end_date']);
            if($query2['job_status']!=2 && ($end_date <$currentTime)){
                $reco[] =  $query2['jobpost_id'];
                $c_id =  $query2['company_id'];
                $com_query="select * from company_detail where `company_id`='$c_id'";
                $com_query1 = mysqli_query($con,$com_query);
                $com_query2 =  mysqli_fetch_array($com_query1);
                 $re_job_post_id = $query2['jobpost_id'];
                 $re_com_id = $com_query2['company_id'];
                 $re_remark = "expire date";
                 $re_data  =$date;
                 $re_by = "by system";
                  $re_remark_system ="insert into job_deactive_remarks(`de_jobpost_id`,`de_company_id`,`de_reason_remark`,`de_created_date`,`de_by_name`)values('$re_job_post_id','$re_com_id','$re_remark','$re_data','$re_by')";
                 mysqli_query($con,$re_remark_system);


                 $deactive_job = "update job_post set `job_status`='2' where `jobpost_id`='$re_job_post_id'";

                 mysqli_query($con,$deactive_job);

            }
          }
          // print_r($reco);
        
        
           $position_for_apply =  $_SESSION['student_record']['position_for_apply'];
           $star =  $_SESSION['student_record']['star'];
           if($star == 5 || $star == 4)
           {
             $u_star =  5;
             $m_star =4;
             $l_star = 3;
           }
           else if($star == 3 || $star == 2)
           {
             $u_star =  4;
             $m_star =3;
             $l_star = 2;
           }
           else if($star == 1)
           {
             $u_star = 3;
             $m_star = 2;
             $l_star = 1;
           }
           
           date_default_timezone_set("Asia/Calcutta");

                                $date =  date('d-m-Y h:i A');


                                $applyjob = "applyjob";
                                                       

                            $student_name =  $_SESSION['student_record']['name'];
                        
                    

         if(isset($_POST['Apply_Job']))
         {
            $jobpost_id = $_POST['add_jobpost_id'];
            $company_id = $_POST['add_company_id'];
            $get_company_name = "select * from company_detail where `company_id`='$company_id'";
            $get_co_name1 = mysqli_query($con,$get_company_name);
            $get_co_name2 = mysqli_fetch_array($get_co_name1);
            $company_name_apply = $get_co_name2['company_name'];
                     
            $student_id = $_POST['add_student_id'];
            $date = $_POST['date'];
            $applyjob = $_POST['applyjob'];
            $student_name = $_POST['student_name'];
            $about_skill = $_POST['about_skill'];
            $resume = $_FILES['resume']['name'];
           
               $check_max_apply = "SELECT * FROM student_applied_job WHERE  `student_id`='$student_id' AND (`created_at` >= '$first_day_this_month'  AND `created_at` <=  '$last_day_this_month')";
           // print_r($_SESSION['student_record']);
             $check_query= mysqli_query($con,$check_max_apply);
             $check_limit = mysqli_num_rows($check_query);
            if($check_limit >= 4){
                ?>
                        <script>alert("Maximum 3 JOBS Apply in this month !! Try Next Month");</script>
                <?php 
            }
            else 
            {
           $applyjob = "insert into student_applied_job(`company_id`,`jobpost_id`,`student_id`,`about_skill`,`resume`,`date`,`applyjob`,`student_name`)values('$company_id','$jobpost_id','$student_id','$about_skill','$resume','$date','$applyjob','$student_name')";
           $already_record = "select * from student_applied_job where `company_id`='$company_id' AND `jobpost_id`='$jobpost_id' AND `student_id`='$student_id'";
           $already_record1 = mysqli_query($con,$already_record);
           $num = mysqli_num_rows($already_record1);
           if($num > 0 )
           {
            $data_wrong = "You have already applied on this job";
           }
           else
           {
                
                 move_uploaded_file($_FILES['resume']['tmp_name'], "resumes/".$resume);
                     $st_name = @$_SESSION['student_record']['name'];
                     date_default_timezone_set("Asia/Calcutta");
                    $date =  date('d-m-Y h:i:s A');
                     $app_remarks = "Company Name=".$company_name_apply."<br>Remarks=Apply on JOb";
                      $remark_apply =  "insert into job_remarks(`applications_id`,`remarks`,`remarks_by`,`labels`,`re_date`)values('$applicant_no','$app_remarks','$st_name','Apply On Job','$date')";
                
                    mysqli_query($con,$remark_apply);
               $re =  mysqli_query($con,$applyjob);
               if($re)
               {
                        $st_nnn= $_SESSION['student_record']['name'];
                        $get_email =  "select * from job_post where `jobpost_id`='$jobpost_id'";
                        $get_email1 = mysqli_query($con,$get_email);
                        $get_email2 = mysqli_fetch_array($get_email1);  
                        $job_n = $get_email2['job_name'];
                        $position = $get_email2['position'];

                        $comp_da =  "select * from company_detail  where `company_id`='$company_id'";
                        $comp_da1 = mysqli_query($con,$comp_da);
                        $comp_da2 = mysqli_fetch_array($comp_da1);
                         $email_co = $comp_da2['email_id'];
                       
                        
                $data_success = "Successfully Applied Job";
                                           $mail_formate="Hello all this is testing mail";
                                           $username = "Riddhi Borda";
                                           $mail = new PHPMailer;
                                           $mail->isSMTP();  
                                           $mail->Host = 'smtp.gmail.com';                    
                                           $mail->SMTPAuth = true;                            
                                           $mail->Username = 'placement.rnwmultimedia@gmail.com'; 
                                           $mail->Password = 'rnw#tpo2020';
                                           $mail->SMTPSecure = 'tls';
                                           $mail->Port = 587;
                                           $mail->setFrom($email_co, 'Training & Placement Department -  Red & White Group of Institute');
                                           $mail->addReplyTo($email_co, 'Training & Placement Department -  Red & White Group of Institute');
                                           $mail->addAddress($email_co);   // Add a recipient
                                           $mail->isHTML(true); 
                                           $mail->Subject = "Below Student Apply in Your Company";
                                          

                                           $mail->Body = '<!DOCTYPE html>
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
                                                        <h3 class="heading" style="margin-bottom: 10px; color: #fff;">Below Student Apply On Job</h3>
                                                        <table width="100%">
                                                            <tr>
                                                                <td><p style="color: #dedede; margin-bottom: 5px; margin-top: 0px;">Student Name : <a style="color: #fff;" href="tel:9327506324">'.$st_nnn.' </a></p>
                                                                </td>
                                                            </tr>
                                                            <tr>    
                                                                <td>
                                                                    <p style="color: #dedede; margin-bottom: 5px; margin-top: 0px;">Job Name : <a style="color: #fff;" href="tel:7650050042"> '.$job_n.'</a></p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <p style="color: #dedede; margin-bottom: 5px; margin-top: 0px;">Job Position : <a style="color: #fff;" href="tel:7650050042">'.$position.'</a></p>
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
                                                header("location:viewjobs.php");
                                           } 
                                           else
                                           {
                                                // $_SESSION['success'] =  "OTP SEND YOUR EMAIL";
                                                header("location:viewjobs.php");
                                           }
               }
               else
               {
                $data_wrong = "Something Wrong";
               }
          }
           }
         }

        if(isset($_POST['search'])=='Search')
        {
           if(@$_SESSION['position']=='')
           {

            $pos =  $_POST['position'];
            $_SESSION['position'] = $pos; 
           }
           else
           {
            $pos =  $_POST['position'];
            $_SESSION['position'] = $pos; 
           }

           if(@$_SESSION['job_name']=='')
           {

            $job_name =  $_POST['job_name'];
            $_SESSION['job_name'] = $job_name; 
           }
           else
           {
            $job_name =  $_POST['job_name'];
            $_SESSION['job_name'] = $job_name;
           }

           if(@$_SESSION['location']=='')
           {

            $location =  $_POST['location'];
            $_SESSION['location'] = $location; 
           }
           else
           {
            $location =  $_POST['location'];
            $_SESSION['location'] = $location; 
           }


           if(@$_SESSION['company_name']=='')
           {

              $company_name =  $_POST['company_name'];
              $_SESSION['company_name'] = $company_name; 
           }
           else
           {
              $company_name =  $_POST['company_name'];
              $_SESSION['company_name'] = $company_name; 
           }
          
        } 


        if(@$_GET['search']=='Search')
        {
           if(@$_SESSION['position']=='')
           {

            $pos =  $_GET['position'];
            $_SESSION['position'] = $pos; 
           }
           else
           {
            $pos =  $_GET['position'];
            $_SESSION['position'] = $pos; 
           }
          
        } 


           
           if(@$_SESSION['position'] != '' && @$_SESSION['job_name'] != '' && @$_SESSION['location'] != '')
           {
             $query = "select * from job_post JOIN company_detail ON job_post.company_id=company_detail.company_id where  (`position` LIKE '%$pos%' AND `job_name` LIKE '%$job_name%' AND `job_area` LIKE '%$location%' AND `position` LIKE '%$position%') AND (rating IN ('$u_star','$m_star','$l_star','0')) AND `job_status`='0'";
           }
           else if(@$_SESSION['position'] != '' && @$_SESSION['job_name'] !='')
           {
             $query = "select * from job_post JOIN company_detail ON job_post.company_id=company_detail.company_id where  (`position` LIKE '%$pos%' AND `job_name` LIKE '%$job_name%' AND `position` LIKE '%$position%') AND (rating IN ('$u_star','$m_star','$l_star','0')) AND `job_status`='0'";
           }
           else if(@$_SESSION['position'] != '' && @$_SESSION['location'] !='')
           {
             $query = "select * from job_post JOIN company_detail ON job_post.company_id=company_detail.company_id where  (`position` LIKE '%$pos%' AND `job_area` LIKE '%$location%' AND `position` LIKE '%$position%' ) AND (rating IN ('$u_star','$m_star','$l_star','0')) AND `job_status`='0'";
           }
           else if(@$_SESSION['job_name'] !=''  && @$_SESSION['location'] != '')
           {
             $query = "select * from job_post JOIN company_detail ON job_post.company_id=company_detail.company_id where (`job_name` LIKE '%$job_name%' AND `job_area` LIKE '%$location%' AND `position` LIKE '%$position%' ) AND (rating IN ('$u_star','$m_star','$l_star','0')) AND `job_status`='0'";
           }
             else if(@$_SESSION['company_name'] != ''){
                    $query = "select * from job_post JOIN company_detail ON job_post.company_id=company_detail.company_id where (`company_name` LIKE '%$company_name%' ) AND (rating IN ('$u_star','$m_star','$l_star','0')) AND `job_status`='0'";
             }
           else if(@$_SESSION['position'] != '')
           {
              $query = "select * from job_post JOIN company_detail ON job_post.company_id=company_detail.company_id where (`position` LIKE '%$pos%') AND (rating IN ('$u_star','$m_star','$l_star','0')) AND `job_status`='0'";
           }
           else if(@$_SESSION['job_name'] !='')
           {
             $query = "select * from job_post JOIN company_detail ON job_post.company_id=company_detail.company_id  where (`job_name` LIKE '%$job_name%' AND `position` LIKE '%$position%' ) AND (rating IN ('$u_star','$m_star','$l_star','0')) AND `job_status`='0'";
           }
           else if(@$_SESSION['location'] !='')
           {
             $query = "select * from job_post JOIN company_detail ON job_post.company_id=company_detail.company_id where (`job_area` LIKE '%$location%' AND `position` LIKE '%$position%' ) AND (rating IN ('$u_star','$m_star','$l_star','0'))  AND `job_status`='0'";
           }
           else
           {
              $query  = "select * from job_post JOIN company_detail ON job_post.company_id=company_detail.company_id where  (rating IN ('$u_star','$m_star','$l_star','0')) AND `job_status`='0'";
           }
           

        

         // if(isset($_POST['position']))
         // {
         //  $cat = $_POST['position'];
         //  $query = "select * from job_post JOIN company_detail ON job_post.company_id=company_detail.company_id where (`position` LIKE '%$cat%') AND `job_status`='0'";
         // }
         // else
         // {
         //     $query = "select * from job_post JOIN company_detail ON job_post.company_id=company_detail.company_id `job_status`='0'";
         // }

         ?>

	<section class="posted_job_form d-inline-block w-100 position-relative" id="post_a_job">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="sec-heading text-center">
			            <h2>Get Your New Job</h2>
			        </div>
				</div>
			</div>
			<div class="col-xl-10 mx-auto">
				<form class="row" action="search_viewjobs.php"  method="post">
					<div class="col-xl-12 border p-3">
						<div class="row">
							 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
							 	<div class="form-group">
							 		<label>Position</label>
							 		<select name="position" id="" class="form-control">
                     <option value="">--select Position--</option>
                                  <option value="Graphic Designer" <?php if(@$_SESSION['position']=='Graphic Designer') { echo "selected";} ?> >Graphic Designer</option>
                                  <option value="Web Designer" <?php if(@$_SESSION['position']=='Web Designer') { echo "selected"; } ?> >Web Designer</option>

                                  <option value="Android" <?php if(@$_SESSION['position']=='Android') { echo "selected"; } ?> >Android</option>

                                  <option value="iOS" <?php if(@$_SESSION['position']=='iOS') { echo "selected"; } ?> >iOS</option>

                                  <option value="Web Development" <?php if(@$_SESSION['position']=='Web Development') { echo "selected";} ?> >Web Development</option>
                                  <option value="Animation" <?php if(@$_SESSION['position']=='Animation') { echo "selected"; }?> >Animation</option>

                  </select>
							 	</div>
							 </div>
							 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
							 	<div class="form-group">
							 		<label>Enter Job Name</label>
							 		<input type="text" name="job_name" placeholder="Enter Your Job Name" class="form-control" value="<?php if(isset($_SESSION['job_name'])) { echo $_SESSION['job_name']; }?>">
							 	</div>
							 </div>
							 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
							 	<div class="form-group">
							 		<label>Location</label>
							 		<input type="text" name="location" placeholder="Location" class="form-control" value="<?php if(isset($_SESSION['location'])) { echo $_SESSION['location']; }?>">
							 	</div>
							 </div>
							 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
							 	<label>&nbsp;</label>
							 	<button type="submit" name="search" class="btn btn-primary btn-block">Search</button>
							 </div>
						</div>
					</div>
				</form>
			</div>
			
		</div>
	</section>
	<section class="recent_job_add d-inline-block w-100 position-relative pt-0">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="sec-heading text-center">
						<!-- <h6>RECENTLY ADDED JOBS</h6> -->
			            <!-- <h2>The Eassiest Way to Get Your New Job</h2> -->
			        </div>
				</div>
			</div>
			<div class="row recent_job_add_box">



				<?php 
				
				$all_job1 = mysqli_query($con,$query);
				$num_all_jobpost =  mysqli_num_rows($all_job1);
				if($num_all_jobpost >0 ){
					$jkm=0;
				while($all_job2 = mysqli_fetch_array($all_job1)) { 
				?>
				<div class="col-xl-4 col-lg-4 col-md-6">
				    <div class="posted_job_box">
				        <span class="start_end_date">Last Date: <?php echo $all_job2['end_date']; ?></span>
				        <h2 class="corse_title"><a href="#" style="font-size:16px;"><?php echo $all_job2['job_name']; ?></a> <span style="font-size: 14px;">(<?php echo $all_job2['company_name']; ?>)</span></h2>
				        <!-- <p class="student_lable">Test</p> -->
				        <ul class="job-post-item-body mt-3">
				            <li><i class="fas fa-layer-group mr-2"></i><a href="#"><?php echo  $all_job2['no_of_vacancy']; ?></a></li>
				            <li><i class="fas fa-map-marker-alt mr-2"></i><?php echo $all_job2['city'] ;?>, <?php echo $all_job2['job_area'];?></li>
				        </ul>
                 
		               <input type="hidden" name="jobpost_id" id="jobpost_id<?php echo $jkm; ?>" value="<?php echo $all_job2['jobpost_id']; ?>">
                        <input type="hidden" name="company_id" id="company_id<?php echo $jkm; ?>" value="<?php echo $all_job2['company_id']; ?>">
                        <?php $gr_id =  @$_SESSION['student_record']['gr_id'];?>
                        <input type="hidden" id="student_id<?php echo $jkm; ?>" name="student_id" value="<?php echo $gr_id; ?>" >
                        <input type="hidden" id="position_data<?php echo $jkm; ?>" name="position_data" value="<?php echo $all_job2['position']; ?>" >

				        <div class="student_contact_info_btns">
				        	<?php 
		                $co_id =  $all_job2['company_id'];
		                $jo_id =  $all_job2['jobpost_id'];
		                $st_id =  @$_SESSION['student_record']['gr_id'];
		                if(@$_SESSION['student_record']['name']!='') { 
		                	$check_job_applied = "select * from student_applied_job where `company_id`='$co_id' AND `jobpost_id`='$jo_id' AND `student_id`='$st_id'";
		                	 $check_data1 = mysqli_query($con,$check_job_applied);
		                	 $check_data2 = mysqli_num_rows($check_data1);
		                	 if($check_data2 > 0) { 
		                	 ?>
		                	   <!-- already applied button -->
                             <?php ++$jkm; ?>
		            			<?php } else { ?>

				            <!-- <a data-toggle="modal" data-target="#myModal" class="btn btn-primary py-2" onclick="return jobpost_modal(<?php echo $jkm; ?>)" class="btn btn-primary">Apply Now</a> -->

                    <div class="apllay_now_resume_uplode_btn">
                  <!-- apply button -->

                    <div class="collapse mt-3" id="resume_uplode<?php echo $jkm; ?>">
                      <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="add_jobpost_id" id="add_jobpost_id<?php echo $jkm; ?>">
                <input type="hidden" name="add_company_id" id="add_company_id<?php echo $jkm; ?>">
                <input type="hidden" name="add_student_id" id="add_student_id<?php echo $jkm; ?>">
                <input type="hidden" name="add_position_data" id="add_position_data<?php echo $jkm; ?>">

                       <!-- upload resume code -->
                      </form>
                    </div>
                </div>
                

				             <?php $jkm++; } }?>
				        </div>
				    </div>
				</div>
			<?php } } else{ ?>
				<div class="col-xl-4 col-lg-4 col-md-6">
				    <div class="posted_job_box">
				        <!-- <span class="start_end_date">Last Date: 2020-07-10</span> -->
				        <h2 class="corse_title"><a href="#">NO Recently Jobs</a></h2>
				        <!-- <p class="student_lable">Test</p> -->
				        <!-- <ul class="job-post-item-body mt-3">
				            <li><i class="fas fa-layer-group mr-2"></i><a href="#">Android</a></li>
				            <li><i class="fas fa-map-marker-alt mr-2"></i>Surat, varachha</li>
				        </ul> -->
				        <!-- <div class="student_contact_info_btns">
				            <a href="#" class="btn btn-primary">View Application</a>
				        </div> -->
				    </div>
				</div>
			<?php } ?>
				
			</div>
		</div>
	</section>

 


<?php include('footer.php'); ?>	


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="margin-left:300px;">Apply On Job</h4>
        </div>
        <div class="modal-body">
         

         <form method="post"  enctype="multipart/form-data" >
            <div class="modal-body">
          
                 <input type="hidden" name="add_jobpost_id" id="add_jobpost_id">
                <input type="hidden" name="add_company_id" id="add_company_id">
                <input type="hidden" name="add_student_id" id="add_student_id">
                <input type="hidden" name="add_position_data" id="add_position_data">

                 <div class="form-group">
                        <label>About Your Skill</label>
                        <textarea class="form-control" name="about_skill" id="about_skill" rows="5" placeholder="Enter ..."></textarea>
                        <span id="about_skill_error" style="color:red"></span>
                  </div>

                  <div class="form-group">
                        <label>Upload Resume</label>
                        <input type="file" class="form-control"  id="resume" name="resume">

                        <span style="color:red" id="resume_error"></span>
                  </div>

            </div>
         
            <div class="modal-footer ">
              <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
              <button type="submit" value="Apply Job" name="Apply_Job" onclick="return validateForm()" class="btn btn-primary">Save changes</button>
            </div>
          </form>

        </div>
        
      </div>
      
    </div>
  </div>


  <script type="text/javascript">
  	
        function jobpost_modal(id)
        {
          var jobpp =  "jobpost_id"+id;
          var compp =  "company_id"+id;
          var studpp =  "student_id"+id;
         
          var posipp =  "position_data"+id;
          var jobpost_id =  $('#'+jobpp).val();
          var company_id =  $('#'+compp).val();
          var student_id =  $('#'+studpp).val();
          var position_data =  $('#'+posipp).val();
        
     
          $('#add_jobpost_id').val(jobpost_id);          
          $('#add_company_id').val(company_id);          
          $('#add_student_id').val(student_id);    
          $('#add_position_data').val(position_data);      
        }

    var count = 0;
    function show_upload_resume(idData)
    {
        // alert(idData);
        var up_dat = "resume_uplode"+idData;
        if(count%2==0){
          $('#'+up_dat).show();
           var jobpp =  "jobpost_id"+idData;
          var compp =  "company_id"+idData;
          var studpp =  "student_id"+idData;
         
          var posipp =  "position_data"+idData;
          var jobpost_id =  $('#'+jobpp).val();
          var company_id =  $('#'+compp).val();
          var student_id =  $('#'+studpp).val();
          var position_data =  $('#'+posipp).val();
        
     
          $('#add_jobpost_id'+idData).val(jobpost_id);          
          $('#add_company_id'+idData).val(company_id);          
          $('#add_student_id'+idData).val(student_id);    
          $('#add_position_data'+idData).val(position_data);
          count = 1;
        } 
        else
        {
            count = 0;
            $('#add_jobpost_id').val('');          
          $('#add_company_id').val('');          
          $('#add_student_id').val('');    
          $('#add_position_data').val('');
          $('#'+up_dat).hide();

        }
    }

    function validateForm(idData)
        {
          // var about_skill =  $('#about_skill').val();
          var resume =  $('#resume'+idData).val();
          if(resume == '')
          {
            
            
            $('#resume_error'+idData).html("Upload Your resume");
            return false;
          }
          else
          {
            return true;
          }
        }
  </script>