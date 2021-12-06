
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

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/themes/fontawesome-stars.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/themes/bars-reversed.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

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

 /*.modal-header{
      background: #3c8dbc;
    }
    .modal-title{
      color: white;
    }*/
    .col-md-2{
      float: right;
      margin-right: 59%;
    }   
  </style>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
   Admission Seat Assign       
      </h1>
      
  
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Admission-Seat-Assign</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">      

     <div class="row">
          <div class="col-md-6">

              <!-- general form elements -->
             
             <div class="box box-primary" style="padding:20px;">
            <div class="box-header with-border" style="margin-bottom:10px;">
              <h3 class="box-title">Admission Seat Assign</h3>
            </div>
        
        <?php if(isset($msg)){echo $msg;}?>
         <form class="login100-form validate-form" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>AddmissionController/seat_assign">
             <input type="hidden" name="update_id" value="<?php if(!empty($select_seat_assign->seat_id)) { echo $select_seat_assign->seat_id; } ?>"/>
                                            
                                                                    

                                          
                                          <div class="form-group">
                                          <label for="email">Branch Name:*</label>
                                          <select required  name="seat_branch_id" id="branch" class="form-control">
                                                  <option value="">Select Branch</option>
                                                    <?php foreach($seat_branch_all as $val) { ?>
                                                      <option <?php if($val->seat_branch_id==@$select_seat_assign->seat_branch_id) { echo "selected"; } ?>   value="<?php echo $val->seat_branch_id; ?>"><?php echo $val->seat_branch_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                          </div>

                                          <div class="form-group">
                                            <label for="email">Department:</label>
                                            <select required  name="department_ids" id="department" class="form-control" value="<?php if(!empty($select_seat_assign->department_id)) { echo $select_seat_assign->department_id; } ?>">
                                                  <option value="">Select Department</option>
                                                </select>
                                          </div>

                                            <div class="form-group">
                                            <label for="email">Select Corse:*</label>
                                            <select required  name="seat_course_id" id="seat_course" class="form-control" value="<?php if(!empty($select_seat_assign->seat_course_id)) { echo $select_seat_assign->seat_course_id; } ?>">
                                                  <option>Select Seat Course</option>
                                                </select>
                                          </div>


                                            <div class="form-group">
                                            <label for="exampleInputEmail1">No of Year:*</label>
                                            <input type="text" class="form-control"  name="no_of_year"  placeholder="Enter no of year" id="no_of_year">
                                          </div> 

                                          <div id="new">
                                           <label for="date">Year:*</label>
                                            <select required  name="seat_year[]" id="seat_year" class="form-control" value="<?php if(!empty($select_seat_assign->seat_year)) { echo $select_seat_assign->seat_year; } ?>">
                                                  <option>Select Seat Year</option>

                                                  <?php for($i=2000;$i<=3000;$i++){ ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                  <?php } ?>
                                                </select><br>
                                            
                                          
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">No of Seat:*</label>
                                            <input type="text" class="form-control"  name="seat_no[]" value="<?php if(!empty($select_seat_assign->seat_no)) { echo $select_seat_assign->seat_no; } ?>" placeholder="Enter Seat">
                                          </div>     

                                          </div>                         

                                          <input type="submit" name="submit" value="submit" class="btn btn-success"/>

                                          </div> 
                                        </form>  
                                      </div>

 <?php //echo "<pre>"; print_r($all_eduzilla_coutingseat); die(); 
      
  // foreach ($all_eduzilla_coutingseat as  $value) {

  //       if($value)
  //       {
  //        // $count++;
  //       }
  // } 

 //  echo "<pre>";
 //  print_r($count); 
 // die();
?>

<?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Manager") { ?>
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->

          <div class="box box-primary" style="padding:20px;">
              <b><h3 class="box-title">Display Seat Details</h3></b>
            <!-- /.box-header -->
               <div  id="googleform_table_exl">
                <div class="table-responsive">
              <table id="example1" class="table table-responsive table-bordered table-striped example1">
                <thead>
                <tr>
                  <th colspan="6" style="text-align: center;color: red;">COLLAGE</th>
                </tr>
                <tr>
                  <?php for($num=0; $num<1; $num++) ?>

                  <th>NO</th>
                  <th>Course</th>
                  <th>Seat Detail</th>   
                  <th>Add seat</th>              
                  <th>Action</th>               
                </tr>
                </thead>
                <tbody>
                <?php 

                // echo "<pre>";
                // print_r($seat_assign_all[0]->seat_branch_id);
                // die;
                foreach($seat_assign_all as $k=>$val) { 
                  if($val->department_name == "COLLEGE"){
                  ?>
                <tr>
                  <td><?php echo $num++; ?></td>
                    <!-- <td><?php echo $val->email; ?></td> -->
                   
                        <td><?php $seat_course_ids = explode(",",$val->seat_course_id);
                        foreach($seat_course_all as $row) { if(in_array($row->seat_course_id,$seat_course_ids)) {  echo $row->seat_course_name."<br>"; }  } ?></td>
     <td><button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal<?php echo $k; ?>">view seat detail</button>

                            <div class="modal fade" id="myModal<?php echo $k; ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Seat Details</h4>
        </div>
        <div class="modal-body">

                <div class="table-responsive">
          <table id="example1" class="table table-responsive table-bordered table-striped example1">
          <tr>
            <th style="color: red;text-align: center;" colspan="10"><?php echo $val->seat_branch_name."&nbsp;&nbsp;". $val->seat_course_name; ?></th>
          </tr>
            <tr>
              
              <!-- <th>Batch Name</th> -->
              <!-- <th>Batch Year</th> -->
              <th>Btach Code</th>
              <th>Total Seat</th>
              <th>Assign sheet</th>
              <th>Anasign sheet</th>
              <th>Total Book seat</th>
              <th>Final Book Sheet</th>
              <th>Cancle Seat</th>
              <th>Pandding Seat</th>
              <th>Action</th>
            </tr>

            <?php  foreach($seat_betch_all as $i=>$s){ 
               if($s->seat_id == $val->seat_id) {
              ?>
              <tr>
             <!--  <td><?php //echo $s->batch_name; ?></td> -->
             <!--  <td><?php //echo $s->batch_year; ?></td> -->
              <td><?php echo $s->batch_code; ?></td>
              <td><?php echo $s->seat_no; ?></td>
              <td><?php echo $s->assign_sheet; ?></td>
              <th><?php echo $s->seat_no-$s->assign_sheet; ?></th>
              <td><?php echo $s->total_done; ?></td>
              <th><?php echo $mm = $s->total_done-$s->total_cancle; ?></th>
              <th style="color: red;"><?php echo $s->total_cancle; ?></th>
              <th><?php echo $s->seat_no-$mm; ?></th>
              <th>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?php echo $i; ?>">
              <i class="fa fa-pencil"></i>
              </button>

                  <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                        <form method="post" action="<?php echo base_url(); ?>AddmissionController/month_seat_assign">
                      <div class="modal-body">
                        <input type="hidden" name="month_seat_batch_id" value="<?php echo $s->seat_batch_id; ?>">
                        <input type="hidden" name="month_seat_id" value="<?php echo $s->seat_id; ?>">
                            <select name="month_name">
                              <option value="-1">-------select month-----------</option>
                              <?php for($j=1;$j<=12;$j++){ ?>
                                  <option value="<?php echo $j; ?>"><?php echo date("F", mktime(0, 0, 0, $j, 10)); ?></option>
                              <?php  }?>
                            </select>

                            No of seat:
                            <input type="text" name="month_seat">

                      
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                        </form>
                    </div>
                  </div>
                </div>

                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#month<?php echo $i; ?>"><i class="fa fa-eye"></i></button>
                <div id="month<?php echo $i; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Monthly Seat Details</h4>
                        </div>
                        <div class="modal-body">

                         <table id="example1" class="table table-responsive table-bordered table-striped example1">
                          <tr>
                          
                            <td colspan="10" style="color: red;text-align: center;"><?php echo $s->batch_code; ?>&nbsp;&nbsp;<b>Assign Seat:(<?php echo $s->assign_sheet; ?>)</b></td>
                          
                           
                            <tr>
                              
                              <!-- <th>Batch Name</th> -->
                              <!-- <th>Batch Year</th> -->
                              
                              <th>Month</th>
                              <th>Total Seat</th>
                              <th>Total Book seat</th>
                              <th>Book Seat</th>
                              <th>Cancle Seat</th>
                              <th>Pandding Seat</th>
                              <th>Action</th>
                            </tr>

                            <?php  foreach ($s->month as $key => $value) { ?>  
                            <tr>
                                <td><?php echo date("F", mktime(0, 0, 0, $value->month_name, 10)); ?></td>
                                <td><?php echo $value->month_seat; ?></td>
                                <td><?php if(isset($value->total_month_seat)){echo $value->total_month_seat;} ?></td>
                                <th>
                                  <?php 
                                    $d=0;
                                    $p=0;
                                    if(isset($value->total_month_seat)){ $p=$value->total_month_seat;}
                                    $q=0;
                                    if(isset($value->total_month_cancle_seat)){ $q= $value->total_month_cancle_seat;}
                                    echo $d =$p-$q;
                                  ?>

                                </th>
                                <td style="color: red;"><?php if(isset($value->total_month_cancle_seat)){echo $value->total_month_cancle_seat;} ?></th>
                                <td><?php 

                                echo ($value->month_seat)-($d)  ?></th>
                                <td><?php if($value->status == 0){?>
                                <a href="<?php echo base_url(); ?>/AddmissionController/show_seat/<?php echo $value->seat_month_id; ?>/<?php echo $value->status; ?>">
                                <button type="button" class="btn btn-warning"><i class="fa fa-eye-slash"></i></button>
                                </a>
                                  <?php  }else{ ?>
                                    <a href="<?php echo base_url(); ?>/AddmissionController/show_seat/<?php echo $value->seat_month_id; ?>/<?php echo $value->status; ?>">
                                  <button type="button" class="btn btn-success"><i class="fa fa-eye"></i></button>
                                  </a>  
                                  <?php } ?>
                                   <a href="<?php echo base_url(); ?>AddmissionController/seat_assign?action=seat_month_delete&id=<?php echo @$value->seat_month_id; ?>"onclick="return confirm('Are you sure you want to delete this task?');"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr>
                            <?php  } ?>

                        </table>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>

                    </div>
                  </div>
                   <a href="<?php echo base_url(); ?>AddmissionController/seat_assign?action=seat_delete&id=<?php echo @$s->seat_batch_id; ?>"onclick="return confirm('Are you sure you want to delete this task?');"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
              </th>
              </tr>
             
            <?php } } ?>
          </table>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

                        </td>
                        
                        <td>
                           <button type="button" class="btn btn-success" data-toggle="modal" data-target="#my<?php echo $k; ?>">Add seat</button>


                           <div class="modal fade" id="my<?php echo $k; ?>" role="dialog">
    <div class="modal-dialog modal-lg" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
           
          <h4 class="modal-title">Extra Addseat</h4>
        </div>
        <div class="modal-body">
          <?php if(isset($bmsg)){ echo $bmsg; } ?>
       <form class="login100-form validate-form" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>AddmissionController/seat_assign">
             <input type="hidden" name="update_id" value="<?php if(!empty($select_seat_assign->seat_id)) { echo $select_seat_assign->seat_id; } ?>"/>
             <input type="hidden" name="seat_id" value="<?php echo $val->seat_id; ?>">
             <input type="hidden" name="seat_course_id" value="<?php echo $val->seat_course_id; ?>">
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">No of Year:*</label><br>
                                            <input type="text" class="form-control"  name="no_of_year"  placeholder="Enter no of year" id="no_of_year<?php echo $k; ?>"  onkeyup="demo(this.value,<?php echo $k; ?>)">
                                          </div><br>

                                          <div id="new<?php echo $k; ?>">
                                           <label for="date">Year:*</label><br>
                                            <select required  name="seat_year[]" id="seat_year" class="form-control" value="<?php if(!empty($select_seat_assign->seat_year)) { echo $select_seat_assign->seat_year; } ?>">
                                                  <option>Select Seat Year</option>

                                                  <?php for($i=2000;$i<=3000;$i++){ ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                  <?php } ?>
                                                </select><br>
                                            
                                          
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">No of Seat:*</label><br>
                                            <input type="text" class="form-control"  name="seat_no[]" value="<?php if(!empty($select_seat_assign->seat_no)) { echo $select_seat_assign->seat_no; } ?>" placeholder="Enter Seat">
                                          </div>     

                                          </div><br>                       

                                          <input type="submit" name="submit" value="submit" class="btn btn-success"/> 
                                                                        
        </form>
         <?php  foreach($seat_betch_all as $s){ 
               if($s->seat_id == $val->seat_id) {
              ?>
              <?php echo $s->batch_year; ?>
              
             
            <?php } } ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



                        </td>
                    
                         <?php if($_SESSION['logtype']=="Super Admin") { ?>
                            <td>
                           <div class="dropdown">
                            <?php if($_SESSION['logtype']=="Super Admin") { ?>
                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">

                              <!-- <li><a href="<?php //echo base_url(); ?>AddmissionController/seat_assign?action=edit&id=<?php //echo @$val->seat_id; ?>"> Edit</a></li>-->
                              
                              <li ><a href="<?php echo base_url(); ?>AddmissionController/seat_assign?action=delete&id=<?php echo @$val->seat_id; ?>"onclick="return confirm('Are you sure you want to delete this task?');">Delete</a></li>
                            </ul>
                          </div>
                      <?php } ?>
                  </td>
                 <?php } ?>
                  
                </tr>
                
             <?php } }?>
                
                </tfoot>
              </tbody>
            </table>



















    <?php if(isset($mmsg)){ echo $mmsg;} ?>



                <table id="example1" class="table table-responsive table-bordered table-striped example1">
                <thead>
                <tr>
                 <tr>
                  <th colspan="7" style="text-align: center;color: red;">COURSE</th>
                </tr>
                  <?php for($num=0; $num<1; $num++) ?>
                  <th>NO</th>
                  <th>Branch Name</th>
                  <th>Department</th>
                  <th>Course Name</th>
                  <th>Seat_Detail</th>   
                  <th>Add seat</th>              
                  <th>Action</th>               
                </tr>
                </thead>
                <tbody>
                <?php 

                // echo "<pre>";
                // print_r($seat_assign_all[0]->seat_branch_id);
                // die;
                foreach($seat_assign_all as $k=>$val) {
                  if($val->department_name != "COLLEGE"){
                 ?>
                <tr>
                  <td><?php echo $num++; ?></td>
                    <!-- <td><?php echo $val->email; ?></td> -->
                    <td><?php $branch_ids = explode(",",$val->seat_branch_id);
                        foreach($seat_branch_all as $row) { if(in_array($row->seat_branch_id,$branch_ids)) {  echo $row->seat_branch_name."<br>"; }  } ?></td>

                        <td><?php $department_ids = explode(",",$val->department_id);
                        foreach($department_all as $row) { if(in_array($row->department_id,$department_ids)) {  echo $row->department_name."<br>"; }  } ?></td>
                        <td><?php $seat_course_ids = explode(",",$val->seat_course_id);
                        foreach($seat_course_all as $row) { if(in_array($row->seat_course_id,$seat_course_ids)) {  echo $row->seat_course_name."<br>"; }  } ?></td>
                        <td><button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal<?php echo $k; ?>">view seat detail</button>

                            <div class="modal fade" id="myModal<?php echo $k; ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Seat Details</h4>
        </div>
        <div class="modal-body">

                <div class="table-responsive">
          <table id="example1" class="table table-responsive table-bordered table-striped example1">
          <tr>
            <th style="color: red;text-align: center;" colspan="10"><?php echo $val->seat_branch_name."&nbsp;&nbsp;". $val->seat_course_name; ?></th>
          </tr>
            <tr>
              
              <!-- <th>Batch Name</th> -->
              <!-- <th>Batch Year</th> -->
              <th>Btach Code</th>
              <th>Total Seat</th>
              <th>Assign sheet</th>
              <th>Anasign sheet</th>
              <th>Total Book seat</th>
              <th>Final Book Sheet</th>
              <th>Cancle Seat</th>
              <th>Pandding Seat</th>
              <th>Action</th>
            </tr>

            <?php  foreach($seat_betch_all as $i=>$s){ 
               if($s->seat_id == $val->seat_id) {
              ?>
              <tr>
             <!--  <td><?php //echo $s->batch_name; ?></td> -->
             <!--  <td><?php //echo $s->batch_year; ?></td> -->
              <td><?php echo $s->batch_code; ?></td>
              <td><?php echo $s->seat_no; ?></td>
              <td><?php echo $s->assign_sheet; ?></td>
              <th><?php echo $s->seat_no-$s->assign_sheet; ?></th>
              <td><?php echo $s->total_done; ?></td>
              <th><?php echo $mm = $s->total_done-$s->total_cancle; ?></th>
              <th style="color: red;"><?php echo $s->total_cancle; ?></th>
              <th><?php echo $s->seat_no-$mm; ?></th>
              <th>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?php echo $i; ?>">
              <i class="fa fa-pencil"></i>
              </button>

                  <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                        <form method="post" action="<?php echo base_url(); ?>AddmissionController/month_seat_assign">
                      <div class="modal-body">
                        <input type="hidden" name="month_seat_batch_id" value="<?php echo $s->seat_batch_id; ?>">
                        <input type="hidden" name="month_seat_id" value="<?php echo $s->seat_id; ?>">
                            <select name="month_name">
                              <option value="-1">-------select month-----------</option>
                              <?php for($j=1;$j<=12;$j++){ ?>
                                  <option value="<?php echo $j; ?>"><?php echo date("F", mktime(0, 0, 0, $j, 10)); ?></option>
                              <?php  }?>
                            </select>

                            No of seat:
                            <input type="text" name="month_seat">

                      
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                        </form>
                    </div>
                  </div>
                </div>

                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#month<?php echo $i; ?>"><i class="fa fa-eye"></i></button>
                <div id="month<?php echo $i; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Monthly Seat Details</h4>
                        </div>
                        <div class="modal-body">

                         <table id="example1" class="table table-responsive table-bordered table-striped example1">
                          <tr>
                          
                            <td colspan="10" style="color: red;text-align: center;"><?php echo $s->batch_code; ?>&nbsp;&nbsp;<b>Assign Seat:(<?php echo $s->assign_sheet; ?>)</b></td>
                          
                           
                            <tr>
                              
                              <!-- <th>Batch Name</th> -->
                              <!-- <th>Batch Year</th> -->
                              
                              <th>Month</th>
                              <th>Total Seat</th>
                              <th>Total Book seat</th>
                              <th>Book Seat</th>
                              <th>Cancle Seat</th>
                              <th>Pandding Seat</th>
                              <th>Action</th>
                            </tr>

                            <?php  foreach ($s->month as $key => $value) { ?>  
                            <tr>
                                <td><?php echo date("F", mktime(0, 0, 0, $value->month_name, 10)); ?></td>
                                <td><?php echo $value->month_seat; ?></td>
                                <td><?php if(isset($value->total_month_seat)){echo $value->total_month_seat;} ?></td>
                                <th>
                                  <?php 
                                    $d=0;
                                    $p=0;
                                    if(isset($value->total_month_seat)){ $p=$value->total_month_seat;}
                                    $q=0;
                                    if(isset($value->total_month_cancle_seat)){ $q= $value->total_month_cancle_seat;}
                                    echo $d =$p-$q;
                                  ?>

                                </th>
                                <td style="color: red;"><?php if(isset($value->total_month_cancle_seat)){echo $value->total_month_cancle_seat;} ?></th>
                                <td><?php 

                                echo ($value->month_seat)-($d)  ?></th>
                                <td><?php if($value->status == 0){?>
                                <a href="<?php echo base_url(); ?>/AddmissionController/show_seat/<?php echo $value->seat_month_id; ?>/<?php echo $value->status; ?>">
                                <button type="button" class="btn btn-warning"><i class="fa fa-eye-slash"></i></button>
                                </a>
                                  <?php  }else{ ?>
                                    <a href="<?php echo base_url(); ?>/AddmissionController/show_seat/<?php echo $value->seat_month_id; ?>/<?php echo $value->status; ?>">
                                  <button type="button" class="btn btn-success"><i class="fa fa-eye"></i></button>
                                  </a>  
                                  <?php } ?>

                                  <a href="<?php echo base_url(); ?>AddmissionController/seat_assign?action=seat_month_delete&id=<?php echo @$value->seat_month_id; ?>"onclick="return confirm('Are you sure you want to delete this task?');"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr>
                            <?php  } ?>

                        </table>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>

                    </div>
                  </div>
                    <a href="<?php echo base_url(); ?>AddmissionController/seat_assign?action=seat_delete&id=<?php echo @$s->seat_batch_id; ?>"onclick="return confirm('Are you sure you want to delete this task?');"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
              </th>

              </tr>
             
            <?php } } ?>
          </table>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

                        </td>
                        
                        <td>
                           <button type="button" class="btn btn-success" data-toggle="modal" data-target="#my<?php echo $k; ?>">Add seat</button>


                           <div class="modal fade" id="my<?php echo $k; ?>" role="dialog">
    <div class="modal-dialog modal-lg" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
           
          <h4 class="modal-title">Extra Addseat</h4>
        </div>
        <div class="modal-body">
          <?php if(isset($bmsg)){ echo $bmsg; } ?>
       <form class="login100-form validate-form" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>AddmissionController/seat_assign">
             <input type="hidden" name="update_id" value="<?php if(!empty($select_seat_assign->seat_id)) { echo $select_seat_assign->seat_id; } ?>"/>
             <input type="hidden" name="seat_id" value="<?php echo $val->seat_id; ?>">
             <input type="hidden" name="seat_course_id" value="<?php echo $val->seat_course_id; ?>">
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">No of Year:*</label><br>
                                            <input type="text" class="form-control"  name="no_of_year"  placeholder="Enter no of year" id="no_of_year<?php echo $k; ?>"  onkeyup="demo(this.value,<?php echo $k; ?>)">
                                          </div><br>

                                          <div id="new<?php echo $k; ?>">
                                           <label for="date">Year:*</label><br>
                                            <select required  name="seat_year[]" id="seat_year" class="form-control" value="<?php if(!empty($select_seat_assign->seat_year)) { echo $select_seat_assign->seat_year; } ?>">
                                                  <option>Select Seat Year</option>

                                                  <?php for($i=2000;$i<=3000;$i++){ ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                  <?php } ?>
                                                </select><br>
                                            
                                          
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">No of Seat:*</label><br>
                                            <input type="text" class="form-control"  name="seat_no[]" value="<?php if(!empty($select_seat_assign->seat_no)) { echo $select_seat_assign->seat_no; } ?>" placeholder="Enter Seat">
                                          </div>     

                                          </div><br>                       

                                          <input type="submit" name="submit" value="submit" class="btn btn-success"/> 
                                                                        
        </form>
         <?php  foreach($seat_betch_all as $s){ 
               if($s->seat_id == $val->seat_id) {
              ?>
              <?php echo $s->batch_year; ?>
              
             
            <?php } } ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



                        </td>
                    
                         <?php if($_SESSION['logtype']=="Super Admin") { ?>
                            <td>
                           <div class="dropdown">
                            <?php if($_SESSION['logtype']=="Super Admin") { ?>
                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">

                              <!-- <li><a href="<?php //echo base_url(); ?>AddmissionController/seat_assign?action=edit&id=<?php //echo @$val->seat_id; ?>"> Edit</a></li> -->
                              
                              <li ><a href="<?php echo base_url(); ?>AddmissionController/seat_assign?action=delete&id=<?php echo @$val->seat_id; ?>"onclick="return confirm('Are you sure you want to delete this task?');">Delete</a></li>
                            </ul>
                          </div>
                      <?php } ?>
                  </td>
                 <?php } ?>
                  
                </tr>
                
             <?php } } ?>
                
                </tfoot>
              </tbody>
            </table>

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
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

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



<script>


  function demo(no,id)
  {
       if(no !='')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>AddmissionController/fetch_no_of_year",
    method:"POST",
    data:{year_no:no},
    success:function(data)
    {
     $('#new'+id).html(data);
    // $('#seat_course').html('<option value="">Select Seat Course</option>');
    }
   });
  }
  }
  $(function () {
                $('#datetimepicker1').datetimepicker({
                    format:  'DD-MM-YYYY'
                });
            });
            
            $('.datepicker1').datepicker({
      autoclose: true,
      todayHighlight: true,
     format:"dd-mm-yyyy"
    
    
    })

  $(function () {
                $('#datetimepicker2').datetimepicker({
                    format: 'DD-MM-YYYY'
                });
            });
            
            $('.datepicker2').datepicker({
      autoclose: true,
      todayHighlight: true,
     format:"dd-mm-yyyy"
    
    
    })
           

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
  $(document).ready(function(){

     $('#no_of_year').keyup(function(){
 
      no = $('#no_of_year').val();

 
  if(no !='')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>AddmissionController/fetch_no_of_year",
    method:"POST",
    data:{year_no:no},
    success:function(data)
    {
     $('#new').html(data);
    // $('#seat_course').html('<option value="">Select Seat Course</option>');
    }
   });
  }
  else
  {
   // $('#department').html('<option value="">Select Department</option>');
  // $('#seat_course').html('<option value="">Select Seat Course</option>');
  }
});






 $('#branch').change(function(){
 console.log("heloo");
  var branch_ids = $('#branch').val();
  if(branch_ids !='')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>AddmissionController/fetch_seat_department",
    method:"POST",
    data:{branch_ids:branch_ids},
    success:function(data)
    {
     $('#department').html(data);
    // $('#seat_course').html('<option value="">Select Seat Course</option>');
    }
   });
  }
  else
  {
    $('#department').html('<option value="">Select Department</option>');
  // $('#seat_course').html('<option value="">Select Seat Course</option>');
  }
});
});
</script>

<script>
  $(document).ready(function(){
 $('#department').change(function(){
 console.log("heloo");
  var department_ids = $('#department').val();
  if(department_ids !='')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>AddmissionController/fetch_seat_course",
    method:"POST",
    data:{department_ids:department_ids},
    success:function(data)
    {
     $('#seat_course').html(data);
     // $('#city').html('<option value="">Select City</option>');
    }
   });
  }
  else
  {
   $('#seat_course').html('<option value="">Select Seat Course</option>');
   // $('#city').html('<option value="">Select City</option>');
  }

 });
});



  
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

<!-- <script>
$(document).ready(function(){
 $('#branch').change(function(){
  var branch_ids = $('#branch').val();
  if(branch_ids != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>AddmissionController/fetch_seat_department",
    method:"POST",
    data:{branch_ids:branch_ids},
    success:function(data)
    {
     $('#department').html(data);
     $('#seat_course').html('<option value="">Select Seat Course</option>');
    }
   });
  }
  else
  {
   $('#department').html('<option value="">Select Department</option>');
   $('#seat_course').html('<option value="">Select Seat Course</option>');
  }
 });

 $('#seat_course').change(function(){
  var department_ids = $('#seat_course').val();
  if(department_ids != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>AddmissionController/fetch_seat_course",
    method:"POST",
    data:{department_ids:department_ids},
    success:function(data)
    {
     $('#seat_course').html(data);
    }
   });
  }
  else
  {
   $('#seat_course').html('<option value="">Select Seat Course</option>');
  }
 });
 
});
</script>
 -->
</body>
</html>



