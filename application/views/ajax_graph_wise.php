<div class="chart-box">
                <div class="mbarchar">
                     <select class="form-control" id="calendar123">
                    <option value="">Time Selection</option>
                    <?php
                      foreach ($grafwiseday_all as $row)
                       {
                         echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                      }
                     ?>                     
                     </select>
                    <div id="columnchart_material" style="width:100%;height: 300px; position: relative; margin: 0 auto " id="result"></div>
                    <h3 id="tota_d">Total Demo :<span id="mt_demo"></span></h3><br>
                </div>
                         
            </div>

<?php 
     $duration = "Current Month";
        $ttt=0; $takedemo=0; $ddd=0; $lll=0;  $ccc=0; $rrr=0; $conf=0;  
        // echo "<pre>";
        // print_r($all_d);
        // die();
        foreach($all_d as $val) 
        {
             if($val->discard=="0") {  
                 
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
            
        } 
     }
  
    ?>
     <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['        ','Take Demo','Cancel Demo','Leave Demo','Done Demo','Confusion Demo','Running Demo'],
         
          ['<?php echo $duration; ?>', <?php echo $takedemo;?>,<?php echo $ccc;?>,<?php echo $lll;?>,<?php echo $ddd;?>,<?php echo $conf;?>,<?php echo $rrr;?>]
        ]);
  
        var options = {
          chart: {
            title: ' ',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
         $("#mt_demo").html(<?php echo $ttt?>);
      }
    </script>

<script type="text/javascript">
  
  $(document).ready(function(){
      $('#calendar123').change(function(){

     var key = $(this).val();
   
    
   // alert(lastWeek);

      $.ajax({
          url:"Welcome/search_graph",
          type:'POST',
          data:
          {
            'k1':key
          },
          success:function(res){
              $('#graph_wise_chart').html(res);
          }
      });
  });
  });


</script>
