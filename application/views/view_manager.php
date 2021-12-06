 <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">
 <?php 
 @$faculty_id = explode(",",@$select_hod->faculty_id);
 
 ?>
<div class="modal fade" id="myModal_course" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Hod Name :</b> <?php echo $user_name->name;  ?></h4>
        </div>
        <form method="post" action="<?php echo base_url(); ?>settings/setManagers">
        <div class="modal-body">
            
                
                <input type="hidden" value="<?php echo $user_name->user_id;  ?>" name="user_id" />
          <?php //foreach($department_all as $depart) { 
          //if($depart->department_id==$select_hod->department_ids) { ?>
             <?php //foreach($subdepartment_all as $subdepart) { 
         // if($subdepart->subdepartment_id==$select_hod->subdepartment_id) { ?>

          
          <div class="box box-success">
           
           
              <table  class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                
                  <th>Manager<th>
                 
                </tr>
                </thead>
                <tbody>
                <?php 

                foreach ($all_mem as $key => $value) {
                  if($value->logtype == "Manager"){
                ?>
                <tr>

                    <?php $mid = explode(",", $user_name->parent_id);  ?>
                  <td><label class="checkbox-inline"><input type="checkbox" <?php  foreach ($mid as $m => $n) {if($n == $value->user_id) { echo "checked"; } }?> value="<?php echo $value->user_id; ?>" name="manager[]">  <?php echo $value->name; ?></label></td>
                  
                 
               
                </tr>
                
             <?php } }  ?>
                
                </tfoot>
              </table>

     </div>
          <?php// } } } }?>
          
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