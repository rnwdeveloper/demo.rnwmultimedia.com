<table border="1">
   <tr>
      <th>No</th>
      <th>Remarks By</th>
      <th>Remarks</th>
      <th>Status</th>
      <th>Date</th>
   </tr>
   <?php $i=1;  foreach($all_remarks as $val) { ?>
   <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $val->remark_by; ?></td>
      <td><?php echo $val->remarks; ?></td>
      <td><?php echo $val->status; ?></td>
      <td><?php echo $val->date; ?></td>
   </tr>
   <?php $i++; } ?>
</table>