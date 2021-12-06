<?php 
	
	header('Content-Type: application/json');
	$con = mysqli_connect("localhost","root","","rwapi");

	  date_default_timezone_set("Asia/Calcutta");
	  $today = date("Y-m-d");
	  $admission_id = $_POST['admission_id'];

	    $que = "SELECT * FROM `batch_attendance` WHERE `admission_id` = $admission_id AND `attendance_date`='$today'";
	   $query = mysqli_query($con,$que); 
		$data = array();
		while($row = mysqli_fetch_array($query)){
			$data[] = $row;
		}

		 // echo "<pre>";
		 // print_r($data);

			$api =  array();
		 	foreach ($data as $value) {
				 	$res['batch_attendance_id'] = $value['batch_attendance_id'];
				 	$res['admission_id'] = $value['admission_id'];
				 	$res['admission_courses_id'] = $value['admission_courses_id'];
				 	$res['attendance_date'] = $value['attendance_date'];
				 	$res['attendance_time_from'] = $value['attendance_time_from'];
				 	$res['attendance_time_to'] = $value['attendance_time_to'];
				 	$res['attendance_type'] = $value['attendance_type'];
			 		$api[] = $res;
			 	
		 }
		 $response = array('status'=>1,'data'=>$api);
	 	 echo json_encode(['data'=>$response]);


	 if(isset($_POST['week']))
	 {
	 	$admission_id = $_POST['admission_id'];
	 	$date = $_POST['start_date'];

	 	 $qu = "SELECT * FROM `batch_attendance` WHERE `admission_id` = $admission_id AND WEEK(`attendance_date`) = WEEK('$date')";
	 	 $select = mysqli_query($con,$qu);

	 	 $date = array();
		while($row = mysqli_fetch_array($select)){
			$date[] = $row;
		}

		$weekapi =  array();
		 	foreach ($date as $value) {
				 	$res['batch_attendance_id'] = $value['batch_attendance_id'];
				 	$res['admission_id'] = $value['admission_id'];
				 	$res['admission_courses_id'] = $value['admission_courses_id'];
				 	$res['attendance_date'] = $value['attendance_date'];
				 	$res['attendance_time_from'] = $value['attendance_time_from'];
				 	$res['attendance_time_to'] = $value['attendance_time_to'];
				 	$res['attendance_type'] = $value['attendance_type'];
			 		$weekapi[] = $res;	 	
		 }

		  $response = array('status'=>1,'data'=>$weekapi);
	 	  echo json_encode(['data'=>$response]);
	 }

	 if(isset($_POST['month']))
	 {
	 	$admission_id = $_POST['admission_id'];
	 	$date = $_POST['start_date'];

	 	 $qu = "SELECT * FROM `batch_attendance` WHERE `admission_id` = $admission_id AND MONTH(`attendance_date`) = MONTH('$date')";
	 	 $select = mysqli_query($con,$qu);

	 	 $date = array();
		while($row = mysqli_fetch_array($select)){
			$date[] = $row;
		}

		$weekapi =  array();
		 	foreach ($date as $value) {
				 	$res['batch_attendance_id'] = $value['batch_attendance_id'];
				 	$res['admission_id'] = $value['admission_id'];
				 	$res['admission_courses_id'] = $value['admission_courses_id'];
				 	$res['attendance_date'] = $value['attendance_date'];
				 	$res['attendance_time_from'] = $value['attendance_time_from'];
				 	$res['attendance_time_to'] = $value['attendance_time_to'];
				 	$res['attendance_type'] = $value['attendance_type'];
			 		$weekapi[] = $res;	 	
		 }

		  $response = array('status'=>1,'data'=>$weekapi);
	 	  echo json_encode(['data'=>$response]);
	 }


?>