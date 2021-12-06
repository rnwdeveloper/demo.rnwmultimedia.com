<div class="table-responsive mt-3 product_list_table">
                        <table class="table table-striped income-table table-bordered responce" id="product_list_table">
                           <thead>
                              <tr>
                                 <th>SNo</th>
                                 <th>Branch</th>
                                 <th>Place </th>
                                 <th>Property Type</th>
                                 <th>Name</th>
                                 <th>Description</th>
                                 <th  >Status</th>
                                 <th width="200px">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $sno = 1; ?>
                              <?php foreach($all_product as $val) {  ?>
                              <tr>
                                 <td><?php echo $sno;  ?></td>
                                 <td><?php  foreach($all_branches as $row) { if($row->branch_id==$val->branch_id) { echo $row->branch_name; } } ?></td>
                                 <td>
                                    <?php  foreach($all_place as $row) { 
                                       if($row->place_type_id==$val->place_type_id) { echo $row->place_name; }
                                       }?>
                                 </td>
                                 <td>
                                    <?php  foreach($all_product_type as $row) { 
                                       if($row->product_type_id==$val->product_type_id) { echo $row->product_name; }
                                       }?>
                                 </td>
                                 <td><?php echo $val->product_name; ?></td>
                                 <td><?php echo $val->product_decription; ?></td>
                                 <td> <?php if($val->product_status=="1") { ?>
                                    <a class="badge badge-danger text-white">Disable</a>
                                    <?php } else { ?>
                                    <a class="badge badge-success text-white">Active</a>
                                    <?php } ?>
                                 </td>
                                 <td>
                                    <?php $xx = $val->product_id; ?>
                                    <a class="bg-primary action-icon text-white btn-primary" href="javascript:p_list(<?php echo $val->product_id; ?>)"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="javascript:remove_co(<?php echo $xx; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
                                    <?php if($val->product_status=="0") { ?>
                                    <a href="javascript:co_status_pro(<?php echo $xx; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="fas fa-ban"></i></a>
                                    <?php } else {?>
                                    <a href="javascript:co_status_pro(<?php echo $xx; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="fa fa-check-square-o"></i></a>
                                    <?php }?>
                                 </td>
                              </tr>
                              <?php $sno++; } ?>
                           </tbody>
                        </table>
                     </div>
                     <script src="https://demo.rnwmultimedia.com/dist/assets/js/app.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/datatables.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/forms-advanced-forms.js"></script>
<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/custom.js"></script>
<!-- JS Libraies -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<!-- JS Libraies -->
<script type="text/javascript">
   $(".form-assign-table").niceScroll({
       cursorcolor: "transparent"
   });
   
</script>
<script>
   function selectPlace()
   {
   var b_id = $('#branch_id').val();
   $.ajax({
      url:"<?php echo base_url(); ?>Common/branchWisePlace",
      type:"post",
      data:{
         'branch_id':b_id
      },
      success : function(data){
         $('#place_box').html(data);
      }
   });
   }  
      
</script>
<script>
   function selectPlaceAgain()
   {
   var b_id = $('#branch_idb').val();
   $.ajax({
      url:"<?php echo base_url(); ?>Common/branchWisePlaceAgain",
      type:"post",
      data:{
         'branch_id':b_id
      },
      success : function(data){
         $('#place_div').html(data);
      }
   });
   }  
      
</script>
<script>
   function selectproduct()
   {
   var product_id = $('#product_type_id').val();
   var branch_id = $('#branch_id').val();
   var place_id = $('#place_type_id').val();  
   $.ajax({
      url:"<?php echo base_url(); ?>Common/productWise",
      type:"post",
      data:{
         'product_type_id': product_id,
         'branch_id' : branch_id,
         'place_id' : place_id
      },
      success : function(data){
         $('#list_property').html(data);
      }
   });
   } 
   function select_list()
   {
      var m = $('#list_property').val();
      $.ajax({
      url:"<?php echo base_url(); ?>Common/demo_data",
      type:"post",
      data:{
      d_id : m
      },
      success : function(data){
         $('#demo_data').html(data);
      }
   });
   
      $('#dialog-modal').modal("show");
   
      } 
   
   
        $(document).ready(function() {
         $('table.responce').DataTable();
         } )
        
</script>
<script>
   $('#ad_complain_submit').on('click', function() {
    var product_enquiry_id = $('#product_enquiry_id').val();
    var branch_id = $('#branch_id').val();
    var place_type_id = $('#place_type_id').val();
    var list_property = $('#list_property').val();
    var product_type_id = $('#product_type_id').val();
    var product_issue = $('#product_issue').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Common/add_complain_new",
        data: {
            'product_enquiry_id' :product_enquiry_id,
            'branch_id': branch_id,
            'place_type_id': place_type_id,
            'list_property': list_property,
            'product_type_id': product_type_id,
            'product_issue': product_issue
        },       
        success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            if (ddd == '1') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Complain Is Now Inserted.',
                    position: 'topRight'
                }));
                $.ajax({
                  url: "<?php echo base_url(); ?>Common/complain_table",
                  type: "post",
                  data: {
                        'product_enquiry_id ': product_enquiry_id 
                  },
                  success: function(Resp) {

                        $('.complain_table').html(Resp);
                  }
               });
            } else if (ddd == '2') {
                $('#msg').html(iziToast.error({
                    title: 'Canceled!',
                    timeout: 2500,
                    message: 'Someting Wrong!!',
                    position: 'topRight'
                }));
   
                $.ajax({
                  url: "<?php echo base_url(); ?>Common/complain_table",
                  type: "post",
                  data: {
                        'product_enquiry_id ': product_enquiry_id 
                  },
                  success: function(Resp) {

                        $('.complain_table').html(Resp);
                  }
               });
            }
        }
    });
    return false;
   });
</script>
<script>
   $('#place_type_submit').on('click', function() {
      event.preventDefault();
    var place_type_id = $('#place_type_ids').val();
    var branch_id = $('#branch_ids').val();
    var place_name = $('#place_name').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Common/place_type_new",
        data: {
            'place_type_id' :place_type_id,
            'branch_id': branch_id,
            'place_name': place_name
        },       
        success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            
            if (ddd == '1') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! branch place is Now Inserted.',
                    position: 'topRight'
                }));

                $.ajax({
                  url: "<?php echo base_url(); ?>Common/place_type_table",
                  type: "post",
                  data: {
                        'place_type_id': place_type_id
                  },
                  success: function(Resp) {

                        $('.place_type_table').html(Resp);
                  }
               });

            } else if (ddd == '2') {
                $('#msg').html(iziToast.success({
                    title: 'Canceled!',
                    timeout: 2500,
                    message: 'HI! branch place is Now Updated.',
                    position: 'topRight'
                }));

                $.ajax({
                  url: "<?php echo base_url(); ?>Common/place_type_table",
                  type: "post",
                  data: {
                        'place_type_id': place_type_id
                  },
                  success: function(Resp) {

                        $('.place_type_table').html(Resp);
                  }
               });
            } else if (ddd == '3') {
                $('#msg').html(iziToast.error({
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
<script>
   $('#product_submit').on('click', function() {
    event.preventDefault();
    var product_type_id = $('#productids').val();
    var product_name = $('#product_names').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Common/product_type_new",
        data: { 'product_type_id' : product_type_id , 'product_name': product_name },       
        success: function(resp) {
            var data = $.parseJSON(resp);              
            var ddd = data['all_record'].status;
            if (ddd == '1') {    
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! New product is Now Inserted.',
                    position: 'topRight'
                }));  

                $.ajax({
                  url: "<?php echo base_url(); ?>Common/product_table",
                  type: "post",
                  data: {
                        'product_type_id': product_type_id
                  },
                  success: function(Resp) {

                        $('.product_data').html(Resp);
                  }
               });
                
            } else if (ddd == '2') {
                $('#msg').html(iziToast.success({
                    title: 'Canceled!',
                    timeout: 2500,
                    message: 'HI! This Record Successfully Updated.',
                    position: 'topRight'
                }));
                $.ajax({
                  url: "<?php echo base_url(); ?>Common/product_table",
                  type: "post",
                  data: {
                        'product_type_id': product_type_id
                  },
                  success: function(Resp) {
                        $('.product_data').html(Resp);
                  }
               });
            } else if (ddd == '3') {
              $('#msg').html(iziToast.error({
                title: 'Canceled!',
                timeout: 2000,
                message: 'Try Again!!',
                position: 'topRight'
              }));                        
            }
        }    
    });
   });
      
   function co_status_upd(product_type_id , product_status) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/update_status",
          type: "post",
          data: {
            'id': product_type_id,
            'status': product_status,
            'table': 'product_type',
            'field': 'product_status',
            'check_field': 'product_type_id'
          },
          success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['status'].status;
            console.log("dddddd", ddd);
            if (ddd == '1') {
              $('#msg').html(iziToast.success({
                title: 'Success',
                timeout: 2000,
                message: 'HI! record status updated.',
                position: 'topRight'
              }));
              
              $.ajax({
                  url: "<?php echo base_url(); ?>Common/product_table",
                  type: "post",
                  data: {
                        'product_type_id': product_type_id
                  },
                  success: function(Resp) {

                        $('.product_data').html(Resp);
                  }
               });
              
            } else if (ddd == '2') {
              $('#msg').html(iziToast.error({
                title: 'Canceled!',
                timeout: 2000,
                message: 'Try Again!!!!',
                position: 'topRight'
              }));
            }
          }
        });
        return false;
      }


      function comp_status_upd(product_enquiry_id , enquiry_status) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/comp_update_status",
          type: "post",
          data: {
            'id': product_enquiry_id ,
            'status': enquiry_status,
            'table': 'product_enquiry',
            'field': 'enquiry_status',
            'check_field': 'product_enquiry_id '
          },
          success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['status'].status;
            console.log("dddddd", ddd);
            if (ddd == '1') {
              $('#msg').html(iziToast.success({
                title: 'Success',
                timeout: 2000,
                message: 'HI! record status updated.',
                position: 'topRight'
              }));
              $.ajax({
                  url: "<?php echo base_url(); ?>Common/complain_table",
                  type: "post",
                  data: {
                        'product_enquiry_id ': product_enquiry_id 
                  },
                  success: function(Resp) {

                        $('.complain_table').html(Resp);
                  }
               });
            } else if (ddd == '2') {
              $('#msg').html(iziToast.error({
                title: 'Canceled!',
                timeout: 2000,
                message: 'Try Again!!!!',
                position: 'topRight'
              }));
            }
          }
        });
        return false;
      }
</script>
<script>
   $('#property_submit').on('click', function() {
   event.preventDefault();
   var product_id = $('#product_ids').val();
    var branch_id = $('#branch_idb').val();
    var place_type_id = $('#place_type_idb').val();
    var product_name = $('#product_name').val();
    var product_type_id = $('#product_type_idb').val();
    var product_decription = $('#product_decription').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Common/product_new",
        data: {
            'product_id': product_id,
            'branch_id': branch_id,
            'place_type_id': place_type_id,
            'product_name': product_name,
            'product_type_id': product_type_id,
            'product_decription': product_decription
        },       
        success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            // $('#property_table').html(data);
            console.log(data);
            if (ddd == '1') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Complain Is Now Inserted.',
                    position: 'topRight'
                }));     
              $.ajax({
                  url: "<?php echo base_url(); ?>Common/product_list_type",
                  type: "post",
                  data: {
                        'product_id ': product_id 
                  },
                  success: function(Resp) {

                        $('.product_list_table').html(Resp);
                  }
               });
            } else if (ddd == '2') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Complain Is Now Updated.!!',
                    position: 'topRight'
                }));          
              $.ajax({
                  url: "<?php echo base_url(); ?>Common/product_list_type",
                  type: "post",
                  data: {
                        'product_id ': product_id 
                  },
                  success: function(Resp) {

                        $('.product_list_table').html(Resp);
                  }
               });
            }
            else if (ddd == '3') {
                $('#msg').html(iziToast.error({
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
<script>
   function co_status_pro(product_id  , product_status) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/update_status_pro",
          type: "post",
          data: {
            'id': product_id ,
            'status': 'product_status',
            'table': 'product',
            'field': 'product_status',
            'check_field': 'product_id'
          },
          success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['status'].status;
            console.log("dddddd", ddd);
            if (ddd == '1') {
              $('#msg').html(iziToast.success({
                title: 'Success',
                timeout: 2000,
                message: 'HI! Course status updated.',
                position: 'topRight'
              }));
              $.ajax({
                  url: "<?php echo base_url(); ?>Common/product_list_type",
                  type: "post",
                  data: {
                        'product_id ': product_id 
                  },
                  success: function(Resp) {

                        $('.product_list_table').html(Resp);
                  }
               });
            } else if (ddd == '2') {
              $('#msg').html(iziToast.error({
                title: 'Canceled!',
                timeout: 2000,
                message: 'Somthing went wrong!!!!!',
                position: 'topRight'
              }));
            } 
          }
        });
        return false;
      }
</script>
<script>
   function p_list(product_id) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/get_recoproduct",
          type: "post",
          data: {
            'id': product_id ,
          },
          success: function(resp) {
            var data = $.parseJSON(resp);
            var product_id = data['single_record'].product_id;
            // console.log(product_id);
            var branch_id = data['single_record'].branch_id;
            var place_type_id = data['single_record'].place_type_id; 
            var product_type_id = data['single_record'].product_type_id;
            var product_name = data['single_record'].product_name;
            var product_decription = data['single_record'].product_decription;
   
            $('.product-branch').val(branch_id);
            $('#place_type_idb').val(place_type_id);
            $('#product_ids').val(product_id);
            $('#product_type_idb').val(product_type_id);
            $('#product_name').val(product_name);
            $('#product_decription').val(product_decription);
            $('#property_submit').text('Update');
          }
        });
        return false;
      }
</script>
<script>
   function place_list(place_type_id ) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/get_recplace",
          type: "post",
          data: {
            'id': place_type_id ,
          },
          success: function(resp) {
            var data = $.parseJSON(resp);
            var branch_id = data['single_record'].branch_id;
            var place_name = data['single_record'].place_name; 
            var place_type_id = data['single_record'].place_type_id; 
            
            $('#place_type_ids').val(place_type_id);
            $('#place_type_submit').text("Update");
            $('#branch_ids').val(branch_id);
            $('#place_name').val(place_name);
            $('#place_name').val(place_name);
          }
        });
        return false;
      }
</script>
<script>
   function product_list(product_type_id) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/get_recproduct_type",
          type: "post",
          data: {
            'id': product_type_id  ,
          },
          success: function(resp) {

            var data = $.parseJSON(resp);
            var product_type_id = data['single_record'].product_type_id;
            var product_name = data['single_record'].product_name;

            $('#productids').val(product_type_id);
            $('#product_names').val(product_name);
            $('#product_submit').text('Update');
            $('#product_submit').attr('id','Update');
            $('#product_submit').attr('name','Update');
          }
        });
        return false;
      }
</script>
<script>
   function remove_co(product_id) {
       var conf = confirm("Are you sure to delete record?");
       if (conf) {
         $.ajax({
           url: "<?php echo base_url(); ?>Common/delete_product",
           type: "post",
           dataType: 'html',  
           data: {
             'id': product_id ,
             'table': 'product',
             'field': 'product_id '
           },
           success: function(resp) {
             var data = $.parseJSON(resp);
             var ddd = data['all_record'].status;
             console.log("dddddd", ddd);
             if (ddd == '1') {
               $('#msg').html(iziToast.success({
                 title: 'Success',
                 timeout: 2000,
                 message: 'HI! This Record Deleted.',
                 position: 'topRight'
               }));
               $.ajax({
                  url: "<?php echo base_url(); ?>Common/product_list_type",
                  type: "post",
                  data: {
                        'product_id ': product_id 
                  },
                  success: function(Resp) {

                        $('.product_list_table').html(Resp);
                  }
               });
             }   else if (ddd == '3') {
               $('#msg_doc').html(iziToast.error({
                 title: 'Canceled!',
                 timeout: 2000,
                 message: 'Someting Wrong!!',
                 position: 'topRight'
               }));
             }
           }
         });
         return false;
       }
   }
</script>
<script>
   function comp_chat(product_enquiry_id){
      $.ajax({
           url: "<?php echo base_url(); ?>common/chat_module",
           type: "post",
           dataType: 'html',  
           data: {
            'product_enquiry_id'  : product_enquiry_id 
           },
           success: function(resp) { 
            $('#chat_model').model();  
            var data = $.parseJSON(resp);
            // $('#chat_model').html(resp);
            var product_enquiry_id = data['conversion'].product_enquiry_id;
            var sender_name= data['conversion'].sender_name;
           }
         });
   }
</script>