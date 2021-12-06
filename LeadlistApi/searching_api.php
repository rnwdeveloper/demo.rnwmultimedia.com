<?php



include 'config_api.php';



if(!empty($_POST['submit']) )

{

	$query =  "select * from lead_list";

	$query1 = mysqli_query($con,$query);

	$num    = mysqli_num_rows($query1);

	$query4 = array();

	if($num != 0)

	{

		while($query3 = mysqli_fetch_assoc($query1))

		{

			$query3['any_remarks'] = substr($query3['any_remarks'],0,15);

			$query4[] = $query3;

		}

	}

	else

	{

		$query4 =  array("Record Not found");

	}

}

echo json_encode($query4);



?>