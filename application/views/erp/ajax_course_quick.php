
<label>Select Course</label>
<select class="form-control" name="quick_package" id="course">
	<option value="">Select <?php echo $course; ?></option>
	<?php foreach($list_course as $lp) { ?>
		<option value="<?php echo $lp->course_id; ?>"><?php echo $lp->course_name; ?></option>
	<?php } ?>
	
	
</select>