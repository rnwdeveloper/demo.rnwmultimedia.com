<div class="col-12">
<input type="hidden" class="form-control" id="tuation_fees_two" value="<?php if (isset($get_adm_data->tuation_fees)) {
																								echo $get_adm_data->tuation_fees;
																							} ?>">
    <input type="hidden" class="form-control" id="registration_fees_two" value="<?php if (isset($get_adm_data->registration_fees)) {
                                                                                    echo $get_adm_data->registration_fees;
                                                                                } ?>">
    <input type="hidden" class="form-control" name="admission_id" id="admission_id" value="<?php if (isset($get_adm_data->admission_id)) {
                                                                                echo $get_adm_data->admission_id;
                                                                            } ?>">
      <div class="col-md-4 ml-auto text-right"><input type="text"
         class="form-control w-25 ml-auto d-inline-block mr-3" name="no_of_installments"
         id="no_of_installments" value="<?php if (isset($get_adm_data->no_of_installment)) {
                echo $get_adm_data->no_of_installment;
            } ?>"><input type="button" value="Make Installment"
         class="btn btn-primary" onclick="return make_installment_process()">
      </div>
      <div class="card-body pl-3 pr-3 row pb-1 pt-2" id="installment_all_data">
         <div class="col-lg-12">
         </div>
         <div class="col-lg-2">
            <div class="form-group text-center">
               <label><strong>#NO</strong></label>
               <?php $no = "1"; ?>
               <p><?php if (isset($no)) {
                  echo $no;
                  } ?></p>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="form-group">
               <label>Installment Date</label>
               <input type="text" class="form-control">
            </div>
         </div>
         <div class="col-lg-3">
            <div class="form-group">
               <label>Due Amount</label>
               <input type="text" class="form-control">
            </div>
         </div>
         <div class="col-lg-3">
            <div class="form-group">
               <label>Paid Amount</label>
               <input type="text" class="form-control">
            </div>
         </div>
         <div class="col-lg-2">
         </div>
         <div class="col-lg-2">
            <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="customCheck1">
               <label class="custom-control-label" for="customCheck1">Send SMS To:</label>
            </div>
         </div>
         <div class="col-lg-2">
            <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="customCheck2">
               <label class="custom-control-label" for="customCheck2">Send Email To:</label>
            </div>
         </div>
         <div class="col-lg-3">
            <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="customCheck3">
               <label class="custom-control-label" for="customCheck3">Send SMS Father:</label>
            </div>
         </div>
         <div class="col-lg-3">
            <div class="custom-control custom-checkbox">
               <input type="checkbox" class="custom-control-input" id="customCheck4">
               <label class="custom-control-label" for="customCheck4">Send Email
               Father:</label>
            </div>
         </div>
      </div>
</div>

<script>
    function make_installment_process() {
        var admission_id = $('#admission_id').val();
        var tution_fee = $('#tuation_fees_two').val();
        var registration_fees = $('#registration_fees_two').val();
        var noOfInstallment = $('#no_of_installments').val();
        if (tution_fee == '' || registration_fees == '') {
            alert('please Enter Tution fees and Registration Fees');
            return false;
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>Admission/ErpUpdAdm_installment",
                type: "post",
                data: {
                    'admission_id': admission_id,
                    'tution_fee': tution_fee,
                    'reg_fees': registration_fees,
                    'no_of_install': noOfInstallment
                },
                success: function(data) {
                    // console.log(data);
                    $('#installment_all_data').html(data);
                    // var res = $.parseJSON(data);
                    // $('#tuation_fees').val(res.get_install.package_fees);
                    // $('#no_of_installment').val(res.get_install.installment);
                    // // var newrec =  res.record['get_install'];
                    // // console.log(newrec);
                    // // $('#installment_all_data').html(data);
                }
            });
        }
    }
    </script>

