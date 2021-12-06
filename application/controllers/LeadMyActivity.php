<?php
class LeadMyActivity extends CI_Controller {
    function __construct() {
        @parent::__construct();
        // $this->load->library('excel');
        $this->load->model("Dbcommon", "cm");
        // $this->load->model("EnquiryModal","enq");
        $this->load->library('email');
        $this->load->library('session');
        $this->perPage = 10;
    }

    // public function changekeyRecord(){
    // 	$allLeadRecord = $this->cm->view_all('lead_list');
    // 	for($i=0;$i<sizeof($allLeadRecord); $i++){
    // 		if($allLeadRecord[$i]->lead_list_dupli_id == ''){
    // 			$data = array('lead_list_dupli_id'=>$allLeadRecord[$i]->lead_list_id);
    // 			$id = $allLeadRecord[$i]->lead_list_id;
    // 			$this->cm->update_lead_record_data('lead_list',$id,$data);
    // 		}
    // 	}
    // }
    public function index() {
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['upd_faculty'] = $this->cm->view_all("faculty");
        $display['upd_branch'] = $this->cm->view_all("branch");
        $display['upd_see'] = $this->cm->check_update("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['hod_all'] = $this->cm->view_all_hod_demo("hod");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['reason_list'] = $this->cm->view_all("cancel_reason_list");
        $display['response_list'] = $this->cm->view_all("list_student_response");
        $display['channel_list'] = $this->cm->view_all("channel");
        $display['source_list'] = $this->cm->view_all("lead_source");
        $display['list_status_followup'] = $this->cm->view_all("bulk_lead_followup_type");
        $display['list_substatus_followup'] = $this->cm->view_all("bulk_lead_followup_subtype");
        $display['followupmode'] = $this->cm->view_all("list_follow_up_mode");
        $display['list_state'] = $this->cm->view_all("state");
        $display['list_area'] = $this->cm->view_all("area");
        $display['list_branch'] = $this->cm->view_all_branch("branch");
        $display['list_package'] = $this->cm->view_all("package");
        $display['list_email_template'] = $this->cm->view_all("email_template_category");
        $display['counselor_record'] = $this->cm->view_counselor_record('user');
        if (@$this->input->get('status') && $this->input->get('status') != 'All') {
            foreach ($status_all as $saa) {
                $st = explode('-', $saa->followup_type_name);
                $st1 = explode(' ', $st[1]);
                $che = $this->input->get('status');
                if ($st1[1] == $che) {
                    $display['class_type'] = $st1[1];
                    $re = $saa->followup_type_name;
                }
            }
        } else {
            $display['class_type'] = 'All';
        }
        if (@$this->input->post('status_f')) {
            foreach ($status_all as $saa) {
                $st = explode('-', $saa->followup_type_name);
                $st1 = explode(' ', $st[1]);
                $che = $this->input->post('status_f');
                if ($st1[1] == $che) {
                    $display['class_type'] = $st1[1];
                    $re = $saa->followup_type_name;
                }
            }
        }
        if (@$this->input->post('start')) {
            $search = $this->input->post('start');
            // $count_all_record = $this->cm->count_date_wise_record('lead_list',$search);
            $count_all_record = $this->cm->count_date_wise_record('lead_list', $search);
            $yellow_data = $this->cm->get_date_wise_record_data('lead_list', $search, 'yellow');
            date_default_timezone_set("Asia/Calcutta");
            $check_date = date('m/d/Y h:i A');
            $count = 0;
            $day1 = strtotime($check_date);
            for($i = 0;$i < sizeof($yellow_data);$i++) {
                $date_y = $yellow_data[$i]->next_action_date;
                $day2 = strtotime($date_y);
                $diffHours = ($day2 - $day1) / 3600;
                $status = 0;
                if ($diffHours < 0) {
                    $NumRowforGreen = $this->cm->check_green_data('lead_list', 'lead_list_dupli_id', $yellow_data[$i]->lead_list_id);
                    if ($NumRowforGreen > 1) {
                        $id_lead = $yellow_data[$i]->lead_list_id;
                        $next_update_data = $yellow_data[$i]->next_action_date_update;
                        $d_up = array('next_action_date' => $next_update_data, 'next_followup_date' => $next_update_data);
                        $this->cm->update_myfollowup_record('lead_list', 'lead_list_id', $id_lead, $d_up);
                        $status = 1;
                    }
                    if ($status != 1) {
                        $id_lead = $yellow_data[$i]->lead_list_id;
                        $d_up = array('followup_status_red' => 'red', 'followup_status_yellow' => '');
                        $this->cm->update_myfollowup_record('lead_list', 'lead_list_id', $id_lead, $d_up);
                    }
                }
            }
            if (@$this->input->post('status_wise') == 'planned') {
                $conditions['where'] = array('followup_status_yellow' => 'yellow');
            } else if (@$this->input->post('status_wise') == 'missed') {
                $conditions['where'] = array('followup_status_red' => 'red');
            } else if (@$this->input->post('status_wise') == 'done') {
                $conditions['where'] = array('followup_status_green' => 'green');
            }
            $this->session->set_userdata('status_wise', $this->input->post('status_wise'));
            $yellow = $this->cm->get_date_wise_record('lead_list', $search, 'yellow');
            $green = $this->cm->get_date_wise_record('lead_list', $search, 'green');
            $red = $this->cm->get_date_wise_record('lead_list', $search, 'red');
            $sear = array('next_action_date' => $search);
        } else {
            date_default_timezone_set("Asia/Calcutta");
            $current_date = date('m/d/Y');
            $search = $current_date;
            $count_all_record = $this->cm->count_date_wise_record('lead_list', $search);
            // $yellow = $this->cm->get_date_wise_record('lead_list',$search,'yellow');
            $yellow_data = $this->cm->get_date_wise_record_data('lead_list', $search, 'yellow');
            // echo "<pre>";
            // print_r($yellow_data);
            // exit;
            date_default_timezone_set("Asia/Calcutta");
            $check_date = date('m/d/Y h:i A');
            $count = 0;
            $day1 = strtotime($check_date);
            for ($i = 0;$i < sizeof($yellow_data);$i++) {
                $date_y = $yellow_data[$i]->next_action_date;
                $day2 = strtotime($date_y);
                $diffHours = ($day2 - $day1) / 3600;
                $status = 0;
                if ($diffHours < 0) {
                    $NumRowforGreen = $this->cm->check_green_data('lead_list', 'lead_list_dupli_id', $yellow_data[$i]->lead_list_id);
                    if ($NumRowforGreen > 1) {
                        $id_lead = $yellow_data[$i]->lead_list_id;
                        $next_update_data = $yellow_data[$i]->next_action_date_update;
                        $d_up = array('next_action_date' => $next_update_data, 'next_followup_date' => $next_update_data);
                        $this->cm->update_myfollowup_record('lead_list', 'lead_list_id', $id_lead, $d_up);
                        $status = 1;
                    }
                    if ($status != 1) {
                        $id_lead = $yellow_data[$i]->lead_list_id;
                        $d_up = array('followup_status_red' => 'red', 'followup_status_yellow' => '');
                        $this->cm->update_myfollowup_record('lead_list', 'lead_list_id', $id_lead, $d_up);
                    }
                }
            }
            if (@$this->input->post('status_wise') == 'planned') {
                $conditions['where'] = array('followup_status_yellow' => 'yellow');
            } else if (@$this->input->post('status_wise') == 'missed') {
                $conditions['where'] = array('followup_status_red' => 'red');
            } else if (@$this->input->post('status_wise') == 'done') {
                $conditions['where'] = array('followup_status_green' => 'green');
            }
            $sear = array('next_action_date' => $search);
            $yellow = $this->cm->get_date_wise_record('lead_list', $search, 'yellow');
            $green = $this->cm->get_date_wise_record('lead_list', $search, 'green');
            $red = $this->cm->get_date_wise_record('lead_list', $search, 'red');
            // $check_data = array('followup_status_yellow'=>"",'followup_status_red'=>"");
            
        }
        // echo "<pre>";
        // print_r($sear);
        // exit;
        // exit;
        $conditions['order_by'] = "lead_list_id DESC";
        $conditions['limit'] = $this->perPage;
        //       if(!empty($re)){
        // }
        if (!empty($sear)) {
            $conditions['searching'] = $sear;
            // $conditions['where'] = $check_data;
        }
        $display['lead_list_all'] = $this->cm->getRows_myactivity($conditions);
        // echo "<pre>";
        // print_r($display['lead_list_all']);
        // exit;
        // $followup_st[] = array();
        // $followup_st['green'] =$green;
        $followup_st['date_record'] = $search;
        $followup_st['ALL'] = $count_all_record;
        $followup_st['red'] = $red;
        $followup_st['yellow'] = $yellow;
        $followup_st['green'] = $green;
        $followup_st['status_of_record'] = $this->input->post('status_wise');
        // $search = $current_date;
        // exit;
        // echo "<pre>";
        // // echo "tst";
        // echo $re;
        // echo "<pre>";
        // print_r($followup_st);
        // exit;
        // $data['posts'] = $this->post->getRows($conditions);

        $update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
        $update['course_completed'] = $this->cm->course_completed_student("admission_courses");
        $update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
        $display['followup_status_wise'] = $followup_st;
        $display['list_department'] = $this->cm->view_all("department");
        $display['list_city'] = $this->cm->get_source_record("cities", 'city_state', 'Gujarat');
        $display['list_course'] = $this->cm->view_all("course");
        $display['lead_followup_history'] = $this->cm->view_all("lead_followup_history");
        $display['lead_followup_history_response'] = $this->cm->view_all("lead_followup_history_response");
        $display['sms_template_list'] = $this->cm->view_all("sms_template");
        // echo "<pre>";
        // print_r($display['demo_data']);
        // die;
        // $display['status_wise'] = $status_wise;
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");

        // echo "<pre>";
        // echo $this->input->post('st_update_status');
        
        if (!empty($this->input->post('st_update_status'))) {
            // echo "Test";
            // exit;
            $this->load->view('crm/ajax_lead_list_myactivity', $display);
            // $this->load->view('dashboard/ajax_lead_list_myactivity', $display);
        } else if (!empty($this->input->post('test')) || !empty($this->input->post('start'))) {
            // $this->load->view('crm/ajax_lead_list_myactivity', $display);
            $this->load->view('dashboard/ajax_lead_list_myactivity_edit', $display);
        } else {
            // $this->load->view('header_test',$update);
            // $this->load->view('dashboard/header',$update);
            // $this->load->view('dashboard/myactivity',$display);
            $this->load->view('erp/erpheader', $update);
            $this->load->view('crm/crm_myfollowup', $display);
        }
    }
    public function load_calendar_data() {
        $event_data = $this->cm->fetch_all_event();
       
        // echo "<pre>";
        // print_r($event_data);
        // exit;
        // foreach ($event_data->result_array() as $row) {
        for($i=0;$i<sizeof($event_data); $i++)
        {
            if($event_data[$i]->next_action_date != '') {
                $data[] = array('id' => $event_data[$i]->lead_list_id,
                // 'title'	=>	$row['name'],
                'start' => $event_data[$i]->next_action_date,
                // 'end'	=>	$row['lead_modification_date'],
                // 'backgroundColor' =>"red"
                );
            }
        }
        // }
        // echo "<pre>";
        // print_r($data);
        // exit;
        echo json_encode($data);
    }
    function loadMoreData() {
        $conditions = array();
        $status_all = $this->cm->view_all('bulk_lead_followup_type');
        $lastID = $this->input->post('id');
        // $status_f = $this->input->post('sta`tus_f');
        $re = $this->input->post('status_wise');
        // exit;
        if (isset($re)) {
            if ($re == 'planned') {
                $con = array('lead_list_id <' => $lastID);
            } else if ($re == 'missed') {
                $con = array('lead_list_id <' => $lastID);
            } else if ($re == 'done') {
                $con = array('lead_list_id <' => $lastID);
            }
        } else {
            $con = array('lead_list_id <' => $lastID);
        }
        date_default_timezone_set("Asia/Calcutta");
        $current_date = date('m/d/Y');
        $search = $current_date;
        $count_all_record = $this->cm->count_date_wise_record('lead_list', $search) . "<br>";
        // $yellow = $this->cm->get_date_wise_record('lead_list',$search,'yellow');
        $yellow_data = $this->cm->get_date_wise_record_data('lead_list', $search, 'yellow');
        $check_date = date('m/d/Y h:i A');
        $count = 0;
        $day1 = strtotime($check_date);
        for ($i = 0;$i < sizeof($yellow_data);$i++) {
            $date_y = $yellow_data[$i]->next_action_date;
            $day2 = strtotime($date_y);
            $diffHours = ($day2 - $day1) / 3600;
            if ($diffHours < 0) {
                $id_lead = $yellow_data[$i]->lead_list_id;
                $d_up = array('followup_status_red' => 'red', 'followup_status_yellow' => '');
                $this->cm->update_myfollowup_record('lead_list', 'lead_list_id', $id_lead, $d_up);
            }
        }
        if (@$this->input->post('start_date')) {
            $search = trim($this->input->post('start_date'));
            // $sear = array('next_action_date'=>$search);
            $sear = array('next_action_date' => $search);
            // print_r($sear);
            
        } else {
            $sear = array('next_action_date' => $search);
        }
        $yellow = $this->cm->get_date_wise_record('lead_list', $search, 'yellow') . "<br>";
        $red = $this->cm->get_date_wise_record('lead_list', $search, 'red') . "<br>";
        $con['followup_status_green'] = 'green';
        if (@$this->input->post('status_wise') == 'planned' || @$this->session->userdata('status_wise') == 'planned') {
            $con = array('lead_list_id <' => $lastID, 'followup_status_yellow' => 'yellow');
        } else if (@$this->input->post('status_wise') == 'missed' || @$this->session->userdata('status_wise') == 'missed') {
            $con = array('lead_list_id <' => $lastID, 'followup_status_red' => 'red');
        } else if (@$this->input->post('status_wise') == 'done' || @$this->session->userdata('status_wise') == 'done') {
            // $con['followup_status_green'] = 'green';
            $con = array('lead_list_id <' => $lastID, 'followup_status_green' => 'green');
        } else {
            $con = array('lead_list_id <' => $lastID);
        }
        $conditions['where'] = $con;
        $conditions['returnType'] = 'count';
        if (!empty($sear)) {
            $conditions['searching'] = $sear;
        }
        $display['postNum'] = $this->cm->getRows_myactivity($conditions);
        // echo "<pre>sdf";
        // print_r($display['postNum']);
        // exit;
        // Get posts data from the database
        if (@$this->input->post('status_wise') == 'planned' || @$this->session->userdata('status_wise') == 'planned') {
            $con = array('lead_list_id <' => $lastID, 'followup_status_yellow' => 'yellow');
        } else if (@$this->input->post('status_wise') == 'missed' || @$this->session->userdata('status_wise') == 'missed') {
            $con = array('lead_list_id <' => $lastID, 'followup_status_red' => 'red');
        } else if (@$this->input->post('status_wise') == 'done' || @$this->session->userdata('status_wise') == 'done') {
            // $con['followup_status_green'] = 'green';
            $con = array('lead_list_id <' => $lastID, 'followup_status_green' => 'green');
        } else {
            $con = array('lead_list_id <' => $lastID);
        }
        // $conditions['wherer'] = array('followup_status_red'=>'red');
        $conditions['returnType'] = '';
        $conditions['order_by'] = "lead_list_id DESC";
        $conditions['limit'] = $this->perPage;
        // $data['posts'] = $this->post->getRows($conditions);
        $display['lead_list_all'] = $this->cm->getRows_myactivity($conditions);
        // echo "<pre>";
        // print_r($display['lead_list_all']);
        // exit;
        $display['postLimit'] = $this->perPage;
        // Pass data to view
        $display['list_department'] = $this->cm->view_all("department");
        $display['list_city'] = $this->cm->get_source_record("cities", 'city_state', 'Gujarat');
        $display['list_course'] = $this->cm->view_all("course");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['hod_all'] = $this->cm->view_all_hod_demo("hod");
        $display['list_state'] = $this->cm->view_all("state");
        $display['list_area'] = $this->cm->view_all("area");
        $display['list_branch'] = $this->cm->view_all("branch");
        $display['list_package'] = $this->cm->view_all("package");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        //$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['reason_list'] = $this->cm->view_all("cancel_reason_list");
        $display['response_list'] = $this->cm->view_all("list_student_response");
        $display['channel_list'] = $this->cm->view_all("channel");
        $display['source_list'] = $this->cm->view_all("lead_source");
        $display['list_status_followup'] = $this->cm->view_all("bulk_lead_followup_type");
        $display['list_substatus_followup'] = $this->cm->view_all("bulk_lead_followup_subtype");
        $display['followupmode'] = $this->cm->view_all("list_follow_up_mode");
        $display['lead_followup_history'] = $this->cm->view_all("lead_followup_history");
        $display['lead_followup_history_response'] = $this->cm->view_all("lead_followup_history_response");
        $this->load->view('dashboard/load-more-data-myactivity', $display);
    }
    public function channel() {
        if (@$this->input->get('action') == 'update') {
            $id = $this->input->get('id');
            $display['channel_record'] = $this->cm->get_record_channel('channel', 'channel_id', $id);
        }
        if (@$this->input->get('action') == 'delete') {
            $id = $this->input->get('id');
            $re = $this->cm->delete_channel('channel', 'channel_id', $id);
            if ($re) {
                $this->session->set_flashdata('msg_alert_delete', 'Channel Delete Successfully');
                redirect('LeadlistController/channel');
            }
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            unset($data['submit']);
            $username = $_SESSION['Admin']['username'];
            $data['addBy'] = $username;
            if (@$this->input->post('channel_id')) {
                unset($data['channel_id']);
                $id = $this->input->post('channel_id');
                $re = $this->cm->updateChannel('channel', 'channel_id', $id, $data);
                if ($re) {
                    $this->session->set_flashdata('msg_alert_update', 'Channel Update Successfully');
                    redirect('LeadlistController/channel');
                }
            } else {
                $re = $this->cm->addChannel('channel', $data);
                if ($re) {
                    $this->session->set_flashdata('msg_alert', 'Channel add Successfully');
                    redirect('LeadlistController/channel');
                }
            }
        }
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['upd_faculty'] = $this->cm->view_all("faculty");
        $display['upd_branch'] = $this->cm->view_all("branch");
        $display['upd_see'] = $this->cm->check_update("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['hod_all'] = $this->cm->view_all_hod_demo("hod");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        //$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['reason_list'] = $this->cm->view_all("cancel_reason_list");
        $display['response_list'] = $this->cm->view_all("list_student_response");
        $display['channel_list'] = $this->cm->view_all("channel");
        // echo "<pre>";
        // print_r($display['demo_data']);
        // die;
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header_test', $update);
        $this->load->view('dashboard/channel', $display);
    }
    //email template
    // public function email_template()
    // {
    // 	if(@$this->input->get('action')=='update')
    // 	{
    // 		$id =  $this->input->get('id');
    // 		$display['template_record'] =  $this->cm->get_record_channel('email_template','id',$id);
    // 	}
    // 	if(@$this->input->get('action')=='delete')
    // 	{
    // 		$id = $this->input->get('id');
    // 		$re =  $this->cm->delete_channel('email_template','id',$id);
    // 		if($re)
    // 		{
    // 			$this->session->set_flashdata('msg_alert_delete','Template Delete Successfully');
    // 			redirect('LeadlistController/EmailTemplate');
    // 		}
    // 	}
    // 	if(!empty($this->input->post('submit')))
    // 	{
    // 		$data =  $this->input->post();
    // 		unset($data['submit']);
    // 		$username =  $_SESSION['Admin']['username'];
    // 		$data['addBy'] = $username;
    // 		if(@$this->input->post('email_template_id'))
    // 		{
    // 			unset($data['email_template_id']);
    // 			$id =  $this->input->post('email_template_id');
    // 			$re = $this->cm->updateChannel('email_template','id',$id,$data);
    // 			if($re)
    // 			{
    // 				$this->session->set_flashdata('msg_alert_update','Template Update Successfully');
    // 				redirect('LeadlistController/EmailTemplate');
    // 			}
    // 		}
    // 		else
    // 		{
    // 			$re = $this->cm->addChannel('email_template',$data);
    // 			if($re)
    // 			{
    // 				$this->session->set_flashdata('msg_alert','Template add Successfully');
    // 				redirect('LeadlistController/EmailTemplate');
    // 			}
    // 		}
    // 	}
    // 	$update['upd_faculty'] = $this->cm->view_all("faculty");
    // 	$update['upd_branch'] = $this->cm->view_all("branch");
    // 	$update['upd_see'] = $this->cm->check_update("demo");
    // 	$display['upd_faculty'] = $this->cm->view_all("faculty");
    // 	$display['upd_branch'] = $this->cm->view_all("branch");
    // 	$display['upd_see'] = $this->cm->check_update("demo");
    // 	$display['department_all'] = $this->cm->view_all("department");
    // 	$display['branch_all'] = $this->cm->view_all("branch");
    // 	$display['course_all'] = $this->cm->view_all("course");
    // 	$display['hod_all'] = $this->cm->view_all_hod_demo("hod");
    // 	$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
    // 	//$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
    // 	$display['reason_list'] = $this->cm->view_all("cancel_reason_list");
    // 	$display['response_list'] = $this->cm->view_all("list_student_response");
    // 	$display['template_list'] = $this->cm->view_all("email_template");
    // 	// echo "<pre>";
    // 	// print_r($display['demo_data']);
    // 	// die;
    // 	$update['f_module'] = $this->cm->view_all("f_module");
    // 	$update['m_module'] = $this->cm->view_all("m_module");
    // 	$update['l_module'] = $this->cm->view_all("l_module");
    // 	$this->load->view('dashboard/header',$update);
    // 	$this->load->view('dashboard/EmailTemplate',$display);
    // }
    public function email_template_category() {
        if (@$this->input->get('action') == 'update') {
            $id = $this->input->get('id');
            $display['template_category_record'] = $this->cm->get_record_channel('email_template_category', 'id', $id);
        }
        if (@$this->input->get('action') == 'delete') {
            $id = $this->input->get('id');
            $re = $this->cm->delete_channel('email_template_category', 'id', $id);
            if ($re) {
                $this->session->set_flashdata('msg_alert_delete', 'Template_category Delete Successfully');
                redirect('LeadlistController/email_template_category');
            }
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            unset($data['submit']);
            $username = $_SESSION['Admin']['username'];
            $data['addBy'] = $username;
            if (@$this->input->post('email_template_category_id')) {
                unset($data['email_template_category_id']);
                $id = $this->input->post('email_template_category_id');
                $category = htmlentities($data['category'], ENT_QUOTES, "UTF-8");
                $html_template = htmlentities($data['html_template'], ENT_QUOTES, "UTF-8");
                $data['category'] = $category;
                $data['html_template'] = $html_template;
                $re = $this->cm->updateChannel('email_template_category', 'id', $id, $data);
                if ($re) {
                    $this->session->set_flashdata('msg_alert_update', 'Template Category Update Successfully');
                    redirect('LeadlistController/email_template_category');
                }
            } else {
                unset($data['email_template_category_id']);
                // echo "<pre>";
                $category = htmlentities($data['category'], ENT_QUOTES, "UTF-8");
                $html_template = htmlentities($data['html_template'], ENT_QUOTES, "UTF-8");
                $data['category'] = $category;
                $data['html_template'] = $html_template;
                // print_r($category);
                // exit;
                $re = $this->cm->addChannel('email_template_category', $data);
                if ($re) {
                    $this->session->set_flashdata('msg_alert', 'Template category add Successfully');
                    redirect('LeadlistController/email_template_category');
                }
            }
        }
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['upd_faculty'] = $this->cm->view_all("faculty");
        $display['upd_branch'] = $this->cm->view_all("branch");
        $display['upd_see'] = $this->cm->check_update("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['hod_all'] = $this->cm->view_all_hod_demo("hod");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        //$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['reason_list'] = $this->cm->view_all("cancel_reason_list");
        $display['response_list'] = $this->cm->view_all("list_student_response");
        $display['template_category_list'] = $this->cm->view_all("email_template_category");
        // echo "<pre>";
        // print_r($display['demo_data']);
        // die;
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('dashboard/header', $update);
        $this->load->view('dashboard/EmailTemplateCategory', $display);
    }
    public function sms_template() {
        // echo "<pre>";
        // print_r($this->input->post());
        // exit;
        if (@$this->input->get('action') == 'update') {
            $id = $this->input->get('id');
            $display['template_category_record'] = $this->cm->get_record_channel('sms_template', 'sms_id', $id);
        }
        if (@$this->input->get('action') == 'delete') {
            $id = $this->input->get('id');
            $re = $this->cm->delete_channel('sms_template', 'sms_id', $id);
            if ($re) {
                $this->session->set_flashdata('msg_alert_delete', 'SMS Template Delete Successfully');
                redirect('LeadlistController/sms_template');
            }
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            unset($data['submit']);
            $username = $_SESSION['Admin']['username'];
            $data['addBy'] = $username;
            if (@$this->input->post('sms_template_category_id')) {
                unset($data['sms_template_category_id']);
                $id = $this->input->post('sms_template_category_id');
                $re = $this->cm->updateChannel('sms_template', 'sms_id', $id, $data);
                if ($re) {
                    $this->session->set_flashdata('msg_alert_update', 'Template Update Successfully');
                    redirect('LeadlistController/sms_Template');
                }
            } else {
                unset($data['sms_template_category_id']);
                $re = $this->cm->addChannel('sms_template', $data);
                if ($re) {
                    $this->session->set_flashdata('msg_alert', 'Sms Template add Successfully');
                    redirect('LeadlistController/sms_Template');
                }
            }
        }
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['upd_faculty'] = $this->cm->view_all("faculty");
        $display['upd_branch'] = $this->cm->view_all("branch");
        $display['upd_see'] = $this->cm->check_update("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['hod_all'] = $this->cm->view_all_hod_demo("hod");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        //$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['reason_list'] = $this->cm->view_all("cancel_reason_list");
        $display['response_list'] = $this->cm->view_all("list_student_response");
        $display['sms_category_list'] = $this->cm->view_all("sms_template");
        // echo "<pre>";
        // print_r($display['demo_data']);
        // die;
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('dashboard/header', $update);
        $this->load->view('dashboard/SmsTemplateCategory', $display);
    }
    public function source() {
        if (@$this->input->get('action') == 'update') {
            $id = $this->input->get('id');
            $display['source_record'] = $this->cm->get_record_channel('lead_source', 'source_id', $id);
        }
        if (@$this->input->get('action') == 'delete') {
            $id = $this->input->get('id');
            $re = $this->cm->delete_channel('lead_source', 'source_id', $id);
            if ($re) {
                $this->session->set_flashdata('msg_alert_delete', 'Source Delete Successfully');
                redirect('LeadlistController/source');
            }
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            unset($data['submit']);
            $username = $_SESSION['Admin']['username'];
            $data['addBy'] = $username;
            if (@$this->input->post('source_id')) {
                unset($data['source_id']);
                $id = $this->input->post('source_id');
                $re = $this->cm->updateChannel('lead_source', 'source_id', $id, $data);
                if ($re) {
                    $this->session->set_flashdata('msg_alert_update', 'Source Update Successfully');
                    redirect('LeadlistController/source');
                }
            } else {
                $re = $this->cm->addChannel('lead_source', $data);
                if ($re) {
                    $this->session->set_flashdata('msg_alert', 'Source add Successfully');
                    redirect('LeadlistController/source');
                }
            }
        }
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['upd_faculty'] = $this->cm->view_all("faculty");
        $display['upd_branch'] = $this->cm->view_all("branch");
        $display['upd_see'] = $this->cm->check_update("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['hod_all'] = $this->cm->view_all_hod_demo("hod");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        //$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['reason_list'] = $this->cm->view_all("cancel_reason_list");
        $display['response_list'] = $this->cm->view_all("list_student_response");
        $display['source_list'] = $this->cm->view_all("lead_source");
        // echo "<pre>";
        // print_r($display['demo_data']);
        // die;
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header_test', $update);
        $this->load->view('dashboard/source', $display);
    }
    public function school_college() {
        if (@$this->input->get('action') == 'update') {
            $id = $this->input->get('id');
            $display['school_record'] = $this->cm->get_record_channel('list_school', 'school_id', $id);
        }
        if (@$this->input->get('action') == 'delete') {
            $id = $this->input->get('id');
            $re = $this->cm->delete_channel('list_school', 'school_id', $id);
            if ($re) {
                $this->session->set_flashdata('msg_alert_delete', 'School/College Delete Successfully');
                redirect('LeadlistController/school_college');
            }
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            unset($data['submit']);
            $username = $_SESSION['Admin']['username'];
            $data['addBy'] = $username;
            if (@$this->input->post('school_id')) {
                unset($data['school_id']);
                $id = $this->input->post('school_id');
                $re = $this->cm->updateChannel('list_school', 'school_id', $id, $data);
                if ($re) {
                    $this->session->set_flashdata('msg_alert_update', 'School/College Update Successfully');
                    redirect('LeadlistController/school_college');
                }
            } else {
                $re = $this->cm->addChannel('list_school', $data);
                if ($re) {
                    $this->session->set_flashdata('msg_alert', 'School/College add Successfully');
                    redirect('LeadlistController/school_college');
                }
            }
        }
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['upd_faculty'] = $this->cm->view_all("faculty");
        $display['upd_branch'] = $this->cm->view_all("branch");
        $display['upd_see'] = $this->cm->check_update("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['hod_all'] = $this->cm->view_all_hod_demo("hod");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        //$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['reason_list'] = $this->cm->view_all("cancel_reason_list");
        $display['response_list'] = $this->cm->view_all("list_student_response");
        $display['school_list'] = $this->cm->view_all("list_school");
        // echo "<pre>";
        // print_r($display['demo_data']);
        // die;
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header_test', $update);
        $this->load->view('dashboard/list_school', $display);
    }
    public function lead_status() {
        if (@$this->input->get('action') == 'update') {
            $id = $this->input->get('id');
            $display['followup_status'] = $this->cm->get_record_channel('bulk_lead_followup_type', 'followup_type_id', $id);
        }
        if (@$this->input->get('action') == 'delete') {
            $id = $this->input->get('id');
            $re = $this->cm->delete_channel('bulk_lead_followup_type', 'followup_type_id', $id);
            if ($re) {
                $this->session->set_flashdata('msg_alert_delete', 'Followup status Delete Successfully');
                redirect('LeadlistController/lead_status');
            }
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            unset($data['submit']);
            $username = $_SESSION['Admin']['username'];
            $data['addBy'] = $username;
            if (@$this->input->post('followup_type_id')) {
                unset($data['followup_type_id']);
                $id = $this->input->post('followup_type_id');
                $re = $this->cm->updateChannel('bulk_lead_followup_type', 'followup_type_id', $id, $data);
                if ($re) {
                    $this->session->set_flashdata('msg_alert_update', 'Followup Status Update Successfully');
                    redirect('LeadlistController/lead_status');
                }
            } else {
                $re = $this->cm->addChannel('bulk_lead_followup_type', $data);
                if ($re) {
                    $this->session->set_flashdata('msg_alert', 'Followup Status add Successfully');
                    redirect('LeadlistController/lead_status');
                }
            }
        }
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['upd_faculty'] = $this->cm->view_all("faculty");
        $display['upd_branch'] = $this->cm->view_all("branch");
        $display['upd_see'] = $this->cm->check_update("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['hod_all'] = $this->cm->view_all_hod_demo("hod");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        //$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['reason_list'] = $this->cm->view_all("cancel_reason_list");
        $display['response_list'] = $this->cm->view_all("list_student_response");
        $display['status_list'] = $this->cm->view_all("bulk_lead_followup_type");
        // echo "<pre>";
        // print_r($display['demo_data']);
        // die;
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header_test', $update);
        $this->load->view('dashboard/lead_status', $display);
    }
    public function lead_substatus() {
        if (@$this->input->get('action') == 'update') {
            $id = $this->input->get('id');
            $display['followup_substatus'] = $this->cm->get_record_channel('bulk_lead_followup_subtype', 'subtype_id', $id);
        }
        if (@$this->input->get('action') == 'delete') {
            $id = $this->input->get('id');
            $re = $this->cm->delete_channel('bulk_lead_followup_subtype', 'subtype_id', $id);
            if ($re) {
                $this->session->set_flashdata('msg_alert_delete', 'Followup status Delete Successfully');
                redirect('LeadlistController/lead_substatus');
            }
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            unset($data['submit']);
            $username = $_SESSION['Admin']['username'];
            $data['addBy'] = $username;
            if (@$this->input->post('subtype_id')) {
                unset($data['subtype_id']);
                $id = $this->input->post('subtype_id');
                $re = $this->cm->updateChannel('bulk_lead_followup_subtype', 'subtype_id', $id, $data);
                if ($re) {
                    $this->session->set_flashdata('msg_alert_update', 'Followup sub - Status Update Successfully');
                    redirect('LeadlistController/lead_substatus');
                }
            } else {
                $re = $this->cm->addChannel('bulk_lead_followup_subtype', $data);
                if ($re) {
                    $this->session->set_flashdata('msg_alert', 'Followup Status add Successfully');
                    redirect('LeadlistController/lead_substatus');
                }
            }
        }
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['upd_faculty'] = $this->cm->view_all("faculty");
        $display['upd_branch'] = $this->cm->view_all("branch");
        $display['upd_see'] = $this->cm->check_update("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['hod_all'] = $this->cm->view_all_hod_demo("hod");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        //$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['reason_list'] = $this->cm->view_all("cancel_reason_list");
        $display['response_list'] = $this->cm->view_all("list_student_response");
        $display['substatus_list'] = $this->cm->view_all_substatus("bulk_lead_followup_subtype");
        $display['status_list'] = $this->cm->view_all("bulk_lead_followup_type");
        // echo "<pre>";
        // print_r($display['demo_data']);
        // die;
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header_test', $update);
        $this->load->view('dashboard/lead_substatus', $display);
    }
    public function lead_followup_mode() {
        if (@$this->input->get('action') == 'update') {
            $id = $this->input->get('id');
            $display['followup_mode'] = $this->cm->get_record_channel('list_follow_up_mode', 'follow_up_mode_id', $id);
        }
        if (@$this->input->get('action') == 'delete') {
            $id = $this->input->get('id');
            $re = $this->cm->delete_channel('list_follow_up_mode', 'follow_up_mode_id', $id);
            if ($re) {
                $this->session->set_flashdata('msg_alert_delete', 'Followup Mode Delete Successfully');
                redirect('LeadlistController/lead_followup_mode');
            }
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            unset($data['submit']);
            $username = $_SESSION['Admin']['username'];
            $data['addBy'] = $username;
            if (@$this->input->post('follow_up_mode_id')) {
                unset($data['follow_up_mode_id']);
                $id = $this->input->post('follow_up_mode_id');
                $re = $this->cm->updateChannel('list_follow_up_mode', 'follow_up_mode_id', $id, $data);
                if ($re) {
                    $this->session->set_flashdata('msg_alert_update', 'Followup Mode Update Successfully');
                    redirect('LeadlistController/lead_followup_mode');
                }
            } else {
                $re = $this->cm->addChannel('list_follow_up_mode', $data);
                if ($re) {
                    $this->session->set_flashdata('msg_alert', 'Followup Mode add Successfully');
                    redirect('LeadlistController/lead_followup_mode');
                }
            }
        }
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['upd_faculty'] = $this->cm->view_all("faculty");
        $display['upd_branch'] = $this->cm->view_all("branch");
        $display['upd_see'] = $this->cm->check_update("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['hod_all'] = $this->cm->view_all_hod_demo("hod");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        //$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['reason_list'] = $this->cm->view_all("cancel_reason_list");
        $display['response_list'] = $this->cm->view_all("list_student_response");
        // $display['substatus_list'] = $this->cm->view_all_substatus("bulk_lead_followup_subtype");
        $display['list_followup_mode'] = $this->cm->view_all("list_follow_up_mode");
        // echo "<pre>";
        // print_r($display['demo_data']);
        // die;
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header_test', $update);
        $this->load->view('dashboard/list_followup_mode', $display);
    }
    public function get_source_data() {
        $ch_id = $this->input->post('channel_id');
        $record['source_list'] = $this->cm->get_source_record('lead_source', 'channel_source_id', $ch_id);
        $this->load->view('dashboard/ajax_lead_source', $record);
    }
    public function get_substatus_data() {
        $status_id = $this->input->post('status_id');
        $record['list_substatus_followup'] = $this->cm->get_source_record('bulk_lead_followup_subtype', 'followup_status_id', $status_id);
        $this->load->view('dashboard/ajax_subtype_followup', $record);
    }
    public function get_department_data() {
        $branch_id = $this->input->post('branch_id');
        $record['list_department'] = $this->cm->get_source_record('department', 'branch_id', $branch_id);
        $this->load->view('dashboard/ajax_department_page', $record);
    }
    public function get_course_package_single() {
        $course = $this->input->post('course');
        if ($course == 'single') {
            $record['list_course'] = $this->cm->view_all("course");
            $record['course'] = "course";
            $this->load->view('dashboard/ajax_course', $record);
        } else {
            $record['list_course'] = $this->cm->view_all("package");
            $record['course'] = "package";
            $this->load->view('dashboard/ajax_package', $record);
        }
    }
    public function quick_get_department_data() {
        $branch_id = $this->input->post('branch_id');
        $record['list_department'] = $this->cm->get_source_record('department', 'branch_id', $branch_id);
        $this->load->view('dashboard/ajax_department_page_quick', $record);
    }
    function get_course_package_single_quick() {
        $course = $this->input->post('course');
        if ($course == 'single') {
            $record['list_course'] = $this->cm->view_all("course");
            $record['course'] = "course";
            $this->load->view('dashboard/ajax_course_quick', $record);
        } else {
            $record['list_course'] = $this->cm->view_all("package");
            $record['course'] = "package";
            $this->load->view('dashboard/ajax_package_quick', $record);
        }
    }
    public function lead_list_add() {
        $data = $this->input->post();
        if (isset($data['campaign_name'])) {
            $campaign_name = $data['campaign_name'];
        } else {
            $campaign_name = "Web Quick Add Lead";
        }
        $channel_id = !empty($data['channel_id']) ? $data['channel_id'] : "Telephonic Quick Add";
        $source_remark = isset($data['source_remark']) ? $data['source_remark'] : "";
        $priority = !empty($data['priority']) ? $data['priority'] : "hot";
        $reference_name = !empty($data['reference_name']) ? $data['reference_name'] : "Hitesh Desai";
        $reference_mobile_no = isset($data['reference_mobile_no']) ? $data['reference_mobile_no'] : "";
        if (isset($data['referred_to'])) {
            $referred_to = @$data['referred_to'];
        } else {
            $referred_to = "Hitesh Desai";
        }
        if (!empty($data['followup_mode'])) {
            $followup_mode = @$data['followup_mode'];
        } else {
            $followup_mode = "Not Known";
        }
        $next_followup_date = isset($data['next_followup_date']) ? $data['next_followup_date'] : "";
        $next_followup_time = isset($data['next_followup_time']) ? $data['next_followup_time'] : "";
        $date = $next_followup_date . " " . $next_followup_time;
        $next_action_date = date('m/d/Y h:i A', strtotime($date));
        $next_followup_date = date('m/d/Y h:i A', strtotime($date));
        date_default_timezone_set("Asia/Calcutta");
        $lead_modification_date = date('m/d/Y h:i A');
        $followup_remark = isset($data['followup_remark']) ? $data['followup_remark'] : "";
        $state = isset($data['state']) ? $data['state'] : "";
        $city = isset($data['city']) ? $data['city'] : "";
        if (!empty($data['area'])) {
            $area = $data['area'];
        } else {
            $area = "Not Known";
        }
        $course_package = isset($data['course_package']) ? $data['course_package'] : "";
        $course_or_package1 = !empty($data['course_or_package1']) ? $data['course_or_package1'] : "";
        $course_or_package2 = !empty($data['course_or_package2']) ? $data['course_or_package2'] : "";
        if (!empty($course_or_package1)) {
            $course_or_package = $course_or_package1;
        } else {
            $course_or_package = $course_or_package2;
        }
        $dob = isset($data['dob']) ? $data['dob'] : "";
        $alternate_mobile_no = isset($data['alternate_mobile_no']) ? $data['alternate_mobile_no'] : "";
        $father_name = isset($data['father_name']) ? $data['father_name'] : "";
        $father_mobile_no = isset($data['father_mobile_no']) ? $data['father_mobile_no'] : "";
        $tenth_board = isset($data['tenth_board']) ? $data['tenth_board'] : "";
        $tenth_perc = isset($data['tenth_perc']) ? $data['tenth_perc'] : "";
        $tweth_board = isset($data['tweth_board']) ? $data['tweth_board'] : "";
        $tweth_perc = isset($data['tweth_perc']) ? $data['tweth_perc'] : "";
        $degree = isset($data['degree']) ? $data['degree'] : "";
        $degree_perc = isset($data['degree_perc']) ? $data['degree_perc'] : "";
        if (@$data['submit'] == 'Add LEAD') {
            $lead_list_id = '';
        } else {
            $lead_list_id = $data['lead_list_id'];
        }
        $record = array('name' => $data['name'], 'surname' => @$data['surname'], 'gender' => @$data['gender'], 'email' => @$data['email'], 'mobile_no' => @$data['mobile_no'], 'campaign_name' => $campaign_name, 'channel_id' => @$channel_id, 'source_id' => @$data['source_id'], 'source_remark' => $source_remark, 'priority' => $priority, 'reference_name' => $reference_name, 'reference_mobile_no' => $reference_mobile_no, 'referred_to' => $referred_to, 'status' => @$data['status'], 'sub_status' => @$data['sub_status'], 'existing_follow_up_mode' => @$data['existing_follow_up'], 'followup_mode' => @$followup_mode, 'followup_remark' => $followup_remark, 'state' => $state, 'city' => $city, 'area' => $area, 'branch_id' => @$data['branch_id'], 'department' => @$data['department'], 'course_package' => $course_package, 'course_or_package' => $course_or_package, 'any_remarks' => $data['any_remarks'], 'dob' => $dob, 'alternate_mobile_no' => $alternate_mobile_no, 'father_name' => $father_name, 'father_mobile_no' => $father_mobile_no, 'tenth_board' => $tenth_board, 'tenth_perc' => $tenth_perc, 'tweth_board' => $tweth_board, 'tweth_perc' => $tweth_perc, 'degree' => $degree, 'degree_perc' => $degree_perc, 'lead_modification_date' => $lead_modification_date);
        if (!empty($lead_list_id)) {
            $old_record['re'] = $this->cm->get_old_lead_record('lead_list', 'lead_list_id', $lead_list_id);
            if ($old_record['re']->name == $data['name']) {
                $up_name = $data['name'] . "&#nochange";
            } else {
                $up_name = $data['name'] . "&#change";
            }
            if ($old_record['re']->surname == $data['surname']) {
                $up_surname = $data['surname'] . "&#nochange";
            } else {
                $up_surname = $data['surname'] . "&#change";
            }
            if ($old_record['re']->gender == $data['gender']) {
                $up_gender = $data['gender'] . "&#nochange";
            } else {
                $up_gender = $data['gender'] . "&#change";
            }
            if ($old_record['re']->email == $data['email']) {
                $up_email = $data['email'] . "&#nochange";
            } else {
                $up_email = $data['email'] . "&#change";
            }
            if ($old_record['re']->mobile_no == $data['mobile_no']) {
                $up_mobile_no = $data['mobile_no'] . "&#nochange";
            } else {
                $up_mobile_no = $data['mobile_no'] . "&#change";
            }
            if ($old_record['re']->campaign_name == $data['campaign_name']) {
                $up_campaign_name = $data['campaign_name'] . "&#nochange";
            } else {
                $up_campaign_name = $data['campaign_name'] . "&#change";
            }
            if ($old_record['re']->channel_id == @$data['channel_id']) {
                $up_channel_id = @$data['channel_id'] . "&#nochange";
            } else {
                $up_channel_id = @$data['channel_id'] . "&#change";
            }
            if ($old_record['re']->source_id == $data['source_id']) {
                $up_source_id = $data['source_id'] . "&#nochange";
            } else {
                $up_source_id = $data['source_id'] . "&#change";
            }
            if ($old_record['re']->source_remark == $data['source_remark']) {
                $up_source_remark = $data['source_remark'] . "&#nochange";
            } else {
                $up_source_remark = $data['source_remark'] . "&#change";
            }
            if ($old_record['re']->priority == @$data['priority']) {
                $up_priority = @$data['priority'] . "&#nochange";
            } else {
                $up_priority = @$data['priority'] . "&#change";
            }
            if ($old_record['re']->reference_name == $data['reference_name']) {
                $up_reference_name = $data['reference_name'] . "&#nochange";
            } else {
                $up_reference_name = $data['reference_name'] . "&#change";
            }
            if ($old_record['re']->reference_mobile_no == $data['reference_mobile_no']) {
                $up_reference_mobile_no = $data['reference_mobile_no'] . "&#nochange";
            } else {
                $up_reference_mobile_no = $data['reference_mobile_no'] . "&#change";
            }
            if ($old_record['re']->referred_to == $data['referred_to']) {
                $up_referred_to = $data['referred_to'] . "&#nochange";
            } else {
                $up_referred_to = $data['referred_to'] . "&#change";
            }
            if ($old_record['re']->status == @$data['status']) {
                $up_status = @$data['status'] . "&#nochange";
            } else {
                $up_status = @$data['status'] . "&#change";
            }
            if (@$old_record['re']->sub_status == @$data['sub_status']) {
                @$up_sub_status = @$data['sub_status'] . "&#nochange";
            } else {
                @$up_sub_status = @$data['sub_status'] . "&#change";
            }
            if ($old_record['re']->followup_mode == @$data['followup_mode']) {
                $up_followup_mode = @$data['followup_mode'] . "&#nochange";
            } else {
                $up_followup_mode = @$data['followup_mode'] . "&#change";
            }
            if ($old_record['re']->next_followup_date == $next_followup_date) {
                $up_next_followup_date = $next_followup_date . "&#nochange";
            } else {
                $up_next_followup_date = $next_followup_date . "&#change";
            }
            if ($old_record['re']->followup_remark == $data['followup_remark']) {
                $up_followup_remark = $data['followup_remark'] . "&#nochange";
            } else {
                $up_followup_remark = $data['followup_remark'] . "&#change";
            }
            if ($old_record['re']->state == $data['state']) {
                $up_state = $data['state'] . "&#nochange";
            } else {
                $up_state = $data['state'] . "&#change";
            }
            if ($old_record['re']->city == $data['city']) {
                $up_city = $data['city'] . "&#nochange";
            } else {
                $up_city = $data['city'] . "&#change";
            }
            if ($old_record['re']->area == $data['area']) {
                $up_area = $data['area'] . "&#nochange";
            } else {
                $up_area = $data['area'] . "&#change";
            }
            if ($old_record['re']->branch_id == @$data['branch_id']) {
                $up_branch_id = @$data['branch_id'] . "&#nochange";
            } else {
                $up_branch_id = @$data['branch_id'] . "&#change";
            }
            if ($old_record['re']->department == @$data['department']) {
                $up_department = @$data['department'] . "&#nochange";
            } else {
                $up_department = @$data['department'] . "&#change";
            }
            if ($old_record['re']->course_package == $data['course_package']) {
                $up_course_package = $data['course_package'] . "&#nochange";
            } else {
                $up_course_package = $data['course_package'] . "&#change";
            }
            if ($old_record['re']->course_or_package == $course_or_package) {
                $up_course_or_package = $course_or_package . "&#nochange";
            } else {
                $up_course_or_package = $course_or_package . "&#change";
            }
            if ($old_record['re']->any_remarks == $data['any_remarks']) {
                $up_any_remarks = $data['any_remarks'] . "&#nochange";
            } else {
                $up_any_remarks = $data['any_remarks'] . "&#change";
            }
            if ($old_record['re']->dob == $data['dob']) {
                $up_dob = $data['dob'] . "&#nochange";
            } else {
                $up_dob = $data['dob'] . "&#change";
            }
            if ($old_record['re']->alternate_mobile_no == $data['alternate_mobile_no']) {
                $up_alternate_mobile_no = $data['alternate_mobile_no'] . "&#nochange";
            } else {
                $up_alternate_mobile_no = $data['alternate_mobile_no'] . "&#change";
            }
            if ($old_record['re']->father_name == $data['father_name']) {
                $up_father_name = $data['father_name'] . "&#nochange";
            } else {
                $up_father_name = $data['father_name'] . "&#change";
            }
            if ($old_record['re']->father_mobile_no == $data['father_mobile_no']) {
                $up_father_mobile_no = $data['father_mobile_no'] . "&#nochange";
            } else {
                $up_father_mobile_no = $data['father_mobile_no'] . "&#change";
            }
            if ($old_record['re']->tenth_board == $data['tenth_board']) {
                $up_tenth_board = $data['tenth_board'] . "&#nochange";
            } else {
                $up_tenth_board = $data['tenth_board'] . "&#change";
            }
            if ($old_record['re']->tenth_perc == $data['tenth_perc']) {
                $up_tenth_perc = $data['tenth_perc'] . "&#nochange";
            } else {
                $up_tenth_perc = $data['tenth_perc'] . "&#change";
            }
            if ($old_record['re']->tweth_board == $data['tweth_board']) {
                $up_tweth_board = $data['tweth_board'] . "&#nochange";
            } else {
                $up_tweth_board = $data['tweth_board'] . "&#change";
            }
            if ($old_record['re']->existing_follow_up_mode == $data['existing_follow_up']) {
                $existing_follow_up = $data['existing_follow_up'] . "&#nochange";
            } else {
                $existing_follow_up = $data['existing_follow_up'] . "&#change";
            }
            if ($old_record['re']->tweth_perc == $data['tweth_perc']) {
                $up_tweth_perc = $data['tweth_perc'] . "&#nochange";
            } else {
                $up_tweth_perc = $data['tweth_perc'] . "&#change";
            }
            if ($old_record['re']->degree == $data['degree']) {
                $up_degree = $data['degree'] . "&#nochange";
            } else {
                $up_degree = $data['degree'] . "&#change";
            }
            if ($old_record['re']->degree_perc == $data['degree_perc']) {
                $up_degree_perc = $data['degree_perc'] . "&#nochange";
            } else {
                $up_degree_perc = $data['degree_perc'] . "&#change";
            }
            if ($old_record['re']->lead_modification_date == $lead_modification_date) {
                $up_lead_modification_date = $lead_modification_date . "&#nochange";
            } else {
                $up_lead_modification_date = $lead_modification_date . "&#change";
            }
            $up_lead_creation_date = $old_record['re']->lead_modification_date . "&#nochange";
            // $record['next_followup_date'] = $next_followup_date;
            $record['next_action_date_update'] = $next_action_date;
            $record['followup_status_red'] = '';
            $re = $this->cm->update_lead_record('lead_list', $record, 'lead_list_id', $lead_list_id);
            $fetch_record = $this->cm->get_old_lead_record('lead_list', 'lead_list_id', $lead_list_id);
            $record['lead_list_dupli_id'] = $lead_list_id;
            $record['next_action_date'] = $fetch_record->next_action_date;
            $record['next_followup_date'] = $fetch_record->next_action_date;
            $record['followup_status_green'] = "green";
            $record['followup_status_red'] = '';
            $this->cm->quick_lead_data('lead_list', $record);
            if ($re) {
                $userdata = $this->session->userdata('Admin');
                // print_r($data['id']);
                $fo_data['user_role'] = $userdata['name'];
                $fo_data['user_id'] = $userdata['id'];
                $fo_data['type'] = "Followup";
                $fo_data['comment'] = $followup_remark;
                $fo_data['recepient_id'] = $lead_list_id;
                $fo_data['subject'] = $data['existing_follow_up'];
                date_default_timezone_set("Asia/Calcutta");
                $fo_data['timing_sender'] = date('m/d/Y h:i A');
                $fo_data['status'] = "success";
                $this->cm->quick_lead_data('lead_followup_history', $fo_data);
                // $history_record['next_followup_date'] = $up_next_followup_date;
                $history_record = array('leadListId' => $lead_list_id, 'name' => $up_name, 'surname' => $up_surname, 'gender' => $up_gender, 'email' => $up_email, 'mobile_no' => $up_mobile_no, 'campaign_name' => $up_campaign_name, 'channel_id' => $up_channel_id, 'source_id' => $up_source_id, 'source_remark' => $up_source_remark, 'priority' => $up_priority, 'reference_name' => $up_reference_name, 'reference_mobile_no' => $up_reference_mobile_no, 'referred_to' => $up_referred_to, 'status' => $up_status, 'sub_status' => @$up_sub_status, 'followup_mode' => $up_followup_mode, 'existing_follow_up_mode' => @$data['existing_follow_up'], 'followup_remark' => $up_followup_remark, 'state' => $up_state, 'city' => $up_city, 'area' => $up_area, 'branch_id' => $up_branch_id, 'department' => $up_department, 'course_package' => $up_course_package, 'course_or_package' => $up_course_or_package, 'any_remarks' => $up_any_remarks, 'dob' => $up_dob, 'alternate_mobile_no' => $up_alternate_mobile_no, 'father_name' => $up_father_name, 'father_mobile_no' => $up_father_mobile_no, 'tenth_board' => $tenth_board . "&#nochange", 'tenth_perc' => $tenth_perc . "&#nochange", 'tweth_board' => $tweth_board . "&#nochange", 'tweth_perc' => $tweth_perc . "&#nochange", 'degree' => $degree . "&#nochange", 'degree_perc' => $degree_perc . "&#nochange", 'lead_modification_date' => $up_lead_modification_date, 'lead_creation_date' => $up_lead_creation_date, 'next_followup_date' => $up_next_followup_date);
                $this->cm->quick_lead_data('lead_list_history', $history_record);
            }
            $st = 1;
            echo $st;
        } else {
            $check_ep = $this->cm->check_record_alerady('lead_list', $record);
            if ($check_ep == 0) {
                $record['lead_creation_date'] = $lead_modification_date;
                $re = $this->cm->quick_lead_data('lead_list', $record);
                if ($re) {
                    $history_record['next_followup_date'] = "&#nochange";
                    $history_record = array('leadListId' => $re, 'name' => $data['name'] . "&#nochange", 'surname' => $data['surname'] . "&#nochange", 'gender' => $data['gender'] . "&#nochange", 'email' => $data['email'] . "&#nochange", 'mobile_no' => $data['mobile_no'] . "&#nochange", 'campaign_name' => $campaign_name . "&#nochange", 'channel_id' => $channel_id . "&#nochange", 'source_id' => $data['source_id'] . "&#nochange", 'source_remark' => $source_remark . "&#nochange", 'priority' => $priority . "&#nochange", 'reference_name' => $reference_name . "&#nochange", 'reference_mobile_no' => $reference_mobile_no . "&#nochange", 'referred_to' => $referred_to . "&#nochange", 'status' => $data['status'] . "&#nochange", 'sub_status' => @$data['sub_status'] . "&#nochange", 'followup_mode' => $followup_mode . "&#nochange", 'existing_follow_up_mode' => $data['existing_follow_up'], 'followup_remark' => $followup_remark . "&#nochange", 'state' => $state . "&#nochange", 'city' => $city . "&#nochange", 'area' => $area . "&#nochange", 'branch_id' => $data['branch_id'] . "&#nochange", 'department' => $data['department'] . "&#nochange", 'course_package' => $course_package . "&#nochange", 'course_or_package' => $course_or_package . "&#nochange", 'any_remarks' => $data['any_remarks'] . "&#nochange", 'dob' => $dob . "&#nochange", 'alternate_mobile_no' => $alternate_mobile_no . "&#nochange", 'father_name' => $father_name . "&#nochange", 'father_mobile_no' => $father_mobile_no . "&#nochange", 'tenth_board' => $tenth_board . "&#nochange", 'tenth_perc' => $tenth_perc . "&#nochange", 'tweth_board' => $tweth_board . "&#nochange", 'tweth_perc' => $tweth_perc . "&#nochange", 'degree' => $degree . "&#nochange", 'degree_perc' => $degree_perc . "&#nochange", 'lead_modification_date' => $lead_modification_date . "&#nochange", 'lead_creation_date' => $lead_modification_date . "&#nochange");
                    $this->cm->quick_lead_data('lead_list_history', $history_record);
                }
                $st = 2;
                echo $st;
            } else {
                $st = 0;
                echo $st;
            }
        }
    }
    public function quick_lead_form() {
        $data = $this->input->post();
        date_default_timezone_set("Asia/Calcutta");
        // $date = '05/06/2010 22:15:00';
        $creation_date = date('m/d/Y h:i A');
        // echo  date('M',strtotime($date))." ".date('d',strtotime($date))
        $record = array('name' => $data['quick_name'], 'email' => $data['quick_email'], 'mobile_no' => $data['quick_mobile_no'], 'campaign_name' => "Web Quick Add Lead", 'channel_id' => 'Telephonic Quick Add', 'source_id' => $data['quick_source_id'], 'priority' => "hot", 'branch_id' => $data['quick_branch_id'], 'department' => $data['quick_department_id'], 'course_package' => $data['quick_course_package'], 'course_or_package' => $data['quick_package'], 'any_remarks' => $data['quick_remark'], 'reference_name' => "Hitesh Desai", 'referred_to' => "Hitesh Desai", 'status' => "1 - New", 'sub_status' => "Not Known", 'followup_mode' => "Not Known", "area" => "Not Known", 'lead_creation_date' => $creation_date, 'lead_modification_date' => $creation_date);
        $check_ep = $this->cm->check_record_alerady('lead_list', $record);
        $response['channel_list'] = $this->cm->view_all("channel");
        $response['source_list'] = $this->cm->view_all("lead_source");
        $response['list_status_followup'] = $this->cm->view_all("bulk_lead_followup_type");
        $response['list_substatus_followup'] = $this->cm->view_all("bulk_lead_followup_subtype");
        $response['followupmode'] = $this->cm->view_all("list_follow_up_mode");
        $response['list_state'] = $this->cm->view_all("state");
        $response['list_area'] = $this->cm->view_all("area");
        $response['list_branch'] = $this->cm->view_all("branch");
        $response['list_package'] = $this->cm->view_all("package");
        // $display['list_department'] = $this->cm->view_all("department");
        $response['list_city'] = $this->cm->get_source_record("cities", 'city_state', 'Gujarat');
        if ($check_ep == 0) {
            $re = $this->cm->quick_lead_data('lead_list', $record);
            if ($re) {
                $histroy_record = array('leadListId' => $re, 'name' => $data['quick_name'] . "&#nochange", 'surname' => "&#nochange", 'gender' => "&#nochange", 'email' => $data['quick_email'] . "&#nochange", 'mobile_no' => $data['quick_mobile_no'] . "&#nochange", 'campaign_name' => "Web Quick Add Lead&#nochange", 'channel_id' => "Telephonic Quick Add&#nochange", 'source_id' => $data['quick_source_id'] . "&#nochange", 'source_remark' => "&#nochange", 'priority' => "hot&#nochange", 'reference_name' => "Hitesh Desai&#nochange", 'reference_mobile_no' => "&#nochange", 'referred_to' => "Hitesh Desai&#nochange", 'status' => "1 - New&#nochange", 'sub_status' => "Not Known&#nochange", 'followup_mode' => "Not Known&#nochange", 'existing_follow_up_mode' => @$data['existing_follow_up'] . "&#nochange", 'next_followup_date' => "&#nochange", 'followup_remark' => "&#nochange", 'state' => "&#nochange", 'city' => "&#nochange", 'area' => "Not Known&#nochange", 'branch_id' => $data['quick_branch_id'] . "&#nochange", 'department' => $data['quick_department_id'] . "&#nochange", 'course_package' => $data['quick_course_package'] . "&#nochange", 'course_or_package' => $data['quick_package'] . "&#nochange", 'any_remarks' => $data['quick_remark'] . "&#nochange", 'dob' => "&#nochange", 'alternate_mobile_no' => "&#nochange", 'father_name' => "&#nochange", 'father_mobile_no' => "&#nochange", 'tenth_board' => "&#nochange", 'tenth_perc' => "&#nochange", 'tweth_board' => "&#nochange", 'tweth_perc' => "&#nochange", 'degree' => "&#nochange", 'degree_perc' => "&#nochange", 'lead_modification_date' => $creation_date . "&#nochange", 'next_action_date' => "&#nochange", 'lead_creation_date' => $creation_date . "&#nochange");
                $this->cm->quick_lead_data('lead_list_history', $histroy_record);
                $st = 1;
                echo "$st";
            } else {
                $st = 0;
                echo "$st";
                // echo  "Server Slow Or Something Wrong!!";
                
            }
        } else {
            $st = 2;
            echo "$st";
            // echo  "Email Or Mobile No Already Exits!!";
            
        }
    }
    function get_lead_record() {
        $lead_list_id = $this->input->post('lead_list_id');
        $data['lead_get_record'] = $this->cm->get_lead_record_list('lead_list', 'lead_list_id', $lead_list_id);
        echo json_encode(array('record' => $data));
        // $data['channel_list'] = $this->cm->view_all("channel");
        // $data['source_list'] = $this->cm->view_all("lead_source");
        // $data['list_status_followup'] = $this->cm->view_all("bulk_lead_followup_type");
        // $data['list_substatus_followup'] = $this->cm->view_all("bulk_lead_followup_subtype");
        // $data['followupmode'] = $this->cm->view_all("list_follow_up_mode");
        // $data['list_state'] = $this->cm->view_all("state");
        // $data['list_city'] = $this->cm->get_source_record("cities",'city_state','Gujarat');
        // $data['list_area'] = $this->cm->view_all("area");
        // $data['list_branch'] = $this->cm->view_all("branch");
        // $data['list_department'] = $this->cm->view_all("department");
        // $data['list_package'] = $this->cm->view_all("package");
        // $data['list_course'] = $this->cm->view_all("course");
        // $this->load->view('dashboard/ajax_update_lead_record',$data);
        
    }
    public function get_add_side_bar() {
        $data['channel_list'] = $this->cm->view_all("channel");
        $data['source_list'] = $this->cm->view_all("lead_source");
        $data['list_status_followup'] = $this->cm->view_all("bulk_lead_followup_type");
        $data['list_substatus_followup'] = $this->cm->view_all("bulk_lead_followup_subtype");
        $data['followupmode'] = $this->cm->view_all("list_follow_up_mode");
        $data['list_state'] = $this->cm->view_all("state");
        $data['list_city'] = $this->cm->get_source_record("cities", 'city_state', 'Gujarat');
        $data['list_area'] = $this->cm->view_all("area");
        $data['list_branch'] = $this->cm->view_all("branch");
        $data['list_department'] = $this->cm->view_all("department");
        $data['list_package'] = $this->cm->view_all("package");
        $data['list_course'] = $this->cm->view_all("course");
        $this->load->view('dashboard/add_lead_record_side_bar', $data);
    }
    public function history_get_lead_list() {
        $lead_id = $this->input->post('lead_list_id');
        $data['history'] = $this->cm->get_history_lead('lead_list_history', 'leadListId', $lead_id);
        $data['list_branch'] = $this->cm->view_all("branch");
        $data['list_department'] = $this->cm->view_all("department");
        $data['list_package'] = $this->cm->view_all("package");
        $data['list_course'] = $this->cm->view_all("course");
        $this->load->view('dashboard/ajax_lead_list_history', $data);
    }
    public function template_show($id = '') {
        if (isset($id)) {
            $record['template'] = $this->cm->get_template_html('email_template_category', 'id', $id);
            // echo "<pre>";
            // print_r($record);
            // exit;
            $this->load->view('dashboard/show_template', $record);
        } else {
            redirect('LeadlistController/email_template_category');
        }
    }
    public function get_email_template_record() {
        if (!empty($this->input->post('template_id'))) {
            $id = $this->input->post('template_id');
            $data['record'] = $this->cm->get_template_rec('email_template_category', 'id', $id);
            echo json_encode(array('reco' => $data));
        }
    }
    public function send_email() {
        $data = $this->input->post();
        // echo "<pre>";
        // $type = "email";
        $config = array('protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
        'smtp_host' => 'smtp.gmail.com', 'smtp_port' => 465, 'smtp_user' => "piyush0101nakarani@gmail.com", 'smtp_pass' => "0101Piyush!@#0101", 'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
        'mailtype' => 'html', //plaintext 'text' mails or 'html'
        'smtp_timeout' => '4', //in seconds
        'charset' => 'UTF-8', 'wordwrap' => TRUE);
        // echo $email;
        // die;
        // $this->load->config('email');
        $this->load->library('email');
        $this->email->initialize($config);
        $from = "piyush0101nakarani@gmail.com";
        $to = $data['email'];
        $subject = $data['subject'];
        $message = $data['message'];
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        // $this->email->from($from_data,$_SESSION['user_name']);
        $this->email->from($from, 'piyush');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send()) {
            $userdata = $this->session->userdata('Admin');
            // print_r($data['id']);
            $data['user_role'] = $userdata['name'];
            $data['user_id'] = $userdata['id'];
            $data['type'] = "email";
            $data['comment'] = $data['message'];
            unset($data['message']);
            unset($data['email']);
            date_default_timezone_set("Asia/Calcutta");
            $data['timing_sender'] = date('m/d/Y h:i A');
            $data['status'] = "success";
            $this->cm->quick_lead_data('lead_followup_history', $data);
            $this->cm->quick_lead_data('lead_followup_history_response', $data);
            echo "sent";
        } else {
            echo $this->email->print_debugger();
        }
    }
    public function get_lead_followup_record() {
        $lead_list_id = $this->input->post('lead_id');
        $user_role_name = $this->input->post('user_role_name');
        $data['lead_followup_res'] = $this->cm->get_lead_response('lead_followup_history', 'recepient_id', $lead_list_id, $user_role_name);
        $this->load->view('dashboard/ajax_followup_response', $data);
    }
    public function get_sms_template_record() {
        $sms_id = $this->input->post('sms_template_id');
        $data['records'] = $this->cm->get_sms_template_record('sms_template', 'category', $sms_id);
        echo json_encode(array('reco' => $data));
    }
    public function get_lead_list_sms_record() {
        $id = $this->input->post('lead_list_id');
        $data['lead_get_record'] = $this->cm->get_lead_record_list('lead_list', 'lead_list_id', $id);
        echo json_encode(array('record' => $data));
    }
    public function send_sms_record() {
        $data = $this->input->post();
        // echo "<pre>";
        // print_r($data);
        // $msg = strlen(substr($data['sms_textarea'],0,168));
        $record = $this->sendSMS($data['primary_sms'], $data['sms_textarea']);
        // exit;
        if ($record) {
            $userdata = $this->session->userdata('Admin');
            // print_r($data['id']);
            $r_record['user_id'] = $userdata['id'];
            $r_record['user_role'] = $userdata['name'];
            $r_record['type'] = "SMS";
            $r_record['comment'] = $data['sms_textarea'];
            $r_record['recepient_id'] = $data['sms_recepient_id'];
            // $r_record['status'] = "success";
            $r_record['subject'] = $data['sms_template'];
            unset($data['sms_textarea']);
            unset($data['email']);
            date_default_timezone_set("Asia/Calcutta");
            $r_record['timing_sender'] = date('m/d/Y h:i A');
            $r_record['status'] = "success";
            $this->cm->quick_lead_data('lead_followup_history', $r_record);
            $this->cm->quick_lead_data('lead_followup_history_response', $r_record);
            echo "sent";
        }
    }
    public function sendSMS($mo, $msg) {
        $mobile = "91" . $mo;
        $msg = urlencode($msg);
        // echo $msg;
        $url = "http://dndsms.vishawebsolutions.com/api/mt/SendSMS?user=Hitesh-RNW&password=Hitz9898&senderid=RNWEDU&channel=Trans&DCS=8&flashsms=0&number=$mobile&text=$msg&route=15";
        /* init the resource */
        $ch = curl_init();
        curl_setopt_array($ch, array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true, CURLOPT_ENCODING => "", CURLOPT_SSL_VERIFYHOST => 0, CURLOPT_SSL_VERIFYPEER => 0));
        /* get response */
        $output = curl_exec($ch);
        /* Print error if any */
        if (curl_errno($ch)) {
            echo 'error:' . curl_error($ch);
        }
        curl_close($ch);
        return 1;
    }
    function get_template_modal() {
        $template_id = $this->input->post('template_id');
        $data['all_template_record'] = $this->cm->get_template_record('lead_followup_history', 'l_f_h_id', $template_id);
        $this->load->view('dashboard/show_modal_followup', $data);
        // echo json_encode(array('record'=>$data));
        
    }
}
?>