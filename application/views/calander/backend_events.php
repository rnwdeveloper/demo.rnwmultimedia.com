<?php
require_once '_db.php';

$con = mysqli_connect("localhost","mzfrxmujjb","Q23bQYkskc","mzfrxmujjb");

// .events.load() passes start and end as query string parameters by default
// echo "<pre>";
// print_r($_GET);
// die;
$start = $_GET["start"];
$end = $_GET["end"];
    
$stmt = "SELECT * FROM event";

// $stmt->bindParam(':start', $start);
// $stmt->bindParam(':end', $end);

// $stmt->execute();
$q1=mysqli_query($con,$stmt);
$result = mysqli_fetch_all($q1,MYSQLI_ASSOC);

class Event {}
$events = array();

foreach($result as $row) {
  $e = new Event();
  $e->id = $row['id'];
  $e->text = $row['name'];
  $e->start = $row['start'];
  $e->end = $row['end'];
  $events[] = $e;
}

header('Content-Type: application/json');
echo json_encode($events);
