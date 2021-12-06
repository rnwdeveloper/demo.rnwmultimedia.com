<?php 

include('connection.php');
session_start();
// print_r($_SESSION);
// die;

// $data = array(
	$to_user_id = $_POST['to_user_id'];
	$from_user_id = $_SESSION['id'];
	$chat_message = $_POST['chat_message'];
	$status = '1';
	// );

 		$q = "INSERT INTO chat_message (to_user_id,from_user_id,chat_message,status) VALUES ('$to_user_id','$from_user_id','$chat_message','$status')";

$q1 = mysqli_query($con,$q);
// $q2 = mysqli_fetch_assoc($q1);

if($q1)
{
	echo fetch_user_chat_history($_SESSION['id'],$to_user_id,$con);
}
?>