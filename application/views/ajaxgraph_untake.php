<?php
        $tpall = 0;
         $untaken=0;
         $taall=0;
         $key=0;
         // echo "<pre>";
         // print_r($curent_month_all);
         // die;
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
       
        $allData = $key+1;

        $untackData = $untaken + $taall;
 



        //print_r(100*1767/4969);

      // print_r($key+1); //4969
      //print_r($untaken+$taall); //1767
      //print_r($untaken); //1712
      //print_r($taall); //55
      //die;

        ?>

    <div class="col-md-4"> 
            <div class="chart-box chart-box-min ">
              <select class="form-control" id="untakdemo">
                    <option value="">Time Selection</option>
                    <?php
                      foreach ($untakegraph_all as $untak)
                       {
                         echo '<option value="'.$untak->id.'">'.$untak->name.'</option>';
                      }
                     ?>                     
            </select>
            <div class="untaken-box-wrap">
              <h4>Untaken Demo</h4>
              <div class="untake"><?php echo (round(100*$untackData/$allData)); ?>%</div>
                  <h3>Total Demo :<span><?php echo  $allData; ?></span></h3>
              </div> 
            </div>
        </div>

        <script type="text/javascript">
  
  $(document).ready(function(){
      $('#untakdemo').change(function(){

     var untkey = $(this).val();
  //alert(untkey);

      $.ajax({
        
          url:"Welcome/untake_graph",
          type:'POST',
          data:
          {
            'k2':untkey,
          },
          success:function(res){
              $('#untakegraph_wise_chart').html(res);
          }
      });
  });
  });


</script>