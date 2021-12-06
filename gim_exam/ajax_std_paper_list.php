<?php

    ob_start();
    include('config.php');

    $grid = $_REQUEST['grid'];

    $que = "SELECT * FROM gim_std_paper WHERE grid='$grid'";

    $res = mysqli_query($conn,$que);




?>

<table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                                while($row = mysqli_fetch_array($res)){ 
                                       
                                                    ?>

                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <?php
                                    $sc = array();
                                    $ids = $row['schedule_id'];
                                    $q = "SELECT * FROM gim_schedule WHERE id='$ids'";
                                    $r = mysqli_query($conn,$q);
                                    while($data = mysqli_fetch_assoc($r)){
                                        $sc[] = $data;
                                    }
                                    
                                    ?>
                                    <td><?php echo $sc[0]['date']; ?></td>
                                    <td><?php echo $sc[0]['time']; ?></td>
                                    <td colspan="3">
                                        <div class="d-flex">
                                            <form action="view_paper.php?grid=<?php echo $grid."&schedule_id=".$row['schedule_id']; ?>" method="post">
                                                <button class="btn btn-info mx-1" type="submit"
                                                    name="edit">View</button>
                                            </form>
                                            
                                        </div>
                                    </td>
                                </tr>

                                <?php }  ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>