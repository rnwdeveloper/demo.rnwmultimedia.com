<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<link rel="stylesheet" type="text/css" href="https://unpkg.com/lightpick@latest/css/lightpick.css">

  <div id="insdatechange_datemsg"></div>
  <div class="form-row">
    <input type="hidden" class="form-control installmentdateid" value="<?php echo $installment_reco->admission_installment_id; ?>">
    <input type="hidden" class="form-control admissionid" value="<?php echo $admission_data->admission_id; ?>">
    <div class="form-group col-md-12">
      <label>InstallmentDate Date</label>
      <input type="date" id="" class="form-control upd_ins_date" value="<?php echo $installment_reco->installment_date; ?>"/>
    </div>
    <div class="form-group col-md-12">
        <label>Labels :<span style="color: red;">*</span></label>
         <select class="form-control labels" name="labels" id="" required>
         <option value="">Select Labels</option>
         <option>General</option>
         <option>Fees</option>
         <option>Studies</option>
         <option>Punctuality</option>
         <option>Discipline</option>
      </select>
      </div>
      <div class="form-group col-md-12">
      <label for="inputEmail4">Rating :<span style="color:red">*</span></label>
      <select class="form-control rating" name="rating" id="" required>
         <option value="">Select Labels</option>
         <?php for($i=1;$i<=5;$i++){ ?>
         <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
         <?php } ?>
      </select>
    </div>
    <div class="form-group col-md-12">
      <label for="inputPassword4">Remarks :<span style="color:red">*</span></label>
     <textarea class="form-control" name="insdatechange_remarks" id="insdatechange_remarks" required></textarea>
    </div>
    </div>
    <button class="btn btn-primary" type="submit" id="insdate_upd">Submit</button>
</div>

<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>

<script>
  $('#insdate_upd').on('click', function() {
     var admission_installment_id = $('.installmentdateid').val();
     var admission_id = $('.admissionid').val();
     var installment_date = $('.upd_ins_date').val();
     var labels = $('.labels').val();
     var rating = $('.rating').val();
     var remarks = $('#insdatechange_remarks').val();

     $.ajax({
       type: "POST",
       url: "<?php echo base_url() ?>Admission/ErpInsUpdDate",
       data: {
         'admission_installment_id' : admission_installment_id , 'admission_id': admission_id , 'installment_date' : installment_date , 'labels' : labels , 'rating' : rating ,'remarks' : remarks },    
       success: function(resp){
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            var lastAdmiid = data['lastAdmiid'];
            if(ddd == '1'){
              $('#insdatechange_datemsg').html(iziToast.success({
                title: 'Success',
                timeout: 2500,
                message: 'Successfully Changed Date.',
                position: 'topRight'
                })); 

            $.ajax({
						url: "<?php echo base_url(); ?>Admission/Erppayment_Admisison",
						type: "post",
						data: {
							'admission_id': lastAdmiid
						},
						success: function(Resp) {
							$('.bg-table').html(Resp);
						}   	
					  });
            } else if(ddd == '2'){
              $('#insdatechange_datemsg').html(iziToast.error({
                title: 'Canceled!',
                timeout: 2500,
                message: 'Someting Wrong!!',
                position: 'topRight'
                }));
            }
       }
     });
     return false;
   });
</script>

