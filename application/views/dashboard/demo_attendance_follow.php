

 <from class="modal-content shadow-lg">
 	
	      <div class="modal-header">
	        <h5 class="modal-title"><?php echo @$demo_record->name; ?></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="demo_student_attendance_details_block">
	      		<h3 class="demo_student_details_heading">Attendance Details</h3>
	      		<div class="table-responsive-sm">
	      		  <table class="table table-bordered table-striped create_responsive_table">
	      		    <tr class="thead">
	      		    	<th>Date</th>
	      		    	<th>Attendance</th>
	      		    	<th>Mark by	</th>
	      		    	<th>Time</th>
	      		    </tr>
	      		    <?php $record =  explode('&&',$demo_record->attendance); 
	      		    
	      		    for($i=0;$i<sizeof($record); $i++)
	      		    {
	      		    	$atte_follow =  explode('/',$record[$i]); ?>
		      		    <tr>
		      		    	<td data-heading="Date"><?php echo $atte_follow[0]; ?></td>
		      		    	<td data-heading="Attendance"><?php echo $atte_follow[1]; ?></td>
		      		    	<td data-heading="Mark By"><?php echo $atte_follow[2]; ?></td>
		      		    	<td data-heading="Time"><?php echo $atte_follow[3]; ?></td>
		      		    </tr>
		      		<?php } ?>
	      		  </table>
	      		</div>
	      	</div>
	      	<div class="demo_student_attendance_details_block">
	      		<h3 class="demo_student_details_heading">Follow Up Details</h3>
	      		<div class="table-responsive-sm">
	      		  <table class="table table-bordered table-striped create_responsive_table">
	      		    <tr class="thead">
	      		    	<th>Date</th>
	      		    	<th>Follow Up</th>
	      		    	<th>By</th>
	      		    	<th>Time</th>
	      		    </tr>
	      		    <?php $reason =  explode('&&',$demo_record->reason);
	      		    for($i=0;$i<sizeof($reason); $i++) { 
	      		    	$re =  explode('|/|',$reason[$i]); ?>
	      		    <tr>
	      		    	<td data-heading="Date"><?php echo @$re[0]; ?></td>
	      		    	<td data-heading="Follow Up"><?php echo @$re[1]; ?></td>
	      		    	<td data-heading="By"><?php echo @$re[2]; ?></td>
	      		    	<td data-heading="Time"><?php echo @$re[3]; ?></td>
	      		    </tr>
	      		    <?php } ?>
	      		  </table>
	      		</div>
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary">Save</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </from>