<?php


ob_start();
include('header.php');

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="csv_open_que.php">
                    <div class="card-body">
                        <h4 class="card-title">Upload Grid Excel</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Upload File</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="file" id="file">
                            </div>
                        </div>
                       
                      
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

                
            </div>

        </div>
    </div>

    
</div>
<?php
include('footer.php'); ?>
?>