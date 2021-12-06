<?php
include('db.php'); 


if(isset($_POST['Give_Reason'])){
	$jobpost_id      =  $_POST['job_post_id_data'];
	$company_id      =  $_POST['company_id_data'];
	$employer_name   =  $_POST['de_employer_name'];
	$reason_deactive =  $_POST['reason_deactive'].",Deactive";
	$other_reason    =  $_POST['ajax_job_reason'];
	$currentDate    =  $_POST['de_current_date_time'];

	$query = "insert into job_deactive_remarks(`de_jobpost_id`,`de_company_id`,`de_reason`,`de_reason_remark`,`de_by_name`,`de_created_date`)values('$jobpost_id','$company_id','$reason_deactive','$other_reason','$employer_name','$currentDate')";
	$query1 = mysqli_query($con,$query);
	if($query1){
		$qu = "update job_post set `job_status`='2' where `jobpost_id`='$jobpost_id'";
		mysqli_query($con,$qu);
		echo "1";
	}else{
		echo "0";
	}

}


?>