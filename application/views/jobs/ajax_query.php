<!DOCTYPE html>
<html>
   <head>
      <title></title>
   </head>
   <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
   <body>
      <?php date_default_timezone_set('Asia/Kolkata'); $currentTime = date( 'd-m-Y h:i:s A', time ()); 
         $given_by =  $_SESSION['Admin']['username'];
         
         ?>
      <form method="post">
         <div class="row">
            <input type="hidden" name="company_id" id="company_id" value="<?php echo @$company->company_id; ?>" >
            <input type="hidden" name="date_time" id="date_time" value="<?php echo @$currentTime; ?>">
            <input type="hidden" name="given_by" id="given_by" value="<?php echo @$given_by; ?>">
            <div class="col-xl-10 col-lg-10 col-md-6 col-sm-6 select_course_package form-group">
               <label>Template*</label>
               <select class="form-control" name="template_id" id="template_id">
                  <option value="">Select Template</option>
                  <?php foreach ($email_template as $lp) { ?>
                  <option value="<?php echo $lp->SendEmail_template_id; ?>"><?php echo $lp->E_template_name; ?></option>
                  <?php } ?>
               </select>
            </div>
            <div class="col-xl-10 col-lg-10 col-md-6 col-sm-6 select_course_package form-group">
               <label for="exampleFormControlTextarea1">Send Company Massage</label>
               <textarea class="form-control" name="message_text" id="message_text" rows="5"></textarea><br>
               <input type="submit" class="btn btn-primary" id="btn_ins">
            </div>
         </div>
      </form>
      <br>
      <table class="table table-bordered table-striped">
         <thead class="btn-primary">
            <tr>
               <th class="text-white">S_NO</th>
               <th class="text-white">Date</th>
               <th class="text-white">Template Name</th>
               <th class="text-white">Email Massage</th>
               <th class="text-white">Given By</th>
            </tr>
         </thead>
         <tbody>
            <?php  $i=1; foreach ($all_query as $val) { ?>
            <tr>
               <td><?php echo $i; ?></td>
               <td><?php echo $val->date_time; ?></td>
               <td>
                  <?php $emailtem = explode(",",$val->email_template_id);
                     foreach($email_template as $row) { if(in_array($row->SendEmail_template_id,$emailtem)) {  echo $row->E_template_name; }  } ?>
               </td>
               <td><?php echo $val->message_text; ?></td>
               <td><?php echo $val->given_by; ?></td>
            </tr>
            <?php $i++; } ?>
         </tbody>
      </table>
      <!-- jQuery 3 -->
      <script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap 3.3.7 -->
      <script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <script>
         $(document).ready(function(){
         $('#template_id').change(function(){
         var SendEmail_template_id = $('#template_id').val();
         //var course_id = $('#course_orsingle').val();
         // var branch_id =  $('#branch_id').val();
         
          $.ajax({
           url:"<?php echo base_url(); ?>FormController/get_emailsend_template_data_id_wise",
           method:"POST",
           data:{ 'SendEmail_template_id' : SendEmail_template_id },
           success:function(res){
             var data = $.parseJSON(res);
            $('#message_text').html(data.record['email_template_record'].E_template_message);
           }
          });
        });
      });   
     </script>
     <script type="text/javascript">
         $('#btn_ins').on('click',function(){
               var company_id = $('#company_id').val();
               var template_id = $('#template_id').val();
               var message_text = $('#message_text').val();
               var date_time = $('#date_time').val();
               var given_by = $('#given_by').val();
         
               $.ajax({
                   type : "POST",
                   url  : "<?php echo base_url(); ?>FormController/ins_query",
                   dataType : "JSON",
                   data : {'company_id' : company_id , 'email_template_id' : template_id , 'message_text' : message_text , 'date_time' : date_time , 'given_by' : given_by },
                   success: function(response){
                     // $('#exampleModal').modal().hide();
                     //$("#admission_id").val("");
                     alert("success");
                     $("#message_text").val("");
                   }
               });
               return false;
           });
      </script>
   </body>
</html>