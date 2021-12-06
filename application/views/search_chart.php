 <?php if(!empty($msg))  { ?>
 <script>  alert("This Date Attendance already marked"); </script>
 <?php } ?>

 <?php 

        @$user_permission =  explode(",",@$_SESSION['user_permission']);
        @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);
        
        if($_SESSION['logtype']=="Faculty" || $_SESSION['logtype']=="hod")
        {
            @$faculty_course_ids = explode(",",$_SESSION['course_ids']);
            @$faculty_package_ids = explode(",",$_SESSION['package_ids']);
            @$hod_faculty_ids  = explode(",", $_SESSION['faculty_id']);
        }

     $bttll = 0;   
     $bttpp=0;
     $bttaa=0;
     $bttpend =0;
     $bldata =0;
     $bcdemo =0;
        
      if(isset($curent_month_all))
     {
     foreach($curent_month_all as $val) { if($val->discard=="0") { 
         if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin" || $_SESSION['logtype']=="Admin") {

          
                        
            // if($val->demoStatus=="0") 
            // {
            //     $ldata++;
            // }
                $date = date("Y-m-d");
                //if(strcmp($date, date('Y-m-d',strtotime($val->addDate))) == 0)
                   // {
                        $all_att = explode("&&",$val->attendance);
                        $bttll++;
                    if($val->demoStatus=="0"){
                     
                    for($i=0;$i<sizeof($all_att);$i++)
                    {
                        $att = explode("/",$all_att[$i]);
                        //  echo "<pre>";
                        // print_r($att);
                        // die;
                        if($date==$att[0])
                        {
                            if($att[1]=="P")
                            {
                                 $bttpp++;                      
                            }
                            else if($att[1]=="A")
                            {
                                $bttaa++;
                                
                            }

                        }
                         else if(strpos($val->attendance,$date) == false){
                         $bttpend++;        
                    }        
                         
                    }
                }
                else if($val->demoStatus){
                     $bldata++;
                }

                else if($val->demoStatus){
                    $bcdata++;
                }

                      
         //}
     }

      }
     } 
 }
 // echo $bttpp;
 // die;











        
     $ttll = 0;   
     $ttpp=0;
     $ttaa=0;
     $ttpend =0;
     $ldata =0;
     $cdemo =0;
             
    // echo "<pre>";            
    // print_r($demo_all);
    // die;
        if(isset($demo_all))

            // echo '<pre>';
            // print_r($aaa_data);
            // die();
     {
     foreach($demo_all as $val) { if($val->discard=="0") { 
         if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin" || $_SESSION['logtype']=="Admin") {

            // if($val->demoStatus=="0") 
            // {
            //     $ldata++;
            // }
              
                $date =  "2020-03-19"; 
                if(strcmp($date, date('Y-m-d',strtotime($val->addDate))) == 0)
                    {
                        $all_att = explode("&&",$val->attendance);
                        $ttll++;
                    if($val->demoStatus=="0"){
                     
                    for($i=0;$i<sizeof($all_att);$i++)
                    {
                        $att = explode("/",$all_att[$i]);

                        if($date==$att[0])
                        {
                            if($att[1]=="P")
                            {
                                 $ttpp++;                      
                            }
                            else if($att[1]=="A")
                            {
                                $ttaa++;
                                
                            }

                        }
                         else if(strpos($val->attendance,$date) == false){
                         $ttpend++;        
                    }        
                         
                    }
                }
                else if($val->demoStatus){
                     $ldata++;
                }

                else if($val->demoStatus){
                    $cdata++;
                }

                      
         }
     }

      }
     } 
 }


       // die;

         $tpall = 0;
         $untaken=0;
         $taall=0;
         $key=0;

         if(isset($curent_month_all))
         {
        foreach ($curent_month_all as $key => $value) {

           $all_att = explode("&&",$value->attendance);
          
             for($i=0;$i<sizeof($all_att);$i++)
                    {

                        $att = explode("/",$all_att[$i]);
                          if(isset($att[1]))
                          {
                            // print_r($att[1]);

                            if($att[1]=="P")
                            {
                                 $tpall++;
                                  break;                                                      
                            }
                            else
                            {
                              $untaken++;
                               break; 
                            }
                          }
                          else
                          {
                            $taall++;
                          }
 
                    }

          # code...
        }

        }       
        //print_r(100*1767/4969);
           $allData = $key+1;
           $untackData = $untaken + $taall;

                    
            //print_r(100*4/6);
       //print_r($key+1;); //4969
      //print_r($untaken+$taall); //1767
      //print_r($untaken); //1712
      //print_r($taall); //55
     // die;


                $allrun = 0;
                $all_today_new = 0;
                $all_new_ab =0;
                $all_old_ab=0;
                $all_new_pr =0;
                $all_old_pr=0;
                $all_new_done=0;
                $all_old_done=0;
                $all_new_leave=0;
                $all_old_leave=0;
                $all_new_cancel=0;
                $all_old_cancel=0;
                $all_new_confus=0;
                $all_old_confus=0;
                $jall=0;
                $pall=0;
                $nall =0;
                //$takedemo=0;
                //$currentDate = date('Y-m-d');
                if(isset($demo_all)){
             foreach($demo_all as $val) {
                // echo '<pre>';
                // print_r($aaa_data);
                // die();
                 $currentDate = "2020-03-19";
                        if($val->discard=="0") {
                             
                       if($val->demoStatus=="0") { $allrun++;  }
                       if($currentDate==$val->demoDate) 
                       { 
                        //      echo "<pre>";
                        // print_r($val);
                       
                       $jall++;
                                        
                                        $all_today_new++; 
                                        $all_att_main=array();
                                        if($val->demoStatus=="0") {
                                            $all_att = explode("&&",$val->attendance);
                                              
                                            for($i=0;$i<sizeof($all_att);$i++)
                                            {
                                                $att = explode("/",$all_att[$i]);
                                                
                                                if($att[0] == "2020-03-19")
                                                {
                                                       
                                                    
                                                    
                                                    if(date('H:i:s a')  > date('H:i:s a',strtotime($val->fromTime)))
                                                    {
                                                      
                                                                if(@$att[1]=="A")
                                                                {
                                                                    $all_new_ab++;
                                                                    break;
                                                                   
                                                                }
                                                                else if(@$att[1]=="P")
                                                                {
                                                                    $all_new_pr++;  
                                                                    break;
                                                                }
                                                                else
                                                                {
                                                                    $nall++;
                                                                    break;
                                                                }

                                                    }
                                                    else
                                                    {
                                                       // echo "none";
                                                        $pall++;
                                                        break;
                                                    }
                                                }
                                                else
                                                {
                                                    $pall++;
                                                 break;
                                                }
                                                

                                            }


                                        }
                                         if($val->demoStatus=="1") { $all_new_done++;  }
                                        if($val->demoStatus=="2") { $all_new_leave++;  }
                                         if($val->demoStatus=="3") { $all_new_cancel++;  }
                                         if($val->demoStatus=="4") { $all_new_confus++; }
                           
                       }
                       else
                       {
                                
                               
                                    if($val->demoStatus=="0") {
                                            $all_att = explode("&&",$val->attendance);
                                            for($i=0;$i<sizeof($all_att);$i++)
                                            {
                                                $att = explode("/",$all_att[$i]);
                                                if($currentDate==$att[0])
                                                {
                                                    if(@$att[1]=="A")
                                                    {
                                                        $all_old_ab++;  
                                                        break;
                                                    }
                                                    if(@$att[1]=="P")
                                                    {
                                                        $all_old_pr++;  
                                                        break;
                                                    }
                                                }
                                            }

                                        } 

                                        if($val->demoStatus=="1" && $val->statusChangeDate==$currentDate) { $all_old_done++;  }
                                        if($val->demoStatus=="2" && $val->statusChangeDate==$currentDate) { $all_old_leave++;  }
                                        if($val->demoStatus=="3" && $val->statusChangeDate==$currentDate) { $all_old_cancel++;  }
                                        if($val->demoStatus=="4" && $val->statusChangeDate
                                          ==$currentDate) {$all_old_confus++; }                                              
                       }

                   }

       }

     }
                                    
?>

<div class="container-fluid" id="demo_all_search">
			<div class="row">
				
					<div class="col-lg-4 col-md-12 mx-auto">
                        <div class="graph_box_block">
                          <div id="chartdiv"></div>
                          <span class="total_demo_count">Total Demo : <span id="mt_demo123"></span></span>
                        </div>
                      </div>

                       <div class="col-lg-4 col-md-12">
                        <div class="graph_box_block" >
                          <div id="chartdiv123"></div>
                          <span class="total_demo_count">T:<span id="pi_demo123"></span></span>
                        </div>
                      </div>


                       <div class="col-lg-4 col-md-12 mx-auto">
                        <div class="graph_box_block">
                          <div id="chartdivtest_first_demo"></div>
                          <span class="total_demo_count">Total Demo(Current Day) : <span id="jall"></span></span>
                        </div>
                      </div>

				
			</div>

			<div class="row">

                    <div class="col-lg-12 col-md-12 mx-auto">
                        <div class="graph_box_block">
                          <div id="useractive"></div>
                        </div>
                      </div>
                </div>


			 <div class="row">

                    <div class="col-lg-12 col-md-12 mx-auto">
                        <div class="graph_box_block">
                          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                           <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                        </div>
                      </div>
                </div>


                 <div class="row">

                    <div class="col-lg-12 col-md-12 mx-auto">
                        <div class="graph_box_block">
                          <div id="attendance_demo"></div>
                        </div>
                      </div>
                </div>


                <div class="row">

                    <div class="col-lg-12 col-md-12 mx-auto">
                        <div class="graph_box_block">
                          <div id="counperfome"></div>
                        </div>
                      </div>
                </div>


                 <div class="row">

                    <div class="col-lg-12 col-md-12 mx-auto">
                        <div class="graph_box_block">
                          <div id="usertimeact"></div>
                        </div>
                      </div>
                </div>

		</div>



    


<script>

  //demo chart hide 
       <?php 
     $duration = "Current Month";
        $ttt=0; $takedemo=0; $ddd=0; $lll=0;  $ccc=0; $rrr=0; $conf=0;  
        // echo "<pre>";
        // print_r($all_d);
        // die();
        if(isset($all_d)){
        foreach($all_d as $val) 
        {
             //if($val->discard=="0") {  
              if(in_array($val->branch_id,$branch_ids) && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Admin") {
                 
                $ttt++;
                if($val->demoStatus=="0")
                {
                    $rrr++;
                }
                if($val->demoStatus=="1")
                {
                    $ddd++;
                }
                if($val->demoStatus=="2")
                {
                    $lll++;
                }
                if($val->demoStatus=="3")
                {
                    $ccc++;
                }
                 if($val->demoStatus=="4")
                {
                    $conf++;
                }

                 if($val->attendance!="")
                 {
                $day1=0;
               $all_att = explode("&&",$val->attendance);
                                                  
               for($i=0;$i<sizeof($all_att);$i++)
               {
                 $att = explode("/",$all_att[$i]);
                if(@$att[1]=="P")
                {
                     $day1++;  
                }
              }
              if($day1!=0)
              {
                            $takedemo++;
              }
                }
            
        //}
         }
     }
   }
  
    ?>
window.onload = function () {

//Better to construct options first and then pass it as a parameter
var options = {
  title: {
    //text: "Demo"              
  },
  data: [              
  {
    // Change type to "doughnut", "line", "splineArea", etc.
    type: "column",
    dataPoints: [
      { label: "Total",  y: <?php echo $ttt; ?>  },
      { label: "Cancle", y: <?php echo $ccc ; ?>  },
      { label: "Leave", y: <?php echo $lll; ?>  },
      { label: "Done",  y: <?php echo $ddd; ?>  },
      { label: "Running",  y: <?php echo $rrr; ?>  },
      { label: "Confusion",  y: <?php echo $conf; ?> }
    ]
  }
  ]
};

$("#chartContainer").CanvasJSChart(options);
$("#mt_demo").html(<?php echo $ttt?>);
}
</script><script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>



<!-- All demo first chart -->

<style>
#chartdiv {
  width: 100%;
  height: 450px;
}
</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>


<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);
chart.scrollbarX = new am4core.Scrollbar();

// Add data
chart.data = [{
  "country": "Total",
  "visits":<?php echo $ttt; ?>
}, {
  "country": "Cancle",
  "visits": <?php echo $ccc ; ?>
}, {
  "country": "Leave",
  "visits": <?php echo $lll; ?>
}, {
  "country": "Done",
  "visits": <?php echo $ddd; ?>
},  {
  "country": "Running",
  "visits": <?php echo $rrr; ?>
},
 {
  "country": "Confusion",
  "visits": <?php echo $conf; ?> 
}];
$("#mt_demo123").html(<?php echo $ttt?>);

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;
categoryAxis.renderer.labels.template.horizontalCenter = "right";
categoryAxis.renderer.labels.template.verticalCenter = "middle";
categoryAxis.renderer.labels.template.rotation = 270;
categoryAxis.tooltip.disabled = true;
categoryAxis.renderer.minHeight = 110;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.minWidth = 50;

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.sequencedInterpolation = true;
series.dataFields.valueY = "visits";
series.dataFields.categoryX = "country";
series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
series.columns.template.strokeWidth = 0;

series.tooltip.pointerOrientation = "vertical";

series.columns.template.column.cornerRadiusTopLeft = 10;
series.columns.template.column.cornerRadiusTopRight = 10;
series.columns.template.column.fillOpacity = 0.8;

// on hover, make corner radiuses bigger
var hoverState = series.columns.template.column.states.create("hover");
hoverState.properties.cornerRadiusTopLeft = 0;
hoverState.properties.cornerRadiusTopRight = 0;
hoverState.properties.fillOpacity = 1;

series.columns.template.adapter.add("fill", function(fill, target) {
  return chart.colors.getIndex(target.dataItem.index);
});

// Cursor
chart.cursor = new am4charts.XYCursor();

}); // end am4core.ready()
</script>




<!-- second chart --> 


<style>
#chartdiv2 {
  width: 100%;
  height: 450px;
}
</style>

<script src="https://www.amcharts.com/lib/4/themes/material.js"></script>
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_material);
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv2", am4charts.PieChart);

// Add data
chart.data = [ {
  "country": "Total",
  "litres": 501.9
}, {
  "country": "untaken",
  "litres": 301.9
}, {
  "country": "taken",
  "litres": 201.1
},  ];

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeWidth = 2;
pieSeries.slices.template.strokeOpacity = 1;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;

}); // end am4core.ready()
</script>







<!-- second pie chart untacken -->
<style>
#chartdiv123 {
  width: 100%;
  height: 450px;
}
</style>
<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv123", am4charts.PieChart);

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";

// Let's cut a hole in our Pie chart the size of 30% the radius
chart.innerRadius = am4core.percent(30);

// Put a thick white border around each Slice
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeWidth = 2;
pieSeries.slices.template.strokeOpacity = 1;
pieSeries.slices.template
  // change the cursor on hover to make it apparent the object can be interacted with
  .cursorOverStyle = [
    {
      "property": "cursor",
      "value": "pointer"
    }
  ];

pieSeries.alignLabels = false;
pieSeries.labels.template.bent = true;
pieSeries.labels.template.radius = 3;
pieSeries.labels.template.padding(0,0,0,0);

pieSeries.ticks.template.disabled = true;

// Create a base filter effect (as if it's not there) for the hover to return to
var shadow = pieSeries.slices.template.filters.push(new am4core.DropShadowFilter);
shadow.opacity = 0;

// Create hover state
var hoverState = pieSeries.slices.template.states.getKey("hover"); // normally we have to create the hover state, in this case it already exists

// Slightly shift the shadow and make it more prominent on hover
var hoverShadow = hoverState.filters.push(new am4core.DropShadowFilter);
hoverShadow.opacity = 0.7;
hoverShadow.blur = 5;

// Add a legend
chart.legend = new am4charts.Legend();

chart.data = [{
  "country": "UnTaken",
  "litres": <?php echo $ttt-$takedemo; ?>
}, {
  "country": "Taken",
  "litres": <?php echo $takedemo; ?>
}];

$("#pi_demo123").html(<?php echo $ttt?>);
}); // end am4core.ready()
</script>









<!-- attendance report -->
<style>
#attendance_div {
  width: 100%;
  height: 450px;
}
</style>
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_material);
am4core.useTheme(am4themes_animated);
// Themes end




var chart = am4core.create('attendance_div', am4charts.XYChart)
chart.colors.step = 2;

chart.legend = new am4charts.Legend()
chart.legend.position = 'top'
chart.legend.paddingBottom = 20
chart.legend.labels.template.maxWidth = 95

var xAxis = chart.xAxes.push(new am4charts.CategoryAxis())
xAxis.dataFields.category = 'category'
xAxis.renderer.cellStartLocation = 0.1
xAxis.renderer.cellEndLocation = 0.9
xAxis.renderer.grid.template.location = 0;

var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
yAxis.min = 0;

function createSeries(value, name) {
    var series = chart.series.push(new am4charts.ColumnSeries())
    series.dataFields.valueY = value
    series.dataFields.categoryX = 'category'
    series.name = name

    series.events.on("hidden", arrangeColumns);
    series.events.on("shown", arrangeColumns);

    var bullet = series.bullets.push(new am4charts.LabelBullet())
    bullet.interactionsEnabled = false
    bullet.dy = 30;
    bullet.label.text = '{valueY}'
    bullet.label.fill = am4core.color('#ffffff')

    return series;
}

chart.data = [
    {
        category: 'Place #1',
        first: 40,
        second: 55,
        third: 60,
        fourth:30
    },
    {
        category: 'Place #2',
        first: 30,
        second: 78,
        third: 69,
        fourth:60
    },
    {
        category: 'Place #3',
        first: 27,
        second: 40,
        third: 45,
        fourth:90
    },
    {
        category: 'Place #4',
        first: 50,
        second: 33,
        third: 22,
        fourth:45
    }
]


createSeries('first', 'Present');
createSeries('second', 'Apsent');
createSeries('third', 'Leave');
createSeries('fourth', 'Done');

function arrangeColumns() {

    var series = chart.series.getIndex(0);

    var w = 1 - xAxis.renderer.cellStartLocation - (1 - xAxis.renderer.cellEndLocation);
    if (series.dataItems.length > 1) {
        var x0 = xAxis.getX(series.dataItems.getIndex(0), "categoryX");
        var x1 = xAxis.getX(series.dataItems.getIndex(1), "categoryX");
        var delta = ((x1 - x0) / chart.series.length) * w;
        if (am4core.isNumber(delta)) {
            var middle = chart.series.length / 2;

            var newIndex = 0;
            chart.series.each(function(series) {
                if (!series.isHidden && !series.isHiding) {
                    series.dummyData = newIndex;
                    newIndex++;
                }
                else {
                    series.dummyData = chart.series.indexOf(series);
                }
            })
            var visibleCount = newIndex;
            var newMiddle = visibleCount / 2;

            chart.series.each(function(series) {
                var trueIndex = chart.series.indexOf(series);
                var newIndex = series.dummyData;

                var dx = (newIndex - trueIndex + middle - newMiddle) * delta

                series.animate({ property: "dx", to: dx }, series.interpolationDuration, series.interpolationEasing);
                series.bulletsContainer.animate({ property: "dx", to: dx }, series.interpolationDuration, series.interpolationEasing);
            })
        }
    }
}

}); // end am4core.ready()
</script>



















<style>
#chartdivtest {
  width: 100%;
  height: 450px;
}

</style>



<script src="https://www.amcharts.com/lib/4/themes/frozen.js"></script>
<!-- testing chart -->

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_frozen);
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdivtest", am4charts.PieChart);

// Add data
chart.data = [ {
  "country": "Pending",
  "litres": <?php echo $allrun; ?>
}, {
  "country": "Absent",
  "litres": <?php echo $all_old_ab; ?>
}, {
  "country": "leave",
  "litres": <?php echo $all_old_leave; ?>
}, {
  "country": "Present",
  "litres": <?php echo $all_old_pr; ?>
}, {
  "country": "Done",
  "litres": <?php echo $all_old_done; ?>
}, {
  "country": "Cancel",
  "litres": <?php echo $all_old_cancel; ?>
}, {
  "country": "Confusion",
  "litres": <?php echo $all_old_confus; ?>
}
];

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";  
pieSeries.dataFields.category = "country";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeOpacity = 1;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;

chart.hiddenState.properties.radius = am4core.percent(0);


}); // end am4core.ready()
</script>




<style>
#chartdivtest_first_demo {
  width: 100%;
  height: 450px;
}

</style>



<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_frozen);
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdivtest_first_demo", am4charts.PieChart);

// Add data
chart.data = [ {
  "country": "Pending",
  "litres": <?php echo $pall; ?>
}, {
  "country": "Absent",
  "litres": <?php echo $all_new_ab; ?>
}, {
  "country": "leave",
  "litres": <?php echo $all_new_leave; ?>
}, {
  "country": "Present",
  "litres": <?php echo $all_new_pr; ?>
}, {
  "country": "Done",
  "litres": <?php echo $all_new_cancel; ?>
}, {
  "country": "Cancel",
  "litres": <?php echo $all_new_done; ?>
}, {
  "country": "Confusion",
  "litres": <?php echo $all_new_confus; ?>
},{
  "country": "Not Follow",
  "litres": <?php echo $nall; ?>
}
];
$("#jall").html(<?php echo $jall?>);

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";  
pieSeries.dataFields.category = "country";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeOpacity = 1;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;

chart.hiddenState.properties.radius = am4core.percent(0);


}); // end am4core.ready()
</script>



<!-- counsalor demo report  -->
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: ""
  },
  legend:{
    cursor: "pointer",
    verticalAlign: "center",
    horizontalAlign: "right",
    itemclick: toggleDataSeries
  },
  data: [{
    type: "column",
    name: "Take Demo",
    indexLabel: "{y}",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($taken_cc_demo, JSON_NUMERIC_CHECK); ?>
  },
  {
    type: "column",
    name: "Done Demo",
    indexLabel: "{y}%",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($done_cc_demo, JSON_NUMERIC_CHECK); ?>
  },
  {
    type: "column",
    name: "Cancel Demo",
    indexLabel: "{y}%",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($cancle_cc_demo, JSON_NUMERIC_CHECK); ?>
  },
   {
    type: "column",
    name: "Running Demo",
    indexLabel: "{y}%",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($running_cc_demo, JSON_NUMERIC_CHECK); ?>
  },
  {
    type: "column",
    name: "Confusion Demo",
    indexLabel: "{y}%",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($confusion_cc_demo, JSON_NUMERIC_CHECK); ?>
  },
  {
    type: "column",
    name: "Leave Demo",
    indexLabel: "{y}%",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($leave_cc_demo, JSON_NUMERIC_CHECK); ?>
  },
  {

    dataPoints: <?php echo json_encode($taken_name_demo, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
function toggleDataSeries(e){
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
  }
  else{
    e.dataSeries.visible = true;
  }
  chart.render();
}
 
}
</script>




<!-- counsalor performance report -->
<style>
#counperfome {
  width: 100%;
  height: 500px;
}

</style>

<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

/**
 * Chart design taken from Samsung health app
 */

var chart = am4core.create("counperfome", am4charts.XYChart);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.paddingBottom = 30;

chart.data = [
 <?php foreach($user_all_couseller as $k=>$val) { 
              $demo_res1=0;  $ttttt=0;  $ddddd=0;
              foreach($demo_all_counselor as $row) {
                   if($row->discard=="0") {
                       if($val->name==$row->addBy) {
                             
                           
                            if($row->demoStatus=="1")
                            {
                                $ttttt++;
                            }
                            if($row->demoStatus=="3" && $row->attendance!="")
                            {
                                    $day=0;
                          $all_att = explode("&&",$row->attendance);
                          
                          for($i=0;$i<sizeof($all_att);$i++)
                          {
                            $att = explode("/",$all_att[$i]);
                            if(@$att[1]=="P")
                            {
                              $day++; 
                            }
                          }
                          if($day!=0)
                          {
                                        $ttttt++;
                          }
                            }
                            if($row->demoStatus=="1")
                            {
                                $ddddd++;
                            }
                       }
                   }
              }
              
               $demo_res1 = $ddddd*100;
               if($demo_res1!=0)
               {
                  $ress = $demo_res1/$ttttt;
               }
               else
               {
                   $ress=0;
               }
               $ress = floor($ress);
              if(!empty($val->image)) { $img = base_url()."dist/img/$val->image"; }else{  $img = base_url()."dist/img/user2-160x160.jpg";}
               if(count($user_all_couseller)-1 != $k){
              ?>
             
{
    "name": "<?php echo $val->name; ?>",
    "steps": <?php echo $ress; ?>,
    "href": "<?php echo $img; ?>"
},
<?php }else{ ?>
{
    "name": "<?php echo $val->name; ?>",
    "steps": <?php echo $ress; ?>,
    "href": "<?php echo $img; ?>"
}
<?php } }?>
];

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "name";
categoryAxis.renderer.grid.template.strokeOpacity = 0;
categoryAxis.renderer.minGridDistance = 10;
categoryAxis.renderer.labels.template.dy = 35;
categoryAxis.renderer.tooltip.dy = 35;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.inside = true;
valueAxis.renderer.labels.template.fillOpacity = 0.3;
valueAxis.renderer.grid.template.strokeOpacity = 0;
valueAxis.min = 0;
valueAxis.cursorTooltipEnabled = false;
valueAxis.renderer.baseGrid.strokeOpacity = 0;

var series = chart.series.push(new am4charts.ColumnSeries);
series.dataFields.valueY = "steps";
series.dataFields.categoryX = "name";
series.tooltipText = "{valueY.value}%";
series.tooltip.pointerOrientation = "vertical";
series.tooltip.dy = - 6;
series.columnsContainer.zIndex = 100;

var columnTemplate = series.columns.template;
columnTemplate.width = am4core.percent(50);
columnTemplate.maxWidth = 66;
columnTemplate.column.cornerRadius(60, 60, 10, 10);
columnTemplate.strokeOpacity = 0;

series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#e5dc36"), max: am4core.color("#5faa46") });
series.mainContainer.mask = undefined;

var cursor = new am4charts.XYCursor();
chart.cursor = cursor;
cursor.lineX.disabled = true;
cursor.lineY.disabled = true;
cursor.behavior = "none";

var bullet = columnTemplate.createChild(am4charts.CircleBullet);
bullet.circle.radius = 30;
bullet.valign = "bottom";
bullet.align = "center";
bullet.isMeasured = true;
bullet.mouseEnabled = false;
bullet.verticalCenter = "bottom";
bullet.interactionsEnabled = false;

var hoverState = bullet.states.create("hover");
var outlineCircle = bullet.createChild(am4core.Circle);
outlineCircle.adapter.add("radius", function (radius, target) {
    var circleBullet = target.parent;
    return circleBullet.circle.pixelRadius + 10;
})

var image = bullet.createChild(am4core.Image);
image.width = 60;
image.height = 60;
image.horizontalCenter = "middle";
image.verticalCenter = "middle";
image.propertyFields.href = "href";

image.adapter.add("mask", function (mask, target) {
    var circleBullet = target.parent;
    return circleBullet.circle;
})

var previousBullet;
chart.cursor.events.on("cursorpositionchanged", function (event) {
    var dataItem = series.tooltipDataItem;

    if (dataItem.column) {
        var bullet = dataItem.column.children.getIndex(1);

        if (previousBullet && previousBullet != bullet) {
            previousBullet.isHover = false;
        }

        if (previousBullet != bullet) {

            var hs = bullet.states.getKey("hover");
            hs.properties.dy = -bullet.parent.pixelHeight + 30;
            bullet.isHover = true;

            previousBullet = bullet;
        }
    }
})

}); // end am4core.ready()
</script>


<style>
#attendance_demo {
  width: 100%;
  height: 800px;
}

</style>

<!-- attendane report chart -->
<!-- <script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

 // Create chart instance
var chart = am4core.create("attendance_demo", am4charts.XYChart);

// Add data
chart.data = [
<?php foreach ($attendance_demo_chart as $key => $value) { ?>
{
  "year": '<?php echo $key; ?>',
  
  "t": <?php echo $value['total']; ?>,
  "d": <?php echo $value['done_total']; ?>,
  "p": <?php echo $value['present_total']; ?>,
  "in": <?php echo $value['inregular_total']; ?>,
  "a": <?php echo $value['apsent_total']; ?>,
  "l": <?php echo $value['Leave_total']; ?>,
  "can": <?php echo $value['cancle_total']; ?>,
  "cof": <?php echo $value['confusion_total']; ?>
  
},

<?php }  ?>
];

// Create axes
var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "year";
categoryAxis.numberFormatter.numberFormat = "#";
categoryAxis.renderer.inversed = true;
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.cellStartLocation = 0.1;
categoryAxis.renderer.cellEndLocation = 0.9;

var  valueAxis = chart.xAxes.push(new am4charts.ValueAxis()); 
valueAxis.renderer.opposite = true;

// Create series
function createSeries(field, name) {
  var series = chart.series.push(new am4charts.ColumnSeries());
  series.dataFields.valueX = field;
  series.dataFields.categoryY = "year";
  series.name = name;
  series.columns.template.tooltipText = "{name}: [bold]{valueX}[/]";
  series.columns.template.height = am4core.percent(100);
  series.sequencedInterpolation = true;

  var valueLabel = series.bullets.push(new am4charts.LabelBullet());
  valueLabel.label.text = "{valueX}";
  valueLabel.label.horizontalCenter = "left";
  valueLabel.label.dx = 10;
  valueLabel.label.hideOversized = false;
  valueLabel.label.truncate = false;

  var categoryLabel = series.bullets.push(new am4charts.LabelBullet());
  categoryLabel.label.text = "{name}";
  categoryLabel.label.horizontalCenter = "right";
  categoryLabel.label.dx = -10;
  categoryLabel.label.fill = am4core.color("#fff");
  categoryLabel.label.hideOversized = false;
  categoryLabel.label.truncate = false;
}


createSeries("t", "Total");
createSeries("d", "Done");
createSeries("p", "Present");
createSeries("in", "Inregular");
createSeries("a", "Apsent");
createSeries("l", "Leave");
createSeries("can", "Cancle");
createSeries("cof", "Confusion");

}); // end am4core.ready()
</script> -->


<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("attendance_demo", am4charts.XYChart);


// Add data
chart.data = [<?php foreach ($attendance_demo_chart as $key => $value) { ?>
{
  "year": '<?php echo $key; ?>',
  
  "t": <?php echo $value['total']; ?>,
  "d": <?php echo $value['done_total']; ?>,
  "p": <?php echo $value['present_total']; ?>,
  "in": <?php echo $value['inregular_total']; ?>,
  "a": <?php echo $value['apsent_total']; ?>,
  "l": <?php echo $value['Leave_total']; ?>,
  "can": <?php echo $value['cancle_total']; ?>,
  "cof": <?php echo $value['confusion_total']; ?>
  
},

<?php }  ?>];

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "year";
categoryAxis.renderer.grid.template.location = 0;


var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.inside = true;
valueAxis.renderer.labels.template.disabled = true;
valueAxis.min = 0;

// Create series
function createSeries(field, name) {
  
  // Set up series
  var series = chart.series.push(new am4charts.ColumnSeries());
  series.name = name;
  series.dataFields.valueY = field;
  series.dataFields.categoryX = "year";
  series.sequencedInterpolation = true;
  
  // Make it stacked
  series.stacked = true;
  
  // Configure columns
  series.columns.template.width = am4core.percent(60);
  series.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:14px]{categoryX}: {valueY}";
  
  // Add label
  var labelBullet = series.bullets.push(new am4charts.LabelBullet());
  labelBullet.label.text = "{valueY}";
  labelBullet.locationY = 0.5;
  labelBullet.label.hideOversized = true;
  
  return series;
}


createSeries("t", "Total");
createSeries("d", "Done");
createSeries("p", "Present");
createSeries("in", "Inregular");
createSeries("a", "Apsent");
createSeries("l", "Leave");
createSeries("can", "Cancle");
createSeries("cof", "Confusion");

// Legend
chart.legend = new am4charts.Legend();

}); // end am4core.ready()
</script>



<!-- user activity chart -->
<style>
#useractive {
  width: 100%;
  height: 500px;
}

</style>
<!-- <script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("useractive", am4charts.XYChart);

// Add data
chart.data = [
<?php foreach ($l_data as $key => $value) {
 if(!empty($value->image)) { $img = base_url()."dist/img/$value->image"; }else{  $img = base_url()."dist/img/user2-160x160.jpg";}
 ?>
{
    "name": '<?php echo $value->created_by; ?>',
    "points": 35654,
    "color": chart.colors.next(),
    "bullet": "<?php echo $img; ?>"
},
<?php } ?>
];

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "name";
categoryAxis.renderer.grid.template.disabled = true;
categoryAxis.renderer.minGridDistance = 30;
categoryAxis.renderer.inside = true;
categoryAxis.renderer.labels.template.fill = am4core.color("#fff");
categoryAxis.renderer.labels.template.fontSize = 20;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.grid.template.strokeDasharray = "4,4";
valueAxis.renderer.labels.template.disabled = true;
valueAxis.min = 0;

// Do not crop bullets
chart.maskBullets = false;

// Remove padding
chart.paddingBottom = 0;

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "points";
series.dataFields.categoryX = "name";
series.columns.template.propertyFields.fill = "color";
series.columns.template.propertyFields.stroke = "color";
series.columns.template.column.cornerRadiusTopLeft = 15;
series.columns.template.column.cornerRadiusTopRight = 15;
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/b]";

// Add bullets
var bullet = series.bullets.push(new am4charts.Bullet());
var image = bullet.createChild(am4core.Image);
image.horizontalCenter = "middle";
image.verticalCenter = "bottom";
image.dy = 20;
image.y = am4core.percent(100);
image.propertyFields.href = "bullet";
image.tooltipText = series.columns.template.tooltipText;
image.propertyFields.fill = "color";
image.filters.push(new am4core.DropShadowFilter());

}); // end am4core.ready()
</script>
 -->

<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("useractive", am4charts.XYChart);
chart.padding(40, 40, 40, 40);

var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "network";
categoryAxis.renderer.minGridDistance = 1;
categoryAxis.renderer.inversed = true;
categoryAxis.renderer.grid.template.disabled = true;

var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
valueAxis.min = 0;

var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryY = "network";
series.dataFields.valueX = "MAU";
series.tooltipText = "{valueX.value}"
series.columns.template.strokeOpacity = 0;
series.columns.template.column.cornerRadiusBottomRight = 5;
series.columns.template.column.cornerRadiusTopRight = 5;

var labelBullet = series.bullets.push(new am4charts.LabelBullet())
labelBullet.label.horizontalCenter = "left";
labelBullet.label.dx = 10;
labelBullet.label.text = "{values.valueX.workingValue.formatNumber('#0.##')}";
labelBullet.locationX = 1;

// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function(fill, target){
  return chart.colors.getIndex(target.dataItem.index);
});

categoryAxis.sortBySeries = series;
chart.data = [
    
    <?php foreach ($l_data as $key => $value) {
 if(!empty($value->image)) { $img = base_url()."dist/img/$value->image"; }else{  $img = base_url()."dist/img/user2-160x160.jpg";}
 ?>
{
    "network": '<?php echo $value->created_by."(".$value->os.")".$value->id; ?>',
    "MAU": <?php echo $value->counter_log; ?>
},
<?php } ?>    
  ]



}); // end am4core.ready()
</script>




<!-- userractivity time wise -->
<style>
#usertimeact {
  width: 100%;
  height: 500px;
}
</style>

<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("usertimeact", am4charts.XYChart);

var data = [];
var value = 120;

var names = [
<?php foreach ($l_data as $key => $value) { ?>
"<?php echo $value->created_by." ".$value->total_time; ?>",
<?php } ?>
];

<?php foreach ($l_data as $key => $value) { ?>
  data.push({ category: names[<?php echo $key; ?>], value:<?php echo substr($value->total_time, 0,2); ?> });
<?php } ?>

chart.data = data;
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "category";
categoryAxis.renderer.minGridDistance = 15;
categoryAxis.renderer.grid.template.location = 0.5;
categoryAxis.renderer.grid.template.strokeDasharray = "1,3";
categoryAxis.renderer.labels.template.rotation = -90;
categoryAxis.renderer.labels.template.horizontalCenter = "left";
categoryAxis.renderer.labels.template.location = 0.5;

categoryAxis.renderer.labels.template.adapter.add("dx", function(dx, target) {
    return -target.maxRight / 2;
})

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.tooltip.disabled = true;
valueAxis.renderer.ticks.template.disabled = true;
valueAxis.renderer.axisFills.template.disabled = true;

var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryX = "category";
series.dataFields.valueY = "value";
series.tooltipText = "{valueY.value}";
series.sequencedInterpolation = true;
series.fillOpacity = 0;
series.strokeOpacity = 1;
series.strokeDashArray = "1,3";
series.columns.template.width = 0.01;
series.tooltip.pointerOrientation = "horizontal";

var bullet = series.bullets.create(am4charts.CircleBullet);

chart.cursor = new am4charts.XYCursor();

chart.scrollbarX = new am4core.Scrollbar();
chart.scrollbarY = new am4core.Scrollbar();


}); // end am4core.ready()
</script>

<?php include('footer_test.php'); ?>