<?php 

class FormController extends CI_Controller {
	

	public $newRecord;
	public $activeRecord;
	public $postponeRecord;
	public $confirmRecord;
	public $discardRecord;

	function __construct()
	{
		@parent ::__construct();
		

		$this->load->model("Dbcommon","cm");
		
		 $this->newRecord = $this->cm->get_new_record('application_job','0','application_status');	
		 $this->activeRecord = $this->cm->get_new_record('application_job','1','application_status');
		 $this->postponeRecord = $this->cm->get_new_record('application_job','3','application_status');
		 $this->confirmRecord = $this->cm->get_new_record('application_job','2','application_status');
		 $this->discardRecord = $this->cm->get_new_record('application_job','4','application_status');


	}
	
	public function jobApplication()
	{

	    if(!empty($this->input->get('status')))
	    {

    	    $sts = $this->input->get('status');
    	    $display['appli_sts'] = $sts;
    	  
	    }
	    else
	    {
	        $display['appli_sts'] = "inactive";
	    }
	    if(!empty($this->input->get('action')) && !empty($this->input->get('id')))
		{
			echo $id=$this->input->get('id');
			if($this->input->get('action')=="discard")
			{
			    if($this->input->get('discard')==0)
			    {
			        $st['discard']=1;
			    }
			    else
			    {
			        $st['discard']=0;
			    }
				$re = $this->cm->update_data("application_job",$st,"application_id",$id);	
				if($re)
				{
					redirect('FormController/jobApplication');	
				}
			}
			else if($this->input->get('action')=="view")
			{
				
				$display['remarks_record'] =  $this->cm->get_remarks_id_wise('job_remarks','applications_id',$id);


				$display['select_application']=$this->cm->select_data("application_job","application_id",$id);

				 // echo "<pre>";
	    //     print_r($display['select_application']);
	    //     exit;
			
			}
		}
		
		if(!empty($this->input->post('submit_job')))
		{
		    $data = $this->input->post();
		     $data['position_for_apply']; 
		    $data['name'] = $data['fname']." ".$data['mname']." ".$data['lname'];
            $data['prefer_job_location'] = implode(",",$data['prefer_job_location']);
            $data['position_for_apply'] = implode(",",$data['position_for_apply']);
            //add remarks in 
	            $id = $data['application_id']; 
	            $user_name = $data['user_name_re'];
	            $st = $data['application_status'];
	            $rem = $data['faculty_remarks'];
	            $da =  date('d/m/Y H:i:s');

	            if($st == 0)
	            {
	            	$st1 = "Inactive";
	            }
	            else if($st == 1 )
	            {
	            	$st1 = "Active";
	            }
	            else if($st == 2)
	            {
	            	$st1 = "Cofirm";
	            }
	            else if($st == 3)
	            {
	            	$st1 = "Postpone";
	            }

	            $record1 =  array( 
				   		'applications_id'=> $id,
				   		'remarks' => $rem,
				   		'remarks_by' => $user_name,
				   		'labels' => $st1,
				   		're_date' => $da
				   );
	            $this->cm->Insert_remark_record('job_remarks',$record1);
			
             unset($data['submit_job']);
            unset($data['fname']);
            unset($data['mname']);
            unset($data['lname']);
             unset($data['application_id']);
             unset($data['faculty_remarks']);
             unset($data['user_name_re']);
               
             $re = $this->cm->update_data("application_job",$data,"application_id",$id);
             if($re)
             {
                 
                 redirect('FormController/jobApplication');
             }
		    
		}
		
		if(!empty($this->input->post('search')))
		{
			$data = $this->input->post();


			$display['application_job_all'] = $this->cm->filter_job_application("application_job",$data);
			$display['filter_branch'] = @$data['filter_branch'];	
			$display['filterName'] = @$data['filterName'];	
			$display['filter_grId'] = @$data['filter_grId'];
			$display['filter_faculty'] = @$data['filter_faculty'];
			$display['filter_demoDate_start'] = @$data['filter_demoDate_start'];
			$display['filter_demoDate_end'] = @$data['filter_demoDate_end'];
			$display['filter_position_for_apply'] = @$data['filter_position_for_apply'];
			$display['filter_prefer_job_location'] = @$data['filter_prefer_job_location'];
			$display['filter_prefer_job_location'] = @$data['filter_prefer_job_location'];
			$display['filter_applicationId'] = @$data['filter_applicationId'];
		
			
		}
		else
		{
	    	
	    	echo "<pre>";
	    	print_r($_SESSION);
	    	exit;
	        $display['application_job_all'] = $this->cm->view_all_job_application("application_job");
	        // echo "<pre>";
	        // print_r($display['application_job_all']);
	        // exit;
		}
	    


	    $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
	    $display['area_all'] = $this->cm->view_all("area");
	    $display['jobtype_all'] = $this->cm->view_all("jobtype");
	    $display['branch_all'] = $this->cm->view_all("branch");
		
		$update['upd_faculty'] = $this->cm->view_all("faculty");

		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");	
		
		 $update['newRecord'] =  $this->newRecord;
		 $update['activeRecord'] = $this->activeRecord;
		 $update['postponeRecord'] = $this->postponeRecord;
		 $update['confirmRecord'] = $this->confirmRecord;
		 $update['discardRecord'] = $this->discardRecord;

		$this->load->view('header',$update);
		$this->load->view('application_job',$display);
	}

	public function managementForm()
	{
		// @$user_permission =  explode(",",$_SESSION['user_permission']); 
		// if(in_array("Single Course=1",$user_permission) || $_SESSION['logtype']=="Super Admin") {
		if(!empty($this->input->get('action')) && !empty($this->input->get('id')))
		{
			$id=$this->input->get('id');
			if($this->input->get('action')=="delete")
			{
			    
				$re=$this->cm->delete_data("form_list","form_id",$id);
				if($re)
				{
					redirect('FormController/managementForm');	
				}
			}
			else if($this->input->get('action')=="edit")
			{
				$display['select_form']=$this->cm->select_data("form_list","form_id",$id);
			}
		}
		
		if(!empty($this->input->post('submit')))
		{
			$data = $this->input->post();
			unset($data['update_id']);
			unset($data['submit']);


			if($_FILES['form_file']['name']!="")
			{
					
					$config['allowed_types'] = "*";
					$config['upload_path'] = FCPATH."dist/signsheet/";
					$new_name = time().$_FILES["form_file"]['name'];
					$config['file_name'] = $new_name;
					
					$this->load->library('upload');
					$this->upload->initialize($config);
					
					if($this->upload->do_upload('form_file'))
					{
						 $imagedata = $this->upload->data();
						
						 $data['form_file'] = $imagedata['file_name'];
						
					}
					else
					{
						
						$display['msgp'] = "image not uploaded";	
					}

					
			}
			

			
					if(!empty($this->input->post('update_id')))
					{
						$id = $this->input->post('update_id');
						$ccrr = $this->cm->select_data("form_list","form_id",$id);
						if($_FILES['form_file']['name']!="")
						{
							$filess=FCPATH."dist/signsheet/".$ccrr->form_file;
							@unlink($filess);
						}


						$re = $this->cm->update_data("form_list",$data,"form_id",$id);	
					}
					else
					{
					    
						        $re = $this->cm->insert_data("form_list",$data);
            		   
					}
					if(@$re)
					{
						redirect('FormController/managementForm');	
					}
			
		}
		
	
		$display['form_all'] = $this->cm->view_all("form_list");
		
		$update['upd_faculty'] = $this->cm->view_all("faculty");	
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");	
		
		$this->load->view('header',$update);
		$this->load->view('management_form',$display);
	}
	

	public function records_remarks()
	{
		 $faculty12 		=  $this->input->post('faculty_assign');
		 $app_id 			=  $this->input->post('application_id');
		 $faculty_assign	=  isset($faculty12)?$faculty12:"";
		 $remarks_id 		=  $this->input->post('remarks_id');
		 $user_name_re 		=  $this->input->post('user_name_re');
		 $remarks_label 	=  $this->input->post('remarks_label');
		 $rem_date			=  $this->input->post('date1');

					$record =  array( 
				   		'applications_id'=> $app_id,
				   		'remarks' => $remarks_id,
				   		'remarks_by' => $user_name_re,
				   		'labels' => $remarks_label,
				   		're_date' => $rem_date,
				   		'faculty_assign' => $faculty_assign
				   );

			// $data =  array('');
			 if($remarks_label ==  'Discart')
			 {
 					$data = array('discard'=> 1);
 					$this->cm->update_data("application_job",$data,"application_number",$app_id);
			 }
			 else if($remarks_label == 'New')
			 {
			 	    $data =  array('application_status'=> 0);
			 	    $this->cm->update_data("application_job",$data,"application_number",$app_id);
			 }
			 else if($remarks_label == 'Active')
			 {
			 	   $data =  array('application_status'=> 1);
			 	   $this->cm->update_data("application_job",$data,"application_number",$app_id);
			 }
			 else if($remarks_label == 'Postpone')
			 {
			 		$data =  array('application_status'=> 3);
			 		$this->cm->update_data("application_job",$data,"application_number",$app_id);
			 }
			 else if($remarks_label == 'Confirm')
			 {
			 		$data =  array('application_status'=> 2);
			 		$this->cm->update_data("application_job",$data,"application_number",$app_id);
			 }


			 
			  
           


				$num =  $this->cm->check_remarks_alra('job_remarks',$remarks_id);
				if(@$num==0)
				{
				   $assign_array =  array('assign_faculty'=>$faculty_assign);
				   $this->cm->Insert_remark_record('job_remarks',$record);
$this->cm->Update_remark_record('application_job',$assign_array,'application_number',$app_id);

				   $this->session->set_flashdata('remark_add',"Remarks Add Successfully");
				   $display['remarks_job'] = "Remarks Add Successfully";
				}
				else
				{
					// $this->session->set_flashdata('remark_add',"Remarks Already Added");
					$display['remarks_job'] = "Remarks Already Added";
				} 
				$display['remarks_record'] =  $this->cm->get_remarks_id_wise('job_remarks','applications_id',$app_id);
				$this->load->view('ajax_remarks_record',$display);
	}


	public function get_pop_student_record()
	{
		$app_id = $this->input->post('id');
		$data['st_record'] = $this->cm->get_app_wise_record('application_job',$app_id,'application_id');
		// echo "<pre>";
		 $appl_no = $data['st_record']->application_number;		
		 $data['student_remakrs'] = $this->cm->get_remarks_student_wise('job_remarks','applications_id',$appl_no);
		
		$this->load->view('ajax_get_popup',$data);
	}
		
}
	
?>