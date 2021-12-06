<?php //print_r($_SESSION); die; 
  $all_per = explode(',',$_SESSION['p_permission']); 
  //print_r($all_per); die;
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<div class="main-wrapper main-wrapper-1">
<div class="main-content overflow-hidden">
<div class="row">
<div class="col-12 d-flex justify-content-between">
   <h6 class="page-title text-dark mb-3">Complain</h6>
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb p-0">
         <li class="breadcrumb-item"><a href="#">Home</a></li>
         <li class="breadcrumb-item"><a href="#">Library</a></li>
         <li class="breadcrumb-item active" aria-current="page">Data</li>
      </ol>
   </nav>
</div>
<div class="col-md-12">
   <div class="card card-primary">
      <div class="card-header">
         <h4>Add Complain</h4>
         <div class="dropdown ml-auto">
            <a href="#" data-toggle="dropdown" class="btn btn-info dropdown-toggle text-white">Task</a>
            <div>
               <ul class="dropdown-menu">
                  <a href="#place-type" class="dropdown-item has-icon text-dark" data-toggle="pill" role="tab" aria-controls="place-type-tab" aria-selected="true"  ><b>PlaceType</b></a>
                  <a href="#Product-Type" class="dropdown-item has-icon text-dark" data-toggle="pill" role="tab" aria-controls="Product-Type-tab" aria-selected="false"><b>ProductType</b></a>
                  <a href="#Product-List" class="dropdown-item has-icon text-dark"  data-toggle="pill" role="tab" aria-controls="Product-List-tab" aria-selected="false"><b>ProductList</b></a>
                  <a href="#View-Complain" class="dropdown-item has-icon text-dark" data-toggle="pill" role="tab" aria-controls="View-Complain-tab" aria-selected="false" ><b>ViewComplain</b></a>
               </ul>
            </div>
         </div>
      </div>
      <div class="card-body" id="addcomplain">
         <div id="msg"></div>
         <div class="row">
            <div class="col-lg-3">
               <input type="hidden" name="product_enquiry_id " id="product_enquiry_id" class="form-control">
               <div class="form-group">
                  <label>Select Branch  :</label>
                  <select  name="branch_id" id="branch_id" class="form-control" required onchange="selectPlace()"  >
                     <option>-----Select Branch-----</option>
                     <?php foreach($all_branches as $val) { ?>
                     <option value="<?php echo $val->branch_id; ?>"><?php echo $val->branch_name; ?></option>
                     <?php } ?>
                  </select>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="form-group">
                  <label>Select Branch Place :</label>
                  <div id="place_box">
                     <select class="form-control" name="place_type_id" id="place_type_id" required>
                        <option value="">Select Place</option>
                        <?php  foreach($all_place as $val) { ?>
                        <option <?php if(@$select_place->place_type_id == $val->place_type_id) { echo "selected"; } ?> value="<?php echo $val->place_type_id; ?>"><?php echo $val->place_name; ?> - <?php  foreach($all_branches as $row) { if($row->branch_id==$val->branch_id) { echo $row->branch_name; } } ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="form-group">
                  <label>Select Property Type :</label>
                  <select name="product_type_id" class="form-control" id="product_type_id" required onchange="selectproduct()" >
                     <option value="">Select Property Type</option>
                     <?php  foreach($all_product_type as $val) { ?>
                     <option <?php if(@$select_product->product_type_id==$val->product_type_id) { echo "selected"; } ?> value="<?php echo $val->product_type_id; ?>"><?php echo $val->product_name; ?></option>
                     <?php } ?>
                  </select>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="form-group">
                  <label>Select List of property :</label>
                  <select name="list_property" id="list_property" class="form-control" required onchange="select_list()"> 
                  </select>
               </div>
            </div>
            <!-- start form model for complain add-->
            <div class="modal fade" id="dialog-modal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true" >
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="formModal">Add Complain</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <label>Propery Description</label>
                           <div class="input-group">
                              <div id="demo_data" class=" border-secondary" ></div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Complain</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                              </div>
                              <textarea rows = "5" cols = "50" name = "product_issue" id="product_issue"></textarea>
                              <br>    
                           </div>
                        </div>
                        <input type="submit" class="btn btn-primary" id="ad_complain_submit"  value="Submit">
                     </div>
                  </div>
               </div>
            </div>
            <!-- end form model for complain add -->
         </div>
      </div>
   </div>
   <?php if($_SESSION['logtype'] == "Super Admin" || $_SESSION['logtype'] == "Access Property") { ?>
   <div class="complain_tab nav nav-pills justify-content-center mt-3 mb-2" id="pills-tab" role="tablist">
      <a href="#place-type" data-toggle="pill" role="tab" aria-controls="place-type-tab" aria-selected="true" class="btn btn-primary mx-1 active">Place Type</a>
      <a href="#Product-Type" data-toggle="pill" role="tab" aria-controls="Product-Type-tab" aria-selected="false" class="btn btn-primary mx-1">Product Type</a>
      <a href="#Product-List" data-toggle="pill" role="tab" aria-controls="Product-List-tab" aria-selected="false" class="btn btn-primary mx-1">Product List</a>
      <a href="#View-Complain" data-toggle="pill" role="tab" aria-controls="View-Complain-tab" aria-selected="false" class="btn btn-primary mx-1">View Complain</a>
   </div>
   <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="place-type" role="tabpanel" aria-labelledby="place-type-tab">
         <div class="col-md-12 pl-0 pr-0" id="Place_Type" >
            <div class="card card-primary">
               <div class="card-header">
                  <h4>Add Place</h4>
               </div>
               <div class="card-body" id="place_up_type">
                  <!-- <form id="place_up_type"> -->
                  <div class="row">
                     <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "PlaceType Insert") { ?>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>Select Branch:</label>
                           <select  name="branch_id" id="branch_ids" class="form-control" required >
                              <option>-----Select Branch-----</option>
                              <?php foreach($all_branches as $val) {  ?>
                              <option value="<?php echo $val->branch_id; ?>"><?php echo $val->branch_name; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>Place Name:</label>
                           <input type="text" class="form-control" placeholder="Enter Place Name" name="place_name" id="place_name" />
                        </div>
                     </div>
                     <div class="col-lg-3 align-self-center mt-2">
                        <button type="submit" class="btn btn-primary" id="place_type_submit" name="place_type_submit">Save</button>
                     </div>
                  <?php } }  ?>
                     <div class="table-responsive mt-3 place_type_table">
                        <table class="table table-striped income-table table-bordered responce " id="place_type_table">
                           <thead>
                              <tr>
                                 <th>Sno</th>
                                 <th>Branch Name</th>
                                 <th>Place_name</th>
                                 <th>status</th>
                                 <th class="text-center">Action </th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $sno = 1; ?>
                              <?php foreach($all_place as $val) {  ?>
                              <tr>
                                 <td><?php echo $sno; ?></td>
                                 <td><?php  foreach($all_branches as $row) { if($row->branch_id==$val->branch_id) { echo $row->branch_name; } } ?></td>
                                 <td><?php echo $val->place_name; ?></td>
                                 <td>
                                    <?php if($val->place_status =="1") { ?>
                                    <a class="badge badge-danger text-white">Disable</a>
                                    <?php } else { ?>
                                    <a class="badge badge-success text-white">Active</a>
                                    <?php } ?>
                                 </td>
                                 <td>

                                    <?php $xx = $val->place_type_id ; ?>
                                    <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "PlaceType Update") { ?>
                                    <a class="bg-primary action-icon text-white btn-primary" href="javascript:place_list(<?php echo $val->place_type_id; ?>)"><i class="fas fa-pencil-alt"></i></a>
                                 <?php } }?>
                                 <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "PlaceType Disable") { ?>
                                    <?php if ($val->place_status == 0) { ?>                                      
                                    <a class="bg-danger action-icon text-white btn-danger" href="javascript:co_status_upd_branch(<?php echo $xx; ?>, 1)">
                                    <i class="fas fa-ban "></i> 
                                    </a>
                                    <?php } else {  ?>
                                    <a class="bg-primary action-icon text-white btn-primary" href="javascript:co_status_upd_branch(<?php echo $xx; ?>, 0)"><i class="fa fa-check"></i></a>
                                    <?php  } $sno++; }  ?>
                                 <?php } } ?>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <!-- </from> -->
               </div>
            </div>
         </div>
      </div>
      <div class="tab-pane fade" id="Product-Type" role="tabpanel" aria-labelledby="Product-Type-tab">
         <div class="col-md-12 pl-0 pr-0" id="Product_List">
            <div class="card card-primary">
               <div class="card-header">
                  <h4>Add Product Type</h4>
               </div>
               <div class="card-body">
                  <div class="row">
                     <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Insert ProductType") { ?>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>Property Name:</label>
                           <input type="text" class="form-control" placeholder="Enter Place Name" name="product_names" id="product_names"/>
                        </div>
                     </div>
                     <div class="col-lg-3 align-self-center mt-2">
                        <button class="btn btn-primary" type="submit" name="product_submit" id="product_submit"> Save</button>
                     </div>
                     <?php } } ?>
                     <div class="table-responsive mt-3 product_data">
                        <table class="table table-striped income-table table-bordered responce" id="product_table">
                           <thead>
                              <tr>
                                 <th>Sno</th>
                                 <th>Property Type</th>
                                 <th>Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <?php $sno = 1; ?>
                                 <?php foreach($all_product_type as $val) {  ?>
                              <tr>
                                 <td><?php echo $sno; ?></td>
                                 <td><?php echo $val->product_name; ?></td>
                                 <td>
                                    <?php if($val->product_status=="1") { ?>
                                    <a class="badge badge-danger text-white">Disable</a>
                                    <?php } else { ?>
                                    <a class="badge badge-success text-white">Active</a>
                                    <?php } ?>
                                 </td>
                                 <td>
                                    <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Update ProductType") { ?>
                                    <?php $xx = $val->product_type_id; ?>  
                                    <a class="bg-primary action-icon text-white btn-primary" href="javascript:product_list(<?php echo $val->product_type_id; ?>)"><i class="fas fa-pencil-alt"></i></a>
                                    <?php } } ?>
                                    <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Delete ProductType") { ?>
                                    <?php if ($val->product_status == 0) { ?>                                      
                                    <a class="bg-danger action-icon text-white btn-danger" href="javascript:co_status_upd(<?php echo $xx; ?>, 1)">
                                    <i class="fas fa-ban "></i> 
                                    </a>
                                    <?php } else {  ?>
                                    <a class="bg-primary action-icon text-white btn-primary" href="javascript:co_status_upd(<?php echo $xx; ?>, 0)"><i class="fa fa-check"></i></a>
                                    <?php }  $sno++; }?>
                                 <?php } } ?>
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
      <!-- <div class="model" id="product_edit"> -->
      <div class="tab-pane fade" id="Product-List" role="tabpanel" aria-labelledby="Product-List-tab">
         <div class="col-md-12 pl-0 pr-0" id="Product_Type">
            <div class="card card-primary">
               <div class="card-header">
                  <h4>Property List</h4>
               </div>
               <div class="card-body">
                  <div class="row">
                     <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Insert ProductList") { ?>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>Select Branch:</label>
                           <select  name="branch_id" id="branch_idb" class="form-control product-branch" required onchange="selectPlaceAgain()">
                              <option>-----Select Branch-----</option>
                              <?php foreach($all_branches as $val) { ?>
                              <option value="<?php echo $val->branch_id; ?>"><?php echo $val->branch_name; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div id="place_div">
                           <div class="form-group" >
                              <label>Select Branch Place:</label>
                              <select class="form-control" name="place_type_id" id="place_type_idb" required>
                                 <option value="">----Select Place----</option>
                                 <?php  foreach($all_place as $val) { ?>
                                 <option <?php if(@$select_place->place_type_id == $val->place_type_id) { echo "selected"; } ?> value="<?php echo $val->place_type_id; ?>"><?php echo $val->place_name; ?> - <?php  foreach($all_branches as $row) { if($row->branch_id==$val->branch_id) { echo $row->branch_name; } } ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group" >
                           <label>Select Property Type:</label>
                           <select name="product_type_idb" class="form-control" id="product_type_idb" required  >
                              <option value="">----Select Property Type-----</option>
                              <?php  foreach($all_product_type as $val) { ?>
                              <option <?php if(@$select_product->product_type_id==$val->product_type_id) { echo "selected"; } ?> value="<?php echo $val->product_type_id; ?>"><?php echo $val->product_name; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>Property Name:</label>
                           <input type="text" class="form-control" placeholder="Enter Place Name" name="product_name" id="product_name" required />
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Property Description:</label>
                           <textarea class="form-control" placeholder="Enter Description" id="product_decription" name="product_decription"></textarea>
                        </div>
                     </div>
                     <div class="col-lg-3 align-self-center mt-2">
                        <button type="submit" class="btn btn-primary" id="property_submit" name="property_submit">Save</button>
                     </div>
                  <?php } }?>
                     <div class="table-responsive mt-3 product_list_table">
                        <table class="table table-striped income-table table-bordered responce" id="product_list_table">
                           <thead>
                              <tr>
                                 <th>SNo</th>
                                 <th>Branch</th>
                                 <th>Place </th>
                                 <th>Property Type</th>
                                 <th>Name</th>
                                 <th>Description</th>
                                 <th>Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $sno = 1; ?>
                              <?php foreach($all_product as $val) {  ?>
                              <tr>
                                 <td><?php echo $sno;  ?></td>
                                 <td><?php  foreach($all_branches as $row) { if($row->branch_id==$val->branch_id) { echo $row->branch_name; } } ?></td>
                                 <td>
                                    <?php  foreach($all_place as $row) { 
                                       if($row->place_type_id==$val->place_type_id) { echo $row->place_name; }
                                       }?>
                                 </td>
                                 <td>
                                    <?php  foreach($all_product_type as $row) { 
                                       if($row->product_type_id==$val->product_type_id) { echo $row->product_name; }
                                       }?>
                                 </td>
                                 <td><?php echo $val->product_name; ?></td>
                                 <td><?php echo $val->product_decription; ?></td>
                                 <td> <?php if($val->product_status=="1") { ?>
                                    <a class="badge badge-danger text-white">Disable</a>
                                    <?php } else { ?>
                                    <a class="badge badge-success text-white">Active</a>
                                    <?php } ?>
                                 </td>
                                 <td>
                                    <?php $xx = $val->product_id; ?>
                                    <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Update ProductList") { ?>
                                    <a class="bg-primary action-icon text-white btn-primary" href="javascript:p_list(<?php echo $val->product_id; ?>)"><i class="fas fa-pencil-alt"></i></a>
                                 <?php } } ?>
                                 <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Delete ProductList") { ?>
                                    <a href="javascript:remove_co(<?php echo $xx; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="far fa-trash-alt"></i></a>
                                 <?php } } ?> 
                                 <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Disable ProductList") { ?>
                                    <?php if($val->product_status=="0") { ?>
                                    <a href="javascript:co_status_pro(<?php echo $xx; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="fas fa-ban"></i></a>
                                    <?php } else {?>
                                    <a href="javascript:co_status_pro(<?php echo $xx; ?>)" class="bg-danger action-icon text-white btn-danger"><i class="fa fa-check-square-o"></i></a>
                                    <?php }?>
                                 <?php } } ?>
                                 </td>
                              </tr>
                              <?php $sno++; } ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- //</div>  -->
      <div class="tab-pane fade" id="View-Complain" role="tabpanel" aria-labelledby="View-Complain-tab">
         <div class="col-md-12 pl-0 pr-0" id="Add_Complain_New">
            <div class="card card-primary">
               <div class="card-header">
                  <h4>Complain List</h4>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="table-responsive mt-3 complain_table">
                        <table class="table table-striped income-table table-bordered responce" id="complain_table">
                           <thead>
                              <tr>
                                 <th>Complain Show</th>
                                 <th>Complain Id</th>
                                 <th>Complain Status</th>
                                 <th width="200px">Complain By</th>
                                 <th width="200px">Property</th>
                                 <th class="text-center">Action </th>
                                 <!-- <th>Direct Chat</th> -->
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach($all_product_enquiry as $val) { 
                                 if($val->enquiry_status == "2"){ ?>
                              <?php $eclass = "completed"; } else if($val->enquiry_status == "3") { ?>
                              <?php $eclass = "notas"; } else if($val->enquiry_status == "1") {?>
                              <?php $eclass = "panding_info" ; } else if($val->enquiry_status == "0") {?>
                              <?php $eclass = "panding_status" ; } ?>
                              <tr>
                                 <td><?php if($val->enquiry_status == "2")  {  ?>  <i style="color: green" class="fa fa-fw fa-eye"></i>  <?php }  if ($val->enquiry_status == "3") { ?> <i class="fa fa-fw fa-eye-slash" style="color: red"></i> <?php } ?>  <?php if ($val->enquiry_status == "0") {?>  <i class="fa fa-fw fa-eye-check" style="color: green"></i>   <?php } if ($val->enquiry_status == "1") {?> <i class="fa fa-fw fa-eye-slash" style="color: orange"></i> <?php }?>
                                 <td><?php echo $val->product_enquiry_id;  ?></td>
                                 <td>
                                    <?php if($val->enquiry_status==0) { ?>
                                    <span class="badge badge-warning">Pending</span>
                                    <?php } ?>
                                    <?php if($val->enquiry_status==1) { ?>
                                    <span class="badge badge-info ">Processing</span>
                                    <?php } ?>
                                    <?php if($val->enquiry_status==2) { ?>
                                    <span class="badge badge-success ">Completed</span>
                                    <?php } ?>
                                    <?php if($val->enquiry_status==3) { ?>
                                    <span class="badge badge-danger">Cancel</span>
                                    <?php } ?>
                                 </td>
                                 <td><?php echo $val->user_name;  ?> <br> <?php echo $val->enquiry_timestamp;  ?></td>
                                 <td><?php  echo $val->kya; ?></td>
                                 <td >
                                    <?php  for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Status Update Complain") { ?>
                                 <div class="dropdown">
                                       <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle text-white">Status</a>
                                       <div class="dropdown-menu">
                                       <?php $xx = $val->product_enquiry_id; ?>
                                       <a class="dropdown-item has-icon" href="javascript:comp_status_upd(<?php echo $xx; ?> ,0)">
                                           Pending
                                       </a>
                                       <a class="dropdown-item has-icon text-info" href="javascript:comp_status_upd(<?php echo $xx; ?>,1)">
                                           Processing
                                       </a>
                                       <a class="dropdown-item has-icon text-warning" href="javascript:comp_status_upd(<?php echo $xx; ?>,2)">
                                          Completed
                                       </a>
                                       <a class="dropdown-item has-icon text-danger" href="javascript:comp_status_upd(<?php echo $xx; ?>,3)">
                                         Cancel
                                       </a>
                                       <?php  ?>
                                    </div>
                                 <?php } } ?>
                                 </td>
                                <!--  <td>
                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">chat</button>
                                 </td> -->
                              </tr>
                              <?php  } ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--start chat-->
      <!-- basic modal -->
      <div class="modal fade productlist" id="productlist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body"> 
                  <input type="hidden" name="productids " id="productids" class="form-control">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Property Name:</label>
                           <input type="text" class="form-control" id="product_names_pl" name="product_names_pl">
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" id="productUpdate">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal with form -->
        <!-- basic modal -->
        <div class="modal fade placelist" id="placelist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Place</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <div class="row">
                  <input type="hidden" name="place_type_ids" id="place_type_ids" class="form-control">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Select Branch</label>
                           <select class="form-control branch_idspl" id="branch_idspl" >
                           <option>-----Select Branch-----</option>
                              <?php foreach($all_branches as $val) { ?>
                              <option value="<?php echo $val->branch_id; ?>"><?php echo $val->branch_name; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Property Name:</label>
                           <input type="text" class="form-control" name="place_namepl" id="place_namepl">
                        </div>
                     </div>
                  </div>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" id="updatePlace">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal with form -->
        <!-- basic modal -->
        <div class="modal fade propertylist bd-example-modal-lg" id="propertylist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Property</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               <input type="hidden" name="productidb" id="productidb" class="form-control">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Select Branch</label>
                           <select class="form-control branchids" id="branchids" onchange="return selectPlaceUpdate()">
                           <option>-----Select Branch-----</option>
                              <?php foreach($all_branches as $val) { ?>
                              <option value="<?php echo $val->branch_id; ?>"><?php echo $val->branch_name; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group  ">
                           <label>Select Branch Place:</label>
                           <select class="form-control placetypediv" name="plaseids" id="placetypeid">
                           <option value="">----Select Place----</option>
                                 <?php  foreach($all_place as $val) { ?>
                                 <option <?php if(@$select_place->place_type_id == $val->place_type_id) { echo "selected"; } ?> value="<?php echo $val->place_type_id; ?>"><?php echo $val->place_name; ?> - <?php  foreach($all_branches as $row) { if($row->branch_id==$val->branch_id) { echo $row->branch_name; } } ?></option>
                                 <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Select Property Type:</label>
                           <select class="form-control" name="producttypeid" id="producttypeid" >
                           <option value="">----Select Property Type-----</option>
                              <?php  foreach($all_product_type as $val) { ?>
                              <option <?php if(@$select_product->product_type_id==$val->product_type_id) { echo "selected"; } ?> value="<?php echo $val->product_type_id; ?>"><?php echo $val->product_name; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Property Name:</label>
                           <input type="text" class="form-control" name="pro_name_up" id="pro_name_up">
                        </div>
                     </div>
                     <div class="col-md-8">
                        <div class="form-group">
                           <label>Property Description:</label>
                           <textarea class="form-control" placeholder="Enter Description" id="product_decription_up" name="product_decription_up"></textarea>
                        </div>
                     </div>
                  </div>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" id="updateproduct">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal with form -->
      <!-- basic modal -->
        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <div class="card">
                     <div class="chat">
                     </div>
                     <div class="chat-box" id="mychatbox">
                     <div class="card-body chat-content">
                         
                     </div>
                     <div class="card-footer chat-form">
                        <form id="chat-form">
                           <input type="text" class="form-control" placeholder="Type a message" name="chat_send" id="chat_send">
                           <button class="btn btn-primary">
                           <i class="far fa-paper-plane"></i>
                           </button>
                        </form>
                     </div>
                     </div>
                  </div>
               </div>
              </div>
            </div>
          </div>
       <?php }?>
        </div>
        <!-- Modal with form -->
      <!--end chat-->
   </div>
</div>
<script src="https://demo.rnwmultimedia.com/dist/assets/js/app.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/datatables.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="https://demo.rnwmultimedia.com/dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/page/forms-advanced-forms.js"></script>
<!-- JS Libraies -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="https://demo.rnwmultimedia.com/dist/assets/js/custom.js"></script>
<!-- JS Libraies -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<!-- JS Libraies -->
<script type="text/javascript">
   $(".form-assign-table").niceScroll({
       cursorcolor: "transparent"
   });
   
</script>
<script>
   function selectPlace()
   {
   var b_id = $('#branch_id').val();
   $.ajax({
      url:"<?php echo base_url(); ?>Common/branchWisePlace",
      type:"post",
      data:{
         'branch_id':b_id
      },
      success : function(data){
         $('#place_box').html(data);
      }
   });
   }  
      

   function selectPlaceUpdate()
   {
   var b_id = $('#branchids').val();
   $.ajax({
      url:"<?php echo base_url(); ?>Common/branchWisePlace",
      type:"post",
      data:{
         'branch_id':b_id
      },
      success : function(data){
         $('.placetypediv').html(data);
      }
   });
   }  
</script>
<script>
   function selectPlaceAgain()
   {
   var b_id = $('#branch_idb').val();
   $.ajax({
      url:"<?php echo base_url(); ?>Common/branchWisePlaceAgain",
      type:"post",
      data:{
         'branch_id':b_id
      },
      success : function(data){
         $('#place_div').html(data);
      }
   });
   }  
      
</script>
<script>
   function selectproduct()
   {
   var product_id = $('#product_type_id').val();
   var branch_id = $('#branch_id').val();
   var place_id = $('#place_type_id').val();  
   $.ajax({
      url:"<?php echo base_url(); ?>Common/productWise",
      type:"post",
      data:{
         'product_type_id': product_id,
         'branch_id' : branch_id,
         'place_id' : place_id
      },
      success : function(data){
         $('#list_property').html(data);
      }
   });
   } 

   function selectproductUpdate()
   {
   var product_id = $('#product_type_id').val();
   var branch_id = $('#branch_id').val();
   var place_id = $('#place_type_id').val();  
   $.ajax({
      url:"<?php echo base_url(); ?>Common/productWise",
      type:"post",
      data:{
         'product_type_id': product_id,
         'branch_id' : branch_id,
         'place_id' : place_id
      },
      success : function(data){
         $('#list_property').html(data);
      }
   });
   } 

   function select_list()
   {
      var m = $('#list_property').val();
      $.ajax({
      url:"<?php echo base_url(); ?>Common/demo_data",
      type:"post",
      data:{
      d_id : m
      },
      success : function(data){
         $('#demo_data').html(data);
      }
   });
   
      $('#dialog-modal').modal("show");
      } 
   
   
        $(document).ready(function() {
         $('table.responce').DataTable();
         } )
        
</script>
<script>
   $('#ad_complain_submit').on('click', function() {
    var product_enquiry_id = $('#product_enquiry_id').val();
    var branch_id = $('#branch_id').val();
    var place_type_id = $('#place_type_id').val();
    var list_property = $('#list_property').val();
    var product_type_id = $('#product_type_id').val();
    var product_issue = $('#product_issue').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Common/add_complain_new",
        data: {
            'product_enquiry_id' :product_enquiry_id,
            'branch_id': branch_id,
            'place_type_id': place_type_id,
            'list_property': list_property,
            'product_type_id': product_type_id,
            'product_issue': product_issue
        },       
        success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            if (ddd == '1') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Complain Is Now Inserted.',
                    position: 'topRight'
                }));
                $.ajax({
                  url: "<?php echo base_url(); ?>Common/complain_table",
                  type: "post",
                  data: {
                        'product_enquiry_id ': product_enquiry_id 
                  },
                  success: function(Resp) {

                        $('.complain_table').html(Resp);
                  }
               });
            } else if (ddd == '2') {
                $('#msg').html(iziToast.error({
                    title: 'Canceled!',
                    timeout: 2500,
                    message: 'Someting Wrong!!',
                    position: 'topRight'
                }));
   
                $.ajax({
                  url: "<?php echo base_url(); ?>Common/complain_table",
                  type: "post",
                  data: {
                        'product_enquiry_id ': product_enquiry_id 
                  },
                  success: function(Resp) {

                        $('.complain_table').html(Resp);
                  }
               });
            }
        }
    });
    return false;
   });
</script>
<script>
   $('#place_type_submit').on('click', function() {
      event.preventDefault();
    var place_type_id = $('#place_type_ids').val();
    var branch_id = $('#branch_ids').val();
    var place_name = $('#place_name').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Common/place_type_new",
        data: {
            'place_type_id' :place_type_id,
            'branch_id': branch_id,
            'place_name': place_name
        },       
        success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            
            if (ddd == '1') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! branch place is Now Inserted.',
                    position: 'topRight'
                }));

                $.ajax({
                  url: "<?php echo base_url(); ?>Common/place_type_table",
                  type: "post",
                  data: {
                        'place_type_id': place_type_id
                  },
                  success: function(Resp) {

                        $('.place_type_table').html(Resp);
                  }
               });

            } else if (ddd == '2') {
                $('#msg').html(iziToast.success({
                    title: 'Canceled!',
                    timeout: 2500,
                    message: 'HI! branch place is Now Updated.',
                    position: 'topRight'
                }));

                $.ajax({
                  url: "<?php echo base_url(); ?>Common/place_type_table",
                  type: "post",
                  data: {
                        'place_type_id': place_type_id
                  },
                  success: function(Resp) {

                        $('.place_type_table').html(Resp);
                  }
               });
            } else if (ddd == '3') {
                $('#msg').html(iziToast.error({
                    title: 'Canceled!',
                    timeout: 2500,
                    message: 'Someting Wrong!!',
                    position: 'topRight'
                }));
            }
        }
    });
    return false;
   });


   $('#updatePlace').on('click', function() {
      event.preventDefault();
    var place_type_id = $('#place_type_ids').val();
    var branch_id = $('#branch_idspl').val();
    var place_name = $('#place_namepl').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Common/place_type_new",
        data: {
            'place_type_id' :place_type_id,
            'branch_id': branch_id,
            'place_name': place_name
        },       
        success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            
            if (ddd == '1') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! branch place is Now Inserted.',
                    position: 'topRight'
                }));

                $.ajax({
                  url: "<?php echo base_url(); ?>Common/place_type_table",
                  type: "post",
                  data: {
                        'place_type_id': place_type_id
                  },
                  success: function(Resp) {

                        $('.place_type_table').html(Resp);
                  }
               });

            } else if (ddd == '2') {
                $('#msg').html(iziToast.success({
                    title: 'Canceled!',
                    timeout: 2500,
                    message: 'HI! branch place is Now Updated.',
                    position: 'topRight'
                }));

                $.ajax({
                  url: "<?php echo base_url(); ?>Common/place_type_table",
                  type: "post",
                  data: {
                        'place_type_id': place_type_id
                  },
                  success: function(Resp) {

                        $('.place_type_table').html(Resp);
                  }
               });
            } else if (ddd == '3') {
                $('#msg').html(iziToast.error({
                    title: 'Canceled!',
                    timeout: 2500,
                    message: 'Someting Wrong!!',
                    position: 'topRight'
                }));
            }
        }
    });
    return false;
   });
</script>
<script>
   $('#product_submit').on('click', function() {
    event.preventDefault();
    var product_type_id = $('#productids').val();
    var product_name = $('#product_names').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Common/product_type_new",
        data: { 'product_type_id' : product_type_id , 'product_name': product_name },       
        success: function(resp) {
            var data = $.parseJSON(resp);              
            var ddd = data['all_record'].status;
            if (ddd == '1') {    
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! New product is Now Inserted.',
                    position: 'topRight'
                }));  

                $.ajax({
                  url: "<?php echo base_url(); ?>Common/product_table",
                  type: "post",
                  data: {
                        'product_type_id': product_type_id
                  },
                  success: function(Resp) {

                        $('.product_data').html(Resp);
                  }
               });
                
            } else if (ddd == '2') {
                $('#msg').html(iziToast.success({
                    title: 'Canceled!',
                    timeout: 2500,
                    message: 'HI! This Record Successfully Updated.',
                    position: 'topRight'
                }));
                $.ajax({
                  url: "<?php echo base_url(); ?>Common/product_table",
                  type: "post",
                  data: {
                        'product_type_id': product_type_id
                  },
                  success: function(Resp) {
                        $('.product_data').html(Resp);
                  }
               });
            } else if (ddd == '3') {
              $('#msg').html(iziToast.error({
                title: 'Canceled!',
                timeout: 2000,
                message: 'Try Again!!',
                position: 'topRight'
              }));                        
            }
        }    
    });
   });


   $('#productUpdate').on('click', function() {
    event.preventDefault();
    var product_type_id = $('#productids').val();
    var product_name = $('#product_names_pl').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Common/product_type_new",
        data: { 'product_type_id' : product_type_id , 'product_name': product_name },       
        success: function(resp) {
            var data = $.parseJSON(resp);              
            var ddd = data['all_record'].status;
            if (ddd == '1') {    
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! New product is Now Inserted.',
                    position: 'topRight'
                }));  

                $.ajax({
                  url: "<?php echo base_url(); ?>Common/product_table",
                  type: "post",
                  data: {
                        'product_type_id': product_type_id
                  },
                  success: function(Resp) {

                        $('.product_data').html(Resp);
                  }
               });
                
            } else if (ddd == '2') {
                $('#msg').html(iziToast.success({
                    title: 'Canceled!',
                    timeout: 2500,
                    message: 'HI! This Record Successfully Updated.',
                    position: 'topRight'
                }));
                $.ajax({
                  url: "<?php echo base_url(); ?>Common/product_table",
                  type: "post",
                  data: {
                        'product_type_id': product_type_id
                  },
                  success: function(Resp) {
                        $('.product_data').html(Resp);
                  }
               });
            } else if (ddd == '3') {
              $('#msg').html(iziToast.error({
                title: 'Canceled!',
                timeout: 2000,
                message: 'Try Again!!',
                position: 'topRight'
              }));                        
            }
        }    
    });
   });

   function co_status_upd_branch(place_type_id , place_status) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/update_status",
          type: "post",
          data: {
            'id': place_type_id,
            'status': place_status,
            'table': 'place_type',
            'field': 'place_status',
            'check_field': 'place_type_id'
          },
          success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['status'].status;
            console.log("dddddd", ddd);
            if (ddd == '1') {
              $('#msg').html(iziToast.success({
                title: 'Success',
                timeout: 2000,
                message: 'HI! record status updated.',
                position: 'topRight'
              }));
              
              $.ajax({
                  url: "<?php echo base_url(); ?>Common/place_type_table",
                  type: "post",
                  data: {
                        'place_type_id': place_type_id
                  },
                  success: function(Resp) {

                        $('.place_type_table').html(Resp);
                  }
               });
              
            } else if (ddd == '2') {
              $('#msg').html(iziToast.error({
                title: 'Canceled!',
                timeout: 2000,
                message: 'Try Again!!!!',
                position: 'topRight'
              }));
            }
          }
        });
        return false;
      }
      
   function co_status_upd(product_type_id , product_status) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/update_status",
          type: "post",
          data: {
            'id': product_type_id,
            'status': product_status,
            'table': 'product_type',
            'field': 'product_status',
            'check_field': 'product_type_id'
          },
          success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['status'].status;
            if (ddd == '1') {
              $('#msg').html(iziToast.success({
                title: 'Success',
                timeout: 2000,
                message: 'HI! record status updated.',
                position: 'topRight'
              }));
              
              $.ajax({
                  url: "<?php echo base_url(); ?>Common/product_table",
                  type: "post",
                  data: {
                        'product_type_id': product_type_id
                  },
                  success: function(Resp) {

                        $('.product_data').html(Resp);
                  }
               });
              
            } else if (ddd == '2') {
              $('#msg').html(iziToast.error({
                title: 'Canceled!',
                timeout: 2000,
                message: 'Try Again!!!!',
                position: 'topRight'
              }));
            }
          }
        });
        return false;
      }




      function comp_status_upd(product_enquiry_id , enquiry_status) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/comp_update_status",
          type: "post",
          data: {
            'id': product_enquiry_id ,
            'status': enquiry_status,
            'table': 'product_enquiry',
            'field': 'enquiry_status',
            'check_field': 'product_enquiry_id '
          },
          success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['status'].status;
            console.log("dddddd", ddd);
            if (ddd == '1') {
              $('#msg').html(iziToast.success({
                title: 'Success',
                timeout: 2000,
                message: 'HI! record status updated.',
                position: 'topRight'
              }));
              $.ajax({
                  url: "<?php echo base_url(); ?>Common/complain_table",
                  type: "post",
                  data: {
                        'product_enquiry_id ': product_enquiry_id 
                  },
                  success: function(Resp) {

                        $('.complain_table').html(Resp);
                  }
               });
            } else if (ddd == '2') {
              $('#msg').html(iziToast.error({
                title: 'Canceled!',
                timeout: 2000,
                message: 'Try Again!!!!',
                position: 'topRight'
              }));
            }
          }
        });
        return false;
      }
</script>
<script>
   $('#property_submit').on('click', function() {
   event.preventDefault();
   var product_id = $('#product_ids').val();
    var branch_id = $('#branch_idb').val();
    var place_type_id = $('#place_type_idb').val();
    var product_name = $('#product_name').val();
    var product_type_id = $('#product_type_idb').val();
    var product_decription = $('#product_decription').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Common/product_new",
        data: {
            'product_id': product_id,
            'branch_id': branch_id,
            'place_type_id': place_type_id,
            'product_name': product_name,
            'product_type_id': product_type_id,
            'product_decription': product_decription
        },       
        success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            // $('#property_table').html(data);
            console.log(data);
            if (ddd == '1') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Complain Is Now Inserted.',
                    position: 'topRight'
                }));     
              $.ajax({
                  url: "<?php echo base_url(); ?>Common/product_list_type",
                  type: "post",
                  data: {
                        'product_id ': product_id 
                  },
                  success: function(Resp) {

                        $('.product_list_table').html(Resp);
                  }
               });
            } else if (ddd == '2') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Complain Is Now Updated.!!',
                    position: 'topRight'
                }));          
              $.ajax({
                  url: "<?php echo base_url(); ?>Common/product_list_type",
                  type: "post",
                  data: {
                        'product_id ': product_id 
                  },
                  success: function(Resp) {

                        $('.product_list_table').html(Resp);
                  }
               });
            }
            else if (ddd == '3') {
                $('#msg').html(iziToast.error({
                    title: 'Canceled!',
                    timeout: 2500,
                    message: 'Someting Wrong!!',
                    position: 'topRight'
                }));
            }
        }
    });
    return false;
   });


   $('#updateproduct').on('click', function() {
   event.preventDefault();
    var product_id = $('#productidb').val();
    var branch_id = $('#branchids').val();
    var place_type_id = $('#placetypeid').val();
    var product_name = $('#pro_name_up').val();
    var product_type_id = $('#producttypeid').val();
    var product_decription = $('#product_decription_up').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Common/product_new",
        data: {
            'product_id': product_id,
            'branch_id': branch_id,
            'place_type_id': place_type_id,
            'product_name': product_name,
            'product_type_id': product_type_id,
            'product_decription': product_decription
        },       
        success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            // $('#property_table').html(data);
            console.log(data);
            if (ddd == '1') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Complain Is Now Inserted.',
                    position: 'topRight'
                }));     
              $.ajax({
                  url: "<?php echo base_url(); ?>Common/product_list_type",
                  type: "post",
                  data: {
                        'product_id ': product_id 
                  },
                  success: function(Resp) {

                        $('.product_list_table').html(Resp);
                  }
               });
            } else if (ddd == '2') {
                $('#msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'HI! Your Complain Is Now Updated.!!',
                    position: 'topRight'
                }));          
              $.ajax({
                  url: "<?php echo base_url(); ?>Common/product_list_type",
                  type: "post",
                  data: {
                        'product_id ': product_id 
                  },
                  success: function(Resp) {

                        $('.product_list_table').html(Resp);
                  }
               });
            }
            else if (ddd == '3') {
                $('#msg').html(iziToast.error({
                    title: 'Canceled!',
                    timeout: 2500,
                    message: 'Someting Wrong!!',
                    position: 'topRight'
                }));
            }
        }
    });
    return false;
   });
</script>
<script>
   function co_status_pro(product_id ,product_status) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/update_status_pro",
          type: "post",
          data: {
            'id': product_id ,
            'status': 'product_status',
            'table': 'product',
            'field': 'product_status',
            'check_field': 'product_id'
          },
          success: function(resp) {
            var data = $.parseJSON(resp);
            var ddd = data['status'].status;
            console.log("dddddd", ddd);
            if (ddd == '1') {
              $('#msg').html(iziToast.success({
                title: 'Success',
                timeout: 2000,
                message: 'HI! Course status updated.',
                position: 'topRight'
              }));
              $.ajax({
                  url: "<?php echo base_url(); ?>Common/product_list_type",
                  type: "post",
                  data: {
                        'product_id ': product_id 
                  },
                  success: function(Resp) {

                        $('.product_list_table').html(Resp);
                  }
               });
            } else if (ddd == '2') {
              $('#msg').html(iziToast.error({
                title: 'Canceled!',
                timeout: 2000,
                message: 'Somthing went wrong!!!!!',
                position: 'topRight'
              }));
            } 
          }
        });
        return false;
      }
</script>
<script>
   function p_list(product_id) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/get_recoproduct",
          type: "post",
          data: {
            'id': product_id ,
          },
          success: function(resp) {
            $('#propertylist').modal();
            var data = $.parseJSON(resp);
            var product_id = data['single_record'].product_id;
            // console.log(product_id);
            var branch_id = data['single_record'].branch_id;
            var place_type_id = data['single_record'].place_type_id; 
            var product_type_id = data['single_record'].product_type_id;
            var product_name = data['single_record'].product_name;
            var product_decription = data['single_record'].product_decription;
   
            $('#branchids').val(branch_id);
            $('#placetypeid').val(place_type_id);
            $('#productidb').val(product_id);
            $('#producttypeid').val(product_type_id);
            $('#pro_name_up').val(product_name);
            $('#product_decription_up').val(product_decription);
          }
        });
        return false;
      }
</script>
<script>
   function place_list(place_type_id ) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/get_recplace",
          type: "post",
          data: {
            'id': place_type_id ,
          },
          success: function(resp) {
            $('#placelist').modal();
            var data = $.parseJSON(resp);
            var branch_id = data['single_record'].branch_id;
            var place_name = data['single_record'].place_name; 
            var place_type_id = data['single_record'].place_type_id; 
            
            $('#place_type_ids').val(place_type_id);
            $('#branch_idspl').val(branch_id);
            $('#place_namepl').val(place_name);
          }
        });
        return false;
      }
</script>
<script>
   function product_list(product_type_id) {
        $.ajax({
          url: "<?php echo base_url(); ?>Common/get_recproduct_type",
          type: "post",
          data: {
            'id': product_type_id  ,
          },
          success: function(resp) {
            $('#productlist').modal();
            var data = $.parseJSON(resp);
            var product_type_id = data['single_record'].product_type_id;
            var product_name = data['single_record'].product_name;

            $('#productids').val(product_type_id);
            $('#product_names_pl').val(product_name);
          }
        });
        return false;
      }
</script>
<script>
   function remove_co(product_id) {
       var conf = confirm("Are you sure to delete record?");
       if (conf) {
         $.ajax({
           url: "<?php echo base_url(); ?>Common/delete_product",
           type: "post",
           dataType: 'html',  
           data: {
             'id': product_id ,
             'table': 'product',
             'field': 'product_id '
           },
           success: function(resp) {
             var data = $.parseJSON(resp);
             var ddd = data['all_record'].status;
             console.log("dddddd", ddd);
             if (ddd == '1') {
               $('#msg').html(iziToast.success({
                 title: 'Success',
                 timeout: 2000,
                 message: 'HI! This Record Deleted.',
                 position: 'topRight'
               }));
               $.ajax({
                  url: "<?php echo base_url(); ?>Common/product_list_type",
                  type: "post",
                  data: {
                        'product_id ': product_id 
                  },
                  success: function(Resp) {

                        $('.product_list_table').html(Resp);
                  }
               });
             }   else if (ddd == '3') {
               $('#msg_doc').html(iziToast.error({
                 title: 'Canceled!',
                 timeout: 2000,
                 message: 'Someting Wrong!!',
                 position: 'topRight'
               }));
             }
           }
         });
         return false;
       }
   }
</script>
<script>
   function comp_chat(product_enquiry_id){
      $.ajax({
           url: "<?php echo base_url(); ?>common/chat_module",
           type: "post",
           dataType: 'html',  
           data: {
            'product_enquiry_id'  : product_enquiry_id 
           },
           success: function(resp) { 
            $('#chat_model').model();  
            var data = $.parseJSON(resp);
            // $('#chat_model').html(resp);
            var product_enquiry_id = data['conversion'].product_enquiry_id;
            var sender_name= data['conversion'].sender_name;
           }
         });
   }
</script>