 
<?php @$user_permission =  explode(",",@$_SESSION['user_permission']);
        @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);?>
		
    <?php date_default_timezone_set("Asia/Calcutta");  ?>    >
  <div class="content-wrapper">
<br>
<section class="content">
      <h1>Add Task</h1>
                    <div class="row">
                    <table border="1">
                        <tr>
                         <th>Task Name</th>
                         <th>Task Description</th>
                         <th>Task Document</th>
                         <th>Task Creator</th>
                         <th>Task Observer</th>
                         <th>Task Dedline Date</th>
                         <th>Task Dedline Time</th>
                         <th>Task Priority</th>
                         <th>Member name</th>
                         <th>Task Status</th>
                         <th>Task Prossess</th>
                         <th>Task Work</th>
                         <th>All Completed</th>
                         <th>Task Dedline</th>
                        </tr>

                        <?php foreach ($assign_task as $w => $value) {
                            


                         if($value->task_creator_id == $_SESSION['user_id']){ ?>
                        <tr>
                          <td><?php echo $value->task_name; ?></td>
                          <td><?php echo $value->task_description; ?></td>
                          <td>
                            <?php foreach ($task_document as $p => $t) {
                                      if($t->task_detail_id == $value->task_detail_id){
                                        ?>
                                          <img src="<?php echo base_url(); ?>images/task_image/<?php echo $t->task_document; ?>" width="50px">
                                        <?php
                                      }
                                    } ?>
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
                            <td><?php echo date("d-m-Y",strtotime($value->task_dedline_date)); ?></td>
                          <td><?php echo $value->task_dedline_time; ?></td>
                          <td><?php echo $value->task_priority; ?></td>
                           <td><?php foreach ($task_submit as $p => $q) {
                              
                              if($q->task_detail_id == $value->task_detail_id)
                              {?>
                                 <div><?php  

                                 echo $q->task_member_name; ?></div>
                             <?php }
                             # code...
                           } ?></td>
                           <td><?php foreach ($task_submit as $p => $q) {
                            if($q->task_detail_id == $value->task_detail_id){
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
                             # code...
                           } } ?></td>
                               <td><?php foreach ($task_submit as $p => $q) {

                              if($q->task_detail_id == $value->task_detail_id)
                              {?>
                                 <div><?php  echo $q->task_progress; ?>%</div>
                             <?php }
                             # code...
                           } ?></td>
                              <td><?php foreach ($task_submit as $p => $q) {
                                if($q->task_detail_id == $value->task_detail_id){
                              if($q->task_observe_status == 0)
                              { ?>
                                 <div><button type="button" class="btn btn-danger">Not Submit</button></div>
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
                                    <h1>Name:<?php echo $q->task_member_name; ?></h1>
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
                                    <p><b>Task resubmittime: </b><?php echo $f->task_resubmit_time; ?></p>
                                     <!--  <form method="post" action="<?php echo base_url(); ?>TaskController/upd_re_observe_comment">
                                              <input type="hidden" name="id" value="<?php  echo $q->task_submit_id; ?>">
                                              <input type="hidden" name="reid" value="<?php  echo $f->task_resubmit_id; ?>">
                                               <input type="hidden" name="task_member_id" value="<?php echo $q->task_member_id; ?>">
                                                <input type="hidden" name="task_observe_name" value="<?php echo $q->task_observe_name; ?>">
                                                

                                               Observe Ans:
                                              <input type="radio" name="ob" value="2" onclick="task_resubmit(this.value)">Done
                                              <input type="radio" name="ob" value="3" onclick="task_resubmit(this.value)">Resubmit
                                              <div id="show_date_time"></div>
                                              <textarea name="name"></textarea>
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



                                     <?php  }else if($f->status == 3){?>
                                 <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#m<?php echo $w; ?>">

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
                                    <h1>Name:<?php echo $q->task_member_name; ?></h1>
                                    
                                    <p><b>Task resubmit Description: </b><?php echo $f->task_description; ?></p>
                                    <p><b>Task resubmitdate: </b><?php echo date('d-m-Y',strtotime($f->task_submit_date)); ?></p>
                                    <p><b>Task resubmittime: </b><?php echo date('H:mA',strtotime($f->task_submit_time)); ?></p>
                                
                                    <p><b>Task staus: </b>
                             <?php if($f->task_status == 0)
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
                              ?></p>
                                    <p><b>Task Progress: </b><?php echo $f->task_progress; ?></p>
                                      
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
                               

                             <button type="button" class="btn btn-success" data-toggle="modal" data-target="#m<?php echo $w; ?>">
                                Submit
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="m<?php echo $w; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Work perfoemance:
                                           <?php 

                                  if($q->task_submit_date!= ""){
                              if(date("d-m-Y",strtotime($q->task_submit_date)) > date("d-m-Y",strtotime($value->task_dedline_date)))
                              {echo "Bad<br>"; }else if(date("d-m-Y",strtotime($q->task_submit_date)) < date("d-m-Y",strtotime($value->task_dedline_date))){echo "Very Good";}else{ 

                                if(date("h:m",strtotime($q->task_submit_time)) > date("h:m",strtotime($value->task_dedline_time)))
                                            {
                                              echo "Bad<br>";
                                            }
                                            else if(date("h:m",strtotime($q->task_submit_time)) < date("h:m",strtotime($value->task_dedline_time)))
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
                           		 if(date("h:m") > date("h:m",strtotime($q->task_submit_time)))
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
                                    <h1>Name:<?php echo $q->task_member_name; ?></h1>
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
                                    <?php $img = explode(",", $q->task_submit_document);
                                      foreach ($img as $m => $o) {
                                        ?>
                                          <img src="<?php echo base_url(); ?>images/task_image/<?php echo $o; ?>" width="50px">
                                        <?php
                                      }
                                     ?>
                                    </p>
                                    <p><b>Task submit Description: </b><?php echo $q->task_submit_detail; ?></p>
                                    <p><b>Task date: </b><?php echo date('d-m-Y',strtotime($q->task_submit_date)); ?></p>
                                    <p><b>Task time: </b><?php echo date('H:mA',strtotime($q->task_submit_time)); ?></p>
                                    <!--   <form method="post" action="<?php echo base_url(); ?>TaskController/upd_observe_comment">
                                              <input type="hidden" name="id" value="<?php  echo $q->task_submit_id; ?>">
                                              
                                               <input type="hidden" name="task_member_id" value="<?php echo $q->task_member_id; ?>">
                                                <input type="hidden" name="task_observe_name" value="<?php echo $q->task_observe_name; ?>">
                                                

                                               Observe Ans:
                                              <input type="radio" name="ob" value="2" onclick="task_resubmit(this.value)">Done
                                              <input type="radio" name="ob" value="3" onclick="task_resubmit(this.value)">Resubmit
                                              <div id="show_date_time"></div>
                                              <textarea name="name"></textarea>
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
                             # code...
                           }  }?></td>
                           <td><?php if($value->status == 1){ echo "Completed"; }else{echo  "Not Completed";;} ?></td>
                           <td><?php foreach ($task_submit as $p => $q) {

                                if($q->task_detail_id == $value->task_detail_id){
                                  if($q->task_member_name == $_SESSION['user_name']){

                                  if($q->task_submit_date!= ""){
                              if(date("d-m-Y",strtotime($q->task_submit_date)) > date("d-m-Y",strtotime($value->task_dedline_date)))
                              {echo "Bad<br>"; }else if(date("d-m-Y",strtotime($q->task_submit_date)) < date("d-m-Y",strtotime($value->task_dedline_date))){echo "Very Good";}else{ 

                                if(date("h:m",strtotime($q->task_submit_time)) > date("h:m",strtotime($value->task_dedline_time)))
                                            {
                                              echo "Bad<br>";
                                            }
                                            else if(date("h:m",strtotime($q->task_submit_time)) < date("h:m",strtotime($value->task_dedline_time)))
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
                           		 if(date("h:m") > date("h:m",strtotime($q->task_submit_time)))
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

                           	}} } }?></td>
                          
                        </tr>

                      <?php } } ?>
                    </table>
                       
                    </div>   
                </section>




 
                 <section class="content">
      <h1>Observe Task</h1>
                    <div class="row">
                    <table border="1">
                        <tr>
                         <th>Task Name</th>
                         <th>Task Description</th>
                         <th>Task Document</th>
                         <th>Task Creator</th>
                         <th>Task Observer</th>
                         <th>Task Dedline Date</th>
                         <th>Task Dedline Time</th>
                         <th>Task Priority</th>
                         <th>Member name</th>
                         <th>Task Status</th>
                         <th>Task Prossess</th>

                         <th>Task Work</th>
                         <th>Task Dedline</th>
                        </tr>

                        <?php foreach ($assign_task as $w => $value) {
                            foreach ($member as $k => $v) {
                           if($value->task_observe_member_id == $v->member_id){
                         if($v->member_account_id == $_SESSION['user_id']){ ?>
                        <tr>
                          <td><?php echo $value->task_name; ?></td>
                          <td><?php echo $value->task_description; ?></td>
                          <td>
                            <?php foreach ($task_document as $p => $t) {
                                      if($t->task_detail_id == $value->task_detail_id){
                                        ?>
                                          <img src="<?php echo base_url(); ?>images/task_image/<?php echo $t->task_document; ?>" width="50px">
                                        <?php
                                      }
                                    } ?>
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
                            <td><?php echo date("d-m-Y",strtotime($value->task_dedline_date)); ?></td>
                          <td><?php echo date('H:mA',strtotime($value->task_dedline_time)); ?></td>
                          <td><?php echo $value->task_priority; ?></td>
                           <td><?php foreach ($task_submit as $p => $q) {
                            if($q->task_detail_id == $value->task_detail_id){

                              if($q->task_detail_id == $value->task_detail_id)
                              {?>
                                 <div><?php  echo $q->task_member_name; ?></div>
                             <?php }
                             # code...
                           } }?></td>
                           <td><?php foreach ($task_submit as $p => $q) {
                            if($q->task_detail_id == $value->task_detail_id){
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
                            
                           } }?></td>
                               <td><?php foreach ($task_submit as $p => $q) {
                                if($q->task_detail_id == $value->task_detail_id){

                              if($q->task_detail_id == $value->task_detail_id)
                              {?>
                                 <div><?php  echo $q->task_progress; ?>%</div>
                             <?php }
                             # code...
                           } }?></td>
                              <td><?php foreach ($task_submit as $p => $q) {
                                if($q->task_detail_id == $value->task_detail_id){
                              if($q->task_observe_status == 0)
                              { ?>
                                 <div><button type="button" class="btn btn-danger">Not Submit</button></div>
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
                                    <h1>Name:<?php echo $q->task_member_name; ?></h1>
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
                                    <p><b>Task resubmittime: </b><?php echo $f->task_resubmit_time; ?></p>
                                      <form method="post" action="<?php echo base_url(); ?>TaskController/upd_re_observe_comment">
                                              <input type="hidden" name="id" value="<?php  echo $q->task_submit_id; ?>">
                                              <input type="hidden" name="reid" value="<?php  echo $f->task_resubmit_id; ?>">
                                               <input type="hidden" name="task_member_id" value="<?php echo $q->task_member_id; ?>">
                                                <input type="hidden" name="task_observe_name" value="<?php echo $q->task_observe_name; ?>">
                                                

                                               Observe Ans:
                                              <input type="radio" name="ob" value="2" onclick="task_resubmit(this.value)">Done
                                              <input type="radio" name="ob" value="3" onclick="task_resubmit(this.value)">Resubmit
                                              <div id="show_date_time"></div>
                                              <textarea name="name"></textarea>
                                               <button type="submit" value="submit" class="btn btn-success">submit</button>
                                             </form>
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
                                      <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                    <h1>Name:<?php echo $q->task_member_name; ?></h1>
                                    
                                    <p><b>Task resubmit Description: </b><?php echo $f->task_description; ?></p>
                                    <p><b>Task resubmitdate: </b><?php echo $f->task_submit_date; ?></p>
                                    <p><b>Task resubmittime: </b><?php echo $f->task_submit_time; ?></p>
                                
                                    <p><b>Task staus: </b>
                             <?php if($f->task_status == 0)
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
                              ?></p>
                                    <p><b>Task Progress: </b><?php echo $f->task_progress; ?></p>
                                      
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
                               

                             <button type="button" class="btn btn-success" data-toggle="modal" data-target="#m<?php echo $w; ?>">
                                Submit
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="m<?php echo $w; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Work perfoemance:
                                           <?php 

                                  if($q->task_submit_date!= ""){
                              if(date("d-m-Y",strtotime($q->task_submit_date)) > date("d-m-Y",strtotime($value->task_dedline_date)))
                              {echo "Bad<br>"; }else if(date("d-m-Y",strtotime($q->task_submit_date)) < date("d-m-Y",strtotime($value->task_dedline_date))){echo "Very Good";}else{ 

                                if(date("h:m",strtotime($q->task_submit_time)) > date("h:m",strtotime($value->task_dedline_time)))
                                            {
                                              echo "Bad<br>";
                                            }
                                            else if(date("h:m",strtotime($q->task_submit_time)) < date("h:m",strtotime($value->task_dedline_time)))
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
                           		 if(date("h:m") > date("h:m",strtotime($q->task_submit_time)))
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
                                    <h1>Name:<?php echo $q->task_member_name; ?></h1>
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
                                    <?php $img = explode(",", $q->task_submit_document);
                                      foreach ($img as $m => $o) {
                                        ?>
                                          <img src="<?php echo base_url(); ?>images/task_image/<?php echo $o; ?>" width="50px">
                                        <?php
                                      }
                                     ?>
                                    </p>
                                    <p><b>Task submit Description: </b><?php echo $q->task_submit_detail; ?></p>
                                    <p><b>Task date: </b><?php echo $q->task_submit_date; ?></p>
                                    <p><b>Task time: </b><?php echo $q->task_submit_time; ?></p>
                                      <form method="post" action="<?php echo base_url(); ?>TaskController/upd_observe_comment">
                                              <input type="hidden" name="id" value="<?php  echo $q->task_submit_id; ?>">
                                              
                                               <input type="hidden" name="task_member_id" value="<?php echo $q->task_member_id; ?>">
                                                <input type="hidden" name="task_observe_name" value="<?php echo $q->task_observe_name; ?>">
                                                

                                               Observe Ans:
                                              <input type="radio" name="ob" value="2" onclick="task_resubmit(this.value)">Done
                                              <input type="radio" name="ob" value="3" onclick="task_resubmit(this.value)">Resubmit
                                              <div id="show_date_time"></div>
                                              <textarea name="name"></textarea>
                                               <button type="submit" value="submit" class="btn btn-success">submit</button>
                                             </form>
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
                             # code...
                           } }?></td>
                          <td><?php foreach ($task_submit as $p => $q) {

                                if($q->task_detail_id == $value->task_detail_id){
                                  if($q->task_member_name == $_SESSION['user_name']){

                                  if($q->task_submit_date!= ""){
                              if(date("d-m-Y",strtotime($q->task_submit_date)) > date("d-m-Y",strtotime($value->task_dedline_date)))
                              {echo "Bad<br>"; }else if(date("d-m-Y",strtotime($q->task_submit_date)) < date("d-m-Y",strtotime($value->task_dedline_date))){echo "Very Good";}else{ 

                                if(date("h:m",strtotime($q->task_submit_time)) > date("h:m",strtotime($value->task_dedline_time)))
                                            {
                                              echo "Bad<br>";
                                            }
                                            else if(date("h:m",strtotime($q->task_submit_time)) < date("h:m",strtotime($value->task_dedline_time)))
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
                           		 if(date("h:m") > date("h:m",strtotime($q->task_submit_time)))
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

                           	}} } }?></td>
                          
                        </tr>

                      <?php } } } }?>
                    </table>
                       
                    </div>   
                </section>




 <section class="content">
      <h1>Working Task</h1>
                    <div class="row">
                    <table border="1">
                        <tr>
                        <th>Task Status</th>
                         <th>Task Name</th>
                         <th>Task Creator</th>
                         <th>Task Observer</th>
                         <th>Task Dedline Date</th>
                         <th>Task Dedline Time</th>
                         <th>Task Priority</th>
                         <th>Submit Date</th>
                         <th>Submit Time</th>
                         <th>Task progress</th>
                         <th>Task status</th>
                         <th>Show</th>
                        </tr>

                        <?php foreach ($assign_task as $j => $value) {
                        	 if($value->task_assign_status == "today"){

                          $dd = explode(",", $value->task_assign_member_id);
                          foreach ($dd as $a => $b) {
                            
                            foreach ($member as $k => $v) {
                           if($b == $v->member_id){
                            if($v->member_account_id == $_SESSION['user_id']){
                       ?>
                    <tr>
                        <td><?php foreach ($task_submit as $p => $q) {

                                if($q->task_detail_id == $value->task_detail_id){
                                  if($q->task_member_name == $_SESSION['user_name']){

                                  if($q->task_submit_date!= ""){
                              if(date("d-m-Y",strtotime($q->task_submit_date)) > date("d-m-Y",strtotime($value->task_dedline_date)))
                              {echo "Bad<br>"; }else if(date("d-m-Y",strtotime($q->task_submit_date)) < date("d-m-Y",strtotime($value->task_dedline_date))){echo "Very Good";}else{ 

                                if(date("h:m",strtotime($q->task_submit_time)) > date("h:m",strtotime($value->task_dedline_time)))
                                            {
                                              echo "Bad<br>";
                                            }
                                            else if(date("h:m",strtotime($q->task_submit_time)) < date("h:m",strtotime($value->task_dedline_time)))
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
                           		 if(date("h:m") > date("h:m",strtotime($q->task_submit_time)))
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

                           	}} } }?></td>
                          <td><?php echo $value->task_name; ?></td>
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
                           
                            <td><?php echo date("d-m-Y",strtotime($value->task_dedline_date)); ?></td>
                          <td><?php echo $value->task_dedline_time; ?></td>
                            <td><?php echo $value->task_priority; ?></td>
                            <td><?php foreach ($task_submit as $p => $q) {

                              if($q->task_detail_id == $value->task_detail_id){
                                if($q->task_member_name == $_SESSION['user_name']){
                                	if(!empty($q->task_submit_date))
                              {?>
                                 <div><?php  echo date("d-m-Y",strtotime($q->task_submit_date)); ?></div>
                             <?php }
                             # code...
                           } } } ?></td>
                           <td><?php foreach ($task_submit as $p => $q) {

                              if($q->task_detail_id == $value->task_detail_id)
                              {
                                if($q->task_member_name == $_SESSION['user_name']){
                                	if(!empty($q->task_submit_date)){
                                ?>
                                 <div><?php  echo date("h:mA",strtotime($q->task_submit_time)) ?></div>
                             <?php } }
                             # code...
                           }  }?></td>
                            <td><?php foreach ($task_submit as $p => $q) {

                              if($q->task_detail_id == $value->task_detail_id){
                                if($q->task_member_name == $_SESSION['user_name']){
                                 ?>
                                 <div><?php  echo $q->task_progress."%"; ?></div>
                             <?php 
                             # code...
                           } } } ?></td>
                            <td><?php foreach ($task_submit as $p => $q) {
                            if($q->task_detail_id == $value->task_detail_id){
                              if($q->task_member_name == $_SESSION['user_name']){
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
                             # code...
                           } } }?></td>
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
                                            <?php }else if($n->task_observe_status == 2){ ?> <td>Done</td> <?php }else if($n->task_observe_status == 1){?> <td><button type="button" class="btn btn-success">submit</button></td><?php }else{ ?>
                          <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter<?php echo $j; ?>">
                          Show Task
                        </button>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                        <p><b>Task Dedline Time: </b><?php echo date('h:mA',strtotime($value->task_dedline_time)); ?></p>
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
                                        <td><?php echo date('H:mA',strtotime($qq->task_submit_time)); ?></td>
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
                                        <p><b>Task resubmit Dedline Time: </b><?php echo date('H:mA',strtotime($y->task_submit_time)); ?></p>
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







                      <?php } } } }}else{


                      	if($value->task_start_date == date('d-m-Y')|| $value->task_start_date >= date('d-m-Y') && $value->task_start_time == date('H:mA') || $value->task_start_time >= date('H:mA'))
                      	{
                      		?>


                      			<?php 

                      			                          $dd = explode(",", $value->task_assign_member_id);
                          foreach ($dd as $a => $b) {
                            
                            foreach ($member as $k => $v) {
                           if($b == $v->member_id){
                            if($v->member_account_id == $_SESSION['user_id']){
                       ?>
                        <tr>
                        <td><?php foreach ($task_submit as $p => $q) {

                                if($q->task_detail_id == $value->task_detail_id){
                                  if($q->task_member_name == $_SESSION['user_name']){

                                  if($q->task_submit_date!= ""){
                              if(date("d-m-Y",strtotime($q->task_submit_date)) > date("d-m-Y",strtotime($value->task_dedline_date)))
                              {echo "Bad<br>"; }else if(date("d-m-Y",strtotime($q->task_submit_date)) < date("d-m-Y",strtotime($value->task_dedline_date))){echo "Very Good";}else{ 

                                if(date("h:m",strtotime($q->task_submit_time)) > date("h:m",strtotime($value->task_dedline_time)))
                                            {
                                              echo "Bad<br>";
                                            }
                                            else if(date("h:m",strtotime($q->task_submit_time)) < date("h:m",strtotime($value->task_dedline_time)))
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
                           		 if(date("h:m") > date("h:m",strtotime($q->task_submit_time)))
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

                           	}} } }?></td>
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
                           
                            <td><?php echo date("d-m-Y",strtotime($value->task_dedline_date)); ?></td>
                          <td><?php echo $value->task_dedline_time; ?></td>
                            <td><?php echo $value->task_priority; ?></td>
                            <td><?php foreach ($task_submit as $p => $q) {

                              if($q->task_detail_id == $value->task_detail_id){
                                if($q->task_member_name == $_SESSION['user_name']){
                                	if(!empty($q->task_submit_date))
                              {?>
                                 <div><?php  echo date("d-m-Y",strtotime($q->task_submit_date)); ?></div>
                             <?php }
                             # code...
                           } } } ?></td>
                           <td><?php foreach ($task_submit as $p => $q) {

                              if($q->task_detail_id == $value->task_detail_id)
                              {
                                if($q->task_member_name == $_SESSION['user_name']){
                                	if(!empty($q->task_submit_date)){
                                ?>
                                 <div><?php  echo date("h:mA",strtotime($q->task_submit_time)) ?></div>
                             <?php } }
                             # code...
                           }  }?></td>
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
                                            <?php }else if($n->task_observe_status == 2){ ?> <td>Done</td> <?php }else if($n->task_observe_status == 1){?> <td><button type="button" class="btn btn-success">submit</button></td><?php }else{ ?>
                          <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter<?php echo $j; ?>">
                          Show Task
                        </button>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                        <p><b>Task Dedline Time: </b><?php echo date('h:mA',strtotime($value->task_dedline_time)); ?></p>
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
                                                  <output value="<?php echo $j; ?>"><?php echo $n->task_progress; ?></output>
                                              </div>

                                            <form method="post" action="<?php echo base_url(); ?>TaskController/upd_prog">
                                              <input type="hidden" name="id" value="<?php  echo $n->task_submit_id; ?>">
                                              <input type="hidden"  id="medd<?php echo $j; ?>" name="rang">
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
                                        <td><?php echo date('H:mA',strtotime($qq->task_submit_time)); ?></td>
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
                                        <p><b>Task resubmit Dedline Time: </b><?php echo date('H:mA',strtotime($y->task_submit_time)); ?></p>
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
                           ?></div></p>

                        












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
                </section>







                    

    
    
  </div>

  <footer class="main-footer">
    
    <strong>Copyright©2018 Red & White Multimedia.</strong> All rights
    reserved.
  </footer>

 
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
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
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url(); ?>plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>

<!-- Page script -->
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
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
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



</body>
</html>