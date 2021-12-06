<?php




	ob_start();
	session_start();

    include('db.php');

	

	if(isset($_POST['login'])){

		$email  =  $_POST['email_login'];

		$password =  $_POST['password_login'];

		$query = "select * from company_detail where `email_id`='$email' AND `password`='$password'";

		$query1 =  mysqli_query($con,$query);

		$num =  mysqli_num_rows($query1);

		if($num == 1){

			$query2 = mysqli_fetch_array($query1);

			if($query2['status'] == 0){

				echo 2;

			}

			else if($query2['status'] == 1){

				$_SESSION['record'] = $query2;

				$_SESSION['type_login'] = "company";
				header('location:index.php');
				

			}else if($query2['status'] == 2){
			
				header('location:index.php');

			}

		}

		else{

			echo 0;

		}

	}

?>