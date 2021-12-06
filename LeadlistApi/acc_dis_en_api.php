<?php


    include 'config_api.php';


    $u_id = $_POST['u_id'];

	$user = $_POST['user'];

	$status = $_POST["status"];



    if($u_id != null && $user != null){



            if($user == 1){

                $sql2 = "UPDATE user SET status='$status' WHERE user_id='".$u_id."' ";

            } else if($user == 2){

                $sql2 = "UPDATE faculty SET status='$status' WHERE faculty_id='".$u_id."' ";

            } else if($user == 3){

                $sql2 = "UPDATE hod SET status='$status' WHERE hod_id='".$u_id."' ";

            }

            

            

            if($con->query($sql2) == 1){

                $record =  array('status'=>1,'msg'=>"Update Success...");

            } else {

                $record =  array('status'=>0,'msg'=>"Update Fail...");

            }



    } else {

        $record =  array('status'=>0,'msg'=>"Please Enter Valid Data...");

    }



    echo json_encode($record);



?>