
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?php echo $_REQUEST['grid']; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style type="text/css">
body {
    width: 1140px;
    height: 100%;
    color: #000;
}

.logo {
    text-align: center;
    margin: 30px 0;
}

.logo img {
    max-width: 30%;
    display: inline-block;
}

.footer {
    text-align: center;
}

.footer span {
    display: inline-block;
    text-align: center;
    font-weight: 700;
}

ol li {
    margin-bottom: 20px;
}
</style>

<body class="bordered">

<?php 

    ob_start();
    session_start();
    include('config.php');

    $grid = $_REQUEST['grid'];
    $ids = $_REQUEST['schedule_id'];

    $que_1 = "SELECT * FROM gim_question";
    $que_2 = "SELECT * FROM gim_question";
    $que_3 = "SELECT * FROM gim_question";
    $que_4 = "SELECT * FROM gim_question";

    $res_1 = mysqli_query($conn,$que_1);
    $res_2 = mysqli_query($conn,$que_2);
    $res_3 = mysqli_query($conn,$que_3);
    $res_4 = mysqli_query($conn,$que_4);

    $p_sql = "SELECT * FROM gim_std_paper WHERE grid='$grid' AND schedule_id='$ids'";
    $p_res = mysqli_query($conn,$p_sql);

    // while($p_row = mysqli_fetch_assoc($p_res)){
    $p_row = mysqli_fetch_assoc($p_res);
    $nums_1 = explode("#",$p_row['psd_w']);
    $nums_2 = explode("#",$p_row['animate']);
    $nums_3 = explode("#",$p_row['c_lang']);
    $nums_4 = explode("#",$p_row['psd_g']);
    
    // while($result_data_1 = mysqli_fetch_assoc($res_1)) {
    //     $new_1[] = $result_data_1;
    // }
    // while($result_data_2 = mysqli_fetch_assoc($res_2)) {
    //     $new_2[] = $result_data_2;
    // }
    // while($result_data_3 = mysqli_fetch_assoc($res_3)) {
    //     $new_3[] = $result_data_3;
    // }
    // while($result_data_4 = mysqli_fetch_assoc($res_4)) {
    //     $new_4[] = $result_data_4;
    // }

    for($i=0 ; $i<sizeof($nums_1); $i++) {

        while($result_data_1 = mysqli_fetch_assoc($res_1)) {
            
            if($nums_1[$i] == $result_data_1['id']) {

                $datas_1[] = $result_data_1; 

            }
        

        }

    }
    // for($i=0 ; $i<sizeof($nums_1); $i++) {

    //     for($j=0 ; $j<sizeof($new_1); $j++) {
            
    //         if($nums_1[$i] == $new_1['id']) {

    //             $datas_1[] = $new_1[$j]; 

    //         }
        

    //     }

    // }

    for($i=0 ; $i<sizeof($nums_2); $i++) {

        while($result_data_2 = mysqli_fetch_assoc($res_2)) {
            
            if($nums_2[$i] == $result_data_2['id']) {

                $datas_2[] = $result_data_2; 

            }
        

        }

    }

    for($i=0 ; $i<sizeof($nums_3); $i++) {
        $res_3 = mysqli_query($conn,$que_3);
        while($result_data_3 = mysqli_fetch_assoc($res_3)) {
            if($nums_3[$i] == $result_data_3['id']) {
                
                $datas_3[] = $result_data_3; 

            }
        

        }

    }
    for($i=0 ; $i<sizeof($nums_4); $i++) {
    
        while($result_data_4 = mysqli_fetch_assoc($res_4)) {
            
            if($nums_4[$i] == $result_data_4['id']) {

                $datas_4[] = $result_data_4; 

            }
        

        }

    }

    $que = "SELECT * FROM gim_logic";

    $res = mysqli_query($conn,$que);

    $p_sql = "SELECT * FROM gim_logic_ans WHERE grid='$grid' AND schedule_id='$ids'";
    $p_res = mysqli_query($conn,$p_sql);

    $p_row = mysqli_fetch_assoc($p_res);

    $nums_5 = explode("#",$p_row['que']);

    
    
    while($result_data_5 = mysqli_fetch_assoc($res)) {
        $new_5[] = $result_data_5;
    }
    
    

    
    for($i=0 ; $i<sizeof($nums_5); $i++) {
        
        for($j=0 ; $j<sizeof($new_5); $j++) {
            
            if($nums_5[$i] == $new_5[$j]['id']) {
                // echo $nums_5[$i]." = ".$new_5[$j]['id']."<br>";
                
                $datas_5[] = $new_5[$j]; 
                $ids_5[] = $new_5[$j]['id'];
                
            }
            
            
        }
        
    }
    // echo "<pre>";
    // print_r($new_5);
    // echo "<br><br>";
    // print_r($datas_5);
    // echo "<br></pre>";
    // echo sizeof($ids_5);


?>

    <div class="col-12 border">
        <div class="logo">
            <img src="assets/images/rnw.png" alt="passport_size_photo" class="img-fluid">
        </div>
        <hr />
        <div class="row px-3 justify-content-between">
            <h6>GRID : <?php echo $grid; ?></h6>
            <h6>Total Marks : 200</h6>
        </div>

        <?php 
            
            $q = "SELECT * FROM gim_students WHERE grid='$grid'";
            $rrr = mysqli_query($conn,$q);

            $arr = mysqli_fetch_assoc($rrr);

            $idd = $arr['schedule_id'];

            $qq = "SELECT * FROM gim_schedule WHERE id='$ids'";
            $rrrr = mysqli_query($conn,$qq);

            $arrr = mysqli_fetch_assoc($rrrr);


        
        ?>

        <div class="row px-3 justify-content-between">
            <h6>Date : <?php echo $arrr['date']; ?></h6>
            <h6>Time : <?php echo $arrr['time']; ?></h6>
        </div>
        <hr />
        <dl>
            <h3 class="mt-2"><u>Photoshop Web:</u></h3>
            <?php foreach($datas_1 as $r_1) {?>
            <dd style="width: 50%;float: left; border:1px solid #000;"><?php echo $r_1['question']; ?></dd>
            <?php } ?>

            <h3 class="mt-2"><u>Photoshop Graphics:</u></h3>
            <?php foreach($datas_4 as $r_2) {?>
            <dd style="width: 50%;float: left; border:1px solid #000;"><?php echo $r_2['question']; ?></dd>
            <?php } ?>

            <h3 class="mt-2"><u>C Language:</u></h3>
            <?php foreach($datas_3 as $r_3) {?>
            <dd  style="width: 50%;float: left; border:1px solid #000;"><?php echo $r_3['question']; ?></dd>
            <?php } ?>

            <h3 class="mt-2"><u>Animate:</u></h3>
            
            <?php foreach($datas_2 as $r_4) {?>
            <dd  style="width: 50%;float: left; border:1px solid #000;"><?php echo $r_4['question_1']; ?></dd>
            <?php if(str_replace("questions/","",$r_4['que_img']) != "") { ?>
            <img style="width: 30%; addgn-self: center;" class="card-img-top" src="<?php echo $r_4['que_img']; ?>"
                alt="Card image cap">
            <?php } ?>
            <dd><?php echo $r_4['question']; ?></dd>
            <?php } ?>

            <?php
                $count = 0;
                
                foreach($datas_5 as $r_5){
                    $count++; ?>

            <dd style="width: 50%;float: left;padding:0 10px; border:1px solid #000;"><?php echo $r_5['que']; ?>
            <p style="<?php if($r_5['ans'] == 'A'){echo "color:green";} ?>"> A: <?php echo $r_5['a']; ?></p>
            <p style="<?php if($r_5['ans'] == 'B'){echo "color:green";} ?>"> B: <?php echo $r_5['b']; ?></p>
            <p style="<?php if($r_5['ans'] == 'C'){echo "color:green";} ?>"> C: <?php echo $r_5['c']; ?></p>
            <p style="<?php if($r_5['ans'] == 'D'){echo "color:green";} ?>"> D: <?php echo $r_5['d']; ?></p> </dd>
            <?php } ?>

        </ol>
        <div class="footer">
            <span>---------- Best of Luck ----------</span>
        </div>
    </div>

    <?php

                // }
    
    ?>

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

