<?php

$a='PHPMailer/PHPMailer/PHPMailerAutoload.php';
require $a;
session_start();
include('db.php');



if(isset($_POST['submit']))
{
	$grid = $_POST['gr_id'];
	$check_st = "select * from application_job where `gr_id`='$grid'";
	$check_st1 = mysqli_query($con,$check_st);
	$num_check = mysqli_num_rows($check_st1);
	$check_st2 = mysqli_fetch_array($check_st1);
	$check_st3 = $check_st2['application_status'];
	if($check_st3 == '2' || $num_check == 0){
	if($grid != '') 
	{
		if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
		{
			$secretKey = '6Ld8n2caAAAAAOQO-Ix5QC2kpkcbfCXiRUieHUay'; 
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse); 
			if($responseData->success)
			{ 	
				$_SESSION['grId'] =  $grid;
				$service_url = 'https://erp.eduzilla.in/api/students/details';
				$curl = curl_init($service_url);
				$curl_post_data = array(
					'GR_ID' => $grid,
					'Inst_code' => 'RNWEDU',
					'Inst_security_code' => 'rnw',
				);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
				$curl_response = curl_exec($curl);
				if ($curl_response === false) 
				{
					$info = curl_getinfo($curl);
					curl_close($curl);
					die('error occured during curl exec. Additioanl info: ' . var_export($info));
				}
				curl_close($curl);
				$decode = json_decode($curl_response);

				$send_email_id = $decode->data[0]->email;
				$send_mobile_no =  $decode->data[0]->mobile;
				
				// $send_mobile_no =  "9664635379";
				// $send_email_id = "piyush0101nakarani@gmail.com";
				// $send_email_id = "tgraphicsdesigner14@gmail.com";
				// exit;
				// $email = $decode->data[0]->email;



				$emailRand =  rand(100000,999999);
				$mobileRand = rand(100000,999999);
				$_SESSION['email_otp'] =  $emailRand;
				$_SESSION['mobile_otp'] =  $mobileRand;

				if(!empty($send_email_id) && !empty($send_mobile_no))
				{
				  $mail_formate="Hello all this is testing mail";
			      $username = "Riddhi Borda";
			      $mail = new PHPMailer;
			      $mail->isSMTP();                                   // Set mailer to use SMTP
				  // $mail->Host = 'smtp.gmail.com'; 
			      $mail->Host = $emailHost;                    // Specify main and backup SMTP servers
				  $mail->SMTPAuth = true;                            // Enable SMTP authentication
				  // $mail->Username = 'placement.rnwmultimedia@gmail.com';          // SMTP username
				  // $mail->Password = 'Urvil@1221';
				   //     $mail->Username = 'placement.rnwmultimedia@gmail.com';          // SMTP username

				  	// $mail->Password = 'rnw#tpo2020';

					$mail->Username = $masterEmail;          // SMTP username
					$mail->Password = $masterPassword;

				  // SMTP password

			      $mail->SMTPSecure = 'ssl';                         // Enable TLS encryption, `ssl` also accepted
			      $mail->Port = 465;                                  // TCP port to connect to
			      $mail->setFrom($masterEmail, 'Training & Placement Department -  Red & White Group of Institute');
			      $mail->addReplyTo($send_email_id, 'Training & Placement Department -  Red & White Group of Institute');
			      $mail->addAddress($send_email_id);   // Add a recipient
			      //$mail->addCC('cc@example.com');
			      //$mail->addBCC('bcc@example.com');
			      $mail->isHTML(true); 
			      $mail->Subject = "CHECK YOUR OTP";
			      // $mail->AddAttachment("index.html");
			      // $mail->AddEmbeddedImage("image/spin_earn.jpg", "my-attach", "image/spin_earn.jpg");
			     
				  $mail->Body 	 = "Red & White Placement Portal<br>";
			      $mail->Body    .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OTP : <b>'.$emailRand."</b><br>";
			      $mail->Body 	 .= "Please Do Not Share It<br>";
				  $msg = 'Your OTP is ::'.$mobileRand."<br>";
			      $mobile = "91".$send_mobile_no;
			      // $mobile = "919664635379";
			      $msg = urlencode($msg);
				  // $url="http://dndsms.vishawebsolutions.com/api/mt/SendSMS?user=Hitesh-RNW&password=Hitz9898&senderid=RNWEDU&channel=Trans&DCS=8&flashsms=0&number=$mobile&text=$msg&route=15";

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



					if(!$mail->send()) 

					{

						$_SESSION['msg'] =  "Something Wrong";

						header("location:ra.php");

					} 

					else

					{ 

						$_SESSION['success'] =  "Otp send your email and phone!! check it!!!";

						header("location:ra_student_placement_form.php");

					}

				}

				else

				{

					// $_SESSION['success'] =  "Captcha code is not Valid!!";

					$_SESSION['msg'] =  "Email and Mobile Fields are not found !! Please Register it!!";

					header("location:ra.php");

				}

			}

			else

			{

				$_SESSION['msg'] =  "Captcha code is not Valid!!";

				// $_SESSION['success'] =  "GRID NOT FOUND";

				header("location:ra.php");

			}

	}

	else

	{

		$_SESSION['msg'] =  "Please Select Captcha Code!!";

		header("location:ra.php");

	}

}

else

{

	$_SESSION['msg'] =  "GRID is Required!!";

	header("location:ra.php");

}

}

else

{

	    $_SESSION['success'] =  "Please Contact Placement Department!! You are Already Registerd!!";

		 header("location:ra.php");

}

				

 

}



?>