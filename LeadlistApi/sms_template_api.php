<?php

// header("Content-Type: text/html; charset=utf-8");

include 'config_api.php';


// mysqli_query ("set character_set_results='utf8'");

mysqli_set_charset($con, "utf8mb4"); 

$query = "select sms_id,category,sms_template from sms_template";



$query1 = mysqli_query($con,$query);



while($query2 = mysqli_fetch_assoc($query1))

{

	$smsList[] = $query2;

}

 

 //  header ('Content-type: text/html; charset=utf-8');

 echo json_encode($smsList,JSON_UNESCAPED_UNICODE);

// echo json_encode(array('smslist'=>$smsList));





?>