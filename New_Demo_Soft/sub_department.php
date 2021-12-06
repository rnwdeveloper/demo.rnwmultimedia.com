<?php include('header.php'); ?>

    <main class="main_content d-inline-block">
        <section class="page_title_block d-inline-block w-100 position-relative pb-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page_heading">
                            <h1>Sub Department</h1>
                        </div>
                    </div>
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
                                          <button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_1" aria-expanded="false">ADD SubDepartment  <span class="d-inline-block float-right pluse_icon">✕</span></button>
                                   </h2>
                                </div>
                                <div id="student_filter_panel_1" class="collapse show" data-parent="#student_list_aoc" style="">
                                    <div class="coman_design_block_box">
                                        <div class="coman_design_block_title d-inline-block w-100 border-bottom">
                                            <h4 class="d-inline-block align-middle">ADD SubDepartment </h4>
                                        </div>
                                        <form class="coman_design_block_info">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="pwd">Admin:</label>
                                                        <select class="form-control">
                                                            <option>Select Admin</option>
                                                            <option>Hiral Khunt</option>
                                                            <option>Ayush Donga</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-12">
                                                    <label for="pwd">Branch:</label>
                                                    <div class="form-group">
                                                        <select required="" class="form-control" name="branch_id">
                                                            <option value="">Select Branch</option>
                                                            <option value="1">AK ROAD</option>
                                                            <option value="3">MOTA VARACHHA</option>
                                                            <option value="4">VESU</option>
                                                            <option value="5">YOGI CHOWK</option>
                                                            <option value="8">SARTHANA</option>
                                                            <option value="9">AK ROAD-RW1B</option>
                                                            <option value="10">INTERNATIONAL</option>
                                                            <option value="11">RNWCOLLAGE</option>
                                                            <option value="16">SARTHANA2</option>
                                                            <option value="15">AK Road</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-12">
                                                	<div class="form-group">
                                                        <label for="pwd">Department:</label>
                                                		<select required="" name="department_ids" id="department" class="form-control" value="">
		                                                  <option value="">Select Department</option>
		                                                </select>
                                                	</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="pwd">Sub Department Name:</label>
                                                        <div class="btn-group w-100">
                                                            <input type="text" class="form-control" value="" name="password" placeholder="Enter Department Name" required="">
                                                            <button type="button" class="btn btn-primary">Add</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12 text-center">
                                                <button type="button" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header mb-0">
                                    <h2 class="mb-0">
                                          <button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_2" aria-expanded="false">Display Department <span class="d-inline-block float-right pluse_icon">✕</span></button>
                                   </h2>
                                </div>
                                <div id="student_filter_panel_2" class="collapse" data-parent="#student_list_aoc" style="">
                                    <div class="coman_design_block_box">
                                        <div class="coman_design_block_title d-inline-block w-100 border-bottom">
                                            <h4 class="d-inline-block align-middle">Display Department</h4>
                                        </div>
                                        <div class="table_search_panel d-inline-block w-100">
                                            <div class="col-xl-4 mx-auto">
                                                <div class="btn-group w-100">
                                                    <input type="text" name="" placeholder="Search Here" class="form-control">
                                                    <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="coman_design_block_info">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped create_responsive_table">
                                                            <tr class="thead">
                                                                <th>Admin</th>
                                                                <th>State</th>
                                                                <th>City</th>
                                                                <th>Branch Name</th>
                                                                <th>Department Name</th>
                                                                <th>Sub Department Name</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <tr>
                                                                <td data-heading="Admin">Ayush</td>
                                                                <td data-heading="State">Gujarat</td>
                                                                <td data-heading="City">Surat</td>
                                                                <td data-heading="Branch Name">Yogi Chowk</td>
                                                                <td data-heading="Department Name">COLLEGE </td>
                                                                <td data-heading="Sub Department Name">Programing </td>
                                                                <td data-heading="Satus"><span class="text-active">Active</span></td>
                                                                <td data-heading="Action">
                                                                    <ul class="action_icon_block">
                                                                        <li>
                                                                            <a href="#" class="action_icon action_edit" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="action_icon action_delete" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="action_icon action_disable" data-toggle="tooltip" title="Disable"><i class="fas fa-ban"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td data-heading="Admin">Ayush</td>
                                                                <td data-heading="State">Gujarat</td>
                                                                <td data-heading="City">Surat</td>
                                                                <td data-heading="Branch Name">Yogi Chowk</td>
                                                                <td data-heading="Department Name">COLLEGE </td>
                                                                <td data-heading="Sub Department Name">Programing </td>
                                                                <td data-heading="Satus"><span class="text-active">Active</span></td>
                                                                <td data-heading="Action">
                                                                    <ul class="action_icon_block">
                                                                        <li>
                                                                            <a href="#" class="action_icon action_edit" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="action_icon action_delete" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="action_icon action_disable" data-toggle="tooltip" title="Disable"><i class="fas fa-ban"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td data-heading="Admin">Ayush</td>
                                                                <td data-heading="State">Gujarat</td>
                                                                <td data-heading="City">Surat</td>
                                                                <td data-heading="Branch Name">Yogi Chowk</td>
                                                                <td data-heading="Department Name">COLLEGE </td>
                                                                <td data-heading="Sub Department Name">Programing </td>
                                                                <td data-heading="Satus"><span class="text-active">Active</span></td>
                                                                <td data-heading="Action">
                                                                    <ul class="action_icon_block">
                                                                        <li>
                                                                            <a href="#" class="action_icon action_edit" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="action_icon action_delete" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="action_icon action_disable" data-toggle="tooltip" title="Disable"><i class="fas fa-ban"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
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

    <?php include('footer.php'); ?>