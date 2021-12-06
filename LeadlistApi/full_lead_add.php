<?php


include 'config_api.php';




if(isset($_POST['submit']))

{

	$name 				=  isset($_POST['name'])?$_POST['name']:'';

	$surname 			=  isset($_POST['surname'])?$_POST['surname']:'';

	$gender	 			=  isset($_POST['gender'])?$_POST['gender']:'';

	$email 				=  isset($_POST['email'])?$_POST['email']:'';

	$mobile_no 			=  isset($_POST['mobile_no'])?$_POST['mobile_no']:'';

	$campaign_name 		=  isset($_POST['campaign_name'])?$_POST['campaign_name']:'';

	$channel_id 		=  isset($_POST['channel_id'])?$_POST['channel_id']:'';

	$source_id			=  isset($_POST['source_id'])?$_POST['source_id']:'';

	$source_remark		=  isset($_POST['source_remark'])?$_POST['source_remark']:'';

	$priority			=  isset($_POST['priority'])?$_POST['priority']:'';

	$reference_name		=  isset($_POST['reference_name'])?$_POST['reference_name']:'';

	$reference_mobile_no=  isset($_POST['reference_mobile_no'])?$_POST['reference_mobile_no']:'';

	$referred_to		=  isset($_POST['referred_to'])?$_POST['referred_to']:'';

	$status				=  isset($_POST['status'])?$_POST['status']:'';

	$sub_status			=  isset($_POST['sub_status'])?$_POST['sub_status']:'';

	$followup_mode		=  isset($_POST['followup_mode'])?$_POST['followup_mode']:'';

	$followup_status	=  isset($_POST['followup_status'])?$_POST['followup_status']:'';

$existing_follow_up_mode=  isset($_POST['existing_follow_up_mode'])?$_POST['existing_follow_up_mode']:'';

	// $next_followup_date	=  isset($_POST['next_followup_date'])?$_POST['next_followup_date']:'';

$next_followup_date_only=  isset($_POST['next_followup_date'])?$_POST['next_followup_date']:'';

$next_followup_time_only=  isset($_POST['next_followup_time'])?$_POST['next_followup_time']:'';

	

	$next_followup_date = $next_followup_date_only." ".$next_followup_time_only;

	$followup_remark	=  isset($_POST['Followup_remark'])?$_POST['Followup_remark']:'';

	$state				=  isset($_POST['state'])?$_POST['state']:'';

	$city				=  isset($_POST['city'])?$_POST['city']:'';

	$area				=  isset($_POST['area'])?$_POST['area']:'';

	$branch_id			=  isset($_POST['branch_id'])?$_POST['branch_id']:'';

	$department 		=  isset($_POST['department'])?$_POST['department']:'';

	$course_package 	=  isset($_POST['course_or_package'])?$_POST['course_or_package']:'';

	$course_or_package 	=  isset($_POST['course'])?$_POST['course']:'';

	$any_remarks 		=  isset($_POST['any_remarks'])?$_POST['any_remarks']:'';

	$dob 				=  isset($_POST['dob'])?$_POST['dob']:'';

	$alternate_mobile_no=  isset($_POST['alternate_mobile_no'])?$_POST['alternate_mobile_no']:'';

	$father_name		=  isset($_POST['father_name'])?$_POST['father_name']:'';

	$father_mobile_no	=  isset($_POST['father_mobile_no'])?$_POST['father_mobile_no']:'';

	$tenth_board		=  isset($_POST['tenth_board'])?$_POST['tenth_board']:'';

	$tenth_perc			=  isset($_POST['tenth_perc'])?$_POST['tenth_perc']:'';

	$tweth_board		=  isset($_POST['tweth_board'])?$_POST['tweth_board']:'';

	$tweth_perc			=  isset($_POST['tweth_perc'])?$_POST['tweth_perc']:'';

	$degree				=  isset($_POST['degree'])?$_POST['degree']:'';

	$degree_perc		=  isset($_POST['degree_perc'])?$_POST['degree_perc']:'';



	date_default_timezone_set("Asia/Calcutta");

	$lead_modification_date = date('m/d/Y h:i A');

	$lead_creation_date 	= date('m/d/Y h:i A');

	

   $qu = "select * from lead_list where `name`='$name' AND `mobile_no`='$mobile_no'";

   $qu1 = mysqli_query($con,$qu);

   $qu2 = mysqli_num_rows($qu1);





   if($qu2 == 0)

   {

	$query =  "insert into lead_list(`name`,`surname`,`gender`,`email`,`mobile_no`,`campaign_name`,`channel_id`,`source_id`,`source_remark`,`priority`,`branch_id`,`department`,`course_package`,`course_or_package`,`any_remarks`,`reference_name`,`reference_mobile_no`,`referred_to`,`status`,`sub_status`,`followup_mode`,`followup_status`,`existing_follow_up_mode`,`Followup_remark`,`state`,`city`,`area`,`dob`,`alternate_mobile_no`,`father_name`,`father_mobile_no`,`tenth_board`,`tenth_perc`,`tweth_board`,`tweth_perc`,`degree`,`degree_perc`,`lead_creation_date`,`lead_modification_date`,`next_action_date`,`next_followup_date_only`,`next_followup_time_only`)values('$name','$surname','$gender','$email','$mobile_no','$campaign_name','$channel_id','$source_id','$source_remark','$priority','$branch_id','$department','$course_package','$course_or_package','$any_remarks','$reference_name','$reference_mobile_no','$referred_to','$status','$sub_status','$followup_mode','$followup_status','$existing_follow_up_mode','$Followup_remark','$state','$city','$area','$dob','$alternate_mobile_no','$father_name','$father_mobile_no','$tenth_board','$tenth_perc','$tweth_board','$tweth_perc','$degree','$degree_perc','$lead_creation_date','$lead_modification_date','$next_action_date','$next_followup_date_only','$next_followup_time_only')";



	   	 $query1 = mysqli_query($con,$query);

	   	 $last_id = mysqli_insert_id($con);



		$history_record =  "insert into lead_list_history(`leadListId`,`name`,`surname`,`gender`,`email`,`mobile_no`,`campaign_name`,`channel_id`,`source_id`,`source_remark`,`priority`,`reference_name`,`reference_mobile_no`,`referred_to`,`status`,`sub_status`,`followup_mode`,`existing_follow_up_mode`,`next_followup_date`,`followup_remark`,`state`,`city`,`area`,`branch_id`,`department`,`course_package`,`course_or_package`,`any_remarks`,`dob`,`alternate_mobile_no`,`father_name`,`father_mobile_no`,`tenth_board`,`tenth_perc`,`tweth_board`,`tweth_perc`,`degree`,`degree_perc`,`lead_modification_date`,`next_action_date`,`lead_creation_date`)values('$last_id','$name&#nochange','$surname&#nochange','$gender&#nochange','$email&#nochange','$mobile_no&#nochange','$campaign_name&#nochange','$channel_id&#nochange','$source_id&#nochange','$source_remark&#nochange','$priority&#nochange','$reference_name&#nochange','$reference_mobile_no&#nochange','$referred_to&#nochange','$state&#nochange','$sub_status&#nochange','$followup_mode&#nochange','$existing_follow_up_mode&#nochange','$next_followup_date&#nochange','$followup_remark&#nochange','$state&#nochange','$city&#nochange','$area&#nochange','$branch_id&#nochange','$department&#nochange','$course_package&#nochange','$course_or_package&#nochange','$any_remarks&#nochange','$dob&#nochange','$alternate_mobile_no&#nochange','$father_name&#nochange','$father_mobile_no&#nochange','$tenth_board&#nochange','$tenth_perc&#nochange','$tweth_board&#nochange','$tweth_perc&#nochange','$degree&#nochange','$degree_perc&#nochange','$lead_modification_date&#nochange','$next_action_date&#nochange','$lead_creation_date&#nochange')";

		

			$history_record1 = mysqli_query($con,$history_record);



	   		if($query1)

	   		{

	   			$data = array('status'=>1,'msg'=>"Lead Add Successfully");

	   		}

	   		else

	   		{

	   			$data =  array('status'=>0,'msg'=>"Something Went Wrong");

	   		}

   }

   else

   {

   	$data =  array('status'=>2,'msg'=>"Lead Already Existing".$qu2);

   }



   echo json_encode($data);

}





?>