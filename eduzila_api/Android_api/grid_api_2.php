<?php


$servername = "localhost";
$username = "rnwsoftt_mzfrxmujjb";
$password = "nathikevo#@!2021";
$db = "rnwsoftt_mzfrxmujjb";

$con = mysqli_connect($servername, $username, $password,$db);
 
// echo "<pre>";
// print_r($_POST['Inst_code']);
// exit;



//  if(@$_POST['Inst_code']=='' || @$_POST['Inst_security_code']=='')
//   {
//   	http_response_code(403);
//   	echo json_encode(array('status'=> "false",'data'=>''));
//   }
//   else
//   {

  	$grId = $_GET['GR_ID'];


	if($grId <= 0)
	{
		http_response_code(404);
	  	echo json_encode(array('status'=> "false",'data'=>''));
		
	}
	else
	{

		  $student_gr_id=$_GET['GR_ID'];
		  $select=mysqli_query($con,"select * from eduzilladata where `gr_id`='$student_gr_id'") or die(mysqli_error($con));
		  $numer_data = mysqli_num_rows($select);

		//   echo $select;
		// exit;
		  if($numer_data >  0)
		 {


		if($select)
		{
			while($res=mysqli_fetch_array($select))

			{

					 $gr_id=$res['GR_ID'];
					 // $code = $res['inst_code'];
					 $code = "RNWEDU";
					 // $security_code = $res['security_code']; 
					 $security_code ="rnw"; 

					 $admission_status=$res['admission_status'];
					 $admission_code=$res['admission_code'];
					 $content=$res['image'];

					 $all=find_record($gr_id, $code, $security_code);
					 exit;
					 foreach ($all->data as  $n) {
					 	if($n->admission_code == $admission_code)
					 	{

				 		
					 			//for remarks
					 		$test=array();
					 		foreach ($n->remarks as  $v2) {
					 			
									  	 $join=$v2->remark."./*/".$v2->remark_by;
										$test[]=$join;
					 		}

					 		$m= implode('/**/', $test);
		      				$remarkk =  str_replace("'", "`",$m);

		      				//for image
								$address=$re =  str_replace("'", "`",$n->address);


		      				$update=mysqli_query($con,"update eduzilladata set  admission_status='$n->admission_status' , fname='$n->fname',lname='$n->lname',email='$n->email',mobile='$n->mobile',father_name='$n->father_name',father_mobile='$n->father_mobile',address='$address',course='$n->course',course_package='$n->course_package',admission_date='$n->admission_date',total_fees='$n->total_fees',paid_fees='$n->paid_fees',branch_name='$n->branch_name',remarks='$remarkk' where admission_code='$n->admission_code'") or die(mysqli_error($con));

		      				
		      				//$insert=mysqli_query($con,"insert into test_cron(`nme`) values('$gr_id')") or die(mysqli_error($con));


						 		
					 	}
					
					 }
					 

			}
		}
		}
		else
		{
			http_response_code(404);
		  	echo json_encode(array('status'=> "false",'data'=>''));
			exit;
		}




		//after update record get from our databaase


		//get application remark; start
		$app_re=array();
		$app_remark=mysqli_query($con,"select * from android_remark where gr_id='$student_gr_id'") or die(mysqli_error($mysqli));
		if($app_remark)
		{
			while ($res=mysqli_fetch_array($app_remark)) {
				$app_re[]=array(
					"remarks" => $res['remark'],
					"remarks_by" => $res['added_by'],
					"remarks_type" => $res['remark_type_id'],
					"status" => $res['status'],
					"time" => $res['upload_date'],
					"audio_file" => $res['audio_file']
				);
			}
		}
		//end


		$query=mysqli_query($con,"select * from eduzilladata where gr_id='$student_gr_id'") or die(mysqli_error($con));
		if($query)
		{
			$info=array();
			
			while($res=mysqli_fetch_array($query))
			{
				$remark=explode('/**/', $res['remarks']);
					foreach ($remark as $value) {
					$remark_by=explode('/*/', $value);
					$r[]=array(

						"remark"=>$remark_by[0],
						"remark_by"=>$remark_by[1]
					
					);


				}
				$info[]=array(

					"fname"=>$res['fname'],
					"lname"=>$res['lname'],
					"email"=>$res['email'],
					"mobile"=>$res['mobile'],
					"father_name"=>$res['father_name'],
					"father_mobile" => $res['father_mobile'],
					"address"=>$res['address'],
					"course"=>$res['course'],
					"course_package"=>$res['course_package'],
					"admission_date"=>$res['admission_date'],
					"total_fees"=>$res['total_fees'],
					"paid_fees"=>$res['paid_fees'],
					"branch_name"=>$res['branch_name'],
					"admission_code"=>$res['admission_code'],
					"admission_status"=>$res['admission_status'],
					"image" => "/Eduzilla_image/".$res['image'],
					"remarks"=>$r,
				);

				// $response['status']='true';
				$response=$info;
				// $response['app_remark']=$app_re;
			}
		}


		 header('Content-Type: application/json;charset=utf-8');
                            
    //   echo json_encode($response,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}

// }


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
// $tempp = json_encode($decoded);
echo "<pre>";
echo "</pre>";
echo $decoded;
// print_r($temp);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}



return $decoded;


}

?>