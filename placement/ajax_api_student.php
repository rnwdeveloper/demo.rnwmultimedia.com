<?php

$a='PHPMailer/PHPMailer/PHPMailerAutoload.php';

require $a;

session_start();



if(isset($_POST['submit']))
{
	 $grid = $_POST['gr_id'];

	 $_SESSION['grId'] =  $grid;

	if($grid != '')
	{

		//next example will insert new conversation

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

				if ($curl_response === false) {

				    $info = curl_getinfo($curl);

				    curl_close($curl);

				    die('error occured during curl exec. Additioanl info: ' . var_export($info));

				}

				curl_close($curl);

				$decode = json_decode($curl_response);

				

				$email = $decode->data[0]->email;



				$rand =  rand(10000,99999);

				

				$_SESSION['otp'] =  $rand;

				if(!empty($email))

				{

									$mail_formate="Hello all this is testing mail";

								    //$parts = explode("@", $email);

									      $username = "Riddhi Borda";

									      $mail = new PHPMailer;



									      $mail->isSMTP();                                   // Set mailer to use SMTP

									      $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers

									      $mail->SMTPAuth = true;                            // Enable SMTP authentication

									      // $mail->Username = 'placement.rnwmultimedia@gmail.com';          // SMTP username

									      // $mail->Password = 'Urvil@1221';



									      $mail->Username = 'placement.rnwmultimedia@gmail.com';          // SMTP username

      									  $mail->Password = 'rnw#tpo2020';

       // SMTP password

									      $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted

									      $mail->Port = 587;                                  // TCP port to connect to



									      $mail->setFrom($email, 'Training & Placement Department -  Red & White Group of Institute');

									      $mail->addReplyTo($email, 'Training & Placement Department -  Red & White Group of Institute');

									      $mail->addAddress($email);   // Add a recipient

									      //$mail->addCC('cc@example.com');

									      //$mail->addBCC('bcc@example.com');



									      $mail->isHTML(true); 

									      $mail->Subject = "CHECK YOUR OTP";

									      // $mail->AddAttachment("index.html");

									       // $mail->AddEmbeddedImage("image/spin_earn.jpg", "my-attach", "image/spin_earn.jpg");

									      	$mail->Body    = 'Your OTP is ::'.$rand."<br>";





									       if(!$mail->send()) {

									         $_SESSION['success'] =  "Something Wrong";

									          header("location:student_placement_form.php");

											// echo json_encode($data_res);

									       } 

									       else

									       { 

									        

									        // $this->session->set_flashdata('resetmsg','reset link sent successfully.'); 

									        // redirect(base_url().'owner_controller/forgotpassword_cont');

									        // $_SESSION['send'] = "mail send";

									        // $_SESSION['success'] = "SuccessFully Registered";

									        $_SESSION['success'] =  "OTP SEND YOUR EMAIL";

									        header("location:check_placement_otp.php");

											}

				}
				else
				{

					$_SESSION['success'] =  "GRID NOT FOUND";

					  header("location:student_placement_form.php");
				}

	}
	else
	{
		$_SESSION['success'] =  "Please Enter GRID";

		 header("location:student_placement_form.php");
	}

}



?>