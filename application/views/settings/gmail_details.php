


<!DOCTYPE html>
<html>
<head>
 <title>How to Import Excel Data into Mysql in Codeigniter</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">
  
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
</head>

<body>
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <!--  <section class="content-header">
      <h1><b>Bulk Lead</b></h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Bulk Lead</li>
      </ol>
    </section> -->
   
    <!-- Main content -->
    <section class="content">
         

          <!-- Count Lead -->
        <!--  -->
      
 
<div class="row">
        <div class="col-md-12">
            
          <!-- general form elements -->
          <div class="box box-primary" style="padding:20px;">
            <div class="box-header with-border">
             
              <div  id="enq_table"> 
                <div class="table-responsive">
              <table id="example1" class="table table-responsive table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Subject</th>
                  <th>Description</th>
                  <th>From</th>
                  <th>Member Email</th>
                  <th>Document</th>
                  <th>Create Date&Time</th>
                  <!-- <th>Address</th>
                  <th>Other Remark</th> --> 
                </tr>
                </thead>
                <tbody>
                <?php foreach($gall as $val) { ?>
                <tr>
                  <td>
                       <?php echo $val->email_id; ?>
                    </td>
                 
                   <td><?php echo $val->subject; ?></td>
                   <td><?php echo $val->description; ?></td>
                   <td><?php echo $val->from; ?></td>
                   <td><?php
                   $idall = explode(',', $val->member_id);

                   $logall = explode(',', $val->image_type);
                   
                   foreach ($idall as $j => $k) {
                    foreach ($all_faculty as  $v) {
                    if($v->faculty_id == $k && $logall[$j] == "Faculty")
                    {
                      echo $v->email."&nbsp;&nbsp;";

                    }
                   } 


                     foreach ($all_hod as  $v) {
                    if($v->hod_id == $k && $logall[$j] == "hod")
                    {
                      echo $v->email."&nbsp;&nbsp;";

                    }
                   } 


                    foreach ($all_super as  $v) {
                    if($v->id == $k && $logall[$j] == "Super Admin")
                    {
                      echo $v->email."&nbsp;&nbsp;";

                    }
                   } 


                     foreach ($all_user as  $v) {
                    if($v->user_id == $k &&  $logall[$j] != "hod" &&  $logall[$j] != "Faculty" && $logall[$j] != "Super Admin")
                    {
                      echo $v->email."&nbsp;&nbsp;";

                    }
                   } 




                   } ?></td>
                   <td><?php 
                   if(!empty($val->document)){
                   $mdata=explode(',',$val->document);

                   $type= array(".jpg",".png",".gif",".peg");
                   foreach ($mdata as $key => $value) {
                   // echo rtrim('.',$value);
                    $j =substr($value, strlen($value)-4,4);
                    if(in_array($j, $type))
                    {
                    ?>
                      <img src="<?php echo base_url(); ?>images/mail_image/<?php  echo $value; ?>" width="100px;">
                      <a href="<?php echo base_url(); ?>images/mail_image/<?php  echo $value; ?>" style="color: red;" download><i class="fa fa-download"></i></a><br>
                      <?php } else { ?>
                      <a href="<?php echo base_url(); ?>images/mail_image/<?php  echo $value; ?>" target="_blank"><?php echo $value; ?></a>
                      <a href="<?php echo base_url(); ?>images/mail_image/<?php  echo $value; ?>" style="color: red;" download><i class="fa fa-download"></i></a>
                      <br>
                    <?php
                   } } }
                    ?></td>
                    <td><?php echo date('d-m-Y H:iA',strtotime($val->created_at)); ?></td>
                
                  
                </tr>
                
             <?php } ?>
                
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
</div>

  <footer class="main-footer">
    
    <strong>Copyright©2018 Red & White Multimedia.</strong> All rights
    reserved.
  </footer>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url(); ?>bower_components/select2/dist/js/select2.full.min.js"></script>

<script src="<?php echo base_url(); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
<!-- page script -->


<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/jquery.barrating.min.js"></script>


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
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
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





                $('#id').val(id);
                $('#myModal').modal("show").on('click', '#updateok', function(e) {
                  alert();
                //  //var user_id=$("#subscription").val();  
                // window.location.href = "<?php  echo base_url();?>Bulk_LeadController/update_User_Data?id="+id;  
                   
                          
                      });
               
                        
                
            }
            else
            {
                
                alert("Please Select Row");
            }



          
      }

    </script>
</body>
</html>