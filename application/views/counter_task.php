<?php 



 $con = mysqli_connect("localhost","rnwsoftt_mzfrxmujjb","nathikevo#@!2021","rnwsoftt_mzfrxmujjb");



 		$m = "SELECT * FROM task_group_member WHERE member_account_id='".$_SESSION['user_id']."'";

 		 $m1 = mysqli_query($con,$m);

 		// echo count($m1);

 		$m2 = mysqli_fetch_all($m1,MYSQLI_ASSOC);

       	// print_r($m2[0]['member_id']);

              if(!empty($m2))

              {

       	foreach ($m2 as $key => $value) {

       		$j = "SELECT * FROM task_submit WHERE task_member_id='".$value['member_id']."'  AND  DATE(created_at) = DATE(NOW()) ORDER BY `created_at` DESC ";

       		$j2 = mysqli_query($con,$j);

       		$j3 = mysqli_fetch_all($j2);

       		$all[] = count($j3);

       	}



// print_r($all);

       	$sum=0;

       	foreach ($all as $m => $n) {

       		$sum= $sum+$n;

       	}

       

                            echo $sum;

                     

              }

              

              

        

?>