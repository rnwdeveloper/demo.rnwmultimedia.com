<?php //  print_r($_SESSION); die; 
$all_per = explode(',',$_SESSION['p_permission']); 
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<link rel="stylesheet" type="text/css" href="https://unpkg.com/lightpick@latest/css/lightpick.css">

<div class="main-content">
    <div class="extra_lead_menu" id="response_sidemail_compose">
        <div class="row">
            <div class="col-12 d-flex justify-content-between">
                <h6 class="page-title text-dark mb-3">Students Admission Detail</h6>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb p-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" data-toggle="modal" data-target=".tuition_fees_modal">Data</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="extra_top-menu">
            <ul class="pl-0">

                <?php 
                $st_record =  array();
                $sstatus_record = array('Enrolled','Pending','Hold','Terminated','Cancelled','Completed');
                foreach($sstatus_record as $vss){
                   $nss=1;
                   $vns = 0;
                   foreach(@$status_wise as $vk=>$vs){
                       if($vk == $vss){
                           $nss = 0;
                           $vns = $vs;
                           break;
                       }
                   }

                   if($nss == 0){
                       $st_record[$vss] = $vns;
                   }else{
                       $st_record[$vss] = $vns;
                   }
                }
                // echo "<pre>";
                // print_r();
                // exit;
                if(!empty($st_record)) { 
                foreach ($st_record as $k => $v) { 
                // $satu = $this->input->get('status');
                if($k== 'Hold'){
                   $class_button = 'btn-hold text-white';
                }else if($k == 'Enrolled'){ 
                   $class_button = 'btn-info text-white';
               }else if($k == 'Pending'){
                   $class_button = 'btn-warning text-white';
               }else if($k == 'Terminated'){
                   $class_button = 'btn-red text-white';
               }else if($k == 'Cancelled'){
                   $class_button ='btn-danger text-white';
               }else if($k == 'Completed'){
                   $class_button = 'btn-success text-white';
               } 

            ?>
                <li><a href="<?php echo base_url(); ?>Admission/erpadmission_view?status=<?php echo $k; ?>"
                        class="btn <?php echo @$class_button; ?>">
                        <?php echo  $k; ?> <span class="badge badge-transparent">
                            <?php echo $v; ?>
                        </span>
                    </a></li>
                <?php } }?>
                <li><a href="<?php echo base_url(); ?>Admission/erpadmission_view" class="btn btn-primary">All<span
                            class="badge badge-transparent">
                            <?php echo $list_all_admission_count; ?>
                        </span></a></li>


                <li class="float-none float-lg-right"><a href="" class="btn btn-primary" data-toggle="modal"
                        data-target=".bd-example-modal-lg"><i class="fas fa-filter mr-1"></i>Filter</a></li>
            </ul>
        </div>
        <!-- Large modal -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="myLargeModalLabel">Search</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php  echo base_url(); ?>Admission/erpadmission_view">
                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab"
                                        aria-controls="home" aria-selected="true">Admission Filter</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab"
                                        aria-controls="profile" aria-selected="false">Student Filter</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab"
                                        aria-controls="contact" aria-selected="false">Course Filter</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="home3" role="tabpanel"
                                    aria-labelledby="home-tab3">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="inputState">Year</label>
                                            <select id="inputState" class="form-control" name="filter_year"
                                                id="filter_year">
                                                <option value="">Select Year</option>
                                                <?php date_default_timezone_set("Asia/Calcutta");
                                                     $corent_year = date('Y');?>
                                                <?php for($i=2019;$i<=2030;$i++) { ?>
                                                <option <?php if(@$corent_year==$i) { echo "selected" ; } ?> value="
                                                    <?php echo $i; ?>">
                                                    <?php echo $i; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>GR Id</label>
                                            <input type="text" class="form-control" id="" name="filter_gr_id"
                                                value="<?php if(!empty($filter_gr_id)) { echo @$filter_gr_id; } ?>"
                                                placeholder="GR Id">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputPassword4">Enrollment No</label>
                                            <input type="text" class="form-control" id="" name="filter_enrollnno"
                                                value="<?php if(!empty($filter_enrollnno)) { echo @$filter_enrollnno; } ?>"
                                                placeholder="Enrollment No">
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label for="inputState">Branch</label>
                                        <select id="inputState" class="form-control" name="filter_branch" id="filter_branch">
                                            <option value="">Select Branch</option>
                                            <?php  $branch_id = explode(',',$_SESSION['branch_ids']);
                                                foreach($list_branch as $k=>$va){
                                                    $br_id = explode(',',$va->branch_id);
                                                    if($br_id[0] != ''){
                                                    for($i=0; $i<sizeof($branch_id); $i++){
                                                        if(in_array($branch_id[$i],$br_id)){ ?>
                                                        <option <?php if(@$filter_branch==$va->branch_id) { echo "selected"; } ?> 
                                                        value="<?php echo $va->branch_id; ?>"><?php echo $va->branch_name; ?></option><?php
                                                        }
                                                      }
                                                    }
                                                  }
                                                ?>
                                        </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label for="inputState">Department</label>
                                        <select id="inputState" class="form-control" name="filter_department" id="filter_department">
                                            <option value="">Select Department</option>
                                            <?php foreach ($list_department as $ld) { ?>
                                            <option <?php if (@$filter_department == $ld->department_id) {
                                                        echo "selected";
                                                    } ?> value="<?php echo $ld->department_id; ?>"><?php echo $ld->department_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <label>Date From - To </label>
                                            <input type="hidden" id="fromdate" name="filter_startDate"
                                                value="<?php if(!empty($filter_startDate)) { echo @$filter_startDate; } ?>">
                                            <input type="hidden" id="todate" name="filter_endDate"
                                                value="<?php if(!empty($filter_endDate)) { echo @$filter_endDate; } ?>">
                                            <div id="reportrange">
                                                <i class="far fa-calendar-alt"></i>&nbsp;
                                                <span>
                                                    <?php if(!empty($filter_startDate) && !empty($filter_endDate)) { echo @$filter_startDate." - ".$filter_endDate; } ?>
                                                </span> <i class="fa fa-caret-down"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="inputEmail4">First Name</label>
                                            <input type="text" class="form-control" id="" name="filter_fname"
                                                value="<?php if(!empty($filter_fname)) { echo @$filter_fname; } ?>"
                                                placeholder="Name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputPassword4">Last Name</label>
                                            <input type="text" class="form-control" id="" name="filter_lname"
                                                value="<?php if(!empty($filter_lname)) { echo @$filter_lname; } ?>"
                                                placeholder="Surname">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputPassword4">Email</label>
                                            <input type="email" class="form-control" id="" name="filter_email"
                                                value="<?php if(!empty($filter_email)) { echo @$filter_email; } ?>"
                                                placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputPassword4">Mobile</label>
                                            <input type="text" class="form-control" id="" name="filter_mobile"
                                                value="<?php if(!empty($filter_mobile)) { echo @$filter_mobile; } ?>"
                                                placeholder="Mobile">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Type</label><br>
                                            <div class="pretty p-icon p-jelly p-round p-bigger">
                                                <input type="radio" name="type" value="single" class="pay-type-one"
                                                    onclick="return hidden_type()" checked />
                                                <div class="state p-info">
                                                    <i class="icon material-icons">done</i>
                                                    <label>Single</label>
                                                </div>
                                            </div>
                                            <div class="pretty p-icon p-jelly p-round p-bigger">
                                                <input type="radio" name="type" value="package" class="pay-type-two"
                                                    onclick="return hidden_type()" />
                                                <div class="state p-info">
                                                    <i class="icon material-icons">done</i>
                                                    <label>Package</label>
                                                </div>
                                            </div>
                                            <div class="pretty p-icon p-jelly p-round p-bigger">
                                                <input type="radio" name="type" value="COLLEGE" class="pay-type-three"
                                                    onclick="return hidden_type()" />
                                                <div class="state p-info">
                                                    <i class="icon material-icons">done</i>
                                                    <label>College</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 select_course_single">
                                        <label for="inputState">Course</label>
                                        <select id="inputState" class="form-control" name="filter_course" id="filter_course">
                                            <option value="">Select Course</option>
                                            <?php foreach ($list_course as $sc) { ?>
                                            <option <?php if (@$filter_course == $sc->course_id) {
                                                        echo "selected";
                                                    } ?> value="<?php echo $sc->course_id; ?>"><?php echo $sc->course_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                        <div class="form-group col-md-6 select_course_package">
                                        <label for="inputState">Package</label>
                                        <select id="inputState" class="form-control" name="filter_package" id="filter_package">
                                            <option value="">Select Package</option>
                                            <?php foreach ($list_package as $cp) { ?>
                                            <option <?php if (@$filter_package == $cp->package_id) {
                                                        echo "selected";
                                                    } ?> value="<?php echo $cp->package_id; ?>"><?php echo $cp->package_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                        <div class="form-group col-md-6 select_course_clg">
                                        <label for="inputState">College Course</label>
                                        <select id="inputState" class="form-control" name="filter_clg_course" id="filter_clg_course">
                                            <option value="">Select Course</option>
                                            <?php foreach ($college_courses_all as $clgco) { ?>
                                            <option <?php if (@$filter_clg_course == $clgco->college_courses_id) {
                                                        echo "selected";
                                                    } ?> value="<?php echo $clgco->college_courses_id; ?>"><?php echo $clgco->college_course_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <!-- <button class="btn btn-success mr-1" type="submit" name="filter_overdue_fees">Filter</button> -->
                                <input type="submit" class="btn btn-primary" value="Filter" name="filter_admission">
                                <a class="btn btn-light text-dark"
                                    href="<?php echo base_url(); ?>Admission/erpadmission_view">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="extra_lead_showM">
            <?php if (!empty($list_all_admission)) {
           $status_dd = $this->input->get('status');
       $mk = 0;
       foreach ($list_all_admission as $adm) { 

       if($status_dd == 'Hold'){
           $btn_record = 'card-hold';
       }else if($status_dd == 'Enrolled'){
           $btn_record = 'card-info';
       }else if($status_dd == 'Pending'){
           $btn_record = 'card-warning';
       }else if($status_dd == 'Terminated'){
           $btn_record =  'card-red';
       }else if($status_dd == 'Cancelled'){
           $btn_record =  'card-danger';
       }else if($status_dd == 'Completed'){
           $btn_record = 'card-success';
       }else{
           if($adm->admission_status == 'Hold'){
               $btn_record = 'card-hold';
           }else if($adm->admission_status == 'Enrolled'){
               $btn_record = 'card-info';
           }else if($adm->admission_status == 'Pending'){
               $btn_record = 'card-warning';
           }else if($adm->admission_status == 'Terminated'){
               $btn_record =  'card-red';
           }else if($adm->admission_status == 'Cancelled'){
               $btn_record =  'card-danger';
           }else if($adm->admission_status == 'Completed'){
               $btn_record = 'card-success';
           }else{
               $btn_record = 'card-primary';
           }
       }
       ?>

            <div class="extra_lead_show abc">
                <div class="card <?php echo $btn_record; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 pr-lg-5 pr-md-4">
                                <div class="erp-admn_prof text-center mb-3">
                                    <figure class="avatar mr-2 avatar-lg">
                                        <img src="http://demo.rnwmultimedia.com/dist/admissiondocuments/<?php $docids = explode("
                                            ,",$adm->admission_id);
                                        foreach($doc_list as $row) { if(in_array($row->admission_id,$docids)) { echo
                                        $row->photos; } } ?>" alt="..." onerror="this.src='<?php echo base_url(); ?>dist/admissiondocuments/dummy-user.png'" oncontextmenu="return false;">
                                    </figure>
                                </div>
                                <div class="form-group text-center">
                                    <label>Multi Course</label>
                                    <select class="form-control" id="multic<?php echo $mk; ?>"
                                        onchange="return getAdmissionData(<?php echo $mk; ?>)">
                                        <?php $i = 0;
                       foreach ($adm->list_multi_course_admission as $k => $val) { ?>
                                        <option value="<?php echo $k; ?>">
                                            <?php echo $val; ?>
                                        </option>
                                        <?php $i++;
                       } ?>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <span id="idcard<?php echo $mk; ?>">
                                        <a href="<?php echo base_url(); ?>Admission/erpprintidcard/<?php echo $adm->admission_id; ?>"
                                            target="_blank" class="btn btn-warning text-white mb-2 btn-sm">Print I'D
                                            card</a>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8">
                                <div class="lead_left">
                                    <div class="row">
                                        <div class="adm_item">
                                            <span>Gr ID</span>
                                            <p>
                                                <?php echo $adm->gr_id; ?>/
                                                <?php echo $adm->admission_number; ?>
                                            </p>
                                        </div>
                                        <div class="adm_item">
                                            <span>Prospect Name</span>
                                            <p class="open_rightsidebar"
                                                onclick="return erp_basic_details(<?php echo $adm->admission_id; ?>);">
                                                <?php echo $adm->surname; ?>
                                                <?php echo $adm->first_name; ?>
                                                <?php echo $adm->father_name; ?>
                                            </p>
                                        </div>
                                        <div class="adm_item">
                                            <span>Email</span>
                                            <p class="open_rightsidebar"
                                                onclick="return show_email_template(<?php echo $adm->admission_id; ?>)">
                                                <?php echo $adm->email; ?>
                                            </p>
                                        </div>
                                        <div class="adm_item">
                                            <span>Mobile</span>
                                            <p class="open_rightsidebar"
                                                onclick="return get_sms_template_record(<?php echo $adm->admission_id; ?>)">
                                                <?php echo $adm->mobile_no; ?>
                                            </p>
                                        </div>
                                        <div class="adm_item">
                                            <span>Source</span>
                                            <p>
                                                <?php echo $adm->source_id; ?>
                                            </p>
                                        </div>
                                        <div class="adm_item">
                                            <span>Enrollmemnt No</span>
                                            <p id="enrollment_ids<?php echo $mk; ?>">
                                                <?php echo $adm->enrollment_number; ?>
                                            </p>
                                        </div>
                                        <div class="adm_item">
                                            <span>Branch</span>
                                            <span id="b_id<?php echo $mk; ?>">
                                                <p class="open_rightsidebar"
                                                    onclick="return transfer_branch(<?php echo $adm->admission_id; ?>)">
                                                    <?php $branch_ids = explode(",", $adm->branch_id);
                                                   foreach ($list_branch as $row) {
                                                     if (in_array($row->branch_id, $branch_ids)) {
                                                       echo $row->branch_name;
                                                     }
                                                   } ?>
                                                </p>
                                            </span>
                                        </div>
                                        <div class="adm_item">
                                            <span>
                                                <?php if(@$adm->type=="COLLEGE")  { echo "Category"; } else { echo "Department"; } ?>
                                            </span>
                                            <p id="d_id<?php echo $mk; ?>">
                                                <?php $department_ids = explode(",", $adm->department_id);
                                           foreach ($list_department as $row) {
                                           if (in_array($row->department_id, $department_ids)) {
                                               echo $row->department_name;
                                           }
                                           } ?>
                                                <!-- <?php $department_ids = explode(",", $adm->course_category_id);
                                           foreach ($course_category_all as $row) {
                                           if (in_array($row->course_category_id, $department_ids)) {
                                               echo $row->course_category_name;
                                           }
                                           } ?> -->
                                            </p>
                                        </div>
                                        <div class="adm_item">
                                            <span>Course</span>
                                            <span id="c_id<?php echo $mk; ?>">
                                                <p class="open_rightsidebar" data-toggle="tooltip"
                                                    data-placement="bottom"
                                                    title="<?php if(!empty($adm->batch_id)){ foreach($batches_all as $bval) { if($bval->batches_id == $adm->batch_id){echo "
                                                    Batch Name=".$bval->batch_name." <br>";
                                                    $valdata = $bval->faculty_id;
                                                    foreach($upd_faculty as $ufd){
                                                    if($valdata == $ufd->faculty_id ){
                                                    echo "Faculty Name=".$ufd->name;
                                                    }
                                                    }

                                                    }}} ?>"
                                                    onclick="return courses_orpackages(
                                                    <?php echo $adm->admission_id; ?>);" style="font-size:12px;">
                                                    <?php $branch_ids = explode(",", $adm->package_id);
                                           foreach ($list_package as $row) {
                                               if (in_array($row->package_id, $branch_ids)) {
                                               echo "P : " . '' . $row->package_name;
                                               }
                                           } ?>
                                                    <?php $branch_ids = explode(",", $adm->course_id);
                                           foreach ($list_course as $row) {
                                               if (in_array($row->course_id, $branch_ids)) {
                                               echo "S : " . '' . $row->course_name;
                                               }
                                           } ?>
                                                    <?php $branch_ids = explode(",", $adm->college_courses_id);
                                           foreach ($college_courses_all as $row) {
                                               if (in_array($row->college_courses_id, $branch_ids)) {
                                               echo "Clg : " . '' . $row->college_course_name;
                                               }
                                           } ?>
                                                </p>
                                            </span>
                                        </div>
                                        <div class="adm_item">
                                            <span>Year</span>
                                            <p id="year_id<?php echo $mk; ?>">
                                                <?php echo $adm->year; ?>
                                            </p>
                                        </div>
                                        <div class="adm_item">
                                            <span>Tuition Fees</span>
                                            <span id="tf_id<?php echo $mk; ?>">
                                                <p class="open_rightsidebar"
                                                    onclick="return admission_payment(<?php echo $adm->admission_id; ?>);">
                                                    <?php if(isset($adm->tuation_fees)) {  echo $adm->tuation_fees;  } ?>
                                                    <?php if(isset($adm->college_tuition_fees)) {  echo $adm->college_tuition_fees;  } ?>
                                                </p>
                                            </span>
                                        </div>
                                        <div class="adm_item">
                                            <span>Status</span>
                                            <p id="rf_id<?php echo $mk; ?>">
                                                <?php echo $adm->admission_status; ?>
                                            </p>
                                        </div>
                                        <div class="adm_item">
                                            <span>Total pay</span>
                                            <p id="tot_pai_amo_data<?php echo $mk; ?>">
                                                <?php 
                                        // $sum =0;
                                        // echo "<pre>";
                                        // print_r($adm->paidcount);
                                     
                                        foreach($adm->paidcount as $k => $val) {
                                           if($val->paid_amount==$adm->tuation_fees){
                                               
                                               // echo "<span class='btn btn-sm btn-success text-white'>".$val->paid_amount."</span>";
                                               echo "<button class='btn btn-sm btn-success'>".$val->paid_amount."</button>";
                                           }
                                           else
                                           {
                                               // echo "<span style='background-color:red; padding:3px 10px;border-radius:3px;color:white;display: inline-block;'>".$val->paid_amount."</span>";
                                               echo "<button class='btn btn-sm btn-red'>".$val->paid_amount."</button>";
                                           }
                           } ?>
                                            </p>
                                        </div>
                                        <div class="adm_item">
                                            <span>Admission Date</span>
                                            <p id="date_id<?php echo $mk; ?>">
                                                <?php echo date('d-M-Y',strtotime($adm->admission_date))." ".$adm->admission_time; ?>
                                            </p>
                                        </div>
                                        <div class="adm_item">
                                            <span>Remarks</span>
                                            <span id="admi_remarks_id<?php echo $mk; ?>">
                                                <p class="open_rightsidebar"
                                                    onclick="return admission_remarks(<?php echo $adm->admission_id; ?>);">
                                                    Add Remark</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 px-0">
                                <div class="lead_right">
                                    <div
                                        class="dropleft d-flex d-md-block flex-wrap align-items-center text-center justify-content-between">
                                        <span>Action</span>
                                        <div>
                                            <p class="dropdown-toggle mb-0 mb-md-3" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"><i
                                                    class="fas fa-ellipsis-h"></i></p>
                                            <div class="dropdown-menu dropleft">
                                                <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Addmisison cancle") { ?>
                                                <span id="ac_id<?php echo $mk; ?>">
                                                    <a class="dropdown-item open_rightsidebar" href="#"
                                                        onclick="return Cancellation_admission(<?php echo $adm->admission_id; ?>);"><i
                                                            class="far fa-trash-alt mr-2"> </i>Canceled Admission</a>
                                                </span>
                                                <?php } }?>
                                                <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Addmisison Terminate") {?>
                                                <span id="at_id<?php echo $mk; ?>">
                                                    <a class="dropdown-item open_rightsidebar" href="#"
                                                        onclick="return admission_terminated(<?php echo $adm->admission_id; ?>);"><i
                                                            class="fas fa-hand-rock mr-2"></i> Mark Terminated</a>
                                                </span>
                                                <?php } } ?>
                                                <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Addmisison hold") { ?>
                                                <span id="ah_id<?php echo $mk; ?>">
                                                    <a class="dropdown-item open_rightsidebar" href="#"
                                                        onclick="return hold_admission(<?php echo $adm->admission_id; ?>);"><i
                                                            class="fas fa-hand-paper mr-2"></i>Hold Admission</a>
                                                </span>
                                                <?php } }?>
                                                <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Addmisison hold over") {?>
                                                <span id="ho_id<?php echo $mk; ?>">
                                                    <a class="dropdown-item open_rightsidebar" href="#"
                                                        onclick="return hold_admission_over(<?php echo $adm->admission_id; ?>);"><i
                                                            class="fab fa-cc-discover mr-2"></i>Hold Over</a>
                                                </span>
                                                <?php } }?>
                                                <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Addmission course upgrade") { ?>
                                                <?php if($adm->type=="single" || $adm->type=="package"){  ?>
                                                <span id="up_course_id<?php echo $mk; ?>">
                                                    <a class="dropdown-item" href="#"
                                                        onclick="return upgrade_courses(<?php echo $adm->admission_id; ?>);"
                                                        data-toggle="modal" data-target=".upgrademodal"><i
                                                            class="fas fa-edit mr-2"> </i>Upgrade Course</a>
                                                </span>
                                                <span id="without_feesid<?php echo $mk; ?>">
                                                    <a class="dropdown-item" href="#"
                                                        onclick="return withoutfeesmodification_courseupgrade(<?php echo $adm->admission_id; ?>);"
                                                        data-toggle="modal" data-target=".withoutfeesmodification"><i
                                                            class="fas fa-edit mr-2"> </i>Without Fees Modification</a>
                                                </span>
                                                <?php } ?>
                                                <?php } }?>
                                                <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Assessment") { ?>
                                                <span id="asmentid<?php echo $mk; ?>">
                                                    <a class="dropdown-item"
                                                        href="<?php echo base_url(); ?>Admission/erpassestment?action=ass&met=<?php echo @$adm->admission_id; ?>"
                                                        target="_blank"><i class="fas fa-eye mr-2"> </i>
                                                        Assessment</a>
                                                </span>
                                                <?php }  }?>
                                                <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Admission History") {?>
                                                <span id="historyid<?php echo $mk; ?>">
                                                    <a class="dropdown-item open_rightsidebar" href="#"
                                                        onclick="return Erpadmission_history(<?php echo $adm->admission_id; ?>);"><i
                                                            class="fas fa-eye mr-2"> </i>View
                                                        History</a>
                                                </span>
                                                <?php } }?>
                                                <a class="dropdown-item" href="#"><i class="fas fa-trash mr-2">
                                                    </i>Delete</a>
                                                <a class="dropdown-item" href="#" onclick="return pay(<?php echo $adm->admission_id; ?>);"><i class="fas fa-cart-plus mr-2">
                                                    </i>Pay</a>
                                            </div>
                                        </div>
                                        <div class="icon-set text-center">
                                            <a href="https://api.whatsapp.com/send?phone=91<?php echo $adm->mobile_no; ?>"
                                                target="_blank"><i class="fab fa-whatsapp"></i></a>
                                            <a href="tel:<?php echo $adm->mobile_no; ?>"><i
                                                    class="material-icons mb-0">phone</i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php $mk++;
       }
       ?>
        </div>
        <?php
     } else { echo "Oops! There is No Record"; } ?>
    </div>
    <div class="extra_sidebar-menu">
        <div class="sidebar-panel pullDown">
            <button class="close-sidebar-left">X</button>
            <div class="rsidebar-items send-mail send-email-details">
                <div class="rsidebar-title">
                    <h3 class="mb-0">Send Email To <span id="studentnameforemail"></span></h3>
                </div>
                <input type="hidden" name="email_recepient_id" id="email_recepient_id">
                <div class="rsidebar-middle">
                    <div id="mail_send_msg"></div>
                    <div class="pretty p-default p-round p-thick">
                        <input type="checkbox" name="email_id_send" id="primary_email" checked>
                        <div class="state p-primary-o">
                            <label>Primary Email</label>
                        </div>
                    </div>
                    <div class="pretty p-default p-round p-thick">
                        <input type="checkbox" name="father_email" id="father_email">
                        <div class="state p-primary-o">
                            <label>Father's Email</label>
                        </div>
                    </div>
                    <div class="pretty p-default p-round p-thick">
                        <input type="checkbox" name="email_id_send" id="guardian_email">
                        <div class="state p-primary-o">
                            <label>Guardian's Email</label>
                        </div>
                    </div>
                    <div class="pretty p-default p-round p-thick">
                        <input type="checkbox" name="father_email" class="" id="alternate_email">
                        <div class="state p-primary-o">
                            <label>Alternate Email</label>
                        </div>
                    </div>
                    <div class="rs-mail-temp mt-4">
                        <h6>Select Email Template*</h6>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="email_template" onchange="return get_email_template();">
                            <option value="">Select Email Template</option>
                            <?php foreach ($list_email_template as $lt) { ?>
                            <option value="<?php echo $lt->id; ?>">
                                <?php echo $lt->category; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Subject*</label>
                        <textarea class="form-control" name="email_subject" id="email_subject"></textarea>
                    </div>
                    <div class="rs-btn">
                        <a href="#" class="btn btn-light text-dark">Cancel</a>
                        <input type="submit" class="btn btn-primary text-white" id="send_email_forstudent" name="submit"
                            value="Submit">
                    </div>
                </div>
            </div>
            <div class="rsidebar-items send-sms send-sms-details">
                <div class="rsidebar-title">
                    <h3 class="mb-0">Send Sms To <span id="stu_name"></span></h3>
                </div>
                <div class="rsidebar-middle">
                    <div id="sms_send_msg"></div>
                    <div class="pretty p-default p-round p-thick">
                        <input type="checkbox" name="primary_sms" id="primary_sms" checked>
                        <div class="state p-primary-o">
                            <label>Primary Sms</label>
                        </div>
                    </div>
                    <div class="pretty p-default p-round p-thick">
                        <input type="checkbox" name="father_sms" id="father_sms">
                        <div class="state p-primary-o">
                            <label>Father's Sms</label>
                        </div>
                    </div>
                    <div class="pretty p-default p-round p-thick">
                        <input type="checkbox" name="guardian_sms" id="guardian_sms">
                        <div class="state p-primary-o">
                            <label>Guardian's Sms</label>
                        </div>
                    </div>
                    <div class="pretty p-default p-round p-thick">
                        <input type="checkbox" name="alernate_sms" class="" id="alternate_sms">
                        <div class="state p-primary-o">
                            <label>Alternate Sms</label>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" name="sms_recepient_id" id="sms_recepient_id">
                    <div class="rs-mail-temp mt-4">
                        <h6>Select SMS Template*</h6>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="sms_template" id="sms_template"
                            onchange="return get_sms_template();">
                            <option value="">Select SMS Template</option>
                            <?php foreach ($sms_template_list as $lt) { ?>
                            <option value="<?php echo $lt->category; ?>">
                                <?php echo $lt->category; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>SMS Template</label>
                        <textarea class="form-control" id="sms_compose_Textarea" name="sms_compose_Textarea"></textarea>
                    </div>
                    <div class="rs-btn">
                        <a href="#" class="btn btn-light text-dark">Cancel</a>
                        <input type="submit" class="btn btn-primary text-white" id="send_sms_student" value="Submit">
                    </div>
                </div>
            </div>
            <div class="rsidebar-items send-sms edit-details">
                <div class="rsidebar-title">
                    <h3 class="mb-0">Basic Info <span class="float-right"><a
                                class="btn btn-sm btn-primary action-icon text-white" id="infoupd"
                                style="line-height: 18px;"><i class="fas fa-pencil-alt"></i></a></span>
                    </h3>
                </div>
                <div class="rsidebar-middle p-0">
                    <div class="rs-stu-detail">
                        <div class="rs-stu-item mb-1">
                            <p>Surname :</p><span id="show_surname"></span>
                        </div>
                        <div class="rs-stu-item mb-1">
                            <p>Name :</p><span id="show_first_name"></span>
                        </div>
                        <div class="rs-stu-item mb-1">
                            <p>Email :</p><span id="show_email"></span>
                        </div>
                        <div class="rs-stu-item mb-1">
                            <p>Mobile :</p><span id="show_mobile_no"></span>
                        </div>
                        <div class="rs-stu-item mb-1">
                            <p>Branch :</p><span id="show_branch_id"></span>
                        </div>
                        <div class="rs-stu-item mb-1">
                            <p>Father Mobile :</p><span id="show_father_mobile_no"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rsidebar-items send-sms basic-info-edit">
                <div class="rsidebar-title">
                    <h3 class="mb-0">Basic Info Edit <span class="float-right"><button class="btn btn-sm btn-primary"
                                id="infoshow" style="line-height: 18px;"><i class="fas fa-eye"></i></button></span>
                    </h3>
                </div>
                <div class="rsidebar-middle p-0">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-body pl-0 pr-0">
                                <div id="edit_basic_info_msg"></div>
                                <input type="hidden" class="form-control" id="basic_info_upd_id">
                                <div class="form-group">
                                    <label>Surname</label>
                                    <input type="text" class="form-control" id="edit_sname">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="edit_fname">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="edit_mail">
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control" id="edit_mobile">
                                </div>
                                <div class="form-group">
                                    <label>Brnach Name</label>
                                    <select class="form-control" id="edit_branch">
                                        <option value="">Select branch</option>
                                        <?php foreach ($list_branch as $ld) { ?>
                                        <option value="<?php echo $ld->branch_id; ?>">
                                            <?php echo $ld->branch_name; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Father Mobile</label>
                                    <input type="text" class="form-control" id="edit_father_mobile_no">
                                </div>
                                <button class="btn btn-sm btn-primary" id="basic_info_updates">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rsidebar-items send-sms branch-transfer">
                <div class="rsidebar-title">
                    <h3 class="mb-0">Branch Transfer</h3>
                </div>
                <div class="rsidebar-middle p-0 branch_data">

                </div>
            </div>

            <div class="rsidebar-items send-sms courses">
                <div class="rsidebar-title">
                    <h3 class="mb-0">Course Info</h3>
                </div>
                <div class="rsidebar-middle p-0 courses_data">

                </div>
            </div>

            <div class="rsidebar-items send-sms pay-details">
                <div class="rsidebar-title">
                    <h3 class="mb-0">Payment Details</h3>
                </div>
                <div class="rsidebar-middle payment_data">

                </div>
            </div>

            <div class="rsidebar-items send-sms admission-cancellation">
                <div class="rsidebar-title">
                    <h3 class="mb-0">Cancellation Admission</h3>
                </div>
                <div class="rsidebar-middle p-0 cancalletion_admission_data">

                </div>
            </div>

            <div class="rsidebar-items send-sms admission-terminated">
                <div class="rsidebar-title">
                    <h3 class="mb-0">Terminated Admission</h3>
                </div>
                <div class="rsidebar-middle p-0 terminated_admission_data">

                </div>
            </div>

            <div class="rsidebar-items send-sms admission-hold">
                <div class="rsidebar-title">
                    <h3 class="mb-0">Hold Admission</h3>
                </div>
                <div class="rsidebar-middle p-0 hold_admission_data">

                </div>
            </div>

            <div class="rsidebar-items send-sms admission-hold-over">
                <div class="rsidebar-title">
                    <h3 class="mb-0">Hold Admission Over</h3>
                </div>
                <div class="rsidebar-middle p-0 hold_over_data">

                </div>
            </div>

            <div class="rsidebar-items send-sms admission-history">
                <div class="rsidebar-title">
                    <h3 class="mb-0">Admission History</h3>
                </div>
                <div class="rsidebar-middle p-0 history">

                </div>
            </div>

            <div class="rsidebar-items send-sms admission-remraks">
                <div class="rsidebar-title">
                    <h3 class="mb-0">Remarks For Admission</h3>
                </div>
                <div class="rsidebar-middle p-0 remarks_data">

                </div>
            </div>
        </div>
    </div>
</div>

<!--  Course wise shiningsheets -->
<div class="modal fade shiningsheet erpshining-preview" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="myLargeModalLabel">Shining Sheet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="get_shiningsheet">

            </div>
        </div>
    </div>
</div>

<!-- upgrademodal -->
<div class="modal fade upgrademodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="myLargeModalLabel">Upgrade Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body course_upgrade_data">

            </div>
        </div>
    </div>
</div>

<!-- withoutfees modification course upgrade -->
<div class="modal fade withoutfeesmodification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Without Fees Modification Upgrade Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body without_feesco_data">

            </div>
        </div>
    </div>
</div>

<!-- Course As Completed -->
<div class="modal fade course_completed" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Course As Completed</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" name="remarks">
                    <div id="admission_course_msg"></div>
                    <div class="form-group">
                        <label>Batch Status</label>
                        <select class="form-control" id="admission_courses_status">
                            <option value="Completed" <?php echo "selected" ; ?>>Completed</option>
                            <!-- <option value="Ongoing">Ongoing</option>
               <option value="Pending">Pending</option>
               <option value="Hold">Hold</option>
               <option value="Not Assigned">Not Assigned</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Please enter reason for Course Completed:<span style="color:red">*</span></label>
                        <textarea class="form-control" placeholder="Enter Remarks" name="admission_remrak"
                            id="admission_remrak"></textarea>
                        <span style="color:red">Enter Remarks</span>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="" id="mark_course_as_completed" class="btn btn-primary"
                            value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Course As Completed -->
<div class="modal fade admission_completed" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Admission As Completed</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="admission_completed_msg"></div>
                <div class="form-group">
                    <label>Completed Date:<span style="color:red">*</span></label>
                    <input type="date" class="form-control" id="admission_completed_date">
                </div>
                <div class="form-group">
                    <label>Status:<span style="color:red">*</span></label>
                    <select class="form-control" name="remarks_status_id" id="remarks_status_id">
                        <option value="">Select</option>
                        <?php foreach ($list_dropdown_adm as $ad) { ?>
                        <option value="<?php echo $ad->d_adm_id; ?>">
                            <?php echo $ad->name; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Please enter reason for Admission Completed:<span style="color:red">*</span></label>
                    <textarea class="form-control" name="completed_remrak" id="completed_remrak"
                        placeholder="Enter Remarks"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="" id="mark_admission_completed" class="btn btn-primary" value="Submit">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- View All Remarks -->
<div class="modal fade all_remarks_view" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">All Remarks</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body show_all_admission_remraks">

            </div>
        </div>
    </div>
</div>

<!-- batch Assigned -->
<div class="modal fade" id="assigned_batch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assigned Batch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body batches_record">

            </div>
        </div>
    </div>
</div>


<!-- Tuition Fess -->
<div class="modal fade tuition_fees_modal" tabindex="-1" role="dialog" aria-labelledby="tuition_fees_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="tuition_fees_modal">Installments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body income-pay">
                
            </div>
        </div>
    </div>
</div>

<!-- payment installmet  -->
<div class="modal fade payment-lg" tabindex="-1" role="dialog" aria-labelledby="payment-lg" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="payment-lg">Intallment Payment</h5>
                <button type="button" class="close" data-dismiss="modal" data-toggle="modal" data-target=".payment-lg" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body paymeny_installment_data">

            </div>
        </div>
    </div>
</div>

<!-- Installment date change -->
<div class="modal fade insupddate" tabindex="-1" role="dialog" aria-labelledby="insupddate" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insupddate">Intallment Date</h5>
                <button type="button" class="close" data-dismiss="modal" data-toggle="modal" data-target=".insupddate" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body insdate_reco">

            </div>
        </div>
    </div>
</div>


<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/cleave.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js">
</script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js">
</script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js">
</script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script>

<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
<script
    src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js">
    </script>
<script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
<!-- JS Libraies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://unpkg.com/lightpick@latest/lightpick.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>

<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>

<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>


<!-- script for side bar conttent in Admission -->

<script>
    //   var date=new Date();
    // var datenew=date.getDate()+"/"+(date.getMonth()+1)+"/"+date.getFullYear();
    //console.log(val);
    //document.getElementById('cancellation_admission_dat').value = datenew;
    //         var picker = new Lightpick({
    //           field: document.getElementById('cancellation_admission_date'),
    //         onSelect: function(date){
    //         document.getElementById('result-1').innerHTML =  date.format('Do MMMM YYYY');

    //     }
    // });

    


    var picker = new Lightpick({
        field: document.getElementById('cancellation_admission_date'),
        onSelect: function (date) {
            document.getElementById('result-1').innerHTML = date.format('Do MMMM YYYY');
        }
    });
</script>
<script>
    $(document).ready(function () {
        //window Height
        $getheight = $(window).height();

        $navheight = $('.navbar-bg').height();
        $topheight = $('.extra_top-menu').height();
        $bredheight = $('.main-content > .row').height();

        $totalheight = $navheight + $topheight + $bredheight;

        $get_Height = $(window).height() - $totalheight - 55;
        $('.extra_lead_showM').css("height", $get_Height);
        //alert($get_Height);
    });
</script>
<script>
    $(".extra_lead_showM").niceScroll({
        cursorcolor: "#5864bd"
    });

</script>
<script>
    //Sidebar
    $(document).ready(function () {

        $(".open_rightsidebar").click(function () {
            $('body').addClass('sidebar-left');
            var $this = $(this);
            $(this).parents('.extra_lead_show').addClass('abc');
            //$(this).parents('.extra_lead_show').nextAll().find('.extra_lead_show').removeClass('abc');
        });
        $(".close-sidebar-left").click(function () {
            $('body').removeClass('sidebar-left');
            $('body').find('.extra_lead_show').removeClass('abc');

        });
    });

    $(document).ready(function () {
        $("#infoupd").click(function () {
            $(".edit-details").hide();
            $('.basic-info-edit').show();
        });

        $("#coinfoedit").click(function () {
            $(".edit-details").show();
            $('.basic-info-edit').hide();
        });
    });
</script>

<script>
    function erp_basic_details(admission_id) {
        // $('.abc').css("background-color", "red");
        $.ajax({
            url: "<?php echo base_url(); ?>Admission/get_adm_record",
            type: "post",
            data: {
                'admission_id': admission_id
            },
            success: function (res) {
                $('.edit-details').show();
                $('.branch-transfer').hide();
                $('.basic-info-edit').hide();
                $('.send-sms-details').hide();
                $('.send-email-details').hide();
                $('.courses').hide();
                $('.pay-details').hide();
                $('.admission-cancellation').hide();
                $('.admission-terminated').hide();
                $('.admission-hold').hide();
                $('.admission-hold-over').hide();
                $('.admission-remraks').hide();
                $('.admission-history').hide();

                var data = $.parseJSON(res);

                $('#basic_info_upd_id').val(data.record['adm_get_record'].admission_id);
                $('#show_surname').html(data.record['adm_get_record'].surname);
                $('#show_first_name').html(data.record['adm_get_record'].first_name);
                $('#show_email').html(data.record['adm_get_record'].email);
                $('#show_mobile_no').html(data.record['adm_get_record'].mobile_no);
                $('#show_branch_id').html(data.record['adm_get_record'].branch_name);
                $('#show_father_mobile_no').html(data.record['adm_get_record'].father_mobile_no);


                $('#edit_sname').val(data.record['adm_get_record'].surname);
                $('#edit_fname').val(data.record['adm_get_record'].first_name);
                $('#edit_mail').val(data.record['adm_get_record'].email);
                $('#edit_mobile').val(data.record['adm_get_record'].mobile_no);
                $('#edit_branch').val(data.record['adm_get_record'].branch_id);
                $('#edit_father_mobile_no').val(data.record['adm_get_record'].father_mobile_no);
            }
        });
    }

    // Transfer Branch
    function transfer_branch(admission_id = '') {
        $('body').addClass('sidebar-left');
        $('.edit-details').hide();
        $('.branch-transfer').show();
        $('.basic-info-edit').hide();
        $('.send-sms-details').hide();
        $('.send-email-details').hide();
        $('.courses').hide();
        $('.pay-details').hide();
        $('.admission-cancellation').hide();
        $('.admission-terminated').hide();
        $('.admission-hold').hide();
        $('.admission-hold-over').hide();
        $('.admission-remraks').hide();
        $('.admission-history').hide();

        $.ajax({
            url: "<?php echo base_url(); ?>Admission/ErpAdmision_BranchTransfer",
            type: "post",
            data: {
                'admission_id': admission_id
            },
            success: function (Resp) {
                $('.branch_data').html(Resp);
            }
        });
    }

    // basic infomation section update details
    $('#basic_info_updates').on('click', function () {

        var basic_info_upd_id = $('#basic_info_upd_id').val();
        var surname = $('#edit_sname').val();
        var first_name = $('#edit_fname').val();
        var email = $('#edit_mail').val();
        var mobile_no = $('#edit_mobile').val();
        var branch_id = $('#edit_branch').val();
        var father_mobile_no = $('#edit_father_mobile_no').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Admission/upd_admission_basic",
            data: {
                'admission_id': basic_info_upd_id,
                'first_name': first_name,
                'surname': surname,
                'email': email,
                'mobile_no': mobile_no,
                'branch_id': branch_id,
                'father_mobile_no' : father_mobile_no
            },
            success: function (resp) {
                alert('Are You Sure This Details Updated');
                var data = $.parseJSON(resp);
                var ddd = data['all_record'].status;
                if (ddd == '1') {
                    $('#edit_basic_info_msg').html(iziToast.success({
                        title: 'Success',
                        timeout: 2500,
                        message: 'Successfully Updated Detaild',
                        position: 'topRight'
                    }));
                    setTimeout(function () {
                        location.reload();
                    }, 2520);

                } else if (ddd == '2') {
                    $('#edit_basic_info_msg').html(iziToast.error({
                        title: 'Canceled!',
                        timeout: 2500,
                        message: 'Someting Wrong!!',
                        position: 'topRight'
                    }));
                    setTimeout(function () {
                        location.reload();
                    }, 2520);
                }
            }
        });
        return false;
    });

    // send email section 
    function show_email_template(admission_id) {

        $.ajax({
            url: "<?php echo base_url(); ?>Admission/get_admission_email_record",
            type: "post",
            data: {
                'admission_id': admission_id
            },
            success: function (res) {
                $('.edit-details').hide();
                $('.branch-transfer').hide();
                $('.basic-info-edit').hide();
                $('.send-sms-details').hide();
                $('.send-email-details').show();
                $('.courses').hide();
                $('.pay-details').hide();
                $('.admission-cancellation').hide();
                $('.admission-terminated').hide();
                $('.admission-hold').hide();
                $('.admission-hold-over').hide();
                $('.admission-remraks').hide();
                $('.admission-history').hide();

                var data = $.parseJSON(res);

                $('#studentnameforemail').html(data.record['adm_get_record'].first_name);
                $('#primary_email').val(data.record['adm_get_record'].email);
                $('#email_recepient_id').val(data.record['adm_get_record'].admission_id);
            }
        });
    }

    function get_email_template() {
        var id = $('#email_template').val();

        $.ajax({
            url: "<?php echo base_url(); ?>Admission/get_email_template_record",
            type: "post",
            data: {
                'template_id': id
            },
            beforeSend: function () {
                // tinymce.remove('#email_compose_Textarea');

            },
            success: function (res) {
                var data = $.parseJSON(res);
                $('#email_subject').val(data.reco['record'].category);
            }
        });
    }

    $('#send_email_forstudent').on('click', function () {
        var email = $('#primary_email').val();
        var email_subject = $('#email_subject').val();
        var email_recepient_id = $('#email_recepient_id').val();
        var message = $('#email_subject').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Admission/send_email",
            data: {
                'email': email,
                'subject': email_subject,
                'message': message,
                'admission_id': email_recepient_id
            },
            success: function (resp) {
                var data = $.parseJSON(resp);
                var ddd = data['all_record'].status;
                if (ddd == '1') {
                    $('#mail_send_msg').html(iziToast.success({
                        title: 'Success',
                        timeout: 2500,
                        message: 'Successfully Send Mail!',
                        position: 'topRight'
                    }));
                    setTimeout(function () {
                        location.reload();
                    }, 2520);
                } else if (ddd == '2') {
                    $('#mail_send_msg').html(iziToast.error({
                        title: 'Canceled!',
                        timeout: 2500,
                        message: 'Someting Wrong!!',
                        position: 'topRight'
                    }));
                    setTimeout(function () {
                        location.reload();
                    }, 2520);
                }
            }
        });
        return false;
    });

    // send Sms Student
    function get_sms_template_record(match_admission_id = '') {
        $('.edit-details').hide();
        $('.branch-transfer').hide();
        $('.basic-info-edit').hide();
        $('.send-sms-details').show();
        $('.send-email-details').hide();
        $('.courses').hide();
        $('.pay-details').hide();
        $('.admission-cancellation').hide();
        $('.admission-terminated').hide();
        $('.admission-hold').hide();
        $('.admission-hold-over').hide();
        $('.admission-remraks').hide();
        $('.admission-history').hide();
        $.ajax({
            url: "<?php echo base_url(); ?>Admission/get_admission_sms_record",
            type: "POST",
            data: {
                'admission_id': match_admission_id
            },
            success: function (respo) {
                var data = $.parseJSON(respo);

                $('#sms_recepient_id').val(data.record['adm_get_record'].admission_id);
                $('#primary_sms').val(data.record['adm_get_record'].mobile_no);
                $('#stu_name').html(data.record['adm_get_record'].first_name);
            }
        });
    }

    function get_sms_template() {
        var sms_template_id = $('#sms_template').val();

        $.ajax({
            url: "<?php echo base_url(); ?>Admission/get_sms_template_record",
            type: "post",
            data: {
                'sms_template_id': sms_template_id
            },
            success: function (response) {
                var data = $.parseJSON(response);
                $('#sms_compose_Textarea').val(data.reco['records'].sms_template);
            }
        });
    }

    $('#send_sms_student').on('click', function () {
        var primary_sms = $('#primary_sms').val();
        var sms_recepient_id = $('#sms_recepient_id').val();
        var sms_template = $('#sms_template').val();
        var sms_textarea = $('#sms_compose_Textarea').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Admission/send_sms_record",
            data: {
                'primary_sms': primary_sms,
                'sms_recepient_id': sms_recepient_id,
                'sms_template': sms_template,
                'sms_textarea': sms_textarea
            },
            success: function (resp) {
                var data = $.parseJSON(resp);
                var ddd = data['all_record'].status;
                if (ddd == '1') {
                    $('#sms_send_msg').html(iziToast.success({
                        title: 'Success',
                        timeout: 2500,
                        message: 'Successfully Send Sms!',
                        position: 'topRight'
                    }));
                    //   setTimeout(function() {
                    //       location.reload();
                    //   }, 2520);
                } else if (ddd == '2') {
                    $('#sms_send_msg').html(iziToast.error({
                        title: 'Canceled!',
                        timeout: 2500,
                        message: 'Someting Wrong!!',
                        position: 'topRight'
                    }));
                    setTimeout(function () {
                        location.reload();
                    }, 2520);
                }
            }
        });
        return false;
    });

    // show course or packages
    function courses_orpackages(admission_id = '') {
        $('.edit-details').hide();
        $('.branch-transfer').hide();
        $('.basic-info-edit').hide();
        $('.send-sms-details').hide();
        $('.send-email-details').hide();
        $('.courses').show();
        $('.edit-co-info').hide();
        $('.pay-details').hide();
        $('.admission-cancellation').hide();
        $('.admission-terminated').hide();
        $('.admission-hold').hide();
        $('.admission-hold-over').hide();
        $('.admission-remraks').hide();
        $('.admission-history').hide();

        $.ajax({
            url: "<?php echo base_url(); ?>Admission/erpadmisson_show_courses",
            type: "post",
            data: {
                'admission_id': admission_id
            },
            success: function (Resp) {
                $('.courses_data').html(Resp);
            }
        });
    }

    // Admission Cancalletion
    function Cancellation_admission(admission_id = '') {
        // alert(admission_id);
        $('body').addClass('sidebar-left');
        $('.edit-details').hide();
        $('.branch-transfer').hide();
        $('.basic-info-edit').hide();
        $('.send-sms-details').hide();
        $('.courses').hide();
        $('.pay-details').hide();
        $('.send-email-details').hide();
        $('.admission-terminated').hide();
        $('.admission-hold').hide();
        $('.admission-hold-over').hide();
        $('.admission-remraks').hide();
        $('.admission-history').hide();
        $('.admission-cancellation').show();

        $.ajax({
            url: "<?php echo base_url(); ?>Admission/ErpCancellation_Admission",
            type: "post",
            data: {
                'admission_id': admission_id
            },
            success: function (Resp) {
                // alert("Test");
                $('.cancalletion_admission_data').html(Resp);
            }
        });
    }

    // Terminated Admission
    function admission_terminated(admission_id = '') {
        $('body').addClass('sidebar-left');
        $('.edit-details').hide();
        $('.branch-transfer').hide();
        $('.basic-info-edit').hide();
        $('.send-sms-details').hide();
        $('.send-email-details').hide();
        $('.courses').hide();
        $('.pay-details').hide();
        $('.admission-cancellation').hide();
        $('.admission-terminated').show();
        $('.admission-hold').hide();
        $('.admission-hold-over').hide();
        $('.admission-remraks').hide();
        $('.admission-history').hide();

        $.ajax({
            url: "<?php echo base_url(); ?>Admission/ErpTerminated_Admission",
            type: "post",
            data: {
                'admission_id': admission_id
            },
            success: function (Resp) {
                $('.terminated_admission_data').html(Resp);
            }
        });
    }

    // Hold Admision
    function hold_admission(admission_id = '') {
        $('body').addClass('sidebar-left');
        $('.edit-details').hide();
        $('.branch-transfer').hide();
        $('.basic-info-edit').hide();
        $('.send-sms-details').hide();
        $('.send-email-details').hide();
        $('.courses').hide();
        $('.pay-details').hide();
        $('.admission-cancellation').hide();
        $('.admission-terminated').hide();
        $('.admission-hold').show();
        $('.admission-hold-over').hide();
        $('.admission-remraks').hide();
        $('.admission-history').hide();

        $.ajax({
            url: "<?php echo base_url(); ?>Admission/ErpHold_Admission",
            type: "post",
            data: {
                'admission_id': admission_id
            },
            success: function (Resp) {
                $('.hold_admission_data').html(Resp);
            }

        });

    }

    // Hold Over
    function hold_admission_over(admission_id = '') {
        $('body').addClass('sidebar-left');
        $('.edit-details').hide();
        $('.branch-transfer').hide();
        $('.basic-info-edit').hide();
        $('.send-sms-details').hide();
        $('.send-email-details').hide();
        $('.courses').hide();
        $('.pay-details').hide();
        $('.admission-cancellation').hide();
        $('.admission-terminated').hide();
        $('.admission-hold').hide();
        $('.admission-hold-over').show();
        $('.admission-remraks').hide();
        $('.admission-history').hide();

        $.ajax({
            url: "<?php echo base_url(); ?>Admission/ErpHold_Over",
            type: "post",
            data: {
                'admission_id': admission_id
            },
            success: function (Resp) {
                $('.hold_over_data').html(Resp);
            }
        });
    }
    $('.close').click(function () {
        $('.upgrademodal').removeClass('show');
        $('.upgrademodal').css('display', 'none');
        $('.withoutfeesmodification').css('display', 'none');
        $('.modal-backdrop').removeClass();
        $('.withoutfeesmodification').removeClass('show');
        $('body').removeClass('modal-open');
    })
    // Upgrade Admission
    function upgrade_courses(admission_id = '') {
        // alert(admission_id);
        $.ajax({
            url: "<?php echo base_url(); ?>Admission/ErpUpgradeCourse",
            type: "post",
            data: {
                'admission_id': admission_id
            },
            success: function (Resp) {

                $('body').addClass('modal-open');
                $('.upgrademodal').addClass('show');
                $('.upgrademodal').css('display', 'block');
                $('.course_upgrade_data').html(Resp);
                $('.Cheque-Hidden').hide();
                $('.Dd-Hidden').hide();
                $('.Cradit-Card').hide();
                $('.Debit-Card').hide();
                $('.Online-Payment').hide();
                $('.NEFT-IMPS').hide();
                $('.Paytm').hide();
                $('.Bank-Deposit').hide();
                $('.Capital-Float').hide();
                $('.Google-Pay').hide();
                $('.Phone-Pay').hide();
                $('.Bajaj-Finserv').hide();
                $('.Bhim-UPI').hide();
                $('.Insta-mojo').hide();
                $('.Pay-pal').hide();
                $('.Razor-pay').hide();
            }
        });
    }

    // Admission Without Modification Course Upgrade
    function withoutfeesmodification_courseupgrade(admission_id = '') {
        $('body').addClass('modal-open');
        $('.withoutfeesmodification').addClass('show');
        $('.withoutfeesmodification').css('display', 'block');
        $.ajax({
            url: "<?php echo base_url(); ?>Admission/WithoutFees_ModifiedCourse",
            type: "post",
            data: {
                'admission_id': admission_id
            },
            success: function (Resp) {


                $('.without_feesco_data').html(Resp);
            }
        });
    }

    function pay(admission_id = ''){
        $(".tuition_fees_modal").modal('show');
        $.ajax({
            url: "<?php echo base_url(); ?>Admission/ErpPay",
            type: "post",
            data: {
                'admission_id': admission_id
            },
            success: function (Resp) {
                $('.income-pay').html(Resp);
            }
        });
    }

    // payment Intallmet Admission
    function admission_payment(admission_id = '') {
        $('body').addClass('sidebar-left');
        $('.edit-details').hide();
        $('.branch-transfer').hide();
        $('.basic-info-edit').hide();
        $('.send-sms-details').hide();
        $('.send-email-details').hide();
        $('.courses').hide();
        $('.pay-details').show();
        $('.admission-cancellation').hide();
        $('.admission-terminated').hide();
        $('.admission-hold').hide();
        $('.admission-hold-over').hide();
        $('.admission-remraks').hide();
        $('.admission-history').hide();

        $.ajax({
            url: "<?php echo base_url(); ?>Admission/Erppayment_Admisison",
            type: "post",
            data: {
                'admission_id': admission_id
            },
            success: function (Resp) {
                $('.payment_data').html(Resp);
            }
        });
    }

    // History Admission
    function Erpadmission_history(admission_id = '') {
        $('body').addClass('sidebar-left');
        $('.edit-details').hide();
        $('.branch-transfer').hide();
        $('.basic-info-edit').hide();
        $('.send-sms-details').hide();
        $('.send-email-details').hide();
        $('.courses').hide();
        $('.pay-details').hide();
        $('.admission-cancellation').hide();
        $('.admission-terminated').hide();
        $('.admission-hold').hide();
        $('.admission-hold-over').hide();
        $('.admission-remraks').hide();
        $('.admission-history').show();

        $.ajax({
            url: "<?php echo base_url(); ?>Admission/Erpadmission_history",
            type: "post",
            data: {
                'admission_id': admission_id
            },
            success: function (Resp) {
                $('.history').html(Resp);
            }
        });
    }

    //Multiple Course Admission
    function getAdmissionData(fornumberData) {
        var dd = "multic" + fornumberData;
        var multic = $('#' + dd).val();
        //alert(multic);
        $.ajax({
            url: "<?php echo base_url(); ?>Admission/get_multiple_admission_data",
            method: "POST",
            data: {
                'multic': multic
            },
            success: function (res) {
                var data = $.parseJSON(res);

                //console.log(data);
                var ah = data.record['adm_get_record'].admission_id;
                var admissionhold_Id = "ah_id" + fornumberData;
                $('#' + admissionhold_Id).html(
                    '<a class="dropdown-item open_rightsidebar" href="#" onclick="return hold_admission(' +
                    ah + ');"><i class="fas fa-hand-paper mr-2"> Hold Admission</i></a>');

                var ho = data.record['adm_get_record'].admission_id;
                var admiid_ho = "ho_id" + fornumberData;
                $('#' + admiid_ho).html(
                    '<a class="dropdown-item open_rightsidebar" href="#" onclick="return hold_admission_over(' +
                    ho + ');"><i class="fab fa-cc-discover mr-2">Hold Over</i></a>');

                var upco = data.record['adm_get_record'].admission_id;
                var upcoda = "up_course_id" + fornumberData;
                $('#' + upcoda).html(
                    '<a class="dropdown-item" href="#" onclick="return upgrade_courses(' +
                    upco + ');" ata-toggle="modal" data-target=".upgrademodal"><i class="fab fa-cc-discover mr-2">Upgrade Course</i></a>');

                var withotfee = data.record['adm_get_record'].admission_id;
                var withoutfeesid = "without_feesid" + fornumberData;
                $('#' + withoutfeesid).html(
                    '<a class="dropdown-item" href="#" onclick="return withoutfeesmodification_courseupgrade(' +
                    withotfee + ');" ata-toggle="modal" data-target=".withoutfeesmodification"><i class="fab fa-cc-discover mr-2">Without Fees Modification</i></a>');

                var assesment = data.record['adm_get_record'].admission_id;
                var assementids = "asmentid" + fornumberData;
                $('#' + assementids).html(
                    '<a class="dropdown-item" href="<?php echo base_url(); ?>Admission/erpassestment?action=ass&met=' + assesment + '" target="_blank"><i class="fas fa-eye mr-2">Assessment</i></a>');

                var admidcard = data.record['adm_get_record'].admission_id;
                var idcards = "idcard" + fornumberData;
                $('#' + idcards).html(
                    '<a href="<?php echo base_url(); ?>Admission/erpprintidcard/' + admidcard + '" target="_blank" class="btn btn-warning text-white mb-2 btn-sm">Print ID card</a>');

                var at = data.record['adm_get_record'].admission_id;
                var admitId = "at_id" + fornumberData;
                $('#' + admitId).html(
                    '<a class="dropdown-item open_rightsidebar" href="#" onclick="return admission_terminated(' +
                    at + ');"><i class="fas fa-hand-rock"> <b>Mark Terminated</b></i></a>');

                var ac = data.record['adm_get_record'].admission_id;
                var admicId = "ac_id" + fornumberData;
                $('#' + admicId).html(
                    '<a class="dropdown-item open_rightsidebar" href="#" onclick="return Cancellation_admission(' + ac + ');"><i class="far fa-trash-alt"> <b>Canceled Admission</b></i></a>');

                var historyids = data.record['adm_get_record'].admission_id;
                var ahistory = "historyid" + fornumberData;
                $('#' + ahistory).html(
                    '<a class="dropdown-item open_rightsidebar" href="#" onclick="return Erpadmission_history(' +
                    historyids + ');"><i class="as fa-eye mr-2"> <b>View History</b></i></a>');

                var b = data.record['adm_get_record'].branch_name;
                var ta = data.record['adm_get_record'].admission_id;
                var branchId = "b_id" + fornumberData;
                $('#' + branchId).html('<p class="open_rightsidebar" onclick="return transfer_branch(' + ta + ');">' + b + '</p>');

                var d = data.record['adm_get_record'].department_name;
                var departmentId = "d_id" + fornumberData;
                $('#' + departmentId).html(d);

                var typ = data.record['adm_get_record'].type;
                if (typ == 'single') {
                    var c = data.record['adm_get_record'].course_name;
                    var a = data.record['adm_get_record'].admission_id;
                    var courseId = "c_id" + fornumberData;
                    $('#' + courseId).html('<p class="open_rightsidebar" onclick="return courses_orpackages(' +
                        a + ');">' + "S : " + c + '</p>');
                } else if (typ == 'package') {
                    var c = data.record['adm_get_record'].package_name;
                    var a = data.record['adm_get_record'].admission_id;
                    var courseId = "c_id" + fornumberData;
                    $('#' + courseId).html('<p class="open_rightsidebar" onclick="return courses_orpackages(' +
                        a + ');">' + "P : " + c + '</p>');
                } else {
                    var c = data.record['adm_get_record'].college_course_name;
                    var a = data.record['adm_get_record'].admission_id;
                    var courseId = "c_id" + fornumberData;
                    $('#' + courseId).html('<p class="open_rightsidebar" onclick="return courses_orpackages(' +
                        a + ');">' + "Clg : " + c + '</p>');
                }

                if (typ != 'COLLEGE') {
                    var rf = data.record['adm_get_record'].admission_status;
                    var rfId = "rf_id" + fornumberData;
                    $('#' + rfId).html(rf);

                    var tf = data.record['adm_get_record'].tuation_fees;
                    var a_Id = data.record['adm_get_record'].admission_id;
                    var tfId = "tf_id" + fornumberData;
                    $('#' + tfId).html('<p class="open_rightsidebar" onclick="return admission_payment(' + a_Id +
                        ');">' + tf + '</p>');
                } else {
                    var rf = data.record['adm_get_record'].admission_status;
                    var rfId = "rf_id" + fornumberData;
                    $('#' + rfId).html(rf);

                    var tf = data.record['adm_get_record'].college_tuition_fees;
                    var a_Id = data.record['adm_get_record'].admission_id;
                    var tfId = "tf_id" + fornumberData;
                    $('#' + tfId).html('<p class="open_rightsidebar" onclick="return admission_payment(' + a_Id +
                        ');">' + tf + '</p>');
                }

                var y = data.record['adm_get_record'].year;
                var tot_amt_paid = data.record['adm_get_record'].total_paid_amount;
                // alert(tot_amt_paid);

                $('#tot_pai_amo_data' + fornumberData).html("<button class='btn btn-sm btn-red'>" + tot_amt_paid + "</button>");

                var yearId = "year_id" + fornumberData;
                $('#' + yearId).html(y);

                var enrollno = data.record['adm_get_record'].enrollment_number;
                var enrollmentno = "enrollment_ids" + fornumberData;
                $('#' + enrollmentno).html(enrollno);

                var adDate = data.record['adm_get_record'].admission_date;
                var adtime = data.record['adm_get_record'].admission_time;
                var admDateId = "date_id" + fornumberData;
                $('#' + admDateId).html(adDate + " " + adtime);
                // var adDate = new Date();
                // var dd = adDate.getDate();
                // var mm = adDate.getMonth() + 1;
                // var yyyy = adDate.getFullYear();
                // var dateforadm = dd + '/' + mm + '/' + yyyy;

                var admremark = data.record['adm_get_record'].admission_id;
                var admission_remarks = "admi_remarks_id" + fornumberData;
                $('#' + admission_remarks).html(
                    '<p class="open_rightsidebar" onclick="return admission_remarks(' + admremark +
                    ');">Add Remark</p>');
            }
        });
    }

    $('#mark_course_as_completed').on('click', function () {

        var admission_courses = [];

        $('input[name=admission_courses]:checked').map(function () {
            admission_courses.push($(this).val());
        });
        var admission_remrak = $('#admission_remrak').val();
        var admission_courses_status = $('#admission_courses_status').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Admission/ErpCourse_completed",
            data: {

                'admission_courses_id': admission_courses,
                'admission_courses_status': admission_courses_status,
                'admission_remrak': admission_remrak
            },

            success: function (resp) {
                var data = $.parseJSON(resp);
                var ddd = data['all_record'].status;
                if (ddd == '1') {
                    $('#admission_course_msg').html(iziToast.success({
                        title: 'Success',
                        timeout: 2500,
                        message: 'HI! Your Course Is Now Completed.',
                        position: 'topRight'
                    }));

                    setTimeout(function () {
                        location.reload();
                    }, 2520);
                } else {
                    $('#admission_course_msg').html(iziToast.error({
                        title: 'Canceled!',
                        timeout: 2500,
                        message: 'Someting Wrong!!',
                        position: 'topRight'
                    }));

                    setTimeout(function () {
                        location.reload();
                    }, 2520);
                }
            }
        });
        return false;
    });

    $('#mark_admission_completed').on('click', function () {
        var admission_ids = $('#admission_ids').val();
        var admission_completed_date = $('#admission_completed_date').val();
        var remarks_status_id = $('#remarks_status_id').val();
        var admission_remrak = $('#completed_remrak').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Admission/ErpAdmission_completed",
            data: {

                'admission_id': admission_ids,
                'admission_completed_date': admission_completed_date,
                'remarks_status_id': remarks_status_id,
                'admission_remrak': admission_remrak
            },

            success: function (resp) {
                var data = $.parseJSON(resp);
                var ddd = data['all_record'].status;
                if (ddd == '1') {
                    $('#admission_completed_msg').html(iziToast.success({
                        title: 'Success',
                        timeout: 2500,
                        message: 'HI! Your Admission Is Now Completed.',
                        position: 'topRight'
                    }));

                    setTimeout(function () {
                        location.reload();
                    }, 2520);
                } else {
                    $('#admission_completed_msg').html(iziToast.error({
                        title: 'Canceled!',
                        timeout: 2500,
                        message: 'Someting Wrong!!',
                        position: 'topRight'
                    }));

                    setTimeout(function () {
                        location.reload();
                    }, 2520);
                }
            }
        });
        return false;
    });

    // Admission Remrks
    function admission_remarks(admission_id = '') {
        $('.edit-details').hide();
        $('.branch-transfer').hide();
        $('.basic-info-edit').hide();
        $('.send-sms-details').hide();
        $('.send-email-details').hide();
        $('.courses').hide();
        $('.pay-details').hide();
        $('.admission-cancellation').hide();
        $('.admission-terminated').hide();
        $('.admission-hold').hide();
        $('.admission-hold-over').hide();
        $('.admission-remraks').show();
        $('.admission-history').hide();

        $.ajax({
            url: "<?php echo base_url(); ?>Admission/Erpadmission_remarks",
            type: "post",
            data: {
                'admission_id': admission_id
            },
            success: function (Resp) {
                $('.remarks_data').html(Resp);
            }
        });
    }
    // view all remarks for admission

    function view_all_remraks(admission_id = '') {
        $.ajax({
            url: "<?php echo base_url(); ?>Admission/view_all_remrks_for_id_wise",
            type: "post",
            data: {
                'admission_id': admission_id
            },
            success: function (Resp) {
                $('.show_all_admission_remraks').html(Resp);
            }
        });
    }
</script>
<script>
    function batch_notification(admission_courses_id = '') {
        $.ajax({
            url: "<?php echo base_url(); ?>welcome/batchnotification_status",
            type: "post",
            data: {
                'admission_courses_id': admission_courses_id
            },
            success: function (Resp) {

                setTimeout(function () {
                    location.reload();
                }, 500);
            }
        });
    }
</script>
<script>
    $('.select_course_package').hide();
    $('.select_course_clg').hide();
    function hidden_type() {
        var co_pa_clg = $("input[name='type']:checked").val();
        //alert(course_package);
        if (co_pa_clg == 'single') {
            $('.select_course_single').show();
            $('.select_course_package').hide();
            $('.select_course_clg').hide();
        } else if (co_pa_clg == 'package') {
            $('.select_course_package').show();
            $('.select_course_single').hide();
            $('.select_course_clg').hide();
        } else {
            $('.select_course_clg').show();
            $('.select_course_single').hide();
            $('.select_course_package').hide();
        }

    }
</script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript">
    $(function () {
        var start1 = moment().subtract(1, 'days');
        var end1 = moment();
        var start = ""
        var end = ""

        function cb(start, end) {
            $('#fromdate').val(start.format('YYYY-MM-DD'));
            $('#todate').val(end.format('YYYY-MM-DD'));
            $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
        }

        $('#reportrange').daterangepicker({
            startDate: start1,
            endDate: end1,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);

    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        $(function () {
            $("form[name='registration']").validate({
                rules: {
                    admission_remrak: {
                        required: true
                    },

                },
                messages: {
                    admission_remrak: {
                        required: "<span style='color:red; float:left'>Enter remarks!!</span>"
                    }
                },
                submitHandler: function (mark_course_as_completed) {
                    mark_course_as_completed.submit();
                }
            });
        });
    });
</script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>