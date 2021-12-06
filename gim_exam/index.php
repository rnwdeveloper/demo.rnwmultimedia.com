<?php 

	session_start();
	ob_start();
	include('conn.php');


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
					<form action="grid_otp_checker.php" method="POST">
						<?php 
						
						
							echo "<p style='width:100%; text-align:center; color:red;'>".$_SESSION['msg']."</p>";
							$_SESSION['msg'] = "";
					
				
						?>
						
						<div class="inputbox">
							<input type="text" name="gr_id" placeholder="GR ID">
						</div>
						<div class="inputbox">
							<input type="password" name="password" placeholder="Password">
						</div>
						<div class="inputbox">
							<input type="submit" name="submit" value="Login" class="loginbtn">
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

</body>
</html>