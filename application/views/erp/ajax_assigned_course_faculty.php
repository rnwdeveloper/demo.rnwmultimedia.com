<option value="">Select Package</option>
										<?php if(!empty($all_faculty_course_wise)) {
												foreach($all_faculty_course_wise as $k=>$v) { ?>
												
												<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
											<?php } }  ?>