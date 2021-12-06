<?php
class Common extends CI_controller
{
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
		// $this->load->library('pdf');
		$this->load->helper('cookie');
		$this->load->library('upload');
		$this->load->library('session');
	}

	public function managementForm()
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

		$display['form_all'] = $this->cm->view_all("form_list");

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
		if (!empty($this->input->post('filter_course'))) {
			$data = $this->input->post();
			$display['coursefilter'] = $this->cm->filter_course($data);
			$display['subdepartment_single_c'] = @$data['subdepartment_single_c'];
			$display['filter_single_course'] = @$data['filter_single_course'];
			$cname = $this->cm->select_data("course", "course_id", $data['filter_single_course']);
			//logdata($cname->course_name . " Course detail search");
		}
		if (!empty($this->input->post('filter_package_course'))) {
			$data = $this->input->post();
			$display['packagefilter'] = $this->cm->filter_packages($data);
			$display['subdepartment'] = @$data['subdepartment'];
			$display['filter_package'] = @$data['filter_package'];
			$pname = $this->cm->select_data("package", "package_id", $data['filter_package']);
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
		$update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
		$update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
		$update['course_completed'] = $this->cm->course_completed_student("admission_courses");
		$update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
		$update['course_data'] = $this->cm->view_all("course");
		$update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");
 
		$this->load->view('erp/erpheader', $update);
		$this->load->view('common/com_complain');
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
		$display['list_faculty'] = $this->cm->view_all_by_order("faculty","name", "asc");
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
		print_r($bid);
		die();
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
        $record = array('from_date' => $data['from_date'], 'to_date' => $data['to_date'], 'batch_tiaming_from' => $data['batch_tiaming_from'], 'batch_tiaming_to' =>  $data['batch_tiaming_to'], 'gr_id' => $data['gr_id'], 'parent_no' => $data['parent_no'],'branch_id' => $branch_id ,'faculty_name' => $faculty_id, 'hod_name' => $hod_id,'type' =>$type,'course_name' => $course_id ,'package_name' => $package_id,'uniform' => $uniform, 'discipline' => $discipline, 'student_behavior_mark' => $student_behavior_mark, 'faculty_behavior_mark' => $faculty_behavior_mark, 'total_work_days' => $total_work_days, 'total_present_days' => $total_present_days, 'total_attendance_percentage' => $total_attendance_percentage, 'total_project' => $total_project, 'submited' => $submited, 'submited_percentage' => $submited_percentage, 'on_time' => $on_time, 'on_time_percentage' => $on_time_percentage, 'quality' => $quality, 'total_activity' => $total, 'participated' => $participated, 'participated_percentage' => $participated_percentage, 'remarks' => $remarks,'addedby' => $addedby, 'created_at' => $created_at);
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
				<option value="<?php echo $co['course_name']; ?>"><?php echo $co['course_name']; ?></option>
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
				<option value="<?php echo $pac['package_name']; ?>"><?php echo $pac['package_name']; ?></option>
				<?php
            }
        }
    }
}
