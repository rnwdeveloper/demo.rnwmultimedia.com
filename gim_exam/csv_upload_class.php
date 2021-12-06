<?php  

    ob_start();
    include('config.php');

    $failedRecords = [];

    $sch1 = "SELECT * FROM gim_schedule";

    $ans = mysqli_query($conn,$sch1);

    while($data_e = mysqli_fetch_assoc($ans)) {
        $new_e[] = $data_e;
        
    }

    

    if(isset($_REQUEST['submit'])){

    
            $fileName = $_FILES["file"]["tmp_name"];
            
            if ($_FILES["file"]["size"] > 0) {
                
                $file = fopen($fileName, "r");
                
                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                    
                    $grid = "";
                    if (isset($column[0])) {
                        $grid = mysqli_real_escape_string($conn, $column[0]);
                    }
                   
                    $p_class = "";
                    if (isset($column[1])) {
                        $p_class = mysqli_real_escape_string($conn, $column[1]);
                    }

                    $c_class = "";
                    if (isset($column[2])) {
                        $c_class = mysqli_real_escape_string($conn, $column[2]);
                    }

                    $a_class = "";
                    if (isset($column[3])) {
                        $a_class = mysqli_real_escape_string($conn, $column[3]);
                    }

                    

                    echo "<h1> -- $grid </h1>";

                    // $arr_branch = array("RW1","RW2","RW4");

                    // $select_branch = array_rand($arr_branch,1)
                    
                    // $que = "SELECT * FROM gim_students WHERE `e_branch`='$e_branch'";

                    // $re = mysqli_query($conn,$que);

                    

                   

                    $sq = "SELECT * FROM gim_students WHERE `grid`='$grid'";

                    $res = mysqli_query($conn, $sq);

                    if(mysqli_num_rows($res)>0){

                     
                        
                            $sqlInsert = "UPDATE gim_students SET `p_class`='$p_class', `c_class`='$c_class', `a_class`='$a_class' WHERE `grid`='$grid'";
                         
                            $insertId = mysqli_query($conn, $sqlInsert);

                            if (! empty($insertId)) {
                                $type = "success";
                                echo "CSV Data Imported into the Database   $exam_branch_code<br>";
                            } else {
                                
                                $type = "error";
                                echo "Problem in Importing CSV Data  $exam_branch_code<br>";
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                        // }

                        
                    }
                    else{
                        array_push($failedRecords, $column[0]);
                    }
                }

                echo "<pre> Failed to insert these GRIDs <br>";
                    print_r($failedRecords);
                echo "</pre>";
        }

    }

   
    function getexamdate($new_ex){

        ob_start();
        include('config.php');
  

        // $s = sizeof($new_ex);
        
        
        // $select_e = rand(0,1);
        $select_e = 3;
        
        // $schedule_id = $new_ex[$select_e]['id'];
        $sch2 = "SELECT * FROM gim_students WHERE schedule_id='4'";
        
        $schedule_res = mysqli_query($conn, $sch2);
        $schedule_count = mysqli_num_rows($schedule_res);
            
        if($new_ex[$select_e]['total'] <= $schedule_count){
            echo $schedule_id." ".$select_e."<br>";
           
            getexamdate($new_ex);
        } else {

            $a = array("id"=>$schedule_id,"branch"=>getrandome($new_ex,$select_e));
           
            return $a;
            // $exam_branch_code = getrandome($new_ex,$select_e);

                        

        }


    }

     
    function getrandome($new_ar,$sel_e) {

        
        // print_r($new_ex[$select_branch]);
        
        // exit;
        
       
            
            include('config.php');

            $sche_id = $new_ar[$sel_e]['id'];

            $arr_branch = array("RW1");
        
            $select_branch = array_rand($arr_branch,1);
            
            $resss = $arr_branch[$select_branch];

            print_r($new_ar[$sel_e]);
            
            
            $que = "SELECT * FROM gim_students WHERE e_branch='$resss' and schedule_id='$sche_id'";
            
            $re = mysqli_query($conn, $que);
            $count = mysqli_num_rows($re);
            
            echo $new_ar[$sel_e]['rw1']."<br>";
            
            // $re = $conn->query($sql);
            // $count = $re->num_rows;
            
            
            echo "<br>".$count."<br>".$arr_branch[$select_branch];
            // exit;
            
            if($arr_branch[$select_branch] =="RW1"){

                if($count>=$new_ar[$sel_e]['rw1']){
                    
                    unset($arr_branch[0]);
                    getrandome($new_ar,$sel_e);

                }

            } else if($arr_branch[$select_branch] =="RW2"){

                if($count>=$new_ar[$sel_e]['rw2']){

                    unset($arr_branch[1]);
                    getrandome($new_ar,$sel_e);

                }

            } else if($arr_branch[$select_branch] =="RW3"){

                if($count>=$new_ar[$sel_e]['rw3']){

                    unset($arr_branch[1]);
                    getrandome($new_ar,$sel_e);

                }

            } else if($arr_branch[$select_branch] =="RW4"){

                if($count>=$new_ar[$sel_e]['rw4']){

                    unset($arr_branch[2]);
                    getrandome($new_ar,$sel_e);

                }

            }

            echo "Hello -> ";
            print_r($arr_branch);

            return $arr_branch[$select_branch];

       
    }

?>