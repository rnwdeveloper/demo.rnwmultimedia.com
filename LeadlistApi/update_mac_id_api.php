<?php

include 'config_api.php';


    $u_id = $_POST['u_id'];

	$user = $_POST['user'];

	$mac_id = $_POST["mac_id"];



    if($u_id != null && $user != null){



            if($user == 1){

                $sql2 = "UPDATE user SET crm_mac_id='$mac_id' WHERE user_id='".$u_id."' ";

            } else if($user == 2){

                $sql2 = "UPDATE faculty SET crm_mac_id='$mac_id' WHERE faculty_id='".$u_id."' ";

            } else if($user == 3){

                $sql2 = "UPDATE hod SET crm_mac_id='$mac_id' WHERE hod_id='".$u_id."' ";

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