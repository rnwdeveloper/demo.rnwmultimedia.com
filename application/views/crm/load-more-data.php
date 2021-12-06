<?php 
                  if(!empty($lead_list_all)){
                  foreach($lead_list_all as $lla) { ?>
                    <div class="extra_lead_show crm-list-view">  
         <div class="card card-primary">
            <div class="card-body">
               <div class="row"> 
                  <div class="col-md-11">
                     <div class="lead_left">
                        <div class="row">
                           <div class="adm_item">
                              <span>Prospect Name</span>
                              <p id="company_name_copy_paste_mobile_3" class="open_rightsidebar"
                              onclick="return update_lead_record(<?php echo $lla->lead_list_id; ?>);">
                                 <?php echo $lla->name; ?>  
                                 </p>
                                 <i class="far fa-copy ml-1 copy-data" onclick="return get_copy_paste_mobile(3)" id="copy_paste_record_mobile_3"></i>
                                 <!-- <i class="fa fa-copy" onclick="copytextF()"></i> -->
                           </div>
                           <div class="adm_item">
                              <span>Email</span>
                              <p id="company_name_copy_paste_mobile_1" class="open_rightsidebar"
                                 onclick="return show_email_template(<?php echo $lla->lead_list_id; ?>);">
                                 <?php echo $lla->email; ?>  
                              </p>
                              <i class="far fa-copy ml-1 copy-data" onclick="return get_copy_paste_mobile(1)" id="copy_paste_record_mobile_1"></i>
                              <!-- <i class="fa fa-copy" onclick="copytextF()"></i> -->
                           </div>
                           <div class="adm_item">
                              <span>Mobile</span>
                              <p id="company_name_copy_paste_mobile_2" class="open_rightsidebar"
                                 onclick="return get_sms_template_record(<?php echo $lla->lead_list_id; ?>)">
                                 <?php echo $lla->mobile_no; ?>  
                              </p>
                              <i class="far fa-copy ml-1 copy-data" onclick="return get_copy_paste_mobile(2)" id="copy_paste_record_mobile_2"></i>
                              <!-- <i class="fa fa-copy" onclick="copytextF()"></i> -->
                           </div>
                           <div class="adm_item list_statusI">
                              <span>Status</span>
                              <p class="open_rightsidebar"
                              onclick="return add_followup_lead_list(<?php echo $lla->lead_list_id;  ?>)">
                                    <?php echo $lla->status; ?>
                              </p>
                           </div>
                           <!-- <div class="adm_item">
                              <span>Campaign Name</span>
                              <p><?php echo $lla->campaign_name; ?></p>
                           </div>  -->
                           
                           <div class="adm_item">
                              <span>Source</span>
                              <p id="enrollment_ids0">
                              <?php foreach ($source_list as $sl) {
                                             if ($sl->source_name == $lla->source_id) {
                                                echo $sl->source_name;
                                             }
                                          } ?>
                              </p>
                           </div>
                           <div class="adm_item list_inquiry">
                           <div class="lead-list-inquiry">
                              <ul>
                                 <li><a href="#" onclick="return get_followup_response(7579)"><i class="far fa-user"></i><span class="notifiecount">2</span></a></li>
                                 <li><a href="#"><i class="fas fa-mobile-alt"></i> <span class="notifiecount">0</span></a></li>
                                 <li><a href="#"><i class="fas fa-user-clock"></i> <span class="notifiecount">104</span></a></li>
                              </ul>
                              </div>
                                       </div>
                           <div class="adm_item">
                              <span>Channel</span>
                              <span id="b_id0">
                                 <p>
                                 <?php echo $lla->channel_id; ?>
                                 </p>
                              </span>
                           </div>
                           <div class="adm_item">
                              <span>Sub-Status</span>
                              <p id="d_id0">
                              <?php echo $lla->sub_status; ?>                                        
                              </p>
                           </div>
                           <div class="adm_item">
                              <span>Priority</span>
                              <span id="c_id0">
                                 <p style="font-size:12px;">
                                    <?php echo $lla->priority; ?>                                                                               
                                 </p>
                              </span>
                           </div>
                           <div class="adm_item">
                              <span>Branch</span>
                              <p id="year_id0">
                              <?php foreach ($list_branch as $lb) {
                                             if($lb->branch_id == $lla->branch_id) {
                                                echo $lb->branch_name;
                                             }
                                          } ?>
                              </p>
                           </div>
                           <div class="adm_item">
                              <span>Department</span>
                              <span id="tf_id0">
                                 <p>
                                    <?php foreach ($list_department as $ld) { ?>
                                             <?php if ($lla->department == $ld->department_id) {
                                                echo $ld->department_name;
                                             } ?>
                                          <?php } ?>
                                 </p>
                              </span>
                           </div>
                           <div class="adm_item">
                              <span>Course</span>
                              <p id="rf_id0">
                              <?php echo $lla->course_package; ?>-
                                          <?php if ($lla->course_package == 'single') {
                                             foreach ($course_all as $ca) {
                                                if ($ca->course_id == $lla->course_or_package) {
                                                   echo $ca->course_name;
                                                }
                                             }
                                          } else if ($lla->course_package == 'package') {
                                             foreach ($list_package as $lp) {
                                                if ($lp->package_id == $lla->course_or_package) {
                                                   echo $lp->package_name;
                                                }
                                             }
                                          }
                                 ?>                                      
                              </p>
                           </div>
                           <div class="adm_item">
                              <span>Lead Creation Date</span>
                              <p>
                              <?php $date = $lla->lead_creation_date;
                              echo date('M', strtotime($date)) . "  " . date('d', strtotime($date)) . ",  " . date('Y', strtotime($date)) . " " . date('H:i A', strtotime($date)); ?>
                              </p>
                           </div>
                           <div class="adm_item">
                              <span>Lead Modification Date</span>
                              <p id="date_id0">
                              <?php $date = $lla->lead_modification_date;
                                          echo date('M', strtotime($date)) . "  " . date('d', strtotime($date)) . ",  " . date('Y', strtotime($date)) . " " . date('H:i A', strtotime($date)); ?>                                   
                              </p>
                           </div>
                           <div class="adm_item">
                              <span>Next Action Date</span>
                              <span id="admi_remarks_id0">
                                 <p class="open_rightsidebar"
                                    onclick="return add_followup_lead_list(<?php echo $lla->lead_list_id;?>);">
                                    <?php if (!empty($lla->next_followup_date)) {
                                                $next_act =  $lla->next_followup_date;

                                                echo date('M', strtotime($next_act)) . "  " . date('d', strtotime($next_act)) . ",  " . date('Y', strtotime($next_act)) . " " . date('H:i A', strtotime($next_act));
                                             } ?>
                                     <i class="fa fa-eye"></i>
                                 </p>
                              </span>
                           </div>
                           <div class="adm_item">
                              <span>Remarks</span>
                              <span id="admi_remarks_id0">
                                 <p class="open_rightsidebar"
                                    onclick="return update_lead_record(<?php echo $lla->lead_list_id;?>);">
                                    <?php echo substr($lla->any_remarks, 0, 25) . "..."; ?>
                                     <i class="fa fa-eye"></i>
                                 </p>
                              </span>
                           </div> 
                           <div class="adm_item">
                           <?php $username =  $_SESSION['Admin']['username']; ?>
                              <span>Referred To</span>
                              <span id="admi_remarks_id0">
                                 <p>
                                    <?php echo $lla->referred_to; ?>
                                 </p>
                              </span>
                           </div>
                           <div class="adm_item">
                              <span>Followup Comment</span>
                              <span id="admi_remarks_id0">
                                 <p>
                                    <?php if (!empty($lla->followup_remark)) {
                                             echo $lla->followup_remark;
                                          } ?>
                                 </p>
                              </span>
                           </div>
                           <div class="adm_item">
                              <span>Last Re-enquired</span>
                              <span id="admi_remarks_id0">
                                 <p>
                                    Add Remark
                                 </p>
                              </span>
                           </div>
                           <div class="adm_item">
                              <span>Referred From</span>
                              <span id="admi_remarks_id0">
                                 <p>
                                    <?php echo $lla->reference_name; ?>
                                 </p>
                              </span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-1">
                     <div class="lead_right">
                        <div class="dropleft text-center">
                           <span>Action</span>
                           <p class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false"><i class="fas fa-ellipsis-h"></i></p>
                           <div class="dropdown-menu dropleft">
                           <span id="ac_id0">
                              <a class="dropdown-item open_rightsidebar" href="#"
                              onclick="return add_followup_lead_list(<?php echo $lla->lead_list_id;  ?>)">
                              <i class="fas fa-notes-medical mr-2"> </i>Add Followup</a>
                              </span>
                              <span id="at_id0">
                              <a class="dropdown-item open_rightsidebar" href="#"
                              onclick="return update_lead_record(<?php echo $lla->lead_list_id; ?>);">
                              <i class="fas fa-edit mr-2"></i>Edit Lead</a>
                              </span>
                              <span id="historyid0">
                              <a class="dropdown-item open_rightsidebar" href="#" onclick="return view_lead_histroy(<?php echo $lla->lead_list_id; ?>)"><i class="fas fa-history mr-2"> </i>View
                              History</a>
                              </span>
                              <a class="dropdown-item" href="#"><i class="fas fa-share-square mr-2"> </i>Refer Leads</a>
                              <a class="dropdown-item" href="#"><i class="fas fa-trash mr-2"> </i>Delete</a>
                           </div>
                        </div>
                        <div class="icon-set text-center">
                           <a href="https://api.whatsapp.com/send?phone=91<?php echo $lla->mobile_no; ?>" target="_blank"><i class="fab fa-whatsapp"></i></a> 
                           <a href="tel:91<?php echo $lla->mobile_no; ?>"><i class="material-icons">phone</i></a>
                        </div>
                        <!-- <div class="lead-list-inquiry">
                           <ul>
                              <li><a href="#" onclick="return get_followup_response(7579)"><i class="far fa-user"></i><span class="notifiecount">2</span></a></li>
                              <li><a href="#"><i class="fas fa-mobile-alt"></i> <span class="notifiecount">0</span></a></li>
                              <li><a href="#"><i class="fas fa-user-clock"></i> <span class="notifiecount">104</span></a></li>
                           </ul>
                        </div> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
                     <?php    $lastId = $lla->lead_list_id; ?>
                     <?php } ?>
                     <div class="load-more" lastID="<?php echo $lastId; ?>" style="display: none;">
                        <img src="<?php echo base_url('assets/images/loading.gif'); ?>"/> Loading more posts...
                     </div>
                     <?php } else { ?>
                     <p>No Record Found</p>
                     <?php } ?>


                   <script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/cleave.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
 <!-- Page Specific JS File -->
 <script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script>
 <!-- Page Specific JS File -->
 <script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>
 <script src="https://www.jqueryscript.net/demo/wysiwyg-editor-bootstrap/src/js/wysiwyg.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
 <!-- General JS Scripts -->

 <!-- JS Libraies -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
 <script src="https://unpkg.com/lightpick@latest/lightpick.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
 <!-- Page Specific JS File -->

 <script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
 <!-- <script src="http://www.radixtouch.in/templates/admin/otika/source/light/assets/bundles/ckeditor/ckeditor.js"></script>
  Page Specific JS File -->
  <!-- <script src="http://www.radixtouch.in/templates/admin/otika/source/light/assets/js/page/ckeditor.js"></script> -->  
 <!-- JS Libraies -->
 <script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
 <!-- Custom JS File -->
 <script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
 <script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
 <!-- Page Specific JS File -->
 <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
 <script>

                     	<script>



						function add_followup_lead_list(lead_list_id)

{	



	$('.fill_new_leade_info_body').show();

	$('.email_template_view').hide();

	$('#history_lead').hide();

	$('.right_side_row_panel').show();

	$('#first_first_right_side').hide();

	$('#first_second_right_side').hide();

	$('#first_third_right_side').show();

	$('#lead_third_fill_title').hide();

	$('#third_followup_mode').hide();



	$('#first_forth_right_side').hide();

	$('#first_fifth_right_side').hide();

	$('#second_right_side').hide();

	$('#third_right_side').hide();

	$('.lead_save_btn').show();

	$('#change_lead_status').html('Edit Followup For');

	$('#edit_lead').val('Update Followup');

	$('#edit_lead').show();

	$('#add_lead').hide();

	$('.plus_button').hide();

	$("aside").addClass('right_show');

	$('.main_content').addClass('right_show');

	$('.right_side').addClass('right_show');





	$.ajax({

			url: "<?php echo base_url(); ?>LeadlistController/get_lead_record",

			type : "post",

			data :{

				'lead_list_id' : lead_list_id

			},

			success:function(res)

			{

				// $('#select_course_package').show();

				// $('.view_hide_side_bar').show();

				// $('.right_side_row_panel').show();

				// $('.lead_save_btn').show();

				// $('#history_lead').hide();

				// $('#edit_lead').show();

				// $('#add_lead').hide();

				// $("aside").addClass('right_show');

				// $('.main_content').addClass('right_show');

				// $('.right_side').addClass('right_show');

				// console.log("test");

				// $('#update_lead_record_click_name').html(res);

				// $('.plus_button').removeClass('create_new_lead');

				var data = $.parseJSON(res);

				// $('#change_lead_status').html("Edit Lead");

				// console.log(data.record['lead_get_record'].lead_list_id);

				$('#lead_list_id').val(data.record['lead_get_record'].lead_list_id);

				$('#name').val(data.record['lead_get_record'].name);

				$('#surname').val(data.record['lead_get_record'].surname);

				var gender = data.record['lead_get_record'].gender;

				if(gender == 'male'){

					$("#gender_male").prop("checked", true);

				}

				else if(gender=='female'){

					$("#gender_female").prop("checked", true);

				}

				else{

					$("#gender_other").prop("checked", true);



				}



				$('#add_lead_name_fast').html(data.record['lead_get_record'].name);

				$('#email').val(data.record['lead_get_record'].email);

				$('#mobile_no').val(data.record['lead_get_record'].mobile_no);

				$('#leadName').val(data.record['lead_get_record'].campaign_name);

				$('#source_id').val(data.record['lead_get_record'].source_id);

				var channel_id_record =  data.record['lead_get_record'].channel_id;

				if(channel_id_record == 'Telephonic Quick Add')

				{

					if(i==0)

					{

						$('#channel_id').append(new Option(channel_id_record, channel_id_record));

					}

					$('#channel_id').val(data.record['lead_get_record'].channel_id);

				}

				else

				{

					$('#channel_id').val(data.record['lead_get_record'].channel_id);

				}



				$('#priority').val(data.record['lead_get_record'].priority);

				$('#reference_name').val(data.record['lead_get_record'].reference_name);

				$('#referred_to').val(data.record['lead_get_record'].referred_to);

				

				

				$('#status').val(data.record['lead_get_record'].status);

				var sub_status_lead = data.record['lead_get_record'].sub_status;

				if(sub_status_lead == 'Not Known')

				{

					if(i==0){

						$('#sub_status').append(new Option(sub_status_lead, sub_status_lead));

						$('#sub_status').val(data.record['lead_get_record'].sub_status);

					}

				}

				else{

					$('#sub_status').val(data.record['lead_get_record'].sub_status);

				}

				

				$('#followup_mode').val(data.record['lead_get_record'].followup_mode);

				var next_follow = data.record['lead_get_record'].next_followup_date;

				if(next_follow != '')

				{

					// alert(next_follow);

				 var next_f = next_follow.split(" ");

				

				 $("#next_followup_date").val(next_f[0]);

				// $('#next_followup_date').val(dat1);



				 $('#next_followup_time').val(next_f[1]);

				 $('#followup_remark').val(data.record['lead_get_record'].followup_remark);

				}

				else

				{

					// alert("nathi");

					$('#next_followup_time').val('');

					$('#next_followup_date').val('');

					$('#followup_remark').val('');

				}

				

				$('#any_remarks').val(data.record['lead_get_record'].any_remarks);

				var area_lead = data.record['lead_get_record'].area;

				// alert(area_lead);

				if(area_lead == 'Not Known')

				{

					// if(i==0){

						$('#area').append(new Option(area_lead, area_lead));

					

					$('#area').val(data.record['lead_get_record'].area);

				}

				else

				{

					$('#area').val(data.record['lead_get_record'].area);

				}

				$('#branch_id').val(data.record['lead_get_record'].branch_id);

				$('#department').val(data.record['lead_get_record'].department);



				var pack_sin =  data.record['lead_get_record'].course_package;

				

				if(pack_sin == 'package')

				{

					$("#course_package"). prop("checked", true);

					// get_course_package('package');

					$('.select_course_package').show();

					$('.select_course_single').hide();

					$('#course_orpackage').val(data.record['lead_get_record'].course_or_package);

					

				}

				else

				{

					$("#course_single"). prop("checked", true);	

					// get_course_package('single');

					$('.select_course_package').hide();

					$('.select_course_single').show();

					$('#course_orsingle').val(data.record['lead_get_record'].course_or_package);

				

				}



				i++;



				

			}

		});



}



function show_email_template(lead_id){
      $('.edit-details').hide();
      $('.first-section').hide();
      $('.second-section').hide();
      $('.third-section').hide();
      $('.forth-section').hide();
      $('.fifth-section').hide();
      $('.candidate-details').hide();
      $('.education-detail').hide();
      $('.send-email-details').show();
      $('.send-sms-details').hide();
      $('#status_change').html('Send Email to');
      $('.crm-history').hide();
   
      $.ajax({
         url: "<?php echo base_url(); ?>LeadlistController/get_lead_record",
            type : "post",
            data :{
               'lead_list_id' : lead_id
            },
            success:function(res)
            {
               var data = $.parseJSON(res);
               // console.log(res);
               // console.log(data.record['lead_get_record'].name);
               $('#add_lead_name_fast').html(data.record['lead_get_record'].name);
               var email =  data.record['lead_get_record'].email;
               $('#primary_email').val(data.record['lead_get_record'].email);
               $('#email_recepient_id').val(data.record['lead_get_record'].lead_list_id);
            }
      });
      // $('.email_send_side_bar').show();
   }

   function send_email_data()
   {
      var email_subject = $('#email_subject').val();
      tinyMCE.activeEditor.getContent();
      tinyMCE.activeEditor.getContent({format : 'html'});
      var email_compose_textarea = tinyMCE.get('email_compose_Textarea').getContent()
      var email = $('#primary_email').val();
      var email_recepient_id = $('#email_recepient_id').val();
   
      if(email_subject == '')
      {
            $('.email_subject_error').html("<p style='color:red;'>Email subject is mandatory</p>");
            var email_s =1;
      }
      else
      {
         email_s = 0;
         $('.email_subject_error').html("");
      }
      if(email_compose_textarea == '')
      {
         $('.email_compose_Textarea_error').html("<p style='color:red'>Email Message is mandatory</p>");
         var compose_s =1;
      }
      else
      {
         $('.email_compose_Textarea_error').html("");
            var compose_s =0;
      }
      if(email_s == 1 || compose_s == 1){
         return false;
      }
      else
      {
         $.ajax({
               url: "<?php echo base_url(); ?>LeadlistController/send_email",
               type: "post",
               data:{
                  'email' :email,
                  'subject' : email_subject,
                  'message' : email_compose_textarea,
                  'recepient_id' : email_recepient_id
               },
               beforeSend: function(){
                  $('.fa-spinner').show();
               },
               complete: function(){
                      $('.fa-spinner').hide();
               },
               success:function(Res)
               {
                  // alert(Res)
                  $('#side_lead_response').fadeIn();
                  $.ajax({
                     url   : "<?php echo base_url(); ?>LeadlistController/index",
                     type  : "POST",
                     data  : { 'test' : 'test' },
                     success : function(data)
                     {
                        $('.full_lead_block').html(data);
                     }
                  });
   
                  if(Res == ' sent')
                  {
                     $('#side_lead_response').html("<div class='alert alert-success'>Email Send Successfully</div>");
                  }
                  else
                  {
                     $('#side_lead_response').html("Something Wrong");
   
                  }
                  $('#side_lead_response').fadeOut(4000);
               }
         });
      }
   }

   function get_email_template()
   {
      var id =  $('#email_template').val();
   
      $.ajax({
         url : "<?php echo base_url(); ?>LeadlistController/get_email_template_record",
         type : "post",
         data:{
            'template_id' : id
         },
         beforeSend: function(){
                // tinymce.remove('#email_compose_Textarea');
         },
         success:function(res){
               var data = $.parseJSON(res);
               $('#email_subject').val(data.reco['record'].category);
               $('#send_email_template_button').prop('disabled', false);
               // $('#email_compose_Textarea').val("123");
               var content_data =  data.reco['record'].html_template;
               var title_data = $('textarea[name=email_compose_Textarea]').html(content_data).text();
               //tinyMCE.addClass('email_compose_Textarea').setContent(title_data);
              // tinymce.get('email_compose_Textarea').setContent(title_data);
         }
      });
   }

   function get_sms_template_record(lead_id)
   {
     ; $('.edit-details').hide();
      $('.first-section').hide();
      $('.second-section').hide();
      $('.third-section').hide();
      $('.forth-section').hide();
      $('.fifth-section').hide();
      $('.candidate-details').hide();
      $('.education-detail').hide();
      $('.send-email-details').hide();
      $('.send-sms-details').show()
      $('#status_change').html('Send SMS to');
      $('.crm-history').hide();
   
      // alert(lead_id);
      $.ajax({
         url : "<?php echo base_url(); ?>LeadlistController/get_lead_list_sms_record",
         type : "POST",
         data:{
            lead_list_id : lead_id
         },
         success:function(respo){
            // console.log(respo);
            var data = $.parseJSON(respo);
            $('#sms_recepient_id').val(data.record['lead_get_record'].lead_list_id);
            $('#primary_sms').val(data.record['lead_get_record'].mobile_no);  
            $('#add_lead_name').html(data.record['lead_get_record'].name);
         }
      });
   }

   function get_sms_template()
   {
      var sms_template_id =  $('#sms_template').val();
   
      $.ajax({
         url : "<?php echo base_url(); ?>LeadlistController/get_sms_template_record",
         type : "post",
         data:{
            'sms_template_id' : sms_template_id
         },
         success:function(response){
               var data = $.parseJSON(response);
               $('#sms_compose_Textarea').val(data.reco['records'].sms_template);
         }
      });
   }

   function send_sms_data(){
      var primary_sms =  $('#primary_sms').val();
      var sms_recepient_id =  $('#sms_recepient_id').val();
      var sms_template =  $('#sms_template').val();
      var sms_textarea =  $('#sms_compose_Textarea').val();

      if(sms_textarea == '')
      {
            $('.sms_compose_Textarea_error').html("<p style='color:red'>SMS Message is mandatory</p>");
            var sms_text =1;
      }
      else
      {
         $('.sms_compose_Textarea_error').html("");
            var sms_text =0;
      }
   
      if( sms_text == 1){
         return false;
      }
      else 
      {
         $.ajax({
               url: "<?php echo base_url(); ?>LeadlistController/send_sms_record",
               type: "post",
               data:{
                  'primary_sms' :primary_sms,
                  'sms_recepient_id' : sms_recepient_id,
                  'sms_template' : sms_template,
                  'sms_textarea' : sms_textarea
               },
               beforeSend: function(){
                  $('.fa-spinner').show();
               },
               complete: function(){
                      $('.fa-spinner').hide();
               },
               success:function(resp)
               {
                  var data = $.parseJSON(resp);
                  var ddd = data['all_record'].status;
                  if(ddd=='1')
                  {
                     $('#msg').html(iziToast.success({
                           title: 'Success',
                           timeout: 2500,
                           message: 'Send SMS.',
                           position: 'topRight'
                           }));
                  }
                  else if(ddd=="2")
                  {
                     $('#msg').html(iziToast.error({
                        title: 'Canceled!',
                        timeout: 2500,
                        message: 'Someting Wrong!!',
                        position: 'topRight'
                        }));
                  }

                  $.ajax({
                     url   : "<?php echo base_url(); ?>LeadlistController/Crm_list",
                     type  : "POST",
                     data  : { 'test' : 'test' },
                     success : function(data)
                     {
                        $('.extra_lead_menu').html(data);
                     }
                  });
               }
         });   
      }
   }

   function view_lead_histroy(id)
   {
      $('.edit-details').hide();
      $('.first-section').hide();
      $('.second-section').hide();
      $('.third-section').hide();
      $('.forth-section').hide();
      $('.fifth-section').hide();
      $('.candidate-details').hide();
      $('.education-detail').hide();
      $('.send-email-details').hide();
      $('.send-sms-details').hide();
      $('.crm-history').show();
      //$('#status_change').html('Send SMS to');
      
         $.ajax({
            url: "<?php echo base_url(); ?>LeadlistController/crm_lead_history",
            type : "post",
            data :{
               'lead_list_id' : id
            },
            success:function(res)
            {
               $('.history').html(res);
            }
         });
   }



					</script>