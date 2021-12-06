<?php 

include('config_api.php');
ob_start();

$foo = true;
$faa = false;
$course_id = $_POST['course_id'];
if($course_id != ""){ 

    $query = "SELECT * FROM rnw_course WHERE course_id='$course_id'";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result)>=1){
        while($row2 = mysqli_fetch_assoc($result)){ 
            $data[] = $row2;
        }

    $record = array('status' => $foo, 'msg' => "Data Success", 'data'=>$data);
    } else {            
        $record = array('status' => $faa, 'msg' => "Admission ID not found.", 'data'=>"");
    }

} else {
    $record = array('status' => $faa, 'msg' => "Enter Mobile number as body parameter first.", 'data'=>"");
}
header('Content-type: text/json');
echo json_encode($record,JSON_PRETTY_PRINT);

?>