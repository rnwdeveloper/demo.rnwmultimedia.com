
                    <div class="table-responsive">
                      <table class="table table-striped normal-table" id="table-2">
                        <thead>
                          <tr class="text-center">
                            <th>SN</th>
                            <th>Attendance Date</th>
                            <th>Attendance Time From</th>
                            <th>Attendance Time To</th>
                            <th>Attendance Type</th>
                            <th>Added By</th>
                          </tr>
                        </thead>
                        <tbody>
                           <?php $sno=1; foreach($attendance_list as $val) {  ?>
                          <tr class="text-center">
                           <td><?php echo $sno; ?></td>
                           <td><?php echo $val->attendance_date; ?></td>
                           <td><?php echo $val->attendance_time_from; ?></td>
                           <td><?php echo $val->attendance_time_to; ?></td>
                           <td><?php echo $val->attendance_type; ?></td>
                           <td><?php echo $val->created_by; ?></td>
                          </tr>
                        <?php $sno++; }  ?>
                        </tbody>
                      </table>
                    </div>
                 

                 <script>
                  $(function() {
    $('#table-2').DataTable({
        stateSave: true,
        "bDestroy": true
    })
})
                 </script>