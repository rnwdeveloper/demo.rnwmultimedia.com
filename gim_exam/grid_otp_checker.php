<?php
ob_start();
    include('config.php');
	$grid = @$_POST['gr_id'];
	$password1 = @$_POST['password'];
    // echo "test";
    // exit;

    $sq = "SELECT * FROM gim_students WHERE `grid`='$grid'";
    $res = mysqli_query($conn, $sq);
    $row = mysqli_fetch_array($res);
    if(mysqli_num_rows($res)==1){
 
        if($grid != '') 
	    {
        	$secretKey = '6Ld8n2caAAAAAOQO-Ix5QC2kpkcbfCXiRUieHUay'; 
    		$_SESSION['grId'] =  $grid;
			$service_url = 'https://erp.eduzilla.in/api/students/details';
				$curl = curl_init($service_url);
				$curl_post_data = array(

				        'GR_ID' => $grid,

				        'Inst_code' => 'RNWEDU',

				        'Inst_security_code' => 'rnw',

				        

				);

				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

				curl_setopt($curl, CURLOPT_POST, true);

				curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);

				$curl_response = curl_exec($curl);

				if ($curl_response === false) 

				{

				    $info = curl_getinfo($curl);

				    curl_close($curl);

				    die('error occured during curl exec. Additioanl info: ' . var_export($info));

				}

				curl_close($curl);

				$decode = json_decode($curl_response);

				

				$send_email_id = $decode->data[0]->email;

				$send_mobile_no =  $decode->data[0]->mobile;



				$emailRand =  rand(100000,999999);

				$mobileRand = rand(100000,999999);

				

				$_SESSION['email_otp'] =  $emailRand;

				$_SESSION['mobile_otp'] =  $mobileRand;

				// echo "<h1>".$mobileRand."</h1>";

                
                if($row['hall_t']==1 || $row['hall_t']==2){

                    

                    $code = "RNWEDU";
                    $security_code ="rnw"; 
                    $all=find_record($grid, $code, $security_code);
                    
                    $mobile_records = array();
                    foreach($all->data as $val)
                    {
                        $mobile_records[] = $val->mobile;
                        // print_r($val->mobile);
                    }
                    // exit;
                    // echo "<pre>";
                    // print_r($all->data);
                    
                    // exit;
                    // // exit;
                  
                  
                        if(in_array($password1,$mobile_records)){

                            header("location:profile.php");
                            // break;
                        }
                        else {
                            $_SESSION['msg'] =  "Please Enter Valid Password ";
                            header("location:index.php");
                            // break;
                        }
                    
                    

                    // if($all->data->mobile == $password1){

                       
                     
                    //     header("location:profile.php");
                        
                    // }
                    // else {
                    //     $_SESSION['msg'] =  "Please Enter Valid Password ";
                        
                    //     header("location:index.php");
					   
                    // }


                } else {
                    
                    $_SESSION['msg'] =  "You Are Not Eligible For GIM Exam";
					header("location:index.php");

                }



			
}

else

{

	$_SESSION['msg'] =  "GRID is Required!!";

	header("location:index.php");

}

        } else {

            $_SESSION['msg'] =  "You are Not 20/21 GIM Student";

            header("location:index.php");
        }


function find_record($gr_id, $code, $security_code)
{
		//next example will insert new conversation
$service_url = 'https://erp.eduzilla.in/api/students/details';
$curl = curl_init($service_url);
$curl_post_data = array(
        'GR_ID' => $gr_id,
        'Inst_code' => $code,
        'Inst_security_code' => $security_code,
        
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



return $decoded;


}


?>