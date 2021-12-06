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

    if ($_REQUEST['fname'] != null && $_REQUEST['email'] != null && $_REQUEST['password'] != null && $_REQUEST['admin'] != null && $_REQUEST['branch'] != null) {

        $fname = "RWn. ".$_REQUEST['fname'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $admin = $_REQUEST['admin'];
        $branch = $_REQUEST['branch'];

        $q = "INSERT INTO gim_user(name, email, password, isAdmin, branch) VALUES('$fname', '$email', $password, '$admin', '$branch')";

        $sq = "SELECT * FROM gim_user WHERE email='$email'";

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
            echo "<h1>User Alreday exists...</h1>";
        }


    }
    else{

        echo "<h1>NO</h1>";

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
            <div class="card">
                <form class="form-horizontal" method="POST">
                    <div class="card-body">
                        <h4 class="card-title">Add User</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">RWn. Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter Name Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" type="email" class="col-sm-3 text-right control-label col-form-label">email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" id="lname" placeholder="Enter Email Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 text-right control-label col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="password" id="lname" placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-right control-label col-form-label">is Admin</label>
                            <div class="col-sm-9">
                            <select name="admin" class="form-control">
                                    <option value="0">---SELECT YOUR SET ADMIN---</option>
                                    <option value="0">Normal User</option>
                                    <option value="1">Admin</option>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Branch</label>
                            <div class="col-sm-9">
                                <select name="branch" class="form-control">
                                    <option value="">---SELECT YOUR BRANCH---</option>
                                    <option value="RW1">RW1</option>
                                    <option value="RW2">RW2</option>
                                    <option value="RW3">RW3</option>
                                    <option value="RW4">RW4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

                <!-- <div class="border-top ml-3">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#csv_modal">
                        Upload CSV
                    </button>
                </div> -->
                
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