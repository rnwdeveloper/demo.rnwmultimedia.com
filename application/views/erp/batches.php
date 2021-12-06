<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/select2.min.css">
<style type="text/css">
   .select2-container--default .select2-selection--multiple .select2-selection__choice {
       background-color: #2255a4;
       color: white;
       border: 1px solid #aaa;
       border-radius: 4px;
       cursor: default;
       float: left;
       margin-right: 5px;
       margin-top: 5px;
       padding: 0 1px;
   }
   /*.select2-container--default .select2-selection--multiple {
       line-height: 27px;
   }*/
   .select2-container {
       box-sizing: border-box;
       display: block; 
       width:100% !important;
       margin: 0;
       position: relative;
       vertical-align: middle;
       z-index: 9999999999;
   }
   .select2-container--default .select2-selection--multiple .select2-selection__rendered li {
       list-style: none;
    }
    .img-responsive{
      display: block;
      max-width: 100%;
      height: auto;
   }
   .form{
       border: 0;
   } 
      .simple_border_box_design {
       border: 0px solid #ccc;
       padding: 10px;
       border-radius: 3px;
       width: 100%;
       display: inline-block;
       position: relative;
       background-color: #fff;
       margin-bottom: 0px;
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
  
  .extra_top_search_header_bar{
    padding: 7px;
  }
  .main_content section{
    padding: 15px 0;
  }
  th img{
   width: 200px;
    display: block;
    margin: auto;
    vertical-align: middle;
  }
  .table td, .table th{
   font-size: 10px;
   padding: 5px;
   vertical-align: middle;
  }
  .function-icon{
      background-color: var(--custi-light-blue);
    color: #fff !important;
    width: 22px;
    border-radius: 100%;
    height: 22px;
    display: inline-block;
    text-align: center;
    line-height: 22px;
    margin: 0 !important;
    font-size: 10px;
   }
   .form-control{
      font-size: 12px;
      list-height:1;
   }
   .batch{
      max-width: 500px;
   }
   .btn{
      font-size: 12px;
   }
</style>

<main class="main_content d-inline-block">
   <section class="axtraage_main_first_sec d-inline-block w-100 position-relative">
      <div class="container-fluid">
         <div class="row">
         <div class="col-12 d-flex justify-content-between">
                <h6 class="page-title text-dark mb-3">Batches</h6>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb p-0">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Library</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data</li>
                  </ol>
                </nav>
            </div>
            <div class="col-xl-12">
               <div class="extra_Block_box">
                  <div class="extra_top_search_header_bar d-inline-block w-100 position-relative">
                     <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                           <div class="form-group mb-0">
                              <div class="btn-group w-100">
                                 <input type="text" name="" id="search_data" class="form-control" placeholder="Search by Name, Email or Mobile">
                                 <button type="button" class="btn btn-primary" id="searach_function_run"><i class="fa fa-search"></i></button>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                           <div class="extra_top_search_header_bar_icon text-sm-center text-xl-left text-lg-left text-md-left text-center">
                              <ul>
                              
                                 <li>
                                    <a href="#" data-toggle="modal" data-target="#leed_add_modal"><i class="fas fa-plus"></i></a>
                                 </li>
                                  <li>
                                          <a href="#" data-toggle="modal" data-toggle="modal" data-target="#searchingm"><i class="fa fa-filter"></i></a>
                                     </li>
                              </ul>

                           </div>
                        </div>
                     </div>
                  </div>

                  <!-- serach batches data modal -->
                     <div class="modal fade" id="searchingm" tabindex="-1" role="dialog" aria-labelledby="searchingm" aria-hidden="true">
                       <div class="modal-dialog" style="max-width:1000px !important;">
                         <div class="modal-content" style="margin-top: 55px;">
                           <div class="modal-header" style="background-color: #0b527e;">
                             <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Filter Batch Records</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <div class="modal-body">
                             <div class="card">
                       <div class="card-body">
                         <!-- <h5 class="card-title btn text p">Master Search</h5> -->
                         <p class="card-text">
                           <form method="post" action="<?php  echo base_url(); ?>AddmissionController/batches">
                         <div class="row">
                           <div class="col-sm-3">
                             <div class="form-group">
                               <label><b>Name</b></label>   
                               <input type="text" class="form-control" value="<?php if(!empty($filter_fname)) { echo @$filter_fname; } ?>" placeholder="Name"  name="filter_fname">
                           </div>
                         </div>
                         <div class="col-sm-3">
                           <div class="form-group">
                          <label for="Faculty"><b>Branch</b></label>   
                          <select class="form-control custom-select my-1 mr-sm-2"  name="filter_branch">
                          <option selected disabled>Filter Branch</option>
                           <?php foreach($list_branch as $val) { ?>
                           <option  <?php if(@$filter_branch==$val->branch_id) { echo "selected"; } ?> value="<?php echo $val->branch_id; ?>"> <?php echo $val->branch_name; ?></option>
                          <?php } ?>
                         </select>
                         </div>
                       </div>
                       <div class="col-sm-3">
                           <div class="form-group">
                          <label for="Faculty"><b>Faculty</b></label>   
                          <select class="form-control custom-select my-1 mr-sm-2"  name="filter_faculty">
                          <option selected disabled>Filter Faculty</option>
                            <?php foreach($faculty_all as $val) { ?>
                           <option  <?php if(@$filter_faculty==$val->faculty_id) { echo "selected"; } ?> value="<?php echo $val->faculty_id; ?>"> <?php echo $val->name; ?></option>
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
                      
                     </div>
                     <div class="float-right">
                     <input type="submit" id="btn" class="btn btn-success f" value="Search" name="filter_batches">
                         <a class="btn btn-danger f" href="<?php echo base_url(); ?>AddmissionController/batches">Reset</a>
                       </div>
                     </form>
                         </p>
                       </div>
                     </div>
                      </div>
                     </div>
                       </div>
                     </div>
            <!--     <div class="extra_lead_menu d-inline-block w-100 position-relative">
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
                  </div>
                  <div class="menu_bottom_btn_row">
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
                     <div id="msg_delt_batch"></div>
                     <?php  foreach($list_all_batches as $lb) { ?>
                     <div class="lead_block_box">
                        <div class="simple_border_box_design">                      
                              <div class="form-row text-center">
                                  <div class="col-sm-2">
                                    <label><b>Batch Name</b></label>
                                    <span><?php echo $lb->batch_name ?></span>
                                  </div>
                                  <div class="col-sm-1">
                                    <label><b>Batch Code</b></label>
                                    <span><?php echo $lb->batch_code ?></span>
                                  </div>
                                  <div class="col-sm-2">
                                    <label><b>Branch</b></label>
                                    <span>
                                    <?php
                                       foreach($list_branch as $ld) 
                                           { 
                                             if($lb->branch_id==$ld->branch_id)
                                               { echo $ld->branch_name; } 
                                           }
                                    ?>
                                    </span>
                                  </div>
                                  <div class="col-sm-2">
                                    <label><b>Faculty</b></label>
                                    <span>
                                       <?php
                                       foreach($faculty_all as $lf) 
                                           { 
                                             if($lb->faculty_id==$lf->faculty_id)
                                               { echo $lf->name; } 
                                           }
                                    ?>
                                    </span>
                                  </div>
                                  <div class="col-sm-2">
                                    <label><b>Course</b></label>
                                    <span>
                                       <?php
                                       foreach($list_course as $lc) 
                                           { 
                                             if($lb->course_id==$lc->course_id)
                                               { echo $lc->course_name; } 
                                           }
                                    ?>
                                    </span>
                                 </div>
                                 <div class="col-sm-2">
                                    <label><b>View Batch</b></label>
                                    <span>
                                       <a  href="<?php echo base_url(); ?>AddmissionController/view_batches?action=tps&id=<?php echo $lb->batches_id; ?>" class="function-icon">
                                       <i class="fas fa-eye"></i>
                                    </a>
                                    </span>
                                  </div>
                                 <!-- <div class="col-sm-2">
                                    <label><b>Shining Sheet</b></label>
                                    <span>
                                       <i style="color:#0b527e;" class="fas fa-eye" data-toggle="modal" data-target="#exampleModals" onclick="return get_shiningsheet_record(<?php echo $lb->course_id;?>,<?php echo $lb->faculty_id; ?>)"></i>
                                    </span>
                                  </div> -->
                                 <div class="col-sm-1 align-self-center text-center" style="color:#0b527e;">
                                    <a href="" class="function-icon" data-toggle="modal" data-target="#edit_modal" onclick="return update_baches(<?php echo $lb->batches_id;?>)">
                                       <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="" class="function-icon" onclick="return deleted_batch(<?php echo $lb->batches_id;?>)">
                                       <i class="fas fa-trash-alt"></i>
                                    </a>
                                    <a  class="function-icon" data-toggle="tooltip" data-placement="top" title="View History" onclick="return history_batch(<?php echo $lb->batches_id;?>)">
                                       <i class="fas fa-eye"></i>
                                    </a>
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
   </section>  
   <div class="new_lead_genered_btn">
      <a href="javascript:void(0)" class="" data-toggle="modal" data-target="#leed_add_modal" onclick="return get_side_bar_modal()"><i class="fas fa-plus"></i></a>
   </div>
</main>


<div class="right_side d-inline-block">
  <section class="right_side_header d-inline-block w-100 position-relative">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          <div class="modal-header px-0">
          <!--  -->
            <h5 class="modal-title"><span id="change_batch_status">Btach</span>&nbsp;<span id="stu_name"></span></h5>
            <button type="button" class="close close_side_bar" onclick="return close_right_side_bar()">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="fill_new_leade_info_body" id="create_leade">
            <div class="right_side_row_panel">
              <form method="post">
              <!-- <a href="#candidate_details" data-toggle="collapse" class="collapsed"><i class="fas fa-chevron-down"></i><span id="change_status_details">Batch</span></a> -->
               <div class="right_side_row_panel_block collapse show" id="candidate_details" data-parent="#create_leade">
                   
                   
                   <div id="batch_history">
                   </div>                 

               </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>





<div class="modal fade" id="leed_add_modal">
   <div class="modal-dialog modal-dialog-centered modal-lg batch" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title"><b>Create New Batch</b></h5>
            <div class="float-left" id="msg_batch"></div>
         </div>
         <div class="modal-body">
            <div class="row">
               <?php $addby =  $_SESSION['Admin']['username']; ?>
               <input type="hidden" maxlength="50" class="form-control" id="created_bye"  value="<?php if(isset($addby)){ echo $addby; } ?>">
               <div class="col-xl-6 col-lg-6">
                  <div class="form-group">
                      <div><span><label for="FirstName">Batch Name<i class="required">*</i></label><input type="text" maxlength="50" class="form-control" id="batch_name" placeholder="Batch Name" value=""></span></div>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-6">
                  <div class="form-group">
                      <div><span><label for="FirstName">Batch Code<i class="required">*</i></label><input type="text" maxlength="50" class="form-control" id="batch_code" placeholder="C123" value=""></span></div>
                  </div>
               </div>
               
               <div class="col-xl-6 col-lg-6">
                  <div class="form-group">
                     <label>Branch*</label>
                     <select class="form-control" name="branch_id" id="branch_id">
                        <option value="">Select Branch</option>
                        <?php foreach($list_branch as $bl) { if($bl->branch_status=='0') { ?>
                           <option value="<?php echo $bl->branch_id; ?>"><?php echo $bl->branch_name; ?></option>
                        <?php  } }?>
                     </select>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-6">
                  <div class="form-group">
                     <label>Faculty*</label>
                     <select class="select2 form-control custom-form-control"  multiple="multiple" name="faculty_id" id="faculty_id">
                        <option>Select Faculty</option>
                         <?php foreach($faculty_all as $ld) { ?>
                                <option  
                                 value="<?php echo $ld->faculty_id; ?>"><?php echo $ld->name; ?></option>
                              <?php } ?>  
                     </select>
                  </div>
               </div>
               <div class="col-xl-12 col-lg-12">
                  <div class="form-group">
                     <label>Course*</label>
                     <select class="form-control" name="course_id" id="course_id">
                        <option>Select Course</option>
                        <!-- <?php foreach($list_course as $lc) { ?>
                                <option  
                                 value="<?php echo $lc->course_id; ?>"><?php echo $lc->course_name; ?></option>
                              <?php } ?> -->
                     </select>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
                <button type="button" id="add_batch" class="btn btn-success">Create Batch</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
      </div>
   </div>
</div>

<div class="modal fade" id="edit_modal">
   <div class="modal-dialog modal-dialog-centered modal-lg batch" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title"><b>Edit Batch</b></h5>
            <div class="float-left" id="msg_upd_batch"></div>
         </div>
         <div class="modal-body">            
            <div class="row">
               <input type="hidden" class="form-control" name="" id="batch_id">
               <div class="col-xl-6 col-lg-6">
                  <div class="form-group">
                      <div><span><label for="FirstName">Batch Name<i class="required">*</i></label><input type="text" maxlength="50" class="form-control" id="b_name" placeholder="Batch Name" value=""></span></div>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-6">
                  <div class="form-group">
                      <div><span><label for="FirstName">Batch Code<i class="required">*</i></label><input type="text" maxlength="50" class="form-control" id="b_code" placeholder="C123" value=""></span></div>
                  </div>
               </div>
               
               <div class="col-xl-6 col-lg-6">
                  <div class="form-group">
                     <label>Branch*</label>
                     <select class="form-control" name="branch_id" id="b_id">
                        <option value="">Select Branch</option>
                        <?php foreach($list_branch as $bl) { if($bl->branch_status=='0') { ?>
                           <option value="<?php echo $bl->branch_id; ?>"><?php echo $bl->branch_name; ?></option>
                        <?php  } }?>
                     </select>
                  </div>
               </div>
                <div class="col-xl-6 col-lg-6">
                  <div class="form-group">
                     <label>Faculty*</label>
                     <select class="select2 form-control custom-form-control"  multiple="multiple" name="faculty_id" id="f_id">
                        <option value="">Select Faculty</option>
                         <?php foreach($faculty_all as $ld) { if($ld->status=='0') {  ?>
                                <option  
                                 value="<?php echo  $ld->faculty_id; ?>"><?php echo  $ld->name;?></option>
                              <?php } } ?>  
                     </select>
                  </div>
               </div> 
               <div class="col-xl-12 col-lg-12">
                  <div class="form-group">
                     <label>Course*</label>
                     <select class="form-control" name="course_id" id="c_id">
                        <option>Select Course</option>
                        <?php foreach($list_course as $lc) { ?>
                                <option  
                                 value="<?php echo $lc->course_id; ?>"><?php echo $lc->course_name; ?></option>
                              <?php } ?>
                     </select>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
                <button type="button" id="upd_baches" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
      </div>
   </div>
</div>

<!-- Modal Shining Sheet-->
<div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 800px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Shining Sheet</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="get_shiningsheet">
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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

<script src="<?php echo base_url(); ?>dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/js/select2.min.js"></script>

   <script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        

    </script>
 <script>

function get_side_bar_modal()
{
   $('.email_template_view').hide();
   $('.fill_new_leade_info_body').show();
   $('.lead_save_btn').show();
   $('#first_first_right_side').show();
   $('#first_second_right_side').show();
   $('#first_third_right_side').show();
   $('#lead_third_fill_title').show();
   $('#third_followup_mode').show();
   // $('#existing_follow_up').hide();
   $('#first_forth_right_side').show();
   $('#first_fifth_right_side').show();
   $('#second_right_side').show();
   $('#third_right_side').show();
   $('.sms_template_view').hide();
   // $('.lead_save_btn').show();
   // $('#change_lead_status').html('Edit Followup For');
   $('#edit_lead').val('Edit Lead');
   // $('#add_lead').hide();
   $('.plus_button').show();
   // $("aside").addClass('right_show');
   // $('.main_content').addClass('right_show');
   // $('.right_side').addClass('right_show');

         $('#history_lead').hide();
         $('.right_side_row_panel').show();
         $('.lead_save_btn').show();
         $("aside").addClass('right_show');
         $('.main_content').addClass('right_show');
         $('.right_side').addClass('right_show');
         $('.plus_button').removeClass('create_new_lead');
         $('.select_course_single').hide();
         $('.select_course_package').show();
         $('#edit_lead').hide();
         $('#add_lead').show();
         $('#change_lead_status').html("Add New Campaign"); 
         $('#add_lead_name_fast').html('');
         $("#lead_list_form_side_bar")[0].reset();
         $('.create_new_lead_upload').hide();
}

function close_right_side_bar()
{
   $('.sms_template_view').hide();
   $('#first_first_right_side').show();
   $('#first_second_right_side').show();
   $('#first_third_right_side').show();
   $('#lead_third_fill_title').show();
   $('#third_followup_mode').show();

   $('#first_forth_right_side').show();
   $('#first_fifth_right_side').show();
   $('#second_right_side').show();
   $('#third_right_side').show();
   // $('.lead_save_btn').show();
   // $('#change_lead_status').html('Edit Followup For');
   $('#edit_lead').val('Edit Lead');
   $('#edit_lead').hide();
   $('#add_lead').show();
   $('.plus_button').show();

  $('.main_content').removeClass('right_show');
    $('.right_side').removeClass('right_show');
    $("aside").removeClass('right_show');
    $('.plus_button').addClass('create_new_lead');
    $('.create_new_lead_upload').show();
}

function history_batch(batches_id=''){
  $("aside").addClass('right_show');
  $('.main_content').addClass('right_show');
  $('.right_side').addClass('right_show');
  $('.plus_button').removeClass('create_new_lead');
  $('#change_status_details').html("Btach History");
  $('#change_batch_status').html("<b style='color: red;'>Btach History</b>");
   $.ajax({
     url : "<?php echo base_url(); ?>AddmissionController/ajax_batch_history",
     type:"post",
     data:{
       'batches_id':batches_id 
     },
     success:function(Resp){
      $('#batch_history').show();
       $('#batch_history').html(Resp);
      
     }
   });
 }
 </script>

 <script>
  $(document).ready(function(){

    $('#branch_id').change(function(){
 
  var branch_id = $('#branch_id').val();
  //var course_id = $('#course_orsingle').val();
 // var branch_id =  $('#branch_id').val();
 
   $.ajax({
    url:"<?php echo base_url(); ?>AddmissionController/Get_faculty",
    method:"POST",
    data:{ 'branch_id' : branch_id },
    success:function(data)
    {
     $('#faculty_id').html(data);
 
    }


   });
 });

    $('#faculty_id').change(function(){
 
  var faculty_id = $('#faculty_id').val();
  //var course_id = $('#course_orsingle').val();
 // var branch_id =  $('#branch_id').val();
 
   $.ajax({
    url:"<?php echo base_url(); ?>AddmissionController/Get_courses",
    method:"POST",
    data:{ 'faculty_id' : faculty_id },
    success:function(data)
    {
     $('#course_id').html(data);
 
    }


   });
 });

}); 
</script>

<script type="text/javascript">


  function update_baches(batches_id=''){
  $.ajax({
     url : "<?php echo base_url(); ?>AddmissionController/get_batches_data",
     type : "post",
     data:{
       'batches_id' : batches_id
     },
     success:function(res)
     {
     
     var data = $.parseJSON(res);

     $('#batch_id').val(data.record['batches_id']);
     $('#b_name').val(data.record['batch_name']);
     $('#b_code').val(data.record['batch_code']);
     $('#b_id').val(data.record['branch_id']);
     $('#f_id').val(data.record['faculty_id']);
     $('#c_id').val(data.record['course_id']);
     // $('#submit').val('Update');
     }

  });
}

function deleted_batch(batches_id=''){
   var conf =  confirm("Are U Sure to Delete Record");
    if(conf){
  $.ajax({
     url : "<?php echo base_url(); ?>AddmissionController/batch_remove",
     type : "post",
     data:{
       'batches_id' : batches_id
     },
     success:function(resp)
     {
      var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            if(ddd == '1')
            {
                $('#msg_delt_batch').fadeIn();
                $('#msg_delt_batch').html("<div class='btn btn-success'><b style='color: white;'>Successfully Deleted Record</b></div>");
                $('#msg_delt_batch').fadeOut(2000);

                setTimeout(function() {
                    location.reload();
                }, 2500);

            }
            else if(ddd == '2')
            {
               $('#msg_delt_batch').fadeIn();
                $('#msg_delt_batch').html("<div class='btn btn-danger'><b style='color: white;'>Someting Wrong!!</b></div>");
                $('#msg_delt_batch').fadeOut(2000);

                setTimeout(function() {
                    location.reload();
                }, 2500);
            }
     }

  });
}
}
</script>

<script type="text/javascript">
   $('#add_batch').on('click', function() {
     var batch_name = $('#batch_name').val();
     var batch_code = $('#batch_code').val();
     var branch_id = $('#branch_id').val();
     var faculty_id = $('#faculty_id').val();
     var course_id = $('#course_id').val();

     $.ajax({
       type: "POST",
       url: "<?php echo base_url() ?>AddmissionController/Batch_add",
       data: {
         'batch_name': batch_name,
         'batch_code': batch_code,
         'branch_id': branch_id,
         'faculty_id': faculty_id,
         'course_id': course_id
       },
       success: function(resp) 
       {
           var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            if(ddd == '1')
            {
                $('#msg_batch').fadeIn();
                $('#msg_batch').html("<div class='btn btn-success'><b style='color: white;'>Successfully Inserted Record</b></div>");
                $('#msg_batch').fadeOut(2000);

                setTimeout(function() {
                    location.reload();
                }, 2500);

            }
            else if(ddd == '2')
            {
               $('#msg_batch').fadeIn();
                $('#msg_batch').html("<div class='btn btn-danger'><b style='color: white;'>Someting Wrong!!</b></div>");
                $('#msg_batch').fadeOut(2000);

                setTimeout(function() {
                    location.reload();
                }, 2500);
            }
       }
     });
     return false;
   });

    $('#upd_baches').on('click', function() {
     var batches_id = $('#batch_id').val();
     var batch_name = $('#b_name').val();
     var batch_code = $('#b_code').val();
     var branch_id = $('#b_id').val();
     var faculty_id = $('#f_id').val();
     var course_id = $('#c_id').val();
     var created_bye = $('#created_byes').val();
   

     $.ajax({
       type: "POST",
       url: "<?php echo base_url() ?>AddmissionController/Batch_update",
       data: {
         'batches_id': batches_id,
         'batch_name': batch_name,
         'batch_code': batch_code,
         'branch_id': branch_id,
         'faculty_id': faculty_id,
         'course_id': course_id,
         'created_bye': created_bye
       },
       success: function(resp) 
       {
             var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            if(ddd == '1')
            {
                $('#msg_upd_batch').fadeIn();
                $('#msg_upd_batch').html("<div class='btn btn-success'><b style='color: white;'>Successfully Updated Record</b></div>");
                $('#msg_upd_batch').fadeOut(2000);

                setTimeout(function() {
                    location.reload();
                }, 2500);

            }
            else if(ddd == '2')
            {
               $('#msg_upd_batch').fadeIn();
                $('#msg_upd_batch').html("<div class='btn btn-danger'><b style='color: white;'>Someting Wrong!!</b></div>");
                $('#msg_upd_batch').fadeOut(2000);

                setTimeout(function() {
                    location.reload();
                }, 2500);
            }
       }
     });
     return false;
   });
 </script>