<div id="accordion">
   <div class="accordion">
      <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1"
         aria-expanded="true">
         <h4 class="text-primary">History<i class="fa fa-plus" style="font-size: 10px;float:right;"></i></h4>
      </div>
      <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion">
      <?php foreach($history as $h) { ?>
         <span><b>Update Date :</b> <?php date_default_timezone_set("Asia/Calcutta"); echo date('d-M-Y ,h:i A',strtotime($h->batch_upd_date)); ?></span>
         <?php $na = explode('&#',$h->batch_name); if($na[1]=='nochange') {  ?>
            <?php } else { ?>
         <span><b>Batch Name : </b><a class="text-danger"><?php echo $na[0]; ?></a></span>
         <?php } ?>
         <?php $na = explode('&#',$h->batch_code); if($na[1]=='nochange') {  ?>
            <?php } else { ?>
         <span><b>Batch Code : </b><a class="text-danger"><?php echo $na[0]; ?></a></span>
         <?php } ?>
         <?php  $br = explode('&#',$h->branch_id); if($br[1]=='nochange') {  ?>
            <?php } else { ?>
         <span><b>Branch : </b><a class="text-danger">
         <?php foreach($list_branch as $lb) { 
	     				if($lb->branch_id == $br[0])
	     				{ 
	     					echo $lb->branch_name; 
	     				} 
	     			} 
	     		?>
         </a></span>
         <?php } ?>
         <?php $br = explode('&#',$h->faculty_id); if($br[1]=='nochange') {  ?>
            <?php } else { ?>
         <span><b>Faculty : </b><a class="text-danger">
         <?php foreach($faculty_all as $lb) { 
	     				if($lb->faculty_id == $br[0])
	     				{ 
	     					echo $lb->name; 
	     				} 
	     			} 
	     		?>
         </a></span>
         <?php } ?>
         <?php $br = explode('&#',$h->course_id); if($br[1]=='nochange') {  ?>
            <?php } else { ?>
         <span><b>Couse : </b><a class="text-danger">
         <?php foreach($list_course as $lb) { 
	     				if($lb->course_id == $br[0])
	     				{ 
	     					echo $lb->course_name; 
	     				} 
	     			} 
	     		?>
         </a></span>
         <?php } ?>
         <?php $na = explode('&#',$h->created_bye); if($na[1]=='nochange') {  ?>
            <?php } else { ?>
         <span><b>Updated By : </b><a class="text-danger"><?php echo $na[0]; ?></a></span>
         <?php } ?>
         <?php } ?>
      </div>
   </div>

</div>