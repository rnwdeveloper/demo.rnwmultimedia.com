<?php 

    ob_start();
    session_start();
    include('config.php');
    

    $q = "SELECT * FROM gim_logic_ans WHERE grid='1209'";

    $re = mysqli_query($conn,$q);

    while($row = mysqli_fetch_assoc($re)){

        $ori = array();
        $data = array();

        $question = explode("#",$row['que']);

        $sql = "SELECT id FROM gim_logic";

        $res = mysqli_query($conn,$sql);

        while($r = mysqli_fetch_assoc($res)){

            $ori[] = $r;


        }
        print_r($question);

        for ($i=0; $i <sizeof($question) ; $i++) {         

            for ($j=0; $j <sizeof($ori) ; $j++) {         
            
                // echo $question[$j]." ";
                if($question[$j] == $j){
                    $data[] = $ori['id'];
                }

            }    

        }

        print_r($data);

        echo "<br><br>";

    }

    
    
    ?>