<?php



?>
                          			<option value="">Select Package</option>
										<?php if(!empty($all_course_package)) {
												foreach($all_course_package as $k=>$v) { ?>
												
												<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
											<?php } }  ?>
									