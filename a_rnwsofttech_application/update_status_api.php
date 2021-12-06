<?php
include('config_api.php');

$enquiry_status=$_POST['enquiry_status'];
$product_enquiry_id=$_POST['product_enquiry_id'];
$expected_date=$_POST['expected_date'];

$response['enquiry_status']=$enquiry_status;
$response['id']=$product_enquiry_id;
$response['date']=$expected_date;

date_default_timezone_set('Asia/Kolkata');
$date= date('Y-m-d H:i:s');

if($expected_date != "")
{
				$update=mysqli_query($con,"update product_enquiry set enquiry_status='$enquiry_status',commit_date='$expected_date' where product_enquiry_id='$product_enquiry_id'") or die(mysqli_error($con));
			$response['ex_date']=$expected_date;
}
else
	{
					if($enquiry_status == 1)
				{
					$update=mysqli_query($con,"update product_enquiry set enquiry_status='$enquiry_status',processing_date='$date' where product_enquiry_id='$product_enquiry_id'") or die(mysqli_error($con));
				}
				if($enquiry_status == 2)
				{
					$update=mysqli_query($con,"update product_enquiry set enquiry_status='$enquiry_status',completed_date='$date' where product_enquiry_id='$product_enquiry_id'") or die(mysqli_error($con));
				}
				else
				{
					$update=mysqli_query($con,"update product_enquiry set enquiry_status='$enquiry_status' where product_enquiry_id='$product_enquiry_id'") or die(mysqli_error($con));
				}
	
		}




if($update)
{
	$response['update']="success";
	$select=mysqli_query($con,"select * from product_enquiry where product_enquiry_id='$product_enquiry_id'") or die(mysqli_error($con));
	if($select)
	{
		while($res=mysqli_fetch_array($select))
		{
			$info[]=array(


				"expected_date" => $expected_date,
				"complain_id" => $res['product_enquiry_id'],
				"complain_by" => $res['user_name'],
				"product_issue"=>$res['product_issue'],
				"product_issue_date"=>$res['product_issue_date'],

				"enquiry_status" => $res['enquiry_status'],
				"enquiry_show"=>$res['enquiry_show'],
				"enquiry_timestamp" => $res['enquiry_timestamp'],
				"kya" => $res['kya'],
				"commit_date" => $res['commit_date'],
				"completed_date" => $res['completed_date'],
				"show_date" => $res['show_date'],
				"processing_date" => $res['processing_date'],


				
			);
		}
	}


	$response['data']=$info;
}
else
{
	$response['update ']="not";
}


header('Content-Type: application/json;charset=utf-8');
                            
      echo json_encode($response,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
?>