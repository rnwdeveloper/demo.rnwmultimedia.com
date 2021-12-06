<?php
set_time_limit(4000);


// Connect to gmail
$hostname = '{imap.gmail.com:993/imap/ssl}[Gmail]/All Mail';
$username = 'rnwinquiry@gmail.com';
$password = '1988#Ambardi';

// try to connect
$inbox = imap_open($hostname,$username,$password,NULL,1) or die('Cannot connect to Gmail: ' . print_r(imap_errors()));


$date = date ( "d M Y", strToTime ( "-1 days" ) );
$emails = imap_search($inbox,'SINCE "'.$date.'"');




$output = '';
rsort($emails);

foreach($emails as $mail) {
            
            $headerInfo = imap_headerinfo($inbox,$mail);
            if( strpos( $headerInfo->subject, "Enquiry for you at" ) !== false || strpos( $headerInfo->subject, "Priority Lead from Sulekha" ) || strpos( $headerInfo->subject, "Sulekha Buyer" )) {
               
            
            $overview = imap_fetch_overview($inbox,$mail,0);
            $message = imap_fetchbody($inbox,$mail,2);
            echo  $output = ($overview[0]->seen ? 'read' : 'unread');
            echo "<br>";
           echo $output = "Subject : ".$headerInfo->subject;
           echo "<br>";
           echo $output = "To Adress : ".$headerInfo->toaddress;
           echo "<br>";
           echo  $output = "Date : ".$headerInfo->date;
           echo "<br>";
           echo $output = $headerInfo->reply_to[0]->mailbox.'@'.$headerInfo->reply_to[0]->host;
           echo "<br>";
            
           echo $output = "Reply Address".$headerInfo->reply_toaddress;
           echo "<br>";
            
           echo "MSG : ".$message;
            echo "<br><br><br><br>";
            
            $emailStructure = imap_fetchstructure($inbox,$mail);
            
            if(!isset($emailStructure->parts)) {
        //    $output .= imap_body($inbox, $mail, FT_PEEK);
            } else {
            
            }
          //  echo $output;
          //  $output = '';
          
            }
            }

// colse the connection
imap_expunge($inbox);
imap_close($inbox);

?>