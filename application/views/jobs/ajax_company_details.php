<div class="table-responsive company_detail">
<table class="table table-bordered table-striped " id="company_detail">
   <thead class="bg-primary text-primary">
      <tr>
         <th class="text-white">Company Name</th>
         <th class="text-white">Company No</th>
         <th class="text-white">Company URL</th>
         <th class="text-white">Employer Name</th>
         <th class="text-white">Employer Designation</th>
         <th class="text-white">Company Email</th>
         <th class="text-white">Company Address</th>
         <th class="text-white">status</th>
         <th class="text-white">Agreements</th>
         <th class="text-white">Register Date</th>
         <!-- <th>Action</th> -->
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>
            <p id="student_name"><?php echo $record->company_name; ?></p>
         </td>
         <td>
            <p id="student_email"><?php echo $record->company_number; ?></p>
         </td>
         <td><a href="<?php echo $record->url; ?>" target="_blank"><?php echo $record->url?></a></td>
         <td>
            <p id="student_email"><?php echo $record->employer_name; ?></p>
         </td>
         <td>
            <p id="student_email"><?php echo $record->employer_designation; ?></p>
         </td>
         <td>
            <p id="student_email">
               <img src="<?php echo base_url(); ?>images/copy_paste.png" height="13" width="13" data-toggle="tooltip"  title="Click to copy"  style="cursor: hand"   id="copy_paste_record_cd" onclick="return get_copy_paste_cd()" onmouseover="return change_copy_paste_text_email()">
               <span data-toggle="tooltip" data-placement="top" title="!!!" id="company_username_password">username :<?php echo $record->email_id; ?>  password : <?php echo $record->password;   ?></span>
            <div style="">
               <form target="_blank" method="post" action="https://demo.rnwmultimedia.com/placement/company_login_data.php">
                  <input type="hidden" name="email_login" value="<?php echo $record->email_id; ?>">
                  <input type="hidden" name="password_login" value="<?php echo $record->password;   ?>"><br>
                  <?php if(@$record->status == '1') { ?>
                  <input type="submit" value="Login" name="login">
                  <?php } ?>
               </form>
            </div>
            </p>
            <!--  <span style="position:relative; top:0; right:0;font-size: 16px;;margin-left:cursor: hand" id="show_username_password"> -->
            <!-- </span> -->
            <!--     <span style=" font-size: 16px;cursor: hand" id="ToggelEffectButton">
               <a href="#"> <img src="http://demo.rnwmultimedia.com/placement/img/lock_image.png" alt="face" height="13px" width="13px"></a>
               
               </span> -->
         </td>
         <td>
            <p id="student_email"><?php echo $record->company_address; ?></p>
         </td>
         <td> <?php if($record->status==0) { ?>
            <span class="badge badge-warning">Pending</span>
            <?php } ?>
            <?php if($record->status==1) { ?>
            <span class="badge badge-success ">Active</span>
            <?php } ?>
            <?php if($record->status==2) { ?>
            <span class="badge badge-danger ">Deactive</span>
            <?php } ?>
            <?php if($record->status==3) { ?>
            <span class="badge badge-red">Dumped</span>
            <?php } ?>
         </td>
         <td>
            <p id="student_email"><?php echo $record->agreeterms; ?></p>
         </td>
         <td>
            <p id="student_email"><?php echo $record->date; ?></p>
         </td>
      </tr>
   </tbody>
</table>
<div>
<script type="text/javascript">
   function get_copy_paste_cd(){
     var data_text  = "company_username_password";
     var dd =  document.getElementById(data_text).textContent;
     
     var inp =document.createElement('input');
     document.body.appendChild(inp)
     inp.value =dd;
     inp.select();
     document.execCommand('copy',false);
     inp.remove();
     var copy_ppp =  "company_username_password";
     var ddd =  document.getElementById(copy_ppp);
     $('#'+copy_ppp).tooltip('hide').attr('data-original-title', 'copied').tooltip('show');
   }
   
   
   $(document).ready(function(){
      $("#ToggelEffectButton").click(function(){
           $('#show_username_password').fadeToggle(1000);
       });
    });
   
    $('#show_username_password').hide();
</script>