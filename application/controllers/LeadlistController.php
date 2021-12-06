<?php
class LeadlistController extends CI_Controller {
    function __construct() {
        @parent::__construct();
        $this->load->model("Dbcommon", "cm");
        $this->load->model("AdminSettingsModel", "admin");
        $this->load->model("Quickadmissionprocess", "admi");
        $this->load->library('email');
        $this->load->helper('download');
        $this->load->library('csvimport');
        $this->load->library('excel');
        $this->perPage = 2;
        //---------Campaign task completed status consept---------//
        date_default_timezone_set("Asia/Calcutta");
        $today = date('m/d/Y');
        $this->db->where('end_date', $today);
        $this->db->from('campaign');
        $data = $this->db->get();
        $camdata = $data->result();
        for ($i = 0;$i < sizeof($camdata);$i++) {
            $campaign_id = @$camdata[$i]->campaign_id;
            $status = "Completed";
            $record = array('status' => $status);
            $this->cm->update_campaign_status_record('campaign', $record, 'campaign_id', $campaign_id);
        }
    }
    public function index() {
        $status_all = $this->cm->view_all('bulk_lead_followup_type');
        $lead_list_all_record = $this->cm->view_all_lead_record('lead_list');
        $allLeadRecord = $this->cm->view_all_records('lead_list');
        $status_wise = array();
        $status_wise['0 - All'] = $allLeadRecord;
        foreach($status_all as $sa) {
            $count = 0;
            foreach ($lead_list_all_record as $ls) {

                if ($ls->status == $sa->followup_type_name) {
                    $count++;
                }
            }
            $status_wise[$sa->followup_type_name] = $count;
        }
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all_branch("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['upd_faculty'] = $this->cm->view_all("faculty");
        $display['upd_branch'] = $this->cm->view_all_branch("branch");
        $display['upd_see'] = $this->cm->check_update("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all_branch("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['hod_all'] = $this->cm->view_all_hod_demo("hod");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        //$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
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
            // $cl =  $this->input->get('status');
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
        if (@$this->input->post('searching_l')) {
            $search = $this->input->post('searching_l');
            $sear = array('name' => $search, 'email' => $search, 'mobile_no' => $search);
        }
        $conditions['order_by'] = "lead_list_id DESC";
        $conditions['limit'] = $this->perPage;
        if(!empty($re)) {
            $conditions['where'] = array('status' => $re);
        }
        if(!empty($sear)) {
            $conditions['searching'] = $sear;
        }
        $display['lead_list_all'] = $this->cm->getRows($conditions);
        // echo "<pre>";
        // echo "tst";
        // echo $re;
        // print_r($display['lead_list_all']);
        // exit;
        // $data['posts'] = $this->post->getRows($conditions);
        $display['list_department'] = $this->cm->view_all("department");
        $display['college_school_list'] = $this->cm->view_all("list_school");
        $display['list_city'] = $this->cm->get_source_record("cities", 'city_state', 'Gujarat');
        $display['list_course'] = $this->cm->view_all("course");
        $display['lead_followup_history'] = $this->cm->view_all("lead_followup_history");
        $display['lead_followup_history_response'] = $this->cm->view_all("lead_followup_history_response");
        $display['sms_template_list'] = $this->cm->view_all("sms_template");
        // echo "<pre>";
        // print_r($display['demo_data']);
        // die;
        $display['status_wise'] = $status_wise;
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        if (!empty($this->input->post('test'))) {
            $this->load->view('dashboard/ajax_lead_list', $display);
        } else {
            $this->load->view('header_test', $update);
            // $this->load->view('dashboard/header',$update);
            $this->load->view('dashboard/lead_list', $display);
        }
    }
    function loadMoreData() {
        
        $conditions = array();
        $status_all = $this->cm->view_all('bulk_lead_followup_type');
        $lastID = $this->input->post('id');
        $status_f = $this->input->post('status_f');
        if (!empty($status_f)) {
            // $cl =  $this->input->get('status');
            foreach ($status_all as $saa) {
                $st = explode('-', $saa->followup_type_name);
                $st1 = explode(' ', $st[1]);
                $che = $status_f;
                if ($st1[1] == $che) {
                    $display['class_type'] = $st1[1];
                    $re = $saa->followup_type_name;
                }
            }
        } else {
            $display['class_type'] = 'All';
        }
        // Get last post ID
        // Get post rows num
        if (!empty($re)) {
            $con = array('lead_list_id <' => $lastID, 'status' => $re);
        } else {
            $con = array('lead_list_id <' => $lastID);
        }
        $conditions['where'] = $con;
        $conditions['returnType'] = 'count';
        $display['postNum'] = $this->cm->getRows($conditions);
        // Get posts data from the database
        $conditions['returnType'] = '';
        $conditions['order_by'] = "lead_list_id DESC";
        $conditions['limit'] = $this->perPage;
        // $data['posts'] = $this->post->getRows($conditions);
        $display['lead_list_all'] = $this->cm->getRows($conditions);
        $display['postLimit'] = $this->perPage;
        // Pass data to view
        $display['list_department'] = $this->cm->view_all("department");
        $display['list_city'] = $this->cm->get_source_record("cities", 'city_state', 'Gujarat');
        $display['list_course'] = $this->cm->view_all("course");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all_branch("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['hod_all'] = $this->cm->view_all_hod_demo("hod");
        $display['list_state'] = $this->cm->view_all("state");
        $display['list_area'] = $this->cm->view_all("area");
        $display['list_branch'] = $this->cm->view_all_branch("branch");
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
        $this->load->view('crm/load-more-data', $display);
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
        if(!empty($this->input->post('submit'))){
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
        $update['upd_branch'] = $this->cm->view_all_branch("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['upd_faculty'] = $this->cm->view_all("faculty");
        $display['upd_branch'] = $this->cm->view_all_branch("branch");
        $display['upd_see'] = $this->cm->check_update("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all_branch("branch");
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
    // 	$update['upd_branch'] = $this->cm->view_all_branch("branch");
    // 	$update['upd_see'] = $this->cm->check_update("demo");
    // 	$display['upd_faculty'] = $this->cm->view_all("faculty");
    // 	$display['upd_branch'] = $this->cm->view_all_branch("branch");
    // 	$display['upd_see'] = $this->cm->check_update("demo");
    // 	$display['department_all'] = $this->cm->view_all("department");
    // 	$display['branch_all'] = $this->cm->view_all_branch("branch");
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
        $update['upd_branch'] = $this->cm->view_all_branch("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['upd_faculty'] = $this->cm->view_all("faculty");
        $display['upd_branch'] = $this->cm->view_all_branch("branch");
        $display['upd_see'] = $this->cm->check_update("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all_branch("branch");
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
        $update['upd_branch'] = $this->cm->view_all_branch("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['upd_faculty'] = $this->cm->view_all("faculty");
        $display['upd_branch'] = $this->cm->view_all_branch("branch");
        $display['upd_see'] = $this->cm->check_update("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all_branch("branch");
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
        $update['upd_branch'] = $this->cm->view_all_branch("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['upd_faculty'] = $this->cm->view_all("faculty");
        $display['upd_branch'] = $this->cm->view_all_branch("branch");
        $display['upd_see'] = $this->cm->check_update("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all_branch("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['hod_all'] = $this->cm->view_all_hod_demo("hod");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        //$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['reason_list'] = $this->cm->view_all("cancel_reason_list");
        $display['response_list'] = $this->cm->view_all("list_student_response");
        $display['source_list'] = $this->cm->view_all("lead_source");
        $display['channel_list'] = $this->cm->view_all("channel");
        // echo "<pre>";
        // print_r($display['source_list']);
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
        $update['upd_branch'] = $this->cm->view_all_branch("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['upd_faculty'] = $this->cm->view_all("faculty");
        $display['upd_branch'] = $this->cm->view_all_branch("branch");
        $display['upd_see'] = $this->cm->check_update("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all_branch("branch");
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
        $update['upd_branch'] = $this->cm->view_all_branch("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['upd_faculty'] = $this->cm->view_all("faculty");
        $display['upd_branch'] = $this->cm->view_all_branch("branch");
        $display['upd_see'] = $this->cm->check_update("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all_branch("branch");
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
        $update['upd_branch'] = $this->cm->view_all_branch("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['upd_faculty'] = $this->cm->view_all("faculty");
        $display['upd_branch'] = $this->cm->view_all_branch("branch");
        $display['upd_see'] = $this->cm->check_update("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all_branch("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['hod_all'] = $this->cm->view_all_hod_demo("hod");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        //$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['reason_list'] = $this->cm->view_all("cancel_reason_list");
        $display['response_list'] = $this->cm->view_all("list_student_response");
        $display['substatus_list'] = $this->cm->view_all("bulk_lead_followup_subtype");
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
        $update['upd_branch'] = $this->cm->view_all_branch("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['upd_faculty'] = $this->cm->view_all("faculty");
        $display['upd_branch'] = $this->cm->view_all_branch("branch");
        $display['upd_see'] = $this->cm->check_update("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all_branch("branch");
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
    public function upload_get_department_data() {
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
            $record['list_course'] = $this->cm->view_all("rnw_course");
            $record['course'] = "course";
            $this->load->view('dashboard/ajax_course_quick', $record);
        } else {
            $record['list_course'] = $this->cm->view_all("rnw_package");
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
        $school_college_id = isset($data['school_college_id']) ? $data['school_college_id'] : "";
        if (isset($data['referred_to'])) {
            $referred_to = $data['referred_to'];
        } else {
            $referred_to = $_SESSION['Admin']['username'];
        }
        if (!empty($data['followup_mode'])) {
            $followup_mode = $data['followup_mode'];
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
        $address = isset($data['address']) ? $data['address'] : "";
        if (!empty($data['area'])) {
            $area = $data['area'];
        } else {
            $area = "Not Known";
        }
        if(!empty($next_action_date)){
            $action_date = $next_action_date;
        } else {
            $action_date = "";
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
        $record = array('name' => @$data['name'], 'surname' => @$data['surname'], 'gender' => $data['gender'], 'email' => $data['email'], 'mobile_no' => $data['mobile_no'], 'campaign_name' => $campaign_name, 'channel_id' => $channel_id, 'source_id' => $data['source_id'], 'source_remark' => $source_remark, 'priority' => $priority, 'reference_name' => $reference_name, 'reference_mobile_no' => $reference_mobile_no, 'referred_to' => $referred_to, 'status' => $data['status'], 'sub_status' => $data['sub_status'], 'existing_follow_up_mode' => @$data['existing_follow_up'], 'followup_mode' => $followup_mode, 'followup_remark' => @$followup_remark, 'state' => @$state, 'city' => @$city, 'area' => @$area, 'address' => @$address, 'branch_id' => @$data['branch_id'], 'department' => $data['department'], 'course_package' => $course_package, 'course_or_package' => $course_or_package, 'any_remarks' => $data['any_remarks'], 'dob' => $dob, 'alternate_mobile_no' => $alternate_mobile_no, 'father_name' => $father_name, 'father_mobile_no' => @$father_mobile_no, 'tenth_board' => $tenth_board, 'tenth_perc' => $tenth_perc, 'tweth_board' => @$tweth_board, 'tweth_perc' => $tweth_perc, 'degree' => $degree, 'degree_perc' => $degree_perc, 'lead_modification_date' => $lead_modification_date, 'next_followup_date'  => $action_date,'school_college_id' => $school_college_id);
        if (!empty($lead_list_id)) {
            $old_record['re'] = $this->cm->get_old_lead_record('lead_list', 'lead_list_id', $lead_list_id);
            if (@$old_record['re']->name == @$data['name']) {
                $up_name = $data['name'] . "&#nochange";
            } else {
                $up_name = $data['name'] . "&#change";
            }
            if (@$old_record['re']->surname == @$data['surname']) {
                $up_surname = $data['surname'] . "&#nochange";
            } else {
                $up_surname = $data['surname'] . "&#change";
            }
            if (@$old_record['re']->gender == @$data['gender']) {
                $up_gender = $data['gender'] . "&#nochange";
            } else {
                $up_gender = $data['gender'] . "&#change";
            }
            if (@$old_record['re']->email == @$data['email']) {
                $up_email = $data['email'] . "&#nochange";
            } else {
                $up_email = $data['email'] . "&#change";
            }
            if (@$old_record['re']->mobile_no == @$data['mobile_no']) {
                $up_mobile_no = $data['mobile_no'] . "&#nochange";
            } else {
                $up_mobile_no = $data['mobile_no'] . "&#change";
            }
            if (@$old_record['re']->campaign_name == @$data['campaign_name']) {
                $up_campaign_name = $data['campaign_name'] . "&#nochange";
            } else {
                $up_campaign_name = $data['campaign_name'] . "&#change";
            }
            if (@$old_record['re']->channel_id == @$data['channel_id']) {
                $up_channel_id = $data['channel_id'] . "&#nochange";
            } else {
                $up_channel_id = $data['channel_id'] . "&#change";
            }
            if (@$old_record['re']->source_id == @$data['source_id']) {
                $up_source_id = $data['source_id'] . "&#nochange";
            } else {
                $up_source_id = $data['source_id'] . "&#change";
            }
            if (@$old_record['re']->school_college_id == @$data['school_college_id']) {
                @$school_college_id = @$data['school_college_id'] . "&#nochange";
            } else {
                @$school_college_id = @$data['school_college_id'] . "&#change";
            }
            if (@$old_record['re']->source_remark == @$data['source_remark']) {
                $up_source_remark = $data['source_remark'] . "&#nochange";
            } else {
                $up_source_remark = $data['source_remark'] . "&#change";
            }
            if (@$old_record['re']->priority == @$data['priority']) {
                $up_priority = @$data['priority'] . "&#nochange";
            } else {
                $up_priority = @$data['priority'] . "&#change";
            }
            if (@$old_record['re']->reference_name == @$data['reference_name']) {
                $up_reference_name = $data['reference_name'] . "&#nochange";
            } else {
                $up_reference_name = $data['reference_name'] . "&#change";
            }
            if (@$old_record['re']->reference_mobile_no == @$data['reference_mobile_no']) {
                $up_reference_mobile_no = $data['reference_mobile_no'] . "&#nochange";
            } else {
                $up_reference_mobile_no = $data['reference_mobile_no'] . "&#change";
            }
            if (@$old_record['re']->referred_to == @$data['referred_to']) {
                $up_referred_to = @$data['referred_to'] . "&#nochange";
            } else {
                $up_referred_to = @$data['referred_to'] . "&#change";
            }
            if (@$old_record['re']->status == @$data['status']) {
                $up_status = $data['status'] . "&#nochange";
            } else {
                $up_status = $data['status'] . "&#change";
            }
            if (@$old_record['re']->sub_status == @$data['sub_status']) {
                $up_sub_status = $data['sub_status'] . "&#nochange";
            } else {
                $up_sub_status = $data['sub_status'] . "&#change";
            }
            if (@$old_record['re']->followup_mode == @$data['followup_mode']) {
                $up_followup_mode = @$data['followup_mode'] . "&#nochange";
            } else {
                $up_followup_mode = @$data['followup_mode'] . "&#change";
            }
            if (@$old_record['re']->next_followup_date == @$next_followup_date) {
                $up_next_followup_date = $next_followup_date . "&#nochange";
            } else {
                $up_next_followup_date = $next_followup_date . "&#change";
            }
            if (@$old_record['re']->followup_remark == @$data['followup_remark']) {
                $up_followup_remark = $data['followup_remark'] . "&#nochange";
            } else {
                $up_followup_remark = $data['followup_remark'] . "&#change";
            }
            if (@$old_record['re']->state == @$data['state']) {
                $up_state = $data['state'] . "&#nochange";
            } else {
                $up_state = $data['state'] . "&#change";
            }
            if (@$old_record['re']->city == @$data['city']) {
                $up_city = $data['city'] . "&#nochange";
            } else {
                $up_city = $data['city'] . "&#change";
            }
            if (@$old_record['re']->area == @$data['area']) {
                $up_area = $data['area'] . "&#nochange";
            } else {
                @$up_area = @$data['area'] . "&#change";
            }
            if (@$old_record['re']->address == @$data['address']) {
                $up_address = $data['address'] . "&#nochange";
            } else {
                @$up_address = @$data['address'] . "&#change";
            }
            if (@$old_record['re']->branch_id == @$data['branch_id']) {
                $up_branch_id = $data['branch_id'] . "&#nochange";
            } else {
                $up_branch_id = @$data['branch_id'] . "&#change";
            }
            if (@$old_record['re']->department == @$data['department']) {
                $up_department = $data['department'] . "&#nochange";
            } else {
                $up_department = $data['department'] . "&#change";
            }
            if (@$old_record['re']->course_package == @$data['course_package']) {
                $up_course_package = $data['course_package'] . "&#nochange";
            } else {
                $up_course_package = $data['course_package'] . "&#change";
            }
            if (@$old_record['re']->course_or_package == @$course_or_package) {
                $up_course_or_package = $course_or_package . "&#nochange";
            } else {
                $up_course_or_package = $course_or_package . "&#change";
            }
            if (@$old_record['re']->any_remarks == @$data['any_remarks']) {
                $up_any_remarks = $data['any_remarks'] . "&#nochange";
            } else {
                $up_any_remarks = $data['any_remarks'] . "&#change";
            }
            if (@$old_record['re']->dob == @$data['dob']) {
                $up_dob = $data['dob'] . "&#nochange";
            } else {
                $up_dob = $data['dob'] . "&#change";
            }
            if (@$old_record['re']->alternate_mobile_no == @$data['alternate_mobile_no']) {
                $up_alternate_mobile_no = $data['alternate_mobile_no'] . "&#nochange";
            } else {
                $up_alternate_mobile_no = $data['alternate_mobile_no'] . "&#change";
            }
            if (@$old_record['re']->father_name == @$data['father_name']) {
                $up_father_name = $data['father_name'] . "&#nochange";
            } else {
                $up_father_name = $data['father_name'] . "&#change";
            }
            if (@$old_record['re']->father_mobile_no == @$data['father_mobile_no']) {
                $up_father_mobile_no = $data['father_mobile_no'] . "&#nochange";
            } else {
                $up_father_mobile_no = $data['father_mobile_no'] . "&#change";
            }
            if (@$old_record['re']->tenth_board == @$data['tenth_board']) {
                $up_tenth_board = $data['tenth_board'] . "&#nochange";
            } else {
                $up_tenth_board = $data['tenth_board'] . "&#change";
            }
            if (@$old_record['re']->tenth_perc == @$data['tenth_perc']) {
                $up_tenth_perc = $data['tenth_perc'] . "&#nochange";
            } else {
                $up_tenth_perc = $data['tenth_perc'] . "&#change";
            }
            if (@$old_record['re']->tweth_board == @$data['tweth_board']) {
                $up_tweth_board = $data['tweth_board'] . "&#nochange";
            } else {
                $up_tweth_board = $data['tweth_board'] . "&#change";
            }
            if (@$old_record['re']->existing_follow_up_mode == @$data['existing_follow_up']) {
                $existing_follow_up = $data['existing_follow_up'] . "&#nochange";
            } else {
                $existing_follow_up = $data['existing_follow_up'] . "&#change";
            }
            if (@$old_record['re']->tweth_perc == @$data['tweth_perc']) {
                $up_tweth_perc = $data['tweth_perc'] . "&#nochange";
            } else {
                $up_tweth_perc = $data['tweth_perc'] . "&#change";
            }
            if (@$old_record['re']->degree == @$data['degree']) {
                $up_degree = $data['degree'] . "&#nochange";
            } else {
                $up_degree = $data['degree'] . "&#change";
            }
            if (@$old_record['re']->degree_perc == @$data['degree_perc']) {
                $up_degree_perc = $data['degree_perc'] . "&#nochange";
            } else {
                $up_degree_perc = $data['degree_perc'] . "&#change";
            }
            if (@$old_record['re']->lead_modification_date == @$lead_modification_date) {
                $up_lead_modification_date = $lead_modification_date . "&#nochange";
            } else {
                $up_lead_modification_date = $lead_modification_date . "&#change";
            }
            $up_lead_creation_date = $old_record['re']->lead_modification_date . "&#nochange";
            $record['next_followup_date'] = $next_followup_date;
            $record['next_action_date'] = $next_action_date;
            $re = $this->cm->update_lead_record('lead_list', $record, 'lead_list_id', $lead_list_id);
            if($re){
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
                $history_record = array('leadListId' => $lead_list_id, 'name' => $up_name, 'surname' => $up_surname, 'gender' => $up_gender, 'email' => $up_email, 'mobile_no' => $up_mobile_no, 'campaign_name' => $up_campaign_name, 'channel_id' => $up_channel_id, 'source_id' => $up_source_id, 'source_remark' => $up_source_remark, 'priority' => $up_priority, 'reference_name' => $up_reference_name, 'reference_mobile_no' => $up_reference_mobile_no, 'referred_to' => $up_referred_to, 'status' => $up_status, 'sub_status' => $up_sub_status, 'followup_mode' => $up_followup_mode, 'existing_follow_up_mode' => @$data['existing_follow_up'], 'followup_remark' => $up_followup_remark, 'state' => $up_state, 'city' => $up_city, 'area' => $up_area, 'address' => $up_address, 'branch_id' => $up_branch_id, 'department' => $up_department, 'course_package' => $up_course_package, 'course_or_package' => $up_course_or_package, 'any_remarks' => $up_any_remarks, 'dob' => $up_dob, 'alternate_mobile_no' => $up_alternate_mobile_no, 'father_name' => $up_father_name, 'father_mobile_no' => $up_father_mobile_no, 'tenth_board' => $tenth_board . "&#nochange", 'tenth_perc' => $tenth_perc . "&#nochange", 'tweth_board' => $tweth_board . "&#nochange", 'tweth_perc' => $tweth_perc . "&#nochange", 'degree' => $degree . "&#nochange", 'degree_perc' => $degree_perc . "&#nochange", 'lead_modification_date' => $up_lead_modification_date, 'lead_creation_date' => $up_lead_creation_date, 'next_followup_date' => $up_next_followup_date);
                $this->cm->quick_lead_data('lead_list_history', $history_record);
            }
            $result =  $re;
            echo  $result = 2;
        } else {
            $check_ep = $this->cm->check_record_alerady('lead_list', $record);
            if ($check_ep == 0) {
                $record['lead_creation_date'] = $lead_modification_date;
                $record['followup_status'] = 'Yellow';
                $re = $this->cm->quick_lead_data('lead_list', $record);
                if ($re) {
                    $history_record['followup_status'] = "Yellow&#nochange";
                    $history_record['next_followup_date'] = "&#nochange";
                    $history_record = array('leadListId' => @$re, 'name' => @$data['name'] . "&#nochange", 'surname' => @$data['surname'] . "&#nochange", 'gender' => @$data['gender'] . "&#nochange", 'email' => $data['email'] . "&#nochange", 'mobile_no' => $data['mobile_no'] . "&#nochange", 'campaign_name' => $campaign_name . "&#nochange", 'channel_id' => $channel_id . "&#nochange", 'source_id' => $data['source_id'] . "&#nochange", 'source_remark' => $source_remark . "&#nochange", 'priority' => $priority . "&#nochange", 'reference_name' => $reference_name . "&#nochange", 'reference_mobile_no' => $reference_mobile_no . "&#nochange", 'referred_to' => $referred_to . "&#nochange", 'status' => $data['status'] . "&#nochange", 'sub_status' => $data['sub_status'] . "&#nochange", 'followup_mode' => $followup_mode . "&#nochange", 'existing_follow_up_mode' => $data['existing_follow_up'], 'followup_remark' => $followup_remark . "&#nochange", 'state' => $state . "&#nochange", 'city' => $city . "&#nochange", 'area' => $area . "&#nochange", 'address' => $address . "&#nochange", 'branch_id' => $data['branch_id'] . "&#nochange", 'department' => $data['department'] . "&#nochange", 'course_package' => $course_package . "&#nochange", 'course_or_package' => $course_or_package . "&#nochange", 'any_remarks' => $data['any_remarks'] . "&#nochange", 'dob' => $dob . "&#nochange", 'alternate_mobile_no' => $alternate_mobile_no . "&#nochange", 'father_name' => $father_name . "&#nochange", 'father_mobile_no' => $father_mobile_no . "&#nochange", 'tenth_board' => $tenth_board . "&#nochange", 'tenth_perc' => $tenth_perc . "&#nochange", 'tweth_board' => $tweth_board . "&#nochange", 'tweth_perc' => $tweth_perc . "&#nochange", 'degree' => $degree . "&#nochange", 'degree_perc' => $degree_perc . "&#nochange", 'lead_modification_date' => $lead_modification_date . "&#nochange", 'lead_creation_date' => $lead_modification_date . "&#nochange", 'school_college_id' => @$school_college_id);
                    $this->cm->quick_lead_data('lead_list_history', $history_record);
                }
                $result =  $re;
                echo  $result = 1;
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
        $response['list_branch'] = $this->cm->view_all_branch("branch");
        $response['list_package'] = $this->cm->view_all("package");
        // $display['list_department'] = $this->cm->view_all("department");
        $response['list_city'] = $this->cm->get_source_record("cities", 'city_state', 'Gujarat');
        if ($check_ep == 0) {
            $record['followup_status'] = 'Yellow';
            $re = $this->cm->quick_lead_data('lead_list', $record);
            if ($re) {
                $history_record['followup_status'] = 'Yellow&#nochange';
                $histroy_record = array('leadListId' => $re, 'name' => $data['quick_name'] . "&#nochange", 'surname' => "&#nochange", 'gender' => "&#nochange", 'email' => $data['quick_email'] . "&#nochange", 'mobile_no' => $data['quick_mobile_no'] . "&#nochange", 'campaign_name' => "Web Quick Add Lead&#nochange", 'channel_id' => "Telephonic Quick Add&#nochange", 'source_id' => $data['quick_source_id'] . "&#nochange", 'source_remark' => "&#nochange", 'priority' => "hot&#nochange", 'reference_name' => "Hitesh Desai&#nochange", 'reference_mobile_no' => "&#nochange", 'referred_to' => "Hitesh Desai&#nochange", 'status' => "1 - New&#nochange", 'sub_status' => "Not Known&#nochange", 'followup_mode' => "Not Known&#nochange", 'existing_follow_up_mode' => @$data['existing_follow_up'] . "&#nochange", 'next_followup_date' => "&#nochange", 'followup_remark' => "&#nochange", 'state' => "&#nochange", 'city' => "&#nochange", 'area' => "Not Known&#nochange", 'branch_id' => $data['quick_branch_id'] . "&#nochange", 'department' => $data['quick_department_id'] . "&#nochange", 'course_package' => $data['quick_course_package'] . "&#nochange", 'course_or_package' => $data['quick_package'] . "&#nochange", 'any_remarks' => $data['quick_remark'] . "&#nochange", 'dob' => "&#nochange", 'alternate_mobile_no' => "&#nochange", 'father_name' => "&#nochange", 'father_mobile_no' => "&#nochange", 'tenth_board' => "&#nochange", 'tenth_perc' => "&#nochange", 'tweth_board' => "&#nochange", 'tweth_perc' => "&#nochange", 'degree' => "&#nochange", 'degree_perc' => "&#nochange", 'lead_modification_date' => $creation_date . "&#nochange", 'next_action_date' => "&#nochange", 'lead_creation_date' => $creation_date . "&#nochange");
                $this->cm->quick_lead_data('lead_list_history', $histroy_record);
                $st = 1;
            } else {
                $st = 0;
            }
        } else {
            $st = 2;
        }

        if($st == 1) {
            $record = array('status' => 1, "msg" => "Successfully Inserted!");
            $recp['all_record'] = $record;
            echo json_encode($recp);
        } else if($st == 2){
            $recp['all_record'] = array('status' => 2, "msg" => "Already Exits!!");
            echo json_encode($recp);
        } else if($st == 0) {
            $recp['all_record'] = array('status' => 0, "msg" => "Something Wrong!!");
            echo json_encode($recp);
        }
    }
    public function get_lead_record() {
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
        // $data['list_branch'] = $this->cm->view_all_branch("branch");
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
        $data['list_branch'] = $this->cm->view_all_branch("branch");
        $data['list_department'] = $this->cm->view_all("department");
        $data['list_package'] = $this->cm->view_all("package");
        $data['list_course'] = $this->cm->view_all("course");
        $this->load->view('dashboard/add_lead_record_side_bar', $data);
    }
    public function history_get_lead_list() {
        $lead_id = $this->input->post('lead_list_id');
        $data['history'] = $this->cm->get_history_lead('lead_list_history', 'leadListId', $lead_id);
        $data['list_branch'] = $this->cm->view_all_branch("branch");
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
        // print_r($data);
        // exit;
        $config = array('protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
        'smtp_host' => 'smtp.gmail.com', 'smtp_port' => 465,
        // 'smtp_user' => 'jalpachudasama1998@gmail.com',
        // 'smtp_pass' => '9879825912',
        'smtp_user' => 'piyush0101nakarani@gmail.com', 'smtp_pass' => '0101Piyush!@#$0101', 'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
        'mailtype' => 'html', //plaintext 'text' mails or 'html'
        'smtp_timeout' => '4', //in seconds
        'charset' => 'UTF-8', 'wordwrap' => TRUE);
        // $this->load->config('email');
        $this->load->library('email');
        $this->email->initialize($config);
        $from = "jalpachudasama1998@gmail.com";
        $to = $data['email'];
        $subject = $data['subject'];
        $message = $data['message'];
        $this->email->set_newline("\r\n");
        $this->email->from($from);
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
    public function get_lead_record_followup() {
        $lead_list_id = $this->input->post('lead_id');
        $user_role_name = $this->input->post('user_role_name');
        $data['lead_followup_res'] = $this->cm->get_lead_response('lead_followup_history', 'recepient_id', $lead_list_id, $user_role_name);
        $this->load->view('crm/ajax_followup_response', $data);
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
            $st = 1;
			if ($st == 1) {
				$record = array('status' => 1, "msg" => "Successfully Sedn Sms!");
				$recp['all_record'] = $record;
				echo json_encode($recp);
			} else {
				$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
				echo json_encode($recp);
			}
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
        if ($output) {
            $recp["all_record"] = array('status' => 1, "msg" => "Send OTP");
            echo json_encode($recp);
        }
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
    public function upload_get_substatus_data() {
        $status_id = $this->input->post('status_id');
        $record['list_substatus_followup'] = $this->cm->get_source_record('bulk_lead_followup_subtype', 'followup_status_id', $status_id);
        $this->load->view('dashboard/ajax_upload_subtype_followup', $record);
    }
    function download_lead_file() {
        // echo $filename =  $this->input->post('file_path');
        $this->load->helper('download');
        $path = base_url('uploadFiles/lead-template-data.csv');
        $data = file_get_contents($path); // Read the file's contents
        $name = 'lead-template_data.csv';
        force_download($name, null);
    }
    public function import_lead_data() {
        // $file_data = $this->csvimport->get_array();
        $file_data = $this->csvimport->get_array($_FILES['csv_data']['tmp_name']);
        $channel_name = !empty($this->input->post('upload_channel')) ? $this->input->post('upload_channel') : '';
        $upload_priority = !empty($this->input->post('upload_priority')) ? $this->input->post('upload_priority') : '';
        $upload_status = !empty($this->input->post('upload_status')) ? $this->input->post('upload_status') : '';
        $upload_sub_status = !empty($this->input->post('upload_sub_status')) ? $this->input->post('upload_sub_status') : '';
        $upload_referred_to = !empty($this->input->post('upload_referred_to')) ? $this->input->post('upload_referred_to') : '';
        $upload_last_school_college = !empty($this->input->post('upload_last_school_college')) ? $this->input->post('upload_last_school_college') : '';
        $upload_branch = !empty($this->input->post('upload_branch')) ? $this->input->post('upload_branch') : '';
        $upload_department = !empty($this->input->post('upload_department')) ? $this->input->post('upload_department') : '';
        $upload_course_package = !empty($this->input->post('upload_course_package')) ? $this->input->post('upload_course_package') : '';
        $course_or_package1_upload = !empty($this->input->post('course_or_package1_upload')) ? $this->input->post('course_or_package1_upload') : '';
        $course_or_package2_upload = !empty($this->input->post('course_or_package2_upload')) ? $this->input->post('course_or_package2_upload') : '';
        if ($upload_course_package == 'single') {
            $course_package_id = $course_or_package2_upload;
        } else {
            $course_package_id = $course_or_package1_upload;
        }
        $upload_state = !empty($this->input->post('upload_state')) ? $this->input->post('upload_state') : '';
        $upload_city = !empty($this->input->post('upload_city')) ? $this->input->post('upload_city') : '';
        date_default_timezone_set("Asia/Calcutta");
        $lead_date = date('m/d/Y h:i A');
        foreach ($file_data as $row) {
            $data[] = array('campaign_name' => isset($row["Lead_compaign_name"]) ? $row["Lead_compaign_name"] : "Manually", 'name' => isset($row["Full Name"]) ? $row["Full Name"] : '', 'mobile_no' => isset($row["Mobile"]) ? $row["Mobile"] : '', 'alternate_mobile_no' => isset($row["Alternate Mobile"]) ? $row["Alternate Mobile"] : '', 'email' => isset($row["Email"]) ? $row["Email"] : '', 'area' => isset($row["Area"]) ? $row["Area"] : '', 'source_id' => isset($row["Source"]) ? $row["Source"] : '', 'any_remarks' => isset($row["comments"]) ? $row["comments"] : '', 'address' => isset($row["Address"]) ? $row["Address"] : '', 'school_college_id' => isset($row["School College name"]) ? $row["School College name"] : $upload_last_school_college, 'channel_id' => $channel_name, 'priority' => $upload_priority, 'status' => isset($row["Status"]) ? $row["Status"] : $upload_status, 'sub_status' => isset($row["Sub-status"]) ? $row["Sub-status"] : $upload_sub_status, 'referred_to' => $upload_referred_to, 'branch_id' => isset($row["branch"]) ? $row['branch'] : $upload_branch, 'department' => isset($row["Departmet"]) ? $row['Departmet'] : $upload_department, 'course_package' => $upload_course_package, 'course_or_package' => isset($row["Course"]) ? $row['Course'] : $course_package_id, 'reference_name' => isset($row['ReferredFrom']) ? $row['ReferredFrom'] : 'Hitesh Desai', 'state' => $upload_state, 'city' => $upload_city, 'lead_creation_date' => isset($row['CreatedOn']) ? $row['CreatedOn'] : $lead_date, 'lead_modification_date' => isset($row['UpdatedOn']) ? $row['UpdatedOn'] : $lead_date);
        }
        // echo "<pre>";
        // print_r($data);
        // exit;
        $query = $this->cm->insert_lead_data($data);
        if ($query) {
            $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
            echo json_encode($recp); // echo "1";
        } else {
            $recp["all_record"] = array('status' => 0, "msg" => "Something Wrong");
            echo json_encode($recp); // echo "2";
        }
    }
    public function campaign() {
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all_branch("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['upd_faculty'] = $this->cm->view_all("faculty");
        $display['upd_branch'] = $this->cm->view_all_branch("branch");
        $display['upd_see'] = $this->cm->check_update("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all_branch("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['hod_all'] = $this->cm->view_all_hod_demo("hod");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        //$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['reason_list'] = $this->cm->view_all("cancel_reason_list");
        $display['response_list'] = $this->cm->view_all("list_student_response");
        $display['channel_list'] = $this->cm->view_all("channel");
        $display['counselor_all'] = $this->cm->all_counselor("user");
        $display['all_campaign'] = $this->cm->view_all("campaign");
        // echo "<pre>";
        // print_r($display['demo_data']);
        // die;
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header_test', $update);
        $this->load->view('dashboard/campaign', $display);
    }
    public function upd_campaign_record() {
        $id = $this->input->post('campaign_id');
        $data['list_campaign'] = $this->cm->get_campaign_record('campaign', 'campaign_id', $id);
        $data['list_department'] = $this->cm->view_all("department");
        $data['branch_all'] = $this->cm->view_all("branch");
        $data['course_all'] = $this->cm->view_all("course");
        $data['list_package'] = $this->cm->view_all("package");
        $data['list_source'] = $this->cm->view_all("source");
        $data['list_followupreco'] = $this->cm->view_all("followupreco_list");
        $data['list_source'] = $this->cm->view_all("source");
        $data['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $data['counselor_all'] = $this->cm->all_counselor("user");
        $this->load->view('dashboard/ajax_campaign_edit_record', $data);
    }
    public function Get_faculty() {
        $id = $this->input->post('branch_id');
        echo $this->cm->Get_faculty($id);
    }
    public function get_branch_wise_conselor() {
        $id = $this->input->post('branch_id');
        echo $this->cm->branch_wise_conselor($id);
    }
    public function campaign_data() {
        $data = $this->input->post();
        if (empty($data['campaign_name'])) {
            $campaign_name = $data['campaign_name'] = "";
        } else {
            $campaign_name = $data['campaign_name'];
        }
        if (empty($data['course_id'])) {
            $course_id = $data['course_id'] = "";
        } else {
            $course_id = $data['course_id'];
        }
        if (empty($data['branch_id'])) {
            $branch_id = $data['branch_id'] = "";
        } else {
            $branch_id = $data['branch_id'];
        }
        if (empty($data['faculty_id'])) {
            $faculty_id = $data['faculty_id'] = "";
        } else {
            $faculty_id = $data['faculty_id'];
        }
        if (empty($data['campaign'])) {
            $campaign = $data['campaign'] = "";
        } else {
            $campaign = implode(",", @$data['campaign']);
        }
        if (empty($data['counselor_id'])) {
            $counselor_id = $data['counselor_id'] = "";
        } else {
            $counselor_id = $data['counselor_id'];
        }
        if (empty($data['no_of_seet_limit'])) {
            $no_of_seet_limit = $data['no_of_seet_limit'] = "";
        } else {
            $no_of_seet_limit = $data['no_of_seet_limit'];
        }
        if (empty($data['start_date'])) {
            $start_date = $data['start_date'] = "";
        } else {
            $start_date = $data['start_date'];
        }
        if (empty($data['end_date'])) {
            $end_date = $data['end_date'] = "";
        } else {
            $end_date = $data['end_date'];
        }
        if (empty($data['remarks'])) {
            $remarks = $data['remarks'] = "";
        } else {
            $remarks = $data['remarks'];
        }
        $status = "On Going";
        $record = array('campaign_name' => $campaign_name, 'course_id' => $course_id, 'branch_id' => $branch_id, 'faculty_id' => $faculty_id, 'campaign' => $campaign, 'counselor_id' => $counselor_id, 'no_of_seet_limit' => $no_of_seet_limit, 'start_date' => $start_date, 'end_date' => $end_date, 'remarks' => $remarks, 'status' => $status);
        $result = $this->cm->save_data('campaign', $record);
        echo json_encode($result);
    }
    public function campaign_record_upd() {
        $data = $this->input->post();
        if (empty($data['campaign_id'])) {
            $campaign_id = $data['campaign_id'] = "";
        } else {
            $campaign_id = $data['campaign_id'];
        }
        if (empty($data['campaign_name'])) {
            $campaign_name = $data['campaign_name'] = "";
        } else {
            $campaign_name = $data['campaign_name'];
        }
        if (empty($data['course_id'])) {
            $course_id = $data['course_id'] = "";
        } else {
            $course_id = $data['course_id'];
        }
        if (empty($data['branch_id'])) {
            $branch_id = $data['branch_id'] = "";
        } else {
            $branch_id = $data['branch_id'];
        }
        if (empty($data['faculty_id'])) {
            $faculty_id = $data['faculty_id'] = "";
        } else {
            $faculty_id = $data['faculty_id'];
        }
        if (empty($data['campaign'])) {
            $campaign = $data['campaign'] = "";
        } else {
            $campaign = implode(",", @$data['campaign']);
        }
        if (empty($data['counselor_id'])) {
            $counselor_id = $data['counselor_id'] = "";
        } else {
            $counselor_id = $data['counselor_id'];
        }
        if (empty($data['no_of_seet_limit'])) {
            $no_of_seet_limit = $data['no_of_seet_limit'] = "";
        } else {
            $no_of_seet_limit = $data['no_of_seet_limit'];
        }
        if (empty($data['start_date'])) {
            $start_date = $data['start_date'] = "";
        } else {
            $start_date = $data['start_date'];
        }
        if (empty($data['end_date'])) {
            $end_date = $data['end_date'] = "";
        } else {
            $end_date = $data['end_date'];
        }
        if (empty($data['remarks'])) {
            $remarks = $data['remarks'] = "";
        } else {
            $remarks = $data['remarks'];
        }
        if (@$data['submit'] == 'Upd Campaign') {
            $campaign_id = '';
        } else {
            $campaign_id = $data['campaign_id'];
        }
        $status = "On Going";
        $record = array('campaign_id' => $campaign_id, 'campaign_name' => $campaign_name, 'course_id' => $course_id, 'branch_id' => $branch_id, 'faculty_id' => $faculty_id, 'campaign' => $campaign, 'counselor_id' => $counselor_id, 'no_of_seet_limit' => $no_of_seet_limit, 'start_date' => $start_date, 'end_date' => $end_date, 'remarks' => $remarks, 'status' => $status);
        if (!empty($campaign_id)) {
            $old_record['re'] = $this->cm->get_old_campaign_record('campaign', 'campaign_id', $campaign_id);
            if (@$old_record['re']->campaign_name == @$data['campaign_name']) {
                $up_campaign_name = $data['campaign_name'] . "&#nochange";
            } else {
                $up_campaign_name = $data['campaign_name'] . "&#change";
            }
            if (@$old_record['re']->course_id == @$data['course_id']) {
                $up_course_id = $data['course_id'] . "&#nochange";
            } else {
                $up_course_id = $data['course_id'] . "&#change";
            }
            if (@$old_record['re']->branch_id == @$data['branch_id']) {
                $up_branch_id = $data['branch_id'] . "&#nochange";
            } else {
                $up_branch_id = $data['branch_id'] . "&#change";
            }
            if (@$old_record['re']->faculty_id == @$data['faculty_id']) {
                $up_faculty_id = $data['faculty_id'] . "&#nochange";
            } else {
                $up_faculty_id = $data['faculty_id'] . "&#change";
            }
            if (empty($data['campaign'])) {
                $campaign = $data['campaign'] = "";
            } else {
                $campaign = implode(",", @$data['campaign']);
            }
            if (@$old_record['re']->campaign == @$campaign) {
                $up_campaign = $campaign . "&#nochange";
            } else {
                $up_campaign = $campaign . "&#change";
            }
            if (@$old_record['re']->counselor_id == @$counselor_id) {
                $up_counselor_id = $counselor_id . "&#nochange";
            } else {
                $up_counselor_id = $counselor_id . "&#change";
            }
            if (@$old_record['re']->no_of_seet_limit == @$no_of_seet_limit) {
                $up_no_of_seet_limit = $no_of_seet_limit . "&#nochange";
            } else {
                $up_no_of_seet_limit = $no_of_seet_limit . "&#change";
            }
            if (@$old_record['re']->start_date == @$start_date) {
                $up_start_date = $start_date . "&#nochange";
            } else {
                $up_start_date = $start_date . "&#change";
            }
            if (@$old_record['re']->end_date == @$end_date) {
                $up_end_date = $end_date . "&#nochange";
            } else {
                $up_end_date = $end_date . "&#change";
            }
            if (@$old_record['re']->remarks == @$remarks) {
                $up_remarks = $remarks . "&#nochange";
            } else {
                $up_remarks = $remarks . "&#change";
            }
            if (@$old_record['re']->status == @$status) {
                $up_status = $status . "&#nochange";
            } else {
                $up_status = $status . "&#change";
            }
            date_default_timezone_set("Asia/Calcutta");
            $campaign_upd_date = date('m/d/Y h:i A');
            $re = $this->cm->update_campaign_record('campaign', $record, 'campaign_id', $campaign_id);
            if ($re) {
                $history_record = array('campaign_id' => $campaign_id, 'campaign_name' => $up_campaign_name, 'course_id' => $up_course_id, 'branch_id' => $up_branch_id, 'faculty_id' => $up_faculty_id, 'campaign' => $up_campaign, 'counselor_id' => $up_counselor_id, 'no_of_seet_limit' => $up_no_of_seet_limit, 'start_date' => $up_start_date, 'end_date' => $up_end_date, 'remarks' => $up_remarks, 'status' => $up_status, 'campaign_upd_date' => @$campaign_upd_date);
                $this->cm->quick_campaign_data('history_campaign', $history_record);
            }
            $st = 1;
            echo $st;
        } else {
            $check_ep = $this->cm->alerady_check_record('campaign', $record);
            if ($check_ep == 0) {
                $re = $this->cm->quick_campaign_data('campaign', $record);
                if ($re) {
                    $history_record = array('campaign_id' => @$re, 'campaign_name' => $campaign_name . "&#nochange", 'course_id' => $course_id . "&#nochange", 'branch_id' => $branch_id . "&#nochange", 'faculty_id' => $faculty_id . "&#nochange", 'campaign' => $campaign . "&#nochange", 'counselor_id' => $counselor_id . "&#nochange", 'no_of_seet_limit' => $no_of_seet_limit . "&#nochange", 'start_date' => $start_date . "&#nochange", 'end_date' => $end_date . "&#nochange", 'remarks' => $remarks . "&#nochange", 'status' => $status . "&#nochange", 'campaign_upd_date' => @$campaign_upd_date);
                    $this->cm->quick_campaign_data('history_campaign', $history_record);
                }
                $st = 2;
                echo $st;
            } else {
                $st = 0;
                echo $st;
            }
        }
    }
    public function ajax_get_campaign_histroy_record() {
        $id = $this->input->post('campaign_id');
        $data['history'] = $this->cm->get_history_campaign_record('history_campaign', 'campaign_id', $id);
        $data['list_department'] = $this->cm->view_all("department");
        $data['branch_all'] = $this->cm->view_all("branch");
        $data['course_all'] = $this->cm->view_all("course");
        $data['list_package'] = $this->cm->view_all("package");
        $data['list_source'] = $this->cm->view_all("source");
        $data['list_followupreco'] = $this->cm->view_all("followupreco_list");
        $data['list_source'] = $this->cm->view_all("source");
        $data['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $data['counselor_all'] = $this->cm->all_counselor("user");
        $this->load->view('dashboard/ajax_history_campaign', $data);
    }
    public function Ajax_followup() {
        $id = $this->input->post('campaign_id');
        $data['list_campaign'] = $this->cm->get_campaign_record('campaign', 'campaign_id', $id);
        $data['list_department'] = $this->cm->view_all("department");
        $data['branch_all'] = $this->cm->view_all("branch");
        $data['course_all'] = $this->cm->view_all("course");
        $data['list_package'] = $this->cm->view_all("package");
        $data['list_source'] = $this->cm->view_all("source");
        $data['list_followupreco'] = $this->cm->view_all("followupreco_list");
        $data['list_source'] = $this->cm->view_all("source");
        $data['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $data['counselor_all'] = $this->cm->all_counselor("user");
        $this->load->view('dashboard/ajax_followup', $data);
    }
    public function GetRecord() {
        $mobile_no = $this->input->post('mobile_no');
        if (!empty($mobile_no)) {
            $data = $this->cm->fetch_crm_data($mobile_no);
            //   $b =  $this->cm->match_branch('branch','branch_id',$data->branch_id);
            //   $d =  $this->cm->match_department('department','department_id',$data->department);
            //   $p =  $this->cm->match_course('package','package_id',$data->course_or_package);
            //   $c =  $this->cm->match_course('course','course_id',$data->course_or_package);
            //   $s =  $this->cm->match_source('lead_source','source_id',$data->source_id);
            //   if(empty($p))
            // {
            // 	$course = $p->package_name="";
            // }
            // else
            // {
            // 	$course = $p->package_name;
            // }
            //    if(empty($c))
            // {
            // 	$course = $c->course_name="";
            // }
            // else
            // {
            // 	$course = $c->course_name;
            // }
            //  if(empty($s))
            // {
            // 	$source = $s->source_name="";
            // }
            // else
            // {
            // 	$source = $s->source_name;
            // }
            // if(empty($b))
            // {
            // 	$branch = $b->branch_name="";
            // }
            // else
            // {
            // 	$branch = $b->branch_name;
            // }
            // if(empty($d))
            // {
            // 	$department = $d->department_name="";
            // }
            // else
            // {
            // 	$department = $d->department_name;
            // }
            //  $re = array('name'=>$data->name,'source_id'=>$source,'course_or_package'=>$course,'branch_id'=>$branch,'department'=>$department);
            echo json_encode(array('record' => $data));
        } else {
            $data = null;
            echo json_encode($data);
        }
    }
    public function campaign_crm_record() {
        $data = $this->input->post();
        if (empty($data['campaign_id'])) {
            $campaign_id = $data['campaign_id'] = "";
        } else {
            $campaign_id = $data['campaign_id'];
        }
        if (empty($data['lead_list_id'])) {
            $lead_list_id = $data['lead_list_id'] = "";
        } else {
            $lead_list_id = $data['lead_list_id'];
        }
        if (empty($data['name'])) {
            $name = $data['name'] = "";
        } else {
            $name = $data['name'];
        }
        if (empty($data['surname'])) {
            $surname = $data['surname'] = "";
        } else {
            $surname = $data['surname'];
        }
        if (empty($data['mobile_no'])) {
            $mobile_no = $data['mobile_no'] = "";
        } else {
            $mobile_no = $data['mobile_no'];
        }
        if (empty($data['email'])) {
            $email = $data['email'] = "";
        } else {
            $email = $data['email'];
        }
        if (empty($data['gender'])) {
            $gender = $data['gender'] = "";
        } else {
            $gender = $data['gender'];
        }
        if (empty($data['channel_id'])) {
            $channel_id = $data['channel_id'] = "";
        } else {
            $channel_id = $data['channel_id'];
        }
        if (empty($data['source_id'])) {
            $source_id = $data['source_id'] = "";
        } else {
            $source_id = $data['source_id'];
        }
        if (empty($data['school_college_id'])) {
            $school_college_id = $data['school_college_id'] = "";
        } else {
            $school_college_id = $data['school_college_id'];
        }
        if (empty($data['priority'])) {
            $priority = $data['priority'] = "";
        } else {
            $priority = $data['priority'];
        }
        if (empty($data['reference_name'])) {
            $reference_name = $data['reference_name'] = "";
        } else {
            $reference_name = $data['reference_name'];
        }
        if (empty($data['reference_mobile_no'])) {
            $reference_mobile_no = $data['reference_mobile_no'] = "";
        } else {
            $reference_mobile_no = $data['reference_mobile_no'];
        }
        if (empty($data['referred_to'])) {
            $referred_to = $data['referred_to'] = "";
        } else {
            $referred_to = $data['referred_to'];
        }
        if (empty($data['status'])) {
            $status = $data['status'] = "";
        } else {
            $status = $data['status'];
        }
        if (empty($data['followup_mode'])) {
            $followup_mode = $data['followup_mode'] = "";
        } else {
            $followup_mode = $data['followup_mode'];
        }
        if (empty($data['followup_status'])) {
            $followup_status = $data['followup_status'] = "";
        } else {
            $followup_status = $data['followup_status'];
        }
        if (empty($data['existing_follow_up_mode'])) {
            $existing_follow_up_mode = $data['existing_follow_up_mode'] = "";
        } else {
            $existing_follow_up_mode = $data['existing_follow_up_mode'];
        }
        if (empty($data['next_followup_date'])) {
            $next_followup_date = $data['next_followup_date'] = "";
        } else {
            $next_followup_date = $data['next_followup_date'];
        }
        if (empty($data['followup_remark'])) {
            $followup_remark = $data['followup_remark'] = "";
        } else {
            $followup_remark = $data['followup_remark'];
        }
        if (empty($data['state'])) {
            $state = $data['state'] = "";
        } else {
            $state = $data['state'];
        }
        if (empty($data['city'])) {
            $city = $data['city'] = "";
        } else {
            $city = $data['city'];
        }
        if (empty($data['area'])) {
            $area = $data['area'] = "";
        } else {
            $area = $data['area'];
        }
        if (empty($data['address'])) {
            $address = $data['address'] = "";
        } else {
            $address = $data['address'];
        }
        if (empty($data['branch_id'])) {
            $branch_id = $data['branch_id'] = "";
        } else {
            $branch_id = $data['branch_id'];
        }
        if (empty($data['department'])) {
            $department = $data['department'] = "";
        } else {
            $department = $data['department'];
        }
        if (empty($data['course_package'])) {
            $course_package = $data['course_package'] = "";
        } else {
            $course_package = $data['course_package'];
        }
        if (empty($data['course_or_package'])) {
            $course_or_package = $data['course_package'] = "";
        } else {
            $course_or_package = $data['course_or_package'];
        }
        if (empty($data['dob'])) {
            $dob = $data['dob'] = "";
        } else {
            $dob = $data['dob'];
        }
        if (empty($data['alternate_mobile_no'])) {
            $alternate_mobile_no = $data['alternate_mobile_no'] = "";
        } else {
            $alternate_mobile_no = $data['alternate_mobile_no'];
        }
        if (empty($data['father_name'])) {
            $father_name = $data['father_name'] = "";
        } else {
            $father_name = $data['father_name'];
        }
        if (empty($data['father_mobile_no'])) {
            $father_mobile_no = $data['father_mobile_no'] = "";
        } else {
            $father_mobile_no = $data['father_mobile_no'];
        }
        if (empty($data['tenth_board'])) {
            $tenth_board = $data['tenth_board'] = "";
        } else {
            $tenth_board = $data['tenth_board'];
        }
        if (empty($data['tenth_perc'])) {
            $tenth_perc = $data['tenth_perc'] = "";
        } else {
            $tenth_perc = $data['tenth_perc'];
        }
        if (empty($data['tweth_board'])) {
            $tweth_board = $data['tweth_board'] = "";
        } else {
            $tweth_board = $data['tweth_board'];
        }
        if (empty($data['tweth_perc'])) {
            $tweth_perc = $data['tweth_perc'] = "";
        } else {
            $tweth_perc = $data['tweth_perc'];
        }
        if (empty($data['degree'])) {
            $degree = $data['degree'] = "";
        } else {
            $degree = $data['degree'];
        }
        if (empty($data['degree_perc'])) {
            $degree_perc = $data['degree_perc'] = "";
        } else {
            $degree_perc = $data['degree_perc'];
        }
        if (empty($data['any_remarks'])) {
            $any_remarks = $data['any_remarks'] = "";
        } else {
            $any_remarks = $data['any_remarks'];
        }
        if (empty($data['lead_creation_date'])) {
            $lead_creation_date = $data['lead_creation_date'] = "";
        } else {
            $lead_creation_date = $data['lead_creation_date'];
        }
        if (empty($data['lead_modification_date'])) {
            $lead_modification_date = $data['lead_modification_date'] = "";
        } else {
            $lead_modification_date = $data['lead_modification_date'];
        }
        if (empty($data['next_action_date'])) {
            $next_action_date = $data['next_action_date'] = "";
        } else {
            $next_action_date = $data['next_action_date'];
        }
        if (empty($data['followup_status_yellow'])) {
            $followup_status_yellow = $data['followup_status_yellow'] = "";
        } else {
            $followup_status_yellow = $data['followup_status_yellow'];
        }
        if (empty($data['followup_status_red'])) {
            $followup_status_red = $data['followup_status_red'] = "";
        } else {
            $followup_status_red = $data['followup_status_red'];
        }
        if (empty($data['followup_status_green'])) {
            $followup_status_green = $data['followup_status_green'] = "";
        } else {
            $followup_status_green = $data['followup_status_green'];
        }
        if (empty($data['lead_list_dupli_id'])) {
            $lead_list_dupli_id = $data['lead_list_dupli_id'] = "";
        } else {
            $lead_list_dupli_id = $data['lead_list_dupli_id'];
        }
        if (empty($data['next_action_date_update'])) {
            $next_action_date_update = $data['next_action_date_update'] = "";
        } else {
            $next_action_date_update = $data['next_action_date_update'];
        }
        if (empty($data['created_by'])) {
            $created_by = $data['created_by'] = "";
        } else {
            $created_by = $data['created_by'];
        }
        if (empty($data['next_followup_date_only'])) {
            $next_followup_date_only = $data['next_followup_date_only'] = "";
        } else {
            $next_followup_date_only = $data['next_followup_date_only'];
        }
        if (empty($data['next_followup_time_only'])) {
            $next_followup_time_only = $data['next_followup_time_only'] = "";
        } else {
            $next_followup_time_only = $data['next_followup_time_only'];
        }
        $campaign_status = "Enrolled";
        $record = array('campaign_id' => $campaign_id, 'lead_list_id' => $lead_list_id, 'name' => $name, 'surname' => $surname, 'mobile_no' => $mobile_no, 'email' => $email, 'gender' => $gender, 'channel_id' => $channel_id, 'source_id' => $source_id, 'school_college_id' => $school_college_id, 'priority' => $priority, 'reference_name' => $reference_name, 'reference_mobile_no' => $reference_mobile_no, 'referred_to' => $referred_to, 'status' => $status, 'followup_mode' => $followup_mode, 'followup_status' => $followup_status, 'existing_follow_up_mode' => $existing_follow_up_mode, 'next_followup_date' => $next_followup_date, 'followup_remark' => $followup_remark, 'state' => $state, 'city' => $city, 'area' => $area, 'address' => $address, 'branch_id' => $branch_id, 'department' => $department, 'course_package' => $course_package, 'course_or_package' => $course_or_package, 'dob' => $dob, 'alternate_mobile_no' => $alternate_mobile_no, 'father_name' => $father_name, 'father_mobile_no' => $father_mobile_no, 'tenth_board' => $tenth_board, 'tenth_perc' => $tenth_perc, 'tweth_board' => $tweth_board, 'tweth_perc' => $tweth_perc, 'degree' => $degree, 'degree_perc' => $degree_perc, 'any_remarks' => $any_remarks, 'lead_creation_date' => $lead_creation_date, 'lead_modification_date' => $lead_modification_date, 'next_action_date' => $next_action_date, 'followup_status_yellow' => $followup_status_yellow, 'followup_status_red' => $followup_status_red, 'followup_status_green' => $followup_status_green, 'lead_list_dupli_id' => $lead_list_dupli_id, 'next_action_date_update' => $next_action_date_update, 'created_by' => $created_by, 'next_followup_date_only' => $next_followup_date_only, 'next_followup_time_only' => $next_followup_time_only, 'campaign_status' => $campaign_status);
        $result = $this->cm->save_data('campaign_lead_data', $record);
        echo json_encode($result);
    }
    public function ajax_get_campaign_followuprecoes_record() {
        $id = $this->input->post('campaign_id');
        $data['list_campaign_followuprecoes_record'] = $this->cm->get_campaign_followuprecoes_record('campaign_lead_data', 'campaign_id', $id);
        $data['list_department'] = $this->cm->view_all("department");
        $data['branch_all'] = $this->cm->view_all("branch");
        $data['course_all'] = $this->cm->view_all("course");
        $data['list_package'] = $this->cm->view_all("package");
        $data['list_source'] = $this->cm->view_all("source");
        $data['list_followupreco'] = $this->cm->view_all("followupreco_list");
        $data['list_source'] = $this->cm->view_all("source");
        $data['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $data['counselor_all'] = $this->cm->all_counselor("user");
        $this->load->view('dashboard/ajax_view_followuprecoes_data', $data);
    }

    public function Crm_list()
    {
        $status_all = $this->cm->view_all('bulk_lead_followup_type');
        $lead_list_all_record = $this->cm->view_all_lead_record('lead_list');
        $allLeadRecord = $this->cm->view_all_records('lead_list');
        $status_wise = array();
        $status_wise['0 - All'] = $allLeadRecord;
        foreach ($status_all as $sa) {
            $count = 0;
            foreach ($lead_list_all_record as $ls) {
                if ($ls->status == $sa->followup_type_name) {
                    $count++;
                }
            }
            $status_wise[$sa->followup_type_name] = $count;
        }
        //GET STATUS WISE RECORD
        if (@$this->input->get('status') && $this->input->get('status') != 'All') {
            // $cl =  $this->input->get('status');
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
        if (@$this->input->post('searching_l')) {
            $search = $this->input->post('searching_l');
            $sear = array('name' => $search, 'email' => $search, 'mobile_no' => $search);
        }
        $conditions['order_by'] = "lead_list_id DESC";
        $conditions['limit'] = $this->perPage;
        if (!empty($re)) {
            $conditions['where'] = array('status' => $re);
        }
        if (!empty($sear)) {
            $conditions['searching'] = $sear;
        }
        $display['lead_list_all'] = $this->cm->getRows($conditions);
        // echo "<pre>";
        // echo "tst";
        // echo $re;
        // print_r($display['lead_list_all']);
        // exit;
        // $data['posts'] = $this->post->getRows($conditions);
        $user_wisedata = $this->cm->get_tbl_mutireco('lead_list','reference_name',$_SESSION['user_name']);
        foreach($user_wisedata as $v){
            $lereco[] = $v->lead_list_id; 
        } 
    
        $display['user_wise_lead'] = implode(',',$lereco);
        $display['user_wise_lead_count'] = $this->cm->get_tbl_mutirecount('lead_list','reference_name',$_SESSION['user_name']);
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
        $display['list_package'] = $this->cm->view_all("rnw_package");
        $display['list_email_template'] = $this->cm->view_all("email_template_category");
        $display['counselor_record'] = $this->cm->view_counselor_record('user');
        $display['telecaller_record'] = $this->cm->view_telecaller_record('user');
        $display['admin_record'] = $this->cm->view_all('admin');
        $display['list_department'] = $this->cm->view_all("department");
        $display['college_school_list'] = $this->cm->view_all("list_school");
        $display['list_city'] = $this->cm->get_source_record("cities", 'city_state', 'Gujarat');
        $display['list_course'] = $this->cm->view_all("rnw_course");
        $display['lead_followup_history'] = $this->cm->view_all("lead_followup_history");
        $display['lead_followup_history_response'] = $this->cm->view_all("lead_followup_history_response");
        $display['sms_template_list'] = $this->cm->view_all("sms_template");
        $display['status_wise'] = $status_wise;
        // echo "<pre>";
        // print_r($display['demo_data']);
        // die;
       
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        // $update['followupreco_datas'] = $this->cm->followupreco_notification_data("admission_courses");
		// $update['count_followupreco'] = $this->cm->count_followupreco_notification("admission_courses");
		// $update['course_completed'] = $this->cm->course_completed_student("admission_courses");
		// $update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
       
        if (!empty($this->input->post('test'))) {
            $this->load->view('crm/ajax_Crm_list', $display);
        } else {
            $this->load->view('erp/erpheader', $update);
            $this->load->view('crm/Crm_list',$display);
        }
    }

    public function get_folloupreco() {
        $data = $this->input->post();
        $folloupreco = $this->cm->get_tbl_mutireco('bulk_lead_followup_subtype', 'followup_status_id', $data['followup_type_name']);
        echo '<option value="">Select Followup</option>';
        for ($i = 0;$i < sizeof($folloupreco);$i++) {
            if ($data['followup_type_name'] == $folloupreco[$i]->followup_status_id) { ?>
				<option value="<?php echo $folloupreco[$i]->sub_type_name; ?>"><?php echo $folloupreco[$i]->sub_type_name; ?></option>
			<?php
            }
        }
    }

    public function lead_filter(){

        $filter = $this->input->post();
        if(!empty($filter)) {
        $display['lead_list_all'] = $this->cm->get_lead_filter('lead_list', $filter);
        $display['filter_prospected_name'] = @$filter['filter_prospected_name'];
        $display['filter_email'] = @$filter['filter_email'];
        $display['filter_mobile'] = @$filter['filter_mobile'];
        $display['filter_sourse'] = @$filter['filter_sourse'];
        $display['filter_branch'] = @$filter['filter_branch'];
        $display['filter_department'] = @$filter['filter_department'];
        $display['filter_courses'] = @$filter['filter_courses'];
        $display['filter_channel'] = @$filter['filter_channel'];
        $display['filter_status'] = @$filter['filter_status'];
        $display['filter_substatus'] = @$filter['filter_substatus'];
        $display['filter_from_creatioon_date'] = @$filter['filter_from_creatioon_date'];
        $display['filter_to_creatioon_date'] = @$filter['filter_to_creatioon_date'];
        $display['filter_on'] = "dfgf";
        } else {
            $display['lead_list_all'] = $this->cm->get_lead_filter('lead_list');
        }
       
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
        $display['list_package'] = $this->cm->view_all("rnw_package");
        $display['list_email_template'] = $this->cm->view_all("email_template_category");
        $display['counselor_record'] = $this->cm->view_counselor_record('user');
        $display['telecaller_record'] = $this->cm->view_telecaller_record('user');
        $display['admin_record'] = $this->cm->view_all('admin');
        $display['list_department'] = $this->cm->view_all("department");
        $display['college_school_list'] = $this->cm->view_all("list_school");
        $display['list_city'] = $this->cm->get_source_record("cities", 'city_state', 'Gujarat');
        $display['list_course'] = $this->cm->view_all("rnw_course");
        $display['lead_followup_history'] = $this->cm->view_all("lead_followup_history");
        $display['lead_followup_history_response'] = $this->cm->view_all("lead_followup_history_response");
        $display['sms_template_list'] = $this->cm->view_all("sms_template");
        $display['course_all'] = $this->cm->view_all("rnw_course");
       
        $this->load->view('crm/crm_filter_lead', $display);
    }

    public function refer_reco(){

        $filter = $this->input->post();
        if(!empty($filter)) {
        $display['lead_list_all'] = $this->cm->get_lead_filter('lead_list', $filter);
        $display['filter_prospected_name'] = @$filter['filter_prospected_name'];
        $display['filter_email'] = @$filter['filter_email'];
        $display['filter_mobile'] = @$filter['filter_mobile'];
        $display['filter_sourse'] = @$filter['filter_sourse'];
        $display['filter_branch'] = @$filter['filter_branch'];
        $display['filter_department'] = @$filter['filter_department'];
        $display['filter_channel'] = @$filter['filter_channel'];
        $display['filter_substatus'] = @$filter['filter_substatus'];
        $display['filter_from_creatioon_date'] = @$filter['filter_from_creatioon_date'];
        $display['filter_to_creatioon_date'] = @$filter['filter_to_creatioon_date'];
        $display['filter_on'] = "dfgf";
        } else {
            $display['lead_list_all'] = $this->cm->get_lead_filter('lead_list');
        }

        foreach($display['lead_list_all'] as $value){
            $record[] = $value->lead_list_id;
        }
        echo json_encode($record);
    }

    public function refered_to_other(){
        $data = $this->input->post();
        date_default_timezone_set('Asia/Kolkata');
        $created_date = date('Y-m-d h:i:s');
        $created_by = $_SESSION['user_name'];
        if(!empty($data['lead_list_ids'])) {
            $string = $data['lead_list_ids']; 
            $str_arr = preg_split("/\,/", $string); 
            
            for($i = 0; $i < sizeof($str_arr); $i++) {
            $leads = $this->admi->view_all('lead_list');
    
            foreach($leads as $dn){
                $flag = 0;
                $dnbi  = explode(',', $str_arr[$i]);
                if (in_array($dn['lead_list_id'], $dnbi)) {
                    $flag = 1;
                }
    
                if ($flag == 1) {
                    $leadremarkreco = array('lead_list_id'=>$dn['lead_list_id'],'lead_remarks'=>$data['remarks'],'created_by'=>$created_by,'created_date'=>$created_date);
    
                    $this->db->insert('lead_remarks',$leadremarkreco);
    
                    $lead_list_id = $dn['lead_list_id'];
                    $reco = array('referred_to'=>$data['refer_to_person']);
    
                    $result = $this->cm->update_record('lead_list', $reco, 'lead_list_id', $lead_list_id);
    
                    if ($result) {
                        $status_check = 1;
                    } else {
                        $status_check = 0;
                    }
                 }
               } 
            } 
           
            if ($status_check == 1) {
            	$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Updated");
                echo json_encode($recp); // echo "1";
            } else {
            	$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        } else {
            $string = $data['user_wise_lead_ids']; 
            $str_arr = preg_split ("/\,/", $string); 
            
            for($i = 0; $i < sizeof($str_arr); $i++) {
            $leads = $this->admi->view_all('lead_list');
    
            foreach($leads as $dn){
                $flag = 0;
                $dnbi  = explode(',', $str_arr[$i]);
                if(in_array($dn['lead_list_id'], $dnbi)) {
                    $flag = 1;
                }
    
                if ($flag == 1) {
                    $leadremarkreco = array('lead_list_id'=>$dn['lead_list_id'],'lead_remarks'=>$data['remarks'],'created_by'=>$created_by,'created_date'=>$created_date);
    
                    $this->db->insert('lead_remarks',$leadremarkreco);
    
                    $lead_list_id = $dn['lead_list_id'];
                    $reco = array('referred_to'=>$data['refer_to_person']);
    
                    $result = $this->cm->update_record('lead_list', $reco, 'lead_list_id', $lead_list_id);
    
                    if ($result) {
                        $status_check = 1;
                    } else {
                        $status_check = 0;
                    }
                 }
               } 
            } 
           
            if ($status_check == 1) {
            	$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Updated");
                echo json_encode($recp); // echo "1";
            } else {
            	$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        }
        
    }

    public function send_email_filtered_end_userwise(){
        $data = $this->input->post();
        date_default_timezone_set('Asia/Kolkata');
        $created_date = date('Y-m-d h:i:s');
        $created_by = $_SESSION['user_name'];
        $list_email_template = $this->cm->view_all("email_template_category");
        foreach($list_email_template as $key) { if($key->id==$data['email_template']){
            $email_template = $key->category;
        } }
        if(!empty($data['lead_list_ids'])) {
            $string = $data['lead_list_ids']; 
            $str_arr = preg_split("/\,/", $string); 
            for($i = 0; $i < sizeof($str_arr); $i++) {
            $leads = $this->admi->view_all('lead_list');
            foreach($leads as $dn){
                $flag = 0;
                $dnbi  = explode(',', $str_arr[$i]);
                if (in_array($dn['lead_list_id'], $dnbi)) {
                    $flag = 1;
                }
    
                if ($flag == 1) {
                    $email_record = $dn['email'];
                    $emailconfigration = $this->admi->email_configration_daynamic('email_settings');
                    foreach ($emailconfigration as $key) {
                        if ($key->email_type == "1") {
                            $Protocol = $key->encryption;
                            $HostName = $key->host;
                            $SmtpPortNo = $key->port;
                            $SmtpUser = $key->email;
                            $SmtpPass = $key->password;

                            $config = array(
                                'protocol'  => $Protocol,
                                'smtp_host' => $HostName,
                                'smtp_port' => $SmtpPortNo,
                                'smtp_user' => $SmtpUser,
                                'smtp_pass' => $SmtpPass,
                                'mailtype'  => 'html',
                                'charset'   => 'utf-8'
                            );
                                $this->load->library('email');
                                $this->email->initialize($config);
                        }

                        if ($key->email_type == "2") {
                            @$fromemail = $key->email;
                            @$from = @$fromemail;
                        }
                    }

                    $to = $email_record;
                    $subject = $email_template;
                    $message = $data['email_subject'];
                    
                    $this->email->set_newline("\r\n");
                    $this->email->from($from);
                    $this->email->to($to);
                    $this->email->subject($subject);
                    $this->email->message($message);
                   $result = $this->email->send();
                    if ($result) {
                        $status_check = 1;
                    } else {
                        $status_check = 0;
                    }
                 }
               } 
            } 

            if ($status_check == 1) {
                $recp["all_record"] = array('status' => 1, "msg" => "HI! Send Email Filtered!");
                echo json_encode($recp); // echo "1";
            } else {
                $recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        } else {
            $string = $data['user_wise_lead_ids']; 
            $str_arr = preg_split ("/\,/", $string); 
            for($i = 0; $i < sizeof($str_arr); $i++) {
            $leads = $this->admi->view_all('lead_list');
            foreach($leads as $dn){
                $flag = 0;
                $dnbi  = explode(',', $str_arr[$i]);
                if(in_array($dn['lead_list_id'], $dnbi)) {
                    $flag = 1;
                }
    
                if ($flag == 1) {
                    $email_record = $dn['email'];
                    $emailconfigration = $this->admi->email_configration_daynamic('email_settings');
                    foreach ($emailconfigration as $key) {
                        if ($key->email_type == "1") {
                            $Protocol = $key->encryption;
                            $HostName = $key->host;
                            $SmtpPortNo = $key->port;
                            $SmtpUser = $key->email;
                            $SmtpPass = $key->password;

                            $config = array(
                                'protocol'  => $Protocol,
                                'smtp_host' => $HostName,
                                'smtp_port' => $SmtpPortNo,
                                'smtp_user' => $SmtpUser,
                                'smtp_pass' => $SmtpPass,
                                'mailtype'  => 'html',
                                'charset'   => 'utf-8'
                            );
                                $this->load->library('email');
                                $this->email->initialize($config);
                        }

                        if ($key->email_type == "2") {
                            @$fromemail = $key->email;
                            @$from = @$fromemail;
                        }
                    }

                    $to = $email_record;
                    $subject = $email_template;
                    $message = $data['email_subject'];
                    
                    $this->email->set_newline("\r\n");
                    $this->email->from($from);
                    $this->email->to($to);
                    $this->email->subject($subject);
                    $this->email->message($message);
                    $result = $this->email->send();
                    if ($result) {
                        $status_check = 1;
                    } else {
                        $status_check = 0;
                    }
                 }
               } 
            } 
           
            if ($status_check == 3) {
                $recp["all_record"] = array('status' => 3, "msg" => "HI! Send Email Corrent User");
                echo json_encode($recp); // echo "1";
            } else {
                $recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        }
    }

     public function send_sms_filtered_end_userwise(){
        $data = $this->input->post();
           if(!empty($data['lead_list_ids'])) {
            $string = $data['lead_list_ids']; 
            $str_arr = preg_split("/\,/", $string); 
            for($i = 0; $i < sizeof($str_arr); $i++) {
            $leads = $this->admi->view_all('lead_list');
            foreach($leads as $dn){
                $flag = 0;
                $dnbi  = explode(',', $str_arr[$i]);
                if (in_array($dn['lead_list_id'], $dnbi)) {
                    $flag = 1;
                }
    
                if ($flag == 1) {
                    $mo = $dn['mobile_no'];
                    $sms = $data['sms_compose_Textarea'];
                    $mobile = "91" . $mo;
                    $msg = urlencode($sms);
                    // echo $msg;
                    $url = "http://dndsms.vishawebsolutions.com/api/mt/SendSMS?user=Hitesh-RNW&password=Hitz9898&senderid=RNWEDU&channel=Trans&DCS=8&flashsms=0&number=$mobile&text=$msg&route=15";
                    /* init the resource */
                    $ch = curl_init();
                    curl_setopt_array($ch, array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true, CURLOPT_ENCODING => "", CURLOPT_SSL_VERIFYHOST => 0, CURLOPT_SSL_VERIFYPEER => 0));
                    /* get response */
                    $output = curl_exec($ch);
                    if($output) {
                        $status_check = 1;
                    } else {
                        $status_check = 0;
                    }

                    /* Print error if any */
                    if (curl_errno($ch)) {
                        echo 'error:' . curl_error($ch);
                    }
                    curl_close($ch);
                    return 1;
                 }
               } 
            } 

            if ($status_check == 1) {
                $recp["all_record"] = array('status' => 1, "msg" => "HI! Send Email Filtered!");
                echo json_encode($recp); // echo "1";
            } else {
                $recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        } else {
            $string = $data['user_wise_lead_ids']; 
            $str_arr = preg_split ("/\,/", $string); 
            for($i = 0; $i < sizeof($str_arr); $i++) {
            $leads = $this->admi->view_all('lead_list');
            foreach($leads as $dn){
                $flag = 0;
                $dnbi  = explode(',', $str_arr[$i]);
                if(in_array($dn['lead_list_id'], $dnbi)) {
                    $flag = 1;
                }
    
                if ($flag == 1) {
                  $mo = $dn['mobile_no'];
                    $sms = $data['sms_compose_Textarea'];
                    $mobile = "91" . $mo;
                    $msg = urlencode($sms);
                    // echo $msg;
                    $url = "http://dndsms.vishawebsolutions.com/api/mt/SendSMS?user=Hitesh-RNW&password=Hitz9898&senderid=RNWEDU&channel=Trans&DCS=8&flashsms=0&number=$mobile&text=$msg&route=15";
                    /* init the resource */
                    $ch = curl_init();
                    curl_setopt_array($ch, array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true, CURLOPT_ENCODING => "", CURLOPT_SSL_VERIFYHOST => 0, CURLOPT_SSL_VERIFYPEER => 0));
                    /* get response */
                    $output = curl_exec($ch);
                    if($output) {
                        $status_check = 1;
                    } else {
                        $status_check = 0;
                    }
                    
                    /* Print error if any */
                    if (curl_errno($ch)) {
                        echo 'error:' . curl_error($ch);
                    }
                    curl_close($ch);
                    return 1;
                 }
               } 
            } 
           
            if ($status_check == 3) {
                $recp["all_record"] = array('status' => 3, "msg" => "HI! Send Email Corrent User");
                echo json_encode($recp); // echo "1";
            } else {
                $recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        }
    }

    public function allocated_to_demo(){
        $lead_list_id = $this->input->post('lead_list_id');
        $record['single_record'] = $this->admin->get_reco('lead_list', 'lead_list_id', $lead_list_id);
        
        $record['list_branch'] = $this->cm->view_all_branch("branch");
        $record['list_course'] = $this->cm->view_all("rnw_course");
        $record['list_package'] = $this->cm->view_all("rnw_package");
        $record['list_user'] = $this->cm->view_all("user");
        $this->load->view('crm/ajax_lead_to_demo',$record);
    }

    public function leadreco_download_mail(){
       $name = $this->input->post('current_user');
       $user_wise_lead = $this->cm->get_tbl_mutireco('lead_list','reference_name',$name);
       $object = new PHPExcel();
       $object->setActiveSheetIndex(0);
       $table_columns = array("Prospect Name","Email","Mobile","Status","Source","Channel", "Sub-Status",'Priority');
       $column = 0;
       foreach ($table_columns as $field) {
           $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
           $column++;
       }
       $listlead = $this->cm->lead_exportdownload();
       $list_course = $this->cm->view_all("rnw_course");
       $list_package = $this->cm->view_all("rnw_package");
       $list_ClgCourses = $this->cm->view_all("college_courses");
       $channel_list = $this->cm->view_all("channel");
       $source_list = $this->cm->view_all("lead_source");
       $list_status = $this->cm->view_all("bulk_lead_followup_type");
       $list_substatus = $this->cm->view_all("bulk_lead_followup_subtype");
       $list_branch = $this->cm->view_all("branch");
       $excel_row = 2;
       foreach($listlead as $row) {
           $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->name);
           $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->email);
           $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->mobile_no);
           $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->status);
           $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->source_id);
           $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->channel_id);
           $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->sub_status);
           $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->priority);
           $excel_row++;
       }
       $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
       header('Content-Type: application/vnd.ms-excel');
       header('Content-Disposition: attachment;filename="downloadlead.xls"');
       $object_writer->save('php://output');
    }

    
    //    $emailconfigration = $this->admi->email_configration_daynamic('email_settings');
    //    foreach ($emailconfigration as $key) {
    //        if ($key->email_type == "1") {
    //            $Protocol = $key->encryption;
    //            $HostName = $key->host;
    //            $SmtpPortNo = $key->port;
    //            $SmtpUser = $key->email;
    //            $SmtpPass = $key->password;

    //            $config = array(
    //                'protocol'  => $Protocol,
    //                'smtp_host' => $HostName,
    //                'smtp_port' => $SmtpPortNo,
    //                'smtp_user' => $SmtpUser,
    //                'smtp_pass' => $SmtpPass,
    //                'mailtype'  => 'html',
    //                'charset'   => 'utf-8'
    //            );
    //                $this->load->library('email');
    //                $this->email->initialize($config);
    //        }

    //        if ($key->email_type == "2") {
    //            @$fromemail = $key->email;
    //            @$from = @$fromemail;
    //        }
    //    }

    //    $to = 'rnw1.devloping@gmail.com';
    //    $subject = "Lead List";
    //    $message = $import;
       
    //    $this->email->set_newline("\r\n");
    //    $this->email->from($from);
    //    $this->email->to($to);
    //    $this->email->subject($subject);
    //    $this->email->message($message);
    //    if ($this->email->send()) {
    //        $st = 1;
    //        if ($st == 1) {
    //            $record = array('status' => 1, "msg" => "Successfully Sedn Mail!!");
    //            $recp['all_record'] = $record;
    //            echo json_encode($recp);
    //        } else {
    //            $recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
    //            echo json_encode($recp);
    //        }
    //    } else {
    //        echo $this->email->print_debugger();
    //    }

    public function fetch_package_course() {
        $data = $this->input->post();
        $b_id = $data['branch_id'];
        $package = $this->admi->view_all('rnw_package');
        echo '<option value="">Select Package</option>';
        foreach ($package as $pac) {
            $flag = 0;
            $dnbi = explode(',', $pac['branch_id']);
            if (in_array($b_id, $dnbi)) {
                $flag = 1;
            }
            if ($flag == 1) {
                ?>
                <?php if($pac['package_status']=="0"){ ?>
				<option value="<?php echo $pac['package_id']; ?>"><?php echo $pac['package_name']; ?></option>
				<?php
            } }
        }
    }

    public function fetch_single_course() {
        $data = $this->input->post();
        $b_id = $data['branch_id'];
        $course = $this->admi->view_all('rnw_course');
        echo '<option value="">Select Course</option>';
        foreach ($course as $co) {
            $flag = 0;
            $dnbi = explode(',', $co['branch_id']);
            if (in_array($b_id, $dnbi)) {
                $flag = 1;
            }
            if ($flag == 1) {
            ?>
				<?php if($co['course_status']=="0") { ?>
				<option value="<?php echo $co['course_id']; ?>"><?php echo $co['course_name']; ?></option>
			<?php
            } }
        }
    }

    public function get_subcourse(){
        $data = $this->input->post();
        $subcourse = $this->admi->get_reco_multiple('rnw_subcourse','course_id',$data['course_id']);
        echo '<option value="">Select Course</option>';
        foreach($subcourse as $co) {  if($co->subcourse_status=="0") {
        ?>
        <option value="<?php echo $co->subcourse_name; ?>"><?php echo $co->subcourse_name; ?></option>
        <?php   
        } }
    }

    public function get_subpackage(){
        $data = $this->input->post();
        $subpackage = $this->admi->get_reco_multiple('rnw_subpackage','package_id',$data['package_id']);
        echo '<option value="">Select Course</option>';
        foreach($subpackage as $co) {  
            $subcourse = $this->admi->get_reco_multiple('rnw_subcourse','subcourse_id',$co->subcourse_id);
            foreach($subcourse as $subco){
               ?>
               <option value="<?php echo $subco->subcourse_name; ?>"><?php echo $subco->subcourse_name; ?></option>
               <?php
            }
        } 
    }

    public function get_demobatch(){
        $data = $this->input->post();
        $demo_batch_list = $this->admi->get_reco_multiple('demo_batch_list','faculty_ids',$data['faculty_id']);
        echo '<option value="">Select Batch</option>';
        foreach($demo_batch_list as $db) {  if($db->status=="0") { ?>
        <option value="<?php echo $db->batch_list_id; ?>"><?php echo $db->batch_name; ?></option>
        <?php } }
    }

    public function get_faculty_branchwise() {
        $data = $this->input->post();
        $b_id = $data['branch_id'];
        $faculty = $this->admi->get_faculty('user');
        echo '<option value="">Select Faculty</option>';
        foreach($faculty as $ab) {
            $flag = 0;
            $dnbi = explode(',', $ab['branch_ids']);
            if (in_array($b_id, $dnbi)) {
                $flag = 1;
            }
            if ($flag == 1) {
            ?>
				<?php if($ab['status']=="0") { ?>
				<option value="<?php echo $ab['user_id']; ?>"><?php echo $ab['name']; ?></option>
			<?php
            } }
        }
    }

    public function get_hod_branchwise() {
        $data = $this->input->post();
        $b_id = $data['branch_id'];
        $hod = $this->admi->get_hod('user');
        echo '<option value="">Select Hod</option>';
        foreach($hod as $ab) {
            $flag = 0;
            $dnbi = explode(',', $ab['branch_ids']);
            if (in_array($b_id, $dnbi)) {
                $flag = 1;
            }
            if ($flag == 1) {
            ?>
				<?php if($ab['status']=="0") { ?>
				<option value="<?php echo $ab['user_id']; ?>"><?php echo $ab['name']; ?></option>
			<?php
            } }
        }
    }

    public function crm_lead_history() {
        $lead_id = $this->input->post('lead_list_id');
        $data['history'] = $this->cm->get_history_lead('lead_list_history', 'leadListId', $lead_id);
        $data['list_branch'] = $this->cm->view_all_branch("branch");
        $data['list_department'] = $this->cm->view_all("department");
        $data['list_package'] = $this->cm->view_all("package");
        $data['list_course'] = $this->cm->view_all("course");
        $this->load->view('crm/crm_lead_history', $data);
    }

    public function checkTimefaculty(){
        $faculty_id = $this->input->post('faculty_id');
        $display['select_faculty'] = $this->cm->select_data("user", "user_id", $faculty_id);
        $display['all_time'] = $this->cm->view_all("time");
        $display['demo_all'] = $this->cm->view_all_demo_running("demo");
        $display['startingCourse'] = $this->input->post('courseName');
        $display['demo_date'] = $this->input->post('demo_date');
        $this->load->view('crm/crm_checkTimefaculty', $display);
    }

    public function search_lead()
    {
        $this->load->view('crm/crm_leadsearch');
    }

    public function crm_channel()
    {
        $display['channel_list'] = $this->cm->view_all("channel");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['followupreco_datas'] = $this->cm->followupreco_notification_data("admission_courses");
        $update['count_followupreco'] = $this->cm->count_followupreco_notification("admission_courses");
        $update['course_completed'] = $this->cm->course_completed_student("admission_courses");
        $update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
        $update['course_data'] = $this->cm->view_all("course");

        $this->load->view('erp/erpheader', $update);
        $this->load->view('crm/crm_channel',$display); 
    }

    public function ajax_channel()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();

			date_default_timezone_set('Asia/Kolkata');
			$data['added_date'] = date('Y-m-d h:i:s');
			$data['addBy'] = $_SESSION['user_name'];
			unset($data['submit']);
			if ($this->input->post('channel_id')) {
				$id = $this->input->post('channel_id');
				unset($data['channel_id']);
				$query = $this->admin->update_record('channel', $data, 'channel_id', $id);
				if ($query) {
					$recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			} else {
				unset($data['channel_id']);
				$query = $this->admin->import_record('channel', $data);
				if ($query) {
					$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			}
		}
	}

    public function get_record_channel()
	{
		$channel_id = $this->input->post('channel_id');
		$record['single_record'] = $this->admin->get_reco('channel', 'channel_id', $channel_id);
		echo json_encode($record);
	}

    public function update_status()
	{
		$data = $this->input->post(); 
		$reco[$data['field']] = $data['status'];
	
		$re = $this->admin->update_record($data['table'], $reco, $data['check_field'], $data['id']);

		if ($re) {
			$recp["status"] = array('status' => 1, "msg" => "Status updated succefully.");
			echo json_encode($recp);
		} else {
			$recp["status"] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp);
		}
	}

    public function delete_record() {
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

     public function crm_source()
    {
        $display['source_list'] = $this->cm->view_all("lead_source");
        $display['channel_list'] = $this->cm->view_all("channel");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['followupreco_datas'] = $this->cm->followupreco_notification_data("admission_courses");
        $update['count_followupreco'] = $this->cm->count_followupreco_notification("admission_courses");
        $update['course_completed'] = $this->cm->course_completed_student("admission_courses");
        $update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
        $update['course_data'] = $this->cm->view_all("course");

        $this->load->view('erp/erpheader', $update);
        $this->load->view('crm/crm_source',$display); 
    }

    public function ajax_source()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();

			date_default_timezone_set('Asia/Kolkata');
			$data['added_date'] = date('Y-m-d h:i:s');
			$data['addBy'] = $_SESSION['user_name'];
			unset($data['submit']);
			if ($this->input->post('source_id')) {
				$id = $this->input->post('source_id');
				unset($data['source_id']);
				$query = $this->admin->update_record('lead_source', $data, 'source_id', $id);
				if ($query) {
					$recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			} else {
				unset($data['source_id']);
				$query = $this->admin->import_record('lead_source', $data);
				if ($query) {
					$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			}
		}
	}

    public function get_record_source()
	{
		$source_id = $this->input->post('source_id');
		$record['single_record'] = $this->admin->get_reco('lead_source', 'source_id', $source_id);
		echo json_encode($record);
	}

    public function crm_school_college()
    {
        $display['school_list'] = $this->cm->view_all("list_school");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['course_data'] = $this->cm->view_all("course");

        $this->load->view('erp/erpheader', $update);
        $this->load->view('crm/crm_school_college',$display); 
    }

    public function ajax_school_clg()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();
			date_default_timezone_set('Asia/Kolkata');
			$data['added_date'] = date('Y-m-d h:i:s');
			$data['addBy'] = $_SESSION['user_name'];
			unset($data['submit']);
			if ($this->input->post('school_id')) {
				$id = $this->input->post('school_id');
				unset($data['school_id']);
				$query = $this->admin->update_record('list_school', $data, 'school_id', $id);
				if ($query) {
					$recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			} else {
				unset($data['school_id']);
				$query = $this->admin->import_record('list_school', $data);
				if ($query) {
					$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			}
		}
	}

    public function get_record_school_clg()
	{
		$school_id = $this->input->post('school_id');
		$record['single_record'] = $this->admin->get_reco('list_school', 'school_id', $school_id);
		echo json_encode($record);
	}

    public function crm_lead_status()
    {
        $display['status_list'] = $this->cm->view_all("bulk_lead_followup_type");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['course_data'] = $this->cm->view_all("course");
        
        $this->load->view('erp/erpheader', $update);
        $this->load->view('crm/crm_lead_status',$display); 
    }

    public function ajax_leadstatus()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();
			date_default_timezone_set('Asia/Kolkata');
			$data['added_date'] = date('Y-m-d h:i:s');
			$data['addBy'] = $_SESSION['user_name'];
			unset($data['submit']);
			if ($this->input->post('followup_type_id')) {
				$id = $this->input->post('followup_type_id');
				unset($data['followup_type_id']);
				$query = $this->admin->update_record('bulk_lead_followup_type', $data, 'followup_type_id', $id);
				if ($query) {
					$recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			} else {
				unset($data['followup_type_id']);
				$query = $this->admin->import_record('bulk_lead_followup_type', $data);
				if ($query) {
					$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			}
		}
	}

    public function get_record_leadstatus()
	{
		$followup_type_id = $this->input->post('followup_type_id');
		$record['single_record'] = $this->admin->get_reco('bulk_lead_followup_type', 'followup_type_id', $followup_type_id);
		echo json_encode($record);
	}

    public function crm_lead_folloupsubstatus()
    {
        $display['substatus_list'] = $this->cm->view_all("bulk_lead_followup_subtype");
        $display['status_list'] = $this->cm->view_all("bulk_lead_followup_type");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['course_data'] = $this->cm->view_all("course");

        $this->load->view('erp/erpheader', $update);
        $this->load->view('crm/crm_lead_folloupsubstatus',$display); 
    }

    public function ajax_folloupsubstatus()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();
			date_default_timezone_set('Asia/Kolkata');
			$data['added_date'] = date('Y-m-d h:i:s');
			$data['addBy'] = $_SESSION['user_name'];
			unset($data['submit']);
			if ($this->input->post('subtype_id')) {
				$id = $this->input->post('subtype_id');
				unset($data['subtype_id']);
				$query = $this->admin->update_record('bulk_lead_followup_subtype', $data, 'subtype_id', $id);
				if ($query) {
					$recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			} else {
				unset($data['subtype_id']);
				$query = $this->admin->import_record('bulk_lead_followup_subtype', $data);
				if ($query) {
					$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			}
		}
	}

    public function get_record_folloupsubstatus()
	{
		$subtype_id = $this->input->post('subtype_id');
		$record['single_record'] = $this->admin->get_reco('bulk_lead_followup_subtype', 'subtype_id', $subtype_id);
		echo json_encode($record);
	}

    public function crm_followupmode()
    {
        $display['list_followup_mode'] = $this->cm->view_all("list_follow_up_mode");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['course_data'] = $this->cm->view_all("course");

        $this->load->view('erp/erpheader', $update);
        $this->load->view('crm/crm_followupmode',$display); 
    }

    public function ajax_followupmode()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();
			date_default_timezone_set('Asia/Kolkata');
			$data['added_date'] = date('Y-m-d h:i:s');
			$data['addBy'] = $_SESSION['user_name'];
			unset($data['submit']);
			if ($this->input->post('follow_up_mode_id')) {
				$id = $this->input->post('follow_up_mode_id');
				unset($data['follow_up_mode_id']);
				$query = $this->admin->update_record('list_follow_up_mode', $data, 'follow_up_mode_id', $id);
				if ($query) {
					$recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			} else {
				unset($data['follow_up_mode_id']);
				$query = $this->admin->import_record('list_follow_up_mode', $data);
				if ($query) {
					$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			}
		}
	}

    public function get_record_followupmode()
	{
		$follow_up_mode_id = $this->input->post('follow_up_mode_id');
		$record['single_record'] = $this->admin->get_reco('list_follow_up_mode', 'follow_up_mode_id', $follow_up_mode_id);
		echo json_encode($record);
	}

    public function crm_campaign()
    {
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        // $update['followupreco_datas'] = $this->cm->followupreco_notification_data("admission_courses");
        // $update['count_followupreco'] = $this->cm->count_followupreco_notification("admission_courses");
        // $update['course_completed'] = $this->cm->course_completed_student("admission_courses");
        // $update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
        $update['course_data'] = $this->cm->view_all("course");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['list_source'] = $this->cm->view_all("source");
        $update['list_department'] = $this->cm->view_all("department");
        $update['list_branch'] = $this->cm->view_all("branch");
        $update['list_course'] = $this->cm->view_all("course");
        $update['list_package'] = $this->cm->view_all("package");
        $update['list_source'] = $this->cm->view_all("source");
        $update['list_country'] = $this->cm->view_all("country");
        $update['list_state'] = $this->cm->view_all("state");
        $update['list_city'] = $this->cm->view_all("cities");
        $update['list_area'] = $this->cm->view_all("area");
        //$update['list_followupreco'] = $this->cm->view_all("followupreco_list");
        $update['all_admission'] = $this->cm->view_all("admission_process");
        $update['hod_all'] = $this->cm->view_all_hod_demo("hod");
        $update['faculty_all'] = $this->cm->view_all("faculty");
        $update['admisison_process_data'] = $this->cm->view_all("admission_process");
        $update['overdue_fees_counting_list'] = $this->admi->overdue_fees_counting("admission_installment");

        $this->load->view('erp/erpheader', $update);
        $this->load->view('crm/crm_campaign'); 
        $this->load->view('erp/erpfooter', $update);
    }

    public function crm_myfollowup()
    {
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        // $update['followupreco_datas'] = $this->cm->followupreco_notification_data("admission_courses");
        // $update['count_followupreco'] = $this->cm->count_followupreco_notification("admission_courses");
        // $update['course_completed'] = $this->cm->course_completed_student("admission_courses");
        // $update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
        $update['course_data'] = $this->cm->view_all("course");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['list_source'] = $this->cm->view_all("source");
        $update['list_department'] = $this->cm->view_all("department");
        $update['list_branch'] = $this->cm->view_all("branch");
        $update['list_course'] = $this->cm->view_all("course");
        $update['list_package'] = $this->cm->view_all("package");
        $update['list_source'] = $this->cm->view_all("source");
        $update['list_country'] = $this->cm->view_all("country");
        $update['list_state'] = $this->cm->view_all("state");
        $update['list_city'] = $this->cm->view_all("cities");
        $update['list_area'] = $this->cm->view_all("area");
        //$update['list_followupreco'] = $this->cm->view_all("followupreco_list");
        $update['all_admission'] = $this->cm->view_all("admission_process");
        $update['hod_all'] = $this->cm->view_all_hod_demo("hod");
        $update['faculty_all'] = $this->cm->view_all("faculty");
        $update['admisison_process_data'] = $this->cm->view_all("admission_process");
        $update['overdue_fees_counting_list'] = $this->admi->overdue_fees_counting("admission_installment");

        $this->load->view('erp/erpheader', $update);
        $this->load->view('crm/crm_myfollowup'); 
        //$this->load->view('erp/erpfooter', $update);
    }
  }
?>