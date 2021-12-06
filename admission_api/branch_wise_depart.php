<?php
    include('config_api.php');
    ob_start();

     $foo = true;
    $faa = false;

    $mobile = $_SESSION['mobile_no'];
    if($mobile != ""){
        $query = "SELECT branch_id FROM admission_process WHERE mobile_no='$mobile' or father_mobile_no='$mobile' or mother_mobile_no='$mobile' or alternate_mobile_no='$mobile' ";
        $result = mysqli_query($con,$query);
        $row1 = mysqli_fetch_assoc($result);
        foreach($row1 as $key=>$value){
            $query1 = "SELECT department_name FROM department WHERE FIND_IN_SET('$value',branch_id)";
        }
        $result1 = mysqli_query($con,$query1);
        if(mysqli_num_rows($result1)>=1){
            while($row2 = mysqli_fetch_assoc($result1)){ 
                $data[] = $row2;
            }
        $record = array('status' => $foo, 'msg' => "Data Success", 'data'=>$data);
        } else {            
            $record = array('status' => $faa, 'msg' => "Branch ID not found.", 'data'=>"");
        }
    } else {
        $record = array('status' => $faa , 'msg' => "Enter Mobile number as body parameter first.", 'data'=>"");
    }
    header('Content-type: text/json');
    echo json_encode($record,JSON_PRETTY_PRINT);
?>

