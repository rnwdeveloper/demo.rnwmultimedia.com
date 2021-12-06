<?php
   session_start();
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta https-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="shortcut icon" href="https://www.rnwmultimedia.com/wp-content/uploads/2019/03/favicon-16x16.png" type="image/x-icon">
      <title>Job Application Submission Form</title>
      <script type="text/javascript">
         // function closeCurrentTab(){
         
         // 	var conf=confirm("Are you sure, you want to close this tab?");
         
         // 	if(conf==true){
         
         // 		alert('hello');
         
         // 		var myWindow = window.open("", "_self");
         
         		// 		myWindow.document.write("");
         
         		// 		setTimeout (function() {myWindow.close();},1000);
         
         // 	}
         
         // }
         
         
         
         function leave() {
         
         	alert(open(location, '_self'));
         
         	// 	var conf=confirm("Are you sure, you want to close this tab?");
         
         // 	if(conf==true){
         
         	//close();
         
         	}
         
      </script>
      <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
      <link rel="stylesheet" href="css/style.css" type="text/css">
      <link rel="stylesheet" href="css/datepicker.min.css" type="text/css">
   </head>
   <style type="text/css">
      .form-box h3{
      font-size: 20px;
      }
      .btn-text{
      font-size: 12px !important;
      line-height: 30px !important;
      padding: 0 30px !important;
      margin-bottom: 20px !important;
      }
      .box-inner{
      padding:12px 20px;
      }
      .form-group label {
      line-height: 100%;
      font-size: 15px;
      }
   </style>
   <body>
      <div class="color-theme-1">
         <div class="container text-center pt-3 pb-3">
            <a href="https://www.rnwmultimedia.com/" target="_blank" style="display: inline-block;"><img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/05/logoWhite.png" width="200" alt="Red & White MUltimedia Education" title="Red & White MUltimedia Education"/></a>
         </div>
      </div>
      <section>
         <div class="container">
            <?php if(isset($_SESSION['msg'])){ ?>
            <div class="alert alert-danger" id="already_applied_msg"><?php echo $_SESSION['msg']; ?></div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
            <div class="alert alert-success" id="suc_msg"><?php echo $_SESSION['success']; ?></div>
            <?php } 
               session_destroy();?>
            <!-- <div class="main-title" style="display: inline-block; width: 100%;">
               <h2>Employment Application
               
               <span>APPLICATION NO.: <span> <?php echo $app_no; ?></span></span> 
               
               <span><a href="https://demo.rnwmultimedia.com/placement/" style="text-decoration: none; padding:5px; color:white; background-color: #C52410; border-radius: 5px;">FIND JOBS</a> <span> <?php echo $app_no; ?></span></span>
               
               <input type="hidden" class="form-control" name="application_number" required  value="<?php echo $app_no; ?>" /></h2>
               
               </div> -->
            <form method="post" enctype="multipart/form-data" id="placement_form" action="ajax_api_student.php">
               <div class="form-box">
                  <h3>Applicant Information</h3>
                  <div class="row">
                     <div class="col-lg-6 col-12 mx-auto">
                        <div class="box-inner">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="GrId">Gr Id</label>
                                    <input type="text" class="form-control" id="GrId" name="gr_id" placeholder="0001"  required/>
                                 </div>
                                 <span style="color:red;" id="error_grid"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="btn-cust">
                  <input class="btn btn-success btn-text" type="submit" name="submit" value="submit">
               </div>
            </form>
         </div>
      </section>
      <!--  Terms & Conditions for students modal -->
      <!--  email Confimation modal -->
      <!--  Footer Section  -->
      <section class="pt-3 pb-3 text-center text-white copyright" style="background-color: #1c2023; font-size: 12px;">
         <div class="container">
            © Copyright 2020. <a href="https://www.rnwmultimedia.com/" target="_blank">Red & White Multimedia Education</a>. All Rights Reserved.
         </div>
      </section>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.js" type="text/javascript"></script>
      <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      <script src="js/datepicker.min.js" type="text/javascript"></script>
      <script>
         $('[data-toggle="datepicker"]').datepicker();
         
      </script>
   </body>
</html>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
   $(document).ready(function () {
     //called when key is pressed in textbox
     $("#GrId").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
           //display error message
           $("#error_grid").html("Digits Only").show();
                  return false;
       }
       else
       {
       	$("#error_grid").html("").show();
       	return true;
       }
      });
   });
   
   function get_student_record_grId()
   {
   	var grid = $('#GrId').val();
   
   	if(grid != ''){
   	$('#error_grid').html("");
   
   	$.ajax({
   		url:"ajax_api_student.php",
   		type:"post",
   		dataType : "json",
   		data:{
   			'grid' : grid
   		},
   		success:function(res)
   		{
   			// var obj = jQuery.parseJSON(res);
   		}
   	});
   	}
   	else
   	{
   		$('#error_grid').html("Please Enter GRID");
   	}
   }
   // $('#already_applied_msg').fadeOut(5000);
</script>