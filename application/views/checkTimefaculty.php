<div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Check Time </h4>
         </div>
         <div class="modal-body">
            <?php if(isset($checkTime)){$checkTime = explode("|&|",$select_faculty->checkTime);} ?>
            <table class="table">
               <thead>
                  <tr>
                     <th>Time</th>
                     <th>Status</th>
                     <th>other Demo Student</th>
                     <th>Note</th>
                     <th></th>
                     </th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach($all_time as $val) {
                     $flag =0;
                     if(isset($checkTime)){
                     for($i=0;$i<sizeof($checkTime);$i++){
                         $check = explode("/",$checkTime[$i]);
                         if($check[0]==$val->time_id){
                             if($check[1]=="1"){
                                 $st ="1";
                             }
                             else if($check[1]=="2"){
                                 $st ="2";
                             } else if($check[1]=="0"){
                                 $st ="0";
                                 $flag=1;
                             }
                             $note = @$check[2];
                         }
                     }
                  }
                   ?>
                  <tr>
                     <td><?php echo $val->stime; ?> To <?php echo $val->etime; ?>
                        <input type="hidden" value="<?php echo $val->stime; ?>" id="stimes<?php echo $val->time_id ?>">
                        <input type="hidden" value="<?php echo $val->etime; ?>" id="etimes<?php echo $val->time_id ?>">
                     </td>
                     <td>  
                        <label style="padding:0px 20px 0px 20px;" <?php if(@$st=="1") { ?> class="bg-green" <?php } ?> <?php if(@$st=="0") { ?> class="bg-red" <?php } ?> >
                        <?php if(@$st=="1") { echo "Full Free"; } else if(@$st=="2") { echo "Half Free"; } else if(@$st=="0") { echo "No Free"; } ?>
                        </label>	
                     </td>
                     <td>
                        <?php    
                           foreach($demo_all as $demo) {  if($demo->discard=="0") { if($demo->demoStatus=="0") { if($select_faculty->faculty_id==$demo->faculty_id) {
                               if($val->stime==$demo->fromTime || $val->etime==$demo->toTime){ 
                                    $flag=1;
                               ?>
                        <span class="pull-right badge bg-primary">Demo Date :<?php echo $demo->demoDate; ?> / <?php echo $demo->startingCourse; ?></span>
                        <br>
                        <?php }
                           if($startingCourse==$demo->startingCourse && $demo_date==$demo->demoDate && $val->stime==$demo->fromTime){
                                $flag=0;
                            }
                           } } } }
                           ?>
                     </td>
                     <td><?php if(!empty($note)) { echo $note; } ?></td>
                     <td><button type="button" onclick="setTime(<?php echo $val->time_id; ?>)" class="btn btn-xs <?php if($flag==1) { ?> btn-danger <?php } else { ?> btn-success <?php } ?>">Select</button></td>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>