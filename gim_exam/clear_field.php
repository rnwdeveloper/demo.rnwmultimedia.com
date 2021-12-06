<?php 

    include('config.php');

    $grid = $_GET['grid'];

    $qu = "UPDATE gim_students SET master_field='' WHERE grid='$grid'";
    $re = mysqli_query($conn,$qu);
    header('location:students.php');

?>