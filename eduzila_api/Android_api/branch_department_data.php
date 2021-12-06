<?php


$servername = "68.183.81.191";
$username = "mzfrxmujjb";
$password = "Q23bQYkskc";
$db = "mzfrxmujjb";
header("Content-Type: application/json");
$con = mysqli_connect($servername, $username, $password,$db);
  // $student_gr_id=$_POST['gr_id'];


//when user sent request firt record gos to update from eduzilla
 $select=mysqli_query($con,"select * from department") or die(mysqli_error($con));


while($qu2 = mysqli_fetch_array($select))
{
	$record[] = $qu2;
}


for($i = 0;  $i<sizeof($record);  $i++)
{
	$new_record[] = array('department_id'=>$record[$i]['department_id'],'department_name'=> $record[$i]['department_name'] ); 
}

$branch   = "select branch_id,branch_code,branch_name from branch";
$branch1  =  mysqli_query($con,$branch);
$branch2 = mysqli_fetch_all($branch1, MYSQLI_ASSOC);
// print_r($new_record);

echo json_encode(array('department'=>$new_record,'branch'=>$branch2));


?>