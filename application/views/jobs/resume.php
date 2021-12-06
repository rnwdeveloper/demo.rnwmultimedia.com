


<!DOCTYPE html>
<html>
<head>
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
  
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/themes/fontawesome-stars.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/themes/bars-reversed.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <style type="text/css">
   .t1{
    background-color: #7460ee;
    color: white;
    font-size: 16px;
    font: center;
   }
   .f1{
    background-color: #fc4b6c;
    color: white;
   }
   .td1{
    color: black;
   }
   .text-white{
    color: white;
   }
   .pos{
    background-color: #3c8dbc;
   }
    .s1{
      margin-left: 12px;
    }
   {
  box-sizing: border-box;
}

body {
  margin: 0;
}

/* Style the header */
.header {
  background-color: #f1f1f1;
  padding: 20px;
  text-align: center;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #009efb;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: white;
  color: black;
}
.modal-header{
  background-color: #3c8dbc;
}
.modal-title{
  color: white;
  font-size: 20px;
}
 </style>



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
        
<br>
<div class="row">
        <div class="col-md-12">
            
                
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <div style="margin-left: 95%;"><a href="<?php echo base_url(); ?>FormController/view_student_applied_jobs" class="btn-sm btn-primary">Back</a></div>
              <h3 class="box-title"><b class="s1">Resume</b></h3> <br><br>
            <?php  $url = base_url('student_placement/resumes/'.$student_applied->resume);
    $html =  '<iframe src="'.$url.'" name="aboutme" width="100%" height="1000px">';
    echo $html; ?>
              
           
       
      </div>
    </div>
  </div>
</div>
</section>


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
                    format: 'DD/MM/YYYY'
                });
            });
            
            $(function () {
                $('#datetimepicker2').datetimepicker({
                    format: 'DD/MM/YYYY'
                });
            });
$('.datepicker').datepicker({
      autoclose: true,
     format:"yyyy-mm-dd"
    })
    
  $(function () {
    $('.example1').DataTable({
        "pageLength": 10
    })
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
      
      
     function UpdateUserData()
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
                $('#id').val(id);
                $('#myModal').modal("show").on('click', '#updateok', function(e) {
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

     
    <script>
function myFunction() {
  var x = document.getElementById("mySelect").value;
  document.getElementById("demo").innerHTML = "" + x;
}
</script>

 
</body>
</html>




