<?php

    session_start();
    ob_start();

    include('conn.php'); 

    $lab = $_POST['lab'];
    $time = $_POST['time'];

    if($lab == "lab_a"){
        $que = "SELECT * FROM lab_a WHERE time='$time'";
        $_SESSION['lab'] = "A";
    } 
    if ($lab == "lab_b") {
        $que = "SELECT * FROM lab_b WHERE time='$time'";
        $_SESSION['lab'] = "B";
    }

    $result = mysqli_query($conn, $que);

?>

<table class="table table-bordered border-dark">
                    <tr class="text-center">
                        <th width="10%">PC NO.</th>
                        <th>STUDENT'S NAME</th>
                        <th width="20%">GR ID</th>
                        <th width="10%">ACTION</th>
                    </tr>

                    <?php 
                    
                    while($row = mysqli_fetch_assoc($result)) {
                       
                    ?>
                    <tr>
                        <td><?php echo $row['pc'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['grid'] ?></td>
                        <td><a href="gm_login_form.html"><i class="far fa-edit"></i></a></td>
                    </tr>
                    <?php } ?>
</table>