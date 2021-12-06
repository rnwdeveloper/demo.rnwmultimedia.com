<?php

$a='PHPMailer/PHPMailer/PHPMailerAutoload.php';



require $a;

session_start();



include('db.php');


// $certi_conn = mysqli_connect('localhost','xfnajdjktj','Pxe6twNfP2','xfnajdjktj');


$certi_conn = mysqli_connect("localhost","rnwsoftt_branch_certi",'Branch@rnw123$certi',"rnwsoftt_branch") or die("db not connected");

if(isset($_POST['submit']))
{
	$certification_number = $_POST['certification_number'];



	$cer_check = "select * from conform_cer where `serial_no`='$certification_number'";

	$cer_check1 = mysqli_query($certi_conn,$cer_check);

	$num_cer_check2 = mysqli_num_rows($cer_check1);


	if($num_cer_check2 == 1)
	{

		if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
		{

			$secretKey = '6Ld8n2caAAAAAOQO-Ix5QC2kpkcbfCXiRUieHUay'; 

            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);

            $responseData = json_decode($verifyResponse); 

            if($responseData->success)
            { 		

				$check_st = "select * from application_job where `certificate_no`='$certification_number'";

				$check_st1 = mysqli_query($con,$check_st);

				$num_check = mysqli_num_rows($check_st1);

				$check_st2 = mysqli_fetch_array($check_st1);

				$check_st3 = $check_st2['application_status'];

				if($check_st3 == '2' || $num_check == 0)
				{
					if($certification_number != '') 
					{

						$_SESSION['grId'] =  $certification_number;

						$send_email_id = $_POST['email'];

						$send_mobile_no =  $_POST['alumini_mobile_no'];

						$_SESSION['email_alumini'] = $send_email_id;

						$_SESSION['mobile_alumini'] = $send_mobile_no;

						$emailRand =  rand(100000,999999);

						$mobileRand = rand(100000,999999);

						$_SESSION['email_otp'] =  $emailRand;

						$_SESSION['mobile_otp'] =  $mobileRand;

						if(!empty($send_email_id) && !empty($send_mobile_no))
						{

							$mail_formate="Hello all this is testing mail";

						    $username = "Pradip Malaviya";

						    $mail = new PHPMailer;

							$mail->isSMTP();   

						  //   $mail->Host = $emailHost;  
						  
						    $mail->Host = $emailHost;                    // Specify main and backup SMTP servers
				  			$mail->SMTPAuth = true;                            // Enable SMTP authentication
				  // $mail->Username = 'placement.rnwmultimedia@gmail.com';          // SMTP username
				  // $mail->Password = 'Urvil@1221';
				  //      $mail->Username = 'placement.rnwmultimedia@gmail.com';          // SMTP username

				  // 	$mail->Password = 'rnw#tpo2020';

					$mail->Username = $masterEmail;          // SMTP username
					$mail->Password = $masterPassword ;

							 //$mail->Username = $masterEmail;          // SMTP username

					   //		$mail->Password = $masterPassword ;

							$mail->SMTPSecure = 'ssl';                         

							$mail->Port = 465;                           

							$mail->setFrom($masterEmail, 'Training & Placement Department -  Red & White Group of Institute');

							$mail->addReplyTo($send_email_id, 'Training & Placement Department -  Red & White Group of Institute');

							$mail->addAddress($send_email_id);   

							$mail->isHTML(true); 

							$mail->Subject = "CHECK YOUR OTP";

							$mail->Body    = 'Your OTP is ::'.$emailRand."<br>";





							$msg = 'Your OTP is ::'.$mobileRand."<br>";

					      	$mobile = "91".$send_mobile_no;

		      				$msg = urlencode($msg);

				

							$url="http://dndsms.vishawebsolutions.com/api/mt/SendSMS?user=Hitesh-RNW&password=Hitz9898&senderid=RNWEDU&channel=Trans&DCS=8&flashsms=0&number=$mobile&text=$msg&route=15";

					

							$ch = curl_init();

								curl_setopt_array($ch, array(

								CURLOPT_URL => $url,

								CURLOPT_RETURNTRANSFER => true,

								CURLOPT_ENCODING => "",

								CURLOPT_SSL_VERIFYHOST => 0,

								CURLOPT_SSL_VERIFYPEER => 0

							));

				

							$output = curl_exec($ch);

							if(!curl_errno($ch))

							{

								$p_me =1 ;

							}

							curl_close($ch);

							$p_me =1;



							if(!$mail->send()) 

							{

								$_SESSION['success'] =  "Something Wrong";

								header("location:ra.php");

							} 

							else

							{ 

								$_SESSION['success'] =  "otp send your email and phone!! check it!!";

								header("location:alumini_ra_student_placement_form.php");

							}

				}

				else

				{

					$_SESSION['msg'] =  "Please Enter Email and Mobile Fields";

					header("location:ra.php");

					

				}

			}

			else

			{

				$_SESSION['msg'] =  "Please Enter Cerificate number!!";

				header("location:ra.php");

			}

		}

		else

		{

			// $_SESSION['success'] =  "Please Select Captcha!!";

			$_SESSION['msg'] =  "Please Contact Placement Department!! You are Already Registerd!!";

			header("location:ra.php");

		}

	}

	else

	{

		// $_SESSION['success'] =  "Please Enter Certificate Number";

		$_SESSION['msg'] =  "Captcha code is not Valid!!";

		 header("location:ra.php");

	}

}

else

{

	// $_SESSION['success'] =  "Please Contact Placement Department!! You are Already Registerd!!";

	$_SESSION['msg'] =  "Please Select Captcha code!!";

	header("location:ra.php");

}

}

else

{

	$_SESSION['msg'] =  "Certificate Number is not Found!!";

	header("location:ra.php");

}

}



?>