<?php
include('db.php');
if(isset($_POST['submit']))
{
		$name = $_POST['name'];
	    $review = $_POST['review'];
	    $photo =  $_FILES['ephoto']['name'];
		move_uploaded_file($_FILES['ephoto']['tmp_name'],"review/".$photo);

		if($name==''){
		    $name_error =  "enter Your Name";
		}
		else if ($review == ''){
			$review_error = "enter your review";
		}
		else if($photo == ''){
			$photo_error = "Upload Your Photo";
		}
		else
		{
			$query ="insert into allreview(`review_name`,`review_msg`,`review_image`)values('$name','$review','$photo')";
		
     	   
	   	 	$re =  mysqli_query($con,$query);
     	   	if($re){
     	   	 	$_SESSION['success'] = "successfully done";
			}
     	   	else{
     	   	 	$data_wrong = "Something Wrong";
     	   	}
     	}
    }
	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
	    <title>Review</title>
	    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
	    <link rel="stylesheet" href="css/style.css" type="text/css">
	    <link rel="stylesheet" href="css/datepicker.min.css" type="text/css">
	</head>
<body>
	<div class="color-theme-1">
		<div class="container text-center pt-3 pb-1">
			<a href="https://www.rnwmultimedia.com/" target="_blank"><img src="https://www.rnwmultimedia.com/wp-content/uploads/2021/01/GROUP-OF-INSTITUTES-1-01-01-1.png" width="320" alt="Red & White MUltimedia Education" title="Red & White MUltimedia Education"/></a>
		</div>
	</div>
	<section>
		<div class="container">
			<form method="post" enctype="multipart/form-data" id="placement_form">
				<?php if(isset($_SESSION['msg'])) { ?>
					<div class="alert alert-danger" id="suc_msg"><?php echo $_SESSION['msg']; ?></div>
				<?php 
				unset($_SESSION['msg']); } ?>

				<?php if(isset($_SESSION['success'])) { ?>
					<div class="alert alert-success" id="suc_msg"><?php echo $_SESSION['success']; ?></div>
				<?php 
				 } unset($_SESSION['success']);?>

			    <span  style="color:red;"><?php echo @$data_wrong; ?></span>
				<div class="form-box">
					<div class="main-title">
				        <h2 style="text-align: center;">Give Your Review</h2>
			    	</div>

					<div class="box-inner">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="GrId">Your Name</label>
									<input type="text" class="form-control" id="name" name="name" placeholder="Enter your full Name"  required/>
									<?php if(!empty($name_error)) { ?>
										<span style="color:red"><?php echo $name_error; ?></span>
									<?php } ?>
								</div>
							</div>


							<div class="col-md-12">
								<div class="form-group">
									<label for="GrId">Write Your Review</label>
									<textarea class="form-control" id="review" name="review" ></textarea>
									<?php if(!empty($name_error)) { ?>
										<span style="color:red"><?php echo $review_error; ?></span>
									<?php } ?>
								</div>
							</div>



							<div class="col-md-12">
								<div class="form-group">
									<label>Upload Photo</label>
									<input type="file" class="form-control" id="ephoto" name="ephoto"    required/>
									<?php if(!empty($photo_error)) { ?>
										<span style="color:red"><?php echo $photo_error; ?></span>
									<?php } ?>
									<img src="https://lh5.googleusercontent.com/ed5tXVbyVO2ILuXeHSa4nejZfMVcAC-woSqcA9XaeR2BYsgYjEe2Kr_EPL6HOFmY5mJxiYjS8o1ZAbC7ZDfFBMoNZo3Hea-6WfOmwyEMYCXo6BmqfKGlhjXRxBnpn7x9nA=w294" height="200" width="200" id="blah">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="btn-cust">
		        	<input class="btn btn-success" type="submit" name="submit" value="submit">
				</div>
			</form>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.js" type="text/javascript"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="js/datepicker.min.js" type="text/javascript"></script>
</body>

</html>



<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
$("#ephoto").change(function () {
	var validExtensions = ["png","jpeg","jpg"]
	var file = $(this).val().split('.').pop();
	var numb = $(this)[0].files[0].size/1024/1024;
	console.log(numb);
	numb = numb.toFixed(2);
	console.log(numb);
	if (validExtensions.indexOf(file) == -1) {
	    alert("Only formats are allowed : "+validExtensions.join(', '));
	    $(this).val('');
	}
	else if(numb > 0.5){
	  alert('to big, maximum is 500KB. You file size is: '+ numb +' KB');
	   $(this).val('');
	}
});



function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#ephoto").change(function() {
  readURL(this);
});

</script>


<script>

	$('#suc_msg').fadeOut(5000);

// just for the demos, avoids form submit

$(document).ready(function(){
	$( "#placement_form" ).validate({
		rules: {
			name: {
				required: true
			},
			review:{
				required : true
			},
			ephoto:{
				required : true
			}

		},
		messages:{
			name:{
				required:"<div style='color:red'>please enter full name</div>"
			},
			review :{
				required : "<div style='color:red'>Please Write Your Review</div>"
			},
			ephoto : {
				required : "<div style='color:red'>Please Upload Your Photo</div>"
			}
		}
			
	});
});


</script>