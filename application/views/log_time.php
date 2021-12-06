
    
    <main class="main_content d-inline-block view_student_full_sec">
        <section class="page_title_block d-inline-block w-100 position-relative pb-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 mx-auto">
                        <div class="page_heading">
                            <h1>Running Demo Student</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="d-inline-block w-100 position-relative">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 mx-auto">
                        <div class="coman_design_block_box">
                            
                          
                                <div class="coman_design_block_box">                                    
                                    
                                    <div class="coman_design_block_box">
                                       <div class="coman_design_block_info">
                                        <div class="table_search_panel d-inline-block w-100">
                                            <div class="row justify-content-center">
                                                <div class="col-xl-4 col-lg-4 col-md-5 col-sm-5 col-12 mb-2 mb-xl-0 mb-lg-0 mb-md-0 mb-sm-0">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                      All Update
                                                    </button>
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                       <form method="post" action="<?php echo base_url(); ?>welcome/log_time">
                                                      
                                                           <div>
                                                               <select class="form-control" name="logtype">
                                                               <option>---SELECT TYPE----</option>
                                                               <option value="Super Admin">Super Admin</option>
                                                               <?php foreach ($log_all as $key => $value) { ?>
                                                               <option value="<?php echo $value->logtype_name; ?>"><?php echo $value->logtype_name; ?></option>
                                                               <?php } ?>
                                                           </select>
                                                           </div>
                                                           <br>
                                                           <div >
                                                               <input class="form-control" type="time" name="time">
                                                           </div>
                                                       <br>
                                                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Save</button>
                                                      </div>
                                                       </form>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      </div>
                                                     
                                                    </div>
                                                  </div>
                                                </div>


                                                </div>
                                               <!--  <div class="col-xl-4 col-lg-4 col-md-5 col-sm-5 col-12">
                                                    <div class="btn-group w-100">
                                                    <form method="post" action="<?php echo base_url(); ?>welcome/log_time">
                                                        <input type="text" name="key" placeholder="Search Here" class="form-control">
                                                        <button type="submit" name="search" value="search" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                        </form>
                                                    </div>
                                                </div> -->
                                            </div>  
                                        </div>
                                    </div>
                                        <div class="coman_design_block_info">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered create_responsive_table example1">
                                                            <tr class="thead">
                                                                <th>User Name</th>
                                                                <th>Logout Limit</th>
                                                                <th>Logtype</th>
                                                                <th>Action</th>
                                                            </tr>
                                                             <?php foreach ($f_all as $key => $value) { ?>
                                                            <tr class="demo_status_running demo_status_color">

                                                               
                                                                <td data-heading="Demo Id"><?php echo $value->name; ?></td>
                                                                <td data-heading="Demo Id"><?php echo $value->l_limit; ?></td>
                                                               <td data-heading="Demo Id"><?php echo $value->logtype; ?></td>
                                                                <td>
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ex<?php echo $key; ?>">
                                                                  update
                                                                </button>
                                                                <div style="color: black;" class="modal fade" id="ex<?php echo $key; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                                                  <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                      <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $value->name; ?></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                          <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                         <form method="post" action="<?php echo base_url(); ?>welcome/log_time">
                                                                         <div >
                                                                    <input type="hidden" name="logtype" value="<?php echo $value->logtype; ?>">
                                                                    <input type="hidden" name="id" value="<?php echo $value->faculty_id; ?>">
                                                                    <input class="form-control" type="time" name="time">
                                                                       </div>
                                                                   <br>
                                                                    <button type="submit" name="upd" value="upd" class="btn btn-primary">Save</button>
                                                                         </form>
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                             <?php foreach ($u_all as $m => $value) { ?>
                                                            <tr class="demo_status_running demo_status_color">

                                                               
                                                                <td data-heading="Demo Id"><?php echo $value->name; ?></td>
                                                                <td data-heading="Demo Id"><?php echo $value->l_limit; ?></td>
                                                               <td data-heading="Demo Id"><?php echo $value->logtype; ?></td>
                                                                 <td>
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exX<?php echo $m; ?>">
                                                                  update
                                                                </button>
                                                                <div style="color: black;" class="modal fade" id="exX<?php echo $m; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                                                  <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                      <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $value->name; ?></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                          <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                         <form method="post" action="<?php echo base_url(); ?>welcome/log_time">
                                                                         <div >
                                                                    <input type="hidden" name="logtype" value="<?php echo $value->logtype; ?>">
                                                                    <input type="hidden" name="id" value="<?php echo $value->user_id; ?>">
                                                                    <input class="form-control" type="time" name="time">
                                                                       </div>
                                                                   <br>
                                                                    <button type="submit" name="upd" value="upd" class="btn btn-primary">Save</button>
                                                                         </form>
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                             <?php foreach ($h_all as $n => $value) { ?>
                                                            <tr class="demo_status_running demo_status_color">

                                                               
                                                                <td data-heading="Demo Id"><?php echo $value->name; ?></td>
                                                                <td data-heading="Demo Id"><?php echo $value->l_limit; ?></td>
                                                               <td data-heading="Demo Id"><?php echo $value->logtype; ?></td>
                                                                 <td>
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exh<?php echo $n; ?>">
                                                                  update
                                                                </button>
                                                                <div style="color: black;" class="modal fade" id="exh<?php echo $n; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                                                  <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                      <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $value->name; ?></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                          <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                         <form method="post" action="<?php echo base_url(); ?>welcome/log_time">
                                                                         <div >
                                                                    <input type="hidden" name="logtype" value="<?php echo $value->logtype; ?>">
                                                                    <input type="hidden" name="id" value="<?php echo $value->hod_id; ?>">
                                                                    <input class="form-control" type="time" name="time">
                                                                       </div>
                                                                   <br>
                                                                    <button type="submit" name="upd" value="upd" class="btn btn-primary">Save</button>
                                                                         </form>
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                         
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </main>




