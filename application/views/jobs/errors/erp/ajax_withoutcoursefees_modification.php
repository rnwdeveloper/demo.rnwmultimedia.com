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

     padding: 0 1px;

   }



   /*.select2-container--default .select2-selection--multiple {

    line-height: 27px;

}*/

   .select2-container {

     box-sizing: border-box;

     display: block;

     width: 100% !important;

     margin: 0;

     position: relative;

     vertical-align: middle;

     z-index: 9999999999;

   }



   .select2-container--default .select2-selection--multiple .select2-selection__rendered li {

     list-style: none;

   }



   .simple_border_box_design .form-group {

     display: block;

   }



   label {

     font-size: 12px;

     margin-bottom: 5px !important;

   }



   .form-control {

     height: 24px !important;

     font-size: 12px !important;

     padding: 0 0 0 10px;

   }



   select.form-control:not([size]):not([multiple]) {

     height: calc(1.7rem + 2px);

   }



   .form-group {

     margin-bottom: 5px;

   }

   .number{

      border: 0;

    }

 </style>





 <div class="modal-header">

          <h5 class="modal-title"><b>Upgrade Course Without Fees Modification</b></h5>
          <div id="mag_upd_course" class="float-left"></div>
          <!-- <div class="btn-group">

            <button type="button" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#edit_demo_show">Edit admission </button>

            <button type="button" class="btn btn-danger btn-sm" >Discard</button>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

              <span aria-hidden="true">&times;</span>

            </button>

          </div> -->

        </div>

 <div class="modal-body">

   <div class="row">

     <div class="col-xl-12">

       <div class="simple_border_box_design">

         <div class="form-row" style="margin-top: -18px;">

           <span class="addmision_process_top_title">Upgrade Course</span>





           <div class="col-md-12">

             <html>
             <head>
               <title>HTML dynamic table using JavaScript</title>

               <script type="text/javascript" src="app.js"></script>
             </head>
             <body onload="load()">

               <div id="myform">

                 <!-- <b>Simple form with name and age ...</b> -->

                 <table>

                   <tr>

                     <!-- <td>Name:</td>

                      <td><input type="text" id="C"></td> -->

                      <form id="form">

                     <div class="row">

                      <input type="hidden" name="admission_id" id="admission_id" value="<?php echo $adm_record->admission_id;  ?>">

                       <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 form-group">

                         <label>Course Category</label>

                         <ul>

                           <li class="d-inline-block mr-3 mr-mr-0">

                             <div class="form-check form-check-inline">

                               <input class="form-check-input" type="radio" id="course_package" name="type" value="package" <?php if(@$adm_record->type=="package") { echo "checked"; } ?>/ onclick="return show_hide_package_course()">Package

                             </div>

                             <div class="form-check form-check-inline">

                               <input class="form-check-input" type="radio" id="course_single" name="type" value="single" <?php if(@$adm_record->type=="single") { echo "checked"; } ?>/ onclick="return show_hide_package_course()">Single

                             </div>

                           </li>

                         </ul>

                       </div>
                       
                       <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 select_course_package form-group">

                         <label>Select Package*</label>

                         <select class="form-control" name="course_or_package" id="course_orpackage">

                           <option value="">Select Package</option>
                            <?php $packageids = explode(",",$adm_record->package_id);   
                                   foreach($list_package as $row) {  ?> 
                                  <option <?php if(in_array($row->package_id,$packageids)) { echo "selected"; } ?>
                                   value="<?php echo $row->package_id; ?>"><?php echo $row->package_name; ?></option>
                                  <?php } ?>
                         </select>

                       </div>
                 
                       <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 select_course_single form-group">

                         <label>Select Course*</label>

                         <select class="form-control" name="course_or_single" id="course_orsingle">

                           <option value="">Select Course</option>

                           <?php $courseids = explode(",",$adm_record->course_id);   
                                   foreach($list_course as $row) {  ?> 
                                  <option <?php if(in_array($row->course_id,$courseids)) { echo "selected"; } ?>
                                   value="<?php echo $row->course_id; ?>"><?php echo $row->course_name; ?></option>
                                  <?php } ?>
                         </select>

                       </div>

                     </div>

                   </tr>


                 </table>

               </div>
             

             </body>



             </html>

           </div>



         </div>

       </div>

     </div>

   </div>

    
      <div class="col-xl-3 col-lg-2 col-md-6 col-sm-6" style="margin-left: -12px;">

      <div class="form-group">           

        <input name="submit" type="button" id="upgrade_without_fees_modification" value="Submit" class="btn btn-sm btn-success">

      </div>

    </div>

  </form>

 </div>




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

   function show_hide_package_course() {

     var type = $("input[name='type']:checked").val();

     // alert(course_package);

     if(type=='single') 
     {
       $('.select_course_single').show();

       $('.select_course_package').hide();

     }
     else 
     {
       $('.select_course_single').hide();

       $('.select_course_package').show();

     }
   }

 </script>

  <script type="text/javascript">

   $('#upgrade_without_fees_modification').on('click', function() {

     var admission_id = $('#admission_id').val();

     var type = $('#course_package').val();

     var type = $('#course_single').val();

     var course_orpackage = $('#course_orpackage').val();

     var course_orsingle = $('#course_orsingle').val();

     $.ajax({
       type: "POST",
       url: "<?php echo base_url() ?>AddmissionController/without_fees_modification_course",
       data: {
         'admission_id': admission_id,

         'type': type,

         'package_id': course_orpackage,

         'course_id': course_orsingle,

       },

       success: function(resp) {

         var data = $.parseJSON(resp);

            var ddd = data['all_record'].status;

            if(ddd == '1')
            {
                $('#mag_upd_course').fadeIn();

                $('#mag_upd_course').html("<div class='btn btn-sm bg-success ml-4'><b style='color: white;'>Successfully Upgrade Course</b></div>");

                $('#mag_upd_course').fadeOut(4000);
            }
            else
            {
              $('#mag_upd_course').fadeIn();

                $('#mag_upd_course').html("<div class='btn btn-sm bg-danger ml-4'><b style='color: white;'>Someting Wrong!!</b></div>");

                $('#mag_upd_course').fadeOut(4000);
            }

       }

     });

     return false;

   });

 </script>