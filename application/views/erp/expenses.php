<?php  $all_per = explode(',',$_SESSION['p_permission']);  ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.0-beta/css/bootstrap-select.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css"> 
<div class="loader"></div>
<div id="app">
  <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
      <section class="section">
        <div class="section-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                <?php 
                    $total =0;
                    for($i=0; $i<sizeof($list_expenses); $i++) {  
                      //echo "<br>".$i." = ".$list_expenses[$i]->paying_amount;
                      $total = $total + $list_expenses[$i]->paying_amount;
                    } ?> 
                  <h4>Expenses</h4>
                  <h4>( Total  <span class="text-danger">₹<?php setlocale(LC_MONETARY, 'en_IN'); $ammount = @money_format('%!i',$total);  ?> <?php echo $ammount; ?> /-</span> )</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-info text-white" data-toggle="modal" data-target=".bd-example-modal-lg">
                      <i class="fas fa-filter mr-1" data-toggle="tooltip" data-placement="bottom" title="Filter"></i>
                    </a>
                    <div class="dropdown">
                      <a href="#" data-toggle="dropdown" class="btn btn-info dropdown-toggle text-white"  ><i class="fas fa-tasks mr-1" data-toggle="tooltip" data-placement="bottom" title="Task"></i></a>
                      <div class="dropdown-menu">
                        <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Add Expences") {?>
                        <a href="#" class="dropdown-item has-icon text-danger" data-toggle="modal" data-target=".expenses_form" onclick=hide()><i class="far fa-money-bill-alt" style="margin-top: 1px;"></i>
                          Expenses Form</a>
                        <?php } }?>
                        <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Catagory Expenses") {?>
                        <a href="#" class="dropdown-item has-icon text-dark" data-toggle="modal" data-target=".category"><i class="fas fa-th-list" style="margin-top: 1px;"></i>Category Expenses</a>
                      <?php } }?>
                      <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Subcatagory Exences") {?>
                        <a href="#" class="dropdown-item has-icon text-dark" data-toggle="modal" data-target=".subcategory"><i class="fas fa-th-list" style="margin-top: 1px;"></i>SubCategory Expenses</a>
                      <?php } } ?>
                      </div>
                    </div>
                    <button class="btn btn-info mr-1" tabindex="0" aria-controls="tableExport" id="btnExporttoExcel"><span data-toggle="tooltip" data-placement="bottom" title="Excel"><i class="far fa-file-excel mr-1"></i></span></button>
                    <button class="btn" tabindex="0" aria-controls="tableExport"><span><i class="fas fa-arrow-left mr-1"></i> Back</span></button>
                  </div>
                </div>
                <div class="card-body">
                  <div id="edited_ccomentmsg"></div>
                  <div class="table-responsive">
                    <table class="table table-striped income-table tabel-ordered" id="table1">
                      <thead>
                        <tr>
                          <th>
                            <div class="custom-checkbox custom-checkbox-table custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                              <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                            </div>
                          </th>
                          <th>NO</th>
                          <th width="200px" align="left">Payment Details</th>
                          <th>Branch</th>
                          <th>Payable Category</th>
                          <th>Payable SubCategory</th>
                          <th>Amount (₹)</th>
                          <th>Payment Mode</th>
                          <th width="200px" align="left">Details</th>
                          <th width="400px" align="left">Remark</th>
                          <th>Paid By</th>
                          <th>Created By</th>
                          <th width="100px">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $sno = 1;
                        foreach ($list_expenses as $val) { if($val->expense_status=="0") {?>
                          <tr>
                            <td>
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" name="expenses_ids" value="<?php echo $val->expenses_id; ?>" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?php echo $sno; ?>">
                                <label for="checkbox-<?php echo $sno; ?>" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td><?php echo $sno; ?></td>
                            <td align="left">
                            <?php echo "<b>Pay Date : </b>".$val->pay_date."<br>"; ?>
                            <?php echo "<b>Pay Type : </b>".$val->pay_type."<br>"; ?>
                            <?php echo "<b>Pay For : </b>".$val->pay_for."<br>"; ?>
                            </td>
                            <td>
                              <?php $branch_ids = explode(",", $val->branch_id);
                              foreach ($list_branch as $ba) {
                                if (in_array($ba->branch_id, $branch_ids)) {
                                  echo $ba->branch_code;
                                }
                              } ?>
                            </td>
                            <td><?php $cateids = explode(",", $val->expenses_category_id);
                                foreach ($list_expenses_category as $li) {
                                  if (in_array($li->expenses_category_id, $cateids)) {
                                    echo $li->category_name;
                                  }
                                } ?>
                            </td>
                            <td>
                              <?php $subcateids = explode(",", $val->expenses_subcategory_id);
                              foreach ($list_expenses_subcategory as $li) {
                                if (in_array($li->expenses_subcategory_id, $subcateids)) {
                                  echo $li->subcategory_name;
                                }
                              } ?>
                            </td>
                            <td><?php echo $val->paying_amount; ?></td>
                            <td>
                              <?php echo $val->payment_mode; ?>
                            </td>
                            <td align="left" >
                            <?php if($val->payment_mode == "Cash") { echo $val->payment_mode; } ?>
                            <?php if (
                                $val->payment_mode == "Credit Card" || $val->payment_mode == "Debit Card" || $val->payment_mode == "Online Payment"
                                || $val->payment_mode == "Paytm" || $val->payment_mode == "Banck Deposit (Cash)" || $val->payment_mode == "Capital Float (EMI)"
                                || $val->payment_mode == "Google Pay" || $val->payment_mode == "Phone Pay" || $val->payment_mode == "Bajaj Finserv (EMI)"
                                || $val->payment_mode == "Bhim UPI(India)" || $val->payment_mode == "Instamojo" || $val->payment_mode == "Paypal"
                                || $val->payment_mode == "Razorpay"
                              ) { ?>
                                <?php echo "<b>Transaction No : </b>" . $val->transaction_no . "<br>" ?>
                                <?php echo "<b>Transaction Date : </b>" . $val->transaction_date; ?>
                              <?php } ?>
                              <?php if ($val->payment_mode == "Cheque" || $val->payment_mode == "DD") { ?>
                                <?php echo "<b>Bank Name : </b>" . $val->bank_name . "<br>" ?>
                                <?php echo "<b>Bank Branch Name : </b>" . $val->bank_branch_name . "<br>" ?>
                                <?php echo "<b>Cheque Holder Name : </b>" . $val->cheque_holder_name . "<br>" ?>
                                <?php echo "<b>Cheque No : </b>" . $val->cheque_no . "<br>" ?>
                                <?php echo "<b>Cheque Date : </b>" . $val->cheque_date; ?>
                              <?php } ?>
                              <?php if ($val->payment_mode == "NEFT / IMPS") { ?>
                                <?php echo "<b>Bank Name : </b>" . $val->bank_name . "<br>" ?>
                                <?php echo "<b>Bank Branch Name : </b>" . $val->bank_branch_name . "<br>" ?>
                                <?php echo "<b>Transaction No : </b>" . $val->transaction_no . "<br>" ?>
                                <?php echo "<b>Transaction Date : </b>" . $val->transaction_date; ?>
                              <?php } ?>
                            </td>
                            <td>
                             <!-- <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Edit Remarks") {?>
                            <textarea type="text" class="form-control txtedit" style="border: transparent;" data-id="<?php echo $val->expenses_id; ?>" data-field="comment" id="nametxt_<?php echo $val->expenses_id; ?>"><?php echo $val->comment; ?></textarea>
                          <?php } else  {  ?><textarea type="text" class="form-control txtedit" style="border: transparent;" id="nametxt"><?php echo $val->comment; ?></textarea>  <?php } } ?> -->
                          <?php echo $val->comment; ?>
                          </td>                                                   
                            <td><?php echo $val->paid_by; ?></td>
                            <td><?php echo $val->addedby; ?></td>
                            <td>
                              <!-- <a href="#" class="bg-primary action-icon text-white btn-primary"><i class="fas fa-eye"></i> </a> -->
                              <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Edit expenses") {?>
                              <a href="javascript:expenses_upd(<?php echo $val->expenses_id; ?>)" class="bg-primary action-icon text-white btn-primary" onclick=hide()><i class="far fa-edit"></i></a>
                              <?php } } ?>
                              <?php for($i=0;$i<sizeof($all_per);$i++) { if($all_per[$i] == "Delete expenses") {?>
                              <a href="#" class="bg-danger action-icon text-white btn-danger" onclick='check_selectedvalue()'><i class="far fa-trash-alt"></i>
                              <?php } }?>
                              </a>
                            </td>
                          </tr>
                        <?php $sno++;
                        } } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
<!-- Category Expenses modal -->
<div class="modal fade expenses_form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="myLargeModalLabel">Expenses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" name="add_expenses" id="add_expenses">
          <input type="hidden" name="expenses_id" id="expenses_id" class="form-control">
      <div class="modal-body">
        <div id="msg_expenses"></div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Payee Category</label>
              <div class="pretty p-icon p-jelly p-round p-bigger">
                <input type="radio" name="pay_type" value="Individual" class="pay-type-one"/>
                <div class="state p-info">
                  <i class="icon material-icons">done</i>
                  <label>Individual</label>
                </div>
              </div>
              <div class="pretty p-icon p-jelly p-round p-bigger">
                <input type="radio" name="pay_type" value="Organisation" class="pay-type-two"/>
                <div class="state p-info">
                  <i class="icon material-icons">done</i>
                  <label>Organisation</label>
                </div>
              </div>
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">Branch</label>
              <select class="form-control" name="branch_id" id="branch_id" required>
                <option value="">Select Branch</option>
                <?php foreach ($list_branch as $ld) { ?>
                  <option value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label class="d-block">Payable For</label>
              <div class="pretty p-icon p-jelly p-round p-bigger">
                <input type="radio" name="pay_for" value="Other" onclick="stuhide()" class="pay-for-one"/>
                <div class="state p-info">
                  <i class="icon material-icons">done</i>
                  <label>Other</label>
                </div>
              </div>
              <div class="pretty p-icon p-jelly p-round p-bigger">
                <input type="radio" name="pay_for" value="Student" onclick="stu()" class="pay-for-two"/>
                <div class="state p-info">
                  <i class="icon material-icons">done</i>
                  <label>Student</label>
                </div>
              </div>
            </div>
            <div class="form-group col-md-4 hideden-section">
              <label>Search</label>
              <input type="text" class="form-control fas fa-search" id="search_text" name="search_text" placeholder="Search By GR ID...">
              <input type="hidden" class="form-control" id="grids" name="grids">
              <input type="hidden" class="form-control" id="admissionids" name="admissionids">
              <input type="hidden" class="form-control" id="ctype" name="ctype">
            </div>
            <div class="form-group col-md-4 hideden-section">
              <label>Full Name</label>
              <input type="text" class="form-control" id="fullname" name="fullname" value="" readonly>
            </div>
            <div class="form-group col-md-4 hideden-section">
              <label>Course</label>
              <input type="text" class="form-control" id="allco" name="allco" value="" readonly>
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">Payment Mode</label>
              <select class="form-control payment-mode" name="payment_mode" id="payment_mode" onchange="paymenttype(this)" required="required">
                <option value="">Select Mode</option>
                <option value="Cash">Cash</option>
                <option value="Cheque">Cheque</option>
                <option value="DD">DD</option>
                <option value="Credit Card">Credit Card</option>
                <option value="Debit Card">Debit Card</option>
                <option value="Online Payment">Online Payment</option>
                <option value="NEFT / IMPS">NEFT / IMPS</option>
                <option value="Paytm">Paytm</option>
                <option value="Banck Deposit (Cash)">Bank Deposit (Cash)</option>
                <option value="Capital Float (EMI)">Capital Float (EMI)</option>
                <option value="Google Pay">Google Pay</option>
                <option value="Phone Pay">Phone Pay</option>
                <option value="Bajaj Finserv (EMI)">Bajaj Finserv (EMI)</option>
                <option value="Bhim UPI(India)">Bhim UPI(India)</option>
                <option value="Instamojo">Instamojo</option>
                <option value="Paypal">Paypal</option>
                <option value="Razorpay">Razorpay</option>
              </select>
            </div>
            <div class="col-lg-4 Cheque-Hidden">
              <div class="form-group">
                <label>Cheque Holder Name</label>
                <input type="text" class="form-control cheque-holder-name" name="cheque_holder_name" id="cheque_holder_name" placeholder="Cheque Holder Name">
              </div>
            </div>
            <div class="col-lg-4 Cheque-Hidden">
              <div class="form-group">
                <label>Cheque/DD No</label>
                <input type="text" class="form-control cheque-no" name="cheque_dd_no" id="cheque_dd_no" placeholder="Cheque/DD No">
              </div>
            </div>
            <div class="col-lg-4 Cheque-Hidden">
              <div class="form-group">
                <label>Cheque/DD Date</label>
                <input type="date" class="form-control cheque-date" name="cheque_dd_date" id="cheque_dd_date" placeholder="Cheque/DD Date">
              </div>
            </div>
            <div class="col-lg-4 Cheque-Hidden">
              <div class="form-group">
                <label>Bank Name</label>
                <input type="text" class="form-control bank-name" name="bank_name" id="bank_name" placeholder="Bnck Name">
              </div>
            </div>
            <div class="col-lg-4 Cheque-Hidden">
              <div class="form-group">
                <label>Bank Branch Name</label>
                <input type="text" class="form-control bank-branch-name" name="bank_branch_name" id="bank_branch_name" placeholder="Bank Branch Name">
              </div>
            </div>
            <div class="col-lg-4 Cheque-Hidden">
              <div class="form-group">
                <label>Cheque Status</label>
                <select class="form-control cheque-status" name="cheque_status" id="cheque_status">
                  <option value="">Select</option>
                  <option value="Paid/Cleared">Paid/Cleared</option>
                  <option value="Deposit IN Bank">Deposit IN Bank</option>
                  <option value="Cheque Collected">Cheque Collected</option>
                </select>
              </div>
            </div>
            <div class="col-lg-4 Dd-Hidden">
              <div class="form-group">
                <label>Cheque Holder Name</label>
                <input type="text" class="form-control dd-cheque-holder-name" name="dd_cheque_holder_name" id="dd_cheque_holder_name" placeholder="Cheque Holder Name">
              </div>
            </div>
            <div class="col-lg-4 Dd-Hidden">
              <div class="form-group">
                <label>Cheque/DD No</label>
                <input type="text" class="form-control dd-cheque-no" name="dd_cheque_dd_no" id="dd_cheque_dd_no" placeholder="Cheque/DD No">
              </div>
            </div>
            <div class="col-lg-4 Dd-Hidden">
              <div class="form-group">
                <label>Cheque/DD Date</label>
                <input type="date" class="form-control dd-cheque-date" name="dd_cheque_dd_date" id="dd_cheque_dd_date" placeholder="Cheque/DD Date">
              </div>
            </div>
            <div class="col-lg-4 Dd-Hidden">
              <div class="form-group">
                <label>Bank Name</label>
                <input type="text" class="form-control dd-bank-name" name="dd_bank_name" id="dd_bank_name" placeholder="Bnck Name">
              </div>
            </div>
            <div class="col-lg-4 Dd-Hidden">
              <div class="form-group">
                <label>Bank Branch Name</label>
                <input type="text" class="form-control dd-bank-branch-name" name="dd_bank_branch_name" id="dd_bank_branch_name" placeholder="Bank Branch Name">
              </div>
            </div>
            <div class="col-lg-4 Dd-Hidden">
              <div class="form-group">
                <label>Cheque Status</label>
                <select class="form-control dd-cheque-status" name="dd_cheque_status" id="dd_cheque_status">
                  <option value="">Select</option>
                  <option value="Paid/Cleared">Paid/Cleared</option>
                  <option value="Deposit IN Bank">Deposit IN Bank</option>
                  <option value="Cheque Collected">Cheque Collected</option>
                </select>
              </div>
            </div>
            <div class="col-lg-4 Cradit-Card">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control cradit-transaction-no" name="cradit_card_transaction_no" id="cradit_card_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Cradit-Card">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control cradit-transaction-date" name="cradit_card_transaction_date" id="cradit_card_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4 Debit-Card">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control debit-transaction-no" name="debit_card_transaction_no" id="debit_card_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Debit-Card">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control debit-transaction-date" name="debit_card_transaction_date" id="debit_card_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4 Online-Payment">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control online-transaction-no" name="online_payment_transaction_no" id="online_payment_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Online-Payment">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control online-transaction-date" name="online_payment_transaction_date" id="online_payment_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4 NEFT-IMPS">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control neft-transaction-no" name="neft_imps_transaction_no" id="neft_imps_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 NEFT-IMPS">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control neft-transaction-date" name="neft_imps_transaction_date" id="neft_imps_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4 NEFT-IMPS">
              <div class="form-group">
                <label>Bank Name</label>
                <input type="text" class="form-control neft-bank-name" name="neft_imps_bank_name" id="neft_imps_bank_name" placeholder="Bnck Name">
              </div>
            </div>
            <div class="col-lg-4 NEFT-IMPS">
              <div class="form-group">
                <label>Bank Branch Name</label>
                <input type="text" class="form-control neft-bank-branch-name" name="neft_imps_bank_branch_name" id="neft_imps_bank_branch_name" placeholder="Bank Branch Name">
              </div>
            </div>
            <div class="col-lg-4 Paytm">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control paytm-transaction-no" name="paytm_transaction_no" id="paytm_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Paytm">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control paytm-transaction-date" name="paytm_transaction_date" id="paytm_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4 Bank-Deposit">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control deposit-transaction-no" name="bank_deposit_transaction_no" id="bank_deposit_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Bank-Deposit">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control deposit-transaction-date" name="bank_deposit_transaction_date" id="bank_deposit_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4  Capital-Float">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control capital-float-transaction-no" name="capital_float_transaction_no" id="capital_float_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Capital-Float">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control capital-float-transaction-date" name="capital_float_transaction_date" id="capital_float_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4  Google-Pay">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control google-pay-transaction-no" name="google_pay_transaction_no" id="google_pay_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Google-Pay">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control google-pay-transaction_date" name="google_pay_transaction_date" id="google_pay_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4  Phone-Pay">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control phone-pay-transaction-no" name="phone_pay_transaction_no" id="phone_pay_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Phone-Pay">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control phone-pay-transaction-date" name="phone_pay_transaction_date" id="phone_pay_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4  Bajaj-Finserv">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control bajaj-finserv-transaction-no" name="bajaj_finserv_transaction_no" id="bajaj_finserv_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Bajaj-Finserv">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control bajaj-finserv-transaction-date" name="bajaj_finserv_transaction_date" id="bajaj_finserv_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4  Bhim-UPI">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control bhim-upi-transaction-no" name="bhim_upi_transaction_no" id="bhim_upi_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Bhim-UPI">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control bhim-upi-transaction-date" name="bhim_upi_transaction_date" id="bhim_upi_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4  Insta-mojo">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control instamoj-transaction-no" name="instamoj_transaction_no" id="instamoj_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Insta-mojo">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control instamoj-transaction-date" name="instamoj_transaction_date" id="instamoj_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4  Pay-pal">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control pay-pal-transaction-no" name="pay_pal_transaction_no" id="pay_pal_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Pay-pal">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control pay-pal-transaction-date" name="pay_pal_transaction_date" id="pay_pal_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4  Razor-pay">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control razorpay-transaction-no" name="razorpay_transaction_no" id="razorpay_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Razor-pay">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control razorpay-transaction-date" name="razorpay_transaction_date" id="razorpay_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">Paying Amount</label>
              <input type="number" class="form-control" id="paying_amount" name="paying_amount" value="" min="0" data-bind="value:replyNumber" placeholder="Expenses Amount" required>
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">Payable Category</label>
              <select class="form-control" name="expenses_category_id" id="expenses_category_id" required onchange="selectpayeelabel()">
                <option value="">Select Category</option>
                <?php foreach ($list_expenses_category as $ld) { ?>
                  <option value="<?php echo $ld->expenses_category_id; ?>">
                    <?php echo $ld->category_name; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">Payable SubCategory</label>
              <select class="form-control" name="expenses_subcategory_id" id="expenses_subcategory_id" required>
                <option value="">Select SubCategory</option>
                <?php foreach ($list_expenses_subcategory as $ld) { ?>
                  <option value="<?php echo $ld->expenses_subcategory_id ?>">
                    <?php echo $ld->subcategory_name; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Pay Date</label>
              <input type="date" class="form-control" id="pay_date" name="pay_date" value="" required>
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">Payee Name</label>
              <input type="text" class="form-control" id="info" name="info" value="" placeholder="Payee..." required>
            </div>
            <div class="form-group col-md-4">
              <label>Paid By</label>
              <select class="form-control" name="paid_by" id="paid_by" required>
                <option value="">Select Paid By</option>
                <option value="HD">HD</option>
                <option value="HR">HR</option>
                <option value="MK">MK</option>
                <option value="PS">PS</option>
              </select>
            </div>  
            <div class="form-group col-md-8">
              <label>Comment</label>
              <textarea class="form-control" name="comment" id="comment" required></textarea>
            </div>
            <div class="form-group col-md-12">
              <input type="submit" class="btn btn-primary" id="Submit" name="submit" value="Submit">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Category Expenses modal -->
<div class="modal fade category" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">Category Expenses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div id="msg_category"></div>
          <div class="form-group col-md-12">
            <label for="inputEmail4">Expenses Category</label>
            <input type="text" class="form-control" id="category_name" name="category_name" value="" placeholder="Category Name">
          </div>
          <div class="form-group col-md-12">
            <input type="submit" class="btn btn-primary" id="submiteded" name="submiteded" value="Submit">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- SubCategory Expenses modal -->
<div class="modal fade subcategory" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">SubCategory Expenses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div id="msg_subcategory"></div>
          <div class="form-group col-md-12">
            <label for="inputEmail4">Expenses Category</label>
            <select class="form-control" name="category_id" id="category_id">
              <option value="">Select Category</option>
              <?php foreach ($list_expenses_category as $ld) { ?>
                <option value="<?php echo $ld->expenses_category_id; ?>"><?php echo $ld->category_name; ?>
                </option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col-md-12">
            <label for="inputEmail4">Expenses SubCategory</label>
            <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" value="" placeholder="SubCategory Name">
          </div>
          <div class="form-group col-md-12">
            <input type="submit" class="btn btn-primary" id="sumited" name="sumited" value="Submit">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="myLargeModalLabel">Search</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url(); ?>Account/expenses">
          <div class="form-row">
          <div class="col-md-8 form-group" >
                  <label>Date From To </label> 
            <input type="hidden" id="fromdate" name="filter_from_date" value="<?php if(!empty($filter_from_date)) { echo @$filter_from_date; } ?>">
            <input type="hidden" id="todate" name="filter_to_date" value="<?php if(!empty($filter_to_date)) { echo @$filter_to_date; } ?>">
            <div id="reportrange">
            <i class="far fa-calendar-alt"></i>&nbsp;
                <span><?php if(!empty($filter_from_date) && !empty($filter_to_date)) { echo @$filter_from_date." - ".$filter_to_date; } ?></span> <i class="fa fa-caret-down"></i>
            </div>
        </div> 
            <div class="form-group col-md-4">
              <label for="inputState">Branch</label>
              <select id="inputState" class="form-control" name="filter_branch" id="filter_branch">
                <option value="">Select Branch</option>
                <?php foreach ($list_branch as $ld) { ?>
                  <option <?php if (@$filter_branch == $ld->branch_id) {
                            echo "selected";
                          } ?> value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">Payment Mode</label>
              <select class="form-control payment-mode" name="filter_payment_mode" id="filter_payment_mode" onchange="paymenttype(this)">
                <option value="">Select Mode</option>
                <option value="Cash">Cash</option>
                <option value="Cheque">Cheque</option>
                <option value="DD">DD</option>
                <option value="Credit Card">Credit Card</option>
                <option value="Debit Card">Debit Card</option>
                <option value="Online Payment">Online Payment</option>
                <option value="NEFT / IMPS">NEFT / IMPS</option>
                <option value="Paytm">Paytm</option>
                <option value="Banck Deposit (Cash)">Bank Deposit (Cash)</option>
                <option value="Capital Float (EMI)">Capital Float (EMI)</option>
                <option value="Google Pay">Google Pay</option>
                <option value="Phone Pay">Phone Pay</option>
                <option value="Bajaj Finserv (EMI)">Bajaj Finserv (EMI)</option>
                <option value="Bhim UPI(India)">Bhim UPI(India)</option>
                <option value="Instamojo">Instamojo</option>
                <option value="Paypal">Paypal</option>
                <option value="Razorpay">Razorpay</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">Payable Category</label>
              <select class="form-control" name="filter_expenses_category_id" id="filter_expenses_category_id" onchange="selectpayeelabel()">
                <option value="">Select Category</option>
                <?php foreach ($list_expenses_category as $ld) { ?>
                  <option value="<?php echo $ld->expenses_category_id; ?>">
                    <?php echo $ld->category_name; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">Payable SubCategory</label>
              <select class="form-control" name="filter_expenses_subcategory_id" id="filter_expenses_subcategory_id">
                <option value="">Select SubCategory</option>
                <?php foreach ($list_expenses_subcategory as $ld) { ?>
                  <option value="<?php echo $ld->expenses_subcategory_id ?>">
                    <?php echo $ld->subcategory_name; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">Created By</label>
              <select class="form-control" name="filter_created_by" id="filter_created_by">
                <option value="">Select Created By</option>
                <?php foreach ($all_user as $ld) { ?>
                  <option value="<?php echo $ld->name; ?>">
                    <?php echo $ld->name; ?>
                  </option>
                <?php } ?>
                <?php foreach ($admin_reco as $ld) { ?>
                  <option value="<?php echo $ld->name; ?>">
                    <?php echo $ld->name; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="text-right mt-2">
            <!-- <button class="btn btn-success mr-1" type="submit" name="filter_overdue_fees">Filter</button> -->
            <input type="submit" class="btn btn-primary" value="Filter" name="filter_expenses">
            <a class="btn btn-light text-dark" href="<?php echo base_url(); ?>Account/expenses">Reset</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal deleted status -->
<div class="modal fade" id="deleted_expenses" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModal">Delete For Reason</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="deleted_status_msg"></div>
        <div class="form-group">
          <label>Remarks</label>
          <textarea name="remarks" id="remarks" class="form-control"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" name="status_deleted" id="status_deleted" value="Submit">
      </div>
    </div>
  </div>
</div>

<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
  <!-- JS Libraies -->
  <script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/js/table2excel.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/cleave.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.0-beta/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script>
	<script src="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
	<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
	<script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script> 
  <script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript">    
      $(function () {    
          $("#btnExporttoExcel").click(function () {    
              $("#table1").table2excel({    
                  filename: "Expenses-data.xls"    
              });    
          });    
      });    
</script>  
<script>
function hide() { 
  $('.Cheque-Hidden').hide();
	$('.Dd-Hidden').hide();
	$('.Cradit-Card').hide();
	$('.Debit-Card').hide();
	$('.Online-Payment').hide();
	$('.NEFT-IMPS').hide();
	$('.Paytm').hide();
	$('.Bank-Deposit').hide();
	$('.Capital-Float').hide();
	$('.Google-Pay').hide();
	$('.Phone-Pay').hide();
	$('.Bajaj-Finserv').hide();
	$('.Bhim-UPI').hide();
	$('.Insta-mojo').hide();
	$('.Pay-pal').hide();
	$('.Razor-pay').hide();
}   
</script>
<script>
  function paymenttype(p) {
    var x = p.options[p.selectedIndex].text;
    if (x == 'Cash') {
      $(".Cheque-Hidden").show();
    } else {
      $(".Cheque-Hidden").hide();
    }

    if (x == "Cheque") {
      $(".Cheque-Hidden").show();
    } else {
      $(".Cheque-Hidden").hide();
    }

    if (x == "DD") {
      $(".Dd-Hidden").show();
    } else {
      $(".Dd-Hidden").hide();
    }

    if (x == "Credit Card") {
      $(".Cradit-Card").show();
    } else {
      $(".Cradit-Card").hide();
    }

    if (x == "Debit Card") {
      $(".Debit-Card").show();
    } else {
      $('.Debit-Card').hide();
    }

    if (x == "Online Payment") {
      $(".Online-Payment").show();
    } else {
      $('.Online-Payment').hide();
    }

    if (x == "NEFT / IMPS") {
      $(".NEFT-IMPS").show();
    } else {
      $('.NEFT-IMPS').hide();
    }

    if (x == "Paytm") {
      $(".Paytm").show();
    } else {
      $('.Paytm').hide();
    }

    if (x == "Bank Deposit (Cash)") {
      $(".Bank-Deposit").show();
    } else {
      $('.Bank-Deposit').hide();
    }

    if (x == "Capital Float (EMI)") {
      $(".Capital-Float").show();
    } else {
      $('.Capital-Float').hide();
    }

    if (x == "Google Pay") {
      $(".Google-Pay").show();
    } else {
      $('.Google-Pay').hide();
    }

    if (x == "Phone Pay") {
      $(".Phone-Pay").show();
    } else {
      $('.Phone-Pay').hide();
    }

    if (x == "Bajaj Finserv (EMI)") {
      $(".Bajaj-Finserv").show();
    } else {
      $('.Bajaj-Finserv').hide();
    }

    if (x == "Bhim UPI(India)") {
      $(".Bhim-UPI").show();
    } else {
      $('.Bhim-UPI').hide();
    }

    if (x == "Instamojo") {
      $(".Insta-mojo").show();
    } else {
      $('.Insta-mojo').hide();
    }

    if (x == "Paypal") {
      $(".Pay-pal").show();
    } else {
      $('.Pay-pal').hide();
    }

    if (x == "Razorpay") {
      $(".Razor-pay").show();
    } else {
      $('.Razor-pay').hide();
    }
  }
</script>

<!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> -->
<script>
  $('#mySelect').selectpicker();

  $('.expenses_form').on('click', function() {
  $("#")[0].reset();
});
</script>
<script>
  // just for the demos, avoids form submit
  jQuery.validator.setDefaults({
    debug: true,
    success: "valid"
  });
  $("#add_expenses").validate({
    rules: {
      w_template_name: {
        required: true,
      },
      w_template_message: {
        required: true
      }
    },
    messages: {
      w_template_name: {
        required: "<div style='color:red'>Enter Template Name</div>",
      },
      w_template_message: {
        required: "<div style='color:red'>Please enter template Message</div>"
      }
    },
    submitHandler: function() {
      event.preventDefault();
      var formdata = $('#add_expenses').serialize();

      $.ajax({
        url: "<?php echo base_url(); ?>Account/Ajax_Expenses",
        type: "post",
        data: formdata,
        success: function(resp) {
          var data = $.parseJSON(resp);
          var ddd = data['all_record'].status;
          if (ddd == '1') {
          $('#msg_expenses').html(iziToast.success({
            title: 'Success',
            timeout: 2000,
            message: 'HI! This Record Inserted.',
            position: 'topRight'
          }));

          setTimeout(function() {
            location.reload();
          }, 2020);
        }else if(ddd == '2'){
          $('#msg_expenses').html(iziToast.success({
            title: 'success',
            timeout: 2000,
            message: 'HI! This Record Updated',
            position: 'topRight'
          }));

          setTimeout(function() {
            location.reload();
          }, 2020);
        }
         else if(ddd == '3'){
          $('#msg_expenses').html(iziToast.error({
            title: 'Canceled!',
            timeout: 2000,
            message: 'Someting Wrong!!',
            position: 'topRight'
          }));

          setTimeout(function() {
            location.reload();
          }, 2020);
        }
        }
      });
    }
  });

  function expenses_upd(expenses_id) {
    $.ajax({
      url: "<?php echo base_url(); ?>Account/get_record_expenses",
      type: "post",
      data: {
        'expenses_id': expenses_id
      },
      success: function(resp) {
        $(".expenses_form").modal();
        var data = $.parseJSON(resp);
        var expenses_id = data['single_record'].expenses_id;
        var pay_type = data['single_record'].pay_type;
        var payment_mode = data['single_record'].payment_mode;
        var bank_name = data['single_record'].bank_name;
        var bank_branch_name = data['single_record'].bank_branch_name;
        var transaction_no = data['single_record'].transaction_no;
        var transaction_date = data['single_record'].transaction_date;
        var cheque_no = data['single_record'].cheque_no;
        var cheque_date = data['single_record'].cheque_date;
        var cheque_status = data['single_record'].cheque_status;
        var cheque_holder_name = data['single_record'].cheque_holder_name;
        var paying_amount = data['single_record'].paying_amount;
        var pay_for = data['single_record'].pay_for;
        var branch_id = data['single_record'].branch_id;
        var info = data['single_record'].info;
        var expenses_category_id = data['single_record'].expenses_category_id;
        var expenses_subcategory_id = data['single_record'].expenses_subcategory_id;
        var pay_date = data['single_record'].pay_date;
        var paid_by = data['single_record'].paid_by;
        var comment = data['single_record'].comment;
        var admission_id = data['single_record'].admission_id;
        var gr_id = data['single_record'].gr_id;
        var fullname = data['single_record'].fullname;
        var course_id = data['single_record'].course_id;
        var package_id = data['single_record'].package_id;
        var college_courses_id = data['single_record'].college_courses_id;
        var type = data['single_record'].type;
        $('#expenses_id').val(expenses_id);
        if(pay_type=="Individual")
        {
          $(".pay-type-one").prop("checked", true);
        }
        else
        {
          $(".pay-type-two").prop("checked", true);
        }
        if(pay_for=="Other")
        {
          $(".pay-for-one").prop("checked", true);
        }
        else
        {
          $(".pay-for-two").prop("checked", true);
        }
        
        $('.payment-mode').val(payment_mode);
        $('.bank-name').val(bank_name);
        $('.bank-branch-name').val(bank_branch_name);
        $('.cheque-no').val(cheque_no);
        $('.cheque-date').val(cheque_date);
        $('.cheque-status').val(cheque_status);
        $('.cheque-holder-name').val(cheque_holder_name);
        $('.dd-bank-name').val(bank_name);
        $('.dd-bank-branch-name').val(bank_branch_name);
        $('.dd-cheque-no').val(cheque_no);
        $('.dd-cheque-date').val(cheque_date);
        $('.dd-cheque-status').val(cheque_status);
        $('.dd-cheque-holder-name').val(cheque_holder_name);
        $('.cradit-transaction-no').val(transaction_no);
        $('.cradit-transaction-date').val(transaction_date);
        $('.debit-transaction-no').val(transaction_no);
        $('.debit-transaction-date').val(transaction_date);
        $('.online-transaction-no').val(transaction_no);
        $('.online-transaction-date').val(transaction_date);
        $('.neft-transaction-no').val(transaction_no);
        $('.neft-transaction-date').val(transaction_date);
        $('.neft-bank-name').val(bank_name);
        $('.neft-bank-branch-name').val(bank_branch_name);
        $('.paytm-transaction-no').val(transaction_no);
        $('.paytm-transaction-date').val(transaction_date);
        $('.deposit-transaction-no').val(transaction_no);
        $('.deposit-transaction-date').val(transaction_date);
        $('.capital-float-transaction-no').val(transaction_no);
        $('.capital-float-transaction-date').val(transaction_date);
        $('.google-pay-transaction-no').val(transaction_no);
        $('.google-pay-transaction_date').val(transaction_date);
        $('.phone-pay-transaction-no').val(transaction_no);
        $('.phone-pay-transaction-date').val(transaction_date);
        $('.bajaj-finserv-transaction-no').val(transaction_no);
        $('.bajaj-finserv-transaction-date').val(transaction_date);
        $('.bhim-upi-transaction-no').val(transaction_no);
        $('.bhim-upi-transaction-date').val(transaction_date);
        $('.instamoj-transaction-no').val(transaction_no);
        $('.instamoj-transaction-date').val(transaction_date);
        $('.pay-pal-transaction-no').val(transaction_no);
        $('.pay-pal-transaction-date').val(transaction_date);
        $('.razorpay-transaction-no').val(transaction_no);
        $('.razorpay-transaction-date').val(transaction_date);
        $('#paying_amount').val(paying_amount);
        $('#branch_id').val(branch_id);
        $('#info').val(info);
        $('#paid_by').val(paid_by);
        $('#expenses_category_id').val(expenses_category_id);
        $('#expenses_subcategory_id').val(expenses_subcategory_id);
        $('#pay_date').val(pay_date);
        $('#comment').val(comment);
        $('#admissionids').val(admission_id);
        $('#grids').val(gr_id);
        $('#fullname').val(fullname);
        $('#ctype').val(type);

       if(type == "package") {
        var pa = data['single_record'].package_id;
        $('#allco').val(pa);
       } else if(type == "single") {
        var co = data['single_record'].course_id;
        $('#allco').val(co);
       } else {
        var clg = data['single_record'].college_courses_id;
        $('#allco').val(clg);
       }

       let payfor = data['single_record'].pay_for;
  
        if(payfor == 'Student'){
          $('.hideden-section').show();
        } else {
          $('.hideden-section').hide();
        }

        $('#submit').val('Update');
      }

    });
  }
</script>
<script type="text/javascript">
  $('#submiteded').on('click', function() {

    var category_name = $('#category_name').val();

    $.ajax({
      type: "POST",
      url: "<?php echo base_url() ?>Account/Ajax_Expenses_category",
      data: {
        'category_name': category_name
      },

      success: function(resp) {
        var data = $.parseJSON(resp);
        var ddd = data['all_record'].status;
        if (ddd == '1') {
          $('#msg_category').fadeIn();
          $('#msg_category').html(
            "<div class='alert alert-success'>HI! This Record Successfully Inserted</div>"
          );
          $('#msg_category').fadeOut(6000);
        } else if (ddd == '2') {
          $('#msg_category').fadeIn();
          $('#msg_category').html("Someting Wrong!!");
          $('#msg_category').fadeOut(6000);
        }
      }

    });

    return false;

  });


  $('#sumited').on('click', function() {

    var category_id = $('#category_id').val();
    var subcategory_name = $('#subcategory_name').val();

    $.ajax({
      type: "POST",
      url: "<?php echo base_url() ?>Account/Ajax_Expenses_subcategory",
      data: {
        'subcategory_name': subcategory_name,
        'category_id': category_id
      },

      success: function(resp) {
        var data = $.parseJSON(resp);
        var ddd = data['all_record'].status;
        if (ddd == '1') {
          $('#msg_subcategory').fadeIn();
          $('#msg_subcategory').html(
            "<div class='alert alert-success'>HI! This Record Successfully Inserted</div>"
          );
          $('#msg_subcategory').fadeOut(6000);
        } else if (ddd == '2') {
          $('#msg_subcategory').fadeIn();
          $('#msg_subcategory').html("Someting Wrong!!");
          $('#msg_subcategory').fadeOut(6000);
        }
      }

    });

    return false;

  });
</script>
<script>
  function selectinfo() {
    var paid_mode_id = $('#paid_mode_id').val();
    //alert(b_id);
    $.ajax({
      url: "<?php echo base_url(); ?>Account/fetch_bank_info",
      type: "post",
      data: {
        'paid_mode_id': paid_mode_id
      },
      success: function(data) {
        $('#bank_info_id').html(data);

      }
    });

  }

  function selectpayeelabel() {
    var expenses_category_id = $('#expenses_category_id').val();
    //alert(b_id);
    $.ajax({
      url: "<?php echo base_url(); ?>Account/fetch_expenses_subcate",
      type: "post",
      data: {
        'expenses_category_id': expenses_category_id
      },
      success: function(data) {
        $('#expenses_subcategory_id').html(data);

      }
    });

  }
</script>
<script>
  function check_selectedvalue() {
    var id = "";
    var items = document.getElementsByName('expenses_ids');
    for (var i = 0; i < items.length; i++) {
      if (items[i].type == 'checkbox') {
        if (items[i].checked) {
          if (id == "") {
            id = items[i].value;
          } else {
            id = id + "," + items[i].value;
          }
        }
      }
    }

    if (id != "") {
      $('#id').val(id);
      $('#deleted_expenses').modal("show").on('click', '#updateok', function(e) {

      });
    } else {
      alert("Please Select Row");
    }
  }
</script>
<script>  
  $('#status_deleted').on('click', function() {
    var expenses_id = [];

    $('input[name=expenses_ids]:checked').map(function() {
      expenses_id.push($(this).val());
    });
    var remarks = $('#remarks').val();

    $.ajax({
      type: "POST",
      url: "<?php echo base_url() ?>Account/deleted_status_expenses",
      data: {
        'expenses_id': expenses_id,
        'remarks': remarks
      },
      success: function(resp) {
        var data = $.parseJSON(resp);
        var ddd = data['all_record'].status;
        if (ddd == '1') {
          $('#deleted_status_msg').html(iziToast.success({
            title: 'Success',
            timeout: 2000,
            message: 'Deteted This Record.',
            position: 'topRight'
          }));

          setTimeout(function() {
            location.reload();
          }, 2020);
        } else {
          $('#deleted_status_msg').html(iziToast.error({
            title: 'Canceled!',
            timeout: 2000,
            message: 'Someting Wrong!!',
            position: 'topRight'
          }));

          setTimeout(function() {
            location.reload();
          }, 2020);
        }
      }
    });
    return false;
  });
</script>
<script>
$('#table2').DataTable({
            'stateSave': true
        })
</script>
<script>
function stu() {
 $('.hideden-section').show();
}

function stuhide() {
 $('.hideden-section').hide();
}
$('.hideden-section').hide();
</script>
<script>
$(document).ready(function(){
 function load_data(query)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>Account/Serchbygrid",
   method:"POST",
   data:{query:query},
   success:function(resp){
    var data = $.parseJSON(resp);
  
      var fullname2 = data['single_record'].surname + " " + data['single_record'].first_name + " " + data['single_record'].father_name;
       $('#fullname').val(fullname2);

       var admiid = data['single_record'].admission_id;
       $('#admissionids').val(admiid);

       var gid = data['single_record'].gr_id;
       $('#grids').val(gid);

       var cotype = data['single_record'].type;
       $('#ctype').val(cotype);

       let c = data['single_record'].type;
       if(c == "package") {
        var pa = data['single_record'].package_name;
        $('#allco').val(pa);
       } else if(c == "single") {
        var co = data['single_record'].course_name;
        $('#allco').val(co);
       } else {
        var clg = data['single_record'].college_course_name;
        $('#allco').val(clg);
       }
   }
  });
 }

 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});

$('.txtedit').focusout(function(){
  // Get edit id, field name and value
  var edit_id = $(this).data('id');
  var fieldname = $(this).data('field');
  var value = $(this).val();

  // assign instance to element variable
  var element = this;
  // alert(edit_id);
  // alert(fieldname);
  // alert(value);

  // Send AJAX request
  $.ajax({
    url: '<?= base_url() ?>Account/edit_fillable_data',
    type: 'post',
    data: { field:fieldname, value:value, id:edit_id },
    success:function(response){

      // Hide Input element
     // $(element).hide();

      // Update viewing value and display it
      $(element).prev('.edit').show();
      if(value != ''){
        $('#edited_ccomentmsg').html(iziToast.success({
          title: 'Success',
          timeout: 2500,
          message: 'Update success.',
          position: 'topRight'
          }));
      }
      else{
        $('#edited_ccomentmsg').html(iziToast.error({
          title: 'Canceled!',
          timeout: 2500,
          message: 'Nothing to Change!!',
          position: 'topRight'
          }));
      }
    }
  });
});
</script>
<script type="text/javascript">
$(function() {
   var start1=moment().subtract(1, 'days');
    var end1=moment();

    var start=""
    var end=""
    
    function cb(start, end) {
        $('#fromdate').val(start.format('YYYY-MM-DD'));
        $('#todate').val(end.format('YYYY-MM-DD'));
        $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
    }

    $('#reportrange').daterangepicker({
        startDate: start1,
        endDate: end1,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
</script>

  </body> 
</html>
