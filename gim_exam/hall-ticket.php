<?php
session_start();
ob_start();
include('config.php');
$grid = $_SESSION["grId"];

if(!empty($grid)) {

// kvstore API url
$url = 'https://demo.rnwmultimedia.com/eduzila_api/Android_api/grid_api_2.php?GR_ID='.$grid;

// Initializes a new cURL session
$curl = curl_init($url);
$data = [
    'GR_ID' => $grid
  ];
// 1. Set the CURLOPT_RETURNTRANSFER option to true
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// 2. Set the CURLOPT_POST option to true for POST request
curl_setopt($curl, CURLOPT_POST, true);

// 3. Set the request data as JSON using json_encode function
curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
// curl_setopt($curl, CURLOPT_POSTFIELDS, $data);


$response = curl_exec($curl);

// Close cURL session
curl_close($curl);
$jsss =  $response . PHP_EOL;

// echo count($response['data'])."<br><br>";

// echo json_decode($jsss['data']);
$a = json_decode($jsss);
$code = "RNWEDU";
					 // $security_code = $res['security_code']; 
$security_code ="rnw"; 
$all=find_record($grid, $code, $security_code);

// echo count($all->data);

echo "<pre>";
// print_r($all->data);
echo "</pre>";

// echo $all->data['fname'];

$branch_select = "RW";
foreach ($all->data as  $n) {
    // if($n->admission_code == $admission_code)
    // {

    
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

        //    echo $n->fname;


        //  $update=mysqli_query($con,"update eduzilladata set  admission_status='$n->admission_status' , fname='$n->fname',lname='$n->lname',email='$n->email',mobile='$n->mobile',father_name='$n->father_name',father_mobile='$n->father_mobile',address='$address',course='$n->course',course_package='$n->course_package',admission_date='$n->admission_date',total_fees='$n->total_fees',paid_fees='$n->paid_fees',branch_name='$n->branch_name',remarks='$remarkk' where admission_code='$n->admission_code'") or die(mysqli_error($con));

         
         //$insert=mysqli_query($con,"insert into test_cron(`nme`) values('$gr_id')") or die(mysqli_error($con));


            
    // }

}

// echo base64_decode($n->image->content);


// echo $jsss[];

// echo "<pre>";
// print_r($a);
// echo "</pre>";

// $_SESSION["gr__id"] = "";

// echo $a[0]["remarks"][0]["remark"];
// while(){

//     echo $row['branch_name'];

//     if(strpos($a["branch_name"][0] ,'RW') !== false){
//         $branch_select = $a[0]["branch_name"][0].$a[0]["branch_name"][1].$a[0]["branch_name"][2];
//     }

// }


} else {

    header("location:index.php");

}


$que = "SELECT * FROM gim_students WHERE grid=$grid";
$branch_select = "";

$res = mysqli_query($conn, $que);
$row = mysqli_fetch_array($res);

$ids = $row['schedule_id'];

$sql = "SELECT * FROM gim_schedule WHERE id=$ids";
$res1 = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_array($res1);


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
// echo "<pre>";
// echo "</pre>";
// echo $decoded;
// print_r($temp);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}



return $decoded;


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="https://twemoji.maxcdn.com/2/svg/1f39f.svg" type="image/x-icon">
    <title>Hall Ticket</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/ticket.css">

    <style>
    body {
        background-image: url("assets/images/shadow_rnw.png");
        background-size: 25%;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
    }
    </style>
</head>

<body>





    <!-- Note Section With Border -->

    <div class="container-lg border border-dark m-auto m-5" id="content" style="max-width: 1500px !important;">
        <div class="ticket">
            <div class="main mb-2 mt-3">
                <table width="1000px">
                    <tr>
                        <td>
                            <img src="assets/images/rw_red.png" width="100px" alt="">
                        </td>
                        <td align="center">
                            <h4>RED & WHITE GROUP OF INSTITUTES</h4>
                            <h5>HALL TICKET</h5>
                            <h6>GIM EXAMINATION - 2021</h6>
                        </td>
                    </tr>
                </table>
                <table cellpadding="10px" width="200px" cellspacing="0" class="seat">
                    <tr align="center">
                        <td>Seat No.</td>
                    </tr>
                    <tr align="center">
                        <td><b><?php 
                        
                        foreach ($all->data as  $n) {
                                if($n->branch_name[0] == 'R') {
                                    echo $n->branch_name[0].$n->branch_name[1].$n->branch_name[2];
                                    break;
                                }                        
                        
                        }
                        
                        
                        echo $grid ?></b>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="main mb-2" width="1100px">
                <table width="1000px" border="1px" cellpadding="10px">
                    <tr>
                        <td width="200px" height="68px"><b>Name of Candidate</b></td>
                        <td width="500px"><?php echo $n->fname." ".$n->father_name?></td>
                    </tr>
                    <tr>
                        <td><b>Institute Name</b></td>
                        <td>RED & WHITE GROUP OF INSTITUTES </td>
                    </tr>
                    <tr>
                        <td height="70px"><b>Center Name</b></td>
                        <?php if($row['e_branch'] == "RW1"){ ?>
                        <td>RW1 (AK Road)</td>
                        <?php } else if($row['e_branch'] == "RW2"){ ?>
                        <td>RW2 (Yogi Chowk)</td>
                        <?php } else if($row['e_branch'] == "RW3"){ ?>
                        <td>RW3 (Sarthana)</td>
                        <?php } else if($row['e_branch'] == "RW4"){ ?>
                        <td>RW4 (Mota Varchha)</td>
                        <?php } else { ?>
                        <td><?php echo $row['e_branch']; }?></td>
                    </tr>
                </table>
                <table width="200px" border="1px" class="ml-2">
                    <tr height="130px" cellpadding="20px" align="center">
                        <td><img src="data:image/png;base64,<?php echo $n->image->content; ?>" height="110px" alt="">
                        </td>
                    </tr>
                    <tr height="50px" align="center">
                        <td class="text-muted" style="color: rgba(0,0,0,0.2) !important;">Student Signature</td>
                    </tr>
                </table>
            </div>
            <div class="main mb-2">
                <table border="1px" width="1000px" cellpadding="10px">
                    <tr align="left" height="50px">
                        <th width="200px" colspan="3">Exam Date : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row1['date']; ?>
                        </th>
                        <th colspan="3">Exam Time : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row1['time']; ?></th>
                    </tr>
                    <tr align="center" height="50px">
                        <th >Subject</th>
                        <td width="16.5%">PHOTOSHOP WEB</td>
                        <td width="16.5%">PHOTOSHOP GRAPHICS</td>
                        <td width="16.5%">ANIMATE / VISUALIZATION</td>
                        <td width="16.5%">C LANGUAGE</td>
                        <td width="16.5%">LOGIC</td>
                    </tr>
                    <tr align="center" height="50px">
                        <th>Remark <br>( Signature)</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                    </tr>
                </table>
            </div>
        </div>
        <div class="note d-flex m-auto" style="max-width: 1000px;">
            <ul style="list-style: none;padding: 10px;width: 800px;">
                <li><b>Note:</b>
                    <ol style="list-style: none;">
                        <li>
                            <p class="mb-0">1. Candidate must have this Hall Ticket for eligibility of Examination.</p>
                        </li>
                        <li>
                            <p class="mb-0">2. Candidate getting into argument with examination center staff may not be
                                allowed to continue in &nbsp;&nbsp;&nbsp;&nbsp;examination.</p>
                        </li>
                        <li>
                            <p class="mb-0">3. Duration of the examination is 6 Hour 30 Minutes. (*Time may be vary
                                based on natural aspects and &nbsp;&nbsp;&nbsp;&nbsp;other situations)</p>
                        </li>
                        <li>
                            <p class="mb-0">4. All candidates must submit exam papers within the provided time period.
                                One who does not submit &nbsp;&nbsp;&nbsp;&nbsp;exam papers according to the given time
                                period, he/she will be terminated from examination and
                                &nbsp;&nbsp;&nbsp;&nbsp;considered as a failure.</p>
                        </li>
                        <li class="mb-3">
                            <p class="mb-0">5. HOD signature must be signed before examination day from the assigned
                                exam center’s HOD.</p>
                        </li>
                        <li>
                            <b>In case of missing this Hall Ticket, candidate will not be considered as a pass out
                                student</b>
                        </li>
                    </ol>
                </li>
            </ul>
            <div class="hod">
                <ul style="list-style: none;">
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li><b>HOD Signature</b></li>
                </ul>
            </div>
        </div>
        <div class="w-100 mb-3"></div>
    </div>

    <br>
    <br>
    <br><br>

    <center>

        <button id="extra" class="btn btn-info">Download PDF</button>

    </center>

    <br><br><br><br><br><br><br>

    <script>
    // var doc = new jsPDF();
    // var specialElementHandlers = {
    //     '#editor': function (element, renderer) {
    //         return true;
    //     }
    // };


    // $('#extra').click(function() {
    // var options = {};
    // var pdf = new jsPDF('p', 'pt', 'a4');
    // pdf.addHTML($("#content"), 15, 15, options, function() {
    //     pdf.save('pageContent.pdf');
    // });
    // });
    // var z= document.getElementsByTagName("body");
    var x = document.getElementById("extra");

    x.addEventListener("click", function() {

        // alert("Hello");

        x.style.visibility = "hidden";
        var y = document.getElementById("content");
        print(y);
        x.style.visibility = "visible";
    });
    </script>

</body>

</html>