<div class="table-responsive">
<table class="w-100">
    <thead>
        <tr>
            <th>Date</th>
            <th>Attendance</th>
            <th>Mark By</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
    <?php $all_att = explode("&&",$single_reco_demo->attendance);
        for($i=0;$i<sizeof($all_att);$i++)
        {
        $att = explode("/",$all_att[$i]);
        ?>   
        <tr>  
            <td><?php echo @$att[0]; ?></td>
            <td><?php echo @$att[1]; ?></td>
            <td><?php echo @$att[2]; ?></td>
            <td><?php echo @$att[3]; ?></td>
        </tr>
        <?php }?>
    </tbody>
</table>
</div>