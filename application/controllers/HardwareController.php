<?php
class HardwareController extends CI_controller {
    function __construct() {
        @parent::__construct();
        $this->load->model("Dbcommon", "cm");
        $this->load->model('HardwareModel');
        $this->load->helper('loggs');
        $this->load->helper('urldata');
    }
    public function HardwareForm() {
        if (!empty($this->input->get('action')) && !empty($this->input->get('id'))) {
            $id = $this->input->get('id');
            if ($this->input->get('action') == "delete") {
                $re = $this->HardwareModel->delete_data("hardware", "hardware_id", $id);
                if ($re) {
                    redirect('HardwareController/HardwareShow');
                }
            } else if ($this->input->get('action') == "edit") {
                $display['Select_Hardware'] = $this->HardwareModel->select_data("hardware", "hardware_id", $id);
            }
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            $this->load->library('session');
            $all = $this->session->userdata("Admin");
            unset($data['update_id']);
            unset($data['submit']);
            $ins_data['subject'] = $data['subject'];
            $ins_data['description'] = $data['description'];
            $ins_data['link'] = $data['link'];
            $ins_data['hardwarecompany_id'] = $data['hardwarecompany_id'];
            $ins_data['hardwarecategory_id'] = $data['hardwarecategory_id'];
            $ins_data['admin_id'] = $all['admin_id'];
            if (!empty($this->input->post('update_id'))) {
                $id = $this->input->post('update_id');
                $re = $this->HardwareModel->update_data("hardware", $ins_data, "hardware_id", $id);
            } else {
                //  echo "<pre>";
                //  print_r($ins_data);
                // die();
                $re = $this->HardwareModel->insert_data("hardware", $ins_data);
            }
            if ($re) {
                redirect('HardwareController/HardwareForm');
            }
        }
        $display['hardware_all'] = $this->HardwareModel->view_all("hardware");
        $update['all_hardwarecategory'] = $this->HardwareModel->view_all('hardwarecategory');
        $update['all_hardwarecompany'] = $this->HardwareModel->view_all('hardwarecompany');
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('HardwareForm', $display);
        // if($this->input->post('submit'))
        // {
        // $subject=$this->input->post('subject');
        // $description=$this->input->post('description');
        // $link=$this->input->post('link');
        // $hardwarecompany_id=$this->input->post('hardwarecompany_id');
        // $hardwarecategory_id=$this->input->post('hardwarecategory_id');
        // $this->HardwareModel->insert_dataHardware($subject,$description,$link,$hardwarecompany_id,$hardwarecategory_id);
        // }
        if ($this->input->post('save')) {
            $category = $this->input->post('category');
            $this->HardwareModel->insert_datacategory($category);
        }
        if ($this->input->post('save')) {
            $company = $this->input->post('company');
            $this->HardwareModel->datainsert_company($company);
        }
        // $company = $this->input->post('company');
        // $subject = $this->input->post('subject');
        // $link = $this->input->post('link');
        // $description = $this->input->post('description');
        // $data = array(
        // 	'company' =>$company,
        // 	'subject'=>$subject,
        // 	'link'=>$link,
        // 	'description' =>$description
        // );
        // $this->HardwareModel->insert_dataHardware($data);
        // $category = $this->input->post('category');
        // $data = array(
        // 	'category' =>$category
        // );
        // $this->HardwareModel->insert_datacategory($data);
        
    }
    public function HardwareShow() {
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->model('HardwareModel');
        $hardware = $this->HardwareModel->Hardwareall_data();
        $data = array();
        $data['hardware'] = $hardware;
        $this->load->view('HardwareShow', $data);
    }
    public function delete_fun($hardware_id) {
        $item = $this->HardwareModel->delete_item($hardware_id);
        redirect(base_url('HardwareController/HardwareShow'));
    }
    public function Update_recodhardware() {
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $hardware_id = $this->uri->segment(3);
        $data['result'] = $this->HardwareModel->update_recordhardware($hardware_id);
        $this->load->model('HardwareModel');
        $this->load->view('HardwareUpdate', $data);
    }
    public function Edithardware() {
        $hardware_id = $this->input->post('hardware_id'); // send id to model
        $data['subject'] = $this->input->post('subject');
        $data['link'] = $this->input->post('link');
        $data['description'] = $this->input->post('description');
        $this->HardwareModel->edit_hardwareRecord($data, $hardware_id);
    }
    public function update_status() {
        $status = $this->input->post('status');
        $hardware_id = $this->input->post('hardware_id');
        $this->hardware->update_course_status($course_id, $status);
    }
}
?>	