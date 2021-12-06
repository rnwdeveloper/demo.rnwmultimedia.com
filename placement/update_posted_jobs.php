<?php



include('db.php');



	$jobposted_id =  $_POST['jobPosted_job'];

	$ajax_job_name =  $_POST['ajax_job_name'];

	$ajax_position =  $_POST['ajax_position'];

	$ajax_job_subcategory =  $_POST['ajax_job_subcategory'];

	$ajax_start_date =  $_POST['ajax_start_date'];

	$ajax_end_date =  $_POST['ajax_end_date'];

	$ajax_job_description =  $_POST['ajax_job_description'];

	$ajax_no_of_vacancy =  $_POST['ajax_no_of_vacancy'];

	$salary =  $_POST['salary'];

	$city =  $_POST['city'];

	$location =  $_POST['location'];

	date_default_timezone_set('Asia/Kolkata');

    $cu_date = date("Y-m-d g:i a");



	$query ="select * from job_post where `jobpost_id`='$jobposted_id'";

    $query1 = mysqli_query($con,$query);

    $query2 = mysqli_fetch_array($query1);



    if($ajax_job_name == $query2['job_name']){

    	$h_job_name =  $query2['job_name']."&#nochange";

    }else{

    	$h_job_name =  $query2['job_name']."&#change";

    }



    if($ajax_position == $query2['position']){

    	$h_position = $query2['position']."&#nochange";

    }else{

    	$h_position = $query2['position']."&#change";

    }



    if($ajax_job_subcategory == $query2['job_subcategory']){

    	$h_subcategory = $query2['job_subcategory']."&#nochange";

    }else{

    	$h_subcategory = $query2['job_subcategory']."&#change";

    }



    if($ajax_start_date == $query2['start_date']){

    	$h_start_date = $query2['start_date']."&#nochange";

    }else{

    	$h_start_date = $query2['start_date']."&#change";

    }



    if($ajax_end_date == $query2['end_date']){

    	$h_end_date = $query2['end_date']."&#nochange";

    }else{

    	$h_end_date = $query2['end_date']."&#change";

    }



    if($ajax_job_description == $query2['job_description']){

    	$h_job_des = $query2['job_description']."&#nochange";

    }else{

    	$h_job_des = $query2['job_description']."&#change";

    }



     if($ajax_no_of_vacancy == $query2['no_of_vacancy']){

    	$h_no_v = $query2['no_of_vacancy']."&#nochange";

    }else{

    	$h_no_v = $query2['no_of_vacancy']."&#change";

    }



    if($city == $query2['city']){

    	$h_city = $query2['city']."&#nochange";

    }else{

    	$h_city = $query2['city']."&#change";

    }



    if($salary == $query2['salary']){

    	$h_salary = $query2['salary']."&#nochange";

    }else{

    	$h_salary = $query2['salary']."&#change";

    }



    if($location == $query2['job_area']){

    	$h_loc = $query2['job_area']."&#nochange";

    }else{

    	$h_loc = $query2['job_area']."&#change";

    }



    if($cu_date == $query2['modified_date']){

    	$h_date = $query2['modified_date']."&#nochange";

    }else{

    	$h_date = $query2['modified_date']."&#change";

    }



    $de_company_id_re = $query2['company_id'];

    $uer_se = "select * from company_detail where `company_id`='$de_company_id_re'";

    $uer_se1 = mysqli_query($con,$uer_se);

    $uer_se2 = mysqli_fetch_array($uer_se1);

    $em_name = $uer_se2['employer_name'];





     $history = "insert into job_post_history(`j_name`,`j_job_id`,`j_position`,`j_subcategory`,`j_salary`,`j_start_date`,`j_end_date`,`j_description`,`j_city`,`j_area`,`j_no_of_vacancy`,`h_created_date`,`h_modified_date`)values('$h_job_name','$jobposted_id','$h_position','$h_subcategory','$h_salary','$h_start_date','$h_end_date','$h_job_des','$h_city','$h_loc','$h_no_v','$cu_date','$h_date')";

    mysqli_query($con,$history);



     $qu ="update job_post set `job_name`='$ajax_job_name',`position`='$ajax_position',`job_subcategory`='$ajax_job_subcategory',`salary`='$salary',`start_date`='$ajax_start_date',`end_date`='$ajax_end_date',`job_description`='$ajax_job_description',`city`='$city',`job_area`='$location',`no_of_vacancy`='$ajax_no_of_vacancy',`modified_date`='$cu_date',`job_status`='0' where `jobpost_id`='$jobposted_id'";

    $qu1 = mysqli_query($con,$qu); 

   

 

     if($qu1){

         $query_rr = "insert into job_deactive_remarks(`de_jobpost_id`,`de_company_id`,`de_reason`,`de_reason_remark`,`de_created_date`,`de_by_name`)values('$jobposted_id','$de_company_id_re','Deactive to active by date changed','Expiry Date changed by Recruiter and Active Automatically Job','$cu_date','$em_name')";

        mysqli_query($con,$query_rr);

        $record =  array('status'=>1,'msg'=>"Successfully Update Record");

        echo json_encode($record);

    }else{

        $record =  array('status'=>2,'msg'=>"Something Wrong");

    	echo json_encode($record);

    }





?>