
<?php

ob_start();
session_start();

if(isset($_SESSION['grId'])=='')
{
	header('location:index.php');
}


if(isset($_SESSION['otp_check_already'])=='')
{
	// $_SESSION['home_error'] = "Please Enter Your GRID!!";
	$_SESSION['home_error'] = "Please Enter Your GRID!!";
	unset($_SESSION['otp_check_already']);
	unset($_SESSION['otp']);
	header("location:index.php");
}
$con  = mysqli_connect("localhost","mzfrxmujjb","Q23bQYkskc","mzfrxmujjb") or die("Db not connected");
if(isset($_SESSION['grId']))
{
			$grid = $_SESSION['grId'];
			$service_url = 'https://erp.eduzilla.in/api/students/details';
				$curl = curl_init($service_url);
				$curl_post_data = array(
				        'GR_ID' => $grid,
				        'Inst_code' => 'RNWEDU',
				        'Inst_security_code' => 'rnw',
				        
				);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
				$curl_response = curl_exec($curl);
				if ($curl_response === false) {
				    $info = curl_getinfo($curl);
				    curl_close($curl);
				    die('error occured during curl exec. Additioanl info: ' . var_export($info));
				}
				curl_close($curl);
				$decode = json_decode($curl_response);
				// echo "<pre>";
				// print_r($decode->data[0]);
				// exit;
				// $email = $decode->data[0]->email;


				// print_r($decode->data[0]->image->content);
    // 				exit;

				
				

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Re-Open Process</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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


	


<form method="post" action="confirm_page.php">

	<section class="student_details">
		<div class="container">
			<div class=" col-lg-12 col-md-12 col-sm-12">
			<div class="details">
				<h3>Student Information</h3>
				<div class="row">
					<div class="first">
						<h4>GRID</h4>
						<span style="color:red"><?php echo @$_SESSION['grId']; ?></span>
						<input type="hidden" name="your_grid" value="<?php echo @$_SESSION['grId']; ?>">
						<h4>Name</h4>
						<span style="color:red"><?php echo $decode->data[0]->fname." ".$decode->data[0]->lname; ?></span>
						<input type="hidden" name="your_name" value="<?php echo $decode->data[0]->fname." ".$decode->data[0]->lname; ?>">
				    </div>
				    <div class="second">
						<h4>Branch</h4>
						<span style="color:red"><?php echo $decode->data[0]->branch_name; ?></span>
						<input type="hidden" name="your_branch" value="<?php echo $decode->data[0]->branch_name; ?>">
						<h4>Course</h4>
						<span style="color:red"><?php echo substr($decode->data[0]->course,0,15); ?></span>
						<input type="hidden" name="your_course" value="<?php echo $decode->data[0]->course; ?>">
						<input type="hidden" name="your_mobile" value="<?php echo $decode->data[0]->mobile; ?>">
						<input type="hidden" name="your_email" value="<?php echo $decode->data[0]->email; ?>">
						<input type="hidden" name="your_father_mobile" value="<?php echo $decode->data[0]->father_mobile; ?>">

				    </div>
				</div>
			</div>
		</div>
		</div>
	</section>

<section class="rules" style="margin-bottom:100px;">
	<div class="container">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="terms">
				<h3>Terms and Condition</h3>
				<ol>
					
					<li>સંસ્થા માં પ્રવેશ દરમિયાન સ્વાસ્થ્ય ની ખરાઈ (અને હેન્ડ સેનિટાઇઝ કરવું ફરજિયાત રહેશે) તેમજ સ્વાસ્થ્ય યોગ્ય જણાશે તો જ પ્રવેશ ને પાત્ર રહેશે.</li>
					<li>વિદ્યાર્થી એ પોતાની સાથે પાણી ની એક બોટલ તેમજ નાની સેનિટાઇઝરની બોટલ લાવવી તેમજ પોતાની વસ્તુ શક્ય હોય તો અન્ય વ્યક્તિને ઉપયોગ માટે ના આપવી જેથી વિદ્યાર્થી નું સ્વાસ્થ્ય ન જોખમાય.</li>
					<li>વિદ્યાર્થીઓએ જાતે સોશિયલ ડિસ્ટન્સ, ફેસ માસ્ક, હાથ મોજા પહેરવા જેવા નિયમો નું જાતેજ ફરજીયાત પાલન કરવાનું રહેશે. શક્ય હોય ત્યાં સુધી બિન જરૂરી વસ્તુ કે જગ્યાએ સ્પર્શ ના કરવો.</li>
					<li>સરકારશ્રી ના નિયમોને માન આપતા, સંસ્થા ના આયોજન માં, ઇન્ફ્રાસ્ટ્રક્ટર માં, તેમજ વિદ્યાર્થી ના સમય અને અભ્યાસની પધ્ધતિ માં ફેરફાર શક્ય બની શકે.</li>
					<li>ગુજરાત બહાર થી આવતા વિદ્યાર્થીઓને ફરજીયાત સરકાર શ્રી ના આદેશ મુજબ ઘરે કોરોનટાઇન થયા પછીજ જોઈન કરવાનું રહેશે.</li>
					<li>ક્ન્ટાઈન્ટમેન્ટ ઝોન માં રહેતા વિદ્યાર્થીઓએ ફરજીયાત સંસ્થાને જાણ કરવી અને તેમને Online શિક્ષણ લેવાનું રહેશે સંસ્થા પર આવી શકશે નહિ.</li>
					<li>જો તમારા ફેમિલી અને આજુ-બાજુ (પાડોશી) માં કોરોના પોઝિટિવ હોય તો સંસ્થા ને જાણ કરવાની રહશે અને Online શિક્ષણ લેવાનું રહશે તેઓ સંસ્થા પર આવી શકશે નહિ.</li>

					<li>વિદ્યાર્થીઓ ને પોતાના ફોન માં આરોગ્યસેતુ એપ્લિકેશન જરૂર જણાશે ત્યારે ઇન્સ્ટોલ કરાવવામાં આવશે.</li>
					<li>સંસ્થામાં વિદ્યાર્થીના સમય દરમિયાન કોઈ પણ સ્વાસ્થ્ય ને લગતા પ્રશ્ન માટે વિદ્યાર્થી અને હું (વાલી) જવાબદાર રહીશું.</li>
					<li>સરકાર શ્રી ની ગાઇડલાઇન મુજબ ડિસ્ટન્સ લર્નિંગ (Online Education) ને પ્રોત્સાહન આપવાનું હોવાથી સંસ્થા જરૂરિયાત અને શક્યતાઓને ધ્યાનમાં રાખીને ડિસ્ટન્સ લર્નિંગ નો ઉપયોગ કરી શકે છે. જેની અમે વાલી મંજૂરી આપીએ છીએ.</li>
					<li>શક્ય હશે તો વિદ્યાર્થી ની સાથે પોતાના ઇક્વિપમેન્ટ મોક્લાવીશું જેમકે (લેપટોપ, માઉસ, વગેરે..).</li>
					<li>COVID-19 ની પરિસ્થિતિ તેમજ સરકાર શ્રી ના આદેશ મુજબ સમય લીમીટેશન અને સોશિયલ Distance ને ધ્યાનમાં રાખીને જણાવેલા સમય અને બેચ પ્રમાણે લેક્ચર થશે જે વિદ્યાર્થી આ પ્રમાણે આવી શકે તેમ નથી તેઓએ ઓનલાઇન લેક્ચર દ્વારા ભણવાનું રહેશે અને જે વિદ્યાર્થીઓ પછીથી જોઈન્ટ કરશે તેમને ચાલુ અભ્યાસક્રમ ની બેચ માં જ જોઈન્ટ થવાનું રહેશે.</li>

					<li>વિધાર્થી (મારુ બાળક) અને સહમતી આપનાર નો સંબંધ જેમકે પિતા, માતા, ભાઈ, બહેન </li>
					<div style="margin-left:5%">
					<input type="radio" name="relatives" value="Father"> પિતા &nbsp;&nbsp; 
					<input type="radio" name="relatives" value="Mother"> માતા &nbsp;&nbsp;
					<input type="radio" name="relatives" value="Brother"> ભાઈ &nbsp;&nbsp;
					<input type="radio" name="relatives" value="Sister"> બહેન &nbsp;&nbsp;
					<input type="radio" name="relatives" value="self"> પોતે &nbsp;&nbsp;</</div>
					</ol>

				<div class="agree">
					 <input type="radio" name="option" value="Agree"  checked onclick="return check_agree_or_not('agree')">
						<label for="">સહમત છીએ.</label>
						<input type="radio" name="option" value="NotAgree" onclick="return check_agree_or_not('nagree')">
						<label for="">અસહમત છીએ.</label>
						<br>
						<div class="agree" id="reason_not_agree">
							<input type="radio" name="disagree" value="Study only Online">
							<label for="">ઓનલાઇન જ ભણવા માંગીયે છીએ..</label>
							<br>
							<input type="radio" name="disagree" value="We should Not study Right Now" >
							<label for="">હાલ અભ્યાશ કરવાજ નથી માંગતા..</label>
							<br>

						</div>
					<!-- <textarea name="reason_not_agree" id="reason_not_agree" cols="20"  placeholder="enter not agree reason"></textarea> -->
					<span style="color:red" id="reason_remark"></span>

				<div class="btn-cust">
					<input type="submit" name="Feedback" value="Feedback" class="btn btn-success" onclick="return reason_comp()">

				</div>
				</div>

			</div>
		</div>
	</div>
</section>

</form>


	
</body>
</html>

<script>

$('#reason_not_agree').hide();



function reason_comp(){
	var reson = $('#reason_not_agree').val();
	var radioValue = $("input[name='option']:checked"). val();
	// alert(radioValue);
	

}

function check_agree_or_not(status){
		if(status == 'nagree'){
			$('#reason_not_agree').show();
		}
		else
		{
			document.getElementById('reason_remark').innerHTML = "";
			$('#reason_not_agree').hide();
		}
	}
	</script>
