<?php 

$con = mysqli_connect("localhost","mzfrxmujjb","Q23bQYkskc","mzfrxmujjb");
date_default_timezone_set('Asia/Kolkata');

function fetch_user_last_activity($u_id,$con)
{
	$m = "SELECT * FROM login_details WHERE user_id = '$u_id' ORDER BY last_activity DESC LIMIT 1";
	$m1 = mysqli_query($con,$m);
	$m2 = mysqli_fetch_all($m1,MYSQLI_ASSOC);
	foreach ($m2 as $key => $value) 
	{
		return $value['last_activity'];
	}
}




function fetch_user_chat_history($from_user_id,$to_user_id,$con)
{

    $s = "SELECT * FROM chat_message WHERE (from_user_id = '".$from_user_id."' AND to_user_id = '".$to_user_id."') OR (from_user_id = '".$to_user_id."' AND to_user_id = '".$from_user_id."')  ORDER BY created_at DESC";
	$s1 = mysqli_query($con,$s);
	
	$s2 = mysqli_fetch_all($s1,MYSQLI_ASSOC);
	// echo "<pre>";
	// print_r($s2);
	// die;
	
	$output = '<ul class="list-unstyled">';
	foreach ($s2 as $key => $value) {

		$user_name = '';
		if($value['from_user_id'] == $from_user_id)
		{
			$user_name = '<b class="text-success">You</br>';
		$output .= '<li style="border-bottom:1px dotted #ccc;text-align:right;">

		<p>'.$user_name.'-'.$value['chat_message'].'
		<div align="right">
			-<small><em>'.$value['created_at'].'
		</em></small>
		</div>
		</p>
		</li>';
		}
		else
		{
			$user_name = '<b class="text-danger">'.get_user_name($value['from_user_id'],$con).'</br>';
			$output .= '<li style="border-bottom:1px dotted #ccc">

			<p>'.$user_name.'-'.$value['chat_message'].'
			<div align="right">
				-<small><em>'.$value['created_at'].'
			</em></small>
			</div>
			</p>
			</li>';
		}

	}

	$output .= '</ul>';
	$q = "UPDATE chat_message SET status='0' WHERE from_user_id = '".$to_user_id."' AND to_user_id = '".$from_user_id."' AND status = '1' ";
	$q1 = mysqli_query($con,$q);
	return $output;
}


function get_user_name($user_id,$con)
{
	$j = "SELECT user_name FROM login WHERE login_id = '$user_id'";
	$j1 = mysqli_query($con,$j);
	$j2 = mysqli_fetch_all($j1,MYSQLI_ASSOC);
	// print_r($j2);
	// die;

	foreach ($j2 as $key => $value) {
		
		return $value['user_name'];
	}
}



function count_unseen_message($from_user_id,$to_user_id,$con)
{
	$query = "SELECT * FROM chat_message WHERE from_user_id='$from_user_id' AND to_user_id='$to_user_id' AND status='1'";
	$query1 = mysqli_query($con,$query);
	$query2 = mysqli_num_rows($query1);
	$output = '';
	if($query2 > 0)
	{
		$output = '<span class="lable lable-success">'.$query2.'</span>';
	}
	return $output;
}



function fetch_is_type_status($user_id,$con)
{
	$m = "SELECT is_type FROM login_details WHERE user_id = '".$user_id." ORDER BY last_activity DESC LIMIT 1' ";
	$m1 = mysqli_query($con,$m);
	$m2 = mysqli_fetch_all($m1,MYSQLI_ASSOC);
	$output = '';
	foreach ($m2 as $key => $value) {
		 if($value['is_type'] == 'yes')
		 {
		 	$output = ' - <small><em><span class="text-muted">Typing.....</span></em></small>';
		 }
	  }
	  return $output;
}


?>