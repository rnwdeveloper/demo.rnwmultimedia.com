<div class="post_a_job_page"></div>
<style type="text/css">
.divider {
 font-size: 1px;
 background: rgba(0, 0, 0, 0.5);
}

.divider--danger {
  background: red;
}
  
.help{
    position: absolute;
    font-size: 20px;
    bottom:0px;
    right:2px;
    color:red;
}
.help:hover{
    cursor: hand;
}
</style>

<?php 
    include('new_header.php'); 
    include('db.php');
    $a='PHPMailer/PHPMailer/PHPMailerAutoload.php';
    require $a;
    if(isset($_POST['edit_company_detail']))
    {
        $company_name =  $_POST['company_name'];
        $company_phone_no =  $_POST['company_number'];
        $company_address =  $_POST['company_address'];
        $employer_name =  $_POST['employer_name'];
        $company_url =  $_POST['url'];            
        $employer_designation =  $_POST['employer_designation'];
        $employer_email =  $_POST['employer_email'];
        $company_id =  $_SESSION['record']['company_id'];
        if($company_name == ''){
            $company_name_error =  "Please enter Company name";
        }
        else if(strlen($company_name)<3){
        	$company_name_error =  "enter Valid company name";
        }
        else{
            $company_name_error = '';
        }
        if($company_phone_no == ''){
            $company_phone_no_error ="Enter Company Number";
        }
        else{
            $company_phone_no_error = '';
        }
        if($company_address == ''){
            $company_address_error = "Enter company Address";
        }
        else{
            $company_address_error ='';
        }
        if($employer_name ==''){
            $employer_name_error = "Enter Employer Name";
        }
        else{
            $employer_name_error ='';
        }
        if($company_url == ''){
            $company_url_error ="Please Enter Company URL";
        }
        else{
            $company_url_error ='';
        }
        if($employer_designation == ''){
            $employer_designation_error ="Please enter employer Designation";
        }
        else{
            $employer_designation_error ='';
        }
        if($employer_email == ''){
            $employer_email_error ="Enter Company Email ID";
        }
        else{
            $employer_email_error ='';
        }

        if($company_name_error != '' || $company_phone_no_error != '' || $company_address_error !='' || $employer_name_error != '' || $company_url_error != '' || $employer_designation_error != '' || $employer_email_error != ''){


        }
        else{
            date_default_timezone_set('Asia/Kolkata');
            $cu_date = date("Y-m-d g:i a"); 
            $query_company =  "update company_detail set `company_name`='$company_name',`company_number`='$company_phone_no',`url`='$company_url',`employer_name`='$employer_name',`employer_designation`='$employer_designation',`email_id`='$employer_email',`company_address`='$company_address' where `company_id`='$company_id'";
            $query_company1 =  mysqli_query($con,$query_company);
            if($query_company1)
            {
                unset($_SESSION['record']);
                $_SESSION['record'] = $_POST;
                $data_success = "Company Detail Updated Successfully";
            }
            else
            {
                $data_danger = "Something Wrong";
            }
            
        }
    }

    ?>	



<style type="text/css">

  .post_help{

   position: absolute;
            right: 0px;
            top: 300px;
            background-color:lightgray;
            width: 50px;
            color:red;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            cursor: hand;
            text-align: center;

  }

  .post_help span{

    text-align: center;
            left:10px;
            font-weight: 800;
            font-size:20px;

  }

</style>

	<section class="post_a_job_form d-inline-block w-100 position: relative" id="post_a_job">



    <div class="post_help btn btn-sm video" data-video="http://demo.rnwmultimedia.com/placement/video/PostJobHelp.mp4" data-toggle="modal" data-target="#videoModal" data-backdrop="static" data-keyboard="false">

       <img src="https://demo.rnwmultimedia.com/placement/images/helpIcon.png" height="30" width="30" ><span><br>H<br>e<br>l<br>p</span>

    </div>

		<div class="container">

			<div class="row">

				<div class="col-xl-12">

					<div class="sec-heading text-center">

			            <h2>Company Details</h2>
                    </div>

				</div>

			</div>

			<div class="col-xl-10 mx-auto">



        <?php if(isset($data_success)) { ?>

        <div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><?php echo $data_success; ?></div>

          <?php } ?>



          <?php if(isset($data_danger)) { ?>

        <div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><?php echo $data_danger; ?></div>

          <?php } ?>

          <form id="registration_form" method="post">

                <div class="row">

                    <div class="col-xl-6">

                        <div class="form-group">

                            <label>Company Name</label>

                            <input type="text" name="company_name" id="company_name" placeholder="Company Name" class="form-control" value="<?php if(isset($_SESSION['record']['company_name'])) { echo $_SESSION['record']['company_name'];  }?>">

                        </div>

                    </div>

                    <div class="col-xl-6">

                        <div class="form-group">

                            <label>Company Phone No</label>

                            <input type="text" name="company_number" id="company_number" placeholder="Company Phone No" class="form-control" value="<?php if(isset($_SESSION['record']['company_number'])) { echo $_SESSION['record']['company_number']; }?>">

                        </div>

                    </div>

                    <div class="col-xl-12">

                        <div class="form-group">

                            <label>Company Address</label>

                            <textarea placeholder="Company Address" name="company_address" id="company_address" class="form-control"><?php if(isset($_SESSION['record']['company_address'])) { echo $_SESSION['record']['company_address'];  }?></textarea>

                        </div>

                    </div>

                    <div class="col-xl-6">

                        <div class="form-group">

                            <label>Employer/Recruiter Name</label>

                            <input type="text" name="employer_name" id="employer_name" placeholder="Employer/Recruiter Name" class="form-control" value="<?php if(isset($_SESSION['record']['employer_name'])) { echo $_SESSION['record']['employer_name'];  }?>">

                        </div>

                    </div>

                    <div class="col-xl-6">

                        <div class="form-group">

                            <label>Company URL</label>

                            <input type="text" name="url"  id="url" placeholder="Enter URL Like http://" class="form-control" value="<?php if(isset($_SESSION['record']['url'])) { echo $_SESSION['record']['url'];  }?>">

                        </div>

                    </div>

                    <div class="col-xl-6">

                        <div class="form-group">

                            <label>Employer/Recruiter Designation</label>

                            <input type="text" name="employer_designation" id="employer_designation" placeholder="Employer/Recruiter Designation" class="form-control" value="<?php if(isset($_SESSION['record']['employer_designation'])) { echo $_SESSION['record']['employer_designation'];  }?>">

                        </div>

                    </div>

                    <div class="col-xl-6">

                        <div class="form-group">

                            <label>Company/Recruiter Email</label>

                            <input type="email" name="email_id" id="email_id" placeholder="Company/Recruiter Email" class="form-control" value="<?php if(isset($_SESSION['record']['email_id'])) { echo $_SESSION['record']['email_id'];  }?>">

                        </div>

                    </div>
                   <!--  <div class="col-xl-12">
                        <div class="form-group">
                             <input type="submit" name="RegisterCompany" value="Edit Details" class="btn btn-primary">
                             <i class="fa fa-spinner fa-spin" ></i>
                        </div>
                    </div> -->

                     <div class="col-xl-12">

                        <div class="form-group">

                           

                            <input type="submit" name="edit_company_detail" id="edit_company_detail" class="form-control btn btn-primary" value="Edit Details">

                        </div>

                    </div>

                </div>

            </form>

				

			</div>

		</div>

	</section>



 <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-left:-10%;">

    <div class="modal-dialog">

      <div class="modal-content" style="width:150%;">

        <div class="modal-body">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

          <video controls width="100%">

            <source src="" type="video/mp4">

          </video>

        </div>

      </div>

    </div>

  </div>





<?php include('footer.php'); ?>



  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



  <script>

  $( function() {

    $( "#slider-range" ).slider({

      range: true,

      min: 8000,

      max: 100000,

      values: [ 8000, 15000 ],

      slide: function( event, ui ) {

        $( "#amount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );

      }

    });

    $( "#amount" ).val("" + $( "#slider-range" ).slider( "values", 0 ) +

      " - " + $( "#slider-range" ).slider( "values", 1 ) );

  } );





  $( function() {

    $( "#datepicker" ).datepicker({

    	minDate: 0,

      dateFormat: 'yy-mm-dd' 

    });

  } );



   $( function() {

    $( "#datepicker1" ).datepicker({

    	minDate: 0,  dateFormat: 'yy-mm-dd'

    });

  } );





   function get_subcategory(){

     var ct_record =  $('#position').val();

     $.ajax({

        url : "ajax_sub_category.php",

        type : "post",

        data:{

          'category_record' : ct_record

        },

        success:function(response){

          $('#job_subcategory').html(response);

        }

     });

   }

  </script>







<script>

$(function() {

  $(".video").click(function () {

    var theModal = $(this).data("target"),

        videoSRC = $(this).attr("data-video"),

        videoSRCauto = videoSRC + "";

    $(theModal + ' source').attr('src', videoSRCauto);

    // alert(videoSRCauto);

    $(theModal + ' video').load();

    $(theModal + ' button.close').click(function () {

      $(theModal + ' source').attr('src', '');

      videoSRCauto = '';

      $(theModal + ' source').attr('src', videoSRCauto);

      $(theModal + ' video').load();

     });

  });

});





$('#videoModal').modal({backdrop: 'static', keyboard: false})  

 cache.delete(request, {options}).then(function(found) {

        // your cache entry has been deleted if found

    });









$(document).ready(function() {

  var theModal = $(this).data("target");

      

        videoSRCauto = "";

    $(theModal + ' source').attr('src', videoSRCauto);

    // alert(videoSRCauto);

    $(theModal + ' video').load();

});





window.setTimeout(function(){

  location.reload(); 

},2000);

</script>

