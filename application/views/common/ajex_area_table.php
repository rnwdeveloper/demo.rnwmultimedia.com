                    <div class="table-responsive area_table">
                        <table class="table table-striped normal-table" id="table1">
                           <thead>
                              <tr>
                                 <th width="30">ID</th>
                                 <th width="300">Country Name</th>
                                 <th width="150">State Name</th>
                                 <th width="150">City Name</th>
                                 <th width="150">Area Name</th>
                                 <th width="100">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($city_area_all as $val) {?>
                              <tr>
                                 <td><?php echo $val->area_id;?></td>
                                 <td><?php echo $val->country_name;?></td>
                                 <td><?php echo $val->state_name;?></td>
                                 <td><?php echo $val->city_name;?></td>
                                 <td><?php echo $val->area_name;?></td>
                                 <td>
                                    <a href="javascript:area_upd(<?php echo $val->area_id; ?>)" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="javascript:remove_ar(<?php echo $val->area_id; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
                                 </td>
                              </tr>
                              <?php }?>
                           </tbody>
                        </table>
                     </div>