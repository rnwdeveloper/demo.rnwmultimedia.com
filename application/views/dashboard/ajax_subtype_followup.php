<label>Sub -  Status</label>
										<select class="form-control" name="sub_status" id="sub_status">
											<option value="">Select Sub - Status</option>
											<?php foreach($list_substatus_followup as $lssf) { ?>
												<option value="<?php echo $lssf->sub_type_name; ?>"><?php echo $lssf->sub_type_name; ?></option>
											<?php } ?>
											
										</select>