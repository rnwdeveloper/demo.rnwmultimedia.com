

<?php
session_start();


if(isset($_SESSION['temporary_offline'])=='')
{
	$_SESSION['home_error'] = "Please Enter Your GRID!!";
	header("location:TimeUp.php");
}

if(isset($_SESSION['otp_check_already'])=='check')
{
	// $_SESSION['home_error'] = "Please Enter Your GRID!!";
	header("location:AgreePage.php");
}


?><!DOCTYPE html>
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
					<h2>શૈક્ષણિક કાર્ય રાબેતા મુજબ ચાલુ કરવા બાબત વાલી તેમજ વિદ્યાર્થી સહમતી પત્ર </h2>
					<p>જય ભારત, <br>
વાલીમિત્રો / વિદ્યાર્થીમિત્રો,<br>

		આશા છે કે કોરોના ની આ મહામારીમાં તમારું સ્વાસ્થ્ય સારું હશે. હાલના સરકારશ્રી ના અનલૉક  એજ્યુકેશન ગાઈડલાઈન ને ધ્યાન માં રાખીને આપણી રેડ & વ્હાઇટ ગ્રુપ ઓફ ઇન્સ્ટિટ્યૂટ આવનારી <b>23-11-2020</b> ને સોમવાર થી સરકારશ્રી ના નીતિનિયમો મુજબ <b>રાબેતા મુજબ શરૂ થવા જઈ રહી છે.</b>કે જેમાં માત્ર કોર્ષીસ તેમજ ફેશન અને ઇન્ટિરિયર ડિઝાઇનિંગ કોલેજ માટે ના જ લેક્ચર શરુ કરવામાં આવી રહ્યા છે કે જે સોમવારથી શુક્રવાર દરમ્યાન વિદ્યાર્થીઓ ભણતા હતા. (શનિ -રવિ દરમ્યાન ની RNWIET કોલેજ ના નહિ કારણ કે તેના માટે સરકાર તરફથી હજુ કોઈ આદેશ આપવામાં આવ્યો નથી)<br>
	સરકાર શ્રી ના આદેશ મુજબ વિદ્યાર્થી તેમજ વાલીશ્રી ની સહમતી લેવી સંસ્થા માટે ફરજીયાત છે. જેથી નીચે આપેલા ફોર્મમાં વિદ્યાર્થીનો GRID લખી તેમની રજીસ્ટર મોબાઈલ નંબર ની ખરાઈ કરી ને જે ફોર્મ ખુલે તેમને ખુબજ કાળજી પૂર્વક વિદ્યાર્થી તેમજ વાલી મિત્રોએ વાંચી સમજીને પોતાની સ્વૈચ્છિક સહમતી કે અસહમતી મોકલવી.<br> <b>આ ફોર્મ મળ્યા ના 24 કલાક માં દરેક વિદ્યાર્થીઓ / વાલીઓ ને ભરવું ફરજીયાત છે.(20-11-2020 બપોરે 12:30 PM વાગ્યા સુધીમાં)</b>
	<br>લેક્ચર ક્યારથી શરુ થશે તેનો સમય સંસ્થા દ્રારા પછીથી જણાવામાં આવશે.
</p>
				</div>
		</div>
	</div>

	<form action="ajax_api_student.php" method="post" >
	<div class="form-box">
		<div class="student_information">
			<div class="col-lg-12 col-sm-12 mx-auto">
				<h3>Enter Your GR ID</h3>
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
								<label for="Grid">GR ID</label>
								<input type="text" class="form-control" name="gr_id" id="Grid" placeholder="Enter Your GRID">
								<?php  if(isset($_SESSION['home_error'])) { ?>
							
								<span style="color:red"><?php echo $_SESSION['home_error']; ?></span>
							<?php } unset($_SESSION['home_error']);  unset($_SESSION['otp_error']);
							
							unset($_SESSION['success']); ?>
							</div>
						</div>
					</div>
					
				</div>
				
	
			</div>

		</div>
	</div>

	<div class="btn-cust">
		<input type="submit" name="submit" value="submit" class="btn btn-success">
	</div>

	</form>

	








	
</body>
</html>