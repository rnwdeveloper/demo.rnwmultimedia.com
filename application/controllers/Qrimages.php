<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Code written by TangleSkills

class Qrimages extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		  $this->load->helper('url');
		  $this->load->model("Dbcommon", "cm");
		  $this->load->model("AdminSettingsModel", "admin");
		  $this->load->model("Quickadmissionprocess", "admi");
		  $this->load->model("CommonModel", "co");
		  $this->load->model("Task", "tm");
		  $this->load->library("pagination"); 
		  $this->load->helper('cookie');
		  $this->load->library('upload');
		  $this->load->library('session');
		  Header('Access-Control-Allow-Origin: *'); 
		  Header('Access-Control-Allow-Headers: *'); 
		  Header('Access-Control-Allow-Methods: POST, OPTIONS, PUT, DELETE , GET'); 


		// function number_of_working_days($from, $to) {
		// 	$workingDays = [1, 2, 3, 4, 5]; # date format = N (1 = Monday, ...)
		// 	$holidayDays = ['*-12-25', '*-01-01','*-01-14','*-01-26','*-03-01','*-03-19','*-03-20','*-08-12','*-08-15','*-08-19','*-10-05','*-10-26','*-10-27','*-01-25']; # variable and fixed holidays
		
		// 	$from = new DateTime($from);
		// 	$to = new DateTime($to);
		// 	$to->modify('+1 day');
		// 	$interval = new DateInterval('P1D');
		// 	$periods = new DatePeriod($from, $interval, $to);
		
		// 	$days = 0;
		// 	foreach ($periods as $period) {
		// 		if (!in_array($period->format('N'), $workingDays)) continue;
		// 		if (in_array($period->format('Y-m-d'), $holidayDays)) continue;
		// 		if (in_array($period->format('*-m-d'), $holidayDays)) continue;
		// 		$days++;
		// 	}
		// 	return $days;
		// }


		// $tod_date = date('Y-m-d');
		// $course_view = $this->cm->view_all("rnw_subcourse");
		// $admission_cour_view  = $this->cm->view_all('admission_courses');
		// $batches_view = $this->cm->view_all('batches');
		// foreach($admission_cour_view as $val){
		// 	foreach($batches_view as $row){
		// 		if($val->batch_id == $row->batches_id){
		// 			if($val->assigned_batch_date != " "){
		// 				$total_days = number_of_working_days($val->assigned_batch_date,$tod_date));
		// 			}
		// 		}
		// 	}
		// }
		// die;


			// $course_view = $this->cm->view_all("rnw_subcourse");
	 	// 	$admission_cour_view = $this->cm->view_all('admission_courses');
			// $batches_view = $this->cm->view_all('batches');
			// for($i = 0; $i < sizeof($admission_cour_view); $i++) {
			// 	for($k = 0; $k < sizeof($batches_view); $k++){
			// 		$tod_date = date('Y-m-d');
			// 		//print_r(number_of_working_days($admission_cour_view[$i]->assigned_batch_date,$tod_date));
			// 		if($admission_cour_view[$i]->batch_id == $batches_view[$k]->batches_id){
			// 			// 	if(number_of_working_days($admission_cour_view[$i]->assigned_batch_date,$tod_date) > $batches_view[$k]->batch_duration){
			// 			// 		$record = array('overdue_status' => "Overdue" );
			// 			// 		$records = array('batch_overdue_status' => "Overdue" );
			// 			// 		$this->admi->update_admission_status_record('batches', $record, 'batches_id', $admission_cour_view[$i]->batch_id);
			// 			// 		$this->admi->update_admission_status_record('admission_courses', $records, 'admission_courses_id', $admission_cour_view[$i]->admission_courses_id);
			// 			// 	}     
			// 		}	
			// 	}
			// }
			// die;

    }
	   
	public function index()
	{
		$data['img_url']="";
		if($this->input->post('action') && $this->input->post('action') == "generate_qrcode")
		{
			$record = $this->admi->get_single_reco('admission_process', 'admission_id', $this->input->post('qr_text'));
			foreach($record as $key => $value) {
				$final_reco[] = $value;
			}
			$final_record = implode(',', $final_reco);
			$this->load->library('ciqrcode');
			$qr_image=rand().'.png';
			$params['data'] = $final_record;
			$params['level'] = 'H';
			$params['size'] = 3;
			$params['savename'] =FCPATH."dist/admissiondocuments".$qr_image;
			if($this->ciqrcode->generate($params)){
				$data['img_url']=$qr_image;	
			}
		}
		$this->load->view('common/qrcode',$data);
	}

	public function view_attendance(){
		$admission_id = $this->input->post('admission_id');
		$reco = $this->cm->select_data('admission_process', 'admission_id', $admission_id);
		//$data['attendance_list'] =  $this->admi->get_live_data_attendance_2('DeviceLogs_Processed', 'UserId', $reco->gr_id);
		$data['attendance_list'] =  $this->tm->get_live_data_attendance_2('DeviceLogs_Processed', 'UserId', $reco->gr_id);
		foreach($data['attendance_list'] as $val){
		$reco = array('records'=>",".$val['LogDate']);
		//$str_arr = preg_split("/\,/", $string);
		$temp = explode(" ", $reco['records']);
		$d[] = array('date'=>$temp[0], 'time' => $temp[1]); 
		//print_r($d);
		//   $d = array();
		//   foreach($reco as $key => $item) {
		// 	  $temp = explode(" ", $item);
			  
		// 	  $d[] = array('date'=>$temp[0], 'time' => $temp[1]);
		//   }
		
		  $arr = array();
		  $a = 0;
		  foreach ($d as $key => $item) {
			  $arr[$item['date']][$key] = $item;
		  }
		  
		  foreach($arr as $key => $item) {
			  echo $key . " "  . "<br/>";
			  $temp = 0;
			  foreach ($item as $k => $v) {
				  echo $v["time"];
	  
				  if ($temp == 0) {
					  echo " in ";
					  $temp = 1;
				  } else {
					  echo " out ";
					  $temp = 0;
				  } 
			  }
			  echo "<br /><br />";
		  }
		}
		die();
		//print_r(array_diff_assoc($data['attendance_list'], array_unique($data['attendance_list'])));
		//print_r($data['attendance_list']);
		//die;
		// $flag = 0;
		// $time_in = array();
		// for($i=0;$i<=sizeof($data['attendance_list']);$i++){
		// 	// print_r($data['attendance_list'][$i]);
		// 	$time_out = explode(" " , $data['attendance_list'][$i]->LogDate);
		// 	// /print_r($time_out);
		// 	if(in_array(substr($data['attendance_list'][$i]->LogDate,0,-9),$time_out)) {
		// 		//print_r($data['attendance_list'][$i]);
		// 		$time_in[] = $data['attendance_list'][$i];
		// 		//print_r($time_in);
		// // // // 	// 	$trim_ar = array_slice($time_in,0,2);
		// // // // 	// 	print_r($trim_ar);
		// // // // 	// 	$flag = 1;
		// 	}
		// }
		//print_r(get_object_vars($time_in));
		// for($j=0;$j<=sizeof($time_in);$j++)
		// {
		// 	//print_r(array_diff_assoc($time_in[$j], array_unique($time_in[$j+1])));
		// 	//print_r(get_object_vars($time_in[$j+1]));
		// // }
		// // /print_r(array_diff_assoc($time_in, array_unique($time_in)));
		// //print_r($time_in);
		// die;
		// // foreach($time_in as $row){
		// // 	print_r($row);
		// // }
		// $array = json_decode(json_encode($time_in), true);
		// // print_r($array);
		// // die;
		// for($j=0;$j<=sizeof($array);$j++){
		// 	print_r($time_in[$j]);
		// 
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




}
