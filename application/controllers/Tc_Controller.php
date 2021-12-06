<?php
class Tc_Controller extends CI_controller {
    function __construct() {
        @parent::__construct();
        $this->load->model("Dbcommon", "cm");
        $this->load->model('Tc_Model');
        $this->load->helper('loggs');
        $this->load->helper('urldata');
    }
    public Function TcAdd() {
        logdata("Tc add form page open");
        if ($this->input->post('save')) {
            $Category_name = $this->input->post('Category_name');
            $this->Tc_Model->datainsert_TcCategory($Category_name);
        }
        if (!empty($this->input->get('action')) && !empty($this->input->get('id'))) {
            $id = $this->input->get('id');
            if ($this->input->get('action') == "delete") {
                $re = $this->Tc_Model->delete_data("termsconditions", "id", $id);
                if ($re) {
                    logdata("Terms & condition Form id " . $id . " Delete");
                    redirect('Tc_Controller/TcAdd');
                }
            } else if ($this->input->get('action') == "edit") {
                $display['Select_TC'] = $this->Tc_Model->select_data("termsconditions", "id", $id);
            }
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            $this->load->library('session');
            $all = $this->session->userdata("Admin");
            unset($data['update_id']);
            unset($data['submit']);
            $ins_data['question'] = $data['question'];
            $ins_data['answer'] = $data['answer'];
            $ins_data['Tc_Category_id'] = $data['Tc_Category_id'];
            $ins_data['admin_id'] = $all['admin_id'];
            if (!empty($this->input->post('update_id'))) {
                $id = $this->input->post('update_id');
                $re = $this->Tc_Model->update_data("termsconditions", $ins_data, "id", $id);
                logdata($data['question'] . " question update");
            } else {
                $re = $this->Tc_Model->insert_data("termsconditions", $ins_data);
                logdata($data['question'] . " question add");
            }
            if ($re) {
                redirect('Tc_Controller/TcAdd');
            }
        }
        // if($this->input->post('submit'))
        // {
        // $question=$this->input->post('question');
        // $answer=$this->input->post('answer');
        // $Tc_Category_id=$this->input->post('Tc_Category_id');
        // $this->Tc_Model->indata_Tc($question,$answer,$Tc_Category_id);
        // }
        $display['all_termsconditions'] = $this->Tc_Model->view_all('termsconditions');
        $update['all_termsconditions_category'] = $this->Tc_Model->view_all('termsconditions_category');
        $update['all_termsconditions'] = $this->Tc_Model->all('termsconditions');
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('TcAdd', $display);
    }
    public function TcView() {
        logdata("Terms&condition form view page open");
        $data['all_termsconditions'] = $this->Tc_Model->view_all('termsconditions');
        $update['all_termsconditions_category'] = $this->Tc_Model->view_all('termsconditions_category');
        $update['all_termsconditions'] = $this->Tc_Model->all('termsconditions');
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->model('Tc_Model');
        $termsconditions = $this->Tc_Model->all();
        $data = array();
        $data['termsconditions'] = $termsconditions;
        //print_r($faq);
        //die();
        $this->load->view('TcView', $data);
    }
    public function delete_fun($id) {
        $item = $this->Tc_Model->delete_item($id);
        logdata($id . " Id Terms&condition Question and ans Delete");
        redirect(base_url('Tc_Controller/TcView'));
    }
    //    public function updatedata($id)
    // {
    // $result['termsconditions']=$this->Tc_Model->displayrecordsById($id);
    // $update['all_termsconditions_category'] = $this->Tc_Model->view_all('termsconditions_category');
    // $update['all_termsconditions'] = $this->Tc_Model->all('termsconditions');
    // $update['upd_faculty'] = $this->cm->view_all("faculty");
    // $update['upd_branch'] = $this->cm->view_all("branch");
    // $update['upd_see'] = $this->cm->check_update("demo");
    // $this->load->view('header',$update);
    // $this->load->view('TcUpdate',$result);
    // 	if($this->input->post('update'))
    // 	{
    // 	$q=$this->input->post('question');
    // 	$a=$this->input->post('answer');
    // // echo "<pre>";
    // // print_r($a);
    // // die();
    // 	$this->Tc_Model->updaterecords($q,$a,$id);
    // 	redirect("Tc_Controller/TcView");
    // 	}
    // }
    public function search_data() {
        // print_r();
        // die;
        $key = $this->input->post('s_key');
        $q = "SELECT * FROM termsconditions WHERE question LIKE '%$key%' OR answer LIKE '%$key%'";
        $q1 = $this->db->query($q);
        $q2 = $q1->result();
        $data['termsconditions'] = $q2;
        logdata($key . " Terms & condition search");
        $this->load->view('TcView_demo', $data);
        // print_r($q2);
        // die;
        
    }
}
