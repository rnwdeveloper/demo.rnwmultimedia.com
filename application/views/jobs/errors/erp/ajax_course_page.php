
										<option value="">Select Course</option>
							        	   <?php for($i=0; $i<sizeof($filter_course);$i++) { ?>
												<option value="<?php echo $filter_course[$i];?>"><?php echo $filter_course[$i];?></option>
											<?php } ?>