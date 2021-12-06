														 <option value="">Select Faculty</option>
														<?php for($i=0;$i<sizeof($get_faculty_filter); $i++) { ?>
															<option value="<?php echo $get_faculty_filter[$i]->faculty_id; ?>"><?php echo $get_faculty_filter[$i]->name; ?></option>
														<?php } ?>