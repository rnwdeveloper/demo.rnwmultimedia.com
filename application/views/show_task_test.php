<main class="main_content d-inline-block">
    <section class="page_title_block d-inline-block w-100 position-relative pb-0">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-11 mx-auto text-center" >
            <div class="page_heading">
              <h1>ADD TASK</h1>
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
                  <th>Task Expiry</th>
                  <th>Name</th>
                  <th>Deadline</th>
                  <th>Created </th>
                  <th>Observer</th>
                  <th>Priority</th>
                  <th>Action</th>
                  <th>Final Status</th>
                  
                </tr>
               

                 <?php foreach ($assign_task as $w => $value) {
                            


                         if($value->task_creator_id == $_SESSION['user_id']){ ?>
                        <tr>
                             <td><?php 
                            if(date('d-m-Y')>date("d-m-Y",strtotime($value->task_dedline_date)))
                            {
                              echo "Expire<br>";
                            }
                            else if(date('d-m-Y') == date("d-m-Y",strtotime($value->task_dedline_date)))
                            {

                              // echo date("g:m");
                              // echo substr($value->task_dedline_time, 0,5);
                            

                               if(date("g:m") > substr($value->task_dedline_time, 0,5))
                                            {
                                              echo "Expire<br>";
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
                          <td><?php echo date("d-m-Y",strtotime($value->task_dedline_date)); ?> <?php echo $value->task_dedline_time; ?></td>
                          <!-- <td><?php echo $value->task_dedline_time; ?></td> -->
                          <!-- <td><?php echo $value->task_description; ?></td> -->
                         <!--  <td>
                            <?php foreach ($task_document as $p => $t) {
                                      if($t->task_detail_id == $value->task_detail_id){
                                        ?>
                                          <img src="<?php echo base_url(); ?>images/task_image/<?php echo $t->task_document; ?>" width="50px">
                                        <?php
                                      }
                                    } ?>
                          </td> -->
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
                                
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ss<?php echo $w; ?>">
             Show Task Details
            </button>

            <!-- Modal -->
            <div class="filter_ratio filter_ratio_one">
    <div class="modal fade" id="ss<?php echo $w; ?>">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Task</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>


                  <div class="modal-body">

                      <table class="table table-bordered table-striped create_responsive_table">
                        <tr>
                          <td>Member Name</td>
                          <td>Member Status</td>
                          <td>Member Progress</td>
                          <td>Submit Date&time</td>
                          <td>Action</td>
                          <td>Performance</td>
                        </tr>
                        <?php


                         foreach ($task_submit as $p => $q) {
                                          // echo "<pre>";
                        
                        // die;
                                          if($q->task_detail_id == $value->task_detail_id)
                                          {?>
                        <tr>


                              <td><?php  echo $q->task_member_name; ?></td>
                                      
                                     <td><?php 
                                        if($q->task_status == 0)
                                        { ?>
                                           <div><?php  echo "Pending"; ?></div>
                                       <?php }elseif ($q->task_status == 1) {
                                       ?>
                                        <div><?php  echo "Proccess"; ?></div>
                                       <?php
                                       }else
                                       {?>
                                         <div><?php  echo "Completed"; ?></div>
                                       <?php
                                       }
                                      ?></td>
                                      <td>
                                           <div><?php  echo $q->task_progress; ?>%</div>
                                      </td>
                                      <td>

                                         <?php 


                                         if(!empty($q->task_submit_date))
                                         {

                                         echo date('d-m-Y',strtotime($q->task_submit_date));  echo "&nbsp;&nbsp;".date('h:iA',strtotime($q->task_submit_time)); 
                                         }
                                         ?>
                                      </td>




                     <td><?php 
                              if($q->task_observe_status == 0)
                              { ?>
                                 <div><button type="button" class="btn btn-danger">Unsubmit</button></div>
                                <?php  }else if($q->task_observe_status == 3){ ?>
                               
                            
                              <?php foreach ($task_resubmit as $e => $f) {
                                  if($f->task_submit_id == $q->task_submit_id)
                                  {
                                      if($f->status == 1)
                                      { ?>
                                       <button type="button" class="btn btn-success" data-toggle="modal" data-target="#m<?php echo $w; ?>">

                                ReSubmit
                                </button>
                                 <div class="modal fade" id="m<?php echo $w; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">





                                                                <ul>
                       <li class="float-right"><b>Member Name: </b><?php echo $q->task_member_name; ?></li>
                      <li><b>Task Name: </b> <?php echo $value->task_name; ?></li>
                      <li>
                      <label><b>Task Description:</b></label>
                      <div class="form-group" >
                                    <textarea name="description" class="form-control" disabled><?php echo $value->task_description; ?></textarea>
                                    </div>
                    </li>
                    <li>
                      <label><b>Task Document:</b></label>
                      <div class="form-group" >
                                     <?php foreach ($task_document as $p => $t) {
                                      if($t->task_detail_id == $value->task_detail_id){
                                        ?>
                                          <img src="<?php echo base_url(); ?>images/task_image/<?php echo $t->task_document; ?>" width="50px">
                                        <?php
                                      }
                                    } ?>
                                    </div>
                    </li>


                    <h2>Resubmit Details</h2>

                    <li>
                      <label><b>Date&time: </b></label>
                      <?php echo date('d-m-Y',strtotime($f->task_submit_date)); ?>
                      <?php echo date('h:iA',strtotime($f->task_submit_time)); ?>
                    </li>

                    <label><b>Task Resubmit Document:</b></label>
                   <li>
                      
                      <div class="form-group" >
                                     <?php $img = explode(",", $f->task_submit_document);
                                      foreach ($img as $m => $o) {
                                        ?>
                                          <img src="<?php echo base_url(); ?>images/task_image/<?php echo $o; ?>" width="50px">
                                        <?php
                                      }
                                     ?>
                                    </div>
                    </li>
                    <li>
                      <label><b>Task Description:</b></label>
                      <div class="form-group" >
                                    <textarea name="description" class="form-control" disabled><?php echo $f->task_submit_detail; ?></textarea>
                                    </div>
                    </li>
                    </ul>

                             <!--        <h1>Name:<?php echo $q->task_member_name; ?></h1>
                                      <p><b>Task Name: </b><?php echo $value->task_name; ?></p>
                                   <p><b>Task Description: </b><?php echo $value->task_description; ?></p>
                                    <p><b>Task Document: </b>
                                    <?php foreach ($task_document as $p => $t) {
                                      if($t->task_detail_id == $value->task_detail_id){
                                        ?>
                                          <img src="<?php echo base_url(); ?>images/task_image/<?php echo $t->task_document; ?>" width="50px">
                                        <?php
                                      }
                                    } ?>
                                    </p>
                                    <p><b>Task  Submit Document: </b>
                                    <?php $img = explode(",", $f->task_submit_document);
                                      foreach ($img as $m => $o) {
                                        ?>
                                          <img src="<?php echo base_url(); ?>images/task_image/<?php echo $o; ?>" width="50px">
                                        <?php
                                      }
                                     ?>
                                    </p>
                                    <p><b>Task resubmit Description: </b><?php echo $f->task_submit_detail; ?></p>
                                    <p><b>Task resubmitdate: </b><?php echo $f->task_resubmit_date; ?></p>
                                    <p><b>Task resubmittime: </b><?php echo $f->task_resubmit_time; ?></p> -->

                                 


                                     
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                  </div>
                                </div>
                              </div>



                                     <?php  }else if($f->status == 3){?>
                                 <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#m<?php echo $w; ?>">

                                ReSubmit
                                </button>
                                 <div class="modal fade" id="m<?php echo $w; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $value->task_name; ?></h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                    <ul>
                                      <li>Name:<?php echo $q->task_member_name; ?></li>
                                      <li>
                                        <div class="form-group">
                                          <textarea class="form-control" disabled=""><?php echo $f->task_description; ?></textarea>
                                        </div>
                                      </li>
                                      <li>
                                        <b>Task resubmitdate: </b><?php echo date('d-m-Y',strtotime($f->task_submit_date)); ?> <?php echo date('h:iA',strtotime($f->task_submit_time)); ?>
                                      </li>
                                      <li><b>Status:</b><?php if($f->task_status == 0)
                              { ?>
                                <?php  echo "Pending"; ?>
                             <?php }elseif ($f->task_status == 1) {
                             ?>
                              <?php  echo "Proccess"; ?>
                             <?php
                             }else
                             {?>
                               <?php  echo "Completed"; ?>
                             <?php
                             }
                              ?></li>
                              <li>
                                <b>Task Progress: </b><?php echo $f->task_progress; ?>
                              </li>
                                    </ul>
                                   <!--  <h1>Name:<?php echo $q->task_member_name; ?></h1>
                                    
                                    <p><b>Task resubmit Description: </b></p>
                                    <p><b>Task resubmitdate: </b><?php echo date('d-m-Y',strtotime($f->task_submit_date)); ?></p>
                                    <p><b>Task resubmittime: </b><?php echo date('h:iA',strtotime($f->task_submit_time)); ?></p>
                                
                                    <p><b>Task staus: </b> -->
                           <!--   <?php if($f->task_status == 0)
                              { ?>
                                 <div><?php  echo "Pending"; ?></div>
                             <?php }elseif ($f->task_status == 1) {
                             ?>
                              <div><?php  echo "Proccess"; ?></div>
                             <?php
                             }else
                             {?>
                               <div><?php  echo "Completed"; ?></div>
                             <?php
                             }
                              ?></p> -->
                                   <!--  <p></p> -->
                                      
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                  </div>
                                </div>
                              </div>



                               <?php } } } ?>
                              <!-- Modal -->


                                
                          <?php
                            
                             }else if($q->task_observe_status == 2){ ?> Done <?php }else{ ?>
                               

                             <button type="button" class="btn btn-success" data-toggle="modal" data-target="#m123<?php echo $w; ?>">
                                Submit
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="m123<?php echo $w; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Work perfoemance:
                                           <?php 



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
                                       }else
                                       {
                                        echo "<br>";
                                       }
                            }
                            else
                            {
                              echo "<br>";
                            }

                            }?>


                                      </h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                    <ul>
                       <li class="float-right"><b>Member Name: </b><?php echo $q->task_member_name; ?></li>
                      <li><b>Task Name: </b> <?php echo $value->task_name; ?></li>
                     <!--  <li>
                      <label><b>Task Description:</b></label>
                      <div class="form-group" >
                                    <textarea name="description" class="form-control" disabled><?php echo $value->task_description; ?></textarea>
                                    </div>
                    </li>
                    <li>
                      <label><b>Task Document:</b></label>
                      <div class="form-group" >
                                     <?php foreach ($task_document as $p => $t) {
                                      if($t->task_detail_id == $value->task_detail_id){
                                        ?>
                                          <img src="<?php echo base_url(); ?>images/task_image/<?php echo $t->task_document; ?>" width="50px">
                                        <?php
                                      }
                                    } ?>
                                    </div>
                    </li> -->


                    

                    <li>
                      <label><b>Date&time: </b></label>
                      <?php echo date('d-m-Y',strtotime($q->task_submit_date)); ?>
                      <?php echo date('h:iA',strtotime($q->task_submit_time)); ?>
                    </li>

                    <label><b>Task submit Document:</b></label>
                   <li>
                      
                      <div class="form-group" >
                                     <?php $img = explode(",", $q->task_submit_document);
                                      foreach ($img as $m => $o) {
                                        ?>
                                          <img src="<?php echo base_url(); ?>images/task_image/<?php echo $o; ?>" width="50px">
                                        <?php
                                      }
                                     ?>
                                    </div>
                    </li>
                    <li>
                      <label><b>Task Description:</b></label>
                      <div class="form-group" >
                                    <textarea name="description" class="form-control" disabled><?php echo $q->task_submit_detail; ?></textarea>
                                    </div>
                    </li>
                    </ul>
                   
                                    <!-- <h1>Name:<?php echo $q->task_member_name; ?></h1>
                                      <p><b>Task Name: </b><?php echo $value->task_name; ?></p>
                                   <p><b>Task Description: </b><?php echo $value->task_description; ?></p> -->
                                    <!-- <p><b>Task Document: </b>
                                   
                                    </p> -->
                                    <!-- <p><b>Task  Submit Document: </b>
                                    
                                    </p> -->
                                   <!--  <p><b>Task submit Description: </b></p> -->
                                   <!--  <p><b>Task date: </b></p>
                                    <p><b>Task time: </b></p> -->
                                      <!-- <form method="post" action="<?php echo base_url(); ?>TaskController/upd_observe_comment">
                                              <input type="hidden" name="id" value="<?php  echo $q->task_submit_id; ?>">
                                              
                                               <input type="hidden" name="task_member_id" value="<?php echo $q->task_member_id; ?>">
                                                <input type="hidden" name="task_observe_name" value="<?php echo $q->task_observe_name; ?>">
                                                

                                               Observe Ans:
                                              <input type="radio" name="ob" value="2" onclick="task_resubmit(this.value,<?php  echo $q->task_submit_id; ?>)">Done
                                              <input type="radio" name="ob" value="3" onclick="task_resubmit(this.value,<?php  echo $q->task_submit_id; ?>)">Resubmit
                                              <div id="show_date_time_<?php  echo $q->task_submit_id; ?>"></div>
                                              <div class="form-group" >
                                              <textarea name="name" class="form-control"></textarea>
                                              </div>
                                               <button type="submit" value="submit" class="btn btn-success">submit</button>
                                             </form> -->
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                  </div>
                                </div>
                              </div>

                             <?php
                             }
                          ?></td>

                   
                            <td> <?php 



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
                                       }else
                                       {
                                        echo "<br>";
                                       }
                            }
                            else
                            {
                              echo "<br>";
                            }

                            }?></td>



                        </tr>
                        <?php }} ?>
                      </table>
                  </div>


                 </div>
      </div>
    </div>  
  </div>

                            </td>
                            
                              

                           <td><?php if($value->status == 1){ echo "Completed"; }else{echo  "Not Completed";;} ?></td>
                         
                          
                          
                        </tr>

                      <?php } } ?>


                
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
                      <div class="me_type_chate the_chate"><p>How many lecture create?</p></div>
                      <div class="any_type_chate the_chate"><p>5 demo lecture.</p></div>
                      <div class="me_type_chate the_chate"><p>OK.</p></div>
                      <div class="me_type_chate the_chate"><p>Good.</p></div>
                    </div>
                    <div class="type_msg_block">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group mb-0 type_msg_block_box position-relative">
                              <input type="text" name="msg" class="form-control msg_type_input" placeholder="Type a message">
                              <button class="msg_sent_btn">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="currentColor" d="M1.101 21.757L23.8 12.028 1.101 2.3l.011 7.912 13.623 1.816-13.623 1.817-.011 7.912z"></path></svg>
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

<script>
    
    



</script>

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

<!-- <script>
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
</script> -->
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

  function task_resubmit(id,uid)
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
        $('#show_date_time_'+uid).html(data);
      
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
     $('#redd').val(value);
     $('#medd').val(value);
     $('#sedd').val(value);
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

