<?php 

  class FaqModel extends CI_Model
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

  //   public function indata_faq($question,$answer,$faqcat_id)
  // {
  //   //print_r($category);
  //   //return $this->db->insert("hardwarecategory",$formArray);
  //   $query="insert into   faq values('','$question','$answer','$faqcat_id')";
  //   // print_r($query);
  //   // die();
  //    $this->db->query($query);
  // }

  public function datainsert_faqcat($category)
  {
    //print_r($category);
    //return $this->db->insert("hardwarecategory",$formArray);
    $query="insert into  faqcategory values('','$category')";
    // print_r($query);
    // die();
     $this->db->query($query); 
  }

      public function view_all($tbl)
    {
      $data=$this->db->get($tbl);
      return $data->result(); 

    }
  	// public function all()
  	// {
  	// 	 $faq = $this->db->get('faq');
  	// 	 $result=$faq->result();
  	// 	 return $result;

  	// }

    public function all()
    {       
    $this->db->select('*');    
    $this->db->from('faq');
    $this->db->join('faqcategory', 'faq.faqcat_id = faqcategory.faqcat_id');
    $query = $this->db->get();

    // print_r($query);
    // die();
    return $query->result();
    }

  	public function delete_item($id)
      {
          return $this->db->delete('faq', array('id' => $id));
      }

    //  public function Updatefaq_record($id)
    //   {
    //       return $this->db->where('id',$id)->get('faq')->row();
    //   }
     	
    // public function edit_faqRecord($data,$id)
    //   {
    //   //print_r($data);
    //     $this->db->where('id', $id); // here is the id
    //     $this->db->update('faq', $data);
    //     redirect(base_url('FaqController/FaqView')); //redirect after done update process
       
    //     // $query=$this->db->query("update form SET question='$question',answer='$answer' where id='$id'");
    //     // redirect(base_url('FaqController/FaqView'));
        
    //   }
 	

     function test(){
        $this->load->library('upload');   
        $config['upload_path'] = './assets/certificates/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '1000000';
        $config['file_name'] = "test";

        $this->upload->initialize($config);
        $certificateflag = $this->upload->do_upload("certificate");       
        if ($this->upload->do_upload("certificate"))
            error_reporting(E_ALL);
        else{
            echo "<pre>"; Print_r($this->upload->data()); echo "</pre>";
        }	
	}

    
}

?> 