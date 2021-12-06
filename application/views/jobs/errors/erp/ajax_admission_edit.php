 

    

<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/select2.min.css">

<style type="text/css">

  .select2-container--default .select2-selection--multiple .select2-selection__choice {

    background-color: #2255a4;

    color: white;

    border: 1px solid #aaa;

    border-radius: 4px;

    cursor: default;

    float: left;

    margin-right: 5px;

    margin-top: 5px;

    padding: 0 5px;

}

/*.select2-container--default .select2-selection--multiple {

    line-height: 27px;

}*/

.select2-container {

    box-sizing: border-box;

    display: block; 

    width:100% !important;

    margin: 0;

    position: relative;

    vertical-align: middle;

    z-index: 9999999999;

}

.select2-container--default .select2-selection--multiple .select2-selection__rendered li {

    list-style: none;

    }

.simple_border_box_design .form-group{

  display:block;

}

label{

  font-size: 12px;

  margin-bottom: 5px !important;

}

.form-control{

  height: 24px !important;

  font-size: 12px !important;

  padding: 0 0 0 10px;

}

select.form-control:not([size]):not([multiple]) {

    height: calc(1.7rem + 2px);

}

.form-group{

  margin-bottom: 5px;

}

</style>





<div class="modal-header">

					<h5 class="modal-title"><b>Admission Edit</b></h5>

					<div class="btn-group">

						<!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#edit_demo_show">Edit admission </button>

						<button type="button" class="btn btn-danger btn-sm" >Discard</button>

						<button type="button" class="close" data-dismiss="modal" aria-label="Close">

							<span aria-hidden="true">&times;</span>

						</button> -->

					</div>

				</div>

				<div class="modal-body">

			  <div class="row">

        <div class="col-xl-12">

          <form  enctype="multipart/form-data" method="post">

            <input type="hidden" name="adm_update_id" id="adm_update_id" value="<?php echo $adm_record->admission_id; ?>">

            <div class="simple_border_box_design">

              <span class="addmision_process_top_title">Postal Communication</span>

              <div class="form-row" style="margin-top: -18px;">

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 form-group">

                  <label for="inputState">State</label>

                  <select class="form-control custom-form-control" name="state_id" id="state_id">

                    <option selected>Select State</option>

                      <?php foreach($list_state as $val) { ?>

                        <option <?php if($val->state_name==@$adm_record->state_id) { echo "selected"; } ?> value="<?php echo $val->state_name; ?>"><?php echo $val->state_name; ?></option>

                      <?php } ?>

                  </select>

                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 form-group">

                  <label for="inputCity">City</label>

                  <select class="form-control custom-form-control" name="city_id" id="city_id">

                    <option value="">Select City</option>

                      <?php foreach($list_city as $val) { ?>

                        <option <?php if($val->city_name==@$adm_record->city_id) { echo "selected"; } ?> value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>

                      <?php } ?>  

                  </select>

                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 form-group">

                  <label for="inputArea">Area</label>

                  <select class="form-control custom-form-control" name="area_id" id="area_id">

                    <option value="">Select Area</option>

                      <?php foreach($list_area as $ld) { ?>

                        <option <?php if($ld->area_id==@$adm_record->area_id) { echo "selected"; } ?> value="<?php echo $ld->area_id; ?>"><?php echo $ld->area_name; ?></option>

                      <?php } ?>  

                  </select>

                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 form-group">

                  <label>Pin Code</label>

                  <input type="text" name="pin_code" id="pin_code" value="<?php echo @$adm_record->pin_code; ?>" placeholder="Pin Code" class="form-control custom-form-control"/>

                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">

                  <label for="inputPreAddress">Present Address</label>

                  <textarea class="form-control" name="present_address" id="present_address"  placeholder="Present Address..." style="height: 48px !important;"><?php echo @$adm_record->present_address; ?></textarea>

                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">

                  <label for="inputPerAdd">Permanent Address</label>

                  <textarea class="form-control" name="permanent_address" id="permanent_address" placeholder="Permanent Address..." style="height: 48px !important;"><?php echo @$adm_record->permanent_address; ?></textarea>

                </div>

              </div>

            </div>

        </div>

      </div>

      <div class="row">

        <div class="col-xl-12">

          <div class="simple_border_box_design">

            <span class="addmision_process_top_title">Parents Details</span>

            <div class="form-row" style="margin-top: -18px;">

              <div class="col-xl-12 mb-2">

                <h5>Guardian 1 Details</h5>

              </div>

              <div class="form-group col-xl-3 col-lg-3 col-md-6 col-sm-6">

                <label for="inputName">Name</label>

                <input type="text" name="father_name" id="father_name" value="<?php echo @$adm_record->father_name; ?>"  class="form-control custom-form-control" placeholder="Father Name" />

              </div>

              <div class="form-group col-xl-3 col-lg-3 col-md-6 col-sm-6">

                <label for="inputEmail">Email</label>

                <input type="email" name="father_email"  value="<?php echo @$adm_record->father_email; ?>" id="email_father" placeholder="Email Id" class="form-control custom-form-control" />

              </div>     

              <div class="form-group col-xl-3 col-lg-3 col-md-6 col-sm-6">

                <label for="inputEmail">Father Mobile No</label>

                <input type="text" name="father_mobile_no" id="father_mobile_no" value="<?php echo @$adm_record->father_mobile_no; ?>" id="father_mobile_no" placeholder="Phone Number" class="form-control custom-form-control" />

              </div>     

              <div class="form-group col-xl-3 col-lg-3 col-md-6 col-sm-6">

                <label for="inputEmail">Occupation</label>

                <input type="text" name="father_occupation" id="father_occupation" value="<?php echo @$adm_record->father_occupation; ?>" placeholder="Occupation" class="form-control custom-form-control" />

              </div>



              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">

                  <div class="form-group">

                      <label>Income:</label>

                      <input type="text" name="father_income" id="father_income" value="<?php echo @$adm_record->father_income; ?>" placeholder="Father Income" class="form-control custom-form-control" />

                  </div>

              </div>

              <div class="col-xl-12 mb-2">

                <h5>Guardian 2 Details</h5>

              </div>

              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">

                  <div class="form-group">

                      <label>Name:</label>

                      <input type="text" name="mother_name" id="mother_name" value="<?php echo @$adm_record->mother_name; ?>"  class="form-control custom-form-control" placeholder="First Name" />

                  </div>

              </div>



              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">

                  <div class="form-group">

                      <label>Email:</label>

                      <input type="email" name="mother_email" id="mother_email" value="<?php echo @$adm_record->mother_email; ?>" placeholder="Email Id" class="form-control custom-form-control" />

                  </div>

              </div>

              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">

                  <div class="form-group">

                      <label>Mother Mobile No:</label>

                      <input type="text" name="mother_mobile_no" id="mother_mobile_no" value="<?php echo @$adm_record->mother_mobile_no; ?>" placeholder="Phone Number" class="form-control custom-form-control" />

                  </div>

              </div>

              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">

                <div class="form-group">

                  <label>Occupation:</label>

                  <input type="text" name="mother_occupation" id="mother_occupation" value="<?php echo @$adm_record->mother_occupation; ?>" placeholder="Mather Occupation" class="form-control custom-form-control">

                </div>

              </div>

              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">

                  <div class="form-group">

                      <label>Income:</label>

                      <input type="text" name="mother_income" id="mother_income" value="<?php echo @$adm_record->mother_income; ?>" placeholder="Mather Income" class="form-control custom-form-control" />

                  </div>

              </div>

              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">

                  <div class="form-group">

                    <label>Send Email</label>

                      <ul>

                          <li class="d-inline-block mr-3 mr-mr-0">

                              <div class="form-check form-check-inline">

                                 <input type="radio"   name="admission_msg_email" id="admission_msg_email" value="Yes" <?php if(@$adm_record->admission_msg_email=="Yes") { echo "checked"; } ?> placeholder="content">Yes

                 

                              </div>

                              <div class="form-check form-check-inline">

                                 <input type="radio"  name="admission_msg_email" id="admission_msg_email" value="No" <?php if(@$adm_record->admission_msg_email=="No") { echo "checked"; } ?> placeholder="content">No

                              </div>

                          </li>

                      </ul>

                  </div>

              </div>

              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">

                  <div class="form-group">

                    <label>Send SMS</label>

                      <ul>

                          <li class="d-inline-block mr-3 mr-mr-0">

                              <div class="form-check form-check-inline">

                                 <input type="radio"  name="admission_msg_mobile" id="admission_msg_mobile" value="Yes" <?php if(@$adm_record->admission_msg_mobile=="Yes") { echo "checked"; } ?> placeholder="content">Yes

                 

                              </div>

                              <div class="form-check form-check-inline">

                                 <input type="radio"  name="admission_msg_mobile" id="admission_msg_mobile" value="No" <?php if(@$adm_record->admission_msg_mobile=="No") { echo "checked"; } ?> placeholder="content">No

                              </div>

                          </li>

                      </ul>

                  </div>

              </div>

              

            </div>

          </div>

        </div>

      </div>

      <div class="row">

        <div class="col-xl-12">

          <div class="simple_border_box_design">

            <span class="addmision_process_top_title">Education & Proffasion</span>

            <div class="form-row" style="margin-top: -18px;">

              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">

                  <div class="form-group">

                    <label>College / school Name</label>

                    <input type="text" name="school_collage_name" id="school_collage_name" value="<?php echo @$adm_record->school_collage_name; ?>" placeholder="College / Scholl Name" class="form-control custom-form-control" />

                  </div>

              </div>

              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">

                  <div class="form-group">

                      <label>Country:</label>

                      <select class="form-control custom-form-control" name="country_id" id="country_id">

                     <option value="">Select Country</option>

                            <?php foreach($list_country as $val) { ?>

                              <option <?php if($val->country_name==@$adm_record->country_id) { echo "selected"; } ?>

                               value="<?php echo $val->country_name; ?>"><?php echo $val->country_name; ?></option>

                            <?php } ?>  

                  </select>

                  </div>

              </div>

              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">

                  <div class="form-group">

                       <label>State:</label>

                      <select class="form-control custom-form-control" name="school_clg_state" id="school_clg_state">

                     <option value="">Select State</option>

                            <?php foreach($list_state as $val) { ?>

                              <option <?php if($val->state_name==@$adm_record->school_clg_state) { echo "selected"; } ?>

                               value="<?php echo $val->state_name; ?>"><?php echo $val->state_name; ?></option>

                            <?php } ?>  

                  </select>

                  </div>

              </div>

              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">

                  <div class="form-group">

                      <label>City:</label>

                       <select class="form-control custom-form-control" name="school_clg_city" id="school_clg_city">

                     <option value="">Select City</option>

                  <?php foreach($list_city as $val) { ?>

                        <option <?php if($val->city_name==@$adm_record->school_clg_city) { echo "selected"; } ?>

                         value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>

                        <?php }  ?>

                  </select>

                  </div>

              </div>

              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">

                  <div class="form-group">

                      <label>Area:</label>

                      <select class="form-control custom-form-control" name="school_clg_area" id="school_clg_area">

                     <option value="">Select Area</option>

                            <?php foreach($list_area as $ld) { ?>

                              <option <?php if($ld->area_id==@$adm_record->school_clg_area) { echo "selected"; } ?>

                              value="<?php echo $ld->area_id; ?>"><?php echo $ld->area_name; ?></option>

                            <?php } ?>  

                  </select>

                  </div>

              </div>

              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">

                  <div class="form-group">

                      <label>Type</label>

                      <ul>

                          <li class="d-inline-block mr-3 mr-mr-0">

                              <div class="form-check form-check-inline">

                                  <input type="radio"  name="school_collage_type" id="school_collage_type"  value="school" <?php if(@$adm_record->school_collage_type=="school") { echo "checked"; } ?>  placeholder="content">School

                              </div>

                              <div class="form-check form-check-inline">

                                  

                                  <input type="radio"  name="school_collage_type" id="school_collage_type" value="college" <?php if(@$adm_record->school_collage_type=="college") { echo "checked"; } ?> placeholder="content">College

                              </div>

                          </li> 

                      </ul>

                  </div>

              </div>

              <!-- <div class="col-xl-12">

                <div class="form-group">

                  <button type="submit" value="submit" name="submit" class="btn btn-primary">Update</button>

                </div>

              </div>  -->

              

            </div>

          </div>

        </div>

      </div>

      <button type="submit" id="adm_upd_data" class="btn btn-primary">Update</button>

				</form>		

<script src="<?php echo base_url(); ?>dist/js/select2.full.min.js"></script>

    <script src="<?php echo base_url(); ?>dist/js/select2.min.js"></script>



   <script>

        //***********************************//

        // For select 2

        //***********************************//

        $(".select2").select2();



        /*colorpicker*/

        $('.demo').each(function() {

        //

        // Dear reader, it's actually very easy to initialize MiniColors. For example:

        //

        //  $(selector).minicolors();

        //

        // The way I've done it below is just for the demo, so don't get confused

        // by it. Also, data- attributes aren't supported at this time...they're

        // only used for this demo.

        //

        $(this).minicolors({

                control: $(this).attr('data-control') || 'hue',

                position: $(this).attr('data-position') || 'bottom left',



                change: function(value, opacity) {

                    if (!value) return;

                    if (opacity) value += ', ' + opacity;

                    if (typeof console === 'object') {

                        console.log(value);

                    }

                },

                theme: 'bootstrap'

            });



        });

        



    </script>



 



    <script type="text/javascript">

    	$('.select_course_single').hide();

  function show_hide_package_course()

{

  var course_package = $("input[name='type']:checked").val();

 // alert(course_package);

  if(course_package == 'single'){

    $('.select_course_single').show();

    $('.select_course_package').hide(); 

  }else{



    $('.select_course_single').hide();

    $('.select_course_package').show();

  }

  

}

</script>





<script type="text/javascript">

      $('#adm_upd_data').on('click',function(){

            var adm_update_id = $('#adm_update_id').val();

            var state_id = $('#state_id').val();

            var city_id = $('#city_id').val();	

            var area_id= $('#area_id').val();

            var pin_code = $('#pin_code').val();

            var present_address = $('#present_address').val();

            var permanent_address = $('#permanent_address').val();

            var father_name = $('#father_name').val();

            var email_father = $('#email_father').val();

            var father_mobile_no = $('#father_mobile_no').val();

            var father_occupation = $('#father_occupation').val();

            var father_income = $('#father_income').val();

            var mother_name = $('#mother_name').val();

            var mother_email = $('#mother_email').val();

            var mother_mobile_no = $('#mother_mobile_no').val();

            var mother_occupation = $('#mother_occupation').val();

            var mother_income = $('#mother_income').val();

            var admission_msg_email = $('#admission_msg_email').val();

            var admission_msg_mobile = $('#admission_msg_mobile').val();

            var school_collage_name = $('#school_collage_name').val();

            var country_id = $('#country_id').val();

            var school_clg_state = $('#school_clg_state').val();

            var school_clg_city = $('#school_clg_city').val();

            var school_clg_area = $('#school_clg_area').val();

            var school_collage_type = $('#school_collage_type').val();

            

            $.ajax({

                type : "POST",

                url  : "<?php echo base_url()?>AddmissionController/upd_adm_details",

                dataType : "JSON",

                data : {'adm_update_id' : adm_update_id ,  'state_id' : state_id , 'city_id' : city_id , 'area_id' : area_id , 'pin_code' : pin_code ,  'present_address' : present_address , 'permanent_address' : permanent_address , 'father_name' : father_name , 'father_email' : email_father , 'father_mobile_no' : father_mobile_no , 'father_occupation' : father_occupation , 'father_income' : father_income , 'mother_name' : mother_name , 'mother_email' : mother_email , 'mother_mobile_no' : mother_mobile_no , 'mother_occupation' : mother_occupation , 'mother_income' : mother_income , 'admission_msg_email' : admission_msg_email , 'admission_msg_mobile' : admission_msg_mobile , 'school_collage_name' : school_collage_name , 'country_id' : country_id , 'school_clg_state' : school_clg_state , 'school_clg_city' : school_clg_city , 'school_clg_area' : school_clg_area , 'school_collage_type' : school_collage_type },

                success: function(data){


                  alert('Are You Sure This Details Updated');

                }

            });

            return false;

        });

    </script>

