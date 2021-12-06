<?php

    ob_start();
    include('config.php');
    $grid = $_SESSION['grId'];

    if($grid == ''){
        header("location:index.php");
    }

    $_SESSION['start'] = $_GET['sub'];

    

    if(@$_SESSION['c_lang']=='NaN'){
        $_SESSION['c_lang'] = '0';
    }

    if(@$_SESSION['p_lang']=='NaN'){
        $_SESSION['p_lang'] = '0';
    }

    if(@$_SESSION['a_lang']=='NaN'){
        $_SESSION['a_lang'] = '0';
    }

    if(@$_SESSION['d_lang']=='NaN'){
        $_SESSION['d_lang'] = '0';
    }

    if(@$_SESSION['l_lang']=='NaN'){
        $_SESSION['l_lang'] = '0';
    }

    $sqls = "SELECT * FROM gim_students WHERE grid='$grid'";
    $resu = mysqli_query($conn,$sqls);

    $check = mysqli_fetch_assoc($resu);
    $s_id = $check['schedule_id'];

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


// echo $_SESSION['p_lang']=0;
    $selected_sub = $_REQUEST['sub'];

    if($selected_sub == 'p'){
        $que = "SELECT * FROM gim_question where `subject`=1";
    } else if($selected_sub == 'a'){
        $que = "SELECT * FROM gim_question where `subject`=2";
    } else if($selected_sub == 'c'){
        $que = "SELECT * FROM gim_question where `subject`=3";
    } else if($selected_sub == 'pg'){
        $que = "SELECT * FROM gim_question where `subject`=4";
    } else if($selected_sub == 'l'){
        $que = "SELECT * FROM gim_question where `subject`=5";
    } else {
        header("location:profile.php");
    }
    
    $que1 = "SELECT * FROM gim_sub_time where `grid`='$grid' AND `schedule_id`='$s_id'";

    $res = mysqli_query($conn,$que);
    $res1 = mysqli_query($conn,$que1);

    if(mysqli_num_rows($res1)>0){

        $datasss = mysqli_fetch_assoc($res1);
        $_SESSION['p_lang'] = $datasss['psd'];
        $_SESSION['a_lang'] = $datasss['animate'];
        $_SESSION['c_lang'] = $datasss['c_lang'];
        $_SESSION['d_lang'] = $datasss['psd_g'];
        $_SESSION['l_lang'] = $datasss['logic'];

    }

    // $row = mysqli_fetch_assoc($res);

  
    if($selected_sub == 'p'){
        
       
        $p_sql = "SELECT * FROM gim_std_paper WHERE grid='$grid' AND schedule_id='$s_id'";
        $p_res = mysqli_query($conn,$p_sql);

        if(mysqli_num_rows($p_res)>0){

            $p_row = mysqli_fetch_assoc($p_res);

            if($p_row['psd_w'] != ""){

                $_SESSION['p_pos'] = explode("#",$p_row['psd_w']);
                $nums = $_SESSION['p_pos'];
            } else {

                if(!(isset($_SESSION['p_pos']))) {
                    $nums_a = get_rand_number(0,mysqli_num_rows($res)-1,1);
                    $_SESSION['p_pos'] = $nums_a;
                }
                $nums = $_SESSION['p_pos'];
                $d = implode("#",$nums);
                $pi_sql = "UPDATE gim_std_paper SET psd_W='$d' WHERE grid='$grid' AND schedule_id='$s_id'";
                $pi_res = mysqli_query($conn,$pi_sql);    

            }

        } else {

            if(!(isset($_SESSION['p_pos']))) {
                $nums_p = get_rand_number(0,mysqli_num_rows($res)-1,1);
                $_SESSION['p_pos'] = $nums_p;
            }
            $nums = $_SESSION['p_pos'];


            $d = implode("#",$nums);
            $pi_sql = "INSERT INTO gim_std_paper (grid,psd_w,schedule_id) VALUES ('$grid','$d','$s_id')";
            $pi_res = mysqli_query($conn,$pi_sql);
        }


    } else if($selected_sub == 'a'){

        $p_sql = "SELECT * FROM gim_std_paper WHERE grid='$grid' AND schedule_id='$s_id'";
        $p_res = mysqli_query($conn,$p_sql);

        if(mysqli_num_rows($p_res)>0){

            $p_row = mysqli_fetch_assoc($p_res);

            if($p_row['animate'] != ""){
                
                $_SESSION['a_pos'] = explode("#",$p_row['animate']);
                $nums = $_SESSION['a_pos'];
            } else {

                if(!(isset($_SESSION['a_pos']))) {
                    $nums_a = get_rand_number(0,mysqli_num_rows($res)-1,1);
                    $_SESSION['a_pos'] = $nums_a;
                }
                $nums = $_SESSION['a_pos'];
                $d = implode("#",$nums);
                $pi_sql = "UPDATE gim_std_paper SET animate='$d' WHERE grid='$grid' AND schedule_id='$s_id'";
                $pi_res = mysqli_query($conn,$pi_sql);    

            }
            
        } else {

            if(!(isset($_SESSION['a_pos']))) {
                $nums_a = get_rand_number(0,mysqli_num_rows($res)-1,1);
                $_SESSION['a_pos'] = $nums_a;
            }
            $nums = $_SESSION['a_pos'];

            $d = implode("#",$nums);
            $pi_sql = "INSERT INTO gim_std_paper (grid,animate,schedule_id) VALUES ('$grid','$d','$s_id')";
            $pi_res = mysqli_query($conn,$pi_sql);
        }


    } else if($selected_sub == 'c'){

        $p_sql = "SELECT * FROM gim_std_paper WHERE grid='$grid' AND schedule_id='$s_id'";
        $p_res = mysqli_query($conn,$p_sql);

        if(mysqli_num_rows($p_res)>0){

            $p_row = mysqli_fetch_assoc($p_res);

            if($p_row['c_lang'] != ""){

                $_SESSION['c_pos'] = explode("#",$p_row['c_lang']);
                $nums = $_SESSION['c_pos'];
            } else {

                if(!(isset($_SESSION['c_pos']))) {
                    $nums_a = get_rand_number(0,mysqli_num_rows($res)-1,5);
                    $_SESSION['c_pos'] = $nums_a;
                }
                $nums = $_SESSION['c_pos'];
                $d = implode("#",$nums);
                $pi_sql = "UPDATE gim_std_paper SET c_lang='$d' WHERE grid='$grid' AND schedule_id='$s_id'";
                $pi_res = mysqli_query($conn,$pi_sql);    

            }




        } else {


            if(!(isset($_SESSION['c_pos']))) {
                $nums_c = get_rand_number(0,mysqli_num_rows($res)-1,5);
                $_SESSION['c_pos'] = $nums_c;
            }
            $nums = $_SESSION['c_pos'];

            $d = implode("#",$nums);
            $pi_sql = "INSERT INTO gim_std_paper (grid,c_lang,schedule_id) VALUES ('$grid','$d','$s_id')";
            $pi_res = mysqli_query($conn,$pi_sql);
        }


    } else if($selected_sub == 'pg'){

        $p_sql = "SELECT * FROM gim_std_paper WHERE grid='$grid' AND schedule_id='$s_id'";
        $p_res = mysqli_query($conn,$p_sql);

        if(mysqli_num_rows($p_res)>0){

            $p_row = mysqli_fetch_assoc($p_res);

            if($p_row['psd_g'] != ""){

                $_SESSION['d_pos'] = explode("#",$p_row['psd_g']);
                $nums = $_SESSION['d_pos'];
            } else {

                if(!(isset($_SESSION['d_pos']))) {
                    $nums_a = get_rand_number(0,mysqli_num_rows($res)-1,1);
                    $_SESSION['d_pos'] = $nums_a;
                }
                $nums = $_SESSION['d_pos'];
                $d = implode("#",$nums);
                $pi_sql = "UPDATE gim_std_paper SET psd_g='$d' WHERE grid='$grid' AND schedule_id='$s_id'";
                $pi_res = mysqli_query($conn,$pi_sql);    

            }




        } else {


            if(!(isset($_SESSION['d_pos']))) {
                $nums_d = get_rand_number(0,mysqli_num_rows($res)-1,1);
                $_SESSION['d_pos'] = $nums_d;
            }
            $nums = $_SESSION['d_pos'];

            $d = implode("#",$nums);
            $pi_sql = "INSERT INTO gim_std_paper (grid,psd_g,schedule_id) VALUES ('$grid','$d','$s_id')";
            $pi_res = mysqli_query($conn,$pi_sql);
        }


    } 
    // else if($selected_sub == 'l'){

    //     if(!(isset($_SESSION['l_pos']))) {
    //         $nums_l = get_rand_number(0,mysqli_num_rows($res)-1,2);
    //         $_SESSION['l_pos'] = $nums_l;
    //     }
    //     $nums = $_SESSION['l_pos'];

    // }


    function get_rand_number($start=1,$end=10,$length=4){
        $connt=0;
        $temp=array();
        while($connt<$length){
            $temp[]=mt_rand($start,$end);
            $data=array_unique($temp);
            $connt=count($data);
        }
        sort($data);
        return $data;
    }

    if(mysqli_num_rows($res)>0){
            
       echo "";
            while($result_data = mysqli_fetch_assoc($res)) {
                $new[] = $result_data;
            }



          
            for($i=0 ; $i<sizeof($nums); $i++) {

                for($j=0 ; $j<sizeof($new); $j++) {
                    
                    if($nums[$i] == $new[$j]['id']) {

                        $datas[] = $new[$j]; 

                    }
                

                }

            }

            // print_r($nums);
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
    <title><?php     
    if($selected_sub == 'p'){
        echo "Photoshop Web";    
    } else if($selected_sub == 'a'){
        echo "Animate";
    } else if($selected_sub == 'c'){
        echo "C Language";
    } else if($selected_sub == 'pg'){
        echo "Photoshop Graphics";
    } else if($selected_sub == 'l'){
        echo "Logic";
    } else {
        echo "Animate";
    }
 ?></title>
    <link href="css/que.css" rel="stylesheet">

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

    .sticky-btn {
        position: fixed;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
    }

    .sticky-btn a {
        margin-bottom: 3px;
        background-color: #212529;
        border: 0;
        font-size: 15px;
        padding: 10px 30px;
        border-radius: 0 6px 6px 0;
    }


    li span {
        display: block;
        font-size: 3.5rem;
    }

    .emoji {
        display: none;
        padding: 1rem;
    }

    .card {
        background-color: transparent;
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

<div id="updates"></div>

    <form style="position: fixed; left: 88%; top: 20%;"
        onSubmit="return confirm('are you sure Your Exma is Finish?\nYour All Section Exam Is FinshAfter Finish You Wil Not Eble TO Start Exam.');"
        method="post">
        <button style="display:;" type="submit" name="end_exam" class="btn btn-danger btn-rounded">End
            Exam</button>
    </form>

    <div class="container">

        <div id="countdown">
            <ul style="text-align:end;">
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



        <h1 class="center">
            <input type="hidden" id="c_lang_paper" name="c_lang_paper" value="<?php echo @$_GET['sub']; ?>">

            <input type="hidden" id="c_lang_session" name="c_lang_session" value="<?php echo @$_SESSION['c_lang']; ?>">
            <input type="hidden" id="a_lang_session" name="a_lang_session" value="<?php echo @$_SESSION['a_lang']; ?>">
            <input type="hidden" id="p_lang_session" name="p_lang_session" value="<?php echo @$_SESSION['p_lang']; ?>">
            <input type="hidden" id="d_lang_session" name="d_lang_session" value="<?php echo @$_SESSION['d_lang']; ?>">
            <input type="hidden" id="l_lang_session" name="l_lang_session" value="<?php echo @$_SESSION['l_lang']; ?>">
            <?php
        
        if($selected_sub == 'p'){
            echo "Photoshop Section";?>

            <?php    
        } else if($selected_sub == 'a'){
            echo "Animate Section"; ?>

            <?php
        } else if($selected_sub == 'c'){
            echo "C Language Section";?>

            <?php
        } else if($selected_sub == 'pg'){
            echo "Photoshop Graphics Section";?>

            <?php
        } else if($selected_sub == 'l'){
            echo "Logic Section";?>

            <?php
        }       
        
        ?>




        </h1>

<p style="color:red; font-size:20px;">
<?php

if($selected_sub == 'a'){
    echo " * Don’t use GIF in Animate section<br>"; 
    echo " * Don’t use Internet in Drawing section<br>"; 
    echo " * NOTE :- from this sketch you with create an Animation so we objects that you can animate them and animate any Four objects in the scean and to animate objects you can take from internet.";

} else if($selected_sub == 'c'){
    echo " * Don’t use internet in C language Section";?>

    <?php
}else if($selected_sub == 'l'){
    echo " * Don’t use internet in Logic section<br>";
    
    
}       

?>
</p>
<p><?php 
if($selected_sub == 'a'){
    echo "<li> - Explor Your Imagination & Draw a Scene accourding to given Instructions a make perfect Combination of Objects.</li>"; 
    echo "<li> - Use Given 10 Objects + Add 3 object from your side as you want + we any two object from the Examination hall.</li>"; 
    echo "<li> - Using this Instructions & object draw neat & clean sketch of Scean</li>"; 
    
    
    
    ?>
</p>
    <?php
}
?></p>
        <?php
        if(sizeof($datas)>0){
            
            $count = 0;
            
            foreach($datas as $row){
                
                $count++;
                
            ?>

            

        <div class="card mb-3" style="margin-top:20px; background-color: transparent">

            <div class="card ">
                <div class="card-header">
                    <?php echo "<h1>".$count.".</h1> "; ?>
                    <h5 class="card-title"><?php echo $row["question_1"]; ?></h5>
                    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                </div>
                <?php if(str_replace("questions/","",$row['que_img']) != "") { ?>
                <img style="width: 50%; align-self: center;" class="card-img-top" src="<?php echo $row['que_img']; ?>"
                    alt="Card image cap">
                <?php } ?>
                <div class="card-body">


                    <?php if($row['question_1'] != ""){ echo "<h1>2.</h1>"; } ?>

                    <h5 class="card-title"><?php echo $row["question"]; ?></h5>
                    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                </div>
            </div>
        </div>
        <!-- <article class="episode">
            <div class="episode__number"><?php echo $count;?></div>
            <div class="episode__content">

                <div class="card">

                    <img style="width:400%" src="<?php echo $row['que_img']; ?>" alt="">
                </div>
                <div class="story" style="min-width:1000%; width:100%; margin-left: -200px;">
                    <p class="text-dark"><b><?php echo $row["question"]; ?></b></p>
                </div>
            </div>
        </article> -->

        <?php
            }
            
        }
        ?>

    </div>

    <br><br>
</body>

</html>

<script>

</script>


<script>
var minutesLabel = document.getElementById("minutes");
var secondsLabel = document.getElementById("seconds");
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
if (c_lang_paper == 'pg') {
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