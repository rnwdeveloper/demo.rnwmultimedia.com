<?php 

class HardwareModel extends CI_Model
{
	function __construct()
	{
		parent ::__construct();	
	}



	 public function insert_data($tbl,$data)
  {
    //print_r($data);
     //die();
    return $this->db->insert($tbl,$data);
  }
  public function delete_data($tbl,$wher,$id)
  {
    $this->db->where($wher,$id);
    return $this->db->delete($tbl); 
  }
  public function update_data($tbl,$data,$wher,$id)
  {
    $this->db->where($wher,$id);
    return $this->db->update($tbl,$data);
  }

  public function select_data($tbl,$wher,$id)
  {
    $this->db->where($wher,$id);
    $this->db->select("*");
    $this->db->from($tbl);
    $data=$this->db->get();
    return $data->row();  
  }

	// public function insert_dataHardware($subject,$description,$link,$hardwarecompany_id,$hardwarecategory_id)
	// {
	// 	//print_r($formArray);
	// 	//return $this->db->insert("hardware",$formArray);
	// 	$query="insert into hardware values('','$subject','$description','$link','$hardwarecompany_id','$hardwarecategory_id')";
	// 	// print_r($query);
	// 	// die();	
	// 	$this->db->query($query);
	// }

	
	public function insert_datacategory($category)
	{
		//print_r($category);
		//return $this->db->insert("hardwarecategory",$formArray);
		$query="insert into  hardwarecategory values('','$category')";
		// print_r($query);
		// die();
		 $this->db->query($query);
	}

	public function datainsert_company($company)
	{
		//print_r($category);
		//return $this->db->insert("hardwarecategory",$formArray);
		$query="insert into  hardwarecompany values('','$company')";
		// print_r($query);
		// die();
		 $this->db->query($query); 
	}
	
	// public function Hardwareall_data()
	// {
	// 	 $hardware = $this->db->get('hardware');
	// 	 $result=$hardware->result();
	// 	 return $result;
	// }
	
	
	public function view_all($tbl)
	{
		$data=$this->db->get($tbl);
		return $data->result();	

	}
	

	public function Hardwareall_data()
		{		    
		$this->db->select('*');    
		$this->db->from('hardware');
		$this->db->join('hardwarecompany', 'hardware.hardwarecompany_id = hardwarecompany.id');
		$this->db->join('hardwarecategory', 'hardware.hardwarecategory_id = hardwarecategory.id');
		$query = $this->db->get();
		//print_r($query);
	    //die();

		return $query->result();
		}

	public function delete_item($hardware_id)
    {
    	//print_r($id);
    	//die();
        return $this->db->delete('hardware', array('hardware_id' => $hardware_id));
    }

 //    public function update_recordhardware($hardware_id)
	// {
	//     return $this->db->where('hardware_id',$hardware_id)->get('hardware')->row();
	// }

	// public function edit_hardwareRecord($data,$hardware_id)
 //    	{
 //    	//print_r($data);
 //        $this->db->where('hardware_id', $hardware_id); // here is the id
 //        $this->db->update('hardware',$data);
 //        redirect(base_url('HardwareController/HardwareShow')); //redirect after done update process
 //    }
    public function update_course_status($id,$status){
	  $data['status'] = $status;
	  $this->db->where('hardware_id', $hardware_id);
	  $this->db->update('hardwarecompany',$data);
	}

}
?>	