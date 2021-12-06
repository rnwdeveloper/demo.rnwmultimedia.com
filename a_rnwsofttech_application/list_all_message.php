<?php
include('config_api.php');
if($_POST)
{

	//$sender_name=$_POST['sender_name'];
	$complain_id=$_POST['complain_id'];
	
	$select =mysqli_query($con,"select * from product_issue_communication where complain_id='$complain_id'") or die(mysqli_error($con));
	$info=array();
	if($select)
	{
		$response['success']=1;
		while($res=mysqli_fetch_array($select))
		{

			$info[]=array(
					"communication_id" => $res['communication_id'],
					"sender_name" => $res['sender_name'],
					"complain_id" => $res['complain_id'],
					"commnet" => $res['comment'],
					"msg_timestamp" => $res['msg_timestamp']					
				);
		}
		$response['data']=$info;
	}


      header('Content-Type: application/json;charset=utf-8');
                            
      echo json_encode($response,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}

?>