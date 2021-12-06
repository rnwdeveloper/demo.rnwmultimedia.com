<?php
class EnquiryModal extends CI_Model
{
	
	function __construct()
	{
		parent ::__construct();	
	}
	
	public function insert_data($tbl,$data)
	{
		return $this->db->insert($tbl,$data);
	}
	
	function insert_enquiry($tbl,$data)
	{
       $this->db->insert($tbl, $data);
       $insert_id = $this->db->insert_id();
    
       return  $insert_id;
    }
    function insert_demo($tbl,$data)
	{
       $this->db->insert($tbl, $data);
       $insert_id = $this->db->insert_id();
    
       return  $insert_id;
    }
	public function delete_data($tbl,$wher,$id)
	{
		$this->db->where($wher,$id);
		return $this->db->delete($tbl);	
	}
	public function view_all($tbl)
	{
		$data=$this->db->get($tbl);
		return $data->result();	
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
	
	public function count_row_leads($tbl,$filter=0)
	{
	     if(!empty($filter['filter_lead']))
	    {
	        if(!empty($filter['filter_startDate']) && !empty($filter['filter_endDate']))
	        {
	            $this->db->where('lead_date >=', $filter['filter_startDate']);
                $this->db->where('lead_date <=', $filter['filter_endDate']);
	            
	        }
	        if(!empty($filter['filter_fname']))
	        {
	            $this->db->like("lead_name",$filter['filter_fname']);
	        }
	        if(!empty($filter['filter_lname']))
	        {
	            $this->db->like("lead_name",$filter['filter_lname']);
	        }
	        if(!empty($filter['filter_email']))
	        {
	            $this->db->like("lead_email",$filter['filter_email']);
	        }
	        if(!empty($filter['filter_mobile']))
	        {
	            $this->db->like("lead_number",$filter['filter_mobile']);
	        }
	        if(!empty($filter['filter_source']))
	        {
	            $this->db->like("lead_source",$filter['filter_source']);
	        }
	        if(!empty($filter['filter_course']))
	        {
	            $this->db->like("lead_course_id",$filter['filter_course']);
	        }
	        if(!empty($filter['filter_branch']))
	        {
	            $this->db->like("lead_branch",$filter['filter_branch']);
	        }
	    }
	    $this->db->select('*');
		
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->num_rows();
	    
	}
	
	public function view_all_leads($tbl,$filter=0)
	{
	    if(!empty($filter['filter_lead']))
	    {
	        if(!empty($filter['filter_startDate']) && !empty($filter['filter_endDate']))
	        {
	            $this->db->where('lead_date >=', $filter['filter_startDate']);
                $this->db->where('lead_date <=', $filter['filter_endDate']);
	            
	        }
	        if(!empty($filter['filter_fname']))
	        {
	            $this->db->like("lead_name",$filter['filter_fname']);
	        }
	        if(!empty($filter['filter_lname']))
	        {
	            $this->db->like("lead_name",$filter['filter_lname']);
	        }
	        if(!empty($filter['filter_email']))
	        {
	            $this->db->like("lead_email",$filter['filter_email']);
	        }
	        if(!empty($filter['filter_mobile']))
	        {
	            $this->db->like("lead_number",$filter['filter_mobile']);
	        }
	        if(!empty($filter['filter_source']))
	        {
	            $this->db->like("lead_source",$filter['filter_source']);
	        }
	        if(!empty($filter['filter_course']))
	        {
	            $this->db->like("lead_course_id",$filter['filter_course']);
	        }
	        if(!empty($filter['filter_branch']))
	        {
	            $this->db->like("lead_branch",$filter['filter_branch']);
	        }
	    }
		
		$this->db->where('lead_toEnquiry',"0");
		$this->db->select('*');
		$this->db->order_by("lead_id","desc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();	
	}
	
	public function view_all_followup($tbl)
	{
	    $this->db->select('*');
		$this->db->order_by("follwup_id","desc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();	
	}
	
	public function view_all_inquirys($tbl,$filter=0)
	{
	    if(!empty($filter['filter_inquirys']))
	    {
	        if(!empty($filter['filter_startDate']) && !empty($filter['filter_endDate']))
	        {
	            $this->db->where('enquiry_date >=', $filter['filter_startDate']);
                $this->db->where('enquiry_date <=', $filter['filter_endDate']);
	            
	        }
	        
	        if(!empty($filter['filter_Next_Followup_Date_from']))
	        {
	            $this->db->where('enquiry_next_followp >=', $filter['filter_Next_Followup_Date_from']);
             }
             if(!empty($filter['filter_Next_Followup_Date_to']))
	        {
	            $this->db->where('enquiry_next_followp <=', $filter['filter_Next_Followup_Date_to']);
             }
             if(!empty($filter['filter_enquiry_id']))
	        {
	            $this->db->like("enquiry_id",$filter['filter_enquiry_id']);
	        }
	        if(!empty($filter['filter_department']))
	        {
	            $this->db->like("enquiry_category",$filter['filter_department']);
	        }
	        if(!empty($filter['filter_Interest_Level']))
	        {
	            $this->db->like("enquiry_follwup_interestLevel",$filter['filter_Interest_Level']);
	        }
	        if(!empty($filter['filter_Student_Response']))
	        {
	            $this->db->like("enquiry_follwup_studentResponse",$filter['filter_Student_Response']);
	        }
	        if(!empty($filter['filter_package']))
	        {
	            $this->db->like("enquiry_packageName",$filter['filter_package']);
	        }
	       
	        
	        if(!empty($filter['filter_fname']))
	        {
	            $this->db->like("enquiry_name",$filter['filter_fname']);
	        }
	        if(!empty($filter['filter_lname']))
	        {
	            $this->db->like("enquiry_name",$filter['filter_lname']);
	        }
	        if(!empty($filter['filter_email']))
	        {
	            $this->db->like("enquiry_email",$filter['filter_email']);
	        }
	        if(!empty($filter['filter_mobile']))
	        {
	            $this->db->like("enquiry_number",$filter['filter_mobile']);
	        }
	        if(!empty($filter['filter_source']))
	        {
	            $this->db->like("enquiry_sourceType",$filter['filter_source']);
	        }
	        if(!empty($filter['filter_course']))
	        {
	            $this->db->like("enquiry_courseName",$filter['filter_course']);
	        }
	        if(!empty($filter['filter_branch']))
	        {
	            $this->db->like("enquiry_branch",$filter['filter_branch']);
	        }
	        if(!empty($filter['filter_follwup_interestRating']))
	        {
	            $this->db->where("enquiry_follwup_interestRating",$filter['filter_follwup_interestRating']);
	        }
	        
	        if(!empty($filter['filter_enquiry_assignedUser']))
	        {
	            $this->db->where("enquiry_assignedUser",$filter['filter_enquiry_assignedUser']);
	        }
	    }
		
		if($_SESSION['logtype']!="Super Admin")
		{
		    @$branch_ids = explode(",",$_SESSION['branch_ids']);
		    for($i=0;$i<sizeof($branch_ids);$i++)
		    {
		        $this->db->where("enquiry_branch",$branch_ids[$i]);
		    }
		}
		$this->db->where("enquiry_toDemo","0");
		$this->db->select('*');
		$this->db->order_by("enquiry_id","desc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();	
	}
	
	public function view_all_inquirys_Overdue_Follow_Up($tbl,$filter=0)
	{
	    if(!empty($filter['filter_inquirys']))
	    {
	        if(!empty($filter['filter_startDate']) && !empty($filter['filter_endDate']))
	        {
	            $this->db->where('enquiry_date >=', $filter['filter_startDate']);
                $this->db->where('enquiry_date <=', $filter['filter_endDate']);
	            
	        }
	        
	        if(!empty($filter['filter_Next_Followup_Date_from']))
	        {
	            $this->db->where('enquiry_next_followp >=', $filter['filter_Next_Followup_Date_from']);
             }
             if(!empty($filter['filter_Next_Followup_Date_to']))
	        {
	            $this->db->where('enquiry_next_followp <=', $filter['filter_Next_Followup_Date_to']);
             }
             if(!empty($filter['filter_enquiry_id']))
	        {
	            $this->db->like("enquiry_id",$filter['filter_enquiry_id']);
	        }
	        if(!empty($filter['filter_department']))
	        {
	            $this->db->like("enquiry_category",$filter['filter_department']);
	        }
	        if(!empty($filter['filter_Interest_Level']))
	        {
	            $this->db->like("enquiry_follwup_interestLevel",$filter['filter_Interest_Level']);
	        }
	        if(!empty($filter['filter_Student_Response']))
	        {
	            $this->db->like("enquiry_follwup_studentResponse",$filter['filter_Student_Response']);
	        }
	        if(!empty($filter['filter_package']))
	        {
	            $this->db->like("enquiry_packageName",$filter['filter_package']);
	        }
	       
	        
	        if(!empty($filter['filter_fname']))
	        {
	            $this->db->like("enquiry_name",$filter['filter_fname']);
	        }
	        if(!empty($filter['filter_lname']))
	        {
	            $this->db->like("enquiry_name",$filter['filter_lname']);
	        }
	        if(!empty($filter['filter_email']))
	        {
	            $this->db->like("enquiry_email",$filter['filter_email']);
	        }
	        if(!empty($filter['filter_mobile']))
	        {
	            $this->db->like("enquiry_number",$filter['filter_mobile']);
	        }
	        if(!empty($filter['filter_source']))
	        {
	            $this->db->like("enquiry_sourceType",$filter['filter_source']);
	        }
	        if(!empty($filter['filter_course']))
	        {
	            $this->db->like("enquiry_courseName",$filter['filter_course']);
	        }
	        if(!empty($filter['filter_branch']))
	        {
	            $this->db->like("enquiry_branch",$filter['filter_branch']);
	        }
	        if(!empty($filter['filter_follwup_interestRating']))
	        {
	            $this->db->where("enquiry_follwup_interestRating",$filter['filter_follwup_interestRating']);
	        }
	        if(!empty($filter['filter_enquiry_assignedUser']))
	        {
	            $this->db->where("enquiry_assignedUser",$filter['filter_enquiry_assignedUser']);
	        }
	    }
	    if($_SESSION['logtype']!="Super Admin")
		{
		    @$branch_ids = explode(",",$_SESSION['branch_ids']);
		    for($i=0;$i<sizeof($branch_ids);$i++)
		    {
		        $this->db->where("enquiry_branch",$branch_ids[$i]);
		    }
		}
		
		$this->db->where("enquiry_toDemo","0");
	    $c_date_time =  date("Y-m-d");
	   $this->db->where('enquiry_next_followp_date <',$c_date_time); 
		$this->db->select('*');
		$this->db->order_by("enquiry_id","desc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();	
	}
	
	public function view_all_inquirys_Pending_Follow_Up($tbl,$filter=0)
	{
	    if(!empty($filter['filter_inquirys']))
	    {
	        if(!empty($filter['filter_startDate']) && !empty($filter['filter_endDate']))
	        {
	            $this->db->where('enquiry_date >=', $filter['filter_startDate']);
                $this->db->where('enquiry_date <=', $filter['filter_endDate']);
	            
	        }
	        
	        if(!empty($filter['filter_Next_Followup_Date_from']))
	        {
	            $this->db->where('enquiry_next_followp >=', $filter['filter_Next_Followup_Date_from']);
             }
             if(!empty($filter['filter_Next_Followup_Date_to']))
	        {
	            $this->db->where('enquiry_next_followp <=', $filter['filter_Next_Followup_Date_to']);
             }
             if(!empty($filter['filter_enquiry_id']))
	        {
	            $this->db->like("enquiry_id",$filter['filter_enquiry_id']);
	        }
	        if(!empty($filter['filter_department']))
	        {
	            $this->db->like("enquiry_category",$filter['filter_department']);
	        }
	        if(!empty($filter['filter_Interest_Level']))
	        {
	            $this->db->like("enquiry_follwup_interestLevel",$filter['filter_Interest_Level']);
	        }
	        if(!empty($filter['filter_Student_Response']))
	        {
	            $this->db->like("enquiry_follwup_studentResponse",$filter['filter_Student_Response']);
	        }
	        if(!empty($filter['filter_package']))
	        {
	            $this->db->like("enquiry_packageName",$filter['filter_package']);
	        }
	       
	        
	        if(!empty($filter['filter_fname']))
	        {
	            $this->db->like("enquiry_name",$filter['filter_fname']);
	        }
	        if(!empty($filter['filter_lname']))
	        {
	            $this->db->like("enquiry_name",$filter['filter_lname']);
	        }
	        if(!empty($filter['filter_email']))
	        {
	            $this->db->like("enquiry_email",$filter['filter_email']);
	        }
	        if(!empty($filter['filter_mobile']))
	        {
	            $this->db->like("enquiry_number",$filter['filter_mobile']);
	        }
	        if(!empty($filter['filter_source']))
	        {
	            $this->db->like("enquiry_sourceType",$filter['filter_source']);
	        }
	        if(!empty($filter['filter_course']))
	        {
	            $this->db->like("enquiry_courseName",$filter['filter_course']);
	        }
	        if(!empty($filter['filter_branch']))
	        {
	            $this->db->like("enquiry_branch",$filter['filter_branch']);
	        }
	        if(!empty($filter['filter_follwup_interestRating']))
	        {
	            $this->db->where("enquiry_follwup_interestRating",$filter['filter_follwup_interestRating']);
	        }
	        if(!empty($filter['filter_enquiry_assignedUser']))
	        {
	            $this->db->where("enquiry_assignedUser",$filter['filter_enquiry_assignedUser']);
	        }
	    }
	    if($_SESSION['logtype']!="Super Admin")
		{
		    @$branch_ids = explode(",",$_SESSION['branch_ids']);
		    for($i=0;$i<sizeof($branch_ids);$i++)
		    {
		        $this->db->where("enquiry_branch",$branch_ids[$i]);
		    }
		}
		
		
		$this->db->where("enquiry_toDemo","0");
	    $c_date_time =  date("Y-m-d");
	   
		$this->db->where('enquiry_next_followp_date >=',$c_date_time); 
		$this->db->select('*');
		$this->db->order_by("enquiry_id","desc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();	
	}
	
	public function filter_followup($tbl,$where,$id)
	{
	    $this->db->where($where,$id);
	    $this->db->select('*');
		$this->db->order_by("follwup_id","asc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();	
	}
	
	public function filter_remarks($tbl,$where,$id)
	{
	    $this->db->where($where,$id);
	    $this->db->select('*');
		$this->db->order_by("demo_remark_id","asc");
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->result();	
	}
}

?>