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

                $name = "";
                if (isset($column[0])) {
                    $name = mysqli_real_escape_string($conn, $column[0]);
                }
                $grid = "";
                if (isset($column[1])) {
                    $grid = mysqli_real_escape_string($conn, $column[1]);
                }
            
                if($grid != '') 
                {
                    echo "<script>window.open('https://demo.rnwmultimedia.com/gim_exam/view_paper.php?grid=".$grid."&schedule_id=6');</script>";

                }
                  
                    // start code

                    
            
                    
                }
                
        }
     }
        // header('location:grid_wise_student_excel.php');
     ?>
      
     <?php
?>
