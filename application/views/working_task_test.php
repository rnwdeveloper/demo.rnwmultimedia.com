<?php
   //session_start();
   
   
   
   require_once('58api/google-calendar-api.php');
   
   require_once('58api/settings.php');
   
   ?>
<main class="main_content d-inline-block">
   <section class="page_title_block d-inline-block w-100 position-relative pb-0">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-11 mx-auto text-center" >
               <div class="page_heading">
                  <h1>Working TASK</h1>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="task_show_sec">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12 mx-auto">
               <div class="table-responsive">
                  <table class="table table-bordered table-striped create_responsive_table">
                     <tr class="thead custi_light_blue_bg">
                        <th>Start Date</th>
                        <th>Task Expiry</th>
                        <th>Name</th>
                        <th>Deadline</th>
                        <th>Created </th>
                        <th>Observer</th>
                        <th>Priority</th>
                        <th>Submit Date&time</th>
                        <th>Progress</th>
                        <th>Action</th>
                        <th>Final Status</th>
                        <th>Performance</th>
                     </tr>
                     <?php
                        foreach ($assign_task as $j => $value) {
                        
                               if($value->task_assign_status == "today"){
                        
                        
                        
                              $dd = explode(",", $value->task_assign_member_id);
                        
                              foreach ($dd as $a => $b) {
                        
                                
                        
                                foreach ($member as $k => $v) {
                        
                               if($b == $v->member_id){
                        
                                if($v->member_account_id == $_SESSION['user_id']){
                        
                           ?>
                     <?php 
                        if(date('d-m-Y')>date("d-m-Y",strtotime($value->task_dedline_date)))
                        
                        {
                        
                          $status =  "Expire<br>";
                        
                        }
                        
                        else if(date('d-m-Y') == date("d-m-Y",strtotime($value->task_dedline_date)))
                        
                        {
                        
                        
                        
                          // echo date("g:m");
                        
                          // echo substr($value->task_dedline_time, 0,5);
                        
                        
                        
                        
                        
                           if(strtotime(date("h:i")) > strtotime(substr($value->task_dedline_time, 0,5)))
                        
                                        {
                        
                                         $status =  "Expire<br>";
                        
                                        }
                        
                                        else 
                        
                                        {
                        
                                          $status = "Valid";
                        
                                        }
                        
                                   
                        
                        }
                        
                        else
                        
                        {
                        
                         $status =  "Valid";
                        
                        }
                        
                        
                        
                        ?>
                     <?php foreach ($task_submit as $p => $q) {
                        if($q->task_detail_id == $value->task_detail_id){
                        
                          if($q->task_member_name == $_SESSION['user_name']){
                        
                          if($q->task_status == 0)
                        
                          { ?>
                     <div><?php  $progress_status = "Pending"; ?></div>
                     <?php }elseif ($q->task_status == 1) {
                        ?>
                     <div><?php   $progress_status = "Proccess"; ?></div>
                     <?php
                        }else
                        
                        {?>
                     <div><?php   $progress_status = "Completed"; ?></div>
                     <?php
                        }
                        
                        # code...
                        
                        } } }?>
                     <tr style="background: <?php if($progress_status == "Pending"){ echo "#f7e9a3"; }else if($progress_status == "Proccess"){ echo "#a3caf7"; }else{ echo "#a3f7a3"; } ?>">
                        <td><b><?php echo date('d-m-Y',strtotime($value->created_at)); ?></b></td>
                        <td><b style="color: <?php if($status != "Valid"){ echo "red"; }else{ echo "green"; } ?>"> <?php echo $status; ?></b></td>
                        <td><?php echo $value->task_name; ?></td>
                        <td><?php echo date("d-m-Y",strtotime($value->task_dedline_date)); ?>  <?php echo $value->task_dedline_time; ?></td>
                        <td><?php
                           foreach ($member as $m => $n) {
                           
                             if($n->member_account_id == $value->task_creator_id)
                           
                             {
                           
                                  echo  $n->member_name;
                           
                             }
                           
                           }
                           
                            ?></td>
                        <td><?php
                           foreach ($member as $m => $n) {
                           
                             if($n->member_id == $value->task_observe_member_id)
                           
                             {
                           
                                  echo $n->member_name;
                           
                             }
                           
                           }
                           
                            ?></td>
                        <td><?php echo $value->task_priority; ?></td>
                        <td>
                           <?php foreach ($task_submit as $p => $q) {
                              if($q->task_detail_id == $value->task_detail_id){
                              
                                if($q->task_member_name == $_SESSION['user_name']){
                              
                                  if(!empty($q->task_submit_date))
                              
                              {?>
                           <div><?php  echo date("d-m-Y",strtotime($q->task_submit_date)); ?>  <?php  echo date("h:iA",strtotime($q->task_submit_time)) ?></div>
                           <?php }
                              # code...
                              
                              } } } ?>
                        </td>
                        <!-- <td><?php foreach ($task_submit as $p => $q) {
                           if($q->task_detail_id == $value->task_detail_id)
                           
                           {
                           
                             if($q->task_member_name == $_SESSION['user_name']){
                           
                               if(!empty($q->task_submit_date)){
                           
                             ?>
                           <div><?php  echo date("h:iA",strtotime($q->task_submit_time)) ?></div>
                           
                           <?php } }
                              # code...
                              
                              }  }?></td> -->
                        <td>
                           <?php foreach ($task_submit as $p => $q) {
                              if($q->task_detail_id == $value->task_detail_id){
                              
                                if($q->task_member_name == $_SESSION['user_name']){
                              
                                 ?>
                           <div><?php  echo $q->task_progress."%"; ?></div>
                           <?php 
                              # code...
                              
                              } } } ?>
                        </td>
                        <td><?php echo $progress_status; ?></td>
                        <?php foreach ($task_submit as $m => $n) {
                           if($n->task_detail_id == $value->task_detail_id)
                           
                           {
                           
                             if($b == $n->task_member_id){
                           
                           
                           
                             if($n->task_observe_status == 3){?>
                        <td>
                           <?php $mohan=0; foreach ($task_resubmit as $x => $y) {
                              if($y->task_submit_id == $n->task_submit_id){  $mohan=1; } ?>
                           <!--  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#example<?php echo $x; ?>">
                              Resubmit
                              
                              </button>
                              
                              -->
                           <!-- Modal -->
                           <!--  <div class="modal fade" id="example<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                              
                                <div class="modal-content">
                              
                                  <div class="modal-header">
                              
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              
                                      <span aria-hidden="true">&times;</span>
                              
                                    </button>
                              
                                  </div>
                              
                                  <div class="modal-body">
                              
                                     <p><b>Task Name: </b><?php echo $value->task_name; ?></p>
                              
                                      <p><b>Task Description: </b><?php echo $value->task_description; ?></p>
                              
                                      <p><b>Task Document: </b>
                              
                                    <?php foreach ($task_document as $p => $q) {
                                 if($q->task_detail_id == $value->task_detail_id){
                                 
                                   ?>
                              
                                          <img src="<?php echo base_url(); ?>images/task_image/<?php echo $q->task_document; ?>" width="50px">
                              
                                        <?php
                                 }
                                 
                                 } ?>
                              
                                    </p>
                              
                              <p><b>Task Priority: </b><?php echo $value->task_priority; ?></p>
                              
                                
                              
                              <p><b>Task resubmit Dedline date: </b><?php echo $y->task_submit_date; ?></p>
                              
                              <p><b>Task resubmit Dedline Time: </b><?php echo $y->task_submit_time; ?></p>
                              
                              <p><b>Task Description Time: </b><?php echo $y->task_description; ?></p>
                              
                              <p><b>Task Status: </b><?php 
                                 if($y->task_status == 0)
                                 
                                 {?>
                              
                              <a href="<?php echo base_url(); ?>TaskController/change_rs?s=<?php echo $y->task_status;  ?>&id=<?php echo $y->task_resubmit_id; ?>">
                              
                              <button type="button" class="btn btn-warning">Pending</button>
                              
                              </a>
                              
                              
                              
                              <?php }
                                 else if($y->task_status == 1)
                                 
                                 { ?>
                              
                              <a href="<?php echo base_url(); ?>TaskController/change_rs?s=<?php echo $y->task_status;  ?>&id=<?php echo $y->task_resubmit_id; ?>">
                              
                              <button type="button" class="btn btn-primary">Proccess</button>
                              
                              </a>
                              
                              <?php  }
                                 else
                                 
                                 {?>
                              
                              <a href="<?php echo base_url(); ?>TaskController/change_rs?s=<?php echo $y->task_status;  ?>&id=<?php echo $y->task_resubmit_id; ?>">
                              
                              <button type="button" class="btn btn-success">Completed</button>
                              
                              </a>
                              
                              <?php } ?>
                              
                              
                              
                              </p>
                              
                              <p><b>Task Progress: </b><?php 
                                 echo $y->task_progress;?>
                              
                              <div>
                              
                              <h6>Progress mode</h6>
                              
                              <div style="height: 200px;">
                              
                              <input type="range" id="vertical">
                              
                              <output ><?php echo $y->task_progress; ?></output>
                              
                              </div>
                              
                              
                              
                              <form method="post" action="<?php echo base_url(); ?>TaskController/upd_re_prog">
                              
                              <input type="hidden" name="id" value="<?php  echo $y->task_resubmit_id; ?>">
                              
                              <input type="hidden"  id="dd" name="rang">
                              
                              <button type="submit" value="submit" class="btn btn-success">update</button>
                              
                              </form>
                              
                              </div>
                              
                              <div><?php
                                 foreach ($member as $m => $aa) {
                                 
                                   $bb= explode(",", $value->task_assign_member_id);
                                 
                                   foreach ($bb as $q => $p) {
                                 
                                 
                                 
                                   if($aa->member_id == $p)
                                 
                                   {
                                 
                                     if($aa->member_account_id != $_SESSION['user_id']){
                                 
                                        echo $aa->member_name;
                                 
                                      }
                                 
                                   }
                                 
                                 }
                                 
                                 }
                                 
                                  ?></div></p>
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                                  </div>
                              
                                  <div class="modal-footer">
                              
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              
                                    <button type="button" class="btn btn-primary">Save changes</button>
                              
                                  </div>
                              
                                </div>
                              
                              </div>
                              
                              </div> -->
                           <?php  } if($mohan == 1){ echo "ReSubmit";} ?>
                        </td>
                        <?php }else if($n->task_observe_status == 2){ ?> 
                        <td>Done</td>
                        <?php }else if($n->task_observe_status == 1){?> 
                        <td><button type="button" class="btn btn-success">submit</button></td>
                        <?php }else{ ?>
                        <td>
                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter<?php echo $j; ?>">
                           Show Task
                           </button>
                           <!-- Modal -->
                           <!-- <div class="modal fade" id="exampleModalCenter<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                              
                                <div class="modal-content">
                              
                                  <div class="modal-header">
                              
                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                              
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              
                                      <span aria-hidden="true">&times;</span>
                              
                                    </button>
                              
                                  </div>
                              
                                  <div class="modal-body">
                              
                                      <p><b>Task Name: </b><?php echo $value->task_name; ?></p>
                              
                                       <p><b>Task Description: </b><?php echo $value->task_description; ?></p>
                              
                                        <p><b>Task Document: </b>
                              
                                        <?php foreach ($task_document as $p => $q) {
                                 if($q->task_detail_id == $value->task_detail_id){
                                 
                                   ?>
                              
                                              <img src="<?php echo base_url(); ?>images/task_image/<?php echo $q->task_document; ?>" width="50px">
                              
                                            <?php
                                 }
                                 
                                 } ?>
                              
                                        </p>
                              
                                         <p><b>Task Priority: </b><?php echo $value->task_priority; ?></p>
                              
                                           <p><b>Task Dedline date: </b><?php echo date('d-m-y',strtotime($value->task_dedline_date)); ?></p>
                              
                                            <p><b>Task Dedline Time: </b><?php echo date('h:iA',strtotime($value->task_dedline_time)); ?></p>
                              
                                             <p><b>Task Status: </b><?php foreach ($task_submit as $m => $n) {
                                 if($n->task_detail_id == $value->task_detail_id)
                                 
                                 {
                                 
                                   if($b == $n->task_member_id){
                                 
                                 
                                 
                                   if($n->task_status == 0)
                                 
                                   {?>
                              
                                              <a href="<?php echo base_url(); ?>TaskController/change_s?s=<?php echo $n->task_status;  ?>&id=<?php echo $n->task_submit_id; ?>">
                              
                                                  <button type="button" class="btn btn-warning">Pending</button>
                              
                                              </a>
                              
                              
                              
                                               <?php }
                                 else if($n->task_status == 1)
                                 
                                 { ?>
                              
                                                 <a href="<?php echo base_url(); ?>TaskController/change_s?s=<?php echo $n->task_status;  ?>&id=<?php echo $n->task_submit_id; ?>">
                              
                                                  <button type="button" class="btn btn-primary">Proccess</button>
                              
                                              </a>
                              
                                              <?php  }
                                 else
                                 
                                 {?>
                              
                                                 <a href="<?php echo base_url(); ?>TaskController/change_s?s=<?php echo $n->task_status;  ?>&id=<?php echo $n->task_submit_id; ?>">
                              
                                                  <button type="button" class="btn btn-success">Completed</button>
                              
                                              </a>
                              
                                               <?php } ?>
                              
                                               
                              
                                               <?php
                                 }
                                 
                                 }
                                 
                                 } ?></p>
                              
                                             <p><b>Task Progress: </b><?php foreach ($task_submit as $m => $n) {
                                 if($n->task_detail_id == $value->task_detail_id)
                                 
                                 {
                                 
                                   if($b == $n->task_member_id){
                                 
                                 
                                 
                                  echo $n->task_progress;?>
                              
                                              <div>
                              
                                                  <h6>Progress mode</h6>
                              
                                                  <div style="height: 200px;">
                              
                                                      <input type="range" id="vertical">
                              
                                                      <output  value="<?php echo $j; ?>"><?php echo $n->task_progress; ?></output>
                              
                                                  </div>
                              
                              
                              
                                                <form method="post" action="<?php echo base_url(); ?>TaskController/upd_prog">
                              
                                                  <input type="hidden" name="id" value="<?php  echo $n->task_submit_id; ?>">
                              
                              
                              
                                                  <input type="hidden"  id="dd<?php echo $j; ?>" name="rang">
                              
                                                   <button type="submit" value="submit" class="btn btn-success">update</button>
                              
                                                 </form>
                              
                                              </div>
                              
                                               <div><?php
                                 foreach ($member as $m => $n) {
                                 
                                   $bb= explode(",", $value->task_assign_member_id);
                                 
                                   foreach ($bb as $q => $p) {
                                 
                                 
                                 
                                   if($n->member_id == $p)
                                 
                                   {
                                 
                                     if($n->member_account_id != $_SESSION['user_id']){
                                 
                                        echo $n->member_name;
                                 
                                      }
                                 
                                   }
                                 
                                 }
                                 
                                 }
                                 
                                  ?></div><?php
                                 }
                                 
                                 }
                                 
                                 } ?></p>
                              
                                  </div>
                              
                                  <div class="modal-footer">
                              
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              
                                    <button type="button" class="btn btn-primary">Save changes</button>
                              
                                  </div>
                              
                                </div>
                              
                              </div>
                              
                              </div> -->
                           <div class="filter_ratio filter_ratio_one">
                              <div class="modal fade" id="exampleModalCenter<?php echo $j; ?>">
                                 <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title">Task</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body">
                                          <div class="row justify-content-center">
                                             <div class="col-xl-8 col-lg-8 col-md-8">
                                                <div class="task_show_left_block_form">
                                                   <ul class="show_task_propaty">
                                                      <li><?php foreach ($task_submit as $m => $n) {
                                                         if($n->task_detail_id == $value->task_detail_id)
                                                         
                                                         {
                                                         
                                                           if($b == $n->task_member_id){
                                                         
                                                         
                                                         
                                                           if($n->task_status == 0)
                                                         
                                                           {?>
                                                         Pending
                                                         </a>
                                                         <?php }
                                                            else if($n->task_status == 1)
                                                            
                                                            { ?>
                                                         Proccess
                                                         </a>
                                                         <?php  }
                                                            else
                                                            
                                                            {?>
                                                         Completed
                                                         </a>
                                                         <?php } ?>
                                                         <?php
                                                            }
                                                            
                                                            }
                                                            
                                                            } ?>
                                                      </li>
                                                      <li class="float-right"><?php echo $value->task_priority; ?></li>
                                                   </ul>
                                                   <div class="form-group">
                                                      <input type="text" name="" placeholder="<?php echo $value->task_name; ?>" class="form-control" disabled>
                                                   </div>
                                                   <div class="form-group">
                                                      <textarea class="form-control" placeholder="Creating a fast" rows="6" disabled=""><?php echo $value->task_description; ?></textarea>
                                                   </div>
                                                   <div class="form-group">
                                                      <!-- <button type="button" class="btn btn-primary custi_light_blue_bg">Show Document file</button> -->
                                                      <?php foreach ($task_document as $p => $q) {
                                                         if($q->task_detail_id == $value->task_detail_id){
                                                         
                                                         
                                                         
                                                           ?>
                                                      <u><a style="color: #000;font-weight: bold;" href="<?php echo base_url(); ?>images/task_image/<?php echo $q->task_document; ?>" download ><?php echo $q->task_document; ?></a></u><br>
                                                      <?php
                                                         }
                                                         
                                                         } ?>
                                                   </div>
                                                   <div class="work_progress_block">
                                                      <label>Progress status:-</label>
                                                      <?php foreach ($task_submit as $m => $n) {
                                                         if($n->task_detail_id == $value->task_detail_id)
                                                         
                                                         {
                                                         
                                                           if($b == $n->task_member_id){ ?>
                                                      <div class="progress">
                                                         <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $n->task_progress; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><span><?php echo $n->task_progress; ?>%</span></div>
                                                      </div>
                                                      <?php }}}?>
                                                   </div>
                                                   <div class="form-group">
                                                      <?php foreach ($task_submit as $m => $n) {
                                                         if($n->task_detail_id == $value->task_detail_id)
                                                         
                                                         {
                                                         
                                                           if($b == $n->task_member_id){
                                                         
                                                         
                                                         
                                                          ?>
                                                      <div style="width: 100%;">
                                                         <h6>Progress mode</h6>
                                                         <div style="width: 100%;">
                                                            <input type="range" id="vertical" style="width: 100%;">
                                                            <output  value="<?php echo $j; ?>"><?php echo $n->task_progress; ?></output>
                                                         </div>
                                                         <div class="btn-group" style="justify-content: space-between; width: 100%;">
                                                            <form method="post" action="<?php echo base_url(); ?>TaskController/upd_prog">
                                                               <input type="hidden" name="id" value="<?php  echo $n->task_submit_id; ?>">
                                                               <input type="hidden"  id="dd<?php echo $j; ?>" name="rang">
                                                               <button type="submit" value="submit" class="btn btn-success">update</button>
                                                            </form>
                                                            <?php foreach ($task_submit as $m => $n) {
                                                               if($n->task_detail_id == $value->task_detail_id)
                                                               
                                                               {
                                                               
                                                                 if($b == $n->task_member_id){
                                                               
                                                               
                                                               
                                                                 if($n->task_status == 0)
                                                               
                                                                 {?>
                                                            <a href="<?php echo base_url(); ?>TaskController/change_s?s=<?php echo $n->task_status;  ?>&id=<?php echo $n->task_submit_id; ?>">
                                                            <button type="button" class="btn btn-warning">Pending</button>
                                                            </a>
                                                            <?php }
                                                               else if($n->task_status == 1)
                                                               
                                                               { ?>
                                                            <a href="<?php echo base_url(); ?>TaskController/change_s?s=<?php echo $n->task_status;  ?>&id=<?php echo $n->task_submit_id; ?>">
                                                            <button type="button" class="btn btn-primary">Proccess</button>
                                                            </a>
                                                            <?php  }
                                                               else
                                                               
                                                               {?>
                                                            <a href="<?php echo base_url(); ?>TaskController/change_s?s=<?php echo $n->task_status;  ?>&id=<?php echo $n->task_submit_id; ?>">
                                                            <button type="button" class="btn btn-success">Completed</button>
                                                            </a>
                                                            <?php } ?>
                                                            <?php
                                                               }
                                                               
                                                               }
                                                               
                                                               } ?>
                                                         </div>
                                                      </div>
                                                      <?php
                                                         }
                                                         
                                                         }
                                                         
                                                         } ?>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-xl-4 col-lg-4 col-md-4">
                                                <div class="task_show_right_block_form">
                                                   <div class="seen_dates">
                                                      <p>Seen date : <?php echo date('d-m-Y h:iA') ?></p>
                                                   </div>
                                                   <ul class="task_show_right_block_form_data_list">
                                                      <li>Expiry Status: - <?php if($value->task_assign_status == "today"){ echo "Today";}else{ echo "Few Days";} ?></li>
                                                      <li>Deadline: - <?php echo date('d-m-y',strtotime($value->task_dedline_date)); ?> <?php echo date('h:iA',strtotime($value->task_dedline_time)); ?></li>
                                                      <li>
                                                         <?php 
                                                            $login_url = 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/calendar') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL). '&response_type=code&client_id=' . CLIENT_ID .'&access_type=online';
                                                            
                                                            ?>
                                                         Set reminder:
                                                         <?php 
                                                            // echo "<pre>";print_r($task_submit);die;
                                                            
                                                            foreach ($task_submit as $m => $n) {if($n->task_detail_id == $value->task_detail_id){if($b == $n->task_member_id && !empty($n->task_reminder)){ ?><span><a href="https://calendar.google.com/calendar/r" target="_blank" style="color: red;">Reminder done</a> </span><?php  }else{?>
                                                         <?php }}}?>
                                                         <?php if(isset($_GET['code'])){ ?>
                                                         <a href="<?php echo base_url(); ?>TaskController/fetch_cal?code=<?php echo $_GET['code'];  ?>&tid=<?php foreach ($task_submit as $m => $n) {if($n->task_detail_id == $value->task_detail_id){if($b == $n->task_member_id){ echo $n->task_submit_id; }}}?>&uid=<?php foreach ($task_submit as $m => $n) {if($n->task_detail_id == $value->task_detail_id){if($b == $n->task_member_id){ echo $n->task_member_id; }}}?>" target="_blank"><i class="fa fa-bell" style="color: green;"></i></a>
                                                         <?php }else{ ?>
                                                         <a href="<?= $login_url ?>" target="_blank"><i class="fa fa-bell" style="color: red;"></i></a>
                                                         <?php } ?>
                                                      </li>
                                                   </ul>
                                                   <ul class="task_show_right_block_form_data_list">
                                                      <li>Created By:<?php
                                                         foreach ($member as $m => $n) {
                                                         
                                                           if($n->member_account_id == $value->task_creator_id)
                                                         
                                                           {
                                                         
                                                                echo  $n->member_name;
                                                         
                                                           }
                                                         
                                                         }
                                                         
                                                          ?></li>
                                                      <li>Observer By: <?php
                                                         foreach ($member as $m => $n) {
                                                         
                                                           if($n->member_id == $value->task_observe_member_id)
                                                         
                                                           {
                                                         
                                                                echo $n->member_name;
                                                         
                                                           }
                                                         
                                                         }
                                                         
                                                          ?></li>
                                                   </ul>
                                                   <div class="participants_bloack">
                                                      <div class="participants_title">
                                                         <h4>Participants:-</h4>
                                                      </div>
                                                      <ul class="participants_member">
                                                         <?php
                                                            foreach ($member as $m => $n) {
                                                            
                                                              $bb= explode(",", $value->task_assign_member_id);
                                                            
                                                              foreach ($bb as $q => $p) {
                                                            
                                                            
                                                            
                                                              if($n->member_id == $p)
                                                            
                                                              {
                                                            
                                                                if($n->member_account_id != $_SESSION['user_id']){
                                                            
                                                                  ?>
                                                         <span class="participants_member_profile">
                                                         <?php if(!empty($n->member_image)){ ?>
                                                         <img src="<?php echo base_url(); ?>dist/img/<?php echo $n->member_image; ?>" style="border-radius: 50%;width: 43px;">
                                                         <?php }else{ ?>
                                                         <img src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" style="border-radius: 50%;width: 42px;">
                                                         <?php } ?>
                                                         </span>
                                                         <span class="participants_member_name"><?php  echo $n->member_name; ?></span>
                                                         <?php 
                                                            }
                                                            
                                                            }
                                                            
                                                            }
                                                            
                                                            }
                                                            
                                                            ?>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </td>
                        <?php  } } } } ?>
                        <td>
                           <?php foreach ($task_submit as $m => $n) {
                              if($n->task_detail_id == $value->task_detail_id)
                              
                              {
                              
                                if($b == $n->task_member_id){
                              
                                if($n->task_status == 2 && $n->task_progress ==100 && $n->task_observe_status==0 ){ ?>
                           <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ex<?php echo $j; ?>">
                           Submit Task
                           </button>
                           <!-- Modal -->
                           <div class="modal fade" id="ex<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $value->task_name; ?></h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <ul class="show_task_propaty">
                                          <li class="float-right"><b>Observer: </b><?php echo $n->task_observe_name; ?></li>
                                          <li><b>Creator:</b> <?php  foreach ($member as $m => $k) {
                                             if($k->member_account_id == $value->task_creator_id)
                                             
                                             {
                                             
                                                  echo $k->member_name;
                                             
                                             }
                                             
                                             } ?></li>
                                       </ul>
                                       <div class="work_progress_block">
                                          <label>Task Progress:- </label>
                                          <div class="progress">
                                             <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $n->task_progress; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><span><?php echo $n->task_progress; ?>%</span></div>
                                          </div>
                                       </div>
                                       <br>
                                       <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>TaskController/sub_task" >
                                          <input type="hidden" name="id" value="<?php echo $n->task_submit_id; ?>">
                                          <br>
                                          <div class="form-group">
                                             File:<input type="file" name="doc[]" multiple class="form-control">
                                          </div>
                                          <br>
                                          Description:
                                          <div class="form-group" >
                                             <textarea name="description" class="form-control"></textarea>
                                          </div>
                                          <br>
                                          <button type="submit" class="btn btn-success">submit</button>
                                       </form>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       <!-- <button type="button" class="btn btn-success">Save changes</button> -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </td>
                        <?php }else{?>
                        <?php foreach ($task_submit as $p => $q) {
                           if($q->task_detail_id == $value->task_detail_id){
                           
                             if($q->task_member_name == $_SESSION['user_name']){
                           
                           
                           
                             if($q->task_submit_date!= ""){
                           
                           if(date("d-m-Y",strtotime($q->task_submit_date)) > date("d-m-Y",strtotime($value->task_dedline_date)))
                           
                           {echo "Bad<br>"; }else if(date("d-m-Y",strtotime($q->task_submit_date)) < date("d-m-Y",strtotime($value->task_dedline_date))){echo "Very Good";}else{ 
                           
                           
                           
                           if(date("h:i",strtotime($q->task_submit_time)) > date("h:i",strtotime($value->task_dedline_time)))
                           
                                       {
                           
                                         echo "Bad<br>";
                           
                                       }
                           
                                       else if(date("h:i",strtotime($q->task_submit_time)) < date("h:i",strtotime($value->task_dedline_time)))
                           
                                       {
                           
                                         echo "Very Good<br>";
                           
                                       }
                           
                                       else
                           
                                       {
                           
                                           echo "Good<br>";
                           
                                       } }
                           
                           # code...
                           
                           }else { 
                           
                           
                           
                           if(date('d-m-Y')>date("d-m-Y",strtotime($value->task_dedline_date)))
                           
                           {
                           
                           echo "Overdue<br>";
                           
                           }
                           
                           else if(date('d-m-Y') == date("d-m-Y",strtotime($value->task_dedline_date)))
                           
                           {
                           
                           
                           
                           
                           
                           if(!empty($q->task_submit_time)){
                           
                           if(date("h:i") > date("h:i",strtotime($q->task_submit_time)))
                           
                                       {
                           
                                         echo "Overdue<br>";
                           
                                       }
                           
                                       else 
                           
                                       {
                           
                                         echo "<br>";
                           
                                       }
                           
                           }
                           
                           else
                           
                           {
                           
                           echo "<br>";
                           
                           }
                           
                           }
                           
                           else
                           
                           {
                           
                           echo "<br>";
                           
                           }
                           
                           
                           
                           }} } }?>
                        <?php }}} } ?>
                     </tr>
                     <?php foreach ($task_submit  as $mm => $nn) {
                        if($nn->task_detail_id == $value->task_detail_id){
                        
                          if($nn->task_observe_status != 2){
                        
                          foreach ($task_resubmit as $pp => $qq) {
                        
                            if($qq->task_submit_id == $nn->task_submit_id){
                        
                              ?>
                     <tr>
                        <td><?php 
                           if(date('d-m-Y')>date("d-m-Y",strtotime($value->task_dedline_date)))
                           
                           {
                           
                             echo "Overdue<br>";
                           
                           }
                           
                           else if(date('d-m-Y') == date("d-m-Y",strtotime($value->task_dedline_date)))
                           
                           {
                           
                             
                           
                              if(date("h:m") > date("h:m",strtotime($value->task_dedline_time)))
                           
                                           {
                           
                                             echo "Overdue<br>";
                           
                                           }
                           
                                           else 
                           
                                           {
                           
                                             echo "Valid";
                           
                                           }
                           
                                      
                           
                           }
                           
                           else
                           
                           {
                           
                             echo "Valid";
                           
                           }
                           
                           
                           
                           ?></td>
                        <td><?php echo $value->task_name; ?></td>
                        <td><?php echo date("d-m-Y",strtotime($value->task_dedline_date)); ?>  <?php echo $value->task_dedline_time; ?></td>
                        <td><?php
                           foreach ($member as $m => $n) {
                           
                             if($n->member_account_id == $value->task_creator_id)
                           
                             {
                           
                                  echo  $n->member_name;
                           
                             }
                           
                           }
                           
                            ?></td>
                        <td><?php
                           foreach ($member as $m => $n) {
                           
                             if($n->member_id == $value->task_observe_member_id)
                           
                             {
                           
                                  echo $n->member_name;
                           
                             }
                           
                           }
                           
                            ?></td>
                        <td><?php echo $value->task_priority; ?></td>
                        <td><?php  echo date("d-m-Y",strtotime($qq->task_submit_date)); ?>  <?php  echo date('h:iA',strtotime($qq->task_submit_time)); ?></td>
                        <td><?php  echo $qq->task_progress."%"; ?></td>
                        <td>
                           <?php
                              if($qq->task_status == 0)
                              
                              { ?>
                           <div><?php  echo "Pending"; ?></div>
                           <?php }elseif ($qq->task_status == 1) {
                              ?>
                           <div><?php  echo "Proccess"; ?></div>
                           <?php
                              }else
                              
                              {?>
                           <div><?php  echo "Completed"; ?></div>
                           <?php
                              }?>
                        </td>
                        <!--  <td><?php echo $value->task_name; ?></td>
                           <td><?php
                              foreach ($member as $m => $n) {
                              
                                if($n->member_account_id == $value->task_creator_id)
                              
                                {
                              
                                     echo $n->member_name;
                              
                                }
                              
                              }
                              
                               ?></td>
                           
                            <td><?php
                              foreach ($member as $m => $n) {
                              
                                if($n->member_id == $value->task_observe_member_id)
                              
                                {
                              
                                     echo $n->member_name;
                              
                                }
                              
                              }
                              
                               ?></td>
                           
                           <td><?php echo date("d-m-Y",strtotime($qq->task_submit_date)); ?></td>
                           
                           <td><?php echo date('h:iA',strtotime($qq->task_submit_time)); ?></td>
                           
                           <td><?php echo $value->task_priority; ?></td>
                           
                           -->
                        <?php foreach ($task_submit as $m => $n) {
                           if($n->task_detail_id == $value->task_detail_id)
                           
                           {
                           
                             if($b == $n->task_member_id){
                           
                           
                           
                             ?>
                        <td>
                           <?php if($qq->status ==3 ){ ?>
                           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#example123<?php echo $x; ?>">
                           Resubmit 
                           </button>
                           <?php }elseif($qq->status == 4){ echo "ReSubmit"; }else { echo "submit";} ?>
                           <!-- Modal -->
                           <!--                                                 <div class="modal fade" id="example123<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                              
                                <div class="modal-content">
                              
                                  <div class="modal-header">
                              
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              
                                      <span aria-hidden="true">&times;</span>
                              
                                    </button>
                              
                                  </div>
                              
                                  <div class="modal-body">
                              
                                     <p><b>Task Name: </b><?php echo $value->task_name; ?></p>
                              
                                      <p><b>Task Description: </b><?php echo $value->task_description; ?></p>
                              
                                      <p><b>Task Document: </b>
                              
                                    <?php foreach ($task_document as $p => $q) {
                                 if($q->task_detail_id == $value->task_detail_id){
                                 
                                   ?>
                              
                                          <img src="<?php echo base_url(); ?>images/task_image/<?php echo $q->task_document; ?>" width="50px">
                              
                                        <?php
                                 }
                                 
                                 } ?>
                              
                                    </p>
                              
                              <p><b>Task Priority: </b><?php echo $value->task_priority; ?></p>
                              
                                
                              
                              <p><b>Task resubmit Dedline date: </b><?php echo date('d-m-Y',strtotime($y->task_submit_date)); ?></p>
                              
                              <p><b>Task resubmit Dedline Time: </b><?php echo date('h:iA',strtotime($y->task_submit_time)); ?></p>
                              
                              <p><b>Task Description Time: </b><?php echo $y->task_description; ?></p>
                              
                              <p><b>Task Status: </b><?php 
                                 if($y->task_status == 0)
                                 
                                 {?>
                              
                              <a href="<?php echo base_url(); ?>TaskController/change_rs?s=<?php echo $y->task_status;  ?>&id=<?php echo $y->task_resubmit_id; ?>">
                              
                              <button type="button" class="btn btn-warning">Pending</button>
                              
                              </a>
                              
                              
                              
                              <?php }
                                 else if($y->task_status == 1)
                                 
                                 { ?>
                              
                              <a href="<?php echo base_url(); ?>TaskController/change_rs?s=<?php echo $y->task_status;  ?>&id=<?php echo $y->task_resubmit_id; ?>">
                              
                              <button type="button" class="btn btn-primary">Proccess</button>
                              
                              </a>
                              
                              <?php  }
                                 else
                                 
                                 {?>
                              
                              <a href="<?php echo base_url(); ?>TaskController/change_rs?s=<?php echo $y->task_status;  ?>&id=<?php echo $y->task_resubmit_id; ?>">
                              
                              <button type="button" class="btn btn-success">Completed</button>
                              
                              </a>
                              
                              <?php } ?>
                              
                              
                              
                              </p>
                              
                              <p><b>Task Progress: </b><?php 
                                 echo $y->task_progress;?>
                              
                              <div>
                              
                              <h6>Progress mode</h6>
                              
                              <div style="height: 200px;">
                              
                              <input type="range" id="vertical">
                              
                              <output value="<?php echo $j; ?>"><?php echo $y->task_progress; ?></output>
                              
                              </div>
                              
                              
                              
                              <form method="post" action="<?php echo base_url(); ?>TaskController/upd_re_prog">
                              
                              <input type="hidden" name="id" value="<?php  echo $y->task_resubmit_id; ?>">
                              
                              <input type="hidden"  id="redd<?php echo $j; ?>" name="rang">
                              
                              <button type="submit" value="submit" class="btn btn-success">update</button>
                              
                              </form>
                              
                              </div>
                              
                              <div><?php
                                 foreach ($member as $m => $aa) {
                                 
                                   $bb= explode(",", $value->task_assign_member_id);
                                 
                                   foreach ($bb as $q => $p) {
                                 
                                 
                                 
                                   if($aa->member_id == $p)
                                 
                                   {
                                 
                                     if($aa->member_account_id != $_SESSION['user_id']){
                                 
                                        echo $aa->member_name;
                                 
                                      }
                                 
                                   }
                                 
                                 }
                                 
                                 }
                                 
                                  ?></div></p>
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                                  </div>
                              
                                  <div class="modal-footer">
                              
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              
                                    <button type="button" class="btn btn-primary">Save changes</button>
                              
                                  </div>
                              
                                </div>
                              
                              </div>
                              
                              </div> -->
                           <div class="filter_ratio filter_ratio_one">
                              <div class="modal fade" id="example123<?php echo $x; ?>">
                                 <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title">Task</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body">
                                          <div class="row justify-content-center">
                                             <div class="col-xl-8 col-lg-8 col-md-8">
                                                <div class="task_show_left_block_form">
                                                   <ul class="show_task_propaty">
                                                      <li><?php 
                                                         if($y->task_status == 0)
                                                         
                                                         {?>
                                                         Pending
                                                         </a>
                                                         <?php }
                                                            else if($y->task_status == 1)
                                                            
                                                            { ?>
                                                         Proccess
                                                         </a>
                                                         <?php  }
                                                            else
                                                            
                                                            {?>
                                                         Completed
                                                         </a>
                                                         <?php } ?>
                                                      </li>
                                                      <li class="float-right"><?php echo $value->task_priority; ?></li>
                                                   </ul>
                                                   <div class="form-group">
                                                      <input type="text" name="" placeholder="<?php echo $value->task_name; ?>" class="form-control" disabled>
                                                   </div>
                                                   <div class="form-group">
                                                      <textarea class="form-control" placeholder="Creating a fast" rows="6" disabled=""><?php echo $y->task_description; ?></textarea>
                                                   </div>
                                                   <div class="work_progress_block">
                                                      <label>Task Progress:- </label>
                                                      <div class="progress">
                                                         <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $n->task_progress; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><span><?php echo $n->task_progress; ?>%</span></div>
                                                      </div>
                                                   </div>
                                                   <br>
                                                   <div class="form-group">
                                                      <!-- <button type="button" class="btn btn-primary custi_light_blue_bg">Show Document file</button> -->
                                                      <?php foreach ($task_document as $p => $q) {
                                                         if($q->task_detail_id == $value->task_detail_id){
                                                         
                                                           ?>
                                                      <!--   <a href="<?php echo base_url(); ?>images/task_image/<?php echo $q->task_document; ?>" download><?php echo base_url(); ?>images/task_image/<?php echo $q->task_document; ?></a> -->
                                                      <u><a style="color: #000;font-weight: bold;" href="<?php echo base_url(); ?>images/task_image/<?php echo $q->task_document; ?>" download ><?php echo $q->task_document; ?></a></u><br>
                                                      <?php
                                                         }
                                                         
                                                         } ?>
                                                   </div>
                                                   <div class="form-group">
                                                      <div class="work_progress_block">
                                                         <label>Progress status:-</label>
                                                         <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $y->task_progress; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><span><?php echo $y->task_progress; ?>%</span></div>
                                                         </div>
                                                      </div>
                                                      <div style="width: 100%;">
                                                         <h6>Progress mode</h6>
                                                         <div style="width: 100%;">
                                                            <input type="range" id="vertical" style="width: 100%;">
                                                            <output  value="<?php echo $j; ?>"><?php echo $y->task_progress; ?></output>
                                                         </div>
                                                         <div style="width: 100%;">
                                                            <form method="post" action="<?php echo base_url(); ?>TaskController/upd_re_prog" style="display: inline-block;">
                                                               <input type="hidden" name="id" value="<?php  echo $y->task_resubmit_id; ?>">
                                                               <input type="hidden"  id="redd<?php echo $j; ?>" name="rang">
                                                               <button type="submit" value="submit" class="btn btn-success" style="display: inline-block;">update</button>
                                                            </form>
                                                            <?php 
                                                               if($y->task_status == 0)
                                                               
                                                               {?>
                                                            <a href="<?php echo base_url(); ?>TaskController/change_rs?s=<?php echo $y->task_status;  ?>&id=<?php echo $y->task_resubmit_id; ?>" style="float: right;">
                                                            <button type="button" class="btn btn-warning">Pending</button>
                                                            </a>
                                                            <?php }
                                                               else if($y->task_status == 1)
                                                               
                                                               { ?>
                                                            <a href="<?php echo base_url(); ?>TaskController/change_rs?s=<?php echo $y->task_status;  ?>&id=<?php echo $y->task_resubmit_id; ?>" style="float: right;">
                                                            <button type="button" class="btn btn-primary">Proccess</button>
                                                            </a>
                                                            <?php  }
                                                               else
                                                               
                                                               {?>
                                                            <a href="<?php echo base_url(); ?>TaskController/change_rs?s=<?php echo $y->task_status;  ?>&id=<?php echo $y->task_resubmit_id; ?>" style="float: right;">
                                                            <button type="button" class="btn btn-success">Completed</button>
                                                            </a>
                                                            <?php } ?>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-xl-4 col-lg-4 col-md-4">
                                                <div class="task_show_right_block_form">
                                                   <div class="seen_dates">
                                                      <p>Seen date : <?php echo date('d-m-Y h:iA') ?></p>
                                                   </div>
                                                   <ul class="task_show_right_block_form_data_list">
                                                      <li>Expiry Status: - <?php if($y->task_assign_status == "today"){ echo "Today";}else{ echo "Few Days";} ?></li>
                                                      <li>Deadline: - <?php echo date('d-m-y',strtotime($y->task_submit_date)); ?> <?php echo date('h:iA',strtotime($y->task_submit_time)); ?></li>
                                                      <li>
                                                         <?php 
                                                            $login_url = 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/calendar') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL). '&response_type=code&client_id=' . CLIENT_ID .'&access_type=online';
                                                            
                                                            ?>
                                                         Set reminder:
                                                         <?php if(isset($y->task_reminder) && !empty($y->task_reminder)){ ?><span><a href="https://calendar.google.com/calendar/r" target="_blank" style="color: red;">Reminder done</a> </span><?php  }else{?>
                                                         <?php if(isset($_GET['code'])){ ?>
                                                         <a href="<?php echo base_url(); ?>TaskController/fetch_cal?code=<?php echo $_GET['code'];  ?>&ttid=<?php echo $y->task_resubmit_id; ?>&uid=<?php echo $y->task_member_id; ?>" target="_blank"><i class="fa fa-bell" style="color: green;"></i></a>
                                                         <?php }else{ ?>
                                                         <a href="<?= $login_url ?>" target="_blank"><i class="fa fa-bell" style="color: red;"></i></a>
                                                         <?php } ?>
                                                         <?php }?>
                                                      </li>
                                                   </ul>
                                                   <ul class="task_show_right_block_form_data_list">
                                                      <li>Created By:<?php
                                                         foreach ($member as $m => $n) {
                                                         
                                                           if($n->member_account_id == $value->task_creator_id)
                                                         
                                                           {
                                                         
                                                                echo  $n->member_name;
                                                         
                                                           }
                                                         
                                                         }
                                                         
                                                          ?></li>
                                                      <li>Observer By: <?php
                                                         foreach ($member as $m => $n) {
                                                         
                                                           if($n->member_id == $value->task_observe_member_id)
                                                         
                                                           {
                                                         
                                                                echo $n->member_name;
                                                         
                                                           }
                                                         
                                                         }
                                                         
                                                          ?></li>
                                                   </ul>
                                                   <div class="participants_bloack">
                                                      <div class="participants_title">
                                                         <h4>Participants:-</h4>
                                                      </div>
                                                      <ul class="participants_member">
                                                         <?php
                                                            foreach ($member as $m => $aa) {
                                                            
                                                              $bb= explode(",", $value->task_assign_member_id);
                                                            
                                                              foreach ($bb as $q => $p) {
                                                            
                                                            
                                                            
                                                              if($aa->member_id == $p)
                                                            
                                                              {
                                                            
                                                                if($aa->member_account_id != $_SESSION['user_id']){
                                                            
                                                                  ?>
                                                         <span class="participants_member_profile">
                                                         <?php if(!empty($aa->member_image)){ ?>
                                                         <img src="<?php echo base_url(); ?>dist/img/<?php echo $aa->member_image; ?>" style="border-radius: 50%;width: 43px;">
                                                         <?php }else{ ?>
                                                         <img src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" style="border-radius: 50%;width: 43px;">
                                                         <?php } ?>
                                                         </span>
                                                         <span class="participants_member_name"><?php  echo $aa->member_name; ?></span>
                                                         <?php 
                                                            }
                                                            
                                                            }
                                                            
                                                            }
                                                            
                                                            }
                                                            
                                                            ?>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </td>
                        <td>
                           <?php 
                              if($qq->task_status == 2 && $qq->task_progress ==100 && $qq->status!=1 && $qq->status!=4){
                              
                              ?>
                           <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ex<?php echo $mm; ?>">
                           ReSubmit Task
                           </button> 
                           <!-- Modal -->
                           <div class="modal fade" id="ex<?php echo $mm; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $value->task_name; ?></h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <!--    <div class="modal-body">
                                       <p><b>Task Name: </b><?php echo $value->task_name; ?></p>
                                       
                                       <p><b>Observe Name: </b><?php echo $n->task_observe_name; ?></p>
                                       
                                       <p><b>Creater Name: </b><?php  foreach ($member as $m => $k) {
                                          if($k->member_account_id == $value->task_creator_id)
                                          
                                          {
                                          
                                               echo $k->member_name;
                                          
                                          }
                                          
                                          } ?>
                                       
                                       </p>
                                       
                                       <p><b>Task Progress: </b><?php echo $y->task_progress; ?>%</p>
                                       
                                       <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>TaskController/resub_task" >
                                       
                                       <input type="hidden" name="id" value="<?php echo $y->task_resubmit_id; ?>">
                                       
                                       <br>
                                       
                                       File:<input type="file" name="doc[]" multiple>
                                       
                                       <br>
                                       
                                       Description:
                                       
                                       <textarea name="description"></textarea>
                                       
                                       <br>
                                       
                                       <button type="submit" class="btn btn success">submit</button>
                                       
                                       </form>
                                       
                                       </div> -->
                                    <div class="modal-body">
                                       <ul class="show_task_propaty">
                                          <li class="float-right"><b>Observer: </b><?php echo $y->task_observer_name; ?></li>
                                          <li><b>Creator:</b> <?php  foreach ($member as $m => $k) {
                                             if($k->member_account_id == $value->task_creator_id)
                                             
                                             {
                                             
                                                  echo $k->member_name;
                                             
                                             }
                                             
                                             } ?></li>
                                       </ul>
                                       <div class="work_progress_block">
                                          <label>Task Progress:- </label>
                                          <div class="progress">
                                             <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $y->task_progress; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><span><?php echo $y->task_progress; ?>%</span></div>
                                          </div>
                                       </div>
                                       <br>
                                       <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>TaskController/resub_task" >
                                          <input type="hidden" name="id" value="<?php echo $y->task_resubmit_id; ?>">
                                          <br>
                                          <div class="form-group">
                                             File:<input type="file" name="doc[]" multiple class="form-control">
                                          </div>
                                          <br>
                                          Description:
                                          <div class="form-group" >
                                             <textarea name="description" class="form-control"></textarea>
                                          </div>
                                          <br>
                                          <button type="submit" class="btn btn-success">submit</button>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php }else{ ?> 
                           <?php
                              if($nn->task_submit_id == $qq->task_submit_id){
                              
                                if(!empty($qq->task_resubmit_date)){
                              
                                
                              
                                 if(date("d-m-Y",strtotime($qq->task_resubmit_date)) > date("d-m-Y",strtotime($value->task_dedline_date)))
                              
                              {echo "Bad<br>"; }else if(date("d-m-Y",strtotime($qq->task_resubmit_date)) < date("d-m-Y",strtotime($value->task_dedline_date))){echo "Very Good";}else{ 
                              
                              
                              
                              if(date("h:i",strtotime($qq->task_resubmit_time)) > date("h:i",strtotime($value->task_dedline_time)))
                              
                                          {
                              
                                            echo "Bad<br>";
                              
                                          }
                              
                                          else if(date("h:i",strtotime($qq->task_resubmit_time)) < date("h:i",strtotime($value->task_dedline_time)))
                              
                                          {
                              
                                            echo "Very Good<br>";
                              
                                          }
                              
                                          else
                              
                                          {
                              
                                              echo "Good<br>";
                              
                                          } }
                              
                               
                              
                              
                              
                              # code...
                              
                              } ?>
                           <?php } }?>
                        </td>
                        <?php }  } }  ?>
                     </tr>
                     <?php
                        }
                        
                        } 
                        
                        }
                        
                        }
                        
                        }
                        
                        ?>
                     <?php } } } }}else{
                        //task fewday assign
                        
                        if(date('d-m-Y',strtotime($value->task_start_date)) == date('d-m-Y')|| date('d-m-Y',strtotime($value->task_start_date)) >= date('d-m-Y') || date('h:iA',strtotime($value->task_start_time)) == date('h:iA') || date('h:iA',strtotime($value->task_start_time)) >= date('h:iA'))
                        
                        {
                        
                        
                        
                          ?>
                     <?php 
                        $dd = explode(",", $value->task_assign_member_id);
                        
                        foreach ($dd as $a => $b) {
                        
                          
                        
                          foreach ($member as $k => $v) {
                        
                         if($b == $v->member_id){
                        
                          if($v->member_account_id == $_SESSION['user_id']){
                        
                        ?>
                     <?php 
                        if(date('d-m-Y')>date("d-m-Y",strtotime($value->task_dedline_date)))
                        
                        {
                        
                          $status = "Expire<br>";
                        
                        }
                        
                        else if(date('d-m-Y') == date("d-m-Y",strtotime($value->task_dedline_date)))
                        
                        {
                        
                        
                        
                          // echo date("g:m");
                        
                          // echo substr($value->task_dedline_time, 0,5);
                        
                        
                        
                        
                        
                           if(strtotime(date("h:i")) > strtotime(substr($value->task_dedline_time, 0,5)))
                        
                                        {
                        
                                          $status =  "Expire<br>";
                        
                                        }
                        
                                        else 
                        
                                        {
                        
                                          $status =  "Valid";
                        
                                        }
                        
                                   
                        
                        }
                        
                        else
                        
                        {
                        
                          $status =  "Valid";
                        
                        }
                        
                        
                        
                        ?>
                     <?php foreach ($task_submit as $p => $q) {
                        if($q->task_detail_id == $value->task_detail_id){
                        
                          if($q->task_member_name == $_SESSION['user_name']){
                        
                          if($q->task_status == 0)
                        
                          { ?>
                     <div><?php  $progress_status =  "Pending"; ?></div>
                     <?php }elseif ($q->task_status == 1) {
                        ?>
                     <div><?php  $progress_status =  "Proccess"; ?></div>
                     <?php
                        }else
                        
                        {?>
                     <div><?php $progress_status =  "Completed"; ?></div>
                     <?php
                        }
                        
                        # code...
                        
                        } } }?>
                     <tr style="background: <?php if($progress_status == "Pending"){ echo "#f7e9a3"; }else if($progress_status == "Proccess"){ echo "#a3caf7"; }else{ echo "#a3f7a3"; } ?>">
                        <td><?php echo date("d-m-Y",strtotime($value->task_start_date)); ?>
                           <?php echo $value->task_start_time; ?>
                        </td>
                        <td>
                           <b style="color: <?php if($status != "Valid"){ echo "red"; }else{ echo "green"; } ?>"> <?php echo $status; ?></b>
                        </td>
                        <td><?php echo $value->task_name ?></td>
                        <td>
                           <?php echo date("d-m-Y",strtotime($value->task_dedline_date)); ?>
                           <?php echo $value->task_dedline_time; ?>
                        </td>
                        <td><?php
                           foreach ($member as $m => $n) {
                           
                             if($n->member_account_id == $value->task_creator_id)
                           
                             {
                           
                                  echo $n->member_name;
                           
                             }
                           
                           }
                           
                            ?></td>
                        <td><?php
                           foreach ($member as $m => $n) {
                           
                             if($n->member_id == $value->task_observe_member_id)
                           
                             {
                           
                                  echo $n->member_name;
                           
                             }
                           
                           }
                           
                            ?></td>
                        <td><?php echo $value->task_priority; ?></td>
                        <td>
                           <?php foreach ($task_submit as $p => $q) {
                              if($q->task_detail_id == $value->task_detail_id){
                              
                                if($q->task_member_name == $_SESSION['user_name']){
                              
                                  if(!empty($q->task_submit_date))
                              
                              {?>
                           <div><?php  echo date("d-m-Y",strtotime($q->task_submit_date)); ?></div>
                           <?php }
                              # code...
                              
                              } } } ?>
                           <?php foreach ($task_submit as $p => $q) {
                              if($q->task_detail_id == $value->task_detail_id)
                              
                              {
                              
                                if($q->task_member_name == $_SESSION['user_name']){
                              
                                  if(!empty($q->task_submit_date)){
                              
                                ?>
                           <div><?php  echo date("h:iA",strtotime($q->task_submit_time)) ?></div>
                           <?php } }
                              # code...
                              
                              }  }?>
                        </td>
                        <td>
                           <?php foreach ($task_submit as $p => $q) {
                              if($q->task_detail_id == $value->task_detail_id){
                              
                                if($q->task_member_name == $_SESSION['user_name']){
                              
                                 ?>
                           <div><?php  echo $q->task_progress."%"; ?></div>
                           <?php 
                              # code...
                              
                              } } } ?>
                        </td>
                        <td><?php echo $progress_status; ?></td>
                        <?php foreach ($task_submit as $m => $n) {
                           if($n->task_detail_id == $value->task_detail_id)
                           
                           {
                           
                             if($b == $n->task_member_id){
                           
                           
                           
                             if($n->task_observe_status == 3){?>
                        <td>
                           <?php $mohan=0; foreach ($task_resubmit as $x => $y) {
                              if($y->task_submit_id == $n->task_submit_id){  $mohan=1; } ?>
                           <?php  } if($mohan == 1){ echo "ReSubmit";} ?>
                        </td>
                        <?php }else if($n->task_observe_status == 2){ ?> 
                        <td>Done</td>
                        <?php }else if($n->task_observe_status == 1){?> 
                        <td><button type="button" class="btn btn-success">submit</button></td>
                        <?php }else{ ?>
                        <td>
                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter<?php echo $j; ?>">
                           Show Task
                           </button>
                           <div class="filter_ratio filter_ratio_one">
                              <div class="modal fade" id="exampleModalCenter<?php echo $j; ?>">
                                 <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title">Task</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body">
                                          <div class="row justify-content-center">
                                             <div class="col-xl-8 col-lg-8 col-md-8">
                                                <div class="task_show_left_block_form">
                                                   <ul class="show_task_propaty">
                                                      <li><?php foreach ($task_submit as $m => $n) {
                                                         if($n->task_detail_id == $value->task_detail_id)
                                                         
                                                         {
                                                         
                                                           if($b == $n->task_member_id){
                                                         
                                                         
                                                         
                                                           if($n->task_status == 0)
                                                         
                                                           {?>
                                                         Pending
                                                         </a>
                                                         <?php }
                                                            else if($n->task_status == 1)
                                                            
                                                            { ?>
                                                         Proccess
                                                         </a>
                                                         <?php  }
                                                            else
                                                            
                                                            {?>
                                                         Completed
                                                         </a>
                                                         <?php } ?>
                                                         <?php
                                                            }
                                                            
                                                            }
                                                            
                                                            } ?>
                                                      </li>
                                                      <li class="float-right"><?php echo $value->task_priority; ?></li>
                                                   </ul>
                                                   <div class="form-group">
                                                      <input type="text" name="" placeholder="<?php echo $value->task_name; ?>" class="form-control" disabled>
                                                   </div>
                                                   <div class="form-group">
                                                      <textarea class="form-control" placeholder="Creating a fast" rows="6" disabled=""><?php echo $value->task_description; ?></textarea>
                                                   </div>
                                                   <div class="form-group">
                                                      <!-- <button type="button" class="btn btn-primary custi_light_blue_bg">Show Document file</button> -->
                                                      <?php
                                                         // echo "<pre>";
                                                         
                                                         // print_r($task_document);
                                                         
                                                         
                                                         
                                                          foreach ($task_document as $p => $q) {
                                                         
                                                         
                                                         
                                                                        if($q->task_detail_id == $value->task_detail_id){
                                                         
                                                                          ?>
                                                      <!-- <img src="<?php echo base_url(); ?>images/task_image/<?php echo $q->task_document; ?>" width="50px"> -->
                                                      <u><a style="color: #000;font-weight: bold;" href="<?php echo base_url(); ?>images/task_image/<?php echo $q->task_document; ?>" download ><?php echo $q->task_document; ?></a></u><br>
                                                      <?php
                                                         }
                                                         
                                                         } ?>
                                                   </div>
                                                   <div class="work_progress_block">
                                                      <label>Progress status:-</label>
                                                      <?php foreach ($task_submit as $m => $n) {
                                                         if($n->task_detail_id == $value->task_detail_id)
                                                         
                                                         {
                                                         
                                                           if($b == $n->task_member_id){ ?>
                                                      <div class="progress">
                                                         <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $n->task_progress; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><span><?php echo $n->task_progress; ?>%</span></div>
                                                      </div>
                                                      <?php }}}?>
                                                   </div>
                                                   <div class="form-group">
                                                      <?php foreach ($task_submit as $m => $n) {
                                                         if($n->task_detail_id == $value->task_detail_id)
                                                         
                                                         {
                                                         
                                                           if($b == $n->task_member_id){
                                                         
                                                         
                                                         
                                                          ?>
                                                      <div style="width: 100%;">
                                                         <h6>Progress mode</h6>
                                                         <div style="width: 100%;">
                                                            <input type="range" id="vertical" style="width: 100%;">
                                                            <output  value="<?php echo $j; ?>"><?php echo $n->task_progress; ?></output>
                                                         </div>
                                                         <div class="btn-group" style="justify-content: space-between; width: 100%;">
                                                            <form method="post" action="<?php echo base_url(); ?>TaskController/upd_prog">
                                                               <input type="hidden" name="id" value="<?php  echo $n->task_submit_id; ?>">
                                                               <input type="hidden"  id="dd<?php echo $j; ?>" name="rang">
                                                               <button type="submit" value="submit" class="btn btn-success">update</button>
                                                            </form>
                                                            <?php foreach ($task_submit as $m => $n) {
                                                               if($n->task_detail_id == $value->task_detail_id)
                                                               
                                                               {
                                                               
                                                                 if($b == $n->task_member_id){
                                                               
                                                               
                                                               
                                                                 if($n->task_status == 0)
                                                               
                                                                 {?>
                                                            <a href="<?php echo base_url(); ?>TaskController/change_s?s=<?php echo $n->task_status;  ?>&id=<?php echo $n->task_submit_id; ?>">
                                                            <button type="button" class="btn btn-warning">Pending</button>
                                                            </a>
                                                            <?php }
                                                               else if($n->task_status == 1)
                                                               
                                                               { ?>
                                                            <a href="<?php echo base_url(); ?>TaskController/change_s?s=<?php echo $n->task_status;  ?>&id=<?php echo $n->task_submit_id; ?>">
                                                            <button type="button" class="btn btn-primary">Proccess</button>
                                                            </a>
                                                            <?php  }
                                                               else
                                                               
                                                               {?>
                                                            <a href="<?php echo base_url(); ?>TaskController/change_s?s=<?php echo $n->task_status;  ?>&id=<?php echo $n->task_submit_id; ?>">
                                                            <button type="button" class="btn btn-success">Completed</button>
                                                            </a>
                                                            <?php } ?>
                                                            <?php
                                                               }
                                                               
                                                               }
                                                               
                                                               } ?>
                                                         </div>
                                                      </div>
                                                      <?php
                                                         }
                                                         
                                                         }
                                                         
                                                         } ?>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-xl-4 col-lg-4 col-md-4">
                                                <div class="task_show_right_block_form">
                                                   <div class="seen_dates">
                                                      <p>Seen date : <?php echo date('d-m-Y h:iA') ?></p>
                                                   </div>
                                                   <ul class="task_show_right_block_form_data_list">
                                                      <li>Expiry Status: - <?php if($value->task_assign_status == "today"){ echo "Today";}else{ echo "Few Days";} ?></li>
                                                      <li>Deadline: - <?php echo date('d-m-y',strtotime($value->task_dedline_date)); ?> <?php echo date('h:iA',strtotime($value->task_dedline_time)); ?></li>
                                                      <li>
                                                         <?php 
                                                            $login_url = 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/calendar') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL). '&response_type=code&client_id=' . CLIENT_ID .'&access_type=online';
                                                            
                                                            ?>
                                                         Set reminder:
                                                         <?php foreach ($task_submit as $m => $n) {if($n->task_detail_id == $value->task_detail_id){if($b == $n->task_member_id && !empty($n->task_reminder)){ ?><span><a href="https://calendar.google.com/calendar/r" target="_blank" style="color: red;">Reminder done</a> </span><?php  }else{?>
                                                         <?php if(isset($_GET['code'])){ ?>
                                                         <a href="<?php echo base_url(); ?>TaskController/fetch_cal?code=<?php echo $_GET['code'];  ?>&tid=<?php foreach ($task_submit as $m => $n) {if($n->task_detail_id == $value->task_detail_id){if($b == $n->task_member_id){ echo $n->task_submit_id; }}}?>&uid=<?php foreach ($task_submit as $m => $n) {if($n->task_detail_id == $value->task_detail_id){if($b == $n->task_member_id){ echo $n->task_member_id; }}}?>" target="_blank"><i class="fa fa-bell" style="color: green;"></i></a>
                                                         <?php }else{ ?>
                                                         <a href="<?= $login_url ?>" target="_blank"><i class="fa fa-bell" style="color: red;"></i></a>
                                                         <?php } ?>
                                                         <?php }}}?>
                                                      </li>
                                                   </ul>
                                                   <ul class="task_show_right_block_form_data_list">
                                                      <li>Created By:<?php
                                                         foreach ($member as $m => $n) {
                                                         
                                                           if($n->member_account_id == $value->task_creator_id)
                                                         
                                                           {
                                                         
                                                                echo  $n->member_name;
                                                         
                                                           }
                                                         
                                                         }
                                                         
                                                          ?></li>
                                                      <li>Observer By: <?php
                                                         foreach ($member as $m => $n) {
                                                         
                                                           if($n->member_id == $value->task_observe_member_id)
                                                         
                                                           {
                                                         
                                                                echo $n->member_name;
                                                         
                                                           }
                                                         
                                                         }
                                                         
                                                          ?></li>
                                                   </ul>
                                                   <div class="participants_bloack">
                                                      <div class="participants_title">
                                                         <h4>Participants:-</h4>
                                                      </div>
                                                      <ul class="participants_member">
                                                         <?php
                                                            foreach ($member as $m => $n) {
                                                            
                                                              $bb= explode(",", $value->task_assign_member_id);
                                                            
                                                              foreach ($bb as $q => $p) {
                                                            
                                                            
                                                            
                                                              if($n->member_id == $p)
                                                            
                                                              {
                                                            
                                                                if($n->member_account_id != $_SESSION['user_id']){
                                                            
                                                                  ?>
                                                         <span class="participants_member_profile">
                                                         <?php if(!empty($n->member_image)){ ?>
                                                         <img src="<?php echo base_url(); ?>dist/img/<?php echo $n->member_image; ?>" style="border-radius: 50%;width: 43px;">
                                                         <?php }else{ ?>
                                                         <img src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" style="border-radius: 50%;width: 42px;">
                                                         <?php } ?>
                                                         </span>
                                                         <span class="participants_member_name"><?php  echo $n->member_name; ?></span>
                                                         <?php 
                                                            }
                                                            
                                                            }
                                                            
                                                            }
                                                            
                                                            }
                                                            
                                                            ?>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </td>
                        <td>
                           <?php foreach ($task_submit as $p => $q) {
                              if($q->task_detail_id == $value->task_detail_id){
                              
                                if($q->task_member_name == $_SESSION['user_name']){
                              
                              
                              
                                if($q->task_submit_date!= ""){
                              
                              if(date("d-m-Y",strtotime($q->task_submit_date)) > date("d-m-Y",strtotime($value->task_dedline_date)))
                              
                              {echo "Bad<br>"; }else if(date("d-m-Y",strtotime($q->task_submit_date)) < date("d-m-Y",strtotime($value->task_dedline_date))){echo "Very Good";}else{ 
                              
                              
                              
                              if(date("h:i",strtotime($q->task_submit_time)) > date("h:i",strtotime($value->task_dedline_time)))
                              
                                          {
                              
                                            echo "Bad<br>";
                              
                                          }
                              
                                          else if(date("h:i",strtotime($q->task_submit_time)) < date("h:i",strtotime($value->task_dedline_time)))
                              
                                          {
                              
                                            echo "Very Good<br>";
                              
                                          }
                              
                                          else
                              
                                          {
                              
                                              echo "Good<br>";
                              
                                          } }
                              
                              # code...
                              
                              }else { 
                              
                              
                              
                              if(date('d-m-Y')>date("d-m-Y",strtotime($value->task_dedline_date)))
                              
                              {
                              
                              echo "Overdue<br>";
                              
                              }
                              
                              else if(date('d-m-Y') == date("d-m-Y",strtotime($value->task_dedline_date)))
                              
                              {
                              
                              if(!empty($q->task_submit_time)){
                              
                              if(date("h:i") > date("h:i",strtotime($q->task_submit_time)))
                              
                                          {
                              
                                            echo "Overdue<br>";
                              
                                          }
                              
                                          else 
                              
                                          {
                              
                                            echo "<br>";
                              
                                          }
                              
                              }
                              
                              else
                              
                              {
                              
                              echo "<br>";
                              
                              }
                              
                              }
                              
                              else
                              
                              {
                              
                              echo "<br>";
                              
                              }
                              
                              
                              
                              }} } }?>
                        </td>
                        <td>
                           <?php foreach ($task_submit as $p => $q) {
                              if($q->task_detail_id == $value->task_detail_id){
                              
                                if($q->task_member_name == $_SESSION['user_name']){
                              
                              
                              
                                if($q->task_submit_date!= ""){
                              
                              if(date("d-m-Y",strtotime($q->task_submit_date)) > date("d-m-Y",strtotime($value->task_dedline_date)))
                              
                              {echo "Bad<br>"; }else if(date("d-m-Y",strtotime($q->task_submit_date)) < date("d-m-Y",strtotime($value->task_dedline_date))){echo "Very Good";}else{ 
                              
                              
                              
                              if(date("h:i",strtotime($q->task_submit_time)) > date("h:i",strtotime($value->task_dedline_time)))
                              
                                          {
                              
                                            echo "Bad<br>";
                              
                                          }
                              
                                          else if(date("h:i",strtotime($q->task_submit_time)) < date("h:i",strtotime($value->task_dedline_time)))
                              
                                          {
                              
                                            echo "Very Good<br>";
                              
                                          }
                              
                                          else
                              
                                          {
                              
                                              echo "Good<br>";
                              
                                          } }
                              
                              # code...
                              
                              }else { 
                              
                              
                              
                              if(date('d-m-Y')>date("d-m-Y",strtotime($value->task_dedline_date)))
                              
                              {
                              
                              echo "Overdue<br>";
                              
                              }
                              
                              else if(date('d-m-Y') == date("d-m-Y",strtotime($value->task_dedline_date)))
                              
                              {
                              
                              if(!empty($q->task_submit_time)){
                              
                              if(date("h:i") > date("h:i",strtotime($q->task_submit_time)))
                              
                                          {
                              
                                            echo "Overdue<br>";
                              
                                          }
                              
                                          else 
                              
                                          {
                              
                                            echo "<br>";
                              
                                          }
                              
                              }
                              
                              else
                              
                              {
                              
                              echo "<br>";
                              
                              }
                              
                              }
                              
                              else
                              
                              {
                              
                              echo "<br>";
                              
                              }
                              
                              
                              
                              }} } }?>
                        </td>
                        <?php  } } } } ?>
                        <td>
                           <?php foreach ($task_submit as $m => $n) {
                              if($n->task_detail_id == $value->task_detail_id)
                              
                              {
                              
                                if($b == $n->task_member_id){
                              
                                if($n->task_status == 2 && $n->task_progress ==100 && $n->task_observe_status==0 ){ ?>
                           <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ex<?php echo $j; ?>">
                           Submit Task
                           </button>
                           <!-- Modal -->
                           <div class="modal fade" id="ex<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLongTitle">Submit Task</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <p><b>Task Name: </b><?php echo $value->task_name; ?></p>
                                       <p><b>Observe Name: </b><?php echo $n->task_observe_name; ?></p>
                                       <p><b>Creater Name: </b><?php  foreach ($member as $m => $k) {
                                          if($k->member_account_id == $value->task_creator_id)
                                          
                                          {
                                          
                                               echo $k->member_name;
                                          
                                          }
                                          
                                          } ?>
                                       </p>
                                       <p><b>Task Progress: </b><?php echo $n->task_progress; ?>%</p>
                                       <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>TaskController/sub_task" >
                                          <input type="hidden" name="id" value="<?php echo $n->task_submit_id; ?>">
                                          <br>
                                          File:<input type="file" name="doc[]" multiple>
                                          <br>
                                          Description:
                                          <textarea name="description"></textarea>
                                          <br>
                                          <button type="submit" class="btn btn success">submit</button>
                                       </form>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </td>
                        <?php }else{?>
                        <?php }}} } ?>
                     </tr>
                     <?php foreach ($task_submit  as $mm => $nn) {
                        if($nn->task_detail_id == $value->task_detail_id){
                        
                          if($nn->task_observe_status != 2){
                        
                          foreach ($task_resubmit as $pp => $qq) {
                        
                            if($qq->task_submit_id == $nn->task_submit_id){
                        
                              ?>
                     <tr>
                        <td><?php echo $value->task_name; ?></td>
                        <td><?php
                           foreach ($member as $m => $n) {
                           
                             if($n->member_account_id == $value->task_creator_id)
                           
                             {
                           
                                  echo $n->member_name;
                           
                             }
                           
                           }
                           
                            ?></td>
                        <td><?php
                           foreach ($member as $m => $n) {
                           
                             if($n->member_id == $value->task_observe_member_id)
                           
                             {
                           
                                  echo $n->member_name;
                           
                             }
                           
                           }
                           
                            ?></td>
                        <td><?php echo date("d-m-Y",strtotime($qq->task_submit_date)); ?></td>
                        <td><?php echo date('h:iA',strtotime($qq->task_submit_time)); ?></td>
                        <td><?php echo $value->task_priority; ?></td>
                        <?php foreach ($task_submit as $m => $n) {
                           if($n->task_detail_id == $value->task_detail_id)
                           
                           {
                           
                             if($b == $n->task_member_id){
                           
                           
                           
                             ?>
                        <td>
                           <?php if($qq->status ==3 ){ ?>
                           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#example123<?php echo $x; ?>">
                           Resubmit
                           </button>
                           <?php }elseif($qq->status == 4){ echo "ReSubmit"; }else { echo "submit";} ?>
                           <!-- Modal -->
                           <div class="modal fade" id="example123<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <p><b>Task Name: </b><?php echo $value->task_name; ?></p>
                                       <p><b>Task Description: </b><?php echo $value->task_description; ?></p>
                                       <p><b>Task Document: </b>
                                          <?php foreach ($task_document as $p => $q) {
                                             if($q->task_detail_id == $value->task_detail_id){
                                             
                                               ?>
                                          <img src="<?php echo base_url(); ?>images/task_image/<?php echo $q->task_document; ?>" width="50px">
                                          <?php
                                             }
                                             
                                             } ?>
                                       </p>
                                       <p><b>Task Priority: </b><?php echo $value->task_priority; ?></p>
                                       <p><b>Task resubmit Dedline date: </b><?php echo date('d-m-Y',strtotime($y->task_submit_date)); ?></p>
                                       <p><b>Task resubmit Dedline Time: </b><?php echo date('h:iA',strtotime($y->task_submit_time)); ?></p>
                                       <p><b>Task Description Time: </b><?php echo $y->task_description; ?></p>
                                       <p><b>Task Status: </b><?php 
                                          if($y->task_status == 0)
                                          
                                          {?>
                                          <a href="<?php echo base_url(); ?>TaskController/change_rs?s=<?php echo $y->task_status;  ?>&id=<?php echo $y->task_resubmit_id; ?>">
                                          <button type="button" class="btn btn-warning">Pending</button>
                                          </a>
                                          <?php }
                                             else if($y->task_status == 1)
                                             
                                             { ?>
                                          <a href="<?php echo base_url(); ?>TaskController/change_rs?s=<?php echo $y->task_status;  ?>&id=<?php echo $y->task_resubmit_id; ?>">
                                          <button type="button" class="btn btn-primary">Proccess</button>
                                          </a>
                                          <?php  }
                                             else
                                             
                                             {?>
                                          <a href="<?php echo base_url(); ?>TaskController/change_rs?s=<?php echo $y->task_status;  ?>&id=<?php echo $y->task_resubmit_id; ?>">
                                          <button type="button" class="btn btn-success">Completed</button>
                                          </a>
                                          <?php } ?>
                                       </p>
                                       <p><b>Task Progress: </b><?php 
                                          echo $y->task_progress;?>
                                       <div>
                                          <h6>Progress mode</h6>
                                          <div style="height: 200px;">
                                             <input type="range" id="vertical">
                                             <output value="<?php echo $j; ?>"><?php echo $y->task_progress; ?></output>
                                          </div>
                                          <form method="post" action="<?php echo base_url(); ?>TaskController/upd_re_prog">
                                             <input type="hidden" name="id" value="<?php  echo $y->task_resubmit_id; ?>">
                                             <input type="hidden"  id="sedd<?php echo $j; ?>" name="rang">
                                             <button type="submit" value="submit" class="btn btn-success">update</button>
                                          </form>
                                       </div>
                                       <div><?php
                                          foreach ($member as $m => $aa) {
                                          
                                            $bb= explode(",", $value->task_assign_member_id);
                                          
                                            foreach ($bb as $q => $p) {
                                          
                                          
                                          
                                            if($aa->member_id == $p)
                                          
                                            {
                                          
                                              if($aa->member_account_id != $_SESSION['user_id']){
                                          
                                                 echo $aa->member_name;
                                          
                                               }
                                          
                                            }
                                          
                                          }
                                          
                                          }
                                          
                                           ?></div>
                                       </p>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </td>
                        <td>
                           <?php 
                              if($qq->task_status == 2 && $qq->task_progress ==100 && $qq->status!=1 && $qq->status!=4){
                              
                              ?>
                           <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ex<?php echo $mm; ?>">
                           ReSubmit Task
                           </button> 
                           <!-- Modal -->
                           <div class="modal fade" id="ex<?php echo $mm; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <p><b>Task Name: </b><?php echo $value->task_name; ?></p>
                                       <p><b>Observe Name: </b><?php echo $n->task_observe_name; ?></p>
                                       <p><b>Creater Name: </b><?php  foreach ($member as $m => $k) {
                                          if($k->member_account_id == $value->task_creator_id)
                                          
                                          {
                                          
                                               echo $k->member_name;
                                          
                                          }
                                          
                                          } ?>
                                       </p>
                                       <p><b>Task Progress: </b><?php echo $y->task_progress; ?>%</p>
                                       <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>TaskController/resub_task" >
                                          <input type="hidden" name="id" value="<?php echo $y->task_resubmit_id; ?>">
                                          <br>
                                          File:<input type="file" name="doc[]" multiple>
                                          <br>
                                          Description:
                                          <textarea name="description"></textarea>
                                          <br>
                                          <button type="submit" class="btn btn success">submit</button>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php } ?>
                        </td>
                        <?php }  } }  ?>
                     </tr>
                     <?php
                        }
                        
                        } 
                        
                        }
                        
                        }
                        
                        }
                        
                        ?>
                     <?php } } } }
                        ?>
                     <?php
                        }
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        } }?>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
<div class="filter_ratio filter_ratio_one">
   <div class="modal fade" id="view_participants">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Task</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row justify-content-center">
                  <div class="col-xl-8 col-lg-8 col-md-8">
                     <div class="task_show_left_block_form">
                        <form>
                           <ul class="show_task_propaty">
                              <li>Panding</li>
                              <li class="float-right">High Priority</li>
                           </ul>
                           <div class="form-group">
                              <input type="text" name="" placeholder="Laravel" class="form-control">
                           </div>
                           <div class="form-group">
                              <textarea class="form-control" placeholder="Creating a fast" rows="6"></textarea>
                           </div>
                           <div class="form-group">
                              <button type="button" class="btn btn-primary custi_light_blue_bg">Show Document file</button>
                           </div>
                           <div class="form-group">
                              <label>Status:- &nbsp;&nbsp;&nbsp;</label>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="one" id="chake3">
                                 <label class="form-check-label" for="chake3">Progress</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" id="chake4" name="one">
                                 <label class="form-check-label" for="chake4">Complete</label>
                              </div>
                           </div>
                           <div class="work_progress_block">
                              <label>Progress status:-</label>
                              <div class="progress">
                                 <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><span>70%</span></div>
                              </div>
                           </div>
                           <div class="chateing_block">
                              <div class="me_type_chate the_chate">
                                 <p>How many lecture create?</p>
                              </div>
                              <div class="any_type_chate the_chate">
                                 <p>5 demo lecture.</p>
                              </div>
                              <div class="me_type_chate the_chate">
                                 <p>OK.</p>
                              </div>
                              <div class="me_type_chate the_chate">
                                 <p>Good.</p>
                              </div>
                           </div>
                           <div class="type_msg_block">
                              <div class="col-lg-12">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="form-group mb-0 type_msg_block_box position-relative">
                                          <input type="text" name="msg" class="form-control msg_type_input" placeholder="Type a message">
                                          <button class="msg_sent_btn">
                                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                <path fill="currentColor" d="M1.101 21.757L23.8 12.028 1.101 2.3l.011 7.912 13.623 1.816-13.623 1.817-.011 7.912z"></path>
                                             </svg>
                                          </button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4">
                     <div class="task_show_right_block_form">
                        <div class="seen_dates">
                           <p>Seen date : 15-4-20 5:00 PM</p>
                        </div>
                        <ul class="task_show_right_block_form_data_list">
                           <li>Observe: - Daily</li>
                           <li>Deadline: - 16-4-2020 6:00 PM</li>
                           <li>Set reminder:5 minute</li>
                        </ul>
                        <ul class="task_show_right_block_form_data_list">
                           <li>Created By: Hitesh sir</li>
                           <li>Observer By: Pradip sir</li>
                        </ul>
                        <div class="participants_bloack">
                           <div class="participants_title">
                              <h4>Participants:-</h4>
                           </div>
                           <ul class="participants_member">
                              <li>
                                 <span class="participants_member_profile"></span>
                                 <span class="participants_member_name">Mehul Sir</span>
                              </li>
                              <li>
                                 <span class="participants_member_profile"></span>
                                 <span class="participants_member_name">Mehul Sir</span>
                              </li>
                              <li>
                                 <span class="participants_member_profile"></span>
                                 <span class="participants_member_name">Mehul Sir</span>
                              </li>
                           </ul>
                        </div>
                        <div class="submit_task_btn_block">
                           <button type="button" class="btn btn-block btn-primary custi_light_blue_bg border-0">Submit Task</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include('footer_test.php'); ?>
<script type="text/javascript">
   function loadDoc() {
   
   
   
     setInterval(function(){
   
   
   
       var xhttp = new XMLHttpRequest();
   
       xhttp.onreadystatechange = function() {
   
         if (this.readyState == 4 && this.status == 200) {
   
          document.getElementById("gave_total_task").innerHTML = this.responseText;
   
   
   
         }
   
       };
   
       var m = document.getElementById("gave_total_task").innerHTML;
   
       
   
       $('#gave_total_task_main').text(m);
   
       xhttp.open("GET", "count_dd", true);
   
       xhttp.send();
   
   
   
     },1000);
   
   
   
   
   
   }
   
   
   
   loadDoc();
   
</script>
<script type="text/javascript">
   function loadDocob() {
   
   
   
     setInterval(function(){
   
   
   
       var xhttp = new XMLHttpRequest();
   
       xhttp.onreadystatechange = function() {
   
         if (this.readyState == 4 && this.status == 200) {
   
          document.getElementById("gave_total_ob_task").innerHTML = this.responseText;
   
   
   
         }
   
       };
   
       var m = document.getElementById("gave_total_ob_task").innerHTML;
   
       
   
       $('#gave_total_ob_task_main').text(m);
   
       xhttp.open("GET", "count_ob", true);
   
       xhttp.send();
   
   
   
     },1000);
   
   
   
   
   
   }
   
   
   
   loadDocob();
   
</script>
<script>
   if (document.getElementById("yellow") != null) {
   
    setTimeout(function() {
   
      document.getElementById('yellow').style.display = 'none';
   
    }, 5000);
   
   }
   
</script>
<script></script>
<script>
   var kb=1;
   
   function removeCourse(dvid)
   
   {
   
      
   
      $('#'+dvid).remove();
   
      
   
   }
   
    function addCourse(id)
   
   {
   
       
   
      
   
       var course = $('#member_id'+id).val();
   
       var n = $('option[value='+course+']').text();
   
      
   
      var e = $('<div class="col-sm-3" id="hello'+kb+'"><div class="box box-success box-solid" ><div class="box-header with-border"><h3 class="box-title">'+n+'<input type="hidden" name="members[]" value="'+course+'"></h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" onclick="removeCourse('+"'hello"+kb+"'"+')"><i class="fa fa-times"></i></button></div> </div> </div> </div>');
   
   
   
       $("#show_member"+id).append(e);
   
       kb++;
   
   }
   
   
   
</script>
<script>
   function whichSelect(sss)
   
   {
   
       
   
       if(sss==1)
   
       {
   
             var department = $('#department').val();
   
           $.ajax({
   
             url:'<?php echo base_url(); ?>welcome/filter_course',
   
             type:"post",
   
             data:{
   
               'department_id' : department
   
               },
   
               
   
             success: function(data)
   
             {
   
               $('#display_course').html(data);
   
               $('#sdc').remove();
   
             }
   
           });
   
           
   
       }
   
       else if(sss==2)
   
       {
   
               for(var j=1;j<=10;j++)
   
               {
   
                   
   
                   $('#hello'+j).remove();
   
               }
   
               var department = $('#department').val();
   
           $.ajax({
   
             url:'<?php echo base_url(); ?>welcome/filter_package',
   
             type:"post",
   
             data:{
   
               'department_id' : department
   
               },
   
               
   
             success: function(data)
   
             {
   
               $('#display_course').html(data);
   
             }
   
           });
   
       }
   
   }
   
</script>
<script>
   function selecttime()
   
   {
   
       var faculty_id = $('#faculty').val();
   
       var courseName = $('#courseName').val();
   
       var demo_date = $('#date_selected').val();
   
       if(faculty_id!="")
   
       {
   
         $.ajax({
   
           url : '<?php echo base_url(); ?>welcome/checkTime',
   
           type:"post",
   
           
   
           data:{
   
             'faculty_id':faculty_id,
   
             'courseName':courseName,
   
             'demo_date':demo_date
   
             },
   
             success: function(data)
   
             {
   
               
   
               
   
               $('#showtime').html(data);
   
               $('#myModal').modal("show");
   
               
   
             }
   
           });
   
         
   
       }
   
   }
   
   
   
   
   
   function setTime(time_id)
   
   {
   
       var stime = $('#stimes'+time_id).val();
   
       var etime = $('#etimes'+time_id).val();
   
      
   
       $('#fromTime').val(stime);
   
       $('#toTime').val(etime);
   
       
   
       $('#myModal').modal("hide");
   
      
   
   }
   
   
   
   
   
     <?php if($_SESSION['logtype']=="Branch") { ?>
   
     $( document ).ready(function() {
   
     
   
     var branch_id = $('#branch_id').val();
   
     $.ajax({
   
       url:'<?php echo base_url(); ?>welcome/filter_depart',
   
       type:"post",
   
       data:{
   
         'branch_id' : branch_id
   
         },
   
         
   
       success: function(data)
   
       {
   
         $('#display_depart').html(data);
   
           selectcourse();
   
       }
   
     });
   
     
   
   
   
     
   
     });
   
     
   
     <?php } ?>
   
   
   
     function selectdepart()
   
   {
   
     var branch_id = $('#branch_id').val();
   
     $.ajax({
   
       url:'<?php echo base_url(); ?>TaskController/filter_depart',
   
       type:"post",
   
       data:{
   
         'branch_id' : branch_id
   
         },
   
         
   
       success: function(data)
   
       {
   
         $('#department_id').html(data);
   
       
   
       }
   
     });
   
   }
   
   
   
     
   
    
   
   
   
   
   
   function select_member()
   
   {
   
       
   
       var p_id = $('#parent_id').val();
   
      
   
                // var course = $('#courseName').val();
   
                
   
                // if(course!="")
   
                // {
   
                  $.ajax({
   
                   url:'<?php echo base_url(); ?>TaskController/filter_member',
   
                   type:"post",
   
                   data:{
   
                     
   
                     'parent_id' : p_id
   
                     },
   
                     
   
                   success: function(data)
   
                   {
   
                     $('#child_id').html(data);
   
                   }
   
                 });
   
               // }
   
      
   
       
   
   }
   
   
   
   
   
   function select_hod(type)
   
   {
   
       
   
       var h = type;
   
       // alert(h);
   
       var branch_id = $('#branch_id').val();
   
      
   
                var course = $('#courseName').val();
   
                // alert(h);
   
                // alert(branch_id);
   
                // alert(course);
   
                
   
                if(course!="")
   
                {
   
                  $.ajax({
   
                   url:'<?php echo base_url(); ?>welcome/filter_hod',
   
                   type:"post",
   
                   data:{
   
                     'course_name' : course,
   
                     'branch_id' : branch_id,
   
                     'faculty_type':h
   
                     },
   
                     
   
                   success: function(data)
   
                   {
   
                     $('#display_faculty').html(data);
   
                   }
   
                 });
   
                }
   
      
   
       
   
   }
   
   
   
   function select_package_course()
   
   {
   
       
   
       if($("#packagec").prop("checked")) 
   
       {
   
             var packages = $('#packageName').val();
   
             if(packages!="")
   
             {
   
                  $.ajax({
   
                   url:'<?php echo base_url(); ?>welcome/filter_package_course',
   
                   type:"post",
   
                   data:{
   
                     'package_name' : packages
   
                     
   
                     },
   
                     
   
                   success: function(data)
   
                   {
   
                     $('#pk_course').html(data);
   
                   }
   
                 });  
   
             }
   
       }
   
   }
   
</script>
<script>
   $(function () {
   
     //Initialize Select2 Elements
   
     $('.select2').select2()
   
   
   
     //Datemask dd/mm/yyyy
   
     $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
   
     //Datemask2 mm/dd/yyyy
   
     $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
   
     //Money Euro
   
     $('[data-mask]').inputmask()
   
   
   
     //Date range picker
   
     $('#reservation').daterangepicker()
   
     //Date range picker with time picker
   
     $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:im A' })
   
     //Date range as a button
   
     $('#daterange-btn').daterangepicker(
   
       {
   
         ranges   : {
   
           'Today'       : [moment(), moment()],
   
           'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
   
           'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
   
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
   
           'This Month'  : [moment().startOf('month'), moment().endOf('month')],
   
           'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
   
         },
   
         startDate: moment().subtract(29, 'days'),
   
         endDate  : moment()
   
       },
   
       function (start, end) {
   
         $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
   
       }
   
     )
   
   
   
     //Date picker
   
     $('.datepicker').datepicker({
   
       autoclose: true,
   
         todayHighlight: true,
   
     format:"yyyy-mm-dd"
   
     })
   
     
   
      $(".datepicker" ).datepicker("show");
   
   
   
     //iCheck for checkbox and radio inputs
   
     $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
   
       checkboxClass: 'icheckbox_minimal-blue',
   
       radioClass   : 'iradio_minimal-blue'
   
     })
   
     //Red color scheme for iCheck
   
     $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
   
       checkboxClass: 'icheckbox_minimal-red',
   
       radioClass   : 'iradio_minimal-red'
   
     })
   
     //Flat red color scheme for iCheck
   
     $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
   
       checkboxClass: 'icheckbox_flat-green',
   
       radioClass   : 'iradio_flat-green'
   
     })
   
   
   
     //Colorpicker
   
     $('.my-colorpicker1').colorpicker()
   
     //color picker with addon
   
     $('.my-colorpicker2').colorpicker()
   
   
   
     //Timepicker
   
     $('.timepicker').timepicker({
   
       showInputs: false,
   
      defaultTime: false
   
     })
   
   })
   
</script>
<script type="text/javascript">
   function all_data_show(id)
   
   {
   
     var g_id = id;
   
    
   
     $.ajax({
   
       url:'<?php echo base_url(); ?>TaskController/filter_g_data',
   
       type:"post",
   
       data:{
   
         'g' : g_id
   
         },
   
         
   
       success: function(data)
   
       {
   
         $('#show_data').html(data);
   
       
   
       }
   
     });
   
   }
   
   
   
   
   
   function gave_member(id)
   
   {
   
        var m_id = id;
   
    
   
     $.ajax({
   
       url:'<?php echo base_url(); ?>TaskController/gave_member',
   
       type:"post",
   
       data:{
   
         'm' : m_id
   
         },
   
         
   
       success: function(data)
   
       {
   
         $('#member_id'+id).html(data);
   
       
   
       }
   
     }); 
   
   }
   
   
   
   
   
   $(document).ready(function(){
   
       $('#add_task').click(function(){
   
         var m_id = $('#add_task').val();
   
         var g_id = $('#g_id').val();
   
          $.ajax({
   
       url:'<?php echo base_url(); ?>TaskController/add_task',
   
       type:"post",
   
       data:{
   
         'm' : m_id,
   
         'g':g_id
   
         },
   
         
   
       success: function(data)
   
       {
   
         $('#show_task').html(data);
   
         m_id++;
   
         $('#add_task').val(m_id);
   
         $('#show_task').val(m_id);
   
   
   
       
   
       }
   
          }); 
   
       });
   
   
   
   
   
     
   
   
   
   });
   
   
   
   
   
   function remove_task(id)
   
   {
   
     var a_id = $('#'+id).val();
   
     $("span").remove('#'+a_id);
   
    
   
   }
   
   
   
   function add_group(id,v)
   
   {
   
   
   
      var m_id = id;
   
      var a_g_id = $('#add_group_id'+v).val();
   
     
   
   
   
      $.ajax({
   
       url:'<?php echo base_url(); ?>TaskController/add_assign_group',
   
       type:"post",
   
       data:{
   
         'm' : m_id,
   
         'a_g_id':a_g_id,
   
         'v_id':v
   
         },
   
       success: function(data)
   
       {
   
         $('#show_group'+v).html(data);
   
         // a_g_id++;
   
         //$('#add_group_id'+v).val(a_g_id);
   
       }
   
     });
   
   }
   
   
   
    function add_ob_group(id,v)
   
   {
   
      var m_id = id;
   
   
   
      $.ajax({
   
       url:'<?php echo base_url(); ?>TaskController/add_ob_group',
   
       type:"post",
   
       data:{
   
         'm' : m_id,
   
         'v_id':v
   
         },
   
       success: function(data)
   
       {
   
         $('#show_ob_group'+v).html(data);
   
       
   
       }
   
     });
   
   }
   
   
   
   function task_resubmit(id)
   
   {
   
       var m_id = id;
   
   
   
      $.ajax({
   
       url:'<?php echo base_url(); ?>TaskController/task_resubmit',
   
       type:"post",
   
       data:{
   
         'm' : m_id
   
         },
   
       success: function(data)
   
       {
   
         $('#show_date_time').html(data);
   
       
   
       }
   
       });
   
   }
   
</script>
<script src="range-slider.js"></script>
<script>
   (function () {
   
   
   
     var selector = '[data-rangeSlider]',
   
       elements = document.querySelectorAll(selector);
   
   
   
     // Example functionality to demonstrate a value feedback
   
     function valueOutput(element) {
   
       var value = element.value,
   
         output = element.parentNode.getElementsByTagName('output')[0];
   
         //alert(element.parentNode.getElementsByTagName('output')[0].getAttribute('value'));
   
       output.innerHTML = value;
   
   
   
       oid = element.parentNode.getElementsByTagName('output')[0].getAttribute('value');
   
      $('#dd'+oid).val(value);
   
      $('#redd'+oid).val(value);
   
      $('#medd'+oid).val(value);
   
      $('#sedd'+oid).val(value);
   
     }
   
   
   
     for (var i = elements.length - 1; i >= 0; i--) {
   
       valueOutput(elements[i]);
   
     }
   
   
   
     Array.prototype.slice.call(document.querySelectorAll('input[type="range"]')).forEach(function (el) {
   
       el.addEventListener('input', function (e) {
   
         valueOutput(e.target);
   
       }, false);
   
     });
   
   
   
   
   
     // Example functionality to demonstrate disabled functionality
   
     var toggleBtnDisable = document.querySelector('#js-example-disabled button[data-behaviour="toggle"]');
   
     toggleBtnDisable.addEventListener('click', function (e) {
   
       var inputRange = toggleBtnDisable.parentNode.querySelector('input[type="range"]');
   
       console.log(inputRange);
   
       if (inputRange.disabled) {
   
         inputRange.disabled = false;
   
       }
   
       else {
   
         inputRange.disabled = true;
   
       }
   
       inputRange.rangeSlider.update();
   
     }, false);
   
   
   
     // Example functionality to demonstrate programmatic value changes
   
     var changeValBtn = document.querySelector('#js-example-change-value button');
   
     changeValBtn.addEventListener('click', function (e) {
   
       var inputRange = changeValBtn.parentNode.querySelector('input[type="range"]'),
   
         value = changeValBtn.parentNode.querySelector('input[type="number"]').value,
   
         event = document.createEvent('Event');
   
   
   
       event.initEvent('change', true, true);
   
   
   
       inputRange.value = value;
   
       inputRange.dispatchEvent(event);
   
     }, false);
   
   
   
     // Example functionality to demonstrate programmatic buffer set
   
     var stBufferBtn = document.querySelector('#js-example-buffer-set button');
   
     stBufferBtn.addEventListener('click', function (e) {
   
       var inputRange = stBufferBtn.parentNode.querySelector('input[type="range"]'),
   
         value = stBufferBtn.parentNode.querySelector('input[type="number"]').value;
   
   
   
       inputRange.rangeSlider.update({buffer: value});
   
     }, false);
   
   
   
     // Example functionality to demonstrate destroy functionality
   
     var destroyBtn = document.querySelector('#js-example-destroy button[data-behaviour="destroy"]');
   
     destroyBtn.addEventListener('click', function (e) {
   
       var inputRange = destroyBtn.parentNode.querySelector('input[type="range"]');
   
       console.log(inputRange);
   
       inputRange.rangeSlider.destroy();
   
     }, false);
   
   
   
     var initBtn = document.querySelector('#js-example-destroy button[data-behaviour="initialize"]');
   
   
   
     initBtn.addEventListener('click', function (e) {
   
       var inputRange = initBtn.parentNode.querySelector('input[type="range"]');
   
       rangeSlider.create(inputRange, {});
   
     }, false);
   
   
   
     //update range
   
     var updateBtn1 = document.querySelector('#js-example-update-range button');
   
     updateBtn1.addEventListener('click', function (e) {
   
       var inputRange = updateBtn1.parentNode.querySelector('input[type="range"]');
   
   
   
       inputRange.rangeSlider.update({min: 0, max: 20, step: 0.5, value: 1.5, buffer: 70});
   
     }, false);
   
   
   
   
   
     var toggleBtn = document.querySelector('#js-example-hidden button[data-behaviour="toggle"]');
   
     toggleBtn.addEventListener('click', function (e) {
   
       var container = e.target.previousElementSibling;
   
       if (container.style.cssText.match(/display[\s:]{1,3}none/)) {
   
         container.style.cssText = '';
   
       } else {
   
         container.style.cssText = 'display: none;';
   
       }
   
     }, false);
   
   
   
     // Basic rangeSlider initialization
   
     rangeSlider.create(elements, {
   
   
   
       // Callback function
   
       onInit: function () {
   
       },
   
   
   
       // Callback function
   
       onSlideStart: function (value, percent, position) {
   
         console.info('onSlideStart', 'value: ' + value, 'percent: ' + percent, 'position: ' + position);
   
       },
   
   
   
       // Callback function
   
       onSlide: function (value, percent, position) {
   
         console.log('onSlide', 'value: ' + value, 'percent: ' + percent, 'position: ' + position);
   
       },
   
   
   
       // Callback function
   
       onSlideEnd: function (value, percent, position) {
   
         console.warn('onSlideEnd', 'value: ' + value, 'percent: ' + percent, 'position: ' + position);
   
       }
   
     });
   
   
   
     rangeSlider.create(document.querySelector('#vertical'), {
   
       vertical: true
   
     });
   
   
   
   })();
   
</script>
<script type="text/javascript">
   //   function make_chat_dialog_box(to_user_id,to_user_name)
   
   // {
   
   //   var modal_content = '<div id ="user_dialog_'+to_user_id+'" class="user_dialog"  title="You have chat with '+to_user_name+'">';
   
   //   modal_content += '<div style="height:400px;border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px;padding:16px;width:300px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id
   
   //   +'">';
   
   //   //modal_content += fetch_user_chat_history(to_user_id);
   
   //   modal_content += '</div>';
   
   //   modal_content += '<div class ="form-group">';
   
   //   modal_content += 
   
   //   '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
   
   //   modal_content += '</div><div class="form-group" align="right">';
   
   //   modal_content += '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
   
   //   $('#user_model_details').html(modal_content);
   
   // }
   
   
   
   
   
   // $(document).on('click','.start_chat',function(){
   
   
   
   //   var to_user_id  = $(this).data('touserid');
   
   //   var to_user_name = $(this).data('tousername');
   
   //   alert(to_user_name);
   
   //   make_chat_dialog_box(to_user_id,to_user_name);
   
   //   $("#user_dialog_"+to_user_id).dialog({
   
   //     autoOpen:false,
   
   //     width:400
   
   //   });
   
   //    $('#user_dialog_'+to_user_id).dialog('open');
   
   // });
   
   
   
   function send_chat(id,pos){
   
   
   
     var to_user_id = id;
   
     alert(to_user_id);
   
     var chat_message =  $('#chat_message_'+pos).val();
   
     alert(chat_message);
   
     $.ajax({
   
       url:"<?php echo base_url(); ?>TaskController/ins_chat",
   
       method:"POST",
   
       data:{
   
         to_user_id:to_user_id,
   
         chat_message:chat_message
   
       },
   
       success:function(res)
   
       {
   
         $('#chat_message_'+to_user_id).val('');
   
        // $('#chat_history_'+to_user_id).html(res);
   
       }
   
     });
   
   };
   
   
   
   
   
   
   
   $(window).scroll(function() {
   
   $('.chateing_block').scrollBottom();
   
   })
   
</script>