<?php foreach($history as $h) { ?>
<p><span style="color:gray">Update Date:</span>
     
	<span style='color:black'><b><?php echo $h->batch_upd_date; ?></b></span>
    
	
</p>

<p><span style="color:gray">BatchName:</span>
		<?php 
		 $na = explode('&#',$h->batch_name); 
	     if($na[1]=='nochange') {  ?>
	     	<span style='color:black'><b><?php echo $na[0]; ?></b></span>
	     <?php } else { ?>
	     	<span style='color:red'><?php echo $na[0]; ?></span>
		<?php } ?>
</p>

<p><span style="color:gray">BatchCode:</span>
		<?php 
		 $na = explode('&#',$h->batch_code); 
	     if($na[1]=='nochange') {  ?>
	     	<span style='color:black'><b><?php echo $na[0]; ?></b></span>
	     <?php } else { ?>
	     	<span style='color:red'><?php echo $na[0]; ?></span>
		<?php } ?>
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
<p><span style="color:gray">UpdatedBy:</span>
		<?php 
		 $na = explode('&#',$h->created_bye); 
	     if($na[1]=='nochange') {  ?>
	     	<span style='color:black'><b><?php echo $na[0]; ?></b></span>
	     <?php } else { ?>
	     	<span style='color:red'><?php echo $na[0]; ?></span>
		<?php } ?>
</p>
<hr>
<?php } ?>