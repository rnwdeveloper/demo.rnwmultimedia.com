<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="https://www.rnwmultimedia.com/wp-content/uploads/2019/03/favicon-16x16.png"
        type="image/x-icon">
    <title>Shining Sheet</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/datepicker.min.css" type="text/css">
    <style type="text/css">
    .card-header {
        background-color: #0b527e;
        color: white;
        font-size: 18px;
    }
    .student-assign-wrap .card-header {
    background-color: #5360b5;
    font-size: 18px;
    font-weight: 400;
    text-align: center;
}
.shining-sheet-topic {
    border: 1px solid #e4e4e4;
    padding: 15px;
}
.shining-sheet-topic h5 {
    margin-bottom: 0;
    font-size: 15px;
    color: #5260b4;
}
[type="radio"]:checked,
[type="radio"]:not(:checked) {
    position: absolute;
    left: -9999px;
}
[type="radio"]:checked,
[type="radio"]:not(:checked) {
    position: absolute;
    left: -9999px;
}
[type="radio"]:checked + label,
[type="radio"]:not(:checked) + label
{
    position: relative;
    padding-left: 28px;
    cursor: pointer;
    line-height: 20px;
    display: inline-block;
    color: #666;
}
[type="radio"]:checked + label:before,
[type="radio"]:not(:checked) + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 18px;
    height: 18px;
    border: 1px solid #ddd;
    border-radius: 100%;
    background: #fff;
}
[type="radio"]:checked + label:after,
[type="radio"]:not(:checked) + label:after {
    content: '';
    width: 12px;
    height: 12px;
    background: #F87DA9;
    position: absolute;
    top: 4px;
    left: 4px;
    border-radius: 100%;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
}
[type="radio"]:not(:checked) + label:after {
    opacity: 0;
    -webkit-transform: scale(0);
    transform: scale(0);
}
[type="radio"]:checked + label:after {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
}
[type="radio"]:checked + label,
[type="radio"]:not(:checked) + label
{
    position: relative;
    padding-left: 28px;
    cursor: pointer;
    line-height: 20px;
    display: inline-block;
    color: #666;
}
[type="radio"]:checked + label:before,
[type="radio"]:not(:checked) + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 18px;
    height: 18px;
    border: 1px solid #ddd;
    border-radius: 100%;
    background: #fff;
}
[type="radio"]:checked + label:after, [type="radio"]:not(:checked) + label:after {
    content: '';
    width: 10px;
    height: 10px;
    background: #5260b4;
    position: absolute;
    top: 4px;
    left: 4px;
    border-radius: 100%;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
}
[type="radio"]:not(:checked) + label:after {
    opacity: 0;
    -webkit-transform: scale(0);
    transform: scale(0);
}
[type="radio"]:checked + label:after {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
}
.form-check {
  display: block;
  margin-bottom: 15px;
}

.form-check input {
  padding: 0;
  height: initial;
  width: initial;
  margin-bottom: 0;
  display: none;
  cursor: pointer;
}

.form-check label {
  position: relative;
  cursor: pointer;
}

.form-check label:before {
  content:'';
  -webkit-appearance: none;
  background-color: transparent;
  border: 2px solid #5260b4;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
  padding: 7px;
  display: inline-block;
  position: relative;
  vertical-align: middle;
  cursor: pointer;
  margin-right: 5px;
}

.form-check input:checked + label:after {
    content: '';
    display: block;
    position: absolute;
    top: 4px;
    left: 7px;
    width: 5px;
    height: 9px;
    border: solid #5260b4;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
}
.student-assign-wrap input.btn {
    background-color: #3f51b5;
    border: 0;
    box-shadow: 0 2px 7px 0 #3f50b5;
}
.student-assign-wrap .form-check {
    padding: 0;
    padding-top: 6px;
}
@media(max-width: 767px){  .form-check label{margin-bottom: 19px;display: block;} }
    </style>
</head>

<body>
    <div class="color-theme-1">
        <div class="container text-center pt-3 pb-3">
            <a href="https://www.rnwmultimedia.com/" target="_blank" style="display: inline-block;"><img
                    src="http://demo.rnwmultimedia.com/New_Demo_Soft/images/logo_White.png" width="160"
                    alt="Red & White MUltimedia Education" title="Red & White MUltimedia Education" /></a>
        </div>
    </div>
    <?php
    $con  = mysqli_connect("localhost", "rnwsoftt_mzfrxmujjb", "nathikevo#@!2021", "rnwsoftt_mzfrxmujjb") or die("Db not connected");

    // echo $_GET['shining_sheet_id'];
    $shining_sheet_id = strtr(base64_decode($_GET['shining_sheet_id']), '+/=', '._-');
    $admission_id = strtr(base64_decode($_GET['admission_id']), '+/=', '._-');
    $gr_id = strtr(base64_decode($_GET['gr_id']), '+/=', '._-');
    $course_orpackage_id = strtr(base64_decode($_GET['course_orpackage_id']), '+/=', '._-');

    $s_id = $shining_sheet_id;
    $a_id = $admission_id;
    $g_id = $gr_id;
    $cp_id = $course_orpackage_id;

    $qu = "select * from shining_sheet where shining_sheet_id='$s_id'";
    $qu4 = mysqli_query($con, $qu);

    if (isset($_POST['submit'])) {

        $s = $_POST['shining_sheet_id'];
        $a = $_POST['admission_id'];
        $g = $_POST['gr_id'];
        $cp = $_POST['course_orpackage_id'];
        $date = $_POST['date'];
        @$p_a = $_POST['p_a'];
        @$feed_back = implode(',', $_POST['feed_back']);
        $stu_sign = $_FILES['stu_sign']['name'];
        $status = "Regular";
        $query = "insert into  assign_student(`shining_sheet_id`,`admission_id`,`gr_id`,`course_orpackage_id`,`date`,`p_a`,`feed_back`,`status`)
    values('$s','$a','$g','$cp','$date','$p_a','$feed_back','$status')";

        // $already_record = "select * from assign_student where `shining_sheet_id`='$s_id'";

        //        $already_record1 = mysqli_query($con,$already_record);

        //        $num = mysqli_num_rows($already_record1);

        //        if($num > 0 )

        //        {

        //         $smg = "You Have Already Exist This Topic";

        //        }

        //        else

        //        {           
        move_uploaded_file($_FILES['stu_sign']['tmp_name'], "img/" . $stu_sign);
        $re =  mysqli_query($con, $query);
        if ($re) {
            $smg = "Data Inserted Sucessfully";
        } else {
            $smg = "Something Wrong";
        }
    }
    ?>
    <section class="student-assign-wrap">
        <div class="container">
            <span><b style="color: green;border-radius: 22px;"><?php echo @$smg; ?></b></span>
            <div class="card">
                <div class="card-header">
                    Student Shining Sheet
                </div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group shining-sheet-topic"> 
                                    <h5>Topic</h5>
                                    <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                                    <p class="card-text">
                                        <?php while ($qu2 = mysqli_fetch_array($qu4)) { ?>
                                        <?php echo $qu2['name'];  ?>
                                        <?php } ?>
                                    </p> 
                                </div>
                            </div>
                            <input type="hidden" name="shining_sheet_id" value="<?php if (isset($s_id)) {
                                                                                            echo $s_id;
                                                                                        } ?>">
                                    <input type="hidden" name="admission_id" value="<?php if (isset($a_id)) {
                                                                                        echo $a_id;
                                                                                    } ?>">
                                    <input type="hidden" name="gr_id" value="<?php if (isset($g_id)) {
                                                                                    echo $g_id;
                                                                                } ?>">
                                    <input type="hidden" name="course_orpackage_id" value="<?php if (isset($cp_id)) {
                                                                                                echo $cp_id;
                                                                                            } ?>">

                                    <input type="hidden" class="form-control" name="date" value="<?php date_default_timezone_set("Asia/Calcutta"); echo date('d-m-Y'); ?>" id="example-date-input" placeholder="Example input">
                                        
                                   
		 
                            <!-- <div class="col-sm-6">
                                <div class="form-group">
                                    
                                    <label for="example-date-input" > Date </label>
                                    <input type="date" class="form-control" name="date" id="example-date-input"
                                        placeholder="Example input">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="example-name-input"> Signature Uplode </label>
                                    <input type="file" class="form-control" name="stu_sign" id="stu_sign"
                                        placeholder="Enter Number Of Day">
                                    <?php if (isset($image_error)) { ?>
                                    <span style="color:red;"> <?php echo $image_error; ?></span>
                                    <?php } ?>
                                </div>
                            </div> -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="d-block">Present/Absent</label>
                                    
                                    <div class="form-group mt-3"> 
                                    <input type="radio" id="exampleInputEmail1" name="p_a" checked value="present">
                                    <label for="exampleInputEmail1">Present</label>
                                    <input type="radio" id="exampleInputEmail2" name="p_a" value="absent">
                                    <label for="exampleInputEmail2">Absent</label> 
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label> Feed Back  </label>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" id="blankCheckbox" name="feed_back[]" value="excelent">
                                        <label for="blankCheckbox" class="mr-2">Excelent</label>
                                        <input type="checkbox" id="blankCheckbox1" name="feed_back[]" value="very good">
                                        <label for="blankCheckbox1" class="mr-2">Very Good</label>
                                        <input type="checkbox" id="blankCheckbox2" name="feed_back[]" value="good">
                                        <label for="blankCheckbox2" class="mr-2">Good</label>
                                        <input type="checkbox" id="blankCheckbox3" name="feed_back[]" value="bad">
                                        <label for="blankCheckbox3" class="mr-2">Bad</label>

                                         
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group text-center mt-3">
                                    <input type="submit" class="btn btn-success" value="submit" name="submit">
                                </div>
                            </div>
                        </div>
                    </form>
                    </p>
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
            </div>
        </div>
    </section>
    <!--  Terms & Conditions for students modal -->
    <!--  email Confimation modal -->
    <!--  Footer Section  -->
    <section class="pt-3 pb-3 text-center text-white copyright" style="background-color: #1c2023;">
        <div class="container">
            © Copyright 2020. <a href="https://www.rnwmultimedia.com/" target="_blank">Red & White Multimedia
                Education</a>. All Rights Reserved.
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
    </script>
    <script src="js/datepicker.min.js" type="text/javascript"></script>
    <script>
    $('[data-toggle="datepicker"]').datepicker();
    </script>
</body>

</html>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
$("#stu_sign").change(function() {

    var validExtensions = ["png", "jpeg", "jpg"]
    var file = $(this).val().split('.').pop();
    var numb = $(this)[0].files[0].size / 1024 / 1024;
    console.log(numb);
    numb = numb.toFixed(2);
    console.log(numb);
    if (validExtensions.indexOf(file) == -1) {
        alert("Only formats are allowed : " + validExtensions.join(', '));
        $(this).val('');
    } else if (numb > 0.7) {
        alert('to big, maximum is 700KB. You file size is: ' + numb + ' KB');
        $(this).val('');
    }
});
</script>