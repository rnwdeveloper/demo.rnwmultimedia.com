<?php

    include('config.php');

    session_start();
    ob_start();

    $grid = $_REQUEST['grid'];
    $status = $_REQUEST['status'];
    

    $nq = "UPDATE gim_students SET hall_t=$status WHERE grid=$grid";


    $res = mysqli_query($conn, $nq);

    if(mysqli_affected_rows($conn) == 1){

        header('location: https://demo.rnwmultimedia.com/gim_exam/students.php');

    }
    else{

        echo "<h1>NNNNNN</h1>";


    }


?>