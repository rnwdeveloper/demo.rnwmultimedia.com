
    <?php include('header.php'); 
          include('db.php');

          if(isset($_POST['Job_post']))
          {
            $job_title =  $_POST['job_title'];
            $position =  $_POST['position'];
            $salary =  $_POST['salary'];
            $start_date =  $_POST['start_date'];
            $end_date =  $_POST['end_date'];
            $description =  $_POST['job_description'];
            $no_of_vacancy =  $_POST['no_of_vacancy'];
            $city =  $_POST['city'];
            $job_area =  $_POST['job_area'];
            $company_id =  $_SESSION['recruiter_data']['company_id'];

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

            if($job_title_error != '' || $position_error != '' || $salary_error !='' || $start_date_error != '' || $end_date_error != '' || $description_error != '' || $city_error != '' || $job_area_error != '' || $no_error != '')
            {

            }
            else
            {



            $query_post =  "insert into job_post(`job_name`,`position`,`salary`,`start_date`,`end_date`,`job_description`,`city`,`job_area`,`company_id`,`no_of_vacancy`)values('$job_title','$position','$salary','$start_date','$end_date','$description','$city','$job_area','$company_id','$no_of_vacancy')";
            $query =  mysqli_query($con,$query_post);
            if($query)
            {
               $data_success = "Successfully Post Job";
            }
            else
            {
              $data_danger = "Something Wrong";
            }
           }
          }
    ?>
    <!-- <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5"> -->
      <div class="hero-wrap hero-wrap-2" style="background-image: url('images/new_post_background.jpg');" data-stellar-background-ratio="0.9">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Job Post</span></p>
            <h1 class="mb-3 bread">Post A Job</h1>
          </div>
        </div>
      </div>
    </div>

		<section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
          

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
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Job Title</label>
                  <input type="text" id="job title" name="job_title" class="form-control" placeholder="eg. Professional UI/UX Designer" required value="<?php if(isset($job_title)) { echo $job_title; }?>">
                  <span style="color:red"><?php if(isset($job_title_error)) { echo $job_title_error; } ?></span>
                </div>
              </div>

              <div class="row form-group mb-5">
                <div class="col-md-12 mb-3 mb-md-0">
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
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Salary</label>
                  <input type="text" id="job title" name="salary" class="form-control" placeholder="eg. 10000-20000" value="<?php if(isset($salary)) { echo $salary; }?>" required>
                   <span style="color:red"><?php if(isset($salary_error)) { echo $salary_error; } ?></span>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Start Date</label>
                  <input type="date" id="job title" name="start_date" class="form-control" 
                  value="<?php if(isset($start_date)) { echo $start_date; }?>" required>
                  <span style="color:red"><?php if(isset($start_date_error)) { echo $start_date_error; } ?></span>
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">End Date</label>
                  <input type="date" id="job title" name="end_date" class="form-control"
                  value="<?php if(isset($end_date)) { echo $end_date; }?>" required>
                  <span style="color:red"><?php if(isset($end_date_error)) { echo $end_date_error; } ?></span>
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
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">No of Vacancies</label>
                  <input type="number" id="job title" min="1" name="no_of_vacancy" class="form-control"
                  value="<?php if(isset($no_of_vacancy)) { echo $no_of_vacancy; }?>" required >
                <span style="color:red"><?php if(isset($no_error)) { echo $no_error; } ?></span>
                </div>
              </div>

              <div class="row form-group mb-5">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">City</label>
                 
                  <select class="form-control" name="city" required>
                      <option value="">--select option--</option>
                      <option value="Surat" <?php if(isset($city)) { if($city=='Surat') { echo "selected"; }}?>>Surat</option>
                      <option value="Ahamadabad" <?php if(isset($city)) { if($city=='Ahamadabad') { echo "selected"; }}?>>Ahamadabad</option>
                      <option value="Vadodara" <?php if(isset($city)) { if($city=='Vadodara') { echo "selected"; }}?>>Vadodara</option>
                      <option value="Rajkot" <?php if(isset($city)) { if($city=='Rajkot') { echo "selected"; }}?>>Rajkot</option>
                     
                  </select>
                  <span style="color:red"><?php if(isset($city_error)) { echo $city_error; } ?></span>
                </div>
              </div>
              

              <div class="row form-group mb-4">
                <div class="col-md-12"><h3>Location</h3></div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <input type="text" class="form-control" name="job_area" placeholder="Western City, UK
" value="<?php if(isset($job_area)) { echo $job_area; }?>" required>
              <span style="color:red"><?php if(isset($job_area_error)) { echo $job_area_error; } ?></span>
                </div>
              </div>

              

              <div class="row form-group">
                <div class="col-md-12">
                  <?php if(@$_SESSION['recruiter_data']['company_name']=='') { ?>
                     <a  class="btn btn-primary  py-2 px-5" href="login.php" >Post</a>
                     <?php @$_SESSION['login_first'] = "You have to login first"; ?>
                  <?php } else { ?>
                     <input type="submit" value="Post"name="Job_post" class="btn btn-primary  py-6 px-5">
                 <?php } ?>
                </div>
              </div>

  
            </form>
          </div>
<!-- 
          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Contact Info</h3>
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="#"><span class="__cf_email__" data-cfemail="671e081215020a060e0b2703080a060e094904080a">[email&#160;protected]</span></a></p>

            </div>
            
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">More Info</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur</p>
              <p><a href="#" class="btn btn-primary  py-2 px-4">Learn More</a></p>
            </div>
          </div> -->
        </div>
      </div>
    </section>
		
	<!-- 	<section class="ftco-section-parallax">
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