
										<option value="">Select Package</option>
							        	   <?php for($i=0; $i<sizeof($filter_package);$i++) { ?>
												<option value="<?php echo $filter_package[$i];?>"><?php echo $filter_package[$i];?></option>
											<?php } ?>