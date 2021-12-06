<?php
    include('config_api.php');
    ob_start();
    //error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);  
    $foo = True;
    $faa = False; 
    // $otp = $_COOKIE['otp']; 
    // $mobile = $_COOKIE['mobile'];
    // print_r($_COOKIE);
    // die;
    $otp = $_POST['otp'];
    $mobile = $_POST['mobile'];
    
    $ot = "SELECT otp_number FROM admission_otp WHERE otp_number='$otp'";
    $otpp = mysqli_query($con,$ot);
    $otppp = mysqli_fetch_assoc($otpp);
    $matchotp = $otppp[otp_number];

    if(!empty($otp)){    
        if($otp == $matchotp){
            $get_reco = "SELECT * FROM admission_process WHERE mobile_no='$mobile' or father_mobile_no='$mobile' or mother_mobile_no='$mobile' or alternate_mobile_no='$mobile'";
            $result = mysqli_query($con,$get_reco);
            if(mysqli_num_rows($result)>=1){
                while($row2 = mysqli_fetch_assoc($result)){
                    $data[] = $row2;
                }
                foreach ($data as $key => $value) {
                    $mob_nu[] = $value['mobile_no'];  
                    $alte_nu[] = $value['alternate_mobile_no'];
                    $fath_nu[] = $value['mother_mobile_no'];
                    $moth_nu[] = $value['father_mobile_no'];
                }
                if(in_array($mobile , $fath_nu)){
                    $record = array('status' => $foo, 'msg' => "Otp Correct Login Sucssesful.." , 'person' => 'Parent' , 'data' => $data);
                }
                if(in_array($mobile , $mob_nu)){
                    $record = array('status' => $foo, 'msg' => "Otp Correct Login Sucssesful.." , 'person' => 'student' , 'data' => $data);
                }
                if(in_array($mobile , $moth_nu)){
                    $record = array('status' => $foo, 'msg' => "Otp Correct Login Sucssesful.." , 'person' => 'Parent' , 'data' => $data);
                }
                if(in_array($mobile , $alte_nu)){
                    $record = array('status' => $foo, 'msg' => "Otp Correct Login Sucssesful.." , 'person' => 'Student' , 'data' => $data);
                }

                // die();

           
                // if($stu_mob_nu == $mobile){
                //         $record = array('status' => $foo, 'msg' => "Otp Correct Login Sucssesful.." , 'person' => 'student' , 'data' => $data);
                // }elseif ($al_mob_nu == $mobile){
                //     $record = array('status' => $foo, 'msg' => "Otp Correct Login Sucssesful.." , 'person' => 'student' , 'data' => $data);
                // }elseif ($fath_mob_nu == $mobile || $moth_mob_nu == $mobile ){
                //     $record = array('status' => $foo, 'msg' => "Otp Correct Login Sucssesful.." , 'person' => 'Parent' , 'data' => $data);
                // }
            }
        } else {            
            $record = array('status' => $faa, 'msg' => "Invalid OTP Code", 'data'=>"");
        }
    } else {
        $record = array('status' => $faa, 'msg' => "Enter otp as body parameter first. ", 'data'=>"");
    }
    header('Content-type: text/json');
    echo json_encode($record);
?>   

