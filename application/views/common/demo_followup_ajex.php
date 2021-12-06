<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th width="200px">Date</th>
                <th width="380px">Follow Up</th>
                <th width="190px">By</th>
                <th width="200px">Time</th>
            </tr> 
        </thead>
        <tbody>
                                    
    <?php
    @$all_re = explode("&&",$single_reco_demo->reason);
    for($i=0;$i<sizeof(@$all_re);$i++)
    {
    @$res = explode("|/|",@$all_re[$i]);
    ?>   
    <tr>
    <td><?php echo @$res[0]; ?></td>
    <td><?php echo @$res[1]; ?></td>
    <td><?php echo @$res[2]; ?></td>
    <td><?php echo @$res[3]; ?></td>
    </tr>
    <?php  }?>
    </tbody>
    </table>
    </div>