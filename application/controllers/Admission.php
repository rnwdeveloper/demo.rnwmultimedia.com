<?php
class Admission extends CI_controller
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
	    
		date_default_timezone_set("Asia/Calcutta");
		$today = date('Y-m-d');
		$this->db->where('hold_ending_date', $today);
		$this->db->from('admission_process');
		$data =  $this->db->get();
		$admdata = $data->result();

		for($i = 0; $i < sizeof($admdata); $i++) {
			$admission_id = @$admdata[$i]->admission_id;
			$admission_status = "Running";
			$record = array('admission_status' => $admission_status);
			$this->admi->update_admission_status_record('admission_process', $record, 'admission_id', $admission_id);
		}

		function number_of_working_days($from, $to) {
			$workingDays = [1, 2, 3, 4, 5]; # date format = N (1 = Monday, ...)
			$holidayDays = ['*-12-25', '*-01-01','*-01-14','*-01-26','*-03-01','*-03-19','*-03-20','*-08-12','*-08-15','*-08-19','*-10-05','*-10-26','*-10-27','*-01-25']; # variable and fixed holidays
		
			$from = new DateTime($from);
			$to = new DateTime($to);
			$to->modify('+1 day');
			$interval = new DateInterval('P1D');
			$periods = new DatePeriod($from, $interval, $to);
		
			$days = 0;
			foreach ($periods as $period) {
				if (!in_array($period->format('N'), $workingDays)) continue;
				if (in_array($period->format('Y-m-d'), $holidayDays)) continue;
				if (in_array($period->format('*-m-d'), $holidayDays)) continue;
				$days++;
			}
			return $days;
		}

		// $course_view = $this->cm->view_all("rnw_subcourse");
 	// 	$admission_cour_view = $this->cm->view_all('admission_courses');
		// $batches_view = $this->cm->view_all('batches');
		//  for($i = 0; $i < sizeof($admission_cour_view); $i++) {
		//  	for($k = 0; $k < sizeof($batches_view); $k++){
		// 		$tod_date = date('Y-m-d');
		// 		if($admission_cour_view[$i]->batch_id == $batches_view[$k]->batches_id){
		// 			print_r($admission_cour_view[$i]);
		// // 			if($batches_view[$k]->batch_duration != 0){
		// // 				if(number_of_working_days($admission_cour_view[$i]->assigned_batch_date,$tod_date) > $batches_view[$k]->batch_duration){
		// // 					$record = array('overdue_status' => "Overdue" );
		// // 					$records = array('batch_overdue_status' => "Overdue" );
		// // 					$this->admi->update_admission_status_record('batches', $record, 'batches_id', $admission_cour_view[$i]->batch_id);
		// // 					$this->admi->update_admission_status_record('admission_courses', $records, 'admission_courses_id', $admission_cour_view[$i]->admission_courses_id);
		// // 				}     
		// // 			}
		//  		}	
		//  	}
		//  }
		//  die;

		$clgadmission = $this->cm->view_all('admission_process');
		date_default_timezone_set("Asia/Calcutta");
		$afterday = date('Y-m-d');
		for($j = 0; $j < sizeof($clgadmission); $j++) {
			if($clgadmission[$j]->type=="COLLEGE")
			{	
			   $clgins = $this->admin->get_reco_clg_co('admission_installment','admission_id',$clgadmission[$j]->admission_id);
			   for($k = 0; $k < sizeof($clgins); $k++){
				  	if($clgins[$k]->paid_amount!=""){	
						$pay_status = "success";
						$record = array('pay_done_status' => $pay_status);
						$this->admi->update_admission_status_record('admission_installment', $record, 'admission_installment_id',$clgins[$k]->admission_installment_id);
					} else if($clgins[$k]->installment_date < $afterday && $clgins[$k]->paid_amount=="" ) {
						$pay_status = "danger";
						$record = array('pay_done_status' => $pay_status);
						$this->admi->update_admission_status_record('admission_installment', $record, 'admission_installment_id',$clgins[$k]->admission_installment_id);
					} else {
						$pay_status = "primary";
						$record = array('pay_done_status' => $pay_status);
						$this->admi->update_admission_status_record('admission_installment', $record, 'admission_installment_id',$clgins[$k]->admission_installment_id);
					}
			   }
			} 
		}
	}

	public function erpQuickAdmission()
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

		// $display['list_source'] = $this->cm->view_all("source");
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
		$display['admisison_process_data'] = $this->cm->view_all("admission_process");
		$display['overdue_fees_counting_list'] = $this->admi->overdue_fees_counting("admission_installment");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/erpQuickAdmission', $display);
	}

	public function QuichAdmissionProccess()
	{
		date_default_timezone_set("Asia/Calcutta");
		$data =  $this->input->post();
		
		$addby = $_SESSION['user_name'];
		$admission_date =  date('Y-m-d');
		$admission_time = date('h:i A');
		$year = date('Y');

		$q_amdnumber = $this->db->query("SELECT MAX(admission_number) AS admission_number FROM admission_process ORDER BY admission_id DESC LIMIT 1");
		$a_number =  $q_amdnumber->result_array();
		$admis_number = $a_number[0]['admission_number'];
		$no = number_format($admis_number);
		$admission_number = $no + 1;

		if (empty($data['lead_list_id'])) {
			$lead_list_id = $data['lead_list_id'] = "";
		} else {
			$lead_list_id = $data['lead_list_id'];
		}

		if (empty($data['demo_id'])) {
			$demo_id = $data['demo_id'] = "";
		} else {
			$demo_id = $data['demo_id'];
		}

		if (empty($data['shining_sheet_id'])) {
			$shining_sheet_id = $data['shining_sheet_id'] = "";
		} else {
			$shining_sheet_id = $data['shining_sheet_id'];
		}

		if (empty($data['quick_course_package'])) {
			$type = $data['quick_course_package'] = "";
		} else {
			$type = $data['quick_course_package'];
		}

		if (empty($data['course_or_single'])) {
			$co = $data['course_or_single'] = "";
		} else {
			$co = $data['course_or_single'];
		}

		if (empty($data['course_orpackage'])) {
			$co_p = $data['course_orpackage'] = "";
		} else {
			$co_p = $data['course_orpackage'];
		}

		if (empty($data['batch_id'])) {
			$batch = $data['batch_id'] = "";
		} else {
			$batch = $data['batch_id'];
		}

		if (empty($data['no_of_installment'])) {
			$no_of_installment = $data['no_of_installment'] = "";
		} else {
			$no_of_installment = $data['no_of_installment'];
		}

		if (empty($data['mobile_no'])) {
			$mobile_no = $data['mobile_no'] = "";
		} else {
			$mobile_no = $data['mobile_no'];
		}

		if (empty($data['installment_date_first'])) {
			$installment_date_first = $data['installment_date_first'] = "";
		} else {
			$installment_date_first = $data['installment_date_first'];
		}

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

		if (($data['quick_course_package'] == "single")) {
			$c = $this->cm->select_data('rnw_course', 'course_id', $data['course_or_single']);
			$depart = $c->department_id;
			$subdepart = $c->subdepartment_id;
			$stating_course_id = $data['stating_course_id'];
		} else {
			$p = $this->cm->select_data('rnw_package', 'package_id', $data['course_orpackage']);
			$depart = $p->department_id;
			$subdepart = $p->subdepartment_id;
			$stating_course_id = $data['stating_course_id_pco'];
		}
		
		$check_record = $this->cm->select_data('admission_process', 'mobile_no', $mobile_no);
		if ($check_record == '') {
			$query = $this->db->query("SELECT MAX(gr_id) AS gr_id FROM admission_process ORDER BY admission_id DESC LIMIT 1");
			$q2 =  $query->result();
			$g_id = 0;

			if (count($q2) > 0) {
				if (!empty($q2[0]->gr_id)) {
					$g_id =  1 + $q2[0]->gr_id;
				} else {
					$g_id = 7501;
				}
			} else {
				$g_id = 7501;
			}
		} else {
			$g_id = $check_record->gr_id;
		}

		$b_all = $this->cm->select_data('branch', 'branch_id', $data['branch_id']);
		$dm = date('Y-m');
		$date_month = substr($dm, 2);
		$x = $this->db->query("SELECT count(admission_id) as c, branch_id  FROM admission_process GROUP BY branch_id");
		$y =  $x->result_array();
		$flag = 0;
		foreach($y as $v)
		{
			if($v['branch_id']==$data['branch_id'])
			{
			   $erno =	$v['c']+1;
			   $flag =1;
			}
		}
		if($flag == 0)
		{
			$erno = 1;
		}
		
		$enrollment_number = $b_all->branch_code . "-" . $date_month . "-" . $erno;
		
		if (empty($batch)) {
			$admission_status = "Pending";
		} else {
			$admission_status = "Enrolled";
		}

		$admissiontype = "Quick";

		$record = array('lead_list_id' => $lead_list_id, 'demo_id' => $demo_id, 'shining_sheet_id' => $shining_sheet_id, 'gr_id' => $g_id, 'admission_number' => $admission_number, 'enrollment_number' => $enrollment_number, 'admission_date' => $admission_date,'admission_time'=>$admission_time ,'mobile_no' => $data['mobile_no'], 'alternate_mobile_no' => $data['alternate_mobile_no'], 'email' => $data['email'], 'source_id' => $data['source_id'], 'first_name' => $data['first_name'], 'surname' => $data['surname'], 'stu_dob' => $data['stu_dob'] , 'gender' => $data['gender'] ,'addby' => $addby, 'branch_id' => $data['branch_id'], 'year' => $year, 'department_id' => $depart, 'subdepartment_id' => $subdepart, 'type' => $type, 'course_id' => $co, 'package_id' => $co_p, 'stating_course_id' => $stating_course_id, 'batch_id' => $batch, 'tuation_fees' => $data['tuation_fees'], 'registration_fees' => $data['registration_fees'], 'no_of_installment' => $data['no_of_installment'], 'admission_status' => $admission_status, 'admission_type' => $admissiontype);

		$respose  = $this->admi->insert_endlast_ins_data('admission_process', $record);
		
		if (empty($respose->package_id)) {
			$c_data['admission_id'] = $respose->admission_id;
			$c_data['gr_id'] = $respose->gr_id;
			$c_data['branch_id'] = $respose->branch_id;
			$c_data['courses_id'] = $respose->stating_course_id;
			$c_data['batch_id'] = $respose->batch_id;
			$c_data['course_orpackage_id'] = $respose->course_id;
			$c_data['stating_date'] = $respose->admission_date;
			$c_data['surname'] = $respose->surname;
			$c_data['first_name'] = $respose->first_name;
			$c_data['email'] = $respose->email;
			if($respose->batch_id==""){
				$c_data['admission_courses_status'] = "Pending";
			} else {
				$c_data['admission_courses_status'] = "Ongoing";
			}

			$this->db->insert('admission_courses', $c_data);
		} else {
			$subcourse = $this->admi->get_reco_multiple('rnw_subpackage','package_id',$co_p);

			foreach ($subcourse as $key => $value) {
				if ($data['stating_course_id_pco'] == $value->subcourse_id && $respose->batch_id!="") {
					$c_data['admission_courses_status'] = "Ongoing";
				} else {
					$c_data['admission_courses_status'] = "Pending";
				}
				$c_data['courses_id'] = $value->subcourse_id;
				$c_data['admission_id'] = $respose->admission_id;
				$c_data['gr_id'] = $respose->gr_id;
				$c_data['branch_id'] = $respose->branch_id;
				$c_data['batch_id'] = $respose->batch_id;
				$c_data['course_orpackage_id'] = $respose->package_id;
				$c_data['stating_date'] = $respose->admission_date;
				$c_data['surname'] = $respose->surname;
				$c_data['first_name'] = $respose->first_name;
				$c_data['email'] = $respose->email;

				$this->db->insert('admission_courses', $c_data);
			}
		}
		
		$instalment_data['admission_id'] = $respose->admission_id;
		$instalment_data['branch_id'] = $respose->branch_id;
		$instalment_data['registration_fees'] = $data['registration_fees'];
		$instalment_data['installment_date'] = date("Y-m-d", strtotime($installment_date_first));
		$instalment_data['installment_no'] = "1";
		$instalment_data['due_amount'] = $data['registration_fees'];
		$instalment_data['payment_type'] = "Regular Payment";
		$instalment_data['payment_mode'] = $data['payment_mode'];
		if ($data['payment_mode'] == "Cash") {
			$instalment_data['paid_amount'] = $data['registration_fees'];
		}
		if ($data['payment_mode'] == "Cheque") {
			$instalment_data['cheque_no'] = $cheque_no;
			$instalment_data['cheque_date'] = date("Y-m-d", strtotime($cheque_date));
			$instalment_data['bank_name'] = $bank_name;
			$instalment_data['bank_branch_name'] = $bank_branch_name;
			$instalment_data['cheque_status'] = $cheque_status;
			$instalment_data['cheque_holder_name'] = $cheque_holder_name;
			$instalment_data['paid_amount'] = "";
		}

		if ($data['payment_mode'] == "DD") {
			$instalment_data['cheque_no'] = $cheque_no;
			$instalment_data['cheque_date'] = date("Y-m-d", strtotime($cheque_date));
			$instalment_data['bank_name'] = $bank_name;
			$instalment_data['bank_branch_name'] = $bank_branch_name;
			$instalment_data['cheque_status'] = $cheque_status;
			$instalment_data['cheque_holder_name'] = $cheque_holder_name;
			$instalment_data['paid_amount'] = "";
		}

		if ($data['payment_mode'] == "Credit Card") {
			$instalment_data['transaction_no'] = $transaction_no;
			$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
			$instalment_data['paid_amount'] = $data['registration_fees'];
		}

		if ($data['payment_mode'] == "Debit Card") {
			$instalment_data['transaction_no'] = $transaction_no;
			$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
			$instalment_data['paid_amount'] = $data['registration_fees'];
		}

		if ($data['payment_mode'] == "Debit Card") {
			$instalment_data['transaction_no'] = $transaction_no;
			$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
			$instalment_data['paid_amount'] = $data['registration_fees'];
		}

		if ($data['payment_mode'] == "Online Payment") {
			$instalment_data['transaction_no'] = $transaction_no;
			$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
			$instalment_data['paid_amount'] = $data['registration_fees'];
		}

		if ($data['payment_mode'] == "NEFT / IMPS") {
			$instalment_data['transaction_no'] = $transaction_no;
			$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
			$instalment_data['bank_name'] = $bank_name;
			$instalment_data['bank_branch_name'] = $bank_branch_name;
			$instalment_data['paid_amount'] = $data['registration_fees'];
		}

		if ($data['payment_mode'] == "Paytm") {
			$instalment_data['transaction_no'] = $transaction_no;
			$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
			$instalment_data['paid_amount'] = $data['registration_fees'];
		}

		if ($data['payment_mode'] == "Banck Deposit (Cash)") {
			$instalment_data['transaction_no'] = $transaction_no;
			$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
			$instalment_data['paid_amount'] = $data['registration_fees'];
		}

		if ($data['payment_mode'] == "Capital Float (EMI)") {
			$instalment_data['transaction_no'] = $transaction_no;
			$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
			$instalment_data['paid_amount'] = $data['registration_fees'];
		}

		if ($data['payment_mode'] == "Google Pay") {
			$instalment_data['transaction_no'] = $transaction_no;
			$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
			$instalment_data['paid_amount'] = $data['registration_fees'];
		}

		if ($data['payment_mode'] == "Phone Pay") {
			$instalment_data['transaction_no'] = $transaction_no;
			$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
			$instalment_data['paid_amount'] = $data['registration_fees'];
		}

		if ($data['payment_mode'] == "Bajaj Finserv (EMI)") {
			$instalment_data['transaction_no'] = $transaction_no;
			$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
			$instalment_data['paid_amount'] = $data['registration_fees'];
		}

		if ($data['payment_mode'] == "Bhim UPI(India)") {
			$instalment_data['transaction_no'] = $transaction_no;
			$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
			$instalment_data['paid_amount'] = $data['registration_fees'];
		}

		if ($data['payment_mode'] == "Instamojo") {
			$instalment_data['transaction_no'] = $transaction_no;
			$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
			$instalment_data['paid_amount'] = $data['registration_fees'];
		}

		if ($data['payment_mode'] == "Paypal") {
			$instalment_data['transaction_no'] = $transaction_no;
			$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
			$instalment_data['paid_amount'] = $data['registration_fees'];
		}

		if ($data['payment_mode'] == "Razorpay") {
			$instalment_data['transaction_no'] = $transaction_no;
			$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
			$instalment_data['paid_amount'] = $data['registration_fees'];
		}

		$instalment_data['pay_date'] = date('Y-m-d');

		$this->db->insert('admission_installment', $instalment_data);

		$insdocument_data['admission_id'] = $respose->admission_id;

		$this->db->insert('admission_documents', $insdocument_data);

		$record['allrecord'] =  $respose;
		echo json_encode($record);
	}

	public function Send_Otp()
	{
		$data = $this->input->post();

		$mobile = $data['mobile_no'];
		$otp = rand(100000, 999999);
		$_SESSION['session_otp'] = $otp;
		$msg = $otp;
		$ins_data['otp_number'] = $msg;
		$this->db->insert('admission_otp', $ins_data);

		$url = "http://dndsms.vishawebsolutions.com/api/mt/SendSMS?user=Hitesh-RNW&password=Hitz9898&senderid=RNWEDU&channel=Trans&DCS=8&flashsms=0&number=$mobile&text=$msg&route=15";
		/* init the resource */
		$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => 0
		));
		/* get response */
		$output = curl_exec($ch);

		if ($output) {
			$recp["all_record"] = array('status' => 1, "msg" => "Send OTP");
			echo json_encode($recp);
		}
		/* Print error if any */
		if (curl_errno($ch)) {
			echo 'error:' . curl_error($ch);
		}
		curl_close($ch);
		return 1;
	}

	public function verify_otp()
	{
		$data = $this->input->post();
		$otp = $data['mobileOtp'];
		$record = $this->admi->match_opt('admission_otp', 'otp_number', $otp);

		if ($otp == $record->otp_number) {
			$recp["all_record"] = array('status' => 1, "msg" => "Verify OTP");
			echo json_encode($recp);
		} else {
			$recp["all_record"] = array('status' => 1, "msg" => "Not Verify OTP");
			echo json_encode($recp);
		}
	}

	public function erpadmission()
	{
		date_default_timezone_set("Asia/Calcutta");
		if (!empty($this->input->post('full_submit'))) {
			$data = $this->input->post();
			$addby = $_SESSION['user_name'];
			$admission_date =  date('Y-m-d');
			$admission_time = date('h:i A');
			$year = date('Y');
			$admissiontype = "Full";

			$q_amdnumber = $this->db->query("SELECT MAX(admission_number) AS admission_number FROM admission_process ORDER BY admission_id DESC LIMIT 1");
			$a_number =  $q_amdnumber->result_array();
			$admis_number = $a_number[0]['admission_number'];
			$no = number_format($admis_number);
			$admission_number = $no + 1;
			if(empty($data['demo_id'])){
				$demo_id = $data['demo_id'] = ""; 
			}else{
				$demo_id = $data['demo_id'];
			}

			if(empty($data['lead_list_id'])){
				$lead_list_id = $data['lead_list_id'] =""; 
			}else{
				$lead_list_id = $data['lead_list_id'];
			}

			if (empty($data['course_orsingle_two'])) {
				$co = $data['course_orsingle_two'] = "";
			} else {
				$co = $data['course_orsingle_two'];
			}

			if (empty($data['course_or_package_two'])) {
				$co_p = $data['course_or_package_two'] = "";
			} else {
				$co_p = $data['course_or_package_two'];
			}

			if (empty($data['batch_id_two'])) {
				$batch = $data['batch_id_two'] = "";
			} else {
				$batch = $data['batch_id_two'];
			}

			if (empty($data['mobile_no_two'])) {
				$mobile_no = $data['mobile_no_two'] = "";
			} else {
				$mobile_no = $data['mobile_no_two'];
			}

			if (empty($data['installment_no_first'])) {
				$installment_no_first = $data['installment_no_first'] = "";
			} else {
				$installment_no_first = $data['installment_no_first'];
			}

			if (empty($data['installment_date_fisrt'])) {
				$installment_date_fisrt = $data['installment_date_fisrt'] = "";
			} else {
				$installment_date_fisrt = $data['installment_date_fisrt'];
			}

			if (empty($data['due_amount_first'])) {
				$due_amount_first = $data['due_amount_first'] = "";
			} else {

				$due_amount_first = $data['due_amount_first'];
			}

			if (empty($data['paid_amount_first'])) {
				$paid_amount_first = $data['paid_amount_first'] = "";
			} else {
				$paid_amount_first = $data['paid_amount_first'];
			}

			if (empty($data['due_amount'])) {
				$d_amount = $data['due_amount'] = "";
			} else {
				$d_amount = $data['due_amount'];
			}

			if (empty($data['paid_amount'])) {
				$p_amount = $data['paid_amount'] = "";
			} else {
				$p_amount = $data['paid_amount'];
			}

			if (empty($data['installment_no'])) {
				$intsall_no = $data['installment_no'] = "";
			} else {
				$intsall_no = $data['installment_no'];
			}

			if (empty($data['course_category_id'])) {
				$course_category_id = $data['course_category_id'] = "";
			} else {
				$course_category_id = $data['course_category_id'];
			}

			if (empty($data['college_courses_id'])) {
				$college_courses_id = $data['college_courses_id'] = "";
			} else {
				$college_courses_id = $data['college_courses_id'];
			}

			if (empty($data['college_tuition_fees'])) {
				$college_tuition_fees = $data['college_tuition_fees'] = "";
			} else {
				$college_tuition_fees = $data['college_tuition_fees'];
			}

			if (empty($data['college_registration_fees'])) {
				$college_registration_fees = $data['college_registration_fees'] = "";
			} else {
				$college_registration_fees = $data['college_registration_fees'];
			}

			if (empty($data['semester'])) {
				$semester = $data['semester'] = "";
			} else {
				$semester = $data['semester'];
			}
			
			if (empty($data['sem_fees'])) {
				$sem_fees = $data['sem_fees'] = "";
			} else {
				$sem_fees = $data['sem_fees'];
			}

			if (empty($data['exam_date'])) {
				$exam_date = $data['exam_date'] = "";
			} else {
				$exam_date = $data['exam_date'];
			}

			if (empty($data['exam_fees'])) {
				$exam_fees = $data['exam_fees'] = "";
			} else {
				$exam_fees = $data['exam_fees'];
			}

			if (empty($data['no_of_installments'])) {
				$no_of_installments = $data['no_of_semester'];
			} else {
				$no_of_installments = $data['no_of_installments'];
			}
			
			if(@$data['courses_type'] == "single") {
				@$c = $this->cm->select_data('rnw_course', 'course_id', $co);
				@$depart = $c->department_id;
				@$subdepart = $c->subdepartment_id;
				@$stating_course_id = $data['stating_course_id_two'];
			} else if(@$data['courses_type'] == "package"){
				@$p = $this->cm->select_data('rnw_package', 'package_id', $co_p);
				@$depart = $p->department_id;
				@$subdepart = $p->subdepartment_id;
				@$stating_course_id = $data['stating_course_id_pco'];
			}

			if (empty($data['courses_type'])) {
				@$bda = $this->cm->select_data('branch','branch_id',$data['branch_id_two']);
				@$clgco = $this->cm->select_data('college_courses','college_courses_id',$college_courses_id);
				@$type =  $bda->branch_name;
				@$depart = $clgco->department_id;
				@$subdepart = $course_category_id;
				@$stating_course_id = "";
			} else {
				$type =  $data['courses_type'];
			}

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

			$check_record = $this->cm->select_data('admission_process', 'mobile_no', $mobile_no);
			if ($check_record == '') {
				$query = $this->db->query("SELECT MAX(gr_id) AS gr_id FROM admission_process ORDER BY admission_id DESC LIMIT 1");
				$q2 =  $query->result();
				$g_id = 0;

				if (count($q2) > 0) {
					if (!empty($q2[0]->gr_id)) {
						$g_id =  1 + $q2[0]->gr_id;
					} else {
						$g_id = 7501;
					}
				} else {
					$g_id = 7501;
				}
			} else {
				$g_id = $check_record->gr_id;
			}

			$b_all = $this->cm->select_data('branch', 'branch_id', $data['branch_id_two']);
			$dm = date('Y-m');
			$date_month = substr($dm, 2);
			$x = $this->db->query("SELECT count(admission_id) as c, branch_id  FROM admission_process GROUP BY branch_id");
			$y =  $x->result_array();
			$fl =0;
			foreach($y as $v)
			{
				if($v['branch_id']==$data['branch_id_two'])
				{
				 $erno =	$v['c']+1;
				  $fl=1;
				}
			}
			if($fl == 0){
				$erno = 1;
			}

			$enrollment_number = $b_all->branch_code . "-" . $date_month . "-" . $erno;

			if(@$type=="COLLEGE"){
				$admission_status = "Running";
			}
			else if (empty($batch)) {
				$admission_status = "Pending";
			}
			else {
				$admission_status = "Running";
			}

			$record = array('gr_id' => $g_id, 'admission_number' => $admission_number, 'enrollment_number' => $enrollment_number, 'admission_date' => $admission_date,'admission_time'=>$admission_time ,'mobile_no' => $data['mobile_no_two'], 'alternate_mobile_no' => $data['alternate_no_two'], 'email' => $data['email_two'], 'source_id' => $data['source_id_two'], 'first_name' => $data['first_name_two'], 'surname' => $data['last_name'], 'stu_dob' => $data['stu_dob'] , 'gender' => $data['gender'] ,'addby' => $addby, 'branch_id' => $data['branch_id_two'], 'year' => $year, 'department_id' => $depart, 'subdepartment_id' => $subdepart, 'type' => $type, 'course_id' => $co, 'package_id' => $co_p, 'stating_course_id' => $stating_course_id,'college_courses_id' => $college_courses_id,'batch_id' => $batch, 'tuation_fees' => $data['tuation_fees_two'], 'registration_fees' => $data['registration_fees_two'], 'college_tuition_fees' => $college_tuition_fees ,'college_registration_fees' => $college_registration_fees ,'no_of_installment' => $no_of_installments, 'admission_status' => $admission_status,'present_state_id' => $data['present_state_id'], 'present_city_id' => $data['present_city_id'], 'present_area_id' => $data['present_area_id'], 'present_pin_code' => $data['present_pin_code'], 'present_flate_house_no' => $data['present_house_building_no'], 'present_area_street' =>$data['present_street_area'],'present_landmark'=>$data['present_landmark_colony'], 'permanent_country_id'=>'India','permanent_state_id'=>$data['permanent_state_id'],'permanent_city_id'=>$data['permanent_city_id'],'permanent_area_id'=>$data['permanent_area_id'],'permanent_pin_code'=>$data['permanent_pin_code'],'permanent_flate_house_no' => $data['permanent_house_building_no'],'permanent_area_street'=>$data['permanent_street_area'],'permanent_landmark'=>$data['permanent_landmark_colony'],'father_name' => $data['father_name'], 'father_email' => $data['father_email'], 'father_mobile_no' => $data['father_mobile_no'], 'father_occupation' => $data['father_occupation'], 'father_income' => $data['father_income'], 'mother_name' => $data['mother_name'], 'mother_email' => $data['mother_email'], 'mother_mobile_no' => $data['mother_mobile_no'], 'mother_occupation' => $data['mother_occupation'], 'mother_income' => $data['mother_income'], 'school_collage_name' => $data['school_collage_name'], 'present_country_id' => "India", 'school_clg_state' => $data['school_clg_state'], 'school_clg_city' => $data['school_clg_city'], 'school_clg_area' => $data['school_clg_area'], 'school_collage_type' => $data['school_collage_type'],'admission_type' => $admissiontype,'demo_id' => $demo_id ,'lead_list_id' => $lead_list_id);
		
			$respose  = $this->admi->insert_endlast_ins_data('admission_process', $record);
            
			if($respose->type=="COLLEGE")
			{
				$c_data['admission_id'] = $respose->admission_id;
				$c_data['gr_id'] = $respose->gr_id;
				$c_data['branch_id'] = $respose->branch_id;
				$c_data['college_courses_id'] = $respose->college_courses_id;
				$c_data['batch_id'] = $respose->batch_id;
				$c_data['stating_date'] = $respose->admission_date;
				$c_data['surname'] = $respose->surname;
				$c_data['first_name'] = $respose->first_name;
				$c_data['email'] = $respose->email;
				$c_data['admission_courses_status'] = "Pending";

				$this->db->insert('admission_courses', $c_data);

				$instalment_data['admission_id'] = $respose->admission_id;
				$instalment_data['branch_id'] = $respose->branch_id;
				$instalment_data['registration_fees'] = $data['college_registration_fees'];
				$instalment_data['installment_date'] = $respose->admission_date;
				$instalment_data['installment_no'] = "1";
				$instalment_data['due_amount'] = $college_registration_fees;
				$instalment_data['payment_type'] = $data['payment_type'];
				$instalment_data['payment_mode'] = $data['payment_mode'];
				if ($data['payment_mode'] == "Cash") {
					$instalment_data['paid_amount'] = $college_registration_fees;
				}
				if ($data['payment_mode'] == "Cheque") {
					$instalment_data['cheque_no'] = $cheque_no;
					$instalment_data['cheque_date'] = date("Y-m-d", strtotime($cheque_date));
					$instalment_data['bank_name'] = $bank_name;
					$instalment_data['bank_branch_name'] = $bank_branch_name;
					$instalment_data['cheque_status'] = $cheque_status;
					$instalment_data['cheque_holder_name'] = $cheque_holder_name;
					$instalment_data['paid_amount'] = "";
				}
	
				if ($data['payment_mode'] == "DD") {
					$instalment_data['cheque_no'] = $cheque_no;
					$instalment_data['cheque_date'] = date("Y-m-d", strtotime($cheque_date));
					$instalment_data['bank_name'] = $bank_name;
					$instalment_data['bank_branch_name'] = $bank_branch_name;
					$instalment_data['cheque_status'] = $cheque_status;
					$instalment_data['cheque_holder_name'] = $cheque_holder_name;
					$instalment_data['paid_amount'] = "";
				}
	
				if ($data['payment_mode'] == "Credit Card") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $college_registration_fees;
				}
	
				if ($data['payment_mode'] == "Debit Card") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $college_registration_fees;
				}
	
				if ($data['payment_mode'] == "Debit Card") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $college_registration_fees;
				}
	
				if ($data['payment_mode'] == "Online Payment") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $college_registration_fees;
				}
	
				if ($data['payment_mode'] == "NEFT / IMPS") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['bank_name'] = $bank_name;
					$instalment_data['bank_branch_name'] = $bank_branch_name;
					$instalment_data['paid_amount'] = $college_registration_fees;
				}
	
				if ($data['payment_mode'] == "Paytm") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $college_registration_fees;
				}
	
				if ($data['payment_mode'] == "Banck Deposit (Cash)") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $paid_amoucollege_registration_feesnt_first;
				}
	
				if ($data['payment_mode'] == "Capital Float (EMI)") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $college_registration_fees;
				}
	
				if ($data['payment_mode'] == "Google Pay") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $college_registration_fees;
				}
	
				if ($data['payment_mode'] == "Phone Pay") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $college_registration_fees;
				}
	
				if ($data['payment_mode'] == "Bajaj Finserv (EMI)") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $college_registration_fees;
				}
	
				if ($data['payment_mode'] == "Bhim UPI(India)") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $college_registration_fees;
				}
	
				if ($data['payment_mode'] == "Instamojo") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $college_registration_fees;
				}
	
				if ($data['payment_mode'] == "Paypal") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $college_registration_fees;
				}
	
				if ($data['payment_mode'] == "Razorpay") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $college_registration_fees;
				}	

				$instalment_data['pay_date'] = date('Y-m-d');
	
				$this->db->insert('admission_installment', $instalment_data);

				$i = 0;
				foreach($data['sem_date'] as $key => $value) {

					$intalment_record['installment_date'] = $value;
					$intalment_record['installment_no'] = $semester[$i];
					$intalment_record['due_amount'] = $sem_fees[$i];
					$intalment_record['admission_id'] = $respose->admission_id;
					$intalment_record['branch_id'] = $respose->branch_id;
	
					$i++;
					$result = $this->db->insert('admission_installment', $intalment_record);
				}

				$j = 0;
				foreach($data['exam_date'] as $key => $value) {

					$intalment_record['installment_date'] = $value;
					$intalment_record['installment_no'] = $semester[$j];
					$intalment_record['due_amount'] = $exam_fees[$j];
					$intalment_record['admission_id'] = $respose->admission_id;
					$intalment_record['branch_id'] = $respose->branch_id;
	
					$j++;
					$result = $this->db->insert('admission_installment', $intalment_record);
				}
			}
			else
			{
				if (empty($respose->package_id)) {
					$c_data['admission_id'] = $respose->admission_id;
					$c_data['gr_id'] = $respose->gr_id;
					$c_data['branch_id'] = $respose->branch_id;
					$c_data['courses_id'] = $respose->stating_course_id;
					$c_data['batch_id'] = $respose->batch_id;
					$c_data['course_orpackage_id'] = $respose->course_id;
					$c_data['stating_date'] = $respose->admission_date;
					$c_data['surname'] = $respose->surname;
					$c_data['first_name'] = $respose->first_name;
					$c_data['email'] = $respose->email;
					if($respose->batch_id==""){
						$c_data['admission_courses_status'] = "Pending";
					} else {
						$c_data['admission_courses_status'] = "Ongoing";
					}
					
					$this->db->insert('admission_courses', $c_data);
				} else {
						$subcourse = $this->admi->get_reco_multiple('rnw_subpackage','package_id',$co_p);
	
						foreach ($subcourse as $key => $value) {
							if ($data['stating_course_id_pco'] == $value->subcourse_id && $respose->batch_id!="") {
								$c_data['admission_courses_status'] = "Ongoing";
							} else {
								$c_data['admission_courses_status'] = "Pending";
							}
							$c_data['courses_id'] = $value->subcourse_id;
							$c_data['admission_id'] = $respose->admission_id;
							$c_data['gr_id'] = $respose->gr_id;
							$c_data['branch_id'] = $respose->branch_id;
							$c_data['batch_id'] = $respose->batch_id;
							$c_data['course_orpackage_id'] = $respose->package_id;
							$c_data['stating_date'] = $respose->admission_date;
							$c_data['surname'] = $respose->surname;
							$c_data['first_name'] = $respose->first_name;
							$c_data['email'] = $respose->email;
	
							$this->db->insert('admission_courses', $c_data);
						}
				}
				
				$instalment_data['admission_id'] = $respose->admission_id;
				$instalment_data['branch_id'] = $respose->branch_id;
				$instalment_data['registration_fees'] = $data['registration_fees_two'];
				$instalment_data['installment_date'] = date('Y-m-d',strtotime($installment_date_fisrt));
				$instalment_data['installment_no'] = $installment_no_first;
				$instalment_data['due_amount'] = $due_amount_first;
				$instalment_data['payment_type'] = $data['payment_type'];
				$instalment_data['payment_mode'] = $data['payment_mode'];
				if ($data['payment_mode'] == "Cash") {
					$instalment_data['paid_amount'] = $paid_amount_first;
				}
				if ($data['payment_mode'] == "Cheque") {
					$instalment_data['cheque_no'] = $cheque_no;
					$instalment_data['cheque_date'] = date("Y-m-d", strtotime($cheque_date));
					$instalment_data['bank_name'] = $bank_name;
					$instalment_data['bank_branch_name'] = $bank_branch_name;
					$instalment_data['cheque_status'] = $cheque_status;
					$instalment_data['cheque_holder_name'] = $cheque_holder_name;
					$instalment_data['paid_amount'] = "";
				}
	
				if ($data['payment_mode'] == "DD") {
					$instalment_data['cheque_no'] = $cheque_no;
					$instalment_data['cheque_date'] = date("Y-m-d", strtotime($cheque_date));
					$instalment_data['bank_name'] = $bank_name;
					$instalment_data['bank_branch_name'] = $bank_branch_name;
					$instalment_data['cheque_status'] = $cheque_status;
					$instalment_data['cheque_holder_name'] = $cheque_holder_name;
					$instalment_data['paid_amount'] = "";
				}
	
				if ($data['payment_mode'] == "Credit Card") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $paid_amount_first;
				}
	
				if ($data['payment_mode'] == "Debit Card") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $paid_amount_first;
				}
	
				if ($data['payment_mode'] == "Debit Card") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $paid_amount_first;
				}
	
				if ($data['payment_mode'] == "Online Payment") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $paid_amount_first;
				}
	
				if ($data['payment_mode'] == "NEFT / IMPS") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['bank_name'] = $bank_name;
					$instalment_data['bank_branch_name'] = $bank_branch_name;
					$instalment_data['paid_amount'] = $paid_amount_first;
				}
	
				if ($data['payment_mode'] == "Paytm") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $paid_amount_first;
				}
	
				if ($data['payment_mode'] == "Banck Deposit (Cash)") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $paid_amount_first;
				}
	
				if ($data['payment_mode'] == "Capital Float (EMI)") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $paid_amount_first;
				}
	
				if ($data['payment_mode'] == "Google Pay") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $paid_amount_first;
				}
	
				if ($data['payment_mode'] == "Phone Pay") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $paid_amount_first;
				}
	
				if ($data['payment_mode'] == "Bajaj Finserv (EMI)") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $paid_amount_first;
				}
	
				if ($data['payment_mode'] == "Bhim UPI(India)") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $paid_amount_first;
				}
	
				if ($data['payment_mode'] == "Instamojo") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $paid_amount_first;
				}
	
				if ($data['payment_mode'] == "Paypal") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $paid_amount_first;
				}
	
				if ($data['payment_mode'] == "Razorpay") {
					$instalment_data['transaction_no'] = $transaction_no;
					$instalment_data['transaction_date'] = date("Y-m-d", strtotime($transaction_date));
					$instalment_data['paid_amount'] = $paid_amount_first;
				}
				
				$instalment_data['pay_date'] = date('Y-m-d');
	
				$this->db->insert('admission_installment', $instalment_data);
	
				$i = 0;
				foreach ($data['installment_date'] as $key => $value) {
	
					$date = date("Y-m-d", strtotime($value));
					$intalment_record['installment_date'] = $date;
					$intalment_record['installment_no'] = $intsall_no[$i];
					$intalment_record['due_amount'] = $d_amount[$i];
					$intalment_record['paid_amount'] = $p_amount[$i];
					$intalment_record['admission_id'] = $respose->admission_id;
					$intalment_record['branch_id'] = $respose->branch_id;
					$intalment_record['registration_fees'] = $data['registration_fees_two'];
	
					$i++;
					$result = $this->db->insert('admission_installment', $intalment_record);
				}
			}

			$this->session->set_userdata('lastAdmissionId', $respose->admission_id);
			$this->session->set_userdata('lastoneTimeId', $respose->admission_id);
			$display['receipt_id'] =  $this->session->userdata('lastoneTimeId');
		}

	    if(!empty($this->session->userdata('lastAdmissionId'))){  
			$import_data['admission_id'] = $this->session->userdata('lastAdmissionId');

			if ($_FILES['photos']['name'] != "") {
				$config['allowed_types'] = "*";
				$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
				$new_name = time() . $_FILES["photos"]['name'];
				$config['file_name'] = $new_name;
				$this->load->library('upload');
				$this->upload->initialize($config);

				if ($this->upload->do_upload('photos')) {
					$imagedata = $this->upload->data();
					$import_data['photos'] = $imagedata['file_name'];
					$config['image_library'] = 'gd2';
					$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
					$config['new_image'] = './dist/admissiondocuments/';
					$config['maintain_ratio'] = TRUE;
					$config['width']    = 640;
					$config['height']   = 480;

					$this->load->library('image_lib', $config);

					if (!$this->image_lib->resize()) {
						echo $this->image_lib->display_errors();
					} else {
						echo "success"; 
					}
				} else {
					$display['msgp'] = "image not uploaded";
				}
			}

			if ($_FILES['tenth_marksheet']['name'] != "") {
				$config['allowed_types'] = "*";
				$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
				$new_name = time() . $_FILES["tenth_marksheet"]['name'];
				$config['file_name'] = $new_name;
				$this->load->library('upload');
				$this->upload->initialize($config);

				if ($this->upload->do_upload('tenth_marksheet')) {
					$imagedata = $this->upload->data();
					$import_data['tenth_marksheet'] = $imagedata['file_name'];
					$config['image_library'] = 'gd2';
					$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
					$config['new_image'] = './dist/admissiondocuments/';
					$config['maintain_ratio'] = TRUE;
					$config['width']    = 640;
					$config['height']   = 480;

					$this->load->library('image_lib', $config);

					if (!$this->image_lib->resize()) {
						echo $this->image_lib->display_errors();
					} else {
						echo "success"; 
					}
				} else {
					$display['msgp'] = "image not uploaded";
				}	
			}

			if ($_FILES['twelfth_marksheet']['name'] != "") {
				$config['allowed_types'] = "*";
				$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
				$new_name = time() . $_FILES["twelfth_marksheet"]['name'];
				$config['file_name'] = $new_name;
				$this->load->library('upload');
				$this->upload->initialize($config);

				if ($this->upload->do_upload('twelfth_marksheet')) {
					$imagedata = $this->upload->data();
					$import_data['twelfth_marksheet'] = $imagedata['file_name'];
					$config['image_library'] = 'gd2';
					$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
					$config['new_image'] = './dist/admissiondocuments/';
					$config['maintain_ratio'] = TRUE;
					$config['width']    = 640;
					$config['height']   = 480;

					$this->load->library('image_lib', $config);

					if (!$this->image_lib->resize()) {
						echo $this->image_lib->display_errors();
					} else {
						echo "success"; 
					}
				} else {
					$display['msgp'] = "image not uploaded";
				}
			}

			if ($_FILES['leaving_certy']['name'] != "") {

				$config['allowed_types'] = "*";
				$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
				$new_name = time() . $_FILES["leaving_certy"]['name'];
				$config['file_name'] = $new_name;
				$this->load->library('upload');
				$this->upload->initialize($config);

				if ($this->upload->do_upload('leaving_certy')) {
					$imagedata = $this->upload->data();
					$import_data['leaving_certy'] = $imagedata['file_name'];
					$config['image_library'] = 'gd2';
					$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
					$config['new_image'] = './dist/admissiondocuments/';
					$config['maintain_ratio'] = TRUE;
					$config['width']    = 640;
					$config['height']   = 480;

					$this->load->library('image_lib', $config);

					if (!$this->image_lib->resize()) {
						echo $this->image_lib->display_errors();
					} else {
						echo "success"; 
					}
				} else {
					$display['msgp'] = "image not uploaded";
				}
			}

			if ($_FILES['treal_certy']['name'] != "") {
				$config['allowed_types'] = "*";
				$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
				$new_name = time() . $_FILES["treal_certy"]['name'];
				$config['file_name'] = $new_name;
				$this->load->library('upload');
				$this->upload->initialize($config);

				if ($this->upload->do_upload('treal_certy')) {
					$imagedata = $this->upload->data();
					$import_data['treal_certy'] = $imagedata['file_name'];
					$config['image_library'] = 'gd2';
					$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
					$config['new_image'] = './dist/admissiondocuments/';
					$config['maintain_ratio'] = TRUE;
					$config['width']    = 640;
					$config['height']   = 480;

					$this->load->library('image_lib', $config);

					if (!$this->image_lib->resize()) {
						echo $this->image_lib->display_errors();
					} else {
						echo "success"; 
					}
				} else {
					$display['msgp'] = "image not uploaded";
				}
			}

			if ($_FILES['light_bill']['name'] != "") {
				$config['allowed_types'] = "*";
				$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
				$new_name = time() . $_FILES["light_bill"]['name'];
				$config['file_name'] = $new_name;
				$this->load->library('upload');
				$this->upload->initialize($config);

				if ($this->upload->do_upload('light_bill')) {
					$imagedata = $this->upload->data();
					$import_data['light_bill'] = $imagedata['file_name'];
					$config['image_library'] = 'gd2';
					$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
					$config['new_image'] = './dist/admissiondocuments/';
					$config['maintain_ratio'] = TRUE;
					$config['width']    = 640;
					$config['height']   = 480;

					$this->load->library('image_lib', $config);

					if (!$this->image_lib->resize()) {
						echo $this->image_lib->display_errors();
					} else {
						echo "success"; 
					}
				} else {
					$display['msgp'] = "image not uploaded";
				}
			}

			if ($_FILES['aadhar_card']['name'] != "") {
				$config['allowed_types'] = "*";
				$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
				$new_name = time() . $_FILES["aadhar_card"]['name'];
				$config['file_name'] = $new_name;
				$this->load->library('upload');
				$this->upload->initialize($config);

				if ($this->upload->do_upload('aadhar_card')) {
					$imagedata = $this->upload->data();
					$import_data['aadhar_card'] = $imagedata['file_name'];
					$config['image_library'] = 'gd2';
					$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
					$config['new_image'] = './dist/admissiondocuments/';
					$config['maintain_ratio'] = TRUE;
					$config['width']    = 640;
					$config['height']   = 480;

					$this->load->library('image_lib', $config);

					if (!$this->image_lib->resize()) {
						echo $this->image_lib->display_errors();
					} else {
						echo "success"; 
					}

				} else {
					$display['msgp'] = "image not uploaded";
				}
			}

			$this->db->insert('admission_documents', $import_data);
			$this->session->unset_userdata('lastAdmissionId');
		 }

		 $update['upd_faculty'] = $this->cm->view_all("faculty");
		 $update['upd_branch'] = $this->cm->view_all("branch");
		 $update['f_module'] = $this->cm->view_all("f_module");
		 $update['m_module'] = $this->cm->view_all("m_module");
		 $update['l_module'] = $this->cm->view_all("l_module");
		 $update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
		 $update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
		 $update['course_completed'] = $this->cm->course_completed_student("admission_courses");
		 $update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
		 $update['course_data'] = $this->cm->view_all("course");
		 $update['upd_branch'] = $this->cm->view_all("branch");
		 $update['upd_see'] = $this->cm->check_update("demo");

	    $display['list_source'] = $this->cm->view_all("source");
		$display['list_department'] = $this->cm->view_all("department");
		$display['list_subdepartment'] = $this->cm->view_all("subdepartment");
		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("course");
		$display['list_package'] = $this->cm->view_all("package");
		$display['list_source'] = $this->cm->view_all("lead_source");
		$display['list_country'] = $this->cm->view_all("country");
		$display['list_state'] = $this->cm->view_all("state");
		$display['list_city'] = $this->cm->view_all("cities");
		$display['list_area'] = $this->cm->view_all("city_area");
		$display['list_batch'] = $this->cm->view_all("batch_list");
		$display['all_admission'] = $this->cm->view_all("admission_process");
		$display['hod_all'] = $this->cm->view_all_hod_demo("hod");
		$display['faculty_all'] = $this->cm->view_all("faculty");
		$display['admisison_process_data'] = $this->cm->view_all("admission_process");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/erpadmission', $display);
	}

	public function erpheader(){
		$update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");

	   $this->load->view('erp/erpheader', $update);
	}

	public function clg_category()
	{
		$did = $this->input->post('branch_id');

		$subdepartment = $this->admi->view_all('subdepartment');
		echo '<option value="">Select Category</option>';
		foreach ($subdepartment as $dn) {
			$flag = 0;
			$dnbi = explode(',', $dn['branch_id']);
			if (in_array($did, $dnbi)) {
				$flag = 1;
			}
			if ($flag == 1) {
			?>
			<option value="<?php echo $dn['subdepartment_id']; ?>"><?php echo $dn['subdepartment_name']; ?></option>
			<?php
			}
		}
	}

	public function erpadmission_view()
	{
		$bbbranch_id = $_SESSION['Admin']['branch_id'];
		if(!empty($this->input->post('filter_admission'))) {
			$filter = $this->input->post();
			$display['list_all_admission'] = $this->admi->admission_view_all('admission_process', $filter);
			$all_status = array();
			if (@$this->input->get('status') && $this->input->get('status') != 'All') {
				$chek =  $this->input->get('status');
				$records = $this->admi->get_admission_record_by_status_wise('admission_process', 'admission_status', $chek);
				foreach ($display['list_all_admission'] as $value) {
					$all_status[] =  $value->admission_status;
				}
				$count = 0;
				foreach ($all_status as $val) {
					$query = $this->db->query("SELECT * FROM admission_process Where `admission_status`='$val' AND `branch_id` IN ($bbbranch_id)");
					$num_of_row[$val] =  $query->num_rows();
				}

				$display['list_all_admission'] = $records;

			} else {
				$all_status = array();
				foreach($display['list_all_admission'] as $value) {
					$all_status[] =  $value->admission_status;
				}
				$count = 0;
				foreach($all_status as $val) {
					$query = $this->db->query("SELECT * FROM admission_process Where `admission_status`='$val' AND `branch_id` IN ($bbbranch_id)");
					$num_of_row[$val] =  $query->num_rows();
				}
			}

			$display['all_list_admission'] = $this->admi->view_all_admission_course('admission_process');

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
				$record = array();
				$k = 0;

				for ($j = 0; $j < sizeof($data); $j++) {
					if (@$data[$i]->gr_id == @$data[$j]->gr_id) {
						if(@$data[$i]->type == 'single') {
							$record = @$data[$i]->course_name;
						} else if (@$data[$i]->type == 'package') {
							$record = @$data[$i]->package_name;
						} else if (@$data[$i]->type == 'COLLEGE') {
							$record = @$data[$i]->college_course_name;
						} 
					}
				}
				// print_r($record);
				$alldata[@$data[$i]->gr_id][@$data[$i]->admission_id] = $record;
			}

			for ($i = 0; $i < sizeof($display['list_all_admission']); $i++) {
				foreach ($alldata as $k => $v) {
					if (@$display['list_all_admission'][$i]->gr_id ==  $k) {
						$display['list_all_admission'][$i]->list_multi_course_admission = $v;
					}
				}
			}

			$pa = 0;
			foreach ($display['all_list_admission'] as $keys => $vals) {
				$this->db->select_sum('paid_amount');
				$this->db->select('admission_id');
				// $this->db->group_by('gr_id');
				$this->db->from('admission_installment');
				$this->db->where('admission_id', $vals->admission_id);
				$this->db->count_all();
				$query = $this->db->get();
				$total_ammount[$pa] = $query->result();
				$pa++;
			}
			for($p = 0; $p <sizeof($display['list_all_admission']); $p++) {
				$f =0;
				for($mk =0; $mk<sizeof($total_ammount); $mk++){

					if($display['list_all_admission'][$p]->admission_id == @$total_ammount[$mk][0]->admission_id)
					{
						$f =1;
						$dddd = $mk;
						break;
					}

				}
					if($f == 1){
						// $display['list_all_admission'][$p]);
						$display['list_all_admission'][$p]->paidcount = $total_ammount[$dddd];
					} else {
						$display['list_all_admission'][$p]->paidcount = 0;
					}
			}


			$branch_id = explode(',',$_SESSION['branch_ids']);
			$admissionreco = array();
			foreach($display['list_all_admission'] as $k=>$va){
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
		    $display['list_all_admission'] = $newadmissioncre;

			$display['filter_year'] = @$filter['filter_year'];
			$display['filter_startDate'] = @$filter['filter_startDate'];
			$display['filter_endDate'] = @$filter['filter_endDate'];
			$display['filter_fname'] = @$filter['filter_fname'];
			$display['filter_lname'] = @$filter['filter_lname'];
			$display['filter_gr_id'] = @$filter['filter_gr_id'];
			$display['filter_enrollnno'] = @$filter['filter_enrollnno'];
			$display['filter_email'] = @$filter['filter_email'];
			$display['filter_mobile'] = @$filter['filter_mobile'];
			$display['filter_source'] = @$filter['filter_source'];
			$display['filter_branch'] = @$filter['filter_branch'];
			$display['filter_department'] = @$filter['filter_department'];
			$display['filter_course'] = @$filter['filter_course'];
			$display['filter_package'] = @$filter['filter_package'];
			$display['filter_clg_course'] = @$filter['filter_clg_course'];
			$display['filter_on'] = "dfgf";
			$display['status_wise'] = $num_of_row;
		} else {
			$status_all  = $this->admi->view_all_admission_record('admission_process');

			if (@$this->input->get('status') && $this->input->get('status') != 'All') {
				$chek =  $this->input->get('status');
				$records = $this->admi->get_admission_record_by_status_wise('admission_process', 'admission_status', $chek);
				
				foreach ($status_all as $value) {
					$all_status[] =  $value->admission_status;
				}

				$count = 0;
				foreach ($all_status as $val) {
					$query = $this->db->query("SELECT * FROM admission_process Where `admission_status`='$val' AND `branch_id` IN ($bbbranch_id)");
					$num_of_row[$val] =  $query->num_rows();
				}

				$display['list_all_admission'] = $records;
			} else {
				foreach ($status_all as $value) {
					$all_status[] =  $value->admission_status;
				}
				$count = 0;
				if(!empty($all_status)){
					foreach ($all_status as $val) {
						$query = $this->db->query("SELECT * FROM admission_process Where `admission_status`='$val' AND `branch_id` IN ($bbbranch_id)");
						$num_of_row[$val] =  $query->num_rows();
					}
				}

				$display['list_all_admission'] = $this->admi->admission_view_all('admission_process');
			}
			$display['all_list_admission'] = $this->admi->view_all_admission_course('admission_process');
			
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
					// print_r($record);
					$alldata[$data[$i]->gr_id][$data[$i]->admission_id] = $record;
				}
			}

			for ($i = 0; $i < sizeof($display['list_all_admission']); $i++) {
				foreach ($alldata as $k => $v) {
					if (@$display['list_all_admission'][$i]->gr_id ==  $k) {
						$display['list_all_admission'][$i]->list_multi_course_admission = $v;
					}
				}
			}

			$pa = 0;
			foreach ($display['all_list_admission'] as $keys => $vals) {
				$this->db->select_sum('paid_amount');
				$this->db->select('admission_id');
				// $this->db->group_by('gr_id');
				$this->db->from('admission_installment');
				$this->db->where('admission_id', $vals->admission_id);
				$this->db->count_all();
				$query = $this->db->get();
				$total_ammount[$pa] = $query->result();
				$pa++;
			}
			for($p = 0; $p <sizeof($display['list_all_admission']); $p++) {
				$f =0;
				for($mk =0; $mk<sizeof($total_ammount); $mk++){

					if($display['list_all_admission'][$p]->admission_id == @$total_ammount[$mk][0]->admission_id){
						$f =1;
						$dddd = $mk;
						break;
					}
				}
					if($f == 1){
						// $display['list_all_admission'][$p]);
						$display['list_all_admission'][$p]->paidcount = $total_ammount[$dddd];
					}
					else{
						$display['list_all_admission'][$p]->paidcount = 0;
					}
			}


			$branch_id = explode(',',$_SESSION['branch_ids']);
			$admissionreco = array();
			foreach($display['list_all_admission'] as $k=>$va){
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
		    $display['list_all_admission'] = $newadmissioncre;
		}

		// print_r($num_of_row);
		// die;
		// echo "<pre>";
		// print_r($display['list_all_admission']);
		// exit;
		$display['status_wise'] = $num_of_row;
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

		// $display['list_source'] = $this->cm->view_all("source");
		$display['list_department'] = $this->cm->view_all("department");
		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['list_package'] = $this->cm->view_all("rnw_package");
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
		// print_r($display['batches_all']);
		// print_r($display['faculty_all']);
		// exit;
		$display['college_courses_all'] = $this->cm->view_all("college_courses");
		$display['admisison_process_data'] = $this->cm->view_all("admission_process");
		$display['overdue_fees_counting_list'] = $this->admi->overdue_fees_counting("admission_installment");
		$display['sms_template_list'] = $this->cm->view_all("sms_template");
		$display['list_email_template'] = $this->cm->view_all("email_template_category");
		$display['list_all_admission_count'] = $this->admi->all_count_admission("admission_process");
		$display['list_dropdown_adm'] = $this->cm->view_all("dropdown_adm");
		$display['doc_list'] = $this->cm->view_all("admission_documents");

		if (!empty($this->input->post('test'))) {
			$this->load->view('erp/ajax_erpadmission_view', $display);
		} else {
			$this->load->view('erp/erpheader', $update);
			$this->load->view('erp/erpadmission_view', $display);
			//$this->load->view('erp/erpfooter',$update);
		}
	}


	public function erpbatch()
	{
		if (!empty($this->input->post('filter_batches'))) {
			$filter = $this->input->post();

			$display["list_all_batches"] = $this->admi->batches_view_all("batches", $filter);

			$branch_id = explode(',',$_SESSION['branch_ids']);
			$batchreco = array();
			foreach($display['list_all_batches'] as $k=>$va){
				$br_id = explode(',',$va->branch_id);
				if($br_id[0] != ''){
					for($i=0; $i<sizeof($branch_id); $i++){
						if(in_array($branch_id[$i],$br_id)){
							$batchreco[] = $va;
						}
					}
				}
			}

		$newbatcre = array();
		for($i=0; $i<sizeof($batchreco); $i++){
			$courseId = $batchreco[$i]->batches_id;
			$flag = 1;
			for($j=0; $j<sizeof($newbatcre); $j++){
				if($courseId == $newbatcre[$j]->batches_id){
					$flag =0;
					break;
				}
			}

			if($flag == 1){
				$newbatcre[] = $batchreco[$i];
			}
		}
		    $display['list_all_batches'] = $newbatcre;

			$ongocount = array();
			$complicount = array();
			for($c=0; $c<sizeof($display['list_all_batches']); $c++)
			{
					$ongoreco = $this->admi->get_all_data('admission_courses','batch_id',$display['list_all_batches'][$c]->batches_id);
					for($cone=0; $cone<sizeof($ongoreco); $cone++)
					{
						$ongocount[] = $ongoreco[$cone]->admission_courses_status=="Ongoing";
						$complicount[] = $ongoreco[$cone]->admission_courses_status=="Completed";
					}
			}

			for($b=0; $b<sizeof($display['list_all_batches']); $b++)
			{
				$display['list_all_batches'][$b]->ongoing = @$ongocount[$b];
				$display['list_all_batches'][$b]->completed = @$complicount[$b];
			}

			$display['filter_fname'] = @$filter['filter_fname'];
			$display['filter_lname'] = @$filter['filter_lname'];
			$display['filter_branch'] = @$filter['filter_branch'];
			$display['filter_faculty'] = @$filter['filter_faculty'];
			$display['filter_course'] = @$filter['filter_course'];
			$display['filter_on'] = "dfgf";
		} else {
			$display['list_all_batches'] = $this->admi->batches_view_all('batches');
			$branch_id = explode(',',$_SESSION['branch_ids']);
			$batchreco = array();
			foreach($display['list_all_batches'] as $k=>$va){
				$br_id = explode(',',$va->branch_id);
				if($br_id[0] != ''){
					for($i=0; $i<sizeof($branch_id); $i++){
						if(in_array($branch_id[$i],$br_id)){
							$batchreco[] = $va;
						}
					}
				}
			}

		$newbatcre = array();
		for($i=0; $i<sizeof($batchreco); $i++){
			$courseId = $batchreco[$i]->batches_id;
			$flag = 1;
			for($j=0; $j<sizeof($newbatcre); $j++){
				if($courseId == $newbatcre[$j]->batches_id){
					$flag =0;
					break;
				}
			}

			if($flag == 1){
				$newbatcre[] = $batchreco[$i];
			}
		}

		   $display['list_all_batches'] = $newbatcre;
		
		   $ongocount = array();
		   $complicount = array();
		   for($c=0; $c<sizeof($display['list_all_batches']); $c++){
				$ongoreco = $this->admi->get_all_data('admission_courses','batch_id',$display['list_all_batches'][$c]->batches_id);
				
				for($cone=0; $cone<sizeof($ongoreco); $cone++){
					$ongocount[] = $ongoreco[$cone]->admission_courses_status=="Ongoing";
					$complicount[] = $ongoreco[$cone]->admission_courses_status=="Completed";
				}
		   }
		 
		   	for($b=0; $b<sizeof($display['list_all_batches']); $b++){
				$display['list_all_batches'][$b]->ongoing = @$ongocount[$b];
				$display['list_all_batches'][$b]->completed = @$complicount[$b];
			}
		}
		
		$display['course_all'] = $this->cm->view_all('course');
		$branch_id = explode(',',$_SESSION['branch_ids']);
		
		$record = array();
		foreach($display['course_all'] as $k=>$va){
			$br_id = explode(',',$va->branch_id);
			if($br_id[0] != ''){
				for($i=0; $i<sizeof($branch_id); $i++){
					if(in_array($branch_id[$i],$br_id)){
						$record[] = $va;
					}
				}
			}
		}
		
		$newRecord = array();
		for($i=0; $i<sizeof($record); $i++){
			$courseId = $record[$i]->course_id;
			$flag = 1;
			for($j=0; $j<sizeof($newRecord); $j++){
				if($courseId == $newRecord[$j]->course_id){
					$flag =0;
					break;
				}
			}

			if($flag == 1){
				$newRecord[] = $record[$i];
			}
		}
		// echo "<pre>";
		$data = array();
		$datadd = $this->admi->batches_view_all("admission_courses");
		$bran_batches = explode(',',$_SESSION['branch_ids']);
		// print_r($bran_batches);
		for($i=0; $i<sizeof($datadd); $i++){
			if(in_array($datadd[$i]->branch_id, $bran_batches)){
				$data[] = $datadd[$i];
			}
		}
		
		// print_r($data);
		// exit;

			for($i=0; $i<sizeof($newRecord); $i++) {
				$ongoingreco = 0;
				$pendingreco = 0;
				$completedreco = 0;
				$holdreco = 0;
				$not_assignedreco = 0;
				for($j=0; $j<sizeof($data); $j++){	
					if($newRecord[$i]->course_id == $data[$j]->courses_id && $data[$j]->admission_courses_status == 'Ongoing'){
						$ongoingreco++;
					} 
					if($newRecord[$i]->course_id == $data[$j]->courses_id && $data[$j]->admission_courses_status == 'Pending'){
						$pendingreco++;
					} 
					if($newRecord[$i]->course_id == $data[$j]->courses_id && $data[$j]->admission_courses_status == 'Completed'){
						$completedreco++;
					} 
					if($newRecord[$i]->course_id == $data[$j]->courses_id && $data[$j]->admission_courses_status == 'Hold'){
						$holdreco++;
					} 
					if($newRecord[$i]->course_id == $data[$j]->courses_id && $data[$j]->admission_courses_status == 'not_assigned'){
						$not_assignedreco++;
					}
				}

				$newRecord[$i]->ongoing 	 = $ongoingreco;
				$newRecord[$i]->pending 	 = $pendingreco;
				$newRecord[$i]->completed 	 = $completedreco;
				$newRecord[$i]->hold 		 = $holdreco;
				$newRecord[$i]->not_assigned = $not_assignedreco;
			}
			
			$display['course_all'] = $newRecord;
			// for($c=0; $c<sizeof($display['course_all']); $c++)
			// {
			// 	$display['course_all'][$c]->ongoing = @$ongoingreco[$c];
			// 	$display['course_all'][$c]->pending = @$pendingreco[$c];
			// }
		
		$update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");
		
		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['list_subcourse'] = $this->cm->view_all("rnw_subcourse");
		$display['list_package'] = $this->cm->view_all("rnw_package");
		$display['list_batch'] = $this->cm->view_all("batch_list");
		$display['all_admission'] = $this->cm->view_all("admission_process");
		$display['hod_all'] = $this->cm->view_all_hod_demo("hod");
		$display['Admission_record'] = $this->cm->view_all("admission_process");
		$display['Admission_wise_courses'] = $this->cm->view_all("admission_courses");
		$display['list_user'] = $this->cm->view_all("user");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/erpbatch', $display);
	}


	public function reassign_date_batch()
	{
		$data = $this->input->post();
		$get_batch_wise_student = $this->admi->faculty_wise_course_get("admission_courses","batch_id",$data['batches_id']);
		foreach($get_batch_wise_student as $val)
		{
			$first_date = strtotime($val->assigned_batch_date);
			$second_date = strtotime('-'.$data['reassing_days'].'day', $first_date);
			$final_date = date('Y-m-d', $second_date);
			$record = array("assigned_batch_date" => $final_date , 'batch_overdue_status' => "Continue");
			$result = $this->admi->batch_course_status('admission_courses', $record, 'batch_id', $data['batches_id']);
		}
		$records = array('overdue_status' => 'none' , 'reassied_by' => $_SESSION['user_name']);
		$query = $this->admi->receipt_Status('batches', $records, 'batches_id', $data['batches_id']);
		if ($result) {
			$recp["all_record"] = array('status' => 1, "msg" => "Successfully Updated Batch");
			echo json_encode($recp);
		} else {
			$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp);
		}
	}

	public function get_student_installments()
	{
		$data = $this->input->post();
		$record['total_installment'] = $this->admi->get_adm_batches_all('admission_installment','admission_id' , $data['admission_id']);
		// echo "<pre>";
		// print_r($record['total_installment']);
		// die;
		$record['list_branch'] = $this->cm->view_all("branch");
        $record['list_course'] = $this->cm->view_all("course");
        $record['faculty_all'] = $this->cm->view_all("faculty");
        $this->load->view('erp/student_installment', $record);
	}

	public function get_days_from_months(){
		$data = $this->input->post();
		$get_sub_course = $this->admi->match_opt("rnw_subcourse","subcourse_id",$data['subcourse_id']);
		$duration = $get_sub_course->duration;
		$record = round($duration * 30.5);
		echo json_encode($record);
	}

	public function Batch_add()
	{
		$data = $this->input->post();
		date_default_timezone_set("Asia/Calcutta");
		$created_date = date('Y-m-d');
		$created_time = date('h:i A');

		if(empty($data['facultyids'])) {
			$faculty_id = @$data['clg_faculty_id'];
		} else {
			$faculty_id = @$data['facultyids'];
		}
		
		if (empty($data['college_courses_id'])) {
			$college_courses_id = $data['college_courses_id'] = "";
		} else {
			$college_courses_id = @$data['college_courses_id'];
		}

		$record = array('batch_name' => $data['batch_name'], 'batch_code' => $data['batch_code'],'batch_duration' =>$data['batch_duration'], 'branch_id' => $data['branch_id'], 'faculty_id' => $faculty_id, 'course_id' => $data['course_id'], 'subcourse_id' => $data['subcourse_id'], 'overdue_status' => "Continue" ,'college_courses_id' => $college_courses_id ,'created_bye' => $data['created_bye'],'created_date'=>$created_date,'created_time'=>$created_time);
	
		$result = $this->cm->save_data('batches', $record);

		if ($result) {
			$recp["all_record"] = array('status' => 1, "msg" => "Successfully Inserted Batch");
			echo json_encode($recp); // echo "1";
		} else {
			$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp); // echo "2";
		}
	}

	public function ErpBatch_History() {
        $batch_id = $this->input->post('batches_id');
        $data['history'] = $this->admi->get_history_batch('batches_history', 'batches_id', $batch_id);
        $data['list_branch'] = $this->cm->view_all("branch");
        $data['list_course'] = $this->cm->view_all("course");
        $data['faculty_all'] = $this->cm->view_all("faculty");
        $this->load->view('erp/ErpBatch_History', $data);
    }

	public function get_batches_data(){
		$id = $this->input->post('batches_id');
		$data = $this->admi->get_batches_data('batches', 'batches_id', $id);
		echo json_encode(array('record' => $data));
	}

	public function Batch_update(){
		$data = $this->input->post();
		date_default_timezone_set("Asia/Calcutta");
		$batch_upd_date = date('Y-m-d h:i A');
		
		if (empty($data['faculty_id'])) {
			$faculty_id = @$data['clg_faculty_id'];
		} else {
			$faculty_id = @$data['faculty_id'];
		}

		if (empty($data['college_courses_id'])) {
			$college_courses_id = $data['college_courses_id'] = "";
		} else {
			$college_courses_id = @$data['college_courses_id'];
		}

		$created_bye = $_SESSION['user_name'];
		$record_batch = array(
			'batch_name' => $data['batch_name'], 'batch_code' => $data['batch_code'], 'branch_id' => $data['branch_id'],
			'faculty_id' => $faculty_id, 'course_id' => $data['course_id'], 'subcourse_id' => $data['subcourse_id'], 'college_courses_id' => $college_courses_id , 'created_bye' => $created_bye);

		if (!empty($data['batches_id'])) {
			$old_record['re'] =  $this->admi->get_old_batch_record('batches', 'batches_id', $data['batches_id']);

			if (@$old_record['re']->batch_name == @$data['batch_name']) {
				$up_batch_name = $data['batch_name'] . "&#nochange";
			} else {
				$up_batch_name = $data['batch_name'] . "&#change";
			}

			if (@$old_record['re']->batch_code == @$data['batch_code']) {
				$up_batch_code = $data['batch_code'] . "&#nochange";
			} else {
				$up_batch_code = $data['batch_code'] . "&#change";
			}

			if (@$old_record['re']->branch_id == @$data['branch_id']) {
				$up_branch_id = $data['branch_id'] . "&#nochange";
			} else {
				$up_branch_id = $data['branch_id'] . "&#change";
			}

			if (@$old_record['re']->faculty_id == $faculty_id) {
				$up_faculty_id = $faculty_id . "&#nochange";
			} else {
				$up_faculty_id = $faculty_id . "&#change";
			}

			if (@$old_record['re']->course_id == @$data['course_id']) {
				$up_course_id = $data['course_id'] . "&#nochange";
			} else {
				$up_course_id = $data['course_id'] . "&#change";
			}

			if (@$old_record['re']->college_courses_id == @$college_courses_id) {
				$up_college_courses_id = $college_courses_id . "&#nochange";
			} else {
				$up_college_courses_id = $college_courses_id . "&#change";
			}
			
			if (@$old_record['re']->created_bye == @$created_bye) {
				$up_created_bye = $created_bye . "&#nochange";
			} else {
				$up_created_bye = $created_bye . "&#change";
			}

			$re = $this->admi->update_batch('batches', $record_batch, 'batches_id', $data['batches_id']);

			if ($re) {
				$history_record  = array(
					'batches_id' => $data['batches_id'], 'batch_name' => $up_batch_name, 'batch_code' => $up_batch_code,
					'branch_id' => $up_branch_id, 'faculty_id' => $up_faculty_id, 'course_id' => $up_course_id, 'college_courses_id' => $up_college_courses_id ,'created_bye' => $up_created_bye,
					'batch_upd_date' => @$batch_upd_date
				);
				$this->admi->quick_batch_data('batches_history', $history_record);
			}
			$st = 1;
		} else {
			$check_ep =  $this->admi->check_record_alerady_btches('batches', $record_batch);
			if ($check_ep == 0) {
				$re =  $this->admi->quick_batch_data('batches', $record_batch);
				if ($re) {
					$history_record  = array(
						'batches_id' => @$re, 'batch_name' => $data['batch_name'] . "&#nochange",
						'batch_code' => $data['batch_code'] . "&#nochange", 'branch_id' => $data['branch_id'] . "&#nochange",
						'faculty_id' => $faculty_id . "&#nochange", 'course_id' => $data['course_id'] . "&#nochange", 
						'college_courses_id' => $college_courses_id . "&#nochange" , 'created_bye' => $data['created_bye'] . "&#nochange", 'batch_upd_date' => @$batch_upd_date
					);
					$this->admi->quick_batch_data('batches_history', $history_record);
				}
				$st = 2;
				echo $st;
			} else {
				$st = 0;
				echo $st;
			}
		}

		if ($st == 1) {
			$recp["all_record"] = array('status' => 1, "msg" => "Successfully Updated Batch");
			echo json_encode($recp); // echo "1";
		} else {
			$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp); // echo "2";
		}
	}

	public function batch_remove()
	{
		$id = $this->input->post('batches_id');
		$result = $this->admi->delete_batch('batches', 'batches_id', $id);

		if ($result) {
			$recp["all_record"] = array('status' => 1, "msg" => "Successfully Deleted Batch");
			echo json_encode($recp); // echo "1";
		} else {
			$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp); // echo "2";
		}
	}

	public function get_not_assigned_batch()
	{
		$batches_id = $this->input->post('batches_id');
		$subcourse_id = $this->input->post('subcourse_id');
		$data['not_assigned_batch_list'] =  $this->admi->get_adm_batches_all('admission_courses', 'courses_id', $subcourse_id);
		$data['match_data'] =  $this->cm->select_data('batches', 'batches_id', $batches_id);
		$data['list_course'] = $this->cm->view_all("rnw_subcourse");
		$this->load->view('erp/erp_notassigned_batch', $data);
	}

	public function get_pending_batch_student()
	{
		$batches_id = $this->input->post('batches_id');
		$subcourse_id = $this->input->post('subcourse_id');
		$data['pending_batch_student'] =  $this->admi->get_student_pending_batch('admission_courses', 'courses_id', $subcourse_id);
		$data['match_data'] =  $this->cm->select_data('batches', 'batches_id', $batches_id);
		$data['list_course'] = $this->cm->view_all("rnw_subcourse");
		$this->load->view('erp/get_pending_batch_student', $data);
	}

	public function tack_single_student_attendance()
	{
		$admission_courses_id = $this->input->post('admission_courses_id');
		$admission_id = $this->input->post('admission_id');
		
		$data['admission_courses_list'] =  $this->cm->select_data('admission_courses', 'admission_courses_id', $admission_courses_id);
		$data['admission_list'] =  $this->cm->select_data('admission_process', 'admission_id', $admission_id);

		$this->load->view('erp/tack_single_student_attendance', $data);
	}

	public function single_batch_completed()
	{
		$admission_courses_id = $this->input->post('admission_courses_id');
		$admission_id = $this->input->post('admission_id');

		$data['admission_courses_list'] =  $this->cm->select_data('admission_courses', 'admission_courses_id', $admission_courses_id);
		$data['admission_list'] =  $this->cm->select_data('admission_process', 'admission_id', $admission_id);
		$this->load->view('erp/single_batch_completed', $data);
	}

	public function view_attendance(){
		$admission_id = $this->input->post('admission_id');
		$reco = $this->cm->select_data('admission_process', 'admission_id', $admission_id);
		//$data['attendance_list'] =  $this->admi->get_live_data_attendance_2('DeviceLogs_Processed', 'UserId', $reco->gr_id);
		$data['attendance_list'] =  $this->cm->get_live_data_attendance_2('DeviceLogs_Processed', 'UserId', $reco->gr_id);
		// print_r($data['attendance_list']);
		// die;
		// $flag = 0;
		// $time_in = array();
		// for($i=0;$i<=sizeof($data['attendance_list']);$i++){
		//  	$time_out = explode(" " , $data['attendance_list'][$i]->LogDate);
		// 	print_r($time_out);
		// // 	if(in_array(substr($data['attendance_list'][$i]->LogDate,0,-9),$time_out)) {
		// // 		$time_in[] = $data['attendance_list'][$i];
		// // 		//print_r($time_in);
		// // // 	// 	$trim_ar = array_slice($time_in,0,2);
		// // // 	// 	print_r($trim_ar);
		// // // 	// 	$flag = 1;
		// // 	}
		// }
		// die;

		// // foreach($time_in as $row){
		// // 	print_r($row);
		// // }
		// $array = json_decode(json_encode($time_in), true);
		// // print_r($array);
		// // die;
		// for($j=0;$j<=sizeof($array);$j++){
		// 	print_r($time_in[$j]);
		// }


		// $trim_ar = array_slice($time_in,0,2);
		// for($j=0;$j<=sizeof($trim_ar);$j++){
		// 	print_r($trim_ar[$j]);
		// 	// $data1['time_from'] = $trim_ar[$j+1];
		// 	// $data1['time_to'] = $trim_ar[$j];

		// 	// $reco[] = $data1;
		// }
		//print_r($reco);
		$this->load->view('erp/view_attendance', $data);
	}

	public function show_attendance(){
		$admission_courses_id = $this->input->post('admission_courses_id');
		$data['attendance_list'] =  $this->admi->get_batch_attendance_record('batch_attendance', 'admission_courses_id', $admission_courses_id);
		$this->load->view('erp/show_attendance', $data);
	}

	public function single_student_wise_attendance()
	{
		$data = $this->input->post();
		date_default_timezone_set("Asia/Calcutta");
		$created_date = date('Y-m-d h:i A');
		$created_by = $_SESSION['user_name'];
		$remarksdate = date('Y-m-d');
		$remarkstime = date('h:i A');
		$label = "Attendance";

		$remarksdata = array(
			'admission_id' => $data['admission_id'], 'labels' => $label, 'admission_remrak' => $data['remarks'],
			'remarks_date' => $remarksdate, 'remarks_time' => $remarkstime, 'addby' => $created_by
		);
		
		$this->admi->save_data('admission_remarks', $remarksdata);

		$record = array(
			'admission_id' => $data['admission_id'], 'admission_courses_id' => $data['admission_courses_id'],
			'attendance_date' => $data['attendance_date'], 'attendance_time_from' => date('h:i A', strtotime($data['attendance_time_from'])),
			'attendance_time_to' => date('h:i A', strtotime($data['attendance_time_to'])), 'attendance_type' => $data['attendance_type'], 'created_by' => $created_by,
			'created_date' => $created_date
		);

		$result = $this->admi->save_data('batch_attendance', $record);

		if ($result) {
			$recp["all_record"] = array('status' => 1, "msg" => "Today Your Attendance Done");
			echo json_encode($recp); // echo "1";
		} else {
			$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp); // echo "2";
		}
	}

	public function single_batch_course_completd_status()
	{
		$data = $this->input->post();

		date_default_timezone_set("Asia/Calcutta");

		$created_date = date('Y-m-d h:i A');
		$course_completed_date = date('Y-m-d');
		$created_by = $_SESSION['user_name'];
		$remarksdate = date('Y-m-d');
		$remarkstime = date('h:i A');
		$label = "Course ".$data['admission_courses_status'];

		$remarksdata = array('admission_id' => $data['admission_id'], 'labels' => $label, 'admission_remrak' => $data['remarks'], 'remarks_date' => $remarksdate, 'remarks_time' => $remarkstime, 'addby' => $created_by);

		$this->admi->save_data('admission_remarks', $remarksdata);

		$admission_courses_id = $data['admission_courses_id'];

		$record = array('admission_courses_status' => $data['admission_courses_status'], 'course_completed_date' => $course_completed_date, 'created_by' => $created_by);

		$result = $this->admi->batch_course_status('admission_courses', $record, 'admission_courses_id', $admission_courses_id);

		if ($result) {
			$recp["all_record"] = array('status' => 1, "msg" => "Course Is Completd!");

			echo json_encode($recp); // echo "1";ss
		} else {
			$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");

			echo json_encode($recp); // echo "2";
		}
	}

	public function multiple_student_wise_attendance()
	{
		$data = $this->input->post();
		date_default_timezone_set("Asia/Calcutta");
		$created_date = date('Y-m-d h:i A');
		$created_by = $_SESSION['user_name'];
		$remarksdate = date('Y-m-d');
		$remarkstime = date('h:i A');
		$label = "Attendance";

		for ($i = 0; $i < sizeof($data['admission_courses_id']); $i++) {

			$batches = $this->admi->view_all('admission_courses');

			foreach ($batches as $dn) {
				$flag = 0;
				$dnbi  = explode(',', $data['admission_courses_id'][$i]);
				if (in_array($dn['admission_courses_id'], $dnbi)) {
					$flag = 1;
				}

				if ($flag == 1) {
					$remarksdata = array('admission_id' => $dn['admission_id'], 'labels' => $label, 'admission_remrak' => $data['remarks'], 'remarks_date' => $remarksdate, 'remarks_time' => $remarkstime, 'addby' => $created_by);

					$this->admi->save_data('admission_remarks', $remarksdata);

					$record = array('admission_id' => $dn['admission_id'], 'admission_courses_id' => $dn['admission_courses_id'], 'attendance_date' => $data['attendance_date'], 'attendance_time_from' => date('h:i A', strtotime($data['attendance_time_multiple_from'])), 'attendance_time_to' => date('h:i A', strtotime($data['attendance_time_multiple_to'])), 'attendance_type' => $data['attendance_type'], 'created_by' => $created_by, 'created_date' => $created_date);
	
					$result = $this->admi->save_data('batch_attendance', $record);

					if ($result) {
						$status_check = 1;
					} else {
						$status_check = 0;
					}
				}
			}
		}

		if ($status_check == 1) {
			$record = array('status' => 1, "msg" => "Today Your Attendance Done");
			$recp['all_record'] = $record;
			echo json_encode($recp);
		} else {
			$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp);
		}
	}

	public function Multiple_TopicEdit()
	{
		$data = $this->input->post();
		date_default_timezone_set("Asia/Calcutta");
		$created_date = date('Y-m-d h:i A');
		$created_by = $_SESSION['user_name'];
		
		for ($i = 0; $i < sizeof($data['shining_sheet_ids']); $i++) {
			$shining_sheet = $this->admi->view_all('shining_sheet');
			foreach ($shining_sheet as $dn) {
				$flag = 0;
				$dnbi  = explode(',', $data['shining_sheet_ids'][$i]);
				if (in_array($dn['shining_sheet_id'], $dnbi)) {
					$flag = 1;
				}

				if ($flag == 1) {
					$shining_sheet_id = $dn['shining_sheet_id'];

					$record = array('course_id' => $data['course_id'], 'subcourse_id' => $data['subcourse_id'], 'created_date' => $created_date , 'created_by' => $created_by);

				  $result =	$this->admi->Update_record('shining_sheet', $record,'shining_sheet_id',$shining_sheet_id);

					if ($result) {
						$status_check = 1;
					} else {
						$status_check = 0;
					}
				}
			}
		}

		if ($status_check == 1) {
			$record = array('status' => 1, "msg" => "Updated All Topic");
			$recp['all_record'] = $record;
			echo json_encode($recp);
		} else {
			$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp);
		}
	}

	public function Assigned_MultiTopic() {
		$data = $this->input->post();
		
		for($i = 0; $i < sizeof($data['admission_courses_id']); $i++) {

			$batches = $this->admi->view_all('admission_courses');
			
			foreach ($batches as $dn) {
				$flag = 0;
				$dnbi  = explode(',', $data['admission_courses_id'][$i]);
				if (in_array($dn['admission_courses_id'], $dnbi)) {
					$flag = 1;
				}

				if ($flag == 1) {
					$s_id = strtr(base64_encode($data['shining_sheet_id']), '+/=', '._-');
					$a_id = strtr(base64_encode($dn['admission_id']), '+/=', '._-');
					$g_id = strtr(base64_encode($dn['gr_id']), '+/=', '._-');
					$cp_id = strtr(base64_encode($dn['courses_id']), '+/=', '._-');
					$emailconfigration = $this->cm->view_all('email_settings');

					foreach ($emailconfigration as $key) {
						if ($key->email_type == "1") {
							$Protocol = $key->encryption;
							$HostName = $key->host;
							$SmtpPortNo = $key->port;
							$SmtpUser = $key->email;
							$SmtpPass = $key->password;
							$config = array('protocol' => $Protocol, 'smtp_host' => $HostName, 'smtp_port' => $SmtpPortNo, 'smtp_user' => $SmtpUser, 'smtp_pass' => $SmtpPass, 'mailtype' => 'html', 'charset' => 'utf-8');
							$this->load->library('email');
							$this->email->initialize($config);
						}
						if ($key->email_type == "2") {
							$fromemail = $key->email;
							$from = $fromemail;
						}
					}
					$from = $from;
					$to = $dn['email'];
					$subject = "Shining Sheet Topic";
					$message = "https://demo.rnwmultimedia.com/assign_student/student_assign.php?shining_sheet_id=$s_id&admission_id=$a_id&gr_id=$g_id&course_orpackage_id=$cp_id";
					$this->email->set_newline("\r\n");
					$this->email->from($from);
					$this->email->to($to);
					$this->email->subject($subject);
					$this->email->message($message);
					$result = $this->email->send();	
					if ($result) {
						$status_check = 1;
					} else {
						$status_check = 0;
					}
				}
			}
		}

		if ($status_check == 1) {
			$record = array('status' => 1, "msg" => "This Topic Assigned.");
			$recp['all_record'] = $record;
			echo json_encode($recp);
		} else {
			$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp);
		}
    }

	public function multiple_batch_status_course_completed()
	{
		$data = $this->input->post();

		date_default_timezone_set("Asia/Calcutta");
		$created_date = date('Y-m-d h:i A');
		$course_completed_date = date('Y-m-d');
		$created_by = $_SESSION['user_name'];
		$remarksdate = date('Y-m-d');
		$remarkstime = date('h:i A');
		$label = "Course ".$data['admission_courses_status'];

		for ($i = 0; $i < sizeof($data['admission_courses_id']); $i++) {

			$batches = $this->admi->view_all('admission_courses');

			foreach ($batches as $dn) {
				$flag = 0;
				$dnbi  = explode(',', $data['admission_courses_id'][$i]);
				if (in_array($dn['admission_courses_id'], $dnbi)) {
					$flag = 1;
				}

				if ($flag == 1) {
					$remarksdata = array('admission_id' => $dn['admission_id'], 'labels' => $label, 'admission_remrak' => $data['remarks'], 'remarks_date' => $remarksdate, 'remarks_time' => $remarkstime, 'addby' => $created_by);
					$this->admi->save_data('admission_remarks', $remarksdata);

					$admission_courses_id = $dn['admission_courses_id'];

					$record = array('admission_courses_status' => $data['admission_courses_status'], 'course_completed_date' => $course_completed_date, 'created_by' => $created_by);

					$result = $this->admi->batch_course_status('admission_courses', $record, 'admission_courses_id', $admission_courses_id);

					if ($result) {
						$status_check = 1;
					} else {
						$status_check = 0;
					}
				}
			}
		}

		if ($status_check == 1) {
			$record = array('status' => 1, "msg" => "Today Your Attendance Done");
			$recp['all_record'] = $record;
			echo json_encode($recp);
		} else {
			$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp);
		}
	}

    public function Multiple_rowremove()
	{
		$data = $this->input->post();
		$created_date = date('Y-m-d h:i A');
		$created_by = $_SESSION['user_name'];
		$deleted_status = "1";

		for($i = 0; $i < sizeof($data['shining_sheet_ids']); $i++) {

			$shiningsheet = $this->admi->view_all('shining_sheet');

			foreach ($shiningsheet as $dn) {
				$flag = 0;
				$dnbi  = explode(',', $data['shining_sheet_ids'][$i]);
				if (in_array($dn['shining_sheet_id'], $dnbi)) {
					$flag = 1;
				}

				if ($flag == 1) {
					$shining_sheet_id = $dn['shining_sheet_id'];

					$record = array('deleted_status' => $deleted_status, 'created_date' => $created_date, 'created_by' => $created_by);

					$result = $this->admi->batch_course_status('shining_sheet', $record, 'shining_sheet_id', $shining_sheet_id);

					if ($result) {
						$status_check = 1;
					} else {
						$status_check = 0;
					}
				}
			}
		}

		if ($status_check == 1) {
			$record = array('status' => 1, "msg" => "This Record Delted");
			$recp['all_record'] = $record;
			echo json_encode($recp);
		} else {
			$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp);
		}
	}

	public function not_assigned_batch_assign()
	{
		$data = $this->input->post();
		$admission_courses_status = "Ongoing";
		$record = array('batch_id' => $data['batch_id'], 'admission_courses_status' => $admission_courses_status);

		$admission_status = "Enrolled";

		$re = array('admission_status' => $admission_status);

		$this->admi->admission_status_upd('admission_process', $re, 'admission_id', $data['admission_id']);

		$result = $this->admi->assign_batch('admission_courses', $record, 'admission_courses_id', $data['admission_courses_id']);
		if ($result) {
			$recp["all_record"] = array('status' => 1, "msg" => "Successfully Assigned Batch");

			echo json_encode($recp); // echo "1";
		} else {
			$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");

			echo json_encode($recp); // echo "2";
		}
	}

	public function multiple_batch()
	{
		$data = $this->input->post();

		$admission_status = "Enrolled";
		$admission_courses_status = "Ongoing";

		for ($i = 0; $i < sizeof($data['admission_courses_id']); $i++) {

			$batches = $this->admi->view_all('admission_courses');

			foreach ($batches as $dn) {
				$flag = 0;
				$dnbi  = explode(',', $data['admission_courses_id'][$i]);
				if (in_array($dn['admission_courses_id'], $dnbi)) {
					$flag = 1;
				}

				if ($flag == 1) {
					$admission_id = $dn['admission_id'];
					$admission_courses_id = $dn['admission_courses_id'];
					
					$records = array('admission_status' => $admission_status);
				
	    			$this->admi->update_admission_status_record('admission_process', $records, 'admission_id', $admission_id);

					$record = array('admission_courses_status' => $admission_courses_status, 'batch_id' => $data['batches_id']);
					
					$result = $this->admi->batch_course_status('admission_courses', $record, 'admission_courses_id', $admission_courses_id);

					if ($result) {
						$status_check = 1;
					} else {
						$status_check = 0;
					}
				}
			}
		}

		if ($status_check == 1) {
			$record = array('status' => 1, "msg" => "Successfully Assigned All Batch");
			$recp['all_record'] = $record;
			echo json_encode($recp);
		} else {
			$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp);
		}
	}

	public function pending_batch_student()
	{
		$data = $this->input->post();
		$admission_courses_status = "Ongoing";
		$record = array('batch_id' => $data['batch_id'], 'admission_courses_status' => $admission_courses_status , 'assigned_batch_date' => $date);

		$date = date('Y-m-d');
		$admission_status = "Enrolled";

		$re = array('admission_status' => $admission_status);

		$this->admi->admission_status_upd('admission_process', $re, 'admission_id', $data['admission_id']);

		$result = $this->admi->assign_batch('admission_courses', $record, 'admission_courses_id', $data['admission_courses_id']);
		if ($result) {
			$recp["all_record"] = array('status' => 1, "msg" => "Successfully Assigned Batch");

			echo json_encode($recp); // echo "1";
		} else {
			$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");

			echo json_encode($recp); // echo "2";
		}
	}

	public function multiple_pending_batch_assigned()
	{
		$data = $this->input->post();
		$admission_status = "Enrolled";
		$admission_courses_status = "Ongoing";
		$date = date('Y-m-d');

		for ($i = 0; $i < sizeof($data['admission_courses_id']); $i++) {

			$batches = $this->admi->view_all('admission_courses');

			foreach ($batches as $dn) {
				$flag = 0;
				$dnbi  = explode(',', $data['admission_courses_id'][$i]);
				if (in_array($dn['admission_courses_id'], $dnbi)) {
					$flag = 1;
				}

				if ($flag == 1) {
					$admission_id = $dn['admission_id'];
					$admission_courses_id = $dn['admission_courses_id'];
					
					$records = array('admission_status' => $admission_status);
				
	    			$this->admi->update_admission_status_record('admission_process', $records, 'admission_id', $admission_id);

					$record = array('admission_courses_status' => $admission_courses_status, 'batch_id' => $data['batches_id'] , 'assigned_batch_date' => $date);
					
					$result = $this->admi->batch_course_status('admission_courses', $record, 'admission_courses_id', $admission_courses_id);

					if ($result) {
						$status_check = 1;
					} else {
						$status_check = 0;
					}
				}
			}
		}

		if ($status_check == 1) {
			$record = array('status' => 1, "msg" => "Successfully Assigned All Batch");
			$recp['all_record'] = $record;
			echo json_encode($recp);
		} else {
			$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp);
		}
	}

	public function student_view_batch()
	{
		$id = $this->input->get('ongo');

		if ($this->input->get('action') == "stub") {
			$display['get_batch'] = $this->admi->get_adm_batches_all("admission_courses", "batch_id", $id);
			$display['batches'] = $this->cm->select_data("batches", "batches_id", $id);
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
		$display['list_course'] = $this->cm->view_all("rnw_subcourse");
		$display['list_package'] = $this->cm->view_all("rnw_package");
		$display['Admission_record'] = $this->cm->view_all("admission_process");
		$display['list_college_courses'] = $this->cm->view_all("college_courses");
		$display['list_admission_courses'] = $this->cm->view_all("admission_courses");
		$display['list_batches'] = $this->cm->view_all("batches");
		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/student_view_batch', $display);
	}

	public function stuCompleted_ViewBatch()
	{
		$id = $this->input->get('compli');

		if ($this->input->get('action') == "stub") {
			$display['get_batch'] = $this->admi->get_adm_batches_all("admission_courses", "batch_id", $id);
			$display['batches'] = $this->cm->select_data("batches", "batches_id", $id);
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
		$display['Admission_record'] = $this->cm->view_all("admission_process");
		$display['list_all_batches'] = $this->cm->view_all("batches");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/stuCompleted_ViewBatch', $display);
	}

	public function AllCompleted_BatchList()
	{
		if (!empty($this->input->post('filter_completed_batch_list'))) {
			$filter = $this->input->post();
			$display["get_batch"] = $this->admi->get_completedstudent_batch("admission_courses", $filter);
			$branch_id = explode(',',$_SESSION['branch_ids']);
			$batchreco = array();
			foreach($display['get_batch'] as $k=>$va){
				$br_id = explode(',',$va->branch_id);
				if($br_id[0] != ''){
					for($i=0; $i<sizeof($branch_id); $i++){
						if(in_array($branch_id[$i],$br_id)){
							$batchreco[] = $va;
						}
					}
				}
			}

		$newbatcre = array();
		for($i=0; $i<sizeof($batchreco); $i++){
			$admicoursesId = $batchreco[$i]->admission_courses_id;
			$flag = 1;
			for($j=0; $j<sizeof($newbatcre); $j++){
				if($admicoursesId == $newbatcre[$j]->admission_courses_id){
					$flag =0;
					break;
				}
			}

			if($flag == 1){
				$newbatcre[] = $batchreco[$i];
			}
		}
		    $display['get_batch'] = $newbatcre;
			$display['filter_fname'] = @$filter['filter_fname'];
			$display['filter_lname'] = @$filter['filter_lname'];
			$display['filter_email'] = @$filter['filter_email'];
			$display['filter_branch'] = @$filter['filter_branch'];
			$display['filter_course'] = @$filter['filter_course'];
			$display['filter_faculty'] = @$filter['filter_faculty'];
			$display['filter_batch'] = @$filter['filter_batch'];
			$display['filter_from_date'] = @$filter['filter_from_date'];
			$display['filter_to_date'] = @$filter['filter_to_date'];
			$display['filter_on'] = "dfgf";
		} else {
			$display['get_batch'] = $this->admi->get_completedstudent_batch("admission_courses");
			$branch_id = explode(',',$_SESSION['branch_ids']);
			$batchreco = array();
			foreach($display['get_batch'] as $k=>$va){
				$br_id = explode(',',$va->branch_id);
				if($br_id[0] != ''){
					for($i=0; $i<sizeof($branch_id); $i++){
						if(in_array($branch_id[$i],$br_id)){
							$batchreco[] = $va;
						}
					}
				}
			}

		$newbatcre = array();
		for($i=0; $i<sizeof($batchreco); $i++){
			$admicoursesId = $batchreco[$i]->admission_courses_id;
			$flag = 1;
			for($j=0; $j<sizeof($newbatcre); $j++){
				if($admicoursesId == $newbatcre[$j]->admission_courses_id){
					$flag =0;
					break;
				}
			}

			if($flag == 1){
				$newbatcre[] = $batchreco[$i];
			}
		}
		    $display['get_batch'] = $newbatcre;
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
		$display['Admission_record'] = $this->cm->view_all("admission_process");
		$display['list_all_batches'] = $this->cm->view_all("batches");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/AllCompleted_BatchList', $display);
	}

	public function erpunfillup_field()
	{
		if (!empty($this->input->post('filter_admissionunfilup'))) {
			$filter = $this->input->post();
			$display['Admission_record'] = $this->admi->admission_unfillup_fields_all("admission_process", $filter);
			$branch_id = explode(',',$_SESSION['branch_ids']);
			$admissionreco = array();
			foreach($display['Admission_record'] as $k=>$va){
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
		    $display['Admission_record'] = $newadmissioncre;
			$display['filter_from_date'] = @$filter['filter_from_date'];
			$display['filter_to_date'] = @$filter['filter_to_date'];
			$display['filter_fname'] = @$filter['filter_fname'];
			$display['filter_lname'] = @$filter['filter_lname'];
			$display['filter_email'] = @$filter['filter_email'];
			$display['filter_mobile'] = @$filter['filter_mobile'];
			$display['filter_gr_id'] = @$filter['filter_gr_id'];
			$display['filter_enrollnno'] = @$filter['filter_enrollnno'];
			$display['filter_source'] = @$filter['filter_source'];
			$display['filter_branch'] = @$filter['filter_branch'];
			$display['filter_course'] = @$filter['filter_course'];
			$display['filter_package'] = @$filter['filter_package'];
			$display['filter_clg_course'] = @$filter['filter_clg_course'];
			$display['filter_on'] = "dfgf";
		} else {
			$display['Admission_record'] = $this->admi->admission_unfillup_fields_all("admission_process");
			$branch_id = explode(',',$_SESSION['branch_ids']);
			$admissionreco = array();
			foreach($display['Admission_record'] as $k=>$va){
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
			$display['Admission_record'] = $newadmissioncre;
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
		$display['list_source'] = $this->cm->view_all("source");
		$display['list_country'] = $this->cm->view_all("country");
		$display['list_state'] = $this->cm->view_all("state");
		$display['list_city'] = $this->cm->view_all("cities");
		$display['list_area'] = $this->cm->view_all("area");
		$display['list_batch'] = $this->cm->view_all("batch_list");
		$display['hod_all'] = $this->cm->view_all_hod_demo("hod");
		$display['faculty_all'] = $this->cm->view_all("faculty");
		$display['doc_list'] = $this->cm->view_all("admission_documents");
		$display['college_courses_all'] = $this->cm->view_all("college_courses");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/erpunfillup_field', $display);
	}

	// public function fetch()
	// {
	// 	$filter = $this->input->post('query');
	// 	$display['Admission_record'] = $this->admi->admission_unfillup_fields_all("admission_process", $filter);
	// }

	public function get_adm_record()
	{
		$admission_id = $this->input->post('admission_id');
		$data['adm_get_record'] = $this->admi->get_admission_basic_details('admission_process', 'admission_id', $admission_id);
		echo json_encode(array('record' => $data));
	}

	public  function upd_admission_basic()
	{
		$data = $this->input->post();
		date_default_timezone_set("Asia/Calcutta");
		$created_date = date('Y-m-d h:i A');
		if (empty($data['admission_id'])) {
			$admission_id = $data['admission_id'] = "";
		} else {
			$admission_id = $data['admission_id'];
		}
		if (empty($data['first_name'])) {
			$first_name = $data['first_name'] = "";
		} else {
			$first_name = $data['first_name'];
		}
		if (empty($data['surname'])) {
			$surname = $data['surname'] = "";
		} else {
			$surname = $data['surname'];
		}
		if (empty($data['email'])) {
			$email = $data['email'] = "";
		} else {
			$email = $data['email'];
		}
		if (empty($data['mobile_no'])) {
			$mobile_no = $data['mobile_no'] = "";
		} else {
			$mobile_no = $data['mobile_no'];
		}
		if (empty($data['branch_id'])) {
			$branch_id = $data['branch_id'] = "";
		} else {
			$branch_id = $data['branch_id'];
		}
		if (empty($data['father_mobile_no'])) {
			$father_mobile_no = $data['father_mobile_no'] = "";
		} else {
			$father_mobile_no = $data['father_mobile_no'];
		}
		if (@$data['submit'] == 'Upd Admission') {
			$admission_id = '';
		} else {
			$admission_id = $data['admission_id'];
		}

		$record = array('admission_id' => $admission_id, 'first_name' => $first_name, 'surname' => $surname, 'email' => $email, 'mobile_no' => $mobile_no, 'branch_id' => $branch_id, 'father_mobile_no' => $father_mobile_no);

		if (!empty($admission_id)) {
			$old_record['re'] =  $this->admi->get_old_admission_record('admission_process', 'admission_id', $admission_id);

			if (@$old_record['re']->first_name == @$data['first_name']) {
				$up_first_name = $data['first_name'] . "&#nochange";
			} else {
				$up_first_name = $data['first_name'] . "&#change";
			}
			if (@$old_record['re']->surname == @$data['surname']) {
				$up_surname = $data['surname'] . "&#nochange";
			} else {
				$up_surname = $data['surname'] . "&#change";
			}
			if (@$old_record['re']->email == @$data['email']) {
				$up_email = $data['email'] . "&#nochange";
			} else {
				$up_email = $data['email'] . "&#change";
			}
			if (@$old_record['re']->mobile_no == @$data['mobile_no']) {
				$up_mobile_no = $data['mobile_no'] . "&#nochange";
			} else {
				$up_mobile_no = $data['mobile_no'] . "&#change";
			}
			if (@$old_record['re']->branch_id == @$data['branch_id']) {
				$up_branch_id = $data['branch_id'] . "&#nochange";
			} else {
				$up_branch_id = $data['branch_id'] . "&#change";
			}
			if (@$old_record['re']->father_mobile_no == @$data['father_mobile_no']) {
				$up_father_mobile_no = $data['father_mobile_no'] . "&#nochange";
			} else {
				$up_father_mobile_no = $data['father_mobile_no'] . "&#change";
			}

			$re = $this->admi->update_admission_record('admission_process', $record, 'admission_id', $admission_id);

			if ($re) {
				$history_record  = array('admission_id' => $admission_id, 'first_name' => $up_first_name, 'surname' => $up_surname, 'email' => $up_email, 'mobile_no' => $up_mobile_no, 'branch_id' => $up_branch_id, 'father_mobile_no' => $up_father_mobile_no ,'admission_upd_date' => $created_date);

				$this->admi->quick_adm_data('history_adm_basicdetails', $history_record);
			}

			$st = 1;

			if ($st == 1) {
				$record = array('status' => 1, "msg" => "Successfully Updated This Details!");
				$recp['all_record'] = $record;
				echo json_encode($recp);
			} else {
				$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
				echo json_encode($recp);
			}
		} else {
			$check_ep =  $this->admi->check_already_basicinfo('admission_process', $record);

			if ($check_ep == 0) {
				$re =  $this->admi->quick_adm_data('admission_process', $record);

				if ($re) {
					$history_record  = array('admission_id' => @$re, 'first_name' => $first_name . "&#nochange", 'surname' => $surname . "&#nochange", 'email' => $email . "&#nochange", 'mobile_no' => $mobile_no . "&#nochange", 'branch_id' => $branch_id . "&#nochange", 'admission_upd_date' => $created_date);

					$this->admi->quick_adm_data('history_adm_basicdetails', $history_record);
				}

				$st = 2;

				if ($st == 2) {
					$record = array('status' => 1, "msg" => "No Chnage Updated This Details!");
					$recp['all_record'] = $record;
					echo json_encode($recp);
				} else {
					$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
					echo json_encode($recp);
				}
			} else {
				$st = 0;
				echo $st;
			}
		}
	}

	public function get_admission_email_record()
	{
		$admission_id = $this->input->post('admission_id');
		$data['adm_get_record'] = $this->admi->get_adm_record_list('admission_process', 'admission_id', $admission_id);
		echo json_encode(array('record' => $data));
	}

	public function get_email_template_record()
	{
		if (!empty($this->input->post('template_id'))) {
			$id =  $this->input->post('template_id');
			$data['record'] =  $this->cm->get_template_rec('email_template_category', 'id', $id);
			echo json_encode(array('reco' => $data));
		}
	}

	public function send_email()
	{
		$data = $this->input->post();
		$emailconfigration = $this->admi->email_configration_daynamic('email_settings');
		foreach ($emailconfigration as $key) {
			if ($key->email_type == "1") {
				$Protocol = $key->encryption;
				$HostName = $key->host;
				$SmtpPortNo = $key->port;
				$SmtpUser = $key->email;
				$SmtpPass = $key->password;

				$config = array(
					'protocol'  => $Protocol,
					'smtp_host' => $HostName,
					'smtp_port' => $SmtpPortNo,
					'smtp_user' => $SmtpUser,
					'smtp_pass' => $SmtpPass,
					'mailtype'  => 'html',
					'charset'   => 'utf-8'
				);
					$this->load->library('email');
					$this->email->initialize($config);
			}

			if ($key->email_type == "2") {
				@$fromemail = $key->email;
				@$from = @$fromemail;
			}
		}

		$to = $data['email'];
		$subject = $data['subject'];
		$message = $data['message'];
		
		$this->email->set_newline("\r\n");
		$this->email->from($from);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		if ($this->email->send()) {
			$userdata =  $this->session->userdata('Admin');

			$data['user_role'] = $userdata['name'];
			$data['user_id'] = $userdata['id'];
			$data['type'] = "email";
			$data['comment'] = $data['message'];
			unset($data['message']);
			unset($data['email']);
			date_default_timezone_set("Asia/Calcutta");
			$data['timing_sender'] = date('m/d/Y h:i A');
			$data['status'] = "success";
			$this->admi->quick_admission_data('admission_followup_history', $data);
			$this->admi->quick_admission_data('admission_followup_history_response', $data);

			$st = 1;
			if ($st == 1) {
				$record = array('status' => 1, "msg" => "Successfully Sedn Mail!!");
				$recp['all_record'] = $record;
				echo json_encode($recp);
			} else {
				$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
				echo json_encode($recp);
			}
		} else {
			echo $this->email->print_debugger();
		}
	}

	public function get_admission_sms_record(){
		$admission_id = $this->input->post('admission_id');
		$data['adm_get_record'] = $this->admi->get_adm_record_list('admission_process', 'admission_id', $admission_id);
		echo json_encode(array('record' => $data));
	}

	public function get_sms_template_record(){
		$sms_id = $this->input->post('sms_template_id');
		$data['records'] = $this->cm->get_sms_template_record('sms_template', 'category', $sms_id);
		echo json_encode(array('reco' => $data));
	}

	public function send_sms_record(){
		$data = $this->input->post();
		$record = $this->sendSMS($data['primary_sms'], $data['sms_textarea']);
	
		if ($record) {
			$userdata =  $this->session->userdata('Admin');
			$r_record['user_id'] = $userdata['id'];
			$r_record['user_role'] = $userdata['name'];
			$r_record['type'] = "SMS";
			$r_record['comment'] = $data['sms_textarea'];
			$r_record['admission_id'] = $data['sms_recepient_id'];
			$r_record['subject'] = $data['sms_template'];

			unset($data['sms_textarea']);
			unset($data['email']); 
			date_default_timezone_set("Asia/Calcutta");
			$r_record['timing_sender'] = date('m/d/Y h:i A');
			$r_record['status'] = "success";

			$this->admi->quick_admission_data('admission_followup_history', $r_record);
			$this->admi->quick_admission_data('admission_followup_history_response', $r_record);
			$st = 1;
			if ($st == 1) {
				$record = array('status' => 1, "msg" => "Successfully Sedn Sms!");
				$recp['all_record'] = $record;
				echo json_encode($recp);
			} else {
				$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
				echo json_encode($recp);
			}
		}
	}

	public function sendSMS($mo,  $msg){
		$mobile = "91" . $mo;
		$msg = urlencode($msg);
		
		//echo $msg;
		$url = "http://dndsms.vishawebsolutions.com/api/mt/SendSMS?user=Hitesh-RNW&password=Hitz9898&senderid=RNWEDU&channel=Trans&DCS=8&flashsms=0&number=$mobile&text=$msg&route=15";
		/* init the resource */
		$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => 0
		));

		/* get response */
		$output = curl_exec($ch);
		/* Print error if any */
		if(curl_errno($ch)) {
			echo 'error:' . curl_error($ch);
		}
		curl_close($ch);
		return 1;
	}

	public function erpadmisson_show_courses(){
		$id = $this->input->post('admission_id');
		
		$data['adm_get_record'] = $this->admi->get_adm_record_list('admission_process', 'admission_id', $id);
		$data['admission_courses'] = $this->admi->getall_recordid_wise("admission_courses", "admission_id", $id);
		$data['single_clg_data'] = $this->cm->select_data("admission_courses","admission_id", $id);

		$data['list_department'] = $this->cm->view_all("department");
		$data['list_branch'] = $this->cm->view_all("branch");
		$data['list_course'] = $this->cm->view_all("rnw_course");
		$data['list_package'] = $this->cm->view_all("rnw_package");
		$data['list_college_courses'] = $this->cm->view_all("college_courses");
		$data['list_source'] = $this->cm->view_all("source");
		$data['list_batch'] = $this->cm->view_all("batch_list");
		$data['batches_all'] = $this->cm->view_all("batches");
		$data['list_source'] = $this->cm->view_all("source");
		$data['list_country'] = $this->cm->view_all("country");
		$data['list_state'] = $this->cm->view_all("state");
		$data['list_city'] = $this->cm->view_all("cities");
		$data['list_area'] = $this->cm->view_all("area");
		$data['list_dropdown_adm'] = $this->cm->view_all("dropdown_adm");
		$data['faculty_all'] = $this->cm->view_all("faculty");
		if($data['adm_get_record']->type!="COLLEGE"){
			$this->load->view('erp/erpadmisson_show_courses', $data);
		}
		else{
			$this->load->view('erp/erpadmisson_show_courses_clg', $data);
		}
	}	

	public function ErpCancellation_Admission()
	{
		$id = $this->input->post('admission_id');

		$data['adm_get_record'] = $this->admi->get_adm_record_list('admission_process', 'admission_id', $id);
		$data['list_dropdown_adm'] = $this->cm->view_all("dropdown_adm");

		$this->load->view('erp/ErpCancellation_Admission', $data);
	}

	public function admission_canceled()
	{
		$data =  $this->input->post();

		date_default_timezone_set("Asia/Calcutta");

		$remarks_time = date('h:i A');

		if (empty($data['admission_id'])) {
			$admission_id = $data['admission_id'] = "";
		} else {
			$admission_id = $data['admission_id'];
		}

		if (empty($data['cancellation_admission_date'])) {
			$cancellation_admission_date = $data['cancellation_admission_date'] = "";
		} else {
			$cancellation_admission_date = date("Y-m-d", strtotime($data['cancellation_admission_date']));
		}

		if (empty($data['dropdown_adm_id'])) {
			$dropdown_adm_id = $data['dropdown_adm_id'] = "";
		} else {
			$dropdown_adm_id = $data['dropdown_adm_id'];
		}

		if (empty($data['admission_remrak'])) {
			$admission_remrak = $data['admission_remrak'] = "";
		} else {
			$admission_remrak = $data['admission_remrak'];
		}

		if (empty($data['addby'])) {
			$addby = $data['addby'] = "";
		} else {
			$addby = $data['addby'];
		}

		

		$querydata = $this->cm->getTotalPaidFees($admission_id);
		$paid_amount = isset($querydata->paid_amount)?$querydata->paid_amount:'0';
	
				
		$adm_data = $this->cm->select_data('admission_process', 'admission_id', $admission_id);

		

		if ($paid_amount == $adm_data->tuation_fees) {
			$record = array('admission_id' => $admission_id, 'admission_remrak' => $admission_remrak, 'remarks_date' => $cancellation_admission_date, 'dropdown_adm_id' => $dropdown_adm_id, 'remarks_time' => $remarks_time, 'addby' => $addby);

			$this->admi->save_data('admission_remarks', $record);

			$admission_status = "Canceled";

			$this->db->set('admission_status', $admission_status);

			$this->db->set('cancellation_admission_date', $cancellation_admission_date);

			$this->db->set('dropdown_adm_id', $dropdown_adm_id);

			$this->db->where('admission_id', $admission_id);

			$result =	$this->db->update('admission_process');

			if ($result) {
				$recp["all_record"] = array('status' => 1, "msg" => "HI! Finally Your Admission Is Cancelled.");

				echo json_encode($recp); // echo "1";
			} else {
				$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");

				echo json_encode($recp); // echo "2";
			}
		} else {
			$fees_not_pay = "Not Match";

			if ($fees_not_pay == "Not Match") {
				$recp["all_record"] = array('status' => 3, "msg" => "Your Admission will Be Canceled After You Complete Your Fees.");

				echo json_encode($recp); // echo "1";
			} else {
				$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");

				echo json_encode($recp); // echo "2";
			}
		}
	}

	public function ErpTerminated_Admission()
	{
		$id = $this->input->post('admission_id');

		$data['adm_get_record'] = $this->admi->get_adm_record_list('admission_process', 'admission_id', $id);
		$data['list_dropdown_adm'] = $this->cm->view_all("dropdown_adm");

		$this->load->view('erp/ErpTerminated_Admission', $data);
	}

	public function admission_Terminate()
	{
		$data =  $this->input->post();

		date_default_timezone_set("Asia/Calcutta");

		$remarks_time = date('h:i A');

		if (empty($data['admission_id'])) {
			$admission_id = $data['admission_id'] = "";
		} else {
			$admission_id = $data['admission_id'];
		}

		if (empty($data['terminate_date'])) {
			$terminate_date = $data['terminate_date'] = "";
		} else {
			$terminate_date = date("Y-m-d", strtotime($data['terminate_date']));
		}

		if (empty($data['dropdown_adm_id'])) {
			$dropdown_adm_id = $data['dropdown_adm_id'] = "";
		} else {
			$dropdown_adm_id = $data['dropdown_adm_id'];
		}

		if (empty($data['admission_remrak'])) {
			$admission_remrak = $data['admission_remrak'] = "";
		} else {
			$admission_remrak = $data['admission_remrak'];
		}

		if (empty($data['addby'])) {
			$addby = $data['addby'] = "";
		} else {
			$addby = $data['addby'];
		}

		$record = array('admission_id' => $admission_id, 'admission_remrak' => $admission_remrak, 'remarks_date' => $terminate_date, 'dropdown_adm_id' => $dropdown_adm_id, 'remarks_time' => $remarks_time, 'addby' => $addby);

		$this->admi->save_data('admission_remarks', $record);

		$admission_status = "Terminated";

		$this->db->set('admission_status', $admission_status);

		$this->db->set('terminate_date', $terminate_date);

		$this->db->set('dropdown_adm_id', $dropdown_adm_id);

		$this->db->where('admission_id', $admission_id);

		$result =	$this->db->update('admission_process');

		if ($result) {
			$recp["all_record"] = array('status' => 1, "msg" => "HI! Finally Your Admission Is Terminated.");

			echo json_encode($recp); // echo "1";
		} else {
			$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");

			echo json_encode($recp); // echo "2";
		}
	}

	public function ErpHold_Admission()
	{
		$id = $this->input->post('admission_id');

		$data['adm_get_record'] = $this->admi->get_adm_record_list('admission_process', 'admission_id', $id);
		$data['list_dropdown_adm'] = $this->cm->view_all("dropdown_adm");

		$this->load->view('erp/ErpHold_Admission', $data);
	}

	public function admission_Hold()
	{
		$data =  $this->input->post();

		date_default_timezone_set("Asia/Calcutta");

		$remarks_time = date('h:i A');
		$created_by = $_SESSION['user_name'];

		if (empty($data['admission_id'])) {
			$admission_id = $data['admission_id'] = "";
		} else {
			$admission_id = $data['admission_id'];
		}

		if (empty($data['hold_stating_date'])) {
			$hold_stating_date = $data['hold_stating_date'] = "";
		} else {
			$hold_stating_date = date("Y-m-d", strtotime($data['hold_stating_date']));
		}

		if (empty($data['hold_ending_date'])) {
			$hold_ending_date = $data['hold_ending_date'] = "";
		} else {
			$hold_ending_date = date("Y-m-d", strtotime($data['hold_ending_date']));
		}

		if (empty($data['dropdown_adm_id'])) {
			$dropdown_adm_id = $data['dropdown_adm_id'] = "";
		} else {
			$dropdown_adm_id = $data['dropdown_adm_id'];
		}

		if (empty($data['admission_remrak'])) {
			$admission_remrak = $data['admission_remrak'] = "";
		} else {
			$admission_remrak = $data['admission_remrak'];
		}

		$record = array('admission_id' => $admission_id, 'admission_remrak' => $admission_remrak, 'remarks_date' => $hold_stating_date, 'remarks_time' => $remarks_time, 'hold_ending_date' => $hold_ending_date, 'dropdown_adm_id' => $dropdown_adm_id, 'addby' => $created_by);

		$this->admi->save_data('admission_remarks', $record);

		$admission_status = "Hold";

		$records = array('admission_status' => $admission_status, 'hold_stating_date' => $hold_stating_date, 'hold_ending_date' => $hold_ending_date, 'dropdown_adm_id' => $dropdown_adm_id, 'hold_addby' => $created_by);

		$result = $this->admi->update_admission_status_record('admission_process', $records, 'admission_id', $admission_id);

		if ($result) {
			$recp["all_record"] = array('status' => 1, "msg" => "HI Student! Your Admission Has Been Withhold For A Short Period Of Time.");

			echo json_encode($recp); // echo "1";
		} else {
			$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");

			echo json_encode($recp); // echo "2";
		}
	}

	public function ErpHold_Over()
	{
		$id = $this->input->post('admission_id');

		$data['adm_get_record'] = $this->admi->get_adm_record_list('admission_process', 'admission_id', $id);
		$data['list_dropdown_adm'] = $this->cm->view_all("dropdown_adm");

		$this->load->view('erp/ErpHold_Over', $data);
	}

	public function Hold_Over()
	{
		$data =  $this->input->post();

		date_default_timezone_set("Asia/Calcutta");
		$remarks_date = date('Y-m-d');
		$remarks_time = date('h:i A');
		$created_by = $_SESSION['user_name'];
		$admission_id = $data['admission_id'];

		$record = array('admission_id' => $admission_id, 'admission_remrak' => $data['admission_remrak'], 'remarks_date' => $remarks_date, 'remarks_time' => $remarks_time, 'dropdown_adm_id' => $data['dropdown_adm_id'], 'addby' => $created_by);

		$this->admi->save_data('admission_remarks', $record);

		$admission_status = "Enrolled";

		$records = array('admission_status' => $admission_status, 'dropdown_adm_id' => $data['dropdown_adm_id'], 'hold_addby' => $created_by);

		$result = $this->admi->update_admission_status_record('admission_process', $records, 'admission_id', $admission_id);

		if ($result) {
			$recp["all_record"] = array('status' => 1, "msg" => "HI Student! Your Admission Has Been Withhold For A Short Period Of Time.");

			echo json_encode($recp); // echo "1";
		} else {
			$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");

			echo json_encode($recp); // echo "2";
		}
	}

	public function Erppayment_Admisison()
	{
		$id = $this->input->post('admission_id');

		$data['adm_instalment'] = $this->admi->get_instalment("admission_installment", "admission_id", $id);
		$data['single_data'] = $this->cm->select_data("admission_process", "admission_id", $id);

		$no_of_ins =  $data['single_data']->no_of_installment;
        $installment = array();
        for($i=1; $i<=$no_of_ins; $i++) {
           
			$insta_wise = array();
            foreach($data['adm_instalment'] as $inment)
            {
              if($i==$inment->installment_no)
              {
				array_push($insta_wise,$inment);
              }
            }
			array_push($installment,$insta_wise);
        }

		$data['list_clg_installment'] = @$installment;
		$data['list_department'] = $this->cm->view_all("department");
		$data['list_branch'] = $this->cm->view_all("branch");
		$data['list_course'] = $this->cm->view_all("course");
		$data['list_package'] = $this->cm->view_all("package");
		$data['list_source'] = $this->cm->view_all("source");
		$data['list_batch'] = $this->cm->view_all("batch_list");
		$data['list_source'] = $this->cm->view_all("source");
		$data['list_country'] = $this->cm->view_all("country");
		$data['list_state'] = $this->cm->view_all("state");
		$data['list_city'] = $this->cm->view_all("cities");
		$data['list_area'] = $this->cm->view_all("area");
		$data['faculty_all'] = $this->cm->view_all("faculty");
		$data['list_receipt'] = $this->cm->view_all("admissin_receipt");

		if($data['single_data']->type=="COLLEGE"){
			$this->load->view('erp/Erppayment_Admisison_Clg', $data);
		} else {
			$this->load->view('erp/Erppayment_Admisison', $data);
		}
	}
	
	public Function ErpPay(){
		$id = $this->input->post('admission_id');

		$data['adm_instalment'] = $this->admi->get_instalment("admission_installment", "admission_id", $id);
		$data['single_data'] = $this->cm->select_data("admission_process", "admission_id", $id);

		$no_of_ins =  $data['single_data']->no_of_installment;
        $installment = array();
        for($i=1; $i<=$no_of_ins; $i++) {
           
			$insta_wise = array();
            foreach($data['adm_instalment'] as $inment)
            {
              if($i==$inment->installment_no)
              {
				array_push($insta_wise,$inment);
              }
            }
			array_push($installment,$insta_wise);
        }

		$data['list_clg_installment'] = @$installment;
		$data['list_department'] = $this->cm->view_all("department");
		$data['list_branch'] = $this->cm->view_all("branch");
		$data['list_course'] = $this->cm->view_all("course");
		$data['list_package'] = $this->cm->view_all("package");
		$data['list_source'] = $this->cm->view_all("source");
		$data['list_batch'] = $this->cm->view_all("batch_list");
		$data['list_source'] = $this->cm->view_all("source");
		$data['list_country'] = $this->cm->view_all("country");
		$data['list_state'] = $this->cm->view_all("state");
		$data['list_city'] = $this->cm->view_all("cities");
		$data['list_area'] = $this->cm->view_all("area");
		$data['faculty_all'] = $this->cm->view_all("faculty");
		$data['list_receipt'] = $this->cm->view_all("admissin_receipt");

		if($data['single_data']->type=="COLLEGE"){
			$this->load->view('erp/Erppay_Clg', $data);
		} else {
			$this->load->view('erp/Erppay', $data);
		}
	}

	public function ErpUpdPayment()
	{
		$id = $this->input->post('admission_installment_id');

		$data['adm_instalment'] = $this->cm->select_data("admission_installment", "admission_installment_id", $id);
		$data['admission_data'] = $this->cm->select_data("admission_process", "admission_id", $data['adm_instalment']->admission_id);
		$data['list_department'] = $this->cm->view_all("department");
		$data['list_branch'] = $this->cm->view_all("branch");
		$data['list_course'] = $this->cm->view_all("course");
		$data['list_package'] = $this->cm->view_all("package");
		$data['list_source'] = $this->cm->view_all("source");
		$data['list_batch'] = $this->cm->view_all("batch_list");
		$data['list_source'] = $this->cm->view_all("source");
		$data['list_country'] = $this->cm->view_all("country");
		$data['list_state'] = $this->cm->view_all("state");
		$data['list_city'] = $this->cm->view_all("cities");
		$data['list_area'] = $this->cm->view_all("area");
		$data['faculty_all'] = $this->cm->view_all("faculty");

		$this->load->view('erp/ErpUpdPayment', $data);
	}

	public function Erpchange_insdate(){
		$id = $this->input->post('admission_installment_id');
		$data['installment_reco'] = $this->cm->select_data("admission_installment", "admission_installment_id", $id);
		$data['admission_data'] = $this->cm->select_data("admission_process", "admission_id", $data['installment_reco']->admission_id);
		$this->load->view('erp/ErpInsChangeDate',$data);
	}

	public function ErpInsUpdDate(){
		date_default_timezone_set("Asia/Calcutta");
		$data = $this->input->post();
		$admIntsallment = $this->cm->select_data('admission_installment', 'admission_installment_id', $data['admission_installment_id']);
		$lastAdmiid = $admIntsallment->admission_id;
		$created_by = $_SESSION['user_name'];
		$remarksdate = date('Y-m-d');
		$remarkstime = date('h:i A');
		
		$remarkreco = array('admission_remrak'=>$data['remarks'],'admission_id'=>$data['admission_id'],'remarks_date'=>$remarksdate,'remarks_time'=>$remarkstime,'labels'=>$data['labels'],'rating'=>$data['rating'],'addby'=>$created_by);
		$this->db->insert('admission_remarks', $remarkreco);
		
		$record = array('installment_date'=>$data['installment_date'],'created_bye'=>$created_by);
	    $result = $this->admi->update_data('admission_installment', $record ,'admission_installment_id',$data['admission_installment_id']);
		if($result) {
			$record = array('status' => 1, "msg" => "Upgraded");
			$recp['all_record'] = $record;
			$recp["lastAdmiid"] = $lastAdmiid;
			echo json_encode($recp);
		} else {
			$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp);
		}
	}

	public function ErpUpgradeCourse()
	{
		$id = $this->input->post('admission_id');
		$data['adm_record'] =  $this->admi->get_adm_cp_record_list('admission_process','admission_id',$id);
		$data['list_department'] = $this->cm->view_all("department");
		$data['list_branch'] = $this->cm->view_all("branch");
		// $data['list_course'] = $this->cm->view_all("course");
		$data['list_course'] = $this->cm->view_all("rnw_course");
		
		$branch_ids = explode(',',$_SESSION['Admin']['branch_id']);
		$cours_record = array();
		for($i=0; $i<sizeof($data['list_course']);$i++){
			$br_ids = explode(',',$data['list_course'][$i]->branch_id);
			$flag= 1;
			for($j=0; $j<sizeof($br_ids);$j++){
				if(in_array($br_ids[$j],$branch_ids)){
					$flag = 0;
					break;
				}
			}
			if($flag==0){
				$cours_record[] = $data['list_course'][$i];
			}
		}
		$data['list_course'] = $cours_record;
		
		$data['list_subcourse'] = $this->cm->view_all("rnw_subcourse");
		$data['list_package'] = $this->cm->view_all("rnw_package");
		$pack_record = array();
		for($i=0;$i<sizeof($data['list_package']); $i++){
			$pac_ids = explode(',',$data['list_package'][$i]->branch_id);
			$fla=1;
			for($j=0;$j<sizeof($pac_ids);$j++){
				if(in_array($pac_ids[$j],$branch_ids)){
					$fla=0;
					break;
				}
			}
			if($fla == 0){
				$pack_record[] =  $data['list_package'][$i];
			}
		}
		$data['list_package'] = $pack_record;
		
		$data['list_subpackage'] = $this->cm->view_all("rnw_subpackage");
		$data['list_source'] = $this->cm->view_all("source");
		$data['list_batch'] = $this->cm->view_all("batch_list");
		$data['list_source'] = $this->cm->view_all("source");
		$data['faculty_all'] = $this->cm->view_all("faculty");
		$this->load->view('erp/ErpUpgradeCourse', $data);
	}

	public function WithoutFees_ModifiedCourse()
	{
		$id = $this->input->post('admission_id');
		$data['adm_record'] =  $this->admi->get_adm_cp_record_list('admission_process', 'admission_id', $id);
		$data['list_department'] = $this->cm->view_all("department");
		$data['list_branch'] = $this->cm->view_all("branch");
		$data['list_course'] = $this->cm->view_all("course");
		$data['list_package'] = $this->cm->view_all("package");
		$data['list_source'] = $this->cm->view_all("source");
		$data['list_batch'] = $this->cm->view_all("batch_list");
		$data['list_source'] = $this->cm->view_all("source");
		$data['faculty_all'] = $this->cm->view_all("faculty");

		$this->load->view('erp/WithoutFees_ModifiedCourse', $data);
	}

	public function UpgradeCourse_WithoutFeesModifive()
	{
		date_default_timezone_set("Asia/Calcutta");
		$data = $this->input->post();
		$created_date = date('Y-m-d h:i A');
		$created_by = $_SESSION['user_name'];
		$remarksdate = date('m-d-Y');
		$remarkstime = date('h:i A');
		$label = "Without Fees Modification Course";
		$admission_data = $this->cm->select_data('admission_process', 'admission_id', $data['admission_id']);
		$oldcourses = $this->admi->get_all_data('admission_courses','admission_id',$data['admission_id']);
		foreach($oldcourses as $val)
		{
			$recod = array('without_fees_modifive'=>"1");

			$re = $this->admi->update_data('admission_courses', $recod ,'admission_courses_id',$val->admission_courses_id);
		}
		
		if (empty($data['type'])) {
			$type = $data['type'] = "";
		} else {
			$type = $data['type'];
		}
		if (empty($data['course_or_single'])) {
			$course_id = $data['course_or_single'] = "";
		} else {
			$course_id = implode(',', $data['course_or_single']);

			    $c_data['admission_id'] = $data['admission_id'];
				$c_data['gr_id'] = $admission_data->gr_id;
				$c_data['branch_id'] = $admission_data->branch_id;
				$c_data['courses_id'] = $admission_data->course_id;
				$c_data['course_orpackage_id'] = $admission_data->course_id;
				$c_data['stating_date'] = date('Y-m-d');
				$c_data['surname'] = $admission_data->surname;
				$c_data['first_name'] = $admission_data->first_name;
				$c_data['email'] = $admission_data->email;
				$c_data['admission_courses_status'] = "Pending";
				
				$this->db->insert('admission_courses', $c_data);
		}

		if (empty($data['course_or_package'])) {
			$package_id = $data['course_or_package'] = "";
		} else {
			$package_id = implode(',', $data['course_or_package']);

			$record['p_all'] = $this->admi->match_package('package', 'package_id',$package_id);

			$course_ids =  explode(',', $record['p_all']->course_ids);

				for ($i = 0; $i < sizeof($course_ids); $i++) {
					$courses[] =  $this->admi->match_course('course', 'course_id', $course_ids[$i]);
				}

				foreach ($courses as $key => $value) {
					$c_data['admission_id'] = $data['admission_id'];
					$c_data['gr_id'] = $admission_data->gr_id;
					$c_data['branch_id'] = $admission_data->branch_id;
					$c_data['courses_id'] = $value->course_id;
					$c_data['course_orpackage_id'] = $package_id;
					$c_data['stating_date'] = date('Y-m-d');
					$c_data['surname'] = $admission_data->surname;
					$c_data['first_name'] = $admission_data->first_name;
					$c_data['email'] = $admission_data->email;
					$c_data['admission_courses_status'] = "Pending";
					
					$this->db->insert('admission_courses', $c_data);
				}
		}

		if (empty($data['old_course_id'])) {
			$old_course_id = $data['old_course_id'] = "";
		} else {
			$old_course_id = $data['old_course_id'];
		}
		if (empty($data['old_package_id'])) {
			$old_package_id = $data['old_package_id'] = "";
		} else {
			$old_package_id = $data['old_package_id'];
		}

		$records = array('admission_id' => $data['admission_id'], 'admission_remrak' => $data['admission_remrak'], 'remarks_date' => $remarksdate, 'labels' => $label, 'old_course_id' => $old_course_id , 'old_package_id' => $old_package_id ,'remarks_time' => $remarkstime, 'addby' => $created_by);
		
		$this->admi->save_data('admission_remarks', $records);

		$admission_id = $data['admission_id'];
	
		$record = array('type' => $type,'course_id' => $course_id , 'package_id' => $package_id);
		
		$result = $this->admi->update_admission_status_record('admission_process', $record, 'admission_id', $admission_id);

		if ($result) {
			$record = array('status' => 1, "msg" => "Upgraded");
			$recp['all_record'] = $record;
			echo json_encode($recp);
		} else {
			$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp);
		}
	}

	public function upd_intsallment()
	{
		date_default_timezone_set("Asia/Calcutta");

		$data = $this->input->post();                         

		$admIntsallment = $this->cm->select_data('admission_installment', 'admission_installment_id', $data['upd_intalment_id']);
		$lastInstId = $admIntsallment->admission_installment_id;
		$lastAdmiid = $admIntsallment->admission_id;
		$admprocess_data = $this->cm->select_data('admission_process', 'admission_id', $admIntsallment->admission_id);
		$get_lastreco_installment = $this->cm->get_installment_last_reco('admission_installment', 'admission_id',$admprocess_data->admission_id);

		if ($data['paying_amount'] == $admIntsallment->due_amount) {
			$commentdata['admission_id'] = $admprocess_data->admission_id;
			$commentdata['branch_id'] = $admprocess_data->branch_id;
			$commentdata['labels'] = "Fees";
			$commentdata['admission_remrak'] = $data['comments'];
			$commentdata['remarks_date'] = date('d/m/Y');
			$commentdata['remarks_time'] = date('h:i A');
			$commentdata['addby'] = $_SESSION['user_name'];

			$this->db->insert('admission_remarks', $commentdata);

			$p_amount = $data['paying_amount'];

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
			if (empty($data['send_sms_student'])) {
				$send_sms_student = $data['send_sms_student'] = "";
			} else {
				$send_sms_student = $data['send_sms_student'];
			}

			if (empty($data['send_sms_parents'])) {
				$send_sms_parents = $data['send_sms_parents'] = "";
			} else {
				$send_sms_parents = $data['send_sms_parents'];
			}

			if ($data['payment_mode'] == "Cash") {
				$paid_amount =	$data['paying_amount'];
				$paycheque_no = "";
				$paycheque_date = "";
				$paybank_name = "";
				$paybank_branch_name = "";
				$paycheque_status = "";
				$paycheque_holder_name = "";
				$paytransaction_no = "";
				$paytransaction_date = "";
			}
			if ($data['payment_mode'] == "Cheque") {
				$paycheque_no = $cheque_no;
				$paycheque_date = date("Y-m-d", strtotime($cheque_date));
				$paybank_name = $bank_name;
				$paybank_branch_name = $bank_branch_name;
				$paycheque_status = $cheque_status;
				$paycheque_holder_name = $cheque_holder_name;
				$paid_amount = "";
				$paytransaction_no = "";
				$paytransaction_date = "";
			}

			if ($data['payment_mode'] == "DD") {
				$paycheque_no = $cheque_no;
				$paycheque_date = date("Y-m-d", strtotime($cheque_date));
				$paybank_name = $bank_name;
				$paybank_branch_name = $bank_branch_name;
				$paycheque_status = $cheque_status;
				$paycheque_holder_name = $cheque_holder_name;
				$paid_amount = "";
				$paytransaction_no = "";
				$paytransaction_date = "";
			}

			if ($data['payment_mode'] == "Credit Card") {
				$paytransaction_no = $transaction_no;
				$paytransaction_date = date("Y-m-d", strtotime($transaction_date));
				$paid_amount =	$data['paying_amount'];
				$paycheque_no = "";
				$paycheque_date = "";
				$paybank_name = "";
				$paybank_branch_name = "";
				$paycheque_status = "";
				$paycheque_holder_name = "";
			}

			if ($data['payment_mode'] == "Debit Card") {
				$paytransaction_no = $transaction_no;
				$paytransaction_date = date("Y-m-d", strtotime($transaction_date));
				$paid_amount =	$data['paying_amount'];
				$paycheque_no = "";
				$paycheque_date = "";
				$paybank_name = "";
				$paybank_branch_name = "";
				$paycheque_status = "";
				$paycheque_holder_name = "";
			}

			if ($data['payment_mode'] == "Debit Card") {
				$paytransaction_no = $transaction_no;
				$paytransaction_date = date("Y-m-d", strtotime($transaction_date));
				$paid_amount =	$data['paying_amount'];
				$paycheque_no = "";
				$paycheque_date = "";
				$paybank_name = "";
				$paybank_branch_name = "";
				$paycheque_status = "";
				$paycheque_holder_name = "";
			}

			if ($data['payment_mode'] == "Online Payment") {
				$paytransaction_no = $transaction_no;
				$paytransaction_date = date("Y-m-d", strtotime($transaction_date));
				$paid_amount =	$data['paying_amount'];
				$paycheque_no = "";
				$paycheque_date = "";
				$paybank_name = "";
				$paybank_branch_name = "";
				$paycheque_status = "";
				$paycheque_holder_name = "";
			}

			if ($data['payment_mode'] == "NEFT / IMPS") {
				$paytransaction_no = $transaction_no;
				$paytransaction_date = date("Y-m-d", strtotime($transaction_date));
				$paybank_name = $bank_name;
				$paybank_branch_name = $bank_branch_name;
				$paid_amount =	$data['paying_amount'];
				$paycheque_no = "";
				$paycheque_date = "";
				$paycheque_status = "";
				$paycheque_holder_name = "";
			}

			if ($data['payment_mode'] == "Paytm") {
				$paytransaction_no = $transaction_no;
				$paytransaction_date = date("Y-m-d", strtotime($transaction_date));
				$paid_amount =	$data['paying_amount'];
				$paycheque_no = "";
				$paycheque_date = "";
				$paybank_name = "";
				$paybank_branch_name = "";
				$paycheque_status = "";
				$paycheque_holder_name = "";
			}

			if ($data['payment_mode'] == "Banck Deposit (Cash)") {
				$paytransaction_no = $transaction_no;
				$paytransaction_date = date("Y-m-d", strtotime($transaction_date));
				$paid_amount =	$data['paying_amount'];
				$paycheque_no = "";
				$paycheque_date = "";
				$paybank_name = "";
				$paybank_branch_name = "";
				$paycheque_status = "";
				$paycheque_holder_name = "";
			}

			if ($data['payment_mode'] == "Capital Float (EMI)") {
				$paytransaction_no = $transaction_no;
				$paytransaction_date = date("Y-m-d", strtotime($transaction_date));
				$paid_amount =	$data['paying_amount'];
				$paycheque_no = "";
				$paycheque_date = "";
				$paybank_name = "";
				$paybank_branch_name = "";
				$paycheque_status = "";
				$paycheque_holder_name = "";
			}

			if ($data['payment_mode'] == "Google Pay") {
				$paytransaction_no = $transaction_no;
				$paytransaction_date = date("Y-m-d", strtotime($transaction_date));
				$paid_amount =	$data['paying_amount'];
				$paycheque_no = "";
				$paycheque_date = "";
				$paybank_name = "";
				$paybank_branch_name = "";
				$paycheque_status = "";
				$paycheque_holder_name = "";
			}

			if ($data['payment_mode'] == "Phone Pay") {
				$paytransaction_no = $transaction_no;
				$paytransaction_date = date("Y-m-d", strtotime($transaction_date));
				$paid_amount =	$data['paying_amount'];
				$paycheque_no = "";
				$paycheque_date = "";
				$paybank_name = "";
				$paybank_branch_name = "";
				$paycheque_status = "";
				$paycheque_holder_name = "";
			}

			if ($data['payment_mode'] == "Bajaj Finserv (EMI)") {
				$paytransaction_no = $transaction_no;
				$paytransaction_date = date("Y-m-d", strtotime($transaction_date));
				$paid_amount =	$data['paying_amount'];
				$paycheque_no = "";
				$paycheque_date = "";
				$paybank_name = "";
				$paybank_branch_name = "";
				$paycheque_status = "";
				$paycheque_holder_name = "";
			}

			if ($data['payment_mode'] == "Bhim UPI(India)") {
				$paytransaction_no = $transaction_no;
				$paytransaction_date = date("Y-m-d", strtotime($transaction_date));
				$paid_amount =	$data['paying_amount'];
				$paycheque_no = "";
				$paycheque_date = "";
				$paybank_name = "";
				$paybank_branch_name = "";
				$paycheque_status = "";
				$paycheque_holder_name = "";
			}

			if ($data['payment_mode'] == "Instamojo") {
				$paytransaction_no = $transaction_no;
				$paytransaction_date = date("Y-m-d", strtotime($transaction_date));
				$paid_amount =	$data['paying_amount'];
				$paycheque_no = "";
				$paycheque_date = "";
				$paybank_name = "";
				$paybank_branch_name = "";
				$paycheque_status = "";
				$paycheque_holder_name = "";
			}

			if ($data['payment_mode'] == "Paypal") {
				$paytransaction_no = $transaction_no;
				$paytransaction_date = date("Y-m-d", strtotime($transaction_date));
				$paid_amount =	$data['paying_amount'];
				$paycheque_no = "";
				$paycheque_date = "";
				$paybank_name = "";
				$paybank_branch_name = "";
				$paycheque_status = "";
				$paycheque_holder_name = "";
			}

			if ($data['payment_mode'] == "Razorpay") {
				$paytransaction_no = $transaction_no;
				$paytransaction_date = date("Y-m-d", strtotime($transaction_date));
				$paid_amount =	$data['paying_amount'];
				$paycheque_no = "";
				$paycheque_date = "";
				$paybank_name = "";
				$paybank_branch_name = "";
				$paycheque_status = "";
				$paycheque_holder_name = "";
			}
			
			$pay_date = date('Y-m-d');
			$record = array(
				'payment_type' => $data['payment_type'], 'payment_mode' => $data['payment_mode'], 'paid_amount' => $paid_amount,'pay_date'=>$pay_date,'transaction_no' => $paytransaction_no, 'transaction_date' => $paytransaction_date, 'cheque_no' => $paycheque_no, 'cheque_date' => $paycheque_date,'bank_name' => $paybank_name, 'bank_branch_name' => $paybank_branch_name, 'cheque_status'=>$paycheque_status ,'cheque_holder_name' => $paycheque_holder_name, 'send_sms_student'=> $send_sms_student, 'send_email_student' => $data['send_email_student'], 'send_sms_parents' => $send_sms_parents,'send_email_parents' => $data['send_email_parents']);
			
			$result = $this->admi->update_installment('admission_installment', $record, 'admission_installment_id', $data['upd_intalment_id']);

			if ($result) {
				$recp["all_record"] = array('status' => 1, "msg" => "You Have Completed The Installation Of Your Fees");
				$recp["lastInstId"] = $lastInstId;
				$recp["lastAdmiid"] = $lastAdmiid;
				echo json_encode($recp); // echo "1";
			} else {
				$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
				echo json_encode($recp); // echo "2";
			}
		} else {
			$splitadd_Installment = $admIntsallment->due_amount - $data['paying_amount'];
			$installmentdate = date('Y-m-d', strtotime("+30 days"));
			$remaining_date = date('Y-m-d', strtotime($data['remaining_payment_date']));

			if($admprocess_data->type!="COLLEGE"){
			  $installment_no =	$get_lastreco_installment->installment_no+1;
			} else {
			  $installment_no = $admIntsallment->installment_no;
			}

			$splitaddInstallment_data['admission_id'] = $admprocess_data->admission_id;
			$splitaddInstallment_data['branch_id'] = $admprocess_data->branch_id;
			$splitaddInstallment_data['registration_fees'] = $admIntsallment->registration_fees;
			$splitaddInstallment_data['installment_date'] = $remaining_date;
			$splitaddInstallment_data['installment_no'] = $installment_no;
			$splitaddInstallment_data['due_amount'] = $splitadd_Installment;

			$this->db->insert('admission_installment', $splitaddInstallment_data);

			$commentdata['admission_id'] = $admprocess_data->admission_id;
			$commentdata['branch_id'] = $admprocess_data->branch_id;
			$commentdata['labels'] = "Fees";
			$commentdata['admission_remrak'] = $data['comments'];
			$commentdata['remarks_date'] = date('Y-m-d');
			$commentdata['remarks_time'] = date('h:i A');
			$commentdata['addby'] = $_SESSION['user_name'];

			$this->db->insert('admission_remarks', $commentdata);

			$payment = $data['paying_amount'];

			if (empty($data['send_sms_student'])) {
				$send_sms_student = $data['send_sms_student'] = "";
			} else {
				$send_sms_student = $data['send_sms_student'];
			}

			if (empty($data['send_sms_parents'])) {
				$send_sms_parents = $data['send_sms_parents'] = "";
			} else {
				$send_sms_parents = $data['send_sms_parents'];
			}

			$record = array('payment_type' => $data['payment_type'], 'payment_mode' => $data['payment_mode'], 'due_amount' => $payment, 'paid_amount' => $payment, 'send_sms_student' => $send_sms_student, 'send_email_student' => $data['send_email_student'], 'send_sms_parents' => $send_sms_parents, 'send_email_parents' => $data['send_email_parents']);


			$result = $this->admi->update_installment('admission_installment', $record, 'admission_installment_id', $data['upd_intalment_id']);

			if ($result) {
				$recp["all_record"] = array('status' => 3, "msg" => "You Have Completed The Split Installation Of Your Fees");
				$recp["lastInstId"] = $lastInstId;
				$recp["lastAdmiid"] = $lastAdmiid;

				echo json_encode($recp); // echo "1";
			} else {
				$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");

				echo json_encode($recp); // echo "2";
			}
		}
	}

	public function get_multiple_admission_data()
	{
		$admission_id = $this->input->post('multic');

		$data['adm_get_record'] = $this->admi->get_adm_list('admission_process', 'admission_id', $admission_id);
		if ($data['adm_get_record']->type == 'single') {
			$data_record['adm_get_record'] = $this->admi->get_adm_list_single_check_record('admission_process', 'admission_id', $admission_id);
		} else if($data['adm_get_record']->type == 'package') {
			$data_record['adm_get_record'] = $this->admi->get_adm_list_package_check_record('admission_process', 'admission_id', $admission_id);
		} else {
			$data_record['adm_get_record'] = $this->admi->get_adm_list_college_check_record('admission_process', 'admission_id', $admission_id);
		}


		$adm_id = $data_record['adm_get_record']->admission_id;
		$tottal = $this->admi->get_ttotal_installment_record('admission_installment','admission_id',$adm_id);
		if(isset($tottal[0]->paid_amount)){
			$data_record['adm_get_record']->total_paid_amount = $tottal[0]->paid_amount;
		}else{
			$data_record['adm_get_record']->total_paid_amount = 0;
		}

		// echo "<pre>";
		// print_r($data_record);
		// exit;
		echo json_encode(array('record' => $data_record));
	}

	public function Erpadmission_remarks()
	{
		$id = $this->input->post('admission_id');

		$data['adm_get_record'] = $this->admi->get_adm_record_list('admission_process', 'admission_id', $id);
		$data['all_remarks'] = $this->admi->get_adm_id_wise_remark("admission_remarks", "admission_id", $id);
		$data['all_admission_remarsk'] = $this->admi->get_all_remarks("admission_remarks", "admission_id", $id);
		
		$this->load->view('erp/Erpadmission_remarks', $data);
	}

	public function view_all_remrks_for_id_wise()
	{
		$id = $this->input->post('admission_id');
		$data['all_admission_remarsk'] = $this->admi->get_all_remarks("admission_remarks", "admission_id", $id);
		$data['all_labels'] = $this->cm->view_all('dropdown_adm');

		$this->load->view('erp/Erpview_all_remarks', $data);
	}

	public function posted_admission_remarks()
	{
		$data = $this->input->post();
		$record = array('admission_id' => $data['admission_id'], 'labels' => $data['labels'], 'rating' => $data['rating'], 'admission_remrak' => $data['admission_remrak'], 'remarks_date' => $data['remarks_date'], 'remarks_time' => $data['remarks_time'], 'addby' => $data['addby']);
		$result = $this->admi->save_data('admission_remarks', $record);

		if ($result) {
			$recp["all_record"] = array('status' => 1, "msg" => "Successfully Posted Comment!");
			echo json_encode($recp); // echo "1";
		}
	}

	public function erpreceipt()
	{
		$id = $this->input->get('xyqtu');

		if ($this->input->get('action') == "ere") {
			$display['admission'] = $this->cm->select_data("admission_process", "admission_id", $id);
			$display['next_reminder_installment'] = $this->cm->get_next_installment_reminder("admission_installment", "admission_id",$display['admission']->admission_id);
			$display['instalment'] = $this->cm->select_data("admission_installment", "admission_id", $id);
			$display['receipt_permission'] = $this->cm->select_data("receipt_permission", "branch_id", $display['admission']->branch_id);
			$display['branch_data'] = $this->cm->select_data("branch", "branch_id", $display['admission']->branch_id);
			$branch = $this->cm->select_data('branch', 'branch_id', $display['admission']->branch_id);

			if ($display['admission']->branch_id == 1) {
				$rn1q = $this->db->query("SELECT MAX(RW1) AS RW1 FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn1 =  $rn1q->result_array();
				$r1 = $rn1[0]['RW1'];
				$num = number_format($r1);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 5) {
				$rn2q = $this->db->query("SELECT MAX(RW2) AS RW2 FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn2 =  $rn2q->result_array();
				$r2 = $rn2[0]['RW2'];
				$num = number_format($r2);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 8) {
				$rn3q = $this->db->query("SELECT MAX(RW3) AS RW3 FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn3 =  $rn3q->result_array();
				$r3 = $rn3[0]['RW3'];
				$num = number_format($r3);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 3) {
				$rn4q = $this->db->query("SELECT MAX(RW4) AS RW4 FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn4 =  $rn4q->result_array();
				$r4 = $rn4[0]['RW4'];
				$num = number_format($r4);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 9) {
				$rn1bq = $this->db->query("SELECT MAX(RW1B) AS RW1B FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn1b =  $rn1bq->result_array();
				$r1b = $rn1b[0]['RW1B'];
				$num = number_format($r1b);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 10) {
				$rn1mmq = $this->db->query("SELECT MAX(rw1mm) AS rw1mm FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn1mm =  $rn1mmq->result_array();
				$r1mm = $rn1mm[0]['rw1mm'];
				$num = number_format($r1mm);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 11) {
				$rnclgq = $this->db->query("SELECT MAX(clg) AS clg FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rnclg =  $rnclgq->result_array();
				$rclg = $rnclg[0]['clg'];
				$num = number_format($rclg);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 12) {
				$rn5q = $this->db->query("SELECT MAX(RW5) AS RW5 FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn5 =  $rn5q->result_array();
				$r5 = $rn5[0]['RW5'];
				$num = number_format($r5);
				$rnw = $num + 1;
			}
			if ($display['admission']->branch_id == 1) {
				$RW1 = $rnw;
				$record = array('RW1' => $RW1);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW1 = 0;
			}

			if ($display['admission']->branch_id == 5) {
				$RW2 = $rnw;
				$record = array('RW2' => $RW2);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW2 = 0;
			}

			if ($display['admission']->branch_id == 8) {
				$RW3 = $rnw;
				$record = array('RW3' => $RW3);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW3 = 0;
			}

			if ($display['admission']->branch_id == 3) {
				$RW4 = $rnw;
				$record = array('RW4' => $RW4);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW4 = 0;
			}

			if ($display['admission']->branch_id == 9) {
				$RW1B = $rnw;
				$record = array('RW1B' => $RW1B);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW1B = 0;
			}

			if ($display['admission']->branch_id == 10) {
				$rw1mm = $rnw;
				$record = array('rw1mm' => $rw1mm);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$rw1mm = 0;
			}

			if ($display['admission']->branch_id == 11) {
				$clg = $rnw;
				$record = array('clg' => $clg);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$clg = 0;
			}

			if ($display['admission']->branch_id == 12) {
				$RW5 = $rnw;
				$record = array('RW5' => $RW5);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW5 = 0;
			}

			$receiptnumber = $branch->branch_code . "-" . $rnw;

			$display['receiptno'] = $receiptnumber;

			if($display['admission']->type!="COLLEGE")
			{
			  $display['receipttype'] = "Enrollment No";
			} else {
			  $display['receipttype'] = "Semester";
			}

			date_default_timezone_set("Asia/Calcutta");
			@$receipt_date =  date('Y-m-d');
			@$receipt_data['admission_id'] = $display['admission']->admission_id;
			@$receipt_data['branch_id'] = $display['admission']->branch_id;
			@$receipt_data['intallment_id'] = $display['instalment']->admission_installment_id;
			@$receipt_data['receipt_no'] = $receiptnumber;
			@$receipt_data['receipt_date'] = $receipt_date;
			@$receipt_data['gr_id'] = $display['admission']->gr_id;
			@$receipt_data['installment_no'] = $display['instalment']->installment_no;
			@$receipt_data['enrollment_no'] = $display['admission']->enrollment_number;
			if (@$display['admission']->type == "single") {
				@$receipt_data['course_id'] = $display['admission']->course_id;
			} else if (@$display['admission']->type == "package"){
				@$receipt_data['package_id'] = $display['admission']->package_id;
			} else {
				@$receipt_data['college_courses_id'] = $display['admission']->college_courses_id;
			}

			@$receipt_data['pay_now'] = $display['instalment']->paid_amount;
			@$receipt_data['ramrk_by'] = $display['instalment']->payment_mode;
			@$receipt_data['received_by'] = $_SESSION['user_name'];

			$this->db->insert('admissin_receipt', $receipt_data);
		}

		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['list_package'] = $this->cm->view_all("rnw_package");
		$display['list_clg_courses'] = $this->cm->view_all("college_courses");

		$this->load->view('erp/erpreceipt', $display);
	}


	public function Insreceipt()
	{
		$id = $this->input->get('Rec');
		if ($this->input->get('action') == "Ins") {
			$display['instalment'] = $this->cm->select_data("admission_installment", "admission_installment_id", $id);
			$display['admission'] = $this->cm->select_data("admission_process", "admission_id",$display['instalment']->admission_id);
			$display['next_reminder_installment'] = $this->cm->get_next_installment_reminder("admission_installment", "admission_id",$display['admission']->admission_id);
			$display['receipt_permission'] = $this->cm->select_data("receipt_permission", "branch_id", $display['admission']->branch_id);
			$display['branch_data'] = $this->cm->select_data("branch", "branch_id", $display['admission']->branch_id);
			$branch = $this->cm->select_data('branch', 'branch_id', $display['admission']->branch_id);

			if ($display['admission']->branch_id == 1) {
				$rn1q = $this->db->query("SELECT MAX(RW1) AS RW1 FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn1 =  $rn1q->result_array();
				$r1 = $rn1[0]['RW1'];
				$num = number_format($r1);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 5) {
				$rn2q = $this->db->query("SELECT MAX(RW2) AS RW2 FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn2 =  $rn2q->result_array();
				$r2 = $rn2[0]['RW2'];
				$num = number_format($r2);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 8) {
				$rn3q = $this->db->query("SELECT MAX(RW3) AS RW3 FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn3 =  $rn3q->result_array();
				$r3 = $rn3[0]['RW3'];
				$num = number_format($r3);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 3) {
				$rn4q = $this->db->query("SELECT MAX(RW4) AS RW4 FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn4 =  $rn4q->result_array();
				$r4 = $rn4[0]['RW4'];
				$num = number_format($r4);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 9) {
				$rn1bq = $this->db->query("SELECT MAX(RW1B) AS RW1B FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn1b =  $rn1bq->result_array();
				$r1b = $rn1b[0]['RW1B'];
				$num = number_format($r1b);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 10) {
				$rn1mmq = $this->db->query("SELECT MAX(rw1mm) AS rw1mm FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn1mm =  $rn1mmq->result_array();
				$r1mm = $rn1mm[0]['rw1mm'];
				$num = number_format($r1mm);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 11) {
				$rnclgq = $this->db->query("SELECT MAX(clg) AS clg FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rnclg =  $rnclgq->result_array();
				$rclg = $rnclg[0]['clg'];
				$num = number_format($rclg);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 12) {
				$rn5q = $this->db->query("SELECT MAX(RW5) AS RW5 FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn5 =  $rn5q->result_array();
				$r5 = $rn5[0]['RW5'];
				$num = number_format($r5);
				$rnw = $num + 1;
			}
			if ($display['admission']->branch_id == 1) {
				$RW1 = $rnw;
				$record = array('RW1' => $RW1);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW1 = 0;
			}

			if ($display['admission']->branch_id == 5) {
				$RW2 = $rnw;
				$record = array('RW2' => $RW2);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW2 = 0;
			}

			if ($display['admission']->branch_id == 8) {
				$RW3 = $rnw;
				$record = array('RW3' => $RW3);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW3 = 0;
			}

			if ($display['admission']->branch_id == 3) {
				$RW4 = $rnw;
				$record = array('RW4' => $RW4);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW4 = 0;
			}

			if ($display['admission']->branch_id == 9) {
				$RW1B = $rnw;
				$record = array('RW1B' => $RW1B);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW1B = 0;
			}

			if ($display['admission']->branch_id == 10) {
				$rw1mm = $rnw;
				$record = array('rw1mm' => $rw1mm);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$rw1mm = 0;
			}

			if ($display['admission']->branch_id == 11) {
				$clg = $rnw;
				$record = array('clg' => $clg);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$clg = 0;
			}

			if ($display['admission']->branch_id == 12) {
				$RW5 = $rnw;
				$record = array('RW5' => $RW5);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW5 = 0;
			}

			$receiptnumber = $branch->branch_code . "-" . $rnw;
			
			$display['receiptno'] = $receiptnumber;

			if($display['admission']->type!="COLLEGE")
			{
			  $display['receipttype'] = "Enrollment No";
			} else {
			  $display['receipttype'] = "Semester";
			}
			
			date_default_timezone_set("Asia/Calcutta");
			@$receipt_date =  date('Y-m-d');
			@$receipt_data['admission_id'] = $display['admission']->admission_id;
			@$receipt_data['branch_id'] = $display['admission']->branch_id;
			@$receipt_data['intallment_id'] = $display['instalment']->admission_installment_id;
			@$receipt_data['receipt_no'] = $receiptnumber;
			@$receipt_data['receipt_date'] = $receipt_date;
			@$receipt_data['gr_id'] = $display['admission']->gr_id;
			@$receipt_data['installment_no'] = $display['instalment']->installment_no;
			@$receipt_data['enrollment_no'] = $display['admission']->enrollment_number;
			if (@$display['admission']->type == "single") {
				@$receipt_data['course_id'] = $display['admission']->course_id;
			} else if (@$display['admission']->type == "package"){
				@$receipt_data['package_id'] = $display['admission']->package_id;
			} else {
				@$receipt_data['college_courses_id'] = $display['admission']->college_courses_id;
			}

			@$receipt_data['pay_now'] = $display['instalment']->paid_amount;
			@$receipt_data['ramrk_by'] = $display['instalment']->payment_mode;
			@$receipt_data['received_by'] = $_SESSION['user_name'];

			$this->db->insert('admissin_receipt', $receipt_data);
		}

		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['list_package'] = $this->cm->view_all("rnw_package");
		$display['list_clg_courses'] = $this->cm->view_all("college_courses");

		$this->load->view('erp/Insreceipt', $display);
	}

	public function erpProcessingCheck()
	{
		$id = $this->input->get('czyxtu');

		if ($this->input->get('action') == "cuxt") {
			$display['admission'] = $this->cm->select_data("admission_process", "admission_id", $id);
			$display['instalment'] = $this->cm->select_data("admission_installment", "admission_id", $id);
			$display['branch_data'] = $this->cm->select_data("branch", "branch_id", $display['admission']->branch_id);
			$branch = $this->cm->select_data('branch', 'branch_id', $display['admission']->branch_id);

			if ($display['admission']->branch_id == 1) {
				$rn1q = $this->db->query("SELECT MAX(processing_check_rw1) AS processing_check_rw1 FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn1 =  $rn1q->result_array();
				$r1 = $rn1[0]['processing_check_rw1'];
				$num = number_format($r1);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 5) {
				$rn2q = $this->db->query("SELECT MAX(processing_check_rw2) AS processing_check_rw2 FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn2 =  $rn2q->result_array();
				$r2 = $rn2[0]['processing_check_rw2'];
				$num = number_format($r2);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 8) {
				$rn3q = $this->db->query("SELECT MAX(processing_check_rw3) AS processing_check_rw3 FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn3 =  $rn3q->result_array();
				$r3 = $rn3[0]['processing_check_rw3'];
				$num = number_format($r3);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 3) {
				$rn4q = $this->db->query("SELECT MAX(processing_check_rw4) AS processing_check_rw4 FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn4 =  $rn4q->result_array();
				$r4 = $rn4[0]['processing_check_rw4'];
				$num = number_format($r4);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 9) {
				$rn1bq = $this->db->query("SELECT MAX(processing_check_rw1b) AS processing_check_rw1b FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn1b =  $rn1bq->result_array();
				$r1b = $rn1b[0]['processing_check_rw1b'];
				$num = number_format($r1b);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 10) {
				$rn1mmq = $this->db->query("SELECT MAX(processing_check_rw1mm) AS processing_check_rw1mm FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn1mm =  $rn1mmq->result_array();
				$r1mm = $rn1mm[0]['processing_check_rw1mm'];
				$num = number_format($r1mm);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 11) {
				$rnclgq = $this->db->query("SELECT MAX(processing_check_clg) AS processing_check_clg FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rnclg =  $rnclgq->result_array();
				$rclg = $rnclg[0]['processing_check_clg'];
				$num = number_format($rclg);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 12) {
				$rn5q = $this->db->query("SELECT MAX(processing_check_rw5) AS processing_check_rw5 FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn5 =  $rn5q->result_array();
				$r5 = $rn5[0]['processing_check_rw5'];
				$num = number_format($r5);
				$rnw = $num + 1;
			}

			if ($display['admission']->branch_id == 1) {
				$RW1 = $rnw;
				$record = array('processing_check_rw1' => $RW1);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW1 = 0;
			}

			if ($display['admission']->branch_id == 5) {
				$RW2 = $rnw;
				$record = array('processing_check_rw2' => $RW2);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW2 = 0;
			}

			if ($display['admission']->branch_id == 8) {
				$RW3 = $rnw;
				$record = array('processing_check_rw3' => $RW3);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW3 = 0;
			}

			if ($display['admission']->branch_id == 3) {
				$RW4 = $rnw;
				$record = array('processing_check_rw4' => $RW4);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW4 = 0;
			}

			if ($display['admission']->branch_id == 9) {
				$RW1B = $rnw;
				$record = array('processing_check_rw1b' => $RW1B);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW1B = 0;
			}

			if ($display['admission']->branch_id == 10) {
				$rw1mm = $rnw;
				$record = array('processing_check_rw1mm' => $rw1mm);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$rw1mm = 0;
			}

			if ($display['admission']->branch_id == 11) {
				$clg = $rnw;
				$record = array('processing_check_clg' => $clg);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$clg = 0;
			}

			if ($display['admission']->branch_id == 12) {
				$RW5 = $rnw;
				$record = array('processing_check_rw5' => $RW5);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW5 = 0;
			}

			$receiptnumber = $branch->branch_code . "-" . $rnw;

			$display['receiptno'] = $receiptnumber;

			date_default_timezone_set("Asia/Calcutta");
			@$receipt_date =  date('Y-m-d');
			@$receipt_data['admission_id'] = $display['admission']->admission_id;
			@$receipt_data['branch_id'] = $display['admission']->branch_id;
			@$receipt_data['intallment_id'] = $display['instalment']->admission_installment_id;
			@$receipt_data['receipt_no'] = $receiptnumber;
			@$receipt_data['receipt_date'] = $receipt_date;
			@$receipt_data['gr_id'] = $display['admission']->gr_id;
			@$receipt_data['installment_no'] = $display['instalment']->installment_no;
			@$receipt_data['enrollment_no'] = $display['admission']->enrollment_number;
			if (@$display['admission']->type == "single") {
				@$receipt_data['course_id'] = $display['admission']->course_id;
			} else if (@$display['admission']->type == "package"){
				@$receipt_data['package_id'] = $display['admission']->package_id;
			} else {
				@$receipt_data['college_courses_id'] = $display['admission']->college_courses_id;
			}

			@$receipt_data['pay_now'] = $display['instalment']->due_amount;
			@$receipt_data['ramrk_by'] = $display['instalment']->payment_mode;
			@$receipt_data['status_for_cheque'] = "Cheque Collected";
			@$receipt_data['received_by'] = $_SESSION['user_name'];
			@$receipt_data['holder_name'] = $display['instalment']->cheque_holder_name;

			$this->db->insert('processing_check_receipt', $receipt_data);
		}

		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['list_package'] = $this->cm->view_all("rnw_package");
		$display['list_clg_courses'] = $this->cm->view_all("college_courses");

		$this->load->view('erp/erpProcessingCheck', $display);
	}

	public function insproccessiongcheck()
	{
		$id = $this->input->get('procheck');
		if ($this->input->get('action') == "ins") {
			$display['instalment'] = $this->cm->select_data("admission_installment", "admission_installment_id",$id);
			$display['admission'] = $this->cm->select_data("admission_process", "admission_id",$display['instalment']->admission_id);
			$display['branch_data'] = $this->cm->select_data("branch", "branch_id", $display['admission']->branch_id);
			$branch = $this->cm->select_data('branch', 'branch_id', $display['admission']->branch_id);

			if ($display['admission']->branch_id == 1) {
				$rn1q = $this->db->query("SELECT MAX(processing_check_rw1) AS processing_check_rw1 FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn1 =  $rn1q->result_array();
				$r1 = $rn1[0]['processing_check_rw1'];
				$num = number_format($r1);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 5) {
				$rn2q = $this->db->query("SELECT MAX(processing_check_rw2) AS processing_check_rw2 FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn2 =  $rn2q->result_array();
				$r2 = $rn2[0]['processing_check_rw2'];
				$num = number_format($r2);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 8) {
				$rn3q = $this->db->query("SELECT MAX(processing_check_rw3) AS processing_check_rw3 FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn3 =  $rn3q->result_array();
				$r3 = $rn3[0]['processing_check_rw3'];
				$num = number_format($r3);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 3) {
				$rn4q = $this->db->query("SELECT MAX(processing_check_rw4) AS processing_check_rw4 FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn4 =  $rn4q->result_array();
				$r4 = $rn4[0]['processing_check_rw4'];
				$num = number_format($r4);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 9) {
				$rn1bq = $this->db->query("SELECT MAX(processing_check_rw1b) AS processing_check_rw1b FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn1b =  $rn1bq->result_array();
				$r1b = $rn1b[0]['processing_check_rw1b'];
				$num = number_format($r1b);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 10) {
				$rn1mmq = $this->db->query("SELECT MAX(processing_check_rw1mm) AS processing_check_rw1mm FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn1mm =  $rn1mmq->result_array();
				$r1mm = $rn1mm[0]['processing_check_rw1mm'];
				$num = number_format($r1mm);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 11) {
				$rnclgq = $this->db->query("SELECT MAX(processing_check_clg) AS processing_check_clg FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rnclg =  $rnclgq->result_array();
				$rclg = $rnclg[0]['processing_check_clg'];
				$num = number_format($rclg);
				$rnw = $num + 1;
			} else if ($display['admission']->branch_id == 12) {
				$rn5q = $this->db->query("SELECT MAX(processing_check_rw5) AS processing_check_rw5 FROM admission_installment ORDER BY admission_installment_id DESC LIMIT 1");
				$rn5 =  $rn5q->result_array();
				$r5 = $rn5[0]['processing_check_rw5'];
				$num = number_format($r5);
				$rnw = $num + 1;
			}

			if ($display['admission']->branch_id == 1) {
				$RW1 = $rnw;
				$record = array('processing_check_rw1' => $RW1);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW1 = 0;
			}

			if ($display['admission']->branch_id == 5) {
				$RW2 = $rnw;
				$record = array('processing_check_rw2' => $RW2);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW2 = 0;
			}

			if ($display['admission']->branch_id == 8) {
				$RW3 = $rnw;
				$record = array('processing_check_rw3' => $RW3);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW3 = 0;
			}

			if ($display['admission']->branch_id == 3) {
				$RW4 = $rnw;
				$record = array('processing_check_rw4' => $RW4);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW4 = 0;
			}

			if ($display['admission']->branch_id == 9) {
				$RW1B = $rnw;
				$record = array('processing_check_rw1b' => $RW1B);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW1B = 0;
			}

			if ($display['admission']->branch_id == 10) {
				$rw1mm = $rnw;
				$record = array('processing_check_rw1mm' => $rw1mm);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$rw1mm = 0;
			}

			if ($display['admission']->branch_id == 11) {
				$clg = $rnw;
				$record = array('processing_check_clg' => $clg);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$clg = 0;
			}

			if ($display['admission']->branch_id == 12) {
				$RW5 = $rnw;
				$record = array('processing_check_rw5' => $RW5);
				$this->admi->generate_receipt_record('admission_installment', $record, 'admission_installment_id', $display['instalment']->admission_installment_id);
			} else {
				$RW5 = 0;
			}

			$receiptnumber = $branch->branch_code . "-" . $rnw;

			$display['receiptno'] = $receiptnumber;

			date_default_timezone_set("Asia/Calcutta");
			@$receipt_date =  date('Y-m-d');
			@$receipt_data['admission_id'] = $display['admission']->admission_id;
			@$receipt_data['branch_id'] = $display['admission']->branch_id;
			@$receipt_data['intallment_id'] = $display['instalment']->admission_installment_id;
			@$receipt_data['receipt_no'] = $receiptnumber;
			@$receipt_data['receipt_date'] = $receipt_date;
			@$receipt_data['gr_id'] = $display['admission']->gr_id;
			@$receipt_data['installment_no'] = $display['instalment']->installment_no;
			@$receipt_data['enrollment_no'] = $display['admission']->enrollment_number;
			if (@$display['admission']->type == "single") {
				@$receipt_data['course_id'] = $display['admission']->course_id;
			} else if (@$display['admission']->type == "package"){
				@$receipt_data['package_id'] = $display['admission']->package_id;
			} else {
				@$receipt_data['college_courses_id'] = $display['admission']->college_courses_id;
			}

			@$receipt_data['pay_now'] = $display['instalment']->due_amount;
			@$receipt_data['ramrk_by'] = $display['instalment']->payment_mode;
			@$receipt_data['status_for_cheque'] = "Cheque Collected";
			@$receipt_data['received_by'] = $_SESSION['user_name'];
			@$receipt_data['holder_name'] = $display['instalment']->cheque_holder_name;

			$this->db->insert('processing_check_receipt', $receipt_data);
		}

		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['list_package'] = $this->cm->view_all("rnw_package");
		$display['list_clg_courses'] = $this->cm->view_all("college_courses");

		$this->load->view('erp/insproccessiongcheck', $display);
	}

	public function ErpCourse_completed()
	{
		date_default_timezone_set("Asia/Calcutta");
		$data = $this->input->post();
		$created_date = date('Y-m-d h:i A');
		$course_completed_date = date('Y-m-d');
		$created_by = $_SESSION['user_name'];
		$remarksdate = date('Y-m-d');
		$remarkstime = date('h:i A');
		$label = "Course ".$data['admission_courses_status'];

		for ($i = 0; $i < sizeof($data['admission_courses_id']); $i++) {

			$batches = $this->admi->view_all('admission_courses');

			foreach ($batches as $dn) {
				$flag = 0;

				$dnbi  = explode(',', $data['admission_courses_id'][$i]);

				if (in_array($dn['admission_courses_id'], $dnbi)) {
					$flag = 1;
				}

				if ($flag == 1) {
					$remarksdata = array('admission_id' => $dn['admission_id'], 'labels' => $label, 'admission_remrak' => $data['admission_remrak'], 'remarks_date' => $remarksdate, 'remarks_time' => $remarkstime, 'addby' => $created_by);

					$this->admi->save_data('admission_remarks', $remarksdata);

					$admission_courses_id = $dn['admission_courses_id'];

					$record = array('admission_courses_status' => $data['admission_courses_status'], 'course_completed_date' => $course_completed_date, 'created_by' => $created_by);

					$result = $this->admi->batch_course_status('admission_courses', $record, 'admission_courses_id', $admission_courses_id);

					if ($result) {
						$status_check = 1;
					} else {
						$status_check = 0;
					}
				}
			}
		}

		if ($status_check == 1) {
			$record = array('status' => 1, "msg" => "HI! Your Course Is Now Completed.");
			$recp['all_record'] = $record;
			echo json_encode($recp);
		} else {
			$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp);
		}
	}

	public function ErpAdmission_completed()
	{
		date_default_timezone_set("Asia/Calcutta");
		$data = $this->input->post();
		$created_date = date('Y-m-d h:i A');
		$created_by = $_SESSION['user_name'];
		$remarksdate = date('m-d-Y');
		$remarkstime = date('h:i A');

		$records = array('admission_id' => $data['admission_id'], 'admission_remrak' => $data['admission_remrak'], 'remarks_date' => $remarksdate, 'dropdown_adm_id' => $data['remarks_status_id'], 'remarks_time' => $remarkstime, 'addby' => $created_by);

		$this->admi->save_data('admission_remarks', $records);

		$admission_id = $data['admission_id'];
		$admission_status = "Completed";

		$record = array('admission_status' => $admission_status, 'completed_date' => date("Y-m-d", strtotime($data['admission_completed_date'])));

		$result = $this->admi->update_admission_status_record('admission_process', $record, 'admission_id', $admission_id);

		if ($result) {
			$record = array('status' => 1, "msg" => "HI! Your Admission Is Now Completed.");
			$recp['all_record'] = $record;
			echo json_encode($recp);
		} else {
			$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp);
		}
	}

	public function ErpUpdated_Course_Details()
	{
		$data = $this->input->post();

		if (empty($data['admission_id'])) {
			$admission_id = $data['admission_id'] = "";
		} else {
			$admission_id = $data['admission_id'];
		}

		if (empty($data['type'])) {
			$type = $data['type'] = "";
		} else {
			$type = $data['type'];
		}

		if (empty($data['course_id'])) {
			$course_id = $data['course_id'] = "";
		} else {
			$course_id = implode(',', $data['course_id']);
			$co = $this->cm->select_data('course', 'course_id', $course_id);
			$year = $co->session;
			$department_id = $co->department_id;
			$subdepartment_id = $co->subdepart_ids;
		}

		if (empty($data['package_id'])) {
			$package_id = $data['package_id'] = "";
		} else {
			$package_id = implode(',', $data['package_id']);
			$pa = $this->cm->select_data('package', 'package_id', $package_id);
			$year = $pa->session;
			$department_id = $pa->department_id;
			$subdepartment_id = $pa->subdepart_ids;
		}

		if (@$data['submit'] == 'Upd Admission') {
			$admission_id = '';
		} else {
			$admission_id = $data['admission_id'];
		}

		$record = array('admission_id' => $admission_id, 'branch_id' => $data['branch_id'], 'year' => $year, 'department_id' => $department_id, 'subdepartment_id' => $subdepartment_id, 'type' => $type, 'course_id' => $course_id, 'package_id' => $package_id);

		if (!empty($admission_id)) {
			$old_record['re'] =  $this->admi->get_old_admission_record('admission_process', 'admission_id', $admission_id);

			if (@$old_record['re']->branch_id == @$data['branch_id']) {
				$up_admission_branch = $data['branch_id'] . "&#nochange";
			} else {
				$up_admission_branch = $data['branch_id'] . "&#change";
			}

			if (@$old_record['re']->year == @$year) {
				$up_year = $year . "&#nochange";
			} else {
				$up_year = $year . "&#change";
			}

			if (@$old_record['re']->department_id == $department_id) {
				$up_department_id = $department_id . "&#nochange";
			} else {
				$up_department_id = $department_id . "&#change";
			}

			if (@$old_record['re']->subdepartment_id == $subdepartment_id) {
				$up_subdepartment_id = $subdepartment_id . "&#nochange";
			} else {
				$up_subdepartment_id = $subdepartment_id . "&#change";
			}

			if (@$old_record['re']->type == @$data['type']) {
				$up_type = $data['type'] . "&#nochange";
			} else {
				$up_type = $data['type'] . "&#change";
			}

			if (empty($data['course_id'])) {
				$courses = $data['course_id'] = "";
			} else {
				$courses = implode(',', $data['course_id']);
			}
			if (@$old_record['re']->course_id == $courses) {
				$up_course_id = $courses . "&#nochange";
			} else {
				$up_course_id = $courses . "&#change";
			}
			if (empty($data['package_id'])) {
				$package = $data['package_id'] = "";
			} else {
				$package = implode(',', $data['package_id']);
			}
			if (@$old_record['re']->package_id == $package) {
				$up_package_id = $package . "&#nochange";
			} else {
				$up_package_id = $package . "&#change";
			}

			date_default_timezone_set("Asia/Calcutta");
			$admission_upd_date = date('Y-m-d h:i A');

			$re = $this->admi->update_admission_record('admission_process', $record, 'admission_id', $admission_id);
			if ($re) {
				$history_record  = array('admission_id' => $admission_id, 'branch_id' => $up_admission_branch, 'year' => $up_year, 'department_id' => $up_department_id, 'subdepartment_id' => $up_subdepartment_id, 'type' => $up_type, 'course_id' => $up_course_id, 'package_id' => $up_package_id, 'admission_upd_date' => @$admission_upd_date);

				$this->admi->quick_adm_data('history_adm_cp', $history_record);
			}
			$st = 1;
			if ($st == 1) {
				$record = array('status' => 1, "msg" => "HI! Your Admission Is Now Completed.");
				$recp['all_record'] = $record;
				echo json_encode($recp);
			}
		} else {
			$check_ep =  $this->admi->check_record_alerady('admission_process', $record);

			if ($check_ep == 0) {
				$re =  $this->admi->quick_adm_data('admission_process', $record);
				if ($re) {
					$history_record  = array('admission_id' => @$re, 'branch_id' => $data['branch_ids'] . "&#nochange", 'year' => $year . "&#nochange", 'department_id' => $department_id . "&#nochange", 'subdepartment_id' => $subdepartment_id . "&#nochange", 'type' => $type . "&#nochange", 'course_id' => $course_id . "&#nochange", 'package_id' => $package_id . "&#nochange", 'admission_upd_date' => @$admission_upd_date);

					$this->admi->quick_adm_data('history_adm_cp', $history_record);
				}

				$st = 2;
				echo $st;
			} else {
				$st = 0;
				echo $st;
			}
		}
	}

	public function erpidcard()
	{
		$display['all_idcard_data'] = $this->cm->view_all("id_card");
		$display['list_department'] = $this->cm->view_all("department");
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
		$this->load->view('erp/erpidcard',$display);
	}

	public function ajax_idcard()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();
	
			date_default_timezone_set('Asia/Kolkata');
			$data['created_date'] = date('Y-m-d h:i:s');
			$data['created_by'] = $_SESSION['user_name'];
			unset($data['submit']);
			
			$config['allowed_types'] = "*";
			$config['upload_path'] = FCPATH . "dist/branchlogo/";
			$new_name = time() . @$_FILES["logo"]['name'];
			$config['file_name'] = $new_name;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('logo')) {
				$imagedata = $this->upload->data();
				$data['logo'] = $imagedata['file_name'];
				$config['image_library'] = 'gd2';
				$config['source_image'] = './dist/branchlogo/' . $imagedata['file_name'];
				$config['new_image'] = './dist/branchlogo/';
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

			if ($this->input->post('idcard_id')) {
				$id = $this->input->post('idcard_id');
				unset($data['idcard_id']);
				$query = $this->admi->expenses_record_upd('id_card', $data, 'idcard_id', $id);
				if ($query) {
					$recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			} else {
				unset($data['idcard_id']); 
				$query = $this->admi->import_expenses('id_card', $data);
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

	public function get_record_idcard()
	{
		$id = $this->input->post('idcard_id');
		$record['single_record'] = $this->admi->get_single_reco('id_card', 'idcard_id', $id);
		echo json_encode($record);
	}

	public function remove_idcardrow() {
        $id = $this->input->post('idcard_id');
        $query = $this->admi->delete_topic('id_card', 'idcard_id', $id);
        if ($query) {
			$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Deleted");
			echo json_encode($recp); // echo "1";
		} else {
			$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
			echo json_encode($recp); // echo "2";
		}
    }

	public function receipt_view()
	{
		$id = $this->input->get('qwxy');

		if ($this->input->get('action') == "hjkl") {
			$display['instalment'] = $this->cm->select_data("admission_installment", "admission_installment_id", $id);
			$display['next_reminder_installment'] = $this->cm->get_next_installment_reminder("admission_installment", "admission_id",$id);
			$display['receipt_data'] = $this->cm->select_data("admissin_receipt", "intallment_id", $id);
			$display['admission'] = $this->cm->select_data("admission_process", "admission_id", $display['instalment']->admission_id);
			$display['receipt_permission'] = $this->cm->select_data("receipt_permission", "branch_id", $display['admission']->branch_id);
			$display['branch_data'] = $this->cm->select_data("branch", "branch_id", $display['admission']->branch_id);
			$branch = $this->cm->select_data('branch', 'branch_id', $display['admission']->branch_id);
		}

		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['list_package'] = $this->cm->view_all("rnw_package");
		$display['list_clg_courses'] = $this->cm->view_all("college_courses");

		$this->load->view('erp/receipt_view', $display);
	}

	public function ErpUpdAdm_Data($ids = '')
	{
		// echo $this->input->post('ErpAdmissionId');
		// exit;
		if (!empty($this->input->post('upd_record'))) {
			$data = $this->input->post();

			$admdata = $this->cm->select_data("admission_process", "admission_id", $data['Admission_id']);
			$docdata = $this->cm->select_data('admission_documents', 'admission_id', $data['Admission_id']);

			// echo "<pre>";
			// print_r($docdata->documents_id);
			// exit;

			if (empty($data['due_amount'])) {
				$d_amount = $data['due_amount'] = "";	
			} else {
				$d_amount = $data['due_amount'];
			}

			if (empty($data['paid_amount'])) {
				$p_amount = $data['paid_amount'] = "";
			} else {
				$p_amount = $data['paid_amount'];
			}

			if (empty($data['installment_no'])) {
				$intsall_no = $data['installment_no'] = "";
			} else {
				$intsall_no = $data['installment_no'];
			}

			$i = 0;
			foreach ($data['installment_date'] as $key => $value) {
				date_default_timezone_set("Asia/Calcutta");
				$date = date("Y-m-d", strtotime($value));
				$intalment_record['installment_date'] = $date;
				$intalment_record['installment_no'] = $intsall_no[$i];
				$intalment_record['due_amount'] = $d_amount[$i];
				$intalment_record['paid_amount'] = $p_amount[$i];
				$intalment_record['admission_id'] = $data['Admission_id'];
				$intalment_record['branch_id'] = $data['Branch_id'];
				$intalment_record['registration_fees'] = $admdata->registration_fees;

				$i++;
				$this->db->insert('admission_installment', $intalment_record);
			}

			if ($_FILES['photos']['name'] != "") {
				$config['allowed_types'] = "*";
				$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
				$new_name = time() . $_FILES["photos"]['name'];
				$config['file_name'] = $new_name;
				$this->load->library('upload');
				$this->upload->initialize($config);

				if ($this->upload->do_upload('photos')) {
					$imagedata = $this->upload->data();
					$import_data['photos'] = !empty($imagedata['file_name'])?$imagedata['file_name']:'';
					$config['image_library'] = 'gd2';
					$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
					$config['new_image'] = './dist/admissiondocuments/';
					$config['maintain_ratio'] = TRUE;
					$config['width']    = 640;
					$config['height']   = 480;

					$this->load->library('image_lib', $config);

					if (!$this->image_lib->resize()) {
						echo $this->image_lib->display_errors();
					} else {
						echo "success"; 
					}
				} else {
					$display['msgp'] = "image not uploaded";
				}
			}

			if (@$_FILES['tenth_marksheet']['name'] != "") {
				$config['allowed_types'] = "*";
				$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
				$new_name = time() . $_FILES["tenth_marksheet"]['name'];
				$config['file_name'] = $new_name;
				$this->load->library('upload');
				$this->upload->initialize($config);

				if ($this->upload->do_upload('tenth_marksheet')) {
					$imagedata = $this->upload->data();
					$import_data['tenth_marksheet'] = !empty($imagedata['file_name'])?$imagedata['file_name']:'';
					$config['image_library'] = 'gd2';
					$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
					$config['new_image'] = './dist/admissiondocuments/';
					$config['maintain_ratio'] = TRUE;
					$config['width']    = 640;
					$config['height']   = 480;

					$this->load->library('image_lib', $config);

					if (!$this->image_lib->resize()) {
						echo $this->image_lib->display_errors();
					} else {
						echo "success"; 
					}
				} else {
					$display['msgp'] = "image not uploaded";
				}
			}

			if (@$_FILES['twelfth_marksheet']['name'] != "") {
				$config['allowed_types'] = "*";
				$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
				$new_name = time() . $_FILES["twelfth_marksheet"]['name'];
				$config['file_name'] = $new_name;
				$this->load->library('upload');
				$this->upload->initialize($config);

				if ($this->upload->do_upload('twelfth_marksheet')) {
					$imagedata = $this->upload->data();
					$import_data['twelfth_marksheet'] = !empty($imagedata['file_name'])?$imagedata['file_name']:'';
					$config['image_library'] = 'gd2';
					$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
					$config['new_image'] = './dist/admissiondocuments/';
					$config['maintain_ratio'] = TRUE;
					$config['width']    = 640;
					$config['height']   = 480;

					$this->load->library('image_lib', $config);

					if (!$this->image_lib->resize()) {
						echo $this->image_lib->display_errors();
					} else {
						echo "success"; 
					}
				} else {
					$display['msgp'] = "image not uploaded";
				}
			}

			if (@$_FILES['leaving_certy']['name'] != "") {

				$config['allowed_types'] = "*";
				$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
				$new_name = time() . $_FILES["leaving_certy"]['name'];
				$config['file_name'] = $new_name;
				$this->load->library('upload');
				$this->upload->initialize($config);

				if ($this->upload->do_upload('leaving_certy')) {
					$imagedata = $this->upload->data();
					$import_data['leaving_certy'] = !empty($imagedata['file_name'])?$imagedata['file_name']:'';
					$config['image_library'] = 'gd2';
					$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
					$config['new_image'] = './dist/admissiondocuments/';
					$config['maintain_ratio'] = TRUE;
					$config['width']    = 640;
					$config['height']   = 480;

					$this->load->library('image_lib', $config);

					if (!$this->image_lib->resize()) {
						echo $this->image_lib->display_errors();
					} else {
						echo "success"; 
					}
				} else {
					$display['msgp'] = "image not uploaded";
				}
			}

			if (@$_FILES['treal_certy']['name'] != "") {
				$config['allowed_types'] = "*";
				$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
				$new_name = time() . $_FILES["treal_certy"]['name'];
				$config['file_name'] = $new_name;
				$this->load->library('upload');
				$this->upload->initialize($config);

				if ($this->upload->do_upload('treal_certy')) {
					$imagedata = $this->upload->data();
					$import_data['treal_certy'] = !empty($imagedata['file_name'])?$imagedata['file_name']:'';
					$config['image_library'] = 'gd2';
					$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
					$config['new_image'] = './dist/admissiondocuments/';
					$config['maintain_ratio'] = TRUE;
					$config['width']    = 640;
					$config['height']   = 480;

					$this->load->library('image_lib', $config);

					if (!$this->image_lib->resize()) {
						echo $this->image_lib->display_errors();
					} else {
						echo "success"; 
					}
				} else {
					$display['msgp'] = "image not uploaded";
				}
			}

			if (@$_FILES['light_bill']['name'] != "") {
				$config['allowed_types'] = "*";
				$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
				$new_name = time() . $_FILES["light_bill"]['name'];
				$config['file_name'] = $new_name;
				$this->load->library('upload');
				$this->upload->initialize($config);

				if ($this->upload->do_upload('light_bill')) {
					$imagedata = $this->upload->data();
					$import_data['light_bill'] = !empty($imagedata['file_name'])?$imagedata['file_name']:'';
					$config['image_library'] = 'gd2';
					$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
					$config['new_image'] = './dist/admissiondocuments/';
					$config['maintain_ratio'] = TRUE;
					$config['width']    = 640;
					$config['height']   = 480;

					$this->load->library('image_lib', $config);

					if (!$this->image_lib->resize()) {
						echo $this->image_lib->display_errors();
					} else {
						echo "success"; 
					}
				} else {
					$display['msgp'] = "image not uploaded";
				}
			}

			if (@$_FILES['aadhar_card']['name'] != "") {
				$config['allowed_types'] = "*";
				$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
				$new_name = time() . $_FILES["aadhar_card"]['name'];
				$config['file_name'] = $new_name;
				$this->load->library('upload');
				$this->upload->initialize($config);

				if ($this->upload->do_upload('aadhar_card')) {
					$imagedata = $this->upload->data();
					$import_data['aadhar_card'] = !empty($imagedata['file_name'])?$imagedata['file_name']:'';
					$config['image_library'] = 'gd2';
					$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
					$config['new_image'] = './dist/admissiondocuments/';
					$config['maintain_ratio'] = TRUE;
					$config['width']    = 640;
					$config['height']   = 480;

					$this->load->library('image_lib', $config);

					if (!$this->image_lib->resize()) {
						echo $this->image_lib->display_errors();
					} else {
						echo "success"; 
					}
				} else {
					$display['msgp'] = "image not uploaded";
				}
			}

			$this->admi->update_data('admission_documents', $import_data, 'documents_id', $docdata->documents_id);

			$record = array(
				'present_flate_house_no'=>$data['present_house_building_no'],'present_area_street'=>$data['present_street_area'],'present_landmark'=>$data['present_landmark_colony'],'present_country_id'=>'india', 'present_state_id' => $data['present_city_id'], 'present_city_id' => $data['present_city_id'], 'present_area_id' => $data['present_area_id'],
				'present_pin_code' => $data['present_pin_code'], 'permanent_flate_house_no'=>$data['permanent_house_building_no'],'permanent_area_street'=>$data['permanent_street_area'],'permanent_landmark'=>$data['permanent_landmark_colony'],'permanent_pin_code'=>$data['permanent_pin_code'],'permanent_country_id'=>'india','permanent_state_id'=>$data['permanent_state_id'],'permanent_city_id'=>$data['permanent_city_id'],'permanent_area_id'=>$data['permanent_area_id'],
				'father_name' => $data['father_name'], 'father_email' => $data['father_email'], 'father_mobile_no' => $data['father_mobile_no'],
				'father_occupation' => $data['father_occupation'], 'father_income' => $data['father_income'], 'mother_name' => $data['mother_name'],
				'mother_email' => $data['mother_email'], 'mother_mobile_no' => $data['mother_mobile_no'], 'mother_occupation' => $data['mother_occupation'],
				'mother_income' => $data['mother_income'], 'school_collage_name' => $data['school_collage_name'],
				'school_clg_state' => $data['school_clg_state'], 'school_clg_city' => $data['school_clg_city'], 'school_clg_area' => $data['school_clg_area'],
				'school_collage_type' => $data['school_collage_type'] , 'admission_type' => "Full");

			$re = $this->admi->update_data('admission_process', $record, 'admission_id', $data['Admission_id']);
			if ($re) {
				 $ids = $this->input->post('ErpAdmissionId');
				// exit;
				redirect("Admission/ErpUpdAdm_Data/$ids");
			}
		}
		$display['admission_record'] = $this->cm->select_data("admission_process", "admission_id", $ids);
		$display['docrecord'] = $this->cm->select_data("admission_documents", "admission_id", $ids);
		// echo "<pre>";
		 if(@$display['admission_record']->type == 'package'){
		 	$showData = $this->cm->getPackageCourseRecord('rnw_package','package_id',$display['admission_record']->package_id);
		}else{
		 	$showData = $this->cm->getPackageCourseRecord('rnw_course','course_id',$display['admission_record']->course_id);
		}

		$data_record = array('department_id'=>$showData->department_id,'branch_id'=>$display['admission_record']->branch_id,'type'=>$display['admission_record']->type);
		
		$data_record = array('department_id'=>$showData->department_id,'branch_id'=>$display['admission_record']->branch_id);
		
		$all_record_data = $this->cm->getDocumentRecord('admission_documents_permission',$data_record);

		$display['document_list'] =  $all_record_data;
		
		$display['list_country'] = $this->cm->view_all("country");
		$display['list_state'] = $this->cm->view_all("state");
		$display['list_city'] = $this->cm->view_all("cities");
		$display['list_area'] = $this->cm->view_all("area");
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
		$this->load->view('erp/ErpUpdAdm_Data', $display);
	}

	public function ErpUpdAdm_installment()
	{
		$record['data'] =  array(
			'admission_id' => $this->input->post('admission_id'),
			'tution_fee' => $this->input->post('tution_fee'),
			'registration_fee' => $this->input->post('reg_fees'),
			'no_of_installment' => $this->input->post('no_of_install')
		);
		$this->load->view('erp/ErpUpdAdm_installment', $record);
	}

	public function Ufillup_NewInstallment()
	{
		$record['data'] =  array(
			'tution_fee' => $this->input->post('tution_fee'),
			'registration_fee' => $this->input->post('reg_fees'),
			'no_of_installment' => $this->input->post('no_of_install')
		);
		$this->load->view('erp/Ufillup_NewInstallment', $record);
	}


	public function erpprintidcard($data)
	{
		$display['list_admission'] = $this->cm->erpicard_data('admission_process', 'admission_id', $data);
		$display['list_id_card'] = $this->cm->erpicard_data('id_card', 'department_id',$display['list_admission']->department_id);
		$display['list_doc'] = $this->cm->erpicard_data('admission_documents', 'admission_id', $data);
		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['list_subcourse'] = $this->cm->view_all("rnw_subcourse");
		$display['list_package'] = $this->cm->view_all("rnw_package");
		$display['list_subpackage'] = $this->cm->view_all("rnw_subpackage");
		$display['all_college_courses'] = $this->cm->view_all("college_courses");

		$this->load->view('erp/erpprintidcard', $display);
	}

	public function Upd_Fees_Installment()
	{
		$id = $this->input->post('admission_id');
		$record['multiple_record'] = $this->admi->get_reco_multiple("admission_installment", "admission_id", $id);
		echo json_encode($record);
	}

	public function Updcofees($ids='')
	{
		$display['main_reco'] = $this->cm->select_data("admission_process", "admission_id", $ids);
		$display['multiple_record'] = $this->admi->get_reco_multiple("admission_installment", "admission_id", $ids);
		$display['single_reco'] = $this->cm->select_data('admission_installment','admission_id', $ids);
		$display['last_reco'] = $this->admi->fetch_last_instdata('admission_installment','admission_id', $ids);
		$display['multiple_record_co'] = $this->admi->get_reco_multiple("admission_courses", "admission_id", $ids);
		$display['single_reco_co'] = $this->cm->select_data('admission_courses','admission_id', $ids);
		$display['course_all'] = $this->cm->view_all("rnw_course");
		$display['subcourse_all'] = $this->cm->view_all("rnw_subcourse");
		$display['package_all'] = $this->cm->view_all("rnw_package");
        $update['f_module'] = $this->cm->view_all("f_module");
		$update['m_module'] = $this->cm->view_all("m_module");
		$update['l_module'] = $this->cm->view_all("l_module");
		$update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
		$update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
		$update['course_completed'] = $this->cm->course_completed_student("admission_courses");
		$update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
		$update['course_data'] = $this->cm->view_all("course");
	
		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/Updcofees', $display);
	}

	public function Quick_Installment()
	{
		$data = $this->input->post();
		if (empty($data['admission_id'])) {
			$admission_id = $data['admission_id'] = "";
		} else {
			$admission_id = $data['admission_id'];
		}
		if (empty($data['registration_fees'])) {
			$registration_fees = $data['registration_fees'] = "";
		} else {
			$registration_fees = $data['registration_fees'];
		}
		if (empty($data['due_amount'])) {
			$d_amount = $data['due_amount'] = "";
		} else {
			$d_amount = $data['due_amount'];
		}

		if (empty($data['paid_amount'])) {
			$p_amount = $data['paid_amount'] = "";
		} else {
			$p_amount = $data['paid_amount'];
		}

		if (empty($data['installment_no'])) {
			$intsall_no = $data['installment_no'] = "";
		} else {
			$intsall_no = $data['installment_no'];
		}

		$i = 0;
		foreach ($data['installment_date'] as $key => $value) {
			date_default_timezone_set("Asia/Calcutta");
			$date = date("Y-m-d", strtotime($value));
			$intalment_record['installment_date'] = $date;
			$intalment_record['installment_no'] = $intsall_no[$i];
			$intalment_record['due_amount'] = $d_amount[$i];
			$intalment_record['paid_amount'] = $p_amount[$i];
			$intalment_record['admission_id'] = $admission_id;
			$intalment_record['registration_fees'] = $registration_fees;

			$i++;
			
			$this->db->insert('admission_installment', $intalment_record);
		}
		$st = 1;
		if ($st==1) {
			$record = array('status' => 1, "msg" => "Created All Installment.");
			$recp['all_record'] = $record;
			echo json_encode($recp);
		} else {
			$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
			echo json_encode($recp);
		}

	}

	public function Upd_document()
	{
		$id = $this->input->post('admission_id');
		$data['get_record'] = $this->cm->select_data("admission_process", "admission_id", $id);
		$this->load->view('erp/Upd_Document', $data);
	}

	public function Unfill_Doc()
	{
		$data = $this->input->post();	
		$id = $this->input->post('upd_admission_id');
	
	     $docdata = $this->cm->select_data('admission_documents','admission_id',$id);
	
			if ($_FILES['photos']['name'] != "") {
			$config['allowed_types'] = "*";
			$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
			$new_name = time() . $_FILES["photos"]['name'];
			$config['file_name'] = $new_name;
			$this->load->library('upload');
			$this->upload->initialize($config);

			if ($this->upload->do_upload('photos')) {
				$imagedata = $this->upload->data();
				$import_data['photos'] = $imagedata['file_name'];
				$config['image_library'] = 'gd2';
				$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
				$config['new_image'] = './dist/admissiondocuments/';
				$config['maintain_ratio'] = TRUE;
				$config['width']    = 640;
				$config['height']   = 480;

				$this->load->library('image_lib', $config);

					
			} else {
				$display['msgp'] = "image not uploaded";
			}
		}

		if ($_FILES['tenth_marksheet']['name'] != "") {
			$config['allowed_types'] = "*";
			$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
			$new_name = time() . $_FILES["tenth_marksheet"]['name'];
			$config['file_name'] = $new_name;
			$this->load->library('upload');
			$this->upload->initialize($config);

			if ($this->upload->do_upload('tenth_marksheet')) {
				$imagedata = $this->upload->data();
				$import_data['tenth_marksheet'] = $imagedata['file_name'];
				$config['image_library'] = 'gd2';
				$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
				$config['new_image'] = './dist/admissiondocuments/';
				$config['maintain_ratio'] = TRUE;
				$config['width']    = 640;
				$config['height']   = 480;

				$this->load->library('image_lib', $config);

				
			} else {
				$display['msgp'] = "image not uploaded";
			}
		}

		if ($_FILES['twelfth_marksheet']['name'] != "") {
			$config['allowed_types'] = "*";
			$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
			$new_name = time() . $_FILES["twelfth_marksheet"]['name'];
			$config['file_name'] = $new_name;
			$this->load->library('upload');
			$this->upload->initialize($config);

			if ($this->upload->do_upload('twelfth_marksheet')) {
				$imagedata = $this->upload->data();
				$import_data['twelfth_marksheet'] = $imagedata['file_name'];
				$config['image_library'] = 'gd2';
				$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
				$config['new_image'] = './dist/admissiondocuments/';
				$config['maintain_ratio'] = TRUE;
				$config['width']    = 640;
				$config['height']   = 480;

				$this->load->library('image_lib', $config);

				
			} else {
				$display['msgp'] = "image not uploaded";
			}
		}

		if ($_FILES['leaving_certy']['name'] != "") {

			$config['allowed_types'] = "*";
			$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
			$new_name = time() . $_FILES["leaving_certy"]['name'];
			$config['file_name'] = $new_name;
			$this->load->library('upload');
			$this->upload->initialize($config);

			if ($this->upload->do_upload('leaving_certy')) {
				$imagedata = $this->upload->data();
				$import_data['leaving_certy'] = $imagedata['file_name'];
				$config['image_library'] = 'gd2';
				$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
				$config['new_image'] = './dist/admissiondocuments/';
				$config['maintain_ratio'] = TRUE;
				$config['width']    = 640;
				$config['height']   = 480;

				$this->load->library('image_lib', $config);

				
			} else {
				$display['msgp'] = "image not uploaded";
			}
		}

		if ($_FILES['treal_certy']['name'] != "") {
			$config['allowed_types'] = "*";
			$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
			$new_name = time() . $_FILES["treal_certy"]['name'];
			$config['file_name'] = $new_name;
			$this->load->library('upload');
			$this->upload->initialize($config);

			if ($this->upload->do_upload('treal_certy')) {
				$imagedata = $this->upload->data();
				$import_data['treal_certy'] = $imagedata['file_name'];
				$config['image_library'] = 'gd2';
				$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
				$config['new_image'] = './dist/admissiondocuments/';
				$config['maintain_ratio'] = TRUE;
				$config['width']    = 640;
				$config['height']   = 480;

				$this->load->library('image_lib', $config);

				
			} else {
				$display['msgp'] = "image not uploaded";
			}
		}

		if ($_FILES['light_bill']['name'] != "") {
			$config['allowed_types'] = "*";
			$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
			$new_name = time() . $_FILES["light_bill"]['name'];
			$config['file_name'] = $new_name;
			$this->load->library('upload');
			$this->upload->initialize($config);

			if ($this->upload->do_upload('light_bill')) {
				$imagedata = $this->upload->data();
				$import_data['light_bill'] = $imagedata['file_name'];
				$config['image_library'] = 'gd2';
				$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
				$config['new_image'] = './dist/admissiondocuments/';
				$config['maintain_ratio'] = TRUE;
				$config['width']    = 640;
				$config['height']   = 480;

				$this->load->library('image_lib', $config);

				
			} else {
				$display['msgp'] = "image not uploaded";
			}
		}

		if ($_FILES['aadhar_card']['name'] != "") {
			$config['allowed_types'] = "*";
			$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
			$new_name = time() . $_FILES["aadhar_card"]['name'];
			$config['file_name'] = $new_name;
			$this->load->library('upload');
			$this->upload->initialize($config);

			if ($this->upload->do_upload('aadhar_card')) {
				$imagedata = $this->upload->data();
				$import_data['aadhar_card'] = $imagedata['file_name'];
				$config['image_library'] = 'gd2';
				$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
				$config['new_image'] = './dist/admissiondocuments/';
				$config['maintain_ratio'] = TRUE;
				$config['width']    = 640;
				$config['height']   = 480;

				$this->load->library('image_lib', $config);

				
			} else {
				$display['msgp'] = "image not uploaded";
			}
		}

		if ($_FILES['form']['name'] != "") {
			$config['allowed_types'] = "*";
			$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
			$new_name = time() . $_FILES["form"]['name'];
			$config['file_name'] = $new_name;
			$this->load->library('upload');
			$this->upload->initialize($config);

			if ($this->upload->do_upload('form')) {
				$imagedata = $this->upload->data();
				$import_data['form'] = $imagedata['file_name'];
				$config['image_library'] = 'gd2';
				$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
				$config['new_image'] = './dist/admissiondocuments/';
				$config['maintain_ratio'] = TRUE;
				$config['width']    = 640;
				$config['height']   = 480;

				$this->load->library('image_lib', $config);

				
			} else {
				$display['msgp'] = "image not uploaded";
			}
		}


		if ($_FILES['other']['name'] != "") {
			$config['allowed_types'] = "*";
			$config['upload_path'] = FCPATH . "dist/admissiondocuments/";
			$new_name = time() . $_FILES["other"]['name'];
			$config['file_name'] = $new_name;
			$this->load->library('upload');
			$this->upload->initialize($config);

			if ($this->upload->do_upload('other')) {
				$imagedata = $this->upload->data();
				$import_data['other'] = $imagedata['file_name'];
				$config['image_library'] = 'gd2';
				$config['source_image'] = './dist/admissiondocuments/' . $imagedata['file_name'];
				$config['new_image'] = './dist/admissiondocuments/';
				$config['maintain_ratio'] = TRUE;
				$config['width']    = 640;
				$config['height']   = 480;

				$this->load->library('image_lib', $config);

				
			} else {
				$display['msgp'] = "image not uploaded";
			}
		}

		$re = $this->admi->update_data('admission_documents', $import_data, 'documents_id', $docdata->documents_id);
		 if ($re) {
			 $record = array('status' => 1, "msg" => "All Doc Uploded.");
			 $recp['all_record'] = $record;
			 echo json_encode($recp);
		 } else {
			 $recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
			 echo json_encode($recp);
		 }
 	}

 	public function edit_fillable_data()
 	{
 		$data = $this->input->post();
 		$d_record = array($data['field'] =>$data['value']);
 		$this->admi->update_unfillup_record('admission_process',$d_record,$data['id']);

 		return 1;
 	}

 	public function liveDocumentData(){
 		// $data = $this->input->post();	
		// $id = $this->input->post('upd_admission_id');
		// echo $_FILES['pictureFile']['name'];
		 $data = $this->input->post();
		// print_r($data);
		// exit;
	
	    // $docdata = $this->cm->select_data('admission_documents','admission_id',$id);
		
		if($_FILES['pictureFile']['name'] != "") {
			$config['allowed_types'] = "*";
			$config['upload_path'] = FCPATH."dist/admissiondocuments/";
			$new_name = time().$_FILES["pictureFile"]['name'];
			$config['file_name'] = $new_name;
			$this->load->library('upload');
			$this->upload->initialize($config);

			if($this->upload->do_upload('pictureFile')){
				$imagedata = $this->upload->data();
				$import_data['photos'] = $imagedata['file_name'];
				$config['image_library'] = 'gd2';
				$config['source_image'] = './dist/admissiondocuments/'.$imagedata['file_name'];
				$config['new_image'] = './dist/admissiondocuments/';
				$config['maintain_ratio'] = TRUE;
				$config['width']    = 640;
				$config['height']   = 480;

				$this->load->library('image_lib', $config);

				$data = $this->input->post();
		 		$d_record = array($this->input->post('fieldname') =>$imagedata['file_name']);
		 		$this->admi->update_unfillup_record('admission_documents',$d_record,$this->input->post('edit_id'));

		 		echo $imagedata['file_name'];
			} else {
				$display['msgp'] = "image not uploaded";
			}
		}
 	}

	 public function CourseWiseBatch_Assigned()
	 {
		 $data = $this->input->post();
		
		 $batch = $this->admi->get_all_data("batches","subcourse_id",$data['course_id']);
		
		 $display['get_batch_course'] = $this->cm->select_data("admission_courses","admission_courses_id",$data['admission_courses_id']);

		 $record = array();
		 for($i=0; $i<sizeof($batch); $i++)
		 {
			 if($batch[$i]->branch_id==$data['branch_id'])
			 {
			   $record[] = $this->admi->get_all_data("batches","batches_id",$batch[$i]->batches_id);
			 }
		}
		 
		 for($j=0; $j<sizeof($record); $j++)
		 {
			 for($k=0; $k<sizeof($record[$j]); $k++)
			 {
				$display['batch_all'][] = $record[$j][$k];
			 }
		 }

		 $this->load->view('erp/ErpView_AssignedBatch', $display); 
	 }

	 public function ErpAssignedBatch()
	{
		$data = $this->input->post();

		date_default_timezone_set("Asia/Calcutta");
		$created_date = date('Y-m-d h:i A');
		$created_by = $_SESSION['user_name'];
		$remarksdate = date('m-d-Y');
		$remarkstime = date('h:i A');

		$remarksdata = array('admission_id' => $data['admission_id'], 'labels' => $data['admission_courses_status'], 'admission_remrak' => $data['remarks'], 'remarks_date' => $remarksdate, 'remarks_time' => $remarkstime, 'addby' => $created_by);

		$this->admi->save_data('admission_remarks', $remarksdata);

		$records = array('admission_status' => "Running");
		
	    $this->admi->update_admission_status_record('admission_process', $records, 'admission_id', $data['admission_id']);

		$admission_courses_id = $data['admission_courses_id'];

		$record = array('admission_courses_status' => $data['admission_courses_status'], 'batch_id' => $data['batch_id'], 'created_by' => $created_by);

		$re = $this->admi->batch_course_status('admission_courses', $record, 'admission_courses_id', $admission_courses_id);

		if ($re) {
			$recp["all_record"] = array('status' => 1, "msg" => "Suceessfully Changes.");
			echo json_encode($recp); // echo "1";ss
		} else {
			$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong!");
			echo json_encode($recp); // echo "2";
		}
	}

	public function ErpAdmision_BranchTransfer()
	{
		$id = $this->input->post('admission_id');
		$data['get_admission_data'] = $this->admi->get_adm_record_list('admission_process', 'admission_id', $id);
		$data['get_batch_courses'] = $this->admi->get_all_data("admission_courses","admission_id",$id);
		$reco = array();
		for($i=0; $i<sizeof($data['get_batch_courses']); $i++)
		{
			$record = $this->admi->get_all_data("course","course_id",$data['get_batch_courses'][$i]->courses_id);
			for($j=0; $j<sizeof($record); $j++)
			{
				$reco[] = $record[$j];
			}
		}
		$data['GetAll_AdmCourses'] = $reco;
		$data['list_branch'] = $this->cm->view_all("branch");
		$this->load->view('erp/ErpAdmision_BranchTransfer', $data);
	}

	public function getBranchWiseCourse(){
		$branchId = $this->input->post('branch_id');
		$courses = $this->cm->view_all('rnw_course');
		$cRecord = array();
		foreach($courses as $val){
			$brData = explode(',',$val->branch_id);
			if(in_array($branchId,$brData))	{
				$cRecord[] =  $val->course_id;
			}
		}
		$subCourses = array();
		if(!empty($cRecord)){
			$subCourses = $this->cm->getsubCoursesRecord('rnw_subcourse','course_id',$cRecord);
		}
		// print_r($subCourses);
		$dsubcourse = "<option value=''>Select</option>";
		foreach($subCourses  as $val){
			$dsubcourse .= "<option value='".$val->subcourse_id."'>".$val->subcourse_name."</option>";
		}

		echo $dsubcourse;
	}

	public function ErpAdmission_Transfer()
	{
		$data =  $this->input->post();

		date_default_timezone_set("Asia/Calcutta");

		$remarks_date = date('Y-m-d');
		$remarks_time = date('h:i A');
		$created_by = $_SESSION['user_name'];
		$labels = "Branch Transfer";
		$admission_id = $data['admission_id'];

		$record = array('admission_id' => $admission_id, 'branch_id'=>$data['branch_id'] ,'admission_remrak' => $data['admission_remrak'], 'remarks_date' => $remarks_date, 'remarks_time' => $remarks_time,  'labels' => $labels, 'addby' => $created_by);
		
		$this->admi->save_data('admission_remarks', $record);

		$records = array('branch_id' => $data['branch_id']);
		
	    $this->admi->update_admission_status_record('admission_process', $records, 'admission_id', $admission_id);

		$get_batch_courses = $this->admi->get_all_data("admission_courses","admission_id",$admission_id);
		if($data['batch_id']=="")
		{
			foreach($get_batch_courses as $value)
			{
				if ($data['course_id'] == $value->courses_id) {
					$admission_courses_status = "Not Assigned";
					$batch_id = $value->batch_id;
				}
				else
				{
					$admission_courses_status = $value->admission_courses_status;
					$batch_id = $value->batch_id;
				}
				$batchreco = array('branch_id'=>$data['branch_id'],'batch_id'=>$batch_id,'admission_courses_status'=>$admission_courses_status);

				$result = $this->admi->batch_course_status('admission_courses', $batchreco, 'admission_courses_id',$value->admission_courses_id);
				if ($result) {
					$status_check = 1;
				} else {
					$status_check = 0;
				}
			}
		}
		else
		{
			foreach($get_batch_courses as $value)
			{
				if ($data['course_id'] == $value->courses_id) {
					$admission_courses_status = "Ongoing";
					$batch_id = $data['batch_id'];
				}
				else
				{
					$admission_courses_status = $value->admission_courses_status;
					$batch_id = $value->batch_id;
				}
				$batchreco = array('branch_id'=>$data['branch_id'],'batch_id'=>$batch_id,'admission_courses_status'=>$admission_courses_status);
				
				$result = $this->admi->batch_course_status('admission_courses', $batchreco, 'admission_courses_id',$value->admission_courses_id);
				if ($result) {
					$status_check = 1;
				} else {
					$status_check = 0;
				}
			}
		}
	
		if ($status_check == 1) {
			$recp["all_record"] = array('status' => 1, "msg" => "Branch Transfer.");
			echo json_encode($recp); // echo "1";
		} else {
			$recp["all_record"] = array('status' => 2, "msg" => "Something Wrong!");
			echo json_encode($recp); // echo "2";
		}
	}

	public function erpshiningsheet()
	{
		if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
           
            foreach($data['topic'] as $key => $value) {
                @$sheetdata['course_id'] = $data['course_id'];
                @$sheetdata['subcourse_id'] = $data['subcourse_id'];
                @$sheetdata['name'] = $value;
                @$sheetdata['created_date'] = date('Y-m-d h:i A');
                @$sheetdata['created_by'] = $_SESSION['user_name'];
              
                $this->db->insert('shining_sheet', $sheetdata);
            }
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
		$update['course_data'] = $this->cm->view_all("rnw_subcourse");
		$update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['list_subcourse'] = $this->cm->view_all("rnw_subcourse");
        $display['list_shining_sheet'] = $this->cm->view_all("shining_sheet");
        $display['shining_sheet_data'] = $this->admi->shining_sheet_record("shining_sheet");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/erpshiningsheet',$display);
	}

	public function erpshiningtopics()
	{
		$id = $this->input->get('np');
		if ($this->input->get('action') == "qdf") {
            $display['course_topic_record'] = $this->admi->get_course_topic('shining_sheet', 'subcourse_id', $id);
        }
		$display['list_course'] = $this->cm->view_all("course");
		$display['course_all'] = $this->cm->view_all("rnw_course");
		$display['subcourse_all'] = $this->cm->view_all("rnw_subcourse");

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
		$this->load->view('erp/erpshiningtopics',$display);
	}

	public function erpdocpermission()
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

		$display['list_department'] = $this->cm->view_all("department");
        $display['list_branch'] = $this->cm->view_all("branch");
        $display['list_source'] = $this->cm->view_all("source");
        $display['list_documents'] = $this->cm->view_all("admission_documents_permission");

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/erpdocpermission',$display);
	}

	public function ajax_doc_permission()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();
			date_default_timezone_set('Asia/Kolkata');
			$data['created_date'] = date('Y-m-d h:i:s');
			$data['created_by'] = $_SESSION['user_name'];
			unset($data['submit']);

			if ($this->input->post('documents_id')) {
				$id = $this->input->post('documents_id');
				unset($data['documents_id']);
				$query = $this->admi->expenses_record_upd('admission_documents_permission', $data, 'documents_id', $id);
				if ($query) {
					$recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
					echo json_encode($recp); // echo "1";
				} else {
					$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
					echo json_encode($recp); // echo "2";
				}
			} else {
				unset($data['documents_id']); 
				$query = $this->admi->import_expenses('admission_documents_permission', $data);
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

	public function get_record_docpermission()
	{
		$id = $this->input->post('documents_id');
		$record['single_record'] = $this->admi->get_single_reco('admission_documents_permission', 'documents_id', $id);
		echo json_encode($record);
	}

	public function remove_doc() {
        $id = $this->input->post('documents_id');
        $query = $this->admi->delete_topic('admission_documents_permission', 'documents_id', $id);
        if ($query) {
			$recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Deleted");
			echo json_encode($recp); // echo "1";
		} else {
			$recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
			echo json_encode($recp); // echo "2";
		}
    }

	public function erpassestment()
	{
		$id = $this->input->get('met');
        if ($this->input->get('action') == "ass") {
            $display['admission'] = $this->cm->select_data("admission_process", "admission_id", $id);
            $display['admission_data'] = $this->admi->get_admission_record("admission_process", "gr_id", $display['admission']->gr_id);
            if (isset($display['admission_data'])) {
                foreach ($display['admission_data'] as $key => $val) {
                    if ($val->type == 'single') {
                        $data[] = $this->admi->get_all_record_grid_wise('admission_process', 'gr_id', $val->gr_id, $val->type);
                    } else {
                        $data[] = $this->admi->get_all_record_grid_wise('admission_process', 'gr_id', $val->gr_id, $val->type);
                    }
                }
            }
            $alldata = array();
            for ($i = 0;$i < sizeof($data);$i++) {
                $record = array();
                $k = 0;
                for ($j = 0;$j < sizeof($data);$j++) {
                    if ($data[$i]->gr_id == $data[$j]->gr_id) {
                        if ($data[$i]->type == 'single') {
                            $record = @$data[$i]->course_name;
                        } else if ($data[$i]->type == 'package') {
                            $record = @$data[$i]->package_name;
                        }
                    }
                }
                $alldata[$data[$i]->gr_id][$data[$i]->admission_id] = $record;
            }
            foreach ($alldata as $k => $v) {
                if (@$display['admission']->gr_id == $k) {
                    $display['admission']->list_multi_course_admission = $v;
                }
            }
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
		$update['upd_faculty'] = $this->cm->view_all("faculty");
		$update['upd_branch'] = $this->cm->view_all("branch");
		$update['upd_see'] = $this->cm->check_update("demo");
		$display['faculty_all'] = $this->cm->view_all("faculty");
        $display['previous_adm_data'] = $this->admi->previous_data("admission_assessment_form", "admission_id", $id);
        $display['tbl_data'] = $this->admi->get_all_data("admission_assessment_form", "admission_id", $id);

		$this->load->view('erp/erpheader', $update);
		$this->load->view('erp/erpassestment',$display);
	}

	public function Erpadmission_history() {
        $adm_id = $this->input->post('admission_id');
        $data['history'] = $this->admi->get_history_admission('admission_history', 'admission_id', $adm_id);
        $data['history_basic_details'] = $this->admi->get_history_dbasic_admission('history_adm_basicdetails', 'admission_id', $adm_id);
        $data['history_all'] = $this->admi->get_all_data('admission_remarks', 'admission_id', $adm_id);
        $data['history_cp'] = $this->admi->get_history_cp_admission('history_adm_cp', 'admission_id', $adm_id);
        $data['history_without_fees'] = $this->admi->get_history_without_fees_modification('history_adm_without_fees', 'admission_id', $adm_id);
        $data['list_branch'] = $this->cm->view_all("branch");
        $data['list_country'] = $this->cm->view_all("country");
        $data['list_state'] = $this->cm->view_all("state");
        $data['list_city'] = $this->cm->view_all("cities");
        $data['list_area'] = $this->cm->view_all("area");
        $data['list_batch'] = $this->cm->view_all("batch_list");
        $data['list_department'] = $this->cm->view_all("department");
        $data['list_subdepartment'] = $this->cm->view_all("subdepartment");
        $data['list_package'] = $this->cm->view_all("package");
        $data['list_course'] = $this->cm->view_all("course");
        $data['faculty_all'] = $this->cm->view_all("faculty");
        $data['adm_satus_all'] = $this->cm->view_all("dropdown_adm");
        $this->load->view('erp/Erpadmission_history', $data);
    }

    public function courseWiseSubcourse(){
    	$courseId = $this->input->post('CourseId');
    	$record = $this->admi->get_all_data('rnw_subcourse','course_id',$courseId);
    	
    	$op_data = "<option value=''>Select Course</option>";
    	foreach($record as $val){
    		$op_data .= "<option value='".$val->subcourse_id."'>".$val->subcourse_name."</option>";
    	}

    	echo $op_data;
    }

	public function ajax_updinst()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();
			date_default_timezone_set('Asia/Kolkata');
			
			for ($i = 0; $i < sizeof($data['admission_installment_id']); $i++) {
				
				$installment = $this->admi->view_all('admission_installment');

				foreach($installment as $dn)
				{
					$flag = 0;
					$dnbi  = explode(',', $data['admission_installment_id'][$i]);
					if (in_array($dn['admission_installment_id'], $dnbi)) {
						$flag = 1;
					}
					
					if($flag == 1)
					{
						$admission_installment_id = $dn['admission_installment_id'];

						$record = array('installment_date' => $data['installment_date'][$i], 'due_amount' => $data['due_amount'][$i], 'paid_amount' => $data['paid_amount'][$i]);
						
					  $result = $this->admi->update_data('admission_installment',$record,'admission_installment_id',$admission_installment_id);
						
					   if ($result) {
						$status_check = 1;
						} else {
						$status_check = 2;
						}
					}	
				}	
			}

			if (empty($data['installment_dates'])) {
				$installment_dates = $data['installment_dates'] = "";
			} else {
				$installment_dates = @$data['installment_dates'];
				$j=0;
				foreach($installment_dates as $key => $value)
				{
					$ins_data['admission_id'] = $data['admission_id'];
					$ins_data['branch_id'] = $data['branch_id'];
					$ins_data['installment_no'] = $data['installment_nos'][$j];
					$ins_data['installment_date'] = $value;
					$ins_data['due_amount'] = $data['due_amounts'][$j];
					$ins_data['paid_amount'] = $data['paid_amounts'][$j];
					$j++;
					$result = $this->admi->save_data('admission_installment', $ins_data);
					if ($result) {
					$status_check = 3;
					} else {
					$status_check = 2;
					}
				}
			}
			
			if ($status_check == 1) {
				$record = array('status' => 1, "msg" => "Updated");
				$recp['all_record'] = $record;
				echo json_encode($recp);
			} else  if($status_check == 3){
				$record = array('status' => 3, "msg" => "HI! This Record Successfully Inserted");
				$recp['all_record'] = $record;
				echo json_encode($recp);
			} else {
				$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
				echo json_encode($recp);
			}
		}
	}

	public function ajax_updco()
	{
		if ($this->input->post('submit')) {
			$data = $this->input->post();
			
			date_default_timezone_set('Asia/Kolkata');
			
			for ($i = 0; $i < sizeof($data['admission_courses_id']); $i++) {
				
				$coursesreco = $this->admi->view_all('admission_courses');

				foreach($coursesreco as $dn)
				{
					$flag = 0;
					$dnbi  = explode(',', $data['admission_courses_id'][$i]);
					if (in_array($dn['admission_courses_id'], $dnbi)) {
						$flag = 1;
					}
					
					if($flag == 1)
					{
						$admission_courses_id = $dn['admission_courses_id'];

						$record = array('course_orpackage_id' => $data['course_orpackage_id'][$i], 'courses_id' => $data['courses_id'][$i], 'admission_courses_status' => $data['admission_courses_status'][$i]);
						
					  $result = $this->admi->update_data('admission_courses',$record,'admission_courses_id',$admission_courses_id);
					   if ($result) {
						$status_check = 1;
						} else {
						$status_check = 2;
						}
					}	
				}	
			}

			if (empty($data['course_orpackage_ids'])) {
				$course_orpackage_ids = $data['course_orpackage_ids'] = "";
			} else {
				$course_orpackage_ids = @$data['course_orpackage_ids'];
				$j=0;
				foreach($course_orpackage_ids as $key => $value)
				{
					$ins_data['admission_id'] = $data['admission_id'];
					$ins_data['branch_id'] = $data['branch_id'];
					$ins_data['gr_id'] = $data['gr_id'];
					$ins_data['surname'] = $data['surname'];
					$ins_data['first_name'] = $data['first_name'];
					$ins_data['email'] = $data['email'];
					$ins_data['course_orpackage_id'] = $value;
					$ins_data['courses_id'] = $data['courses_ids'][$j];
					$ins_data['admission_courses_status'] = $data['admission_courses_statuss'][$j];
					$j++;
					$result = $this->admi->save_data('admission_courses', $ins_data);
					if ($result) {
					$status_check = 3;
					} else {
					$status_check = 2;
					}
				}
			}
			if ($status_check == 1) {
				$record = array('status' => 1, "msg" => "Updated");
				$recp['all_record'] = $record;
				echo json_encode($recp);
			} else  if($status_check == 3){
				$record = array('status' => 3, "msg" => "HI! This Record Successfully Inserted");
				$recp['all_record'] = $record;
				echo json_encode($recp);
			} else {
				$recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
				echo json_encode($recp);
			}
		}
	}

	public function previous_data_demo() {
        $mobileno = $this->input->post('query');
        $data = $this->cm->previous_demo_data($mobileno);
		echo json_encode(array('record' => $data));
    }
    public function previous_data_lead() {
        $mobileno = $this->input->post('query');
        $data = $this->cm->previous_lead_data($mobileno);
        echo json_encode(array('record' => $data));
    }
    public function previous_data_admission() {
        $mobileno = $this->input->post('query');
        $data = $this->cm->previous_admission_data($mobileno);
        echo json_encode(array('record' => $data));
    }
	public function GetRecord() {
        $mobile_no = $this->input->post('query');
        $data = $this->admi->fetch_admission($mobile_no);
        $data_demo = $this->admi->fetch_data_demo($mobile_no);
        $data_lead = $this->admi->fetch_data($mobile_no);
        if (@$data_lead->lead_list_id != '') {
            $data = $this->admi->fetch_data($mobile_no);
        } else if (@$data->admission_id != '') {
            $data = $this->admi->fetch_admission($mobile_no);
        } else if (@$data_demo->demo_id != '') {
            $data = $this->admi->fetch_data_demo($mobile_no);
        }
        echo json_encode(array('record' => $data));
    }
    public function GetRecord_alternate_number_wise() {
        $alternate_mobile_no = $this->input->post('query');
        if (!empty($alternate_mobile_no)) {
            $data = $this->admi->fetch_data_alternet_no_wise($alternate_mobile_no);
            echo json_encode(array('record' => $data));
        } else {
            $data = null;
            echo json_encode($data);
        }
    }
    public function Getrecord_email_wise() {
        $email = $this->input->post('query');
        $data = $this->admi->fetch_data_Email_wise_admission($email);
        $data_lead = $this->admi->fetch_data_Email_wise($email);
        if (@$data->admission_id != '') {
            $data = $this->admi->fetch_data_Email_wise_admission($email);
        } else if (@$data_lead->lead_list_id != '') {
            $data = $this->admi->fetch_data_Email_wise($email);
        }
        echo json_encode(array('record' => $data));
    }
     public function get_cofees()
    {
        $id = $this->input->post('subcourse_id');
		$record['single_record'] = $this->admi->get_single_reco('rnw_subcourse', 'subcourse_id', $id);
		echo json_encode($record);
    }

    public function get_pafees()
    {
        $id = $this->input->post('package_id');
		$record['single_record'] = $this->admi->get_single_reco('rnw_package', 'package_id', $id);
		echo json_encode($record);
    }


    public function getrecord_single_course() {
        $course_id = $this->input->post('course_id');
        @$cids = @implode(',', @$course_id);
        $data = $this->cm->select_data('admission_documents_permission', 'course_id', $cids);
        echo json_encode(array('record' => $data));
    }

    public function download_file(){
	$this->load->helper('download');
	$file = $this->input->get('file');
	$data = 'dist/admissiondocuments/'.$file;
    	force_download($data, NULL);
    }
	
   public function newrepo(){
	echo "welcome git";
   }
	
	
}
