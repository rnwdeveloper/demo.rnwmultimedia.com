<?php

$servername = "68.183.81.191";
$username = "mzfrxmujjb";
$password = "Q23bQYkskc";
$db = "mzfrxmujjb";

$con = mysqli_connect($servername, $username, $password,$db);



$gr_id=$_GET['gr_id'];

$select=mysqli_query($con,"select * from eduzilladata where GR_ID='$gr_id'") or die(mysqli_error($con));


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<table class="table" border="1">
	
	<thead>
		<tr>
			<th>firstname</th>
			<th>lastname</th>
			<th>email</th>
			<th>mobile</th>
			<th>Admission code</th>
			<th>course</th>
			<th>total fees</th>
			<th>paid fees</th>
			<th>branch name</th>
			<th>Remarks</th>
			<th>Image</th>
			
		</tr>
	</thead>


	<tbody>
		
			<?php

			 while($res=mysqli_fetch_array($select))
			 {
			 	?>
			 	<tr>
				<td><?php echo $res['fname'];?></td>
				<td><?php echo $res['lname'];?></td>
				<td><?php echo $res['email'];?></td>
				<td><?php echo $res['mobile'];?></td>
				<td><?php echo $res['admission_code'];?></td>
				<td><?php echo $res['course;']?></td>
				<td><?php echo $res['total_fees'];?></td>
				<td><?php echo $res['paid_fees'];?></td>
				<td><?php echo $res['branch_name'];?></td>
				<td>


					<?php $remark= $res['remarks'];

					$remarks= explode("/**/",$remark);
					foreach ($remarks as $item) {
						    echo "<li>$item</li><br>";
						}

				?></td>
				<td><img src="Eduzilla_image/<?php echo $res['image'];?>"></td>
</tr>


<?php } ?>
			


			
		</tr>
	</tbody>
</table>
</body>
</html>