<?php

include('config_api.php');

ob_start();
ob_clean();
$foo = true;
$faa = false;
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
//$admission_id = $_SESSION['admission_id'];
$admission_id = $_POST['admission_id'];
$shining_sheet_id = $_POST['signing_sheet_id'];
$feed_back = $_POST['feed_back'];
if($admission_id != ""){
    $query="SELECT * FROM admission_process WHERE admission_id = '$admission_id'";     
    $result1=mysqli_query($con,$query);
    $row = mysqli_fetch_array($result1); 
    $type = $row['type'];
    $gr_id = $row['gr_id'];
    if($row[27] != ""){ 
        $course_orpackage_id = $row[27];
    }
    if($row[28] != ""){    
        $course_orpackage_id = $row[28];
    }
    if($row[29] != ""){
        $course_orpackage_id = $row[29]; 
    } 
    date_default_timezone_set("Asia/Calcutta"); 
    $date = date("Y-m-d");
    $p_a = 'present';
    $status = 'Reguler';
    $p_a = 'present';
    $qo="INSERT INTO `assign_student` (`shining_sheet_id`, `admission_id`, `gr_id`,  `type`, `course_orpackage_id`, `p_a` , `date`, `feed_back`, `status`) VALUES ('$shining_sheet_id', '$admission_id', '$gr_id', '$type', '$course_orpackage_id', '$p_a' ,  '$date', '$feed_back', '$status');";
    $res = mysqli_query($con,$qo);
    if($qo){
        $record=array('status'=>$foo,'msg'=>"Data Success");
    }else{
        $record=array('status'=>$faa,'msg'=>"Somthing wrong");
    } 
} else {
    $record = array('status' => $faa, 'msg' => "Enter value as body parameter first.", 'data'=>"");
}
header('Content-type: application/json');
echo json_encode($record);

?>