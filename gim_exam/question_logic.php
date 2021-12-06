<?php

    ob_start();
    include('config.php');

    $grid = $_SESSION['grId'];

    if($grid == ''){
        header("location:index.php");
    }

    $sqls = "SELECT * FROM gim_students WHERE grid='$grid'";
    $resu = mysqli_query($conn,$sqls);

    $check = mysqli_fetch_assoc($resu);

    if($check['e_status']==2){
        header("location:profile.php");
    }

    if(isset($_POST['end_exam'])){

        $sq = "UPDATE gim_students SET e_status='2' WHERE grid='$grid'";
        $results = mysqli_query($conn,$sq);

        if($results){
            header("location:profile.php");
        }

    }


    if(isset($_POST['submit'])){
   
        unset($_POST['submit']);
        $quetions =array();
        $answers = array();
        foreach($_POST as $k=>$v)
        {
        
                $questions[] =  $v[0];
                $answers[] = isset($v[1])?$v[1]:'';
        }

        $correct = 0;
        $wrong = 0;

        for($i=0 ; $i<sizeof($questions) ; $i++){

            if($answers[$i] != ''){

                $que9 = "SELECT * FROM gim_logic WHERE id='$questions[$i]'";
                $che = mysqli_query($conn,$que9);

                $an = mysqli_fetch_assoc($che);

                // echo "C = ".$an['ans']."<br>";
                if($answers[$i]==strtolower($an['ans'])){
                    $correct++;
                } else {
                    $wrong++;
                }

                
            }

        }

        $wr = $wrong*0.25;

        $final = $correct-$wr;

    
        $sql9 = "SELECT * FROM gim_marks WHERE grid='$grid'";
        $que9 = mysqli_query($conn,$sql9);
        $con9 = mysqli_num_rows($que9);

        if($con9>0){
            $add9 = "UPDATE gim_marks SET logic='$final' WHERE grid='$grid'";
        } else {
            $add9 = "INSERT INTO gim_marks (grid,logic) VALUES ('$grid','$final')";
        }
        
        $quwww = mysqli_query($conn,$add9);

        $saval = implode("#",$questions);
        $javab = implode("#",$answers);

        $sql2 = "SELECT * FROM gim_logic_ans WHERE grid='$grid'";
        $querys = mysqli_query($conn,$sql2);
        $co = mysqli_fetch_assoc($querys);

        // if($co['ans'] != ''){
            $add = "UPDATE gim_logic_ans SET ans='$javab' WHERE grid='$grid'";
        // } else {
        //     $add = "INSERT INTO gim_logic_ans (grid,que,ans) VALUES ('$grid','$saval','$javab')";
        // }

        $quwww = mysqli_query($conn,$add);

        
   
    }
   

    $_SESSION['start'] = $_GET['sub'];

    if(@$_SESSION['l_lang']=='NaN'){
        $_SESSION['l_lang'] = '0';
    }
// echo $_SESSION['p_lang']=0;
    $selected_sub = $_REQUEST['sub'];

    $que = "SELECT * FROM gim_logic";
    
    $que1 = "SELECT * FROM gim_sub_time where `grid`='$grid'";

    $res = mysqli_query($conn,$que);
    $res1 = mysqli_query($conn,$que1);

    if(mysqli_num_rows($res1)>0){

        $datasss = mysqli_fetch_assoc($res1);
        // $_SESSION['p_lang'] = $datasss['psd'];
        // $_SESSION['a_lang'] = $datasss['animate'];
        // $_SESSION['c_lang'] = $datasss['c_lang'];
        // $_SESSION['d_lang'] = $datasss['drawing'];
        $_SESSION['l_lang'] = $datasss['logic'];

    }

    // $row = mysqli_fetch_assoc($res);

    $nums;
  
    if($selected_sub == 'l'){


    }
    
    $p_sql = "SELECT * FROM gim_logic_ans WHERE grid='$grid'";
    $p_res = mysqli_query($conn,$p_sql);
    $total = mysqli_num_rows($res)-1;    
    if(mysqli_num_rows($p_res)>0){
        
        $p_row = mysqli_fetch_assoc($p_res);
        
        
        if($p_row['que'] != ""){
            
            // $_SESSION['l_pos'] = explode("#",$p_row['que']);
            // $nums = $_SESSION['l_pos'];
            $nums = explode("#",$p_row['que']);
            
            while($result_data = mysqli_fetch_assoc($res)) {
                $new[] = $result_data;
            }
            
            
            for($i=0 ; $i<sizeof($nums); $i++) {
                
                for($j=0 ; $j<sizeof($new); $j++) {
                    
                    if($nums[$i] == $new[$j]['id']) {
                        
                        $datas[] = $new[$j]; 
                        $ids[] = $new[$j]['id'];
                        
                    }
                    
                    
                }
                
            }
        } else {
            
            // if(!(isset($_SESSION['l_pos']))) {
            //     $nums_a = get_rand_number(0,$total);
            //     $_SESSION['l_pos'] = $nums_a;
            // }
            // $nums = $_SESSION['l_pos'];
            $nums = get_rand_number(0,$total);           
            while($result_data = mysqli_fetch_assoc($res)) {
                $new[] = $result_data;
            }
            
            
            for($i=0 ; $i<sizeof($nums); $i++) {
                
                for($j=0 ; $j<sizeof($new); $j++) {
                    
                    if($nums[$i] == $j) {
                        
                        $datas[] = $new[$j]; 
                        $ids[] = $new[$j]['id'];
                        
                    }
                    
                    
                }
                
            }
            
            $d = implode("#",$ids);
            
            $pi_sql = "UPDATE gim_logic_ans SET que='$d' WHERE grid='$grid'";
            $pi_res = mysqli_query($conn,$pi_sql);    
            
        }
        
        
        
        
    } else {
        
        // if(!(isset($_SESSION['l_pos']))) {
            // $nums_l = get_rand_number(0,$total);
            // $_SESSION['l_pos'] = $nums_l;
        // }
        // $nums = $_SESSION['l_pos'];
        $nums = get_rand_number(0,$total);
        
        while($result_data = mysqli_fetch_assoc($res)) {
            $new[] = $result_data;
        }
        
        
        for($i=0 ; $i<sizeof($nums); $i++) {
            
            for($j=0 ; $j<sizeof($new); $j++) {
                
                if($nums[$i] == $j) {
                    
                    $datas[] = $new[$j]; 
                    $ids[] = $new[$j]['id'];
                    
                }
                
                
            }
            
        }
        
        $d = implode("#",$ids);
        $pi_sql = "INSERT INTO gim_logic_ans (grid,que) VALUES ('$grid','$d')";
        $pi_res = mysqli_query($conn,$pi_sql);
    }
    
    // echo sizeof($datas);
    
    
    function get_rand_number($start=0,$end=0){
        $connt=0;
        // $length=30;
        // $temp=array();
        // while($connt<$length){

        //     $temp[]=mt_rand($start,$end);
        //     $data=array_unique($temp);
        //     $connt++;
        // }

        
        while($connt<$end){
            $a[] = $connt;
            $connt++; 
        }

        // print_r($a);
        $rand_keys = array_rand($a, 30);

        for($i=0 ; $i<sizeof($rand_keys) ; $i++){
            $data[] = $a[$rand_keys[$i]];
        }

        sort($data);
        return $data;
    }

    if(mysqli_num_rows($res)>0){
            
       
 
            // print_r($datas);
    }
   
    // print_r($nums);

    // echo "Text<br>";
    // print_r($_COOKIE);
   
     
     ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/que.css" rel="stylesheet">
    <title>Logic</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="lib/easytimer/dist/easytimer.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    /* general styling */
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    /* html,
    body {
        height: 100%;
        margin: 0;
    }

    body {
        align-items: center;
        background-color: #fff;
        display: flex;
        font-family: -apple-system,
            BlinkMacSystemFont,
            "Segoe UI",
            Roboto,
            Oxygen-Sans,
            Ubuntu,
            Cantarell,
            "Helvetica Neue",
            sans-serif;
    }

    .container {
        color: #333;
        margin: 0 auto;
        text-align: center;
    }

    h1 {
        font-weight: normal;
        letter-spacing: .125rem;
        text-transform: uppercase;
    } */

    li {
        display: inline-block;
        font-size: 1.0em;
        list-style-type: none;
        padding: 1em;
        text-transform: uppercase;
    }

    li span {
        display: block;
        font-size: 3.5rem;
    }

    .sticky-btn {}

    .sticky-btn a {
        margin-bottom: 3px;
        background-color: #212529;
        border: 0;
        font-size: 15px;
        padding: 10px 30px;
        border-radius: 0 6px 6px 0;
    }

    .emoji {
        display: none;
        padding: 1rem;
    }

    .emoji span {
        font-size: 4rem;
        padding: 0 .5rem;
    }

    @media all and (max-width: 768px) {
        h1 {
            font-size: 1.5rem;
        }

        li {
            font-size: 1.125rem;
            padding: .75rem;
        }

        li span {
            font-size: 3.375rem;
        }
    }

    /*
    input[type=radio] {
        display: none;
    }

    input[type=radio]+label {
        display: inline-block;
        width: 95%;
        padding: 10px;
        border: 1px solid #ddd;
        margin-bottom: 10px;
        cursor: pointer;
    }

    input[type=radio]+label:hover {
        border: 1px solid #000000;
    }

    input[type=radio]:checked+label {
        background-image: none;
        background-color: #0C0;
        color: #fff;
        border: 1px solid #0C0 !important;
        -webkit-transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        -ms-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
    }*/

    .worngans {
        background-color: #F36;
        color: #fff;
        border: 1px solid #F36 !important;
        -webkit-transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        -ms-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
    }

    .sticky {
        position: fixed;
        left: 35%;
        top: 50%;
        transform: translateY(-50%);
        opacity: 0.2;
        width: 30%;
    }

    /* .body {
        background-image: url("assets/images/rw_red_back.png");
        background-repeat: no-repeat;
        background-attachment: fixed;
    } */

    .container1 {
        position: absolute;
        max-width: 100%;
        margin: 0 auto;
    }

    .container1 img {
        vertical-align: middle;
    }

    .container1 .content {
        position: sticky;
        bottom: 0;
        width: 100%;
    }

    body {
        background-image: url("assets/images/shadow_rnw.png");
        background-size: 25%;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
    }
    </style>
    <script type="text/javascript">
    $(document).ready(function() {
        $('label').click(function() {
            $('label').removeClass('worngans');
            $(this).addClass('worngans');
        });
    });
    </script>
</head>

<body>
<div id="updates"></div>

    <form style="position: fixed; left: 88%; top: 20%;"
        onSubmit="return confirm('are you sure Your Exma is Finish?\nYour All Section Exam Is FinshAfter Finish You Wil Not Eble TO Start Exam.');"
        method="post">
        <button style="display:;" type="submit" name="end_exam" class="btn btn-danger btn-rounded">End
            Exam</button>
    </form>


    <div class="container">

        <div id="countdown">
            <ul style="text-align:end">
                <!-- <li><span id="days"></span>days</li> -->
                <li><span style="font-size: 40px;" id="hours"></span>Hours</li>
                <li><span style="font-size: 40px;" id="minutes"></span>Minutes</li>
                <li><span style="font-size: 40px;" id="seconds"></span>Seconds</li>
            </ul>
        </div>
        <div id="content" class="emoji">
            <span>🥳</span>
            <span>🎉</span>
            <span>🎂</span>
        </div>

        <div style="text-align: center;" class="mb-3">
            <a href="question.php?sub=p" class="btn btn-primary">Photoshop Web</a>
            <a href="question.php?sub=pg" class="btn btn-primary">Photoshop Graphics</a>
            <a href="question.php?sub=a" class="btn btn-primary">Animate</a>
            <a href="question.php?sub=c" class="btn btn-primary">C Lang</a>
            <a href="question_logic.php?sub=l" class="btn btn-primary">Logic Reasoning</a>
        </div>

<?php  
        
        ?>

        <h1 class="center">
            <input type="hidden" id="c_lang_paper" name="c_lang_paper" value="<?php echo @$_GET['sub']; ?>">

            <input type="hidden" id="c_lang_session" name="c_lang_session" value="<?php echo @$_SESSION['c_lang']; ?>">
            <input type="hidden" id="a_lang_session" name="a_lang_session" value="<?php echo @$_SESSION['a_lang']; ?>">
            <input type="hidden" id="p_lang_session" name="p_lang_session" value="<?php echo @$_SESSION['p_lang']; ?>">
            <input type="hidden" id="d_lang_session" name="d_lang_session" value="<?php echo @$_SESSION['d_lang']; ?>">
            <input type="hidden" id="l_lang_session" name="l_lang_session" value="<?php echo @$_SESSION['l_lang']; ?>">
            <?
            
            $sql5 = "SELECT * FROM gim_logic_ans WHERE grid='$grid' AND schedule_id='6'";
        $que5 = mysqli_query($conn,$sql5);
        
        // print_r($co5);
        
        $sub = 0;
        $co5 = mysqli_fetch_assoc($que5);
        // echo $co5['ans'];
        if($co5['ans']!=''){
            echo "<p style='color:green'>Your Ans is Submited</p>";
        }
        if($selected_sub == 'l'){
            echo "Logic Reasoning Section ";?>

            <?php
        } else {
            header('location:profile.php');
        }       
        
        ?>




        </h1>

    <p style="color:red; font-size:20px;">

        <?php echo " * don’t use internet in Logic section";?>

    </p>

        <form method="post">
            <div class="scp-quizzes-main">
                <?php
                        if(sizeof($datas)>0){
                            
                            $count = 0;
                            
                            foreach($datas as $row){
                                
                                $count++;
                                
                                ?>
                <div class="card" style="margin-top:20px; background-color: transparent">
                    <div class="card-header">
                        <h3><?php echo "<h1>".$count.".</h1> ".$row['que']; ?></h3>
                    </div>

                    <div class="card-body" style="">

                        <blockquote class="blockquote mb-0">


                            <input type="hidden" name="a<?php echo $count; ?>[]" value="<?php echo $row['id']; ?>">

                            <div>
                                <div>
                                    <input type="radio" value="a" name="a<?php echo $count; ?>[]"
                                        id="a<?php echo $count; ?>">
                                    <?php echo $row['a']; ?>
                                </div>

                                <div>
                                    <input type="radio" value="b" name="a<?php echo $count; ?>[]"
                                        id="b<?php echo $count; ?>">
                                    <?php echo $row['b']; ?>
                                </div>
                            </div>

                            <div>
                                <input type="radio" value="c" name="a<?php echo $count; ?>[]"
                                    id="c<?php echo $count; ?>">
                                <?php echo $row['c']; ?>
                            </div>

                            <div>
                                <input type="radio" value="d" name="a<?php echo $count; ?>[]"
                                    id="d<?php echo $count; ?>">
                                <?php echo $row['d']; ?>
                            </div>
                        </blockquote>
                    </div>

                </div>

                <?php
                            }
                            
                        }
                        ?>


            </div>
            <button type="submit" style="margin-top:30px" name="submit" value="submit"
                class="btn btn-outline-success mb-5">SUBMIT</button>
        </form>

    
    </div>



</body>

</html>

<script>

</script>


<script>
var minutesLabel = document.getElementById("minutes");
var secondsLabel = document.getElementById("seconds");
var hours = document.getElementById("hours");
var c_lang_tim = document.getElementById('c_lang_session').value;
var p_lang_tim = document.getElementById('p_lang_session').value;
var a_lang_tim = document.getElementById('a_lang_session').value;
var d_lang_tim = document.getElementById('d_lang_session').value;
var l_lang_tim = document.getElementById('l_lang_session').value;
var c_lang_paper = document.getElementById('c_lang_paper').value;
var totalSeconds = 0;
// alert(c_lang_paper);
if (c_lang_paper == 'c') {
    if (c_lang_tim == 0) {
        totalSeconds = 0;
    } else {
        totalSeconds = c_lang_tim;
    }
}
if (c_lang_paper == 'p') {
    if (p_lang_tim == 0) {
        totalSeconds = 0;
    } else {
        totalSeconds = parseInt(p_lang_tim);
    }
}
if (c_lang_paper == 'a') {
    if (a_lang_tim == 0) {
        totalSeconds = 0;
    } else {
        totalSeconds = parseInt(a_lang_tim);
    }
}
if (c_lang_paper == 'd') {
    if (d_lang_tim == 0) {
        totalSeconds = 0;
    } else {
        totalSeconds = parseInt(d_lang_tim);
    }
}
if (c_lang_paper == 'l') {
    if (l_lang_tim == 0) {
        totalSeconds = 0;
    } else {
        totalSeconds = parseInt(l_lang_tim);
    }
}
// console.log(totalSeconds);

setTimeout(setInterval(setTime, 1000), 2000);

function setTime() {
    ++totalSeconds;
    // alert(totalSeconds);
    hours.innerHTML = parseInt(totalSeconds / 3600)
    minutesLabel.innerHTML = parseInt((totalSeconds % 3600) / 60);
    secondsLabel.innerHTML = parseInt((totalSeconds % 60));
    // document.getElementById('minu').innerHTML = (totalSeconds % 60);
    $.ajax({
        url: "set_timer_page.php",
        type: "Post",
        data: {
            'seconds': totalSeconds,
            'language_type': c_lang_paper
        },
        success: function(data) {
            $('#updates').html(data);
        }
    })

}



function createCookie(name, value, days) {
    var expires;

    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }

    document.cookie = escape(name) + "=" +
        escape(value) + expires + "; path=/";
}
</script>