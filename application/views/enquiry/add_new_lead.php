<?php @$user_permission =  explode(",",@$_SESSION['user_permission']);
        @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);?>

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
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<style type="text/css">
*   {outline:none;}
body,h1,h2,h3,h4,h5,h6,p,span,strong,em,ul,ol,li,a,button,input,select,option,textarea   {font-family: 'Poppins', sans-serif;}
.content-wrapper    {font-family: 'Poppins', sans-serif;}
.content-wrapper    {height:100%;}
.content h3     {margin-top:0; font-family: 'Poppins', sans-serif;}
.right  {text-align:right;}
label   {font-weight:normal; margin-bottom:0; line-height:30px;}
hr  {height:1px; opacity:0.5; margin:10px 0;}
textarea    {resize:none; padding:5px 25px; border-radius:70px; border:1px solid #dddddd; height:70px;}
.p-0    {padding: 0;}
.p-1    {padding:0 7px;}
.m-1    {margin:10px 0;}
.w-100  {width:100%;}
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
@media (max-width:991px)
{
.right {text-align:left;}
.w-100 {width:50%;}
.content {padding-left:50px;}
.m-1 {margin:5px 0;}
}
</style>
  
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
<section class="content-header">
    <h1><?php if(!empty($selectdata)) { echo "Edit Lead";  } else { echo "Add New Lead"; }  ?></h1>
    
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>Enquiry/leads_list">Leads List</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>Enquiry/leads_list"> Add New Lead</a></li>
    </ol>
</section>
<!-- Main content -->

<section class="content">
    <?php if(!empty($msg)) { ?>
     	            <div class="col-md-8" >
     	        
     	        <div style="padding:2px 5px 2px 5px" class="box yellow bg-green"><?php echo $msg; ?></div>
     	    </div>
     	    <?php } ?>
<div class="row">
    <form method="post" action="<?php echo base_url(); ?>Enquiry/newLead">
        <input type="hidden" value="<?php if(!empty($selectdata->lead_id)) { echo $selectdata->lead_id; } ?>" name="update_id"/>
<div class="col-lg-10 col-xs-12">

<div class="row">
<div class="col-md-6 p-0">
    <?php @$name = explode(" ",@$selectdata->lead_name); ?>
    <div class="col-md-5 m-1 p-1 right">
        <label>First Name:*</label>
    </div>
    <div class="col-md-7 m-1 p-1">
        <input type="text" class="w-100" value="<?php echo @$name[0]; ?>" name="fname" placeholder="First Name" />
    </div>
</div>
<div class="col-md-6 p-0">
    <div class="col-md-5 m-1 p-1 right">
        <label>Last Name:*</label>
    </div>
    <div class="col-md-7 m-1 p-1">
        <input type="text" class="w-100" name="lname" value="<?php echo @$name[1]; ?>" placeholder="Last Name" />
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6 p-0">
    <div class="col-md-5 m-1 p-1 right">
        <label>Date:*</label>
    </div>
    <div class="col-md-7 m-1 p-1">
        <input type="text" value="<?php if(!empty($selectdata->lead_date)) { echo $selectdata->lead_date; } else { echo date('Y-m-d'); } ?>" name="lead_date" class="w-100 datepicker" required placeholder="dd/mm/yyyy" />
    </div>
</div>
<div class="col-md-6 p-0">
    <div class="col-md-5 m-1 p-1 right">
        <label>Source</label>
    </div>
    <div class="col-md-7 m-1 p-1">
        <select class="w-100 select2" required name="lead_source">
            <option>Select Source</option>
            <?php foreach($all_source as $val) { if($val->source_status=="0" || $val->source_status=="2") { ?>
            <option <?php if(@$selectdata->lead_source==$val->source_name) { echo "selected"; } ?> value="<?php echo $val->source_name; ?>"><?php echo $val->source_name; ?></option>
            <?php } } ?>
        </select>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6 p-0">
    <div class="col-md-5 m-1 p-1 right">
        <label>Email:</label>
    </div>
    <div class="col-md-7 m-1 p-1">
        <input type="text" value="<?php if(!empty($selectdata->lead_email)) { echo $selectdata->lead_email; } ?>" class="w-100" name="lead_email" />
    </div>
</div>
<div class="col-md-6 p-0">
    <div class="col-md-5 m-1 p-1 right">
        <label>OR Mobile No:</label>
    </div>
    <div class="col-md-7 m-1 p-1">
        <input type="text" class="w-100" name="lead_number" value="<?php if(!empty($selectdata->lead_number)) { echo $selectdata->lead_number; } ?>" />
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6 p-0">
    <div class="col-md-5 m-1 p-1 right">
        <label>Branch:*</label>
    </div>
    <div class="col-md-7 m-1 p-1">
        <select class="w-100 select2" required name="lead_branch">
            <option>Select Branch</option>
            <?php foreach($all_branch as $val) { if($val->branch_status=="0") { 
            if(in_array($val->branch_id,$branch_ids) || $_SESSION['logtype']=="Super Admin") { ?>
            <option <?php if(@$selectdata->lead_branch==$val->branch_id) { echo "selected"; } ?> value="<?php echo $val->branch_id; ?>"><?php echo $val->branch_name; ?></option>
            <?php } } } ?>
        </select>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6 p-0">
    <div class="col-md-5 m-1 p-1 right">
        <label>Course:*</label>
    </div>
    <div class="col-md-7 m-1 p-1">
        <select class="w-100 select2" name="lead_course_id">
            <option>Select Course</option>
             <?php foreach($all_course as $val) { if($val->status=="0") { ?>
            <option <?php if(@$selectdata->lead_course_id==$val->course_id) { echo "selected"; } ?> value="<?php echo $val->course_id; ?>"><?php echo $val->course_name; ?></option>
            <?php } } ?>
        </select>
    </div>
</div>
<div class="col-md-6 p-0">
    <div class="col-md-5 m-1 p-1 right">
        <label>Course Package:</label>
    </div>
    <div class="col-md-7 m-1 p-1">
        <select class="w-100 select2" name="lead_package_id">
            <option>Select</option>
            <?php foreach($all_package as $val) { if($val->status=="0") { ?>
            <option <?php if(@$selectdata->lead_package_id==$val->package_id) { echo "selected"; } ?> value="<?php echo $val->package_id; ?>"><?php echo $val->package_name; ?></option>
            <?php } } ?>
        </select>
    </div>
</div>
</div>

<hr noshade="noshade"/>
<?php @$address = explode(", ",@$selectdata->lead_address); ?>
<div class="row">
<div class="col-md-6 p-0">
    <div class="col-md-5 m-1 p-1 right">
        <label>Country:</label>
    </div>
    <div class="col-md-7 m-1 p-1">
        <select class="w-100 select2" name="country">
            <option value="">Select Country</option>
            <?php foreach($all_country as $val) { ?>
            <option <?php if(@$address[2]==$val->country_name) { echo "selected"; } else if($val->country_name=="India") { echo "selected"; } ?> value="<?php echo $val->country_name; ?>"><?php echo $val->country_name; ?></option>
            <?php }  ?>
        </select>
    </div>
</div>
<div class="col-md-6 p-0">
    <div class="col-md-5 m-1 p-1 right">
        <label>State:</label>
    </div>
    <div class="col-md-7 m-1 p-1">
        <select class="w-100 select2" name="state">
            <option value="">Select State</option>
            <?php foreach($all_state as $val) { ?>
            <option <?php if(@$address[1]==$val->state_name) { echo "selected"; } else if($val->state_name=="Gujarat") { echo "selected"; } ?> value="<?php echo $val->state_name; ?>"><?php echo $val->state_name; ?></option>
            <?php }  ?>
        </select>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6 p-0">
    <div class="col-md-5 m-1 p-1 right">
        <label>City:</label>
    </div>
    <div class="col-md-7 m-1 p-1">
        <input type="text" class="w-100" value="<?php echo @$address[0]; ?>" name="city"  value="Surat" placeholder="City"/>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6 p-0">
    <div class="col-md-5 m-1 p-1 right">
        <label>Reffered By Name:</label>
    </div>
    <div class="col-md-7 m-1 p-1">
        <input type="text" class="w-100" value="<?php if(!empty($selectdata->lead_refferedName)) { echo $selectdata->lead_refferedName; } ?>" name="lead_refferedName" placeholder="Reffered By Name"/>
    </div>
</div>
<div class="col-md-6 p-0">
    <div class="col-md-5 m-1 p-1 right">
        <label>Reffered By Mobile No:</label>
    </div>
    <div class="col-md-7 m-1 p-1">
        <input type="text" class="w-100" value="<?php if(!empty($selectdata->lead_refferedMobile)) { echo $selectdata->lead_refferedMobile; } ?>" name="lead_refferedMobile" placeholder="Reffered By Mobile Number"/>
    </div>
</div>
</div>

<hr noshade="noshade"/>

<div class="row">
    <div class="col-md-3 m-1 p-1 right">
        <label>Comments:* </label>
    </div>
    <div class="col-md-9 m-1 p-1">
        <textarea class="w-100" name="lead_message"><?php if(!empty($selectdata->lead_message)) { echo $selectdata->lead_message; } ?></textarea>
    </div>
</div>

<hr noshade="noshade"/>

<div class="row">
<div class="col-xs-12 text-right">
    <input class="btn btn-success" type="submit" name="submit" value="Save">
    <a class="btn btn-success" href="<?php echo base_url(); ?>Enquiry/leads_list">Back</a>
</div>
</div>

</div>
</form>
</div>
</section>
<!-- /.content -->
</div>
 
<!-- /.content-wrapper -->
  
 
	 
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright©2018 Red & White Multimedia.</strong> All rights reserved.
</footer>

</div>



<script src="<?php echo base_url(); ?>assetslogin/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>assetslogin/js/main.js"></script>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url(); ?>bower_components/select2/dist/js/select2.full.min.js"></script>

<script src="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
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


<script>
//Initialize Select2 Elements
    $('.select2').select2()
    
//Date picker
    $('.datepicker').datepicker({
      autoclose: true,
        todayHighlight: true,
	  format:"yyyy-mm-dd"
    })
    
    
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
