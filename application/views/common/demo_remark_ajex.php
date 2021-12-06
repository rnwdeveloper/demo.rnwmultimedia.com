<div class="table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                            <th width="350px">Remark Date And Time</th>
                                            <th width="400px">Comment</th>
                                            <th>By</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php foreach($select_remarks as $val) { ?>
                                        <tr>
                                            <td><?php echo $val->demo_remark_date; ?></td>
                                            <td><?php echo $val->demo_remark_comment; ?></td>
                                            <td><?php echo $val->demo_remark_by; ?></td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>