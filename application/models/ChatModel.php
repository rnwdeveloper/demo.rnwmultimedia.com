 <?php
 
 
 class ChatModel extends CI_Model {
   	public function __construct()
        {
                parent::__construct();
                 // Your own constructor code
         } 
 	private $Table = 'chat';
	
 
	public function SendTxtMessage($data){
  		$res = $this->db->insert($this->Table, $data ); 
 		if($res == 1)
 			return true;
 		else
 			return false;
	}
	public function GetReciverChatHistory($receiver_id,$receiver_logtype,$sender_logtype){
		
		$sender_id = $this->session->userdata['Admin']['id'];
		
		//SELECT * FROM `chat` WHERE `sender_id`= 197 AND `receiver_id` = 184 OR `sender_id`= 184 AND `receiver_id` = 197
		$condition= "`sender_id`= '$sender_id' AND `receiver_id` = '$receiver_id' OR `sender_id`= '$receiver_id' AND `receiver_id` = '$sender_id' AND `sender_logtype`= '$sender_logtype' AND `receiver_logtype` = '$receiver_logtype' OR `sender_logtype`= '$receiver_logtype' AND `receiver_logtype` = '$sender_logtype'";
		
		$this->db->select('*');
		$this->db->from($this->Table);
		$this->db->where($condition);
		
		$this->db->order_by("id", "asc");
   		$query = $this->db->get();
 		if ($query) {
			 return $query->result_array();
		 } else {
			 return false;
		 }
	}
 	public function GetReciverMessageList($receiver_id,$receiver_logtype){
  		
		$this->db->select('*');
		$this->db->from($this->Table);
		$this->db->where('receiver_id',$receiver_id);
		$this->db->where('receiver_logtype',$receiver_logtype);
   		$query = $this->db->get();
 		if ($query) {
			 return $query->result_array();
		 } else {
			 return false;
		 }
		 
	}
	
	
	public function TrashById($receiver_id,$receiver_logtype)
	{  
 		$res = $this->db->delete($this->Table, ['receiver_id' => $receiver_id,'receiver_logtype'=>$receiver_logtype] ); 
		if($res == 1)
			return true;
		else
			return false;
 	}	
 	
 	
 	
 	
 	
 		public function ChatHistory($receiver_id,$receiver_logtype)
 		{
		
		    
    	    $this->db->select('*');
    		$this->db->from($this->Table);
    		$this->db->where('receiver_id',$receiver_id);
		    $this->db->where('receiver_logtype',$receiver_logtype);
    	    $this->db->order_by("id", "asc");
       		$query = $this->db->get();
     		if ($query) {
    			 return $query->result_array();
    		 } else {
    			 return false;
    		 }
	    }
	    
	    public function update_data($upd_data,$r,$s,$s_logtype,$r_logtype)
	    {
    		$this->db->where("receiver_id",$r);
    		$this->db->where("sender_id",$s);
    		$this->db->where("sender_logtype",$s_logtype);
    		$this->db->where("receiver_logtype",$r_logtype);
    		return $this->db->update($this->Table,$upd_data);
	    }
 }