<div class="post_a_job_page"></div>
<?php ob_start();
session_start();
include ('new_header.php');
include ('db.php'); ?>  


<style>


.post_help{

   position: absolute;
            right: 0px;
            top: 300px;
            background-color:lightgray;
            width: 50px;
            color:red;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            cursor: hand;
            text-align: center;

  }

  .post_help span{

    text-align: center;
            left:10px;
            font-weight: 800;
            font-size:20px;

  }



</style>
<section class="posted_job_form_sec d-inline-block w-100 position: relative" id="post_a_job">   


 <div class="post_help btn btn-sm video" data-video="http://demo.rnwmultimedia.com/placement/video/PostJobHelp.mp4" data-toggle="modal" data-target="#videoModal" data-backdrop="static" data-keyboard="false">

       <img src="https://demo.rnwmultimedia.com/placement/images/helpIcon.png" height="30" width="30" ><span><br>H<br>e<br>l<br>p</span>

    </div>



    <div class="container">         
        <div class="row">               
            <div class="col-xl-12">                 
                <div class="" style="margin-top: 0px; margin-left:-100px; position: absolute;">                      
                    <?php $company = $_SESSION['record']['url']; ?>                      <img src="//logo.clearbit.com/<?php echo $company; ?>">                    
                </div>                  
                <div style="margin-top: 0px;right:1px; position: absolute; font-size:20px; color:lightblue">                        
                    <?php echo $_SESSION['record']['company_name']; ?></div>                    
                    <div class="sec-heading text-center">                       <h2>Posted Jobs</h2>                        <h3>Advance Search</h3>                 
                    </div>              
                </div>          
            </div>          
            <div class="col-xl-10 mx-auto">             
                <form class="row" method="post">                    
                    <div class="col-xl-12 border p-3">                      
                        <div class="row">                            
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">                               
                            <div class="form-group">                                    <label>Starting Date</label>                                    <input type="text" name="start_date" id="start_date" class="form-control"  value="<?php if (isset($_POST['start_date']))
{
    echo $_POST['start_date'];
} ?>">                              
                            </div>                           
                        </div>                           
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">                               
                            <div class="form-group">                                    <label>Ending Date</label>                                  <input type="text" name="end_date" id="end_date" class="form-control" value="<?php if (isset($_POST['end_date']))
{
    echo $_POST['end_date'];
} ?>">                              </div>                           </div>                          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">                              <div class="form-group">                                    <label>Status</label>                                   <select class="form-control" name="status">                                     <option value=''>-- Status Select --</option>                                           <option value='2' <?php if (isset($_POST['status']))
{
    if ($_POST['status'] == '2')
    {
        echo "selected";
    }
} ?>>Deactive</option>                                          <option value='0' <?php if (isset($_POST['status']) == 0)
{
    if ($_POST['status'] == '0')
    {
        echo "selected";
    }
} ?>>Active</option>                                    </select>                                   <!-- <select class="form-control" name="status">                                        <option value=''>-- Status Select --</option>                                           <option value='running'>Running</option>                                            <option value='active'>Hold</option>                                            <option value='cancel'>Cancel</option>                                          <option value='stop'>Stop</option>                                  </select> -->                               </div>                           
                        </div>                          
                         <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">                              <label>&nbsp;</label>                               <button type="submit" name="Search" value="Search" class="btn btn-primary btn-block" style="width:100px;">Search</button>                               <a href="posted_job.php" class="btn btn-primary btn-block" style="width: 100px; ">Reset</a>                          
                         </div>                     
                        </div>                  
                    </div>              
                </form>         
            </div>          
            <div class="col-xl-12 mt-4">                
                <div class="row">                   <?php if (@$_SESSION['record']['company_name'] != '')
{
    $co_id = $_SESSION['record']['company_id'];
    if (isset($_POST['Search']))
    {
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $status = $_POST['status'];
        if ($start_date != '' && $end_date != '' && $status != '')
        {
            $query = "select * from job_post job_post JOIN company_detail ON job_post.company_id=company_detail.company_id where job_post.company_id='$co_id' AND ((`start_date` between '$start_date' and '$end_date' ) OR (`end_date` between '$start_date' and '$end_date')) AND `job_status`='$status' order by `jobpost_id` desc";
        }
        else if ($start_date != '' && $end_date != '')
        {
            $query = "select * from job_post job_post JOIN company_detail ON job_post.company_id=company_detail.company_id where job_post.company_id='$co_id' AND ((`start_date` between '$start_date' and '$end_date' ) OR (`end_date` between '$start_date' and '$end_date'))  order by `jobpost_id` desc";
        }
        else if ($status != '')
        {
            $query = "select * from job_post job_post JOIN company_detail ON job_post.company_id=company_detail.company_id where job_post.company_id='$co_id' AND `job_status`='$status' order by `jobpost_id` desc";
        }
        else
        {
            $query = "select * from job_post job_post JOIN company_detail ON job_post.company_id=company_detail.company_id where job_post.company_id='$co_id' AND  MONTH(start_date) = MONTH(CURRENT_DATE()) AND YEAR(start_date) = YEAR(CURRENT_DATE()) AND `job_status` != '1' order by `jobpost_id` desc";
        }
    }
    else
    {
        $query = "select * from job_post JOIN company_detail ON job_post.company_id=company_detail.company_id where  job_post.company_id='$co_id'  order by `jobpost_id` desc";
    } //                            $que ="SELECT *// FROM table// WHERE MONTH(columnName) = MONTH(CURRENT_DATE())// AND YEAR(columnName) = YEAR(CURRENT_DATE())";
    $query1 = mysqli_query($con, $query);
    $num = mysqli_num_rows($query1);
    if ($num > 0)
    {
        while ($query2 = mysqli_fetch_array($query1))
        {
?>                              <div class="col-xl-4 col-lg-4 col-md-6" >                            <?php if (@$query2['job_status'] == '2')
            { ?>                    <div class="posted_job_box" style="background-color: #DC143C; color:#d4bebe;height: 234px;">                                <span class="start_end_date" style="color:#d4bebe;" >START DATE: <?php echo $query2['start_date']; ?> </span>                               <br><span class="start_end_date" style="color:#d4bebe;">END DATE: <?php echo $query2['end_date']; ?></span>                             <ul class="ring_round_block" style="position: absolute;left: 261px;top: 16px;">                                 <a href="javascript:edit_jobs(<?php echo $query2['jobpost_id']; ?>)" style="color:black" data-toggle="tooltip" title="Re-Active job"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>                                   <a href="javascript:view_job_record(<?php echo $query2['jobpost_id']; ?>)" style="color:black" data-toggle="tooltip" title="view" onclick="return view_job_record(<?php echo $query2['jobpost_id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>                                    <!-- <a href="javascript:deactive_jobs(<?php echo $query2['jobpost_id']; ?>, <?php echo $query2['company_id']; ?>)" style="color:black" data-toggle="tooltip" title="Deactive"><i class="fa fa-power-off" aria-hidden="true"></i></a> -->                                                                   </ul>                               <h2 class="corse_title"><?php echo $query2['job_name']; ?></h2>                             <p class="student_lable"><?php echo substr($query2['job_description'], 0, 81) . "..."; ?></p>                               <ul class="job-post-item-body mt-3">                                    <li><i class="fas fa-layer-group mr-2"></i><?php echo $query2['no_of_vacancy']; ?></li>                                 <li><i class="fas fa-map-marker-alt mr-2"></i><?php echo $query2['city']; ?>, <?php echo $query2['job_area']; ?></li>                               </ul>                               <div class="student_contact_info_btns">                                 <?php $com_id = $query2['company_id'];
                $job_id = $query2['jobpost_id'];
                $count_record = "select * from student_applied_job where `company_id`='$com_id' AND `jobpost_id`='$job_id'";
                $count_record1 = mysqli_query($con, $count_record);
                $count = mysqli_num_rows($count_record1); ?>                                    <?php $company_id = strtr(base64_encode($query2['company_id']) , '+/=', '._-');
                $job_post_id = strtr(base64_encode($query2['jobpost_id']) , '+/=', '._-'); ?>                                   <a href="applications.php?jobpost_id=<?php echo $job_post_id; ?>&company_id=<?php echo $company_id; ?>" class="btn btn-primary">View Application (<?php echo $count; ?>)</a>                                </div>                          </div>                      <?php
            }
            else if (@$query2['job_status'] == '1')
            { ?>                            <div class="posted_job_box" style="background-color: #A9A9A9; color:black;height: 234px; ">                             <ul class="ring_round_block" style="position: absolute;left: 261px;top: 16px;">                                 <a href="javascript:edit_jobs(<?php echo $query2['jobpost_id']; ?>)" style="color:#e2dfdd" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>                                  
                    <a href="javascript:view_job_record(<?php echo $query2['jobpost_id']; ?>)" style="color:#e2dfdd" data-toggle="tooltip" title="view"><i class="fa fa-eye" aria-hidden="true"></i></a>                                    <a href="javascript:comment_on_jobs(<?php echo $query2['jobpost_id']; ?>, <?php echo $query2['company_id']; ?>)" style="color:#e2dfdd" data-toggle="tooltip" title="Comment"><i class="fa fa-comment" aria-hidden="true"></i></a>                                                                                                                                           </ul>                           <p style="color:white; height:66px; position: absolute; top:40%; left:50%; transform: translate(-50%,-50%);text-align: center; font-size: 20px;">                               <span style="text-decoration: underline; color:white; font-size:18px;  line-height: 40px; ">Jobpost is Deactivated</span><br>                           <span style="font-size:16px; color:#e5e2ef;">Jobpost will be activeted when right candidate will be ready to apply.<span></p>                                                                                                                                                                                           </div>                      <?php
            }
            else
            { ?>                        <div  class="posted_job_box" style="background-color:#e05300;height: 234px;">                           <span class="start_end_date" style="color:#d4bebe;" >START DATE: <?php echo $query2['start_date']; ?> </span>                           <br><span class="start_end_date" style="color:#c7b5a8;">END DATE: <?php echo $query2['end_date']; ?></span>                         <ul class="ring_round_block" style="position: absolute;left: 261px;top: 16px;">                             <a href="javascript:edit_jobs(<?php echo $query2['jobpost_id']; ?>)" style="color:#c7b5a8" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>                              <a href="javascript:view_job_record(<?php echo $query2['jobpost_id']; ?>)" style="color:#c7b5a8" data-toggle="tooltip" title="view"><i class="fa fa-eye" aria-hidden="true"></i></a>                                <a href="javascript:comment_on_jobs(<?php echo $query2['jobpost_id']; ?>, <?php echo $query2['company_id']; ?>)" style="color:#c7b5a8" data-toggle="tooltip" title="Comment"><i class="fa fa-comment" aria-hidden="true"></i></a>                               <a href="javascript:deactive_jobs(<?php echo $query2['jobpost_id']; ?>, <?php echo $query2['company_id']; ?>)" style="color:#c7b5a8" data-toggle="tooltip" title="Deactive"><i class="fa fa-power-off" aria-hidden="true"></i></a>                                                                                          
                    </ul>                               <h2 class="corse_title" style="color:white;"><b><?php echo $query2['job_name']; ?></b></h2>                             <p class="student_lable" style="color:#f38a43"><?php echo substr($query2['job_description'], 0, 81) . "..."; ?></p>                             <ul class="job-post-item-body mt-3" style="color:white;">                                   <li><i class="fas fa-layer-group mr-2"></i><?php echo $query2['no_of_vacancy']; ?></li>                                 <li><i class="fas fa-map-marker-alt mr-2"></i><?php echo $query2['city']; ?>, <?php echo $query2['job_area']; ?></li>                               </ul>                               <div class="student_contact_info_btns">                                 <?php $com_id = $query2['company_id'];
                $job_id = $query2['jobpost_id'];
                $count_record = "select * from student_applied_job where `company_id`='$com_id' AND `jobpost_id`='$job_id'";
                $count_record1 = mysqli_query($con, $count_record);
                $count = mysqli_num_rows($count_record1); ?>                                    <?php $company_id = strtr(base64_encode($query2['company_id']) , '+/=', '._-');
                $job_post_id = strtr(base64_encode($query2['jobpost_id']) , '+/=', '._-'); ?>                                   <a href="applications.php?jobpost_id=<?php echo $job_post_id; ?>&company_id=<?php echo $company_id; ?>" class="btn btn-primary">View Application (<?php echo $count; ?>)</a>                                </div>                          </div>                      <?php
            } ?>                        </div>                  <?php
        }
    }
    else
    { ?>                    <div class="col-xl-4 col-lg-4 col-md-6">                        <div class="posted_job_box" style="height: 234px;">                         
                        <!-- <span class="start_end_date">START DATE: 2020-06-29</span>                         
                        <span class="start_end_date">END DATE: 2020-07-15</span> -->                            
                        <h2 class="corse_title">No Record Found</h2>        <!-- <p class="student_lable">Test</p>                          <ul class="job-post-item-body mt-3">                                <li><i class="fas fa-layer-group mr-2"></i>2</li>                               <li><i class="fas fa-map-marker-alt mr-2"></i>Surat, varachha</li>                          </ul>                           <div class="student_contact_info_btns">                             <a href="#" class="btn btn-primary">View Application</a>                            </div> -->                      
                    </div>                  
                </div>                  
                <?php
    }
} ?>                    
                <!-- <div class="col-xl-4 col-lg-4 col-md-6">                       <div class="posted_job_box">                            <span class="start_end_date">START DATE: 2020-06-29</span>                          <span class="start_end_date">END DATE: 2020-07-15</span>                            <h2 class="corse_title">web designing</h2>                          <p class="student_lable">Test</p>                           <ul class="job-post-item-body mt-3">                                <li><i class="fas fa-layer-group mr-2"></i>2</li>                               <li><i class="fas fa-map-marker-alt mr-2"></i>Surat, varachha</li>                          </ul>                           <div class="student_contact_info_btns">                             <a href="#" class="btn btn-primary">View Application</a>                            </div>                      </div>                  </div> -->              
            </div>          </div>      </div>  </section>  

            <aside class="posted_job_sidebar">      
                <div class="posted_job_sidebar_inner">          
                    <div class="posted_job_sidebar_header">             
                        <h2 id="change_name_title">View Job Details</h2>               
                        <button type="button" class="close posted_job_sidebar_close" aria-label="Close">  
                            <span aria-hidden="true">&times;</span>               
                        </button>           
                    </div>          

                    <div id="Comment_On_Job">               
                        <form class="posted_job_sidebar_form" name="post" name="comments_posted_jobs" id="comments_posted_jobs">                                        
                            <input type="hidden" name="job_post_comment" id="job_post_comment">            
                            <input type="hidden" name="company_id_comment" id="company_id_comment">       
                            <input type="hidden" name="de_employer_name_comment" id="de_employer_name_comment" value="<?php echo $_SESSION['record']['employer_name']; ?>">                 
                            <?php date_default_timezone_set('Asia/Kolkata');
                            $currentTime = date('d-m-Y h:i:s A', time()); ?>                    
                            <input type="hidden" name="de_current_date_time_comment" id="de_current_date_time_comment" value="<?php echo $currentTime; ?>">                                             
                            <div class="form-group">                            
                                <label >Comment Reason:</label>                         
                                <select class="form-control" name="reason_comment" id="reason_comment" onchange="return getReasonForm()">                               
                                    <option value="">--select option--</option>                            <option value="No_Response">No Response</option>                    
                                    <option value="No_right_candidate">No Right Candidate</option>       
                                    <option value="Other">Other</option>                            
                                </select>                       
                            </div>                      

                            <div class="form-group" id="job_reason_record_comment">
                                <label>Comment:</label>                         
                                <textarea placeholder="Job Reason" name="ajax_job_reason_comment" id="ajax_job_reason_comment" class="form-control" rows="5"></textarea>
                            </div>                      

                            <div class="">                          
                                <input type="submit" value="Give Comment" name="Give Comment" class="btn btn-primary">                          
                                <div id="reason_job_record_comment" style="margin-left:10px;"></div>
                            </div>                  

                        </form>         
                    </div>          

                    <div id="Deactive_Job_Reason">              
                        <form class="posted_job_sidebar_form" name="post" name="deactive_posted_jobs" id="deactive_posted_jobs">                    
                            <input type="hidden" name="job_post_id_data" id="job_post_id_data">
                            <input type="hidden" name="company_id_data" id="company_id_data">
                            <input type="hidden" name="de_employer_name" id="de_employer_name" value="<?php echo $_SESSION['record']['employer_name']; ?>">                 
                            <?php date_default_timezone_set('Asia/Kolkata');
                            $currentTime = date('d-m-Y h:i:s A', time()); ?>                    
                            <input type="hidden" name="de_current_date_time" id="de_current_date_time" value="<?php echo $currentTime; ?>">                                           

                            <div class="form-group">                            
                                <label >Reason:</label>                         
                                <select class="form-control" name="reason_deactive" id="reason_deactive" onchange="return getReasonForm()">                                     
                                    <option value="">--select option--</option>
                                    <option value="Vacancy Full">Vacancy Full</option>
                                    <option value="Date Expiry">Date Expiry</option>  
                                    <option value="No Need Candidate">No Need Candidate</option>  
                                    <option value="Other">Other</option>                          
                                </select>                       
                            </div>                      

                            <div class="form-group" id="job_reason_record">                         
                                <label>Job Reason</label>                           
                                <textarea placeholder="Job Reason" name="ajax_job_reason" id="ajax_job_reason" class="form-control" rows="5"></textarea>                
                            </div>                                              

                            <div class="">                          
                                <input type="submit" value="Give Reason" name="Give Reason" class="btn btn-primary">                            
                                <div id="reason_job_record" style="margin-left:10px;"></div>             
                            </div>                  
                        </form>         
                    </div>     

                    <div id="get_record_of_jobpost" style='width: 100%; overflow:auto-scroll;'></div>
                    <div id="posted_form_record">                                   
                    <form class="posted_job_sidebar_form"  method="post" name="edit_posted_job" id="edit_posted_job">        
                        <input type="hidden" name="jobPosted_job" id="jobPosted_job">    
                        <div class="form-group">                            
                            <label>Job Title</label>                            
                            <input type="text" name="ajax_job_name" id="ajax_job_name" class="form-control">                        
                        </div>                      

                        <div class="form-group">                            
                            <label>Position</label>                         
                            <select class="form-control" name="ajax_position" id="ajax_position" onchange="return get_subcategory()">                                       
                                <option value="">--select option--</option>                       
                                <?php $qu = "select * from job_position_category";
                                       $qu1 = mysqli_query($con, $qu);
                                       while($qu2 = mysqli_fetch_array($qu1)){ ?>
                                            <option value="<?php echo $qu2['job_position']; ?>" <?php if (isset($position)) {
                                            if($position == $qu2['job_position']){
                                                echo "selected"; }
                                        } ?> ><?php echo $qu2['job_position']; ?></option>
                            <?php } ?>                        
                            </select>                       
                        </div>                      
                        <div class="form-group">                            
                            <label>Job Subcategory</label>                           
                            <select class="form-control" name="ajax_job_subcategory" id="ajax_job_subcategory">                               
                                <option value="">--select option--</option>                          
                                <?php $quer = "select * from job_subcategory";
                                $qu = mysqli_query($con, $quer);
                                while ($qu2 = mysqli_fetch_array($qu)) { ?>                              
                                    <option value="<?php echo $qu2['job_subcategory_name']; ?>"><?php echo $qu2['job_subcategory_name']; ?>
                                    </option>                            
                                <?php } ?>                            
                            </select>                       
                        </div>                      

                        <div class="form-group">                            
                            <label>Start Date</label>                           
                            <input type="text" name="ajax_start_date" id="ajax_start_date" placeholder="Start Date" class="form-control" >                      
                        </div>                      

                        <div class="form-group">                            
                            <label>End Date</label>                         
                            <input type="text" name="ajax_end_date" id="ajax_end_date" placeholder="Start Date" class="form-control" >                      
                        </div>                      

                        <div class="form-group">                            
                            <label>Job Description</label>                          
                            <textarea placeholder="Job Description" name="ajax_job_description" id="ajax_job_description" class="form-control" rows="5"></textarea>               
                        </div>                      

                        <div class="form-group">                            
                            <label>No of Vacancies</label>                          
                            <input type="number" name="ajax_no_of_vacancy" id="ajax_no_of_vacancy" placeholder="No of Vacancies" class="form-control" min="1" max="100" >       
                        </div>                      

                        <div class="form-group">                            
                            <label for="amount">Salary Range:</label>                            
                            <input type="text" id="amount" name="salary" readonly style="border:0; color:#f6931f; font-weight:bold;">                           
                            <div id="slider-range"></div>                      
                        </div>                      

                        <div class="form-group">                            
                            <label >City:</label>                           
                            <select class="form-control" name="city" id="city">                         
                                <option value="">--select option--</option>                        
                                <option value="Surat" <?php if (isset($city)) { if ($city == 'Surat') {
                                    echo "selected"; } } ?>>Surat</option>                                 
                                <option value="Ahamadabad" <?php if (isset($city)){ if ($city == 'Ahamadabad'){ echo "selected"; } } ?>>Ahamadabad</option> 
                                <option value="Vadodara" <?php if (isset($city)){if ($city == 'Vadodara'){echo "selected";}} ?>>Vadodara</option>
                                <option value="Rajkot" <?php if (isset($city)){if ($city == 'Rajkot'){echo "selected";}} ?>>Rajkot</option>                            
                            </select>                       
                        </div>                      

                        <div class="form-group">                            
                            <label >Location:</label>                           
                            <select class="form-control" name="location" id="location"> 
                                <option value="">-- Select Option --</option> 
                                <option value="Adajan" <?php if (isset($job_area)){if ($job_area == 'Adajan'){echo "selected";}} ?>>Adajan</option> 
                                <option value="Amroli" <?php if (isset($job_area)){if ($job_area == 'Amroli') {echo "selected";}} ?>>Amroli</option><option value="Athvalines" <?php if (isset($job_area)){if ($job_area == 'Athvalines'){ echo "selected";}} ?>>Athvalines</option>                                        
                                <option value="Chikuvadi" <?php if (isset($job_area)){if ($job_area == 'Chikuvadi'){echo "selected";}} ?>>Chikuvadi</option> 
                                <option value="Delhi Gate" <?php if (isset($job_area)){ if ($job_area == 'Delhi Gate'){echo "selected";}} ?>>Delhi Gate</option> 
                                <option value="GhodDod Road" <?php if (isset($job_area)){if ($job_area == 'GhodDod Road'){echo "selected";}} ?>>GhodDod Road</option> 
                                <option value="Gatanjali" <?php if (isset($job_area)){if ($job_area == 'Gatanjali'){echo "selected";}} ?>>Gatanjali</option>
                                <option value="Hirabaug" <?php if (isset($job_area)){if ($job_area == 'Hirabaug'){echo "selected";}} ?>>Hirabaug</option> 
                                <option value="Kozve" <?php if (isset($job_area)){if ($job_area == 'Kozve'){echo "selected";}} ?>>Kozve</option>
                                <option value="Majuragate" <?php if (isset($job_area)){if ($job_area == 'Majuragate') { echo "selected";}} ?>>Majuragate</option>
                                <option value="Mini Bazar" <?php if (isset($job_area)){if ($job_area == 'Mini Bazar'){echo "selected";}} ?>>Mini Bazar</option>
                                <option value="Mota Varachha" <?php if (isset($job_area)){if ($job_area == 'Mota Varachha'){echo "selected";}} ?>>Mota Varachha</option> 
                                <option value="Pandesara" <?php if (isset($job_area)){ if ($job_area == 'Pandesara'){echo "selected";}} ?>>Pandesara</option> 
                                <option value="Rachana" <?php if (isset($job_area)){if ($job_area == 'Rachana'){echo "selected";}} ?>>Rachana</option>
                                <option value="Rander" <?php if (isset($job_area)){if ($job_area == 'Rander'){ echo "selected";}} ?>>Rander</option>
                                <option value="Ring Road" <?php if (isset($job_area)){if ($job_area == 'Ring Road'){ echo "selected";}} ?>>Ring Road</option> 
                                <option value="Sarthana" <?php if (isset($job_area)){if ($job_area == 'Sarthana'){echo "selected";}} ?>>Sarthana</option> 
                                <option value="ShyamDham" <?php if (isset($job_area)){if ($job_area == 'ShyamDham'){echo "selected";}} ?>>ShyamDham</option>
                                <option value="Simadanaka" <?php if (isset($job_area)){if ($job_area == 'Simadanaka'){ echo "selected";}} ?>>Simadanaka</option> 
                                <option value="Station" <?php if (isset($job_area)){if ($job_area == 'Station'){echo "selected";}} ?>>Station</option>                     
                                <option value="Utran" <?php if (isset($job_area)){if ($job_area == 'Utran'){ echo "selected";}} ?>>Utran</option>      
                                <option value="Vesu" <?php if (isset($job_area)){if ($job_area == 'Vesu'){echo "selected";}} ?>>Vesu</option>
                            </select>                       
                        </div>                      

                        <div class="">                          
                            <input type="button" value="Update" onclick="return update_posted_job(this)" name="submit" class="btn btn-primary">                         
                            <span id="result_job" style="margin-left:10px;"></span>                     
                        </div>                  
                    </form>                     
                </div>      
            </div>  
        </aside>

        <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">  
            <div class="modal-dialog" role="document">    
                <div class="modal-content">      
                    <div class="modal-header text-center">        
                        <h4 class="modal-title w-100 font-weight-bold">Write to us</h4>        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">       
                            <span aria-hidden="true">&times;</span>        
                        </button>      
                    </div>      
                    <div class="modal-body mx-3">        
                        <div class="md-form mb-5">         
                            <i class="fas fa-user prefix grey-text"></i>          
                            <input type="text" id="form34" class="form-control validate">          
                            <label data-error="wrong" data-success="right" for="form34">Your name</label>
                        </div>  

                        <div class="md-form mb-5">          
                            <i class="fas fa-envelope prefix grey-text"></i>          
                            <input type="email" id="form29" class="form-control validate">          
                            <label data-error="wrong" data-success="right" for="form29">Your email</label>
                        </div> 

                        <div class="md-form mb-5">          
                            <i class="fas fa-tag prefix grey-text"></i>          
                            <input type="text" id="form32" class="form-control validate">          
                            <label data-error="wrong" data-success="right" for="form32">Subject</label>
                        </div>        

                        <div class="md-form">          
                            <i class="fas fa-pencil prefix grey-text"></i>          
                            <textarea type="text" id="form8" class="md-textarea form-control" rows="4"></textarea>          
                            <label data-error="wrong" data-success="right" for="form8">Your message</label>
                        </div>      
                    </div>      
                    <div class="modal-footer d-flex justify-content-center">        
                        <button class="btn btn-unique">Send<i class="fas fa-paper-plane-o ml-1"></i></button>      
                    </div>    
                </div>  
            </div>
        </div>
        <?php include ('footer.php'); ?>  


        <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-left:-10%;">
            <div class="modal-dialog">
                <div class="modal-content" style="width:150%;">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <video controls width="100%">
                            <source src="" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>  
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>   
    $('#job_reason_record').hide(); 
        $(function() {    
            $( "#start_date" ).datepicker({     
                minDate: 0,      
                dateFormat: 'yy-mm-dd'     
            });  
        });   
        $(function() {    
            $("#end_date" ).datepicker({     
                minDate: 0,          
                dateFormat: 'yy-mm-dd'    
            });  
        });
    </script>
 <script type="text/javascript"> 
    $(document).ready(function(){      
        $('.yellow_rign').click(function(){            
            $('.posted_job_sidebar').addClass('show_posted_job_sidebar');           
            $('.posted_job_form_sec').addClass('show_posted_job_sidebar_enter');            
            $('.footer').addClass('show_posted_job_sidebar_enter');     
        });     
        $('.posted_job_sidebar_close').click(function() {           
            $('.posted_job_sidebar').removeClass('show_posted_job_sidebar');            
            $('.posted_job_form_sec').removeClass('show_posted_job_sidebar_enter');         
            $('.footer').removeClass('show_posted_job_sidebar_enter');      
        })  
    });
</script>
    <script>
    function edit_jobs(jobpost_id)
    {   

        $('#change_name_title').html("Edit Job");   
        $('#get_record_of_jobpost').hide(); 
        $('#Comment_On_Job').hide();    
        $('#Deactive_Job_Reason').hide();    
        $('#posted_form_record').show();    
        $('.posted_job_sidebar').addClass('show_posted_job_sidebar');   
        $('.posted_job_form_sec').addClass('show_posted_job_sidebar_enter');    
        $('.footer').addClass('show_posted_job_sidebar_enter'); 
        $.ajax({        
            url : "get_ajax_job_detail.php",        
            type : "post",      
            data:{          
                'jobpost_id' : jobpost_id       
            },      
            success:function(response){         
            // console.log(response);           
            var data = $.parseJSON(response);            
                $('#jobPosted_job').val(data.jobpost_id);            
                $('#ajax_job_name').val(data.job_name);            
                $('#ajax_position').val(data.position);            
                $('#ajax_job_subcategory').val(data.job_subcategory);            
                $('#ajax_start_date').val(data.start_date);            
                $('#ajax_end_date').val(data.end_date);            
                $('#ajax_job_description').val(data.job_description);            
                $('#ajax_no_of_vacancy').val(data.no_of_vacancy);            
                $('#amount').val(data.salary);            
                $('#city').val(data.city);            
                $('#location').val(data.job_area);                  
            }   
        }); 
    }
</script>
<script>
$(document).ready(function(){  
    $('[data-toggle="tooltip"]').tooltip();}); 
        $(function(){    
            $( "#slider-range" ).slider({      
                range: true,      
                min: 1000,      
                max: 100000,      
                values: [ 8000, 15000 ],      
                slide: function( event, ui ) {        
                    $( "#amount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );      
                }    
            });    
            $( "#amount" ).val("" + $( "#slider-range" ).slider( "values", 0 ) +      " - " + $( "#slider-range" ).slider( "values", 1));      });  $( function() {    $( "#ajax_start_date" ).datepicker({        minDate: 0,      dateFormat: 'yy-mm-dd'     });  } );   $( function() {    $( "#ajax_end_date" ).datepicker({       minDate: 0,  dateFormat: 'yy-mm-dd'    });  } );  

            function get_subcategory(){     
                var ct_record =  $('#ajax_position').val();     
                $.ajax({        
                    url : "ajax_sub_category.php",        
                    type : "post",        
                    data:{          
                        'category_record' : ct_record        
                    },        
                    success:function(response){          
                        $('#ajax_job_subcategory').html(response);        
                    }     
                });   
            }

        </script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
                        // just for the demos, avoids form 
    submitjQuery.validator.setDefaults({  
        debug: false,  
        success: "valid"
    });
        
     function update_posted_job(event)
     {
            // event.preventDefault();       
            var formdata =  $('#edit_posted_job').serialize();       
            alert(formdata);       
            $.ajax({          
                url : "update_posted_jobs.php",          
                type : "post",          
                data: formdata,          
                success:function(resp){           
                    $('#edit_posted_job')[0].reset();            
                    var data = $.parseJSON(resp);              
                    var ddd = data.status;            // console.log(ddd);            
                    if(ddd == '1'){                
                        $('#result_job').fadeIn();                
                        $('#result_job').html("<span class='alert alert-success'>Successfully Updated Job</span>");                
                        $('#result_job').fadeOut(3000);         
                    }            
                    else if(ddd == '2'){               
                        $('#result_job').fadeIn();                
                        $('#result_job').html("<span class='alert alert-success'>Something Wrong</span>");   $('#result_job').fadeOut(3000);            
                    }            
                    setTimeout(function() {                    
                        location.reload();                
                    }, 3000);          
                }      
            });   
        }

    function deactive_jobs(jobpost_id = '', company_id = ''){ var co = confirm("Are You Sure To Deacive This Job");   if(co)  {       $('#job_post_id_data').val(jobpost_id);     $('#company_id_data').val(company_id);      $('#change_name_title').html("Reason to Deactive Job");     $('.posted_job_sidebar').addClass('show_posted_job_sidebar');       $('.posted_job_form_sec').addClass('show_posted_job_sidebar_enter');        $('.footer').addClass('show_posted_job_sidebar_enter');     $('#get_record_of_jobpost').hide();     $('#posted_form_record').hide();        $('#Deactive_Job_Reason').show();       $('#Comment_On_Job').hide();        
                        // $.ajax({     
                            //  url : "deactive_jobs_by_recruiter.php",     //  type : "post",      
                            //  data:{      
                            //      'job_post_id' : jobpost_id      
                            //  },      //  success:function(Response)      //  {                       
                                //  }       
                                // });  
                            }   else    {       return false;   }}function view_job_record(jobpost_id){ $('.posted_job_sidebar').addClass('show_posted_job_sidebar');   $('.posted_job_form_sec').addClass('show_posted_job_sidebar_enter');    $('.footer').addClass('show_posted_job_sidebar_enter'); $('#Deactive_Job_Reason').hide();   $('#Comment_On_Job').hide();    $.ajax({          url : "get_posted_jobs.php",          type : "post",          data: {             'job_id' : jobpost_id          },          success:function(resp)          {            $('#change_name_title').html("View Job Details");           $('#posted_form_record').hide();            $('#get_record_of_jobpost').show();          
                            // $('#Comment_On_Job').hide(); 
                                        $('#get_record_of_jobpost').html(resp);             
                                        // $('#edit_posted_job')[0].reset();   // var data = $.parseJSON(resp);             
                                        // var ddd = data.status;             
                                      } });}function getReasonForm(){   var reason =  $('#reason_deactive').val();  if(reason == 'Other'){      $('#job_reason_record').show(); }else{      $('#job_reason_record').hide(); }}// just for the demos, avoids form 
                                      submitjQuery.validator.setDefaults({  debug: true,  success: "valid"});$( "#deactive_posted_jobs" ).validate({  rules: {    reason_deactive: {      required: true    }  },  messages:{   reason_deactive:{       required:"<div style='color:red'>Select Job Deactive Reason</div>"      }  },  submitHandler: function () {       event.preventDefault();       var formdata =  $('#deactive_posted_jobs').serialize();       
                                      // alert(formdata);       
                                      $.ajax({          url : "deactive_jobs_by_recruiter.php",          type : "post",          data: formdata,          
                                        success:function(resp)          {           $('#deactive_posted_jobs')[0].reset();            
                                      // var data = $.parseJSON(resp);              
                                      // var ddd = data.status;            console.log(resp);            
                                      if(resp == '1')            {                $('#reason_job_record').fadeIn();                $('#reason_job_record').html("<span class='alert alert-success'>Successfully Deactive Job</span>");                $('#reason_job_record').fadeOut(3000);            }            else if(ddd == '0'){              $('#reason_job_record').fadeIn();                $('#reason_job_record').html("<span class='alert alert-success'>Something Wrong</span>");                $('#reason_job_record').fadeOut(3000);            }            setTimeout(function() {                    location.reload();                }, 3000);          }       });   }});function comment_on_jobs(jobpost_id='', company_id =''){      $('#job_post_comment').val(jobpost_id);     $('#company_id_comment').val(company_id);       $('#change_name_title').html("Any Comment On Job Regarding");       $('.posted_job_sidebar').addClass('show_posted_job_sidebar');       $('.posted_job_form_sec').addClass('show_posted_job_sidebar_enter');        $('.footer').addClass('show_posted_job_sidebar_enter');     $('#get_record_of_jobpost').hide();     $('#posted_form_record').hide();        $('#Deactive_Job_Reason').hide();           $('#Comment_On_Job').show();    }
                                      // just for the demos, avoids form 
                                      submitjQuery.validator.setDefaults({  debug: true,  success: "valid"});$("#comments_posted_jobs").validate({  rules: {    reason_comment: {      required: true    },    ajax_job_reason_comment:{        required : true    }  },  messages:{    reason_comment:{        required:"<div style='color:red'>Select Comment Reason</div>"   },      ajax_job_reason_comment:{       required : "<div style='color:red'>Enter Comment</div>"     }  },  submitHandler: function () {       event.preventDefault();       var formdata =  $('#comments_posted_jobs').serialize();       $.ajax({          url : "add_comments_posted_jobs.php",          type : "post",          data: formdata,          success:function(resp)          {           $('#comments_posted_jobs')[0].reset();              
                                      // console.log(resp);            
                                      if(resp == '1')            {                $('#reason_job_record_comment').fadeIn();                $('#reason_job_record_comment').html("<span class='alert alert-success'>Successfully Comment On Job</span>");                $('#reason_job_record_comment').fadeOut(3000);          }            else if(resp == '0'){              $('#reason_job_record_comment').fadeIn();              $('#reason_job_record_comment').html("<span class='alert alert-success'>Something Wrong</span>");              $('#reason_job_record_comment').fadeOut(3000);            }            setTimeout(function() {                    location.reload();                }, 3000);         }       });     }});</script>
