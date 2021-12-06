 <?php @$user_permission =  explode(",",@$_SESSION['user_permission']);
        @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);
        
        ?>

<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<style type="text/css">
*   {outline:none;}
body,h1,h2,h3,h4,h5,h6,p,span,strong,em,ul,ol,li,a,button,input,select,option,textarea   {font-family: 'Poppins', sans-serif; font-size:13px;}
.content-wrapper    {height:100%;}
.content h3     {margin-top:0; font-family: 'Poppins', sans-serif;}
.right  {text-align:right;}
hr  {height:1px; opacity:0.5;}
.p-0    {padding: 0;}
.p-1    {padding:0 7px;}
.m-1    {margin:10px 0;}
.w-100  {width:100%;}
label {font-weight:normal;}
.btn {-webkit-transition:all 0.5s; -moz-transition:all 0.5s; -ms-transition:all 0.5s; -o-transition:all 0.5s; transition:all 0.5s;}
.btn-danger {background: #fc4b6c; border:none;}
.btn-primary {background: #7460ee; border:none;}
.btn-inverse, .btn-inverse:hover {background: #2f3d4a; color:white;}
input[type="text"], input[type="email"], select   {border-radius:50px; padding:0 15px; height:30px; border:1px solid #dddddd; transition:all 0.5s;}
input:focus, textarea:focus, select:focus {border-color:#3c8dbc; box-shadow:0 0 20px white;}
.btn-success    {border-radius:25px; border:none; transition:all 0.5s;}
input::placeholder  {opacity:0.6;}
input[type=button], input[type=button]:hover  {background:#2f3d4a; color:white;}
.radio  {position:relative; display:inline-block; margin:0 15px 0 0; padding-left:30px; cursor:pointer;
-webkit-user-select:none; -moz-user-select:none; -ms-user-select:none; user-select:none;}
.radio input {position:absolute; opacity:0; cursor:pointer;}
.checkmark {position:absolute; top:5px; left:0; height:20px; width:20px; background-color:white; border-radius:50%; border:2px solid #bbbbbb;}
.radio:hover input ~ .checkmark {background-color:#ccc; border-color:#ccc;}
.radio input:checked ~ .checkmark   {background-color:#2196F3; border-color:#2196F3;}
.checkmark:after    {content:""; position:absolute; display:none;}
.radio input:checked ~ .checkmark:after {display:block;}
.radio .checkmark:after {top:4px; left:4px; width:8px; height:8px; border-radius:50%; background:white;}
.select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {border-radius:50px;}
.table-responsive {width:100%; display:block; margin-top:15px;}
.table>thead>tr>th {border:none;}
.color-table.primary-table thead th {background-color:#7460ee; color:#ffffff; font-weight:normal; border-right:1px solid rgba(255,255,255,0.25);}
.color-table.primary-table tbody td {background-color:#f2f4f8; border-right:1px solid rgba(255,255,255,1);}
.color-table.primary-table thead th:last-child,
.color-table.primary-table tbody td:last-child {border-right:none;}
@media (max-width:500px)
{
.modal-dialog {width:90%; margin:5%;}
.w-100  {width:100%;}
.m-1 {margin:5px 0;}
}
@media (min-width:500px) and (max-width:767px)
{
.modal-dialog {width:400px; margin:30px auto;}
.w-100  {width:100%;}
.m-1 {margin:7px 0;}
}
@media (max-width:991px)
{
.right  {text-align:left;}
.content    {}
}
@media (min-width: 768px)
{
.modal-dialog {width:750px;}
.w-100  {width:100%;}
}
</style>

<style>
    .note
{
    text-align: center;
    height: 40px;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
    font-weight: bold;
    line-height: 40px;
}
.form-content
{
    padding: 2% 5% 2% 5%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
}
.form-control{
    border-radius:1.5rem;
}
.btnSubmit
{
    border:none;
    border-radius:1.5rem;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #0062cc;
    color: #fff;
}
</style>
  
  
  <style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Dosis:500);



.container{
  width: 1200px;
  margin: auto;
}

.timeline{
 
  position: relative;
}


.timeline li{
  list-style: none;
  float: left;
  width: 20%;
  position: relative;
  text-align: center;
  text-transform: uppercase;
  font-family: 'Dosis', sans-serif;
}

ul:nth-child(1){
  color: #4caf50;
}

.timeline li:before{
  counter-increment: year;
  content: "\f03a";
  font-family: "Font Awesome 5 free";
  font-weight: 900;
  width: 50px;
  height: 50px;
  border: 3px solid #4caf50;
  border-radius: 50%;
  display: block;
  text-align: center;
  line-height: 50px;
  margin: 0 auto 10px auto;
  background: #F1F1F1;
  color: grey;
  z-index:1;
  position: relative;
  transition: all ease-in-out .3s;
  cursor: pointer;
}


.timeline li:nth-child(2):before{
  content: "\f06e";
}



.timeline li:nth-child(3):before{;
  content: "\f2f1";
}


.timeline li:nth-child(4):before{
  content: "\f00c";
}


.timeline li.active:nth-child(1):after,
.timeline li.active:nth-child(2):after,
.timeline li.active:nth-child(3):after,
.timeline li.active:nth-child(4):after{
  content: "";
  position: absolute;
  width: 100%;
  height: 5px;
  background-color: #4caf50;
  top: 25px;
  left: 50%;
  transition: all ease-in-out .3s;
  z-index: 0;
}

.timeline li.active1:nth-child(1):after,
.timeline li.active1:nth-child(2):after,
.timeline li.active1:nth-child(3):after,
.timeline li.active1:nth-child(4):after{
  content: "";
  position: absolute;
  width: 100%;
  height: 5px;
  background-color: red;
  top: 25px;
  left: 50%;
  z-index: 0;
  transition: all ease-in-out .3s;
}



.timeline li.active:nth-child(4):after  {
  width: 0;
}

.timeline li.active1:nth-child(4):after  {
  width: 0;
}

.timeline li:first-child:after{
  content: none;
}
.timeline li.active{
  color: #555555;
}
.timeline li.active:before{
  background: #4caf50;
  color: #F1F1F1;
}


.timeline li.active1:before{
  background: red;
  color: #F1F1F1;
   border: 3px solid red;
}


.timeline li.active + li:after{
  background: #4caf50;
}
  </style>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/themes/fontawesome-stars.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/themes/bars-reversed.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  
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
</style> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Main content -->
<section class="content">
<div class="row">
    <?php if(!empty($msg)) { ?>
                  <div class="col-md-12" >
              
              <div style="padding:2px 5px 2px 5px" id="yellow" class="box yellow bg-green"><?php echo $msg; ?></div>
          </div>
          <?php } ?>
    <div class="col-md-12">
        <div class="box box-primary" style="padding:0px 20px 20px 20px;">
            <div class="box-header with-border" >
              <h3 class="box-title">Complain Full Details</h3>
            </div>
            <div class="row">
            <div class="col-xs-12">

            <div class="row">


<div class="col-lg-12 text-right">
      
<div class="btn-group">
    <a href="#">
      <a onclick="goBack()" class="btn btn-sm btn-inverse">Back</a>
  </a>
</div>



 




</div> 

<div class="clearfix"></div>       
</div>




<div class="row">
<!-- row start -->
<div class="container">
<div class="col-xs-12">

    <?php if($select_complain->enquiry_status==3) { ?>
    <ul class="timeline">
        <li class="active1">Complain <br> <?php echo @$select_complain->enquiry_timestamp; ?></li>
        <li class="<?php if(@$select_complain->enquiry_show==1) { echo "active1"; } ?>">Show <br> <?php echo @$select_complain->show_date; ?></li>

        <li class="active1">Processing <br> <?php echo @$select_complain->processing_date; ?></li>

        <li class="active1">Complete <br> Expected Complete Date : <?php echo @$select_complain->commit_date; ?></li>

      </ul>

    <?php } else { ?>
       <ul class="timeline">
        <li class="active">Complain <br> <?php echo @$select_complain->enquiry_timestamp; ?></li>
        <li class="<?php if(@$select_complain->enquiry_show==1) { echo "active"; } ?>">Show <br> <?php echo @$select_complain->show_date; ?></li>

        <li class="<?php if($select_complain->enquiry_status==1 || $select_complain->enquiry_status==2) { echo "active"; } ?>">Processing <br> <?php echo @$select_complain->processing_date; ?></li>

        <li class="<?php if($select_complain->enquiry_status==2) { echo "active"; } ?>">Complete <br> Expected Complete Date : <?php echo @$select_complain->commit_date; ?></li>

      </ul>
    <?php } ?>
    </div>
</div>

<div class="clearfix"></div>   
<div class="col-xs-12">
    <h4>Complain Full Details:</h4>
</div>
<div class="clearfix"></div>
<div class="col-md-6 col-sm-6 p-0">
    <div class="col-sm-6 col-xs-4 p-1 m-1 text-right">
        <span>Complain ID :</span>
    </div>
    <div class="col-sm-6 col-xs-8 p-1 m-1">
        <span><?php echo @$select_complain->product_enquiry_id; ?></span>
    </div>
</div>

<div class="col-md-6 col-sm-6 p-0">
    <div class="col-sm-6 col-xs-4 p-1 m-1 text-right">
        <span>Complain Date And Time :</span>
    </div>
    <div class="col-sm-6 col-xs-8 p-1 m-1">
        <span><?php echo @$select_complain->enquiry_timestamp; ?></span>
    </div>
</div>
<div class="col-md-6 col-sm-6 p-0">
    <div class="col-sm-6 col-xs-4 p-1 m-1 text-right">
        <span>Complain By :</span>
    </div>
    <div class="col-sm-6 col-xs-8 p-1 m-1">
        <span><?php echo @$select_complain->user_name; ?></span>
    </div>
</div>

<div class="col-md-6 col-sm-6 p-0">
    <div class="col-sm-6 col-xs-4 p-1 m-1 text-right">
        <span>Complain On Property :</span>
    </div>
    <div class="col-sm-6 col-xs-8 p-1 m-1 text-uppercase">
        <span><?php echo @$select_complain->kya; ?></span>
    </div>
</div>

<div class="col-md-6 col-sm-6 p-0">
    <div class="col-sm-6 col-xs-4 p-1 m-1 text-right">
        <span>Problem:</span>
    </div>
    <div class="col-sm-6 col-xs-8 p-1 m-1 text-uppercase">
        <span><?php echo @$select_complain->product_issue; ?></span>
    </div>
</div>


<div class="col-md-6 col-sm-6 p-0">
    <div class="col-sm-6 col-xs-4 p-1 m-1 text-right">
        <span>Status :</span>
    </div>
    <div class="col-sm-6 col-xs-8 p-1 m-1">
      <?php if($select_complain->enquiry_status==0) { ?>
        <span class="label label-warning">Pending</span>
      <?php } ?>

      <?php if($select_complain->enquiry_status==1) { ?>
        <span class="label label-info">Processing</span>
      <?php } ?>

       <?php if($select_complain->enquiry_status==2) { ?>
        <span class="label label-success">Completed</span>
      <?php } ?>

      <?php if($select_complain->enquiry_status==3) { ?>
        <span class="label label-danger">Cancel</span>
      <?php } ?>
    </div>
</div>

<?php if(!empty($select_complain->commit_date)) { ?>
<div class="col-md-6 col-sm-6 p-0">
    <div class="col-sm-6 col-xs-4 p-1 m-1 text-right">
        <span>Expected Completed Date :</span>
    </div>
    <div class="col-sm-6 col-xs-8 p-1 m-1 text-uppercase">
        <span><?php echo @$select_complain->commit_date; ?></span>
    </div>
</div>
<?php } ?>

<div class="clearfix"></div>
<!-- row close -->
</div>
<hr noshade="noshade"/>

<?php if($_SESSION['logtype']=="Access Property" || $_SESSION['logtype']=="Super Admin") { ?>
<div class="col-xs-12">
    <h4>Acceptor :</h4>
</div>
<div class="clearfix"></div>

<form method="post" action="<?php echo base_url(); ?>PropertyController/scomplain/<?php echo @$select_complain->product_enquiry_id;  ?>">
  
  <?php if(empty($select_complain->commit_date)) { ?>
<div class="col-md-6 col-sm-6 p-0">
    <div class="col-sm-6 col-xs-4 p-1 m-1 text-right">

        <span> Expected Completed Date </span>
    </div>
    <div class="col-sm-6 col-xs-8 p-1 m-1">
        <span><input type="text"  class="form-control datepicker" required id="date_selected" name="cdate" placeholder="Select Date">  </span>
    </div>
</div>
<?php } ?>
<div class="col-md-6 col-sm-6 p-0">
    <div class="col-sm-6 col-xs-4 p-1 m-1 text-right">
        <select class="form-control" name="status">
          <option <?php if($select_complain->enquiry_status==0) { echo "selected"; } ?> value="0">Pending</option>
          <option <?php if($select_complain->enquiry_status==1) { echo "selected"; } ?>  value="1">Processing</option>
          <option <?php if($select_complain->enquiry_status==2) { echo "selected"; } ?>  value="2">Completed</option>
          <option <?php if($select_complain->enquiry_status==3) { echo "selected"; } ?>  value="3">Cancel</option>
        </select>
    </div>
    <div class="col-sm-6 col-xs-8 p-1 m-1">
       <input type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary" />
    </div>
</div>
</form>

<?php } ?>
<div class="clearfix"></div>
<hr noshade="noshade"/>
 <div class="col-md-12">
                 <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title">Direct Chat</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">

                  <?php foreach($conversion as $c) { 

                      if($c->sender_name!=$_SESSION['user_name'])
                      {
                   ?>
                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left"><?php echo $c->sender_name; ?></span>
                      <span class="direct-chat-timestamp float-right"><?php echo $c->msg_timestamp; ?></span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      <?php echo $c->comment; ?>
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->
                <?php } else { ?>
                  <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right"><?php echo $c->sender_name; ?></span>
                      <span class="direct-chat-timestamp float-left"><?php echo $c->msg_timestamp; ?></span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <?php if(!empty($_SESSION['user_image'])) { ?>
                    <img class="direct-chat-img" src="<?php echo base_url(); ?>dist/img/<?php echo $_SESSION['user_image']; ?>" alt="message user image">
                  <?php } else { ?>
                   <img class="direct-chat-img" src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" alt="message user image">
                  <?php } ?>

                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      <?php echo $c->comment; ?>
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->
                  <?php } } ?>
                

                </div>
                <!--/.direct-chat-messages-->

               
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="<?php echo base_url(); ?>PropertyController/scomplain/<?php echo $select_complain->product_enquiry_id; ?>" method="post">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." style="width: 100%" class="form-control">
                    <span class="input-group-append">
                      <input type="submit" name="send" class="btn btn-primary" value="Send">
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
            </div>
 
</div>


           

            </div>
    </div>
    </div>
    

                     
                     
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
  
 
   
    
<!-- /.content-wrapper -->
<footer class="main-footer">
<strong>Copyright©2018 Red & White Multimedia.</strong> All rights reserved.
</footer>

 
  <div class="control-sidebar-bg"></div>
</div>
<script src="<?php echo base_url(); ?>assetslogin/vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="<?php echo base_url(); ?>assetslogin/js/main.js"></script>



<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<!-- DataTables -->
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

function goBack() {
  window.history.back();
}



 //Timepicker
    $('.timepicker').timepicker({
      showInputs: false,
     defaultTime: false
    })
    
    
//Date picker
    $('.datepicker').datepicker({
      autoclose: true,
        todayHighlight: true,
    format:"yyyy-mm-dd"
    })
    
     


$(function () {
                $('#datetimepicker1').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm:ss'
                });
            });
            
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
</body>
</html>
