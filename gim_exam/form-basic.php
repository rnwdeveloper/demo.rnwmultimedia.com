<?php

ob_start();
include('header.php');

if($_SESSION['isAdmin']!=1) {
    header("location: dashboard.php");
}

if(@$_SESSION['email'] == ""){

    header('location: index.php');

}

if (isset($_REQUEST['submit'])) {

    if ($_REQUEST['fname'] != null && $_REQUEST['lname'] != null && $_REQUEST['grid'] != null && $_REQUEST['batch_time'] != null && $_REQUEST['branch'] != null) {

        $fname = $_REQUEST['fname'];
        $lname = $_REQUEST['lname'];
        $grid = $_REQUEST['grid'];
        $batch_time = $_REQUEST['batch_time'];
        $branch = $_REQUEST['branch'];
        // $ebranch = $_REQUEST['ebranch'];

        

       
        $get = getrandome();

        $q = "INSERT INTO gim_students(fname, lname, grid, branch, batch_time, e_branch) VALUES('$fname', '$lname', $grid, '$branch', '$batch_time', '$get')";

        $sq = "SELECT * FROM gim_students WHERE grid=$grid";

        $res = mysqli_query($conn, $sq);

        $row = mysqli_fetch_array($res);

        if(mysqli_num_rows($res)<1){
            if(mysqli_query($conn, $q)){
                echo "<h1>INSERTED</h1>";
            }
            else{
                echo mysqli_error($conn);
            }
        }
        else{
            echo "<h1>GRID Already exists...</h1>";
        }


    }
    else{

        echo "<h1>NO</h1>";

    }
}


function getrandome() {

    include('config.php');

    $arr_branch = array("RW1","RW2","RW4");

    $select_branch = array_rand($arr_branch,1);
    
    $resss = $arr_branch[$select_branch];

    $que = "SELECT * FROM gim_students WHERE e_branch='$resss'";

    $re = mysqli_query($conn, $que);
    $count = mysqli_num_rows($re);
    
    // $re = $conn->query($sql);
    // $count = $re->num_rows;


    echo "<br>".$count."<br>".$arr_branch[$select_branch];

    if($arr_branch[$select_branch] =="RW1"){

        if($count>=10){

            unset($arr_branch[0]);
            getrandome();

        }

    } else if($arr_branch[$select_branch] =="RW2"){

        if($count>=10){

            unset($arr_branch[1]);
            getrandome();

        }

    } else if($arr_branch[$select_branch] =="RW3"){

        if($count>=10){

            unset($arr_branch[2]);
            getrandome();

        }

    }

    return $arr_branch[$select_branch];

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
            <div class="card">
                <form class="form-horizontal" method="POST">
                    <div class="card-body">
                        <h4 class="card-title">Student Info</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">First
                                Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="fname" id="fname"
                                    placeholder="First Name Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Last
                                Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="lname" id="lname"
                                    placeholder="Last Name Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">GRID</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="grid" min=0 id="lname"
                                    placeholder="Enter GRID">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-right control-label col-form-label">Batch
                                Time</label>
                            <div class="col-sm-9">
                                <select name="batch_time" class="form-control">
                                    <option value="">---SELECT YOUR BATCH TIME---</option>
                                    <option value="7:00 AM">7:00 AM</option>
                                    <option value="8:00 AM">8:00 AM</option>
                                    <option value="11:00 AM">11:00 AM</option>
                                    <option value="1:00 PM">1:00 PM</option>
                                    <option value="5:00 PM">5:00 PM</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Branch</label>
                            <div class="col-sm-9">
                                <select name="branch" class="form-control">
                                    <option value="">---SELECT BRANCH---</option>
                                    <option value="RW1">RW1</option>
                                    <option value="RW2">RW2</option>
                                    <option value="RW3">RW3</option>
                                    <option value="RW4">RW4</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Exam
                                Branch</label>
                            <div class="col-sm-9">
                                <select name="ebranch" class="form-control">
                                    <option value="">---SELECT EXAM BRANCH---</option>
                                    <option value="RW1">RW1</option>
                                    <option value="RW2">RW2</option>
                                    <option value="RW3">RW3</option>
                                    <option value="RW4">RW4</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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

    <!-- MODAL -->
    <div class="modal fade" id="csv_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload CSV</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="csv_upload.php" method="post" enctype="multipart/form-data">
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
    <!-- END MODAL -->

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