<?php 

// $con  = mysqli_connect("localhost","mzfrxmujjb","Q23bQYkskc","mzfrxmujjb") or die("Db not connected");
include('db.php');



if(isset($_POST['main_cate']))

{

	$main_cat = $_POST['main_cate'];



?>

<option value=''>--select--</option>

							<?php  $qu_job ="select * from job_position_category where `job_position_cat`='$main_cat'";

								  $qu_job1 = mysqli_query($con,$qu_job);

								  while($quJob2 = mysqli_fetch_array($qu_job1)) { ?>

										<option><?php echo $quJob2['job_position']; ?></option>

								  <?php } } else { echo "NO Record Found"; } ?>