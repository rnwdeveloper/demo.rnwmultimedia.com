<?php

$servername = "68.183.81.191";
$username = "mzfrxmujjb";
$password = "Q23bQYkskc";
$db = "mzfrxmujjb";

$con = mysqli_connect($servername, $username, $password,$db) or die(mysqli_error($con));

$sql=mysqli_query($con,"select * from bulk_lead_followup_type") or die(mysqli_error($con));

$info=array();

$sql1=mysqli_query($con,"select * from bulk_lead_followup_subtype") or die(mysqli_error($con));
$info1=array();


if(mysqli_num_rows($sql) > 0)
{
	$response['status']=1;
			while($res=mysqli_fetch_array($sql))
			{
				$info[]=array(
						"followup_type_id"=> $res['followup_type_id'],
						"followup_type_name" => $res['followup_type_name'],
						"is_schedule" => $res['is_schedule']
				);
			}

}
 if(mysqli_num_rows($sql1) > 0)
{
	while($res1=mysqli_fetch_array($sql1))
	{
		$info1[]=array(
			"sub_type_name" => $res1['sub_type_name'],
			"subtype_id" => $res1['subtype_id'],
			"followup_maintype_id"=> $res1['followup_status_id'],
		);
	}
}
// else
// {
// 	$response['status']=0;
// }
$response['data']=$info;
$response['sub_data']=$info1;


header('Content-Type: application/json;charset=utf-8');
                            
      echo json_encode($response,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
?>