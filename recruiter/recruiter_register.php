 <?php //include('header.php');
      session_start();
      include('db.php');

      $a='PHPMailer/PHPMailer/PHPMailerAutoload.php';

    require $a;

      if(isset($_POST['RegisterCompany']))
      {
        $company_name           =  $_POST['company_name'];
        $address                =  $_POST['address'];
        $phone                  =  $_POST['phone'];
        $url                    =  $_POST['url'];
        $recruiter_name         =  $_POST['recruiter_name'];
        $recruiter_designation  =  $_POST['recruiter_designation'];
        $email                  =  $_POST['email'];
        $password               =  $_POST['password'];
        $cpassword              =  $_POST['cpassword'];
        $tc                     =  @$_POST['tc'];
        $date                   =  date('Y-m-d');

        $qu ="select * from company_detail where `company_name`='$company_name'";
        $qu1 = mysqli_query($con,$qu);
        $num = mysqli_num_rows($qu1);

        $que ="select * from company_detail where `email_id`='$email'";
        $que1 = mysqli_query($con,$que);
        $numu = mysqli_num_rows($que1);


        if($company_name == '')
        {
          $company_error = "Enter Company Name";

        }
        else if(strlen($company_name)<2)
        {
          $company_error = "Enter Valid company Name";
        }
        else if($num >0 )
        {
          $company_error ="Company Name already Registered!!";
        }
        else
        {
          $company_error = '';
        }

        if($address == '')
        {
          $address_error = "Enter Company Address";
        }
        else
        {
          $address_error = "";
        }

        if($phone == '')
        {
          $phone_error = "Enter phone no";
        }
        else if(strlen($phone) != 10)
        {
          $phone_error =  "Enter Valid phone no";
        }
        else 
        {
          $phone_error = '';
        }

        if($url == '')
        {
          $url_error = "Enter Company URL";
        }
        else
        {
          $url_error = '';
        }

        if($recruiter_name == '')
        {
          $recruiter_name_error = "Enter Recruiter Name";
        }
        else
        {
          $recruiter_name_error = '';
        }

        if($recruiter_designation == '')
        {
          $recruiter_designation_error = "Enter Recruiter Post";
        }
        else
        {
          $recruiter_designation_error = '';
        }

        if($email == '')
        {
          $email_error = "Enter Email of company or Recruiter";
        }
        else if($numu > 0)
        {
          $email_error ="Email is already Registered";
        }
        else
        {
          $email_error ='';
        }

        if($password == '')
        {
          $password_error ="Enter password";
        }
        else if(strlen($password) <5)
        {
          $password_error ="Enter Minimum 5 characters";
        }
        else
        {
          $password_error ='';
        }

        if($cpassword == '')
        {
          $cpassword_error ="Enter confirm password";
        }
        else if($password != $cpassword) 
        {
          $cpassword_error ="Password & Confirm pass Not match";
        }
        else
        {
          $cpassword_error ='';
        }
        if($tc == '')
        {
          $tc_error ="please select Terms & Condition";
        }
        else
        {
          $tc_error = '';
        }
        if($company_error != '' || $address_error !='' || $phone_error !='' || $url_error != '' || $recruiter_name_error != '' || $recruiter_designation_error != '' || $email_error != '' || $password_error !='' || $cpassword_error != '' || $tc_error !='')
        {

        }
        else
        {
            $query ="insert into company_detail(`company_name`,`company_address`,`company_number`,`url`,`employer_name`,`employer_designation`,`email_id`,`password`,`agreeterms`,`date`)values('$company_name','$address','$phone','$url','$recruiter_name','$recruiter_designation','$email','$password','$tc','$date')";
            $query1 = mysqli_query($con,$query);
            if($query1)
            {

              $email = $email;
              //$parts = explode("@", $email);
              $username = "Riddhi Borda";
              $mail = new PHPMailer;

              $mail->isSMTP();                                   // Set mailer to use SMTP
              $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
              $mail->SMTPAuth = true;                            // Enable SMTP authentication
              // $mail->Username = 'placement.rnwmultimedia@gmail.com';          // SMTP username
              // $mail->Password = 'Urvil@1221';
              $mail->Username = 'spintoearn123@gmail.com';          // SMTP username
              $mail->Password = 'spintoearn12325102514'; 
              // $mail->Username = 'piyush0101nakarani@gmail.com';          // SMTP username
              // $mail->Password = '0101Piyush!@#0101'; // SMTP password
              $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
              $mail->Port = 25;                                  // TCP port to connect to

              $mail->setFrom($email, 'Training & Placement Department -  Red & White Group of Institutes');
              $mail->addReplyTo($email, 'Training & Placement Department -  Red & White Group of Institutes');
              $mail->addAddress($email);   // Add a recipient
              //$mail->addCC('cc@example.com');
              //$mail->addBCC('bcc@example.com');

              $mail->isHTML(true); 
              $mail->Subject = $subject;
              $mail->AddAttachment("index.html");
               // $mail->AddEmbeddedImage("image/spin_earn.jpg", "my-attach", "image/spin_earn.jpg");
              $mail->Body    = '<p style="text-align: center;"><strong>Training & Placement Policy for Red & White Group of Institutes</strong></p>
<p><span style="font-weight: 400;">Hello, '.$recruiter_name.'</span></p>
<p><span style="font-weight: 400;">       </span> <span style="font-weight: 400;">This is </span><strong>Red & White Group of Institutes</strong><span style="font-weight: 400;">, Providing career-based courses in various fields like </span><strong>IT, Multimedia, Fashion, Interior</strong><span style="font-weight: 400;"> any many more.</span></p>
<p><span style="font-weight: 400;">       </span> <span style="font-weight: 400;">We aim to provide quality education & skill-based knowledge to every student and help them to be industry-ready.</span></p>
<p><span style="font-weight: 400;">       </span> <span style="font-weight: 400;">We are always ready to collaborate with those industries who can provide a career platform to our students and we try our best to provide a quality employee to such industries.</span></p>
<p><span style="font-weight: 400;">       </span> <span style="font-weight: 400;">We are very proud to have such industries like yours, which can provide a career platform to our students and help them to generate revenue by their adequate skill knowledge.</span></p>
<p><span style="font-weight: 400;">       </span> <span style="font-weight: 400;">We know that you are always seeking a quality person as an employee for your company which we can impart. However, We would like to let you that Red & White Group of Institutes is not an agency which provides employee but We are an organization which builds  professionals who can work as a responsible employee directly into the industries by providing them quality knowledge and adequate training. Though we can only provide employees, if we have Students who are prepared for the job as well as ready to join your companies, otherwise we do not manage another candidate who has not been  trained from our Institutes.</span></p>
<p><span style="font-weight: 400;"> </span></p>
<p><strong>Moreover, we would like to make a couple of points to draw your attention which will be really helpful for your firm.</strong></p>
<ul>
<li style="font-weight: 400;"><span style="font-weight: 400;">As red & white provides free employment services to your company yet sometimes it happens that we do not have an adequate number of students according to your specified need.To tackle such a situation we would like to suggest that you by your self should select and send a few fresher candidates as a student to our institution according to your requirements. So we can train them and you can directly hire them as an employee who will be pre-ready for your need.</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Also, it will be helpful if any of the representatives of your company visit our Institutes to train, as well as to make aware our teachers about the specification and in detailed need of your company. Which will help us to train the student in such a way that you don’t have to face any hurdle after the recruitment of an employee.</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Moreover, Once a Candidate is selected, if in future any problem occurs then Red & White Group of Institutes is not responsible for this. Though we understand our  moral responsibility and we will do all possible & needful things but without being bound to any legal responsibilities.</span></li>
</ul>
<p><span style="font-weight: 400;">       </span> <span style="font-weight: 400;">So we hope you will understand this and will cooperate with us in the future if such a situation happens.<br /><br /></span></p>
<h5 style="text-align: right;"><strong>Thank You.<br /></strong>Red & White Group of Institutes<br />www.rnwmultimedia.com<strong><br /></strong></h5>';


               if(!$mail->send()) {
                 echo 'Message could not be sent.';
                 echo 'Mailer Error: ' . $mail->ErrorInfo;
               } 
               else
               { 
                session_start();
                // $this->session->set_flashdata('resetmsg','reset link sent successfully.'); 
                // redirect(base_url().'owner_controller/forgotpassword_cont');
                $_SESSION['send'] = "mail send";
                $_SESSION['success'] = "SuccessFully Registered";

                // header('location:student_placement_form.php');
                      $data_success = "Company Detail Insert Successfull!! After few days We will Conatct You Thank You!!";
                    }
            }
            else
            {
              $data_danger =  "Something Wrong !! Kindly Enter Proper Field Data";
            }
          }
        
      }
?>
    
     <!DOCTYPE html>
<html lang="en">
  <head>
    <title>RNW Placement Portal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="/favicon.png"/>
    <link rel="icon" type="image/png" href="https://demo.rnwmultimedia.com/recruiter/images/favicon_icon1.png"/>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container-fluid px-md-4 ">
        <a class="navbar-brand" href="recruiter_register.php"><img src="images/RW_white_logo.png" width="200px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li> -->
            <?php if(@$_SESSION['recruiter_data']['company_name']!='') { ?>
            <li class="nav-item"><a href="posted_job.php" class="nav-link">Posted Jobs</a></li>
            <?php } ?>

            <?php if(@$_SESSION['recruiter_data']['company_name']!='') { ?>
              <li class="nav-item cta mr-md-1"><a href="new_post.php" class="nav-link">Post a Job</a></li>
          <?php } ?>

            
          <?php if(@$_SESSION['recruiter_data']['company_name']=='') { ?>
            <li class="nav-item cta mr-md-1"><a  class="nav-link">Register</a></li>
          <?php } else { ?>
          
            <li class="nav-item cta mr-md-1"><a href="recruiter_register.php" class="nav-link">Welcome&nbsp; <?php echo $_SESSION['recruiter_data']['company_name']; ?></a></li>
        
          <?php } ?>



            <?php if(@$_SESSION['recruiter_data']['company_name']=='') { ?>
              <li class="nav-item cta cta-colored"><a href="index.php" class="nav-link">Login</a></li>
              <?php } else { ?>

                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php $student =  explode(' ',$_SESSION['recruiter_data']['company_name']);
                          echo $student[0]; ?>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <!-- <a class="dropdown-item" href="#">Applied Job</a> -->
                    <a class="dropdown-item" href="#">My Profile</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                  </div>
                </div>

              <?php } ?>

          </ul>
        </div>
      </div>
    </nav>
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/index_page_background.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Register Company</span></p>
            <h1 class="mb-3 bread">Register Company</h1>
          </div>
        </div>
      </div>
    </div>

		<section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-12 mb-5">
          <?php if(isset($data_success)) { ?>

            <div class="alert alert-success"><?php echo $data_success; ?></div>
          <?php } ?>

          <?php if(isset($data_danger)) { ?>

            <div class="alert alert-danger"><?php echo $data_danger; ?></div>
          <?php } ?>
			     <form  class="p-5 bg-white" method="post">
              <div class="row form-group mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Company Name</label>
                  <input type="text" id="company" name="company_name" class="form-control" placeholder="company_name" value="<?php if(isset($company_name)) { echo $company_name; } ?>">
                <span style="color:red"><?php if(isset($company_error)) { echo $company_error; }?></span>
                </div>

                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Company Address</label>
                  <textarea id="address" name="address" class="form-control" placeholder="address"><?php if(isset($address)) { echo $address; } ?></textarea>
                  <span style="color:red"><?php if(isset($address_error)) { echo $address_error; }?></span>
               </div>

              </div>

              <div class="row form-group mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Company Phone No</label>
                  <input type="text" id="company" name="phone" class="form-control" placeholder="phone number" value="<?php if(isset($phone)) { echo $phone; } ?>">

                  <span style="color:red"><?php if(isset($phone_error)) { echo $phone_error; }?></span>
                </div>

                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Company URL</label>
                  <input type="text" id="url" name="url" class="form-control" placeholder="http://Company URL" value="<?php if(isset($url)) { echo $url; } ?>">
                   <span style="color:red"><?php if(isset($url_error)) { echo $url_error; }?></span>
                </div>
              </div>


             



              <div class="row form-group mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Employer/Recruiter Name</label>
                  <input type="text" id="recruiter_name" name="recruiter_name" class="form-control" placeholder="recruiter_name"
                   value="<?php if(isset($recruiter_name)) { echo $recruiter_name; } ?>">
                     <span style="color:red"><?php if(isset($recruiter_name_error)) { echo $recruiter_name_error; }?></span>
                </div>

                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Employer/Recruiter Designation</label>
                  <input type="text" id="recruiter_designation" name="recruiter_designation" class="form-control" placeholder="recruiter_designation"
                  value="<?php if(isset($recruiter_designation)) { echo $recruiter_designation; } ?>">
                  <span style="color:red"><?php if(isset($recruiter_designation_error)) { echo $recruiter_designation_error; }?></span>
                </div>

              </div>


              <div class="row form-group mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Company/Recruiter Email</label>
                  <input type="email" id="email" name="email" class="form-control" placeholder="Company/Recruiter Email"
                  value="<?php if(isset($email)) { echo $email; } ?>">
                     <span style="color:red"><?php if(isset($email_error)) { echo $email_error; }?></span>
                </div>

                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Password</label>
                  <input type="password" id="password" name="password" class="form-control" placeholder="password" value="<?php if(isset($password)) { echo $password; } ?>">
                  <span style="color:red"><?php if(isset($password_error)) { echo $password_error; }?></span>
                </div>

              </div>


              <div class="row form-group mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Confirm Password</label>
                  <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Confrm Password" value="<?php if(isset($cpassword)) { echo $cpassword; } ?>">
                   <span style="color:red"><?php if(isset($cpassword_error)) { echo $cpassword_error; }?></span>
                </div>

                 <div class="col-md-6 mb-3 mb-md-0">
                  <label for="option-price-1">
                    <input type="checkbox" id="agreeterms" name="tc"  value="agree"
                    data-toggle="modal" data-target="#exampleModal"
                    <?php if(isset($tc)) { if($tc=='agree') { echo "checked"; } } ?> > <span class="text-success">Terms & Conditions</span> 


                  </label>
                  <br>
                  <span style="color:red"><?php if(isset($tc_error)) { echo $tc_error; }?></span>
                </div>
               

              </div>

              
                
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Register_company" name="RegisterCompany"  class="btn btn-primary  py-6 px-5">
                </div>
              </div>

  
            </form>
          </div>

          
        </div>
      </div>
    </section>
		
		<!-- <section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-12">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <?php include('footer.php'); ?>