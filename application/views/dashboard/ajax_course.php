<label>Select Course<span style="color:red">*</span></label>
										<select class="form-control" name="course_or_package2" id="course_orsingle" >
											<option value="">Select Course</option>
											<?php foreach($list_course as $lp) { ?>
												<option value="<?php echo $lp->course_id; ?>"><?php echo $lp->course_name; ?></option>
											<?php } ?>
											
											
										</select>