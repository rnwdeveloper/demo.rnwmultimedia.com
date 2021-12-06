<?php


$servername = "68.183.81.191";
$username = "mzfrxmujjb";
$password = "Q23bQYkskc";
$db = "mzfrxmujjb";

$con = mysqli_connect($servername, $username, $password,$db);
  // $student_gr_id=$_POST['gr_id'];

header("Content-Type: application/json");
//when user sent request firt record gos to update from eduzilla
 $select=mysqli_query($con,"select package_id, department_id, RelevantCourse_id,package_name ,package_code,  course_ids, package_fees, installment, package_duration, jobg, psigning_sheet from package") or die(mysqli_error($con));


while($qu2 = mysqli_fetch_assoc($select))
{

	$record[] = $qu2;
}




// print_r($new_record);

echo json_encode($record);


?>