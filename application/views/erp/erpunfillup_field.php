<?php  $all_per = explode(',',$_SESSION['p_permission']);  ?>
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
<link rel="stylesheet" type="text/css" href="https://unpkg.com/lightpick@latest/css/lightpick.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<style type="text/css">
    .col {
        color: red;
    }

    .upd_installment .modal-dialog.modal-lg {
        max-width: 900px;
    }

    .upd_doc .modal-dialog.modal-lg {
        max-width: 900px;
    }
</style>
<div class="main-content addmision_datails">
    <div id="unfill_doc_msg"></div>
    <div class="extra_lead_menu" id="fillupsearch">
    	<div class="row">
        <div class="col-12 d-flex justify-content-between">
            <h6 class="page-title text-dark mb-3">Students Admission Detail</h6>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active open_rightsidebar" aria-current="page">Data</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex justify-content-end w-100 pr-3 pb-3">
            <div class="crm-search-menu">
                <input type="search" class="form-control" name="searching_form" id="searching_form"
                    placeholder="Search By Gr-Id">
                <i type="button" class="fa fa-search" aria-hidden="true"></i>
            </div>
            <a href="#" class="btn btn-sm btn-info text-white" data-toggle="modal" data-target=".bd-example-modal-lg">
                <span data-toggle="tooltip" data-placement="bottom" title="Filter"><i
                        class="fas fa-filter mr-1 text-white"></i></span>
            </a>
        </div>
    </div>
        <div class="extra_lead_show">
            <?php $cnt = 0;
         foreach ($Admission_record as $val) { ?>
            <div class="card card-primary <?php if ($val->admission_type == 'Quick') {
                                             echo 'quick_add';
                                          } else {
                                             echo " full_add"; } ?>">
                <div class="card-body">
                    <div class="add_row">
                        <div class="add_action">
                            <?php if ($val->admission_type == 'Quick') { ?>
                            <a class="bg-primary action-icon text-white btn-primary text-center" id="disableanchor"
                                href="<?php echo base_url(); ?>Admission/ErpUpdAdm_Data/<?php echo $val->admission_id; ?>"
                                target="_blank" onclick="clickAndDisable(this);"><i class="far fa-edit" ></i></a>
                            <?php } ?>
                        </div>
                        <div class="add_block">
                            <h3>Communication</h3>
                            <ul>
                                <li>
                                    <label>GrId :</label>
                                    <p>
                                        <?php if ($val->gr_id == "") {
                                    $cnt++;
                                    echo "<span class='col'>No Record</span>";
                                 } else {
                                    echo $val->gr_id;
                                 } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Email :</label>
                                    <p>
                                        <?php if ($val->email == "") {
                                    $cnt++;
                                    echo "<span class='col'>No Record</span>";
                                 } else {
                                    echo $val->email;
                                 } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Mobile No :</label>
                                    <p>
                                        <?php if ($val->mobile_no == "") {
                                    $cnt++;
                                    echo "<span class='col'>No Record</span>";
                                 } else {
                                    echo $val->mobile_no;
                                 } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Alternet No :</label>
                                    <p>
                                        <?php if ($val->alternate_mobile_no == "") {
                                        $cnt++;
                                        echo "<span class='edit' style='color:red'>No Record</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='alternate_mobile_no' id='nametxt_".$val->admission_id."' value='".$val->alternate_mobile_no."' >";

                                    } else {
                                        echo "<span class='edit' style='color:black'>".$val->alternate_mobile_no."</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='alternate_mobile_no' id='nametxt_".$val->admission_id."' value='".$val->alternate_mobile_no."' >";
                                    } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Source :</label>
                                    <p>
                                        <?php if ($val->source_id == "") {
                                    $cnt++;
                                    echo "<span class='col'>No Record</span>";
                                 } else {
                                    echo $val->source_id;
                                 } ?>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="add_block">
                            <h3>Personal Details</h3>
                            <ul>
                                <li>
                                    <label>Admission No :</label>
                                    <p>
                                        <?php if ($val->admission_number == "") {
                                    $cnt++;
                                    echo "<span class='col'>No Record</span>";
                                 } else {
                                    echo $val->admission_number;
                                 } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Enrollment No :</label>
                                    <p>
                                        <?php if ($val->enrollment_number == "") {
                                    $cnt++;
                                    echo "<span class='col'>No Record</span>";
                                 } else {
                                    echo $val->enrollment_number;
                                 } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Surname :</label>
                                    <p>
                                        <?php if ($val->surname == "") {
                                    $cnt++;
                                    echo "<span class='col'>No Record</span>";
                                 } else {
                                    echo $val->surname;
                                 } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Name :</label>
                                    <p>
                                        <?php if ($val->first_name == "") {
                                    $cnt++;
                                    echo "<span class='col'>No Record</span>";
                                 } else {
                                    echo $val->first_name;
                                 } ?>
                                    </p>
                                </li>

                                <li>
                                    <label>Admission Date :</label>
                                    <p>
                                        <?php if ($val->admission_date == "") {
                                    $cnt++;
                                    echo "<span class='col'>No Record</span>";
                                 } else {
                                     date_default_timezone_set("Asia/Calcutta"); echo date("d-M-Y", strtotime($val->admission_date));
                                 } ?>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="add_block">
                            <h3>Course & Fees
                                <?php if($val->type!="COLLEGE") { ?> <a
                                    href="<?php echo base_url(); ?>Admission/Updcofees/<?php echo $val->admission_id; ?>"
                                    class="text-primary" target="_blank"><i class="far fa-edit"
                                        style="font-weight: bold;"></i></a>
                                <?php } ?>
                            </h3>
                            <ul>
                                <li>
                                    <label>Branch Name :</label>
                                    <p>
                                        <?php if ($val->branch_id == "") {
                                    $cnt++;
                                    echo "<span class='col'>No Record</span>"; ?>
                                        <?php } else { ?>
                                        <?php foreach ($list_branch as $ld) {
                                       if ($val->branch_id == $ld->branch_id) {
                                          echo $ld->branch_name;
                                       }
                                    } ?>
                                        <?php } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Type :</label>
                                    <p>
                                        <?php if ($val->type == "") {
                                    $cnt++;
                                    echo "<span class='col'>No Record</span>";
                                 } else {
                                    echo $val->type;
                                 } ?>
                                    </p>
                                </li>

                                <li>
                                    <label>Course Name :</label>
                                    <p>
                                        <?php if ($val->type == "single") { ?>
                                        <?php if ($val->course_id == "") {
                                       $cnt++;
                                       echo "<span class='col'>No Record</span>"; ?>
                                        <?php } else { ?>
                                        <?php foreach ($list_course as $ld) {
                                          if ($val->course_id == $ld->course_id) {
                                             echo $ld->course_name;
                                          }
                                       } ?>
                                        <?php } ?>
                                        <?php } else if($val->type == "package"){ ?>
                                        <?php if ($val->package_id == "") {
                                       $cnt++;
                                       echo "<span class='col'>No Record</span>"; ?>
                                        <?php } else { ?>
                                        <?php foreach ($list_package as $ld) {
                                          if ($val->package_id == $ld->package_id) {
                                             echo $ld->package_name;
                                          }
                                       } ?>
                                        <?php }
                                 } else {
                                     $clgids = explode(",", $val->college_courses_id);
                                    foreach ($college_courses_all as $row) {
                                        if (in_array($row->college_courses_id, $clgids)) {
                                        echo $row->college_course_name;
                                        }
                                    }
                                  } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Tuition Fees :</label>
                                    <p>
                                        <?php if($val->type!="COLLEGE") { ?>
                                        <?php if($val->tuation_fees == "") {
                                    $cnt++;
                                    echo "<span class='col'>No Record</span>";
                                 } else {
                                    if(isset($val->tuation_fees)) {  echo $val->tuation_fees; }
                                 } ?>
                                        <?php } else { ?>
                                        <?php if ($val->college_tuition_fees == "") {
                                    $cnt++;
                                    echo "<span class='col'>No Record</span>";
                                 } else {
                                    if(isset($val->college_tuition_fees)) {  echo $val->college_tuition_fees; }
                                 } ?>
                                        <?php } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Status :</label>
                                    <p>
                                        <?php if ($val->admission_status == "") {
                                    $cnt++;
                                    echo "<span class='col'>No Record</span>";
                                 } else {
                                    if(isset($val->admission_status)) {  echo $val->admission_status; }
                                 } ?>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="add_block">
                            <h3>Postal Communication</h3>
                            <ul>
                                <li>
                                    <label>State :</label>
                                    <p>
                                        <?php if ($val->present_state_id == "") {
                                    $cnt++;
                                    // echo "<span class='col'>No Record</span>";
                                    echo "<span class='col edit'>No Record</span><select class='txtedit' data-id='".$val->admission_id."' data-field='present_state_id' id='nametxt_".$val->admission_id."'>
                                     <option value='gujarat'>Gujarat</option>
                                     <option value='Rajasthan'>Rajesthan</option>
                                     <option value='Maharast'>Maharast</option>
                                    </select>";
                                 } else {
                                    // echo $val->present_state_id;
                                    echo "<span class='edit'>".$val->present_state_id."</span><select class='txtedit' data-id='".$val->admission_id."' data-field='present_state_id' id='nametxt_".$val->admission_id."'>
                                     <option value='gujarat' <?php if($val->present_state_id == 'gujarat'){echo 'selected'} ?>
                                        >gujarat</option>
                                        <option value='Rajasthan' <?php if($val->present_state_id == 'uk'){echo
                                            'selected'} ?>>Rajasthan</option>
                                        <option value='Maharast' <?php if($val->present_state_id == 'canada'){echo
                                            'selected' } ?> >Maharast</option>
                                        </select>";
                                        } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>City :</label>
                                    <p>
                                        <?php if ($val->present_city_id == "") {
                                    $cnt++;
                                    // echo "<span class='col'>No Record</span>";
                                     echo "<span class='col edit'>No Record</span><select class='txtedit' data-id='".$val->admission_id."' data-field='present_city_id' id='nametxt_".$val->admission_id."'>
                                     <option value='surat'>Surat</option>
                                     <option value='vadodara'>Vadodara</option>
                                     <option value='navasari'>Navasari</option>
                                    </select>";
                                 } else {
                                    // echo $val->present_city_id;
                                    echo "<span class='edit'>".$val->present_city_id."</span><select class='txtedit' data-id='".$val->admission_id."' data-field='present_city_id' id='nametxt_".$val->admission_id."'>
                                     <option value='surat' <?php if($val->present_city_id == 'surat'){echo 'selected'} ?>
                                        >surat</option>
                                        <option value='vadodara' <?php if($val->present_city_id == 'vadodara'){echo
                                            'selected'} ?>>vadodara</option>
                                        <option value='navasari' <?php if($val->present_city_id == 'navasari'){echo
                                            'selected' } ?> >navasari</option>
                                        </select>";
                                        } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Area :</label>
                                    <p>
                                        <?php if ($val->present_area_id == "") {
                                    $cnt++;
                                    // echo "<span class='col'>No Record</span>";
                                    echo "<span class='col edit'>No Record</span><select class='txtedit' data-id='".$val->admission_id."' data-field='present_area_id' id='nametxt_".$val->admission_id."'>
                                     <option value='yogichock'>Yogi chock</option>
                                     <option value='akroad'>Akroad</option>
                                     <option value='sarthana'>Sarthana</option>
                                     <option value='mota_varachha'>Mota Varachha</option>
                                    </select>";
                                     ?>
                                        <?php } else { 
                                        echo "<span class='edit'>".$val->present_area_id."</span><select class='txtedit' data-id='".$val->admission_id."' data-field='present_area_id' id='nametxt_".$val->admission_id."'>
                                     <option value='yogichock' <?php if($val->present_area_id == 'yogichock'){echo 'selected'} ?>
                                        >Yogi chock</option>
                                        <option value='akroad' <?php if($val->present_area_id == 'akroad'){echo
                                            'selected'} ?>>Akroad</option>
                                        <option value='sarthana' <?php if($val->present_area_id == 'sarthana'){echo
                                            'selected' } ?> >Sarthana</option>
                                        <option value='mota_varachha' <?php if($val->present_area_id ==
                                            'mota_varachha'){echo 'selected' } ?> >Mota Varachha</option>
                                        </select>";
                                        } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Pin Code :</label>
                                    <p>
                                        <?php if ($val->present_pin_code == "") {
                                    $cnt++;
                                    // echo "<span class='col'>No Record</span>";
                                    echo "<span class='edit' style='color:red'>No Record</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='present_pin_code' id='nametxt_".$val->admission_id."' value='".$val->present_pin_code."' >";
                                 } else {
                                    // echo $val->present_pin_code;
                                  echo "<span class='edit' style='color:black'>".$val->present_pin_code."</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='present_pin_code' id='nametxt_".$val->admission_id."' value='".$val->present_pin_code."' >";
                                 } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Present Address :</label>
                                    <p>
                                        <?php if ($val->present_flate_house_no == "") {
                                    $cnt++;
                                    // echo "<span class='col'>No Record</span>";
                                    echo "<span class='edit' style='color:red'>No Record</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='present_flate_house_no' id='nametxt_".$val->admission_id."' value='".$val->present_flate_house_no."' >";

                                 } else {
                                    // echo $val->present_flate_house_no;
                                    echo "<span class='edit'  style='color:black'>".$val->present_flate_house_no."</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='present_flate_house_no' id='nametxt_".$val->admission_id."' value='".$val->present_flate_house_no."' >";
                                 } ?>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="add_block">
                            <h3>Parents Details Guardian 1</h3>
                            <ul>
                                <li>
                                    <label>Name :</label>
                                    <p>
                                        <?php if ($val->father_name == "") {
                                    $cnt++;
                                    echo "<span class='edit' style='color:red'>No Record</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='father_name' id='nametxt_".$val->admission_id."' value='".$val->father_name."' >";
                                 } else {
                                    echo "<span class='edit' style='color:black;'>".$val->father_name."</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='father_name' id='nametxt_".$val->admission_id."' value='".$val->father_name."' >";

                                 } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Father Email :</label>
                                    <p>
                                        <?php if($val->father_email == "") {
                                    $cnt++;
                                    // echo "<span class='col edit'>No Record</span>";
                                     echo "<span class='col edit'>No Record</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='father_email' id='nametxt_".$val->admission_id."' value='".$val->father_email."' >";
                                 } else {
                                     echo "<span class='edit' style='color:black'>".$val->father_email."</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='father_email' id='nametxt_".$val->admission_id."' value='".$val->father_email."' >";
                                 } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Father Mobile No :</label>
                                    <p>
                                        <?php if ($val->father_mobile_no == "") {
                                    $cnt++;
                                    // echo "<span class='col'>No Record</span>";
                                    echo "<span class='col edit'>No Record</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='father_mobile_no' id='nametxt_".$val->admission_id."' value='".$val->father_mobile_no."' >";
                                 } else {
                                    // echo ;
                                     echo "<span class='edit'>".$val->father_mobile_no."</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='father_mobile_no' id='nametxt_".$val->admission_id."' value='".$val->father_mobile_no."' >";
                                 } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Occupation :</label>
                                    <p>
                                        <?php if ($val->father_occupation == "") {
                                    $cnt++;
                                    echo "<span class='col edit'>No Record</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='father_occupation' id='nametxt_".$val->admission_id."' value='".$val->father_occupation."' >";
                                 } else {
                                    echo "<span class='edit'>".$val->father_occupation."</span> 
                                        <input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='father_occupation' id='nametxt_".$val->admission_id."' value='".$val->father_occupation."' >";

                                 } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Income :</label>
                                    <p>
                                        <?php if ($val->father_income == "") {
                                    $cnt++;
                                    // echo "<span class='col'>No Record</span>";
                                     echo "<span class='col edit'>No Record</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='father_income' id='nametxt_".$val->admission_id."' value='".$val->father_income."' >";
                                 } else {
                                    
                                    echo "<span class='edit'>".$val->father_income."</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='father_income' id='nametxt_".$val->admission_id."' value='".$val->father_income."' >";

                                 } ?>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="add_block">
                            <h3>Parents Details Guardian 2</h3>
                            <ul>
                                <li>
                                    <label>Name :</label>
                                    <p>
                                        <?php if ($val->mother_name == "") {
                                    $cnt++;
                                    echo "<span class='col edit'>No Record</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='mother_name' id='nametxt_".$val->admission_id."' value='".$val->mother_name."' >";
                                 } else {
                                     echo "<span class='edit' style='color:black'>".$val->mother_name."</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='mother_name' id='nametxt_".$val->admission_id."' value='".$val->mother_name."' >";
                                 } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Mother Email :</label>
                                    <p>
                                        <?php if ($val->mother_email == "") {
                                    $cnt++;
                                    // echo "<span class='col'>No Record</span>";
                                    echo "<span class='col edit'>No Record</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='mother_email' id='nametxt_".$val->admission_id."' value='".$val->mother_email."' >";
                                 } else {
                                    // echo $val->mother_email;
                                     echo "<span class='edit' style='color:black'>".$val->mother_email."</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='mother_email' id='nametxt_".$val->admission_id."' value='".$val->mother_email."' >";
                                 } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Mother Mobile No :</label>
                                    <p>
                                        <?php if ($val->mother_mobile_no == "") {
                                    $cnt++;
                                    echo "<span class='col edit'>No Record</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='mother_mobile_no' id='nametxt_".$val->admission_id."' value='".$val->mother_mobile_no."' >";
                                 } else {
                                     echo "<span class='edit' style='color:black'>".$val->mother_mobile_no."</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='mother_mobile_no' id='nametxt_".$val->admission_id."' value='".$val->mother_mobile_no."' >";
                                 } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Occupation :</label>
                                    <p>
                                        <?php if ($val->mother_occupation == "") {
                                    $cnt++;
                                    // echo "<span class='col'>No Record</span>";
                                    echo "<span class='col edit'>No Record</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='mother_occupation' id='nametxt_".$val->admission_id."' value='".$val->mother_occupation."' >";
                                 } else {
                                    echo "<span class='edit'>".$val->mother_occupation."</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='mother_occupation' id='nametxt_".$val->admission_id."' value='".$val->mother_occupation."' >";
                                 } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Income :</label>
                                    <p>
                                        <?php if ($val->mother_income == "") {
                                    $cnt++;
                                    echo "<span class='col edit'>No Record</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='mother_income' id='nametxt_".$val->admission_id."' value='".$val->mother_income."' >";
                                 } else {
                                    // echo $val->mother_income;
                                    echo "<span class='edit'>".$val->mother_income."</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='mother_income' id='nametxt_".$val->admission_id."' value='".$val->mother_income."' >";
                                 } ?>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="add_block">
                            <h3>Education & Profession</h3>
                            <ul>
                                <li>
                                    <label>College / School Name :</label>
                                    <p>
                                        <?php if ($val->school_collage_name == "") {
                                    $cnt++;
                                    echo "<span class='col edit'>No Record</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='school_collage_name' id='nametxt_".$val->admission_id."' value='".$val->school_collage_name."' >";
                                 } else {
                                    echo "<span class='edit'>".$val->school_collage_name."</span><input type='text' class='txtedit' data-id='".$val->admission_id."' data-field='school_collage_name' id='nametxt_".$val->admission_id."' value='".$val->school_collage_name."' >";
                                 } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Country :</label>
                                    <p>
                                        <?php if ($val->present_country_id == "") {
                                    $cnt++;
                                    // echo "<span class='col'>No Record</span>";
                                    echo "<span class='col edit'>No Record</span><select class='txtedit' data-id='".$val->admission_id."' data-field='present_country_id' id='nametxt_".$val->admission_id."'>
                                     <option value='india'>India</option>
                                     <option value='uk'>UK</option>
                                     <option value='canada'>Canada</option>
                                    </select>";
                                 } else {
                                    // echo $val->present_country_id;
                                    echo "<span class='edit'>".$val->present_country_id."</span><select class='txtedit' data-id='".$val->admission_id."' data-field='present_country_id' id='nametxt_".$val->admission_id."'>
                                     <option value='india' <?php if($val->present_country_id == 'india'){echo 'selected'} ?>
                                        >India</option>
                                        <option value='uk' <?php if($val->present_country_id == 'uk'){echo 'selected'}
                                            ?>>UK</option>
                                        <option value='canada' <?php if($val->present_country_id == 'canada'){echo
                                            'selected' } ?> >Canada</option>
                                        </select>";
                                        } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>State :</label>
                                    <p>
                                        <?php if ($val->school_clg_state == "") {
                                    $cnt++;
                                    // echo "<span class='col'>No Record</span>";
                                     echo "<span class='col edit'>No Record</span><select class='txtedit' data-id='".$val->admission_id."' data-field='school_clg_state' id='nametxt_".$val->admission_id."'>
                                     <option value='gujarat'>Gujarat</option>
                                     <option value='Rajasthan'>Rajesthan</option>
                                     <option value='Maharast'>Maharast</option>
                                    </select>";
                                 } else {
                                    // echo $val->school_clg_state;
                                    echo "<span class='edit'>".$val->school_clg_state."</span><select class='txtedit' data-id='".$val->admission_id."' data-field='school_clg_state' id='nametxt_".$val->admission_id."'>
                                     <option value='gujarat' <?php if($val->school_clg_state == 'gujarat'){echo 'selected'} ?>
                                        >gujarat</option>
                                        <option value='Rajasthan' <?php if($val->school_clg_state == 'uk'){echo
                                            'selected'} ?>>Rajasthan</option>
                                        <option value='Maharast' <?php if($val->school_clg_state == 'canada'){echo
                                            'selected' } ?> >Maharast</option>
                                        </select>";
                                        } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>City :</label>
                                    <p>
                                        <?php if ($val->school_clg_city == "") {
                                    $cnt++;
                                    // echo "<span class='col'>No Record</span>";
                                    echo "<span class='col edit'>No Record</span><select class='txtedit' data-id='".$val->admission_id."' data-field='school_clg_city' id='nametxt_".$val->admission_id."'>
                                     <option value='surat'>Surat</option>
                                     <option value='vadodara'>Vadodara</option>
                                     <option value='navasari'>Navasari</option>
                                    </select>";
                                 } else {
                                    // echo $val->school_clg_city;
                                    echo "<span class='edit'>".$val->school_clg_city."</span><select class='txtedit' data-id='".$val->admission_id."' data-field='school_clg_city' id='nametxt_".$val->admission_id."'>
                                     <option value='surat' <?php if($val->school_clg_city == 'surat'){echo 'selected'} ?>
                                        >surat</option>
                                        <option value='vadodara' <?php if($val->school_clg_city == 'vadodara'){echo
                                            'selected'} ?>>vadodara</option>
                                        <option value='navasari' <?php if($val->school_clg_city == 'navasari'){echo
                                            'selected' } ?> >navasari</option>
                                        </select>";
                                        } ?>
                                    </p>
                                </li>
                                <li>
                                    <label>Area :</label>
                                    <p>
                                        <?php if ($val->school_clg_area == "") {
                                    $cnt++;
                                    // echo "<span class='col'>No Record</span>";
                                    echo "<span class='col edit'>No Record</span><select class='txtedit' data-id='".$val->admission_id."' data-field='school_clg_area' id='nametxt_".$val->admission_id."'>
                                     <option value='yogichock'>Yogi chock</option>
                                     <option value='akroad'>Akroad</option>
                                     <option value='sarthana'>Sarthana</option>
                                     <option value='mota_varachha'>Mota Varachha</option>
                                    </select>";
                                     ?>
                                        <?php } else { 
                                       
                                     echo "<span class='edit'>".$val->school_clg_area."</span><select class='txtedit' data-id='".$val->admission_id."' data-field='school_clg_area' id='nametxt_".$val->admission_id."'>
                                     <option value='yogichock' <?php if($val->school_clg_area == 'yogichock'){echo 'selected'} ?>
                                        >Yogi chock</option>
                                        <option value='akroad' <?php if($val->school_clg_area == 'akroad'){echo
                                            'selected'} ?>>Akroad</option>
                                        <option value='sarthana' <?php if($val->school_clg_area == 'sarthana'){echo
                                            'selected' } ?> >Sarthana</option>
                                        <option value='mota_varachha' <?php if($val->school_clg_area ==
                                            'mota_varachha'){echo 'selected' } ?> >Mota Varachha</option>
                                        </select>";

                                        } ?>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="add_block">
                            <h3>Documents<a class="text-primary" data-toggle="modal" data-target=".upd_doc"
                                    onclick="return Upd_document(<?php echo $val->admission_id; ?>)"><i
                                        class="far fa-edit" style="font-weight: bold;"></i></a></h3>
                            <ul>
                                <li>
                                    <label>Photos :</label>
                                    <p>
                                        <?php foreach(@$doc_list as $ld) { ?>
                                        <?php if ($val->admission_id == $ld->admission_id) { ?>
                                        <?php if ($ld->photos == "") {  ?>
                                        <?php $cnt++;?>
                                        <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Student document") {?>
                                          <?php echo "<span class='col edit'>No Record</span><input type='file' class='imageEdit' data-id='".$val->admission_id."' data-field='photos' id='nametxt_".$val->admission_id."' >";
                                           ?>
                                       <?php }  }?>
                                        <?php   } else {   ?>
                                        <?php echo $ld->photos; ?>
                                        <?php }
                                    }
                                 } ?>
                                  <?php foreach(@$doc_list as $ld) { ?>
                                        <?php if ($val->admission_id == $ld->admission_id) { ?>
                                        <?php if ($ld->photos != "") {  ?>
                                            <a  href="<?php echo base_url(); ?>Admission/download_file?file=<?php echo $ld->photos; ?>"  ><i class="fa fa-download" aria-hidden="true"></i></a>
                                            <?php   } ?>
                                        <?php } ?>
                                        <?php } ?> 
                                    </p>
                                </li>
                                <li>
                                    <label>10th Marksheet :</label>
                                    <p>
                                        <?php foreach ($doc_list as $ld) { ?>
                                        <?php if ($val->admission_id == $ld->admission_id) { ?>
                                        <?php if ($ld->tenth_marksheet == "") {  ?>
                                        <?php $cnt++;?>
                                          <!-- echo "<span class='col'>No Record</span>"; -->
                                        <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Student document") {?>
                                         <?php  echo "<span class='col edit'>No Record</span><input type='file' class='imageEdit' data-id='".$val->admission_id."' data-field='tenth_marksheet' id='nametxt_".$val->admission_id."' >";
                                           ?>
                                       <?php } } ?>
                                        <?php   } else {   ?>
                                        <?php echo $ld->tenth_marksheet; ?>
                                        <?php }
                                    }
                                 } ?>
                                 <?php foreach(@$doc_list as $ld) { ?>
                                        <?php if ($val->admission_id == $ld->admission_id) { ?>
                                        <?php if ($ld->tenth_marksheet != "") {  ?>
                                            <a  href="<?php echo base_url(); ?>Admission/download_file?file=<?php echo $ld->tenth_marksheet; ?>"  ><i class="fa fa-download" aria-hidden="true"></i></a>
                                            <?php   } ?>
                                        <?php } ?>
                                        <?php } ?> 
                                    </p>
                                </li>
                                <li>
                                    <label>12th Marksheet :</label>
                                    <p>
                                        <?php foreach ($doc_list as $ld) { ?>
                                        <?php if ($val->admission_id == $ld->admission_id) { ?>
                                        <?php if ($ld->twelfth_marksheet == "") {  ?>
                                        <?php $cnt++; ?>
                                          <!-- // echo "<span class='col'>No Record</span>"; -->
                                          <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Student document") {?>
                                         <?php echo "<span class='col edit'>No Record</span><input type='file' class='imageEdit' data-id='".$val->admission_id."' data-field='twelfth_marksheet' id='nametxt_".$val->admission_id."' >"; ?>
                                     <?php  } } ?>
                                        <?php   } else {   ?>
                                        <?php echo $ld->twelfth_marksheet; ?>
                                        <?php }
                                    }
                                 } ?>
                                 <?php foreach(@$doc_list as $ld) { ?>
                                        <?php if ($val->admission_id == $ld->admission_id) { ?>
                                        <?php if ($ld->twelfth_marksheet != "") {  ?>
                                            <a  href="<?php echo base_url(); ?>Admission/download_file?file=<?php echo $ld->twelfth_marksheet; ?>"  ><i class="fa fa-download" aria-hidden="true"></i></a>
                                            <?php   } ?>
                                        <?php } ?>
                                        <?php } ?> 
                                    </p>
                                </li>
                                <li>
                                    <label>Leaving Certy :</label>
                                    <p>
                                        <?php foreach ($doc_list as $ld) { ?>
                                        <?php if ($val->admission_id == $ld->admission_id) { ?>
                                        <?php if ($ld->leaving_certy == "") {  ?>
                                        <?php $cnt++;
                                          // echo "<span class='col'>No Record</span>";
                                           echo "<span class='col edit'>No Record</span><input type='file' class='imageEdit' data-id='".$val->admission_id."' data-field='leaving_certy' id='nametxt_".$val->admission_id."' >";
                                            ?>
                                        <?php   } else {   ?>
                                        <?php echo $ld->leaving_certy; ?>
                                        <?php }
                                    }
                                 } ?>
                                  <?php foreach(@$doc_list as $ld) { ?>
                                        <?php if ($val->admission_id == $ld->admission_id) { ?>
                                        <?php if ($ld->leaving_certy != "") {  ?>
                                            <a  href="<?php echo base_url(); ?>Admission/download_file?file=<?php echo $ld->leaving_certy; ?>"  ><i class="fa fa-download" aria-hidden="true"></i></a>
                                            <?php   } ?>
                                        <?php } ?>
                                        <?php } ?> 
                                    </p>
                                </li>
                                <li>
                                    <label>Aadhar Card :</label>
                                    <p>
                                        <?php foreach ($doc_list as $ld) { ?>
                                        <?php if ($val->admission_id == $ld->admission_id) { ?>
                                        <?php if ($ld->aadhar_card == "") {  ?>
                                        <?php $cnt++; ?>
                                          <!-- // echo "<span class='col'>No Record</span>"; -->
                                          <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Student document") {?>
                                        <?php   echo "<span class='col edit'>No Record</span><input type='file' class='imageEdit' data-id='".$val->admission_id."' data-field='aadhar_card' id='nametxt_".$val->admission_id."' >";
                                            ?>
                                        <?php } } ?>
                                        <?php   } else {   ?>
                                        <?php echo $ld->aadhar_card; ?>
                                        <?php }
                                    }
                                 } ?>
                                  <?php foreach(@$doc_list as $ld) { ?>
                                        <?php if ($val->admission_id == $ld->admission_id) { ?>
                                        <?php if ($ld->aadhar_card != "") {  ?>
                                            <a  href="<?php echo base_url(); ?>Admission/download_file?file=<?php echo $ld->aadhar_card; ?>"  ><i class="fa fa-download" aria-hidden="true"></i></a>
                                            <?php   } ?>
                                        <?php } ?>
                                        <?php } ?> 
                                    </p>
                                </li>
                                <li>
                                    <label>From:</label>
                                    <p>
                                        <?php foreach ($doc_list as $ld) { ?>
                                        <?php if ($val->admission_id == $ld->admission_id) { ?>
                                        <?php if ($ld->form == "") {  ?>
                                        <?php $cnt++; ?>
                                          <!-- // echo "<span class='col'>No Record</span>"; -->
                                          <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Student document") {?>
                                        <?php   echo "<span class='col edit'>No Record</span><input type='file' class='imageEdit' data-id='".$val->admission_id."' data-field='form' id='nametxt_".$val->admission_id."' >";
                                            ?>
                                        <?php } } ?>
                                        <?php   } else {   ?>
                                        <?php echo $ld->form; ?>
                                        <?php }
                                    }
                                 } ?>
                                  <?php foreach(@$doc_list as $ld) { ?>
                                        <?php if ($val->admission_id == $ld->admission_id) { ?>
                                        <?php if ($ld->form != "") {  ?>
                                            <a  href="<?php echo base_url(); ?>Admission/download_file?file=<?php echo $ld->form; ?>"  ><i class="fa fa-download" aria-hidden="true"></i></a>
                                            <?php   } ?>
                                        <?php } ?>
                                        <?php } ?> 
                                    </p>
                                </li>
                                <li>
                                    <label>Other :</label>
                                    <p>
                                        <?php foreach ($doc_list as $ld) { ?>
                                        <?php if ($val->admission_id == $ld->admission_id) { ?>
                                        <?php if ($ld->other == "") {  ?>
                                        <?php $cnt++; ?>
                                          <!-- // echo "<span class='col'>No Record</span>"; -->
                                          <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Student document") {?>
                                        <?php   echo "<span class='col edit'>No Record</span><input type='file' class='imageEdit' data-id='".$val->admission_id."' data-field='other' id='nametxt_".$val->admission_id."' >";
                                            ?>
                                        <?php } } ?>
                                        <?php   } else {   ?>
                                        <?php echo $ld->other; ?>
                                        <?php }
                                    }
                                 } ?>
                                 <?php foreach(@$doc_list as $ld) { ?>
                                        <?php if ($val->admission_id == $ld->admission_id) { ?>
                                        <?php if ($ld->other != "") {  ?>
                                            <a  href="<?php echo base_url(); ?>Admission/download_file?file=<?php echo $ld->other; ?>"  ><i class="fa fa-download" aria-hidden="true"></i></a>
                                            <?php   } ?>
                                        <?php } ?>
                                        <?php } ?> 
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="extra_sidebar-menu">
            <div class="sidebar-panel">
                <button class="close-sidebar-left">X</button>
                <div class="rsidebar-items send-sms admission-remraks">
                    <div class="rsidebar-title">
                        <h3 class="mb-0">Demo Filter</h3>
                    </div>
                    <div class="rsidebar-middle p-0">
                        <div class="accordion mb-0">
                            <div class="accordion-item">
                                <div class="main-accordion shadow-sm card card-primary mb-3">
                                    <h6 class="accordion-title d-flex flex-wrap align-items-center justify-content-between p-3 px-3 mb-0"
                                        href="javascript:void(0)">
                                        Fees Installment<i class="fa fa-angle-down"></i>
                                    </h6>
                                    <div class="accordion-content show">
                                        <div class="card-body pt-0 px-3">
                                            <div class="ml-auto text-right">
                                                <input type="text" class="form-control w-25 ml-auto d-inline-block mr-3" aria-invalid="true">
                                                <input type="button" value="Make Installment" class="btn btn-primary">
                                            </div>
                                            <div>
                                                <div class="form-group">
                                                    <label>
                                                        <strong>#NO 1</strong>
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label>Installment Date</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Due Amount</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Paid Amount</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Send SMS To:</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">Send Email To:</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                <label class="custom-control-label" for="customCheck3">Send SMS Father:</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                <label class="custom-control-label" for="customCheck4">Send Email Father:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-accordion shadow-sm card card-primary mb-3">
                                    <h6 class="accordion-title d-flex flex-wrap align-items-center justify-content-between p-3 mb-0"
                                        href="javascript:void(0)">
                                        Postal Communication<i class="fa fa-angle-down"></i>
                                    </h6>
                                    <div class="accordion-content show" style="display: none;">
                                        <div class="card-body pt-0 px-3">
                                            <div class="form-group">
                                                <label>Present Address:</label>
                                                <input type="text" class="form-control" placeholder="Flate, House, Building, Apartment, Company">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Area, colony, street, Village">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="present_landmark_colony" id="present_landmark_colony" placeholder="Landmark near location eg.Apolo Hospital" value="surat">
                                            </div>
                                            <div class="form-group">
                                                <label>Pin Code:</label>
                                                <input type="text" class="form-control" placeholder="Pin Code">
                                            </div>
                                            <div class="form-group">
                                                <label>State:</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Select State</option>
                                                    <option value="">Assam</option>
                                                    <option value="">Bihar</option>
                                                    <option value="">Haryana</option>
                                                    <option value="">Gujarat</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>City:</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Select City</option>
                                                    <option value="">Surat</option>
                                                    <option value="">Mumbai</option>
                                                    <option value="">Patan</option>
                                                    <option value="">Chennai</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Area:</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Select Area</option>
                                                    <option value="">Yogi chowk</option>
                                                    <option value="">Varachha</option>
                                                    <option value="">Adajan</option>
                                                    <option value="">Katargam</option>
                                                </select>
                                            </div>
                                            <div class="form-group text-center position-relative">
                                                <input type="button" value="" style="position: absolute;margin-left: 7px;opacity: 0;" aria-invalid="false">
                                                <i class="fa fa-angle-double-down btn btn-primary btn-sm rounded-circle" style="border-radius:100px !important;font-size:20px" aria-hidden="true"></i>
                                            </div>
                                            <div class="form-group">
                                                <label>Present Address:</label>
                                                <input type="text" class="form-control" placeholder="Flate, House, Building, Apartment, Company">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Area, colony, street, Village">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="present_landmark_colony" id="present_landmark_colony" placeholder="Landmark near location eg.Apolo Hospital" value="surat">
                                            </div>
                                            <div class="form-group">
                                                <label>Pin Code:</label>
                                                <input type="text" class="form-control" placeholder="Pin Code">
                                            </div>
                                            <div class="form-group">
                                                <label>State:</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Select State</option>
                                                    <option value="">Assam</option>
                                                    <option value="">Bihar</option>
                                                    <option value="">Haryana</option>
                                                    <option value="">Gujarat</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>City:</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Select City</option>
                                                    <option value="">Surat</option>
                                                    <option value="">Mumbai</option>
                                                    <option value="">Patan</option>
                                                    <option value="">Chennai</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Area:</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Select Area</option>
                                                    <option value="">Yogi chowk</option>
                                                    <option value="">Varachha</option>
                                                    <option value="">Adajan</option>
                                                    <option value="">Katargam</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="main-accordion shadow-sm card card-primary mb-3">
                                    <h6 class="accordion-title d-flex flex-wrap align-items-center justify-content-between p-3 mb-0 active"
                                        href="javascript:void(0)">
                                        Parents Details<i class="fa fa-angle-down"></i>
                                    </h6>
                                    <div class="accordion-content show" style="display: none;">
                                        <div class="card-body pt-0 px-3">
                                            <div>
                                                <div class="rsidebar-title mb-3">
                                                    <h3 class="mb-0 px-0">Guardian 1 Details</h3>
                                                </div>
                                                <div class="form-group">
                                                    <label>Father Name:</label>
                                                    <input type="text" class="form-control" placeholder="Father Name">
                                                </div>
                                                <div class="form-group">
                                                    <label>Surname:</label>
                                                    <input type="text" class="form-control" placeholder="Your Surname">
                                                </div>
                                                <div class="form-group">
                                                    <label>Father Email:</label>
                                                    <input type="text" class="form-control" placeholder="jone@gmail.com">
                                                </div>
                                                <div class="form-group">
                                                    <label>Father Mobile No:</label>
                                                    <input type="text" class="form-control" placeholder="+91-00000-00000">
                                                </div>
                                                <div class="form-group">
                                                    <label>Father Occupation:</label>
                                                    <input type="text" class="form-control" placeholder="Father Occupation">
                                                </div>
                                                <div class="form-group">
                                                    <label>Father Income:</label>
                                                    <input type="text" class="form-control" placeholder="Father Income">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="rsidebar-title mb-3">
                                                    <h3 class="mb-0 px-0">Guardian 2 Details</h3>
                                                </div>
                                                <div class="form-group">
                                                    <label>Mother Name:</label>
                                                    <input type="text" class="form-control" placeholder="Mother Name">
                                                </div>
                                                <div class="form-group">
                                                    <label>Surname:</label>
                                                    <input type="text" class="form-control" placeholder="Your Surname">
                                                </div>
                                                <div class="form-group">
                                                    <label>Mother Email:</label>
                                                    <input type="text" class="form-control" placeholder="jone@gmail.com">
                                                </div>
                                                <div class="form-group">
                                                    <label>Mother Mobile No:</label>
                                                    <input type="text" class="form-control" placeholder="+91-00000-00000">
                                                </div>
                                                <div class="form-group">
                                                    <label>Mother Occupation:</label>
                                                    <input type="text" class="form-control" placeholder="Mother Occupation">
                                                </div>
                                                <div class="form-group">
                                                    <label>Mother Income:</label>
                                                    <input type="text" class="form-control" placeholder="Mother Income">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-accordion shadow-sm card card-primary mb-3">
                                    <h6 class="accordion-title d-flex flex-wrap align-items-center justify-content-between p-3 mb-0 active"
                                        href="javascript:void(0)">
                                        Education & Proffasion<i class="fa fa-angle-down"></i>
                                    </h6>
                                    <div class="accordion-content show" style="display: none;">
                                        <div class="card-body pt-0 px-3">
                                            <div>
                                                <div class="form-group">
                                                    <label>College / School Name:</label>
                                                    <input type="text" class="form-control" placeholder="CLG-SCL Name">
                                                </div>
                                                <div class="form-group">
                                                    <label>Country:</label>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">Select Country</option>
                                                        <option value="">India</option>
                                                        <option value="">Uk</option>
                                                        <option value="">Itly</option>
                                                        <option value="">Africa</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>State:</label>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">Select State</option>
                                                        <option value="">Assam</option>
                                                        <option value="">Bihar</option>
                                                        <option value="">Haryana</option>
                                                        <option value="">Gujarat</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>City:</label>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">Select City</option>
                                                        <option value="">Surat</option>
                                                        <option value="">Mumbai</option>
                                                        <option value="">Patan</option>
                                                        <option value="">Chennai</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Area:</label>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">Select Area</option>
                                                        <option value="">Yogi chowk</option>
                                                        <option value="">Varachha</option>
                                                        <option value="">Adajan</option>
                                                        <option value="">Katargam</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="d-block">Course Category</label>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger d-inline-block">
                                                        <input class="form-check-input" type="radio" name="school_collage_type" value="school" id="coursecategory1" checked="">
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label class="d-block">School</label>
                                                        </div>
                                                    </div>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger d-inline-block">
                                                        <input class="form-check-input" type="radio" name="school_collage_type" value="college" id="coursecategory2">
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label class="d-block">College</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-accordion shadow-sm card card-primary mb-3">
                                    <h6 class="accordion-title d-flex flex-wrap align-items-center justify-content-between p-3 mb-0 active"
                                        href="javascript:void(0)">
                                        Document<i class="fa fa-angle-down"></i>
                                    </h6>
                                    <div class="accordion-content show" style="display: none;">
                                        <div class="card-body pt-0 px-3">
                                            <div class="form-group">
                                                <label>Photos</label>
                                                <input type="file" class="mt-2">
                                            </div>
                                            <div class="form-group">
                                                <label>12th Marksheet</label>
                                                <input type="file" class="mt-2">
                                            </div>
                                            <div class="form-group">
                                                <label>Aadhar Card</label>
                                                <input type="file" class="mt-2">
                                            </div>
                                            <div class="form-group">
                                                <input class="btn btn-primary mr-1" type="submit" name="upd_record" value="Submit">
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
                    <form method="post" action="<?php  echo base_url(); ?>Admission/erpunfillup_field">
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
                                    <?php foreach($list_branch as $ld) { ?>
                                    <option <?php if(@$filter_branch==$ld->branch_id) { echo "selected"; } ?> value="
                                        <?php echo $ld->branch_id; ?>">
                                        <?php echo $ld->branch_name; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputState">Course</label>
                                <select id="inputState" class="form-control" name="filter_course" id="filter_course">
                                    <option value="">Select Course</option>
                                    <?php foreach($list_course as $lp) { ?>
                                    <option <?php if(@$filter_course==$lp->course_id) { echo "selected"; } ?> value="
                                        <?php echo $lp->course_id; ?>">
                                        <?php echo $lp->course_name; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputState">Package</label>
                                <select id="inputState" class="form-control" name="filter_package" id="filter_package">
                                    <option value="">Select Package</option>
                                    <?php foreach($list_package as $lp) { ?>
                                    <option <?php if(@$filter_package==$lp->package_id) { echo "selected"; } ?> value="
                                        <?php echo $lp->package_id; ?>">
                                        <?php echo $lp->package_name; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputState">College Course</label>
                                <select id="inputState" class="form-control" name="filter_clg_course"
                                    id="filter_clg_course">
                                    <option value="">Select Course</option>
                                    <?php foreach($college_courses_all as $lp) { ?>
                                    <option <?php if(@$filter_clg_course==$lp->college_courses_id) { echo "selected"; }
                                        ?> value="
                                        <?php echo $lp->college_courses_id ; ?>">
                                        <?php echo $lp->college_course_name; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Date From - To </label>
                                <input type="hidden" id="fromdate" name="filter_from_date"
                                    value="<?php if(!empty($filter_from_date)) { echo @$filter_from_date; } ?>">
                                <input type="hidden" id="todate" name="filter_to_date"
                                    value="<?php if(!empty($filter_to_date)) { echo @$filter_to_date; } ?>">
                                <div id="reportrange">
                                    <i class="far fa-calendar-alt"></i>&nbsp;
                                    <span>
                                        <?php if(!empty($filter_from_date) && !empty($filter_to_date)) { echo @$filter_from_date." - ".$filter_to_date; } ?>
                                    </span> <i class="fa fa-caret-down"></i>
                                </div>
                            </div>

                        </div>
                        <div class="text-right">
                            <input type="submit" class="btn btn-primary" value="Filter" name="filter_admissionunfilup">
                            <a class="btn btn-light text-dark"
                                href="<?php echo base_url(); ?>Admission/erpunfillup_field">Reset</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--New Insatllment Created -->
    <div class="modal fade upd_installment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="myLargeModalLabel">Fees Installment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="dynamic_field">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="form-group text-center">
                                        <label><strong>#NO</strong></label>
                                        <p id="installment_no"></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Installment Date:</label>
                                    <input class="form-control" name="installment_date[]" id="installment_date">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Due Amount:</label>
                                    <input class="form-control" name="due_amount[]" id="due_amount">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Paid Amount:</label>
                                    <input class="form-control" name="paid_amount[]" id="paid_amount">
                                </div>
                                <div class="col-md-2 p-4">
                                    <!-- <button type="button" name="remove" id="'+i+'" class="btn btn-icon btn-danger btn_remove"><i class="fas fa-times"></i></button> -->
                                    <button type="button" name="add" id="add" class="btn btn-success"><i
                                            class="fas fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="daynamic">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Document Update -->
    <div class="modal fade upd_doc" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="myLargeModalLabel">Document Upload</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body get_doc">

                </div>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
    <script
        src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>
    <!-- <script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script> -->
    <script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://unpkg.com/lightpick@latest/lightpick.js"></script>
    <script
        src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script
        src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <!-- JS Libraies -->
    <script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
    <script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript">
        jQuery(".sidebar-panel").niceScroll({
            cursorcolor:"#5864bd"
        }); 
    </script>
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

     function clickAndDisable(link) {
     // disable subsequent clicks
     link.onclick = function(event) {
        event.preventDefault();
     }
      $('#updsmg').html(iziToast.success({
           title: 'Do Not Click Second Time Please Try To Understand',
           timeout: 2500,
           message: '',
           position: 'topRight'
       }));
   }   
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            var i = 1;
            $('#add').click(function () {
                i++;
                $('#dynamic_field').append('<div id="row' + i + '" class="col-md-12"><div class="row"><div class="col-md-1"><div class="form-group text-center"><label><strong></strong></label><p></p></div></div><div class="col-md-3"><label for="">Installment Date:</label><input class="form-control" name="installment_date[]" id="installment_date" value=""></div><div class="col-md-3"><label for="">Due Amount:</label><input class="form-control" name="due_amount[]" id="due_amount" value=""></div><div class="col-md-3"><label for="">Paid Amount:</label><input class="form-control" name="paid_amount[]" id="paid_amount" value=""></div><div class="col-md-2 p-4"><button type="button" name="remove" id="' + i + '" class="btn btn-icon btn-danger btn_remove"><i class="fas fa-times"></i></button></div></div></div>');
            });

            $(document).on('click', '.btn_remove', function () {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });

        });
    </script>
    <script>
        function Upd_Fees_Installment(admission_id = '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Admission/Upd_Fees_Installment",
                type: "post",
                data: {
                    'admission_id': admission_id
                },
                success: function (resp) {
                    $(".upd_installment").modal();
                    var data = $.parseJSON(resp);
                    console.log(data);
                    $('#installment_no').html(data['multiple_record'][0]['installment_no']);
                    $('#installment_date').val(data['multiple_record'][0]['installment_date']);
                    $('#due_amount').val(data['multiple_record'][0]['due_amount']);
                    $('#paid_amount').val(data['multiple_record'][0]['paid_amount']);
                    var reco = '';

                    for (i = 1; i < data['multiple_record'].length; i++) {
                        reco += "<div class='col-md-12'><div class='row'><div class='col-md-1'><div class='form-group text-center'><label><strong></strong></label><p>" + data['multiple_record'][i]['installment_no'] + "</p></div></div><div class='col-md-3'><label for=''>Installment Date:</label><input class='form-control' name='installment_date[]' id='installment_date' value='" + data['multiple_record'][i]['installment_date'] + "'></div><div class='col-md-3'><label for=''>Due Amount:</label><input class='form-control' name='due_amount[]' id='due_amount' value='" + data['multiple_record'][i]['due_amount'] + "'></div><div class='col-md-3'><label for=''>Paid Amount:</label><input class='form-control' name='paid_amount[]' id='paid_amount' value='" + data['multiple_record'][i]['paid_amount'] + "'></div><div class='col-md-2 p-4'><button type='button' name='remove' id='' class='btn btn-icon btn-danger btn_remove'><i class='fas fa-times'></i></button></div></div></div>";
                    }
                    $('.daynamic').html(reco);
                }
            });
        }
    </script>

    <script>
        function Upd_document(admission_id = '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Admission/Upd_document",
                type: "post",
                data: {
                    'admission_id': admission_id
                },
                success: function (Response) {
                    $('.get_doc').html(Response);
                }
            });
        }

        $('.txtedit').hide();
        $('.imageEdit').hide();
        $(document).ready(function () {

            // On text click
            $('.edit').click(function () {
                // Hide input element
                $('.txtedit').hide();

                // Show next input element
                $(this).next('.txtedit').show().focus();
                $(this).next('.imageEdit').show().focus();
                $(this).hide();


                // Hide clicked element
            });

            $('.imageEdit').change(function () {
                var edit_id = $(this).data('id');
                var fieldname = $(this).data('field');
                var myFormData = new FormData();
                myFormData.append('pictureFile', this.files[0]);
                myFormData.append('edit_id', edit_id);
                myFormData.append('fieldname', fieldname);
                var element = this;

                $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: "<?php echo base_url() ?>Admission/liveDocumentData",
                    data: myFormData,

                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (resp) {

                        $(element).hide();
                        $(element).prev('.edit').show();
                        if (resp != '') {
                            $(element).prev('.edit').css("color", "black");
                            $(element).prev('.edit').text(resp);
                            $('#unfill_doc_msg').html(iziToast.success({
                                title: 'Success',
                                timeout: 2500,
                                message: 'Document Update success.',
                                position: 'topRight'
                            }));
                        }
                        else {
                            $(element).prev('.edit').css("color", "red");
                            $(element).prev('.edit').text("No Record");
                            $('#unfill_doc_msg').html(iziToast.error({
                                title: 'Canceled!',
                                timeout: 2500,
                                message: 'Nothing to Change!!',
                                position: 'topRight'
                            }));
                        }
                    }
                });
            });

            // Focus out from a textbox
            $('.txtedit').focusout(function () {
                // Get edit id, field name and value
                var edit_id = $(this).data('id');
                var fieldname = $(this).data('field');
                var value = $(this).val();

                // assign instance to element variable
                var element = this;
                // alert(edit_id);
                // alert(fieldname);
                // alert(value);

                // Send AJAX request
                $.ajax({
                    url: '<?= base_url() ?>Admission/edit_fillable_data',
                    type: 'post',
                    data: { field: fieldname, value: value, id: edit_id },
                    success: function (response) {

                        // Hide Input element
                        $(element).hide();

                        // Update viewing value and display it
                        $(element).prev('.edit').show();
                        if (value != '') {
                            $(element).prev('.edit').css("color", "black");
                            $(element).prev('.edit').text(value);
                            $('#unfill_doc_msg').html(iziToast.success({
                                title: 'Success',
                                timeout: 2500,
                                message: 'Update success.',
                                position: 'topRight'
                            }));
                        }
                        else {
                            $(element).prev('.edit').css("color", "red");
                            $(element).prev('.edit').text("No Record");
                            $('#unfill_doc_msg').html(iziToast.error({
                                title: 'Canceled!',
                                timeout: 2500,
                                message: 'Nothing to Change!!',
                                position: 'topRight'
                            }));
                        }
                    }
                });
            });
        });
    </script>
    <!-- <script>
$(document).ready(function(){
 function load_data(query)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>Admission/fetch",
   method:"POST",
   data:{query:query},
   success:function(data){
    $('#fillupsearch').html(data);
   }
  })
 }

 $('#searching_form').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script> -->