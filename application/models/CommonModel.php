<?php
class CommonModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Calcutta");
        // Your own constructor code
    }

    public function select_data($tbl, $data, $field, $admission_courses_id)
    {
        $this->db->where($field, $admission_courses_id);
        return $this->db->update($tbl, $data);
    }

    public function delete_data($tbl, $field, $id)
    {
        $this->db->where($field, $id);
        return $this->db->delete($tbl);
        //echo $this->db->last_query(); die();
    }

    public function Hardwareall_data()
    {
        $this->db->select('*');
        $this->db->from('hardware');
        $this->db->join('hardwarecompany', 'hardware.hardwarecompany_id = hardwarecompany.id');
        $this->db->join('hardwarecategory', 'hardware.hardwarecategory_id = hardwarecategory.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert($tbl, $data)
    {
        // print_r($data);
        // die();
        return $this->db->insert($tbl, $data);
        //echo $this->db->last_query(); die();
    }

    public function delete_record($tbl, $field, $id)
    {
        $this->db->where($field, $id);
        return $this->db->delete($tbl);
    }

    public function all_termsconditions()
    {
        $this->db->select('*');
        $this->db->from('termsconditions');
        $this->db->join('termsconditions_category', 'termsconditions.Tc_Category_id = termsconditions_category.Tc_Category_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_record($tbl, $data, $field, $id)
    {
        $this->db->where($field, $id);
        return $this->db->update($tbl, $data);
    }

    public function view_all_by_order($tbl, $order_field, $order_type){
        $this->db->order_by($order_field, $order_type);
        $data = $this->db->get($tbl);
        return $data->result();
    }

    public function select_by_field($table, $field, $field_data){
        $data = $this->db->select('t1.*, t2.branch_id, t2.department_id	, t2.subdepartment_id')
            ->from('rnw_subcourse as t1')
            ->where('t1.subcourse_id', $field_data)
            ->join('rnw_course as t2', 't1.course_id = t2.course_id')
            ->get();
        return $data->result();
    }

    public function selected_data($table, $field, $field_data) {
        $this->db->where($field, $field_data);
        $data =  $this->db->get($table);
        return $data->result();
    }
    public function get_notification($tbl){
        $course_status = "Completed";
        $this->db->select("*");
        $this->db->where("batch_id !=" , "");
        $this->db->or_where('admission_courses_status', $course_status);
        $this->db->order_by("updated_at", "desc");
        $this->db->from($tbl);
        $data = $this->db->get();
        // echo "<pre>";
        // print_r($data->result());
        // die;
        return $data->result();
    }
}
