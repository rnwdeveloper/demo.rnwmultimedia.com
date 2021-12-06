<?php
class JobController extends CI_controller
{
	public $job_pending;
    public $job_active;
    public $job_deactive;
    public $all_jobs;
	function __construct()
	{
		@parent::__construct();
		$this->load->model("Dbcommon", "cm");
		$this->load->model("AdminSettingsModel", "admin");
		$this->load->model("Quickadmissionprocess", "admi");
		$this->load->model("CommonModel", "co");
		$this->load->model("Task", "tm");
		$this->load->library("pagination");
		$this->load->library('email');
		$this->load->helper('cookie');
		$this->load->library('upload');
		$this->load->library('session');
		Header('Access-Control-Allow-Origin: *'); 
		Header('Access-Control-Allow-Headers: *'); 
		Header('Access-Control-Allow-Methods: POST, OPTIONS, PUT, DELETE'); 
		if (@$_SESSION['logtype'] == 'Manager' || @$_SESSION['logtype'] == "Super Admin") {
            $this->job_pending = $this->cm->get_new_record_all('job_post', '1', 'job_status');
            $this->job_active = $this->cm->get_new_record_all('job_post', '0', 'job_status');
            $this->job_deactive = $this->cm->get_new_record_all('job_post', '2', 'job_status');
            $this->all_jobs = $this->cm->get_new_record_all('job_post');
        } 
        else {
            $this->job_pending = $this->cm->get_new_record_all('job_post', '1', 'job_status');
            $this->job_active = $this->cm->get_new_record_all('job_post', '0', 'job_status');
            $this->job_deactive = $this->cm->get_new_record_all('job_post', '2', 'job_status');
            $this->all_jobs = $this->cm->get_new_record_all('job_post');
        }
	}

    public function lms_all_jobs()
    {
		// if (!empty($this->input->post('filter_search'))) {
        //     $filter = $this->input->post();
        //     $display["recruiter"] = $this->cm->get_all_jobs_post("job_post", $filter);
        //     $display['filter_startDate'] = @$filter['filter_startDate'];
        //     $display['filter_endDate'] = @$filter['filter_endDate'];
        //     $display['filter_fname'] = @$filter['filter_fname'];
        //     $display['filter_lname'] = @$filter['filter_lname'];
        //     $display['filter_email'] = @$filter['filter_email'];
        //     $display['filter_mobile'] = @$filter['filter_mobile'];
        //     $display['filter_position_for_apply'] = @$filter['filter_position_for_apply'];
        //     $display['filter_prefer_job_location'] = @$filter['filter_prefer_job_location'];
        // }


        if ($this->input->get('job_status') != '') {
            $status_data_job = $this->input->get('job_status');  
            if ($this->input->post('filter_search') != '') {
                $search_record = $this->input->post();
                $display['recruiter'] = $this->cm->search_by_field_job('job_post', $search_record, $status_data_job);
                $display['filter_record'] = $search_record;
                $display['filter_startDate'] = @$filter['filter_startDate'];
                $display['filter_endDate'] = @$filter['filter_endDate'];
                $display['filter_fname'] = @$filter['filter_fname'];
                $display['filter_position_for_apply'] = @$filter['filter_position_for_apply'];
                $display['filter_prefer_job_location'] = @$filter['filter_prefer_job_location'];
            } else {
                $data['recruiter'] = $this->cm->get_job_record_bystatus('job_post', 'job_status', $status_data_job);
            }
        }
		 else
		{	
            if ($this->input->post('filter_search') != '') {
                $search_record = $this->input->post();
                $display['recruiter'] = $this->cm->search_by_field_job_all('job_post', $search_record);
                $display['filter_startDate'] = @$filter['filter_startDate'];
                $display['filter_endDate'] = @$filter['filter_endDate'];
                $display['filter_fname'] = @$filter['filter_fname'];
                $display['filter_position_for_apply'] = @$filter['filter_position_for_apply'];
                $display['filter_prefer_job_location'] = @$filter['filter_prefer_job_location'];
            } else {
                $data['recruiter'] = $this->cm->view_all('job_post');
            }
        }



            if (!empty($this->input->get('job_status'))) {
                $j_status = $this->input->get('job_status');
                if ($j_status == 'pending') {
                    $j_data = '1';
                } else if ($j_status == 'active') {
                    $j_data = '0';
                } else if ($j_status == 'deactive') {
                    $j_data = '2';
                }
                $display['recruiter'] = $this->cm->get_all_jobs_post_statuswise('job_post', $j_data, 'job_status');
            } else {
                 $display['recruiter'] = $this->cm->get_all_jobs_post('job_post');
            }
        $update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");
		$update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");
		$update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
		$update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
		$update['course_completed'] = $this->cm->course_completed_student("admission_courses");
		$update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
		$update['course_data'] = $this->cm->view_all("course");
		$update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['pending_job'] = $this->job_pending;
        $update['active_job'] = $this->job_active;
        $update['deactive_job'] = $this->job_deactive;
        $update['all_jobs'] = $this->all_jobs;
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");
        $display['branch_all'] = $this->cm->view_all_data("branch");
		$display['area_all'] = $this->cm->view_all("area");
        $display['jobtype_all'] = $this->cm->view_all("jobtype");
        //$display['recruiter'] = $this->cm->view_all("company_details");
		$display['state_all'] = $this->cm->view_all("state");
		$display['city_all'] = $this->cm->view_all("cities");
		$display['user_all'] = $this->cm->Role_all_admin("user");
        $this->load->view('erp/erpheader', $update);
		$this->load->view('jobs/lms_all_jobs', $display);
    }

    public function view_company_wise_job() {
        $id = $this->input->post('company_id');
        $data['recruiter'] = $this->cm->company_wise_job('job_post', 'company_id', $id);
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        // $this->load->view('header',$update);
        $this->load->view('jobs/ajax_company_wise_jobs', $data);
    }

    

    public function view_student_applied_jobs()
	{
		$update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");
		$update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");
		$update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
		$update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
		$update['course_completed'] = $this->cm->course_completed_student("admission_courses");
		$update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
		$update['course_data'] = $this->cm->view_all("course");
		$update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");
 
		$this->load->view('erp/erpheader', $update);
		$this->load->view('jobs/view_student_applied_jobs');
	}

    public function get_ajax_job_detail() {
        $jobpost_id = $this->input->post('jobpost_id');
        $data['record'] = $this->tm->get_job_detail_com('job_post', 'jobpost_id', $jobpost_id);
        // $data['comment_reason'] = $this->tm->get_comment_reasons('job_deactive_remarks', 'de_jobpost_id', $jobpost_id);
        $this->load->view('jobs/new_ajax_comp_details', $data);
    }

    public function get_ajax_job_remark() {
        $jobpost_id = $this->input->post('jobpost_id');
        $data['comment_reason'] = $this->tm->get_comment_reasons('job_deactive_remarks', 'de_jobpost_id', $jobpost_id);
        $this->load->view('jobs/new_job_remarks', $data);
    }
    public function add_remark_job()
	{
		$data = $this->input->post();
		date_default_timezone_set("Asia/Calcutta");
		$re_date = date('Y-m-d H:i:s');
		$remarks_by = $_SESSION['user_name'];
		$reco = array( 'job_remark_id'=> $data['job_remark_id'], 're_date' => $re_date ,'remarks_by' =>$remarks_by , 'applications_id' =>$data['applications_id'] , 'remarks' => $data['remarks'] , 'labels' => $data['labels']);
		// echo "<pre>";
		// print_r($reco);
		// die();
		$query = $this->db->insert('job_remarks', $reco);
		if($query)
		{
			$recp['all_record'] = array( 'status' => 1 , "msg" => "HI! This Record Successfully inserted");
			echo json_encode($recp);
		}else
		{
			$recp['all_record'] = array('status' => 2 ,"msg" => " Try again!!");
			echo json_encode($recp);
		}
	}
    public function change_ststus_and_ad_remark()
    {
        $data = $this->input->post();
        $record = array('de_jobpost_id' => $this->input->post('jobpost_id'), 'de_company_id' => $this->input->post('company_id'), 'de_reason_remark' => $this->input->post('remarks'), 'de_by_name' => $_SESSION['user_name'], 'de_created_date' => date('d/m/Y H:i:s'));
        $this->cm->add_job_category_position('job_deactive_remarks', $record);
        $id = $this->input->post('jobpost_id');
        $rec = array('job_status' => $this->input->post('job_status'));
        $re = $this->cm->change_admin_status_record('job_post', $rec, $id, 'jobpost_id');
        //email coding
        $status_job = $this->input->post('job_status');
        $company_id = $this->input->post('company_id');
        $jobpost_id = $this->input->post('jobpost_id');
        $all_record_company = $this->cm->get_company_record('company_detail', $company_id, 'company_id');
        $all_record_jobs_all = $this->cm->get_company_record('job_post', $jobpost_id, 'jobpost_id');
        // print_r($all_record_company);
        // print_r($all_record_jobs_all);
        $jjjj_co_name = $all_record_company->company_name;
        $jjjj_job_name = $all_record_jobs_all->job_name;
        $jjjj_position = $all_record_jobs_all->position;
        $jjj_comments = $this->input->post('remarks');
        // exit;
        $email_record = $all_record_company->email_id;
        // $email_record = "piyush0101nakarani@gmail.com";
        // print_r($email_record);
        // exit;
        $config = array('protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
        'smtp_host' => 'smtp.gmail.com', 'smtp_port' => 465, 'smtp_user' => 'placement.rnwmultimedia@gmail.com', 'smtp_pass' => 'rnw#tpo2020', 'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
        'mailtype' => 'html', //plaintext 'text' mails or 'html'
        'smtp_timeout' => '4', //in seconds
        'charset' => 'UTF-8', 'wordwrap' => TRUE);
        // $this->load->config('email');
        $this->load->library('email');
        $this->email->initialize($config);
        $from = "placement.rnwmultimedia@gmail.com";
        $to = $email_record;
        $subject = "Change Job Status";
        $message = '<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <title>T&P</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <style>
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            background: #f1f1f1;
        }
        
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }
        
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        .footer-icon td{
            width: 30px;
            height: 30px;
        }
        .footer-icon {
            text-align: center;
        }
        .footer-icon a{
            display: inline-block;
            width: 30px;
            height: 30px;
            vertical-align: middle;
        }
        .Notice_info{
            padding-left: 15px !important;
        }
        .Notice_info li{
            margin-bottom: 0px;
        }
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        
        img {
            -ms-interpolation-mode: bicubic;
        }
        
        a {
            text-decoration: none;
        }
    </style>
    <style>
        .primary {
            background: #0b527e;
        }
        
        .bg_white {
            background: #ffffff;
        }
        
        .bg_light {
            background: #fafafa;
        }
        
        .bg_black {
            background: #000000;
        }
        
        .bg_dark {
            background: rgba(0, 0, 0, .8);
        }

        .bg_gray{
            background: #e8e8e8;
        }
        
        .email-section {
            padding: 2.5em;
        }
        
        .worning {
            display: inline-block;
            padding: 3px 26px;
            background: rgba(0, 128, 0, 0.5);
            color: #fff;
        }
        .cirecil{
            width: 186px;
            height: 186px;
            border-radius: 100%;
            overflow: hidden;
            display: inline-block;
            margin: 0 auto;
            border: 5px solid #fff;
            box-shadow: 0 0 6px 0 rgba(0,0,0,.2);
        }
        ol{
            margin: 0;
            padding: 0;
        }
        p{

        }
        
        .btn {
            padding: 5px 15px;
            display: inline-block;
        }
        
        .btn.btn-primary {
            border-radius: 5px;
            background: #0d0cb5;
            color: #ffffff;
        }
        
        .btn.btn-white {
            border-radius: 5px;
            background: #ffffff;
            color: #000000;
        }
        
        .btn.btn-white-outline {
            border-radius: 5px;
            background: transparent;
            border: 1px solid #fff;
            color: #fff;
        }
        
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Poppins", sans-serif;
            color: #000000;
            margin-top: 0;
        }
        
        body {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-size: 15px;
            line-height: 1.8;
            color: rgba(0, 0, 0, .4);
        }
        
        a {
            color: #0d0cb5;
        }
        
        .services {
            background: rgba(0, 0, 0, .03);
        }
        
        .text-services {
            padding: 10px 10px 0;
            text-align: center;
        }
        
        .text-services h3 {
            font-size: 16px;
            font-weight: 600;
        }
        .services-list p{
            color: rgba(0, 0, 0, .4);
        }
        .services-list {
            padding: 12px;
            box-sizing: border-box;
            width: 100%;
            float: left;
            text-align: center;
        }
        .services-list h5{
            margin-bottom: 0;
        }
        
        .services-list img {
            float: left;
        }
        
        .services-list .text {
            width: calc(100% - 60px);
            float: right;
        }
        
        .services-list h3 {
            margin-top: 0;
            margin-bottom: 0;
            color: #212529;
        }
        
        .services-list p {
            margin: 0;
        }
        
        .footer {
            color: rgba(255, 255, 255, .5);
        }
        
        .footer .heading {
            color: #ffffff;
            font-size: 20px;
        }
        
        .footer ul {
            margin: 0;
            padding: 0;
        }
        
        .footer ul li {
            list-style: none;
            margin-bottom: 10px;
        }
        
        .footer ul li a {
            color: rgba(255, 255, 255, 1);
        }
        
        @media screen and (max-width: 500px) {
            .icon {
                text-align: left;
            }
            .text-services {
                padding-left: 0;
                padding-right: 20px;
                text-align: left;
            }
        }
    </style>

</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly;">
    <center style="width: 100%; background-color: #f1f1f1;">
        <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
        </div>
        <div style="max-width: 600px; margin: 0 auto;" class="email-container">
            
            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
                <tr>
                    <td valign="middle" class="primary footer email-section" style="padding-bottom: 0; padding-top: 0;">
                        <table>
                            <tbody>
                                <tr>
                                    <td valign="top" width="33.333%" style="padding-top: 20px;">
                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: left; padding-left: 5px; padding-right: 5px;">
                                                        <h3 class="heading" style="margin-bottom: 10px; color: #fff;">Change Below Job Status</h3>
                                                        <table width="100%">
                                                            <tr>
                                                                <td><p style="color: #dedede; margin-bottom: 5px; margin-top: 0px;">Company Name : <a style="color: #fff;" href="tel:9327506324">' . $jjjj_co_name . ' </a></p>
                                                                </td>
                                                            </tr>
                                                            <tr>    
                                                                <td>
                                                                    <p style="color: #dedede; margin-bottom: 5px; margin-top: 0px;">Job Name : <a style="color: #fff;" href="tel:7650050042"> ' . $jjjj_job_name . '</a></p>
                                                                </td>
                                                            </tr>
    <tr>
        <td>
            <p style="color: #dedede; margin-bottom: 5px; margin-top: 0px;">Job Position : <a style="color: #fff;" href="tel:7650050042">' . $jjjj_position . '</a></p>
        </td>
    </tr>
                                                            

                                                            
      <tr>
        <td>
            <p style="color: #dedede; margin-bottom: 5px; margin-top: 0px;">Response : <a style="color:#fff; " href="#" >' . $jjj_comments . '</a></p>
        </td>
    </tr>

     <tr align="center">
        <td>
            <p style="color: #dedede; margin-bottom: 5px; margin-top: 0px;">: <a style="color:#fff;" href="https://demo.rnwmultimedia.com/placement/" >Go To Link</a></p>
        </td>
    </tr>

                                                        </table>
                                                        
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                   <td valign="middle" class=" footer email-section" style="text-align: center; padding-top: 0; padding-bottom: 0; background:#e31e25;;">
                       <table>
                           <tbody>
                               <tr>
                                   <td valign="top" width="100%">
                                       <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                           <tbody>
                                               <tr>
                                                   <td style="text-align: left; padding-right: 8px; text-align: center; color: white; font-size: 12px;">
                                                       <p style="margin-top: 10px;">© Copyright 2020. Red & White Placement Department. All Rights Reserved.</p>
                                                   </td>
                                               </tr>
                                           </tbody>
                                       </table>
                                   </td>

                               </tr>
                           </tbody>
                       </table>
                   </td>
                </tr>

             
            </table>

        </div>
    </center>
</body>
</html>';
        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
        //email coding end
        if ($re) {
            $recp['all_record'] = array( 'status' => 1 , "msg" => "HI! status is changed.......");
			echo json_encode($recp);
        } else {
            $recp['all_record'] = array('status' => 2 ,"msg" => " Try again!!");
			echo json_encode($recp);
        }
    }

    public function lms_student_applied_job()
    {
        if(!empty($this->input->post('Filter')))
        {
            $filter = $this->input->post();
            $display['student_applied'] = $this->cm->applied_student_filters("student_applied_job", $filter);
            $display['filter_fname'] = @$filter['filter_fname'];
            $display['filter_company'] = @$filter['filter_company'];
            $display['filter_grId'] = @$data['filter_grId'];
            $display['filter_company_mobile_no'] = @$filter['filter_company_mobile_no'];
            $display['filter_mobile'] = @$filter['filter_mobile'];
            $display['filter_on'] = "dfgf";
        } 
        else
        {
            $display['Applied_jobs'] = $this->cm->student_applied_on_jobs('student_applied_job');
        }
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
        $update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
        $update['course_completed'] = $this->cm->course_completed_student("admission_courses");
        $update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
        $display['list_branch'] = $this->cm->view_all('branch');
        $display['list_department'] = $this->cm->view_all('department');
        $display['list_faculty'] = $this->cm->view_all_by_order("faculty","name", "asc");
        $display['all_faculty'] = $this->cm->view_all("faculty");
        $display['list_course'] = $this->cm->view_all_by_order("rnw_course","course_name", "asc");
        $display['list_package'] = $this->cm->view_all_by_order("rnw_package","package_name","asc");
        $display['list_sub_course'] = $this->cm->view_all_by_order("rnw_subcourse","subcourse_name","asc");
        $display['list_college_courses'] = $this->cm->view_all_by_order("college_courses","college_course_name","asc");
        $display['list_user'] = $this->cm->view_all_by_order("user","name","asc");
        $display['list_subject'] = $this->cm->view_all_by_order("subject_feedback","subject_name","asc");
        $display['ActiveAppliedjobs'] = $this->cm->Count_demo_status_wise("student_applied_job","status","0");
        $display['DeactiveAppliedjobs'] = $this->cm->Count_demo_status_wise("student_applied_job","status","1");
        $display['AllAppliedjobs'] = $this->cm->Count_demo_All_wise("student_applied_job");
        $display['reason_list'] = $this->cm->view_all("cancel_reason_list");
        $display['Applied_jobs'] = $this->cm->student_applied_on_jobs('student_applied_job');

        $this->load->view('erp/erpheader', $update);
        $this->load->view('jobs/lms_student_applied_job',$display);
    }
    public function active_recruiter_jobs()
     {  
        $data = $this->input->post();
        $id = $this->input->post("id");
        $status = $this->input->post("status");
        if ($status == 1) {
            $rec = array('status' => 1);
        } else {
            $rec = array('status' => 0);
        }
        $re = $this->cm->change_admin_status_record('student_applied_job', $rec, $id, 'applied_id');
        if ($re) {
            $recp['all_record'] = array( 'status' => 1 , "msg" => "HI! status is changed.......");
            echo json_encode($recp);
        } else {
            $recp['all_record'] = array('status' => 2 ,"msg" => " Try again!!");
            echo json_encode($recp);
        }
    }
    public function get_resume() 
    {
        $id = $this->input->post('id');
        $display['student_applied'] = $this->cm->select_data("student_applied_job", "applied_id", $id);
        // print_r($display);
        // die();
        $this->load->view('jobs/new_resume_ajex.php',$display);
    }
    public function rapid_jobs_post()
    {
        if ($this->input->post('search')) {
            $record = $this->input->post();
            $display['rapid_job'] = $this->cm->get_filter_record('rapid_job_post', $record);
            $display['filter_record'] = $record;
        } else {
            $display['rapid_job'] = $this->cm->get_rapid_post_data('rapid_job_post');
        }
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
        $update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
        $update['course_completed'] = $this->cm->course_completed_student("admission_courses");
        $update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
        $update['course_data'] = $this->cm->view_all("course");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
 
        $this->load->view('erp/erpheader', $update);
        $this->load->view('jobs/rapid_post_jobs',$display);
    }

    public function get_rapid_job_posotion()
    {
        $id = $this->input->post('rapid_post_id');
        $record['single_record'] = $this->admin->get_reco('rapid_job_post', 'rapid_post_id', $id);
        echo json_encode($record);
    }

    public function ajex_rapid_job_position() 
    {
        $record['rapid_job'] = $this->cm->get_all_record('rapid_job_post');
        $this->load->view('jobs/ajex_rapid_job_position',$record);
    }

    public function add_record_rapid() 
    {
        $data = $this->input->post();
        // print_r($data);
        // die();
        if (!empty($this->input->post('rapid_post_id'))) {
            $id = $this->input->post('rapid_post_id');
            $re = $this->cm->update_job_position_record('rapid_job_post', 'rapid_post_id', $id, $data);
            if ($re) {
                $recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
                echo json_encode($recp); // echo "1";
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        } else {
            unset($data['rapid_post_id']);
            $re = $this->cm->add_job_category_position('rapid_job_post', $data);
            if ($re) {
                $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
                echo json_encode($recp); // echo "1";
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        }
    }

    public function view_job_position()
    {
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
        $update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
        $update['course_completed'] = $this->cm->course_completed_student("admission_courses");
        $update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
        $update['course_data'] = $this->cm->view_all("course");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $record['position'] = $this->cm->get_all_record('job_position_category');
        $record['jmCategory'] = $this->cm->get_all_record('job_main_category');
        $this->load->view('erp/erpheader', $update);
        $this->load->view('jobs/view_job_position',$record);
    }

    public function get_job_posotion()
    {
        $id = $this->input->post('job_position_id');
        $record['single_record'] = $this->admin->get_reco('job_position_category', 'job_position_id', $id);
        echo json_encode($record);
    }

    public function ajex_job_position() 
    {
        $record['position'] = $this->cm->get_all_record('job_position_category');
        $record['jmCategory'] = $this->cm->get_all_record('job_main_category');
        $this->load->view('jobs/ajex_job_position',$record);
    }

    public function add_record_category() 
    {
        $data = $this->input->post();
        $data['created_date'] = date('Y-m-d H:i:s');
        // print_r($data);
        // die();
        if (!empty($this->input->post('job_position_id'))) {
            $id = $this->input->post('job_position_id');
            $record = array("job_position" => $this->input->post('job_position'), 'job_position_cat' => $this->input->post('job_position_cat'));
            $re = $this->cm->update_job_position_record('job_position_category', 'job_position_id', $id, $record);
            if ($re) {
                $recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
                echo json_encode($recp); // echo "1";
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        } else {
            unset($data['job_position_id']);
            $re = $this->cm->add_job_category_position('job_position_category', $data);
            if ($re) {
                $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
                echo json_encode($recp); // echo "1";
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        }
    }

    public function view_job_main_category()
    {
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
        $update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
        $update['course_completed'] = $this->cm->course_completed_student("admission_courses");
        $update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
        $update['course_data'] = $this->cm->view_all("course");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $record['position'] = $this->cm->get_all_record('job_main_category');
 
        $this->load->view('erp/erpheader', $update);
        $this->load->view('jobs/view_job_main_category',$record);
    }
    public function ajex_job_main_position() 
    {
        $record['position'] = $this->cm->get_all_record('job_position_category');
        $record['jmCategory'] = $this->cm->get_all_record('job_main_category');
        $this->load->view('jobs/ajex_job_main_position',$record);
    }

    public function add_catagory()
    {
        $data = $this->input->post();   
        $job_created_date = date('d-m-y h:i:s');
        $reco = array('job_category_name' => $data['job_category_name'] ,  'job_created_date' => $job_created_date );
        if($this->input->post('job_category_id')){
            $id = $this->input->post('job_category_id');
            $query = $this->admin->update_record('job_main_category', $data, 'job_category_id', $id);
            if($query)
            {
                $recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully updated");
                echo json_encode($recp); 
            }else
            {
                $recp["all_record"] = array('status' => 3, "msg" => "Try again");
                echo json_encode($recp); 
            }
        } else {
            $query = $this->db->insert("job_main_category", $reco);
            if($query)
            {
                $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully inserted");
                echo json_encode($recp); 
            }else
            {
                $recp["all_record"] = array('status' =>3, "msg" => "Try again");
                echo json_encode($recp); 
            }
        }
    }

    public function get_record()
    {
        $id = $this->input->post('job_category_id');
        $record['single_record'] = $this->admin->get_reco('job_main_category', 'job_category_id ', $id);
        echo json_encode($record);
    }

    public function delete_mainCate() {    
        $table = $this->input->post('table');
        $field = $this->input->post('field');
        $id = $this->input->post('id');
        $query = $this->admin->delete_record($table, $field, $id);
        if ($query) {
            $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Deleted");
            echo json_encode($recp); // echo "1";
        } else {
            $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
            echo json_encode($recp); // echo "2";
        }
    }


    public function view_job_subcategory()
    {
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
        $update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
        $update['course_completed'] = $this->cm->course_completed_student("admission_courses");
        $update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
        $update['course_data'] = $this->cm->view_all("course");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $record['position'] = $this->cm->get_all_record('job_subcategory');
        $record['jmCategory'] = $this->cm->get_all_record('job_main_category');
        $record['jmPosition'] = $this->cm->get_all_record('job_position_category');
        $this->load->view('erp/erpheader', $update);
        $this->load->view('jobs/view_job_subcategory',$record);
    }

    public function ajex_job_sub_position() 
    {
        $record['position'] = $this->cm->get_all_record('job_subcategory');
        $record['jmCategory'] = $this->cm->get_all_record('job_main_category');
        $record['jmPosition'] = $this->cm->get_all_record('job_position_category');
        $this->load->view('jobs/ajex_job_sub_position',$record);
    }

    public function get_position_main_sub() {
        $po_sub = $this->input->post('main_sub_cat');
        $jmPosition = $this->admi->get_reco_multiple('job_position_category', 'job_position_cat', $po_sub);
        ?>
        <option >--Select Catagory--</option>
                    <?php foreach($jmPosition as $jmp) { ?>
                    <option value="<?php echo $jmp->job_position; ?>"><?php echo $jmp->job_position; ?></option>
        <?php }     
    }

    public function get_subrecord()
    {
        $id = $this->input->post('job_subcategory_id');
        $record['single_record'] = $this->admin->get_reco('job_subcategory', 'job_subcategory_id', $id);
        // print_r($record);
        // die();
        echo json_encode($record);
    }


    public function add_record_subcategory() 
    {
        $data = $this->input->post();
        $data['job_sub_created_date'] = date('Y-m-d H:i:s');
        if (!empty($this->input->post('job_subcategory_id'))) {
            $id = $this->input->post('job_subcategory_id');
            $record = array("job_main_cat" => $this->input->post('job_main_cat'), 'job_position_cat' => $this->input->post('job_position_cat'), 'job_subcategory_name' => $this->input->post('job_subcategory_name'));
            $re = $this->cm->update_job_position_record('job_subcategory', 'job_subcategory_id', $id, $record);
            if ($re) {
                $recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
                echo json_encode($recp); // echo "1";
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        } else {
            unset($data['job_subcategory_id']);
            $re = $this->cm->add_job_category_position('job_subcategory', $data);
            if ($re) {
                $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
                echo json_encode($recp); // echo "1";
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        }
    }

    public function delete_SubCate() {    
        $table = $this->input->post('table');
        $field = $this->input->post('field');
        $id = $this->input->post('id');
        $query = $this->admin->delete_record($table, $field, $id);
        if ($query) {
            $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Deleted");
            echo json_encode($recp); // echo "1";
        } else {
            $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
            echo json_encode($recp); // echo "2";
        }
    }

    public function LMS_WhatsappTemplate()
    {
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
        $update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
        $update['course_completed'] = $this->cm->course_completed_student("admission_courses");
        $update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
        $update['course_data'] = $this->cm->view_all("course");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['template_data'] = $this->cm->view_all('whatsapp_template');
  
        $this->load->view('erp/erpheader', $update);
        $this->load->view('jobs/LMS_WhatsappTemplate',$display);
    }

    public function ajex_watsapp_temp() 
    {
        $record['position'] = $this->cm->get_all_record('job_subcategory');
        $record['jmCategory'] = $this->cm->get_all_record('job_main_category');
        $record['jmPosition'] = $this->cm->get_all_record('job_position_category');
        $record['template_data'] = $this->cm->view_all('whatsapp_template');
        $this->load->view('jobs/ajex_watsapp_temp',$record);
    }

    public function update_whatsapp_template() {
        $id = $this->input->post('template_w_id');
        $record['single_record'] = $this->cm->get_template_whatsapp_data('whatsapp_template', 'whatsapp_template_id', $id);
        echo json_encode($record);
    }

    public function add_template_data()
     {
        $data = $this->input->post();
        // print_r($data);
        // die();
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-y h:i:s');
        $data['created_at'] = $date;
        if ($this->input->post('whatsapp_template_id')) {
            $id = $this->input->post('whatsapp_template_id');
            $query = $this->cm->edit_update_SendEmail_template('whatsapp_template', $data, 'whatsapp_template_id', $id);
            if ($query) {
                $recp["all_record"] = array('status' => 2, "msg" => "Successfully Updated Template");
                echo json_encode($recp);
                
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp);
                
            }
        } else {
            $data['created_by'] = $_SESSION['user_name'];
            $query = $this->db->insert('whatsapp_template', $data);
            if ($query) {
                $recp["all_record"] = array('status' => 1, "msg" => "Successfully Insert Template");
                echo json_encode($recp); 
                
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); 
            }
        }
    }

    public function LMS_email_template()
    {
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
        $update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
        $update['course_completed'] = $this->cm->course_completed_student("admission_courses");
        $update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
        $update['course_data'] = $this->cm->view_all("course");
        $update['upd_faculty'] = $this->cm->view_all("faculty");  
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['template_data'] = $this->cm->view_all('SendEmail_template');
 
        $this->load->view('erp/erpheader', $update);
        $this->load->view('jobs/LMS_email_template',$display);
    }
    public function update_email_template() {
        $id = $this->input->post('SendEmail_template_id');
        $record['single_record'] = $this->cm->get_template_email_data('SendEmail_template', 'SendEmail_template_id', $id);
        echo json_encode($record);
    }
    public function add_template_SendEmail_data() 
    {
        $data = $this->input->post();
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-y h:i:s');
        $data['created_at'] = $date;
        unset($data['submit']);
        if ($this->input->post('SendEmail_template_id')) {
            $id = $this->input->post('SendEmail_template_id');
            unset($data['SendEmail_template_id']);
            $query = $this->cm->edit_update_SendEmail_template('SendEmail_template', $data, 'SendEmail_template_id', $id);
            if ($query) { 
                $recp["all_record"] = array('status' => 2, "msg" => "Successfully Updated Template");
                echo json_encode($recp); 
                
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); 
                
            }
        } else {
            unset($data['SendEmail_template_id']);
            $data['created_by'] = $_SESSION['user_name'];
            $query = $this->cm->insert_SendEmail_template('SendEmail_template', $data);
            if ($query) {
                $recp["all_record"] = array('status' => 1, "msg" => "Successfully Insert Template");
                echo json_encode($recp);
                
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); 
                
            }
        }
    }
}