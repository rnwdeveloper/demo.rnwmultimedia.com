<?php
// $con  = mysqli_connect("localhost","mzfrxmujjb","Q23bQYkskc","mzfrxmujjb") or die("Db not connected");
include('db.php');

if(isset($_POST['sub_cate_data'])){
	$sub_cate = $_POST['sub_cate_data'];
}
?>
<option value=''>--select--</option>
	<?php $qu_job ="select * from job_subcategory where `job_position_cat`='$sub_cate'";
			$qu_job1 = mysqli_query($con,$qu_job);
			while($quJob2 = mysqli_fetch_array($qu_job1)) { ?>
	<option><?php echo $quJob2['job_subcategory_name']; ?></option>
<?php } ?>