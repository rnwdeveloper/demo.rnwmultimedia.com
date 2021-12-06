<?php  

    ob_start();
    include('config.php');


    

    if(isset($_REQUEST['submit'])){
        $fileName = $_FILES["file"]["tmp_name"];
        if($_FILES["file"]["size"] > 0) 
        {
     
            $file = fopen($fileName, "r");
            //make excel file
            $delimiter = ",";
            $filename = "members_" . date('Y-m-d') . ".csv";
            $f = fopen('php://memory', 'w');
            $fields = array('No', 'Branch', 'GR ID', 'First Name', 'Last Name','Course_package','course','Mobile(s)','Parent');
            fputcsv($f, $fields, $delimiter);
            //end file name
            // echo "<pre>";

            $number = 1;

            while (($column = fgetcsv($file, 10000, ",")) !== FALSE) 
            {
                $grid = "";
                if (isset($column[0])) 
                {
                    $grid = mysqli_real_escape_string($conn, $column[0]);
                }
            
                if($grid != '') 
                {
                    $secretKey = '6Ld8n2caAAAAAOQO-Ix5QC2kpkcbfCXiRUieHUay'; 
                    $_SESSION['grId'] =  $grid;
                    $service_url = 'https://erp.eduzilla.in/api/students/details';
                    $curl = curl_init($service_url);
                    $curl_post_data = array(
                        'GR_ID' => $grid,
                        'Inst_code' => 'RNWEDU',
                        'Inst_security_code' => 'rnw',
                     );
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_POST, true);
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
                    $curl_response = curl_exec($curl);
                    if ($curl_response === false) 
                    {
                        $info = curl_getinfo($curl);
                        curl_close($curl);
                        die('error occured during curl exec. Additioanl info: ' . var_export($info));
                    }
                    curl_close($curl);
                    $decode = json_decode($curl_response);
                    // $send_email_id = $decode->data[0]->email;
                    // $send_mobile_no =  $decode->data[0]->mobile;
                    // print_r($decode->data[0]);
                    $branch_name = $decode->data[0]->branch_name;
                    $fname = $decode->data[0]->fname;
                    $lname = $decode->data[0]->lname;
                    $course_package = $decode->data[0]->course_package;
                    $course = $decode->data[0]->course;
                    $mobile = $decode->data[0]->mobile;
                    $parent_mobile = $decode->data[0]->father_mobile;
                }
                  
                    // start code
                    
            
                    if(!empty($mobile)){
                        $lineData = array("$number","$branch_name","$grid","$fname","$lname","$course_package","$course", "$mobile", "$parent_mobile");
                        fputcsv($f, $lineData, $delimiter);
                    }
                    $number++;
                }
                fseek($f, 0);
                header('Content-Type: text/csv');
                header('Content-Disposition: attachment; filename="' . $filename . '";');
                fpassthru($f);
        }
     }
        // header('location:grid_wise_student_excel.php');
     ?>
        <script>
            window.location = 'grid_wise_student_upload_file.php';
        </script>
     <?php
?>
