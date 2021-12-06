<?php
$a='../placement/PHPMailer/PHPMailer/PHPMailerAutoload.php';
$con  = mysqli_connect("localhost","mzfrxmujjb","Q23bQYkskc","mzfrxmujjb") or die("Db not connected");
require $a;
session_start();

if(isset($_SESSION['temporary_offline'])=='')
{
	$_SESSION['home_error'] = "Please Enter Your GRID!!";
	header("location:TimeUp.php");
}

if(isset($_POST['submit']))
{
	
	$grid = $_POST['gr_id'];
	$_SESSION['grId'] =  $grid;
	$qu = "select * from reopen_feedback where `grid`='$grid'";
	$qu1 = mysqli_query($con,$qu);
	$num = mysqli_num_rows($qu1);

	if($num == 0) 
	{ 
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
				// $email = "piyush0101nakarani@gmail.com";

				$rand =  rand(10000,99999);
				
				$_SESSION['otp'] =  $rand;

				$msg = 'Your OTP is ::'.$rand;
		      	$mobile = "91".$decode->data[0]->mobile;
		      	// $mobile = "918866328887";
				 $msg = urlencode($msg);
				// echo $msg;


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

				if(!empty($email))
				{
									$mail_formate="Hello all this is testing mail";
								    //$parts = explode("@", $email);
									      $username = "Red & White Group of Institute";
									      $mail = new PHPMailer;

									      $mail->isSMTP();                                   // Set mailer to use SMTP
									      $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
									      $mail->SMTPAuth = true;                            // Enable SMTP authentication
									      // $mail->Username = 'placement.rnwmultimedia@gmail.com';          // SMTP username
									      // $mail->Password = 'Urvil@1221';

									      $mail->Username = 'piyush0101nakarani@gmail.com';          // SMTP username
      									  $mail->Password = '0101Piyush!@#$0101';
       // SMTP password
									      $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
									      $mail->Port = 587;                                  // TCP port to connect to

									      $mail->setFrom($email, 'Red & White Group of Institute');
									      $mail->addReplyTo($email, 'Red & White Group of Institute');
									      $mail->addAddress($email);   // Add a recipient
									      //$mail->addCC('cc@example.com');
									      //$mail->addBCC('bcc@example.com');

									      $mail->isHTML(true); 
									      $mail->Subject = "CHECK YOUR OTP FOR Reopen Process";
									      // $mail->AddAttachment("index.html");
									       // $mail->AddEmbeddedImage("image/spin_earn.jpg", "my-attach", "image/spin_earn.jpg");
									      	$mail->Body    = 'Your OTP is ::'.$rand;

									      	

									       if($mail->send() || $p_me == '1') {
									      

									             $_SESSION['success'] =  "OTP SEND YOUR EMAIL in Promotion Tab OR MOBILE CHECK IT!! Wait for couple of minute";
									        header("location:check_otp.php");
											// echo json_encode($data_res);
									       } 
									       else
									       { 
									          $_SESSION['error'] =  "Something Wrong";
									          header("location:index.php");
									        // $this->session->set_flashdata('resetmsg','reset link sent successfully.'); 
									        // redirect(base_url().'owner_controller/forgotpassword_cont');
									        // $_SESSION['send'] = "mail send";
									        // $_SESSION['success'] = "SuccessFully Registered";
									     
											}



				}
				else
				{
					$_SESSION['home_error'] =  "GRID NOT FOUND";
					  header("location:index.php");
					
				}
	}
	else
	{
		$_SESSION['home_error'] =  "Please Enter GRID";
		 header("location:index.php");
	}
}
else
{
	$_SESSION['success'] = "You Already Give Feedback!! Thank You.";
		
	
		header('location:index.php');
}
				
 
}

?>