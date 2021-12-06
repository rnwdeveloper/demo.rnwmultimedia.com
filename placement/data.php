<?php

$conn = mysqli_connect("localhost","root","","myrnwdata");
$name = $_POST['name'];
$qu = "insert into student_applied_job(`response`)values('$name')";

mysqli_query($conn,$qu);



?>