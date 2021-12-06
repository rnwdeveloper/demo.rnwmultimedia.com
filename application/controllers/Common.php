<?php
class Common extends CI_controller
{
	public $newRecord;
	public $AllRecord;
    public $newfollowupRecord;
    public $activeRecord;
    public $postponeRecord;
    public $confirmRecord;
    public $discardRecord;  
    public $job_pending;
    public $job_active;
    public $job_deactive; 
    public $all_jobs;  
    public $wpf;
	function __construct()
	{
		@parent::__construct();
		$this->load->model("Dbcommon", "cm");
		$this->load->model("AdminSettingsModel", "admin");
		$this->load->model("Quickadmissionprocess", "admi");
		$this->load->model("CommonModel", "co");
		$this->load->model("Task", "tm");
		$this->load->model("EnquiryModal", "enq");
		$this->load->library("pagination");
		$this->load->model('GoogleModel');
		$this->load->library('email');
		// $this->load->library('pdf');
		$this->load->helper('cookie');
		$this->load->library('upload');
		$this->load->library('session');
		$this->perPage = 10;
		Header('Access-Control-Allow-Origin: *'); 
		Header('Access-Control-Allow-Headers: *'); 
		Header('Access-Control-Allow-Methods: POST, OPTIONS, PUT, DELETE'); 
		if(@$_SESSION['logtype'] == 'Manager' || @$_SESSION['logtype'] == "Super Admin") {
            $curDate = date('m-d-Y');
            $this->AllRecord = $this->cm->get_new_record_all_student('application_job');
            $this->newRecord = $this->cm->get_new_record_all_student('application_job', '0', 'application_status');
            $this->newfollowupRecord = $this->cm->get_new_record_all_student('application_job', '5', 'application_status', 'next_followup_date', $curDate);
            $this->activeRecord = $this->cm->get_new_record_all_student('application_job', '1', 'application_status');
            $this->activefollowupRecord = $this->cm->get_new_record_all_student('application_job', '6', 'application_status', 'next_followup_date', $curDate);
            $this->postponeRecord = $this->cm->get_new_record_all_student('application_job', '3', 'application_status');
            $this->confirmRecord = $this->cm->get_new_record_all_student('application_job', '2', 'application_status');
            $this->wpf = $this->cm->get_new_record_all_student('application_job', '7', 'application_status');
            $this->discardRecord = $this->cm->get_new_record_all_student('application_job', '4', 'application_status');
        } else {
            $userName = $_SESSION['Admin']['username'];
            $this->AllRecord = $this->cm->get_new_record_all_student('application_job');
            $this->newRecord = $this->cm->get_new_record('application_job', '0', 'application_status', 'assign_faculty', $userName);
            $this->activeRecord = $this->cm->get_new_record('application_job', '1', 'application_status', 'assign_faculty', $userName);
            $this->postponeRecord = $this->cm->get_new_record('application_job', '3', 'application_status', 'assign_faculty', $userName);
            $this->confirmRecord = $this->cm->get_new_record('application_job', '2', 'application_status', 'assign_faculty', $userName);
            $this->discardRecord = $this->cm->get_new_record('application_job', '4', 'application_status', 'assign_faculty', $userName);
        }
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

	public function managementForm()
	{
		$update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");
		$update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");
		$update['p_module'] = $this->cm->view_all("p_module");
		$update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
		$update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
		$update['course_completed'] = $this->cm->course_completed_student("admission_courses");
		$update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
		$update['course_data'] = $this->cm->view_all("course");
		$update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");

		$display['branch_all'] = $this->cm->view_all_data("branch");
		$display['state_all'] = $this->cm->view_all("state");
		$display['city_all'] = $this->cm->view_all("cities");
		$display['user_all'] = $this->cm->Role_all_admin("user");

		$display['form_all'] = $this->cm->get_management_forms("form_list");

		if ($_SESSION['logtype'] == "Super Admin") {
			$display['log_all'] = $this->cm->filter_data("logtype", "parent_id", "0");
		} else {
			$display['log_all'] = $this->tm->view_all("logtype");
		}

		$this->load->view('erp/erpheader', $update);
		$this->load->view('common/managementForm', $display);
	}

	public function ajax_form_submit()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();

			// echo "<pre>";
		//     print_r($data);
			//     exit;
			$trimmed_array = array_map('trim', $data['logall']);
			$data['permission'] = implode(",", $trimmed_array);
			$data['admin_id'] = $_SESSION['admin_id'];

			unset($data['submit']);
			unset($data['logall']);
			unset($data['table1_length']);

			$config['allowed_types'] = "*";
			$config['upload_path'] = FCPATH . "dist/signsheet/";
			$new_name = time() . @$_FILES["form_file"]['name'];
			$config['file_name'] = $new_name;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('form_file')) {
				$imagedata = $this->upload->data();
				$data['form_file'] = $imagedata['file_name'];
				$config['image_library'] = 'gd2';
				$config['source_image'] = './dist/signsheet/' . $imagedata['file_name'];
				$config['new_image'] = './dist/signsheet/';
				$config['maintain_ratio'] = TRUE;
				$config['width']    = 640;
				$config['height']   = 480;

				$this->load->library('image_lib', $config);

				if (!$this->image_lib->resize()) {
					echo $this->image_lib->display_errors();
				} else {
					// echo "success"; 
				}
			} else {
				$error = array('error' => $this->upload->display_errors());
				$display['msgp'] = "image not uploaded";
			}
			if ($this->input->post('update_id')) {
				// echo "<pre>";
				// print_r($data);
				// exit;
				$id = $this->input->post('update_id');
				unset($data['update_id']);
				$query = $this->admin->update_record('form_list', $data, 'form_id', $id);
				if ($query) {
					$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			} else {
				unset($data['update_id']);
				$query = $this->cm->insert_data("form_list", $data);
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

	

	public function get_record()
	{
		$id = $this->input->post('id');
		$table = $this->input->post('table');
		$field = $this->input->post('field');
		//print_r($this->input->post()); exit;
		$record['single_record'] = $this->admin->get_reco($table, $field, $id);
		echo json_encode($record);
	}

	public function Multiple_rowremove()
	{
		$data = $this->input->post();

		$status_check = 1;

		for ($i = 0; $i < sizeof($data['ids']); $i++) {
			$result = $this->co->delete_data('form_list', 'form_id', $data['ids'][$i]);

			if ($result) {
				$status_check = 1;
			} else {
				$status_check = 0;
			}
		}

		if ($status_check == 1) {
			$record = array('status' => 1, "msg" => "These Records Deleted");
			$recp['all_record'] = $record;
			echo json_encode($recp);
		} else {
			$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp);
		}
	}

	public function hardware()
	{
		$update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");
		$update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");
		$update['p_module'] = $this->cm->view_all("p_module");
		$update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
		$update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
		$update['course_completed'] = $this->cm->course_completed_student("admission_courses");
		$update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
		$update['course_data'] = $this->cm->view_all("course");
		$update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");


		$display['branch_all'] = $this->cm->view_all_data("branch");
		$display['state_all'] = $this->cm->view_all("state");
		$display['city_all'] = $this->cm->view_all("cities");
		$display['user_all'] = $this->cm->Role_all_admin("user");

		$display['hardware'] = $this->co->Hardwareall_data();
		$display['all_hardwarecompany'] = $this->cm->view_all('hardwarecompany');
		$display['all_hardwarecategory'] = $this->cm->view_all('hardwarecategory');

		if ($this->input->post('save')) {
			$company = $this->input->post('company');
			$data = array("company" => $company);
			//print_r($company); die();
			$this->co->insert("hardwarecompany", $data);
		}

		$this->load->view('erp/erpheader', $update);
		$this->load->view('common/hardware', $display);
	}

	public function ajax_company_submit()
	{
		if ($this->input->post('save')) {
			$data = $this->input->post();
			unset($data["hardwarecompany_id"]);
			unset($data["save"]);

			$query = $this->co->insert("hardwarecompany", $data);
			if ($query) {
				$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
				echo json_encode($recp); // echo "1";
			} else {
				$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
				echo json_encode($recp); // echo "2";
			}
		}
	}

	public function ajax_category_submit()
	{
		if ($this->input->post('save')) {
			$data = $this->input->post();
			unset($data["hardwarecategory_id"]);
			unset($data["save"]);

			$query = $this->co->insert("hardwarecategory", $data);
			if ($query) {
				$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
				echo json_encode($recp); // echo "1";
			} else {
				$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
				echo json_encode($recp); // echo "2";
			}
		}
	}

	public function ajax_hardware_submit()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();
			$data['admin_id'] = $_SESSION['admin_id'];
			unset($data['submit']);
			if ($this->input->post('update_id')) {
				$id = $this->input->post('update_id');
				unset($data['update_id']);
				$query = $this->admin->update_record('hardware', $data, 'hardware_id', $id);
				if ($query) {
					$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			} else {
				unset($data['update_id']);
				$query = $this->cm->insert_data("hardware", $data);
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
	public function delete_record()
	{
		$table = $this->input->post('table');
		$field = $this->input->post('field');
		$id = $this->input->post('id');
		$query = $this->co->delete_record($table, $field, $id);
		if ($query) {
			$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Deleted");
			echo json_encode($recp); // echo "1";
		} else {
			$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
			echo json_encode($recp); // echo "2";
		}
	}

	public function terms_conditions()
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


		$display['branch_all'] = $this->cm->view_all_data("branch");
		$display['state_all'] = $this->cm->view_all("state");
		$display['city_all'] = $this->cm->view_all("cities");
		$display['user_all'] = $this->cm->Role_all_admin("user");

		$display['all_termsconditions'] = $this->co->all_termsconditions();
		$display['all_termsconditions_category'] = $this->cm->view_all('termsconditions_category');

		$this->load->view('erp/erpheader', $update);
		$this->load->view('common/terms_conditions', $display);
	}

	public function ajax_tc_category_submit()
	{
		if ($this->input->post('save')) {
			$data = $this->input->post();
			unset($data["Tc_Category_id"]);
			unset($data["save"]);

			$query = $this->co->insert("termsconditions_category", $data);
			if ($query) {
				$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
				echo json_encode($recp); // echo "1";
			} else {
				$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
				echo json_encode($recp); // echo "2";
			}
		}
	}

	public function ajax_tc_submit()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();

			// echo "<pre>";
			//     print_r($_FILES);
			//     exit;

			$data['admin_id'] = $_SESSION['admin_id'];

			unset($data['submit']);
			unset($data['logall']);
			unset($data['table1_length']);

			$config['allowed_types'] = "*";
			$config['upload_path'] = FCPATH . "dist/termsconditions/";
			$new_name = time() . @$_FILES["tc_file"]['name'];
			$config['file_name'] = $new_name;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('tc_file')) {
				$imagedata = $this->upload->data();
				$data['tc_file'] = $imagedata['file_name'];
				$config['image_library'] = 'gd2';
				$config['source_image'] = './dist/termsconditions/' . $imagedata['file_name'];
				$config['new_image'] = './dist/termsconditions/';
				// $config['maintain_ratio'] = TRUE;
				// $config['width']    = 640;
				// $config['height']   = 480;

				$this->load->library('image_lib', $config);

				if (!$this->image_lib->resize()) {
					echo $this->image_lib->display_errors();
				} else {
					// echo "success"; 
				}
			} else {
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
				exit;
				$display['msgp'] = "image not uploaded";
			}
			if ($this->input->post('update_id')) {
				// echo "<pre>";
				// print_r($data);
				// exit;
				$id = $this->input->post('update_id');
				unset($data['update_id']);
				$query = $this->co->update_record('termsconditions', $data, 'id', $id);
				if ($query) {
					$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			} else {
				unset($data['update_id']);
				$query = $this->cm->insert_data("termsconditions", $data);
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

	public function log_history()
	{
		//logdata("Log history page open");
		if (!empty($this->input->post('search_l'))) {

			$data = $this->input->post();
			$uda = $this->cm->select_data("user", "user_id", $data['user_id']);
			$fda = $this->cm->select_data("faculty", "faculty_id", $data['faculty_id']);
			$hda = $this->cm->select_data("hod", "hod_id", $data['hod_id']);
			$data['u_name'] = (!empty($uda->name)) ? $uda->name : "";
			$data['f_name'] = (!empty($fda->name)) ? $fda->name : "";
			$data['h_name'] = (!empty($hda->name)) ? $hda->name : "";
			$data['sdate'] = (!empty($data['sdate'])) ? date('d-m-Y', strtotime($data['sdate'])) : "";
			$data['edate'] = (!empty($data['edate'])) ? date('d-m-Y', strtotime($data['edate'] . "+1 days")) : "";
			$data['device'] = (!empty($data['device'])) ? $data['device'] : "";
			$data['browser'] = (!empty($data['browser'])) ? $data['browser'] : "";
			$all['filter_user_id'] = $data['user_id'];
			$all['filter_faculty_id'] = $data['faculty_id'];
			$all['filter_hod_id'] = $data['hod_id'];
			$all['filter_from_date'] = $data['sdate'];
			$all['filter_to_date'] = $data['edate'];
			$all['filter_device'] = $data['device'];
			$all['filter_browser'] = $data['browser'];
			//logdata(implode(',', $sdata) . " Log history search");
			if (!empty($data['sdate']) && !empty($data['edate'])) {
				$all['l_data'] = $this->cm->search_log_history("logger", $data);
			} else {
				$all['l_data'] = $this->cm->search_log_history_with_date("logger", $data);
			}
			// echo "<pre>";
			// print_r($all);
			// die;

		} else {
			$all['l_data'] = $this->cm->view_all_log_history();
		}

		$all['f_all'] = $this->cm->view_all("faculty");
		$all['u_all'] = $this->cm->view_all("user");
		$all['h_all'] = $this->cm->view_all("hod");

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

		// echo "<pre>";
		// print_r(isset($all['filter_from_date']));
		// 	print_r($all['l_data']);
		// exit;

		$this->load->view('erp/erpheader', $update);
		$this->load->view('common/log_history', $all);

		// $this->load->view('header_test', $display);
		// $this->load->view("user_history", $all);
		//$this->load->view("footer_test");

	}

	public function course_details()
	{
		if(!empty($this->input->post('filter_course'))) {
			$data = $this->input->post();
			$display['coursefilter'] = $this->cm->filter_course($data);
			$display['subdepartment_single_c'] = @$data['subdepartment_single_c'];
			$display['filter_single_course'] = @$data['filter_single_course'];
			$cname = $this->cm->select_data("rnw_subcourse", "course_id", $data['filter_single_course']);
			//logdata($cname->course_name . " Course detail search");
		}
		if(!empty($this->input->post('filter_package_course'))) {
			$data = $this->input->post();
			$display['packagefilter'] = $this->cm->filter_packages($data);
			$display['subdepartment'] = @$data['subdepartment'];
			$display['filter_package'] = @$data['filter_package'];
			$pname = $this->cm->select_data("rnw_package", "package_id", $data['filter_package']);
			logdata($pname->package_name . " Course Package search");
		}
		$display['department_all'] = $this->cm->view_all("department");
		$display['subdepartment_all'] = $this->cm->view_all("subdepartment");
		$display['package_all'] = $this->cm->view_all("package");
		$display['course_all'] = $this->co->view_all_by_order("rnw_course", "course_name", "asc");
		$display['list_subcourse'] = $this->co->view_all_by_order("rnw_subcourse", "subcourse_name", "asc");
		$display['package'] = $this->co->view_all_by_order("rnw_package", "package_name", "asc");
		$display['list_clg_course'] = $this->co->view_all_by_order("college_courses", "college_course_name", "asc");
		$display['subpackage'] = $this->cm->view_all("rnw_subpackage");
		$display['list_branch'] = $this->cm->view_all("branch");
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
		$this->load->view('common/course_details', $display);
	}

	public function get_subcourse(){
		$data = $this->input->post();
		$subcourse = $this->admi->get_reco_multiple('rnw_subcourse', 'course_id', $data['course_id']);
		echo '<option value="">Select Sub-Course</option>';
		foreach ($subcourse as $co) {
			if ($co->subcourse_status == "0") {
			?>
			<option value="<?php echo $co->subcourse_id; ?>"><?php echo $co->subcourse_name; ?></option>
			<?php
			}
		}
	}

	public function get_details() {
		//echo "<pre>";
		$data = $this->input->post();
		$subcourse_id = $this->input->post('subcourse_id');
		$details = $this->co->select_by_field('rnw_subcourse', "subcourse_id", $subcourse_id);
		$branch = $this->cm->view_all('branch');
		$department = $this->cm->view_all('department');
		$subdepartment = $this->cm->view_all('subdepartment');

		foreach ($details as $d) {
			$branch_ids = explode(",", $d->branch_id);
			$department_ids = explode(",", $d->department_id);
			$subdepartment_ids = explode(",", $d->subdepartment_id);
			$branch_name = [];
			$department_name = [];
			$subdepartment_name = [];

			foreach ($branch as $b) {
				if (in_array($b->branch_id, $branch_ids)) {
					array_push($branch_name, $b->branch_name);
				}
			}

			foreach ($department as $dept) {
				if (in_array($dept->department_id, $department_ids)) {
					array_push($department_name, $dept->department_name);
				}
			}

			foreach ($subdepartment as $s) {
				if (in_array($s->subdepartment_id, $subdepartment_ids)) {
					array_push($subdepartment_name, $s->subdepartment_name);
				}
			}

			$d->branch_name = implode(", ", $branch_name);
			$d->department_name = implode(",", $department_name);
			$d->subdepartment_name = implode(",", $subdepartment_name);
			//$d->shining_sheet = 'https://demo.rnwmultimedia.com/dist/signsheet/' + $d->shining_sheet;
		}

		echo json_encode($details);
	}

	public function get_package_details() {
		//echo "<pre>";
		$data = $this->input->post();
		$package_id = $this->input->post('package_id');
		$details = $this->co->selected_data('rnw_package', "package_id", $package_id);

		$courseDetails = $this->co->selected_data('rnw_subpackage', "package_id", $package_id);

		$branch = $this->cm->view_all('branch');
		$department = $this->cm->view_all('department');
		$subdepartment = $this->cm->view_all('subdepartment');
		$course = $this->cm->view_all('rnw_subcourse');

		$courseData = [];
		foreach ($courseDetails as $cd) {
			foreach($course as $c) {
				if ($c->subcourse_id === $cd->subcourse_id) {
					array_push($courseData, $c);
				}
			}
		}

		foreach ($details as $d) {
			$branch_ids = explode(",", $d->branch_id);
			$department_ids = explode(",", $d->department_id);
			$subdepartment_ids = explode(",", $d->subdepartment_id);
			$branch_name = [];
			$department_name = [];
			$subdepartment_name = [];

			foreach ($branch as $b) {
				if (in_array($b->branch_id, $branch_ids)) {
					array_push($branch_name, $b->branch_name);
				}
			}

			foreach ($department as $dept) {
				if (in_array($dept->department_id, $department_ids)) {
					array_push($department_name, $dept->department_name);
				}
			}

			foreach ($subdepartment as $s) {
				if (in_array($s->subdepartment_id, $subdepartment_ids)) {
					array_push($subdepartment_name, $s->subdepartment_name);
				}
			}

			$d->branch_name = implode(", ", $branch_name);
			$d->department_name = implode(",", $department_name);
			$d->subdepartment_name = implode(",", $subdepartment_name);
			$d->course_details = $courseData;

			//$d->shining_sheet = 'https://demo.rnwmultimedia.com/dist/signsheet/' + $d->shining_sheet;
		}
		// print_r($details);
		// exit;
		echo json_encode($details);
	}

	public function get_clg_details()
	{
		$data = $this->input->post();
		$college_courses_id = $this->input->post('college_courses_id');
		$details = $this->co->selected_data('college_courses', "college_courses_id", $college_courses_id);

		$branch = $this->cm->view_all('branch');
		$department = $this->cm->view_all('department');
		$subdepartment = $this->cm->view_all('subdepartment');

		foreach ($details as $d) {
			$branch_ids = explode(",", $d->branch_id);
			$department_ids = explode(",", $d->department_id);
			$subdepartment_ids = explode(",", $d->course_category_id);
			$branch_name = [];
			$department_name = [];
			$subdepartment_name = [];

			foreach ($branch as $b) {
				if (in_array($b->branch_id, $branch_ids)) {
					array_push($branch_name, $b->branch_name);
				}
			}

			foreach ($department as $dept) {
				if (in_array($dept->department_id, $department_ids)) {
					array_push($department_name, $dept->department_name);
				}
			}

			foreach ($subdepartment as $s) {
				if (in_array($s->subdepartment_id, $subdepartment_ids)) {
					array_push($subdepartment_name, $s->subdepartment_name);
				}
			}

			$d->branch_name = implode(", ", $branch_name);
			$d->department_name = implode(",", $department_name);
			$d->subdepartment_name = implode(",", $subdepartment_name);
		}

		echo json_encode($details);
	}

	public function com_complain()
	{
		$update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");
		$update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");
		$update['p_module'] = $this->cm->view_all("p_module");
		$update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
		$update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
		$update['course_completed'] = $this->cm->course_completed_student("admission_courses");
		$update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
		$update['course_data'] = $this->cm->view_all("course");
		$update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");
		$display['all_place'] = $this->cm->view_all("place_type");
        $display['all_branches'] = $this->cm->view_all("branch");
        $display['all_product_type'] = $this->cm->view_all("product_type");
        $display['all_product'] = $this->cm->view_all_desc("product", "product_id");
		$display['all_product_enquiry'] = $this->cm->view_all_last("product_enquiry");
		// $display['conversion'] = $this->cm->select_all_conversion($product_enquiry_id);
		$this->load->view('erp/erpheader', $update);
		$this->load->view('common/com_complain',$display);
	}
	public function view_complainList()
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
		$this->load->view('common/view_complainList');
	}

	public function view_batches()
	{
		$update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");
		$update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
		$update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
		$update['course_completed'] = $this->cm->course_completed_student("admission_courses");
		$update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
		$update['course_data'] = $this->cm->view_all("course");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");
		$display['list_source'] = $this->cm->view_all("source");
		$display['list_department'] = $this->cm->view_all("department");
		$display['list_subdepartment'] = $this->cm->view_all("subdepartment");
		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['list_package'] = $this->cm->view_all("rnw_package");
		$display['list_user'] = $this->admi->get_faculty("user");
		$display['list_batch'] = $this->cm->view_all_user_by_status("demo_batch_list");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('common/view_batches',$display);
	}


	public function feedback()
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

		$display['list_branch'] = $this->cm->view_all('branch');
		$display['list_department'] = $this->cm->view_all('department');
		$display['list_faculty'] = $this->cm->view_all_by_order("user","name", "asc");
		$display['list_course'] = $this->cm->view_all_by_order("rnw_course","course_name", "asc");
		$display['list_package'] = $this->cm->view_all_by_order("rnw_package","package_name","asc");
		$display['list_sub_course'] = $this->cm->view_all_by_order("rnw_subcourse","subcourse_name","asc");
		$display['list_college_courses'] = $this->cm->view_all_by_order("college_courses","college_course_name","asc");
		$display['list_user'] = $this->cm->view_all_by_order("user","name","asc");
		$display['list_subject'] = $this->cm->view_all_by_order("subject_feedback","subject_name","asc");

		$this->load->view('erp/erpheader', $update);
        $this->load->view('common/feedback',$display);
	}

	public function Ajax_feedback()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();
			date_default_timezone_set('Asia/Kolkata');
			$data['addedby'] = $_SESSION['user_name'];
			$data['created_at'] = date('Y-m-d h:i:s');
			unset($data['submit']);
			if ($this->input->post('feedback_id')) {
				$id = $this->input->post('feedback_id');
				unset($data['feedback_id']);
				$query = $this->co->update_record('feedback', $data, 'feedback_id', $id);
				if ($query) {
					$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			} else {
				unset($data['feedback_id']);
				$query = $this->cm->insert_data("feedback", $data);
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

	public function Ajax_create_subject()
	{
		$data =  $this->input->post();
		$date = date('Y-m-d h:i:s');
		$record = array('subject_name' => $data['subject_name'],'created_at' => $date,'addedby' => $_SESSION['user_name']);
		$result = $this->admi->save_data('subject_feedback', $record);

		if ($result) {
			$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
			echo json_encode($recp); // echo "1";
		} else {
			$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp); // echo "2";
		}
	}

	public function help_center()
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

		$display['list_branch'] = $this->cm->view_all('branch');
		$display['list_department'] = $this->cm->view_all_by_order('department','department_name','asc');
		$display['list_faculty'] = $this->cm->view_all_by_order("faculty","name", "asc");
		$display['list_course'] = $this->cm->view_all_by_order("rnw_course","course_name", "asc");
		$display['list_package'] = $this->cm->view_all_by_order("rnw_package","package_name","asc");
		$display['list_sub_course'] = $this->cm->view_all_by_order("rnw_subcourse","subcourse_name","asc");
		$display['list_college_courses'] = $this->cm->view_all_by_order("college_courses","college_course_name","asc");
		$display['list_user'] = $this->cm->view_all_by_order("user","name","asc");

		$this->load->view('erp/erpheader', $update);
        $this->load->view('common/help_center',$display);
	}

	public function Ajax_helpcenter()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();
			date_default_timezone_set('Asia/Kolkata');
			$data['addedby'] = $_SESSION['user_name'];
			$data['created_at'] = date('Y-m-d h:i:s');
			unset($data['submit']);
			if ($this->input->post('help_center_id')) {
				$id = $this->input->post('help_center_id');
				unset($data['help_center_id']);
				$query = $this->co->update_record('help_center', $data, 'help_center_id', $id);
				if ($query) {
					$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			} else {
				unset($data['help_center_id']);
				$query = $this->cm->insert_data("help_center", $data);
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

	public function ptm_report()
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

		$display['list_branch'] = $this->cm->view_all('branch');
		$display['list_department'] = $this->cm->view_all_by_order('department','department_name','asc');
		$display['list_faculty'] = $this->cm->view_all_by_order("faculty","name", "asc");
		$display['list_course'] = $this->cm->view_all_by_order("rnw_course","course_name", "asc");
		$display['list_package'] = $this->cm->view_all_by_order("rnw_package","package_name","asc");
		$display['list_sub_course'] = $this->cm->view_all_by_order("rnw_subcourse","subcourse_name","asc");
		$display['list_college_courses'] = $this->cm->view_all_by_order("college_courses","college_course_name","asc");
		$display['list_user'] = $this->cm->view_all_by_order("user","name","asc");
		$display['list_hod'] = $this->cm->view_all_by_order("hod","name","asc");

		$this->load->view('erp/erpheader', $update);
        $this->load->view('common/ptm_report',$display);
	}

	public function get_faculty(){
		$data = $this->input->post();
		$bid = $data['branch_id'];
		// print_r($bid);
		// die();
		$user = $this->cm->view_all('user');
		
		echo '<option value=" ">Select Faculty</option>';
		foreach ($user as $dn) {
			$flag = 0;
			$dnbi = explode(',', $dn['branch_ids']);
			if(in_array($bid, $dnbi)) {
				$flag = 1;
			}
			if($flag == 1) { ?>
				<option value="<?php echo $dn['user_id']; ?>"><?php echo $dn['name']; ?></option>
			<?php
			 }
		}
	}

	public function ajax_ptm_report(){
		$data = $this->input->post();
        date_default_timezone_set("Asia/Calcutta");
        $addedby = $_SESSION['user_name'];
		$created_at = date('Y-m-d h:i:s');

		if (empty($data['branch_id'])) {
            $branch_id = $data['branch_id'] = "";
        } else {
            $branch_id = $data['branch_id'];
        }
		if (empty($data['hod_id'])) {
            $hod_id = $data['hod_id'] = "";
        } else {
            $hod_id = $data['hod_id'];
        }
		if (empty($data['course_id'])) {
            $course_id = $data['course_id'] = "";
        } else {
            $course_id = $data['course_id'];
        }
        if (empty($data['package_id'])) {
            $package_id = $data['package_id'] = "";
        } else {
            $package_id = $data['package_id'];
        }
        if (empty($data['faculty_id'])) {
            $faculty_id = $data['faculty_id'] = "";
        } else {
            $faculty_id = $data['faculty_id'];
        }
		if (empty($data['type'])) {
            $type = $data['type'] = "";
        } else {
            $type = implode(",", @$data['type']);
        }
        if (empty($data['uniform'])) {
            $uniform = $data['uniform'] = "";
        } else {
            $uniform = implode(",", @$data['uniform']);
        }
        if (empty($data['discipline'])) {
            $discipline = $data['discipline'] = "";
        } else {
            $discipline = implode(",", @$data['discipline']);
        }
        if (empty($data['total_work_days'])) {
            $total_work_days = $data['total_work_days'] = "";
        } else {
            $total_work_days = $data['total_work_days'];
        }
        if (empty($data['total_present_days'])) {
            $total_present_days = $data['total_present_days'] = "";
        } else {
            $total_present_days = $data['total_present_days'];
        }
        if (empty($data['total_attendance_percentage'])) {
            $total_attendance_percentage = $data['total_attendance_percentage'] = "";
        } else {
            $total_attendance_percentage = $data['total_attendance_percentage'];
        }
        if (empty($data['faculty_behavior_mark'])) {
            $faculty_behavior_mark = $data['faculty_behavior_mark'] = "";
        } else {
            $faculty_behavior_mark = $data['faculty_behavior_mark'];
        }
        if (empty($data['student_behavior_mark'])) {
            $student_behavior_mark = $data['student_behavior_mark'] = "";
        } else {
            $student_behavior_mark = $data['student_behavior_mark'];
        }
        if (empty($data['total_project'])) {
            $total_project = $data['total_project'] = "";
        } else {
            $total_project = $data['total_project'];
        }
        if (empty($data['submited'])) {
            $submited = $data['submited'] = "";
        } else {
            $submited = $data['submited'];
        }
        if (empty($data['submited_percentage'])) {
            $submited_percentage = $data['submited_percentage'] = "";
        } else {
            $submited_percentage = $data['submited_percentage'];
        }
        if (empty($data['on_time'])) {
            $on_time = $data['on_time'] = "";
        } else {
            $on_time = $data['on_time'];
        }
        if (empty($data['on_time_percentage'])) {
            $on_time_percentage = $data['on_time_percentage'] = "";
        } else {
            $on_time_percentage = $data['on_time_percentage'];
        }
        if (empty($data['quality'])) {
            $quality = $data['quality'] = "";
        } else {
            $quality = $data['quality'];
        }
        if (empty($data['total'])) {
            $total = $data['total'] = "";
        } else {
            $total = $data['total'];
        }
        if (empty($data['participated'])) {
            $participated = $data['participated'] = "";
        } else {
            $participated = $data['participated'];
        }
        if (empty($data['participated_percentage'])) {
            $participated_percentage = $data['participated_percentage'] = "";
        } else {
            $participated_percentage = $data['participated_percentage'];
        }
        if (empty($data['remarks'])) {
            $remarks = $data['remarks'] = "";
        } else {
            $remarks = $data['remarks'];
        }
        $record = array('from_date' => $data['from_date'], 'to_date' => $data['to_date'], 'batch_tiaming_from' => $data['batch_tiaming_from'], 'batch_tiaming_to' =>  $data['batch_tiaming_to'], 'gr_id' => $data['gr_id'], 'name' => $data['name'] , 'parent_no' => $data['parent_no'],'branch_id' => $branch_id ,'faculty_name' => $faculty_id, 'hod_name' => $hod_id,'type' =>$type,'course_name' => $course_id ,'package_name' => $package_id,'uniform' => $uniform, 'discipline' => $discipline, 'student_behavior_mark' => $student_behavior_mark, 'faculty_behavior_mark' => $faculty_behavior_mark, 'total_work_days' => $total_work_days, 'total_present_days' => $total_present_days, 'total_attendance_percentage' => $total_attendance_percentage, 'total_project' => $total_project, 'submited' => $submited, 'submited_percentage' => $submited_percentage, 'on_time' => $on_time, 'on_time_percentage' => $on_time_percentage, 'quality' => $quality, 'total_activity' => $total, 'participated' => $participated, 'participated_percentage' => $participated_percentage, 'remarks' => $remarks,'addedby' => $addedby, 'created_at' => $created_at);
        $result = $this->admi->save_data('ptm_report', $record);
        if ($result) {
			$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Inserted.");
			echo json_encode($recp); // echo "1";
		} else {
			$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
			echo json_encode($recp); // echo "2";
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
				<?php ?>
				<option value="<?php echo $co['course_id']; ?>"><?php echo $co['course_name']; ?></option>
			<?php
            }
        }
    }
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
				<option value="<?php echo $pac['package_id']; ?>"><?php echo $pac['package_name']; ?></option>
				<?php
            }
        }
    }
    	public function branchWisePlace() {
		$select_place = $this->cm->select_data("place_type", "place_type_id", $this->input->post('place_type_id'));
		$select_product_type = $this->cm->select_data("product_type", "product_type_id", $this->input->post('product_type_id'));
		$select_product = $this->cm->select_data("product", "product_id", $this->input->post('list_property'));
        $id = $this->input->post('branch_id');
        $all_place = $this->cm->filter_data("place_type", "branch_id", $id);
        $all_branches = $this->cm->view_all("branch");			
?>
    		 <select name="place_type_id" id="place_type_id" class="form-control" required>
                        <option value="">Select Place</option>
                        <?php foreach ($all_place as $val) { ?>
                            <option <?php if (@$select_place->place_type_id == $val->place_type_id) {
                echo "selected";
            } ?> value="<?php echo $val->place_type_id; ?>"><?php echo $val->place_name; ?> - <?php foreach ($all_branches as $row) {
                if ($row->branch_id == $val->branch_id) {
                    echo $row->branch_name;
                }
            } ?></option>
                        <?php
        } ?>
               </select>      
        <?php
    }
	public function productWise() {
        $id = $this->input->post('product_type_id');
        $branch_id = $this->input->post('branch_id');
        $place_id = $this->input->post('place_id');
        echo $list_property = $this->cm->get_list_of_property("product", $id, $branch_id, $place_id);
    }

	public function demo_data() {
        $id = $this->input->post('d_id');
        $data = $this->cm->select_data('product', 'product_id', $id);
        echo $data->product_decription;
    }
	
	public function add_complain_new()
	{	
			$data = $this->input->post();
		    date_default_timezone_set("Asia/Calcutta");
            $product_issue_date = date('Y-m-d');
            $enquiry_timestamp = date('Y-m-d H:i:s');
			$branch_reco = $this->cm->select_data('branch','branch_id',$data['branch_id']);
			$product_reco = $this->cm->select_data('product_type','product_type_id',$data['product_type_id']);
			$place_reco = $this->cm->select_data('place_type','place_type_id',$data['place_type_id']);
			$property_reco = $this->cm->select_data('product','product_id',$data['list_property']);
			$kya_reco = @$branch_reco->branch_name . " -> " . @$place_reco->place_name . " -> " . @$product_reco->product_name . " -> " . @$property_reco->product_name;
			$reco = array('branch_id' => $data['branch_id'] , 'product_id' => $data['list_property'] ,'product_issue' => $data['product_issue'],'kya' => $kya_reco,'user_name'=>$_SESSION['user_name'],'product_issue_date'=>$product_issue_date,'enquiry_timestamp'=>$enquiry_timestamp);
            $query = $this->db->insert("product_enquiry", $reco);
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
	 public function complain_status($product_enquiry_id)
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
		$display['all_place'] = $this->cm->view_all("place_type");
        $display['all_branches'] = $this->cm->view_all("branch");
        $display['all_product_type'] = $this->cm->view_all("product_type");
        $display['all_product'] = $this->cm->view_all_desc("product", "product_id");
		//$display['all_product_enquiry'] = $this->cm->view_all("product_enquiry");
		$display['all_product_enquiry'] = $this->cm->view_all_desc("product_enquiry", "product_enquiry_id");
        $display['conversion'] = $this->cm->select_all_conversion($product_enquiry_id);
        $display['select_complain'] = $this->cm->select_data_res("product_enquiry", "product_enquiry_id", $product_enquiry_id);
		$this->load->view('erp/erpheader', $update);
		$this->load->view('common/complain_status',$display);
	 }
	 public function place_type_new()
	{		
			$data = $this->input->post();
			$data['branch_id']=$this->input->post('branch_id');
			$data['place_name']=$this->input->post('place_name');	
			// print_r($data);
			// die();
			if ($this->input->post('place_type_id')) {
                $id = $this->input->post('place_type_id');
                unset($data['place_type_id']);
                $query = $this->cm->update_record('place_type', $data, 'place_type_id', $id); 
                if ($query) {
                    $recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
                    echo json_encode($recp); // echo "1";
                } else {
                    $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                    echo json_encode($recp); // echo "2";
                }
            } else {
                unset($data['place_type_id']);
                $query = $this->db->insert('place_type', $data);
                if ($query) {
                    $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
                    echo json_encode($recp); // echo "1";
                } else {
                    $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                    echo json_encode($recp); // echo "2";
                }
            }
	}
	public function product_type_new()
	{
			$data = $this->input->post();	
			$data['product_name']=$this->input->post('product_name');
			if ($this->input->post('product_type_id')) {
                $id = $this->input->post('product_type_id');
                unset($data['product_type_id']);
                $query = $this->cm->update_record('product_type', $data, 'product_type_id', $id); 
                if ($query) {
                    $recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
                    echo json_encode($recp); // echo "1";
                } else {
                    $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                    echo json_encode($recp); // echo "2";
                }
            } else {
                unset($data['product_type_id']);
                $query = $this->db->insert('product_type', $data);
                if ($query) {
                    $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
                    echo json_encode($recp); // echo "1";
                } else {
                    $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                    echo json_encode($recp); // echo "2";
                }
            }
	}

	public function get_record_place_type()
    {
        $id = $this->input->post('product_type_id ');
        $record['single_record'] = $this->cm->get_reco('product_type', 'product_type_id ', $id);
        echo json_encode($record);
    }

	public function update_status()
    {
        $data = $this->input->post(); 
		
        $reco[$data['field']] = $data['status'];
		// print_r($reco[$data['field']]);
		// die();
        $re = $this->cm->update_record($data['table'], $reco, $data['check_field'], $data['id']);

        if ($re) {
            $recp["status"] = array('status' => 1, "msg" => "Status updated succefully.");
            echo json_encode($recp);
        } else {
            $recp["status"] = array('status' => 2, "msg" => "Something Wrong");
            echo json_encode($recp);
        }
    }


	public function comp_update_status()
    {
        $data = $this->input->post(); 
		
        $reco[$data['field']] = $data['status'];
		// print_r($reco[$data['field']]);
		// die();
        $re = $this->cm->update_record($data['table'], $reco, $data['check_field'], $data['id']);

        if ($re) {
            $recp["status"] = array('status' => 1, "msg" => "Status updated succefully.");
            echo json_encode($recp);
        } else {
            $recp["status"] = array('status' => 2, "msg" => "Something Wrong");
            echo json_encode($recp);
        }
    }


	public function branchWisePlaceAgain() {
		$select_place = $this->cm->select_data("place_type", "place_type_id", $this->input->post('place_type_id'));
		$select_product_type = $this->cm->select_data("product_type", "product_type_id", $this->input->post('product_type_id'));
		$select_product = $this->cm->select_data("product", "product_id", $this->input->post('list_property'));
        $id = $this->input->post('branch_id');	
        $all_place = $this->cm->filter_data("place_type", "branch_id", $id);
        $all_branches = $this->cm->view_all("branch");			
?>
			<div class="form-group">
			<label >Select Branch Place:</label>
    		 <select name="place_type_idb" id="place_type_idb" class="form-control" required>
                        <option value="">----Select Place----</option>
                        <?php foreach ($all_place as $val) { ?>
                            <option <?php if (@$select_place->place_type_id == $val->place_type_id) {
                echo "selected";
            } ?> value="<?php echo $val->place_type_id; ?>"><?php echo $val->place_name; ?> - <?php foreach ($all_branches as $row) {
                if ($row->branch_id == $val->branch_id) {
                    echo $row->branch_name;
                }
            } ?></option>
                        <?php
        } ?>
               </select>      
	</div>
        <?php
    }
	 
	public function product_new()
	{
			$data = $this->input->post();
			// echo "<pre>";
			// print_r($data);
			// die();
		    date_default_timezone_set("Asia/Calcutta");
            $product_create_date = date('Y-m-d H:i:s');
			$reco = array('branch_id' => $data['branch_id'] ,'place_type_id' => $data['place_type_id'] , 'product_type_id' =>$data['product_type_id'] , 'product_name' => @$data['product_name'] , 'product_decription' => $data['product_decription'] ,'product_create_date' => $product_create_date );
			if ($this->input->post('product_id '))
			{
			$id = $this->input->post('product_id ');
			$query = $this->cm->update_record('product', $data, 'product_id', $id);
            if($query)
			{
				$recp['all_record'] = array( 'status' => 1 , "msg" => "HI! This Record Successfully Updated");
                echo json_encode($recp);
			}else
			{
				$recp['all_record'] = array('status' => 2 ,"msg" => " Try again!!");
                echo json_encode($recp);
			}
		} else {
			$query = $this->db->insert("product", $reco);
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
	}

	public function get_recoproduct()
    {
        $id = $this->input->post('id');
        $record['single_record'] = $this->cm->get_reco('product', 'product_id', $id);
        echo json_encode($record);
    }

	public function get_recplace()
    {
        $id = $this->input->post('id');
        $record['single_record'] = $this->cm->get_reco('place_type', 'place_type_id ', $id);
        echo json_encode($record);
    }

	public function get_recproduct_type()
    {
        $id = $this->input->post('id');
        $record['single_record'] = $this->cm->get_reco('product_type', 'product_type_id', $id);
        echo json_encode($record);
    }

	public function update_status_pro()
    {
        $data = $this->input->post(); 
        $reco[$data['field']] = $data['status'];
		// print_r($data['status']);
		// die();
        $re = $this->cm->update_record($data['table'], $reco, $data['check_field'], $data['id']);
        if ($re) {
            $recp["status"] = array('status' => 1, "msg" => "Status updated succefully.");
            echo json_encode($recp);
        } else {
            $recp["status"] = array('status' => 2, "msg" => "Something Wrong");
            echo json_encode($recp);
        }
    }

	public function delete_product() {
        $table = $this->input->post('table');
        $field = $this->input->post('field');
        $id = $this->input->post('id');
        $query = $this->cm->delete_record($table, $field, $id);
        if ($query) {
            $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Deleted");
            echo json_encode($recp);
        } else {
            $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
            echo json_encode($recp); 
        }
    }

	public function product_table()
	{	
		$data['all_product_type'] = $this->cm->view_all("product_type");	
		$this->load->view('common/product_table', $data);
	}

	public function place_type_table()
	{	
		$data['all_place'] = $this->cm->view_all("place_type");
		 $data['all_branches'] = $this->cm->view_all("branch");
		$this->load->view('common/place_type_table', $data);
	}
	public function product_list_type()
	{	
		 $data['all_place'] = $this->cm->view_all("place_type");
         $data['all_branches'] = $this->cm->view_all("branch");
         $data['all_product'] = $this->cm->view_all_desc("product", "product_id");	
		 $data['all_product_type'] = $this->cm->view_all("product_type");			
		 $this->load->view('common/product_list_table', $data);
	}
	public function complain_table()
	{	
		$data['all_place'] = $this->cm->view_all("place_type");
        $data['all_branches'] = $this->cm->view_all("branch");
        $data['all_product'] = $this->cm->view_all_desc("product", "product_id");	
		$data['all_product_type'] = $this->cm->view_all("product_type");	
		$data['all_product_enquiry'] = $this->cm->view_all_last("product_enquiry");
		// print_r($data);
		// die();	
		$this->load->view('Common/complain_table', $data);
	}
  
	public function start_chat()
	{
		$ins['sender_name'] = $_SESSION['user_name'];
        $ins['complain_id'] = $product_enquiry_id;
        $ins['msg_timestamp'] = date('Y-m-d H:i:s');
        $ins['comment'] = $this->input->post('message');
        $re = $this->cm->insert_data("product_issue_communication", $ins);
	}


	public function branch_wise_department()
	{
		$data = $this->input->post();
        $b_id = $data['branch_id'];
        $depart = $this->cm->view_all("department");
        echo '<option value="">----Select Department----</option>';
        foreach ($depart as $dep) {
            $flag = 0;
            $dnbi = explode(',', $dep->branch_id);
            if (in_array($b_id, $dnbi)) {
                $flag = 1;
            }
            if ($flag == 1) {
                ?>
				<option value="<?php echo $dep->department_id ; ?>"><?php echo $dep->department_name; ?></option>
				<?php
            }
        }
	}

	public function branch_wise_faculty()
	{
		$data = $this->input->post();
        $b_id = $data['branch_id'];
        $faculty = $this->cm->view_all_user_by_Faculty("user");
        echo '<option value="">----Select Faculty----</option>';
        foreach ($faculty as $fac) {
            $flag = 0;
            $dnbi = explode(',', $fac->branch_ids);
            if (in_array($b_id, $dnbi)) {
                $flag = 1;
            }
            if ($flag == 1) {
                ?>
				<?php if($fac['status']=="0") { ?>
				<option value="<?php echo $fac->user_id; ?>"><?php echo $fac->name; ?></option>
				<?php
            } }
        }
	}

	public function add_batch_list()
	{
			$data = $this->input->post();
			date_default_timezone_set("Asia/Calcutta");
			$created_at = date('Y-m-d H:i:s');
			$created_by = $_SESSION['user_name'];
			$status = 0;
			$reco = array('batch_list_id' => $data['batch_list_id'] ,'branch_id' => $data['branch_id'] , 'department_id' =>$data['department_id'] , 'faculty_ids' => $data['faculty_ids'] , 'courses_type' => $data['courses_type'] ,'course_id' => @$data['course_id'], 'package_id' => @$data['package_id'] , 'batch_name' =>$data['batch_name'] , 'batch_code' =>$data['batch_code'] , 'batch_time_from' => date('h:i A', strtotime($data['batch_time_from'])) , 'batch_time_to' => date('h:i A', strtotime($data['batch_time_to'])), 'created_by' => $created_by , 'created_at' => $created_at ,'batch_date' => $data['batch_date'] ,'status' => $status);
			// echo "<pre>";	
			// print_r($reco);
			// die();
			if ($this->input->post('batch_list_id')){
			$id = $this->input->post('batch_list_id');
			$query = $this->cm->update_record('demo_batch_list', $data, 'batch_list_id', $id);
			if($query) {
				$recp['all_record'] = array( 'status' => 3 , "msg" => "HI! This Record Successfully Updated");
				echo json_encode($recp);
			} else {
				$recp['all_record'] = array('status' => 2 ,"msg" => " Try again!!");
				echo json_encode($recp);
			}
		    } else {
			$query = $this->db->insert('demo_batch_list', $reco);
			if($query){
				$recp['all_record'] = array( 'status' => 1 , "msg" => "HI! This Record Successfully inserted");
				echo json_encode($recp);
			} else {
				$recp['all_record'] = array('status' => 2 ,"msg" => " Try again!!");
				echo json_encode($recp);
			}
		}		
	}
	
	public function batch_table(){
		$display['list_source'] = $this->cm->view_all("source");
		$display['list_department'] = $this->cm->view_all("department");
		$display['list_subdepartment'] = $this->cm->view_all("subdepartment");
		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['list_package'] = $this->cm->view_all("rnw_package");
		$display['list_user'] = $this->admi->get_faculty("user");
		$display['list_batch'] = $this->cm->view_all_user_by_status("demo_batch_list");
		$this->load->view('common/batch_table',$display);
	}

	public function add_leadTodemo(){
		$data = $this->input->post();
		date_default_timezone_set("Asia/Calcutta");
		$created_at = date('Y-m-d H:i:s');
		$addBy = $_SESSION['user_name'];
		if (@$data['course_type'] == "single") {
			$cids = @$data['courseName'];
			$c = $this->cm->select_data('rnw_course', 'course_id', $cids);
			if(empty($c)) {
				$department_id = "";
			} else {
				$department_id = $c->department_id;
			}
			if (empty($c)) {
				$subdepartment_id = "";
			} else {
				$subdepartment_id = $c->subdepartment_id;
			}
		} else {
			$pids = @$data['packageName'];
			$p = $this->cm->select_data('rnw_package', 'package_id', $pids);
			if(empty($p)) {
				$department_id = "";
			} else {
				$department_id= $p->department_id;
			}
			if(empty($p)) {
				$subdepartment_id = "";
			} else {
				$subdepartment_id = $p->subdepartment_id;
			}
		}

		if(empty($data['courseName'])) {
            $courseName = $data['courseName'] = "";
        } else {
			$co = $this->cm->select_data('rnw_course', 'course_id', $data['courseName']);
            $courseName = $co->course_name;
        }

		if(empty($data['packageName'])) {
            $packageName = $data['packageName'] = "";
        } else {
			$pa = $this->cm->select_data('rnw_package', 'package_id', $data['packageName']);
            $packageName = $pa->package_name;;
        }

		if (@$data['coursee_type'] == "single") {
			$startingCourse = $data['scourse'];
		} else {
			$startingCourse = $data['pcourse'];
		}

		if(empty($data['faculty_id'])) {
            $faculty_id = $data['faculty_id'] = "";
        } else {
            $faculty_id = $data['faculty_id'];
        }

		if(empty($data['hod_id'])) {
            $hod_id = $data['hod_id'] = "";
        } else {
            $hod_id = $data['hod_id'];
        }

		if(empty($data['demo_batch'])) {
            $demo_batch = $data['demo_batch'] = "";
        } else {
            $demo_batch = $data['demo_batch'];
        }

		$reco = array('lead_list_id' => $data['lead_list_id'] ,'demoDate' => $data['demoDate'] , 'name' =>$data['name'] , 'mobileNo' => $data['mobileNo'] , 'branch_id' => $data['branch_id'] ,'course_type' => @$data['course_type'], 'courseName' =>@$courseName , 'packageName' => @$packageName , 'department_id' =>$department_id , 'subdepartment_id' => $subdepartment_id , 'startingCourse' => $startingCourse,'faculty_type' => $data['faculty_type'], 'faculty_id' => $faculty_id , 'hod_id' => $hod_id , 'demo_batch' => $demo_batch , 'fromTime' => $data['fromTime'] , 'toTime' => $data['toTime'], 'remarks' => $data['remarks'], 'addBy' => $addBy,'created_at' => $created_at);
		$repo = $this->cm->insert_endlastreco_demo('demo', $reco);

		$ins_data['status'] = "6 - Demo";
		$ins_data['sub_status'] = "Allocated to demo";
		$ins_data['demo_id'] = $repo->demo_id;
		$ins_data['referred_to'] = $addBy;
		$query = $this->cm->update_record('lead_list', $ins_data, 'lead_list_id',$data['lead_list_id']);
		if($query){
			$recp['all_record'] = array( 'status' => 1 , "msg" => "HI! This Record Successfully inserted");
			echo json_encode($recp);
		} else {
			$recp['all_record'] = array('status' => 2 ,"msg" => " Try again!!");
			echo json_encode($recp);
		}
	}
	
	public function update_status_batch()
    {
        $data = $this->input->post(); 
        $reco[$data['field']] = $data['status'];
		// print_r($reco[$data['field']]);
		// die();
        $re = $this->cm->update_record($data['table'], $reco, $data['check_field'], $data['id']);
        if ($re) {
            $recp["status"] = array('status' => 1, "msg" => "Status updated succefully.");
            echo json_encode($recp);
        } else {
            $recp["status"] = array('status' => 2, "msg" => "Something Wrong");
            echo json_encode($recp);
        }
    }

	public function get_recobetch()
    {
        $id = $this->input->post('id');
        $record['single_record'] = $this->cm->get_reco('demo_batch_list', 'batch_list_id ', $id);
        echo json_encode($record);
    }

	public function update_status_batch_multi(){ 
        $data = $this->input->post();
        $status_check = 1; 
        for ($i = 0; $i < sizeof($data['ids']); $i++) {
            $result = $this->cm->update_multi_user('demo_batch_list', 'batch_list_id', $data['ids'][$i]);
            if ($result) {
                $status_check = 1;
            } else {
                $status_check = 0;
            }
        }
        if ($status_check == 1) {
			$recp['all_record'] = array('status' => 1, "msg" => "Record Deleted.");
            echo json_encode($recp);
        } else {
            $recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
            echo json_encode($recp);
        }
    }
	
	public function lms_jobApplication()
	{
	 if (empty($this->session->userdata('postponed_after'))) {
		$stPo1 = 3;
		$curDate = date('m-d-Y');
		$display_postponed = $this->cm->view_all_job_application("application_job", 'application_status', $stPo1, 'next_followup_date', $curDate);
		// echo "<pre>";
		// print_r($display_postponed);
		// exit;
		date_default_timezone_set('Asia/Kolkata');
		$currentTime = date('Y-m-d h:i:sA');
		foreach ($display_postponed as $key => $val) {
			if ($val->next_followup_date == $curDate) {
				$data_re = array('applications_id' => $val->application_number, 'remarks' => "Automatically go Active Basket", 'remarks_by' => @$_SESSION['user_name'], 'labels' => "active", 're_date' => $currentTime);
				$this->cm->Insert_remark_record('job_remarks', $data_re);
				$status_change = array('application_status' => 1);
				$this->cm->update_data("application_job", $status_change, "application_id", $val->application_id);
			}
		}
		// exit;
		$this->session->set_userdata('postponed_after', "complete");
	}
	if (!empty($this->input->post('star_submit'))) {
		$star_data = $this->input->post();
		$total = 0;
		for ($i = 0;$i < sizeof($star_data['rating_no']);$i++) {
			$total = $total + $star_data['rating_no'][$i];
		}
		$no = count($star_data['rating_no']) * 10;
		$per = ($total / $no) * 100;
		if ($per >= 0 && $per <= 20) {
			$star = 1;
		} else if ($per >= 21 && $per <= 40) {
			$star = 2;
		} else if ($per >= 41 && $per <= 60) {
			$star = 3;
		} else if ($per >= 61 && $per <= 80) {
			$star = 4;
		} else if ($per >= 81 && $per <= 100) {
			$star = 5;
		}
		// echo "<pre>";
		$rating_no = implode(',', $star_data['rating_no']);
		$rating_remarks = implode(',', $star_data['rating_remarks']);
		$application_id = $this->input->post('star_application_id');
		// exit;
		// $cr_star_id =  $this->input->post('cr_star_id');
		$star_data = array('star' => $star, 'star_remarks' => $rating_remarks, 'star_no' => $rating_no);
		// print_r($star_data);
		// exit;
		$this->cm->student_star_rating('application_job', 'application_id', $application_id, $star_data);
		$this->session->set_flashdata('star_msg', 'give Star Successfully');
	}
	if ($this->input->get('action') == "notifive_status") {
		$id = $this->input->get('id');
		if ($this->input->get('notifive_status') == 0) {
			$st['notifive_status'] = 1;
		} else {
			$st['notifive_status'] = 1;
		}
		$re = $this->cm->update_data("application_job", $st, "application_id", $id);
		if ($re) {
			redirect('Common/lms_jobApplication');
		}
	}
	if (!empty($this->input->get('status'))) {
		$sts = $this->input->get('status');
		$followup = !empty($this->input->get('followup')) ? $this->input->get('followup') : '';
		$display['appli_sts'] = $sts;
		$display['followup_status'] = $followup;
	} else {
		$display['appli_sts'] = "inactive";
	}
	if (!empty($this->input->get('action')) && !empty($this->input->get('id'))) {
		$id = $this->input->get('id');
		if ($this->input->get('action') == "discard") {
			if ($this->input->get('discard') == 0) {
				$st['discard'] = 1;
			} else {
				$st['discard'] = 0;
			}
			$re = $this->cm->update_data("application_job", $st, "application_id", $id);
			if ($re) {
				redirect('Common/lms_jobApplication');
			}
		} else if ($this->input->get('action') == "view") {
			$display['remarks_record'] = $this->cm->get_remarks_id_wise('job_remarks', 'applications_id', $id);
			$display['select_application'] = $this->cm->select_data("application_job", "application_id", $id);
		}
	}
	if (!empty($this->input->post('submit_job'))) {
		$data = $this->input->post();
		$data['position_for_apply'];
		$data['name'] = $data['fname'] . " " . $data['mname'] . " " . $data['lname'];
		$data['prefer_job_location'] = implode(",", $data['prefer_job_location']);
		$data['position_for_apply'] = implode(",", $data['position_for_apply']);
		//add remarks in
		$id = $data['application_id'];
		$user_name = $data['user_name_re'];
		$st = $data['application_status'];
		$rem = $data['faculty_remarks'];
		$da = date('d/m/Y H:i:s');
		if ($st == 0) {
			$st1 = "Inactive";
		} else if ($st == '5') {
			$st1 = "newfollowup";
		} else if ($st == 1) {
			$st1 = "Active";
		} else if ($st == 6) {
			$st1 = "activefollowup";
		} else if ($st == 2) {
			$st1 = "Confirm";
		} else if ($st == 3) {
			$st1 = "Postpone";
		} else if($st == 7){
			$st1 ="wpf";
		}
		$record1 = array('applications_id' => $id, 'remarks' => $rem, 'remarks_by' => $user_name, 'labels' => $st1, 're_date' => $da);
		$this->cm->Insert_remark_record('job_remarks', $record1);
		unset($data['submit_job']);
		unset($data['fname']);
		unset($data['mname']);
		unset($data['lname']);
		unset($data['application_id']);
		unset($data['faculty_remarks']);
		unset($data['user_name_re']);
		$re = $this->cm->update_data("application_job", $data, "application_id", $id);
		if ($re) {
			redirect('Common/lms_jobApplication');
		}
	}
	if (!empty($this->input->post('filter_profile'))) {
		$filter = $this->input->post();
			$status = $filter['application_status_wise_filter'];
		if($status == "0") {
			$st1 = 0;
			$display['application_job_all'] = $this->cm->jobapplication_filter("application_job", 'application_status', $st1, $filter);
		} else if ($status == '5') {
			$st1 = 5;
			$curDate = date('m-d-Y');
			$display['application_job_all'] = $this->cm->jobapplication_filter("application_job", 'application_status', $st1,$filter);
		} else if ($status == "1") {
			$st1 = 1;
			$display['application_job_all'] = $this->cm->jobapplication_filter("application_job", 'application_status', $st1,$filter);
		} else if ($status == '6') {
			$st1 = 6;
			$curDate = date('m-d-Y');
			$display['application_job_all'] = $this->cm->jobapplication_filter("application_job", 'application_status', $st1,$filter);
		} else if ($status == "2") {
			$st1 = 2;
			$display['application_job_all'] = $this->cm->jobapplication_filter("application_job", 'application_status', $st1,$filter);
		} else if ($status == "3") {
			$st1 = 3;
			$display['application_job_all'] = $this->cm->jobapplication_filter("application_job", 'application_status', $st1,$filter);
		} else {
			$display['application_job_all'] = $this->cm->jobapplication_filter("application_job", 'application_status', 0,$filter);
		}

		$display['filter_Next_Followup_Date_from'] = @$filter['filter_Next_Followup_Date_from'];
		$display['filter_Next_Followup_Date_to'] = @$filter['filter_Next_Followup_Date_to'];
		$display['filter_branch'] = @$data['filter_branch'];
		$display['filter_fname'] = @$filter['filter_fname'];
		$display['filter_grId'] = @$data['filter_grId'];
		$display['filter_email'] = @$filter['filter_email'];
		$display['filter_mobile'] = @$filter['filter_mobile'];
		$display['filter_faculty'] = @$data['filter_faculty'];
		$display['filter_course'] = @$data['filter_course'];
		$display['filter_package'] = @$data['filter_package'];
		$display['filter_demoDate_start'] = @$data['filter_demoDate_start'];
		$display['filter_demoDate_end'] = @$data['filter_demoDate_end'];
		$display['filter_position_for_apply'] = @$data['filter_position_for_apply'];
		$display['filter_prefer_job_location'] = @$data['filter_prefer_job_location'];
		$display['filter_applicationId'] = @$data['filter_applicationId'];
		$display['filter_oe_type'] = @$data['filter_oe_type'];
		$display['filter_on'] = "dfgf";
	} else if(!empty($this->input->get('filter_student_experience'))) {
		$filter_exp = $this->input->get();
		$display['application_job_all'] = $this->cm->jobapplication_filter_exp('application_job', $filter_exp);
	} else {
		$userName = $_SESSION['Admin']['username'];
		if($userName == 'Pradip Malaviya' || @$_SESSION['user_name'] == 'Hitesh Desai' || $userName == 'Jeel Patel') {
			$status = $this->input->get('status');
			if($status == "newfollowup") { 
				$st1 = 5;
				$display['application_job_all'] = $this->cm->view_all_job_application("application_job", 'application_status', $st1);
			} else if ($status == "Active") {
				$st1 = 1;
				$display['application_job_all'] = $this->cm->view_all_job_application("application_job", 'application_status', $st1);
			}else if ($status == "confirm") {
				$st1 = 2;
				$display['application_job_all'] = $this->cm->view_all_job_application("application_job", 'application_status', $st1);
			}else if ($status == "Notactive") {
				$st1 = 0;
				$display['application_job_all'] = $this->cm->noactive_job("application_job", 'application_status', $st1);
			}else if ($status == "wpf") {
				$st1 = 7;
				$display['application_job_all'] = $this->cm->view_all_job_application("application_job", 'application_status', $st1);
			}else if ($status == "discard") {
				$st1 = 4;
				$display['application_job_all'] = $this->cm->view_all_job_application("application_job", 'application_status', $st1);
			}else if ($status == "postpone") {
				$st1 = 3;
				$display['application_job_all'] = $this->cm->view_all_job_application("application_job", 'application_status', $st1);
			}else {
				$display['application_job_all'] = $this->cm->view_all("application_job");
			}
		} else {
			$status = $this->input->get('status');
			$display['application_all_remarks'] = $this->cm->view_get_all_remarks_job("job_remarks");
			// $display['application_job_all'] = $this->cm->view_all_job_application("application_job");
			$display['application_job_all'] = $this->cm->view_all_job_application_assign_faculty("application_job", "assign_faculty", $userName);
		}
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
        $display['all_branches'] = $this->cm->view_all("branch");
		$display['jobtype_all'] = $this->cm->view_all("jobtype");
		// $display['application_job_all'] = $this->cm->view_all("application_job");
		$display['all_faculty'] = $this->cm->view_all("faculty");
		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['whatsapp_tem_data'] = $this->cm->view_all('whatsapp_template');
		$display['list_package'] = $this->cm->view_all("rnw_package");
		$display['newRecord'] = $this->newRecord;
		$display['AllRecord'] = $this->AllRecord;
		$display['newfollowupRecord'] = $this->newfollowupRecord;
        $display['activeRecord'] = $this->activeRecord;
        $display['activefollowupRecord'] = isset($this->activefollowupRecord)?$this->activefollowupRecord:'0';
        $display['postponeRecord'] = $this->postponeRecord;
        $display['confirmRecord'] = $this->confirmRecord;
        $display['wpf'] = $this->wpf;
        $display['discardRecord'] = $this->discardRecord;
		$this->load->view('erp/erpheader', $update);
		$this->load->view('jobs/lms_jobApplication',$display);
	}

	public function studentConfirmationData() 
	{
        $data = $this->input->post();
        // print_r($data);
        // die();
		$status = $this->input->post('change_status_confirm');
		$application_number = $this->input->post('change_status_popup_confirm');
		$remarks_by = $_SESSION['user_name'];
		if($status == 2)
		{
				$config['upload_path'] = FCPATH . ' images\placements_image\ ';
				$config['allowed_types'] = '*';
				$new_name = time() . $_FILES["confirm_joining_letter_con"]['name'];
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('confirm_joining_letter_con')) {
					$image_metadata = $this->upload->data();
				}
				if (!empty($image_metadata['file_name'])) {
					$joining_letter = $image_metadata['file_name'];
					$data['confirm_joining_letter_con'] = $joining_letter;
				} else {
					$joining_letter = '';
					$data['confirm_joining_letter_con'] = $joining_letter;
				}
				$company_name_confirm = !empty($this->input->post('company_name_confirm')) ? $this->input->post('company_name_confirm') : '';
				$joining_date_confirm = !empty($this->input->post('joining_date_confirm')) ? $this->input->post('joining_date_confirm') : '';
				$starting_salary_confirm = !empty($this->input->post('starting_salary_confirm')) ? $this->input->post('starting_salary_confirm') : '';
				$bond_confirm = !empty($this->input->post('bond_confirm')) ? $this->input->post('bond_confirm') : '';
				$bond_year_month_confirm = !empty($this->input->post('bond_year_month_confirm')) ? $this->input->post('bond_year_month_confirm') : '';
				$confirm_student = array('application_status' => $status , 'confirm_company_name' => $company_name_confirm, 'confirm_joining_date' => $joining_date_confirm, 'confirm_starting_salary_confirm' => $starting_salary_confirm, 'confirm_joining_letter' => $config['file_name'], 'confirm_bond' => $bond_confirm, 'confirm_bond_year_month' => $bond_year_month_confirm);
				// print_r($confirm_student);
				// die;
				$this->cm->application_job_record_update('application_job', 'application_number', $application_number, $confirm_student);
				date_default_timezone_set('Asia/Kolkata');
				$currentTime = date('Y-m-d h:i:sA');
				$reConfirm = $confirm_student_remarks = array('applications_id' => $application_number, 'remarks' => $this->input->post('student_remarks_confirm'), 're_date' => $currentTime, 'remarks_by' => $remarks_by, 'labels' => 'confirm Job');
				$re = $this->cm->application_job_remarks_record('job_remarks', $confirm_student_remarks);
				if($re)
				{
					$this->session->set_flashdata('message', 'Successfully Added.');
				}else
				{
					$this->session->set_flashdata('message','Failed To inserted Record');
				}
				redirect('Common/lms_jobApplication');
		}
		else
		{ 
				date_default_timezone_set("Asia/Calcutta");
				$re_date = date('Y-m-d H:i:s');
				$reco = array('re_date' => $re_date ,'remarks_by' =>$remarks_by , 'applications_id' => $application_number , 'remarks' => $this->input->post('student_remarks_confirm'));
				$this->db->insert('job_remarks', $reco);
				$status_change = array('next_followup_date' => $data['next_followup_date'] ,'application_status' => $status);
				$query =$this->cm->application_job_record_update('application_job', 'application_number', $application_number, $status_change);
				if($query == 1)
				{
					$this->session->set_flashdata('message', 'Successfully Added.');
				}else
				{
					$this->session->set_flashdata('message','Failed To inserted Record');
				}
				redirect('Common/lms_jobApplication');		
		}
	}	

	public function whatsapp_tem_me_get() {
        $templ_name = $this->input->post('templat_namm');
        $data = $this->cm->get_whatsapp_te_message('whatsapp_template', 'w_template_name', $templ_name);
        echo @$data->w_template_message;
    }
	public function send_mes_through_wht() {
        date_default_timezone_set('Asia/Kolkata');
        $currentTime = date('d-m-Y h:i:s A', time());
        $data = $this->input->post();	
        $appli_no = $data['appl_number'];
        $hea = $data['template_name'];
        $rem = $data['template_message'];
        $remarks = $hea . "<br>" . $rem;
        $userName = $_SESSION['user_name'];
        $cu_date = $currentTime;
        $data = array('applications_id' => $appli_no, 'remarks' => $remarks, 're_date' => $cu_date, 'remarks_by' => $userName, 'labels' => "whatsapp Template");
        $da_re = $this->cm->insert_template_remarks_data('job_remarks', $data);
        if ($da_re) {
            $apData = $this->cm->fetch_all_records_application_no('application_job', 'application_number', $appli_no);
            $phone = $apData->number;
            echo json_encode(array('status' => 1, 'phone_no' => $phone));
        } else {
            echo json_encode(array('status' => 0));
        }
    }


	public function get_recoJobapp()
    {
        $id = $this->input->post('id');
        $record['single_record'] = $this->cm->get_reco('application_job', 'application_id', $id);
		@$appl_no = $record['single_record']->application_number;
		$record['single_remark'] = $this->cm->get_remarks_student_wise('job_remarks', 'applications_id', $appl_no);
		$faculty_id=$record['single_record']->faculty_id;
		$record['all_faculty'] = $this->cm->get_reco("faculty",'faculty_id',$faculty_id);
        echo json_encode($record);
    }

	public function get_jobremarks()
	{
		$id = $this->input->post('id');
		$record['single_record'] = $this->cm->get_reco('application_job', 'application_id', $id);
		@$appl_no = $record['single_record']->application_number;
		$record['get_multi_remarks'] = $this->cm->get_remarks_student_wise('job_remarks', 'applications_id', $appl_no);
		$this->load->view('jobs/ajax_jobremarks',$record);
	}


	public function add_remark_appl()
	{
		$data = $this->input->post();
		date_default_timezone_set("Asia/Calcutta");
		$re_date = date('Y-m-d H:i:s');
		$remarks_by = $_SESSION['user_name'];
		$reco = array( 'job_remark_id'=> $data['job_remark_id'], 're_date' => $re_date ,'remarks_by' =>$remarks_by , 'applications_id' =>$data['applications_number'] , 'remarks' => $data['remarks'] , 'labels' => $data['labels']);
		// echo "<pre>";
		// print_r($reco);
		// die();
		$query = $this->db->insert('job_remarks', $reco);
		if($query)
		{
			$recp['all_record'] = array( 'status' => 1 , "msg" => "HI! This Remark Successfully inserted");
			echo json_encode($recp);
		}else
		{
			$recp['all_record'] = array('status' => 2 ,"msg" => " Try again!!");
			echo json_encode($recp);
		}
	}

	
	public function Add_joining_letter()
	{

		$data = $this->input->post();
		$remarks_by = $_SESSION['user_name'];
        $config['upload_path']= FCPATH . ' images\placements_image\ ';
        $config['allowed_types']='gif|jpg|png|pdf';
		$new_name = time() . @$_FILES["confirm_joining_letter"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload',$config);
		if ($this->upload->do_upload('confirm_joining_letter')) {
            $image_metadata = $this->upload->data();
        }
		if (!empty($image_metadata['file_name'])) {
            $joining_letter = $image_metadata['file_name'];
            $data['joining_letter'] = $joining_letter;
        } else {
            $joining_letter = '';
            $data['joining_letter'] = $joining_letter;
        }
		$applications_id  = $this->input->post('applications_id');
		$confirm_student = array('confirm_joining_letter' => $data['confirm_joining_letter'], 'remarks' => $data['remarks'], 'confirm_joining_date' => $data['confirm_joining_date']);
        $query = $this->cm->application_job_record_update('application_job', 'application_number', $applications_id, $confirm_student);
		date_default_timezone_set('Asia/Kolkata');
        $currentTime = date('Y-m-d h:i:sA');
        $reConfirm = $confirm_student_remarks = array('applications_id' => $applications_id, 'remarks' => $this->input->post('remarks'), 're_date' => $currentTime, 'remarks_by' => $remarks_by);
		if($reConfirm)
		{
			$recp['all_record'] = array( 'status' => 1 , "msg" => "HI!  Your joining latter Is Now Inserted.");
			echo json_encode($recp);
		}else
		{
			$recp['all_record'] = array('status' => 2 ,"msg" => " Try again!!");
			echo json_encode($recp);
		}
		
	}
	public function give_student_rating() {
        $data = $this->input->post();
        $star = $this->input->post('star');
        $application_id = $this->input->post('app_rate_id');
        $star_data = array('star' => $star);
        $query = $this->cm->student_give_rating('application_job', 'application_id', $application_id, $star_data);
        if($query)
		{
			$recp['all_record'] = array( 'status' => 1 , "msg" => "HI! rating is submitted");
			echo json_encode($recp);
		}else
		{
			$recp['all_record'] = array('status' => 2 ,"msg" => " Try again!!");
			echo json_encode($recp);
		}
    }

	public function change_status_and_add_remark()
	{
		$data =$this->input->post();
		date_default_timezone_set("Asia/Calcutta");
		$re_date = date('Y-m-d H:i:s');
		$remarks_by = $_SESSION['user_name'];
		$application_status = $this->input->post('application_status');
		$applications_id  = $this->input->post('applications_id');
		$reco = array('re_date' => $re_date ,'remarks_by' =>$remarks_by , 'applications_id' => $data['applications_id'] , 'remarks' => $data['remarks']);
	    $this->db->insert('job_remarks', $reco);
		$status_change = array('next_followup_date' => $data['next_followup_date'] ,'application_status' => $data['application_status']);
        $query =$this->cm->application_job_record_update('application_job', 'application_number', $applications_id, $status_change);
		if($query)
		{
			$recp['all_record'] = array( 'status' => 1 , "msg" => "HI! status and next folow up date is updated");
			echo json_encode($recp);
		}else
		{
			$recp['all_record'] = array('status' => 2 ,"msg" => " Try again!!");
			echo json_encode($recp);
		}		
	}
	public function lms_all_company($status = '', $id = '')
	{
		
        $status_data_company = $status;	
        if ($this->input->post('remarks') != '') {
            $status = $this->input->post('status');
            $id = $this->input->post('cr_company_id');
            if ($status != '' && $id != '') {
                $data = $this->input->post();
                $st_data = $this->input->post('status_data_change');
                if ($st_data == 1) {
                    $s_reco = "Active";
                } else if ($st_data == 2) {
                    $s_reco = "Deactive";
                    $allJobs = array('job_status' => $st_data);
                    $this->cm->change_all_job_status('job_post', 'company_id', $id, $allJobs);
                } else if ($st_data == 3) {
                    $s_reco = "Dumped";
                    $allJobs = array('job_status' => $st_data);
                } elseif ($st_data == 0) {
                    $s_reco = "Pending";
                    $allJobs = array('job_status' => $st_data);
                    $this->cm->change_all_job_status('job_post', 'company_id', $id, $allJobs);
                }
                $status_data = array('status' => $this->input->post('status_data_change'));
                $record = array('remarks' => $data['remarks'], 'cr_company_id' => $data['cr_company_id'], 'remark_by' => $data['remarks_by'], 'status' => $data['status']);
                $this->cm->add_remarks_company('company_remarks', $record);
                $all_record_company = $this->cm->get_company_record('company_detail', $data['cr_company_id'], 'company_id');
                $email_record = $all_record_company->email_id;
                $employer_name = $all_record_company->employer_name;
                $config = array('protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
                'smtp_host' => 'smtp.gmail.com', 'smtp_port' => 465, 'smtp_user' => 'placement.rnwmultimedia@gmail.com', 'smtp_pass' => 'rnw#tpo2020', 'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
                'mailtype' => 'html', //plaintext 'text' mails or 'html'
                'smtp_timeout' => '4', //in seconds
                'charset' => 'UTF-8', 'wordwrap' => TRUE);
                // $this->load->config('email');
                $this->load->library('email',$config);
               // $this->email->initialize($config);
                $from = "placement.rnwmultimedia@gmail.com";
                $to = $email_record;
                $subject = "Status Change";
                if (@$st_reco == "Active") {
                    $message = '<div style="width: 600px; margin: 0 auto; font-family: Roboto; border: 1px solid #666; padding: 63px 12px; box-sizing: border-box;">
		<table width="100%"><tr><td class="logo_td"><div class="logo" style="width: 300px; margin: 0 auto;"><img src="https://demo.rnwmultimedia.com/placement/images/logo.png" width="100%"></div></td></tr><tr><td><h2 style="text-align: center; font-size: 20px;"><p style="margin: 0;">Training & Placement Policy</p><p style="margin: 0;">Red & White Group of Institute</p></h2></td></tr><tr><td><h1 style="font-weight: 400; margin: 0;">Hello, ' . $employer_name . ' <br> </h1></td></tr><tr><td align="center"><p style="font-size: 18px;">This is Red & White Group of Institute Your Status will be change to <span  style="display: inline-block; background: green; color: #fff; padding: 4px 7px; border-radius: 3px;">' . $s_reco . '</span><b>Go To Below Link To Post Job & Find Employee</b></p></td></tr><tr><td align="center"><a href="http://demo.rnwmultimedia.com/placement" style="display: inline-block; text-decoration: none; background: #e31e25; color: #fff; padding: 8px 14px; border-radius: 3px; text-transform: uppercase;">Click To Login</a></td></tr></table></div>';
                } else {
                    $message = '<div style="width: 600px; margin: 0 auto; font-family: Roboto; border: 1px solid #666; padding: 63px 12px; box-sizing: border-box;">
		<table width="100%"><tr><td class="logo_td"><div class="logo" style="width: 300px; margin: 0 auto;"><img src="https://demo.rnwmultimedia.com/placement/images/logo.png" width="100%"></div></td></tr><tr><td><h2 style="text-align: center; font-size: 20px;"><p style="margin: 0;">Training & Placement Policy</p><p style="margin: 0;">Red & White Group of Institute</p></h2></td></tr><tr><td><h1 style="font-weight: 400; margin: 0;">Hello, ' . $employer_name . ' <br> </h1></td></tr><tr><td align="center"><p style="font-size: 18px;">This is Red & White Group of Institute Your Status will be change to <span  style="display: inline-block; background: #F39C12; color: #fff; padding: 4px 7px; border-radius: 3px;">' . $s_reco . '</span><b>Contact RNW Placement Department</b></p></td></tr><tr><td align="center"><a href="http://demo.rnwmultimedia.com/placement" style="display: inline-block; text-decoration: none; background: #e31e25; color: #fff; padding: 8px 14px; border-radius: 3px; text-transform: uppercase;">Click To Login</a></td></tr></table></div>';
                }
          
                $this->email->set_newline("\r\n");
                $this->email->from($from);
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();
                $re = $this->cm->status_wise_record_company('company_detail', 'company_id', $id, $status_data);
                if ($re) {
					$recp['all_record'] = array( 'status' => 1 , "msg" => "HI! status Successfully updated");
					echo json_encode($recp);
                }
            }
        }
        if ($this->input->get('status') != '') {
            $status_company = $this->input->get('status');
			// print_r($status_company);
			// die();
			if($status_company == 1)
			{
				$st=1;
				 $display['recruiter'] = $this->cm->total_status_company('company_detail', 'status', $st);
			}
			else if($status_company == 0)
			{
				$st=0;
				 $display['recruiter'] = $this->cm->total_status_company('company_detail', 'status', $st);
				
			}
			else if($status_company == 2)
			{
				$st=2;
				$display['recruiter'] = $this->cm->total_status_company('company_detail', 'status', $st);
				
			}
			else if($status_company == 3)
			{
				$st=3;
				$display['recruiter'] = $this->cm->total_status_company('company_detail', 'status', $st);
				
			}
		}
		else
		{
			$display['recruiter'] = $this->cm->view_all('company_detail');
		}
		

		if ($this->input->get('status') != '') {
            $status_data_company = $this->input->get('status');
            if ($this->input->post('search') != '') {
                $search_record = $this->input->post();
                $display['recruiter'] = $this->cm->search_by_field_company('company_detail', $search_record, $status_data_company);
                $display['filter_record'] = $search_record;
				
            } else {
                $data['recruiter'] = $this->cm->get_company_record_bystatus('company_detail', 'status', $status_data_company);
            }
        }
		 else
		{	
            if ($this->input->post('search') != '') {
                $search_record = $this->input->post();
                $display['recruiter'] = $this->cm->search_field_company('company_detail', $search_record);
                $display['filter_record'] = $search_record;
            } else {
                $data['recruiter'] = $this->cm->view_all('company_detail');
            }
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
		$update['all_jobs'] = $this->cm->view_all("job_post");
		$display['all_place'] = $this->cm->view_all("place_type");
        $display['all_branches'] = $this->cm->view_all("branch");
        $display['all_product_type'] = $this->cm->view_all("product_type");
        $display['all_product'] = $this->cm->view_all_desc("product", "product_id");
		$display['all_product_enquiry'] = $this->cm->view_all_last("product_enquiry");
		// $display['recruiter'] = $this->cm->view_all("company_detail");
		$display['total_company'] = $this->cm->count_total_company('company_detail');
	    // $display['recruiter'] = $this->cm->get_company_record_bystatus('company_detail', 'status', 'active');
        $display['total_pending_company'] = $this->cm->count_total_status_company('company_detail', 'status', 0);
        $display['total_active_company'] = $this->cm->count_total_status_company('company_detail', 'status', 1);
        $display['total_deactive_company'] = $this->cm->count_total_status_company('company_detail', 'status', 2);
        $display['total_dumped_company'] = $this->cm->count_total_status_company('company_detail', 'status', 3);
		$this->load->view('erp/erpheader', $update);
		$this->load->view('jobs/lms_all_company',$display);
	}	
	
	public function view_company_wise_job()
	 {
        $id = $this->input->post('company_id');
        $data['recruiter'] = $this->cm->company_wise_job('job_post', 'company_id', $id);
		$data['company'] = $this->cm->view_all('company_detail');
        $this->load->view('jobs/ajax_company_wise_jobs', $data);
    }

	public function ajax_company_detail_get() 
	{
        $company_id = $this->input->post('company_id');
        $data['record'] = $this->cm->get_reco('company_detail', 'company_id', $company_id);
        $this->load->view('jobs/ajax_company_details', $data);
    }

	public function get_recoComp()
    {
        $id = $this->input->post('id');
        $record['single_record'] = $this->cm->get_reco('company_detail', 'company_id ', $id);
		@$comp_no = $record['single_record']->company_id ;
		$record['single_remark'] = $this->cm->get_remarks_company_wise('company_remarks', 'cr_company_id', $comp_no);
        echo json_encode($record);
    }

	public function add_remark_comp()
	{
		$data = $this->input->post();
		date_default_timezone_set("Asia/Calcutta");
		$date = date('Y-m-d H:i:s');
		$remark_by = $_SESSION['user_name'];
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

	public function give_company_rating()
	 {
        $data = $this->input->post();
        $star = $this->input->post('rating');
        $company_id = $this->input->post('company_id');
        $star_data = array('rating' => $star);
        $query = $this->cm->company_give_rating('company_detail', 'company_id', $company_id, $star_data);
        if($query)
		{
			$recp['all_record'] = array( 'status' => 1 , "msg" => "HI! rating is submitted");
			echo json_encode($recp);
		}else
		{
			$recp['all_record'] = array('status' => 2 ,"msg" => " Try again!!");
			echo json_encode($recp);
		}
    }

	public function ajax_company_query_get() {
        $id = $this->input->post('company_id');
        $data['company'] = $this->cm->select_data("company_detail", "company_id", $id);
        $data['all_query'] = $this->cm->get_company_remarks('company_query', 'company_id', $id);
        $data['email_template'] = $this->cm->view_all('SendEmail_template');
        $this->load->view('jobs/lms_send_query', $data);
    }

	public function get_emailsend_template_data_id_wise() {
        $SendEmail_template_id = $this->input->post('SendEmail_template_id');
        $data['email_template_record'] = $this->cm->get_email_temp_record('SendEmail_template', 'SendEmail_template_id', $SendEmail_template_id);
        echo json_encode(array('record' => $data));
    }

	public function ins_query() 
	{
        $data = $this->input->post();
        $all_record_email_template = $this->cm->get_company_record('SendEmail_template', $data['email_template_id'], 'SendEmail_template_id');
        $email_tamplate_name = $all_record_email_template->E_template_name;
        $all_record_company = $this->cm->get_company_record('company_detail', $data['company_id'], 'company_id');
        $email_record = $all_record_company->email_id;
        $config = array('protocol' => 'smtp', 'smtp_host' => 'smtp.gmail.com', 'smtp_port' => 465, 'smtp_user' => 'placement.rnwmultimedia@gmail.com', 'smtp_pass' => 'rnw#tpo2020', 'smtp_crypto' => 'ssl', 'mailtype' => 'html', 'smtp_timeout' => '4', 'charset' => 'UTF-8', 'wordwrap' => TRUE);
        $this->load->library('email',$config);
        $from = "placement.rnwmultimedia@gmail.com";
        $to = $email_record;
        $subject = $email_tamplate_name;
        $message = $data['message_text'];
        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
        $record = array('company_id' => $data['company_id'], 'email_template_id' => $data['email_template_id'], 'message_text' => $data['message_text'], 'date_time' => $data['date_time'], 'given_by' => $data['given_by']);
        $response = $this->cm->ins_query('company_query', $record);
        if($response){
			$recp['all_record'] = array('status' => 1 , "msg" => "HI! Mail is sent.....");
			echo json_encode($recp);
		} else {
			$recp['all_record'] = array('status' => 2 ,"msg" => " Try again!!");
			echo json_encode($recp);
		}
    }

	public function get_remarks_company_data() {
        $company_id = $this->input->post('company_id');
        $record['all_remarks'] = $this->cm->get_company_remarks('company_remarks', 'cr_company_id', $company_id);
        $this->load->view('jobs/remarks_company_record', $record);
    }

	public function active_recruiter($id)
	 {
        $data = $this->input->post();
        print_r($data);
        die();
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
  //       print_r($all_record_company);
  //       print_r($all_record_jobs_all);
		// die();
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
        $this->load->library('email',$config);
        //$this->email->initialize($config);
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
        if ($re) {
            $this->session->set_flashdata('msg_alert', 'Change Status of company');
            echo "1";
        } else {
            $this->session->set_flashdata('msg_alert', 'Something Wrong');
            echo "0";
        }
    }


	public function Deactive_recruiter($id)
	 {
        $rec = array('job_status' => 0);
        $re = $this->cm->change_admin_status_record('job_post', $rec, $id, 'jobpost_id');
        if ($re) {
            $this->session->set_flashdata('msg_alert', 'Change Status of company');
            redirect('Common/lms_all_company');
        } else {
            $this->session->set_flashdata('msg_alert', 'Something Wrong');
            redirect('Common/lms_all_company');
        }
    }
    public function view_demo($status='')
	{
		if ($this->input->get('status') != '') {
			$status_demo = $this->input->get('status');
			if($status_demo == 0){
				$st=0;
				$display['AllDemo'] = $this->cm->Count_demo_All_wise("demo");
                $display['runnung'] = $this->cm->Count_demo_status_wise("demo","demoStatus","0");
                $display['done'] = $this->cm->Count_demo_status_wise("demo","demoStatus","1");
                $display['leave'] = $this->cm->Count_demo_status_wise("demo","demoStatus","2");
                $display['cancle'] = $this->cm->Count_demo_status_wise("demo","demoStatus","3");
                $display['confusion'] = $this->cm->Count_demo_status_wise("demo","demoStatus","4");
                $display['discard'] = $this->cm->Count_demo_status_wise("demo","discard","1");
				$display['demo_all'] = $this->cm->total_status_demo('demo', 'demoStatus', $st);
				$branch_ids = $_SESSION['branch_ids'];
				 $b_id = explode(',',$branch_ids);
				 $demoreco = array();
				 foreach($display['demo_all'] as $val=>$k)
				 {
					for($i=0;$i<sizeof($b_id); $i++)
					{
						if($b_id[$i] == $k->branch_id)
						{
							$demoreco[] = $k;	
						}
					}
				 }
				 $demoarrayreco = array();
				 for($i=0;$i<sizeof($demoreco);$i++)
				 {
				 	$demoids = $demoreco[$i]->demo_id ;
				 	$flag = 1;
				 	for($j=0;$j<sizeof($demoarrayreco);$j++)
				 	{
				 		if($demoids == $demoarrayreco[$j]->demo_id)
				 		{
				 			$flag =0;
								break;
				 		}
				 	}
				 	if($flag == 1)
				 	{
				 		$demoarrayreco[] = $demoreco[$i]; 
				 	}
				 } 
				 $display['demo_all'] = $demoarrayreco;
				 $display['demo_all_fp'] = $this->cm->get_lead_next_followup('demo');
				$ob = 0;
				$followupRecord = array();
				foreach($display['demo_all_fp'] as $val=>$k){
					if($k->demoStatus != 0){
						if($k->attendance != ""){
							$all_re = explode("&&",$k->attendance);
							$last_att = end($all_re);
							$res = explode("/",@$last_att);
							$flag=1;
							$atw = $res[1];
							if($atw != "A"){
								$flag = 0;
							}
							if($flag == 1){
								$attdate = $res[0];
								$af = explode(" ",$attdate);
								$tomorrow = date("Y-m-d",strtotime("+2 day"));
								$cur  = $af[0];
								$date = new DateTime($cur);
								$now = new DateTime($tomorrow);
								$diff = $date->diff($now)->format("%d");
								if($diff >= 2)
								{
									$followupRecord[] = $k;
									$ob++;
								}
							}			
						}
					}
				}
				$display['followup']  = $ob;
			} else if($status_demo == 1){
				$st=1;
				$display['AllDemo'] = $this->cm->Count_demo_All_wise("demo");
                $display['runnung'] = $this->cm->Count_demo_status_wise("demo","demoStatus","0");
                $display['done'] = $this->cm->Count_demo_status_wise("demo","demoStatus","1");
                $display['leave'] = $this->cm->Count_demo_status_wise("demo","demoStatus","2");
                $display['cancle'] = $this->cm->Count_demo_status_wise("demo","demoStatus","3");
                $display['confusion'] = $this->cm->Count_demo_status_wise("demo","demoStatus","4");
                $display['discard'] = $this->cm->Count_demo_status_wise("demo","discard","1");
				$display['demo_all'] = $this->cm->total_status_demo('demo', 'demoStatus', $st);
				$branch_ids = $_SESSION['branch_ids'];
				 $b_id = explode(',',$branch_ids);
				 $demoreco = array();
				 foreach($display['demo_all'] as $val=>$k)
				 {
					for($i=0;$i<sizeof($b_id); $i++)
					{
						if($b_id[$i] == $k->branch_id)
						{
							$demoreco[] = $k;	
						}
					}
				 }
				 $demoarrayreco = array();
				 for($i=0;$i<sizeof($demoreco);$i++)
				 {
				 	$demoids = $demoreco[$i]->demo_id ;
				 	$flag = 1;
				 	for($j=0;$j<sizeof($demoarrayreco);$j++)
				 	{
				 		if($demoids == $demoarrayreco[$j]->demo_id)
				 		{
				 			$flag =0;
								break;
				 		}
				 	}
				 	if($flag == 1)
				 	{
				 		$demoarrayreco[] = $demoreco[$i]; 
				 	}
				 } 
				 $display['demo_all'] = $demoarrayreco;
				 $display['demo_all_fp'] = $this->cm->get_lead_next_followup('demo');
				$ob = 0;
				$followupRecord = array();
				foreach($display['demo_all_fp'] as $val=>$k){
					if($k->demoStatus != 0){
						if($k->attendance != ""){
							$all_re = explode("&&",$k->attendance);
							$last_att = end($all_re);
							$res = explode("/",@$last_att);
							$flag=1;
							$atw = $res[1];
							if($atw != "A"){
								$flag = 0;
							}
							if($flag == 1){
								$attdate = $res[0];
								$af = explode(" ",$attdate);
								$tomorrow = date("Y-m-d",strtotime("+2 day"));
								$cur  = $af[0];
								$date = new DateTime($cur);
								$now = new DateTime($tomorrow);
								$diff = $date->diff($now)->format("%d");
								if($diff >= 2)
								{
									$followupRecord[] = $k;
									$ob++;
								}
							}			
						}
					}
				}
				$display['followup']  = $ob;
			} else if($status_demo == 2){
				$st=2;
				$display['AllDemo'] = $this->cm->Count_demo_All_wise("demo");
                $display['runnung'] = $this->cm->Count_demo_status_wise("demo","demoStatus","0");
                $display['done'] = $this->cm->Count_demo_status_wise("demo","demoStatus","1");
                $display['leave'] = $this->cm->Count_demo_status_wise("demo","demoStatus","2");
                $display['cancle'] = $this->cm->Count_demo_status_wise("demo","demoStatus","3");
                $display['confusion'] = $this->cm->Count_demo_status_wise("demo","demoStatus","4");
                $display['discard'] = $this->cm->Count_demo_status_wise("demo","discard","1");
				$display['demo_all'] = $this->cm->total_status_demo('demo', 'demoStatus', $st);
				$branch_ids = $_SESSION['branch_ids'];
				 $b_id = explode(',',$branch_ids);
				 $demoreco = array();
				 foreach($display['demo_all'] as $val=>$k)
				 {
					for($i=0;$i<sizeof($b_id); $i++)
					{
						if($b_id[$i] == $k->branch_id)
						{
							$demoreco[] = $k;	
						}
					}
				 }
				 $demoarrayreco = array();
				 for($i=0;$i<sizeof($demoreco);$i++)
				 {
				 	$demoids = $demoreco[$i]->demo_id ;
				 	$flag = 1;
				 	for($j=0;$j<sizeof($demoarrayreco);$j++)
				 	{
				 		if($demoids == $demoarrayreco[$j]->demo_id)
				 		{
				 			$flag =0;
								break;
				 		}
				 	}
				 	if($flag == 1)
				 	{
				 		$demoarrayreco[] = $demoreco[$i]; 
				 	}
				 } 
				 $display['demo_all'] = $demoarrayreco;
				 $display['demo_all_fp'] = $this->cm->get_lead_next_followup('demo');
				$ob = 0;
				$followupRecord = array();
				foreach($display['demo_all_fp'] as $val=>$k){
					if($k->demoStatus != 0){
						if($k->attendance != ""){
							$all_re = explode("&&",$k->attendance);
							$last_att = end($all_re);
							$res = explode("/",@$last_att);
							$flag=1;
							$atw = $res[1];
							if($atw != "A"){
								$flag = 0;
							}
							if($flag == 1){
								$attdate = $res[0];
								$af = explode(" ",$attdate);
								$tomorrow = date("Y-m-d",strtotime("+2 day"));
								$cur  = $af[0];
								$date = new DateTime($cur);
								$now = new DateTime($tomorrow);
								$diff = $date->diff($now)->format("%d");
								if($diff >= 2)
								{
									$followupRecord[] = $k;
									$ob++;
								}
							}			
						}
					}
				}
				$display['followup']  = $ob;
			} else if($status_demo == 3){
				$st=3;
				$display['AllDemo'] = $this->cm->Count_demo_All_wise("demo");
                $display['runnung'] = $this->cm->Count_demo_status_wise("demo","demoStatus","0");
                $display['done'] = $this->cm->Count_demo_status_wise("demo","demoStatus","1");
                $display['leave'] = $this->cm->Count_demo_status_wise("demo","demoStatus","2");
                $display['cancle'] = $this->cm->Count_demo_status_wise("demo","demoStatus","3");
                $display['confusion'] = $this->cm->Count_demo_status_wise("demo","demoStatus","4");
                $display['discard'] = $this->cm->Count_demo_status_wise("demo","discard","1");
				$display['demo_all'] = $this->cm->total_status_demo('demo', 'demoStatus', $st);
				$branch_ids = $_SESSION['branch_ids'];
				 $b_id = explode(',',$branch_ids);
				 $demoreco = array();
				 foreach($display['demo_all'] as $val=>$k)
				 {
					for($i=0;$i<sizeof($b_id); $i++)
					{
						if($b_id[$i] == $k->branch_id)
						{
							$demoreco[] = $k;	
						}
					}
				 }
				 $demoarrayreco = array();
				 for($i=0;$i<sizeof($demoreco);$i++)
				 {
				 	$demoids = $demoreco[$i]->demo_id ;
				 	$flag = 1;
				 	for($j=0;$j<sizeof($demoarrayreco);$j++)
				 	{
				 		if($demoids == $demoarrayreco[$j]->demo_id)
				 		{
				 			$flag =0;
								break;
				 		}
				 	}
				 	if($flag == 1)
				 	{
				 		$demoarrayreco[] = $demoreco[$i]; 
				 	}
				 } 
				 $display['demo_all'] = $demoarrayreco;
				 $display['demo_all_fp'] = $this->cm->get_lead_next_followup('demo');
				$ob = 0;
				$followupRecord = array();
				foreach($display['demo_all_fp'] as $val=>$k){
					if($k->demoStatus != 0){
						if($k->attendance != ""){
							$all_re = explode("&&",$k->attendance);
							$last_att = end($all_re);
							$res = explode("/",@$last_att);
							$flag=1;
							$atw = $res[1];
							if($atw != "A"){
								$flag = 0;
							}
							if($flag == 1){
								$attdate = $res[0];
								$af = explode(" ",$attdate);
								$tomorrow = date("Y-m-d",strtotime("+2 day"));
								$cur  = $af[0];
								$date = new DateTime($cur);
								$now = new DateTime($tomorrow);
								$diff = $date->diff($now)->format("%d");
								if($diff >= 2)
								{
									$followupRecord[] = $k;
									$ob++;
								}
							}			
						}
					}
				}
				$display['followup']  = $ob;
		    } else if($status_demo == 4){
				$st=4;
				$display['AllDemo'] = $this->cm->Count_demo_All_wise("demo");
                $display['runnung'] = $this->cm->Count_demo_status_wise("demo","demoStatus","0");
                $display['done'] = $this->cm->Count_demo_status_wise("demo","demoStatus","1");
                $display['leave'] = $this->cm->Count_demo_status_wise("demo","demoStatus","2");
                $display['cancle'] = $this->cm->Count_demo_status_wise("demo","demoStatus","3");
                $display['confusion'] = $this->cm->Count_demo_status_wise("demo","demoStatus","4");
                $display['discard'] = $this->cm->Count_demo_status_wise("demo","discard","1");
				$display['demo_all'] = $this->cm->total_status_demo('demo', 'demoStatus', $st);
				$branch_ids = $_SESSION['branch_ids'];
				 $b_id = explode(',',$branch_ids);
				 $demoreco = array();
				 foreach($display['demo_all'] as $val=>$k)
				 {
					for($i=0;$i<sizeof($b_id); $i++)
					{
						if($b_id[$i] == $k->branch_id)
						{
							$demoreco[] = $k;	
						}
					}
				 }
				 $demoarrayreco = array();
				 for($i=0;$i<sizeof($demoreco);$i++)
				 {
				 	$demoids = $demoreco[$i]->demo_id ;
				 	$flag = 1;
				 	for($j=0;$j<sizeof($demoarrayreco);$j++)
				 	{
				 		if($demoids == $demoarrayreco[$j]->demo_id)
				 		{
				 			$flag =0;
								break;
				 		}
				 	}
				 	if($flag == 1)
				 	{
				 		$demoarrayreco[] = $demoreco[$i]; 
				 	}
				 } 

				 $display['demo_all'] = $demoarrayreco;
				 $display['demo_all_fp'] = $this->cm->get_lead_next_followup('demo');
				$ob = 0;
				$followupRecord = array();
				foreach($display['demo_all_fp'] as $val=>$k){
					if($k->demoStatus != 0){
						if($k->attendance != ""){
							$all_re = explode("&&",$k->attendance);
							$last_att = end($all_re);
							$res = explode("/",@$last_att);
							$flag=1;
							$atw = $res[1];
							if($atw != "A"){
								$flag = 0;
							}
							if($flag == 1){
								$attdate = $res[0];
								$af = explode(" ",$attdate);
								$tomorrow = date("Y-m-d",strtotime("+2 day"));
								$cur  = $af[0];
								$date = new DateTime($cur);
								$now = new DateTime($tomorrow);
								$diff = $date->diff($now)->format("%d");
								if($diff >= 2)
								{
									$followupRecord[] = $k;
									$ob++;
								}
							}			
						}
					}
				}
				$display['followup']  = $ob;
			} else if($status_demo == 5){
				$st=1;
				$display['AllDemo'] = $this->cm->Count_demo_All_wise("demo");
                $display['runnung'] = $this->cm->Count_demo_status_wise("demo","demoStatus","0");
                $display['done'] = $this->cm->Count_demo_status_wise("demo","demoStatus","1");
                $display['leave'] = $this->cm->Count_demo_status_wise("demo","demoStatus","2");
                $display['cancle'] = $this->cm->Count_demo_status_wise("demo","demoStatus","3");
                $display['confusion'] = $this->cm->Count_demo_status_wise("demo","demoStatus","4");
                $display['discard'] = $this->cm->Count_demo_status_wise("demo","discard","1");
				$display['demo_all'] = $this->cm->total_status_demo('demo', 'discard', $st);
				$branch_ids = $_SESSION['branch_ids'];
				 $b_id = explode(',',$branch_ids);
				 $demoreco = array();
				 foreach($display['demo_all'] as $val=>$k)
				 {
					for($i=0;$i<sizeof($b_id); $i++)
					{
						if($b_id[$i] == $k->branch_id)
						{
							$demoreco[] = $k;	
						}
					}
				 }
				 $demoarrayreco = array();
				 for($i=0;$i<sizeof($demoreco);$i++)
				 {
				 	$demoids = $demoreco[$i]->demo_id ;
				 	$flag = 1;
				 	for($j=0;$j<sizeof($demoarrayreco);$j++)
				 	{
				 		if($demoids == $demoarrayreco[$j]->demo_id)
				 		{
				 			$flag =0;
								break;
				 		}
				 	}
				 	if($flag == 1)
				 	{
				 		$demoarrayreco[] = $demoreco[$i]; 
				 	}
				 } 
				$display['demo_all_fp'] = $this->cm->get_lead_next_followup('demo');
				$ob = 0;
				$followupRecord = array();
				foreach($display['demo_all_fp'] as $val=>$k){
					if($k->demoStatus != 0){
						if($k->attendance != ""){
							$all_re = explode("&&",$k->attendance);
							$last_att = end($all_re);
							$res = explode("/",@$last_att);
							$flag=1;
							$atw = $res[1];
							if($atw != "A"){
								$flag = 0;
							}
							if($flag == 1){
								$attdate = $res[0];
								$af = explode(" ",$attdate);
								$tomorrow = date("Y-m-d",strtotime("+2 day"));
								$cur  = $af[0];
								$date = new DateTime($cur);
								$now = new DateTime($tomorrow);
								$diff = $date->diff($now)->format("%d");
								if($diff >= 2)
								{
									$followupRecord[] = $k;
									$ob++;
								}
							}			
						}
					}
				}
				$display['followup']  = $ob;
				 $display['demo_all'] = $demoarrayreco;
		  }else if($status_demo == 6){
		  		$display['AllDemo'] = $this->cm->Count_demo_All_wise("demo");
	            $display['runnung'] = $this->cm->Count_demo_status_wise("demo","demoStatus","0");
	            $display['done'] = $this->cm->Count_demo_status_wise("demo","demoStatus","1");
	            $display['leave'] = $this->cm->Count_demo_status_wise("demo","demoStatus","2");
	            $display['cancle'] = $this->cm->Count_demo_status_wise("demo","demoStatus","3");
	            $display['confusion'] = $this->cm->Count_demo_status_wise("demo","demoStatus","4");
	            $display['discard'] = $this->cm->Count_demo_status_wise("demo","discard","1");
				$display['demo_all'] = $this->cm->get_lead_next_followup('demo');
				$ob = 0;
				$followupRecord = array();
				foreach($display['demo_all'] as $val=>$k){
					if($k->demoStatus != 0){
						if($k->attendance != ""){
							$all_re = explode("&&",$k->attendance);
							$last_att = end($all_re);
							$res = explode("/",@$last_att);
							$flag=1;
							$atw = $res[1];
							if($atw != "A"){
								$flag = 0;
							}
							if($flag == 1){
								$attdate = $res[0];
								$af = explode(" ",$attdate);
								$tomorrow = date("Y-m-d",strtotime("+2 day"));
								$cur  = $af[0];
								$date = new DateTime($cur);
								$now = new DateTime($tomorrow);
								$diff = $date->diff($now)->format("%d");
								if($diff >= 2)
								{
									$followupRecord[] = $k;
									$ob++;
								}
							}			
						}
					}
				}
				$display['demo_all'] = $followupRecord;
				$display['followup']  = $ob;
			}	
		  } else {
		  	$display['AllDemo'] = $this->cm->Count_demo_All_wise("demo");
            $display['runnung'] = $this->cm->Count_demo_status_wise("demo","demoStatus","0");
            $display['done'] = $this->cm->Count_demo_status_wise("demo","demoStatus","1");
            $display['leave'] = $this->cm->Count_demo_status_wise("demo","demoStatus","2");
            $display['cancle'] = $this->cm->Count_demo_status_wise("demo","demoStatus","3");
            $display['confusion'] = $this->cm->Count_demo_status_wise("demo","demoStatus","4");
            $display['discard'] = $this->cm->Count_demo_status_wise("demo","discard","1");
			$display['demo_all'] = $this->cm->view_all_demos('demo');
			$display['demo_all_fp'] = $this->cm->get_lead_next_followup('demo');
				$ob = 0;
				$followupRecord = array();
				foreach($display['demo_all_fp'] as $val=>$k){
					if($k->demoStatus != 0){
						if($k->attendance != ""){
							$all_re = explode("&&",$k->attendance);
							$last_att = end($all_re);
							$res = explode("/",@$last_att);
							$flag=1;
							$atw = $res[1];
							if($atw != "A"){
								$flag = 0;
							}
							if($flag == 1){
								$attdate = $res[0];
								$af = explode(" ",$attdate);
								$tomorrow = date("Y-m-d",strtotime("+2 day"));
								$cur  = $af[0];
								$date = new DateTime($cur);
								$now = new DateTime($tomorrow);
								$diff = $date->diff($now)->format("%d");
								if($diff >= 2)
								{
									$followupRecord[] = $k;
									$ob++;
								}
							}			
						}
					}
				}
				$display['followup']  = $ob;
				$branch_ids = $_SESSION['branch_ids'];
				 $b_id = explode(',',$branch_ids);
				 $demoreco = array();
				 foreach($display['demo_all'] as $val=>$k)
				 {
					for($i=0;$i<sizeof($b_id); $i++)
					{
						if($b_id[$i] == $k->branch_id)
						{
							$demoreco[] = $k;	
						}
					}
				 }
				 $demoarrayreco = array();
				 for($i=0;$i<sizeof($demoreco);$i++)
				 {
				 	$demoids = $demoreco[$i]->demo_id ;
				 	$flag = 1;
				 	for($j=0;$j<sizeof($demoarrayreco);$j++)
				 	{
				 		if($demoids == $demoarrayreco[$j]->demo_id)
				 		{
				 			$flag =0;
								break;
				 		}
				 	}
				 	if($flag == 1)
				 	{
				 		$demoarrayreco[] = $demoreco[$i]; 
				 	}
				 } 
				 $display['demo_all'] = $demoarrayreco;



			 	//$display['demo_all'] = $facfinaldemo;

			 	//$display['demo_all'] = $hodfacdemo;

		  }

		  if($_SESSION['logtype'] == 'Faculty'){
		  	$facdemo = array();
			 	$faculty_idss = $_SESSION['user_id'];
			 	foreach($display['demo_all'] as $val=>$k)
			 	{
			 		if($faculty_idss == $k->faculty_id)
			 		{
			 			$facdemo[] = $k;
			 		}
			 	}

			 	$facfinaldemo = array();
			 	for($i=0;$i<sizeof($facdemo);$i++)
			 	{
			 		$facdemoid = $facdemo[$i]->demo_id;
			 		$flag = 1;
			 		for($j=0;$j<sizeof($facfinaldemo);$j++)
					{
						if($facdemoid == $facfinaldemo[$j]->demo_id)
						{
							$flag=0;
							break;
						}
					}
					if($flag==1){
						$facfinaldemo[] = $facdemo[$i];
					}
			 	}
			  $display['demo_all'] = $facfinaldemo;
		  } elseif($_SESSION['logtype'] == 'HOD'){

			 	$hoddemo = array();
			 	$hod_ids = $_SESSION['user_id'];
			 	$fac_idsss = $_SESSION['faculty_id'];
			 	$fac_ids = explode(',', $fac_idsss);
			 	foreach($display['demo_all'] as $val=>$k)
			 	{
			 		for($i=0;$i<sizeof($fac_ids);$i++)
			 		{
			 			if($fac_ids[$i] == $k->faculty_id)
				 		{
				 			$hoddemo[] = $k;
				 		}
			 		}
			 	}

			 	$hodfacdemo = array();
			 	for($i=0;$i<sizeof($hoddemo);$i++)
			 	{
			 		$hoddemoid = $hoddemo[$i]->demo_id;
			 		$flag=1;
			 		// for($j=0;$j<sizeof($hodfacdemo);$j++)
			 		// {
			 		// 	if($hoddemoid == $hodfacdemo[$j]->demo_id)
			 		// 	{
			 		// 		$flag = 0;
			 		// 		break;
			 		// 	}
			 		// }
			 		if($flag==1)
			 		{
			 			$hodfacdemo[] = $hoddemo;
			 		}
			 	}
			  $display['demo_all'] = $hodfacdemo;
		  }
		  $display['demo_all_fp'] = $this->cm->get_lead_next_followup('demo');
				$ob = 0;
				$followupRecord = array();
				foreach($display['demo_all_fp'] as $val=>$k){
					if($k->demoStatus != 0){
						if($k->attendance != ""){
							$all_re = explode("&&",$k->attendance);
							$last_att = end($all_re);
							$res = explode("/",@$last_att);
							$flag=1;
							$atw = $res[1];
							if($atw != "A"){
								$flag = 0;
							}
							if($flag == 1){
								$attdate = $res[0];
								$af = explode(" ",$attdate);
								$tomorrow = date("Y-m-d",strtotime("+2 day"));
								$cur  = $af[0];
								$date = new DateTime($cur);
								$now = new DateTime($tomorrow);
								$diff = $date->diff($now)->format("%d");
								if($diff >= 2)
								{
									$followupRecord[] = $k;
									$ob++;
								}
							}			
						}
					}
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
		$update['course_data'] = $this->cm->view_all("course");
		$update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");
		$update['upd_demo'] = $this->cm->latest_demo("demo");
		$display['all_place'] = $this->cm->view_all("place_type");
        $display['all_branches'] = $this->cm->view_all("branch");
        $display['all_product_type'] = $this->cm->view_all("product_type");
        $display['all_product'] = $this->cm->view_all_desc("product", "product_id");
		$display['all_product_enquiry'] = $this->cm->view_all("product_enquiry");
		$display['all_product_enquiry'] = $this->cm->view_all_desc("product_enquiry", "product_enquiry_id");
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
		$display['AllDemo'] = $this->cm->Count_demo_All_wise("demo");
        $display['runnung'] = $this->cm->Count_demo_status_wise("demo","demoStatus","0");
        $display['done'] = $this->cm->Count_demo_status_wise("demo","demoStatus","1");
        $display['leave'] = $this->cm->Count_demo_status_wise("demo","demoStatus","2");
        $display['cancle'] = $this->cm->Count_demo_status_wise("demo","demoStatus","3");
        $display['confusion'] = $this->cm->Count_demo_status_wise("demo","demoStatus","4");
        $display['discard'] = $this->cm->Count_demo_status_wise("demo","discard","1");
		$display['RunningDemo'] = $this->cm->Count_demo_status_wise("demo","demoStatus","0");
		$display['DoneDemo'] = $this->cm->Count_demo_status_wise("demo","demoStatus","1");
		$display['LeaveDemo'] = $this->cm->Count_demo_status_wise("demo","demoStatus","2");
		$display['CancelDemo'] = $this->cm->Count_demo_status_wise("demo","demoStatus","3");
		$display['ConfusionDemo'] = $this->cm->Count_demo_status_wise("demo","demoStatus","4");
		$display['DiscardDemo'] = $this->cm->Count_demo_status_wise("demo","discard","1");
		$display['AllDemo'] = $this->cm->Count_demo_All_wise("demo");
		$display['reason_list'] = $this->cm->view_all("cancel_reason_list");
		$display['lable_list'] = $this->cm->view_all("remarklabel");
		$this->load->view('erp/erpheader', $update);
		$this->load->view('common/view_demo',$display);
	}

	public function view_add_demo()
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

		$display['all_branches'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['list_package'] = $this->cm->view_all("rnw_package");
		$display['all_user'] = $this->cm->view_all("user");
		$display['all_faculty'] = $this->cm->view_all("faculty");
		$display['all_hod'] = $this->cm->view_all("hod");
 
		$this->load->view('erp/erpheader', $update);
		$this->load->view('common/view_add_demo',$display);
	}
	
	public function GetPreviousDemo()
	{
		$data = $this->input->post();
		$record['select_demo'] = $this->cm->select_data("demo", "mobileNo", $data['mobileNo']);
		echo json_encode($record);
	}

	public function get_single_course() {
        $data = $this->input->post();
        $b_id = $data['branch_id'];
        $course = $this->admi->view_all('rnw_course');
        echo '<option value="">----Select Course----</option>';
        foreach ($course as $co) {
            $flag = 0;
            $dnbi = explode(',', $co['branch_id']);
            if (in_array($b_id, $dnbi)) {
                $flag = 1;
            }
            if ($flag == 1) {
            ?>
				<?php ?>
				<option value="<?php echo $co['course_name']; ?>"><?php echo $co['course_name']; ?></option>
			<?php
            }
        }
    }

	public function get_package_course() {
        $data = $this->input->post();
        $b_id = $data['branch_id'];
        $package = $this->admi->view_all('rnw_package');
        echo '<option value="">----Select Package----</option>';
        foreach ($package as $pac) {
            $flag = 0;
            $dnbi = explode(',', $pac['branch_id']);
            if (in_array($b_id, $dnbi)) {
                $flag = 1;
            }
            if ($flag == 1) {
                ?>
				<option value="<?php echo $pac['package_name']; ?>"><?php echo $pac['package_name']; ?></option>
				<?php
            }
        }
    }

	public function filter_branch_wise_faculty(){
        $data = $this->input->post();
		$branch = $data['branch_id'];
		$faculty = $this->cm->view_all_user_by_Faculty("user");
		echo "<option value=''>----Select Faculty----</option>";
		foreach ($faculty as $dn) {
			$flag = 0;
			$dnbi = explode(',', $dn->branch_ids);
			for ($i = 0;$i < sizeof($dnbi);$i++)
			{
				if ($branch == $dnbi[$i]) {
					$flag = 1;
				}
			}
			if ($flag == 1) {
			?> 
				<?php if ($dn->status == 0) { ?>
				<option  value="<?php echo $dn->user_id; ?>"><?php echo $dn->name; ?></option>
				<?php
				}
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

	public function checkTimefaculty()
	{
        $faculty_id = $this->input->post('faculty_id');
        $display['select_faculty'] = $this->cm->select_data("user", "user_id", $faculty_id);
        $display['all_time'] = $this->cm->view_all("time");
        $display['demo_all'] = $this->cm->view_all_demo_running("demo");
        $display['startingCourse'] = $this->input->post('courseName');
        $display['demo_date'] = $this->input->post('demo_date');
        $this->load->view('common/checkTimeDemo', $display);
    }

	public function checkTimehod()
	{
        $hod_id = $this->input->post('hod_id');
        $display['select_faculty'] = $this->cm->select_data("user", "user_id", $hod_id);
        $display['all_time'] = $this->cm->view_all("time");
        $display['demo_all'] = $this->cm->view_all_demo_running("demo");
        $display['startingCourse'] = $this->input->post('courseName');
        $display['demo_date'] = $this->input->post('demo_date');
        $this->load->view('common/checkTimeDemo', $display);
    }

	public function get_subcourse_single()
    {
        $data = $this->input->post();
		$single_co = $this->cm->get_demo_record("rnw_course","course_name", $data['course_name']);
		$course_id = $single_co->course_id;
		$subcourse = $this->admi->get_reco_multiple('rnw_subcourse', 'course_id', $course_id);
		echo '<option value="">----Select Sub-Course----</option>';
		foreach ($subcourse as $co) {
			if ($co->subcourse_status == "0") {
			?>
			<option value="<?php echo $co->subcourse_name; ?>"><?php echo $co->subcourse_name; ?></option>
			<?php
			}
		}
    }

	public function get_subpackage()
    {
        $data = $this->input->post();
		$single_pack = $this->cm->get_demo_record('rnw_package','package_name' , $data['package_name']);
		$package_id = $single_pack->package_id;
        $subpackage = $this->admi->get_reco_multiple('rnw_subpackage','package_id',$package_id);
        echo '<option value="">Select Package</option>';
        foreach($subpackage as $co) {  
            $subcourse = $this->admi->get_reco_multiple('rnw_subcourse','subcourse_id',$co->subcourse_id );
            foreach($subcourse as $subco)
            {
               ?>
               <option value="<?php echo $subco->subcourse_name; ?>"><?php echo $subco->subcourse_name; ?></option>
               <?php
            }
        } 
    }

	public function filter_branch_wise_hod()
	{
	   $data = $this->input->post();
	   $branch = $data['branch_id'];
	   $faculty = $this->cm->view_all_user_by_hod("user");
	   echo "<option value=''>----Select HOD----</option>";
	   foreach ($faculty as $dn) {
		   $flag = 0;
		   $dnbi = explode(',', $dn->branch_ids);
		   for ($i = 0;$i < sizeof($dnbi);$i++)
		   {
			   if ($branch == $dnbi[$i]) {
				   $flag = 1;
			   }
		   }
		   if ($flag == 1) {
		   ?> 
			   <?php if ($dn->status == 0) { ?>
			   <option  value="<?php echo $dn->user_id; ?>"><?php echo $dn->name; ?></option>
			   <?php
			   }
		   }
	   }
   }

	public function get_recoDemo()
    {
        $id = $this->input->post('id');
        $demo_detail['single_reco_demo'] = $this->cm->select_data('demo', 'demo_id', $id);
		$this->load->view('common/demo_attaendence_ajex',$demo_detail);
    }

	public function get_recoDemo1()
    {
        $id = $this->input->post('id');
        $demo_detail['single_reco_demo'] = $this->cm->select_data('demo', 'demo_id', $id);
		echo json_encode($demo_detail);
    }
	public function get_followup()
    {
        $id = $this->input->post('id');
        $demo_detail['single_reco_demo'] = $this->cm->select_data('demo', 'demo_id', $id);
		$this->load->view('common/demo_followup_ajex',$demo_detail);
    }
	public function get_recoRemarks()
    {
        $id = $this->input->post('id');
        $display['select_remarks'] = $this->cm->filter_remarks("demo_remark", "demo_id", $id);
		$this->load->view('common/demo_remark_ajex',$display);
    }

	public function get_single_reco()
	{
		$id = $this->input->post('id');
        $record['single_reco_demo'] = $this->cm->select_data('demo', 'demo_id', $id);
		$faculty_id=$record['single_reco_demo']->faculty_id;
		$record['single_faculty'] = $this->cm->get_reco("faculty",'faculty_id',$faculty_id);
		$Pday=0;
		$Aday=0;
		$all_att = explode("&&",$record['single_reco_demo']->attendance);
		for($i=0;$i<sizeof($all_att);$i++)
		{
			$att = explode("/",$all_att[$i]);
			if(@$att[1]=="P")
			{ 
				$Pday++;	
			}
			if(@$att[1]=="A")
			{
				$Aday++;	
			}
		}
		$record['present_att'] = $Pday;
		$record['Absent_att'] = $Aday;
		if($record['single_reco_demo']->attendance=="") { $Pday=0; $Aday=0;}
		echo json_encode($record);
	}


	public function getcontentDemo()
	{
		if ($this->input->post('wh') == 1) {
			$display['wh'] = 1;
		}
		if ($this->input->post('wh') == 2) {
			$display['wh'] = 2;
		}
		$display['all_department'] = $this->enq->view_all("department");
		$display['list_course'] = $this->cm->view_all_by_order("rnw_course","course_name", "asc");
		$display['list_package'] = $this->cm->view_all_by_order("rnw_package","package_name","asc");
        $display['sdsd'] = "";
        $this->load->view('enquiry/pack_or_cor_demo', $display);
    }

	function getCrsPkg() 
	{
        $deprtment_id = $this->input->post('department_id');
        if ($this->input->post('status') == 1) {
            $all_course = $this->cm->filter_data("course", "department_id", $deprtment_id);
?>

<label>Course:*</label>
    <select class="form-control" onChange="addCourse()" id="getcourse" required>
        <option value="">----Select Course----</option>
        <?php foreach ($all_course as $val) { ?>
        <option value="<?php echo $val->course_id; ?>"><?php echo $val->course_name; ?>
		</option>
        <?php
                
            } ?>
    </select>
<?php
        }
        if ($this->input->post('status') == 2) {
            $all_package = $this->cm->filter_data("package", "department_id", $deprtment_id);
?>
    <label>Course Package:*</label>
    <select class="form-control" onChange="addPackage()" id="getpackage" required>
        <option value="">----Select----</option>
        <?php foreach ($all_package as $val) {
 ?>
        <option <?php if (@$selectdata->lead_package_id == $val->package_id) {
                        echo "selected";
                    } ?> value="<?php echo $val->package_id; ?>"><?php echo $val->package_name; ?></option>
        <?php
            
            } ?>
    </select>
<?php
        }
    }


	// public function checkTime()
	// {
    //     $faculty_id = $this->input->post('faculty_id');
    //     $display['select_faculty'] = $this->cm->select_data("faculty", "faculty_id", $faculty_id);
    //     $display['all_time'] = $this->cm->view_all("time");
    //     $display['demo_all'] = $this->cm->view_all_demo("demo");
    //     $display['demo_date'] = $this->input->post('demo_date');    
	// 	print_r($display['select_faculty']);
	// 	die();
    //     $this->load->view('enquiry/check_faculty_time.php', $display);
    // }

	public function Update_status_demo()
	{
		$data = $this->input->post();
		// echo "<pre>";
		// print_r( $_SESSION['sts_msg']);
		// die();
		$id = $this->input->post('demo_id');
		$reco = array('demoStatus' => $data['demoStatus']);
		$query = $this->cm->update_record('demo', $reco, 'demo_id', $id); 
		if($query)
		{
			$recp['all_record'] = array( 'status' => 1 , "msg" => "HI! Status is changed.....");
			echo json_encode($recp);
		}else
		{
			$recp['all_record'] = array('status' => 2 ,"msg" => " Try again!!");
			echo json_encode($recp);
		}
	}

	public function add_remark_and_change_status()
	{
		$data = $this->input->post();
		$old_demo_record = $data;
		$demo_last_id = $data['demo_id'];
		// print_r($data);
		// die();
		$demo_id = $this->input->post("demo_id");
		$select_demo = $this->cm->select_data("demo", "demo_id", $demo_id);
		$ctimetamp = date('Y-m-d h:i:s a');
		$date = date("Y-m-d");
		$insert['statusChangeDate'] = date("Y-m-d");
		$insert['demoStatus'] = $data['demoStatus'];
		if ($data['demoStatus'] == "3") {
			$insert['cancel_reason'] = $this->input->post('cancel_reason');
			$insert['last_update'] = date('Y-m-d h:i:s');
			$data['reason'] = "Demo Cancel / " . $data['reason'];
		}
		if (!empty($data['leave_from_date']) && !empty($data['leave_to_date']) && $data['demoStatus'] == "2") {
			$insert['leaveDate'] = $data['leave_from_date'] . "to" . $data['leave_to_date'];
			$data['reason'] = "Demo Leave : " . $insert['leaveDate'] . " / " . $data['reason'];
		}
		if (!empty($data['leave_from_date']) && !empty($data['leave_to_date']) && $data['demoStatus'] == "4") {
			$insert['leaveDate'] = $data['leave_from_date'] . "to" . $data['leave_to_date'];
			$data['reason'] = "Demo Confusion : " . $insert['leaveDate'] . " / " . $data['reason'];	
		}
		if ($select_demo->reason == "") {
			$insert['reason'] = $date . "|/|" . $data['reason'] . "|/|" . $_SESSION['user_name'] . "|/|" . $ctimetamp;
		} else {
			$insert['reason'] = $select_demo->reason . "&&" . $date . "|/|" . $data['reason'] . "|/|" . $_SESSION['user_name'] . "|/|" . $ctimetamp;
		}		
		$query = $this->cm->update_data("demo", $insert, "demo_id", $demo_id);
		$single_reco = $this->cm->get_reco("demo", "demo_id", $demo_id);
		if($single_reco->demoStatus == 4)
		{
			$recp['all_record'] = array( 'status' => 4 , "msg" => "HI! This demo student has been moved to confusion list.....");
			echo json_encode($recp);
		}
		elseif($single_reco->demoStatus == 3)
		{
			$recp['all_record'] = array( 'status' => 3 , "msg" => "HI! This demo student has been moved to Cancle list.....");
			echo json_encode($recp);
		}
		elseif($single_reco->demoStatus == 2)
		{
			$recp['all_record'] = array( 'status' => 2 , "msg" => "HI! This demo student has been moved to leave list.....");
			echo json_encode($recp);
		}
		elseif($single_reco->demoStatus == 1)
		{
			$recp['all_record'] = array( 'status' => 1 , "msg" => "HI! This demo student has been moved to Done list.....");
			echo json_encode($recp);
		}
		elseif($single_reco->demoStatus == 0)
		{
			$recp['all_record'] = array( 'status' => 0 , "msg" => "HI! This demo student has been moved to Running list.....");
			echo json_encode($recp);
		}
		else
		{
			$recp['all_record'] = array('status' => 6 ,"msg" => " Try again!!");
			echo json_encode($recp);
		}
	}

	public function add_remark_demo()
	{
		$data = $this->input->post();
		$data['demo_remark_date'] = date('Y-m-d h:i:s a');
		$data['demo_remark_by'] = $_SESSION['user_name'];
		$reco = array('demo_id' => $data['demo_id'] , 'demo_remark_date' => $data['demo_remark_date'] , 'demo_remark_by' =>$data['demo_remark_by'] , 'demo_remark_comment' => $data['demo_remark_comment'] );
		$re = $this->cm->insert_data("demo_remark", $reco);
		if($re)
		{
			$recp['all_record'] = array( 'status' => 1 , "msg" => "HI! Status is changed.....");
			echo json_encode($recp);
		}else
		{
			$recp['all_record'] = array('status' => 2 ,"msg" => " Try again!!");
			echo json_encode($recp);
		}
	}
	
	public function view_demo_history()
	{
		$id = $this->input->post('id');
        $record['single_reco_his'] = $this->cm->select_data('demo_history','demo_id', $id);
        $record['single_reco'] = $this->cm->select_data('demo','demo_id', $id);
		$faculty_id = $record['single_reco']->faculty_id;
		// print_r($faculty_id);
		// die();
		$record['single_faculty'] = $this->cm->select_data("user" , 'user_id' ,$faculty_id);
		// print_r($record['single_faculty']);
		// die();
		$this->load->view('common/sidebar_history_demo',$record);
	}

	public function edit_demo_student()
	{
		$data = $this->input->post(); 
		$updat['courseName'] = $data['courseName'];
        $updat['demoDate'] = $data['demoDate'];
        $updat['name'] = $data['name'];
        $updat['mobileNo'] = $data['mobileNo'];
        $updat['branch_id'] = $data['branch_id'];
        $updat['course_type'] = $data['course_type'];
        if ($data['course_type'] == "single") {
            if (!empty($data['courseName'])) {
                $updat['course_type'] = $data['course_type'];
                $updat['courseName'] = $data['courseName'];
            }
        } else if ($data['course_type'] == "package") {
            if (!empty($data['packageName'])) {
                $updat['course_type'] = $data['course_type'];
                $updat['packageName'] = $data['packageName'];
            }
        }
        $updat['faculty_id'] = $data['faculty_id'];
        $updat['fromTime'] = @$data['fromTIme'];
        $updat['toTime'] = @$data['toTime'];
        $old_demo_record = $this->cm->get_demo_record('demo', 'demo_id', $data['demo_id']);
        if ($updat['name'] != $old_demo_record->name) {
            $his_name = $updat['name'] . ",change";
        } else {
            $his_name = $updat['name'] . ",nochange";
        }
        if ($updat['demoDate'] != $old_demo_record->demoDate) {
            $his_demoDate = $updat['demoDate'] . ",change";
        } else {
            $his_demoDate = $updat['demoDate'] . ",nochange";
        }
        if ($updat['mobileNo'] != $old_demo_record->mobileNo) {
            $his_mobileNo = $updat['mobileNo'] . ",change";
        } else {
            $his_mobileNo = $updat['mobileNo'] . ",nochange";
        }
        if ($updat['branch_id'] != $old_demo_record->branch_id) {
            $his_branchId = $updat['branch_id'] . ",change";
        } else {
            $his_branchId = $updat['branch_id'] . ",nochange";
        }
        if ($updat['course_type'] != $old_demo_record->course_type) {
            $his_course_type = $updat['course_type'] . ",change";
        } else {
            $his_course_type = $updat['course_type'] . ",nochange";
        }
        if ($updat['courseName'] != $old_demo_record->courseName) {
            $his_courseName = $updat['courseName'] . ",change";
        } else {
            $his_courseName = $updat['courseName'] . ",nochange";
        }
        // if ($updat['startingCourse'] != $old_demo_record->startingCourse) {
        //     $his_startingcourse = $updat['startingCourse'] . ",change";
        // } else {
        //     $his_startingcourse = $updat['startingCourse'] . ",nochange";
        // }
        if ($updat['faculty_id'] != $old_demo_record->faculty_id) {
            $his_facultyId = $updat['faculty_id'] . ",change";
        } else {
            $his_facultyId = $updat['faculty_id'] . ",nochange";
        }
        if ($updat['fromTime'] != $old_demo_record->fromTime) {
            $his_fromTime = $updat['fromTime'] . ",change";
        } else {
            $his_fromTime = $updat['fromTime'] . ",nochange";
        }
        if ($updat['toTime'] != $old_demo_record->toTime) {
            $his_toTime = $updat['toTime'] . ",change";
        } else {
            $his_toTime = $updat['toTime'] . ",nochange";
        }
        $last_update_date = date("Y-m-d") . " " . date("h:i:s");
        $changed_by = @$_SESSION['Admin']['username'];
        $demo_history = array('demo_id' => $data['demo_id'], 'name' => $his_name, 'demoDate' => $his_demoDate, 'mobileNo' => $his_mobileNo, 'branch_id' => $his_branchId, 'courseName' => $his_courseName, 'course_type' => $his_course_type, 'faculty_id' => $his_facultyId, 'fromTime' => $his_fromTime, 'toTime' => $his_toTime, 'addBy' => $changed_by . ",nochange", 'last_updated_date' => $last_update_date);
        $this->cm->insert_demo_history('demo_history', $demo_history);
        $demo_id = $data['demo_id'];
        $query = $this->enq->update_data("demo", $updat, "demo_id", $demo_id);
		if($query)
		{
			$recp['all_record'] = array( 'status' => 1 , "msg" => "HI! Record is updated.....");
			echo json_encode($recp);
		}
		else
		{
			$recp['all_record'] = array('status' => 2 ,"msg" => " Try again!!");
			echo json_encode($recp);
		}
	}

	public function discard_demo_edit()
	{ 
		$data = $this->input->post(); 
		$demo_id = $this->input->post('demo_id');
		$demo_discard_by = $_SESSION['user_name'];
		$demo_discard_timestamp = date("Y-m-d") . " " . date("h:i:s");
		$reco = array('discard' => $data['discard'] , 'demo_discard_by' => $demo_discard_by , 'demo_discard_timestamp' => $demo_discard_timestamp , 'demo_discard_reason' => $data['demo_discard_reason'] , 'demo_discard_comment' => $data['demo_discard_comment']);
		$query = $this->enq->update_data("demo", $reco, "demo_id", $demo_id);
		if($query)
		{
			$recp['all_record'] = array( 'status' => 1 , "msg" => "HI! Demo is discarded.....");
			echo json_encode($recp);
		}
		else
		{
			$recp['all_record'] = array('status' => 2 ,"msg" => " Try again!!");
			echo json_encode($recp);
		}
	}
	

	public function attendence_demo()
	{
		$data = $this->input->post();
		$demo_id = $data['demo_id'];
		$attdate = date("Y-m-d h:i:sa");
		$ctimetamp = date('Y-m-d h:i:s a');
		$select_demo = $this->cm->select_data("demo", "demo_id", $demo_id);
		$date = $attdate;
		$flag = 1;
		$all_att = explode("&&", $select_demo->attendance);
		for ($i = 0;$i < sizeof($all_att);$i++) {
			$att = explode("/", $all_att[$i]);
			if ($date == $att[0]) {
				$flag = 0;
			}
		}
		if ($flag == 1) {
			if ($data['attt'] == "A") {
				if ($select_demo->reason == "") {
					$insert['reason'] = $date . "|/|" . $data['demo_absent_comment'] . "|/|" . $_SESSION['user_name'] . "|/|" . $ctimetamp;
				} else {
					$insert['reason'] = $select_demo->reason . "&&" . $date . "|/|" . $data['demo_absent_comment'] . "|/|" . $_SESSION['user_name'] . "|/|" . $ctimetamp;
				}
			}
			if ($select_demo->attendance == "") {
				$insert['attendance'] = $date . "/" . $data['attt'] . "/" . $_SESSION['user_name'] . "/" . $ctimetamp;
			} else {
				$insert['attendance'] = $select_demo->attendance . "&&" . $date . "/" . $data['attt'] . "/" . $_SESSION['user_name'] . "/" . $ctimetamp;
			}
			$re = $this->cm->update_data("demo", $insert, "demo_id", $demo_id);
			if ($re) {
				$recp['all_record'] = array( 'status' => 1 , "msg" => "HI! Attendence is taken.....");
				echo json_encode($recp);
			}
			else{
				$recp['all_record'] = array( 'status' => 2 , "msg" => "Something Wrong.....");
				echo json_encode($recp);
			}
		} 
	}


	public function grt_search_rows()
	{
		if (@$this->input->post('searching_l')) {
			$search = $this->input->post('searching_l');
			$sear = array('name' => $search, 'demo_id' => $search);
		}
		$conditions['limit'] = $this->perPage;
		$conditions['order_by'] = "demo_id DESC";
		if (!empty($sear)) {
			$conditions['searching'] = $sear;
		}
		$display['demo_all_search'] = $this->cm->getRows_search("demo",$conditions);
		$display['all_place'] = $this->cm->view_all("place_type");
        $display['all_branches'] = $this->cm->view_all("branch");
        $display['all_product_type'] = $this->cm->view_all("product_type");
        $display['all_product'] = $this->cm->view_all_desc("product", "product_id");
		$display['all_product_enquiry'] = $this->cm->view_all("product_enquiry");
		$display['all_product_enquiry'] = $this->cm->view_all_desc("product_enquiry", "product_enquiry_id");
		$display['list_branch'] = $this->cm->view_all('branch');
		$display['list_department'] = $this->cm->view_all('department');
		$display['list_faculty'] = $this->cm->view_all_by_order("faculty","name", "asc");
		$display['all_faculty'] = $this->cm->view_all("faculty");
		$display['all_hod'] = $this->cm->view_all("hod");
		$display['all_user'] = $this->cm->view_all("user");
		$display['list_course'] = $this->cm->view_all_by_order("rnw_course","course_name", "asc");
		$display['list_package'] = $this->cm->view_all_by_order("rnw_package","package_name","asc");
		$display['list_sub_course'] = $this->cm->view_all_by_order("rnw_subcourse","subcourse_name","asc");
		$display['list_college_courses'] = $this->cm->view_all_by_order("college_courses","college_course_name","asc");
		$display['list_user'] = $this->cm->view_all_by_order("user","name","asc");
		$display['list_subject'] = $this->cm->view_all_by_order("subject_feedback","subject_name","asc");
		$display['RunningDemo'] = $this->cm->Count_demo_status_wise("demo","demoStatus","0");
		$display['DoneDemo'] = $this->cm->Count_demo_status_wise("demo","demoStatus","1");
		$display['LeaveDemo'] = $this->cm->Count_demo_status_wise("demo","demoStatus","2");
		$display['CancelDemo'] = $this->cm->Count_demo_status_wise("demo","demoStatus","3");
		$display['ConfusionDemo'] = $this->cm->Count_demo_status_wise("demo","demoStatus","4");
		$display['DiscardDemo'] = $this->cm->Count_demo_status_wise("demo","discard","1");
		$display['AllDemo'] = $this->cm->Count_demo_All_wise("demo");
		$display['reason_list'] = $this->cm->view_all("cancel_reason_list");
		$this->load->view('common/demo_search',$display);
	}

	public function add_new_demo_edit()
	{
		$data = $this->input->post();
		// echo "<pre>";
		// print_r($data);
		// die();
		$ins_data['admin_id'] = 65;
		$ins_data['name'] = $data['name'];
		$ins_data['demoDate'] = $data['demoDate'];
		$ins_data['mobileNo'] = $data['mobileNo'];
		$ins_data['branch_id'] = $data['branch_id'];
		$ins_data['course_type'] = $data['course_type'];
		$ins_data['startingCourse'] = $data['startingCourse'];
		if (@$data['course_type'] == "single") {
			//$cids = implode("," , $data['courseName']);
			$c = $this->cm->select_data('rnw_course', 'course_name',$data['courseName']);
			if (empty($c)) {
				$ins_data['department_id'] = "";
			} else {
				$ins_data['department_id'] = $c->department_id;
			}
			if (empty($c)) {
				$ins_data['subdepartment_id'] = "";
			} else {
				$ins_data['subdepartment_id'] = $c->subdepartment_id;
			}
			if (empty($c)) {
				$ins_data['courseName'] = "";
			} else {
				$ins_data['courseName'] = $c->course_name;
			}
		}else {
			$pids = @$data['packageName'];
			$p = $this->cm->select_data('rnw_package', 'package_name', $pids);
			if (empty($p)) {
				$ins_data['packageName'] = "";
			} else {
				$ins_data['packageName'] = $p->package_name;
			}
			if (empty($p)) {
				$ins_data['department_id'] = "";
			} else {
				$ins_data['department_id'] = $p->department_id;
			}
			if (empty($p)) {
				$ins_data['subdepartment_id'] = "";
			} else {
				$ins_data['subdepartment_id'] = $p->subdepartment_id;
			}
		}
		$ins_data['faculty_type'] = $data['faculty_type'];
		$ins_data['faculty_id'] = $data['faculty_id'];
		if (empty($ins_data['faculty_id'])) {
			$ins_data['faculty_id'] = "";
		}
		$ins_data['hod_id'] = $data['hod_id'];
		if (empty($ins_data['hod_id'])) {
			$ins_data['hod_id'] = "";
		}
		$select_faculty = $this->cm->select_data("user", "user_id", $ins_data['faculty_id']);
		$ins_data['fromTime'] = $data['fromTime'];
		$ins_data['toTime'] = $data['toTime'];
		$ins_data['remarks'] = $data['remarks'];
		$ins_data['addDate'] = date("Y-m-d h:i:sa");
		$ins_data['addBy'] = $_SESSION['user_name'];
		date_default_timezone_set("Asia/Kolkata");
		$ins_data['last_update'] = date('Y-m-d H:i:s');
		$re = $this->cm->insert_demo("demo", $ins_data);
		$ins_remark['demo_id'] = $re->demo_id;
		$ins_remark['demo_remark_date'] = date("Y-m-d h:i:sa");
		$ins_remark['demo_remark_comment'] = $data['remarks'];
		$ins_remark['demo_remark_by'] = $_SESSION['user_name'];
		$this->enq->insert_data("demo_remark", $ins_remark);
		if ($re) {
			if (!empty($select_faculty->phone)) {
				@$facultymsg = "Demo Name :" . $ins_data['name'] . "   DemoDate :" . $ins_data['demoDate'] . "    Time :" . $ins_data['fromTime'] . "    Course :" . $cccccc;
				$ch = curl_init();
				$url = 'http://dndsms.vishawebsolutions.com/api/mt/SendSMS?user=hitesh-RNW&password=Hitz9898&senderid=RNWEDU&channel=Trans&DCS=0&flashsms=0&number=' . $select_faculty->phone . '&text=' . $facultymsg . '&route=15';
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_FAILONERROR, true); // Required for HTTP error codes to be reported via our call to curl_error($ch)
				@curl_exec(@$ch);
				if (@curl_error(@$ch)) {
					//   echo $error_msg = curl_error($ch);
					
				}
				@curl_close(@$ch);
			}
			$recp['last_demo_id'] = $re->demo_id;
			$recp['all_record'] = array( 'status' => 1 , "msg" => "HI! Demo is Added.....");
			echo json_encode($recp);
		}else{
			$recp['all_record'] = array( 'status' => 2 , "msg" => "Something Wrong.....");
			echo json_encode($recp);
		}
	}

	public function demo_filter()
	{
		$filter = $this->input->post();
		$branch_id = $filter['filter_branch'];
		$courseName = $filter['filter_course'];
	    	
            $display['demo_all_search'] = $this->cm->get_branch_demo("demo", $branch_id);    
         	$display['demo_all_search'] = $this->cm->get_course_demo("demo", $courseName);    
            $display['filter_branch'] = $filter['filter_branch'];
            $display['filter_faculty'] = $filter['filter_faculty'];
            $display['filter_course'] = $filter['filter_course'];
            $display['filter_package'] = $filter['filter_package'];
            $display['filter_start_date'] = $filter['filter_start_date'];
            $display['filter_end_date'] = $filter['filter_end_date'];
            $display['filter_name'] = $filter['filter_name'];
            $display['filter_demo_id'] = $filter['filter_demo_id'];
            $display['filter_number'] = $filter['filter_number'];
      
			//$display['demo_all_search'] = $this->cm->get_demo_filter_reco("demo");
		
		$display['all_faculty'] = $this->cm->view_all("faculty");
		$display['all_place'] = $this->cm->view_all("place_type");
        $display['all_branches'] = $this->cm->view_all("branch");
        $display['all_product_type'] = $this->cm->view_all("product_type");
        $display['all_product'] = $this->cm->view_all_desc("product", "product_id");
		$display['all_product_enquiry'] = $this->cm->view_all("product_enquiry");
		$display['all_product_enquiry'] = $this->cm->view_all_desc("product_enquiry", "product_enquiry_id");
		$display['list_branch'] = $this->cm->view_all('branch');
		$display['list_department'] = $this->cm->view_all('department');
		$display['list_faculty'] = $this->cm->view_all_by_order("faculty","name", "asc");
		$display['all_faculty'] = $this->cm->view_all("faculty");
		$display['list_course'] = $this->cm->view_all_by_order("rnw_course","course_name", "asc");
		$display['list_package'] = $this->cm->view_all_by_order("rnw_package","package_name","asc");
		$display['list_sub_course'] = $this->cm->view_all_by_order("rnw_subcourse","subcourse_name","asc");
		$this->load->view('common/demo_search',$display);
	}

		public function view_profile()
	{
		$id = $_SESSION['user_id'];
		$u_id = $_SESSION['user_id'];
		if (!empty($this->input->post('cimage'))) {
            if ($_FILES['image']['name'] != "") {
                $config['allowed_types'] = "*";
                $config['upload_path'] = FCPATH . "dist/img/";
                $new_name = time() . $_FILES["image"]['name'];
                $config['file_name'] = $new_name;
                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('image')) {
                    $imagedata = $this->upload->data();
                    $image = FCPATH . "dist/img/" . $_SESSION['user_image'];
                    @unlink($image);
                } else {
                    $display['msgp'] = "image not uploaded";
                }
                $dataimg['image'] = @$imagedata['file_name'];
                $id = $_SESSION['user_id'];
                if ($_SESSION['logtype'] == "Super Admin") {
                    $re = $this->cm->update_data("admin", $dataimg, "id", $id);
                    $select_user = $this->cm->select_data("admin", "id", $id);
                } else if ($_SESSION['logtype'] == "Faculty") {
                    $re = $this->cm->update_data("faculty", $dataimg, "faculty_id", $id);
                    $select_user = $this->cm->select_data("faculty", "faculty_id", $id);
                } else {
                    $re = $this->cm->update_data("user", $dataimg, "user_id", $id);
                    $select_user = $this->cm->select_data("user", "user_id", $id);
                }
                if ($re) {
                    $this->session->set_userdata("user_image", $select_user->image);
                }
            } else {
                $display['msgp'] = "Please select Image";
            }
        }
		if ($_SESSION['logtype'] == "Super Admin") {
			$display['select_user'] = $this->cm->select_data("admin", "id", $id);
		} else if ($_SESSION['logtype'] == "Faculty") {
			$display['select_user'] = $this->cm->select_data("faculty", "faculty_id", $id);
		} else {
			$display['select_user'] = $this->cm->select_data("user", "user_id", $id);
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

		$display['all_branches'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['list_package'] = $this->cm->view_all("rnw_package");
		$display['all_user'] = $this->cm->view_all("user");
		$display['all_faculty'] = $this->cm->view_all("faculty");
		$display['all_hod'] = $this->cm->view_all("hod");
		$display['all_user_log'] = $this->cm->logtype_user("user");
		$display['all_admin_log'] = $this->cm->logtype_user("admin");
 
		$this->load->view('erp/erpheader', $update);
		$this->load->view('common/view_profile',$display);
	}

	public function change_user_pass()
	{
		$data = $this->input->post();
		$id = $_SESSION['user_id'];
		if ($_SESSION['logtype'] == "Super Admin") {
			$re = $this->cm->update_data("admin", $data, "id", $id);
		} else if ($_SESSION['logtype'] == "Faculty") {
			$re = $this->cm->update_data("faculty", $data, "faculty_id", $id);
		} else {
			$re = $this->cm->update_data("user", $data, "user_id", $id);
		}
		if ($re) {
			$recp['all_record'] = array( 'status' => 1 , "msg" => "HI! password is changed......");
			echo json_encode($recp);
			session_destroy();
		}
		else{
			$recp['all_record'] = array( 'status' => 2 , "msg" => "Something Wrong.....");
			echo json_encode($recp);
		}
	}

	public function change_user_details()
	{
		$data = $this->input->post();
		$u_id = $_SESSION['user_id'];
		//$fdata['logtype'] = $data['logtype'];
		$fdata['email'] = $data['email'];
		$fdata['designation'] = $data['designation'];
		$fdata['personal_no'] = $data['personal_no'];
		if ($_SESSION['logtype'] == "Super Admin") {
			$fdata['mobile_no'] = $data['mobile_no'];
			$re = $this->cm->update_data("admin", $fdata, "id", $u_id);
		} else if ($_SESSION['logtype'] == "Faculty") {
			$fdata['phone'] = $data['mobile_no'];
			$re = $this->cm->update_data("faculty", $fdata, "faculty_id", $u_id);
		} else if ($_SESSION['logtype'] == "hod") {
			$fdata['phone'] = $data['mobile_no'];
			$re = $this->cm->update_data("hod", $fdata, "hod_id", $u_id);
		} else {
			$fdata['mobile_no'] = $data['mobile_no'];
			$re = $this->cm->update_data("user", $fdata, "user_id", $u_id);
		}
		if ($re) {
			$recp['all_record'] = array( 'status' => 1 , "msg" => "HI! record is updated......");
			echo json_encode($recp);
		}
		else{
			$recp['all_record'] = array( 'status' => 2 , "msg" => "Something Wrong.....");
			echo json_encode($recp);
		}
	}


	public function sessionDelete()
	{
		session_destroy();
        redirect('welcome/login');
	}


	public function GetCityStatuWise(){
		$data = $this->input->post();
		$cities_reco = $this->cm->get_history_demo_students('cities','city_state',$data['state_name']);
		// print_r($cities_reco);
		// die;
		echo '<option value="">----Select City----</option>';
		foreach ($cities_reco as $co) {
			?>
			<option value="<?php echo $co->city_name; ?>"><?php echo $co->city_name; ?></option>
			<?php
		}
	}

	public function view_country(){
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
		$display['city_area_all'] = $this->cm->view_all("city_area");
		$display['state_all'] = $this->cm->view_all("state");
		$display['city_all'] = $this->cm->view_all("cities");
		$display['country_all'] = $this->cm->view_all("country");
      
        $this->load->view('erp/erpheader', $update);
        $this->load->view('common/view_country',$display);
    }

	public function get_recoCon()
    {
        $id = $this->input->post('id');
        $record['single_record'] = $this->cm->get_reco('country', 'country_id', $id);
        echo json_encode($record);
    }

    public function get_recoSta()
    {
        $id = $this->input->post('id');
        $record['single_record'] = $this->cm->get_reco('state', 'state_id', $id);
        echo json_encode($record);
    }
	public function get_recoCit()
    {
        $id = $this->input->post('id');
        $record['single_record'] = $this->cm->get_reco('cities', 'city_id', $id);
        echo json_encode($record);
    }
	public function get_recoArea()
    {
        $id = $this->input->post('id');
        $record['single_record'] = $this->cm->get_reco('city_area', 'area_id', $id);
        echo json_encode($record);
    }

    public function con_table()
	{	
		$data['all_place'] = $this->cm->view_all("place_type");
		 $data['all_branches'] = $this->cm->view_all("branch");
         $data['country_all'] = $this->cm->view_all("country");
		$this->load->view('common/ajex_contry_table', $data);
	}

	public function sta_table()
	{	
		$data['all_place'] = $this->cm->view_all("place_type");
		 $data['all_branches'] = $this->cm->view_all("branch");
		 $data['state_all'] = $this->cm->view_all("state");
         $data['country_all'] = $this->cm->view_all("country");
		$this->load->view('common/ajex_state_table', $data);
	}

	public function city_table()
	{	
		$data['all_place'] = $this->cm->view_all("place_type");
		 $data['all_branches'] = $this->cm->view_all("branch");
		 $data['state_all'] = $this->cm->view_all("state");
         $data['country_all'] = $this->cm->view_all("country");
		 $data['city_all'] = $this->cm->view_all("cities");
		$this->load->view('common/ajex_city_table', $data);
	}

	public function area_table()
	{	
		$data['all_place'] = $this->cm->view_all("place_type");
		 $data['all_branches'] = $this->cm->view_all("branch");
		 $data['state_all'] = $this->cm->view_all("state");
         $data['country_all'] = $this->cm->view_all("country");
		 $data['city_all'] = $this->cm->view_all("cities");
		 $data['city_area_all'] = $this->cm->view_all("city_area");
		$this->load->view('common/ajex_area_table', $data);
	}

    public function con_add()
	{		
        $data = $this->input->post();
        if ($this->input->post('country_id')) {
            $id = $this->input->post('country_id');
            unset($data['country_id']);
            $query = $this->cm->update_record('country', $data, 'country_id', $id); 
            if ($query) {
                $recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
                echo json_encode($recp); // echo "1";
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        } else {
            unset($data['country_id']);
            $query = $this->db->insert('country', $data);
            if ($query) {
                $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
                echo json_encode($recp); // echo "1";
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        }
	}

    public function sta_add()
	{		
        $data = $this->input->post();
        if ($this->input->post('state_id')) {
            $id = $this->input->post('state_id');
            unset($data['state_id']);
            $query = $this->cm->update_record('state', $data, 'state_id', $id); 
            if ($query) {
                $recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
                echo json_encode($recp); // echo "1";
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        } else {
            unset($data['state_id']);
            $query = $this->db->insert('state', $data);
            if ($query) {
                $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
                echo json_encode($recp); // echo "1";
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        }
	}

    public function delete_con() {
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

	public function created_city(){
		$data = $this->input->post();
        if ($this->input->post('city_id')) {
            $id = $this->input->post('city_id');
            unset($data['city_id']);
            $query = $this->cm->update_record('cities', $data, 'city_id', $id); 
            if ($query) {
                $recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
                echo json_encode($recp); // echo "1";
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        } else {
            unset($data['city_id']);
            $query = $this->db->insert('cities', $data);
            if ($query) {
                $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
                echo json_encode($recp); // echo "1";
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        }
	}

	public function created_area(){
		$data = $this->input->post();
        if ($this->input->post('area_id')) {
            $id = $this->input->post('area_id');
            unset($data['area_id']);
            $query = $this->cm->update_record('city_area', $data, 'area_id', $id); 
            if ($query) {
                $recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
                echo json_encode($recp); // echo "1";
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        } else {
            unset($data['area_id']);
            $query = $this->db->insert('city_area', $data);
            if ($query) {
                $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
                echo json_encode($recp); // echo "1";
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        }
	}


	public function view_employee_detail(){

		if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            $display['StaffDetail_all'] = $this->GoogleModel->filter_StaffDetails("staff_detail", $data);
            $display['filter_branch_id'] = @$data['filter_branch_id'];
            $display['filter_logtype'] = @$data['filter_logtype'];
            $display['filter_name'] = @$data['filter_name'];
            $display['filter_designation'] = @$data['filter_designation'];
            $display['filter_email'] = @$data['filter_email'];
            $display['filter_per_mob_no'] = @$data['filter_per_mob_no'];
            $display['filter_mob_no'] = @$data['filter_mob_no'];
        } else {
            $display['StaffDetail_all'] = $this->cm->view_all("staff_detail");
        }
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $display['all_user'] = $this->cm->view_all("user");
		$display['logtypestaff_all'] = $this->cm->view_all("staff_logtype");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['faculty_all'] = $this->cm->view_all_facultys("faculty");
        $display['hod_all'] = $this->cm->view_all_hods("hod");
		$display['list_branch'] = $this->cm->view_all('branch');
      
        $this->load->view('erp/erpheader', $update);
        $this->load->view('common/view_employee_detail',$display);
    }

	public function staff_tabel()
	{
		$display['all_user'] = $this->cm->view_all("user");
		$display['logtypestaff_all'] = $this->cm->view_all("staff_logtype");
        $display['StaffDetail_all'] = $this->cm->view_all("staff_detail");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['faculty_all'] = $this->cm->view_all_facultys("faculty");
        $display['hod_all'] = $this->cm->view_all_hods("hod");
		$display['list_branch'] = $this->cm->view_all('branch');
		$this->load->view('common/ajex_staff_table',$display);
	}


	public function log_tabel()
	{
		$display['all_user'] = $this->cm->view_all("user");
		$display['logtypestaff_all'] = $this->cm->view_all("staff_logtype");
        $display['StaffDetail_all'] = $this->cm->view_all("staff_detail");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['faculty_all'] = $this->cm->view_all_facultys("faculty");
        $display['hod_all'] = $this->cm->view_all_hods("hod");
		$display['list_branch'] = $this->cm->view_all('branch');
		$this->load->view('common/ajex_log_table',$display);
	}

	public function add_staff()
	{		
        $data = $this->input->post();
		$data['date_time'] = date('Y-m-d h:i:s');
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            unset($data['id']);
            $query = $this->cm->update_record('staff_detail', $data, 'id', $id); 
            if ($query) {
                $recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
                echo json_encode($recp); 
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); 
            }
        } else {
            unset($data['id']);
            $query = $this->db->insert('staff_detail', $data);
            if ($query) {
                $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
                echo json_encode($recp); 
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); 
            }
        }
	}

	public function add_logType()
	{		
        $data = $this->input->post();
        if ($this->input->post('logtype_id')) {
            $id = $this->input->post('logtype_id');
            unset($data['logtype_id']);
            $query = $this->cm->update_record('staff_logtype', $data, 'logtype_id', $id); 
            if ($query) {
                $recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
                echo json_encode($recp); 
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); 
            }
        } else {
            unset($data['logtype_id']);
            $query = $this->db->insert('staff_logtype', $data);
            if ($query) {
                $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
                echo json_encode($recp); 
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); 
            }
        }
	}

	public function get_recoStaff()
    {
        $id = $this->input->post('id');
        $record['single_record'] = $this->cm->get_reco('staff_detail', 'id', $id);
        echo json_encode($record);
    }

	public function get_recoLogtype()
    {
        $id = $this->input->post('id');
        $record['single_record'] = $this->cm->get_reco('staff_logtype', 'logtype_id', $id);
        echo json_encode($record);
    }

    public function clg_add()
	{		
        $data = $this->input->post();
		$data['added_at'] = date('Y-m-d h:i:s');
		$data['added_by'] = $_SESSION['user_name'];
        if ($this->input->post('clg_id')) {
            $id = $this->input->post('clg_id');
            unset($data['clg_id']);
            $query = $this->cm->update_record('clg_info', $data, 'clg_id', $id); 
            if ($query) {
                $recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
                echo json_encode($recp); // echo "1";
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        } else {
            unset($data['clg_id']);
            $query = $this->db->insert('clg_info', $data);
            if ($query) {
                $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
                echo json_encode($recp); // echo "1";
            } else {
                $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        }
	}

	public function clg_table()
	{	
		$data['all_place'] = $this->cm->view_all("place_type");
		 $data['all_branches'] = $this->cm->view_all("branch");
		 $data['state_all'] = $this->cm->view_all("state");
         $data['country_all'] = $this->cm->view_all("country");
		 $data['all_clg_info'] = $this->cm->view_all("clg_info");
		$this->load->view('common/ajex_clg_table', $data);
	}

	public function view_clg()
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
		$display['state_all'] = $this->cm->view_all("state");
		$display['city_all'] = $this->cm->view_all("cities");
		$display['country_all'] = $this->cm->view_all("country");
		$display['city_area_all'] = $this->cm->view_all("city_area");
		$display['all_clg_info'] = $this->cm->view_all("clg_info");
 
		$this->load->view('erp/erpheader', $update);
		$this->load->view('common/view_clg',$display);
    }

	public function get_recoclg()
    {
        $id = $this->input->post('id');
        $record['single_record'] = $this->cm->get_reco('clg_info', 'clg_id', $id);
        echo json_encode($record);
    }

   public function view_report(){

   		$ins_data = $this->input->post();
   		if (@$this->input->post('search') != "" && @$ins_data['filter_branch'] != "" || @$ins_data['filter_department'] != "") {
            if ($ins_data['filter_branch'] != "" && $ins_data['filter_department'] != "") {
                $bid = $ins_data['filter_branch'];
                $did = $ins_data['filter_department'];
                $display['filter_branch'] = $ins_data['filter_branch'];
                $display['filter_department'] = $ins_data['filter_department'];
                $que = "SELECT * FROM demo WHERE demoDate < Now() and demoDate > DATE_ADD(Now(), INTERVAL- 6 MONTH) and branch_id='$bid' and department_id='$did'";
            } else if ($ins_data['filter_branch'] != "") {
                $bid = $ins_data['filter_branch'];
                $display['filter_branch'] = $ins_data['filter_branch'];
                $que = "SELECT * FROM demo WHERE demoDate < Now() and demoDate > DATE_ADD(Now(), INTERVAL- 6 MONTH) and branch_id='$bid'";
            } else if ($ins_data['filter_department'] != "") {
                $did = $ins_data['filter_department'];
                $display['filter_department'] = $ins_data['filter_department'];
                $que = "SELECT * FROM demo WHERE demoDate < Now() and demoDate > DATE_ADD(Now(), INTERVAL- 6 MONTH) and department_id='$did'";
            }
            if (!empty( $que)) {
                $re = $this->db->query($que);
                $display['last'] = $re->result();
            }
        } else {
            $re = $this->db->query("SELECT * FROM demo WHERE demoDate < Now() and demoDate > DATE_ADD(Now(), INTERVAL- 6 MONTH)");
            $display['last'] = $re->result();
        }


		if (!empty($this->input->post('submit'))) {
			$data = $this->input->post();
			$display['demo_all'] = $this->GoogleModel->filter_ReportDemo("demo" , $data);
			$branch_ids = $_SESSION['branch_ids'];
			$b_id = explode(',',$branch_ids);
			$demoreco = array();
			foreach($display['demo_all'] as $val=>$k){
				for($i=0;$i<sizeof($b_id); $i++){
					if($b_id[$i] == $k->branch_id){
						$demoreco[] = $k;
					}
				}
			}
			$display['demo_all'] = $demoreco;
			if($_SESSION['logtype'] == 'Faculty'){
				$facdemo = array();
					$faculty_idss = $_SESSION['user_id'];
					foreach($display['demo_all'] as $val=>$k)
					{
						if($faculty_idss == $k->faculty_id)
						{
							$facdemo[] = $k;
						}
					}
					$facfinaldemo = array();
					for($i=0;$i<sizeof($facdemo);$i++)
					{
						$facdemoid = $facdemo[$i]->demo_id;
						$flag = 1;
						for($j=0;$j<sizeof($facfinaldemo);$j++)
						{
							if($facdemoid == $facfinaldemo[$j]->demo_id)
							{
								$flag=0;
								break;
							}
						}
						if($flag==1){
							$facfinaldemo[] = $facdemo[$i];
						}
					}
				$display['demo_all'] = $facfinaldemo;
			} elseif($_SESSION['logtype'] == 'HOD'){
					$hoddemo = array();
					$hod_ids = $_SESSION['user_id'];
					$fac_idsss = $_SESSION['faculty_id'];
					$fac_ids = explode(',', $fac_idsss);
					foreach($display['demo_all'] as $val=>$k)
					{
						for($i=0;$i<sizeof($fac_ids);$i++)
						{
							if($fac_ids[$i] == $k->faculty_id)
							{
								$hoddemo[] = $k;
							}
						}
					}
					$hodfacdemo = array();
					for($i=0;$i<sizeof($hoddemo);$i++)
					{
						$hoddemoid = $hoddemo[$i]->demo_id;
						$flag=1;
						if($flag==1)
						{
							$hodfacdemo[] = $hoddemo;
						}
					}
				$display['demo_all'] = $hodfacdemo;
			}
			// echo "<pre>";
			// print_r($display['demo_all']);
			// die;
		}else
		{
			$display['demo_all'] = $this->cm->view_all("demo");
			$branch_ids = $_SESSION['branch_ids'];
			$b_id = explode(',',$branch_ids);
			$demoreco = array();
			foreach($display['demo_all'] as $val=>$k){
				for($i=0;$i<sizeof($b_id); $i++){
					if($b_id[$i] == $k->branch_id){
						$demoreco[] = $k;
					}
				}
			}
			if($_SESSION['logtype'] == 'Faculty'){
				$facdemo = array();
					$faculty_idss = $_SESSION['user_id'];
					foreach($display['demo_all'] as $val=>$k)
					{
						if($faculty_idss == $k->faculty_id)
						{
							$facdemo[] = $k;
						}
					}
					$facfinaldemo = array();
					for($i=0;$i<sizeof($facdemo);$i++)
					{
						$facdemoid = $facdemo[$i]->demo_id;
						$flag = 1;
						for($j=0;$j<sizeof($facfinaldemo);$j++)
						{
							if($facdemoid == $facfinaldemo[$j]->demo_id)
							{
								$flag=0;
								break;
							}
						}
						if($flag==1){
							$facfinaldemo[] = $facdemo[$i];
						}
					}
				$display['demo_all'] = $facfinaldemo;
			} elseif($_SESSION['logtype'] == 'HOD'){
					$hoddemo = array();
					$hod_ids = $_SESSION['user_id'];
					$fac_idsss = $_SESSION['faculty_id'];
					$fac_ids = explode(',', $fac_idsss);
					foreach($display['demo_all'] as $val=>$k)
					{
						for($i=0;$i<sizeof($fac_ids);$i++)
						{
							if($fac_ids[$i] == $k->faculty_id)
							{
								$hoddemo[] = $k;
							}
						}
					}
					$hodfacdemo = array();
					for($i=0;$i<sizeof($hoddemo);$i++)
					{
						$hoddemoid = $hoddemo[$i]->demo_id;
						$flag=1;
						if($flag==1)
						{
							$hodfacdemo[] = $hoddemo;
						}
					}
				$display['demo_all'] = $hodfacdemo;
			}
			$display['demo_all'] = $demoreco;
		}


             if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();   
            $display['demo_all'] = $this->go->filter_report("demo" , $data);
            $branch_ids = $_SESSION['branch_ids'];
            $b_id = explode(',',$branch_ids);    
            $demoreco = array();
            foreach($display['demo_all'] as $val=>$k){
                for($i=0;$i<sizeof($b_id); $i++){
                    if($b_id[$i] == $k->branch_id){ 
                        $demoreco[] = $k;
                    }
                }
            }
            $display['two_analysis'] = $demoreco;
            if($_SESSION['logtype'] == 'Faculty'){
                $facdemo = array();
                    $faculty_idss = $_SESSION['user_id'];
                    foreach($display['two_analysis'] as $val=>$k)
                    {
                        if($faculty_idss == $k->faculty_id)
                        {
                            $facdemo[] = $k;
                        }
                    }
                    $facfinaldemo = array();
                    for($i=0;$i<sizeof($facdemo);$i++)     
                    {
                        $facdemoid = $facdemo[$i]->demo_id;
                        $flag = 1;
                        for($j=0;$j<sizeof($facfinaldemo);$j++)
                        {
                            if($facdemoid == $facfinaldemo[$j]->demo_id)
                            {
                                $flag=0;
                                break;
                            }
                        }
                        if($flag==1){
                            $facfinaldemo[] = $facdemo[$i];
                        }
                    }
                $display['two_analysis'] = $facfinaldemo;
            } elseif($_SESSION['logtype'] == 'HOD'){
                    $hoddemo = array();
                    $hod_ids = $_SESSION['user_id'];
                    $fac_idsss = $_SESSION['faculty_id'];
                    $fac_ids = explode(',', $fac_idsss);
                    foreach($display['two_analysis'] as $val=>$k)
                    {
                        for($i=0;$i<sizeof($fac_ids);$i++)
                        {
                            if($fac_ids[$i] == $k->faculty_id)
                            {
                                $hoddemo[] = $k;
                            }
                        }
                    }
                    $hodfacdemo = array();
                    for($i=0;$i<sizeof($hoddemo);$i++)
                    {
                        $hoddemoid = $hoddemo[$i]->demo_id;
                        $flag=1;
                        if($flag==1)
                        {
                            $hodfacdemo[] = $hoddemo;
                        }
                    }
                $display['two_analysis'] = $hodfacdemo;
            }
        }else{ 
            $display['two_analysis'] = $this->cm->view_all("demo");
                $branch_ids = $_SESSION['branch_ids'];
                $b_id = explode(',',$branch_ids);
                $demoreco = array();
                foreach($display['two_analysis'] as $val=>$k){
                    for($i=0;$i<sizeof($b_id); $i++){
                        if($b_id[$i] == $k->branch_id){
                            $demoreco[] = $k;
                        }
                    }
                }
                $display['two_analysis'] = $demoreco;
                if($_SESSION['logtype'] == 'Faculty'){
                    $facdemo = array();
                        $faculty_idss = $_SESSION['user_id'];
                        foreach($display['two_analysis'] as $val=>$k)
                        {
                            if($faculty_idss == $k->faculty_id)
                            {
                                $facdemo[] = $k;
                            }
                        }
                        $facfinaldemo = array();
                        for($i=0;$i<sizeof($facdemo);$i++)
                        {
                            $facdemoid = $facdemo[$i]->demo_id;
                            $flag = 1;
                            for($j=0;$j<sizeof($facfinaldemo);$j++)
                            {
                                if($facdemoid == $facfinaldemo[$j]->demo_id)
                                {
                                    $flag=0;
                                    break;
                                }
                            }
                            if($flag==1){
                                $facfinaldemo[] = $facdemo[$i];
                            }
                        }
                    $display['two_analysis'] = $facfinaldemo;
                } elseif($_SESSION['logtype'] == 'HOD'){
                        $hoddemo = array();
                        $hod_ids = $_SESSION['user_id'];
                        $fac_idsss = $_SESSION['faculty_id'];
                        $fac_ids = explode(',', $fac_idsss);
                        foreach($display['demo_all'] as $val=>$k)
                        {
                            for($i=0;$i<sizeof($fac_ids);$i++)
                            {
                                if($fac_ids[$i] == $k->faculty_id)
                                {
                                    $hoddemo[] = $k;
                                }
                            }
                        }
                        $hodfacdemo = array();
                        for($i=0;$i<sizeof($hoddemo);$i++)
                        {
                            $hoddemoid = $hoddemo[$i]->demo_id;
                            $flag=1;
                            if($flag==1)
                            {
                                $hodfacdemo[] = $hoddemo;
                            }
                        }
                    $display['two_analysis'] = $hodfacdemo;
                }
        }



        if (!empty($this->input->post('filter_outstanding_fees'))) {
            $data = $this->input->post();   
            $display['demo_all'] = $this->go->filter_report("demo" , $data);
            $branch_ids = $_SESSION['branch_ids'];
            $b_id = explode(',',$branch_ids);    
            $demoreco = array();
            foreach($display['demo_all'] as $val=>$k){
                for($i=0;$i<sizeof($b_id); $i++){
                    if($b_id[$i] == $k->branch_id){ 
                        $demoreco[] = $k;
                    }
                }
            }
            $display['two_analysis'] = $demoreco;
            if($_SESSION['logtype'] == 'Faculty'){
                $facdemo = array();
                    $faculty_idss = $_SESSION['user_id'];
                    foreach($display['two_analysis'] as $val=>$k)
                    {
                        if($faculty_idss == $k->faculty_id)
                        {
                            $facdemo[] = $k;
                        }
                    }
                    $facfinaldemo = array();
                    for($i=0;$i<sizeof($facdemo);$i++)     
                    {
                        $facdemoid = $facdemo[$i]->demo_id;
                        $flag = 1;
                        for($j=0;$j<sizeof($facfinaldemo);$j++)
                        {
                            if($facdemoid == $facfinaldemo[$j]->demo_id)
                            {
                                $flag=0;
                                break;
                            }
                        }
                        if($flag==1){
                            $facfinaldemo[] = $facdemo[$i];
                        }
                    }
                $display['two_analysis'] = $facfinaldemo;
            } elseif($_SESSION['logtype'] == 'HOD'){
                    $hoddemo = array();
                    $hod_ids = $_SESSION['user_id'];
                    $fac_idsss = $_SESSION['faculty_id'];
                    $fac_ids = explode(',', $fac_idsss);
                    foreach($display['two_analysis'] as $val=>$k)
                    {
                        for($i=0;$i<sizeof($fac_ids);$i++)
                        {
                            if($fac_ids[$i] == $k->faculty_id)
                            {
                                $hoddemo[] = $k;
                            }
                        }
                    }
                    $hodfacdemo = array();
                    for($i=0;$i<sizeof($hoddemo);$i++)
                    {
                        $hoddemoid = $hoddemo[$i]->demo_id;
                        $flag=1;
                        if($flag==1)
                        {
                            $hodfacdemo[] = $hoddemo;
                        }
                    }
                $display['two_analysis'] = $hodfacdemo;
            }
        }else{ 
            $display['two_analysis'] = $this->cm->view_all("demo");
                $branch_ids = $_SESSION['branch_ids'];
                $b_id = explode(',',$branch_ids);
                $demoreco = array();
                foreach($display['two_analysis'] as $val=>$k){
                    for($i=0;$i<sizeof($b_id); $i++){
                        if($b_id[$i] == $k->branch_id){
                            $demoreco[] = $k;
                        }
                    }
                }
                $display['two_analysis'] = $demoreco;
                if($_SESSION['logtype'] == 'Faculty'){
                    $facdemo = array();
                        $faculty_idss = $_SESSION['user_id'];
                        foreach($display['two_analysis'] as $val=>$k)
                        {
                            if($faculty_idss == $k->faculty_id)
                            {
                                $facdemo[] = $k;
                            }
                        }
                        $facfinaldemo = array();
                        for($i=0;$i<sizeof($facdemo);$i++)
                        {
                            $facdemoid = $facdemo[$i]->demo_id;
                            $flag = 1;
                            for($j=0;$j<sizeof($facfinaldemo);$j++)
                            {
                                if($facdemoid == $facfinaldemo[$j]->demo_id)
                                {
                                    $flag=0;
                                    break;
                                }
                            }
                            if($flag==1){
                                $facfinaldemo[] = $facdemo[$i];
                            }
                        }
                    $display['two_analysis'] = $facfinaldemo;
                } elseif($_SESSION['logtype'] == 'HOD'){
                        $hoddemo = array();
                        $hod_ids = $_SESSION['user_id'];
                        $fac_idsss = $_SESSION['faculty_id'];
                        $fac_ids = explode(',', $fac_idsss);
                        foreach($display['demo_all'] as $val=>$k)
                        {
                            for($i=0;$i<sizeof($fac_ids);$i++)
                            {
                                if($fac_ids[$i] == $k->faculty_id)
                                {
                                    $hoddemo[] = $k;
                                }
                            }
                        }
                        $hodfacdemo = array();
                        for($i=0;$i<sizeof($hoddemo);$i++)
                        {
                            $hoddemoid = $hoddemo[$i]->demo_id;
                            $flag=1;
                            if($flag==1)
                            {
                                $hodfacdemo[] = $hoddemo;
                            }
                        }
                    $display['two_analysis'] = $hodfacdemo;
                }
        }

        
        $re = $this->db->query("SELECT * FROM demo WHERE demoDate < Now() and demoDate > DATE_ADD(Now(), INTERVAL- 6 MONTH)");
            $display['last'] = $re->result();	
		$display['filter_branch'] = @$ins_data['filter_branch'];
        $display['filter_department'] = @$ins_data['filter_department'];
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
		$display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['all_department'] = $this->enq->view_all("department");
        $display['user_all'] = $this->cm->view_all("user");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['cancel_reason_all'] = $this->cm->view_all("cancel_reason_list");
        $display['faculty_analysis'] = $this->cm->view_all("demo");  
		$display['logtypestaff_all'] = $this->cm->view_all("staff_logtype");
		$display['all_user'] = $this->cm->view_all("user");

        $this->load->view('erp/erpheader', $update);
        $this->load->view('common/view_report',$display);
    }

	public function getlogtypeuser()
	{
		$data = $this->input->post();
		$b_id = $data['branch_id'];
		$logtype = $data['logtype_name'];
        $User = $this->cm->select_result('user','logtype',$logtype);
        echo '<option value="">----Select User----</option>';
        foreach ($User as $val) {
            $flag = 0;
            $dnbi = explode(',', $val->branch_ids);
            if (in_array($b_id, $dnbi)) {
                $flag = 1;
            }
            if ($flag == 1) {
                ?>
				<option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
				<?php
            }
		}
	}

	public function view_faculty_report(){
        if (!empty($this->input->post('faculty_analysis'))) {
        $data = $this->input->post();
        $display['faculty_analysis'] = $this->cm->filter_demo_faculty_analysis("demo", $data);
        $display['filter_demoDate_start'] = @$data['filter_demoDate_start'];
        $display['filter_demoDate_end'] = @$data['filter_demoDate_end'];
        } else {
            $display['faculty_analysis'] = $this->cm->view_all("demo");
        }
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['cancel_reason_all'] = $this->cm->view_all("cancel_reason_list");
        $this->load->view('erp/erpheader', $update);
        $this->load->view('common/view_faculty_report',$display);
    }

     


	
}
