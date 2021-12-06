
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">
            <div class="extra_lead_menu">
                <div class="col-12 d-flex justify-content-between">
                    <h6 class="page-title text-dark mb-3">Employee Details</h6>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" data-toggle="modal"
                                    data-target=".whastapp-message">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employe Details</li>
                        </ol>
                    </nav>
                </div>
                <section class="section">
                    <div class="section-body">
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav pl-0 ml-auto mb-3">
                                    <li class="float-right ml-2">
                                        <a href="#" class="btn btn-info text-white" data-toggle="modal" data-target=".add_group_detail">
                                            <i class="fas fa-users" title="Add Group"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <button class="btn" tabindex="0" aria-controls="tableExport"><span><i
                                                    class="fas fa-arrow-left mr-1"></i> Back</span></button>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped normal-table" id="table1">
                                        <thead>
                                            <tr>
                                                <th>Icon</th>
                                                <th>Name</th>
                                                <th>Role</th>
                                                <th>Parent</th>
                                                <th class="text-center">Add Task</th>
                                                <th class="text-center">Members</th>
                                                <th class="text-center">Add Members</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="student_image ml-0">
                                                        <img src="https://preview.keenthemes.com/metronic-v4/theme/assets/pages/media/profile/profile_user.jpg"
                                                            class="rounded-circle shadow-sm border-0" width="100%"
                                                            height="100%" alt="">
                                                    </div>
                                                </td>
                                                <td>Test1</td>
                                                <td>Super Admin</td>
                                                <td>Super Admin</td>
                                                <td class="text-center">
                                                    <a href="#" data-toggle="modal" data-target=".add_task_detail"
                                                        class="bg-info action-icon text-white btn-primary"><i
                                                            class="fa fa-tasks"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#"
                                                        class="bg-hold action-icon text-white btn-hold open_rightsidebar"><i
                                                            class="fas fa-users"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="bg-warning action-icon text-white btn-warning open_rightsidebar"><i
                                                            class="fas fa-user-plus"></i></a>
                                                </td>
                                                <td>
                                                    <a href="" class="bg-primary action-icon text-white btn-primary"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                    <a href="" class="bg-danger action-icon text-white btn-danger"><i
                                                            class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<div class="modal fade add_group_detail" tabindex="-1" role="dialog" aria-labelledby="add_group_detail"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="add_group_detail">Create Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                <input class="form-check-input" type="radio" value="No">
                                <div class="state p-info">
                                    <i class="icon material-icons">done</i>
                                    <label>Super admin</label>
                                </div>
                            </div>
                            <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                <input class="form-check-input" type="radio" value="No">
                                <div class="state p-info">
                                    <i class="icon material-icons">done</i>
                                    <label>User</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Admin</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Select Admin</option>
                                    <option value="">Admin 1</option>
                                    <option value="">Admin 2</option>
                                    <option value="">Admin 3</option>
                                    <option value="">Admin 4</option>
                                    <option value="">Admin 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Branch</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Select Branch</option>
                                    <option value="">Branch 1</option>
                                    <option value="">Branch 2</option>
                                    <option value="">Branch 3</option>
                                    <option value="">Branch 4</option>
                                    <option value="">Branch 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Department Id</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Select Department</option>
                                    <option value="">Department 1</option>
                                    <option value="">Department 2</option>
                                    <option value="">Department 3</option>
                                    <option value="">Department 4</option>
                                    <option value="">Department 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Parent Group</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Select Parent Group</option>
                                    <option value="">Parent Group 1</option>
                                    <option value="">Parent Group 2</option>
                                    <option value="">Parent Group 3</option>
                                    <option value="">Parent Group 4</option>
                                    <option value="">Parent Group 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Logtype Group</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Select Logtype Group</option>
                                    <option value="">Logtype Group 1</option>
                                    <option value="">Logtype Group 2</option>
                                    <option value="">Logtype Group 3</option>
                                    <option value="">Logtype Group 4</option>
                                    <option value="">Logtype Group 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Group Name</label>
                            <input type="text" class="form-control" placeholder="Enter Group Name">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>File input</label>
                                <input type="file" class="mt-2 d-block">
                            </div>
                        </div>
                        <div class="col-12">
                            <a href="" class="btn btn-info text-white">
                                Submit
                            </a>
                        </div>  
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade add_task_detail" tabindex="-1" role="dialog" aria-labelledby="add_task_detail"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="add_task_detail">Create Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="text-right">
                        <a href="#" class="btn btn-info text-white">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                    <form action="">
                        <div class="form-group">
                            <label>Task Name:</label>
                            <input type="text" class="form-control" placeholder="Enter Task Name">
                        </div>
                        <div class="form-group">
                            <label>Task Description:</label>
                            <textarea name="" id="" class="form-control" placeholder="Enter Task Description"
                                rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Photos:</label>
                            <input type="file" class="mt-2 d-block">
                            <span class="mt-1 d-inline-block">Attach file to image, word , excel , ppt</span>
                        </div>
                        <div class="accordion my-3">
                            <div class="accordion-item">
                                <div class="main-accordion shadow-sm card card-primary mb-3">
                                    <h6 class="accordion-title d-flex flex-wrap align-items-center justify-content-between p-3 mb-0"
                                        href="javascript:void(0)">
                                        Task Assign Participants  (hierarchy wise group or single person)<i class="fa fa-angle-down"></i>
                                    </h6>
                                    <div class="accordion-content show" style="display: none;">
                                        <div class="table-responsive p-3">
                                            <table class="table table-striped normal-table dataTable no-footer" id="table">
                                                <thead>
                                                    <tr>
                                                        <th>Group Name</th>
                                                        <th>Group Member</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Test 1</td>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                    <input class="form-check-input" type="radio" value="No">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>Hitesh Desai</label>
                                                                    </div>
                                                                </div>
                                                                <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                    <input class="form-check-input" type="radio" value="No">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>Bhavin Madahni HOD</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Test 1</td>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                    <input class="form-check-input" type="radio" value="No">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>Hitesh Desai</label>
                                                                    </div>
                                                                </div>
                                                                <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                    <input class="form-check-input" type="radio" value="No">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>Bhavin Madahni HOD</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-accordion shadow-sm card card-primary mb-3">
                                    <h6 class="accordion-title d-flex flex-wrap align-items-center justify-content-between p-3 mb-0"
                                        href="javascript:void(0)">
                                        Task Observer (Login person or hierarchy wise group or single person)<i class="fa fa-angle-down"></i>
                                    </h6>
                                    <div class="accordion-content show" style="display: none;">
                                    <div class="table-responsive p-3">
                                            <table class="table table-striped normal-table dataTable no-footer" id="table">
                                                <thead>
                                                    <tr>
                                                        <th>Group Name</th>
                                                        <th>Group Member</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Test 1</td>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                    <input class="form-check-input" type="radio" value="No">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>Hitesh Desai</label>
                                                                    </div>
                                                                </div>
                                                                <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                    <input class="form-check-input" type="radio" value="No">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>Bhavin Madahni HOD</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Test 1</td>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                    <input class="form-check-input" type="radio" value="No">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>Hitesh Desai</label>
                                                                    </div>
                                                                </div>
                                                                <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                                                    <input class="form-check-input" type="radio" value="No">
                                                                    <div class="state p-info">
                                                                        <i class="icon material-icons">done</i>
                                                                        <label>Bhavin Madahni HOD</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="d-block">Task Observation Statu:</label>
                            <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                <input class="form-check-input" type="radio" value="No">
                                <div class="state p-info">
                                    <i class="icon material-icons">done</i>
                                    <label>Assign Today Dedline Date</label>
                                </div>
                            </div>
                            <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                <input class="form-check-input" type="radio" value="No">
                                <div class="state p-info">
                                    <i class="icon material-icons">done</i>
                                    <label>Few Days Dedline Date</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="d-block">Task Priority:</label>
                            <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                <input class="form-check-input" type="radio" value="No">
                                <div class="state p-info">
                                    <i class="icon material-icons">done</i>
                                    <label>High</label>
                                </div>
                            </div>
                            <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                <input class="form-check-input" type="radio" value="No">
                                <div class="state p-info">
                                    <i class="icon material-icons">done</i>
                                    <label>Medium </label>
                                </div>
                            </div>
                            <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                <input class="form-check-input" type="radio" value="No">
                                <div class="state p-info">
                                    <i class="icon material-icons">done</i>
                                    <label>Low</label>
                                </div>
                            </div>
                        </div>
                        <a href="" class="btn btn-info text-white">
                            Submit
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="extra_sidebar-menu">
    <div class="">
        <button class="close-sidebar-left">X</button>
        <div class="rsidebar-items send-sms admission-remraks">
            <div class="rsidebar-title">
                <h3 class="mb-0">Member Names</h3>
            </div>
            <div class="rsidebar-middle">
                <div class="membar_detail">
                    <span class="d-inline-block">Name :</span>
                    <p class="d-inline-block"><strong>Hitesh Desai</strong></p>
                </div>
            </div>
            <div class="rsidebar-title">
                <h3 class="mb-0">Member</h3>
            </div>
            <div class="rsidebar-middle">
                <div class="form-group">
                    <label>Ggroup Membar</label>
                    <select name="" id="" class="form-control">
                        <option value="">Select Membar</option>
                        <option value="">Membar 1</option>
                        <option value="">Membar 2</option>
                        <option value="">Membar 3</option>
                        <option value="">Membar 4</option>
                    </select>
                </div>
            </div>
            <div class="form-fix-bottom pb-4 mb-2">
                <input type="submit" class="btn btn-primary" name="Save" value="Save">
            </div>
        </div>
    </div>
</div>

<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/cleave-js/dist/cleave.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/forms-advanced-forms.js"></script>

<!-- General JS Scripts -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/app.min.js"></script>
<!-- JS Libraies -->
<!--Excel Download-->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/table2excel.js"></script>
<!--Excel Download-->
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/datatables.min.js"></script>

<script
    src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/datatables.js"></script>

<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>

<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/custom.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/toastr.js"></script>

</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>