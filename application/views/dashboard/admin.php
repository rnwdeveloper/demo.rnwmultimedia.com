<main class="main_content d-inline-block">
	<section class="page_title_block d-inline-block w-100 position-relative pb-0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="page_heading">
						<h1>Admin</h1>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="coman_design_block d-inline-block w-100 position-relative">
		<div class="container-fluid">
			<div class="row all_demo_student_block">
			    <div class="col-lg-12">
			        <div class="accordion accordion_design_2" id="student_list_aoc">
			            <div class="card">
			                <div class="card-header mb-0">
			                    <h2 class="mb-0">
									<button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_1" aria-expanded="false">
										Create Admin <span class="d-inline-block float-right pluse_icon">✕</span>
									</button>
								</h2>
			                </div>
			                <div id="student_filter_panel_1" class="collapse show" data-parent="#student_list_aoc" style="">
			                	<div class="coman_design_block_box">
			                		<div class="coman_design_block_title d-inline-block w-100 border-bottom">
			                			<h4 class="d-inline-block align-middle">Create Admin</h4>
			                			<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#logtype_create">Create Logtype</button>
			                		</div>
			                		<form class="coman_design_block_info" method="post" action="<?php echo base_url(); ?>settings/admin">
			                			<input type="hidden" name="update_id" value="<?php if(!empty($select_user->user_id)) { echo $select_user->user_id; } ?>"/>
			                			<div class="row">
			                				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
			                				    <div class="form-group">
			                				        <label for="email">Logtype:</label>
			                				        <select required="" class="form-control" name="logtype">
			                				            <option value="1">Select Logtype</option>
                                    					<?php foreach($logtype_all as $val) { if($val->status==0) { ?>
                                    						<option <?php if($val->logtype_name==@$select_user->logtype) { echo "selected"; } ?>   value="<?php echo $val->logtype_name; ?>"><?php echo $val->logtype_name; ?></option>
                                    					<?php } } ?>
			                				        </select>
			                				    </div>
			                				</div>
			                				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
			                					<div class="form-group">
			                					    <label for="pwd">State:</label>
			                					    <select class="form-control" name="state_id" id="state_id">
			                					         <option value="0">select state</option>
                                                		<?php foreach($state_all as $v){ ?>
                                                  			<option value="<?php echo $v->state_id; ?>" <?php if(isset($select_user->state_id)){ if($v->state_id == $select_user->state_id){echo "selected";} }?>><?php echo $v->state_name; ?></option>
                                                		<?php } ?>
			                					    </select>
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
			                					<div class="form-group">
			                					    <label for="pwd">City:</label>
			                					    <select class="form-control" name="city_id" id="city_id">
			                					        <option value="0">select city</option>
			                					        
			                					    </select>
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
			                					<div class="form-group">
			                					    <label for="pwd">Name:</label>
			                					    <input class="form-control"  value="<?php if(!empty($select_user->name)) { echo $select_user->name; } ?>" type="text" name="name" placeholder="Enter Name" required="">
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
			                					<div class="form-group">
			                					    <label for="pwd">Email Id:</label>
			                					    <input class="form-control" value="<?php if(!empty($select_user->email)) { echo $select_user->email; } ?>" type="email" name="email" placeholder="Enter Email" required="" autocomplete="off">
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
			                					<div class="form-group">
			                					    <label for="pwd">Password :</label>
			                					    <input type="password" class="form-control" value="<?php if(!empty($select_user->password)) { echo $select_user->password; } ?>" name="password" placeholder="Enter password" required="">
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
			                					<div class="form-group">
			                					    <label for="pwd">Company Name:</label>
			                					    <input class="form-control" value="<?php if(!empty($select_user->company_name)) { echo $select_user->company_name; } ?>" type="text" name="company_name" placeholder="Enter Company Name" required="">
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
			                					<div class="form-group">
			                					    <label for="pwd">Company Code:</label>
			                					    <input type="text" class="form-control" value="<?php if(!empty($select_user->company_code)) { echo $select_user->company_code; } ?>" name="company_code" placeholder="Enter Company Code" required="">
			                					</div>
			                				</div>
			                			</div>
			                			<?php if(!empty($select_user->permission)) { $permission = explode(",",$select_user->permission); } 
                                 ?>
			                			<div class="row mt-3 permission_raduo_btn_row">
			                				<div class="col-xl-12">
			                					<h3 class="coman_design_block_small_title">Permission :-</h3>
			                				</div>
			                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
			                					<div class="radio_box_block">
			                						<label class="radio_btn_top_title">Dashboard :</label>
			                						<?php  foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Dashboard") {
                                     						$p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     						if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 					?>
			                						<div class="form-group">
			                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?> </label>
			                							<span>
			                								<div class="form-check form-check-inline">
			                									<label><input type="radio"  name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
			                								</div>
			                								<div class="form-check form-check-inline">
			                									<label><input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
			                								</div>
			                							</span>
			                						</div>
			                					<?php } } ?>
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
			                					<div class="radio_box_block">
			                						<label class="radio_btn_top_title">Settings :</label>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Settings") {
                                     					$p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     					if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 					?>
			                						<div class="form-group">
			                							<label class="radio_btn_title"> <?php echo $val->permission_name;  ?> </label>
			                							<span>
			                								<div class="form-check form-check-inline">
			                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
			                								</div>
			                								<div class="form-check form-check-inline">
			                									<label><input type="radio" <?php if($flag==0) { echo "checked"; } ?> name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
			                								</div>
			                							</span>
			                						</div>
			                					<?php } } ?>
			                						
			                						
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
			                					<div class="radio_box_block">
			                						<label class="radio_btn_top_title">Enquiry :</label>
			                						 <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Leads") {
                                    					   $p_name = preg_replace('/\s+/', '', $val->permission_name);
                                     					if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 					?>
				                						<div class="form-group">
				                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
				                							<span>
				                								<div class="form-check form-check-inline">
				                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
				                								</div>
				                								<div class="form-check form-check-inline">
				                									<label><input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
				                								</div>
				                							</span>
				                						</div>
				                						<?php } } ?>
				                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="New Enquiry") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
                                 						?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?> </label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" <?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
											            <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Enquiry List") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                						
			                							 <?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="PendingFollowup") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                							<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="OverdueFollowup") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
			                					<div class="radio_box_block">
			                						<label class="radio_btn_top_title">Demo :</label>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Demo") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
			                					<div class="radio_box_block">
			                						<label class="radio_btn_top_title">Course Details :</label>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Course Details") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
			                					<div class="radio_box_block">
			                						<label class="radio_btn_top_title">Form :</label>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Form") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
			                					<div class="radio_box_block">
			                						<label class="radio_btn_top_title">Analysis :</label>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Today Report") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Last 6 Months") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Current Month") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Faculty Wise performance") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Cancel Demo Reason wise") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
			                					<div class="radio_box_block">
			                						<label class="radio_btn_top_title">Property : </label>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Place Type") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Property Type") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Property List") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Add Complain") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="View All Complain") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="AddComplain New") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
			                					<div class="radio_box_block">
			                						<label class="radio_btn_top_title">Report :</label>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Demo Report") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
			                					<div class="radio_box_block">
			                						<label class="radio_btn_top_title">Job Application List :</label>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Job Application") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
			                					<div class="radio_box_block">
			                						<label class="radio_btn_top_title">FAQ :</label>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="FaqAdd") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="FaqView") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
			                					<div class="radio_box_block">
			                						<label class="radio_btn_top_title">Hardware :</label>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="HardwareForm") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="HardwareShow") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                					</div>
			                				</div>
			                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
			                					<div class="radio_box_block">
			                						<label class="radio_btn_top_title">Terms&conditions :</label>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="TcForm") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="TcShow") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                					</div>
			                				</div>

			                				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
			                					<div class="radio_box_block">
			                						<label class="radio_btn_top_title">Other :</label>
			                						<?php foreach($permission_all as $val) { $flag=0; if($val->permission_category=="Other") {
						                                     $p_name = preg_replace('/\s+/', '', $val->permission_name);
						                                     if(@in_array($val->permission_name."=1",$permission)) { $flag=1;  }
						                                ?>
					                						<div class="form-group">
					                							<label class="radio_btn_title"><?php echo $val->permission_name;  ?></label>
					                							<span>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio" name="<?php echo $p_name  ?>" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $val->permission_name;  ?>=1">Yes</label>
					                								</div>
					                								<div class="form-check form-check-inline">
					                									<label><input type="radio"<?php if($flag==0) { echo "checked"; } ?>  name="<?php echo $p_name  ?>" value="<?php echo $val->permission_name;  ?>=0">No</label>
					                								</div>
					                							</span>
					                						</div>
					                					<?php } } ?>
			                						
			                					</div>
			                				</div>
			                				<div class="col-xl-12 text-center">
			                					<input type="submit" name="submit" class="btn btn-primary" value="Save">
			                				</div>
			                			</div>
			                		</form>
			                	</div>
			                </div>
			            </div>
                        <div class="card">
                            <div class="card-header mb-0">
                                <h2 class="mb-0">
            						<button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_2" aria-expanded="false">
            							Display User<span class="d-inline-block float-right pluse_icon">✕</span>
            						</button>
            					</h2>
                            </div>
                            <div id="student_filter_panel_2" class="collapse" data-parent="#student_list_aoc" style="">
                            	<div class="coman_design_block_box">
                            		<div class="coman_design_block_title d-inline-block w-100 border-bottom">
                            			<h4 class="d-inline-block align-middle">Display User</h4>
                            		</div>
                            		<div class="table_search_panel d-inline-block w-100">
                            			<div class="col-xl-4 mx-auto">
                            				<div class="btn-group w-100">
                            					<input type="text" name="" placeholder="Search Here" class="form-control">
                            					<button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            				</div>
                            			</div>
                            		</div>
                            		<div class="coman_design_block_info">
                            			<div class="row">
                            				<div class="col-xl-12">
                            					<div class="table-responsive">
                            						<table class="display table table-bordered table-striped create_responsive_table" id="example" style="width:100%">
                            						<thead>
                            							<tr class="thead">
                            								<th>Logtype</th>
                            								<th>Name</th>
                            								<th>State</th>
                            								<th>City</th>
                            								<th>Satus</th>
                            								<th>Last Seen</th>
                            								<th>Action</th>
                            							</tr>
                            						</thead>
                            						<tbody>
                            							 <?php foreach($user_all as $val) { ?>
	                            							<tr>
	                            								<td data-heading="Logtype"><?php echo $val->logtype; ?></td>
	                            								<td data-heading="Name">
	                            									<ul>
	                            										<li>Name : <?php echo $val->name; ?></li>
	                            										<li>Email : <?php echo $val->email; ?></li>
	                            										<li>company Name : <?php echo $val->company_name; ?></li>
	                            										<li>company Code : <?php echo $val->company_code; ?>	</li>
	                            									</ul>
	                            								</td>
	                            								<td data-heading="State">
	                            									<?php $state_id = explode(",",$val->state_id);
                        												foreach($state_all as $row) 
                        													{ 
                        														if(in_array($row->state_id,$state_id)) 
                        														{  
                        															echo $row->state_name."<br>"; 
                        														}  
                        													} 
                        											?>
                        										</td>
	                            								<td data-heading="City">
	                            									<?php $city_id = explode(",",$val->city_id);
                          												foreach($city_all as $row) 
                          												{ 
                          													if(in_array($row->city_id,$city_id)) 
                          													{  
                          														echo $row->city_name."<br>"; 
                          													}  
                          												}
                          											?>
	                            								</td>
	                            								<td data-heading="Satus">
	                            									<span class="text-active">
	                            										<?php if($val->user_status=="0") 
	                            										{ 
	                            											echo "Active"; 
	                            										} 
	                            										if($val->user_status=="1") 
	                            										{ 
	                            											echo  "Disable"; 
	                            										} 
	                            										?> 
	                            									</span>
	                            								</td>
	                            								<td data-heading="Last Seen"><?php echo $val->timestamp; ?></td>
	                            								<td data-heading="Action">
	                            									<ul class="action_icon_block">
	                            										<li>
	                            											<a href="<?php echo base_url(); ?>settings/admin?action=edit&id=<?php echo @$val->user_id; ?>" class="action_icon action_edit" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
	                            										</li>
	                            										<li>
	                            											<a href="#" class="action_icon action_delete" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
	                            										</li>
	                            										<li>
	                            											<a href="#" class="action_icon action_disable" data-toggle="tooltip" title="Disable"><i class="fas fa-ban"></i></a>
	                            										</li>
	                            									</ul>
	                            								</td>
	                            							</tr>
                            							<?php } ?>
                            						</tbody>
                            						</table>
                            					</div>
                            				</div>
                            			</div>
                            			<div class="row">
                            				<div class="col-xl-12 text-center">
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
                            </div>
                        </div>
			        </div>
			    </div>
			</div>
		</div>
	</section>
</main>
<div class="modal fade" id="logtype_create">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <from class="modal-content shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title">Logtype</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Log Type:</label>
                  	<div class="btn-group w-100">
                  		<input type="text" name="" class="form-control" placeholder="Enter Log Type">
                  		<button type="button" class="btn btn-primary">Save</button>
                  	</div>
                </div>
                <div class="table-responsive">
                	<table class="table table-striped create_responsive_table table-bordered"> 
                		<tr class="thead">
                			<th>Logtype	</th>
                			<th>Status</th>
                			<th>Action</th>
                		</tr>
                		<tr>
                			<td data-heading="Logtype">Admin</td>
                			<td data-heading="Status" class="text-active">Active</td>
                			<td data-heading="Action">
                				<ul class="action_icon_block">
									<li>
										<a href="#" class="action_icon action_edit" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
									</li>
									<li>
										<a href="#" class="action_icon action_delete" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
									</li>
									<li>
										<a href="#" class="action_icon action_disable" data-toggle="tooltip" title="Disable"><i class="fas fa-ban"></i></a>
									</li>
								</ul>
                			</td>
                		</tr>
                		<tr>
                			<td data-heading="Logtype">Admin</td>
                			<td data-heading="Status" class="text-active">Active</td>
                			<td data-heading="Action">
                				<ul class="action_icon_block">
									<li>
										<a href="#" class="action_icon action_edit" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
									</li>
									<li>
										<a href="#" class="action_icon action_delete" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
									</li>
									<li>
										<a href="#" class="action_icon action_disable" data-toggle="tooltip" title="Disable"><i class="fas fa-ban"></i></a>
									</li>
								</ul>
                			</td>
                		</tr>
                		<tr>
                			<td data-heading="Logtype">Admin</td>
                			<td data-heading="Status" class="text-active">Active</td>
                			<td data-heading="Action">
                				<ul class="action_icon_block">
									<li>
										<a href="#" class="action_icon action_edit" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
									</li>
									<li>
										<a href="#" class="action_icon action_delete" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
									</li>
									<li>
										<a href="#" class="action_icon action_disable" data-toggle="tooltip" title="Disable"><i class="fas fa-ban"></i></a>
									</li>
								</ul>
                			</td>
                		</tr>
                	</table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </from>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js "></script>

<script>
  $(document).ready(function(){
 $('#state_id').change(function(){
 
  var s = $('#state_id').val();
 // alert(s);
  if(s !='')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>settings/fetch_cities",
    method:"POST",
    data:{s_id:s},
    success:function(data)
    {
     $('#city_id').html(data);
     // $('#city').html('<option value="">Select City</option>');
    }
   });
  }
  else
  {
   $('#getfaculty').html('<option value="">Select Faculty</option>');
   // $('#city').html('<option value="">Select City</option>');
  }

 });
});
</script>
