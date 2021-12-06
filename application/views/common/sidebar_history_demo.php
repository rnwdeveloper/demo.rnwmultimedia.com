        
    <?php if(!empty($single_reco_his)) {?> 
                        <div class="accordion">
                            <div class="accordion-body">
                                <span><b> <?php $cn = explode(',',$single_reco_his->course_type);
                                    if($cn[1] == "change"){ $bg_col = "text-red";  } else { $bg_col = "text-dark";}
                                ?>
                                    <?php if($cn[1] == "change")  { if($single_reco->course_type == "single") { echo "Course Name"; } else { echo "Package Name:" ;  } }  else { if($cn[0] == "single") { echo "Course Name"; } else { echo "Package Name:" ; } }  ?>
                                :  </b><a class="text-danger"> <?php if($single_reco->course_type == "single") { echo $single_reco->courseName; } else { echo $single_reco->packageName ;  } ?></a></span></br>
                                        <?php $xn = explode(',',$single_reco_his->demoDate);
                                        if($xn[1] == "change"){ $og_col = "text-red";  } else { $og_col = "text-dark";}
                                        ?>
                                <span><b>Paresent Date : </b><a class="text-danger"><?php 
                                    if($xn[1] == "change"){ echo $single_reco->course_type; } else { echo $xn[0]; }
                                ?></a></span></br>
                                <span><b>Start Date : </b><a class="text-dark"> <?php $dn = explode(' ',$single_reco_his->addDate);  echo $dn[0]; ?>
                            </a></span></br>    
                            <?php  $on = explode(',',$single_reco_his->faculty_id);?>
                                <span><b>Assign To : </b><a class="text-danger"><?php if($on[1] == "change") {
                                   echo @$single_faculty->name ; } else { echo  @$single_faculty->name ; }
                                 ?></a></span></br>
                                 <?php $tn = explode(',',$single_reco_his->fromTime); 
                                 if($tn[1] == "change"){ $tg_col = "text-red";  } else { $tg_col = "text-dark"; }
                                 ?>
                                <span><b>Time : </b><a class="text-danger"> <?php  if($tn[1] == "nochange") { echo $tn[0] ;  } else { $single_reco->fromTime  ; } ?> To <?php $fn = explode(',',$single_reco_his->toTime);  if($fn[1] == "nochange") { echo $fn[0] ;  } else { $single_reco->toTime  ; } ?> </a></span></br>
                                <span><b>Status : </b> <?php if($single_reco->demoStatus == 0) { echo "Running"; } 
                                                            else if ($single_reco->demoStatus == 1)  { echo "Done"; } 
                                                            else if ($single_reco->demoStatus == 2)  { echo "Leave"; } 
                                                            else if ($single_reco->demoStatus == 3)  { echo "Cancle"; } 
                                                            else if ($single_reco->demoStatus == 4)  { echo "Confusion"; } 
                                                            ?> <a class="text-dark">
                                </a></span></br>
                            </div>
                        </div>
                        <span class="border border-dark"></span>
                        <?php }?>    