
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">
  
  <style>
/* The customcheck */
.customcheck {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.customcheck input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 5px;
}

/* On mouse-over, add a grey background color */
.customcheck:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.customcheck input:checked ~ .checkmark {
    background-color: #02cf32;
    border-radius: 5px;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.customcheck input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.customcheck .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>

<style>
    .form-group input[type="checkbox"] {
    display: none;
}

.form-group input[type="checkbox"] + .btn-group > label span {
    width: 10px;
}

.form-group input[type="checkbox"] + .btn-group > label span:first-child {
    display: none;
}
.form-group input[type="checkbox"] + .btn-group > label span:last-child {
    display: inline-block;   
}

.form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
    display: inline-block;
}
.form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
    display: none;   
}
</style>
  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          <?php if(@$status=="duplicate") { echo "Duplicate Leads"; } else  { echo "Leads List"; }?>
        
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active"><a href="<?php echo base_url(); ?>Enquiry/leads_list">Leads List</a></li>
        <?php if(@$status=="duplicate") { ?>
         <li class="active"><a href="<?php echo base_url(); ?>Enquiry/leads_list/duplicate"> Duplicate</a></li>
        <?php } ?>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
		
        </div>
        <div class="row">
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-success" style="padding:20px;">
            <div class="box-header with-border">
                <div class="col-md-12">
              <h3 class="box-title">Leads List </h3>
              
              
              <div class="dropdown pull-right">
                            <button class="btn btn-sm btn-info active dropdown-toggle" type="button" data-toggle="dropdown">Action
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url(); ?>Enquiry/newLead"> Add Lead</a></li>
                             
                              <li><a data-toggle="modal" data-target="#myModal_upload">Upload Lead CSV</a></li>
                              <li><a href="<?php echo base_url(); ?>Enquiry/trashed_leads">Trashed Leads</a></li>
                              <li><a href="<?php echo base_url(); ?>Enquiry/leads_list/duplicate">Duplicate Leads</a></li>
                              <li><a onclick="createExcel()">Download Leads List</a></li>
                              
                              <form method="post" id="frm_data" action="<?php  echo base_url();?>Enquiry/download_excel">
                                <input type="hidden" id="tb_data" name="data">  
                                </form>
                             </ul>
                            
                                                          <!-- Modal -->
                                      <div class="modal fade" id="myModal_upload" role="dialog">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Upload Csv File</h4>
                                            </div>
                                            <div class="modal-body">
                                              <form action="<?php echo base_url(); ?>Enquiry/import_csv" method="post" enctype="multipart/form-data">
                                                 
                                                 <div class="form-group">
                                                    <label for="email">Source* :</label>
                                                   <select class="form-control custom-select my-1 mr-sm-2" required  name="lead_source">
                                                        <option selected disabled>Select Source Type</option>
                                                        <?php foreach($all_source as $val) { if($val->source_status=="0" || $val->source_status=="2") { ?>
                                                        <option   value="<?php echo $val->source_name; ?>"> <?php echo $val->source_name; ?></option>
                                                        <?php } } ?>
                                                     </select>
                                                  </div>
                                                  
                                                  <div class="form-group">
                                                    <label for="email">Select File* :</label>
                                                    <input type="file" name="csv_file">
                                                  </div>
                                                        
                                                 <input type="submit" name="submit" value="Import" class="btn btn-sm btn-primary">
                                                </form>
                                                
                                                
                                                <p style="margin-top:50px;">
                                                 <b>   Max Limit: 2000 records, Balance Limit: 1631 records </b>
                                               <br>   <b>  Note: CSV Guidelines</b>
                                                <br>    1. <a href="<?php echo base_url(); ?>dist/Leads_sample_CSV.csv"> Download Sample CSV </a>
                                                    
                                            <br><br>        2. First and Last name should contain alphabets only (spaces allowed).
                                                    
                                            <br><br>        3. Email should be standard email address
                                                    
                                           <br><br>         4. Only 1000 Leads can be uploaded at a time.
                                                    
                                            <br><br>        4. Upload Records Limit - Trial: 100, Basic: 500, Advance: 1000, Premium: 2000, Lite: 0
                                                </p>    
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                          </div>
                          
                          <button type="button" class="btn btn-sm <?php if(!empty($filter_on)) { echo "btn-success"; } else { echo "btn-default"; } ?>  pull-right" data-toggle="modal" data-target="#myModal_filter" style="margin-right:10px;"><i class="fa fa-search" style="margin-right:5px;" aria-hidden="true"></i>Filter <?php if(!empty($filter_on)) { echo "On"; } else { echo "Off"; } ?> </button>
                </div>
                <div class="col-md-2">
                     <div class="[ form-group ]">
                        <input type="checkbox" name="fancy-checkbox-default" id="fancy-checkbox-default" autocomplete="off" />
                        <div class="[ btn-group ]">
                            <label for="fancy-checkbox-default" onclick='selectAll()'  class="[ btn btn-sm btn-default ]">
                                <span class="[ glyphicon glyphicon-ok ]"></span>
                                <span> </span>
                            </label>
                            <label for="fancy-checkbox-default" id="selectall" onclick='selectAll()' class="[ btn btn-sm btn-default active ]">
                                Select All
                            </label>
                            <label for="fancy-checkbox-default" id="unselectall" style="display:none"  onclick='selectAll()' class="[ btn btn-sm btn-default active ]">
                                Deselect All
                            </label>
                        </div>
                    </div>
                 </div>
                <div class="col-md-2">
                     <button type="button" class="btn btn-sm btn-danger" onclick='selectedTrash()'><i class="fa fa-trash" aria-hidden="true"></i> Trash</button>
                     <!-- Modal -->
                      <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                              <div class="modal-header">
                               
                                <h4 class="modal-title"> Are you sure?</h4>
                              </div>
                            
                            <div class="modal-body">
                             <div class="form-group">
                              <label for="comment">Reason:</label>
                              <textarea class="form-control" rows="5" id="trashed_reason"></textarea>
                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" id="trashok" class="btn btn-primary"  >OK</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                          </div>
                          
                        </div>
                      </div>
  
                    
                    
                </div>
            </div>
            <!-- /.box-header -->
            
            <!-- Modal -->
  <div class="modal fade" id="myModal_filter" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Filter  :  Enquiry Leads Data
</h4>
        </div>
        <form method="post" action="<?php  echo base_url(); ?>Enquiry/leads_list">
        <div class="modal-body">
            
                <div class="row">
                                    
                                    <div class="col-md-12 my-2">
                                    <input type="hidden" id="fromdate" name="filter_startDate" value="<?php if(!empty($filter_startDate)) { echo @$filter_startDate; } ?>">
                                    <input type="hidden" id="todate" name="filter_endDate" value="<?php if(!empty($filter_endDate)) { echo @$filter_endDate; } ?>">
                                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                        <i class="fa fa-calendar"></i>&nbsp;
                                        <span><?php if(!empty($filter_startDate) && !empty($filter_endDate)) { echo @$filter_startDate." - ".$filter_endDate; } ?></span> <i class="fa fa-caret-down"></i>
                                    </div>
                                </div>
                </div>
                <div class="row">
                                
                                <div class="col-md-3 my-2">
                                    <label>First Name </label>   
                                    <input type="text" class="form-control" value="<?php if(!empty($filter_fname)) { echo @$filter_fname; } ?>" placeholder="Name"  name="filter_fname">
                                </div>
                                <div class="col-md-3 my-2">
                                    <label>Last Name </label>   
                                    <input type="text" class="form-control" value="<?php if(!empty($filter_lname)) { echo @$filter_lname; } ?>" placeholder="Last name" name="filter_lname" >
                                </div>
                                <div class="col-md-3 my-2">
                                    <label>Email </label>   
                                    <input type="text" class="form-control" value="<?php if(!empty($filter_email)) { echo @$filter_email; } ?>" placeholder="Email" name="filter_email">
                                </div>
                                 <div class="col-md-3 my-2">
                                    <label>Mobile </label>   
                                    <input type="text" class="form-control" value="<?php if(!empty($filter_mobile)) { echo @$filter_mobile; } ?>" placeholder="Lead Mobile" name="filter_mobile">
                                </div>
                                 <div class="col-md-4 my-2">
                                     <label for="Faculty">Source</label>   
                                    <select class="form-control custom-select my-1 mr-sm-2"   name="filter_source">
                                        <option selected disabled>Filter Source</option>
                                        <?php foreach($all_source as $val) { if($val->source_status=="0" || $val->source_status=="2") { ?>
                                        <option  <?php if(@$filter_source==$val->source_name) { echo "selected"; } ?> value="<?php echo $val->source_name; ?>"> <?php echo $val->source_name; ?></option>
                                        <?php } } ?>
                                     </select>
                                </div>
                                <div class="col-md-4 my-2">
                                     <label for="Faculty">Course</label>   
                                    <select class="form-control custom-select my-1 mr-sm-2"   name="filter_course">
                                        <option selected disabled>Filter Course </option>
                                        <?php foreach($all_course as $val) { if($val->status=="0") { ?>
                                        <option   <?php if(@$filter_course==$val->course_id) { echo "selected"; } ?> value="<?php echo $val->course_id; ?>"> <?php echo $val->course_name; ?></option>
                                        <?php } } ?>
                                     </select>
                                </div>
                                <div class="col-md-4 my-2">
                                     <label for="Faculty">Branch</label>   
                                    <select class="form-control custom-select my-1 mr-sm-2"   name="filter_branch">
                                        <option selected disabled>Filter Branch </option>
                                        <?php foreach($all_branch as $val) { if($val->branch_status=="0") { ?>
                                        <option <?php if(@$filter_branch==$val->branch_id) { echo "selected"; } ?> value="<?php echo $val->branch_id; ?>"> <?php echo $val->branch_name; ?></option>
                                        <?php } } ?>
                                     </select>
                                </div>
                               
                                
                </div>
            
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Filter" name="filter_lead" >
          <a class="btn btn-primary" href="<?php echo base_url(); ?>Enquiry/leads_list">Reset</a>
        </div>
        </form>
      </div>
    </div>
  </div>
            <div  id="leads_table">  
              <table  class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>S No</th>
                  <th>Leads Details</th>
                   <th>Course/ Labels/ 
Course Package</th>
                    <th>Branch/
Source Type</th>
                    <th>Lead Date / Time</th>
                    <th>Area/ City/ State</th>
                    <th>Comments</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
            <?php $sno=1; foreach($all_leads as $val) { if($val->trash=="0") { ?>    
                <tr>
                  <td>
                       <label class="customcheck"><?php echo $sno; ?>
                          <input type="checkbox" name="mark" value="<?php echo $val->lead_id; ?>">
                          <span class="checkmark"></span>
                        </label>
                    </td>
                  <td><?php if(!empty($val->lead_name)) { echo $val->lead_name."<br>"; } ?>
                 <?php if(!empty($val->lead_email)) { echo $val->lead_email."<br>"; } ?>
                 <?php if(!empty($val->lead_number)) { echo $val->lead_number."<br>"; } ?>
                  </td>
                  <td>
                      <?php if(!empty($val->lead_course_id)) {
                      foreach($all_course as $row) {
                          if($row->course_id==$val->lead_course_id) {
                              echo $row->course_name;
                          }
                      }
                      } ?>
                      
                      <?php if(!empty($val->lead_package_id)) {
                      foreach($all_package as $row) {
                          if($row->package_id==$val->lead_package_id) {
                              echo $row->package_name;
                          }
                      }
                      } ?>
                      
                  </td>
                  <td> <?php  foreach($all_branch as $row) { if($row->branch_id==$val->lead_branch) { echo $row->branch_name."<br>"; } } ?> 
                  <?php  echo $val->lead_source ?></td>
                  <td><?php echo $val->lead_timestamp; ?></td>
                  <td><?php echo $val->lead_address; ?></td>
                  <td><?php echo $val->lead_message; ?></td>
                  <td>
                     
                  	 <div class="dropdown">
                            <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Action
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a onclick="getleadmsg(<?php echo $val->lead_id; ?>)"> View Original Message</a></li>
                              <li><a href="<?php echo base_url(); ?>Enquiry/newLead?action=edit&id=<?php echo $val->lead_id; ?>"> Edit Lead Details</a></li>
                             
                              <li ><a onclick="addToE(<?php echo $val->lead_id; ?>)">Add to Enquiry</a></li>
                             
                            </ul>
                          </div>
                  	
                  	<form id="frm<?php echo $val->lead_id; ?>" method="post" action="<?php echo base_url(); ?>Enquiry/newEnquiry">
                                      <input type="hidden" value="<?php echo $val->lead_id; ?>" name="lead_add_enquiry">
                            
                                  
                                  
                    </form>
                  	
                  	</td>
                </tr>
                
            <?php $sno++; } } ?>
                
                </tfoot>
              </table>
              
                      <!-- View original msg -->
                      <div class="modal fade" id="myModal_lead_msg" role="dialog">
                        <div class="modal-dialog">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">View Original Message</h4>
                            </div>
                            <div class="modal-body">
                              <p id="ll_mmssgg"></p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                          
                        </div>
                      </div>
          	</div>	
          	
          	
          
            
          </div>
        
        </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
 
	
    
    
    
    
    
    
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Copyright©2018 Red & White Multimedia.</strong> All rights
    reserved.
  </footer>

 
</div>


<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="<?php echo base_url(); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
<!-- page script -->


<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    function addToE(leadid)
    {
        $('#frm'+leadid).submit();
    }
</script>


<script>
    function getleadmsg(lead_id)
    {
         $.ajax({
		 url:'<?php echo base_url(); ?>Enquiry/select_lead_msg',
		 type:"post",
		 dataType:"JSON",
		 data:{'id':lead_id},
		 success: function(data)
		 		{
					
					$('#ll_mmssgg').text(data.selectdata['lead_mail_msg']);
					$('#myModal_lead_msg').modal("show");
					
					
				}
		 });
       
    }
    
</script>

<script>
function createExcel()
{
    
            var excel_data = $('#leads_table').html();  
            $('#tb_data').val(excel_data);
           $('#frm_data').submit();
    
}
</script>

<script type="text/javascript">
            

			function selectAll(){
			    if($('#fancy-checkbox-default').prop("checked") == true){
                    var items=document.getElementsByName('mark');
    				for(var i=0; i<items.length; i++){
    					if(items[i].type=='checkbox')
    						items[i].checked=false;
    				}
    				$('#selectall').show();
    				$('#unselectall').hide();
                }
                else
                {
                    var items=document.getElementsByName('mark');
    				for(var i=0; i<items.length; i++){
    					if(items[i].type=='checkbox')
    						items[i].checked=true;
    				}
    					$('#selectall').hide();
    				$('#unselectall').show();
                }
				
			}
			
			
			function selectedTrash()
			{
			       
			        var lead_ids="";
			        var items=document.getElementsByName('mark');
    				for(var i=0; i<items.length; i++){
    					if(items[i].type=='checkbox')
    					{
    					    if(items[i].checked)
    					    {
    					        if(lead_ids=="")
    					        {
    					            lead_ids =items[i].value;
    					        }
    					        else
    					        {
    					            lead_ids = lead_ids+","+items[i].value;
    					        }
    					    }
    					}
    						
    				}
    				
    				if(lead_ids!="")
    				{
    				    $('#myModal').modal("show").on('click', '#trashok', function(e) {
    				        
    				    var reason = $('#trashed_reason').val();    
    				    if(reason!="")
    				    {
                            window.location.href = "<?php  echo base_url();?>Enquiry/trash_lead?lead_ids="+lead_ids+"&reason="+reason;
    				    }
    				    else
    				    {
    				        alert("PLease Enter Trash Reason");
    				    }
                             
                          
                        });
                        
    				    
    				}
    				else
    				{
    				    
    				    alert("Please Select Row");
    				}
			    
			}
					
		</script>
		
<script>
$('.datepicker').datepicker({
      autoclose: true,
	   format:"yyyy-mm-dd"
	   
	  
    })
    
  $(function () {
    $('.example1').DataTable({
        "pageLength": 25
    })
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script type="text/javascript">
$(function() {

   var start1=moment().subtract(1, 'days');
    var end1=moment();

    
    var start=""
     var end=""
    
    

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
</body>
</html>
