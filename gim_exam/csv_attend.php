<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Exam_Attendance_Sheet</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style type="text/css">
body {
    width: 1140px;
    height: 100%;
    color: #000;
}

.form-group {
    margin-bottom: 8px;
}

.form-group label {
    font-size: 16px;
    margin-bottom: 4px;
}

.form-control {
    display: block;
    width: 100%;
    padding: .25rem .50rem;
    font-size: 13px;
    line-height: 1;
    color: #000;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
</style>

<body class="bordered">
    <div class="col-12 border"><br>
        <div class="row">
            <div class="col s10 text-center">
                <img class="center" src="assets/images/rnw.png" height="100" srcset="">
            </div>
        </div>
        <!-- <h2 class="text-center">RED & WHITE GROUP OF INSTITUTES</h2> -->
        <hr>
        <h2 class="text-center">GIM BOARD OF EXAMINATION - 2021</h2>
        <h3 class="text-center"><u>Student Attendance Sheet</u></h3>
        <div class="row px-3 justify-content-between">
            <h5>Exam Date: 04-09-2021 </h5>
            <h5>Exam Timing: 7:00 AM</h5>
        </div>
        <div class="row px-3 justify-content-between">
            <h5>Center Code: RW3</h5>
            <h5>Block No: IT LAB-A</h5>

        </div>
        <div class="row px-3 justify-content-between">
            <h5></h5>
            <h5>Sign. of Invigilator: ___________________</h5>
        </div>

        <table class="table table-striped table-responsive table-bordered">
            <thead>
                <tr align="center">
                    <th style="vertical-align:inherit;">No.</th>
                    <th>Candidate Detail</th>
                    <th style="width:15%; vertical-align:inherit;">Candidate Pic</th>
                    <!-- <th>Candidate Sign</th> -->
                    <th style="width:25%; vertical-align:inherit;">Attendnace / Verification</th>
                    <th>PHOTSHOP WEB</th>
                    <th>PHOTSHOP GRAPHICS</th>
                    <th>C Language</th>
                    <th>Animate / Visualization</th>
                    <th style="vertical-align:inherit;">Logic</th>
                </tr>
            </thead>
            <tbody>


                <?php  

    ob_start();
    include('config.php');

    $failedRecords = [];

    
    if(isset($_REQUEST['submit'])){
    
            $fileName = $_FILES["file"]["tmp_name"];
            
            if ($_FILES["file"]["size"] > 0) {
                
                $file = fopen($fileName, "r");
                $counts = 0;
                
                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                    
                    $counts++;

                    $name = "";
                    if (isset($column[0])) {
                        $name = mysqli_real_escape_string($conn, $column[0]);
                    }
                    $grid = "";
                    if (isset($column[1])) {
                        $grid = mysqli_real_escape_string($conn, $column[1]);
                    }
                    


                        $code = "RNWEDU";
                        // $security_code = $res['security_code']; 
                        $security_code ="rnw"; 
                        $all=find_record($grid, $code, $security_code);


                        foreach ($all->data as  $n) {
                            $test=array();
                            foreach ($n->remarks as  $v2) {
                                
                                        $join=$v2->remark."./*/".$v2->remark_by;
                                    $test[]=$join;
                            }
                    
                            $m= implode('/**/', $test);
                            $remarkk =  str_replace("'", "`",$m);
                    
                            //for image
                            $address=$re =  str_replace("'", "`",$n->address);
                        
                        }
                        

                    ?>




                <tr>
                    <th style="text-align: center; vertical-align: middle;"><?php echo $counts; ?></th>
                    <td>
                        <div class="form-group">
                            <label style="font-size:13px;" for="candidate_name">Candidate Name</label>
                            <p id="candidate_name"><b><?php echo "RWn. ". $n->fname." ".$n->lname?></b></p>
                        </div>

                        <div class="form-group">
                            <label for="grid" style="font-size:12px">GR. ID: <b
                                    style="font-size:15px"><?php echo $grid; ?></b></label>
                            <!-- <input type="number" class="form-control" id="grid" value="" disabled> -->
                            <!-- </div> -->
                            <!-- <div class="form-group"> -->
                            <?php 
                            
                                $sqll = "SELECT * FROM gim_students WHERE grid='$grid'";
                                $r = mysqli_query($conn,$sqll);
                                $ro = mysqli_fetch_assoc($r); 

                            ?>
                            <label for="grid" style="font-size:12px">Branch: <b
                                    style="font-size:15px"><?php echo $ro['branch']; ?></b></label>
                            <!-- <input type="number" class="form-control" id="grid" value="" disabled> -->
                        </div>
                    </td>
                    <td style="text-align: center;">
                        <?php if($n->image->content != "") {?>
                        <img style="margin-top:10%;" src="data:image/png;base64,<?php echo $n->image->content; ?>"
                            alt="passport_size_photo" class="img-thumbnail">
                        <?php } else { ?>
                        <img style="margin-top:25%; width:75%;" src="assets/images/no_photo.jpg"
                            alt="passport_size_photo" class="img-thumbnail">
                        <?php } ?>
                    </td>
                    <!-- <td>
                        <div class="form-group">
                            <label style="font-size:12px" for="sign">Candidate Sign.</label>
                        </div>
                    </td> -->
                    <td style="vertical-align: inherit;">
                        <table style="margin-bottom:0px !important" class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td colspan="4" style="font-size:12px">Seat Number</td>
                                    <td colspan="4" style="font-size:12px">Candidate Sign.</td>
                                </tr>
                                <!-- <tr>
                                </tr> -->
                                <tr>
                                    <td colspan="4" style="color:gainsboro; height:75px"></td>
                                    <td colspan="4" style="color:gainsboro; height:75px"></td>
                                </tr>
                                <!-- <tr>
                                </tr> -->
                            </tbody>
                        </table>
                    </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>





                <?php
                        
                }

        }

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

            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>