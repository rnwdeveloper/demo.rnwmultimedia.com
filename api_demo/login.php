<?php 

if($_POST['email']!=''){

    if($_POST['password']!= '') {

        if ($_POST['email'] != 'admin@gmail.com'){
            $record = array('status' => 0, 'msg' => "Please Enter Valid Email!!");
        } else if($_POST['password'] != '123456') {
            $record = array('status' => 0, 'msg' => "Please Enter Valid Password!!");
        } else {
            $record = array('status' => 1, 'msg' => "Login Success!");
        }

    } else {
        $record = array('status' => 0, 'msg' => "Please Enter Password");
    }

} else {
    $record = array('status' => 0, 'msg' => "Please Enter email");
}

echo json_encode($record);
?>