<?php

    ob_start();
    include('config.php');

    $sql = "SELECT * FROM gim_students";
    $res = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($res)){

        $id = $row['schedule_id'];
        $gr = $row['grid'];
        $q = "UPDATE gim_sub_time SET schedule_id='$id' WHERE grid='$gr'";

        if(mysqli_query($conn,$q)){
            echo "<p style='color:green'>Done</p><br/>";
        } else {
            echo "<p style='color:red'>Failed".mysqli_error($conn)."</p><br/>";
        }

    }

?>