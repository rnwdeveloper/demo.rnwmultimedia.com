	<?php if(!empty($msg))  { ?>

 		<script>  alert("This Date Attendance already marked"); </script>

 	<?php } 



	  	@$user_permission =  explode(",",@$_SESSION['user_permission']);

	  	@$branch_ids = explode(",",$_SESSION['branch_ids']);

	  	@$depart_ids = explode(",",$_SESSION['department_id']);

	  	if($_SESSION['logtype']=="Faculty")

	    {

	        @$faculty_course_ids = explode(",",$_SESSION['course_ids']);

	        @$faculty_package_ids = explode(",",$_SESSION['package_ids']);

	    }

	    $ttll = 0;   

	    $ttpp=0;

	    $ttaa=0;

	    $ttpend =0;

	    $ldata =0;

	    $cdemo =0;

	                

	  	if(isset($demo_all))

	   	{

	    	foreach($demo_all as $val) 

	    	{ 

	    		if($val->discard=="0") 

	    		{ 

	        		if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") 

	        		{

	            		$date = date("Y-m-d");

	                	if(strcmp($date, date('Y-m-d',strtotime($val->addDate))) == 0)

	                	{

	                    	$all_att = explode("&&",$val->attendance);

	                    	$ttll++;

	                		if($val->demoStatus=="0")

	                		{

	                 			for($i=0;$i<sizeof($all_att);$i++)

	                    		{

	                    			$att = explode("/",$all_att[$i]);

	                    			if($date==$att[0])

	                    			{

	                        			if($att[1]=="P")

	                        			{

	                            	 		$ttpp++;                      

	                        			}

	                        			else if($att[1]=="A")

	                        			{

	                            			$ttaa++;

	                            		}

	                        		}

	                     			else if(strpos($val->attendance,$date) == false)

	                     			{

	                     				$ttpend++;        

	                				}        

	                			}

	                		}

	                		else if($val->demoStatus)

	                		{

	                     		$ldata++;

	                		}

							else if($val->demoStatus)

							{

	                    		$cdata++;

	                		}

						}

	    			}

	    		}

	   		} 

	 	}

	 	////////////untaken demo graf

		$tpall = 0;

		$untaken=0;

		$taall=0;

		$key=0;

		if(isset($curent_month_all))

	    {

	    	foreach ($curent_month_all as $key => $value)

	    	{

	    		$all_att = explode("&&",$value->attendance);

	     		for($i=0;$i<sizeof($all_att);$i++)

	            {

	            	$att = explode("/",$all_att[$i]);

	                if(isset($att[1]))

	                {

	                	// print_r($att[1]);

						if($att[1]=="P")

						{

							$tpall++;

							break;                                                      

						}

						else

						{

							$untaken++;

							break; 

						}

					}

					else

					{

						$taall++;

					}

				}

	    	}

	    } 

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

	    $all_new_confus=0;

	    $all_old_confus=0;

	    //$takedemo=0;

	    //$currentDate = date('Y-m-d');

	    if(isset($demo_all))

	    {

	        foreach($demo_all as $val) {

	        // echo '<pre>';

	        // print_r($aaa_data);

	        // die();

	        $currentDate = date('Y-m-d');

	        if($val->discard=="0") 

	        {

	        	if($val->demoStatus=="0") 

	        	{ 

	        		$allrun++;  

	        	}

	            if($currentDate==$val->demoDate) 

	            { 

	                $all_today_new++; 

	                if($val->demoStatus=="0") 

	                {

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

	                if($val->demoStatus=="4") { $all_new_confus++; }

	            }

	            else

	            {

	                if($val->demoStatus=="0") 

	                {

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

	                if($val->demoStatus=="2" && $val->statusChangeDate==$currentDate) {$all_old_confus++; }

	            }

	        }

		}

	}

?>

           

<?php date_default_timezone_set("Asia/Calcutta");  ?>

<style type="text/css">

  .card-statistic{

    background-color: #fff;

    border-radius: 4px;

    border: none;

    position: relative;

    margin-bottom: 10px;

    box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 0.125rem 0.1875rem rgba(90,97,105,0.1);

    padding: 15px;

    border-top: 2px solid var(--red);

  }

  .filter_btn{

     box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 0.125rem 0.1875rem rgba(90,97,105,0.1);

     background-color: #fff;

     color: #212121;

  }

  button:focus{

    outline: none;

  }

  .btn-primary.focus, .btn-primary:focus{

    border-color: none;

  }

  .btn-primary:hover{

    border-color: none;

  }

  .card-header{

    border-bottom-color: #f9f9f9;

    line-height: 30px;

    -ms-grid-row-align: center;

    align-self: center;

    width: 100%;

    padding: 10px 25px;

    display: flex;

    align-items: center;

    justify-content: space-between;

  }

  .card-header h4 {

    font-size: 14px;

    line-height: 28px;

    padding-right: 10px;

    margin-bottom: 0;

    color: #212529;

  }

  .card .card-header .form-control{

    height: 31px;

    font-size: 13px;

    padding: 10px 15px;

    border-radius: 30px 0 0 30px !important;

  }

  .card .card-header .btn{

    border-radius: 0 30px 30px 0 !important;

    font-size: 12px;

    padding-left: 13px !important;

    padding-right: 13px !important;

  }

</style>



<main class="main_content d-inline-block">

  <section>

    <div class="container-fluid">

      <div class="row">

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">

          <div class="card card-statistic">

            <h6>

              <a href="<?php echo base_url(); ?>TaskController/show_all_task" class="text-dark">Today Add Task</a>

            </h6>           

          </div>

        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">

          <div class="card card-statistic">

            <h6><a href="<?php echo base_url(); ?>TaskController/working_all_task" class="text-dark"> Today Working Task</a></h6>

          </div>

        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">

          <div class="card card-statistic">

            <h6><a href="<?php echo base_url(); ?>TaskController/observe_all_task" class="text-dark">Today Observe Task</a></h6>

          </div>

        </div>

      </div>

    </div>

  </section>

  <section>

    <div class="container-fluid">

      <div class="row justify-content-center">

        <div class="col-xl-3 col-lg-3 col-md-6 col-6">

          <button type="button" class="btn-block btn-primary filter_btn text-left btn-sm" data-toggle="modal" data-target="#graph_block_modal" >Filter Ratio<span class="d-inline-block float-right"><i class="fas fa-search"></i></span></button>

          <div class="modal fade" id="graph_block_modal">

            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

              <div class="modal-content">

                <div class="modal-header">

                  <h6 class="modal-title">Filter Ratio</h6>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                  </button>

                </div>

                <div class="modal-body">

                  <div class="graph_block_sec d-inline-block w-100 position-relative">

                    <div class="row">

                      <div class="col-lg-4 col-md-12">

                        <div class="graph_box_block">

                          <form method="post" action="<?php echo base_url(); ?>welcome">

                            <div class="graph_box_block_1_form">

                              <div class="btn-group w-100" >

                                <select class="form-control rounded-0" name="filter_branch_data" style="font-size: 12px; padding: 4px 8px;  ">

                                  <option>Select Branch</option>

                                    <?php foreach($branch_all as $row) {

                                      if(in_array($row->branch_id,$branch_ids) || $_SESSION['logtype']=="Super Admin") { ?>

                                        <option <?php if(@$filter_branch_data==$row->branch_id) { echo "selected"; } ?>  value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>             

                                    <?php   } } ?>

                                </select>                                

                                <button type="submit" name="search_filter" value="Filter" class="btn-sm rounded-0 btn-success">Filter</button>

                                <a href="<?php echo base_url(); ?>welcome" class="btn-sm rounded-0 btn-danger">Reset</a>

                              </div>

                            </div>

                          </form>

                          <!-- <div id="year_pie" style="width: 100%; height: 300px; margin: 30px auto 0"></div> -->

                          <span class="total_demo_count">Total Demo : <span id="total_demo"></span></span>

                        </div>

                      </div>

                      <div class="col-lg-4 col-md-12">

                        <div class="graph_box_block">

                           <div id="3D_graf2" style="width: 100%; height: 300px; margin: 0 auto"></div>

                          <span class="total_demo_count">Total Demo : <span id="demo_total"></span> </span>

                        </div>

                      </div>

                      <div class="col-lg-4 col-md-12 mx-auto"  id="graph_wise_chart">

                        <div class="graph_box_block">

                          <select class="form-control" id="calendar123" style="font-size: 12px; padding: 4px 8px;">

                            <option value="">Time Selection</option>

                              <?php

                                foreach ($grafwiseday_all as $row)

                                {

                                  echo '<option value="'.$row->id.'">'.$row->name.'</option>';

                                }

                            ?>                     

                          </select>

                          <div id="columnchart_material" style="width:100%;height: 300px; position: relative; margin: 0 auto " id="result"></div>

                          <span class="total_demo_count">Total Demo : <span id="mt_demo"></span></span>

                        </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 col-6">

          <button type="button" class="btn-block btn-primary filter_btn text-left btn-sm" data-toggle="modal" data-target="#graph_block_modal" >Filter Demo<span class="d-inline-block float-right"><i class="fas fa-search"></i></span></button> 

          <div class="modal fade" id="search_block">

            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

              <div class="modal-content">

                <div class="modal-header">

                  <h5 class="modal-title">Filter Ratio</h5>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                  </button>

                </div>

                <div class="modal-body">

                  	<div class="search_block d-inline-block w-100">

                    	<form class="col-lg-12" method="post" action="<?php echo base_url(); ?>welcome">

                      		<div class="row">

                        		<div class="col-xl-3 col-lg-6">

                          			<div class="form-group">

                            			<select class="form-control"  name="filter_branch">

                              				<option value="">Select Branch</option>

                               				<?php foreach($branch_all as $row) {

                                          		if(in_array($row->branch_id,$branch_ids) || $_SESSION['logtype']=="Super Admin") { ?>

                                            	<option <?php if(@$filter_branch==$row->branch_id) { echo "selected"; } ?>  value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>

                                            <?php   } } ?>

                            			</select>

                          			</div>

                        		</div>

                        		<div class="col-xl-3 col-lg-6">

                          			<div class="form-group">

                            			<select class="form-control" name="filter_department">

                              				<option value="">Department</option>

                              					<?php foreach($department_all as $val) {

                                          			if(in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") { ?>

                                              		<option  <?php if(@$filter_department==$val->department_id) { echo "selected"; } ?>  value="<?php echo $val->department_id; ?>"><?php echo $val->department_name; ?></option>

                                        		<?php } } ?>

                            			</select>

                          			</div>

                        		</div>

		                        <div class="col-xl-6 col-lg-6">

		                          	<div class="form-group">

		                            	<select class="form-control" name="filter_faculty">

		                              		<option value="">Faculty</option>

		                              			<?php foreach($faculty_all as $val) {

                                          			@$bids = explode(",",@$val->branch_ids);

                                          			$bname="";

                                          			for($i=0;$i<sizeof(@$bids);$i++)

                                          			{

                                              			foreach($branch_all as $row) 

                                              			{   

                                                  			if($row->branch_id==@$bids[$i]) { if($bname=="") { $bname = $bname." ".$row->branch_name;}else { $bname = $bname." & ".$row->branch_name; } }

                                              			}

                                          			}

                                        		?>

                            				<option  <?php if(@$filter_faculty==$val->faculty_id) { echo "selected"; } ?>    value="<?php echo $val->faculty_id; ?>"><?php echo $val->name; ?>-  <?php echo $val->department_name; ?>  - <?php echo $bname; ?></option>

                                        	<?php } ?>

                            			</select>

                          			</div>

                        		</div>

		                        <div class="col-xl-5 col-lg-6">

									<div class="form-group">

										<select class="form-control" name="filter_course" >

											<option value="">Select Course</option>

												<?php foreach($course_all as $row) {  ?>

													<option <?php if(@$filter_course == $row->course_name) { echo "selected"; }  ?> value="<?php echo $row->course_name; ?>"><?php echo $row->course_name; ?></option>

												<?php } ?>

										</select>

									</div>

		                        </div>

                        

                        <div class="col-xl-3 col-lg-4">

                          <div class="form-group">

                            <input type="text" name="filter_demoName" placeholder="Student Name" class="form-control" value="<?php if(!empty($filter_demoName)) { echo $filter_demoName; } ?>">

                          </div>

                        </div>

                        <div class="col-lg-3 col-lg-4">

                          <div class="form-group">

                            <input type="text" class="form-control" name="filter_demoId" placeholder="Demo ID "  value="<?php if(!empty($filter_demoId)) { echo $filter_demoId; } ?>">

                          </div>

                        </div>

                        <div class="col-xl-4 col-lg-4">

                          <div class="form-group">

                            <input type="text" class="form-control"  id="" name="filter_phoneNo" placeholder="Filter Phone No" value="<?php if(!empty($filter_phoneNo)) { echo $filter_phoneNo; } ?>">

                          </div>

                        </div>

                        <div class="col-xl-3 col-lg-4">

                          <div class="form-group">

                            <input type="text" class="form-control"  id="datepicker" name="filter_demoDate_start" placeholder="Start Date" autocomplete="off" value="<?php if(!empty($filter_demoDate_start)) { echo $filter_demoDate_start; } ?>">

                          </div>

                        </div>

                        <div class="col-xl-3 col-lg-4">

                          <div class="form-group">

                            <input type="text" class="form-control datepicker-switch" data-provide="datepicker" value="" id="datepicker" name="filter_demoDate_end" placeholder="End Date" autocomplete="off" value="<?php if(!empty($filter_demoDate_end)) { echo $filter_demoDate_end; } ?>">

                          </div>

                        </div>

                        <div class="col-xl-2 col-lg-4">

                          <div class="btn-group">

                            <button type="submit" value="Filter" name="search" class="btn btn-success">Search<button><br>

                            <!-- <a href="<?php echo base_url(); ?>welcome" class="btn btn-danger">Reset</a> -->

                          </div>

                          <div class="btn-group">

                            <!-- <button type="submit" value="Filter" name="search" class="btn btn-success">Search<button><br> -->

                            <a href="<?php echo base_url(); ?>welcome" class="btn btn-danger">Reset</a>

                          </div>

                        </div>

                      </div>

                    </form>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </section>

	

	<!-- <section class="filter_ratio d-inline-block w-100 position-relative pb-0">

		<div class="container-fluid">

			<div class="row justify-content-center">

				<div class="col-xl-4 col-lg-4 col-md-6 col-6">

					<button type="button" data-toggle="modal" data-target="#graph_block_modal" class="btn btn-info btn-block text-left filter_modal_btn">Filter Ratio <span class="d-inline-block float-right"><i class="fas fa-search"></i></span></button>

					<div class="modal fade" id="graph_block_modal">

					  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

					    <div class="modal-content">

					      <div class="modal-header">

					        <h5 class="modal-title">Filter Ratio</h5>

					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

					          <span aria-hidden="true">&times;</span>

					        </button>

					      </div>

					      <div class="modal-body">

					        <div class="graph_block_sec d-inline-block w-100 position-relative">

					        	<div class="row">

					        		<div class="col-lg-4 col-md-12">

					        			<div class="graph_box_block">

					        				<form method="post" action="<?php echo base_url(); ?>welcome">

					        					<div class="graph_box_block_1_form">

					        						<div class="btn-group w-100">

					        							<select class="form-control" name="filter_branch_data">

					        								<option>Select Branch</option>

					        								<?php foreach($branch_all as $row) {

                           										 if(in_array($row->branch_id,$branch_ids) || $_SESSION['logtype']=="Super Admin") { ?>

                                

                            								<option <?php if(@$filter_branch_data==$row->branch_id) { echo "selected"; } ?>  value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>                      

                        									<?php   } } ?>

					        							</select>

					        							

					        							<button type="submit" name="search_filter" value="Filter" class="btn btn-success">Filter</button>

					        							<a href="<?php echo base_url(); ?>welcome" class="btn btn-danger">Reset</a>

					        						</div>

					        					</div>

					        				</form>

					        				<div id="year_pie" style="width: 100%; height: 300px; margin: 30px auto 0"></div>

					        				<span class="total_demo_count">Total Demo : <span id="total_demo"></span></span>

					        			</div>

					        		</div>

					        		<div class="col-lg-4 col-md-12">

					        			<div class="graph_box_block">

					        				 <div id="3D_graf2" style="width: 100%; height: 300px; margin: 0 auto"></div>

					        				<span class="total_demo_count">Total Demo : <span id="demo_total"></span> </span>

					        			</div>

					        		</div>

					        		<div class="col-lg-4 col-md-12 mx-auto"  id="graph_wise_chart">

					        			<div class="graph_box_block">

					        				<select class="form-control" id="calendar123">

                    							<option value="">Time Selection</option>

                    						    <?php

                      								foreach ($grafwiseday_all as $row)

                       								{

                         								echo '<option value="'.$row->id.'">'.$row->name.'</option>';

                      								}

                     							?>                     

                     						</select>

                    						<div id="columnchart_material" style="width:100%;height: 300px; position: relative; margin: 0 auto " id="result"></div>

              



					        				<span class="total_demo_count">Total Demo : <span id="mt_demo"></span></span>

					        			</div>

					        		</div>

					        	</div>

					        </div>

					      </div>

					    </div>

					  </div>

					</div>

				</div>

				<div class="col-xl-4 col-lg-4 col-md-6 col-6">

					<button type="button" data-toggle="modal" data-target="#search_block" class="btn btn-info btn-block text-left filter_modal_btn">Filter Demo<span class="d-inline-block float-right"><i class="fas fa-search"></i></span></button>

					<div class="modal fade" id="search_block">

					  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

					    <div class="modal-content">

					      <div class="modal-header">

					        <h5 class="modal-title">Filter Ratio</h5>

					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

					          <span aria-hidden="true">&times;</span>

					        </button>

					      </div>

					      <div class="modal-body">

					       	<div class="search_block d-inline-block w-100">

					       		<form class="col-lg-12" method="post" action="<?php echo base_url(); ?>welcome">

					       			<div class="row">

					       				<div class="col-xl-3 col-lg-6">

					       					<div class="form-group">

					       						<select class="form-control"  name="filter_branch">

					       							<option value="">Select Branch</option>

					       							 <?php foreach($branch_all as $row) {

                            							if(in_array($row->branch_id,$branch_ids) || $_SESSION['logtype']=="Super Admin") { ?>

                                							<option <?php if(@$filter_branch==$row->branch_id) { echo "selected"; } ?>  value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>                      

                      								<?php   } } ?>

					       						</select>

					       					</div>

					       				</div>

					       				<div class="col-xl-3 col-lg-6">

					       					<div class="form-group">

					       						<select class="form-control" name="filter_department">

					       							<option value="">Department</option>

					       							<?php foreach($department_all as $val) {

                            							if(in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") { ?>

                              								<option  <?php if(@$filter_department==$val->department_id) { echo "selected"; } ?>    value="<?php echo $val->department_id; ?>"><?php echo $val->department_name; ?></option>

                            						<?php } } ?>

					       						</select>

					       					</div>

					       				</div>

					       				<div class="col-xl-6 col-lg-6">

					       					<div class="form-group">

					       						<select class="form-control" name="filter_faculty">

					       							<option value="">Faculty</option>

					       							<?php foreach($faculty_all as $val) {

                            							@$bids = explode(",",@$val->branch_ids);

                            							$bname="";

                            							for($i=0;$i<sizeof(@$bids);$i++)

                            							{

                                							foreach($branch_all as $row) 

                                							{   

                                    							if($row->branch_id==@$bids[$i]) { if($bname=="") { $bname = $bname." ".$row->branch_name;}else { $bname = $bname." & ".$row->branch_name; } }

                                							}

                            							}

                            						?>

                            

                              						<option  <?php if(@$filter_faculty==$val->faculty_id) { echo "selected"; } ?>    value="<?php echo $val->faculty_id; ?>"><?php echo $val->name; ?>-  <?php echo $val->department_name; ?>  - <?php echo $bname; ?></option>

                            						<?php } ?>

					       						</select>

					       					</div>

					       				</div>

					       				<div class="col-xl-5 col-lg-6">

					       					<div class="form-group">

					       						<select class="form-control" name="filter_course" >

					       							<option value="">Select Course</option>

					       							<?php foreach($course_all as $row) {  ?>

                      									<option <?php if(@$filter_course == $row->course_name) { echo "selected"; }  ?> value="<?php echo $row->course_name; ?>"><?php echo $row->course_name; ?></option>

                           							<?php } ?>

					       						</select>

					       					</div>

					       				</div>

					       				

					       				<div class="col-xl-3 col-lg-4">

					       					<div class="form-group">

					       						<input type="text" name="filter_demoName" placeholder="Student Name" class="form-control" value="<?php if(!empty($filter_demoName)) { echo $filter_demoName; } ?>">

					       					</div>

					       				</div>

					       				<div class="col-lg-3 col-lg-4">

					       					<div class="form-group">

					       						<input type="text" class="form-control" name="filter_demoId" placeholder="Demo ID "  value="<?php if(!empty($filter_demoId)) { echo $filter_demoId; } ?>">

					       					</div>

					       				</div>

					       				<div class="col-xl-4 col-lg-4">

					       					<div class="form-group">

					       						<input type="text" class="form-control"  id="" name="filter_phoneNo" placeholder="Filter Phone No" value="<?php if(!empty($filter_phoneNo)) { echo $filter_phoneNo; } ?>">

					       					</div>

					       				</div>

					       				<div class="col-xl-3 col-lg-4">

					       					<div class="form-group">

					       						<input type="text" class="form-control"  id="datepicker" name="filter_demoDate_start" placeholder="Start Date" autocomplete="off" value="<?php if(!empty($filter_demoDate_start)) { echo $filter_demoDate_start; } ?>">

					       					</div>

					       				</div>

					       				<div class="col-xl-3 col-lg-4">

					       					<div class="form-group">

					       						<input type="text" class="form-control datepicker-switch" data-provide="datepicker" value="" id="datepicker" name="filter_demoDate_end" placeholder="End Date" autocomplete="off" value="<?php if(!empty($filter_demoDate_end)) { echo $filter_demoDate_end; } ?>">

					       					</div>

					       				</div>

					       				<div class="col-xl-2 col-lg-4">

					       					<div class="btn-group">

					       						<button type="submit" value="Filter" name="search" class="btn btn-success">Search<button><br>

					       						 <a href="<?php echo base_url(); ?>welcome" class="btn btn-danger">Reset</a> 

					       					</div>

					       					<div class="btn-group">

					       						 <button type="submit" value="Filter" name="search" class="btn btn-success">Search<button><br> 

					       						<a href="<?php echo base_url(); ?>welcome" class="btn btn-danger">Reset</a>

					       					</div>

					       				</div>

					       			</div>

					       		</form>

					       	</div>

					      </div>

					    </div>

					  </div>

					</div>

				</div>

			</div>

		</div>

	</section> -->

	<!-- timing-wise demo  -->

  <section class="all_demo_student_block d-inline-block w-100 position-relative pb-0">

		<div class="container-fluid">

			<div class="row">

				<div class="col-lg-12">

					<div class="accordion" id="student_list_aoc">

					    <div class="card">

						    <div class="card-header mb-0">

						      <h2 class="mb-0">

						        <button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_1">

						        	 <?php 	date_default_timezone_set("Asia/Calcutta");

		                    			 	$time = time();

		                    				$current_hour =  date('H', $time); 

		                    				$current_hour = $current_hour-1;

		                    				if($current_hour==7) { $sdt = 7; $edt = 8; }

		                    				if($current_hour==8) { $sdt = 8; $edt = 9;  }

		                    				if($current_hour==9) { $sdt = 9;  $edt = 10; }

		                    				if($current_hour==10) { $sdt = 10;  $edt =11; }

		                    				if($current_hour==11) { $sdt =11;  $edt = 12; }

		                    				if($current_hour==12) { $sdt = 12;  $edt = 1; }

		                    				if($current_hour==13) { $sdt = 1; $edt = 2;  }

		                    				if($current_hour==14) { $sdt = 2;  $edt = 3; }

		                    				if($current_hour==15) { $sdt = 3; $edt = 4;  }

		                    				if($current_hour==16) { $sdt = 4;  $edt = 5; }

		                    				if($current_hour==17) { $sdt = 5;  $edt = 6; }

		                    				if($current_hour==18) { $sdt = 6; $edt = 7;  }

		                    				if($current_hour==19) { $sdt = 7;  $edt = 8; }

		                    				if($current_hour==20) { $sdt = 8; $edt = 9;  }

		                    				if($current_hour==21) { $sdt = 9;  $edt = 10; } ?>

						          <?php if(!empty($sdt)) { echo  "$sdt To $edt Timing Demo Students"; } ?>  <span class="d-inline-block pluse_icon ml-auto">✕</span>

						        </button>

						      </h2>

						    </div>

						    <div id="student_filter_panel_1" class="collapse" data-parent="#student_list_aoc">

						      <div class="card-body">

						      	<div class="take_demo_panel_group">

						      	<?php 

						      	// echo "<pre>";

						      	print_r(count($demo_all));



						      	foreach($demo_all as $val) { if($val->discard=="0") { if($val->demoStatus=="0") {

                  

                  				if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") {

                      					$isRelavent = false;    

                             			if($_SESSION['logtype']=="Faculty")

                             			{

                                 			if($val->course_type=="single")

                                 			{

                                    			if(in_array($val->courseName,$faculty_course_ids)) { $isRelavent=true;   }

                                 			}

                                 			if($val->course_type=="package")

                                 			{

                                     			if(in_array($val->packageName,$faculty_package_ids)) { $isRelavent=true;   }

                                 			}

                                  			if(in_array($val->startingCourse,$faculty_course_ids)) 

                         					{ 

                             					$isRelavent=true;   

                         					}

                             			}

                             

                             			if($isRelavent==true || $_SESSION['logtype']!="Faculty") 

                             			{

                      						$dtime = explode(":",$val->fromTime);

                        					if($dtime[0]==8)   {   $hour = 8;  }

                        					if($dtime[0]==9)   {   $hour = 9;  }

                        					if($dtime[0]==10)   {   $hour = 10;  }

                         					if($dtime[0]==11)   {   $hour = 11;  }

                           					if($dtime[0]==12)   {   $hour = 12;  }

                            				if($dtime[0]==1)   {   $hour = 13;  }

                             				if($dtime[0]==2)   {   $hour = 14;  }

                              				if($dtime[0]==3)   {   $hour = 15;  }

                               				if($dtime[0]==4)   {  $hour = 16;  }

                                			if($dtime[0]==5)   {   $hour = 17;  }

                                 			if($dtime[0]==6)   {   $hour = 18;  }

                                  			if($dtime[0]==7)   {   $hour = 19;  }

                       

                        					if($current_hour==$hour) 

                        					{

       											$date = date("Y-m-d");

          										$flag=0;

          										$day=0;

          										$all_att = explode("&&",$val->attendance);

        										for($i=0;$i<sizeof($all_att);$i++)

          										{

            										$att = explode("/",$all_att[$i]);

            										if($date==$att[0])

            										{

                										if($att[1]=="P")

                										{

                  											$flag = 1;

                										}

                										else if($att[1]=="A")

                										{

                    										$flag = 2;

                										}

            										}

            										if(@$att[1]=="P")

            										{

              											$day++; 

            										}

          										}

          										if($val->attendance=="") 

          										{ 

          											$day=0; 

          										}

          										if($flag==0) 

          										{

          									?>

						      	

						      		<!-- <div class="take_demo_panel" >

						      			<div class="col-lg-12">

						      				<div class="row">

						      					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">

						      						<div class="take_demo_panel_heading">

						      							<p class="student_name" title="Mobile No : <?php echo $val->mobileNo; ?>" data-toggle="tooltip"> <?php echo $val->name; ?> (<?php echo $val->demo_id; ?>)</p>

						      							<p><?php if($val->course_type=="Package") { echo $val->packageName; } else { echo $val->courseName; } ?></p>

						      						</div>

						      					</div>

						      					<div class="col-xl-2 col-lg-4 col-md-4 col-sm-4">

						      						<select class="<?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>" onchange="return getReson2(<?php  echo $val->demo_id; ?>)" id="demoStatus2<?php  echo $val->demo_id; ?>" name="demoStatus" style="border:none">

						      						    <option value="0">Running</option>

						      						    <option value="1">Done</option>

						      						    <option value="2">Leave</option>

						      						    <option value="3">Cancel</option>

						      						    <option value="4">Confusion</option>

						      						</select>

						      						<?php $stdate = explode("-",$val->demoDate); ?>

                                                

						      						<p class="demo_date">Start Date : <?php echo $stdate[2]."-".$stdate[1]."-".$stdate[0]; ?></p>

						      					</div>





						      					<?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

                                      			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">

													<ul>

											    		<li class="d-inline-block mr-3 mr-mr-0">

											    			<div class="form-check form-check-inline">

											    	    		<input class="form-check-input" type="radio" name="one" id="chake1" checked>

											    	    		<label class="form-check-label" for="chake1">P</label>

											    			</div>

											    			<div class="form-check form-check-inline">

											    	    		<input class="form-check-input" type="radio" id="chake2" name="one">

											    	    		<label class="form-check-label" for="chake2">A</label>

											    			</div>

											    		</li>

											    		<li class="d-inline-block">

											    			<p class="curent_date"><?php echo date("Y-m-d"); ?></p>

											    		</li>

													</ul>

												</div>

                                        		<?php } ?>



                                        		<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">		

                                        			<input type="hidden" name="demo_id" value="<?php  echo $val->demo_id; ?>">

                                            			<?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

                                             					<button type="button" style="display:none;" id="modal_button2<?php  echo $val->demo_id; ?>"  class="btn btn-sm btn-default pull-right" data-toggle="modal" data-target="#myModal_cancel2<?php echo $val->demo_id; ?>">Submit</button>

                                                				<input type="submit" id="formsubmit2<?php  echo $val->demo_id; ?>" name="take_attendance" value="Submit" class="btn btn-success btn-default pull-right">

                                                		<?php } ?>

                                                </div>

						      					

						      					

						      					<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">

						      						<a  class="demo_details_btn" onclick="return student_detail_record(<?php echo $val->demo_id; ?>)">

						      							<i class="fa fa-eye"></i>

						      						</a>

						      					</div>

						      					<div class="col-lg-12">

						      						<div class="progress" style="height:3px;">

                                            			<div class="progress-bar <?php if($day>5) { ?>  <?php } ?>" style="width:<?php if($day==0) { echo "0%"; } else if($day==1) { echo "20%"; } else if($day==2) { echo "40%"; } else if($day==3) { echo "60%"; } else if($day==4) { echo "80%"; } else if($day>=5) { echo "100%"; } ?>; ">

                                            			</div>

                                          			</div>

						      					</div>

						      					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">

						      						<p class="student_status"><?php echo $day; ?> Day</p>

						      					</div>



						      					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">

						      						<?php if(!empty($val->attendance)) { ?>

						      							<button type="button" class="btn  btn-xs <?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>" onclick="return get_student_attendance_follow(<?php echo $val->demo_id; ?>)">Attendance & follow up</button>

						      						<?php } else { ?>	

						      							<p class="student_status" style="background-color:#06C; padding:0 2px 0 2px;">New Demo Student</p>

						      						<?php } ?>

						      					</div>



						      					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">

						      						<p class="demo_time"> Time :  <?php echo $val->fromTime; ?> To <?php echo $val->toTime; ?> </p>

						      					</div>

						      					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">

						      						<p class="demo_student_faculty">Assign To : <?php foreach($faculty_all as $row) { if($val->faculty_id==$row->faculty_id) {   echo $row->name; } }  ?></p>

						      					</div>

						      				</div>

						      			</div>



						      		</div> -->

						      	     

						      	

						      	<?php } } } } } } }?>	

								</div>

						      </div>

						    </div>

					    </div>

					    <div class="card">

						    <div class="card-header mb-0">

						      <h2 class="mb-0">

						        <button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_2">

						        	   <?php 	date_default_timezone_set("Asia/Calcutta");

                    							$time = time();

                    							$current_hour =  date('H', $time); 

                    							if($current_hour==7) { $sdt = 7; $edt = 8; }

                    							if($current_hour==8) { $sdt = 8; $edt = 9;  }

                    							if($current_hour==9) { $sdt = 9;  $edt = 10; }

                    							if($current_hour==10) { $sdt = 10;  $edt =11; }

                    							if($current_hour==11) { $sdt =11;  $edt = 12; }

                    							if($current_hour==12) { $sdt = 12;  $edt = 1; }

                    							if($current_hour==13) { $sdt = 1; $edt = 2;  }

                    							if($current_hour==14) { $sdt = 2;  $edt = 3; }

                    							if($current_hour==15) { $sdt = 3; $edt = 4;  }

                   								if($current_hour==16) { $sdt = 4;  $edt = 5; }

                   							 	if($current_hour==17) { $sdt = 5;  $edt = 6; }

                    							if($current_hour==18) { $sdt = 6; $edt = 7;  }

                    							if($current_hour==19) { $sdt = 7;  $edt = 8; }

                   							 	if($current_hour==20) { $sdt = 8; $edt = 9;  }

                    							if($current_hour==21) { $sdt = 9;  $edt = 10; }?>

						         <?php if(!empty($sdt)) { echo $sdt." To ".$edt." Timing Demo Students";    } ?> <span class="d-inline-block float-right pluse_icon">✕</span>

						        </button>

						      </h2>

						    </div>

						    <div id="student_filter_panel_2" class="collapse" data-parent="#student_list_aoc">

						      	<div class="card-body">

						      	    <?php foreach($demo_all as $val) { if($val->discard=="0") { if($val->demoStatus=="0") {    

                  						if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") {

                      							          $isRelavent = false;    

							                             if($_SESSION['logtype']=="Faculty")

							                             {

							                                 if($val->course_type=="single")

							                                 {

							                                    

							                                     if(in_array($val->courseName,$faculty_course_ids)) { $isRelavent=true;   }

							                                 }

							                                 if($val->course_type=="package")

							                                 {

							                                     if(in_array($val->packageName,$faculty_package_ids)) { $isRelavent=true;   }

							                                 }

							                                  if(in_array($val->startingCourse,$faculty_course_ids)) 

							                         { 

							                             $isRelavent=true;   

							                             

							                         }

							                                 

							                             }

                             

                             if($isRelavent==true || $_SESSION['logtype']!="Faculty") {

                      

                      

                      $dtime = explode(":",$val->fromTime);

                        if($dtime[0]==8)   {   $hour = 8;  }

                        if($dtime[0]==9)   {   $hour = 9;  }

                        if($dtime[0]==10)   {   $hour = 10;  }

                         if($dtime[0]==11)   {   $hour = 11;  }

                           if($dtime[0]==12)   {   $hour = 12;  }

                            if($dtime[0]==1)   {   $hour = 13;  }

                             if($dtime[0]==2)   {   $hour = 14;  }

                              if($dtime[0]==3)   {   $hour = 15;  }

                               if($dtime[0]==4)   {  $hour = 16;  }

                                if($dtime[0]==5)   {   $hour = 17;  }

                                 if($dtime[0]==6)   {   $hour = 18;  }

                                  if($dtime[0]==7)   {   $hour = 19;  }

                       

                        if($current_hour==$hour) {

                        

          

          

          $date = date("Y-m-d");

          $flag=0;

          $day=0;

          $all_att = explode("&&",$val->attendance);

          

          for($i=0;$i<sizeof($all_att);$i++)

          {

            $att = explode("/",$all_att[$i]);

            if($date==$att[0])

            {

                if($att[1]=="P")

                {

                  $flag = 1;

                }

                else if($att[1]=="A")

                {

                    $flag = 2;

                    

                }

            }

            if(@$att[1]=="P")

            {

              $day++; 

            }

          }

          

          if($val->attendance=="") { $day=0; }

          

          if($flag==0) {

          

           ?>

           			    <div class="take_demo_panel_group">

						      		<div class="take_demo_panel" >

						      			<div class="col-lg-12">

						      				<div class="row">

						      					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">

						      						<div class="take_demo_panel_heading">

						      							<p class="student_name" title="Mobile No : <?php echo $val->mobileNo; ?>" data-toggle="tooltip"> <?php echo $val->name; ?> (<?php echo $val->demo_id; ?>)</p>

						      							<p><?php if($val->course_type=="package") { echo $val->packageName; } else { echo $val->courseName; } ?></p>

						      						</div>

						      					</div>

						      					<div class="col-xl-2 col-lg-4 col-md-4 col-sm-4">

						      						<select class="<?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>" onchange="return getReson2(<?php  echo $val->demo_id; ?>)" id="demoStatus2<?php  echo $val->demo_id; ?>" name="demoStatus" style="border:none">

						      						    <option value="0">Running</option>

						      						    <option value="1">Done</option>

						      						    <option value="2">Leave</option>

						      						    <option value="3">Cancel</option>

						      						    <option value="4">Confusion</option>

						      						</select>

						      						<?php $stdate = explode("-",$val->demoDate); ?>

                                                

						      						<p class="demo_date">Start Date : <?php echo $stdate[2]."-".$stdate[1]."-".$stdate[0]; ?></p>

						      					</div>





						      					<?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

						      					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">

													<ul>

											    		<li class="d-inline-block mr-3 mr-mr-0">

											    			<div class="form-check form-check-inline">

											    	    		<input type="radio" checked id="radioP2" name="att" onclick="whichSelect2(<?php  echo $val->demo_id; ?>,'P')" value="P">P

											    	    		<!-- <label class="form-check-label" for="radioP2">P</label> -->

											    			</div>

											    			<div class="form-check form-check-inline">

											    	    		<input type="radio" name="att" id="radioA2" onclick="whichSelect2(<?php  echo $val->demo_id; ?>,'A')" value="A">A

											    	    		<!-- <label class="form-check-label" for="radioA2">A</label> -->

											    			</div>

											    		</li>

											    		<li class="d-inline-block">

											    			<p class="curent_date"><?php echo date("Y-m-d"); ?></p>

											    		</li>

													</ul>

												</div>

												<?php } ?>



                                        		<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">		

                                        			<input type="hidden" name="demo_id" value="<?php  echo $val->demo_id; ?>">

                                            			<?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

                                             					<button type="button" style="display:none;" id="modal_button2<?php  echo $val->demo_id; ?>"  class="btn btn-sm btn-default pull-right" data-toggle="modal" data-target="#myModal_cancel2<?php echo $val->demo_id; ?>">Submit</button>

                                                				<input type="submit" id="formsubmit2<?php  echo $val->demo_id; ?>" name="take_attendance" value="Submit" class="btn btn-success btn-default pull-right">

                                                		<?php } ?>

                                                </div>

						      					

						      					

						      					<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">

						      						<a  class="demo_details_btn" onclick="return student_detail_record(<?php echo $val->demo_id; ?>)">

						      							<i class="fa fa-eye"></i>

						      						</a>

						      					</div>

						      					<div class="col-lg-12">

						      						<div class="progress" style="height:3px;">

                                            			<div class="progress-bar <?php if($day>5) { ?>  <?php } ?>" style="width:<?php if($day==0) { echo "0%"; } else if($day==1) { echo "20%"; } else if($day==2) { echo "40%"; } else if($day==3) { echo "60%"; } else if($day==4) { echo "80%"; } else if($day>=5) { echo "100%"; } ?>; ">

                                            			</div>

                                          			</div>

						      					</div>

						      					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">

						      						<p class="student_status"><?php echo $day; ?> Day</p>

						      					</div>



						      					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">

						      						<?php if(!empty($val->attendance)) { ?>

						      							<button type="button" class="btn  btn-xs <?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>"  onclick="return get_student_attendance_follow(<?php echo $val->demo_id; ?>)">Attendance & follow up</button>

						      						<?php } else { ?>	

						      							<p class="student_status" style="background-color:#06C; padding:0 2px 0 2px;">New Demo Student</p>

						      						<?php } ?>

						      					</div>



						      					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">

						      						<p class="demo_time"> Time :  <?php echo $val->fromTime; ?> To <?php echo $val->toTime; ?> </p>

						      					</div>

						      					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">

						      						<p class="demo_student_faculty">Assign To : <?php foreach($faculty_all as $row) { if($val->faculty_id==$row->faculty_id) {   echo $row->name; } }  ?></p>

						      					</div>

						      				</div>

						      			</div>



						      		</div>

						      	     

						      	</div>

						      <?php } } } } } } } ?>			

						      </div>

						    </div>

					    </div>

					    <div class="card">

						    <div class="card-header mb-0">

						      <h2 class="mb-0">

						        <button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_3">

						        	  <?php date_default_timezone_set("Asia/Calcutta");

                    						$time = time();

                    						$current_hour =  date('H', $time); 

                    						$current_hour = $current_hour+1;

                    						if($current_hour==7) { $sdt = 7; $edt = 8; }

                    						if($current_hour==8) { $sdt = 8; $edt = 9;  }

                    						if($current_hour==9) { $sdt = 9;  $edt = 10; }

                    						if($current_hour==10) { $sdt = 10;  $edt =11; }

                    						if($current_hour==11) { $sdt =11;  $edt = 12; }

                    						if($current_hour==12) { $sdt = 12;  $edt = 1; }

                    						if($current_hour==13) { $sdt = 1; $edt = 2;  }

                    						if($current_hour==14) { $sdt = 2;  $edt = 3; }

                    						if($current_hour==15) { $sdt = 3; $edt = 4;  }

                    						if($current_hour==16) { $sdt = 4;  $edt = 5; }

                    						if($current_hour==17) { $sdt = 5;  $edt = 6; }

                    						if($current_hour==18) { $sdt = 6; $edt = 7;  }

                    						if($current_hour==19) { $sdt = 7;  $edt = 8; }

                    						if($current_hour==20) { $sdt = 8; $edt = 9;  }

                    						if($current_hour==21) { $sdt = 9;  $edt = 10; }?>

						          <?php if(!empty($sdt)) { echo $sdt." To ".$edt." Timing Demo Students";    } ?>  <span class="d-inline-block float-right pluse_icon">✕</span>

						        </button>

						      </h2>

						    </div>

						    <div id="student_filter_panel_3" class="collapse" data-parent="#student_list_aoc">

						      <div class="card-body">

						      	 <?php foreach($demo_all as $val) { if($val->discard=="0") { if($val->demoStatus=="0") {

                  

                  if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") {

                      

                      $isRelavent = false;    

                             if($_SESSION['logtype']=="Faculty")

                             {

                                 if($val->course_type=="single")

                                 {

                                    

                                     if(in_array($val->courseName,$faculty_course_ids)) { $isRelavent=true;   }

                                 }

                                 if($val->course_type=="package")

                                 {

                                     if(in_array($val->packageName,$faculty_package_ids)) { $isRelavent=true;   }

                                 }

                                  if(in_array($val->startingCourse,$faculty_course_ids)) 

                         { 

                             $isRelavent=true;   

                             

                         }

                                 

                             }

                             

                             if($isRelavent==true || $_SESSION['logtype']!="Faculty") {

                      

                      

                      $dtime = explode(":",$val->fromTime);

                        if($dtime[0]==8)   {   $hour = 8;  }

                        if($dtime[0]==9)   {   $hour = 9;  }

                        if($dtime[0]==10)   {   $hour = 10;  }

                         if($dtime[0]==11)   {   $hour = 11;  }

                           if($dtime[0]==12)   {   $hour = 12;  }

                            if($dtime[0]==1)   {   $hour = 13;  }

                             if($dtime[0]==2)   {   $hour = 14;  }

                              if($dtime[0]==3)   {   $hour = 15;  }

                               if($dtime[0]==4)   {  $hour = 16;  }

                                if($dtime[0]==5)   {   $hour = 17;  }

                                 if($dtime[0]==6)   {   $hour = 18;  }

                                  if($dtime[0]==7)   {   $hour = 19;  }

                       

                        if($current_hour==$hour) {

                        

          

          

          $date = date("Y-m-d");

          $flag=0;

          $day=0;

          $all_att = explode("&&",$val->attendance);

          

          for($i=0;$i<sizeof($all_att);$i++)

          {

            $att = explode("/",$all_att[$i]);

            if($date==$att[0])

            {

                if($att[1]=="P")

                {

                  $flag = 1;

                }

                else if($att[1]=="A")

                {

                    $flag = 2;

                    

                }

            }

            if(@$att[1]=="P")

            {

              $day++; 

            }

          }

          

          if($val->attendance=="") { $day=0; }

          

          if($flag==0) {

          

           ?>

						      	<div class="take_demo_panel_group">

						      		<div class="take_demo_panel" >

						      			<div class="col-lg-12">

						      				<div class="row">

						      					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">

						      						<div class="take_demo_panel_heading">

						      							<p class="student_name" title="Mobile No : <?php echo $val->mobileNo; ?>" data-toggle="tooltip"> <?php echo $val->name; ?> (<?php echo $val->demo_id; ?>)</p>

						      							<p><?php if($val->course_type=="package") { echo $val->packageName; } else { echo $val->courseName; } ?></p>

						      						</div>

						      					</div>

						      					<div class="col-xl-2 col-lg-4 col-md-4 col-sm-4">

						      						<select class="<?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>" onchange="return getReson2(<?php  echo $val->demo_id; ?>)" id="demoStatus2<?php  echo $val->demo_id; ?>" name="demoStatus" style="border:none">

						      						    <option value="0">Running</option>

						      						    <option value="1">Done</option>

						      						    <option value="2">Leave</option>

						      						    <option value="3">Cancel</option>

						      						    <option value="4">Confusion</option>

						      						</select>

						      						<?php $stdate = explode("-",$val->demoDate); ?>

                                                

						      						<p class="demo_date">Start Date : <?php echo $stdate[2]."-".$stdate[1]."-".$stdate[0]; ?></p>

						      					</div>





						      					<?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

                                      			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">

													<ul>

											    		<li class="d-inline-block mr-3 mr-mr-0">

                                                            <div class="form-check form-check-inline">

                                                                <input type="radio" checked id="radioP2" name="att" onclick="whichSelect2(<?php  echo $val->demo_id; ?>,'P')" value="P">P

                                                                <!-- <label class="form-check-label" for="radioP2">P</label> -->

                                                            </div>

                                                            <div class="form-check form-check-inline">

                                                                <input type="radio" name="att" id="radioA2" onclick="whichSelect2(<?php  echo $val->demo_id; ?>,'A')" value="A">A

                                                                <!-- <label class="form-check-label" for="radioA2">A</label> -->

                                                            </div>

                                                        </li>

											    		<li class="d-inline-block">

											    			<p class="curent_date"><?php echo date("Y-m-d"); ?></p>

											    		</li>

													</ul>

												</div>

                                        		<?php } ?>



                                        		<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">		

                                        			<input type="hidden" name="demo_id" value="<?php  echo $val->demo_id; ?>">

                                            			<?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

                                             					<button type="button" style="display:none;" id="modal_button<?php  echo $val->demo_id; ?>"  class="btn btn-sm btn-default pull-right" data-toggle="modal" data-target="#myModal_cancel<?php echo $val->demo_id; ?>">Submit</button>

                                                				<input type="submit" id="formsubmit2<?php  echo $val->demo_id; ?>" name="take_attendance" value="Submit" class="btn btn-success btn-default pull-right">

                                                		<?php } ?>

                                                </div>

						      					

						      					

						      					<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">

						      						<a class="demo_details_btn" onclick="return student_detail_record(<?php echo $val->demo_id; ?>)">

						      							<i class="fa fa-eye"></i>

						      						</a>

						      					</div>

						      					<div class="col-lg-12">

						      						<div class="progress" style="height:3px;">

                                            			<div class="progress-bar <?php if($day>5) { ?>  <?php } ?>" style="width:<?php if($day==0) { echo "0%"; } else if($day==1) { echo "20%"; } else if($day==2) { echo "40%"; } else if($day==3) { echo "60%"; } else if($day==4) { echo "80%"; } else if($day>=5) { echo "100%"; } ?>; ">

                                            			</div>

                                          			</div>

						      					</div>

						      					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">

						      						<p class="student_status"><?php echo $day; ?> Day</p>

						      					</div>



						      					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">

						      						<?php if(!empty($val->attendance)) { ?>

						      							<button type="button" class="btn  btn-xs <?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>"  onclick="return get_student_attendance_follow(<?php echo $val->demo_id; ?>)">Attendance & follow up</button>

						      						<?php } else { ?>	

						      							<p class="student_status" style="background-color:#06C; padding:0 2px 0 2px;">New Demo Student</p>

						      						<?php } ?>

						      					</div>



						      					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">

						      						<p class="demo_time"> Time :  <?php echo $val->fromTime; ?> To <?php echo $val->toTime; ?> </p>

						      					</div>

						      					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">

						      						<p class="demo_student_faculty">Assign To : <?php foreach($faculty_all as $row) { if($val->faculty_id==$row->faculty_id) {   echo $row->name; } }  ?></p>

						      					</div>

						      				</div>

						      			</div>



						      		</div>

						      	     

						      	</div> 

						      <?php } } } } } } } ?>	

						      </div>

						    </div>

					    </div>

					    

					</div>

				</div>

			</div>

		</div>

	</section>

	<?php if(@$this->session->flashdata('discard_alert')){ ?>



		<div class="alert alert-success">

		    <?php echo $this->session->flashdata('discard_alert'); ?>

		</div>



	<?php } ?>

	<!-- demo table -->

	<section>

		<div class="container-fluid">

			<div class="row">

	            <div class="col-12">

	              <div class="card card-statistic p-0">

	                <div class="card-header d-flex bg-white">

	                  <!-- <h4>Assign Task Table</h4> -->

	                  <h4><b>Take Demo Attendance &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp; <?php if($_SESSION['logtype']!="Faculty") { echo "Total Demo : ".$all_today_new." &nbsp;&nbsp; P : ".$all_new_pr." &nbsp;&nbsp; A : ".$all_new_ab." &nbsp;&nbsp; Pending Attendance : ".$ttpend;  } ?></b></h4>

	                  <div class="card-header-form">

	                    <form>

	                      <div class="input-group">

	                        <input type="text" class="form-control" placeholder="Search">

	                        <div class="input-group-btn">

	                          <button class="btn btn-primary"><i class="fas fa-search"></i></button>

	                        </div>

	                      </div>

	                    </form>

	                  </div>

	                </div>

	                <div class="card-body p-0">

	                  	<div class="table-responsive">

	                    	<table class="table table-striped" style="font-size: 12px;">

	                      		<tbody>

	                      			<tr class="text-left bg-info text-white">

                                <!-- <th class="text-center">

                                        <div class="custom-checkbox custom-checkbox-table custom-control">

        			                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">

        			                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>

        			                          </div>

                                      </th> -->

                        				<th>Student Name</th>

                                <th>WhatsApp</th>

                        				<th>Course Name</th>

                        				<th>Starting Date</th>

                        				<th>Demo Status</th>	                       

                        				<th>Demo Progress</th>	                       

                        				<th>Time</th>

                        				<th>Assigned</th>	                        

                        				<th>Attendance</th>

                        				<th>Action</th>

                        				<th>Action_Btn</th>

                      				</tr>

	                      			<tr>

	                      				<?php

                                  if(isset($demo_data)) 

                                  {

                                    foreach($demo_data as $val) { if($val->discard=="0") { if($val->demoStatus=="0") {

                                      if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") {

                                        $isRelavent = false;    

                                        if($_SESSION['logtype']=="Faculty")

                                        {

                                          if($val->course_type=="single")

                                          {

                                            if(in_array($val->courseName,$faculty_course_ids)) { $isRelavent=true;  }

                                          }

                                          if($val->course_type=="package")

                                          {

                                            if(in_array($val->packageName,$faculty_package_ids)) { $isRelavent=true;   }

                                          }

                                          if(in_array($val->startingCourse,$faculty_course_ids)) 

                                          { 

                                            $isRelavent=true;   

                                          }

                                        }	

                                        if($isRelavent==true || $_SESSION['logtype']!="Faculty") 

                                        {

                                          $date = date("Y-m-d");

                                          $flag=0;

                                          $day=0;

                                          $all_att = explode("&&",$val->attendance);                      

                                          for($i=0;$i<sizeof($all_att);$i++)

                                          {

                                            $att = explode("/",$all_att[$i]);

                                            if($date==$att[0])

                                            {

                                              if($att[1]=="P")

                                              {

                                                $flag = 1;

                                              }

                                              else if($att[1]=="A")

                                              {

                                                $flag = 2;

                                              }

                                            }

                                            if(@$att[1]=="P")

                                            {

                                              $day++; 

                                            }

                                          }

                                          if($val->attendance=="") 

                                          { 

                                            $day=0; 

                                          }         

                                ?>

				                        <!-- <td class="p-0 text-center">

				                          <div class="custom-checkbox custom-control">

				                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">

				                            <label for="checkbox-1" class="custom-control-label">&nbsp;</label>

				                          </div>

				                        </td> -->

				                        <td>

				                        	<p class="student_name" title="Mobile No : <?php echo $val->mobileNo; ?>" data-toggle="tooltip"> <?php echo $val->name; ?> (<?php echo $val->demo_id; ?>)</p>

                                </td>

                                <td>

                                  <a href="https://api.whatsapp.com/send?phone=91<?php echo $val->mobileNo; ?>" target="blank" title="Sent Whatsapp Message" style="color: green;"><i class="fab fa-whatsapp"></i></a>

                                </td>

                                <td>

                                  <p><?php if($val->course_type=="package") { echo $val->packageName; } else { echo $val->courseName; } ?></p>

                                </td>

                                <td>

                                  <p class="demo_date"><?php echo @$stdate[2]."-".@$stdate[1]."-".@$stdate[0]; ?></p>	

                                </td>

                                <td>

                                  <form method="post" action="<?php echo base_url(); ?>welcome">

                                    <select class="<?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>" onchange="return getReson2(<?php  echo $val->demo_id; ?>)" id="demoStatus2<?php  echo $val->demo_id; ?>" name="demoStatus" style="border:none">

                                      <option value="0">Running</option>

                                      <option value="1">Done</option>

                                      <option value="2">Leave</option>

                                      <option value="3">Cancel</option>

                                      <option value="4">Confusion</option>

                                    </select>

                                    <?php $stdate = explode("-",$val->demoDate); ?>   

                                  </form>

                                </td>

                                <td class="align-middle">

                          					<!-- <div class="progress-text">50%</div>

                          					<div class="progress" data-height="6" style="height: 6px;">

                            					<div class="progress-bar bg-success" data-width="50%" style="width: 50%;"></div>

                          					</div> -->

                          					<div class="progress" style="height:5px;">

                                			<div class="progress-bar <?php if(@$day>5) { ?>  <?php } ?>" style="width:<?php if(@$day==0) { echo "0%"; } else if(@$day==1) { echo "20%"; } else if(@$day==2) { echo "40%"; } else if($day==3) { echo "60%"; } else if(@$day==4) { echo "80%"; } else if(@$day>=5) { echo "100%"; } ?>; ">

                                			</div>

                              			</div>

                        				</td>

                        				<td>

                        					<p class="demo_time"><?php echo $val->fromTime; ?> To <?php echo $val->toTime; ?> </p>

                        				</td>

                        				<td>

                        					<p class="demo_student_faculty"><?php foreach($faculty_all as $row) { if($val->faculty_id==$row->faculty_id) {   echo $row->name; } }  ?></p>

                        				</td>

                        				<td>

                        					<?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

                                  <ul>

                                    <li class="d-inline-block mr-3 mr-mr-0">

                                        <div class="form-check form-check-inline">

                                            <input type="radio" checked id="radioP2" name="att" onclick="whichSelect2(<?php  echo $val->demo_id; ?>,'P')" value="P">P

                                            <!-- <label class="form-check-label" for="radioP2">P</label> -->

                                        </div>

                                        <div class="form-check form-check-inline">

                                            <input type="radio" name="att" id="radioA2" onclick="whichSelect2(<?php  echo $val->demo_id; ?>,'A')" value="A">A
                                            <!-- <label class="form-check-label" for="radioA2">A</label> -->

                                        </div>

                                    </li>

                                    <li class="d-inline-block">

                                      <p class="curent_date"><?php echo date("Y-m-d"); ?></p>

                                      <input type="hidden" name="attDate" value="<?php echo date('Y-m-d'); ?>">

                                    </li>

                                  </ul>

                                  <?php } ?>                        					

                        				</td>

                        				<td>

                        					<a  class="demo_details_btn" onclick="return student_detail_record(<?php echo $val->demo_id; ?>)">

                                    <i class="fa fa-eye"></i>

						      				        </a>

                              		<a  class="demo_details_btn create_new_lead" onclick="return demo_student_history(<?php echo $val->demo_id; ?>)">

                                		<i class="fa fa-history"></i>

                              		</a>

                        				</td>

                        				<td>

                        					<input type="hidden" name="demo_id" value="<?php  echo $val->demo_id; ?>">

						                    	<?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

						                     	<button type="button" style="display:none;" id="modal_button2<?php  echo $val->demo_id; ?>"  class="btn btn-sm pull-right" data-toggle="modal" data-target="#myModal_cancel2<?php echo $val->demo_id; ?>">Submit</button>

						                        <input type="submit" id="formsubmit2<?php  echo $val->demo_id; ?>" name="take_attendance" value="Submit" class="btn-sm btn-primary btn-default pull-right">

						                        		<?php } ?>

                        				</td>

				                        <!-- <td class="text-truncate">

				                          <ul class="list-unstyled order-list m-b-0 m-b-0">

				                            <li class="team-member team-member-sm"><img class="rounded-circle" src="assets/img/users/user-8.png" alt="user" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>

				                            <li class="team-member team-member-sm"><img class="rounded-circle" src="assets/img/users/user-9.png" alt="user" data-toggle="tooltip" title="" data-original-title="John Deo"></li>

				                            <li class="team-member team-member-sm"><img class="rounded-circle" src="assets/img/users/user-10.png" alt="user" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>

				                            <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>

				                          </ul>

				                        </td> -->

				                        <!-- <td>

				                          <div class="badge badge-success">Low</div>

			                        </td> -->

	                      			</tr>

	                      			<?php } } } } } } ?>

	                    		</tbody>

	                    	</table>

	                  	</div>

	                </div>

	              </div>

	            </div>

          </div>

		</div>

	</section>

	<!-- <section class="take_demo_sec d-inline-block w-100 position-relative">

		<div class="container-fluid">

			<div class="row">

				<div class="col-lg-12">

					<div class="take_demo_heading">

						<h3>Take Demo Attendance &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp; <?php if($_SESSION['logtype']!="Faculty") { echo "Total Demo : ".$all_today_new." &nbsp;&nbsp; P : ".$all_new_pr." &nbsp;&nbsp; A : ".$all_new_ab." &nbsp;&nbsp; Pending Attendance : ".$ttpend;  } ?> </h3>

					</div>

					<div class="take_demo_panel_group">

					<?php

              			if(isset($demo_data)) {

              				foreach($demo_data as $val) { if($val->discard=="0") { if($val->demoStatus=="0") {

                			if(in_array($val->branch_id,$branch_ids)  && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") {

                				$isRelavent = false;    

                             	if($_SESSION['logtype']=="Faculty")

                             	{

                                	if($val->course_type=="single")

                                 	{

                                    	if(in_array($val->courseName,$faculty_course_ids)) { $isRelavent=true;   }

                                 	}

                                 	if($val->course_type=="package")

                                 	{

                                    	if(in_array($val->packageName,$faculty_package_ids)) { $isRelavent=true;   }

                                 	}

                                  	if(in_array($val->startingCourse,$faculty_course_ids)) 

                                 	{ 

                                    	$isRelavent=true;   

                                    }

                             	}	

                             	if($isRelavent==true || $_SESSION['logtype']!="Faculty") {

          							$date = date("Y-m-d");

									$flag=0;

									$day=0;

									$all_att = explode("&&",$val->attendance);                      

									for($i=0;$i<sizeof($all_att);$i++)

									{

										$att = explode("/",$all_att[$i]);

										if($date==$att[0])

										{

											if($att[1]=="P")

											{

												$flag = 1;

											}

											else if($att[1]=="A")

											{

												$flag = 2;

											}

										}

										if(@$att[1]=="P")

										{

											$day++; 

										}

									}

									if($val->attendance=="") { $day=0; }         

           							?>

          							<div class="take_demo_panel" >

										<div class="col-lg-12">

											<div class="row">

												<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">

												    <div class="take_demo_panel_heading">

						      							<p class="student_name" title="Mobile No : <?php echo $val->mobileNo; ?>" data-toggle="tooltip"> <?php echo $val->name; ?> (<?php echo $val->demo_id; ?>)</p>

						      							<p><?php if($val->course_type=="Package") { echo $val->packageName; } else { echo $val->courseName; } ?></p>

						      						</div>

						      					</div>

						      					<div class="col-xl-2 col-lg-4 col-md-4 col-sm-4">

						      						<form method="post" action="<?php echo base_url(); ?>welcome">

						      							<select class="<?php if($flag==1) { ?> bg-green  <?php } else if($flag==2) { ?>  bg-red  <?php } else { ?> bg-yellow <?php } ?>" onchange="return getReson2(<?php  echo $val->demo_id; ?>)" id="demoStatus2<?php  echo $val->demo_id; ?>" name="demoStatus" style="border:none">

							      						    <option value="0">Running</option>

							      						    <option value="1">Done</option>

							      						    <option value="2">Leave</option>

							      						    <option value="3">Cancel</option>

							      						    <option value="4">Confusion</option>

							      						</select>

						      							<?php $stdate = explode("-",$val->demoDate); ?>        

						      						</form>                

						      						<p class="demo_date">Start Date : <?php echo $stdate[2]."-".$stdate[1]."-".$stdate[0]; ?></p>

						      					</div>

						      					<?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

							              			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">

														<ul>

												    		<li class="d-inline-block mr-3 mr-mr-0">

												    			<div class="form-check form-check-inline">

												    	    		<input class="form-check-input" type="radio" name="att" id="chake1" checked value="P">

												    	    		<label class="form-check-label" for="chake1">P</label>

												    			</div>

												    			<div class="form-check form-check-inline">

												    	    		<input class="form-check-input" type="radio" id="chake2" name="att" value="A">

												    	    		<label class="form-check-label" for="chake2">A</label>

												    			</div>

												    		</li>

												    		<li class="d-inline-block">

												    			<p class="curent_date"><?php echo date("Y-m-d"); ?></p>

												    			<input type="hidden" name="attDate" value="<?php echo date('Y-m-d'); ?>">

												    		</li>

														</ul>

													</div>

						                		<?php } ?>

						                		<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">		

						                			<input type="hidden" name="demo_id" value="<?php  echo $val->demo_id; ?>">

						                    			<?php if(in_array("Take Attendance=1",$user_permission) || $_SESSION['logtype']=="Super Admin") { ?>

						                     					<button type="button" style="display:none;" id="modal_button2<?php  echo $val->demo_id; ?>"  class="btn btn-sm btn-default pull-right" data-toggle="modal" data-target="#myModal_cancel2<?php echo $val->demo_id; ?>">Submit</button>

						                        				<input type="submit" id="formsubmit2<?php  echo $val->demo_id; ?>" name="take_attendance" value="Submit" class="btn btn-success btn-default pull-right">

						                        		<?php } ?>

						                        </div>      										      					

						      					<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">

						      						<a  class="demo_details_btn" onclick="return student_detail_record(<?php echo $val->demo_id; ?>)">

						      							<i class="fa fa-eye"></i>

						      						</a>

						      						<a  class="demo_details_btn create_new_lead" onclick="return demo_student_history(<?php echo $val->demo_id; ?>)">

						        						<i class="fa fa-history"></i>

						      						</a>

						      					</div>

						      					<div class="col-lg-12">

						      						<div class="progress" style="height:5px;">

						                    			<div class="progress-bar <?php if($day>5) { ?>  <?php } ?>" style="width:<?php if($day==0) { echo "0%"; } else if($day==1) { echo "20%"; } else if($day==2) { echo "40%"; } else if($day==3) { echo "60%"; } else if($day==4) { echo "80%"; } else if($day>=5) { echo "100%"; } ?>; ">

						                    			</div>

						                  			</div>

						      					</div>

						      					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" style="margin-top:8px;">

						      						<p class="student_status"><?php echo $day; ?> Day</p>

						      					</div>

						      					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" style="margin-top:8px;">

						      						<?php if(!empty($val->attendance)) { ?>

						      							<button type="button" style="color:white;border:none;" class="student_status student_status_running d-inline-block p-1"  onclick="return get_student_attendance_follow(<?php echo $val->demo_id; ?>)">Attendance & follow up</button>

						      						<?php } else { ?>	

						      							<p class="student_status student_status_new d-inline-block p-1" style="background-color:#06C; padding:10px 2px 0 2px;">New Demo Student</p>

						      						<?php } ?>

						      					</div>

						      					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" style="margin-top:8px;">

						      						<p class="demo_time"> Time :  <?php echo $val->fromTime; ?> To <?php echo $val->toTime; ?> </p>

						      					</div>

						      					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" style="margin-top:8px;">

						      						<p class="demo_student_faculty">Assign To : <?php foreach($faculty_all as $row) { if($val->faculty_id==$row->faculty_id) {   echo $row->name; } }  ?></p>

						      					</div>

						      				</div>

										</div>

									</div>

					<?php } } } } } } ?>

					</div>

				</div>

			</div>

		</div>

	</section> -->

         <!--  <div class="new_lead_genered_btn">

            <a href="javascript:void(0)" class="create_new_lead"><i class="fas fa-plus"></i></a>

          </div> -->

 </main>





<!--demo right side bar -->

<div class="right_side d-inline-block">

  <section class="right_side_header d-inline-block w-100 position-relative">

    <div class="container-fluid">

      <div class="row" id="history_demo_students">

                <div class="col-xl-12" >

          <div class="modal-header px-0">

            <h5 class="modal-title">Lead History of <span style="font-weight: bold;"><?php echo $demo_record->name; ?></span></h5>

            <button type="button" class="close close_side_bar" id="close_side_bar_right">

              <span aria-hidden="true">×</span>

            </button>

          </div>

          <div class="fill_new_leade_info_body" id="create_leade">

            <?php foreach($student_history as $sh) { ?>

              <span style="color:gray; font-size: 16px; font-weight: bold;"> Created On </span> : <span style="color:black; font-size:16px; font-weight: bold; padding:0px 5px 0 5px;"><?php  echo $sh->last_updated_date; ?>

                

              </span><br>

              <span style="color:gray; font-size: 16px;"> Name </span> : <span style="color:black; font-size:16px; padding:0px 5px 0 5px; ">

                <?php $name = explode(',',$sh->name); 

                  if($name[1]=="nochange") 

                    { ?>

                      <span><?php echo $name[0]; ?></span>

                   <?php } else  { ?>

                      <span style="color:red"><?php echo $name[0]; ?> 

                   <?php } ?>

              </span><br>



              <span style="color:gray; font-size: 16px;"> Mobile No </span> : <span style="color:black; font-size:16px; padding:0px 5px 0 5px; ">

                <?php $mobile = explode(',',$sh->mobileNo); if($mobile[1]=="nochange") { ?><span><?php echo $mobile[0]; ?></span> <?php } else  { ?><span style="color:red"><?php echo $mobile[0]; ?> <?php } ?>

              </span><br>

              <span style="color:gray; font-size: 16px;"> branch Name </span> : <span style="color:black; font-size:16px;padding:0px 5px 0 5px;  ">

                <?php 

                    $branch_data =  explode(',',$sh->branch_id);

                    foreach($branch as $bran) { 



                      if($bran->branch_id==$branch_data[0])

                      {

                        $branch_n = $bran->branch_name;

                      }



                    } ?>

                    <?php  if($branch_data[1]=="nochange") { ?><span><?php echo $branch_n; ?></span> <?php } else  { ?><span style="color:red"><?php echo $branch_n; ?> <?php } ?>

              </span><br>

              <span style="color:gray; font-size: 16px;"> Department Name </span> : <span style="color:black; font-size:16px;padding:0px 5px 0 5px;  ">

                <?php 

                    $department_name =  explode(',',$sh->department_id);

                    foreach($department as $depart) 

                    { 

                      if($depart->department_id==$department_name[0])

                      {

                        $name_depart = $depart->department_name;

                      }

                    } ?>

                    <?php  if($department_name[1]=="nochange") { ?><span><?php echo $name_depart; ?></span> <?php } else  { ?><span style="color:red"><?php echo $name_depart; ?> <?php } ?>

              </span><br>

              <span style="color:gray; font-size: 16px;"> Course Type </span> : <span style="color:black; font-size:16px; padding:0px 5px 0 5px; ">

                <?php $course_type = explode(',',$sh->course_type); if($course_type[1]=="nochange") { ?><span><?php echo $course_type[0]; ?></span> <?php } else  { ?><span style="color:red"><?php echo $course_type[0]; ?></span> <?php } ?>

              </span><br>

              <span style="color:gray; font-size: 16px;"> Course Name </span> : <span style="color:black; font-size:16px;padding:0px 5px 0 5px;  ">

                <?php $cName = explode(',',$sh->courseName); if($cName[1]=="nochange") { ?><span><?php echo $cName[0]; ?></span> <?php } else  { ?><span style="color:red"><?php echo $cName[0]; ?></span> <?php } ?>

              </span><br>

              <span style="color:gray; font-size: 16px;"> Faculty Name </span> : <span style="color:black; font-size:16px; padding:0px 5px 0 5px; ">

                 <?php 

                    $faculty_name =  explode(',',$sh->faculty_id);

                    foreach($faculty as $fa) 

                    { 

                      if($fa->faculty_id==$faculty_name[0])

                      {

                        $fName = $fa->name;

                      }

                    } ?>

                    <?php  if($faculty_name[1]=="nochange") { ?><span><?php echo $fName; ?></span> <?php } else  { ?><span style="color:red"><?php echo $fName; ?> <?php } ?>

              </span><br>

              <span style="color:gray; font-size: 16px;"> From Time </span> : <span style="color:black; font-size:16px; padding:0px 5px 0 5px;  ">

                <?php  $fromTime =  explode(',',$sh->fromTime); if($fromTime[1]=="nochange") { ?><span><?php echo $fromTime[0]; ?></span> <?php } else  { ?><span style="color:red"><?php echo $fromTime[0]; ?> </span><?php } ?>

              </span><br>

              <span style="color:gray; font-size: 16px;"> To Time </span> : <span style="color:black; font-size:16px; padding:0px 5px 0 5px; ">

                 <?php  $toTime =  explode(',',$sh->toTime);if($toTime[1]=="nochange") { ?><span><?php echo $toTime[0]; ?></span> <?php } else  { ?><span style="color:red"><?php echo $toTime[0]; ?></span> <?php } ?>

              </span><br>

              <span style="color:gray; font-size: 16px;"> Add Or Change </span> : <span style="color:black; font-size:16px;padding:0px 5px 0 5px;  "><?php  $addby =  explode(',',$sh->addBy);if($addby[1]=="nochange") { ?><span><?php echo $addby[0]; ?></span> <?php } else  { ?><span style="color:red"><?php echo $addby[0]; ?></span> <?php } ?></span><br>



             

              <hr style="color:black">

            <?php } ?>



          </div>

          <div class="lead_save_btn">

            <div class="btn-group w-100">

            <!--   <button type="button" class="btn btn-danger">CANCEL</button>

              <button type="button" class="btn btn-success">ADD LEAD</button> -->

            </div>

          </div>

        </div>



       

      </div>

    </div>

  </section>

</div>

<!-- eye demo -->

<div class="filter_ratio" id="filter_ratio">

	<div class="modal fade" id="student_datails_modal">

		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">

			<div class="modal-content" id="student_demo_details_get">

				

			</div>

		</div>

	</div>

</div>  







<!--  add remarks at the demo students -->





<div class="modal fade" id="add_ramark">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <from class="modal-content shadow-lg" method="post">

      <div class="modal-header">

      	<input type="hidden" name="remarks_by_add" id="remarks_by_add" value="<?php  echo @$_SESSION['Admin']['username']; ?>">

      	<input type="hidden" name="demo_add_id" id="demo_add_id" value="<?php  echo @$demo_record->demo_id; ?>">

        <h5 class="modal-title">Add Remarks</h5>

        

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <div>

        	<label>Comment:</label>

        	<textarea placeholder="Add remark" id="remarks_add" class="form-control" rows="6"></textarea>

        </div>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-primary" onclick="return add_remarks_by_demo()">Save</button>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>

    </from>

  </div>

</div> 





<!-- discard demo -->

<div id="success_discard_data_insert">

<div class="modal fade" id="myModal_cancel">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <from class="modal-content shadow-lg">

      <div class="modal-header">

        <h5 class="modal-title">Discard Demo</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

      	<div class="form-group">

      		<input type="hidden" name="demo_discard" id="discard_demo">

      		<label>Student Response::</label>

      		<select class="form-control" name="demo_cancel_reason" required="" id="demo_cancel_reason">

      		    <option value="">Select Response</option>

      		    <?php foreach($response_list as $rl) { ?>

      		    	<option value="<?php echo $rl->student_response_name; ?>"><?php echo $rl->student_response_name; ?></option>

      			<?php } ?>

      		   

      		</select>

      	</div>

        <div class="form-group">

        	<label>Reason/Comments:*:</label>

        	<textarea class="form-control" rows="6" name="demo_cancel_comment" id="demo_cancel_comment"></textarea>

        </div>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-primary" onclick="return submit_discard_demo_data()">Save</button>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>

    </from>

  </div>

</div>

</div>



<!--  Attendance & Follow ups -->



<div class="filter_ratio">

	<div class="modal fade" id="demo_attendance_modal">

	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document" id="get_record_attendance_follow">

	    <from class="modal-content shadow-lg">

	      <div class="modal-header">

	        <h5 class="modal-title">Shubham</h5>

	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

	          <span aria-hidden="true">&times;</span>

	        </button>

	      </div>

	      <div class="modal-body">

	      	<div class="demo_student_attendance_details_block">

	      		<h3 class="demo_student_details_heading">Attendance Details</h3>

	      		<div class="table-responsive-sm">

	      		  <table class="table table-bordered table-striped create_responsive_table">

	      		    <tr class="thead">

	      		    	<th>Date</th>

	      		    	<th>Attendance</th>

	      		    	<th>Mark by	</th>

	      		    	<th>Time</th>

	      		    </tr>

	      		    <tr>

	      		    	<td data-heading="Date">2020-03-12</td>

	      		    	<td data-heading="Attendance">P</td>

	      		    	<td data-heading="Mark By">Radhi Sheladiya	</td>

	      		    	<td data-heading="Time">2020-03-12 05:51:06 pm</td>

	      		    </tr>

	      		  </table>

	      		</div>

	      	</div>

	      	<div class="demo_student_attendance_details_block">

	      		<h3 class="demo_student_details_heading">Follow Up Details</h3>

	      		<div class="table-responsive-sm">

	      		  <table class="table table-bordered table-striped create_responsive_table">

	      		    <tr class="thead">

	      		    	<th>Date</th>

	      		    	<th>Follow Up</th>

	      		    	<th>By</th>

	      		    	<th>Time</th>

	      		    </tr>

	      		    <tr>

	      		    	<td data-heading="Date">2020-03-12	</td>

	      		    	<td data-heading="Follow Up">kal thi ava na che	</td>

	      		    	<td data-heading="By">Radhi Sheladiya	</td>

	      		    	<td data-heading="Time">2020-03-17 05:16:31 pm</td>

	      		    </tr>

	      		    <tr>

	      		    	<td data-heading="Date">2020-03-12	</td>

	      		    	<td data-heading="Follow Up">Demo Leave : 2020-03-19to2020-04-01 / te bhai e tena father jode vat kari tene evu kidhu k aprill na start kare by-ankita	</td>

	      		    	<td data-heading="By">Radhi Sheladiya	</td>

	      		    	<td data-heading="Time">2020-03-17 05:16:31 pm</td>

	      		    </tr>

	      		  </table>

	      		</div>

	      	</div>

	      </div>

	      <div class="modal-footer">

	        <button type="button" class="btn btn-primary">Save</button>

	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

	      </div>

	    </from>

	  </div>

	</div>

</div>





<!--  History of demo students -->



<div class="filter_ratio">

  <div class="modal fade" id="demo_students_history">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" id="">

      <from class="modal-content shadow-lg">

        <div class="modal-header">

          <h5 class="modal-title">Shubham</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>

          </button>

        </div>

        <div class="modal-body">

          <div class="demo_student_attendance_details_block">

            <h3 class="demo_student_details_heading">Attendance Details</h3>

            <div class="table-responsive-sm">

              <table class="table table-bordered table-striped create_responsive_table">

                <tr class="thead">

                  <th>Date</th>

                  <th>Attendance</th>

                  <th>Mark by </th>

                  <th>Time</th>

                </tr>

                <tr>

                  <td data-heading="Date">2020-03-12</td>

                  <td data-heading="Attendance">P</td>

                  <td data-heading="Mark By">Radhi Sheladiya  </td>

                  <td data-heading="Time">2020-03-12 05:51:06 pm</td>

                </tr>

              </table>

            </div>

          </div>

          

        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-primary">Save</button>

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>

      </from>

    </div>

  </div>

</div>



<div class="col-md-12">

                	    <div class="container" id="showtime">

                      

                                 

                                  <!-- Modal -->

                      </div>           

                          

                     </div>

     <!-- mymodal_cancel -->

     <div class="modal fade" id="myModal_cancel<?php echo $val->demo_id; ?>" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="color:#000">Reason</h4>
            </div>
            <div class="modal-body" style="color:#000;">
               
                <select class="form-control"  id="reasontype<?php echo $val->demo_id; ?>" style="width:100%; color:#000"  name="cancel_reason">
                    <option value="">Select Reason</option>
                 <?php foreach($reason_list as $val1) { ?>   
                    <option value="<?php echo $val1->reasonName; ?>"><?php echo $val1->reasonName; ?></option>
                    <?php } ?>
                    
                </select>
                <input type="text" class="form-control" style="width:100%; color:#000" id="reason<?php echo $val->demo_id; ?>"  name="reason" placeholder="Enter Reason" >
                
                <div style="display:none; margin-Top:20px;" id="leavedate<?php echo $val->demo_id; ?>">
                    <div class="form-group">
                      <label for="email">From :</label>
                      <input type="text" id="leavefrom<?php echo $val->demo_id; ?>" class="form-control datepicker1 input100" value="<?php echo date("Y-m-d"); ?>" id="" name="leave_from_date"  >
                    </div>
                    <div class="form-group">
                      <label for="email">Will come :</label>
                      <input type="text" id="leaveto<?php echo $val->demo_id; ?>" class="form-control datepicker1 input100" id="" name="leave_to_date" placeholder="select date" >
                    </div>
                
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" name="take_attendance" value="Submit" class="btn btn-sm btn-default pull-right">
            </div>
          </div>
        </div>
      </div>

      <!--  myModal_cancel2 -->


<div class="modal fade" id="myModal_cancel2<?php echo $val->demo_id; ?>" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="color:#000">Reason</h4>
            </div>
            <div class="modal-body" style="color:#000;">
               
               <select class="form-control"  id="reasontype2<?php echo $val->demo_id; ?>" style="width:100%; color:#000"  name="cancel_reason">
                    <option value="">Select Reason</option>
                 <?php foreach($reason_list as $val1) { ?>   
                    <option value="<?php echo $val1->reasonName; ?>"><?php echo $val1->reasonName; ?></option>
                    <?php } ?>
                    
                </select>
                <input type="text" class="form-control" style="width:100%; color:#000" id="reason2<?php echo $val->demo_id; ?>"  name="reason" placeholder="Enter Reason" >
                
                <div style="display:none; margin-Top:20px;" id="leavedate2<?php echo $val->demo_id; ?>">
                    <div class="form-group">
                      <label for="email">From :</label>
                      <input type="text" id="leavefrom2<?php echo $val->demo_id; ?>" class="form-control datepicker1 input100" value="<?php echo date("Y-m-d"); ?>" id="" name="leave_from_date"  >
                    </div>
                    <div class="form-group">
                      <label for="email">Will come :</label>
                      <input type="text" id="leaveto2<?php echo $val->demo_id; ?>" class="form-control datepicker1 input100" id="" name="leave_to_date" placeholder="select date" >
                    </div>
                
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" name="take_attendance" value="Submit" class="btn btn-sm btn-default pull-right">
            </div>
          </div>
        </div>
      </div>

        <!-- reasontype2 -->

       <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="color:#000">Reason</h4>
            </div>
            <div class="modal-body" style="color:#000;">
               <select class="form-control"  id="reasontype2<?php echo $val->demo_id; ?>" style="width:100%; color:#000"  name="cancel_reason">
                    <option value="">Select Reason</option>
                 <?php foreach($reason_list as $val1) { ?>   
                    <option value="<?php echo $val1->reasonName; ?>"><?php echo $val1->reasonName; ?></option>
                    <?php } ?>
                    
                </select>
               
                <input type="text" class="form-control" style="width:100%; color:#000" id="reason2<?php echo $val->demo_id; ?>"  name="reason" placeholder="Enter Reason" >
                
                <div style="display:none; margin-Top:20px;" id="leavedate2<?php echo $val->demo_id; ?>">
                    <div class="form-group">
                      <label for="email">From :</label>
                      <input type="text" id="leavefrom2<?php echo $val->demo_id; ?>" class="form-control datepicker1 input100" value="<?php echo date("Y-m-d"); ?>" id="" name="leave_from_date"  >
                    </div>
                    <div class="form-group">
                      <label for="email">Will come :</label>
                      <input type="text" id="leaveto2<?php echo $val->demo_id; ?>" class="form-control datepicker1 input100" id="" name="leave_to_date" placeholder="select date" >
                    </div>
                
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" name="take_attendance" value="Submit" class="btn btn-sm btn-default pull-right">
            </div>
          </div>
        </div>
      </div>


<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js "></script>

<script src="https://www.gstatic.com/charts/loader.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.js"></script>

<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

<script type="text/javascript">

  function loadDoc() {



    setInterval(function(){



      var xhttp = new XMLHttpRequest();

      xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

         document.getElementById("gave_total_task").innerHTML = this.responseText;



        }

      };

      var m = document.getElementById("gave_total_task").innerHTML;

      

      $('#gave_total_task_main').text(m);

      xhttp.open("GET", "TaskController/count_dd", true);

      xhttp.send();



    },1000);





}



loadDoc();

</script>





<script type="text/javascript">

  function loadDocob() {



    setInterval(function(){



      var xhttp = new XMLHttpRequest();

      xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

         document.getElementById("gave_total_ob_task").innerHTML = this.responseText;



        }

      };

      var m = document.getElementById("gave_total_ob_task").innerHTML;

      

      $('#gave_total_ob_task_main').text(m);

      xhttp.open("GET", "TaskController/count_ob", true);

      xhttp.send();



    },1000);





}



loadDocob();

</script>

<script type="text/javascript">

	$(document).ready(function() {



   //setInterval(setTime, 1000);



   //  if(window.location.href != 'https://demo.rnwmultimedia.com/welcome')

   //  {

   //      setInterval(alertFunc, 1000);

   // }

  });







var totalSeconds = 0;

 setInterval(setTime, 1000);



function setTime() {

  ++totalSeconds;

  var j = pad(parseInt(totalSeconds / 60))+":"+pad(totalSeconds % 60);

  //console.log(j);

  //console.log(window.location.href);

     if(window.location.href != 'https://demo.rnwmultimedia.com/')

    {

     //alert("hii");

        // $.ajax({

        //   url:"<?php echo base_url(); ?>welcome/loger_help/"+j,

        //   method:'GET',

        // });



   }

  

}



function pad(val) {

  var valString = val + "";

  if (valString.length < 2) {

    return "0" + valString;

  } else {

    return valString;

  }

}



function alertFunc() {

  // ++totalSeconds;

  // var t = pad(parseInt(totalSeconds / 60))+":"+pad(totalSeconds % 60);

  // console.log(t);

  // $.ajax({

  //   url:"<?php echo base_url(); ?>welcome/loger_help/"+t,

  //   method:'GET',

  // });

}







</script>

<script>

$(document).ready(function() {



 

    $('#example').DataTable();



   

} );

</script>



<script type="text/javascript">

  $(document).ready(function() {

    $('.toogle_btn').click(function() {

      $('.side_Menu').toggleClass("showsidebar");

      $('.main_content').toggleClass("showsidebar");

    })

  })

</script>

<script type="text/javascript">

  $( function() {

      $( "#datepicker" ).datepicker();

    } );

</script>

<script type="text/javascript">

  $(document).ready(function() {

    $(window).scroll(function() {

      var header = $('.top_header');

      var scroll = $(window).scrollTop();



      if (scroll >= 40) {

        header.addClass('fixed');

      }

      else{

        header.removeClass('fixed');

      }

    });

  

   

});



  $(function () {

    $('[data-toggle="tooltip"]').tooltip()

  });







  function get_side_bar_modal()

{



      $('#change_lead_status').html("Add New Lead");  

      $('#add_lead_name_fast').html('');

      $("#lead_list_form")[0].reset();

      $("aside").addClass('right_show');

      $('.main_content').addClass('right_show');

      $('.right_side').addClass('right_show');

      $('#update_lead_record_click_name').html(res);

      $('.create_new_lead').removeClass('create_new_lead');

}





</script>



<script>

$(document).ready(function($) {

  var path = window.location.pathname.split("/").pop();

  if (path == '') {

    path = 'viewall_company_detail';

  }

  var target = $('.side_all_menu_block li a[href="'+path+'"]');

  target.addClass('active');

});

$(document).ready(function() {

  if ('.side_all_menu_sub_menu li a.active') {

    $('.side_all_menu_sub_menu').addClass('show');

  }

  else {

    $('.side_all_menu_sub_menu').removeClass('show');

  }

});



</script>



<script type="text/javascript">

      google.charts.load('visualization', "1", {

          packages: ['corechart']

      });

  </script>

<script>

    

   if(document.getElementById("yellow") != null) {

    setTimeout(function() {

      document.getElementById('yellow').style.display = 'none';

    }, 3000);

  }

</script>

<script>

$(document).ready(function(){

    $('[data-toggle="popover"]').popover();   

});

</script>



<script type="text/javascript">

	$(document).ready(function() {

		$('.toogle_btn').click(function() {

			$('.side_Menu').toggleClass("showsidebar");

			$('.main_content').toggleClass("showsidebar");

		})

	})

</script>

<script type="text/javascript">

	$( function() {

	    $( "#datepicker" ).datepicker();

	  } );

</script>

<script type="text/javascript">

  

//   String.prototype.toHHMMSS = function () {

//     var sec_num = parseInt(this, 10); // don't forget the second parm

//     var hours = Math.floor(sec_num / 3600);

//     var minutes = Math.floor((sec_num - (hours * 3600)) / 60);

//     var seconds = sec_num - (hours * 3600) - (minutes * 60);



//     if (hours < 10) {

//         hours = "0" + hours;

//     }

//     if (minutes < 10) {

//         minutes = "0" + minutes;

//     }

//     if (seconds < 10) {

//         seconds = "0" + seconds;

//     }

//     var time = hours + ':' + minutes + ':' + seconds;

//     return time;

// }



// var hms = '02:04:33';   // your input string

// var a = hms.split(':'); // split it at the colons



// // minutes are worth 60 seconds. Hours are worth 60 minutes.

// var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 





// var count = seconds; // it's 00:01:02







// var counter = setInterval(timer, 1000);



// function timer() {





//     // console.log(count);



//     if (parseInt(count) <= 0) {

//         clearInterval(counter);

//         return;

//     }

//     var temp = count.toHHMMSS();

//     count = (parseInt(count) - 1).toString();

//     console.log(temp);

//     if(temp == "00:00:01")

//     {

//       // $.ajax({



//       //   url:"<?php echo base_url(); ?>welcome/logout",

//       //   type:'GET'

//       // });

//     }

//     $('#timer').html(temp);

// }

</script>

<script type="text/javascript">

	$(document).ready(function() {

		$(window).scroll(function() {

			var header = $('.top_header');

			var scroll = $(window).scrollTop();



			if (scroll > 250) {

				header.addClass('fixed');

			}

			else{

				header.removeClass('fixed');

			}

		});

	});

	$(function () {

	  $('[data-toggle="tooltip"]').tooltip()

	})

</script>

</body>

</html>



<?php $total_student =  array('Pending'=>$ttpend,'Absent'=>$all_new_ab,'leave'=>$all_new_leave,'Present'=>$all_new_pr,'Cancle Demo'=>$all_new_cancel,'Done Demo'=>$all_new_done,'Confusion Demo'=>$all_new_confus); 

?>

<script language="JavaScript">



    $("#total_demo").html(<?php echo $all_today_new?>);

  // Draw the pie chart for registered users month wise



 

  // Draw the pie chart for registered users year wise

  google.charts.setOnLoadCallback(yearWiseChart);

   

  //for month wise

 

  function yearWiseChart() { 

 

    /* Define the chart to be drawn.*/

    var data = google.visualization.arrayToDataTable([

        ['Year', 'Users Count'],

        <?php 

         foreach ($total_student as $k=>$row){

         echo "['".$k."',".$row."],";

         }

         ?>

    ]);

    var options = {

        title: 'Demo Ratio_new',

        is3D: true,

         backgroundColor: [

              "#DEB887",

              "#F4A460",

              "#A9A9A9",

              "#DC143C",

              

              "#2E8B57",

              "#1D7A46",

              "#CDA776",

              "#CDA776",

              "#989898",

              "#CB252B",

              "#E39371",

            ],

            borderColor: [

              "#CDA776",

              "#E39371",

              "#989898",

              "#CB252B",

              

              "#1D7A46",

              "#F4A460",

              "#CDA776",

              "#DEB887",

              "#A9A9A9",

              "#DC143C",

              "#F4A460",

              "#2E8B57",

            ],

    };

    /* Instantiate and draw the chart.*/

    var chart = new google.visualization.PieChart(document.getElementById('year_pie'));

    chart.draw(data, options);

  }

  // for year wise

  

</script>





 <?php $total_student_old=  array('Pending'=>$allrun,'Absent'=>$all_old_ab,'leave'=>$all_old_leave,'Present'=>$all_old_pr,'Done Demo'=>$all_old_done,'Cancel Demo'=>$all_old_cancel,'Confusion Demo'=>$all_old_confus); 



 // echo "<pre>";

 

?>

<script graf2="JavaScript">



    $("#demo_total").html(<?php echo $allrun?>);

  // Draw the pie chart for registered users month wise



 

  // Draw the pie chart for registered users year wise

  google.charts.setOnLoadCallback(yearWiseChartt);

   

  //for month wise

 

  function yearWiseChartt() {

 

    /* Define the chart to be drawn.*/

    var data = google.visualization.arrayToDataTable([

        ['Year', 'Users Count'],

        <?php 

         foreach ($total_student_old as $d=>$val){

         echo "['".$d."',".$val."],";

         }

         ?>

    ]);

    var options = {

        title: 'Demo Ratio_old',

        is3D: true,

         backgroundColor: [

              "#DEB887",

              "#F4A460",

              "#A9A9A9",

              "#DC143C",

              

              "#2E8B57",

              "#1D7A46",

              "#CDA776",

              "#CDA776",

              "#989898",

              "#CB252B",

              "#E39371",

            ],

            borderColor: [

              "#CDA776",

              "#E39371",

              "#989898",

              "#CB252B",

              

              "#1D7A46",

              "#F4A460",

              "#CDA776",

              "#DEB887",

              "#A9A9A9",

              "#DC143C",

              "#F4A460",

              "#2E8B57",

            ],

    };

    /* Instantiate and draw the chart.*/

    var chart = new google.visualization.PieChart(document.getElementById('3D_graf2'));

    chart.draw(data, options);

  }

  // for year wise

  

</script>





 <script type="text/javascript">

      google.charts.load('current', {'packages':['bar']});

      google.charts.setOnLoadCallback(drawChart);



      function drawChart() {

        var data = google.visualization.arrayToDataTable([

          ['        ','Take Demo','Cancel Demo','Leave Demo','Done Demo','Confusion Demo','Running Demo'],

         

          ['<?php echo $duration; ?>', <?php echo $takedemo;?>,<?php echo $ccc;?>,<?php echo $lll;?>,<?php echo $ddd;?>,<?php echo $conf;?>,<?php echo $rrr;?>]

        ]);

  

        var options = {

          chart: {

            title: ' ',

            subtitle: '',

          }

        };



        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));



        chart.draw(data, google.charts.Bar.convertOptions(options));

         $("#		").html(<?php echo $ttt?>);

      }

    </script>





    <script type="text/javascript">

  

  $(document).ready(function(){

      $('#calendar123').change(function(){



     var key = $(this).val();

   // alert(lastWeek);



      $.ajax({

          url:"Welcome/search_graph",

          type:'POST',

          data:

          {

            'k1':key,

          },

          success:function(res){

              $('#graph_wise_chart').html(res);

          }

      });

  });

  });





function student_detail_record(demoId='')

{

	$('#student_datails_modal').modal('show');

	$.ajax({

		url : "<?php echo base_url(); ?>welcome/get_demo_Student_detail",

		type : "post",

		data:{

			'demoId' : demoId

		},

		success:function(Response)

		{

			$('#student_datails_modal').modal('show');

			$('#student_demo_details_get').html(Response);

		}

	});

}





function add_demo_student_remarks(demoId='')

{



     var remark_name =  $('#remarks_by_add').val();

     $('#demo_add_id').val(demoId);

     $('#add_ramark').modal('show');

}





function add_remarks_by_demo()

{

	var remarks =  $('#remarks_add').val();

	var demoId =  $('#demo_add_id').val();

	var remarkby = $('#remarks_by_add').val();

	$.ajax({

		url : "<?php echo base_url(); ?>welcome/add_demo_remarks",

		type : "POST",

		data : {

			'demo_id' : demoId,

			'demo_remark_comment' : remarks,

			'demo_remark_by' : remarkby

		},

		success:function(response)

		{

			$('#add_remarks_after').html(response);

			$('#remarks_add').val('');

			$('#demo_add_id').val('');

			$('#remarks_by_add').val('');

		}

	});

}







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



	function setTime(time_id)

	{

	    var stime = $('#stimes'+time_id).val();

	    var etime = $('#etimes'+time_id).val();

	   

	    $('#fromTime').val(stime);

	    $('#toTime').val(etime);

	    

	    $('#myModal').modal("hide");

	   

	}



   function discard_student_from_demo(demoId = '')

   {

   	$('#discard_demo').val(demoId);

   	$('#myModal_cancel').modal("show");

   }



     function submit_discard_demo_data()

   {

   	 var demoId =  $('#discard_demo').val();

   	 var reason = $('#demo_cancel_reason').val(); 

   	 var comment = $('#demo_cancel_comment').val(); 

   	 

   	 $.ajax({

   	 	url : "<?php echo base_url(); ?>welcome/discardDemo",

   	 	type : "POST",

   	 	data : {

   	 		'demo_id' : demoId,

   	 		'discard_cancel_reason' : reason,

   	 		'discard_cancel_comment' : comment

   	 	},

   	 	success:function(response)

   	 	{

   	 		// $('#success_discard_data_insert').html(response);

   	 		// location.reload();

   	 		window.location.reload();

   	 	}

   	 });

   }



  function get_student_attendance_follow(demoId='')

  {

  	$.ajax({

  		 url 		: "<?php echo base_url(); ?>welcome/get_atten_follow",

  		 type 		: "POST",

  		 data 		: {

  		 	'demoId' : demoId

  		 },

  		 success : function(Response){

  		 	$('#demo_attendance_modal').modal("show");

  		 	$('#get_record_attendance_follow').html(Response);

  		 }



  	});

  }

</script>



<script>



function demo_student_history(demoId='')

{

 



  $.ajax({

    url : "<?php echo base_url(); ?>welcome/history_demo_student",

    type  : "POST",

    data :{ 

      'demoId' : demoId 

    },

    success:function(Response)

    {

       // $('#demo_students_history').modal("show");

       $('#history_demo_students').html(Response);

         // $('#change_lead_status').html("Add New Lead");  

          // $('#add_lead_name_fast').html('');

          // $("#lead_list_form")[0].reset();

          $("aside").addClass('right_show');

          $('.main_content').addClass('right_show');

          $('.right_side').addClass('right_show');

          // $('#update_lead_record_click_name').html(res);

          // $('.create_new_lead').removeClass('create_new_lead');

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


  <script>
    function whichSelect(demo_id,a)
    {
        var status = $('#demoStatus'+demo_id).val();
        if(a=="A")
        {
            if(status==2 || status==4)
            {
                $('#modal_button'+demo_id).show();
                $('#leavedate'+demo_id).show();
                $('#formsubmit'+demo_id).hide();
                $('#reasontype'+demo_id).hide();
                document.getElementById("reasontype"+demo_id).required= false;
                document.getElementById("reason"+demo_id).required= true;
                document.getElementById("leavefrom"+demo_id).required= true;
                document.getElementById("leaveto"+demo_id).required= true;
            }
            else if(status==3)
            {
                $('#modal_button'+demo_id).show();
                $('#leavedate'+demo_id).hide();
                $('#formsubmit'+demo_id).hide();
                $('#reasontype'+demo_id).show();
                document.getElementById("reasontype"+demo_id).required= true;
                document.getElementById("reason"+demo_id).required= true;
                document.getElementById("leavefrom"+demo_id).required= false;
                document.getElementById("leaveto"+demo_id).required= false;
            }
            else
            {
                $('#reasontype'+demo_id).hide();
                $('#modal_button'+demo_id).show();
                $('#formsubmit'+demo_id).hide();
                $('#leavedate'+demo_id).hide();
                document.getElementById("reasontype"+demo_id).required= false;
                document.getElementById("reason"+demo_id).required= true;
                document.getElementById("leavefrom"+demo_id).required= false;
                document.getElementById("leaveto"+demo_id).required= false;
            }
            
        }
        if(a=="P")
        {
            $('#reasontype'+demo_id).hide();
            $('#modal_button'+demo_id).hide();
            $('#formsubmit'+demo_id).show();
            document.getElementById("reasontype"+demo_id).required= false;
            document.getElementById("reason"+demo_id).required= false;
            document.getElementById("leavefrom"+demo_id).required= false;
            document.getElementById("leaveto"+demo_id).required= false;
            
        } 
    }
</script>
<script>
    function getReson(demo_id)
    {
        var status = $('#demoStatus'+demo_id).val();
        
       if(status==0)
        {
            $('#reasontype'+demo_id).hide();
            $('#modal_button'+demo_id).hide();
            $('#formsubmit'+demo_id).show();
             document.getElementById("reasontype"+demo_id).required= false;
            document.getElementById("reason"+demo_id).required= false;
            document.getElementById("leavefrom"+demo_id).required= false;
            document.getElementById("leaveto"+demo_id).required= false;
           
        }
        
        if(status==1)
        {
            $('#reasontype'+demo_id).hide();
            $('#modal_button'+demo_id).hide();
            $('#formsubmit'+demo_id).show();
             document.getElementById("reasontype"+demo_id).required= false;
            document.getElementById("reason"+demo_id).required= false;
            document.getElementById("leavefrom"+demo_id).required= false;
            document.getElementById("leaveto"+demo_id).required= false;
           
        }
       
        if(status==2 || status==4)
        {
            $('#reasontype'+demo_id).hide();
            $('#modal_button'+demo_id).show();
            $('#leavedate'+demo_id).show();
            $('#formsubmit'+demo_id).hide();
             document.getElementById("reasontype"+demo_id).required= false;
            document.getElementById("reason"+demo_id).required= true;
            document.getElementById("leavefrom"+demo_id).required= true;
            document.getElementById("leaveto"+demo_id).required= true;
           
        }
        if(status==3)
        {
            $('#reasontype'+demo_id).show();
          $('#modal_button'+demo_id).show();
          $('#formsubmit'+demo_id).hide();
          $('#leavedate'+demo_id).hide();
           document.getElementById("reasontype"+demo_id).required= true;
          document.getElementById("reason"+demo_id).required= true;
          document.getElementById("leavefrom"+demo_id).required= false;
            document.getElementById("leaveto"+demo_id).required= false;
        }

        
        
    }
    
    
   
    
</script>



<script>
    function whichSelect2(demo_id,a)
    {
        var status2 = $('#demoStatus2'+demo_id).val();
        if(a=="A")
        {
            if(status2==2 || status2==4)
            {
                $('#modal_button2'+demo_id).show();
                $('#leavedate2'+demo_id).show();
                $('#formsubmit2'+demo_id).hide();
                 $('#reasontype2'+demo_id).hide();
                document.getElementById("reasontype2"+demo_id).required= false;
                document.getElementById("reason2"+demo_id).required= true;
                document.getElementById("leavefrom2"+demo_id).required= true;
                document.getElementById("leaveto2"+demo_id).required= true;
            }
            else if(status2==3)
            {
                $('#modal_button2'+demo_id).show();
                $('#leavedate2'+demo_id).hide();
                $('#formsubmit2'+demo_id).hide();
                 $('#reasontype2'+demo_id).show();
                document.getElementById("reasontype2"+demo_id).required= true;
                document.getElementById("reason2"+demo_id).required= true;
                document.getElementById("leavefrom2"+demo_id).required= false;
                document.getElementById("leaveto2"+demo_id).required= false;
            }
            else
            {
                $('#modal_button2'+demo_id).show();
                $('#formsubmit2'+demo_id).hide();
                $('#leavedate2'+demo_id).hide();
                 $('#reasontype2'+demo_id).hide();
                document.getElementById("reasontype2"+demo_id).required= false;
                document.getElementById("reason2"+demo_id).required= true;
                document.getElementById("leavefrom2"+demo_id).required= false;
                document.getElementById("leaveto2"+demo_id).required= false;
            }
            
        }
        if(a=="P")
        {
            $('#modal_button2'+demo_id).hide();
            $('#formsubmit2'+demo_id).show();
             $('#reasontype2'+demo_id).hide();
                document.getElementById("reasontype2"+demo_id).required= false;
            document.getElementById("reason2"+demo_id).required= false;
            document.getElementById("leavefrom2"+demo_id).required= false;
            document.getElementById("leaveto2"+demo_id).required= false;
            
        } 
    }
</script>
<script>
    function getReson2(demo_id)
    {
        var status2 = $('#demoStatus2'+demo_id).val();
        
       if(status2==0)
        {
            $('#modal_button2'+demo_id).hide();
            $('#formsubmit2'+demo_id).show();
             $('#reasontype2'+demo_id).hide();
                document.getElementById("reasontype2"+demo_id).required= false;
            document.getElementById("reason2"+demo_id).required= false;
            document.getElementById("leavefrom2"+demo_id).required= false;
            document.getElementById("leaveto2"+demo_id).required= false;
           
        }
        
        if(status2==1)
        {
            $('#modal_button2'+demo_id).hide();
            $('#formsubmit2'+demo_id).show();
             $('#reasontype2'+demo_id).hide();
                document.getElementById("reasontype2"+demo_id).required= false;
            document.getElementById("reason2"+demo_id).required= false;
            document.getElementById("leavefrom2"+demo_id).required= false;
            document.getElementById("leaveto2"+demo_id).required= false;
           
        }
       
        if(status2==2 || status2==4)
        {
            $('#modal_button2'+demo_id).show();
            $('#leavedate2'+demo_id).show();
            $('#formsubmit2'+demo_id).hide();
             $('#reasontype2'+demo_id).hide();
                document.getElementById("reasontype2"+demo_id).required= false;
            document.getElementById("reason2"+demo_id).required= true;
            document.getElementById("leavefrom2"+demo_id).required= true;
            document.getElementById("leaveto2"+demo_id).required= true;
           
        }
        if(status2==3)
        {
          $('#modal_button2'+demo_id).show();
          $('#formsubmit2'+demo_id).hide();
          $('#leavedate2'+demo_id).hide();
           $('#reasontype2'+demo_id).show();
                document.getElementById("reasontype2"+demo_id).required= true;
          document.getElementById("reason2"+demo_id).required= true;
          document.getElementById("leavefrom2"+demo_id).required= false;
            document.getElementById("leaveto2"+demo_id).required= false;
        }
        
    }
    
    
   
    
</script>



z