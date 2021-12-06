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
					<h5 class="modal-title"><b>Upgrade This Admission</b></h5>
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
           <span class="addmision_process_top_title">Upgrade Courses</span>


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
                      
                       <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 select_course_package1 form-group">
                         <label>Department:</label>
                         <select class="form-control" name="department_id" id="department_id">
                           <option value="">Select Department</option>
                           <?php foreach ($list_department as $ld) { ?>
                             <option value="<?php echo $ld->department_id; ?>"><?php echo $ld->department_name; ?></option>
                           <?php } ?>
                         </select>
                       </div>

                       <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 form-group">
                         <label>Course Category</label>
                         <ul>
                           <li class="d-inline-block mr-3 mr-mr-0">
                             <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="course_package" name="type" value="package" onclick="return show_hide_package_course()" />Package
                             </div>
                             <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" id="course_single" name="type" value="single" onclick="return show_hide_package_course()" />Single
                             </div>
                           </li>
                         </ul>
                       </div>
                       <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 select_course_package form-group">
                         <label>Select Package*</label>
                         <select class="form-control" name="course_or_package" id="course_orpackage">
                           <option value="">Select Package</option>
                           <?php foreach ($list_package as $lp) { ?>
                             <option value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>
                           <?php } ?>
                         </select>
                       </div>
                       <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 select_course_single form-group">
                         <label>Select Course*</label>
                         <select class="form-control" name="course_or_single" id="course_orsingle">
                           <option value="">Select Course</option>
                           <?php foreach ($list_course as $lp) { ?>
                             <option value="<?php echo $lp->course_id; ?>"><?php echo $lp->course_name; ?></option>
                           <?php } ?>
                         </select>
                       </div>
                     </div>
                   </tr>
                   <tr style="margin-left: 30px;">
                     <td><input type="button" id="add" value="+" class="btn btn-sm btn-success" onclick="Javascript:addRow()"></td>
                     <!-- <td><button onclick="myFunction()" class="btn btn-sm btn-danger">-</button></td> -->
                   </tr>
                 </table>
               </div>
               <br>
               <div id="mydata">
                 <div class="col-md-12">
                   <table id="myTableData" class="table  table-str iped create_responsive_table">
                     <tr class="sidetblth">
                       <th width="2"><b>Trash</b></th>
                       <th><b>Course Name</b></th>
                     </tr>
                   </table>
                   &nbsp;
                 </div>
               </div>
               <!-- <div id="myDynamicTable">
              <input type="button" id="create" value="Click here" onclick="Javascript:addTable()">
              to create a Table and add some data using JavaScript
              </div> -->
             </body>

             </html>
           </div>
             <div class="form-row">
               <div class="form-group col-md-4">
                 <label for="inputPincode">Tution Fee (₹):*</label>
                 <input type="text" class="form-control" id="sub_total_ids" placeholder="Tution Fee">
               </div>
               <div class="form-group col-md-4">
                  <div class="form-group">
                      <label for="text">Registration Fees (₹):</label>
                      <input type="text" name="registration_fees" id="registration_fees" placeholder="Registration Fees" class="form-control custom-form-control" autofocus="" />
                  </div>
              </div>
               <div class="form-group col-md-4">
                 <label for="inputPincode">Admission Fees (₹):</label>
                 <input type="text" class="form-control"  placeholder="Admission Fees">
               </div>
               <div class="form-group col-md-4">
                 <label for="inputPincode">Examination Fees (₹):</label>
                 <input type="text" class="form-control" placeholder="Examination Fees">
               </div>
               <div class="form-group col-md-4">
                 <label for="inputPincode">EMI Charge (₹):</label>
                 <input type="text" class="form-control"  placeholder="EMI Charge">
               </div>
               <div class="form-group col-md-4">
                 <label for="inputPincode">Sub Total Fees (₹):*</label>
                 <input type="text" class="form-control"  id="sub_total_id"  placeholder="Sub Total Fees">
               </div>
               
              <div class="form-group col-md-2">
                <div class="form-group">
                  <label for="text">No Of Installment:</label>
                  <input type="text" name="no_of_installment" id="no_of_installment" class="form-control custom-form-control">
                </div>
              </div> 
              <div class="form-group col-md-2">
                <div class="form-group" style="margin-top: 31px;">
                  <input type="button" name="make_instllment" value="Make Installment" class="btn btn-primary" onclick="return make_installment_process()" style="border-radius: .25rem;  border: 1px solid #ced4da; margin-top:-6px;">
                </div>
              </div>
             </div>
         </div>
       </div>
     </div>
   </div>
    <div class="row">
    <div class="col-xl-12">       
      <div class="simple_border_box_design">
        <span class="addmision_process_top_title">Fees Installment</span>
        <div class="form-row" style="margin-top: -18px;" id="installment_all_data">
          <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
              <div class="form-group">
              <label for="email"><b>#NO</b></label>
              <?php $no = "1"; ?>
              <input type="text"  value="<?php if(isset($no)){ echo $no; } ?>"  class="form-control custom-form-control number" />     
              </div>
          </div>
          <div class="col-xl-3 col-lg-2 col-md-6 col-sm-6">
              <div class="form-group">
                  <label for="email">Installment Date</label>
              <input type="text" name="" class="form-control custom-form-control" />
              </div>
          </div>
          <div class="col-xl-3 col-lg-2 col-md-6 col-sm-6">
              <div class="form-group">
                  <label> Due Amount</label>
              <input type="text" name=""  class="form-control custom-form-control" />
              </div>
          </div>
          <div class="col-xl-3 col-lg-2 col-md-6 col-sm-6">
              <div class="form-group">
                  <label for="email"> Paid Amount</label>
                  <input type="text" name="" class="form-control custom-form-control" />
              </div>
          </div>
        </div>
      </div>
      </div>
      </div>
      <div class="col-xl-3 col-lg-2 col-md-6 col-sm-6" style="margin-left: -12px;">
      <div class="form-group">           
        <input name="submit" type="button" id="upgrade_data" value="Submit" class="btn btn-sm btn-success">
      </div>
    </div>
  </form>
 </div>

 <script>
   function myFunction() {
     document.getElementById("myTableData").deleteRow(1);
   }
 </script>
 <script>
   let total_fees = [];
   let counter = 0;
   let final_fees = 0;
   let removed_fees;
   $('#myTableData').hide();

   function addRow() {
     $('#myTableData').show();
     var course_orpackage = document.getElementById("course_orpackage");
     var course_orsingle = document.getElementById("course_orsingle");
     // var course_package = document.getElementById("course_package");
     var course_package = $("input[name='type']:checked").val();
     //  alert(course_package);
     var course_single = document.getElementById("course_single");
     var table = document.getElementById("myTableData");

     var rowCount = table.rows.length;
     var row = table.insertRow(rowCount);
     $.ajax({
       url: "<?php echo base_url(); ?>AddmissionController/pass_data_course",
       type: "post",
       data: {
         'course_orpackage': course_orpackage.value,
         'course_single': course_package,
         'course_orsingle': course_orsingle.value
       },
       success: function(Response) {
         var data = $.parseJSON(Response);

         //console.log(data.course_single);
         //$('#course').html(Response);
         //$("input[name='type']:checked").val(<input type="button" class="btn btn-sm btn-danger" value = "Delete" onClick="Javacsript:deleteRow(this)">)
         row.insertCell(0).innerHTML = '<a id="trash_' + counter + '"  data-id="' + counter + '" onClick="deleteRow(this, ' + counter + ')"><i class="fa fa-trash" style="font-size:22px;color:red"></i></a>';
         row.insertCell(1).innerHTML = data.course_name;

         // alert(counter);
         // alert(`ID => ${$(this).data("id")}`);
         var trashID = `#trash_${counter}`;
         //  alert(`ID => ${$(trashID).data().id}`);

         counter++;

         //row.insertCell(2).innerHTML= age.value;
         // row.insertCell(1).innerHTML= data.course_fees;



         $('#package_fees').val(data.package_fees);
         $('#course_fees').val(data.course_fees);

         (data.package_fees != null) ? total_fees.push(parseInt(data.package_fees)): total_fees.push(0);
         (data.course_fees != null) ? total_fees.push(parseInt(data.course_fees)): total_fees.push(0);

         final_fees = total_fees.reduce((a, b) => a + b, 0);

         // alert(`Final fees => ${final_fees}`);

         $('#sub_total_id').val(final_fees);
         $('#sub_total_ids').val(final_fees);

       }
     });


   }



   function deleteRow(obj, trash_id) {

     // var trashID = `#trash_${counter}`;
     // var deleted_id = $(trashID).data().id - 1;
     // alert(`ID => ${deleted_id}`);

     // TODO: fix this
    //  var theID = $(this).data("id");
    //  $("a[data-id='" + theID + "']").remove();

     var index = obj.parentNode.parentNode.rowIndex;
     var table = document.getElementById("myTableData");
     table.deleteRow(index);

     //alert(`trash_id => ${trash_id}`);

     total_fees = total_fees.filter(e => e !== 0);

     //alert(`TOTAL FEES => ${total_fees}`);



     total_fees = total_fees.filter((item) => {

       if (item === total_fees[trash_id]) {
         //alert(`REMOVED ITEM => ${total_fees[trash_id]}`);
         removed_fees = total_fees[trash_id];
       }
       return item !== total_fees[trash_id];

     });

     //alert(removed_fees);

     final_fees = final_fees - removed_fees;

    // alert(`FINAL FEES => ${final_fees}`);

      $('#sub_total_id').val(final_fees);
      $('#sub_total_ids').val(final_fees);

   }

   // function addTable() {

   //     var myTableDiv = document.getElementById("myDynamicTable");

   //     var table = document.createElement('TABLE');
   //     table.border='1';

   //     var tableBody = document.createElement('TBODY');
   //     table.appendChild(tableBody);

   //     for (var i=0; i<3; i++){
   //        var tr = document.createElement('TR');
   //        tableBody.appendChild(tr);

   //        for (var j=0; j<4; j++){
   //            var td = document.createElement('TD');
   //            td.width='75';
   //            td.appendChild(document.createTextNode("Cell " + i + "," + j));
   //            tr.appendChild(td);
   //        }
   //     }
   //     myTableDiv.appendChild(table);

   // }

   function load() {

     console.log("Page load finished");

   }

   function make_installment_process(){
  var packageId = $('#course_orpackage').val();
  var tution_fee =  $('#sub_total_id').val();
  var registration_fees =  $('#registration_fees').val();
  var noOfInstallment =  $('#no_of_installment').val();
  if(tution_fee == '' || registration_fees == ''){
    alert('please Enter Tution fees and Registration Fees');
    return false;
  }
  else{
    $.ajax({
    url : "<?php echo base_url(); ?>AddmissionController/get_instalment_upgrate_adm", 
    type :"post",
    data:{
      'packageId' : packageId,
      'tution_fee' : tution_fee,
      'reg_fees'  : registration_fees,
      'no_of_install' : noOfInstallment
    },
    success:function(data){
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

 <!-- <div class="col-md-3">
                      <label><b>Department:*</b></label>
                        <select class="select2 form-control" name="department_id[]" id="department_id" multiple="multiple">
                          <option value="">Select Department</option>
                              <?php foreach ($list_department as $ld) { ?>
                              <option <?php if ($ld->department_id == @$adm_record->department_id) {
                                        echo "selected";
                                      } ?>
                              value="<?php echo $ld->department_id; ?>"><?php echo $ld->department_name; ?></option>
                            <?php } ?>
                      </select>
              </div> -->

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
     if (type == 'single') {
       $('.select_course_single').show();
       $('.select_course_package').hide();
     } else {

       $('.select_course_single').hide();
       $('.select_course_package').show();
     }

   }
 </script>
 
<script>
$(document).ready(function(){
$("#form").submit(function(){
    $.ajax({
        url: "<?php echo base_url() ?>AddmissionController/admission_upgrade", 
        data: $("#form").serialize(), 
        type: "POST", 
        dataType: 'json',
        success: function (e) {
            console.log(JSON.stringify(e));
        },
        error:function(e){
            console.log(JSON.stringify(e));
        }
    }); 
    return false;
});
});
</script>
 <script type="text/javascript">
   $('#upgrade_data').on('click', function() {
     var admission_id = $('#admission_id').val();
     var department_id = $('#department_id').val();
     var type = $('#type').val();
     var course_orpackage = $('#course_orpackage').val();
     var course_orsingle = $('#course_orsingle').val();
     var sub_total_ids = $('#sub_total_ids').val();
     var registration_fees = $('#registration_fees').val();
     var no_of_installment = $('#no_of_installment').val();
     var installment_date_first = $('#installment_date_first').val();
     var due_amount_first = $('#due_amount_first').val();
     var paid_amount_first = $('#paid_amount_first').val();
     var installment_date = [];
    $('input[name=installment_date]').map(function() {
                installment_date.push($(this).val());

    });
    var due_amount = [];
    $('input[name=due_amount]').map(function() {
                due_amount.push($(this).val());

    });
    var paid_amount = [];
    $('input[name=paid_amount]').map(function() {
                paid_amount.push($(this).val());

    });

     $.ajax({
       type: "POST",
       url: "<?php echo base_url() ?>AddmissionController/admission_upgrade",
       dataType: "JSON",
       data: {
         'admission_id': admission_id,
         'department_id': department_id,
         'type': type,
         'course_orpackage': course_orpackage,
         'course_orsingle': course_orsingle,
         'tuation_fees': sub_total_ids,
         'registration_fees': registration_fees,
         'no_of_installment': no_of_installment,
         'installment_date_first': installment_date_first,
         'due_amount_first': due_amount_first,
         'paid_amount_first': paid_amount_first,
         'installment_date': installment_date,
         'due_amount': due_amount,
         'paid_amount': paid_amount
       },
       success: function(data) {
         // $('#exampleModal').modal().hide();
         //$("#admission_id").val("");
         //$("#update_id").val("");

         alert('Are You Sure This Course Updated');
       }
     });
     return false;
   });
 </script>