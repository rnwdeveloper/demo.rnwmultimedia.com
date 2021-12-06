<?php

ob_start();
include('header.php');


if(@$_SESSION['email'] == ""){

    header('location: index.php');

}


$sql_sch = "SELECT * FROM gim_schedule";
$result_sch = mysqli_query($conn,$sql_sch);

while($ro_sch = mysqli_fetch_assoc($result_sch)){ 
    $dt_sch[] = $ro_sch;    
}
arsort($dt_sch);

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
                    <label class="input-group-text" for="inputGroupSelect02">Date</label>
                </div>
                <select class="custom-select" id="schedule">
                    <?php for ($i=sizeof($dt_sch)-1; $i>=0 ; $i--) { ?>
                        <option value="<?php echo $dt_sch[$i]['id']; ?>"><?php echo $dt_sch[$i]['date']; ?></option>
                    <?php } ?>
                </select>
            
            <div class="input-group-append" style="margin-left:100px">
                    <label class="input-group-text" for="inputGroupSelect02">Branch</label>
                </div>
                <?php if($_SESSION['isAdmin']==1) { ?>
                <select class="custom-select" id="branch">
                    <option value="All" selected>All...</option>
                    <option value="RW1">RW1</option>
                    <option value="RW2">RW2</option>
                    <option value="RW3">RW3</option>
                    <option value="RW4">RW4</option>
                </select>
                <?php } else {
                    $f_branch = $_SESSION['f_branch']; ?>
                    <select class="custom-select" id="branch">
                    <option value="<?php echo $f_branch; ?>"><?php echo $f_branch; ?></option>
                </select>
                <?php } ?>
            </div>
            <div class="input-group mb-3 mt-3" style="margin-right:50px">
                <div class="input-group-append" style="margin-left:100px">
                    <label class="input-group-text" for="inputGroupSelect02">Field</label>
                </div>
                <select class="custom-select" id="field">
                    <option value="Game Designing">Game Designing</option>
                    <option value="Front-end Design">Front-end Design</option>
                    <option value="Graphics">Graphics</option>
                    <option value="Animation">Animation</option>
                    <option value="Android Development">Android Development</option>
                    <option value="IOS Development">IOS Development</option>
                    <option value="Back-end Developing">Back-end Developing</option>
                    <option value="Game Development">Game Development</option>
                    <option value="Front-end Development">Front-end Development</option>
                    <option value="Flutter Development">Flutter Development</option>
                    <option value="reexam">Re-Exam</option>
                </select>

            </div>
            <div id="content" class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>GRID</th>
                                    <th>Branch</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php  

                                                $f_branch = $_SESSION['f_branch'];

                                                $iddds = $dt_sch[sizeof($dt_sch)-1]['id'];
                                               $q = "SELECT * FROM gim_students WHERE master_field='Game Designing' AND schedule_id='$iddds'";
                                            //    $q = "SELECT * FROM gim_students WHERE master_field='Game Designing' AND e_status='2'";
                                             
                                                $res = mysqli_query($conn, $q);
                                                while($r = mysqli_fetch_assoc($res)) {
   
                                                    // if($r['schedule_id']=='5' || $r['schedule_id']=='6') {
                                                        $ddd[] = $r;
                                                    // }
                                                
                                                }

                                                foreach($ddd as $row){ 
                                


                                                    ?>

                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                                    <td><?php echo $row['grid']; ?></td>

                                    <td><?php echo $row['branch']; ?></td>




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

                                <?php } ?>


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>GRID</th>

                                    <th>Branch</th>

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
        pageLength: 50,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    $("#field").change(function() {
        var value = $(this).val();

        var branch = document.getElementById('branch').value;
        var value1 = document.getElementById('schedule').value;

        $.ajax({
            url: "ajax_final_field_res.php",
            type: "Post",
            data: {
                'branch': branch,
                'schedule_id': value1,
                'field': value
            },
            success: function(data) {
                // alert(data);
                $('#content').html(data);
            }
        })

    });

    $("#schedule").change(function() {
        var value = $(this).val();
        // alert(value);

        var value1 = document.getElementById('branch').value;
        var value2 = document.getElementById('field').value;

        $.ajax({
            url: "ajax_final_field_res.php",
            type: "Post",
            data: {
                'schedule_id': value,
                'branch': value1,
                'field': value2
            },
            success: function(data) {
                // alert(data);
                $('#content').html(data);
            }
        })

    });

    $("#branch").change(function() {
        var branch = $(this).val();

        var value = document.getElementById('field').value;
        var value1 = document.getElementById('schedule').value;

        $.ajax({
            url: "ajax_final_field_res.php",
            type: "Post",
            data: {
                'branch': branch,
                'schedule_id': value1,
                'field': value
            },
            success: function(data) {
                // alert(data);
                $('#content').html(data);
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