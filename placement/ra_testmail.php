<?php

ob_start();

session_start();

$a='PHPMailer/PHPMailer/PHPMailerAutoload.php';



require $a;

$mail_formate="Hello all this is testing mail";



      $email = $_GET['email'];

    // $email =  "piyush0101nakarani@gmail.com";

      $username_student = $_SESSION['username'];

      $password_student = $_SESSION['password'];

      //$parts = explode("@", $email);

      $username = "Riddhi Borda";

      $mail = new PHPMailer;



      $mail->isSMTP();                                   // Set mailer to use SMTP

      $mail->Host = 'shared3.accountservergroup.com';                    // Specify main and backup SMTP servers

      $mail->SMTPAuth = true;                            // Enable SMTP authentication

      // $mail->Username = 'placement.rnwmultimedia@gmail.com';          // SMTP username

      // $mail->Password = 'Urvil@1221';

      $mail->Username = 'placement@rnwmultimedia.com';          // SMTP username

      $mail->Password = 'HR#red&white'; 

      // $mail->Username = 'piyush0101nakarani@gmail.com';          // SMTP username

      // $mail->Password = '0101Piyush!@#0101'; // SMTP password

      $mail->SMTPSecure = 'ssl';                         // Enable TLS encryption, `ssl` also accepted

      $mail->Port = 465;                                  // TCP port to connect to



      $mail->setFrom('placement@rnwmultimedia.com', 'Training & Placement Department -  Red & White Group of Institute');

      $mail->addReplyTo($email, 'Training & Placement Department -  Red & White Group of Institute');

      $mail->addAddress($email);   // Add a recipient

      //$mail->addCC('cc@example.com');

      //$mail->addBCC('bcc@example.com');



      $mail->isHTML(true); 

      $mail->Subject = $subject;

      // $mail->AddAttachment("index.html");

       // $mail->AddEmbeddedImage("image/spin_earn.jpg", "my-attach", "image/spin_earn.jpg");

      $mail->Body    = '

        <!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">



<head>

    <title>T&P</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="x-apple-disable-message-reformatting">

    <title></title>



    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">



    <style>

        html,

        body {

            margin: 0 auto !important;

            padding: 0 !important;

            height: 100% !important;

            width: 100% !important;

            background: #f1f1f1;

        }

        

        * {

            -ms-text-size-adjust: 100%;

            -webkit-text-size-adjust: 100%;

        }

        

        div[style*="margin: 16px 0"] {

            margin: 0 !important;

        }

        

        table,

        td {

            mso-table-lspace: 0pt !important;

            mso-table-rspace: 0pt !important;

        }

        .footer-icon td{

            width: 30px;

            height: 30px;

        }

        .footer-icon {

            text-align: center;

        }

        .footer-icon a{

            display: inline-block;

            width: 30px;

            height: 30px;

            vertical-align: middle;

        }

        .Notice_info{

            padding-left: 15px !important;

        }

        .Notice_info li{

            margin-bottom: 0px;

        }

        table {

            border-spacing: 0 !important;

            border-collapse: collapse !important;

            table-layout: fixed !important;

            margin: 0 auto !important;

        }

        

        img {

            -ms-interpolation-mode: bicubic;

        }

        

        a {

            text-decoration: none;

        }

    </style>

    <style>

        .primary {

            background: #0d0cb5;

        }

        

        .bg_white {

            background: #ffffff;

        }

        

        .bg_light {

            background: #fafafa;

        }

        

        .bg_black {

            background: #000000;

        }

        

        .bg_dark {

            background: rgba(0, 0, 0, .8);

        }

        

        .email-section {

            padding: 2.5em;

        }

        

        .worning {

            display: inline-block;

            padding: 3px 26px;

            background: #e31e25;

            color: #fff;

        }



        .blue{

            display: inline-block;

            padding: 3px 26px;

            background: #0b527e;

            color: #fff;

        }

        .cirecil{

            width: 130px;

            height: 130px;

            border-radius: 100%;

            overflow: hidden;

            display: inline-block;

            margin: 0 auto;

            border: 5px solid #fff;

            box-shadow: 0 0 6px 0 rgba(0,0,0,.2);

        }

        ol{

            margin: 0;

            padding: 0;

        }

        p{



        }

        

        .btn {

            padding: 5px 15px;

            display: inline-block;

        }

        

        .btn.btn-primary {

            border-radius: 5px;

            background: #0d0cb5;

            color: #ffffff;

        }

        

        .btn.btn-white {

            border-radius: 5px;

            background: #ffffff;

            color: #000000;

        }

        

        .btn.btn-white-outline {

            border-radius: 5px;

            background: transparent;

            border: 1px solid #fff;

            color: #fff;

        }

        

        h1,

        h2,

        h3,

        h4,

        h5,

        h6 {

            font-family: "Poppins", sans-serif;

            color: #000000;

            margin-top: 0;

            margin-bottom: 0;

        }

        

        body {

            font-family: "Poppins", sans-serif;

            font-weight: 400;

            font-size: 15px;

            line-height: 1.8;

            color: rgba(0, 0, 0, .4);

        }

        

        a {

            color: #0d0cb5;

        }

        

        .services {

            background: rgba(0, 0, 0, .03);

        }

        

        .text-services {

            padding: 10px 10px 0;

            text-align: center;

        }

        

        .text-services h3 {

            font-size: 16px;

            font-weight: 600;

        }

        .services-list p{

            color: rgba(0, 0, 0, .4);

        }

        .services-list {

            padding: 12px;

            box-sizing: border-box;

            width: 100%;

            float: left;

            text-align: center;

        }

        .services-list h5{

            margin-bottom: 0;

        }

        

        .services-list img {

            float: left;

        }

        

        .services-list .text {

            width: calc(100% - 60px);

            float: right;

        }

        

        .services-list h3 {

            margin-top: 0;

            margin-bottom: 0;

            color: #212529;

        }

        

        .services-list p {

            margin: 0;

        }

        

        .footer {

            color: rgba(255, 255, 255, .5);

        }

        

        .footer .heading {

            color: #ffffff;

            font-size: 20px;

        }

        

        .footer ul {

            margin: 0;

            padding: 0;

        }

        

        .footer ul li {

            list-style: none;

            margin-bottom: 10px;

        }

        

        .footer ul li a {

            color: rgba(255, 255, 255, 1);

        }

        

        @media screen and (max-width: 500px) {

            .icon {

                text-align: left;

            }

            .text-services {

                padding-left: 0;

                padding-right: 20px;

                text-align: left;

            }

        }

    </style>



</head>



<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #222222;">

    <center style="width: 100%; background-color: #f1f1f1;">

        <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">

        </div>

        <div style="max-width: 600px; margin: 0 auto;" class="email-container">

            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">

                <tr>

                    <td valign="top" class="bg_white" style="padding: 1em 2.5em;">

                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">

                            <tr>

                                <td style="text-align: center;">

                                    <a href="https://www.rnwmultimedia.com/"><img src="https://demo.rnwmultimedia.com/placement/images/rnwLogo.png" width="70%"></a>

                                </td>

                            </tr>

                        </table>

                    </td>



                     

                </tr>

                    <tr>

                        <td class="bg_white">

                            <div class="blue">



                                <h2 style="color: white; text-align: center; text-decoration: underline;">Please Note this First</h2>

                                <ol style="padding:10px;">

                                    <li>Complete your Syllabus First.</li>

                                    <li>Finish your all Project Work.</li>

                                    <li>Prepare your Resume</li>

                                    <li>Meet TPO on Friday 10:00 AM to 12:00 PM @RW1 (AK Road) @ TPO Office, 3rd Floor.</li>

                                </ol>



                                <h2 style="text-align: center; font-size: 26px; font-weight: 500; margin-bottom: 0; color: #fff; padding-top: 10px;">Placement Department Notice</h2>

                                <ul style="padding: 0; margin: 0;" class="Notice_info">

                                    <li>

                                        This is an automated e-mail to confirm we have received your application and our Training & Placement Officer will work on it, within 4 to 5 days..

                                    </li>

                                    <li>

                                        Red &White Group of Institutes is one of the best institute, which provides a wide range of courses in Multimedia, fashion, interior design etc. We have created our brand image by providing the best education and thats why our students are extremely satisfied with our service.

                                    </li>

                                    <li>

                                        Here I am forwarding you details about our Placement Officer.

                                    </li>

                                    <li>

                                        The job form you have filled and the terms and conditions of the placement have been forwarded to you. If you have any problems with placement in the future, you can contact us.

                                    </li>

                                </ul>

                                <table>

                                    <tr>

                                        <td width=""></td>

                                        <td width="100%" align="right">

                                            <ul style="list-style: none; padding:15px 0 15px 0; margin: 0;">

                                                <li>T&P Officer Contact Details :</li>

                                                <li>Training & Placement Officer,</li>

                                                <li>Red & White Group of Institutes.</li>

                                                <li>Contact No :- <a href="tel:9331313196" style="color: #fff; text-decoration: underline;"><strong>+91 933 131 3196</strong></a></li>

                                                <li>Email :- <a href="mailto:placement@rnwmultimedia.com" style="color: #fff; text-decoration: underline;"><strong>placement@rnwmultimedia.com</strong></a></li>

                                                <li>Website :- <a href="www.rnwmultimedia.com" style="color: #fff; text-decoration: underline;"><strong> www.RNWMULTIMEDIA.com</strong></a></li>

                                            </ul>

                                        </td>

                                    </tr>   

                                </table>

                            </div>

                        </td>

                    </tr>

                </tr>

                <tr>

                </tr>

              



                <tr>

                    <td class="bg_white">

                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">

                            <tr>

                                <td class="bg_white" style="padding-top: 30px;">

                                    <div class="heading-section" style="text-align: center; padding: 0 30px;">

                                        <h2>Job Application Rules</h2>

                                        <div style="text-align: left; padding-left: 20px; color: #000;">

                                            <div>

                                                <h3>Student Rules</h3>

                                                <ol style="padding-left: 15px;">

                                                   <li>

                                                       પોતાની બ્રાન્ચ ના Training & Placement Responsible Person ને મળવું. જો વિદ્યાર્થી Main Branch ના છે તો એમને આ બ્રાન્ચ ના Training & Placement Department ની મુલાકાત લેવી.

                                                   </li>

                                                   <li>

                                                       Training & Placement Responsible Person જે પ્રમાણે સૂચના આપે આ પ્રમાણે વિદ્યાર્થીએ કાર્ય કરવાનું રહેશે.

                                                   </li>

                                                   <li>

                                                       જ્યારે પણ વિદ્યાર્થી ને Work અને Resume લઈને આવવા જાણવવામાં આવે ત્યારે નિયત કરેલા સમય કરતા ૧૫ મિનિટ વહેલા આવવાનું રહેશે. જો 

                                                   </li>

                                                   <li>

                                                       કોઈ વિદ્યાર્થી નિયત કરેલા સમય કરતા મોડો આવે છે અને જો એમને રાહ જોવી પડે છે તો એમના માટે એ પોતે જવાબ`દાર રહેશે.

                                                   </li>

                                                   <li>

                                                       જો તમને કોઈ પણ Work (Task) આપવામાં આવ્યું છે તો એ Work તમારે Faculty ને નિયત કરેલા સમયે બતાવાનું રહેશે.

                                                   </li>

                                                   <li>

                                                       જયારે પણ વિદ્યાર્થી Work અને Resume લઈને આવે છે ત્યારે એમને Resume ની Hard અને Soft એમ બંને Copy લાવવાની રહેશે.

                                                   </li>

                                                   <li>

                                                       જયારે વિદ્યાર્થી વર્ક લઈને આવે છે ત્યારે એમને પ્રોજેક્ટ જેમાંથી બનાવ્યો છે એ પ્રોજેક્ટ અથવા એની જો Link હોઈ તો એ લઈને આવવું ખુબજરૂરી છે.

                                                   </li>

                                                   <li>

                                                       વિદ્યાર્થી જયારે પણ Interview માટે જાય છે તો Compaulsary એમને Formal Dress Wearing કરવાના રહેશે.

                                                   </li>

                                                   <li>

                                                       Online Application Apply કાર્ય પછી Interview Schedule કરવા માટે 4-5 દિવસ સુધી માં તમને Phone અથવા Whatsapp (Massage) દ્વારા 

                                                       જાણ કરવા માં આવશે.

                                                   </li>

                                                   <li>

                                                       નક્કી કરેલા દિવસો કરતા વધારે કે ઓછા દિવસો થઈ શકે છે તો એમના માટે વિદ્યાર્થી કે વાલી મિત્રો એ સહકાર આપવો.

                                                   </li>

                                                   <li>

                                                       Job માં Final થઇ ગયા પછી Running Lecture નું Faculty જોડે Setting કરીને Morning અથવા Evening માં Lecture Arrange કરવો અને Management નક્કી કરેલ એ Faculty દ્વારા Lecture લેવામાં આવશે એ મને મંજુર છે.

                                                   </li>

                                                   <li>

                                                       જો કોઈ વિદ્યાર્થી નો Course લાંબા સમય માટે HOLD પર છે. અને જો કોઈપણ પ્રકાર ની HOLD Application આપેલ નથી તો તેનો Course Automatic Cancelled થવાને પાત્ર છે.

                                                   </li>

                                                   <li>

                                                       RNW Placement પાસે Current માં જે Company, Position & Location હશે તે પ્રમાણે Interview Schedule કરી આપવામાં આવશે જો તમારું Prefer Location નહીં હોય તો તેના માટે તમારે રાહ જોવી પડશે અથવા તો જે લોકેશન પર જોબ Available છે ત્યાં Interview માટે જવું પડશે.

                                                   </li>

                                                </ol>

                                            </div>

                                            <div style="padding-top: 10px;">

                                                <h3>Resume</h3>

                                                <h4 style="margin: 0;">વિદ્યાર્થી એ Resume માં નીચે પ્રમાણે ની કાળજી રાખવી.</h4>

                                                <ol style="padding-left: 15px;">

                                                   <li>

                                                       Resume માં Reference માં " Red & White Group of Institutes " લખવું.

                                                   </li>

                                                   <li>

                                                       વિદ્યાર્થીએ Career Goal / Objective Resume માં લખવો જેથી કંપનીને એને આધારે Decision લઈ શકે.

                                                   </li>

                                                   <li>

                                                       વિદ્યાર્થીએ Professional Resume બનાવવાનું રહેશે.

                                                   </li>

                                                </ol>

                                            </div>

                                            <div style="padding-top: 10px;">

                                                <h3>Before Interview </h3>

                                                <ol style="padding-left: 15px;">

                                                    <li>

                                                        કંપની માં ઇન્ટરવ્યૂ માટે જતા પહેલા તેની Website & Social Media Check કરી તેના વિશે જાણકારી મેળવી લેવી.

                                                    </li>

                                                    <li>

                                                        તમારે Job Profile ને તપાસવી અને સમજવી આવશ્યક છે, જેના માટે તમે Available છે ત્યાં Interview માં ભાગ લેવા જઇ રહ્યા છો.

                                                    </li>

                                                    <li>

                                                        અમારી સંસ્થા દ્વારા તમારા Available છે ત્યાં Interview ની ગોઠવણી કર્યા પછી, જો તમે કોઈ કારણોસર તેમાં હાજર રહેવા માટે અસમર્થ 

                                                    </li>

                                                    <li>

                                                        છો, તો તમારે કંપની અને અમારા Placement અધિકારીને ફોન દ્વારા અગાઉથી જાણ કરવી પડશે.

                                                    </li>

                                                </ol>

                                            </div>

                                            <div style="padding-top: 10px;">

                                                <h3>Discipline</h3>

                                                <ol style="padding-left: 15px;">

                                                    <li>

                                                        વિદ્યાર્થીઓએ Placement પ્રક્રિયા દરમિયાન લેતી દરેક ક્રિયામાં શિસ્ત જાળવવી જોઈએ અને નૈતિક વર્તન બતાવવું જોઈએ. કોઈપણ વિદ્યાર્થી કંપની દ્વારા નિયુક્ત શિસ્ત નિયમોનું ઉલ્લંઘન કરતી હોય અથવા સંસ્થાના નામની બદનામી કરતું જોવા મળે છે, તેને બાકીના શૈક્ષણિક વર્ષ માટે પ્લેસમેન્ટમાંથી મંજૂરી આપવામાં આવશે નહીં.

                                                    </li>

                                                    <li>

                                                        પસંદગી પ્રક્રિયામાં (છેતરપિંડી / જીડી / ઇન્ટરવ્યુ) છેતરપિંડી અથવા ગેરવર્તણૂંક કરનાર વિદ્યાર્થીઓને બાકીના શૈક્ષણિક વર્ષ માટે Placement માંથી મંજૂરી આપવામાં આવશે નહીં.

                                                    </li>

                                                    <li>

                                                        Company માં Work, Salary, Work કે Data, Misbehavior કે કોઈપણ પ્રકાર ના કારણોસર Rusticate કરવામાં આવે તો તમારા Bond ના Document & Salary માટે તમે જ જવાબદાર રહેશો. એમના માટે RNW Placement કોઈપણ જવાબદારી લેતુ નથી.

                                                    </li>

                                                </ol>

                                            </div>

                                            <div style="padding-top: 10px;">

                                                <h3>Job Offers</h3>

                                                <ol style="padding-left: 15px;">

                                                   <li>

                                                       Company માં Salary, Bond, Timing, Leave નું Discussion કરીને જ Final Bound કરવો.

                                                   </li>

                                                   <li>

                                                       Company ની Terms & Condition પ્રમાણે 6 Month Internship અથવ 1.5 Year નો Bond રહેશે.

                                                   </li>

                                                   <li>

                                                       Offer Letter ની નકલ Placement Department માં Submit કરવાની રહેશે.

                                                   </li>

                                                   <li>

                                                       જો વિદ્યાર્થી ને બીજી નોકરીની Offer કરવામાં આવે છે, તો તેણે / તેણીએ કંપની ને અફસોસ નો પત્ર આપવો જ જોઇએ, જેમાં પ્રથમ નોકરી અને બીજીને સ્વીકૃતિ નો પત્ર આપવામાં આવ્યો હતો.

                                                   </li>

                                                   <li>

                                                       Job Offer સ્વીકાર્યા પછી, જો કોઈ પણ વિદ્યાર્થી વર્ષ દરમિયાન કોઈપણ સમયે તેની સ્વીકૃતિ પાછો લેવાનો નિર્ણય લે છે, તો તેણે સંબંધિત Company ને તાત્કાલિક જાણ કરવી પડશે.

                                                   </li>

                                                   <li>

                                                       પોસ્ટ પ્લેસમેન્ટ :- જો કોઈ પણ કારણસર Company ની ઉમેદવારની Joining બંધ કરે છે તો એના માટે Collage કે Institute જવાબદાર નથી.

                                                   </li>

                                                </ol>

                                            </div>

                                        </div>

                                    </div>

                                </td>

                            </tr>

                        </table>

                    </td>

                </tr>

               

                <tr>

                    <td class="bg_white">

                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">

                            <tr>

                                <td class="bg_white" style="padding-top: 0;">

                                    <div class="heading-section" style="text-align: center; padding: 30px 30px 0px;">

                                        <h2>Interview Tips</h2>

                                        <div style="text-align: left; padding-left: 20px; padding-bottom: 30px; color: #000;">

                                            <ol style="padding-left: 5px;">

                                                <li>Tell me about yourself</li>

                                                <li>What are your greatest strengths?</li>

                                                <li>What are your greatest weaknesses?</li>

                                                <li>Why are you leaving (or did you leave) this position?</li>

                                                <li>Why should I hire you?</li>

                                                <li>Why do you want to work at our company?</li>

                                                <li>What changes would you make if you came on board?</li>

                                                <li>Can you work under pressure?</li>

                                                <li>Tell me about your work in the last company</li>

                                                <li>Give me an example where you showed good team spirit</li>

                                            </ol>

                                            <div style="text-align: center;">

                                                <a href="https://www.workindia.in/interview-questions-and-tips/" style="display: inline-block; background: #c52410; color: #fff; padding: 4px 14px; border-radius: 3px; margin-top:24px; font-size: 14px;">View More Tips</a>

                                            </div>

                                        </div>

                                    </div>

                                </td>

                            </tr>

                        </table>

                    </td>

                </tr>

            </table>

              <tr>

                        <td class="bg_white">

                            <div class="worning" style="background-color:#0b527e;padding: 12px 39px;">

                                <h2 style="text-align: center; font-size: 26px; font-weight: 600; margin-bottom: 0; color: #fff; padding-top: 10px;">:: Your Username & Password is below ::</h2>

                                <ul style="padding: 0; margin: 0; list-style: none;" class="Notice_info">

                                    <li>

                                        Username : <span style="color: #fff; margin-bottom: 5px; margin-top: 0px;">'.$username_student.'</span>

                                    </li>

                                    <li>

                                       Password  : <span style="color: #fff; margin-bottom: 5px; margin-top: 0px;">'.$password_student.'</span>

                                    </li>



                                    <li>

                                       <div style="text-align: center;">

                                                <a href="http://demo.rnwmultimedia.com/placement/" style="display: inline-block; background: #c52410; color: #fff; padding: 4px 14px; border-radius: 3px; margin:12px 0; font-size: 14px;">Go & Find Jobs</a>

                                            </div>

                                    </li>

                                   

                                </ul>

                               

                            </div>

                        </td>

                </tr>

            </td>

            </tr>

              <tr>

                    <td class="">

                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">

                            <tr>

                                <td class="" style="padding-top: 30px;">

                                    <div class="heading-section" style="text-align: center; padding: 0 30px; color: rgba(0, 0, 0, .4);">

                                        <h2>Old Placement Student</h2>

                                        <p>Red and White Group of Institutes is the only institute in Surat where their students are always dreaming of doing something new.</p>

                                    </div>

                                </td>

                            </tr>

                        </table>

                    </td>

                </tr>

                <tr>

                    <td class="bg_white">

                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">

                            <tr>

                                <td valign="top" width="50%">

                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">

                                        <tr>

                                            <td style="padding-top: 20px; padding-right: 10px; text-align: center;">

                                                <a class="cirecil" href="https://www.rnwmultimedia.com/student-placements/" target="_blank"><img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/01/Bhavdip-Sanghani-min.jpg" alt="" style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;"></a>

                                                <div class="services-list">

                                                    <h4>RWn. Bhavdip Sanghani</h4>

                                                    <span>(Album Designer)</span>

                                                    <p style="font-weight: 600;">Photo crate</p>

                                                </div>

                                            </td>

                                        </tr>

                                    </table>

                                </td>

                                <td valign="top" width="50%">

                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">

                                        <tr>

                                            <td style="padding-top: 20px; padding-right: 10px; text-align: center;">

                                                <a class="cirecil" href="https://www.rnwmultimedia.com/student-placements/" target="_blank"><img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/01/Jalak-Savaliya-min.jpg" alt="" style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;"></a>

                                                <div class="services-list">

                                                    <h4>RWn. Jalak Savaliya</h4>

                                                    <span>(Graphic Designer )</span>

                                                    <p style="font-weight: 600;">Vraj Technologies</p>

                                                </div>

                                            </td>

                                        </tr>

                                    </table>

                                </td>

                            </tr>

                        </table>

                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">

                            <tr>

                                <td valign="top" width="50%">

                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">

                                        <tr>

                                           <td style="padding-top: 20px; padding-right: 10px; text-align: center;">

                                               <a class="cirecil" href="https://www.rnwmultimedia.com/student-placements/" target="_blank"><img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/03/Raju-Singh-min.jpg" alt="" style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;"></a>

                                               <div class="services-list">

                                                <h4>RWn. Raju Singh Rajput</h4>

                                                <span>(Front-end Developer)</span>

                                                <p style="font-weight: 600;">Winter infotech</p>

                                               </div>

                                           </td>

                                        </tr>

                                    </table>

                                </td>

                                <td valign="top" width="50%">

                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">

                                        <tr>

                                            <td style="padding-top: 20px; padding-right: 10px; text-align: center;">

                                                <a class="cirecil" href="https://www.rnwmultimedia.com/student-placements/" target="_blank"><img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/01/krishna-zalavadiya-min.jpg" alt="" style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;"></a>

                                                <div class="services-list">

                                                    <h4>RWn. Krishna Zalavadiya</h4>

                                                    <span>(Web Designing)</span>

                                                    <p style="font-weight: 600;">Hevin Technoweb</p>

                                                </div>

                                            </td>

                                        </tr>

                                    </table>

                                </td>

                            </tr>

                            <tr style="text-align: center;">

                                <td colspan="2">

                                    <a href="https://www.rnwmultimedia.com/student-placements/" style="display: inline-block; background: #c52410; color: #fff; padding: 4px 14px; border-radius: 3px; margin: 14px 0; font-size: 14px;">View More</a>

                                </td>

                            </tr>

                        </table>

                    </td>

                </tr>

            </table>

            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">

                <tr>

                    <td valign="middle" class="blue footer email-section" style="padding-bottom: 0; padding-top: 0;">

                        <table>

                            <tbody>

                                <tr style="font-size: 14px;">

                                    <td valign="top" width="33.333%" style="padding-top: 20px;">

                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">

                                            <tbody>

                                                <tr>

                                                    <td style="text-align: left; padding-left: 5px; padding-right: 5px;">

                                                        <h3 class="heading" style="margin-bottom: 10px;">Contact Info</h3>

                                                        <table width="100%">

                                                            <tr>

                                                                <td><p style="color: #fff; margin-bottom: 5px; margin-top: 0px;">A.K.Road : <a style="color: #ffc107;" href="tel:9327506324"> +91 93275 06324</a></p>

                                                                </td>

                                                                <td>

                                                                    <p style="color: #fff; margin-bottom: 5px; margin-top: 0px;">YOGI CHOWK : <a style="color: #ffc107;" href="tel:7650050042"> +91 76500 50042</a></p>

                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>

                                                                    <p style="color: #fff; margin-bottom: 5px; margin-top: 0px;">SARTHANA : <a style="color: #ffc107;" href="tel:7650050042">+91 78787 80511</a></p>

                                                                </td>

                                                                <td>

                                                                    <p style="color: #fff; margin-bottom: 5px; margin-top: 0px;">MOTA VARACHHA : <a style="color: #ffc107;" href="tel:9277760777"> +91 92777 60777</a></p>

                                                                </td>

                                                            </tr>

                                                        </table>

                                                        <div style="margin: 5px 0 10px;" class="footer-icon">

                                                            <table width="30%" align="center">

                                                                <tr>

                                                                    <td><a href="https://www.facebook.com/rnwmultimedia"><img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/04/Facebook_Icon.png" width="30px"></a></td>

                                                                    <td><a href="https://twitter.com/rnw_multimedia"><img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/04/Twitter_Icon.png" width="30px"></a></td>

                                                                    <td><a href="https://www.linkedin.com/in/rnwmultimedia/"><img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/04/Linkedin_Icon.png" width="30px"></a></td>

                                                                    <td><a href="https://www.youtube.com/user/hitesdesai"><img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/04/YouTube_Icon.png" width="30px"></a></td>

                                                                    <td><a href="https://www.instagram.com/rnwmultimedia/"><img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/04/Instagram_Icon.png" width="30px"></a></td>

                                                                </tr>

                                                            </table>

                                                        </div>

                                                    </td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </td>

                </tr>

                <tr>

                   <td valign="middle" class="blue footer email-section" style="text-align: center; padding-top: 0; padding-bottom: 0;">

                       <table>

                           <tbody>

                               <tr>

                                   <td valign="top" width="100%">

                                       <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">

                                           <tbody>

                                               <tr>

                                                   <td style="text-align: left; padding-right: 10px; text-align: center;">

                                                       <p style="margin-top: 0;">© Copyright 2020. Red & White Group of Institutes. All Rights Reserved.</p>

                                                   </td>

                                               </tr>

                                           </tbody>

                                       </table>

                                   </td>



                               </tr>

                           </tbody>

                       </table>

                   </td>

                </tr>



              

            </table>



        </div>

    </center>

</body>



</html>';





       if(!$mail->send()) {

         echo 'Message could not be sent.';

         echo 'Mailer Error: ' . $mail->ErrorInfo;

       } 

       else

       { 

        session_start();

        // $this->session->set_flashdata('resetmsg','reset link sent successfully.'); 

        // redirect(base_url().'owner_controller/forgotpassword_cont');

        $_SESSION['send'] = "mail send";

        $_SESSION['success'] = "SuccessFully Registered";

         // session_destroy();

        header('location:ra.php');



        

        

         // echo "<script>

         //     alert('Approve data successfull mailll pn');

         //    window.location.href='user_issue.php';

         //     </script>";



        

       }





       ?>