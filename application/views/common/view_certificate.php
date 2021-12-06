<link href="https://fonts.googleapis.com/css2?family=Lustria&display=swap" rel="stylesheet">
<link rel="stylesheet"   
   href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<div id="app">
   <div class="main-wrapper main-wrapper-1">
      <div class="main-content">
         <div class="extra_lead_menu">
            <div class="col-12 d-flex justify-content-between mb-3">
               <h6 class="page-title text-dark mb-3">Certificate Request</h6>
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb p-0">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Certificate</li>
                  </ol>
               </nav>
            </div>
            <section class="section">
               <div class="section-body">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header">
                           <ul class="nav active_tab" id="pills-tab" role="tablist">
                              <li class="nav-item mr-2">
                                 <a class="nav-link btn btn-primary shadow-none active" id="pills-certificate-request-tab" data-toggle="pill" href="#pills-certificate-request" role="tab" aria-controls="pills-certificate-request" aria-selected="true">Certificate Request</a>
                              </li>
                              <li class="nav-item mr-2">
                                 <a class="nav-link btn btn-primary shadow-none" id="pills-cconfirm-ertificate-request-tab" data-toggle="pill" href="#pills-cconfirm-ertificate-request" role="tab" aria-controls="pills-cconfirm-ertificate-request" aria-selected="false">Confirm Certificate Request</a>
                              </li>
                           </ul>
                           <div class="card-header-form ml-auto"> 
                              <button class="btn btn-info" data-toggle="modal" data-target=".add_certificate_request_modal"><i class="fas fa-plus"></i></button>
                           </div>
                        </div>
                        <div class="card-body">
                           <div class="tab-content" id="pills-tabContent">
                              <div class="tab-pane fade active show" id="pills-certificate-request" role="tabpanel" aria-labelledby="pills-certificate-request-tab">
                                 <div class="table-responsive">
                                    <table class="table table-striped normal-table" id="table1">
                                       <thead>
                                          <tr>
                                             <th>No</th>
                                             <th>GR ID</th>
                                             <th>Student Name</th>
                                             <th>Course</th>
                                             <th>Start Date</th>
                                             <th>End Date</th>
                                             <th>Duration</th>
                                             <th>Grade</th>
                                             <th>Request Date</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php $sno = 1; foreach($certificate_admi as $key => $val) { if($val->status == 0 && $val->confer_status == 1) {  ?>
                                          <tr>
                                             <td><?php echo $sno; ?></td>
                                             <td><?php echo $val->grid; ?></td>
                                             <td><?php echo $val->name; ?></td>
                                             <td><?php echo $val->course; ?></td>
                                             <td><?php echo $val->sdate;?></td>
                                             <td><?php echo $val->edate;?></td>
                                             <td><?php echo $val->duration; ?></td>
                                             <td><?php echo $val->grade; ?></td>
                                             <td><?php echo $val->IssueDate; ?></td>
                                             <td>
                                                <a href="javascript:cenfirm_certi(<?php echo $val->id; ?>,0)" class="bg-success action-icon text-white btn-success"><i class="fas fa-check"></i></a>
                                                <a href="javascript:remove_req(<?php echo $val->id; ?>,1)" class="bg-danger action-icon text-white btn-danger" target="_blank"><i class="fas fa-trash"></i></a>
                                             </td>
                                          </tr>
                                          <?php $sno++;  } } ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="pills-cconfirm-ertificate-request" role="tabpanel" aria-labelledby="pills-cconfirm-ertificate-request-tab">
                                 <div class="table-responsive">
                                    <table class="table table-striped normal-table" id="table1">
                                       <thead>
                                          <tr>
                                             <th>No</th>
                                             <th>GR ID</th>
                                             <th>Student Name</th>
                                             <th>Course</th>
                                             <th>Start Date</th>
                                             <th>End Date</th>
                                             <th>Duration</th>
                                             <th>Grade</th>
                                             <th>Request Date</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php $sno = 1; foreach($certificate_admi as $key => $val) { if($val->status == 0 && $val->confer_status == 0) {  ?>
                                          <tr>
                                             <td><?php echo $sno; ?></td>
                                             <td><?php echo $val->grid; ?></td>
                                             <td><?php echo $val->name; ?></td>
                                             <td><?php echo $val->course; ?></td>
                                             <td><?php echo $val->sdate;?></td>
                                             <td><?php echo $val->edate;?></td>
                                             <td><?php echo $val->duration; ?></td>
                                             <td><?php echo $val->grade; ?></td>
                                             <td><?php echo $val->IssueDate; ?></td>
                                             <td>
                                                <a href="<?php echo base_url(); ?>DemoReportController/Download_certificate?actio=gfh&id=<?php echo $val->id; ?>" class="bg-primary action-icon text-white btn-primary" target="_blank"><i class="fas fa-eye"></i></a>
                                                <a href="javascript:add_remarks(<?php echo $val->grid; ?>)" class="bg-primary action-icon text-white btn-primary"><i class="far fa-comment-alt"></i></a>
                                             </td>
                                          </tr>
                                          <?php $sno++; } } ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
</div>
<div class="modal fade add_certificate_request_modal" tabindex="-1" role="dialog" aria-labelledby="add_certificate_request_modal" aria-modal="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-dark" id="add_certificate_request_modal">Add Certificate Request</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="form-row">
               <div class="form-group col-md-3">
                  <label for="inputEmail4">GR ID</label>
                  <input type="text" class="form-control fas fa-search search_text sfgdfhdghdhdf" id="search_text" name="search_text" placeholder="Search By GR ID...">
               </div>
               <div class="form-group col-md-3">
                  <label for="inputEmail4">Student Name</label>
                  <input type="text" class="form-control" placeholder="Student Name" id="fullname" readonly>
               </div>
               <div class="form-group col-md-3">
                  <label for="inputEmail4">Branch</label>
                  <select  name="branch_id" id="branch_idb" class="form-control product-branch" required>
                     <option>-----Select Branch-----</option>
                     <?php foreach($branch_all as $val) { if($val->branch_area != ''){  ?>
                     <option value="<?php echo $val->branch_id; ?>"><?php echo $val->branch_area; ?></option>
                     <?php } } ?>
                  </select>
               </div>
               <div class="form-group col-md-3">
                  <label for="inputEmail4">Course name</label>
                  <select  name="branch_id" id="cor_idb" class="form-control product-branch" required>
                     <option>-----Select Branch-----</option>
                     <?php foreach($certificate_course as $val) { ?>
                     <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
                     <?php } ?>
                  </select>
               </div>
               <div class="form-group col-md-3">
                  <label for="inputEmail4">Start Date</label>
                  <input type="date" class="form-control" placeholder="Start Date" id="admi_date">
               </div>
               <div class="form-group col-md-3">
                  <label for="inputEmail4">End Date</label>
                  <input type="date" class="form-control" placeholder="End Date" id="end_date">
               </div>
               <div class="form-group col-md-3">
                  <label for="inputEmail4">Issue Date</label>
                  <input type="date" class="form-control" placeholder="Issue Date" id="iss_date" value="<?php echo date("Y-m-d"); ?>">
               </div>
               <div class="form-group col-md-3">
                  <label for="inputEmail4">Grade</label>
                  <select  name="grade" id="grade" class="form-control product-branch  grade_nmdwbhv" required>
                     <option>-----Select Branch-----</option>
                     <option value="A+">A+</option>
                     <option value="A">A</option>
                     <option value="B+">B+</option>
                     <option value="B">B</option>
                     <option value="C">C</option>
                  </select>
               </div>
            </div>
            <div class="text-right">                   
               <input type="submit" class="btn btn-primary" id="send_request">
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade certificate_remarks" tabindex="-1" role="dialog" aria-labelledby="add_certificate_request_modal" aria-modal="true">
<div class="modal-dialog modal-lg">
   <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title text-dark" id="add_certificate_request_modal">Add Certificate Request</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">×</span>
         </button>
      </div>
      <div class="modal-body">
         <div class="form-row">
            <div class="col-lg-12">
               <div class="form-group">
                  <input type="hidden" class="form-control" id="get_cert_id">
                  <label>Select Rating:</label> 
                  <select class="form-control" name="rating" id="rating" >
                     <option value="">select Rating</option>
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                  </select>
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  <label>Add Remark</label> 
                  <textarea rows="5" class="form-control" id="remarks_ce" name="remarks_ce"></textarea>
               </div>
            </div>
            <div class="text-right">                   
               <input type="submit" class="btn btn-primary" id="ad_rem">
            </div>
         </div>
      </div>
   </div>
</div>

<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/forms-advanced-forms.js"></script>
<!-- General JS Scripts -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/app.min.js"></script>
<!-- JS Libraies -->
<!--Excel Download-->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/table2excel.js"></script> 
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script> 
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/datatables.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File --> 
<!-- <script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>
   <script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>
   <script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>
   <script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script> -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>
<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/custom.js"></script> 
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<!-- Page Specific JS File --> 
<script>
   $(document).ready(function(){
    function load_data(query)
    {
     $.ajax({
      url:"<?php echo base_url(); ?>Account/Serchbygrid",
      method:"POST",
      data:{query:query},
      success:function(resp){
       var data = $.parseJSON(resp);
   
           console.log(data);
         var fullname2 = data['single_record'].surname + " " + data['single_record'].first_name + " " + data['single_record'].father_name;
          $('#fullname').val(fullname2);
   
          var admiid = data['single_record'].admission_id;
          $('#admissionids').val(admiid);
   
          var gid = data['single_record'].gr_id;
          $('#grids').val(gid);
   
          var admi_date = data['single_record'].admission_date;
          $('#admi_date').val(admi_date);
   
          var cotype = data['single_record'].type;
          $('#ctype').val(cotype);
   
          let c = data['single_record'].type;
          if(c == "package") {
           var pa = data['single_record'].package_name;
           $('#allco').val(pa);
          } else if(c == "single") {
           var co = data['single_record'].course_name;
           $('#allco').val(co);
          } else {
           var clg = data['single_record'].college_course_name;
           $('#allco').val(clg);
          }
      }
     });
    }
   
    $('#search_text').keyup(function(){
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
       
</script>
<script>
   $('#send_request').on('click', function() {
       event.preventDefault();
       var gr_id = $('#search_text').val();
       var fullname = $('#fullname').val();
       var branch_id = $('#branch_idb').val();
       var course_name = $('#cor_idb').val();
       var start_date = $('#admi_date').val();
       var end_date = $('#end_date').val();
       var issue_date = $('#iss_date').val();
       var grade = $('.grade_nmdwbhv').val();
       $.ajax({
           type: "POST",
           url: "<?php echo base_url() ?>DemoReportController/add_certificate_request",
           data: { 
               'gr_id' : gr_id,
               'fullname' : fullname,
               'branch_id' : branch_id,
               'course_name' : course_name,
               'start_date' : start_date,
               'end_date' : end_date,
               'issue_date': issue_date,
               'grade': grade
   
           },       
           success: function(resp) {
               var data = $.parseJSON(resp);              
               var ddd = data['all_record'].status;
               if (ddd == '1') {    
                   $('#msg').html(iziToast.success({
                       title: 'Success',
                       timeout: 2500,
                       message: 'HI! New product is Now Inserted.',
                       position: 'topRight'
                   }));  
   
                   setTimeout(function() {
                          location.reload();
                      }, 2520);
                   
               } else if (ddd == '2') {
                   $('#msg').html(iziToast.error({
                       title: 'Canceled!',
                       timeout: 2500,
                       message: 'Comthing went Wrong.',
                       position: 'topRight'
                   }));
                   setTimeout(function() {
                          location.reload();
                      }, 2520);
   
               } else if (ddd == '4') {
                   $('#msg').html(iziToast.error({
                       title: 'Canceled!',
                       timeout: 2500,
                       message: 'Pls compte your course or pay complete tutuion fees',
                       position: 'topRight'
                   }));
                   setTimeout(function() {
                          location.reload();
                      }, 2520);
   
               } 
           }    
       });
      });
   
   
   
      function cenfirm_certi(id , confer_status) {
           $.ajax({
             url: "<?php echo base_url(); ?>Common/update_status",
             type: "post",
             data: {
               'id': id,
               'status': confer_status,
               'table': 'admission_certificate',
               'field': 'confer_status',
               'check_field': 'id'
             },
             success: function(resp) {
               var data = $.parseJSON(resp);
               var ddd = data['status'].status;
               console.log("dddddd", ddd);
               if (ddd == '1') {
                 $('#msg').html(iziToast.success({
                   title: 'Success',
                   timeout: 2000,
                   message: 'HI! record status updated.',
                   position: 'topRight'
                 }));
                 
                 setTimeout(function() {
                          location.reload();
                      }, 2520);
                 
               } else if (ddd == '2') {
                 $('#msg').html(iziToast.error({
                   title: 'Canceled!',
                   timeout: 2000,
                   message: 'Try Again!!!!',
                   position: 'topRight'
                 }));
               }
             }
           });
           return false;
      }





      function add_remarks(grid='')
      {
         $.ajax({
            url: "<?php echo base_url(); ?>DemoReportController/Add_certificate_remark",
            type: "post",
            data: {
                  'grid': grid 
            },
            success: function(resp) {
               var data = $.parseJSON(resp);      
               $("#get_cert_id").val(data['single_reco'].admission_id);
               $('.certificate_remarks').modal();
            }
         });
      }
   
   
   
      $('#ad_rem').on('click', function() {
       event.preventDefault();
       var admission_id = $('#get_cert_id').val();
       var rating = $('#rating').val();
       var remark = $('#remarks_ce').val();
       $.ajax({
           type: "POST",
           url: "<?php echo base_url() ?>DemoReportController/rmark_certi",
           data: { 
               'admission_id' : admission_id,
               'rating' : rating,
               'remark' : remark   
           },       
           success: function(resp) {
               var data = $.parseJSON(resp);              
               var ddd = data['all_record'].status;
               if (ddd == '1') {    
                   $('#msg').html(iziToast.success({
                       title: 'Success',
                       timeout: 2500,
                       message: 'HI! New product is Now Inserted.',
                       position: 'topRight'
                   }));  
   
                   setTimeout(function() {
                          location.reload();
                      }, 2520);
                   
               } else if (ddd == '2') {
                   $('#msg').html(iziToast.error({
                       title: 'Canceled!',
                       timeout: 2500,
                       message: 'Comthing went Wrong.',
                       position: 'topRight'
                   }));
                   setTimeout(function() {
                          location.reload();
                      }, 2520);
   
               } 
           }    
       });
      });   
</script>
</body>
</html>