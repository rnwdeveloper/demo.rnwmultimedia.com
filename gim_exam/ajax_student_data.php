<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">

<?php

    include('config.php');

    session_start();
    ob_start();

    $grid = $_REQUEST['grid'];
    $status = $_REQUEST['status'];
    $schedule_id = $_REQUEST['schedule_id'];

    if($status==10){

        // sql to delete a record
        $sql = "DELETE FROM gim_students WHERE grid=$grid";

        if (mysqli_query($conn, $sql)) {

        } else {

        }

    } else {
    

        $nq = "UPDATE gim_students SET hall_t=$status WHERE grid=$grid";


        $res = mysqli_query($conn, $nq);

        if(mysqli_affected_rows($conn) == 1){


        }
        else{

        

        }
    }


?>



<table id="example" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>GRID</th>
            <th>Batch Time</th>
            <th>Photoshop</th>
            <th>C lang</th>
            <th>Animate</th>
            <th>Branch</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php  

                                                $f_branch = $_SESSION['f_branch'];
                                                

                                                if($_SESSION['isAdmin']==1){
                                                $q = "SELECT * FROM gim_students WHERE schedule_id='$schedule_id'";
                                                } else {
                                                $q = "SELECT * FROM gim_students WHERE branch='$f_branch' AND schedule_id='$schedule_id'";
                                                }
                                                $res = mysqli_query($conn, $q);

                                                while($row = mysqli_fetch_array($res)){ 
                                                    
                                                 


                                                    ?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
            <td><?php echo $row['grid']; ?></td>
            <td>
                <?php echo $row['batch_time']; ?>
            </td>
            <td>
                <?php echo $row['p_class']; ?>
            </td>
            <td>
                <?php echo $row['c_class']; ?>
            </td>
            <td>
                <?php echo $row['a_class']; ?>
            </td>
            <td><?php echo $row['branch']; ?></td>

            <td> <?php if($row['hall_t'] == 1) { ?>
                <div class="d-flex">
                    <!-- <form action="update_hall_status.php?grid=<?php echo $row['grid']."&status=0"; ?>" method="post"> -->
                    <button class="btn btn-success mx-1" type="submit"
                        onclick="return updatedata(<?php echo $row['grid']; ?>,0)" name="edit">Active</button>
                    <!-- </form> -->
                    <?php } else { ?>
                    <!-- <form action="update_hall_status.php?grid=<?php echo $row['grid']."&status=1"; ?>" method="post"> -->
                    <button class="btn btn-danger mx-1" type="submit"
                        onclick="return updatedata(<?php echo $row['grid']; ?>,1)" name="edit">Deactive</button>
                    <!-- </form> -->
                </div>
                <?php } ?>
            </td>

            <td colspan="3">
                <div class="d-flex">
                    <?php if($_SESSION['isAdmin']==1){ ?>
                    <form action="add_marks.php?grid=<?php echo $row['grid']; ?>" method="post">
                        <button class="btn btn-warning mx-1" type="submit" name="edit">Edit</button>
                    </form>
                    

                    <?php } ?>
                    <form action="edit_student.php?grid=<?php echo $row['grid']; ?>" method="post">
                        <button class="btn btn-primary mx-1" type="submit" name="edit">Student</button>
                    </form>

                    <form action="piq_form_view.php?grid=<?php echo $row['grid']; ?>" method="post">
                        <button class="btn btn-dark mx-1" type="submit" name="edit">PIQ</button>
                    </form>
                    <button class="btn btn-success mx-1" type="submit" name="view"
                        onclick="return getDetail(<?php echo $row['grid']; ?>)" data-toggle="modal"
                        data-target="#viewDetail">View</button>
                    <button class="btn btn-primary mx-1" type="submit"
                        onclick="return finalResult(<?php echo $row['grid']; ?>)" name="result" data-toggle="modal"
                        data-target="#FinalResultModal">Final
                        Result</button>
                    <?php if($_SESSION['isAdmin']==1){ ?>
                        <button class="btn btn-warning mx-1" type="submit"
                        onclick="return finalPaper(<?php echo $row['grid']; ?>)" name="result" data-toggle="modal"
                        data-target="#FinalPaperModal">Paper</button>
                    <button style="display:none;" class="btn btn-danger mx-1" type="submit"
                        onclick="return updatedata(<?php echo $row['grid']; ?>,10)" name="delete">Delete</button>
                    <?php } ?>

                    <form action="" method="post">
                        <!-- <button class="btn btn-info mx-1" type="submit" name="hall">Hall</button> -->
                    </form>
                </div>
            </td>
        </tr>

        <!-- View Student Detail Modal -->
        <div class="modal fade" id="viewDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Student Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id='tableData'></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- END MODAL -->


        <!-- Final Result Modal -->
        <div class="modal fade" id="FinalResultModal" tabindex="-1" style="width:100%"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="max-width: 1200px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Final Result</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div id='resultTable'></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- END MODAL -->

        <!-- Final Paper Modal -->
        <div class="modal fade" id="FinalPaperModal" tabindex="-1" style="width:100%"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="max-width: 1200px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Final Result</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div id='paperTable'></div>
                    </div>
                    <!-- <div class="modal-footer">
                                                <form action="" method="post">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" name="save" class="btn btn-primary">Save
                                                        changes</button>
                                                </form>
                                            </div> -->
                </div>
            </div>
        </div>

        <!-- END MODAL -->

        <?php } ?>


    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>GRID</th>
            <th>Batch Time</th>
            <th>Photoshop</th>
            <th>C_lang</th>
            <th>Animate</th>
            <th>Branch</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>


<script>
$(document).ready(function() {
    $('#example').DataTable({
        pageLength: 50,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});

function getDetail(id) {

    $.ajax({
        url: 'ajax_get_detail.php',
        type: "POST",
        data: {
            'grid': id,
        },
        success: (res) => {
            $('#tableData').html(res);
        }
    });
}

function finalResult(id) {
    $.ajax({
        url: 'ajax_final_result.php',
        type: "POST",
        data: {
            'grid': id,
        },
        success: (res) => {
            $('#resultTable').html(res);
        }
    });
}

function finalPaper(id) {

    $.ajax({
        url: 'ajax_std_paper_list.php',
        type: "POST",
        data: {
            'grid': id,
        },
        success: (res) => {

            $('#paperTable').html(res);
        }
    });
}

function updatedata(id, status) {
    $.ajax({
        url: 'ajax_student_data.php',
        type: "POST",
        data: {
            'grid': id,
            'status': status,
        },
        success: (res) => {
            // alert(res);
            $('#con').html(res);
        }
    });
}
</script>