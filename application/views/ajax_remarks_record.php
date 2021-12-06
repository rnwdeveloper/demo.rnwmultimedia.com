<div class="remarks_page text-center">
<?php  if(isset($remarks_job)) { echo $remarks_job; }; ?></div>
<div class="table-responsive">
<table class="table">
  <tr style="background:#7460ee; color:white;">
    <th>No</th>
    <th>Date</th>
    <th>Labels</th>
    <th width="70%">Remarks</th>
    <th>Remarks By</th>                      
  </tr>
  <?php $i=0;
    if(isset($remarks_record)) {  foreach($remarks_record as $r)  { ?>
  <tr>
    <td><?php echo ++$i; ?></td>
    <td><?php echo $r->re_date; ?></td>
    <td><?php echo $r->labels; ?></td>
    <td><?php echo $r->remarks; ?></td>
    <td><?php echo $r->remarks_by; ?></td>
  </tr>
  <?php  }  } ?>
</table>
</div>