        <div class="col-xl-12" >
          <div class="modal-header px-0">
            <h5 class="modal-title">Lead History of <span style="font-weight: bold;"><?php echo $demo_record->name; ?></span></h5>
            <button type="button" class="close close_side_bar" id="close_side_bar_right" onclick="return close_right_side_bar()">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="fill_new_leade_info_body" id="create_leade">
            <?php 
            if(count($student_history) >0 ){
            foreach($student_history as $sh) { ?>
              <span style="color:gray; font-size: 16px; font-weight: bold;"> Created On </span> : <span style="color:black; font-size:16px; font-weight: bold; padding:0px 5px 0 5px;"><?php  echo $sh->last_updated_date; ?>
                
              </span><br>
              <span style="color:gray; font-size: 16px;"> Name </span> : <span style="color:black; font-size:16px; padding:0px 5px 0 5px; ">
                <?php $name = explode(',',$sh->name); 
                  if($name[1]=="nochange") 
                    { ?>
                      <span><?php echo $name[0]; ?></span>
                   <?php } else  { ?>
                      <span style="color:red"><?php echo $name[0]; ?> 
                   <?php } ?>
              </span><br>

              <span style="color:gray; font-size: 16px;"> Mobile No </span> : <span style="color:black; font-size:16px; padding:0px 5px 0 5px; ">
                <?php $mobile = explode(',',$sh->mobileNo); if($mobile[1]=="nochange") { ?><span><?php echo $mobile[0]; ?></span> <?php } else  { ?><span style="color:red"><?php echo $mobile[0]; ?> <?php } ?>
              </span><br>
              <span style="color:gray; font-size: 16px;"> branch Name </span> : <span style="color:black; font-size:16px;padding:0px 5px 0 5px;  ">
                <?php 
                    $branch_data =  explode(',',$sh->branch_id);
                    foreach($branch as $bran) { 

                      if($bran->branch_id==$branch_data[0])
                      {
                        $branch_n = $bran->branch_name;
                      }

                    } ?>
                    <?php  if($branch_data[1]=="nochange") { ?><span><?php echo $branch_n; ?></span> <?php } else  { ?><span style="color:red"><?php echo $branch_n; ?> <?php } ?>
              </span><br>
              <span style="color:gray; font-size: 16px;"> Department Name </span> : <span style="color:black; font-size:16px;padding:0px 5px 0 5px;  ">
                <?php 
                    $department_name =  explode(',',$sh->department_id);
                    foreach($department as $depart) 
                    { 
                      if($depart->department_id==$department_name[0])
                      {
                        $name_depart = $depart->department_name;
                      }
                    } ?>
                    <?php  if($department_name[1]=="nochange") { ?><span><?php echo $name_depart; ?></span> <?php } else  { ?><span style="color:red"><?php echo $name_depart; ?> <?php } ?>
              </span><br>
              <span style="color:gray; font-size: 16px;"> Course Type </span> : <span style="color:black; font-size:16px; padding:0px 5px 0 5px; ">
                <?php $course_type = explode(',',$sh->course_type); if($course_type[1]=="nochange") { ?><span><?php echo $course_type[0]; ?></span> <?php } else  { ?><span style="color:red"><?php echo $course_type[0]; ?></span> <?php } ?>
              </span><br>
              <span style="color:gray; font-size: 16px;"> Course Name </span> : <span style="color:black; font-size:16px;padding:0px 5px 0 5px;  ">
                <?php $cName = explode(',',$sh->courseName); if($cName[1]=="nochange") { ?><span><?php echo $cName[0]; ?></span> <?php } else  { ?><span style="color:red"><?php echo $cName[0]; ?></span> <?php } ?>
              </span><br>
              <span style="color:gray; font-size: 16px;"> Faculty Name </span> : <span style="color:black; font-size:16px; padding:0px 5px 0 5px; ">
                 <?php 
                    $faculty_name =  explode(',',$sh->faculty_id);
                    foreach($faculty as $fa) 
                    { 
                      if($fa->faculty_id==$faculty_name[0])
                      {
                        $fName = $fa->name;
                      }
                    } ?>
                    <?php  if($faculty_name[1]=="nochange") { ?><span><?php echo $fName; ?></span> <?php } else  { ?><span style="color:red"><?php echo $fName; ?> <?php } ?>
              </span><br>
              <span style="color:gray; font-size: 16px;"> From Time </span> : <span style="color:black; font-size:16px; padding:0px 5px 0 5px;  ">
                <?php  $fromTime =  explode(',',$sh->fromTime); if($fromTime[1]=="nochange") { ?><span><?php echo $fromTime[0]; ?></span> <?php } else  { ?><span style="color:red"><?php echo $fromTime[0]; ?> </span><?php } ?>
              </span><br>
              <span style="color:gray; font-size: 16px;"> To Time </span> : <span style="color:black; font-size:16px; padding:0px 5px 0 5px; ">
                 <?php  $toTime =  explode(',',$sh->toTime);if($toTime[1]=="nochange") { ?><span><?php echo $toTime[0]; ?></span> <?php } else  { ?><span style="color:red"><?php echo $toTime[0]; ?></span> <?php } ?>
              </span><br>
              <span style="color:gray; font-size: 16px;"> Add Or Change </span> : <span style="color:black; font-size:16px;padding:0px 5px 0 5px;  "><?php  $addby =  explode(',',$sh->addBy);if($addby[1]=="nochange") { ?><span><?php echo $addby[0]; ?></span> <?php } else  { ?><span style="color:red"><?php echo $addby[0]; ?></span> <?php } ?></span><br>

             
              <hr style="color:black">
            <?php } } else { ?>

              <div >
                <span style="color:red">No History</span>
              </div>

            <?php } ?>

          </div>
          <div class="lead_save_btn">
            <div class="btn-group w-100">
            <!--   <button type="button" class="btn btn-danger">CANCEL</button>
              <button type="button" class="btn btn-success">ADD LEAD</button> -->
            </div>
          </div>
        </div>


<script>

function close_right_side_bar()
{
  $('.main_content').removeClass('right_show');
    $('.right_side').removeClass('right_show');
    $("aside").removeClass('right_show');
}

</script>