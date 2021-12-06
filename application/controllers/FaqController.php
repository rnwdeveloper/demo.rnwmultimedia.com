<?php
class FaqController extends CI_controller {
    function __construct() {
        @parent::__construct();
        $this->load->model("Dbcommon", "cm");
        $this->load->model('FaqModel');
        $this->load->helper('loggs');
        $this->load->helper('urldata');
    }
    public function FaqView() {
        logdata("Faq View page open");
        $update['all_faqcategory'] = $this->FaqModel->view_all('faqcategory');
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->model('FaqModel');
        $faq = $this->FaqModel->all();
        $data = array();
        $data['faq'] = $faq;
        //print_r($faq);
        //die();
        $this->load->view('FaqView', $data);
    }
    public Function FaqAdd() {
        logdata("Faq Add page open");
        if (!empty($this->input->get('action')) && !empty($this->input->get('id'))) {
            $id = $this->input->get('id');
            if ($this->input->get('action') == "delete") {
                $re = $this->FaqModel->delete_data("faq", "id", $id);
                if ($re) {
                    logdata("Faq id " . $id . " Delete");
                    redirect('FaqController/FaqView');
                }
            } else if ($this->input->get('action') == "edit") {
                $display['Select_Faq'] = $this->FaqModel->select_data("faq", "id", $id);
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
            $ins_data['faqcat_id'] = $data['faqcat_id'];
            $ins_data['admin_id'] = $all['admin_id'];
            if (!empty($this->input->post('update_id'))) {
                $id = $this->input->post('update_id');
                logdata("Faq id " . $id . " Update");
                $re = $this->FaqModel->update_data("faq", $ins_data, "id", $id);
            } else {
                //  echo "<pre>";
                //  print_r($ins_data);
                // die();
                $re = $this->FaqModel->insert_data("faq", $ins_data);
                logdata("Faq " . implode(",", $ins_data) . " Add");
            }
            if ($re) {
                redirect('FaqController/FaqAdd');
            }
        }
        // if($this->input->post('submit'))
        // {
        // $question=$this->input->post('question');
        // $answer=$this->input->post('answer');
        // $faqcat_id=$this->input->post('faqcat_id');
        // $this->FaqModel->indata_faq($question,$answer,$faqcat_id);
        // }
        if ($this->input->post('save')) {
            $category = $this->input->post('category');
            $this->FaqModel->datainsert_faqcat($category);
        }
        $display['all_faq'] = $this->FaqModel->view_all('faq');
        $update['all_faqcategory'] = $this->FaqModel->view_all('faqcategory');
        $update['all_faq'] = $this->FaqModel->all('faq');
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('FaqAdd', $display);
    }
    public function delete_fun($id) {
        $item = $this->FaqModel->delete_item($id);
        logdata("Faq view page " . $id . " Faq delete");
        redirect(base_url('FaqController/FaqView'));
    }
    //   public function UpdateFaq()
    //   	{
    //   		$update['upd_faculty'] = $this->cm->view_all("faculty");
    // 	$update['upd_branch'] = $this->cm->view_all("branch");
    // 	$update['upd_see'] = $this->cm->check_update("demo");
    // 	$update['f_module'] = $this->cm->view_all("f_module");
    // 	$update['m_module'] = $this->cm->view_all("m_module");
    // 	$update['l_module'] = $this->cm->view_all("l_module");
    //     $this->load->view('header',$update);
    //     $id = $this->uri->segment(3);
    //     $data['faq'] = $this->FaqModel->Updatefaq_record($id);
    //    // print_r($data);
    //     $this->load->model('FaqModel');
    //     $this->load->view('FaqUpdate',$data);
    // }
    // public function Editfaq()
    // 	{
    //       $id = $this->input->post('id'); // send id to model
    //       $data['question'] = $this->input->post('question');
    //       $data['answer'] = $this->input->post('answer');
    //      $this->FaqModel->edit_faqRecord($data, $id);
    // 		// 	if($this->input->post('update'))
    // 		// {
    // 		// $question=$this->input->post('question');
    // 		// $answer=$this->input->post('answer');
    // 		// $this->FaqModel->edit_faqRecord($question,$answer);
    // 		// }
    //     }
    public function search_data() {
        // print_r();
        // die;
        $key = $this->input->post('s_key');
        $q = "SELECT * FROM faq WHERE question LIKE '%$key%' OR answer LIKE '%$key%'";
        $q1 = $this->db->query($q);
        $q2 = $q1->result();
        $data['faq'] = $q2;
        logdata($key . " Keyword Faq Search");
        $this->load->view('FaqView_demo', $data);
        // print_r($q2);
        // die;
        
    }
}
?>