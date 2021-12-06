<?php

    ob_start();

    include('header.php');

    $isUpdate = false;


    if(isset($_REQUEST['grid'])){

        $grid = $_REQUEST['grid'];

        $sq = "SELECT * FROM gim_students WHERE grid=$grid";

        $res2 = mysqli_query($conn, $sq);

        
            $row2 = mysqli_fetch_array($res2);

            $p_f_name = $row2['fname']; 
            $p_l_name = $row2['lname'];
            $p_branch = $row2['branch'];
            $p_email = $row2['email'];
            $p_b_time = $row2['branch_time'];
            $p_p_class = $row2['p_class'];
            $p_c_class = $row2['c_class'];
            $p_a_class = $row2['a_class'];
        
            if(isset($_REQUEST['submit'])){


                if($_REQUEST['f_name'] && $_REQUEST['l_name'] && $_REQUEST['email'] && $_REQUEST['branch'] && $_REQUEST['b_time'] ){
                    $f_name = $_REQUEST['f_name'];
                    $l_name = $_REQUEST['l_name'];
                    $email = $_REQUEST['email'];
                    $branch = $_REQUEST['branch'];
                    $b_time = $_REQUEST['b_time'];
                    $p_class = $_REQUEST['p_class'];
                    $c_class = $_REQUEST['c_class'];
                    $a_class = $_REQUEST['a_class'];
                    
                   
                  
        
                    $nq = "UPDATE gim_students SET fname='$f_name', lname='$l_name', email='$email', batch_time='$b_time', branch='$branch', p_class='$p_class', c_class='$c_class',a_class='$a_class' WHERE grid='$grid'";
                        // $nq1 = "UPDATE gim_sub_time SET psd='$psd_time', animate='$animate_time', c_lang='$c_lang_time', drawing='$drawing_time', logic='$logic_time' WHERE grid=$grid";
        
                    $res = mysqli_query($conn, $nq);
                    
                    if(mysqli_affected_rows($conn) == 1){
                        
                        header('location: students.php');
                        
                    }
                    else{
                        
                        echo "<h1>NO".mysqli_error($con)."</h1><br>";
                        
                        
                    }
                    $res = mysqli_query($conn, $nq1);
                    
                    
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
                </div>
            </div>

            <div class="card">
                <form class="form-horizontal" method="POST">
                    <div class="card-body">



                        <h4 class="card-title">Edit Student</h4>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">First Name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="f_name" value="<?php echo $p_f_name; ?>"
                                    placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Last Name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="l_name" value="<?php echo $p_l_name; ?>"
                                    placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Email</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="email"
                                    value="<?php echo $row2['email']; ?>" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Branch</label>
                            <div class="col-sm-5">
                                <select name="branch" class="form-control">
                                    <option value="">---SELECT BRANCH---</option>
                                    <option value="RW1" <?php if($p_branch=='RW1'){echo "selected";} ?>>RW1</option>
                                    <option value="RW2" <?php if($p_branch=='RW2'){echo "selected";} ?>>RW2</option>
                                    <option value="RW3" <?php if($p_branch=='RW3'){echo "selected";} ?>>RW3</option>
                                    <option value="RW4" <?php if($p_branch=='RW4'){echo "selected";} ?>>RW4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Batch Time</label>
                            <div class="col-sm-5">
                                <select name="b_time" class="form-control">
                                    <option value="">---SELECT YOUR BATCH TIME---</option>
                                    <option value="7:00 AM" <?php if($p_b_time == "7:00 AM"){echo "selected";} ?>>7:00
                                        AM</option>
                                    <option value="8:00 AM" <?php if($p_b_time == "8:00 AM"){echo "selected";} ?>>8:00
                                        AM</option>
                                    <option value="11:00 AM" <?php if($p_b_time == "11:00 AM"){echo "selected";} ?>>11:00
                                        AM</option>
                                    <option value="1:00 PM" <?php if($p_b_time == "1:00 AM"){echo "selected";} ?>>1:00
                                        PM</option>
                                    <option value="5:00 PM" <?php if($p_b_time == "5:00 AM"){echo "selected";} ?>>5:00
                                        PM</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Photoshop Class</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="p_class"
                                    value="<?php echo $row2['p_class']; ?>" placeholder="Photoshop Class">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">C Language Class</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="c_class"
                                    value="<?php echo $row2['c_class']; ?>" placeholder="C Lang Class">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Animate Class</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="a_class"
                                    value="<?php echo $row2['a_class']; ?>" placeholder="Animate Class">
                            </div>
                        </div>

                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" name="submit" class="btn btn-primary">Update Data</button>
                        </div>
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

    }
include('footer.php'); ?>