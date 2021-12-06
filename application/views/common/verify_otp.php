<?php
    include('config_api.php');
    ob_start();
    error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);   
    $otp = $_POST['otp'];
    if($otp != ""){       
        $query = "SELECT otp_number FROM admission_otp ORDER BY otp_id DESC";
        $result = mysqli_query($con,$query);
        $row1 = mysqli_fetch_array($result);
        if($otp == $row1[0]){
            $get_reco = "SELECT * FROM admission_process WHERE mobile_no='$mobile' or father_mobile_no='$mobile' or mother_mobile_no='$mobile' or alternate_mobile_no='$mobile'";
            $get_dt = mysqli_query($con,$get_reco);
            $row2 = mysqli_fetch_assoc($get_dt);
            $data[] = $row2;

            $record = array('status' => http_response_code(), 'msg' => "Otp Correct.Login Sucssesful.." , 'Student' => $data);
        } else {            
            $record = array('status' => http_response_code(), 'msg' => "Admission ID not found.", 'data'=>"");
        }
    } else {
        $record = array('status' => http_response_code(), 'msg' => "Enter Mobile number as body parameter first.", 'data'=>"");
    }
    header('Content-type: text/json');
    echo json_encode($record,JSON_PRETTY_PRINT);
?>   

