<?php  
include('config_api.php');
ob_start();
$gr_id=$_POST['gr_id'];
$foo = true;
$faa = false;
if($gr_id!=""){
    $query="SELECT * FROM ptm_report WHERE gr_id='$gr_id'";
    $result=mysqli_query($con,$query);
    $ad_id = "SELECT * FROM ptm_report WHERE gr_id='$gr_id'";
        
        $query5 = "SELECT admission_id FROM admission_courses WHERE gr_id='$gr_id'";
        $result5 = mysqli_query($con,$query5);
        $fgsdf = mysqli_fetch_assoc($result5);
        $admission_id = $fgsdf[admission_id];

        $query1 = "SELECT * FROM admission_documents WHERE admission_id='$admission_id'";
        $result3 = mysqli_query($con,$query1);
        $resd = mysqli_fetch_assoc($result3);
        $image = $resd['photos'];
        $stu_photo = "../dist/admissiondocuments/".$resd['photos']."";

        $num_row = mysqli_num_rows($result);
        if($num_row > 1){
            $title = "Second PTM Card";
        }else{
            $title = "First PTM Card";
        }


    if(mysqli_num_rows($result)>=1){          
        
        while($row1=mysqli_fetch_assoc($result)){
            $data['student_pic']=$stu_photo;
            //$data['Title']=$title;
            $data['ptm_report_id']=$row1['ptm_report_id'];
            $data['gr_id']=$row1['gr_id'];
            $data['name']=$row1['name'];
            $data['parent_no']=$row1['parent_no'];
            $data['branch_id']=$row1['branch_id'];
            $data['faculty_name']=$row1['faculty_name'];
            $data['hod_name']=$row1['hod_name'];
            $data['type']=$row1['type'];
            $data['course_name']=$row1['course_name'];
            $data['package_name']=$row1['package_name'];
            $data['uniform']=$row1['uniform'];
            $data['discipline']=$row1['discipline'];
            $data['student_behavior_mark']=$row1['student_behavior_mark'];
            $data['faculty_behavior_mark']=$row1['faculty_behavior_mark'];
            $data['total_work_days']=$row1['total_work_days'];
            $data['total_present_days']=$row1['total_present_days'];
            $data['total_attendance_percentage']=$row1['total_attendance_percentage'];
            $data['total_project']=$row1['total_project'];
            $data['submited']=$row1['submited'];
            $data['submited_percentage']=$row1['submited_percentage'];
            $data['on_time']=$row1['on_time'];
            $data['on_time_percentage']=$row1['on_time_percentage'];
            $data['quality']=$row1['quality'];
            $data['total_activity']=$row1['total_activity'];
            $data['participated']=$row1['participated'];
            $data['participated_percentage']=$row1['participated_percentage'];
            $data['remarks']=$row1['remarks'];
            $data['from_date']=$row1['from_date'];
            $data['to_date']=$row1['to_date'];
            $data['batch_tiaming_from']=$row1['batch_tiaming_from'];
            $data['batch_tiaming_to']=$row1['batch_tiaming_to'];
            $data['addedby']=$row1['addedby'];
            $data['created_at']=$row1['created_at'];

            $final_report[] = $data;
            // print_r($final_report);
            // die;
            }

        $record=array('status'=>$foo, 'msg' => "Data Success" ,'data'=>$final_report);
        }else{
            $record=array('status'=>$faa,'msg'=>"GR ID not found.",'data'=>"");
        }
    }else{
        $record=array('status'=>$faa,'msg'=>"Enter gr_id as body parameter first.",'data'=>"");
    }
    header('Content-type: application/json');
    echo json_encode($record); 
?>
