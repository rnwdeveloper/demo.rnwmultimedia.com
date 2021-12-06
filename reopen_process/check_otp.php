
<?php
ob_start();
session_start();

// echo  $_SESSION['otp'];

if(isset($_SESSION['otp'])=='')
{
	$_SESSION['home_error'] = "Please Enter Your GRID!!";
	header("location:index.php");
}


if(isset($_SESSION['otp_check_already'])=='check')
{
	// $_SESSION['home_error'] = "Please Enter Your GRID!!";
	header("location:AgreePage.php");
}
if(isset($_POST['Verify']))
{
	$otp =  $_POST['otp'];
	$otp_check =  $_SESSION['otp'];
	if($otp ==  $otp_check)
	{
		$_SESSION['otp_check_already'] = 'check';
		header("location:AgreePage.php");
	}
	else
	{
		$_SESSION['otp_error'] = "Please Enter Valid OTP";
	}
}
// echo $_SESSION['otp'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Re-Open Process</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
	<div class="color_theme">
			<div class="col-lg-12 col-md-12 col-sm-12">
			<a href="#">
				<img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/05/logoWhite.png" alt="">
			</a>
		</div>	
	</div>

	<div class="main_text">
		<div class="col-sm-12">
				<div class="container">
					<h2>શેક્ષણિક કાર્ય રાબેતા મુજબ ચાલુ કરવા બાબત વાલી તેમજ વિદ્યાર્થી સહમતી પત્ર </h2>
					<p>જય ભારત, <br>
વાલીમિત્રો / વિદ્યાર્થીમિત્રો,<br>

		આશા છે કે કોરોના ની આ મહામારીમાં તમારું સ્વાસ્થ્ય સારું હસે., 
હાલના સરકારશ્રી ના અનલૉક  એજ્યુકેશન ગાઈડલાઈન ને ધ્યાન માં રાખીને આપણી રેડ & વ્હાઇટ ગ્રુપ ઓફ ઇન્સ્ટિટ્યૂટ આવનારી <b>23-11-2020</b> ને સોમવાર થી સરકારશ્રી ના નીતિનિયમો મુજબ <b>રાબેતા મુજબ શરૂ થવા જઈ રહી છે.</b><br>
	સરકાર શ્રી ના આદેશ મુજબ વિદ્યાર્થી તેમજ વાલીશ્રી ની સહમતી લેવી સંસ્થા માટે ફરજીયાત છે. જેથી નીચે આપેલા ફોર્મમાં વિદ્યાર્થીનો GR:ID લખી તેમની રજીસ્ટર મોબાઈલ નંબર ની ખરાઈ કરી ને જે ફોર્મ ખુલે તેમને ખુબજ કાળજી પૂર્વક વિદ્યાર્થી તેમજ વાલી મિત્રોએ વાંચી સમજીને પોતાની સ્વૈચ્છિક સહમતી કે અસહમતી મોકલવી. <b>આ ફોર્મ મળ્યા ના 24 કલાક માં દરેક વિદ્યાર્થીઓ / વાલીઓ ને ભરવું ફરજીયાત છે.</b>
	<br>
	<b>Note: </b> <span style="color:red">તમારો OTP Text Message અને ઇમેઇલ ના Inbox (ઇનબૉક્સ માં ના આવે તો  Promotions ની ટેબ માં દેખાશે તે ધ્યાન માં રાખવું.)</span>
</p>
				</div>
		</div>
	</div>


	

 <form method="post">
	<div class="form-box">
		<div class="student_information">
			<div class="col-lg-12 col-sm-12 mx-auto">
				<h3>Enter OTP</h3>
			</div>
			<div class="row">
				<div class="col-lg-6 col-sm-12 mx-auto">
					<?php
						if(isset($_SESSION['success'])) { ?>
							<div class="alert alert-success">
								<?php echo $_SESSION['success']; ?>
							</div>
					<?php }   

					 ?>
					
					<div class="box_inner">
						<div class="col-md-12">
							<div class="form-group">
								<label for="OTP">OTP</label>
								<input type="text" class="form-control" id="OTP" name="otp" required placeholder="Enter Your OTP">
								<?php 
								if(isset($_SESSION['otp_error'])) { ?>
										
											<span style="color:red"><?php echo $_SESSION['otp_error']; ?></span>
									
								<?php }  
								unset($_SESSION['success']);
								?>
							</div>
						</div>
					</div>
			
				</div>
			</div>
		</div>
	</div>

	<div class="btn-cust">
		<input type="submit" name="Verify" value="Verify" class="btn btn-success">
	</div>
	</form>
	





	
</body>
</html>