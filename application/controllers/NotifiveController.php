<?php
class NotifiveController extends CI_controller
{
	function __construct()
	{
		@parent::__construct();
		$this->load->model("Dbcommon", "cm");
		$this->load->model("Quickadmissionprocess", "admi");
		$this->load->model("AdminSettingsModel", "admin");
		$this->load->library("pagination");
		$this->load->library('email');
		$this->load->library('pdf');
		$this->load->helper('cookie');
		$this->load->helper('url');
		
		//$p_data['punch'] = $this->admi->get_mul_reco('DeviceLogs_Processed','UserId','6258');
		// echo "<pre>";
		// print_r($p_data['punch']);
		// die();
		//$p_data['punching'] = $this->admi->get_punching_reco('DeviceLogs_Processed');
		//$e_data['eduzilla'] = $this->cm->view_all("eduzilladata");
		
		// for($i=0; $i<sizeof($e_data['eduzilla']); $i++){
		// 	foreach($p_data['punching'] as $val){
		// 		if($e_data['eduzilla'][$i]->GR_ID == $val->UserId){
		// 			$e_data['eduzilla'][$i]->punching_data[] = array('gr_id'=>$val->UserId,'punch_date'=>$val->LogDate,'log'=>$val->C1,'device'=>$val->DeviceId);
		// 		}
		// 	}
		// }
		
		// echo "<pre>";
		// print_r($e_data['eduzilla']);
		// die();
    }

    public function notification()
    {
        $update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");
		$update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");
		$update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
		$update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
		$update['course_completed'] = $this->cm->course_completed_student("admission_courses");
		$update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
		$update['course_data'] = $this->cm->view_all("course");
		$update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");
        $display['all_batches'] = $this->cm->view_all('batches');

        $display['all_batch_notifive'] = $this->cm->batch_notification_data("admission_courses");
		$reco = array();
		for($i=0; $i<sizeof( $display['all_batch_notifive']); $i++){
			$batch = $this->admi->get_multiple_reco("batches","batches_id",$display['all_batch_notifive'][$i]->batch_id);
			for($j=0; $j<sizeof($batch); $j++){
				$faculty = $this->admi->get_multiple_reco("faculty","faculty_id",$batch[$j]->faculty_id);
				for($k=0; $k<sizeof($faculty); $k++){
				  $reco[]  = $faculty[$k]->name;
				}
			}
		}

		for($r=0; $r<sizeof($reco); $r++){
          $display['all_batch_notifive'][$r]->f_name =  $reco[$r];
		}
		
		$display['all_completed_batch_notifive'] = $this->cm->course_completed_student("admission_courses");
		$freco = array();
		for($i=0; $i<sizeof($display['all_completed_batch_notifive']); $i++){
			$batch = $this->admi->get_multiple_reco("batches","batches_id",$display['all_completed_batch_notifive'][$i]->batch_id);
			for($j=0; $j<sizeof($batch); $j++){
				$faculty = $this->admi->get_multiple_reco("faculty","faculty_id",$batch[$j]->faculty_id);
				for($k=0; $k<sizeof($faculty); $k++){
				  $freco[]  = $faculty[$k]->name;
				}
			}
		}

		for($r=0; $r<sizeof($freco); $r++){
          $display['all_completed_batch_notifive'][$r]->f_name =  $freco[$r];
		}
		$display['all_batch_notifive_count'] = $this->cm->count_batch_notification("admission_courses");
		$display['all_completed_batch_notifive_count'] = $this->cm->count_course_notification("admission_courses");
        $display['all_course_data'] = $this->cm->view_all("rnw_course");
		
        $this->load->view('erp/erpheader', $update);
        $this->load->view('notifive/notification', $display);
    }

	public function send_notifive()
	{
		$update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");
		$update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");
		$update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
		$update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
		$update['course_completed'] = $this->cm->course_completed_student("admission_courses");
		$update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
		$update['course_data'] = $this->cm->view_all("course");
		$update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");

		$display['list_branch'] = $this->cm->view_all('branch');
		$display['list_department'] = $this->cm->view_all('department');
		$display['list_course'] = $this->cm->view_all_by_order("rnw_course","course_name", "asc");
		$display['list_package'] = $this->cm->view_all_by_order("rnw_package","package_name","asc");
		$display['list_sub_course'] = $this->cm->view_all_by_order("rnw_subcourse","subcourse_name","asc");
		$display['list_college_courses'] = $this->cm->view_all_by_order("college_courses","college_course_name","asc");
		$display['list_user'] = $this->cm->view_all_by_order("user","name","asc");
		$display['list_notifive_subject'] = $this->cm->view_all_by_order("notifive_subject","subject","asc");

		$this->load->view('erp/erpheader', $update);
        $this->load->view('notifive/send_notifive',$display);
	}

	public function fetch_branch_wise_department()
	{
		$data = $this->input->post();
		$bid = $data['branch_id'];
		$department = $this->admi->view_all('department');
		echo '<option value="">Select Department</option>';
		foreach ($department as $dn) {
			$flag = 0;
			$dnbi = explode(',', $dn['branch_id']);
			if (in_array($bid, $dnbi)) {
				$flag = 1;
			}
			if ($flag == 1) {
			?>
				<option value="<?php echo $dn['department_id']; ?>"><?php echo $dn['department_name']; ?></option>
			<?php
			}
		}
	}

	public function Ajax_create_subject()
	{
		$data =  $this->input->post();
		$date = date('Y-m-d h:i:s');
		$record = array('subject' => $data['subject'],'created_at' => $date,'addedby' => $_SESSION['user_name']);
		$result = $this->admi->save_data('notifive_subject', $record);

		if ($result) {
			$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
			echo json_encode($recp); // echo "1";
		} else {
			$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp); // echo "2";
		}
	}

	public function Ajax_SendNotifive()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();
			date_default_timezone_set('Asia/Kolkata');
			$date = date('Y-m-d h:i:s');
			unset($data['submit']);

			if (empty($data['gr_id'])) {
				$gr_id = $data['gr_id'] = "";
			} else {
				$gr_id = $data['gr_id'];
			}
			if (empty($data['pay_type'])) {
				$pay_type = $data['pay_type'] = "";
			} else {
				$pay_type = $data['pay_type'];
			}
			if(empty($data['branch_id'])) {
				$branch_id = $data['branch_id'] = "";
			} else {
				$branch_id = $data['branch_id'];
			}
			if (empty($data['department_id'])) {
				$department_id = $data['department_id'] = "";
			} else {
				$department_id = $data['department_id'];
			}
			if (empty($data['type'])) {
				$type = $data['type'] = "";
			} else {
				$type = $data['type'];
			}
			if (empty($data['course_id'])) {
				$course_id = $data['course_id'] = "";
			} else {
				$course_id = $data['course_id'];
			}
			if (empty($data['subcourse_id'])) {
				$subcourse_id = $data['subcourse_id'] = "";
			} else {
				$subcourse_id = $data['subcourse_id'];
			}
			if (empty($data['package_id'])) {
				$package_id = $data['package_id'] = "";
			} else {
				$package_id = $data['package_id'];
			}
			if (empty($data['subpackage_id'])) {
				$subpackage_id = $data['subpackage_id'] = "";
			} else {
				$subpackage_id = $data['subpackage_id'];
			}
			if (empty($data['college_courses_id'])) {
				$college_courses_id = $data['college_courses_id'] = "";
			} else {
				$college_courses_id = $data['college_courses_id'];
			}
			if (empty($data['subject_id'])) {
				$subject_id = $data['subject_id'] = "";
			} else {
				$subject_id = $data['subject_id'];
			}
			if (empty($data['url'])) {
				$url = $data['url'] = "";
			} else {
				$url = $data['url'];
			}
			if (empty($data['text'])) {
				$text = $data['text'] = "";
			} else {
				$text = $data['text'];
			}

			$config['allowed_types'] = "*";
			$config['upload_path'] = FCPATH . "dist/notifive/";
			$new_name = time() . @$_FILES["image_pdf"]['name'];
			$config['file_name'] = $new_name;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('image_pdf')) {
			$imagedata = $this->upload->data();
			$ins_data = $imagedata['file_name'];
			$config['image_library'] = 'gd2';
			$config['source_image'] = './dist/notifive/' . $imagedata['file_name'];
			$config['new_image'] = './dist/notifive/';
			$config['maintain_ratio'] = TRUE;
			$config['width']    = 640;
			$config['height']   = 480;

			$this->load->library('image_lib', $config);

			if (!$this->image_lib->resize()) {
				echo $this->image_lib->display_errors();
			} else {
				// echo "success"; 
			}
			} else {
				$error = array('error' => $this->upload->display_errors());
				$display['msgp'] = "image not uploaded";
			}
			
			$send_notificationdata = array('gr_id'=>$gr_id,'pay_type'=>$pay_type,'branch_id'=>$branch_id,'department_id'=>$department_id,'type'=>$type,'course_id'=>$course_id,'subcourse_id'=>$subcourse_id,'package_id'=>$package_id,'subpackage_id'=>$subpackage_id,'college_courses_id'=>$college_courses_id,'subject_id'=>$subject_id,'url'=>$url,'text'=>$text,'addedby'=>$_SESSION['user_name'],'created_at'=>$date,'image_pdf'=>$ins_data);
			
			$query = $this->db->insert('send_notification', $send_notificationdata);
			if($query) {
				$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
				echo json_encode($recp); // echo "1";
			} else {
				$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
				echo json_encode($recp); // echo "2";
			}
		}
	}
}