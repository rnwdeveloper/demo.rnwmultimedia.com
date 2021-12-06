<?php
class Account extends CI_controller
{
	function __construct()
	{
		@parent::__construct();
		$this->load->library('excel');
		$this->load->model("Dbcommon", "cm");
		$this->load->model("Quickadmissionprocess", "admi");
		$this->load->library("pagination");
		$this->load->library('email');
		$this->load->library('pdf');
		$this->load->helper('cookie');
	}

	public function view_admission()
	{
		$id = $this->input->get('Trl');
		if ($this->input->get('action') == "Qwx") {
			$display['all_list_admission'] = $this->admi->get_idwise_data("admission_process", "admission_id", $id);

			$data = array();
		if (isset($display['all_list_admission'])) {
			foreach ($display['all_list_admission'] as $key => $val) {
				if ($val->type == 'single') {
					$data[] = $this->admi->get_all_record_grid_wise('admission_process', 'admission_id', $val->admission_id, $val->type);
				} else {
					$data[] = $this->admi->get_all_record_grid_wise('admission_process', 'admission_id', $val->admission_id, $val->type);
				}
			}
		}
		
		$alldata = array();
		for ($i = 0; $i < sizeof($data); $i++) {
			if(!empty($data[$i])){
				$record = array();
				$k = 0;
				for($j = 0; $j < sizeof($data); $j++) {
					if(!empty($data[$j])) { 
						if ($data[$i]->gr_id == $data[$j]->gr_id) {
							if ($data[$i]->type == 'single') {
								$record = @$data[$i]->course_name;
							} else if ($data[$i]->type == 'package') {
								$record = @$data[$i]->package_name;
							} else if ($data[$i]->type == 'COLLEGE') {
								$record = @$data[$i]->college_course_name;
							}
						}
					}
				}
				$alldata[$data[$i]->gr_id][$data[$i]->admission_id] = $record;
			}
		}
			for ($i = 0; $i < sizeof($display['all_list_admission']); $i++) {
				foreach ($alldata as $k => $v) {
					if (@$display['all_list_admission'][$i]->gr_id ==  $k) {
						$display['all_list_admission'][$i]->list_multi_course_admission = $v;
					}
				}
			}
			
			$pa = 0;
			foreach ($display['all_list_admission'] as $keys => $vals) {
				$this->db->select_sum('paid_amount');
				$this->db->select('admission_id');
				$this->db->from('admission_installment');
				$this->db->where('admission_id', $vals->admission_id);
				$this->db->count_all();
				$query = $this->db->get();
				$total_ammount[$pa] = $query->result();
				$pa++;
			}
			for($p = 0; $p <sizeof($display['all_list_admission']); $p++) {
				$f =0;
				for($mk =0; $mk<sizeof($total_ammount); $mk++){
					if($display['all_list_admission'][$p]->admission_id == @$total_ammount[$mk][0]->admission_id){
						$f =1;
						$dddd = $mk;
						break;
					}
				} 
				if($f == 1){
					$display['all_list_admission'][$p]->paidcount = $total_ammount[$dddd];
				} else {
					$display['all_list_admission'][$p]->paidcount = 0;
				}
			}
		}

	
		$update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");
		
		$display['list_department'] = $this->cm->view_all("department");
		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("course");
		$display['list_package'] = $this->cm->view_all("package");
		$display['list_source'] = $this->cm->view_all("lead_source");
		$display['list_country'] = $this->cm->view_all("country");
		$display['list_state'] = $this->cm->view_all("state");
		$display['list_city'] = $this->cm->view_all("cities");
		$display['list_area'] = $this->cm->view_all("area");
		$display['list_batch'] = $this->cm->view_all("batch_list");
		$display['all_admission'] = $this->cm->view_all("admission_process");
		$display['hod_all'] = $this->cm->view_all_hod_demo("hod");
		$display['faculty_all'] = $this->cm->view_all("faculty");
		$display['batches_all'] = $this->cm->view_all("batches");
		$display['admisison_process_data'] = $this->cm->view_all("admission_process");
		$display['overdue_fees_counting_list'] = $this->admi->overdue_fees_counting("admission_installment");
		$display['sms_template_list'] = $this->cm->view_all("sms_template");
		$display['list_email_template'] = $this->cm->view_all("email_template_category");
		$display['list_all_admission_count'] = $this->admi->all_count_admission("admission_process");
		$display['list_dropdown_adm'] = $this->cm->view_all("dropdown_adm");
		$display['doc_list'] = $this->cm->view_all("admission_documents");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/view_admission', $display);
	}
	
	public function erpheader()
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
		$update['list_source'] = $this->cm->view_all("source");
		$update['list_department'] = $this->cm->view_all("department");
		$update['list_branch'] = $this->cm->view_all("branch");
		$update['list_course'] = $this->cm->view_all("course");
		$update['list_package'] = $this->cm->view_all("package");
		$update['list_source'] = $this->cm->view_all("source");
		$update['list_country'] = $this->cm->view_all("country");
		$update['list_state'] = $this->cm->view_all("state");
		$update['list_city'] = $this->cm->view_all("cities");
		$update['list_area'] = $this->cm->view_all("area");
		$update['list_batch'] = $this->cm->view_all("batch_list");
		$update['all_admission'] = $this->cm->view_all("admission_process");
		$update['hod_all'] = $this->cm->view_all_hod_demo("hod");
		$update['faculty_all'] = $this->cm->view_all("faculty");
		$update['admisison_process_data'] = $this->cm->view_all("admission_process");
		$update['overdue_fees_counting_list'] = $this->admi->overdue_fees_counting("admission_installment");

		$this->load->view('erp/erpheader', $update);
	}

	public function overdue_fees()
	{
		if (!empty($this->input->post('filter_overdue_fees'))) {
			$filter = $this->input->post();

			$display["overdue_fees_list"] = $this->admi->fetch_overdue_fees("admission_process", $filter);
			$display['filter_fname'] = @$filter['filter_fname'];
			$display['filter_lname'] = @$filter['filter_lname'];
			$display['filter_email'] = @$filter['filter_email'];
			$display['filter_mobile'] = @$filter['filter_mobile'];
			$display['filter_enrollnno'] = @$filter['filter_enrollnno'];
			$display['filter_branch'] = @$filter['filter_branch'];
			$display['filter_course'] = @$filter['filter_course'];
			$display['filter_package'] = @$filter['filter_package'];
			$display['filter_from_date'] = @$filter['filter_from_date'];
			$display['filter_to_date'] = @$filter['filter_to_date'];
			$display['filter_on'] = "dfgf";
		} else {
			$display['overdue_fees_list'] = $this->admi->fetch_overdue_fees("admission_process");
			 date_default_timezone_set("Asia/Calcutta");
             $today = date('Y-m-d');
             $year = date('Y');
             $overdue_reco = array();
             for($k=0; $k<sizeof($display['overdue_fees_list']); $k++){
             	if($display['overdue_fees_list'][$k]->installment_date >= $today && $display['overdue_fees_list'][$k]->paid_amount == "" && $display['overdue_fees_list'][$k]->payment_type != "Adjustment Payment" ){
             		$overdue_reco[] = $display['overdue_fees_list'][$k];
             	}
             }
             
			$branch_id = explode(',',$_SESSION['branch_ids']);
			$admissionreco = array();
			foreach($overdue_reco as $k=>$va){
				$br_id = explode(',',$va->branch_id);
				if($br_id[0] != ''){
					for($i=0; $i<sizeof($branch_id); $i++){
						if(in_array($branch_id[$i],$br_id)){
							$admissionreco[] = $va;
						}
					}
				}
			}

			$newadmissioncre = array();
			for($i=0; $i<sizeof($admissionreco); $i++){
				$admissionId = $admissionreco[$i]->admission_installment_id;
				$flag = 1;
				for($j=0; $j<sizeof($newadmissioncre); $j++){
					if($admissionId == $newadmissioncre[$j]->admission_installment_id){
						$flag =0;
						break;
					}
				}

				if($flag == 1){
					$newadmissioncre[] = $admissionreco[$i];
				}
			}
		    $display['overdue_fees_list'] = $newadmissioncre;
		}


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


		$display['upd_faculty'] = $this->cm->view_all("faculty");
		$display['upd_branch'] = $this->cm->view_all("branch");
		$display['upd_see'] = $this->cm->check_update("demo");
		$display['list_source'] = $this->cm->view_all("source");
		$display['list_department'] = $this->cm->view_all("department");
		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['list_package'] = $this->cm->view_all("rnw_package");
		$display['list_ClgCourses'] = $this->cm->view_all("college_courses");
		$display['list_batch'] = $this->cm->view_all("batch_list");
		$display['all_admission'] = $this->cm->view_all("admission_process");
	
		$display['admisison_process_data'] = $this->cm->view_all("admission_process");
		$display['overdue_fees_counting_list'] = $this->admi->overdue_fees_counting("admission_installment");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/overdue_fees', $display); 
	}

	public function export_csv() {
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        $table_columns = array("Due Date","Name","Year","GR Id","Enrollment No","Email", "Mobile No",'Father Name','Father MobileNo','Type','Course','Installment No','SubTotal Amount','Total Amount','Received Amount','Due Amount');
        $column = 0;
        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
		$listInfo = $this->admi->exportList();
		$list_course = $this->cm->view_all("rnw_course");
		$list_package = $this->cm->view_all("rnw_package");
		$list_ClgCourses = $this->cm->view_all("college_courses");
        $excel_row = 2;
        foreach ($listInfo as $row) {
			if($row->type=="single") {
			$coids = explode(",",$row->course_id);
			foreach($list_course as $co) { if(in_array($co->course_id,$coids)) { 
				$reco = "S : ".$co->course_name; }  }
			} else if($row->type=="package") {
			$paids = explode(",",$row->package_id);
			foreach($list_package as $po) { if(in_array($po->package_id,$paids)) {  
				$reco = "P : ".$po->package_name; }  }
			 } else { $clgids = explode(",",$row->college_courses_id);
			foreach($list_ClgCourses as $clg) { if(in_array($clg->college_courses_id,$clgids)) { 
				$reco = "Clg : ".$clg->college_course_name; }  }
			}
			
			$fullname = $row->first_name." ".$row->surname;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->installment_date);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $fullname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->year);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->gr_id);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->enrollment_number);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->email);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->mobile_no);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->father_name);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->father_mobile_no);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->type);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $reco);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->installment_no);
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->due_amount);
            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->due_amount);
            $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, "0");
            $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->due_amount);
            $excel_row++;
        }
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Overdue.xls"');
        $object_writer->save('php://output');
    }

	public function Outstanding_Fees()
	{

		if (!empty($this->input->post('filter_outstanding_fees'))) {
			$filter = $this->input->post();

			$display['Outstanding_Fees_list'] = $this->admi->fetch_Outstanding_Fees("admission_process", $filter);
			$display['filter_fname'] = @$filter['filter_fname'];
			$display['filter_lname'] = @$filter['filter_lname'];
			$display['filter_email'] = @$filter['filter_email'];
			$display['filter_mobile'] = @$filter['filter_mobile'];
			$display['filter_enrollnno'] = @$filter['filter_enrollnno'];
			$display['filter_branch'] = @$filter['filter_branch'];
			$display['filter_course'] = @$filter['filter_course'];
			$display['filter_package'] = @$filter['filter_package'];
			$display['filter_from_date'] = @$filter['filter_from_date'];
			$display['filter_to_date'] = @$filter['filter_to_date'];
			$display['filter_on'] = "dfgf";
		} else {
			$display['Outstanding_Fees_list'] = $this->admi->fetch_Outstanding_Fees("admission_process");
			date_default_timezone_set("Asia/Calcutta");
             $today = date('Y-m-d');
             $year = date('Y');
             $Outstanding_Fees = array();
             for($k=0; $k<sizeof($display['Outstanding_Fees_list']); $k++){
             	if($display['Outstanding_Fees_list'][$k]->installment_date >= $today && $display['Outstanding_Fees_list'][$k]->paid_amount == "" && $display['Outstanding_Fees_list'][$k]->payment_type != "Adjustment Payment"){
             		$Outstanding_Fees[] = $display['Outstanding_Fees_list'][$k];
             	}
             }	

			$branch_id = explode(',',$_SESSION['branch_ids']);
			$admissionreco = array();
			foreach($Outstanding_Fees as $k=>$va){
				$br_id = explode(',',$va->branch_id);
				if($br_id[0] != ''){
					for($i=0; $i<sizeof($branch_id); $i++){
						if(in_array($branch_id[$i],$br_id)){
							$admissionreco[] = $va;
						}
					}
				}
			}

			$newadmissioncre = array();
			for($i=0; $i<sizeof($admissionreco); $i++){
				$admissionId = $admissionreco[$i]->admission_installment_id;
				$flag = 1;
				for($j=0; $j<sizeof($newadmissioncre); $j++){
					if($admissionId == $newadmissioncre[$j]->admission_installment_id){
						$flag =0;
						break;
					}
				}

				if($flag == 1){
					$newadmissioncre[] = $admissionreco[$i];
				}
			}
		    $display['Outstanding_Fees_list'] = $newadmissioncre;
		}

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


		$display['upd_faculty'] = $this->cm->view_all("faculty");
		$display['upd_branch'] = $this->cm->view_all("branch");
		$display['upd_see'] = $this->cm->check_update("demo");
		$display['list_source'] = $this->cm->view_all("source");
		$display['list_department'] = $this->cm->view_all("department");
		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['list_package'] = $this->cm->view_all("rnw_package");
		$display['list_ClgCourses'] = $this->cm->view_all("college_courses");
		$display['list_batch'] = $this->cm->view_all("batch_list");
		$display['all_admission'] = $this->cm->view_all("admission_process");
		$display['admisison_process_data'] = $this->cm->view_all("admission_process");
		$display['Outstanding_Fees_counting_list'] = $this->admi->outstanding_fees_counting("admission_installment");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/Outstanding_Fees', $display); 
	}

	public function export_Outstanding() {
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        $table_columns = array("Due Date","Name","Year","GR Id","Enrollment No","Email", "Mobile No",'Father Name','Father MobileNo','Type','Course','Installment No','SubTotal Amount','Total Amount','Received Amount','Due Amount');
        $column = 0;
        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
		$listInfo = $this->admi->exportOutstandingList();
		$list_course = $this->cm->view_all("rnw_course");
		$list_package = $this->cm->view_all("rnw_package");
		$list_ClgCourses = $this->cm->view_all("college_courses");
        $excel_row = 2;
        foreach ($listInfo as $row) {
			if($row->type=="single") {
			$coids = explode(",",$row->course_id);
			foreach($list_course as $co) { if(in_array($co->course_id,$coids)) { 
				$reco = "S : ".$co->course_name; }  }
			} else if($row->type=="package") {
			$paids = explode(",",$row->package_id);
			foreach($list_package as $po) { if(in_array($po->package_id,$paids)) {  
				$reco = "P : ".$po->package_name; }  }
			 } else { $clgids = explode(",",$row->college_courses_id);
			foreach($list_ClgCourses as $clg) { if(in_array($clg->college_courses_id,$clgids)) { 
				$reco = "Clg : ".$clg->college_course_name; }  }
			}
			
			$fullname = $row->first_name." ".$row->surname;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->installment_date);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $fullname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->year);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->gr_id);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->enrollment_number);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->email);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->mobile_no);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->father_name);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->father_mobile_no);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->type);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $reco);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->installment_no);
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->due_amount);
            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->due_amount);
            $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, "0");
            $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->due_amount);
            $excel_row++;
        }
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Outstanding.xls"');
        $object_writer->save('php://output');
    }

	public function income()
	{
		if (!empty($this->input->post('filter_income_fees'))) {
			$filter = $this->input->post();

			$display['income_list'] = $this->admi->fetch_income("admissin_receipt", $filter);
			$display['filter_gr_id'] = @$filter['filter_gr_id'];
			$display['filter_enrollnno'] = @$filter['filter_enrollnno'];
			$display['filter_branch'] = @$filter['filter_branch'];
			$display['filter_course'] = @$filter['filter_course'];
			$display['filter_package'] = @$filter['filter_package'];
			$display['filter_clg'] = @$filter['filter_clg'];
			$display['filter_from_date'] = @$filter['filter_from_date'];
			$display['filter_to_date'] = @$filter['filter_to_date'];
			$display['filter_on'] = "dfgf";
		} else {
			$display['income_list'] = $this->admi->fetch_income("admissin_receipt");
			$branch_id = explode(',',$_SESSION['branch_ids']);
			$admissionreco = array();
			foreach($display['income_list'] as $k=>$va){
				$br_id = explode(',',$va->branch_id);
				if($br_id[0] != ''){
					for($i=0; $i<sizeof($branch_id); $i++){
						if(in_array($branch_id[$i],$br_id)){
							$admissionreco[] = $va;
						}
					}
				}
			}

			$newadmissioncre = array();
			for($i=0; $i<sizeof($admissionreco); $i++){
				$admissionId = $admissionreco[$i]->admission_id;
				$flag = 1;
				for($j=0; $j<sizeof($newadmissioncre); $j++){
					if($admissionId == $newadmissioncre[$j]->admission_id){
						$flag =0;
						break;
					}
				}

				if($flag == 1){
					$newadmissioncre[] = $admissionreco[$i];
				}
			}
		    $display['income_list'] = $newadmissioncre;
		}

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


		$display['upd_faculty'] = $this->cm->view_all("faculty");
		$display['upd_branch'] = $this->cm->view_all("branch");
		$display['upd_see'] = $this->cm->check_update("demo");
		$display['list_source'] = $this->cm->view_all("source");
		$display['list_department'] = $this->cm->view_all("department");
		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['list_package'] = $this->cm->view_all("rnw_package");
		$display['list_clg_course'] = $this->cm->view_all("college_courses");
		$display['list_source'] = $this->cm->view_all("source");
		$display['list_country'] = $this->cm->view_all("country");
		$display['list_state'] = $this->cm->view_all("state");
		$display['list_city'] = $this->cm->view_all("cities");
		$display['list_area'] = $this->cm->view_all("area");
		$display['list_batch'] = $this->cm->view_all("batch_list");
		$display['all_admission'] = $this->cm->view_all("admission_process");
		$display['hod_all'] = $this->cm->view_all_hod_demo("hod");
		$display['faculty_all'] = $this->cm->view_all("faculty");
		$display['admisison_process_data'] = $this->cm->view_all("admission_process");
		$display['current_month_fees_counting_list'] = $this->admi->corrent_month_income_counting("admission_installment");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/income', $display);
	}

	public function Adjustment()
	{
		if (!empty($this->input->post('filter_Adjustment_fees'))) {
			$filter = $this->input->post();
			$display['Adjustment_list'] = $this->admi->fetch_Adjustment("admission_installment", $filter);
			$display['filter_gr_id'] = @$filter['filter_gr_id'];
			$display['filter_enrollnno'] = @$filter['filter_enrollnno'];
			$display['filter_branch'] = @$filter['filter_branch'];
			$display['filter_course'] = @$filter['filter_course'];
			$display['filter_package'] = @$filter['filter_package'];
			$display['filter_clg'] = @$filter['filter_clg'];
			$display['filter_from_date'] = @$filter['filter_from_date'];
			$display['filter_to_date'] = @$filter['filter_to_date'];
			$display['filter_on'] = "dfgf";
		} else {
			$display['Adjustment_list'] = $this->admi->fetch_Adjustment("admission_installment");
			$branch_id = explode(',',$_SESSION['branch_ids']);
			$admissionreco = array();
			foreach($display['Adjustment_list'] as $k=>$va){
				$br_id = explode(',',$va->branch_id);
				if($br_id[0] != ''){
					for($i=0; $i<sizeof($branch_id); $i++){
						if(in_array($branch_id[$i],$br_id)){
							$admissionreco[] = $va;
						}
					}
				}
			}

			$newadmissioncre = array();
			for($i=0; $i<sizeof($admissionreco); $i++){
				$admissionId = $admissionreco[$i]->admission_id;
				$flag = 1;
				for($j=0; $j<sizeof($newadmissioncre); $j++){
					if($admissionId == $newadmissioncre[$j]->admission_id){
						$flag =0;
						break;
					}
				}

				if($flag == 1){
					$newadmissioncre[] = $admissionreco[$i];
				}
			}
		    $display['Adjustment_list'] = $newadmissioncre;
		}

		
		$update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");
		
		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['list_package'] = $this->cm->view_all("rnw_package");
		$display['list_clg_course'] = $this->cm->view_all("college_courses");
		$display['admisison_process_data'] = $this->cm->view_all("admission_process");
		$display['current_month_fees_counting_list'] = $this->admi->corrent_month_income_counting("admission_installment");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/Adjustment', $display);
	}

	public function expenses()
	{
		if (!empty($this->input->post('filter_expenses'))) {
			$filter = $this->input->post();

			$display['list_expenses'] = $this->admi->get_expenses_record("expenses", $filter);
			$display['filter_branch'] = @$filter['filter_branch'];
			$display['filter_payment_mode'] = @$filter['filter_payment_mode'];
			$display['filter_expenses_category_id'] = @$filter['filter_expenses_category_id'];
			$display['filter_expenses_subcategory_id'] = @$filter['filter_expenses_subcategory_id'];
			$display['filter_created_by'] = @$filter['filter_created_by'];
			$display['filter_from_date'] = @$filter['filter_from_date'];
			$display['filter_to_date'] = @$filter['filter_to_date'];
			$display['filter_on'] = "dfgf";
		} else {
			$display['list_expenses'] = $this->admi->get_expenses_record("expenses");
			$branch_id = explode(',',$_SESSION['branch_ids']);
			$expreco = array();
			foreach($display['list_expenses'] as $k=>$va){
				$br_id = explode(',',$va->branch_id);
				if($br_id[0] != ''){
					for($i=0; $i<sizeof($branch_id); $i++){
						if(in_array($branch_id[$i],$br_id)){
							$expreco[] = $va;
						}
					}
				}
			}

			$newexpreco = array();
			for($i=0; $i<sizeof($expreco); $i++){
				$expensesId = $expreco[$i]->expenses_id;
				$flag = 1;
				for($j=0; $j<sizeof($newexpreco); $j++){
					if($expensesId == $newexpreco[$j]->expenses_id){
						$flag =0;
						break;
					}
				}

				if($flag == 1){
					$newexpreco[] = $expreco[$i];
				}
			}
		    $display['list_expenses'] = $newexpreco;
		}

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


		$display['upd_faculty'] = $this->cm->view_all("faculty");
		$display['upd_branch'] = $this->cm->view_all("branch");
		$display['upd_see'] = $this->cm->check_update("demo");
		$display['list_source'] = $this->cm->view_all("source");
		$display['list_department'] = $this->cm->view_all("department");
		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("course");
		$display['list_package'] = $this->cm->view_all("package");
		$display['list_source'] = $this->cm->view_all("source");
		$display['list_country'] = $this->cm->view_all("country");
		$display['list_state'] = $this->cm->view_all("state");
		$display['list_city'] = $this->cm->view_all("cities");
		$display['list_area'] = $this->cm->view_all("area");
		$display['list_batch'] = $this->cm->view_all("batch_list");
		$display['all_admission'] = $this->cm->view_all("admission_process");
		$display['hod_all'] = $this->cm->view_all_hod_demo("hod");
		$display['faculty_all'] = $this->cm->view_all("faculty");
		$display['list_expenses_category'] = $this->cm->view_all("expenses_category");
		$display['list_expenses_subcategory'] = $this->cm->view_all("expenses_subcategory");
		$display['all_user'] = $this->admi->view_Accountant_record("user");
		$display['admin_reco'] = $this->cm->view_all("admin");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/expenses', $display);
	}

	public function expenses_dlt()
	{
		if (!empty($this->input->post('filter_expenses'))) {
			$filter = $this->input->post();

			$display['list_expenses'] = $this->admi->get_expenses_record("expenses", $filter);
			$display['filter_branch'] = @$filter['filter_branch'];
			$display['filter_payment_mode'] = @$filter['filter_payment_mode'];
			$display['filter_expenses_category_id'] = @$filter['filter_expenses_category_id'];
			$display['filter_expenses_subcategory_id'] = @$filter['filter_expenses_subcategory_id'];
			$display['filter_from_date'] = @$filter['filter_from_date'];
			$display['filter_to_date'] = @$filter['filter_to_date'];
			$display['filter_on'] = "dfgf";
		} else {
			$display['list_expenses'] = $this->admi->get_expenses_record("expenses");
			$branch_id = explode(',',$_SESSION['branch_ids']);
			$expreco = array();
			foreach($display['list_expenses'] as $k=>$va){
				$br_id = explode(',',$va->branch_id);
				if($br_id[0] != ''){
					for($i=0; $i<sizeof($branch_id); $i++){
						if(in_array($branch_id[$i],$br_id)){
							$expreco[] = $va;
						}
					}
				}
			}

			$newexpreco = array();
			for($i=0; $i<sizeof($expreco); $i++){
				$expensesId = $expreco[$i]->expenses_id;
				$flag = 1;
				for($j=0; $j<sizeof($newexpreco); $j++){
					if($expensesId == $newexpreco[$j]->expenses_id){
						$flag =0;
						break;
					}
				}

				if($flag == 1){
					$newexpreco[] = $expreco[$i];
				}
			}
		    $display['list_expenses'] = $newexpreco;
		}

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


		$display['upd_faculty'] = $this->cm->view_all("faculty");
		$display['upd_branch'] = $this->cm->view_all("branch");
		$display['upd_see'] = $this->cm->check_update("demo");
		$display['list_source'] = $this->cm->view_all("source");
		$display['list_department'] = $this->cm->view_all("department");
		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("course");
		$display['list_package'] = $this->cm->view_all("package");
		$display['list_source'] = $this->cm->view_all("source");
		$display['list_country'] = $this->cm->view_all("country");
		$display['list_state'] = $this->cm->view_all("state");
		$display['list_city'] = $this->cm->view_all("cities");
		$display['list_area'] = $this->cm->view_all("area");
		$display['list_batch'] = $this->cm->view_all("batch_list");
		$display['all_admission'] = $this->cm->view_all("admission_process");
		$display['hod_all'] = $this->cm->view_all_hod_demo("hod");
		$display['faculty_all'] = $this->cm->view_all("faculty");
		$display['list_expenses_category'] = $this->cm->view_all("expenses_category");
		$display['list_expenses_subcategory'] = $this->cm->view_all("expenses_subcategory");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/expenses_dlt', $display);
	}

	public function other_income()
	{
		if (!empty($this->input->post('filter_otherincome'))) {
			$filter = $this->input->post();

			$display['list_other_income'] = $this->admi->get_other_income_record("other_income", $filter);
			$display['filter_branch'] = @$filter['filter_branch'];
			$display['filter_payment_mode'] = @$filter['filter_payment_mode'];
			$display['filter_subject_id'] = @$filter['filter_subject_id'];
			$display['filter_from_date'] = @$filter['filter_from_date'];
			$display['filter_to_date'] = @$filter['filter_to_date'];
			$display['filter_on'] = "dfgf";
		} else {
			$display['list_other_income'] = $this->admi->get_other_income_record("other_income");
			$branch_id = explode(',',$_SESSION['branch_ids']);
			$expreco = array();
			foreach($display['list_other_income'] as $k=>$va){
				$br_id = explode(',',$va->branch_id);
				if($br_id[0] != ''){
					for($i=0; $i<sizeof($branch_id); $i++){
						if(in_array($branch_id[$i],$br_id)){
							$expreco[] = $va;
						}
					}
				}
			}

			$newexpreco = array();
			for($i=0; $i<sizeof($expreco); $i++){
				$expensesId = $expreco[$i]->other_income_id;
				$flag = 1;
				for($j=0; $j<sizeof($newexpreco); $j++){
					if($expensesId == $newexpreco[$j]->other_income_id){
						$flag =0;
						break;
					}
				}

				if($flag == 1){
					$newexpreco[] = $expreco[$i];
				}
			}
		    $display['list_other_income'] = $newexpreco;
		}

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


		$display['upd_faculty'] = $this->cm->view_all("faculty");
		$display['upd_branch'] = $this->cm->view_all("branch");
		$display['upd_see'] = $this->cm->check_update("demo");
		$display['list_source'] = $this->cm->view_all("source");
		$display['list_department'] = $this->cm->view_all("department");
		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("course");
		$display['list_package'] = $this->cm->view_all("package");
		$display['list_source'] = $this->cm->view_all("source");
		$display['list_country'] = $this->cm->view_all("country");
		$display['list_state'] = $this->cm->view_all("state");
		$display['list_city'] = $this->cm->view_all("cities");
		$display['list_area'] = $this->cm->view_all("area");
		$display['list_batch'] = $this->cm->view_all("batch_list");
		$display['all_admission'] = $this->cm->view_all("admission_process");
		$display['hod_all'] = $this->cm->view_all_hod_demo("hod");
		$display['faculty_all'] = $this->cm->view_all("faculty");
		$display['list_subject'] = $this->cm->view_all("subject");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/other_income', $display);
	}

	public function Ajax_Expenses_category()
	{
		$data =  $this->input->post();

		$record = array('category_name' => $data['category_name']);

		$result = $this->admi->save_data('expenses_category', $record);

		if ($result) {
			$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");

			echo json_encode($recp); // echo "1";
		} else {
			$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");

			echo json_encode($recp); // echo "2";
		}
	}

	public function Ajax_category()
	{
		$data =  $this->input->post();
		date_default_timezone_set('Asia/Kolkata');
		$created_date = date('Y-m-d');
		$created_by = $_SESSION['user_name'];
		
		$record = array('subject_name' => $data['subject_name'],'created_date' => $created_date,'created_by' => $created_by);

		$result = $this->admi->save_data('subject', $record);

		if ($result) {
			$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");

			echo json_encode($recp); // echo "1";
		} else {
			$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");

			echo json_encode($recp); // echo "2";
		}
	}

	public function Ajax_Expenses_subcategory()
	{
		$data =  $this->input->post();

		$record = array('expenses_category_id' => $data['category_id'], 'subcategory_name' => $data['subcategory_name']);

		$result = $this->admi->save_data('expenses_subcategory', $record);

		if ($result) {
			$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");

			echo json_encode($recp); // echo "1";
		} else {
			$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");

			echo json_encode($recp); // echo "2";
		}
	}

	public function fetch_bank_info()
	{
		$id = $this->input->post('paid_mode_id');
		echo $list_bank = $this->admi->get_bank_info("bank_info", $id);
	}

	public function fetch_expenses_subcate()
	{
		$id = $this->input->post('expenses_category_id');
		echo $list_expenses_subcate = $this->admi->get_expenses_subcate("expenses_subcategory", $id);
	}

	public function Ajax_Expenses()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();
			date_default_timezone_set('Asia/Kolkata');
			$date = date('Y-m-d h:i:s');
			$expensesdata['created_at'] = $date;
			unset($data['submit']);

			if ($data['payment_mode'] == "Cheque") {
				if (empty($data['cheque_status'])) {
					$cheque_status = $data['cheque_status'] = "";
				} else {
					$cheque_status = $data['cheque_status'];
				}
	
				if (empty($data['cheque_holder_name'])) {
					$cheque_holder_name = $data['cheque_holder_name'] = "";
				} else {
					$cheque_holder_name = $data['cheque_holder_name'];
				}
	
				if (empty($data['cheque_dd_no'])) {
					$cheque_no = $data['cheque_dd_no'] = "";
				} else {
					$cheque_no = $data['cheque_dd_no'];
				}
	
				if (empty($data['cheque_dd_date'])) {
					$cheque_date = $data['cheque_dd_date'] = "";
				} else {
					$cheque_date = $data['cheque_dd_date'];
				}
	
				if (empty($data['bank_name'])) {
					$bank_name = $data['bank_name'] = "";
				} else {
					$bank_name = $data['bank_name'];
				}
	
				if (empty($data['bank_branch_name'])) {
					$bank_branch_name = $data['bank_branch_name'] = "";
				} else {
					$bank_branch_name = $data['bank_branch_name'];
				}
			}
	
			if ($data['payment_mode'] == "DD") {
	
				if (empty($data['dd_cheque_holder_name'])) {
					$cheque_holder_name = $data['dd_cheque_holder_name'] = "";
				} else {
					$cheque_holder_name = $data['dd_cheque_holder_name'];
				}
				if (empty($data['dd_cheque_dd_no'])) {
					$cheque_no = $data['dd_cheque_dd_no'] = "";
				} else {
					$cheque_no = $data['dd_cheque_dd_no'];
				}
	
				if (empty($data['dd_cheque_status'])) {
					$cheque_status = $data['dd_cheque_status'] = "";
				} else {
					$cheque_status = $data['dd_cheque_status'];
				}
	
				if (empty($data['dd_cheque_dd_date'])) {
					$cheque_date = $data['dd_cheque_dd_date'] = "";
				} else {
					$cheque_date = $data['dd_cheque_dd_date'];
				}
	
				if (empty($data['dd_bank_name'])) {
					$bank_name = $data['dd_bank_name'] = "";
				} else {
					$bank_name = $data['dd_bank_name'];
				}
	
				if (empty($data['dd_bank_branch_name'])) {
					$bank_branch_name = $data['dd_bank_branch_name'] = "";
				} else {
					$bank_branch_name = $data['dd_bank_branch_name'];
				}
			}
	
			if ($data['payment_mode'] == "Credit Card") {
	
				if (empty($data['cradit_card_transaction_no'])) {
					$transaction_no = $data['cradit_card_transaction_no'] = "";
				} else {
					$transaction_no = $data['cradit_card_transaction_no'];
				}
	
				if (empty($data['cradit_card_transaction_date'])) {
					$transaction_date = $data['cradit_card_transaction_date'] = "";
				} else {
					$transaction_date = $data['cradit_card_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Debit Card") {
				if (empty($data['debit_card_transaction_no'])) {
					$transaction_no = $data['debit_card_transaction_no'] = "";
				} else {
					$transaction_no = $data['debit_card_transaction_no'];
				}
	
				if (empty($data['debit_card_transaction_date'])) {
					$transaction_date = $data['debit_card_transaction_date'] = "";
				} else {
					$transaction_date = $data['debit_card_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Online Payment") {
				if (empty($data['online_payment_transaction_no'])) {
					$transaction_no = $data['online_payment_transaction_no'] = "";
				} else {
					$transaction_no = $data['online_payment_transaction_no'];
				}
	
				if (empty($data['online_payment_transaction_date'])) {
					$transaction_date = $data['online_payment_transaction_date'] = "";
				} else {
					$transaction_date = $data['online_payment_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "NEFT / IMPS") {
				if (empty($data['neft_imps_transaction_no'])) {
					$transaction_no = $data['neft_imps_transaction_no'] = "";
				} else {
					$transaction_no = $data['neft_imps_transaction_no'];
				}
	
				if (empty($data['neft_imps_transaction_date'])) {
					$transaction_date = $data['neft_imps_transaction_date'] = "";
				} else {
					$transaction_date = $data['neft_imps_transaction_date'];
				}
	
				if (empty($data['neft_imps_bank_name'])) {
					$bank_name = $data['neft_imps_bank_name'] = "";
				} else {
					$bank_name = $data['neft_imps_bank_name'];
				}
	
				if (empty($data['neft_imps_bank_branch_name'])) {
					$bank_branch_name = $data['neft_imps_bank_branch_name'] = "";
				} else {
					$bank_branch_name = $data['neft_imps_bank_branch_name'];
				}
			}
	
			if ($data['payment_mode'] == "Paytm") {
				if (empty($data['paytm_transaction_no'])) {
					$transaction_no = $data['paytm_transaction_no'] = "";
				} else {
					$transaction_no = $data['paytm_transaction_no'];
				}
	
				if (empty($data['paytm_transaction_date'])) {
					$transaction_date = $data['paytm_transaction_date'] = "";
				} else {
					$transaction_date = $data['paytm_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Banck Deposit (Cash)") {
				if (empty($data['bank_deposit_transaction_no'])) {
					$transaction_no = $data['bank_deposit_transaction_no'] = "";
				} else {
					$transaction_no = $data['bank_deposit_transaction_no'];
				}
	
				if (empty($data['bank_deposit_transaction_date'])) {
					$transaction_date = $data['bank_deposit_transaction_date'] = "";
				} else {
					$transaction_date = $data['bank_deposit_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Capital Float (EMI)") {
				if (empty($data['capital_float_transaction_no'])) {
					$transaction_no = $data['capital_float_transaction_no'] = "";
				} else {
					$transaction_no = $data['capital_float_transaction_no'];
				}
	
				if (empty($data['capital_float_transaction_date'])) {
					$transaction_date = $data['capital_float_transaction_date'] = "";
				} else {
					$transaction_date = $data['capital_float_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Google Pay") {
				if (empty($data['google_pay_transaction_no'])) {
					$transaction_no = $data['google_pay_transaction_no'] = "";
				} else {
					$transaction_no = $data['google_pay_transaction_no'];
				}
	
				if (empty($data['google_pay_transaction_date'])) {
					$transaction_date = $data['google_pay_transaction_date'] = "";
				} else {
					$transaction_date = $data['google_pay_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Phone Pay") {
				if (empty($data['phone_pay_transaction_no'])) {
					$transaction_no = $data['phone_pay_transaction_no'] = "";
				} else {
					$transaction_no = $data['phone_pay_transaction_no'];
				}
	
				if (empty($data['phone_pay_transaction_date'])) {
					$transaction_date = $data['phone_pay_transaction_date'] = "";
				} else {
					$transaction_date = $data['phone_pay_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Bajaj Finserv (EMI)") {
				if (empty($data['bajaj_finserv_transaction_date'])) {
					$transaction_no = $data['bajaj_finserv_transaction_date'] = "";
				} else {
					$transaction_no = $data['bajaj_finserv_transaction_date'];
				}
	
				if (empty($data['bajaj_finserv_transaction_date'])) {
					$transaction_date = $data['bajaj_finserv_transaction_date'] = "";
				} else {
					$transaction_date = $data['bajaj_finserv_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Bhim UPI(India)") {
				if (empty($data['bhim_upi_transaction_no'])) {
					$transaction_no = $data['bhim_upi_transaction_no'] = "";
				} else {
					$transaction_no = $data['bhim_upi_transaction_no'];
				}
	
				if (empty($data['bhim_upi_transaction_date'])) {
					$transaction_date = $data['bhim_upi_transaction_date'] = "";
				} else {
					$transaction_date = $data['bhim_upi_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Instamojo") {
				if (empty($data['instamoj_transaction_no'])) {
					$transaction_no = $data['instamoj_transaction_no'] = "";
				} else {
					$transaction_no = $data['instamoj_transaction_no'];
				}
	
				if (empty($data['instamoj_transaction_date'])) {
					$transaction_date = $data['instamoj_transaction_date'] = "";
				} else {
					$transaction_date = $data['instamoj_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Paypal") {
				if (empty($data['pay_pal_transaction_no'])) {
					$transaction_no = $data['pay_pal_transaction_no'] = "";
				} else {
					$transaction_no = $data['pay_pal_transaction_no'];
				}
	
				if (empty($data['pay_pal_transaction_date'])) {
					$transaction_date = $data['pay_pal_transaction_date'] = "";
				} else {
					$transaction_date = $data['pay_pal_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Razorpay") {
				if (empty($data['razorpay_transaction_no'])) {
					$transaction_no = $data['razorpay_transaction_no'] = "";
				} else {
					$transaction_no = $data['razorpay_transaction_no'];
				}
	
				if (empty($data['razorpay_transaction_date'])) {
					$transaction_date = $data['razorpay_transaction_date'] = "";
				} else {
					$transaction_date = $data['razorpay_transaction_date'];
				}
			}

			    $expensesdata['pay_type'] = $data['pay_type'];
			    $expensesdata['branch_id'] = $data['branch_id'];
			    $expensesdata['pay_for'] = $data['pay_for'];
			    $expensesdata['payment_mode'] = $data['payment_mode'];

			if ($data['payment_mode'] == "Cheque") {
				$expensesdata['cheque_no'] = $cheque_no;
				$expensesdata['cheque_date'] = $cheque_date;
				$expensesdata['bank_name'] = $bank_name;
				$expensesdata['bank_branch_name'] = $bank_branch_name;
				$expensesdata['cheque_status'] = $cheque_status;
				$expensesdata['cheque_holder_name'] = $cheque_holder_name;
			}
	
			if ($data['payment_mode'] == "DD") {
				$expensesdata['cheque_no'] = $cheque_no;
				$expensesdata['cheque_date'] = $cheque_date;
				$expensesdata['bank_name'] = $bank_name;
				$expensesdata['bank_branch_name'] = $bank_branch_name;
				$expensesdata['cheque_status'] = $cheque_status;
				$expensesdata['cheque_holder_name'] = $cheque_holder_name;
			}
	
			if ($data['payment_mode'] == "Credit Card") {
				$expensesdata['transaction_no'] = $transaction_no;
				$expensesdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Debit Card") {
				$expensesdata['transaction_no'] = $transaction_no;
				$expensesdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Debit Card") {
				$expensesdata['transaction_no'] = $transaction_no;
				$expensesdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Online Payment") {
				$expensesdata['transaction_no'] = $transaction_no;
				$expensesdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "NEFT / IMPS") {
				$expensesdata['transaction_no'] = $transaction_no;
				$expensesdata['transaction_date'] = $transaction_date;
				$expensesdata['bank_name'] = $bank_name;
				$expensesdata['bank_branch_name'] = $bank_branch_name;
			}
	
			if ($data['payment_mode'] == "Paytm") {
				$expensesdata['transaction_no'] = $transaction_no;
				$expensesdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Banck Deposit (Cash)") {
				$expensesdata['transaction_no'] = $transaction_no;
				$expensesdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Capital Float (EMI)") {
				$expensesdata['transaction_no'] = $transaction_no;
				$expensesdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Google Pay") {
				$expensesdata['transaction_no'] = $transaction_no;
				$expensesdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Phone Pay") {
				$expensesdata['transaction_no'] = $transaction_no;
				$expensesdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Bajaj Finserv (EMI)") {
				$expensesdata['transaction_no'] = $transaction_no;
				$expensesdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Bhim UPI(India)") {
				$expensesdata['transaction_no'] = $transaction_no;
				$expensesdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Instamojo") {
				$expensesdata['transaction_no'] = $transaction_no;
				$expensesdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Paypal") {
				$expensesdata['transaction_no'] = $transaction_no;
				$expensesdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Razorpay") {
				$expensesdata['transaction_no'] = $transaction_no;
				$expensesdata['transaction_date'] = $transaction_date;
			}

				$expensesdata['paying_amount'] = $data['paying_amount'];
				$expensesdata['info'] = $data['info'];
				$expensesdata['expenses_category_id'] = $data['expenses_category_id'];
				$expensesdata['expenses_subcategory_id'] = $data['expenses_subcategory_id'];
				$expensesdata['pay_date'] = $data['pay_date'];
				$expensesdata['paid_by'] = $data['paid_by'];
				$expensesdata['comment'] = $data['comment'];

				if($data['pay_for']=="Student") {
					$expensesdata['admission_id'] = $data['admissionids'];
					$expensesdata['gr_id'] = $data['grids'];
					$expensesdata['type'] = $data['ctype'];
					$expensesdata['fullname'] = $data['fullname'];
					if($data['ctype']=="single"){
						$expensesdata['course_id'] = $data['allco'];
					} else if($data['ctype']=="package"){
						$expensesdata['package_id'] = $data['allco'];
					} else {
						$expensesdata['college_courses_id'] = $data['allco'];
					}
				} else {
					$expensesdata['admission_id'] = "";
					$expensesdata['gr_id'] = "";
					$expensesdata['type'] = "";
					$expensesdata['fullname'] = "";
					$expensesdata['course_id'] = "";
					$expensesdata['package_id'] = "";
					$expensesdata['college_courses_id'] = "";
				}

			if ($this->input->post('expenses_id')) {
				$id = $this->input->post('expenses_id');

				unset($data['expenses_id']);
				$query = $this->admi->expenses_record_upd('expenses', $expensesdata, 'expenses_id', $id);
				if ($query) {
					$recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			} else {
				unset($data['expenses_id']); 
				$expensesdata['addedby'] =  $_SESSION['user_name'];
				$query = $this->admi->import_expenses('expenses', $expensesdata);
				if ($query) {
					$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			}
		}
	}

	public function get_record_expenses()
	{
		$id = $this->input->post('expenses_id');
		$record['single_record'] = $this->admi->get_expenses('expenses', 'expenses_id', $id);
		echo json_encode($record);
	}

	public function Ajax_otherincome()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();
			date_default_timezone_set('Asia/Kolkata');
			$date = date('d-m-y h:i:s');
			$otherdata['created_at'] = $date;
			unset($data['submit']);

			if ($data['payment_mode'] == "Cheque") {
				if (empty($data['cheque_status'])) {
					$cheque_status = $data['cheque_status'] = "";
				} else {
					$cheque_status = $data['cheque_status'];
				}
	
				if (empty($data['cheque_holder_name'])) {
					$cheque_holder_name = $data['cheque_holder_name'] = "";
				} else {
					$cheque_holder_name = $data['cheque_holder_name'];
				}
	
				if (empty($data['cheque_dd_no'])) {
					$cheque_no = $data['cheque_dd_no'] = "";
				} else {
					$cheque_no = $data['cheque_dd_no'];
				}
	
				if (empty($data['cheque_dd_date'])) {
					$cheque_date = $data['cheque_dd_date'] = "";
				} else {
					$cheque_date = $data['cheque_dd_date'];
				}
	
				if (empty($data['bank_name'])) {
					$bank_name = $data['bank_name'] = "";
				} else {
					$bank_name = $data['bank_name'];
				}
	
				if (empty($data['bank_branch_name'])) {
					$bank_branch_name = $data['bank_branch_name'] = "";
				} else {
					$bank_branch_name = $data['bank_branch_name'];
				}
			}
	
			if ($data['payment_mode'] == "DD") {
	
				if (empty($data['dd_cheque_holder_name'])) {
					$cheque_holder_name = $data['dd_cheque_holder_name'] = "";
				} else {
					$cheque_holder_name = $data['dd_cheque_holder_name'];
				}
				if (empty($data['dd_cheque_dd_no'])) {
					$cheque_no = $data['dd_cheque_dd_no'] = "";
				} else {
					$cheque_no = $data['dd_cheque_dd_no'];
				}
	
				if (empty($data['dd_cheque_status'])) {
					$cheque_status = $data['dd_cheque_status'] = "";
				} else {
					$cheque_status = $data['dd_cheque_status'];
				}
	
				if (empty($data['dd_cheque_dd_date'])) {
					$cheque_date = $data['dd_cheque_dd_date'] = "";
				} else {
					$cheque_date = $data['dd_cheque_dd_date'];
				}
	
				if (empty($data['dd_bank_name'])) {
					$bank_name = $data['dd_bank_name'] = "";
				} else {
					$bank_name = $data['dd_bank_name'];
				}
	
				if (empty($data['dd_bank_branch_name'])) {
					$bank_branch_name = $data['dd_bank_branch_name'] = "";
				} else {
					$bank_branch_name = $data['dd_bank_branch_name'];
				}
			}
	
			if ($data['payment_mode'] == "Credit Card") {
	
				if (empty($data['cradit_card_transaction_no'])) {
					$transaction_no = $data['cradit_card_transaction_no'] = "";
				} else {
					$transaction_no = $data['cradit_card_transaction_no'];
				}
	
				if (empty($data['cradit_card_transaction_date'])) {
					$transaction_date = $data['cradit_card_transaction_date'] = "";
				} else {
					$transaction_date = $data['cradit_card_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Debit Card") {
				if (empty($data['debit_card_transaction_no'])) {
					$transaction_no = $data['debit_card_transaction_no'] = "";
				} else {
					$transaction_no = $data['debit_card_transaction_no'];
				}
	
				if (empty($data['debit_card_transaction_date'])) {
					$transaction_date = $data['debit_card_transaction_date'] = "";
				} else {
					$transaction_date = $data['debit_card_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Online Payment") {
				if (empty($data['online_payment_transaction_no'])) {
					$transaction_no = $data['online_payment_transaction_no'] = "";
				} else {
					$transaction_no = $data['online_payment_transaction_no'];
				}
	
				if (empty($data['online_payment_transaction_date'])) {
					$transaction_date = $data['online_payment_transaction_date'] = "";
				} else {
					$transaction_date = $data['online_payment_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "NEFT / IMPS") {
				if (empty($data['neft_imps_transaction_no'])) {
					$transaction_no = $data['neft_imps_transaction_no'] = "";
				} else {
					$transaction_no = $data['neft_imps_transaction_no'];
				}
	
				if (empty($data['neft_imps_transaction_date'])) {
					$transaction_date = $data['neft_imps_transaction_date'] = "";
				} else {
					$transaction_date = $data['neft_imps_transaction_date'];
				}
	
				if (empty($data['neft_imps_bank_name'])) {
					$bank_name = $data['neft_imps_bank_name'] = "";
				} else {
					$bank_name = $data['neft_imps_bank_name'];
				}
	
				if (empty($data['neft_imps_bank_branch_name'])) {
					$bank_branch_name = $data['neft_imps_bank_branch_name'] = "";
				} else {
					$bank_branch_name = $data['neft_imps_bank_branch_name'];
				}
			}
	
			if ($data['payment_mode'] == "Paytm") {
				if (empty($data['paytm_transaction_no'])) {
					$transaction_no = $data['paytm_transaction_no'] = "";
				} else {
					$transaction_no = $data['paytm_transaction_no'];
				}
	
				if (empty($data['paytm_transaction_date'])) {
					$transaction_date = $data['paytm_transaction_date'] = "";
				} else {
					$transaction_date = $data['paytm_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Banck Deposit (Cash)") {
				if (empty($data['bank_deposit_transaction_no'])) {
					$transaction_no = $data['bank_deposit_transaction_no'] = "";
				} else {
					$transaction_no = $data['bank_deposit_transaction_no'];
				}
	
				if (empty($data['bank_deposit_transaction_date'])) {
					$transaction_date = $data['bank_deposit_transaction_date'] = "";
				} else {
					$transaction_date = $data['bank_deposit_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Capital Float (EMI)") {
				if (empty($data['capital_float_transaction_no'])) {
					$transaction_no = $data['capital_float_transaction_no'] = "";
				} else {
					$transaction_no = $data['capital_float_transaction_no'];
				}
	
				if (empty($data['capital_float_transaction_date'])) {
					$transaction_date = $data['capital_float_transaction_date'] = "";
				} else {
					$transaction_date = $data['capital_float_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Google Pay") {
				if (empty($data['google_pay_transaction_no'])) {
					$transaction_no = $data['google_pay_transaction_no'] = "";
				} else {
					$transaction_no = $data['google_pay_transaction_no'];
				}
	
				if (empty($data['google_pay_transaction_date'])) {
					$transaction_date = $data['google_pay_transaction_date'] = "";
				} else {
					$transaction_date = $data['google_pay_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Phone Pay") {
				if (empty($data['phone_pay_transaction_no'])) {
					$transaction_no = $data['phone_pay_transaction_no'] = "";
				} else {
					$transaction_no = $data['phone_pay_transaction_no'];
				}
	
				if (empty($data['phone_pay_transaction_date'])) {
					$transaction_date = $data['phone_pay_transaction_date'] = "";
				} else {
					$transaction_date = $data['phone_pay_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Bajaj Finserv (EMI)") {
				if (empty($data['bajaj_finserv_transaction_date'])) {
					$transaction_no = $data['bajaj_finserv_transaction_date'] = "";
				} else {
					$transaction_no = $data['bajaj_finserv_transaction_date'];
				}
	
				if (empty($data['bajaj_finserv_transaction_date'])) {
					$transaction_date = $data['bajaj_finserv_transaction_date'] = "";
				} else {
					$transaction_date = $data['bajaj_finserv_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Bhim UPI(India)") {
				if (empty($data['bhim_upi_transaction_no'])) {
					$transaction_no = $data['bhim_upi_transaction_no'] = "";
				} else {
					$transaction_no = $data['bhim_upi_transaction_no'];
				}
	
				if (empty($data['bhim_upi_transaction_date'])) {
					$transaction_date = $data['bhim_upi_transaction_date'] = "";
				} else {
					$transaction_date = $data['bhim_upi_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Instamojo") {
				if (empty($data['instamoj_transaction_no'])) {
					$transaction_no = $data['instamoj_transaction_no'] = "";
				} else {
					$transaction_no = $data['instamoj_transaction_no'];
				}
	
				if (empty($data['instamoj_transaction_date'])) {
					$transaction_date = $data['instamoj_transaction_date'] = "";
				} else {
					$transaction_date = $data['instamoj_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Paypal") {
				if (empty($data['pay_pal_transaction_no'])) {
					$transaction_no = $data['pay_pal_transaction_no'] = "";
				} else {
					$transaction_no = $data['pay_pal_transaction_no'];
				}
	
				if (empty($data['pay_pal_transaction_date'])) {
					$transaction_date = $data['pay_pal_transaction_date'] = "";
				} else {
					$transaction_date = $data['pay_pal_transaction_date'];
				}
			}
	
			if ($data['payment_mode'] == "Razorpay") {
				if (empty($data['razorpay_transaction_no'])) {
					$transaction_no = $data['razorpay_transaction_no'] = "";
				} else {
					$transaction_no = $data['razorpay_transaction_no'];
				}
	
				if (empty($data['razorpay_transaction_date'])) {
					$transaction_date = $data['razorpay_transaction_date'] = "";
				} else {
					$transaction_date = $data['razorpay_transaction_date'];
				}
			}
			   
			    $otherdata['branch_id'] = $data['branch_id'];
			    $otherdata['payment_mode'] = $data['payment_mode'];

			if ($data['payment_mode'] == "Cheque") {
				$otherdata['cheque_no'] = $cheque_no;
				$otherdata['cheque_date'] = $cheque_date;
				$otherdata['bank_name'] = $bank_name;
				$otherdata['bank_branch_name'] = $bank_branch_name;
				$otherdata['cheque_status'] = $cheque_status;
				$otherdata['cheque_holder_name'] = $cheque_holder_name;
			}
	
			if ($data['payment_mode'] == "DD") {
				$otherdata['cheque_no'] = $cheque_no;
				$otherdata['cheque_date'] = $cheque_date;
				$otherdata['bank_name'] = $bank_name;
				$otherdata['bank_branch_name'] = $bank_branch_name;
				$otherdata['cheque_status'] = $cheque_status;
				$otherdata['cheque_holder_name'] = $cheque_holder_name;
			}
	
			if ($data['payment_mode'] == "Credit Card") {
				$otherdata['transaction_no'] = $transaction_no;
				$otherdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Debit Card") {
				$otherdata['transaction_no'] = $transaction_no;
				$otherdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Debit Card") {
				$otherdata['transaction_no'] = $transaction_no;
				$otherdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Online Payment") {
				$otherdata['transaction_no'] = $transaction_no;
				$otherdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "NEFT / IMPS") {
				$otherdata['transaction_no'] = $transaction_no;
				$otherdata['transaction_date'] = $transaction_date;
				$otherdata['bank_name'] = $bank_name;
				$otherdata['bank_branch_name'] = $bank_branch_name;
			}
	
			if ($data['payment_mode'] == "Paytm") {
				$otherdata['transaction_no'] = $transaction_no;
				$otherdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Banck Deposit (Cash)") {
				$otherdata['transaction_no'] = $transaction_no;
				$otherdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Capital Float (EMI)") {
				$otherdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Google Pay") {
				$otherdata['transaction_no'] = $transaction_no;
				$otherdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Phone Pay") {
				$otherdata['transaction_no'] = $transaction_no;
				$otherdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Bajaj Finserv (EMI)") {
				$otherdata['transaction_no'] = $transaction_no;
				$otherdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Bhim UPI(India)") {
				$otherdata['transaction_no'] = $transaction_no;
				$otherdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Instamojo") {
				$otherdata['transaction_no'] = $transaction_no;
				$otherdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Paypal") {
				$otherdata['transaction_no'] = $transaction_no;
				$otherdata['transaction_date'] = $transaction_date;
			}
	
			if ($data['payment_mode'] == "Razorpay") {
				$otherdata['transaction_no'] = $transaction_no;
				$otherdata['transaction_date'] = $transaction_date;
			}

				if($data['subject_id']=="2") {
					$otherdata['admission_id'] = $data['admissionids'];
					$otherdata['gr_id'] = $data['grids'];
					$otherdata['type'] = $data['ctype'];
					$otherdata['fullname'] = $data['fullname'];
					if($data['ctype']=="single"){
						$otherdata['course_id'] = $data['allco'];
					} else if($data['ctype']=="package"){
						$otherdata['package_id'] = $data['allco'];
					} else {
						$otherdata['college_courses_id'] = $data['allco'];
					}
				} else {
					$otherdata['admission_id'] = "";
					$otherdata['gr_id'] = "";
					$otherdata['type'] = "";
					$otherdata['fullname'] = "";
					$otherdata['course_id'] = "";
					$otherdata['package_id'] = "";
					$otherdata['college_courses_id'] = "";
				}

				$otherdata['subject_id'] = $data['subject_id'];
				$otherdata['paying_amount'] = $data['paying_amount'];
				$otherdata['info'] = $data['info'];
				$otherdata['pay_date'] = $data['pay_date'];
				$otherdata['paid_by'] = $data['paid_by'];
				$otherdata['comment'] = $data['comment'];

			if ($this->input->post('other_income_id')) {
				$id = $this->input->post('other_income_id');
				unset($data['other_income_id']);
				$otherdata['addedby'] =  $_SESSION['user_name'];
				$query = $this->admi->expenses_record_upd('other_income', $otherdata, 'other_income_id', $id);
				if ($query) {
					$recp["all_record"] = array('status' => 02, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 00, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			} else {
				$otherdata['addedby'] =  $_SESSION['user_name'];
				$query = $this->admi->insert_endlast_otherincome('other_income', $otherdata);
				if ($query) {
					$recp["all_record"] = array('status' => $query->other_income_id, "msg" => "HI! This Record Successfully Inserted");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 00, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			}
		}
	}

	public function get_record_otherincome()
	{
		$id = $this->input->post('other_income_id');
		$record['single_record'] = $this->admi->get_single_reco('other_income', 'other_income_id', $id);
		echo json_encode($record);
	}

	public function otherinvoice()
	{
		$id = $this->input->get('xyqtu');

		if ($this->input->get('action') == "ere") {
			$display['list_otherincome'] = $this->cm->select_data("other_income", "other_income_id", $id);
		}

		$b_all = $this->cm->select_data('branch', 'branch_id', $display['list_otherincome']->branch_id);
		$x = $this->db->query("SELECT count(chalan_id) as c, branch_id  FROM chalan GROUP BY branch_id");
		$y =  $x->result_array();
		$fl =0;
		foreach($y as $v)
		{
			if($v['branch_id']==$display['list_otherincome']->branch_id)
			{
			 $chno =	$v['c']+1;
			  $fl=1;
			}
		}
		if($fl == 0){
			$chno = 1;
		}
	
	    $display['chalanno'] = "CNO" . "-" . $chno;
		
		$chalan_data['other_income_id'] = $display['list_otherincome']->other_income_id;
		$chalan_data['branch_id'] = $display['list_otherincome']->branch_id;
		$chalan_data['admission_id'] = $display['list_otherincome']->admission_id;
		$chalan_data['chalan_no'] = $display['chalanno'];
		$chalan_data['info'] = $display['list_otherincome']->info;
		$chalan_data['paying_amount'] = $display['list_otherincome']->paying_amount;
		$chalan_data['pay_date'] = $display['list_otherincome']->pay_date;
		$chalan_data['payment_mode'] = $display['list_otherincome']->payment_mode;
		$chalan_data['paid_by'] = $display['list_otherincome']->paid_by;
		$chalan_data['addedby'] = $_SESSION['user_name'];
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d h:i:s');
		$chalan_data['created_at'] = $date;
		$this->db->insert('chalan', $chalan_data);
		
		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_subject'] = $this->cm->view_all("subject");
		
		$this->load->view('erp/otherinvoice', $display);
	}

	public function view_chalan()
	{
		$id = $this->input->get('xyqtu');

		if ($this->input->get('action') == "ere") {
			$display['list_otherincome'] = $this->cm->select_data("other_income", "other_income_id", $id);
			$display['list_chalan'] = $this->cm->select_data("chalan", "chalan_id", $display['list_otherincome']->other_income_id);
		}

		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_subject'] = $this->cm->view_all("subject");
		
		$this->load->view('erp/view_chalan', $display);
	}

	public function Serchbygrid() {
		$id = $this->input->post('query');
		$reco = $this->admi->get_idwise_data('admission_process','gr_id' ,$id);
		foreach ($reco as $key => $val) {
			if($val->type == 'single') {
				$record['single_record'] = $this->admi->get_all_record_grid_wise('admission_process', 'gr_id', $val->gr_id, $val->type);
			} else {
				$record['single_record'] = $this->admi->get_all_record_grid_wise('admission_process', 'gr_id', $val->gr_id, $val->type);
			}
		}
		echo json_encode($record);
    }

	public function Erpreceipt_list()
	{
		if (!empty($this->input->post('filter_receipt_record'))) {
			$filter = $this->input->post();

			$display['erp_receipt_list'] = $this->admi->receipt_record("admissin_receipt", $filter);
			$display['filter_receipt_no'] = @$filter['filter_receipt_no'];
			$display['filter_gr_id'] = @$filter['filter_gr_id'];
			$display['filter_fname'] = @$filter['filter_fname'];
			$display['filter_lname'] = @$filter['filter_lname'];
			$display['filter_email'] = @$filter['filter_email'];
			$display['filter_mobile'] = @$filter['filter_mobile'];
			$display['filter_enrollnno'] = @$filter['filter_enrollnno'];
			$display['filter_gr_id'] = @$filter['filter_gr_id'];
			$display['filter_transaction_no'] = @$filter['filter_transaction_no'];
			$display['filter_cheque_dd_no'] = @$filter['filter_cheque_dd_no'];
			$display['filter_branch'] = @$filter['filter_branch'];
			$display['filter_course'] = @$filter['filter_course'];
			$display['filter_package'] = @$filter['filter_package'];
			$display['filter_from_date'] = @$filter['filter_from_date'];
			$display['filter_to_date'] = @$filter['filter_to_date'];
			$display['filter_on'] = "dfgf";
		} else {
			$display['erp_receipt_list'] = $this->admi->receipt_record("admissin_receipt");
			$branch_id = explode(',',$_SESSION['branch_ids']);
			$expreco = array();
			foreach($display['erp_receipt_list'] as $k=>$va){
				$br_id = explode(',',$va->branch_id);
				if($br_id[0] != ''){
					for($i=0; $i<sizeof($branch_id); $i++){
						if(in_array($branch_id[$i],$br_id)){
							$expreco[] = $va;
						}
					}
				}
			}

			$newexpreco = array();
			for($i=0; $i<sizeof($expreco); $i++){
				$admissin_receiptId = $expreco[$i]->admissin_receipt_id;
				$flag = 1;
				for($j=0; $j<sizeof($newexpreco); $j++){
					if($admissin_receiptId == $newexpreco[$j]->admissin_receipt_id){
						$flag =0;
						break;
					}
				}

				if($flag == 1){
					$newexpreco[] = $expreco[$i];
				}
			}
		    $display['erp_receipt_list'] = $newexpreco;
		}

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

		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['list_package'] = $this->cm->view_all("rnw_package");
		$display['list_college_courses'] = $this->cm->view_all("college_courses");
		$display['list_admission_proccess'] = $this->cm->view_all("admission_process");


		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/Erpreceipt_list', $display);
	}

	public function edit_fillable_data()
 	{
 		$data = $this->input->post();
 		$d_record = array($data['field'] =>$data['value']);
 		$this->admi->expenses_record('expenses',$d_record,$data['id']);

 		return 1;
 	}

	public function erpdlt_receipt_list()
	{

		if (!empty($this->input->post('filter_receipt_record'))) {
			$filter = $this->input->post();

			$display['erp_receipt_list'] = $this->admi->receipt_dlt_record("admissin_receipt", $filter);
			$display['filter_fname'] = @$filter['filter_fname'];
			$display['filter_lname'] = @$filter['filter_lname'];
			$display['filter_email'] = @$filter['filter_email'];
			$display['filter_mobile'] = @$filter['filter_mobile'];
			$display['filter_receipt_no'] = @$filter['filter_receipt_no'];
			$display['filter_enrollnno'] = @$filter['filter_enrollnno'];
			$display['filter_gr_id'] = @$filter['filter_gr_id'];
			$display['filter_branch'] = @$filter['filter_branch'];
			$display['filter_course'] = @$filter['filter_course'];
			$display['filter_package'] = @$filter['filter_package'];
			$display['filter_from_date'] = @$filter['filter_from_date'];
			$display['filter_to_date'] = @$filter['filter_to_date'];
			$display['filter_on'] = "dfgf";
		} else {
			$display['erp_receipt_list'] = $this->admi->receipt_dlt_record("admissin_receipt");
			$branch_id = explode(',',$_SESSION['branch_ids']);
			$expreco = array();
			foreach($display['erp_receipt_list'] as $k=>$va){
				$br_id = explode(',',$va->branch_id);
				if($br_id[0] != ''){
					for($i=0; $i<sizeof($branch_id); $i++){
						if(in_array($branch_id[$i],$br_id)){
							$expreco[] = $va;
						}
					}
				}
			}

			$newexpreco = array();
			for($i=0; $i<sizeof($expreco); $i++){
				$admissin_receiptId = $expreco[$i]->admissin_receipt_id;
				$flag = 1;
				for($j=0; $j<sizeof($newexpreco); $j++){
					if($admissin_receiptId == $newexpreco[$j]->admissin_receipt_id){
						$flag =0;
						break;
					}
				}

				if($flag == 1){
					$newexpreco[] = $expreco[$i];
				}
			}
		    $display['erp_receipt_list'] = $newexpreco;
		}

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

		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['list_package'] = $this->cm->view_all("rnw_package");
		$display['list_college_courses'] = $this->cm->view_all("college_courses");
		$display['list_admission_proccess'] = $this->cm->view_all("admission_process");


		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/erpdlt_receipt_list', $display);
	}

	public function Erpcheckprocessing_receipt_list()
	{

		if (!empty($this->input->post('filter_checkproccesingreceipt_record'))) {
			$filter = $this->input->post();

			$display['erp_cehckprocess_receipt_list'] = $this->admi->check_proccesingreceipt_record("processing_check_receipt", $filter);
			$display['filter_fname'] = @$filter['filter_fname'];
			$display['filter_lname'] = @$filter['filter_lname'];
			$display['filter_email'] = @$filter['filter_email'];
			$display['filter_mobile'] = @$filter['filter_mobile'];
			$display['filter_receipt_no'] = @$filter['filter_receipt_no'];
			$display['filter_enrollnno'] = @$filter['filter_enrollnno'];
			$display['filter_gr_id'] = @$filter['filter_gr_id'];
			$display['filter_branch'] = @$filter['filter_branch'];
			$display['filter_course'] = @$filter['filter_course'];
			$display['filter_package'] = @$filter['filter_package'];
			$display['filter_from_date'] = @$filter['filter_from_date'];
			$display['filter_to_date'] = @$filter['filter_to_date'];
			$display['filter_on'] = "dfgf";
		} else {
			$display['erp_cehckprocess_receipt_list'] = $this->admi->check_proccesingreceipt_record("processing_check_receipt");
			$branch_id = explode(',',$_SESSION['branch_ids']);
			$expreco = array();
			foreach($display['erp_cehckprocess_receipt_list'] as $k=>$va){
				$br_id = explode(',',$va->branch_id);
				if($br_id[0] != ''){
					for($i=0; $i<sizeof($branch_id); $i++){
						if(in_array($branch_id[$i],$br_id)){
							$expreco[] = $va;
						}
					}
				}
			}

			$newexpreco = array();
			for($i=0; $i<sizeof($expreco); $i++){
				$processing_check_receiptId = $expreco[$i]->processing_check_receipt_id;
				$flag = 1;
				for($j=0; $j<sizeof($newexpreco); $j++){
					if($processing_check_receiptId == $newexpreco[$j]->processing_check_receipt_id){
						$flag =0;
						break;
					}
				}

				if($flag == 1){
					$newexpreco[] = $expreco[$i];
				}
			}
		    $display['erp_cehckprocess_receipt_list'] = $newexpreco;
		}

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

		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['list_package'] = $this->cm->view_all("rnw_package");
		$display['list_college_courses'] = $this->cm->view_all("college_courses");
		$display['list_admission_proccess'] = $this->cm->view_all("admission_process");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/Erpcheckprocessing_receipt_list', $display);
	}

	public function Chnage_Status_Cheque()
	{
		$data = $this->input->post();

		date_default_timezone_set("Asia/Calcutta");

		$created_date = date('d-m-Y h:i A');
		$created_by = $_SESSION['user_name'];
		$remarksdate = date('d-M-Y');
		$remarkstime = date('h:i A');
		$label = $data['cheque_status'];


		for ($i = 0; $i < sizeof($data['processing_check_receipt_id']); $i++) {

			$batches = $this->admi->view_all('processing_check_receipt');

			foreach ($batches as $dn) {
				$flag = 0;

				$dnbi  = explode(',', $data['processing_check_receipt_id'][$i]);
				if (in_array($dn['processing_check_receipt_id'], $dnbi)) {
					$flag = 1;
				}
				if ($flag == 1) {
					$remarksdata = array('admission_id' => $dn['admission_id'], 'labels' => $label, 'admission_remrak' => $data['remarks'], 'remarks_date' => $remarksdate, 'remarks_time' => $remarkstime, 'addby' => $created_by);

					$this->admi->save_data('admission_remarks',$remarksdata);

					$processing_check_receipt_id = $dn['processing_check_receipt_id'];

					if ($data['cheque_status'] == "Paid/Cleared") {
						$cheque_status = $data['cheque_status'];
						$admIntsallment = $this->cm->select_data('admission_installment', 'admission_installment_id', $dn['intallment_id']);

						$installment_record = array('paid_amount' => $admIntsallment->due_amount, 'cheque_status' => $cheque_status);

					     $this->admi->Cheque_Status('admission_installment', $installment_record, 'admission_installment_id', $dn['intallment_id']);

						$record = array('status_for_cheque' => $cheque_status);

						$reco = $this->admi->Cheque_Status('processing_check_receipt', $record, 'processing_check_receipt_id', $processing_check_receipt_id);

						if ($reco) {
							$status_check = 2;
						} else {
							$status_check = 0;
						}
					} else if($data['cheque_status'] == "Cheque Return"){
						$record = array('status_for_cheque' => $data['cheque_status'],'cheque_return_date' => date('Y-m-d',strtotime($data['cheque_return_date'])),'pay_return_amount' => $data['pay_return_amount']);

						$res = $this->admi->Cheque_Status('processing_check_receipt', $record, 'processing_check_receipt_id', $processing_check_receipt_id);
						if ($res) {
							$status_check = 1;
						} else {
							$status_check = 0;
						}
					} else {
						$cheque_status = $data['cheque_status'];

						$record = array('status_for_cheque' => $cheque_status);

						$result = $this->admi->Cheque_Status('processing_check_receipt', $record, 'processing_check_receipt_id', $processing_check_receipt_id);

						if ($result) {
							$status_check = 1;
						} else {
							$status_check = 0;
						}
					}
				}
			}
		}

		if ($status_check == 1) {
			$record = array('status' => 1, "msg" => "Successfully Change Status!");
			$recp['all_record'] = $record;
			echo json_encode($recp);
		} else if ($status_check == 2) {
			$recp['all_record'] = array('status' => 2, "msg" => "Successfully Change Status!");
			echo json_encode($recp);
		} else {
			$recp['all_record'] = array('status' => 0, "msg" => "Something Wrong");
			echo json_encode($recp);
		}
	}

	public function deleted_status_cheque()
	{
		date_default_timezone_set("Asia/Calcutta");
		$data = $this->input->post();
		
		$created_date = date('d-M-Y h:i A');
		$created_by = $_SESSION['user_name'];
		$remarksdate = date('d-M-Y');
		$remarkstime = date('h:i A');
		$label = "Delete Cheque";

		for ($i = 0; $i < sizeof($data['processing_check_receipt_id']); $i++) {

			$batches = $this->admi->view_all('processing_check_receipt');

			foreach ($batches as $dn) {
				$flag = 0;
				$dnbi  = explode(',', $data['processing_check_receipt_id'][$i]);
				if (in_array($dn['processing_check_receipt_id'], $dnbi)) {
					$flag = 1;
				}
				if ($flag == 1) {
					$remarksdata = array('admission_id' => $dn['admission_id'], 'labels' => $label, 'admission_remrak' => $data['remarks'], 'remarks_date' => $remarksdate, 'remarks_time' => $remarkstime, 'addby' => $created_by);

					$this->admi->save_data('admission_remarks', $remarksdata);

					$processing_check_receipt_id = $dn['processing_check_receipt_id'];
					$deleted_status = "1";

					$record = array('deleted_status' => $deleted_status);

					$result = $this->admi->Cheque_Status('processing_check_receipt', $record, 'processing_check_receipt_id', $processing_check_receipt_id);

					if ($result) {
						$status_check = 1;
					} else {
						$status_check = 0;
					}
				}
			}
		}

		if ($status_check == 1) {
			$record = array('status' => 1, "msg" => "Successfully Deleted Status!");
			$recp['all_record'] = $record;
			echo json_encode($recp);
		} else {
			$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp);
		}
	}

	public function deleted_status_receipt()
	{
		date_default_timezone_set("Asia/Calcutta");
		$data = $this->input->post();

		$created_date = date('d-M-Y h:i A');
		$created_by = $_SESSION['user_name'];
		$remarksdate = date('d-M-Y');
		$remarkstime = date('h:i A');
		$label = "Delete Receipt";

		for ($i = 0; $i < sizeof($data['admissin_receipt_id']); $i++) {

			$batches = $this->admi->view_all('admissin_receipt');

			foreach ($batches as $dn) {
				$flag = 0;
				$dnbi  = explode(',', $data['admissin_receipt_id'][$i]);
				if (in_array($dn['admissin_receipt_id'], $dnbi)) {
					$flag = 1;
				}
				if ($flag == 1) {
					$remarksdata = array('admission_id' => $dn['admission_id'], 'labels' => $label, 'admission_remrak' => $data['remarks'], 'remarks_date' => $remarksdate, 'remarks_time' => $remarkstime, 'addby' => $created_by);

					$this->admi->save_data('admission_remarks', $remarksdata);

					$admissin_receipt_id = $dn['admissin_receipt_id'];
					$deleted_status = "1";

					$record = array('deleted_status' => $deleted_status);

					$result = $this->admi->receipt_Status('admissin_receipt', $record, 'admissin_receipt_id', $admissin_receipt_id);

					if ($result) {
						$status_check = 1;
					} else {
						$status_check = 0;
					}
				}
			}
		}

		if ($status_check == 1) {
			$record = array('status' => 1, "msg" => "Successfully Deleted Status!");
			$recp['all_record'] = $record;
			echo json_encode($recp);
		} else {
			$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp);
		}
	}

	public function deleted_status_expenses()
	{
		date_default_timezone_set("Asia/Calcutta");
		$data = $this->input->post();
		$created_date = date('d-M-Y h:i A');
		$created_by = $_SESSION['user_name'];
		$remarksdate = date('d-M-Y');
		$remarkstime = date('h:i A');
		$label = "Expenses Deleted";

		for ($i = 0; $i < sizeof($data['expenses_id']); $i++) {

			$expense = $this->admi->view_all('expenses');

			foreach ($expense as $dn) {
				$flag = 0;
				$dnbi  = explode(',', $data['expenses_id'][$i]);
				if (in_array($dn['expenses_id'], $dnbi)) {
					$flag = 1;
				}
				if ($flag == 1) {
					$remarksdata = array('expenses_id' => $dn['expenses_id'], 'label' => $label, 'remarks' => $data['remarks'], 'remarks_date' => $remarksdate, 'remarks_time' => $remarkstime, 'addby' => $created_by);
	
					$this->admi->save_data('expense_remsrks', $remarksdata);

					$id = $dn['expenses_id'];
					$expense_status = "1";

					$record = array('expense_status' => $expense_status);

					$result = $this->admi->update_data('expenses', $record, 'expenses_id', $id);

					if ($result) {
						$status_check = 1;
					} else {
						$status_check = 0;
					}
				}
			}
		}

		if ($status_check == 1) {
			$record = array('status' => 1, "msg" => "Successfully Deleted Status!");
			$recp['all_record'] = $record;
			echo json_encode($recp);
		} else {
			$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp);
		}
	}

	public function elogin()
	{
		$this->load->view('erp/elogin');
	}


	public function batchlist()
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


		$display['upd_faculty'] = $this->cm->view_all("faculty");
		$display['upd_branch'] = $this->cm->view_all("branch");
		$display['upd_see'] = $this->cm->check_update("demo");
		$display['list_source'] = $this->cm->view_all("source");
		$display['list_department'] = $this->cm->view_all("department");
		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("course");
		$display['list_package'] = $this->cm->view_all("package");
		$display['list_source'] = $this->cm->view_all("source");
		$display['list_country'] = $this->cm->view_all("country");
		$display['list_state'] = $this->cm->view_all("state");
		$display['list_city'] = $this->cm->view_all("cities");
		$display['list_area'] = $this->cm->view_all("area");
		$display['list_batch'] = $this->cm->view_all("batch_list");
		$display['all_admission'] = $this->cm->view_all("admission_process");
		$display['hod_all'] = $this->cm->view_all_hod_demo("hod");
		$display['faculty_all'] = $this->cm->view_all("faculty");
		$display['Admission_record'] = $this->cm->view_all("admission_process");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/batchlist', $display);
		$this->load->view('erp/erpfooter', $update);
	}

	public function erpreceipt()
	{

		$this->load->view('erp/erpreceipt', $display);
	}

	public function erpcheckreceipt()
	{
		$this->load->view('erp/erpcheckreceipt');
	}

	public function erpGstreceipt()
	{
		$this->load->view('erp/erpGstreceipt');
	}

	public function erpProcessingCheck()
	{
		$this->load->view('erp/erpProcessingCheck');
	}

	public function erpassestment()
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

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/erpassestment');
		$this->load->view('erp/erpfooter', $update);
	}

	public function erppermission()
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

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/erppermission');
		$this->load->view('erp/erpfooter', $update);
	}
	
	public function erpprintidcard()
	{
		$this->load->view('erp/erpprintidcard');
	}
}
