<?php

ob_start();
include('header.php');

if(isset($_REQUEST['save'])){

    $master_field = $_REQUEST['master'];
    $gr = $_REQUEST['gr'];

    echo $master_field." = H";

    $qq = "UPDATE gim_students SET master_field='$master_field', e_status='2' WHERE grid='$gr'";

    if (mysqli_query($conn, $qq)) {
        echo "<br />Record updated successfully<br />".$qq;
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }


}


if(@$_SESSION['email'] == ""){

    header('location: index.php');

}

$sql = "SELECT * FROM gim_schedule";
$result = mysqli_query($conn,$sql);



?>
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">

        <div class="input-group mb-3 mt-3" style="margin-right:50px">
                <div class="input-group-append" style="margin-left:100px">
                    <label class="input-group-text" for="inputGroupSelect02">Branch</label>
                </div>
                <?php while($ro = mysqli_fetch_assoc($result)){ 
                    $dt[] = $ro;    
                }
                arsort($dt);
                ?>
                
                <select class="custom-select" id="schedule">
                    <?php for ($i=sizeof($dt)-1; $i>=0 ; $i--) { ?>
                        <option value="<?php echo $dt[$i]['id']; ?>"><?php echo $dt[$i]['date']; ?></option>
                    <?php } ?>
                </select>
                
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive" id="con">
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
                                                $sc_id = $dt[sizeof($dt)-1]['id'];
                                                if($_SESSION['isAdmin']==1){
                                                $q = "SELECT * FROM gim_students WHERE schedule_id='$sc_id'";
                                                } else {
                                                $q = "SELECT * FROM gim_students WHERE branch='$f_branch' AND schedule_id='$sc_id'";
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
                                                onclick="return updatedata(<?php echo $row['grid']; ?>,0)"
                                                name="edit">Active</button>
                                            <!-- </form> -->
                                            <?php } else { ?>
                                            <!-- <form action="update_hall_status.php?grid=<?php echo $row['grid']."&status=1"; ?>" method="post"> -->
                                            <button class="btn btn-danger mx-1" type="submit"
                                                onclick="return updatedata(<?php echo $row['grid']; ?>,1)"
                                                name="edit">Deactive</button>
                                            <!-- </form> -->
                                        </div>
                                        <?php } ?>
                                    </td>

                                    <td colspan="3">
                                        <div class="d-flex">
                                            <?php if($_SESSION['isAdmin']==1){ ?>
                                            <form action="add_marks.php?grid=<?php echo $row['grid']; ?>" method="post">
                                                <button class="btn btn-warning mx-1" type="submit"
                                                    name="edit">Edit</button>
                                            </form>
                                           
                                            
                                            <?php } ?>
                                            <form action="edit_student.php?grid=<?php echo $row['grid']; ?>"
                                                method="post">
                                                <button class="btn btn-primary mx-1" type="submit"
                                                    name="edit">Student</button>
                                            </form>
                                           
                                            <form action="piq_form_view.php?grid=<?php echo $row['grid']; ?>"
                                                method="post">
                                                <button class="btn btn-dark mx-1" type="submit" name="edit">PIQ</button>
                                            </form>
                                            <button class="btn btn-success mx-1" type="submit" name="view"
                                                onclick="return getDetail(<?php echo $row['grid']; ?>)"
                                                data-toggle="modal" data-target="#viewDetail">View</button>
                                            <button class="btn btn-primary mx-1" type="submit"
                                                onclick="return finalResult(<?php echo $row['grid']; ?>)" name="result"
                                                data-toggle="modal" data-target="#FinalResultModal">Final
                                                Result</button>
                                            <?php if($_SESSION['isAdmin']==1){ ?>
                                                <button class="btn btn-warning mx-1" type="submit"
                                                onclick="return finalPaper(<?php echo $row['grid']; ?>)" name="result"
                                                data-toggle="modal" data-target="#FinalPaperModal">Paper</button>
                                            <button style="display:none;" class="btn btn-danger mx-1" type="submit"
                                                onclick="return updatedata(<?php echo $row['grid']; ?>,10)"
                                                name="delete">Delete</button>
                                            <?php } ?>

                                            <form action="" method="post">
                                                <!-- <button class="btn btn-info mx-1" type="submit" name="hall">Hall</button> -->
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <!-- View Student Detail Modal -->
                                <div class="modal fade" id="viewDetail" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Student Detail</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div id='tableData'></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
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
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <div id='resultTable'></div>
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

                                <!-- Final Paper Modal -->
                                <div class="modal fade" id="FinalPaperModal" tabindex="-1" style="width:100%"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" style="max-width: 1200px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Final Result</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
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
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->



<?php include('footer.php'); ?>

<script>
$(document).ready(function() {
    $('#example').DataTable({
        pageLength : 50,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    $("#schedule").change(function() {
        var value = $(this).val();
        // alert(value);

        $.ajax({
            url: "ajax_student_data.php",
            type: "Post",
            data: {
                'schedule_id': value
            },
            success: function(data) {
                // alert(data);
                $('#con').html(data);
            }
        })

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