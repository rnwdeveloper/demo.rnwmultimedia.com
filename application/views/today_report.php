<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assetslogin/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assetslogin/css/main.css">
    
    
    
    
    
    
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
      <h1>
Today Report        
      </h1>
      <?php if($_SESSION['logtype']=="Super Admin") { ?> 
    <div style="margin-left: 220px; margin-top: -28px;">
      <a href="<?php echo base_url() ?>welcome/analysis/sixm" class="btn btn-success">LastSixMonth</a>
      <a href="<?php echo base_url() ?>welcome/analysis/cm" class="btn btn-info">CurrentMonth</a>
       <a href="<?php echo base_url() ?>welcome/analysis/fp" class="btn btn-warning">FacutlyWisePerformance</a>
       <a href="<?php echo base_url() ?>welcome/analysis/cr" class="btn btn-danger">CancelDemoReasonWise</a>
    </div>
    <?php } ?>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">Today Report</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       
     	    
		 <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary" style="padding:20px;">
            <div class="box-header with-border" style="margin-bottom:10px;">
              <h3 class="box-title"><?php echo date('d-m-Y'); ?> Report</h3>
            </div>
           
            <table border="1" bordercolor="#000" class="table">
                <tbody>
                <tr>
                <td  rowspan="2">Branch</td>
                <td rowspan="2">All Running Demo</td>
                <td  rowspan="2">
                <p>Today New</p>
                </td>
                <td  colspan="2">Today Absent</td>
                <td  colspan="2">Today Present</td>
                <td  colspan="2">Today Done</td>
                <td  colspan="2">Today Leave</td>
                <td  colspan="2">Today cancel</td>
                </tr>
                <tr>
                <td >old</td>
                <td >new</td>
                <td >old</td>
                <td>new</td>
                <td>old</td>
                <td>new</td>
                <td >old</td>
                <td>new</td>
                <td>old</td>
                <td>new</td>
                </tr>
                <?php
                $currentDate = date('Y-m-d');
                $allrun = 0;
                $all_today_new = 0;
                $all_new_ab =0;
                $all_old_ab=0;
                $all_new_pr =0;
                $all_old_pr=0;
                $all_new_done=0;
                $all_old_done=0;
                $all_new_leave=0;
                $all_old_leave=0;
                $all_new_cancel=0;
                $all_old_cancel=0;
             foreach($demo_all as $val) {
                        if($val->discard=="0") {
                   
                       if($val->demoStatus=="0") { $allrun++;  }
                       
                       if($currentDate==$val->demoDate) 
                       { 
                                        $all_today_new++; 
                                        if($val->demoStatus=="0") {
                                            $all_att = explode("&&",$val->attendance);
                        					for($i=0;$i<sizeof($all_att);$i++)
                        					{
                        						$att = explode("/",$all_att[$i]);
                        						if(@$att[1]=="A")
                        						{
                        							$all_new_ab++;	
                        						}
                        						if(@$att[1]=="P")
                        						{
                        							$all_new_pr++;	
                        						}
                        					}
                                        }
                                        
                                         if($val->demoStatus=="1") { $all_new_done++;  }
                                         if($val->demoStatus=="2") { $all_new_leave++;  }
                                          if($val->demoStatus=="3") { $all_new_cancel++;  }
                           
                       }
                       else
                       {
                                    if($val->demoStatus=="0") {
                                            $all_att = explode("&&",$val->attendance);
                        					for($i=0;$i<sizeof($all_att);$i++)
                        					{
                        						$att = explode("/",$all_att[$i]);
                        						if($currentDate==$att[0])
                				                {
                            						if(@$att[1]=="A")
                            						{
                            							$all_old_ab++;	
                            						}
                            						if(@$att[1]=="P")
                            						{
                            							$all_old_pr++;	
                            						}
                				                }
                        					}
                                        } 
                                        
                                        if($val->demoStatus=="1" && $val->statusChangeDate==$currentDate) { $all_old_done++;  }
                                        if($val->demoStatus=="2" && $val->statusChangeDate==$currentDate) { $all_old_leave++;  }
                                        if($val->demoStatus=="2" && $val->statusChangeDate==$currentDate) { $all_old_cancel++;  }
                       }
                      
                   
               }
             }
                ?>
                <tr>
                <td>All Branch</td>
                <td><?php echo $allrun; ?></td>
                <td><?php echo $all_today_new; ?></td>
                <td><?php echo $all_old_ab; ?></td>
                <td><?php echo $all_new_ab; ?></td>
                <td><?php echo $all_old_pr; ?></td>
                <td><?php echo $all_new_pr; ?></td>
                <td><?php echo $all_old_done; ?></td>
                <td><?php echo $all_new_done; ?></td>
                <td><?php echo $all_old_leave; ?></td>
                <td><?php echo $all_new_leave; ?></td>
                <td><?php echo $all_old_cancel; ?></td>
                <td><?php echo $all_new_cancel; ?></td>
                </tr>
                
                <?php foreach($branch_all as $branch) {
                    if($branch->branch_status=="0") {
                         $currentDate = date('Y-m-d');
                $allrun = 0;
                $all_today_new = 0;
                $all_new_ab =0;
                $all_old_ab=0;
                $all_new_pr =0;
                $all_old_pr=0;
                $all_new_done=0;
                $all_old_done=0;
                $all_new_leave=0;
                $all_old_leave=0;
                $all_new_cancel=0;
                $all_old_cancel=0;
             foreach($demo_all as $val) {
                if($val->discard=="0") {
                    if($branch->branch_id==$val->branch_id) {
                       if($val->demoStatus=="0") { $allrun++;  }
                       
                       if($currentDate==$val->demoDate) 
                       { 
                                        $all_today_new++; 
                                        if($val->demoStatus=="0") {
                                            $all_att = explode("&&",$val->attendance);
                        					for($i=0;$i<sizeof($all_att);$i++)
                        					{
                        						$att = explode("/",$all_att[$i]);
                        						if(@$att[1]=="A")
                        						{
                        							$all_new_ab++;	
                        						}
                        						if(@$att[1]=="P")
                        						{
                        							$all_new_pr++;	
                        						}
                        					}
                                        }
                                        
                                         if($val->demoStatus=="1") { $all_new_done++;  }
                                         if($val->demoStatus=="2") { $all_new_leave++;  }
                                          if($val->demoStatus=="3") { $all_new_cancel++;  }
                           
                       }
                       else
                       {
                                    if($val->demoStatus=="0") {
                                            $all_att = explode("&&",$val->attendance);
                        					for($i=0;$i<sizeof($all_att);$i++)
                        					{
                        						$att = explode("/",$all_att[$i]);
                        						if($currentDate==$att[0])
                				                {
                            						if(@$att[1]=="A")
                            						{
                            							$all_old_ab++;	
                            						}
                            						if(@$att[1]=="P")
                            						{
                            							$all_old_pr++;	
                            						}
                				                }
                        					}
                                        } 
                                        
                                        if($val->demoStatus=="1" && $val->statusChangeDate==$currentDate) { $all_old_done++;  }
                                        if($val->demoStatus=="2" && $val->statusChangeDate==$currentDate) { $all_old_leave++;  }
                                        if($val->demoStatus=="2" && $val->statusChangeDate==$currentDate) { $all_old_cancel++;  }
                       }
                      
                   
                    }
                }
             }
                   ?>
                
                <tr>
                <td><?php echo $branch->branch_name; ?></td>
                <td><?php echo $allrun; ?></td>
                <td><?php echo $all_today_new; ?></td>
                <td><?php echo $all_old_ab; ?></td>
                <td><?php echo $all_new_ab; ?></td>
                <td><?php echo $all_old_pr; ?></td>
                <td><?php echo $all_new_pr; ?></td>
                <td><?php echo $all_old_done; ?></td>
                <td><?php echo $all_new_done; ?></td>
                <td><?php echo $all_old_leave; ?></td>
                <td><?php echo $all_new_leave; ?></td>
                <td><?php echo $all_old_cancel; ?></td>
                <td><?php echo $all_new_cancel; ?></td>
                </tr>
               <?php } } ?>
                </tbody>
                </table>
                
                
                
              <?php  $tabel1=" <table border='1' bordercolor='#000' class='table'>"
                ."<tbody>"
                ."<tr>"
                ."<td  rowspan='2'>Branch</td>"
                ."<td rowspan='2'>All Running Demo</td>"
                ."<td  rowspan='2'>Today New</td>"
                ."<td  colspan='2'>Today Absent</td>"
                ."<td  colspan='2'>Today Present</td>"
                ."<td  colspan='2'>Today Done</td>"
                ."<td  colspan='2'>Today Leave</td>"
                ."<td  colspan='2'>Today cancel</td>"
                ."</tr>"
                ."<tr>"
                ."<td >old</td>"
                ."<td >new</td>"
                ."<td >old</td>"
                ."<td>new</td>"
                ."<td>old</td>"
                ."<td>new</td>"
                ."<td >old</td>"
                ."<td>new</td>"
                ."<td>old</td>"
                ."<td>new</td>"
                ."</tr>";
              
                $currentDate = date('Y-m-d');
                $allrun = 0;
                $all_today_new = 0;
                $all_new_ab =0;
                $all_old_ab=0;
                $all_new_pr =0;
                $all_old_pr=0;
                $all_new_done=0;
                $all_old_done=0;
                $all_new_leave=0;
                $all_old_leave=0;
                $all_new_cancel=0;
                $all_old_cancel=0;
             foreach($demo_all as $val) {
                        if($val->discard=="0") {
                   
                       if($val->demoStatus=="0") { $allrun++;  }
                       
                       if($currentDate==$val->demoDate) 
                       { 
                                        $all_today_new++; 
                                        if($val->demoStatus=="0") {
                                            $all_att = explode("&&",$val->attendance);
                        					for($i=0;$i<sizeof($all_att);$i++)
                        					{
                        						$att = explode("/",$all_att[$i]);
                        						if(@$att[1]=="A")
                        						{
                        							$all_new_ab++;	
                        						}
                        						if(@$att[1]=="P")
                        						{
                        							$all_new_pr++;	
                        						}
                        					}
                                        }
                                        
                                         if($val->demoStatus=="1") { $all_new_done++;  }
                                         if($val->demoStatus=="2") { $all_new_leave++;  }
                                          if($val->demoStatus=="3") { $all_new_cancel++;  }
                           
                       }
                       else
                       {
                                    if($val->demoStatus=="0") {
                                            $all_att = explode("&&",$val->attendance);
                        					for($i=0;$i<sizeof($all_att);$i++)
                        					{
                        						$att = explode("/",$all_att[$i]);
                        						if($currentDate==$att[0])
                				                {
                            						if(@$att[1]=="A")
                            						{
                            							$all_old_ab++;	
                            						}
                            						if(@$att[1]=="P")
                            						{
                            							$all_old_pr++;	
                            						}
                				                }
                        					}
                                        } 
                                        
                                        if($val->demoStatus=="1" && $val->statusChangeDate==$currentDate) { $all_old_done++;  }
                                        if($val->demoStatus=="2" && $val->statusChangeDate==$currentDate) { $all_old_leave++;  }
                                        if($val->demoStatus=="2" && $val->statusChangeDate==$currentDate) { $all_old_cancel++;  }
                       }
                      
                   
               }
             }
                
                $tabel2= "<tr>"
                ."<td>All</td>"
                ."<td>".$allrun."</td>"
                ."<td>".$all_today_new."</td>"
                ."<td>".$all_old_ab."</td>"
                ."<td>".$all_new_ab."</td>"
                ."<td>".$all_old_pr."</td>"
                ."<td>".$all_new_pr."</td>"
                ."<td>".$all_old_done."</td>"
                ."<td>".$all_new_done."</td>"
                ."<td>".$all_old_leave."</td>"
                ."<td>".$all_new_leave."</td>"
                ."<td>".$all_old_cancel."</td>"
                ."<td>".$all_new_cancel."</td>"
                ."</tr>";
                
                foreach($branch_all as $branch) {
                         $currentDate = date('Y-m-d');
                $allrun = 0;
                $all_today_new = 0;
                $all_new_ab =0;
                $all_old_ab=0;
                $all_new_pr =0;
                $all_old_pr=0;
                $all_new_done=0;
                $all_old_done=0;
                $all_new_leave=0;
                $all_old_leave=0;
                $all_new_cancel=0;
                $all_old_cancel=0;
             foreach($demo_all as $val) {
                if($val->discard=="0") {
                    if($branch->branch_id==$val->branch_id) {
                       if($val->demoStatus=="0") { $allrun++;  }
                       
                       if($currentDate==$val->demoDate) 
                       { 
                                        $all_today_new++; 
                                        if($val->demoStatus=="0") {
                                            $all_att = explode("&&",$val->attendance);
                        					for($i=0;$i<sizeof($all_att);$i++)
                        					{
                        						$att = explode("/",$all_att[$i]);
                        						if(@$att[1]=="A")
                        						{
                        							$all_new_ab++;	
                        						}
                        						if(@$att[1]=="P")
                        						{
                        							$all_new_pr++;	
                        						}
                        					}
                                        }
                                        
                                         if($val->demoStatus=="1") { $all_new_done++;  }
                                         if($val->demoStatus=="2") { $all_new_leave++;  }
                                          if($val->demoStatus=="3") { $all_new_cancel++;  }
                           
                       }
                       else
                       {
                                    if($val->demoStatus=="0") {
                                            $all_att = explode("&&",$val->attendance);
                        					for($i=0;$i<sizeof($all_att);$i++)
                        					{
                        						$att = explode("/",$all_att[$i]);
                        						if($currentDate==$att[0])
                				                {
                            						if(@$att[1]=="A")
                            						{
                            							$all_old_ab++;	
                            						}
                            						if(@$att[1]=="P")
                            						{
                            							$all_old_pr++;	
                            						}
                				                }
                        					}
                                        } 
                                        
                                        if($val->demoStatus=="1" && $val->statusChangeDate==$currentDate) { $all_old_done++;  }
                                        if($val->demoStatus=="2" && $val->statusChangeDate==$currentDate) { $all_old_leave++;  }
                                        if($val->demoStatus=="2" && $val->statusChangeDate==$currentDate) { $all_old_cancel++;  }
                       }
                      
                   
                    }
                }
             }
                 
                
             $tabel3= "<tr>"
                ."<td>".$branch->branch_name."</td>"
                ."<td>".$allrun."</td>"
                ."<td>".$all_today_new."</td>"
                ."<td>".$all_old_ab."</td>"
                ."<td>".$all_new_ab."</td>"
                ."<td>".$all_old_pr."</td>"
                ."<td>".$all_new_pr."</td>"
                ."<td>".$all_old_done."</td>"
                ."<td>".$all_new_done."</td>"
                ."<td>".$all_old_leave."</td>"
                ."<td>".$all_new_leave."</td>"
                ."<td>".$all_old_cancel."</td>"
                ."<td>".$all_new_cancel."</td>"
                ."</tr>";
                }
              
                 $tabel3 ="</tbody>"
                ."</table>";
               
            ?>
            
            
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
    
   if (document.getElementById("yellow") != null) {
    setTimeout(function() {
      document.getElementById('yellow').style.display = 'none';
    }, 5000);
  }
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
