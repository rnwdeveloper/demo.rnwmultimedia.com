<?php
ob_start();
class Enquiry extends CI_Controller {
    function __construct() {
        @parent::__construct();
        $this->load->library('excel');
        $this->load->model("Dbcommon", "cm");
        $this->load->model("EnquiryModal", "enq");
        $this->load->model("Quickadmissionprocess", "admi");
        $this->load->library('email');
        $this->load->helper('loggs');
        $this->load->helper('urldata');
    }
    public function leads_list($st = "") {
        logdata("Lead list page open");
        if (!empty($this->input->post('filter_lead'))) {
            $filter = $this->input->post();
            $display['all_leads'] = $this->enq->view_all_leads("lead", $filter);
            $display['filter_startDate'] = @$filter['filter_startDate'];
            $display['filter_endDate'] = @$filter['filter_endDate'];
            $display['filter_fname'] = @$filter['filter_fname'];
            $display['filter_lname'] = @$filter['filter_lname'];
            $display['filter_email'] = @$filter['filter_email'];
            $display['filter_mobile'] = @$filter['filter_mobile'];
            $display['filter_source'] = @$filter['filter_source'];
            $display['filter_course'] = @$filter['filter_course'];
            $display['filter_branch'] = @$filter['filter_branch'];
            $display['filter_on'] = "dfgf";
        } else if (!empty($st) && @$st == "duplicate") {
            //  $query = $this->db->query("SELECT * FROM lead WHERE ORDER BY lead_name , lead_email , lead_number");
            $query = $this->db->query("SELECT lead_id, trash, lead_branch, lead_date, lead_timestamp, lead_course_id, lead_message,lead_address, lead_mail_msg, lead_source, lead_trashed_by, lead_trashed_reason, lead_update_timestamp, lead_name, lead.lead_email,lead.lead_number
FROM lead 
INNER JOIN(
SELECT lead_email,lead_number
FROM lead
GROUP BY lead_email,lead_number
HAVING COUNT(lead_id) >1
)temp ON lead.lead_email= temp.lead_email AND lead.lead_number= temp.lead_number where `lead_toEnquiry`='0'");
            $display['all_leads'] = $query->result();
            $display['status'] = $st;
        } else {
            $display['all_leads'] = $this->enq->view_all_leads("lead");
        }
        $display['all_package'] = $this->enq->view_all("package");
        $display['all_course'] = $this->enq->view_all("course");
        $display['all_branch'] = $this->enq->view_all("branch");
        $display['all_source'] = $this->enq->view_all("source");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('enquiry/leads', $display);
    }
    function select_lead_msg() {
        $id = $this->input->post('id');
        $result['selectdata'] = $this->cm->select_data("lead", "lead_id", $id);
        echo json_encode($result);
    }
    function download_excel() {
        header('Content-Type: application/vnd.ms-excel');
        header('Content-disposition: attachment; filename=' . rand() . '.xls');
        echo $_POST["data"];
    }
    function import_csv() {
        $lead_source = $this->input->post('lead_source');
        if (@$_FILES["csv_file"]["name"] != "") {
            $path = $_FILES["csv_file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2;$row <= $highestRow;$row++) {
                    $f_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $l_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $email = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $number = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $branch_code = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $course_name = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $comment = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $select_branch = $this->cm->select_data("branch", "branch_code", $branch_code);
                    $branch_id = $select_branch->branch_id;
                    date_default_timezone_set('Asia/Calcutta');
                    $c_date = date('Y-m-d');
                    $c_timestamp = date("Y-m-d") . " " . date("h:i:sa");
                    $data['lead_branch'] = $branch_id;
                    $data['lead_date'] = $c_date;
                    $data['lead_timestamp'] = $c_timestamp;
                    $data['lead_name'] = $f_name . " " . $l_name;
                    $data['lead_email'] = $email;
                    $data['lead_number'] = $number;
                    $data['lead_source'] = $lead_source;
                    $data['lead_message'] = $course_name . " - " . $comment;
                    $re = $this->enq->insert_data("lead", $data);
                }
            }
            redirect('Enquiry/leads_list');
        }
    }
    public function newLead() {
        logdata("newLead page open");
        if (!empty($_SESSION['lead_msg_inserted'])) {
            $display['msg'] = $_SESSION['lead_msg_inserted'];
            unset($_SESSION['lead_msg_inserted']);
        }
        if (!empty($_SESSION['lead_msg_updated'])) {
            $display['msg'] = $_SESSION['lead_msg_updated'];
            unset($_SESSION['lead_msg_updated']);
        }
        if (@$this->input->get('action') == "edit" && !empty($this->input->get('id'))) {
            $id = $this->input->get('id');
            $display['selectdata'] = $this->cm->select_data("lead", "lead_id", $id);
        }
        $data = $this->input->post();
        if (!empty($data['submit'])) {
            $c_timestamp = date("Y-m-d") . " " . date("h:i:sa");
            $ins_data['lead_branch'] = $data['lead_branch'];
            $ins_data['lead_date'] = $data['lead_date'];
            $ins_data['lead_timestamp'] = $c_timestamp;
            $ins_data['lead_name'] = $data['fname'] . " " . $data['lname'];
            $ins_data['lead_email'] = $data['lead_email'];
            $ins_data['lead_number'] = $data['lead_number'];
            if (!empty($data['lead_course_id'])) {
                $ins_data['lead_course_id'] = $data['lead_course_id'];
            }
            if (!empty($data['lead_package_id'])) {
                $ins_data['lead_package_id'] = $data['lead_package_id'];
            }
            $ins_data['lead_message'] = $data['lead_message'];
            $ins_data['lead_address'] = $data['city'] . ", " . $data['state'] . ", " . $data['country'];
            $ins_data['lead_source'] = $data['lead_source'];
            $ins_data['lead_refferedName'] = $data['lead_refferedName'];
            $ins_data['lead_refferedMobile'] = $data['lead_refferedMobile'];
            if (!empty($data['update_id'])) {
                $id = $data['update_id'];
                $re = $this->enq->update_data("lead", $ins_data, "lead_id", $id);
                if ($re) {
                    logdata("newLead id " . $id . " update");
                    $_SESSION['lead_msg_updated'] = "Lead Updated";
                    redirect('Enquiry/newLead');
                }
            } else {
                $re = $this->enq->insert_data("lead", $ins_data);
                if ($re) {
                    logdata("newLead " . implode(",", $ins_data) . " add");
                    $_SESSION['lead_msg_inserted'] = "Lead Inserted";
                    redirect('Enquiry/newLead');
                }
            }
        }
        $display['all_package'] = $this->enq->view_all("package");
        $display['all_course'] = $this->enq->view_all("course");
        $display['all_branch'] = $this->enq->view_all("branch");
        $display['all_source'] = $this->enq->view_all("source");
        $display['all_country'] = $this->enq->view_all("country");
        $display['all_state'] = $this->enq->view_all("state");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('enquiry/add_new_lead', $display);
    }
    public function trash_lead() {
        date_default_timezone_set('Asia/Calcutta');
        $ids = explode(",", $this->input->get('lead_ids'));
        $data['lead_trashed_reason'] = $this->input->get('reason');
        $data['lead_trashed_by'] = $_SESSION['user_name'];
        $c_timestamp = date("Y-m-d") . " " . date("h:i:sa");
        $data['lead_update_timestamp'] = $c_timestamp;
        for ($i = 0;$i < sizeof($ids);$i++) {
            $data['trash'] = 1;
            $this->enq->update_data("lead", $data, "lead_id", $ids[$i]);
        }
        redirect('Enquiry/leads_list');
    }
    public function trashed_leads() {
        if (!empty($this->input->get('action_move'))) {
            $id = $this->input->get('id');
            $data['trash'] = 0;
            $data['lead_trashed_reason'] = "";
            $data['lead_trashed_by'] = "";
            $this->enq->update_data("lead", $data, "lead_id", $id);
            redirect('Enquiry/trashed_leads');
        }
        if (!empty($this->input->post('filter_lead'))) {
            $filter = $this->input->post();
            $display['all_leads'] = $this->enq->view_all_leads("lead", $filter);
            $display['filter_startDate'] = @$filter['filter_startDate'];
            $display['filter_endDate'] = @$filter['filter_endDate'];
            $display['filter_fname'] = @$filter['filter_fname'];
            $display['filter_lname'] = @$filter['filter_lname'];
            $display['filter_email'] = @$filter['filter_email'];
            $display['filter_mobile'] = @$filter['filter_mobile'];
            $display['filter_source'] = @$filter['filter_source'];
            $display['filter_course'] = @$filter['filter_course'];
            $display['filter_branch'] = @$filter['filter_branch'];
            $display['filter_on'] = "dfgf";
        } else {
            $display['all_leads'] = $this->enq->view_all_leads("lead");
        }
        $display['all_package'] = $this->enq->view_all("package");
        $display['all_course'] = $this->enq->view_all("course");
        $display['all_branch'] = $this->enq->view_all("branch");
        $display['all_source'] = $this->enq->view_all("source");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('enquiry/lead_trashed', $display);
    }
    public function delete_trashed_lead() {
        $ids = explode(",", $this->input->get('lead_ids'));
        for ($i = 0;$i < sizeof($ids);$i++) {
            $this->enq->delete_data("lead", "lead_id", $ids[$i]);
        }
        redirect('Enquiry/trashed_leads');
    }
    public function enquiryView($enquiry_id = "") {
        if (!empty($_SESSION['edit_msg'])) {
            $display['msg'] = $_SESSION['edit_msg'];
            unset($_SESSION['edit_msg']);
        }
        if (!empty($this->input->post('submit_followup_edit'))) {
            $data = $this->input->post();
            $follwup_id = $data['update_id'];
            $ins_follwp['follwup_by'] = $_SESSION['user_name'];
            $ins_follwp['follwup_interestLevel'] = $data['follwup_interestLevel'];
            $ins_follwp['follwup_interestRating'] = $data['follwup_interestRating'];
            $ins_follwp['follwup_studentResponse'] = $data['follwup_studentResponse'];
            $ins_follwp['follwup_action'] = $data['follwup_action'];
            $ins_follwp['follwup_mode'] = $data['follwup_mode'];
            $ins_follwp['next_followup'] = $data['enquiry_next_followp'];
            $ins_follwp['follwup_comment'] = $data['follwup_comment'];
            $re = $this->enq->update_data("enquiry_follwup", $ins_follwp, "follwup_id", $follwup_id);
            $enquiry_id = $data['enquiry_id'];
            $nextfdate = explode(" ", $data['enquiry_next_followp']);
            $upddata['enquiry_next_followp_date'] = $nextfdate[0];
            $upddata['enquiry_next_followp'] = $data['enquiry_next_followp'];
            $upddata['enquiry_follwup_interestRating'] = $data['follwup_interestRating'];
            $upddata['enquiry_follwup_interestLevel'] = $data['follwup_interestLevel'];
            $upddata['enquiry_follwup_studentResponse'] = $data['follwup_studentResponse'];
            $upddata['enquiry_follwup_action'] = $data['follwup_action'];
            $upddata['enquiry_follwup_mode'] = $data['follwup_mode'];
            $upddata['enquiry_follwup_comment'] = $data['follwup_comment'];
            $upddata['follwup_by'] = $_SESSION['user_name'];
            $res = $this->enq->update_data("enquiry", $upddata, "enquiry_id", $enquiry_id);
            if ($re) {
                $_SESSION['edit_msg'] = "Follwup Updated";
                redirect('Enquiry/enquiryView/' . $enquiry_id);
            }
        }
        if (!empty($this->input->post('submit_edit'))) {
            $data = $this->input->post();
            $insdata = array();
            $insdata['enquiry_name'] = $data['fname'] . " " . $data['lname'];
            $insdata['enquiry_email'] = $data['enquiry_email'];
            $insdata['enquiry_number'] = $data['enquiry_number'];
            $insdata['enquiry_city'] = $data['enquiry_city'];
            $insdata['enquiry_area'] = $data['enquiry_area'];
            $insdata['enquiry_course_type'] = $data['enquiry_course_type'];
            $insdata['enquiry_category'] = $data['enquiry_category'];
            if ($data['enquiry_course_type'] == "Single Course") {
                $insdata['enquiry_courseName'] = implode(",", $data['enquiry_courseName']);
                $insdata['enquiry_packageName'] = "";
            }
            if ($data['enquiry_course_type'] == "Package") {
                $insdata['enquiry_packageName'] = implode(",", $data['enquiry_packageName']);
                $insdata['enquiry_courseName'] = "";
            }
            $insdata['enquiry_sourceType'] = $data['enquiry_sourceType'];
            $insdata['enquiry_referredByName'] = $data['enquiry_referredByName'];
            $insdata['enquiry_referredByMobile'] = $data['enquiry_referredByMobile'];
            $insdata['enquiry_update_timestamp'] = date('Y-m-d h:i:s', time());
            $enquiry_id = $data['update_id'];
            $re = $this->enq->update_data("enquiry", $insdata, "enquiry_id", $enquiry_id);
            if ($re) {
                $_SESSION['edit_msg'] = "Enquiry Updated";
                redirect('Enquiry/enquiryView/' . $enquiry_id);
            }
        }
        $display['select_enquiry'] = $this->cm->select_data("enquiry", "enquiry_id", $enquiry_id);
        $display['select_followup'] = $this->enq->filter_followup("enquiry_follwup", "enquiry_id", $enquiry_id);
        $display['all_department'] = $this->enq->view_all("department");
        $display['all_branch'] = $this->cm->view_all("branch");
        $display['all_user'] = $this->cm->view_all("user");
        $display['all_cancel_reason_list'] = $this->cm->view_all("cancel_reason_list");
        $display['all_country'] = $this->enq->view_all("country");
        $display['all_state'] = $this->enq->view_all("state");
        $display['all_city'] = $this->enq->view_all("cities");
        $display['all_area'] = $this->enq->view_all("city_area");
        $display['all_source'] = $this->enq->view_all("source");
        $display['all_package'] = $this->enq->view_all("package");
        $display['all_course'] = $this->enq->view_all("course");
        $display['all_list_followup_action'] = $this->enq->view_all("list_followup_action");
        $display['all_list_follow_up_mode'] = $this->enq->view_all("list_follow_up_mode");
        $display['all_list_interest_level'] = $this->enq->view_all("list_interest_level");
        $display['all_list_school'] = $this->enq->view_all("list_school");
        $display['all_list_student_response'] = $this->enq->view_all("list_student_response");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('enquiry/enquiry_view', $display);
    }
    public function assignEnq() {
        $data['enquiry_branch'] = $this->input->post('enquiry_branch');
        $data['enquiry_assignedUser'] = $this->input->post('enquiry_assignedUser');
        $ids = explode(",", $this->input->post('enqids'));
        for ($i = 0;$i < sizeof($ids);$i++) {
            $this->enq->update_data("enquiry", $data, "enquiry_id", $ids[$i]);
        }
        $_SESSION['enq_msg'] = "Enquiry Assigned";
        redirect('Enquiry/inquirys');
    }
    public function add_followup() {
        if (!empty($this->input->post('submit_followup'))) {
            $data = $this->input->post();
            $ins_follwp['enquiry_id'] = $data['enquiry_id'];
            $ins_follwp['follwup_date'] = date('Y-m-d');
            $ins_follwp['follwup_by'] = $_SESSION['user_name'];
            $ins_follwp['follwup_interestLevel'] = $data['follwup_interestLevel'];
            $ins_follwp['follwup_interestRating'] = $data['follwup_interestRating'];
            $ins_follwp['follwup_studentResponse'] = $data['follwup_studentResponse'];
            $ins_follwp['follwup_action'] = $data['follwup_action'];
            $ins_follwp['follwup_mode'] = $data['follwup_mode'];
            $ins_follwp['next_followup'] = $data['enquiry_next_followp'];
            $ins_follwp['follwup_comment'] = $data['follwup_comment'];
            $re = $this->enq->insert_data("enquiry_follwup", $ins_follwp);
            $enquiry_id = $data['enquiry_id'];
            $upddata['enquiry_follwup_interestLevel'] = $data['follwup_interestLevel'];
            $upddata['enquiry_follwup_interestRating'] = $data['follwup_interestRating'];
            $upddata['enquiry_follwup_studentResponse'] = $data['follwup_studentResponse'];
            $upddata['enquiry_follwup_action'] = $data['follwup_action'];
            $upddata['enquiry_follwup_mode'] = $data['follwup_mode'];
            $upddata['enquiry_next_followp'] = $data['enquiry_next_followp'];
            $nextfdate = explode(" ", $data['enquiry_next_followp']);
            $upddata['enquiry_next_followp_date'] = $nextfdate[0];
            $upddata['enquiry_follwup_comment'] = $data['follwup_comment'];
            $upddata['follwup_by'] = $_SESSION['user_name'];
            $res = $this->enq->update_data("enquiry", $upddata, "enquiry_id", $enquiry_id);
            if ($re) {
                $_SESSION['edit_msg'] = "Follwup added";
                if (!empty($data['demo_id'])) {
                    $demo_id = $data['demo_id'];
                    redirect('Enquiry/demoView/' . $demo_id);
                } else {
                    redirect('Enquiry/enquiryView/' . $enquiry_id);
                }
            }
        }
    }
    public function discardEnq() {
        $data = $this->input->post();
        $enquiry_id = $data['enquiry_id'];
        $upd['enquiry_trash'] = 1;
        $upd['enquiry_trashed_by'] = $_SESSION['user_name'];
        $upd['enquiry_trashed_reason'] = $data['enquiry_trashed_reason'];
        $upd['enquiry_cancel_reason'] = $data['enquiry_cancel_reason'];
        $upd['enquiry_update_timestamp'] = date("Y-m-d") . " " . date("h:i:s");
        $re = $this->enq->update_data("enquiry", $upd, "enquiry_id", $enquiry_id);
        if ($re) {
            $_SESSION['enq_cancel_msg'] = "Enquiry Discard Successfully";
            redirect('Enquiry/inquirys');
        }
    }
    public function proceedEnq() {
        logdata("New inquiery page open");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('enquiry/proceed_enq');
    }
    public function newEnquiry() {
        date_default_timezone_set('Asia/Kolkata');
        if (!empty($this->input->post('submit_area'))) {
            $data = $this->input->post();
            unset($data['submit_area']);
            $re = $this->enq->insert_data("city_area", $data);
            logdata("newEnquiry " . implode(",", $data) . " add");
            if ($re) {
                redirect('Enquiry/newEnquiry');
            }
        }
        if (!empty($this->input->post('lead_add_enquiry'))) {
            $display['selectlead'] = $this->cm->select_data("lead", "lead_id", $this->input->post('lead_add_enquiry'));
        }
        if (!empty($this->input->post('submit')) && @$this->input->post('submit') == "Proceed") {
            if (!empty($this->input->post('enquiry_option'))) {
                $data = $this->input->post();
                if ($data['enquiry_option'] == "email") {
                    $email = $data['email'];
                    $display['select_pre_enquiry'] = $this->cm->select_data("enquiry", "enquiry_email", $email);
                }
                if ($data['enquiry_option'] == "number") {
                    $mobile = $data['mobile'];
                    $display['select_pre_enquiry'] = $this->cm->select_data("enquiry", "enquiry_number", $mobile);
                }
                if (!empty($display['select_pre_enquiry']->lead_id)) {
                    $lead_id = $display['select_pre_enquiry']->lead_id;
                    $display['select_pre_enquiry_lead'] = $this->cm->select_data("lead", "lead_id", $lead_id);
                }
            } else {
                redirect('Enquiry/proceedEnq');
            }
        }
        if (!empty($this->input->post('save_enquiry'))) {
            $data = $this->input->post();
            $insdata = array();
            if (!empty($data['lead_id'])) {
                $insdata['lead_id'] = $data['lead_id'];
                $stat['lead_toEnquiry'] = 1;
                $ld_id = $data['lead_id'];
                $this->enq->update_data("lead", $stat, "lead_id", $ld_id);
            }
            $c_timestamp = date("Y-m-d") . " " . date("h:i:sa");
            $c_date = date("Y-m-d");
            $selectb = $this->cm->select_data("branch", "branch_id", $data['enquiry_branch']);
            $insdata['enq_id'] = $selectb->branch_code . "/Enq/" . date("Y");
            $insdata['enquiry_date'] = date("Y-m-d");
            $insdata['enquiry_timestamp'] = date("Y-m-d") . " " . date("h:i:sa");
            $insdata['enquiry_name'] = $data['fname'] . " " . $data['lname'];
            $insdata['enquiry_email'] = $data['enquiry_email'];
            $insdata['enquiry_number'] = $data['enquiry_number'];
            $insdata['enquiry_branch'] = $data['enquiry_branch'];
            $insdata['enquiry_city'] = $data['enquiry_city'];
            $insdata['enquiry_area'] = $data['enquiry_area'];
            $insdata['enquiry_course_type'] = $data['enquiry_course_type'];
            $insdata['enquiry_category'] = $data['enquiry_category'];
            if ($data['enquiry_course_type'] == "Single Course") {
                $insdata['enquiry_courseName'] = implode(",", $data['enquiry_courseName']);
            }
            if ($data['enquiry_course_type'] == "Package") {
                $insdata['enquiry_packageName'] = implode(",", $data['enquiry_packageName']);
            }
            $insdata['enquiry_assignedUser'] = $data['enquiry_assignedUser'];
            $insdata['enquiry_addedBy'] = $_SESSION['user_name'];
            $insdata['enquiry_sourceType'] = $data['enquiry_sourceType'];
            $insdata['enquiry_school'] = $data['enquiry_school'];
            $insdata['enquiry_referredByName'] = $data['enquiry_referredByName'];
            $insdata['enquiry_referredByMobile'] = $data['enquiry_referredByMobile'];
            $insdata['enquiry_msg_mobile'] = $data['enquiry_msg_mobile'];
            $insdata['enquiry_msg_email'] = $data['enquiry_msg_email'];
            $insdata['enquiry_follwup_interestLevel'] = $data['follwup_interestLevel'];
            $insdata['enquiry_follwup_studentResponse'] = $data['follwup_studentResponse'];
            $insdata['enquiry_follwup_interestRating'] = $data['follwup_interestRating'];
            $insdata['enquiry_follwup_action'] = $data['follwup_action'];
            $insdata['enquiry_follwup_mode'] = $data['follwup_mode'];
            $insdata['enquiry_next_followp'] = $data['enquiry_next_followp'];
            $nextfdate = explode(" ", $data['enquiry_next_followp']);
            $insdata['enquiry_next_followp_date'] = $nextfdate[0];
            $insdata['enquiry_follwup_comment'] = $data['follwup_comment'];
            $insdata['enquiry_update_timestamp'] = date('Y-m-d h:i:s', time());
            $insdata['follwup_by'] = $_SESSION['user_name'];
            $insid = $this->enq->insert_enquiry("enquiry", $insdata);
            $ins_follwp['enquiry_id'] = $insid;
            $ins_follwp['follwup_date'] = date('Y-m-d');
            $ins_follwp['follwup_by'] = $_SESSION['user_name'];
            $ins_follwp['follwup_interestLevel'] = $data['follwup_interestLevel'];
            $ins_follwp['follwup_interestRating'] = $data['follwup_interestRating'];
            $ins_follwp['follwup_studentResponse'] = $data['follwup_studentResponse'];
            $ins_follwp['follwup_action'] = $data['follwup_action'];
            $ins_follwp['follwup_mode'] = $data['follwup_mode'];
            $ins_follwp['next_followup'] = $data['enquiry_next_followp'];
            $ins_follwp['follwup_comment'] = $data['follwup_comment'];
            $res = $this->enq->insert_data("enquiry_follwup", $ins_follwp);
            if (!empty($insid) && $res) {
                if (!empty($data['lead_id'])) {
                    $stat['lead_toEnquiry'] = 1;
                    $ld_id = $data['lead_id'];
                    $this->enq->update_data("lead", $stat, "lead_id", $ld_id);
                }
                $tmp_msg = $this->enq->select_data("msg_template", "msg_category_name", "Create Enquiry");
                $select_bran = $this->enq->select_data("branch", "branch_id", $data['enquiry_branch']);
                if ($data['enquiry_course_type'] == "Single Course") {
                    $co = implode(",", $data['enquiry_courseName']);
                }
                if ($data['enquiry_course_type'] == "Package") {
                    $co = implode(",", $data['enquiry_packageName']);
                }
                $temp_msg1 = $tmp_msg->msg_template_text;
                $sname = $data['fname'] . " " . $data['lname'];
                $temp_msg1 = str_replace("[student_name]", $sname, $temp_msg1);
                $temp_msg1 = str_replace("[course]", $co, $temp_msg1);
                $temp_msg1 = str_replace("[branch]", $select_bran->branch_name, $temp_msg1);
                $msg = $temp_msg1;
                if ($data['enquiry_msg_mobile'] == "Yes" && !empty($data['enquiry_number'])) {
                    $ch = curl_init();
                    $url = 'http://dndsms.vishawebsolutions.com/api/mt/SendSMS?user=hitesh-RNW&password=Hitz9898&senderid=RNWEDU&channel=Trans&DCS=0&flashsms=0&number=' . $data['enquiry_number'] . '&text=' . urlencode($msg) . '&route=15';
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_FAILONERROR, true); // Required for HTTP error codes to be reported via our call to curl_error($ch)
                    @curl_exec(@$ch);
                    if (@curl_error(@$ch)) {
                        //   echo $error_msg = curl_error($ch);
                        
                    }
                    @curl_close(@$ch);
                }
                if ($insdata['enquiry_msg_email'] == "Yes" && !empty($data['enquiry_email'])) {
                    $this->load->library('email');
                    //  $config['protocol']    = 'smtp';
                    $config['protocol'] = 'mail';
                    //      $config['smtp_host']    = 'ssl://smtp.gmail.com';
                    $config['smtp_host'] = 'smtp.elasticemail.com';
                    //   $config['smtp_port']    = '465';
                    $config['smtp_port'] = '2525';
                    $config['smtp_timeout'] = '7';
                    $config['smtp_user'] = 'mailer@rnwmultimedia.in';
                    $config['smtp_pass'] = '1988#Ambardi';
                    $config['charset'] = 'utf-8';
                    $config['newline'] = "\r\n";
                    $config['mailtype'] = 'text'; // or html
                    $config['validation'] = TRUE; // bool whether to validate email or not
                    $this->email->initialize($config);
                    $this->email->from('info@rnwmultimedia.com', 'Red & White Multimedia Education');
                    $this->email->to($data['enquiry_email']);
                    $this->email->subject('RNW');
                    $this->email->message($msg);
                    if ($this->email->send()) {
                        //	echo 'Mail Send Successfully';
                        
                    }
                }
                $_SESSION['enq_msg'] = "Enquiry Saved Successfilly";
                redirect('Enquiry/inquirys');
            }
        }
        $display['all_country'] = $this->enq->view_all("country");
        $display['all_state'] = $this->enq->view_all("state");
        $display['all_city'] = $this->enq->view_all("cities");
        $display['all_area'] = $this->enq->view_all("city_area");
        $display['all_branch'] = $this->enq->view_all("branch");
        $display['all_source'] = $this->enq->view_all("source");
        $display['all_department'] = $this->enq->view_all("department");
        $display['all_list_followup_action'] = $this->enq->view_all("list_followup_action");
        $display['all_list_follow_up_mode'] = $this->enq->view_all("list_follow_up_mode");
        $display['all_list_interest_level'] = $this->enq->view_all("list_interest_level");
        $display['all_list_school'] = $this->enq->view_all("list_school");
        $display['all_list_student_response'] = $this->enq->view_all("list_student_response");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('enquiry/add_new_enquiry', $display);
    }
    function getcontent() {
        if ($this->input->post('status') == "getbranchwise") {
            $display['status'] = $this->input->post('status');
            $display['branch_id'] = $this->input->post('branch_id');
            $display['all_user'] = $this->enq->view_all("user");
        }
        if ($this->input->post('status') == "courseType") {
            $display['status'] = "courseType";
            if ($this->input->post('wh') == 1) {
                $display['wh'] = 1;
            }
            if ($this->input->post('wh') == 2) {
                $display['wh'] = 2;
            }
            $display['all_department'] = $this->enq->view_all("department");
            $display['all_package'] = $this->enq->view_all("package");
            $display['all_course'] = $this->enq->view_all("course");
        }
        $display['sdsd'] = "";
        $this->load->view('enquiry/pack_course_content', $display);
    }
    function getcontentDemo() {
        if ($this->input->post('status') == "getbranchwise") {
            $display['status'] = $this->input->post('status');
            $display['branch_id'] = $this->input->post('branch_id');
            $display['all_user'] = $this->enq->view_all("user");
        }
        if ($this->input->post('status') == "courseType") {
            $display['status'] = "courseType";
            if ($this->input->post('wh') == 1) {
                $display['wh'] = 1;
            }
            if ($this->input->post('wh') == 2) {
                $display['wh'] = 2;
            }
            $display['all_department'] = $this->enq->view_all("department");
            $display['all_package'] = $this->enq->view_all("package");
            $display['all_course'] = $this->enq->view_all("course");
        }
        $display['sdsd'] = "";
        $this->load->view('enquiry/pack_course_content_demo', $display);
    }
    function getCrsPkg() {
        $deprtment_id = $this->input->post('department_id');
        if ($this->input->post('status') == 1) {
            $all_course = $this->cm->filter_data("course", "department_id", $deprtment_id);
?>
<div class="col-md-6 m-1 p-1 right">
    <label>Course:*</label>
</div>
<div class="col-md-6 m-1 p-1">
    <select class="w-100 select2" onChange="addCourse()" id="getcourse" required>
        <option value="">Select Course</option>
        <?php foreach ($all_course as $val) {
                if ($val->status == "0") { ?>
        <option <?php if (@$selectdata->lead_course_id == $val->course_id) {
                        echo "selected";
                    } ?> value="<?php echo $val->course_id; ?>"><?php echo $val->course_name; ?></option>
        <?php
                }
            } ?>
    </select>
</div>
<?php
        }
        if ($this->input->post('status') == 2) {
            $all_package = $this->cm->filter_data("package", "department_id", $deprtment_id);
?>
<div class="col-md-6 m-1 p-1 right">
    <label>Course Package:*</label>
</div>
<div class="col-md-6 m-1 p-1">
    <select class="w-100 select2" onChange="addPackage()" id="getpackage" required>
        <option value="">Select</option>
        <?php foreach ($all_package as $val) {
                if ($val->status == "0") { ?>
        <option <?php if (@$selectdata->lead_package_id == $val->package_id) {
                        echo "selected";
                    } ?> value="<?php echo $val->package_id; ?>"><?php echo $val->package_name; ?></option>
        <?php
                }
            } ?>
    </select>
</div>
<?php
        }
    }
    function getCrsPkgDemo() {
        $deprtment_id = $this->input->post('department_id');
        if ($this->input->post('status') == 1) {
            $all_course = $this->cm->filter_data("course", "department_id", $deprtment_id);
?>
<div class="col-md-6 m-1 p-1 right">
    <label>Course:*</label>
</div>
<div class="col-md-6 m-1 p-1">
    <select class="w-100 select2" name="courseName" required>
        <option value="">Select Course</option>
        <?php foreach ($all_course as $val) {
                if ($val->status == "0") { ?>
        <option value="<?php echo $val->course_name; ?>"><?php echo $val->course_name; ?></option>
        <?php
                }
            } ?>
    </select>
</div>
<?php
        }
        if ($this->input->post('status') == 2) {
            $all_package = $this->cm->filter_data("package", "department_id", $deprtment_id);
?>
<div class="col-md-6 m-1 p-1 right">
    <label>Course Package:*</label>
</div>
<div class="col-md-6 m-1 p-1">
    <select class="w-100 select2" name="packageName" id="packageNamedemo" onChange="select_package_course_demo()"
        required>
        <option value="">Select</option>
        <?php foreach ($all_package as $val) {
                if ($val->status == "0") { ?>
        <option value="<?php echo $val->package_name; ?>"><?php echo $val->package_name; ?></option>
        <?php
                }
            } ?>
    </select>
</div>
<?php
        }
    }
    function select_single_course() {
        $course_id = $this->input->post('course_id');
        $result['selectdata'] = $this->cm->select_data("course", "course_id", $course_id);
        echo json_encode($result);
    }
    function select_package_course() {
        $package_id = $this->input->post('package_id');
        $result['selectdata'] = $this->cm->select_data("package", "package_id", $package_id);
        echo json_encode($result);
    }
    public function inquirys() {
        if (!empty($_SESSION['enq_cancel_msg'])) {
            $display['msg'] = $_SESSION['enq_cancel_msg'];
            unset($_SESSION['enq_cancel_msg']);
        }
        if (!empty($_SESSION['enq_msg'])) {
            $display['msg'] = $_SESSION['enq_msg'];
            unset($_SESSION['enq_msg']);
        }
        if (!empty($this->input->post('filter_inquirys'))) {
            $filter = $this->input->post();
            $display['all_inquiry'] = $this->enq->view_all_inquirys("enquiry", $filter);
            $display['filter_startDate'] = @$filter['filter_startDate'];
            $display['filter_endDate'] = @$filter['filter_endDate'];
            $display['filter_fname'] = @$filter['filter_fname'];
            $display['filter_lname'] = @$filter['filter_lname'];
            $display['filter_email'] = @$filter['filter_email'];
            $display['filter_mobile'] = @$filter['filter_mobile'];
            $display['filter_source'] = @$filter['filter_source'];
            $display['filter_course'] = @$filter['filter_course'];
            $display['filter_branch'] = @$filter['filter_branch'];
            $display['filter_enquiry_assignedUser'] = @$filter['filter_enquiry_assignedUser'];
            $display['filter_follwup_interestRating'] = @$filter['filter_follwup_interestRating'];
            $display['filter_Next_Followup_Date_from'] = @$filter['filter_Next_Followup_Date_from'];
            $display['filter_Next_Followup_Date_to'] = @$filter['filter_Next_Followup_Date_to'];
            $display['filter_enquiry_id'] = @$filter['filter_enquiry_id'];
            $display['filter_department'] = @$filter['filter_department'];
            $display['filter_Interest_Level'] = @$filter['filter_Interest_Level'];
            $display['filter_Student_Response'] = @$filter['filter_Student_Response'];
            $display['filter_package'] = @$filter['filter_package'];
            $display['filter_on'] = "dfgf";
        } else {
            $display['all_inquiry'] = $this->enq->view_all_inquirys("enquiry");
        }
        $display['all_enquiry_follwup'] = $this->enq->view_all_followup("enquiry_follwup");
        $display['all_package'] = $this->enq->view_all("package");
        $display['all_course'] = $this->enq->view_all("course");
        $display['all_branch'] = $this->enq->view_all("branch");
        $display['all_source'] = $this->enq->view_all("source");
        $display['all_user'] = $this->enq->view_all("user");
        $display['all_department'] = $this->enq->view_all("department");
        $display['all_list_followup_action'] = $this->enq->view_all("list_followup_action");
        $display['all_list_follow_up_mode'] = $this->enq->view_all("list_follow_up_mode");
        $display['all_list_interest_level'] = $this->enq->view_all("list_interest_level");
        $display['all_list_school'] = $this->enq->view_all("list_school");
        $display['all_list_student_response'] = $this->enq->view_all("list_student_response");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['collapse'] = 1;
        $this->load->view('header', $update);
        $this->load->view('enquiry/inquirys', $display);
    }
    public function enquiryOverdueFollowup() {
        logdata("Enquiry Overdue Followup page open");
        if (!empty($_SESSION['enq_msg'])) {
            $display['msg'] = $_SESSION['enq_msg'];
            unset($_SESSION['enq_msg']);
        }
        if (!empty($this->input->post('filter_inquirys'))) {
            $filter = $this->input->post();
            $display['all_inquiry'] = $this->enq->view_all_inquirys_Overdue_Follow_Up("enquiry", $filter);
            $display['filter_startDate'] = @$filter['filter_startDate'];
            $display['filter_endDate'] = @$filter['filter_endDate'];
            $display['filter_fname'] = @$filter['filter_fname'];
            $display['filter_lname'] = @$filter['filter_lname'];
            $display['filter_email'] = @$filter['filter_email'];
            $display['filter_mobile'] = @$filter['filter_mobile'];
            $display['filter_source'] = @$filter['filter_source'];
            $display['filter_course'] = @$filter['filter_course'];
            $display['filter_branch'] = @$filter['filter_branch'];
            $display['filter_enquiry_assignedUser'] = @$filter['filter_enquiry_assignedUser'];
            $display['filter_follwup_interestRating'] = @$filter['filter_follwup_interestRating'];
            $display['filter_Next_Followup_Date_from'] = @$filter['filter_Next_Followup_Date_from'];
            $display['filter_Next_Followup_Date_to'] = @$filter['filter_Next_Followup_Date_to'];
            $display['filter_enquiry_id'] = @$filter['filter_enquiry_id'];
            $display['filter_department'] = @$filter['filter_department'];
            $display['filter_Interest_Level'] = @$filter['filter_Interest_Level'];
            $display['filter_Student_Response'] = @$filter['filter_Student_Response'];
            $display['filter_package'] = @$filter['filter_package'];
            $display['filter_on'] = "dfgf";
        } else {
            $display['all_inquiry'] = $this->enq->view_all_inquirys_Overdue_Follow_Up("enquiry");
        }
        $display['all_enquiry_follwup'] = $this->enq->view_all_followup("enquiry_follwup");
        $display['all_package'] = $this->enq->view_all("package");
        $display['all_course'] = $this->enq->view_all("course");
        $display['all_branch'] = $this->enq->view_all("branch");
        $display['all_source'] = $this->enq->view_all("source");
        $display['all_user'] = $this->enq->view_all("user");
        $display['all_department'] = $this->enq->view_all("department");
        $display['all_list_followup_action'] = $this->enq->view_all("list_followup_action");
        $display['all_list_follow_up_mode'] = $this->enq->view_all("list_follow_up_mode");
        $display['all_list_interest_level'] = $this->enq->view_all("list_interest_level");
        $display['all_list_school'] = $this->enq->view_all("list_school");
        $display['all_list_student_response'] = $this->enq->view_all("list_student_response");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['collapse'] = 1;
        $this->load->view('header', $update);
        $this->load->view('enquiry/enquiry_overdue_followup', $display);
    }
    public function enquiryPendingFollowup() {
        logdata("Enquiry Pending Followup page open");
        if (!empty($_SESSION['enq_msg'])) {
            $display['msg'] = $_SESSION['enq_msg'];
            unset($_SESSION['enq_msg']);
        }
        if (!empty($this->input->post('filter_inquirys'))) {
            $filter = $this->input->post();
            $display['all_inquiry'] = $this->enq->view_all_inquirys_Pending_Follow_Up("enquiry", $filter);
            $display['filter_startDate'] = @$filter['filter_startDate'];
            $display['filter_endDate'] = @$filter['filter_endDate'];
            $display['filter_fname'] = @$filter['filter_fname'];
            $display['filter_lname'] = @$filter['filter_lname'];
            $display['filter_email'] = @$filter['filter_email'];
            $display['filter_mobile'] = @$filter['filter_mobile'];
            $display['filter_source'] = @$filter['filter_source'];
            $display['filter_course'] = @$filter['filter_course'];
            $display['filter_branch'] = @$filter['filter_branch'];
            $display['filter_enquiry_assignedUser'] = @$filter['filter_enquiry_assignedUser'];
            $display['filter_follwup_interestRating'] = @$filter['filter_follwup_interestRating'];
            $display['filter_Next_Followup_Date_from'] = @$filter['filter_Next_Followup_Date_from'];
            $display['filter_Next_Followup_Date_to'] = @$filter['filter_Next_Followup_Date_to'];
            $display['filter_enquiry_id'] = @$filter['filter_enquiry_id'];
            $display['filter_department'] = @$filter['filter_department'];
            $display['filter_Interest_Level'] = @$filter['filter_Interest_Level'];
            $display['filter_Student_Response'] = @$filter['filter_Student_Response'];
            $display['filter_package'] = @$filter['filter_package'];
            $display['filter_on'] = "dfgf";
        } else {
            $display['all_inquiry'] = $this->enq->view_all_inquirys_Pending_Follow_Up("enquiry");
        }
        $display['all_enquiry_follwup'] = $this->enq->view_all_followup("enquiry_follwup");
        $display['all_package'] = $this->enq->view_all("package");
        $display['all_course'] = $this->enq->view_all("course");
        $display['all_branch'] = $this->enq->view_all("branch");
        $display['all_source'] = $this->enq->view_all("source");
        $display['all_user'] = $this->enq->view_all("user");
        $display['all_department'] = $this->enq->view_all("department");
        $display['all_list_followup_action'] = $this->enq->view_all("list_followup_action");
        $display['all_list_follow_up_mode'] = $this->enq->view_all("list_follow_up_mode");
        $display['all_list_interest_level'] = $this->enq->view_all("list_interest_level");
        $display['all_list_school'] = $this->enq->view_all("list_school");
        $display['all_list_student_response'] = $this->enq->view_all("list_student_response");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['collapse'] = 1;
        $this->load->view('header', $update);
        $this->load->view('enquiry/enquiry_pending_followup', $display);
    }
    public function trashedInquirys() {
        if (!empty($_SESSION['enq_cancel_msg'])) {
            $display['msg'] = $_SESSION['enq_cancel_msg'];
            unset($_SESSION['enq_cancel_msg']);
        }
        if (!empty($_SESSION['enq_msg'])) {
            $display['msg'] = $_SESSION['enq_msg'];
            unset($_SESSION['enq_msg']);
        }
        if (!empty($this->input->post('filter_inquirys'))) {
            $filter = $this->input->post();
            $display['all_inquiry'] = $this->enq->view_all_inquirys("enquiry", $filter);
            $display['filter_startDate'] = @$filter['filter_startDate'];
            $display['filter_endDate'] = @$filter['filter_endDate'];
            $display['filter_fname'] = @$filter['filter_fname'];
            $display['filter_lname'] = @$filter['filter_lname'];
            $display['filter_email'] = @$filter['filter_email'];
            $display['filter_mobile'] = @$filter['filter_mobile'];
            $display['filter_source'] = @$filter['filter_source'];
            $display['filter_course'] = @$filter['filter_course'];
            $display['filter_branch'] = @$filter['filter_branch'];
            $display['filter_Next_Followup_Date_from'] = @$filter['filter_Next_Followup_Date_from'];
            $display['filter_Next_Followup_Date_to'] = @$filter['filter_Next_Followup_Date_to'];
            $display['filter_enquiry_id'] = @$filter['filter_enquiry_id'];
            $display['filter_department'] = @$filter['filter_department'];
            $display['filter_Interest_Level'] = @$filter['filter_Interest_Level'];
            $display['filter_Student_Response'] = @$filter['filter_Student_Response'];
            $display['filter_package'] = @$filter['filter_package'];
            $display['filter_on'] = "dfgf";
        } else {
            $display['all_inquiry'] = $this->enq->view_all_inquirys("enquiry");
        }
        $display['all_enquiry_follwup'] = $this->enq->view_all_followup("enquiry_follwup");
        $display['all_package'] = $this->enq->view_all("package");
        $display['all_course'] = $this->enq->view_all("course");
        $display['all_branch'] = $this->enq->view_all("branch");
        $display['all_source'] = $this->enq->view_all("source");
        $display['all_user'] = $this->enq->view_all("user");
        $display['all_department'] = $this->enq->view_all("department");
        $display['all_list_followup_action'] = $this->enq->view_all("list_followup_action");
        $display['all_list_follow_up_mode'] = $this->enq->view_all("list_follow_up_mode");
        $display['all_list_interest_level'] = $this->enq->view_all("list_interest_level");
        $display['all_list_school'] = $this->enq->view_all("list_school");
        $display['all_list_student_response'] = $this->enq->view_all("list_student_response");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $this->load->view('header', $update);
        $this->load->view('enquiry/inquiry_trashed', $display);
    }
    public function move_to_enq($id) {
        $data['enquiry_trash'] = 0;
        $re = $this->enq->update_data("enquiry", $data, "enquiry_id", $id);
        if ($re) {
            $_SESSION['enq_msg'] = "Enquiry Moved";
            redirect('Enquiry/inquirys');
        }
    }
    public function filter_package_course() {
        $package_name = $this->input->post('package_name');
        $pk = $this->cm->select_data("package", "package_name", $package_name);
        $course_all = $this->cm->view_all("course");
        $pk_course = explode(",", $pk->course_ids);
?>


<select class="form-control select2" required id="courseName" name="courseName" onChange="select_faculty()"
    style="width: 100%;">
    <option value="">Select Stating Demo Course</option>
    <?php foreach ($course_all as $row) {
            if ($row->status == 0) {
                if (in_array($row->course_id, $pk_course)) { ?>
    <option value="<?php echo $row->course_name; ?>"><?php echo $row->course_name; ?></option>
    <?php
                }
            }
        } ?>
</select>


<?php
    }
    public function filter_package_course_demo() {
        $package_name = $this->input->post('package_name');
        $pk = $this->cm->select_data("package", "package_name", $package_name);
        $course_all = $this->cm->view_all("course");
        $pk_course = explode(",", $pk->course_ids);
?>


<select class="form-control" required name="startingCourse" onChange="select_faculty()">
    <option value="">Select Stating Demo Course</option>
    <?php foreach ($course_all as $row) {
            if ($row->status == 0) {
                if (in_array($row->course_id, $pk_course)) { ?>
    <option value="<?php echo $row->course_name; ?>"><?php echo $row->course_name; ?></option>
    <?php
                }
            }
        } ?>
</select>


<?php
    }
    public function filter_faculty() {
        $branch_id = $this->input->post('branch_id');
        if (!empty($this->input->post('course_name'))) {
            $course_name = $this->input->post('course_name');
            $select_id = $this->cm->select_data("course", "course_name", $course_name);
            $faculty_all = $this->cm->view_all_faculty("faculty");
            $course_id = $select_id->course_id;
            $branch_all = $this->cm->view_all("branch");
?>
<select class="form-control select2" required name="faculty_id" id="faculty" style="width: 100%;"
    onChange="selecttime()">
    <option value="">Assign To</option>
    <?php foreach ($faculty_all as $row) {
                $co = explode(",", $row->course_ids);
                $flag = 0;
                for ($i = 0;$i < sizeof($co);$i++) {
                    if ($course_id == $co[$i]) {
                        $flag = 1;
                    }
                }
                $bns = explode(",", $row->branch_ids);
                $flag1 = 0;
                for ($i = 0;$i < sizeof($bns);$i++) {
                    if ($branch_id == $bns[$i]) {
                        $flag1 = 1;
                    }
                }
                if ($flag == 1 && $flag1 == 1) {
                    @$bids = explode(",", @$row->branch_ids);
                    $bname = "";
                    for ($i = 0;$i < sizeof(@$bids);$i++) {
                        foreach ($branch_all as $val) {
                            if ($val->branch_id == @$bids[$i]) {
                                if ($bname == "") {
                                    $bname = $bname . " " . $val->branch_name;
                                } else {
                                    $bname = $bname . " & " . $val->branch_name;
                                }
                            }
                        }
                    }
?>
    <option <?php if (@$select_demo->faculty_id == $row->faculty_id) {
                        echo "selected";
                    } ?> value="<?php echo $row->faculty_id; ?>"><?php echo $row->name; ?> - <?php echo $row->department_name; ?> -
        <?php echo $bname; ?> </option>
    <?php
                }
            } ?>
</select>
<?php
        }
        if (!empty($this->input->post('package_name'))) {
            $package_name = $this->input->post('package_name');
            $select_id = $this->cm->select_data("package", "package_name", $package_name);
            $faculty_all = $this->cm->view_all_faculty("faculty");
            $package_id = $select_id->package_id;
            $branch_all = $this->cm->view_all("branch");
?>
<select class="form-control select2" required name="faculty_id" id="faculty" style="width: 100%;"
    onChange="selecttime()">
    <option value="">Assign To</option>
    <?php foreach ($faculty_all as $row) {
                $co = explode(",", $row->package_ids);
                $flag = 0;
                for ($i = 0;$i < sizeof($co);$i++) {
                    if ($package_id == $co[$i]) {
                        $flag = 1;
                    }
                }
                $bns = explode(",", $row->branch_ids);
                $flag1 = 0;
                for ($i = 0;$i < sizeof($bns);$i++) {
                    if ($branch_id == $bns[$i]) {
                        $flag1 = 1;
                    }
                }
                if ($flag == 1 && $flag1 == 1) {
                    @$bids = explode(",", @$row->branch_ids);
                    $bname = "";
                    for ($i = 0;$i < sizeof(@$bids);$i++) {
                        foreach ($branch_all as $val) {
                            if ($val->branch_id == @$bids[$i]) {
                                if ($bname == "") {
                                    $bname = $bname . " " . $val->branch_name;
                                } else {
                                    $bname = $bname . " & " . $val->branch_name;
                                }
                            }
                        }
                    }
?>
    <option <?php if (@$select_demo->faculty_id == $row->faculty_id) {
                        echo "selected";
                    } ?> value="<?php echo $row->faculty_id; ?>"><?php echo $row->name; ?> - <?php echo $row->department_name; ?> -
        <?php echo $bname; ?> </option>
    <?php
                }
            } ?>
</select>
<?php
        }
    }
    public function checkTime() {
        $faculty_id = $this->input->post('faculty_id');
        $display['select_faculty'] = $this->cm->select_data("faculty", "faculty_id", $faculty_id);
        $display['all_time'] = $this->cm->view_all("time");
        $display['demo_all'] = $this->cm->view_all_demo("demo");
        $display['startingCourse'] = $this->input->post('courseName');
        $display['demo_date'] = $this->input->post('demo_date');
        $this->load->view('check_time', $display);
    }
    public function addemo() {
        date_default_timezone_set("Asia/Calcutta");
        if (!empty($this->input->post('action')) && !empty($this->input->post('id'))) {
            $id = $this->input->post('id');
            if ($this->input->post('action') == "edit") {
                $display['select_demo'] = $this->cm->select_data("demo", "demo_id", $id);
            }
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            $ins_data['name'] = $data['name'];
            $ins_data['enquiry_id'] = $data['enquiry_id'];
            $ins_data['demoDate'] = $data['demoDate'];
            $ins_data['mobileNo'] = $data['mobileNo'];
            $ins_data['branch_id'] = $data['branch_id'];
            $ins_data['department_id'] = $data['department_id'];
            if (!empty($data['course_type'])) {
                $ins_data['course_type'] = $data['course_type'];
            }
            $ins_data['faculty_id'] = $data['faculty_id'];
            $ins_data['fromTime'] = $data['fromTime'];
            $ins_data['toTime'] = $data['toTime'];
            if (@$data['course_type'] == "Single Course") {
                if (!empty($data['courses'])) {
                    $ins_data['courseName'] = implode(",", $data['courses']);
                } else {
                    $ins_data['courseName'] = $data['courseName'];
                }
            } else if (@$data['course_type'] == "Package") {
                $ins_data['packageName'] = $data['packageName'];
                $pk = $this->cm->select_data("package", "package_name", $data['packageName']);
                $course_all = $this->cm->view_all("course");
                $pk_course = explode(",", $pk->course_ids);
                $pkgc = "";
                foreach ($course_all as $row) {
                    if ($row->status == 0) {
                        if (in_array($row->course_id, $pk_course)) {
                            $pkgc = $pkgc . "," . $row->course_name;
                        }
                    }
                }
                $ins_data['courseName'] = trim($pkgc, ",");
            }
            if (!empty($this->input->post('update_id'))) {
                $id = $this->input->post('update_id');
                $re = $this->cm->update_data("demo", $ins_data, "demo_id", $id);
                if ($re) {
                    $this->session->set_userdata("msg_upd", "record updated successfully");
                    redirect('welcome/viewDemo/as');
                }
            } else {
                $ins_data['startingCourse'] = $data['courseName'];
                $ins_data['addDate'] = date("Y-m-d h:i:sa");
                $ins_data['addBy'] = $_SESSION['user_name'];
                date_default_timezone_set("Asia/Kolkata");
                $ins_data['last_update'] = date('Y-m-d H:i:s');
                $demo_id = $this->enq->insert_demo("demo", $ins_data);
                $ins_remark['demo_id'] = $demo_id;
                $ins_remark['demo_remark_date'] = date("Y-m-d h:i:sa");
                $ins_remark['demo_remark_comment'] = $data['remarks'];
                $ins_remark['demo_remark_by'] = $_SESSION['user_name'];
                $this->enq->insert_data("demo_remark", $ins_remark);
                $enquiry_id = $data['enquiry_id'];
                $upst['demo_id'] = $demo_id;
                $upst['enquiry_toDemo'] = 1;
                $res = $this->enq->update_data("enquiry", $upst, "enquiry_id", $enquiry_id);
                if ($res && $demo_id) {
                    $this->session->set_userdata("msg_upd", "Demo Id : " . $demo_id . " Add successfully");
                    redirect('welcome/viewDemo/as');
                }
            }
        }
    }
    public function demoView($demo_id = "") {
        if (!empty($_SESSION['edit_msg'])) {
            $display['msg'] = $_SESSION['edit_msg'];
            unset($_SESSION['edit_msg']);
        }
        if (!empty($this->input->post('submit_remark'))) {
            $data = $this->input->post();
            $demo_id = $data['demo_id'];
            $ins_remark['demo_id'] = $demo_id;
            $ins_remark['demo_remark_date'] = date("Y-m-d h:i:sa");
            $ins_remark['demo_remark_comment'] = $data['demo_remark_comment'];
            $ins_remark['demo_remark_by'] = $_SESSION['user_name'];
            $reremark = $this->enq->insert_data("demo_remark", $ins_remark);
            if ($reremark) {
                $_SESSION['edit_msg'] = "Remark Added";
                redirect('Enquiry/demoView/' . $demo_id);
            }
        }
        if (!empty($this->input->post('submit_demo_edit'))) {
            $data = $this->input->post();
            $updat['demoDate'] = $data['demoDate'];
            $updat['name'] = $data['name'];
            $updat['mobileNo'] = $data['mobileNo'];
            $updat['branch_id'] = $data['branch_id'];
            if ($data['demo_course_type'] == "Single Course") {
                if (!empty($data['courseName'])) {
                    $updat['department_id'] = $data['department'];
                    $updat['course_type'] = $data['demo_course_type'];
                    $updat['courseName'] = $data['courseName'];
                    $updat['startingCourse'] = $data['courseName'];
                }
            } else if ($data['demo_course_type'] == "Package") {
                if (!empty($data['packageName'])) {
                    $updat['department_id'] = $data['department'];
                    $updat['course_type'] = $data['demo_course_type'];
                    $updat['packageName'] = $data['packageName'];
                    $updat['startingCourse'] = $data['startingCourse'];
                    $pk = $this->cm->select_data("package", "package_name", $data['packageName']);
                    $course_all = $this->cm->view_all("course");
                    $pk_course = explode(",", $pk->course_ids);
                    $pkgc = "";
                    foreach ($course_all as $row) {
                        if ($row->status == 0) {
                            if (in_array($row->course_id, $pk_course)) {
                                $pkgc = $pkgc . "," . $row->course_name;
                            }
                        }
                    }
                    $updat['courseName'] = trim($pkgc, ",");
                }
            }
            $updat['faculty_id'] = $data['faculty_id'];
            $updat['fromTime'] = $data['fromTime'];
            $updat['toTime'] = $data['toTime'];
            $demo_id = $data['demo_id'];
            $redemo = $this->enq->update_data("demo", $updat, "demo_id", $demo_id);
            if ($redemo) {
                $_SESSION['sts_msg'] = "Demo update Successfully";
                redirect('welcome/viewDemo/as');
            }
        }
        if (!empty($this->input->post('submit_followup_edit'))) {
            $data = $this->input->post();
            $follwup_id = $data['update_id'];
            $ins_follwp['follwup_by'] = $_SESSION['user_name'];
            $ins_follwp['follwup_interestLevel'] = $data['follwup_interestLevel'];
            $ins_follwp['follwup_interestRating'] = $data['follwup_interestRating'];
            $ins_follwp['follwup_studentResponse'] = $data['follwup_studentResponse'];
            $ins_follwp['follwup_action'] = $data['follwup_action'];
            $ins_follwp['follwup_mode'] = $data['follwup_mode'];
            $ins_follwp['next_followup'] = $data['enquiry_next_followp'];
            $ins_follwp['follwup_comment'] = $data['follwup_comment'];
            $re = $this->enq->update_data("enquiry_follwup", $ins_follwp, "follwup_id", $follwup_id);
            $enquiry_id = $data['enquiry_id'];
            $nextfdate = explode(" ", $data['enquiry_next_followp']);
            $upddata['enquiry_next_followp_date'] = $nextfdate[0];
            $upddata['enquiry_next_followp'] = $data['enquiry_next_followp'];
            $upddata['enquiry_follwup_interestRating'] = $data['follwup_interestRating'];
            $upddata['enquiry_follwup_interestLevel'] = $data['follwup_interestLevel'];
            $upddata['enquiry_follwup_studentResponse'] = $data['follwup_studentResponse'];
            $upddata['enquiry_follwup_action'] = $data['follwup_action'];
            $upddata['enquiry_follwup_mode'] = $data['follwup_mode'];
            $upddata['enquiry_follwup_comment'] = $data['follwup_comment'];
            $upddata['follwup_by'] = $_SESSION['user_name'];
            $res = $this->enq->update_data("enquiry", $upddata, "enquiry_id", $enquiry_id);
            if ($re) {
                $demo_id = $data['demo_id'];
                $_SESSION['edit_msg'] = "Follwup Updated";
                redirect('Enquiry/demoView/' . $demo_id);
            }
        }
        if (!empty($this->input->post('submit_edit'))) {
            $data = $this->input->post();
            $insdata = array();
            $insdata['enquiry_name'] = $data['fname'] . " " . $data['lname'];
            $insdata['enquiry_email'] = $data['enquiry_email'];
            $insdata['enquiry_number'] = $data['enquiry_number'];
            $insdata['enquiry_city'] = $data['enquiry_city'];
            $insdata['enquiry_area'] = $data['enquiry_area'];
            $insdata['enquiry_course_type'] = $data['enquiry_course_type'];
            $insdata['enquiry_category'] = $data['enquiry_category'];
            if ($data['enquiry_course_type'] == "Single Course") {
                $insdata['enquiry_courseName'] = implode(",", $data['enquiry_courseName']);
                $insdata['enquiry_packageName'] = "";
            }
            if ($data['enquiry_course_type'] == "Package") {
                $insdata['enquiry_packageName'] = implode(",", $data['enquiry_packageName']);
                $insdata['enquiry_courseName'] = "";
            }
            $insdata['enquiry_sourceType'] = $data['enquiry_sourceType'];
            $insdata['enquiry_referredByName'] = $data['enquiry_referredByName'];
            $insdata['enquiry_referredByMobile'] = $data['enquiry_referredByMobile'];
            $insdata['enquiry_update_timestamp'] = date('Y-m-d h:i:s', time());
            $enquiry_id = $data['update_id'];
            $demo_id = $data['demo_id'];
            $re = $this->enq->update_data("enquiry", $insdata, "enquiry_id", $enquiry_id);
            if ($re) {
                $_SESSION['edit_msg'] = "Enquiry Updated";
                redirect('Enquiry/demoView/' . $demo_id);
            }
        }
        $display['select_demo'] = $this->cm->select_data("demo", "demo_id", $demo_id);
        $enquiry_id = $display['select_demo']->enquiry_id;
        $display['select_enquiry'] = $this->cm->select_data("enquiry", "enquiry_id", $enquiry_id);
        $display['select_remarks'] = $this->enq->filter_remarks("demo_remark", "demo_id", $demo_id);
        //  print_r($display['select_remarks']); die();
        $display['select_followup'] = $this->enq->filter_followup("enquiry_follwup", "enquiry_id", $enquiry_id);
        $display['all_department'] = $this->enq->view_all("department");
        $display['all_branch'] = $this->cm->view_all("branch");
        $display['all_user'] = $this->cm->view_all("user");
        $display['all_cancel_reason_list'] = $this->cm->view_all("cancel_reason_list");
        $display['all_country'] = $this->enq->view_all("country");
        $display['all_state'] = $this->enq->view_all("state");
        $display['all_city'] = $this->enq->view_all("cities");
        $display['all_area'] = $this->enq->view_all("city_area");
        $display['all_source'] = $this->enq->view_all("source");
        $display['all_package'] = $this->enq->view_all("rnw_package");
        $display['all_course'] = $this->enq->view_all("rnw_course");
        $display['all_faculty'] = $this->enq->view_all("faculty");
        $display['all_list_followup_action'] = $this->enq->view_all("list_followup_action");
        $display['all_list_follow_up_mode'] = $this->enq->view_all("list_follow_up_mode");
        $display['all_list_interest_level'] = $this->enq->view_all("list_interest_level");
        $display['all_list_school'] = $this->enq->view_all("list_school");
        $display['all_list_student_response'] = $this->enq->view_all("list_student_response");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('enquiry/demo_view', $display);
    }
    public function discardDemo() {
        $data = $this->input->post();
        if (!empty($data['demo_id'])) {
            $demo_id = $data['demo_id'];
            $dupd['discard'] = 1;
            $dupd['demo_discard_by'] = $_SESSION['user_name'];
            $dupd['demo_discard_reason'] = $data['enquiry_trashed_reason'];
            $dupd['demo_discard_comment'] = $data['enquiry_cancel_reason'];
            $dupd['demo_discard_timestamp'] = date("Y-m-d") . " " . date("h:i:s");
            $resdemo = $this->enq->update_data("demo", $dupd, "demo_id", $demo_id);
        }
        if (!empty($data['enquiry_id'])) {
            $enquiry_id = $data['enquiry_id'];
            $upd['enquiry_trash'] = 1;
            $upd['enquiry_trashed_by'] = $_SESSION['user_name'];
            $upd['enquiry_trashed_reason'] = $data['enquiry_trashed_reason'];
            $upd['enquiry_cancel_reason'] = $data['enquiry_cancel_reason'];
            $upd['enquiry_update_timestamp'] = date("Y-m-d") . " " . date("h:i:s");
            $re = $this->enq->update_data("enquiry", $upd, "enquiry_id", $enquiry_id);
        }
        if ($resdemo) {
            $_SESSION['sts_msg'] = "Demo & Enquiry Discard Successfully";
            redirect('welcome/viewDemo/as');
        }
    }
    public function demo_discard_list() {
        if (!empty($_SESSION['sts_msg'])) {
            $display['sts_msg'] = $_SESSION['sts_msg'];
            unset($_SESSION['sts_msg']);
        }
        if (!empty($this->input->get('action')) && !empty($this->input->get('id'))) {
            $id = $this->input->get('id');
            if ($this->input->get('action') == "delete") {
                if ($this->input->get('status') == 0) {
                    $st['discard'] = 1;
                }
                if ($this->input->get('status') == 1) {
                    $st['discard'] = 0;
                }
                $re = $this->cm->update_data("demo", $st, "demo_id", $id);
                if ($re) {
                    redirect('welcome/viewDemo/' . $vs);
                }
            }
        }
        $display['demo_all'] = $this->cm->view_all_demo("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['course_all'] = $this->cm->view_all("course");
        $display['reason_list'] = $this->cm->view_all("cancel_reason_list");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['collapse'] = 1;
        $this->load->view('header', $update);
        $this->load->view('enquiry/demo_discard', $display);
    }
    public function Reassign_student() {
        $shining_sheet_id = $this->input->post('shining_sheet_id');
        $admission_id = $this->input->post('admission_id');
        $gr_id = $this->input->post('gr_id');
        $course_orpackage_id = $this->input->post('course_orpackage_id');
        // $encodedUrl = urlencode($html_url);
        $s_id = strtr(base64_encode($this->input->post('shining_sheet_id')), '+/=', '._-');
        $a_id = strtr(base64_encode($this->input->post('admission_id')), '+/=', '._-');
        $g_id = strtr(base64_encode($this->input->post('gr_id')), '+/=', '._-');
        $cp_id = strtr(base64_encode($this->input->post('course_orpackage_id')), '+/=', '._-');
        $all_record_admission = $this->admi->get_admission_record('admission_process', 'admission_id', $admission_id);
        foreach ($all_record_admission as $key => $value) {
        }
        if (isset($value)) {
            $email_record = $value->email;
            $emailconfigration = $this->admi->email_configration_daynamic('email_settings');
            foreach ($emailconfigration as $key) {
                if ($key->email_type == "1") {
                    $Protocol = $key->encryption;
                    $HostName = $key->host;
                    $SmtpPortNo = $key->port;
                    $SmtpUser = $key->email;
                    $SmtpPass = $key->password;
                    $config = array('protocol' => $Protocol, 'smtp_host' => $HostName, 'smtp_port' => $SmtpPortNo, 'smtp_user' => $SmtpUser, 'smtp_pass' => $SmtpPass, 'mailtype' => 'html', 'charset' => 'utf-8');
                    $this->load->library('email');
                    $this->email->initialize($config);
                }
                if ($key->email_type == "2") {
                    $fromemail = $key->email;
                    $from = $fromemail;
                }
            }
            $to = $email_record;
            $subject = "Shining Sheet Topic";
            $message = "https://demo.rnwmultimedia.com/assign_student/re_assign_student.php?shining_sheet_id=$s_id&admission_id=$a_id&gr_id=$g_id&course_orpackage_id=$cp_id";
            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->send();
        }
    }
}
?>