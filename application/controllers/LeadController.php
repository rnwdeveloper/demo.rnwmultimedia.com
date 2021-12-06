<?php
class LeadController extends CI_Controller {
    function __construct() {
        @parent::__construct();
        $this->load->model("LeadModel", "cm");
        $this->load->helper('loggs');
        $this->load->helper('urldata');
    }
    public function index() {
        $status_all = $this->cm->view_all('bulk_lead_followup_type');
        $lead_list_all_record = $this->cm->view_all('lead_list');
        $allLeadRecord = $this->cm->view_all_records('lead_list');
        $status_wise = array();
        $status_wise['0 - All'] = $allLeadRecord;
        foreach ($status_all as $sa) {
            $count = 0;
            foreach ($lead_list_all_record as $ls) {
                if ($ls->status == $sa->followup_type_name) {
                    $count++;
                }
            }
            $status_wise[$sa->followup_type_name] = $count;
        }
        $display['status_lead_record'] = $status_wise;
        echo json_encode($display);
    }
}
?>