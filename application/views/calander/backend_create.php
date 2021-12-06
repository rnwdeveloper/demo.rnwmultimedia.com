<?php
require_once '_db.php';

$con = mysqli_connect("localhost","mzfrxmujjb","Q23bQYkskc","mzfrxmujjb");
$insert = "INSERT INTO event (name, start, end) VALUES ('".$_POST['name']."', '".$_POST['start']."', '".$_POST['end']."')";

$stmt = mysqli_query($con,$insert);

// $stmt->bindParam(':start', $_POST['start']);
// $stmt->bindParam(':end', $_POST['end']);
// $stmt->bindParam(':name', $_POST['name']);

// $stmt->execute();

// class Result {}

// $response = new Result();
// $response->result = 'OK';
// $response->id = $db->lastInsertId();
// $response->message = 'Created with id: '.$db->lastInsertId();

//header('Content-Type: application/json');
//echo json_encode($response);
