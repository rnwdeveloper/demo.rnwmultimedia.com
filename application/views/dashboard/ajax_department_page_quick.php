<label>Department</label>
										<select class="form-control" name="quick_department_id" id="quick_department_id">
											<option value="">Select Department</option>
											<?php foreach($list_department as $ld) { ?>
												<option value="<?php echo $ld->department_id; ?>"><?php echo $ld->department_name; ?></option>
											<?php } ?>
											
										</select>