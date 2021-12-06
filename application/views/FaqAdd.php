  


    
    
    
    
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

 .modal-header{
      background: #3c8dbc;
    }
    .modal-title{
      color: white;
    }
    .col-md-2{
      float: right;
      margin-right: 59%;
    }  
   
  </style>
  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
    FAQ Questions AND Answer        
      </h1>
      <div style="margin-left: 300px; margin-top: -38px;">
      <a href="<?php echo base_url() ?>FaqController/FaqView" class="btn btn-danger">FAQView</a>
    </div>
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
            <form method="post" action="<?php echo base_url(); ?>FaqController/FaqAdd" style="padding-bottom:20px; padding-top:20px;"> 
              <input type="hidden" name="update_id" value="<?php if(!empty($Select_Faq->id)) { echo $Select_Faq->id; } ?>"/>
              <!-- <div class="row">
             <div class="col-md-3" style="margin-left: 1.3%;">
              <label>Add Category</label>
              <input type="text" name="category"> 
              </div> 
              </div> 
             <br> -->


             <div id="GSCCModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;  </button>
        <h4 class="modal-title" id="myModalLabel">FAQ-Category</h4>
      </div>
      <div class="modal-body">
        
             <form method="post" action="<?php echo base_url(); ?>FaqController/FaqAdd" style="padding-bottom:20px; padding-top:20px;">

              
           <div style="margin-left: 1.6%;">
            <label><b>FAQ-Category<b></label><br>
            <input type="text" name="category"  size="42"><br><br> 
                <input type="submit" name="save" value="submit" class="btn btn-primary">                        
            </div>
            <br>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div><br> 
             <div class="col-md-2">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#GSCCModal">Add</button>
            </div>
             <div class="row">
             <div class="col-md-3" style="margin-top:18 px;">
                                   
            <select class="form-control" name="faqcat_id">
            <option value="">FaQCategory</option>
            <?php
             foreach ($all_faqcategory as $row)
              {
                echo '<option value="'.$row->faqcat_id.'">'.$row->category.'</option>';
             }
             ?>                     
             </select>
              </div> 
              <br>  
              <br>  
              <br>
              <br>  
            
                  <div class="row">
                  <div class="col-md-3" style="margin-left: 1.2%;">
                  <label>Add-Question</label>                 
                <textarea rows = "4" cols = "50" name = "question" required></textarea>                      
               </div>
              </div>
            
               <div class="col-md-3" style="margin-top:15px;">
                  <label>Add-Answer</label>                 
                <textarea rows = "4" cols = "50" name = "answer" required></textarea><br>                
              <input type = "submit" value = "submit" name="submit" class="btn btn-success" />
                                      
              </div>
              </div>                   
             </div>
             <br>    
              
            <div style="margin-left: 1.3%;">
            <div class="row">
            <div class="col-md-3">
            <label>FILE UPLODE</label>     
            <input type="file"  class="form-control"  name="fileToUpload"><br>
            <input type="submit"  value="save" name="submit" class="btn btn-success">
            </div>
            </div>
            </div><br>

                  <div style="margin-left: 2.1%;">
                    <label>Video</label><br>
                    <a href="#">Vsit</a>
                  </div>
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


<script>

//session automatic  
    $(document).ready(function(){
        var submenu = sessionStorage.getItem("submenu");
         var leadsubmenu = sessionStorage.getItem("leadsubmenu");
           $('#sub_menu_'+submenu).addClass('show');
           $('#lead_submenu_'+leadsubmenu).addClass('show');
    });

    function getClick(id,subid){
      sessionStorage.setItem("submenu", id);
      sessionStorage.setItem("leadsubmenu", subid);
    }

    function hideMenu(id,subid){
      $("#sub_menu_"+id).removeClass('show');
      $("#lead_submenu_"+subid).removeClass('show');
    }
//end session of sidebar menu open 



</script>