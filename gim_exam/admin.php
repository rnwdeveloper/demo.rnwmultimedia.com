 <?php

    include('config.php');
    session_start();
    ob_start();

    if(@$_SESSION['email'] != null && @$_SESSION['name'] != null){

        header('location: students.php');

    }



?>

 <!DOCTYPE html>
 <html dir="ltr">

 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <!-- Tell the browser to be responsive to screen width -->
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="">
     <meta name="author" content="">
     <!-- Favicon icon -->
     <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
     <title>GIM Exam Admin Panel</title>
     <!-- Custom CSS -->
     <link href="dist/css/style.min.css" rel="stylesheet">
     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
     <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
 </head>

 <body>
     <div class="main-wrapper">
         <!-- ============================================================== -->
         <!-- Preloader - style you can find in spinners.css -->
         <!-- ============================================================== -->
         <div class="preloader">
             <div class="lds-ripple">
                 <div class="lds-pos"></div>
                 <div class="lds-pos"></div>
             </div>
         </div>
         <!-- ============================================================== -->
         <!-- Preloader - style you can find in spinners.css -->
         <!-- ============================================================== -->
         <!-- ============================================================== -->
         <!-- Login box.scss -->
         <!-- ============================================================== -->
         <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
             <div class="auth-box bg-dark">
                 <div id="loginform">
                     <div class="text-center p-t-20 p-b-20 auth-box bg-dark border-bottom border-secondary">
                         <!-- <span class="db"><img src="assets/images/logo.png" alt="logo" /></span> -->
                         <h3 style="color:white">GIM EXAM ADMIN</h3>
                     </div>
                     <!-- Form -->
                     <form class="form-horizontal m-t-20" id="loginform" action="" method="POST">
                         <div class="row p-b-30">
                             <div class="col-12">
                                 <?php

if(isset($_REQUEST['submit'])){

    if($_REQUEST['email'] && $_REQUEST['pass']){

        $email = $_REQUEST['email'];
        $pass = $_REQUEST['pass'];

        $q = "SELECT * FROM gim_user WHERE email='$email' AND password='$pass'";

        $res = mysqli_query($conn, $q);
        
        @$row = mysqli_fetch_assoc($res);

        if(@mysqli_num_rows($res) == 1){

            $_SESSION['email'] = $email;
            $_SESSION['name'] = $row['name'];
            $_SESSION['isAdmin'] = $row['isAdmin'];
            $_SESSION['f_branch'] = $row['branch'];

            header('location: students.php');

        }else{
           


?>

                                 <center>
                                     <h4 class="text-danger">Please Check Your Login!</h4>
                                 </center>

                                 <?php   }   }   }  ?>
                                 <div class="input-group mb-3">
                                     <div class="input-group-prepend">
                                         <span class="input-group-text bg-success text-white" id="basic-addon1"><i
                                                 class="ti-user"></i></span>
                                     </div>
                                     <input type="email" class="form-control form-control-lg" name="email"
                                         placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"
                                         required="">
                                 </div>
                                 <div class="input-group mb-3">
                                     <div class="input-group-prepend">
                                         <span class="input-group-text bg-warning text-white" id="basic-addon2"><i
                                                 class="ti-pencil"></i></span>
                                     </div>
                                     <input type="password" class="form-control form-control-lg" name="pass"
                                         placeholder="Password" aria-label="Password" aria-describedby="basic-addon1"
                                         required="">
                                 </div>
                             </div>
                         </div>
                         <div class="row border-top border-secondary">
                             <div class="col-12">
                                 <div class="form-group">
                                     <div class="p-t-20">
                                         <!-- <button class="btn btn-info" id="to-recover" type="button"><i class="fa fa-lock m-r-5"></i> Lost password?</button> -->
                                         <button class="btn btn-success float-right" name="submit"
                                             type="submit">Login</button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>
                 <div id="recoverform">
                     <div class="text-center">
                         <span class="text-white">Enter your e-mail address below and we will send you instructions how
                             to recover a password.</span>
                     </div>
                     <div class="row m-t-20">
                         <!-- Form -->
                         <form class="col-12" action="index.html">
                             <!-- email -->
                             <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                     <span class="input-group-text bg-danger text-white" id="basic-addon1"><i
                                             class="ti-email"></i></span>
                                 </div>
                                 <input type="text" class="form-control form-control-lg" placeholder="Email Address"
                                     aria-label="Username" aria-describedby="basic-addon1">
                             </div>
                             <!-- pwd -->
                             <div class="row m-t-20 p-t-20 border-top border-secondary">
                                 <div class="col-12">
                                     <a class="btn btn-success" href="#" id="to-login" name="action">Back To Login</a>
                                     <button class="btn btn-info float-right" type="button"
                                         name="action">Recover</button>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
         <!-- ============================================================== -->
         <!-- Login box.scss -->
         <!-- ============================================================== -->
         <!-- ============================================================== -->
         <!-- Page wrapper scss in scafholding.scss -->
         <!-- ============================================================== -->
         <!-- ============================================================== -->
         <!-- Page wrapper scss in scafholding.scss -->
         <!-- ============================================================== -->
         <!-- ============================================================== -->
         <!-- Right Sidebar -->
         <!-- ============================================================== -->
         <!-- ============================================================== -->
         <!-- Right Sidebar -->
         <!-- ============================================================== -->
     </div>
     <!-- ============================================================== -->
     <!-- All Required js -->
     <!-- ============================================================== -->
     <script src="assets/libs/jquery/dist/jquery.min.js"></script>
     <!-- Bootstrap tether Core JavaScript -->
     <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
     <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
     <!-- ============================================================== -->
     <!-- This page plugin js -->
     <!-- ============================================================== -->
     <script>
     $('[data-toggle="tooltip"]').tooltip();
     $(".preloader").fadeOut();
     // ============================================================== 
     // Login and Recover Password 
     // ============================================================== 
     $('#to-recover').on("click", function() {
         $("#loginform").slideUp();
         $("#recoverform").fadeIn();
     });
     $('#to-login').click(function() {

         $("#recoverform").hide();
         $("#loginform").fadeIn();
     });
     </script>

 </body>

 </html>