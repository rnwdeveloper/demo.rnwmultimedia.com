 <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">
 <?php 
 @$faculty_id = explode(",",@$select_hod->faculty_id);
 
 ?>
<div class="modal fade" id="myModal_course" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Hod Name :</b> <?php echo $select_hod->name;  ?></h4>
        </div>
        <form method="post" action="<?php echo base_url(); ?>settings/setFacultys">
        <div class="modal-body">
            
                
                <input type="hidden" value="<?php echo $select_hod->hod_id;  ?>" name="hod_id" />
          <?php foreach($department_all as $depart) { 
          if($depart->department_id==$select_hod->department_ids) { ?>
             <?php foreach($subdepartment_all as $subdepart) { 
          if($subdepart->subdepartment_id==$select_hod->subdepartment_id) { ?>

          
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Department Name :</b> <?php echo $depart->department_name; ?></h3>
              <h4 style="margin-left: 50%;margin-top: -20px;"><b>Sub Department Name :</b> <?php echo $subdepart->subdepartment_name; ?></h4>
            </div>
            <!-- /.box-header -->
           
              <table  class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                
                  <th>Faculty<th>
                 
                </tr>
                </thead>
                <tbody>
                <?php foreach($faculty_all as $faculty)  { if($depart->department_id==$faculty->department_id) { if($subdepart->subdepartment_id==$faculty->subdepartment_id) {  ?>
                <tr>
                    <?php $flag=0;
                           for($i=0;$i<sizeof($faculty_id);$i++)
                           {
                            if($faculty_id[$i]==$faculty->faculty_id)
                            {
                                $flag=1;
                            }
                           } ?>
                  <td><label class="checkbox-inline"><input type="checkbox" <?php if($flag==1) { echo "checked"; } ?> value="<?php echo $faculty->faculty_id; ?>" name="hod_faculty[]">  <?php echo $faculty->name; ?></label></td>
                  
                 
               
                </tr>
                
             <?php } } } ?>
                
                </tfoot>
              </table>

     </div>
          <?php } } } }?>
          
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