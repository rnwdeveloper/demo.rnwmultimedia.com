<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">

<style type="text/css">
	li.select2-selection__choice {
		background-color: #5864BC !important;
	}
</style>
<div class="main-wrapper main-wrapper-1">
	<div class="main-content">
		<section class="section">
			<div class="section-body">
				<div class="row">
					<div class="col-12 d-flex justify-content-between">
						<h6 class="page-title text-dark mb-3">Email Setting</h6>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb p-0">
								<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Email Setting</li>
							</ol>
						</nav>
					</div>
					<div class="col-12">
						<div class="card">
							<div class="card-header d-flex justify-content-between income-wrapper">
								<div class="d-flex justify-content-between">
								</div>
								<div class="table-right-content">
									<button href="#" class="btn btn-info" data-toggle="modal" data-target="#addemail" onclick="resetForm()">
										<i class="fas fa-plus mr-1"></i>
									</button>
									<button class="btn">
										<a href="<?php echo base_url(); ?>"><span><i class="fas fa-arrow-left mr-1"></i> Back</span></a>
									</button>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped normal-table branch-table" id="table-1">
										<thead>
											<tr>
												<th>No</th>
												<th>First Name</th>
												<th>Email</th>
												<th>Password</th>
												<th>Host</th>
												<th>Port</th>
												<th>Encryption</th>
												<th>Email Type</th>
												<th>Set Email</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>

											<?php $no = 1;
											foreach ($email_all as $key => $value) { ?>
												<tr class="td">
													<td><?php echo $no; ?></td>
													<td><?php echo $value->first_name; ?></td>
													<td><?php echo $value->email; ?></td>
													<td><?php echo $value->password; ?></td>
													<td><?php echo $value->host; ?></td>
													<td><?php echo $value->port; ?></td>
													<td><?php echo $value->encryption; ?></td>
													<td><?php if ($value->email_type == 1) { ?><span class="badge badge-success">Defalt</span><?php } else { ?><span  class="badge badge-info">From</span> <?php } ?></td>
													<td><?php if ($value->is_default == 1) { ?><span class="btn btn-icon btn-sm btn-success"><i class="fas fa-check"></i></span><?php } ?></td>
													<td>
														<?php if ($value->status == "0") { ?>
															<a class="badge badge-success text-white">Active</a>
														<?php } else { ?>
															<a class="badge badge-danger text-white">Disable</a>
														<?php } ?>
													</td>
													<td>
														<div class="dropdown">
															<a href="#" data-toggle="dropdown" class="btn btn-light text-dark dropdown-toggle text-white">Options</a>
															<div class="dropdown-menu">
																<a class="dropdown-item has-icon" href="javascript:doc_upd(<?php echo @$value->id; ?>)">
																	<i class="far fa-edit"></i> Edit
																</a>
																<a class="dropdown-item has-icon" href="javascript:remove_doc(<?php echo @$value->id; ?>)">
																	<i class="far fa-trash-alt text-danger"></i> Delete
																</a>
																<?php if ($value->status == 0) { ?>
																	<a class="dropdown-item has-icon" href="javascript:doc_status_upd(<?php echo @$value->id; ?>, 1)">
																		<i class="fas fa-ban"></i> Disable
																	</a>
																<?php } else {  ?>
																	<a class="dropdown-item has-icon" href="javascript:doc_status_upd(<?php echo @$value->id; ?>, 0)">
																		<i class="far fa-check-circle"></i> Active
																	</a>
																<?php } ?>
															</div>
													</td>
												</tr>
											<?php $no++;
											} ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- Add EMAIL -->
	<div class="modal fade" id="addemail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-dark" id="myLargeModalLabel">Add Email Settings</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="document-createmodal" method="post" name="email_add" id="email_add" action="">
					<div class="modal-body">
						<div class="card">
							<div class="branch-items row mb-2">
								<input type="hidden" name="update_id" id="update_id" value="" />
								<div class="form-group col-sm-12">
									<label for="fname">Email Type:</label>
									<div class="form-check d-flex">
										<div class="custom-control custom-radio">
											<input type="radio" id="default" name="email_type" value="default" class="custom-control-input" checked>
											<label class="custom-control-label" for="default">Default</label>
										</div>
										<div class="custom-control custom-radio ml-3">
											<input type="radio" id="from" name="email_type" value="form" class="custom-control-input">
											<label class="custom-control-label" for="from">From</label>
										</div>
									</div>
								</div>
								<!-- <div class="form-check d-flex">
									<div class="custom-control custom-radio">
										<input type="radio" id="default" name="email_type" value="default" class="custom-control-input">
										<label class="custom-control-label" for="customRadio3">Default</label>
									</div>
									<div class="custom-control custom-radio ml-3">
										<input type="radio" id="form" name="email_type" value="form" class="custom-control-input">
										<label class="custom-control-label" for="customRadio2">Form</label>
									</div>
								</div> -->
								<div class="form-group  col-md-4 col-sm-12">
									<label for="fname">First Name:</label>
									<input class="form-control" value="" type="text" name="fname" id="fname" placeholder="Enter First Name" required>
								</div>
								<div class="form-group  col-md-4 col-sm-12">
									<label for="fname">Last Name:</label>
									<input class="form-control" value="" type="text" name="lname" id="lname" placeholder="Enter Last Name" required>
								</div>
								<div class="form-group  col-md-4 col-sm-12">
									<label for="fname">Email:</label>
									<input class="form-control" value="" type="email" name="email" id="email" placeholder="Enter Your Email-id" required>
								</div>
								<div id="pwddiv" class="form-group  col-md-4 col-sm-12">
									<label for="fname">Password:</label>
									<input class="form-control" value="" type="password" name="pwd" id="pwd" placeholder="Enter Your Password" required>
								</div>
								<div id="hostdiv" class="form-group  col-md-4 col-sm-12">
									<label for="fname">Host Name:</label>
									<input class="form-control" value="" type="text" name="host" id="host" placeholder="smtp.gamil.com" required>
								</div>
								<div id="portdiv" class="form-group  col-md-4 col-sm-12">
									<label for="fname">Port:</label>
									<input class="form-control" value="" type="number" name="port" id="port" placeholder="587" required>
								</div>
								<div id="encryptiondiv" class="form-group col-md-4 col-sm-12">
									<label>Encryption</label>
									<select class="form-control" name="encryption" id="encryption">
										<option value="">Select Email Encryption</option>
										<option value="smtp">SMTP</option>
										<option value="pop">POP</option>
									</select>
								</div>
								<div class="form-group col-md-4 col-sm-12">
									<label>Default Email Set:</label>
									<div class="form-check">
										<div class="custom-control custom-checkbox">
											<input name="is_default" type="checkbox" class="custom-control-input" id="is_default">
											<label class="custom-control-label" for="is_default"></label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<input type="submit" name="submit" value="Save" class="btn btn-primary" />
						<input type="submit" name="submit" value="Close" class="btn btn-light ml-2" />
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
	<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
	<!-- Page Specific JS File -->
	<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
	<!-- JS Libraies -->
	<script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
	<!-- Page Specific JS File -->
	<script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
	<!-- JS Libraies -->
	<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
	<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
	<!-- Page Specific JS File -->
	<script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>
	<script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/cleave.min.js"></script>
	<script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
	<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
	<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.0-beta/js/bootstrap-select.min.js"></script>
	<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
	<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
	<!-- Page Specific JS File -->
	<script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script>
	<script src="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
	<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
	<script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
	<!-- Custom JS File -->
	<script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
	<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
	<!-- Page Specific JS File -->
	<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

	<script>
		function resetForm() {
			console.log("reset");
			//$('#logtype_add').trigger("reset")
			$('#email_add')[0].reset();
			$('#default').prop('checked', true);
			$('#pwddiv').show();
			$('#hostdiv').show();
			$('#portdiv').show();
			$('#encryptiondiv').show();
			console.log("reset");
		}

		$("#email_add").validate({
			rules: {
				branch_id: {
					required: true
				},
				w_template_name: {
					required: true,
				},
				w_template_message: {
					required: true
				}
			},
			messages: {
				w_template_name: {
					required: "<div style='color:red'>Enter Template Name</div>",
				},
				w_template_message: {
					required: "<div style='color:red'>Please enter template Message</div>"
				}
			},
			submitHandler: function() {
				event.preventDefault();
				var formdata = $('#email_add').serialize();

				$.ajax({
					url: "<?php echo base_url(); ?>AdminSettings/ajax_email_setting_submit",
					type: "post",
					data: formdata,
					success: function(resp) {
						var data = $.parseJSON(resp);
						var ddd = data['all_record'].status;
						if (ddd == '1') {
							$('#msg_doc').html(iziToast.success({
								title: 'Success',
								timeout: 2000,
								message: data['all_record'].msg,
								position: 'topRight'
							}));

							setTimeout(function() {
								location.reload();
							}, 2020);
						} else if (ddd == '2') {
							$('#msg_doc').html(iziToast.error({
								title: 'Canceled!',
								timeout: 2000,
								message: data['all_record'].msg,
								position: 'topRight'
							}));

							setTimeout(function() {
								location.reload();
							}, 2020);
						}
					}
				});
			}
		});
	</script>

	<script>
		function doc_upd(id) {
			//console.log(department_id);
			$.ajax({
				url: "<?php echo base_url(); ?>AdminSettings/get_record",
				type: "post",
				data: {
					'id': id,
					'table': 'email_settings',
					'field': 'id'
				},
				success: function(resp) {
					$("#addemail").modal();
					var data = $.parseJSON(resp);

					var id = data['single_record'].id;
					var email_type = data['single_record'].email_type;
					var fname = data['single_record'].first_name;
					var lname = data['single_record'].last_name;
					var email = data['single_record'].email;
					var pwd = data['single_record'].password;
					var host = data['single_record'].host;
					var port = data['single_record'].port;
					var encryption = data['single_record'].encryption;
					var is_default = data['single_record'].is_default;

					console.log("is_default" + is_default);
					if (email_type == 1) {
						$('#default').prop('checked', true);
					} else {
						$('#from').prop('checked', true);
						$('#pwddiv').hide();
						$('#hostdiv').hide();
						$('#portdiv').hide();
						$('#encryptiondiv').hide();
						$('#pwd').val("");
						$('#host').val("");
						$('#port').val("");
						$('#encryption').val("");
					}

					if (is_default == 1) {
						$('#is_default').prop('checked', true);
					} else {
						$('#is_default').prop('checked', false);
					}

					$('#update_id').val(id);
					$('#fname').val(fname);
					$('#lname').val(lname);
					$('#email').val(email);
					$('#pwd').val(pwd);
					$('#host').val(host);
					$('#port').val(port);
					$('#encryption').val(encryption);

					$('#submit').val('Update');
				}

			});
		}

		function remove_doc(id) {
			var conf = confirm("Are you sure to delete record?");
			if (conf) {
				$.ajax({
					url: "<?php echo base_url(); ?>AdminSettings/delete_record",
					type: "post",
					data: {
						'id': id,
						'table': 'email_settings',
						'field': 'id'
					},
					success: function(resp) {
						var data = $.parseJSON(resp);
						var ddd = data['all_record'].status;
						console.log("dddddd", ddd);
						if (ddd == '1') {
							$('#deleted_msg').html(iziToast.success({
								title: 'Success',
								timeout: 2000,
								message: 'HI! This Record Deleted.',
								position: 'topRight'
							}));


							setTimeout(function() {
								location.reload();
							}, 2020);
						} else if (ddd == '2') {
							$('#deleted_msg').html(iziToast.error({
								title: 'Canceled!',
								timeout: 2000,
								message: '',
								position: 'topRight'
							}));

							setTimeout(function() {
								location.reload();
							}, 2020);
						}
					}
				});
			}
		}

		function doc_status_upd(id, status) {
			console.log(id);
			$.ajax({
				url: "<?php echo base_url(); ?>AdminSettings/update_status",
				type: "post",
				data: {
					'id': id,
					'status': status,
					'table': 'email_settings',
					'field': 'status',
					'check_field': 'id'
				},
				success: function(resp) {
					var data = $.parseJSON(resp);
					var ddd = data['status'].status;
					console.log("dddddd", ddd);
					if (ddd == '1') {
						$('#msg').html(iziToast.success({
							title: 'Success',
							timeout: 2000,
							message: data['status'].msg,
							position: 'topRight'
						}));


						setTimeout(function() {
							location.reload();
						}, 2020);
					} else if (ddd == '2') {
						$('#msg').html(iziToast.error({
							title: 'Canceled!',
							timeout: 2000,
							message: data['status'].msg,
							position: 'topRight'
						}));

						setTimeout(function() {
							location.reload();
						}, 2020);
					}
				}
			});
		}
	</script>
	<script>
		$(document).ready(function() {
			$("input[name$='email_type']").click(function() {
				var test = $(this).val();

				if (test === "form") {
					$('#pwddiv').hide();
					$('#hostdiv').hide();
					$('#portdiv').hide();
					$('#encryptiondiv').hide();
				} else {
					$('#pwddiv').show();
					$('#hostdiv').show();
					$('#portdiv').show();
					$('#encryptiondiv').show();
				}
				console.log(test);
				// $("div.desc").hide();
				// $("#Cars" + test).show();
			});
		});
	</script>