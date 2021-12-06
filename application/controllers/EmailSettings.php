<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmailSettings extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("Dbcommon", "cm");
        $this->load->model("Quickadmissionprocess", "admi");
        $this->load->model("AdminSettingsModel", "admin");
        $this->load->helper('loggs');
    }
    public function emailSetting() {
        @$user_permission = explode(",", $_SESSION['user_permission']);
        logdata("Course page open");
        if (in_array("Single Course", $user_permission) || $_SESSION['logtype'] == "Super Admin" || $_SESSION['logtype'] == "Admin") {
            if (!empty($this->input->get('action')) && !empty($this->input->get('id'))) {
                $id = $this->input->get('id');
                if ($this->input->get('action') == "delete") {
                    if ($this->input->get('status') == 0) {
                        $st['status'] = 1;
                    } else {
                        $st['status'] = 0;
                    }
                    $re = $this->cm->update_data("email_settings", $st, "id", $id);
                    if ($re) {
                        $this->session->set_flashdata('message', 'Email status updated successfully.');
                        logdata('email_settings id= ' . $id . " Status " . $st['status'] . " updated");
                        redirect('EmailSettings/emailSetting');
                    }
                } else if ($this->input->get('action') == "edit") {
                    $display['select_email'] = $this->cm->select_data("email_settings", "id", $id);
                    $display['select_email']->name = explode(" ", $display['select_email']->user_name);
                }
            }
            if (!empty($this->input->post('submit'))) {
                $data = $this->input->post();
                unset($data['update_id']);
                unset($data['submit']);
                $ins_data['user_id'] = $_SESSION['user_id'];
                $ins_data['role'] = $_SESSION['logtype'];
                $ins_data['admin_id'] = $_SESSION['admin_id'];
                $ins_data['user_name'] = $data['first_name'] . " " . $data['last_name'];
                $ins_data['email'] = $data['email'];
                $ins_data['password'] = $data['password'];
                $ins_data['encryption'] = $data['encryption'];
                $ins_data['port'] = $data['port'];
                $ins_data['host'] = $data['host'];
                $ins_data['email_type'] = $data['email_type'];
                $ins_data['is_default'] = ($data['is_default']) ? $data['is_default'] : 0;
                if (!empty($this->input->post('update_id'))) {
                    $id = $this->input->post('update_id');
                    $re = $this->cm->update_data("email_settings", $ins_data, "id", $id);
                    $this->session->set_flashdata('message', 'Email updated successfully.');
                    logdata("email settings id= " . $id . " email settings =" . $ins_data['email'] . " Update");
                } else {
                    $re = $this->cm->insert_data("email_settings", $ins_data);
                    $this->session->set_flashdata('message', 'Email inserted successfully.');
                    logdata("email settings=" . $ins_data['email'] . " add");
                }
                if (@$re) {
                    redirect('EmailSettings/emailSetting');
                }
            }
            $update['aa_branch'] = $this->cm->filter_data("branch", "admin_id", $_SESSION['admin_id']);
            $update['upd_faculty'] = $this->cm->view_all("faculty");
            $update['upd_branch'] = $this->cm->view_all("branch");
            $update['upd_see'] = $this->cm->check_update("demo");
            $update['f_module'] = $this->cm->view_all("f_module");
            $update['m_module'] = $this->cm->view_all("m_module");
            $update['l_module'] = $this->cm->view_all("l_module");
            $display['email_all'] = $this->cm->view_all("email_settings");
            $this->load->view('header', $update);
            $this->load->view('email_settings/email_setting', $display);
        }
    }
    public function deleteEmailSettings($id) {
        $item = $this->cm->delete_data("email_settings", 'id', $id);
        $this->session->set_flashdata('message', 'Email deleted successfully.');
        logdata('email settings id= ' . $id . " Deleted");
        redirect('EmailSettings/emailSetting');
    }
}
