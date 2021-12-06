<?php
include 'config_api.php';
$email = $_POST['email'];
$password = $_POST['password'];
$mac_id = $_POST["mac_id"];
if ($email != '' && $password != '' && $mac_id != '') {
    $query_admin = "select * from admin where `email`='$email' AND `password`='$password'";
    $query_admin1 = mysqli_query($con, $query_admin);
    $query_faculty = "select * from faculty where `email`='$email' AND `password`='$password'";
    $query_faculty1 = mysqli_query($con, $query_faculty);
    $query_faculty2 = mysqli_fetch_array($query_faculty1);
    $query_hod = "select * from hod where `email`='$email' AND `password`='$password'";
    $query_hod1 = mysqli_query($con, $query_hod);
    $query_hod2 = mysqli_fetch_array($query_hod1);
    $query_user = "select * from user where `email`='$email' AND `password`='$password'";
    $query_user1 = mysqli_query($con, $query_user);
    $query_user2 = mysqli_fetch_array($query_user1);
    $query_admin2 = mysqli_fetch_array($query_admin1);
    if (!empty($query_admin2['email']) && !empty($query_admin2['password'])) {
        $data = explode(',', $query_admin2['permission']);
        $name = $query_admin2['name'];
        $image = $query_admin2['image'];
        $user_id = $query_admin2['id'];
        $logtype = $query_admin2['logtype'];
        if (in_array('Leads', $data)) {
            $record = array('status' => 2, 'msg' => "success Login", "permission" => 1, "admin" => 1, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
        } else {
            // $record =  array('status'=>0,'msg'=>"You Have no Permission","permission"=>0);
            $record = array('status' => 2, 'msg' => "success Login", "permission" => 0, "admin" => 1, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
        }
    } else if (!empty($query_faculty2['email']) && !empty($query_faculty2['password'])) {
        $data1 = explode(',', $query_faculty2['permission']);
        $name = $query_faculty2['name'];
        $image = $query_faculty2['image'];
        $admin = $query_faculty2['app_admin'];
        $user_id = $query_faculty2['faculty_id'];
        $logtype = $query_faculty2['logtype'];
        if ($query_faculty2['status'] == "0") {
            if ($query_faculty2['crm_mac_id'] == "") {
                $sql2 = "UPDATE faculty SET crm_mac_id='$mac_id' WHERE faculty_id='" . $query_faculty2['faculty_id'] . "' ";
                $con->query($sql2);
                if (in_array('Leads', $data1)) {
                    $record = array('status' => 1, 'msg' => "First Login success!", "permission" => 1, "admin" => $admin, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
                } else {
                    $record = array('status' => 1, 'msg' => "First Login success!", "permission" => 0, "admin" => $admin, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
                    // $record =  array('status'=>0,'msg'=>"You Have no Permission","permission"=>0);
                    
                }
            } else if ($query_faculty2['crm_mac_id'] == $mac_id) {
                if (in_array('Leads', $data1)) {
                    $record = array('status' => 2, 'msg' => "success Login!!", "permission" => 1, "admin" => $admin, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
                } else {
                    $record = array('status' => 2, 'msg' => "success Login!!", "permission" => 0, "admin" => $admin, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
                    // $record =  array('status'=>0,'msg'=>"You Have no Permission","permission"=>0);
                    
                }
            } else if ($query_faculty2['crm_mac_id'] == "1") {
                $record = array('status' => 3, 'msg' => "Your Account is Disable Contact Admin", "permission" => 0, "admin" => $admin, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
            } else {
                $record = array('status' => - 1, 'msg' => "This is Not Your Device!!", "permission" => 0, "admin" => $admin, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
            }
        } else {
            $record = array('status' => 3, 'msg' => "Your Account is Disable Contact Admin", "permission" => 0, "admin" => $admin, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
        }
    } else if (!empty($query_hod2['email']) && !empty($query_hod2['password'])) {
        $name = $query_hod2['name'];
        $image = $query_hod2['image'];
        $data2 = explode(',', $query_hod2['permission']);
        $admin = $query_hod2['app_admin'];
        $user_id = $query_hod2['hod_id'];
        $logtype = $query_hod2['logtype'];
        if ($query_hod2['status'] == "0") {
            if ($query_hod2['crm_mac_id'] == "") {
                $sql2 = "UPDATE hod SET crm_mac_id='$mac_id' WHERE hod_id='" . $query_hod2['hod_id'] . "' ";
                $con->query($sql2);
                if (in_array('Leads', $data2)) {
                    $record = array('status' => 1, 'msg' => "First Login success!!", "permission" => 1, "admin" => $admin, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
                } else {
                    $record = array('status' => 1, 'msg' => "First Login success!!", "permission" => 0, "admin" => $admin, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
                    // $record =  array('status'=>0,'msg'=>"You Have no Permission","permission"=>0);
                    
                }
            } else if ($query_hod2['crm_mac_id'] == $mac_id) {
                if (in_array('Leads', $data2)) {
                    $record = array('status' => 2, 'msg' => "success Login!!", "permission" => 1, "admin" => $admin, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
                } else {
                    $record = array('status' => 2, 'msg' => "success Login!!", "permission" => 0, "admin" => $admin, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
                    // $record =  array('status'=>0,'msg'=>"You Have no Permission","permission"=>0);
                    
                }
            } else if ($query_hod2['crm_mac_id'] == "1") {
                $record = array('status' => 3, 'msg' => "Your Account is Disable Contact Admin", "permission" => 0, "admin" => $admin, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
            } else {
                $record = array('status' => - 1, 'msg' => "This is Not Your Device!!", "permission" => 0, "admin" => $admin, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
            }
        } else {
            $record = array('status' => 3, 'msg' => "Your Account is Disable Contact Admin", "permission" => 0, "admin" => $admin, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
        }
    } else if (!empty($query_user2['email']) && !empty($query_user2['password'])) {
        $name = $query_user2['name'];
        $image = $query_user2['image'];
        $data3 = explode(',', $query_user2['permission']);
        $admin = $query_user2['app_admin'];
        $user_id = $query_user2['user_id'];
        $logtype = $query_user2['logtype'];
        if ($query_user2['status'] == "0") {
            if ($query_user2['crm_mac_id'] == "") {
                $sql2 = "UPDATE user SET crm_mac_id='$mac_id' WHERE user_id='" . $query_user2['user_id'] . "' ";
                $con->query($sql2);
                if (in_array('Leads', $data3)) {
                    $record = array('status' => 1, 'msg' => "First Login success!", "permission" => 1, "admin" => $admin, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
                } else {
                    $record = array('status' => 1, 'msg' => "First Login success!", "permission" => 0, "admin" => $admin, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
                }
            } else if ($query_user2['crm_mac_id'] == $mac_id) {
                if (in_array('Leads', $data3)) {
                    $record = array('status' => 2, 'msg' => "success Login!!", "permission" => 1, "admin" => $admin, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
                } else {
                    $record = array('status' => 2, 'msg' => "success Login!!", "permission" => 0, "admin" => $admin, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
                }
            } else if ($query_user2['crm_mac_id'] == "1") {
                $record = array('status' => 3, 'msg' => "Your Account is Disable Contact Admin", "permission" => 0, "admin" => $admin, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
            } else {
                $record = array('status' => - 1, 'msg' => "This is Not Your Device!!", "permission" => 0, "admin" => $admin, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
            }
            // $record =  array('status'=>1,'msg'=>"success Login","permission"=>1,'name'=>$name,'image'=>$image);
            
        } else {
            $record = array('status' => 3, 'msg' => "Your Account is Disable Contact Admin", "permission" => 0, "admin" => $admin, 'name' => $name, 'image' => $image, 'user_id' => $user_id, 'logtype' => $logtype);
        }
    } else {
        $record = array('status' => 0, 'msg' => "Enter Valid email & Password");
    }
} else {
    $record = array('status' => 0, 'msg' => "Fields are not blank");
}
echo json_encode($record);
?>

