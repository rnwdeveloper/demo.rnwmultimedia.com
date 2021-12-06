<?php

include('config_api.php');
	$complain_id=$_POST['complain_id'];

	// if($con)
	// {
	// 	echo "connection is establish";
	// }
	// else
	// {
	// 	echo "connection not establish";
	// }
	$info=array();

	$select=mysqli_query($con,"select * from product_enquiry where product_enquiry_id='$complain_id'") or die(mysqli_error($con));
	if($select)
	{
		while($res=mysqli_fetch_array($select))
		{

			if($res['commit_date'] == null)
			{
				$commit_date=$res['commit_date'];
			}
			else
			{
				$commit_date = date("d-m-Y", strtotime($res['commit_date']));
			
			}
			if($res['completed_date'] == null)
			{
				$completed_date=$res['completed_date'];
			}
			else
			{
				
				$completed_date = date("d-m-Y", strtotime($res['completed_date']));
			}



			$time = explode(" ", $res['product_issue_date']);		
			$product_issue_date = date("d-m-Y", strtotime($time[0]));

			$time = explode(" ", $res['enquiry_timestamp']);		
			$enquiry_timestamp = date("d-m-Y", strtotime($time[0]));

			$time = explode(" ", $res['show_date']);		
			$show_date = date("d-m-Y", strtotime($time[0]));

			if($res['processing_date'] == null)
			{
				$processing_date=$res['processing_date'];
			}
			else
			{
				$time = explode(" ", $res['processing_date']);		
			$processing_date = date("d-m-Y", strtotime($time[0]));
			
			}
			

			$info[]=array(


				
				"complain_id" => $res['product_enquiry_id'],
				"complain_by" => $res['user_name'],
				"product_issue"=>$res['product_issue'],
				"product_issue_date"=>$product_issue_date,

				"enquiry_status" => $res['enquiry_status'],
				"enquiry_show"=>$res['enquiry_show'],
				"enquiry_timestamp" => $enquiry_timestamp,
				"kya" => $res['kya'],
				"commit_date" => $commit_date,
				"completed_date" => $completed_date,
				"show_date" => $show_date,
				"processing_date" => $processing_date,


				
			);
		}
	}


	$response['data']=$info;
	 header('Content-Type: application/json;charset=utf-8');
                            
      echo json_encode($response,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
?>