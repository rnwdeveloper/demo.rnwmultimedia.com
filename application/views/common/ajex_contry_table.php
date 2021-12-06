<div class="table-responsive con_table" >
<table class="table table-striped normal-table" id="table1">
<thead>
    <tr>
        <th width="90">ID</th>
        <th width="900">Country Name</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php foreach($country_all as $val){?>
    <tr>
        <td><?php echo $val->country_id; ?></td>
        <td><?php echo $val->country_name; ?></td>
        <td>
            <a href="javascript:con_upd(<?php echo $val->country_id; ?>)" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
            <a href="javascript:remove_co(<?php echo $val->country_id; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
        </td>
    </tr>
    <?php }?>
</tbody>
</table>
</div>
<script src="https://demo.rnwmultimedia.com/dist/assets/js/app.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<!-- Page Specific JS File -->