
<?php

$servername = "68.183.81.191";
$username = "mzfrxmujjb";
$password = "Q23bQYkskc";
$db = "mzfrxmujjb";

$con = mysqli_connect($servername, $username, $password,$db) or die(mysqli_error($con));

date_default_timezone_set('Asia/Kolkata');
 $current_date = date( 'd-m-Y', time () );

$id=$_POST['id'];



//lead type  1 -new    0 - old

	$query=mysqli_query($con,"select * from bulk_lead where id='$id'") or die(mysqli_error($con));


  mysqli_num_rows($query);
$info=array();
	if(mysqli_num_rows($query) > 0)
	{

		while($res=mysqli_fetch_array($query))
		{
			$response['status'] = 1;
			
			$a=explode(',',$res['sub_status']);
				foreach($a as $v)
				{
					$sub[]=$v;
				    // $qu=mysqli_query($con,"select subtype_id from bulk_lead_followup_subtype where sub_type_name='$v'") or die(mysqli_error($con));
				    // if($qu)
				    // {
				    // 	while($re=mysqli_fetch_array($qu))
				    // 	{
				    // 		$sub[]=$re['subtype_id'];
				    // 	}
				    // }
				}
			$info[]=array(
				
				"timestemp" => $res['time_stemp'],
				"name_of_school_or_classes" => $res['school_collage'],
				"student_name" => $res['name'],
				
				"address" => $res['address'],
				"area" => $res['area'],
				"father_name" => $res['father_name'],
				"mobile" => $res['contact_no'],
				"father_mobile" => $res['father_contact_no'], 
				"Intrested_subjects" => $res['intersting_field'],
				"interest_in_seminar" => $res['priority'],
				"other_tremarks" => $res['other_remark'],
				"lead_assign_date" => $res['assign_date'],
				"assign_status" => $res['assign_status'],
				"followup_status" => $res['followup_status'],
				"intresting_rating" => $res['intresting_rating'],
				"status" => $res['status'],
				"sub_status" => $sub,
				"priority_status" => $res['priority_status'],

			);
		}
	} 
	else
	{
		$response['status']=0;
	}
 
 $response['data']=$info;
header('Content-Type: application/json;charset=utf-8');
                            
      echo json_encode($response,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
?>