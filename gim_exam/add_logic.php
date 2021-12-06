<?php

    ob_start();

    include('header.php');


    if(isset($_REQUEST['submit'])){

        if($_REQUEST['que'] && $_REQUEST['a'] && $_REQUEST['b'] && $_REQUEST['c'] && $_REQUEST['d'] && $_REQUEST['ans']){
            
            $que = $_REQUEST['que'];
            $a = $_REQUEST['a'];
            $b = $_REQUEST['b'];
            $c = $_REQUEST['c'];
            $d = $_REQUEST['d'];
            $ans = $_REQUEST['ans'];
            
    
            $nq = "INSERT INTO gim_logic(que, a, b, c, d, ans, status) VALUES('$que', '$a', '$b', '$c', '$d', '$ans', '1')";
                
            

            $res = mysqli_query($conn, $nq);
            
            if(mysqli_affected_rows($conn) == 1){
                
                // header('location: students.php');
                
            }
            else{
                
                echo "<h1>NO".mysqli_error($conn)."</h1><br>";
                
                
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


            <div class="card">
                <form class="form-horizontal" method="POST">
                    <div class="card-body">



                        <h4 class="card-title">Add Logic Questions</h4>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Question </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="que" placeholder="Question">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">A : </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="a" placeholder="Option A">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">B : </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="b" placeholder="Option B">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">C : </label>
                            <div class="col-sm-5">
                                <input type="text" min=0 max=100 class="form-control" name="c" placeholder="Option C">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">D : </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="d" placeholder="Option D">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Ans : </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="ans" placeholder="Correct Option">
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
                <form action="csv_logic_upload.php" method="post" enctype="multipart/form-data">
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

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->

<?php


include('footer.php'); ?>