<?php if(!empty($demo_all_search)) { foreach($demo_all_search as $val){
    ?>
    <?php         
               $i=1;     
               $date = date("Y-m-d");   
               $flag=0;
               $day=0;
               $all_att = explode("&&",$val->attendance);
               
               for($i=0;$i<sizeof($all_att);$i++)
               {
               $att = explode("/",$all_att[$i]);
               if($date==$att[0])
               {
                   if($att[1]=="P")
                   {
                       $flag = 1;
                   }
                   else if($att[1]=="A")
                   {
                       $flag = 2;
                       
                   }
               }
               if(@$att[1]=="P")
               {
                   $day++; 
               }
               }?>
    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-running-demo" role="tabpanel"
                                            aria-labelledby="pills-running-demo-tab">
                                            <div class="row">
                                                <div class="col-12 mb-2">
                                                    <div class="card-item shadow-sm">
                                                        <?php if($val->demoStatus == "0") { $holding = "info" ; } else if($val->demoStatus == "1") {$holding = "primary" ;} else if($val->demoStatus == "2") {$holding = "hold" ;} else if($val->demoStatus == "3") { $holding = "red" ;} else if($val->demoStatus == "4") { $holding = "warning" ; } ?>
                                                        <div class="card card-<?php echo $holding; ?>">
                                                            <div class="card-header form-title">
                                                                <h4 title="Mobile No :<?php echo $val->mobileNo; ?>">
                                                                    <?php echo $val->name; ?>(
                                                                    <?php echo $val->demo_id; ?>)
                                                                </h4>
                                                            </div>
                                                            <div class="card-body px-0 pt-1">
                                                                <div class="d-flex flex-wrap">
                                                                    <div class="col-lg-3 col-md-6">
                                                                        <div class="demo_detail_wrap text-dark">
                                                                            <label>
                                                                                <?php if(!empty($val->courseName)) { echo "Single " ;} else { echo "Package "; } ?>
                                                                                :
                                                                            </label>
                                                                            <span>
                                                                                <?php if(!empty($val->courseName)) { echo $val->courseName ;} else { echo $val->packageName; } ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-6">
                                                                        <div class="demo_detail_wrap text-dark">
                                                                            <label>Barnch: </label>
                                                                            <span>
                                                                                <?php foreach($all_branches as $row){ if($val->branch_id == $row->branch_id) { echo $row->branch_name; }  } ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-6">
                                                                        <div class="demo_detail_wrap text-dark">
                                                                            <label>Department: </label>
                                                                            <span>
                                                                                <?php foreach($list_department as $row){ if($val->department_id  == $row->department_id ) { echo $row->department_name; }  } ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-6">
                                                                        <div class="demo_detail_wrap  text-dark">
                                                                            <label>Present Days :</label>
                                                                            <div class="progress shadow-none d-inline-flex"
                                                                                style="width: calc(100% - 110px);">
                                                                                <span class="position-absolute"
                                                                                    style="top:-10px;right:25px;">
                                                                                    <?php if(!empty($val->attendance)) {  echo $day;  ?>
                                                                                    Days
                                                                                    <?php } ?>
                                                                                </span>
                                                                                <div class="progress-bar" <?php if($day>
                                                                                    5) { ?>
                                                                                    <?php } ?> style="width:
                                                                                    <?php if($day==0) { echo "0%"; } else if($day==1) { echo "20%"; } else if($day==2) { echo "40%"; } else if($day==3) { echo "60%"; } else if($day==4) { echo "80%"; } else if($day>=5) { echo "100%"; } ?>;
                                                                                    ">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-6">
                                                                        <div class="demo_detail_wrap text-dark">
                                                                            <label>Starting Course: </label>
                                                                            <span>
                                                                                <?php echo $val->startingCourse; ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-6">
                                                                        <div class="demo_detail_wrap text-dark">
                                                                            <label>Added By: </label>
                                                                            <span>
                                                                                <?php echo $val->addBy; ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-6">
                                                                        <div class="demo_detail_wrap text-dark">
                                                                            <label>Present Date : </label>
                                                                            <?php $stdate = explode(" ",$val->addDate); ?>
                                                                            <span>
                                                                                <?php echo $stdate[0]; ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-6">
                                                                        <div class="demo_detail_wrap text-dark">
                                                                            <label>Start Date : </label>
                                                                            <?php $stdate = explode("-",$val->demoDate); ?>
                                                                            <span>
                                                                                <?php echo $stdate[2]."-".$stdate[1]."-".$stdate[0]; ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-6">
                                                                        <div class="demo_detail_wrap  text-dark">
                                                                            <label>Assign To : </label>
                                                                            <span>
                                                                                <?php if($val->faculty_id) {foreach($all_faculty as $row){ if($row->faculty_id == $val->faculty_id) { echo $row->name ; } } }
                                                                                else {
                                                                                    foreach($list_user as $row){ if($row->user_id == $val->hod_id) { echo $row->name ; } }
                                                                                }
                                                                                ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <!-- <div class="col-lg-3 col-md-6 px-md-2">
                                                    <div class="demo_detail_wrap text-dark d-flex">
                                                        <div class="mr-1">
                                                            <label class="d-block">Course Category :</label>
                                                        </div>
                                                         <div>
                                                            <div class="pretty p-icon p-jelly p-round p-bigger mt-2 mr-1">
                                                                <input class="form-check-input" type="radio"
                                                                    name="quick_course_package" id="exampleRadios1 <?php  echo $val->demo_id; ?>"
                                                                    value="package" <?php if(@$val->course_type=="single") { echo "checked"; } ?>>
                                                                <div class="state p-info">
                                                                    <i class="icon material-icons">done</i>
                                                                    <label>Package</label>
                                                                </div>
                                                            </div>
                                                            <div class="pretty p-icon p-jelly p-round p-bigger mt-2 mr-1">
                                                                <input class="form-check-input" type="radio" name="quick_course_package" id="exampleRadios2 <?php  echo $val->demo_id; ?>" value="single" <?php if(@$val->course_type=="single") { echo "checked"; } ?>>
                                                                <div class="state p-info">
                                                                    <i class="icon material-icons">done</i>
                                                                    <label>Single</label>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <span><?php echo $val->course_type; ?></span>
                                                    </div>
                                                </div> -->
                                                                    <div class="col-lg-3 col-md-6">
                                                                        <div class="demo_detail_wrap text-dark">
                                                                            <label>Time : </label>
                                                                            <span>
                                                                                <?php echo $val->fromTime; ?> To
                                                                                <?php echo $val->toTime; ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="demo_detail_wrap text-dark">
                                                                            <label>Status:</label>
                                                                            <?php if($_SESSION['logtype'] == "Receptionist" || $_SESSION['logtype'] == "Counselor" || $_SESSION['logtype'] == "Super Admin") { ?>
                                                                            <div class="d-inline-block">
                                                                                <select class="form-control"
                                                                                    id="demoStatus" name="demoStatus"
                                                                                    onchange="return GetStatus(this,<?php echo $val->demo_id;?>);">
                                                                                    <option value="">Select Status
                                                                                    </option>
                                                                                    <option value="0" <?php if($val->
                                                                                        demoStatus == "0") { ?>selected
                                                                                        = "selected"
                                                                                        <?php  }?>>Running
                                                                                    </option>
                                                                                    <option value="1" <?php if($val->
                                                                                        demoStatus == "1") { ?>selected
                                                                                        = "selected"
                                                                                        <?php  }?>>Done
                                                                                    </option>
                                                                                    <option value="2" <?php if($val->
                                                                                        demoStatus == "2") { ?>selected
                                                                                        = "selected"
                                                                                        <?php  }?>>Leave
                                                                                    </option>
                                                                                    <option value="3" <?php if($val->
                                                                                        demoStatus == "3") { ?>selected
                                                                                        = "selected"
                                                                                        <?php  }?>>Cancel
                                                                                    </option>
                                                                                    <option value="4" <?php if($val->
                                                                                        demoStatus == "4") { ?>selected
                                                                                        = "selected"
                                                                                        <?php  }?>>Confusion
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <?php } else { ?>
                                                                            <div class="d-inline-block text-dark">
                                                                                <select class="form-control"
                                                                                    id="demoStatus" name="demoStatus"
                                                                                    onchange="return GetStatus(this,<?php echo $val->demo_id;?>);"
                                                                                    disabled>
                                                                                    <option value="">Select Status
                                                                                    </option>
                                                                                    <option value="0" <?php if($val->
                                                                                        demoStatus == "0") { ?>selected
                                                                                        = "selected"
                                                                                        <?php  }?>>Running
                                                                                    </option>
                                                                                    <option value="1" <?php if($val->
                                                                                        demoStatus == "1") { ?>selected
                                                                                        = "selected"
                                                                                        <?php  }?>>Done
                                                                                    </option>
                                                                                    <option value="2" <?php if($val->
                                                                                        demoStatus == "2") { ?>selected
                                                                                        = "selected"
                                                                                        <?php  }?>>Leave
                                                                                    </option>
                                                                                    <option value="3" <?php if($val->
                                                                                        demoStatus == "3") { ?>selected
                                                                                        = "selected"
                                                                                        <?php  }?>>Cancel
                                                                                    </option>
                                                                                    <option value="4" <?php if($val->
                                                                                        demoStatus == "4") { ?>selected
                                                                                        = "selected"
                                                                                        <?php  }?>>Confusion
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php if($_SESSION['logtype'] == "Receptionist" || $_SESSION['logtype'] == "Counselor" || $_SESSION['logtype'] == "Super Admin") { ?>
                                                                    <div class="col-md-3">
                                                                        <div
                                                                            class="form-group text-dark demo_detail_wrap">
                                                                            <label class="text-dark">Attendence :
                                                                            </label>
                                                                            <div class="d-inline-block ml-1">
                                                                                <div
                                                                                    class="pretty p-icon p-jelly p-round p-bigger">
                                                                                    <input
                                                                                        class="form-check-input package_type"
                                                                                        type="radio" name="attend"
                                                                                        id="attend" value="P"
                                                                                        onclick="return getAttend(this,<?php echo $val->demo_id;?>)">
                                                                                    <div class="state p-info">
                                                                                        <i
                                                                                            class="icon material-icons">done</i>
                                                                                        <label>P</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                                    <input
                                                                                        class="form-check-input course_type"
                                                                                        type="radio" name="attend"
                                                                                        id="attend" value="A"
                                                                                        onclick="return getAttend(this,<?php echo $val->demo_id;?>)">
                                                                                    <div class="state p-info">
                                                                                        <i
                                                                                            class="icon material-icons">done</i>
                                                                                        <label>A</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php }?>
                                                                    <div
                                                                        class="col-6 d-flex flex-wrap justify-content-between align-items-center">
                                                                        <div>
                                                                            <a href="javascript:attend_remark(<?php echo $val->demo_id ;?>)"
                                                                                class="btn btn-info btn-sm text-white">Attendance
                                                                                & follow
                                                                                up</a>
                                                                            <?php if($_SESSION['logtype'] == "Receptionist" || $_SESSION['logtype'] == "Counselor" || $_SESSION['logtype'] == "Super Admin") { ?>
                                                                            <?php if($_SESSION['logtype'] == "Receptionist" || $_SESSION['logtype'] == "Counselor" || $_SESSION['logtype'] == "Super Admin") {?>
                                                                            <input
                                                                                class="btn btn-primary btn-sm ml-2 full_submit_form"
                                                                                type="submit" name="full_submit"
                                                                                value="Submit" id=full_submit_form>
                                                                            <?php }?>
                                                                            <a href="javascript:View_single(<?php echo  $val->demo_id ;?>)"
                                                                                class="bg-primary action-icon text-white btn-primary ml-2"><i
                                                                                    class="far fa-eye"></i></a>
                                                                            <a href="javascript:AddRmark(<?php echo $val->demo_id ;?>)"
                                                                                class="bg-primary action-icon text-white btn-primary ml-2"><i
                                                                                    class="fas fa-comment-alt"></i></a>
                                                                            <a href="javascript:View_history(<?php echo $val->demo_id ;?>)"
                                                                                class="bg-primary action-icon text-white btn-primary ml-2 open_rightsidebar"><i
                                                                                    class="fas fa-history"></i></a>
                                                                            <?php }?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php
}
} else { ?> <p>No Record Found</p> <?php }?>