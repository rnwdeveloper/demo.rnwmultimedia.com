

<?php 

  // foreach ($faq as $result) {
  //   $question=$result->question;
  //   $answer=$result->answer;
  // }
  // print_r($faq);
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">
  
  <style>
      .bg {
    background-image: url(..//images/interview_2.jpg);
    background-size: cover;
    background-position: center;
}
label {
 
    font-weight: bold;
}
.text-red {
    color: #ed1d25!important;
}
.shadow {
    box-shadow: 0 0 10px #ed1d25!important;
}
.bg-white {
    background-color: #fff !important;
}
.bg-grey {
    background-color: #eaeaea !important;
}
.footer-bg {
    background: rgb(27, 29, 38) !important;
}
.text-footer {
    color: #777;

 }
 .line{
  display-flex;
 }   
}



      
  </style>
  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
    FAQ Questions AND Answer        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">FAQ-Questions</li>
      </ol>
       
    </section>

    <!-- Main content -->
    <section class="content"> 
           
     
     <div class="row">
        <div class="col-md-12" >
          <!-- general form elements -->
         
            <!-- /.box-header -->
            <form method="post" action="<?php echo base_url(); ?>FaqController/Editfaq" style="padding-bottom:20px; padding-top:20px;"> 
            <div>
           
            <!-- <input type="text" name="id" value="<?php echo $faq->id ?>" class="col-md-3">                                   
            </div> --> 
             
              <br>  
              <br>  
              <br>  
           

                  <div class="row">
                  <div class="col-md-3" style="margin-left: 1.3%;">
                  <label>Add-Question</label>                 
                <textarea rows = "4" cols = "50" name = "question" value=""><?php echo $faq->question; ?></textarea>                      
               </div>
              </div>
            
               <div class="col-md-3" style="margin-top:15px;">
                  <label>Add-Answer</label>                 
                <textarea rows = "4" cols = "50" name = "answer" value=""><?php echo $faq->answer; ?></textarea><br><br>                
              <input type = "submit" value = "Update" name="update" class="btn btn-primary" />
                                      
              </div>
              </div>                   
             </div><br>    
              
            
      </form>
           
        
    
  <!-- /.content-wrapper -->
   

 

<script src="<?php echo base_url(); ?>assetslogin/vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="<?php echo base_url(); ?>assetslogin/js/main.js"></script>



<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
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







</body>
</html>
