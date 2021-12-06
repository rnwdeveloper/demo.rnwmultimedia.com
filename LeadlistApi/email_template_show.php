<?php



 $id=  $_GET['id'];



 include 'config_api.php';

mysqli_set_charset($con, "utf8mb4"); 

$query = "select html_template from email_template_category where `id`='$id'";

$query1 = mysqli_query($con,$query);



$query2 = mysqli_fetch_assoc($query1);



  







$data = $query2['html_template'];



echo htmlspecialchars_decode(stripslashes($data)); 

?>

