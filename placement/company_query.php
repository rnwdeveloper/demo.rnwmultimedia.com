<?php
include('db.php'); 


if(isset($_POST['SendQuery'])){
	$message_text    =  $_POST['message_text'];
	$given_by      =  $_POST['given_by'];
	$date_time   =  $_POST['date_time'];
	$company_id      =  $_POST['company_id'];

	$query = "insert into company_query(`message_text`,`given_by`,`date_time`,`company_id`)values('$message_text','$given_by','$date_time','$company_id')";
	$query1 = mysqli_query($con,$query);
	if($query1){		
		mysqli_query($con);
		echo "1";
	}else{
		echo "0";
	}

}


?>