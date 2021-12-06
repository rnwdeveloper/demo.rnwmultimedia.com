<?php
session_start();
  include('db.php');
  if(isset($_POST['submit']))
  {
    $username = $_POST['email_login'];
    $pass = $_POST['password_login'];
    $qu ="select * from application_job where `username`='$username' AND `password`='$pass'";
    $qu1 = mysqli_query($con,$qu);
    $qu2 = mysqli_fetch_array($qu1);
    $num =  mysqli_num_rows($qu1);
    if($num == 1)
    {
     
      if($qu2['application_status']=='1')
      {
         $_SESSION['student_record'] = $qu2;
         $_SESSION['login_data'] ="successfully Login";
         echo "1";
      }
      else
      {
        echo "2";
      }
    }
    else
    {
       echo "0";
    }
  }
?>   