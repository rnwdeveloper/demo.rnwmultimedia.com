<?php


$servername = "68.183.81.191";
$username = "mzfrxmujjb";
$password = "Q23bQYkskc";
$db = "mzfrxmujjb";	

$con = mysqli_connect($servername, $username, $password,$db) or die(mysqli_error($con));

	$id=$_POST['id']; 
    $added_by=$_POST['updated_by'];
    $followup_mode=$_POST['followup_mode'];
    // $followup_status=$_POST['followup_status'];
    $status=$_POST['status'];
    $sub_status=$_POST['sub_status'];
	$priority_status=$_POST['priority_status'];
    $remark=$_POST['remark'];

    $schedule_type=$_POST['schedule_type'];
    $schedule_date=$_POST['schedule_date'];
    $schedule_time=$_POST['schedule_time'];

    date_default_timezone_set('Asia/Kolkata');
    $audio_file=$_FILES["file"]["name"];
    
    //for data updated  history  start

$ii[]=array(
	"updated_by",
	 "followup_mode", 
	"status",
	"sub_status",
	 "priority_status",
	"remark",
	"audio_file",
	"schedule_type",
	"schedule_date",
	"schedule_time"

);
$ii1=array(
	$added_by,
	$followup_mode,
	$status,
	$sub_status,
	$priority_status,
	$remark,
	$audio_file,
	$schedule_type,
	$schedule_date,
	$schedule_time


);

//print_r($ii);

  $n = count($ii[0]);  
   
for ($j = 0; $j < $n; $j++) 
   { 
      $filed= $ii[0][$j];
       

       $sql=mysqli_query($con,"select  $filed from  bulk_lead where id='$id'") or die(mysqli_error($con));
       while($res=mysqli_fetch_array($sql))
       {

       	
       
       	// echo $ii1[$j];
       	//echo $res[$filed]."  ".$ii1[$j];
       	if($res[$filed] == $ii1[$j])
       	{

       	}

       	else
       	{

       		$updated_filed[]=$filed;

       	}


       }
   }

// get updated filed list
 $updated_list=implode(',', $updated_filed);
//end

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

										 	 


										 	 $s=mysqli_query($con,"insert into bulk_lead_history(`bulk_id`,`name`,`email`,`father_name`,`contact_no`,`father_contact_no`,`source_type`,`school_collage`,`occupation`,`intersting_field`,`area`,`priority`,`intresting_rating`,`address`,`other_remark`,`time_stemp`,`assign_date`,`assign_status`,`assign_to`,`followup_status`,`created`,`remark`,`followup_mode`,`status`,`sub_status`,`priority_status`,`updated_by`,`audio_file`,`schedule_type`,`schedule_date`,`schedule_time`,`update_date`)  select * from bulk_lead where id='$id'") or die(mysqli_error($con));

							 $last_id = mysqli_insert_id($con);

							$up=mysqli_query($con,"update bulk_lead_history set updated_filed_list='$updated_list' where history_id='$last_id'") or die(mysqli_error($con));




										 		$sql=mysqli_query($con,"update bulk_lead set remark='$remark',followup_mode='$followup_mode',update_date='$date',status='$status',sub_status='$sub_status ',priority_status='$priority_status',updated_by='$added_by',audio_file='$file_path1',schedule_type='$schedule_type',schedule_date='$schedule_date',schedule_time='$schedule_time' where id='$id'") or die(mysqli_error($con));

													   if($sql)
													   {
														  
														  //followup status update kravva mate
													   
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


													// $info[]=array(
													// 	  		"status" => "0",
													// 	  		"message" => "Audio file is Empty"

													// 	  	);



					// $select=mysqli_query($con,"insert into bulk_lead_history(`bulk_id`,`name`,`email`,`father_name`,`contact_no`,`father_contact_no`,`source_type`,`school_collage`,`occupation`,`intersting_field`,`area`,`priority`,`intresting_rating`,`address`,`other_remark`,`time_stemp`,`assign_date`,`assign_status`,`assign_to`,`followup_status`,`created`,`remark`,`followup_mode`,`status`,`sub_status`,`priority_status`,`updated_by`,`audio_file`,`update_date`,`updated_filed_list`) values((select * from bulk_lead where id='$id'),$updated_list) ") or die(mysqli_error($con));



							$s=mysqli_query($con,"insert into bulk_lead_history(`bulk_id`,`name`,`email`,`father_name`,`contact_no`,`father_contact_no`,`source_type`,`school_collage`,`occupation`,`intersting_field`,`area`,`priority`,`intresting_rating`,`address`,`other_remark`,`time_stemp`,`assign_date`,`assign_status`,`assign_to`,`followup_status`,`created`,`remark`,`followup_mode`,`status`,`sub_status`,`priority_status`,`updated_by`,`audio_file`,`schedule_type`,`schedule_date`,`schedule_time`,`update_date`)  select * from bulk_lead where id='$id'") or die(mysqli_error($con));

							 $last_id = mysqli_insert_id($con);

							$up=mysqli_query($con,"update bulk_lead_history set updated_filed_list='$updated_list' where history_id='$last_id'") or die(mysqli_error($con));	
					

					
				$sql=mysqli_query($con,"update bulk_lead set remark='$remark',followup_mode='$followup_mode',update_date='$date',status='$status',sub_status='$sub_status',priority_status='$priority_status',updated_by='$added_by',audio_file='$file_path1',schedule_type='$schedule_type',schedule_date='$schedule_date',schedule_time='$schedule_time' where id='$id'") or die(mysqli_error($con));

													   if($sql)
													   {

														  
														  //followup status update kravva mate
													   
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




			}
							
							
										   $response['data']=$info;

										 	
    
							   

							


			
			
			header('Content-Type: application/json;charset=utf-8');
			 echo json_encode( $response,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
			
			
			
?>