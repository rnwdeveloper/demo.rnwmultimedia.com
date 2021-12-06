
    
    
    
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

input[type=text] {
    width: 253px;
    /*padding: 5px;
    margin: 5px 0;*/
    box-sizing: border-box;

}

#autoSuggestionsList > li {
    background: none repeat scroll 0 0 #F3F3F3;
    border-bottom: 1px solid #E3E3E3;
    list-style: none outside none;
    padding: 3px 15px 3px 15px;
    text-align: left;
}

#autoSuggestionsList > li a { color: #800000; }

.auto_list {
    border: 1px solid #E3E3E3;
    border-radius: 5px 5px 5px 5px;
    position: absolute;
}

     
  </style>

  
  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
   <h1>
    Hardware Show Data        
   </h1>
   <?php if($_SESSION['logtype']=="Super Admin") { ?> 
    <div style="margin-left: 820px; margin-top: -52px;">
      <a href="<?php echo base_url() ?>HardwareController/HardwareForm" class="btn btn-danger">HardwareInsert</a>
    </div>
    <?php } ?>
    <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">Hardware</li>
      </ol>
       
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-md-12" >
          <!-- general form elements -->
         
            <!-- /.box-header -->
     <form method="post"  action="<?php echo base_url('HardwareController/HardwareForm'); ?>" style="padding-bottom:20px; padding-top:20px;">
                  
      <div class="row">
      <div class="col-md-3" style="margin-top:18 px;">
                                   
        
            <!-- <i class="fa fa-search"> </i> -->
            <div class="row">
            <div class="col-md-6">             
              <!-- <span class="input-group-addon">Search</span> -->              
                         
                 </div>
                 <div id=""></div>
              </div> 
              </div> 
      </form>
            <br style="display:inline-block;">
            <br>
                      

            <div class="row" id="se_all">
                 <div class="col-md-12" >
                    
                   <table id="example1" class="table table-bordered table-striped example10">
               <thead>
                <tr>
                    <th>No</th>                    
                    <th>Subject</th>
		    <th>HarwareCategory</th>
		    <th>Company</th>
                    <th>Description</th>
                    <th>Link</th>
                    <th>Action</th>    
                </tr>
                </thead>
                <?php for ($num=0; $num<1; $num++) ?>
                <?php foreach($hardware as $row) { ?>
                <tbody>
                  <tr>
                    <td><?php echo $num++ ?></td>                    
                    <td><?php echo $row->subject; ?></td>
	            <td><?php echo $row->category; ?></td>
		    <td><?php echo $row->company; ?></td>
                    <td><?php echo $row->description; ?></td>
                    <td><?php echo $row->link; ?></td>
                    
                    

                     <td> 
                       <?php if($_SESSION['logtype']=="Super Admin") { ?>
                     <a href="<?php echo base_url()?>HardwareController/HardwareForm?action=edit=<?php echo @$row->hardware_id; ?>" class="btn btn-primary btn_edit"><i class="fa fa-edit"></i></a>
                      <a href="<?php echo base_url().'/HardwareController/delete_fun/'.$row->hardware_id;?>" onclick="return confirm('Are you sure you want to delete this task?');" class="btn btn-danger btn_delete"><i class="fa fa-trash"></i></a>
                    <?php } ?>
                    </td>

                  </tr>
                </tbody>
                <?php }   ?>

              </table>                  
                 </div>
            </div>
           
    
   



<script src="<?php echo base_url(); ?>assetslogin/vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="<?php echo base_url(); ?>assetslogin/js/main.js"></script>


<script type="text/javascript">
   function search_data()
  {
    var key = $('#q').val();
    //alert(key);
    $.ajax({
        url:"<?php echo base_url(); ?>FaqController/search_data",
        type:'POST',
        data:{
          s_key:key
        },
        success:function(res)
        {
            $('#se_all').html(res);
        } 
    });
  }
  </script>

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





    
<script>
  $(function () {
    $('#example1').DataTable()
    $('.example10').DataTable()
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

<script>
 



  public function live_search(){
    if($this->input->post(null)){
       //put your search code here and just "echo" it out 
    }
    }
    $.ajax({
            url:'base_url('FaqController/cari_artikel')',
            type : 'POST',
            data : { 'q' : escape($("#q").val()) },
            success: function (data){
              //print_r($data);
                $("#result").html(data);
                allow = true;
            }
        });
</script>