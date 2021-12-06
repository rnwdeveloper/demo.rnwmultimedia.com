<?php
function logdata($c)
{
	 // use this below
    $CI = &get_instance();
    $CI->load->model('Dbcommon','cm');
	$CI->load->library('logger');
	 // $CI->load->view('UserInfo')
	if(@count($CI->cm->log_counter()) == 1)
		{
			// echo "login";
			// die;
			$data = $CI->cm->log_counter();
			// echo "<pre>";
			// print_r($data);
			// die;
			$msg = $data->comment.'/../'.date('H:i:s').'///'.$c;
			$up['comment']=$msg;
			$CI->cm->update_data("logger",$up,"id",$data->id);
		}
		else
		{
			// echo "Ins";
			// die;
				$CI->logger->user(@$_SESSION['user_name'])->type(@$_SESSION['logtype'])->id(@$_SESSION['user_id'])->token(UserInfo::get_ip())->device(UserInfo::get_device())->browser(UserInfo::get_browser())->os(UserInfo::get_os())->comment(date('H:i:s').'///'.$c)->log();
		}

}