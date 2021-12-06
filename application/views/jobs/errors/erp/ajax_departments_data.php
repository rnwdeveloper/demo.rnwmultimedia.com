														 <option value="">Select Department</option>
														<?php for($i=0;$i<sizeof($department_filter); $i++) { ?>
															<option value="<?php echo $department_filter[$i]->department_id; ?>"><?php echo $department_filter[$i]->department_name; ?></option>
														<?php } ?>