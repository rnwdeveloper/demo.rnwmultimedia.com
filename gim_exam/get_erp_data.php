<?php

$grid = $_GET["grid"];

if($grid != "") {

// kvstore API url
$url = 'https://demo.rnwmultimedia.com/eduzila_api/Android_api/grid_api_2.php?GR_ID='.$grid;

// Initializes a new cURL session
$curl = curl_init($url);
$data = [
    'GR_ID' => 1209
  ];
// 1. Set the CURLOPT_RETURNTRANSFER option to true
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// 2. Set the CURLOPT_POST option to true for POST request
curl_setopt($curl, CURLOPT_POST, true);

// 3. Set the request data as JSON using json_encode function
curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));


$response = curl_exec($curl);

// Close cURL session
curl_close($curl);
// echo "<pre>";
$jsss =  $response . PHP_EOL;
// echo "</pre>";

echo $jsss."<br><br>";

$a = json_decode($jsss,true);


echo $a[0]["remarks"][0]["remark"];

} else {

    header("location:index.php");

}



?>