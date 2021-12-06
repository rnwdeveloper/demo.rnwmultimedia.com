<?php

ob_start();
include('header.php');

if(@$_SESSION['email'] == ""){
    header('location: index.php');
}

$sql_sch = "SELECT * FROM gim_schedule";
    $result_sch = mysqli_query($conn,$sql_sch);

    while($ro_sch = mysqli_fetch_assoc($result_sch)){ 
        $dt_sch[] = $ro_sch;    
    }
    arsort($dt_sch);

    $iddds = $dt_sch[sizeof($dt_sch)-1]['id'];


    $qu = "SELECT * FROM gim_marks WHERE schedule_id='$iddds'";
    // $qu = "SELECT * FROM gim_marks WHERE schedule_id='5' OR schedule_id='6'";
    $re = mysqli_query($conn,$qu);

$br = 'All'; 

$q1_1 = 0;
$q1_2 = 0;
$q1_3 = 0;
$q1_4 = 0;
$q1_5 = 0;
$q1_6 = 0;
$q1_7 = 0;
$q1_8 = 0;
$q1_9 = 0;
$q1_10 = 0;

$q2_1 = 0;
$q2_2 = 0;
$q2_3 = 0;
$q2_4 = 0;
$q2_5 = 0;
$q2_6 = 0;
$q2_7 = 0;
$q2_8 = 0;
$q2_9 = 0;
$q2_10 = 0;

$q3_1 = 0;
$q3_2 = 0;
$q3_3 = 0;
$q3_4 = 0;
$q3_5 = 0;
$q3_6 = 0;
$q3_7 = 0;
$q3_8 = 0;
$q3_9 = 0;
$q3_10 = 0;

$q4_1 = 0;
$q4_2 = 0;
$q4_3 = 0;
$q4_4 = 0;
$q4_5 = 0;
$q4_6 = 0;
$q4_7 = 0;
$q4_8 = 0;
$q4_9 = 0;
$q4_10 = 0;
$q4_11 = 0;

// $query = "SELECT * FROM gim_students WHERE schedule_id='5' OR schedule_id='6'";
$query = "SELECT * FROM gim_students WHERE schedule_id='$iddds'";
$results = mysqli_query($conn,$query);

while ($row_data = mysqli_fetch_assoc($results)) {
    
    $key12 = $row_data['master_field'];
    if($key12=="Game Designing"){
        $q4_1++;
    } else if($key12 == "Front-end Design"){
        $q4_2++;
    } else if($key12 == "Graphics"){
        $q4_3++;
    } else if($key12 == "Animation"){
        $q4_4++;
    } else if($key12 == "Android Development"){
        $q4_5++;
    } else if($key12 == "IOS Development"){
        $q4_6++;
    } else if($key12 == "Back-end Developing"){
        $q4_7++;
    } else if($key12 == "Game Development"){
        $q4_8++;
    } else if($key12 == "Front-end Development"){
        $q4_9++;
    } else if($key12 == "Flutter Development"){
        $q4_10++;
    } else if($row_data['e_status'] == '4'){
        $q4_11++;
    }

}



while($ro = mysqli_fetch_assoc($re)){

    $grid = $ro['grid'];

    $sq = "SELECT * FROM gim_students WHERE grid=$grid";
    $mq = "SELECT * FROM gim_marks WHERE grid=$grid AND schedule_id='$iddds'";
    $cq = "SELECT * FROM gim_credit";

    $res = mysqli_query($conn, $sq);
    $res2 = mysqli_query($conn, $mq);
    $res3 = mysqli_query($conn, $cq);

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

        $tot[] = number_format($toal_per, 2);

    }

    // arsort($final_result[]['total_per']);

    // asort($tot);

    $keys = array_column($final_result, 'total_per');

    array_multisort($keys, SORT_DESC, $final_result);
//     echo "<pre>";
// print_r($final_result);
// echo "</pre><br /> <br />";
if($row['branch']==$br || $br=='All'){

    $i = 0;
    foreach ($final_result as $key => $value) {
        
        if($i==0){
            if($key=="Game Designing"){
                $q1_1++;
            } else if($key == "Front-end Design"){
                $q1_2++;
            } else if($key == "Graphics"){
                $q1_3++;
            } else if($key == "Animation"){
                $q1_4++;
            } else if($key == "Android Development"){
                $q1_5++;
            } else if($key == "IOS Development"){
                $q1_6++;
            } else if($key == "Back-end Developing"){
                $q1_7++;
            } else if($key == "Game Development"){
                $q1_8++;
            } else if($key == "Front-end Development"){
                $q1_9++;
            } else if($key == "Flutter Development"){
                $q1_10++;
            }
            
        }
        if($i==1){
            if($key=="Game Designing"){
                $q2_1++;
            } else if($key == "Front-end Design"){
                $q2_2++;
            } else if($key == "Graphics"){
                $q2_3++;
            } else if($key == "Animation"){
                $q2_4++;
            } else if($key == "Android Development"){
                $q2_5++;
            } else if($key == "IOS Development"){
                $q2_6++;
            } else if($key == "Back-end Developing"){
                $q2_7++;
            } else if($key == "Game Development"){
                $q2_8++;
            } else if($key == "Front-end Development"){
                $q2_9++;
            } else if($key == "Flutter Development"){
                $q2_10++;
            }
            
        }
        if($i==2){
            if($key=="Game Designing"){
                $q3_1++;
            } else if($key == "Front-end Design"){
                $q3_2++;
            } else if($key == "Graphics"){
                $q3_3++;
            } else if($key == "Animation"){
                $q3_4++;
            } else if($key == "Android Development"){
                $q3_5++;
            } else if($key == "IOS Development"){
                $q3_6++;
            } else if($key == "Back-end Developing"){
                $q3_7++;
            } else if($key == "Game Development"){
                $q3_8++;
            } else if($key == "Front-end Development"){
                $q3_9++;
            } else if($key == "Flutter Development"){
                $q3_10++;
            }
            
        }

        $i++;
    }
    }
}

?>
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="input-group mb-3 mt-3" style="margin-right:50px">
            <div class="input-group-append" style="margin-left:100px">
                <label class="input-group-text" for="inputGroupSelect02">Date</label>
                </div>
            <select class="custom-select" id="schedule">
        <?php for ($i=sizeof($dt_sch)-1; $i>=0 ; $i--) { ?>
            <option value="<?php echo $dt_sch[$i]['id']; ?>"><?php echo $dt_sch[$i]['date']; ?></option>
            <?php } ?>
        </select>

                <div class="input-group-append" style="margin-left:100px">
                    <label class="input-group-text" for="inputGroupSelect02">Branch</label>
                </div>
                <?php if($_SESSION['isAdmin']==1) { ?>
                <select class="custom-select" id="branch">
                    <option value="All" selected>All...</option>
                    <option value="RW1">RW1</option>
                    <option value="RW2">RW2</option>
                    <option value="RW3">RW3</option>
                    <option value="RW4">RW4</option>
                </select>
                <?php } else {
                    $f_branch = $_SESSION['f_branch']; ?>
                    <select class="custom-select" id="branch">
                    <option value="<?php echo $f_branch; ?>"><?php echo $f_branch; ?></option>
                </select>
                <?php } ?>
            </div>

            <div id="content">
                <div id="content">
                    <div style="text-align:-webkit-center" id="piechart3"></div>
                    <div style="text-align:-webkit-center" id="piechart"></div>
                    <div style="text-align:-webkit-center" id="piechart1"></div>
                    <div style="text-align:-webkit-center" id="piechart2"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
    // Load google charts
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawChart1);
    google.charts.setOnLoadCallback(drawChart2);
    google.charts.setOnLoadCallback(drawChart3);

    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Game Design', <?php echo $q1_1; ?>],
            ['Front-end Design', <?php echo $q1_2; ?>],
            ['Graphics', <?php echo $q1_3; ?>],
            ['Animation', <?php echo $q1_4; ?>],
            ['Android Development', <?php echo $q1_5; ?>],
            ['IOS Development', <?php echo $q1_6; ?>],
            ['Back-end Development', <?php echo $q1_7; ?>],
            ['Game Development', <?php echo $q1_8; ?>],
            ['Front-end Development', <?php echo $q1_9; ?>],
            ['Flutter Development', <?php echo $q1_10; ?>]

        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {
            'title': 'First Field',
            // 'width': 550,
            'height': 400
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }

    function drawChart1() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Game Design', <?php echo $q2_1; ?>],
            ['Front-end Design', <?php echo $q2_2; ?>],
            ['Graphics', <?php echo $q2_3; ?>],
            ['Animation', <?php echo $q2_4; ?>],
            ['Android Development', <?php echo $q2_5; ?>],
            ['IOS Development', <?php echo $q2_6; ?>],
            ['Back-end Development', <?php echo $q2_7; ?>],
            ['Game Development', <?php echo $q2_8; ?>],
            ['Front-end Development', <?php echo $q2_9; ?>],
            ['Flutter Development', <?php echo $q2_10; ?>]

        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {
            'title': 'Second Field',
            // 'width': 550,
            'height': 400
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart.draw(data, options);
    }

    function drawChart2() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Game Design', <?php echo $q3_1; ?>],
            ['Front-end Design', <?php echo $q3_2; ?>],
            ['Graphics', <?php echo $q3_3; ?>],
            ['Animation', <?php echo $q3_4; ?>],
            ['Android Development', <?php echo $q3_5; ?>],
            ['IOS Development', <?php echo $q3_6; ?>],
            ['Back-end Development', <?php echo $q3_7; ?>],
            ['Game Development', <?php echo $q3_8; ?>],
            ['Front-end Development', <?php echo $q3_9; ?>],
            ['Flutter Development', <?php echo $q3_10; ?>]

        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {
            'title': 'Third Field',
            // 'width': 550,
            'height': 400
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart.draw(data, options);
    }

    function drawChart3() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Game Design', <?php echo $q4_1; ?>],
            ['Front-end Design', <?php echo $q4_2; ?>],
            ['Graphics', <?php echo $q4_3; ?>],
            ['Animation', <?php echo $q4_4; ?>],
            ['Android Development', <?php echo $q4_5; ?>],
            ['IOS Development', <?php echo $q4_6; ?>],
            ['Back-end Development', <?php echo $q4_7; ?>],
            ['Game Development', <?php echo $q4_8; ?>],
            ['Front-end Development', <?php echo $q4_9; ?>],
            ['Flutter Development', <?php echo $q4_10; ?>],
            ['Re-Exam', <?php echo $q4_11; ?>]

        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {
            'title': 'Final Student Addmission in Master',
            // 'width': 550,
            'height': 400
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
        chart.draw(data, options);
    }

    </script>

<?php include('footer.php'); ?>

<script>
$(document).ready(function() {

    $('#example').DataTable({
        pageLength: 50,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    $("#branch").change(function() {
        var value = $(this).val();
        // alert(value);

        var value1 = document.getElementById('schedule').value;

        $.ajax({
            url: "result_chart.php",
            type: "Post",
            data: {
                'schedule_id': value1,
                'branch': value
            },
            success: function(data) {
                // alert(data);
                $('#content').html(data);
            }
        })

    });

    $("#schedule").change(function() {
        var value = $(this).val();
        // alert(value);

        var value1 = document.getElementById('branch').value;
        

        $.ajax({
            url: "result_chart.php",
            type: "Post",
            data: {
                'schedule_id': value,
                'branch': value1
            },
            success: function(data) {
                // alert(data);
                $('#content').html(data);
            }
        })

    });

});

function getDetail(id) {
    $.ajax({
        url: 'ajax_get_detail.php',
        type: "POST",
        data: {
            'grid': id,
        },
        success: (res) => {
            $('#tableData').html(res);
        }
    });
}

function finalResult(id) {
    $.ajax({
        url: 'ajax_final_result.php',
        type: "POST",
        data: {
            'grid': id,
        },
        success: (res) => {
            $('#resultTable').html(res);
        }
    });
}

function updatedata(id, status) {
    $.ajax({
        url: 'ajax_student_data.php',
        type: "POST",
        data: {
            'grid': id,
            'status': status,
        },
        success: (res) => {
            // alert(res);
            $('#example').html(res);
        }
    });
}
</script>