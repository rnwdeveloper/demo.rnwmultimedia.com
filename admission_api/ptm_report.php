<?php 
include('config_api.php');
ob_start();
//error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
$foo = true;
$faa = false;
$gr_id  =$_SESSION['gr_id'];
if($gr_id!=""){
    $query3="SELECT * FROM ptm_report WHERE gr_id='$gr_id'";
    $result2=mysqli_query($con,$query3);
    $row1=mysqli_fetch_array($result2);

    $fees = "SELECT tuation_fees FROM admission_process WHERE gr_id='$gr_id'";
    $result4=mysqli_query($con,$fees);
    $row4=mysqli_fetch_array($result4);

    $branch_name = "SELECT branch_name FROM branch WHERE branch_id  = '$row1[4]' ";
    $dgd=mysqli_query($con,$branch_name);
    $sef = mysqli_fetch_array($dgd);
    if($row1[package_name] != ""){ 
        $qu="SELECT package_name FROM rnw_package WHERE package_id ='$row1[package_name]'";
        $res=mysqli_query($con,$qu);
        $pack_name = mysqli_fetch_array($res);
    }
    if($row1[course_name] != ""){    
        $quc = "SELECT subcourse_name FROM rnw_subcourse WHERE course_id  = '$row1[course_name]';";
        $reso=mysqli_query($con,$quc);
        $co_name = mysqli_fetch_array($reso);
    }

    $num_row = mysqli_num_rows($result2);
    if($num_row > 1){
        $title = "Second PTM Card";
    }else{
        $title = "First PTM Card";
    }

    if(mysqli_num_rows($result2)>=1){
        
        $data['ptm_report_id'] = $row1[0];
        $data['gr_id'] = $row1[1];
        $data['name'] = $row1[2];
        $data['parent_no'] = $row1[3];
        $data['branch_id'] = $sef[0];
        $data['tusion_fees'] = $row4[0];
        $data['faculty_name'] = $row1[5];
        $data['hod_name'] = $row1[6];
        $data['type'] = $row1[7];
        $data['course_name'] = $co_name[0];
        $data['package_name'] = $pack_name[0];
        $data['uniform'] = $row1[10];
        $data['discipline'] = $row1[11];
        $data['student_behavior_mark'] = $row1[12];
        $data['faculty_behavior_mark'] = $row1[13];
        $data['total_work_days'] = $row1[14];
        $data['total_present_days'] = $row1[15];
        $data['total_attendance_percentage'] = $row1[16];
        $data['total_project'] = $row1[17];
        $data['submited'] = $row1[18];
        $data['submited_percentage'] = $row1[19];
        $data['on_time'] = $row1[20];
        $data['on_time_percentage'] = $row1[21];
        $data['quality'] = $row1[22];
        $data['total_activity'] = $row1[23];
        $data['participated'] = $row1[24];
        $data['participated_percentage'] = $row1[25];
        $data['remarks'] = $row1[26];
        $data['from_date'] = $row1[27];
        $data['to_date'] = $row1[28];
        $data['batch_tiaming_from'] = $row1[29];
        $data['batch_tiaming_to'] = $row1[30];
        $data['addedby'] = $row1[31];
        $data['created_at'] = $row1[32];
        $record=array('status'=> $foo, 'title' => $title ,'data'=>$data);
        }else{
            $record=array('status'=>$faa,'msg'=>"GR ID not found.",'data'=>"");
        }       
    }else{
        $record=array('status'=>$faa,'msg'=>"Enter gr_id as body parameter first.",'data'=>"");
    }
    header('Content-type: application/json');
    echo json_encode($record); 
?>