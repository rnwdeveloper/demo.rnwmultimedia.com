<?php
class AdmissionApiController extends CI_controller
{
	function __construct()
	{
		@parent::__construct();
		$this->load->model("Dbcommon", "cm");
		$this->load->model("Quickadmissionprocess", "admi");
		$this->load->model("AdminSettingsModel", "admin");
		$this->load->library("pagination");
		$this->load->library('email');
		$this->load->library('pdf');
		$this->load->helper('cookie');
	}

    public function CommanNotifive()
    {
      $id = $this->input->get('admission_id');
      //$data =  $this->admi->get_data_commannotifive("admission_installment","admission_id",$id);
      $data =  $this->admi->get_data_commannotifive("batch_attendance","admission_id",$id);
      if($data){    
        header('Content-type: application/json');
        echo json_encode($data , JSON_PRETTY_PRINT);
      } else {                                 
        echo "Enter admission_id as body parameter first.";
      }
    }

}
?>