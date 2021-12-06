<?php 
session_start();
include('student_header.php'); 
 include('db.php');

   	 $graphic =  "select * from job_post where `position`='Graphic Designer' AND `job_status`='0'";
   	 $graphic1 =  mysqli_query($con,$graphic);
   	 $num_graphic =  mysqli_num_rows($graphic1);

   	 $web_designer =  "select * from job_post where `position`='Web Designer' AND `job_status`='0'";
   	 $web_designer1 =  mysqli_query($con,$web_designer);
   	 $num_web_des =  mysqli_num_rows($web_designer1);

   	 $web_deve =  "select * from job_post where `position`='Web Development' AND `job_status`='0'";
   	 $web_deve1 =  mysqli_query($con,$web_deve);
   	 $num_web_deve =  mysqli_num_rows($web_deve1);

   	 $android =  "select * from job_post where `position`='Android' AND `job_status`='0'";
   	 $android1 =  mysqli_query($con,$android);
   	 $num_android =  mysqli_num_rows($android1);

   	 $ios =  "select * from job_post where `position`='iOS' AND `job_status`='0'";
   	 $ios1 =  mysqli_query($con,$ios);
   	 $num_ios =  mysqli_num_rows($ios1);

   	 $animation =  "select * from job_post where `position`='Animation' AND `job_status`='0'";
   	 $animation1 =  mysqli_query($con,$animation);
   	 $num_animation =  mysqli_num_rows($animation1);
    ?>
	
	<style type="text/css">
		.btn-success {
		    border-radius: 3px;
		    border: 0;
		    background: #C52410;
		    text-transform: uppercase;
		    padding: 0 45px;
		    line-height: 2;
		    font-size: 18px;
		    -webkit-transition: all 0.5s;
		    -moz-transition: all 0.5s;
		    transition: all 0.5s;
		}
		.btn-cust .btn-success {
		    border-radius: 3px;
		    border: 0;
		    background: #C52410;
		    text-transform: uppercase;
		    padding: 0 45px;
		    line-height: 44px;
		    font-size: 18px;
		    -webkit-transition: all 0.5s;
		    -moz-transition: all 0.5s;
		    transition: all 0.5s;
		}
		.btn-text {
		    font-size: 12px !important;
		    line-height: 30px !important;
		    padding: 0 30px !important;
		    margin-bottom: 20px !important;
		}
	</style>

	<section class="posted_job_form d-inline-block w-100 position-relative" id="post_a_job">
		<div class="container">

			<style>
				
	 	.post_help{
			position: absolute;
			right: 0px;
			top: 100px;
			background-color:lightgray;
			width: 50px;
			color:red;
			border-top-left-radius: 10px;
			border-bottom-left-radius: 10px;
			cursor: pointer;
			text-align: center;
			z-index:2;

		}

		.post_help:hover{
			cursor: hand !important;
		}
		.post_help img{
			margin-left:4px;
			margin-top:5px;
		}

		.post_help span{
			text-align: center;
			left:10px;
			font-weight: 800;
			font-size:20px;



		}
		 .modal-body iframe{
            max-width:100%;
        }


			</style>


			<div class="post_help" data-target="#myModal"  data-toggle="modal" id="post_help">  

							<img src="https://demo.rnwmultimedia.com/placement/images/helpIcon.png" height="30" width="30">

							<!-- <span ><i class="fas fa-hands-helping" ></i></span> -->

				            <span>
				            	<br>H<br>e<br>l<br>p
				            </span>

				        </div>



			<div class="row">
				<div class="col-xl-12">
					<?php if(@$_SESSION['login_data']) { ?>
						<div class="alert alert-success"><?php echo @$_SESSION['login_data']; ?></div>
					<?php unset($_SESSION['login_data']); } ?>
					<div class="sec-heading text-center">
			            <h2>The Eassiest Way to Get Your New Job</h2>
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
							 		<input type="text" name="location" placeholder="Location" class="form-control">
							 	</div>
							 </div>
							 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
							 	<label>&nbsp;</label>
							 		<button type="submit" name="search" value="Search" class="btn btn-success btn-block">Search</button>
							 </div>
						</div>
					</div>
				</form>
			</div>
			<div class="row main_page_job_position_block mt-4">
				<div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
					<div class="posted_job_box main_page_job_position_box">
						<div class="position_job_icon">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="512" height="512"><g id="coding"><path d="M59,14H48V3a1,1,0,0,0-1-1H17a1,1,0,0,0-1,1V14H5a3.009,3.009,0,0,0-3,3V49a3.009,3.009,0,0,0,3,3H24.82l-.67,4H23a1.014,1.014,0,0,0-.8.4l-3,4A1,1,0,0,0,20,62H44a1,1,0,0,0,.8-1.6l-3-4A1.014,1.014,0,0,0,41,56H39.85l-.67-4H59a3.009,3.009,0,0,0,3-3V17A3.009,3.009,0,0,0,59,14ZM18,4H46V24H18ZM40.5,58,42,60H22l1.5-2ZM26.18,56l.67-4h10.3l.67,4ZM60,49a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V46H60Zm0-5H4V17a1,1,0,0,1,1-1H16v9a1,1,0,0,0,1,1H47a1,1,0,0,0,1-1V16H59a1,1,0,0,1,1,1Z"/><path d="M57,28H45a1,1,0,0,0-1,1v1H36V29a1,1,0,0,0-1-1H29a1,1,0,0,0-1,1v1H20V29a1,1,0,0,0-1-1H7a1,1,0,0,0-1,1v4a1,1,0,0,0,1,1H19a1,1,0,0,0,1-1V32h8v1a1,1,0,0,0,1,1h2v2H29a1,1,0,0,0-1,1v4a1,1,0,0,0,1,1h6a1,1,0,0,0,1-1V37a1,1,0,0,0-1-1H33V34h2a1,1,0,0,0,1-1V32h8v1a1,1,0,0,0,1,1H57a1,1,0,0,0,1-1V29A1,1,0,0,0,57,28ZM18,32H8V30H18Zm16,6v2H30V38Zm0-6H30V30h4Zm22,0H46V30H56Z"/><path d="M26.293,7.293l-6,6a1,1,0,0,0,0,1.414l6,6,1.414-1.414L22.414,14l5.293-5.293Z"/><path d="M37.707,7.293,36.293,8.707,41.586,14l-5.293,5.293,1.414,1.414,6-6a1,1,0,0,0,0-1.414Z"/><rect x="22.513" y="13" width="18.974" height="1.999" transform="translate(8.591 39.923) rotate(-71.547)"/></g></svg>
						</div>
						<!-- <a href="#">Website & Software</a> -->
						<a href="search_viewjobs.php?search=Search&position=Web Designer">Website Designer</a>
						<p class="open_position_job">
							<span class="open_position_job_number"><?php echo $num_web_des;?></span>
							<span>Open Position</span>
						</p>
					</div>
				</div>
				<div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
					<div class="posted_job_box main_page_job_position_box">
						<div class="position_job_icon">
							<svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><g><g><g><g><g><path d="m256 357.621c-25.846 0-46.873-21.027-46.873-46.873s21.027-46.873 46.873-46.873 46.873 21.027 46.873 46.873-21.027 46.873-46.873 46.873zm0-73.745c-14.818 0-26.873 12.055-26.873 26.873 0 14.817 12.055 26.873 26.873 26.873 14.817 0 26.873-12.055 26.873-26.873s-12.056-26.873-26.873-26.873z"/></g></g><g><g><path d="m316.59 249.62c-6.89.19-12.07-7.527-9.24-13.83 4.281-10.013 19.116-7.053 19.24 3.83.1 5.37-4.633 10.09-10 10z"/></g></g></g></g><g><path d="m479.971 33.171c-14.17 0-26.22 9.25-30.43 22.029h-150.548c-6.61-17.311-23.389-29.64-42.995-29.64-19.605 0-36.384 12.328-42.994 29.64h-150.545c-4.21-12.779-16.26-22.029-30.43-22.029-17.661 0-32.029 14.368-32.029 32.029 0 17.66 14.368 32.029 32.029 32.029 14.17 0 26.22-9.25 30.43-22.029h56.982c-6.508 4.285-12.656 9.223-18.359 14.779-22.505 21.927-35.576 51.022-36.938 82.112-14.86 4.294-25.759 18.021-25.759 34.247 0 19.652 15.988 35.641 35.64 35.641s35.641-15.988 35.641-35.641c0-16.132-10.773-29.794-25.503-34.172 2.799-53.689 48.115-96.966 102.14-96.966h23.839c1.861 23.67 21.717 42.361 45.857 42.361s43.996-18.691 45.858-42.361h23.838c53.972 0 99.332 43.291 102.138 96.951-14.756 4.361-25.554 18.036-25.554 34.187 0 19.652 15.988 35.641 35.641 35.641 19.652 0 35.641-15.988 35.641-35.641 0-16.206-10.873-29.92-25.707-34.232-1.36-31.144-14.473-60.287-37.035-82.222-5.676-5.518-11.792-10.424-18.264-14.685h56.986c4.21 12.779 16.26 22.029 30.43 22.029 17.661.001 32.029-14.368 32.029-32.028 0-17.661-14.368-32.029-32.029-32.029zm-447.942 44.058c-6.633 0-12.029-5.396-12.029-12.029s5.396-12.029 12.029-12.029 12.029 5.396 12.029 12.029-5.396 12.029-12.029 12.029zm57.637 129.109c0 8.624-7.016 15.641-15.641 15.641-8.624 0-15.64-7.016-15.64-15.641s7.016-15.641 15.64-15.641c8.625 0 15.641 7.016 15.641 15.641zm166.332-108.777c-14.336 0-26-11.664-26-26 0-14.337 11.664-26 26-26 14.337 0 26.001 11.664 26.001 26s-11.664 26-26.001 26zm197.562 108.777c0 8.624-7.017 15.641-15.641 15.641s-15.641-7.016-15.641-15.641 7.017-15.641 15.641-15.641 15.641 7.016 15.641 15.641zm26.411-129.109c-6.633 0-12.028-5.396-12.028-12.029s5.395-12.029 12.028-12.029 12.029 5.396 12.029 12.029-5.397 12.029-12.029 12.029z"/><path d="m343.985 269.102c-2.636-4.854-8.706-6.65-13.561-4.014-4.853 2.636-6.65 8.707-4.014 13.561l11.928 21.957c5.632 10.367 5.748 22.807.313 33.278l-28.504 54.916h-108.294l-28.506-54.915c-5.435-10.471-5.318-22.912.313-33.278l72.34-133.168v61.618c0 5.523 4.477 10 10 10 5.522 0 10-4.477 10-10v-61.617l20.183 37.153c2.636 4.854 8.706 6.65 13.561 4.014 4.853-2.636 6.65-8.708 4.014-13.561l-28.061-51.655c-1.75-3.221-5.121-5.227-8.787-5.227h-21.818c-3.665 0-7.038 2.005-8.787 5.227l-80.219 147.669c-8.805 16.211-8.988 35.665-.489 52.038l23.724 45.703h-2.783c-5.523 0-10 4.477-10 10s4.477 10 10 10h6.427l-16.293 65.214c-.747 2.987-.075 6.152 1.82 8.579s4.803 3.845 7.882 3.845h159.251c3.079 0 5.986-1.418 7.882-3.845 1.895-2.427 2.566-5.591 1.82-8.579l-16.293-65.214h6.429c5.522 0 10-4.477 10-10s-4.478-10-10-10h-2.782l23.723-45.703c8.5-16.374 8.317-35.828-.489-52.04zm-21.167 197.338h-133.64l14.401-57.638h104.838z"/></g></g></g></svg>
						</div>
						<a href="search_viewjobs.php?search=Search&position=Graphic Designer">Graphics Designer</a>
						<p class="open_position_job">
							<span class="open_position_job_number"><?php echo $num_graphic;?></span>
							<span>Open Position</span>
						</p>
					</div>
				</div>
				<div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
					<div class="posted_job_box main_page_job_position_box">
						<div class="position_job_icon">
							<svg height="511pt" viewBox="0 0 511.998 511" width="511pt" xmlns="http://www.w3.org/2000/svg"><path d="m58.960938 187.046875c1.460937 1.460937 3.378906 2.195313 5.296874 2.195313 1.917969 0 3.835938-.730469 5.300782-2.195313 2.925781-2.925781 2.925781-7.671875 0-10.597656l-18.195313-18.195313 18.195313-18.191406c2.925781-2.929688 2.925781-7.671875 0-10.597656-2.925782-2.925782-7.671875-2.925782-10.597656 0l-23.492188 23.492187c-1.40625 1.40625-2.195312 3.3125-2.195312 5.296875 0 1.988282.789062 3.894532 2.195312 5.300782zm0 0"/><path d="m133.320312 158.253906-18.195312 18.195313c-2.925781 2.925781-2.925781 7.671875.003906 10.597656 1.460938 1.460937 3.378906 2.195313 5.296875 2.195313s3.835938-.734376 5.296875-2.195313l23.496094-23.496094c2.925781-2.925781 2.925781-7.671875 0-10.59375l-23.496094-23.496093c-2.925781-2.925782-7.667968-2.925782-10.59375 0-2.929687 2.929687-2.929687 7.671874 0 10.597656zm0 0"/><path d="m81.171875 188.722656c.898437.351563 1.828125.519532 2.738281.519532 2.992188 0 5.816406-1.804688 6.976563-4.753907l18.457031-46.988281c1.515625-3.851562-.382812-8.199219-4.234375-9.714844-3.847656-1.511718-8.199219.382813-9.710937 4.234375l-18.460938 46.988281c-1.511719 3.851563.382812 8.203126 4.234375 9.714844zm0 0"/><path d="m45.007812 233.203125h50.480469c4.136719 0 7.492188-3.355469 7.492188-7.496094 0-4.136719-3.355469-7.492187-7.492188-7.492187h-50.480469c-4.140624 0-7.492187 3.355468-7.492187 7.492187 0 4.140625 3.351563 7.496094 7.492187 7.496094zm0 0"/><path d="m211.753906 218.214844h-88.75c-4.136718 0-7.492187 3.355468-7.492187 7.492187 0 4.140625 3.355469 7.496094 7.492187 7.496094h88.75c4.140625 0 7.496094-3.355469 7.496094-7.496094 0-4.136719-3.355469-7.492187-7.496094-7.492187zm0 0"/><path d="m45.007812 264.808594h21.503907c4.136719 0 7.492187-3.355469 7.492187-7.496094 0-4.136719-3.355468-7.492188-7.492187-7.492188h-21.503907c-4.140624 0-7.492187 3.355469-7.492187 7.492188 0 4.140625 3.351563 7.496094 7.492187 7.496094zm0 0"/><path d="m184.339844 249.820312c-4.140625 0-7.492188 3.355469-7.492188 7.492188 0 4.140625 3.351563 7.496094 7.492188 7.496094h13.09375c4.140625 0 7.496094-3.355469 7.496094-7.496094 0-4.136719-3.355469-7.492188-7.496094-7.492188zm0 0"/><path d="m164.617188 257.3125c0-4.136719-3.355469-7.492188-7.492188-7.492188h-64.320312c-4.140626 0-7.492188 3.355469-7.492188 7.492188 0 4.140625 3.351562 7.496094 7.492188 7.496094h64.320312c4.136719 0 7.492188-3.355469 7.492188-7.496094zm0 0"/><path d="m213.703125 257.3125c0 4.140625 3.355469 7.496094 7.492187 7.496094h24.527344c4.140625 0 7.496094-3.355469 7.496094-7.496094 0-4.136719-3.355469-7.492188-7.496094-7.492188h-24.527344c-4.136718 0-7.492187 3.355469-7.492187 7.492188zm0 0"/><path d="m172.894531 164.265625h25.871094c4.140625 0 7.496094-3.355469 7.496094-7.496094 0-4.136719-3.355469-7.492187-7.496094-7.492187h-25.871094c-4.140625 0-7.496093 3.355468-7.496093 7.492187 0 4.140625 3.355468 7.496094 7.496093 7.496094zm0 0"/><path d="m227.742188 164.265625h157.855468c4.140625 0 7.492188-3.355469 7.492188-7.496094 0-4.136719-3.351563-7.492187-7.492188-7.492187h-157.855468c-4.140626 0-7.496094 3.355468-7.496094 7.492187 0 4.140625 3.355468 7.496094 7.496094 7.496094zm0 0"/><path d="m361.621094 182.246094h-63.945313c-4.136719 0-7.492187 3.355468-7.492187 7.496094 0 4.136718 3.355468 7.492187 7.492187 7.492187h63.945313c4.136718 0 7.492187-3.355469 7.492187-7.492187 0-4.140626-3.355469-7.496094-7.492187-7.496094zm0 0"/><path d="m273.699219 182.246094h-21.980469c-4.140625 0-7.492188 3.355468-7.492188 7.496094 0 4.136718 3.351563 7.492187 7.492188 7.492187h21.980469c4.140625 0 7.492187-3.355469 7.492187-7.492187 0-4.140626-3.351562-7.496094-7.492187-7.496094zm0 0"/><path d="m172.894531 197.234375h53.847657c4.136718 0 7.492187-3.355469 7.492187-7.492187 0-4.140626-3.355469-7.496094-7.492187-7.496094h-53.847657c-4.140625 0-7.496093 3.355468-7.496093 7.496094 0 4.136718 3.355468 7.492187 7.496093 7.492187zm0 0"/><path d="m157.21875 281.160156h-50.476562c-4.140626 0-7.496094 3.355469-7.496094 7.492188 0 4.136718 3.355468 7.492187 7.496094 7.492187h50.476562c4.136719 0 7.492188-3.355469 7.492188-7.492187 0-4.136719-3.355469-7.492188-7.492188-7.492188zm0 0"/><path d="m83.789062 281.160156h-38.78125c-4.140624 0-7.492187 3.355469-7.492187 7.492188 0 4.136718 3.351563 7.492187 7.492187 7.492187h38.78125c4.140626 0 7.492188-3.355469 7.492188-7.492187 0-4.136719-3.351562-7.492188-7.492188-7.492188zm0 0"/><path d="m248.722656 281.160156h-65.941406c-4.140625 0-7.492188 3.355469-7.492188 7.492188 0 4.136718 3.351563 7.492187 7.492188 7.492187h65.941406c4.136719 0 7.492188-3.355469 7.492188-7.492187 0-4.136719-3.355469-7.492188-7.492188-7.492188zm0 0"/><path d="m337.898438 242.667969h-36.058594c-4.136719 0-7.492188 3.355469-7.492188 7.492187 0 4.140625 3.355469 7.496094 7.492188 7.496094h36.058594c4.140624 0 7.492187-3.355469 7.492187-7.496094 0-4.136718-3.351563-7.492187-7.492187-7.492187zm0 0"/><path d="m400.46875 257.65625h50.902344c4.140625 0 7.496094-3.355469 7.496094-7.496094 0-4.136718-3.355469-7.492187-7.496094-7.492187h-50.902344c-4.140625 0-7.492188 3.355469-7.492188 7.492187 0 4.140625 3.355469 7.496094 7.492188 7.496094zm0 0"/><path d="m375.015625 242.667969h-11.664063c-4.140624 0-7.496093 3.355469-7.496093 7.492187 0 4.140625 3.355469 7.496094 7.496093 7.496094h11.664063c4.140625 0 7.492187-3.355469 7.492187-7.496094 0-4.136718-3.351562-7.492187-7.492187-7.492187zm0 0"/><path d="m301.839844 339.3125h36.058594c4.140624 0 7.492187-3.351562 7.492187-7.492188 0-4.136718-3.351563-7.492187-7.492187-7.492187h-36.058594c-4.136719 0-7.492188 3.355469-7.492188 7.492187 0 4.140626 3.355469 7.492188 7.492188 7.492188zm0 0"/><path d="m400.46875 339.3125h50.902344c4.140625 0 7.496094-3.351562 7.496094-7.492188 0-4.136718-3.355469-7.492187-7.496094-7.492187h-50.902344c-4.140625 0-7.492188 3.355469-7.492188 7.492187 0 4.140626 3.355469 7.492188 7.492188 7.492188zm0 0"/><path d="m363.351562 339.3125h11.664063c4.140625 0 7.496094-3.351562 7.496094-7.492188 0-4.136718-3.355469-7.492187-7.496094-7.492187h-11.664063c-4.140624 0-7.492187 3.355469-7.492187 7.492187 0 4.140626 3.351563 7.492188 7.492187 7.492188zm0 0"/><path d="m337.898438 405.988281h-36.058594c-4.136719 0-7.492188 3.355469-7.492188 7.492188s3.355469 7.492187 7.492188 7.492187h36.058594c4.140624 0 7.492187-3.355468 7.492187-7.492187s-3.351563-7.492188-7.492187-7.492188zm0 0"/><path d="m451.371094 405.988281h-50.902344c-4.140625 0-7.492188 3.355469-7.492188 7.492188s3.351563 7.492187 7.492188 7.492187h50.902344c4.140625 0 7.496094-3.355468 7.496094-7.492187s-3.355469-7.492188-7.496094-7.492188zm0 0"/><path d="m375.015625 405.988281h-11.664063c-4.140624 0-7.496093 3.355469-7.496093 7.492188s3.355469 7.492187 7.496093 7.492187h11.664063c4.140625 0 7.492187-3.355468 7.492187-7.492187s-3.351562-7.492188-7.492187-7.492188zm0 0"/><path d="m479.023438.5h-446.042969c-18.183594 0-32.980469 14.792969-32.980469 32.980469v362.566406c0 18.183594 14.796875 32.976563 32.980469 32.976563h28.199219c4.136718 0 7.492187-3.351563 7.492187-7.492188 0-4.136719-3.355469-7.492188-7.492187-7.492188h-28.199219c-9.921875 0-17.992188-8.070312-17.992188-17.992187v-28.425781h272.996094v12.914062h-5.941406c-8.128907 0-14.738281 6.609375-14.738281 14.738282v18.765624h-160.566407c-4.136719 0-7.492187 3.355469-7.492187 7.492188 0 4.140625 3.355468 7.492188 7.492187 7.492188h72.046875v26.875h-22.625c-15.09375 0-27.371094 12.28125-27.371094 27.371093v16.1875c0 6.886719 5.601563 12.488281 12.488282 12.488281h228.875c6.886718 0 12.488281-5.601562 12.488281-12.488281v-16.1875c0-15.089843-12.277344-27.371093-27.371094-27.371093h-22.625v-9.472657h138.527344c8.125 0 14.734375-6.609375 14.734375-14.738281v-3.527344c14.605469-3.390625 25.523438-16.496094 25.523438-32.113281l.566406-362.570313c.003906-18.183593-14.789063-32.976562-32.972656-32.976562zm-196.730469 349.28125v-35.917969h188.628906v35.917969zm20.675781-50.90625v-15.765625h147.273438v15.765625zm147.273438 65.890625v15.769531h-147.273438v-15.769531zm-256.472657 64.257813h73.535157v2.667968c0 8.125 6.609374 14.734375 14.738281 14.734375h35.617187v9.472657h-123.890625zm161.503907 41.863281c6.828124 0 12.382812 5.554687 12.382812 12.382812v13.691407h-223.882812v-13.691407c0-6.828125 5.558593-12.382812 12.386718-12.382812zm115.648437-39.449219h-188.628906v-35.914062h188.628906zm25.523437-35.390625c0 7.257813-4.328124 13.511719-10.535156 16.351563v-17.128907c0-8.125-6.613281-14.734375-14.738281-14.734375h-5.941406v-12.914062h31.214843zm0-43.410156h-10.78125c.152344-.847657.246094-39.023438.246094-39.023438 0-8.128906-6.613281-14.738281-14.738281-14.738281h-5.941406v-15.765625h5.941406c8.125 0 14.738281-6.613281 14.738281-14.738281v-36.417969c0-8.125-6.613281-14.738281-14.738281-14.738281h-42.324219c-4.140625 0-7.492187 3.355468-7.492187 7.496094 0 4.136718 3.351562 7.492187 7.492187 7.492187h42.074219v35.917969h-188.628906v-35.917969h99.929687c4.140625 0 7.492188-3.355469 7.492188-7.492187 0-4.140626-3.351563-7.496094-7.492188-7.496094h-100.179687c-8.128907 0-14.738281 6.613281-14.738281 14.738281v36.417969c0 8.125 6.609374 14.738281 14.738281 14.738281h5.941406v15.765625h-5.941406c-8.128907 0-14.738281 6.613281-14.738281 14.738281 0 0 .09375 38.175781.246093 39.023438h-252.5625v-250.207031h481.457031zm0-265.195313h-480.90625v-53.964844c0-9.917968 8.070313-17.988281 17.992188-17.988281h444.921875c9.921875 0 17.992187 8.070313 17.992187 17.992188zm0 0"/><path d="m55.261719 29.261719c-12.125 0-21.988281 9.863281-21.988281 21.988281s9.863281 21.992188 21.988281 21.992188 21.992187-9.867188 21.992187-21.992188-9.867187-21.988281-21.992187-21.988281zm0 28.992187c-3.859375 0-7.003907-3.140625-7.003907-7.003906 0-3.859375 3.144532-7.003906 7.003907-7.003906 3.863281 0 7.003906 3.144531 7.003906 7.003906 0 3.863281-3.140625 7.003906-7.003906 7.003906zm0 0"/><path d="m111.25 29.261719c-12.125 0-21.992188 9.863281-21.992188 21.988281s9.867188 21.992188 21.992188 21.992188 21.988281-9.867188 21.988281-21.992188-9.867187-21.988281-21.988281-21.988281zm0 28.992187c-3.863281 0-7.003906-3.140625-7.003906-7.003906 0-3.859375 3.140625-7.003906 7.003906-7.003906 3.859375 0 7.003906 3.144531 7.003906 7.003906 0 3.863281-3.144531 7.003906-7.003906 7.003906zm0 0"/><path d="m167.234375 29.261719c-12.125 0-21.988281 9.863281-21.988281 21.988281s9.863281 21.992188 21.988281 21.992188 21.992187-9.867188 21.992187-21.992188-9.867187-21.988281-21.992187-21.988281zm0 28.992187c-3.859375 0-7.003906-3.140625-7.003906-7.003906 0-3.859375 3.144531-7.003906 7.003906-7.003906 3.863281 0 7.003906 3.144531 7.003906 7.003906 0 3.863281-3.140625 7.003906-7.003906 7.003906zm0 0"/></svg>
						</div>
						<a href="search_viewjobs.php?search=Search&position=Web Development">Web Developement</a>
						<p class="open_position_job">
							<span class="open_position_job_number"><?php echo $num_web_deve;?></span>
							<span>Open Position</span>
						</p>
					</div>
				</div>

				<div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
					<div class="posted_job_box main_page_job_position_box">
						<div class="position_job_icon">
							<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="553.048px" height="553.048px" viewBox="0 0 553.048 553.048" style="enable-background:new 0 0 553.048 553.048;"
	 xml:space="preserve">
<g>
	<g>
		<path d="M76.774,179.141c-9.529,0-17.614,3.323-24.26,9.969c-6.646,6.646-9.97,14.621-9.97,23.929v142.914
			c0,9.541,3.323,17.619,9.97,24.266c6.646,6.646,14.731,9.97,24.26,9.97c9.522,0,17.558-3.323,24.101-9.97
			c6.53-6.646,9.804-14.725,9.804-24.266V213.039c0-9.309-3.323-17.283-9.97-23.929C94.062,182.464,86.082,179.141,76.774,179.141z"
			/>
		<path d="M351.972,50.847L375.57,7.315c1.549-2.882,0.998-5.092-1.658-6.646c-2.883-1.34-5.098-0.661-6.646,1.989l-23.928,43.88
			c-21.055-9.309-43.324-13.972-66.807-13.972c-23.488,0-45.759,4.664-66.806,13.972l-23.929-43.88
			c-1.555-2.65-3.77-3.323-6.646-1.989c-2.662,1.561-3.213,3.764-1.658,6.646l23.599,43.532
			c-23.929,12.203-42.987,29.198-57.167,51.022c-14.18,21.836-21.273,45.698-21.273,71.628h307.426
			c0-25.924-7.094-49.787-21.273-71.628C394.623,80.045,375.675,63.05,351.972,50.847z M215.539,114.165
			c-2.552,2.558-5.6,3.831-9.143,3.831c-3.55,0-6.536-1.273-8.972-3.831c-2.436-2.546-3.654-5.582-3.654-9.137
			c0-3.543,1.218-6.585,3.654-9.137c2.436-2.546,5.429-3.819,8.972-3.819s6.591,1.273,9.143,3.819
			c2.546,2.558,3.825,5.594,3.825,9.137C219.357,108.577,218.079,111.619,215.539,114.165z M355.625,114.165
			c-2.441,2.558-5.434,3.831-8.971,3.831c-3.551,0-6.598-1.273-9.145-3.831c-2.551-2.546-3.824-5.582-3.824-9.137
			c0-3.543,1.273-6.585,3.824-9.137c2.547-2.546,5.594-3.819,9.145-3.819c3.543,0,6.529,1.273,8.971,3.819
			c2.438,2.558,3.654,5.594,3.654,9.137C359.279,108.577,358.062,111.619,355.625,114.165z"/>
		<path d="M123.971,406.804c0,10.202,3.543,18.838,10.63,25.925c7.093,7.087,15.729,10.63,25.924,10.63h24.596l0.337,75.454
			c0,9.528,3.323,17.619,9.969,24.266s14.627,9.97,23.929,9.97c9.523,0,17.613-3.323,24.26-9.97s9.97-14.737,9.97-24.266v-75.447
			h45.864v75.447c0,9.528,3.322,17.619,9.969,24.266s14.73,9.97,24.26,9.97c9.523,0,17.613-3.323,24.26-9.97
			s9.969-14.737,9.969-24.266v-75.447h24.928c9.969,0,18.494-3.544,25.594-10.631c7.086-7.087,10.631-15.723,10.631-25.924V185.45
			H123.971V406.804z"/>
		<path d="M476.275,179.141c-9.309,0-17.283,3.274-23.93,9.804c-6.646,6.542-9.969,14.578-9.969,24.094v142.914
			c0,9.541,3.322,17.619,9.969,24.266s14.627,9.97,23.93,9.97c9.523,0,17.613-3.323,24.26-9.97s9.969-14.725,9.969-24.266V213.039
			c0-9.517-3.322-17.552-9.969-24.094C493.888,182.415,485.798,179.141,476.275,179.141z"/>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
						</div>
						<a href="search_viewjobs.php?search=Search&position=Android">Android Applications</a>
						<p class="open_position_job">
							<span class="open_position_job_number"><?php echo $num_android; ?></span>
							<span>Open Position</span>
						</p>
					</div>
				</div>
				
				<div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
					<div class="posted_job_box main_page_job_position_box">
						<div class="position_job_icon">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 90 90" style="enable-background:new 0 0 90 90;" xml:space="preserve">
<style type="text/css">
	.st0{fill:#4D5152;}
</style>
<g id="Capa_1">
	<g>
		<path id="Apple" class="st0 svg-color" d="M75.3,78.8c-3.7,5.5-7.6,10.9-13.7,11.1c-6,0.1-7.9-3.6-14.8-3.6s-9,3.5-14.7,3.7
			c-5.9,0.2-10.4-5.9-14.2-11.4C10.2,67.4,4.3,47,12.3,33.3c3.9-6.8,10.9-11.2,18.5-11.3c5.8-0.1,11.3,3.9,14.8,3.9
			s10.2-4.8,17.2-4.1c2.9,0.1,11.1,1.2,16.4,8.9c-0.4,0.3-9.8,5.7-9.7,17.1C69.6,61.4,81.4,66,81.5,66
			C81.4,66.3,79.6,72.5,75.3,78.8z"/>
	</g>
</g>
<g id="Layer_2">
	<path class="st0 svg-apple-pan" d="M49.6,6.8C52.9,3,58.3,0.2,62.8,0c0.6,5.3-1.5,10.6-4.7,14.4c-3.1,3.8-8.3,6.8-13.3,6.4
		C44.2,15.6,46.7,10.2,49.6,6.8z"/>
</g>
</svg>
						</div>
						<a href="search_viewjobs.php?search=Search&position=iOS">iOS Applications</a>
						<p class="open_position_job">
							<span class="open_position_job_number"><?php echo $num_ios; ?></span>
							<span>Open Position</span>
						</p>
					</div>
				</div>
				
				<div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
					<div class="posted_job_box main_page_job_position_box">
						<div class="position_job_icon">
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 496 496" style="enable-background:new 0 0 496 496;" xml:space="preserve">
<style type="text/css">
	.st0{fill:#4D5152;}
</style>
<g class="svg-clock">
	<polygon class="st0" points="104,88 104,120 136,120 136,104 120,104 120,88 	"/>
	<path class="st0" d="M120,175.4V152h-16v23.4c-28.9-3.6-51.8-26.6-55.4-55.4H72v-16H48.6c1.4-11.6,6-22.6,13.5-31.9l-12.5-10
		C38.1,76.4,32,93.7,32,112c0,44.1,35.9,80,80,80c18.3,0,35.6-6.1,49.9-17.5l-10-12.5C142.6,169.5,131.6,174,120,175.4z"/>
	<path class="st0" d="M112,32c-18.3,0-35.6,6.1-49.9,17.5l10,12.5c9.4-7.5,20.3-12,31.9-13.5V72h16V48.6
		c28.9,3.6,51.8,26.6,55.4,55.4H152v16h23.5c-1.4,11.6-6,22.6-13.5,31.9l12.5,10C186,147.6,192,130.3,192,112
		C192,67.9,156.1,32,112,32z"/>
	<path class="st0" d="M112,0C50.2,0,0,50.2,0,112s50.2,112,112,112c44.4,0,82.7-26,100.8-63.5c2.2-4.3,5.2-12.8,5.2-12.8
		s6-19.6,6-35.8C224,50.2,173.8,0,112,0z M112,208c-52.9,0-96-43.1-96-96c0-52.9,43.1-96,96-96s96,43.1,96,96
		C208,164.9,164.9,208,112,208z"/>
</g>
<g class="anim-man">
	<path class="st0" d="M32,432h80v16H32V432z"/>
	<path class="st0" d="M0,400h16v16H0V400z"/>
	<path class="st0" d="M32,400h120v16H32V400z"/>
</g>
<g class="anim-man">
	<path class="st0" d="M72,352h120v16H72V352z"/>
	<path class="st0" d="M40,320h16v16H40V320z"/>
	<path class="st0" d="M72,320h80v16H72V320z"/>
</g>
<g class="anim-man">
	<path class="st0" d="M32,272h80v16H32V272z"/>
	<path class="st0" d="M0,240h16v16H0V240z"/>
	<path class="st0" d="M32,240h128v16H32V240z"/>
</g>
<g class="anim-man">
	<rect y="480" class="st0" width="16" height="16"/>
	<rect x="480" y="480" class="st0" width="16" height="16"/>
	<path class="st0" d="M396.3,476.4L437.8,352c1.5-4.5,2.2-9.1,2.2-13.8c0-13.9-6.7-27.2-18-35.4l-69.1-50.3l13.4-66.8l53.3,13.3
		c2.4,0.6,4.8,0.9,7.2,0.9c11.3,0,21.4-6.3,26.5-16.4l40-80c1.9-3.8,2.9-8,2.9-12.3c0-15.1-12.3-27.4-28-27.4
		c-10.5,0-19.8,5.8-24.5,15.2l-32.6,65h-0.9L360,115.4V99.7c9.8-8.8,16-21.5,16-35.7V48c0-26.5-21.5-48-48-48s-48,21.5-48,48v16
		c0,14.2,6.2,26.9,16,35.7v13.9l-49.7,11c-12.5,2.8-23,11.5-28.1,23.3l-1.4,3.3l-4,9.3l-34.6,80.8c-1.5,3.4-2.2,7-2.2,10.7v0.9
		c0,15,12.2,27.2,27.2,27.2c11,0,20.9-6.6,25.1-16.7l33-79.3h8.7l-37.4,172L145,443.7c-5.8,5.8-9,13.5-9,21.7
		c0,5.3,1.5,10.3,3.9,14.6H32v16h432v-16h-69.2C395.3,478.8,395.9,477.7,396.3,476.4z M296,48c0-17.6,14.4-32,32-32
		c17.6,0,32,14.4,32,32v16c0,17.6-14.4,32-32,32c-17.6,0-32-14.4-32-32V48z M196.5,480l81.7-75.4c5.9-5.5,10-12.5,11.8-20.4
		l19.1-82.8l65.4,45.8l-37,111.2c-1,2.9-1.5,6-1.5,9.1c0,4.4,1.2,8.7,3.1,12.5H196.5z M369,480h-4.4c-7,0-12.6-5.7-12.6-12.6
		c0-1.4,0.2-2.7,0.6-4l40.8-122.5l-94.6-66.2l-24.5,105.9c-1.1,4.7-3.5,8.9-7.1,12.2L177,476.1c-2.7,2.5-6.2,3.9-10.4,3.9
		c-8.1,0-14.6-6.6-14.6-14.6c0-3.8,1.6-7.6,4.3-10.3l91-91l42.6-196h-39.3l-37.1,89.1c-1.7,4.2-5.8,6.9-10.3,6.9
		c-6.2,0-11.2-5-11.2-11.2V252c0-1.5,0.3-3,0.9-4.4l40-93.3c3-7.1,9.3-12.3,16.8-14l62.3-13.9v-17.2c5,1.8,10.4,2.8,16,2.8
		c5.6,0,11-1,16-2.8v15.4l61.9,35.4H421l36.8-73.7c1.9-3.9,5.9-6.3,10.8-6.3c6.3,0,11.4,5.1,11.4,11.4c0,1.8-0.4,3.5-1.2,5.1l-40,80
		c-2.8,5.6-9.3,8.6-15.5,7.1l-69.6-17.4l-18.6,93.3l77.4,56.3c7.1,5.2,11.4,13.6,11.4,22.4c0,3-0.5,5.9-1.4,8.8L381,471.4
		C379.3,476.6,374.5,480,369,480z"/>
</g>
</svg>
						</div>
						<a href="search_viewjobs.php?search=Search&position=Animation"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Animation</a>
						<p class="open_position_job">
							<span class="open_position_job_number"><?php echo $num_animation; ?></span>
							<span>Open Position</span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="recent_job_add d-inline-block w-100 position-relative pt-0">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="sec-heading text-center">
						<h6>RECENTLY ADDED JOBS</h6>
			            <h2>The Eassiest Way to Get Your New Job</h2>
			        </div>
				</div>
			</div>
			<div class="row recent_job_add_box">

				<?php 
					$monday = strtotime("last monday");
					$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
					 
					$sunday = strtotime(date("Y-m-d",$monday)." +6 days");
					 
					$this_week_sd = date("Y-m-d",$monday);
					$this_week_ed = date("Y-m-d",$sunday);
					 
					$weekly_job = "select * from job_post JOIN company_detail ON job_post.company_id = company_detail.company_id where `start_date` between '$this_week_sd' AND '$this_week_ed' order by `start_date` limit 0,6";

					$weekly_job1 =  mysqli_query($con,$weekly_job);
					$number_week =  mysqli_num_rows($weekly_job1);
					if($number_week > 0){

					while($data_weekly =  mysqli_fetch_array($weekly_job1)) { 
					?>		

				<div class="col-xl-4 col-lg-4 col-md-6">
				    <div class="posted_job_box">
				        <span class="start_end_date">Last Date: <?php echo $data_weekly['end_date']; ?></span>
				        <ul class="ring_round_block">
				        	<li class="green_rign" data-toggle="tooltip" title="Active"></li>
				        	<!-- <li class="yellow_rign" data-toggle="tooltip" title="Stop"></li>
				        	<li class="red_rign" data-toggle="tooltip" title="Cancle"></li> -->
				        </ul>
				        <h2 class="corse_title" style="font-size: 15px;"><a href="#"><?php echo $data_weekly['job_name']; ?></a><span style="color:gray"> (<?php echo $data_weekly['company_name']; ?>)</span></h2>

				       <!--  <h2 class="corse_title" style="font-size: 14px;"><a href="#"></a></h2> -->
				        <!-- <p class="student_lable">Test</p> -->
				        <ul class="job-post-item-body mt-3" style="font-size: 12px !important;">
				            <li><i class="fas fa-layer-group mr-2"></i><span><?php echo $data_weekly['no_of_vacancy']; ?></span></li>
				            <li style="font-size: 12px !important;"><i class="fas fa-map-marker-alt mr-2"></i><span><?php echo $data_weekly['city'] ;?>, <?php echo $data_weekly['job_area'] ;?></span></li>
				        </ul>
				        <div class="apllay_now_resume_uplode_btn">
				            <!-- <a href="#resume_uplode" data-toggle="collapse" class="">Apply Now</a> -->
				            <div class="collapse mt-3" id="resume_uplode">
				             	<form>
				             		<div class="custom-file">
				             		  <input type="file" class="custom-file-input" id="customFile">
				             		  <label class="custom-file-label" for="customFile">Uplode Resume</label>
				             		</div>
				             	</form>
				            </div>
				        </div>
				    </div>
				</div>
			<?php } } else { ?>
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
				
				<div class="col-xl-12 text-center mt-3">
					<a href="viewjobs.php" class="btn btn-success">View More</a>
				</div>
			</div>
		</div>
	</section>

	<section class="recent_job_add d-inline-block w-100 position-relative pt-0">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="sec-heading text-center">
			            <h2>Top Recruitments</h2>
			        </div>
				</div>
			</div>
			<div class="row recent_job_add_box">
				<?php 
				 $top_r = "select company_detail.*,sum(job_post.no_of_vacancy) as total from company_detail JOIN job_post ON company_detail.company_id=job_post.company_id  group by company_detail.company_name having total > 8 order by total desc limit 2,4";
				$top_r1 = mysqli_query($con,$top_r);
				while($top_r2 = mysqli_fetch_array($top_r1)){ ?>

					<div class="col-xl-3 col-lg-4 col-md-6">
					    <div class="posted_job_box jobs_company_logo_info_box">
					    	<div class="jobs_company_logo_info_box_info">
					    		<div class="job_company_logo">
					    			<!-- <img src="https://demo.rnwmultimedia.com/student_placement/images/company-1.jpg" width="100%"> -->
					    		<?php  
					    		  $com_url = $top_r2['url'];
					    		 
					    		 if($com_url == ''){ ?>
					    			<img src="https://demo.rnwmultimedia.com/placement/images/noimage.png" alt="No Logo" width="100%">
								<?php }else {  ?>
					    			<img src="//logo.clearbit.com/<?php echo $com_url; ?>" alt="No Image" width="100%">
					    		<?php } ?>
					    		</div>
					    		<a href="#"><?php echo $top_r2['company_name']; ?></a>
					    		<p><span class="number"><?php echo $top_r2['total']; ?></span> <span>Open position</span></p>
					    	</div>
					    </div>
					</div>
				<?php } ?>
			
			</div>
		</div>
	</section>
<?php include('footer.php'); ?>	



 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-left:-10%;">

    <div class="modal-dialog">

      <div class="modal-content" style="width:150%;">

        <div class="modal-body">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

          <!-- <video controls width="100%">

            <source src="" type="video/mp4">

          </video> -->

          <iframe width="560" height="360" src="https://www.youtube.com/embed/Qz6KIM3Ppvw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        </div>

      </div>

    </div>

  </div>




<div class="modal fade" id="login_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	    	<div id="login_success_msg">
		    	
			</div>

	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalCenterTitle">Sign In</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="student_login">
	        	<div class="col-xl-12">
	        		<div class="form-group">
	        			<label>Email ID</label>
	        			<input type="text" name="email_login" id="email_login" placeholder="Email" class="form-control">
	        		</div>
	        	</div>
	        	<div class="col-xl-12">
	        		<div class="form-group">
	        			<label>Password</label>
	        			<input type="password" name="password_login" id="password_login" placeholder="Password" class="form-control">
	        		</div>
	        	</div>
	        	<div class="col-xl-12">
	        		<div class="text-right">
	        			<input type="submit" name="submit" value="Login" class="btn btn-primary">
	        		</div>
	        	</div>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>


<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


<script>
	jQuery.validator.setDefaults({
  		debug: true,
  		success: "valid"
	});
	$( "#student_login" ).validate({
  		rules: {
    		email_login: {
      		required: true,
      		email:true
    	},
    	password_login:{
    		required : true,
    		minlength : 5,
    		maxlength:30
    	}
  	},
	messages:{
		email_login :{
			required : "<div style='color:red'>Enter Email</div>",
			email : "<div style='color:red'>Enter valid email</div>"
		},
		password_login:{
			required : "<div style='color:red'>Enter password</div>",
			minlength : "<div style='color:red'>Enter minimum 5 characters</div>",
			maxlength : "<div style='color:red'>Enter maximum 20 characters</div>",
		}
	},
  	submitHandler: function() { 
		event.preventDefault();
		var form_data = $('#student_login').serialize(); //Encode form elements for submission
		// var form_data = $(this).serialize(); //Encode form elements for submission
		$.ajax({

			url : "ajax_student_login_new_data.php",
			type: "post",
			data : form_data,
			beforeSend: function(){
				$('.fa-spinner').show();
			},
			complete: function(){
					 $('.fa-spinner').hide();
			},
			success:function(res)
			{
				// alert(res);
				// console.log(res);
				$('#login_success_msg').show();
				if(res == 1)
				{
					$('#login_success_msg').html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Login Successfully</div>");
					$("#student_login")[0].reset();
					setTimeout(function() {
						location.reload();
					}, 500);
				}
				else if(res == 0)
				{
					$('#login_success_msg').html("<div class='alert alert-danger alert-dismissible fade show'><button type='button' class='close' data-dismiss='alert'>&times;</button> Invalid Email & Password!!</div>");
				}
				else if(res == 2){
					$('#login_success_msg').html("<div class='alert alert-warning alert-dismissible fade show'><button type='button' class='close' data-dismiss='alert'>&times;</button>Contact RNW Placement Department!! </div>");
				}
			}
		});
   	}
});
</script>