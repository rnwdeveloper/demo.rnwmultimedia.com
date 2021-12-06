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


<script type="text/javascript">
  
  $(document).ready(function(){

      $('#checkAll').click(function(){
          if($('#checkAll').is(':checked'))
          {
            $('.check').each(function(){

                 $('.check').prop('checked',true);
            });
          }
          else
          {
            $('.check').each(function(){
                $('.check').prop('checked',false);
            });
          }
      });
  });
</script>

<script type="text/javascript">
  function change_data(id,n)
  {

    if($('#'+id).is(':checked'))
    {
        $('.check'+n).each(function(){

                 $('.check'+n).prop('checked',true);
            });
    }
    else
    {
        $('.check'+n).each(function(){

                 $('.check'+n).prop('checked',false);
            });
    }
  }
</script>

<script type="text/javascript">
  function change_upd_data(id,n)
  {

    if($('#'+id).is(':checked'))
    {
        $('.checks'+n).each(function(){

                 $('.checks'+n).prop('checked',true);
            });
    }
    else
    {
        $('.checks'+n).each(function(){

                 $('.checks'+n).prop('checked',false);
            });
    }
  }
</script>

<script>
  $(document).ready(function(){
 $('#state_id').change(function(){
 
  var s = $('#state_id').val();
  alert(s);
  if(s !='')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>settings/fetch_cities",
    method:"POST",
    data:{s_id:s},
    success:function(data)
    {
     $('#city_id').html(data);
     // $('#city').html('<option value="">Select City</option>');
    }
   });
  }
  else
  {
   $('#getfaculty').html('<option value="">Select Faculty</option>');
   // $('#city').html('<option value="">Select City</option>');
  }

 });
});
</script>





<!-- page script -->
<script>
    



   if (document.getElementById("yellow") != null) {
    setTimeout(function() {
      document.getElementById('yellow').style.display = 'none';
    }, 5000);
  }
</script>

<script>
    function viewCourse(id)
    {
        
       $.ajax({
           url:"<?php echo base_url(); ?>settings/view_course_hod",
           type:"post",
           data:{
               'hod_id':id
               
           },
           success: function(data) {
                $('#viewc').html(data);
                $('#myModal_course').modal('show');
            }
           
       });
    }
</script>

   

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example5').DataTable()
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
<script>
  $(document).ready(function(){
 $('#department').change(function(){
 console.log("heloo");
  var department_ids = $('#department').val();
  if(department_ids !='')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>settings/fetch_subdepartment",
    method:"POST",
    data:{department_ids:department_ids},
    success:function(data)
    {
     $('#subdepartment').html(data);
     // $('#city').html('<option value="">Select City</option>');
    }
   });
  }
  else
  {
   $('#subdepartment').html('<option value="">Select Sub Department</option>');
   // $('#city').html('<option value="">Select City</option>');
  }

 });
});
</script>
<script>
  $(document).ready(function(){
 $('#subdepartment').change(function(){
 console.log("heloo");
  var subdepartment_id = $('#subdepartment').val();
  if(subdepartment_id !='')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>settings/fetch_faculty",
    method:"POST",
    data:{subdepartment_id:subdepartment_id},
    success:function(data)
    {
     $('#getfaculty').html(data);
     // $('#city').html('<option value="">Select City</option>');
    }
   });
  }
  else
  {
   $('#getfaculty').html('<option value="">Select Faculty</option>');
   // $('#city').html('<option value="">Select City</option>');
  }

 });
});
</script>
<script>
   var kb=1;
    function removefaculty(dvid)
    {
       
       $('#'+dvid).remove();
       
    }
    
function addFaculty()
    {
        var faculty = $('#getfaculty').val();
        // alert(faculty);
        $.ajax({
            url:'<?php echo base_url(); ?>settings/select_single_course',
            type:'post',
            dataType:"JSON",
            data:{
                'faculty_id':faculty
               
            },
            success: function(data)
            {
               var e = $('<div class="col-sm-4" id="hello'+kb+'"><div class="box box-success box-solid" style="padding:0px;"><div class="box-header" style="padding:0px 0px 0px 5px;"><h6 >'+data.selectdata['name']+'<input type="hidden" name="name[]" value="'+data.selectdata['faculty_id']+'"></h6><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" onclick="removefaculty('+"'hello"+kb+"'"+')"><i class="fa fa-times"></i></button></div> </div> </div> </div>');
    
                    $("#showCourse").append(e);
                    kb++;  
            }
        });
     }
 </script>

 <script type="text/javascript">
   function change_logtype(id,n)
  {

    if($('#'+id).is(':checked'))
    {
      // alert();
        $('.logtype'+n).each(function(){

                 $('.logtype'+n).prop('checked',true);
            });
    }
    else
    {
        $('.logtype'+n).each(function(){

                 $('.logtype'+n).prop('checked',false);
            });
    }
  }
 </script>
</body>
</html>
