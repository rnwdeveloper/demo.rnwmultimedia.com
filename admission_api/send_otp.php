<?php
    $a='PHPMailer/PHPMailer/PHPMailerAutoload.php';
    require $a;
    session_start();
    include('config_api.php');
    ob_start();

    $foo = true;
    $faa = false;

    $mobile = $_POST['mobile'];

    if($mobile != ""){
        $query = "SELECT * FROM admission_process WHERE mobile_no='$mobile'";
        $query1 = "SELECT * FROM admission_process WHERE father_mobile_no='$mobile'";
        $query2 = "SELECT * FROM admission_process WHERE mother_mobile_no='$mobile'";

        $result = mysqli_query($con,$query);
        $result1 = mysqli_query($con,$query1);
        $result2 = mysqli_query($con,$query2);

        if(mysqli_num_rows($result)==1){
            $res = mysqli_fetch_assoc($result);
            $send_email_id = $res['email'];
            $send_mobile_no = $res['mobile_no'];
        } else if(mysqli_num_rows($result1)==1){
            $res1 = mysqli_fetch_assoc($result1);
            $send_email_id = $res1['father_email'];
            $send_mobile_no = $res1['father_mobile_no'];
        } else if(mysqli_num_rows($result2)==1){
            $res2 = mysqli_fetch_assoc($result2);
            $send_email_id = $res2['mother_email'];
            $send_mobile_no = $res2['mother_mobile_no'];
        }
        else {
            $record = array('status' => $faa, 'msg' => "multiple numbers records.", 'otp'=>"");
        }

        $emailRand =  rand(100000,999999);
        $mail_formate="Hello all this is testing mail";
        $username = "RNW";
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
        $mail->setFrom($masterEmail, 'RNW Admission Department -  Red & White Group of Institute');
        $mail->addReplyTo($send_email_id, 'RNW Admission Department -  Red & White Group of Institute');
        $mail->addAddress($send_email_id);   // Add a recipient
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
        $mail->isHTML(true); 
        $mail->Subject = "CHECK YOUR OTP";
        // $mail->AddAttachment("index.html");
        // $mail->AddEmbeddedImage("image/spin_earn.jpg", "my-attach", "image/spin_earn.jpg");
    
        $mail->Body 	 = "Red & White Admission Portal<br>";
        $mail->Body    .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OTP : <b>'.$emailRand."</b><br>";
        $mail->Body 	 .= "Please Do Not Share It<br>";
        
        if(!$mail->send()) {

            $record = array('status' => $faa, 'msg' => "OTP SEND Failed Email Not Found!","data"=>array( 'otp'=>0, 'email'=>$send_email_id));
        } else { 
            $record = array('status' => $foo, 'msg' => "OTP SEND Success","data"=>array( 'otp'=>$emailRand, 'email'=>$send_email_id,'mobile'=>$send_mobile_no));
        }
    } else {
        $record = array('status' => $faa, 'msg' => "Enter Valid Phone Number","data"=>array('otp'=>0, 'email'=>""));
    }
    header('Content-type: application/json');
    echo json_encode($record);
?>