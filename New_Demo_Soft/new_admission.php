	<?php include('header.php'); ?>

<main class="main_content d-inline-block">
	<section class="page_title_block d-inline-block w-100 position-relative pb-0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="page_heading">
						<h1>Add New Addmision</h1>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="coman_design_block d-inline-block w-100 position-relative">
		<div class="demo_details_block  mt-3">
			<div class="col-xl-10 mx-auto">
				<ul class="nav nav-tabs">
				  <li class="nav-item">
				    <a class="nav-link active" data-toggle="tab" href="#demo_ramark">Quick Enroll</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#demo_attendance">Basic Info</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#demo_follow_up">Enrollment Details</a>
				  </li>
				</ul>
				<div class="tab-content new_addmision_content" id="myTabContent">
				  <div class="tab-pane fade show active" id="demo_ramark">
				  	<div class="mb-3 d-inline-block w-100">
				  		<h3 class="demo_student_details_heading d-inline-block mb-0 align-sub">Quick Enroll</h3>
				  	</div>
				  	<form class="row">
				  		<div class="col-xl-12 mx-auto">
				  			<div class="row">
				  				<div class="col-xl-6">
				  					<div class="form-group">
                				        <label for="email">Mobile No:</label>
                				        <input type="text" name="phone" placeholder="Mobile No" class="form-control">
                				    </div>
				  				</div>
				  				<div class="col-xl-6">
				  					 <div class="form-group">
                				        <label for="email">Landline No:</label>
                				        <input type="text" name="phone" placeholder="Landline No" class="form-control">
                				    </div>
				  				</div>
				  				<div class="col-xl-6">
                				    <div class="form-group">
                				        <label for="email">Email:</label>
                				        <input type="email" name="email" placeholder="Email" class="form-control">
                				    </div>
				  				</div>
				  				<div class="col-xl-6">
				  					 <div class="form-group">
                				        <label for="email">Sourse:</label>
                				        <select class="form-control">
                				        	<option>-- Select --</option>
                				        	<option>Online</option>
                				        	<option>Google</option>
                				        	<option>Skype</option>
                				        	<option>Facebook</option>
                				        </select>
                				    </div>
				  				</div>
				  				<div class="col-xl-6">
				  					<div class="form-group">
	                				    <ul>
				        				    <li class="d-inline-block mr-3 mr-mr-0">
										    	<div class="form-check form-check-inline">
										    	    <input class="form-check-input" type="radio" name="one" id="chake1">
										    	    <label class="form-check-label" for="chake1">Course Paid</label>
										    	</div>
										    	<div class="form-check form-check-inline">
										    	    <input class="form-check-input" type="radio" id="chake2" name="one">
										    	    <label class="form-check-label" for="chake2">Course Fees</label>
										    	</div>
										    </li>
	                				    </ul>
                				   </div>
                				   <div class="form-group">
                				   		<button type="button" class="btn btn-primary">Submit</button>
                				   </div>
				  				</div>
				  			</div>
				  		</div>
				  	</form>
				  </div>
				  <div class="tab-pane fade" id="demo_attendance">
				  	<div>
				  		<h3 class="demo_student_details_heading mb-3">Basic Info</h3>
				  	</div>
				  	<form class="row">
				  		<div class="col-xl-12 mx-auto">
				  			<div class="row">
				  				<div class="col-xl-6">
				  					<div class="form-group">
                				        <label for="email">Inquiry Date:</label>
                				        <input type="text" name="inqdate" placeholder="Inquiry Date" class="form-control" id="datepicker">
                				    </div>
				  				</div>
				  				<div class="col-xl-6">
				  					 <div class="form-group">
                				        <label for="email">Inquiry Time:</label>
                				        <input type="text" name="inqtime" placeholder="Inquiry Time" class="form-control" data-provide="timepicker">
                				    </div>
				  				</div>
				  				<div class="col-xl-6">
                				    <div class="form-group">
                				        <label for="email">First Name:</label>
                				        <input type="email" name="email" placeholder="First Name" class="form-control">
                				    </div>
				  				</div>
				  				<div class="col-xl-6">
                				    <div class="form-group">
                				        <label for="email">Last Name:</label>
                				        <input type="email" name="email" placeholder="Last Name" class="form-control">
                				    </div>
				  				</div>
				  				<div class="col-xl-6">
                				    <div class="form-group">
                				        <label for="email">Mobile No:</label>
                				        <input type="text" name="phone" placeholder="Mobile No" class="form-control">
                				    </div>
				  				</div>
				  				<div class="col-xl-6">
                				    <div class="form-group">
                				        <label for="email">Email Id:</label>
                				        <input type="text" name="email" placeholder="Email Id" class="form-control">
                				    </div>
				  				</div>
				  				<div class="col-xl-12">
				  					<h3 class="demo_student_details_heading mb-3">Branch Info</h3>
				  				</div>
				  				<div class="col-xl-6">
				  					<div class="form-group">
				  						<label>Branch Name:</label>
				  						<select class="form-control">
				  							<option>-- Select --</option>
				  							<option>Ak Roda (RNW1)</option>
				  							<option>Hirabag (RNW 1 B)</option>
				  							<option>Yogi Choke (RNW 2)</option>
				  							<option>Sarthana (RNW 3)</option>
				  							<option>Mota Varacha (RNW 4)</option>
				  						</select>
				  					</div>
				  				</div>
				  				<div class="col-xl-6">
				  					<label>City:</label>
				  					<div class="form-group">
				  						<select class="form-control">
				  							<option>-- Select --</option>
				  							<option>Surat</option>
				  							<option>Ahamdabad</option>
				  							<option>Vadodara</option>
				  							<option>Rajkot</option>
				  						</select>
				  					</div>
				  				</div>
				  				<div class="col-xl-6">
				  					<label>Area:</label>
				  					<div class="form-group">
				  						<select class="form-control">
				  							<option>-- Select --</option>
				  							<option>Surat</option>
				  							<option>Ahamdabad</option>
				  							<option>Vadodara</option>
				  							<option>Rajkot</option>
				  						</select>
				  					</div>
				  				</div>
				  				<div class="col-xl-6">
				  					<label>Asign To:</label>
				  					<div class="form-group">
				  						<select class="form-control">
				  							<option>-- Select --</option>
				  							<option>Surat</option>
				  							<option>Ahamdabad</option>
				  							<option>Vadodara</option>
				  							<option>Rajkot</option>
				  						</select>
				  					</div>
				  				</div>
				  				<div class="col-xl-12">
				  					<h3 class="demo_student_details_heading mb-3">College / School Details</h3>
				  				</div>
				  				<div class="col-xl-6">
				  					<label>College / Scholl Name</label>
				  					<input type="text" name="country" placeholder="College / Scholl Name" class="form-control">
				  				</div>
				  				<div class="col-xl-6">
				  					<div class="form-group">
				  						<label>Cyty:</label>
				  						<select class="form-control">
				  							<option>-- Select --</option>
				  							<option>Surat</option>
				  							<option>Ahamdabad</option>
				  							<option>Vadodara</option>
				  							<option>Rajkot</option>
				  						</select>
				  					</div>
				  				</div>
				  				<div class="col-xl-6">
				  					<div class="form-group">
				  						<label>Country:</label>
				  						<select class="form-control">
				  							<option>-- Select --</option>
				  							<option>India</option>
				  							<option>India</option>
				  							<option>India</option>
				  						</select>
				  					</div>
				  				</div>
				  				<div class="col-xl-6">
				  					<div class="form-group">
				  						<label>Area:</label>
				  						<select class="form-control">
				  							<option>-- Select --</option>
				  							<option>India</option>
				  							<option>India</option>
				  							<option>India</option>
				  						</select>
				  					</div>
				  				</div>
				  				<div class="col-xl-6">
				  					<div class="form-group">
				  						<label>Sourse:</label>
				  						<select class="form-control">
				  							<option>-- Select --</option>
				  							<option>India</option>
				  							<option>India</option>
				  							<option>India</option>
				  						</select>
				  					</div>
				  				</div>
				  				<div class="col-xl-6">
				  					<div class="form-group">
				  						<label>Reference Name:</label>
				  						<input type="text" name="" placeholder="Reference Name" class="form-control">
				  					</div>
				  				</div>
				  				<div class="col-xl-6">
                				   <div class="form-group">
                				   		<button type="button" class="btn btn-primary">Submit</button>
                				   </div>
				  				</div>
				  			</div>
				  		</div>
				  	</form>
				  </div>
				  <div class="tab-pane fade" id="demo_follow_up">
				  	<div>
				  		<h3 class="demo_student_details_heading mb-3">Enrollment Details</h3>
				  	</div>
				  	<form class="row">
				  		<div class="col-xl-12 mx-auto">
				  			<div class="row">
				  				<div class="col-xl-6">
				  					<div class="form-group">
                				        <label for="email">Name:</label>
                				        <input type="text" name="Name" placeholder="Name" class="form-control">
                				    </div>
				  				</div>
				  				<div class="col-xl-6">
				  					 <div class="form-group">
                				        <label for="email">Mobile No:</label>
                				        <input type="text" name="phone" placeholder="Mobile No" class="form-control">
                				    </div>
				  				</div>
				  				<div class="col-xl-6">
                				    <div class="form-group">
                				        <label for="email">Email Id:</label>
                				        <input type="email" name="email" placeholder="Email Id" class="form-control">
                				    </div>
				  				</div>
				  				<div class="col-xl-6">
                				    <div class="form-group">
                				        <label for="email">Addmision Date:</label>
                				        <input type="email" name="email" placeholder="Addmision Date" class="form-control" id="datepicker" data-provide="datepicker">
                				    </div>
				  				</div>
				  				<div class="col-xl-6">
				  					<div class="form-group">
				  						<label>Branch Name:</label>
				  						<select class="form-control">
				  							<option>-- Select --</option>
				  							<option>Ak Roda (RNW1)</option>
				  							<option>Hirabag (RNW 1 B)</option>
				  							<option>Yogi Choke (RNW 2)</option>
				  							<option>Sarthana (RNW 3)</option>
				  							<option>Mota Varacha (RNW 4)</option>
				  						</select>
				  					</div>
				  				</div>
				  				<div class="col-xl-12">
				  					<label>Course Category</label>
					  				<div class="form-group">
	                				    <ul>
				        				    <li class="d-inline-block mr-3 mr-mr-0">
										    	<div class="form-check form-check-inline">
										    	    <input class="form-check-input" type="radio" name="one" id="chake1">
										    	    <label class="form-check-label" for="chake1">Singel Course</label>
										    	</div>
										    	<div class="form-check form-check-inline">
										    	    <input class="form-check-input" type="radio" id="chake2" name="one">
										    	    <label class="form-check-label" for="chake2">Course Package</label>
										    	</div>
										    </li>
	                				    </ul>
	            				    </div>
				  				</div>
				  				<div class="col-xl-6">
				  					<div class="form-group">
				  						<label>Course Name:</label>
				  						<select class="form-control">
				  							<option>-- Select --</option>
				  							<option>Ak Roda (RNW1)</option>
				  							<option>Hirabag (RNW 1 B)</option>
				  							<option>Yogi Choke (RNW 2)</option>
				  							<option>Sarthana (RNW 3)</option>
				  							<option>Mota Varacha (RNW 4)</option>
				  						</select>
				  					</div>
				  				</div>
				  				<div class="col-xl-6">
                				    <div class="form-group">
                				        <label for="email">Asign To:</label>
                				        <input type="email" name="email" placeholder="Asign To" class="form-control">
                				    </div>
				  				</div>
				  				<div class="col-xl-12">
                				    <div class="form-group">
                				        <label for="email">Sourse Type:</label>
                				        <input type="email" name="email" placeholder="Sourse Type" class="form-control">
                				    </div>
				  				</div>
				  				<div class="col-xl-6">
                				    <div class="form-group">
                				        <label for="email">Tution Fees:</label>
                				        <input type="email" name="email" placeholder="Tution Fees" class="form-control">
                				    </div>
				  				</div>
				  				<div class="col-xl-6">
                				    <div class="form-group">
                				        <label for="email">Registration Fees:</label>
                				        <input type="email" name="email" placeholder="Registration Fees" class="form-control">
                				    </div>
				  				</div>
				  				<div class="col-xl-12">
				  					<button type="button" class="btn btn-info btn-block text-left collapsed" data-target="#feesdetails" data-toggle="collapse">Fees Details <span class="d-inline-block float-right pluse_icon">✕</span></button>
				  					<div class="collapse" id="feesdetails">
				  						 <div class="col-xl-12">
				  						 	<div class="row mt-3">
				  						 		<div class="col-xl-3">
				  						 			<h5>1</h5>
				  						 		</div>
				  						 		<div class="col-lg-3">
				  						 			<div class=""> 
				  						 				<input type="text" name="" class="form-control">
				  						 			</div>
				  						 		</div>
				  						 		<div class="col-lg-3">
				  						 			<div class=""> 
				  						 				<input type="text" name="" class="form-control">
				  						 			</div>
				  						 		</div>
				  						 		<div class="col-lg-3">
				  						 			<div class=""> 
				  						 				<input type="text" name="" class="form-control">
				  						 			</div>
				  						 		</div>
				  						 	</div>
				  						 </div>
				  						 <div class="col-xl-12">
				  						 	<div class="row mt-3">
				  						 		<div class="col-xl-3">
				  						 			<h5>2</h5>
				  						 		</div>
				  						 		<div class="col-lg-3">
				  						 			<div class=""> 
				  						 				<input type="text" name="" class="form-control">
				  						 			</div>
				  						 		</div>
				  						 		<div class="col-lg-3">
				  						 			<div class=""> 
				  						 				<input type="text" name="" class="form-control">
				  						 			</div>
				  						 		</div>
				  						 		<div class="col-lg-3">
				  						 			<div class=""> 
				  						 				<input type="text" name="" class="form-control">
				  						 			</div>
				  						 		</div>
				  						 	</div>
				  						 </div>
				  						 <div class="col-xl-12">
				  						 	<div class="row mt-3">
				  						 		<div class="col-xl-3">
				  						 			<h5>3</h5>
				  						 		</div>
				  						 		<div class="col-lg-3">
				  						 			<div class=""> 
				  						 				<input type="text" name="" class="form-control">
				  						 			</div>
				  						 		</div>
				  						 		<div class="col-lg-3">
				  						 			<div class=""> 
				  						 				<input type="text" name="" class="form-control">
				  						 			</div>
				  						 		</div>
				  						 		<div class="col-lg-3">
				  						 			<div class=""> 
				  						 				<input type="text" name="" class="form-control">
				  						 			</div>
				  						 		</div>
				  						 	</div>
				  						 </div>
				  						 <div class="col-xl-12">
				  						 	<div class="row mt-3">
				  						 		<div class="col-xl-3">
				  						 			<h5>4</h5>
				  						 		</div>
				  						 		<div class="col-lg-3">
				  						 			<div class=""> 
				  						 				<input type="text" name="" class="form-control">
				  						 			</div>
				  						 		</div>
				  						 		<div class="col-lg-3">
				  						 			<div class=""> 
				  						 				<input type="text" name="" class="form-control">
				  						 			</div>
				  						 		</div>
				  						 		<div class="col-lg-3">
				  						 			<div class=""> 
				  						 				<input type="text" name="" class="form-control">
				  						 			</div>
				  						 		</div>
				  						 	</div>
				  						 </div>
				  						 <div class="row mt-3">
				 	  						 <div class="col-xl-6">
				 	  						 	<div class="form-group">
				 	  						 		<div class="form-check form-check-inline">
				 							    	    <label class="form-check-label" for="chake1">Send SMS To:</label>
				 							    	    <input class="form-check-input" type="radio" name="one" id="chake1">
				 							    	</div>
				 	  						 	</div>
				 	  						 </div>
				 	   						 <div class="col-xl-6">
				 	   						 	<div class="form-group">
				 	   						 		<div class="form-check form-check-inline">
				 	 						    	    <label class="form-check-label" for="chake1">Send SMS Father:</label>
				 	 						    	    <input class="form-check-input" type="radio" name="one" id="chake1">
				 	 						    	</div>
				 	   						 	</div>
				 	   						 </div>
				 	   						 <div class="col-xl-6">
				 	   						 	<div class="form-group">
				 	   						 		<div class="form-check form-check-inline">
				 	 						    	    <label class="form-check-label" for="chake1">Send Email To:</label>
				 	 						    	    <input class="form-check-input" type="radio" name="one" id="chake1">
				 	 						    	</div>
				 	   						 	</div>
				 	   						 </div>
				 	   						 <div class="col-xl-6">
				 	   						 	<div class="form-group">
				 	   						 		<div class="form-check form-check-inline">
				 	 						    	    <label class="form-check-label" for="chake1">Send Email Father:</label>
				 	 						    	    <input class="form-check-input" type="radio" name="one" id="chake1">
				 	 						    	</div>
				 	   						 	</div>
				 	   						 </div>
				  						 </div>
				  					</div>
				  				</div>
				  				<div class="col-xl-12">
                				   <div class="form-group mt-3">
                				   		<button type="button" class="btn btn-primary">Submit</button>
                				   </div>
				  				</div>
				  			</div>
				  		</div>
				  	</form>
				  </div>
				</div>
			</div>
		</div>
	</section>
	
	
</main>




<?php include('footer.php'); ?>





