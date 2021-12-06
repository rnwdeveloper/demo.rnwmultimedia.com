<?php
	include('config_api.php');

	$sender_name=$_POST['sender_name'];
	$complain_id=$_POST['complain_id'];
	$comment=$_POST['comment'];
date_default_timezone_set('Asia/Kolkata');
	$date= date('Y-m-d H:i:s');
    
	$msg_timestamp=$date;
	$info=array();
	$insert=mysqli_query($con,"insert into product_issue_communication(`sender_name`,`complain_id`,`comment`,`msg_timestamp`) values('$sender_name','$complain_id','$comment','$msg_timestamp') ") or die(mysqli_error($con));
	if($insert)
	{
		$response['success']=1;	

		$select =mysqli_query($con,"select * from product_issue_communication") or die(mysqli_error($con));
		if($select)
		{
			while($res=mysqli_fetch_array($select))
			{
				$info[]=array(
					"communication_id" =>$res['communication_id'],
					"sender_name" =>$res['sender_name'],
					"complain_id" => $res['complain_id'],
					"commnet" => $res['comment'],
					"msg_timestamp" =>$res['msg_timestamp']					
				);
			}

			$response['data']=$info;
		}	
	}
	else
	{
		$response['success']=0;	
	}


	header('Content-Type: application/json;charset=utf-8');
                            
      echo json_encode($response,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
?>