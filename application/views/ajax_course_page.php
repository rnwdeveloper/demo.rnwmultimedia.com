										
										<option value="">Select course</option>
										 <?php  foreach($list_course as $ld) { ?>
							        	   <?php for($i=0; $i<sizeof($filter_course);$i++) {  if($filter_course[$i]==$ld->course_id) { ?>
												<option value="<?php echo $ld->course_id; ?>"><?php echo $ld->course_name;?></option>
											<?php } } } ?>
											 