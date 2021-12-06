<?php  

    ob_start();
    include('config.php');

    $failedRecords = [];

    
    if(isset($_REQUEST['submit'])){
    
            $fileName = $_FILES["file"]["tmp_name"];
            
            if ($_FILES["file"]["size"] > 0) {
                
                $file = fopen($fileName, "r");

                
                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                    
                    $ex1 = "";
                    if (isset($column[0])) {
                        $ex1 = mysqli_real_escape_string($conn, $column[0]);
                    }
                    $ex2 = "";
                    if (isset($column[1])) {
                        $ex2 = mysqli_real_escape_string($conn, $column[1]);
                    }
                    $grid = "";
                    if (isset($column[2])) {
                        $grid = mysqli_real_escape_string($conn, $column[2]);
                    }
                    $ex3 = "";
                    if (isset($column[3])) {
                        $ex3 = mysqli_real_escape_string($conn, $column[3]);
                    }
                    $ex4 = "";
                    if (isset($column[4])) {
                        $ex4 = mysqli_real_escape_string($conn, $column[4]);
                    }
                    $psd_w = "";
                    if (isset($column[5])) {
                        $psd_w = mysqli_real_escape_string($conn, $column[5]);
                    }
                    $psd_g = "";
                    if (isset($column[6])) {
                        $psd_g = mysqli_real_escape_string($conn, $column[6]);
                    }
                    $ex5 = "";
                    if (isset($column[7])) {
                        $ex5 = mysqli_real_escape_string($conn, $column[7]);
                    }
                    $ex6 = "";
                    if (isset($column[8])) {
                        $ex6 = mysqli_real_escape_string($conn, $column[8]);
                    }
                    $ex7 = "";
                    if (isset($column[9])) {
                        $ex7 = mysqli_real_escape_string($conn, $column[9]);
                    }
                    $ex8 = "";
                    if (isset($column[10])) {
                        $ex8 = mysqli_real_escape_string($conn, $column[10]);
                    }
                    $ex9 = "";
                    if (isset($column[11])) {
                        $ex9 = mysqli_real_escape_string($conn, $column[11]);
                    }
                    $c_lang = "";
                    if (isset($column[12])) {
                        $c_lang = mysqli_real_escape_string($conn, $column[12]);
                    }
                    $ex10 = "";
                    if (isset($column[13])) {
                        $ex10 = mysqli_real_escape_string($conn, $column[13]);
                    }
                    $animate = "";
                    if (isset($column[14])) {
                        $animate = mysqli_real_escape_string($conn, $column[14]);
                    }
                    $drawing = "";
                    if (isset($column[15])) {
                        $drawing = mysqli_real_escape_string($conn, $column[15]);
                    }

                    $s_id = "";
                    if (isset($column[16])) {
                        $s_id = mysqli_real_escape_string($conn, $column[16]);
                    }


                    $sql = "SELECT * FROM gim_marks WHERE grid='$grid' AND schedule_id='".$s_id."'";
                    $res = mysqli_query($conn,$sql);
                    
                    if(mysqli_num_rows($res) == 1){
                        $nq = "UPDATE gim_marks SET psd='$psd_w', psd_g='$psd_g', animate='$animate', c_lang='$c_lang', drawing='$drawing', logic='$ex10' WHERE grid='$grid' AND schedule_id='".$s_id."'";
                    } else {
                        $nq = "INSERT INTO gim_marks(grid, psd, psd_g, animate, c_lang, drawing, schedule_id, logic) VALUES('$grid', '$psd_w', '$psd_g', '$animate', '$c_lang', '$drawing', '".$s_id."', '$ex10')";
                    }

                    echo "$nq<br />";
                    $res = mysqli_query($conn, $nq);
            
                    if(mysqli_affected_rows($conn) == 1){
                        
                        // header('location: students.php');
                        echo "<p style='color:green'>Succes</p><br>";
                        
                    }
                    else{
                        
                        echo "<p style='color:red'>NO".mysqli_error($conn)."</p><br>";
                        
                        
                    }

                       
                      
                        
                }

                echo "<pre> Failed to insert these GRIDs <br>";
                    // print_r($failedRecords);
                echo "</pre>";
        }

    }

   
   

?>