<?php
    include('config_api.php');
    ob_start();

    $foo = true;
    $faa = false;
    $gr_id = $_POST['gr_id'];

    $sr_date = date("Y-m-d");
    if($gr_id != ""){

        // print_r($admission_id);
        // die;
        
        $query = "SELECT UserId,LogDate,C1 FROM DeviceLogs_Processed WHERE UserId ='$gr_id'";
        $result = mysqli_query($contwo,$query);

        if(mysqli_num_rows($result)>=1){
            while($row1 = mysqli_fetch_assoc($result)){ 
                $data[] = $row1;
            }  
        $record = array('status' => $foo, 'msg' => "Successfully Fetch Record", 'data'=>$data );
        } else {            
            $record = array('status' => $faa, 'msg' => "Admission ID not found.", 'data'=>"");
        }
    } else {
        $record = array('status' => $faa, 'msg' => "Enter gr id as body parameter first.", 'data'=>"");
    }
    header('Content-type: application/json');
    echo json_encode($record);  
?>