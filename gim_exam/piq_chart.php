<?php 

    ob_start();
    include('header.php');

    

    $sql_sch = "SELECT * FROM gim_schedule";
    $result_sch = mysqli_query($conn,$sql_sch);

    while($ro_sch = mysqli_fetch_assoc($result_sch)){ 
        $dt_sch[] = $ro_sch;    
    }
    arsort($dt_sch);

    $iddds = $dt_sch[sizeof($dt_sch)-1]['id'];

    $qu = "SELECT * FROM gim_piq WHERE schedule_id='$iddds'";
    $re = mysqli_query($conn,$qu);

    

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
    $q22_1 = 0;
    $q22_2 = 0;
    $q22_3 = 0;
    $q22_4 = 0;
    $q22_5 = 0;
    $q22_6 = 0;
    $q22_7 = 0;
    $q22_8 = 0;
    $q22_9 = 0;
    $q22_10 = 0;
    
    $q2_1 = 0;
    $q2_2 = 0;
    
    $q3_1 = 0;
    $q3_2 = 0;
    
    $q6_1 = 0;
    $q6_2 = 0;
    
    $q12_1 = 0;
    $q12_2 = 0;
    
    $q14_1 = 0;
    $q14_2 = 0;
    
    $q7_1 = 0;
    $q7_2 = 0;
    $q7_3 = 0;
    $q7_4 = 0;
    $q7_5 = 0;
    $q7_6 = 0;
    
    $q17_1 = 0;
    $q17_2 = 0;
    $q17_3 = 0;
    $q17_4 = 0;
    
    $qb_1 = 0;
    $qb_2 = 0;
    $qb_3 = 0;
    $qb_4 = 0;
    $qb_5 = 0;
    $qb_6 = 0;
    
    while($ro = mysqli_fetch_assoc($re)){

        $ans = "";
        $ans = explode("#",$ro['ans']);
        if($ans[7]==1){
            $q1_1++;
        } else if($ans[7]==2) {
            $q1_2++;
        } else if($ans[7]==3) {
            $q1_3++;
        } else if($ans[7]==4) {
            $q1_4++;
        } else if($ans[7]==5) {
            $q1_5++;
        } else if($ans[7]==6) {
            $q1_6++;
        } else if($ans[7]==7) {
            $q1_7++;
        } else if($ans[7]==8) {
            $q1_8++;
        } else if($ans[7]==9) {
            $q1_9++;
        } else if($ans[7]==10) {
            $q1_10++;
        }

        if($ans[8]==1){
            $qb_1++;
        } else if($ans[8]==2){
            $qb_2++;
        } else if($ans[8]==3){
            $qb_3++;
        } else if($ans[8]==4){
            $qb_4++;
        } else if($ans[8]==5){
            $qb_5++;
        } else if($ans[8]==6){
            $qb_6++;
        } 
                
        if($ans[16]==1){
            $q7_1++;
        } else if($ans[16]==2){
            $q7_2++;
        } else if($ans[16]==3){
            $q7_3++;
        } else if($ans[16]==4){
            $q7_4++;
        } else if($ans[16]==5){
            $q7_5++;
        } else if($ans[16]==6){
            $q7_6++;
        } 
                
        if($ans[18]==1){
            $q9_1++;
        } else if($ans[18]==2){
            $q9_2++;
        } else if($ans[18]==3){
            $q9_3++;
        } else if($ans[18]==4){
            $q9_4++;
        }
                
        if($ans[19]==1){
            $q10_1++;
        } else if($ans[19]==2){
            $q10_2++;
        } else if($ans[19]==3){
            $q10_3++;
        } else if($ans[19]==4){
            $q10_4++;
        }
                
        if($ans[20]==1){
            $q11_1++;
        } else if($ans[20]==2){
            $q11_2++;
        } else if($ans[20]==3){
            $q11_3++;
        } else if($ans[20]==4){
            $q11_4++;
        }
                
        if($ans[10]==1){
            $q2_1++;
        } else if($ans[10]==2){
            $q2_2++;
        }

        if($ans[11]==1){
            $q3_1++;
        } else if($ans[11]==2){
            $q3_2++;
        }
        
        if($ans[21]==1){
            $q12_1++;
        } else if($ans[21]==2){
            $q12_2++;
        }
        
        if($ans[23]==1){
            $q14_1++;
        } else if($ans[23]==2){
            $q14_2++;
        }
        
        if($ans[15]==1){
            $q6_1++;
        } else if($ans[15]==2){
            $q6_2++;
        }
        
        if($ans[17]==1){
            $q17_1++;
        } else if($ans[17]==2){
            $q17_2++;
        } else if($ans[17]==3){
            $q17_3++;
        } else if($ans[17]==4){
            $q17_4++;
        }

        
        if($ans[22]==1){
            $q22_1++;
        } else if($ans[22]==2) {
            $q22_2++;
        } else if($ans[22]==3) {
            $q22_3++;
        } else if($ans[22]==4) {
            $q22_4++;
        } else if($ans[22]==5) {
            $q22_5++;
        } else if($ans[22]==6) {
            $q22_6++;
        } else if($ans[22]==7) {
            $q22_7++;
        } else if($ans[22]==8) {
            $q22_8++;
        } else if($ans[22]==9) {
            $q22_9++;
        } else if($ans[22]==10) {
            $q22_10++;
        }

    }



?>

<!-- <!DOCTYPE html>
<html lang="en"> -->

<!-- <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIQ Chart</title>
    
</head> -->

<!-- <body> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="lib/easytimer/dist/easytimer.min.js"></script>


            
<div class="input-group mb-3 mt-3" style="margin-left:50px">
    <select class="custom-select" id="schedule">
        <?php for ($i=sizeof($dt_sch)-1; $i>=0 ; $i--) { ?>
            <option value="<?php echo $dt_sch[$i]['id']; ?>"><?php echo $dt_sch[$i]['date']; ?></option>
            <?php } ?>
        </select>
        <div class="input-group-append" style="margin-right:100px">
                <label class="input-group-text" for="inputGroupSelect02">Date</label>
                </div>

                <select class="custom-select" id="branch">
        <option value="All" selected>All...</option>
        <option value="RW1">RW1</option>
        <option value="RW2">RW2</option>
        <option value="RW3">RW3</option>
        <option value="RW4">RW4</option>
    </select>
    <div class="input-group-append" style="margin-right:100px">
        <label class="input-group-text" for="inputGroupSelect02">Branch</label>
    </div>
</div>
<div id="content">
    <div style="text-align:-webkit-center" id="piechart"></div>
    <div style="text-align:-webkit-center" id="piechartB"></div>
    <div style="text-align:-webkit-center" id="piechart2"></div>
    <div style="text-align:-webkit-center" id="piechart3"></div>
    <div style="text-align:-webkit-center" id="piechart6"></div>
    <div style="text-align:-webkit-center" id="piechart7"></div>
    <div style="text-align:-webkit-center" id="piechart17"></div>
    <div style="text-align:-webkit-center" id="piechart9"></div>
    <div style="text-align:-webkit-center" id="piechart10"></div>
    <div style="text-align:-webkit-center" id="piechart11"></div>
    <div style="text-align:-webkit-center" id="piechart12"></div>
    <div style="text-align:-webkit-center" id="piechart22"></div>
    <div style="text-align:-webkit-center" id="piechart14"></div>
</div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);
google.charts.setOnLoadCallback(drawChartB);
google.charts.setOnLoadCallback(drawChart2);
google.charts.setOnLoadCallback(drawChart3);
google.charts.setOnLoadCallback(drawChart6);
google.charts.setOnLoadCallback(drawChart7);
google.charts.setOnLoadCallback(drawChart9);
google.charts.setOnLoadCallback(drawChart10);
google.charts.setOnLoadCallback(drawChart11);
google.charts.setOnLoadCallback(drawChart17);
google.charts.setOnLoadCallback(drawChart12);
google.charts.setOnLoadCallback(drawChart14);
google.charts.setOnLoadCallback(drawChart22);

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
        ['Web Development', <?php echo $q1_7; ?>],
        ['Game Development', <?php echo $q1_8; ?>],
        ['Front-end Development', <?php echo $q1_9; ?>],
        ['Flutter Development', <?php echo $q1_10; ?>]

    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': '1. Where do you want to go in the field from the GIM 10 field to the master',
        // 'width': 550,
        'height': 400
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
}

function drawChart22() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Game Design', <?php echo $q22_1; ?>],
        ['Front-end Design', <?php echo $q22_2; ?>],
        ['Graphics', <?php echo $q22_3; ?>],
        ['Animation', <?php echo $q22_4; ?>],
        ['Android Development', <?php echo $q22_5; ?>],
        ['IOS Development', <?php echo $q22_6; ?>],
        ['Web Development', <?php echo $q22_7; ?>],
        ['Game Development', <?php echo $q22_8; ?>],
        ['Front-end Development', <?php echo $q22_9; ?>],
        ['Flutter Development', <?php echo $q22_10; ?>]

    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': '13. If for some reason you cannot proceed to the field selected above, which other field should you select?',
        // 'width': 550,
        'height': 400
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart22'));
    chart.draw(data, options);
}


function drawChart2() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Yes', <?php echo $q2_1; ?>],
        ['NO', <?php echo $q2_2; ?>]

    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': '2. Does GIM Course Benefit?',
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
        ['Yes', <?php echo $q3_1; ?>],
        ['NO', <?php echo $q3_2; ?>]

    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': '3. Do you read the news daily?',
        // 'width': 550,
        'height': 400
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
    chart.draw(data, options);
}

function drawChart6() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Yes', <?php echo $q6_1; ?>],
        ['NO', <?php echo $q6_2; ?>]

    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': '6. Like to Participate in RNWs Activities?',
        // 'width': 550,
        'height': 400
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart6'));
    chart.draw(data, options);
}

function drawChart12() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Yes', <?php echo $q12_1; ?>],
        ['NO', <?php echo $q12_2; ?>]

    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': '12. Do you like leadership?',
        // 'width': 550,
        'height': 400
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart12'));
    chart.draw(data, options);
}


function drawChart14() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Yes', <?php echo $q14_1; ?>],
        ['NO', <?php echo $q14_2; ?>]

    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': '14. What would you do if you were offered a job in an ongoing course?',
        // 'width': 550,
        'height': 400
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart14'));
    chart.draw(data, options);
}


function drawChart17() {
    var data1 = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['C Language', <?php echo $q17_1; ?>],
        ['PhotoShop', <?php echo $q17_2; ?>],
        ['Animate', <?php echo $q17_3; ?>],
        ['Drawing', <?php echo $q17_4; ?>]

    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': '8. According to the weekly 5-day schedule of the GIM course, which day do you like to work?',
        // 'width': 550,
        'height': 400
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart1 = new google.visualization.PieChart(document.getElementById('piechart17'));
    chart1.draw(data1, options);
}

function drawChartB() {
    var data1 = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['મારી આવડત સૌથી વધારે તે field માં છે.', <?php echo $qb_1; ?>],
        ['મારો ઇન્ટરેસ્ટ તે field માં છે.', <?php echo $qb_2; ?>],
        ['મને આ field માં પ્રોત્સાહિત કરવામાં આવેલ છે.', <?php echo $qb_3; ?>],
        ['મારુ સ્વપન છે.', <?php echo $qb_4; ?>],
        ['મારા classmate આ field માં જતા હોવાથી.', <?php echo $qb_5; ?>],
        ['Other', <?php echo $qb_6; ?>]

    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': 'Why?',
        // 'width': 550,
        'height': 400
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart1 = new google.visualization.PieChart(document.getElementById('piechartB'));
    chart1.draw(data1, options);
}

function drawChart7() {
    var data1 = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Employee', <?php echo $q7_1; ?>],
        ['HR', <?php echo $q7_2; ?>],
        ['CEO', <?php echo $q7_3; ?>],
        ['Manager', <?php echo $q7_4; ?>],
        ['Communicator', <?php echo $q7_5; ?>],
        ['Team Leader', <?php echo $q7_6; ?>]

    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': '7. What do you want to be in the next 3 years?',
        // 'width': 550,
        'height': 400
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart1 = new google.visualization.PieChart(document.getElementById('piechart7'));
    chart1.draw(data1, options);
}

function drawChart9() {
    var data1 = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Strongly Agree', <?php echo $q9_1; ?>],
        ['Agree', <?php echo $q9_2; ?>],
        ['Somewhat agree or disagree', <?php echo $q9_3; ?>],
        ['Disagree', <?php echo $q9_4; ?>]

    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': '9. Do you like being alone?',
        // 'width': 550,
        'height': 400
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart1 = new google.visualization.PieChart(document.getElementById('piechart9'));
    chart1.draw(data1, options);
}

function drawChart10() {
    var data1 = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Strongly Agree', <?php echo $q10_1; ?>],
        ['Agree', <?php echo $q10_2; ?>],
        ['Somewhat agree or disagree', <?php echo $q10_3; ?>],
        ['Disagree', <?php echo $q10_4; ?>]

    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': '10. When I look back at my life, I see only my failures.',
        // 'width': 550,
        'height': 400
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart1 = new google.visualization.PieChart(document.getElementById('piechart10'));
    chart1.draw(data1, options);
}

function drawChart11() {
    var data1 = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Strongly Agree', <?php echo $q11_1; ?>],
        ['Agree', <?php echo $q11_2; ?>],
        ['Somewhat agree or disagree', <?php echo $q11_3; ?>],
        ['Disagree', <?php echo $q11_4; ?>]

    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': '11. I am frequently disappointed in my friends/co-workers.',
        // 'width': 550,
        'height': 400
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart1 = new google.visualization.PieChart(document.getElementById('piechart11'));
    chart1.draw(data1, options);
}
</script>

<script type="text/javascript">
$(document).ready(function() {
    /* PREPARE THE SCRIPT */
    $("#branch").change(function() {
        /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
        var branch = $(this).val(); /* GET THE VALUE OF THE SELECTED DATA */
        var dataString = "branch=" + branch; /* STORE THAT TO A DATA STRING */

        var value2 = document.getElementById('schedule').value;

        $.ajax({
            url: "ajax_piq_chart.php",
            type: "Post",
            data: {
                'schedule_id': value2,
                'branch': branch
            },
            success: function(data) {
                // alert("Hello");
                $('#content').html(data);
            }
        })

    });

    $("#schedule").change(function() {
        var value = $(this).val();
        // alert(value);

        var value1 = document.getElementById('branch').value;
        

        $.ajax({
            url: "ajax_piq_chart.php",
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
</script>
<?php include('footer.php'); ?>