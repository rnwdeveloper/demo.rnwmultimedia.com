

    <main class="main_content d-inline-block">
        <section class="page_title_block d-inline-block w-100 position-relative pb-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page_heading">
                            <h1>Sms Template Category</h1>
                        </div>
                    </div>
                    <?php if(@$this->session->flashdata('msg_alert')) { ?>
                        <div class="col-lg-12">
                            <div class="alert alert-success alert-dismissible">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  <?php echo $this->session->flashdata('msg_alert'); ?>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if(@$this->session->flashdata('msg_alert_delete')) { ?>
                        <div class="col-lg-12">
                            <div class="alert alert-danger alert-dismissible">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  <?php echo $this->session->flashdata('msg_alert_delete'); ?>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if(@$this->session->flashdata('msg_alert_update')) { ?>
                        <div class="col-lg-12">
                            <div class="alert alert-primary alert-dismissible">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  <?php echo $this->session->flashdata('msg_alert_update'); ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <section class="coman_design_block d-inline-block w-100 position-relative">
            <div class="container-fluid">
                <div class="row all_demo_student_block">
                    <div class="col-lg-12">
                        <div class="accordion accordion_design_2" id="student_list_aoc">
                            <div class="card">
                                <div class="card-header mb-0">
                                    <h2 class="mb-0">
                                          <button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_1" aria-expanded="false">
                                                 Sms Template category <span class="d-inline-block float-right pluse_icon">???</span>
                                          </button>
                                   </h2>
                                </div>
                                <div id="student_filter_panel_1" class="collapse show" data-parent="#student_list_aoc" style="">
                                    <div class="coman_design_block_box">
                                        <div class="coman_design_block_title d-inline-block w-100 border-bottom">
                                            <h4 class="d-inline-block align-middle">Create Sms Template Category</h4>
                                        </div>
                                        <form class="coman_design_block_info" method="post" action="<?php echo base_url(); ?>LeadlistController/sms_template">
                                            <div class="row">
                                                
                                               
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="pwd">Template Category Name:</label>
                                                        <input class="form-control" type="text" name="category" placeholder="Enter Sms Name" required value="<?php if(isset($template_category_record->category)){ echo @$template_category_record->category; } ?>">
                                                    </div>
                                                </div>



                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="pwd">Enter Sms Template:</label>
                                                        <!-- <input class="form-control" type="text" name="category" placeholder="Enter channel Name" required value="<?php if(isset($template_category_record->category)){ echo @$template_category_record->category; } ?>"> -->

                                                        <textarea class="form-control" name="sms_template" rows="15" ><?php echo @$template_category_record->sms_template; ?></textarea>
                                                    </div>
                                                </div>
                                                
                                                         <input class="form-control" type="hidden" name="sms_template_category_id" placeholder="Enter channel Name" required value="<?php if(isset($template_category_record->sms_id)){ echo @$template_category_record->sms_id; } ?>">
                                                
                                              
                                            </div>

                                            <div class="col-xl-12 text-center">
                                                
                                                <input type="submit" class="btn btn-primary" name="submit" value="Save">
                                            
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header mb-0">
                                    <h2 class="mb-0">
                                          <button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_2" aria-expanded="false"> Display Sms Template <span class="d-inline-block float-right pluse_icon">???</span></button>
                                   </h2>
                                </div>
                                <div id="student_filter_panel_2" class="collapse" data-parent="#student_list_aoc" style="">
                                    <div class="coman_design_block_box">
                                        <div class="coman_design_block_title d-inline-block w-100 border-bottom">
                                            <h4 class="d-inline-block align-middle">Display Sms Template</h4>
                                        </div>
                                        <div class="table_search_panel d-inline-block w-100">
                                            <div class="col-xl-4 mx-auto">
                                                <div class="btn-group w-100">
                                                    <input type="text" name="" placeholder="Search Here" class="form-control" >
                                                    <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="coman_design_block_info">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped create_responsive_table display"  id="example"  style="width:100%">
                                                            <thead>
                                                            <tr class="thead">
                                                            
                                                                <th>Sms Category</th>
                                                                <th>Template view</th>
                                                                <th>Addby</th>
                                                                <!-- <th>Time</th> -->
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                               
                                                            </tr>
                                                        </thead>
                                                          <tbody>
                                                            <?php foreach($sms_category_list as $cl){ ?>
                                                          
                                                            <tr>
                                                               
                                                                <td data-heading="Branch"><?php echo $cl->category; ?></td>
                                                               
                                                               <td data-heading="Branch"><?php echo substr($cl->sms_template,0,15)."..."; ?>
                                                                   <a style="padding:5px;background-color:black;color:white;" >View Template</a>
                                                               </td>
                                                               


                                                                <td data-heading="Department"><?php echo $cl->addBy; ?></td>
                                                                <td data-heading="Sub Department"><?php echo $cl->created_date; ?></td>
                                                              
                                                               <!--  <td data-heading="Satus"><span class="text-active">Active</span></td> -->
                                                                <td data-heading="Action">
                                                                    <ul class="action_icon_block icon_not_manage">
                                                                        <li>
                                                                            <a href="<?php echo base_url(); ?>LeadlistController/sms_template?action=update&id=<?php echo $cl->sms_id; ?>"class="action_icon action_edit" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="<?php echo base_url(); ?>LeadlistController/sms_template?action=delete&id=<?php echo $cl->sms_id; ?>" class="action_icon action_delete" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="action_icon action_disable" data-toggle="tooltip" title="Disable"><i class="fas fa-ban"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                     
                                                        <?php } ?>
                                                           </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12 text-center">
                                                    <nav class="pagination_block">
                                                        <ul class="pagination justify-content-center">
                                                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                                        </ul>
                                                    </nav>
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


  



<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js "></script>


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('.sub_menu').click(function() {
            $('.sub_menu').children("span").addClass('hiiamdown');
        })
    })
</script> -->


<script>

    $(document).ready(function() {
    $('#example').DataTable();
} );

</script>
</body>
</html>
