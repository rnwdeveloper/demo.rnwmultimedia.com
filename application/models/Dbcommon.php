<?php
class Dbcommon extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->view('UserInfo');
		date_default_timezone_set("Asia/Calcutta");
		$this->load->database('another_db', TRUE);
		$CI = &get_instance();
		$this->db2 = $CI->load->database('another_db', TRUE);
		//$this->load->helper('urldata');
	}

	public function get_punching_reco($tbl){
    	$date = date('2021-08-12 h:i A');
		$this->db2->where('LogDate >=', $date);
		$this->db2->select('*');
		$this->db2->from($tbl);
		$query = $this->db2->get(); 
		return $query->result();
  }



  public function get_live_data_attendance_2($tbl, $field, $data){
  	$this->db2->where($field, $data);
    $this->db2->from($tbl);
    $data =  $this->db2->get();
    // print_r($data->result());
    // die;
    return $data->result();
  }

	public function get_all_jobs_post_statuswise($tbl, $data, $field)
	{
		$this->db->where($field, $data);
		$this->db->join('company_detail', 'company_detail.company_id=job_post.company_id');
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}
	public function insert_lead_data($data)
	{
		return $this->db->insert_batch('lead_list', $data);
	}

	public function update_job_position_record($tbl, $field, $id, $record)
	{
		$this->db->where($field, $id);
		return $this->db->update($tbl, $record);
	}

	public function get_jobPositionRecord($tbl, $field, $id)
	{
		$this->db->where($field, $id);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->row();
	}

	public function delete_job_post($tbl, $field, $id)
	{
		$this->db->where($field, $id);
		return $this->db->delete($tbl);
	}
	public function get_all_record($tbl)
	{
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}

	public function view_all_compnay($tbl)
	{
		$this->db->select('company_name');
		$this->db->where('status', 1);
		$this->db->from($tbl);
		$this->db->distinct();
		$data =  $this->db->get();
		return $data->result();
	}
	public function add_job_category_position($tbl, $data)
	{
		return $this->db->insert($tbl, $data);
	}
	public function change_all_job_status($tbl, $field, $id, $record)
	{
		$this->db->where($field, $id);
		return $this->db->update($tbl, $record);
	}

	public function view_counselor_record($tbl)
	{
		$this->db->where('logtype', 'Counselor');
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}

	public function view_telecaller_record($tbl)
	{
		$this->db->where('logtype', 'Telecaller');
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}

	public function fetch_all_event()
	{
		//|| $_SESSION['Admin']['role'] !='Admin'
		if($_SESSION['Admin']['role'] != 'Super Admin' ){
			$username =  $_SESSION['Admin']['username'];
			$this->db->where('referred_to', $username);
		}
		$this->db->where('status != ', '1 - New');
		$this->db->where('status != ', '8 - Closed');
		$this->db->where('status != ', '7 - Enrolled');
		$this->db->where('status != ', '6 - Demo');
		$this->db->order_by('lead_list_id');
		$this->db->from('lead_list');
		$data = $this->db->get();
		// print_r($this->db->last_query()); 
		// exit;
		return $data->result();
	}


	public function student_give_rating($tbl, $field, $re, $data)
	{
		$this->db->where($field, $re);
		return $this->db->update($tbl, $data);
	}

	public function view_all_by_order($tbl, $order_field, $order_type)
    {
        $this->db->order_by($order_field, $order_type);
        $data = $this->db->get($tbl);

        return $data->result();
    }
	// public function count_date_wise_record($tbl,$next_date){
	// 	$this->db->from($tbl);
	// 	$this->db->like('next_action_date',$next_date);
	// 	$data = $this->db->get();
	// 	return $data->num_rows();
	// }

	public function get_date_wise_record($tbl, $next_date, $followup_status)
	{
		$username =  $_SESSION['Admin']['username'];
		// $this->db->distinct();
		$this->db->where('referred_to', $username);
		if (@$followup_status == 'yellow') {
			$this->db->where('followup_status_yellow', $followup_status);
		} else if (@$followup_status == 'red') {
			$this->db->where('followup_status_red', $followup_status);
		} else if (@$followup_status == 'green') {
			$this->db->where('followup_status_green', $followup_status);
		}
		$this->db->where('status != ', '1 - New');
		$this->db->where('status != ', '8 - Closed');
		$this->db->where('status != ', '7 - Enrolled');
		$this->db->where('status != ', '6 - Demo');
		$this->db->like('next_action_date', $next_date);
		// $this->db->where('next_action_date >=',$next_date);


		// $this->db->like('next_action_date',$current_date);
		$this->db->from($tbl);
		$data = $this->db->get();

		return  $data->num_rows();
	}
	public function Update_remark_record($tbl, $data, $nu_field, $nu_data)
	{
		$this->db->where($nu_field, $nu_data);
		return $this->db->update($tbl, $data);
	}
	public function get_new_record_all_student_new($tbl, $data = '', $field = '')
	{
		if ($data != '' && $field != '') {
			$this->db->where($field, $data);
		}
		// $this->db->where($assign,$username);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->num_rows();
	}

	public function get_new_record_all_student($tbl, $data = '', $field = '', $next_date_field = '', $next_value = '')
	{
		if ($data != '' && $field != '') {
			$this->db->where($field, $data);
		}
		if (@$next_date_field != '' && $next_value != '') {
			$this->db->where($next_date_field, $next_value);
		}
		$this->db->from($tbl);
		$data =  $this->db->get();
		// print_r($this->db->last_query());
		return $data->num_rows();
	}

	public function get_new_record_all($tbl, $data = '', $field = '')
	{
		if ($data != '' && $field != '') {
			$this->db->where($field, $data);
		}
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->num_rows();
	}
	public function get_new_record($tbl, $data, $field, $assign, $username)
	{
		$this->db->where($field, $data);
		$this->db->where($assign, $username);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->num_rows();
	}

	public function check_remarks_alra($tb, $id)
	{
		// $this->db->where('remarks',$id);
		$this->db->from($tb);
		$data = $this->db->get();
		return $data->row();
	}

	public function get_remarks_student_wise($tbl, $field, $id)
	{
		$this->db->where($field, $id);
		$this->db->order_by("job_remark_id", "desc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}

	public function Insert_remark_record($tbl, $record)
	{
		return $this->db->insert($tbl, $record);
	}

	public function view_all_job_application_assign_faculty($tbl, $field, $username)
	{
		$this->db->where($field, $username);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}
	public function get_app_wise_record($tbl, $id, $field)
	{

		// $this->db->where('application_id',$id);
		// $this->db->from($tbl);
		$this->db->select('fr.name as faculty_name, apj.*');
		$this->db->where('apj.application_id', $id);
		// $this->db->join('branch as br','br.branch_id=apj.branch_id');
		$this->db->join('faculty as fr', 'fr.faculty_id=apj.faculty_id');
		$this->db->from('application_job as apj');
		$data = $this->db->get();
		// print_r($data);
		return $data->row();
	}

	// $this->db->select('u.id, u.username, c.name', false);
	// $this->db->from('user as u');
	// $this->db->join('companies as c', 'u.company_id = c.id');

	public function get_remarks_id_wise($tb, $field, $id)
	{
		$this->db->where($field, $id);
		$this->db->from($tb);
		$data = $this->db->get();
		return $data->result();
	}
	public function insert_data($tbl, $data)
	{
		//print_r($data);
		//die();
		return $this->db->insert($tbl, $data);
	}

	public function insert_demo($tbl, $data)
	{
		$this->db->insert($tbl, $data);
		$id = $this->db->insert_id();
		$q = $this->db->get_where($tbl, array('demo_id' => $id));
		return $q->row();
	}
	public function delete_data($tbl, $wher, $id)
	{
		$this->db->where($wher, $id);
		return $this->db->delete($tbl);
	}

	public function view_all($tbl)
	{
		$data = $this->db->get($tbl);
		return $data->result();
	}

	public function get_management_forms($tbl)
	{
		$this->db->order_by("form_name","asc");
		$query = $this->db->get($tbl);
		return $query->result();
	}

	public function view_all_by_status($tbl)
	{
		$this->db->where('status',0);
		$data = $this->db->get($tbl);
		return $data->result();
	}

	public function view_all_lead_record($tbl,$filter = 0)
	{
		if (!empty($filter['filter_lead'])) {
		if (!empty($filter['filter_from_date']) && !empty($filter['filter_to_date'])) {
			$this->db->where('admission_date >=', $filter['filter_from_date']);
			$this->db->where('admission_date <=', $filter['filter_to_date']);
		}
	
		if (!empty($filter['filter_gr_id'])) {
			$this->db->like("gr_id", $filter['filter_gr_id']);
		}
	
		if (!empty($filter['filter_enrollnno'])) {
			$this->db->like("enrollment_number", $filter['filter_enrollnno']);
		}
	
		if (!empty($filter['filter_year'])) {
			$this->db->like("year", $filter['filter_year']);
		}
	
		if (!empty($filter['filter_prospected_name'])) {
			$this->db->like("name", $filter['filter_prospected_name']);
		}
	
		if (!empty($filter['filter_lname'])) {
			$this->db->like("surname", $filter['filter_lname']);
		}
	
		if (!empty($filter['filter_email'])) {
			$this->db->like("email", $filter['filter_email']);
		}
	
		if (!empty($filter['filter_mobile'])) {
			$this->db->like("mobile_no", $filter['filter_mobile']);
		}
	
		if (!empty($filter['filter_source'])) {
			$this->db->like("source_id", $filter['filter_source']);
		}
	
		if (!empty($filter['filter_branch'])) {
			$this->db->like("branch_id", $filter['filter_branch']);
		}
	
		if (!empty($filter['filter_department'])) {
			$this->db->like("department_id", $filter['filter_department']);
		}
	
		if (!empty($filter['filter_course'])) {
			$this->db->where("course_id", $filter['filter_course']);
		}
	
		if (!empty($filter['filter_package'])) {
			$this->db->like("package_id", $filter['filter_package']);
		}
	
		if (!empty($filter['filter_clg_course'])) {
			$this->db->like("college_courses_id", $filter['filter_clg_course']);
		}
		}

		$role =  $_SESSION['Admin']['role'];
		if ($role == 'Super Admin') {
		} else if ($role == 'Counselor') {
			$username =  $_SESSION['Admin']['name'];
			$this->db->where('referred_to', $username);
		}
		$data = $this->db->get($tbl);
		return $data->result();
	}

	public function view_all_data($tbl)
	{

		if (isset($_SESSION) && $_SESSION['logtype'] == "Super Admin") {
			$this->db->select('*');
			$this->db->from($tbl);
			$data = $this->db->get();
		} else {
			$this->db->where('admin_id', $_SESSION['admin_id']);
			$this->db->select('*');
			$this->db->from($tbl);
			$data = $this->db->get();
		}
		return $data->result();
	}

	public function view_all_cngs($tbl)
	{
		//$this->db->where("demoStatus",$dst);
		$this->db->where("(demoStatus='2' OR demoStatus='4')", NULL, FALSE);
		$this->db->select('*');
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}

	public function view_all_course($tbl)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		$this->db->join('department', 'department.department_id = rnw_course.department_id');
		$data = $this->db->get();
		return $data->result();
	}

	public function view_all_faculty($tbl)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		$this->db->join('department', 'department.department_id = faculty.department_id');
		$data = $this->db->get();
		return $data->result();
	}

	public function view_all_faculty_new($tbl)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		$this->db->join('subdepartment', 'subdepartment.subdepartment_id = faculty.subdepartment_id');


		$data = $this->db->get();

		return $data->result();
	}

	public function view_all_hod_new($tbl)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		$this->db->join('subdepartment', 'subdepartment.subdepartment_id = hod.subdepartment_id');

		$data = $this->db->get();
		// echo "<pre>";
		// print_r($data);
		// die;
		return $data->result();
	}
	public function view_all_hod_demo($tbl)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		$this->db->join('department', 'department.department_id = hod.department_ids');

		$data = $this->db->get();
		// echo "<pre>";
		// print_r($data);
		// die;
		return $data->result();
	}
	public function view_all_facultys($tbl)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		$this->db->join('department', 'department.department_id = faculty.department_id');
		$data = $this->db->get();
		return $data->result();
	}


	public function view_all_users_apps($tbl)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		$this->db->join('department', 'department.department_id = user.department_ids');
		$data = $this->db->get();
		return $data->result();
	}


	public function view_all_hod($tbl)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		$this->db->join('department', 'department.department_id = hod.department_ids');
		$data = $this->db->get();
		return $data->result();
	}

	public function view_all_package($tbl)
	{
		$this->db->select('*');
		$this->db->order_by("package_id", "desc");
		$this->db->from($tbl);
		$this->db->join('department', 'department.department_id = package.department_id');
		$data = $this->db->get();
		return $data->result();
	}

	public function view_all_Relevant($tbl)
	{
		$this->db->select('*');
		$this->db->order_by("package_id", "desc");
		$this->db->from($tbl);
		$this->db->join('department', 'department.department_id = package.department_id');
		$data = $this->db->get();
		return $data->result();
	}

	public function view_course($tbl)
	{
		$this->db->select('*');
		$this->db->order_by("course_id", "desc");
		$this->db->from($tbl);
		$this->db->join('department', 'department.department_id = course.department_id');
		$data = $this->db->get();
		return $data->result();
	}


	public function view_all_demo($tbl)
	{
		$this->db->select('*');
		$this->db->order_by("demo_id", "desc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}

	public function view_all_demo_running($tbl)
	{
		if (isset($_SESSION) && $_SESSION['logtype'] != "Super Admin") {
			$this->db->where('admin_id', $_SESSION['admin_id']);
		}
		$this->db->where("demoStatus", "0");
		$this->db->select('*');
		$this->db->order_by("demo_id", "desc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}

	public function view_all_demo_status_wise($tbl, $dst)
	{

		$this->db->where("demoStatus", $dst);
		$this->db->select('*');
		$this->db->order_by("demo_id", "desc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}

	public function view_all_demo_limit($tbl)
	{
		date_default_timezone_set("Asia/Calcutta");
		for ($i = 1; $i <= 2; $i++) {
			$date1 = date('Y-m-d', strtotime("-$i month"));
		}
		//  echo $date1;
		$this->db->where('demoDate >=', $date1);
		$this->db->select('*');
		$this->db->order_by("demo_id", "desc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}



	public function filter_demo($tbl, $filter)
	{

		if (!empty($filter['search'])) {
			if (!empty($filter['filter_branch'])) {
				$this->db->where("branch_id", $filter['filter_branch']);
			}
			if (!empty($filter['filter_department'])) {
				$this->db->where("department_id", $filter['filter_department']);
			}
			if (!empty($filter['filter_faculty'])) {
				$this->db->where("faculty_id", $filter['filter_faculty']);
			}
			if (!empty($filter['filter_course'])) {
				$this->db->where("courseName", $filter['filter_course']);
			}
			if (!empty($filter['filter_package'])) {
				$this->db->where("packageName", $filter['filter_package']);
			}
			if (!empty($filter['filter_demoName'])) {
				$this->db->like("name", $filter['filter_demoName']);
			}
			if (!empty($filter['filter_demoId'])) {
				$this->db->like("demo_id", $filter['filter_demoId']);
			}
			if (!empty($filter['filter_phoneNo'])) {
				$this->db->like("mobileNo", $filter['filter_phoneNo']);
			}
			if (@$filter['filter_demoStatus'] == "0" || @$filter['filter_demoStatus'] == "1" || @$filter['filter_demoStatus'] == "2" || @$filter['filter_demoStatus'] == "3") {
				$this->db->where("demoStatus", $filter['filter_demoStatus']);
			}
			if (!empty($filter['filter_demoDate_start']) && !empty($filter['filter_demoDate_end'])) {


				$this->db->where('demoDate >=', $filter['filter_demoDate_start']);
				$this->db->where('demoDate <=', $filter['filter_demoDate_end']);
			} else {
				if (!empty($filter['filter_demoDate_start'])) {
					$this->db->where('demoDate', $filter['filter_demoDate_start']);
				}
				if (!empty($filter['filter_demoDate_end'])) {
					$this->db->where('demoDate', $filter['filter_demoDate_end']);
				}
			}

			if (!empty($filter['filter_cancel_reason'])) {
				$this->db->where("cancel_reason", $filter['filter_cancel_reason']);
			}
		}

		if (isset($_SESSION) && $_SESSION['logtype'] == "Super Admin") {
			$this->db->select('*');
			$this->db->order_by("demo_id", "desc");
			$this->db->from($tbl);
		} else {
			// echo $_SESSION['admin_id'];
			// die;
			$this->db->where('admin_id', $_SESSION['admin_id']);
			$this->db->select('*');
			$this->db->order_by("demo_id", "desc");
			$this->db->from($tbl);
		}
		$data = $this->db->get();
		return $data->result();
	}



	public function filter_demo_graph($tbl, $filter)
	{

		if (!empty($filter['search_filter'])) {
			if (!empty($filter['filter_branch_data'])) {
				$this->db->where("branch_id", $filter['filter_branch_data']);
			}
			// if(!empty($filter['filter_department']))
			// {
			// 	$this->db->where("department_id",$filter['filter_department']);	
			// }
			// if(!empty($filter['filter_faculty']))
			// {
			// 	$this->db->where("faculty_id",$filter['filter_faculty']);	
			// }
			// if(!empty($filter['filter_course']))
			// {
			// 	$this->db->where("courseName",$filter['filter_course']);	
			// }
			// if(!empty($filter['filter_demoName']))
			// {
			// 	$this->db->like("name",$filter['filter_demoName']);	
			// }
			// if(!empty($filter['filter_demoId']))
			// {
			// 	$this->db->like("demo_id",$filter['filter_demoId']);	
			// }
			// if(!empty($filter['filter_phoneNo']))
			// {
			// 	$this->db->like("mobileNo",$filter['filter_phoneNo']);	
			// }
			// if(@$filter['filter_demoStatus']=="0" || @$filter['filter_demoStatus']=="1" || @$filter['filter_demoStatus']=="2" || @$filter['filter_demoStatus']=="3")
			// {
			// 	$this->db->where("demoStatus",$filter['filter_demoStatus']);	
			// }
			// if(!empty($filter['filter_demoDate_start']) && !empty($filter['filter_demoDate_end']))
			// {


			// 	$this->db->where('demoDate >=', $filter['filter_demoDate_start']);
			//              $this->db->where('demoDate <=', $filter['filter_demoDate_end']);
			// }
			// else
			// {
			//     if(!empty($filter['filter_demoDate_start']))
			//     {
			//         	$this->db->where('demoDate', $filter['filter_demoDate_start']);
			//     }
			//     if(!empty($filter['filter_demoDate_end']))
			//     {
			//         	$this->db->where('demoDate', $filter['filter_demoDate_end']);
			//     }

			// }

			// if(!empty($filter['filter_cancel_reason']))
			// {
			// 	$this->db->where("cancel_reason",$filter['filter_cancel_reason']);	
			// }


		}



		$this->db->select('*');
		$this->db->order_by("demo_id", "desc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}
	public function filter_demo_faculty_analysis($tbl, $filter)
	{

		if (!empty($filter['faculty_analysis'])) {

			if (!empty($filter['filter_demoDate_start']) && !empty($filter['filter_demoDate_end'])) {


				$this->db->where('demoDate >=', $filter['filter_demoDate_start']);
				$this->db->where('demoDate <=', $filter['filter_demoDate_end']);
			} else {
				if (!empty($filter['filter_demoDate_start'])) {
					$this->db->where('demoDate', $filter['filter_demoDate_start']);
				}
				if (!empty($filter['filter_demoDate_end'])) {
					$this->db->where('demoDate', $filter['filter_demoDate_end']);
				}
			}
		}

		$this->db->select('*');
		$this->db->order_by("demo_id", "desc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}


	public function filter_demo_counsalor_analysis($tbl, $s, $e)
	{

		$this->db->where('demoDate >=', $s);
		$this->db->where('demoDate <=', $e);
		$this->db->select('*');
		$this->db->order_by("demo_id", "desc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}



	public function update_data($tbl, $data, $wher, $id)
	{
		// print_r($data);
		// die();
		$this->db->where($wher, $id);
		return $this->db->update($tbl, $data);
	}

	public function check_user($tbl, $email, $password)
	{
		$this->db->where("email", $email);
		$this->db->where("password", $password);
		$this->db->select("*");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->row();
	}

	public function check_user_mod($tbl, $email)
	{
		$this->db->where("email", $email);
		//$this->db->where("password",$password);
		$this->db->select("*");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->row();
	}
	public function select_data_by_filter_faculty($tbl, $field, $name)
	{
		$this->db->where($field, $name);
		$this->db->select("*");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->row();
	}



	public function select_data($tbl, $wher, $id)
	{
		$this->db->where($wher, $id);
		$this->db->select("*");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->row();
	}

	public function get_installment_last_reco($tbl, $wher, $id)
	{
		$this->db->where($wher, $id);
		$this->db->select("*");
		$this->db->from($tbl);
		$this->db->order_by("admission_installment_id", "desc");
		$data = $this->db->get();
		return $data->row();
	}

	public function get_next_installment_reminder($tbl, $wher, $id)
	{
		$amount ="";
		$this->db->where($wher, $id);
		$this->db->select("*");
		$this->db->where("paid_amount", $amount);
		$this->db->from($tbl);
		$this->db->order_by("admission_installment_id", "asc");
		$data = $this->db->get();
		return $data->row();
	}

	public function filter_data($tbl, $wher, $id)
	{
		$this->db->where($wher, $id);
		$this->db->select("*");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}


	public function count_demo($tbl, $status)
	{

		if ($_SESSION['logtype'] == "Faculty") {

			$this->db->where("faculty_id", $_SESSION['user_id']);
		}
		$this->db->where("demoStatus", $status);
		$this->db->select('*');
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->num_rows();
	}

	public function check_update($tbl)
	{

		if ($_SESSION['logtype'] == "Faculty") {

			$this->db->where("faculty_id", $_SESSION['user_id']);
		}
		$this->db->where('last_update >=', $_SESSION['user_last_seen']);


		$this->db->select('*');
		$this->db->from($tbl);
		$this->db->order_by("demo_id", "desc");

		$data = $this->db->get();
		return $data->result();
	}

	public function view_all_user($tbl)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		$this->db->order_by("user_id", "desc");
		$data = $this->db->get();
		return $data->result();
	}

	public function demo_analysis($tbl)
	{

		if ($_SESSION['logtype'] == "Faculty") {
			$this->db->where("faculty_id", $_SESSION['user_id']);
		}
		$this->db->select('*');
		$this->db->order_by("demo_id", "desc");
		$this->db->from($tbl);
		$this->db->where('MONTH(demoDate)', date('m')); //For current month
		$this->db->where('YEAR(demoDate)', date('Y')); // For current year
		$data = $this->db->get();
		return $data->result();
	}

	public function filter_demo_analysis($tbl, $filter)
	{

		if (!empty($filter['search'])) {
			if (!empty($filter['filter_branch'])) {
				$this->db->where("branch_id", $filter['filter_branch']);
			}
			if (!empty($filter['filter_department'])) {
				$this->db->where("department_id", $filter['filter_department']);
			}
			if (!empty($filter['filter_faculty'])) {
				$this->db->where("faculty_id", $filter['filter_faculty']);
			}

			if (@$filter['filter_demoStatus'] == "0" || @$filter['filter_demoStatus'] == "1" || @$filter['filter_demoStatus'] == "2" || @$filter['filter_demoStatus'] == "3") {
				$this->db->where("demoStatus", $filter['filter_demoStatus']);
			}
			if (!empty($filter['filter_demoDate_start']) && !empty($filter['filter_demoDate_end'])) {


				$this->db->where('demoDate >=', $filter['filter_demoDate_start']);
				$this->db->where('demoDate <=', $filter['filter_demoDate_end']);
			} else {
				$this->db->where('MONTH(demoDate)', date('m')); //For current month
				$this->db->where('YEAR(demoDate)', date('Y')); // For current year

			}
		}


		if ($_SESSION['logtype'] == "Faculty") {

			$this->db->where("faculty_id", $_SESSION['user_id']);
		}
		$this->db->select('*');
		$this->db->order_by("demo_id", "desc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}

	public function filter_course($filter){
		if (!empty($filter['subdepartment_single_c'])) {
			$this->db->where("subdepart_ids", $filter['subdepartment_single_c']);
		}
		if (!empty($filter['filter_single_course'])) {
			$this->db->where("course_id", $filter['filter_single_course']);
		}
		$this->db->select('*');
		$this->db->from("course");
		$data = $this->db->get();
		return $data->result();
	}

	public function filter_packages($filter){
		if (!empty($filter['subdepartment'])) {
			$this->db->where("subdepart_ids", $filter['subdepartment']);
		}
		if (!empty($filter['filter_package'])) {
			$this->db->where("package_id", $filter['filter_package']);
		}

		$this->db->select('*');
		$this->db->from("package");
		$data = $this->db->get();
		return $data->result();
	}

	public function fetch_data_student_status_wise_record($tbl, $field, $st)
	{
		$this->db->select('*');
		// $this->db->join('company_detail','company_detail.company_name = application_job.confirm_company_name');
		$this->db->where($field, $st);
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}

	public function fetch_data_student_status_wise_record_without_status($tbl,$field,$st){
		$this->db->select('*');
		$this->db->where($field, $st);
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}

	public function fetch_data_company_status_wise_record($tbl, $field, $status)
	{
		$this->db->select('*');
		if ($status != 'all') {
			$this->db->where($field, $status);
		}
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}

	public function jobapplication_filter_exp($tbl, $filter = 0)
	{
		if (!empty($filter['filter_student_experience'])) {
			if (!empty($filter['filter_joining_date_wise'])) {
				$this->db->where('confirm_joining_date >=', $filter['filter_joining_date_wise']);
			}
			if (!empty($filter['filter_company_name'])) {
				$this->db->like("confirm_company_name", $filter['filter_company_name']);

			}
			if (!empty($filter['filter_joining_date_wise'])) {
				$this->db->like("confirm_starting_company_confirm", $filter['filter_joining_date_wise']);
			}
			if (!empty($filter['filter_bond_year_month'])) {
				$this->db->like("confirm_bond_year_month", $filter['filter_bond_year_month']);
			}
		}
		$this->db->select('*');
		$this->db->from($tbl);
		$data = $this->db->get();
		// print_r($this->db->last_query());  
		return $data->result();
	}


	// $tbl, $app_status = '', $val = '', $next_ac_date = '', $dateV = '')
	// {

	// 	$this->db->select('*');
	// 	if ($app_status != ''  && $val != '') {
	// 		$this->db->where($app_status, $val);
	// 	}
	// 	if ($next_ac_date != '' && $dateV != '') {
	// 		$this->db->where($next_ac_date, $dateV);
	// 	}
	// 	$this->db->order_by("application_id", "desc");
	// 	$this->db->from($tbl);
	// 	$data = $this->db->get();
	// 	return $data->result();
	// }

	public function jobapplication_filter($tbl, $app_status='',$val='', $filter = 0)
	{
		$nDate = explode('/',$filter['filter_Next_Followup_Date_from']);
		@$newDate = $nDate[1]."/".$nDate[0].'/'.$nDate[2];

		$oDate = explode('/',$filter['filter_Next_Followup_Date_to']);
		@$oldDate = $oDate[1]."/".$oDate[0].'/'.$oDate[2];
		if ($app_status != ''  && $val != '') {
			$this->db->where($app_status, $val);
		}
		if (!empty($filter['filter_profile'])) {
			if (!empty($newDate)) {
				$this->db->where('application_date >=', $newDate);

			}
			if (!empty($filter['filter_Next_Followup_Date_to'])) {
				$this->db->where('application_date <=', $oldDate);
			}

			if (!empty($filter['filter_prefer_job_location'])) {
				$this->db->like("prefer_job_location", $filter['filter_prefer_job_location']);
			}
			if (!empty($filter['filter_gr_id'])) {
				$this->db->like("gr_id", $filter['filter_gr_id']);
			}
			if (!empty($filter['filter_fname'])) {
				$this->db->like("name", $filter['filter_fname']);
			}
			if (!empty($filter['filter_branch'])) {
				$this->db->like("branch_id", $filter['filter_branch']);
			}
			if (!empty($filter['filter_position_for_apply'])) {
				$this->db->like("position_for_apply", $filter['filter_position_for_apply']);
			}
			if (!empty($filter['filter_applicationId'])) {
				$this->db->like("application_id", $filter['filter_applicationId']);
			}
			if (!empty($filter['filter_email'])) {
				$this->db->like("email", $filter['filter_email']);
			}
			if (!empty($filter['filter_mobile'])) {
				$this->db->like("number", $filter['filter_mobile']);
			}
			if (!empty($filter['filter_faculty'])) {
				$this->db->like("faculty_id", $filter['filter_faculty']);
			}
			if(!empty($filter['filter_oe_type'])){
				$this->db->like('owner_employee_type',$filter['filter_oe_type']);
			}

			if(!empty($filter['filter_school_name'])){
				$this->db->like('school_name',$filter['filter_school_name']);
			}
		}
		// echo "<pre>";
		// print_r($filter);
		// exit;
		$this->db->select('*');
		$this->db->order_by("application_id", "ASC");
		$this->db->from($tbl);
		$data = $this->db->get();
		// print_r($this->db->last_query());    
		return $data->result();
	}




	public function remark_searching_record($tbl, $data, $appli_no)
	{


		// // $this->db->like('applications_id',$data);
		// $this->db->like('remarks',$data);
		// $this->db->like('labels',$data);
		// $this->db->like('remarks_by',$data);
		// // $this->db->like('faculty_assign',$data);
		// $this->db->where('applications_id',$appli_no);
		// $this->db->from($tbl);
		$query = "SELECT * FROM `job_remarks` WHERE (`remarks` LIKE '%$data%'  OR `labels` LIKE '%$data%' OR  `remarks_by` LIKE '%$data%' OR `faculty_assign` LIKE '%$data%' OR `re_date` LIKE '%$data%') AND `applications_id` = '$appli_no'";
		$res = $this->db->query($query);
		// print_r($this->db->last_query());    
		return $res->result();
	}

	public function view_all_job_application($tbl, $app_status = '', $val = '', $next_ac_date = '', $dateV = '')
	{

		$this->db->select('*');
		if ($app_status != ''  && $val != '') {
			$this->db->where($app_status, $val);
		}
		if ($next_ac_date != '' && $dateV != '') {
			$this->db->where($next_ac_date, $dateV);
		}
		$this->db->order_by("application_id", "desc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}

	public function noactive_job($tbl,$feild,$st)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		$this->db->where($feild , $st);
		$data = $this->db->get();
		return $data->result();
	}




	public function view_all_desc($tbl, $by)
	{

		$this->db->select('*');
		$this->db->order_by($by, "desc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}



	public function select_property($branch_id, $place_typeid, $produc_typeid)
	{

		$this->db->where("branch_id", $branch_id);
		$this->db->where("place_type_id", $place_typeid);
		$this->db->where("product_type_id", $produc_typeid);
		$this->db->select('*');
		$this->db->from("product");
		$data = $this->db->get();
		return $data->result();
	}

	public function select_all_conversion($complain_id)
	{
		$this->db->where("complain_id", $complain_id);
		$this->db->select('*');
		$this->db->from("product_issue_communication");
		$this->db->order_by("communication_id", "asc");
		$data = $this->db->get();
		return $data->result();
	}


	//custom changes for single course

	public function delete_item($course_id)
	{
		//print_r($id);
		//die();
		return $this->db->delete('course', array('course_id' => $course_id));
	}


	//custom chages for pakagecourse

	public function removepakages($package_id)
	{
		//print_r($id);
		//die();
		return $this->db->delete('package', array('package_id' => $package_id));
	}

	///////////////----custom chamges add new complain----/////////////////////////////

	public function get_list_of_property($tbl, $id, $branch_id, $place_id)
	{

		$this->db->where("product_type_id", $id);
		$this->db->where("branch_id", $branch_id);
		$this->db->where("place_type_id", $place_id);
		$this->db->select('*');
		$this->db->from($tbl);

		$data = $this->db->get();



		$output = '<option value="1">Select Property</option>';
		foreach ($data->result() as $row) {
			$output .= '<option value="' . $row->product_id . '">' . $row->product_name . '</option>';
		}
		return $output;
	}

	// public function insert_dataaddcomplain_new($formArray)
	// {
	//  		//print_r($formArray);
	//  		return $this->db->insert("property_complain",$formArray);
	// 	}

	///////////////////////----------hodcusttom-------------//////////////////////////

	public function view_all_hods($tbl)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		$this->db->join('department', 'department.department_id = hod.department_ids');
		$data = $this->db->get();
		return $data->result();
	}

	///////////////////////--------bargraf indexCustom--------/////////////////////////////
	public function demo_index($tbl)
	{
		if ($_SESSION['logtype'] == "Faculty") {
			$this->db->where("faculty_id", $_SESSION['user_id']);
		}
		$this->db->select('*');
		$this->db->order_by("demo_id", "desc");
		$this->db->from($tbl);
		//$this->db->where('MONTH(demoDate)', date('m')); //For current month
		$this->db->where('YEAR(demoDate)', date('Y')); // For current year
		$data = $this->db->get();
		return $data->result();
	}


	public function get_lastWeek_data($table, $lastweek, $currweek)
	{
		$this->db->select('*');
		$this->db->where('demoDate >=', $lastweek);
		$this->db->where('demoDate <=', $currweek);
		$this->db->from($table);
		$data = $this->db->get();
		return $data->result();
	}

	/////////counselor//////////

	public function view_all_couseller($tbl)
	{


		$this->db->where('logtype', 'Counselor ');

		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}


	/////////Admin//////////

	public function Role_all_admin($tbl)
	{
		$this->db->where('logtype', 'Admin');
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}

	// public function get_record_from_demo($tbl,$data,$field)
	// {
	// 	$this->db->where($field,$data);
	// 	$this->db->from($tbl);
	// 	$this->db->where('MONTH(demoDate)', date('m')); //For current month
	//        $this->db->where('YEAR(demoDate)', date('Y'));
	//        $this->db->where('demoStatus','1');
	// 	$data = $this->db->get();
	// 	return $data->result();
	// }

	public function get_record_from_demo($tbl, $data, $field)
	{

		$this->db->where($field, $data);
		$this->db->from($tbl);
		//$this->db->where('MONTH(demoDate)', date('m')); //For current month
		$this->db->where('YEAR(demoDate)', date('Y'));
		// $this->db->where('demoStatus','1');
		$data = $this->db->get();
		return $data->result();
	}

	public function get_record_from_demo_done($tbl, $data, $field, $s)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		//$this->db->where('MONTH(demoDate)', date('m')); //For current month
		$this->db->where('YEAR(demoDate)', date('Y'));
		$this->db->where('demoStatus', $s);
		$data = $this->db->get();
		return $data->result();
	}
	//////////////----------counselor done demo use ---------////////////

	public function done_demo_record($tbl, $data, $field, $lastweek, $currweek)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$this->db->where('demoDate >=', $lastweek);
		$this->db->where('demoDate <=', $currweek);
		$this->db->where('demoStatus', '1');
		$data = $this->db->get();
		return $data->result();
	}


	public function get_lastWeek_data_demo_cca($table, $data, $field, $lastweek, $currweek)
	{

		//$this->db->select('*');
		$this->db->where($field, $data);
		$this->db->where('demoDate >=', $lastweek);
		$this->db->where('demoDate <=', $currweek);
		// $this->db->where('demoStatus','1');
		$this->db->from($table);
		$data = $this->db->get();

		return $data->result();
	}

	public function get_lastWeek_data_demo_cc($table, $data, $field, $lastweek, $currweek, $s)
	{

		//$this->db->select('*');
		$this->db->where($field, $data);
		$this->db->where('demoDate >=', $lastweek);
		$this->db->where('demoDate <=', $currweek);
		$this->db->where('demoStatus', $s);
		$this->db->from($table);
		$data = $this->db->get();

		return $data->result();
	}

	public function get_lastWeek_data_demo($table, $data, $field, $lastweek, $currweek)
	{

		//$this->db->select('*');
		$this->db->where($field, $data);
		$this->db->where('demoDate >=', $lastweek);
		$this->db->where('demoDate <=', $currweek);
		$this->db->where('demoStatus', '1');
		$this->db->from($table);
		$data = $this->db->get();

		return $data->result();
	}

	///////////////---------------/////////	



	public function fetch_seat_course($department_ids)
	{
		$this->db->where('department_ids', $department_ids);
		$this->db->order_by('seat_course_name', 'ASC');
		$query = $this->db->get('seat_course');
		$output = '<option value="">Select Seat Course</option>';
		foreach ($query->result() as $row) {
			$output .= '<option value="' . $row->seat_course_id . '">' . $row->seat_course_name . '</option>';
		}
		return $output;
	}


	public function fetch_seat_department($branch_ids)
	{

		$data = explode(',', $branch_ids);

		foreach ($data as $key => $value) {
			$this->db->where('department_id', $value);
			$this->db->order_by('department_name', 'ASC');
			$query = $this->db->get('department');
			$all[] = $query->result();
		}

		$output = '<option value="">Select Seat Course</option>';
		foreach ($all as $row) {
			$output .= '<option value="' . $row[0]->department_id . '">' . $row[0]->department_name . '</option>';
		}
		return $output;
	}

	public function admission_seat()
	{
		$this->db->select('*');
		$this->db->where('admission_date >=', date('2019-01-01'));
		$this->db->where('admission_date <=', date('2020-03-04'));
		$this->db->from('eduzilladata');
		$data = $this->db->get();
		return $data->result();
	}

	public function seat_insert_data($tbl, $data)
	{
		//print_r($data);
		//die();
		$this->db->insert($tbl, $data);
		$id =  $this->db->insert_id();
		return $id;
	}


	public function fetch_data_sea($query, $f, $v)
	{
		$this->db->select("*");
		$this->db->from("eduzilladata");
		if ($query != '') {
			$this->db->like('course', $query);
		}
		// $this->db->order_by('course_id', 'DESC');
		$this->db->like($f, $v);
		//  $this->db->like($m,$n);
		$result =  $this->db->get();
		return $result->result();
	}


	public function fetch_data_sea_new($query, $f, $v, $m, $n)
	{
		$this->db->select("*");
		$this->db->from("eduzilladata");
		if ($query != '') {
			$this->db->like('course_package', $query);
		}
		// $this->db->order_by('course_id', 'DESC');
		$this->db->like($f, $v);
		$this->db->like($m, $n);
		$result =  $this->db->get();
		return $result->result();
	}

	public function view_all_order($tbl)
	{


		$this->db->order_by('batch_year', 'ASC');
		$data = $this->db->get($tbl);


		return $data->result();
	}

	public function filter_seat_data($tbl, $wher, $id, $w, $i)
	{
		$this->db->where($wher, $id);
		$this->db->where($w, $i);
		$this->db->select("*");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}

	public function get_company_wise_post($tbl)
	{
		$this->db->select('*');
		$this->db->from($tbl);

		$data =  $this->db->get();
		return $data->result();
	}

	//change job status

	public function change_admin_status_record($tbl, $data, $id, $field)
	{
		$this->db->where($field, $id);
		return $this->db->update($tbl, $data);
	}

	public function get_all_jobs_post($tbl, $filter = 0)
	{

		if (!empty($filter['filter_search'])) {
			if (!empty($filter['filter_startDate']) && !empty($filter['filter_endDate'])) {
				$this->db->where('start_date >=', $filter['filter_startDate']);
				$this->db->where('end_date <=', $filter['filter_endDate']);
			}

			if (!empty($filter['filter_fname'])) {
				$this->db->like("company_name", $filter['filter_fname']);
			}

			if (!empty($filter['filter_email'])) {
				$this->db->like("email", $filter['filter_email']);
			}
			if (!empty($filter['filter_mobile'])) {
				$this->db->like("mobile_no", $filter['filter_mobile']);
			}
			if (!empty($filter['filter_position_for_apply'])) {
				$this->db->like("position", $filter['filter_position_for_apply']);
			}
			if (!empty($filter['filter_prefer_job_location'])) {
				$this->db->like("job_area", $filter['filter_prefer_job_location']);
			}
		}
		$this->db->from($tbl);
		$this->db->join('company_detail', 'company_detail.company_id=job_post.company_id');
		$data = $this->db->get();
		return $data->result();
	}

	public function student_applied_on_job($tbl)
	{
		$this->db->select('co_de.status as co_status, co_de.url as url, co_de.company_name as co_name , co_de.company_number as co_number, co_de.company_address as co_address, job_post.*, application_job.*,student_applied_job.* ');
		$this->db->from($tbl);
		$this->db->join('job_post', 'student_applied_job.jobpost_id=job_post.jobpost_id');
		$this->db->join('application_job', 'application_job.gr_id=student_applied_job.student_id');
		$this->db->join('company_detail as co_de', 'co_de.company_id=student_applied_job.company_id');
		$data = $this->db->get();
		// print_r($this->db->last_query());
		// exit;
		return $data->result();
	}

	public function count_total_company($tbl)
	{
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->num_rows();
	}

	public function count_total_status_company($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->num_rows();
	}

	public function company_wise_job($tbl, $field, $id)
	{

		$this->db->where('job_post.company_id', $id);
		$this->db->join('company_detail', 'company_detail.company_id=job_post.company_id');
		$this->db->from($tbl);
		$data = $this->db->get();

		return $data->result();
		// $record = $data->result();
		// 	echo "<pre>";
		// 	print_r($record);
		// 	exit;
	}

	public function status_wise_record_company($tbl, $c_field, $c_data, $data)
	{
		// $this->db->where($s_field,$s_data);
		$this->db->where($c_field, $c_data);
		return $this->db->update($tbl, $data);
	}

	public function get_company_record($tbl, $data, $field)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->row();
	}
	public function get_company_record_bystatus($tbl, $field = '', $data = '')
	{
		if ($data != 'all') {
			$this->db->where($field, $data);
		}
		$this->db->from($tbl);
		$this->db->order_by("company_id", "desc");
		$data =  $this->db->get();
		return $data->result();
		// $record =  $data->result();
		// echo "<pre>";
		// print_r($record);
		// exit;
	}
	public function get_company_remarks($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}
	public function add_remarks_company($tbl, $data)
	{
		return $this->db->insert($tbl, $data);
	}

	public function search_by_field_company($tbl, $record, $status)
	{
		$this->db->where('status', $status);
		if ($record['company_name'] != '') {
			$this->db->like('company_name', $record['company_name']);
		}
		if ($record['company_no'] != '') {
			$this->db->like('company_number', $record['company_no']);
		}
		if ($record['employer_name'] != '') {
			$this->db->like('employer_name', $record['employer_name']);
		}
		if ($record['email'] != '') {
			$this->db->like('email_id', $record['email']);
		}
		if ($record['filter_start_date'] != '' && $record['filter_end_date'] != '') {
			$first_date =  $record['filter_start_date'];
			$second_date =  $record['filter_end_date'];
			$this->db->where('date >=', $first_date);
			$this->db->where('date <=', $second_date);
		}
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}



	public function fetch_adminWise_branch($admin_id)
	{

		$data = explode(',', $admin_id);

		foreach ($data as $key => $value) {
			$this->db->where('admin_id', $value);
			$this->db->order_by('branch_name', 'ASC');
			$query = $this->db->get('branch');
			$all = $query->result();
		}
		//   echo "<pre>";
		//  // print_r($data);
		// print_r($all);
		// die;

		$output = '<option value="">Select Branch</option>';
		foreach ($all as $k => $row) {
			$output .= '<option value="' . $row->branch_id . '">' . $row->branch_name . '</option>';
		}
		return $output;
	}

	public function fetch_department($branch_id)
	{

		$data = explode(',', $branch_id);

		foreach ($data as $key => $value) {
			$this->db->where('branch_id', $value);
			$this->db->order_by('department_name', 'ASC');
			$query = $this->db->get('department');
			$all = $query->result();
		}

		// echo "<pre>";
		// 	print_r($data);
		// print_r($all);
		// die;



		$output = '<option value="">Select Department</option>';
		foreach ($all as $k => $row) {
			$output .= '<option value="' . $row->department_id . '">' . $row->department_name . '</option>';
		}
		return $output;
	}

	public function fetch_subdepartment($department_ids)
	{

		$data = explode(',', $department_ids);

		foreach ($data as $key => $value) {
			$this->db->where('department_ids', $value);
			$this->db->order_by('subdepartment_name', 'ASC');
			$query = $this->db->get('subdepartment');
			$all = $query->result();
		}
		//   echo "<pre>";
		//  // print_r($data);
		// print_r($all);
		// die;

		$output = '<option value="">Select Sub Department</option>';
		foreach ($all as $k => $row) {
			$output .= '<option value="' . $row->subdepartment_id . '">' . $row->subdepartment_name . '</option>';
		}
		return $output;
	}


	public function depatment_wise_package($department_id)
	{

		$data = explode(',', $department_id);

		foreach ($data as $key => $value) {
			$this->db->where('department_id', $value);
			$this->db->order_by('package_name', 'ASC');
			$query = $this->db->get('package');
			$all = $query->result();
		}
		//   echo "<pre>";
		//  // print_r($data);
		// print_r($all);
		// die;

		$output = '<option value="">Select course</option>';
		foreach ($all as $k => $row) {
			$output .= '<option value="' . $row->package_id . '">' . $row->package_name . '</option>';
		}
		return $output;
	}

	public function department_wise_course($department_id)
	{

		$data = explode(',', $department_id);

		foreach ($data as $key => $value) {
			$this->db->where('department_id', $value);
			$this->db->order_by('course_name', 'ASC');
			$query = $this->db->get('course');
			$all = $query->result();
		}
		//   echo "<pre>";
		//  // print_r($data);
		// print_r($all);
		// die;

		$output = '<option value="">Select course</option>';
		foreach ($all as $k => $row) {
			$output .= '<option value="' . $row->course_id . '">' . $row->course_name . '</option>';
		}
		return $output;
	}



	public function fetch_faculty($subdepartment_id)
	{

		$data = explode(',', $subdepartment_id);

		foreach ($data as $key => $value) {
			$this->db->where('subdepartment_id', $value);
			$this->db->order_by('name', 'ASC');
			$query = $this->db->get('faculty');
			$all = $query->result();
		}
		//   echo "<pre>";
		//  // print_r($data);
		// print_r($all);
		// die;

		$output = '<option value="">Select  Faculty</option>';
		foreach ($all as $k => $row) {
			$output .= '<option value="' . $row->faculty_id . '">' . $row->name . '</option>';
		}
		return $output;
	}


	public function get_rapid_post_data($tbl)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}

	public function get_filter_record($tbl, $record)
	{
		if ($record['company_name'] != '') {
			$this->db->like('company_name', $record['company_name']);
		}
		if ($record['recruiter_name'] != '') {
			$this->db->like('recruiter_name', $record['recruiter_name']);
		}
		if ($record['job_title'] != '') {
			$this->db->like('job_title', $record['job_title']);
		}
		if ($record['position'] != '') {
			$this->db->like('position', $record['position']);
		}
		if ($record['job_location'] != '') {
			$this->db->like('job_location', $record['job_location']);
		}
		if ($record['filter_start_date'] != '' && $record['filter_end_date'] != '') {
			$first_date =  $record['filter_start_date'];
			$second_date =  $record['filter_end_date'];
			$this->db->where('end_date >=', $first_date);
			$this->db->where('end_date <=', $second_date);
		}

		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}

	public function change_rating($tbl, $field, $company_id, $data)
	{
		$this->db->where($field, $company_id);
		return $this->db->update($tbl, $data);
	}

	public function student_star_rating($tbl, $field, $app_id, $data)
	{
		$this->db->where($field, $app_id);
		return $this->db->update($tbl, $data);
	}

	public function view_get_all_remarks_job($tbl)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}

	public function add_all_related_questions($tbl, $data)
	{
		return $this->db->insert($tbl, $data);
	}

	public function view_all_by_student($tbl)
	{
		$this->db->from($tbl);
		$this->db->group_by('header');
		$data = $this->db->get();
		return $data->result();
	}

	public function get_header_wise_record($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);

		$data = $this->db->get();
		return $data->result();
	}

	public function delete_record($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		return $this->db->delete($tbl);
	}

	public function logtype_hirachiy()
	{
		$query = "SELECT * FROM logtype";
		$res = $this->db->query($query);
		$data = $res->result();

		foreach ($data as $key => $value) {

			for ($k = $value->parent_id; $k > 0; $k--) {

				$m = "SELECT logtype_name FROM logtype WHERE logtype_id = $k";
				$m1 = $this->db->query($m);
				$m2 = $m1->row();
				// print_r($m2->group_name);
				$value->group_nameall[$k] = $m2->logtype_name;
			}
		}
		// 		die;

		// print_r($data);
		// die; 

		return $data;
	}
	public function filter_data_all_where($tbl, $wher)
	{
		foreach ($wher as $key => $value) {

			$this->db->where("$key", "$value");
		}
		$this->db->select("*");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}
	public function filter_data_all_where_user($tbl, $k, $v, $f, $d)
	{

		$this->db->where("$k!=", $v);
		$this->db->where("$f!=", $d);
		$this->db->select("*");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}
	public function select_manager($tb, $field, $id)
	{
		$this->db->like($field, $id);
		$this->db->from($tb);
		$data = $this->db->get();
		return $data->result();
	}

	public function filter_data_all_permisson_user($tbl, $data, $k, $v, $f, $d)
	{

		$this->db->where($k, $v);
		$this->db->where($f, $d);
		return $this->db->update($tbl, $data);
	}



	// new demo dashboard models -------------------------------------------------------------->

	public function get_demo_details($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->row();
	}


	public function get_history_demo_students($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}

	public function get_demo_remarks_details($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$this->db->order_by("demo_remark_id", "DESC");
		$data =  $this->db->get();
		return $data->result();
	}

	public function get_branch_record($tbl)
	{
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}

	public function insert_add_record($tbl, $data)
	{
		return $this->db->insert($tbl, $data);
	}

	public function get_demo_record($tbl, $field, $demo_id)
	{
		$this->db->where($field, $demo_id);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->row();
	}

	public function insert_demo_history($tbl, $data)
	{
		return $this->db->insert($tbl, $data);
	}

	// LeadList all function ------------------------------------------------------------------->

	public function get_lead_record_list($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->row();
	}

	public function check_record_alerady($tbl, $record)
	{
		// $this->db->where('email',$record['email']);
		$this->db->or_where('mobile_no',$record['mobile_no']);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->num_rows();
	}

	public function quick_lead_data($tbl, $data)
	{
		$this->db->insert($tbl, $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	public function update_lead_record($tbl, $data, $field, $lead_id)
	{
		$this->db->where($field, $lead_id);
		return $this->db->update($tbl, $data);
	}


	public function get_old_lead_record($tbl = '', $field = '', $id = '')
	{
		$this->db->where($field, $id);
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->row();
	}

	public function get_history_lead($tbl = '', $field = '', $id = '')
	{
		$this->db->where($field, $id);
		$this->db->order_by("lead_list_history_id", "desc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}

	public function view_all_records($tbl)
	{
		$role =  $_SESSION['Admin']['role'];
		if ($role == 'Super Admin') {
		} else if ($role == 'Counselor') {
		$username =  $_SESSION['Admin']['name'];
		$this->db->where('referred_to', $username);
		}
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->num_rows();
	}

	public function getRows($params = array())
	{
		$this->db->select('*');
		$this->db->from('lead_list');

		if (array_key_exists("where", $params)) {
			foreach ($params['where'] as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		$role =  $_SESSION['Admin']['role'];

		if ($role == 'Super Admin') {
		} else if ($role == 'Counselor') {
			$username =  $_SESSION['Admin']['name'];
			$this->db->where('referred_to', $username);
		} else {

			redirect("welcome/error_page");
		}
		// echo "<pre>";
		// print_r($username);
		// exit;
		// $this->db->where('referred_to',$username);

		if (array_key_exists("searching", $params)) {
			$count = 1;
			foreach ($params['searching'] as $key => $value) {
				if ($count == 1) {
					$this->db->like($key, $value);
				} else {
					$this->db->or_like($key, $value);
				}
				$count++;
			}
		}

		if (array_key_exists("order_by", $params)) {
			$this->db->order_by($params['order_by']);
		}

		if (array_key_exists("lead_list_id", $params)) {
			$this->db->where('lead_list_id', $params['lead_list_id']);
			$query = $this->db->get();
			$result = $query->row_array();
		} else {
			//set start and limit
			if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
				$this->db->limit($params['limit'], $params['start']);
			} elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
				$this->db->limit($params['limit']);
			}

			if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
				$result = $this->db->count_all_results();
			} else {
				$query = $this->db->get();
				// print_r($this->db->last_query());
				// exit;
				$result = ($query->num_rows() > 0) ? $query->result() : FALSE;
			}
		}

		return $result;
		// echo "<pre>";
		// // print_r($params);
		// print_r($result);
		// exit;
	}


	// public function getRows_myactivity($params = array())
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('lead_list');

	// 	if(array_key_exists("where",$params)){
	//            foreach ($params['where'] as $key => $value){
	//                $this->db->where($key,$value);
	//            }
	//        }


	// 	if(array_key_exists("searching",$params)){
	// 		$count =1 ;
	//            foreach ($params['searching'] as $key => $value){
	//                if($count==1){
	//                	$this->db->like($key,$value);
	//            	}else{
	//                	$this->db->or_like($key,$value);

	//            	}
	//            	$count++;
	//            }
	//        }

	// 	 if(array_key_exists("order_by",$params)){
	//            $this->db->order_by($params['order_by']);
	//        }

	// 	if(array_key_exists("lead_list_id",$params)){
	//            $this->db->where('lead_list_id',$params['lead_list_id']);

	//            $query = $this->db->get();
	//            $result = $query->row_array();
	//        }else{
	//            //set start and limit
	//            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
	//                $this->db->limit($params['limit'],$params['start']);
	//            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
	//                $this->db->limit($params['limit']);
	//            }

	//            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
	//                $result = $this->db->count_all_results();
	//            }else{
	//                $query = $this->db->get();
	//                // print_r($this->db->last_query());
	//                // exit;
	//                $result = ($query->num_rows() > 0)?$query->result():FALSE;
	//            }
	//        }

	//        return $result;
	// 	// echo "<pre>";
	// 	// // print_r($params);
	// 	// print_r($result);
	// 	// exit;
	// }
	public function get_lead_filter($tbl, $filter = 0){
    if (!empty($filter)) {
      if (!empty($filter['filter_prospected_name'])) {
        $this->db->like("name", $filter['filter_prospected_name']);
      }
	  if (!empty($filter['filter_email'])) {
        $this->db->like("email", $filter['filter_email']);
      }
	  if (!empty($filter['filter_mobile'])) {
        $this->db->like("mobile_no", $filter['filter_mobile']);
      }
	  if (!empty($filter['filter_sourse'])) {
        $this->db->like("source_id", $filter['filter_sourse']);
      }
	  if (!empty($filter['filter_branch'])) {
        $this->db->like("branch_id", $filter['filter_branch']);
      }
	  if (!empty($filter['filter_department'])) {
        $this->db->like("department", $filter['filter_department']);
      }
	  if (!empty($filter['filter_courses'])) {
        $this->db->like("course_or_package", $filter['filter_courses']);
      }
	  if (!empty($filter['filter_channel'])) {
        $this->db->like("channel_id", $filter['filter_channel']);
      }
	  if (!empty($filter['filter_status'])) {
        $this->db->like("status", $filter['filter_status']);
      }
	  if (!empty($filter['filter_substatus'])) {
        $this->db->like("sub_status", $filter['filter_substatus']);
      }
	//   if (!empty($filter['filter_from_creatioon_date']) && !empty($filter['filter_to_creatioon_date'])) {
    //     $this->db->where('lead_creation_date >=', date('m/d/Y',strtotime($filter['filter_from_creatioon_date'])));
    //     $this->db->where('lead_creation_date <=', date('m/d/Y',strtotime($filter['filter_to_creatioon_date'])));
    //   }
    }

    $this->db->select('*');
    $this->db->order_by('lead_list_id', "desc");
    $this->db->from($tbl);
    $data = $this->db->get();
	// $data1 = $this->db->last_query();
	// print_r($data1);
    return $data->result();
  }

	public function view_all_branch($tbl)
	{
		$admin_id = 65;
		$this->db->where('admin_id', $admin_id);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}

	public function get_source_record($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}

	public function get_record_channel($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->row();
	}

	public function delete_channel($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		return $this->db->delete($tbl);
	}

	public function updateChannel($tbl, $field, $id, $data)
	{
		$this->db->where($field, $id);
		return $this->db->update($tbl, $data);
	}

	public function addChannel($tbl, $data)
	{
		return $this->db->insert($tbl, $data);
	}


	//  api login system

	public function ge_user_permission($tbl, $l_type, $l_data, $l_id, $l_value)
	{
		$this->db->where($l_type, $l_data);
		$this->db->where($l_id, $l_value);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->row();
	}
	public function ge_user_permission_user($tbl, $l_id, $l_value)
	{
		// $this->db->where($l_type, $l_data);
		$this->db->where($l_id, $l_value);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->row();
	}
	public function all_mod_data($tbl, $jtbl, $id)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		$this->db->join($jtbl, $jtbl . '.' . $id . '=' . $tbl . '.' . $id);
		$data = $this->db->get();
		return $data->result();
	}

	public function get_template_html($tbl, $field, $id)
	{
		$this->db->select('html_template');
		$this->db->where($field, $id);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->row();
	}

	public function get_template_rec($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->row();
	}
	public function log_counter()
	{
		$this->db->where("type_id", @$_SESSION['user_id']);
		$this->db->where("DATE(created_on) >= DATE(NOW())");
		//$this->db->where("created_date >=" ,date('d-m-Y'));
		//$this->db->where("token",UserInfo::get_ip());
		$this->db->where("device", UserInfo::get_device());
		$this->db->where("os", UserInfo::get_os());
		$this->db->where("browser", UserInfo::get_browser());
		$this->db->select("*");
		$this->db->from("logger");
		$data = $this->db->get();
		return $data->row();
	}

	public function get_lead_response($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$this->db->order_by("l_f_h_id", "desc");
		$data = $this->db->get();
		return $data->result();
	}
	public function view_all_log_history()
	{
		// echo date('d-m-Y');
		// die;
		$this->db->where("DATE(created_on) >= DATE(NOW())");
		$this->db->select("*");
		$this->db->from("logger");

		$data = $this->db->get();
		// echo "<pre>";
		// print_r($data->result());
		// die;
		return $data->result();


		// $q = "SELECT * FROM logger WHERE  DATE(created_on) >= DATE(NOW()) ORDER BY `created_on` DESC";
		// $q1 = $this->db->query($q);
		//  return $q1->result();

	}
	public function view_all_log_date($start, $end)
	{

		//$this->db->where("created_date >=" ,$start);
		//$this->db->where("created_date <=" ,$end);
		$this->db->where("DATE(created_on) >= '$start'");
		$this->db->where("DATE(created_on) <= '$end'");
		$this->db->select("*");
		$this->db->from("logger");
		$data = $this->db->get();
		return $data->result();
	}
	public function view_all_log_single_date($start)
	{

		$this->db->like("created_date", $start);
		$this->db->select("*");
		$this->db->from("logger");
		$data = $this->db->get();
		return $data->result();
	}

	public function search_log_history($tbl, $data)
	{

		// echo "<pre>";
		// print_r($data);
		// die;

		$this->db->where("created_date >=", $data['sdate']);
		$this->db->where("created_date <=", $data['edate']);
		$this->db->like("created_by", $data['u_name']);
		$this->db->like("created_by", $data['f_name']);
		$this->db->like("created_by", $data['h_name']);
		$this->db->like("device", $data['device']);
		$this->db->like("browser", $data['browser']);

		$this->db->select("*");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}

	public function search_log_history_with_date($tbl, $data)
	{

		// echo "<pre>";
		// print_r($data);
		// die;

		if (!empty($data['sdate'])) {

			$this->db->like("created_date", $data['sdate']);
		} else {
			$this->db->like("created_date", $data['edate']);
		}
		$this->db->like("created_by", $data['u_name']);
		$this->db->like("created_by", $data['f_name']);
		$this->db->like("created_by", $data['h_name']);
		$this->db->like("device", $data['device']);
		$this->db->like("browser", $data['browser']);

		$this->db->select("*");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}


	public function get_sms_template_record($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->row();
	}

	public function update_data_log_time($tbl, $data)
	{
		// print_r($data);
		// die();

		return $this->db->update($tbl, $data);
	}

	public function get_template_record($tble, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tble);
		$data =  $this->db->get();
		return $data->row();
	}
	// 	public function filter_log($tbl,$data)
	// {

	// 	$this->db->select('*');
	// 	$this->db->like('name',$data);
	// 	$this->db->from($tbl);
	// 	$data = $this->db->get();
	// 	return $data->result();	
	// }




	public function get_facultes($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}

	public function get_course_depar_wise($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		// $this->db->where($field1,$data1);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}


	public function match_branch($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->row();
	}

	public function getDocumentListRecord($tbl,$data){
		// print_r($data);
		// exit;
		$this->db->select('*');
		$this->db->where('branch_id',$data['branch_id']);
		$this->db->where('department_id',$data['department_id']);
		// $this->db->where('type',$data['singleD']);
		$this->db->from($tbl);
		$data = $this->db->get();
		// print_r($this->db->last_query());
		return $data->row();
	}

	public function match_department($tbl, $field, $data)
	{

		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->row();
	}

	public function get_jobs_ajax_wise($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}

	public function fetch_data_branchwise($record)
	{

		$this->db->where('branch_id', $record);
		$this->db->from('branch');
		$data =  $this->db->get();
		return $data->row();
	}

	public function fetch_data_fachwise($record)
	{

		$this->db->where('faculty_id', $record);
		$this->db->from('faculty');
		$data =  $this->db->get();
		return $data->row();
	}



	public function fetch_data_Depratmentwise($record)
	{

		$this->db->where('course_id', $record);
		$this->db->from('course');
		$this->db->join('department', 'department.department_id = course.department_id');
		$data =  $this->db->get();
		return $data->row();
	}

	public function fetch_data_p_depart($record)
	{

		$this->db->where('package_id', $record);
		$this->db->from('package');
		$this->db->join('department', 'department.department_id = package.department_id');
		$data =  $this->db->get();
		return $data->row();
	}

	public function get_course_faculty($tbl, $field, $data)
	{

		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}

	public function Get_faculty($id)
	{
		$data = explode(',', $id);
		//$data = explode(',', $course_id);

		foreach ($data as $key => $value) {
			$this->db->where('branch_ids', $value);
			$this->db->where('status', '0');
			$this->db->order_by('name', 'ASC');
			$query = $this->db->get('faculty');
			$all = $query->result();
		}

		$output = '<option value="">Select Faculty</option>';
		foreach ($all as $k => $row) {
			$output .= '<option value="' . $row->faculty_id . '">' . $row->name . '</option>';
		}
		return $output;
	}

	public function branch_wise_conselor($id)
	{
		foreach ($id as $key => $value) {
			$this->db->where('branch_ids', $value);
			$this->db->where('user_status =', '0');
			$this->db->order_by('name', 'ASC');
			$query = $this->db->get('user');
			$all = $query->result();
		}

		if ($all) {
			$output = '<option value="">Select Counselor</option>';
			foreach ($all as $k => $row) {
				$output .= '<option value="' . $row->user_id . '">' . $row->name . '</option>';
			}
			return $output;
		} else {
			$this->db->where('logtype', 'Counselor');
			$this->db->where('user_status', '0');
			$this->db->from('user');
			$cons =  $this->db->get();
			$data = $cons->result();

			$output = '<option value="">Select Counselor</option>';
			foreach ($data as $k => $row) {
				$output .= '<option value="' . $row->user_id . '">' . $row->name . '</option>';
			}
			return $output;
		}
	}

	public function get_packageName_installment($tbl, $field, $id)
	{
		$this->db->where($field, $id);
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->row();
	}

	public function ins_query($tbl, $record)
	{
		return $this->db->insert($tbl, $record);
	}


	public function upd_status_notification()
	{
		$id = $this->input->post('application_id');
		$notifive_status = $this->input->post('notifive_status');

		$this->db->set('notifive_status', $notifive_status);
		$this->db->where('application_id', $id);
		$result = $this->db->update('application_job');
		return $result;
	}

	public function application_notification($tbl)
	{
		$this->db->where('notifive_status', '0');
		$this->db->where('application_status', '0');
		$this->db->from($tbl);
		$this->db->join('job_remarks', 'job_remarks.job_remark_id = application_job.application_id');
		$data = $this->db->get();
		return $data->result();
	}


	public function applied_student_filter($tbl, $filter = 0)
	{
		if (!empty($filter['filter_appliy_student'])) {

			if (!empty($filter['filter_gr_id'])) {
				$this->db->like("gr_id", $filter['filter_gr_id']);
			}
			if (!empty($filter['filter_fname'])) {
				$this->db->like("student_id", $filter['filter_fname']);
			}

			if (!empty($filter['filter_company'])) {
				$this->db->like("company_id", $filter['filter_company']);
			}
			if (!empty($filter['filter_mobile'])) {
				$this->db->like("number", $filter['filter_mobile']);
			}
			if (!empty($filter['filter_company_mobile_no'])) {
				$this->db->like("company_number", $filter['filter_company_mobile_no']);
			}
		}
		$this->db->select('*');
		$this->db->order_by("applied_id", "ASC");
		$this->db->from($tbl);
		$this->db->join('company_detail', 'company_detail.company_id = student_applied_job.company_id');
		$data = $this->db->get();
		return $data->result();
	}


	//myactivity
	public function check_green_data($tbl, $field, $id)
	{
		$this->db->where($field, $id);
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->num_rows();
	}

	public function update_lead_record_data($tbl, $id, $data)
	{
		$this->db->where('lead_list_id', $id);
		return $this->db->update($tbl, $data);
	}

	public function count_date_wise_record($tbl, $next_date)
	{
		$username =  $_SESSION['Admin']['username'];
		// $this->db->where('referred_to', $username);
		$this->db->where('status != ', '1 - New');
		$this->db->where('status != ', '8 - Closed');
		$this->db->where('status != ', '7 - Enrolled');
		$this->db->where('status != ', '6 - Demo');
		$this->db->like('next_action_date', $next_date);

		$this->db->from($tbl);
		$data = $this->db->get();
		// print_r($this->db->last_query());
		return $data->num_rows();
	}

	public function get_date_wise_record_data($tbl, $next_date, $followup_status){
		$username =  $_SESSION['Admin']['username'];

		$this->db->where('referred_to', $username);
		$this->db->where('followup_status_yellow', $followup_status);
		$this->db->where('status != ', '1 - New');
		$this->db->where('status != ', '8 - Closed'); 	
		$this->db->where('status != ', '7 - Enrolled');
		$this->db->where('status != ', '6 - Demo');
		$this->db->like('next_action_date', $next_date);
		// $this->db->where('next_action_date >=',$next_date);
		// $this->db->like('next_action_date',$current_date);
		$this->db->from($tbl);
		$data = $this->db->get();
		// print_r($this->db->last_query());
		// exit;
		return $data->result();
	}

	public function update_myfollowup_record($tbl, $lead_field, $lead_id, $data)
	{
		$this->db->where($lead_field, $lead_id);
		return $this->db->update($tbl, $data);
	}


	public function getRows_myactivity($params = array())
	{
		// echo "<pre>";
		// print_r($params);

		$this->db->select('*');
		$this->db->from('lead_list');

		// print_r($params);
		$role =  $_SESSION['Admin']['role'];

		// $this->db->where('referred_to',$username);
		// $this->db->where('followup_status_data',$followup_status);
		$this->db->where('status != ', '1 - New');
		$this->db->where('status != ', '8 - Closed');
		$this->db->where('status != ', '7 - Enrolled');
		$this->db->where('status != ', '6 - Demo');
		// $this->db->like('next_action_date',$next_date);

		if ($role == 'Super Admin') {
		} else if ($role == 'Counselor') {
			$username =  $_SESSION['Admin']['username'];
			$this->db->where('referred_to', $username);
		} else {
			redirect("welcome/error_page");
		}


		if (array_key_exists("where", $params)) {
			$count = 1;
			foreach ($params['where'] as $key => $value) {
				if ($count == 1) {
					$this->db->where($key, $value);
				} else {

					$this->db->where($key, $value);
				}
				$count++;
			}
		}


		if (array_key_exists("searching", $params)) {
			$count = 1;
			foreach ($params['searching'] as $key => $value) {
				if ($count == 1) {
					$this->db->like($key, $value);
				} else {
					$this->db->or_like($key, $value);
				}
				$count++;
			}
		}

		if (array_key_exists("order_by", $params)) {
			$this->db->order_by($params['order_by']);
		}

		// $this->db->join('lead_followup_green_table','lead_followup_green_table.lead_list_green_id=lead_list.lead_list_id');

		if (array_key_exists("lead_list_id", $params)) {
			$this->db->where('lead_list_id', $params['lead_list_id']);
			$query = $this->db->get();
			$result = $query->row_array();
		} else {
			//set start and limit
			if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
				$this->db->limit($params['limit'], $params['start']);
			} elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
				$this->db->limit($params['limit']);
			}

			if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
				$result = $this->db->count_all_results();
				// exit;
			} else {
				$query = $this->db->get();
				// echo $query->num_rows();

				$result = ($query->num_rows() > 0) ? $query->result() : FALSE;
			}
		}

		// print_r($this->db->last_query());

		// exit;
		return $result;
		// echo "<pre>";
		// print_r($params);
		// print_r($result);
		// exit;
	}


	public function all_counselor($tbl)
	{
		$this->db->where('logtype', 'Counselor');
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}

	function save_data($tbl, $record)
	{

		return $this->db->insert($tbl, $record);
	}

	function insert_whatsapp_template($tbl, $record)
	{
		return $this->db->insert($tbl, $record);
	}

	public function delete_whatsapp_template_data($tbl, $field, $id)
	{
		$this->db->where($field, $id);
		return $this->db->delete($tbl);
	}

	public function get_template_whatsapp_data($tbl, $field, $id)
	{
		$this->db->where($field, $id);
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->row();
	}

	public function edit_update_whatsapp_template($tbl, $data, $field, $id)
	{
		$this->db->where($field, $id);
		return $this->db->update($tbl, $data);
	}

	public function get_whatsapp_te_message($tbl, $field, $name)
	{
		$this->db->select('w_template_message');
		$this->db->where($field, $name);
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->row();
	}

	public function get_campaign_record($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->row();
	}

	public function get_old_campaign_record($tbl = '', $field = '', $id = '')
	{
		$this->db->where($field, $id);
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->row();
	}

	public function update_campaign_record($tbl, $data, $field, $campaign_id)
	{
		$this->db->where($field, $campaign_id);
		return $this->db->update($tbl, $data);
	}

	public function alerady_check_record($tbl, $record)
	{
		// $this->db->where('email',$record['email']);
		$this->db->or_where('campaign', $record['campaign']);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->num_rows();
	}

	public function update_campaign_status_record($tbl, $data, $field, $campaign_id)
	{
		$this->db->where($field, $campaign_id);
		return $this->db->update($tbl, $data);
	}

	public function quick_campaign_data($tbl, $data)
	{
		$this->db->insert($tbl, $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	public function get_history_campaign_record($tbl = '', $field = '', $id = '')
	{
		$this->db->where($field, $id);
		$this->db->order_by("history_campaign_id", "desc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}

	public function insert_template_remarks_data($tbl, $data)
	{
		return $this->db->insert($tbl, $data);
	}

	public function fetch_all_records_application_no($tbl, $field, $id)
	{
		$this->db->where($field, $id);
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->row();
	}

	public function fetch_crm_data($record)
	{

		$this->db->where('mobile_no', $record);
		$this->db->from('lead_list');
		$data =  $this->db->get();
		return $data->row();
	}

	public function match_course($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->row();
	}


	public function get_subdepartwise_package($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}

	public function get_package($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}

	public function get_course($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}

	public function get_campaign_batches_record($tb, $field, $id)
	{
		$this->db->where($field, $id);
		$this->db->from($tb);
		$data = $this->db->get();
		return $data->result();
	}

	public function edit_update_SendEmail_template($tbl, $data, $field, $id)
	{
		$this->db->where($field, $id);
		return $this->db->update($tbl, $data);
	}

	function insert_SendEmail_template($tbl, $record)
	{
		return $this->db->insert($tbl, $record);
	}

	public function get_template_email_data($tbl, $field, $id)
	{
		$this->db->where($field, $id);
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->row();
	}

	public function delete_Email_template_data($tbl, $field, $id)
	{
		$this->db->where($field, $id);
		return $this->db->delete($tbl);
	}

	public function get_email_temp_record($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->row();
	}

	public function jobapp_nextdate_upd($tbl, $data, $field, $app_id)
	{
		$this->db->where($field, $app_id);
		return $this->db->update($tbl, $data);
	}

	public function view_Manager_record($tbl)
	{
		$this->db->where('logtype', 'Manager');
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result_array();
	}

	public function batch_notification_data()
	{
		$batch = "";
		$this->db->where('batch_id !=', $batch);
		$this->db->where('notification_status', '0');
		$this->db->select('*');
		$this->db->from('admission_courses');
		$data = $this->db->get();
		return $data->result();
	}

	public function count_batch_notification()
	{	
		$batch = "";
		$this->db->where('batch_id !=', $batch);
		$this->db->where('notification_status', '0');
		$this->db->select('*');
		$this->db->from('admission_courses');
		$data = $this->db->get();
		return $data->num_rows();
	}

	public function course_completed_student()
	{
		$course_status = "Completed";
		$this->db->where('admission_courses_status', $course_status);
		$this->db->where('course_notification_status', '0');
		$this->db->select('*');
		$this->db->from('admission_courses');
		$data = $this->db->get();
		return $data->result();
	}

	public function count_course_notification()
	{
		$course_status = "Completed";
		$this->db->where('admission_courses_status', $course_status);
		$this->db->where('course_notification_status', '0');
		$this->db->select('*');
		$this->db->from('admission_courses');
		$data = $this->db->get();
		return $data->num_rows();
	}

	public function get_admissioncourses_wise($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}

	public function upd_batch_status($tbl, $data, $field, $admission_courses_id)
	{
		$this->db->where($field, $admission_courses_id);
		return $this->db->update($tbl, $data);
	}

	public function demo_notification_data()
	{
		if ($_SESSION['logtype'] != "Super Admin" && $_SESSION['logtype'] != "Manager" && $_SESSION['logtype'] != "Admin") {
			@$branch_ids = $_SESSION['branch_ids'];
			for ($i = 0; $i < sizeof($branch_ids); $i++) {
				$this->db->where("branch_id", $branch_ids[$i]);
			}

			$this->db->where("faculty_id", $_SESSION['user_id']);
		}
		$this->db->where('notification_status', '0');
		$this->db->select('*');
		$this->db->from('demo');
		$data = $this->db->get();
		return $data->result();
	}

	public function upd_demo_status($tbl, $data, $field, $demo_id)
	{
		$this->db->where($field, $demo_id);
		return $this->db->update($tbl, $data);
	}

	function previous_demo_data($record)
	{
		$this->db->where('mobileNo', $record);
		$this->db->join('branch', 'branch.branch_id=demo.branch_id');
		$this->db->from('demo');
		$data =  $this->db->get();
		return $data->row();
	}

	function previous_lead_data($record)
	{
		$this->db->where('mobile_no', $record);
		$this->db->join('branch', 'branch.branch_id=lead_list.branch_id');
		$this->db->join('package', 'package.package_id=lead_list.course_or_package');
		$this->db->from('lead_list');
		$data =  $this->db->get();
		return $data->row();
	}

	function previous_admission_data($record)
	{
		$this->db->where('mobile_no', $record);
		$this->db->join('branch', 'branch.branch_id=admission_process.branch_id');
		$this->db->join('course', 'course.course_id=admission_process.course_id');
		$this->db->from('admission_process');
		$data =  $this->db->get();
		return $data->row();
	}


	public function branch_insert($field, $data)
	{
		$this->db->insert('branch', $data);
		$this->load->database();
		$last = $this->db->order_by('branch_id', "desc")
		->limit(1)
	    ->get('branch')
		->row();
		return $last;
	}

	public function filterByMainPermission($tbl, $wher, $id, $filter)
	{
		$this->db->like('logtype_name', $filter);
		$this->db->where($wher, $id);
		$this->db->select("*");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}

	public function get_receipt_permission_record($tbl, $field, $id)
	{
		$this->db->where($field, $id);
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->row();
	}

	public function upd_receipt_permission($tbl, $data, $field, $receipt_permission_id)
	{
		$this->db->where($field, $receipt_permission_id);
		return $this->db->update($tbl, $data);
	}

	public function application_job_record_update($tb, $field, $appli_id, $data)
	{
		$this->db->where($field, $appli_id);
		return $this->db->update($tb, $data);
	}

	public function application_job_remarks_record($tbl, $data)
	{
		return $this->db->insert($tbl, $data);
	}

	public function erpicard_data($tbl, $wher, $id)
	{
		$this->db->where($wher, $id);
		$this->db->select("*");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->row();
	}

	public function getPackageCourseRecord($tbl, $field, $id){
		$this->db->where($field, $id);
		$this->db->select('*');
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->row();
	}

	public function getDocumentRecord($tbl,$data){
		$this->db->where('branch_id',$data['branch_id']);
		$this->db->where('department_id',$data['department_id']);
		// $this->db->where('type',$data['type']);
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->row();
	}

	public function get_all_record_data_student($tbl,$field,$id){
		$this->db->where($field,$id);
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->row();
	}

	public function update_wpf_record($tbl,$field,$id,$data){
		$this->db->where($field,$id);
		return $this->db->update($tbl,$data);
	}

	public function get_student_record_ad($tbl,$field,$id){
		$this->db->where($field,$id);
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->row();
	}

	public function update_admission_process($tbl,$field,$id,$data){
		$this->db->where($field,$id);
		return $this->db->update($tbl,$data);
	}

	public function get_student_courses_data($tbl,$field,$id){
		$this->db->where($field,$id);
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}

	public function get_package_record($tbl,$field,$id){
		$this->db->where($field,$id);
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();	
	}
	public function upgrade_courses_data_record($tbl,$data){
		return $this->db->insert($tbl,$data);
	}

	public function upgrade_installment_student($tbl,$data){
		return $this->db->insert($tbl,$data);
	}

	public function getsubCoursesRecord($tbl,$field,$record){
		$this->db->where_in($field, $record);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}

	public function getTotalPaidFees($admission_id){
		$this->db->select_sum('paid_amount');
		$this->db->from('admission_installment');
		$this->db->where('admission_id', $admission_id);
		$this->db->count_all();
		$query = $this->db->get();
		return $query->row();
	}

	public function branch_wise_course_view_all($tbl){
		// echo "<pre>";
		// print_r($_SESSION['Admin']);


	}
	public function view_all_last($tbl)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		$this->db->order_by("product_enquiry_id ", "desc");
		$data = $this->db->get();
		return $data->result();
	}

	public function get_tbl_mutireco($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}

	public function get_tbl_mutirecount($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->num_rows();
	}

	public function get_reco($tbl, $field, $id) {
		$this->db->where($field, $id);
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->row();
	  }
	  
	  public function update_record($tbl, $data, $field, $id)
	  {
		$this->db->where($field, $id);
		return $this->db->update($tbl, $data); 
	}
	public function view_all_user_by_status($tbl)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		$this->db->where('status','0');
		$data = $this->db->get();
		return $data->result();
	}
	public function update_multi_user($tbl, $field, $id)
	{
		$this->db->where($field, $id);
		return $this->db->update($tbl, array('status' => 1));
	}

	
	public function get_remarks_company_wise($tbl, $field, $id)
	{
		$this->db->where($field, $id);
		$this->db->order_by("crid", "desc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}
	public function company_give_rating($tbl, $field, $re, $data)
	{
		$this->db->where($field, $re);
		return $this->db->update($tbl, $data);
	}

	public function total_status_company($tbl, $field, $st)
	{
		$this->db->where($field,$st);
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}
		public function company_job($tbl,$field,$id)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		$this->db->where($field,$id);
		$data = $this->db->get();
		return $data->result();
	}

	public function search_by_field_job($tbl, $record, $status)
	{
		$this->db->select("*");
		$this->db->where('job_status', $status);	
		if ($record['filter_position_for_apply'] != '') {
			 $this->db->like('position', $record['filter_position_for_apply']);
		}
		if ($record['filter_prefer_job_location'] != '') {
			$this->db->like('job_area', $record['filter_prefer_job_location']);
	   }
	   if ($record['filter_fname'] != '') {
		$this->db->like('company_name', $record['filter_fname']);
   		}
		if ($record['filter_startDate'] != '' && $record['filter_endDate'] != '') {	
			$first_date =  $record['filter_startDate'];
			$second_date =  $record['filter_endDate'];
			$this->db->where('start_date >=', $first_date);
			$this->db->where('end_date <=', $second_date);
		}
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}
	
	public function search_by_field_job_all($tbl, $record)
	{
		$this->db->select("*");	
		if ($record['filter_position_for_apply'] != '') {
			 $this->db->like('position', $record['filter_position_for_apply']);
		}
		if ($record['filter_prefer_job_location'] != '') {
			$this->db->like('job_area', $record['filter_prefer_job_location']);
	   }
	   if ($record['filter_fname'] != '') {
		$this->db->like('company_name', $record['filter_fname']);
   		}
		if ($record['filter_startDate'] != '' && $record['filter_endDate'] != '') {	
			$first_date =  $record['filter_startDate'];
			$second_date =  $record['filter_endDate'];
			$this->db->where('start_date >=', $first_date);
			$this->db->where('end_date <=', $second_date);
		}
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}
	

	public function search_field_company($tbl, $record)
	{
		$this->db->select("*");	
		if ($record['company_name'] != '') {
			$this->db->like('company_name', $record['company_name']);
		}
		if ($record['company_no'] != '') {
			$this->db->like('company_number', $record['company_no']);
		}
		if ($record['employer_name'] != '') {
			$this->db->like('employer_name', $record['employer_name']);
		}
		if ($record['employer_designation'] != '') {
			$this->db->like('employer_designation', $record['employer_designation']);
		}
		if ($record['email'] != '') {
			$this->db->like('email_id', $record['email']);
		}
		if ($record['filter_start_date'] != '' && $record['filter_end_date'] != '') {	
			$first_date =  $record['filter_start_date'];
			$second_date =  $record['filter_end_date'];
			$this->db->where('date >=', $first_date);
			$this->db->where('date <=', $second_date);
		}
		$this->db->from($tbl);
		$data =  $this->db->get();	
		return $data->result();
	}

	public function get_job_record_bystatus($tbl, $field = '', $data = '')
	{
		if ($data != 'all') {
			$this->db->where($field, $data);
		}
		$this->db->from($tbl);
		$this->db->order_by("jobpost_id ", "desc");
		$data =  $this->db->get();
		return $data->result();
		// $record =  $data->result();
		// echo "<pre>";
		// print_r($record);
		// exit;
	}

	public function lead_exportdownload() {
		$username =  $_SESSION['user_name'];
		$this->db->select(array('name','email','mobile_no','status','source_id','channel_id','sub_status', 'priority'));
		$this->db->where('reference_name', $username);
		$this->db->from('lead_list');
		$this->db->order_by("lead_list_id", "desc");
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	public function latest_demo($tbl)
	{
		$this->db->select("*");
		$this->db->from($tbl);
		$this->db->limit(10);
		$this->db->order_by("demo_id","desc");
		$data = $this->db->get();
		return $data->result();
	}

	public function Count_demo_status_wise($tbl,$field,$st)
	{
		$this->db->where($field,$st);
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->num_rows();
	}
	public function Count_demo_All_wise($tbl)
	{
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->num_rows();
	}

	public function view_all_demos($tbl, $filter='')
	{
		$this->db->cache_on(); 
		if (!empty($filter['demo_filter'])) {
		if (!empty($filter['filter_branch'])) {
			$this->db->where("branch_id", $filter['filter_branch']);
		}
		if (!empty($filter['filter_department'])) {
			$this->db->where("department_id", $filter['filter_department']);
		}
		if (!empty($filter['filter_faculty'])) {
			$this->db->where("faculty_id", $filter['filter_faculty']);
		}
		if (!empty($filter['filter_course'])) {
			$this->db->where("courseName", $filter['filter_course']);
		}
		if (!empty($filter['filter_package'])) {
			$this->db->where("packageName", $filter['filter_package']);
		}
		if (!empty($filter['filter_name'])) {
			$this->db->where("name", $filter['filter_name']);
		}
		if (!empty($filter['filter_demo_id'])) {
			$this->db->where("demo_id", $filter['filter_demo_id']);
		} 
		if (!empty($filter['filter_number'])) {
			$this->db->where("mobileNo", $filter['filter_number']);
		}
		if (!empty($filter['filter_start_date']) && !empty($filter['filter_end_date'])) {
			$this->db->where('demoDate >=', $filter['filter_start_date']);
			$this->db->where('demoDate <=', $filter['filter_end_date']);
		}
	  }

		$this->db->select("*");
		$this->db->order_by("demo_id", "desc");
		$this->db->where('YEAR(demoDate)', date('Y'));
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
		$this->db->cache_off(); 
	}

	public function update_data_last($tbl, $data, $wher, $id)
	{
		$this->db->where($wher, $id);
		return $this->db->update($tbl, $data);
	}

	public function total_status_demo($tbl, $field, $st)
	{
		$this->db->where($field,$st);
		$this->db->order_by("demo_id", "desc");
		$this->db->where('YEAR(demoDate)', date('Y'));
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}

	public function filter_remarks($tbl,$where,$id)
	{
	    $this->db->where($where,$id);
	    $this->db->select('*');
		$this->db->order_by("demo_remark_id","asc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();	
	}

	public function insert_endlastreco_demo($field,$data){
    $this->db->insert('demo', $data);
    $this->load->database();
    $last = $this->db->order_by('demo_id', "desc")
    ->limit(1)
    ->get('demo')
    ->row();
    return $last;
  }


  public function student_applied_on_jobs($tbl)
	{
		$this->db->select('co_de.status as co_status, co_de.url as url, co_de.company_name as co_name , co_de.company_number as co_number, co_de.company_address as co_address, job_post.*, application_job.*,student_applied_job.* ');
		$this->db->from($tbl);
		$this->db->join('job_post', 'student_applied_job.jobpost_id=job_post.jobpost_id');
		$this->db->join('application_job', 'application_job.gr_id=student_applied_job.student_id');
		$this->db->join('company_detail as co_de', 'co_de.company_id=student_applied_job.company_id');
		$this->db->order_by("applied_id ", "desc");
		$data = $this->db->get();
		return $data->result();
	}

	public function applied_student_filters($tbl, $filter)
	{
		if (!empty($filter['Filter'])) {

			if (!empty($filter['filter_gr_id'])) {
				$this->db->like("gr_id", $filter['filter_gr_id']);
			}
			if (!empty($filter['filter_fname'])) {
				$this->db->like("student_id", $filter['filter_fname']);
			}

			if (!empty($filter['filter_company'])) {
				$this->db->like("student_applied_job.company_id", $filter['filter_company']);
			}
			if (!empty($filter['filter_mobile'])) {
				$this->db->like("number", $filter['filter_mobile']);
			}
			if (!empty($filter['filter_company_mobile_no'])) {
				$this->db->like("company_number", $filter['filter_company_mobile_no']);
			}
		}
		$this->db->select('*');
		$this->db->order_by("applied_id", "ASC");
		$this->db->from($tbl);
		$this->db->join('company_detail', 'company_detail.company_id = student_applied_job.company_id');
		$data = $this->db->get();
		return $data->result();
	}

	public function view_all_user_by_Faculty($tbl)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		$this->db->where('logtype','Faculty');
		$data = $this->db->get();
		return $data->result();
	}

	public function view_all_user_by_hod($tbl)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		$this->db->where('logtype','HOD');
		$data = $this->db->get();
		return $data->result();
	}

	
	public function getRows_search($tbl,$params = array())
	{
		$this->db->select('*');
		$this->db->from($tbl);
		if (array_key_exists("where", $params)) {
			foreach ($params['where'] as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		if (array_key_exists("searching", $params)) {
			$count = 1;
			foreach ($params['searching'] as $key => $value) {
				if ($count == 1) {
					$this->db->like($key, $value);
				} else {
					$this->db->or_like($key, $value);
				}
				$count++;
			}
		}
		if (array_key_exists("demo_id", $params)) {
			$this->db->where('demo_id', $params['demo_id']);
		}else {
			if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
				$this->db->limit($params['limit'], $params['start']);
			} elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
				$this->db->limit($params['limit']);
			}
			if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
				$this->db->count_all_results();
			}
		}
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function get_last_reco($tbl)
	{
		$this->db->select("*");
		$this->db->from($tbl);
		$this->db->order_by("demo_id", "desc");
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_demo_filter_reco($tbl, $filter = 0){
    if (!empty($filter)) {
    	 if (!empty($filter['filter_branch'])) {
			$this->db->like("branch_id", $filter['filter_branch']);
		}
    	else if (!empty($filter['filter_name'])) {
			$this->db->like("name", $filter['filter_name']);
		}
		else if (!empty($filter['filter_demo_id'])) {
			$this->db->like("demo_id", $filter['filter_demo_id']);
	    }
		else if (!empty($filter['filter_number'])) {
			$this->db->like("mobileNo", $filter['filter_number']);
		}
		else if (!empty($filter['filter_faculty'])) {
			$this->db->like("faculty_id", $filter['filter_faculty']);
		}
		else if (!empty($filter['filter_course'])) {
			$this->db->like("courseName", $filter['filter_course']);
		}
		else if (!empty($filter['filter_package'])) {
			$this->db->like("packageName", $filter['filter_package']);
		}
		else if (!empty($filter['filter_start_date']) && !empty($filter['filter_end_date'])) {

			$this->db->where('demoDate >=', $filter['filter_start_date']);
			$this->db->where('demoDate <=', $filter['filter_end_date']);
		} else {
			if (!empty($filter['filter_start_date'])) {
				$this->db->where('demoDate', $filter['filter_start_date']);
			}
			if (!empty($filter['filter_end_date'])) {
				$this->db->where('demoDate', $filter['filter_end_date']);
			}
		}
    }
    $this->db->select('*');
    $this->db->order_by('demo_id', "desc");
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }


  public function get_branch_demo($tbl,$branch_id)
  {
  	$this->db->select('*');
    $this->db->order_by('demo_id', "desc");
    $this->db->from($tbl);
    $this->db->where("branch_id", $branch_id);
    $data = $this->db->get();
    return $data->result();
  }
  
   public function get_course_demo($tbl,$courseName)
  {
  	$this->db->select('*');
    $this->db->order_by('demo_id', "desc");
    $this->db->from($tbl);
    $this->db->where("courseName", $courseName);
    $data = $this->db->get();
    return $data->result();
  }

  public function get_lead_next_followup($tbl)
  {
	  	$this->db->select('*');
	    $this->db->order_by('demo_id', "desc");
	    $this->db->where('lead_list_id !=',"0");
	    $this->db->where('demoStatus !=',"0");
	    $this->db->from($tbl);
	  	$data = $this->db->get();
	    return $data->result();
  }


  
  	public function logtype_user($tbl)
	  {
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	  }
	  public function logtype_admin($tbl)
	  {
		$this->db->distinct();
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
		
	  }

public function select_result($tbl, $wher, $id)
	{
		$this->db->where($wher, $id);
		$this->db->select("*");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();
	}


	function get_lastreco($tbl)
	{
		$this->db->order_by("id", "desc");
		$this->db->limit(1);
		$query = $this->db->get($tbl);
		return $query->row();
	}

}
