<?php
class Bulk_LeadModel extends CI_Model
{

	public function select()
	 {
	  $this->db->order_by('id', 'DESC');
	  $query = $this->db->get('bulk_lead');
	  return $query;
	 }

	public function insert($data)
	 {
	  $this->db->insert_batch('bulk_lead',$data);
	 }

	 public function delete_item($id)
    {
    	//print_r($id);
    	//die();
        return $this->db->delete('bulk_lead', array('id' => $id));
    }

    public function update_data($tbl,$data,$wher,$id)
  	{
      //echo "<pre>";
      //print_r($id);
    		$this->db->where($wher,$id);
    		return $this->db->update($tbl,$data);
  	}


    public function view_all($tbl,$wher,$id)
  {
    $this->db->where($wher,$id);
    $data=$this->db->get($tbl);
    return $data->result(); 
  }

    public function record_count() 
    {
       return $this->db->count_all("bulk_lead");
   }

    public function fetch_bulk_lead($limit, $start) {
       $this->db->limit($limit, $start);
       $query = $this->db->get("bulk_lead");
       if ($query->num_rows() > 0) {
           foreach ($query->result() as $row) {
               $data[] = $row;
           }
           return $data;
       }
       return false;
   }

   public function filter_followup($tbl,$where,$id)
  {
      $this->db->where($where,$id);
      $this->db->select('*');
    $this->db->order_by("id","asc");
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result(); 
  }

    public function view_all_Bulk_lead($tbl,$filter=0)
  {
      if(!empty($filter['filter_bulk_lead']))
      {
          if(!empty($filter['filter_startDate']) && !empty($filter['filter_endDate']))
          {
              $this->db->where('assign_date >=', $filter['filter_startDate']);
                $this->db->where('assign_date <=', $filter['filter_endDate']);
              
          }
          
          if(!empty($filter['filter_Next_Followup_Date_from']))
          {
              $this->db->where('assign_date >=', $filter['filter_Next_Followup_Date_from']);
             }
             if(!empty($filter['filter_Next_Followup_Date_to']))
          {
              $this->db->where('assign_date <=', $filter['filter_Next_Followup_Date_to']);
             }
             if(!empty($filter['filter_id']))
          {
              $this->db->like("id",$filter['filter_id']);
          }
         
          
          if(!empty($filter['filter_fname']))
          {
              $this->db->like("name",$filter['filter_fname']);
          }
          if(!empty($filter['filter_lname']))
          {
              $this->db->like("father_name",$filter['filter_lname']);
          }
          if(!empty($filter['filter_email']))
          {
              $this->db->like("email",$filter['filter_email']);
          }
          if(!empty($filter['filter_mobile']))
          {
              $this->db->like("contact_no",$filter['filter_mobile']);
          }
          if(!empty($filter['filter_source']))
          {
              $this->db->like("source_type",$filter['filter_source']);
          }
          
          if(!empty($filter['filter_follwup_interestRating']))
          {
              $this->db->where("intresting_rating",$filter['filter_follwup_interestRating']);
          }
          
          if(!empty($filter['filter_enquiry_assignedUser']))
          {
              $this->db->like("assign_to",$filter['filter_enquiry_assignedUser']);
          }
      }
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result(); 
  }
    public function view_all_Bulk_lead_user($tbl,$where,$filed,$filter=0)
  {
      if(!empty($filter['filter_bulk_lead']))
      {
          if(!empty($filter['filter_startDate']) && !empty($filter['filter_endDate']))
          {
              $this->db->where('assign_date >=', $filter['filter_startDate']);
                $this->db->where('assign_date <=', $filter['filter_endDate']);
              
          }
          
          if(!empty($filter['filter_Next_Followup_Date_from']))
          {
              $this->db->where('assign_date >=', $filter['filter_Next_Followup_Date_from']);
             }
             if(!empty($filter['filter_Next_Followup_Date_to']))
          {
              $this->db->where('assign_date <=', $filter['filter_Next_Followup_Date_to']);
             }
             if(!empty($filter['filter_id']))
          {
              $this->db->like("id",$filter['filter_id']);
          }
         
          
          if(!empty($filter['filter_fname']))
          {
              $this->db->like("name",$filter['filter_fname']);
          }
          if(!empty($filter['filter_lname']))
          {
              $this->db->like("father_name",$filter['filter_lname']);
          }
          if(!empty($filter['filter_email']))
          {
              $this->db->like("email",$filter['filter_email']);
          }
          if(!empty($filter['filter_mobile']))
          {
              $this->db->like("contact_no",$filter['filter_mobile']);
          }
          if(!empty($filter['filter_source']))
          {
              $this->db->like("source_type",$filter['filter_source']);
          }
          
          if(!empty($filter['filter_follwup_interestRating']))
          {
              $this->db->where("intresting_rating",$filter['filter_follwup_interestRating']);
          }
          
          if(!empty($filter['filter_enquiry_assignedUser']))
          {
              $this->db->like("assign_to",$filter['filter_enquiry_assignedUser']);
          }
      }
      $this->db->where($where,$filed);
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result(); 
  }


   public function view_all_assignData($tbl)
  {
    $this->db->where('assign_status','1');
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }

   public function view_all_assignoldData($tbl)
  {
    $this->db->where('assign_date');
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }

   public function view_all_today($tbl)
  {
    $this->db->where('assign_date',date('Y-m-d'));
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }

   public function view_all_olddata($tbl)
  {
    $this->db->where('assign_date !=',date('Y-m-d'));
    $this->db->from($tbl);
    $data = $this->db->get();
    return $data->result();
  }  


}

