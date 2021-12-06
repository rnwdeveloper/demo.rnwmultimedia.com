

<style>
  .t1{
    background-color: #0b527e;
    color: white;
    font-size: 12px;
    font: center;
   }
   .td1{
  font-size: 10px;
  color: #000000;
  font: center;
}
.btag{
   color: black;
}
</style>
<div class="modal-header">
	<h5 class="modal-title"><b>Batch Data</b></h5>
	<div class="btn-group">
		<!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#edit_demo_show">Edit admission </button>
		<button type="button" class="btn btn-danger btn-sm" >Discard</button>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button> -->
	</div>
</div>
<div class="modal-body">
<table class="table table-bordered">
  <thead>
    <tr class="t1">
      <th scope="col">Sr_No</th>
      <th scope="col">Details</th>
      <th scope="col">Other Details</th>
      <th scope="col">Branch</th>
      <th scope="col">Department</th>
      <th scope="col">Courses</th>
      <th scope="col">CampaignStatus</th>
      <th scope="col">Remarks</th>
    </tr>
  </thead>
  <tbody>
    <?php $sno=1; foreach ($list_campaign_batches_record as $val) {?>
    <tr class="td1">
     <td><?php echo $sno; ?></td>
     <td>
      <?php echo "<b>Name :</b>" .''. $val->name; ?><br>
      <?php echo "<b>Surname :</b>" .''. $val->surname; ?><br>
      <?php echo "<b>Gender :</b>" .''. $val->gender; ?><br>
      <?php echo "<b>Email :</b>" .''. $val->email; ?><br>
      <?php echo "<b>MobileNo :</b>" .''. $val->mobile_no; ?><br>
      <?php echo "<b>FatherMobileNo :</b>" .''. $val->father_mobile_no; ?><br>
      <?php echo "<b>CampaignName :</b>" .''. $val->campaign_name; ?><br>
      <?php echo "<b>school/College :</b>" .''.$val->school_college_id; ?><br>
      <?php echo "<b>Priority :</b>" .''.$val->priority; ?><br>
      <?php echo "<b>ReferenceName :</b>" .''.$val->reference_name; ?><br>
      <?php echo "<b>ReferenceMobileNo :</b>" .''.$val->reference_mobile_no; ?><br>
      <?php echo "<b>ReferredTo :</b>" .''.$val->referred_to; ?><br>
      <?php echo "<b>channel :</b>" .''.$val->channel_id; ?><br>
      <?php echo "<b>source :</b>" .''.$val->source_id; ?><br>
      <?php echo "<b>school/college :</b>" .''.$val->school_college_id; ?><br>
      <?php echo "<b>source_remark :</b>" .''.$val->source_remark; ?>
       <?php echo "<b>Dob :</b>" .''.$val->dob; ?><br>
       <?php echo "<b>City :</b>" .''.$val->city; ?><br>
       <?php echo "<b>Area :</b>" .''.$val->area; ?><br>
       <?php echo "<b>Address :</b>" .''.$val->address; ?><br>
     </td>
     <td>
       <?php echo "<b>Status :</b>" .''.$val->status; ?><br>
       <?php echo "<b>subStatus :</b>" .''.$val->sub_status; ?><br>
       <?php echo "<b>FollowupMode :</b>" .''.$val->followup_mode; ?><br>
       <?php echo "<b>FollowupStatus :</b>" .''.$val->followup_status; ?><br>
       <?php echo "<b>ExistingFollowUpMode :</b>" .''.$val->existing_follow_up_mode; ?><br>
       <?php echo "<b>FollowupRemark :</b>" .''.$val->followup_remark; ?><br>
       <?php echo "<b>FollowupStatusGreen :</b>" .''.$val->followup_status_green; ?><br>
       <?php echo "<b>FollowupStatusYellow :</b>" .''.$val->followup_status_yellow; ?><br>
       <?php echo "<b>FollowupStatusRed :</b>" .''.$val->followup_status_red; ?><br>
       <?php echo "<b>NextFollowupDate :</b>" .''.$val->next_followup_date; ?><br>
       <?php echo "<b>LeadModificationDate :</b>" .''.$val->lead_modification_date; ?><br>
       <?php echo "<b>LeadCreationDate   :</b>" .''.$val->lead_creation_date  ; ?><br>
       <?php echo "<b>NextActionDate   :</b>" .''.$val->next_action_date  ; ?><br>
       <?php echo "<b>NextActionDateUpdate   :</b>" .''.$val->next_action_date_update; ?><br>
     </td>
     <td><?php echo $val->branch_id; ?></td>
     <td><?php echo $val->department; ?></td>
     <td>
      <?php echo "<b>Type :</b>" .''.$val->course_package; ?>:-<?php echo $val->course_or_package; ?>
     </td>
      <td><?php echo $val->campaign_status; ?></td>
     <td width="10"><?php echo $val->any_remarks; ?></td>
    </tr>
    <?php $sno++; } ?>
  </tbody>
</table>
</div>