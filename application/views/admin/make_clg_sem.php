<link rel="stylesheet" type="text/css" href="https://unpkg.com/lightpick@latest/css/lightpick.css">
<?php 
 $no_in =  $data['no_of_semester']; 
 $semesterfees =  $data['semester_fees']; 
 $sem_fees_date =  $data['sem_fees_date']; 
 $examfees =  $data['examination_fees']; 
 $exam_fees_date =  $data['exam_fees_date']; 
 date_default_timezone_set('Asia/Kolkata'); 
 $semfeesdate = substr($sem_fees_date,0,8);
 $intake = explode('-',$data['intake']);
 $final = $semfeesdate.$intake[0];
 date_default_timezone_set('Asia/Kolkata'); 
 $examfeesdate = substr($exam_fees_date,0,8);
  $examfinal = $examfeesdate.$intake[0];
  $efinal = $final;
//  echo $currentTime = date( 'd-M-Y', time());


for($i=1;$i<=($no_in); $i++) { ?>
<div class="form-group col-md-1 col-sm-12 text-center">
  <label for="pwd">#Sem</label>
  <p><?php if(isset($i)){ echo $i; } ?></p>
  <input class="form-control" type="hidden" id="semester" name="semester[]" value="<?php if(isset($i)){ echo $i; } ?>">
</div>
<div class="form-group col-md-3 col-sm-12">
  <label for="pwd">Sem Date:<span style="color: red;">*</span></label>
  <?php 
     ?>
  <input class="form-control" type="text" id="sem_date" name="sem_date[]" value="<?php if(isset($final)) {  echo $final; } ?>" placeholder="Select Date" required>
</div>
<div class="form-group col-md-3 col-sm-12">
  <label for="pwd">Sem Fees:<span style="color: red;">*</span></label>
  <input class="form-control" type="text" id="sem_fees" name="sem_fees[]" value="<?php if(isset($semesterfees)) {  echo $semesterfees; } ?>" placeholder="Enter Fees" required>
</div>
<div class="form-group col-md-3 col-sm-12">
  <label for="pwd">Exam Date:<span style="color: red;">*</span></label>
  <input class="form-control" type="text" id="exam_date" name="exam_date[]" value="<?php if(isset($examfinal)) {  echo $examfinal; } ?>" placeholder="Select Date" required>
</div>
<div class="form-group col-md-2 col-sm-12">
  <label for="pwd">Exam Fees:<span style="color: red;">*</span></label>
  <input class="form-control" type="text" id="exam_fees" name="exam_fees[]" value="<?php if(isset($examfees)) {  echo $examfees; } ?>" placeholder="Exam Fees" required>
</div>

<?php 
 
      $time = strtotime($final);
      $final = date("d-m-Y", strtotime("+6 months", $time)); 
      $exafinal = strtotime($examfinal);
      $examfinal = date("d-m-Y", strtotime("+4 months", $exafinal));
   } ?> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://unpkg.com/lightpick@latest/lightpick.js"></script>
<script>
      var picker = new Lightpick({
        field: document.getElementById(''),
        onSelect: function(date){
          document.getElementById('result-1').innerHTML =  date.format('Do MMMM YYYY');
        }
        
      });
  </script>
  <script>
        var picker = new Lightpick({
          field: document.getElementById('exam_date '),
          onSelect: function(date){
            document.getElementById('result-1').innerHTML =  date.format('Do MMMM YYYY');
          }
          
        });
    </script>