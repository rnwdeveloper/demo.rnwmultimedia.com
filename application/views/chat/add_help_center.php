<?php 
include('config_api.php');
session_start();
// print_r($_SESSION);
// die;
ob_start();
$_SESSION['username'] = "Hitesh Desai";
$name=$_POST['name'];
$email=$_POST['email'];
$contact_no=$_POST['contact_no'];
$branch_id=$_POST['branch_id'];
$department_id=$_POST['department_id']; 
$url=$_POST['url'];
$addedby=$_SESSION['username'];
$created_at= date('Y-m-d h:i:s');
    $query="INSERT INTO `help_center` ( `name`, `email`, `contact_no`, `branch_id`, `department_id`, `url`, `addedby`, `created_at`) VALUES ('$name', '$email', '$contact_no', '$branch_id', '$department_id', '$url', '$addedby', '$created_at');";
    $result=mysqli_query($con,$query);
    
    if($query){
        $record=array('status'=>http_response_code(),'msg'=>"Data Success");
    }else{
        $record=array('status'=>http_response_code(),'msg'=>"Somthing wrong");
    }
    header('Content-type: application/json');
    echo json_encode($record);     
?>