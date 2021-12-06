<label>Select Package</label>
										<select class="form-control" name="course_or_package1" id="course_orpackage">
											<option value="">Select Package</option>
											<?php foreach($list_course as $lp) { ?>
												<option value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>
											<?php } ?>
										</select>