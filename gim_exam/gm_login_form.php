<?php 

	session_start();
	ob_start();

    include('conn.php');

	$id = @$_REQUEST['id'];
	$lab = @$_SESSION['lab'];

	if($lab == "A"){
        $que = "SELECT * FROM lab_a WHERE id='$id'";
        
    } 
    if ($lab == "B") {
        $que = "SELECT * FROM lab_b WHERE id='$id'";
        
    }

    $result = mysqli_query($conn, $que);
	$row = mysqli_fetch_assoc($result);


	if(isset($_REQUEST['submit'])) {

		$n = @$_REQUEST['s_name'];
		$g = @$_REQUEST['grid'];
		
		if($lab == "A"){
			$qqq = "UPDATE lab_a SET name='$n', grid='$g' WHERE id='$id'";
			
		} 
		if ($lab == "B") {
			$qqq = "UPDATE lab_b SET name='$n', grid='$g' WHERE id='$id'";			
		}

		if(mysqli_query($conn, $qqq)) {
			header('location:index.php');
		}

		
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Gm Login Form</title>

	<link rel="stylesheet" type="text/css" href="css/gm_form.css">

</head>
<body>

	<section>
		<div class="color"></div>
		<div class="color"></div>
		<div class="color"></div>
		<div class="box">
			<div class="square"></div>
			<div class="square"></div>
			<div class="square"></div>
			<div class="square"></div>
			<div class="square"></div>
			<div class="container">
				<div class="form">
					<h2>Login</h2>
					<form>
						<div style="text-align:-webkit-center;">
						<div class="inputbox" style="text-align:-webkit-center; border:outset; width:20%;">
							<label name="" placeholder="ID" style="font-size:20px"><?php echo $row['id']; ?></label>
							<input style="display:none;" type="text" name="id" placeholder="Student Name" value="<?php echo $row['id']; ?>">
						
						</div></div>
						<div class="inputbox">
							<input type="text" name="s_name" placeholder="Student Name" value="<?php echo $row['name']; ?>">
						</div>
						<div class="inputbox">
							<input style="color:#000;" type="number" name="grid" placeholder="GR ID" value="<?php echo $row['grid']; ?>">
						</div>
						<div class="inputbox">
							<input type="submit" name="submit" value="Submit" class="loginbtn">
						</div>
						<!-- <a href="#" class="forgot1">Forgot Password?</a>
						<a href="gm_registration_form.html" class="Register">Register</a> -->
					</form>
				</div>
			</div>
		</div>
	</section>

</body>
</html>