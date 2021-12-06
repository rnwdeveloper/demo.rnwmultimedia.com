<?php 
include('config_api.php');
ob_start();
$_SESSION['gr_id'] = 101; 
$gr_id = $_SESSION['gr_id']; 
$cur_date = date("Y-m-d");
if($cur_date!=""){
    $query="SELECT * FROM admission_courses WHERE DATE(updated_at)='$cur_date' AND gr_id = '$gr_id'";
    $result=mysqli_query($con,$query);
    while($row = mysqli_fetch_array($result))
    {   
        $currunt_date = date("Y-m-d");
        if($row[8] != ""){
            $qu="SELECT package_name FROM rnw_package WHERE package_id ='$row[8]'";
            $res=mysqli_query($con,$qu);
            $pack_name = mysqli_fetch_array($res);
        }
        if($row[9] != ""){
            $quc = "SELECT course_name FROM rnw_course WHERE course_id  ='$row[9]'";
            $reso=mysqli_query($con,$quc);
            $co_name = mysqli_fetch_array($reso);
        }
        if($row[10] != ""){
            $quco = "SELECT college_course_name FROM college_courses  WHERE college_courses_id ='$row[10]'";
            $reco=mysqli_query($con,$quco);
            $col_name = mysqli_fetch_array($reco);
        }
        if($row[11] != ""){
            $qubo = "SELECT faculty_id FROM batches WHERE batches_id ='$row[11]'";
            $rebo=mysqli_query($con,$qubo);
            $batch_id = mysqli_fetch_array($rebo);
            $qufo = "SELECT name FROM user WHERE user_id  ='$batch_id'";
            $refo=mysqli_query($con,$qufo);
            $fac_name = mysqli_fetch_array($refo);
        }
        $stqu="SELECT gr_id,first_name,surname,admission_courses_status FROM admission_courses WHERE DATE(updated_at)='$cur_date'";
        $ddd=mysqli_query($con,$stqu);
        $sdf = mysqli_fetch_assoc($ddd);
        $record = array('Student Name' =>$sdf , 'package Name'=>@$pack_name , 'course name'=>@$co_name , 'collage name' => @$col_name , 'faculty_name' => @$fac_name );  
    }
}else{
    $record=array('status'=>http_response_code(),'msg'=>"Enter gr_id as body parameter first.",'data'=>"");
}
header('Content-type: application/json');
echo json_encode($record); 
?> 