<label>Branch</label>
										<select class="form-control" name="branch_name" id="branch_id">
											<option value="">Select branch</option>
											<?php foreach($list_branch as $ld) { ?>
												<option value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_id; ?></option>
											<?php } ?>
											
										</select>