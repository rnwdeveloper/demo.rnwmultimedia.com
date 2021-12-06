<?php //print_r($_SESSION); die;?>
<link rel="stylesheet"
   href="https://demo.rnwmultimedia.com/dist/assets/bundles/owlcarousel2/dist/assets/owl.carousel.min.css">
<link rel="stylesheet"
   href="https://demo.rnwmultimedia.com/dist/assets/bundles/owlcarousel2/dist/assets/owl.theme.default.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">
            <div class="extra_lead_menu">
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 d-flex flex-wrap justify-content-between">
                                <h6 class="page-title text-dark mb-3">User Profile</h6>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb p-0">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <div id="msg_im">
                                        <?php if(!empty($msgp)) { ?> <p style="color:#F00;"><?php echo $msgp;  ?></p> <?php } ?>
                                            <?php if(!empty($msgpc)) { ?> <p style="color:#090;"><?php echo $msgpc;  ?></p> <?php } ?>
                                        </div>
                                        <div class="card card-primary shadow-sm">
                                            <div class="card-header form-title">
                                                <h4 class="mx-auto">Change Profile Picture</h4>
                                            </div>
                                            <div class="card-body text-center">
                                            <form enctype="multipart/form-data" method="post" action="<?php echo base_url();?>Common/view_profile">
                                                    <?php if($_SESSION['user_image']=="") { ?>
                                                    <div class="change_profile_image">
                                                        <img src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" name="image" height="100px" width="100px" id="image_d" >
                                                        <div class="file_upload">
                                                            <input type="file" name="image"> 
                                                            <i class="fas fa-camera"></i>
                                                        </div>
                                                    </div>
                                                    <?php } else {?>
                                                        <div class="change_profile_image">
                                                        <img src="<?php echo base_url(); ?>dist/img/<?php echo $_SESSION['user_image'];  ?>" name="image"  height="100px" width="100px" id="image_d" >
                                                        <div class="file_upload">
                                                            <input type="file" name="image">
                                                            <i class="fas fa-camera"></i>
                                                        </div>
                                                    </div>
                                                        <?php }?>
                                                    <input class="btn btn-primary" type="submit" name="cimage" value="Change Image">
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="card card-primary shadow-sm email_wrap">
                                            <div class="card-header form-title">
                                                <h4>Change Password</h4>
                                            </div>
                                            <div class="card-body">
                                                <span id="msg_batch"></span>
                                                <div class="form-group">
                                                    <label>New Password</label>
                                                    <input type="password" id="new_pass" class="form-control" placeholder="New Password" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Confirm Passowrd</label>
                                                    <input type="password" id="con_pass" class="form-control" placeholder="Confirm Passowrd" required="" onkeyup="return conpassword()">
                                                </div>
                                                <input class="btn btn-primary" id="change_pass" type="submit" name="" value="Change Password">
                                            </div>
                                        </div>
                                    </div>
                                    <?php //foreach($select_user as $val) {?>
                                    <div class="col-md-6 mb-3">
                                        <div class="card card-primary shadow-sm email_wrap">
                                            <div class="card-header form-title">
                                                <h4>Change Details</h4>
                                            </div>
                                            <div class="card-body pl-3 pr-3 row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" id="user_email" class="form-control" placeholder="yourmail@gmail.com" value="<?php echo $select_user->email; ?>">
                                                    </div>
                                                </div>
                                                <?php if($_SESSION['logtype'] == "Super Admin") {?>
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Designation</label>
                                                        <input type="text" class="form-control" id="designation" placeholder="yourmail@gmail.com" value="<?php echo $select_user->designation; ?>">
                                                    </div>
                                                </div>
                                                <?php } else  {?>
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Designation</label>
                                                        <input type="text" class="form-control" id="designation" placeholder="yourmail@gmail.com" value="<?php echo $select_user->designation; ?>">
                                                    </div>
                                                </div>
                                                <?php }?>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Mobile No</label>
                                                        <input type="text" class="form-control" id="mobileNo" value="<?php echo $select_user->mobile_no; ?>" placeholder="+91-00000-00000" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Personal No</label>
                                                        <input type="text" class="form-control"  id="personal_no" value="<?php echo $select_user->personal_no; ?>" placeholder="+91-00000-00000" required="">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <input class="btn btn-primary" type="submit"  id="s_details" name="s_details" value="Change Details">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php //}?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<div class="modal fade add_Email_template" tabindex="-1" role="dialog" aria-labelledby="add_Email_template"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="add_Email_template">Add Email Template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Template Name</label>
                                <input type="text" class="form-control" placeholder="Template Name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Template Message</label>
                                <textarea class="form-control" name="" id="" rows="7"
                                    placeholder="Template Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Save" name="Save">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/cleave-js/dist/cleave.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/forms-advanced-forms.js"></script>

<!-- General JS Scripts -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/app.min.js"></script> 
<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/datatables.js"></script>

<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>

<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/custom.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/toastr.js"></script>
 
<script>

    $('#change_pass').hide();
    function conpassword()
    {
        var npass = document.getElementById("new_pass");
        var cpass = document.getElementById("con_pass");
        if(npass.value == cpass.value)
        {
            $('#change_pass').show();
        }
        else{
            $('#change_pass').hide();
        }
    }


    $('#change_pass').on('click', function() {
   
   var cpass = $('#con_pass').val();
   $.ajax({
   type: "POST",
   url: "<?php echo base_url() ?>Common/change_user_pass",
   data: {
     'password': cpass,
   },       
   success: function(resp) {
   var data = $.parseJSON(resp);
   var ddd = data['all_record'].status;
   if (ddd == '1') {
     $('#msg').html(iziToast.success({
         title: 'Success',
         timeout: 2500,
         message: 'HI! password is changed......',
         position: 'topRight'
     }));
     $.ajax({
        url: "<?php echo base_url(); ?>Common/sessionDelete",
        type: "post",
    });
    setTimeout(function() {
         location.reload();
     }, 2020);
   } else if (ddd == '2') {
     $('#msg').html(iziToast.error({
         title: 'Canceled!',
         timeout: 2500,
         message: 'Someting Wrong!!',
         position: 'topRight'
     }));
     setTimeout(function() {
         location.reload();
     }, 2020);
   
   }
   }
   });
   return false;
   });


   $('#s_details').on('click', function() {
   
   var email = $('#user_email').val();
   var designation = $('#designation').val();
   var mobileNo = $('#mobileNo').val();
   var personal_no = $('#personal_no').val();
   $.ajax({
   type: "POST",
   url: "<?php echo base_url() ?>Common/change_user_details",
   data: {
     'email' :email,
     'designation' :designation,
     'mobile_no' :mobileNo,
     'personal_no' :personal_no,
   },       
   success: function(resp) {
   var data = $.parseJSON(resp);
   var ddd = data['all_record'].status;
   if (ddd == '1') {
     $('#msg').html(iziToast.success({
         title: 'Success',
         timeout: 2500,
         message: 'HI! record is updated......',
         position: 'topRight'
     }));
     setTimeout(function() {
         location.reload();
     }, 2020);  
   } else if (ddd == '2') {
     $('#msg').html(iziToast.error({
         title: 'Canceled!',
         timeout: 2500,
         message: 'Someting Wrong!!',
         position: 'topRight'
     }));
    //  setTimeout(function() {
    //      location.reload();
    //  }, 2020);
   
   }
   }
   });
   return false;
   });

   function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready( function() {
        $('#msg_im').delay(1000).fadeOut('fast');
      }); 



$('#msg_batch').hide();
        document.getElementById("con_pass").readOnly = true;



   $(document).ready(function(){
  $("#new_pass").keyup(function(){
    var password = $('#new_pass').val();
    var regix = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{10,})");

    if(regix.test(password) == false && password.length <= 10) {

            //$('#msg_batch').fadeIn();
            $('#msg_batch').show();
            $('#msg_batch').html("<div class='alert alert-danger' role='alert'><b>password must contain 1 spacial charecter , a Upper case Alphabet and a number and length have to be more then 10</b></div>");
            document.getElementById("con_pass").readOnly = true;
            //$('#msg_batch').fadeOut(2000);
        }
    else{
        $('#msg_batch').hide();
        document.getElementById("con_pass").readOnly = false;

    }
  });
}); 
</script>



</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>