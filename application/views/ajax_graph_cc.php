   <div id="new_cc">      

<script>
function j() {
 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "Current Month Counselor Wise Performance"
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
    indexLabel: "{y}",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($done_cc_demo, JSON_NUMERIC_CHECK); ?>
  },
  {
    type: "column",
    name: "Cancel Demo",
    indexLabel: "{y}",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($cancle_cc_demo, JSON_NUMERIC_CHECK); ?>
  },
   {
    type: "column",
    name: "Running Demo",
    indexLabel: "{y}",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($running_cc_demo, JSON_NUMERIC_CHECK); ?>
  },
  {
    type: "column",
    name: "Confusion Demo",
    indexLabel: "{y}",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($confusion_cc_demo, JSON_NUMERIC_CHECK); ?>
  },
  {
    type: "column",
    name: "Leave Demo",
    indexLabel: "{y}",
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

j();
</script>

                     <select class="form-control" id="donedemo_cc">
                    <option value="">Time Selection</option>
                    <?php

                      foreach ($user_graph_counselor as $done)
                       {
                         echo '<option value="'.$done->id.'">'.$done->name. '</option>';
                      }
                     ?>                       
                     </select> 
  
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
  
  $(document).ready(function(){
      $('#donedemo_cc').change(function(){


     var donekey = $(this).val();
  // alert(donekey);

      $.ajax({
          url:"Welcome/CounselorDone_graph_cc",
          type:'POST',
          data:
          {
            'k':donekey,
          },
          success:function(res){
              $('#new_cc').html(res);
          }
      });
  });
  });


</script>
 </div>
