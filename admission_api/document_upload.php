<?php

if(isset($_GET['submit']))
{
	$path = $_FILES['image']['name'];

	$ext = pathinfo($path, PATHINFO_EXTENSION);
	$name = ".".$ext;

	$newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["image"]["name"]));
	
	move_uploaded_file($_FILES['image']['tmp_name'], "admissiondocuments/".$newfilename);
	
	$record = array('status' => 1, 'msg' => "Document Success");

} else {
	$record = array('status' => 0, 'msg' => "Submit Your Document");

}
	header('Content-type: application/json');
	echo json_encode($record);

?>