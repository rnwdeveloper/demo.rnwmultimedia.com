<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">
<?php 
   @$course_ids = explode(",",@$select_hod->course_ids);
   
   @$package_ids = explode(",",@$select_hod->package_ids);
   
   ?>
<div class="modal fade" id="myModal_course" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Hod Name : <?php echo $select_hod->name;  ?></h4>
         </div>
         <form method="post" action="<?php echo base_url(); ?>settings/sethodCourse">
            <div class="modal-body">
               <input type="hidden" value="<?php echo $select_hod->hod_id;  ?>" name="hod_id" />
               <?php foreach($department_all as $depart) { 
                  if($depart->department_id==$select_hod->department_ids) { ?>
               <div class="box box-success">
                  <div class="box-header with-border">
                     <h3 class="box-title">Department Name : <?php echo $depart->department_name; ?></h3>
                  </div>
                  <!-- /.box-header -->
                  <table  class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th>Single Course</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($course_all as $course) { if($course->course_status==0) { if($depart->department_id==$course->department_id) {  ?>
                        <tr>
                           <?php $flag=0;
                              for($i=0;$i<sizeof($course_ids);$i++)
                              {
                               if($course_ids[$i]==$course->course_id)
                               {                    
                                   $flag=1;                             
                               }
                              } ?>
                           <td><label class="checkbox-inline"><input type="checkbox" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $course->course_id; ?>" name="hod_course[]">  <?php echo $course->course_name; ?></label></td>
                        </tr>
                        <?php } }  } ?>
                        </tfoot>
                  </table>
                  <table  class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th>Course Package</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($package_all as $package) { if($package->package_status==0) { if($depart->department_id==$package->department_id) {  ?>
                        <tr>
                           <?php $flag=0;
                              for($i=0;$i<sizeof($package_ids);$i++)
                              
                              {
                               if($package_ids[$i]==$package->package_id)
                               {
                                   $flag=1;                       
                               }
                              
                              } ?>
                           <td><label class="checkbox-inline"><input type="checkbox" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $package->package_id; ?>" name="hod_package[]">  <?php echo $package->package_name; ?></label></td>
                        </tr>
                        <?php } }  } ?>
                        </tfoot>
                  </table>
               </div>
               <?php } } ?>
            </div>
            <div class="modal-footer">
               <input type="submit" name="submit" value="Save" class="btn  btn-primary" />
            </div>
         </form>
      </div>
   </div>
</div>
<script src="<?php echo base_url(); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
   $(function () {
   
   
   
     $('.example5').DataTable({
   
         "paging": false
   
     })
   
   
   
   })
   
</script>