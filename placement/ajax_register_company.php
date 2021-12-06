<?php



	session_start();

    include('db.php');

	$a='PHPMailer/PHPMailer/PHPMailerAutoload.php';

	require $a;





	if(isset($_POST['RegisterCompany']))

      {

        $company_name           =  $_POST['company_name'];

        $address                =  $_POST['company_address'];

        $phone                  =  $_POST['company_phone_no'];

        $url                    =  $_POST['company_url'];

        $recruiter_name         =  $_POST['employer_name'];

        $recruiter_designation  =  $_POST['employer_designation'];

        $email                  =  $_POST['employer_email'];

        $password               =  $_POST['password'];

        $cpassword              =  $_POST['cpassword'];

        $tc                     =  @$_POST['agreeterms'];

        $date                   =  date('Y-m-d');



        



         $que ="select * from company_detail where `email_id`='$email' OR `company_name`='$company_name'";

        $que1 = mysqli_query($con,$que);

         $numu = mysqli_num_rows($que1);



        if($numu ==  0){



       

           

            if($email)

            {



              $email = $email;

              // $username = "";

              $mail = new PHPMailer;



              $mail->isSMTP();                                   // Set mailer to use SMTP

              $mail->Host = $emailHost;                    

              $mail->SMTPAuth = true;                            // Enable SMTP authentication

              // $mail->Username = 'placement.rnwmultimedia@gmail.com';          // SMTP username

              // $mail->Password = 'Urvil@1221';

              // $mail->Username = 'spintoearn123@gmail.com';          // SMTP username

              // $mail->Password = 'spintoearn12325102514'; 

              $mail->Username = $masterEmail;          // SMTP username

              $mail->Password = $masterPassword ; // SMTP password

              $mail->SMTPSecure = 'ssl';                         // Enable TLS encryption, `ssl` also accepted

              $mail->Port = 465;                                  // TCP port to connect to


              $mail->setFrom($masterEmail, 'Training & Placement Department -  Red & White Group of Institutes');

              $mail->addReplyTo($email, 'Training & Placement Department -  Red & White Group of Institutes');

              $mail->addAddress($email);  



              $mail->isHTML(true); 

              $mail->Subject = "Terms & Conditions";

              // $mail->AddAttachment("index.html");

               // $mail->AddEmbeddedImage("image/spin_earn.jpg", "my-attach", "image/spin_earn.jpg");

              $mail->Body    = '<div style="max-width: 600px; margin: 0 auto;" class="email-container">

          

            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">

                 <tr>

                    <td class="bg_white logo" style="padding: 1em 2.5em; text-align: center; line-height: normal; background-color: #f7f7f7; padding: 20px 0;">

                        <a href="https://www.rnwmultimedia.com/gim-course-surat/" style="display: inline-block;"><img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/03/logo.png" width="70%"></a>

                    </td>

                </tr>

                <!-- end tr -->

                <tr>

                    <td valign="top" style="background-color: #fff; padding:20px 18px 20px;line-height:125%;word-break:break-word;color:#000000;font-family:Helvetica;font-size:16px;text-align:left;">



                  <h2 style="text-align: center; line-height: 25px;"> Training & Placement Policy of<br><br> Red & White Group of Institutes</h2><br>
                      
                  <p>Red & White Group of Institutes offers a variety of courses in the field of IT, Multimedia (Designing & Development), Fashion, and Interior.</p>

                <p>Red & White Group of Institutes is an organization that runs a Training & Placement  (T&P) Department for the students and companies that are looking for potential candidates for their suitable requirements which will help to make Surat an IT HUB. However, Red & White is not a placement consultancy, in particular, so after the selection of candidates, Red & White is not bound to any responsibilities. Still, we will always be ready to provide necessary support and help, for which Red & White will not take any charge.</p>
                  
                <p>For this, first of all, the company needs to register itself on the <a href="https://demo.rnwmultimedia.com/placement/" style="color:blue;">T&P Department’s requirement portal</a> and after that need to post the requirements for any position. After that T&P department will arrange the interview according to the suitability of time and other parameters <b>within 7 working days</b>.</p>
              
              <p>All the details regarding student placement such as student’s absence on the interview day, selection result, or any future update regarding student’s behavior and punctuality must be provided to the T&P department on a regular basis.</p>

              <p>The company can be applied for the campus interview If a company has <b>more than 40 employees</b>. In this procedure, the company can visit the institute for the selection process after letting the T&P department know.</p>

              <p><b>Institute can use the logo of a placement partner company, and can also enlist them as a partner list. Institute can send future students to visit the company for practical knowledge, and if needed the partner company must arrange the field expert for the knowledge sharing with students.</b></p>



              <p>If the candidates course is running and he\she gets selected on basis of his current knowledge, then to complete his remaining course company must arrange his job hours according to the lecture timing.</p>

              <p>The availability of the T&P department for contact is only on <b>Tuesday and Friday from 12:00 PM to 1:00 PM & 2:00 PM to 4:00 PM</b></p>

              <p>After the selection of candidates, the company must issue the offer/joining letter of the same.</p>
              
              <p>We expect you to provide your experiences and feedback in the medium of video review via mail to us.</p>





<p>Thank You.<br/>

Red & White Group of Institutes<br/>

<a href="www.rnwmultimedia.com">www.rnwmultimedia.com</a></p>



                    </td>

                </tr>

                <!-- end:tr -->

                <!-- 1 Column Text + Button : END -->

            </table>

            

              <table align="center" width="100%" style="margin:auto;" cellpadding="0" cellspacing="0" border="0" style="background-color: gray">

              <tr >

                <td valign="top" style="font-family:Helvetica;font-size: 20px; color:red; text-align: center; background-color: lightgray">Your Email and Password</td>

              </tr>

              <tr >

                <td valign="top" style="background-color: #fff; line-height:10%;word-break:break-word;color:#000000;font-family:Helvetica;font-size:16px;text-align:left; background-color: lightgray">



                      <h2 style="text-align: center; line-height: 25px;font-family: Helvetica; font-size:16px;" >'.$email.'<br>'.$password.'</h2><br>



                </td>

              </tr>



            </table>

        </div>';





               if(!$mail->send()) {

                

                echo "0";

               }

               else{ 

               	echo "1";

                 $query ="insert into company_detail(`company_name`,`company_address`,`company_number`,`url`,`employer_name`,`employer_designation`,`email_id`,`password`,`agreeterms`,`date`,`status`)values('$company_name','$address','$phone','$url','$recruiter_name','$recruiter_designation','$email','$password','$tc','$date','1')";

                 mysqli_query($con,$query);

       //          session_start();

       //          $_SESSION['send'] = "mail send";

       //          $_SESSION['success'] = "SuccessFully Registered";

			    // $data_success = "Company Detail Insert Successfull!! After few days We will Conatct You Thank You!!";

                }

          }

      }else

      {

      	echo "2";

      }

      }





?>