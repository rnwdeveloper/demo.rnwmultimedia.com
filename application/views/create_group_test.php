


<?php //include('header_test.php'); ?>


<?php @$user_permission =  explode(",",@$_SESSION['user_permission']);
        @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);?>
		
    <?php date_default_timezone_set("Asia/Calcutta");  ?>    >

<!-- header -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/task_css.css">
	<main class="main_content d-inline-block">
		<section class="page_title_block d-inline-block w-100 position-relative pb-0">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-11 mx-auto text-center" >
						<div class="page_heading">
							<h1>Groups</h1>
						</div>
					</div>



				</div>
			</div>
		</section>
		<section class="create_group_sec d-inline-block w-100 position-relative">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 mx-auto card">
<div class="card">
<div class="card-body">
<h4 class="box-title">
											<?php if($_SESSION['logtype'] == "Super Admin" || $_SESSION['logtype']== "Admin"){  ?>
                       
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fa fa-users" aria-hidden="true" ></i>ADD GROUP
                      </button>
                      <?php } ?>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Create Group</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                             
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title"></h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>TaskController/group">
                                    <div class="box-body">
                                    <?php if($_SESSION['logtype'] == "Super Admin"){ ?>
                                        <input type="radio" name="g_type" onclick="all_data_show(this.value)" value="Super Admin" id="g_type">Super admin
                                        <!-- <input type="radio" name="g_type" onclick="all_data_show(this.value)" value="Admin" id="g_type">Admin -->
                                        <input type="radio" name="g_type"  onclick="all_data_show(this.value)" value="User" id="g_type">User
                                        <?php }else{ ?>
                                        <input type="radio" name="g_type" onclick="all_data_show(this.value)" value="Admin">Admin
                                        <input type="radio" name="g_type" onclick="all_data_show(this.value)" value="User">User
                                        <?php } ?>
                                        <div id="show_data">

                                        </div>
                                        <br>

                                        <!-- <div class="form-group">
                                            <label for="exampleInputEmail1">Logtype Group</label>
                                            <select class="form-control" name="logtype_id">
                                                <option value="0">-------Select Logtype Group---------</option>
                                                <?php foreach($log_all as $k=>$v){ ?>
                                                  <option value="<?php echo $v->logtype_id; ?>"><?php echo $v->logtype_name; ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
 -->
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Group Name</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Group Name" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <input type="file" id="exampleInputFile" name="image">
                                           
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" name="submit"  value="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->

                           
                        </div><!--/.col (left) -->
                            
                           
                          </div>
                        </div>
                      </div>

</h4>
</div>
<div class="card-body--">
<div class="table-stats order-table ov-h">
<table class="table ">
<thead>
<b>
<tr>

<th class="avatar">Icon</th>
<th>Name</th>
<th>Role</th>
<th>Parent</th>
<th>Add Task</th>
<th>Members</th>
<th>Add Member</th>
<th>Action</th>
</tr>
</b>
</thead>
<tbody>
<!-- <tr>

<td class="avatar">
<div class="round-img">
<a href="#"><img class="rounded-circle" src="https://demo.rnwmultimedia.com/dist/img/RNW_1.jpeg" alt=""></a>
</div>
</td>

<td>Louis Stanley </td>
<td>iMax</td>
<td>231</td>
<td>
<span class="badge badge-complete">Complete</span>
</td>
</tr>
 -->

						     <?php 

                   // echo "<pre>";
                   // print_r($g_all);
                   // die;
                   foreach($g_all as $j=>$v){ 

                                          ?>
							    <tr>
							    	
							    			
                                            <td class="rounded-circle" >
                                              <?php if(!empty($v->group_image)){ ?>
                                              <img src="<?php echo base_url(); ?>images/task_image/<?php echo $v->group_image; ?>" width="100px;" style="border-radius: 50%;">
                                            </td>
                                              <?php }else{ ?>
                                                <img src="https://demo.rnwmultimedia.com/dist/img/RNW_1.jpeg" width="100px;" style="border-radius: 50%;">
                                              <?php } ?>

                                            <td><?php echo $v->group_name; ?></td>

                                            <td><?php foreach ($log_all as $key => $value) {
                                              if($value->logtype_id == $v->logtype_id){
                                                  echo $value->logtype_name;
                                                }
                                              
                                            } ?></td>

                                            <td class="round-img"><?php
                                             if(!empty($v->group_nameall)){foreach($v->group_nameall as $k=>$n){ if($n!="Super Admin"){echo $n."=>";}else{echo $n;} } }else{echo "Super Admin";}?></td>

                                           
                                            <td>
                                            <?php 
                                            if($_SESSION['logtype'] == "Super Admin" && $v->group_name == "Super Admin"){

                                              ?>
                                              <a href="<?php echo base_url(); ?>TaskController/create_task?g_id=<?php echo $v->group_id; ?>">
                                               <button type="button" class="btn btn-primary"><i class="fa fa-tasks" aria-hidden="true"></i></button>
                                               </a>
                                              <?php 
                                            }
                                            else
                                            { ?>

                                           <?php 
                                            foreach ($log_all as $r => $s) {
                                            if($s->logtype_name == $_SESSION['logtype'] ){ if($s->logtype_id == $v->logtype_id){ ?>
                                            <a href="<?php echo base_url(); ?>TaskController/create_task?g_id=<?php echo $v->group_id; ?>">
                                               <button type="button" class="btn btn-primary"><i class="fa fa-tasks" aria-hidden="true"></i></button>
                                               </a>
                                               <?php } }} ?>
                                            <?php } ?>
                                           
                                            </td>
                                            <td>
                                              
                                              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ss<?php echo $j; ?>">
  <i class="fa fa-users" aria-hidden="true"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="ss<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Member Names</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr>
            <th>Name</th>
          </tr>
          <?php foreach ($member_all as $key => $value) { 
            if($v->group_id == $value->member_group_id){
            ?>
          <tr>
            <td><?php echo $value->member_name; ?></td>
          </tr>
          <?php } }?>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
                                            </td>
                                            <?php if($_SESSION['logtype'] == "Super Admin" || $_SESSION['logtype']== "Admin"){  ?>

                                             <td>
                                              
                                              <button type="button" onclick="gave_member(<?php echo $v->group_id; ?>)" class="btn btn-warning" data-toggle="modal" data-target="#member<?php echo $v->group_id; ?>">
                                               <i class="fa fa-user-plus" aria-hidden="true"></i>
                                              </button>

                         <!-- Modal -->
                              <div class="modal fade" id="member<?php echo $v->group_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel"><?php echo $v->group_name; ?></h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>TaskController/add_member_custom">
                                                    
                                                  <div class="box-body">
                                                         <input type="hidden" name="member_group_id" value="<?php echo $v->group_id; ?>">
                                                  <input type="hidden" name="member_branch_id" value="<?php echo $v->group_branch_id; ?>">
                                                   <input type="hidden" name="role" value="<?php foreach ($log_all as $key => $value) { if($value->logtype_id == $v->logtype_id){echo $value->logtype_name;}} ?>">

                                      <div class="form-group">
                                      <label for="exampleInputPassword1">Group Member</label>
                                      <select class="form-control" onchange="addCourse(<?php echo $v->group_id; ?>)" name="member_id" id="member_id<?php echo $v->group_id; ?>">
                                                                <option value="0">---select Member----</option>
                                                              </select>
                                                              <div id="show_member<?php echo $v->group_id; ?>"></div>
                                                          </div>
                                                        
                                                      </div><!-- /.box-body -->

                                                      <div class="box-footer">
                                                          <button type="submit"  class="btn btn-primary">Submit</button>
                                                      </div>
                                                  </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </td>
                                            <td>
                                              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter<?php echo $v->group_id; ?>">
                                               <i class="fa fa-edit"></i>
                                              </button>
                                              <div class="modal fade" id="exampleModalCenter<?php echo $v->group_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                     <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>TaskController/group">
                                                     <input type="hidden" name="group_id" value="<?php echo $v->group_id; ?>">
                                                      <div class="box-body">
                                                      
                                                    <div class="form-group">
                                                    <label for="exampleInputEmail1">Branch</label>
                                                    <select class="form-control" name="branch_id" id="branch_id" onchange="selectdepart()">
                                                        <option value="0">-------Select Branch---------</option>
                                                        <?php foreach($upd_branch as $m=>$n){ ?>
                                                          <option value="<?php echo $n->branch_id; ?>"><?php echo $n->branch_code; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Department Id</label>
                                                    <select class="form-control" name="department_id" id="department_id">
                                                        <option value="0">-------Select Department---------</option>
                                                        
                                                    </select>
                                                </div>
                                                    <div class="form-group">
                                                              <label for="exampleInputEmail1">Parent Group</label>
                                                              <select class="form-control" name="child_id">
                                                                  <option value="0">-------Select Parent Group---------</option>
                                                                  <?php foreach($g_all as $k=>$s){ ?>
                                                                    <option value="<?php echo $s->group_id; ?>" <?php if($s->group_id == $v->group_child_id){echo "selected"; } ?>><?php echo $s->group_name; ?></option>
                                                                  <?php } ?>

                                                              </select>
                                                          </div>
                                                          <div class="form-group">
                                                              <label for="exampleInputPassword1">Group Name</label>
                                                              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Group Name" name="name" value="<?php echo $v->group_name; ?>">
                                                          </div>
                                                          <div class="form-group">
                                                              <label for="exampleInputFile">File input</label>
                                                              <input type="file" id="exampleInputFile" name="image">
                                                              <img src="<?php echo base_url(); ?>images/task_image/<?php echo $v->group_image; ?>" width="50px;">
                                                             
                                                          </div>
                                                      </div><!-- /.box-body -->

                                                      <div class="box-footer">
                                                          <button type="submit" name="update"  value="update" class="btn btn-primary">Submit</button>
                                                      </div>
                                                  </form>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                           
                                            <a href="<?php echo base_url(); ?>TaskController/group?action=delete&id=<?php echo $v->group_id; ?>">
                                              <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                              </a>
                                            </td>
                                            <?php } ?>
                                            </tr>
                                          <?php } ?>

</tbody>
</table>
</div> 
</div>
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

    function select_admin()
    {
          var admin_id = $('#admin_id').val();

          $.ajax({
            url:'<?php echo base_url(); ?>TaskController/filter_admin',
            type:"post",
            data:{
              'admin_id' : admin_id
              },
              
            success: function(data)
            {
              $('#branch_id').html(data);
            
            }
          });
    }


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

<!-- <script>
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
</script>
<!-- 
<script type="text/javascript">
  function loadDoc() {

    setInterval(function(){

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         document.getElementById("gave_total_task").innerHTML = this.responseText;

        }
      };
      var m = document.getElementById("gave_total_task").innerHTML;
      
      $('#gave_total_task_main').text(m);
      xhttp.open("GET", "count_dd", true);
      xhttp.send();

    },1000);


}

loadDoc();
</script>


<script type="text/javascript">
  function loadDocob() {

    setInterval(function(){

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         document.getElementById("gave_total_ob_task").innerHTML = this.responseText;

        }
      };
      var m = document.getElementById("gave_total_ob_task").innerHTML;
      
      $('#gave_total_ob_task_main').text(m);
      xhttp.open("GET", "count_ob", true);
      xhttp.send();

    },1000);


}

loadDocob();
</script> -->
