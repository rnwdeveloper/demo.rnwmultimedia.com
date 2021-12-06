<?php 


    ob_start();

    session_start(); 

    include('config.php');
    // $sql = "UPDATE INTO gim_question SET `status`='0'";
    // $res1 = mysqli_query($conn,$sql);

    $que = "SELECT * FROM gim_logic";
    $res = mysqli_query($conn,$que);

    while($row = mysqli_fetch_assoc($res)){

        $id = $row['id'];
        $sql = "UPDATE gim_logic SET status='0' WHERE id='$id'";

        echo "<p style='color:darkblue'>".$row['status']."</p><br>";
        
        
        if(mysqli_query($conn,$sql)){
            echo "<p style='color:green'>Done</p><br>";
        } else {
            echo "<p style='color:red'>Failed :- ".mysqli_error($conn)."</p><br>";
        }

    }


?>