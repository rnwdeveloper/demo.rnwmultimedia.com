<?php



include 'config_api.php';




if(isset($_POST['submit']) && isset($_POST['lead_list_id']))

{

	$lead_list_edit_id = $_POST['lead_list_id'];



	$edit_query = "select * from lead_list where `lead_list_id`='$lead_list_edit_id'";

	$edit_query1 = mysqli_query($con,$edit_query);

	$edit_query2 = mysqli_fetch_array($edit_query1);



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

	// $alternate_mobile_no=  isset($_POST['alternate_mobile_no'])?$_POST['alternate_mobile_no']:'';

	// $father_name		=  isset($_POST['father_name'])?$_POST['father_name']:'';

	// $father_mobile_no	=  isset($_POST['father_mobile_no'])?$_POST['father_mobile_no']:'';

	// $tenth_board		=  isset($_POST['tenth_board'])?$_POST['tenth_board']:'';

	// $tenth_perc			=  isset($_POST['tenth_perc'])?$_POST['tenth_perc']:'';

	// $tweth_board		=  isset($_POST['tweth_board'])?$_POST['tweth_board']:'';

	// $tweth_perc			=  isset($_POST['tweth_perc'])?$_POST['tweth_perc']:'';

	// $degree				=  isset($_POST['degree'])?$_POST['degree']:'';

	// $degree_perc		=  isset($_POST['degree_perc'])?$_POST['degree_perc']:'';



	date_default_timezone_set("Asia/Calcutta");

	$lead_modification_date = date('m/d/Y h:i A');

	$lead_creation_date 	= date('m/d/Y h:i A');









	 $qu ="update lead_list set `name`='$name',`surname`='$surname',`gender`='$gender',`email`='$email',`mobile_no`='$mobile_no',`campaign_name`='$campaign_name',`channel_id`='$channel_id',`source_id`='$source_id',`source_remark`='$source_remark',`priority`='$priority',`reference_name`='$reference_name',`reference_mobile_no`='$reference_mobile_no',`referred_to`='$referred_to',`status`='$status',`sub_status`='$sub_status',`followup_mode`='$followup_mode',`followup_status`='$followup_status',`existing_follow_up_mode`='$existing_follow_up_mode',`next_followup_date`='$next_followup_date',`followup_remark`='$followup_remark',`state`='$state',`city`='$city',`area`='$area',`branch_id`='$branch_id',`department`='$department',`course_package`='$course_package',`course_or_package`='$course_or_package',`any_remarks`='$any_remarks',`lead_modification_date`='$lead_modification_date' where `lead_list_id`='$lead_list_edit_id'";



		$lead_list_edit_id = $_POST['lead_list_id'];

		$edit_query = "select * from lead_list where `lead_list_id`='$lead_list_edit_id'";

		$edit_query1 = mysqli_query($con,$edit_query);

		$edit_query2 = mysqli_fetch_array($edit_query1);

		

	 	

	 	if(@$edit_query2['name'] == @$name){

		 	$up_name = $name."&#nochange";  

		}else{

			$up_name = $name."&#change";

		}



		if(@$edit_query2['surname'] == @$surname){

			$up_surname = $surname."&#nochange";  

		}else{

			$up_surname = $surname."&#change";

		}



		if(@$edit_query2['gender'] == @$gender){

			$up_gender = $gender."&#nochange";  

		}else{

			$up_gender = $gender."&#change";

		}



		if(@$edit_query2['email'] == @$email){

			$up_email = $email."&#nochange";  

		}else{

			$up_email = $email."&#change";

		}



		if(@$edit_query2['mobile_no'] == @$mobile_no){

			$up_mobile_no = $mobile_no."&#nochange";  

		}else{

			$up_mobile_no = $mobile_no."&#change";

		}



		if(@$edit_query2['campaign_name'] == @$campaign_name){

			$up_campaign_name = $campaign_name."&#nochange";  

		}else{

			$up_campaign_name = $campaign_name."&#change";

		}



		if(@$edit_query2['channel_id'] == @$channel_id){

			$up_channel_id = $channel_id."&#nochange";  

		}else{

			$up_channel_id = $channel_id."&#change";

		}

		

		if(@$edit_query2['source_id'] == @$source_id){

			$up_source_id = $source_id."&#nochange";  

		}else{

			$up_source_id = $source_id."&#change";

		}



		if(@$edit_query2['school_college_id'] == @$school_college_id){

			@$school_college_id = @$school_college_id."&#nochange";  

		}else{

			@$school_college_id = @$school_college_id."&#change";

		}

		

		if(@$edit_query2['source_remark'] == @$source_remark){

			$up_source_remark = $source_remark."&#nochange";  

		}else{

			$up_source_remark = $source_remark."&#change";

		}



		if(@$edit_query2['priority'] == @$priority){

			$up_priority = @$priority."&#nochange";  

		}else{

			$up_priority = @$priority."&#change";

		}

		

		if(@$edit_query2['reference_name'] == @$reference_name){

			$up_reference_name = $reference_name."&#nochange";  

		}else{

			$up_reference_name = $reference_name."&#change";

		}

		

		if(@$edit_query2['reference_mobile_no'] == @$reference_mobile_no){

			$up_reference_mobile_no = $reference_mobile_no."&#nochange";  

		}else{

			$up_reference_mobile_no = $reference_mobile_no."&#change";

		}



		if(@$edit_query2['referred_to'] == @$referred_to){

			$up_referred_to = @$referred_to."&#nochange";  

		}else{

			$up_referred_to = @$referred_to."&#change";

		}



		if(@$edit_query2['status'] == @$status){

			$up_status = $status."&#nochange";  

		}else{

			$up_status = $status."&#change";

		}



		if(@$edit_query2['sub_status'] == @$sub_status){

			$up_sub_status = $sub_status."&#nochange";  

		}else{

			$up_sub_status = $sub_status."&#change";

		}



		if(@$edit_query2['followup_mode'] == @$followup_mode){

			$up_followup_mode = @$followup_mode."&#nochange";  

		}else{

			$up_followup_mode = @$followup_mode."&#change";

		}



		if(@$edit_query2['next_followup_date'] == @$next_followup_date){

			$up_next_followup_date = $next_followup_date."&#nochange";  

		}else{

			$up_next_followup_date = $next_followup_date."&#change";

		}

	

		if(@$edit_query2['followup_remark'] == @$followup_remark){

			$up_followup_remark = $followup_remark."&#nochange";  

		}else{

			$up_followup_remark = $followup_remark."&#change";

		}



		if(@$edit_query2['state'] == @$state){

			$up_state = $state."&#nochange";  

		}else{

			$up_state = $state."&#change";

		}



		if(@$edit_query2['city'] == @$city){

			$up_city = $city."&#nochange";  

		}else{

			$up_city = $city."&#change";

		}



		if(@$edit_query2['area'] == @$area){

			@$up_area = @$area."&#nochange";  

		}else{

			@$up_area = @$area."&#change";

		}



		if(@$edit_query2['branch_id'] == @$branch_id){

			$up_branch_id = $branch_id."&#nochange";  

		}else{

			$up_branch_id = @$branch_id."&#change";

		}



		if(@$edit_query2['department'] == @$department){

			$up_department = $department."&#nochange";  

		}else{

			$up_department = $department."&#change";

		}



		if(@$edit_query2['course_package'] == @$course_package){

			$up_course_package = $course_package."&#nochange";  

		}else{

			$up_course_package = $course_package."&#change";

		}



		if(@$edit_query2['course_or_package'] == @$course_or_package){

			$up_course_or_package = $course_or_package."&#nochange";  

		}else{

			$up_course_or_package = $course_or_package."&#change";

		}



		if(@$edit_query2['any_remarks'] == @$any_remarks){

			$up_any_remarks = $any_remarks."&#nochange";  

		}else{

			$up_any_remarks = $any_remarks."&#change";

		}





		// if(@$edit_query2['dob'] == @$dob){

		// 	$up_dob = $dob."&#nochange";  

		// }else{

		// 	$up_dob = $dob."&#change";

		// }





		// if(@$edit_query2['alternate_mobile_no'] == @$alternate_mobile_no){

		// 	$up_alternate_mobile_no = $alternate_mobile_no."&#nochange";  

		// }else{

		// 	$up_alternate_mobile_no = $alternate_mobile_no."&#change";

		// }





		// if(@$edit_query2['father_name'] == @$father_name){

		// 	$up_father_name = $father_name."&#nochange";  

		// }else{

		// 	$up_father_name = $father_name."&#change";

		// }





		// if(@$edit_query2['father_mobile_no'] == @$father_mobile_no){

		// 	$up_father_mobile_no = $father_mobile_no."&#nochange";  

		// }else{

		// 	$up_father_mobile_no = $father_mobile_no."&#change";

		// }





		// if(@$edit_query2['tenth_board'] == @$tenth_board){

		// 	$up_tenth_board = $tenth_board."&#nochange";  

		// }else{

		// 	$up_tenth_board = $tenth_board."&#change";

		// }

		



		// if(@$edit_query2['tenth_perc'] == @$tenth_perc){

		// 	$up_tenth_perc = $tenth_perc."&#nochange";  

		// }else{

		// 	$up_tenth_perc = $tenth_perc."&#change";

		// }

		



		// if(@$edit_query2['tweth_board'] == @$tweth_board){

		// 	$up_tweth_board = $tweth_board."&#nochange";  

		// }else{

		// 	$up_tweth_board = $tweth_board."&#change";

		// }

		



		if(@$edit_query2['existing_follow_up_mode'] == @$existing_follow_up){

			$up_existing_follow_up = $existing_follow_up."&#nochange";  

		}else{

			$up_existing_follow_up = $existing_follow_up."&#change";

		}			



		// if(@$edit_query2['tweth_perc'] == @$tweth_perc){

		// 	$up_tweth_perc = $tweth_perc."&#nochange";  

		// }else{

		// 	$up_tweth_perc = $tweth_perc."&#change";

		// }

		



		// if(@$edit_query2['degree'] == @$degree){

		// 	$up_degree = $degree."&#nochange";  

		// }else{

		// 	$up_degree = $degree."&#change";

		// }

		



		// if(@$edit_query2['degree_perc'] == @$degree_perc){

		// 	$up_degree_perc = $degree_perc."&#nochange";  

		// }else{

		// 	$up_degree_perc = $degree_perc."&#change";

		// }

		



		if(@$edit_query2['lead_modification_date'] == @$lead_modification_date){

			$up_lead_modification_date = $lead_modification_date."&#nochange";  

		}else{

			$up_lead_modification_date = $lead_modification_date."&#change";

		}

	

	$qu1 = mysqli_query($con,$qu);

	if($qu1)

	{



		$fo_user_role = $_POST['username'];

		$fo_user_id = $_POST['userId'];

		$fo_user_type = "Followup";

		$fo_data_comment = $followup_remark;

		$fo_data_recepient_id = $lead_list_edit_id;

		$fo_data_subject = $existing_follow_up;

		

		date_default_timezone_set("Asia/Calcutta");

		$fo_data_timing_sender = date('m/d/Y h:i A');

		$fo_data_status = "success";



		$fo_hi =  "insert into lead_followup_history(`user_id`,`user_role`,`recepient_id`,`status`,`comment`,`subject`,`timing_sender`)values('$fo_user_id','$fo_user_role','$fo_data_recepient_id','success','$fo_data_comment','$fo_data_subject','$fo_data_timing_sender')";

		$fo_hi1 = mysqli_query($con,$fo_hi);







		$history_record =  "insert into lead_list_history(`leadListId`,`name`,`surname`,`gender`,`email`,`mobile_no`,`campaign_name`,`channel_id`,`source_id`,`source_remark`,`priority`,`reference_name`,`reference_mobile_no`,`referred_to`,`status`,`sub_status`,`followup_mode`,`existing_follow_up_mode`,`next_followup_date`,`followup_remark`,`state`,`city`,`area`,`branch_id`,`department`,`course_package`,`course_or_package`,`any_remarks`,`lead_modification_date`,`next_action_date`)values('$lead_list_edit_id','$up_name','$up_surname','$up_gender','$up_email','$up_mobile_no','$up_campaign_name','$up_channel_id','$up_source_id','$up_source_remark','$up_priority','$up_reference_name','$up_reference_mobile_no','$up_referred_to','$up_status','$up_sub_status','$up_followup_mode','$up_existing_follow_up','$up_next_followup_date','$up_followup_remark','$up_state','$up_city','$up_area','$up_branch_id','$up_department','$up_course_package','$up_course_or_package','$up_any_remarks','$up_lead_modification_date','$up_lead_modification_date')";

		$history_record1 = mysqli_query($con,$history_record);



		$data = array('status'=>1,'msg'=>"Lead Update Successfully");

	}

	else

	{

		 $data =  array('status'=>2,'msg'=>"Something wrong!!");



	}

}

else

{

	$data =  array('status'=>0,'msg'=>"Lead List Id not Found");

}	



echo json_encode($data);





?>