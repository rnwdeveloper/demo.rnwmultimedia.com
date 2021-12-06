<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<div class="main-content shinings-content">
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <?php if(!empty($msg)) { ?>
                    <div class="col-md-12">
                        <div id="msg_timing_id" class="alert alert-primary">
                            <?php echo $msg; ?>
                        </div>
                    </div>
                    <?php } ?>
                    <form method="post" action="<?php echo base_url(); ?>Admission/erpshiningsheet">
                        <div id="accordion">
                            <div class="accordion">
                                <div class="accordion-header d-flex justify-content-between" style="box-shadow: none;"
                                    role="button" data-toggle="collapse" data-target="#panel-body-1"
                                    aria-expanded="true">
                                    <h4>Shining Sheet</h4>
                                    <div class="card-header-form">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                </div>
                                <div class="accordion-body collapse show pt-4 p-0 border-bottom-0" id="panel-body-1"
                                    data-parent="#accordion">
                                    <div class="form-group">
                                        <label>Course</label>
                                        <select class="form-control" name="course_id" id="course_id" required>
                                            <option value="">Select Course</option>
                                            <?php foreach($list_course as $val) { ?>
                                            <option value="<?php echo $val->course_id; ?>">
                                                <?php echo $val->course_name; ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Sub-Course</label>
                                        <select class="form-control" name="subcourse_id" id="subcourse_id" required>
                                            <option value="">Select Sub-Course</option>
                                            <?php foreach($list_subcourse as $val) { ?>
                                            <option value="<?php echo $val->subcourse_id; ?>">
                                                <?php echo $val->subcourse_name; ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="topic-module">
                                        <div class="form-group mb-0">
                                            <table class="table mb-0" id="dynamic_field">
                                                <tr>
                                                    <td class="p-0"><textarea name="topic[]"
                                                            placeholder="Enter Your Topic"
                                                            class="form-control name_list summernote-simple" rows="4"
                                                            required=""></textarea></td>
                                                    <td class="text-center"><button type="button" name="add" id="add"
                                                            class="btn btn-success"><i class="fas fa-plus"></i></button>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!-- <div class="d-flex align-items-center mb-3" id="dynamic_field">
                                              <div class="col-9 px-0">
                                                  <textarea name="topic[]" placeholder="Enter Your Topic" class="form-control name_list summernote-simple"
                                                    rows="4" required="">
                                                  </textarea>
                                              </div>
                                              <div class="col-3 text-center">
                                                  <button type="button" name="add" id="add" class="btn btn-success"><i class="fas fa-plus"></i></button>
                                              </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="form-s"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-0 mt-2">
                            <input type="submit" name="submit" id="submit" class="btn btn-primary mr-1"
                                value="Submit" />
                            <button type="button" class="btn btn-light" data-toggle="modal"
                                data-target=".erpshining-preview">Preview</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped normal-table table-bordered" id="table2">
                            <thead>
                                <tr>
                                    <th>SNo</th>
                                    <th>Course Name</th>
                                    <th>Topics</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sno=1; foreach ($shining_sheet_data as $val) { if($val->deleted_status=="0") {?>
                                <tr>
                                    <td>
                                        <?php echo $sno; ?>
                                    </td>
                                    <td>
                                        <?php  $course_ids = explode(",",$val->subcourse_id);
                              foreach($list_subcourse as $row) { if(in_array($row->subcourse_id,$course_ids)) {  echo  $row->subcourse_name; }  } ?>
                                    </td>
                                    <td><a href="<?php echo base_url(); ?>Admission/erpshiningtopics?action=qdf&np=<?php echo @$val->subcourse_id; ?>"
                                            class="btn btn-primary" target="_blank">View All</a></td>
                                    <td></td>
                                </tr>
                                <?php $sno++; } }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Shining Data modal -->
<div class="modal fade erpshining-preview" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalCenterTitle">Shining Sheet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
                <div class="sheet-preview">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th rowspan="3" colspan="3"><img
                                            src="https://demo.rnwmultimedia.com/assets/images/rnw-logo.png"
                                            width="200px"></th>
                                    <th colspan="6">FACULTY NAME : <span>Pragati Kachhadiya</span></th>
                                </tr>
                                <tr>
                                    <th colspan="4">STARTING DATE : <span>10/4/2021</span></th>
                                    <th colspan="2">GRID : <span>123</span></th>
                                </tr>
                                <tr>
                                    <th colspan="4">ENDING DATE : <span>10/4/2021</span></th>
                                    <th colspan="2">B. TIME : <span>5:00 PM</span></th>
                                </tr>
                                <tr>
                                    <th colspan="5">STUDENT NAME : <span>Martin Guptil</span></th>
                                    <th colspan="3">GOOGLE CLASSROOM : <span>5645</span></th>
                                </tr>
                                <tr>
                                    <th colspan="5">COURSE NAME : <span>Photoshop Basic</span></th>
                                    <th colspan="3">TOTAL DAYS: <span>___</span>/29</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>Lec.</th>
                                <th class="w-75">Topic</th>
                                <th>Date</th>
                                <th>P/A</th>
                                <th>Feedback</th>
                                <th>Stu. </br>Sign</th>
                                <th>Faculty Sign</th>
                                <th>Assign Stu.</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
<script
    src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- General JS Scripts -->
<!-- JS Libraies -->
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<!-- ERPSHININGSHEET Script Start-->
<script type="text/javascript">
    $(document).ready(function () {
        var i = 1;

        $('#add').click(function () {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td class="p-0 pt-3"><textarea  name="topic[]" placeholder="Enter Your Topic" class="form-control name_list summernote-simple" rows="4" required=""></textarea></td><td class="text-center"><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

    });
</script>
<script>

    if (document.getElementById("msg_timing_id") != null) {
        setTimeout(function () {
            document.getElementById('msg_timing_id').style.display = 'none';
        }, 2520);
    }
</script>
<script>
    $('#table2').DataTable({
        'stateSave': true
    })
</script>
<script type="text/javascript">
    $('#course_id').change(function () {

        var course_id = $('#course_id').val();

        $.ajax({
            url: "<?php echo base_url(); ?>AddmissionController/get_subcourse",
            method: "POST",
            data: { 'course_id': course_id },
            success: function (data) {
                $('#subcourse_id').html(data);
            }
        });
    });
</script>
</body>


</html>