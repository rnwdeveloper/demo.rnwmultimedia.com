<label>Select Package</label>
<select class="form-control" name="quick_package" id="quick_package" >
   <option value="">Select <?php echo $course; ?></option>
   <?php foreach($list_course as $lp) { ?>
   <option value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>
   <?php } ?>
</select>