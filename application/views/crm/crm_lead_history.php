<div id="accordion">
   <div class="accordion">
      <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1"
         aria-expanded="true">
         <h4 class="text-primary">History<i class="fa fa-plus" style="font-size: 10px;float:right;"></i></h4>
      </div>
      <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
      <?php foreach($history as $h) { ?>
        <?php $lcd = explode('&#',$h->lead_creation_date); 
      if(@$lcd[1]=='nochange') {  ?>
        <span><b>Created Date :</b><a class="text-dark"><?php $date = $lcd[0];
      echo date('M',strtotime($date))."  ".date('d',strtotime($date)).",  ".date('Y',strtotime($date))." ".date('H:i A',strtotime($date)); ?></a></span>
        <?php } else { ?>
            <span><b>Update Date : </b><a class="text-danger"><?php echo $lcd[0]; ?></a></span>
        <?php } ?>
        <?php $fn = explode('&#',$h->name); if($fn[1]=='nochange') {  ?>
               <span><b>Full Name : </b><a class="text-dark"><?php echo $fn[0]; ?></a></span>
            <?php } else { ?>
            <span><b>Full Name : </b><a class="text-danger"><?php echo $fn[0]; ?></a></span>
         <?php } ?>
         <?php $cn = explode('&#',$h->campaign_name); if($cn[1]=='nochange') {  ?>
               <span><b>Campaign Name : </b><a class="text-dark"><?php echo $cn[0]; ?></a></span>
            <?php } else { ?>
            <span><b>Campaign Name : </b><a class="text-danger"><?php echo $cn[0]; ?></a></span>
         <?php } ?>
         <?php $mo = explode('&#',$h->mobile_no); if($mo[1]=='nochange') {  ?>
               <span><b>Mobile : </b><a class="text-dark"><?php echo $mo[0]; ?></a></span>
            <?php } else { ?>
            <span><b>Mobile : </b><a class="text-danger"><?php echo $mo[0]; ?></a></span>
         <?php } ?>
         <?php $rt = explode('&#',$h->referred_to); if($rt[1]=='nochange') {  ?>
               <span><b>Referred To : </b><a class="text-dark"><?php echo $rt[0]; ?></a></span>
            <?php } else { ?>
            <span><b>Referred To : </b><a class="text-danger"><?php echo $rt[0]; ?></a></span>
         <?php } ?>
         <?php $st = explode('&#',$h->status); if($st[1]=='nochange') {  ?>
               <span><b>Status : </b><a class="text-dark"><?php echo $st[0]; ?></a></span>
            <?php } else { ?>
            <span><b>Status : </b><a class="text-danger"><?php echo $st[0]; ?></a></span>
         <?php } ?>
         <?php $so = explode('&#',$h->source_id); if($so[1]=='nochange') {  ?>
               <span><b>Source : </b><a class="text-dark"><?php echo $so[0]; ?></a></span>
            <?php } else { ?>
            <span><b>Source : </b><a class="text-danger"><?php echo $so[0]; ?></a></span>
         <?php } ?>
         <?php $ch = explode('&#',$h->channel_id); if($ch[1]=='nochange') {  ?>
               <span><b>Channel : </b><a class="text-dark"><?php echo $ch[0]; ?></a></span>
            <?php } else { ?>
            <span><b>Channel : </b><a class="text-danger"><?php echo $ch[0]; ?></a></span>
         <?php } ?>
         <?php $br = explode('&#',$h->branch_id); if($br[1]=='nochange') {  ?>
               <span><b>Branch : </b><a class="text-dark"><?php foreach($list_branch as $lb) { 
                if($lb->branch_id == $br[0]) { echo $lb->branch_code; } } ?></span>  
            <?php } else { ?>
            <span><b>Branch : </b><a class="text-danger"><?php foreach($list_branch as $lb) { 
            if($lb->branch_id == $br[0]) { echo $lb->branch_code; } } ?></a></span>
         <?php } ?>
         <?php $d = explode('&#',$h->department); if($d[1]=='nochange') {  ?>
               <span><b>Department : </b><a class="text-dark"><?php foreach($list_department as $ld) { 
                if($ld->department_id == $d[0]) { echo $ld->department_name; } } ?></span>  
            <?php } else { ?>
            <span><b>Department : </b><a class="text-danger"><?php foreach($list_department as $ld) { 
                if($ld->department_id == $d[0]) { echo $ld->department_name; } } ?></a></span>
         <?php } ?>
         <?php $cp = explode('&#',$h->course_package); if($cp[1]=='nochange') {  ?>
               <span><b>Type : </b><a class="text-dark"><?php echo $cp[0]; ?></a></span>
            <?php } else { ?>
            <span><b>Type : </b><a class="text-danger"><?php echo $cp[0]; ?></a></span>
         <?php } ?>
         <?php $cop = explode('&#',$h->course_or_package); if($cop[1]=='nochange') {  ?>
            <?php if($cp[0]=='single'){  ?>
               <span><b>Course : </b><a class="text-dark"><?php foreach($list_course as $cl) { 
                if($cl->course_id == $cop[0]) { echo $cl->course_name; } } ?></span>  
            <?php } } else { if($cp[0] == 'package') { ?>
            <span><b>Course : </b><a class="text-danger"><?php foreach($list_package as $lp) { 
                if($lp->package_id == $cop[0]) { echo $lp->package_name; } } ?></a></span>
         <?php } } ?>
         <?php $ar = explode('&#',$h->any_remarks); if($ar[1]=='nochange') {  ?>
               <span><b>Remarks : </b><a class="text-dark"><?php echo $ar[0]; ?></a></span>
            <?php } else { ?>
            <span><b>Remarks : </b><a class="text-danger"><?php echo $ar[0]; ?></a></span>
         <?php } ?>
         <?php $ss = explode('&#',$h->sub_status); if($ss[1]=='nochange') {  ?>
               <span><b>Sub-Status : </b><a class="text-dark"><?php echo $ss[0]; ?></a></span>
            <?php } else { ?>
            <span><b>Sub-Status : </b><a class="text-danger"><?php echo $ss[0]; ?></a></span>
         <?php } ?>
         <?php $fm = explode('&#',$h->followup_mode); if($fm[1]=='nochange') {  ?>
               <span><b>Followup Mode : </b><a class="text-dark"><?php echo $fm[0]; ?></a></span>
            <?php } else { ?>
            <span><b>Followup Mode : </b><a class="text-danger"><?php echo $fm[0]; ?></a></span>
         <?php } ?>
         <?php $aa = explode('&#',$h->area); if($aa[1]=='nochange') {  ?>
               <span><b>Area : </b><a class="text-dark"><?php echo $aa[0]; ?></a></span>
            <?php } else { ?>
            <span><b>Area : </b><a class="text-danger"><?php echo $aa[0]; ?></a></span>
         <?php } ?>
         <?php $rn = explode('&#',$h->reference_name); if($rn[1]=='nochange') {  ?>
               <span><b>Reference Name : </b><a class="text-dark"><?php echo $rn[0]; ?></a></span>
            <?php } else { ?>
            <span><b>Reference Name : </b><a class="text-danger"><?php echo $rn[0]; ?></a></span>
         <?php } ?>
         <?php $rm = explode('&#',$h->reference_mobile_no); if($rm[1]=='nochange') {  ?>
               <span><b>Reference Mobile NO : </b><a class="text-dark"><?php echo $rm[0]; ?></a></span>
            <?php } else { ?>
            <span><b>Reference Mobile NO : </b><a class="text-danger"><?php echo $rm[0]; ?></a></span>
         <?php } ?>
         <?php $dp = explode('&#',$h->degree_perc); if($dp[1]=='nochange') {  ?>
               <span><b>Graduation Perc : </b><a class="text-dark"><?php echo $dp[0]; ?></a></span>
            <?php } else { ?>
            <span><b>Graduation Perc : </b><a class="text-danger"><?php echo $dp[0]; ?></a></span>
         <?php } ?>
         <hr>
        <?php } ?>
      </div>
   </div>
</div>