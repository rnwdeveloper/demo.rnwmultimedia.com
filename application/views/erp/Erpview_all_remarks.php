
<link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<div class="table-responsive view-remark-record">
    <table class="table table-bordered bg-table" id="table-1">
      <thead>
        <tr>
            <th class="text-center">No</th>
            <th>Remarks</th>
            <th>Labels</th>
            <th width="70">Rating</th>
            <th>Date</th>
            <th>Time</th>
            <th>Addby</th>
        </tr>
    </thead>
    <tbody>
      <?php $sno=1; foreach($all_admission_remarsk as $val) { ?>
      <tr >
         <td><?php echo $sno; ?></td>
         <td><?php echo $val->admission_remrak; ?></td>
         <td>
         <?php if($val->labels==""){ ?>
          <?php $amids = explode(",", $val->dropdown_adm_id);
              foreach ($all_labels as $row) {
                if (in_array($row->d_adm_id, $amids)) {
                  echo $row->name;
                }
          } ?>
         <?php } else { ?>
          <?php echo $val->labels; ?>
         <?php } ?>
         </td>
         <td>
            <?php for($k=1;$k<=5;$k++) { ?>
            <span class="fa fa-star <?php if($val->rating>=$k) { echo "checked"; } ?>"></span>
            <?php } ?>
         </td>
         <td><?php echo $val->remarks_date; ?></td>
         <td><?php echo $val->remarks_time; ?></td>
         <td><?php echo $val->addby; ?></td>
      </tr>
       <?php $sno++; } ?>
            </tbody>
    </table>
  </div>  
   


  <script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>  
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script> 
  <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
   <!-- General JS Scripts -->
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
  <!-- JS Libraies --> 
  <script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
  