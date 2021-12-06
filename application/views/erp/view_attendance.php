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
         <?php $sno=1; foreach($attendance_list as $key => $val) { ?> 
         <tr class="text-center">
            <td><?php echo $sno; ?></td>
            <td><?php echo substr($val->LogDate,0,-9); ?></td>
            <td><?php $time_out = explode(" ", $val->LogDate); print_r($time_out[1]);  ?></td>
            <td><?php  $time_out = explode(" ", $val->LogDate); print_r($time_out[1]); ?></td>
            <td><?php echo "Present"; ?></td>
            <td><?php echo "By Punch"; ?></td>
         </tr>
         <?php $sno++;  } ?>
      </tbody>
   </table>
</div>
<?php // $value = json_decode(json_encode($val), true);  $mer_arr = array_merge($value); 
   //   $result[] = array_merge($val,array("foo"=>"foo")); 
   //
   // }
   //    print_r(end($result)); 
   
      ?>