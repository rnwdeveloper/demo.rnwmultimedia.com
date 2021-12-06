<?php

include 'config_api.php';

mysqli_set_charset($con, "utf8mb4"); 

$query = "select id,category,html_template from email_template_category";

$query1 = mysqli_query($con,$query);

$smsList = array();

while($query2 = mysqli_fetch_assoc($query1))

{



	$html_te = stripslashes(html_entity_decode()); 

	$smsList[] = array('id'=>$query2['id'], 'category'=>$query2['category'],'html_template'=>"hello");

}

 echo json_encode($smsList,JSON_UNESCAPED_UNICODE);



// echo $html_te;

// $data =

// echo htmlspecialchars_decode(stripslashes()); 



?>