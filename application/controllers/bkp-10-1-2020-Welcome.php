<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	function __construct()
	{
		@parent ::__construct();
	
		$this->load->model("Dbcommon","cm");
		$this->load->model("EnquiryModal","enq");
	
		$all_demo_list = $this->cm->view_all_cngs("demo");
		date_default_timezone_set("Asia/Calcutta");
		$cdate = date('Y-m-d');

		
		
		
		foreach($all_demo_list as $demo)
		{
		    if($demo->demoStatus==2 || $demo->demoStatus==4)
		    {
		        $ldate = explode("to",@$demo->leaveDate);
		       
		        if(!empty($ldate[1]))
		        {
		            if(@$ldate[1]==$cdate)
		            {
		                $cs['demoStatus']=0;
		                $this->cm->update_data("demo",$cs,"demo_id",$demo->demo_id);	
		                
		            }
		        }
		    }
		}
		
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	
	public function login()
	{

		if(@$_SESSION['domain']=="admin")
		{
			
			redirect('welcome');	
		}

		$msgs['msg'] = "";
		if(!empty($this->input->post('email')) && !empty($this->input->post('password')))
		{
			
			$check_admin = $this->cm->check_user("admin",$this->input->post('email'),$this->input->post('password'));
			$check_user = $this->cm->check_user("user",$this->input->post('email'),$this->input->post('password'));
			$check_faculty = $this->cm->check_user("faculty",$this->input->post('email'),$this->input->post('password'));
			
			$check_ip = $this->cm->view_all("network_ip");
			
			if(!empty($check_admin->email) && !empty($check_admin->password))
			{
				
				$this->session->set_userdata("domain","admin");
				$this->session->set_userdata("user_id",$check_admin->id);
				$this->session->set_userdata("user_name",$check_admin->name);
				$this->session->set_userdata("user_email",$check_admin->email);
				$this->session->set_userdata("user_image",$check_admin->image);
				$this->session->set_userdata("user_last_seen",$check_admin->timestamp);
				$this->session->set_userdata("logtype",$check_admin->logtype);
				
				$userdata = [

							'id'  => $check_admin->id,

							'username'  => $check_admin->name,

							'email'     => $check_admin->email,

							'name'     => $check_admin->name,

							'role' => $check_admin->logtype,

							'last_logged' =>  $check_admin->lastlogged,

							'created' =>  $check_admin->created, 

							'logged_in' => 'TRUE'

					];
                $this->session->set_userdata('Admin',$userdata);
				redirect('welcome');
				
			}
			else if(!empty($check_user->email) && !empty($check_user->password))
			{
			    $brns = explode(",",$check_user->branch_ids);
			    $valid_ip=true;
				foreach($check_ip as $ip) {
				    if( in_array($ip->branch_id,$brns) && $ip->address_ip==$this->input->post('my_ip') ) {
				        $valid_ip = true;
				    }
				}
				
				if($valid_ip==true)
				{
        				$this->session->set_userdata("domain","admin");
        				$this->session->set_userdata("user_id",$check_user->user_id);
        				$this->session->set_userdata("logtype",$check_user->logtype);
        				$this->session->set_userdata("branch_ids",$check_user->branch_ids);
        				$this->session->set_userdata("department_id",$check_user->department_ids);
        				$this->session->set_userdata("user_name",$check_user->name);
        				$this->session->set_userdata("user_email",$check_user->email);
        				$this->session->set_userdata("user_image",$check_user->image);
        				$this->session->set_userdata("user_permission",$check_user->permission);
        				$this->session->set_userdata("user_last_seen",$check_user->timestamp);
        				
        				$userdata = [
        
        							'id'  => $check_user->user_id,
        
        							'username'  => $check_user->name,
        
        							'email'     => $check_user->email,
        
        							'name'     => $check_user->name,
        
        							'role' => $check_user->logtype,
        
        							'last_logged' =>  $check_user->lastlogged,
        
        							'created' =>  $check_user->created, 
        
        							'logged_in' => 'TRUE'
        
        					];
                        $this->session->set_userdata('Admin',$userdata);
        				
        				
        				
        					redirect('welcome');
						
				}
				else
				{
				    $msgs['msg'] = "you are not authorized to access. because your ip address doesn't match"; 
				}
				
			}
			else if(!empty($check_faculty->email) && !empty($check_faculty->password))
			{
				$brans = $this->cm->view_all("branch");
				$courses = $this->cm->view_all("course");
				$packages = $this->cm->view_all("package");
				$b_ids = explode(",",$check_faculty->branch_ids);
				@$c_ids = explode(",",@$check_faculty->course_ids);
				@$p_ids = explode(",",@$check_faculty->package_ids);
				$b_name="";
				for($i=0;$i<sizeof($b_ids);$i++)
				{   
				    foreach($brans as $val)
				    {
				        if($val->branch_id==$b_ids[$i]) {
				            if($b_name=="") { $b_name=$val->branch_name; } else {  $b_name=$b_name.",".$val->branch_name; }  }
				    }
				}
				$c_name="";
				   
				    foreach($courses as $val1)
				    {
				        if(in_array($val1->course_id,$c_ids)) {
				            
				            if($c_name=="") { $c_name=$val1->course_name; } else {  $c_name=$c_name.",".$val1->course_name; }  
				            
				        }
				    }
				
				$p_name="";
				   
				    foreach($packages as $val2)
				    {
				        if(in_array($val2->package_id,$p_ids)) {
				            
				            if($p_name=="") { $p_name=$val2->package_name; }else {  $p_name=$p_name.",".$val2->package_name; }  
				            
				        }
				    }
				
				
				
				$brns = explode(",",$check_faculty->branch_ids);
			    $valid_ip=true;
				foreach($check_ip as $ip) {
				    if( in_array($ip->branch_id,$brns) && $ip->address_ip==$this->input->post('my_ip') ) {
				        $valid_ip = true;
				    }
				}
				
				if($valid_ip==true)
				{
        				$this->session->set_userdata("domain","admin");
        				$this->session->set_userdata("user_id",$check_faculty->faculty_id);
        				$this->session->set_userdata("user_name",$check_faculty->name);
        				$this->session->set_userdata("user_email",$check_faculty->email);
        				$this->session->set_userdata("logtype",$check_faculty->logtype);
        				$this->session->set_userdata("branch_ids",$check_faculty->branch_ids);
        				$this->session->set_userdata("course_ids",$c_name);
        				$this->session->set_userdata("package_ids",$p_name);
        				$this->session->set_userdata("branch_name",$b_name);
        				$this->session->set_userdata("department_id",$check_faculty->department_id);
        				$this->session->set_userdata("user_last_seen",$check_faculty->timestamp);
        				$this->session->set_userdata("user_image",$check_faculty->image);
        				$this->session->set_userdata("user_permission",$check_faculty->permission);
        				
        				$userdata = [
        
        							'id'  => $check_faculty->faculty_id,
        
        							'username'  => $check_faculty->name,
        
        							'email'     => $check_faculty->email,
        
        							'name'     => $check_faculty->name,
        
        							'role' => $check_faculty->logtype,
        
        							'last_logged' =>  $check_faculty->lastlogged,
        
        							'created' =>  $check_faculty->created, 
        
        							'logged_in' => 'TRUE'
        
        					];
                        $this->session->set_userdata('Admin',$userdata);
                        
        				redirect('welcome');
				}
				else
				{
				    $msgs['msg'] = "you are not authorized to access. because your ip address doesn't match"; 
				}
				
			}
			else
			{
				$msgs['msg'] = "Invalid Email or Password"; 
			}
			
		}
		
		
		$this->load->view('login',$msgs);
	}
	public function logout()
	{
		
		date_default_timezone_set("Asia/Kolkata");
		$id = $_SESSION['user_id'];
		$data['timestamp']  =  date('Y-m-d H:i:s');
		if($_SESSION['logtype']=="Super Admin")
		{
			$this->cm->update_data("admin",$data,"id",$id);	
		}
		else if($_SESSION['logtype']=="Faculty")
		{
			
			$this->cm->update_data("faculty",$data,"faculty_id",$id);	
		}
		else
		{
			$this->cm->update_data("user",$data,"user_id",$id);	
		}
		
		session_destroy();
		redirect('welcome/login');	
	}
	public function index()
	{
	   
	  
	       	date_default_timezone_set("Asia/Calcutta");
	       $ctimetamp =  date('Y-m-d h:i:s a');
	  
	    
	    
	    if(!empty($_SESSION['sts_msg']))
	    {
	        $display['sts_msg'] = $_SESSION['sts_msg'];
	        unset($_SESSION['sts_msg']);
	    }
	    
		if(!empty($this->input->post('take_attendance')))
		{
		   
	        
	   
			$data = $this->input->post();
			$demo_id = $data['demo_id'];
			$select_demo=$this->cm->select_data("demo","demo_id",$demo_id);
			$date = $data['attDate'];
			$flag=1;
			$all_att = explode("&&",$select_demo->attendance);
			
			for($i=0;$i<sizeof($all_att);$i++)
			{
				$att = explode("/",$all_att[$i]);
				if($date==$att[0])
				{
					$flag = 0;
				}
			}
			
			if(@$data['demoStatus']==1)
			{
			    $insert['demoStatus'] = $data['demoStatus'];
			    $insert['statusChangeDate'] =  date("Y-m-d");
			    
			    $qu=$this->cm->update_data("demo",$insert,"demo_id",$demo_id);	
			    if($qu)
			    {
			        $this->session->set_userdata("sts_msg","Demo done successfully");
			    }
			}
			
			if(!empty($data['reason']) && @$data['reason']!="" && $data['demoStatus']=="2" || $data['demoStatus']=="3" || $data['demoStatus']=="4")
			{
			    
			   $insert['demoStatus'] = $data['demoStatus'];
			   $insert['statusChangeDate'] =  date("Y-m-d");
			   if($data['demoStatus']=="3")
			   {
			       $insert['cancel_reason'] =  $this->input->post('cancel_reason');
			       $data['reason'] = "Demo Cancel / ".$data['reason'];
			   }
			    if(!empty($data['leave_from_date']) && !empty($data['leave_to_date']) && $data['demoStatus']=="2")
			    {
			        $insert['leaveDate'] = $data['leave_from_date']."to".$data['leave_to_date'];
			        $data['reason'] = "Demo Leave : ".$insert['leaveDate']." / ".$data['reason'];
			    }
			    if(!empty($data['leave_from_date']) && !empty($data['leave_to_date']) && $data['demoStatus']=="4")
			    {
			        $insert['leaveDate'] = $data['leave_from_date']."to".$data['leave_to_date'];
			        $data['reason'] = "Demo Confusion : ".$insert['leaveDate']." / ".$data['reason'];
			    }
			    
			    if($select_demo->reason=="")
    			{
    				  $insert['reason'] = $date."|/|".$data['reason']."|/|".$_SESSION['user_name']."|/|".$ctimetamp;
        		}
        		else
        		{
        			  $insert['reason'] = $select_demo->reason."&&".$date."|/|".$data['reason']."|/|".$_SESSION['user_name']."|/|".$ctimetamp;
        		}
			    $qu=$this->cm->update_data("demo",$insert,"demo_id",$demo_id);	
    			if($qu)
			    {
			        if($data['demoStatus']=="2" && !empty($data['leave_from_date']) && !empty($data['leave_to_date']) && !empty($data['reason']) && @$data['reason']!="")
			        {
			            $this->session->set_userdata("sts_msg","Demo Student has been added to the leave list");
			        }
			        else if($data['demoStatus']=="4" && !empty($data['leave_from_date']) && !empty($data['leave_to_date']) && !empty($data['reason']) && @$data['reason']!="")
			        {
			            $this->session->set_userdata("sts_msg","Demo Student has been added to the Confusion list");
			        }
			        else
			        {
			            $this->session->set_userdata("sts_msg","Demo Cancel successfully");
			        }
			    }
				
			}
			    
    			if($flag==1)
    			{
    				$insert['demoStatus'] = $data['demoStatus'];
    				$insert['statusChangeDate'] =  date("Y-m-d");
    				if($data['att']=="A")
    				{
    				    if($select_demo->reason=="")
    				    {
    					    $insert['reason'] = $date."|/|".$data['reason']."|/|".$_SESSION['user_name']."|/|".$ctimetamp;
        				}
        				else
        				{
        					$insert['reason'] = $select_demo->reason."&&".$date."|/|".$data['reason']."|/|".$_SESSION['user_name']."|/|".$ctimetamp;
        				}
    				}
    				if($select_demo->attendance=="")
    				{
    					$insert['attendance'] = $date."/".$data['att']."/".$_SESSION['user_name']."/".$ctimetamp;
    				}
    				else
    				{
    					$insert['attendance'] = $select_demo->attendance."&&".$date."/".$data['att']."/".$_SESSION['user_name']."/".$ctimetamp;
    				}
    				
    				$re = $this->cm->update_data("demo",$insert,"demo_id",$demo_id);	
    			    if($re) {   redirect('welcome'); }
    				
    			}
    			else
    			{
    			    if(empty($qu))
    			    {
    			        if($_SESSION['logtype']=="Faculty")
    			        {
    				        $display['msg']="Already Taken Attendance";	
    			        }
    			        else
    			        {
    			            $all_att = explode("&&",$select_demo->attendance);
			                $edit_att = "";
                			for($i=0;$i<sizeof($all_att);$i++)
                			{
                				$att = explode("/",$all_att[$i]);
                				if($date==$att[0])
                				{
                				    if($edit_att=="")
                				    {
                				        $edit_att=$date."/".$data['att']."/".$_SESSION['user_name']."/".$ctimetamp;
                				    }
                				    else
                				    {
                				        $edit_att=$edit_att."&&".$date."/".$data['att']."/".$_SESSION['user_name']."/".$ctimetamp;
                				    }
                					
                				}
                				else
                				{
                				    if($edit_att=="")
                				    {
                				        $edit_att = $all_att[$i];
                				    }
                				    else
                				    {
                				        $edit_att = $edit_att."&&".$all_att[$i];
                				    }
                				}
                			}
                			
                			if($data['att']=="A")
            				{
            				    if($select_demo->reason=="")
            				    {
            					    $insert1['reason'] = $date."|/|".$data['reason']."|/|".$_SESSION['user_name']."|/|".$ctimetamp;
                				}
                				else
                				{
                					$insert1['reason'] = $select_demo->reason."&&".$date."|/|".$data['reason']."|/|".$_SESSION['user_name']."|/|".$ctimetamp;
                				}
            				}
                		
                			$insert1['attendance'] = $edit_att; 
                			$res1 = $this->cm->update_data("demo",$insert1,"demo_id",$demo_id);	
    			            if($res1) {   redirect('welcome'); }
                			
    			        }
    			    }
    			    else
    			    {
    			        redirect('welcome');
    			        
    			    }
    			}
    			
		}
		
		
		if(!empty($this->input->post('search')))
		{
			$data = $this->input->post();
			$display['demo_all'] = $this->cm->filter_demo("demo",$data);
			$display['filter_branch'] = @$data['filter_branch'];	
			$display['filter_department'] = @$data['filter_department'];	
			$display['filter_course'] = @$data['filter_course'];
			$display['filter_faculty'] = @$data['filter_faculty'];
			$display['filter_demoDate_start'] = @$data['filter_demoDate_start'];
			$display['filter_demoDate_end'] = @$data['filter_demoDate_end'];
			$display['filter_demoName'] = @$data['filter_demoName'];
			$display['filter_demoId'] = @$data['filter_demoId'];
			$display['filter_phoneNo'] = @$data['filter_phoneNo'];
		
			
		}
		else
		{
			
			$display['demo_all'] = $this->cm->view_all_demo_running("demo");
			
		}
			
			
		$update['upd_faculty'] = $this->cm->view_all("faculty");	
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");	
		
		$display['upd_faculty'] = $this->cm->view_all("faculty");	
		$display['upd_branch'] = $this->cm->view_all("branch");
		$display['upd_see'] = $this->cm->check_update("demo");
		
		$display['department_all'] = $this->cm->view_all("department");
		$display['branch_all'] = $this->cm->view_all("branch");
		$display['course_all'] = $this->cm->view_all("course");
		$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
		$display['reason_list'] = $this->cm->view_all("cancel_reason_list");
		
		
		
		
		$this->load->view('header',$update);
		$this->load->view('index',$display);
		
	}
	
	
	public function addemo()
	{
	    date_default_timezone_set("Asia/Calcutta"); 
	   
		if(!empty($this->input->post('action')) && !empty($this->input->post('id')))
		{
			$id=$this->input->post('id');
			if($this->input->post('action')=="edit")
			{
				$display['select_demo']=$this->cm->select_data("demo","demo_id",$id);
			}
		}
		
		
		if(!empty($this->input->post('submit')))
		{
			$data = $this->input->post();
			
			$ins_data['name']=$data['name'];
			$ins_data['demoDate']=$data['demoDate'];
			$ins_data['mobileNo']=$data['mobileNo'];
			$ins_data['branch_id']=$data['branch_id'];
			$ins_data['department_id']=$data['department_id'];
			if(!empty($data['course_type']))
			{
			    $ins_data['course_type']=$data['course_type'];
			}
			$ins_data['faculty_id']=$data['faculty_id'];
			$select_faculty=$this->cm->select_data("faculty","faculty_id",$ins_data['faculty_id']);

			$ins_data['fromTime']=$data['fromTime'];
			$ins_data['toTime']=$data['toTime'];
			
		
			
	        
	        if(@$data['course_type']=="Single Course")
	        {
	        	@$cccccc = @$data['courses'];
	            if(!empty($data['courses']))
	            {
	                $ins_data['courseName']=implode(",",$data['courses']);
	            }
	            else
	            {
	                $ins_data['courseName'] = $data['courseName'];
	                
	            }
	        }
	        else if(@$data['course_type']=="Package")
	        {
	        	$cccccc = $data['packageName'];
	            $ins_data['packageName']=$data['packageName'];
	            $pk=$this->cm->select_data("package","package_name",$data['packageName']);
        		$course_all= $this->cm->view_all("course");
        		$pk_course = explode(",",$pk->course_ids);
        		$pkgc = "";
        		foreach($course_all as $row) { if($row->status==0) {
        		    if(in_array($row->course_id,$pk_course)) {
        		        
        		        $pkgc=$pkgc.",".$row->course_name;
        	    } } }
        	    
        	 $ins_data['courseName']= trim($pkgc,",");
	            
	        }
		
		     
			   
			   
		
			
			
					if(!empty($this->input->post('update_id')))
					{
						
						$id = $this->input->post('update_id');
						$re = $this->cm->update_data("demo",$ins_data,"demo_id",$id);	
						if($re) { 


						    $this->session->set_userdata("msg_upd","record updated successfully");
						    redirect('welcome/viewDemo/as'); }
							
					}
					else
					{
					        $ins_data['startingCourse'] = $data['courseName'];
							$ins_data['addDate'] = date("Y-m-d h:i:sa"); 
							$ins_data['addBy'] = $_SESSION['user_name'];
							
							date_default_timezone_set("Asia/Kolkata");
                    	    $ins_data['last_update']  =  date('Y-m-d H:i:s');

                    	    $select_demo2=$this->cm->select_data("demo","mobileNo",$ins_data['mobileNo']);
                    	    if(!empty($select_demo2->demo_id))
                    	    {
								$display['exist_status'] = true;
								$display['msg'] = "Demo Already exists with ".$ins_data['mobileNo'];
								$display['showid'] = $select_demo2->demo_id;
                    	    }
                    	    else
                    	    {

								$re = $this->cm->insert_demo("demo",$ins_data);
								
									$ins_remark['demo_id'] = $re->demo_id;
								$ins_remark['demo_remark_date'] = date("Y-m-d h:i:sa"); 
								$ins_remark['demo_remark_comment'] = $data['remarks'];
								$ins_remark['demo_remark_by'] = $_SESSION['user_name'];
								$this->enq->insert_data("demo_remark",$ins_remark);
								if($re) {
									if(!empty($select_faculty->phone))
										{
											$facultymsg = "Demo Name :".$ins_data['name']."   DemoDate :".$ins_data['demoDate']."    Time :".$ins_data['fromTime']."    Course :".$cccccc;
				                           $ch = curl_init();
				                            $url = 'http://dndsms.vishawebsolutions.com/api/mt/SendSMS?user=hitesh-RNW&password=Hitz9898&senderid=RNWEDU&channel=Trans&DCS=0&flashsms=0&number='.$select_faculty->phone.'&text='.$facultymsg.'&route=15';
				                            curl_setopt($ch, CURLOPT_URL, $url);
				                            curl_setopt($ch, CURLOPT_FAILONERROR, true); // Required for HTTP error codes to be reported via our call to curl_error($ch)
				                            @curl_exec(@$ch);
				                            if (@curl_error(@$ch)) {
				                             //   echo $error_msg = curl_error($ch);
				                            }
				                            @curl_close(@$ch);
			                           
										}
								        

								     	$display['msg'] = "Demo added successfully";
								     	$display['showid'] = "Demo ID = ".$re->demo_id;
								     }
							 }
					}
					
			
			
		}
		$display['course_all'] = $this->cm->view_all_course("course");
		$display['department_all'] = $this->cm->view_all("department");
		$display['branch_all'] = $this->cm->view_all("branch");
		$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
		
		
		$update['upd_faculty'] = $this->cm->view_all("faculty");	
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");	
		
		$this->load->view('header',$update);
		$this->load->view('addemo',$display);
	}
	
	public function filter_course()
	{
		$department_id = $this->input->post('department_id');	
		$course_all=$this->cm->filter_data("course","department_id",$department_id);
		?>
    		<div class="input-group">
    				<select class="form-control select2" required id="courseName" name="courseName" onChange="select_faculty()" style="width: 100%;">
                          <option value="">Select Course</option>
                           <?php foreach($course_all as $row) { if($row->status==0) { ?>
                          <option value="<?php echo $row->course_name; ?>"><?php echo $row->course_name; ?></option>
                         	<?php  } } ?>
                        </select>     
                        <span class="input-group-addon"><Button type="button" onclick="addCourse()"><i class="glyphicon glyphicon-plus"></i></button></span>
            </div>
        <?php
	}
	
	public function filter_package_course()
	{
		$package_name = $this->input->post('package_name');	
		$pk=$this->cm->select_data("package","package_name",$package_name);
		$course_all= $this->cm->view_all("course");
		$pk_course = explode(",",$pk->course_ids);
		?>
		    <div id="sdc">
    		        <label for="inputPassword3" class="col-sm-2 control-label">Start  Demo Course*</label>
    		            <div class="col-sm-10">
            				<select class="form-control select2" required id="courseName" name="courseName" onChange="select_faculty()" style="width: 100%;">
                                  <option value="">Select Stating Course</option>
                                   <?php foreach($course_all as $row) { if($row->status==0) {
                                   if(in_array($row->course_id,$pk_course)) { ?>
                                  <option value="<?php echo $row->course_name; ?>"><?php echo $row->course_name; ?></option>
                                 	<?php }  } } ?>
                                </select> 
                        </div>
            </div>           
            
        <?php
	}
	
	public function filter_package()
	{
		$department_id = $this->input->post('department_id');	
		$package_all=$this->cm->filter_data("package","department_id",$department_id);
		?>
				<select class="form-control select2" required id="packageName" name="packageName" onChange="select_package_course()" style="width: 100%;">
                      <option value="">Select Package</option>
                       <?php foreach($package_all as $row) { if($row->status==0) {   ?>
                      <option value="<?php echo $row->package_name; ?>"><?php echo $row->package_name; ?></option>
                     	<?php } } ?>
                    </select>        
        <?php
	}
	
	public function filter_package_demo()
	{
		$department_id = $this->input->post('department_id');	
		$package_all=$this->cm->filter_data("package","department_id",$department_id);
		?>
				<select class="form-control select2" required id="packageName" name="packageName" onChange="select_package_course()" style="width: 100%;">
                      <option value="">Select Package</option>
                       <?php foreach($package_all as $row) { if($row->status==0) {   ?>
                      <option value="<?php echo $row->package_name; ?>"><?php echo $row->package_name; ?></option>
                     	<?php } } ?>
                    </select>        
        <?php
	}
	
	public function filter_depart()
	{
		$branch_id = $this->input->post('branch_id');	
		$department_all= $this->cm->view_all("department");
		$select_branch=$this->cm->select_data("branch","branch_id",$branch_id);
	
		@$depart = explode(",",@$select_branch->department_ids);
			$no = sizeof($depart);
		?>
			 <select class="form-control select2" required name="department_id" id="department" style="width: 100%;" onChange="selectcourse()">
                      <option>Select Department</option>
                     
                      
                       <?php  for($i=0;$i<sizeof($depart);$i++)
                       {
                       foreach($department_all as $row) {
                           if($depart[$i]==$row->department_id)
                           {
                       ?>
                      <option <?php if(@$no==1) { echo "selected"; }  ?>  <?php if(@$select_demo->department_id==$row->department_id) { echo "selected"; } ?>   value="<?php echo $row->department_id; ?>"><?php echo $row->department_name; ?></option>
                     	<?php } } } ?>
                    </select>       
        <?php
	}
	
	public function checkTime()
	{
		$faculty_id = $this->input->post('faculty_id');	
	
		$display['select_faculty']=$this->cm->select_data("faculty","faculty_id",$faculty_id);
		$display['all_time'] = $this->cm->view_all("time");
		$display['demo_all'] = $this->cm->view_all_demo_running("demo");
		$display['startingCourse'] = $this->input->post('courseName');
		$display['demo_date'] = $this->input->post('demo_date');
	
		$this->load->view('check_time',$display);
		
	}

	public function demo_download($vs)
	{
		$display['viewStatus'] = $vs;
		if(!empty($this->input->post('search')))
		{
			$data = $this->input->post();
			$display['demo_all'] = $this->cm->filter_demo("demo",$data);
			$display['filter_branch'] = @$data['filter_branch'];	
			$display['filter_department'] = @$data['filter_department'];	
			$display['filter_faculty'] = @$data['filter_faculty'];	
			$display['filter_course'] = @$data['filter_course'];	
			$display['filter_demoStatus'] = @$data['filter_demoStatus'];
			$display['filter_demoDate_start'] = @$data['filter_demoDate_start'];
			$display['filter_demoDate_end'] = @$data['filter_demoDate_end'];
			$display['filter_demoName'] = @$data['filter_demoName'];
			$display['filter_demoId'] = @$data['filter_demoId'];
			$display['filter_cancel_reason'] = @$data['filter_cancel_reason'];
			
		}
		$display['department_all'] = $this->cm->view_all("department");
		$display['branch_all'] = $this->cm->view_all("branch");
		$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
		$display['course_all'] = $this->cm->view_all("course");
		$display['reason_list'] = $this->cm->view_all("cancel_reason_list");
		 $display['all_remarks'] = $this->enq->view_all("demo_remark");
		$this->load->view('demo_download',$display);
	}
	
	
	
	public function viewDemo($vs)
	{
	    
        
	     $display['viewStatus'] = $vs;
	    
	    if(!empty($_SESSION['sts_msg']))
	    {
	        $display['sts_msg'] = $_SESSION['sts_msg'];
	        unset($_SESSION['sts_msg']);
	    }
	    
		if(!empty($this->input->get('action')) && !empty($this->input->get('id')))
		{
			$id=$this->input->get('id');
			if($this->input->get('action')=="delete")
			{
			    if($this->input->get('status')==0)
			    {
			        $st['discard']=1;
			    }
			    if($this->input->get('status')==1)
			    {
			        $st['discard']=0;
			    }
			    
				$re=$this->cm->update_data("demo",$st,"demo_id",$id);
				if($re)
				{
					redirect('welcome/viewDemo/'.$vs);	
				}
			}
			
		}
		
		if(!empty($this->input->post('search')))
		{
			$data = $this->input->post();
			$display['demo_all'] = $this->cm->filter_demo("demo",$data);
			$display['filter_branch'] = @$data['filter_branch'];	
			$display['filter_department'] = @$data['filter_department'];	
			$display['filter_faculty'] = @$data['filter_faculty'];	
			$display['filter_course'] = @$data['filter_course'];	
			$display['filter_demoStatus'] = @$data['filter_demoStatus'];
			$display['filter_demoDate_start'] = @$data['filter_demoDate_start'];
			$display['filter_demoDate_end'] = @$data['filter_demoDate_end'];
			$display['filter_demoName'] = @$data['filter_demoName'];
			$display['filter_demoId'] = @$data['filter_demoId'];
			$display['filter_phoneNo'] = @$data['filter_phoneNo'];
			$display['filter_cancel_reason'] = @$data['filter_cancel_reason'];
			
		}
		else if($vs=="rd" || $vs=="ord" || $vs=="ld" || $vs=="cfd")
		{
			if($vs=="rd" || $vs=="ord") {  $dst = 0;  }
			if($vs=="ld") {  $dst = 2;  }
			if($vs=="cfd") {  $dst = 4;  }
			
		    $display['demo_all'] = $this->cm->view_all_demo_status_wise("demo",$dst);
		}
		else
		{
			
			$display['demo_all'] = $this->cm->view_all_demo_limit("demo");
			
		}
		
		if(!empty($_SESSION['msg_upd']))
		{
		    $display['msg'] =$_SESSION['msg_upd'];
		    
		    
		    unset($_SESSION['msg_upd']);
		    
		}
		
			
		$display['department_all'] = $this->cm->view_all("department");
		$display['branch_all'] = $this->cm->view_all("branch");
		$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
		$display['course_all'] = $this->cm->view_all("course");
		$display['reason_list'] = $this->cm->view_all("cancel_reason_list");
		
		
		$update['upd_faculty'] = $this->cm->view_all("faculty");	
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");	
		
		$this->load->view('header',$update);
		$this->load->view('viewdemo',$display);
	}
	
	public function changeDemoStatus()
	{
	    date_default_timezone_set("Asia/Calcutta");
	       $ctimetamp =  date('Y-m-d h:i:s a');
	    if($this->input->post('change_status'))
	    {
	        
	        $demo_id = $this->input->post('demo_id');
	        $select_demo=$this->cm->select_data("demo","demo_id",$demo_id);
    		$data = $this->input->post();
    		$data['statusChangeDate'] =  date("Y-m-d");
    		
    		$date = date("Y-m-d");
		    $vs = $data['vs'];
	        if(!empty($data['reason']) && @$data['reason']!="" && $data['demoStatus']=="2" || $data['demoStatus']=="3" || $data['demoStatus']=="4")
			{
			    
			   $insert['demoStatus'] = $data['demoStatus'];
			   $insert['statusChangeDate'] =  date("Y-m-d");
			   if($data['demoStatus']=="3")
			   {
			       $insert['cancel_reason'] =  $this->input->post('cancel_reason');
			      
			       $data['reason'] = "Demo Cancel / ".$data['reason'];
			   }
			    if(!empty($data['leave_from_date']) && !empty($data['leave_to_date']) && $data['demoStatus']=="2")
			    {
			        $insert['leaveDate'] = $data['leave_from_date']."to".$data['leave_to_date'];
			        $data['reason'] = "Demo Leave : ".$insert['leaveDate']." / ".$data['reason'];
			    }

			    if(!empty($data['leave_from_date']) && !empty($data['leave_to_date']) && $data['demoStatus']=="4")
			    {
			        $insert['leaveDate'] = $data['leave_from_date']."to".$data['leave_to_date'];
			        $data['reason'] = "Demo Confusion : ".$insert['leaveDate']." / ".$data['reason'];
			    }
			    
			    if($select_demo->reason=="")
    			{
    				  $insert['reason'] = $date."|/|".$data['reason']."|/|".$_SESSION['user_name']."|/|".$ctimetamp;
        		}
        		else
        		{
        			  $insert['reason'] = $select_demo->reason."&&".$date."|/|".$data['reason']."|/|".$_SESSION['user_name']."|/|".$ctimetamp;
        		}
			    
				
			}
			else if($data['demoStatus']=="1")
			{
			    $insert['demoStatus'] = $data['demoStatus'];
			}
			else if($data['demoStatus']=="0")
			{
			    $insert['demoStatus'] = $data['demoStatus'];
			}
			$qu=$this->cm->update_data("demo",$insert,"demo_id",$demo_id);	
    			if($qu)
			    {
			         $this->session->set_userdata("sts_msg","Demo Status has been Changed");
			          redirect('welcome/viewDemo/'.$vs);	
			     }
	   }
		
	}
	
	public function filter_faculty()
	{
	     $branch_id = $this->input->post('branch_id');
	    
	    if(!empty($this->input->post('course_name')))
	    {
        		$course_name = $this->input->post('course_name');
        		
        		$select_id=$this->cm->select_data("course","course_name",$course_name);
        		$faculty_all=$this->cm->view_all_faculty("faculty");
        		$course_id = $select_id->course_id;
        		$branch_all=$this->cm->view_all("branch");
        	
        		
        		?>
        				 <select class="form-control select2" required name="faculty_id" id="faculty" style="width: 100%;" onChange="selecttime()">
                              <option value="">Assign To</option>
                              <?php foreach($faculty_all as $row) { 
                                      $co = explode(",",$row->course_ids);
                                      $flag=0;
                                      for($i=0;$i<sizeof($co);$i++)
                                      {
                                          if($course_id==$co[$i])
                                          {
                                              $flag=1;
                                          }
                                      }
                                  
                                       $bns = explode(",",$row->branch_ids);
                                      
                                      $flag1=0;
                                      for($i=0;$i<sizeof($bns);$i++)
                                      {
                                          if($branch_id==$bns[$i])
                                          {
                                              $flag1=1;
                                          }
                                      }
                                  
                                  
                                  
                                  if($flag==1 && $flag1==1) {
                                      
                                      
                                      @$bids = explode(",",@$row->branch_ids);
                                       $bname="";
                                      for($i=0;$i<sizeof(@$bids);$i++)
                                        {
                                            foreach($branch_all as $val) {   
                                                if($val->branch_id==@$bids[$i]) { if($bname=="") { $bname = $bname." ".$val->branch_name;}else { $bname = $bname." & ".$val->branch_name; } }
                                            }
                                        }
                              ?>
                              <option <?php if(@$select_demo->faculty_id==$row->faculty_id) { echo "selected"; } ?>  value="<?php echo $row->faculty_id; ?>"><?php echo $row->name; ?> -  <?php echo $row->department_name; ?>  - <?php echo $bname; ?> </option>
                             	<?php  } } ?> 
                            </select>     
                <?php
        
	    }
	    
	    if(!empty($this->input->post('package_name')))
	    {
        		$package_name = $this->input->post('package_name');
        		
        		$select_id=$this->cm->select_data("package","package_name",$package_name);
        		$faculty_all=$this->cm->view_all_faculty("faculty");
        		$package_id = $select_id->package_id;
        		$branch_all=$this->cm->view_all("branch");
        	
        		
        		?>
        				 <select class="form-control select2" required name="faculty_id" id="faculty" style="width: 100%;" onChange="selecttime()">
                              <option value="">Assign To</option>
                              <?php foreach($faculty_all as $row) { 
                                  $co = explode(",",$row->package_ids);
                                  $flag=0;
                                  for($i=0;$i<sizeof($co);$i++)
                                  {
                                      if($package_id==$co[$i])
                                      {
                                          $flag=1;
                                      }
                                  }
                                  
                                  $bns = explode(",",$row->branch_ids);
                                      
                                      $flag1=0;
                                      for($i=0;$i<sizeof($bns);$i++)
                                      {
                                          if($branch_id==$bns[$i])
                                          {
                                              $flag1=1;
                                          }
                                      }
                                  
                                  
                                  if($flag==1 && $flag1==1) {
                                      
                                      
                                      @$bids = explode(",",@$row->branch_ids);
                                       $bname="";
                                      for($i=0;$i<sizeof(@$bids);$i++)
                                        {
                                            foreach($branch_all as $val) {   
                                                if($val->branch_id==@$bids[$i]) { if($bname=="") { $bname = $bname." ".$val->branch_name;}else { $bname = $bname." & ".$val->branch_name; } }
                                            }
                                        }
                              ?>
                              <option <?php if(@$select_demo->faculty_id==$row->faculty_id) { echo "selected"; } ?>  value="<?php echo $row->faculty_id; ?>"><?php echo $row->name; ?> -  <?php echo $row->department_name; ?>  - <?php echo $bname; ?> </option>
                             	<?php  } } ?> 
                            </select>     
                <?php
        
	    }
	}
	
	
	public function getReason()
	{
	    $data = $this->input->post();
	     $id = $this->input->post('demo_id');
	    if($data['status']=="cancel")
	    {
	        $reason['reason']=$data['reason'];
	       
			$this->cm->update_data("demo",$reason,"demo_id",$id);	
	        
	        
	    }
	    
	}
	
	public function demoReport()
	{
	    if(!empty($this->input->post('search')))
		{
			$data = $this->input->post();
			$display['demo_all'] = $this->cm->filter_demo("demo",$data);
			$display['filter_branch'] = @$data['filter_branch'];	
			$display['filter_department'] = @$data['filter_department'];	
			$display['filter_faculty'] = @$data['filter_faculty'];	
			$display['filter_course'] = @$data['filter_course'];	
			$display['filter_demoStatus'] = @$data['filter_demoStatus'];
			$display['filter_demoDate_start'] = @$data['filter_demoDate_start'];
			$display['filter_demoDate_end'] = @$data['filter_demoDate_end'];
			$display['filter_demoName'] = @$data['filter_demoName'];
			$display['filter'] = 1;
		}
		
		
		$display['department_all'] = $this->cm->view_all("department");
		$display['branch_all'] = $this->cm->view_all("branch");
		$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
		$display['course_all'] = $this->cm->view_all("course");	
		$this->load->view('demo_report',$display);
			
	    
	}
	
	public function analysis($stf)
	{
	    
	    $display['viewStatus'] = $stf;
	    $data = $this->input->post();
		if(@$this->input->post('search')=="linechart" && @$data['filter_branch']!="" || @$data['filter_department']!="")
			{
			       
			       if($data['filter_branch']!="" && $data['filter_department']!="")
			       {
			           $bid = $data['filter_branch'];
			            $did = $data['filter_department'];
			         
			         $display['filter_branch'] = $data['filter_branch'];   
			         $display['filter_department'] = $data['filter_department'];
			            
			           $que = "SELECT * FROM demo 
WHERE demoDate < Now() and demoDate > DATE_ADD(Now(), INTERVAL- 6 MONTH) and branch_id='$bid' and department_id='$did'";
			       }
			       else if($data['filter_branch']!="")
			       {
			           $bid = $data['filter_branch'];
			           $display['filter_branch'] = $data['filter_branch'];   
			           $que = "SELECT * FROM demo 
WHERE demoDate < Now() and demoDate > DATE_ADD(Now(), INTERVAL- 6 MONTH) and branch_id='$bid'";
			       }
			       else if($data['filter_department']!="")
			       {
			           $did = $data['filter_department'];
			           $display['filter_department'] = $data['filter_department'];
			           $que = "SELECT * FROM demo 
WHERE demoDate < Now() and demoDate > DATE_ADD(Now(), INTERVAL- 6 MONTH) and department_id='$did'";
			       }
			       
			       if(!empty($que))
			       {
			           $re = $this->db->query($que);
			            $display['last'] = $re->result();
			       }
		}
		else
		{
			
			$re = $this->db->query("SELECT * FROM demo 
WHERE demoDate < Now() and demoDate > DATE_ADD(Now(), INTERVAL- 6 MONTH)");
            $display['last'] = $re->result();
			
		}
		
		
		
		if(!empty($this->input->post('search')) && @$this->input->post('search')=="Filter")
		{
			$data = $this->input->post();
			$display['two_analysis'] = $this->cm->filter_demo_analysis("demo",$data);
			$display['filter_branch'] = @$data['filter_branch'];	
			$display['filter_department'] = @$data['filter_department'];	
		
			$display['filter_faculty'] = @$data['filter_faculty'];
			$display['filter_demoDate_start'] = @$data['filter_demoDate_start'];
			$display['filter_demoDate_end'] = @$data['filter_demoDate_end'];
		}
		else
		{
			
				$display['two_analysis'] = $this->cm->demo_analysis("demo");
			
		}
	
		
		
		if(!empty($this->input->post('faculty_analysis')))
		{
			$data = $this->input->post();
			$display['faculty_analysis'] = $this->cm->filter_demo_faculty_analysis("demo",$data);
			
			$display['filter_demoDate_start'] = @$data['filter_demoDate_start'];
			$display['filter_demoDate_end'] = @$data['filter_demoDate_end'];
		
			
		}
		else
		{
			
			$display['faculty_analysis'] = $this->cm->view_all("demo");
			
		}
		
		
	
		
		$display['department_all'] = $this->cm->view_all("department");
		$display['branch_all'] = $this->cm->view_all("branch");
		$display['course_all'] = $this->cm->view_all("course");
		$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
		$display['cancel_reason_all'] = $this->cm->view_all("cancel_reason_list");
	
	
	  
		
	    $update['upd_faculty'] = $this->cm->view_all("faculty");	
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");	
	    $this->load->view('header',$update);
	    $this->load->view('analysis',$display);
	}
	
	public function todayr()
	{
	    $display['department_all'] = $this->cm->view_all("department");
		$display['branch_all'] = $this->cm->view_all("branch");
		$display['course_all'] = $this->cm->view_all("course");
		$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
		$display['cancel_reason_all'] = $this->cm->view_all("cancel_reason_list");
	    $display['demo_all'] = $this->cm->view_all("demo");
	    
	  
		
	    $update['upd_faculty'] = $this->cm->view_all("faculty");	
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");	
	    $this->load->view('header',$update);
	    $this->load->view('today_report',$display);
	    
	}
	
	
	public function courseDetails()
	{
	    if(!empty($this->input->post('filter_course')))
		{
			$data = $this->input->post();
			$display['coursefilter'] = $this->cm->filter_course($data);
			
			$display['filter_department'] = @$data['filter_department'];	
		    $display['filter_single_course'] = @$data['filter_single_course'];	
		    
		}
		
		if(!empty($this->input->post('filter_package_course')))
		{
			$data = $this->input->post();
			$display['packagefilter'] = $this->cm->filter_packages($data);
			
			$display['filter_department2'] = @$data['filter_department2'];	
		    $display['filter_package'] = @$data['filter_package'];	
		    
		}
	    
	    
	    
	    $display['department_all'] = $this->cm->view_all("department");
	    $display['course_all'] = $this->cm->view_all("course");
	     $display['package_all'] = $this->cm->view_all("package");
		
		$update['upd_faculty'] = $this->cm->view_all("faculty");	
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");	
		
		
		$this->load->view('header',$update);
		$this->load->view('course_details',$display);
	
	}
	
	

}
