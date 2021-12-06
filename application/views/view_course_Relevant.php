 <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">
 <?php 
 @$RelevantCourse_id = explode(",",@$select_Relevant->RelevantCourse_id);
 ?>
<div class="modal fade" id="myModal_courseRelevant" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Package Name : <?php echo @$select_Relevant->package_name;  ?></h4>
        </div>
        <form method="post" action="<?php echo base_url(); ?>settings/setRelevantCourse">
        <div class="modal-body">
            
                
                <input type="hidden" value="<?php echo $select_Relevant->package_id;  ?>" name="package_id" />
          <?php foreach($department_all as $depart) { 
          if($depart->department_id==$select_Relevant->department_id) { ?>
          
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title"> Department : <?php echo $depart->department_name; ?></h3>
            </div>
            <!-- /.box-header -->
           
              <table  class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                
                  <th>Course</th>
                 
                </tr>
                </thead>
                <tbody>
                <?php foreach($course_all as $course)  {  if($course->status==0) { if($depart->department_id==$course->department_id) {  ?>
                <tr>
                    <?php $flag=0;
                           for($i=0;$i<sizeof($RelevantCourse_id);$i++)
                           {
                            if($RelevantCourse_id[$i]==$course->course_id)
                            {
                                $flag=1;
                            }
                           } ?>
                  <td><label class="checkbox-inline"><input type="checkbox" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $course->course_id; ?>" name="course_Relevant[]">  <?php echo $course->course_name; ?></label></td>
                  
                 
               
                </tr>
                
             <?php } } } ?>
                
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