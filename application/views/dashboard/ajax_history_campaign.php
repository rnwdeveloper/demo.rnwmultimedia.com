<?php foreach($history as $h) { ?>
<p><span style="color:gray">Update Date:</span>
     
	<span style='color:black'><b><?php echo $h->campaign_upd_date; ?></b></span>
    
	
</p>

<p><span style="color:gray">Campaign Name:</span>
		<?php 
		 $na = explode('&#',$h->campaign_name); 
	     if($na[1]=='nochange') {  ?>
	     	<span style='color:black'><b><?php echo $na[0]; ?></b></span>
	     <?php } else { ?>
	     	<span style='color:red'><?php echo $na[0]; ?></span>
		<?php } ?>
</p>

<p><span style="color:gray">Course:</span>
		<?php 
		 $br = explode('&#',$h->course_id); 
	     if($br[1]=='nochange') {  ?>
	     	<span style='color:black'><b>
	     		<?php foreach($course_all as $lb) { 
	     				if($lb->course_id == $br[0])
	     				{ 
	     					echo $lb->course_name; 
	     				} 
	     			} 
	     		?></b></span>
	     <?php } else { ?>
	     	<span style='color:red'>
	     		<?php foreach($course_all as $lb) { 
	     				if($lb->course_id == $br[0])
	     				{ 
	     					echo $lb->course_name; 
	     				} 
	     			} 
	     		?>
	     	</span>
		<?php } ?>
</p>

<p><span style="color:gray">Branch:</span>
		<?php 
		 $br = explode('&#',$h->branch_id); 
	     if($br[1]=='nochange') {  ?>
	     	<span style='color:black'><b>
	     		<?php foreach($branch_all as $lb) { 
	     				if($lb->branch_id == $br[0])
	     				{ 
	     					echo $lb->branch_name; 
	     				} 
	     			} 
	     		?></b></span>
	     <?php } else { ?>
	     	<span style='color:red'>
	     		<?php foreach($branch_all as $lb) { 
	     				if($lb->branch_id == $br[0])
	     				{ 
	     					echo $lb->branch_name; 
	     				} 
	     			} 
	     		?>
	     	</span>
		<?php } ?>
</p>

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

<p><span style="color:gray">Campaign:</span>
		<?php 
		 $br = explode('&#',$h->campaign); 
	     if($br[1]=='nochange') {  ?>
	     	<span style='color:black'><b>
	     		<?php foreach($branch_all as $lb) { 
	     				if($lb->branch_id == $br[0])
	     				{ 
	     					echo $lb->branch_code; 
	     				} 
	     			} 
	     		?></b></span>
	     <?php } else { ?>
	     	<span style='color:red'>
	     		<?php foreach($branch_all as $lb) { 
	     				if($lb->branch_id == $br[0])
	     				{ 
	     					echo $lb->branch_code; 
	     				} 
	     			} 
	     		?>
	     	</span>
		<?php } ?>
</p>

<p><span style="color:gray">Counselor:</span>
		<?php 
		 $br = explode('&#',$h->counselor_id); 
	     if($br[1]=='nochange') {  ?>
	     	<span style='color:black'><b>
	     		<?php foreach($counselor_all as $lb) { 
	     				if($lb->user_id == $br[0])
	     				{ 
	     					echo $lb->name; 
	     				} 
	     			} 
	     		?></b></span>
	     <?php } else { ?>
	     	<span style='color:red'>
	     		<?php foreach($counselor_all as $lb) { 
	     				if($lb->user_id == $br[0])
	     				{ 
	     					echo $lb->name; 
	     				} 
	     			} 
	     		?>
	     	</span>
		<?php } ?>
</p>

<p><span style="color:gray">No Of Seet Limit:</span>
		<?php 
		 $na = explode('&#',$h->no_of_seet_limit); 
	     if($na[1]=='nochange') {  ?>
	     	<span style='color:black'><b><?php echo $na[0]; ?></b></span>
	     <?php } else { ?>
	     	<span style='color:red'><?php echo $na[0]; ?></span>
		<?php } ?>
</p>

<p><span style="color:gray">Start Date:</span>
		<?php 
		 $na = explode('&#',$h->start_date); 
	     if($na[1]=='nochange') {  ?>
	     	<span style='color:black'><b><?php echo $na[0]; ?></b></span>
	     <?php } else { ?>
	     	<span style='color:red'><?php echo $na[0]; ?></span>
		<?php } ?>
</p>

<p><span style="color:gray">End Date:</span>
		<?php 
		 $na = explode('&#',$h->end_date); 
	     if($na[1]=='nochange') {  ?>
	     	<span style='color:black'><b><?php echo $na[0]; ?></b></span>
	     <?php } else { ?>
	     	<span style='color:red'><?php echo $na[0]; ?></span>
		<?php } ?>
</p>

<p><span style="color:gray">Status:</span>
		<?php 
		 $na = explode('&#',$h->status); 
	     if($na[1]=='nochange') {  ?>
	     	<span style='color:black'><b><?php echo $na[0]; ?></b></span>
	     <?php } else { ?>
	     	<span style='color:red'><?php echo $na[0]; ?></span>
		<?php } ?>
</p>

<p><span style="color:gray">Remarks:</span>
		<?php 
		 $na = explode('&#',$h->remarks); 
	     if($na[1]=='nochange') {  ?>
	     	<span style='color:black'><b><?php echo $na[0]; ?></b></span>
	     <?php } else { ?>
	     	<span style='color:red'><?php echo $na[0]; ?></span>
		<?php } ?>
</p>

<hr>
<?php } ?>