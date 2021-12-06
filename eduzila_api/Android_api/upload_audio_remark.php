<?php


$servername = "68.183.81.191";
$username = "mzfrxmujjb";
$password = "Q23bQYkskc";
$db = "mzfrxmujjb";	

$con = mysqli_connect($servername, $username, $password,$db) or die(mysqli_error($con));


	$gr_id=$_POST['gr_id'];
    $added_by=$_POST['added_by'];
    $type_id=$_POST['type_id'];
    $status=$_POST['status'];
    $remark=$_POST['remark'];
    date_default_timezone_set('Asia/Kolkata');
$date = date( 'd-m-Y h:i:s A', time () );

$info=array();


$file_path = "";
$i=1;



             if($_FILES["file"]["name"] != "")
			 {
			 	$file_path = "../audio_file/";
			 	// $file_path = "audio_file/";

			 	$file_path1="/audio_file/". basename($_FILES['file']['name']);

			 	 $file_name = str_replace(' ', '%20', basename($_FILES['file']['name']));
				
				$file_path = $file_path . basename($_FILES['file']['name']);
				if(move_uploaded_file($_FILES['file']['tmp_name'], $file_path))
										 {
										 	  $insert_query=mysqli_query($con,"insert into android_remark(`remark`,`gr_id`,`remark_type_id`,`upload_date`,`status`,`added_by`,`audio_file`) values('$remark','$gr_id','$type_id','$date','$status','$added_by','$file_path1')") or die(mysqli_error($con));

													   if($insert_query)
													   {
														  
														  	$info[]=array(
														  		"status" => "1",
														  		"message" => "success"

														  	);
													   		
													   		
													   }
													   else
													   {
													   $info[]=array(
														  		"status" => "0",
														  		"message" => "something went wrong"

														  	);
													   		
													   }


										 	}else
												{

													$info[]=array(
														  		"status" => "0",
														  		"message" => "audio file not upload"

														  	);
												}
						

			
			}
			else
			{

				  // $insert_query=mysqli_query($con,"insert into android_remark(`remark`,`gr_id`,`remark_type_id`,`upload_date`,`status`,`added_by`,`audio_file`) values('$remark','$gr_id','$type_id','$date','$status','$added_by','$file_path')") or die(mysqli_error($con));

						// 				   if($insert_query)
						// 				   {
											  
						// 				   		$info[]=array(
						// 								  		"status" => "1",
						// 								  		"message" => "success"

						// 								  	);
													   		
						// 				   }
						// 				   else
						// 				   {
						// 				    $info[]=array(
						// 								  		"status" => "0",
						// 								  		"message" => "something went wrong"

						// 								  	);
						// 				   }


													$info[]=array(
														  		"status" => "0",
														  		"message" => "Audio file is Empty"

														  	);


			}
							
							
										   $response['data']=$info;

										 	
    
							   

							


			
			
			header('Content-Type: application/json;charset=utf-8');
			 echo json_encode( $response,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
			
			
			
?>