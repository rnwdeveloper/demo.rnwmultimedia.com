<div class="table-responsive">
      <table class="table table-bordered table-hover bg-table" id="tableExport" style="width:100%;">
        <thead>
          <tr>
            <th>No</th>
            <th>Installment Date</th>
            <th>Due Amount(₹)</th>
            <th>Paid Amount(₹)</th>
            <th>Paid Date</th>
            <th>Paid Status	</th>     
            <!-- <th>Receipt No</th>  -->
          </tr>    
        </thead>
        <tbody>
          <?php $sno = 1; foreach($total_installment as $ins) { ?>
          <tr>
            <td><?php echo $sno; ?></td>
            <td><?php echo $ins->installment_date; ?></td>
            <td><?php echo $ins->due_amount; ?></td>
            <td><?php echo $ins->paid_amount; ?></td>
            <td><?php echo $ins->pay_date; ?></td>
            <td><?php echo $ins->payment_mode; ?></td>
            <!-- <td><?php echo $ins->installment_date; ?></td> -->
          </tr>
          <?php $sno++; } ?>
        </tbody>
      </table>
    </div>


    <script>
        
  $(function() {
    $('#tableExport').DataTable({
        stateSave: true,
        "bDestroy": true
    })
})
    </script>