
<style>
  .col{
    color: red;
  }
  .pos{
    background-color: #0b527e;
   }
   .text-black{
    color: white;
   }
   /*.full_lead_block{
    overflow-y: visible;
   }*/
</style>
<style type="text/css">
              .simple_border_box_design {
                border: 1px solid #ccc;
                padding: 10px;
                border-radius: 3px;
                width: 100%;
                display: inline-block;
                position: relative;
                background-color: #fff;
                margin-bottom: 15px;
              }
              .form-row {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin-right: -5px;
                margin-left: -5px;
              }
              .simple_border_box_design .form-group {
                display: block;
                display: flex;
                align-content: center;
                margin-bottom: 6px;
              }
              .simple_border_box_design .form-group label {
                  white-space: nowrap;
                  margin-bottom: 0;
                  line-height: 24px;
                  margin-right: 20px;
              }
              label, span {
                  font-size: 12px;
                  margin-bottom: 5px !important;
                  display:block;
                  margin-bottom: .5rem;
              }
              .detail-heading{
                font-size: 12px;
                font-weight: 700;
                margin-bottom: 10px;
                padding-bottom: 10px;
                text-decoration-line: underline;
                text-decoration-style: double;
              }
              .form-control{
                font-size: 12px;
                /*border:none;*/
                border-radius: 0;
              }
              .main_content section{
                padding: 15px 0;
              }
              .modal-header{
                background-color: #0b527e;
              }
              .modal-title{
                color: white;
              }
</style>
<main class="main_content d-inline-block">
  <section class="axtraage_main_first_sec d-inline-block w-100 position-relative">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          <div class="extra_Block_box">
            <div class="extra_top_search_header_bar d-inline-block w-100 position-relative">
              <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group mb-0">
                    <div class="btn-group w-100">
                      <input type="text" name="" id="search" class="form-control" placeholder="Search by Name, Email or Mobile">
                      <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                  <div class="extra_top_search_header_bar_icon text-sm-center text-xl-left text-lg-left text-md-left text-center">
                    <ul>
                      <li>
                        <a href="#" data-toggle="modal" data-toggle="modal" data-target="#searchingm"><i class="fa fa-filter"></i></a>
                      </li>
                    </ul>

                  </div>
                </div>
              </div>
            </div>

  <!-- serach admission data modal -->
<div class="modal fade" id="searchingm" tabindex="-1" role="dialog" aria-labelledby="searchingm" aria-hidden="true">
  <div class="modal-dialog" style="max-width:1000px !important;">
    <div class="modal-content" style="margin-top: 55px;">
      <div class="modal-header" style="background-color: #0b527e;">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Search Admission Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card">
  <div class="card-body">
    <!-- <h5 class="card-title btn text p">Master Search</h5> -->
    <p class="card-text">
      <form method="post" action="<?php  echo base_url(); ?>AddmissionController/unfillup_fealds">
    <div class="row">
      <div class="col-sm-3">
        <div class="form-group">
          <label><b>Name</b></label>   
          <input type="text" class="form-control" value="<?php if(!empty($filter_fname)) { echo @$filter_fname; } ?>" placeholder="Name"  name="filter_fname">
      </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
          <label><b>Surname</b></label>   
          <input type="text" class="form-control" value="<?php if(!empty($filter_lname)) { echo @$filter_lname; } ?>" placeholder="SurName"  name="filter_lname">
      </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
          <label><b>Email</b></label>   
        <input type="text" class="form-control" value="<?php if(!empty($filter_email)) { echo @$filter_email; } ?>" placeholder="Example@gmail.com" name="filter_email">
      </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
          <label><b>Mobile</b></label>   
        <input type="text" class="form-control" value="<?php if(!empty($filter_mobile)) { echo @$filter_mobile; } ?>" placeholder="+91-00000-00000" name="filter_mobile">
      </div>
    </div>
      <div class="col-sm-3">
      <div class="form-group">  
          <label><b>GR ID</b></label>   
      <input type="text" class="form-control" value="<?php if(!empty($filter_gr_id)) { echo @$filter_gr_id; } ?>" placeholder="GR ID"  name="filter_gr_id">
    </div>
    </div>
    <div class="col-sm-3">
      <div class="form-group">
     <label for="Faculty"><b>Branch</b></label>   
     <select class="form-control custom-select my-1 mr-sm-2"   name="filter_branch">
     <option selected disabled>Filter Branch</option>
      <?php foreach($list_branch as $val) { ?>
      <option  <?php if(@$filter_branch==$val->branch_id) { echo "selected"; } ?> value="<?php echo $val->branch_id; ?>"> <?php echo $val->branch_name; ?></option>
     <?php } ?>
    </select>
    </div>
  </div>
    <div class="col-sm-3">
      <div class="form-group">
         <label for="Faculty"><b>Course</b></label>   
    <select class="form-control"   name="filter_course">
      <option selected disabled>Course</option>
    <?php foreach($list_course as $val) { if($val->status=="0") { ?>
    <option   <?php if(@$filter_course==$val->course_name) { echo "selected"  ; } ?> value="<?php echo $val->course_id; ?>"> <?php echo $val->course_name; ?></option>
      <?php } } ?>
      </select>
   </div>
 </div>
 <div class="col-sm-3">
      <div class="form-group">
         <label for="Faculty"><b>Package</b></label>   
    <select class="form-control"   name="filter_package">
      <option selected disabled>Package</option>
    <?php foreach($list_package as $val) { if($val->status=="0") { ?>
    <option   <?php if(@$filter_package==$val->package_name) { echo "selected"  ; } ?> value="<?php echo $val->package_id; ?>"> <?php echo $val->package_name; ?></option>
      <?php } } ?>
      </select>
   </div>
 </div>
</div>
<div class="float-right">
<input type="submit" id="btn" class="btn btn-success f" value="Search" name="filter_admission">
    <a class="btn btn-danger f" href="<?php echo base_url(); ?>AddmissionController/unfillup_fealds">Reset</a>
  </div>
</form>
    </p>
  </div>
</div>
 </div>
</div>
  </div>
</div>
                <!-- <div class="extra_lead_menu d-inline-block w-100 position-relative">
              <ul>
                <li><a href="#" class="active">All (659)</a></li>
                <li><a href="#">New (466)</a></li>
                <li><a href="#">Urgent Call (33)</a></li>
                <li><a href="#">Follow-up (77)</a></li>
                <li><a href="#">Email (0)</a></li>
                <li><a href="#">Walkin (3)</a></li>
                <li><a href="#">Confused (0)</a></li>
                <li><a href="#">Demo (0)</a></li>
                <li><a href="#">Enrolled (24)</a></li>
                <li><a href="#">Closed (56)</a></li>
                <li><a href="#">Referred From Me (6686)</a></li>
                <li><a href="#">Re-Enquired (0)</a></li>
              </ul>
                </div> -->
                <!--       <div class="menu_bottom_btn_row">
              <div class="row justify-content-center">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                  <div class="dropdown">
                    <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-exchange-alt"></i>
                    </button>
                    <div class="dropdown-menu calender_drop" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">No sorting applied to this list.</a>
                      <a class="dropdown-item" href="#"><i class="fas fa-calendar-week"></i>Creation Date</a>
                      <a class="dropdown-item" href="#"><i class="fas fa-calendar-week"></i>Modification Date</a>
                      <a class="dropdown-item" href="#"><i class="fas fa-calendar-week"></i>Next Action Date</a>
                      <a class="dropdown-item" href="#"><i class="fas fa-calendar-week"></i>Re-Enquiry Date</a>
                      <a class="dropdown-item " href="#"><i class="fas fa-calendar-week"></i>Lead score</a>
                    </div>
                  </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10">
                  <ul class="icon_filter">
                    <li>
                      <a href="#add_camping" data-toggle="modal" title="Add Marketing Campaign" class="btn btn-primary"><i class="fas fa-bullhorn"></i></a>
                      <a href="#refer_leads" data-toggle="modal" title="Refer All Leads" class="btn btn-primary"><i class="fas fa-share"></i></a>
                      <a href="#sms_send_all" data-toggle="modal" title="Send SMS To All" class="btn btn-primary"><i class="fas fa-comment-alt"></i></a>
                      <a href="#sms_email_all" data-toggle="modal" title="Send Email To All" class="btn btn-primary"><i class="fas fa-envelope"></i></a>
                      <a href="#" title="Refresh Info" class="btn btn-primary"><i class="fas fa-sync-alt"></i></a>
                      <a href="#download_all_leads" data-toggle="modal" title="Download All Leads" class="btn btn-primary"><i class="fas fa-download"></i></a>
                      <a href="#" data-toggle="tooltip" title="Filter Leads" class="btn btn-primary"><i class="fas fa-filter"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
                </div> -->
            <div class="full_lead_block d-inline-block w-100 position-relative">
              <?php $cnt=0; foreach($Admission_record as $val) { ?>
                 <div id="finalResult">
                <div class="lead_block_box">
                  <div class="col-md-12">
                    <div class="row">
                      
                      <div class="simple_border_box_design">                       
                        <span class="detail-heading">Communication</span>
                        <div class="form-row">
                          <?php $cnt=0; ?>
                            <div class="col-sm-2">
                              <?php 
                                if($val->gr_id=="")
                                {
                                  echo "<label><b class='col'>GrId :</b></label>";
                                }
                                else
                                {
                                  echo "<label><b>GrId :</b></label>";
                                }
                              ?>
                              <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_fields">
                                Launch demo modal
                              </button> -->
                              <span>
                                <?php 
                                  if($val->gr_id=="")
                                  {
                                    $cnt++;
                                    echo "_";
                                  }
                                  else
                                  {
                                    echo $val->gr_id ;
                                  }
                                ?>
                              </span>
                            </div>
                            <div class="col-sm-3">
                              <?php 
                                if($val->email=="")
                                {
                                  echo "<label><b class='col'>Email :</b></label>";
                                }
                                else
                                {
                                  echo "<label><b>Email :</b></label>";
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->email=="")
                                  {
                                        $cnt++;
                                        echo "_";
                                  }
                                  else
                                  {
                                     echo $val->email;
                                  }
                                ?>
                              </span>
                            </div>
                            <div class="col-sm-2">
                              <?php 
                                if($val->mobile_no=="")
                                {
                                    echo "<label><b class='col'>Mobile No :</b></label>";
                                }
                                else
                                {
                                    echo "<label><b>Mobile No :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->mobile_no=="")
                                  {
                                        $cnt++;
                                        echo "_";
                                  }
                                  else
                                  {
                                     echo $val->mobile_no;
                                  }
                                ?>
                              </span>
                            </div>
                            <div class="col-sm-2">
                              <?php 
                                if($val->alternate_mobile_no=="")
                                  {
                                      echo "<label><b class='col'>Alternet No :</b></label>";
                                  }
                                  else
                                  {
                                      echo "<label><b>Alternet No :</b></label>";
                                     
                                  }
                                ?>
                                <span>
                                <?php 
                                  if($val->alternate_mobile_no=="")
                                  {
                                        $cnt++;
                                        echo "_";
                                  }
                                  else
                                  {
                                     echo $val->alternate_mobile_no;
                                  }
                                ?>
                              </span>
                            </div>
                            <div class="col-sm-2">
                              <?php 
                                if($val->source_id=="")
                                {
                                    echo "<label><b class='col'>Source :</b></label>";
                                }
                                else
                                {
                                    echo "<label><b>Source :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->source_id=="")
                                  {
                                        $cnt++;
                                        echo "_";
                                  }
                                  else
                                  {
                                     echo $val->source_id;
                                  }
                                ?>
                              </span>
                            </div>
                          </div>
                        <span class="detail-heading">Personal Details</span>
                        <div class="form-row">
                          <div class="col-sm-2">
                            <?php 
                              if($val->admission_number=="")
                              {
                                  echo "<label><b class='col'>AdmissionNo :</b></label>";
                              }
                              else
                              {
                                  echo "<label><b>AdmissionNo :</b></label>";
                                 
                              }
                            ?>
                            <span>
                              <?php 
                              if($val->admission_number=="")
                                {
                                      $cnt++;
                                      echo "-;";
                                }
                                else
                                {
                                  echo $val->admission_number;
                                }
                              ?>
                            </span>
                          </div>
                          <div class="col-sm-3">
                            <?php 
                              if($val->first_name=="")
                              {
                                  echo "<label><b class='col'>Name :</b></label>";
                              }
                              else
                              {
                                  echo "<label><b>Name :</b></label>";
                                 
                              }
                            ?>
                            <span>
                              <?php 
                              if($val->first_name=="")
                                {
                                      $cnt++;
                                      echo "-";
                                }
                                else
                                {
                                  echo $val->first_name;
                                }
                              ?>
                            </span>
                          </div>
                          <div class="col-sm-2">
                            <?php 
                              if($val->surname=="")
                              {
                                  echo "<label><b class='col'>Surname :</b></label>";
                              }
                              else
                              {
                                  echo "<label><b>Surname :</b></label>";
                                 
                              }
                            ?>
                            <span>
                              <?php 
                              if($val->surname=="")
                                {
                                      $cnt++;
                                      echo "-";
                                }
                                else
                                {
                                   echo $val->surname;
                                }
                              ?>
                            </span>
                          </div>
                          <div class="col-sm-2">
                            <?php 
                              if($val->admission_branch=="")
                              {
                                  echo "<label><b class='col'>Branch Name :</b></label>";
                              }
                              else
                              {
                                  echo "<label><b>Branch Name :</b></label>";
                                 
                              }
                            ?>
                            <span>
                              <?php 
                              if($val->admission_branch=="")
                                {
                                      $cnt++;
                                      echo "-";
                                }
                                else
                                {
                                  foreach($list_branch as $ld) 
                                  { 
                                    if($val->admission_branch==$ld->branch_id)
                                      { echo $ld->branch_name; } 
                                  }
                                }
                              ?>
                            </span>
                          </div>
                          <div class="col-sm-2">
                            <?php 
                              if($val->addby=="")
                                {
                                    echo "<label><b class='col'>Assigned To :</b></label>";
                                }
                                else
                                {
                                    echo "<label><b>Assigned To :</b></label>";
                                   
                                }
                              ?>
                            <span>
                              <?php 
                              if($val->addby=="")
                                {
                                      $cnt++;
                                      echo "-";
                                }
                                else
                                {
                                   echo $val->addby;
                                }
                              ?>
                            </span>
                          </div>
                        </div>
                        <span class="detail-heading">Course & Fees</span>
                        <div class="form-row">
                          <div class="col-sm-2">
                            <?php 
                              if($val->branch_id=="")
                              {
                                echo "<label><b class='col'>Branch Name :</b></label>";
                              }
                              else
                              {
                                echo "<label><b>Branch Name :</b></label>";
                              }
                            ?>
                            <span>
                              <?php 
                              if($val->branch_id=="")
                                {
                                      $cnt++;
                                      echo "-";
                                }
                                else
                                {
                                    foreach($list_branch as $ld) 
                                          { 
                                           if($val->branch_id==$ld->branch_id)
                                            { echo $ld->branch_name; } 
                                    
                                          }
                                }
                              ?>
                            </span>
                          </div>
                          <div class="col-sm-3">
                            <?php 
                              if($val->year=="")
                                {
                                    echo "<label><b class='col'>Session :</b></label>";
                                }
                                else
                                {
                                    echo "<label><b>Session :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->year=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                     echo $val->year;
                                  }
                                ?>
                              </span>
                          </div>
                          <div class="col-sm-2">
                             <?php 
                              if($val->department_id=="")
                                {
                                    echo "<label><b class='col'>Department :</b></label>";
                                }
                                else
                                {
                                    echo "<label><b>Department :</b></label>";                         
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->department_id=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                     foreach($list_department as $ld) 
                                      { 
                                        if($val->department_id==$ld->department_id)
                                        { 
                                          echo $ld->department_name; 
                                        }                     
                                      }
                                  }
                                ?>
                              </span>
                          </div>
                          <div class="col-sm-2">
                            <?php 
                              if($val->type=="")
                                {
                                    echo "<label><b class='col'>Type :</b></label>";
                                }
                                else
                                {
                                    echo "<label><b>Type :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->type=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                     echo $val->type;
                                  }
                                ?>
                              </span>
                          </div>
                          <?php if($val->type=="single") { ?>
                          
                             <div class="col-sm-2">
                            <?php 
                              if($val->course_id=="")
                                {
                                    echo "<label><b class='col'>Course :</b></label>";
                                }
                                else
                                {
                                    echo "<label><b>Course :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->course_id=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                     foreach($list_course as $ld) 
                                            { 
                                             if($val->course_id==$ld->course_id)
                                              { echo $ld->course_name; } 
                                      
                                            }
                                  }
                                ?>
                              </span>
                          </div>
                          <?php } else { ?>
                          <div class="col-sm-2">
                            <?php 
                              if($val->package_id=="")
                                {
                                    echo "<label><b class='col'>Package :</b></label>";
                                }
                                else
                                {
                                    echo "<label><b>Package :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->package_id=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                     foreach($list_package as $ld) 
                                            { 
                                             if($val->package_id==$ld->package_id)
                                              { echo $ld->package_name; } 
                                      
                                            }
                                  }
                                ?>
                              </span>
                          </div>
                        <?php } ?>
                          <div class="col-sm-2">
                            <?php 
                              if($val->faculty_id=="")
                                {
                                    echo "<label><b class='col'>Assign To :</b></label>";
                                }
                                else
                                {
                                    echo "<label><b>Assign To :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->faculty_id=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                     foreach($faculty_all as $ld) 
                                            { 
                                             if($val->faculty_id==$ld->faculty_id)
                                              { echo $ld->name; } 
                                      
                                            }
                                  }
                                ?>
                              </span>
                          </div>
                          <div class="col-sm-2">
                             <?php 
                              if($val->batch_id=="")
                                {
                                    echo "<label><b class='col'>Batch :</b></label>";
                                }
                                else
                                {
                                    echo "<label><b>Batch :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->batch_id=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                     foreach($list_batch as $ld) 
                                            { 
                                             if($val->batch_id==$ld->batch_id)
                                              { echo $ld->batch_name; } 
                                      
                                            }
                                  }
                                ?>
                              </span>
                          </div>  
                        </div>
                        <span class="detail-heading">Address Details</span>
                        <div class="form-row">
                          <div class="col-sm-2">
                            <?php 
                              if($val->state_id=="")
                              {
                                  echo "<label><b class='col'>State :</b><i class='fas fa-pencil-alt ml-2'data-toggle='modal' data-target='#state_field'  onclick='return fetch_data_adm_process($val->admission_id)'></i></label>";
                              }
                              else
                              {
                                  echo "<label><b>State :</b></label>";
                                 
                              }
                            ?>
                            <span>
                              <?php 
                              if($val->state_id=="")
                                {
                                      $cnt++;
                                      echo "-";
                                }
                                else
                                {
                                   echo $val->state_id;
                                }
                              ?>
                            </span>
                          </div>
                          <div class="col-sm-3">
                            <?php 
                              if($val->city_id=="")
                                {
                                    echo "<label><b class='col'>City :</b><i class='fas fa-pencil-alt ml-2'data-toggle='modal' data-target='#city_field'  onclick='return fetch_data_adm_process($val->admission_id)'></i></label>";
                                }
                                else
                                {
                                    echo "<label><b>City :</b></label>";                         
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->city_id=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                     echo $val->city_id;
                                  }
                                ?>
                              </span>
                          </div>
                          <div class="col-sm-2">
                            <?php 
                              if($val->area_id=="")
                              {
                                  echo "<label><b class='col'>Area :</b><i class='fas fa-pencil-alt ml-2'data-toggle='modal' data-target='#area_field'  onclick='return fetch_data_adm_process($val->admission_id)'></i></label>";
                              }
                              else
                              {
                                  echo "<label><b>Area :</b></label>";                         
                              }
                            ?>
                            <span>
                              <?php 
                                if($val->area_id=="")
                                {
                                      $cnt++;
                                      echo "-";
                                }
                                else
                                {
                                  foreach($list_area as $ld) 
                                  { 
                                    if($val->area_id==$ld->area_id)
                                    { 
                                      echo $ld->area_name; 
                                    }
                                  }
                                }
                              ?>
                            </span>
                          </div>
                          <div class="col-sm-2">
                            <?php 
                              if($val->pin_code=="")
                                {
                                    echo "<label><b class='col'>Pin Code :</b><i class='fas fa-pencil-alt ml-2'data-toggle='modal' data-target='#pincode_field'  onclick='return fetch_data_adm_process($val->admission_id)'></i></label>";
                                }
                                else
                                {
                                    echo "<label><b>Pin Code :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->pin_code=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                     echo $val->pin_code;
                                  }
                                ?>
                              </span>
                          </div>
                          <div class="col-sm-2">
                             <?php 
                              if($val->present_address=="")
                                {
                                    echo "<label><b class='col'>Present Address :</b><i class='fas fa-pencil-alt ml-2'data-toggle='modal' data-target='#presentaddress_field'  onclick='return fetch_data_adm_process($val->admission_id)'></i></label>";
                                }
                                else
                                {
                                    echo "<label><b>Present Address :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->present_address=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                     echo $val->present_address;
                                  }
                                ?>
                              </span>
                          </div>
                        </div>
                        <span class="detail-heading">Parents Details</span>
                        <div class="form-row">
                          <div class="col-sm-2">
                           <?php 
                            if($val->father_name=="")
                              {
                                  echo "<label><b class='col'>Father Name :</b><i class='fas fa-pencil-alt ml-2'data-toggle='modal' data-target='#father_name_field'  onclick='return fetch_data_adm_process($val->admission_id)'></i></label>";
                              }
                              else
                              {
                                  echo "<label><b>Father Name :</b></label>";
                                 
                              }
                            ?>
                            <span>
                              <?php 
                              if($val->father_name=="")
                                {
                                      $cnt++;
                                      echo "-";
                                }
                                else
                                {
                                   echo $val->father_name;
                                }
                              ?>
                            </span>
                          </div>
                          <div class="col-sm-3">
                             <?php 
                              if($val->father_email=="")
                                {
                                    echo "<label><b class='col'>Father Email :</b><i class='fas fa-pencil-alt ml-2'data-toggle='modal' data-target='#father_email_field'  onclick='return fetch_data_adm_process($val->admission_id)'></i></label>";
                                }
                                else
                                {
                                    echo "<label><b>Father Email :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->father_email=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                     echo $val->father_email;
                                  }
                                ?>
                              </span>
                          </div>
                          <div class="col-sm-2">
                             <?php 
                              if($val->father_mobile_no=="")
                                {
                                    echo "<label><b class='col'>Father MobileNo :</b><i class='fas fa-pencil-alt ml-2'data-toggle='modal' data-target='#father_mobileNo_field'  onclick='return fetch_data_adm_process($val->admission_id)'></i></label>";
                                }
                                else
                                {
                                    echo "<label><b>Father MobileNo :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->father_mobile_no=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                     echo $val->father_mobile_no;
                                  }
                                ?>
                              </span>
                          </div>
                          <div class="col-sm-2">
                             <?php 
                              if($val->father_occupation=="")
                                {
                                    echo "<label><b class='col'>Father Occupation :</b><i class='fas fa-pencil-alt ml-2'data-toggle='modal' data-target='#fatheroccupation_field'  onclick='return fetch_data_adm_process($val->admission_id)'></i></label>";
                                }
                                else
                                {
                                    echo "<label><b>Father Occupation :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->father_occupation=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                     echo $val->father_occupation;
                                  }
                                ?>
                              </span>
                          </div>
                          <div class="col-sm-2">
                             <?php 
                              if($val->father_income=="")
                                {
                                    echo "<label><b class='col'>Father Income :</b><i class='fas fa-pencil-alt ml-2'data-toggle='modal' data-target='#fatherincome_field'  onclick='return fetch_data_adm_process($val->admission_id)'></i></label>";
                                }
                                else
                                {
                                    echo "<label><b>Father Income :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->father_income=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                     echo $val->father_income;
                                  }
                                ?>
                              </span>
                          </div>
                          <div class="col-sm-2">
                             <?php 
                              if($val->mother_name=="")
                                {
                                    echo "<label><b class='col'>Mother Name :</b><i class='fas fa-pencil-alt ml-2'data-toggle='modal' data-target='#mothername_field'  onclick='return fetch_data_adm_process($val->admission_id)'></i></label>";
                                }
                                else
                                {
                                    echo "<label><b>Mother Name :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->mother_name=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                     echo $val->mother_name;
                                  }
                                ?>
                              </span>
                          </div>
                          <div class="col-sm-3">
                            <?php 
                              if($val->mother_email=="")
                              {
                                  echo "<label><b class='col'>Mother Email :</b><i class='fas fa-pencil-alt ml-2'data-toggle='modal' data-target='#motheremail_field'  onclick='return fetch_data_adm_process($val->admission_id)'></i></label>";
                              }
                              else
                              {
                                  echo "<label><b>Mother Email :</b></label>";
                                 
                              }
                            ?>
                            <span>
                              <?php 
                                if($val->mother_email=="")
                                {
                                      $cnt++;
                                      echo "-";
                                }
                                else
                                {
                                   echo $val->mother_email;
                                }
                              ?>
                            </span>
                          </div>
                          <div class="col-sm-2">
                            <?php 
                              if($val->mother_mobile_no=="")
                              {
                                  echo "<label><b class='col'>Mother MobileNo :</b><i class='fas fa-pencil-alt ml-2'data-toggle='modal' data-target='#mothermobileno_field'  onclick='return fetch_data_adm_process($val->admission_id)'></i></label>";
                              }
                              else
                              {
                                  echo "<label><b>Mother MobileNo :</b></label>";                         
                              }
                            ?>
                            <span>
                              <?php 
                                if($val->mother_mobile_no=="")
                                {
                                    $cnt++;
                                    echo "-";
                                }
                                else
                                {
                                 echo $val->mother_mobile_no;
                                }
                              ?>
                            </span>
                          </div>
                          <div class="col-sm-2">
                             <?php 
                              if($val->mother_occupation=="")
                                {
                                    echo "<label><b class='col'>Mother Occupation :</b><i class='fas fa-pencil-alt ml-2'data-toggle='modal' data-target='#motheroccupation_field'  onclick='return fetch_data_adm_process($val->admission_id)'></i></label>";
                                }
                                else
                                {
                                    echo "<label><b>Mother Occupation :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->mother_occupation=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                     echo $val->mother_occupation;
                                  }
                                ?>
                              </span>
                          </div>
                          <div class="col-sm-2">
                             <?php 
                              if($val->mother_income=="")
                                {
                                    echo "<label><b class='col'>Mother Income :</b><i class='fas fa-pencil-alt ml-2'data-toggle='modal' data-target='#motherincome_field'  onclick='return fetch_data_adm_process($val->admission_id)'></i></label>";
                                }
                                else
                                {
                                    echo "<label><b>Mother Income :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->mother_income=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                     echo $val->mother_income;
                                  }
                                ?>
                              </span>
                          </div>
                        </div>
                        <span class="detail-heading">Education & Profession</span>
                        <div class="form-row">
                          <div class="col-sm-2">
                            <?php 
                              if($val->school_collage_type=="")
                              {
                                  echo "<label><b class='col'>School/collage Type :</b><i class='fas fa-pencil-alt ml-2'data-toggle='modal' data-target='#sch_clg_field'  onclick='return fetch_data_adm_process($val->admission_id)'></i></label>";
                              }
                              else
                              {
                                  echo "<label><b>School/collage Type :</b></label>";                                   
                              }
                            ?>
                            <span>
                              <?php 
                              if($val->school_collage_type=="")
                                {
                                      $cnt++;
                                      echo "-";
                                }
                                else
                                {
                                   echo $val->school_collage_type;
                                }
                              ?>
                            </span>
                          </div> 
                          <div class="col-sm-3">
                             <?php 
                              if($val->school_collage_name=="")
                                {
                                    echo "<label><b class='col'>School/collage :</b><i class='fas fa-pencil-alt ml-2'data-toggle='modal' data-target='#sch_clg_name_field'  onclick='return fetch_data_adm_process($val->admission_id)'></i></label>";
                                }
                                else
                                {
                                    echo "<label><b>School/collage :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->school_collage_name=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                     echo $val->school_collage_name;
                                  }
                                ?>
                              </span>
                          </div>
                          <div class="col-sm-2">
                             <?php 
                              if($val->country_id=="")
                                {
                                    echo "<label><b class='col'>Country :</b><i class='fas fa-pencil-alt ml-2'data-toggle='modal' data-target='#country_id_field'  onclick='return fetch_data_adm_process($val->admission_id)'></i></label>";
                                }
                                else
                                {
                                    echo "<label><b>Country :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->country_id=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                     echo $val->country_id;
                                  }
                                ?>
                              </span>
                          </div>
                          <div class="col-sm-2">
                             <?php 
                              if($val->school_clg_state=="")
                                {
                                    echo "<label><b class='col'>School/Clg State :</b><i class='fas fa-pencil-alt ml-2'data-toggle='modal' data-target='#sch_clg_state_field'  onclick='return fetch_data_adm_process($val->admission_id)'></i></label>";
                                }
                                else
                                {
                                    echo "<label><b>School/Clg State :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->school_clg_state=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                     echo $val->school_clg_state;
                                  }
                                ?>
                              </span>
                          </div>
                          <div class="col-sm-2">
                             <?php 
                              if($val->school_clg_city=="")
                                {
                                    echo "<label><b class='col'>School/Clg City :</b><i class='fas fa-pencil-alt ml-2'data-toggle='modal' data-target='#sch_clg_city_field'  onclick='return fetch_data_adm_process($val->admission_id)'></i></label>";
                                }
                                else
                                {
                                    echo "<label><b>School/Clg City :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->school_clg_city=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                     echo $val->school_clg_city;
                                  }
                                ?>
                              </span>
                          </div>
                          <div class="col-sm-2">
                             <?php 
                              if($val->school_clg_area=="")
                                {
                                    echo "<label><b class='col'>School/Clg Area :</b><i class='fas fa-pencil-alt ml-2'data-toggle='modal' data-target='#sch_clg_area_field'  onclick='return fetch_data_adm_process($val->admission_id)'></i></label>";
                                }
                                else
                                {
                                    echo "<label><b>School/Clg Area :</b></label>";
                                   
                                }
                              ?>
                              <span>
                                <?php 
                                if($val->school_clg_area=="")
                                  {
                                        $cnt++;
                                        echo "-";
                                  }
                                  else
                                  {
                                    foreach($list_area as $ld) 
                                    { 
                                      if($val->school_clg_area==$ld->area_id)
                                      { 
                                        echo $ld->area_name; 
                                      }
                                    }
                                  }
                                ?>
                              </span>
                          </div>
                        </div>
                      </div>
                      </div>
                      <div class="col-sm-3 ml-auto d-flex align-items-center justify-content-end">
                        <label>
                          <b>Blank Field COUNT : </b>
                        </label>
                        <span class="btn-sm text-black pos ml-2"><?php  echo $cnt; ?></span>
                      </div>
                    </div>
                  </div>
                </div>
             
              <?php } ?>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  
<!--   <div class="new_lead_genered_btn">
    <a href="javascript:void(0)" class="create_new_lead"><i class="fas fa-plus"></i></a>
  </div> -->
</main>


<div class="right_side d-inline-block">
  <section class="right_side_header d-inline-block w-100 position-relative">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          <div class="modal-header px-0">
            <h5 class="modal-title">Add New Lead</h5>
            <button type="button" class="close close_side_bar">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="fill_new_leade_info_body" id="create_leade">
            <div class="right_side_row_panel">
              <a href="#candidate_details" data-toggle="collapse" class="collapsed"><i class="fas fa-chevron-down"></i> Lead Details</a>
              <div class="right_side_row_panel_block collapse show" id="candidate_details" data-parent="#create_leade">
                <div class="new_lead_info_fill">
                  <h6 class="lead_fill_title">Step 1 - Enter Prospect details (Either Email or Mobile is mandatory.).*</h6> 
                  <div class="form-group">
                    <label>Full Name*</label>
                    <input type="text" maxlength="50" class="form-control" id="firstName" placeholder="Full Name" value="">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" maxlength="100" class="form-control" id="email" placeholder="Email" data-api-attached="true" value="">
                  </div>
                  <div class="form-group">
                    <label>Mobile</label>
                    <input type="tel" maxlength="13" class="form-control" min="0" id="mobile" placeholder="Mobile" data-api-attached="true" value="">
                  </div>
                </div>
                <div class="new_lead_info_fill">
                  <h6 class="lead_fill_title">Step 2 - Select appropriate values to add basic Lead details.*</h6> 
                  <div class="form-group">
                    <label>Campaign Name</label>
                    <input type="text" maxlength="100" class="form-control" id="leadName" placeholder="Campaign Name" value="Manually Added" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label>Channel</label>
                    <select class="form-control">
                      <option>Select Channel</option>
                      <option>1</option>
                      <option>1</option>
                      <option>1</option>
                      <option>1</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Source</label>
                    <input type="tel" maxlength="13" class="form-control" min="0" id="mobile" placeholder="Mobile" data-api-attached="true" value="">
                  </div>
                </div>
                <div class="new_lead_info_fill">
                  <h6 class="lead_fill_title">Step 2 - Select appropriate values to add basic Lead details.*</h6> 
                  <div class="form-group">
                    <label>Campaign Name</label>
                    <input type="text" maxlength="100" class="form-control" id="leadName" placeholder="Campaign Name" value="Manually Added" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label>Channel</label>
                    <select class="form-control">
                      <option>Select Channel</option>
                      <option>1</option>
                      <option>1</option>
                      <option>1</option>
                      <option>1</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Source</label>
                    <input type="tel" maxlength="13" class="form-control" min="0" id="mobile" placeholder="Mobile" data-api-attached="true" value="">
                  </div>
                </div>
              </div>
            </div>
            <div class="right_side_row_panel">
              <a href="#lead_deducational_detailsetails" data-toggle="collapse" class="collapsed"><i class="fas fa-chevron-down"></i> Lead Details</a>
              <div class="right_side_row_panel_block collapse" id="lead_deducational_detailsetails" data-parent="#create_leade">
                <div class="new_lead_info_fill">
                  <h6 class="lead_fill_title">Step 1 - Enter Prospect details (Either Email or Mobile is mandatory.).*</h6> 
                  <div class="form-group">
                    <label>Full Name*</label>
                    <input type="text" maxlength="50" class="form-control" id="firstName" placeholder="Full Name" value="">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" maxlength="100" class="form-control" id="email" placeholder="Email" data-api-attached="true" value="">
                  </div>
                  <div class="form-group">
                    <label>Mobile</label>
                    <input type="tel" maxlength="13" class="form-control" min="0" id="mobile" placeholder="Mobile" data-api-attached="true" value="">
                  </div>
                </div>
                <div class="new_lead_info_fill">
                  <h6 class="lead_fill_title">Step 2 - Select appropriate values to add basic Lead details.*</h6> 
                  <div class="form-group">
                    <label>Campaign Name</label>
                    <input type="text" maxlength="100" class="form-control" id="leadName" placeholder="Campaign Name" value="Manually Added" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label>Channel</label>
                    <select class="form-control">
                      <option>Select Channel</option>
                      <option>1</option>
                      <option>1</option>
                      <option>1</option>
                      <option>1</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Source</label>
                    <input type="tel" maxlength="13" class="form-control" min="0" id="mobile" placeholder="Mobile" data-api-attached="true" value="">
                  </div>
                </div>
                <div class="new_lead_info_fill">
                  <h6 class="lead_fill_title">Step 2 - Select appropriate values to add basic Lead details.*</h6> 
                  <div class="form-group">
                    <label>Campaign Name</label>
                    <input type="text" maxlength="100" class="form-control" id="leadName" placeholder="Campaign Name" value="Manually Added" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label>Channel</label>
                    <select class="form-control">
                      <option>Select Channel</option>
                      <option>1</option>
                      <option>1</option>
                      <option>1</option>
                      <option>1</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Source</label>
                    <input type="tel" maxlength="13" class="form-control" min="0" id="mobile" placeholder="Mobile" data-api-attached="true" value="">
                  </div>
                </div>
              </div>
            </div>
            <div class="right_side_row_panel">
              <a href="#lead_details" data-toggle="collapse" class="collapsed"><i class="fas fa-chevron-down"></i> Lead Details</a>
              <div class="right_side_row_panel_block collapse" id="lead_details" data-parent="#create_leade">
                <div class="new_lead_info_fill">
                  <h6 class="lead_fill_title">Step 1 - Enter Prospect details (Either Email or Mobile is mandatory.).*</h6> 
                  <div class="form-group">
                    <label>Full Name*</label>
                    <input type="text" maxlength="50" class="form-control" id="firstName" placeholder="Full Name" value="">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" maxlength="100" class="form-control" id="email" placeholder="Email" data-api-attached="true" value="">
                  </div>
                  <div class="form-group">
                    <label>Mobile</label>
                    <input type="tel" maxlength="13" class="form-control" min="0" id="mobile" placeholder="Mobile" data-api-attached="true" value="">
                  </div>
                </div>
                <div class="new_lead_info_fill">
                  <h6 class="lead_fill_title">Step 2 - Select appropriate values to add basic Lead details.*</h6> 
                  <div class="form-group">
                    <label>Campaign Name</label>
                    <input type="text" maxlength="100" class="form-control" id="leadName" placeholder="Campaign Name" value="Manually Added" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label>Channel</label>
                    <select class="form-control">
                      <option>Select Channel</option>
                      <option>1</option>
                      <option>1</option>
                      <option>1</option>
                      <option>1</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Source</label>
                    <input type="tel" maxlength="13" class="form-control" min="0" id="mobile" placeholder="Mobile" data-api-attached="true" value="">
                  </div>
                </div>
                <div class="new_lead_info_fill">
                  <h6 class="lead_fill_title">Step 2 - Select appropriate values to add basic Lead details.*</h6> 
                  <div class="form-group">
                    <label>Campaign Name</label>
                    <input type="text" maxlength="100" class="form-control" id="leadName" placeholder="Campaign Name" value="Manually Added" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label>Channel</label>
                    <select class="form-control">
                      <option>Select Channel</option>
                      <option>1</option>
                      <option>1</option>
                      <option>1</option>
                      <option>1</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Source</label>
                    <input type="tel" maxlength="13" class="form-control" min="0" id="mobile" placeholder="Mobile" data-api-attached="true" value="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="lead_save_btn">
            <div class="btn-group w-100">
              <button type="button" class="btn btn-danger">CANCEL</button>
              <button type="button" class="btn btn-success">ADD LEAD</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="click_to_call_leade">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Call lead</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Do you want to make a call to Savaliya toral abhishekkimar's number?</h3>
      </div>
      <div class="modal-footer">
                <button type="button" class="btn btn-primary">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
    </div>
  </div>
</div>
<div class="modal fade" id="download_all_leads">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Download All Leads</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Do you want to download filtered data?</h3>
      </div>
      <div class="modal-footer">
                <button type="button" class="btn btn-primary">Download Leads</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
    </div>
  </div>
</div>
<div class="modal fade" id="sms_email_all">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Send email to All</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Do you want to send Email to 659 Leads?</h3>
      </div>
      <div class="modal-footer">
                <button type="button" class="btn btn-primary">Send email</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
    </div>
  </div>
</div>
<div class="modal fade" id="sms_send_all">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Send sms to All</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Do you want to send SMS to 659 Leads?</h3>
      </div>
      <div class="modal-footer">
                <button type="button" class="btn btn-primary">Send Sms </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
    </div>
  </div>
</div>
<div class="modal fade" id="refer_leads">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Refer Leads</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Do you want to Refer 659 Leads?</h3>
      </div>
      <div class="modal-footer">
                <button type="button" class="btn btn-primary">Refer Leads</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
    </div>
  </div>
</div>
<div class="modal fade" id="add_camping">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Campaign</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Do you want to add campaign?</h3>
      </div>
      <div class="modal-footer">
                <button type="button" class="btn btn-primary">Add Camping</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
    </div>
  </div>
</div>
<div class="modal fade" id="leed_add_modal">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Quick Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xl-6 col-lg-6">
            <div class="form-group">
                <div><span><label for="FirstName">Full Name<i class="required">*</i></label><input type="text" maxlength="50" class="form-control" id="firstName" placeholder="Full Name" value=""></span></div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6">
            <div class="form-group">
              <label>Email</label>
              <input type="text" maxlength="100" class="form-control" id="email" placeholder="Email" data-api-attached="true" value="">
            </div>
          </div>
          <div class="col-xl-6 col-lg-6">
            <div class="form-group">
              <label>Mobile*</label>
              <input type="tel" maxlength="13" min="0" class="form-control" id="mobile" placeholder="Mobile" data-api-attached="true" value="">
            </div>
          </div>
          <div class="col-xl-6 col-lg-6">
            <div class="form-group">
              <label>Source*</label>
              <select class="form-control">
                <option>Select Source</option>
                <option>CLASSBOAT</option>
                <option>CLASSBOAT</option>
                <option>CLASSBOAT</option>
                <option>CLASSBOAT</option>
                <option>CLASSBOAT</option>
                <option>CLASSBOAT</option>
              </select>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6">
            <div class="form-group">
              <label>Branch*</label>
              <select class="form-control">
                <option>Select Branch</option>
                <option>Rw1</option>
                <option>Rw1 A</option>
                <option>Rw2</option>
                <option>Rw3</option>
                <option>Rw4</option>
              </select>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6">
            <div class="form-group">
              <label>Category*</label>
              <select class="form-control">
                <option>Select Category</option>
                <option>DESIGNING</option>
                <option>DESIGNING</option>
                <option>DESIGNING</option>
                <option>DESIGNING</option>
                <option>DESIGNING</option>
              </select>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6">
            <div class="form-group">
              <label>Course*</label>
              <select class="form-control">
                <option>Select Course</option>
                <option>Advance Diploma In Fashion</option>
                <option>Advance Diploma In Fashion</option>
                <option>Advance Diploma In Fashion</option>
                <option>Advance Diploma In Fashion</option>
              </select>
            </div>
          </div>
          <div class="col-xl-12">
            <div class="form-group">
              <label>Remarks</label>
              <textarea class="form-control" rows="3" placeholder="Remarks"></textarea>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
              <label class="form-check-label" for="inlineCheckbox1">Send Welcome Email</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
              <label class="form-check-label" for="inlineCheckbox2">Send Welcome Sms</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
                <button type="button" class="btn btn-primary">SAVE & ADD MORE</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->

<!-- Modal-edit-grid -->
<div class="modal fade" id="edit_fields" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-edit-state -->
<div class="modal fade" id="state_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">State</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
   <input type="hidden" name="" class="form-control" id="adm_ids">
    <div class="form-group"> 
      <label for="exampleFormControlSelect1">State</label>
      <select class="form-control" id="state_name" name="state_name">
        <option value="">Select State</option>
       <?php foreach($list_state as $val) { ?>
        <option <?php  if($val->state_name=="Gujarat") { echo "selected"; } ?> value="<?php echo $val->state_name; ?>"><?php echo $val->state_name; ?></option>
      <?php } ?>
      </select>
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary" id="adm_state_upd">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-edit-city -->
<div class="modal fade" id="city_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">City</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
   <input type="hidden" name="" class="form-control" id="adm_ids">
    <div class="form-group"> 
      <label for="exampleFormControlSelect1">City</label>
      <select class="form-control" id="city_name" name="city_name">
        <option value="">Select City</option>
      <?php foreach($list_city as $val) { ?>
      <option <?php  if($val->city_name=="Surat") { echo "selected"; } ?> value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>
      <?php }  ?>
      </select>
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary" id="adm_city_upd">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-edit-Area -->
<div class="modal fade" id="area_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Area</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
   <input type="hidden" name="" class="form-control" id="adm_ids">
    <div class="form-group"> 
      <label for="exampleFormControlSelect1">Area</label>
      <select class="form-control" id="area_name" name="area_name">
        <option value="">Select Area</option>
       <?php foreach($list_area as $ld) { ?>
          <option  value="<?php echo $ld->area_id; ?>"><?php echo $ld->area_name; ?></option>
        <?php } ?>
      </select>
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary" id="adm_area_upd">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-edit-Pincode -->
<div class="modal fade" id="pincode_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pin-Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
   <input type="hidden" name="" class="form-control" id="adm_ids">
    <div class="form-group"> 
      <label for="exampleFormControlSelect1">Pin Code</label>
      <input type="text" name="pin_code" id="pin_code" class="form-control" placeholder="Enter Your PinCode">
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary" id="adm_pin_upd">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-edit-presentaddress_field -->
<div class="modal fade" id="presentaddress_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Present Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
   <input type="hidden" name="" class="form-control" id="adm_ids">
    <div class="form-group"> 
      <label for="exampleFormControlSelect1">Present Address</label>
      <textarea class="form-control" rows="3" name="present_address" id="present_address"></textarea>
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary" id="adm_present_adress_upd">Update</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal-edit-father_name -->
<div class="modal fade" id="father_name_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Father Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
   <input type="hidden" name="" class="form-control" id="adm_ids">
    <div class="form-group"> 
      <label for="exampleFormControlSelect1">Father Name</label>
      <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Enter Your Father Name">
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary" id="adm_father_name_upd">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-edit-father_email -->
<div class="modal fade" id="father_email_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Father Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
   <input type="hidden" name="" class="form-control" id="adm_ids">
    <div class="form-group"> 
      <label for="exampleFormControlSelect1">Father Email</label>
      <input type="text" class="form-control" name="father_email" id="father_email" placeholder="ex@gmail.com">
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary" id="adm_father_email_upd">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-edit-father_mobileNO -->
<div class="modal fade" id="father_mobileNo_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Father MobileNo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
   <input type="hidden" name="" class="form-control" id="adm_ids">
    <div class="form-group"> 
      <label for="exampleFormControlSelect1">Father MobileNo</label>
      <input type="text" class="form-control" name="fathermobile_no" id="fathermobile_no" placeholder="+91-00000-00000">
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary" id="adm_father_mobileNo_upd">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-edit-father_mobileNO -->
<div class="modal fade" id="fatheroccupation_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Father  Occupation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
   <input type="hidden" name="" class="form-control" id="adm_ids">
    <div class="form-group"> 
      <label for="exampleFormControlSelect1">Father  Occupation</label>
      <input type="text" class="form-control" name="fatheroccupation" id="fatheroccupation" placeholder="Occupation">
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary" id="adm_fatheroccupation_upd">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-edit-father_income -->
<div class="modal fade" id="fatherincome_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Father  Income</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
   <input type="hidden" name="" class="form-control" id="adm_ids">
    <div class="form-group"> 
      <label for="exampleFormControlSelect1">Father  Income</label>
      <input type="text" class="form-control" name="fatherincome" id="fatherincome" placeholder="0000000">
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary" id="adm_fatherincome_upd">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-edit-mother_name -->
<div class="modal fade" id="mothername_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mother Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
   <input type="hidden" name="" class="form-control" id="adm_ids">
    <div class="form-group"> 
      <label for="exampleFormControlSelect1">Mother Name</label>
      <input type="text" class="form-control" name="mothername" id="mothername" placeholder="Mother Name">
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary" id="adm_mother_name_upd">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-edit-mother_email -->
<div class="modal fade" id="motheremail_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mother Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
   <input type="hidden" name="" class="form-control" id="adm_ids">
    <div class="form-group"> 
      <label for="exampleFormControlSelect1">Mother Email</label>
      <input type="text" class="form-control" name="motheremail" id="motheremail" placeholder="ex@gmail.com">
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary" id="adm_mother_email_upd">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-edit-mother_mobileno -->
<div class="modal fade" id="mothermobileno_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mother mobileNo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
   <input type="hidden" name="" class="form-control" id="adm_ids">
    <div class="form-group"> 
      <label for="exampleFormControlSelect1">Mother MobileNo</label>
      <input type="text" class="form-control" name="mothermobileno" id="mothermobileno" placeholder="+91-00000-00000">
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary" id="adm_mother_mobileno_upd">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-edit-mother_occupation -->
<div class="modal fade" id="motheroccupation_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mother Occupation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
   <input type="hidden" name="" class="form-control" id="adm_ids">
    <div class="form-group"> 
      <label for="exampleFormControlSelect1">Mother Occupation</label>
      <input type="text" class="form-control" name="motheroccupation" id="motheroccupation" placeholder="Occupation">
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary" id="adm_mother_occupation_upd">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-edit-mother_income -->
<div class="modal fade" id="motherincome_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mother Income</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
   <input type="hidden" name="" class="form-control" id="adm_ids">
    <div class="form-group"> 
      <label for="exampleFormControlSelect1">Mother Income</label>
      <input type="text" class="form-control" name="motherincome" id="motherincome" placeholder="00000">
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary" id="adm_mother_income_upd">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-edit-shcool/collage type -->
<div class="modal fade" id="sch_clg_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">School & Collage Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
   <input type="hidden" name="" class="form-control" id="adm_ids">
    <div class="form-group"> 
      <label for="exampleFormControlSelect1">School/Collage Type</label>
      <input type="text" class="form-control" name="school_clg_type" id="school_clg_type" placeholder="Enter School & Collage Name">
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary" id="adm_sch_clg_upd">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-edit-shcool/collage name -->
<div class="modal fade" id="sch_clg_name_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">School & Collage Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
   <input type="hidden" name="" class="form-control" id="adm_ids">
    <div class="form-group"> 
      <label for="exampleFormControlSelect1">School/Collage Name</label>
      <input type="text" class="form-control" name="school_clg_name" id="school_clg_name" placeholder="Enter School & Collage Name">
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary" id="adm_sch_clg_name_upd">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-edit-Country -->
<div class="modal fade" id="country_id_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Country</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
   <input type="hidden" name="" class="form-control" id="adm_ids">
    <div class="form-group"> 
      <label for="exampleFormControlSelect1">Country</label>
      <select class="form-control" id="country_name" name="country_name">
        <option value="">Select Country</option>
        <?php foreach($list_country as $val) { ?>
        <option <?php  if($val->country_name=="India") { echo "selected"; } ?> value="<?php echo $val->country_name; ?>"><?php echo $val->country_name; ?></option>
      <?php } ?>
      </select>
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary" id="adm_country_name_upd">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-edit-sch_clg_state -->
<div class="modal fade" id="sch_clg_state_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">State</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
   <input type="hidden" name="" class="form-control" id="adm_ids">
    <div class="form-group"> 
      <label for="exampleFormControlSelect1">State</label>
      <select class="form-control" id="sch_clg_statename" name="sch_clg_statename">
        <option value="">Select State</option>
       <?php foreach($list_state as $val) { ?>
        <option <?php  if($val->state_name=="Gujarat") { echo "selected"; } ?> value="<?php echo $val->state_name; ?>"><?php echo $val->state_name; ?></option>
      <?php } ?>
      </select>
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary" id="adm_sch_clg_state_upd">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-edit-sch_clg_city -->
<div class="modal fade" id="sch_clg_city_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">City</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
   <input type="hidden" name="" class="form-control" id="adm_ids">
    <div class="form-group"> 
      <label for="exampleFormControlSelect1">City</label>
      <select class="form-control" id="sch_clg_cityname" name="sch_clg_cityname">
        <option value="">Select City</option>
      <?php foreach($list_city as $val) { ?>
      <option <?php  if($val->city_name=="Surat") { echo "selected"; } ?> value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>
      <?php }  ?>
      </select>
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary" id="adm_sch_clg_city_upd">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-edit-Area -->
<div class="modal fade" id="sch_clg_area_field" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Area</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
   <input type="hidden" name="" class="form-control" id="adm_ids">
    <div class="form-group"> 
      <label for="exampleFormControlSelect1">Area</label>
      <select class="form-control" id="sch_clg_areaname" name="sch_clg_areaname">
        <option value="">Select Area</option>
       <?php foreach($list_area as $ld) { ?>
          <option  value="<?php echo $ld->area_id; ?>"><?php echo $ld->area_name; ?></option>
        <?php } ?>
      </select>
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn-sm btn-primary" id="adm_sch_clg_area_upd">Update</button>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js "></script>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
 <script src="https://cdn.tiny.cloud/1/n9ury2u6quy5yo8n0ij8xeo7agd9310wz8eb6t2ms04chtsd/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

  <script type="text/javascript">

 function fetch_data_adm_process(admission_id=''){

    $.ajax({
      url : "<?php echo base_url(); ?>AddmissionController/fetch_data_admission_process",
      type:"post",
      data:{
        'admission_id':admission_id 
      },
      success:function(res){
        
        var data = $.parseJSON(res);  
    if(data.record==null){
     
     $('#adm_ids').val('');
    }else {
    
  
    if(data.record['admission_id']!=''){
       $('#adm_ids').val(data.record['admission_id']);
       }else{
       $('#adm_ids').val('');
       }
      
        //$('#adm_ids').val(data.record['admission_id']);
       }

      }
    });
  }

</script>

<script type="text/javascript">
      $('#adm_state_upd').on('click',function(){
            var admission_id = $('#adm_ids').val();
            var state_id = $('#state_name').val();
          
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_adm_state",
                dataType : "JSON",
                data : {'admission_id' : admission_id ,  'state_id' : state_id  },
                success: function(data){
                
                  alert('Are You Sure This Field Updated');
                  setTimeout(function() {
                location.reload();
            },500);
                }
            });
            return false;
        });
    </script>

    <script type="text/javascript">
      $('#adm_city_upd').on('click',function(){
            var admission_id = $('#adm_ids').val();
            var city_id = $('#city_name').val();
          
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_adm_city",
                dataType : "JSON",
                data : {'admission_id' : admission_id ,  'city_id' : city_id  },
                success: function(data){
                
                  alert('Are You Sure This Field Updated');
                  setTimeout(function() {
                location.reload();
            },500);
                }
            });
            return false;
        });
    </script>

    <script type="text/javascript">
      $('#adm_area_upd').on('click',function(){
            var admission_id = $('#adm_ids').val();
            var area_id = $('#area_name').val();
          
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_adm_area",
                dataType : "JSON",
                data : {'admission_id' : admission_id ,  'area_id' : area_id  },
                success: function(data){
                
                  alert('Are You Sure This Field Updated');
                  setTimeout(function() {
                location.reload();
            },500);
                }
            });
            return false;
        });
    </script>

     <script type="text/javascript">
      $('#adm_pin_upd').on('click',function(){
            var admission_id = $('#adm_ids').val();
            var pin_code = $('#pin_code').val();
          
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_adm_pin",
                dataType : "JSON",
                data : {'admission_id' : admission_id ,  'pin_code' : pin_code  },
                success: function(data){
                
                  alert('Are You Sure This Field Updated');
                  setTimeout(function() {
                location.reload();
            },500);
                }
            });
            return false;
        });
    </script>

    <script type="text/javascript">
      $('#adm_present_adress_upd').on('click',function(){
            var admission_id = $('#adm_ids').val();
            var present_address = $('#present_address').val();
          
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_adm_presentaddress",
                dataType : "JSON",
                data : {'admission_id' : admission_id ,  'present_address' : present_address  },
                success: function(data){
                
                  alert('Are You Sure This Field Updated');
                  setTimeout(function() {
                location.reload();
            },500);
                }
            });
            return false;
        });
    </script>

    <script type="text/javascript">
      $('#adm_father_name_upd').on('click',function(){
            var admission_id = $('#adm_ids').val();
            var father_name = $('#father_name').val();
          
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_adm_fathername",
                dataType : "JSON",
                data : {'admission_id' : admission_id ,  'father_name' : father_name  },
                success: function(data){
                
                  alert('Are You Sure This Field Updated');
                  setTimeout(function() {
                location.reload();
            },500);
                }
            });
            return false;
        });
    </script>


    <script type="text/javascript">
      $('#adm_father_email_upd').on('click',function(){
            var admission_id = $('#adm_ids').val();
            var father_email = $('#father_email').val();
          
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_adm_fatheremail",
                dataType : "JSON",
                data : {'admission_id' : admission_id ,  'father_email' : father_email  },
                success: function(data){
                
                  alert('Are You Sure This Field Updated');
                  setTimeout(function() {
                location.reload();
            },500);
                }
            });
            return false;
        });
    </script>

    <script type="text/javascript">
      $('#adm_father_mobileNo_upd').on('click',function(){
            var admission_id = $('#adm_ids').val();
            var father_mobile_no = $('#fathermobile_no').val();
          
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_adm_fathermobileno",
                dataType : "JSON",
                data : {'admission_id' : admission_id ,  'father_mobile_no' : father_mobile_no  },
                success: function(data){ 
                
                  alert('Are You Sure This Field Updated');
                  setTimeout(function() {
                location.reload();
            },500);
                }
            });
            return false;
        });
    </script>

     <script type="text/javascript">
      $('#adm_fatheroccupation_upd').on('click',function(){
            var admission_id = $('#adm_ids').val();
            var father_occupation = $('#fatheroccupation').val();
          
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_adm_fatheroccupation",
                dataType : "JSON",
                data : {'admission_id' : admission_id ,  'father_occupation' : father_occupation  },
                success: function(data){ 
                
                  alert('Are You Sure This Field Updated');
                  setTimeout(function() {
                location.reload();
            },500);
                }
            });
            return false;
        });
    </script>

    <script type="text/javascript">
      $('#adm_fatherincome_upd').on('click',function(){
            var admission_id = $('#adm_ids').val();
            var father_income = $('#fatherincome').val();
          
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_adm_fatherincome",
                dataType : "JSON",
                data : {'admission_id' : admission_id ,  'father_income' : father_income  },
                success: function(data){ 
                
                  alert('Are You Sure This Field Updated');
                  setTimeout(function() {
                location.reload();
            },500);
                }
            });
            return false;
        });
    </script>

     <script type="text/javascript">
      $('#adm_mother_name_upd').on('click',function(){
            var admission_id = $('#adm_ids').val();
            var mother_name = $('#mothername').val();
          
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_adm_mothername",
                dataType : "JSON",
                data : {'admission_id' : admission_id ,  'mother_name' : mother_name  },
                success: function(data){ 
                
                  alert('Are You Sure This Field Updated');
                  setTimeout(function() {
                location.reload();
            },500);
                }
            });
            return false;
        });
    </script>

    <script type="text/javascript">
      $('#adm_mother_email_upd').on('click',function(){
            var admission_id = $('#adm_ids').val();
            var mother_email = $('#motheremail').val();
          
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_adm_motheremail",
                dataType : "JSON",
                data : {'admission_id' : admission_id ,  'mother_email' : mother_email  },
                success: function(data){ 
                
                  alert('Are You Sure This Field Updated');
                  setTimeout(function() {
                location.reload();
            },500);
                }
            });
            return false;
        });
    </script>

    <script type="text/javascript">
      $('#adm_mother_mobileno_upd').on('click',function(){
            var admission_id = $('#adm_ids').val();
            var mother_mobile_no = $('#mothermobileno').val();
          
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_adm_mothermobileno",
                dataType : "JSON",
                data : {'admission_id' : admission_id ,  'mother_mobile_no' : mother_mobile_no  },
                success: function(data){ 
                
                  alert('Are You Sure This Field Updated');
                  setTimeout(function() {
                location.reload();
            },500);
                }
            });
            return false;
        });
    </script>


     <script type="text/javascript">
      $('#adm_mother_occupation_upd').on('click',function(){
            var admission_id = $('#adm_ids').val();
            var mother_occupation = $('#motheroccupation').val();
          
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_adm_motheroccupation",
                dataType : "JSON",
                data : {'admission_id' : admission_id ,  'mother_occupation' : mother_occupation  },
                success: function(data){ 
                
                  alert('Are You Sure This Field Updated');
                  setTimeout(function() {
                location.reload();
            },500);
                }
            });
            return false;
        });
    </script>

    <script type="text/javascript">
      $('#adm_mother_income_upd').on('click',function(){
            var admission_id = $('#adm_ids').val();
            var mother_income = $('#motherincome').val();
          
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_adm_motherincome",
                dataType : "JSON",
                data : {'admission_id' : admission_id ,  'mother_income' : mother_income  },
                success: function(data){ 
                
                  alert('Are You Sure This Field Updated');
                  setTimeout(function() {
                location.reload();
            },500);
                }
            });
            return false;
        });
    </script>

     <script type="text/javascript">
      $('#adm_sch_clg_upd').on('click',function(){
            var admission_id = $('#adm_ids').val();
            var school_collage_type = $('#school_clg_type').val();
          
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_adm_school_college_type",
                dataType : "JSON",
                data : {'admission_id' : admission_id ,  'school_collage_type' : school_collage_type  },
                success: function(data){ 
                
                  alert('Are You Sure This Field Updated');
                  setTimeout(function() {
                location.reload();
            },500);
                }
            });
            return false;
        });
    </script>

     <script type="text/javascript">
      $('#adm_sch_clg_name_upd').on('click',function(){
            var admission_id = $('#adm_ids').val();
            var school_collage_name = $('#school_clg_name').val();
          
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_adm_school_college_name",
                dataType : "JSON",
                data : {'admission_id' : admission_id ,  'school_collage_name' : school_collage_name  },
                success: function(data){ 
                
                  alert('Are You Sure This Field Updated');
                  setTimeout(function() {
                location.reload();
            },500);
                }
            });
            return false;
        });
    </script>

    <script type="text/javascript">
      $('#adm_country_name_upd').on('click',function(){
            var admission_id = $('#adm_ids').val();
            var country_id = $('#country_name').val();
          
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_adm_country",
                dataType : "JSON",
                data : {'admission_id' : admission_id ,  'country_id' : country_id  },
                success: function(data){ 
                
                  alert('Are You Sure This Field Updated');
                  setTimeout(function() {
                location.reload();
            },500);
                }
            });
            return false;
        });
    </script>

    <script type="text/javascript">
      $('#adm_sch_clg_state_upd').on('click',function(){
            var admission_id = $('#adm_ids').val();
            var school_clg_state = $('#sch_clg_statename').val();
          
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_adm_school_clg_state",
                dataType : "JSON",
                data : {'admission_id' : admission_id ,  'school_clg_state' : school_clg_state  },
                success: function(data){ 
                
                  alert('Are You Sure This Field Updated');
                  setTimeout(function() {
                location.reload();
            },500);
                }
            });
            return false;
        });
    </script>

     <script type="text/javascript">
      $('#adm_sch_clg_city_upd').on('click',function(){
            var admission_id = $('#adm_ids').val();
            var school_clg_city = $('#sch_clg_cityname').val();
          
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_adm_school_clg_city",
                dataType : "JSON",
                data : {'admission_id' : admission_id ,  'school_clg_city' : school_clg_city  },
                success: function(data){ 
                
                  alert('Are You Sure This Field Updated');
                  setTimeout(function() {
                location.reload();
            },500);
                }
            });
            return false;
        });
    </script>

    <script type="text/javascript">
      $('#adm_sch_clg_area_upd').on('click',function(){
            var admission_id = $('#adm_ids').val();
            var school_clg_area = $('#sch_clg_areaname').val();
          
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_adm_school_clg_area",
                dataType : "JSON",
                data : {'admission_id' : admission_id ,  'school_clg_area' : school_clg_area  },
                success: function(data){ 
                
                  alert('Are You Sure This Field Updated');
                  setTimeout(function() {
                location.reload();
            },500);
                }
            });
            return false;
        });
    </script>

     <script>
         $(document).ready(function(){
           $("#search").keyup(function(){
          if($("#search").val().length>3){
          $.ajax({
           type: "post",
           url: "<?php echo base_url()?>AddmissionController/live_search",
           cache: false,    
           data:'search='+$("#search").val(),
           success: function(response){
            $('#finalResult').html("");
            var obj = JSON.parse(response);
            if(obj.length>0){
             try{
              var items=[];  
              $.each(obj, function(i,val){           
                  items.push($('<li/>').text(val.first_name + " " + val.surname));
              }); 
              $('#finalResult').append.apply($('#finalResult'), items);
             }catch(e) {  
              alert('Exception while request..');
             }  
            }else{
             $('#finalResult').html($('<li/>').text("No Data Found"));  
            }  
            
           },
           error: function(){      
            alert('Error while request..');
           }
          });
          }
          return false;
           });
         });
      </script>