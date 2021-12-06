<?php


include 'config_api.php';
mysqli_set_charset($con, "utf8mb4"); 





	if(isset($_POST['submit']))

	{

			if(!empty($_POST['lead_list_id']) && !empty($_POST['sms_id']) && !empty($_POST['email']))

			{

				$sms_id = $_POST['sms_id'];

				$que    = "select sms_template,category from sms_template where `sms_id`='$sms_id'";

				$que1   = mysqli_query($con,$que);

				$que2 	= mysqli_fetch_assoc($que1);

				$msg_sms =  $que2['sms_template'];

				$subject = $que2['category'];

				date_default_timezone_set('Asia/Kolkata');

				$datetime = date('m/d/Y H:i A');

				

				$email 			= $_POST['email'];

				$query 			= "select name,user_id from user where `email`='$email'";

				$query1 		= mysqli_query($con,$query);

				$query2			= mysqli_fetch_assoc($query1);

				$name 			= $query2['name'];

				$user_id 		= $query2['user_id'];

				$recepient_id 	= $_POST['lead_list_id'];

				$type 			= 'SMS';			

				$msg 			= $msg_sms;

		

				  $quee = "insert into lead_followup_history(`user_id`,`user_role`,`recepient_id`,`type`,`comment`,`subject`,`timing_sender`,`status`)values('$user_id','$name','$recepient_id','$type','$msg','$subject','$datetime','success')";

			

				$quee1 = mysqli_query($con,$quee);

				if($quee1)

				{



				 $mobile = "919664635379";

				 $msg = urlencode($msg);

				 $url="http://dndsms.vishawebsolutions.com/api/mt/SendSMS?user=Hitesh-RNW&password=Hitz9898&senderid=RNWEDU&channel=Trans&DCS=8&flashsms=0&number=$mobile&text=$msg&route=15";

					/* init the resource */

					$ch = curl_init();

					curl_setopt_array($ch, array(

					CURLOPT_URL => $url,

					CURLOPT_RETURNTRANSFER => true,

					CURLOPT_ENCODING => "",

					CURLOPT_SSL_VERIFYHOST => 0,

					CURLOPT_SSL_VERIFYPEER => 0

					));

					/* get response */

					$output = curl_exec($ch);

					/* Print error if any */

					if(!curl_errno($ch))

					{

					// echo 'error:' . curl_error($ch);?

						$p_me =1 ;

					}

					curl_close($ch);

					$p_me =1;

					echo json_encode(array('status'=>true,'msg'=>"successfully Send SMS!!"));

				}

				else

				{

					echo json_encode(array('status'=>false,'msg'=>"Something Went Wrong!!"));

				}

			}

			else

			{

				echo json_encode(array('status'=>false,'msg'=>"Enter Email, Lead List Id, User_id!!"));

			}

	} 

	else

	{

		echo json_encode(array('status'=>false,'data'=>''));

	}

?>