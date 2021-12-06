<?php foreach($history_basic_details as $h) { ?>
<p><span style="color:gray">Update Date:</span>
   <span style='color:black'><b><?php echo $h->admission_upd_date; ?></b></span>
</p>
<p><span style="color:gray">Surname:</span>
   <?php 
      $na = explode('&#',$h->surname); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">First Name:</span>
   <?php 
      $na = explode('&#',$h->first_name); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Email:</span>
   <?php 
      $na = explode('&#',$h->email); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">MobileNo:</span>
   <?php 
      $na = explode('&#',$h->mobile_no); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<hr>
<?php } ?>	
<?php foreach($history_cp as $h) { ?>
<p><span style="color:gray">Update Date:</span>
   <span style='color:black'><b><?php echo $h->admission_upd_date; ?></b></span>
</p>
<p><span style="color:gray">Branch:</span>
   <?php 
      $br = explode('&#',$h->branch_id); 
      
         if($br[1]=='nochange') {  ?>
   <span style='color:black'><b>
   <?php foreach($list_branch as $lb) { 
      if($lb->branch_id == $br[0])
      
      { 
      
      	echo $lb->branch_name; 
      
      } 
      
      } 
      
      ?></b></span>
   <?php } else { ?>
   <span style='color:red'>
   <?php foreach($list_branch as $lb) { 
      if($lb->branch_id == $br[0])
      
      { 
      
      	echo $lb->branch_name; 
      
      } 
      
      } 
      
      ?>
   </span>
   <?php } ?>
</p>
<p><span style="color:gray">Year:</span>
   <?php 
      $na = explode('&#',$h->year); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Department:</span>
   <?php 
      $br = explode('&#',$h->department_id); 
      
         if($br[1]=='nochange') {  ?>
   <span style='color:black'><b>
   <?php foreach($list_department as $lb) { 
      if($lb->department_id == $br[0])
      
      { 
      
      	echo $lb->department_name; 
      
      } 
      
      } 
      
      ?></b></span>
   <?php } else { ?>
   <span style='color:red'>
   <?php foreach($list_department as $lb) { 
      if($lb->department_id == $br[0])
      
      { 
      
      	echo $lb->department_name; 
      
      } 
      
      } 
      
      ?>
   </span>
   <?php } ?>
</p>
<p><span style="color:gray">Type:</span>
   <?php 
      $na = explode('&#',$h->type); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<?php if($h->type=="single") { ?>
<p><span style="color:gray">Couse:</span>
   <?php 
      $br = explode('&#',$h->course_id); 
      
         if($br[1]=='nochange') {  ?>
   <span style='color:black'><b>
   <?php foreach($list_course as $lb) { 
      if($lb->course_id == $br[0])
      
      { 
      
      	echo $lb->course_name; 
      
      } 
      
      } 
      
      ?></b></span>
   <?php } else { ?>
   <span style='color:red'>
   <?php foreach($list_course as $lb) { 
      if($lb->course_id == $br[0])
      
      { 
      
      	echo $lb->course_name; 
      
      } 
      
      } 
      
      ?>
   </span>
   <?php } ?>
</p>
<?php } else { ?>
<p><span style="color:gray">Package:</span>
   <?php 
      $br = explode('&#',$h->package_id); 
      
         if($br[1]=='nochange') {  ?>
   <span style='color:black'><b>
   <?php foreach($list_package as $lb) { 
      if($lb->package_id == $br[0])
      
      { 
      
      	echo $lb->package_name; 
      
      } 
      
      } 
      
      ?></b></span>
   <?php } else { ?>
   <span style='color:red'>
   <?php foreach($list_package as $lb) { 
      if($lb->package_id == $br[0])
      
      { 
      
      	echo $lb->package_name; 
      
      } 
      
      } 
      
      ?>
   </span>
   <?php } ?>
</p>
<?php } ?>
<p><span style="color:gray">Faculty:</span>
   <?php 
      $br = explode('&#',$h->faculty_id); 
      
         if($br[1]=='nochange') {  ?>
   <span style='color:black'><b>
   <?php foreach($faculty_all as $lb) { 
      if($lb->faculty_id == $br[0])
      
      { 
      
      	echo $lb->name; 
      
      } 
      
      } 
      
      ?></b></span>
   <?php } else { ?>
   <span style='color:red'>
   <?php foreach($faculty_all as $lb) { 
      if($lb->faculty_id == $br[0])
      
      { 
      
      	echo $lb->name; 
      
      } 
      
      } 
      
      ?>
   </span>
   <?php } ?>
</p>
<p><span style="color:gray">Batch:</span>
   <?php 
      $br = explode('&#',$h->batch_id); 
      
         if($br[1]=='nochange') {  ?>
   <span style='color:black'><b>
   <?php foreach($list_batch as $lb) { 
      if($lb->batch_id == $br[0])
      
      { 
      
      	echo $lb->batch_name; 
      
      } 
      
      } 
      
      ?></b></span>
   <?php } else { ?>
   <span style='color:red'>
   <?php foreach($list_batch as $lb) { 
      if($lb->batch_id == $br[0])
      
      { 
      
      	echo $lb->batch_name; 
      
      } 
      
      } 
      
      ?>
   </span>
   <?php } ?>
</p>
<hr>
<?php } ?>
<?php foreach($history as $h) { ?>
<p><span style="color:gray">Update Date:</span>
   <span style='color:black'><b><?php echo $h->admission_upd_date; ?></b></span>   
</p>
<p><span style="color:gray">Country:</span>
   <?php 
      $na = explode('&#',$h->country_id); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">State:</span>
   <?php 
      $na = explode('&#',$h->state_id); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">City:</span>
   <?php 
      $na = explode('&#',$h->city_id); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Area:</span>
   <?php 
      $br = explode('&#',$h->area_id); 
      
         if($br[1]=='nochange') {  ?>
   <span style='color:black'><b>
   <?php foreach($list_area as $lb) { 
      if($lb->area_id == $br[0])
      { 
      	echo $lb->area_name; 
      } 
      
      } 
      ?></b></span>
   <?php } else { ?>
   <span style='color:red'>
   <?php foreach($list_area as $lb) { 
      if($lb->area_id == $br[0])
      { 
      	echo $lb->area_name; 
      } 
      
      } 
      ?>
   </span>
   <?php } ?>
</p>
<p><span style="color:gray">PinCode:</span>
   <?php 
      $na = explode('&#',$h->pin_code); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">PresentAddress:</span>
   <?php 
      $na = explode('&#',$h->present_address); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">PermanentAddress:</span>
   <?php 
      $na = explode('&#',$h->permanent_address); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Father Name:</span>
   <?php 
      $na = explode('&#',$h->father_name); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Father Email:</span>
   <?php 
      $na = explode('&#',$h->father_email); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Father MobileNo:</span>
   <?php 
      $na = explode('&#',$h->father_mobile_no); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Father Occupation:</span>
   <?php 
      $na = explode('&#',$h->father_occupation); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Father Income:</span>
   <?php 
      $na = explode('&#',$h->father_income); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Mother Name:</span>
   <?php 
      $na = explode('&#',$h->mother_name); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Mother Email:</span>
   <?php 
      $na = explode('&#',$h->mother_email); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Mother MobileNo:</span>
   <?php 
      $na = explode('&#',$h->mother_mobile_no); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Mother Occupation:</span>
   <?php 
      $na = explode('&#',$h->mother_occupation); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Mother Income:</span>
   <?php 
      $na = explode('&#',$h->mother_income); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Send Email:</span>
   <?php 
      $na = explode('&#',$h->admission_msg_email); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Send Sms:</span>
   <?php 
      $na = explode('&#',$h->admission_msg_mobile); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">School/Collage Name:</span>
   <?php 
      $na = explode('&#',$h->school_collage_name); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
</p>
<hr>
<br>
<?php } ?>