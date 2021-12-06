
 <div class="table-responsive batch_table">
 <table class="table table-bordered table-striped">
          <thead class="text-white btn-primary " >
            <tr>
              <th class="text-white">Job Title</th>
              <th class="text-white">Position</th>
              <th class="text-white">Description</th>
              <th class="text-white">Salary</th>
              <th class="text-white">Start Date</th>
              <th class="text-white">End Date</th>
              <th class="text-white">Job Area</th>
              <th class="text-white">NoOfVacancy</th>
              <th class="text-white">Company Name</th>
              <th class="text-white">Company URL</th>
              <th class="text-white">Created Date</th>
             <th class="text-white">Action</th>
            </tr> 
          </thead>
          <tbody>
            
            <?php foreach($recruiter as $val) { ?>
            <tr>
                    <td><?php echo $val->job_name; ?>
                      
                    </td>
                    <td><?php echo $val->position;  ?> - (<?php echo $val->job_subcategory; ?> )</td>
                    <td><?php echo $val->job_description;  ?></td>
                    <td><?php echo $val->salary;  ?></td>
                    <td><?php echo $val->start_date;  ?></td>
                    <td><?php echo $val->end_date;  ?></td>
                    <td><?php echo $val->job_area;  ?></td>
                    <td><?php echo $val->no_of_vacancy;  ?></td>
                    <td><?php echo $val->company_name; ?></td>
                    <td><a href="<?php echo $val->url; ?>" target="_blank"><?php echo $val->url?></a></td>
                    <td><?php echo $val->created_at;  ?></td>
                
                    
                 
                      <td>
                      <?php if($val->status == '0') { ?>
                        <a class="btn  btn-primary " href="<?php echo base_url(); ?>Common/active_recruiter/<?php echo $val->company_id; ?>">Active</a>
                    <?php } else { ?>

                        <a class="btn  btn-primary " href="<?php echo base_url(); ?>Common/Deactive_recruiter/<?php echo $val->company_id; ?>">DeActive</a>

                    <?php } ?>

                    </td>
                
                  </tr> 
          <?php } ?>
          </tbody>
       </table>
                    </div>