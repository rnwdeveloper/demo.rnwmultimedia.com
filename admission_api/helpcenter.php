<?php 
include('config_api.php');
ob_start();
$foo = true;
$faa = false;
$email=$_POST['email'];
if($email!=""){
    $query="SELECT * FROM help_center WHERE email='$email'";
    $result=mysqli_query($con,$query);
    
    if(mysqli_num_rows($result)>=1){
        while($row1=mysqli_fetch_assoc($result)){
            $data[]=$row1;}$record=array('status'=>$foo,'msg'=>"Data Success",'data'=>$data);
        }else{
            $record=array('status'=>$faa,'msg'=>"Email not found.",'data'=>"");
        }
    }else{
        $record=array('status'=>$faa,'msg'=>"Enter Email as body parameter first.",'data'=>"");
    }
    header('Content-type: application/json');
    echo json_encode($record); 
?>