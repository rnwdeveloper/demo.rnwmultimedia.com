<option value="">Select Package</option>
										<?php if(!empty($all_faculty)) {
												foreach($all_faculty as $k=>$v) { ?>
												
												<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
											<?php } }  ?>