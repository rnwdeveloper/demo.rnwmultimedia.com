
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
							<h1>Create Event</h1>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="create_task_secs">
			<div class="container-fluid">
				<div class="row">

					<div class="col-lg-12 mx-auto">
						
						 <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>TaskController/Inser_all_event" class="row" id="filterForm"> 
          <div class="col-xl-8 col-lg-10 col-sm-10 mx-auto">

               <div class="form-group">
                  <div class="btn-group w-100 add_task_btn">
                   
                    <select name="event_type" class="form-control">
                        <option value="0">---SELECT EVENT TYPE----</option>
                        <option value="Meeting">Meeting</option>
                        <option value="Event">Event</option>
                    </select>
                  </div>
                </div>



                <div class="form-group">
                  <div class="btn-group w-100 add_task_btn">
                    <input type="text" name="taskname" class="form-control" placeholder="Event Name">
                    
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="one" id="chake1" onclick="event_change(this.value)" value="today">
                    <label class="form-check-label" for="chake1">Assign Today</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="chake2" name="one" onclick="event_change(this.value)" value="towith">
                    <label class="form-check-label" for="chake2">Assign Today with stime and etime</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="chake2" name="one" onclick="event_change(this.value)" value="few">
                    <label class="form-check-label" for="chake2">Assign few days</label>
                  </div>
                </div>

                <div id="display_cal"></div>
                

                 <?php if($_SESSION['logtype'] == "Super Admin"){ ?>
                  <div class="form-group">
                            <label for="email">Admin:</label>
                            <select required class="form-control" name="admin_id"  id="admin" required>
                                  <option value="">Select Admin</option>
                                    <?php foreach($user_all as $val) { if($val->status==0 && $val->logtype == "Admin") { ?>
                                      <option <?php if($val->name==@$select_user->logtype) { echo "selected"; } ?>   value="<?php echo $val->user_id; ?>" ><?php echo $val->name; ?></option>
                                    <?php } } ?>
                                </select>
                          </div>
                            <div class="form-group">
                                            <label>Branch:</label>

                                          <span id="branch"></span>
                                          </div>
                          <?php }else{ ?>
                             <div class="form-group">
                                            <label>Branch:</label>
                                             <div class="form-group" >
                            
                            <?php 
                                    foreach($aa_branch as $val) {  ?>
                      <div class="checkbox">
                                  <label><input class="filterCheck" type="checkbox" <?php if(@in_array($val->branch_id,@$brans)) { echo "checked"; } ?> name="b_ids[]" value="<?php echo $val->branch_id ?>" ><?php echo $val->branch_name ?></label>
                                </div>
                                <?php }  ?>
                          </div>

                                          <span id="branch"></span>
                                          </div>
                          <?php } ?>
                                            
                          <div class="form-group">
                                            <label for="email">Department:</label>
                                            <span id="department"></span>
                                          </div>


                                           <div class="form-group">
                                            <label for="email">SubDepartment:</label>

                                            <span id="subdepartment"></span>
                                          </div>

                                            <div class="form-group">
                                            <label for="email">users:</label>

                                            <span id="hod_id"></span>
                                          </div>
                  <div class="text-right">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="button" class="btn btn-danger">Close</button>
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

$('#date').datepicker({ 
    startDate: date
});

$('#date1').datepicker({ 
    startDate: date
});

$('#date2').datepicker({ 

    startDate: date
});


function event_change(test)
{
    $.ajax({
              url:'<?php echo base_url(); ?>TaskController/filter_event_cal',
              type:"post",
              data:{
                't' : test
                },
                
              success: function(data)
              {
                $('#display_cal').html(data);
               
              }
            });
}

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
<script type="text/javascript">
  $(document).ready(function(){
    $('#admin').change(function(){
      alert();
      var d = $(this).val();
      /*console.log("called");
      console.log($('#filterForm').serialize());*/
      // alert($('#filterForm').serialize());
      $.ajax({
        type:'POST',
        data:{

          'id':d
        },
        url:"<?php echo base_url(); ?>TaskController/admin_Wise_branchFetch",
        success:function(data){
          $('#branch').html(data);
        }
      });
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.filterCheck').change(function(){
      /*console.log("called");
      console.log($('#filterForm').serialize());*/
      // alert($('#filterForm').serialize());
      $.ajax({
        type:'POST',
        data:$('#filterForm').serialize(),
        url:"<?php echo base_url(); ?>TaskController/fetch_depart_alll",
        success:function(data){
          $('#department').html(data);
        }
      });
    });
  });
</script>
 