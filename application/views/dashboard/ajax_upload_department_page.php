<label>Department</label>
										<select class="form-control" name="upload_department" id="upload_department">
											<!-- <option value="">Select Department</option> -->
											<option value="Not Known">Not Known</option>
											<?php foreach($list_department as $ld) { ?>
												<option value="<?php echo $ld->department_id; ?>"><?php echo $ld->department_name; ?></option>
											<?php } ?>
											
										</select>