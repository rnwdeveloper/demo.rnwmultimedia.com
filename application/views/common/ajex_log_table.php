<div class="table-responsive">
                                <table class="table table-striped normal-table log_table" id="table">
                                    <thead>
                                        <th>No</th>
                                        <th>Logtype</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                    <?php $sno=1; foreach($logtypestaff_all as $val) { ?>
                                        <tr>
                                            <td><?php echo $sno; ?></td>
                                            <td><?php echo $val->logtype_name; ?></td>
                                            <td><?php if($val->status=="0") {?> <span class="badge badge-success">Active</span> <?php } if($val->status=="1") { ?><span class="badge badge-danger">Diactive</span><?php  } ?></td>
                                            <td>
                                                <a href="javascript:log_upd(<?php echo $val->logtype_id ; ?>)" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="javascript:remo_log(<?php echo $val->logtype_id; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
                                                <?php $xx = $val->logtype_id; ?>
                                                    <?php if ($val->status == 0) { ?>                                      
                                                    <a class="bg-danger action-icon text-white btn-danger" href="javascript:co_status_pro(<?php echo $xx; ?>,1)"><i class="fas fa-ban "></i>                                                     </a>
                                                    <?php } else {  ?>
                                                    <a class="bg-primary action-icon text-white btn-primary" href="javascript:co_status_pro(<?php echo $xx; ?>,0)"><i class="fa fa-check"></i></a>
                                                    <?php }  ?>
                                            </td>
                                        </tr>
                                        <?php $sno++; } ?>
                                    </tbody>
                                </table>
                            </div>