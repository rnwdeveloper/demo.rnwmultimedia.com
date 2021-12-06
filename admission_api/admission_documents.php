<?php
    include('config_api.php');
    ob_start();

    $foo = true;
    $faa = false;
    $admission_id = $_POST['admission_id'];

    if($admission_id != ""){

        $query = "SELECT * FROM admission_documents WHERE admission_id='$admission_id'";

        $result = mysqli_query($con,$query);

        if(mysqli_num_rows($result)==1){

            $res = mysqli_fetch_assoc($result);

            $record = array('status' => $foo, 'msg' => "Document Success", 'data'=>$res);
        } else {            
            $record = array('status' => $faa, 'msg' => "Admission ID not found.", 'data'=>"");
        }

    } else {
        $record = array('status' => $faa, 'msg' => "Enter admission_id as body parameter first.", 'data'=>"");
    }
    header('Content-type: application/json');
    echo json_encode($record);
?>