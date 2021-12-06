<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assetslogin/css/util.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assetslogin/css/main.css">



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

<style type="text/css">
.modal-header{
background-color: #3c8dbc;
}
.modal-title{
color: white;
font-size: 20px;
}
.th{
  font-size: 12px;
}
.td{
  font-size: 11px;
  color: black;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
Course Details        
</h1>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>

<li class="active">Details</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="col-md-12">
<!-- general form elements -->
<div class="box box-primary">
<div class="box-header with-border" style="margin-bottom:10px;">
<h3 class="box-title" style="margin-bottom:15px;">Single Course</h3>
<form class="form-inline" method="post" action="<?php echo base_url(); ?>welcome/courseDetails">
<div class="form-group">
<select class="form-control select2" name="filter_single_course" id="course" style="width: 500px;">
<option value="">Select Course</option>
<?php foreach($course_all as $val) { ?>
<option value="<?php echo $val->course_id; ?>" ><?php echo $val->course_name; ?></option>
<?php } ?>
</select>
</div>
<input type="submit" class="btn btn-success" name="filter_course" value="Filter">
<a class="btn btn-danger" href="<?php echo base_url(); ?>welcome/courseDetails">Reset</a>
</form>
</div>

<?php if(!empty($coursefilter)) { ?>
<table id="example1" class="table table-bordered table-striped example1">
<thead>
<tr class="th">
<th>Branch</th>
<th>Department</th>
<th>SubDepartment</th>
<th>Course</th>
<th>Fees & Installment </th>
<?php if($_SESSION['logtype']!="Access Document") { ?>
<th>Signing Sheet</th>
<?php } ?>
<th>Job Guarantee </th>
<th>RelevantCourse</th>
<th>CourseDetails</th>
</thead>
<tbody>
<?php foreach($coursefilter as $val) { ?>
<tr class="td">
<td>
  <?php $branch_ids = explode(",",$val->branch_id);   
        foreach($list_branch as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo "<br>".@$row->branch_name;}  } ?>
</td>
<td>
  <?php $department_ids = explode(",",$val->department_id);   
        foreach($department_all as $row) { if(in_array($row->department_id,$department_ids)) {  echo "<br>".@$row->department_name; }  } ?>
</td>
<td>
  <?php $subdepartment_ids = explode(",",$val->subdepart_ids);   
        foreach($subdepartment_all as $row) { if(in_array($row->subdepartment_id,$subdepartment_ids)) {  echo "<br>".@$row->subdepartment_name; }  } ?>
</td>
<td><?php echo "<br>".$val->course_name; ?></td>
<td><br><?php echo "Fees : ".$val->course_fees;  ?> <br> <?php  echo "Installment : ".$val->installment; ?> <br> <?php  echo "Duration : ".$val->course_duration; ?></td>

<?php if($_SESSION['logtype']!="Access Document") { ?>

<td><br><?php if(!empty($val->csigning_sheet)) { ?><a target="_blank" href="<?php echo base_url(); ?>dist/signsheet/<?php echo $val->csigning_sheet; ?>">Download</a> <?php  } ?></td>

<?php } ?>

<th><br><?php if($val->jobg=="1") { echo "Yes"; } else { echo "No"; }  ?></th>

<td><br><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $val->course_id;?>">RelevantCourse</button>
<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $val->course_id;  ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Course : <?php echo $val->course_name;  ?></h4>
</div>
<div class="modal-body">
<?php $pkgc = explode(",",$val->RelevantCourse_id); ?>


<table class="table">
<thead>
<tr>
<th>Branch</th>
<th>Department</th>
<th>Course</th>
<th>Fees & Installment </th>
<?php if($_SESSION['logtype']!="Access Document") { ?>
<th>Signing Sheet</th>
<?php } ?>
<th>Job Guarantee </th>
</tr>
</thead>
<tbody>

<?php 

foreach($course_all as $row) { 
// echo "<pre>";
// print_r($pkgc);
// die;

if(in_array($row->course_id,$pkgc)) {?>
<tr>
<td><?php echo $row->course_name; ?></td>
<td><?php echo "Fees : ".$row->course_fees;  ?> <br> <?php  echo "Installment : ".$row->installment; ?> <br> <?php  echo "Duration : ".$row->course_duration; ?></td>
<?php if($_SESSION['logtype']!="Access Document") { ?>
<td><?php if(!empty($val->csigning_sheet)) { ?><a target="_blank" href="<?php echo base_url(); ?>dist/signsheet/<?php echo $val->csigning_sheet; ?>">Download</a> <?php  } ?></td>
<?php } ?>
<th><?php if($val->jobg=="1") { echo "Yes"; } else { echo "No"; }  ?></th>
<td><?php foreach($department_all as $depart) { if($row->department_id==$depart->department_id) {  echo $depart->department_name; } } ?></td>
</tr>
<?php } } ?>
</tbody>
</tfoot>
</table>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div> 
</td>
<td><br><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dModal<?php echo $val->course_id;  ?>"><span class="glyphicon glyphicon-info-sign"></span></button>
<!-- Modal -->
<div class="modal fade" id="dModal<?php echo $val->course_id;  ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Course : <?php echo $val->course_name;  ?></h4>
</div>
<div class="modal-body">
<table class="table">
<thead>
<tr>
<th>Course Detail</th>
</tr>
</thead>
<tbody>
<tr>
<td><?php echo $val->course_detail ?></td>
</tr>
</tbody>
</tfoot>
</table>
<div class="modal-footer">
<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div> 
</td>
</tr>
<?php } ?>
</tbody>
</tfoot>
</table>
<?php } ?>

</div>

</div>
<div class="col-md-12" >
<!-- general form elements -->
<div class="box box-success">
<div class="box-header with-border" style="margin-bottom:10px;">
<h3 class="box-title" style="margin-bottom:15px;">Package</h3>
<form class="form-inline" method="post" action="<?php echo base_url(); ?>welcome/courseDetails">
<div class="form-group">
<select class="form-control select2" name="filter_package" id="course_p" style="width: 500px;">
<option value="">Select Package</option>
<?php foreach($package_all as $val) { ?>
<option  value="<?php echo $val->package_id; ?>"><?php echo $val->package_name; ?></option>
<?php } ?>
</select>
</div>
<input type="submit" class="btn btn-success" name="filter_package_course" value="Filter">
<a class="btn btn-danger" href="<?php echo base_url(); ?>welcome/courseDetails">Reset</a>
</form>
</div>
<?php if(!empty($packagefilter)) { ?>
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr class="th">
<th>Branch</th>
<th>Department</th>
<th>SubDepartment</th>
<th>Package Name</th>
<th>Fees & Installment </th>
<?php if($_SESSION['logtype']!="Access Document") { ?>
<th>Package Signing Sheet</th>
<?php } ?>
<th>Job Guarantee </th>
<th>Course</th>
<th>RelevantCourse</th>
<th>Package Details</th>
</tr>
</thead>
<tbody>
<?php foreach($packagefilter as $val) { 

// echo "<pre>";
// print_r($rid);
// die;
?>
<tr class="td">
<td>
  <?php $branch_ids = explode(",",$val->branch_id);   
        foreach($list_branch as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo "<br>".@$row->branch_name;}  } ?>
</td>
<td>
  <?php $department_ids = explode(",",$val->department_id);   
        foreach($department_all as $row) { if(in_array($row->department_id,$department_ids)) {  echo "<br>".@$row->department_name; }  } ?>

</td>
<td>
  <?php $subdepartment_ids = explode(",",$val->subdepart_ids);   
        foreach($subdepartment_all as $row) { if(in_array($row->subdepartment_id,$subdepartment_ids)) {  echo "<br>".@$row->subdepartment_name; }  } ?>
</td>
<td><?php echo "<br>".$val->package_name;  ?> <br> <?php  echo "Code : ".$val->package_code; ?></td>
<td><?php echo "<br>Fees : ".$val->package_fees;  ?> <br> <?php  echo "Installment : ".$val->installment; ?> <br> <?php  echo "Duration : ".$val->package_duration; ?></td>

<td><?php if(!empty($val->psigning_sheet)) { ?><a target="_blank" href="<?php echo base_url(); ?>dist/signsheet/<?php echo $val->psigning_sheet; ?>"><br>Download</a> <?php  } ?></td>

<td><?php if($val->jobg=="1") { echo "<br>"."Yes"; } else { echo "<br>"."No"; }  ?></td>

<td><br><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $val->package_id;  ?>">Course</button>
<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $val->package_id;  ?>" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Package : <?php echo $val->package_name;  ?></h4>
</div>
<div class="modal-body">
<?php $pkgc = explode(",",$val->course_ids); ?>
<table class="table">
<thead>
<tr>
<th>Course</th>
<th>Fees & Installment </th>
<?php if($_SESSION['logtype']!="Access Document") { ?>
<th>Signing Sheet</th>
<?php } ?>
<th>Job Guarantee </th>
<th>Department</th>
</tr>
</thead>
<tbody>
<?php 
foreach($course_all as $row) {
if(in_array($row->course_id,$pkgc)) {?>
<tr>
<td><?php echo $row->course_name; ?></td>
<td><?php echo "Fees : ".$row->course_fees;  ?> <br> <?php  echo "Installment : ".$row->installment; ?> <br> <?php  echo "Duration : ".$row->course_duration; ?></td>
<?php if($_SESSION['logtype']!="Access Document") { ?>
<td><?php if(!empty($val->csigning_sheet)) { ?><a target="_blank" href="<?php echo base_url(); ?>dist/signsheet/<?php echo $val->csigning_sheet; ?>">Download</a> <?php  } ?></td>
<?php } ?>
<th><?php if($val->jobg=="1") { echo "Yes"; } else { echo "No"; }  ?></th>
</tr>
<?php } } ?>
</tbody>
</tfoot>
</table>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div> 
</td>

<td><br><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reModal<?php echo $val->package_id;  ?>">RelevantCourse</button>
<!-- Modal -->
<div class="modal fade" id="reModal<?php echo $val->package_id;  ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Package : <?php echo $val->package_name;  ?></h4>
</div>
<div class="modal-body">
<?php $pkgc = explode(",",$val->RelevantCourse_id);
// echo "<pre>";
//  print_r($val);
//  die;
?>

<table class="table">
<thead>
<tr>

<th>Course_relevent</th>
<th>Fees & Installment </th>
<?php if($_SESSION['logtype']!="Access Document") { ?>
<th>Signing Sheet</th>
<?php } ?>
<th>Job Guarantee </th>
<th>Department</th>

</tr>
</thead>
<tbody>
<?php 

foreach($course_all as $row) {

if(in_array($row->course_id,$pkgc)) {?>

<tr>

<td><?php echo $row->course_name; ?></td>
<td><?php echo "Fees : ".$row->course_fees;  ?> <br> <?php  echo "Installment : ".$row->installment; ?> <br> <?php  echo "Duration : ".$row->course_duration; ?></td>

<?php if($_SESSION['logtype']!="Access Document") { ?>
<td><?php if(!empty($val->csigning_sheet)) { ?><a target="_blank" href="<?php echo base_url(); ?>dist/signsheet/<?php echo $val->csigning_sheet; ?>">Download</a> <?php  } ?></td>
<?php } ?>

<th><?php if($val->jobg=="1") { echo "Yes"; } else { echo "No"; }  ?></th>

<td><?php foreach($department_all as $depart) { if($row->department_id==$depart->department_id) {  echo $depart->department_name; } } ?></td>
</tr>

<?php } } ?>
</tbody>
</tfoot>
</table>


</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div> 
</td>
<td><br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pModal<?php echo $val->package_id;  ?>"><span class="glyphicon glyphicon-info-sign"></span></button>
<!-- Modal -->
<div class="modal fade" id="pModal<?php echo $val->package_id;  ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"> Package: <?php echo $val->package_name;  ?></h4>
</div>
<div class="modal-body">


<table class="table">
<thead>
<tr>
<th>Package Detail</th>
</tr>
</thead>
<tbody>

<tr>
<td><?php echo $val->package_detail ?></td>
</tr>
</tbody>
</tfoot>
</table>


</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div> 
</td>

<td><?php foreach($department_all as $depart) { if($val->department_id==$depart->department_id) {  echo $depart->department_name; } } ?> </td>

</tr>

<?php } ?>

</tfoot>
</table>
<?php } ?>

</div>

</div>
</section>

<!-- /.content -->
</div>
<!-- /.content-wrapper -->









<!-- /.content-wrapper -->
<footer class="main-footer">

<strong>Copyright©2018 Red & White Multimedia.</strong> All rights
reserved.
</footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>bower_components/select2/dist/js/select2.full.min.js"></script>
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

if (document.getElementById("yellow") != null) {
setTimeout(function() {
document.getElementById('yellow').style.display = 'none';
}, 5000);
}
</script>


<script>
//Initialize Select2 Elements
$('.select2').select2()

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
// $(document).ready(function(){
//   $('#department_c').click(function(){
//     alert();
//   }); 
// });
/////////////////////////-------old logic course and package--------////////////////////////////

$(document).ready(function(){
// $('#department_c').change(function(){

// var s_id = $('#department_c').val();
//   $.ajax({
//     type:'POST',
//     data:{s_id:s_id},
//     url:"<?php echo base_url(); ?>welcome/fetch_course_singledata",
//     success:function(data){
//       $('#course').html(data);
//     }
//   });
// });


//     $('#department_p').change(function(){

// var s_id = $('#department_p').val();
//   $.ajax({
//     type:'POST',
//     data:{s_id:s_id},
//     url:"<?php echo base_url(); ?>welcome/fetch_package_singledata",
//     success:function(data){
//       $('#course_p').html(data);
//     }
//   });
// });
////////////////////////////////////-----end-------//////////////////////////////////////////////
$('#branch_single_c').change(function(){
var b_id = $('#branch_single_c').val();
$.ajax({
type:'POST',
data:{b_id:b_id},
url:"<?php echo base_url(); ?>welcome/fetch_course_department",
success:function(data){
$('#department_single_c').html(data);
}
});
});

$('#department_single_c').change(function(){
var d_id = $('#department_single_c').val();
$.ajax({
type:'POST',
data:{d_id:d_id},
url:"<?php echo base_url(); ?>welcome/fetch_course_subdepartment",
success:function(data){
$('#subdepartment_single_c').html(data);
}
});
});

$('#subdepartment_single_c').change(function(){
var sd_id = $('#subdepartment_single_c').val();
$.ajax({
type:'POST',
data:{sd_id:sd_id},
url:"<?php echo base_url(); ?>welcome/fetch_course",
success:function(data){
$('#course').html(data);
}
});
});

$('#branch_id').change(function(){
var b_id = $('#branch_id').val();
$.ajax({
type:'POST',
data:{b_id:b_id},
url:"<?php echo base_url(); ?>welcome/fetch_pckage_department",
success:function(data){
$('#department').html(data);
}
});
});

$('#department').change(function(){
var d_id = $('#department').val();
$.ajax({
type:'POST',
data:{d_id:d_id},
url:"<?php echo base_url(); ?>welcome/fetch_package_subdepartment",
success:function(data){
$('#subdepartment').html(data);
}
});
});

$('#subdepartment').change(function(){
var sd_id = $('#subdepartment').val();
$.ajax({
type:'POST',
data:{sd_id:sd_id},
url:"<?php echo base_url(); ?>welcome/fetch_package_course",
success:function(data){
$('#course_p').html(data);
}
});
});     

});
</script>

</body>
</html>
