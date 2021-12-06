<?php require_once "vendor/autoload.php"; //PHPMailer Object 
$mail = new PHPMailer; //From email address and name 
$mail->From = "demo.rnwmultimedia.com"; 
$mail->FromName = "RNW Placement Depratment"; //To address and name 
$mail->addAddress("piyush0101nakarani@gmail.com", "Recepient Name");//Recipient name is optional
$mail->addAddress("piyush0101nakarani@gmail.com"); //Address to which recipient will reply 
$mail->addReplyTo("piyush0101nakarani@gmail.com", "Reply"); //CC and BCC 
// $mail->addCC("cc@example.com"); 
// $mail->addBCC("bcc@example.com"); //Send HTML or Plain Text email 
$mail->isHTML(true); 
$mail->Subject = "Subject Text"; 
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = "This is the plain text version of the email content"; 
if(!$mail->send()) 
{
echo "Mailer Error: " . $mail->ErrorInfo; 
} 
else { echo "Message has been sent successfully"; 
}
if(!$mail->send()) 
{ 
echo "Mailer Error: " . $mail->ErrorInfo; 
} 
else 
{ 
echo "Message has been sent successfully"; 
}