<?php


include 'config_api.php';




if(isset($_POST['submit'])){

	$name 				=  $_POST['quick_name'];

	$email 				=  $_POST['quick_email'];

	$mobile_no 			=  $_POST['quick_mobile_no'];

	$source_id			=  $_POST['quick_source_id'];

	$branch_id			=  $_POST['quick_branch_id'];

	$department 		=  $_POST['quick_department_id'];

	$course_package 	=  $_POST['quick_course_package'];

	$course_or_package 	=  $_POST['quick_package'];

	$any_remarks 		=  $_POST['quick_remark'];



	date_default_timezone_set("Asia/Calcutta");

	$creation_date = date('m/d/Y h:i A');

		

	// $record = array('name'=>$name,'email'=>$email,'mobile_no'=>$mobile_no,'campaign_name'=>"Telephonic Quick Add Lead",'channel_id'=>'Telephonic Quick Add','source_id'=>$source_id,'priority'=>"hot",'branch_id'=>$branch_id,'department'=>$department,'course_package'=>$course_package,'course_or_package'=>$course_or_package,'any_remarks'=>$any_remarks,'reference_name'=>"Hitesh Desai",'referred_to'=>"Hitesh Desai",'status'=>"1 - New",'sub_status'=>"Not Known",'followup_mode'=>"Not Known","area"=>"Not Known",'lead_creation_date'=>$creation_date,'lead_modification_date'=>$creation_date);



   $qu = "select * from lead_list where `name`='$name' AND `email`='$email' AND `mobile_no`='$mobile_no'";

   $qu1 = mysqli_query($con,$qu);

   $qu2 = mysqli_num_rows($qu1);



   if($qu2 == 0)

   {

		$query =  "insert into lead_list(`name`,`email`,`mobile_no`,`campaign_name`,`channel_id`,`source_id`,`priority`,`branch_id`,`department`,`course_package`,`course_or_package`,`any_remarks`,`reference_name`,`referred_to`,`status`,`sub_status`,`followup_mode`,`area`,`lead_creation_date`,`lead_modification_date`)values('$name','$email','$mobile_no','Telephonic Quick Add Lead','Telephonic Quick Add','$source_id','hot','$branch_id','$department','$course_package','$course_or_package','$any_remarks','Hitesh Desai','Hitesh Desai','1 - New','Not Known','Not Known','Not Known','$creation_date','$creation_date')";



	   	 $query1 = mysqli_query($con,$query);

	   	 $last_id = mysqli_insert_id($con);



		// $histroy_record = array('leadListId'=>$last_id,'name'=>$data['quick_name']."&#nochange",'surname'=>"&#nochange",'gender'=>"&#nochange",'email'=>$data['quick_email']."&#nochange",'mobile_no'=>$data['quick_mobile_no']."&#nochange",'campaign_name'=>"Web Quick Add Lead&#nochange",'channel_id'=>"Telephonic Quick Add&#nochange",'source_id'=>$data['quick_source_id']."&#nochange",'source_remark'=>"&#nochange",'priority'=>"hot&#nochange",'reference_name'=>"Hitesh Desai&#nochange",'reference_mobile_no'=>"&#nochange",'referred_to'=>"Hitesh Desai&#nochange",'status'=>"1 - New&#nochange",'sub_status'=>"Not Known&#nochange",'followup_mode'=>"Not Known&#nochange",'existing_follow_up_mode'=>@$data['existing_follow_up']."&#nochange",'next_followup_date'=>"&#nochange",'followup_remark'=>"&#nochange",'state'=>"&#nochange",'city'=>"&#nochange",'area'=>"Not Known&#nochange",'branch_id'=>$data['quick_branch_id']."&#nochange",'department'=>$data['quick_department_id']."&#nochange",'course_package'=>$data['quick_course_package']."&#nochange",'course_or_package'=>$data['quick_package']."&#nochange",'any_remarks'=>$data['quick_remark']."&#nochange",'dob'=>"&#nochange",'alternate_mobile_no'=>"&#nochange",'father_name'=>"&#nochange",'father_mobile_no'=>"&#nochange",'tenth_board'=>"&#nochange",'tenth_perc'=>"&#nochange",'tweth_board'=>"&#nochange",'tweth_perc'=>"&#nochange",'degree'=>"&#nochange",'degree_perc'=>"&#nochange",'lead_modification_date'=>$creation_date."&#nochange",'next_action_date'=>"&#nochange",'lead_creation_date'=>$creation_date."&#nochange");

		$name 			=  $_POST['quick_name'].'&#nochange';

		$email 				=  $_POST['quick_email'].'&#nochange';

		$mobile_no 			=  $_POST['quick_mobile_no'].'&#nochange';

		$source_id			=  $_POST['quick_source_id'].'&#nochange';

		$branch_id			=  $_POST['quick_branch_id'].'&#nochange';

		$department 		=  $_POST['quick_department_id'].'&#nochange';

		$course_package 	=  $_POST['quick_course_package'].'&#nochange';

		$course_or_package 	=  $_POST['quick_package'].'&#nochange';

		$any_remarks 		=  $_POST['quick_remark'].'&#nochange';

		$creation_date		=  $creation_date.'&#nochange';



		$history_record =  "insert into lead_list_history(`leadListId`,`name`,`surname`,`gender`,`email`,`mobile_no`,`campaign_name`,`channel_id`,`source_id`,`source_remark`,`priority`,`reference_name`,`reference_mobile_no`,`referred_to`,`status`,`sub_status`,`followup_mode`,`existing_follow_up_mode`,`next_followup_date`,`followup_remark`,`state`,`city`,`area`,`branch_id`,`department`,`course_package`,`course_or_package`,`any_remarks`,`dob`,`alternate_mobile_no`,`father_name`,`father_mobile_no`,`tenth_board`,`tenth_perc`,`tweth_board`,`tweth_perc`,`degree`,`degree_perc`,`lead_modification_date`,`next_action_date`,`lead_creation_date`)values('$last_id','$name','&#nochange','&#nochange','$email','$mobile_no','Manually Add&#nochange','Telephonic Quick Add&#nochange','$source_id','&#nochange','hot&#nochange','Hitesh Desai&#nochange','&#nochange','Hitesh Desai&#nochange','1 - New&#nochange','Not Known&#nochange','Not Known&#nochange','&#nochange','&#nochange','&#nochange','&#nochange','Not Known&#nochange','Not Known&#nochange','$branch_id','$department','$course_package','$course_or_package','$any_remarks','&#nochange','&#nochange','&#nochange','&#nochange','&#nochange','&#nochange','&#nochange','&#nochange','&#nochange','&#nochange','$creation_date','&#nochange','$creation_date')";

		$history_record1 = mysqli_query($con,$history_record);



	   	if($query1)

	   	{

	   		$data = array('status'=>1,'msg'=>"Quick Lead Add Successfully");

	   	}

	   	else

	   	{

	   		$data =  array('status'=>0,'msg'=>"Something Went Wrong");

	   	}

   }

   else

   {

   	$data =  array('status'=>2,'msg'=>"Quick Lead Already Existing");

   }



   echo json_encode($data);

}





?>