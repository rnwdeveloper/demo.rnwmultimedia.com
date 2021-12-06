<?php  

include('db.php');



if(isset($_POST['category_record']))

{

	$reco =  $_POST['category_record'];

	$quer= "select * from job_subcategory where `job_position_cat`='$reco'";

	$qu = mysqli_query($con,$quer);

}

?>



<option value="">--select option--</option>

<?php while($qu2 = mysqli_fetch_array($qu)) { ?>

		<option value="<?php echo $qu2['job_subcategory_name']; ?>"><?php echo $qu2['job_subcategory_name']; ?></option>

<?php } ?>



