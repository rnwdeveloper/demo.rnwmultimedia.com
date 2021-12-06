<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style> 
	#id_card {
	  	width: 196px;
	    height: 317px;
	    border: 2px solid #999;
	    text-align: center;
	    font-size: 11px;
	    vertical-align: top;
	    position: relative;
	}
	#id_card .logo_container{
		width: 100%;
		background-color: #c52410;
		border:1px solid #c52410;
	  	padding: 5px 0;
	}
	#id_card .logo_container #logo {
	    width: 140px;
	  	height: auto;
	  	margin-top: 2px;
	    /*max-width: 190px;
	    max-height: 90px;
	    min-width: 80px;
	    min-height: 40px;*/
	}
	#id_card .student_container{
		width: 85px;
		height: 110px;
		border: 1px solid #c52410;
		margin: 5px auto;
		padding: 2px;
	}
	#id_card .student_container img {
		max-width: 100%;
		display: block;	   
	}
	.student_detail span{
		display: block;
		font-size: 10px;
	}
	.id_card_footer{
		position: absolute;
		bottom:54.7%;
		background-color: #c52410;
		padding: 5px;
		display: block;
		width: 100%;
		line-height: 1.1;
	}
	.id_card_footer span{
		font-size: 10px;
		color: #fff;
	}
</style>

<body>
	<div id="id_card">
		<div class="logo_container">		
			<img src="" alt="logo" id="logo">
		</div>
		<div class="student_container">
			<img src="https://www.persofoto.com/images/vorher-nachher/passfoto-beispiel-nachher.jpg" class="student_pic">
		</div>	
		<div class="student_detail">
			<span style="font-size: 12px; font-weight: 500;"><?php echo $admission->surname; ?> <?php echo $admission->first_name; ?></span>
			<span> <?php $branch_ids = explode(",",$admission->package_id);
                        foreach($list_package as $row) { if(in_array($row->package_id,$branch_ids)) {  echo  $row->package_name; }  } ?>
                        <?php $branch_ids = explode(",",$admission->course_id);
                        foreach($list_course as $row) { if(in_array($row->course_id,$branch_ids)) {  echo  $row->course_name; }  } ?></span>
			<span><?php echo "Admission_Date: $admission->admission_date"; ?></span>
			<span><?php echo "RNW/Year $admission->year";?>/<?php $branch_ids = explode(",",$admission->branch_id);   
                        foreach($list_branch as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo $row->branch_code; }  } ?>/<?php echo $admission->admission_number; ?></span>
			<span><?php echo "RNWEDU-$admission->gr_id"; ?></span>
		</div>
		<div class="id_card_footer">
			<span>One Step in Changing Education Chain..</span>
			<span style="font-size: 8px;">www.rnwmultimedia.com</span>
		</div>
	</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>