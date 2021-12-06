<div class="table-responsive clg_table">
                                       <table class="table table-striped normal-table" id="table1">
                                          <thead>
                                             <tr>
                                              <th>Sno</th>
                                              <th>Clg Name</th>
                                              <th>Area</th>
                                              <th>Pincode</th>
                                              <th>City</th>
                                              <th>State</th>
                                              <th>Country</th>
                                              <th>Added At</th>
                                              <th>Added By</th>
                                              <th>Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                            <?php foreach($all_clg_info as $val){?>
                                              <tr>
                                              <td><?php echo $val->clg_id;?></td>
                                              <td><?php echo $val->clg_name;?></td>
                                              <td><?php echo $val->area_name;?></td>
                                              <td><?php echo $val->pincode;?></td>
                                              <td><?php echo $val->city_name;?></td>
                                              <td><?php echo $val->state_name;?></td>
                                              <td><?php echo $val->country_name;?></td>
                                              <td><?php echo $val->added_at;?></td>
                                              <td><?php echo $val->added_by;?></td>
                                              <td>
                                              <a href="javascript:clg_upd(<?php echo $val->clg_id; ?>)" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                              <a href="javascript:remove_clg(<?php echo $val->clg_id; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
                                              </td>
                                              </tr>
                                            <?php }?>
                                          </tbody>
                                       </table>
                                    </div>