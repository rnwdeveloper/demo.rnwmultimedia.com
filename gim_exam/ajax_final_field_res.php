<?php

include('config.php');
$sel_branch = $_REQUEST['branch'];
$sel_field = $_REQUEST['field'];
$schedule_id = $_REQUEST['schedule_id'];


                                              
if($sel_branch == 'All'){
    if($sel_field=='reexam'){
        $q = "SELECT * FROM gim_students WHERE e_status='4'";
    } else {
        $q = "SELECT * FROM gim_students WHERE master_field='$sel_field' AND e_status='2' AND schedule_id='$schedule_id'";
    }
} else {
    if($sel_field=='reexam'){
        // $q = "SELECT * FROM gim_students WHERE e_status='4' AND branch='$sel_branch'";
        $q = "SELECT * FROM gim_students WHERE e_status='4' AND branch='$sel_branch' AND schedule_id='$schedule_id'";
    } else {
        // $q = "SELECT * FROM gim_students WHERE master_field='$sel_field' AND branch='$sel_branch' AND e_status='2'";
        $q = "SELECT * FROM gim_students WHERE master_field='$sel_field' AND branch='$sel_branch' AND schedule_id='$schedule_id'";
    }
}


$res = mysqli_query($conn, $q);

while($r = mysqli_fetch_assoc($res)) {
   
    // if($r['schedule_id']=='5' || $r['schedule_id']=='6') {
        $ddd[] = $r;
    // }

}


?>


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

                    </tr>
                </thead>
                <tbody>
                    <?php  

                                               
                                                foreach($ddd as $row){ 
                                                    
                                        
                                ?>

                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                        <td><?php echo $row['grid']; ?></td>

                        <td><?php echo $row['branch']; ?></td>




                    </tr>

                    <!-- View Student Detail Modal -->
                    <div class="modal fade" id="viewDetail" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
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
</script>