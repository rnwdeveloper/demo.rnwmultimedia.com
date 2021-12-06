<?php
class VivekController extends CI_Controller {
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
        $this->load->view('vivek/test');
    }
  
    public function view_country(){
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $display['city_area_all'] = $this->cm->view_all("city_area");
        $display['state_all'] = $this->cm->view_all("state");
        $display['city_all'] = $this->cm->view_all("cities");
        $display['country_all'] = $this->cm->view_all("country");
      
        $this->load->view('erp/erpheader', $update);
        $this->load->view('vivek/view_country',$display);
    }

    public function view_employee_detail(){
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
      
        $this->load->view('erp/erpheader', $update);
        $this->load->view('vivek/view_employee_detail');
    }
    
    public function view_faculty_report(){
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
      
        $this->load->view('erp/erpheader', $update);
        $this->load->view('vivek/view_faculty_report');
    }

    public function view_report(){
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
      
        $this->load->view('erp/erpheader', $update);
        $this->load->view('vivek/view_report');
    }

    public function view_notification(){
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
      
        $this->load->view('erp/erpheader', $update);
        $this->load->view('vivek/view_notification');
    }

    public function view_all_permission(){
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
      
        $this->load->view('erp/erpheader', $update);
        $this->load->view('vivek/view_all_permission');
    }

    public function view_group_create(){
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
      
        $this->load->view('erp/erpheader', $update);
        $this->load->view('vivek/view_group_create');
    }

    public function view_erpsigning_sheet(){
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
      
        $this->load->view('erp/erpheader', $update);
        $this->load->view('vivek/view_erpsigning_sheet');
    }
    
    public function view_certificate(){
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
      
        $this->load->view('erp/erpheader', $update);
        $this->load->view('vivek/view_certificate');
    }

    public function view_certificate_permission(){
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
      
        $this->load->view('erp/erpheader', $update);
        $this->load->view('vivek/view_certificate_permission');
    }

    public function view_modal(){
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
      
        $this->load->view('erp/erpheader', $update);
        $this->load->view('vivek/view_modal');
    }

} ?>
