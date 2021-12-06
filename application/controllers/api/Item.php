<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Item extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($notifive_subject_id = 6258)
	{
        if(!empty($notifive_subject_id)){
            $data = $this->db->get_where("notifive_subject", ['notifive_subject_id' => $notifive_subject_id])->row_array();
        }else{
            $data = $this->db->get("notifive_subject")->result();
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $input = $this->input->post();
        $this->db->insert('notifive_subject',$input);
     
        $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($notifive_subject_id)
    {
        $input = $this->put();
        $this->db->update('notifive_subject', $input, array('notifive_subject_id'=>$notifive_subject_id));
     
        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($notifive_subject_id)
    {
        $this->db->delete('notifive_subject', array('notifive_subject_id'=>$notifive_subject_id));
       
        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
    }
    	
}