<?php
    include('config_api.php');
    ob_start();
    error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
    $foo = true;
    $faa = false;
    $admission_id = $_POST['admission_id'];
   // $admission_id = 1;
    if($admission_id != ""){
        //photos
        $query1 = "SELECT * FROM admission_documents WHERE admission_id='$admission_id'";
        $result = mysqli_query($con,$query1);
        $resd = mysqli_fetch_assoc($result);        
        $image = $resd['photos'];
        $stu_photo = "../dist/admissiondocuments/".$resd['photos']."";
        //photo end
        $query="SELECT * FROM admission_process WHERE admission_id = '$admission_id'";
        $result1=mysqli_query($con,$query);
        $row = mysqli_fetch_array($result1); 
        if($row[27] != ""){ 
            $qu="SELECT fees FROM rnw_package WHERE package_id ='$row[27]'";
            $res=mysqli_query($con,$qu);
            $pack_name = mysqli_fetch_assoc($res);
            //$pc_name = implode(",",$pack_name);
        }
        if($row[28] != ""){    
            $quc = "SELECT fees FROM rnw_subcourse WHERE course_id  ='$row[28]'";
            $reso=mysqli_query($con,$quc);
            $co_name = mysqli_fetch_assoc($reso);
            //$c_name = implode(",",$co_name);
        }
        if($row[29] != ""){
            $quco = "SELECT college_tuition_fees FROM college_courses  WHERE college_courses_id ='$row[29]'";
            $reco=mysqli_query($con,$quco);
            $col_name = mysqli_fetch_assoc($reco);
            //$cl_name = implode(",",$col_name);
        }   
        $branch_name = "SELECT branch_name FROM branch WHERE branch_id  = '$row[20]'";
        $dgd=mysqli_query($con,$branch_name);
        $sef = mysqli_fetch_assoc($dgd);
        $br_name = implode(",",$sef);
        
        //diails end

        if(mysqli_num_rows($result)<=1){
            $record = array('status' => $foo, 'photos' => $stu_photo , 'branch name' => @$br_name , 'package Fees'=> @$pack_name , 'course Fees'=> @$co_name , 'collage Fees' => @$col_name );
        } else {            
            $record = array('status' => $faa, 'msg' => "Admission ID not found.", 'data'=>"");
        }
    } else {
        $record = array('status' => $faa, 'msg' => "Enter admission_id as body parameter first.", 'data'=>"");
    }
    header('Content-type: application/json');
    echo json_encode($record);
?>