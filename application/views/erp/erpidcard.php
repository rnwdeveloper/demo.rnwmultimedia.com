<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.0-beta/css/bootstrap-select.min.css" />
<link rel="stylesheet"
    href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&display=swap');

    * {
        box-sizing: border-box;
    }
</style>
<div class="main-content">
    <div class="row">
        <div class="col-12 d-flex justify-content-between">
            <h6 class="page-title text-dark mb-3">Id Card Permission</h6>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between income-wrapper">
                    <div class="d-flex justify-content-between"> </div>
                    <div class="table-right-content">
                        <button href="#" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter"
                            onclick="resetval()">
                            <span data-toggle="tooltip" data-placement="bottom" title="Create Id Card"><i
                                    class="fas fa-plus mr-1"></i></span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped normal-table table-bordered id_card_table" id="table1">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Department</th>
                                    <th>ID-Card Logo</th>
                                    <th>Logo</th>
                                    <th>Branch</th>
                                    <th>Batch</th>
                                    <th>Course</th>
                                    <th>Photos</th>
                                    <th>Surname</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Duration</th>
                                    <th>GR Id</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sno=1; foreach ($all_idcard_data as $val) {?>
                                <tr>
                                    <td>
                                        <?php echo $sno; ?>
                                    </td>
                                    <td>
                                        <?php $branch_ids = explode(",",$val->department_id);
                           foreach($list_department as $row) { if(in_array($row->department_id,$branch_ids)) {  echo $row->department_name; }  } ?>
                                    </td>
                                    <td>
                                        <img src="<?php echo base_url(); ?>dist/branchlogo/<?php echo $val->logo;  ?>"
                                            name="aboutme" width="100" height="100" class="img-thumbnail branch_logo">
                                    </td>
                                    <td>
                                        <?php echo $val->logo_permi;?>
                                    </td>
                                    <td>
                                        <?php echo $val->branch;?>
                                    </td>
                                    <td>
                                        <?php echo $val->batch;?>
                                    </td>
                                    <td>
                                        <?php echo $val->course;?>
                                    </td>
                                    <td>
                                        <?php echo $val->photos;?>
                                    </td>
                                    <td>
                                        <?php echo $val->surname;?>
                                    </td>
                                    <td>
                                        <?php echo $val->name;?>
                                    </td>
                                    <td>
                                        <?php echo $val->admission_date;?>
                                    </td>
                                    <td>
                                        <?php echo $val->duration;?>
                                    </td>
                                    <td>
                                        <?php echo $val->gr_id;?>
                                    </td>
                                    <td>
                                        <a href="javascript:idcard_upd(<?php echo $val->idcard_id; ?>)"
                                            class="bg-primary action-icon text-white btn-primary"><i
                                                class="far fa-edit"></i></a>
                                        <a href="javascript:remove_thisrow(<?php echo $val->idcard_id; ?>)"
                                            class="bg-danger action-icon text-white btn-danger"><i
                                                class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $sno++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade idcard-modal" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalCenterTitle">Id Card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-3">
                <div id="msg_icard"></div>
                <form class="idcard_add" id="msform" method="post">
                    <input type="hidden" name="idcard_id" id="idcard_id" class="form-control">
                    <fieldset>
                        
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <fieldset>
                                        <section>
                                            <div class="form-row">
                                                <div class="form-group col-md-3 col-sm-12">
                                                    <label for="">Department:<span style="color: red;">*</span></label>
                                                    <select class="form-control" name="department_id" id="depid"
                                                        required>
                                                        <option>Select Department</option>
                                                        <?php foreach($list_department as $val){ ?>
                                                        <option value="<?php echo $val->department_id ?>">
                                                            <?php echo $val->department_name; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3 col-sm-12">
                                                    <label for="">Logo:<span style="color: red;">*</span></label>
                                                    <input type="file" class="form-control" name="logo">
                                                </div>
                                                <div class="form-group col-md-3 col-sm-12">
                                                    <img id="logo" src="" width="90px" style="margi" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="form-group printid-fld">
                                                        <div class="inner-printid-item">
                                                            <label class="control-label">First Name :</label>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="form-group d-inline-block">
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="name" id="name_one" value="yes">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="name" id="name_two" value="no">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="d-inline-block">
                                                                <label class="control-label  mx-2">Font Size:</label>
                                                                <div class="form-group d-inline-block">
                                                                    <select class="form-control"
                                                                        name="firstname_fontsize"
                                                                        id="firstname_fontsize">
                                                                        <option value="10px">10px</option>
                                                                        <option value="11px">11px</option>
                                                                        <option value="12px">12px</option>
                                                                        <option value="13px">13px</option>
                                                                        <option value="14px" <?php echo "selected" ; ?>
                                                                            >14px
                                                                        </option>
                                                                        <option value="15px">15px</option>
                                                                        <option value="16px">16px</option>
                                                                        <option value="17px">17px</option>
                                                                        <option value="18px">18px</option>
                                                                        <option value="19px">19px</option>
                                                                        <option value="20px">20px</option>
                                                                        <option value="20px">24px</option>
                                                                        <option value="20px">50px</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group printid-fld">
                                                        <div class="inner-printid-item">
                                                            <label class="control-label">Last Name :</label>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="form-group d-inline-block">
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="surname" id="surname_one" value="yes">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="surname" id="surname_two" value="no">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="d-inline-block">
                                                                <label class="control-label  mx-2">Font Size:</label>
                                                                <div class="form-group d-inline-block">
                                                                    <select class="form-control"
                                                                        name="surname_fountsize" id="surname_fountsize">
                                                                        <option value="10px">10px</option>
                                                                        <option value="11px">11px</option>
                                                                        <option value="12px">12px</option>
                                                                        <option value="13px">13px</option>
                                                                        <option value="14px" <?php echo "selected" ; ?>
                                                                            >14px
                                                                        </option>
                                                                        <option value="15px">15px</option>
                                                                        <option value="16px">16px</option>
                                                                        <option value="17px">17px</option>
                                                                        <option value="18px">18px</option>
                                                                        <option value="19px">19px</option>
                                                                        <option value="20px">20px</option>
                                                                        <option value="20px">24px</option>
                                                                        <option value="20px">50px</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group printid-fld">
                                                        <div class="inner-printid-item">
                                                            <label class="control-label">Branch :</label>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="form-group d-inline-block">
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="branch" id="branch_one" value="yes">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="branch" id="branch_two" value="no">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="d-inline-block">
                                                                <label class="control-label  mx-2">Font Size:</label>
                                                                <div class="form-group d-inline-block">
                                                                    <select class="form-control"
                                                                        name="branch_fount_size" id="branch_fount_size">
                                                                        <option value="10px">10px</option>
                                                                        <option value="11px">11px</option>
                                                                        <option value="12px">12px</option>
                                                                        <option value="13px" <?php echo "selected" ; ?>
                                                                            >13px
                                                                        </option>
                                                                        <option value="14px">14px</option>
                                                                        <option value="15px">15px</option>
                                                                        <option value="16px">16px</option>
                                                                        <option value="17px">17px</option>
                                                                        <option value="18px">18px</option>
                                                                        <option value="19px">19px</option>
                                                                        <option value="20px">20px</option>
                                                                        <option value="20px">24px</option>
                                                                        <option value="20px">50px</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group printid-fld">
                                                        <div class="inner-printid-item">
                                                            <label class="control-label">Batch :</label>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="form-group d-inline-block">
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="batch" id="batch_one" value="yes">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="batch" id="batch_two" value="no">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="d-inline-block">
                                                                <label class="control-label  mx-2">Font Size:</label>
                                                                <div class="form-group d-inline-block">
                                                                    <select class="form-control" name="batch_fountsize"
                                                                        id="batch_fountsize">
                                                                        <option value="10px">10px</option>
                                                                        <option value="11px">11px</option>
                                                                        <option value="12px">12px</option>
                                                                        <option value="13px" <?php echo "selected" ; ?>
                                                                            >13px
                                                                        </option>
                                                                        <option value="14px">14px</option>
                                                                        <option value="15px">15px</option>
                                                                        <option value="16px">16px</option>
                                                                        <option value="17px">17px</option>
                                                                        <option value="18px">18px</option>
                                                                        <option value="19px">19px</option>
                                                                        <option value="20px">20px</option>
                                                                        <option value="20px">24px</option>
                                                                        <option value="20px">50px</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group printid-fld">
                                                        <div class="inner-printid-item">
                                                            <label class="control-label">Course :</label>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="form-group d-inline-block">
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="course" id="course_one" value="yes">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="course" id="course_two" value="no">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="d-inline-block">
                                                                <label class="control-label  mx-2">Font Size:</label>
                                                                <div class="form-group d-inline-block">
                                                                    <select class="form-control" name="course_fountsize"
                                                                        id="course_fountsize">
                                                                        <option value="10px">10px</option>
                                                                        <option value="11px">11px</option>
                                                                        <option value="12px">12px</option>
                                                                        <option value="13px" <?php echo "selected" ; ?>
                                                                            >13px
                                                                        </option>
                                                                        <option value="14px">14px</option>
                                                                        <option value="15px">15px</option>
                                                                        <option value="16px">16px</option>
                                                                        <option value="17px">17px</option>
                                                                        <option value="18px">18px</option>
                                                                        <option value="19px">19px</option>
                                                                        <option value="20px">20px</option>
                                                                        <option value="20px">24px</option>
                                                                        <option value="20px">50px</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group printid-fld">
                                                        <div class="inner-printid-item">
                                                            <label class="control-label">Date :</label>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="form-group d-inline-block">
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="admission_date" id="admission_date_one"
                                                                        value="yes">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="admission_date" id="admission_date_two"
                                                                        value="no">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="d-inline-block">
                                                                <label class="control-label  mx-2">Font Size:</label>
                                                                <div class="form-group d-inline-block">
                                                                    <select class="form-control"
                                                                        name="admission_date_fountsize"
                                                                        id="date_fountsize">
                                                                        <option value="10px">10px</option>
                                                                        <option value="11px">11px</option>
                                                                        <option value="12px">12px</option>
                                                                        <option value="13px" <?php echo "selected" ; ?>
                                                                            >13px
                                                                        </option>
                                                                        <option value="14px">14px</option>
                                                                        <option value="15px">15px</option>
                                                                        <option value="16px">16px</option>
                                                                        <option value="17px">17px</option>
                                                                        <option value="18px">18px</option>
                                                                        <option value="19px">19px</option>
                                                                        <option value="20px">20px</option>
                                                                        <option value="20px">24px</option>
                                                                        <option value="20px">50px</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group printid-fld">
                                                        <div class="inner-printid-item">
                                                            <label class="control-label">Gr Id :</label>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="form-group d-inline-block">
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="gr_id" id="gr_id_one" value="yes">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="gr_id" id="gr_id_two" value="no">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="d-inline-block">
                                                                <label class="control-label  mx-2">Font Size:</label>
                                                                <div class="form-group d-inline-block">
                                                                    <select class="form-control" name="gr_id_fountsize"
                                                                        id="gr_id_fountsize">
                                                                        <option value="10px">10px</option>
                                                                        <option value="11px">11px</option>
                                                                        <option value="12px">12px</option>
                                                                        <option value="13px" <?php echo "selected" ; ?>
                                                                            >13px
                                                                        </option>
                                                                        <option value="14px">14px</option>
                                                                        <option value="15px">15px</option>
                                                                        <option value="16px">16px</option>
                                                                        <option value="17px">17px</option>
                                                                        <option value="18px">18px</option>
                                                                        <option value="19px">19px</option>
                                                                        <option value="20px">20px</option>
                                                                        <option value="20px">24px</option>
                                                                        <option value="20px">50px</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group printid-fld">
                                                        <div class="inner-printid-item">
                                                            <label class="control-label">Logo :</label>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="form-group d-inline-block">
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="logo_permi" id="logo_permi_one"
                                                                        value="yes">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="logo_permi" id="logo_permi_two"
                                                                        value="no">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="d-inline-block">
                                                                <label class="control-label  mx-2">width:</label>
                                                                <div class="form-group d-inline-block w-50">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Px" value="<?php echo " 130px"; ?>"
                                                                    name="logo_width"
                                                                    id="logo_width">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group printid-fld">
                                                        <div class="inner-printid-item">
                                                            <label class="control-label">Duration :</label>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="form-group d-inline-block">
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="duration" id="duration_one" value="yes">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="duration" id="duration_two" value="no">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="d-inline-block">
                                                                <label class="control-label  mx-2">Font Size:</label>
                                                                <div class="form-group d-inline-block">
                                                                    <select class="form-control"
                                                                        name="duration_fountsize"
                                                                        id="duration_fountsize">
                                                                        <option value="10px">10px</option>
                                                                        <option value="11px">11px</option>
                                                                        <option value="12px">12px</option>
                                                                        <option value="13px" <?php echo "selected" ; ?>
                                                                            >13px
                                                                        </option>
                                                                        <option value="14px">14px</option>
                                                                        <option value="15px">15px</option>
                                                                        <option value="16px">16px</option>
                                                                        <option value="17px">17px</option>
                                                                        <option value="18px">18px</option>
                                                                        <option value="19px">19px</option>
                                                                        <option value="20px">20px</option>
                                                                        <option value="20px">24px</option>
                                                                        <option value="20px">50px</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group printid-fld">
                                                        <div class="inner-printid-item">
                                                            <label class="control-label">Photo :</label>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="form-group d-inline-block">
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="photos" id="photo_one" value="yes">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="photo" id="photo_two" value="no">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="d-inline-block">
                                                                <label class="control-label  mx-2">width:</label>
                                                                <div class="form-group d-inline-block w-50">
                                                                    <input type="text" class="form-control"
                                                                        name="photo_width" value="<?php echo " 60px";
                                                                        ?>" id="photo_width"
                                                                    placeholder="Px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group printid-fld">
                                                        <div class="inner-printid-item">
                                                            <label class="control-label">Parents No :</label>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="form-group d-inline-block">
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="parentsno" id="parentsno_one" value="yes">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="parentsno" id="parentsno_two" value="no">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="d-inline-block">
                                                                <label class="control-label  mx-2">Font Size:</label>
                                                                <div class="form-group d-inline-block">
                                                                    <select class="form-control"
                                                                        name="parentsno_fountsize"
                                                                        id="parentsno_fountsize">
                                                                        <option value="10px">10px</option>
                                                                        <option value="11px">11px</option>
                                                                        <option value="12px">12px</option>
                                                                        <option value="13px" <?php echo "selected" ; ?>
                                                                            >13px
                                                                        </option>
                                                                        <option value="14px">14px</option>
                                                                        <option value="15px">15px</option>
                                                                        <option value="16px">16px</option>
                                                                        <option value="17px">17px</option>
                                                                        <option value="18px">18px</option>
                                                                        <option value="19px">19px</option>
                                                                        <option value="20px">20px</option>
                                                                        <option value="20px">24px</option>
                                                                        <option value="20px">50px</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group printid-fld">
                                                        <div class="inner-printid-item">
                                                            <label class="control-label">Website :</label>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="form-group d-inline-block">
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="website" id="website_one" value="yes">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="website" id="website_two" value="no">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="d-inline-block">
                                                                <label class="control-label  mx-2">Font Size:</label>
                                                                <div class="form-group d-inline-block">
                                                                    <select class="form-control"
                                                                        name="website_fountsize" id="website_fountsize">
                                                                        <option value="10px">10px</option>
                                                                        <option value="11px" <?php echo "selected" ; ?>
                                                                            >11px
                                                                        </option>
                                                                        <option value="12px">12px</option>
                                                                        <option value="13px">13px</option>
                                                                        <option value="14px">14px</option>
                                                                        <option value="15px">15px</option>
                                                                        <option value="16px">16px</option>
                                                                        <option value="17px">17px</option>
                                                                        <option value="18px">18px</option>
                                                                        <option value="19px">19px</option>
                                                                        <option value="20px">20px</option>
                                                                        <option value="20px">24px</option>
                                                                        <option value="20px">50px</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group printid-fld">
                                                        <div class="inner-printid-item">
                                                            <label class="control-label">Tagline :</label>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="form-group d-inline-block">
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="tagline" id="tagline_one" value="yes">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="tagline" id="tagline_two" value="no">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="inner-printid-item">
                                                            <div class="d-inline-block">
                                                                <label class="control-label  mx-2">Font Size:</label>
                                                                <div class="form-group d-inline-block">
                                                                    <select class="form-control"
                                                                        name="tagline_fountsize" id="tagline_fountsize">
                                                                        <option value="10px">10px</option>
                                                                        <option value="11px">11px</option>
                                                                        <option value="12px">12px</option>
                                                                        <option value="13px" <?php echo "selected" ; ?>
                                                                            >13px
                                                                        </option>
                                                                        <option value="14px">14px</option>
                                                                        <option value="15px">15px</option>
                                                                        <option value="16px">16px</option>
                                                                        <option value="17px">17px</option>
                                                                        <option value="18px">18px</option>
                                                                        <option value="19px">19px</option>
                                                                        <option value="20px">20px</option>
                                                                        <option value="20px">24px</option>
                                                                        <option value="20px">50px</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <h5 class="text-dark mb-4">Theme Option</h5>
                                                    <div class="w-100 form-group">
                                                        <div class="d-inline-block">
                                                            <label class="control-label  mx-2">Layout :</label>
                                                            <div class="form-group d-inline-block">
                                                                <select class="form-control" name="layout" id="layout">
                                                                    <option value="Vertical" <?php echo "selected" ; ?>
                                                                        >Vertical
                                                                    </option>
                                                                    <option value="Horizontal">Horizontal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-100 form-group row">
                                                        <div class="col-md-6">
                                                            <label class="control-label  mx-2">Width :</label>
                                                            <div class="form-group d-inline-block w-50">
                                                                <input type="text" class="form-control"
                                                                    name="layout_width" id="layout_width"
                                                                    value="<?php echo " 205px"; ?>"
                                                                placeholder="px" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            &nbsp;&nbsp; <i class="fa fa-close"></i>
                                                            <label class="control-label  mx-2">Height :</label>
                                                            <div class="form-group d-inline-block w-50">
                                                                <input type="text" class="form-control"
                                                                    name="layout_height" id="layout_height"
                                                                    value="<?php echo " 388px"; ?>"
                                                                placeholder="px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <div class="w-100 form-group">
                                                        <div class="d-inline-block">
                                                            <label class="control-label  mx-2">Background Color
                                                                :</label>
                                                            <div class="form-group d-inline-block">
                                                                <input type="color" name="Background_color"
                                                                    id="Background_color" value="<?php echo " #ffffff";
                                                                    ?>"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <a  href="#carouselExampleControls" role="button"
                                          data-slide="next">
                                          <input type="button" name="next" class="next action-button btn btn-primary"
                                             onclick="preview()" value="Next" />
                                       </a>
                                    </fieldset>
                                </div>
                                <div class="carousel-item">
                                    <fieldset>
                                       <input type="hidden" class="form-control" name="namexpos" id="namexpos">
                                       <input type="hidden" class="form-control" name="nameypos" id="nameypos">
                                       <input type="hidden" class="form-control" name="branchxpos" id="branchxpos">
                                       <input type="hidden" class="form-control" name="branchypos" id="branchypos">
                                       <input type="hidden" class="form-control" name="logoxpos" id="logoxpos">
                                       <input type="hidden" class="form-control" name="logoypos" id="logoypos">
                                       <input type="hidden" class="form-control" name="photoxpos" id="photoxpos">
                                       <input type="hidden" class="form-control" name="photoypos" id="photoypos">
                                       <input type="hidden" class="form-control" name="datexpos" id="datexpos">
                                       <input type="hidden" class="form-control" name="dateypos" id="dateypos">
                                       <input type="hidden" class="form-control" name="gr_idxpos" id="gr_idxpos">
                                       <input type="hidden" class="form-control" name="gr_idypos" id="gr_idypos">
                                       <input type="hidden" class="form-control" name="coursexpos" id="coursexpos">
                                       <input type="hidden" class="form-control" name="courseypos" id="courseypos">
                                       <input type="hidden" class="form-control" name="durationxpos" id="durationxpos">
                                       <input type="hidden" class="form-control" name="durationypos" id="durationypos">
                                       <input type="hidden" class="form-control" name="parentsnoxpos" id="parentsnoxpos">
                                       <input type="hidden" class="form-control" name="parentsnoypos" id="parentsnoypos">
                                       <input type="hidden" class="form-control" name="websitesxpos" id="websitesxpos">
                                       <input type="hidden" class="form-control" name="websitesypos" id="websitesypos">
                                       <input type="hidden" class="form-control" name="taglinesxpos" id="taglinesxpos">
                                       <input type="hidden" class="form-control" name="taglinesypos" id="taglinesypos">
                                       <div class="invoice-wrapper" id="cardlayout">
                                          <div class="inner-idcard" id="bgcolor">
                                                <div class="logo">
                                                   <img src="https://demo.rnwmultimedia.com/dist/branchlogo/1620624783rnw-logo.png"
                                                      alt="Id card logo" id="logo" />
                                                </div>
                                                <div class="print-id">
                                                   <img src="http://demo.rnwmultimedia.com/dist/admissiondocuments/1619753367user-8.png"
                                                      id="photo" />
                                                   <h4 id="firstname_preview"><strong>Jone </strong> <strong>Dou </strong></h4>
                                                   <h5 id="date">Date: <span>24-Apr-2021</span></h5>
                                                   <h5 id="gr_id">GR ID: <span>101</span></h5>
                                                   <h5 id="branch">Branch: <span> RW4 </span></h5>
                                                   <h5 id="course">Course: <span> GIM-2020 </span></h5>
                                                   <h5 id="duration">Duration: <span> 16 M </span></h5>
                                                   <h5 id="parentsno">Parents No: <span>8956324578</span></h5>
                                                </div>
                                                <p id="websites">http://www.rnwmultimedia.com</p>
                                                <div class="tagline" id="taglines">
                                                   One Step in Changing Education Chain..
                                                </div>
                                          </div>
                                       </div>
                                       <a  href="#carouselExampleControls" role="button"
                                          data-slide="prev">
                                          <input type="button" name="previous" class="previous action-button btn btn-primary"
                                             value="Previous" />
                                       </a>
                                       <input type="submit" name="submit" id="submit" class="submit action-button btn btn-primary"
                                          value="Submit" />
                                    </fieldset>
                                    
                                </div>
                               
                            </div>
                           
                           
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
<script
    src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>
<!-- <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-steps/jquery.steps.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/js/page/form-wizard.js"></script> -->
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/cleave.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.0-beta/js/bootstrap-select.min.js"></script>
<script
    src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript">
   $('.carousel').carousel({
      interval: false,
   });
</script>
<script>
    function resetval() {
        $(".idcard_add")[0].reset();
    }

    function preview() {
        var firstname_fontsize = $('#firstname_fontsize').val();
        document.getElementById("firstname_preview").style.fontSize = firstname_fontsize;
        var surname_fountsize = $('#surname_fountsize').val();
        document.getElementById("firstname_preview").style.fontSize = surname_fountsize;
        var branch = $('#branch_fount_size').val();
        document.getElementById("branch").style.fontSize = branch;
        var date = $('#date_fountsize').val();
        document.getElementById("date").style.fontSize = date;
        var gr_id = $('#gr_id_fountsize').val();
        document.getElementById("gr_id").style.fontSize = gr_id;
        var course = $('#course_fountsize').val();
        document.getElementById("course").style.fontSize = course;
        var duration = $('#duration_fountsize').val();
        document.getElementById("duration").style.fontSize = duration;
        var parentsno = $('#parentsno_fountsize').val();
        document.getElementById("parentsno").style.fontSize = parentsno;
        var photo = $('#photo_width').val();
        document.getElementById("photo").style.width = photo;
        var logo = $('#logo_width').val();
        document.getElementById("logo").style.width = logo;
        var layout_width = $('#layout_width').val();
        document.getElementById("cardlayout").style.width = layout_width;
        var layout_height = $('#layout_height').val();
        document.getElementById("cardlayout").style.height = layout_height;
        var Background_color = $('#Background_color').val();
        document.getElementById("bgcolor").style.backgroundColor = Background_color;
        var website = $('#website_fountsize').val();
        document.getElementById("websites").style.fontSize = website;
        var tagline = $('#tagline_fountsize').val();
        document.getElementById("taglines").style.fontSize = tagline;
        $('#firstname_preview').draggable({
            drag: function () {
                var fp = document.querySelector('#firstname_preview');
                var nameleft = fp.style.left;
                var nametop = fp.style.top;
                $('#namexpos').val(nameleft);
                $('#nameypos').val(nametop);
            }
        });
        // var name = $('#firstname_preview').position();
        // var dexpos = name.left;
        // var deypos = name.top;
        // $('#namexpos').val(dexpos);
        // $('#nameypos').val(deypos);

        $('#branch').draggable({
            drag: function () {
                var b = document.querySelector('#branch');
                var bleft = b.style.left;
                var btop = b.style.top;
                $('#branchxpos').val(bleft);
                $('#branchypos').val(btop);
            }
        });
        // var branch = $('#branch').position();
        // var dexpos = branch.left;
        // var deypos = branch.top;
        // $('#branchxpos').val(dexpos);
        // $('#branchypos').val(deypos);

        $('#logo').draggable({
            drag: function () {
                var lp = document.querySelector('#logo');
                var logoleft = lp.style.left;
                var logotop = lp.style.top;
                $('#logoxpos').val(logoleft);
                $('#logoypos').val(logotop);
            }
        });
        // var logo = $('#logo').position();
        // var dexpos = logo.left;
        // var deypos = logo.top;
        // $('#logoxpos').val(dexpos);
        // $('#logoypos').val(deypos);

        $('#photo').draggable({
            drag: function () {
                var pp = document.querySelector('#photo');
                var pleft = pp.style.left;
                var ptop = pp.style.top;
                $('#photoxpos').val(pleft);
                $('#photoypos').val(ptop);
            }
        });
        // var photo = $('#photo').position();
        // var dexpos = photo.left;
        // var deypos = photo.top;
        // $('#photoxpos').val(dexpos);
        // $('#photoypos').val(deypos);

        $('#date').draggable({
            drag: function () {
                var d = document.querySelector('#date');
                var dleft = d.style.left;
                var dtop = d.style.top;
                $('#datexpos').val(dleft);
                $('#dateypos').val(dtop);
            }
        });
        // var date = $('#date').position();
        // var dexpos = date.left;
        // var deypos = date.top;
        // $('#datexpos').val(dexpos);
        // $('#dateypos').val(deypos);

        $('#gr_id').draggable({
            drag: function () {
                var grid = document.querySelector('#gr_id');
                var gridleft = grid.style.left;
                var gridtop = grid.style.top;
                $('#gr_idxpos').val(gridleft);
                $('#gr_idypos').val(gridtop);
            }
        });
        // var gr_id = $('#gr_id').position();
        // var dexpos = gr_id.left;
        // var deypos = gr_id.top;
        // $('#gr_idxpos').val(dexpos);
        // $('#gr_idypos').val(deypos);

        $('#course').draggable({
            drag: function () {
                var course = document.querySelector('#course');
                var courseleft = course.style.left;
                var coursetop = course.style.top;
                $('#coursexpos').val(courseleft);
                $('#courseypos').val(coursetop);
            }
        });
        // var course = $('#course').position();
        // var dexpos = course.left;
        // var deypos = course.top;
        // $('#coursexpos').val(dexpos);
        // $('#courseypos').val(deypos);

        $('#duration').draggable({
            drag: function () {
                var duration = document.querySelector('#duration');
                var durationleft = duration.style.left;
                var durationtop = duration.style.top;
                $('#durationxpos').val(durationleft);
                $('#durationypos').val(durationtop);
            }
        });
        // var duration = $('#duration').position();
        // var dexpos = duration.left;
        // var deypos = duration.top;
        // $('#durationxpos').val(dexpos);
        // $('#durationypos').val(deypos);

        $('#parentsno').draggable({
            drag: function () {
                var parentsno = document.querySelector('#parentsno');
                var parentsnoleft = parentsno.style.left;
                var parentsnotop = parentsno.style.top;
                $('#parentsnoxpos').val(parentsnoleft);
                $('#parentsnoypos').val(parentsnotop);
            }
        });
        // var parentsno = $('#parentsno').position();
        // var pxpos = parentsno.left;
        // var pypos = parentsno.top;
        // $('#parentsnoxpos').val(pxpos);
        // $('#parentsnoypos').val(pypos);

        $('#websites').draggable({
            drag: function () {
                var websites = document.querySelector('#websites');
                var websitesleft = websites.style.left;
                var websitestop = websites.style.top;
                $('#websitesxpos').val(websitesleft);
                $('#websitesypos').val(websitestop);
            }
        });
        // var websites = $('#websites').position();
        // var dexpos = websites.left;
        // var deypos = websites.top;
        // $('#websitesxpos').val(dexpos);
        // $('#websitesypos').val(deypos);

        $('#taglines').draggable({
            drag: function () {
                var taglines = document.querySelector('#taglines');
                var taglinesleft = taglines.style.left;
                var taglinestop = taglines.style.top;
                $('#taglinesxpos').val(taglinesleft);
                $('#taglinesypos').val(taglinestop);
            }
        });
        // var taglines = $('#taglines').position();
        // var dexpos = taglines.left;
        // var deypos = taglines.top;
        // $('#taglinesxpos').val(dexpos);
        // $('#taglinesypos').val(deypos);
    }
</script>
<!-- <script type="text/javascript">
    //jQuery time
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches

    $(".next").click(function () {
        if (animating) return false;
        animating = true;

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //activate next step on progressbar using the index of next_fs
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function (now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = (now * 50) + "%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
                    'transform': 'scale(' + scale + ')',
                    'position': 'relative'
                });
                next_fs.css({ 'left': left, 'opacity': opacity });
            },
            duration: 800,
            complete: function () {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });

    $(".previous").click(function () {
        if (animating) return false;
        animating = true;

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //de-activate current step on progressbar
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function (now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale previous_fs from 80% to 100%
                scale = 0.8 + (1 - now) * 0.2;
                //2. take current_fs to the right(50%) - from 0%
                left = ((1 - now) * 50) + "%";
                //3. increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                // position = relative;
                current_fs.css({ 'left': left });
                previous_fs.css({ 'transform': 'scale(' + scale + ')', 'opacity': opacity });
            },
            duration: 800,
            complete: function () {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });
</script> -->
<script>
    $(".idcard_add").validate({
        rules: {
            w_template_name: {
                required: true,
            },
            w_template_message: {
                required: true
            }
        },
        messages: {
            w_template_name: {
                required: "<div style='color:red'>Enter Template Name</div>",
            },
            w_template_message: {
                required: "<div style='color:red'>Please enter template Message</div>"
            }
        },
        submitHandler: function () {
            event.preventDefault();
            var form = $('.idcard_add')[0];
            var data = new FormData(form);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "<?php echo base_url(); ?>Admission/ajax_idcard",
                type: "post",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function (resp) {
                    var data = $.parseJSON(resp);
                    var ddd = data['all_record'].status;
                    if (ddd == '1') {
                        $('#msg_icard').html(iziToast.success({
                            title: 'Success',
                            timeout: 2000,
                            message: 'HI! This Record Inserted.',
                            position: 'topRight'
                        }));

                        setTimeout(function () {
                            location.reload();
                        }, 2020);
                    } else if (ddd == '2') {
                        $('#msg_icard').html(iziToast.success({
                            title: 'success',
                            timeout: 2000,
                            message: 'HI! This Record Updated',
                            position: 'topRight'
                        }));

                        setTimeout(function () {
                            location.reload();
                        }, 2020);
                    }
                    else if (ddd == '3') {
                        $('#msg_icard').html(iziToast.error({
                            title: 'Canceled!',
                            timeout: 2000,
                            message: 'Someting Wrong!!',
                            position: 'topRight'
                        }));

                        setTimeout(function () {
                            location.reload();
                        }, 2020);
                    }
                }
            });
        }
    });

    function idcard_upd(idcard_id) {
        $.ajax({
            url: "<?php echo base_url(); ?>Admission/get_record_idcard",
            type: "post",
            data: {
                'idcard_id': idcard_id
            },
            success: function (resp) {
                $("#exampleModalCenter").modal();
                var data = $.parseJSON(resp);
                var idcard_id = data['single_record'].idcard_id;
                var department_id = data['single_record'].department_id;
                var logo = data['single_record'].logo;
                var branch = data['single_record'].branch;
                var batch = data['single_record'].batch;
                var course = data['single_record'].course;
                var photos = data['single_record'].photos;
                var surname = data['single_record'].surname;
                var name = data['single_record'].name;
                var admission_date = data['single_record'].admission_date;
                var duration = data['single_record'].duration;
                var gr_id = data['single_record'].gr_id;
                var logo_permi = data['single_record'].logo_permi;
                var parentsno = data['single_record'].parentsno;
                var website = data['single_record'].website;
                var tagline = data['single_record'].tagline;
                var firstname_fontsize = data['single_record'].firstname_fontsize;
                var surname_fountsize = data['single_record'].surname_fountsize;
                var branch_fount_size = data['single_record'].branch_fount_size;
                var batch_fountsize = data['single_record'].batch_fountsize;
                var course_fountsize = data['single_record'].course_fountsize;
                var admission_date_fountsize = data['single_record'].admission_date_fountsize;
                var gr_id_fountsize = data['single_record'].gr_id_fountsize;
                var logo_width = data['single_record'].logo_width;
                var duration_fountsize = data['single_record'].duration_fountsize;
                var photo_width = data['single_record'].photo_width;
                var parentsno_fountsize = data['single_record'].parentsno_fountsize;
                var website_fountsize = data['single_record'].website_fountsize;
                var tagline_fountsize = data['single_record'].tagline_fountsize;
                var layout = data['single_record'].layout;
                var layout_width = data['single_record'].layout_width;
                var layout_height = data['single_record'].layout_height;
                var Background_color = data['single_record'].Background_color;

                $('#idcard_id').val(idcard_id);
                $('#logo').attr("src", "http://demo.rnwmultimedia.com/dist/branchlogo/" + logo);
                $('#depid').val(department_id);
                if (branch == "yes") {
                    $("#branch_one").prop("checked", true);
                }
                else {
                    $("#branch_two").prop("checked", true);
                }
                if (batch == "yes") {
                    $("#batch_one").prop("checked", true);
                }
                else {
                    $("#batch_two").prop("checked", true);
                }
                if (course == "yes") {
                    $("#course_one").prop("checked", true);
                }
                else {
                    $("course_two").prop("checked", true);
                }
                if (photos == "yes") {
                    $("#photo_one").prop("checked", true);
                }
                else {
                    $("#photo_two").prop("checked", true);
                }
                if (surname == "yes") {
                    $("#surname_one").prop("checked", true);
                }
                else {
                    $("#surname_two").prop("checked", true);
                }
                if (name == "yes") {
                    $("#name_one").prop("checked", true);
                }
                else {
                    $("#name_two").prop("checked", true);
                }
                if (admission_date == "yes") {
                    $("#admission_date_one").prop("checked", true);
                }
                else {
                    $("#admission_date_two").prop("checked", true);
                }
                if (duration == "yes") {
                    $("#duration_one").prop("checked", true);
                }
                else {
                    $("#duration_two").prop("checked", true);
                }
                if (gr_id == "yes") {
                    $("#gr_id_one").prop("checked", true);
                }
                else {
                    $("#gr_id_two").prop("checked", true);
                }
                if (logo_permi == "yes") {
                    $("#logo_permi_one").prop("checked", true);
                }
                else {
                    $("#logo_permi_two").prop("checked", true);
                }
                if (parentsno == "yes") {
                    $("#parentsno_one").prop("checked", true);
                }
                else {
                    $("#parentsno_two").prop("checked", true);
                }
                if (website == "yes") {
                    $("#website_one").prop("checked", true);
                }
                else {
                    $("#website_two").prop("checked", true);
                }
                if (tagline == "yes") {
                    $("#tagline_one").prop("checked", true);
                }
                else {
                    $("#tagline_two").prop("checked", true);
                }

                $('#firstname_fontsize').val(firstname_fontsize);
                $('#surname_fountsize').val(surname_fountsize);
                $('#branch_fount_size').val(branch_fount_size);
                $('#batch_fountsize').val(batch_fountsize);
                $('#course_fountsize').val(course_fountsize);
                $('#date_fountsize').val(admission_date_fountsize);
                $('#gr_id_fountsize').val(gr_id_fountsize);
                $('#logo_width').val(logo_width);
                $('#duration_fountsize').val(duration_fountsize);
                $('#photo_width').val(photo_width);
                $('#parentsno_fountsize').val(parentsno_fountsize);
                $('#website_fountsize').val(website_fountsize);
                $('#tagline_fountsize').val(tagline_fountsize);
                $('#layout').val(layout);
                $('#layout_width').val(layout_width);
                $('#layout_height').val(layout_height);
                $('#Background_color').val(Background_color);

                $('#submit').val('Update');
            }

        });
    }

    function remove_thisrow(idcard_idy) {
        var conf = confirm("Are U Sure to Delete Record");
        if (conf) {
            $.ajax({
                url: "<?php echo base_url(); ?>Admission/remove_idcardrow",
                type: "post",
                data: {
                    'idcard_id': idcard_idy
                },
                success: function (resp) {
                    var data = $.parseJSON(resp);
                    var ddd = data['all_record'].status;
                    if (ddd == '1') {
                        $('#deleted_msg').html(iziToast.success({
                            title: 'success',
                            timeout: 2000,
                            message: 'HI! This Record Deleted.',
                            position: 'topRight'
                        }));

                        setTimeout(function () {
                            location.reload();
                        }, 2020);
                    } else if (ddd == '2') {
                        $('#deleted_msg').html(iziToast.error({
                            title: 'Canceled!',
                            timeout: 2000,
                            message: '',
                            position: 'topRight'
                        }));

                        setTimeout(function () {
                            location.reload();
                        }, 2020);
                    }
                }
            });
        }
    }
</script>
<script>
    $(function () {
        $('#table1').DataTable({
            stateSave: true,
            "bDestroy": true
        })
    })
</script>