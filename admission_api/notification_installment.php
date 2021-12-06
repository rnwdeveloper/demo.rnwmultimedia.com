<?php
    include('config_api.php');
    ob_start();

    $admission_id = $_POST['admission_id'];
    $foo = true;
    $faa = false;

    $sr_date = date("Y-m-d");
    if($admission_id != ""){
        
        $query = "SELECT installment_no,paid_amount,pay_date,due_amount,installment_date FROM admission_installment WHERE admission_id='$admission_id' OR pay_date = '$sr_date' ORDER BY admission_installment_id ASC LIMIT 2";
        $result = mysqli_query($con,$query);
        $que = "SELECT SUM(due_amount) FROM admission_installment WHERE admission_id = '$admission_id' OR pay_date IS NULL";
        $res = mysqli_query($con,$que);
        $row2 = mysqli_fetch_array($res);
        if(mysqli_num_rows($result)>=1){
            while($row1 = mysqli_fetch_assoc($result)){ 
                $data[] = $row1;
                $final_reco = $data;
            }  
        $record = array('status' => $foo, 'msg' => "Successfully Fetch Record", 'data'=>$final_reco);
        } else {            
            $record = array('status' => $faa, 'msg' => "Admission ID not found.", 'data'=>"");
        }
    } else {
        $record = array('status' => $faa, 'msg' => "Enter admission_id as body parameter first.", 'data'=>"");
    }
    header('Content-type: application/json');
    echo json_encode($record);  
?>