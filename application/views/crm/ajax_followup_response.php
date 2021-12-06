<!-- WALK -->
<?php 
   $i=0;
   foreach($lead_followup_res as $lfr) {  if($lfr->type == 'email' || $lfr->type == 'SMS') { ?>
<div class="card card-primary mx-2 shadow-sm p-2">
   <div class="status-walk justify-content-between d-flex mb-2 align-items-center">
      <a href="#" class="bg-warning action-icon text-white btn-warning" ><i class="fa fa-bell"></i></a>
      <div>
         <h6 class="text-dark text-center mb-0">Schedule Walk</h6>
         <p class="text-center mb-0">
         <?php 	$next_act=  $lfr->timing_sender;
            echo date('M',strtotime($next_act))."  ".date('d',strtotime($next_act)).",  ".date('Y',strtotime($next_act))." ".date('H:i A',strtotime($next_act));
         ?>
         </p>
         <?php @$username =  explode(' ',$lfr->user_role); ?>
         <p class="text-center mb-0"><?php echo @substr($username[0],0,1)."".@substr($username[1],0,1); ?></p>
      </div>
      <a href="#" class="bg-primary action-icon text-white btn-primary" >HD</a>
   </div>
   <div class="border-top">
      <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipi.</p>
   </div>
</div>
<?php } else if($lfr->type == 'Followup'){ ?>
<div class="card card-primary mx-2 shadow-sm p-2">
   <div class="status-walk justify-content-between d-flex mb-2 align-items-center">
      <a href="#" class="bg-warning action-icon text-white btn-warning" ><i class="fas fa-sms"></i></a>
      <div>
         <h6 class="text-dark text-center mb-0">SMS</h6>
         <p class="text-center mb-0">
         <?php 	$next_act=  $lfr->timing_sender;
         echo date('M',strtotime($next_act))."  ".date('d',strtotime($next_act)).",  ".date('Y',strtotime($next_act))." ".date('H:i A',strtotime($next_act)); 
          ?>	
         </p>
      </div>
      <?php @$username =  explode(' ',$lfr->user_role); ?>
      <a href="#" class="bg-primary action-icon text-white btn-primary" ><?php echo @substr($username[0],0,1)."".@substr($username[1],0,1); ?></a>
   </div>
   <div class="border-top text-center pt-1">
      <a href="#" class="bg-primary action-icon text-white btn-primary" ><i class="fa fa-eye"></i></a>
   </div>
</div>
<?php } else { ?>
<div class="card card-primary mx-2 shadow-sm p-2">
   <div class="status-walk justify-content-between d-flex mb-2 align-items-center">
      <a href="#" class="bg-warning action-icon text-white btn-warning" ><i class="fa fa-phone"></i></a>
      <div>
         <h6 class="text-dark text-center mb-0">Outgoing</h6>
         <p class="text-center mb-0">Aug 28, 2021 11:22 AM</p>
      </div>
      <a href="#" class="bg-primary action-icon text-white btn-primary" >HD</a>
   </div>
   <div class="border-top text-center pt-2">
      <!-- <a href="#" class="bg-primary action-icon text-white btn-primary" ><i class="fa fa-eye"></i></a> -->
      <audio controls style="width:100%;">
         <source src="https://demo.rnwmultimedia.com/LeadlistApi/audio/75777Recording8401079900-17-Jun-2021-12-25-56.mp3" type="audio/mp3"></source>
      </audio>
   </div>
</div>
<?php } $i++; } ?>
<!-- WALK -->
<!-- WALK -->
<!-- <div class="card card-primary mx-2 shadow-sm p-2">
   <div class="status-walk justify-content-between d-flex mb-2 align-items-center">
      <a href="#" class="bg-warning action-icon text-white btn-warning" ><i class="fa fa-bell"></i></a>
      <div>
         <h6 class="text-dark text-center mb-0">Schedule Walk</h6>
         <p class="text-center mb-0">Aug 28, 2021 11:22 AM</p>
         <p class="text-center mb-0">Hitesh Desai</p>
      </div>
      <a href="#" class="bg-primary action-icon text-white btn-primary" >HD</a>
   </div>
   <div class="border-top">
      <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipi.</p>
   </div>  
   </div>
   
   <div class="card card-primary mx-2 shadow-sm p-2">
   <div class="status-walk justify-content-between d-flex mb-2 align-items-center">
      <a href="#" class="bg-warning action-icon text-white btn-warning" ><i class="fa fa-bell"></i></a>
      <div>
         <h6 class="text-dark text-center mb-0">Schedule Walk</h6>
         <p class="text-center mb-0">Aug 28, 2021 11:22 AM</p>
      </div>
      <a href="#" class="bg-primary action-icon text-white btn-primary" >HD</a>
   </div>
   <div class="border-top">
      <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipi.</p>
   </div> 
   </div>
   
   <div class="card card-primary mx-2 shadow-sm p-2">
   <div class="status-walk justify-content-between d-flex mb-2 align-items-center">
      <a href="#" class="bg-warning action-icon text-white btn-warning" ><i class="fas fa-sms"></i></a>
      <div>
         <h6 class="text-dark text-center mb-0">SMS</h6>
         <p class="text-center mb-0">Aug 28, 2021 11:22 AM</p>
      </div>
      <a href="#" class="bg-primary action-icon text-white btn-primary" >HD</a>
   </div>
   <div class="border-top text-center pt-1">
      <a href="#" class="bg-primary action-icon text-white btn-primary" ><i class="fa fa-eye"></i></a>
   </div> 
   </div>
   
   <div class="card card-primary mx-2 shadow-sm p-2">
   <div class="status-walk justify-content-between d-flex mb-2 align-items-center">
      <a href="#" class="bg-warning action-icon text-white btn-warning" ><i class="fa fa-phone"></i></a>
      <div>
         <h6 class="text-dark text-center mb-0">SMS</h6>
         <p class="text-center mb-0">Aug 28, 2021 11:22 AM</p>
      </div>
      <a href="#" class="bg-primary action-icon text-white btn-primary" >HD</a>
   </div>
   <div class="border-top text-center pt-2">
      <audio controls style="width:100%;">
         <source src="https://demo.rnwmultimedia.com/LeadlistApi/audio/75777Recording8401079900-17-Jun-2021-12-25-56.mp3" type="audio/mp3"></source>
      </audio>
   </div>
   
   </div>  -->
<!-- WALK -->