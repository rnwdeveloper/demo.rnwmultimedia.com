<?php
$servername = "68.183.81.191";
$username = "mzfrxmujjb";
$password = "Q23bQYkskc";
$db = "mzfrxmujjb";

$con = mysqli_connect($servername, $username, $password,$db) or die(mysqli_error($con));
if($_FILES["file"]["name"] != "")
			 {
			 	$file_path = "../audio_file/";
			 	// $file_path = "upload/";

			 	$file_path1="/audio_file/". basename($_FILES['file']['name']);

			 	 $file_name = str_replace(' ', '%20', basename($_FILES['file']['name']));
				
				$file_path = $file_path . basename($_FILES['file']['name']);
				if(move_uploaded_file($_FILES['file']['tmp_name'], $file_path))
										 {
										 	  $insert_query=mysqli_query($con,"insert into test_edu(`time`) values('$file_path1')") or die(mysqli_error($con));

													   if($insert_query)
													   {
														  
														  	$info[]=array(
														  		"status" => "'1",
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
				$insert_query=mysqli_query($con,"insert into test_edu(`time`) values('nthi aavyu filename')") or die(mysqli_error($con));

													   if($inser_query)
													   {
														  
														  	$info[]=array(
														  		"status" => "'1",
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


			}

			 $response['data']=$info;

										 
    
							   

							


			
			
			header('Content-Type: application/json;charset=utf-8');
			 echo json_encode( $response,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);s

?>