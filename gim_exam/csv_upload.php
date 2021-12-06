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
                    $fname = "";
                    if (isset($column[1])) {
                        $fname = mysqli_real_escape_string($conn, $column[1]);
                    }
                    $lname = "";
                    if (isset($column[2])) {
                        $lname = mysqli_real_escape_string($conn, $column[2]);
                    }
                    $batch_time = "";
                    if (isset($column[3])) {
                        $batch_time = mysqli_real_escape_string($conn, $column[3]);
                    }
                    $branch = "";
                    if (isset($column[4])) {
                        $branch = mysqli_real_escape_string($conn, $column[4]);
                    }
                    
                    $p_class = "";
                    if (isset($column[5])) {
                        $p_class = mysqli_real_escape_string($conn, $column[5]);
                    }

                    $c_class = "";
                    if (isset($column[6])) {
                        $c_class = mysqli_real_escape_string($conn, $column[6]);
                    }

                    $a_class = "";
                    if (isset($column[7])) {
                        $a_class = mysqli_real_escape_string($conn, $column[7]);
                    }

                    $email = "";
                    if (isset($column[8])) {
                        $email = mysqli_real_escape_string($conn, $column[8]);
                    }

                    $status = "";
                    if (isset($column[9])) {
                        $status = mysqli_real_escape_string($conn, $column[9]);
                    } else {
                        $status = "1";
                    }

                    $e_date = "";
                    if (isset($column[11])) {
                        $e_date = mysqli_real_escape_string($conn, $column[11]);
                    } 

                    $e_branch = "";
                    if (isset($column[12])) {
                        $e_branch = mysqli_real_escape_string($conn, $column[12]);
                    }

                   

                    // $arr_branch = array("RW1","RW2","RW4");

                    // $select_branch = array_rand($arr_branch,1)
                    
                    // $que = "SELECT * FROM gim_students WHERE `e_branch`='$e_branch'";

                    // $re = mysqli_query($conn,$que);

                    

                   

                    $sq = "SELECT * FROM gim_students WHERE grid='$grid'";

                    $res = mysqli_query($conn, $sq);

                    if(mysqli_num_rows($res)<1){

                        // $e = getexamdate($new_e);
                        // $exam_branch_code = $e['branch'];
                        $exam_branch_code = $e_branch;
                        echo "<h1>$fname -- $grid </h1>";
                        // $sch_id = $e['id'];
                        if($exam_branch_code != ""){

                        
                            $sqlInsert = "INSERT into gim_students (grid,fname,lname,batch_time,branch,e_branch,p_class,c_class,a_class,email,hall_t,schedule_id)
                            values ($grid,'$fname','$lname','$batch_time','$branch','$e_branch','$p_class','$c_class','$a_class','$email','$status','$e_date')";

                            $insertId = mysqli_query($conn, $sqlInsert);

                            if (! empty($insertId)) {
                                $type = "success";
                                echo "CSV Data Imported into the Database   $exam_branch_code<br>";
                            } else {
                                
                                $type = "error";
                                echo "Problem in Importing CSV Data  $exam_branch_code<br>";
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                        }

                        
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