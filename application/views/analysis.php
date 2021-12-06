<!--===============================================================================================-->
 <?php @$user_permission =  explode(",",@$_SESSION['user_permission']);
        @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);?>
        
    <?php date_default_timezone_set("Asia/Calcutta");
       $month_b1 = date('m', strtotime('-1 month'));
       $month_b2 = date('m', strtotime('-2 month'));
       $month_b3 = date('m', strtotime('-3 month'));
       $month_b4 = date('m', strtotime('-4 month'));
       $month_b5 = date('m', strtotime('-5 month'));
       $month_b6 = date('m', strtotime('-6 month'));
       
       $mon = array($month_b6,$month_b5,$month_b4,$month_b3,$month_b2,$month_b1);
       
       
       
      
    
    
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
  
  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Analysis
        
      </h1>
      <?php if($_SESSION['logtype']=="Super Admin") { ?> 
    <div style="margin-left: 200px; margin-top: -42px;">
      <a href="<?php echo base_url() ?>welcome/todayr" class="btn btn-success">LastSixMonth</a>
      <a href="<?php echo base_url() ?>welcome/analysis/sixm" class="btn btn-info">LastSixMonth</a>
      <a href="<?php echo base_url() ?>welcome/analysis/cm" class="btn btn-primary">CurrentMonth</a>
       <a href="<?php echo base_url() ?>welcome/analysis/fp" class="btn btn-warning">FacutlyWisePerformance</a>
       <a href="<?php echo base_url() ?>welcome/analysis/cr" class="btn btn-danger">CancelDemoReasonWise</a>
    </div>
    <?php } ?>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">Analysis</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php if($viewStatus=="sixm") { ?>
           <div class="col-md-12">
    		
             <div class="box box-primary" style="padding-left:20px;">
                <div class="box-header with-border" style="margin-bottom:10px;">
                 
                  <form method="post" id="myForm" action="<?php echo base_url(); ?>welcome/analysis/<?php echo $viewStatus; ?>">
                    
                	    <div class="col-md-4">
                	        
                	        <div class="input-group">
                           
                            <select  class="form-control select2" name="filter_branch"  >
                        	<option value="">Select Branch</option>
                            <?php $bname=""; foreach($branch_all as $row) {
                                if($row->branch_status=="0") {
                            if(in_array($row->branch_id,$branch_ids) || $_SESSION['logtype']=="Super Admin") {
                                if($bname=="")
                                {
                                    $bname.=$row->branch_name;
                                }
                                else
                                {
                                    $bname.=",  ".$row->branch_name;
                                }
                            ?>
                                
							<option <?php if(@$filter_branch==$row->branch_id) { echo "selected"; } ?>  value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>                      
                     	<?php   } } } ?>
                        </select>
                            <select  class="form-control select2" name="filter_department"  >
                        	<option value=""> Department</option>
                            <?php $dname=""; foreach($department_all as $val) {
                            if(in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") { 
                            if($dname=="")
                                {
                                    $dname.=$val->department_name;
                                }
                                else
                                {
                                    $dname.=",  ".$val->department_name;
                                }
                            ?>
                            	<option  <?php if(@$filter_department==$val->department_id) { echo "selected"; } ?>    value="<?php echo $val->department_id; ?>"><?php echo $val->department_name; ?></option>
                            <?php } } ?>
                        </select>
                        <input type="hidden" value="linechart" name="search">
                            <a class="input-group-addon btn btn-xs btn-primary" onclick="submitForm()">Filter</a>
                          </div>
               
						 
					</div>
				
               		 </form>
                </div>
                <p style="color:#737373"><?php if(!empty($filter_branch)) { foreach($branch_all as $row) { if(@$filter_branch==$row->branch_id) {   echo $row->branch_name;  } }  } else {  echo $bname; } ?> Branch</p>
                <p style="color:#737373"><?php if(!empty($filter_department)) { foreach($department_all as $val) { if(@$filter_department==$val->department_id) { echo $val->department_name; ; }    } } else {  echo $dname; } ?> Department</p>
                <?php if($_SESSION['logtype']=="Faculty") { ?>
                <p style="color:#737373">Faculty : <?php echo $_SESSION['user_name']; ?></p>
               <?php } ?>
                    
                  
                   
                    
                    <div id="chart_div" style="width: 1000px; height: 500px;"></div>
                 
           
            
            
           </div>
				
			
          </div>
          <?php } ?>
          
          <?php if($viewStatus=="cm") { ?>
          <div class="col-md-12">
    		
             <div class="box box-success" style="padding-left:20px;">
                <div class="box-header with-border" style="margin-bottom:10px;">
                  <form method="post" action="<?php echo base_url(); ?>welcome/analysis/<?php echo $viewStatus; ?>">
                    <div class="row">
                	<div class="col-md-2">
               
						 <select  class="form-control select2" name="filter_branch"  >
                        	<option value="">Select Branch</option>
                            <?php foreach($branch_all as $row) {
                                  if($row->branch_status=="0") {
                            if(in_array($row->branch_id,$branch_ids) || $_SESSION['logtype']=="Super Admin") { ?>
                                
							<option <?php if(@$filter_branch==$row->branch_id) { echo "selected"; } ?>  value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>                      
                     	<?php   } } } ?>
                        </select>
						
               		 </div>
               		
                	<div class="col-md-2">
						 <select  class="form-control select2" name="filter_department"  >
                        	<option value=""> Department</option>
                            <?php foreach($department_all as $val) {
                            if(in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") { ?>
                            	<option  <?php if(@$filter_department==$val->department_id) { echo "selected"; } ?>    value="<?php echo $val->department_id; ?>"><?php echo $val->department_name; ?></option>
                            <?php } } ?>
                        </select>
					</div>	
                    <div class="col-md-2">
						 <select  class="form-control select2" name="filter_faculty"  >
                        	<option value=""> Faculty</option>
                            <?php foreach($faculty_all as $val) {
                                
                                
                            @$bids = explode(",",@$val->branch_ids);
                            
                            
                            $bname="";
                            for($i=0;$i<sizeof(@$bids);$i++)
                            {
                                foreach($branch_all as $row) {   
                                    if($row->branch_id==@$bids[$i]) { if($bname=="") { $bname = $bname." ".$row->branch_name;}else { $bname = $bname." & ".$row->branch_name; } }
                                }
                            }
                            ?>
                            
                            	<option  <?php if(@$filter_faculty==$val->faculty_id) { echo "selected"; } ?>    value="<?php echo $val->faculty_id; ?>"><?php echo $val->name; ?>-  <?php echo $val->department_name; ?>  - <?php echo $bname; ?></option>
                            <?php } ?>
                        </select>
					</div>
                   <div class="col-md-6">
               
						  
						  <div class="form-inline">
                           <input type="text"  class="form-control datepicker1 input100" value="<?php if(!empty($filter_faculty)) { if(!empty($filter_demoDate_start)) { echo $filter_demoDate_start; } } ?>"  id="" name="filter_demoDate_start" placeholder="Start Date" >
						   <input type="text"  class="form-control datepicker1 input100" value="<?php if(!empty($filter_faculty)) { if(!empty($filter_demoDate_end)) { echo $filter_demoDate_end; } } ?>"  id="" name="filter_demoDate_end" placeholder="End Date" >
                          </div>
                 	</div>
                
                	
                 	</div>
                 	<div class="row">
                    <div class="col-md-10">
                 	
                 	</div>
                 	
                 	<div class="col-md-2" style="margin-top:15px;">
            	
                
						<div class="col-sm-6">
                        <input type="submit" value="Filter" class="btn btn-default pull-right" name="search"/>
                        </div>
                        <div class="col-sm-6">
                        <a  href="<?php echo base_url(); ?>welcome/analysis" class="btn btn-default" >Reset</a>
                        </div>
					</div>
					</div>

			</form>
                 
                </div>
               
                    
                   
                        <div class="row">
                            <div class="col-md-6"> 
                                <div id="columnchart_material" style="height: 400px;"></div>
                            </div>
                            <div class="col-md-6">
                                <div id="piechart" style="height: 500px;"></div>
                            </div>
                        </div>
                   
           
            
            
           </div>
				
			
          </div>
          <?php } ?>
          
          <?php if($viewStatus=="fp") { ?>
          <div class="col-md-12">
              <div class="box box-warning" style="padding-left:20px;">
                <div class="box-header with-border" style="margin-bottom:10px;">
                    <div class="container" id="showtime">
                                 
                                  <!-- Modal -->
                      </div>      

                   <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Check Free Time </label>

                  <div class="col-sm-10" id="display_faculty">
                    
                
                    <select class="form-control select2" required name="faculty_id" id="faculty" style="width: 100%;" onChange="selecttime()">
                      <option value="">Select Faculty</option>
                     <?php foreach($faculty_all as $row) { 
                      
                      @$bids = explode(",",@$row->branch_ids);
                                       $bname="";
                                      for($i=0;$i<sizeof(@$bids);$i++)
                                        {
                                            foreach($branch_all as $val) {   
                                                if($val->branch_id==@$bids[$i]) { if($bname=="") { $bname = $bname." ".$val->branch_name;}else { $bname = $bname." & ".$val->branch_name; } }
                                            }
                                        }?>
                      <option <?php if(@$select_demo->faculty_id==$row->faculty_id) { echo "selected"; } ?>  value="<?php echo $row->faculty_id; ?>"><?php echo $row->name; ?> -  <?php echo $row->department_name; ?>  - <?php echo $bname; ?> </option>
                      <?php }  ?> 
                    </select>
             
                  </div>
                </div>
                </div>
              </div>
    		
             <div class="box box-success" style="padding-left:20px;">
                <div class="box-header with-border" style="margin-bottom:10px;">
                  <form method="post" action="<?php echo base_url(); ?>welcome/analysis/<?php echo $viewStatus; ?>">
                    <div class="row">
                	
                   <div class="col-md-6">
               
						  
						  <div class="form-inline">
                           <input type="text"  class="form-control datepicker1 input100" value="<?php if(!empty($filter_demoDate_start)) { echo $filter_demoDate_start; } ?>"  id="" name="filter_demoDate_start" placeholder="Start Date" >
						   <input type="text"  class="form-control datepicker1 input100" value="<?php if(!empty($filter_demoDate_end)) { echo $filter_demoDate_end; } ?>"  id="" name="filter_demoDate_end" placeholder="End Date" >
                          </div>
                 	</div>
                	<div class="col-md-2">
            	
                
						<div class="col-sm-6">
                        <input type="submit" value="Filter" class="btn btn-default pull-right" name="faculty_analysis"/>
                        </div>
                        <div class="col-sm-6">
                        <a  href="<?php echo base_url(); ?>welcome/analysis" class="btn btn-default" >Reset</a>
                        </div>
					</div>
                	
                 	</div>
                 

			</form>
                 
                </div>
               
                    
                   
                        <div class="row">
                            <div class="col-md-12"> 
                            <div class="table-responsive">
                              <div id="top_x_div" style="height: 600px;"></div> 
                              </div>
                            </div>
                          
                            <div class="col-md-12"> 
                            <h4>D : Done  &nbsp;&nbsp;&nbsp;&nbsp;  L : leave  &nbsp;&nbsp;&nbsp;&nbsp;  C : Cancel</h4>
                             <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th colspan="30" style="text-align:center;">Day </th>
                                        
                                       
                                      </tr>
                                      <tr>
                                        <th>Faculty Name</th>
                                        <th>Total Demo</th>
                                        <th>Take Demo</th>
                                        <th>Done Demo</th>
                                        <th>Cancel Demo</th>
                                        <th style="text-align:center;" colspan="3">0 </th>
                                        <th style="text-align:center;" colspan="3">1 </th>
                                        <th style="text-align:center;" colspan="3">2 </th>
                                        <th style="text-align:center;" colspan="3">3 </th>
                                        <th style="text-align:center;" colspan="3">4 </th>
                                        <th style="text-align:center;" colspan="3">5 </th>
                                        <th style="text-align:center;" colspan="3">6 </th>
                                        <th style="text-align:center;" colspan="3">7 </th>
                                        <th style="text-align:center;" colspan="3">8 </th>
                                        <th style="text-align:center;" colspan="3">9 </th>
                                        <th style="text-align:center;" colspan="3">10 & more</th>
                                       
                                      </tr>
                                      <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>D</th>
                                        <th>L</th>
                                        <th>C</th>
                                        
                                        <th>D</th>
                                        <th>L</th>
                                        <th>C</th>
                                       
                                       <th>D</th>
                                        <th>L</th>
                                        <th>C</th>
                                        
                                        <th>D</th>
                                        <th>L</th>
                                        <th>C</th>
                                       
                                       <th>D</th>
                                        <th>L</th>
                                        <th>C</th>
                                        
                                        <th>D</th>
                                        <th>L</th>
                                        <th>C</th>
                                       
                                       <th>D</th>
                                        <th>L</th>
                                        <th>C</th>
                                        
                                        <th>D</th>
                                        <th>L</th>
                                        <th>C</th>
                                       
                                       <th>D</th>
                                        <th>L</th>
                                        <th>C</th>
                                        
                                        <th>D</th>
                                        <th>L</th>
                                        <th>C</th>
                                        
                                        <th>D</th>
                                        <th>L</th>
                                        <th>C</th>
                                       
                                      </tr>
                                    </thead>
                                    <tbody>
                            <?php foreach($faculty_all as $val) { 
                                    $totaldemo=0;
                                    $takedemo=0;
                                     $donedemo=0;
                                      $canceldemo=0;
                                    $dd0=0;
                                    $dd1=0;
                                    $dd2=0;
                                    $dd3=0;
                                    $dd4=0;
                                    $dd5=0;
                                    $dd6=0;
                                    $dd7=0;
                                    $dd8=0;
                                    $dd9=0;
                                    $dd10=0;
                                    
                                    $dl0=0;
                                    $dl1=0;
                                    $dl2=0;
                                    $dl3=0;
                                    $dl4=0;
                                    $dl5=0;
                                    $dl6=0;
                                    $dl7=0;
                                    $dl8=0;
                                    $dl9=0;
                                    $dl10=0;
                                    
                                    $dc0=0;
                                    $dc1=0;
                                    $dc2=0;
                                    $dc3=0;
                                    $dc4=0;
                                    $dc5=0;
                                    $dc6=0;
                                    $dc7=0;
                                    $dc8=0;
                                    $dc9=0;
                                    $dc10=0;
                                    foreach($faculty_analysis as $row) {
                                       if($row->discard=="0") {
                                         
                                           if($val->faculty_id==$row->faculty_id) {
                                                    $totaldemo++;
                                                    if($row->attendance!="")
                                                    {
                                                            $day1=0;
                                        					$all_att = explode("&&",$row->attendance);
                                        					
                                        					for($i=0;$i<sizeof($all_att);$i++)
                                        					{
                                        						$att = explode("/",$all_att[$i]);
                                        						if(@$att[1]=="P")
                                        						{
                                        							$day1++;	
                                        						}
                                        					}
                                        					if($day1!=0)
                                        					{
                                                                $takedemo++;
                                        					}
                                                    }
                                                    
                                                    if($row->demoStatus=="3" && $day1!=0)
                                					{
                                					    $canceldemo++;
                                					}
                                                    
                                                     
                                                    $day=0;
                                					$all_att = explode("&&",$row->attendance);
                                					
                                					for($i=0;$i<sizeof($all_att);$i++)
                                					{
                                						$att = explode("/",$all_att[$i]);
                                						if(@$att[1]=="P")
                                						{
                                							$day++;	
                                						}
                                					}
                                					
                                					if($row->demoStatus=="1")
                                					{
                                					    $donedemo++;
                                    					if($day==0) { $dd0++; }
                                    					if($day==1) { $dd1++; }
                                    					if($day==2) { $dd2++; }
                                    					if($day==3) { $dd3++; }
                                    					if($day==4) { $dd4++; }
                                    					if($day==5) { $dd5++; }
                                    					if($day==6) { $dd6++; }
                                    					if($day==7) { $dd7++; }
                                    					if($day==8) { $dd8++; }
                                    					if($day==9) { $dd9++; }
                                    					if($day>=10) { $dd10++; }
                                					}
                                					if($row->demoStatus=="2")
                                					{
                                    					if($day==0) { $dl0++; }
                                    					if($day==1) { $dl1++; }
                                    					if($day==2) { $dl2++; }
                                    					if($day==3) { $dl3++; }
                                    					if($day==4) { $dl4++; }
                                    					if($day==5) { $dl5++; }
                                    					if($day==6) { $dl6++; }
                                    					if($day==7) { $dl7++; }
                                    					if($day==8) { $dl8++; }
                                    					if($day==9) { $dl9++; }
                                    					if($day>=10) { $dl10++; }
                                					}
                                					if($row->demoStatus=="3")
                                					{
                                    					if($day==0) { $dc0++; }
                                    					if($day==1) { $dc1++; }
                                    					if($day==2) { $dc2++; }
                                    					if($day==3) { $dc3++; }
                                    					if($day==4) { $dc4++; }
                                    					if($day==5) { $dc5++; }
                                    					if($day==6) { $dc6++; }
                                    					if($day==7) { $dc7++; }
                                    					if($day==8) { $dc8++; }
                                    					if($day==9) { $dc9++; }
                                    					if($day>=10) { $dc10++; }
                                					}
                                					
                                					
                                                }
                                                
                                           
                                       }
                                  }?>  
                                      <tr>
                                        <td><?php echo $val->name; ?></td>
                                        <td><?php echo $totaldemo; ?> </td>
                                        <td><?php echo $takedemo; ?> </td>
                                         <td><?php echo $donedemo; ?> </td>
                                         <td><?php echo $canceldemo; ?> </td>
                                        <td><?php echo $dd0; ?></td>
                                        <td><?php echo $dl0; ?></td>
                                        <td><?php echo $dc0; ?></td>
                                        
                                        <td><?php echo $dd1; ?></td>
                                        <td><?php echo $dl1; ?></td>
                                        <td><?php echo $dc1; ?></td>
                                        
                                        <td><?php echo $dd2; ?></td>
                                        <td><?php echo $dl2; ?></td>
                                        <td><?php echo $dc2; ?></td>
                                        
                                        <td><?php echo $dd3; ?></td>
                                        <td><?php echo $dl3; ?></td>
                                        <td><?php echo $dc3; ?></td>
                                        
                                        <td><?php echo $dd4; ?></td>
                                        <td><?php echo $dl4; ?></td>
                                        <td><?php echo $dc4; ?></td>
                                        
                                        <td><?php echo $dd5; ?></td>
                                        <td><?php echo $dl5; ?></td>
                                        <td><?php echo $dc5; ?></td>
                                        
                                        <td><?php echo $dd6; ?></td>
                                        <td><?php echo $dl6; ?></td>
                                        <td><?php echo $dc6; ?></td>
                                        
                                        <td><?php echo $dd7; ?></td>
                                        <td><?php echo $dl7; ?></td>
                                        <td><?php echo $dc7; ?></td>
                                        
                                        <td><?php echo $dd8; ?></td>
                                        <td><?php echo $dl8; ?></td>
                                        <td><?php echo $dc8; ?></td>
                                        
                                        <td><?php echo $dd9; ?></td>
                                        <td><?php echo $dl9; ?></td>
                                        <td><?php echo $dc9; ?></td>
                                        
                                        <td><?php echo $dd10; ?></td>
                                        <td><?php echo $dl10; ?></td>
                                        <td><?php echo $dc10; ?></td>
                                       
                                        
                                      </tr>
                                  <?php } ?>   
                                    </tbody>
                                  </table>
                            </div>
                            </div>
                           
                        </div>
                   
           
            
            
           </div>
				
			
          </div>
          <?php } ?>
          
          <?php if($viewStatus=="cr") { ?>
          <div class="col-md-12">
    		
             <div class="box box-success" style="padding-left:20px;">
                <div class="box-header with-border" style="margin-bottom:10px;">
                  <form method="post" action="<?php echo base_url(); ?>welcome/analysis/<?php echo $viewStatus; ?>">
                    <div class="row">
                	
                   <div class="col-md-6">
               
						  
						  <div class="form-inline">
                           <input type="text"  class="form-control datepicker1 input100" value="<?php if(!empty($filter_demoDate_start)) { echo $filter_demoDate_start; } ?>"  id="" name="filter_demoDate_start" placeholder="Start Date" >
						   <input type="text"  class="form-control datepicker1 input100" value="<?php if(!empty($filter_demoDate_end)) { echo $filter_demoDate_end; } ?>"  id="" name="filter_demoDate_end" placeholder="End Date" >
                          </div>
                 	</div>
                	<div class="col-md-2">
            	
                
						<div class="col-sm-6">
                        <input type="submit" value="Filter" class="btn btn-default pull-right" name="faculty_analysis"/>
                        </div>
                        <div class="col-sm-6">
                        <a  href="<?php echo base_url(); ?>welcome/analysis" class="btn btn-default" >Reset</a>
                        </div>
					</div>
                	
                 	</div>
                 

			</form>
                 
                </div>
               
                    
                   
                        <div class="row">
                          
                            <div class="col-md-12">
                                <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
                                
                            </div>
                            <div class="col-md-12"> 
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th></th>
                                        <th></th>
                                        <th colspan="10" style="text-align:center;">Day </th>
                                        
                                       
                                      </tr>
                                      <tr>
                                        <th>Reason</th>
                                        <th>Total Cancel Demo</th>
                                        <th>0 </th>
                                        <th>1 </th>
                                        <th>2 </th>
                                        <th>3 </th>
                                        <th>4 </th>
                                        <th>5 </th>
                                        <th>6 </th>
                                        <th>7 </th>
                                        <th>8 </th>
                                        <th>9 </th>
                                        <th>10 & more </th>
                                       
                                      </tr>
                                    </thead>
                                    <tbody>
                            <?php foreach($cancel_reason_all as $val) { 
                                    $cttt1=0;
                                    $d0=0;
                                    $d1=0;
                                    $d2=0;
                                    $d3=0;
                                    $d4=0;
                                    $d5=0;
                                    $d6=0;
                                    $d7=0;
                                    $d8=0;
                                    $d9=0;
                                    $d10=0;
                                    foreach($faculty_analysis as $row) {
                                       if($row->discard=="0") {
                                           if($row->demoStatus=="3") {
                                           if($val->reasonName==$row->cancel_reason) {
                                                    $cttt1++;
                                                    $day=0;
                                					$all_att = explode("&&",$row->attendance);
                                					
                                					for($i=0;$i<sizeof($all_att);$i++)
                                					{
                                						$att = explode("/",$all_att[$i]);
                                						if(@$att[1]=="P")
                                						{
                                							$day++;	
                                						}
                                					}
                                					if($day==0) { $d0 = $d0 + 1; }
                                					if($day==1) { $d1 = $d1 + 1; }
                                					if($day==2) { $d2 = $d2 + 1; }
                                					if($day==3) { $d3 = $d3 + 1; }
                                					if($day==4) { $d4 = $d4 + 1; }
                                					if($day==5) { $d5 = $d5 + 1; }
                                					if($day==6) { $d6 = $d6 + 1; }
                                					if($day==7) { $d7 = $d7 + 1; }
                                					if($day==8) { $d8 = $d8 + 1; }
                                					if($day==9) { $d9 = $d9 + 1; }
                                					if($day>=10) { $d10 = $d10 + 1; }
                                					
                                					
                                                }
                                                
                                           }
                                       }
                                  }?>  
                                      <tr>
                                        <td><?php echo $val->reasonName; ?></td>
                                        <td><?php echo $cttt1; ?> </td>
                                         <td><?php echo $d0; ?></td>
                                        <td><?php echo $d1; ?></td>
                                        <td><?php echo $d2; ?></td>
                                        <td><?php echo $d3; ?></td>
                                        <td><?php echo $d4; ?></td>
                                        <td><?php echo $d5; ?></td>
                                        <td><?php echo $d6; ?></td>
                                        <td><?php echo $d7; ?></td>
                                        <td><?php echo $d8; ?></td>
                                        <td><?php echo $d9; ?></td>
                                        <td><?php echo $d10; ?></td>
                                        
                                      </tr>
                                  <?php } ?>   
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                   
           
            
            
           </div>
				
			
          </div>
          
           <?php } ?>
          
           
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


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Reason', 'Total Cancel Demo'],
          <?php foreach($cancel_reason_all as $val) { 
               $cttt=0;  
              foreach($faculty_analysis as $row) {
                   if($row->discard=="0") {
                       if($row->demoStatus=="3") {
                       if($val->reasonName==$row->cancel_reason) {
                             
                           
                            
                                $cttt++;
                            }
                            
                       }
                   }
              }
              
              
              ?>
          ['<?php echo $val->reasonName; ?>', <?php echo $cttt; ?>],
           <?php } ?>
         
        ]);

        var options = {
          title: 'Cancel Demo Report',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>


    
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'Percentage'],
          <?php foreach($faculty_all as $val) { 
              $demo_res1=0;  $ttttt=0;  $ddddd=0;
              foreach($faculty_analysis as $row) {
                   if($row->discard=="0") {
                       if($val->faculty_id==$row->faculty_id) {
                             
                           
                            if($row->demoStatus=="1")
                            {
                                $ttttt++;
                            }
                            if($row->demoStatus=="3" && $row->attendance!="")
                            {
                                    $day=0;
                					$all_att = explode("&&",$row->attendance);
                					
                					for($i=0;$i<sizeof($all_att);$i++)
                					{
                						$att = explode("/",$all_att[$i]);
                						if(@$att[1]=="P")
                						{
                							$day++;	
                						}
                					}
                					if($day!=0)
                					{
                                        $ttttt++;
                					}
                            }
                            if($row->demoStatus=="1")
                            {
                                $ddddd++;
                            }
                       }
                   }
              }
              
               $demo_res1 = $ddddd*100;
               if($demo_res1!=0)
               {
                  $ress = $demo_res1/$ttttt;
               }
               else
               {
                   $ress=0;
               }
              ?>
             
          ["<?php echo $val->name; ?>", <?php echo $ress; ?>],
          <?php } ?>
         
        ]);

        var options = {
          width: 4800,
          legend: { position: 'none' },
          chart: {
            title: 'Faculty wise Demo performance',
            subtitle: '' },
          axes: {
            x: {
              0: { side: 'top', label: ''} // Top x-axis.
            }
          },
          bar: { groupWidth: "70%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>

<script type="text/javascript">

	<?php           
	                if(!empty($filter_faculty)) { 
                    	if(!empty($filter_demoDate_start) && !empty($filter_demoDate_end))
                    	{
                    	    
                    	    $duration = $filter_demoDate_start." To ".$filter_demoDate_end;
                    	    
                    	}
	                }
                	else
                	{
                	    $duration = "Current Month";
                	}
                	?>
    <?php 
        $ttt=0; $ddd=0; $lll=0;  $ccc=0; $rrr=0;
        foreach($two_analysis as $val)
        {
             if($val->discard=="0") {  if(in_array($val->branch_id,$branch_ids) && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") {
                 
                $ttt++;
                if($val->demoStatus=="0")
                {
                    $rrr++;
                }
                if($val->demoStatus=="1")
                {
                    $ddd++;
                }
                if($val->demoStatus=="2")
                {
                    $lll++;
                }
                if($val->demoStatus=="3")
                {
                    $ccc++;
                }
            
        } } }
    ?>

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['        ', 'Total Demo', 'Cancel Demo', 'Leave Demo','Done Demo','Running Demo'],
         
          ['<?php echo $duration; ?>', <?php echo $ttt; ?>, <?php echo $ccc; ?>, <?php echo $lll; ?>,<?php echo $ddd; ?>,<?php echo $rrr; ?>]
        ]);

        var options = {
          chart: {
            title: 'RNW <?php echo $duration; ?> Performance',
            subtitle: 'Total Demo, Done, Leave and Cancel: <?php echo $duration; ?>',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    
     <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Running Demo',     <?php echo $rrr; ?>],
          ['Done Demo',     <?php echo $ddd; ?>],
          ['Cancel Demo',  <?php echo $ccc; ?>],
          ['Leave Demo', <?php echo $lll; ?>],
        
        ]);

        var options = {
          title: '',
           colors: ['#913DA0', '#0F9D58', '#BA3B2E', '#CF9900']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
       
        chart.draw(data, options);
      }
    </script>


<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Total Demo', 'Cancel Demo', 'Done Demo'],
           <?php for($i=0;$i<sizeof($mon);$i++) {
              
              if($mon[$i]==1) { $mon_name="Jan"; }
              if($mon[$i]==2) { $mon_name="Feb"; }
              if($mon[$i]==3) { $mon_name="Mar"; }
              if($mon[$i]==4) { $mon_name="Apr"; }
              if($mon[$i]==5) { $mon_name="May"; }
              if($mon[$i]==6) { $mon_name="Jun"; }
              if($mon[$i]==7) { $mon_name="July"; }
              if($mon[$i]==8) { $mon_name="Aug"; }
              if($mon[$i]==9) { $mon_name="Sep"; }
              if($mon[$i]==10) { $mon_name="Oct"; }
              if($mon[$i]==11) { $mon_name="Nov"; }
              if($mon[$i]==12) { $mon_name="Dec"; }
              
              $total_d = 0;   $total_cancel=0;  $total_done=0;
               foreach($last as $val){
           if($val->discard=="0") {
                 if(in_array($val->branch_id,$branch_ids) && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") {
           
           $mo = explode("-",$val->demoDate);
           $yearr = $mo[0];
           if($mo[1]==$mon[$i])
           {
               $total_d++;
               if($val->demoStatus==1)
               {
                   $total_done++;
               }
               if($val->demoStatus==3)
               {
                   $total_cancel++;
               }
               
           }
           
           
       } } }
       
  //     $demo_res = $total_done*100/$total_d;
     
     
       ?>
       <?php if($i!=5) { ?>
          ['<?php echo $mon_name; ?>',  <?php echo $total_d; ?>,      <?php echo $total_cancel; ?>,         <?php echo $total_done; ?>],
          <?php } else { ?>
         ['<?php echo $mon_name; ?>',  <?php echo $total_d; ?>,      <?php echo $total_cancel; ?>,         <?php echo $total_done; ?>]
          
          <?php } } ?>
        
        ]);

        var options = {
          title : 'Monthly Demo Analysis',
          vAxis: {title: 'Demo'},
          hAxis: {title: 'Month'},
          seriesType: 'bars',
          series: {4: {type: 'line'}},
          colors: ['#3366CC', '#DC3912', '#0F9D58']
        };
      
        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        
      }
    </script>

<script>
    function submitForm()
    {
        document.getElementById("myForm").submit();
    }
    
</script>


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
    var FromEndDate = new Date();
    
    $('.datepicker').datepicker({
      autoclose: true,
	   format:"yyyy-mm-dd",
	   todayHighlight: true,
	   
	   endDate: FromEndDate
	  
    })
    
    
    
    $('.datepicker1').datepicker({
      autoclose: true,
      todayHighlight: true,
	   format:"yyyy-mm-dd"
	  
	  
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

<script type="text/javascript">
  function selecttime()
  {
      var faculty_id = $('#faculty').val();
      var courseName = $('#courseName').val();
      var demo_date = $('#date_selected').val();
      if(faculty_id!="")
      {
        $.ajax({
          url : '<?php echo base_url(); ?>welcome/checkTime',
          type:"post",
          
          data:{
            'faculty_id':faculty_id,
            'courseName':courseName,
            'demo_date':demo_date
            },
            success: function(data)
            {
              
              
              $('#showtime').html(data);
              $('#myModal').modal("show");
              
            }
          });
        
      }
  }
</script>




</body>
</html>
