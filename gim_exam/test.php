<?php

    ob_start();
    include('config.php');

    $idd = '5';

    $sql = "SELECT * FROM gim_logic_ans WHERE schedule_id='".$idd."'";

    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)){


        if($row['ans'] != '') {


            $questions =  explode("#",$row['que']);
            $answers = explode("#",$row['ans']);

            $correct = 0;
            $wrong = 0;
            $wr = 0;
            $final = 0;
            $grid = $row['grid'];
        
    
            for($i=0 ; $i<sizeof($questions) ; $i++){
    
                if($answers[$i] != ''){
    
                    $que9 = "SELECT * FROM gim_logic WHERE id='$questions[$i]'";
                    $che = mysqli_query($conn,$que9);
    
                    $an = mysqli_fetch_assoc($che);
    
                    // echo "C = ".$an['ans']."<br>";
                    if($answers[$i]==strtolower($an['ans'])){
                        $correct++;
                    } else {
                        $wrong++;
                    }
    
                    
                }
    
            }

            $wr = $wrong*0.50;

            // $final = $correct-$wr;
            $final = 0;

            $sql9 = "SELECT * FROM gim_marks WHERE grid='$grid' AND schedule_id='$idd'";
            $que9 = mysqli_query($conn,$sql9);
            $con9 = mysqli_num_rows($que9);

            if($con9>0){
                $add9 = "UPDATE gim_marks SET logic='$correct' WHERE grid='$grid' AND schedule_id='".$idd."'";
                echo $row['grid']." = $correct<br>";
            } else {
                $add9 = "INSERT INTO gim_marks (grid,logic,schedule_id) VALUES ('$grid','$correct','".$idd."')";
            }
            
            if(mysqli_query($conn,$add9)){
            }
        }


    }


?>