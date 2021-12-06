  <div class="chart-box">
                <div class="mbarchar">
                     <select class="form-control" id="donedemo">
                    <option value="">Time Selection</option>
                    <?php

                      foreach ($user_graph_counselor as $done)
                       {
                         echo '<option value="'.$done->id.'">'.$done->name. '</option>';
                      }
                     ?>                       
                     </select> 
                     <?php 
                     $count = 0;
                     if(isset($all_couselor)){
                      foreach($all_couselor as $k=>$val) { 
                        $count = $count  + $val;
                     } }?>
                    <div id="Counselor_demo" style="width:100%;height: 300px; position: relative; margin: 0 auto " id="result"></div>
                    <h3 id="tota_d" class="d">Counselor Total Done Demo :<span id=""><?php echo $count; ?></span></h3><br>
                </div>                         
            </div>  


            <?php 
      
     $duration = "Current Month";
     $cname='';
     $arr = array();
      
        if(isset($all_couselor)){
        foreach($all_couselor as $key=>$val) 
        { 
              

        }
      // echo "<pre>";
      // print_r($arr);
      // die;
  }
   //counselor chart
    ?>


<script graf4="JavaScript">
  // Draw the pie chart for registered users year wise
  google.charts.setOnLoadCallback(yearWiseChartt);
   
  //for month wise
  function yearWiseChartt() {
 
    /* Define the chart to be drawn.*/
    var data = google.visualization.arrayToDataTable([
        ['Year', 'Users Count'],
        <?php 
        if($_SESSION['logtype']=="Counselor" || $_SESSION['logtype']!="Faculty"){
         foreach ($all_couselor as $d=>$val){
          
         echo "['".$d."',".$val."],";
         }
       }
         ?>
    ]);
    var options = {
        title: 'Done Demo Ratio_Counselor',
        is3D: true,
         backgroundColor: [
              "#DEB887",
              "#F4A460",
              "#A9A9A9",
              "#DC143C",
              
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
            ],
            borderColor: [
              "#CDA776",
              "#E39371",
              "#989898",
              "#CB252B",
              
              "#1D7A46",
              "#F4A460",
              "#CDA776",
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
            ],
    };
    /* Instantiate and draw the chart.*/
    var chart = new google.visualization.PieChart(document.getElementById('Counselor_demo'));
    chart.draw(data, options);
  }
  // for year wise

</script>

    <script type="text/javascript">
  
  $(document).ready(function(){
      $('#donedemo').change(function(){

     var donekey = $(this).val();
  //alert(untkey);

      $.ajax({
          url:"Welcome/CounselorDone_graph",
          type:'POST',
          data:
          {
            'k':donekey,
          },
          success:function(res){
              $('#donegraph_wise_chart').html(res);
          }
      });
  });
  });


</script>