
                    <div class="table-responsive city_table">
                     <table class="table table-striped normal-table" id="table1">
                        <thead>
                           <tr>
                              <th width="30">ID</th>
                              <th width="400">Country Name</th>
                              <th width="200">State Name</th>
                              <th width="200">City Name</th>
                              <th width="100">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach($city_all as $val){?>
                           <tr>
                              <td><?php echo $val->city_id; ?></td>
                              <td><?php echo $val->country_name; ?></td>
                              <td><?php echo $val->state_name; ?></td>
                              <td><?php echo $val->city_name; ?></td>
                              <td>
                                 <a href="javascript:city_upd(<?php echo $val->city_id; ?>)" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                 <a href="javascript:remove_ci(<?php echo $val->city_id; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
                              </td>
                           </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                  </div>