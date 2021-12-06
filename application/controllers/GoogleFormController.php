<?php
class GoogleFormController extends CI_controller {
    function __construct() {
        @parent::__construct();
        $this->load->model("Dbcommon", "cm");
        $this->load->model('GoogleModel');
        $this->load->helper('loggs');
        $this->load->helper('urldata');
    }
    public function googleform() {
        if (!empty($this->input->get('action')) && !empty($this->input->get('id'))) {
            $id = $this->input->get('id');
            if ($this->input->get('action') == "delete") {
                $re = $this->cm->delete_data("googleform", "id", $id);
                if ($re) {
                    redirect('GoogleFormController/googleform');
                }
            } else if ($this->input->get('action') == "edit") {
                $display['select_googleform'] = $this->cm->select_data("googleform", "id", $id);
            }
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            // $ins_data['email'] = $data['email'];
            $ins_data['branch_id'] = $data['branch_id'];
            $ins_data['faculty_id'] = $data['faculty_id'];
            $ins_data['gr_id'] = $data['gr_id'];
            $ins_data['queryhading_id'] = $data['queryhading_id'];
            $ins_data['querypriority'] = @$data['querypriority'];
            $ins_data['remarklabel_id'] = $data['remarklabel_id'];
            $ins_data['remark'] = $data['remark'];
            $ins_data['date_time'] = date('Y-m-d H:i:s');
            if (!empty($this->input->post('update_id'))) {
                $id = $this->input->post('update_id');
                $re = $this->cm->update_data("googleform", $ins_data, "id", $id);
            } else {
                $re = $this->cm->insert_data("googleform", $ins_data);
            }
            if ($re) {
                redirect('GoogleFormController/googleform');
            }
        }
        if (!empty($this->input->post('search'))) {
            $data = $this->input->post();
            $display['googleform_all'] = $this->GoogleModel->filter_GoogleForm("googleform", $data);
            $display['filter_branch'] = @$data['filter_branch'];
            $display['filter_facultiy'] = @$data['filter_facultiy'];
            $display['filter_remark_label'] = @$data['filter_remark_label'];
            $display['filter_srating_date'] = @$data['filter_srating_date'];
            $display['filter_ending_date'] = @$data['filter_ending_date'];
        } else {
            $display['googleform_all'] = $this->cm->view_all("googleform");
        }
        $display['queryhading_all'] = $this->cm->view_all("queryhading");
        $display['remarklabel_all'] = $this->cm->view_all("remarklabel");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['faculty_all'] = $this->cm->view_all_facultys("faculty");
        $display['hod_all'] = $this->cm->view_all_hods("hod");
        $update['upd_hod'] = $this->cm->view_all("hod");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('googleform', $display);
    }
    public function download_excel() {
        header('Content-Type: application/vnd.ms-excel');
        header('Content-disposition: attachment; filename=' . rand() . '.xls');
        echo $_POST["data"];
    }
    public function StaffDetail() {
        if (!empty($this->input->get('action')) && !empty($this->input->get('id'))) {
            $id = $this->input->get('id');
            if ($this->input->get('action') == "delete") {
                $re = $this->cm->delete_data("staff_detail", "id", $id);
                if ($re) {
                    redirect('GoogleFormController/StaffDetail');
                }
            } else if ($this->input->get('action') == "edit") {
                $display['select_sttafDetail'] = $this->cm->select_data("staff_detail", "id", $id);
            }
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            $ins_data['branch_id'] = $data['branch_id'];
            $ins_data['logtype'] = $data['logtype'];
            $ins_data['name'] = $data['name'];
            $ins_data['designation'] = $data['designation'];
            $ins_data['email'] = $data['email'];
            $ins_data['personal_mobile_no'] = $data['personal_mobile_no'];
            $ins_data['mobile_no'] = $data['mobile_no'];
            $ins_data['date_time'] = date('Y-m-d H:i:s');
            if (!empty($this->input->post('update_id'))) {
                $id = $this->input->post('update_id');
                $re = $this->cm->update_data("staff_detail", $ins_data, "id", $id);
            } else {
                $re = $this->cm->insert_data("staff_detail", $ins_data);
            }
            if ($re) {
                redirect('GoogleFormController/StaffDetail');
            }
        }
        if (!empty($this->input->get('logtypest_action')) && !empty($this->input->get('id'))) {
            $id = $this->input->get('id');
            if ($this->input->get('logtype_action') == "delete") {
                if ($this->input->get('status') == 0) {
                    $st['status'] = 1;
                } else {
                    $st['status'] = 0;
                }
                $re = $this->cm->update_data("staff_logtype", $st, "logtype_id", $id);
                if ($re) {
                    redirect('GoogleFormController/StaffDetail');
                }
            } else if ($this->input->get('logtype_action') == "edit") {
                $display['select_logtype'] = $this->cm->select_data("staff_logtype", "logtype_id", $id);
            }
        }
        if (!empty($this->input->post('logtype_submit'))) {
            $data1 = $this->input->post();
            unset($data1['update_id']);
            unset($data1['logtype_submit']);
            if (!empty($this->input->post('update_id'))) {
                $id = $this->input->post('update_id');
                $re = $this->cm->update_data("staff_logtype", $data1, "logtype_id", $id);
            } else {
                $re = $this->cm->insert_data("staff_logtype", $data1);
            }
            if ($re) {
                redirect('GoogleFormController/StaffDetail');
            }
        }
        $display['logtypestaff_all'] = $this->cm->view_all("staff_logtype");
        $display['StaffDetail_all'] = $this->cm->view_all("staff_detail");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['faculty_all'] = $this->cm->view_all_facultys("faculty");
        $display['hod_all'] = $this->cm->view_all_hods("hod");
        $update['upd_hod'] = $this->cm->view_all("hod");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('StaffDetail', $display);
    }
    public function fetch_faculty() {
        if ($this->input->post('branch_ids')) {
            echo $this->GoogleModel->fetch_faculty($this->input->post('branch_ids'));
        }
    }
}
?>