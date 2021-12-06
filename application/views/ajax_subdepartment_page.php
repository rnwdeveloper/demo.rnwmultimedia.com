										
										<option value="">Select SubDepartment</option>
										 <?php  foreach($subdepartment_all as $ld) { ?>
							        	   <?php for($i=0; $i<sizeof($filter_subdepartment);$i++) {  if($filter_subdepartment[$i]==$ld->subdepartment_id) { ?>
												<option value="<?php echo $ld->subdepartment_id; ?>"><?php echo $ld->subdepartment_name;?></option>
											<?php } } } ?>
											 