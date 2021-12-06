<?php
    ob_start();
    include('config_api.php');
    $ad_id = $_POST['admission_id'];
    $que = "SELECT * FROM admission_documents WHERE admission_id='$ad_id'";
    $res = mysqli_query($con,$que);
    while($row = mysqli_fetch_assoc($res)){
        $data[] = $row;
    }
    echo json_encode($data);
?>