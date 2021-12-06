<?php 
include('config_api.php');
ob_start();
//$_SESSION['gr_id'] = 101; 
$foo = true;
$faa = false;
$admission_id = $_POST['admission_id']; 
$cur_date = date("Y-m-d");
if($admission_id!=""){
    $query="SELECT * FROM admission_courses WHERE admission_id = '$admission_id' AND course_notification_status = '0' AND notification_status = '0' AND batch_id IS NOT NULL ";
    $result=mysqli_query($con,$query);
    // print_r(mysqli_fetch_array($result));
    // die;
    while($row = mysqli_fetch_assoc($result))
    {   
        $gr_id = $row[gr_id];
        $course_completed_date = $row[course_completed_date];
        $notification_status = $row[notification_status];
        $currunt_date = date("Y-m-d");
        if($row[courses_id] != ""){
            $quc = "SELECT subcourse_name FROM rnw_subcourse WHERE course_id  ='$row[courses_id]'";
            $reso=mysqli_query($con,$quc);
            $co_name = mysqli_fetch_array($reso);
            $cd_name = implode(",", $co_name);
        }   
        $co = explode(",", $cd_name);
        $final_coname = $co[0].",";
        if($row[10] != ""){
            $quco = "SELECT college_course_name FROM college_courses  WHERE college_courses_id ='$row[10]'";
            $reco=mysqli_query($con,$quco);
            $col_name = mysqli_fetch_assoc($reco);
            $cdl_name = implode(",", $col_name);
        }
        if($row[college_courses_id] != ""){
            $qubo = "SELECT faculty_id,batch_name FROM batches WHERE batches_id ='$row[college_courses_id]'";
            $rebo=mysqli_query($con,$qubo);
            $batch_id = mysqli_fetch_assoc($rebo);
            $fcs_name = $batch_id[faculty_id];
            $batch_name = $batch_id[batch_name];

            $qufo = "SELECT name FROM user WHERE user_id  ='$fcs_name'";
            $refo=mysqli_query($con,$qufo);
            $fac_name = mysqli_fetch_assoc($refo);
            $fcfgs_name = implode(",", $fac_name);
        }
        $stqu="SELECT first_name,surname FROM admission_courses WHERE admission_id='$admission_id'";
        $ddd=mysqli_query($con,$stqu);
        $sdf = mysqli_fetch_assoc($ddd);
        $name = $sdf[first_name]."".$sdf[surname];

        $branch_name = "SELECT branch_name FROM branch WHERE branch_id  = '$row[branch_id]'";
        $dgd=mysqli_query($con,$branch_name);
        $sef = mysqli_fetch_assoc($dgd);
        $br_name = implode(",",$sef);
    }
    // print_r($row);
    // die;
    //die;
}else{
    $record=array('status'=>$faa,'msg'=>"Enter gr_id as body parameter first.",'data'=>"");
}
header('Content-type: application/json');
echo json_encode($record); 
?> 