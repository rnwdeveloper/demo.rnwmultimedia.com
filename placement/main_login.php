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
    	<style type="text/css">
    		.btn-text{
    			font-size: 12px !important;
    			line-height: 30px !important;
    			padding: 0 30px !important;
    			margin-bottom: 20px !important;
    		}
    		.form-box h3{
    			font-size: 20px;
    		}
    	</style>
	</head>
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
			    
					<div class="form-box">
						<h3 class="">Welcome<br/>RNW Placement Department</h3>
						<!-- <div class="row">
							<div class="col-lg-6 col-12 mx-auto">
								<div class="box-inner">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="GrId">Gr Id</label>
												<input type="text" class="form-control" id="GrId" name="gr_id" placeholder="0001"  required  />
											</div>
											<span style="color:red;" id="error_grid"></span>
										</div>	
									</div>
								</div>
							</div>
						</div> -->
						<div class="btn-cust">
        					<a class="btn btn-success btn-text" href="http://demo.rnwmultimedia.com/placement/">Login</a>
       					</div>
       					<div class="btn-cust">
        					<!-- <a class="btn btn-success btn-text" href="https://demo.rnwmultimedia.com/placement/student_placement_form.php">Register</a> -->
        					<a class="btn btn-success btn-text" href="https://demo.rnwmultimedia.com/placement/ra.php">Register</a>
       					</div>
       					<h4 class="text-center" style="font-size: 14px;">"We Provide you with Infinite Opportunities for Your Better Career"</h4>
					</div>  
    				<!-- <div class="btn-cust">
        				<input class="btn btn-success" type="submit" name="submit" value="submit">
       				</div> -->
				
			</div>
		</section>
		<!--  Terms & Conditions for students modal -->
		<!--  email Confimation modal -->
		<!--  Footer Section  -->
		<section class="pt-3 pb-3 text-center text-white copyright" style="background-color: #1c2023; font-size: 12px; position: absolute;  top: 94.5%; width: 100%;" >
			<div class="container">
			    © Copyright 2020. <a href="https://www.rnwmultimedia.com/" target="_blank">Red & White Group of Institutes</a>. All Rights Reserved.
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
		if(grid != '')
		{
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
	   				// 			alert(obj.msg);
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