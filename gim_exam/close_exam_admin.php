<?php

    ob_start();

    include('header.php');


  
    if(isset($_REQUEST['rw4'])){

        $se = "SELECT * FROM gim_students";
        $re = mysqli_query($conn,$se);
        
        while($row = mysqli_fetch_assoc($re)){

            $gr = $row['grid'];

            $up = "UPDATE gim_students SET e_status='2' WHERE grid='$gr' AND schedule_id='6' AND e_status='1' AND e_branch='RW4'";
            $res = mysqli_query($conn,$up);

            if($res){
                // echo "Done $gr <br>";
            } else {
                // echo "Error $gr <br>";
            }
            
        }
    }

    if(isset($_REQUEST['rw3'])){

        $se = "SELECT * FROM gim_students";
        $re = mysqli_query($conn,$se);
        
        while($row = mysqli_fetch_assoc($re)){

            $gr = $row['grid'];

            $up = "UPDATE gim_students SET e_status='2' WHERE grid='$gr' AND schedule_id='6' AND e_status='1' AND e_branch='RW3'";
            $res = mysqli_query($conn,$up);

            if($res){
                // echo "Done $gr <br>";
            } else {
                // echo "Error $gr <br>";
            }
            
        }
    }

    if(isset($_REQUEST['rw2'])){

        $se = "SELECT * FROM gim_students";
        $re = mysqli_query($conn,$se);
        
        while($row = mysqli_fetch_assoc($re)){

            $gr = $row['grid'];

            $up = "UPDATE gim_students SET e_status='2' WHERE grid='$gr' AND schedule_id='6' AND e_status='1' AND e_branch='RW2'";
            $res = mysqli_query($conn,$up);

            if($res){
                // echo "Done $gr <br>";
            } else {
                // echo "Error $gr <br>";
            }
            
        }
    }

    if(isset($_REQUEST['rw1'])){

        $se = "SELECT * FROM gim_students";
        $re = mysqli_query($conn,$se);
        
        while($row = mysqli_fetch_assoc($re)){

            $gr = $row['grid'];

            $up = "UPDATE gim_students SET e_status='2' WHERE grid='$gr' AND schedule_id='6' AND e_status='1' AND e_branch='RW1'";
            $res = mysqli_query($conn,$up);

            if($res){
                // echo "Done $gr <br>";
            } else {
                // echo "Error $gr <br>";
            }
            
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

            </div>

            <div class="card">
                <form class="form-horizontal" method="POST">
                    <div class="card-body">



                        <h4 class="card-title">Close Exam</h4>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">RW1</label>
                            <div class="col-sm-5">
                                <button type="submit" name="rw1" class="btn btn-primary">RW1 Close</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">RW2</label>
                            <div class="col-sm-5">
                                <button type="submit" name="rw2" class="btn btn-primary">RW2 Close</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">RW3</label>
                            <div class="col-sm-5">
                                <button type="submit" name="rw3" class="btn btn-primary">RW3 Close</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">RW4</label>
                            <div class="col-sm-5">
                                <button type="submit" name="rw4" class="btn btn-primary">RW4 Close</button>
                            </div>
                        </div>

                    </div>
                    <div class="border-top">
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


include('footer.php'); ?>