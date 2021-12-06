<div id="accordion">
   <div class="accordion">
      <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1"
         aria-expanded="true">
         <h4 class="text-primary">History<i class="fa fa-plus" style="font-size: 10px;float:right;"></i></h4>
      </div>
      <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
         <?php foreach($history_all as $val) { ?>
            <span><b>Update Date :</b> <?php date_default_timezone_set("Asia/Calcutta"); echo date('d-M-Y ',strtotime($val->remarks_date)).$val->remarks_time; ?></span>
            <?php if($val->labels=="") { ?>
               <span><b>label : </b><a class="text-danger">
               <?php $branch_ids = explode(",",$val->dropdown_adm_id);
                        foreach($adm_satus_all as $row) { if(in_array($row->d_adm_id,$branch_ids)) {  echo $row->name; }  } ?>
               </a></span>
            <?php } else { ?>
            <span><b>Label : </b><a class="text-danger"><?php echo $val->labels; ?></a></span>
         <?php } ?>
         <?php if($val->labels=="Branch Transfer") { ?>
            <span><b>Branch : </b><a class="text-danger">
               <?php $branch_ids = explode(",",$val->branch_id);
                        foreach($list_branch as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo $row->branch_name; }  } ?>
               </a></span>
         <?php } ?>
         <?php if($val->labels=="Without Fees Modification Course") { ?>
            <span><b>Course : </b><a class="text-danger">
               <?php $coursesid = explode(",",$val->old_course_id);
                        foreach($list_course as $row) { if(in_array($row->course_id,$coursesid)) {  echo "Single - ".$row->course_name; }  } ?>
               <?php $packageid = explode(",",$val->old_package_id);
                  foreach($list_package as $row) { if(in_array($row->package_id,$packageid)) {  echo "Package - ".$row->package_name; }  } ?>
               </a></span>
         <?php } ?>
         <span><b>By : </b><a class="text-danger"><?php echo $val->addby; ?></a></span>
         <hr>
         <?php } ?>
         <?php foreach($history_basic_details as $h) { ?>
         <span><b>Update Date :</b> <?php date_default_timezone_set("Asia/Calcutta"); echo date('d-M-Y ,h:i A',strtotime($h->admission_upd_date)); ?></span>
         <?php $na = explode('&#',$h->first_name); if($na[1]=='nochange') {  ?>
            <?php } else { ?>
         <span><b>First Name : </b><a class="text-danger"><?php echo $na[0]; ?></a></span> 
         <?php } ?>
         <?php $na = explode('&#',$h->surname); if($na[1]=='nochange') {  ?>
            <?php } else { ?>
         <span><b>Last Name : </b><a class="text-danger"><?php echo $na[0]; ?></a></span>
         <?php } ?>
         <?php $na = explode('&#',$h->email); if($na[1]=='nochange') {  ?>
            <?php } else { ?>
         <span><b>Email : </b><a class="text-danger"><?php echo $na[0]; ?></a></span>
         <?php } ?>
         <?php $na = explode('&#',$h->mobile_no); if($na[1]=='nochange') {  ?>
            <?php } else { ?>
         <span><b>MobileNo : </b><a class="text-danger"><?php echo $na[0]; ?></a></span>
         <?php } ?>
         <?php } ?>
      </div>
   </div>
   <!-- <div class="accordion">
      <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">
      <h4 class="text-primary"> Admission Detail <i class="fa fa-plus" style="font-size: 10px;float:right;"></i></h4>
      </div>
      <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
         <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
         </p>
      </div>
   </div>
   <div class="accordion">
      <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-3">
      <h4 class="text-primary"> Admission Detail <i class="fa fa-plus" style="font-size: 10px;float:right;"></i></h4>
      </div>
      <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
         <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
         </p>
      </div>
   </div> -->
</div>