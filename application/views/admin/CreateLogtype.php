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
						<h6 class="page-title text-dark mb-3">Log Type</h6>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb p-0">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li>
							</ol>
						</nav>
					</div>
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4></h4>
								<div class="card-header-action">
									<div class="dropdown">
										<a href="#" data-toggle="dropdown" class="btn btn-info dropdown-toggle text-white"><i class="fas fa-tasks mr-1" data-toggle="tooltip" data-placement="bottom" title="Task"></i></a>
										<div class="dropdown-menu">
											<a target="_blank" href="<?php echo base_url(); ?>Settings/permission_all_data" class="dropdown-item has-icon text-danger" data-toggle="modal" data-target="#createuser" onclick="resetForm()"><i style="margin-top: 1px;" class="fas fa-user-shield"></i>
												Show All Permission</a>
											<a target="_blank" href="<?php echo base_url(); ?>Settings/personal_permission_all_data" class="dropdown-item has-icon text-dark"><i style="margin-top: 1px;" class="fas fa-user-shield"></i>Personal permission</a>
											<a target="_blank" href="<?php echo base_url(); ?>Settings/personal_hod_permission_all_data" class="dropdown-item has-icon text-dark"><i style="margin-top: 1px;" class="fas fa-user-shield"></i>HoD permission</a>
											<a target="_blank" href="<?php echo base_url(); ?>Settings/personal_user_permission_all_data" class="dropdown-item has-icon text-dark"><i style="margin-top: 1px;" class="fas fa-user-shield"></i>User permission</a>
										</div>
									</div>
									<button class="btn">
										<a href="<?php echo base_url(); ?>"><span><i class="fas fa-arrow-left mr-1"></i> Back</span></a>
									</button>
								</div>
							</div>
							<div class="card-body">
								<form class="document-createmodal" method="post" name="logtype_Add" id="logtype_Add" action="<?php echo base_url(); ?>AdminSettings/createuser">
									<input type="hidden" name="update_id" id="update_id" />
									<h5 class="modal-title text-dark mb-2" id="myLargeModalLabel">Create LogType: </h5>
									<div class="branch-items row mb-2">
										<div class="form-group  col-md-4 col-sm-12">
											<label for="pwd">Log Type:</label>
											<input class="form-control" value="" type="text" name="name" id="name" placeholder="Enter Log Type" required>
										</div>
									</div>
									<div class="branch-items row mb-2" id="allPermission"></div>

									<h5 class="modal-title text-dark" id="myLargeModalLabel">Permission: </h5>
									<div class="branch-items row mb-2" id="allPermission"></div>
									<div class="branch-items row mb-2" id="permission_all">
										<?php
										foreach ($f_module as $key => $value) { ?>
											<div class="form-group col-md-4 col-sm-12">
												<h6 class="text-dark">
													<?php echo $value->f_module_name; ?>
													<input type="checkbox" name="fp[]" value="<?php echo $value->f_module_name; ?>" onclick="change_mod(<?php echo $value->f_module_id; ?>)">
												</h6>
												<div id="all_change_mod<?php echo $value->f_module_id; ?>"></div>
											</div>
										<?php } ?>
									</div>
									<input type="submit" name="submit" value="Save" class="btn btn-primary btn-inline" />
								</form>
							</div>
						</div>
					</div>
					<div class="col-12">
						<div class="card">
							<div class="card-header d-flex justify-content-between income-wrapper">
								<div class="d-flex justify-content-between">
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped normal-table branch-table" id="table1">
										<thead>
											<tr>
												<th>Logtype</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($logtype_all as $val) { ?>
												<tr>
													<td><?php echo $val->logtype_name; ?></td>
													<!-- <td><?php if (isset($val->group_nameall)) {
																	foreach ($val->group_nameall as $key => $value) {
																		echo $value;
																	}
																} ?></td> -->
													<td><label style="color:#a6a6a6"> <?php if ($val->status == "0") {
																							echo "Active";
																						}
																						if ($val->status == "1") {
																							echo  "Disable";
																						} ?> </label></td>
													<td>
														<div class="dropdown">
															<a href="#" data-toggle="dropdown" class="btn btn-light text-dark dropdown-toggle text-white">Options</a>
															<div class="dropdown-menu">
																<a class="dropdown-item has-icon" href="javascript:doc_upd(<?php echo $val->logtype_id; ?>)">
																	<i class="far fa-edit"></i> Edit
																</a>
																<a class="dropdown-item has-icon" href="javascript:remove_doc(<?php echo $val->logtype_id; ?>)">
																	<i class="far fa-trash-alt text-danger"></i> Delete
																</a>
																<?php if ($val->status == 0) { ?>
																	<a class="dropdown-item has-icon" href="javascript:doc_status_upd(<?php echo $val->logtype_id; ?>, 1)">
																		<i class="fas fa-ban"></i> Disable
																	</a>
																<?php } else {  ?>
																	<a class="dropdown-item has-icon" href="javascript:doc_status_upd(<?php echo $val->logtype_id; ?>, 0)">
																		<i class="far fa-check-circle"></i> Active
																	</a>
																<?php } ?>
															</div>
													</td>
												</tr>
											<?php } ?>
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
		//$('#logtype_Add').trigger("reset")
		$('#logtype_Add')[0].reset();
		$("[name='fp[]']").prop('checked', false);
		$("[name='m_all[]']").prop('checked', false);
		$("[name='f_all[]']").prop('checked', false);
		$("#branch_id option:selected").prop("selected", false);
		$('#branch_id').val("").trigger("change");
		$("#department option:selected").prop("selected", false);
		$('#department').val("").trigger("change");
		$("#subdepartment option:selected").prop("selected", false);
		$('#subdepartment').val("").trigger("change");
		$('#hdepartment').val("");
		$('#hsubdepartment').val("");
	}

	$("#logtype_Add").validate({
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
			var formdata = $('#logtype_Add').serialize();

			$.ajax({
				url: "<?php echo base_url(); ?>AdminSettings/ajax_logtype_submit",
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
			url: "<?php echo base_url(); ?>AdminSettings/get_record_logtype",
			type: "post",
			data: {
				'logtype_id': id
			},
			success: function(resp) {
				//$("#createsubdepartment").modal();
				var data = $.parseJSON(resp);

				var logtype_id = data['single_record'].logtype_id;
				var logtype_name = data['single_record'].logtype_name;
				var f_permission = data['single_record'].f_permission;
				var m_permission = data['single_record'].m_permission;
				var permission = data['single_record'].permission;

				$('#name').val(logtype_name);

				$('#update_id').val(logtype_id);

				$.ajax({
					type: 'POST',
					data: {
						f_permission: f_permission,
						m_permission: m_permission,
						permission: permission,
					},
					url: "<?php echo base_url(); ?>settings/fetch_permission_alll",
					success: function(data) {
						$('#permission_all').html(data);
					}
				});

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
					'table': 'logtype',
					'field': 'logtype_id'
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
				'table': 'logtype',
				'field': 'status',
				'check_field': 'logtype_id'
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

	$(function() {
		$('#table1').DataTable({
			stateSave: true
		})
	});
</script>
<script type="text/javascript">
	function change_mod(id) {
		var a = id;
		$.ajax({
			url: "<?php echo base_url(); ?>settings/change_f_mod",
			type: 'POST',
			data: {
				a_name: a
			},
			success: function(res) {
				$('#all_change_mod' + id).html(res);
			}
		});
	}
</script>