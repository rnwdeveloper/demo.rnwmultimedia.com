  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>dist/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>dist/css/summernote-bs4.css">
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

<style>
/* The customcheck */
.customcheck {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.customcheck input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 5px;
}

/* On mouse-over, add a grey background color */
.customcheck:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.customcheck input:checked ~ .checkmark {
    background-color: #02cf32;
    border-radius: 5px;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.customcheck input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.customcheck .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>

<style>
    .form-group input[type="checkbox"] {
    display: none;
}

.form-group input[type="checkbox"] + .btn-group > label span {
    width: 10px;
}

.form-group input[type="checkbox"] + .btn-group > label span:first-child {
    display: none;
}
.form-group input[type="checkbox"] + .btn-group > label span:last-child {
    display: inline-block;   
}

.form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
    display: inline-block;
}
.form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
    display: none;   
}
.modal-title{
  font-size: 18px;
  color: black;
}
</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/themes/fontawesome-stars.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/themes/bars-reversed.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .br-theme-bars-reversed .br-widget a {
  background-color: pink;
}

.br-theme-bars-reversed .br-widget a.br-active,
.br-theme-bars-reversed .br-widget a.br-selected {
  background-color: #ff446a;
}

.br-theme-bars-reversed .br-widget .br-current-rating {
  color: #ff446a;
  font-size: 20px;  
}

.checked {
  color: orange;
}
.tbl{
  background:#7460ee;
  color: white;
}
.all-btn a {margin: 0 5px;}
.box-header {padding: 8px 0;}
.btn {border-radius: 0; transition: all 0.5s;}
.text-white {color: white;}
.all-btn span {padding: 0 10px; background: white; margin-left: 10px; border-radius: 5px;}
.inactive-a {background: rgb(66,133,244);}
.inactive-a>span {color: rgb(66,133,244);}
.active-a {background: rgb(244,180,0);}
.active-a>span {color: rgb(244,180,0);}
.postpone-a {background: rgb(171,71,188);}
.postpone-a>span {color: rgb(171,71,188);}
.confirm-a {background: rgb(15,157,88);}
.confirm-a>span {color: rgb(15,157,88);}
.discart-a {background: rgb(219,68,55);}
.discart-a>span {color: rgb(219,68,55);}
.profile-a {background: rgb(0, 172, 193);}
.profile-a>span {color: rgb(0, 172, 193);}
.inactive-a:hover, .inactive-a:focus,
.active-a:hover, .active-a:focus,
.postpone-a:hover, .postpone-a:focus,
.confirm-a:hover, .confirm-a:focus,
.discart-a:hover, .discart-a:focus,
.profile-a:hover, .profile-a:focus {
   color: white;
}
.nav-tabs>li>a {margin-right: 15px;}
.nav-tabs>li.active>a,
.nav-tabs>li.active>a:focus,
.nav-tabs>li.active>a:hover {border-radius: 0;}
.form-control {
   height: auto;
   padding: 4px 7px;
   line-height: 24px;
}
.modal-title{
  font-size: 20px;
}
</style> 

<main class="main_content d-inline-block">
    <section class="page_title_block d-inline-block w-100 position-relative pb-0">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-11 mx-auto text-center" >
            <div class="page_heading">
              <h1>Mail Details</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="task_show_sec">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            
                     <div class="[ form-group ]">
                        <input type="checkbox" name="fancy-checkbox-default" id="fancy-checkbox-default" autocomplete="off" />
                        <div class="[ btn-group ]">
                            <label for="fancy-checkbox-default" onclick='selectAll()'  class="[ btn btn-sm btn-default ]">
                                <span class="[ glyphicon glyphicon-ok ]"></span>
                                <span> </span>
                            </label>
                            <label for="fancy-checkbox-default" id="selectall" onclick='selectAll()' class="[ btn btn-sm btn-default active ]">
                                Select All
                            </label>
                            <label for="fancy-checkbox-default" id="unselectall" style="display:none"  onclick='selectAll()' class="[ btn btn-sm btn-default active ]">
                                Email
                            </label>
                        </div>
                        <button type="button" class="btn btn-sm btn-success" onclick='mailsend()'><i class="fa fa-envelope" aria-hidden="true"></i> Compose </button>
                        <a href="<?php echo base_url(); ?>settings/all_gmail">
                        <button type="button" class="btn btn-sm btn-warning">SHOW MAIL</button>
                        </a>
                    </div>
                                         <!-- Modal -->
  
                   



                           <div  id="enq_table"> 
                <div class="table-responsive">
              <table id="example1" class="table table-responsive table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Designation</th>
                  <th>Name</th>
                  <th>Email</th>
                  <!-- <th>Address</th>
                  <th>Other Remark</th> --> 
                </tr>
                </thead>
                <tbody>
                <?php $sno=1; foreach($all_staffDetails as $val) { ?>
                <tr>
                  <td>
                       <label class="customcheck"><?php echo $sno; ?>
                          <input type="checkbox" name="mark" value="<?php echo $val->id; ?>" id="mark">
                          <span class="checkmark"></span>
                        </label>
                    </td>
                 
                   <td><?php echo $val->designation; ?></td>
                   <td><?php echo $val->name; ?></td>
                   <td><?php echo $val->email; ?></td>
                
                  
                </tr>
                
             <?php $sno++; } ?>
                
                </tfoot>
              </tbody>
            </table>
<!--             <div class="pagination-container text-center">
        <p><?php echo $links; ?></p>
      </div> -->
          </div>
        </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>





  <div class="filter_ratio filter_ratio_one">
    <div class="modal fade" id="myModal">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Task</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row justify-content-center">
              <div class="col-xl-8 col-lg-8 col-md-8">
                <div class="task_show_left_block_form">
                  <form>
                    <ul class="show_task_propaty">
                      <li>Panding</li>
                      <li class="float-right">High Priority</li>
                    </ul>
                    <div class="form-group">
                      <input type="text" name="" placeholder="Laravel" class="form-control">
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" placeholder="Creating a fast" rows="6"></textarea>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-primary custi_light_blue_bg">Show Document file</button>
                    </div>
                    <div class="form-group">
                      <label>Status:- &nbsp;&nbsp;&nbsp;</label>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="one" id="chake3">
                        <label class="form-check-label" for="chake3">Progress</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="chake4" name="one">
                        <label class="form-check-label" for="chake4">Complete</label>
                      </div>
                    </div>
                    <div class="work_progress_block">
                      <label>Progress status:-</label>
                      <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><span>70%</span></div>
                      </div>
                    </div>
                    <div class="chateing_block">
                      <div class="me_type_chate the_chate"><p>How many lecture create?</p></div>
                      <div class="any_type_chate the_chate"><p>5 demo lecture.</p></div>
                      <div class="me_type_chate the_chate"><p>OK.</p></div>
                      <div class="me_type_chate the_chate"><p>Good.</p></div>
                    </div>
                    <div class="type_msg_block">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group mb-0 type_msg_block_box position-relative">
                              <input type="text" name="msg" class="form-control msg_type_input" placeholder="Type a message">
                              <button class="msg_sent_btn">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="currentColor" d="M1.101 21.757L23.8 12.028 1.101 2.3l.011 7.912 13.623 1.816-13.623 1.817-.011 7.912z"></path></svg>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="task_show_right_block_form">
                  <div class="seen_dates">
                    <p>Seen date : 15-4-20 5:00 PM</p>
                  </div>
                  <ul class="task_show_right_block_form_data_list">
                    <li>Observe: - Daily</li>
                    <li>Deadline: - 16-4-2020 6:00 PM</li>
                    <li>Set reminder:5 minute</li>
                  </ul>
                  <ul class="task_show_right_block_form_data_list">
                    <li>Created By: Hitesh sir</li>
                    <li>Observer By: Pradip sir</li>
                  </ul>
                  <div class="participants_bloack">
                    <div class="participants_title">
                      <h4>Participants:-</h4>
                    </div>
                    <ul class="participants_member">
                      <li>
                        <span class="participants_member_profile"></span>
                        <span class="participants_member_name">Mehul Sir</span>
                      </li>
                      <li>
                        <span class="participants_member_profile"></span>
                        <span class="participants_member_name">Mehul Sir</span>
                      </li>
                      <li>
                        <span class="participants_member_profile"></span>
                        <span class="participants_member_name">Mehul Sir</span>
                      </li>
                    </ul>
                  </div>
                  <div class="submit_task_btn_block">
                    <button type="button" class="btn btn-block btn-primary custi_light_blue_bg border-0">Submit Task</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </div>
  




  
  

<?php //include('../footer_test.php'); ?>
<script src="<?php echo base_url(); ?>New_Demo_Soft/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>New_Demo_Soft/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>New_Demo_Soft/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>New_Demo_Soft/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>New_Demo_Soft/js/bootstrap-timepicker.js"></script>



<script src="<?php echo base_url(); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

<!-- page script -->


<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/jquery.barrating.min.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>js/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script> -->


<!-- page script -->
<script>
    // jQuery / jQuery Bar Rating
  // FontAwesome / Bootstrap / jBR plugin

  $(function() {
    $('.ex').barrating({
      theme: 'fontawesome-stars'
    });
  });

 
</script>
<script>
    
   if (document.getElementById("yellow") != null) {
    setTimeout(function() {
      document.getElementById('yellow').style.display = 'none';
    }, 5000);
  }
</script>



<script>
function createExcel()
{
    
            var excel_data = $('#enq_table').html();  
            $('#tb_data').val(excel_data);
           $('#frm_data').submit();
    
}
</script>

<script>

$(function () {
                $('#datetimepicker1').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm:ss'
                });
            });
            
            $(function () {
                $('#datetimepicker2').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm:ss'
                });
            });
$('.datepicker').datepicker({
      autoclose: true,
     format:"yyyy-mm-dd"
     
    
    })
    
  // $(function () {
  //   $('.example1').DataTable({
  //       "pageLength": 25
  //   })
  //   $('#example2').DataTable({
  //     'paging'      : true,
  //     'lengthChange': false,
  //     'searching'   : false,
  //     'ordering'    : true,
  //     'info'        : true,
  //     'autoWidth'   : false
  //   })
  // })
</script>
<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
W</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script type="text/javascript">
$(function() {


   var start1=moment().subtract(1, 'days');
    var end1=moment();

    
    var start=""
     var end=""
    
    

    function cb(start, end) {
        $('#fromdate').val(start.format('YYYY-MM-DD'));
        $('#todate').val(end.format('YYYY-MM-DD'));
        $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
    }

    $('#reportrange').daterangepicker({
        startDate: start1,
        endDate: end1,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
</script>
 <script type="text/javascript">
            

      function selectAll(){
          if($('#fancy-checkbox-default').prop("checked") == true){
                    var items=document.getElementsByName('mark');
            for(var i=0; i<items.length; i++){
              if(items[i].type=='checkbox')
                items[i].checked=false;
            }
            $('#selectall').show();
            $('#unselectall').hide();
                }
                else
                {
                    var items=document.getElementsByName('mark');
            for(var i=0; i<items.length; i++){
              if(items[i].type=='checkbox')
                items[i].checked=true;
            }
              $('#selectall').hide();
            $('#unselectall').show();
                }
        
      }
      
      
     function mailsend()
      {
             

  


              var id="";
              var items=document.getElementsByName('mark');
            for(var i=0; i<items.length; i++){
              if(items[i].type=='checkbox')
              {
                  if(items[i].checked)
                  {

                      if(id=="")
                      {
                          id =items[i].value;
                      }
                      else
                      {
                          id = id+","+items[i].value;
                         
                      }

                  }
              }
                
            }


            
            if(id!="")
            {


              $.ajax({

                url:"<?php echo base_url() ?>settings/fetch_email_designation",
                type:"POST",
                data:{
                  'u_id':id
                },
                success: function(data)
                {
                 $('#show_all_data').html(data);
                
                }

              });


              $.ajax({

                url:"<?php echo base_url() ?>settings/fetch_email",
                type:"POST",
                data:{
                  'u_id':id
                },
                success: function(data)
                {
                 $('#show_all_email').html(data);
                
                }

              });



              alert(id);

                $('#id').val(id);
                $('#myModal').modal("show").on('click', '#updateok', function(e) {
                //  //var user_id=$("#subscription").val();  
                // window.location.href = "<?php  echo base_url();?>Bulk_LeadController/update_User_Data?id="+id;  
                   
                          
                      });
               // $('#myModal').modal('show');
                        
                
            }
            else
            {
                
                alert("Please Select Row");
            }



          
      }

    </script>
</body>
</html>