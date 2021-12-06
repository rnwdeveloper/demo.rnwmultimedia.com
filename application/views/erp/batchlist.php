
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <style type="text/css">
  	table.dataTable thead {
    display: none;
}
table.dataTable.no-footer.batchlist-view {
    border: 0 !important;
}
.batchlist-view tr {
    background-color: #fff !important;
    box-shadow: 0 7px 20px -7px #e4e4e4;
}	
table.dataTable.no-footer.batchlist-view {
    border-spacing: 15px;
}
.batch-action a {
    width: 30px;
    height: 30px;
    display: inline-block;
    line-height: 30px;
    border-radius: 30px; 
}
.batchlist-view td {
    padding: 20px 15px;
}

.batch-action i {
    margin-left: 0 !important;
}
  </style>
<div class="main-content"> 
            <div class="row">
              <div class="col-12 d-flex justify-content-between">
                <h6 class="page-title text-dark mb-3">Students Admission Detail</h6>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb p-0">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Library</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data</li>
                  </ol>
                </nav>
            </div>
              <div class="col-12">
                <div class="card"> 
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped batchlist-view" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center pt-3">
                              <div class="custom-checkbox custom-checkbox-table custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                  class="custom-control-input" id="checkbox-all">
                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                              </div>
                            </th>
                            <th>Task Name</th>
                            <th>Progress</th>
                            <th>Members</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody> 
                          <tr class="mb-3">
                            <td class="text-center">
                               <span><strong>Batch Name</strong></span>
                               <p class="mb-0">piyush sir 8am</p>
                            </td>
                            <td class="text-center">
                            	 <span><strong>Batch Code</strong></span>
                               <p class="mb-0">p8am</p>
                            </td>
                            <td class="text-center">
                                <span><strong>Branch</strong></span>
                               <p class="mb-0">RW2</p>
                            </td>
                            <td class="text-center">
                                <span><strong>Faculty</strong></span>
                               <p class="mb-0">Piyush Nakrani</p>
                            </td>
                            <td class="text-center"> 
                            	 <span><strong>Course</strong></span>
                               <p class="mb-0">C++</p>
                            </td>
                            <td class="text-center">
                                <span><strong>View Batch</strong></span>
                               <p class="mb-0"><i class="fas fa-eye"></i></p>
                            </td>
                            <td class="text-center batch-action">
                            	 <a href="#" class="border border-success"><i class="fas fa-pencil-alt text-success"></i></a>
                            	 <a href="#" class="border border-danger"><i class="fas fa-trash-alt text-danger"></i></a>
                            	 <a href="#" class="border border-info"><i class="fas fa-eye text-info"></i></a>
                            </td>
                          </tr>
                          <tr class="mb-3">
                            <td class="text-center">
                               <span><strong>Batch Name</strong></span>
                               <p class="mb-0">piyush sir 8am</p>
                            </td>
                            <td class="text-center">
                            	 <span><strong>Batch Code</strong></span>
                               <p class="mb-0">p8am</p>
                            </td>
                            <td class="text-center">
                                <span><strong>Branch</strong></span>
                               <p class="mb-0">RW2</p>
                            </td>
                            <td class="text-center">
                                <span><strong>Faculty</strong></span>
                               <p class="mb-0">Piyush Nakrani</p>
                            </td>
                            <td class="text-center"> 
                            	 <span><strong>Course</strong></span>
                               <p class="mb-0">C++</p>
                            </td>
                            <td class="text-center">
                                <span><strong>View Batch</strong></span>
                               <p class="mb-0"><i class="fas fa-eye"></i></p>
                            </td>
                            <td class="text-center batch-action">
                            	 <a href="#" class="border border-success"><i class="fas fa-pencil-alt text-success"></i></a>
                            	 <a href="#" class="border border-danger"><i class="fas fa-trash-alt text-danger"></i></a>
                            	 <a href="#" class="border border-info"><i class="fas fa-eye text-info"></i></a>
                            </td>
                          </tr>
                          <tr class="mb-3">
                            <td class="text-center">
                               <span><strong>Batch Name</strong></span>
                               <p class="mb-0">piyush sir 8am</p>
                            </td>
                            <td class="text-center">
                            	 <span><strong>Batch Code</strong></span>
                               <p class="mb-0">p8am</p>
                            </td>
                            <td class="text-center">
                                <span><strong>Branch</strong></span>
                               <p class="mb-0">RW2</p>
                            </td>
                            <td class="text-center">
                                <span><strong>Faculty</strong></span>
                               <p class="mb-0">Piyush Nakrani</p>
                            </td>
                            <td class="text-center"> 
                            	 <span><strong>Course</strong></span>
                               <p class="mb-0">C++</p>
                            </td>
                            <td class="text-center">
                                <span><strong>View Batch</strong></span>
                               <p class="mb-0"><i class="fas fa-eye"></i></p>
                            </td>
                            <td class="text-center batch-action">
                            	 <a href="#" class="border border-success"><i class="fas fa-pencil-alt text-success"></i></a>
                            	 <a href="#" class="border border-danger"><i class="fas fa-trash-alt text-danger"></i></a>
                            	 <a href="#" class="border border-info"><i class="fas fa-eye text-info"></i></a>
                            </td>
                          </tr>
                          <tr class="mb-3">
                            <td class="text-center">
                               <span><strong>Batch Name</strong></span>
                               <p class="mb-0">piyush sir 8am</p>
                            </td>
                            <td class="text-center">
                            	 <span><strong>Batch Code</strong></span>
                               <p class="mb-0">p8am</p>
                            </td>
                            <td class="text-center">
                                <span><strong>Branch</strong></span>
                               <p class="mb-0">RW1</p>
                            </td>
                            <td class="text-center">
                                <span><strong>Faculty</strong></span>
                               <p class="mb-0">Piyush Nakrani</p>
                            </td>
                            <td class="text-center"> 
                            	 <span><strong>Course</strong></span>
                               <p class="mb-0">C++</p>
                            </td>
                            <td class="text-center">
                                <span><strong>View Batch</strong></span>
                               <p class="mb-0"><i class="fas fa-eye"></i></p>
                            </td>
                            <td class="text-center batch-action">
                            	 <a href="#" class="border border-success"><i class="fas fa-pencil-alt text-success"></i></a>
                            	 <a href="#" class="border border-danger"><i class="fas fa-trash-alt text-danger"></i></a>
                            	 <a href="#" class="border border-info"><i class="fas fa-eye text-info"></i></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
</div>
	

<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>

   <script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/cleave.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script>
