<!DOCTYPE html>
<html>
<head>
	<title>Generate QRcode in codeigniter with demo By TangleSkills</title>
</head>
<body>	
<div align="center">
	<form action="" method="post">
	<span>Enter your raw text to generate QRCode</span><br><br>
	<input type="text" name="qr_text" required="required" placeholder="">
	<input type="hidden" name="action" value="generate_qrcode"><input type="submit" name="" value="Generate">
	</form>
	<?php
	if($img_url)
	{
	?>
		<br><br>Your QRcode Image here. Scan this to get result<br>
		<!-- <img src="<?php echo base_url(); ?>dist/admissiondocuments.<?php echo $img_url; ?>" alt="QRCode Image"> -->
		<img src="<?php echo base_url('dist/admissiondocuments'.$img_url); ?>" alt="QRCode Image">
	<?php
	}
	?>     
</div>
</body>
</html>