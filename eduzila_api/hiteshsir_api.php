<?php


if(isset($_POST['submit']))
{
	$gr_id=$_POST['gr_id'];

	
	//next example will insert new conversation
$service_url = 'https://erp.eduzilla.in/api/students/details';
$curl = curl_init($service_url);
$curl_post_data = array(
        'GR_ID' => $gr_id,
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
$decoded = json_decode($curl_response);

if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}
echo 'response ok!';
print_r($decoded);
 foreach ($decoded->data as  $data) 

{
	echo $data->fname;
 }

}
// var_export($decoded->response);
 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>
<body>
<form action="hiteshsir_api.php" method="post" accept-charset="utf-8">
	<input type="text" name="gr_id" >
	<input type="submit" name="submit" value="Search">
</form>

<?php
	if(!empty($decoded))
	{
?>

<table class="table">
	
	<thead>
		<tr>
			<th>firstname</th>
			<th>lastname</th>
			<th>email</th>
			<th>mobile</th>
			<th>course</th>
			<th>total fees</th>
			<th>paid fees</th>
			<th>branch name</th>
			<th>Remarks</th>
			
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php

			 foreach ($decoded->data as $idx => $data) {
			 	?>
				<td><?php echo $data->fname;?></td>
				<td><?php echo $data->lname;?></td>
				<td><?php echo $data->email;?></td>
				<td><?php echo $data->mobile;?></td>
				<td><?php echo $data->course;?></td>
				<td><?php echo $data->total_fees;?></td>
				<td><?php echo $data->paid_fees;?></td>
				<td><?php echo $data->branch_name;?></td>

			<?php 

			foreach ($data->remarks as $idx => $remarks)
		    {
		    	?>
		    	<td><?php echo $remarks->remark;?></td>
		    	<?php
			}
		}
			?>
			
		</tr>
	</tbody>
</table>

<?php 
}
?>

</body>
</html>