<?php

		include('db.php');
 		echo $company_id = strtr(base64_decode($_GET['company_id']), '+/=', '._-'); 
        echo "<br>".$job_post_id = strtr(base64_decode($_GET['jobpost_id']), '+/=', '._-'); 
        echo $status = isset($_GET['status'])?$_GET['status']:'';
        if($status == 'active'){
        	$st_value = 0;
        	$de_reason = "Pending TO Active By TPO from Email";
        }
        else
        {
        	$st_value = 2;
        	$de_reason = "Pending TO DeActive By TPO from Email";
        }

        $de_ac_by_name = "by email";
       date_default_timezone_set('Asia/Kolkata'); 
       $currentTime = date( 'd-m-Y h:i:s A', time () ); 

       $update_query ="update job_post set `job_status`='$st_value',`modified_date`='$currentTime' where `jobpost_id`='$job_post_id'";
       $query = mysqli_query($con,$update_query);

       	if($query)
       	{
       			$remarks = "insert into job_deactive_remarks(`de_jobpost_id`,`de_company_id`,`de_reason_remark`,`de_by_name`,`de_created_date`)values('$job_post_id','$company_id','$de_reason','by Email','$currentTime')";
       			mysqli_query($con,$remarks);

       			if($status == 'active'){
       					header("location:https://demo.rnwmultimedia.com/FormController/view_all_jobs?job_status=active");
       			}
       			else
       			{

       					header("location:https://demo.rnwmultimedia.com/FormController/view_all_jobs?job_status=deactive");
       			}
       	}
       	else
       	{
       		header("location:https://demo.rnwmultimedia.com/welcome?action=wrong");
       	}






?>