<?php
class GoogleModel extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    public function filter_GoogleForm($tbl, $filter) {
        // echo "<pre>";
        // print_r($filter);
        // die();
        if (!empty($filter['search'])) {
            if (!empty($filter['filter_branch'])) {
                $this->db->where("branch_id", $filter['filter_branch']);
            }
            if (!empty($filter['filter_facultiy'])) {
                $this->db->where("faculty_id", $filter['filter_facultiy']);
            }
            if (!empty($filter['filter_remark_label'])) {
                $this->db->where("remarklabel_id", $filter['filter_remark_label']);
            }
            if (!empty($filter['filter_srating_date']) && !empty($filter['filter_ending_date'])) {
                $this->db->where('Date_Time >=', $filter['filter_srating_date']);
                $this->db->where('Date_Time <=', $filter['filter_ending_date']);
            } else {
                if (!empty($filter['filter_srating_date'])) {
                    $this->db->where('Date_Time', $filter['filter_srating_date']);
                }
                if (!empty($filter['filter_ending_date'])) {
                    $this->db->where('Date_Time', $filter['filter_ending_date']);
                }
            }
        }
        $this->db->select('*');
        $this->db->order_by("id", "desc");
        $this->db->from($tbl);
        $data = $this->db->get();
        return $data->result();
    }
    public function fetch_faculty($branch_ids) {
        $this->db->where('branch_ids', $branch_ids);
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('faculty');
        $output = '<option value="">Select employes</option>';
        foreach ($query->result() as $row) {
            $output.= '<option value="' . $row->faculty_id . '">' . $row->name . '</option>';
        }
        return $output;
    }
    public function filter_StaffDetails($tbl, $filter) {
        if (!empty($filter['submit'])) {
            if (!empty($filter['filter_branch_id'])) {
                $this->db->where("branch_id", $filter['filter_branch_id']);
            }
            if (!empty($filter['filter_logtype'])) {
                $this->db->where("logtype", $filter['filter_logtype']);
            }
            if (!empty($filter['filter_name'])) {
                $this->db->where("name", $filter['filter_name']);
            }
            if (!empty($filter['filter_designation'])) {
                $this->db->where("designation", $filter['filter_designation']);
            }
            if (!empty($filter['filter_email'])) {
                $this->db->where("email", $filter['filter_email']);
            }
            if (!empty($filter['filter_per_mob_no'])) {
                $this->db->where("personal_mobile_no", $filter['filter_per_mob_no']);
            }
            if (!empty($filter['filter_mob_no'])) {
                $this->db->where("mobile_no", $filter['filter_mob_no']);
            }
        }
        $this->db->select('*');
        $this->db->order_by("id", "desc");
        $this->db->from($tbl);
        $data = $this->db->get();
        // print_r($data->result());
        // die;
        return $data->result();
    }
    public function filter_ReportDemo($tbl,$filter){
        if(!empty($filter['submit'])) 
        {
            if(!empty($filter['user_id'])){
                $this->db->where("addBy",$filter['user_id']);   
            }
            if(!empty($filter['branch_id_filter'])){
                $this->db->where("branch_id",$filter['branch_id_filter']);   
            }
            if(!empty($filter['duration'])){
                if($filter['duration'] == "lastWeek")
                {
                    $this->db->where('date(addDate) BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
                }
                else if($filter['duration'] == "last6Months")
                {
                    $this->db->where('date(addDate) BETWEEN DATE_SUB(NOW(), INTERVAL 180 DAY) AND NOW()');
                }
                else if($filter['duration'] == "lastYear")
                {
                    $this->db->where('date(addDate) BETWEEN DATE_SUB(NOW(), INTERVAL 365 DAY) AND NOW()');
                }
            }
        }
        $this->db->select('*');
        $this->db->from($tbl);
        $data = $this->db->get();
        return $data->result(); 
    }

    public function filter_report($tbl,$filter){
        // print_r($filter);
        // die;
        if(!empty($filter['submit'])) 
        {
            if(!empty($filter['filter_faculty'])){
                if($this->db->where("faculty_id",$filter['filter_faculty'])){
                    $this->db->where("faculty_id",$filter['filter_faculty']);
                    $this->db->or_where("hod_id",$filter['filter_faculty']);    
                }
            }
            if(!empty($filter['filter_department'])){
                $this->db->where("department_id",$filter['filter_department']); 
            }
            if(!empty($filter['filter_branch'])){
                $this->db->where("branch_id",$filter['filter_branch']); 
            }
            if(!empty($filter['duration'])){
                if($filter['duration'] == "lastWeek")
                {
                    $this->db->where('date(addDate) BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
                }
                else if($filter['duration'] == "last6Months")
                {
                    $this->db->where('date(addDate) BETWEEN DATE_SUB(NOW(), INTERVAL 180 DAY) AND NOW()');
                }
                else if($filter['duration'] == "lastYear")
                {
                    $this->db->where('date(addDate) BETWEEN DATE_SUB(NOW(), INTERVAL 365 DAY) AND NOW()');
                }
            }
            if (!empty($filter['filter_start_date']) && !empty($filter['filter_end_date'])) {

                $this->db->where('demoDate >=', $filter['filter_start_date']);
                $this->db->where('demoDate <=', $filter['filter_end_date']);
            } else {
                if (!empty($filter['filter_start_date'])) {
                    $this->db->where('demoDate', $filter['filter_start_date']);
                }
                if (!empty($filter['filter_demoDate_end'])) {
                    $this->db->where('demoDate', $filter['filter_end_date']);
                }
            }
  
        }
        $this->db->select('*');
        $this->db->from($tbl);
        $data = $this->db->get();
        // echo "<pre>";
        // print_r($data->result());
        // die;
        return $data->result(); 
    }
}
?>

