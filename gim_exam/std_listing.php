<?php

ob_start();
include('header.php');

if(@$_SESSION['email'] == ""){

    header('location: index.php');

}

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
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>GRID</th>
                                    <th>Branch</th>
                                    <th>Exam Branch</th>
                                    <th>Exam Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  

                                                $f_branch = $_SESSION['f_branch'];

                                                if($_SESSION['isAdmin']==1){
                                                $q = "SELECT * FROM gim_students";
                                                } else {
                                                $q = "SELECT * FROM gim_students WHERE branch='$f_branch'";
                                                }
                                                $res = mysqli_query($conn, $q);

                                                while($row = mysqli_fetch_array($res)){ 
                                                    
                                                 


                                                    ?>

                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                                    <td><?php echo $row['grid']; ?></td>
                                    <td><?php echo $row['branch']; ?></td>
                                    <td><?php echo $row['e_branch']; ?></td>
                                    <td><?php if($row['schedule_id'] == 5){ echo "16/10/2021"; } else if($row['schedule_id'] == 6) { echo "18/10/2021"; } ?>
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
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
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
                                    <th>Exam Branch</th>
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
            $('#example').html(res);
        }
    });
}
</script>