<div class="table-responsive last_menu">
                  <table class="table table-striped normal-table branch-table " id="table2">
                    <thead> 
                      <tr>
                        <th>
                          <div class="custom-checkbox custom-checkbox-table custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                          </div>
                        </th>
                        <th>SN</th>
                        <th>Controller</th>
                        <th>Method</th>
                        <th>Function Name</th>
                        <th>Status</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sno = 1;
                      foreach ($p_module as $val) { ?>
                        <tr>
                          <td>
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?php echo $sno; ?>" name="mark" value="<?php echo $val->l_module_id; ?>">
                              <label for="checkbox-<?php echo $sno; ?>" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td><?php echo $sno; ?></td>
                           <td><?php foreach($l_module as $row){ if($row->l_module_id == $val->l_module_id) { echo $row->controller; } } ?></td>     
                           <td><?php foreach($l_module as $row){ if($row->l_module_id == $val->l_module_id) { echo $row->method; } } ?></td> 
                           <td><?php echo $val->function_name; ?></td>
                           <td>
                              <?php if($val->status=="1") { ?>
                         <a class="badge badge-danger text-white">Disable</a>
                          <?php } else { ?>
                           <a class="badge badge-success text-white">Active</a>
                          <?php } ?>
                            </td>
                            <td>
                            <div class="dropdown">
                              <a href="#" data-toggle="dropdown" class="btn btn-light text-dark dropdown-toggle text-white">Options</a>
                              <div class="dropdown-menu">
                                <?php $xx = $val->p_module_id; ?>
                                <a class="dropdown-item has-icon" href="javascript:co_upd(<?php echo $xx; ?>)">
                                  <i class="far fa-edit"></i> Edit
                                </a>
                                <a class="dropdown-item has-icon text-danger" href="javascript:remove_co(<?php echo $xx; ?>)">
                                  <i class="far fa-trash-alt"></i> Delete
                                </a>
                                <?php if ($val->status == 0) { ?>
                                  <a class="dropdown-item has-icon" href="javascript:co_status_upd(<?php echo $xx; ?>, 1)">
                                    <i class="fas fa-ban"></i> Disable
                                  </a>
                                <?php } else {  ?>
                                  <a class="dropdown-item has-icon" href="javascript:co_status_upd(<?php echo $xx; ?>, 0)">
                                    <i class="far fa-check-circle"></i> Active
                                  </a>
                                <?php } ?>
                              </div>
                          </td>
                        </tr>
                      <?php $sno++; 
                      } ?>
                    </tbody>
                  </table>
                </div>