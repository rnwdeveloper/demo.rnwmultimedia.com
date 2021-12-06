										
										<option value="">Select Package</option>
										 <?php  foreach($list_package as $ld) { ?>
							        	   <?php for($i=0; $i<sizeof($filter_package);$i++) {  if($filter_package[$i]==$ld->package_id) { ?>
												<option value="<?php echo $ld->package_id; ?>"><?php echo $ld->package_name;?></option>
											<?php } } } ?>
											 