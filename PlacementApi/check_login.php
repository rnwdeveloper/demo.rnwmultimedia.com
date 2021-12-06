<?php


	include 'config_api.php';


	$email = $_POST['email'];

	$password = $_POST['password'];

	$mac_id = $_POST["mac_id"];

	if($email !='' && $password !=''){

		$query_admin = "select * from admin where `email`='$email' AND `password`='$password'";

		$query_admin1 =  mysqli_query($con,$query_admin);



		$query_user = "select * from user where `email`='$email' AND `password`='$password'";

		$query_user1 =  mysqli_query($con,$query_user);

		$query_user2 = mysqli_fetch_array($query_user1);



		$query_admin2 = mysqli_fetch_array($query_admin1);

		if(!empty($query_admin2['email']) && !empty($query_admin2['password'])){

			$data = explode(',',$query_admin2['permission']);

			$name = $query_admin2['name'];

			$image = $query_admin2['image'];

			$user_id = $query_admin2['id'];

			$logtype = $query_admin2['logtype'];



				if(in_array('View all jobs',$data)){

					$record =  array('status'=>2,'msg'=>"success Login","permission"=>1,"admin"=>1,'name'=>$name,'image'=>$image,'user_id'=>$user_id,'logtype'=>$logtype);

				}else{

					// $record =  array('status'=>0,'msg'=>"You Have no Permission","permission"=>0);

					$record =  array('status'=>2,'msg'=>"success Login","permission"=>0,"admin"=>1,'name'=>$name,'image'=>$image,'user_id'=>$user_id,'logtype'=>$logtype);

				}



		}

		else if(!empty($query_user2['email']) && !empty($query_user2['password']))

		{

			$name = $query_user2['name'];

			$image = $query_user2['image'];

			$data3 = explode(',',$query_user2['permission']);

			$admin = $query_user2['app_admin'];

			$user_id = $query_user2['user_id'];

			$logtype = $query_user2['logtype'];

			

			if($query_user2['status'] == "0") {



				// if ($query_user2['crm_mac_id'] == ""){

				// 	$sql2 = "UPDATE user SET crm_mac_id='$mac_id' WHERE user_id='".$query_user2['user_id']."' ";

				// 	$con->query($sql2);

				// 	if(in_array('Leads',$data3)){

				// 		$record =  array('status'=>1,'msg'=>"First Login success!","permission"=>1,"admin"=>$admin,'name'=>$name,'image'=>$image,'user_id'=>$user_id,'logtype'=>$logtype); 

				// 	}else{

				// 		$record =  array('status'=>1,'msg'=>"First Login success!","permission"=>0,"admin"=>$admin,'name'=>$name,'image'=>$image,'user_id'=>$user_id,'logtype'=>$logtype);

				// 	}

				// } else if ($query_user2['crm_mac_id'] == $mac_id){

					if(in_array('View all jobs',$data3)){

						$record =  array('status'=>2,'msg'=>"success Login!!","permission"=>1,"admin"=>$admin,'name'=>$name,'image'=>$image,'user_id'=>$user_id,'logtype'=>$logtype);

					}else{

						$record =  array('status'=>2,'msg'=>"success Login!!","permission"=>0,"admin"=>$admin,'name'=>$name,'image'=>$image,'user_id'=>$user_id,'logtype'=>$logtype);

					}

				// } else if($query_user2['crm_mac_id'] == "1"){

				// 	$record =  array('status'=>3,'msg'=>"Your Account is Disable Contact Admin","permission"=>0,"admin"=>$admin,'name'=>$name,'image'=>$image,'user_id'=>$user_id,'logtype'=>$logtype);

				// } else {

					

	            // 	$record =  array('status'=>-1,'msg'=>"This is Not Your Device!!","permission"=>0,"admin"=>$admin,'name'=>$name,'image'=>$image,'user_id'=>$user_id,'logtype'=>$logtype);    

					

				// }



					// $record =  array('status'=>1,'msg'=>"success Login","permission"=>1,'name'=>$name,'image'=>$image);

			} else {

				$record =  array('status'=>3,'msg'=>"Your Account is Disable Contact Admin","permission"=>0,"admin"=>$admin,'name'=>$name,'image'=>$image,'user_id'=>$user_id,'logtype'=>$logtype);

			}

		}

		else

		{

			$record =  array('status'=>0,'msg'=>"Enter Valid email & Password");

		}

	} else{

		$record =  array('status'=>0,'msg'=>"Fields are not blank");

	}





 echo json_encode($record);





?>

