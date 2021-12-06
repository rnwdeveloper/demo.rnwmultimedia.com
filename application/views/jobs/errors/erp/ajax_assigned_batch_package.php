<option value="">Select Batch</option>
										<?php if(!empty($all_batchs)) {
												foreach($all_batchs as $k=>$v) { ?>
												
												<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
											<?php } }  ?>