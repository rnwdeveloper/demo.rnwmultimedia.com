


<?php //include('header_test.php'); ?>


<?php @$user_permission =  explode(",",@$_SESSION['user_permission']);
        @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);?>
		
    <?php date_default_timezone_set("Asia/Calcutta");  ?>    >

<!-- header -->
	
	<main class="main_content d-inline-block">
		<section class="page_title_block d-inline-block w-100 position-relative pb-0">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-11 mx-auto text-center" >
						<div class="page_heading">
							<h1>Create Group</h1>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="create_group_sec d-inline-block w-100 position-relative">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 mx-auto">
						<div class="create_group_table_block">
							<div class="coman_design_block_title d-inline-block w-100 border-bottom">
								
							<div class="table-responsive">
							  <table class="table table-bordered table-striped create_responsive_table">
							    <tr class="thead custi_light_blue_bg">
							    	                       
                                            <th>Group Name</th>
                                            <th>Group Icon</th>
                                            <th>Logtype</th>
                                            <th>Member Name</th> 
                                            <th>Status</th>
                                            <th>Chat</th>
                                            
							    </tr>
                  <?php foreach ($task_group as $j => $v) { 

                    foreach ($member as $key => $value) {
                      if($value->member_group_id == $v->group_id){
                        if($value->member_account_id != $_SESSION['user_id']){
                    ?>
                  <tr>
                 
                      <td><?php echo $v->group_name; ?></td>
                      <td><img width="50px;" src="<?php echo base_url(); ?>images/task_image/<?php echo $v->group_image; ?>"> </td>
                      <td><?php foreach ($log_all as $key => $m) {
                        if($m->logtype_id == $v->logtype_id)
                        {
                          echo $m->logtype_name;
                        }
                      } ?> <span id="last_type_<?php echo $value->member_id; ?>"></span></td>
                      <td><?php echo $value->member_name; ?>
                        

                        <span id="unseen_msg_<?php echo $value->member_id; ?>"></span>
                      </td>
                      <td id="last_act_<?php echo $value->member_id; ?>"  data-touserid="<?php echo $value->member_id; ?>" class="last_act"></td>
                                           <td>
                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cc<?php echo $value->member_id; ?>" id="model_data">
                              Chat
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="cc<?php echo $value->member_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">You Have Chat With<?php echo $value->member_name; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body" >
                                         <div class="chateing_block chat_history" id="chat_history_<?php echo $value->member_id; ?>"  data-touserid="<?php echo $value->member_id; ?>">
                     
                    </div>
                    <div class="type_msg_block">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group mb-0 type_msg_block_box position-relative">
                              <input type="text" class="form-control msg_type_input chat_message" id="chat_message_<?php echo $value->member_id; ?>" placeholder="Type a message" >
                              <button type="button" class="msg_sent_btn" onclick="send_chat(<?php echo $value->member_id; ?>)" >
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="currentColor" d="M1.101 21.757L23.8 12.028 1.101 2.3l.011 7.912 13.623 1.816-13.623 1.817-.011 7.912z"></path></svg>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                     </td>
                  </tr>
                  <?php } } } } ?>
							     
							    
							  </table>
							</div>
							<nav class="pagination_block">
							    <ul class="pagination justify-content-center">
							        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
							        <li class="page-item"><a class="page-link" href="#">1</a></li>
							        <li class="page-item"><a class="page-link" href="#">2</a></li>
							        <li class="page-item"><a class="page-link" href="#">3</a></li>
							        <li class="page-item"><a class="page-link" href="#">Next</a></li>
							    </ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>





	<div class="modal fade" id="add_mamber_modal">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Master Admin</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="row">
	      		<div class="col-xl-12">
	      			<div class="form-group">
	      				<label>Group Master</label><br>
	      				<div class="btn-group w-100">
	      					<select class="form-control">
	      						<option>Select Mmember</option>
	      						<option>Nirbahy Virani</option>
	      						<option>Nirbahy Virani</option>
	      						<option>Nirbahy Virani</option>
	      					</select>
	      					<button type="button" class="btn btn-primary">Save</button>
	      				</div>
	      			</div>
	      		</div>
	      	</div>
	      </div>
	      <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
	    </div>
	  </div>
	</div>	
	<div class="modal fade" id="update_group">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Parent Group</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="row">
	      		<div class="col-xl-12">
	      			<div class="form-group">
	      				<label>Group Master</label><br>
	      				<div class="btn-group w-100">
	      					<select class="form-control">
	      						<option>Select Group</option>
	      						<option>Nirbahy Virani</option>
	      						<option>Nirbahy Virani</option>
	      						<option>Nirbahy Virani</option>
	      					</select>
	      					<button type="button" class="btn btn-primary">Save</button>
	      				</div>
	      			</div>
	      		</div>
	      	</div>
	      </div>
	      <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
	    </div>
	  </div>
	</div>	
	

	

<?php include('footer_test.php'); ?>

<script>
    
    $(document).ready(function(){
  
    setInterval(function(){
      last_activity();
      // userdata();
      last_act();
      
      //update_chat_history_data();
      last_type();
      count_msg();
    },1000);

  });

    $(document).on('click','#model_data',function(){ 
      update_chat_history_data();


});
  

     function update_chat_history_data()
    {

        $('.chat_history').each(function(){
          var to_user_id = $(this).data('touserid');
          // alert(to_user_id);
          fetch_user_chat_history(to_user_id);
        });
    }


    function fetch_user_chat_history(to_user_id)
    {
      $.ajax({

        url:"<?php echo base_url(); ?>TaskController/upd_chat",
        type:'POST',
        data:{
          to_user_id:to_user_id
        },
        success:function(res)
        {
          $('#chat_history_'+to_user_id).html(res);
        }
      });
    }


 

         function last_activity()
    {

        $('.last_act').each(function(){
          var to_user_id = $(this).data('touserid');
          // alert(to_user_id);
          fetch_user_last_act(to_user_id);
        });
    }


    function fetch_user_last_act(to_user_id)
    {
      $.ajax({

        url:"<?php echo base_url(); ?>TaskController/upd_last_activity",
        type:'POST',
        data:{
          to_user_id:to_user_id
        },
        success:function(res)
        {
          $('#last_act_'+to_user_id).html(res);
        }
      });
    }


  function count_msg()
    {

        $('.last_act').each(function(){
          var to_user_id = $(this).data('touserid');
          // alert(to_user_id);
          fetch_user_unseen_msg(to_user_id);
        });
    }


    function fetch_user_unseen_msg(to_user_id)
    {
      $.ajax({

        url:"<?php echo base_url(); ?>TaskController/unseen_msg",
        type:'POST',
        data:{
          to_user_id:to_user_id
        },
        success:function(res)
        {
          $('#unseen_msg_'+to_user_id).html(res);
        }
      });
    }


    function last_act()
    {
      $.ajax({
        url:"<?php echo base_url(); ?>TaskController/ll_act",
        success:function()
        {

        }
      });
    }



       function last_type()
    {

        $('.last_act').each(function(){
          var to_user_id = $(this).data('touserid');
          // alert(to_user_id);
          fetch_user_last_type(to_user_id);
        });
    }


    function fetch_user_last_type(to_user_id)
    {
      $.ajax({

        url:"<?php echo base_url(); ?>TaskController/create_last_type",
        type:'POST',
        data:{
          to_user_id:to_user_id
        },
        success:function(res)
        {
          $('#last_type_'+to_user_id).html(res);
        }
      });
    }



   if (document.getElementById("yellow") != null) {
    setTimeout(function() {
      document.getElementById('yellow').style.display = 'none';
    }, 5000);
  }



$(document).on('focus','.chat_message',function(){
     

      var is_type = 'yes';

      $.ajax({
      url:'<?php echo base_url(); ?>TaskController/upd_last_type',
      type:'POST',
      data:{
        is_type:is_type
      },
      success:function()
      {
          
      }
      });
      
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

       // var n = $('option[value='+course+']').text();
        
        var a = "#member_id"+id;
        var b = "option[value="+course+"]";
        var c= '"'+a+" "+b+'"';
        var t = c.replace('"','');
        var q = t.replace('"','');
       
        var n = $(q).text();
        //alert('"'+a+" "+b+'"');
        //"#member_id1 option[value=1]"
       // alert($('"'+a+" "+b+'"').text());
        // alert(course.innerHTML);
       
       var e = $('<div class="col-sm-6" id="hello'+kb+'"><div class="box box-success box-solid" ><div class="box-header with-border"><h3 class="box-title">'+n+'<input type="hidden" name="members[]" value="'+course+'"></h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" onclick="removeCourse('+"'hello"+kb+"'"+')"><i class="fa fa-times"></i></button></div> </div> </div> </div>');
    
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

<script>
  // $(function () {
  //   //Initialize Select2 Elements
  //   $('.select2').select2()

  //   //Datemask dd/mm/yyyy
  //   $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
  //   //Datemask2 mm/dd/yyyy
  //   $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
  //   //Money Euro
  //   $('[data-mask]').inputmask()

  //   //Date range picker
  //   $('#reservation').daterangepicker()
  //   //Date range picker with time picker
  //   $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
  //   //Date range as a button
  //   $('#daterange-btn').daterangepicker(
  //     {
  //       ranges   : {
  //         'Today'       : [moment(), moment()],
  //         'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
  //         'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
  //         'Last 30 Days': [moment().subtract(29, 'days'), moment()],
  //         'This Month'  : [moment().startOf('month'), moment().endOf('month')],
  //         'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
  //       },
  //       startDate: moment().subtract(29, 'days'),
  //       endDate  : moment()
  //     },
  //     function (start, end) {
  //       $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
  //     }
  //   )

  //   //Date picker
  //   $('.datepicker').datepicker({
  //     autoclose: true,
  //       todayHighlight: true,
	 //  format:"yyyy-mm-dd"
  //   })
    
  //    $(".datepicker" ).datepicker("show");

  //   //iCheck for checkbox and radio inputs
  //   $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
  //     checkboxClass: 'icheckbox_minimal-blue',
  //     radioClass   : 'iradio_minimal-blue'
  //   })
  //   //Red color scheme for iCheck
  //   $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
  //     checkboxClass: 'icheckbox_minimal-red',
  //     radioClass   : 'iradio_minimal-red'
  //   })
  //   //Flat red color scheme for iCheck
  //   $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
  //     checkboxClass: 'icheckbox_flat-green',
  //     radioClass   : 'iradio_flat-green'
  //   })

  //   //Colorpicker
  //   $('.my-colorpicker1').colorpicker()
  //   //color picker with addon
  //   $('.my-colorpicker2').colorpicker()

  //   //Timepicker
  //   $('.timepicker').timepicker({
  //     showInputs: false,
	 //   defaultTime: false
  //   })
  // })
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
</script>

<script type="text/javascript">
   function send_chat(id){


      var to_user_id = id;
      
      var chat_message =  $('#chat_message_'+to_user_id).val();
     
      $.ajax({
        url:"<?php echo base_url(); ?>TaskController/ins_chat",
        method:"POST",
        data:{
          to_user_id:to_user_id,
          chat_message:chat_message
        },
        success:function(res)
        {
          $('#chat_message_'+to_user_id).val('');
         $('#chat_history_'+to_user_id).html(res);
        }
      });
    };




</script>


