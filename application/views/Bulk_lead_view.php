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
  
  
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/themes/fontawesome-stars.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/themes/bars-reversed.min.css" rel="stylesheet">
  
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
              <h3 class="box-title">Bulk Lead Details</h3>
            </div>
<div class="col-lg-12 text-right">
        
<div class="btn-group">
    <a href="#">
        <a href="<?php echo base_url(); ?>Bulk_LeadController/Bulk_lead" class="btn btn-sm btn-inverse">Back</a>
    </a>
</div>
</div>

<div class="clearfix"></div>

<div class="clearfix"></div>
<div class="table-responsive">
    
<table class="table color-table primary-table table-striped">
<thead>
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Father Name</th>
    <th>Contect NO</th>
    <th>Father Contect NO</th>
    <th>Source Type</th>
    <th>School & Collage</th>
    <th>Occupation</th>
    <th>Intersting Field</th>
    <th>Area</th>
    <th>Priority</th>
    <th>Address</th>
    <th>Other Remark</th>
</tr>
</thead>

<tbody>
    <?php foreach($select_followup as $row) { ?>
<tr>
    <td><?php echo $row->name; ?></td>
    <td><?php echo $row->email; ?></td>
    <td><?php echo $row->father_name; ?></td>
    <td><?php echo $row->contact_no; ?></td>
    <td><?php echo $row->father_contact_no; ?></td>
    <td><?php echo $row->source_type; ?></td>
    <td><?php echo $row->school_collage; ?></td>
    <td><?php echo $row->occupation; ?></td>
    <td><?php echo $row->intersting_field; ?></td>
    <td><?php echo $row->area; ?></td>
    <td>
                    
                 <span class="fa fa-star <?php if($row->intresting_rating>=1) { echo "checked"; } ?>"></span>
                <span class="fa fa-star <?php if($row->intresting_rating>=2) { echo "checked"; } ?>"></span>
                <span class="fa fa-star <?php if($row->intresting_rating>=3) { echo "checked"; } ?>"></span>
                 <br>
        
        <?php echo $row->priority; ?></td>
     <td><?php echo $row->address ; ?></td>
    <td><?php echo $row->other_remark; ?></td>
    <!-- Modal -->

</tr>
<?php } ?>
</tbody>
</table>
</div>

<!-- row close -->
</div>

</div>
            </div>
    </div>
    </div>
    
    
    <div class="col-md-12">
                        <div class="container" id="showtime">
                                 
                                  <!-- Modal -->
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