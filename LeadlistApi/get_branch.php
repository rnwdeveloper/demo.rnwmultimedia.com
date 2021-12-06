<?php





include 'config_api.php';






$faculty   = "select * from branch";

$faculty1  =  mysqli_query($con,$faculty);

$faculty2 = mysqli_fetch_all($faculty1, MYSQLI_ASSOC);




echo json_encode($faculty2);





?>