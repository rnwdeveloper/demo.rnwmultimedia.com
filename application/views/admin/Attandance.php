<?php
    include('config_api.php');
    ob_start();

    $admission_id = $_POST['admission_id'];

    if($admission_id != ""){
        
        $query = "SELECT * FROM batch_attendance WHERE admission_id='$admission_id'";

        $result = mysqli_query($con,$query);

        if(mysqli_num_rows($result)>=1){
            while($row1 = mysqli_fetch_assoc($result)){ 
                $data[] = $row1;
            }

        $record = array('status' => http_response_code(), 'msg' => "Data Success", 'data'=>$data);
        } else {            
            $record = array('status' => http_response_code(), 'msg' => "Admission ID not found.", 'data'=>"");
        }
    } else {
        $record = array('status' => http_response_code(), 'msg' => "Enter admission_id as body parameter first.", 'data'=>"");
    }
    header('Content-type: application/json');
    echo json_encode($record);  
?>