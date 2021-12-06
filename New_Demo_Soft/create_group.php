<?php include('header.php'); ?>
	
	<main class="main_content d-inline-block">
		<section class="page_title_block d-inline-block w-100 position-relative pb-0">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-11 mx-auto text-center" >
						<div class="page_heading">
							<h1>Create Group</h1>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="create_group_sec d-inline-block w-100 position-relative">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-10 mx-auto">
						<div class="create_group_table_block">
							<div class="coman_design_block_title d-inline-block w-100 border-bottom">
								<div class="btn-group">
									<button type="button" class="btn btn-primary">Add Group</button>
									<button type="button" class="btn btn-success">Add Mamber</button>
								</div>
		            			<!-- <h4 class="d-inline-block align-middle">Display User</h4> -->
		            		</div>
							<div class="table-responsive">
							  <table class="table table-bordered table-striped create_responsive_table">
							    <tr class="thead custi_light_blue_bg">
							    	<th>ID</th>
							    	<th>Group Name</th>
							    	<th>Parent Group</th>
							    	<th>Icon</th>
							    	<th>Log Type</th>
							    	<th>Add Mamber</th>
							    	<th>Update Group</th>
							    	<th>Delete</th>
							    </tr>
							    <tr>
							    	<td data-heading="ID">1</td>
							    	<td data-heading="Group Name">Master Admin</td>
							    	<td data-heading="Parent Group">Main Admin</td>
							    	<td data-heading="Icon">
							    		<div class="table_image_icon">
							    			<img src="https://meetprie.github.io/resume/images/MyImg5.jpg" width="100%">
							    		</div>
							    	</td>
							    	<td data-heading="Log Type">Admin</td>
							    	<td data-heading="Add Mamber">
							    		<a href="#add_mamber_modal" data-toggle="modal" class="btn btn-warning btn-sm">Add Mamber</a>
							    	</td>
							    	<td data-heading="Add Group">
							    		<a href="#update_group" data-toggle="modal" class="btn btn-success btn-sm">Update Group</a>
							    	</td>
							    	<td data-heading="Delete">
							    		<a href="#" class="action_icon action_delete bg-danger" data-toggle="tooltip" title="Mamber Delete"><i class="fas fa-trash-alt"></i></a>
							    	</td>
							    </tr>
							    <tr>
							    	<td data-heading="ID">1</td>
							    	<td data-heading="Group Name">Master Admin</td>
							    	<td data-heading="Parent Group">Main Admin</td>
							    	<td data-heading="Icon">
							    		<div class="table_image_icon">
							    			<img src="https://meetprie.github.io/resume/images/MyImg5.jpg" width="100%">
							    		</div>
							    	</td>
							    	<td data-heading="Log Type">Admin</td>
							    	<td data-heading="Add Mamber">
							    		<a href="#add_mamber_modal" data-toggle="modal" class="btn btn-warning btn-sm">Add Mamber</a>
							    	</td>
							    	<td data-heading="Add Group">
							    		<a href="#update_group" data-toggle="modal" class="btn btn-success btn-sm">Update Group</a>
							    	</td>
							    	<td data-heading="Delete">
							    		<a href="#" class="action_icon action_delete bg-danger" data-toggle="tooltip" title="Mamber Delete"><i class="fas fa-trash-alt"></i></a>
							    	</td>
							    </tr>
							  </table>
							</div>
							<nav class="pagination_block">
							    <ul class="pagination justify-content-center">
							        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
							        <li class="page-item"><a class="page-link" href="#">1</a></li>
							        <li class="page-item"><a class="page-link" href="#">2</a></li>
							        <li class="page-item"><a class="page-link" href="#">3</a></li>
							        <li class="page-item"><a class="page-link" href="#">Next</a></li>
							    </ul>
							</nav>
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