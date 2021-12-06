<?php

    ob_start();
    include('config.php');

    $grid = $_REQUEST['grid'];

    $sql = "SELECT * FROM gim_sub_time WHERE grid='$grid'";

    $res = mysqli_query($conn,$sql);

    while ($row = mysqli_fetch_row($res)) {
        
        

    }

?>