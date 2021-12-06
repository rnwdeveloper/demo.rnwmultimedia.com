<div class="table-responsive">
 <table class="table table-bordered table-striped">
          <thead class="btn-primary">
            <tr>
              <th class="text-white">COMPANY NAME</th>
              <th class="text-white">JOB TITLE</th>
              <th class="text-white">POSITION</th>
              <th class="text-white">SALARY</th>
              <th class="text-white">DESCRIPTION</th>
              <th class="text-white">From-To</th>
              <th class="text-white">JOB AREA</th>
              <th class="text-white">NO OF VACANCY</th>
              <th class="text-white">COMPANY ADDRESS</th>
              <th class="text-white">JOB_Status</th>
              <!-- <th>REGISTER DATE</th> -->

              
              <!-- <th>Action</th> -->
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><p id="com_name"><?php echo $record->company_name; ?></p></td> 
              <td><p id="job_title"><?php echo $record->job_name; ?></p></td>
              <td><p id="positi"><?php echo $record->position; ?> - ( <?php echo $record->job_subcategory; ?> ) </p></td>
              <td><p id="salary"><?php echo $record->salary; ?></p></td>
              <td><p id="description"><?php echo $record->job_description; ?></p></td>
              <td><p id="description">FROM :<?php echo $record->start_date."<br> TO :".$record->end_date; ?></p></td>
              <td><p id="description"><?php echo $record->job_area; ?></p></td>
              <td><p id="description"><?php echo $record->no_of_vacancy; ?></p></td>
              <td><p id="description"><?php echo $record->company_address; ?></p></td>
              <td><p id="description"><?php if($record->job_status==0){ ?>
                <a href="javascript:dat(#)" class="btn btn-primary text-white">Active</a>
              <?php } else { ?> 
                <a href="javascript:dat(#)" class="btn btn-primary text-white">Deactive</a>
              <?php } ?>
              </p></td>
            </tr>

          </tbody>
       </table>
              </div>
