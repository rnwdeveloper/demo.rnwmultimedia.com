<?php


$servername = "localhost";
$username = "rnwsoftt_mzfrxmujjb";
$password = "nathikevo#@!2021";
$db = "rnwsoftt_mzfrxmujjb";
header("Content-Type: application/json");
$con = mysqli_connect($servername, $username, $password,$db);
  // $student_gr_id=$_POST['gr_id'];


//when user sent request firt record gos to update from eduzilla
 $select=mysqli_query($con,"select course_id, department_id, RelevantCourse_id,course_name, course_detail, course_fees, installment, course_duration, jobg, csigning_sheet from course") or die(mysqli_error($con));


while($qu2 = mysqli_fetch_assoc($select))
{

	$record[] = $qu2;
}


for($i = 0;  $i<sizeof($record);  $i++)
{
	$new_record[] = array('department_id'=>$record[$i]['department_id'],'department_name'=> $record[$i]['department_name'] ); 
}


// print_r($new_record);

echo json_encode($record);


?>