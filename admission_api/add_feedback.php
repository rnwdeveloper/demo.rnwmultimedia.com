<?php 
include('config_api.php');
session_start();
ob_start();   
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);   
// $_SESSION['gr_id'] = "200";
// $_SESSION['addedby'] = "Test Demo";
// $_SESSION['email'] = "test@gmail.com";
// $_SESSION['name'] = "Test Demo";   
$foo = true;
$faa = false;
@$name =$_SESSION['name'];
@$email =$_SESSION['email']; 
@$remarks=$_POST['remarks']; 
@$user_type=$_POST['user_type']; 
@$subject_id=$_POST['subject_id']; 
@$type=$_SESSION['type']; 
@$addedby=$_SESSION['addedby'];
@$gr_id=$_SESSION['gr_id'];     
$created_at= date('Y-m-d h:i:s');
if($gr_id!=""){
    $query="SELECT * FROM admission_courses WHERE gr_id = '$gr_id'";
    $result=mysqli_query($con,$query);
    while($row = mysqli_fetch_array($result))
    {   
        $branch_id = $row[1];
        if($row[8] != ""){
            @$package_id = $row[8];
        }
        if($row[9] != ""){    
            @$course_id = $row[9];
        }
        if($row[10] != ""){
            @$college_courses_id = $row[10];
        }      
        if($row[11] != ""){
            $qubo = "SELECT faculty_id FROM batches WHERE batches_id ='$row[11]'";
            $rebo=mysqli_query($con,$qubo);
            $faculty_id = mysqli_fetch_assoc($rebo);
            $str = implode(',', $faculty_id);
        }
        
        $qo="INSERT INTO `feedback` (`gr_id`, `name`, `email`, `branch_id`, `type`, `course_id`, `package_id`, `college_courses_id`, `subject_id`, `faculty_id`, `remarks`, `user_type`, `addedby`, `created_at`) VALUES ('$gr_id', '$name', '$email', '$branch_id', '$type', '$course_id', '$package_id', '$college_courses_id', '$subject_id', '$user_type', '$str', '$remarks', '$addedby', '$created_at');";
        $res = mysqli_query($con,$qo);
        if($qo){
            $record=array('status'=>$foo ,'msg'=>"Data Success");
        }else{
            $record=array('status'=>$faa ,'msg'=>"Somthing wrong");
        } 
    }
}else{
    $record=array('status'=>$faa ,'msg'=>"Enter gr_id as body parameter first.",'data'=>"");
}
header('Content-type: application/json');
echo json_encode($record);     
?>