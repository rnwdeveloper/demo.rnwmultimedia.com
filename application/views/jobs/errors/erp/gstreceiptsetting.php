
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

          	<?php if(@$this->session->flashdata('msg_upd')) { ?>           

                <div id="yellow" class='btn btn-sm bg-light ml-4'>

            <?php echo $this->session->flashdata('msg_upd'); ?>

          </div>

          <?php } ?>



          <?php if(@$this->session->flashdata('msg_ins')) { ?>       

                <div id="yellow" class='btn btn-sm bg-light ml-4'>

            <?php echo $this->session->flashdata('msg_ins'); ?>

          </div> 

          <?php } ?>

                  <div id="data_insert_msg">

                <div class="card">

              <div class="card-header mb-0" style="background-color: #0b527e;">

                <h2 class="mb-0">

                  <button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_4" aria-expanded="false">

                   GST Receipt<span class="d-inline-block float-right pluse_icon">✕</span>

                  </button>

                </h2>

              </div>

              <div id="student_filter_panel_4" class="collapse show" style="color: black;">

                <div class="card-body">

                  <form  enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>AddmissionController/gstreceiptsetting"> 

                    <input type="hidden" name="update_id" value="<?php if(!empty($select_gst_receipt->gst_receipt_template_id)) { echo $select_gst_receipt->gst_receipt_template_id; } ?>"/>

                    <div class="row">

                    	<div class="col-sm-6">

                          <div class="form-group">

                            <label>Branch<span style="color: red;">*</span></label>

                            <select class="form-control" name="branch_id"  id="branch">

                              <option value="">Select Branch</option>

                              <?php foreach($list_branch as $lp) { ?>

                        <option <?php if($lp->branch_id==@$select_gst_receipt->branch_id) { echo "selected"; } ?>    value="<?php echo $lp->branch_id; ?>"><?php echo $lp->branch_name; ?></option>

                      <?php } ?>

                            </select>

                          </div>

                        </div>

                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>GST%<span style="color: red;">*</span></label>
                            <select class="form-control" name="gst_percentage"  id="">
                              <option value="">Select GST Percentage</option>
                              <?php for($i=1;$i<=30;$i++){ ?>
                                <option <?php if($i==@$select_gst_receipt->gst_percentage) { echo "selected"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>


                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Branch Address<span style="color: red;">*</span></label>
                           <textarea class="form-control" id="" name="branch_address" rows="3" placeholder="Branch Address"><?php echo @$select_gst_receipt->branch_address; ?></textarea>
                          </div>
                        </div>

              			 <div class="col-sm-6">
                          <div class="form-group">
                            <label>GST Number<span style="color: red;">*</span></label>
                           <input type="text" class="form-control" name="gst_number" value="<?php echo @$select_gst_receipt->gst_number; ?>" placeholder="Enter GST Number">
                          </div>
                        </div>

                       <div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">logo<span style="color: red;">*</span></label><br>

				      	<input type="radio"  name="logo" id="exampleInputEmail1" value="yes" <?php if(@$select_gst_receipt->logo=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="logo" id="exampleInputEmail1" value="no" <?php if(@$select_gst_receipt->logo=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div>

    					<div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Course<span style="color: red;">*</span></label><br>

				      	<input type="radio"  name="course" id="exampleInputEmail1" value="yes" <?php if(@$select_gst_receipt->course=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="course" id="exampleInputEmail1" value="no" <?php if(@$select_gst_receipt->course=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div>

    					<div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Package<span style="color: red;">*</span></label><br>

				      	<input type="radio"  name="package" id="exampleInputEmail1" value="yes" <?php if(@$select_gst_receipt->package=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="package" id="exampleInputEmail1" value="no" <?php if(@$select_gst_receipt->package=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div>

    					<div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Receipt No<span style="color: red;">*</span></label><br>

				      	<input type="radio"  name="receipt_no" id="exampleInputEmail1" value="yes" <?php if(@$select_gst_receipt->receipt_no=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="receipt_no" id="exampleInputEmail1" value="no" <?php if(@$select_gst_receipt->receipt_no=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div>

    					<div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Date<span style="color: red;">*</span></label><br>

				      	<input type="radio"  name="receipt_date" id="exampleInputEmail1" value="yes" <?php if(@$select_gst_receipt->receipt_date=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="receipt_date" id="exampleInputEmail1" value="no" <?php if(@$select_gst_receipt->receipt_date=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div>

                      	<div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Gr Id<span style="color: red;">*</span></label><br>

				      	<input type="radio"  name="gr_id" id="exampleInputEmail1" value="yes" <?php if(@$select_gst_receipt->gr_id=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="gr_id" id="exampleInputEmail1" value="no" <?php if(@$select_gst_receipt->gr_id=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div>

                       	<div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Register No<span style="color: red;">*</span></label><br>

				      	<input type="radio"  name="registration_no" id="exampleInputEmail1" value="yes" <?php if(@$select_gst_receipt->registration_no=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="registration_no" id="exampleInputEmail1" value="no" <?php if(@$select_gst_receipt->registration_no=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div>

                        <div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Name<span style="color: red;">*</span></label><br>

				      	<input type="radio"  name="name" id="exampleInputEmail1" value="yes" <?php if(@$select_gst_receipt->name=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="name" id="exampleInputEmail1" value="no" <?php if(@$select_gst_receipt->name=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div>

                        <div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">The Sum Of(₹)<span style="color: red;">*</span></label><br>

				      	<input type="radio"  name="the_sum_of" id="exampleInputEmail1" value="yes" <?php if(@$select_gst_receipt->the_sum_of=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="the_sum_of" id="exampleInputEmail1" value="no" <?php if(@$select_gst_receipt->the_sum_of=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div> 

                       	<div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Pay Now<span style="color: red;">*</span></label><br>

				      	<input type="radio"  name="pay_now" id="exampleInputEmail1" value="yes" <?php if(@$select_gst_receipt->pay_now=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="pay_now" id="exampleInputEmail1" value="no" <?php if(@$select_gst_receipt->pay_now=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div> 

                        <div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Remarks<span style="color: red;">*</span></label><br>

				      	<input type="radio"  name="remarks" id="exampleInputEmail1" value="yes" <?php if(@$select_gst_receipt->remarks=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="remarks" id="exampleInputEmail1" value="no" <?php if(@$select_gst_receipt->remarks=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div> 

                        <div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Received By<span style="color: red;">*</span></label><br>

				      	<input type="radio"  name="received_by_name" id="exampleInputEmail1" value="yes" <?php if(@$select_gst_receipt->received_by_name=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="received_by_name" id="exampleInputEmail1" value="no" <?php if(@$select_gst_receipt->received_by_name=="no") { echo "checked"; } ?> placeholder="content">No

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

<script>

   if (document.getElementById("yellow") != null) {

    setTimeout(function() {

      document.getElementById('yellow').style.display = 'none';

    }, 5000);

  }

</script>


  </section>




  <section>

    <div class="container-fluid">

      <div class="card">

  <div class="card-header"><b>

    Display GST Receipt Record</b>

  </div>

  <div class="card-body">

    <blockquote class="blockquote mb-0">

      <table id="example" class="table table-str iped">

  <thead>
    <tr class="t1">
      <th scope="col">S_No</th>
      <th scope="col">Branch</th>
      <th scope="col">GST%</th>
      <th scope="col">Branch Address</th>
      <th scope="col">GST Number</th>
      <th>Receipt Details</th>  
      <th scope="col">Action</th>
    </tr>

  </thead>

  <tbody>

    <?php $sno=1; foreach ($list_gst_receipt as $val) {?>

    <tr class="td1">

      <td>

      <?php echo $sno; ?>

    </td>

       <td><?php $branch_ids = explode(",",$val->branch_id);

                        foreach($list_branch as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo $row->branch_name; }  } ?></td>

       <td><?php echo $val->gst_percentage; ?></td>   

       <td><?php echo $val->branch_address; ?></td>

       <td><?php echo $val->gst_number; ?></td>    	                             

      <td>
        <!-- <?php  echo "<b>Other :</b>".''. $val->other; ?>  -->

        <?php  echo "<b>Logo :</b>".''. $val->logo; ?> 

        <?php  echo "<b>Course :</b>".''. $val->course; ?>

        <?php  echo "<b>Package :</b>".''. $val->package; ?>

        <?php  echo "<b>Receipt_no :</b>".''. $val->receipt_no; ?>

        <?php  echo "<b>Receipt_date :</b>".''. $val->receipt_date; ?>

        <?php  echo "<b>Gr_id :</b>".''. $val->gr_id; ?>

        <?php  echo "<b>Registration_no :</b>".''.$val->registration_no; ?>

        <?php  echo "<b>The_sum_of :</b>".''.$val->the_sum_of; ?>

        <?php  echo "<b>Pay_now :</b>".''.$val->pay_now; ?>

        <?php  echo "<b>Remarks :</b>".''.$val->remarks; ?>

        <?php  echo "<b>Received_by_name :</b>".''.$val->received_by_name; ?><br>

    </td>                                                

    <td>

    <?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype'] == "Admin") {  ?>

    <a href="<?php echo base_url(); ?>AddmissionController/gstreceiptsetting?action=delete&id=<?php echo @$val->gst_receipt_template_id; ?>" onclick="return confirm('Are you sure you want to delete this Receipt?');" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></a>

    <a href="<?php echo base_url(); ?>AddmissionController/gstreceiptsetting?action=edit&id=<?php echo @$val->gst_receipt_template_id; ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
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



