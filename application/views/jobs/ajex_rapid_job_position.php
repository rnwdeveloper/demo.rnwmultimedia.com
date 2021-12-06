<div class="table-responsive">
                      <table class="table table-striped normal-table" id="table1">
                        <thead>
                          <tr>
                            <th>Company Details</th>
                            <th>Recruiter Name</th>
                            <th>Job Title</th>
                            <th>Salary</th>
                            <th>No Of Vacancy</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Job location</th>
                            <th width="200">Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($rapid_job as $val) { ?>
                          <tr>
                              <td>
                                <strong><?php echo $val->company_name; ?></strong><br>
                                <span class="text-primary"><a href="<?php echo $val->company_email;  ?>" target="_blank"><?php echo $val->company_email;  ?></a></span><br>
                                <?php echo $val->company_address;  ?><br>
                              </td>
                              <td><?php echo $val->recruiter_name;  ?></td>
                              <td>
                                  <strong><?php echo $val->job_title;  ?></strong><br>
                                  <?php echo $val->position;  ?>
                              </td>
                              <td><?php echo $val->salary;  ?></td>
                              <td><?php echo $val->no_of_vacancy;  ?></td>
                              <td><?php echo $val->start_date;  ?></td>
                              <td><?php echo $val->end_date;  ?></td>
                              <td>
                              <?php echo $val->job_city;  ?><br>
                              <?php echo $val->job_location;  ?>
                              </td>
                              <td><?php echo $val->description;  ?></td>
                              <td>
                                <a href="javascript:co_upd(<?php echo $val->rapid_post_id ; ?>)"  class="bg-primary action-icon text-white btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                <a href="javascript:delete_job(<?php echo $val->rapid_post_id ; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
                              </td>
                            </tr>
                            <?php }?>
                          </tbody>
                      </table>
                    </div>