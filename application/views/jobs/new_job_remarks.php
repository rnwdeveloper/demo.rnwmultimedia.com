<div class="table-responsive">
<table class="table table-bordered table-striped">
          <thead class="btn-primary">
            <tr>
              <th class="text-white">COMPANY NAME</th>
              <th class="text-white">JOB TITLE</th>
              <th class="text-white">Reason</th>
              <th class="text-white">Reason Remarks</th>
              <th class="text-white">Given By</th>
              <th class="text-white">Created Date</th>
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
</div>