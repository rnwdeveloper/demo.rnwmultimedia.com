<?php
class PropertyController extends CI_Controller {
    function __construct() {
        @parent::__construct();
        $this->load->model("Dbcommon", "cm");
        $this->load->helper('urldata');
        $this->load->helper('loggs');
        date_default_timezone_set("Asia/Calcutta");
    }
    public function place() {
        logdata("Property Place page open");
        if (!empty($this->input->get('action')) && !empty($this->input->get('id'))) {
            $id = $this->input->get('id');
            if ($this->input->get('action') == "delete") {
                if ($this->input->get('status') == 0) {
                    $st['place_status'] = 1;
                } else {
                    $st['place_status'] = 0;
                }
                $re = $this->cm->update_data("place_type", $st, "place_type_id", $id);
                if ($re) {
                    logdata('place id= ' . $id . " Status update " . $st['place_status']);
                    redirect('PropertyController/place');
                }
            } else if ($this->input->get('action') == "edit") {
                $display['select_place'] = $this->cm->select_data("place_type", "place_type_id", $id);
            }
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            $ins['place_name'] = $data['place_name'];
            $ins['branch_id'] = $data['branch_id'];
            if (!empty($this->input->post('update_id'))) {
                $id = $this->input->post('update_id');
                $re = $this->cm->update_data("place_type", $ins, "place_type_id", $id);
                if (@$re) {
                    logdata('place id=' . $id . ' ' . $ins['place_name'] . " update");
                    redirect('PropertyController/place');
                }
            } else {
                logdata($ins['place_name'] . " Place add");
                $re = $this->cm->insert_data("place_type", $ins);
                if (@$re) {
                    redirect('PropertyController/place');
                }
            }
        }
        $display['all_place'] = $this->cm->view_all("place_type");
        $display['all_branch'] = $this->cm->view_all("branch");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('property/place', $display);
    }
    public function producttype() {
        logdata("Product type page open");
        if (!empty($this->input->get('action')) && !empty($this->input->get('id'))) {
            $id = $this->input->get('id');
            if ($this->input->get('action') == "delete") {
                if ($this->input->get('status') == 0) {
                    $st['product_status'] = 1;
                } else {
                    $st['product_status'] = 0;
                }
                $re = $this->cm->update_data("product_type", $st, "product_type_id", $id);
                if ($re) {
                    logdata('product type id= ' . $id . " Status update " . $st['product_status']);
                    redirect('PropertyController/producttype');
                }
            } else if ($this->input->get('action') == "edit") {
                $display['select_producttype'] = $this->cm->select_data("product_type", "product_type_id", $id);
            }
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            $ins['product_name'] = $data['product_name'];
            if (!empty($this->input->post('update_id'))) {
                $id = $this->input->post('update_id');
                $re = $this->cm->update_data("product_type", $ins, "product_type_id", $id);
                if (@$re) {
                    logdata('product type id=' . $id . ' ' . $ins['product_name'] . " update");
                    redirect('PropertyController/producttype');
                }
            } else {
                $re = $this->cm->insert_data("product_type", $ins);
                if (@$re) {
                    logdata($ins['product_name'] . " Product name add");
                    redirect('PropertyController/producttype');
                }
            }
        }
        $display['all_producttype'] = $this->cm->view_all("product_type");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('property/product_type', $display);
    }
    public function productlist() {
        date_default_timezone_set("Asia/Calcutta");
        if (!empty($this->input->get('action')) && !empty($this->input->get('id'))) {
            $id = $this->input->get('id');
            if ($this->input->get('action') == "delete") {
                if ($this->input->get('status') == 0) {
                    $st['product_status'] = 1;
                } else {
                    $st['product_status'] = 0;
                }
                $re = $this->cm->update_data("product", $st, "product_id", $id);
                if ($re) {
                    redirect('PropertyController/productlist');
                }
            } else if ($this->input->get('action') == "edit") {
                $display['select_place'] = $this->cm->select_data("product", "product_id", $id);
            } else if ($this->input->get('action') == 'delete_record') {
                $re = $this->cm->delete_data('product', 'product_id', $id);
                if ($re) {
                    redirect('PropertyController/productlist');
                }
            }
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            $ins['branch_id'] = $data['branch_id'];
            $ins['place_type_id'] = $data['place_type_id'];
            $ins['product_type_id'] = $data['product_type_id'];
            $ins['product_name'] = $data['product_name'];
            $ins['product_decription'] = $data['product_decription'];
            $ins['product_create_date'] = date('Y-m-d H:i:s');
            if (!empty($this->input->post('update_id'))) {
                $id = $this->input->post('update_id');
                $re = $this->cm->update_data("product", $ins, "product_id", $id);
                if (@$re) {
                    redirect('PropertyController/productlist');
                }
            } else {
                $re = $this->cm->insert_data("product", $ins);
                if (@$re) {
                    redirect('PropertyController/productlist');
                }
            }
        }
        $display['all_place'] = $this->cm->view_all("place_type");
        $display['all_branch'] = $this->cm->view_all("branch");
        $display['all_product_type'] = $this->cm->view_all("product_type");
        $display['all_product'] = $this->cm->view_all_desc("product", "product_id");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('property/product_list', $display);
    }
    public function branchWisePlace() {
        $id = $this->input->post('branch_id');
        $all_place = $this->cm->filter_data("place_type", "branch_id", $id);
        $all_branch = $this->cm->view_all("branch");
?>

		<label for="comment">Select Branch Place:</label>

    		 <select name="place_type_id" id="place_type_id" class="form-control" required>

                        <option value="">Select Place</option>



                        <?php foreach ($all_place as $val) { ?>

                            <option <?php if (@$select_place->place_type_id == $val->place_type_id) {
                echo "selected";
            } ?> value="<?php echo $val->place_type_id; ?>"><?php echo $val->place_name; ?> - <?php foreach ($all_branch as $row) {
                if ($row->branch_id == $val->branch_id) {
                    echo $row->branch_name;
                }
            } ?></option>

                        <?php
        } ?>



               </select>      

        <?php
    }
    public function addComplain() {
        if (!empty($this->input->post('submit'))) {
            $ins['user_name'] = $_SESSION['user_name'];
            $ins['product_id'] = $this->input->post('property_id');
            $ins['product_issue'] = $this->input->post('complain');
            $ins['product_issue_date'] = date('Y-m-d');
            $ins['enquiry_timestamp'] = date('Y-m-d H:i:s');
            $ins['kya'] = $this->input->post('kya');
            $ins['branch_id'] = $this->input->post('branch_id');
            $kya = $this->input->post('kya');;
            $re = $this->cm->insert_data("product_enquiry", $ins);
            if ($re) {
                //notificatio start
                $this->db->where('logtype', "Access Property");
                $this->db->limit(1);
                $query = $this->db->get('user')->result_array();
                foreach ($query as $row) {
                    $content = array("en" => $kya);
                    $fields = array('app_id' => "2d6d00f6-db0e-4691-9839-59df6b258864", 'included_segments' => array('All'), 'data' => array("foo" => "bar"), 'large_icon' => "ic_launcher_round.png", 'contents' => $content);
                    $fields = json_encode($fields);
                    // print("\nJSON sent:\n");
                    // print($fields);
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Authorization: Basic NWJlNDJjNjktY2JjNi00ZGZlLWJmY2YtODA3ZGNkNTU4NTNk'));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_HEADER, FALSE);
                    curl_setopt($ch, CURLOPT_POST, TRUE);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    //     return $response;
                    // $response = sendMessage();
                    // $return["allresponses"] = $response;
                    // $return = json_encode( $return);
                    // print("\n\nJSON received:\n");
                    // print($return);
                    // print("\n");
                    
                }
                //end
                $display['msg'] = "Complain Submit Successfully";
            }
        }
        $display['all_place'] = $this->cm->view_all("place_type");
        $display['all_branch'] = $this->cm->view_all("branch");
        $display['all_product_type'] = $this->cm->view_all("product_type");
        $display['all_product'] = $this->cm->view_all_desc("product", "product_id");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('property/add_complain', $display);
    }
    public function selectProperty() {
        @$branch_ids = explode(",", $_SESSION['branch_ids']);
        $branch_id = $this->input->post('branch_id');
        $place_type_id = $this->input->post('place_type_id');
        $product_type_id = $this->input->post('product_type_id');
        $branch = $this->cm->select_data("branch", "branch_id", $branch_id);
        $place = $this->cm->select_data("place_type", "place_type_id", $place_type_id);
        $type = $this->cm->select_data("product_type", "product_type_id", $product_type_id);
        $propy = $this->cm->select_property($branch_id, $place_type_id, $product_type_id);
?>



			 <!-- Modal -->

  <div class="modal fade" id="myModalp" role="dialog">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title"><?php echo $branch->branch_name . " -> " . $place->place_name . " -> " . $type->product_name; ?></h4>

        </div>

        <div class="modal-body">

         	<table class="table table-bordered">

			    <thead>

			      <tr>

			        <th>Propery Name</th>

			        <th>Propery Description</th>

			        <th>Add Complain</th>

			      </tr>

			    </thead>

			    <tbody>

			    	<?php foreach ($propy as $pp) {
            if ($pp->product_status == 0) { ?>			    		

			      <tr>

			        <td><?php echo $pp->product_name; ?></td>

			        <td><?php echo $pp->product_decription; ?></td>



			        

			       

			        <td>

			        

			       <form method="post" class="form-inline" action="<?php echo base_url(); ?>PropertyController/addComplain">

			       		<input type="hidden" name="kya" value="<?php echo $branch->branch_name . " -> " . $place->place_name . " -> " . $type->product_name . " -> " . $pp->product_name; ?>">

			        	<input type="hidden" name="property_id" value="<?php echo $pp->product_id; ?>">

			        	<input type="hidden" name="branch_id" value="<?php echo $pp->branch_id; ?>">



			        	 <div class="form-group">

						   <textarea class="form-control" rows="2" cols="40" name="complain"></textarea>

			        	<input type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary" /> 

						  </div>

			        	



			         </form>

			         	

			        </td>



			      </tr>

			     

			    <?php
            }
        } ?>

			    </tbody>

			  </table>

        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>

      </div>

    </div>

  </div>



		<?php
    }
    public function viewComplain() {
        logdata("View Complain Page open");
        $display['all_place'] = $this->cm->view_all("place_type");
        $display['all_branch'] = $this->cm->view_all("branch");
        $display['all_product_type'] = $this->cm->view_all("product_type");
        $display['all_product_enquiry'] = $this->cm->view_all_desc("product_enquiry", "product_enquiry_id");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('property/view_complain', $display);
    }
    public function scomplain($product_enquiry_id) {
        $complain = $this->cm->select_data("product_enquiry", "product_enquiry_id", $product_enquiry_id);
        if (empty($complain->show_date) && $_SESSION['logtype'] == "Access Property") {
            $upd['show_date'] = date('Y-m-d H:i:s');
            $upd['enquiry_show'] = 1;
            $this->cm->update_data("product_enquiry", $upd, "product_enquiry_id", $product_enquiry_id);
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            if (!empty($data['cdate'])) {
                $upd['commit_date'] = $data['cdate'];
            }
            $upd['enquiry_status'] = $data['status'];
            if ($upd['enquiry_status'] == 1) {
                $upd['processing_date'] = date('Y-m-d H:i:s');
            }
            if ($upd['enquiry_status'] == 2) {
                $upd['completed_date'] = date('Y-m-d');
            }
            $re = $this->cm->update_data("product_enquiry", $upd, "product_enquiry_id", $product_enquiry_id);
            if ($re) {
                redirect('PropertyController/scomplain/' . $product_enquiry_id);
            }
        }
        if (!empty($this->input->post('send'))) {
            $ins['sender_name'] = $_SESSION['user_name'];
            $ins['complain_id'] = $product_enquiry_id;
            $ins['msg_timestamp'] = date('Y-m-d H:i:s');
            $ins['comment'] = $this->input->post('message');
            $re = $this->cm->insert_data("product_issue_communication", $ins);
            if (@$re) {
                redirect('PropertyController/scomplain/' . $product_enquiry_id);
            }
        }
        $display['all_product_enquiry'] = $this->cm->view_all_desc("product_enquiry", "product_enquiry_id");
        $display['conversion'] = $this->cm->select_all_conversion($product_enquiry_id);
        $display['select_complain'] = $this->cm->select_data("product_enquiry", "product_enquiry_id", $product_enquiry_id);
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('property/scomplain', $display);
    }
    ///custome changes
    public function addcomplain_new() {
        logdata('Add complain page open');
        $display['all_place'] = $this->cm->view_all("place_type");
        $display['all_branch'] = $this->cm->view_all("branch");
        $display['all_product_type'] = $this->cm->view_all("product_type");
        $display['all_product'] = $this->cm->view_all_desc("product", "product_id");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('property/addcomplain_new', $display);
        if (!empty($this->input->post('submit'))) {
            $ins['user_name'] = $_SESSION['user_name'];
            $ins['product_id'] = $this->input->post('list_property');
            $ins['product_issue'] = $this->input->post('complain');
            $ins['product_issue_date'] = date('Y-m-d');
            $ins['enquiry_timestamp'] = date('Y-m-d H:i:s');
            $ins['branch_id'] = $this->input->post('branch_id');
            //   print_r($ins);
            // die();
            $select_branch = $this->cm->select_data("branch", "branch_id", $ins['branch_id']);
            $select_place = $this->cm->select_data("place_type", "place_type_id", $this->input->post('place_type_id'));
            $select_product_type = $this->cm->select_data("product_type", "product_type_id", $this->input->post('product_type_id'));
            $select_product = $this->cm->select_data("product", "product_id", $this->input->post('list_property'));
            $ins['kya'] = $select_branch->branch_name . " -> " . $select_place->place_name . " -> " . $select_product_type->product_name . " -> " . $select_product->product_name;
            $re = $this->cm->insert_data("product_enquiry", $ins);
            if ($re) {
                $display['msg'] = "Complain Submit Successfully";
                //notificatio start by riddhi borda
                $kya = $select_branch->branch_name . " -> " . $select_place->place_name . " -> " . $select_product_type->product_name . " -> " . $select_product->product_name;
                $this->db->where('logtype', "Access Property");
                $this->db->limit(1);
                $query = $this->db->get('user')->result_array();
                foreach ($query as $row) {
                    $content = array("en" => $kya);
                    $fields = array('app_id' => "2d6d00f6-db0e-4691-9839-59df6b258864", 'included_segments' => array('All'), 'data' => array("foo" => "bar"), 'large_icon' => "ic_launcher_round.png", 'contents' => $content);
                    $fields = json_encode($fields);
                    // print("\nJSON sent:\n");
                    // print($fields);
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Authorization: Basic NWJlNDJjNjktY2JjNi00ZGZlLWJmY2YtODA3ZGNkNTU4NTNk'));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_HEADER, FALSE);
                    curl_setopt($ch, CURLOPT_POST, TRUE);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                    $response = curl_exec($ch);
                    curl_close($ch);
                    //     return $response;
                    // $response = sendMessage();
                    // $return["allresponses"] = $response;
                    // $return = json_encode( $return);
                    // print("\n\nJSON received:\n");
                    // print($return);
                    // print("\n");
                    
                }
                //end by riddhi borda
                
            }
        }
    }
    public function demo_data() {
        $id = $this->input->post('d_id');
        $data = $this->cm->select_data('product', 'product_id', $id);
        echo $data->product_decription;
    }
    public function productWise() {
        $id = $this->input->post('product_type_id');
        $branch_id = $this->input->post('branch_id');
        $place_id = $this->input->post('place_id');
        echo $list_property = $this->cm->get_list_of_property("product", $id, $branch_id, $place_id);
    }
    // public function complainn()
    // {
    //    $complain = $this->input->post('complain');
    // 		$data = array(
    // 		'complain' =>$complain
    // 	);
    // 	$this->cm->insert_data_addcomplain_new($data);
    // 	//redirect('PropertyController/addcomplain_new');
    // }
    
}
?>