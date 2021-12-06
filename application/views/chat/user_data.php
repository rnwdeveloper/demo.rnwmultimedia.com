<?php
session_start();
include('connection.php');

$m = "SELECT * FROM login WHERE login_id != '".$_SESSION['id']."'";
$m1 = mysqli_query($con,$m);
$m2 = mysqli_fetch_all($m1,MYSQLI_ASSOC);
 ?>

<div id="u_detail">
 <table border="1">
	<tr>
		<td>Name</td>
		<td>Staus</td>
		<td>Action</td>
	</tr>	

	<?php  foreach ($m2 as $key => $value) { 

			$staus = '';
			$current_timestamp = strtotime(date('Y-m-d H:i:s').'-10 second');
			$current_timestamp = date('Y-m-d H:i:s',$current_timestamp);
			$user_last_activity = fetch_user_last_activity($value['login_id'],$con);
			
			if($user_last_activity > $current_timestamp)
			{
				$staus = '<span style="color:green;">Online</span>';
			}
			else
			{
				$staus = '<span style="color:red;">Offline</span>';
			}
			

		?>
	<tr>
		<td><?php echo $value['user_name'].' '.count_unseen_message($value['login_id'],$_SESSION['id'],$con).' '.fetch_is_type_status($value['login_id'],$con); ?></td>
		<td><?php echo $staus; ?></td>
		<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="<?php echo $value['login_id'];?>" data-tousername="<?php echo $value['user_name']; ?>">chat</button></td>
	</tr>
	<?php  } ?>
</table>
</div>