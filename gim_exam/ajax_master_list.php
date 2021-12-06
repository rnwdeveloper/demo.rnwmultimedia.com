<div id="content" class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>GRID</th>
                        <th>Branch</th>
                        <th>Eligable</th>

                    </tr>
                </thead>
                <tbody>
                    <?php  
                                                include('config.php');
                                                echo $branch = $_REQUEST['branch'];
                                                echo $schedule = $_REQUEST['schedule_id'];
                                                
                                                if($branch == 'All'){
                                                    $q = "SELECT * FROM gim_students WHERE `e_status`='2' AND schedule_id='$schedule'";
                                                } else {
                                                    $q = "SELECT * FROM gim_students WHERE e_status='2' AND branch='$branch' AND schedule_id='$schedule'";
                                                }
                                                $row_number_data=1;
                                                $match = 0;
                                                $not_match = 0;

                                                
                                                $res_record = mysqli_query($conn, $q);
                                                
                                                while($row_final_data = mysqli_fetch_array($res_record)){ 
                                                    $grid = $row_final_data['grid'];
                                                    
                                                    $sq = "SELECT * FROM gim_students WHERE grid=$grid";
                                                    $sq_piq = "SELECT * FROM gim_piq WHERE grid=$grid AND schedule_id='$schedule'";
                                                    $mq = "SELECT * FROM gim_marks WHERE grid=$grid AND schedule_id='$schedule'";
                                                    $st = "SELECT * FROM gim_sub_time WHERE grid=$grid AND schedule_id='$schedule'";
                                                    $cq = "SELECT * FROM gim_credit";
                                                    $google_classroom_query = "SELECT * FROM gim_students WHERE grid=$grid";

                                                    $res = mysqli_query($conn, $sq);
                                                    $res_piq = mysqli_query($conn, $sq_piq);
                                                    $res2 = mysqli_query($conn, $mq);
                                                    $res3 = mysqli_query($conn, $cq);
                                                    $res4 = mysqli_query($conn, $st);
                                                    $gc_res = mysqli_query($conn, $google_classroom_query);
                                            
                                                    $row = mysqli_fetch_assoc($res);
                                                    $row_piq = mysqli_fetch_assoc($res_piq);
                                                    $row2 = mysqli_fetch_array($res2);
                                                    $row4 = mysqli_fetch_array($res4);
                                                    $gc_row = mysqli_fetch_array($gc_res);       
                                                    
                                                    $ans = explode("#",$row_piq['ans']);
                                            
                                                    while($row3 = mysqli_fetch_array($res3)){
                                                        $subject = $row3['subject'];
                                            
                                                        $credit_psd = $row3['psd'];
                                                        $credit_psd_g = $row3['psd_g'];
                                                        $credit_animate = $row3['animate'];
                                                        $credit_c_lang = $row3['c_lang'];
                                                        $credit_drawing = $row3['drawing'];
                                                        $credit_logic = $row3['logic'];
                                            
                                                        $psd_marks = @$row2['psd'];
                                                        $psd_g_marks = @$row2['psd_g'];
                                                        $animate_marks = @$row2['animate'];
                                                        $c_lang_marks = @$row2['c_lang'];
                                                        $drawing_marks = @$row2['drawing'];
                                                        $logic_marks = @$row2['logic'];
                                            
                                                        $psd_per = $psd_marks * ($credit_psd*10)/30;
                                                        $psd_g_per = $psd_g_marks * ($credit_psd_g*10)/30;
                                                        $animate_per = $animate_marks * ($credit_animate*10)/30;
                                                        $c_lang_per = $c_lang_marks * ($credit_c_lang*10)/30;
                                                        $drawing_per = $drawing_marks * ($credit_drawing*10)/50;
                                                        $logic_per = $logic_marks * ($credit_logic*10)/30;
                                                        // $psd_per = ($credit_psd * $psd_marks) / 10;
                                                        // $psd_g_per = ($credit_psd_g * $psd_g_marks) / 10;
                                                        // $animate_per = ($credit_animate * $animate_marks) / 10;
                                                        // $c_lang_per = ($credit_c_lang * $c_lang_marks) / 10;
                                                        // $drawing_per = ($credit_drawing * $drawing_marks) / 10;
                                                        // $logic_per = ($credit_logic * $logic_marks) / 10;
                                            
                                                        $toal_per = $psd_per + $animate_per + $c_lang_per + $drawing_per + $logic_per + $psd_g_per;
                                            
                                                        $final_result[$subject] = array(
                                                            "psd"=>number_format($psd_per, 2) . " / " . $credit_psd*10,
                                                            "psd_g"=>number_format($psd_g_per, 2) . " / " . $credit_psd_g*10,
                                                            "animate"=>number_format($animate_per, 2) . " / " . $credit_animate*10,
                                                            "c_lang"=>number_format($c_lang_per, 2) . " / " . $credit_c_lang*10,
                                                            "drawing"=>number_format($drawing_per, 2) . " / " . $credit_drawing*10,
                                                            "logic"=>number_format($logic_per, 2) . " / " . $credit_logic*10,
                                                            "total_per"=>number_format($toal_per, 2)
                                                        );
                                            
                                                        $tot[] = number_format($toal_per, 2);
                                            
                                                    }
                                            
                                                    // echo "<pre>";
                                                    arsort($final_result[]['total_per']);

                                            
                                                    asort($tot);
                                            
                                                    $keys = array_column($final_result, 'total_per');
                                            
                                                    array_multisort($keys, SORT_DESC, $final_result);
                                            
                                                    // print_r($final_result);
                                                    $c = 0;
                                                    $cou = array();
                                                    foreach($final_result as $k=>$dt){

                                                        if($c<3)
                                                        {
                                                            $cou[] = $k;

                                                        }

                                                        $c++;
                                                    }
                                                    if($ans[7]==1){
                                                        $first =  "Game Designing";
                                                    } else if($ans[7]==2) {
                                                        $first =  "Front-end Design";
                                                    } else if($ans[7]==3) {
                                                        $first =  "Graphics";
                                                    } else if($ans[7]==4) {
                                                        $first =  "Animation";
                                                    } else if($ans[7]==5) {
                                                        $first =  "Android Development";
                                                    } else if($ans[7]==6) {
                                                        $first =  "IOS Development";
                                                    } else if($ans[7]==7) {
                                                        $first =  "Back-end Developing";
                                                    } else if($ans[7]==8) {
                                                        $first =  "Game Development";
                                                    } else if($ans[7]==9) {
                                                        $first =  "Front-end Development";
                                                    } else if($ans[7]==10) {
                                                        $first =  "Flutter Development";
                                                    }
                                                    if($ans[22]==1){
                                                        $second =  "Game Designing";
                                                    } else if($ans[22]==2) {
                                                        $second =  "Front-end Design";
                                                    } else if($ans[22]==3) {
                                                        $second =  "Graphics";
                                                    } else if($ans[22]==4) {
                                                        $second =  "Animation";
                                                    } else if($ans[22]==5) {
                                                        $second =  "Android Development";
                                                    } else if($ans[22]==6) {
                                                        $second =  "IOS Development";
                                                    } else if($ans[22]==7) {
                                                        $second =  "Back-end Developing";
                                                    } else if($ans[22]==8) {
                                                        $second =  "Game Development";
                                                    } else if($ans[22]==9) {
                                                        $second =  "Front-end Development";
                                                    } else if($ans[22]==10) {
                                                        $second =  "Flutter Development";
                                                    }

                                                    $ismatch = 0;
                                                    foreach($cou as $da){

                                                        if($da == $first || $da == $second){
                                                            $ismatch = 1;
                                                        }

                                                    }
                                                    // echo "<pre>";
                                                    // print_r($final_result);
                                                    // echo "</pre>";


                                                    ?>

                    <tr>
                        <td><?php echo $row_number_data; ?></td>
                        <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                        <td><?php echo $row['grid']; ?></td>

                        <td><?php echo $row['branch']; ?></td>
                        <td><?php if($ismatch){echo "<p style='color:green'>Match</p>";
                                        $match++;
                                    }else {echo "<p style='color:red'>Not match</p>";
                                    $not_match++;} ?></td>




                    </tr>

                    <!-- View Student Detail Modal -->
                    <!--     <div class="modal fade" id="viewDetail" tabindex="-1"
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
                                </div> -->

                    <!-- END MODAL -->


                    <!-- Final Result Modal -->
                    <!--                                 <div class="modal fade" id="FinalResultModal" tabindex="-1" style="width:100%"
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
                                            </div> -->
                    <!-- <div class="modal-footer">
                                                <form action="" method="post">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" name="save" class="btn btn-primary">Save
                                                        changes</button>
                                                </form>
                                            </div> -->
                    <!-- </div> -->
                    <!-- </div> -->
                    <!-- </div> -->

                    <!-- END MODAL -->

                    <?php $row_number_data++; } ?>


                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>GRID</th>
                        <th>Branch</th>
                        <th>Eligable</th>

                    </tr>
                </tfoot>
            </table>
        </div>
        <?php echo "Match :- <h2 style='color:green'>$match</h2>"; ?>
        <?php echo "Not Match :- <h2 style='color:red'>$not_match</h2>"; ?>
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