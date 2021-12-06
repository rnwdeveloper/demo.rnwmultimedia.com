	<?php include('header.php'); ?>

<main class="main_content d-inline-block">
	<section class="page_title_block d-inline-block w-100 position-relative pb-0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="page_heading">
						<h1>Add New Addmision Page 2	</h1>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="all_demo_student_block Add_New_Addmision_page_2 d-inline-block w-100 position-relative pb-0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="accordion" id="student_list_aoc">
						<div class="card">
							<div class="card-header mb-0" style="background-color: #315A7D;">
								<h2 class="mb-0">
									<button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_1" aria-expanded="false">
										Personal Details  <span class="d-inline-block float-right pluse_icon">✕</span>
									</button>
								</h2>
							</div>
							<div id="student_filter_panel_1" class="collapse show" style="">
								<div class="card-body" style="background-color: lightgrey; border:0px solid #00739E;">
									<form>
										<div class="row">
											<div class="col-xl-3 col-lg-4 col-sm-6">
							  					<div class="form-group">
			                				        <label for="email">Inquiry Date:</label>
			                				        <input type="text" name="inqdate" placeholder="Inquiry Date" class="form-control" id="datepicker">
			                				    </div>
							  				</div>
							  				<div class="col-xl-3 col-lg-4 col-sm-6">
							  					 <div class="form-group">
			                				        <label for="email">Inquiry Time:</label>
			                				        <input type="text" name="inqtime" placeholder="Inquiry Time" class="form-control" data-provide="timepicker">
			                				    </div>
							  				</div>
							  				<div class="col-xl-3 col-lg-4 col-sm-6">
							  					 <div class="form-group">
			                				        <label for="email">Mobile No:</label>
			                				        <input type="text" name="phone" placeholder="Mobile No" class="form-control">
			                				    </div>
							  				</div>
							  				<div class="col-xl-3 col-lg-4 col-sm-6">
							  					 <div class="form-group">
			                				        <label for="email">Email Id:</label>
			                				        <input type="email" name="email" placeholder="Email Id" class="form-control">
			                				    </div>
							  				</div>
							  				<div class="col-xl-3 col-lg-4 col-sm-6">
							  					 <div class="form-group">
			                				        <label for="email">First Name:</label>
			                				        <input type="text" name="fname" placeholder="First Name" class="form-control">
			                				    </div>
							  				</div>
							  				<div class="col-xl-3 col-lg-4 col-sm-6">
							  					 <div class="form-group">
			                				        <label for="email">Last Name:</label>
			                				        <input type="text" name="fname" placeholder="Last Name" class="form-control">
			                				    </div>
							  				</div>
							  				<div class="col-xl-3 col-lg-4 col-sm-6">
							  					<div class="form-group">
			                				        <label for="email">Admision Date:</label>
			                				        <input type="text" name="Admisionsate" placeholder="Admision Date" class="form-control" data-provide="datepicker"  id="">
			                				    </div>
							  				</div>
							  				<div class="col-xl-3 col-lg-4 col-sm-6">
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
							  				<div class="col-xl-3 col-lg-4 col-sm-6">
							  					<div class="form-group">
							  						<label>Course Name:</label>
							  						<select class="form-control">
							  							<option>-- Select --</option>
							  							<option>GIM</option>
							  							<option>BizTech</option>
							  							<option>Web Design</option>
							  							<option>Web Development</option>
							  							<option>Game Design</option>
							  						</select>
							  					</div>
							  				</div>
							  				<div class="col-xl-3 col-lg-4 col-sm-6">
					        				    <div class="form-group">
					        				        <label for="email">Asign To:</label>
					        				        <input type="email" name="email" placeholder="Asign To" class="form-control">
					        				    </div>
							  				</div>
							  				<div class="col-xl-12">
							  					<button type="button" class="btn btn-primary">Save</button>
							  				</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header mb-0">
								<h2 class="mb-0">
									<button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_2">
										Address  <span class="d-inline-block float-right pluse_icon">✕</span>
									</button>
								</h2>
							</div>
							<div id="student_filter_panel_2" class="collapse show">
								<div class="card-body">
									<form>
										<div class="row">
											<div class="col-xl-4">
												<div class="form-group">
													<label>City:</label>
													<input type="text" name="city" placeholder="City" class="form-control">
												</div>
											</div>
											<div class="col-xl-4">
												<div class="form-group">
													<label>Area:</label>
													<input type="text" name="area" placeholder="Area" class="form-control">
												</div>
											</div>
											<div class="col-xl-4">
												<div class="form-group">
													<label>Location & Address</label>
													<textarea class="form-control" placeholder="Address.."></textarea>
												</div>
											</div>
											<div class="col-xl-12">
												<button type="button" class="btn btn-primary">Save</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header mb-0">
								<h2 class="mb-0">
									<button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_3">
										Personal Details  <span class="d-inline-block float-right pluse_icon">✕</span>
									</button>
								</h2>
							</div>
							<div id="student_filter_panel_3" class="collapse show">
								<div class="card-body">
									<form>
										<div class="row">
											<div class="col-xl-12 mb-3">
												<h5>Father Details</h5>
											</div>
											<div class="col-xl-3 col-lg-6 col-sm-6">
												<div class="form-group">
													<label>First Name:</label>
													<input type="text" name="fname" class="form-control" placeholder="First Name">
												</div>
											</div>
											<div class="col-xl-3 col-lg-6 col-sm-6">
												<div class="form-group">
													<label>Last Name:</label>
													<input type="text" name="lname" placeholder="Last Name" class="form-control">
												</div>
											</div>
											<div class="col-xl-3 col-lg-6 col-sm-6">
												<div class="form-group">
													<label>Email:</label>
													<input type="email" name="email" placeholder="Email Id" class="form-control">
												</div>
											</div>
											<div class="col-xl-3 col-lg-6 col-sm-6">
												<div class="form-group">
													<label>Phone:</label>
													<input type="email" name="phone" placeholder="Phone Number" class="form-control">
												</div>
											</div>
											<div class="col-xl-12 mb-3">
												<h5>Mother Details</h5>
											</div>
											<div class="col-xl-3 col-lg-6 col-sm-6">
												<div class="form-group">
													<label>First Name:</label>
													<input type="text" name="fname" class="form-control" placeholder="First Name">
												</div>
											</div>
											<div class="col-xl-3 col-lg-6 col-sm-6">
												<div class="form-group">
													<label>Last Name:</label>
													<input type="text" name="lname" placeholder="Last Name" class="form-control">
												</div>
											</div>
											<div class="col-xl-3 col-lg-6 col-sm-6">
												<div class="form-group">
													<label>Email:</label>
													<input type="email" name="email" placeholder="Email Id" class="form-control">
												</div>
											</div>
											<div class="col-xl-3 col-lg-6 col-sm-6">
												<div class="form-group">
													<label>Phone:</label>
													<input type="email" name="phone" placeholder="Phone Number" class="form-control">
												</div>
											</div>	
											<div class="col-xl-12">
							  					<div class="form-group">
				                				    <ul>
							        				    <li class="d-inline-block mr-3 mr-mr-0">
							        				    	<div class="form-check form-check-inline">
							        				    	    <label class="form-check-label" for="">Send Email</label>
							        				    	</div>
													    	<div class="form-check form-check-inline">
													    	    <input class="form-check-input" type="radio" name="yo" id="yo">
													    	    <label class="form-check-label" for="yo">Yes</label>
													    	</div>
													    	<div class="form-check form-check-inline">
													    	    <input class="form-check-input" type="radio" id="no" name="no">
													    	    <label class="form-check-label" for="no">No</label>
													    	</div>
													    </li>
				                				    </ul>
			                				   </div>
			                				  
							  				</div>
							  				<div class="col-xl-12">
							  					<div class="form-group">
							  							<button type="button" class="btn btn-primary">Save</button>
							  					</div>
							  				</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header mb-0">
								<h2 class="mb-0">
									<button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_4" aria-expanded="false">
										Education & Proffasion  <span class="d-inline-block float-right pluse_icon">✕</span>
									</button>
								</h2>
							</div>
							<div id="student_filter_panel_4" class="collapse show" style="">
								<div class="card-body">
									<form>
										<div class="row">
											<div class="col-xl-4 col-md-6">
							  					<label>College / Scholl Name</label>
							  					<input type="text" name="country" placeholder="College / Scholl Name" class="form-control">
							  				</div>
							  				<div class="col-xl-4 col-md-6">
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
							  				<div class="col-xl-4 col-md-6">
							  					<div class="form-group">
							  						<label>City:</label>
							  						<select class="form-control">
							  							<option>-- Select --</option>
							  							<option>Surat</option>
							  							<option>Ahamdabad</option>
							  							<option>Vadodara</option>
							  							<option>Rajkot</option>
							  						</select>
							  					</div>
							  				</div>
							  				<div class="col-xl-4 col-md-6">
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
							  				<div class="col-xl-4 col-md-6">
							  					<div class="form-group">
							  						<label>Reference Name:</label>
							  						<input type="text" name="" placeholder="Reference Name" class="form-control">
							  					</div>
							  				</div>
							  				<div class="col-xl-12">
							  					<div class="form-group">
							  							<button type="button" class="btn btn-primary">Save</button>
							  					</div>
							  				</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header mb-0">
								<h2 class="mb-0">
									<button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_5" aria-expanded="false">
										Document  <span class="d-inline-block float-right pluse_icon">✕</span>
									</button>
								</h2>
							</div>
							<div id="student_filter_panel_5" class="collapse show" style="">
								<div class="card-body">
									<form>
										<div class="row">
											<div class="col-xl-4 col-md-6">
							  					<div class="form-group">
							  						<label>Uplod Document</label>
							  						<input type="file" name="photo" class="form-control">
							  					</div>
							  				</div>
							  				<div class="col-xl-12">
							  					<div class="form-group mt-3">
							  							<button type="button" class="btn btn-primary">Save</button>
							  					</div>
							  				</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header mb-0">
								<h2 class="mb-0">
									<button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_6" aria-expanded="false">
										Course & Fees  <span class="d-inline-block float-right pluse_icon">✕</span>
									</button>
								</h2>
							</div>
							<div id="student_filter_panel_6" class="collapse show" style="">
								<div class="card-body">
									<form>
										<div class="row">
											<div class="col-xl-4 col-md-6">
							  					<div class="form-group">
							  						<label>Name:</label>
							  						<input type="text" name="name" class="form-control" placeholder="Name">
							  					</div>
							  				</div>
			  								<div class="col-xl-4 col-md-6">
			  				  					<div class="form-group">
			  				  						<label>Email:</label>
			  				  						<input type="email" name="email" class="form-control" placeholder="Email Id">
			  				  					</div>
			  				  				</div>
			  				  				<div class="col-xl-4 col-md-6">
			  				  					<div class="form-group">
			  				  						<label>Mobile No:</label>
			  				  						<input type="email" name="email" class="form-control" placeholder="Mobile No">
			  				  					</div>
			  				  				</div>
			  				  				<div class="col-xl-4 col-md-6">
			  				  					<div class="form-group">
			  				  						<label>Addmissin Date:</label>
			  				  						<input type="email" name="email" class="form-control" placeholder="Addmissin Date" data-provide="datepicker">
			  				  					</div>
			  				  				</div>
			  				  				<div class="col-xl-4 col-md-6">
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
													    	    <input class="form-check-input" type="radio" name="sing" id="sing">
													    	    <label class="form-check-label" for="sing">Singel Course</label>
													    	</div>
													    	<div class="form-check form-check-inline">
													    	    <input class="form-check-input" type="radio" id="dubble" name="dubble">
													    	    <label class="form-check-label" for="dubble">Course Package</label>
													    	</div>
													    </li>
				                				    </ul>
				            				    </div>
							  				</div>
							  				<div class="col-xl-4 col-md-6">
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
							  				<div class="col-xl-4 col-md-6">
			                				    <div class="form-group">
			                				        <label for="email">Asign To:</label>
			                				        <input type="email" name="email" placeholder="Asign To" class="form-control">
			                				    </div>
							  				</div>
							  				<div class="col-xl-4 col-md-6">
			                				    <div class="form-group">
			                				        <label for="email">Sourse Type:</label>
			                				        <input type="email" name="email" placeholder="Sourse Type" class="form-control">
			                				    </div>
							  				</div>
							  				<div class="col-xl-4 col-md-6">
			                				    <div class="form-group">
			                				        <label for="email">Tution Fees:</label>
			                				        <input type="email" name="email" placeholder="Tution Fees" class="form-control">
			                				    </div>
							  				</div>
							  				<div class="col-xl-4 col-md-6">
			                				    <div class="form-group">
			                				        <label for="email">Registration Fees:</label>
			                				        <input type="email" name="email" placeholder="Registration Fees" class="form-control">
			                				    </div>
							  				</div>
							  				<div class="col-xl-12">
							  					<button type="button" class="btn btn-info btn-block text-left collapsed" data-target="#feesdetails" data-toggle="collapse" aria-expanded="false">Fees Details <span class="d-inline-block float-right pluse_icon">✕</span></button>
							  					<div class="collapse" id="feesdetails" style="">
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
							  							<button type="button" class="btn btn-primary">Save</button>
							  					</div>
							  				</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	
</main>




<?php include('footer.php'); ?>





