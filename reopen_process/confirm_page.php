<?php 
ob_start();
session_start();
$a='../placement/PHPMailer/PHPMailer/PHPMailerAutoload.php';

require $a;
$con  = mysqli_connect("localhost","mzfrxmujjb","Q23bQYkskc","mzfrxmujjb") or die("Db not connected");

if(isset($_SESSION['temporary_offline'])=='')
{
	// $_SESSION['home_error'] = "Please Enter Your GRID!!";
	header("location:TimeUp.php");
}

if(isset($_POST['Feedback'])){
	$grid = isset($_POST['your_grid'])?$_POST['your_grid']:'';
	$name = isset($_POST['your_name'])?$_POST['your_name']:'';
	$branch = isset($_POST['your_branch'])?$_POST['your_branch']:'';
	$course = isset($_POST['your_course'])?$_POST['your_course']:'';
	$mobile = isset($_POST['your_mobile'])?$_POST['your_mobile']:'';
	$relatives = isset($_POST['relatives'])?$_POST['relatives']:'';
	$email = isset($_POST['your_email'])?$_POST['your_email']:'';
	// $email ="piyush0101nakarani@gmail.com";
	$father_mobile = isset($_POST['your_father_mobile'])?$_POST['your_father_mobile']:'';
	  $agree = isset($_POST['option'])?$_POST['option']:'';
	 $reason = isset($_POST['disagree'])?$_POST['disagree']:'';
	 // $reason = htmlentities($_POST['disagree'], ENT_QUOTES, "UTF-8");

	 date_default_timezone_set('Asia/Kolkata'); $currentTime = date( 'd-m-Y h:i:s A', time () );
	$qu = "select * from reopen_feedback where `grid`='$grid'";
	$qu1 = mysqli_query($con,$qu);
	 $num = mysqli_num_rows($qu1);

 

	if($num == 0){

				if($agree == 'Agree')
				{
					$msg = "You are Agree to Terms and Conditions of Red and White";
				 }
				 else
				 {
					$msg = "You are not Agree to Terms and Conditions of Red and White";
				 } 
		      	// $mo = $decode->data[0]->mobile;
		      	$mobile = "91".$mobile;
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

				if($agree == 'Agree')
				{
					$fmsg = "You are Agree to Terms and Conditions of Red and White";
		 		}
		 		else
		 		{
					$fmsg = "You are not Agree to Terms and Conditions of Red and White";
				} 
		      	// $mo = $decode->data[0]->mobile;
		      	// $famobile = "91".$father_mobile;
				 // $famsg = urlencode($msg);
				// echo $msg;

				$url="http://dndsms.vishawebsolutions.com/api/mt/SendSMS?user=Hitesh-RNW&password=Hitz9898&senderid=RNWEDU&channel=Trans&DCS=8&flashsms=0&number=$famobile&text=$famsg&route=15";
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


		  $query ="insert into reopen_feedback(`grid`,`name`,`branch`,`course`,`mobile`,`email`,`father_mobile`,`agree_or_not`,`reason`,`created_date`,`relatives`)values('$grid','$name','$branch','$course','$mobile','$email','$father_mobile','$agree','$reason','$currentTime','$relatives')";
										
										$mail_formate="Hello all this is testing mail";
								    //$parts = explode("@", $email);
									      $username = "Red & White Group of Institutes";
									      $mail = new PHPMailer;

									      $mail->isSMTP();                                   // Set mailer to use SMTP
									      $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
									      $mail->SMTPAuth = true;   
									     	$mail ->charSet = "UTF-8";
			    						  $mail->WordWrap = TRUE;                        // Enable SMTP authentication
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
									      $mail->Subject = "Your Acceptence";
									      // $mail->AddAttachment("index.html");
									       // $mail->AddEmbeddedImage("image/spin_earn.jpg", "my-attach", "image/spin_earn.jpg");
									      if($agree == 'NotAgree'){
									      	$mail->Body = "<ol>
					<li><b>નીચેના નિયમો પ્રમાણે હું અને વિધાર્થી (મારું બાળક) સહમત નથી.</b></li>
					<li>સંસ્થા માં પ્રવેશ દરમિયાન સ્વાસ્થ્ય ની ખરાઈ (અને હેન્ડ સેનિટાઇઝ કરવું ફરજિયાત રહેશે) તેમજ સ્વાસ્થ્ય યોગ્ય જણાશે તો જ પ્રવેશ ને પાત્ર રહેશે.</li>
					<li>વિદ્યાર્થી એ પોતાની સાથે પાણી ની એક બોટલ તેમજ નાની સેનિટાઇઝરની બોટલ લાવવી તેમજ પોતાની વસ્તુ શક્ય હોય તો અન્ય વ્યક્તિને ઉપયોગ માટે ના આપવી જેથી વિદ્યાર્થી નું સ્વાસ્થ્ય ન જોખમાય.</li>
					<li>વિદ્યાર્થીઓએ જાતે સોશિયલ ડિસ્ટન્સ, ફેસ માસ્ક, હાથ મોજા પહેરવા જેવા નિયમો નું જાતેજ ફરજીયાત પાલન કરવાનું રહેશે. શક્ય હોય ત્યાં સુધી બિન જરૂરી વસ્તુ કે જગ્યાએ સ્પર્શ ના કરવો.</li>
					<li>સરકારશ્રી ના નિયમોને માન આપતા, સંસ્થા ના આયોજન માં, ઇન્ફ્રાસ્ટ્રક્ટર માં, તેમજ વિદ્યાર્થી ના સમય અને અભ્યાસની પધ્ધતિ માં ફેરફાર શક્ય બની શકે.</li>
					<li>ગુજરાત બહાર થી આવતા વિદ્યાર્થીઓને ફરજીયાત સરકાર શ્રી ના આદેશ મુજબ ઘરે કોરોનટાઇન થયા પછીજ જોઈન કરવાનું રહેશે.</li>
					<li>ક્ન્ટાઈન્ટમેન્ટ ઝોન માં રહેતા વિદ્યાર્થીઓએ ફરજીયાત સંસ્થાને જાણ કરવી અને તેમને Online શિક્ષણ લેવાનું રહેશે સંસ્થા પર આવી શકશે નહિ.</li>
					<li>જો તમારા ફેમિલી અને આજુ-બાજુ (પાડોશી) માં કોરોના પોઝિટિવ હોય તો સંસ્થા ને જાણ કરવાની રહશે અને Online શિક્ષણ લેવાનું રહશે તેઓ સંસ્થા પર આવી શકશે નહિ.</li>

					<li>વિદ્યાર્થીઓ ને પોતાના ફોન માં આરોગ્યસેતુ એપ્લિકેશન જરૂર જણાશે ત્યારે ઇન્સ્ટોલ કરાવવામાં આવશે.</li>
					<li>સંસ્થામાં વિદ્યાર્થીના સમય દરમિયાન કોઈ પણ સ્વાસ્થ્ય ને લગતા પ્રશ્ન માટે વિદ્યાર્થી અને હું (વાલી) જવાબદાર રહીશું.</li>
					<li>સરકાર શ્રી ની ગાઇડલાઇન મુજબ ડિસ્ટન્સ લર્નિંગ (Online Education) ને પ્રોત્સાહન આપવાનું હોવાથી સંસ્થા જરૂરિયાત અને શક્યતાઓને ધ્યાનમાં રાખીને ડિસ્ટન્સ લર્નિંગ નો ઉપયોગ કરી શકે છે. જેની અમે વાલી મંજૂરી આપીએ છીએ.</li>
					<li>શશક્ય હશે તો વિદ્યાર્થી ની સાથે પોતાના ઇક્વિપમેન્ટ મોક્લાવીશું જેમકે (લેપટોપ, માઉસ, વગેરે..).</li>
					<li>COVID-19 ની પરિસ્થિતિ તેમજ સરકાર શ્રી ના આદેશ મુજબ સમય લીમીટેશન અને સોશિયલ Distance ને ધ્યાનમાં રાખીને જણાવેલા સમય અને બેચ પ્રમાણે લેક્ચર થશે જે વિદ્યાર્થી આ પ્રમાણે આવી શકે તેમ નથી તેઓએ ઓનલાઇન લેક્ચર દ્વારા ભણવાનું રહેશે અને જે વિદ્યાર્થીઓ પછીથી જોઈન્ટ કરશે તેમને ચાલુ અભ્યાસક્રમ ની બેચ માં જ જોઈન્ટ થવાનું રહેશે.</li>
					
					</ol>";
									      }else{
									      	$mail->Body    = "<ol>
					<li><b>નીચેના નિયમો પ્રમાણે હું અને વિધાર્થી (મારું બાળક) સહમત છીએ.</b></li>
					<li>સંસ્થા માં પ્રવેશ દરમિયાન સ્વાસ્થ્ય ની ખરાઈ (અને હેન્ડ સેનિટાઇઝ કરવું ફરજિયાત રહેશે) તેમજ સ્વાસ્થ્ય યોગ્ય જણાશે તો જ પ્રવેશ ને પાત્ર રહેશે.</li>
					<li>વિદ્યાર્થી એ પોતાની સાથે પાણી ની એક બોટલ તેમજ નાની સેનિટાઇઝરની બોટલ લાવવી તેમજ પોતાની વસ્તુ શક્ય હોય તો અન્ય વ્યક્તિને ઉપયોગ માટે ના આપવી જેથી વિદ્યાર્થી નું સ્વાસ્થ્ય ન જોખમાય.</li>
					<li>વિદ્યાર્થીઓએ જાતે સોશિયલ ડિસ્ટન્સ, ફેસ માસ્ક, હાથ મોજા પહેરવા જેવા નિયમો નું જાતેજ ફરજીયાત પાલન કરવાનું રહેશે. શક્ય હોય ત્યાં સુધી બિન જરૂરી વસ્તુ કે જગ્યાએ સ્પર્શ ના કરવો.</li>
					<li>સરકારશ્રી ના નિયમોને માન આપતા, સંસ્થા ના આયોજન માં, ઇન્ફ્રાસ્ટ્રક્ટર માં, તેમજ વિદ્યાર્થી ના સમય અને અભ્યાસની પધ્ધતિ માં ફેરફાર શક્ય બની શકે.</li>
					<li>ગુજરાત બહાર થી આવતા વિદ્યાર્થીઓને ફરજીયાત સરકાર શ્રી ના આદેશ મુજબ ઘરે કોરોનટાઇન થયા પછીજ જોઈન કરવાનું રહેશે.</li>
					<li>ક્ન્ટાઈન્ટમેન્ટ ઝોન માં રહેતા વિદ્યાર્થીઓએ ફરજીયાત સંસ્થાને જાણ કરવી અને તેમને Online શિક્ષણ લેવાનું રહેશે સંસ્થા પર આવી શકશે નહિ.</li>
					<li>જો તમારા ફેમિલી અને આજુ-બાજુ (પાડોશી) માં કોરોના પોઝિટિવ હોય તો સંસ્થા ને જાણ કરવાની રહશે અને Online શિક્ષણ લેવાનું રહશે તેઓ સંસ્થા પર આવી શકશે નહિ.</li>

					<li>વિદ્યાર્થીઓ ને પોતાના ફોન માં આરોગ્યસેતુ એપ્લિકેશન જરૂર જણાશે ત્યારે ઇન્સ્ટોલ કરાવવામાં આવશે.</li>
					<li>સંસ્થામાં વિદ્યાર્થીના સમય દરમિયાન કોઈ પણ સ્વાસ્થ્ય ને લગતા પ્રશ્ન માટે વિદ્યાર્થી અને હું (વાલી) જવાબદાર રહીશું.</li>
					<li>સરકાર શ્રી ની ગાઇડલાઇન મુજબ ડિસ્ટન્સ લર્નિંગ (Online Education) ને પ્રોત્સાહન આપવાનું હોવાથી સંસ્થા જરૂરિયાત અને શક્યતાઓને ધ્યાનમાં રાખીને ડિસ્ટન્સ લર્નિંગ નો ઉપયોગ કરી શકે છે. જેની અમે વાલી મંજૂરી આપીએ છીએ.</li>
					<li>શશક્ય હશે તો વિદ્યાર્થી ની સાથે પોતાના ઇક્વિપમેન્ટ મોક્લાવીશું જેમકે (લેપટોપ, માઉસ, વગેરે..).</li>
					<li>COVID-19 ની પરિસ્થિતિ તેમજ સરકાર શ્રી ના આદેશ મુજબ સમય લીમીટેશન અને સોશિયલ Distance ને ધ્યાનમાં રાખીને જણાવેલા સમય અને બેચ પ્રમાણે લેક્ચર થશે જે વિદ્યાર્થી આ પ્રમાણે આવી શકે તેમ નથી તેઓએ ઓનલાઇન લેક્ચર દ્વારા ભણવાનું રહેશે અને જે વિદ્યાર્થીઓ પછીથી જોઈન્ટ કરશે તેમને ચાલુ અભ્યાસક્રમ ની બેચ માં જ જોઈન્ટ થવાનું રહેશે.</li>
					
					</ol>";
									      }
									      	// $msg = 'Your OTP is ::'.$rand."<?br>";
									      	// $mo = $decode->data[0]->mobile;
									      	$mobile = "919664635379";
											 // $msg = urlencode($msg);

											 //send personal mobile
											if($agree == 'NotAgree'){
												$msg = "હું રાજી નથી.";
											 
											}else{
													$msg = "હા, હું રાજી છું.";
											}	
											// echo $msg;

											
												 if($mail->send()){

												 } 
	
		


		
		$query1 = mysqli_query($con,$query);
		if($query1){
			$_SESSION['success'] = "Thank You For Feedback";
			unset($_SESSION['otp_check_already']);
			unset($_SESSION['otp']);
			header('location:index.php');
		}
	}
	else
	{ 
		$_SESSION['success'] = "You Already Give Feedback!! Thank You.";
		unset($_SESSION['otp_check_already']);
		unset($_SESSION['otp']);
	
		header('location:index.php');
	}
}

?>