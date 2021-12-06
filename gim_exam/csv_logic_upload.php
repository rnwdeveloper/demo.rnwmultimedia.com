<?php  

    ob_start();
    include('config.php');

    $failedRecords = [];

    
    if(isset($_REQUEST['submit'])){
    
            $fileName = $_FILES["file"]["tmp_name"];
            
            if ($_FILES["file"]["size"] > 0) {
                
                $file = fopen($fileName, "r");
                
                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                    
                    $question = "";
                    if (isset($column[0])) {
                        $question = mysqli_real_escape_string($conn, $column[0]);
                    }
                    $a = "";
                    if (isset($column[1])) {
                        $a = mysqli_real_escape_string($conn, $column[1]);
                    }
                    $b = "";
                    if (isset($column[2])) {
                        $b = mysqli_real_escape_string($conn, $column[2]);
                    }
                    $c = "";
                    if (isset($column[3])) {
                        $c = mysqli_real_escape_string($conn, $column[3]);
                    }
                    $d = "";
                    if (isset($column[4])) {
                        $d = mysqli_real_escape_string($conn, $column[4]);
                    }
                    
                    $ans = "";
                    if (isset($column[5])) {
                        $ans = mysqli_real_escape_string($conn, $column[5]);
                    }



                    // $arr_branch = array("RW1","RW2","RW4");

                    // $select_branch = array_rand($arr_branch,1)
                    
                    // $que = "SELECT * FROM gim_students WHERE `e_branch`='$e_branch'";

                    // $re = mysqli_query($conn,$que);

                    

                       
                        $sqlInsert = "INSERT into gim_logic (que,a,b,c,d,ans,status)
                        values ('$question','$a','$b','$c','$d','$ans','1')";

                        $insertId = mysqli_query($conn, $sqlInsert);

                        if (! empty($insertId)) {
                            $type = "success";
                            echo "<p style='color:green'>CSV Data Imported into the Database $exam_branch_code<br></p>";
                        } else {
                            
                            $type = "error";
                            echo "<p style='color:red'>Problem in Importing CSV Data  $sqlInsert<br>";
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn)."</p>";
                        }

                        
                }

                echo "<pre> Failed to insert these GRIDs <br>";
                    // print_r($failedRecords);
                echo "</pre>";
        }

    }

   
   

?>