



    





 

 <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- DataTables -->

  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css"> -->

  <!-- Theme style -->

  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins

       folder instead of downloading all of them to reduce the load. -->

  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">

  <!---------datepicker-------->

 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />



  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />



  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0/css/bootstrap-datepicker.css" rel="stylesheet" />





  

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





<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

   GoogleForm        

      </h1>

      

  

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i>Home</a></li>

        <li class="active">Google-Form</li>

      </ol>

    </section>



    <!-- Main content -->

    <section class="content">      

     

     <div class="row">

       

          <div class="col-md-6">

              <!-- general form elements -->

             

             <div class="box box-primary" style="padding:20px;">

            <div class="box-header with-border" style="margin-bottom:10px;">

              <h3 class="box-title">GoogleForm</h3>

            </div>

           

        

         <form class="login100-form validate-form" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>GoogleFormController/googleform">

             <input type="hidden" name="update_id" value="<?php if(!empty($select_googleform->id)) { echo $select_googleform->id; } ?>"/>

                                            

                                                                    

                                           <!--  <div class="form-group" >

                                            <label for="pwd">Email :</label>

                                           <input class="form-control"   value="<?php if(!empty($select_googleform->email)) { echo $select_googleform->email; } ?>"  type="email"  name="email" placeholder="Enter Email" required>

                                          </div> -->



                                          

                                          <div class="form-group">

                                          <label for="email">Branch Name :</label>

                                          <select required  name="branch_id" id="branch" class="form-control">

                                                  <option value="">Select Branch</option>

                                                    <?php foreach($branch_all as $val) { ?>

                                                      <option <?php if($val->branch_id==@$select_googleform->branch_id) { echo "selected"; } ?>   value="<?php echo $val->branch_id; ?>"><?php echo $val->branch_name; ?></option>

                                                    <?php } ?>

                                                </select>

                                          </div>



                                            <div class="form-group">

                                            <label for="email">EmployeCode:</label>

                                            <select required  name="faculty_id" id="faculty" class="form-control">

                                                  <option>Select Faculty</option>



                                                </select>

                                          </div>





                                           <div class="form-group" >

                                            <label for="pwd">GR_Id :</label>

                                           <input class="form-control"  value="<?php if(!empty($select_googleform->gr_id)) { echo $select_googleform->gr_id; } ?>"  type="text"  name="gr_id" placeholder="Enter GR_Id." required>

                                          </div>

                                        

                                        <div class="form-group">

                                          <label for="email">Query Hading :</label>

                                          <select required  name="queryhading_id" class="form-control">

                                                  <option value="">Select QueryHading</option>

                                                    <?php foreach($queryhading_all as $val) { ?>

                                                      <option <?php if($val->queryhading_id==@$select_googleform->queryhading_id) { echo "selected"; } ?>   value="<?php echo $val->queryhading_id; ?>"><?php echo $val->queryhading_name; ?></option>

                                                    <?php } ?>

                                                </select>

                                          </div>

                      

                                          <div class="form-group">

                                          <label for="email">Query Priority :</label><br>

                                            <input type="radio"  name="querypriority" value="High" <?php echo (@$select_googleform->querypriority == 'High'? 'checked' : '') ?> >High</input><br>

                                            <input type="radio"  name="querypriority" value="Medium" <?php echo (@$select_googleform->querypriority == 'Medium'? 'checked' : '') ?>>Medium</input><br>

                                            <input type="radio"  name="querypriority" value="Normal"<?php echo (@$select_googleform->querypriority == 'Normal'? 'checked' : '') ?>>Normal</input><br>

                                              

                                        </div>

                                 

                                    

                                          <div class="form-group">

                                          <label for="email">Remark Label :</label>

                                          <select required  name="remarklabel_id" class="form-control">

                                                  <option value="">Select RemarkLabel</option>

                                                    <?php foreach($remarklabel_all as $val) { ?>

                                                      <option <?php if($val->remarklabel_id==@$select_googleform->remarklabel_id) { echo "selected"; } ?>   value="<?php echo $val->remarklabel_id; ?>"><?php echo $val->remarklabel_name; ?></option>

                                                    <?php } ?>

                                                </select>

                                          </div>



                                          <div class="form-group" > <label

                                          for="pwd">Remark :</label> <input class="form-control"  value="<?php

                                          if(!empty($select_googleform->remark)) { echo $select_googleform->remark; }

                                          ?>"  type="text"  name="remark" placeholder="Enter Remark" required> 

                                        </div>



                                          <input type="submit" name="submit" value="submit" class="btn btn-primary" />



                                          </div> 

                                        </form>  

                                      </div>

<?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Manager") { ?>

      <div class="row">

        <div class="col-md-12" >

          <!-- general form elements -->

          <div class="box box-primary" style="padding:20px;">

            <div class="box-header with-border">

              <b><h3 class="box-title">Display GoogleForm </h3></b>

             <div class="box-header with-border" style="margin-bottom:10px;">

                          <h3 class="box-title">Filter</h3>

                        </div>

                        <div class="dropdown pull-right" >

                            <button class="btn btn-sm btn-success active dropdown-toggle" type="button" data-toggle="dropdown">Download-xlSeat

                            <span class="caret"></span></button>

                            <ul class="dropdown-menu">

                             

                              <li><a onclick="createExcel()">Download Google Form Data xl Seat</a></li>

                              

                              <form method="post" id="frm_data" action="<?php  echo base_url();?>GoogleFormController/download_excel">

                                <input type="hidden" id="tb_data" name="data">  

                                </form>

                             </ul>                 

                          </div>

             <form method="post" action="<?php echo base_url(); ?>GoogleFormController/googleform">

            <div class="row">  

            <div class="col-sm-3" >  

            <select  class="form-control"  name="filter_branch" id="branch">

            <option value="">Select Branch</option>

            <?php foreach($branch_all as $row) { ?>                      

           <option <?php if(@$filter_branch==$row->branch_id) { echo "selected"; } ?>  value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>                    

            <?php  }  ?>

           </select>

           </div>

            <div class="col-sm-3">  

            <select  class="form-control" name="filter_facultiy">

            <option value="">Select employes</option>

            <?php foreach($faculty_all as $row) { ?>                      

           <option <?php if(@$filter_facultiy==$row->faculty_id) { echo "selected"; } ?>  value="<?php echo $row->faculty_id; ?>"><?php echo $row->name; ?></option>                    

            <?php  }  ?>

           </select>

           </div>

            <div class="col-sm-3">  

            <select  class="form-control" name="filter_remark_label">

            <option value="">Select Remark lebal</option>

            <?php foreach($remarklabel_all as $row) { ?>                      

           <option <?php if(@$filter_remark_label==$row->remarklabel_id) { echo "selected"; } ?>  value="<?php echo $row->remarklabel_id; ?>"><?php echo $row->remarklabel_name; ?></option>                    

            <?php  }  ?>

           </select>

           </div><br><br>

                  <div class="col-sm-3" id="datepicker1">

                    <input class="form-control" value="<?php if(!empty($filter_srating_date)) { echo $filter_srating_date; } ?>"  id="" name="Date_Time" placeholder="Starting Date">

                  </div>



                   <div class="col-sm-3" id="datepicker2">

                    <input class="form-control"  value="<?php if(!empty($filter_ending_date)) { echo $filter_ending_date; } ?>"  id="" name="Date_Time" placeholder="Ending Date">

                  </div>

                  

                      <div class="col-sm-3" >

                     <input type="submit" value="Filter" class="btn btn-success" name="search"/>

                    

      

                    <a  href="<?php echo base_url(); ?>GoogleFormController/googleform" class="btn btn-danger">Reset</a>

                    </div>

                  </div>

                       

          </form>

            

            <br>

            <!-- /.box-header -->

              <div  id="google_xl"> 

                <div class="table-responsive">

              <table id="example1" class="table table-responsive table-bordered table-striped example1">

                <thead>

                <tr>

                  <?php for($num=0; $num<1; $num++) ?>

                  <th>NO</th>

                  <th>GR_Id</th>

                  <th>Query-Hading</th>

                  <th>Query-Priority</th>

                  <th>Remark-Label</th>

                  <th>Remark</th>

                  <th>EmployeCode</th>

                  <th>Date-Time</th>

                  <th>Branch-Name</th>

                 <!--  <th>Email</th> -->

                 <?php if($_SESSION['logtype']=="Super Admin") { ?>

                  <td>Action</td>

                <?php } ?>

                </tr>

                </thead>

                <tbody>

                <?php foreach($googleform_all as $val) { ?>

                <tr>

                  <td><?php echo $num++; ?></td>

                    <!-- <td><?php echo $val->email; ?></td> -->

                   <td><?php echo $val->gr_id; ?></td>

                    <td><?php $branch_ids = explode(",",$val->queryhading_id);

                        foreach($queryhading_all as $row) { if(in_array($row->queryhading_id,$branch_ids)) {  echo $row->queryhading_name."<br>"; }  } ?></td>

                        <td><?php echo $val->querypriority; ?></td>

                        <td><?php $branch_ids = explode(",",$val->remarklabel_id);

                        foreach($remarklabel_all as $row) { if(in_array($row->remarklabel_id,$branch_ids)) {  echo $row->remarklabel_name."<br>"; }  } ?></td>

                        <td><?php echo $val->remark; ?></td>

                        <td><?php $branch_ids = explode(",",$val->faculty_id);

                        foreach($faculty_all as $row) { if(in_array($row->faculty_id,$branch_ids)) {  echo $row->name."<br>"; }  } ?></td>

                        <td><?php echo $val->Date_Time ?></td>

                  <td><?php $branch_ids = explode(",",$val->branch_id);

                        foreach($branch_all as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo $row->branch_name."<br>"; }  } ?></td>

                        <?php if($_SESSION['logtype']=="Super Admin") { ?>

                            <td>

                           <div class="dropdown">

                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action

                            <span class="caret"></span></button>

                            <?php if($_SESSION['logtype']=="Super Admin") { ?>

                            <ul class="dropdown-menu">

                              <li><a href="<?php echo base_url(); ?>GoogleFormController/googleform?action=edit&id=<?php echo @$val->id; ?>"> Edit</a></li>

                             

                              <li ><a href="<?php echo base_url(); ?>GoogleFormController/googleform?action=delete&id=<?php echo @$val->id; ?>">Delete</a></li>

                            </ul>

                             <?php } ?>

                          </div>

                      

                  </td>

                 <?php } ?>

                  

                </tr>

                

             <?php } ?>

                

                </tfoot>

              </tbody>

            </table>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>

</section>

</div>



  <footer class="main-footer">

    

    <strong>Copyright©2018 Red & White Multimedia.</strong> All rights

    reserved.

  </footer>

<?php } ?>



 



<script src="<?php echo base_url(); ?>assetslogin/vendor/jquery/jquery-3.2.1.min.js"></script>

  <script src="<?php echo base_url(); ?>assetslogin/js/main.js"></script>







<!-- ./wrapper -->



<!-- jQuery 3 -->

<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->

<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- DataTables -->

<script src="<?php echo base_url(); ?>bower_components/datatables.net/js/jquery.dataTables.js"></script>

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

<!-----datepicker--->

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0/js/bootstrap-datepicker.js"></script>



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->



<script>

  $(function () {

    $('#example1').DataTable()

    $('#example2').DataTable({

      'paging'      : true,

      'lengthChange': true,

      'searching'   : true,

      'ordering'    : true,

      'info'        : true,

      'autoWidth'   : false

    })

  })







</script>



<script type="text/javascript">

$( '#datepicker1' ).datepicker({

  format: "mm : dd : yyyy",

  todayHighlight: true,

  autoclose: true,

  container: '#box1',

  orientation: 'top right'

});



$( '#datepicker2' ).datepicker({

  format: 'mm \\ dd \\ yyyy',

  todayHighlight: true,

  autoclose: true,

  container: '#box2',

  orientation: 'top right'

});

</script>



<script>

  $(document).ready(function(){

 $('#branch').change(function(){

 console.log("heloo");

  var branch_ids = $('#branch').val();

  if(branch_ids !='')

  {

   $.ajax({

    url:"<?php echo base_url(); ?>GoogleFormController/fetch_faculty",

    method:"POST",

    data:{branch_ids:branch_ids},

    success:function(data)

    {

     $('#faculty').html(data);

    // $('#seat_course').html('<option value="">Select Seat Course</option>');

    }

   });

  }

  else

  {

    $('#faculty').html('<option value="">Select employes</option>');

  // $('#seat_course').html('<option value="">Select Seat Course</option>');

  }

});

});

</script>

<script>

function createExcel()

{

    

            var excel_data = $('#google_xl').html();  

            $('#tb_data').val(excel_data);

           $('#frm_data').submit();

    

}

</script>

</body>

</html>







