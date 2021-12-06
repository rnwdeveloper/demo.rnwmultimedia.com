<?php 

  class Tc_Model extends CI_Model
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
  
  	public function view_all($tbl)
    {
      $data=$this->db->get($tbl);
      return $data->result(); 

    }

    public function all()
    {       
    $this->db->select('*');    
    $this->db->from('termsconditions');
    $this->db->join('termsconditions_category', 'termsconditions.Tc_Category_id = termsconditions_category.Tc_Category_id');
    $query = $this->db->get();

    // print_r($query);
    // die();
    return $query->result();
    }

  // 	public function indata_Tc($question,$answer,$Tc_Category_id)
  // {
  //   $query="insert into   termsconditions values('','$question','$answer','$Tc_Category_id')";
  //   // print_r($query);
  //   // die();
  //    $this->db->query($query);
  // }

  // 	 public function datainsert_TcCategory($Category_name)
  // {
    
  //   $query="insert into  termsconditions_category values('','$Category_name')";
  //   // print_r($query);
  //   // die();
  //    $this->db->query($query); 
  // }

  public function delete_item($id)
      {
          return $this->db->delete('termsconditions', array('id' => $id));
      }
  
  public function displayrecordsById($id)
	{

	$query=$this->db->query("select * from termsconditions where id='".$id."'");
	return $query->result();
	}


	// public function updaterecords($q,$a,$id)
	// 	{

	// 	$query=$this->db->query("update termsconditions SET question='$q',answer='$a' where id='".$id."'");
	// 	}	
 
   }
  	?>