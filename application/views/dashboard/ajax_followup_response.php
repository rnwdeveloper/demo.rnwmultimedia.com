<style type="text/css">
   .email_box{
   width: 85%;
   height: 70px;
   position: relative;
   margin:10px 5px 50px 40px;
   background-color: white;
   border-radius: 10px;
   /*margin:5px 0px 10px 0px;*/
   }
   #email_status{
   position: relative;
   }
   .mail_box_radius{
   height: 30px;
   width: 30px;
   border-radius: 50%;
   position: absolute;
   top:8px;
   left:2px;
   background-color: orange;
   }
   .mail_box_radius i{
   text-align: center;
   margin-left:7px;
   color:white;
   margin-top: 4px;
   }
   .time_eye{
   position: relative;
   padding:0px 1px 1px 1px;
   }
   .time_eye1{
   font-size: 16px;
   font-weight: bold;
   margin:20px 5px 5px 20px;
   color:black;
   }
   .fa-eye:before {
   content: "\f06e";
   color: black;
   }
   .time_eye p{
   font-size: 14px;
   margin:5px 5px 5px 20px;
   }
   .sender_name{
   height: 40px;
   width: 40px;
   border-radius: 50%;
   position: absolute;
   box-shadow: 2px 2px #888888;
   top:20px;
   left:170px;
   color:white;
   background-color: rgb(98,135,252);
   }
   .sender_name p{
   color:white;
   text-align: center;
   font-size: 18px;
   line-height: 40px;
   margin-left:3px;
   font-weight: bold;
   }
   .recepient_name{
   margin-top:-50px;
   text-align: right;
   color:black;
   }
</style>
<?php 
   $i=0;
   
   foreach($lead_followup_res as $lfr) { 
   
   	if($lfr->type == 'email' || $lfr->type == 'SMS') { ?>
<div id="email_status">
   <div class="email_box">
      <div class="time_eye">
         <h5 class="time_eye1"><?php echo $lfr->type; ?> <a href="#" onclick="return get_template_record_modal(<?php echo $lfr->l_f_h_id; ?>,<?php echo $i; ?>)" data-toggle="modal" data-target="#click_followup_remark_record"> <i class="fa fa-eye"></i></a></h5>
         <input type="hidden" name="lead_followup_type_name" value="<?php echo @$lfr->type; ?>" id="lead_followup_type_name<?php echo $i; ?>">
         <input type="hidden" name="lead_followup_type_subject" value="<?php echo @$lfr->subject; ?>" id="lead_followup_type_subject<?php echo $i; ?>">
         <p>
            <?php 	$next_act=  $lfr->timing_sender;
               echo date('M',strtotime($next_act))."  ".date('d',strtotime($next_act)).",  ".date('Y',strtotime($next_act))." ".date('H:i A',strtotime($next_act));
               
               ?>		
         </p>
      </div>
      <div class="sender_name">
         <?php @$username =  explode(' ',$lfr->user_role);
            ?>
         <p><?php echo @substr($username[0],0,1)."".@substr($username[1],0,1); ?></p>
      </div>
   </div>
   <div class="mail_box_radius">
      <?php if($lfr->type == 'email'){ ?>
      <i class="fa fa-envelope"></i>
      <?php }else if($lfr->type == 'SMS'){ ?>
      <i class="fas fa-sms"></i>
      <?php } ?>
   </div>
   <div class="recepient_name">
      <i class="fa fa-user"></i><span><?php echo substr($lfr->user_role,0,10)."...";?></span>
   </div>
</div>
<?php } else if($lfr->type == 'Followup'){ ?>
<div id="email_status">
   <div class="email_box" >
      <div class="time_eye" style="background-color: lightgrey;padding:0px 1px 1px 1px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
         <h5 class="time_eye1" style="font-size: 14px;"><?php echo substr($lfr->subject,0,14)."..."; ?> </h5>
         <input type="hidden" name="lead_followup_type_name" value="<?php echo @$lfr->type; ?>" id="lead_followup_type_name<?php echo $i; ?>">
         <input type="hidden" name="lead_followup_type_subject" value="<?php echo @$lfr->subject; ?>" id="lead_followup_type_subject<?php echo $i; ?>">
         <p>
            <?php 	$next_act=  $lfr->timing_sender;
               echo date('M',strtotime($next_act))."  ".date('d',strtotime($next_act)).",  ".date('Y',strtotime($next_act))." ".date('H:i A',strtotime($next_act));
               
               ?>		
         </p>
      </div>
      <div class="sender_name">
         <?php @$username =  explode(' ',$lfr->user_role);
            ?>
         <p><?php echo @substr($username[0],0,1)."".@substr($username[1],0,1); ?></p>
      </div>
      <input type="hidden" name="comment_show_full" id="comment_show_full<?php echo $i; ?>" value="<?php echo $lfr->comment; ?>">
      <input type="hidden" name="comment_show_half" id="comment_show_half<?php echo $i; ?>" value="<?php echo substr($lfr->comment,0,14).'...'; ?>">
      <div id="comment_show">
         <a href="#" id="comment_show_icon<?php echo $i; ?>" onclick="return apply_css_icon(<?php echo $i; ?>)" style="color:black; font-size:17px; margin-left:5px;"><i class="fa fa-hand-o-right"></i></a> <span id="comment_message<?php echo $i; ?>" style="font-size:16px;padding:1px;"><?php echo substr($lfr->comment,0,14)."..."; ?></span>
      </div>
   </div>
   <div class="mail_box_radius">
      <i class="fa fa-bell" aria-hidden="true"></i>
   </div>
   <div class="recepient_name">
      <i class="fa fa-user"></i><span><?php echo substr($lfr->user_role,0,10)."...";?></span>
   </div>
</div>
<?php } else { ?>
<div id="email_status" style="height: auto;">
   <div class="email_box" style="height: auto;">
      <div class="time_eye" style="height: auto;">
         <h5 class="time_eye1"><?php echo $lfr->type; ?> <a href="#" onclick="return get_template_record_modal(<?php echo $lfr->l_f_h_id; ?>,<?php echo $i; ?>)" data-toggle="modal" data-target="#click_followup_remark_record"> </a></h5>
         <p>
            <?php 	$next_act=  $lfr->timing_sender;
               echo date('M',strtotime($next_act))."  ".date('d',strtotime($next_act)).",  ".date('Y',strtotime($next_act))." ".date('H:i A',strtotime($next_act));
               
               ?>		
         </p>
         <audio controls style="width: 220px; height: 50px;">
            <source src="<?php echo $lfr->comment; ?>" type="audio/mpeg">
            Your browser does not support the audio element.
         </audio>
      </div>
      <div class="sender_name" style="top:1px;">
         <?php @$username =  explode(' ',$lfr->user_role);
            ?>
         <p><?php echo @substr($username[0],0,1)."".@substr($username[1],0,1); ?></p>
      </div>
   </div>
   <div class="mail_box_radius">
      <i class="fa fa-phone" aria-hidden="true"></i>
   </div>
   <div class="recepient_name">
      <i class="fa fa-user"></i><span><?php echo substr($lfr->user_role,0,10)."...";?></span>
   </div>
</div>
<?php } $i++; } ?>