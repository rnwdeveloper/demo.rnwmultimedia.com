<?php


//all=4
//pending=0
//process=1
//cancel=3
//complete=2


include('config_api.php');

	$info=array();



if($_POST)
{
	$status=$_POST['status'];


	if($status == 0)
		{

			$select=mysqli_query($con,"select * from product_enquiry where enquiry_status='$status' order by product_enquiry_id desc") or die(mysqli_error($con));
		}
	else if($status == 1)
		{

			$select=mysqli_query($con,"select * from product_enquiry where enquiry_status='$status' order by product_enquiry_id desc") or die(mysqli_error($con));
		}
	else if($status == 2)
		{

			$select=mysqli_query($con,"select * from product_enquiry where enquiry_status='$status' order by product_enquiry_id desc") or die(mysqli_error($con));
		}
	else if($status == 3)
		{

			$select=mysqli_query($con,"select * from product_enquiry where enquiry_status='$status' order by product_enquiry_id desc") or die(mysqli_error($con));
		}
		else if($status == 4)
		{

			$select=mysqli_query($con,"select * from product_enquiry order by product_enquiry_id desc") or die(mysqli_error($con));
		}





	
	if($select)
	{
		while($res=mysqli_fetch_array($select))
		{
			$time = explode(" ", $res['enquiry_timestamp']);
			
			$enquiry_timestamp = date("d-m-Y", strtotime($time[0]));
			$info[]=array(
				 
				
				
				"enquiry_timestamp" =>$enquiry_timestamp,
				"complain_show"=>$res['enquiry_show'],
				"complain_id" => $res['product_enquiry_id'],
				"complain_status" => $res['enquiry_status'],
				"complain_by" => $res['user_name'],
				"propery" => $res['kya'],
				
			);
		}
	}
// include('notification.php');

	$response['data']=$info;
	 header('Content-Type: application/json;charset=utf-8');
                            
      echo json_encode($response,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
?>