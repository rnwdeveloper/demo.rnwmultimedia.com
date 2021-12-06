
 <table class="table table-bordered table-striped">
          <thead class="btn-primary">
            <tr>
              <th>COMPANY NAME</th>
              <th>JOB TITLE</th>
              <th>POSITION</th>
              <th>SALARY</th>
              <th>DESCRIPTION</th>
              <th>From-To</th>
              <th>JOB AREA</th>
              <th>NO OF VACANCY</th>
              <th>COMPANY ADDRESS</th>
              <th>JOB_Status</th>
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
                <a href="javascript:dat(#)" class="btn btn-success">Active</a>
              <?php } else { ?> 
                <a href="javascript:dat(#)" class="btn btn-danger">Deactive</a>
              <?php } ?>
              </p></td>
            </tr>

          </tbody>
       </table><br><br><br>


<!--   Jobs all remarks and comments given by Recruiter and admins -->



 <table class="table table-bordered table-striped">
          <thead class="btn-primary">
            <tr>
              <th>COMPANY NAME</th>
              <th>JOB TITLE</th>
              <th>Reason</th>
              <th>Reason Remarks</th>
              <th>Given By</th>
              <th>Created Date</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($comment_reason as $record) { ?>
              <tr>
                <td><p id="com_name"><?php echo $record->company_name; ?></p></td> 
                <td><p id="job_title"><?php echo $record->job_name; ?></p></td>
                <td><p id="positi"><?php echo $record->de_reason; ?></p></td>
                <td><p id="salary"><?php echo $record->de_reason_remark; ?></p></td>
                <td><p id="description"><?php echo $record->de_by_name; ?></p></td>
                <td><p id="description"> <?php echo $record->de_created_date; ?></p></td>
              </tr>
            <?php } ?>
          </tbody>
       </table>




