<?php

include('config_api.php');
ob_start();
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
$foo = true;
$faa = false;

$query3="SELECT * FROM user WHERE logtype='Faculty' OR logtype = 'HOD';";
$result2=mysqli_query($con,$query3);
//$row1=mysqli_fetch_array($result2);

while($row = mysqli_fetch_assoc($result2)){
    $data[] = $row;
} 

$record = array('status' => http_response_code(), 'data'=>$data);
// print_r($data);
// die;
header('Content-type: application/json');
echo json_encode($record);     

?>