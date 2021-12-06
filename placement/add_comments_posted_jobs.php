<?php
include('db.php'); 


if(isset($_POST['Give_Comment'])){
	$jobpost_id      =  $_POST['job_post_comment'];
	$company_id      =  $_POST['company_id_comment'];
	$employer_name   =  $_POST['de_employer_name_comment'];
	$reason_deactive =  $_POST['reason_comment'];
	$other_reason    =  $_POST['ajax_job_reason_comment'];
	$currentDate    =   $_POST['de_current_date_time_comment'];

	$query = "insert into job_deactive_remarks(`de_jobpost_id`,`de_company_id`,`de_reason`,`de_reason_remark`,`de_by_name`,`de_created_date`)values('$jobpost_id','$company_id','$reason_deactive','$other_reason','$employer_name','$currentDate')";
	$query1 = mysqli_query($con,$query);
	if($query1){
		echo "1";
	}else{
		echo "0";
	}

}


?>