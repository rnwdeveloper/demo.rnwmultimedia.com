<?php 
include('config_api.php');
ob_start();
// error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);   
$_SESSION['gr_id'] = 106; 
$gr_id = $_SESSION['gr_id']; 
if($gr_id!=""){
    $query="SELECT * FROM admission_process WHERE gr_id = '$gr_id'";
    $result=mysqli_query($con,$query);
    $row = mysqli_fetch_array($result); 
    if($row[27] != ""){
        $qu="SELECT package_name FROM rnw_package WHERE package_id ='$row[27]'";
        $res=mysqli_query($con,$qu);
        $pack_name = mysqli_fetch_assoc($res);
        $pc_name = implode(",",$pack_name);
    }
    if($row[28] != ""){    
        $quc = "SELECT course_name FROM rnw_course WHERE course_id  ='$row[28]'";
        $reso=mysqli_query($con,$quc);
        $co_name = mysqli_fetch_assoc($reso);
        $c_name = implode(",",$co_name);
    }
    if($row[29] != ""){
        $quco = "SELECT college_course_name FROM college_courses  WHERE college_courses_id ='$row[29]'";
        $reco=mysqli_query($con,$quco);
        $col_name = mysqli_fetch_assoc($reco);
        $cl_name = implode(",",$col_name);
    }
    $branch_name = "SELECT branch_name FROM branch WHERE branch_id  = '$row[20]'";
    $dgd=mysqli_query($con,$branch_name);
    $sef = mysqli_fetch_assoc($dgd);
    $br_name = implode(",",$sef);

    $depart_name = "SELECT department_name FROM department WHERE department_id  = '$row[22]'";
    $ded=mysqli_query($con,$depart_name);
    $shf = mysqli_fetch_assoc($ded);
    $dp_name = implode(",",$shf);

    $subdepart_name = "SELECT subdepartment_name FROM subdepartment WHERE subdepartment_id   = '$row[23]'";
    $dsed=mysqli_query($con,$subdepart_name);
    $sdhf = mysqli_fetch_assoc($dsed);
    $sdp_name = implode(",",$sdhf);
    
    $record = array( 'GrId' => $gr_id ,  'branch name' => @$br_name , 'Department name' => @$dp_name , 'Subdepartment name' => @$sdp_name , 'package Name'=> @$pc_name , 'course name'=> @$c_name , 'collage name' => @$cl_name);
}else{
    $record=array('status'=>http_response_code(),'msg'=>"Enter gr_id as body parameter first.",'data'=>"");
}
header('Content-type: application/json');
echo json_encode($record); 
?> 