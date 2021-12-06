<div class="post_a_job_page"></div>
<style type="text/css">
   .divider {
   font-size: 1px;
   background: rgba(0, 0, 0, 0.5);
   }
   .divider--danger {
   background: red;
   }
   .help{
   position: absolute;
   font-size: 20px;
   bottom:0px;
   right:2px;
   color:red;
   /*z-index: 1000000;*/
   }
   .help:hover{
   cursor: hand;
   }
</style>
<?php include ('new_header.php');
   include ('db.php');
   $a = 'PHPMailer/PHPMailer/PHPMailerAutoload.php';
   require $a;
   // echo "<pre>";
   // print_r($_SESSION['record']['company_name']);
   if (isset($_POST['Job_post'])) {
       $job_title = $_POST['job_title'];
       $position = $_POST['position'];
       $job_subcategory = $_POST['job_subcategory'];
       $salary = $_POST['salary'];
       $start_date = $_POST['start_date'];
       $end_date = $_POST['end_date'];
       $description = str_replace("'", "", $_POST['job_description']);
       $no_of_vacancy = $_POST['no_of_vacancy'];
       $city = $_POST['city'];
       $job_area = $_POST['location'];
       $company_id = $_SESSION['record']['company_id'];
       if ($job_title == '') {
           $job_title_error = "enter Job title";
       } else if (strlen($job_title) < 3) {
           $job_title_error = "enter Valid Job title";
       } else {
           $job_title_error = '';
       }
       if ($position == '') {
           $position_error = "Select position of job";
       } else {
           $position_error = '';
       }
       if ($job_subcategory == '') {
           $job_subcategory_error = "Select Job Subcategory";
       } else {
           $job_subcategory_error = '';
       }
       if ($salary == '') {
           $salary_error = "Enter salaray";
       } else {
           $salary_error = '';
       }
       if ($start_date == '') {
           $start_date_error = "Please select start date";
       } else {
           $start_date_error = '';
       }
       if ($end_date == '') {
           $end_date_error = "Please select end date";
       } else {
           $end_date_error = '';
       }
       if ($description == '') {
           $description_error = "enter Description";
       } else {
           $description_error = '';
       }
       if ($no_of_vacancy == '') {
           $no_error = "enter no_of_vacancy";
       } else if ($no_of_vacancy <= 0) {
           $no_error = "Enter Valid vacancy";
       } else {
           $no_error = '';
       }
       if ($city == '') {
           $city_error = "Select City";
       } else {
           $city_error = '';
       }
       if ($job_area == '') {
           $job_area_error = 'Enter job area';
       } else {
           $job_area_error = '';
       }
       if ($job_title_error != '' || $position_error != '' || $salary_error != '' || $start_date_error != '' || $end_date_error != '' || $description_error != '' || $city_error != '' || $job_area_error != '' || $no_error != '') {
       } else {
           date_default_timezone_set('Asia/Kolkata');
           $cu_date = date("Y-m-d g:i a");
           $query_post = "insert into job_post(`job_name`,`position`,`job_subcategory`,`salary`,`start_date`,`end_date`,`job_description`,`city`,`job_area`,`company_id`,`no_of_vacancy`,`created_date`,`modified_date`,`job_status`)values('$job_title','$position','$job_subcategory','$salary','$start_date','$end_date','$description','$city','$job_area','$company_id','$no_of_vacancy','$cu_date','$cu_date','1')";
           $query = mysqli_query($con, $query_post);
           $last_id = mysqli_insert_id($con);
           $q = "select * from job_post where `jobpost_id`='$last_id'";
           $q1 = mysqli_query($con, $q);
           $q2 = mysqli_fetch_array($q1);
           $j_name = $q2['job_name'] . "&#nochange";
           $j_position = $q2['position'] . "&#nochange";
           $j_subcate = $q2['job_subcategory'] . "&#nochange";
           $j_salary = $q2['salary'] . "&#nochange";
           $j_start = $q2['start_date'] . "&#nochange";
           $j_end = $q2['end_date'] . "&#nochange";
           $j_descri = $q2['job_description'] . "&#nochange";
           $j_city = $q2['city'] . "&#nochange";
           $j_area = $q2['job_area'] . "&#nochange";
           $j_no_v = $q2['no_of_vacancy'] . "&#nochange";
           $j_cu = $cu_date . "&#nochange";
           $j_mo = $cu_date . "&#nochange";
           $co_id = $_SESSION['record']['company_id'];
           $encode_company_id = strtr(base64_encode($co_id), '+/=', '._-');
           $encode_job_post_id = strtr(base64_encode($last_id), '+/=', '._-');
           $active_link = "https://demo.rnwmultimedia.com/placement/job_active_deactive_process.php?jobpost_id=$encode_job_post_id&company_id=$encode_company_id&status=active";
           $deactive_link = "https://demo.rnwmultimedia.com/placement/job_active_deactive_process.php?jobpost_id=$encode_job_post_id&company_id=$encode_company_id&status=deactive";
           $q_post = "insert into job_post_history(`j_name`,`j_position`,`j_subcategory`,`j_salary`,`j_start_date`,`j_end_date`,`j_description`,`j_city`,`j_area`,`j_no_of_vacancy`,`j_job_id`,`job_status`)values('$j_name','$j_position','$j_subcate','$j_salary','$j_start','$j_end','$j_descri','$j_city','$j_area','$j_no_v','$last_id','$j_cu','$j_mo','1')";
           mysqli_query($con, $q_post);
           if ($query) {
               $co_name = $_SESSION['record']['company_name'];
               $co_number = $_SESSION['record']['company_number'];
               $co_addres = $_SESSION['record']['company_address'];
               $email_co = "placement.rnwmultimedia@gmail.com";
               $mail_formate = "Hello all this is testing mail";
               $username = "Riddhi Borda";
               $mail = new PHPMailer;
               $mail->isSMTP();
               $mail->Host = $emailHost;
               $mail->SMTPAuth = true;
               $mail->Username = $masterEmail;
               $mail->Password = $masterPassword;
               $mail->SMTPSecure = 'ssl';
               $mail->Port = 465;
               $mail->setFrom($email_co, 'Training & Placement Department -  Red & White Group of Institute');
               $mail->addReplyTo($email_co, 'Training & Placement Department -  Red & White Group of Institute');
               $mail->addAddress($email_co); // Add a recipient
               $mail->isHTML(true);
               $mail->Subject = "New Job Post";
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
      
                                                              <h3 class="heading" style="margin-bottom: 10px; color: #fff;">:: New JOb Post ::</h3>
      
                                                              <table width="100%">
      
                                                                  <tr>
      
                                                                      <td><p style="color: #FF5733; margin-bottom: 5px; margin-top: 0px;">Company Name : <a style="color: #fff;" href="tel:9327506324">' . $co_name . ' </a></p>
      
                                                                      </td>
      
                                                                  </tr>
      
                                                                  <tr>    
      
                                                                      <td>
      
                                                                          <p style="color: #FF5733; margin-bottom: 5px; margin-top: 0px;">Job Name : <a style="color: #fff;" href="tel:7650050042"> ' . $job_title . '</a></p>
      
                                                                      </td>
      
                                                                  </tr>
      
                                                                  <tr>
      
                                                                      <td>
      
                                                                          <p style="color: #FF5733; margin-bottom: 5px; margin-top: 0px;">Job Position : <a style="color: #fff;" href="tel:7650050042">' . $position . '</a></p>
      
                                                                      </td>
      
                                                                  </tr>
      
      
      
                                                                   <tr>
      
                                                                      <td>
      
                                                                          <p style="color: #FF5733; margin-bottom: 5px; margin-top: 0px;">Job Role : <a style="color: #fff;" href="tel:7650050042">' . $job_subcategory . '</a></p>
      
                                                                      </td>
      
                                                                  </tr>
      
      
      
                                                                  <tr>
      
                                                                      <td>
      
                                                                          <p style="color: #FF5733; margin-bottom: 5px; margin-top: 0px;">Job Start And End Date : <a style="color: #fff;" href="tel:7650050042">' . $start_date . ' To ' . $end_date . '</a></p>
      
                                                                      </td>
      
                                                                  </tr>
      
      
      
                                                                   <tr>
      
                                                                      <td>
      
                                                                          <p style="color: #FF5733; margin-bottom: 5px; margin-top: 0px;">Salary  : <a style="color: #fff;" href="tel:7650050042">' . $salary . '</a></p>
      
                                                                      </td>
      
                                                                  </tr>
      
      
      
                                                                  <tr>
      
                                                                      <td>
      
                                                                          <p style="color: #FF5733; margin-bottom: 5px; margin-top: 0px;">No Of Vacancy  : <a style="color: #fff;" href="tel:7650050042">' . $no_of_vacancy . '</a></p>
      
                                                                      </td>
      
                                                                  </tr>
      
                                                                  <tr>
      
                                                                      <td>
      
                                                                          <p style="color: #FF5733; margin-bottom: 5px; margin-top: 0px;">Location  : <a style="color: #fff;" href="tel:7650050042">' . $job_area . '</a></p>
      
                                                                      </td>
      
                                                                  </tr>
      
                                                                  <tr>
      
                                                                      <td>
      
                                                                          <p style="color: #FF5733; margin-bottom: 5px; margin-top: 0px;">Company Contact No: <a style="color: #fff;" href="tel:9277760777">' . $co_number . '</a></p>
      
                                                                      </td>
      
                                                                  </tr>
      
      
      
                                                                   <tr>
      
                                                                      <td>
      
                                                                          <p style="color: #FF5733; margin-bottom: 5px; margin-top: 0px;">Company Address : <a style="color: #fff;" href="tel:7650050042">' . $co_addres . '</a></p>
      
                                                                      </td>
      
                                                                    </tr>
      
                                                                   
      
      
      
                                                                    <tr>
      
                                                                      <td>
      
                                                                           <a style="color: white; padding:5px; margin-left:30px;margin-bottom:20px; background-color: blue;"  
      
                                                                           href="' . $active_link . '">Active</a></p>
      
      
      
                                                                           <a style="color:white; padding:5px; margin-left:30px; margin-bottom:20px;background-color: blue;"  
      
                                                                           href="' . $deactive_link . '">Deactive</a></p>
      
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
      
      </html>';
               if (!$mail->send()) {
                   // $_SESSION['success'] =  "Something Wrong";
                   // header("location:applications.php");
                   
               } else {
                   // $_SESSION['success'] =  "OTP SEND YOUR EMAIL";
                   // header("location:job_post.php");
                   
               }
               $job_title = '';
               $position = '';
               $job_subcategory = '';
               $salary = '';
               $start_date = '';
               $end_date = '';
               $description = '';
               $city = '';
               $job_area = '';
               $company_id = '';
               $no_of_vacancy = '';
               $data_success = "Successfully Post Job!! Wait till Verify By Our TPO!!";
           } else {
               $data_danger = "Something Wrong";
           }
       }
   }
   ?>	
<style type="text/css">
   .post_help{
   position: absolute;
   right: 0px;
   top: 300px;
   background-color:lightgray;
   width: 50px;
   color:red;
   border-top-left-radius: 10px;
   border-bottom-left-radius: 10px;
   cursor: hand;
   text-align: center;
   }
   .post_help span{
   text-align: center;
   left:10px;
   font-weight: 800;
   font-size:20px;
   }
</style>
<section class="post_a_job_form d-inline-block w-100 position: relative" id="post_a_job">
   <div class="post_help btn btn-sm video" data-video="http://demo.rnwmultimedia.com/placement/video/PostJobHelp.mp4" data-toggle="modal" data-target="#videoModal" data-backdrop="static" data-keyboard="false">
      <img src="https://demo.rnwmultimedia.com/placement/images/helpIcon.png" height="30" width="30" ><span><br>H<br>e<br>l<br>p</span>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <div class="sec-heading text-center">
               <h2>Post Jobs</h2>
            </div>
         </div>
      </div>
      <div class="col-xl-10 mx-auto">
         <?php if (isset($data_success)) { ?>
         <div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><?php echo $data_success; ?></div>
         <?php
            } ?>
         <?php if (isset($data_danger)) { ?>
         <div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><?php echo $data_danger; ?></div>
         <?php
            } ?>
         <form class="row" method="post">
            <div class="col-xl-12 col-lg-12">
               <div class="form-group">
                  <label>Job Title</label>
                  <input type="text" name="job_title" placeholder="Job Title" class="form-control" value="<?php if (isset($job_title)) {
                     echo $job_title;
                     } ?>">
                  <span style="color:red"><?php if (isset($job_title_error)) {
                     echo $job_title_error;
                     } ?></span>
               </div>
            </div>
            <div class="col-xl-6 col-lg-6">
               <div class="form-group">
                  <label>Position</label>
                  <select class="form-control" name="position" id="position" onchange="return get_subcategory()">
                     <option value="">--select option--</option>
                     <?php $qu = "select * from job_position_category";
                        $qu1 = mysqli_query($con, $qu);
                        while ($qu2 = mysqli_fetch_array($qu1)) {
                            if (@$qu2['job_position'] == 'Fashion') {
                        ?>
                     <optgroup class="divider"></optgroup>
                     <?php
                        } ?>
                     <option value="<?php echo $qu2['job_position']; ?>" <?php if (isset($position)) {
                        if ($position == $qu2['job_position']) {
                            echo "selected";
                        }
                        } ?>><?php echo $qu2['job_position']; ?></option>
                     <?php
                        } ?>
                  </select>
                  <span style="color:red"><?php if (isset($position_error)) {
                     echo $position_error;
                     } ?></span>
               </div>
            </div>
            <div class="col-xl-6 col-lg-6">
               <div class="form-group">
                  <label>Job Subcategory</label>
                  <select class="form-control" name="job_subcategory" id="job_subcategory">
                     <option value="">--select option--</option>
                     <?php if (isset($job_subcategory)) { ?>
                     <option value="<?php echo $job_subcategory; ?>" selected><?php echo $job_subcategory; ?></option>
                     <?php
                        } ?>
                  </select>
                  <span style="color:red"><?php if (isset($job_subcategory_error)) {
                     echo $job_subcategory_error;
                     } ?></span>
               </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
               <div class="form-group">
                  <label>Start Date</label>
                  <input type="text" name="start_date" id="datepicker" placeholder="Start Date" class="form-control" value="<?php if (isset($start_date)) {
                     echo $start_date;
                     } ?>">
                  <span style="color:red"><?php if (isset($start_date_error)) {
                     echo $start_date_error;
                     } ?></span>
               </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
               <div class="form-group">
                  <label>End Date</label>
                  <input type="text" name="end_date" placeholder="End Date" id="datepicker1"  class="form-control" value="<?php if (isset($end_date)) {
                     echo $end_date;
                     } ?>">
                  <span style="color:red"><?php if (isset($end_date_error)) {
                     echo $end_date_error;
                     } ?></span>
               </div>
            </div>
            <div class="col-xl-12">
               <div class="form-group">
                  <label>Job Description</label>
                  <textarea placeholder="Job Description" name="job_description" class="form-control" rows="5"><?php if (isset($description)) {
                     echo $description;
                     } ?></textarea>
                  <span style="color:red"><?php if (isset($description_error)) {
                     echo $description_error;
                     } ?></span>
               </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
               <div class="form-group">
                  <label>No of Vacancies</label>
                  <input type="number" name="no_of_vacancy" placeholder="No of Vacancies" class="form-control" min="1" max="100" value="<?php if (isset($no_of_vacancy)) {
                     echo $no_of_vacancy;
                     } ?>"> 
                  <span style="color:red"><?php if (isset($no_error)) {
                     echo $no_error;
                     } ?></span>
               </div>
            </div>
            <div class="col-xl-6 col-lg-6">
               <div class="form-group">
                  <p>
                     <label for="amount">Salary Range:</label>
                     <input type="text" id="amount" name="salary" readonly style="border:0; color:#f6931f; font-weight:bold;">
                  </p>
                  <div id="slider-range"></div>
               </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
               <div class="form-group">
                  <label>City</label>
                  <select class="form-control" name="city" >
                     <option value="">--select option--</option>
                     <option value="Surat" <?php if (isset($city)) {
                        if ($city == 'Surat') {
                            echo "selected";
                        }
                        } ?>>Surat</option>
                     <option value="Ahamadabad" <?php if (isset($city)) {
                        if ($city == 'Ahamadabad') {
                            echo "selected";
                        }
                        } ?>>Ahamadabad</option>
                     <option value="Vadodara" <?php if (isset($city)) {
                        if ($city == 'Vadodara') {
                            echo "selected";
                        }
                        } ?>>Vadodara</option>
                     <option value="Rajkot" <?php if (isset($city)) {
                        if ($city == 'Rajkot') {
                            echo "selected";
                        }
                        } ?>>Rajkot</option>
                  </select>
                  <span style="color:red"><?php if (isset($city_error)) {
                     echo $city_error;
                     } ?></span>
               </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
               <div class="form-group">
                  <label>Location</label>
                  <select class="form-control" name="location" >
                     <option value="">-- Select Option --</option>
                     <option value="Adajan" <?php if (isset($job_area)) {
                        if ($job_area == 'Adajan') {
                            echo "selected";
                        }
                        } ?>>Adajan</option>
                     <option value="Amroli" <?php if (isset($job_area)) {
                        if ($job_area == 'Amroli') {
                            echo "selected";
                        }
                        } ?>>Amroli</option>
                     <option value="Athvalines" <?php if (isset($job_area)) {
                        if ($job_area == 'Athvalines') {
                            echo "selected";
                        }
                        } ?>>Athvalines</option>
                     <option value="Chikuvadi" <?php if (isset($job_area)) {
                        if ($job_area == 'Chikuvadi') {
                            echo "selected";
                        }
                        } ?>>Chikuvadi</option>
                     <option value="Delhi Gate" <?php if (isset($job_area)) {
                        if ($job_area == 'Delhi Gate') {
                            echo "selected";
                        }
                        } ?>>Delhi Gate</option>
                     <option value="GhodDod Road" <?php if (isset($job_area)) {
                        if ($job_area == 'GhodDod Road') {
                            echo "selected";
                        }
                        } ?>>GhodDod Road</option>
                     <option value="Gatanjali" <?php if (isset($job_area)) {
                        if ($job_area == 'Gatanjali') {
                            echo "selected";
                        }
                        } ?>>Gatanjali</option>
                     <option value="Katargam" <?php if (isset($job_area)) {
                        if ($job_area == 'Katargam') {
                            echo "selected";
                        }
                        } ?>>Katargam</option>
                     <option value="Hirabaug" <?php if (isset($job_area)) {
                        if ($job_area == 'Hirabaug') {
                            echo "selected";
                        }
                        } ?>>Hirabaug</option>
                     <option value="Kozve" <?php if (isset($job_area)) {
                        if ($job_area == 'Kozve') {
                            echo "selected";
                        }
                        } ?>>Kozve</option>
                     <option value="Majuragate" <?php if (isset($job_area)) {
                        if ($job_area == 'Majuragate') {
                            echo "selected";
                        }
                        } ?>>Majuragate</option>
                     <option value="Mini Bazar" <?php if (isset($job_area)) {
                        if ($job_area == 'Mini Bazar') {
                            echo "selected";
                        }
                        } ?>>Mini Bazar</option>
                     <option value="Mota Varachha" <?php if (isset($job_area)) {
                        if ($job_area == 'Mota Varachha') {
                            echo "selected";
                        }
                        } ?>>Mota Varachha</option>
                     <option value="Pandesara" <?php if (isset($job_area)) {
                        if ($job_area == 'Pandesara') {
                            echo "selected";
                        }
                        } ?>>Pandesara</option>
                     <option value="Rachana" <?php if (isset($job_area)) {
                        if ($job_area == 'Rachana') {
                            echo "selected";
                        }
                        } ?>>Rachana</option>
                     <option value="Rander" <?php if (isset($job_area)) {
                        if ($job_area == 'Rander') {
                            echo "selected";
                        }
                        } ?>>Rander</option>
                     <option value="Ring Road" <?php if (isset($job_area)) {
                        if ($job_area == 'Ring Road') {
                            echo "selected";
                        }
                        } ?>>Ring Road</option>
                     <option value="Sarthana" <?php if (isset($job_area)) {
                        if ($job_area == 'Sarthana') {
                            echo "selected";
                        }
                        } ?>>Sarthana</option>
                     <option value="ShyamDham" <?php if (isset($job_area)) {
                        if ($job_area == 'ShyamDham') {
                            echo "selected";
                        }
                        } ?>>ShyamDham</option>
                     <option value="Simadanaka" <?php if (isset($job_area)) {
                        if ($job_area == 'Simadanaka') {
                            echo "selected";
                        }
                        } ?>>Simadanaka</option>
                     <option value="Station" <?php if (isset($job_area)) {
                        if ($job_area == 'Station') {
                            echo "selected";
                        }
                        } ?>>Station</option>
                     <option value="Utran" <?php if (isset($job_area)) {
                        if ($job_area == 'Utran') {
                            echo "selected";
                        }
                        } ?>>Utran</option>
                     <option value="Vesu" <?php if (isset($job_area)) {
                        if ($job_area == 'Vesu') {
                            echo "selected";
                        }
                        } ?>>Vesu</option>
                        <option value="Parvat Patiya" <?php if (isset($job_area)) {
                        if ($job_area == 'Parvat Patiya') {
                            echo "selected";
                        }
                        } ?>>Parvat Patiya</option>
                  </select>
                  <span style="color:red"><?php if (isset($job_area_error)) {
                     echo $job_area_error;
                     } ?></span>
               </div>
            </div>
            <div class="col-xl-12">
               <div class="form-group">
                  <input type="submit" name="Job_post" value="Post Job" class="btn btn-primary form-control">
               </div>
            </div>
         </form>
      </div>
   </div>
</section>
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-left:-10%;">
   <div class="modal-dialog">
      <div class="modal-content" style="width:150%;">
         <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <!-- <video controls width="100%">
               <source src="" type="video/mp4">
               
               </video> -->
            <iframe width="560" height="360" src="https://www.youtube.com/embed/sf0rsiotpzk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         </div>
      </div>
   </div>
</div>
<?php include ('footer.php'); ?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
   $( function() {
     $( "#slider-range" ).slider({
       range: true,
       min: 8000,
       max: 100000,
       values: [ 8000, 15000 ],
       slide: function( event, ui ) {
         $( "#amount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
       }
     });
   
     $( "#amount" ).val("" + $( "#slider-range" ).slider( "values", 0 ) +
       " - " + $( "#slider-range" ).slider( "values", 1 ) );
   } );
  
   $( function() {
     $( "#datepicker" ).datepicker({
     	minDate: 0,
       dateFormat: 'yy-mm-dd' 
     });
   } );

    $( function() {
     $( "#datepicker1" ).datepicker({
     	minDate: 0,  dateFormat: 'yy-mm-dd'
     });
   } );
   
    function get_subcategory(){
      var ct_record =  $('#position').val();
      $.ajax({
         url : "ajax_sub_category.php",
         type : "post",
         data:{
           'category_record' : ct_record
         },
         success:function(response){
           $('#job_subcategory').html(response);
         }
      });
    }
</script>
<script>
   $(function() {
     $(".video").click(function () {
       var theModal = $(this).data("target"),
           videoSRC = $(this).attr("data-video"),
           videoSRCauto = videoSRC + "";
       $(theModal + ' source').attr('src', videoSRCauto);
       // alert(videoSRCauto);
       $(theModal + ' video').load();
       $(theModal + ' button.close').click(function () {
         $(theModal + ' source').attr('src', '');
         videoSRCauto = '';
         $(theModal + ' source').attr('src', videoSRCauto);
         $(theModal + ' video').load();
        });
     });
   });
   
   $('#videoModal').modal({backdrop: 'static', keyboard: false})  
    cache.delete(request, {options}).then(function(found) {
           // your cache entry has been deleted if found
       });
  
   $(document).ready(function() {
     var theModal = $(this).data("target");
           videoSRCauto = "";
       $(theModal + ' source').attr('src', videoSRCauto);
       // alert(videoSRCauto);
       $(theModal + ' video').load();
   });
   
   window.setTimeout(function(){
     location.reload(); 
   },2000);
</script>