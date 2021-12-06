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
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<style type="text/css">
*   {outline:none;}
body,h1,h2,h3,h4,h5,h6,p,span,strong,em,ul,ol,li,a,button,input,select,option,textarea   {font-family: 'Poppins', sans-serif;}
.content-wrapper    {font-family: 'Poppins', sans-serif;}
.content-wrapper    {height:100%;}
.content h3     {margin-top:0; font-family: 'Poppins', sans-serif;}
.right  {text-align:right;}
label   {font-weight:normal; margin-bottom:0; line-height:30px;}
hr  {height:1px; opacity:0.5;}
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
 
@media (max-width:767px)
{
}

@media (max-width:991px)
{
.right  {text-align:left;}
.w-100  {width:50%;}
.content    {}
}
</style>
  
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="height:auto; min-height:100%;">
      
<!-- Main content -->
<section class="content" style="height:auto; min-height:100%;">
<div class="row">
    
     <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary" style="padding:20px;">
            <div class="box-header with-border" >
              <h3 class="box-title">New Enquiry - Enter Candidate Email or Mobile Number</h3>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Enquiry/newEnquiry">
            <div class="row" style="margin-top:20px">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="radio" style="font-size: 12px;">Email*
                                <input type="radio" name="enquiry_option" id="email_check" value="email">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-8">
								<input class="form-control" placeholder="ex: demo@gmail.com" id="input_email" name="email"  value="">
						</div>
                    </div>                    
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="radio" style="font-size: 12px;">Mobile Number*
                                <input type="radio" name="enquiry_option" id="number_check" checked value="number">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-8">
								<input class="form-control" placeholder="ex: 9400000000" required id="input_number" name="mobile"  value="">
						</div>
                    </div>                    
                </div>
                <div class="col-md-12" style="margin-top:20px;">
                    <div class="form-actions text-right">
					<button type="submit" class="btn btn-primary" name="submit" value="Proceed"> Proceed</button>
					<a href="<?php echo base_url(); ?>Enquiry/newEnquiry">
				<button type="button" class="btn btn-inverse" value="Back">Back</button></a>
							</div>
				</div>
              </div>
            </form>
           
          </div>
        
     </div>
    

</div>
</section>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->
  
<div class="clearfix"></div> 
	 
    
<!-- /.content-wrapper -->
<footer class="main-footer">
<strong>Copyright©2018 Red & White Multimedia.</strong> All rights reserved.
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
$(document).ready(function(){
  $("#input_email").focus(function(){
    $("#email_check").prop("checked", true);
    document.getElementById("input_email").required= true;
    document.getElementById("input_number").required= false;
  });
});

$(document).ready(function(){
  $("#input_number").focus(function(){
    $("#number_check").prop("checked", true);
    document.getElementById("input_email").required= false;
    document.getElementById("input_number").required= true;
  });
});
</script>
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
</body>
</html>
