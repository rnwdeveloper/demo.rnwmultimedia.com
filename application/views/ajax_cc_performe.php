

        <?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Counselor ") { ?>
        <div id="cc_per">
    
    <div class="col-md-8">

            <div class="chart-box">
              
     
      <div class="row">
       <div class="col-md-3">
          
               <select class="form-control" id="cc_performe">
                    <option value="">Time Selection</option>
                    <option value="6">Current month</option>
                    <?php
                      foreach ($untakegraph_all as $untak)
                       {
                         echo '<option value="'.$untak->id.'">'.$untak->name.'</option>';
                      }
                     ?>                     
            </select>
        </div>
      <form method="post" id="frm_cc">
            <div class="col-md-3">
          
             <div class=form-group>
                  <div class="input-group date" data-provide="datepicker">
                    <input class="form-control" id="data" name="sdata" placeholder="YY/MM/DD" type="text" />

                    <div class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                  </div>
                </div>
        </div>
         <div class="col-md-3">
          
             <div class=form-group>
                  <div class="input-group date" data-provide="datepicker">
                    <input class="form-control" id="data" name="edata" placeholder="YY/MM/DD" type="text" />

                    <div class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                  </div>
                </div>
        </div>
        <div class="col-md-3">
              <button type="button" id="search_cc" class="btn btn-success">
                    search
              </button>
        </div>
        </form>
      </div>
             

            <div class="untaken-box-wrap" >
              <div class="table-responsive">
             <div id="top_x_div" style="height: 300px;"></div>
             </div> 
            </div>

        </div>
</div>

      
    <?php } ?>


<script type="text/javascript">
  
  $(document).ready(function(){
      $('#cc_performe').change(function(){

     var donekey = $(this).val();
  //alert(donekey);

      $.ajax({
          url:"Welcome/cc_graph",
          type:'POST',
          data:
          {
            'k':donekey,
          },
          success:function(res){
              $('#cc_per').html(res);
          }
      });
  });
  });


</script>


<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'Percentage'],
          <?php foreach($user_all_couseller as $val) { 
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
              ?>
             
          ["<?php echo $val->name; ?>", <?php echo $ress; ?>],
          <?php } ?>
         
        ]);

        var options = {
          width: 900,
          legend: { position: 'none' },
          chart: {
            title: 'Counselor wise Demo performance',
            subtitle: '' },
          axes: {
            x: {
              0: { side: 'top', label: ''} // Top x-axis.
            }
          },
          bar: { groupWidth: "25%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>


<script type="text/javascript">
  
  $(document).ready(function(){
      $('#search_cc').click(function(){

     var s = $('input[name=sdata]').val();
     var e = $('input[name=edata]').val();
   
   

      $.ajax({
          url:"Welcome/cc_graph",
          type:'POST',
          data:{
            k:'10',
            sdate:s,
            edate:e
          },
          success:function(res){
              $('#cc_per').html(res);
          }
      });
  });
  });


</script>