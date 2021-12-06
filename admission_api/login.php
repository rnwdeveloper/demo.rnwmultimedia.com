 <?php
include('config_api.php');
    ob_start();
    error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);   
     $foo = True;
    $faa = False; 
    //$mobile = $_SESSION['mobile'];
    $mobile = $_POST['mobile'];
    if($mobile != ""){          
        
        $otp = rand(100000, 999999);
        $msg = $otp;
        // setcookie("otp", $msg);
        // setcookie("mobile", $mobile);
       
        $url = "http://dndsms.vishawebsolutions.com/api/mt/SendSMS?user=Hitesh-RNW&password=Hitz9898&senderid=RNWEDU&channel=Trans&DCS=8&flashsms=0&number=$mobile&text=$msg&route=15";
        $ch = curl_init();
        curl_setopt_array($ch, array(  
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0
        ));
        $output = curl_exec($ch);

        $send_otp = "INSERT INTO admission_otp (`otp_number`) VALUES ('$msg')";
        $res = mysqli_query($con,$send_otp);

        $query = "SELECT * FROM admission_process WHERE mobile_no='$mobile' or father_mobile_no='$mobile' or mother_mobile_no='$mobile' or alternate_mobile_no='$mobile'";
        $result = mysqli_query($con,$query);
        
        if($result){
            while($row2 = mysqli_fetch_assoc($result)){  
                $data[] = $row2; 

                if($row2['mobile_no'] == $mobile){
                    $record = array('status' => $foo, 'msg' => "OTP code send to register Mobile Number");
                }elseif ($row2['alternate_mobile_no'] == $mobile){
                    $record = array('status' => $foo, 'msg' => "Otp Send to Student");
                }elseif ($row2['father_mobile_no'] == $mobile || $row2['mother_mobile_no'] ){
                    $record = array('status' => $foo, 'msg' => "Otp Send to Parent");
                }else{
                    $record = array('status' => $faa, 'msg' => "Try Again...");
                }
            }
        } else {            
            $record = array('status' => $faa, 'msg' => "Admission ID not found.", 'data'=>"");
        }
    } else {
        $record = array('status' => $faa, 'msg' => "Enter Mobile number as body parameter first.", 'data'=>"");
    }
    header('Content-type: text/json');
    echo json_encode($record);


//   include('config_api.php');
//   ob_start();

//   $mobile = $_POST['mobile'];
//  // $otp = $_POST['app_otp'];
//   $foo = True;
//   $faa = False; 
//   if($mobile != ""){
//       $query = "SELECT * FROM admission_process WHERE mobile_no='$mobile' or father_mobile_no='$mobile' or mother_mobile_no='$mobile' or alternate_mobile_no='$mobile'";
//       $result = mysqli_query($con,$query);
//       if(mysqli_num_rows($result)>=1){
//           while($row1 = mysqli_fetch_assoc($result)){  
//               $data[] = $row1;
//           }

//           $record = array('status' => $foo, 'msg' => "Login Success", 'data'=>$data);
//       } else {            
//           $record = array('status' => $faa, 'msg' => "Admission ID not found.", 'data'=>"");
//       }
//   } else {
//       $record = array('status' => $faa, 'msg' => "Enter admission_id as body parameter first.", 'data'=>"");
//   }
//   header('Content-type: text/json');
//   echo json_encode($record,JSON_PRETTY_PRINT);
   
   
?>

