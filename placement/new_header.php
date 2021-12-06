<?php 
ob_start();
session_start();
if($_SESSION['record']['company_name']=='')
{
 header('location:logout.php');
}

 ?>

 <!DOCTYPE html>

<html>

<head>

	<meta http-equiv="Cache-Control" content="no-cache" />

	<meta http-equiv="Pragma" content="no-cache" />

	<meta http-equiv="Expires" content="0" />

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>RNW Placement Portal</title>

	 <link rel="icon" type="image/png" href="/favicon.png"/>

    <link rel="icon" type="image/png" href="https://demo.rnwmultimedia.com/recruiter/images/favicon_icon1.png"/>

	<link rel="stylesheet" type="text/css" href="nirbhay_virani/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="nirbhay_virani/css/all.min.css">

	<link rel="stylesheet" type="text/css" href="nirbhay_virani/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="nirbhay_virani/css/style.css">

	<link rel="stylesheet" type="text/css" href="nirbhay_virani/css/media.css">

	<link rel="stylesheet" type="text/css" href="nirbhay_virani/css/owl.carousel.min.css">

	<link rel="stylesheet" type="text/css" href="nirbhay_virani/css/owl.theme.default.min.css">

	<link rel="stylesheet" type="text/css" href="nirbhay_virani/css/fonts.css">

	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <link rel="stylesheet" href="https://resources/demos/style.css">

</head>

<body data-spy="scroll" data-target="#header_bottom" data-offset="40">

	<header class="header d-inline-block w-100 position-relative" id="header">

		<div class="header_top">

			<div class="container">

				<div class="row align-items-center">

					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mx-auto">

						<div class="logo_block">

							<a href="#" class="logo"><img src="images/logo.png" width="100%"></a>

						</div>

					</div>

					<div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 border-right border-secondary">

						<div class="header_top_left_contect_block text-right">

							<ul>

								<li>

									<a href="tel:9331313196">+91 93313 13196</a>

								</li>

								<li>

									<a href="mailto:placement.rnwmultimedia@gmail.com">placement.rnwmultimedia@gmail.com</a>

								</li>

							</ul>

						</div>

					</div>

					<div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">

						<div class="header_top_left_contect_block text-left">

							<ul>

								<li>

									<a href="tel:9331313196"><i class="fa fa-clock-o" style="padding: 2px 5px 0px 0px; font-size: 12px;"></i> Tuesday | Friday</a>

								</li>

								<li>

									<a href="mailto:placement.rnwmultimedia@gmail.com"><i class="fa fa-calendar" style="padding: 5px 5px 0px 0px; "></i> 12:00 PM to 1:00 PM | 2:00 PM to 4:00 PM </a>

								</li>

							</ul>							

						</div>

					</div>

				</div>

			</div>

		</div>

		<div class="header_bottom navbar navbar-expand-lg navbar-dark" id="header_bottom">

			<div class="container">

				<a href="#" class="navbar-brand">

					<img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/05/logoWhite.png" width="100%" class="logo">

				</a>

				<button class="navbar-toggler" data-toggle="collapse" data-target="#menu"><i class="fa fa-bars"></i></button>

				<nav class="collapse navbar-collapse justify-content-center" id="menu">

					<ul class="navbar-nav">

						<li class="nav-item">

							<a href="index.php" class="nav-link">Home</a>

						</li>

						<li class="nav-item">

							<a href="post_a_job.php" class="nav-link">Post Jobs</a>

						</li>

						<li class="nav-item">

							<a href="posted_job.php" class="nav-link">Posted Jobs</a>

						</li>



						

					<?php if(isset($_SESSION['record']['company_name'])) { ?>

						<li class="nav-item dropdown">

							<a class="nav-link" data-toggle="dropdown" style="color:red;">Welcome <?php echo substr($_SESSION['record']['company_name'],0,5)."..."; ?></a>

							<ul class="dropdown-menu ">

								<!-- <li class="nav-item">

									<a class="dropdown-item">Profile</a>

								</li> -->



								

								<li class="nav-item">

									<a class="dropdown-item" href="company_profile_edit.php">Profile</a>

								</li>

								<li class="nav-item">

									<a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">Any Query!</a>

								</li>

								<li class="nav-item">

									<a href="logout.php" class="dropdown-item">Logout</a>

								</li>



							</ul>

						</li>

						<?php } ?>

					</ul>

				</nav>

			</div>

		</div>

	</header>

	