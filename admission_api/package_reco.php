<?php 

include('config_api.php');
ob_start();

$foo = true;
$faa = false;
$package_id = $_POST['package_id'];
if($package_id != ""){ 
    $query = "SELECT * FROM rnw_package WHERE package_id='$package_id'";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result)>=1){
        while($row2 = mysqli_fetch_assoc($result)){ 
            $data[] = $row2;
        }
    $record = array('status' => $foo, 'msg' => "Data Success", 'data'=>$data);
    } else {            
        $record = array('status' => $faa, 'msg' => "Package ID not found.", 'data'=>"");
    }
} else {
    $record = array('status' => $faa, 'msg' => "Enter Package ID as body parameter first.", 'data'=>"");
}
header('Content-type: text/json');
echo json_encode($record,JSON_PRETTY_PRINT);

?>