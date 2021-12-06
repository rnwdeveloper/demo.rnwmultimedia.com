<?php

    ob_start();

    include('header.php');

    
    if(isset($_REQUEST['grid'])){
        
        
        $grid = $_REQUEST['grid'];
        $q1 = "SELECT * FROM gim_sub_time WHERE grid='$grid'";
        $res1 = mysqli_query($conn, $q1);
        
        // while($dd = mysqli_fetch_assoc($res1)){
    
            echo "<pre>";
            print_r($dd);
            echo "</pre>";
            
            $isUpdate = false;
            $dt = $dd['schedule_id'];
        
            $q = "SELECT * FROM gim_marks WHERE grid='$grid' AND schedule_id='$dt'";
            $sq = "SELECT * FROM gim_students WHERE grid='$grid'";

            $res = mysqli_query($conn, $q);
            $res2 = mysqli_query($conn, $sq);

        

            if($res!=null){
                $row = mysqli_fetch_array($res);

                if(mysqli_num_rows($res) == 1){

                    $isUpdate = true;
        
                }
            }
            if($res1!=null){
                $row12 = mysqli_fetch_array($res1);

                if(mysqli_num_rows($res1) == 1){

                    $isUpdate = true;
        
                }
            }
            
            if($res2!=null){
                $row2 = mysqli_fetch_array($res2);

                if(mysqli_num_rows($res2) == 1){

                    $fname = $row2['fname'];
                    $lname = $row2['lname'];
                    $batch_time = $row2['batch_time'];
                    $branch = $row2['branch'];
        
                }
            }



   

    
        if(isset($_REQUEST['submit'])){
            // print_r($_REQUEST);

            if(isset($_REQUEST['psd']) && isset($_REQUEST['psd_g']) && isset($_REQUEST['animate']) && isset($_REQUEST['c_lang']) && isset($_REQUEST['drawing']) ){
                
                echo "Hello";
                
                $psd = $_REQUEST['psd'];
                $psd_g = $_REQUEST['psd_g'];
                $animate = $_REQUEST['animate'];
                $c_lang = $_REQUEST['c_lang'];
                $drawing = $_REQUEST['drawing'];
                $logic = $_REQUEST['logic'];
            
                // $psd_time = $_REQUEST['psd_time'];
                // $animate_time = $_REQUEST['animate_time'];
                // $c_lang_time = $_REQUEST['c_lang_time'];
                // $drawing_time = $_REQUEST['drawing_time'];
                // $logic_time = $_REQUEST['logic_time'];

                if(!$isUpdate){

                    $nq = "INSERT INTO gim_marks(grid, psd, psd_g, animate, c_lang, drawing) VALUES('$grid', '$psd', '$psd_g', '$animate', '$c_lang', '$drawing')";
                    // $nq1 = "INSERT INTO gim_sub_time(grid, psd, animate, c_lang, drawing, logic) VALUES($grid, $psd_time, $animate_time, $c_lang_time, $drawing_time, $logic_time);";

                }
                else{

                    $nq = "UPDATE gim_marks SET psd='$psd', psd_g='$psd_g', animate='$animate', c_lang='$c_lang', drawing='$drawing' WHERE grid='$grid'";
                    // $nq1 = "UPDATE gim_sub_time SET psd='$psd_time', animate='$animate_time', c_lang='$c_lang_time', drawing='$drawing_time', logic='$logic_time' WHERE grid=$grid";

                }

                $res = mysqli_query($conn, $nq);
                
                if(mysqli_affected_rows($conn) == 1){
                    
                    header('location: students.php');
                    echo "Done";
                    
                }
                else{
                    
                    echo "<h1>NO".mysqli_error($conn)."</h1><br>";
                    
                    
                }
                // $res = mysqli_query($conn, $nq1);
                
                
            }
                
        }


?>
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo @$grid; ?></h5>
                    <p class="card-text"><?php echo @$fname . " ". @$lname; ?></p>
                    <a href="#" class="btn btn-primary"><?php echo @$branch; ?></a>
                    <a href="#" class="btn btn-info">Time: <?php echo @$batch_time; ?></a>
                </div>
            </div>

            <div class="card">
                <form class="form-horizontal" method="POST">
                    <div class="card-body">



                        <h4 class="card-title">Add Marks</h4>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Photoshop WEB</label>
                            <div class="col-sm-5">
                                <input type="number" min=0 max=100 class="form-control" name="psd"
                                    value="<?php if($isUpdate){ echo $row['psd']; } ?>"
                                    placeholder="Add Photoshop Web Marks">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Photoshop Graphics</label>
                            <div class="col-sm-5">
                                <input type="number" min=0 max=100 class="form-control" name="psd_g"
                                    value="<?php if($isUpdate){ echo $row['psd_g']; } ?>"
                                    placeholder="Add Photoshop Graphics Marks">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Animate</label>
                            <div class="col-sm-5">
                                <input type="number" min=0 max=100 class="form-control" name="animate"
                                    value="<?php if($isUpdate){ echo $row['animate']; } ?>"
                                    placeholder="Add Animate Marks">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">C Language</label>
                            <div class="col-sm-5">
                                <input type="number" min=0 max=100 class="form-control" name="c_lang"
                                    value="<?php if($isUpdate){ echo $row['c_lang']; } ?>"
                                    placeholder="Add C Language Marks">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Drawing</label>
                            <div class="col-sm-5">
                                <input type="number" min=0 max=100 class="form-control" name="drawing"
                                    value="<?php if($isUpdate){ echo $row['drawing']; } ?>"
                                    placeholder="Add Drawing Marks">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Logic</label>
                            <div class="col-sm-5">
                                <input type="number" min=0 max=100 class="form-control" name="logic"
                                    value="<?php if($isUpdate){ echo $row['logic']; } ?>" placeholder="Add Logic Marks"
                                    disabled>
                            </div>
                        </div>

                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" name="submit"
                                class="btn btn-primary"><?php if($isUpdate){ echo "Update Marks"; } else{ echo "Add Marks"; } ?></button>
                        </div>
                    </div>
                </form>

                <div class="border-top ml-3">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#csv_modal">
                        Upload CSV
                    </button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="csv_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload CSV</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="csv_marks.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="file" name="file">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
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
<!-- ============================================================== -->

<?php
        
        // }
    }

include('footer.php'); ?>