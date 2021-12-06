<label>Department:</label>
							        	<select class="select2 form-control custom-form-control" name="department_id[]" id="department" multiple="multiple">
							            <option value="">Select Department</option>
														 <?php foreach($list_department as $ld) { ?>
															<option value="<?php echo $ld->department_id; ?>"><?php echo $ld->department_name; ?></option>
														<?php } ?>
							        </select>