<?php 

    ob_start();
    include('config.php');

    $final_result = array();
    $grid = $_REQUEST['grid'];

   
    if(isset($_REQUEST['grid'])){
        $st = "SELECT * FROM gim_marks WHERE grid=$grid";
        $res4 = mysqli_query($conn, $st);
        while($row4 = mysqli_fetch_array($res4)){

            $s_id = $row4['schedule_id'];

        $sq = "SELECT * FROM gim_students WHERE grid=$grid";
        $sq_piq = "SELECT * FROM gim_piq WHERE grid=$grid AND schedule_id='$s_id'";
        $mq = "SELECT * FROM gim_marks WHERE grid=$grid AND schedule_id='$s_id'";
        $cq = "SELECT * FROM gim_credit";
        $google_classroom_query = "SELECT * FROM gim_students WHERE grid=$grid";

        $res = mysqli_query($conn, $sq);
        $res_piq = mysqli_query($conn, $sq_piq);
        $res2 = mysqli_query($conn, $mq);
        $res3 = mysqli_query($conn, $cq);
        $gc_res = mysqli_query($conn, $google_classroom_query);

        $row = mysqli_fetch_assoc($res);
        $row_piq = mysqli_fetch_assoc($res_piq);
        $row2 = mysqli_fetch_array($res2);
        $gc_row = mysqli_fetch_array($gc_res);       
        
        $ans = explode("#",$row_piq['ans']);

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

            $tot[] = number_format($toal_per, 2);

        }

        // arsort($final_result[]['total_per']);

        // asort($tot);

        $keys = array_column($final_result, 'total_per');

		array_multisort($keys, SORT_DESC, $final_result);

        // echo "<pre>";
        //     print_r($final_result);
        // echo "</pre>";
        
    

    // array_multisort($final_result, SORT_ASC, SORT_NUMERIC);

        $total = 0;
        $total = $psd_marks+$psd_g_marks+$c_lang_marks+$logic_marks+$drawing_marks+$animate_marks;
        $pa = 0;
        if($total >65){
            $pa = 1;
        } else {
            $pa = 0;
        }
    
?>


<table class="table table-bordered table-hover">

    <legend>Master Selection By Student</legend>
    <thead>
        <tr class="bg-dark">
            <th scope="col" class="text-light">GRID</th>
            <th scope="col" class="text-light">First Priority</th>
            <th scope="col" class="text-light">Second Priority</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong><?php echo $grid; ?></strong></td>
            <td><?php 
            if($ans[7]==1){
                echo "Game Designing";
            } else if($ans[7]==2) {
                echo "Front-end Design";
            } else if($ans[7]==3) {
                echo "Graphics";
            } else if($ans[7]==4) {
                echo "Animation";
            } else if($ans[7]==5) {
                echo "Android Development";
            } else if($ans[7]==6) {
                echo "IOS Development";
            } else if($ans[7]==7) {
                echo "Back-end Developing";
            } else if($ans[7]==8) {
                echo "Game Development";
            } else if($ans[7]==9) {
                echo "Front-end Development";
            } else if($ans[7]==10) {
                echo "Flutter Development";
            } else {
                foreach($final_result as $k => $v){ 
                    echo $k;
                    break;
                }
            }
            ?> </td>
            <td><?php 
            if($ans[22]==1){
                echo "Game Designing";
            } else if($ans[22]==2) {
                echo "Front-end Design";
            } else if($ans[22]==3) {
                echo "Graphics";
            } else if($ans[22]==4) {
                echo "Animation";
            } else if($ans[22]==5) {
                echo "Android Development";
            } else if($ans[22]==6) {
                echo "IOS Development";
            } else if($ans[22]==7) {
                echo "Back-end Developing";
            } else if($ans[22]==8) {
                echo "Game Development";
            } else if($ans[22]==9) {
                echo "Front-end Development";
            } else if($ans[22]==10) {
                echo "Flutter Development";
            } 
            else {
                $gg = 0;
                foreach($final_result as $k => $v){ 
                    if ($gg==2){
                        echo $k;
                        break;
                    }
                    $gg++;
                }
            }
            ?> </td>
        </tr>
    </tbody>
</table>
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
<form action="" method="post">
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
                <th style="width:200px" class="text-light"><b>Total<br><?php if($pa == 0){
                    echo "<p style='color:red; font-size:22px;'>Fail</p>";
                } else {
                    echo "<p style='color:green; font-size:22px;'>Pass</p>";
                } ?></b></th>
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

    <input type="hidden" name="gr" value="<?php echo $grid; ?>">
    <div class="modal-footer">
    <?php 
            $qqq = "SELECT * FROM gim_marks WHERE grid=$grid";
            $res_qq = mysqli_query($conn,$qqq);
            $cou = 0;
            while($rrr = mysqli_fetch_assoc($res_qq)){
                $cou++;
            }
            if($cou > 1){

            
        ?>
    <a href="3rd_result.php?grid=<?php echo $grid; ?>" target="_blank" ><button type="button" class="btn btn-success">
        Master Result
</button></a>
        <?php } ?>
        
        <a href="clear_field.php?grid=<?php echo $grid; ?>"><button type="button" class="btn btn-warning">Clear
                Field</button></a>
        <a href="reexam.php?grid=<?php echo $grid; ?>"><button type="button" class="btn btn-danger">Re-Exam</button></a>
       
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-primary">Save changes</button>
    </div>
</form>

<?php

                }
            }
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
?>