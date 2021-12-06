<?php include('header.php'); ?>
	
	<main class="main_content d-inline-block">
		<section class="page_title_block d-inline-block w-100 position-relative pb-0">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-11 mx-auto text-center" >
						<div class="page_heading">
							<h1>Show Task</h1>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="task_show_sec">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-10 mx-auto">
						<div class="table-responsive">
						  <table class="table table-bordered table-striped create_responsive_table">
						    <tr class="thead custi_light_blue_bg">
						    	<th>Name</th>
						    	<th>Deadline</th>
						    	<th>Created </th>
						    	<th>Observer</th>
						    	<th>Status</th>
						    	<th>Priority</th>
						    	<th>Progress</th>
						    	<th>Action</th>
						    </tr>
						    <tr>
						    	<td data-heading="Name">Laravel</td>
						    	<td data-heading="Deadline">16-4-20 7:00 PM</td>
						    	<td data-heading="Created">Hitesh sir</td>
						    	<td data-heading="Observer">Hitesh sir</td>
						    	<td data-heading="Status">Pending</td>
						    	<td data-heading="Priority">High</td>
						    	<td data-heading="Progress">0%</td>
						    	<td data-heading="Action"><button type="button" class="btn btn-primary custi_light_blue_bg btn-sm" data-toggle="modal" data-target="#view_participants"> Show</button></td>
						    </tr>
						    <tr>
						    	<td data-heading="Name">Laravel</td>
						    	<td data-heading="Deadline">16-4-20 7:00 PM</td>
						    	<td data-heading="Created">Hitesh sir</td>
						    	<td data-heading="Observer">Hitesh sir</td>
						    	<td data-heading="Status">Pending</td>
						    	<td data-heading="Priority">High</td>
						    	<td data-heading="Progress">0%</td>
						    	<td data-heading="Action"><button type="button" class="btn btn-primary custi_light_blue_bg btn-sm" data-toggle="modal" data-target="#view_participants"> Show</button></td>
						    </tr>
						    <tr>
						    	<td data-heading="Name">Laravel</td>
						    	<td data-heading="Deadline">16-4-20 7:00 PM</td>
						    	<td data-heading="Created">Hitesh sir</td>
						    	<td data-heading="Observer">Hitesh sir</td>
						    	<td data-heading="Status">Pending</td>
						    	<td data-heading="Priority">High</td>
						    	<td data-heading="Progress">0%</td>
						    	<td data-heading="Action"><button type="button" class="btn btn-primary custi_light_blue_bg btn-sm" data-toggle="modal" data-target="#view_participants"> Show</button></td>
						    </tr>
						  </table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>





	<div class="filter_ratio filter_ratio_one">
		<div class="modal fade" id="view_participants">
		  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Task</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<div class="row justify-content-center">
		      		<div class="col-xl-8 col-lg-8 col-md-8">
		      			<div class="task_show_left_block_form">
		      				<form>
		      					<ul class="show_task_propaty">
		      						<li>Panding</li>
		      						<li class="float-right">High Priority</li>
		      					</ul>
		      					<div class="form-group">
		      						<input type="text" name="" placeholder="Laravel" class="form-control">
		      					</div>
		      					<div class="form-group">
		      						<textarea class="form-control" placeholder="Creating a fast" rows="6"></textarea>
		      					</div>
		      					<div class="form-group">
		      						<button type="button" class="btn btn-primary custi_light_blue_bg">Show Document file</button>
		      					</div>
		      					<div class="form-group">
		      						<label>Status:- &nbsp;&nbsp;&nbsp;</label>
		      						<div class="form-check form-check-inline">
		      						  <input class="form-check-input" type="radio" name="one" id="chake3">
		      						  <label class="form-check-label" for="chake3">Progress</label>
		      						</div>
		      						<div class="form-check form-check-inline">
		      						  <input class="form-check-input" type="radio" id="chake4" name="one">
		      						  <label class="form-check-label" for="chake4">Complete</label>
		      						</div>
		      					</div>
		      					<div class="work_progress_block">
		      						<label>Progress status:-</label>
		      						<div class="progress">
		      						  <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><span>70%</span></div>
		      						</div>
		      					</div>
		      					<div class="chateing_block">
		      						<div class="me_type_chate the_chate"><p>How many lecture create?</p></div>
		      						<div class="any_type_chate the_chate"><p>5 demo lecture.</p></div>
		      						<div class="me_type_chate the_chate"><p>OK.</p></div>
		      						<div class="me_type_chate the_chate"><p>Good.</p></div>
		      					</div>
		      					<div class="type_msg_block">
		      						<div class="col-lg-12">
		      							<div class="row">
		      								<div class="col-lg-12">
		      									<div class="form-group mb-0 type_msg_block_box position-relative">
		      										<input type="text" name="msg" class="form-control msg_type_input" placeholder="Type a message">
		      										<button class="msg_sent_btn">
		      											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="currentColor" d="M1.101 21.757L23.8 12.028 1.101 2.3l.011 7.912 13.623 1.816-13.623 1.817-.011 7.912z"></path></svg>
		      										</button>
		      									</div>
		      								</div>
		      							</div>
		      						</div>
		      					</div>
		      				</form>
		      			</div>
		      		</div>
		      		<div class="col-xl-4 col-lg-4 col-md-4">
		      			<div class="task_show_right_block_form">
		      				<div class="seen_dates">
		      					<p>Seen date : 15-4-20 5:00 PM</p>
		      				</div>
		      				<ul class="task_show_right_block_form_data_list">
		      					<li>Observe: - Daily</li>
		      					<li>Deadline: - 16-4-2020 6:00 PM</li>
		      					<li>Set reminder:5 minute</li>
		      				</ul>
		      				<ul class="task_show_right_block_form_data_list">
		      					<li>Created By: Hitesh sir</li>
		      					<li>Observer By: Pradip sir</li>
		      				</ul>
		      				<div class="participants_bloack">
		      					<div class="participants_title">
		      						<h4>Participants:-</h4>
		      					</div>
		      					<ul class="participants_member">
		      						<li>
		      							<span class="participants_member_profile"></span>
		      							<span class="participants_member_name">Mehul Sir</span>
		      						</li>
		      						<li>
		      							<span class="participants_member_profile"></span>
		      							<span class="participants_member_name">Mehul Sir</span>
		      						</li>
		      						<li>
		      							<span class="participants_member_profile"></span>
		      							<span class="participants_member_name">Mehul Sir</span>
		      						</li>
		      					</ul>
		      				</div>
		      				<div class="submit_task_btn_block">
		      					<button type="button" class="btn btn-block btn-primary custi_light_blue_bg border-0">Submit Task</button>
		      				</div>
		      			</div>
		      		</div>
		      	</div>
		      </div>
		    </div>
		  </div>
		</div>	
	</div>
	

<?php include('footer.php'); ?>