 
  
        

		
        

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Set Time</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <?php  



      if(@$_SESSION['user_name']=="Pradip Malaviya") { ?>

      <div class="col-md-12" id="filter_section">
          <div class="box box-primary" style="padding:20px;">
            <div class="box-header with-border" style="margin-bottom:10px;">
              <h3 class="box-title">Filter</h3>
            </div>
            <div class="row">
            <form method="post" action="<?php echo base_url(); ?>Settings/aspectedtime">
              <div class="col-md-2 my-2">
                <label><b>Faculty Name</b></label>
                  <select name="filter_name" class="form-control">
                    <option value="">--select Faculty--</option>
                    <?php foreach($upd_faculty as $uf) { ?>
                      <option value="<?php echo $uf->name; ?>" <?php if($uf->name ==  @$_SESSION['user_name_store']) { echo "selected"; }?>><?php echo $uf->name; ?></option>
                    <?php } ?>
                  </select>     
             </div>

              <div class="col-sm-2 my-2 float-left" style="margin-top: 24px;">
             <input type="submit" class="btn btn-success" value="Filter" name="search"/>
              <a   href="<?php echo base_url(); ?>FormController/viewall_company_detail?status=<?php echo $this->input->get('status'); ?>"class="btn btn-danger" style="color:#FFF">Reset</a>
              </div>    
             </form>      
             </div>
          </div>
        </div>

 <?php } ?>

     	<div class="row">
        	 <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary" >
                        <div class="box-header with-border" >
                          <h3 class="box-title">Add Expected demo time</h3>
                        </div>
                        
                        <div class="container" style="padding-top:20px;">
                            <?php $checkTime = explode("|&|",$select_faculty->checkTime); ?>
                          <form action="<?php echo base_url(); ?>settings/settime" method="post">
                              <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Time</th>
                                <th></th>
                                <th>Note</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php foreach($all_time as $val) {
                                
                                for($i=0;$i<sizeof($checkTime);$i++)
                                {
                                    $check = explode("/",$checkTime[$i]);
                                    if($check[0]==$val->time_id)
                                    {
                                        if($check[1]=="1")
                                        {
                                            $st ="1";
                                        }
                                        else if($check[1]=="2")
                                        {
                                            $st ="2";
                                        }
                                        else if($check[1]=="0")
                                        {
                                            $st ="0";
                                        }
                                        $note = @$check[2];
                                    }
                                }
                                
                                ?>
                              <tr>
                                <td><?php echo $val->stime; ?> To <?php echo $val->etime; ?></td>
                                <td>    
                                
                              		<label class="radio-inline" style="margin-left:30px;">
                                      <input type="radio" <?php if(@$st=="1") { echo "checked";  } ?> value="<?php echo $val->time_id ?>/1" name="gettime<?php echo $val->time_id ?>">Full Free
                                    </label>
                                    <label class="radio-inline" style="margin-left:30px;">
                                      <input type="radio" <?php if(@$st=="2") { echo "checked";  } ?> value="<?php echo $val->time_id ?>/2" name="gettime<?php echo $val->time_id ?>">Half Free
                                    </label>
                                    <label class="radio-inline" style="margin-left:30px;">
                                      <input type="radio" <?php if(@$st=="0") { echo "checked";  } ?> value="<?php echo $val->time_id ?>/0" name="gettime<?php echo $val->time_id ?>">Not Free
                                    </label>
                                </td>
                                <td><input type="text" id="getnote<?php echo $val->time_id ?>" value="<?php if(!empty($note)) { echo $note; } ?>" class="form-control" name="getnote<?php echo $val->time_id ?>"></td>
                              </tr>
                              
                              <?php } ?>
                              
                              <tr>
                                <td colspan="2">
                                	<input type="submit" name="submit" value="Save" class="btn btn-success pull-right"> 
                                </td>
                                <td></td>
                              </tr>
                            </tbody>
                          </table>
                          </div>
                          
                          </form>
                        </div>

                    
                   </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
        <!-- Control Sidebar -->
  
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
<!-- InputMask -->
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url(); ?>plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false,
	   defaultTime: false
    })
  })
</script>
</body>
</html>