


<?php //include('header_test.php'); ?>


<?php @$user_permission =  explode(",",@$_SESSION['user_permission']);
        @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);?>
		
    <?php date_default_timezone_set("Asia/Calcutta");  ?>    >
<main class="main_content d-inline-block">
		<section class="page_title_block d-inline-block w-100 position-relative pb-0">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-11 mx-auto text-center" >
						<div class="page_heading">
							<h1>Create Task</h1>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="create_task_secs">
			<div class="container-fluid">
				<div class="row">

					<div class="col-lg-12 mx-auto">
						<button type="button" class="btn btn-success" id="add_task" value="0" style="margin: 0 0 15px 172px;">Add Multiple Task</button>
						 <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>TaskController/Inser_all_task" class="row">
                            <input type="hidden" name="group_id" value="<?php echo $_GET['g_id']; ?>" id="g_id">
                            
							<div class="col-xl-8 col-lg-10 col-sm-10 mx-auto">
						<div class="form-group">
                                            
                                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Task Name" name="name[]">
                                        </div>
                                         <div class="form-group">
                                           
                                            <textarea class="form-control" name="description[]" placeholder="Task Description" rows="6"></textarea>
                                        </div>
                                        <div class="form-group">
											<div class="row align-items-center">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-5 col-6">
											<input type="file" class="form-control-file d-inline-block" name="image[0][]" multiple>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-7 col-6 text-right">
											<span>Attach file to image, word , excel , ppt</span>
										</div>
									</div>
								</div>
                                       
                                          <div class="form-group">
                                            
                                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Creator Name"  value="<?php echo $_SESSION['user_name']; ?>" disabled>
                                            <input type="hidden" name="c_name" value="<?php echo $_SESSION['user_id']; ?>">
                                        </div>
                                       <button type="button" style="width: 100%;" onclick="add_group(<?php echo $_GET['g_id']; ?>,this.value)" class="btn btn-warning" value="0" id="add_group_id0">Task Assign Participants  (hierarchy wise group or single person)</button>
                                        <div id="show_group0"></div>

                                       
                                         <!-- <div class="form-group">
                                            <label for="exampleInputPassword1">Task Assign Group</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Assign Group Name" name="name">
                                        </div> -->
                                         <div class="form-group">
                                            
                                            <br>
                                             <button style="width: 100%;" type="button" onclick="add_ob_group(<?php echo $_GET['g_id']; ?>,this.value)" class="btn btn-primary" value="0">Task Observer (Login person or hierarchy wise group or single person)</button>
                                        <div id="show_ob_group0"></div>
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputPassword1">Task Observation Status: </label>
                                            <input type="radio"  id="exampleInputPassword1" name="observe[]" onclick="gave_time(this.value,0)" value="today">Assign Today Dedline Date
                                            <input type="radio"  id="exampleInputPassword1" name="observe[]" onclick="gave_time(this.value,0)" value="few">Few Days Dedline Date
                                        </div>
                                        <div id="gave_time_id0" ></div>
                                         
                                        
                                         <div class="form-group">
                                            <label for="exampleInputPassword1">Task Priority</label>
                                            <input type="radio"  id="exampleInputPassword1" name="priority[]" value="High">High
                                            <input type="radio"  id="exampleInputPassword1" name="priority[]" value="Medium">Medium
                                            <input type="radio"  id="exampleInputPassword1" name="priority[]" value="Low">Low
                                        </div>

                                       <!--  <div class="form-group">
                                          <button type="button" class="btn btn-primary custi_light_blue_bg btn-sm" data-toggle="modal" data-target="#view_participants"> Schedule</button>
                                        </div> -->

                                    <!-- /.box-body -->

                                    <!-- <br>
                                    <br>
                                    <br> -->
                                    <div id="show_task" ></div>



                                    <div class="filter_ratio filter_ratio_one">
    <div class="modal fade" id="view_participants">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Calander</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              test
          </div>
        </div>
      </div>
    </div>  
  </div>
   <div class="box-footer">
   <button type="submit" name="submit"  value="submit" class="btn btn-primary">Submit</button>
    </div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</main>

<?php include('footer_test.php'); ?>
<script>
    
   if (document.getElementById("yellow") != null) {
    setTimeout(function() {
      document.getElementById('yellow').style.display = 'none';
    }, 5000);
  }
</script>

<script>
    
    
var date = new Date();
date.setDate(date.getDate());

$('#datepicker').datepicker({
alert(); 
    startDate: date
});

$('#date1').datepicker({ 
    startDate: date
});

$('#date2').datepicker({ 

    startDate: date
});


</script>

<script>

    var kb=1;
    function removeCourse(dvid)
    {
       
       $('#'+dvid).remove();
       
    }
     function addCourse(id)
    {
        
       
        var course = $('#member_id'+id).val();
        var n = $('option[value='+course+']').text();
       
       var e = $('<div class="col-sm-3" id="hello'+kb+'"><div class="box box-success box-solid" ><div class="box-header with-border"><h3 class="box-title">'+n+'<input type="hidden" name="members[]" value="'+course+'"></h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" onclick="removeCourse('+"'hello"+kb+"'"+')"><i class="fa fa-times"></i></button></div> </div> </div> </div>');
    
        $("#show_member"+id).append(e);
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
			url:'<?php echo base_url(); ?>TaskController/filter_depart',
			type:"post",
			data:{
				'branch_id' : branch_id
				},
				
			success: function(data)
			{
				$('#department_id').html(data);
			
			}
		});
	}

    
   
	
	
	function select_member()
	{
	    
	    var p_id = $('#parent_id').val();
	   
               // var course = $('#courseName').val();
               
               // if(course!="")
               // {
            	   $.ajax({
            			url:'<?php echo base_url(); ?>TaskController/filter_member',
            			type:"post",
            			data:{
            				
            				'parent_id' : p_id
            				},
            				
            			success: function(data)
            			{
            				$('#child_id').html(data);
            			}
            		});
              // }
	   
	    
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
<!-- 
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
</script> -->
<script type="text/javascript">
  
  function all_data_show(id)
  {
    var g_id = id;
   
    $.ajax({
      url:'<?php echo base_url(); ?>TaskController/filter_g_data',
      type:"post",
      data:{
        'g' : g_id
        },
        
      success: function(data)
      {
        $('#show_data').html(data);
      
      }
    });
  }


  function gave_member(id)
  {
       var m_id = id;
   
    $.ajax({
      url:'<?php echo base_url(); ?>TaskController/gave_member',
      type:"post",
      data:{
        'm' : m_id
        },
        
      success: function(data)
      {
        $('#member_id'+id).html(data);
      
      }
    }); 
  }


  $(document).ready(function(){
      $('#add_task').click(function(){
        var m_id = $('#add_task').val();
        var g_id = $('#g_id').val();
         $.ajax({
      url:'<?php echo base_url(); ?>TaskController/add_task',
      type:"post",
      data:{
        'm' : m_id,
        'g':g_id
        },
        
      success: function(data)
      {
        $('#show_task').html(data);
        m_id++;
        $('#add_task').val(m_id);
        $('#show_task').val(m_id);

      
      }
         }); 
      });


    

  });


  function remove_task(id)
  {
    var a_id = $('#'+id).val();
    $("span").remove('#'+a_id);
   
  }

  function add_group(id,v)
  {

     var m_id = id;
     var a_g_id = $('#add_group_id'+v).val();
    

     $.ajax({
      url:'<?php echo base_url(); ?>TaskController/add_assign_group',
      type:"post",
      data:{
        'm' : m_id,
        'a_g_id':a_g_id,
        'v_id':v
        },
      success: function(data)
      {
        $('#show_group'+v).html(data);
        // a_g_id++;
        //$('#add_group_id'+v).val(a_g_id);
      }
    });
  }

   function add_ob_group(id,v)
  {
     var m_id = id;

     $.ajax({
      url:'<?php echo base_url(); ?>TaskController/add_ob_group',
      type:"post",
      data:{
        'm' : m_id,
        'v_id':v
        },
      success: function(data)
      {
        $('#show_ob_group'+v).html(data);
      
      }
    });
  }

  function gave_time(id,v)
  {
      var m_id = id;

     $.ajax({
      url:'<?php echo base_url(); ?>TaskController/gave_time',
      type:"post",
      data:{
        'm' : m_id,
        'v_id':v
        },
      success: function(data)
      {
        $('#gave_time_id'+v).html(data);
      
      }
      });
  }
</script>