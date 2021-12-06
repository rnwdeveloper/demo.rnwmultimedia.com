<?php



include 'config_api.php';


$com   = "select * from company_detail";

$com1  =  mysqli_query($con,$com);

$com2 = mysqli_fetch_all($com1, MYSQLI_ASSOC);



echo json_encode($com2);





?>