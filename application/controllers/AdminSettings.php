<?php
class AdminSettings extends CI_controller
{
	function __construct()
	{
		@parent::__construct();
		$this->load->model("Dbcommon", "cm");
		$this->load->model("AdminSettingsModel", "admin");
		$this->load->model("Quickadmissionprocess", "admi");
		$this->load->model("Task", "tm");
		$this->load->library("pagination");
		$this->load->library('email');
		// $this->load->library('pdf');
		$this->load->helper('cookie');
		$this->load->library('upload');
		$this->load->library('session');
	}

	public function createbranch()
	{
		$display['receipt'] = $this->cm->view_all("receipt_permission");
		if (!empty($this->input->post('filter_branch_data'))) {
			$filter = $this->input->post();

			$display["branch_all"] = $this->admin->fetch_branch_reco("branch", $filter);
			$display['filter_branch'] = @$filter['filter_branch'];
			$display['filter_mobile_one'] = @$filter['mobile_one'];
			$display['filter_admin_id'] = @$filter['admin_id'];
			$display['filter_bank_name'] = @$filter['bank_name'];
		} else {
			$display['branch_all'] = $this->admin->fetch_branch_reco("branch");
		}


		$display['department_all'] = $this->cm->view_all("department");
		$display['country_all'] = $this->cm->view_all("country");
		$display['state_all'] = $this->cm->view_all("state");
		$display['city_all'] = $this->cm->view_all("cities");
		$display['user_all'] = $this->cm->Role_all_admin("user");
		$display['all_gst_daynamic_field'] = $this->cm->view_all("gst_daynamic_field");
		$update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");
		$update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");

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
		$this->load->view('admin/createbranch', $display);
	}

	public function ajax_branch_submit()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();

			date_default_timezone_set('Asia/Kolkata');
			$data['created_date'] = date('d-m-Y h:i:s');
			$data['created_by'] = $_SESSION['user_name'];
			unset($data['submit']);
			@$data['logtype'] = "Branch";
			@$data['session'] = implode(',', $data['session']);
			if ($_SESSION['logtype'] == "Super Admin") {
				@$data['admin_id'] = $data['admin_id'];
				@$data['country_id'] = $data['country_id'];
				@$data['state_id'] = $data['state_id'];
				@$data['city_id'] = $data['city_id'];
			} else {
				@$data['admin_id'] = $_SESSION['admin_id'];
				$all = $this->cm->select_data("user", "admin_id", $_SESSION['admin_id']);
				@$data['country_id'] = $data['country_id'];
				@$data['state_id'] = $all->state_id;
				@$data['city_id'] = $all->city_id;
			}

			$config['allowed_types'] = "*";
			$config['upload_path'] = FCPATH . "dist/branchlogo/";
			$new_name = time() . @$_FILES["branch_logo"]['name'];
			$config['file_name'] = $new_name;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('branch_logo')) {
				$imagedata = $this->upload->data();
				$data['branch_logo'] = $imagedata['file_name'];
				$config['image_library'] = 'gd2';
				$config['source_image'] = './dist/branchlogo/' . $imagedata['file_name'];
				$config['new_image'] = './dist/branchlogo/';
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

			if ($this->input->post('branch_id')) {
				$id = $this->input->post('branch_id');
				unset($data['branch_id']);
				$query = $this->admin->update_record('branch', $data, 'branch_id', $id);
				if ($query) {
					$recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			} else {
				unset($data['branch_id']);
				$query = $this->admin->import_record('branch', $data);
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

	public function get_record_branch()
	{
		$branch_id = $this->input->post('branch_id');
		$record['single_record'] = $this->admin->get_reco('branch', 'branch_id', $branch_id);
		echo json_encode($record);
	}

	public function get_course_package() {
		$user_id = $this->input->post('user_id');

		$record['single_record'] = $this->admin->get_reco("user", "user_id", $user_id);

		echo json_encode($record);
		// echo "<pre>";
		// print_r($data);
		// exit;
	}

	public function ajax_course_package_submit()
	{
		if ($this->input->post('submit_course_package')) {
			$data = $this->input->post();
			$id = $data['user_id_co_pk'];

			unset($data['user_id_co_pk']);
			unset($data['submit_course_package']);
			unset($data['hcourse']);
			unset($data['hpackage']);

			$data['course_ids'] = isset($data['course_ids']) ? implode(",", $data['course_ids']) : '';
			$data['package_ids'] = isset($data['package_ids']) ? implode(",", $data['package_ids']) : '';

			$query = $this->admin->update_record('user', $data, 'user_id', $id);
		
			if ($query) {
				$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Updated");
				echo json_encode($recp); // echo "1";
			} else {
				$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
				echo json_encode($recp); // echo "2";
			}
		 }
	}

	public function createdepartment()
	{
		if (!empty($this->input->post('filter_dept_data'))) {
			$filter = $this->input->post();
			$display['department_all'] = $this->admin->fetch_dept_record("department", $filter);
			$all = array();

			if (!empty($filter['filter_b_ids'])) {
				foreach($filter['filter_b_ids'] as $bid) {
					foreach($display['department_all'] as $val) {
						$arr = explode(",", $val->branch_id);
		
						if (in_array($bid, $arr)) {
							array_push($all, $val);
						}
					}
				}
				$display['department_all'] = @$all;
				$display['filter_b_ids'] = @$filter['filter_b_ids'];
			}

			$display['filter_b_ids'] = @$filter['filter_b_ids'];
			$display['filter_department_name'] = @$filter['filter_department_name'];
		} else {
			$display['department_all'] = $this->cm->view_all_data("department");
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

		
		$display['branch_all'] = $this->cm->view_all_data("branch");
		$display['state_all'] = $this->cm->view_all("state");
		$display['city_all'] = $this->cm->view_all("cities");
		$display['user_all'] = $this->cm->Role_all_admin("user");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('admin/createdepartment', $display);
	}

	public function ajax_dept_submit() {
		if (!empty($this->input->post('submit'))) {
			$data = $this->input->post();
			$all = $this->cm->select_data("user", "user_id", $data['admin_id']);
			unset($data['update_id']);
			unset($data['submit']);
			if (empty($data['b_ids'])) {
				$branch_id = $data['b_ids'] = "";
			} else {
				$branch_id = implode(",", @$data['b_ids']);
			}
			if ($_SESSION['logtype'] == "Super Admin") {
				$ins_data['admin_id'] = $data['admin_id'];
				$all = $this->cm->select_data("user", "admin_id", $data['admin_id']);
				$ins_data['state_id'] = $all->state_id;
				$ins_data['city_id'] = $all->city_id;
			} else {
				$ins_data['admin_id'] = $_SESSION['admin_id'];
				$all = $this->cm->select_data("user", "admin_id", $_SESSION['admin_id']);
				$ins_data['state_id'] = $all->state_id;
				$ins_data['city_id'] = $all->city_id;
			}
			$ins_data['branch_id'] = $branch_id;
			$ins_data['department_name'] = $data['department_name'];

			if ($this->input->post('department_id')) {
				$id = $this->input->post('department_id');
				unset($data['department_id']);
				$query = $this->admin->update_record('department', $ins_data, 'department_id', $id);
				if ($query) {
					$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			} else {
				$result = $this->admin->get_dept_reco("department", "department_name", $ins_data['department_name']);
				//print_r($result);exit;
				$flag = false;
				if (!empty($result)) {
					$branch_id = explode(",", $result->branch_id);

					foreach ($data['b_ids'] as $bid) {
						if (in_array($bid, $branch_id)) {
							$flag = true;
						}
					}
					// echo "<pre>";
					// print_r($branch_id);
					// print_r($data);
					// exit;
				}



				if (!$flag) {
					$re = $this->cm->insert_data("department", $ins_data);
					if ($re) {
						$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
						echo json_encode($recp);
					} else {
						$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong.");
						echo json_encode($recp);
					}
				} else {
					$recp["all_record"] = array('status' => 2, "msg" => "Department name already exit for selected branch.");
					echo json_encode($recp);
				}
			}
		}
	}

	public function ajax_subdept_submit() {
		if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            $all = $this->cm->select_data("user", "user_id", $data['admin_id']);
            unset($data['update_id']);
            unset($data['submit']);
            if ($_SESSION['logtype'] == "Super Admin") {
                $ins_data['admin_id'] = $data['admin_id'];
                $all = $this->cm->select_data("user", "admin_id", $data['admin_id']);
                $ins_data['state_id'] = $all->state_id;
                $ins_data['city_id'] = $all->city_id;
            } else {
                $ins_data['admin_id'] = $_SESSION['admin_id'];
                $all = $this->cm->select_data("user", "admin_id", $_SESSION['admin_id']);
                $ins_data['state_id'] = $all->state_id;
                $ins_data['city_id'] = $all->city_id;
            }
            if (empty($data['b_ids'])) {
                $branch_id = $data['b_ids'] = "";
            } else {
                $branch_id = implode(",", @$data['b_ids']);
            }
            $ins_data['branch_id'] = $branch_id;
            $ins_data['department_ids'] = $data['department_ids'];
            $ins_data['subdepartment_name'] = $data['subdepartment_name'];

			if ($this->input->post('subdepartment_id')) {
				$id = $this->input->post('subdepartment_id');
				unset($data['subdepartment_id']);
				$query = $this->admin->update_record('subdepartment', $ins_data, 'subdepartment_id', $id);
				if ($query) {
					$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			} else {
				$result = $this->admin->get_dept_reco("subdepartment", "subdepartment_name", $ins_data['subdepartment_name']);
				$flag = false;
				
				if (!empty($result)) {
					$department_ids = explode(",", $result->department_ids);
					if (in_array($data['department_ids'], $department_ids)) {
						$flag = true;
					}
				}

				if (!$flag) {
					$re = $this->cm->insert_data("subdepartment", $ins_data);
					if ($re) {
						$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
						echo json_encode($recp);
					} else {
						$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong.");
						echo json_encode($recp);
					}
				} else {
					$recp["all_record"] = array('status' => 2, "msg" => "Sub Department name already exit for selected department.");
					echo json_encode($recp);
				}
			}
		}
	}

	public function ajax_user_submit() {
		// 	echo "<pre>";	
		// print_r($this->input->post());
		// exit;
		if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            $logall = $this->cm->select_data("logtype", "logtype_name", $data['logtype']);
			//print_r($logall); exit;
            if ($_SESSION['logtype'] == "Super Admin") {
                $ins_data['admin_id'] = $data['admin_id'];
                $all = $this->cm->select_data("user", "admin_id", $data['admin_id']);
                $ins_data['state_id'] = $all->state_id;
                $ins_data['city_id'] = $all->city_id;
            } else {
                $ins_data['admin_id'] = $_SESSION['admin_id'];
                $all = $this->cm->select_data("user", "admin_id", $_SESSION['admin_id']);
                // print_r($all);
                // die;
                $ins_data['state_id'] = $all->state_id;
                $ins_data['city_id'] = $all->city_id;
            }
            $ins_data['logtype'] = $logall->logtype_name;
            @$ins_data['branch_ids'] = implode(",", $data['b_ids']);
            if (empty($ins_data['branch_ids'])) {
                $ins_data['branch_ids'] = "";
            }
            @$ins_data['department_ids'] = implode(",", $data['depart_ids']);
            if (empty($ins_data['department_ids'])) {
                $ins_data['department_ids'] = "";
            }
            @$ins_data['subdepartment_ids'] = implode(",", $data['subdepart_ids']);
            if (empty($ins_data['subdepartment_ids'])) {
                $ins_data['subdepartment_ids'] = "";
            }
            $ins_data['name'] = $data['name'];
            $ins_data['email'] = $data['email'];
            $ins_data['password'] = $data['password'];
            // print_r($ins_data);
            // die();
            $ins_data['permission'] = implode(",", $data['f_all']);
            $ins_data['f_permission'] = implode(",", $data['fp']);
            $ins_data['m_permission'] = implode(",", $data['m_all']);
            $ins_data['m_parent_id'] = isset($data['m_parent_id']) ? $data['m_parent_id'] : '';
            if (!empty($this->input->post('update_id'))) {
				//print_r($ins_data); exit;
                $id = $this->input->post('update_id');
                $re = $this->cm->update_data("user", $ins_data, "user_id", $id);
				if ($re) {
					$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp);
				} else {
					$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
					echo json_encode($recp);
				}
                //logdata("user id= " . $id . " user name=" . $ins_data['name'] . " Update");
            } else {
                $re = $this->cm->insert_data("user", $ins_data);
				if ($re) {
					$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
					echo json_encode($recp);
				} else {
					$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
					echo json_encode($recp);
				}
                //logdata("user name=" . $ins_data['name'] . " add");
            }
        }
	}

	public function get_record_dept()
	{
		$department_id = $this->input->post('department_id');
		//print_r($this->input->post()); exit;
		$record['single_record'] = $this->admin->get_reco('department', 'department_id', $department_id);
		echo json_encode($record);
	}

	public function get_record_user()
	{
		$user_id = $this->input->post('user_id');
		//print_r($this->input->post()); exit;
		$record['single_record'] = $this->admin->get_reco('user', 'user_id', $user_id);
		echo json_encode($record);
	}

	public function get_record_subdept()
	{
		$subdepartment_id = $this->input->post('subdepartment_id');
		//print_r($this->input->post()); exit;
		$record['single_record'] = $this->admin->get_reco('subdepartment', 'subdepartment_id', $subdepartment_id);
		echo json_encode($record);
	}

	public function createsubdepartment()
	{
		if (!empty($this->input->post('filter_subdept_data'))) {
			$filter = $this->input->post();
			$display['subdepartment_all'] = $this->admin->fetch_subdept_reco("subdepartment", $filter);
			$all = array();

			if (!empty($filter['filter_b_ids'])) {
				foreach($filter['filter_b_ids'] as $bid) {
					foreach($display['subdepartment_all'] as $val) {
						$arr = explode(",", $val->branch_id);
		
						if (in_array($bid, $arr)) {
							array_push($all, $val);
						}
					}
				}
				$display['subdepartment_all'] = @$all;
				$display['filter_b_ids'] = @$filter['filter_b_ids'];
			}

			$display['filter_b_ids'] = @$filter['filter_b_ids'];
			$display['filter_subdepartment_name'] = @$filter['filter_subdepartment_name'];
		} else {
			$display['subdepartment_all'] = $this->cm->view_all_data("subdepartment");
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

		$display['branch_all'] = $this->cm->view_all_data("branch");
		$display['department_all'] = $this->cm->view_all_data("department");
		$display['state_all'] = $this->cm->view_all("state");
		$display['city_all'] = $this->cm->view_all("cities");
		$display['user_all'] = $this->cm->Role_all_admin("user");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('admin/createsubdepartment', $display);
	}

	public function createuser()
	{
		if (!empty($this->input->post('filter_user_data'))) {
			
			$filter = $this->input->post();
			$display['user_all'] = $this->admin->fetch_user_reco("user", $filter);

			$all = array();

			if (!empty($filter['filter_b_ids'])) {
				foreach($filter['filter_b_ids'] as $bid) {
					foreach($display['user_all'] as $val) {
						$arr = explode(",", $val->branch_ids);
		
							if (in_array($bid, $arr)) {
								array_push($all, $val);
							}
					}
				}
				$display['filter_b_ids'] = @$filter['filter_b_ids'];
			}

			if (!empty($filter['filter_depart_ids'])) {
				foreach($filter['filter_depart_ids'] as $bid) {
					foreach($display['user_all'] as $val) {
						$arr = explode(",", $val->department_ids);
		
						if (in_array($bid, $arr)) {
							array_push($all, $val);
						}
					}
				}
				$display['filter_depart_ids'] = @$filter['filter_depart_ids'];
			}

			if (!empty($filter['filter_subdepart_ids'])) {
				foreach($filter['filter_subdepart_ids'] as $bid) {
					foreach($display['user_all'] as $val) {
						$arr = explode(",", $val->subdepartment_ids);
		
						if (in_array($bid, $arr)) {
							array_push($all, $val);
						}
					}
				}
				$display['filter_subdepart_ids'] = @$filter['filter_subdepart_ids'];
			}

			$duplicate_keys = array();
    		$tmp = array();       

			foreach ($all as $key => $val){
				// convert objects to arrays, in_array() does not support objects
				if (is_object($val))
					$val = (array)$val;

				if (!in_array($val, $tmp))
					$tmp[] = $val;
				else
					$duplicate_keys[] = $key;
			}

			foreach ($duplicate_keys as $key)
				unset($all[$key]);

			$display['filter_logtype'] = @$filter['filter_logtype'];	
			$display['filter_name'] = @$filter['filter_name'];	
			
			if ($_SESSION['logtype'] == "Super Admin") {
				$display['logtype_all'] = $this->cm->filter_data("logtype", "parent_id", "0");
			} else {
				$display['logtype_all'] = $this->tm->view_all("logtype");
			}
		} else {
			if ($_SESSION['logtype'] == "Super Admin") {
				$display['user_all'] = $this->cm->view_all_user("user");
				$display['logtype_all'] = $this->cm->filter_data("logtype", "parent_id", "0");
			} else {
				$display['user_all'] = $this->tm->view_all("user");
				$display['logtype_all'] = $this->tm->view_all("logtype");
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
		$update['course_all'] = $this->admin->view_all_by_order("course", "course_name", "asc");
		$update['package_all'] = $this->admin->view_all_by_order("package", "package_name", "asc");

		
		$display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['subdepartment_all'] = $this->cm->view_all("subdepartment");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('admin/createuser', $display);
	}

	public function get_record_receipt()
	{
		$id = $this->input->post('branch_id');
		$data['single_record'] = $this->cm->get_receipt_permission_record('receipt_permission', 'branch_id', $id);
		echo json_encode(array('record' => $data));
	}

	public function Admission_upd_receipt_permission()
	{
		$data = $this->input->post();
		$receipt_permission_id = $data['receipt_permission_id'];
		date_default_timezone_set("Asia/Calcutta");
		$created_date = date('d-M-Y h:i A');
		$addby = $_SESSION['user_name'];
		$record = array('receipt_type' => $data['receipt_type'], 'logo' => $data['logo'], 'branch_title' => $data['branch_title'], 'address' => $data['address'], 'course' => $data['course'], 'receipt_no' => $data['receipt_no'], 'receipt_date' => $data['receipt_date'], 'gr_id' => $data['gr_id'], 'enrollment_no' => $data['enrollment_no'], 'gst_no' => $data['gst_no'], 'name' => $data['name'], 'pay_now' => $data['pay_now'], 'installment_no' => $data['installment_no'], 'tuition_fees' => $data['tuition_fees'], 'total_pay' => $data['total_pay'], 'the_sum_of' => $data['the_sum_of'], 'remarks' => $data['remarks'], 'addby' => $addby, 'created_date' => $created_date);
		$re = $this->cm->upd_receipt_permission('receipt_permission', $record, 'receipt_permission_id', $receipt_permission_id);
		if ($re) {
			$record = array('status' => 1, "msg" => "Successfully Updated Permission");
			$recp['all_record'] = $record;
			echo json_encode($recp);
		} else {
			$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
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

	public function filter_branch_record()
	{
		if (!empty($this->input->post('filter_branch_data'))) {
			$filter = $this->input->post();

			$display["overdue_fees_list"] = $this->admin->fetch_filter_branch("branch", $filter);
			$display['filter_fname'] = @$filter['filter_fname'];
			$display['filter_lname'] = @$filter['filter_lname'];
			$display['filter_email'] = @$filter['filter_email'];
			$display['filter_mobile'] = @$filter['filter_mobile'];
			$display['filter_enrollnno'] = @$filter['filter_enrollnno'];
			$display['filter_branch'] = @$filter['filter_branch'];
			$display['filter_course'] = @$filter['filter_course'];
			$display['filter_package'] = @$filter['filter_package'];
			$display['filter_from_date'] = @$filter['filter_from_date'];
			$display['filter_to_date'] = @$filter['filter_to_date'];
			$display['filter_on'] = "dfgf";
		} else {
			$display['overdue_fees_list'] = $this->admi->fetch_overdue_fees("branch");
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


		$display['upd_faculty'] = $this->cm->view_all("faculty");
		$display['upd_branch'] = $this->cm->view_all("branch");
		$display['upd_see'] = $this->cm->check_update("demo");
		$display['list_source'] = $this->cm->view_all("source");
		$display['list_department'] = $this->cm->view_all("department");
		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("course");
		$display['list_package'] = $this->cm->view_all("package");
		$display['list_source'] = $this->cm->view_all("source");
		$display['list_country'] = $this->cm->view_all("country");
		$display['list_state'] = $this->cm->view_all("state");
		$display['list_city'] = $this->cm->view_all("cities");
		$display['list_area'] = $this->cm->view_all("area");
		$display['list_batch'] = $this->cm->view_all("batch_list");
		$display['all_admission'] = $this->cm->view_all("admission_process");
		$display['hod_all'] = $this->cm->view_all_hod_demo("hod");
		$display['faculty_all'] = $this->cm->view_all("faculty");
		$display['admisison_process_data'] = $this->cm->view_all("admission_process");
		$display['overdue_fees_counting_list'] = $this->admi->overdue_fees_counting("admission_installment");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/overdue_fees', $display);
	}

	public function Admission_receipt_permission()
	{
		$data = $this->input->post();
		date_default_timezone_set("Asia/Calcutta");
		$created_date = date('d-M-Y h:i A');
		$addby = $_SESSION['user_name'];
		for ($i = 0; $i < sizeof($data['branch_id']); $i++) {
			$branches = $this->admi->view_all('branch');
			foreach ($branches as $dn) {
				$flag = 0;
				$dnbi = explode(',', $data['branch_id'][$i]);
				if (in_array($dn['branch_id'], $dnbi)) {
					$flag = 1;
				}

				if ($flag == 1) {
					$record = array('branch_id' => $dn['branch_id'], 'receipt_type' => $data['receipt_type'], 'logo' => $data['logo'], 'branch_title' => $data['branch_title'], 'address' => $data['address'], 'course' => $data['course'], 'receipt_no' => $data['receipt_no'], 'receipt_date' => $data['receipt_date'], 'gr_id' => $data['gr_id'], 'enrollment_no' => $data['enrollment_no'], 'gst_no' => $data['gst_no'], 'name' => $data['name'], 'pay_now' => $data['pay_now'], 'installment_no' => $data['installment_no'], 'tuition_fees' => $data['tuition_fees'], 'total_pay' => $data['total_pay'], 'the_sum_of' => $data['the_sum_of'], 'remarks' => $data['remarks'], 'addby' => $addby, 'created_date' => $created_date);
					$result = $this->admi->save_data('receipt_permission', $record);
					if ($result) {
						$status_check = 1;
					} else {
						$status_check = 0;
					}
				}
			}
		}
		if ($status_check == 1) {
			$record = array('status' => 1, "msg" => "Successfully Posted Permission");
			$recp['all_record'] = $record;
			echo json_encode($recp);
		} else {
			$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp);
		}
	}

	function fetch_parent () {
		//echo "<pre>";
		// print_r($this->input->post());
		// exit;
		$users = $this->admi->view_all('user');

		$Selected_branches = $this->input->post('branch_ids');

		if (!is_array($Selected_branches)) {
			$Selected_branches = explode(",", $Selected_branches);
		}
		$logtype = $this->input->post('logtype');
		$m_parent_id = $this->input->post('m_parent_id');

		//echo $m_parent_id; exit;
		$data = [];
		foreach ($users as $u) {
			$flag = 0;
			$branches = explode(",", $u['branch_ids']);
			//print_r($Selected_branches); exit;
			$temp = [];
			foreach ($Selected_branches as $sb) {
				if (in_array($sb, $branches)) {
					if (!in_array($u['user_id'], $temp)) {
						array_push($temp, $u['user_id']);
						if ($logtype === 'Center Head' && $u['logtype'] === 'Manager') {
							?>
								<option 
									<?php if ($m_parent_id === $u['user_id']) { echo "selected"; } ?>
									value="<?php echo $u['user_id']; ?>"><?php echo $u['name']; ?></option>
							<?php
						} else if ($logtype === 'HOD' && $u['logtype'] === 'Center Head') {
							?>
								<option 
									<?php if ($m_parent_id === $u['user_id']) { echo "selected"; } ?>
									value="<?php echo $u['user_id']; ?>"><?php echo $u['name']; ?></option>
							<?php
						}  else if ($logtype !== 'Center Head' && $logtype !== 'Manager' && $logtype !== 'HOD' && $u['logtype'] === 'HOD') {
							?>
								<option 
									<?php if ($m_parent_id === $u['user_id']) { echo "selected"; } ?>
									value="<?php echo $u['user_id']; ?>"><?php echo $u['name']; ?></option>
							<?php
						}
					}
				}
			}
		}
	}

	public function course()
	{
		if (!empty($this->input->post('filter_course_data'))) {
			$filter = $this->input->post();

			$display["course_all"] = $this->admin->fetch_course_reco("rnw_course", $filter);
			$display['filter_branch'] = @$filter['filter_branch'];
			$display['filter_department'] = @$filter['filter_department'];
			$display['filter_subdepartment'] = @$filter['filter_subdepartment'];
			$display['filter_course'] = @$filter['filter_course'];
			$display['filter_code'] = @$filter['filter_code'];
		} else {
			$display['course_all'] = $this->admin->fetch_course_reco("rnw_course");
		}

		$display['country_all'] = $this->cm->view_all("country");
		$display['state_all'] = $this->cm->view_all("state");
		$display['city_all'] = $this->cm->view_all("cities");
		$display['user_all'] = $this->cm->Role_all_admin("user");
		$display['branch_all'] = $this->cm->view_all("branch");
		$display['department_all'] = $this->cm->view_all("department");
		$display['subdepartment_all'] = $this->cm->view_all("subdepartment");
		$display['all_gst_daynamic_field'] = $this->cm->view_all("gst_daynamic_field");
		$update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");
		$update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");

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
		$this->load->view('admin/course', $display);
	}

	public function ajax_branch_wise()
    {
        $data = $this->input->post();
        $b_id = $data['branch_id'];
        $department = $this->admi->view_all('department');
        foreach ($department as $dn) {
            $flag = 0;
            $dnbi = explode(',', $dn['branch_id']);
            for ($i = 0; $i < sizeof($b_id); $i++) {
                if (in_array($b_id[$i], $dnbi)) {
                    $flag = 1;
                }
            }
            if ($flag == 1) {
        ?>
                <option value="<?php echo $dn['department_id']; ?>"><?php echo $dn['department_name']; ?></option>
            <?php
            }
        }
    }

	public function ajax_department_wise()
    {
        $b_all = $this->input->post('department_id');
        if (!empty($b_all)) {
            foreach ($b_all as $key => $value) {
                if (!empty($value)) {
                    $data = $this->cm->filter_data("subdepartment", "department_ids", $value);
                    $b = $this->cm->select_data("department", "department_id", $value);
                    $d = $this->cm->select_data("branch", "branch_id", $b->branch_id);
                    if (!empty($data)) {
                        $s_name[$d->branch_name][$b->department_name] = $data;
                    }
                }
            }
        }
        $data['subdepartment'] = $s_name;
        $this->load->view('ajax_filter_subdepartments', $data);
    }
	
	public function ajax_course()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();

			date_default_timezone_set('Asia/Kolkata');
			$data['created_date'] = date('d-m-Y h:i:s');
			$data['created_by'] = $_SESSION['user_name'];
			unset($data['submit']);
			@$data['branch_id'] = implode(',', $data['branch_id']);
			@$data['department_id'] = implode(',', $data['department_id']);

			if ($this->input->post('course_id')) {
				$id = $this->input->post('course_id');
				unset($data['course_id']);
				$query = $this->admin->update_record('rnw_course', $data, 'course_id', $id);
				if ($query) {
					$recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			} else {
				unset($data['course_id']);
				$query = $this->admin->import_record('rnw_course', $data);
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

	public function get_record_course()
	{
		$course_id = $this->input->post('course_id');
		$record['single_record'] = $this->admin->get_reco('rnw_course', 'course_id', $course_id);
		echo json_encode($record);
	}

	public function SubCourse()
	{
		if (!empty($this->input->post('filter_course_data'))) {
			$filter = $this->input->post();

			$display["subcourse_all"] = $this->admin->fetch_subcourse_reco("rnw_subcourse", $filter);
			$display['filter_course'] = @$filter['filter_course'];
			$display['filter_subcourse'] = @$filter['filter_subcourse'];
			$display['filter_code'] = @$filter['filter_code'];
		} else {
			$display['subcourse_all'] = $this->admin->fetch_subcourse_reco("rnw_subcourse");
		}
		
		$display['course_all'] = $this->cm->view_all("rnw_course");
        $update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");
		$update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
		$update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
		$update['course_completed'] = $this->cm->course_completed_student("admission_courses");
		$update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
		$update['course_data'] = $this->cm->view_all("course");
	
		$this->load->view('erp/erpheader', $update);
		$this->load->view('admin/SubCourse', $display);
	}

    public function ajax_subcourse()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();

			date_default_timezone_set('Asia/Kolkata');
			$data['created_date'] = date('d-m-Y h:i:s');
			$data['created_by'] = $_SESSION['user_name'];
			unset($data['submit']);

			$config['allowed_types'] = "*";
			$config['upload_path'] = FCPATH . "dist/signsheet/";
			$new_name = time() . @$_FILES["shining_sheet"]['name'];
			$config['file_name'] = $new_name;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('shining_sheet')) {
				$imagedata = $this->upload->data();
				$data['shining_sheet'] = $imagedata['file_name'];
				$config['image_library'] = 'gd2';
				$config['source_image'] = './dist/signsheet/' . $imagedata['file_name'];
				$config['new_image'] = './dist/signsheet/';
				$config['maintain_ratio'] = TRUE;
				$config['width']    = 640;
				$config['height']   = 480;

				$this->load->library('image_lib', $config);

				// if (!$this->image_lib->resize()) {
				// 	echo $this->image_lib->display_errors();
				// } else {
				// 	// echo "success"; 
				// }
			} else {
				$error = array('error' => $this->upload->display_errors());
				$display['msgp'] = "image not uploaded";
			}

			if ($this->input->post('subcourse_id')) {
				$id = $this->input->post('subcourse_id');
				unset($data['subcourse_id']);
				$query = $this->admin->update_record('rnw_subcourse', $data, 'subcourse_id', $id);
				if ($query) {
					$recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			} else {
				unset($data['subcourse_id']);
				$query = $this->admin->import_record('rnw_subcourse', $data);
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

    public function get_record_subcourse()
	{
		$subcourse_id = $this->input->post('subcourse_id');
		$record['single_record'] = $this->admin->get_reco('rnw_subcourse', 'subcourse_id', $subcourse_id);
		echo json_encode($record);
	}

    public function package()
	{
		if (!empty($this->input->post('filter_package_data'))) {
			$filter = $this->input->post();

			$display["package_all"] = $this->admin->fetch_package_reco("rnw_package", $filter);
            $display['filter_branch'] = @$filter['filter_branch'];
            $display['filter_department'] = @$filter['filter_department'];
            $display['filter_subdepartment'] = @$filter['filter_subdepartment'];
			$display['filter_package'] = @$filter['filter_package'];
			$display['filter_code'] = @$filter['filter_code'];
		} else {
			$display['package_all'] = $this->admin->fetch_package_reco("rnw_package");
		}
		
        $display['branch_all'] = $this->cm->view_all("branch");
		$display['department_all'] = $this->cm->view_all("department");
		$display['subdepartment_all'] = $this->cm->view_all("subdepartment");
        $update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");
		$update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
		$update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
		$update['course_completed'] = $this->cm->course_completed_student("admission_courses");
		$update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
		$update['course_data'] = $this->cm->view_all("course");
	
		$this->load->view('erp/erpheader', $update);
		$this->load->view('admin/package', $display);
	}

    public function ajax_package()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();

			date_default_timezone_set('Asia/Kolkata');
			$data['created_date'] = date('d-m-Y h:i:s');
			$data['created_by'] = $_SESSION['user_name'];
			unset($data['submit']);
            @$data['branch_id'] = implode(',', $data['branch_id']);
            @$data['department_id'] = implode(',', $data['department_id']);

			if ($this->input->post('package_id')) {
				$id = $this->input->post('package_id');
				unset($data['package_id']);
				$query = $this->admin->update_record('rnw_package', $data, 'package_id', $id);
				if ($query) {
					$recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			} else {
				unset($data['package_id']);
				$query = $this->admin->import_record('rnw_package', $data);
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

    public function get_record_package()
	{
		$package_id = $this->input->post('package_id');
		$record['single_record'] = $this->admin->get_reco('rnw_package', 'package_id', $package_id);
		echo json_encode($record);
	}

	public function SubPackage()
	{
		if (!empty($this->input->post('filter_package_data'))) {
			$filter = $this->input->post();

			$display["subpackage_all"] = $this->admin->fetch_subpackage_reco("rnw_subpackage", $filter);
			$display['filter_package'] = @$filter['filter_package'];
			$display['filter_course'] = @$filter['filter_course'];
			$display['filter_subcourse'] = @$filter['filter_subcourse'];
		} else {
			$display['subpackage_all'] = $this->admin->fetch_subpackage_reco("rnw_subpackage");
		}
		
		$display['course_all'] = $this->cm->view_all("rnw_course");
		$display['subcourse_all'] = $this->cm->view_all("rnw_subcourse");
		$display['package_all'] = $this->cm->view_all("rnw_package");
        $update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");
		$update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
		$update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
		$update['course_completed'] = $this->cm->course_completed_student("admission_courses");
		$update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
		$update['course_data'] = $this->cm->view_all("course");
	
		$this->load->view('erp/erpheader', $update);
		$this->load->view('admin/SubPackage', $display);
	}

	public function ajax_subpackage()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();
			date_default_timezone_set('Asia/Kolkata');

                if (empty($data['subcourse_id'])) {
                    $subcourse_id = $data['subcourse_id'] = "";
                } else {
                    $subcourse_id = $data['subcourse_id'];
                }
                if (empty($data['fees'])) {
                    $fees = $data['fees'] = "";
                } else {
                    $fees = $data['fees'];
                }
                if (empty($data['duration'])) {
                    $duration = $data['duration'] = "";
                } else {
                    $duration = $data['duration'];
                }
    
            $i = 0;
			foreach ($data['course_id'] as $key => $value) {
				$subpdata['course_id'] = $value;
				$subpdata['subcourse_id'] = $subcourse_id[$i];
				$subpdata['fees'] = $fees[$i];
				$subpdata['duration'] = $duration[$i];
				$subpdata['package_id'] = $data['package_id'];
                $subpdata['created_date'] = date('d-m-Y h:i:s');
                $subpdata['created_by'] = $_SESSION['user_name'];
				$i++;
                $result = $this->admin->import_record('rnw_subpackage', $subpdata);
                if ($result) {
                    $status_check = 1;
                } else {
                    $status_check = 0;
                }
			}
				
			if ($status_check == 1) {
				$record = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
				$recp['all_record'] = $record;
				echo json_encode($recp);
			} else {
				$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
				echo json_encode($recp);
			}
		}
	}

	public function get_record_subpackage()
	{
		$package_id = $this->input->post('package_id');
		$record['multiple_record'] = $this->admin->get_reco_multiple('rnw_subpackage', 'package_id', $package_id);
		echo json_encode($record);
	}

	public function SubPackage_Edit($ids='')
	{
		$display['single_reco'] = $this->cm->select_data('rnw_subpackage','package_id', $ids);
		$display['match_data'] = $this->admin->get_reco_multiple('rnw_subpackage','package_id', $ids);
		$display['course_all'] = $this->cm->view_all("rnw_course");
		$display['subcourse_all'] = $this->cm->view_all("rnw_subcourse");
		$display['package_all'] = $this->cm->view_all("rnw_package");
        $update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");
		$update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
		$update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
		$update['course_completed'] = $this->cm->course_completed_student("admission_courses");
		$update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
		$update['course_data'] = $this->cm->view_all("course");
	
		$this->load->view('erp/erpheader', $update);
		$this->load->view('admin/SubPackage_Edit', $display);
	}

	public function ajax_updsubpackage()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();
			
			date_default_timezone_set('Asia/Kolkata');

				if (empty($data['subpackage_id'])) {
					$subpackage_id = $data['subpackage_id'] = "";
				} else {
					$subpackage_id = $data['subpackage_id'];
				}
                if (empty($data['subcourse_id'])) {
                    $subcourse_id = $data['subcourse_id'] = "";
                } else {
                    $subcourse_id = $data['subcourse_id'];
                }
                if (empty($data['fees'])) {
                    $fees = $data['fees'] = "";
                } else {
                    $fees = $data['fees'];
                }
                if (empty($data['duration'])) {
                    $duration = $data['duration'] = "";
                } else {
                    $duration = $data['duration'];
                }

			 $i = 0;
			 foreach ($data['course_id'] as $key => $value) {
				$subpdata['course_id'] = $value;
				$subpdata['subcourse_id'] = $subcourse_id[$i];
				$subpdata['fees'] = $fees[$i];
				$subpdata['duration'] = $duration[$i];
				$subpdata['package_id'] = $data['package_id'];
				$subpdata['created_date'] = date('d-m-Y h:i:s');
				$subpdata['created_by'] = $_SESSION['user_name'];
				$id = $subpackage_id[$i];
				$i++;
				$result = $this->admin->update('rnw_subpackage', $subpdata, 'subpackage_id',$id);
				if ($result) {
					$status_check = 1;
				} else {
					$status_check = 2;
				}
			}

			if ($status_check == 1) {
				$record = array('status' => 1, "msg" => "Updated");
				$recp['all_record'] = $record;
				echo json_encode($recp);
			} else  if($status_check == 3){
				$record = array('status' => 3, "msg" => "HI! This Record Successfully Inserted");
				$recp['all_record'] = $record;
				echo json_encode($recp);
			} else {
				$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
				echo json_encode($recp);
			}
		}
	}

	public function permission_view() {
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
        $update['list_batch'] = $this->cm->view_all("batch_list");
        $update['all_admission'] = $this->cm->view_all("admission_process");
        $update['hod_all'] = $this->cm->view_all_hod_demo("hod");
        $update['faculty_all'] = $this->cm->view_all("faculty");
        $update['admisison_process_data'] = $this->cm->view_all("admission_process");
        $update['overdue_fees_counting_list'] = $this->admi->overdue_fees_counting("admission_installment");
		
		$display['email_all'] = $this->cm->view_all("email_settings");

        $this->load->view('erp/erpheader', $update);
        $this->load->view('admin/permission_view', $display);
    }

	public function email_setting() {
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
        $update['list_batch'] = $this->cm->view_all("batch_list");
        $update['all_admission'] = $this->cm->view_all("admission_process");
        $update['hod_all'] = $this->cm->view_all_hod_demo("hod");
        $update['faculty_all'] = $this->cm->view_all("faculty");
        $update['admisison_process_data'] = $this->cm->view_all("admission_process");
        $update['overdue_fees_counting_list'] = $this->admi->overdue_fees_counting("admission_installment");
		
		$display['email_all'] = $this->cm->view_all("email_settings");

        $this->load->view('erp/erpheader', $update);
        $this->load->view('admin/email_setting', $display);
    }

	public function ajax_email_setting_submit () {
		// if (!empty($this->input->post('submit'))) {
        //     $data = $this->input->post();
			// echo "<pre>";
			// print_r($this->input->post());
			// exit;

			if (!empty($this->input->post('submit'))) {
                $data = $this->input->post();
                unset($data['update_id']);
                unset($data['submit']);
                $ins_data['user_id'] = $_SESSION['user_id'];
                $ins_data['role'] = $_SESSION['logtype'];
                $ins_data['admin_id'] = $_SESSION['admin_id'];
                $ins_data['first_name'] = $data['fname'];
                $ins_data['last_name'] = $data['lname'];
                $ins_data['email'] = $data['email'];
                
                $ins_data['email_type'] = $data['email_type'] == 'default' ? 1 : 2;
                $ins_data['is_default'] = isset($data['is_default']) ? 1 : 0;

				if ($ins_data['email_type'] == 1) {
					$ins_data['password'] = $data['pwd'];
					$ins_data['encryption'] = $data['encryption'];
					$ins_data['port'] = $data['port'];
					$ins_data['host'] = $data['host'];
				} else {
					$ins_data['password'] = '';
					$ins_data['encryption'] = '';
					$ins_data['port'] = 0;
					$ins_data['host'] = '';
				}
                if (!empty($this->input->post('update_id'))) {
                    $id = $this->input->post('update_id');
					
                    $re = $this->cm->update_data("email_settings", $ins_data, "id", $id);
					
					if ($re) {
						$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Updated");
						echo json_encode($recp);
					} else {
						$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
						echo json_encode($recp);
					}
                    //logdata("email settings id= " . $id . " email settings =" . $ins_data['email'] . " Update");
                } else {
					
                    $re = $this->cm->insert_data("email_settings", $ins_data);
                    if ($re) {
						$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
						echo json_encode($recp);
					} else {
						$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
						echo json_encode($recp);
					}
                    //logdata("email settings=" . $ins_data['email'] . " add");
                }
            }

            // if (!empty($this->input->post('update_id'))) {
			// 	$id = $this->input->post('update_id');
            //     $re = $this->cm->update_data("logtype", $ins_data, "logtype_id", $id);
			// 	if ($re) {
			// 		$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Updated");
			// 		echo json_encode($recp);
			// 	} else {
			// 		$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
			// 		echo json_encode($recp);
			// 	}
            // } else {
			// 	$re = $this->cm->insert_data("logtype", $ins_data);
			// 	if ($re) {
			// 		$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
			// 		echo json_encode($recp);
			// 	} else {
			// 		$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
			// 		echo json_encode($recp);
			// 	}
            // }
        //}
	}

	public function get_record() {
		$id = $this->input->post('id');
		$table = $this->input->post('table');
		$field = $this->input->post('field');
		//print_r($this->input->post()); exit;
		$record['single_record'] = $this->admin->get_reco($table, $field, $id);
		echo json_encode($record);
	}

	public function CreateLogtype()
	{
		// if (!empty($this->input->post('filter_course_data'))) {
		// 	$filter = $this->input->post();

		// 	$display["course_all"] = $this->admin->fetch_course_reco("rnw_course", $filter);
		// 	$display['filter_branch'] = @$filter['filter_branch'];
		// 	$display['filter_department'] = @$filter['filter_department'];
		// 	$display['filter_subdepartment'] = @$filter['filter_subdepartment'];
		// 	$display['filter_course'] = @$filter['filter_course'];
		// 	$display['filter_code'] = @$filter['filter_code'];
		// } else {
		// 	$display['course_all'] = $this->admin->fetch_course_reco("rnw_course");
		// }

		if ($_SESSION['logtype'] == "Super Admin") {
            $display['logtype_all'] = $this->cm->filter_data("logtype", "parent_id", "0");
        } else {
            $display['logtype_all'] = $this->tm->view_all("logtype");
        }
        //$display['logtype_all'] = $this->cm->view_all("logtype");
        $display['permission_all'] = $this->cm->view_all("permission");
        if ($_SESSION['logtype'] == "Super Admin") {
            $display['user_all'] = $this->cm->view_all_user("user");
        } else {
            $display['user_all'] = $this->tm->view_all("user");
        }

		$display['country_all'] = $this->cm->view_all("country");
		$display['state_all'] = $this->cm->view_all("state");
		$display['city_all'] = $this->cm->view_all("cities");
		$display['user_all'] = $this->cm->Role_all_admin("user");
		$display['branch_all'] = $this->cm->view_all("branch");
		$display['department_all'] = $this->cm->view_all("department");
		$display['subdepartment_all'] = $this->cm->view_all("subdepartment");
		$display['all_gst_daynamic_field'] = $this->cm->view_all("gst_daynamic_field");
		$update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");
		$update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");

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
		$this->load->view('admin/CreateLogtype', $display);
	}

	public function ajax_logtype_submit () {
		if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            
            if ($_SESSION['logtype'] == "Super Admin") {
                $all = $this->cm->select_data("user", "admin_id", $_SESSION['admin_id']);
                $ins_data['state_id'] = $all->state_id;
                $ins_data['city_id'] = $all->city_id;
            } else {
                $ins_data['admin_id'] = $_SESSION['admin_id'];
                $all = $this->cm->select_data("user", "admin_id", $_SESSION['admin_id']);
                $ins_data['state_id'] = $all->state_id;
                $ins_data['city_id'] = $all->city_id;
            }

            $ins_data['logtype_name'] = $data['name'];
            $ins_data['permission'] = implode(",", $data['f_all']);
            $ins_data['f_permission'] = implode(",", $data['fp']);
            $ins_data['m_permission'] = implode(",", $data['m_all']);
            $ins_data['parent_id'] = 0;
            if (!empty($this->input->post('update_id'))) {
				$id = $this->input->post('update_id');
                $re = $this->cm->update_data("logtype", $ins_data, "logtype_id", $id);
				if ($re) {
					$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp);
				} else {
					$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
					echo json_encode($recp);
				}
            } else {
				$re = $this->cm->insert_data("logtype", $ins_data);
				if ($re) {
					$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
					echo json_encode($recp);
				} else {
					$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
					echo json_encode($recp);
				}
            }
        }
	}

	public function get_record_logtype()
	{
		$logtype_id = $this->input->post('logtype_id');
		//print_r($this->input->post()); exit;
		$record['single_record'] = $this->admin->get_reco('logtype', 'logtype_id', $logtype_id);
		echo json_encode($record);
	}

	
    public function College_Courses()
    {
        if (!empty($this->input->post('filter_course_data'))) {
			$filter = $this->input->post();

			$display["clg_course_all"] = $this->admin->fetch_clg_co_reco("college_courses", $filter);
			$display['filter_intake'] = @$filter['filter_intake'];
			$display['filter_category'] = @$filter['filter_category'];
			$display['filter_course_name'] = @$filter['filter_course_name'];
			$display['filter_course'] = @$filter['filter_course'];
		} else {
			$display['clg_course_all'] = $this->admin->fetch_clg_co_reco("college_courses");
		}

		$display['branch_all'] = $this->admin->get_reco_clg_co("branch","branch_name","college");
		$display['department_all'] = $this->cm->view_all("department");
		$display['subdepartment_all'] = $this->cm->view_all("subdepartment");
		$update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");
		$update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
		$update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
		$update['course_completed'] = $this->cm->course_completed_student("admission_courses");
		$update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
		$update['course_data'] = $this->cm->view_all("course");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('admin/College_Courses', $display);
    }

    public function make_clg_sem()
    {
        $record['data'] = array('no_of_semester' => $this->input->post('no_of_semester'),'intake'=>$this->input->post('intake'),'semester_fees'=>$this->input->post('semester_fees'),'sem_fees_date' => $this->input->post('sem_fees_date'),'examination_fees' => $this->input->post('examination_fees'),'exam_fees_date' => $this->input->post('exam_fees_date'));
        $this->load->view('admin/make_clg_sem',$record);
    }

    public function ajax_clg_co()
    {
        if ($this->input->post('submit')) {
			$data = $this->input->post();
            date_default_timezone_set('Asia/Kolkata');
           
            $ins_data['intake'] = $data['intake'];
            $ins_data['course_category_id'] = $data['course_category_id'];
            $ins_data['college_course_name'] = $data['college_course_name'];
            $ins_data['college_course_code'] = $data['college_course_code'];
            $ins_data['college_registration_fees'] = $data['college_registration_fees'];
            $ins_data['semester_fees'] = $data['semester_fees'];
            $semfeesdate = date("Y-m-d", strtotime($data['semester_fees_date']));
            $ins_data['semester_fees_date'] = $semfeesdate;
            $ins_data['examination_fees'] = $data['examination_fees'];
            $examfeesdate = date("Y-m-d", strtotime($data['exam_fees_date']));
            $ins_data['exam_fees_date'] = $examfeesdate;
            $ins_data['no_of_semester'] = $data['no_of_semester'];
            $ins_data['duration'] = $data['duration'];
            $ins_data['college_tuition_fees'] = $data['college_tuition_fees'];
            $ins_data['created_date'] = date('d-m-Y h:i:s');
			$ins_data['created_by'] = $_SESSION['user_name'];
    
            $respo  = $this->admi->last_ins_clg_co('college_courses', $ins_data);

            $i = 0;
			foreach ($data['sem_date'] as $key => $value) {

				$date = date("Y-m-d", strtotime($value));
				$sem_installment_reco['sem_date'] = $date;
                $sem_installment_reco['college_courses_id'] = $respo->college_courses_id;
				$sem_installment_reco['semester'] = $data['semester'][$i];
				$sem_installment_reco['sem_fees'] = $data['sem_fees'][$i];
				$sem_installment_reco['exam_date'] = date("Y-m-d", strtotime($data['exam_date'][$i]));
				$sem_installment_reco['exam_fees'] = $data['exam_fees'][$i];
                $sem_installment_reco['created_date'] = date('d-m-Y h:i:s');
                $sem_installment_reco['created_by'] = $_SESSION['user_name'];

				$i++;
				$result = $this->db->insert('college_installment', $sem_installment_reco);
                if ($result) {
					$status_check = 1;
				} else {
					$status_check = 0;
				}
			}
            
            if ($status_check == 1) {
				$record = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
				$recp['all_record'] = $record;
				echo json_encode($recp);
			} else {
				$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
				echo json_encode($recp);
			}
        }
    }

    public function college_coinst_upd($ids='')
	{
		$display['single_reco'] = $this->cm->select_data('college_courses','college_courses_id', $ids);
		$display['match_data'] = $this->admin->get_reco_clg_co('college_installment','college_courses_id', $ids);
        $display['branch_all'] = $this->admin->get_reco_clg_co("branch","branch_name","college");
		$display['department_all'] = $this->cm->view_all("department");
		$display['subdepartment_all'] = $this->cm->view_all("subdepartment");
        $update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");
		$update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
		$update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
		$update['course_completed'] = $this->cm->course_completed_student("admission_courses");
		$update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
		$update['course_data'] = $this->cm->view_all("course");
	
		$this->load->view('erp/erpheader', $update);
		$this->load->view('admin/college_coinst_upd', $display);
	}

    public function ajax_updclgco()
    {
        if ($this->input->post('submit')) {
			$data = $this->input->post();
            date_default_timezone_set('Asia/Kolkata');

			$ins_data['branch_id'] = $data['branch_id'];
			$ins_data['department_id'] = $data['department_id'];
			$ins_data['course_category_id'] = $data['course_category_id'];
            $ins_data['intake'] = $data['intake'];
            $ins_data['college_course_name'] = $data['college_course_name'];
            $ins_data['college_course_code'] = $data['college_course_code'];
            $ins_data['college_registration_fees'] = $data['college_registration_fees'];
            $ins_data['semester_fees'] = $data['semester_fees'];
            $semfeesdate = date("Y-m-d", strtotime($data['semester_fees_date']));
            $ins_data['semester_fees_date'] = $semfeesdate;
            $ins_data['examination_fees'] = $data['examination_fees'];
            $examfeesdate = date("Y-m-d", strtotime($data['exam_fees_date']));
            $ins_data['exam_fees_date'] = $examfeesdate;
            $ins_data['no_of_semester'] = $data['no_of_semester'];
            $ins_data['duration'] = $data['duration'];
            $ins_data['college_tuition_fees'] = $data['college_tuition_fees'];
            $ins_data['created_date'] = date('d-m-Y h:i:s');
			$ins_data['created_by'] = $_SESSION['user_name'];
    
            $this->admin->update('college_courses', $ins_data, 'college_courses_id',$data['college_courses_id']);
            
            $i = 0;
			foreach ($data['sem_date'] as $key => $value) {

				$date = date("Y-m-d", strtotime($value));
				$sem_installment_reco['sem_date'] = $date;
                $sem_installment_reco['college_courses_id'] = $data['college_courses_id'];
				$sem_installment_reco['semester'] = $data['semester'][$i];
				$sem_installment_reco['sem_fees'] = $data['sem_fees'][$i];
				$sem_installment_reco['exam_date'] = date("Y-m-d", strtotime($data['exam_date'][$i]));
				$sem_installment_reco['exam_fees'] = $data['exam_fees'][$i];
                $sem_installment_reco['created_date'] = date('d-m-Y h:i:s');
                $sem_installment_reco['created_by'] = $_SESSION['user_name'];
                $college_installment_id = $data['college_installment_id'][$i];
				$i++;
				$result =  $this->admin->update('college_installment', $sem_installment_reco, 'college_installment_id',$college_installment_id);
                if ($result) {
					$status_check = 1;
				} else {
					$status_check = 0;
				}
			}

           if ($status_check == 1) {
               $record = array('status' => 1, "msg" => "HI! This Record Successfully Updated");
               $recp['all_record'] = $record;
               echo json_encode($recp);
           } else {
               $recp['all_record'] = array('status' => 0, "msg" => "Something Wrong");
               echo json_encode($recp);
           }
        }
    }

	public function get_departmet()
	{
		$bid = $this->input->post('branch_id');

		$department = $this->admi->view_all('department');
		echo '<option value="">Select Department</option>';
		foreach ($department as $dn) {
			$flag = 0;
			$dnbi = explode(',', $dn['branch_id']);
			if (in_array($bid, $dnbi)) {
				$flag = 1;
			}
			if ($flag == 1) {
			?>
			<option value="<?php echo $dn['department_id']; ?>"><?php echo $dn['department_name']; ?></option>
			<?php
			}
		}
	}

	public function get_subdepartmet()
	{
		$did = $this->input->post('department_id');

		$subdepartment = $this->admi->view_all('subdepartment');
		echo '<option value="">Select Category</option>';
		foreach ($subdepartment as $dn) {
			$flag = 0;
			$dnbi = explode(',', $dn['department_ids']);
			if (in_array($did, $dnbi)) {
				$flag = 1;
			}
			if ($flag == 1) {
			?>
			<option value="<?php echo $dn['subdepartment_id']; ?>"><?php echo $dn['subdepartment_name']; ?></option>
			<?php
			}
		}
	}
 
}