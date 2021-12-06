<?php

    ob_start();
    include('config_api.php');

    $que = "SELECT admission_id,gr_id,first_name,surname,admission_date FROM admission_process";

    $res = mysqli_query($con,$que);

    while($row = mysqli_fetch_assoc($res)){
        $data[] = $row;
    }

    echo json_encode($data);

?>