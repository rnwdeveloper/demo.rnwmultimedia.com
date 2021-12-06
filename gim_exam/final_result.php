<?php

    ob_start();
    session_start();

    include('config.php');
    $final_result = array();
    $grid = $_GET['grid'];

    if($grid == ''){
        header("location:index.php");
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
  
          //    echo $n->fname;
  
  
          //  $update=mysqli_query($con,"update eduzilladata set  admission_status='$n->admission_status' , fname='$n->fname',lname='$n->lname',email='$n->email',mobile='$n->mobile',father_name='$n->father_name',father_mobile='$n->father_mobile',address='$address',course='$n->course',course_package='$n->course_package',admission_date='$n->admission_date',total_fees='$n->total_fees',paid_fees='$n->paid_fees',branch_name='$n->branch_name',remarks='$remarkk' where admission_code='$n->admission_code'") or die(mysqli_error($con));
  
           
           //$insert=mysqli_query($con,"insert into test_cron(`nme`) values('$gr_id')") or die(mysqli_error($con));
  
  
              
      // }
  
    }

    $qu = "SELECT * FROM gim_piq WHERE `grid`='$grid'";
    $re = mysqli_query($conn,$qu);

    if(isset($_REQUEST['grid'])){


        $sq = "SELECT * FROM gim_students WHERE grid=$grid";
        $mq = "SELECT * FROM gim_marks WHERE grid=$grid";
        $st = "SELECT * FROM gim_sub_time WHERE grid=$grid";
        $cq = "SELECT * FROM gim_credit";
        $google_classroom_query = "SELECT * FROM gim_students WHERE grid=$grid";

        $res = mysqli_query($conn, $sq);
        $res2 = mysqli_query($conn, $mq);
        $res3 = mysqli_query($conn, $cq);
        $res4 = mysqli_query($conn, $st);
        $gc_res = mysqli_query($conn, $google_classroom_query);

        $row = mysqli_fetch_assoc($res);
        $row2 = mysqli_fetch_array($res2);
        $row4 = mysqli_fetch_array($res4);
        $gc_row = mysqli_fetch_array($gc_res);        

        while($row3 = mysqli_fetch_array($res3)){
            $subject = $row3['subject'];

            $credit_psd = $row3['psd'];
            $credit_psd_g = $row3['psd_g'];
            $credit_animate = $row3['animate'];
            $credit_c_lang = $row3['c_lang'];
            $credit_drawing = $row3['drawing'];
            $credit_logic = $row3['logic'];

            $psd_marks = @$row2['psd'];
            $psd_g_marks = @$row2['psd_g'];
            $animate_marks = @$row2['animate'];
            $c_lang_marks = @$row2['c_lang'];
            $drawing_marks = @$row2['drawing'];
            $logic_marks = @$row2['logic'];

            $psd_per = $psd_marks * ($credit_psd*10)/30;
            $psd_g_per = $psd_g_marks * ($credit_psd_g*10)/30;
            $animate_per = $animate_marks * ($credit_animate*10)/30;
            $c_lang_per = $c_lang_marks * ($credit_c_lang*10)/30;
            $drawing_per = $drawing_marks * ($credit_drawing*10)/50;
            $logic_per = $logic_marks * ($credit_logic*10)/30;
            // $psd_per = ($credit_psd * $psd_marks) / 10;
            // $psd_g_per = ($credit_psd_g * $psd_g_marks) / 10;
            // $animate_per = ($credit_animate * $animate_marks) / 10;
            // $c_lang_per = ($credit_c_lang * $c_lang_marks) / 10;
            // $drawing_per = ($credit_drawing * $drawing_marks) / 10;
            // $logic_per = ($credit_logic * $logic_marks) / 10;

            $toal_per = $psd_per + $animate_per + $c_lang_per + $drawing_per + $logic_per + $psd_g_per;

            $final_result[$subject] = array(
                
                "psd"=>number_format($psd_per, 2) . " / " . $credit_psd*10,
                "psd_g"=>number_format($psd_g_per, 2) . " / " . $credit_psd_g*10,
                "animate"=>number_format($animate_per, 2) . " / " . $credit_animate*10,
                "c_lang"=>number_format($c_lang_per, 2) . " / " . $credit_c_lang*10,
                "drawing"=>number_format($drawing_per, 2) . " / " . $credit_drawing*10,
                "logic"=>number_format($logic_per, 2) . " / " . $credit_logic*10,
                "total_per"=>number_format($toal_per, 2)
            );

        }

        // arsort($final_result[]['total_per']);

        // asort($final_result);
        // echo "<pre>";
        //     print_r($final_result);
        // echo "</pre>";
        
    }

    // array_multisort($final_result, SORT_ASC, SORT_NUMERIC);


    function hoursandmins($time, $format = '%02d:%02d:%02d')
    {
        if ($time < 1) {
            return;
        }
        $hours = floor($time / 3600);
        $minutes = floor(($init / 60) % 60);
        $seconds = $init % 60;
            
        return sprintf($format, $hours, $minutes,$seconds);
    }

    if(mysqli_num_rows($re)>0) {


        $row = mysqli_fetch_assoc($re);

        // print_r($row);

        $ans = explode("#",$row['ans']);


        $hobbys = explode(",",$ans[13]);


    
    

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Personal Information Questionnaire Form</title>
</head>

<body>

    <table class="table table-bordered table-hover">

        <legend>Google Classroom Work</legend>
        <thead>
            <tr class="bg-dark">
                <th scope="col" class="text-light">GRID</th>
                <th scope="col" class="text-light">Photoshop</th>
                <th scope="col" class="text-light">C Language</th>
                <th scope="col" class="text-light">Animate</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong><?php echo $grid; ?></strong></td>
                <td><?php echo str_replace("%","",$gc_row['p_class']);  ?> % </td>
                <td><?php echo str_replace("%","",$gc_row['c_class']); ?> % </td>
                <td><?php echo str_replace("%","",$gc_row['a_class']); ?> % </td>
            </tr>
        </tbody>
    </table>
    <hr style="border-top: dotted 3px;" />

    <table class="table table-hover" style="width:100%">
        <tbody>

            <tr class="bg-dark">
                <th class="text-light"><b>Subject</b></th>
                <th class="text-light"><b>Photoshop Web
                        (<?php echo @$row2['psd']; ?>)</b><br><b
                        style="font-size:small">(<?php echo gmdate("H:i:s",$row4['psd']);  ?>)</b>
                </th>
                <th class="text-light"><b>Photoshop Graphics
                        (<?php echo @$row2['psd_g']; ?>)</b><br><b
                        style="font-size:small">(<?php echo gmdate("H:i:s",$row4['psd_g']);  ?>)</b>
                </th>
                <th class="text-light"><b>Animate
                        (<?php echo @$row2['animate']; ?>)</b><br><b
                        style="font-size:small">(<?php echo gmdate("H:i:s",$row4['animate']); ?>)</b>
                </th>
                <th class="text-light"><b>C Language
                        (<?php echo @$row2['c_lang']; ?>)</b><br><b
                        style="font-size:small">(<?php echo gmdate("H:i:s",$row4['c_lang']); ?>)</b>
                </th>
                <th class="text-light"><b>Drawing
                        (<?php echo @$row2['drawing']; ?>)</b><br><b
                        style="font-size:small">(<?php echo gmdate("H:i:s",$row4['animate']); ?>)</b>
                </th>
                <th class="text-light"><b>Logic
                        (<?php echo @$row2['logic']; ?>)</b><br><b
                        style="font-size:small">(<?php echo gmdate("H:i:s",$row4['logic']); ?>)</b>
                </th>
                <th style="width:200px" class="text-light"><b>Total</b></th>
            </tr>



            <?php foreach($final_result as $k => $v){ ?>


            <tr>
                <td scope="col"><input type="radio" id="master" name="master" value="<?php echo $k;?>"
                        <?php if($row['master_field']==$k){ echo "checked";} ?>>
                    &nbsp;<b><?php echo $k;   ?></b>
                </td>

                <?php $i=1;
      foreach($v as $k1 => $v1){ 

      if($i==7){ ?>
                <td>
                    <!-- <div class="d-flex align-items-center"> -->
                    <span class="completion mr-2"><?php echo $v1; ?>%</span>
                    <div class="progress m-t-15">
                        <!-- <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div> -->

                        <?php if($v1>=70) { ?>
                        <div class="progress-bar bg-success" style="width:<?php echo $v1; ?>%" role="progressbar"
                            aria-valuenow="<?php echo $v1; ?>" aria-valuemin="0" aria-valuemax="100"
                            style="width: <?php echo $v1; ?>%;"></div>
                        <?php } else if($v1>=50) { ?>
                        <div class="progress-bar bg-info" style="width:<?php echo $v1; ?>%" role="progressbar"
                            aria-valuenow="<?php echo $v1; ?>" aria-valuemin="0" aria-valuemax="100"
                            style="width: <?php echo $v1; ?>%;"></div>
                        <?php }else if($v1>=35) { ?>
                        <div class="progress-bar bg-warning" style="width:<?php echo $v1; ?>%" role="progressbar"
                            aria-valuenow="<?php echo $v1; ?>" aria-valuemin="0" aria-valuemax="100"
                            style="width: <?php echo $v1; ?>%;"></div>
                        <?php } else if($v1>=0) { ?>
                        <div class="progress-bar bg-danger" style="width:<?php echo $v1; ?>%" role="progressbar"
                            aria-valuenow="<?php echo $v1; ?>" aria-valuemin="0" aria-valuemax="100"
                            style="width: <?php echo $v1; ?>%;"></div>
                        <?php } ?>
                    </div>
                </td>
                <!-- <td scope="row" class="<?php if($v1>33){ echo 'text-success'; } else{ echo 'text-danger'; } ?>"><?php echo $v1 . "%" ?></td> -->
                <?php } else { ?>

                <td scope="row"><?php echo $v1 ?></td>
                <?php } ?>
                <?php $i++; } ?>

            </tr>

            <?php } ?>

        </tbody>
    </table>
    <hr style="border-top: dotted 3px;" />

    <div class="container">
        <form method="POST">
            <h2 class="my-4 text-center">Personal Information Questionnaire</h2>
            <h2 class="my-4 text-center">વ્યક્તિગત માહિતી પ્રશ્નાવલી</h2>
            <div class="form-group col-12 col-md-2">
                <label for="grid">GR.ID</label>
                <input type="number" class="form-control" style="text-align:center" id="grid" name="grid"
                    value="<?php echo $grid?>" required disabled="">
            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12">
                <label for="name">Your Name<span class="ml-2"><br>(તમારું નામ):</span></label>
                <input type="text" class="form-control" id="name" name="fname"
                    value="<?php echo $n->fname." ".$n->lname?>" required disabled="">
            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12">
                <label for="inputAddress">Address<span class="ml-2"><br>(સરનામું):</span></label>
                <input type="text" class="form-control" id="inputAddress" placeholder="123 Main St"
                    value="<?php echo $address; ?>" name="address" required disabled="">
            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12">
                <label for="phone">Guardian/Parents Contact No<span class="ml-2"><br>(વાલી / માતા-પિતાનો સંપર્ક
                        નંબર):</span></label>
                <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $ans[0];?>" required
                    disabled>
            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12">
                <label for="education">Educational Record<span class="ml-2"><br>(શૈક્ષણિક રેકોર્ડ):</span></label>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">SI.No</th>
                                <th scope="col">Name of Institution/School</th>
                                <th scope="col">Percentage</th>
                                <th scope="col">Passing Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Metric/SSC</th>
                                <td><input type="text" class="form-control" id="ssc_school" name="ssc_school"
                                        value="<?php echo $ans[1];?>" required disabled="">
                                </td>
                                <td><input type="text" class="form-control" id="ssc_per" name="ssc_per"
                                        value="<?php echo $ans[2];?>" required disabled=""></td>
                                <td><input type="number" class="form-control" id="ssc_year" name="ssc_year"
                                        value="<?php echo $ans[3];?>" required disabled="">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">10+2/HSC(Sci/Com/Arts)</th>
                                <td><input type="text" class="form-control" id="hsc_school" name="hsc_school"
                                        value="<?php echo $ans[4];?>" required disabled="">
                                </td>
                                <td><input type="text" class="form-control" id="hsc_per" name="hsc_per"
                                        value="<?php echo $ans[5];?>" required disabled=""></td>
                                <td><input type="number" class="form-control" id="hsc_year" name="hsc_year"
                                        value="<?php echo $ans[6];?>" required disabled="">
                                </td>
                            </tr>
                            <!-- <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12">
                <label for="future">1. Where do you want to go in the field from the GIM 10 field to the master?
                    Why?<span class="ml-2"><br>(તમે GIM ની 10 ફિલ્ડ માંથી ક્યાં ક્ષેત્ર માં માસ્ટર માટે જવા માંગો છો ?
                        કેમ
                        ?):</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="field1" name="field" value="1"
                            <?php if($ans[7]==1){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="field1">Game Design</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="field2" name="field" value="2"
                            <?php if($ans[7]==2){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="field2">Front-end Design</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="field3" name="field" value="3"
                            <?php if($ans[7]==3){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="field3">Graphics</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="field4" name="field" value="4"
                            <?php if($ans[7]==4){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="field4">Animation</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="field5" name="field" value="5"
                            <?php if($ans[7]==5){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="field5">Android Development</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="field6" name="field" value="6"
                            <?php if($ans[7]==6){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="field6">IOS Development</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="field7" name="field" value="7"
                            <?php if($ans[7]==7){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="field7">Web Development</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="field8" name="field" value="8"
                            <?php if($ans[7]==8){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="field8">Game Development</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="field9" name="field" value="9"
                            <?php if($ans[7]==9){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="field9">Front-end Development</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="field10" name="field" value="10"
                            <?php if($ans[7]==10){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="field10">Flutter Development</label>
                    </div>
                </div>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="future1" name="future" value="1"
                            <?php if($ans[8]==1){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="future1">મારી આવડત સૌથી વધારે તે field માં
                            છે.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="future2" name="future" value="2"
                            <?php if($ans[8]==2){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="future2">મારો ઇન્ટરેસ્ટ તે field માં છે.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="future3" name="future" value="3"
                            <?php if($ans[8]==3){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="future3">મને આ field માં પ્રોત્સાહિત કરવામાં આવેલ
                            છે.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="future4" name="future" value="4"
                            <?php if($ans[8]==4){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="future4">મારુ સ્વપન છે.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="future5" name="future" value="5"
                            <?php if($ans[8]==5){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="future5">મારા classmate આ field માં જતા હોવાથી.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="future5" name="future" value="5"
                            <?php if($ans[8]=6){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="future5">Other</label>
                    </div>
                </div>
                <input type="text" class="form-control" id="why_other" name="why_other" value="<?php echo $ans[9]; ?>"
                    disabled>

            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12">
                <label for="benefit">2. Does GIM Course Benefit?<span class="ml-2"><br>(GIM Course કરવાથી ફાયદો થયો કે
                        નહિ?):</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="benefit1" name="benefit" value="1"
                            <?php if($ans[10]==1){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="benefit1">YES</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="benefit2" name="benefit" value="2"
                            <?php if($ans[10]==2){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="benefit2">NO</label>
                    </div>
                </div>

            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12">
                <label for="news">3. Do you read the news daily?<span class="ml-2"><br>(શું તમે રોજ સમાચાર વાંચો
                        છો?):</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="news1" name="news" value="1"
                            <?php if($ans[11]==1){ echo "checked";} else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="news1">YES</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="news2" name="news" value="2"
                            <?php if($ans[11]==2){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="news2">NO</label>
                    </div>
                </div>

            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12">
                <label for="success">4. The Biggest Success of your life so far?<span class="ml-2"><br>(તમારા જીવનની
                        અત્યાર
                        સુધીની સૌથી મોટી સફળતા?):</span></label>
                <textarea class="form-control" id="success" placeholder="Biggest Success of your life" name="success"
                    required disabled=""><?php echo $ans[12]; ?></textarea>
            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12">
                <label for="hobby">5. Your Hobbies and Interests<span class="ml-2"><br>(તમારા શોખ અને
                        રુચિઓ):</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="hobby1" name="hobby[]" value="1"
                            <?php foreach($hobbys as $pos){ if($pos==1){echo "checked enabled";}else{echo "disabled=''";} } ?>>
                        <label class="form-check-label" for="hobby1">Writting</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="hobby2" name="hobby[]" value="2"
                            <?php foreach($hobbys as $pos){ if($pos==2){echo "checked enabled";}else{echo "disabled=''";} } ?>>
                        <label class="form-check-label" for="hobby2">Photography</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="hobby3" name="hobby[]" value="3"
                            <?php foreach($hobbys as $pos){ if($pos==3){echo "checked enabled";}else{echo "disabled=''";} } ?>>
                        <label class="form-check-label" for="hobby3">Cooking</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="hobby4" name="hobby[]" value="4"
                            <?php foreach($hobbys as $pos){ if($pos==4){echo "checked enabled";}else{echo "disabled=''";} } ?>>
                        <label class="form-check-label" for="hobby4">Dance</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="hobby5" name="hobby[]" value="5"
                            <?php foreach($hobbys as $pos){ if($pos==5){echo "checked enabled";}else{echo "disabled=''";} } ?>>
                        <label class="form-check-label" for="hobby5">Sports</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="hobby6" name="hobby[]" value="6"
                            <?php foreach($hobbys as $pos){ if($pos==6){echo "checked enabled";}else{echo "disabled=''";} } ?>>
                        <label class="form-check-label" for="hobby6">Acting</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="hobby7" name="hobby[]" value="7"
                            <?php foreach($hobbys as $pos){ if($pos==7){echo "checked enabled";}else{echo "disabled=''";} } ?>>
                        <label class="form-check-label" for="hobby7">Travel</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="hobby8" name="hobby[]" value="8"
                            <?php foreach($hobbys as $pos){ if($pos==8){echo "checked enabled";}else{echo "disabled=''";} } ?>>
                        <label class="form-check-label" for="hobby8">Art</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="hobby9" name="hobby[]" value="9"
                            <?php foreach($hobbys as $pos){ if($pos==9){echo "checked enabled";}else{echo "disabled=''";} } ?>>
                        <label class="form-check-label" for="hobby9">Play Video Games</label>
                    </div>

                </div>
                <input type="text" class="form-control" id="hobby_other" name="hobby_other"
                    value="<?php echo $ans[14]; ?>" disabled>


            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12">
                <label for="activity">6. Like to Participate in RNW's Activities?<span class="ml-2"><br>(RNW ની એકટીવીટી
                        માં
                        ભાગ લેવો ગમે છે?):</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="activity1" name="activity" value="1"
                            <?php if($ans[15]==1){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="activity1">YES</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="activity2" name="activity" value="2"
                            <?php if($ans[15]==2){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="activity2">NO</label>
                    </div>
                </div>
            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12">
                <label for="being">7. What do you want to be in the next 3 years?<span class="ml-2"><br>(તમે આવનારા 3
                        વર્ષની અંદર શુ બનવા માંગો છો?):</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="being1" name="being" value="1"
                            <?php if($ans[16]==1){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="being1">Employee</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="being2" name="being" value="2"
                            <?php if($ans[16]==2){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="being2">HR</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="being3" name="being" value="3"
                            <?php if($ans[16]==3){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="being3">CEO</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="being4" name="being" value="4"
                            <?php if($ans[16]==4){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="being4">Manager</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="being5" name="being" value="5"
                            <?php if($ans[16]==5){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="being5">Communicator</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="being6" name="being" value="6"
                            <?php if($ans[16]==6){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="being6">Team Leader</label>
                    </div>
                </div>
            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12">
                <label for="work">8. According to the weekly 5-day schedule of the GIM course, which day do you like to
                    work?<span class="ml-2"><br>(GIM કોર્સના સાપ્તાહિક 5-દિવસીય સમયપત્રક અનુસાર, કયા દિવસે કામ કરવાનું
                        ગમે છે?):</span></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="work1" name="work" value="1"
                        <?php if($ans[17]==1){ echo "checked";}else{echo "disabled=''";} ?>>
                    <label class="form-check-label" for="work1">C Language</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="work2" name="work" value="2"
                        <?php if($ans[17]==2){ echo "checked";}else{echo "disabled=''";} ?>>
                    <label class="form-check-label" for="activity2">PhotoShop</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="work3" name="work" value="3"
                        <?php if($ans[17]==3){ echo "checked";}else{echo "disabled=''";} ?>>
                    <label class="form-check-label" for="work3">Animate</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="work3" name="work" value="4"
                        <?php if($ans[17]==4){ echo "checked";}else{echo "disabled=''";} ?>>
                    <label class="form-check-label" for="work4">Drawing</label>
                </div>
            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12">
                <label for="alone">9. Do you like being alone?<span class="ml-2"><br>(શું તમને એકલા રહેવાનું ગમે
                        છે?):</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="alone1" name="alone" value="1"
                            <?php if($ans[18]==1){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="alone1">Strongly Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="alone2" name="alone" value="2"
                            <?php if($ans[18]==2){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="alone2">Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="alone3" name="alone" value="3"
                            <?php if($ans[18]==3){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="alone3">Somewhat agree or disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="alone3" name="alone" value="4"
                            <?php if($ans[18]==4){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="alone4">Disagree</label>
                    </div>
                </div>
            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12">
                <label for="failures">10. When I look back at my life, I see only my failures.<span
                        class="ml-2"><br>(જ્યારે
                        હું મારા જીવન તરફ નજર કરું છું, ત્યારે હું ફક્ત મારી નિષ્ફળતા જ જોઉં છું.):</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="failures1" name="failures" value="1"
                            <?php if($ans[19]==1){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="failures1">Strongly Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="failures2" name="failures" value="2"
                            <?php if($ans[19]==2){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="failures2">Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="failures3" name="failures" value="3"
                            <?php if($ans[19]==3){ echo "checked";} else{echo "disabled=''";}?>>
                        <label class="form-check-label" for="failures3">Somewhat agree or disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="failures3" name="failures" value="4"
                            <?php if($ans[19]==4){ echo "checked";} else{echo "disabled=''";}?>>
                        <label class="form-check-label" for="failures4">Disagree</label>
                    </div>
                </div>
            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12">
                <label for="disappointed">11. I am frequently disappointed in my friends/co-workers.<span
                        class="ml-2"><br>(હું
                        મારા મિત્રો / સહકાર્યકરોમાં વારંવાર નિરાશ થઉં છું.):</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="disappointed1" name="disappointed" value="1"
                            <?php if($ans[20]==1){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="disappointed1">Strongly Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="disappointed2" name="disappointed" value="2"
                            <?php if($ans[20]==2){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="disappointed2">Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="disappointed3" name="disappointed" value="3"
                            <?php if($ans[20]==3){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="disappointed3">Somewhat agree or disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="disappointed3" name="disappointed" value="4"
                            <?php if($ans[20]==4){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="disappointed4">Disagree</label>
                    </div>
                </div>
            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12">
                <label for="leader">12. Do you like leadership?<span class="ml-2"><br>(શું તમને Leadership લેવી ગમે
                        છે?):</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="leader1" name="leader" value="1"
                            <?php if($ans[21]==1){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="leader1">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="leader2" name="leader" value="2"
                            <?php if($ans[21]==2){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="leader2">NO</label>
                    </div>
                </div>
            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12">
                <label for="option">13. If for some reason you cannot proceed to the field selected above, which other
                    field
                    should you select?<span class="ml-2"><br>(કોઈ કારણો સર ઉપર Select કરેલી ફિલ્ડમાં આગળ નથી જઈ શકતા તો
                        બીજી કઈ Field સિલેક્ટ કરશો?):</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="option1" name="option" value="1"
                            <?php if($ans[22]==1){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="option1">Game Design</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="option2" name="option" value="2"
                            <?php if($ans[22]==2){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="option2">Front-end Design</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="option3" name="option" value="3"
                            <?php if($ans[22]==3){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="option3">Graphics</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="option4" name="option" value="4"
                            <?php if($ans[22]==4){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="option4">Animation</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="option5" name="option" value="5"
                            <?php if($ans[22]==5){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="option5">Android Development</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="option6" name="option" value="6"
                            <?php if($ans[22]==6){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="option6">IOS Development</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="option7" name="option" value="7"
                            <?php if($ans[22]==7){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="option7">Web Development</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="option8" name="option" value="8"
                            <?php if($ans[22]==8){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="option8">Game Development</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="option9" name="option" value="9"
                            <?php if($ans[22]==9){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="option9">Front-end Development</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="option10" name="option" value="10"
                            <?php if($ans[22]==10){ echo "checked";}else{echo "disabled=''";} ?>>
                        <label class="form-check-label" for="option10">Flutter Development</label>
                    </div>
                </div>
            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12">
                <label for="job">14. What would you do if you were offered a job in an ongoing course?<span
                        class="ml-2"><br>(જો તમને ચાલુ Course માં નોકરી આપવામાં આવે તો તમે શું કરશો?):</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="job1" name="job" value="1"
                            <?php if($ans[23]==1){ echo "checked";} ?>>
                        <label class="form-check-label" for="job1">હા હું જોડાઇશ.</label>
                    </div>
                    <div class="form-check form-check-inline mb-5">
                        <input class="form-check-input" type="radio" id="job2" name="job" value="2"
                            <?php if($ans[23]==2){ echo "checked";} ?>>
                        <label class="form-check-label" for="job2">Course પૂરો થયા પછી જોડાઇશ.</label>
                    </div>
                </div>
            </div>
            <!-- <br>
            <div class="vl"></div> -->

            <!-- <button type="submit" name="submit" class="btn btn-primary">GO TO EXAM</button> -->
        </form>
    </div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>
<style>
    .vl {
        border-top: 2px solid green;
        width: 100%;
    }
</style>


<?php 

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