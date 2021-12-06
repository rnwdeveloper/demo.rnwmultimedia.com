<?php
class TaskController extends CI_controller {
    function __construct() {
        @parent::__construct();
        $this->load->model("Dbcommon", "cm");
        $this->load->helper('loggs');
        $this->load->model("Task", "tm");
        $this->load->model("Google_api", "gm");
        date_default_timezone_set("Asia/Kolkata");
        $this->load->helper('urldata');
        // print_r($_SESSION);
        // echo date_default_timezone_get();
        // echo date('d-m-Y H:i:s');
        
    }
    public function group() {
        logdata("Task group page open");
        //$update['all_termsconditions_category'] = $this->Tc_Model->view_all('termsconditions_category');
        //$update['all_termsconditions'] = $this->Tc_Model->all('termsconditions');
        $update['upd_faculty'] = $this->tm->view_all("faculty");
        $update['log_all'] = $this->tm->view_all_data_done("logtype");
        $update['upd_branch'] = $this->tm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $gdata['g_all'] = $this->tm->chart();
        // echo "<pre>";
        // print_r($gdata['g_all']);
        // die;
        // if(empty($gdata['g_all']))
        // {
        // 	$gdata['g_all'] = $this->tm->view_all_data_done("admin");
        // }
        // $gdata['branch_all'] = $this->cm->view_all("branch");
        // echo "<pre>";
        // print_r($gdata['g_all']);
        // die;
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            // echo "<pre>";
            // print_r($data);
            // die;
            // if($_SESSION['logtype'] == "Super Admin")
            // {
            // }
            // else if($data['child_id'] == 0)
            // {
            // }
            // else
            // {
            // }
            if ($data['g_type'] == "Super Admin") {
                $idata['group_child_id'] = 0;
            } else if ($data['g_type'] == "Admin") {
                $d_all = array();
                $b_all = array();
                $all = $this->tm->view_all_data("branch", "admin_id", $_SESSION['admin_id']);
                foreach ($all as $key => $value) {
                    $d_data = $this->tm->view_all_data("department", "branch_id", $value->branch_id);
                    foreach ($d_data as $k => $v) {
                        $d_all[] = $v->department_id;
                    }
                    $b_all[] = $value->branch_id;
                }
                $idata['group_branch_id'] = implode(",", $b_all);
                $idata['group_department_id'] = implode(",", $d_all);
                $idata['group_child_id'] = 1;
            } else {
                $idata['group_branch_id'] = $data['branch_id'];
                $idata['group_department_id'] = $data['department_id'];
                $idata['group_child_id'] = $data['child_id'];
            }
            $idata['logtype_id'] = $data['logtype_id'];
            $idata['group_name'] = $data['name'];
            if (isset($_SESSION['admin_id'])) {
                $idata['admin_id'] = $_SESSION['admin_id'];
            }
            $config['allowed_types'] = "*";
            $config['upload_path'] = FCPATH . "images/task_image/";
            $new_name = time() . $_FILES["image"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image')) {
                $imagedata = $this->upload->data();
                $idata['group_image'] = $imagedata['file_name'];
            }
            // $img = time()."_".$_FILES['image']['name'];
            //move_uploaded_file($_FILES['image']['tmp_name'], base_url()."");
            // $idata['group_image']  = $img['file_name'];
            $m = $this->tm->insert_data("task_group", $idata);
            if ($m) {
                return redirect('TaskController/group');
            }
        }
        if ($this->input->post('update')) {
            $data = $this->input->post();
            $idata['group_child_id'] = $data['child_id'];
            $idata['group_name'] = $data['name'];
            $idata['group_branch_id'] = $data['branch_id'];
            $idata['group_department_id'] = $data['department_id'];
            $idata['logtype_id'] = $data['logtype_id'];
            if (isset($_SESSION['admin_id'])) {
                $idata['admin_id'] = $_SESSION['admin_id'];
            }
            $config['allowed_types'] = "*";
            $config['upload_path'] = FCPATH . "images/task_image/";
            unlink(FCPATH . "images/task_image/" . $_FILES["image"]['name']);
            $new_name = time() . $_FILES["image"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image')) {
                $imagedata = $this->upload->data();
                $idata['group_image'] = $imagedata['file_name'];
            }
            // $img = time()."_".$_FILES['image']['name'];
            //move_uploaded_file($_FILES['image']['tmp_name'], base_url()."");
            // $idata['group_image']  = $img['file_name'];
            $m = $this->tm->update_data("task_group", $idata, "group_id", $this->input->post('group_id'));
            if ($m) {
                return redirect('TaskController/group');
            }
        }
        if ($this->input->get('action') == "delete") {
            $s = $this->tm->delete_record("task_group", "group_id", $this->input->get('id'));
            if ($s) {
                return redirect('TaskController/group');
            }
        }
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        //$this->load->view('header',$update);
        //$this->load->view('create_group',$gdata)
        $display['to_ad_task'] = $this->tm->today_add_task();
        $display['to_ob_task'] = $this->tm->today_observe_task();
        $display['to_wo_task'] = $this->tm->all_task_note();
        $update['tall'] = $this->tm->all_task_note();
        $update['to_ob_task'] = $this->tm->today_observe_task();;
        $update['member_all'] = $this->cm->view_all('task_group_member');
        // echo "<pre>";
        // print_r($update['member_all']);
        // die;
        $this->load->view('header_test', $update);
        $this->load->view('create_group_test', $gdata);
    }
    public function filter_member() {
        $id = $this->input->post('parent_id');
        $gdata = $this->tm->view_single_data("task_group", "group_id", $id);
        if ($gdata->group_name == "Super Admin") {
            $all = $this->tm->view_all("admin");
            echo "<option>-----select member</option>";
            foreach ($all as $key => $value) {
                echo '<option value=' . $value->id . '>' . $value->name . '</option>';
            }
        } else if ($gdata->group_name == "Admin") {
            $all = $this->tm->view_all_data("user", "logtype", "Admin");
            echo "<option>-----select member</option>";
            foreach ($all as $key => $value) {
                echo '<option value=' . $value->user_id . '>' . $value->name . '</option>';
            }
        } else if ($gdata->group_name == "Dean") {
            $all = $this->tm->view_all_data("user", "logtype", "Manager");
            echo "<option>-----select member</option>";
            foreach ($all as $key => $value) {
                echo '<option value=' . $value->user_id . '>' . $value->name . '</option>';
            }
        } else if ($gdata->group_name == "HOD") {
            $all = $this->tm->view_all("hod");
            echo "<option>-----select member</option>";
            foreach ($all as $key => $value) {
                echo '<option value=' . $value->hod_id . '>' . $value->name . '</option>';
            }
        } else {
            $all = $this->tm->view_all("faculty");
            echo "<option>-----select member</option>";
            foreach ($all as $key => $value) {
                echo '<option value=' . $value->faculty_id . '>' . $value->name . '</option>';
            }
        }
    }
    public function filter_depart() {
        $branch_id = $this->input->post('branch_id');
        $department_all = $this->tm->view_all_data("department", "branch_id", $branch_id);
        //$select_branch=$this->tm->select_data("branch","branch_id",$branch_id);
        // echo "<pre>";
        // print_r($select_branch);
        // die;
        // @$depart = explode(",",@$select_branch->department_ids);
        // 	$no = sizeof($depart);
        
?>

			 <select class="form-control select2" required name="department_id" id="department" style="width: 100%;">

                      <option>Select Department</option>

                     

                      

                        <?php //for($i=0;$i<sizeof($depart);$i++)
        // {
        foreach ($department_all as $row) {
            // if($depart[$i]==$row->department_id)
            // {
            
?>

                      <option value="<?php echo $row->department_id; ?>"><?php echo $row->department_name; ?></option>

                     	<?php
        } //} //}
         ?>

                    </select>       

        <?php
    }
    public function filter_admin() {
        $admin_id = $this->input->post('admin_id');
        $branch_all = $this->tm->view_all_data("branch", "admin_id", $admin_id);
?>

			 <select class="form-control select2" required name="department_id" id="branch_id" style="width: 100%;" onclick="selectdepart()">

                      <option value="">----Select Branch----</option>

                      

                      <?php
        foreach ($branch_all as $row) {
?>

                      <option value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>

                     	<?php
        } ?>

                    </select>   

                   

        <?php
    }
    public function filter_g_data() {
        $g = $this->input->post('g');
        $log_all = $this->tm->view_all_data_done("logtype");
        $g_all = $this->tm->chart();
        $admin_all = $this->tm->filter_data("user", "logtype", "admin");
        $admin_branch = $this->tm->filter_data('branch', 'admin_id', $_SESSION['admin_id']);
        if ($g == "Super Admin") {
?>

				 <br>

								<div class="form-group">

                                            <label for="exampleInputEmail1">Logtype Group</label>

                                            <select class="form-control" name="logtype_id">

                                                <option value="0">Select Logtype Group</option>

                                                <?php foreach ($log_all as $k => $v) {
                if ($v->logtype_name == "Super Admin") { ?>

                                                  <option value="<?php echo $v->logtype_id; ?>" selected><?php echo $v->logtype_name; ?></option>

                                                <?php
                }
            } ?>



                                            </select>

                                        </div>

                                       



				<?php
        } else if ($g == "User") {
            $upd_branch = $this->tm->view_all("branch");
?>

			 <br>

			 				<?php if ($_SESSION['logtype'] == 'Super Admin') { ?>

			 	 					<div class="form-group">

							              <label for="exampleInputEmail1">Admin</label>

							              <select class="form-control" name="admin_id" id="admin_id"  onchange="select_admin()">

							              <option value="0">Select Admin</option>

							                 <?php foreach ($admin_all as $k => $v) { ?>

							                      <option value="<?php echo $v->user_id; ?>"><?php echo $v->name; ?></option>

							                       <?php
                } ?>

							                   </select>

                                        </div>

				                        <div class="form-group">

                                            <label for="exampleInputEmail1">Branch</label>

                                            <select class="form-control" name="branch_id" id="branch_id" onchange="selectdepart()">

                                                <option value="0">Select Branch</option>

                                            </select>

                                        </div>

			 				<?php
            } else { ?>

			 					<input type="hidden" name="admin_id" value="<?php echo $_SESSION['admin_id']; ?>">

			 					<div class="form-group">

                                            <label for="exampleInputEmail1">Branch</label>

                                            <select class="form-control" name="branch_id" id="branch_id" onchange="selectdepart()">

                                                <option value="0">Select Branch</option>

                                                <?php foreach ($admin_branch as $key => $value) { ?>

                                                	<option value="<?php echo $value->branch_id; ?>"><?php echo $value->branch_name; ?></option>

                                                <?php
                } ?>

                                            </select>

                                        </div>

			 				<?php
            } ?>







                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Department Id</label>

                                            <select class="form-control" name="department_id" id="department_id">

                                                <option value="0">Select Department</option>

                                                

                                            </select>

                                        </div>

                                           <div class="form-group">

                                            <label for="exampleInputEmail1">Parent Group</label>

                                            <select class="form-control" name="child_id">

                                                <option value="0">Select Parent Group</option>

                                                <?php foreach ($g_all as $k => $v) { ?>

                                                  <option value="<?php echo $v->group_id; ?>"><?php echo $v->group_name; ?></option>

                                                <?php
            } ?>



                                            </select>

                                        </div>



                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Logtype Group</label>

                                            <select class="form-control" name="logtype_id">

                                                <option value="0">Select Logtype Group</option>

                                                <?php foreach ($log_all as $k => $v) {
                if ($v->admin_id == 0) { ?>

                                                  <option value="<?php echo $v->logtype_id; ?>"><?php echo $v->logtype_name; ?></option>

                                                <?php
                }
            } ?>



                                            </select>

                                        </div>

                                       





			<?php
        } else {
?>

			<br>

			<div class="form-group">

                                            <label for="exampleInputEmail1">Logtype Group</label>

                                            <select class="form-control" name="logtype_id">

                                                <option value="0">-------Select Logtype Group---------</option>

                                                <?php foreach ($log_all as $k => $v) {
                if ($v->logtype_name == "Admin") { ?>

                                                  <option value="<?php echo $v->logtype_id; ?>" selected><?php echo $v->logtype_name; ?></option>

                                                <?php
                }
            } ?>



                                            </select>

                                        </div>



				

			<?php
        }
    }
    public function gave_member() {
        $id = $this->input->post('m');
        // die;
        $all = $this->tm->select_data("task_group", "group_id", $id);
        $l_data = $this->tm->view_single_data("logtype", "logtype_id", $all->logtype_id);
        if ($l_data->logtype_name == "Super Admin") {
            $m_all = $this->tm->view_all("admin");
?>

					 				 <select class="form-control" name="member_id" id="member_id">

                                                <option value="0">-------Select Member---------</option>

                                                <?php foreach ($m_all as $k => $v) { ?>

                                                  <option value="<?php echo $v->id; ?>"><?php echo $v->name; ?></option>

                                                <?php
            } ?>

                                                </select>



                                          

				<?php
        } else if ($l_data->logtype_name == "Admin") {
            $m_all = $this->tm->view_all_data("user", "logtype", $l_data->logtype_name);
?>

				 							 <select class="form-control" name="member_id" id="member_id">

                                                <option value="0">-------Select Member---------</option>

                                                <?php foreach ($m_all as $k => $v) { ?>

                                                  <option value="<?php echo $v->user_id; ?>"><?php echo $v->name; ?></option>

                                                <?php
            } ?>

                                                </select>



                                         

			<?php
        } else if ($l_data->logtype_name == "Faculty") {
            $m_all = $this->tm->view_all_member("faculty", "branch_ids", $all->group_branch_id);
?>

			 <select class="form-control" name="member_id" id="member_id">

									 <option value="0">-------Select Member---------</option>

                                                <?php foreach ($m_all as $k => $v) { ?>

                                                  <option value="<?php echo $v->faculty_id; ?>"><?php echo $v->name; ?></option>

                                                <?php
            } ?>

                                                </select>

			<?php
        } else if ($l_data->logtype_name == "HOD" || $l_data->logtype_name == "hod") {
            $m_all = $this->tm->view_all_member("hod", "branch_ids", $all->group_branch_id);
?>

				 <select class="form-control" name="member_id" id="member_id" >

					 <option value="0">-------Select Member---------</option>

                                                <?php foreach ($m_all as $k => $v) { ?>

                                                  <option value="<?php echo $v->hod_id; ?>"><?php echo $v->name; ?></option>

                                                <?php
            } ?>

                                                </select>

                                                <div id="showCourse"></div>

                                              

				<?php
        } else {
            $m_all = $this->tm->view_all_member_logtype("user", "branch_ids", $all->group_branch_id, "logtype", $l_data->logtype_name);
?>

				 <select class="form-control" name="member_id" id="member_id" >

					 					<option value="0">-------Select Member---------</option>

                                                <?php foreach ($m_all as $k => $v) { ?>

                                                  <option value="<?php echo $v->user_id; ?>"><?php echo $v->name; ?></option>

                                                <?php
            } ?>

                                                </select>

				<?php
        }
    }
    public function add_member_custom() {
        $data = $this->input->post();
        foreach ($data['members'] as $key => $value) {
            $m['member_group_id'] = $data['member_group_id'];
            if ($data['role'] == "Super Admin") {
                $uall = $this->tm->select_data("admin", "id", $value);
            } else if ($data['role'] == "HOD" || $data['role'] == "hod") {
                $uall = $this->tm->select_data("hod", "hod_id", $value);
            } else if ($data['role'] == "Faculty") {
                $uall = $this->tm->select_data("faculty", "faculty_id", $value);
            } else {
                $uall = $this->tm->select_data("user", "user_id", $value);
            }
            $m['member_name'] = $uall->name;
            $m['member_email'] = $uall->email;
            $m['member_image'] = $uall->image;
            $m['member_role'] = $data['role'];
            $m['member_account_id'] = $value;
            $m['member_branch_id'] = $data['member_branch_id'];
            $s = $this->cm->insert_data("task_group_member", $m);
        }
        if ($s) {
            return redirect('TaskController/group');
        }
    }
    public function show_member_all() {
        $update['upd_faculty'] = $this->tm->view_all("faculty");
        $update['log_all'] = $this->tm->view_all_data_done("logtype");
        $update['upd_branch'] = $this->tm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $gdata['g_member'] = $this->tm->view_all("task_group");
        $gdata['b_data'] = $this->tm->view_all("branch");
        $gdata['t_member'] = $this->tm->view_all_data_done("task_group_member");
        $this->load->view('header', $update);
        $this->load->view('show_member', $gdata);
    }
    public function create_task() {
        $update['upd_faculty'] = $this->tm->view_all("faculty");
        $update['log_all'] = $this->tm->view_all_data_done("logtype");
        $update['upd_branch'] = $this->tm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $gdata['g_member'] = $this->tm->view_all("task_group");
        $gdata['b_data'] = $this->tm->view_all("branch");
        $gdata['t_member'] = $this->tm->view_all_data_done("task_group_member");
        $gdata['g_id'] = $this->input->get('g_id');
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        // $this->load->view('header',$update);
        // $this->load->view('create_task',$gdata);
        $this->load->view('header_test', $update);
        $this->load->view('create_task_test', $gdata);
    }
    public function add_task() {
        $n = $this->input->post('m');
        $g = $this->input->post('g');
        for ($i = 1;$i <= $n;$i++) {
?>

									<span id="<?php echo $i; ?>">

										  <div class="form-group">

                                            

                                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Task Name" name="name[]">

                                        </div>

                                         <div class="form-group">

                                            <label for="exampleInputPassword1">Task Description</label>

                                            <textarea class="form-control" name="description[]" placeholder="Task Description" rows="6"></textarea>

                                        </div>

                                         <div class="form-group">

                                            <label for="exampleInputFile">File input</label>

                                            <input type="file" id="exampleInputFile" name="image[<?php echo $i; ?>][]" multiple>

                                           

                                        </div>

                                         <div class="form-group">

                                            <label for="exampleInputPassword1">Task Creator</label>

                                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Creator Name"  value="<?php echo $_SESSION['user_name']; ?>" disabled>

                                            <input type="hidden" name="c_name" value="<?php echo $_SESSION['user_id']; ?>">

                                        </div>

                                       <button style="width: 100%;" value="<?php echo $i; ?>" id="add_group_id<?php echo $i; ?>" type="button" onclick="add_group(<?php echo $g; ?>,this.value)" class="btn btn-warning">Task Assign Participants  (hierarchy wise group or single person)</button>

                                        <div id="show_group<?php echo $i; ?>"></div>

                                         <div class="form-group">

                                            <label for="exampleInputPassword1">Task Obeserve Group</label>

                                            <br>

                                             <button type="button" style="width: 100%;" onclick="add_ob_group(<?php echo $g; ?>,this.value)" class="btn btn-primary" value="<?php echo $i; ?>">Task Observer (Login person or hierarchy wise group or single person)</button>

                                        <div id="show_ob_group<?php echo $i; ?>"></div>

                                        </div>

                                         <div class="form-group">

                                            <label for="exampleInputPassword1">Task Observation Status</label>

                                            <input type="radio"  id="exampleInputPassword1" name="observe[<?php echo $i; ?>]" onclick="gave_time(this.value,<?php echo $i; ?>)" value="today">Assign Today Dedline Date

                                            <input type="radio"  id="exampleInputPassword1" name="observe[<?php echo $i; ?>]" onclick="gave_time(this.value,<?php echo $i; ?>)" value="few">Few Days Dedline Date

                                        </div>

                                        <div id="gave_time_id<?php echo $i; ?>"></div>

                                         

                                        

                                          <div class="form-group">

                                            <label for="exampleInputPassword1">Task Priority</label>

                                            <input type="radio"  id="exampleInputPassword1" name="priority[<?php echo $i; ?>]" value="Hign">Hign

                                            <input type="radio"  id="exampleInputPassword1" name="priority[<?php echo $i; ?>]" value="Medium">Medium

                                            <input type="radio"  id="exampleInputPassword1" name="priority[<?php echo $i; ?>]" value="Low">Low

                                        </div>



                                        <button type="button" class="btn btn-danger" id="remove_task<?php echo $i; ?>" onclick="remove_task(this.id)" value="<?php echo $i; ?>">Remove</button>

                                        <br>

                                        <br>

				 </span>

			<?php
        }
    }
    public function add_assign_group() {
        $m = $this->input->post('m');
        $vid = $this->input->post('v_id');
        // $data = $this->tm->gave_member_all_withou_me($m);
        $data = $this->tm->gave_member_all($m);
?>

	   <div class="table-responsive">

									<table class="table table-bordered table-striped create_responsive_table">

										<tr class="thead">

											<th>Group Name</th>

											<th>Group Mamber</th>

										</tr>

											<?php foreach ($data as $key => $value) { ?>

									   	<tr>

									   		<td><?php echo $value->group_name; ?></td>

									   		<td><?php foreach ($value->member as $k => $v) { ?> <div><?php echo $v->member_name; ?><input type="checkbox" name="a_member_id[<?php echo $vid; ?>][]" value="<?php echo $v->member_id; ?>"></div>  <?php
            } ?></td>

									   	</tr>

									   	<?php
        } ?>

									

									</table>

								</div>

	  <!--  <table border="1">

	   	<tr>

	   		<th>Group Name</th>

	   		<th>Group Member</th>

	   	</tr>

	   	<?php foreach ($data as $key => $value) { ?>

	   	<tr>

	   		<td><?php echo $value->group_name; ?></td>

	   		<td><?php foreach ($value->member as $k => $v) { ?> <div><?php echo $v->member_name; ?><input type="checkbox" name="a_member_id[<?php echo $vid; ?>][]" value="<?php echo $v->member_id; ?>"></div>  <?php
            } ?></td>

	   	</tr>

	   	<?php
        } ?>

	   </table> -->

	  <?php
    }
    public function add_ob_group() {
        $m = $this->input->post('m');
        $vid = $this->input->post('v_id');
        $data = $this->tm->gave_member_all($m);
?>

	   <table class="table table-bordered table-striped create_responsive_table">

	   	<tr>

	   		<th>Group Name</th>

	   		<th>Group Member</th>

	   	</tr>

	   	<?php foreach ($data as $key => $value) { ?>

	   	<tr>

	   		<td><?php echo $value->group_name; ?></td>

	   		<td><?php foreach ($value->member as $k => $v) { ?> <div><?php echo $v->member_name; ?><input type="radio" name="o_member_name[<?php echo $vid; ?>][]" value="<?php echo $v->member_id; ?>"></div>  <?php
            } ?></td>

	   	</tr>

	   	<?php
        } ?>

	   </table>

	  <?php
    }
    public function gave_time() {
        $m = $this->input->post('m');
        $vid = $this->input->post('v_id');
        if ($m == "today") {
?>

			 							<div class="row">

                                          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                                            <div class="form-group">

                                              <input type="text" name="date[<?php echo $vid; ?>][]" data-provide="datepicker" class="form-control" id="datepicker" placeholder="Task Start Date">

                                            </div>

                                          </div>

                                          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                                            <div class="form-group">

                                              <input type="text" name="time[<?php echo $vid; ?>][]" data-provide="timepicker" id="timepicker" class="form-control" placeholder="Task Start Time">

                                            </div>

                                          </div>

                                          </div>

                                           <script type="text/javascript">

						var date = new Date();

						date.setDate(date.getDate());



						$('#datepicker').datepicker({ 

						    startDate: date

						});



					

                </script>

			 	<?php
        } else {
?>

			 		

                                          <div class="row">

                                          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                                            <div class="form-group">

                                              <input type="text" name="sdate[<?php echo $vid; ?>][]" data-provide="datepicker" class="form-control" id="datepicker" placeholder="Task Start Date">

                                            </div>

                                          </div>

                                          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                                            <div class="form-group">

                                              <input type="text" name="stime[<?php echo $vid; ?>][]" data-provide="timepicker" id="timepicker" class="form-control" placeholder="Task Start Time">

                                            </div>

                                          </div>

                                          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                                            <div class="form-group">

                                              <input type="text" name="edate[<?php echo $vid; ?>][]" data-provide="datepicker" class="form-control" id="datepicker1" placeholder="Task End Date">

                                            </div>

                                          </div>

                                          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                                            <div class="form-group">

                                              <input type="text" name="etime[<?php echo $vid; ?>][]" data-provide="timepicker" id="timepicker" class="form-control" placeholder="Task End Time">

                                            </div>

                                          </div>

                                        </div>

                                                           <script type="text/javascript">

						var date = new Date();

						date.setDate(date.getDate());



						$('#datepicker').datepicker({ 

						    startDate: date

						});



						$('#datepicker1').datepicker({ 

						    startDate: date

						});



					

                </script>

			 	<?php
        }
    }
    public function Inser_all_task() {
        $data = $this->input->post();
        // echo "<pre>";
        //  print_r($_FILES);
        // //print_r($data);
        // die;
        // $idata['group_image']  = $img['file_name'];
        for ($i = 0;$i < count($data['name']);$i++) {
            $allda['task_name'] = $data['name'][$i];
            $allda['task_description'] = $data['description'][$i];
            $allda['task_name'] = $data['name'][$i];
            $allda['task_creator_id'] = $data['c_name'];
            $allda['admin_id'] = $_SESSION['admin_id'];
            foreach ($data['a_member_id'] as $k => $v) {
                if ($k == $i) {
                    $allda['task_assign_member_id'] = implode(",", $v);
                }
            }
            foreach ($data['o_member_name'] as $j => $m) {
                if ($j == $i) {
                    $allda['task_observe_member_id'] = $m[0];
                }
            }
            foreach ($data['observe'] as $p => $n) {
                if ($p == $i) {
                    $allda['task_assign_status'] = $n;
                }
            }
            if ($data['observe'][$i] == "today") {
                foreach ($data['date'] as $c => $b) {
                    if ($c == $i) {
                        $allda['task_dedline_date'] = $b[0];
                    }
                }
                foreach ($data['time'] as $c => $b) {
                    if ($c == $i) {
                        $allda['task_dedline_time'] = $b[0];
                    }
                }
            } else {
                foreach ($data['sdate'] as $c => $b) {
                    if ($c == $i) {
                        $allda['task_start_date'] = $b[0];
                    }
                }
                foreach ($data['edate'] as $c => $b) {
                    if ($c == $i) {
                        $allda['task_dedline_date'] = $b[0];
                    }
                }
                foreach ($data['stime'] as $c => $b) {
                    if ($c == $i) {
                        $allda['task_start_time'] = $b[0];
                    }
                }
                foreach ($data['etime'] as $c => $b) {
                    if ($c == $i) {
                        $allda['task_dedline_time'] = $b[0];
                    }
                }
            }
            foreach ($data['priority'] as $c => $b) {
                if ($c == $i) {
                    $allda['task_priority'] = $b;
                }
            }
            // 	echo "<pre>";
            // // print_r($_FILES);
            // print_r($allda);
            // die;
            $allda['created_at'] = date('Y-m-d H:i:s');
            $m = $this->tm->insert_data_all("task_details", $allda);
            foreach ($data['a_member_id'] as $k => $v) {
                if ($k == $i) {
                    //$allda['task_assign_member_id'] = implode(",", $v);
                    foreach ($v as $key => $value) {
                        $jdata['task_detail_id'] = $m;
                        $jdata['admin_id'] = $_SESSION['admin_id'];
                        $jdata['task_member_id'] = $value;
                        $mdata = $this->tm->view_all_data_done("task_group_member");
                        foreach ($mdata as $p => $q) {
                            if ($q->member_id == $data['o_member_name'][$k][0]) {
                                $jdata['task_observe_name'] = $q->member_name;
                                $email = $q->member_email;
                                $config = array('protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
                                'smtp_host' => 'smtp.gmail.com', 'smtp_port' => 465, 'smtp_user' => 'jalpachudasama1998@gmail.com', 'smtp_pass' => '9879825912', 'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
                                'mailtype' => 'text', //plaintext 'text' mails or 'html'
                                'smtp_timeout' => '4', //in seconds
                                'charset' => 'UTF-8', 'wordwrap' => TRUE);
                                // $this->load->config('email');
                                $this->load->library('email');
                                $this->email->initialize($config);
                                $from = "jalpachudasama1998@gmail.com";
                                $to = $email;
                                $subject = "TASK OBERVER...";
                                // echo "<pre>";
                                // print_r($data['date'][0][0]);
                                // die;
                                if ($data['observe'][$i] == "today") {
                                    $date = date('d-m-y', strtotime($data['date'][0][0]));
                                    $time = date('h:iA', strtotime($data['time'][0][0]));
                                } else {
                                    $date = date('d-m-y', strtotime($data['sdate'][0][0]));
                                    $time = date('h:iA', strtotime($data['stime'][0][0]));
                                }
                                // echo $data['date'][0];
                                // echo $time;
                                // echo die;
                                $message = "TASK Name:-" . $data['name'][$i] . "\n Task Deadline Date&TIME:- $date $time";
                                $this->email->set_newline("\r\n");
                                $this->email->from($from);
                                $this->email->to($to);
                                $this->email->subject($subject);
                                $this->email->message($message);
                                $this->email->send();
                                // if ($this->email->send()) {
                                //     echo 'Your Email has successfully been sent.';
                                // } else {
                                //     show_error($this->email->print_debugger());
                                // }
                                
                            }
                            if ($q->member_id == $value) {
                                $jdata['task_member_name'] = $q->member_name;
                                $email = $q->member_email;
                                $config = array('protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
                                'smtp_host' => 'smtp.gmail.com', 'smtp_port' => 465, 'smtp_user' => 'jalpachudasama1998@gmail.com', 'smtp_pass' => '9879825912', 'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
                                'mailtype' => 'text', //plaintext 'text' mails or 'html'
                                'smtp_timeout' => '4', //in seconds
                                'charset' => 'UTF-8', 'wordwrap' => TRUE);
                                // $this->load->config('email');
                                $this->load->library('email');
                                $this->email->initialize($config);
                                $from = "jalpachudasama1998@gmail.com";
                                $to = $email;
                                $subject = "TASK CREATOR...";
                                if ($data['observe'][$i] == "today") {
                                    $date = date('d-m-y', strtotime($data['date'][0][0]));
                                    $time = date('h:iA', strtotime($data['time'][0][0]));
                                } else {
                                    $date = date('d-m-y', strtotime($data['sdate'][0][0]));
                                    $time = date('h:iA', strtotime($data['stime'][0][0]));
                                }
                                $message = "TASK Name:-" . $data['name'][$i] . "\n Task Deadline Date&TIME:- $date $time";
                                $this->email->set_newline("\r\n");
                                $this->email->from($from);
                                $this->email->to($to);
                                $this->email->subject($subject);
                                $this->email->message($message);
                                $this->email->send();
                            }
                        }
                        $this->tm->insert_data("task_submit", $jdata);
                    }
                }
            }
            echo "<pre>";
            //print_r($_FILES);
            foreach ($_FILES["image"]['name'][$i] as $j => $q) {
                //echo $_FILES['image']['name'][$i][$j];
                $_FILES['image' . $i]['name'] = $_FILES['image']['name'][$i][$j];
                $_FILES['image' . $i]['type'] = $_FILES['image']['type'][$i][$j];
                $_FILES['image' . $i]['tmp_name'] = $_FILES['image']['tmp_name'][$i][$j];
                $_FILES['image' . $i]['error'] = $_FILES['image']['error'][$i][$j];
                $_FILES['image' . $i]['size'] = $_FILES['image']['size'][$i][$j];
                $config['allowed_types'] = "*";
                $config['upload_path'] = FCPATH . "images/task_image/";
                $new_name = time() . $q;
                $config['file_name'] = $new_name;
                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('image' . $i)) {
                    $imagedata = $this->upload->data();
                    $idata['task_document'] = $imagedata['file_name'];
                }
                $idata['task_detail_id'] = $m;
                $this->cm->insert_data("task_document", $idata);
            }
        }
        return redirect('TaskController/group');
    }
    public function show_all_task() {
        $update['upd_faculty'] = $this->tm->view_all("faculty");
        $update['log_all'] = $this->tm->view_all_data_done("logtype");
        $update['upd_branch'] = $this->tm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $gdata['assign_task'] = $this->tm->view_all_data_adby("task_details", "task_detail_id");
        $gdata['come_task'] = $this->tm->view_all("task_details");
        $gdata['task_group'] = $this->tm->view_all("task_group");
        $gdata['member'] = $this->tm->view_all_data_done("task_group_member");
        //.. tm
        $gdata['task_submit'] = $this->cm->view_all("task_submit");
        $gdata['task_document'] = $this->tm->view_all_data_done("task_document");
        $gdata['task_resubmit'] = $this->tm->view_all_data_done("task_resubmit");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['tall'] = $this->tm->all_task_note();
        // echo "<pre>";
        // print_r($mm);
        // die;
        // $this->load->view('header',$update);
        // $this->load->view('show_all_task',$gdata);
        $this->load->view('header_test', $update);
        $this->load->view('show_task_test', $gdata);
    }
    public function observe_all_task() {
        $update['upd_faculty'] = $this->tm->view_all("faculty");
        $update['log_all'] = $this->tm->view_all_data_done("logtype");
        $update['upd_branch'] = $this->tm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $gdata['assign_task'] = $this->tm->view_all_data_adby("task_details", "task_detail_id");
        // echo "<pre>";
        // 	print_r($gdata['assign_task']);
        // 	die;
        $gdata['come_task'] = $this->tm->view_all("task_details");
        $gdata['task_group'] = $this->tm->view_all("task_group");
        $gdata['member'] = $this->tm->view_all_data_done("task_group_member");
        $gdata['task_submit'] = $this->cm->view_all("task_submit");
        //.. tm
        $gdata['task_document'] = $this->tm->view_all_data_done("task_document");
        $gdata['task_resubmit'] = $this->tm->view_all_data_done("task_resubmit");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['tall'] = $this->tm->all_task_note();
        // echo "<pre>";
        // print_r($mm);
        // die;
        // $this->load->view('header',$update);
        // $this->load->view('show_all_task',$gdata);
        $this->load->view('header_test', $update);
        $this->load->view('observe_task_test', $gdata);
    }
    public function working_all_task() {
        $update['upd_faculty'] = $this->tm->view_all("faculty");
        $update['log_all'] = $this->tm->view_all_data_done("logtype");
        $update['upd_branch'] = $this->tm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        // $gdata['assign_task'] = $this->tm->view_all_data_adby("task_details","task_creator_id",$_SESSION['user_id']);
        $gdata['assign_task'] = $this->tm->view_all_data_adby("task_details", "task_detail_id");
        $gdata['come_task'] = $this->tm->view_all("task_details");
        $gdata['task_group'] = $this->tm->view_all("task_group");
        $gdata['member'] = $this->tm->view_all_data_done("task_group_member");
        //.. tm
        $gdata['task_submit'] = $this->cm->view_all("task_submit");
        $gdata['task_document'] = $this->tm->view_all_data_done("task_document");
        $gdata['task_resubmit'] = $this->tm->view_all_data_done("task_resubmit");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['tall'] = $this->tm->all_task_note();
        // echo "<pre>";
        // print_r($mm);
        // die;
        // $this->load->view('header',$update);
        // $this->load->view('show_all_task',$gdata);
        $this->load->view('header_test', $update);
        $this->load->view('working_task_test', $gdata);
    }
    public function change_s() {
        $s = $this->input->get('s');
        $id = $this->input->get('id');
        if ($s == 0) {
            $m = 1;
        } else if ($s == 1) {
            $m = 2;
        } else if ($s == 2) {
            $m = 3;
        } else {
            $m = 4;
        }
        $data['task_status'] = $m;
        $this->tm->update_data("task_submit", $data, "task_submit_id", $id);
        return redirect('TaskController/working_all_task');
    }
    public function upd_prog() {
        $data = $this->input->post();
        $mdata['task_progress'] = $data['rang'];
        $this->tm->update_data("task_submit", $mdata, "task_submit_id", $data['id']);
        return redirect('TaskController/working_all_task');
    }
    public function sub_task() {
        $w = count($_FILES['doc']['name']);
        // echo "<pre>";
        // print_r($_FILES['doc']['name'][1]);
        // die;
        // // die;
        // foreach ($_FILES["doc"]['name'] as $j => $q) {
        $all = array();
        for ($i = 0;$i < $w;$i++) {
            // echo $i;
            $image = $_FILES['doc']['name'][$i];
            // // echo $i;
            $_FILES['image']['name'] = $_FILES['doc']['name'][$i];
            $_FILES['image']['type'] = $_FILES['doc']['type'][$i];
            $_FILES['image']['tmp_name'] = $_FILES['doc']['tmp_name'][$i];
            $_FILES['image']['error'] = $_FILES['doc']['error'][$i];
            $_FILES['image']['size'] = $_FILES['doc']['size'][$i];
            $config['allowed_types'] = "*";
            $config['upload_path'] = FCPATH . "images/task_image/";
            $new_name = time() . $image;
            $config['file_name'] = $new_name;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image')) {
                $imagedata = $this->upload->data();
                $all[$i] = $imagedata['file_name'];
            }
        }
        //}
        $data = $this->input->post();
        $idata['task_observe_status'] = 1;
        $idata['task_submit_detail'] = $data['description'];
        $idata['task_submit_document'] = implode(",", $all);
        $idata['task_submit_date'] = date('d-m-Y');
        $idata['task_submit_time'] = date("h:i:sA");
        $this->tm->update_data("task_submit", $idata, "task_submit_id", $data['id']);
        $adata = $this->tm->select_data("task_submit", "task_submit_id", $data['id']);
        $ddata = $this->tm->select_data("task_details", "task_detail_id", $adata->task_detail_id);
        $aemail = $this->tm->view_single_data("task_group_member", "member_id", $ddata->task_observe_member_id);
        $taskname = $this->tm->view_single_data("task_group_member", "member_id", $adata->task_member_id);
        $email = $aemail->member_email;
        // echo $email;
        // die;
        $config = array('protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
        'smtp_host' => 'smtp.gmail.com', 'smtp_port' => 465, 'smtp_user' => 'jalpachudasama1998@gmail.com', 'smtp_pass' => '9879825912', 'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
        'mailtype' => 'text', //plaintext 'text' mails or 'html'
        'smtp_timeout' => '4', //in seconds
        'charset' => 'UTF-8', 'wordwrap' => TRUE);
        // $this->load->config('email');
        $this->load->library('email');
        $this->email->initialize($config);
        $from = "jalpachudasama1998@gmail.com";
        $to = $email;
        $subject = "TASK SUBMIT MEMBER NAME $taskname->member_name";
        $message = "Submit DATE&TIME \n date('d-m-Y H:i:sA')";
        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
        return redirect('TaskController/working_all_task');
    }
    public function upd_observe_comment() {
        $data = $this->input->post();
        // echo "<pre>";
        // print_r($data);
        // die;
        if ($data['ob'] == 3) {
            $idata['task_submit_id'] = $data['id'];
            $idata['admin_id'] = $_SESSION['admin_id'];
            $idata['task_member_id'] = $data['task_member_id'];
            $idata['task_submit_date'] = $data['date'];
            $idata['task_submit_time'] = $data['time'];
            $idata['task_description'] = $data['name'];
            $idata['task_observer_name'] = $data['task_observe_name'];
            $idata['status'] = $data['ob'];
            $jdata['task_observe_status'] = $data['ob'];
            $this->tm->insert_data("task_resubmit", $idata);
            $this->tm->update_data("task_submit", $jdata, "task_submit_id", $data['id']);
        } else {
            $idata['task_observe_description'] = $data['name'];
            $idata['task_observe_status'] = $data['ob'];
            $all = $this->tm->view_single_data("task_submit", "task_submit_id", $data['id']);
            $main = $this->tm->view_all_done_all_data("task_submit", "task_detail_id", $all->task_detail_id);
            $mi = 0;
            foreach ($main as $key => $value) {
                if ($value->task_status != 2) {
                    $mi = 1;
                }
            }
            if ($mi == 0) {
                $midata['status'] = 1;
                $this->tm->update_data("task_details", $midata, "task_detail_id", $all->task_detail_id);
            }
            $this->tm->update_data("task_submit", $idata, "task_submit_id", $data['id']);
        }
        return redirect('TaskController/observe_all_task');
    }
    public function task_resubmit() {
        $m = $this->input->post('m');
        if ($m == 3) {
?>

			 							<div class="row">

                                          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                                            <div class="form-group">

                                              <input type="text" name="date" data-provide="datepicker" class="form-control" id="datepicker" placeholder="Task Start Date">

                                            </div>

                                          </div>

                                          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                                            <div class="form-group">

                                              <input type="text" name="time" data-provide="timepicker" id="timepicker" class="form-control" placeholder="Task Start Time">

                                            </div>

                                          </div>

                                          </div>



                             <?php
        }
    }
    public function change_rs() {
        $s = $this->input->get('s');
        $id = $this->input->get('id');
        if ($s == 0) {
            $m = 1;
        } else if ($s == 1) {
            $m = 2;
        } else if ($s == 2) {
            $m = 3;
        } else {
            $m = 4;
        }
        $data['task_status'] = $m;
        $this->tm->update_data("task_resubmit", $data, "task_resubmit_id", $id);
        return redirect('TaskController/working_all_task');
    }
    public function upd_re_prog() {
        $data = $this->input->post();
        // print_r($data);
        // die;
        $mdata['task_progress'] = $data['rang'];
        $this->tm->update_data("task_resubmit", $mdata, "task_resubmit_id", $data['id']);
        return redirect('TaskController/working_all_task');
    }
    public function resub_task() {
        $w = count($_FILES['doc']['name']);
        // echo "<pre>";
        // print_r($_FILES['doc']['name'][1]);
        // die;
        // // die;
        // foreach ($_FILES["doc"]['name'] as $j => $q) {
        $all = array();
        for ($i = 0;$i < $w;$i++) {
            // echo $i;
            $image = $_FILES['doc']['name'][$i];
            // // echo $i;
            $_FILES['image']['name'] = $_FILES['doc']['name'][$i];
            $_FILES['image']['type'] = $_FILES['doc']['type'][$i];
            $_FILES['image']['tmp_name'] = $_FILES['doc']['tmp_name'][$i];
            $_FILES['image']['error'] = $_FILES['doc']['error'][$i];
            $_FILES['image']['size'] = $_FILES['doc']['size'][$i];
            $config['allowed_types'] = "*";
            $config['upload_path'] = FCPATH . "images/task_image/";
            $new_name = time() . $image;
            $config['file_name'] = $new_name;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image')) {
                $imagedata = $this->upload->data();
                $all[$i] = $imagedata['file_name'];
            }
        }
        //}
        // print_r($all);
        // die;
        $data = $this->input->post();
        $idata['status'] = 1;
        $idata['task_submit_detail'] = $data['description'];
        $idata['task_submit_document'] = implode(",", $all);
        $idata['task_resubmit_date'] = date('d-m-Y');
        $idata['task_resubmit_time'] = date("h:i:sA");
        $this->tm->update_data("task_resubmit", $idata, "task_resubmit_id", $data['id']);
        $mdata = $this->tm->select_data("task_resubmit", "task_resubmit_id", $data['id']);
        $adata = $this->tm->select_data("task_submit", "task_submit_id", $mdata->task_submit_id);
        $ddata = $this->tm->select_data("task_details", "task_detail_id", $adata->task_detail_id);
        $aemail = $this->tm->view_single_data("task_group_member", "member_id", $ddata->task_observe_member_id);
        $taskname = $this->tm->view_single_data("task_group_member", "member_id", $adata->task_member_id);
        $email = $aemail->member_email;
        // echo $email;
        // die;
        $config = array('protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
        'smtp_host' => 'smtp.gmail.com', 'smtp_port' => 465, 'smtp_user' => 'jalpachudasama1998@gmail.com', 'smtp_pass' => '9879825912', 'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
        'mailtype' => 'text', //plaintext 'text' mails or 'html'
        'smtp_timeout' => '4', //in seconds
        'charset' => 'UTF-8', 'wordwrap' => TRUE);
        // $this->load->config('email');
        $this->load->library('email');
        $this->email->initialize($config);
        $from = "jalpachudasama1998@gmail.com";
        $to = $email;
        $subject = "TASK RESUBMIT MEMBER NAME $taskname->member_name";
        $message = "Submit DATE&TIME \n date('d-m-Y H:i:sA')";
        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
        return redirect('TaskController/working_all_task');
    }
    public function upd_re_observe_comment() {
        $data = $this->input->post();
        // echo "<pre>";
        // print_r($data);
        // die;
        if ($data['ob'] == 3) {
            $idata['task_submit_id'] = $data['id'];
            $idata['admin_id'] = $_SESSION['admin_id'];
            $idata['task_member_id'] = $data['task_member_id'];
            $idata['task_submit_date'] = $data['date'];
            $idata['task_submit_time'] = $data['time'];
            $idata['task_description'] = $data['name'];
            $idata['task_observer_name'] = $data['task_observe_name'];
            $idata['status'] = $data['ob'];
            $jrdata['status'] = 4;
            $jdata['task_observe_status'] = $data['ob'];
            $this->tm->insert_data("task_resubmit", $idata);
            $this->tm->update_data("task_submit", $jdata, "task_submit_id", $data['id']);
            $this->tm->update_data("task_resubmit", $jrdata, "task_resubmit_id", $data['reid']);
        } else {
            $idata['task_observe_description'] = $data['name'];
            $idata['task_observe_status'] = $data['ob'];
            $jrdata['status'] = 2;
            $all = $this->tm->view_single_data("task_submit", "task_submit_id", $data['id']);
            $main = $this->tm->view_all_done_all_data("task_submit", "task_detail_id", $all->task_detail_id);
            $mi = 0;
            foreach ($main as $key => $value) {
                if ($value->task_status != 2) {
                    $mi = 1;
                }
            }
            if ($mi == 0) {
                $midata['status'] = 1;
                $this->tm->update_data("task_details", $midata, "task_detail_id", $all->task_detail_id);
            }
            $this->tm->update_data("task_submit", $idata, "task_submit_id", $data['id']);
            $this->tm->update_data("task_resubmit", $jrdata, "task_resubmit_id", $data['reid']);
        }
        return redirect('TaskController/show_all_task');
    }
    public function send_mail() {
        $email = $this->input->post('email');
        $config = array('protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
        'smtp_host' => 'smtp.gmail.com', 'smtp_port' => 465, 'smtp_user' => 'jalpachudasama1998@gmail.com', 'smtp_pass' => '9879825912', 'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
        'mailtype' => 'text', //plaintext 'text' mails or 'html'
        'smtp_timeout' => '4', //in seconds
        'charset' => 'UTF-8', 'wordwrap' => TRUE);
        // $this->load->config('email');
        $this->load->library('email');
        $this->email->initialize($config);
        $from = "jalpachudasama1998@gmail.com";
        $to = $email;
        $subject = "PHP...";
        $message = "HELLO 123";
        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }
    public function count_dd() {
        $this->load->view('counter_task');
    }
    public function count_ob() {
        $this->load->view('counter_ob');
    }
    public function show_chat_member() {
        $update['upd_faculty'] = $this->tm->view_all("faculty");
        $update['log_all'] = $this->tm->view_all_data_done("logtype");
        $update['upd_branch'] = $this->tm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $gdata['assign_task'] = $this->cm->view_all_data("task_details", "task_creator_id", $_SESSION['user_id']);
        $gdata['come_task'] = $this->tm->view_all("task_details");
        $gdata['task_group'] = $this->tm->view_all("task_group");
        $gdata['member'] = $this->tm->view_all_data_done("task_group_member");
        $gdata['task_submit'] = $this->tm->view_all("task_submit");
        $gdata['task_document'] = $this->tm->view_all_data_done("task_document");
        $gdata['task_resubmit'] = $this->tm->view_all_data_done("task_resubmit");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['tall'] = $this->tm->all_task_note();
        // echo "<pre>";
        // print_r($_SESSION);
        // die;
        // $this->load->view('header',$update);
        // $this->load->view('show_all_task',$gdata);
        $gdata['uid_all'] = $this->tm->view_single_data("login_details", "login_details_id", @$_SESSION['login_detail_id']);
        $this->load->view('header_test', $update);
        $this->load->view('show_all_member', $gdata);
    }
    public function ins_chat() {
        $gdata['member'] = $this->tm->view_all_data_done("task_group_member");
        $data = $this->input->post();
        $from_user_id = 0;
        $to_acount_id = 0;
        foreach ($gdata['member'] as $key => $value) {
            if ($value->member_id == $data['to_user_id']) {
                $to_acount_id = $value->member_account_id;
            }
            if ($value->member_account_id == $_SESSION['user_id']) {
                $from_user_id = $value->member_id;
            }
        }
        $min['to_user_id'] = $data['to_user_id'];
        $min['from_user_id'] = $from_user_id;
        $min['admin_id'] = $_SESSION['admin_id'];
        $min['chat_message'] = $data['chat_message'];
        $min['member_to_id'] = $to_acount_id;
        $min['member_from_id'] = $_SESSION['user_id'];
        $min['status'] = 1;
        $q1 = $this->tm->insert_data("task_question", $min);
        if ($q1) {
            $alldata['is_type'] = 'no';
            $this->tm->update_data("login_details", $alldata, "login_details_id", $_SESSION['login_detail_id']);
            $all = $this->tm->fetch_user_chat_history($from_user_id, $data['to_user_id']);
            // print_r($all);
            // die;
            foreach ($all as $key => $value) {
                $user_name = '';
                if ($value->from_user_id == $from_user_id) { ?>

			<div class="me_type_chate the_chate"><p><?php echo $value->chat_message; ?></p></div>

		<?php
                } else { ?>

			<div class="any_type_chate the_chate"><p><?php echo $value->chat_message; ?></p></div>

		<?php
                }
            }
            //$this->tm->upd_question($from_user_id,$data['to_user_id']);
            
        }
    }
    public function upd_chat() {
        $gdata['member'] = $this->tm->view_all_data_done("task_group_member");
        $data = $this->input->post();
        $to_acount_id = 0;
        $from_user_id = 0;
        foreach ($gdata['member'] as $key => $value) {
            if ($value->member_id == $data['to_user_id']) {
                $to_acount_id = $value->member_account_id;
            }
            if ($value->member_account_id == $_SESSION['user_id']) {
                $from_user_id = $value->member_id;
            }
        }
        // $min['to_user_id'] = $data['to_user_id'];
        // $min['from_user_id'] = $from_user_id;
        // $min['admin_id'] = $_SESSION['admin_id'];
        // $min['chat_message'] = $data['chat_message'];
        // $min['member_to_id'] = $to_acount_id;
        // $min['member_from_id'] = $_SESSION['user_id'];
        // $q1 = $this->tm->insert_data("task_question",$min);
        // if($q1)
        // {
        $all = $this->tm->fetch_user_chat_history($from_user_id, $data['to_user_id']);
        // print_r($all);
        // die;
        foreach ($all as $key => $value) {
            $user_name = '';
            if ($value->from_user_id == $from_user_id) { ?>

			<div class="me_type_chate the_chate"><p><?php echo $value->chat_message; ?></p></div>

		<?php
            } else { ?>

			<div class="any_type_chate the_chate"><p><?php echo $value->chat_message; ?></p></div>

		<?php
            }
        }
        $this->tm->upd_question($from_user_id, $data['to_user_id']);
    }
    function upd_last_activity() {
        $staus = '';
        $current_timestamp = strtotime(date('Y-m-d H:i:s') . '-100 second');
        $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
        // $user_last_activity = fetch_user_last_activity($value['login_id'],$con);
        $user_last_activity = $this->tm->last_act($this->input->post('to_user_id'));
        if ($user_last_activity != date('Y-m-d H:i:s') && !empty($user_last_activity)) {
            $jall['last_activity'] = date('Y-m-d H:i:s');
            $this->tm->update_data("login_details", $jall, "user_id", $this->input->post('to_user_id'));
        }
        // $uu = date('Y-m-d H:i:s',strtotime($user_last_activity));
        if ($user_last_activity > $current_timestamp) {
            echo $staus = '<span style="color:green;">Online</span>';
        } else {
            echo $staus = '<span style="color:red;">Offline</span>';
        }
    }
    public function upd_last_type() {
        $jall['is_type'] = 'yes';
        $this->tm->update_data("login_details", $jall, "login_details_id", $_SESSION['login_detail_id']);
    }
    public function create_last_type() {
        $all = $this->tm->fetch_typing($this->input->post('to_user_id'));
        $output = '';
        foreach ($all as $key => $value) {
            if ($value->is_type == 'yes') {
                $output = ' - <small><em><span class="text-muted">Typing.....</span></em></small>';
            }
        }
        echo $output;
    }
    public function unseen_msg() {
        $gdata['member'] = $this->tm->view_all_data_done("task_group_member");
        $from_user_id = 0;
        foreach ($gdata['member'] as $key => $value) {
            if ($value->member_account_id == $_SESSION['user_id']) {
                $from_user_id = $value->member_id;
            }
        }
        $query2 = $this->tm->cc_msg($this->input->post('to_user_id'), $from_user_id);
        $output = '';
        if ($query2 > 0) {
            $output = '<span class="btn btn-success">' . $query2 . '</span>';
        }
        echo $output;
    }
    function ll_act() {
        $this->tm->final_act();
    }
    public function cal_index() {
        // echo "<pre>";
        // print_r($_SESSION);
        // die;
        logdata("Event Calander page open");
        $update['upd_faculty'] = $this->tm->view_all("faculty");
        $update['log_all'] = $this->tm->view_all_data_done("logtype");
        $update['upd_branch'] = $this->tm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $gdata['g_member'] = $this->tm->view_all("task_group");
        $gdata['b_data'] = $this->tm->view_all("branch");
        $gdata['t_member'] = $this->tm->view_all_data_done("task_group_member");
        $gdata['g_id'] = $this->input->get('g_id');
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $gdata['user_all'] = $this->cm->view_all_user("user");
        // $this->load->view('header',$update);
        // $this->load->view('create_task',$gdata);
        $this->load->view('header_test', $update);
        //$this->load->view('create_event',$gdata);
        $this->load->view('cal/index', $gdata);
    }
    public function loadEventData() {
        $json = array();
        $tjson = array();
        $dataInfo = $this->tm->view_all("event");
        foreach ($dataInfo as $element) {
            $f = 0;
            $j = 0;
            $s = 0;
            $h = 0;
            if ($_SESSION['logtype'] != "Super Admin") {
                if (!empty($element->branch_id)) {
                    $ball = explode(",", $element->branch_id);
                    $b_sall = explode(",", $_SESSION['branch_ids']);
                    $f = 0;
                    foreach ($b_sall as $key => $value) {
                        if (in_array($value, $ball)) {
                            $f = 1;
                            break;
                        }
                    }
                }
                if (!empty($element->department_id)) {
                    $dall = explode(",", $element->department_id);
                    $d_sall = explode(",", $_SESSION['department_id']);
                    $j = 0;
                    foreach ($d_sall as $key => $value) {
                        if (in_array($value, $dall)) {
                            $j = 1;
                            break;
                        }
                    }
                }
                if (!empty($element->subdepartment_id)) {
                    $sall = explode(",", $element->subdepartment_id);
                    $s_sall = explode(",", $_SESSION['subdepartment_id']);
                    $s = 0;
                    foreach ($s_sall as $key => $value) {
                        if (in_array($value, $sall)) {
                            $s = 1;
                            break;
                        }
                    }
                }
                if ($_SESSION['logtype'] == "Faculty") {
                    if (!empty($element->faculty_id)) {
                        $fall = explode(",", $element->faculty_id);
                        $f_fall = explode(",", $_SESSION['user_id']);
                        $h = 0;
                        foreach ($f_fall as $key => $value) {
                            if (in_array($value, $fall)) {
                                $h = 1;
                                break;
                            }
                        }
                    }
                } else if ($_SESSION['logtype'] == "hod") {
                    if (!empty($element->hod_id)) {
                        $fall = explode(",", $element->hod_id);
                        $f_fall = explode(",", $_SESSION['user_id']);
                        $h = 0;
                        foreach ($f_fall as $key => $value) {
                            if (in_array($value, $fall)) {
                                $h = 1;
                                break;
                            }
                        }
                    }
                } else {
                    if (!empty($element->user_id)) {
                        $fall = explode(",", $element->user_id);
                        $f_fall = explode(",", $_SESSION['user_id']);
                        $h = 0;
                        foreach ($f_fall as $key => $value) {
                            if (in_array($value, $fall)) {
                                $h = 1;
                                break;
                            }
                        }
                    }
                }
            }
            $y = 0;
            if (!empty($element->branch_id)) {
                $y = 1;
            }
            if (!empty($element->branch_id) && !empty($element->department_id)) {
                $y = 2;
            }
            if (!empty($element->branch_id) && !empty($element->department_id) && !empty($element->subdepartment_id)) {
                $y = 3;
            }
            if (!empty($element->branch_id) && !empty($element->department_id) && !empty($element->subdepartment_id) && !empty($element->faculty_id)) {
                $y = 4;
            }
            if (!empty($element->branch_id) && !empty($element->department_id) && !empty($element->subdepartment_id) && !empty($element->hod_id)) {
                $y = 5;
            }
            if (($y == 1 && $f == 1) || $_SESSION['logtype'] == "Super Admin" || $_SESSION['logtype'] == "Admin") {
                if (date('H:i:s', strtotime($element->start)) == "00:00:00" && date('H:i:s', strtotime($element->end) == "00:00:00")) {
                    $ssdate = date('Y-m-d', strtotime($element->start));
                    $eedate = date('Y-m-d', strtotime($element->end));
                } else {
                    $ssdate = date('Y-m-d', strtotime($element->start)) . "T" . date('H:i:s', strtotime($element->start));
                    $eedate = date('Y-m-d', strtotime($element->end)) . "T" . date('H:i:s', strtotime($element->end));
                }
                if ($element->event_type == "Event") {
                    $cc = "red";
                } else {
                    $cc = "orange";
                }
                $json[] = array('title' => $element->name, 'start' => $ssdate, 'end' => $eedate, 'type' => 'gc_event', 'color' => $cc, 'textColor' => '#FFFFFF', 'class' => 'gcal-day-grid');
            } else if (($y == 2 && $f == 1 && $j == 1) || $_SESSION['logtype'] == "Super Admin" || $_SESSION['logtype'] == "Admin") {
                if (date('H:i:s', strtotime($element->start)) == "00:00:00" && date('H:i:s', strtotime($element->end) == "00:00:00")) {
                    $ssdate = date('Y-m-d', strtotime($element->start));
                    $eedate = date('Y-m-d', strtotime($element->end));
                } else {
                    $ssdate = date('Y-m-d', strtotime($element->start)) . "T" . date('H:i:s', strtotime($element->start));
                    $eedate = date('Y-m-d', strtotime($element->end)) . "T" . date('H:i:s', strtotime($element->end));
                }
                if ($element->event_type == "Event") {
                    $cc = "red";
                } else {
                    $cc = "orange";
                }
                $json[] = array('title' => $element->name, 'start' => $ssdate, 'end' => $eedate, 'type' => 'gc_event', 'color' => $cc, 'textColor' => '#FFFFFF', 'class' => 'gcal-day-grid',);
            } else if (($y == 3 && $f == 1 && $j == 1 && $s == 1) || $_SESSION['logtype'] == "Super Admin" || $_SESSION['logtype'] == "Admin") {
                if (date('H:i:s', strtotime($element->start)) == "00:00:00" && date('H:i:s', strtotime($element->end) == "00:00:00")) {
                    $ssdate = date('Y-m-d', strtotime($element->start));
                    $eedate = date('Y-m-d', strtotime($element->end));
                } else {
                    $ssdate = date('Y-m-d', strtotime($element->start)) . "T" . date('H:i:s', strtotime($element->start));
                    $eedate = date('Y-m-d', strtotime($element->end)) . "T" . date('H:i:s', strtotime($element->end));
                }
                if ($element->event_type == "Event") {
                    $cc = "red";
                } else {
                    $cc = "orange";
                }
                $json[] = array('title' => $element->name, 'start' => $ssdate, 'end' => $eedate, 'type' => 'gc_event', 'color' => $cc, 'textColor' => '#FFFFFF', 'class' => 'gcal-day-grid',);
            } else if (($y == 4 && $f == 1 && $j == 1 && $s == 1 && $h == 1) || $_SESSION['logtype'] == "Super Admin" || $_SESSION['logtype'] == "Admin") {
                if (date('H:i:s', strtotime($element->start)) == "00:00:00" && date('H:i:s', strtotime($element->end) == "00:00:00")) {
                    $ssdate = date('Y-m-d', strtotime($element->start));
                    $eedate = date('Y-m-d', strtotime($element->end));
                } else {
                    $ssdate = date('Y-m-d', strtotime($element->start)) . "T" . date('H:i:s', strtotime($element->start));
                    $eedate = date('Y-m-d', strtotime($element->end)) . "T" . date('H:i:s', strtotime($element->end));
                }
                if ($element->event_type == "Event") {
                    $cc = "red";
                } else {
                    $cc = "orange";
                }
                $json[] = array('title' => $element->name, 'start' => $ssdate, 'end' => $eedate, 'type' => 'gc_event', 'color' => $cc, 'textColor' => '#FFFFFF', 'class' => 'gcal-day-grid',);
            } else if (($y == 5 && $f == 1 && $j == 1 && $s == 1 && $h == 1) || $_SESSION['logtype'] == "Super Admin" || $_SESSION['logtype'] == "Admin") {
                if (date('H:i:s', strtotime($element->start)) == "00:00:00" && date('H:i:s', strtotime($element->end) == "00:00:00")) {
                    $ssdate = date('Y-m-d', strtotime($element->start));
                    $eedate = date('Y-m-d', strtotime($element->end));
                } else {
                    $ssdate = date('Y-m-d', strtotime($element->start)) . "T" . date('H:i:s', strtotime($element->start));
                    $eedate = date('Y-m-d', strtotime($element->end)) . "T" . date('H:i:s', strtotime($element->end));
                }
                if ($element->event_type == "Event") {
                    $cc = "red";
                } else {
                    $cc = "orange";
                }
                $json[] = array('title' => $element->name . ($element->event_type), 'start' => $ssdate, 'end' => $eedate, 'type' => 'gc_event', 'color' => $cc, 'textColor' => '#FFFFFF', 'class' => 'gcal-day-grid',);
            }
        }
        $alltask = $this->tm->view_all("task_details");
        foreach ($alltask as $key => $value) {
            $tjson[] = array('title' => $value->task_name, 'start' => date('Y-m-d', strtotime($value->task_dedline_date)) . "T" . date('H:i:s', strtotime($value->task_dedline_time)), 'type' => 'gc_event', 'color' => 'blue', 'textColor' => '#FFFFFF', 'class' => 'gcal-day-grid',);
        }
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($json, true);
        // echo json_encode($tjson, true);
        
    }
    public function loadTaskData() {
        //  $json = array();
        $tjson = array();
        $m_id_all = $this->tm->get_task_cal_id();
        $m_id = $m_id_all->member_id;
        $alltask = $this->tm->view_all("task_details");
        $all_f_task = array();
        foreach ($alltask as $key => $v) {
            if (in_array($m_id, explode(",", $v->task_assign_member_id))) {
                $all_f_task[] = $v;
            }
        }
        // $alltask = $this->tm->view_all("task_details");
        foreach ($all_f_task as $key => $value) {
            $tjson[] = array('title' => $value->task_name, 'start' => date('Y-m-d', strtotime($value->task_dedline_date)) . "T" . date('H:i:s', strtotime($value->task_dedline_time)), 'type' => 'gc_event', 'color' => 'green', 'textColor' => '#FFFFFF', 'class' => 'gcal-day-grid',);
        }
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($tjson, true);
    }
    public function loadobTaskData() {
        $objson = array();
        $m_id_all = $this->tm->get_task_cal_id();
        $m_id = $m_id_all->member_id;
        $alltask = $this->tm->view_all("task_details");
        $all_f_task = array();
        foreach ($alltask as $key => $v) {
            if ($m_id == $v->task_observe_member_id) {
                $all_f_task[] = $v;
            }
        }
        // $alltask = $this->tm->view_all("task_details");
        foreach ($all_f_task as $key => $value) {
            $objson[] = array('title' => $value->task_name, 'start' => date('Y-m-d', strtotime($value->task_dedline_date)) . "T" . date('H:i:s', strtotime($value->task_dedline_time)), 'type' => 'gc_event', 'color' => '#a903fc', 'textColor' => '#FFFFFF', 'class' => 'gcal-day-grid',);
        }
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($objson, true);
    }
    public function fetch_cal() {
        // echo "<pre>";
        // $main=$all;
        // $_SESSION['iiid']=$main;
        // echo $main;
        // print_r($_SESSION);
        $data = $this->gm->GetAccessToken('1054790138315-63sa04e8jefprcge8q0dq2dm8a6rt3lh.apps.googleusercontent.com', 'https://demo.rnwmultimedia.com/TaskController/working_all_task', 'k5A8ZsayU2EWrWykD-hzGhA7', $_GET['code']);
        // Save the access token as a session variable
        $_SESSION['access_token'] = $data['access_token'];
        if (isset($_GET['ttid'])) {
            $fall = $this->tm->select_data("task_resubmit", "task_resubmit_id", $_GET['ttid']);
            $mall = $this->tm->select_data("task_submit", "task_submit_id", $fall->task_submit_id);
            $all = $this->tm->select_data("task_details", "task_detail_id", $mall->task_detail_id);
            $event_details = array("title" => $all->task_name, "event_time" => array("start_time" => date('Y-m-d', strtotime($fall->task_submit_date)) . "T" . date('H:i:s', strtotime($fall->task_submit_time)), "end_time" => date('Y-m-d', strtotime($fall->task_submit_date)) . "T" . date('H:i:s', strtotime($fall->task_submit_time)), "event_date" => ""), "all_day" => '0', "operation" => "create", "event_id" => "");
        } else {
            $mall = $this->tm->select_data("task_submit", "task_submit_id", $_GET['tid']);
            $all = $this->tm->select_data("task_details", "task_detail_id", $mall->task_detail_id);
            $event_details = array("title" => $all->task_name, "event_time" => array("start_time" => date('Y-m-d', strtotime($all->task_dedline_date)) . "T" . date('H:i:s', strtotime($all->task_dedline_time)), "end_time" => date('Y-m-d', strtotime($all->task_dedline_date)) . "T" . date('H:i:s', strtotime($all->task_dedline_time)), "event_date" => ""), "all_day" => '0', "operation" => "create", "event_id" => "");
        }
        //	$_SESSION['access_token'] = $_GET['code'];
        // print_r($_GET);
        // die;
        try {
            // Get event details
            $event = $event_details;
            switch ($event['operation']) {
                    // echo $event['operation'];
                    // die;
                    
                case 'create':
                    // echo $_SESSION['access_token'];
                    // echo "hii";
                    // die;
                    // Get user calendar timezone
                    if (!isset($_SESSION['user_timezone']))
                    // 	echo $_SESSION['access_token'];
                    // die;
                    $_SESSION['user_timezone'] = $this->gm->GetUserCalendarTimezone($_SESSION['access_token']);
                    // die;
                    // echo $_SESSION['user_timezone'];
                    // die;
                    // Create event on primary calendar
                    $event_id = $this->gm->CreateCalendarEvent('primary', $event['title'], $event['all_day'], $event['event_time'], $_SESSION['user_timezone'], $_SESSION['access_token']);
                    echo json_encode(['event_id' => $event_id]);
                    // header("location:TaskController/working_all_task");
                    if (isset($_GET['ttid'])) {
                        $this->tm->Task_remind("task_resubmit", $event_id, "task_resubmit_id", $_GET['ttid'], $_GET['uid']);
                    } else {
                        $this->tm->Task_remind("task_submit", $event_id, "task_submit_id", $_GET['tid'], $_GET['uid']);
                    }
                    // print_r($allm);
                    return redirect('TaskController/working_all_task');
                    break;
                    // case 'update':
                    // 	// Update event on primary calendar
                    // 	$capi->UpdateCalendarEvent($event['event_id'], 'primary', $event['title'], $event['all_day'], $event['event_time'], $_SESSION['user_timezone'], $_SESSION['access_token']);
                    // 	echo json_encode([ 'updated' => 1 ]);
                    // 	break;
                    // case 'delete':
                    // 	// Delete event on primary calendar
                    // 	$capi->DeleteCalendarEvent($event['event_id'], 'primary', $_SESSION['access_token']);
                    // 	echo json_encode([ 'deleted' => 1 ]);
                    // 	break;
                    
                }
        }
        catch(Exception $e) {
            header('Bad Request', true, 400);
            echo json_encode(array('error' => 1, 'message' => $e->getMessage()));
        }
        //$this->load->view('58api/ajax',$data);
        
    }
    public function create_event() {
        $this->load->view('calander/index');
    }
    public function backend_events() {
        $this->load->view('calander/backend_events');
    }
    public function backend_create() {
        $this->load->view('calander/backend_create');
    }
    public function create_event_data() {
        logdata("Create event page open");
        $update['upd_faculty'] = $this->tm->view_all("faculty");
        $update['log_all'] = $this->tm->view_all_data_done("logtype");
        $update['upd_branch'] = $this->tm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $gdata['g_member'] = $this->tm->view_all("task_group");
        $gdata['b_data'] = $this->tm->view_all("branch");
        $gdata['t_member'] = $this->tm->view_all_data_done("task_group_member");
        $gdata['g_id'] = $this->input->get('g_id');
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $gdata['user_all'] = $this->cm->view_all_user("user");
        $gdata['aa_branch'] = $this->cm->filter_data("branch", "admin_id", $_SESSION['admin_id']);
        // $this->load->view('header',$update);
        // $this->load->view('create_task',$gdata);
        $this->load->view('header_test', $update);
        $this->load->view('create_event', $gdata);
    }
    public function admin_Wise_branchFetch() {
        $b_all = $this->input->post('id');
        $b = $this->cm->filter_data("branch", "admin_id", $b_all);
?>

			<table border="1" class="table">

				<?php foreach ($b as $k => $n) { ?>

				<tr>

					<td class="form-control">

						

						

						<input class="filterCheck" type="checkbox"  name="b_ids[]" value="<?php echo $n->branch_id; ?>"><?php echo $n->branch_name; ?>

	 			

					</td>

				</tr>

				<?php
        } ?>

			</table>

			<script type="text/javascript">

  $(document).ready(function(){

    $('.filterCheck').change(function(){

      /*console.log("called");

      console.log($('#filterForm').serialize());*/

     // alert($('#filterForm').serialize());

      $.ajax({

        type:'POST',

        data:$('#filterForm').serialize(),

        url:"<?php echo base_url(); ?>TaskController/fetch_depart_alll",

        success:function(data){

          $('#department').html(data);

        }

      });

    });

  });

</script>

	

	<?php
    }
    public function fetch_depart_alll() {
        $b_all = $this->input->post('b_ids');
        if (!empty($b_all)) {
            foreach ($b_all as $key => $value) {
                if (!empty($value)) {
                    $data = $this->cm->filter_data("department", "branch_id", $value);
                    $b = $this->cm->select_data("branch", "branch_id", $value);
                    if (!empty($data)) {
                        $s_name[$b->branch_name] = $data;
                    }
                }
            }
?>

			<table border="1" class="table">

				<tr>

					<th>Branch name</th>

					<th>Department</th>

				</tr>

				<?php foreach ($s_name as $k => $v) { ?>

				<tr>

					<td><?php echo $k; ?></td>

					<td>					

						<?php foreach ($v as $m => $n) { ?>

						<input class="tt" type="checkbox"  name="depart_ids[]" value="<?php echo $n->department_id; ?>"><?php echo $n->department_name; ?>

						<?php
                } ?>

	 			

					</td>

				</tr>

				<?php
            } ?>

			</table>

			<script type="text/javascript">

	  $(document).ready(function(){

	    $('.tt').change(function(){

	     

	      /*console.log("called");

	      console.log($('#filterForm').serialize());*/

	      // alert($('#filterForm').serialize());

	      $.ajax({

	        type:'POST',

	        data:$('#filterForm').serialize(),

	        url:"<?php echo base_url(); ?>TaskController/fetch_subdepart_alll",

	        success:function(data){

	          $('#subdepartment').html(data);

	        }

	      });

	    });

	  });

	</script>

			<?php
        }
    }
    public function fetch_subdepart_alll() {
        // echo "<pre>";
        // print_r($this->input->post('depart_ids'));
        // die;
        $b_all = $this->input->post('depart_ids');
        if (!empty($b_all)) {
            foreach ($b_all as $key => $value) {
                if (!empty($value)) {
                    $data = $this->cm->filter_data("subdepartment", "department_ids", $value);
                    $b = $this->cm->select_data("department", "department_id", $value);
                    if (!empty($data)) {
                        $s_name[$b->department_name] = $data;
                    }
                }
            }
            if (isset($s_name) && !empty($s_name)) {
?>

			<table border="1" class="table">

				<tr>

					<th>Department name</th>

					<th>SubDepartment</th>

				</tr>

				<?php foreach ($s_name as $k => $v) { ?>

				<tr>

					<td><?php echo $k; ?></td>

					<td>

						

						<?php foreach ($v as $m => $n) { ?>

						<input class="ts" onclick="demo(this.id)" id="subdepartment_id<?php echo $m; ?>" type="checkbox"  name="subdepart_ids[]" value="<?php echo $n->subdepartment_id; ?>"><?php echo $n->subdepartment_name; ?>

						<?php
                    } ?>

	 			

					</td>

				</tr>

				<?php
                } ?>

			</table>

						<script type="text/javascript">

	  $(document).ready(function(){

	    $('.ts').change(function(){

	     

	      $.ajax({

	        type:'POST',

	        data:$('#filterForm').serialize(),

	        url:"<?php echo base_url(); ?>TaskController/fetch_hod_alll",

	        success:function(data){

	          $('#hod_id').html(data);

	        }

	      });

	    });

	  });

	</script>

			

			<?php
            }
        }
    }
    public function fetch_hod_alll() {
        $data = $this->input->post();
        if (!empty($data['subdepart_ids'])) {
            $fact_all = $this->tm->view_all_member_event("faculty", "subdepartment_id", $data['subdepart_ids']);
            $hod_all = $this->tm->view_all_member_event("hod", "subdepartment_id", $data['subdepart_ids']);
            $user_all = $this->tm->view_all_member_event_depart("user", "department_ids", $data['depart_ids']);
            $jall = array();
            foreach ($fact_all as $k => $v) {
                $jall[$v->subdepartment_name][] = $v;
            }
            $hall = array();
            foreach ($hod_all as $k => $v) {
                $hall[$v->subdepartment_name][] = $v;
            }
            $uall = array();
            foreach ($user_all as $k => $v) {
                $uall[$v->department_name][] = $v;
            }
?>



			<table class="table">

				<tr>

					<th>Department</th>

					<th>Faculty Name</th>

				</tr>



				<?php foreach ($jall as $m => $n) {
?>

				<tr>

					<th><?php echo $m; ?></th>

					

					<td>

					<?php foreach ($n as $key => $value) { ?>  <?php echo $value->name; ?><input type="checkbox" name="f_all[]" value="<?php echo $value->faculty_id; ?>"> <?php
                } ?>

					

					</td>

				</tr>

				<?php
            } ?>



			</table>





		<table class="table">

				<tr>

					<th>Department</th>

					<th>HOD Name</th>

				</tr>



				<?php foreach ($hall as $m => $n) {
?>

				<tr>

					<th><?php echo $m; ?></th>

					

					<td>

					<?php foreach ($n as $key => $value) { ?>  <?php echo $value->name; ?><input type="checkbox" name="h_all[]" value="<?php echo $value->hod_id; ?>"> <?php
                } ?>

					

					</td>

				</tr>

				<?php
            } ?>



			</table>





		<table class="table">

				<tr>

					<th>Department</th>

					<th>User Name</th>

				</tr>



				<?php foreach ($uall as $m => $n) {
?>

				<tr>

					<th><?php echo $m; ?></th>

					<td>

					<?php foreach ($n as $key => $value) { ?>  <?php echo $value->name; ?><input type="checkbox" name="u_all[]" value="<?php echo $value->user_id; ?>"> <?php
                } ?>

					

					</td>

				</tr>

				<?php
            } ?>



			</table>





	    		

	        <?php
        }
    }
    public function filter_event_cal() {
        $tid = $this->input->post('t');
        if ($tid == "today") { ?>

		<div class="row">

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">

                    <div class="form-group todate">

                      <input type="text" id="date" name="sdate" class="form-control" data-provide="datepicker" placeholder="Date">

                    </div>

                  </div>

                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                    <div class="form-group">

                      <input type="text" name="stime" data-provide="timepicker" id="timepicker" class="form-control" placeholder="Event Start Time">

                    </div>

                  </div>

                </div>

                <script type="text/javascript">

						var date = new Date();

						date.setDate(date.getDate());



						$('#date').datepicker({ 

						    startDate: date

						});



						$('#date1').datepicker({ 

						    startDate: date

						});



						$('#date2').datepicker({ 



						    startDate: date

						});

                </script>



             <?php
        } else if ($tid == "towith") { ?>

             <div class="row">

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">

                    <div class="form-group todate">

                      <input type="text" id="date" name="sdate" class="form-control" data-provide="datepicker" placeholder="Date">

                    </div>

                  </div>

                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                    <div class="form-group">

                      <input type="text" name="stime" data-provide="timepicker" id="timepicker" class="form-control" placeholder="Event Start Time">

                    </div>

                  </div>

                   <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                    <div class="form-group">

                      <input type="text" name="etime" data-provide="timepicker" id="timepicker" class="form-control" placeholder="Event End Time">

                    </div>

                  </div>

                </div>   

                <script type="text/javascript">

                	    

					var date = new Date();

					date.setDate(date.getDate());



					$('#date').datepicker({ 

					    startDate: date

					});



					$('#date1').datepicker({ 

					    startDate: date

					});



					$('#date2').datepicker({ 



					    startDate: date

					});

                </script>

			<?php
        } else { ?>

			 <div class="row">

                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                    <div class="form-group">

                      <input type="text" name="sdate" data-provide="datepicker" class="form-control" id="date1" placeholder="Event Start Date">

                    </div>

                  </div>

                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                    <div class="form-group">

                      <input type="text" name="stime" data-provide="timepicker" id="timepicker" class="form-control" placeholder="Event Start Time">

                    </div>

                  </div>

                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                    <div class="form-group">

                      <input type="text" name="edate" data-provide="datepicker" class="form-control" id="date2" placeholder="Event End Date">

                    </div>

                  </div>

                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

                    <div class="form-group">

                      <input type="text" name="etime" data-provide="timepicker" id="timepicker" class="form-control" placeholder="Event End Time">

                    </div>

                  </div>

                </div>



                <script type="text/javascript">

                	    

						var date = new Date();

						date.setDate(date.getDate());



						$('#date').datepicker({ 

						    startDate: date

						});



						$('#date1').datepicker({ 

						    startDate: date

						});



						$('#date2').datepicker({ 



						    startDate: date

						});

                </script>

			<?php
        }
    }
    public function Inser_all_event() {
        $data = $this->input->post();
        $edata['name'] = $data['taskname'];
        $edata['event_type'] = $data['event_type'];
        $edata['account_id'] = $_SESSION['user_id'];
        $edata['logtype'] = $_SESSION['logtype'];
        if ($data['one'] == "today") {
            if (!empty($data['stime'])) {
                $stime = $data['stime'];
            } else {
                $stime = "00:00:00";
            }
            $edata['start'] = date('Y-m-d', strtotime($data['sdate'])) . "T" . date('H:i:s', strtotime($stime));
        } else if ($data['one'] == "towith") {
            if (!empty($data['stime'])) {
                $stime = $data['stime'];
            } else {
                $stime = "00:00:00";
            }
            if (!empty($data['etime'])) {
                $etime = $data['etime'];
            } else {
                $etime = "00:00:00";
            }
            $edata['start'] = date('Y-m-d', strtotime($data['sdate'])) . "T" . date('H:i:s', strtotime($stime));
            $edata['end'] = date('Y-m-d', strtotime($data['sdate'])) . "T" . date('H:i:s', strtotime($etime));
        } else {
            if (!empty($data['stime'])) {
                $stime = $data['stime'];
            } else {
                $stime = "00:00:00";
            }
            if (!empty($data['etime'])) {
                $etime = $data['etime'];
            } else {
                $etime = "00:00:00";
            }
            $edata['start'] = date('Y-m-d', strtotime($data['sdate'])) . "T" . date('H:i:s', strtotime($stime));
            $edata['end'] = date('Y-m-d', strtotime($data['edate'] . "+1 days")) . "T" . date('H:i:s', strtotime($etime));
        }
        $edata['branch_id'] = implode(",", $data['b_ids']);
        if (!empty($data['depart_ids'])) {
            $edata['department_id'] = implode(",", $data['depart_ids']);
        }
        if (!empty($data['subdepart_ids'])) {
            $edata['subdepartment_id'] = implode(",", $data['subdepart_ids']);
        }
        if (!empty($data['h_all'])) {
            $edata['hod_id'] = implode(",", $data['h_all']);
        }
        if (!empty($data['f_all'])) {
            $edata['faculty_id'] = implode(",", $data['f_all']);
        }
        if (!empty($data['u_all'])) {
            $edata['user_id'] = implode(",", $data['u_all']);
        }
        if ($_SESSION['logtype'] == "Super Admin") {
            $edata['admin_id'] = $data['admin_id'];
        } else {
            $edata['admin_id'] = $_SESSION['admin_id'];
        }
        $this->tm->insert_data("event", $edata);
        logdata(implode(",", $edata) . " Event add");
        return redirect('TaskController/create_event_data');
    }
}
