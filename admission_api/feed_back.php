<?php 
include('config_api.php');
ob_start();
$foo = true;
$faa = false;
$gr_id=$_POST['gr_id'];
if($gr_id!=""){
    $query="SELECT * FROM feedback WHERE gr_id='$gr_id'";
    $result=mysqli_query($con,$query);
    
    if(mysqli_num_rows($result)>=1){
        
        while($row1=mysqli_fetch_assoc($result)){
            $data[]=$row1;}$record=array('status'=>$foo,'msg'=>"Data Success",'data'=>$data);
        }else{
            $record=array('status'=>$faa,'msg'=>"GR ID not found.",'data'=>"");
        }
    }else{
        $record=array('status'=>$faa,'msg'=>"Enter gr_id as body parameter first.",'data'=>"");
    }
    header('Content-type: application/json');
    echo json_encode($record); 
?>