

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
<!-- AdminLTE Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">

<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">

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
padding: 0 5px;
}
.select2-container--default .select2-selection--multiple {
line-height: 20px;
}
.select2-container--default .select2-selection--multiple .select2-selection__rendered li {
list-style: none;
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
STAFF

</h1>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>

<li class="active">Branch</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<?php if(!empty($msg)) { ?>
<div class="col-md-12" >

<div id="yellow" style="padding:2px 5px 2px 5px" class="box yellow bg-green"><?php echo $msg; ?></div>
</div>
<?php } ?>
<div class="row">
<div class="col-md-12">
<!-- general form elements -->
<div class="box box-primary" style="padding:20px;">
<div class="box-header with-border" style="margin-bottom:10px;">
  <h3 class="box-title">ADD STAFF</h3>
</div>



<form  method="post" action="<?php echo base_url(); ?>settings/staff" id="filterForm"> 
    <div class="row" style="padding:10px">
 <div class="col-md-6" >
              <input type="hidden" name="update_id" value="<?php if(!empty($select_faculty->faculty_id)) { echo $select_faculty->faculty_id; } ?>"/>
                
               
<?php if($_SESSION['logtype'] == "Super Admin"){ ?>
<div class="form-group row">
<label class="col-md-2">Admin</label>
<div class="col-md-9">
    <select  class="form-control" name="admin_id"  id="admin" >
          <option value="">Select Admin</option>
            <?php foreach($user_all as $val) { if($val->status==0 && $val->logtype == "Admin") { ?>

              <option <?php if($val->user_id==@$select_faculty->admin_id) { echo "selected"; } ?>   value="<?php echo $val->user_id; ?>" ><?php echo $val->name; ?></option>
            <?php } } ?>
        </select>
  </div>
</div>
<div class="form-group row">
<label class="col-md-2">Branch</label>
<div class="col-md-9">
  <select class="select2 form-control" name="b_ids[]" id="branch_id" multiple="multiple">
   <option>Select Branch</option>
  <?php $branch_ids = explode(",",$select_faculty->branch_ids);   
   foreach($branch_all as $row) {  ?> 
  <option <?php if(in_array($row->branch_id,$branch_ids)) { echo "selected"; } ?>
   value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>
  <?php } ?>   
  </select>
</div>
</div>
  <?php }else{ ?>

<div class="form-group row">
<label class="col-md-2">Branch</label>
<div class="col-md-9">
<select class="select2 form-control" name="b_ids[]" id="b_id" multiple="multiple">
<option>Select Branch</option>
<?php $branch_ids = explode(",",$select_faculty->branch_ids);   
foreach($branch_all as $row) {  ?> 
<option <?php if(in_array($row->branch_id,$branch_ids)) { echo "selected"; } ?>
value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>
<?php } ?>   
</select>
</div>
</div>
  <?php } ?>
                    
<div class="form-group row">
<label class="col-md-2">Department</label>
<div class="col-md-9">
    <select class="select2 form-control" name="depart_ids[]" id="department" multiple="multiple">
       <option>Select Department</option>
      <?php $departids = explode(",",$select_faculty->department_id);   
       foreach($department_all as $row) {  ?> 
    <option <?php if(in_array($row->department_id,$departids)) { echo "selected"; } ?>
     value="<?php echo $row->department_id; ?>"><?php echo $row->department_name; ?></option>
  <?php } ?>
</select>
</div>
</div>
 

 <div class="form-group row">
<label class="col-md-2">Sub Department</label>
<div class="col-md-9">
    <select class="select2 form-control" name="subdepart_ids[]" id="subdepartment" multiple="multiple">
       <option>Select SubDepartment</option>
       <?php $subdepartids = explode(",",$select_faculty->subdepartment_id);
       foreach($subdepartment_all as $row) {  ?> 
    <option <?php if(in_array($row->subdepartment_id,$subdepartids)) { echo "selected"; } ?>
     value="<?php echo $row->subdepartment_id; ?>"><?php echo $row->subdepartment_name; ?></option>
  <?php } ?>
</select>
</div>
</div>

<div class="form-group row">
<label class="col-md-2">Hod</label>
<div class="col-md-9">
    <select  class="form-control" name="hod_id"  id="hod_id" >
          <option value="">Select Hod</option>
            <?php foreach($hod_all as $val) { if($val->status==0) { ?>

              <option <?php if($val->hod_id==@$select_faculty->hod_ids) { echo "selected"; } ?>   value="<?php echo $val->hod_id; ?>" ><?php echo $val->name; ?></option>
            <?php } } ?>
        </select>
  </div>
</div>
       
<div class="form-group" >
<label for="pwd">Name:</label>
<input class="form-control"  value="<?php if(!empty($select_faculty->name)) { echo $select_faculty->name; } ?>"  type="text"  name="name" placeholder="Enter Name" required>
</div>

<div class="form-group" >
<label for="pwd">Phone:</label>
<input class="form-control"  value="<?php if(!empty($select_faculty->phone)) { echo $select_faculty->phone; } ?>"  type="text"  name="phone" placeholder="Enter Phone No." required>
</div>

<div class="form-group" >
<label for="pwd">Email Id:</label>
<input class="form-control"   value="<?php if(!empty($select_faculty->email)) { echo $select_faculty->email; } ?>"  type="email"  name="email" placeholder="Enter Email" required>
</div>

<div class="form-group" >
<label for="pwd">Password :</label>
<input type="password" class="form-control"  value="<?php if(!empty($select_faculty->password)) { echo $select_faculty->password; } ?>"  type="text"  name="password" placeholder="Enter password" required>
</div>

<?php if(!empty($select_faculty->branch_ids)){
$brans = explode(",",$select_faculty->branch_ids);

} ?>

</div>
<div class="col-md-6" >

<div class="form-group"  id="permission_all">

<label for="pwd">Permission :-</label>

<br><br>
<?php if(isset($_GET['id']) && !empty($_GET['id'])){ ?>

<?php foreach ($f_module as $key => $value) { 
if(in_array($value->f_module_name,explode(",",  $select_logtype->f_permission))){ ?>
<h3><?php echo $value->f_module_name; ?><input type="checkbox" name="fp[]" value="<?php echo $value->f_module_name; ?>" <?php if(isset($select_faculty->f_permission) && in_array($value->f_module_name, explode(",",$select_faculty->f_permission))){echo "checked";} ?>></h3>
<?php foreach($m_module as $m){ 
if($m->f_module_id == $value->f_module_id){
if(in_array($m->module_name,explode(",",  $select_logtype->m_permission))){ 
?>
<label for="pwd"><?php echo $m->module_name; ?> <input type="checkbox" name="m_all[]" value="<?php echo $m->module_name; ?>"<?php if(isset($select_faculty->m_permission) && in_array($m->module_name, explode(",",$select_faculty->m_permission))){echo "checked";} ?>>:</label>
<br>
<?php foreach($l_module as $k=> $l){ 
if($l->m_module_id == $m->m_module_id){

if(in_array($l->name,explode(",",  $select_logtype->permission))){ 
?> 
<label style="width:30%;font-weight: normal;"><?php echo $l->name; ?> </label> 
<label class="radio-inline">
<input type="checkbox" name="f_all[]"  value="<?php echo $l->name ;?>" <?php if(isset($select_faculty->permission) && in_array($l->name, explode(",",$select_faculty->permission))){echo "checked";} ?>>Yes
</label>

<br>
<?php } } } } } } } } ?>  



<?php }else{ ?>

<?php foreach ($f_module as $key => $value) { if(in_array($value->f_module_name,explode(",",  $select_logtype->f_permission))){ ?>
<h3><?php echo $value->f_module_name; ?><input type="checkbox" name="fp[]" value="<?php echo $value->f_module_name; ?>" <?php if(isset($select_logtype->f_permission) && in_array($value->f_module_name, explode(",",$select_logtype->f_permission))){echo "checked";} ?>></h3>
<?php foreach($m_module as $m){ 
if($m->f_module_id == $value->f_module_id){
if(in_array($m->module_name,explode(",",  $select_logtype->m_permission))){ 
?>
<label for="pwd"><?php echo $m->module_name; ?> <input type="checkbox" name="m_all[]" value="<?php echo $m->module_name; ?>"<?php if(isset($select_logtype->m_permission) && in_array($m->module_name, explode(",",$select_logtype->m_permission))){echo "checked";} ?>>:</label>
<br>
<?php foreach($l_module as $k=> $l){ 
if($l->m_module_id == $m->m_module_id){
if(in_array($l->name,explode(",",  $select_logtype->permission))){ 
?> 
<label style="width:30%;font-weight: normal;"><?php echo $l->name; ?> </label> 
<label class="radio-inline">
<input type="checkbox" name="f_all[]"  value="<?php echo $l->name ;?>" <?php if(isset($select_logtype->permission) && in_array($l->name, explode(",",$select_logtype->permission))){echo "checked";} ?>>Yes
</label>

<br>
<?php } } } } } } } } ?>   


<?php } ?>
   
        
 </div>
</div> 
<div class="col-md-12" >
	
	<input type="submit" name="submit" value="Save" class="btn btn-primary pull-right" />
</div>
</div>



</form>
</div>

</div>
</div>
<div class="row">
<div class="col-md-12" >
<!-- general form elements -->
<div class="box box-success" style="padding:20px;">
<div class="box-header with-border">
<h3 class="box-title">Display STAFF</h3>
</div>
<!-- /.box-header -->

<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>

<th>Details</th>
<th>Branch</th>
<th>Admin</th>
<th>Subject</th>
<th>Status</th>
<th>action</th>
</tr>
</thead>
<tbody>
<?php foreach($faculty_all as $val) { ?>
<tr>
<td>
<?php echo "<b>Name : </b>".$val->name;  ?> <br> 
<?php  echo "<b>Email : </b>".$val->email; ?>  <br> 
<?php  echo "<b>Phone : </b>".$val->phone; ?>  <br>
<?php $branch_ids = explode(",",$val->department_id);
foreach($department_all as $row) { if(in_array($row->department_id,$branch_ids)) {  echo "<b>Department : </b>" .$row->department_name; }  } ?> <br>
<?php $branch_ids = explode(",",$val->subdepartment_id);
foreach($subdepartment_all as $row) { if(in_array($row->subdepartment_id,$branch_ids)) {  echo "<b>Sub Department : </b>" .$row->subdepartment_name; }  } ?> <br>
<?php  echo "Last Seen : ".$val->timestamp; ?>
</td>
<td><?php $branch_ids = explode(",",$val->branch_ids);
foreach($branch_all as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo $row->branch_name."<br>"; }  } ?></td>
</td>
<td> <?php $branch_ids = explode(",",$val->admin_id);
foreach($user_all as $row) { if(in_array($row->user_id,$branch_ids)) {  echo $row->name; }  } ?></td>
<td><button type="button" onclick="viewCourse(<?php echo $val->faculty_id;  ?>)" class="btn btn-info btn-sm" >View</button></td>
<td>

<?php if($val->status == 0){ ?>
        <a href="#">Active</a>
        <?php }else { ?>
        <a href="#">Deactive</a>
        <?php } ?>
</td>
<td>
<?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype'] == "Admin") {  ?>
<a href="<?php echo base_url(); ?>settings/staff?action=delete&id=<?php echo @$val->faculty_id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></a>
<?php } ?>
<a href="<?php echo base_url(); ?>settings/staff?action=edit&id=<?php echo @$val->faculty_id; ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
<?php if($val->status == 0){ ?>
        <a href="<?php echo base_url(); ?>settings/staff?action=change_s&id=<?php echo @$val->faculty_id; ?>&status=0" class="btn btn-xs btn-warning"><i class="fa fa-user"></i></a>
        <?php }else { ?>
        <a href="<?php echo base_url(); ?>settings/staff?action=change_s&id=<?php echo @$val->faculty_id; ?>&status=1" class="btn btn-xs btn-danger"><i class="fa fa-user" ></i></a>
        <?php } ?>
</td>
</tr>

<?php  } ?>

</tfoot>
</table>


</div>

</div>
</div>

<div class="col-ms-12">
<div id="viewc"></div>

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
<script>
  $(document).ready(function(){
 
    $('#branch_id').change(function(){
 
  var branch_id = $('#branch_id').val();
  //var course_id = $('#course_orsingle').val();
 // var branch_id =  $('#branch_id').val();
 
   $.ajax({
    url:"<?php echo base_url(); ?>settings/filter_department_wise",
    method:"POST",
    data:{ 'branch_id' : branch_id },
    success:function(data)
    {
     $('#department').html(data);
 
    }
   });
 });


 $('#b_id').change(function(){
 
  var branch_id = $('#b_id').val();
  //var course_id = $('#course_orsingle').val();
 // var branch_id =  $('#branch_id').val();
 
   $.ajax({
    url:"<?php echo base_url(); ?>settings/fetch_admin_wise_department",
    method:"POST",
    data:{ 'branch_id' : branch_id },
    success:function(data)
    {
     $('#department').html(data);
 
    }


   });
 });

 $('#department').change(function(){
 
  var department_id = $('#department').val();
  // alert(department_id);
 
   $.ajax({
    url:"<?php echo base_url(); ?>settings/filter_subdepartment_wise",
    method:"POST",
    data:{
      'department_id' : department_id},
    success:function(data)
    {
     $('#subdepartment').html(data);
 
    }
   });
 });

 $('#subdepartment').change(function(){
 
  var subdepartment_id = $('#subdepartment').val();
  // alert(department_id);
 
   $.ajax({
    url:"<?php echo base_url(); ?>settings/filter_subdepartment_wise_hod",
    method:"POST",
    data:{
      'subdepartment_id' : subdepartment_id},
    success:function(data)
    {
     $('#hod_id').html(data);
 
    }
   });
 });
  });
</script>

<script>
function viewCourse(id)
{

$.ajax({
url:"<?php echo base_url(); ?>settings/view_course_faculty",
type:"post",
data:{
'faculty_id':id

},
success: function(data) {
$('#viewc').html(data);
$('#myModal_course').modal('show');
}

});
}


</script>

<script>
$(function () {
$('#example1').DataTable()
$('#example5').DataTable()
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
$(document).ready(function(){
$('#admin').change(function(){
// alert();
var d = $(this).val();
/*console.log("called");
console.log($('#filterForm').serialize());*/
// alert($('#filterForm').serialize());
$.ajax({
type:'POST',
data:{

'id':d
},
url:"<?php echo base_url(); ?>settings/admin_Wise_branchFetch",
success:function(data){
$('#branch').html(data);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
$('.filterCheck').change(function(){
/*console.log("called");
console.log($('#filterForm').serialize());*/
// alert($('#filterForm').serialize());
$.ajax({
type:'POST',
data:$('#filterForm').serialize(),
url:"<?php echo base_url(); ?>settings/fetch_depart_alll",
success:function(data){
$('#department').html(data);
}
});
});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
$('.tt').change(function(){
alert();
/*console.log("called");
console.log($('#filterForm').serialize());*/
// alert($('#filterForm').serialize());
// $.ajax({
//   type:'POST',
//   data:$('#filterForm').serialize(),
//   url:"<?php //echo base_url(); ?>settings/fetch_subdepart_alll",
//   success:function(data){
//     $('#subdepartment').html(data);
//   }
// });
});
});
</script>
</body>
</html>
