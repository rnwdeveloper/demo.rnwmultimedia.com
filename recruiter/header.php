<?php session_start(); 
  

  if(@$_SESSION['recruiter_data']['company_name']=='')
  {
    header('location:recruiter_register.php');
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
        <a class="navbar-brand" href="index.html"><img src="images/RW_white_logo.png" width="200px"></a>
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
<!-- 
                   <li class="nav-item cta mr-md-1"><a href="javascript:show(#)" class="nav-link">Welcome&nbsp; <?php echo substr($_SESSION['recruiter_data']['company_name'],0,10)."..."; ?></a></li> -->

              <?php } ?>



            <?php if(@$_SESSION['recruiter_data']['company_name']=='') { ?>
              <li class="nav-item cta cta-colored"><a href="index.php" class="nav-link">Login</a></li>
              <?php } else { ?>

                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo substr($_SESSION['recruiter_data']['company_name'],0,10)."..."; ?>
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