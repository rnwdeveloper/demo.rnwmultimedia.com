
                          			<option value="">Select Cours</option>
										<?php if(!empty($all_course)) {
												foreach($all_course as $c => $k) { ?>
												
												<option value="<?php echo $c; ?>"><?php echo $k; ?></option>
											<?php } } ?>
									