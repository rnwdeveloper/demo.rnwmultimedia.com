<?php

ob_start();

session_start(); 



?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="https://www.rnwmultimedia.com/wp-content/uploads/2019/03/favicon-16x16.png"
        type="image/x-icon">

    <title>GIM Exam Result</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

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

        min-height: 650px;

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
    </style>

</head>

<body>

    <div class="color-theme">

        <div class="container-fluid text-center pt-3 pb-3">

            <div class="row justify-content-center">

                <a href="https://localhost/" target="_blank" style="display: inline-block;">

                    <img src="assets/images/rnw.png" width="320" alt="Red & White MUltimedia Education"
                        title="Red & White MUltimedia Education" />

                </a>

            </div>

        </div>

    </div>

    <div class="main_title">

        <div class="container form-box">

            <!-- <h2>GIM Student Result</h2> -->

        </div>

        <div class="container">

            <div class="row">

                <div class="col-md-6 col-sm-10 mx-auto">

                    <div class="card" style="border: none;">

                        <?php if(isset($_SESSION['msg'])){ ?>

                        <div class="alert alert-danger" id="already_applied_msg"><?php echo $_SESSION['msg']; ?></div>

                        <?php } ?>

                        <?php if(isset($_SESSION['success'])) { ?>

                        <div class="alert alert-success" id="suc_msg"><?php echo $_SESSION['success']; ?></div>

                        <?php } 
?>

                        <div class="login-box">

                            <div class="login-snip">


                                <input id="tab-2" type="radio" name="tab" class="sign-up">

                                <label for="tab-2" class="tab"></label>

                                <input id="tab-2" type="radio" name="tab" class="sign-up">

                                <label for="tab-2" class="tab"></label>


                                <input id="tab-1" type="radio" name="tab" class="sign-in" checked>

                                <label for="tab-1" class="tab"><h2>GIM Student</h2></label>

                                <input id="tab-2" type="radio" name="tab" class="sign-up">

                                <label for="tab-2" class="tab"></label>

                                <div class="login-space">

                                    <form method="post" action="grid_otp_checker.php">
                            
                                        <div class="login">

                                            <div class="group text-center">

                                                <img src="https://demo.rnwmultimedia.com/placement/images/student.png"
                                                    width="100">

                                            </div>

                                            <div class="group text-left">

                                                <label for="user" class="label">GR ID</label>

                                                <input type="text" name="gr_id" id="GrId" class="input form-control"
                                                    placeholder="Enter your GR ID" required="">

                                                <!-- <span style="color:red;" id="error_grid"></span> -->

                                            </div>

                                            <div class="group">

                                                <!-- <div style="width:100%; margin-bottom: 15px;" class="g-recaptcha" data-sitekey="6Ld8n2caAAAAAFn1Ig2FUz1PBu_QKlPWuTBnTFYF"></div> -->

                                            </div>



                                            <div class="group text-center">

                                                <input type="submit" name="submit" class="button" value="Submit">

                                            </div>

                                            <!--  <span>

                                                <a href="https://demo.rnwmultimedia.com/placement/" target="_blank">FIND JOBS</a>

                                            </span> -->

                                        </div>



                                    </form>

                                    <!-- <form method="post" action="alumini_grid_otp_checker.php">

                                        <div class="sign-up-form">

                                            <div class="group text-center">

                                                <img src="https://demo.rnwmultimedia.com/placement/images/Alumni.png" width="100"> 

                                            </div>

                                            <div class="group text-left">

                                                <label for="user" class="label">Certificate Number</label>

                                                <input id="user" type="text" class="input" placeholder="Enter your certificate number" name="certification_number">

                                            </div>

                                            <div class="group text-left">

                                                <label for="email" class="label">Email ID</label> 

                                                <input id="email" type="email" class="input" data-type="text" placeholder="Enter your Email ID" name="email">

                                            </div>

                                            <div class="group text-left">

                                                <label for="pass" class="label">Mobile Number</label> 

                                                <input id="pass" type="text" class="input" data-type="text" placeholder="Enter your mobile number"name="alumini_mobile_no">

                                            </div>

                                            <div class="group">

                                                <div style="margin-bottom: 15px;" class="g-recaptcha" data-sitekey="6Ld8n2caAAAAAFn1Ig2FUz1PBu_QKlPWuTBnTFYF"></div>

                                            </div>

                                            <div class="group text-left">

                                                <input type="submit" name="submit" id="submit" class="button" value="Submit">

                                            </div>

                                        
                                    </div>

                                </form> -->

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>















    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

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

</html>