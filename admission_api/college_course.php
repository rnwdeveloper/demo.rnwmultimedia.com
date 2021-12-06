<?php 

include('config_api.php');
ob_start();

$foo = true;
$faa = false;

$college_courses_id = $_POST['college_courses_id'];

if($college_courses_id != ""){ 

    $query = "SELECT * FROM college_courses WHERE college_courses_id ='$college_courses_id'";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result)>=1){
        while($row2 = mysqli_fetch_assoc($result)){ 
            $data[] = $row2;
        }

    $record = array('status' => $foo, 'msg' => "Data Success", 'data'=>$data);
    } else {            
        $record = array('status' => $faa, 'msg' => "College course ID not found.", 'data'=>"");
    }

} else {
    $record = array('status' => $faa, 'msg' => "Enter College course ID as body parameter first.", 'data'=>"");
}
header('Content-type: text/json');
echo json_encode($record,JSON_PRETTY_PRINT);

?>