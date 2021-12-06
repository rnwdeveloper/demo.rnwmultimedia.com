
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap4.min.css">

<style type="text/css">

  .t1{

    background-color: #0b527e;

    color: white;

    font-size: 15px;

    font: center;

   }

   .card-header{

    background-color: #0b527e;

    color: white;

    font-size: 18px;

   }

   .preview{

    background-color: #fc4b6c;

    color: white;

   }

   .page-item.active .page-link {

    z-index: 3;

    color: #fff;

    background-color: #0b527e;

    border-color: #0b527e;

}

.modal-header{

  background-color: #0b527e;

}

.modal-title{

  color: white;

  font-size: 22px;

}

.td1{

  font-size: 14px;

  color: black;

  font: center;

}

</style>

<main  class="main_content d-inline-block">

  <!-- <section class="page_title_block d-inline-block w-100 position-relative pb-0">

    <div class="container-fluid">

      <div class="row">

        <div class="col-lg-12">

          <div class="page_heading">

            <h1>Batch Created</h1>

          </div>

        </div>

      </div>

    </div>

  </section> -->

  <section class="all_demo_student_block Add_New_Addmision_page_2 d-inline-block w-100 position-relative pb-0">

    <div class="container-fluid">

      <div class="row">

        <div class="col-lg-6">

          <div class="accordion" id="student_list_aoc">

                  <div id="data_insert_msg">

                <div class="card">

              <div class="card-header mb-0" style="background-color: #0b527e;">

                <h2 class="mb-0">

                  <button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_4" aria-expanded="false">

                   Fees Receipt<span class="d-inline-block float-right pluse_icon">✕</span>

                  </button>

                </h2>

              </div>

              <div id="student_filter_panel_4" class="collapse show" style="color: black;">

                <div class="card-body">

                  <form  enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>AddmissionController/receipt"> 

                    <input type="hidden" name="update_id" value="<?php if(!empty($select_receipt->receipt_id)) { echo $select_receipt->receipt_id; } ?>"/>

                    <div class="row">

                    	<div class="col-sm-6">

                          <div class="form-group">

                            <label>Branch:</label>

                            <select class="form-control" name="branch_id"  id="branch">

                              <option value="">Select Branch</option>

                              <?php foreach($list_branch as $lp) { ?>

                        <option <?php if($lp->branch_id==@$select_receipt->branch_id) { echo "selected"; } ?>    value="<?php echo $lp->branch_id; ?>"><?php echo $lp->branch_name; ?></option>

                      <?php } ?>

                            </select>

                          </div>

                        </div>

                        <div class="col-sm-6">

                          <div class="form-group">

                            <label>Department:</label>

                            <select class="form-control" name="department_id"  id="department">

                              <option value="">Select Department</option>

                              <?php foreach($list_department as $lp) { ?>

                       <option <?php if($lp->department_id==@$select_receipt->department_id) { echo "selected"; } ?>

                        value="<?php echo $lp->department_id; ?>"><?php echo $lp->department_name; ?></option>

                      <?php } ?>

                            </select>

                          </div>

                        </div>

                        <div class="col-sm-6">

                          <div class="form-group">

                            <label>Sub Department:</label>

                            <select class="form-control" name="subdepartment_id"  id="subdepartment">

                              <option value="">Select SubDepartment</option>

                                 <?php foreach($list_subdepartment as $lp) { ?>

                        <option <?php if($lp->subdepartment_id==@$select_receipt->subdepartment_id) { echo "selected"; } ?>

                         value="<?php echo $lp->subdepartment_id; ?>"><?php echo $lp->subdepartment_name; ?></option>

                      <?php } ?>

                            </select>

                          </div>

                        </div>

                        <div class="col-sm-6">

                           <div class="form-group">

                                    <label for="email">Other:</label>

                                    <input type="text"  value="<?php if(!empty($select_receipt->other)) { echo $select_receipt->other; } ?>" name="other"   placeholder="" class="form-control">

                            </div>

                        </div>

                       <div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">logo:</label><br>

				      	<input type="radio"  name="logo" id="exampleInputEmail1" value="yes" <?php if(@$select_receipt->logo=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="logo" id="exampleInputEmail1" value="no" <?php if(@$select_receipt->logo=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div>

    					<div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Course:</label><br>

				      	<input type="radio"  name="course" id="exampleInputEmail1" value="yes" <?php if(@$select_receipt->course=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="course" id="exampleInputEmail1" value="no" <?php if(@$select_receipt->course=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div>

    					<div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Package:</label><br>

				      	<input type="radio"  name="package" id="exampleInputEmail1" value="yes" <?php if(@$select_receipt->package=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="package" id="exampleInputEmail1" value="no" <?php if(@$select_receipt->package=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div>

    					<div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Receipt No:</label><br>

				      	<input type="radio"  name="receipt_no" id="exampleInputEmail1" value="yes" <?php if(@$select_receipt->receipt_no=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="receipt_no" id="exampleInputEmail1" value="no" <?php if(@$select_receipt->receipt_no=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div>

    					<div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Date:</label><br>

				      	<input type="radio"  name="receipt_date" id="exampleInputEmail1" value="yes" <?php if(@$select_receipt->receipt_date=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="receipt_date" id="exampleInputEmail1" value="no" <?php if(@$select_receipt->receipt_date=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div>

                      	<div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Gr Id:</label><br>

				      	<input type="radio"  name="gr_id" id="exampleInputEmail1" value="yes" <?php if(@$select_receipt->gr_id=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="gr_id" id="exampleInputEmail1" value="no" <?php if(@$select_receipt->gr_id=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div>

                       	<div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Register No:</label><br>

				      	<input type="radio"  name="registration_no" id="exampleInputEmail1" value="yes" <?php if(@$select_receipt->registration_no=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="registration_no" id="exampleInputEmail1" value="no" <?php if(@$select_receipt->registration_no=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div>

                        <div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Name:</label><br>

				      	<input type="radio"  name="name" id="exampleInputEmail1" value="yes" <?php if(@$select_receipt->name=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="name" id="exampleInputEmail1" value="no" <?php if(@$select_receipt->name=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div>

                        <div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">The Sum Of(₹):</label><br>

				      	<input type="radio"  name="the_sum_of" id="exampleInputEmail1" value="yes" <?php if(@$select_receipt->the_sum_of=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="the_sum_of" id="exampleInputEmail1" value="no" <?php if(@$select_receipt->the_sum_of=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div> 

                       	<div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Pay Now:</label><br>

				      	<input type="radio"  name="pay_now" id="exampleInputEmail1" value="yes" <?php if(@$select_receipt->pay_now=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="pay_now" id="exampleInputEmail1" value="no" <?php if(@$select_receipt->pay_now=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div> 

                        <div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Remarks:</label><br>

				      	<input type="radio"  name="remarks" id="exampleInputEmail1" value="yes" <?php if(@$select_receipt->remarks=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="remarks" id="exampleInputEmail1" value="no" <?php if(@$select_receipt->remarks=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div> 

                        <div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Received By:</label><br>

				      	<input type="radio"  name="received_by_name" id="exampleInputEmail1" value="yes" <?php if(@$select_receipt->received_by_name=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="received_by_name" id="exampleInputEmail1" value="no" <?php if(@$select_receipt->received_by_name=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div> 

    					<div class="col-sm-12">

                       <div class="form-group">

				      <label for="exampleInputEmail1">Receipt Type</label><br>

				      <!-- Button trigger modal -->

					<button type="button" class="btn preview" data-toggle="modal" data-target="#exampleModalCenter">

					  Preview1

            <input type="checkbox" name="receipt_type[]" value="preview1" <?php if(@$select_receipt->receipt_type=="preview1") { echo "checked"; } ?>>

					</button>

				

					<button type="button" class="btn preview" data-toggle="modal" data-target="#exampleModalCenterr">

  						Preview2

              <input type="checkbox" name="receipt_type[]" value="preview2" <?php if(@$select_receipt->receipt_type=="preview2") { echo "checked"; } ?>>

					</button>	



          <button type="button" class="btn preview" data-toggle="modal" data-target="#exampleModalCenterrr">

              Preview3

              <input type="checkbox" name="receipt_type[]" value="preview3" <?php if(@$select_receipt->receipt_type=="preview3") { echo "checked"; } ?>>

          </button>



          <button type="button" class="btn preview" data-toggle="modal" data-target="#exampleModalCenterrrr">

              Preview4

              <input type="checkbox" name="receipt_type[]" value="preview4" <?php if(@$select_receipt->receipt_type=="preview4") { echo "checked"; } ?>>

          </button>

				      <!-- <input type="checkbox"  name="receipt_type[]" id="exampleInputEmail1" value="1" placeholder="content">1

				     

				        <input type="checkbox"  name="receipt_type[]" id="exampleInputEmail1" value="2" placeholder="content">2

				        <input type="checkbox"  name="receipt_type[]" id="exampleInputEmail1" value="3" placeholder="content">3

				        <input type="checkbox"  name="receipt_type[]" id="exampleInputEmail1" value="4" placeholder="content">4 -->

				    </div>

				</div>



                        <div class="col-xl-12">

                          <div class="form-group">

                            <input type="submit" name="submit" value="Save" class="btn t1">

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



<!-- Modal 1 -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" style="max-width: 600px;" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">Receipt Peview</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

      

  <!DOCTYPE html>

        <html>

        <head>

          <title></title>



        </head>

        <body>

        <div style="margin-top: 10px; font-size: 25px;"><b>Company Name</b></div>

        <div><b>Department</b></div>

                  

      <div><b>Sub Department</b></div>

           

      <div><b>Address</b></div>



      <div style="float: right; margin-top: -15%;">

        <b>Logo</b><br><br>

        <div><b>Date</b></div>

        <div><b>Register No:</b></div>

        <div><b>The Sum Of(₹):</b></div>

      </div><br>



<div style="border-bottom-style: solid; border-bottom-color: black;" ></div><br>

    <div style="margin-left: 27%;">

    <h1>Fess Receipt</h1>

  </div>

<br>

<br>

<br>



      <div><b>Receipt No. :</b></div>

      <div><b>Gr. Id :</b></div>

      <div><b>Installment No. :</b></div>

      <div><b>Name :</b></div>

      <div><b>Course :</b></div>

      <div><b>Pay Now :</b></div>

      <div><b>Remarks :</b></div>

      <div><b>Received By :</b></div><br><br>



      <div style="float: right;"><b>Authorized By</b></div>

        </body>

        </html>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

        

      </div>

    </div>

  </div>

</div>



<!-- Modal 2-->

<div class="modal fade" id="exampleModalCenterr" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered " style="max-width: 600px;" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">Receipt Preview 2 </h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

     

      	<!DOCTYPE html>

      	<html>

      	<head>

      		<title></title>



      	</head>

      	<body>

      	<div style="font-size: 25px; float: right"><b>Company Name</b></div><br>

        <div style="float: left; font-size: 20px;"><b>Logo</b></div>

        <div style="margin-left: 65.5%;">

      	<div><b>Department :</b></div>

                	

        <div><b>Sub Department :</b></div>

           

        <div><b>Address :</b></div>

      

     

      	<div><b>Date :</b></div>

      	<div><b>Register No:</b></div>

      	<div><b>The Sum Of(₹):</b></div>

      </div>

<div style="border-bottom-style: solid; border-bottom-color: black;" ></div><br>

		<div style="margin-left: 27%;">

		<h1>Fess Receipt</h1>

	</div>

<br>

<br>

<br>



      <div><b>Receipt No. :</b></div>

      <div><b>Gr. Id :</b></div>

      <div><b>Installment No. :</b></div>

      <div><b>Name :</b></div>

      <div><b>Course :</b></div>

      <div><b>Pay Now :</b></div>

      <div><b>Remarks :</b></div>

      <div><b>Received By :</b></div><br><br>



      <div style="float: right;"><b>Authorized By</b></div>

      	</body>

      	</html>







</body>

</html>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            </div>

    </div>

  </div>

</div>





<!-- Modal 3-->

<div class="modal fade" id="exampleModalCenterrr" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered " style="max-width: 600px;" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">Receipt Preview 3 </h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

     

        <!DOCTYPE html>

        <html>

        <head>

          <title></title>



        </head>

        <body>

        <div style="font-size: 25px; float: left;"><b>Company Name</b></div><br>

        <div style="margin-left: 50%; margin-top: -5px; font-size: 15px;"><b>Logo</b></div>

        <div style="margin-right: 65.5%;">

        <div><b>Department :</b></div>

                  

        <div><b>Sub Department :</b></div>

           

        <div><b>Address :</b></div>

       </div>

      

        <div style="margin-left: 75%; margin-top: -52px;">

        <div><b>Date :</b></div>

        <div><b>Register No:</b></div>

        <div><b>The Sum Of(₹):</b></div>

      </div>

<div style="border-bottom-style: solid; border-bottom-color: black;" ></div><br>

    <div style="margin-left: 27%;">

    <h1>Fess Receipt</h1>

  </div>

<br>

<br>

<br>



      <div><b>Receipt No. :</b></div>

      <div><b>Gr. Id :</b></div>

      <div><b>Installment No. :</b></div>

      <div><b>Name :</b></div>

      <div><b>Course :</b></div>

      <div><b>Pay Now :</b></div>

      <div><b>Remarks :</b></div>

      <div><b>Received By :</b></div><br><br>



      <div style="float: right;"><b>Authorized By</b></div>

        </body>

        </html>







</body>

</html>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            </div>

    </div>

  </div>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->



<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js "></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.js"></script>

<script src="<?php echo base_url(); ?>assets/js/main.js"></script> 



<!-- Data table and pagination & searching -->

<script src="<?php echo base_url(); ?>assets/js/jquery-3.5.1.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>

<script>

 $(document).ready(function() {

    $('#example').DataTable();

} );

</script>

<!-- Modal 4-->

<div class="modal fade" id="exampleModalCenterrrr" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered " style="max-width: 600px;" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">Receipt Preview 4 </h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

     

        <!DOCTYPE html>

        <html>

        <head>

          <title></title>



        </head>

        <body>

        <div style="font-size: 25px; margin-left: 35%;"><b>Company Name</b></div><br>

        <div style="margin-left: 50%; margin-top: -5px; font-size: 15px;"><b>Logo</b></div><br>

        <div>

        <div><b>Department :</b></div>

                  

        <div><b>Sub Department :</b></div>

           

        <div><b>Address :</b></div>

       </div>

      

        <div style="float: right; margin-top: -60px;">

        <div><b>Date :</b></div>

        <div><b>Register No:</b></div>

        <div><b>The Sum Of(₹):</b></div>

      </div>

<div style="border-bottom-style: solid; border-bottom-color: black;" ></div><br>

    <div style="margin-left: 27%;">

    <h1>Fess Receipt</h1>

  </div>

<br>

<br>

<br>



      <div><b>Receipt No. :</b></div>

      <div><b>Gr. Id :</b></div>

      <div><b>Installment No. :</b></div>

      <div><b>Name :</b></div>

      <div><b>Course :</b></div>

      <div><b>Pay Now :</b></div>

      <div><b>Remarks :</b></div>

      <div><b>Received By :</b></div><br><br>



      <div style="float: right;"><b>Authorized By</b></div>

        </body>

        </html>







</body>

</html>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            </div>

    </div>

  </div>

</div>

  </section>





  <section>

    <div class="container-fluid">

      <div class="card">

  <div class="card-header"><b>

    Display Receipt Record</b>

  </div>

  <div class="card-body">

    <blockquote class="blockquote mb-0">

      <table id="example" class="table table-str iped">

  <thead>

    <tr class="t1">

      <th scope="col">S_No</th>

      <th scope="col">Branch</th>

      <th scope="col">Department</th>

      <th scope="col">Sub Department</th>

      <th>Receipt Details</th>  

      <th scope="col">Action</th>

    </tr>

  </thead>

  <tbody>

    <?php $sno=1; foreach ($list_receipt as $val) {?>

    <tr class="td1">

      <td>

      <?php echo $sno; ?>

    </td>

       <td><?php $branch_ids = explode(",",$val->branch_id);

                        foreach($list_branch as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo $row->branch_name; }  } ?></td>

        <td><?php $branch_ids = explode(",",$val->department_id);

                        foreach($list_department as $row) { if(in_array($row->department_id,$branch_ids)) {  echo $row->department_name; }  } ?></td>

        <td><?php $branch_ids = explode(",",$val->subdepartment_id);

                        foreach($list_subdepartment as $row) { if(in_array($row->subdepartment_id,$branch_ids)) {  echo $row->subdepartment_name; }  } ?></td>                                       

          <td>

            <?php  echo "<b>Other :</b>".''. $val->other; ?> 

            <?php  echo "<b>Logo :</b>".''. $val->logo; ?> 

            <?php  echo "<b>Course :</b>".''. $val->course; ?>

            <?php  echo "<b>Package :</b>".''. $val->package; ?>

            <?php  echo "<b>Receipt_no :</b>".''. $val->receipt_no; ?>

            <?php  echo "<b>Receipt_date :</b>".''. $val->receipt_date; ?>

            <?php  echo "<b>Gr_id :</b>".''. $val->gr_id; ?>

            <?php  echo "<b>Registration_no :</b>".''.$val->registration_no; ?>

            <?php  echo "<b>Name :</b>".''.$val->name; ?>

            <?php  echo "<b>The_sum_of :</b>".''.$val->the_sum_of; ?>

            <?php  echo "<b>Pay_now :</b>".''.$val->pay_now; ?>

            <?php  echo "<b>Remarks :</b>".''.$val->remarks; ?>

            <?php  echo "<b>Received_by_name :</b>".''.$val->received_by_name; ?><br>

            <?php  echo "<b>Receipt_type :</b>".''.$val->receipt_type; ?>

        </td>                                                

                    <td>



                    <?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype'] == "Admin") {  ?>

                    <a href="<?php echo base_url(); ?>AddmissionController/receipt?action=delete&id=<?php echo @$val->receipt_id; ?>" onclick="return confirm('Are you sure you want to delete this Receipt?');" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></a>

                    

                    <a href="<?php echo base_url(); ?>AddmissionController/receipt?action=edit&id=<?php echo @$val->receipt_id; ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>

                     <?php } ?>

                    </td>                                         

    </tr>

  <?php $sno++; } ?>

  </tbody>

</table>

    </blockquote>

  </div>

</div>

    </div>



       

  </section>



