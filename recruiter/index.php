
    
    <?php

     // include('header.php');
    session_start();
          include('db.php');
          include('constant.php');

          if(isset($_POST['submit']))
          {
            $email = $_POST['email'];
            $pass = $_POST['password'];
            if($email == '')
            {
              $email_error = "Enter Email";
            }
            else
            {
              $email_error = '';
            }

            if($pass == '')
            {
              $pass_error = "enter password";
            }
            else
            {
              $pass_error = '';
            }


            //reCAPTCHA validation
  if (isset($_POST['g-recaptcha-response'])) {
    
    require('component/recaptcha/src/autoload.php');    
    
    $recaptcha = new \ReCaptcha\ReCaptcha(SECRET_KEY);

    $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

      if (!$resp->isSuccess()) {
        // $output = json_encode(array('type'=>'error', 'text' => '<b>Captcha</b> Validation Required!'));
        $output = "Captcha Validation Required!";
      } 
      else{
        $output = '';
      }
  }

            // if (isset($_POST['g-recaptcha-response'])) {
    
            //     include('component/recaptcha/src/autoload.php');    
                
            //     $recaptcha = new \ReCaptcha\ReCaptcha(SECRET_KEY);

            //     $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

            //       if (!$resp->isSuccess()) {
            //         $cap_error ="Invalid Captch";
                    
            //       } 
            //       else
            //       {
            //         $cap_error = '';
            //       }
            // }

            if($email_error != '' || $pass_error != '' || $output != '')
            {

            }
          
            else
            {
                $qu ="select * from company_detail where `email_id`='$email' AND `password`='$pass' AND `status`='1'";
                $qu1 = mysqli_query($con,$qu);
                $num =  mysqli_num_rows($qu1);
                if($num == 1)
                {
                   $_SESSION['recruiter_data'] = mysqli_fetch_array($qu1);
                   $data1 ="successfully Login";
                }
                else
                {
                  $data =  "Email & Password Not Match";
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
  <style>
    .g-recaptcha {margin: 0 0 25px 0;}    
  </style>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container-fluid px-md-4 ">
        <a class="navbar-brand" href="index.php"><img src="images/RW_white_logo.png" width="200px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li> -->
            <?php if(@$_SESSION['recruiter_data']['company_name']!='') { ?>
            <li class="nav-item"><a href="posted_job.php" class="nav-link">Posted Jobs</a></li>
            <?php } ?>
            <!-- <li class="nav-item"><a href="candidates.html" class="nav-link">Canditates</a></li> -->
            <!-- <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> -->
            <!-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
            <?php if(@$_SESSION['recruiter_data']['company_name']!='') { ?>
              <li class="nav-item cta mr-md-1"><a href="new_post.php" class="nav-link">Post a Job</a></li>
          <?php } ?>

            
            <?php if(@$_SESSION['recruiter_data']['company_name']=='') { ?>
              <li class="nav-item cta mr-md-1"><a href="recruiter_register.php" class="nav-link">Register</a></li>
              <?php } else { ?>

                <!--    <li class="nav-item cta mr-md-1"><a href="javascript:show('#')" class="nav-link">Welcome&nbsp; <?php echo substr($_SESSION['recruiter_data']['company_name'],0,10)."..."; ?></a></li> -->

              <?php } ?>



            <?php if(@$_SESSION['recruiter_data']['company_name']=='') { ?>
              <li class="nav-item cta cta-colored"><a href="index.php" class="nav-link">Login</a></li>
              <?php } else { ?>

                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo   substr($_SESSION['recruiter_data']['company_name'],0,10)."..."; ?>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Applied Job</a>
                    <a class="dropdown-item" href="#">My Profile</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                  </div>
                </div>

              <?php } ?>

          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->
    <!-- END nav -->
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/index_page_background.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Recruiter Login</span></p>
            <h1 class="mb-3 bread">Recruiter Login</h1>
          </div>
        </div>
      </div>
    </div>

    <?php if(isset($data)) { ?>
              <div class="alert alert-danger">
                  <?php echo $data; ?>
              </div>
          <?php } ?>

          <?php if(isset($data1)) { ?>
              <div class="alert alert-success">
                  <?php echo $data1; ?>
              </div>
          <?php } ?>


          <?php if(isset($_SESSION['login_first'])) { ?>
              <div class="alert alert-success">
                  <?php echo $_SESSION['login_first']; ?>
              </div>
          <?php } unset($_SESSION['login_first']);?>

		<section class="ftco-section contact-section bg-light">

      <div class="container">


        
        <div class="row block-9">


          
          <div class="col-md-6 order-md-last d-flex" style="align-items: center;">
            
            <form class="bg-white p-5 contact-form" method="post">
              <div class="form-group">
                <input type="username" class="form-control" name="email" placeholder="Your email">
                <span style="color:red"><?php if(isset($email_error)) { echo $email_error;  } ?></span>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Your Password">
                  <span style="color:red"><?php if(isset($pass_error)) { echo $pass_error;  } ?></span> 
              </div>

              <div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY; ?>"></div>      
               <span style="color:red"><?php if(isset($output)) { echo $output;  } ?></span>
              <div class="form-group">
                <input type="submit" value="Login" name="submit"  class="btn btn-primary py-3 px-5">
              </div>
            
            
            </form>
          
          </div>

          
        </div>
      </div>
    </section>
    <?php include('footer.php');?>