<?php
    include('config_api.php');
    ob_start();
    error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);  
     $foo = true;
    $faa = false;

    //$admission_id = $_SESSION['admission_id'];
    $admission_id = $_POST['admission_id'];
    $upload_profile_pic = $_POST['upload_profile_pic'];
    $allowedext =  array('jpg','jpeg','png' ,'pdf');

    if($admission_id != ""){
        $get_reco = "SELECT * FROM student_profile WHERE admission_id='$admission_id'";
        $get_last_reco = mysqli_query($con,$get_reco);
        $res_reco = mysqli_fetch_assoc($get_last_reco);
        if($res_reco == ""){
            $response = array();
            $upload_dir = "http://demo.rnwmultimedia.com/dist/admissiondocuments/";
            $avatar_name = $_FILES["upload_profile_pic"]["name"];
            $avatar_tmp_name = $_FILES["upload_profile_pic"]["tmp_name"];
            $ext = pathinfo($_FILES["upload_profile_pic"]["name"], PATHINFO_EXTENSION);
            $size=$_FILES['upload_profile_pic']['size'];
            if($size > 10485760 && $ext !== 'gif' && $ext !== 'png' && $ext !== 'jpg' && $ext !== 'jpeg'){
                $record = array(
                    "status" => "error",
                    "error" => true,
                    "message" => "File to big for uploading or file type is not correct!"
                );
            }else{
                $random_name = rand(1000,1000000)."-".$avatar_name;
                //$upload_name = $upload_dir.strtolower($random_name);
                $upload_name = $upload_dir .preg_replace('/\s+/', '-', $upload_name);
                move_uploaded_file($avatar_tmp_name , $upload_name);
                $ins_pic = "INSERT into student_profile (`admission_id` , `photos`) VALUES ('$admission_id' , '$random_name')";
                $insert_reco = mysqli_query($con,$ins_pic);

                
                $record = array('status' => $foo, 'msg' => "Data Success", 'Profile Image'=>$random_name);
            }
        }else{
            $response = array();
            $upload_dir = "http://demo.rnwmultimedia.com/dist/admissiondocuments/";
            $avatar_name = $_FILES["upload_profile_pic"]["name"];
            $avatar_tmp_name = $_FILES["upload_profile_pic"]["tmp_name"];
            $size=$_FILES['upload_profile_pic']['size'];
            $ext = pathinfo($_FILES["upload_profile_pic"]["name"], PATHINFO_EXTENSION);
            $size=$_FILES['upload_profile_pic']['size'];
            if($size > 10485760 && $ext !== 'gif' && $ext !== 'png' && $ext !== 'jpg' && $ext !== 'jpeg'){
                $record = array(
                    "status" => "error",
                    "error" => true,
                    "message" => "File to big for uploading or file type is not correct!"
                );
            }else{
                $random_name = rand(1000,1000000)."-".$avatar_name;
                //$upload_name = $upload_dir . preg_replace('/\s+/', '-', $upload_name);
                $upload_name = $upload_dir .strtolower($random_name);
                move_uploaded_file($avatar_tmp_name , $upload_name);
                $upd_pic = "UPDATE `student_profile` SET `photos`='$random_name' where `admission_id` = '$admission_id'";
                $id_pic = mysqli_query($con,$upd_pic);


                $record = array('status' => $foo, 'msg' => "Data Success", 'Profile Image'=>$random_name);
            }
        }
    } else {
        $record = array('status' => $faa, 'msg' => "Enter admission_id as body parameter first.", 'data'=>"");
    }
    header('Content-type: application/json');
    echo json_encode($record);
?>