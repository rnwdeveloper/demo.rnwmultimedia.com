<div class="table-responsive ">
                                    <table class="table table-striped normal-table staff_table" id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Branch Name</th>
                                                <th>Logtype</th>
                                                <th>Employee Name</th>
                                                <th>Designation</th>
                                                <th>Email</th>
                                                <th>Personal Mobile No</th>
                                                <th>Offical Mobile No</th>
                                                <th>Last Seen</th>
                                                <th>Status</th>
                                                <th width="100">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sno=1; foreach($StaffDetail_all as $val) { ?>
                                            <tr>
                                                <td><?php echo $sno; ?></td>
                                                <td>
                                                    <?php $branch_ids = explode(",",$val->branch_id);
                                                    foreach($branch_all as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo $row->branch_name."<br>"; }  } ?>
                                                </td>
                                                <td><?php echo $val->logtype; ?></td>                             
                                                <td><?php echo $val->name; ?></td>                             
                                                <td><?php echo $val->designation; ?></td>     
                                                <td><?php echo $val->email; ?></td>                         
                                                <td><?php echo $val->personal_mobile_no; ?></td>  
                                                <td><?php echo $val->mobile_no; ?></td>
                                                <td><?php echo $val->date_time; ?></td>
                                                <td><?php if($val->status=="0") {?> <span class="badge badge-success">Active</span> <?php } if($val->status=="1") { ?><span class="badge badge-danger">Diactive</span><?php  } ?></td>
                                                <td>
                                                    <a href="javascript:co_upd(<?php echo $val->id; ?>)" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="javascript:remo_co(<?php echo $val->id; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
                                                    <?php $xx = $val->id; ?>
                                                    <?php if ($val->status == 0) { ?>                                      
                                                    <a class="bg-danger action-icon text-white btn-danger" href="javascript:co_status(<?php echo $xx; ?>,1)"><i class="fas fa-ban "></i>                                                     </a>
                                                    <?php } else {  ?>
                                                    <a class="bg-primary action-icon text-white btn-primary" href="javascript:co_status(<?php echo $xx; ?>,0)"><i class="fa fa-check"></i></a>
                                                    <?php }  ?>
                                                </td>
                                            </tr>
                                        <?php $sno++; } ?>
                                        </tbody>
                                    </table>
                                </div>