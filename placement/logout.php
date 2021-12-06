<?php

ob_start();

session_start();
unset($_SESSION['record']);
session_destroy();

header('location:index.php');

?>