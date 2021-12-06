<?php include('header.php'); ?>
	
	<main class="main_content d-inline-block">
		<section class="page_title_block d-inline-block w-100 position-relative pb-0">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-11 mx-auto text-center" >
						<div class="page_heading">
							<h1>Create Task</h1>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="create_task_secs">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 mx-auto">
						<form class="row">
							<div class="col-xl-8 col-lg-10 col-sm-10 mx-auto">
								<div class="form-group">
									<div class="btn-group w-100 add_task_btn">
										<input type="text" name="taskname" class="form-control" placeholder="Task Name">
										<button type="button" class="btn btn-primary red_bg border-0 add_task_btn" ><i class="fas fa-plus"> </i></button>
									</div>
								</div>
								<div class="form-group">
									<textarea class="form-control" placeholder="Task Description" rows="6"></textarea>
								</div>
								<div class="form-group">
									<div class="row align-items-center">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-5 col-6">
											<input type="file" class="form-control-file d-inline-block" name="file">
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-7 col-6 text-right">
											<span>Attach file to image, word , excel , ppt</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<input type="text" name="" placeholder="Task creator (System Login person name)" class="form-control">
								</div>
								<div class="form-group">
									<input type="text" name="" placeholder="Task Assign Participants  (hierarchy wise group or single person)" class="form-control">
								</div>
								<div class="table-responsive">
									<table class="table table-bordered table-striped create_responsive_table">
										<tr class="thead">
											<th>Group Name</th>
											<th>Group Mamber</th>
										</tr>
										<tr>
											<td data-heading="Group Name">Master Admin</td>
											<td data-heading="Group Mamber">
												Ayush 
												<input type="checkbox" name="">
											</td>
										</tr>
										<tr>
											<td data-heading="Group Name">Master Admin</td>
											<td data-heading="Group Mamber">
												Ayush 
												<input type="checkbox" name="">
											</td>
										</tr>
										<tr>
											<td data-heading="Group Name">Master Admin</td>
											<td data-heading="Group Mamber">
												Ayush 
												<input type="checkbox" name="">
											</td>
										</tr>
									</table>
								</div>
								<div class="form-group">
									<input type="text" name="" placeholder="Task Observer (Login person or hierarchy wise group or single person)" class="form-control">
								</div>
								<div class="form-group">
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="one" id="chake1">
									  <label class="form-check-label" for="chake1">Assign Today</label>
									</div>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" id="chake2" name="one">
									  <label class="form-check-label" for="chake2">Assign few days</label>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
										<div class="form-group todate">
											<input type="text" id="datepicker" name="" class="form-control" data-provide="datepicker" placeholder="Date">
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
										<div class="form-group todate ">
											<input type="text" data-provide="timepicker" name="" class="form-control" placeholder="Time" class="timepicker" id="timepicker">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Observation:- &nbsp;&nbsp;&nbsp;</label>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="one" id="chake3">
									  <label class="form-check-label" for="chake3">Daily</label>
									</div>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" id="chake4" name="one">
									  <label class="form-check-label" for="chake4">Random</label>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<input type="text" name="" data-provide="datepicker" class="form-control" id="datepicker" placeholder="Task Start Date">
										</div>
									</div>
									<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<input type="text" name="" data-provide="timepicker" id="timepicker" class="form-control" placeholder="Task Start Time">
										</div>
									</div>
									<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<input type="text" name="" data-provide="datepicker" class="form-control" id="datepicker" placeholder="Task End Date">
										</div>
									</div>
									<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<input type="text" name="" data-provide="timepicker" id="timepicker" class="form-control" placeholder="Task End Time">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Task Priority:- &nbsp;&nbsp;&nbsp;</label>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="one" id="chake5">
									  <label class="form-check-label" for="chake5">High</label>
									</div>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" id="chake6" name="one">
									  <label class="form-check-label" for="chake6">Medium</label>
									</div>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" id="chake7" name="one">
									  <label class="form-check-label" for="chake7">Low</label>
									</div>
								</div>
								<div class="text-right">
									<button type="button" class="btn btn-danger">Close</button>
									<button type="button" class="btn btn-success">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</main>

<?php include('footer.php'); ?>