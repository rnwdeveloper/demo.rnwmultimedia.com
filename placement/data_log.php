<?php
ob_start();
session_start();
session_destory();
header('location:backup_index.php');

?>

