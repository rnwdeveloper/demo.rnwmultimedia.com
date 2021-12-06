<?php
class PratikController extends CI_Controller {
    function __construct() {
        @parent::__construct();
        $this->load->model("Dbcommon", "cm");
        $this->load->model("AdminSettingsModel", "admin");
        $this->load->model("Quickadmissionprocess", "admi");
        $this->load->library('email');
        $this->load->helper('download');
        $this->load->library('csvimport');
        $this->load->library('excel');
    }

    public function test(){
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
      
        $this->load->view('erp/erpheader', $update);
        $this->load->view('pratik/test');
        // $this->load->view('pratik/demo');
    }




} ?>