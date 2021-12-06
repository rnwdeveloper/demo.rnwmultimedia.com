 <label>State:</label>
							        <select class="form-control custom-form-control" name="state_id" id="state_id">
									   <option value="">Select State</option>
														<?php foreach($list_state as $ld) { ?>
															<option value="<?php echo $ld->state_id; ?>"><?php echo $ld->state_name; ?></option>
														<?php } ?>	
									</select>