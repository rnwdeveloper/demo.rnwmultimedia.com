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
    if(mysqli_num_rows($result)>=1){
        while($row1 = mysqli_fetch_assoc($result)){
            $data['gr_id'] = $row1[gr_id]; 
            $data['course_completed_date'] = $row1[course_completed_date];
            $data['notification_status'] = $row1[notification_status];
           
            $sub="SELECT subcourse_name FROM rnw_subcourse WHERE subcourse_id='$row1[courses_id]'";
            $subo=mysqli_query($con,$sub);
            $subd = mysqli_fetch_assoc($subo);
            $data['course_name'] = $subd[subcourse_name];
            $data['course_status'] = $final_coname.$row1[admission_courses_status];
            $stqu="SELECT first_name,surname FROM admission_courses WHERE admission_id='$admission_id'";
            $ddd=mysqli_query($con,$stqu);
            $sdf = mysqli_fetch_assoc($ddd);
            $data['name'] = $sdf[first_name]."".$sdf[surname];

            $branch_name = "SELECT branch_name FROM branch WHERE branch_id  = '$row1[branch_id]'";
            $dgd=mysqli_query($con,$branch_name);
            $sef = mysqli_fetch_assoc($dgd);
            $data['branch_name'] = implode(",",$sef);

            $bname = "SELECT batch_name FROM batches WHERE batches_id  = '$row1[batch_id]'";
            $bn=mysqli_query($con,$bname);
            $ban = mysqli_fetch_assoc($bn);
            $data['batch_name'] = implode(",",$ban);

            $fname = "SELECT faculty_id FROM batches WHERE batches_id  = '$row1[batch_id]'";
            $fn=mysqli_query($con,$fname);
            $fan = mysqli_fetch_assoc($fn);
            $recof = implode(",",$fan);

            $qufo = "SELECT name FROM user WHERE user_id  ='$recof'";
            $refo=mysqli_query($con,$qufo);
            $fac_name = mysqli_fetch_assoc($refo);
            $data['Faculty_name'] = implode(",", $fac_name);

                $final_reco[] = $data;
            }
        $record = array('status' => $foo, 'msg' => "Successfully Fetch Record", 'data'=>$final_reco);
    } else {
        $record = array('status' => $faa, 'msg' => "Admission ID not found.", 'data'=>"");
    }
   
     
}else{
    $record=array('status'=>$faa,'msg'=>"Enter gr_id as body parameter first.",'data'=>"");
}
header('Content-type: application/json');
echo json_encode($record); 

 //while($row = mysqli_fetch_assoc($result)){ 
          
        //$data['gr_id'] = $row[gr_id]; 
        // $data['course_completed_date'] = $row[course_completed_date];
        // $data['notification_status'] = $row[notification_status];
        
        // if($row[courses_id] != ""){
        //     $quc = "SELECT subcourse_name FROM rnw_subcourse WHERE course_id  ='$row[courses_id]'";
        //     $reso=mysqli_query($con,$quc);
        //     $co_name = mysqli_fetch_array($reso);
        //     $cd_name = implode(",", $co_name);
        // }
        // $co = explode(",", $cd_name);
        // $final_coname = $co[0];
        // $data['cour_name'] = $final_coname." => ".$row[admission_courses_status].", ";

        // $stqu="SELECT first_name,surname FROM admission_courses WHERE admission_id='$admission_id'";
        // $ddd=mysqli_query($con,$stqu);
        // $sdf = mysqli_fetch_assoc($ddd);
        // $data['name'] = $sdf[first_name]."".$sdf[surname];

        // $branch_name = "SELECT branch_name FROM branch WHERE branch_id  = '$row[branch_id]'";
        // $dgd=mysqli_query($con,$branch_name);
        // $sef = mysqli_fetch_assoc($dgd);
        // $data['branch_name'] = implode(",",$sef);

        // if($row[college_courses_id] != ""){
        //     $qubo = "SELECT faculty_id,batch_name FROM batches WHERE batches_id ='$row[college_courses_id]'";
        //     $rebo=mysqli_query($con,$qubo);
        //     $batch_id = mysqli_fetch_assoc($rebo);
        //     $fcs_name = $batch_id[faculty_id];
        //     $data['batch_name'] = $batch_id[batch_name];

        //     $qufo = "SELECT name FROM user WHERE user_id  ='$fcs_name'";
        //     $refo=mysqli_query($con,$qufo);
        //     $fac_name = mysqli_fetch_assoc($refo);
        //     $data['Faculty_name'] = implode(",", $fac_name);
        // }

        // $final_reco[] = $data;
        // print_r($final_reco);

        // $record = array('status'=>$foo,'data'=>$data);
        // print_r($record);
     //}
?> 