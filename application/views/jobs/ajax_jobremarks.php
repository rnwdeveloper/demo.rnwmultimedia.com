

<table class="table table-striped overdue-table" id="table-2">
<thead>
    <tr>
    <th>No</th>
    <th>Date</th>
    <th>Faculty</th>
    <th>Labels</th>
    <th width="200px">Remarks</th>
    <th>Remarks By</th> 
    </tr>
</thead>
<tbody>             
    <?php $sno=1; foreach($get_multi_remarks as $row) {?>
    <tr>
    <td><?php echo $sno; ?></td>
    <td><?php echo $row->re_date; ?></td>
    <td><?php echo $row->faculty_assign ; ?></td>
    <td><?php echo $row->labels; ?></td>
    <td><?php echo $row->remarks; ?></td>
    <td><?php echo $row->remarks_by; ?></td>
</tr> 
<?php $sno++; } ?>
</tbody>
</table>