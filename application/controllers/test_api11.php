<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class test_api11 extends REST_Controller {
    
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
	public function index()
	{
       
            $data = $this->db->get("f_module")->result();
       
     
        $this->response($data, REST_Controller::HTTP_OK);
	}
      

      }