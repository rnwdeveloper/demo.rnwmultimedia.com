
    <?php 
          $con = mysqli_connect("localhost","mzfrxmujjb","Q23bQYkskc","mzfrxmujjb") or die("db not connected");

          if(isset($_POST['Job_post']))
          {
            $company_name     =  $_POST['company_name'];
            $company_email    =  $_POST['company_email'];
            $recruiter_name   =  $_POST['recruiter_name'];
            $company_address  =  $_POST['company_address'];
            $job_title        =  $_POST['job_title'];
            $position         =  $_POST['position'];
            $salary           =  $_POST['salary'];
            $no_of_vacancy    =  $_POST['no_of_vacancy'];
            $start_date       =  $_POST['start_date'];
            $end_date         =  $_POST['end_date'];
            $city             =  $_POST['city'];
            $job_area         =  $_POST['job_area'];
            $description      =  $_POST['job_description'];
            // $company_id =  $_SESSION['recruiter_data']['company_id'];

            if($company_name == '')
            {
              $company_name_error  = "Enter Company Name";
            }
            else if(strlen($company_name) <= 2 )
            {
              $company_name_error = "enter proper company Name";
            }
            else
            {
              $company_name_error = '';
            }

            if($company_email == '')
            {
              $company_email_error = "Enter Company Email";
            }
            else if(!filter_var($company_email, FILTER_VALIDATE_EMAIL))
            {
              $company_email_error = "Enter Valid email address";
            }
            else 
            {
              $company_email_error = '';
            }

            if($recruiter_name == '')
            {
              $recruiter_name_error = 'Enter Recruiter Name';
            }
            else 
            {
              $recruiter_name_error = '';
            }

            if($company_address == '')
            {
              $company_address_error = 'Enter Company Address';
            }
            else
            {
              $company_address_error = '';
            }


            if($job_title == '')
            {
              $job_title_error =  "enter Job title";
            }
            else
            {
              $job_title_error = '';
            }

            if($position == '')
            {
              $position_error ="Select position of job";
            }
            else
            {
              $position_error = '';
            }

            if($salary =='')
            {
              $salary_error = "Enter salaray";
            }
            else
            {
              $salary_error ='';
            }

            if($start_date == '')
            {
              $start_date_error ="Please select start date";
            }
            else
            {
              $start_date_error ='';
            }

            if($end_date == '')
            {
              $end_date_error ="Please select end date";
            }
            else
            {
              $end_date_error ='';
            }

            if($description == '')
            {
              $description_error ="enter Description";
            }
            else
            {
              $description_error ='';
            }

            if($no_of_vacancy == '')
            {
              $no_error ="enter no_of_vacancy";
            }
            else
            {
              $no_error ='';
            }
            if($city == '')
            {
              $city_error ="Select City";
            }
            else
            {
              $city_error ='';
            }

            if($job_area == '')
            {
              $job_area_error ='Enter job area';
            }
            else
            {
              $job_area_error = '';
            }

            if($company_name_error != '' || $company_email_error != '' || $recruiter_name_error != '' || $company_address_error !='' || $job_title_error != '' || $position_error != '' || $salary_error !='' || $start_date_error != '' || $end_date_error != '' || $description_error != '' || $city_error != '' || $job_area_error != '' || $no_error != '')
            {

            }
            else
            {



            $query_post =  "insert into rapid_job_post(`company_name`,`company_email`,`company_address`,`recruiter_name`,`job_title`,`position`,`salary`,`start_date`,`end_date`,`description`,`job_city`,`job_location`,`no_of_vacancy`)values('$company_name','$company_email','$company_address','$recruiter_name','$job_title','$position','$salary','$start_date','$end_date','$description','$city','$job_area','$no_of_vacancy')";
      
            $query =  mysqli_query($con,$query_post);
            if($query)
            {
               $data_success = "Successfully Post Job";
               $company_name = $company_email = $company_address = $recruiter_name = $job_title = $position = $salary =  $start_date =  $end_date = $description = $city =  $job_area =  $no_of_vacancy = '';
            }
            else
            {
              $data_danger = "Something Wrong";
            }
           }
          }
    ?>


   
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>RNW- RAPID POST JOB</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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
        <a class="navbar-brand" href="rapid_job_detail.php">RNW - RAPID JOB POST</a>
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
        </ul>
        </div>
      </div>
    </nav>
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.2">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="rapid_job_detail.php">Home<i class="ion-ios-arrow-forward"></i></a></span> <span>Rapid Post Job</span></p>
            <h1 class="mb-3 bread">Rapid Post Job</h1>
          </div>
        </div>
      </div>
    </div>

		<section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-12 mb-5">
          

          <?php if(isset($data_success)) { ?>
              <div class="alert alert-success">

                <?php echo $data_success; ?>
              </div>
          <?php } ?>



          <?php if(isset($data_danger)) { ?>
              <div class="alert alert-success">

                <?php echo $data_danger; ?>
              </div>
          <?php } ?>
			     <form class="p-5 bg-white" method="post">

            <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Company Name</label>
                  <input type="text" id="job title" name="company_name" class="form-control" placeholder="enter company name" value="<?php if(isset($company_name)) { echo $company_name; }?>" required>
                   <span style="color:red"><?php if(isset($company_name_error)) { echo $company_name_error; } ?></span>
                </div>


                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Company/Personal Email</label>
                  <input type="text" id="enter" min="1" name="company_email" class="form-control"
                  value="<?php if(isset($company_email)) { echo $company_email; }?>" required  placeholder="enter company email or personal email">
                <span style="color:red"><?php if(isset($company_email_error)) { echo $company_email_error; } ?></span>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Recruiter Name</label>
                  <input type="text" id="job title" name="recruiter_name" class="form-control" placeholder="Enter Recruiter name" value="<?php if(isset($recruiter_name)) { echo $recruiter_name; }?>" required>
                   <span style="color:red"><?php if(isset($recruiter_name_error)) { echo $recruiter_name_error; } ?></span>
                </div>


                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Company Address</label>
                  <input type="text" id="job title" min="1" name="company_address" class="form-control"
                  value="<?php if(isset($company_address)) { echo $company_address; }?>" required 
                  placeholder="enter company address">
                <span style="color:red"><?php if(isset($company_address_error)) { echo $company_address_error; } ?></span>
                </div>
              </div>

              
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Job Title</label>
                  <input type="text" id="job title" name="job_title" class="form-control" placeholder="eg. Professional UI/UX Designer" required value="<?php if(isset($job_title)) { echo $job_title; }?>">
                  <span style="color:red"><?php if(isset($job_title_error)) { echo $job_title_error; } ?></span>
                </div>
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Position</label>
                 
                  <select class="form-control" name="position" required>
                      <option value="">--select option--</option>
                      <option value="photoshop" <?php if(isset($Position)) { if($position=="photoshop"){ echo "selected"; }}?>>Photoshop</option>
                      <option value="video editor" <?php if(isset($Position)) { if($position=="video editor"){ echo "selected"; }}?>>Video Editor</option>
                      <option value="web designer" <?php if(isset($Position)) { if($position=="web designer"){ echo "selected"; }}?> >Web Designer</option>
                      <option value="graphic designer" <?php if(isset($Position)) { if($position=="graphic designer"){ echo "selected"; }}?>>Graphic Designer</option>
                      <option value="front developer" <?php if(isset($Position)) { if($position=="front developer"){ echo "selected"; }}?>>Front Developer</option>
                      <option value="core php" <?php if(isset($Position)) { if($position=="core php"){ echo "selected"; }}?>>Core Php</option>
                      <option value="laravel" <?php if(isset($Position)) { if($position=="laravel"){ echo "selected"; }}?>>Laravel Developer</option>
                      <option value="core android" <?php if(isset($Position)) { if($position=="core android"){ echo "selected"; }}?>>Core Android</option>
                      <option value="android" <?php if(isset($Position)) { if($position=="android"){ echo "selected"; }}?>>Android</option>
                      

                  </select>
                   <span style="color:red"><?php if(isset($position_error)) { echo $position_error; } ?></span>
                </div>
              </div>

              

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Salary</label>
                  <input type="text" id="job title" name="salary" class="form-control" placeholder="eg. 10000-20000" value="<?php if(isset($salary)) { echo $salary; }?>" required>
                   <span style="color:red"><?php if(isset($salary_error)) { echo $salary_error; } ?></span>
                </div>


                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">No of Vacancies</label>
                  <input type="number" id="job title" min="1" name="no_of_vacancy" class="form-control"
                  value="<?php if(isset($no_of_vacancy)) { echo $no_of_vacancy; }?>" required placeholder="enter Number of vacancy" >
                <span style="color:red"><?php if(isset($no_error)) { echo $no_error; } ?></span>
                </div>
              </div>



              <div class="row form-group">

                 <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Start Date</label>
                  <input type="date" id="job title" name="start_date" class="form-control" 
                  value="<?php if(isset($start_date)) { echo $start_date; }?>" required>
                  <span style="color:red"><?php if(isset($start_date_error)) { echo $start_date_error; } ?></span>
                </div>


                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">End Date</label>
                  <input type="date" id="job title" name="end_date" class="form-control"
                  value="<?php if(isset($end_date)) { echo $end_date; }?>" required>
                  <span style="color:red"><?php if(isset($end_date_error)) { echo $end_date_error; } ?></span>
                </div>

                

              </div>


              <div class="row form-group mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Job City</label>
                 
                  <select class="form-control" name="city" required>
                      <option value="">--select option--</option>
                      <option value="Surat" <?php if(isset($city)) { if($city=='Surat') { echo "selected"; }}?>>Surat</option>
                      <option value="Ahamadabad" <?php if(isset($city)) { if($city=='Ahamadabad') { echo "selected"; }}?>>Ahamadabad</option>
                      <option value="Vadodara" <?php if(isset($city)) { if($city=='Vadodara') { echo "selected"; }}?>>Vadodara</option>
                      <option value="Rajkot" <?php if(isset($city)) { if($city=='Rajkot') { echo "selected"; }}?>>Rajkot</option>
                     
                  </select>
                  <span style="color:red"><?php if(isset($city_error)) { echo $city_error; } ?></span>
                </div>

                
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Job Location</label>
                  <input type="text" id="job area" name="job_area" class="form-control"
                  value="<?php if(isset($job_area)) { echo $job_area; }?>" required placeholder="enter job area">
                  <span style="color:red"><?php if(isset($job_area_error)) { echo $job_area_error; } ?></span>
                </div>

                
              </div>
              
              <div class="row form-group">
                <label class="font-weight-bold" for="fullname">Job Description</label>
                <div class="col-md-12 mb-3 mb-md-0">
                  <textarea  class="form-control" name="job_description" id="" required cols="30" rows="5"><?php if(isset($description)) { echo $description; } ?> </textarea>
                  <span style="color:red"><?php if(isset($description_error)) { echo $description_error; } ?></span>
                </div>  
              </div>

              <div class="row form-group">
                
              </div>

             

              

              <div class="row form-group">
                <div class="col-md-12">
                 
                     <input type="submit" value="Post" name="Job_post" class="btn btn-primary  py-6 px-5">
                
                </div>
              </div>

  
            </form>
          </div>

         
        </div>
      </div>
    </section>
		
		

    <?php include('footer.php'); ?>