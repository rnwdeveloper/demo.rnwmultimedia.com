<?php
    include('config_api.php');
    ob_start();

    $foo =true;
    $faa = false;
    $admission_id = $_POST['admission_id'];

    if($admission_id != ""){
        
        $query = "SELECT * FROM admission_process WHERE admission_id='$admission_id'";

        $result = mysqli_query($con,$query);

        $query1 = "SELECT * FROM admission_documents WHERE admission_id='$admission_id'";
        $result3 = mysqli_query($con,$query1);
        $resd = mysqli_fetch_assoc($result3);
        $image = $resd['photos'];
        $stu_photo = "http://demo.rnwmultimedia.com/dist/admissiondocuments/".$resd['photos']."";

        if(mysqli_num_rows($result)>=1){
            while($row1 = mysqli_fetch_assoc($result)){ 
                $data['student_pic'] = $stu_photo;
                $data['admission_id'] = $row1['admission_id'];
                $data['gr_id'] = $row1['gr_id'];
                $data['admission_number'] = $row1['admission_number'];
                $data['enrollment_number'] = $row1['enrollment_number'];
                $data['lead_list_id'] = $row1['lead_list_id'];
                $data['demo_id'] = $row1['demo_id'];
                $data['first_name'] = $row1['first_name'];
                $data['branch_id']   = $row1['branch_id'];
                $data['surname'] = $row1['surname'];
                $data['stu_dob'] = $row1['stu_dob'];
                $data['gender'] = $row1['gender'];
                $data['addby'] = $row1['addby'];
                $data['email'] = $row1['email'];
                $data['mobile_no'] = $row1['mobile_no'];
                $data['alternate_mobile_no'] = $row1['alternate_mobile_no'];
                $data['source_id'] = $row1['source_id'];
                $data['admission_date'] = $row1['admission_date'];
                $data['admission_time'] = $row1['admission_time'];
                $data['cancellation_admission_date'] = $row1['cancellation_admission_date'];
                $data['terminate_date'] = $row1['terminate_date'];
                $data['completed_datebranch_idyear'] = $row1['completed_datebranch_idyear'];
                $data['branch_idyear'] = $row1['branch_idyear'];
                $data['year'] = $row1['year'];
                $data['department_id'] = $row1['department_id'];
                $data['subdepartment_id'] = $row1['subdepartment_id'];
                $data['type'] = $row1['type'];
                $data['shining_sheet_id'] = $row1['shining_sheet_id'];
                $data['stating_course_id'] = $row1['stating_course_id'];
                $data['course_id'] = $row1['course_id'];
                $data['package_id'] = $row1['package_id'];
                $data['college_courses_id'] = $row1['college_courses_id'];
                $data['college_tuition_fees'] = $row1['college_tuition_fees'];
                $data['faculty_id'] = $row1['faculty_id'];
                $data['batch_id'] = $row1['batch_id'];
                $data['tuation_fees'] = $row1['tuation_fees'];
                $data['no_of_installment'] = $row1['no_of_installment'];
                $data['registration_fees'] = $row1['registration_fees'];
                $data['present_country_id'] = $row1['present_country_id'];
                $data['present_state_id'] = $row1['present_state_id'];
                $data['present_city_id'] = $row1['present_city_id'];
                $data['present_area_id'] = $row1['present_area_id'];
                $data['present_flate_house_no'] = $row1['present_flate_house_no'];
                $data['present_area_street'] = $row1['present_area_street'];
                $data['present_landmark'] = $row1['present_landmark'];
                $data['permanent_country_id'] = $row1['permanent_country_id'];
                $data['permanent_state_id'] = $row1['permanent_state_id'];
                $data['permanent_city_id'] = $row1['permanent_city_id'];
                $data['permanent_area_id'] = $row1['permanent_area_id'];
                $data['permanent_pin_code'] = $row1['permanent_pin_code'];
                $data['permanent_flate_house_no'] = $row1['permanent_flate_house_no'];
                $data['permanent_area_street'] = $row1['permanent_area_street'];
                $data['permanent_landmark'] = $row1['permanent_landmark'];
                $data['present_pin_code'] = $row1['present_pin_code'];
                $data['father_name'] = $row1['father_name'];
                $data['father_email'] = $row1['father_email'];
                $data['father_mobile_no'] = $row1['father_mobile_no'];
                $data['father_occupation'] = $row1['father_occupation'];
                $data['father_income'] = $row1['father_income'];
                $data['mother_name'] = $row1['mother_name'];
                $data['mother_email'] = $row1['mother_email'];
                $data['mother_mobile_no'] = $row1['mother_mobile_no'];
                $data['mother_occupation'] = $row1['mother_occupation'];
                $data['mother_income'] = $row1['mother_income'];
                $data['admission_msg_email'] = $row1['admission_msg_email'];
                $data['admission_msg_mobile'] = $row1['admission_msg_mobile'];
                $data['school_collage_name'] = $row1['school_collage_name'];
                $data['school_collage_type'] = $row1['school_collage_type'];
                $data['school_clg_state'] = $row1['school_clg_state'];
                $data['school_clg_city'] = $row1['school_clg_city'];
                $data['school_clg_area'] = $row1['school_clg_area'];
                $data['school_clg_area'] = $row1['school_clg_area'];
                $data['send_to_father_sms'] = $row1['send_to_father_sms'];
                $data['send_to_email'] = $row1['send_to_email'];
                $data['send_to_sms'] = $row1['send_to_sms'];
                $data['remarks'] = $row1['remarks'];
                $data['file_name'] = $row1['file_name'];
                $data['hold_stating_date'] = $row1['hold_stating_date'];
                $data['hold_ending_date'] = $row1['hold_ending_date'];
                $data['admission_status'] = $row1['admission_status'];
                $data['admission_discount'] = $row1['admission_discount'];
                $data['discount_ammount'] = $row1['discount_ammount'];
                $data['dropdown_adm_id'] = $row1['dropdown_adm_id'];
                $data['hold_addby'] = $row1['hold_addby'];
                $data['rnw1_no'] = $row1['rnw1_no'];
                $data['rnw2_no'] = $row1['rnw2_no'];
                $data['rnw3_no'] = $row1['rnw3_no'];
                $data['rnw4_no'] = $row1['rnw4_no'];
                $data['RW1B'] = $row1['RW1B'];
                $data['rw1mm'] = $row1['rw1mm'];
                $data['clg'] = $row1['clg'];
                $data['rnw5_no'] = $row1['rnw5_no'];
                $data['admission_type'] = $row1['admission_type'];
                $data['created_at'] = $row1['created_at'];
                $data['updated_at'] = $row1['updated_at'];
                $final_report[] = $data;

                //$data['student_pic'] = $stu_photo;
            }

        $record = array('status' => $foo,'msg' => "Data Success" , 'data'=>$final_report);
        } else {            
            $record = array('status' => $faa, 'msg' => "Admission ID not found.", 'data'=>"");
        }
    } else {
        $record = array('status' => $faa, 'msg' => "Enter admission_id as body parameter first.", 'data'=>"");
    }
    header('Content-type: application/json');
    echo json_encode($record);  
?>