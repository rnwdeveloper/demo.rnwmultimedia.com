<?php
class Bulk_LeadController extends CI_controller {
    function __construct() {
        @parent::__construct();
        $this->load->helper("url");
        $this->load->model("Dbcommon", "cm");
        $this->load->model('Bulk_LeadModel');
        $this->load->library('excel');
        $this->load->library("pagination");
        $this->load->library('email');
        $this->load->library('session');
        $this->load->helper('loggs');
        $this->load->helper('urldata');
    }
    public function Bulk_lead($id = "") {
        logdata("bulk lead page open");
        $config = array();
        $config["base_url"] = base_url() . "Bulk_LeadController/Bulk_lead";
        $config["total_rows"] = $this->Bulk_LeadModel->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $display["results"] = $this->Bulk_LeadModel->fetch_bulk_lead($config["per_page"], $page);
        $display["links"] = $this->pagination->create_links();
        $display["user_all"] = $this->cm->view_all("user");
        $display["hod_all"] = $this->cm->view_all("hod");
        $display["faculty_all"] = $this->cm->view_all("faculty");
        $display['select_followup'] = $this->Bulk_LeadModel->filter_followup("bulk_lead", "id", $id);
        if (!empty($this->input->post('filter_bulk_lead'))) {
            $filter = $this->input->post();
            $display["all_bulk_lead"] = $this->Bulk_LeadModel->view_all_Bulk_lead("bulk_lead", $filter);
            $display['filter_startDate'] = @$filter['filter_startDate'];
            $display['filter_endDate'] = @$filter['filter_endDate'];
            $display['filter_fname'] = @$filter['filter_fname'];
            $display['filter_lname'] = @$filter['filter_lname'];
            $display['filter_email'] = @$filter['filter_email'];
            $display['filter_mobile'] = @$filter['filter_mobile'];
            $display['filter_source'] = @$filter['filter_source'];
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
            logdata("Bulk lead search");
        } else {
            // echo "<pre>";
            // print_r($_SESSION);
            // die;
            if ($_SESSION['logtype'] == "Super Admin") {
                $display["all_bulk_lead"] = $this->Bulk_LeadModel->view_all_Bulk_lead("bulk_lead");
            } else {
                $display["all_bulk_lead"] = $this->Bulk_LeadModel->view_all_Bulk_lead_user("bulk_lead", "assign_to", $_SESSION['user_name']);
            }
        }
        // $display['all_bulk_lead'] = $this->cm->view_all("bulk_lead");
        // $display["all_bulk_lead"] = $this->Bulk_LeadModel->filter_followup("bulk_lead","id",$id);
        $display["all_assignData"] = $this->Bulk_LeadModel->view_all_assignData("bulk_lead");
        $display["all_assignnewData"] = $this->Bulk_LeadModel->view_all_today("bulk_lead");
        $display["all_assignOldData"] = $this->Bulk_LeadModel->view_all_olddata("bulk_lead");
        $display['all_source'] = $this->cm->view_all("source");
        $display['all_user'] = $this->cm->view_all("user");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('Bulk_lead', $display);
    }
    public function import() {
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2;$row <= $highestRow;$row++) {
                    $name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $email = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $father_name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $contact_no = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $father_contact_no = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $source_type = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $school_collage = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $occupation = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $Intersting_field = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $area = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $priority = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $intresting_rating = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    $address = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                    $other_remark = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                    $time_stemp = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                    $data[] = array('name' => $name, 'email' => $email, 'father_name' => $father_name, 'contact_no' => $contact_no, 'father_contact_no' => $father_contact_no, 'source_type' => $source_type, 'school_collage' => $school_collage, 'occupation' => $occupation, 'intersting_field' => $Intersting_field, 'area' => $area, 'priority' => $priority, 'intresting_rating' => $intresting_rating, 'address' => $address, 'other_remark' => $other_remark, 'time_stemp' => $time_stemp);
                }
            }
            $this->Bulk_LeadModel->insert($data);
            $data['ins_msg'] = "insert data success";
            redirect(base_url('Bulk_LeadController/Bulk_lead'));
        }
    }
    public function delete_fun($id) {
        $item = $this->cm->delete_item($id);
        redirect(base_url('Bulk_LeadController/Bulk_lead'));
    }
    public function update_User_Data() {
        //$id=$this->input->get('id');
        // echo "<pre>";
        // print_r($id);
        if ($this->input->post('update')) {
            $data = $this->input->post();
            for ($i = 0;$i < $data['assign_day'];$i++) {
                //$dall[] = date("Y-m-d", strtotime("+ $i day")); // aaj ni and kal ni date pade
                $dall = date("Y-m-d", strtotime("+ $i day"));
            }
            //  echo "<pre>";
            // print_r($dall);
            // die();
            // echo 	date("Y-m-d", strtotime("+ 1 day"));
            // die;
            $id = $data['id'];
            $id_all = explode(',', $id);
            $ins = $data['assign_to'];
            $all = $this->Bulk_LeadModel->view_all('user', "name", $ins);
            // $all = $this->Bulk_LeadModel->view_all('hod',"name",$ins);
            // $all = $this->Bulk_LeadModel->view_all('faculty',"name",$ins);
            // echo "<pre>";
            //    print_r($id_all);
            //echo $all[0]->name;
            $main['assign_to'] = $all[0]->name;
            $main['assign_status'] = 1;
            $main['assign_date'] = $dall;
            //$main['assign_date'] = implode(',', $dall);
            // print_r($data);
            // die();
            //echo "CI_controller" .$a;
            foreach ($id_all as $key => $value) {
                # code...
                $re = $this->Bulk_LeadModel->update_data("bulk_lead", $main, "id", $value);
            }
            if ($re) {
                $_SESSION['edit_msg'] = "Updated";
                redirect(base_url('Bulk_LeadController/Bulk_lead'));
            }
        }
    }
    public function Bulk_lead_assign() {
        if (!empty($_SESSION['edit_msg'])) {
            $display['msg'] = $_SESSION['edit_msg'];
            unset($_SESSION['edit_msg']);
        }
        if ($_SESSION['logtype'] == "Super Admin") {
            $display["all_assignData"] = $this->Bulk_LeadModel->view_all_assignData("bulk_lead");
        } else {
            $display["all_assignData"] = $this->Bulk_LeadModel->view_all_Bulk_lead_user("bulk_lead", "assign_to", $_SESSION['user_name']);
        }
        $display["all_assignnewData"] = $this->Bulk_LeadModel->view_all_today("bulk_lead");
        $display["all_assignOldData"] = $this->Bulk_LeadModel->view_all_olddata("bulk_lead");
        $display["all_bulk_lead"] = $this->Bulk_LeadModel->view_all_Bulk_lead("bulk_lead");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('Bulk_lead_assign', $display);
    }
    public function Bulk_lead_assignNew() {
        if (!empty($_SESSION['edit_msg'])) {
            $display['msg'] = $_SESSION['edit_msg'];
            unset($_SESSION['edit_msg']);
        }
        if ($_SESSION['logtype'] == "Super Admin") {
            $display["all_assignnewData"] = $this->Bulk_LeadModel->view_all_today("bulk_lead");
        } else {
            $display["all_assignnewData"] = $this->Bulk_LeadModel->view_all_Bulk_lead_user("bulk_lead", "assign_to", $_SESSION['user_name']);
        }
        $display["all_assignData"] = $this->Bulk_LeadModel->view_all_assignData("bulk_lead");
        $display["all_assignOldData"] = $this->Bulk_LeadModel->view_all_olddata("bulk_lead");
        $display["all_bulk_lead"] = $this->Bulk_LeadModel->view_all_Bulk_lead("bulk_lead");
        // echo "<pre>";
        // print_r($display["all_assignoldData"]);
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('Bulk_lead_assignNew', $display);
    }
    public function Bulk_lead_assignOld() {
        if (!empty($_SESSION['edit_msg'])) {
            $display['msg'] = $_SESSION['edit_msg'];
            unset($_SESSION['edit_msg']);
        }
        if ($_SESSION['logtype'] == "Super Admin") {
            $display["all_assignOldData"] = $this->Bulk_LeadModel->view_all_olddata("bulk_lead");
        } else {
            $display["all_assignOldData"] = $this->Bulk_LeadModel->view_all_Bulk_lead_user("bulk_lead", "assign_to", $_SESSION['user_name']);
        }
        $display["all_assignnewData"] = $this->Bulk_LeadModel->view_all_today("bulk_lead");
        $display["all_assignData"] = $this->Bulk_LeadModel->view_all_assignData("bulk_lead");
        $display["all_bulk_lead"] = $this->Bulk_LeadModel->view_all_Bulk_lead("bulk_lead");
        // echo "<pre>";
        // print_r($display["all_assignoldData"]);
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('Bulk_lead_assignOld', $display);
    }
    function download_excel() {
        header('Content-Type: application/vnd.ms-excel');
        header('Content-disposition: attachment; filename=' . rand() . '.xls');
        echo $_POST["data"];
    }
    // public function Bulk_lead_view($id="")
    // {
    //     if(!empty($_SESSION['edit_msg']))
    //     {
    //         $display['msg'] = $_SESSION['edit_msg'];
    //         unset($_SESSION['edit_msg']);
    //     }
    //    	$display['select_followup'] = $this->Bulk_LeadModel->filter_followup("bulk_lead","id",$id);
    //    	$display["all_bulk_lead"] = $this->cm->view_all("bulk_lead");
    // 	$update['upd_faculty'] = $this->cm->view_all("faculty");
    // 	$update['upd_branch'] = $this->cm->view_all("branch");
    // 	$update['upd_see'] = $this->cm->check_update("demo");
    // 	$this->load->view('header',$update);
    // 	$this->load->view('Bulk_lead_view',$display);
    // }
    // public function send_mail() {
    //     $from_email = "rnw1.devloping@gmail.com";
    //     $to_email = $this->input->post('email');
    //Load email library
    // $this->load->library('email');
    // 	$config = array(
    //     'protocol'  => 'smtp',
    //     'smtp_host' => 'smtp.gmail.com',
    //     'smtp_port' => 465,
    //     'smtp_user' => 'rnw1.devloping@gmail.com',
    //     'smtp_pass' => 'Ayush#@!1999',
    //     // 'smtp_user' => 'piyush0101nakarani@gmail.com',
    //     // 'smtp_pass' => '0101Piyush!@#0101',
    //     'mailtype'  => 'html',
    //     'charset'   => 'utf-8'
    // );
    // $this->email->initialize($config);
    // $this->email->set_mailtype("html");
    // $this->email->set_newline("\r\n");
    //     $this->email->from('rnw1.devloping@gmail.com');
    //     $this->email->to('rnw1.devloping@gmail.com');
    //     $this->email->subject('Send Email Codeigniter');
    //     $this->email->message('The email send using codeigniter library');
    //     //Send mail
    //     if($this->email->send())
    //         $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
    //     else
    //      $this->session->set_flashdata("email_sent","You have encountered an error");
    //      redirect(base_url('Bulk_LeadController/Bulk_lead'));
    // }
    public function bulk_lead_list() {
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('Bulk_lead_list');
    }
    public function send_mail() {
        // $rec =  array('status'=>0);
        // $data['record'] = $this->cm->get_company_record('company_detail','company_id',$id);
        // // echo "<pre>";
        // $email = $data['record']->email_id;
        // exit;
        $this->load->library('email');
        $config = array('protocol' => 'smtp', 'smtp_host' => 'smtp.gmail.com', 'smtp_port' => 465, 'smtp_user' => 'spintoearn123@gmail.com', 'smtp_pass' => 'spintoearn12325102514',
        // 'smtp_user' => 'piyush0101nakarani@gmail.com',
        // 'smtp_pass' => '0101Piyush!@#0101',
        'mailtype' => 'html', 'charset' => 'utf-8');
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        //Email content
        $htmlContent = '<p style="text-align: center;"><strong>Red & White Group Of institute</strong></p>

				<p><span style="font-weight: 400;">Hello, Recruiter Account De-Activate By Admin </span></p>

				<p><span style="font-weight : 400;">Please Contact Administrator</span></p>

				<p><a href="http://localhost/rnw_placement/index.php/recruiter/index">Go To Portal</a></p>

				<h5 style="text-align: right;"><strong>Thank You.<br /></strong>Red & White Group of Institute<br />www.RNWMULTIMEDIA.com<strong><br /></strong></h5>

      			';
        $this->email->to('spintoearn123@gmail.com');
        $this->email->from('spintoearn123@gmail.com', 'Placement Portal');
        $this->email->subject('Terms & Agreement');
        $this->email->message($htmlContent);
        //Send email
        if ($this->email->send()) $this->session->set_flashdata("email_sent", "Congragulation Email Send Successfully.");
        else $this->session->set_flashdata("email_sent", "You have encountered an error");
        redirect(base_url('Bulk_LeadController/Bulk_lead'));
    }
    // 	public function send_mail()
    // 	{
    //  		$this->load->library('email');
    // 	$config = array(
    // 	    'protocol'  => 'smtp',
    // 	    'smtp_host' => 'smtp.gmail.com',
    // 	    'smtp_port' => 465,
    // 	    'smtp_user' => 'spintoearn123@gmail.com',
    // 	    'smtp_pass' => 'spintoearn12325102514',
    // 	    // 'smtp_user' => 'piyush0101nakarani@gmail.com',
    // 	    // 'smtp_pass' => '0101Piyush!@#0101',
    // 	    'mailtype'  => 'html',
    // 	    'charset'   => 'utf-8'
    // 	);
    // 	$this->email->initialize($config);
    // 	$this->email->set_mailtype("html");
    // 	$this->email->set_newline("\r\n");
    // 	//Email content
    // 	$htmlContent = '<p style="text-align: center;"><strong>Red & White Group Of institute</strong></p>
    // 	<p><span style="font-weight: 400;">Hello, '.$res.'</span></p>
    // 	<p><a href="http://localhost/rnw_placement/index.php/student/index">Go To Portal</a></p>
    // 	<h5 style="text-align: right;"><strong>Thank You.<br /></strong>Red & White Group of Institute<br />www.RNWMULTIMEDIA.com<strong><br /></strong></h5>
    //    			';
    // 	$this->email->to($email_email_idid);
    // 	$this->email->from($email_id,'Placement Portal');
    // 	$this->email->subject('Terms & Agreement');
    // 	$this->email->message($htmlContent);
    // 	//Send email
    // 	if($this->email->send())
    //       		 $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
    //  	    	 else
    //        		$this->session->set_flashdata("email_sent","You have encountered an error");
    //  	        redirect(base_url('Bulk_LeadController/Bulk_lead'));
    // }
    //
    //  	$re = $this->cm->give_to_student_response('student_applied_job',$data['add_jobpost'],$data['add_company'],$record);
    //  	if($re)
    //  	{
    //  		$this->session->set_flashdata('msg','Response add Successfully');
    //  		redirect('recruiter/view_all_application/'.$data['add_company']."/".$data['add_jobpost']);
    //  	}
    //  	else
    //  	{
    // $this->session->set_flashdata('msg','Something Wrong');
    //  		redirect('recruiter/view_all_application/'.$data['add_company']."/".$data['add_jobpost']);
    //  	}
    
}
?>



	