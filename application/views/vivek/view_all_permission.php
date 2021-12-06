<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">
            <div class="extra_lead_menu">
                <div class="col-12 d-flex justify-content-end mb-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Permission All</li>
                        </ol>
                    </nav>
                </div>
              
                <div class="d-flex align-items-center flex-wrap justify-content-end">
                    <div class="crm-search-menu mb-3">
                        <input type="search" class="form-control" placeholder="Search by Name">
                        <i type="button" class="fa fa-search" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="btn btn-primary text-white mb-3">Reset</span>
                    <a href="#" class="btn btn-primary text-white mb-3 ml-2">All</span>
                    </a>
                </div>
                <ul class="active_tab  nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item mb-3">
                        <a href="#" class="btn btn-primary text-white mx-1 active" id="pills-admin-tab" data-toggle="pill" href="#pills-admin"
                            role="tab" aria-controls="pills-admin" aria-selected="true">Admin</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a  href="#" class="btn btn-primary mx-1 text-white" id="pills-manger-tab" data-toggle="pill" href="#pills-manger"
                            role="tab" aria-controls="pills-manger" aria-selected="false">Manager</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a  href="#" class="btn btn-primary mx-1 text-white" id="pills-counselor-tab" data-toggle="pill" href="#pills-counselor"
                            role="tab" aria-controls="pills-counselor" aria-selected="false">Counselor</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a  href="#" class="btn btn-primary mx-1 text-white" id="pills-document-tab" data-toggle="pill" href="#pills-document"
                            role="tab" aria-controls="pills-document" aria-selected="false">Access Document</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a  href="#" class="btn btn-primary mx-1 text-white" id="pills-property-tab" data-toggle="pill" href="#pills-property"
                            role="tab" aria-controls="pills-property" aria-selected="false">Access Property</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a  href="#" class="btn btn-primary mx-1 text-white" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                            role="tab" aria-controls="pills-profile" aria-selected="false">Accountant</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a  href="#" class="btn btn-primary mx-1 text-white" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                            role="tab" aria-controls="pills-profile" aria-selected="false">Telecaller</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a  href="#" class="btn btn-primary mx-1 text-white" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                            role="tab" aria-controls="pills-profile" aria-selected="false">Progress Report Checker</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a  href="#" class="btn btn-primary mx-1 text-white" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                            role="tab" aria-controls="pills-profile" aria-selected="false">Faculty</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a  href="#" class="btn btn-primary mx-1 text-white" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                            role="tab" aria-controls="pills-profile" aria-selected="false">HOD</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a  href="#" class="btn btn-primary mx-1 text-white" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                            role="tab" aria-controls="pills-profile" aria-selected="false">Super Admin</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a  href="#" class="btn btn-primary mx-1 text-white" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                            role="tab" aria-controls="pills-profile" aria-selected="false">RW1 Riddhi</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a  href="#" class="btn btn-primary mx-1 text-white" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                            role="tab" aria-controls="pills-profile" aria-selected="false">Center Head</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-admin" role="tabpanel" aria-labelledby="pills-admin-tab">
                        <div class="row grid">
                            <div class="col-lg-3 col-md-6 grid-item">
                                <div class="card card-primary mb-3">
                                    <div class="card-header d-flex align-item-center justify-content-between">
                                        <h4>CRM</h4>
                                        <div class="pretty p-icon p-jelly p-round p-bigger">
                                            <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                            <div class="state p-info">
                                                <i class="icon material-icons">done</i>
                                                <label><strong>All</strong></label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-1 mb-2" />
                                    <div class="card-body px-3 pt-0">
                                        <div class="module_permission py-2">
                                            <ul class="parent_ul">
                                                <div class="module_title">
                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label><strong>Parent</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <label>Take Attendance 1</label>
                                                            <i class="icon material-icons">done</i>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label>Take Attendance</label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label>Take Attendance</label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <ul class="child_ul"> 
                                                        <div class="module_title">
                                                            <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                                <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                <div class="state p-info">
                                                                    <i class="icon material-icons">done</i>
                                                                    <label><strong>Child</strong></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <li>
                                                            <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                <div class="state p-info">
                                                                    <i class="icon material-icons">done</i>
                                                                    <label>Take Attendance</label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                <div class="state p-info">
                                                                    <i class="icon material-icons">done</i>
                                                                    <label>Take Attendance</label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <ul class="child_ul"> 
                                                                <div class="module_title">
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label><strong>Child</strong></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <li>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Take Attendance</label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Take Attendance</label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Take Attendance</label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <ul class="parent_ul">
                                                <div class="module_title">
                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label><strong>Parent</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label>Take Attendance</label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text-right">
                                            <a href="#" class="btn btn-primary text-white shadow-none">Save</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 grid-item">
                                <div class="card card-primary mb-3">
                                    <div class="card-header d-flex align-item-center justify-content-between">
                                        <h4>CRM</h4>
                                        <div class="pretty p-icon p-jelly p-round p-bigger">
                                            <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                            <div class="state p-info">
                                                <i class="icon material-icons">done</i>
                                                <label><strong>All</strong></label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-1 mb-2" />
                                    <div class="card-body px-3 pt-0">
                                        <div class="module_permission py-2">
                                            <ul class="parent_ul">
                                                <div class="module_title">
                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label><strong>Parent</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <label>Take Attendance 1</label>
                                                            <i class="icon material-icons">done</i>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="parent_ul">
                                                <div class="module_title">
                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label><strong>Parent</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <label>Take Attendance 1</label>
                                                            <i class="icon material-icons">done</i>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="parent_ul">
                                                <div class="module_title">
                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label><strong>Parent</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <label>Take Attendance 1</label>
                                                            <i class="icon material-icons">done</i>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="parent_ul">
                                                <div class="module_title">
                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label><strong>Parent</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label>Take Attendance</label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text-right">
                                            <a href="#" class="btn btn-primary text-white shadow-none">Save</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 grid-item">
                                <div class="card card-primary mb-3">
                                    <div class="card-header d-flex align-item-center justify-content-between">
                                        <h4>CRM</h4>
                                        <div class="pretty p-icon p-jelly p-round p-bigger">
                                            <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                            <div class="state p-info">
                                                <i class="icon material-icons">done</i>
                                                <label><strong>All</strong></label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-1 mb-2" />
                                    <div class="card-body px-3 pt-0">
                                        <div class="module_permission py-2">
                                            <ul class="parent_ul">
                                                <div class="module_title">
                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label><strong>Parent</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li>
                                                    <ul class="child_ul"> 
                                                        <div class="module_title">
                                                            <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                                <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                <div class="state p-info">
                                                                    <i class="icon material-icons">done</i>
                                                                    <label><strong>Child</strong></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <li>
                                                            <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                <div class="state p-info">
                                                                    <i class="icon material-icons">done</i>
                                                                    <label>Take Attendance</label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                <div class="state p-info">
                                                                    <i class="icon material-icons">done</i>
                                                                    <label>Take Attendance</label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <ul class="child_ul"> 
                                                                <div class="module_title">
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label><strong>Child</strong></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <li>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Take Attendance</label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Take Attendance</label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Take Attendance</label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <ul class="parent_ul">
                                                <div class="module_title">
                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label><strong>Parent</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label>Take Attendance</label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text-right">
                                            <a href="#" class="btn btn-primary text-white shadow-none">Save</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 grid-item">
                                <div class="card card-primary mb-3">
                                    <div class="card-header d-flex align-item-center justify-content-between">
                                        <h4>CRM</h4>
                                        <div class="pretty p-icon p-jelly p-round p-bigger">
                                            <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                            <div class="state p-info">
                                                <i class="icon material-icons">done</i>
                                                <label><strong>All</strong></label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-1 mb-2" />
                                    <div class="card-body px-3 pt-0">
                                        <div class="module_permission py-2">
                                            <ul class="parent_ul">
                                                <div class="module_title">
                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label><strong>Parent</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li>
                                                    <ul class="child_ul"> 
                                                        <div class="module_title">
                                                            <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                                <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                <div class="state p-info">
                                                                    <i class="icon material-icons">done</i>
                                                                    <label><strong>Child</strong></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <li>
                                                            <ul class="child_ul"> 
                                                                <div class="module_title">
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label><strong>Child</strong></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <li>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Take Attendance</label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Take Attendance</label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Take Attendance</label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <ul class="parent_ul">
                                                <div class="module_title">
                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label><strong>Parent</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label>Take Attendance</label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text-right">
                                            <a href="#" class="btn btn-primary text-white shadow-none">Save</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 grid-item">
                                <div class="card card-primary mb-3">
                                    <div class="card-header d-flex align-item-center justify-content-between">
                                        <h4>CRM</h4>
                                        <div class="pretty p-icon p-jelly p-round p-bigger">
                                            <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                            <div class="state p-info">
                                                <i class="icon material-icons">done</i>
                                                <label><strong>All</strong></label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-1 mb-2" />
                                    <div class="card-body px-3 pt-0">
                                        <div class="module_permission py-2">
                                            <ul class="parent_ul">
                                                <div class="module_title">
                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label><strong>Parent</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <label>Take Attendance 1</label>
                                                            <i class="icon material-icons">done</i>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label>Take Attendance</label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label>Take Attendance</label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <ul class="child_ul"> 
                                                        <div class="module_title">
                                                            <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                                <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                <div class="state p-info">
                                                                    <i class="icon material-icons">done</i>
                                                                    <label><strong>Child</strong></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <li>
                                                            <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                <div class="state p-info">
                                                                    <i class="icon material-icons">done</i>
                                                                    <label>Take Attendance</label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                <div class="state p-info">
                                                                    <i class="icon material-icons">done</i>
                                                                    <label>Take Attendance</label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <ul class="child_ul"> 
                                                                <div class="module_title">
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label><strong>Child</strong></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <li>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Take Attendance</label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Take Attendance</label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Take Attendance</label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <ul class="parent_ul">
                                                <div class="module_title">
                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label><strong>Parent</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label>Take Attendance</label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text-right">
                                            <a href="#" class="btn btn-primary text-white shadow-none">Save</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 grid-item">
                                <div class="card card-primary mb-3">
                                    <div class="card-header d-flex align-item-center justify-content-between">
                                        <h4>CRM</h4>
                                        <div class="pretty p-icon p-jelly p-round p-bigger">
                                            <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                            <div class="state p-info">
                                                <i class="icon material-icons">done</i>
                                                <label><strong>All</strong></label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-1 mb-2" />
                                    <div class="card-body px-3 pt-0">
                                        <div class="module_permission py-2">
                                            <ul class="parent_ul">
                                                <div class="module_title">
                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label><strong>Parent</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <label>Take Attendance 1</label>
                                                            <i class="icon material-icons">done</i>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="parent_ul">
                                                <div class="module_title">
                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label><strong>Parent</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <label>Take Attendance 1</label>
                                                            <i class="icon material-icons">done</i>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="parent_ul">
                                                <div class="module_title">
                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label><strong>Parent</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <label>Take Attendance 1</label>
                                                            <i class="icon material-icons">done</i>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="parent_ul">
                                                <div class="module_title">
                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label><strong>Parent</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label>Take Attendance</label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text-right">
                                            <a href="#" class="btn btn-primary text-white shadow-none">Save</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 grid-item">
                                <div class="card card-primary mb-3">
                                    <div class="card-header d-flex align-item-center justify-content-between">
                                        <h4>CRM</h4>
                                        <div class="pretty p-icon p-jelly p-round p-bigger">
                                            <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                            <div class="state p-info">
                                                <i class="icon material-icons">done</i>
                                                <label><strong>All</strong></label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-1 mb-2" />
                                    <div class="card-body px-3 pt-0">
                                        <div class="module_permission py-2">
                                            <ul class="parent_ul">
                                                <div class="module_title">
                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label><strong>Parent</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li>
                                                    <ul class="child_ul"> 
                                                        <div class="module_title">
                                                            <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                                <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                <div class="state p-info">
                                                                    <i class="icon material-icons">done</i>
                                                                    <label><strong>Child</strong></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <li>
                                                            <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                <div class="state p-info">
                                                                    <i class="icon material-icons">done</i>
                                                                    <label>Take Attendance</label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                <div class="state p-info">
                                                                    <i class="icon material-icons">done</i>
                                                                    <label>Take Attendance</label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <ul class="child_ul"> 
                                                                <div class="module_title">
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label><strong>Child</strong></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <li>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Take Attendance</label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Take Attendance</label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Take Attendance</label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <ul class="parent_ul">
                                                <div class="module_title">
                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label><strong>Parent</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label>Take Attendance</label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text-right">
                                            <a href="#" class="btn btn-primary text-white shadow-none">Save</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 grid-item">
                                <div class="card card-primary mb-3">
                                    <div class="card-header d-flex align-item-center justify-content-between">
                                        <h4>CRM</h4>
                                        <div class="pretty p-icon p-jelly p-round p-bigger">
                                            <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                            <div class="state p-info">
                                                <i class="icon material-icons">done</i>
                                                <label><strong>All</strong></label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-1 mb-2" />
                                    <div class="card-body px-3 pt-0">
                                        <div class="module_permission py-2">
                                            <ul class="parent_ul">
                                                <div class="module_title">
                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label><strong>Parent</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li>
                                                    <ul class="child_ul"> 
                                                        <div class="module_title">
                                                            <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                                <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                <div class="state p-info">
                                                                    <i class="icon material-icons">done</i>
                                                                    <label><strong>Child</strong></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <li>
                                                            <ul class="child_ul"> 
                                                                <div class="module_title">
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label><strong>Child</strong></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <li>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Take Attendance</label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Take Attendance</label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                                        <div class="state p-info">
                                                                            <i class="icon material-icons">done</i>
                                                                            <label>Take Attendance</label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <ul class="parent_ul">
                                                <div class="module_title">
                                                    <div class="pretty p-icon p-jelly p-round p-bigger mr-2">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label><strong>Parent</strong></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <li>
                                                    <div class="pretty p-icon p-jelly p-round p-bigger">
                                                        <input class="form-check-input" type="radio" id="exampleRadios1" value="All" >
                                                        <div class="state p-info">
                                                            <i class="icon material-icons">done</i>
                                                            <label>Take Attendance</label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text-right">
                                            <a href="#" class="btn btn-primary text-white shadow-none">Save</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-manger" role="tabpanel" aria-labelledby="pills-manger-tab">

                    </div>
                    <div class="tab-pane fade" id="pills-counselor" role="tabpanel" aria-labelledby="pills-counselor-tab">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/forms-advanced-forms.js"></script>

<!-- General JS Scripts -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/app.min.js"></script>
<!-- JS Libraies -->
<!--Excel Download-->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/table2excel.js"></script> 

<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script> 

<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File --> 


<!-- <script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script> -->

<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>

<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/custom.js"></script> 
<!-- Page Specific JS File --> 
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
    $('.grid').masonry({
        // options
        itemSelector: '.grid-item',
    });
</script>
</body>

</html>