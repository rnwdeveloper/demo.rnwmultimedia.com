

    

    <?php  @$branch_ids = explode(",",$_SESSION['branch_ids']); ?>

    

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

  

  

  

 <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 class="text-center">

           Student Applied on Job   

      </h1>

     <!--  <?php if($_SESSION['logtype']=="Super Admin") { ?> 

    <div style="margin-left: 320px; margin-top: -40px;">

      <a href="<?php echo base_url() ?>PropertyController/place" class="btn btn-success">PlaceType</a>

      <a href="<?php echo base_url() ?>PropertyController/producttype" class="btn btn-primary">productType</a>

      <a href="<?php echo base_url() ?>PropertyController/productlist" class="btn btn-warning">ProductList</a>

      <a href="<?php echo base_url() ?>PropertyController/addcomplain_new" class="btn btn-info">AddComplainNew</a>

    </div>

    <?php } ?> -->

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>

       

        <li class="active">Student Applied on Job</li>

      </ol>

    </section>



    <!-- Main content -->

    <section class="content">

       

       <div class="col-md-12" id="filter_section">

          <div class="box box-primary" style="padding:20px;">

            <div class="box-header with-border" style="margin-bottom:10px;">

              <h3 class="box-title">Filter</h3>

            </div>

                      <div class="row">

            <form method="post" action="<?php echo base_url(); ?>FormController/view_student_applied_jobs">

           

                

              <div class="col-md-2 my-2">

                <label><b>Company Name</b></label>

             <input type="text"  class="form-control" value="<?php if(!empty($filter_company)) { echo $filter_company; } ?>"  id="" name="filter_company" placeholder="Company Name">            

             </div>



             <div class="col-md-2 my-2">

                <label><b>Student Name</b></label>

             <input type="text"  class="form-control" value="<?php if(!empty($filter_fname)) { echo $filter_fname; } ?>"  id="" name="filter_fname" placeholder="Student Name">            

             </div>

                                  

             <div class="col-md-2 my-2">

                <label><b>Company Mobile No</b></label>

             <input type="text"  class="form-control" value="<?php if(!empty($filter_company_mobile_no)) { echo $filter_company_mobile_no; } ?>"  id="" name="filter_company_mobile_no" placeholder="+91-00000-00000">            

             </div>

                                                             

            <div class="col-md-2 my-2">

                <label><b>Student Mobile No</b></label>

             <input type="text"  class="form-control" value="<?php if(!empty($filter_mobile)) { echo $filter_mobile; } ?>"  id="" name="filter_mobile" placeholder="+91-00000-00000">            

             </div>



              <div class="col-md-2 my-2" >

              <label><b>GR No</b></label>  

             <input type="text"  class="form-control" value="<?php if(!empty($filter_gr_id)) { echo $filter_gr_id; } ?>"  id="" name="filter_gr_id" placeholder="Filter GR No " >

              </div>



              <div class="col-sm-2 my-2" style="margin-top: 24px;">

             <input type="submit" class="btn btn-success" value="Filter" name="filter_appliy_student"/>

              <a class="btn btn-danger" href="<?php echo base_url(); ?>FormController/view_student_applied_jobs">Reset</a>

              </div>    

             </form>      

             </div>        

          </div>

        </div>

     	    

		

        <div class="col-md-12" >

          <!-- general form elements -->

          <div class="box box-success" style="padding:20px;">

            <div class="box-header with-border">

              

            </div>

            <!-- /.box-header -->

             <?php if(@$this->session->flashdata('msg_alert')) { ?>

     	            <div class="col-md-8" >

     	        

     	        <div id="yellow" style="padding:2px 5px 2px 5px" class="box yellow bg-green"><?php echo $this->session->flashdata('msg_alert'); ?></div>

     	    </div>

     	    <?php } ?>

           <div class="row"> 

               <div class="col-md-12">

                   

              

             <div style="margin-top:50px;">

              <table  id="example1"  class="table table-bordered table-striped">

                <thead>

                  <tr>

                    <th>Application ID</th>

                    <th>GRID</th>

                    <th>Company Information</th>

                    <!-- <th>Company Address</th> -->

                    <!-- <th>Company No</th> -->

                    <th>Company URL</th>

                    <th>JOb Name</th>

                    <!-- <th>no of vacancy</th> -->

                    <th>student Information</th>

                    <!-- <th>Email</th> -->

                    <!-- <th>Skill</th> -->

                    <th>Resume</th>

                    <th>Response</th>

                   <th>Action</th>

                    

                    

                  </tr>

                </thead>

                <tbody>

                    <?php foreach($student_applied as $val) { 
                      if($val->student_id != '0'){

                        ?>



                  <tr>

                    <td><?php echo $val->application_id; ?></td>

                    <td><?php echo $val->gr_id; ?></td>

                    <td>

                       <span style="color:red" data-toggle="tooltip" data-placement="top" title="<?php echo $val->co_name; ?>"><?php echo substr($val->co_name,0,20)."..."; ?></span>

                        <br>

                         <a href="https://wa.me/<?php echo "91".$val->co_number; ?>" target="_blank"><img src="<?php echo base_url();?>assets/images/whatsapp1.png" width="20"></a>

                         <span style="color:violet" data-toggle="tooltip" data-placement="top" title="<?php echo $val->co_number; ?>"><?php echo $val->co_number; ?></span>

                        <br>

                        <span style="color:blue"data-toggle="tooltip" data-placement="top" title="<?php echo $val->co_address; ?>"><?php echo substr($val->co_address,0,20)."..."; ?></span>

                        <br>

                    </td>

                   <!--  <td><?php echo $val->company_address;  ?></td> -->

                     <!-- <td><?php echo $val->company_number;  ?></td> -->

                    <td><?php echo $val->url;  ?></td>

                    <td>

                       <span style="color:red"data-toggle="tooltip" data-placement="top" title="<?php echo $val->job_name; ?>"><?php echo substr($val->job_name,0,20)."..."; ?></span> (<?php echo $val->no_of_vacancy;  ?>)



                   

                    <td>

                        <span style="color:red"data-toggle="tooltip" data-placement="top" title="<?php echo $val->name; ?>"><?php echo substr($val->name,0,20)."..."; ?></span>

                        <br>

                        <span style="color:violet"data-toggle="tooltip" data-placement="top" title="<?php echo $val->email; ?>"><?php echo substr($val->email,0,20)."..."; ?></span>

                        <br>

                         <a href="https://wa.me/<?php echo "91".$val->number; ?>" target="_blank"><img src="<?php echo base_url();?>assets/images/whatsapp1.png" width="20"></a><span style="color:green"data-toggle="tooltip" data-placement="top" title="<?php echo $val->number; ?>"><?php echo substr($val->number,0,20)."..."; ?></span>

                        <br>

                        <span style="color:blue"data-toggle="tooltip" data-placement="top" title="<?php echo $val->skill; ?>"><?php echo substr($val->skill,0,20)."..."; ?></span>

                        <br>

                    </td>

                    <!-- <td><?php echo $val->email;  ?></td> -->

                    <!-- <td><?php echo $val->skill;  ?></td> -->

                    <td><a target="_blank" href="<?php echo base_url(); ?>FormController/resume?action=edit&id=<?php echo @$val->applied_id; ?>"><?php echo $val->resume; ?></a></td>

                    <td><span style="color:blue"data-toggle="tooltip" data-placement="top" title="<?php echo $val->response; ?>"><?php echo substr($val->response,0,20).'<i class="fa fa-reply" aria-hidden="true"></i>'; ?></span></td>  

                

                    

                

                      <td>

                      <?php if($val->status == '1') { ?>

                        <a class="btn  btn-success btn-sm" href="<?php echo base_url(); ?>FormController/active_recruiter_jobs/<?php echo $val->applied_id;  ?>/0">Active</a></td>

                    <?php } else { ?>



                        <a class="btn  btn-danger btn-sm" href="<?php echo base_url(); ?>FormController/active_recruiter_jobs/<?php echo $val->applied_id;  ?>/1">DeActive</a></td>



                    <?php } ?>

                    

                

                  </tr>

                  <?php } }  ?>

                </tbody>

              </table>

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

    

    <strong>Copyright©2018 Red & White Multimedia.</strong> All rights

    reserved.

  </footer>



 

</div>

<script src="<?php echo base_url(); ?>assetslogin/vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="<?php echo base_url(); ?>assetslogin/js/main.js"></script>







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



<script>

  function selectPlace()

  {

    var b_id = $('#branch_id').val();

    //alert(b_id);

    $.ajax({

      url:"<?php echo base_url(); ?>PropertyController/branchWisePlace",

      type:"post",

      data:{

        'branch_id':b_id

      },

      success : function(data){

        $('#place_box').html(data);

      

      }

    });

  }







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

//end session of sidebar menu open 





</script>



</body>

</html>



    

    

    

 