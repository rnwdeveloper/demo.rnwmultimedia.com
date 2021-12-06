<div class="table-responsive st_table" >
<table class="table table-striped normal-table" id="table1">
<thead>
    <tr>
        <th width="30">ID</th>
        <th width="500">Country Name</th>
        <th width="300">State Name</th>
        <th width="100">Action</th>
    </tr>
</thead>
<tbody>
    <?php foreach($state_all as $val) {?>
    <tr>
        <td><?php echo $val->state_id;?></td>
        <td><?php echo $val->country_name;?></td>
        <td><?php echo $val->state_name;?></td>
        <td>
            <a href="javascript:stat_upd(<?php echo $val->state_id; ?>)" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
            <a href="javascript:remove_st(<?php echo $val->state_id; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
        </td>
    </tr>
    <?php } ?>
</tbody>
</table>
</div>