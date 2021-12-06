<?php foreach($history as $h) { ?>
<p><span style="color:gray;font-size: 16px;"><b>created on:</b></span>
   <?php $lcd = explode('&#',$h->lead_creation_date); 
      if(@$lcd[1]=='nochange') {  ?>
   <span style='color:black'><b>
   <?php $date = $lcd[0];
      echo date('M',strtotime($date))."  ".date('d',strtotime($date)).",  ".date('Y',strtotime($date))." ".date('H:i A',strtotime($date)); ?>
   </b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $lcd[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Full Name:</span>
   <?php 
      $na = explode('&#',$h->name); 
      
         if($na[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $na[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $na[0]; ?></span>
   <?php } ?>
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
<p><span style="color:gray">Mobile:</span>
   <?php 
      $mo = explode('&#',$h->mobile_no); 
      
         if($mo[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $mo[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $mo[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Referred From:</span>
</p>
<p><span style="color:gray">Referred To:</span>
   <?php 
      $rt = explode('&#',$h->referred_to); 
      
         if($rt[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $rt[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $rt[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">created By:</span><span style="color:black">Hitesh Sir</span></p>
<p><span style="color:gray">Status:</span>
   <?php 
      $st = explode('&#',$h->status); 
      
         if($st[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $st[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $st[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Source:</span>
   <?php 
      $so = explode('&#',$h->source_id); 
      
         if($so[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $so[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $so[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Channel:</span>
   <?php 
      $ch = explode('&#',$h->channel_id); 
      
         if($ch[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $ch[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $ch[0]; ?></span>
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
      	echo $lb->branch_code; 
      } 
      } 
      ?></b></span>
   <?php } else { ?>
   <span style='color:red'>
   <?php foreach($list_branch as $lb) { 
      if($lb->branch_id == $br[0])
      { 
      	echo $lb->branch_code; 
      } 
      } 
      ?>
   </span>
   <?php } ?>
</p>
<p><span style="color:gray">Department:</span>
   <?php 
      $ch = explode('&#',$h->department); 
      
         if($ch[1]=='nochange') {  ?>
   <span style='color:black'><b>
   <?php 
      foreach($list_department as $ld)
      {
      	if($ld->department_id==$ch[0])
      	{
      		echo $ld->department_name;
      	}
      } ?>
   </b></span>
   <?php } else { ?>
   <span style='color:red'>
   <?php 
      foreach($list_department as $ld)
      {
      	if($ld->department_id==$ch[0])
      	{
      		echo $ld->department_name;
      	}
      } ?>
   </span>
   <?php } ?>
</p>
<p><span style="color:gray">Course Package:</span>
   <?php 
      $cp = explode('&#',$h->course_package); 
      
         if($cp[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $cp[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $cp[0]; ?></span>
   <?php } ?>	
</p>
<p><span style="color:gray">Course:</span>
   <?php 
      $cop = explode('&#',$h->course_or_package); 
      if($cp[0]=='single'){ 
      foreach($list_course as $lc){ 
      	if($lc->course_id == $cop[0])
      	{
      		echo $lc->course_name;
      	}
      }
      }
      else if($cp[0] == 'package')
      {
      foreach($list_package as $lp)	
      {
      	if($lp->package_id == $cop[0])
      	{
      		echo $lp->package_name;
      	}
      }
      }
    ?>
</p>
<p><span style="color:gray">Remarks:</span>
   <?php 
      $ar = explode('&#',$h->any_remarks); 
      
         if($ar[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $ar[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $ar[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Sub-Status:</span>
   <?php 
      $ss = explode('&#',$h->sub_status); 
      
         if($ss[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $ss[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $ss[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Followup Mode:</span>
   <?php 
      $fm = explode('&#',$h->followup_mode); 
      
         if($fm[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $fm[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $fm[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Area:</span>
   <?php 
      $aa = explode('&#',$h->area); 
      
         if($aa[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $aa[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $aa[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Reference Name:</span>
   <?php 
      $rn = explode('&#',$h->reference_name); 
      
         if($rn[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $rn[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $rn[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Reference Mobile NO:</span>
   <?php 
      $rm = explode('&#',$h->reference_mobile_no); 
      
         if($rm[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $rm[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $rm[0]; ?></span>
   <?php } ?>
</p>
<p><span style="color:gray">Graduation Perc:</span>
   <?php 
      $dp = explode('&#',$h->degree_perc); 
      
         if($dp[1]=='nochange') {  ?>
   <span style='color:black'><b><?php echo $dp[0]; ?></b></span>
   <?php } else { ?>
   <span style='color:red'><?php echo $dp[0]; ?></span>
   <?php } ?>
</p>
<hr>
<br>
<?php } ?>