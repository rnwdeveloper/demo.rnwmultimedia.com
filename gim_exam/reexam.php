<?php 

    include('config.php');

    $grid = $_GET['grid'];

    $qu = "UPDATE gim_students SET e_status='4' WHERE grid='$grid'";
    $re = mysqli_query($conn,$qu);
    header('location:students.php');

?>