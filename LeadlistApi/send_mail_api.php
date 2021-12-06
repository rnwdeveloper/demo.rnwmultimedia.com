<?php


include 'config_api.php';
mysqli_set_charset($con, "utf8mb4"); 



ob_start();

session_start();

$a='PHPMailer/PHPMailer/PHPMailerAutoload.php';



require $a;

$mail_formate="Hello all this is testing mail";



      $email = $_POST['email'];

      $user_email = $_POST['user_email'];

      $mail_id = $_POST['mail_id'];

      $lead_list_id = $_POST['lead_list_id'];

    // $email =  "piyush0101nakarani@gmail.com";

      if(!empty($email) && !empty($mail_id) && !empty($lead_list_id) && !empty($user_email)){



        $que = "select category, html_template from email_template_category where `id`='$mail_id'";

        $que1   = mysqli_query($con,$que);

        $que2 	= mysqli_fetch_assoc($que1);

        $msg_mail =  $que2['html_template'];

        $msg_title = $que2['category'];



        $username_student = $_SESSION['username'];

        $password_student = $_SESSION['password'];

        //$parts = explode("@", $email);

        $username = "Riddhi Borda";

        $mail = new PHPMailer;



        $mail->isSMTP();                                   // Set mailer to use SMTP

        $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers

        $mail->SMTPAuth = true;                            // Enable SMTP authentication

        // $mail->Username = 'placement.rnwmultimedia@gmail.com';          // SMTP username

        // $mail->Password = 'Urvil@1221';

        $mail->Username = 'piyush0101nakarani@gmail.com';          // SMTP username

        $mail->Password = '0101Piyush!@#$0101'; 

        // $mail->Username = 'piyush0101nakarani@gmail.com';          // SMTP username

        // $mail->Password = '0101Piyush!@#0101'; // SMTP password

        $mail->charSet = "UTF-8"; 

        $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted

        $mail->Port = 25;                                  // TCP port to connect to

        $mail->setFrom($email, $msg_title.'Red & White Group of Institutes');

        $mail->addReplyTo($email, $msg_title.'Red & White Group of Institutes');

        $mail->addAddress($email);   // Add a recipient

        //$mail->addCC('cc@example.com');

        //$mail->addBCC('bcc@example.com');



        $mail->isHTML(true); 

        $mail->Subject = $subject;

        // $mail->AddAttachment("index.html");

        // $mail->AddEmbeddedImage("image/spin_earn.jpg", "my-attach", "image/spin_earn.jpg");

        $mail->Body = html_entity_decode($msg_mail);





        if(!$mail->send()) {

          $person = array( 

            "status" => "2", 

            "message" => "Message could not be sent. " . $mail->ErrorInfo

          );

    

          //  echo 'Message could not be sent.';

          //  echo 'Mailer Error: ' . $mail->ErrorInfo;

        } 

        else

        { 

          session_start();

          // $this->session->set_flashdata('resetmsg','reset link sent successfully.'); 

          // redirect(base_url().'owner_controller/forgotpassword_cont');

          $_SESSION['send'] = "mail send";

          $_SESSION['success'] = "SuccessFully Registered";

          session_destroy();



          // header('location:student_placement_form.php');



          $person = array( 

            "status" => "1", 

            "message" => "Message Send Success Full."

          );

          

          date_default_timezone_set('Asia/Kolkata');

          $datetime = date('m/d/Y H:i A');

          $h_query 	= "select name,user_id from user where `email`='$user_email'";

          $h_query1 		= mysqli_query($con,$h_query);

          $h_query2			= mysqli_fetch_assoc($h_query1);

          $name 			= $h_query2['name'];

          $user_id 		= $h_query2['user_id'];

          $recepient_id 	= $_POST['lead_list_id'];

          $type 			= 'EMAIL';			

          $msg 			= $msg_mail;

          $link = "https://demo.rnwmultimedia.com/LeadlistApi/email_template_show.php?id=$mail_id";





          $quee = "insert into lead_followup_history(`user_id`,`user_role`,`recepient_id`,`type`,`comment`,`subject`,`timing_sender`,`status`,`mail_link`)values('$user_id','$name','$recepient_id','$type','$msg','$msg_title','$datetime','success','$link')";



          $quee1 = mysqli_query($con,$quee);

        

          // echo "<script>

          //     alert('Approve data successfull mailll pn');

          //    window.location.href='user_issue.php';

          //     </script>";



        }



      } else {



        $person = array( 

          "status" => "0", 

          "message" => "Please Send Requier Data"

        );





      }

   



    echo json_encode($person);



?>