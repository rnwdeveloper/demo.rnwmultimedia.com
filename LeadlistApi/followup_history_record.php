<?php

include 'config_api.php';


// if(isset($_POST['lead_list_id']))

if(isset($_POST['mobile_no']))

{

	$lead_list_data = $_POST['lead_list_id'];

	$mobile = $_POST['mobile_no'];

	  $q = "select * from lead_list where (`mobile_no`='$mobile' AND `lead_list_id`='$lead_list_data') OR `father_mobile_no`='$mobile'";

	$q1 = mysqli_query($con,$q);

	$num = mysqli_num_rows($q1);

	if($num == 1)

	{



		if(!empty($_POST['submit']))

		{

			 $email = $_POST['email'];

			 $q_data = "select * from user where `email`='$email'";

			$q_data1 = mysqli_query($con,$q_data);

			$q_data2 = mysqli_fetch_array($q_data1);

			 $user_name = $q_data2['name'];

			 $user_id = $q_data2['user_id'];







			$mobile_no 		= $_POST['mobile_no'];

			$status 		= $_POST['status'];

			$sub_status 	= $_POST['sub_status'];

			$followup_mode	= $_POST['followup_mode'];

			$next_action_date = $_POST['next_action_date'];

			$time = $_POST['time'];

			$next_date =  $next_action_date.' '.$time;

			$followup_remarks = $_POST['remarks'];

			// $audio_file  =  $_FILES['audio']['name'];

			// $audio_file1 = rand(10000,99999).$audio_file;

			// move_uploaded_file($_FILES['audio']['tmp_name'], "audio/".$audio_file1);

			// $calling_type =  $_POST['calling_type'];



			// $path = "http://demo.rnwmultimedia.com/LeadlistApi/audio/".$audio_file1;



			 $query = "update lead_list set `status`='$status',`sub_status`='$sub_status',`existing_follow_up_mode`='$followup_mode',`next_followup_date`='$next_date',`next_action_date`='$next_date',`followup_remark`='$followup_remarks' where `lead_list_id`='$lead_list_data'";

			$query1 = mysqli_query($con,$query);

			// $userdata =  $this->session->userdata('Admin');

							date_default_timezone_set("Asia/Calcutta");

							$timing_sender = date('m/d/Y h:i A');

				 $q2 =  mysqli_fetch_array($q1);

				 $id =  $q2['lead_list_id'];



				//   $qu = "insert into lead_followup_history(`user_id`,`user_role`,`recepient_id`,`status`,`type`,`comment`,`subject`,`timing_sender`)values('$user_id','$user_name','$id','success','$calling_type','$path','$calling_type','$timing_sender')";

				// $qu1 = mysqli_query($con,$qu);

							

				  $quer = "insert into lead_followup_history(`user_id`,`user_role`,`recepient_id`,`status`,`type`,`comment`,`subject`,`timing_sender`)values('$user_id','$user_name','$id','success','Followup','$followup_remarks','$followup_mode','$timing_sender')";

				

				$quer1 = mysqli_query($con,$quer);





			if($query1){

				$record = array('status'=>1,'msg'=>"Successfully Followup Taken!");

			}

			else{

				$record = array('status'=>0,'msg'=>"Something Wrong");



			}



		    

			

		}else

		{

				$record = array('status'=>0,'msg'=>"Enter Proper Record");



		}

	}

	else

	{

		$record = array('status'=>0,'msg'=>"Id not Found");	

	}

}

else{

	$record = array('status'=>0,'msg'=>"lead list id not blank");	

}	

echo json_encode($record);

?>