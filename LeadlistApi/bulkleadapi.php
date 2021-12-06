<?php



include 'config_api.php';



$query ="select lead_list_id,name,gender,email,mobile_no,campaign_name,channel_id,source_id,priority, referred_to, status, sub_status,followup_mode, followup_status,next_followup_date,followup_remark,state,city,area,branch_id,department,course_package,course_or_package,lead_modification_date,next_action_date from lead_list12";

$query1 = mysqli_query($con,$query);



$alldata = array();

while($query2 = mysqli_fetch_assoc($query1))

{

	$alldata[] = $query2;

}





echo json_encode(array('alldata'=>$alldata));





?>