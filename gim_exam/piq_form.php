<?php

    ob_start();
    session_start();

    include('config.php');
    $grid = $_SESSION['grId'];

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

    $qqq = "SELECT * FROM gim_students WHERE grid='$grid'";
    $rrr = mysqli_query($conn,$qqq);

    $rooo = mysqli_fetch_assoc($rrr);

    $s_id = $rooo['schedule_id'];


    $qu4 = "SELECT * FROM gim_piq WHERE grid='$grid' AND schedule_id='$s_id'";
    $re4 = mysqli_query($conn,$qu4);

    
    if(mysqli_num_rows($re4)>0) {
        header("location:exam_paper.php");
    }

    if(isset($_REQUEST['submit'])){

      $mcq = "";
    
      if (empty($_REQUEST["field"])) {
        $mcq = "MCQ is required 1";
      } else if (empty($_REQUEST["future"])) {
        $mcq = "MCQ is required 2";
      } else if (empty($_REQUEST["benefit"])) {
        $mcq = "MCQ is required 3";
      } else if (empty($_REQUEST["news"])) {
        $mcq = "MCQ is required 5";
      } else if (empty($_REQUEST["hobby"])) {
        $mcq = "MCQ is required 6";
      } else if (empty($_REQUEST["activity"])) {
        $mcq = "MCQ is required 7";
      } else if (empty($_REQUEST["being"])) {
        $mcq = "MCQ is required 8";
      } else if (empty($_REQUEST["work"])) {
        $mcq = "MCQ is required 9";
      } else if (empty($_REQUEST["alone"])) {
        $mcq = "MCQ is required 10";
      } else if (empty($_REQUEST["failures"])) {
        $mcq = "MCQ is required 11";
      } else if (empty($_REQUEST["disappointed"])) {
        $mcq = "MCQ is required 12";
      } else if (empty($_REQUEST["leader"])) {
        $mcq = "MCQ is required 13";
      } else if (empty($_REQUEST["option"])) {
        $mcq = "MCQ is required 14";
      } else if (empty($_REQUEST["job"])) {
        $mcq = "MCQ is required 15";
      } else {
        $field = $_REQUEST['field'];
        $future = $_REQUEST['future'];
        $why_other = $_REQUEST['why_other'];
        $benefit = $_REQUEST['benefit'];
        $news = $_REQUEST['news'];
        $hobby = implode(',',$_REQUEST['hobby']);
        $hobby_other = $_REQUEST['hobby_other'];
        $activity = $_REQUEST['activity'];
        $begin = $_REQUEST['being'];
        $work = $_REQUEST['work'];
        $alone = $_REQUEST['alone'];
        $failures = $_REQUEST['failures'];
        $disappointed = $_REQUEST['disappointed'];
        $success = $_REQUEST['success'];
        $phone = $_REQUEST['phone'];
        $ssc_school = $_REQUEST['ssc_school'];
        $ssc_per = $_REQUEST['ssc_per'];
        $ssc_year = $_REQUEST['ssc_year'];
        $hsc_school = $_REQUEST['hsc_school'];
        $hsc_per = $_REQUEST['hsc_per'];
        $hsc_year = $_REQUEST['hsc_year'];
        $leader = $_REQUEST['leader'];
        $option = $_REQUEST['option'];
        $job = $_REQUEST['job'];

        $add_data = $phone."#".$ssc_school."#".$ssc_per."#".$ssc_year."#".$hsc_school."#".$hsc_per."#".
            $hsc_year."#".$field."#".$future."#".$why_other."#".$benefit."#".$news."#".$success."#".$hobby."#".$hobby_other."#".$activity."#".
            $begin."#".$work."#".$alone."#".$failures."#".$disappointed."#".$leader."#".$option."#".$job;

        $sql_add = "INSERT INTO gim_piq (grid,ans,schedule_id) VALUES ('$grid','$add_data','$s_id')";
        $sql_ = "UPDATE gim_students SET e_status='1' WHERE grid='$grid'";



        $res = mysqli_query($conn,$sql_add);
        $res_ = mysqli_query($conn,$sql_);

        header("location:exam_paper.php");
      } 
    
      echo "<span style='color:red'>".$mcq."</span>";
    
    
    }

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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.js"></script>

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <title>Personal Information Questionnaire Form</title>

    <style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
    </style>

</head>



<body>
    <div class="container">
        <form method="POST"
            onSubmit="return confirm('are you sure?\nIf all fields are not complete the form will not submit');">
            
                
            
            <h2 class="my-4 text-center">Personal Information Questionnaire</h2>
            <h2 class="my-4 text-center">વ્યક્તિગત માહિતી પ્રશ્નાવલી</h2>
            <div class="col-12 col-md-2 form-group">
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
                <input type="number" class="form-control" id="phone" name="phone"
                    value="<?php if(!(empty($_REQUEST['phone']))) {echo $_REQUEST['phone'];} ?>" required>
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
                                        value="<?php if(!(empty($_REQUEST['ssc_school']))) {echo $_REQUEST['ssc_school'];} ?>"
                                        required>
                                </td>
                                <td><input type="number" class="form-control" id="ssc_per" name="ssc_per" max="100"
                                        step="any"
                                        value="<?php if(!(empty($_REQUEST['ssc_per']))) {echo $_REQUEST['ssc_per'];} ?>"
                                        required></td>
                                <td><input type="number" class="form-control" id="ssc_year" name="ssc_year" max="2021"
                                        value="<?php if(!(empty($_REQUEST['ssc_year']))) {echo $_REQUEST['ssc_year'];} ?>"
                                        required>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">10+2/HSC(Sci/Com/Arts)</th>
                                <td><input type="text" class="form-control" id="hsc_school" name="hsc_school"
                                        value="<?php if(!(empty($_REQUEST['hsc_school']))) {echo $_REQUEST['hsc_school'];} ?>"
                                        required>
                                </td>
                                <td><input type="number" class="form-control" id="hsc_per" name="hsc_per" max="100"
                                        step="any"
                                        value="<?php if(!(empty($_REQUEST['hsc_per']))) {echo $_REQUEST['hsc_per'];} ?>"
                                        required></td>
                                <td><input type="number" class="form-control" id="hsc_year" name="hsc_year" max="2021"
                                        value="<?php if(!(empty($_REQUEST['hsc_year']))) {echo $_REQUEST['hsc_year'];} ?>"
                                        required>
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
                        <input class="form-check-input" type="radio" id="field1" name="field" value="1">
                        <label class="form-check-label" for="field1">Game Design</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="field2" name="field" value="2">
                        <label class="form-check-label" for="field2">Front-end Design</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="field3" name="field" value="3">
                        <label class="form-check-label" for="field3">Graphics</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="field4" name="field" value="4">
                        <label class="form-check-label" for="field4">Animation</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="field5" name="field" value="5">
                        <label class="form-check-label" for="field5">Android Development</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="field6" name="field" value="6">
                        <label class="form-check-label" for="field6">IOS Development</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="field7" name="field" value="7">
                        <label class="form-check-label" for="field7">Back-end Development</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="field8" name="field" value="8">
                        <label class="form-check-label" for="field8">Game Development</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="field9" name="field" value="9">
                        <label class="form-check-label" for="field9">Front-end Development</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="field10" name="field" value="10">
                        <label class="form-check-label" for="field10">Flutter Development</label>
                    </div>
                </div>
                <hr style="border-top:1px dotted #b0b0b0">
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="future1" name="future" value="1">
                        <label class="form-check-label" for="future1">મારી આવડત સૌથી વધારે તે field માં
                            છે.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="future2" name="future" value="2">
                        <label class="form-check-label" for="future2">મારો ઇન્ટરેસ્ટ તે field માં છે.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="future3" name="future" value="3">
                        <label class="form-check-label" for="future3">મને આ field માં પ્રોત્સાહિત કરવામાં આવેલ
                            છે.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="future4" name="future" value="4">
                        <label class="form-check-label" for="future4">મારુ સ્વપન છે.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="future5" name="future" value="5">
                        <label class="form-check-label" for="future5">મારા classmate આ field માં જતા હોવાથી.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="future6" name="future" value="6">
                        <label class="form-check-label" for="future6">Other</label>
                    </div>
                </div>
                <input type="text" placeholder="Other" class="form-control" id="why_other" name="why_other" value="<?php if(!(empty($_REQUEST['why_other']))) {echo $_REQUEST['why_other'];} ?>" >

            </div>

            <hr style="border-top:1px dashed #000">

            <div class="form-group col-12">
                <label for="benefit">2. Does GIM Course Benefit?<span class="ml-2"><br>(GIM Course કરવાથી ફાયદો થયો કે
                        નહિ?):</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="benefit1" name="benefit" value="1">
                        <label class="form-check-label" for="benefit1">YES</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="benefit2" name="benefit" value="2">
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
                        <input class="form-check-input" type="radio" id="news1" name="news" value="1">
                        <label class="form-check-label" for="news1">YES</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="news2" name="news" value="2">
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
                    required><?php if(!(empty($_REQUEST['success']))) {echo $_REQUEST['success'];} ?></textarea>
            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12">
                <label for="hobby">5. Your Hobbies and Interests<span class="ml-2"><br>(તમારા શોખ અને
                        રુચિઓ):</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="hobby1" name="hobby[]" value="1">
                        <label class="form-check-label" for="hobby1">Writting</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="hobby2" name="hobby[]" value="2">
                        <label class="form-check-label" for="hobby2">Photography</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="hobby3" name="hobby[]" value="3">
                        <label class="form-check-label" for="hobby3">Cooking</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="hobby4" name="hobby[]" value="4">
                        <label class="form-check-label" for="hobby4">Dance</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="hobby5" name="hobby[]" value="5">
                        <label class="form-check-label" for="hobby5">Sports</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="hobby6" name="hobby[]" value="6">
                        <label class="form-check-label" for="hobby6">Acting</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="hobby7" name="hobby[]" value="7">
                        <label class="form-check-label" for="hobby7">Travel</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="hobby8" name="hobby[]" value="8">
                        <label class="form-check-label" for="hobby8">Art</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="hobby9" name="hobby[]" value="9">
                        <label class="form-check-label" for="hobby9">Play Video Games</label>
                    </div>

                </div>
                <input type="text" placeholder="Other" class="form-control" id="hobby_other" name="hobby_other" value="<?php if(!(empty($_REQUEST['why_other']))) {echo $_REQUEST['why_other'];} ?>">

            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12">
                <label for="activity">6. Like to Participate in RNW's Activities?<span class="ml-2"><br>(RNW ની એકટીવીટી
                        માં
                        ભાગ લેવો ગમે છે?):</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="activity1" name="activity" value="1">
                        <label class="form-check-label" for="activity1">YES</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="activity2" name="activity" value="2">
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
                        <input class="form-check-input" type="radio" id="being1" name="being" value="1">
                        <label class="form-check-label" for="being1">Employee</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="being2" name="being" value="2">
                        <label class="form-check-label" for="being2">HR</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="being3" name="being" value="3">
                        <label class="form-check-label" for="being3">CEO</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="being4" name="being" value="4">
                        <label class="form-check-label" for="being4">Manager</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="being5" name="being" value="5">
                        <label class="form-check-label" for="being5">Communicator</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="being6" name="being" value="6">
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
                    <input class="form-check-input" type="radio" id="work1" name="work" value="1">
                    <label class="form-check-label" for="work1">C Language</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="work2" name="work" value="2">
                    <label class="form-check-label" for="activity2">Designing</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="work3" name="work" value="3">
                    <label class="form-check-label" for="work3">Animation</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="work3" name="work" value="4">
                    <label class="form-check-label" for="work4">Drawing</label>
                </div>
            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12">
                <label for="alone">9. Do you like being alone?<span class="ml-2"><br>(શું તમને એકલા રહેવાનું ગમે
                        છે?):</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="alone1" name="alone" value="1">
                        <label class="form-check-label" for="alone1">Strongly Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="alone2" name="alone" value="2">
                        <label class="form-check-label" for="alone2">Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="alone3" name="alone" value="3">
                        <label class="form-check-label" for="alone3">Somewhat agree or disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="alone3" name="alone" value="4">
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
                        <input class="form-check-input" type="radio" id="failures1" name="failures" value="1">
                        <label class="form-check-label" for="failures1">Strongly Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="failures2" name="failures" value="2">
                        <label class="form-check-label" for="failures2">Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="failures3" name="failures" value="3">
                        <label class="form-check-label" for="failures3">Somewhat agree or disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="failures3" name="failures" value="4">
                        <label class="form-check-label" for="failures4">Disagree</label>
                    </div>
                </div>
            </div>
            <hr style="border-top:1px dashed #000">
            <!-- <br> -->
            <!-- <div class="vl"></div> -->
            <div class="form-group col-12">
                <label for="disappointed">11. I am frequently disappointed in my friends/co-workers.<span
                        class="ml-2"><br>(હું
                        મારા મિત્રો / સહકાર્યકરોમાં વારંવાર નિરાશ થઉં છું.):</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="disappointed1" name="disappointed" value="1">
                        <label class="form-check-label" for="disappointed1">Strongly Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="disappointed2" name="disappointed" value="2">
                        <label class="form-check-label" for="disappointed2">Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="disappointed3" name="disappointed" value="3">
                        <label class="form-check-label" for="disappointed3">Somewhat agree or disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="disappointed3" name="disappointed" value="4">
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
                        <input class="form-check-input" type="radio" id="leader1" name="leader" value="1">
                        <label class="form-check-label" for="leader1">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="leader2" name="leader" value="2">
                        <label class="form-check-label" for="leader2">NO</label>
                    </div>
                </div>
            </div>
            <hr style="border-top:1px dashed #000">
            <div class="form-group col-12" id="loadedQuestion">
                <label for="option">13. If for some reason you cannot proceed to the field selected above, which other
                    field
                    should you select?<span class="ml-2"><br>(કોઈ કારણો સર ઉપર Select કરેલી ફિલ્ડમાં આગળ નથી જઈ શકતા તો
                        બીજી કઈ Field સિલેક્ટ કરશો?):</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="option1" name="option" value="1">
                        <label class="form-check-label" for="option1">Game Design</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="option2" name="option" value="2">
                        <label class="form-check-label" for="option2">Fron-end Design</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="option3" name="option" value="3">
                        <label class="form-check-label" for="option3">Graphics</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="option4" name="option" value="4">
                        <label class="form-check-label" for="option4">Animation</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="option5" name="option" value="5">
                        <label class="form-check-label" for="option5">Android Development</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="option6" name="option" value="6">
                        <label class="form-check-label" for="option6">IOS Development</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="option7" name="option" value="7">
                        <label class="form-check-label" for="option7">Web Development</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="option8" name="option" value="8">
                        <label class="form-check-label" for="option8">Game Development</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="option9" name="option" value="9">
                        <label class="form-check-label" for="option9">Front-end Development</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="option10" name="option" value="10">
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
                        <input class="form-check-input" type="radio" id="job1" name="job" value="1">
                        <label class="form-check-label" for="job1">હા હું જોડાઇશ.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="job2" name="job" value="2">
                        <label class="form-check-label" for="job2">Course પૂરો થયા પછી જોડાઇશ.</label>
                    </div>
                </div>
            </div>
            <!-- <br>
            <div class="vl"></div> -->

            <button type="submit" name="submit" class="btn btn-primary mb-5">GO TO EXAM</button>
        </form>
    </div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script>
    $(document).ready(function() {
        $('input[name="field"]').change(function() {
            // alert(this.value); // or, use `this.value`

            $.ajax({
                url: "ajax_loadQuestion.php",
                type: "Post",
                data: {
                    'ids': this.value
                },
                success: function(data) {
                    $('#loadedQuestion').html(data);
                }
            })

        });
    });
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