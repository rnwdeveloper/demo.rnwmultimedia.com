<?php

    include('config_api.php');
    ob_start();

    $foo = true;
    $faa = false; 
    $mobile = $_POST['mobile'];
    $otp = $_POST['app_otp'];

    if($mobile != ""){
        $query = "SELECT * FROM admission_process WHERE father_mobile_no='$mobile' or mother_mobile_no='$mobile'";

        $result = mysqli_query($con,$query);

        if(mysqli_num_rows($result)>=1){
            while($row1 = mysqli_fetch_assoc($result)){  
                $data[] = $row1;
            }
          
            $record = array('status' => $foo, 'msg' => "Login Success", 'data'=>$data);
        } else {            
            $record = array('status' => $faa, 'msg' => "Login Failed", 'data'=>"");
        }

    } else {

        $record = array('status' => $faa, 'msg' => "Login Failed", 'data'=>"");

    }
    header('Content-type: text/json');
    echo json_encode($record,JSON_PRETTY_PRINT);
?>