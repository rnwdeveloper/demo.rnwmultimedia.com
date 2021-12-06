<?php

ob_start();

session_start();
include('config.php'); 
$grid = $_SESSION["grId"];

if(empty($grid)) {
    header("location:index.php");
}

$code = "RNWEDU";
					 // $security_code = $res['security_code']; 
$security_code ="rnw"; 
$all=find_record($grid, $code, $security_code);

// echo count($all->data);

if(isset($_REQUEST['hall'])){
    header("location:hall-ticket.php");
}
if(isset($_REQUEST['result'])){
    header("location:student_result.php");
}

if(isset($_REQUEST['exam'])){
    header("location:piq_form.php");
}

echo "<pre>";
// print_r($all->data);
echo "</pre>";

// echo $all->data['fname'];

$branch_select = "RW";
foreach ($all->data as  $n) {
    // if($n->admission_code == $admission_code)
    // {

    
        //for remarks
        $test=array();
        foreach ($n->remarks as  $v2) {
            
                      $join=$v2->remark."./*/".$v2->remark_by;
                   $test[]=$join;
        }

        $m= implode('/**/', $test);
        $remarkk =  str_replace("'", "`",$m);

        //for image
        $address=$re =  str_replace("'", "`",$n->address);

        //    echo $n->fname;


        //  $update=mysqli_query($con,"update eduzilladata set  admission_status='$n->admission_status' , fname='$n->fname',lname='$n->lname',email='$n->email',mobile='$n->mobile',father_name='$n->father_name',father_mobile='$n->father_mobile',address='$address',course='$n->course',course_package='$n->course_package',admission_date='$n->admission_date',total_fees='$n->total_fees',paid_fees='$n->paid_fees',branch_name='$n->branch_name',remarks='$remarkk' where admission_code='$n->admission_code'") or die(mysqli_error($con));

         
         //$insert=mysqli_query($con,"insert into test_cron(`nme`) values('$gr_id')") or die(mysqli_error($con));


            
    // }

}

function find_record($gr_id, $code, $security_code)
{
		//next example will insert new conversation
$service_url = 'https://erp.eduzilla.in/api/students/details';
$curl = curl_init($service_url);
$curl_post_data = array(
        'GR_ID' => $gr_id,
        'Inst_code' => $code,
        'Inst_security_code' => $security_code,        
);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);
$decoded = json_decode($curl_response);
// $tempp = json_encode($decoded);
// echo "<pre>";
// echo "</pre>";
// echo $decoded;
// print_r($temp);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}



return $decoded;


}

$sqls = "SELECT * FROM gim_students WHERE `grid`='$grid'";
$resu = @mysqli_query($conn,$sqls);

$check = @mysqli_fetch_assoc($resu);


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Profile</title>
    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/favicon.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <style>
    body {

        margin: 0;

        color: #6a6f8c;

        background: white;

        font: 600 16px/18px 'Poppins', sans-serif;

        overflow-x: hidden;

    }

    * {

        outline: none;

    }

    *,

    :after,

    :before {

        box-sizing: border-box;

    }

    .clearfix:after,

    .clearfix:before {

        content: '';

        display: table;

    }

    .clearfix:after {

        clear: both;

        display: block;

    }

    a {

        color: inherit;

        text-decoration: none;

    }

    .hr {

        height: 2px;

        margin: 60px 0 50px 0;

        background: rgba(255, 255, 255, .2);

    }

    .foot {

        text-align: center;

    }

    .card {

        /* width: 500px;*/

        margin: 0 auto;

    }

    ::placeholder {

        color: #e5e5e5;

        font-size: 14px;

    }

    .main_title {

        text-align: center;

        color: black;

    }

    .main_title h2 {

        font-size: 25px;

        padding-bottom: 5px;

    }

    span {

        position: relative;

        text-decoration: none;

        padding: 10px;

        color: white;

        background-color: #C52410;

        border-radius: 5px;

        left: 150px;

        top: 50px;

    }

    span a:hover {

        text-decoration: none;

        color: white;

    }

    .color-theme {

        background: #C52410;

        margin-bottom: 25px;

        margin-left: auto;

        margin-right: auto;

    }

    .form-box h3 {

        text-align: center;

        color: #000;

        font-weight: normal;

        margin: 0 0 30px;

        font-size: 20px;

    }

    .form-box h3:after {

        display: block;

        width: 50px;

        height: 3px;

        background: #C52410;

        content: "";

        margin: 18px auto 0;

    }



    .login-box {

        width: 100%;

        max-width: 550px;

        min-height: 100%;

        /*position: relative;*/

        /*background: url(https://academypragyaedu.com/admin/upload/placement.jpg) no-repeat center;*/

        /* box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);*/

        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.15);

        border-radius: 5px;

    }

    .login-snip {

        width: 100%;

        height: 100%;

        position: absolute;

        padding: 30px 40px;

        background: white;

        border-radius: 5px;

    }

    .login-snip .login,

    .login-snip .sign-up-form {

        top: 0;

        left: 0;

        right: 0;

        bottom: 0;

        position: absolute;

        transform: rotateY(180deg);

        backface-visibility: hidden;

        transition: all .4s linear;

    }

    .login-snip .sign-in,

    .login-snip .sign-up,

    .login-space .group .check {

        display: none;

    }



    /*.login-snip .tab,
    
            .login-space .group .label,
    
            .login-space .group .button {
    
                text-transform: uppercase;
    
            }*/



    .login-snip .tab {

        text-align: center;

        font-size: 15px;

        margin-right: 15px;

        padding-bottom: 5px;

        margin: 0 60px 20px 0;

        display: inline-block;

        /*border-bottom: 1px solid #c52410;*/

        color: #212529;

        cursor: pointer;

        font-weight: 600;

    }

    .login-snip .sign-in:checked+.tab,

    .login-snip .sign-up:checked+.tab {

        color: #c52410;

        border-color: #fff;

        border-bottom: 1px solid #c52410;

    }

    .login-space {

        min-height: 345px;

        position: relative;

        perspective: 1000px;

        transform-style: preserve-3d;

    }

    .login-space .group {

        margin-bottom: 15px;

    }

    .login-space .group .label,

    .login-space .group .input,

    .login-space .group .button {

        color: #212529;

        display: block;

        /* height: calc(2.25rem + 2px);*/

        padding: .375rem .75rem;

        font-size: 1rem;

        line-height: 1.5;

    }

    .login-space .group .button {

        cursor: pointer;

    }

    .login-space .group .input,

    .login-space .group .button {

        width: 100%;

        border: 1px solid #ced4da;

        /* padding: 15px 20px;*/

        border-radius: 4px;

        background: rgba(255, 255, 255, .1);

    }

    .form-control {

        display: block;

        width: 100%;

        height: calc(2.25rem + 2px);

        padding: .375rem .75rem;

        font-size: 1rem;

        color: #495057;

        background-color: #fff;

        background-clip: padding-box;

        border: 1px solid #ced4da;

        border-radius: .25rem;

        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;

    }

    .login-space .group input[data-type="password"] {

        text-security: circle;

        -webkit-text-security: circle;

    }

    .login-space .group .label {

        color: #212529;

        /*padding-left: 10px;
    
                padding-bottom: 10px;*/

        line-height: 100%;

        font-size: 12px;

        display: inline-block;

        vertical-align: top;

        margin: 0 0 6px;

        font-weight: 400;

    }

    .login-space .group .button {

        background: #c52410;

        border-radius: 3px;

        border: 0;

        color: #fff;

        text-transform: uppercase;

        -webkit-transition: all 0.5s;

        -moz-transition: all 0.5s;

        transition: all 0.5s;

        width: auto !important;

        font-size: 12px !important;

        line-height: 30px !important;

        padding: 0 30px !important;

        margin: 0 auto;

    }

    .login-space .group label .icon {

        width: 15px;

        height: 15px;

        border-radius: 2px;

        position: relative;

        display: inline-block;

        background: rgba(255, 255, 255, .1);

    }

    .login-space .group label .icon:before,

    .login-space .group label .icon:after {

        content: '';

        width: 10px;

        height: 2px;

        background: #fff;

        position: absolute;

        transition: all .2s ease-in-out 0s;

    }

    .login-space .group label .icon:before {

        left: 3px;

        width: 5px;

        bottom: 6px;

        transform: scale(0) rotate(0);

    }



    .login-space .group label .icon:after {

        top: 6px;

        right: 0;

        transform: scale(0) rotate(0);

    }



    .login-space .group .check:checked+label {

        color: #fff;

    }



    .login-space .group .check:checked+label .icon {

        background: #c52410;

    }



    .login-space .group .check:checked+label .icon:before {

        transform: scale(1) rotate(45deg);

    }



    .login-space .group .check:checked+label .icon:after {

        transform: scale(1) rotate(-45deg);

    }



    .login-snip .sign-in:checked+.tab+.sign-up+.tab+.login-space .login {

        transform: rotate(0);

    }



    .login-snip .sign-up:checked+.tab+.login-space .sign-up-form {

        transform: rotate(0);

    }

    .cus-flex {
        display: grid;
        align-items: center;
        grid-template-columns: 13fr 3fr 1fr 3fr;
    }

    .f-w-600 {
        font-weight: 600
    }

    .m-b-20 {
        margin-bottom: 20px font-size: 18px;
    }

    .m-t-40 {
        margin-top: 20px
    }

    .p-b-5 {
        padding-bottom: 5px !important
    }

    .m-b-10 {
        margin-bottom: 10px
    }

    .m-t-40 {
        margin-top: 20px
    }

    .b-b-default {
        border-bottom: 1px solid #e0e0e0
    }

    .m-b-10 {
        margin-bottom: 10px
    }

    .b-b-default {
        border-bottom: 1px solid #e0e0e0
    }

    .m-b-20 {
        margin-bottom: 20px
    }

    .p-b-5 {
        padding-bottom: 5px !important
    }

    .test {
        background-image: url(assets/images/shadow_rnw.png);
        background-size: 15%;
        background-repeat: no-repeat;
        /* background-position: center; */
        /* right: 125%; */
        background-position-x: 45%;
        background-position-y: 50%;
    }
    </style>

</head>

<body>
    <style>
    /* img {
            -webkit-filter: opacity(.5) drop-shadow(0 0 0 rgb(255, 0, 0));
            filter: opacity(.5) drop-shadow(0 0 0 rgb(255, 0, 0));
        } */
    </style>
    <div class="container-fluid test">
        <div class="container" style="background:transparent">
            <div class="col-xl-10 col-lg-11 mx-auto login-container" style="background:transparent">
                <div class="row">

                    <div class="col-lg-5 col-md-6 no-padding align-items-center d-flex">
                        <div class="login-box">
                            <center>
                                <div class="m-b-25"> <?php if($n->image->content != "") {?> <img
                                        src="data:image/png;base64,<?php echo $n->image->content; ?>" class="img-radius"
                                        style="margin-bottom:10px alt=" User-Profile-Image"> <?php } ?> </div>
                                <h6 class="f-w-600" style="margin-top:10px">
                                    <?php echo "RWn. ". $n->fname." ".$n->lname?></h6>
                                <p>G.I.M</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                <?php
                                    	$se = "SELECT * FROM gim_students WHERE grid='$grid'";

                                        $re = mysqli_query($conn,$se);
                                        $r = mysqli_fetch_assoc($re);
                                    
                                        if($r['e_status']==2){
                                            echo "<p style='color:red'>".$_SESSION['exam_c']."</p>";
                                            echo "<h4 style='color:green; font-size:15px;'>Your Exam is Completed.</h4>";
                                        }
                                    
                                ?>
                                <form action="" method="post">
                                    <?php if($check['e_status']==0){ ?>
                                    <button style="display:" class="btn btn-success" name="hall">Hall
                                        Ticket</button>
                                        <?php }  if($check['e_status']==2){ ?>
                                    <button style="display:;" name="result" class="btn btn-info">Result</button>
                                    <?php } ?>
                                </form>
                                <?php if($check['schedule_id']==6){?>
                                <form action="" method="post" style="margin-top: 20;">
                                    <?php //echo "<p style='color:darkgreen;'>All The Best For Exam</p>"; ?>
                                    <button
                                        style="display:<?php if($check['e_status']==0 || $check['e_status'] == 1){ echo ""; } else { echo "none"; } ?>"
                                        class="btn btn-danger" name="exam">Exam Paper</button>
                                    <!-- <button class="btn btn-info" disabled>Result</button> -->
                                </form>
                                <?php } ?>
                        </div>
                        </center>
                    </div>

                    <div class="col-lg-7 col-md-6 img-box">
                        <div class="card-block">
                            <h2 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h2>
                            <div class="row">
                                <div class="col-sm-6 cus-flex">
                                    <p class="m-b-10 f-w-600" style="width: 100px;">Email</p>
                                    <h6 class="text-muted f-w-400" style="width: 150px;"><?php echo $n->email; ?></h6>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6 cus-flex">
                                    <p class="m-b-10 f-w-600" style="width: 100px;">Phone</p>
                                    <h6 class="text-muted f-w-400" style="width: 150px;"><?php echo $n->mobile; ?></h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 cus-flex">
                                    <p class="m-b-10 f-w-600" style="width: 100px;">GRID</p>
                                    <h6 class="text-muted f-w-400" style="width: 150px;"><?php echo $grid; ?></h6>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6 cus-flex">
                                    <p class="m-b-10 f-w-600" style="width: 100px;">Branch</p>
                                    <h6 class="text-muted f-w-400" style="width: 250px;"><?php 
                        
                        foreach ($all->data as  $n) {
                                if($n->branch_name[0] != '') {
                                    echo $n->branch_name.", ";
                                    
                                }                        
                        
                        }?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
        $(document).ready(function() {

            //called when key is pressed in textbox

            $("#GrId").keypress(function(e) {

                //if the letter is not digit then display error and don't type anything

                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {

                    //display error message

                    $("#error_grid").html("Digits Only").show();

                    return false;

                } else {

                    var totaldigit = $('#GrId').val();

                    totaldigit = (parseInt(totaldigit.length));

                    if (totaldigit >= 5)

                    {

                        return false;

                    }



                    $("#error_grid").html("").show();

                    return true;

                }

            });

        });

        function get_student_record_grId() {
            var grid = $('#GrId').val();

            if (grid != '') {
                $('#error_grid').html("");

                $.ajax({

                    url: "ajax_api_student.php",

                    type: "post",

                    dataType: "json",

                    data: {

                        'grid': grid

                    },

                    success: function(res)

                    {

                    }

                });

            } else {
                $('#error_grid').html("Please Enter GRID");
            }

        }
        </script>

</body>

<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>

</html>