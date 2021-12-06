<?php
class Quickadmissionprocess extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Calcutta");
    $this->load->database('another_db', TRUE);
		$CI = &get_instance();
		$this->db2 = $CI->load->database('another_db', TRUE);
    // Your own constructor code
  }

  public function get_punching_reco($tbl){
    $date = date('2021-08-12 h:i A');
		$this->db2->where('LogDate >=', $date);
		// $this->db2->where('MONTH(LogDate)', date('m')); //For current month
    // $this->db2->where('YEAR(LogDate)', date('Y')); // For current year
		$this->db2->select('*');
		$this->db2->from($tbl);
		$query = $this->db2->get(); 
		return $query->result();
  }

  public function get_mul_reco($t,$f,$d)
  {
    $date = date('2021-08-12 h:i A');
		$this->db2->where('LogDate >=', $date);
    $this->db2->where($f,$d);
    $this->db2->from($t);
    $data = $this->db2->get();
    return $data->result();
  }

  public function get_live_data_attendance($tbl, $field, $data){
    $this->db2->group_by('date(LogDate)');
    //$this->db2->group_by('substr(LogDate,0,-9)');
    $this->db2->where($field, $data);
    $this->db2->from($tbl);
    $data =  $this->db2->get();
    return $data->result();
  }


  public function get_live_data_attendance_2($tbl, $field, $data){
   //$this->db2->group_by('date(LogDate)');
    //$this->db2->group_by('substr(LogDate,0,-9)');
    $this->db2->where($field, $data);
    $this->db2->from($tbl);
    $data =  $this->db2->get();
    return $data->result();
  }


  public function view_all($tbl)
  {
    $data = $this->db->get($tbl);
    return $data->result_array();
  }

  public function get_faculty($tbl){
    $this->db->where('logtype','Faculty');
    $data = $this->db->get($tbl);
    return $data->result_array();
  }

  public function get_hod($tbl){
    $this->db->where('logtype','HOD');
    $data = $this->db->get($tbl);
    return $data->result_array();
  }

  public function view_all_admission_record($tbl)
  {
    $data = $this->db->get($tbl);
    return $data->result();
  }

  public function quick_admission_data($tbl, $data)
  {
    $this->db->insert($tbl, $data);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
  }

  public function get_remarks_id_wise($tb, $field, $id)
  {
    $this->db->where($field, $id);
    $this->db->from($tb);
    $data = $this->db->get();
    return $data->result();
  }

  function fetch_data($record)
  {
    $this->db->where('mobile_no', $record);
    $this->db->from('lead_list');
    $data =  $this->db->get();
    return $data->row();
  }

  function fetch_data_demo($record)
  {
    $this->db->where('mobileNo', $record);
    $this->db->from('demo');
    $data =  $this->db->get();
    return $data->row();
  }

  function fetch_admission($record)
  {
    $this->db->where('mobile_no', $record);
    $this->db->from('admission_process');
    $data =  $this->db->get();
    return $data->row();
  }

  function fetch_data_alternet_no_wise($record)
  {
    $this->db->where('alternate_mobile_no', $record);
    $this->db->from('lead_list');
    $data =  $this->db->get();
    return  $data->row();
  }

  function fetchdata_multiple($tbl, $field, $data)
  {
    $this->db->select('mobile_no,alternate_mobile_no,father_mobile_no');
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->row();
  }

  function fetch_data_Email_wise($record)
  {
    $this->db->where('email', $record);
    $this->db->from('lead_list');
    $data =  $this->db->get();
    return $data->row();
  }

  function fetch_data_Email_wise_admission($record)
  {
    $this->db->where('email', $record);
    $this->db->from('admission_process');

    $data =  $this->db->get();
    return $data->row();
  }

  function fetch_data_demoidwise($record)
  {
    $this->db->where('mobileNo', $record);
    $this->db->from('demo');
    $data =  $this->db->get();
    return $data->row();
  }

  function fetch_data_shining_sheet($record)
  {

    $sheet = implode(',', $record);

    $this->db->where('course_id', $sheet);
    $this->db->from('shining_sheet');
    $data =  $this->db->get();
    return $data->result();
  }

  function save_data($tbl, $record)
  {
    return $this->db->insert($tbl, $record);
  }

  public function fetch_session_wise_data($branch_id)
  {

    $data = explode(',', $branch_id);

    foreach ($data as $key => $value) {

      $this->db->where('branch_id', $value);
      $this->db->order_by('session', 'ASC');
      $query = $this->db->get('branch');
      $all = $query->row();
    }

    $record = explode(',', $all->session);

    $output = '<option value="">Select Session</option>';

    for ($i = 0; $i < sizeof($record); $i++) {

      $output .= '<option value="' . $record[$i] . '">' . $record[$i] . '</option>';
    }
    return $output;
  }

  public function match_branch($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->row();
  }

  public function match_department($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->row();
  }

  public function view_Accountant_record($tbl)
	{
		$this->db->where('logtype', 'Accountant');
		$this->db->from($tbl);
		$data =  $this->db->get();
		return $data->result();
	}

  public function match_package($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->join('rnw_subcourse','rnw_subcourse.subcourse_id=rnw_subpackage.subcourse_id');
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }

  public function match_package_record($tbl,$field,$data){
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }

  public function match_course($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->join('rnw_course','rnw_course.course_id =rnw_subcourse.course_id');
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->row();
  }

  public function get_shining_sheet($tbl, $field, $data){
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }

  public function getall_recordid_wise($tbl, $field, $data)
  {
    // $this->db->select($tbl.*)
    $this->db->where($field, $data);
    $this->db->join('rnw_subcourse', 'rnw_subcourse.subcourse_id = admission_courses.courses_id');
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }

  public function get_adm_id_wise_remark($tbl, $field, $data)
  {
    $this->db->select('*');
    $this->db->order_by('remarks_id', "desc");
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $this->db->limit('5');
    $data =  $this->db->get();
    return $data->result();
  }

  public function get_all_remarks($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }

  public function view_all_admission_course($table)
  {
    $this->db->from($table);
    $data =  $this->db->get();
    return $data->result();
  }

  public function get_all_record_grid_wise($tbl, $field, $data, $type)
  {
    $this->db->where($field, $data);
    $this->db->where('type', $type);
    if ($type == 'package') {
      $this->db->join('rnw_package', 'admission_process.package_id=rnw_package.package_id');
    } else  if($type == 'single'){
      $this->db->join('rnw_course', 'admission_process.course_id=rnw_course.course_id');
    } else if($type == 'COLLEGE'){
      $this->db->join('college_courses','admission_process.college_courses_id=college_courses.college_courses_id');
    }
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->row();
  }

  public function get_multi_course_adm_id_wise($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }

  public function get_admission_idwise($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }

  public function get_multiple_reco($t,$f,$d)
  {
    $this->db->where($f,$d);
    $this->db->from($t);
    $data = $this->db->get();
    return $data->result();
  }
  
  public function get_instalment($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }

  public function get_instalment_clg($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $this->db->order_by("installment_no", "asc");
    $data =  $this->db->get();
    return $data->result();
  }

  public function get_admission_record($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }

  public function get_admission_record_by_status_wise($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }

  public function get_course_depar_wise($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }

  public function get_course_depar($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }


  public function record_count()
  {
    return $this->db->count_all("admission_process");
  }

  public function fetch_admission_data($limit, $start)
  {

    $this->db->limit($limit, $start);

    $query = $this->db->get("admission_process");

    if ($query->num_rows() > 0) {

      foreach ($query->result() as $row) {

        $data[] = $row;
      }
      return $data;
    }

    return false;
  }

  public function admission_view_all($tbl, $filter = 0)
  {
    if (!empty($filter['filter_admission'])) {
      if (!empty($filter['filter_startDate']) && !empty($filter['filter_endDate'])) {
        $this->db->where('admission_date >=', $filter['filter_startDate']);
        $this->db->where('admission_date <=', $filter['filter_endDate']);
      }
      if (!empty($filter['filter_gr_id'])) {
        $this->db->like("gr_id", $filter['filter_gr_id']);
      }
      if (!empty($filter['filter_enrollnno'])) {
        $this->db->like("enrollment_number", $filter['filter_enrollnno']);
      }
      if (!empty($filter['filter_fname'])) {
        $this->db->like("first_name", $filter['filter_fname']);
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
      if (!empty($filter['filter_branch'])) {
        $this->db->where("branch_id", $filter['filter_branch']);
      }
      if (!empty($filter['filter_department'])) {
        $this->db->where("department_id", $filter['filter_department']);
      }
      if (!empty($filter['filter_course'])) {
        $this->db->where("course_id", $filter['filter_course']);
      }
      if (!empty($filter['filter_package'])) {
        $this->db->where("package_id", $filter['filter_package']);
      }
      if (!empty($filter['filter_clg_course'])) {
        $this->db->where("college_courses_id", $filter['filter_clg_course']);
      }
    }

        $this->db->group_by('gr_id');
        $this->db->order_by('admission_id', "desc");
        $this->db->from($tbl);
        $data = $this->db->get();
        return $data->result();
        // echo "<pre>";
        // print_r($data->result()); die();
  }

  public function get_ttotal_installment_record($tbl,$field,$data)
  {
       $this->db->select_sum('paid_amount');
        $this->db->from('admission_installment');
        $this->db->where('admission_id', $data);
        $this->db->count_all();
        $query = $this->db->get();
        return $query->result();
  }

  public function get_completedstudent_batch($tbl, $filter = 0)
  {
    if (!empty($filter['filter_completed_batch_list'])) {
      if (!empty($filter['filter_from_date']) && !empty($filter['filter_to_date'])) {
        $this->db->where('course_completed_date >=', date('d-m-Y',strtotime($filter['filter_from_date'])));
        $this->db->where('course_completed_date <=', date('d-m-Y',strtotime($filter['filter_to_date'])));
      }

      if (!empty($filter['filter_gr_id'])) {
        $this->db->like("gr_id", $filter['filter_gr_id']);
      }

      if (!empty($filter['filter_fname'])) {
        $this->db->like("first_name", $filter['filter_fname']);
      }

      if (!empty($filter['filter_lname'])) {
        $this->db->like("surname", $filter['filter_lname']);
      }

      if (!empty($filter['filter_email'])) {
        $this->db->like("email", $filter['filter_email']);
      }

      if (!empty($filter['filter_branch'])) {
        $this->db->like("branch_id", $filter['filter_branch']);
      }

      if (!empty($filter['filter_faculty'])) {
        $this->db->like("faculty_id", $filter['filter_faculty']);
      }

      if (!empty($filter['filter_batch'])) {
        $this->db->like("batch_id", $filter['filter_batch']);
      }

      if (!empty($filter['filter_course'])) {
        $this->db->where("courses_id", $filter['filter_course']);
      }
    }

    $this->db->select('*');
    $this->db->from($tbl);
    $this->db->join('batches','batches.batches_id=admission_courses.batch_id');
    $data = $this->db->get();
    return $data->result();
  }

  public function all_count_admission($tbl)
  {

     $branch_id = explode(',',$_SESSION['Admin']['branch_id']);
    
    $this->db->select('*');
    $this->db->where_in('branch_id', $branch_id);
    return $this->db->count_all_results($tbl);
  }

  public function update_data($tbl, $data, $wher, $id)
  {
    $this->db->where($wher, $id);
    return $this->db->update($tbl, $data);
  }

  public function upd_admission($tbl, $data, $wher, $id)
  {
    $this->db->where($wher, $id);
    $this->db->update($tbl, $data);
    return redirect('AddmissionController/admission_view');
  }

  public function insert_endlast_ins_data($field, $data)
  {
    $this->db->insert('admission_process', $data);
    $this->load->database();
    $last = $this->db->order_by('admission_id', "desc")
    ->limit(1)
    ->get('admission_process')
    ->row();
    return $last;
  }

  public function insert_endlast_otherincome($field, $data)
  {
    $this->db->insert('other_income', $data);
    $this->load->database();
    $last = $this->db->order_by('other_income_id', "desc")
    ->limit(1)
    ->get('other_income')
    ->row();
    return $last;
  }

  public function ins_remarks()
  {
    $data = array(
      'admission_id'       => $this->input->post('adm_id'),
      'labels'       => $this->input->post('labels'),
      'rating'       => $this->input->post('rating'),
      'admission_remrak'    => $this->input->post('admission_remrak'),
      'remarks_date'    => $this->input->post('remarks_date'),
      'remarks_time'    => $this->input->post('remarks_time'),
      'addby'    => $this->input->post('addby'),
    );
    $result = $this->db->insert('admission_remarks', $data);
    return $result;
  }

  public function save_upload($admission_id, $image)
  {
    $this->db->set('file_name', $image);
    $this->db->where('admission_id', $admission_id);
    $result = $this->db->update('admission_process');
    return $result;
  }

  public function view_all_admission($tbl, $filter = 0)
  {
    if (!empty($filter['filter_admission'])) {
      if (!empty($filter['filter_startDate']) && !empty($filter['filter_endDate'])) {
        $this->db->where('enquiry_date >=', $filter['filter_startDate']);
        $this->db->where('enquiry_date <=', $filter['filter_endDate']);
      }

      if (!empty($filter['filter_Next_Followup_Date_from'])) {
        $this->db->where('enquiry_next_followp >=', $filter['filter_Next_Followup_Date_from']);
      }

      if (!empty($filter['filter_Next_Followup_Date_to'])) {
        $this->db->where('enquiry_next_followp <=', $filter['filter_Next_Followup_Date_to']);
      }

      if (!empty($filter['filter_gr_id'])) {

        $this->db->like("gr_id", $filter['filter_gr_id']);
      }

      if (!empty($filter['filter_department'])) {

        $this->db->like("enquiry_category", $filter['filter_department']);
      }

      if (!empty($filter['filter_Interest_Level'])) {
        $this->db->like("enquiry_follwup_interestLevel", $filter['filter_Interest_Level']);
      }

      if (!empty($filter['filter_Student_Response'])) {
        $this->db->like("enquiry_follwup_studentResponse", $filter['filter_Student_Response']);
      }

      if (!empty($filter['filter_package'])) {
        $this->db->like("package_id", $filter['filter_package']);
      }


      if (!empty($filter['filter_fname'])) {
        $this->db->like("first_name", $filter['filter_fname']);
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
        $this->db->like("enquiry_sourceType", $filter['filter_source']);
      }

      if (!empty($filter['filter_course'])) {
        $this->db->like("course_id", $filter['filter_course']);
      }

      if (!empty($filter['filter_branch'])) {
        $this->db->like("branch_name", $filter['filter_branch']);
      }

      if (!empty($filter['filter_batch'])) {
        $this->db->like("batch_id", $filter['filter_batch']);
      }

      if (!empty($filter['filter_follwup_interestRating'])) {
        $this->db->where("enquiry_follwup_interestRating", $filter['filter_follwup_interestRating']);
      }

      if (!empty($filter['filter_enquiry_assignedUser'])) {
        $this->db->where("enquiry_assignedUser", $filter['filter_enquiry_assignedUser']);
      }
    }

    $this->db->select('*');
    $this->db->order_by("admission_id", "ASC");
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }


  public function upd_shining_sheet()
  {
    $id = $this->input->post('admission_courses_id');

    $stating_date = $this->input->post('stating_date');
    $ending_date = $this->input->post('ending_date');
    $batch_time = $this->input->post('batch_time');
    $google_class_room_code = $this->input->post('google_class_room_code');
    $total_days = $this->input->post('total_days');

    $this->db->set('stating_date', $stating_date);
    $this->db->set('ending_date', $ending_date);
    $this->db->set('batch_time', $batch_time);
    $this->db->set('google_class_room_code', $google_class_room_code);
    $this->db->set('total_days', $total_days);
    $this->db->where('admission_courses_id', $id);
    $result = $this->db->update('admission_courses');
    return $result;
  }

  public function get_adm_record_list($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->row();
  }

  public function get_admission_basic_details($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $this->db->join('branch', 'branch.branch_id = admission_process.branch_id');
    $data =  $this->db->get();
    return $data->row();
  }

  public function get_adm_list($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->row();
  }

  public function get_adm_list_single_check_record($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $this->db->join('branch', 'branch.branch_id = admission_process.branch_id');
    $this->db->join('department', 'department.department_id = admission_process.department_id');
    $this->db->join('rnw_course', 'rnw_course.course_id = admission_process.course_id');
    $data =  $this->db->get();
    return $data->row();
  }

  public function get_adm_list_package_check_record($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $this->db->join('branch', 'branch.branch_id = admission_process.branch_id');
    $this->db->join('department', 'department.department_id = admission_process.department_id');
    $this->db->join('rnw_package', 'rnw_package.package_id = admission_process.package_id');
    $data =  $this->db->get();
    return $data->row();
  }

  public function get_adm_list_college_check_record($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $this->db->join('branch', 'branch.branch_id = admission_process.branch_id');
    $this->db->join('department', 'department.department_id = admission_process.department_id');
    $this->db->join('college_courses', 'college_courses.college_courses_id = admission_process.college_courses_id');
    $data =  $this->db->get();
    return $data->row();
  }

  public function get_adm_cp_record_list($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->row();
  }

  public function previous_data($tbl, $field, $data)
  {
    $this->db->select('*');
    $this->db->order_by("assessment_id", "desc");
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->row();
  }

  public function assessment_pdf_data($tbl, $field, $data)
  {
    $this->db->select('*');
    $this->db->order_by("assessment_id", "ASC");
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->row();
  }

  public function match_admdata($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->row();
  }

  public function cp_adm_upd()
  {

    $id = $this->input->post('upd_id');

    $admission_branch = $this->input->post('admission_branch');

    $session = $this->input->post('session');

    $department_id = $this->input->post('department_id');

    $depart = implode(',', $department_id);

    $type = $this->input->post('type');

    if (empty($course_orsingle = $this->input->post('course_orsingle'))) {
      $co_single = $course_package = "";
    } else {

      $course_orsingle = $this->input->post('course_orsingle');
      $co_single = implode(',', $course_orsingle);
    }

    if (empty($course_orpackage = $this->input->post('course_orpackage'))) {
      $co_package = $course_orpackage = "";
    } else {
      $course_orpackage = $this->input->post('course_orpackage');
      $co_package = implode(',', $course_orpackage);
    }

    $faculty_id = $this->input->post('faculty_id');
    $batch_id = $this->input->post('batch_id');

    $this->db->set('admission_branch', $admission_branch);
    $this->db->set('year', $session);
    $this->db->set('department_id', $depart);
    $this->db->set('type', $type);
    $this->db->set('course_id', $co_single);
    $this->db->set('package_id', $co_package);
    $this->db->set('faculty_id', $faculty_id);
    $this->db->set('batch_id', $batch_id);
    $this->db->where('admission_id', $id);
    $result = $this->db->update('admission_process');
    return $result;
  }

  public function get_old_admission_record($tbl = '', $field = '', $id = '')
  {
    $this->db->where($field, $id);
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->row();
  }

  public function update_admission_record($tbl, $data, $field, $adm_update_id)
  {
    $this->db->where($field, $adm_update_id);
    return $this->db->update($tbl, $data);
  }

  public function quick_adm_data($tbl, $data)
  {
    $this->db->insert($tbl, $data);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
  }

  public function check_record_alerady($tbl, $record)
  {
    $this->db->or_where('mobile_no', $record['alternate_mobile_no']);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->num_rows();
  }

  public function check_already_basicinfo($tbl, $record)
  {
    $this->db->or_where('mobile_no', $record['email']);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->num_rows();
  }

  public function check_record_alerady_btches($tbl, $record)
  {
    $this->db->or_where('batch_name', $record['batch_code']);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->num_rows();
  }

  public function get_history_admission($tbl = '', $field = '', $id = '')
  {
    $this->db->where($field, $id);
    $this->db->order_by("admission_history_id", "desc");
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }

  public function get_history_dbasic_admission($tbl = '', $field = '', $id = '')
  {
    $this->db->where($field, $id);
    $this->db->order_by("history_adm_bdetails_id", "desc");
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }

  public function get_history_cp_admission($tbl = '', $field = '', $id = '')
  {
    $this->db->where($field, $id);
    $this->db->order_by("history_adm_cp_id", "desc");
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }

  public function get_history_without_fees_modification($tbl = '', $field = '', $id = '')
  {
    $this->db->where($field, $id);
    $this->db->order_by("history_adm_without_fees_id", "desc");
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }


  public function update_admission_status_record($tbl, $data, $field, $campaign_id)
  {
    $this->db->where($field, $campaign_id);
    return $this->db->update($tbl, $data);
  }

  public function faculty_wise_course_get($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }

  public function shining_sheet_courses_match($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->row();
  }

  public function shining_sheet_faculty_match($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->row();
  }

  public function get_batches_data($tbl, $field, $id)
  {
    $this->db->where($field, $id);
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->row();
  }

  public function delete_batch($tbl, $field, $id)
  {
    $this->db->where($field, $id);
    return $this->db->delete($tbl);
  }

  public function update_batch($tbl, $data, $field, $campaign_id)
  {
    $this->db->where($field, $campaign_id);
    return $this->db->update($tbl, $data);
  }

  public function get_batches_all($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }

  public function get_adm_batches_all($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }

  public function get_idwise_data($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }

  public function get_all_data($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }

  public function ongoing_bacthes($tbl){
    $this->db->from($tbl);
    $this->db->join('admission_courses', 'admission_courses.batch_id = batches.batches_id');
    $data =  $this->db->get();
    return $data->result();
  }

  public function get_student_pending_batch($tbl, $field, $data)
  {
    $admission_courses_status = "Pending";
    $this->db->where($field, $data);
    $this->db->where("admission_courses_status", $admission_courses_status);
    $this->db->select('*');
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }

  public function Fetch_admission_id_wise_record($record)
  {
    $this->db->where('admission_id', $record);
    $this->db->from('admission_process');
    $data =  $this->db->get();
    return $data->row();
  }

  public function Update_record($tbl, $data, $field, $admission_id)
  {
    $this->db->where($field, $admission_id);
    return $this->db->update($tbl, $data);
  }

  public function getdata_livesearch($search)
  {
    $this->db->select("admission_id,first_name,surname");
    $whereCondition = array('first_name' => $search);
    $this->db->where($whereCondition);
    $this->db->from('admission_process');
    $query = $this->db->get();
    return $query->result();
  }

  public function admission_unfillup_fields_all($tbl, $filter = 0)
  {
    if (!empty($filter['filter_admissionunfilup'])) {
      if (!empty($filter['filter_from_date']) && !empty($filter['filter_to_date'])) {
        $this->db->where('admission_date >=', $filter['filter_from_date']);
        $this->db->where('admission_date <=', $filter['filter_to_date']);
      }
      if (!empty($filter['filter_fname'])) {
        $this->db->like("first_name", $filter['filter_fname']);
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
      if (!empty($filter['filter_gr_id'])) {
        $this->db->like("gr_id", $filter['filter_gr_id']);
      }
      if (!empty($filter['filter_enrollnno'])) {
        $this->db->like("enrollment_number", $filter['filter_enrollnno']);
      }
      if (!empty($filter['filter_source'])) {
        $this->db->like("source_id", $filter['filter_source']);
      }
      if (!empty($filter['filter_branch'])) {
        $this->db->like("branch_id", $filter['filter_branch']);
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

    $this->db->select('*');
    $this->db->order_by('admission_id', "desc");
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }

  public function batches_view_all($tbl, $filter = 0)
  {
    if (!empty($filter['filter_batches'])) {

      if (!empty($filter['filter_fname'])) {
        $this->db->like("batch_name", $filter['filter_fname']);
      }

      if (!empty($filter['filter_branch'])) {
        $this->db->where("branch_id", $filter['filter_branch']);
      }

      if (!empty($filter['filter_faculty'])) {
        $this->db->or_where("faculty_id", $filter['filter_faculty']);
      }

      if (!empty($filter['filter_course'])) {
        $this->db->or_where("course_id", $filter['filter_course']);
      }
    }

    // if ($_SESSION['logtype'] != "Super Admin" && $_SESSION['logtype'] != "Manager") {
    //   @$branch_ids = $_SESSION['branch_ids'];

    //   for ($i = 0; $i < sizeof($branch_ids); $i++) {
    //     $this->db->where("branch_id", $branch_ids[$i]);
    //   }
    // }
    $this->db->select('*');
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }

  public function match_opt($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->row();
  }

  public function get_history_batch($tbl = '', $field = '', $id = '')
  {
    $this->db->where($field, $id);
    $this->db->order_by("batche_history_id", "desc");
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }

  public function get_old_batch_record($tbl = '', $field = '', $id = '')
  {
    $this->db->where($field, $id);
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->row();
  }

  public function quick_batch_data($tbl, $data)
  {
    $this->db->insert($tbl, $data);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
  }

  public function assign_batch($tbl, $data, $field, $admission_id)
  {
    $this->db->where($field, $admission_id);
    return $this->db->update($tbl, $data);
  }

  public function admission_status_upd($tbl, $data, $field, $admission_id)
  {
    $this->db->where($field, $admission_id);
    return $this->db->update($tbl, $data);
  }

  public function get_courseSingle_installment($tbl, $field, $id)
  {
    $this->db->where($field, $id);
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->row();
  }

  public function shining_sheet_record($tbl)
  {
    $this->db->select('*');
    $this->db->group_by('subcourse_id');
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }

  public function get_course_topic($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }

  public function get_sheet_idswise($tbl, $field, $id)
  {
    $this->db->where($field, $id);
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->row();
  }

  public function edit_course_topic_data($tbl, $data, $field, $shining_sheet_id)
  {
    $this->db->where($field, $shining_sheet_id);
    return $this->db->update($tbl, $data);
  }

  public function delete_topic($tbl, $field, $id)
  {
    $this->db->where($field, $id);
    return $this->db->delete($tbl);
  }

  public function generate_receipt_record($tbl, $data, $field, $campaign_id)
  {
    $this->db->where($field, $campaign_id);
    return $this->db->update($tbl, $data);
  }

  public function email_configration_daynamic($tbl)
  {
    if (isset($_SESSION) && $_SESSION['logtype'] == "Super Admin" || $_SESSION['logtype'] == "Admin" || $_SESSION['logtype'] == "Manager" || $_SESSION['logtype'] == "Counselor" || $_SESSION['logtype'] == "Access Document" || $_SESSION['logtype'] == "Access Property" || $_SESSION['logtype'] == "Accountant" || $_SESSION['logtype'] == "Telecaller" || $_SESSION['logtype'] == "Receptionist" || $_SESSION['logtype'] == "Progress Report Checker" || $_SESSION['logtype'] == "Center Head" || $_SESSION['logtype'] == "HOD" || $_SESSION['logtype'] == "Faculty") {
      $this->db->select('*');
      $this->db->where('name', $_SESSION['user_name']);
      $this->db->from('admin');
      $query = $this->db->get();
      $query_data = $query->row();

      $this->db->where('user_id', $query_data->id);
    }
    $this->db->where("is_default", "1");
    $this->db->select('*');
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }

  public function get_daynamic_fields($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }

  public function update_installment($tbl, $data, $field, $intsalment_id)
  {
    $this->db->where($field, $intsalment_id);
    return $this->db->update($tbl, $data);
  }


  public function fetch_overdue_fees($tbl, $filter = 0)
  {
    if (!empty($filter['filter_overdue_fees'])) {

      if (!empty($filter['filter_fname'])) {
        $this->db->like("first_name", $filter['filter_fname']);
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
      if (!empty($filter['filter_enrollnno'])) {
        $this->db->like("enrollment_number", $filter['filter_enrollnno']);
      }
      if (!empty($filter['filter_branch'])) {
        $this->db->like("aps.branch_id", $filter['filter_branch']);
      }
      if (!empty($filter['filter_course'])) {
        $this->db->like("course_id", $filter['filter_course']);
      }
      if (!empty($filter['filter_package'])) {
        $this->db->like("package_id", $filter['filter_package']);
      }
      if (!empty($filter['filter_from_date'])) {
        $this->db->where('installment_date >=', $filter['filter_from_date']);
      }
      if (!empty($filter['filter_to_date'])) {
        $this->db->where('installment_date <=', $filter['filter_to_date']);
      }
    }
    // $amount = "";
    // // $this->db->where("paid_amount", $amount);
    // // $this->db->select('*');
    // date_default_timezone_set("Asia/Calcutta");
    // $today = date('Y-m-d');

    //   $orgDate = "2019-04-01";
    //   $second_date = date("Y-m-d", strtotime($orgDate));
    // // exit;

    // $this->db->select("*");
    // $this->db->where('installment_date <=', $today);
    // $this->db->where('installment_date >=', $second_date);
    // // $this->db->where(" >=", $today);
    $this->db->select('*');
    $this->db->from("admission_process as aps");
    $this->db->join('admission_installment as ais', 'ais.admission_id = aps.admission_id');
    $this->db->order_by("installment_date", "asc");
    $data = $this->db->get();
    // print_r($this->db->last_query($data));  
    //   exit;
    return $data->result();
  }

  public function exportList() {
    $this->db->select(array('installment_date','first_name','surname','year','gr_id','enrollment_number','email', 'mobile_no','father_name','father_mobile_no','course_id','package_id','college_courses_id','type','installment_no','due_amount'));
    $this->db->from('admission_process');
    $this->db->join('admission_installment', 'admission_installment.admission_id = admission_process.admission_id');
    $this->db->order_by("installment_date", "desc");
    $query = $this->db->get();
    return $query->result();
}

  public function overdue_fees_counting($tbl)
  {
    $amount = "";
    $this->db->select_sum("due_amount");
    $this->db->where("paid_amount", $amount);
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }

  public function fetch_Outstanding_Fees($filter = 0)
  {
    if (!empty($filter['filter_outstanding_fees'])) {
      if (!empty($filter['filter_fname'])) {
        $this->db->like("first_name", $filter['filter_fname']);
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
      if (!empty($filter['filter_enrollnno'])) {
        $this->db->like("enrollment_number", $filter['filter_enrollnno']);
      }
      if (!empty($filter['filter_branch'])) {
        $this->db->like("aps.branch_id", $filter['filter_branch']);
      }
      if (!empty($filter['filter_course'])) {
        $this->db->like("course_id", $filter['filter_course']);
      }
      if (!empty($filter['filter_package'])) {
        $this->db->like("package_id", $filter['filter_package']);
      }
      if (!empty($filter['filter_from_date'])) {
        $this->db->where('installment_date >=', $filter['filter_from_date']);
      }
      if (!empty($filter['filter_to_date'])) {
        $this->db->where('installment_date <=', $filter['filter_to_date']);
      }
    }
    date_default_timezone_set("Asia/Calcutta");
    $today = date('Y-m-d');
    $this->db->select("*");
    $this->db->where('installment_date >=', $today);
    $this->db->from("admission_process as aps");
    $this->db->join('admission_installment as ais', 'ais.admission_id = aps.admission_id');
    $this->db->order_by("installment_date", "asc");
    $data = $this->db->get();
    return $data->result();
  }

  public function exportOutstandingList() {
    $this->db->select(array('installment_date','first_name','surname','year','gr_id','enrollment_number','email', 'mobile_no','father_name','father_mobile_no','course_id','package_id','college_courses_id','type','installment_no','due_amount'));
    $this->db->from('admission_process');
    $this->db->join('admission_installment', 'admission_installment.admission_id = admission_process.admission_id');
    $this->db->order_by("installment_date", "desc");
    $query = $this->db->get();
    return $query->result();
  }

  public function outstanding_fees_counting($tbl)
  {
    date_default_timezone_set("Asia/Calcutta");
    $today = date('d-M-Y');
    $this->db->select_sum("paid_amount");
    $this->db->where("installment_date", $today);
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }

  public function fetch_income($tbl, $filter = 0)
  {
    if (!empty($filter['filter_income_fees'])) {
      if (!empty($filter['filter_gr_id'])) {
        $this->db->like("gr_id", $filter['filter_gr_id']);
      }
      if (!empty($filter['filter_enrollnno'])) {
        $this->db->like("enrollment_no", $filter['filter_enrollnno']);
      }
      if (!empty($filter['filter_branch'])) {
        $this->db->like("branch_id", $filter['filter_branch']);
      }
      if (!empty($filter['filter_course'])) {
        $this->db->like("course_id", $filter['filter_course']);
      }
      if (!empty($filter['filter_package'])) {
        $this->db->like("package_id", $filter['filter_package']);
      }
      if (!empty($filter['filter_clg'])) {
        $this->db->like("college_courses_id", $filter['filter_clg']);
      }
      if (!empty($filter['filter_from_date'])) {
        $this->db->where('receipt_date >=', $filter['filter_from_date']);
      }
      if (!empty($filter['filter_to_date'])) {
        $this->db->where('receipt_date <=', $filter['filter_to_date']);
      }
    }
    
    $this->db->select('*');
    $this->db->from($tbl);
    //$this->db->where('MONTH(receipt_date)', date('m')); //For current month
    $this->db->where('YEAR(receipt_date)', date('Y')); // For current year 
    //$this->db->join('admission_process', 'admission_process.admission_id = admissin_receipt.admission_id');
    $data = $this->db->get();
    return $data->result();
  }

  public function fetch_Adjustment($filter = 0){
    if (!empty($filter['filter_Adjustment_fees'])) {
      if (!empty($filter['filter_gr_id'])) {
        $this->db->like("aps.gr_id", $filter['filter_gr_id']);
      }
      // if (!empty($filter['filter_enrollnno'])) {
      //   $this->db->like("aps.enrollment_no", $filter['filter_enrollnno']);
      // }
      // if (!empty($filter['filter_branch'])) {
      //   $this->db->like("aps.branch_id", $filter['filter_branch']);
      // }
      // if (!empty($filter['filter_course'])) {
      //   $this->db->like("aps.course_id", $filter['filter_course']);
      // }
      // if (!empty($filter['filter_package'])) {
      //   $this->db->like("aps.package_id", $filter['filter_package']);
      // }
      // if (!empty($filter['filter_clg'])) {
      //   $this->db->like("aps.college_courses_id", $filter['filter_clg']);
      // }
      // if (!empty($filter['filter_from_date'])) {
      //   $this->db->where('receipt_date >=', $filter['filter_from_date']);
      // }
      // if (!empty($filter['filter_to_date'])) {
      //   $this->db->where('receipt_date <=', $filter['filter_to_date']);
      // }
    }

    $da = "Adjustment Payment";
    $this->db->where('payment_type',$da);
    $this->db->from("admission_installment as ais");
    $this->db->join('admission_process as aps', 'aps.admission_id = ais.admission_id');
    $data = $this->db->get();
    return $data->result();
  }

  public function expense_reco($tbl){
    $this->db->select_sum('paying_amount');
    $this->db->where('branch_id','12');
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
    
  }

  public function corrent_month_income_counting($tbl)
  {
    $amount = "";
    $this->db->select_sum('paid_amount');
    $this->db->where('paid_amount !=', $amount);
    $this->db->where('MONTH(installment_date)', date('m')); //For current month
    $this->db->where('YEAR(installment_date)', date('Y')); // For current year
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }

  public function get_bank_info($tbl, $id)
  {
    $this->db->where("paid_mode_id", $id);
    $this->db->select('*');
    $this->db->from($tbl);
    $data = $this->db->get();

    $output = '<option value="1">Select Infomation</option>';
    foreach ($data->result() as $row) {
      $output .= '<option value="' . $row->bank_info_id . '">' . $row->bank_info_name . '</option>';
    }
    return $output;
  }

  public function get_expenses_subcate($tbl, $id)
  {
    $this->db->where("expenses_category_id", $id);
    $this->db->select('*');
    $this->db->from($tbl);
    $data = $this->db->get();

    $output = '<option value="1">Select Payee Label</option>';
    foreach ($data->result() as $row) {
      $output .= '<option value="' . $row->expenses_subcategory_id . '">' . $row->subcategory_name . '</option>';
    }
    return $output;
  }

  public function get_expenses_record($tbl, $filter = 0)
  {
    if (!empty($filter['filter_expenses'])) {

      if (!empty($filter['filter_branch'])) {
        $this->db->like("branch_id", $filter['filter_branch']);
      }
      if (!empty($filter['filter_payment_mode'])) {
        $this->db->like("payment_mode", $filter['filter_payment_mode']);
      }
      if (!empty($filter['filter_expenses_category_id'])) {
        $this->db->like("expenses_category_id", $filter['filter_expenses_category_id']);
      }
      if (!empty($filter['filter_expenses_subcategory_id'])) {
        $this->db->like("expenses_subcategory_id", $filter['filter_expenses_subcategory_id']);
      }
      if (!empty($filter['filter_created_by'])) {
        $this->db->like("addedby", $filter['filter_created_by']);
      }
      if (!empty($filter['filter_from_date'])) {
        $this->db->where('pay_date >=', $filter['filter_from_date']);
      }
      if (!empty($filter['filter_to_date'])) {
        $this->db->where('pay_date <=', $filter['filter_to_date']);
      }
    }

    $this->db->select('*');
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }

  public function get_other_income_record($tbl, $filter = 0)
  {
    if (!empty($filter['filter_otherincome'])) {

      if (!empty($filter['filter_branch'])) {
        $this->db->like("branch_id", $filter['filter_branch']);
      }
      if (!empty($filter['filter_payment_mode'])) {
        $this->db->like("payment_mode", $filter['filter_payment_mode']);
      }
      if (!empty($filter['filter_subject_id'])) {
        $this->db->like("subject_id", $filter['filter_subject_id']);
      }
      if (!empty($filter['filter_from_date'])) {
        $this->db->where('pay_date >=', $filter['filter_from_date']);
      }
      if (!empty($filter['filter_to_date'])) {
        $this->db->where('pay_date <=', $filter['filter_to_date']);
      }
    }

    $this->db->select('*');
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }

  public function expenses_record_upd($tbl, $data, $field, $id)
  {
    $this->db->where($field, $id);
    return $this->db->update($tbl, $data);
  }

  public  function import_expenses($tbl, $record)
  {
    return $this->db->insert($tbl, $record);
  }

  public function get_expenses($tbl, $field, $id)
  {
    $this->db->where($field, $id);
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->row();
  }

  public function get_single_reco($tbl, $field, $id)
  {
    $this->db->where($field, $id);
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->row();
  }

  public function batch_course_status($tbl, $data, $field, $admission_courses_id)
  {
    $this->db->where($field, $admission_courses_id);
    return $this->db->update($tbl, $data);
  }

  public function get_batch_attendance_record($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }

  public function receipt_record($tbl, $filter = 0)
  {
    if (!empty($filter['filter_receipt_record'])) {
      if (!empty($filter['filter_receipt_no'])) {
        $this->db->like("receipt_no", $filter['filter_receipt_no']);
      } 
      if (!empty($filter['filter_gr_id'])) {
        $this->db->like("gr_id", $filter['filter_gr_id']);
      }
      if (!empty($filter['filter_fname'])) {
        $this->db->like("first_name", $filter['filter_fname']);
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
      if (!empty($filter['filter_transaction_no'])) {
        $this->db->like("transaction_no", $filter['filter_transaction_no']);
      }
      if (!empty($filter['filter_cheque_dd_no'])) {
        $this->db->like("cheque_no", $filter['filter_cheque_dd_no']);
      }
      if (!empty($filter['filter_enrollnno'])) {
        $this->db->like("enrollment_number", $filter['filter_enrollnno']);
      }
      if (!empty($filter['filter_branch'])) {
        $this->db->like("branch_id", $filter['filter_branch']);
      }
      if (!empty($filter['filter_course'])) {
        $this->db->like("course_id", $filter['filter_course']);
      }
      if (!empty($filter['filter_package'])) {
        $this->db->like("package_id", $filter['filter_package']);
      }
      if (!empty($filter['filter_from_date'])) {
        $this->db->where('receipt_date >=', date("d-M-Y", strtotime($filter['filter_from_date'])));
      }
      if (!empty($filter['filter_to_date'])) {
        $this->db->where('receipt_date <=', date("d-M-Y", strtotime($filter['filter_to_date'])));
      }
    }

    $this->db->select('*');
    $this->db->where('deleted_status',"0");
    $this->db->from($tbl);
    $this->db->join('admission_installment', 'admission_installment.admission_installment_id = admissin_receipt.intallment_id');
    $data = $this->db->get();
    return $data->result();
  }

  public function receipt_dlt_record($tbl, $filter = 0)
  {
    if (!empty($filter['filter_receipt_record'])) {
      if (!empty($filter['filter_fname'])) {
        $this->db->like("first_name", $filter['filter_fname']);
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
      if (!empty($filter['filter_gr_id'])) {
        $this->db->like("gr_id", $filter['filter_gr_id']);
      }
      if (!empty($filter['filter_enrollnno'])) {
        $this->db->like("enrollment_number", $filter['filter_enrollnno']);
      }
      if (!empty($filter['filter_branch'])) {
        $this->db->like("branch_id", $filter['filter_branch']);
      }
      if (!empty($filter['filter_course'])) {
        $this->db->like("course_id", $filter['filter_course']);
      }
      if (!empty($filter['filter_package'])) {
        $this->db->like("package_id", $filter['filter_package']);
      }
      if (!empty($filter['filter_from_date'])) {
        $this->db->where('receipt_date >=', date("d-M-Y", strtotime($filter['filter_from_date'])));
      }
      if (!empty($filter['filter_to_date'])) {
        $this->db->where('receipt_date <=', date("d-M-Y", strtotime($filter['filter_to_date'])));
      }
    }

    $this->db->select('*');
    $this->db->where('deleted_status',"1");
    $this->db->from($tbl);
    $this->db->join('admission_installment', 'admission_installment.admission_installment_id = admissin_receipt.intallment_id');
    $data = $this->db->get();
    return $data->result();
  }


  public function check_proccesingreceipt_record($tbl, $filter = 0)
  {
    if (!empty($filter['filter_checkproccesingreceipt_record'])) {

      if (!empty($filter['filter_fname'])) {
        $this->db->like("first_name", $filter['filter_fname']);
      }
      if (!empty($filter['filter_lname'])) {
        $this->db->like("surname", $filter['filter_lname']);
      }
      if (!empty($filter['cheque_date_filter'])) {
        $this->db->like("cheque_date", $filter['cheque_date_filter']);
      }
      if (!empty($filter['cheque_date_filter'])) {
        $this->db->like("cheque_date", date("d-M-Y", strtotime($filter['cheque_date_filter'])));
      }
      if (!empty($filter['cheque_status_filter'])) {
        $this->db->like("status_for_cheque", $filter['cheque_status_filter']);
      }
      if (!empty($filter['filter_mobile'])) {
        $this->db->like("mobile_no", $filter['filter_mobile']);
      }
      if (!empty($filter['filter_gr_id'])) {
        $this->db->like("gr_id", $filter['filter_gr_id']);
      }
      if (!empty($filter['filter_enrollnno'])) {
        $this->db->like("enrollment_number", $filter['filter_enrollnno']);
      }
      if (!empty($filter['filter_branch'])) {
        $this->db->like("branch_id", $filter['filter_branch']);
      }
      if (!empty($filter['filter_course'])) {
        $this->db->like("course_id", $filter['filter_course']);
      }
      if (!empty($filter['filter_package'])) {
        $this->db->like("package_id", $filter['filter_package']);
      }
      if (!empty($filter['filter_from_date'])) {
        $this->db->where('receipt_date >=', date("d-M-Y", strtotime($filter['filter_from_date'])));
      }
      if (!empty($filter['filter_to_date'])) {
        $this->db->where('receipt_date <=', date("d-M-Y", strtotime($filter['filter_to_date'])));
      }
    }

    $this->db->select('*');
    $this->db->from($tbl);
    $this->db->join('admission_installment', 'admission_installment.admission_installment_id = processing_check_receipt.intallment_id');
    $data = $this->db->get();
    return $data->result();
  }

  public function Cheque_Status($tbl, $data, $field, $processing_check_receipt_id)
  {
    $this->db->where($field, $processing_check_receipt_id);
    return $this->db->update($tbl, $data);
  }

  public function receipt_Status($tbl, $data, $field, $admissin_receipt_id)
  {
    $this->db->where($field, $admissin_receipt_id);
    return $this->db->update($tbl, $data);
  }

  public function updatedata($tbl, $data, $wher, $id)
  {
    $this->db->where($wher, $id);
    return $this->db->update($tbl, $data);
  }

  public function update_unfillup_record($tbl, $data, $id){
    $this->db->where('admission_id',$id);
    return $this->db->update($tbl,$data);
  } 

  public function expenses_record($tbl, $data, $id){
    $this->db->where('expenses_id',$id);
    return $this->db->update($tbl,$data);
  } 

  public function get_installment_details($tbl,$data,$id){
    $this->db->where($data,$id);
    $this->db->order_by('admission_installment_id','desc');
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->row();
  }

  public function get_paid_fees_details($tbl,$field,$id){
    $this->db->where($field,$id);
    $this->db->join('rnw_subcourse','rnw_subcourse.subcourse_id=admission_courses.courses_id');
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }

  public function terminated_old_due_installment($tbl,$field,$id,$data){
    $this->db->where($field,$id);
    return $this->db->update($tbl,$data);
  }


  public function get_paid_fees_details_data_record($tbl,$field,$id){
    $this->db->where($field,$id);
    // $this->db->join('rnw_subcourse','rnw_subcourse.subcourse_id=admission_courses.courses_id');
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }

  public function getCoursewisefees($tbl,$field,$id){
    $this->db->where($field,$id);
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->row();
  }

  public function get_reco_multiple($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }
  
  public function fetch_last_instdata($tbl, $wher, $id)
	{
		$this->db->where($wher, $id);
		$this->db->select("*");
		$this->db->from($tbl);
    $this->db->order_by("admission_installment_id", "desc");
		$data = $this->db->get();
		return $data->row();
	}

  public function last_ins_clg_co($field, $data)
  {
    $this->db->insert('college_courses', $data);
    $this->load->database();

    $last = $this->db->order_by('college_courses_id', "desc")
      ->limit(1)
      ->get('college_courses')
      ->row();
    return $last;
  }

  public function get_data_commannotifive($tbl, $field, $data)
  {
    $this->db->where($field, $data);
    $this->db->from($tbl);
    $data =  $this->db->get();
    return $data->result();
  }

}