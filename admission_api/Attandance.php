<?php
    include('config_api.php');
    ob_start();

    $foo = true;
    $foo = false;
    $admission_id = $_POST['admission_id'];

    if($admission_id != ""){
        
        $query = "SELECT * FROM admission_process WHERE admission_id='$admission_id'";
        $result = mysqli_query($con,$query);
        while($row1 = mysqli_fetch_assoc($result)){ 
            $gr_id = $row1['gr_id'];
        }
           
        $qu = "SELECT * FROM DeviceLogs_Processed WHERE UserId='$gr_id'";
        $re = mysqli_query($contwo,$qu);
        if(mysqli_num_rows($re)>=1){
            while($reco = mysqli_fetch_assoc($re)){ 
                $data[] = $reco;
            }
        $record = array('status' => $foo, 'msg' => "Data Success", 'data'=>$data);
        } else {            
            $record = array('status' =>$foo, 'msg' => "Admission ID not found.", 'data'=>"");
        }
    } else {
        $record = array('status' => $foo, 'msg' => "Enter admission_id as body parameter first.", 'data'=>"");
    }
    header('Content-type: application/json');
    echo json_encode($record);  
?>