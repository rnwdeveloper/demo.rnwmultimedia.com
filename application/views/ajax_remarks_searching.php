<div class="table-responsive">

<table class="table">
  <tr style="background:#7460ee; color:white;">
    <th>No</th>
    <th>Date</th>
    <th>Assign Faculty</th>
    <th>Labels</th>
    <th width="50%">Remarks</th>
    <th>Remarks By</th> 
   </tr>
<?php   
$i=1;
if(count($student_remakrs)>0){
foreach($student_remakrs as $sr) { ?>
   <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $sr->re_date; ?></td>
    <td><?php echo $sr->faculty_assign; ?></td>
    <td><?php echo $sr->labels; ?></td>
    <td><?php echo $sr->remarks; ?></td>
    <td><?php echo $sr->remarks_by; ?></td>
  

   </tr>                     

<?php $i++; } } else { 
  
  echo "<div  style='color:red; font-size:16px;'>NO Record Found</div>";

 } ?>
  
</table>
</div>