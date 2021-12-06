 
<?php @$user_permission =  explode(",",@$_SESSION['user_permission']);
        @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);?>
		
    <?php date_default_timezone_set("Asia/Calcutta");  ?>    

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?php if(!empty($select_demo->demo_id)) { echo "Edit Demo Details"; } else { ?>ADD DEMO STUDENTS <?php } ?>
        <small>  </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Set Time</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
        <?php if(!empty($msg)) { ?>
     	            <div class="col-md-8" >
     	        <?php if(!empty($exist_status)) { ?>
              <div style="padding:2px 5px 2px 5px" class="box yellow bg-red"><?php echo $msg; ?><br>
                <a class="btn btn-warning" target="_blank" href="<?php echo base_url(); ?>Enquiry/demoView/<?php echo $showid; ?>"> Show Demo Record</a>
              </div>
              <?php } else  { ?>
     	        <div style="padding:2px 5px 2px 5px" class="box yellow bg-green"><?php echo $msg; ?><br><h3><?php  echo $showid; ?></h3></div>
              <?php } ?>
     	         </div>
     	    <?php } ?>
     	   
        	        <div class="col-md-8">
      <!-- Default box -->
    		  <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php if(!empty($select_demo->demo_id)) { echo "Edit Demo Details"; } else { ?>ADD NEW DEMO <?php } ?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>welcome/addemo">
         	<input  type="hidden" name="update_id" value="<?php if(!empty($select_demo->demo_id)) { echo $select_demo->demo_id;  } ?>" >
           
               <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Demo Date*</label>

                  <div class="col-sm-10">
                    <input type="text" value="<?php if(!empty($select_demo->demoDate)) { echo $select_demo->demoDate;  }  ?>" class="form-control datepicker" required id="date_selected" name="demoDate" placeholder="Select Demo Date">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Name*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php if(!empty($select_demo->name)) { echo $select_demo->name;  } ?>" name="name" required id="inputEmail3" placeholder="Enter  Name">
                  </div>
                </div>
               
                
                <div class="form-group">
                  <label for="inputPassword3" max-length="12" class="col-sm-2 control-label">MobileNo*</label>

                  <div class="col-sm-10">
                    <input type="text" value="<?php if(!empty($select_demo->mobileNo)) { echo $select_demo->mobileNo;  } ?>" class="form-control" required id="inputPassword3" name="mobileNo">
                  </div>
                </div>
              
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Branch*</label>

                  <div class="col-sm-10">
                    
                
                    <select class="form-control select2" required name="branch_id" id="branch_id" style="width: 100%;" onChange="selectdepart()">
                      <option>Select Branch</option>
                       <?php foreach($branch_all as $row) { 
                           if($row->branch_status=="0") {
					  if(in_array($row->branch_id,$branch_ids) || $_SESSION['logtype']=="Super Admin" || !empty($select_demo->branch_id)) { ?>
                      <option <?php if(@$select_demo->branch_id==$row->branch_id) { echo "selected"; } ?>  value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>
                      <?php } }  } ?>
                    </select>
             
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Department*</label>

                  <div class="col-sm-10" id="display_depart">
                    
                
                    <select class="form-control select2" required name="department_id" id="department" style="width: 100%;" onChange="selectcourse()">
                      <option>Select Department</option>
                     
                      
                       <?php if(!empty($select_demo->department_id)) { foreach($department_all as $row) {  ?>
                      <option <?php if(@$select_demo->department_id==$row->department_id) { echo "selected"; } ?>   value="<?php echo $row->department_id; ?>"><?php echo $row->department_name; ?></option>
                     	<?php  } } ?>
                    </select>
             
                  </div>
                </div>
                
                <?php if(empty($select_demo)) { ?>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label"></label>

                  <div class="col-sm-10">
                        <label class="radio-inline"><input type="radio" <?php if(@$select_demo->course_type=="Single Course") { echo "checked"; } ?> name="course_type" id="singlec" value="Single Course" onclick="whichSelect(1)">Single Course </label>
                        <label class="radio-inline"><input type="radio" <?php if(@$select_demo->course_type=="Package") { echo "checked"; } ?> name="course_type" id="packagec" value="Package" onclick="whichSelect(2)">Package</label>
                   </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Course*</label>

                  <div class="col-sm-10" id="display_course">
                    
                    
                            <select class="form-control" required id="courseName" name="courseName" style="width: 100%;" onChange="select_faculty()">
                              <option value="">Select Course</option>
                              
                             
                                 <?php if(!empty($select_demo->courseName)) { foreach($course_all as $row) { if(@$select_demo->department_id==$row->department_id) {  ?>
                              <option  value="<?php echo $row->course_name; ?>"><?php echo $row->course_name; ?></option>
                             	<?php } }  } ?>
                            </select>
                           
                   
                    
             
                  </div>
                           
                  
                </div>
                <div class="form-group" id="pk_course">
                    
                    
                </div>

                <div class="form-group" id="showCourse" >
                          
                            
                           
                           
                            
                            
                
                
               </div>

                <?php } ?>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label"></label>

                  <div class="col-sm-10">
                        <label class="radio-inline"><input type="radio" id="faculty_type" name="faculty_type" checked value="faculty" onclick="select_hod(this.value)">Faculty</label>
                        <label class="radio-inline"><input type="radio" id="faculty_type" name="faculty_type"  value="hod" onclick="select_hod(this.value)">HOD</label>
                   </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Assign Demo*</label>

                  <div class="col-sm-10" id="display_faculty">
                    
                
                    <select class="form-control" required name="faculty_id" id="faculty" style="width: 100%;" onChange="selecttime()">
                      <option value="">Assign To</option>
                      <?php if(!empty($select_demo->faculty_id)) {  foreach($faculty_all as $row) { 
                      
                      @$bids = explode(",",@$row->branch_ids);
                                       $bname="";
                                      for($i=0;$i<sizeof(@$bids);$i++)
                                        {
                                            foreach($branch_all as $val) {   
                                                if($val->branch_id==@$bids[$i]) { if($bname=="") { $bname = $bname." ".$val->branch_name;}else { $bname = $bname." & ".$val->branch_name; } }
                                            }
                                        }?>
                      <option <?php if(@$select_demo->faculty_id==$row->faculty_id) { echo "selected"; } ?>  value="<?php echo $row->faculty_id; ?>"><?php echo $row->name; ?> -  <?php echo $row->department_name; ?>  - <?php echo $bname; ?> </option>
                     	<?php }  } ?> 
                    </select>
             
                  </div>
                </div>
                
                <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Time*</label>
                  <div class="input-group date">
               		<div class="input-group-addon">
                    <i>To </i>
                  	</div>
                  
                  
                   <div class="input-group">
                    <input type="text" value="<?php if(!empty($select_demo->fromTime)) { echo $select_demo->fromTime;  } ?>" name="fromTime" id="fromTime"   class="form-control timepicker">
                   
                	</div>
                    
                    <div class="input-group">
                    <input type="text" value="<?php if(!empty($select_demo->toTime)) { echo $select_demo->toTime;  } ?>" name="toTime" id="toTime" class="form-control timepicker">
                   
                	</div>
                    
                  
                 
                </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Remarks</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php if(!empty($select_demo->remarks)) { echo $select_demo->remarks;  } ?>" name="remarks"  id="inputEmail3" placeholder="">
                  </div>
                </div>
              
              <div class="box-footer">
                <a  href="<?php echo base_url(); ?>welcome/addemo" class="btn btn-default">Reset</a>
                <input type="submit" name="submit" value="submit" class="btn btn-info pull-right" value="Save">
              </div>
              <!-- /.box-footer -->
            </form>
        </div>
       
      </div>
        	</div>
        	
        
                	<div class="col-md-12">
                	    <div class="container" id="showtime">
                                 
                                  <!-- Modal -->
                      </div>           
                          
                     </div>
        	</div>
    </section>
    <!-- /.content -->
    
                    

    
    
  </div>
  <!-- /.content-wrapper -->
  
  
        <!-- Control Sidebar -->
  
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
<!-- Select2 -->
<script src="<?php echo base_url(); ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url(); ?>plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>

<!-- Page script -->
<script>
    
   if (document.getElementById("yellow") != null) {
    setTimeout(function() {
      document.getElementById('yellow').style.display = 'none';
    }, 5000);
  }
</script>

<script>
    
    



</script>

<script>

    var kb=1;
    function removeCourse(dvid)
    {
       
       $('#'+dvid).remove();
       
    }
     function addCourse()
    {
        
        var course = $('#courseName').val();
       
       var e = $('<div class="col-sm-3" id="hello'+kb+'"><div class="box box-success box-solid" ><div class="box-header with-border"><h3 class="box-title">'+course+'<input type="hidden" name="courses[]" value="'+course+'"></h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" onclick="removeCourse('+"'hello"+kb+"'"+')"><i class="fa fa-times"></i></button></div> </div> </div> </div>');
    
        $("#showCourse").append(e);
        kb++;
    }
    
</script>

<script>
    
    function whichSelect(sss)
    {
        
        if(sss==1)
        {
            	var department = $('#department').val();
        		$.ajax({
        			url:'<?php echo base_url(); ?>welcome/filter_course',
        			type:"post",
        			data:{
        				'department_id' : department
        				},
        				
        			success: function(data)
        			{
        				$('#display_course').html(data);
        				$('#sdc').remove();
        			}
        		});
            
        }
        else if(sss==2)
        {
                for(var j=1;j<=10;j++)
                {
                    
                    $('#hello'+j).remove();
                }
                var department = $('#department').val();
        		$.ajax({
        			url:'<?php echo base_url(); ?>welcome/filter_package',
        			type:"post",
        			data:{
        				'department_id' : department
        				},
        				
        			success: function(data)
        			{
        				$('#display_course').html(data);
        			}
        		});
        }
    }
</script>

<script>


	function selecttime()
	{
			var faculty_id = $('#faculty').val();
			var courseName = $('#courseName').val();
			var demo_date = $('#date_selected').val();
			if(faculty_id!="")
			{
				$.ajax({
					url : '<?php echo base_url(); ?>welcome/checkTime',
					type:"post",
					
					data:{
						'faculty_id':faculty_id,
						'courseName':courseName,
						'demo_date':demo_date
						},
						success: function(data)
						{
							
							
							$('#showtime').html(data);
							$('#myModal').modal("show");
							
						}
					});
				
			}
	}
	
	
	function setTime(time_id)
	{
	    var stime = $('#stimes'+time_id).val();
	    var etime = $('#etimes'+time_id).val();
	   
	    $('#fromTime').val(stime);
	    $('#toTime').val(etime);
	    
	    $('#myModal').modal("hide");
	   
	}
	

    <?php if($_SESSION['logtype']=="Branch") { ?>
    $( document ).ready(function() {
    
    var branch_id = $('#branch_id').val();
		$.ajax({
			url:'<?php echo base_url(); ?>welcome/filter_depart',
			type:"post",
			data:{
				'branch_id' : branch_id
				},
				
			success: function(data)
			{
				$('#display_depart').html(data);
					selectcourse();
			}
		});
		
	
    
    });
    
    <?php } ?>

    function selectdepart()
	{
		var branch_id = $('#branch_id').val();
		$.ajax({
			url:'<?php echo base_url(); ?>welcome/filter_depart',
			type:"post",
			data:{
				'branch_id' : branch_id
				},
				
			success: function(data)
			{
				$('#display_depart').html(data);
			
			}
		});
	}

    
   
	
	
	function select_faculty()
	{
	    
	    var branch_id = $('#branch_id').val();
	   
               var course = $('#courseName').val();
               
               if(course!="")
               {
            	   $.ajax({
            			url:'<?php echo base_url(); ?>welcome/filter_faculty',
            			type:"post",
            			data:{
            				'course_name' : course,
            				'branch_id' : branch_id
            				},
            				
            			success: function(data)
            			{
            				$('#display_faculty').html(data);
            			}
            		});
               }
	   
	    
	}
	

  function select_hod(type)
  {
      
      var h = type;
      // alert(h);
      var branch_id = $('#branch_id').val();
     
               var course = $('#courseName').val();
               // alert(h);
               // alert(branch_id);
               // alert(course);
               
               if(course!="")
               {
                 $.ajax({
                  url:'<?php echo base_url(); ?>welcome/filter_hod',
                  type:"post",
                  data:{
                    'course_name' : course,
                    'branch_id' : branch_id,
                    'faculty_type':h
                    },
                    
                  success: function(data)
                  {
                    $('#display_faculty').html(data);
                  }
                });
               }
     
      
  }
	
	function select_package_course()
	{
	    
	    if($("#packagec").prop("checked")) 
	    {
            var packages = $('#packageName').val();
            if(packages!="")
            {
            	   $.ajax({
            			url:'<?php echo base_url(); ?>welcome/filter_package_course',
            			type:"post",
            			data:{
            				'package_name' : packages
            				
            				},
            				
            			success: function(data)
            			{
            				$('#pk_course').html(data);
            			}
                });  
            }
	    }
	}
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('.datepicker').datepicker({
      autoclose: true,
        todayHighlight: true,
	  format:"yyyy-mm-dd"
    })
    
     $(".datepicker" ).datepicker("show");

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false,
	   defaultTime: false
    })
  })
</script>
</body>
</html>