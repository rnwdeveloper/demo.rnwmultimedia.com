<?php include('header.php'); ?>
	
	<main class="main_content d-inline-block">
		<section class="page_title_block d-inline-block w-100 position-relative pb-0">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 mx-auto">
						<div class="page_heading">
							<h1>Add Demo Studetn</h1>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="d-inline-block w-100 position-relative">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 mx-auto">
						<div class="coman_design_block_box">
	                        <div class="coman_design_block_title d-inline-block w-100 border-bottom">
	                            <h4 class="d-inline-block align-middle">Add New Demo</h4>
	                        </div>
	                        <form class="coman_design_block_info">
	                            <div class="row">
	                            	<div class="col-xl-4 col-lg-4 col-md-6">
	                            		<div class="form-group">
	                            			<label>Demo Date*</label>
	                            			<input type="text" name="" placeholder="Select Demo Date" class="form-control">
	                            		</div>
	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-md-6">
	                            		<div class="form-group">
	                            			<label>Name*</label>
	                            			<input type="text" name="" placeholder="Enter Name" class="form-control">
	                            		</div>
	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-md-6">
	                            		<div class="form-group">
	                            			<label>Mobile No*</label>
	                            			<input type="text" name="" placeholder="Enter Mobile Number" class="form-control">
	                            		</div>
	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-md-6">
	                            		<div class="form-group">
	                            			<label>Branch*</label>
	                            			<select class="form-control">
	                            			    <option>Select Branch</option>
	                            			    <option value="1">AK ROAD</option>
	                            			    <option value="3">MOTA VARACHHA</option>
	                            			    <option value="5">YOGI CHOWK</option>
	                            			    <option value="8">SARTHANA</option>
	                            			    <option value="9">AK ROAD-RW1B</option>
	                            			    <option value="10">INTERNATIONAL</option>
	                            			    <option value="11">RNWCOLLAGE</option>
	                            			    <option value="16">SARTHANA2</option>
	                            			    <option value="15">AK Road</option>
	                            			</select>
	                            		</div>
	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-md-6">
	                            		<div class="form-group">
	                            			<label>Department*</label>
	                            			<select class="form-control">
	                            			    <option>Select Department</option>
	                            			    <option>COmputer</option>
	                            			</select>
	                            		</div>
	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-md-6">
	                            		<label>Course Type</label>
	                            		<div class="form-group">
	                            			<div class="form-check form-check-inline">
	                            			  <label class="form-check-label" for="inlineRadio1"><input class="form-check-input" type="radio">Single Course </label>
	                            			</div>
	                            			<div class="form-check form-check-inline">
	                            			  <label class="form-check-label"><input class="form-check-input" type="radio">Package</label>
	                            			</div>
	                            		</div>
	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-md-6">
	                            		<div class="form-group">
	                            			<label>Course*</label>
	                            			<select class="form-control">
	                            				<option>Sekect Course</option>
	                            				<option>Web</option>
	                            				<option>Gim</option>
	                            			</select>
	                            		</div>
	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-md-6">
	                            		<label>Faculty Type</label>
	                            		<div class="form-group">
	                            			<div class="form-check form-check-inline">
	                            			  <label class="form-check-label" for="inlineRadio1"><input class="form-check-input" type="radio">Faculty</label>
	                            			</div>
	                            			<div class="form-check form-check-inline">
	                            			  <label class="form-check-label"><input class="form-check-input" type="radio">Hod</label>
	                            			</div>
	                            		</div>
	                            	</div>
	                            	<div class="col-xl-4 col-lg-4 col-md-6">
	                            		<div class="form-group">
	                            			<label>Asign Demo*</label>
	                            			<select class="form-control">
	                            				<option>Asign Demo</option>
	                            				<option>Mehul Sir</option>
	                            				<option>Mehul Sir</option>
	                            				<option>Mehul Sir</option>
	                            			</select>
	                            		</div>
	                            	</div>
	                            	<div class="col-xl-3 col-lg-3 col-md-6">
										<div class="form-group">
											<label>Start Time</label>
											<input type="text" name="" placeholder="Time To" data-provide="timepicker" class="form-control" autocomplete="off">
										</div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-6">
										<div class="form-group">
											<label>End Time</label>
											<input type="text" name="" placeholder="To End" data-provide="timepicker" class="form-control">
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6">
										<div class="form-group">
											<label>Remark</label>
											<textarea class="form-control" placeholder="Remark"></textarea>
										</div>
									</div>
	                            </div>
	                            <div class="col-xl-12 text-center">
	                                <button type="button" class="btn btn-primary">Submit</button>
	                            </div>
	                        </form>
	                    </div>
					</div>
				</div>
			</div>
		</section>
	</main>





	<div class="modal fade" id="add_mamber_modal">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Master Admin</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="row">
	      		<div class="col-xl-12">
	      			<div class="form-group">
	      				<label>Group Master</label><br>
	      				<div class="btn-group w-100">
	      					<select class="form-control">
	      						<option>Select Mmember</option>
	      						<option>Nirbahy Virani</option>
	      						<option>Nirbahy Virani</option>
	      						<option>Nirbahy Virani</option>
	      					</select>
	      					<button type="button" class="btn btn-primary">Save</button>
	      				</div>
	      			</div>
	      		</div>
	      	</div>
	      </div>
	      <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
	    </div>
	  </div>
	</div>	
	<div class="modal fade" id="update_group">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Parent Group</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="row">
	      		<div class="col-xl-12">
	      			<div class="form-group">
	      				<label>Group Master</label><br>
	      				<div class="btn-group w-100">
	      					<select class="form-control">
	      						<option>Select Group</option>
	      						<option>Nirbahy Virani</option>
	      						<option>Nirbahy Virani</option>
	      						<option>Nirbahy Virani</option>
	      					</select>
	      					<button type="button" class="btn btn-primary">Save</button>
	      				</div>
	      			</div>
	      		</div>
	      	</div>
	      </div>
	      <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
	    </div>
	  </div>
	</div>	
	

<?php include('footer.php'); ?>