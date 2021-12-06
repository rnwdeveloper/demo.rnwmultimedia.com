<?php

ob_start();
include('header.php');

if($_SESSION['isAdmin']!=1) {
    header("location: student.php");
}

if(@$_SESSION['email'] == ""){

    header('location: index.php');

}

if (isset($_REQUEST['submit'])) {

    $software = $_REQUEST['software'];
    $question = $_REQUEST['mytextarea'];
    $question_1 = $_REQUEST['mytextarea1'];

    $target_dir = "questions/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      @$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    // if ($_FILES["fileToUpload"]["size"] > 500000) {
    //   echo "Sorry, your file is too large.";
    //   $uploadOk = 0;
    // }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            $names = $_FILES["fileToUpload"]["tmp_name"];
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    @include('config.php');

    $q = "INSERT INTO gim_question(que_img, subject,question,question_1,status) VALUES('$target_file', '$software','$question','$question_1','1')";
    
    echo $q;
       
    if(mysqli_query($conn, $q)){ 
        echo "<h1>INSERTED</h1>" ; 
    } else{ 
        echo mysqli_error($conn); 
    }  

  
     
}
?>
<script src="https://cdn.tiny.cloud/1/xv2j3iuikfcxrow45ohppgals9m9dpkje5mlp2k46in6hvj2/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
// tinymce.init({
//     selector: '#mytextarea'
// });
</script>
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-6" style="max-width:100%; flex:0 0 100%;">
            <div class="card">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <h4 class="card-title">Add User</h4>

                        <div class="form-group row">
                            <label for="email1"
                                class="col-sm-3 text-right control-label col-form-label">Software</label>
                            <div class="col-sm-9">
                                <select name="software" class="form-control">
                                    <option value="0">---SELECT Question Software---</option>
                                    <option value="1">PSD Web</option>
                                    <option value="2">Animate</option>
                                    <option value="3">C</option>
                                    <option value="4">PSD Graphics</option>
                                    <!-- <option value="5">Logic</option> -->
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email1"
                                class="col-sm-3 text-right control-label col-form-label">Question</label>
                            <div class="col-sm-9">
                                <textarea id="mytextarea" name="mytextarea">

                                </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-right control-label col-form-label">Question
                                Header</label>
                            <div class="col-sm-9">
                                <textarea id="mytextarea1" name="mytextarea1">

                                </textarea>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                                Upload Question File</label>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                                </div>
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