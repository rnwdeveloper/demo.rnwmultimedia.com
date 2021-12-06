<?php include('header.php'); ?>

    <main class="main_content d-inline-block">
        <section class="page_title_block d-inline-block w-100 position-relative pb-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page_heading">
                            <h1>Course Package</h1>
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
                                          <button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_1" aria-expanded="false">
                                                 Create Package <span class="d-inline-block float-right pluse_icon">✕</span>
                                          </button>
                                   </h2>
                                </div>
                                <div id="student_filter_panel_1" class="collapse show" data-parent="#student_list_aoc" style="">
                                    <div class="coman_design_block_box">
                                        <div class="coman_design_block_title d-inline-block w-100 border-bottom">
                                            <h4 class="d-inline-block align-middle">Create Package</h4>
                                        </div>
                                        <form class="coman_design_block_info">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="pwd">Admin:</label>
                                                        <select class="form-control">
                                                            <option>Select Admin</option>
                                                            <option>Hiral Khunt</option>
                                                            <option>Ayush Donga</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
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
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="pwd">Package Name:</label>
                                                        <input class="form-control" value="" type="email" name="email" placeholder="Enter Package Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="pwd">Package Code:</label>
                                                        <input class="form-control" value="" type="email" name="email" placeholder="Enter Package Code" required>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                                	<div class="form-group">
                                                		<label>Fees:</label>
                                                		<input type="tetx" name="" placeholder="Enter Course Fees" class="form-control">
                                                	</div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                                	<div class="form-group">
                                                		<label>Installment :</label>
                                                		<input type="text" name="" placeholder="Installment" class="form-control">
                                                	</div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                                	<div class="form-group">
                                                		<label>Course Duration :</label>
                                                		<input type="text" name="" placeholder="Enter Month " class="form-control">
                                                	</div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                            		<div class="form-group">
			                							<label class="radio_btn_title">Job Guarantee : </label> <br>
			                							<span>
			                								<div class="form-check form-check-inline">
			                									<label> <input type="radio" name="ok"> Yes</label>
			                								</div>
			                								<div class="form-check form-check-inline">
			                									<label> <input type="radio" name="ok"> No</label>
			                								</div>
			                							</span>
			                						</div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                                	<div class="form-group">
                                                		<label>Upload Signing Sheet :</label>
                                                		<input type="file" name="" class="form-control">
                                                	</div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12 text-center">
                                                <button type="button" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header mb-0">
                                    <h2 class="mb-0">
                                          <button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_2" aria-expanded="false"> Display Package <span class="d-inline-block float-right pluse_icon">✕</span></button>
                                   </h2>
                                </div>
                                <div id="student_filter_panel_2" class="collapse" data-parent="#student_list_aoc" style="">
                                    <div class="coman_design_block_box">
                                        <div class="coman_design_block_title d-inline-block w-100 border-bottom">
                                            <h4 class="d-inline-block align-middle">Display Package</h4>
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
                                                                <th>Branch</th>
                                                                <th>Department</th>
                                                                <th>Sub Department</th>
                                                                <th>Package Name</th>
                                                                <th>Fees & Installment</th>
                                                                <th>Job Guarantee</th>
                                                                <th>Course</th>
                                                                <th>Relevant Course Add</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <tr>
                                                                <td data-heading="Admin">Ayush</td>
                                                                <td data-heading="Branch">AK ROAD</td>
                                                                <td data-heading="Department">COMPUTER</td>
                                                                <td data-heading="Sub Department">Designing</td>
                                                                <td data-heading="Package Name">
                                                                    <ul>
                                                                        <li>2D Game Design</li>
                                                                        <li>Code : 2dgame</li>
                                                                        <li>Fees : 20000</li>
                                                                        <li>Installment : 2</li>
                                                                        <li>Duration : 4</li>
                                                                    </ul>
                                                                </td>
                                                                <td data-heading="Fees & Installment">
                                                                	<ul>
                                                                		<li>Fees : 4000</li>
                                                                		<li>Installment : 1</li>
                                                                		<li>Duration : 2</li>
                                                                	</ul>
                                                                </td>
                                                                <td data-heading="Job Guarantee">No</td>
                                                                <td data-heading="Course">
                                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sucourse">Course</button>
                                                                </td>
                                                                <td data-heading="Relevant Course">
                                                                	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#relevant_course_add">Relevant Course</button>
                                                                </td>
                                                                <td data-heading="Satus"><span class="text-active">Active</span></td>
                                                                <td data-heading="Action">
                                                                    <ul class="action_icon_block icon_not_manage">
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


    <div class="modal fade" id="relevant_course_add">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <from class="modal-content shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title">Course Name : C</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
    				<div class="row all_demo_student_block">
    					<div class="col-lg-12">
    						<h5 class="in_modal_aoc_small_title">Department Name : COMPUTER</h5>
    					</div>
    				    <div class="col-lg-12">
    				        <div class="accordion accordion_design_2 hod_selected_checkbox" id="view_hod_course">
    				            <div class="card">
    				                <div class="card-header mb-0">
    				                    <h2 class="mb-0">
    										<button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#view_hod_course_tab1" aria-expanded="false">
    											Single Course <span class="d-inline-block float-right pluse_icon">✕</span>
    										</button>
    									</h2>
    				                </div>
    				                <div id="view_hod_course_tab1" class="collapse" data-parent="#view_hod_course" style="">
    				                	<div class="coman_design_block_box">
    				                		<div class="coman_design_block_info pt-0">
    				                			<div class="row">
    				                				<table class="table table-bordered table-striped">
    				                				    <tbody>
    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="18" name="hod_course[]"> C </label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="17" name="hod_course[]"> CCC</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="16" name="hod_course[]"> COREL DRAW</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="15" name="hod_course[]"> PHOTOSHOP BASICS</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="19" name="hod_course[]"> C++</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="20" name="hod_course[]"> CORE JAVA</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="21" name="hod_course[]"> CORE PHP</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="22" name="hod_course[]"> &nbsp;ILLUSTRATOR</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="23" name="hod_course[]"> CORE ANDROID </label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="24" name="hod_course[]"> AUTOCAD (MECHANICAL)</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="25" name="hod_course[]"> AUTO CAD (CIVIL)</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="26" name="hod_course[]"> PHOTOSHOP STUDIO</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="27" name="hod_course[]"> PHOTOSHOP DTP/STUDIO</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="28" name="hod_course[]"> PHOTOSHOP TEXTILE MODELING</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="29" name="hod_course[]"> PHOTOSHOP D.PRINTING </label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="30" name="hod_course[]"> PHOTOSHOP WEB</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="31" name="hod_course[]"> BE ENTREPRENEUR/ FREELANCER</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="32" name="hod_course[]"> PHOTOSHOP FOR INSTAGRAM REGARDING EDITING</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="37" name="hod_course[]"> UI/UX &amp; WEB APPLICATION DESING</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="42" name="hod_course[]"> CORE PHP PROJECT</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="43" name="hod_course[]"> ADVANCE PHP PROJECT</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="44" name="hod_course[]"> ADVANCE JAVA</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="46" name="hod_course[]"> ONLY ADVANCE ANDROID</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="47" name="hod_course[]"> MASTER JAVA</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="48" name="hod_course[]"> UNITY 3D(FOR SCRIPTING)</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="49" name="hod_course[]"> WEB MARKETING</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="50" name="hod_course[]"> TALLY</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="52" name="hod_course[]"> AUTOCAD2D (CIVIL)</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="53" name="hod_course[]"> CREO</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="54" name="hod_course[]"> SOLIDWORKS</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="56" name="hod_course[]"> VRAY</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="57" name="hod_course[]"> LUMION</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="58" name="hod_course[]"> REVIT ARCH.</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="59" name="hod_course[]"> 3Ds MAX</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="60" name="hod_course[]"> OBJECT ANIMATION </label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="162" name="hod_course[]"> javascript advance</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="163" name="hod_course[]"> javascript basic</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="65" name="hod_course[]"> AFTER EFFECT</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="66" name="hod_course[]"> ADOBE PREMIER</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="161" name="hod_course[]"> AUTOCAD2D (MECHANICAL)</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="73" name="hod_course[]"> CORE IOS</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="74" name="hod_course[]"> ONLY ADVANCE IOS</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="76" name="hod_course[]"> PHP FRAMWORK</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="77" name="hod_course[]"> ADVANCED ASP.NET</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="81" name="hod_course[]"> MOBILE APP MARKETING</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="85" name="hod_course[]"> LARAVEL</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="86" name="hod_course[]"> DIGITAL MARKETING </label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="87" name="hod_course[]"> MAYA INTERIOR BASED</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="88" name="hod_course[]"> ETABS </label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="90" name="hod_course[]"> ASO &amp; EARNING</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="91" name="hod_course[]"> CATIA </label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="93" name="hod_course[]"> MS EXCEL</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="96" name="hod_course[]"> STAAD PRO</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="97" name="hod_course[]"> PROJECT IN ANDROID</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="98" name="hod_course[]"> ADOBE AUDITION</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="100" name="hod_course[]"> GOOGLE SKETCH UP</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="101" name="hod_course[]"> AUTO CAD ELECTRIC</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="102" name="hod_course[]"> WORDPRESS</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="103" name="hod_course[]"> EDUISE</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="104" name="hod_course[]"> HTML/CSS/SASS/LESS/BT </label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="105" name="hod_course[]"> HTML </label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="106" name="hod_course[]"> SEO HOSTING</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="107" name="hod_course[]"> DRAWING</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="108" name="hod_course[]"> PERSONALITY DEVELOPMENT</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="110" name="hod_course[]"> PREMIERE</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="111" name="hod_course[]"> SWIFT</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="113" name="hod_course[]"> ADOBE FLASH</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="117" name="hod_course[]"> PYTHON CORE</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="118" name="hod_course[]"> UNITY 3D (FOR DESIGNING)</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="119" name="hod_course[]"> ANGULAR JS</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="120" name="hod_course[]"> NODE JS</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="121" name="hod_course[]"> Adobe XD</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="122" name="hod_course[]"> PYTHON ADVANCE</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="123" name="hod_course[]"> C#</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="124" name="hod_course[]"> MAYA WITH HUMAN BODY(GAMMING)</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="127" name="hod_course[]"> NX CAD</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="129" name="hod_course[]"> Animated CC</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="130" name="hod_course[]"> ETHICAL HACKING</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="131" name="hod_course[]"> JAVA SCRIPT </label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="132" name="hod_course[]"> CORONA</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="134" name="hod_course[]"> React Native</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="135" name="hod_course[]"> FLUTTER(Dart Included)</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="136" name="hod_course[]"> React Js</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="137" name="hod_course[]"> COMPUTER SECURITY</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="139" name="hod_course[]"> PHOTOSHOP_GRAPHICS</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="142" name="hod_course[]"> Stitch Max</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="143" name="hod_course[]"> Z-Brush</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="144" name="hod_course[]"> PHOTOSHOP</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="145" name="hod_course[]"> DJANGO</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="147" name="hod_course[]"> PRINCIPLE</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="148" name="hod_course[]"> SKETCH</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="151" name="hod_course[]"> CodeIgniter</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="153" name="hod_course[]"> IN DESIGN</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="154" name="hod_course[]"> DJANGO PROJECT</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="155" name="hod_course[]"> CORE ASP.NET</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="156" name="hod_course[]"> Blender</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="157" name="hod_course[]"> Light Room</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="158" name="hod_course[]"> DART</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="159" name="hod_course[]"> Interview technique with job (free but with course package)</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="165" name="hod_course[]"> PHOTOSHOP FOR GAME DESIGN </label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="166" name="hod_course[]"> ILLUSTRATOR FOR GAME DESIGN </label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="167" name="hod_course[]"> 3Ds MAX FOR GAME DESIGN</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="168" name="hod_course[]"> CORONA FOR GAME DESIGN </label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="169" name="hod_course[]"> test2</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="170" name="hod_course[]"> Adnvance Android</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="171" name="hod_course[]"> Basic Tally</label>
    				                				            </td>

    				                				        </tr>

    				                				        <tr>
    				                				            <td>
    				                				                <label class="checkbox-inline">
    				                				                    <input type="checkbox" value="172" name="hod_course[]"> SEO_DIGITAL MARKETING</label>
    				                				            </td>

    				                				        </tr>

    				                				    </tbody>
    				                				</table>
    				                			</div>
    				                		</div>
    				                	</div>
    				                </div>
    				            </div>
    	                        <div class="card">
    	                            <div class="card-header mb-0">
    	                                <h2 class="mb-0">
    	            						<button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#view_hod_course_tab2" aria-expanded="false">
    	            							Course Package <span class="d-inline-block float-right pluse_icon">✕</span>
    	            						</button>
    	            					</h2>
    	                            </div>
    	                            <div id="view_hod_course_tab2" class="collapse" data-parent="#view_hod_course" style="">
    	                            	<div class="coman_design_block_box">
    	                            		<div class="coman_design_block_info pt-0">
    	                            			<div class="row">
    	                            				<table class="table table-bordered table-striped">
    	                            				    <tbody>
    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="5" name="hod_package[]"> ADVANCE ANDROID</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="6" name="hod_package[]"> A.CAD 2D +3D MAX + VRAY + SKETCH UP + PHOTOSHOP</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="7" name="hod_package[]"> CAREER IN IOS(C,C++ CHARGEABLE EXTRA WITH 10000)</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="8" name="hod_package[]"> C+c++ +Core JAVA + Core Android + A.ANDROID</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="9" name="hod_package[]"> C , C++, JAVA CORE</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="10" name="hod_package[]"> MASTER IN IOS </label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="12" name="hod_package[]"> MODUAL 2 / CODING 2019</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="14" name="hod_package[]"> MASTER IN WEB FRONT END DESIGNING</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="15" name="hod_package[]"> A. WEB DESIGNING AND DEVLOPING / 2019</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="16" name="hod_package[]"> Career In Android</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="17" name="hod_package[]"> PHP + FRAMEWORK</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="18" name="hod_package[]"> AUTOCAD 2D + REVIT ARCHITECTURE</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="19" name="hod_package[]"> PHP+FRAMEWORK+HTML/CSS/BT</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="20" name="hod_package[]"> C + C++ + PYTHON CORE + ADVANCE PYTHON</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="21" name="hod_package[]"> 3DMAX +VRAY +PHOTOSHOP+OBJECT ANIMATION</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="22" name="hod_package[]"> 3D MAX + V-RAY + PHOTOSHOP</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="23" name="hod_package[]"> C , C++</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="24" name="hod_package[]"> C + C++ +FLUTTER</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="25" name="hod_package[]"> ADVACED GRAPHICS</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="26" name="hod_package[]"> C + C++ PYTHON CORE + ADVANCE PYTHON + DJANJO</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="27" name="hod_package[]"> MODUAL 4 / BACK END DEVELOPING 2019</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="28" name="hod_package[]"> Core Python + A.Python +Django</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="29" name="hod_package[]"> AUTOCAD+CREO</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="30" name="hod_package[]"> AUTOCAD + SOLIDWORKS</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="32" name="hod_package[]"> DIGITAL PRINTING</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="33" name="hod_package[]"> VIDEO EDITING</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="34" name="hod_package[]"> MODUAL 1 / DESIGNING 2019</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="35" name="hod_package[]"> DESKTOP PUBLICITY</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="36" name="hod_package[]"> Certificate In Web Design &amp; Developing </label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="41" name="hod_package[]"> A.CAD + NX</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="43" name="hod_package[]"> PRE GIM</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="44" name="hod_package[]"> C + C++ +PYTHON CORE</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="45" name="hod_package[]"> ANIMATION 2D &amp; 3D</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="46" name="hod_package[]"> ADVANCE IOS</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="47" name="hod_package[]"> MASTER IN WEB DESIGNING</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="48" name="hod_package[]"> LUMION+SKETCH UP</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="49" name="hod_package[]"> MASTER IN WEB DEVELOPING</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="60" name="hod_package[]"> CORE PYTHON + A. PYTHON</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="50" name="hod_package[]"> MASTER IN ANDROID</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="51" name="hod_package[]"> MASTER IN ANIMATION</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="52" name="hod_package[]"> MASTER IN GRAPHICS </label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="53" name="hod_package[]"> MASTER IN GAME DESIGN &amp; DEVELOPMENT</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="54" name="hod_package[]"> C+ C++ + CORE JAVA + A.JAVA</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="55" name="hod_package[]"> CORE JAVA + A.JAVA</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="56" name="hod_package[]"> CORE JAVA + A.JAVA + MASTER JAVA</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="75" name="hod_package[]"> GIM</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="73" name="hod_package[]"> A. Paython + Django</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="76" name="hod_package[]"> Game Designing &amp; Developing</label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="77" name="hod_package[]"> 2D Game Design </label>
    	                            				            </td>

    	                            				        </tr>

    	                            				        <tr>
    	                            				            <td>
    	                            				                <label class="checkbox-inline">
    	                            				                    <input type="checkbox" value="78" name="hod_package[]"> 3D GAME DESIGN </label>
    	                            				            </td>

    	                            				        </tr>

    	                            				    </tbody>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </from>
        </div>
    </div>
    <div class="modal fade" id="sucourse">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <from class="modal-content shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title">Course Name : C</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row all_demo_student_block">
                        <div class="col-lg-12">
                            <h5 class="in_modal_aoc_small_title">Department Name : COMPUTER</h5>
                        </div>
                        <div class="col-lg-12">
                            <div class="accordion accordion_design_2 hod_selected_checkbox" id="view_hod_course">
                                <div class="card">
                                    <div class="card-header mb-0">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#view_hod_course_tab1" aria-expanded="false">
                                                Single Course <span class="d-inline-block float-right pluse_icon">✕</span>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="view_hod_course_tab1" class="collapse" data-parent="#view_hod_course" style="">
                                        <div class="coman_design_block_box">
                                            <div class="coman_design_block_info pt-0">
                                                <div class="row">
                                                    <table class="table table-bordered table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="18" name="hod_course[]"> C </label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="17" name="hod_course[]"> CCC</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="16" name="hod_course[]"> COREL DRAW</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="15" name="hod_course[]"> PHOTOSHOP BASICS</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="19" name="hod_course[]"> C++</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="20" name="hod_course[]"> CORE JAVA</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="21" name="hod_course[]"> CORE PHP</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="22" name="hod_course[]"> &nbsp;ILLUSTRATOR</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="23" name="hod_course[]"> CORE ANDROID </label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="24" name="hod_course[]"> AUTOCAD (MECHANICAL)</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="25" name="hod_course[]"> AUTO CAD (CIVIL)</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="26" name="hod_course[]"> PHOTOSHOP STUDIO</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="27" name="hod_course[]"> PHOTOSHOP DTP/STUDIO</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="28" name="hod_course[]"> PHOTOSHOP TEXTILE MODELING</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="29" name="hod_course[]"> PHOTOSHOP D.PRINTING </label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="30" name="hod_course[]"> PHOTOSHOP WEB</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="31" name="hod_course[]"> BE ENTREPRENEUR/ FREELANCER</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="32" name="hod_course[]"> PHOTOSHOP FOR INSTAGRAM REGARDING EDITING</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="37" name="hod_course[]"> UI/UX &amp; WEB APPLICATION DESING</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="42" name="hod_course[]"> CORE PHP PROJECT</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="43" name="hod_course[]"> ADVANCE PHP PROJECT</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="44" name="hod_course[]"> ADVANCE JAVA</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="46" name="hod_course[]"> ONLY ADVANCE ANDROID</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="47" name="hod_course[]"> MASTER JAVA</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="48" name="hod_course[]"> UNITY 3D(FOR SCRIPTING)</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="49" name="hod_course[]"> WEB MARKETING</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="50" name="hod_course[]"> TALLY</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="52" name="hod_course[]"> AUTOCAD2D (CIVIL)</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="53" name="hod_course[]"> CREO</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="54" name="hod_course[]"> SOLIDWORKS</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="56" name="hod_course[]"> VRAY</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="57" name="hod_course[]"> LUMION</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="58" name="hod_course[]"> REVIT ARCH.</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="59" name="hod_course[]"> 3Ds MAX</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="60" name="hod_course[]"> OBJECT ANIMATION </label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="162" name="hod_course[]"> javascript advance</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="163" name="hod_course[]"> javascript basic</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="65" name="hod_course[]"> AFTER EFFECT</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="66" name="hod_course[]"> ADOBE PREMIER</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="161" name="hod_course[]"> AUTOCAD2D (MECHANICAL)</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="73" name="hod_course[]"> CORE IOS</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="74" name="hod_course[]"> ONLY ADVANCE IOS</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="76" name="hod_course[]"> PHP FRAMWORK</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="77" name="hod_course[]"> ADVANCED ASP.NET</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="81" name="hod_course[]"> MOBILE APP MARKETING</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="85" name="hod_course[]"> LARAVEL</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="86" name="hod_course[]"> DIGITAL MARKETING </label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="87" name="hod_course[]"> MAYA INTERIOR BASED</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="88" name="hod_course[]"> ETABS </label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="90" name="hod_course[]"> ASO &amp; EARNING</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="91" name="hod_course[]"> CATIA </label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="93" name="hod_course[]"> MS EXCEL</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="96" name="hod_course[]"> STAAD PRO</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="97" name="hod_course[]"> PROJECT IN ANDROID</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="98" name="hod_course[]"> ADOBE AUDITION</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="100" name="hod_course[]"> GOOGLE SKETCH UP</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="101" name="hod_course[]"> AUTO CAD ELECTRIC</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="102" name="hod_course[]"> WORDPRESS</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="103" name="hod_course[]"> EDUISE</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="104" name="hod_course[]"> HTML/CSS/SASS/LESS/BT </label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="105" name="hod_course[]"> HTML </label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="106" name="hod_course[]"> SEO HOSTING</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="107" name="hod_course[]"> DRAWING</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="108" name="hod_course[]"> PERSONALITY DEVELOPMENT</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="110" name="hod_course[]"> PREMIERE</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="111" name="hod_course[]"> SWIFT</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="113" name="hod_course[]"> ADOBE FLASH</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="117" name="hod_course[]"> PYTHON CORE</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="118" name="hod_course[]"> UNITY 3D (FOR DESIGNING)</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="119" name="hod_course[]"> ANGULAR JS</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="120" name="hod_course[]"> NODE JS</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="121" name="hod_course[]"> Adobe XD</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="122" name="hod_course[]"> PYTHON ADVANCE</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="123" name="hod_course[]"> C#</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="124" name="hod_course[]"> MAYA WITH HUMAN BODY(GAMMING)</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="127" name="hod_course[]"> NX CAD</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="129" name="hod_course[]"> Animated CC</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="130" name="hod_course[]"> ETHICAL HACKING</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="131" name="hod_course[]"> JAVA SCRIPT </label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="132" name="hod_course[]"> CORONA</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="134" name="hod_course[]"> React Native</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="135" name="hod_course[]"> FLUTTER(Dart Included)</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="136" name="hod_course[]"> React Js</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="137" name="hod_course[]"> COMPUTER SECURITY</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="139" name="hod_course[]"> PHOTOSHOP_GRAPHICS</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="142" name="hod_course[]"> Stitch Max</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="143" name="hod_course[]"> Z-Brush</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="144" name="hod_course[]"> PHOTOSHOP</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="145" name="hod_course[]"> DJANGO</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="147" name="hod_course[]"> PRINCIPLE</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="148" name="hod_course[]"> SKETCH</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="151" name="hod_course[]"> CodeIgniter</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="153" name="hod_course[]"> IN DESIGN</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="154" name="hod_course[]"> DJANGO PROJECT</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="155" name="hod_course[]"> CORE ASP.NET</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="156" name="hod_course[]"> Blender</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="157" name="hod_course[]"> Light Room</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="158" name="hod_course[]"> DART</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="159" name="hod_course[]"> Interview technique with job (free but with course package)</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="165" name="hod_course[]"> PHOTOSHOP FOR GAME DESIGN </label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="166" name="hod_course[]"> ILLUSTRATOR FOR GAME DESIGN </label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="167" name="hod_course[]"> 3Ds MAX FOR GAME DESIGN</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="168" name="hod_course[]"> CORONA FOR GAME DESIGN </label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="169" name="hod_course[]"> test2</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="170" name="hod_course[]"> Adnvance Android</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="171" name="hod_course[]"> Basic Tally</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="172" name="hod_course[]"> SEO_DIGITAL MARKETING</label>
                                                                </td>

                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header mb-0">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#view_hod_course_tab2" aria-expanded="false">
                                                Course Package <span class="d-inline-block float-right pluse_icon">✕</span>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="view_hod_course_tab2" class="collapse" data-parent="#view_hod_course" style="">
                                        <div class="coman_design_block_box">
                                            <div class="coman_design_block_info pt-0">
                                                <div class="row">
                                                    <table class="table table-bordered table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="5" name="hod_package[]"> ADVANCE ANDROID</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="6" name="hod_package[]"> A.CAD 2D +3D MAX + VRAY + SKETCH UP + PHOTOSHOP</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="7" name="hod_package[]"> CAREER IN IOS(C,C++ CHARGEABLE EXTRA WITH 10000)</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="8" name="hod_package[]"> C+c++ +Core JAVA + Core Android + A.ANDROID</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="9" name="hod_package[]"> C , C++, JAVA CORE</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="10" name="hod_package[]"> MASTER IN IOS </label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="12" name="hod_package[]"> MODUAL 2 / CODING 2019</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="14" name="hod_package[]"> MASTER IN WEB FRONT END DESIGNING</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="15" name="hod_package[]"> A. WEB DESIGNING AND DEVLOPING / 2019</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="16" name="hod_package[]"> Career In Android</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="17" name="hod_package[]"> PHP + FRAMEWORK</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="18" name="hod_package[]"> AUTOCAD 2D + REVIT ARCHITECTURE</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="19" name="hod_package[]"> PHP+FRAMEWORK+HTML/CSS/BT</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="20" name="hod_package[]"> C + C++ + PYTHON CORE + ADVANCE PYTHON</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="21" name="hod_package[]"> 3DMAX +VRAY +PHOTOSHOP+OBJECT ANIMATION</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="22" name="hod_package[]"> 3D MAX + V-RAY + PHOTOSHOP</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="23" name="hod_package[]"> C , C++</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="24" name="hod_package[]"> C + C++ +FLUTTER</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="25" name="hod_package[]"> ADVACED GRAPHICS</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="26" name="hod_package[]"> C + C++ PYTHON CORE + ADVANCE PYTHON + DJANJO</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="27" name="hod_package[]"> MODUAL 4 / BACK END DEVELOPING 2019</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="28" name="hod_package[]"> Core Python + A.Python +Django</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="29" name="hod_package[]"> AUTOCAD+CREO</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="30" name="hod_package[]"> AUTOCAD + SOLIDWORKS</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="32" name="hod_package[]"> DIGITAL PRINTING</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="33" name="hod_package[]"> VIDEO EDITING</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="34" name="hod_package[]"> MODUAL 1 / DESIGNING 2019</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="35" name="hod_package[]"> DESKTOP PUBLICITY</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="36" name="hod_package[]"> Certificate In Web Design &amp; Developing </label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="41" name="hod_package[]"> A.CAD + NX</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="43" name="hod_package[]"> PRE GIM</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="44" name="hod_package[]"> C + C++ +PYTHON CORE</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="45" name="hod_package[]"> ANIMATION 2D &amp; 3D</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="46" name="hod_package[]"> ADVANCE IOS</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="47" name="hod_package[]"> MASTER IN WEB DESIGNING</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="48" name="hod_package[]"> LUMION+SKETCH UP</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="49" name="hod_package[]"> MASTER IN WEB DEVELOPING</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="60" name="hod_package[]"> CORE PYTHON + A. PYTHON</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="50" name="hod_package[]"> MASTER IN ANDROID</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="51" name="hod_package[]"> MASTER IN ANIMATION</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="52" name="hod_package[]"> MASTER IN GRAPHICS </label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="53" name="hod_package[]"> MASTER IN GAME DESIGN &amp; DEVELOPMENT</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="54" name="hod_package[]"> C+ C++ + CORE JAVA + A.JAVA</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="55" name="hod_package[]"> CORE JAVA + A.JAVA</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="56" name="hod_package[]"> CORE JAVA + A.JAVA + MASTER JAVA</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="75" name="hod_package[]"> GIM</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="73" name="hod_package[]"> A. Paython + Django</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="76" name="hod_package[]"> Game Designing &amp; Developing</label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="77" name="hod_package[]"> 2D Game Design </label>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" value="78" name="hod_package[]"> 3D GAME DESIGN </label>
                                                                </td>

                                                            </tr>

                                                        </tbody>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </from>
        </div>
    </div>
    <?php include('footer.php'); ?>