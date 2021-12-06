<?php 

include('config_api.php');
ob_start();

$foo = true;
$faa = false;
$department_id = $_POST['department_id'];
if($department_id != ""){ 
    $query = "SELECT * FROM department WHERE department_id='$department_id'";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result)>=1){
        while($row2 = mysqli_fetch_assoc($result)){ 
            $data[] = $row2;
        }
    $record = array('status' => $foo, 'msg' => "Data Success", 'data'=>$data);
    } else {            
        $record = array('status' => $faa, 'msg' => "Department id not found.", 'data'=>"");
    }
} else {
    $record = array('status' => $faa, 'msg' => "Enter Department ID as body parameter first.", 'data'=>"");
}
header('Content-type: text/json');
echo json_encode($record,JSON_PRETTY_PRINT);

?>