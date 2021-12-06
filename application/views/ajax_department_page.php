										
										<option value="">Select Department</option>
										 <?php  foreach($department_all as $ld) { ?>
							        	   <?php for($i=0; $i<sizeof($filter_department);$i++) {  if($filter_department[$i]==$ld->department_id) { ?>
												<option value="<?php echo $ld->department_id; ?>"><?php echo $ld->department_name;?></option>
											<?php } } } ?>
											 