<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ApiController extends CI_Controller {
    function __construct() {
        @parent::__construct();
        // $this->load->model("Dbcommon","cm");
        // $this->load->model("EnquiryModal","enq");
        // $this->load->model("Task","tm");
        // $all_demo_list = $this->cm->view_all_cngs("demo");
        // date_default_timezone_set("Asia/Calcutta");
        // $cdate = date('Y-m-d');
        
    }
    public function login() {
        // $all = $this->input->post('email');
        // echo json_encode($all);
        // exit;
        $msgs['msg'] = "";
        if (!empty($this->input->post('email')) && !empty($this->input->post('password'))) {
            $check_admin = $this->db->query("SELECT * FROM admin WHERE email='" . $this->input->post('email') . "' AND password='" . $this->input->post('password') . "'")->row_array();
            $check_user = $this->db->query("SELECT * FROM user WHERE email='" . $this->input->post('email') . "' AND password='" . $this->input->post('password') . "'")->row_array();
            $check_faculty = $this->db->query("SELECT * FROM faculty WHERE email='" . $this->input->post('email') . "' AND password='" . $this->input->post('password') . "'")->row_array();
            $check_hod = $this->db->query("SELECT * FROM hod WHERE email='" . $this->input->post('email') . "' AND password='" . $this->input->post('password') . "'")->row_array();
            $check_ip = $this->db->query("SELECT * FROM network_ip")->result();
            if (!empty($check_admin['email']) && !empty($check_admin['password'])) {
                if (@$check_admin['logtype'] == 'Super Admin') {
                    $admin_id = 0;
                } else {
                    $admin_id = $check_admin['id'];
                }
                $this->session->set_userdata("domain", "admin");
                $this->session->set_userdata("user_id", $check_admin['id']);
                $this->session->set_userdata("admin_id", $admin_id);
                $this->session->set_userdata("user_name", $check_admin['name']);
                $this->session->set_userdata("user_email", $check_admin['email']);
                $this->session->set_userdata("user_image", $check_admin['image']);
                $this->session->set_userdata("user_last_seen", $check_admin['timestamp']);
                $this->session->set_userdata("logtype", $check_admin['logtype']);
                $this->session->set_userdata("designation", $check_admin['designation']);
                $this->session->set_userdata("personal_no", $check_admin['personal_no']);
                $userdata = ['id' => $check_admin['id'], 'admin_id' => $admin_id, 'username' => $check_admin['name'], 'email' => $check_admin['email'], 'name' => $check_admin['name'], 'role' => $check_admin['logtype'], 'last_logged' => $check_admin['lastlogged'], 'created' => $check_admin['created'], 'logged_in' => 'TRUE'];
                $this->session->set_userdata('Admin', $userdata);
                $gdata = $this->db->query("SELECT * FROM task_group_member")->result();
                foreach ($gdata as $key => $value) {
                    if ($value->member_account_id == $check_admin['id'] && $value->member_role == "Super Admin") {
                        $uid = $value->member_id;
                        if (!empty($uid)) {
                            $lldata['user_id'] = $uid;
                            // $mm = $this->tm->seat_insert_data("login_details",$lldata);
                            //$_SESSION['login_detail_id'] = $mm;
                            
                        }
                    }
                }
                $api_userdata = array('login_data' => $userdata, 'status' => 1, 'msg' => "successfully Login");
                // redirect('welcome');
                
            } else if (!empty($check_hod['email']) && !empty($check_hod['password'])) {
                // echo "<pre>";
                // print_r($check_hod);
                // die;
                $brans = $this->db->query("SELECT * FROM branch")->result();
                $courses = $this->db->query("SELECT * FROM course")->result();
                $packages = $this->db->query("SELECT * FROM package")->result();
                $b_ids = explode(",", $check_hod['branch_ids']);
                @$c_ids = explode(",", @$check_hod['course_ids']);
                @$p_ids = explode(",", @$check_hod['package_ids']);
                $b_name = "";
                for ($i = 0;$i < sizeof($b_ids);$i++) {
                    foreach ($brans as $val) {
                        if ($val->branch_id == $b_ids[$i]) {
                            if ($b_name == "") {
                                $b_name = $val->branch_name;
                            } else {
                                $b_name = $b_name . "," . $val->branch_name;
                            }
                        }
                    }
                }
                $c_name = "";
                foreach ($courses as $val1) {
                    if (in_array($val1->course_id, $c_ids)) {
                        if ($c_name == "") {
                            $c_name = $val1->course_name;
                        } else {
                            $c_name = $c_name . "," . $val1->course_name;
                        }
                    }
                }
                $p_name = "";
                foreach ($packages as $val2) {
                    if (in_array($val2->package_id, $p_ids)) {
                        if ($p_name == "") {
                            $p_name = $val2->package_name;
                        } else {
                            $p_name = $p_name . "," . $val2->package_name;
                        }
                    }
                }
                $brns = explode(",", $check_hod['branch_ids']);
                $valid_ip = true;
                foreach ($check_ip as $ip) {
                    if (in_array($ip->branch_id, $brns) && $ip->address_ip == $this->input->post('my_ip')) {
                        $valid_ip = true;
                    }
                }
                if ($valid_ip == true) {
                    // echo "<pre>";
                    // print_r($check_hod);
                    // die;
                    $this->session->set_userdata("domain", "admin");
                    $this->session->set_userdata("user_id", $check_hod['hod_id']);
                    $this->session->set_userdata("admin_id", $check_hod['admin_id']);
                    $this->session->set_userdata("logtype", $check_hod['logtype']);
                    $this->session->set_userdata("branch_ids", $check_hod['branch_ids']);
                    $this->session->set_userdata("department_id", $check_hod['department_ids']);
                    $this->session->set_userdata("subdepartment_id", $check_hod['subdepartment_id']);
                    $this->session->set_userdata("faculty_id", $check_hod['faculty_id']);
                    $this->session->set_userdata("course_ids", $c_name);
                    $this->session->set_userdata("package_ids", $p_name);
                    $this->session->set_userdata("user_name", $check_hod['name']);
                    $this->session->set_userdata("user_email", $check_hod['email']);
                    $this->session->set_userdata("user_image", $check_hod['image']);
                    $this->session->set_userdata("user_permission", $check_hod['permission']);
                    $this->session->set_userdata("user_last_seen", $check_hod['timestamp']);
                    $this->session->set_userdata("designation", $check_hod['designation']);
                    $this->session->set_userdata("personal_no", $check_hod['personal_no']);
                    $userdata = ['id' => $check_hod['hod_id'], 'admin_id' => $check_hod['admin_id'], 'username' => $check_hod['name'], 'email' => $check_hod['email'], 'name' => $check_hod['name'], 'role' => $check_hod['logtype'], 'last_logged' => $check_hod['lastlogged'], 'created' => $check_hod['created'], 'logged_in' => 'TRUE'];
                    $this->session->set_userdata('Admin', $userdata);
                    //return $this->load->view('test');
                    $gdata = $this->db->query("SELECT * FROM task_group_member")->result();
                    foreach ($gdata as $key => $value) {
                        if ($value->member_account_id == $check_hod['hod_id'] && $value->member_role == "HOD") {
                            $uid = $value->member_id;
                            if (!empty($uid)) {
                                $lldata['user_id'] = $uid;
                                // $mm = $this->tm->seat_insert_data("login_details",$lldata);
                                //$_SESSION['login_detail_id'] = $mm;
                                
                            }
                        }
                    }
                    $api_userdata = array('login_data' => $userdata, 'status' => 1, 'msg' => "successfully Login");
                    // redirect('welcome');
                    
                }
            } else if (!empty($check_user['email']) && !empty($check_user['password'])) {
                $brns = explode(",", $check_user['branch_ids']);
                $valid_ip = true;
                foreach ($check_ip as $ip) {
                    if (in_array($ip->branch_id, $brns) && $ip->address_ip == $this->input->post('my_ip')) {
                        $valid_ip = true;
                    }
                }
                if ($valid_ip == true) {
                    $this->session->set_userdata("domain", "admin");
                    $this->session->set_userdata("user_id", $check_user['user_id']);
                    if ($check_user['logtype'] == "Admin") {
                        $this->session->set_userdata("admin_id", $check_user['user_id']);
                    } else {
                        $this->session->set_userdata("admin_id", $check_user['admin_id']);
                    }
                    $this->session->set_userdata("logtype", $check_user['logtype']);
                    $this->session->set_userdata("branch_ids", $check_user['branch_ids']);
                    $this->session->set_userdata("department_id", $check_user['department_ids']);
                    $this->session->set_userdata("user_name", $check_user['name']);
                    $this->session->set_userdata("user_email", $check_user['email']);
                    $this->session->set_userdata("user_image", $check_user['image']);
                    $this->session->set_userdata("user_permission", $check_user['permission']);
                    $this->session->set_userdata("user_last_seen", $check_user['timestamp']);
                    $this->session->set_userdata("designation", $check_user['designation']);
                    $this->session->set_userdata("personal_no", $check_user['personal_no']);
                    $userdata = ['id' => $check_user['user_id'], 'admin_id' => $check_user['admin_id'], 'username' => $check_user['name'], 'email' => $check_user['email'], 'name' => $check_user['name'], 'role' => $check_user['logtype'], 'last_logged' => $check_user['lastlogged'], 'created' => $check_user['created'], 'logged_in' => 'TRUE'];
                    $this->session->set_userdata('Admin', $userdata);
                    $gdata = $this->db->query("SELECT * FROM task_group_member")->result();
                    foreach ($gdata as $key => $value) {
                        if ($value->member_account_id == $check_user['user_id'] && $value->member_role != "HOD" && $value->member_role != "Faculty" && $value->member_role != "Super Admin") {
                            $uid = $value->member_id;
                            if (!empty($uid)) {
                                $lldata['user_id'] = $uid;
                                // $mm = $this->tm->seat_insert_data("login_details",$lldata);
                                // $_SESSION['login_detail_id'] = $mm;
                                
                            }
                        }
                    }
                    $api_userdata = array('login_data' => $userdata, 'status' => 1, 'msg' => "successfully Login");
                    // redirect('welcome');
                    
                } else {
                    $msgs['msg'] = "you are not authorized to access. because your ip address doesn't match";
                }
            } else if (!empty($check_faculty['email']) && !empty($check_faculty['password'])) {
                $brans = $this->db->query("SELECT * FROM branch")->result();
                $courses = $this->db->query("SELECT * FROM course")->result();
                $packages = $this->db->query("SELECT * FROM package")->result();
                $b_ids = explode(",", $check_faculty['branch_ids']);
                @$c_ids = explode(",", @$check_faculty['course_ids']);
                @$p_ids = explode(",", @$check_faculty['package_ids']);
                $b_name = "";
                for ($i = 0;$i < sizeof($b_ids);$i++) {
                    foreach ($brans as $val) {
                        if ($val->branch_id == $b_ids[$i]) {
                            if ($b_name == "") {
                                $b_name = $val->branch_name;
                            } else {
                                $b_name = $b_name . "," . $val->branch_name;
                            }
                        }
                    }
                }
                $c_name = "";
                foreach ($courses as $val1) {
                    if (in_array($val1->course_id, $c_ids)) {
                        if ($c_name == "") {
                            $c_name = $val1->course_name;
                        } else {
                            $c_name = $c_name . "," . $val1->course_name;
                        }
                    }
                }
                $p_name = "";
                foreach ($packages as $val2) {
                    if (in_array($val2->package_id, $p_ids)) {
                        if ($p_name == "") {
                            $p_name = $val2->package_name;
                        } else {
                            $p_name = $p_name . "," . $val2->package_name;
                        }
                    }
                }
                $brns = explode(",", $check_faculty['branch_ids']);
                $valid_ip = true;
                foreach ($check_ip as $ip) {
                    if (in_array($ip->branch_id, $brns) && $ip->address_ip == $this->input->post('my_ip')) {
                        $valid_ip = true;
                    }
                }
                if ($valid_ip == true) {
                    $this->session->set_userdata("domain", "admin");
                    $this->session->set_userdata("user_id", $check_faculty['faculty_id']);
                    $this->session->set_userdata("admin_id", $check_faculty['admin_id']);
                    $this->session->set_userdata("user_name", $check_faculty['name']);
                    $this->session->set_userdata("user_email", $check_faculty['email']);
                    $this->session->set_userdata("logtype", $check_faculty['logtype']);
                    $this->session->set_userdata("branch_ids", $check_faculty['branch_ids']);
                    $this->session->set_userdata("course_ids", $c_name);
                    $this->session->set_userdata("package_ids", $p_name);
                    $this->session->set_userdata("branch_name", $b_name);
                    $this->session->set_userdata("department_id", $check_faculty['department_id']);
                    $this->session->set_userdata("subdepartment_id", $check_faculty['subdepartment_id']);
                    $this->session->set_userdata("hod_ids", $check_faculty['hod_ids']);
                    $this->session->set_userdata("user_last_seen", $check_faculty['timestamp']);
                    $this->session->set_userdata("user_image", $check_faculty['image']);
                    $this->session->set_userdata("user_permission", $check_faculty['permission']);
                    $this->session->set_userdata("designation", $check_faculty['designation']);
                    $this->session->set_userdata("personal_no", $check_faculty['personal_no']);
                    $userdata = ['id' => $check_faculty['faculty_id'], 'admin_id' => $check_faculty['admin_id'], 'username' => $check_faculty['name'], 'email' => $check_faculty['email'], 'name' => $check_faculty['name'], 'role' => $check_faculty['logtype'], 'last_logged' => $check_faculty['lastlogged'], 'created' => $check_faculty['created'], 'logged_in' => 'TRUE'];
                    $this->session->set_userdata('Admin', $userdata);
                    $gdata = $this->db->query("SELECT * FROM task_group_member")->result();
                    foreach ($gdata as $key => $value) {
                        if ($value->member_account_id == $check_faculty['faculty_id'] && $value->member_role == "Faculty") {
                            $uid = $value->member_id;
                            if (!empty($uid)) {
                                $lldata['user_id'] = $uid;
                                //$mm = $this->tm->seat_insert_data("login_details",$lldata);
                                //$_SESSION['login_detail_id'] = $mm;
                                
                            }
                        }
                    }
                    $api_userdata = array('login_data' => $userdata, 'status' => 1, 'msg' => "successfully Login");
                    // redirect('welcome');
                    
                } else {
                    $msgs = "you are not authorized to access. because your ip address doesn't match";
                }
            } else {
                $msgs = "Invalid Email or Password";
            }
        }
        if (!empty($api_userdata['login_data']['role'])) {
            $logtype = $api_userdata['login_data']['role'];
            // exit;
            if ($logtype == 'Super Admin') {
                $pall = explode(',', $check_admin['m_permission']);
            } else if ($logtype == 'Faculty') {
                $pall = explode(',', $check_faculty['m_permission']);
            } else if ($logtype == 'hod') {
                $pall = explode(',', $check_hod['m_permission']);
            } else {
                $pall = explode(',', $check_user['m_permission']);
            }
            $data['status'] = 1;
            $data['Lead'] = 0;
            foreach ($pall as $key => $value) {
                if ($value == "Lead") {
                    $data['Lead'] = 1;
                }
            }
            echo json_encode($data);
            exit;
        }
        if (!empty($api_userdata)) {
            echo json_encode($api_userdata);
        } else {
            $hello['status'] = 0;
            echo json_encode($hello);
        }
        // $this->load->view('login',$msgs);
        
    }
    public function first_mod() {
        $msgs['msg'] = "";
        if (!empty($this->input->post('email'))) {
            $check_admin = $this->db->query("SELECT * FROM admin WHERE email='" . $this->input->post('email') . "' ")->row_array();
            $check_user = $this->db->query("SELECT * FROM user WHERE email='" . $this->input->post('email') . "' ")->row_array();
            $check_faculty = $this->db->query("SELECT * FROM faculty WHERE email='" . $this->input->post('email') . "' ")->row_array();
            $check_hod = $this->db->query("SELECT * FROM hod WHERE email='" . $this->input->post('email') . "' ")->row_array();
            $check_ip = $this->db->query("SELECT * FROM network_ip")->result();
            if (!empty($check_admin['email'])) {
                if (@$check_admin['logtype'] == 'Super Admin') {
                    $admin_id = 0;
                } else {
                    $admin_id = $check_admin['id'];
                }
                $this->session->set_userdata("domain", "admin");
                $this->session->set_userdata("user_id", $check_admin['id']);
                $this->session->set_userdata("admin_id", $admin_id);
                $this->session->set_userdata("user_name", $check_admin['name']);
                $this->session->set_userdata("user_email", $check_admin['email']);
                $this->session->set_userdata("user_image", $check_admin['image']);
                $this->session->set_userdata("user_last_seen", $check_admin['timestamp']);
                $this->session->set_userdata("logtype", $check_admin['logtype']);
                $this->session->set_userdata("designation", $check_admin['designation']);
                $this->session->set_userdata("personal_no", $check_admin['personal_no']);
                $userdata = ['id' => $check_admin['id'], 'admin_id' => $admin_id, 'username' => $check_admin['name'], 'email' => $check_admin['email'], 'name' => $check_admin['name'], 'role' => $check_admin['logtype'], 'last_logged' => $check_admin['lastlogged'], 'created' => $check_admin['created'], 'logged_in' => 'TRUE'];
                $this->session->set_userdata('Admin', $userdata);
                $gdata = $this->db->query("SELECT * FROM task_group_member")->result();
                foreach ($gdata as $key => $value) {
                    if ($value->member_account_id == $check_admin['id'] && $value->member_role == "Super Admin") {
                        $uid = $value->member_id;
                        if (!empty($uid)) {
                            $lldata['user_id'] = $uid;
                            // $mm = $this->tm->seat_insert_data("login_details",$lldata);
                            //$_SESSION['login_detail_id'] = $mm;
                            
                        }
                    }
                }
                $api_userdata = array('login_data' => $userdata, 'status' => 1, 'msg' => "successfully Login");
                // redirect('welcome');
                
            } else if (!empty($check_hod['email'])) {
                // echo "<pre>";
                // print_r($check_hod);
                // die;
                $brans = $this->db->query("SELECT * FROM branch")->result();
                $courses = $this->db->query("SELECT * FROM course")->result();
                $packages = $this->db->query("SELECT * FROM package")->result();
                $b_ids = explode(",", $check_hod['branch_ids']);
                @$c_ids = explode(",", @$check_hod['course_ids']);
                @$p_ids = explode(",", @$check_hod['package_ids']);
                $b_name = "";
                for ($i = 0;$i < sizeof($b_ids);$i++) {
                    foreach ($brans as $val) {
                        if ($val->branch_id == $b_ids[$i]) {
                            if ($b_name == "") {
                                $b_name = $val->branch_name;
                            } else {
                                $b_name = $b_name . "," . $val->branch_name;
                            }
                        }
                    }
                }
                $c_name = "";
                foreach ($courses as $val1) {
                    if (in_array($val1->course_id, $c_ids)) {
                        if ($c_name == "") {
                            $c_name = $val1->course_name;
                        } else {
                            $c_name = $c_name . "," . $val1->course_name;
                        }
                    }
                }
                $p_name = "";
                foreach ($packages as $val2) {
                    if (in_array($val2->package_id, $p_ids)) {
                        if ($p_name == "") {
                            $p_name = $val2->package_name;
                        } else {
                            $p_name = $p_name . "," . $val2->package_name;
                        }
                    }
                }
                $brns = explode(",", $check_hod['branch_ids']);
                $valid_ip = true;
                foreach ($check_ip as $ip) {
                    if (in_array($ip->branch_id, $brns) && $ip->address_ip == $this->input->post('my_ip')) {
                        $valid_ip = true;
                    }
                }
                if ($valid_ip == true) {
                    // echo "<pre>";
                    // print_r($check_hod);
                    // die;
                    $this->session->set_userdata("domain", "admin");
                    $this->session->set_userdata("user_id", $check_hod['hod_id']);
                    $this->session->set_userdata("admin_id", $check_hod['admin_id']);
                    $this->session->set_userdata("logtype", $check_hod['logtype']);
                    $this->session->set_userdata("branch_ids", $check_hod['branch_ids']);
                    $this->session->set_userdata("department_id", $check_hod['department_ids']);
                    $this->session->set_userdata("subdepartment_id", $check_hod['subdepartment_id']);
                    $this->session->set_userdata("faculty_id", $check_hod['faculty_id']);
                    $this->session->set_userdata("course_ids", $c_name);
                    $this->session->set_userdata("package_ids", $p_name);
                    $this->session->set_userdata("user_name", $check_hod['name']);
                    $this->session->set_userdata("user_email", $check_hod['email']);
                    $this->session->set_userdata("user_image", $check_hod['image']);
                    $this->session->set_userdata("user_permission", $check_hod['permission']);
                    $this->session->set_userdata("user_last_seen", $check_hod['timestamp']);
                    $this->session->set_userdata("designation", $check_hod['designation']);
                    $this->session->set_userdata("personal_no", $check_hod['personal_no']);
                    $userdata = ['id' => $check_hod['hod_id'], 'admin_id' => $check_hod['admin_id'], 'username' => $check_hod['name'], 'email' => $check_hod['email'], 'name' => $check_hod['name'], 'role' => $check_hod['logtype'], 'last_logged' => $check_hod['lastlogged'], 'created' => $check_hod['created'], 'logged_in' => 'TRUE'];
                    $this->session->set_userdata('Admin', $userdata);
                    //return $this->load->view('test');
                    $gdata = $this->db->query("SELECT * FROM task_group_member")->result();
                    foreach ($gdata as $key => $value) {
                        if ($value->member_account_id == $check_hod['hod_id'] && $value->member_role == "HOD") {
                            $uid = $value->member_id;
                            if (!empty($uid)) {
                                $lldata['user_id'] = $uid;
                                // $mm = $this->tm->seat_insert_data("login_details",$lldata);
                                //$_SESSION['login_detail_id'] = $mm;
                                
                            }
                        }
                    }
                    $api_userdata = array('login_data' => $userdata, 'status' => 1, 'msg' => "successfully Login");
                    // redirect('welcome');
                    
                }
            } else if (!empty($check_user['email'])) {
                $brns = explode(",", $check_user['branch_ids']);
                $valid_ip = true;
                foreach ($check_ip as $ip) {
                    if (in_array($ip->branch_id, $brns) && $ip->address_ip == $this->input->post('my_ip')) {
                        $valid_ip = true;
                    }
                }
                if ($valid_ip == true) {
                    $this->session->set_userdata("domain", "admin");
                    $this->session->set_userdata("user_id", $check_user['user_id']);
                    if ($check_user['logtype'] == "Admin") {
                        $this->session->set_userdata("admin_id", $check_user['user_id']);
                    } else {
                        $this->session->set_userdata("admin_id", $check_user['admin_id']);
                    }
                    $this->session->set_userdata("logtype", $check_user['logtype']);
                    $this->session->set_userdata("branch_ids", $check_user['branch_ids']);
                    $this->session->set_userdata("department_id", $check_user['department_ids']);
                    $this->session->set_userdata("user_name", $check_user['name']);
                    $this->session->set_userdata("user_email", $check_user['email']);
                    $this->session->set_userdata("user_image", $check_user['image']);
                    $this->session->set_userdata("user_permission", $check_user['permission']);
                    $this->session->set_userdata("user_last_seen", $check_user['timestamp']);
                    $this->session->set_userdata("designation", $check_user['designation']);
                    $this->session->set_userdata("personal_no", $check_user['personal_no']);
                    $userdata = ['id' => $check_user['user_id'], 'admin_id' => $check_user['admin_id'], 'username' => $check_user['name'], 'email' => $check_user['email'], 'name' => $check_user['name'], 'role' => $check_user['logtype'], 'last_logged' => $check_user['lastlogged'], 'created' => $check_user['created'], 'logged_in' => 'TRUE'];
                    $this->session->set_userdata('Admin', $userdata);
                    $gdata = $this->db->query("SELECT * FROM task_group_member")->result();
                    foreach ($gdata as $key => $value) {
                        if ($value->member_account_id == $check_user['user_id'] && $value->member_role != "HOD" && $value->member_role != "Faculty" && $value->member_role != "Super Admin") {
                            $uid = $value->member_id;
                            if (!empty($uid)) {
                                $lldata['user_id'] = $uid;
                                // $mm = $this->tm->seat_insert_data("login_details",$lldata);
                                // $_SESSION['login_detail_id'] = $mm;
                                
                            }
                        }
                    }
                    $api_userdata = array('login_data' => $userdata, 'status' => 1, 'msg' => "successfully Login");
                    // redirect('welcome');
                    
                } else {
                    $msgs['msg'] = "you are not authorized to access. because your ip address doesn't match";
                }
            } else if (!empty($check_faculty['email'])) {
                $brans = $this->db->query("SELECT * FROM branch")->result();
                $courses = $this->db->query("SELECT * FROM course")->result();
                $packages = $this->db->query("SELECT * FROM package")->result();
                $b_ids = explode(",", $check_faculty['branch_ids']);
                @$c_ids = explode(",", @$check_faculty['course_ids']);
                @$p_ids = explode(",", @$check_faculty['package_ids']);
                $b_name = "";
                for ($i = 0;$i < sizeof($b_ids);$i++) {
                    foreach ($brans as $val) {
                        if ($val->branch_id == $b_ids[$i]) {
                            if ($b_name == "") {
                                $b_name = $val->branch_name;
                            } else {
                                $b_name = $b_name . "," . $val->branch_name;
                            }
                        }
                    }
                }
                $c_name = "";
                foreach ($courses as $val1) {
                    if (in_array($val1->course_id, $c_ids)) {
                        if ($c_name == "") {
                            $c_name = $val1->course_name;
                        } else {
                            $c_name = $c_name . "," . $val1->course_name;
                        }
                    }
                }
                $p_name = "";
                foreach ($packages as $val2) {
                    if (in_array($val2->package_id, $p_ids)) {
                        if ($p_name == "") {
                            $p_name = $val2->package_name;
                        } else {
                            $p_name = $p_name . "," . $val2->package_name;
                        }
                    }
                }
                $brns = explode(",", $check_faculty['branch_ids']);
                $valid_ip = true;
                foreach ($check_ip as $ip) {
                    if (in_array($ip->branch_id, $brns) && $ip->address_ip == $this->input->post('my_ip')) {
                        $valid_ip = true;
                    }
                }
                if ($valid_ip == true) {
                    $this->session->set_userdata("domain", "admin");
                    $this->session->set_userdata("user_id", $check_faculty['faculty_id']);
                    $this->session->set_userdata("admin_id", $check_faculty['admin_id']);
                    $this->session->set_userdata("user_name", $check_faculty['name']);
                    $this->session->set_userdata("user_email", $check_faculty['email']);
                    $this->session->set_userdata("logtype", $check_faculty['logtype']);
                    $this->session->set_userdata("branch_ids", $check_faculty['branch_ids']);
                    $this->session->set_userdata("course_ids", $c_name);
                    $this->session->set_userdata("package_ids", $p_name);
                    $this->session->set_userdata("branch_name", $b_name);
                    $this->session->set_userdata("department_id", $check_faculty['department_id']);
                    $this->session->set_userdata("subdepartment_id", $check_faculty['subdepartment_id']);
                    $this->session->set_userdata("hod_ids", $check_faculty['hod_ids']);
                    $this->session->set_userdata("user_last_seen", $check_faculty['timestamp']);
                    $this->session->set_userdata("user_image", $check_faculty['image']);
                    $this->session->set_userdata("user_permission", $check_faculty['permission']);
                    $this->session->set_userdata("designation", $check_faculty['designation']);
                    $this->session->set_userdata("personal_no", $check_faculty['personal_no']);
                    $userdata = ['id' => $check_faculty['faculty_id'], 'admin_id' => $check_faculty['admin_id'], 'username' => $check_faculty['name'], 'email' => $check_faculty['email'], 'name' => $check_faculty['name'], 'role' => $check_faculty['logtype'], 'last_logged' => $check_faculty['lastlogged'], 'created' => $check_faculty['created'], 'logged_in' => 'TRUE'];
                    $this->session->set_userdata('Admin', $userdata);
                    $gdata = $this->db->query("SELECT * FROM task_group_member")->result();
                    foreach ($gdata as $key => $value) {
                        if ($value->member_account_id == $check_faculty['faculty_id'] && $value->member_role == "Faculty") {
                            $uid = $value->member_id;
                            if (!empty($uid)) {
                                $lldata['user_id'] = $uid;
                                //$mm = $this->tm->seat_insert_data("login_details",$lldata);
                                //$_SESSION['login_detail_id'] = $mm;
                                
                            }
                        }
                    }
                    $api_userdata = array('login_data' => $userdata, 'status' => 1, 'msg' => "successfully Login");
                    // redirect('welcome');
                    
                } else {
                    $msgs = "you are not authorized to access. because your ip address doesn't match";
                }
            } else {
                $msgs = "Invalid Email";
            }
        }
        if (!empty($api_userdata['login_data']['role'])) {
            $logtype = $api_userdata['login_data']['role'];
            // exit;
            if ($logtype == 'Super Admin') {
                $pall = explode(',', $check_admin['f_permission']);
            } else if ($logtype == 'Faculty') {
                $pall = explode(',', $check_faculty['f_permission']);
            } else if ($logtype == 'hod') {
                $pall = explode(',', $check_hod['f_permission']);
            } else {
                $pall = explode(',', $check_user['f_permission']);
            }
            $data['status'] = 1;
            $q = mysqli_query(mysqli_connect("localhost", "mzfrxmujjb", "Q23bQYkskc", "mzfrxmujjb"), "SELECT * FROM f_module");
            $jjall = mysqli_fetch_all($q, MYSQLI_ASSOC);
            foreach ($jjall as $key => $value) {
                if (in_array($value['f_module_name'], $pall)) {
                    $data['data'][] = $value;
                }
            }
            echo json_encode($data);
            exit;
        }
        if (!empty($api_userdata)) {
            echo json_encode($api_userdata);
        } else {
            $api_userdata_un = array('status' => 0, 'msg' => $msgs);
            echo json_encode($api_userdata_un);
        }
        exit;
    }
    public function second_mod() {
        $msgs['msg'] = "";
        if (!empty($this->input->post('email'))) {
            $check_admin = $this->db->query("SELECT * FROM admin WHERE email='" . $this->input->post('email') . "' ")->row_array();
            $check_user = $this->db->query("SELECT * FROM user WHERE email='" . $this->input->post('email') . "' ")->row_array();
            $check_faculty = $this->db->query("SELECT * FROM faculty WHERE email='" . $this->input->post('email') . "' ")->row_array();
            $check_hod = $this->db->query("SELECT * FROM hod WHERE email='" . $this->input->post('email') . "' ")->row_array();
            $check_ip = $this->db->query("SELECT * FROM network_ip")->result();
            if (!empty($check_admin['email'])) {
                if (@$check_admin['logtype'] == 'Super Admin') {
                    $admin_id = 0;
                } else {
                    $admin_id = $check_admin['id'];
                }
                $this->session->set_userdata("domain", "admin");
                $this->session->set_userdata("user_id", $check_admin['id']);
                $this->session->set_userdata("admin_id", $admin_id);
                $this->session->set_userdata("user_name", $check_admin['name']);
                $this->session->set_userdata("user_email", $check_admin['email']);
                $this->session->set_userdata("user_image", $check_admin['image']);
                $this->session->set_userdata("user_last_seen", $check_admin['timestamp']);
                $this->session->set_userdata("logtype", $check_admin['logtype']);
                $this->session->set_userdata("designation", $check_admin['designation']);
                $this->session->set_userdata("personal_no", $check_admin['personal_no']);
                $userdata = ['id' => $check_admin['id'], 'admin_id' => $admin_id, 'username' => $check_admin['name'], 'email' => $check_admin['email'], 'name' => $check_admin['name'], 'role' => $check_admin['logtype'], 'last_logged' => $check_admin['lastlogged'], 'created' => $check_admin['created'], 'logged_in' => 'TRUE'];
                $this->session->set_userdata('Admin', $userdata);
                $gdata = $this->db->query("SELECT * FROM task_group_member")->result();
                foreach ($gdata as $key => $value) {
                    if ($value->member_account_id == $check_admin['id'] && $value->member_role == "Super Admin") {
                        $uid = $value->member_id;
                        if (!empty($uid)) {
                            $lldata['user_id'] = $uid;
                            // $mm = $this->tm->seat_insert_data("login_details",$lldata);
                            //$_SESSION['login_detail_id'] = $mm;
                            
                        }
                    }
                }
                $api_userdata = array('login_data' => $userdata, 'status' => 1, 'msg' => "successfully Login");
                // redirect('welcome');
                
            } else if (!empty($check_hod['email'])) {
                // echo "<pre>";
                // print_r($check_hod);
                // die;
                $brans = $this->db->query("SELECT * FROM branch")->result();
                $courses = $this->db->query("SELECT * FROM course")->result();
                $packages = $this->db->query("SELECT * FROM package")->result();
                $b_ids = explode(",", $check_hod['branch_ids']);
                @$c_ids = explode(",", @$check_hod['course_ids']);
                @$p_ids = explode(",", @$check_hod['package_ids']);
                $b_name = "";
                for ($i = 0;$i < sizeof($b_ids);$i++) {
                    foreach ($brans as $val) {
                        if ($val->branch_id == $b_ids[$i]) {
                            if ($b_name == "") {
                                $b_name = $val->branch_name;
                            } else {
                                $b_name = $b_name . "," . $val->branch_name;
                            }
                        }
                    }
                }
                $c_name = "";
                foreach ($courses as $val1) {
                    if (in_array($val1->course_id, $c_ids)) {
                        if ($c_name == "") {
                            $c_name = $val1->course_name;
                        } else {
                            $c_name = $c_name . "," . $val1->course_name;
                        }
                    }
                }
                $p_name = "";
                foreach ($packages as $val2) {
                    if (in_array($val2->package_id, $p_ids)) {
                        if ($p_name == "") {
                            $p_name = $val2->package_name;
                        } else {
                            $p_name = $p_name . "," . $val2->package_name;
                        }
                    }
                }
                $brns = explode(",", $check_hod['branch_ids']);
                $valid_ip = true;
                foreach ($check_ip as $ip) {
                    if (in_array($ip->branch_id, $brns) && $ip->address_ip == $this->input->post('my_ip')) {
                        $valid_ip = true;
                    }
                }
                if ($valid_ip == true) {
                    // echo "<pre>";
                    // print_r($check_hod);
                    // die;
                    $this->session->set_userdata("domain", "admin");
                    $this->session->set_userdata("user_id", $check_hod['hod_id']);
                    $this->session->set_userdata("admin_id", $check_hod['admin_id']);
                    $this->session->set_userdata("logtype", $check_hod['logtype']);
                    $this->session->set_userdata("branch_ids", $check_hod['branch_ids']);
                    $this->session->set_userdata("department_id", $check_hod['department_ids']);
                    $this->session->set_userdata("subdepartment_id", $check_hod['subdepartment_id']);
                    $this->session->set_userdata("faculty_id", $check_hod['faculty_id']);
                    $this->session->set_userdata("course_ids", $c_name);
                    $this->session->set_userdata("package_ids", $p_name);
                    $this->session->set_userdata("user_name", $check_hod['name']);
                    $this->session->set_userdata("user_email", $check_hod['email']);
                    $this->session->set_userdata("user_image", $check_hod['image']);
                    $this->session->set_userdata("user_permission", $check_hod['permission']);
                    $this->session->set_userdata("user_last_seen", $check_hod['timestamp']);
                    $this->session->set_userdata("designation", $check_hod['designation']);
                    $this->session->set_userdata("personal_no", $check_hod['personal_no']);
                    $userdata = ['id' => $check_hod['hod_id'], 'admin_id' => $check_hod['admin_id'], 'username' => $check_hod['name'], 'email' => $check_hod['email'], 'name' => $check_hod['name'], 'role' => $check_hod['logtype'], 'last_logged' => $check_hod['lastlogged'], 'created' => $check_hod['created'], 'logged_in' => 'TRUE'];
                    $this->session->set_userdata('Admin', $userdata);
                    //return $this->load->view('test');
                    $gdata = $this->db->query("SELECT * FROM task_group_member")->result();
                    foreach ($gdata as $key => $value) {
                        if ($value->member_account_id == $check_hod['hod_id'] && $value->member_role == "HOD") {
                            $uid = $value->member_id;
                            if (!empty($uid)) {
                                $lldata['user_id'] = $uid;
                                // $mm = $this->tm->seat_insert_data("login_details",$lldata);
                                //$_SESSION['login_detail_id'] = $mm;
                                
                            }
                        }
                    }
                    $api_userdata = array('login_data' => $userdata, 'status' => 1, 'msg' => "successfully Login");
                    // redirect('welcome');
                    
                }
            } else if (!empty($check_user['email'])) {
                $brns = explode(",", $check_user['branch_ids']);
                $valid_ip = true;
                foreach ($check_ip as $ip) {
                    if (in_array($ip->branch_id, $brns) && $ip->address_ip == $this->input->post('my_ip')) {
                        $valid_ip = true;
                    }
                }
                if ($valid_ip == true) {
                    $this->session->set_userdata("domain", "admin");
                    $this->session->set_userdata("user_id", $check_user['user_id']);
                    if ($check_user['logtype'] == "Admin") {
                        $this->session->set_userdata("admin_id", $check_user['user_id']);
                    } else {
                        $this->session->set_userdata("admin_id", $check_user['admin_id']);
                    }
                    $this->session->set_userdata("logtype", $check_user['logtype']);
                    $this->session->set_userdata("branch_ids", $check_user['branch_ids']);
                    $this->session->set_userdata("department_id", $check_user['department_ids']);
                    $this->session->set_userdata("user_name", $check_user['name']);
                    $this->session->set_userdata("user_email", $check_user['email']);
                    $this->session->set_userdata("user_image", $check_user['image']);
                    $this->session->set_userdata("user_permission", $check_user['permission']);
                    $this->session->set_userdata("user_last_seen", $check_user['timestamp']);
                    $this->session->set_userdata("designation", $check_user['designation']);
                    $this->session->set_userdata("personal_no", $check_user['personal_no']);
                    $userdata = ['id' => $check_user['user_id'], 'admin_id' => $check_user['admin_id'], 'username' => $check_user['name'], 'email' => $check_user['email'], 'name' => $check_user['name'], 'role' => $check_user['logtype'], 'last_logged' => $check_user['lastlogged'], 'created' => $check_user['created'], 'logged_in' => 'TRUE'];
                    $this->session->set_userdata('Admin', $userdata);
                    $gdata = $this->db->query("SELECT * FROM task_group_member")->result();
                    foreach ($gdata as $key => $value) {
                        if ($value->member_account_id == $check_user['user_id'] && $value->member_role != "HOD" && $value->member_role != "Faculty" && $value->member_role != "Super Admin") {
                            $uid = $value->member_id;
                            if (!empty($uid)) {
                                $lldata['user_id'] = $uid;
                                // $mm = $this->tm->seat_insert_data("login_details",$lldata);
                                // $_SESSION['login_detail_id'] = $mm;
                                
                            }
                        }
                    }
                    $api_userdata = array('login_data' => $userdata, 'status' => 1, 'msg' => "successfully Login");
                    // redirect('welcome');
                    
                } else {
                    $msgs['msg'] = "you are not authorized to access. because your ip address doesn't match";
                }
            } else if (!empty($check_faculty['email'])) {
                $brans = $this->db->query("SELECT * FROM branch")->result();
                $courses = $this->db->query("SELECT * FROM course")->result();
                $packages = $this->db->query("SELECT * FROM package")->result();
                $b_ids = explode(",", $check_faculty['branch_ids']);
                @$c_ids = explode(",", @$check_faculty['course_ids']);
                @$p_ids = explode(",", @$check_faculty['package_ids']);
                $b_name = "";
                for ($i = 0;$i < sizeof($b_ids);$i++) {
                    foreach ($brans as $val) {
                        if ($val->branch_id == $b_ids[$i]) {
                            if ($b_name == "") {
                                $b_name = $val->branch_name;
                            } else {
                                $b_name = $b_name . "," . $val->branch_name;
                            }
                        }
                    }
                }
                $c_name = "";
                foreach ($courses as $val1) {
                    if (in_array($val1->course_id, $c_ids)) {
                        if ($c_name == "") {
                            $c_name = $val1->course_name;
                        } else {
                            $c_name = $c_name . "," . $val1->course_name;
                        }
                    }
                }
                $p_name = "";
                foreach ($packages as $val2) {
                    if (in_array($val2->package_id, $p_ids)) {
                        if ($p_name == "") {
                            $p_name = $val2->package_name;
                        } else {
                            $p_name = $p_name . "," . $val2->package_name;
                        }
                    }
                }
                $brns = explode(",", $check_faculty['branch_ids']);
                $valid_ip = true;
                foreach ($check_ip as $ip) {
                    if (in_array($ip->branch_id, $brns) && $ip->address_ip == $this->input->post('my_ip')) {
                        $valid_ip = true;
                    }
                }
                if ($valid_ip == true) {
                    $this->session->set_userdata("domain", "admin");
                    $this->session->set_userdata("user_id", $check_faculty['faculty_id']);
                    $this->session->set_userdata("admin_id", $check_faculty['admin_id']);
                    $this->session->set_userdata("user_name", $check_faculty['name']);
                    $this->session->set_userdata("user_email", $check_faculty['email']);
                    $this->session->set_userdata("logtype", $check_faculty['logtype']);
                    $this->session->set_userdata("branch_ids", $check_faculty['branch_ids']);
                    $this->session->set_userdata("course_ids", $c_name);
                    $this->session->set_userdata("package_ids", $p_name);
                    $this->session->set_userdata("branch_name", $b_name);
                    $this->session->set_userdata("department_id", $check_faculty['department_id']);
                    $this->session->set_userdata("subdepartment_id", $check_faculty['subdepartment_id']);
                    $this->session->set_userdata("hod_ids", $check_faculty['hod_ids']);
                    $this->session->set_userdata("user_last_seen", $check_faculty['timestamp']);
                    $this->session->set_userdata("user_image", $check_faculty['image']);
                    $this->session->set_userdata("user_permission", $check_faculty['permission']);
                    $this->session->set_userdata("designation", $check_faculty['designation']);
                    $this->session->set_userdata("personal_no", $check_faculty['personal_no']);
                    $userdata = ['id' => $check_faculty['faculty_id'], 'admin_id' => $check_faculty['admin_id'], 'username' => $check_faculty['name'], 'email' => $check_faculty['email'], 'name' => $check_faculty['name'], 'role' => $check_faculty['logtype'], 'last_logged' => $check_faculty['lastlogged'], 'created' => $check_faculty['created'], 'logged_in' => 'TRUE'];
                    $this->session->set_userdata('Admin', $userdata);
                    $gdata = $this->db->query("SELECT * FROM task_group_member")->result();
                    foreach ($gdata as $key => $value) {
                        if ($value->member_account_id == $check_faculty['faculty_id'] && $value->member_role == "Faculty") {
                            $uid = $value->member_id;
                            if (!empty($uid)) {
                                $lldata['user_id'] = $uid;
                                //$mm = $this->tm->seat_insert_data("login_details",$lldata);
                                //$_SESSION['login_detail_id'] = $mm;
                                
                            }
                        }
                    }
                    $api_userdata = array('login_data' => $userdata, 'status' => 1, 'msg' => "successfully Login");
                    // redirect('welcome');
                    
                } else {
                    $msgs = "you are not authorized to access. because your ip address doesn't match";
                }
            } else {
                $msgs = "Invalid Email";
            }
        }
        if (!empty($api_userdata['login_data']['role'])) {
            $logtype = $api_userdata['login_data']['role'];
            // exit;
            if ($logtype == 'Super Admin') {
                $pall = explode(',', $check_admin['m_permission']);
            } else if ($logtype == 'Faculty') {
                $pall = explode(',', $check_faculty['m_permission']);
            } else if ($logtype == 'hod') {
                $pall = explode(',', $check_hod['m_permission']);
            } else {
                $pall = explode(',', $check_user['m_permission']);
            }
            $data['status'] = 1;
            $fid = $this->input->post('f_module_id');
            $jjall = $this->db->query("SELECT * FROM m_module WHERE f_module_id='" . $fid . "' ")->result();
            foreach ($jjall as $key => $value) {
                if (in_array($value->module_name, $pall)) {
                    $data['data'][] = $value;
                }
            }
            echo json_encode($data);
            exit;
        }
        if (!empty($api_userdata)) {
            echo json_encode($api_userdata);
        } else {
            $api_userdata_un = array('status' => 0, 'msg' => $msgs);
            echo json_encode($api_userdata_un);
        }
        exit;
    }
    public function last_mod() {
        $msgs['msg'] = "";
        if (!empty($this->input->post('email'))) {
            $check_admin = $this->db->query("SELECT * FROM admin WHERE email='" . $this->input->post('email') . "' ")->row_array();
            $check_user = $this->db->query("SELECT * FROM user WHERE email='" . $this->input->post('email') . "' ")->row_array();
            $check_faculty = $this->db->query("SELECT * FROM faculty WHERE email='" . $this->input->post('email') . "' ")->row_array();
            $check_hod = $this->db->query("SELECT * FROM hod WHERE email='" . $this->input->post('email') . "' ")->row_array();
            $check_ip = $this->db->query("SELECT * FROM network_ip")->result();
            if (!empty($check_admin['email'])) {
                if (@$check_admin['logtype'] == 'Super Admin') {
                    $admin_id = 0;
                } else {
                    $admin_id = $check_admin['id'];
                }
                $this->session->set_userdata("domain", "admin");
                $this->session->set_userdata("user_id", $check_admin['id']);
                $this->session->set_userdata("admin_id", $admin_id);
                $this->session->set_userdata("user_name", $check_admin['name']);
                $this->session->set_userdata("user_email", $check_admin['email']);
                $this->session->set_userdata("user_image", $check_admin['image']);
                $this->session->set_userdata("user_last_seen", $check_admin['timestamp']);
                $this->session->set_userdata("logtype", $check_admin['logtype']);
                $this->session->set_userdata("designation", $check_admin['designation']);
                $this->session->set_userdata("personal_no", $check_admin['personal_no']);
                $userdata = ['id' => $check_admin['id'], 'admin_id' => $admin_id, 'username' => $check_admin['name'], 'email' => $check_admin['email'], 'name' => $check_admin['name'], 'role' => $check_admin['logtype'], 'last_logged' => $check_admin['lastlogged'], 'created' => $check_admin['created'], 'logged_in' => 'TRUE'];
                $this->session->set_userdata('Admin', $userdata);
                $gdata = $this->db->query("SELECT * FROM task_group_member")->result();
                foreach ($gdata as $key => $value) {
                    if ($value->member_account_id == $check_admin['id'] && $value->member_role == "Super Admin") {
                        $uid = $value->member_id;
                        if (!empty($uid)) {
                            $lldata['user_id'] = $uid;
                            // $mm = $this->tm->seat_insert_data("login_details",$lldata);
                            //$_SESSION['login_detail_id'] = $mm;
                            
                        }
                    }
                }
                $api_userdata = array('login_data' => $userdata, 'status' => 1, 'msg' => "successfully Login");
                // redirect('welcome');
                
            } else if (!empty($check_hod['email'])) {
                // echo "<pre>";
                // print_r($check_hod);
                // die;
                $brans = $this->db->query("SELECT * FROM branch")->result();
                $courses = $this->db->query("SELECT * FROM course")->result();
                $packages = $this->db->query("SELECT * FROM package")->result();
                $b_ids = explode(",", $check_hod['branch_ids']);
                @$c_ids = explode(",", @$check_hod['course_ids']);
                @$p_ids = explode(",", @$check_hod['package_ids']);
                $b_name = "";
                for ($i = 0;$i < sizeof($b_ids);$i++) {
                    foreach ($brans as $val) {
                        if ($val->branch_id == $b_ids[$i]) {
                            if ($b_name == "") {
                                $b_name = $val->branch_name;
                            } else {
                                $b_name = $b_name . "," . $val->branch_name;
                            }
                        }
                    }
                }
                $c_name = "";
                foreach ($courses as $val1) {
                    if (in_array($val1->course_id, $c_ids)) {
                        if ($c_name == "") {
                            $c_name = $val1->course_name;
                        } else {
                            $c_name = $c_name . "," . $val1->course_name;
                        }
                    }
                }
                $p_name = "";
                foreach ($packages as $val2) {
                    if (in_array($val2->package_id, $p_ids)) {
                        if ($p_name == "") {
                            $p_name = $val2->package_name;
                        } else {
                            $p_name = $p_name . "," . $val2->package_name;
                        }
                    }
                }
                $brns = explode(",", $check_hod['branch_ids']);
                $valid_ip = true;
                foreach ($check_ip as $ip) {
                    if (in_array($ip->branch_id, $brns) && $ip->address_ip == $this->input->post('my_ip')) {
                        $valid_ip = true;
                    }
                }
                if ($valid_ip == true) {
                    // echo "<pre>";
                    // print_r($check_hod);
                    // die;
                    $this->session->set_userdata("domain", "admin");
                    $this->session->set_userdata("user_id", $check_hod['hod_id']);
                    $this->session->set_userdata("admin_id", $check_hod['admin_id']);
                    $this->session->set_userdata("logtype", $check_hod['logtype']);
                    $this->session->set_userdata("branch_ids", $check_hod['branch_ids']);
                    $this->session->set_userdata("department_id", $check_hod['department_ids']);
                    $this->session->set_userdata("subdepartment_id", $check_hod['subdepartment_id']);
                    $this->session->set_userdata("faculty_id", $check_hod['faculty_id']);
                    $this->session->set_userdata("course_ids", $c_name);
                    $this->session->set_userdata("package_ids", $p_name);
                    $this->session->set_userdata("user_name", $check_hod['name']);
                    $this->session->set_userdata("user_email", $check_hod['email']);
                    $this->session->set_userdata("user_image", $check_hod['image']);
                    $this->session->set_userdata("user_permission", $check_hod['permission']);
                    $this->session->set_userdata("user_last_seen", $check_hod['timestamp']);
                    $this->session->set_userdata("designation", $check_hod['designation']);
                    $this->session->set_userdata("personal_no", $check_hod['personal_no']);
                    $userdata = ['id' => $check_hod['hod_id'], 'admin_id' => $check_hod['admin_id'], 'username' => $check_hod['name'], 'email' => $check_hod['email'], 'name' => $check_hod['name'], 'role' => $check_hod['logtype'], 'last_logged' => $check_hod['lastlogged'], 'created' => $check_hod['created'], 'logged_in' => 'TRUE'];
                    $this->session->set_userdata('Admin', $userdata);
                    //return $this->load->view('test');
                    $gdata = $this->db->query("SELECT * FROM task_group_member")->result();
                    foreach ($gdata as $key => $value) {
                        if ($value->member_account_id == $check_hod['hod_id'] && $value->member_role == "HOD") {
                            $uid = $value->member_id;
                            if (!empty($uid)) {
                                $lldata['user_id'] = $uid;
                                // $mm = $this->tm->seat_insert_data("login_details",$lldata);
                                //$_SESSION['login_detail_id'] = $mm;
                                
                            }
                        }
                    }
                    $api_userdata = array('login_data' => $userdata, 'status' => 1, 'msg' => "successfully Login");
                    // redirect('welcome');
                    
                }
            } else if (!empty($check_user['email'])) {
                $brns = explode(",", $check_user['branch_ids']);
                $valid_ip = true;
                foreach ($check_ip as $ip) {
                    if (in_array($ip->branch_id, $brns) && $ip->address_ip == $this->input->post('my_ip')) {
                        $valid_ip = true;
                    }
                }
                if ($valid_ip == true) {
                    $this->session->set_userdata("domain", "admin");
                    $this->session->set_userdata("user_id", $check_user['user_id']);
                    if ($check_user['logtype'] == "Admin") {
                        $this->session->set_userdata("admin_id", $check_user['user_id']);
                    } else {
                        $this->session->set_userdata("admin_id", $check_user['admin_id']);
                    }
                    $this->session->set_userdata("logtype", $check_user['logtype']);
                    $this->session->set_userdata("branch_ids", $check_user['branch_ids']);
                    $this->session->set_userdata("department_id", $check_user['department_ids']);
                    $this->session->set_userdata("user_name", $check_user['name']);
                    $this->session->set_userdata("user_email", $check_user['email']);
                    $this->session->set_userdata("user_image", $check_user['image']);
                    $this->session->set_userdata("user_permission", $check_user['permission']);
                    $this->session->set_userdata("user_last_seen", $check_user['timestamp']);
                    $this->session->set_userdata("designation", $check_user['designation']);
                    $this->session->set_userdata("personal_no", $check_user['personal_no']);
                    $userdata = ['id' => $check_user['user_id'], 'admin_id' => $check_user['admin_id'], 'username' => $check_user['name'], 'email' => $check_user['email'], 'name' => $check_user['name'], 'role' => $check_user['logtype'], 'last_logged' => $check_user['lastlogged'], 'created' => $check_user['created'], 'logged_in' => 'TRUE'];
                    $this->session->set_userdata('Admin', $userdata);
                    $gdata = $this->db->query("SELECT * FROM task_group_member")->result();
                    foreach ($gdata as $key => $value) {
                        if ($value->member_account_id == $check_user['user_id'] && $value->member_role != "HOD" && $value->member_role != "Faculty" && $value->member_role != "Super Admin") {
                            $uid = $value->member_id;
                            if (!empty($uid)) {
                                $lldata['user_id'] = $uid;
                                // $mm = $this->tm->seat_insert_data("login_details",$lldata);
                                // $_SESSION['login_detail_id'] = $mm;
                                
                            }
                        }
                    }
                    $api_userdata = array('login_data' => $userdata, 'status' => 1, 'msg' => "successfully Login");
                    // redirect('welcome');
                    
                } else {
                    $msgs['msg'] = "you are not authorized to access. because your ip address doesn't match";
                }
            } else if (!empty($check_faculty['email'])) {
                $brans = $this->db->query("SELECT * FROM branch")->result();
                $courses = $this->db->query("SELECT * FROM course")->result();
                $packages = $this->db->query("SELECT * FROM package")->result();
                $b_ids = explode(",", $check_faculty['branch_ids']);
                @$c_ids = explode(",", @$check_faculty['course_ids']);
                @$p_ids = explode(",", @$check_faculty['package_ids']);
                $b_name = "";
                for ($i = 0;$i < sizeof($b_ids);$i++) {
                    foreach ($brans as $val) {
                        if ($val->branch_id == $b_ids[$i]) {
                            if ($b_name == "") {
                                $b_name = $val->branch_name;
                            } else {
                                $b_name = $b_name . "," . $val->branch_name;
                            }
                        }
                    }
                }
                $c_name = "";
                foreach ($courses as $val1) {
                    if (in_array($val1->course_id, $c_ids)) {
                        if ($c_name == "") {
                            $c_name = $val1->course_name;
                        } else {
                            $c_name = $c_name . "," . $val1->course_name;
                        }
                    }
                }
                $p_name = "";
                foreach ($packages as $val2) {
                    if (in_array($val2->package_id, $p_ids)) {
                        if ($p_name == "") {
                            $p_name = $val2->package_name;
                        } else {
                            $p_name = $p_name . "," . $val2->package_name;
                        }
                    }
                }
                $brns = explode(",", $check_faculty['branch_ids']);
                $valid_ip = true;
                foreach ($check_ip as $ip) {
                    if (in_array($ip->branch_id, $brns) && $ip->address_ip == $this->input->post('my_ip')) {
                        $valid_ip = true;
                    }
                }
                if ($valid_ip == true) {
                    $this->session->set_userdata("domain", "admin");
                    $this->session->set_userdata("user_id", $check_faculty['faculty_id']);
                    $this->session->set_userdata("admin_id", $check_faculty['admin_id']);
                    $this->session->set_userdata("user_name", $check_faculty['name']);
                    $this->session->set_userdata("user_email", $check_faculty['email']);
                    $this->session->set_userdata("logtype", $check_faculty['logtype']);
                    $this->session->set_userdata("branch_ids", $check_faculty['branch_ids']);
                    $this->session->set_userdata("course_ids", $c_name);
                    $this->session->set_userdata("package_ids", $p_name);
                    $this->session->set_userdata("branch_name", $b_name);
                    $this->session->set_userdata("department_id", $check_faculty['department_id']);
                    $this->session->set_userdata("subdepartment_id", $check_faculty['subdepartment_id']);
                    $this->session->set_userdata("hod_ids", $check_faculty['hod_ids']);
                    $this->session->set_userdata("user_last_seen", $check_faculty['timestamp']);
                    $this->session->set_userdata("user_image", $check_faculty['image']);
                    $this->session->set_userdata("user_permission", $check_faculty['permission']);
                    $this->session->set_userdata("designation", $check_faculty['designation']);
                    $this->session->set_userdata("personal_no", $check_faculty['personal_no']);
                    $userdata = ['id' => $check_faculty['faculty_id'], 'admin_id' => $check_faculty['admin_id'], 'username' => $check_faculty['name'], 'email' => $check_faculty['email'], 'name' => $check_faculty['name'], 'role' => $check_faculty['logtype'], 'last_logged' => $check_faculty['lastlogged'], 'created' => $check_faculty['created'], 'logged_in' => 'TRUE'];
                    $this->session->set_userdata('Admin', $userdata);
                    $gdata = $this->db->query("SELECT * FROM task_group_member")->result();
                    foreach ($gdata as $key => $value) {
                        if ($value->member_account_id == $check_faculty['faculty_id'] && $value->member_role == "Faculty") {
                            $uid = $value->member_id;
                            if (!empty($uid)) {
                                $lldata['user_id'] = $uid;
                                //$mm = $this->tm->seat_insert_data("login_details",$lldata);
                                //$_SESSION['login_detail_id'] = $mm;
                                
                            }
                        }
                    }
                    $api_userdata = array('login_data' => $userdata, 'status' => 1, 'msg' => "successfully Login");
                    // redirect('welcome');
                    
                } else {
                    $msgs = "you are not authorized to access. because your ip address doesn't match";
                }
            } else {
                $msgs = "Invalid Email";
            }
        }
        if (!empty($api_userdata['login_data']['role'])) {
            $logtype = $api_userdata['login_data']['role'];
            // exit;
            if ($logtype == 'Super Admin') {
                $pall = explode(',', $check_admin['permission']);
            } else if ($logtype == 'Faculty') {
                $pall = explode(',', $check_faculty['permission']);
            } else if ($logtype == 'hod') {
                $pall = explode(',', $check_hod['permission']);
            } else {
                $pall = explode(',', $check_user['permission']);
            }
            $data['status'] = 1;
            $fid = $this->input->post('m_module_id');
            $jjall = $this->db->query("SELECT * FROM l_module WHERE m_module_id='" . $fid . "' ")->result();
            foreach ($jjall as $key => $value) {
                if (in_array($value->name, $pall)) {
                    $value->path = 'http://demo.rnwmultimedia.com/' . $value->controller . $value->method;
                    unset($value->controller);
                    unset($value->method);
                    $data['data'][] = $value;
                }
            }
            echo json_encode($data);
            exit;
        }
        if (!empty($api_userdata)) {
            echo json_encode($api_userdata);
        } else {
            $api_userdata_un = array('status' => 0, 'msg' => $msgs);
            echo json_encode($api_userdata_un);
        }
        exit;
    }
    public function logout() {
        date_default_timezone_set("Asia/Kolkata");
        $id = $_SESSION['user_id'];
        $data['timestamp'] = date('Y-m-d H:i:s');
        if ($_SESSION['logtype'] == "Super Admin") {
            $this->cm->update_data("admin", $data, "id", $id);
        } else if ($_SESSION['logtype'] == "Faculty") {
            $this->cm->update_data("faculty", $data, "faculty_id", $id);
        } else {
            $this->cm->update_data("user", $data, "user_id", $id);
        }
        // $lldata['last_activity'] = date('Y-m-d H:i:s');
        // $lldata['status'] = 0;
        // $lldata['is_type'] = 'no';
        // $this->cm->update_data("login_details",$lldata,"login_details_id",$_SESSION['login_detail_id']);
        session_destroy();
        $api_logout = array('status' => 0, 'msg' => 'Logout Successfully');
        echo json_encode($api_logout);
        // redirect('welcome/login');
        
    }
    public function demo_responsive() {
        // echo "<pre>";
        // print_r($_SESSION);
        // die;
        date_default_timezone_set("Asia/Calcutta");
        $ctimetamp = date('Y-m-d h:i:s a');
        if (!empty($_SESSION['sts_msg'])) {
            $display['sts_msg'] = $_SESSION['sts_msg'];
            unset($_SESSION['sts_msg']);
        }
        if (!empty($this->input->post('take_attendance'))) {
            $data = $this->input->post();
            $demo_id = $data['demo_id'];
            $select_demo = $this->cm->select_data("demo", "demo_id", $demo_id);
            $date = $data['attDate'];
            $flag = 1;
            $all_att = explode("&&", $select_demo->attendance);
            for ($i = 0;$i < sizeof($all_att);$i++) {
                $att = explode("/", $all_att[$i]);
                if ($date == $att[0]) {
                    $flag = 0;
                }
            }
            if (@$data['demoStatus'] == 1) {
                $insert['demoStatus'] = $data['demoStatus'];
                $insert['statusChangeDate'] = date("Y-m-d");
                $qu = $this->cm->update_data("demo", $insert, "demo_id", $demo_id);
                if ($qu) {
                    $this->session->set_userdata("sts_msg", "Demo done successfully");
                }
            }
            if (!empty($data['reason']) && @$data['reason'] != "" && $data['demoStatus'] == "2" || $data['demoStatus'] == "3" || $data['demoStatus'] == "4") {
                $insert['demoStatus'] = $data['demoStatus'];
                $insert['statusChangeDate'] = date("Y-m-d");
                if ($data['demoStatus'] == "3") {
                    $insert['cancel_reason'] = $this->input->post('cancel_reason');
                    $data['reason'] = "Demo Cancel / " . $data['reason'];
                }
                if (!empty($data['leave_from_date']) && !empty($data['leave_to_date']) && $data['demoStatus'] == "2") {
                    $insert['leaveDate'] = $data['leave_from_date'] . "to" . $data['leave_to_date'];
                    $data['reason'] = "Demo Leave : " . $insert['leaveDate'] . " / " . $data['reason'];
                }
                if (!empty($data['leave_from_date']) && !empty($data['leave_to_date']) && $data['demoStatus'] == "4") {
                    $insert['leaveDate'] = $data['leave_from_date'] . "to" . $data['leave_to_date'];
                    $data['reason'] = "Demo Confusion : " . $insert['leaveDate'] . " / " . $data['reason'];
                }
                if ($select_demo->reason == "") {
                    $insert['reason'] = $date . "|/|" . $data['reason'] . "|/|" . $_SESSION['user_name'] . "|/|" . $ctimetamp;
                } else {
                    $insert['reason'] = $select_demo->reason . "&&" . $date . "|/|" . $data['reason'] . "|/|" . $_SESSION['user_name'] . "|/|" . $ctimetamp;
                }
                $qu = $this->cm->update_data("demo", $insert, "demo_id", $demo_id);
                if ($qu) {
                    if ($data['demoStatus'] == "2" && !empty($data['leave_from_date']) && !empty($data['leave_to_date']) && !empty($data['reason']) && @$data['reason'] != "") {
                        $this->session->set_userdata("sts_msg", "Demo Student has been added to the leave list");
                    } else if ($data['demoStatus'] == "4" && !empty($data['leave_from_date']) && !empty($data['leave_to_date']) && !empty($data['reason']) && @$data['reason'] != "") {
                        $this->session->set_userdata("sts_msg", "Demo Student has been added to the Confusion list");
                    } else {
                        $this->session->set_userdata("sts_msg", "Demo Cancel successfully");
                    }
                }
            }
            if ($flag == 1) {
                $insert['demoStatus'] = $data['demoStatus'];
                $insert['statusChangeDate'] = date("Y-m-d");
                if ($data['att'] == "A") {
                    if ($select_demo->reason == "") {
                        $insert['reason'] = $date . "|/|" . $data['reason'] . "|/|" . $_SESSION['user_name'] . "|/|" . $ctimetamp;
                    } else {
                        $insert['reason'] = $select_demo->reason . "&&" . $date . "|/|" . $data['reason'] . "|/|" . $_SESSION['user_name'] . "|/|" . $ctimetamp;
                    }
                }
                if ($select_demo->attendance == "") {
                    $insert['attendance'] = $date . "/" . $data['att'] . "/" . $_SESSION['user_name'] . "/" . $ctimetamp;
                } else {
                    $insert['attendance'] = $select_demo->attendance . "&&" . $date . "/" . $data['att'] . "/" . $_SESSION['user_name'] . "/" . $ctimetamp;
                }
                $re = $this->cm->update_data("demo", $insert, "demo_id", $demo_id);
                if ($re) {
                    redirect('welcome');
                }
            } else {
                if (empty($qu)) {
                    if ($_SESSION['logtype'] == "Faculty" || $_SESSION['logtype'] == "hod") {
                        $display['msg'] = "Already Taken Attendance";
                    } else {
                        $all_att = explode("&&", $select_demo->attendance);
                        $edit_att = "";
                        for ($i = 0;$i < sizeof($all_att);$i++) {
                            $att = explode("/", $all_att[$i]);
                            if ($date == $att[0]) {
                                if ($edit_att == "") {
                                    $edit_att = $date . "/" . $data['att'] . "/" . $_SESSION['user_name'] . "/" . $ctimetamp;
                                } else {
                                    $edit_att = $edit_att . "&&" . $date . "/" . $data['att'] . "/" . $_SESSION['user_name'] . "/" . $ctimetamp;
                                }
                            } else {
                                if ($edit_att == "") {
                                    $edit_att = $all_att[$i];
                                } else {
                                    $edit_att = $edit_att . "&&" . $all_att[$i];
                                }
                            }
                        }
                        if ($data['att'] == "A") {
                            if ($select_demo->reason == "") {
                                $insert1['reason'] = $date . "|/|" . $data['reason'] . "|/|" . $_SESSION['user_name'] . "|/|" . $ctimetamp;
                            } else {
                                $insert1['reason'] = $select_demo->reason . "&&" . $date . "|/|" . $data['reason'] . "|/|" . $_SESSION['user_name'] . "|/|" . $ctimetamp;
                            }
                        }
                        $insert1['attendance'] = $edit_att;
                        $res1 = $this->cm->update_data("demo", $insert1, "demo_id", $demo_id);
                        if ($res1) {
                            redirect('welcome');
                        }
                    }
                } else {
                    redirect('welcome');
                }
            }
        }
        if (!empty($this->input->post('search'))) {
            $data = $this->input->post();
            $display['demo_data'] = $this->cm->filter_demo("demo", $data);
            $display['all_f'] = $this->cm->demo_index("demo");
            if (isset($_SESSION) && $_SESSION['Admin']['role'] == "Faculty") {
                foreach ($display['all_f'] as $key => $value) {
                    if ($_SESSION['user_id'] == $value->faculty_id) {
                        $display['all_d'][] = $value;
                    }
                }
                if (isset($display['all_d'])) {
                    $display['all_d'];
                }
            } else if (isset($_SESSION) && $_SESSION['Admin']['role'] == "hod") {
                foreach ($display['all_f'] as $key => $value) {
                    if ($_SESSION['user_id'] == $value->hod_id) {
                        $display['all_d'][] = $value;
                    }
                }
                if (isset($display['all_d'])) {
                    $display['all_d'];
                }
            } else {
                $display['all_d'] = $this->cm->demo_index("demo");
            }
            $display['filter_branch'] = @$data['filter_branch'];
            $display['filter_department'] = @$data['filter_department'];
            $display['filter_course'] = @$data['filter_course'];
            $display['filter_faculty'] = @$data['filter_faculty'];
            $display['filter_demoDate_start'] = @$data['filter_demoDate_start'];
            $display['filter_demoDate_end'] = @$data['filter_demoDate_end'];
            $display['filter_demoName'] = @$data['filter_demoName'];
            $display['filter_demoId'] = @$data['filter_demoId'];
            $display['filter_phoneNo'] = @$data['filter_phoneNo'];
        } else if (!empty($this->input->post('search_filter'))) {
            $data = $this->input->post();
            $display['demo_all'] = $this->cm->filter_demo_graph("demo", $data);
            $display['all_f'] = $this->cm->demo_index("demo");
            if (isset($_SESSION) && $_SESSION['Admin']['role'] == "Faculty") {
                foreach ($display['all_f'] as $key => $value) {
                    if ($_SESSION['user_id'] == $value->faculty_id) {
                        $display['all_d'][] = $value;
                    }
                }
                if (isset($display['all_d'])) {
                    $display['all_d'];
                }
            } else if (isset($_SESSION) && $_SESSION['Admin']['role'] == "hod") {
                foreach ($display['all_f'] as $key => $value) {
                    if ($_SESSION['user_id'] == $value->hod_id) {
                        $display['all_d'][] = $value;
                    }
                }
                if (isset($display['all_d'])) {
                    $display['all_d'];
                }
            } else {
                $display['all_d'] = $this->cm->demo_index("demo");
            }
        } else {
            $display['demo_data'] = $this->cm->view_all_demo_running("demo");
            $display['m_data'] = $this->cm->view_all("demo");
            if (isset($_SESSION) && $_SESSION['Admin']['role'] == "Faculty") {
                foreach ($display['m_data'] as $key => $value) {
                    if ($_SESSION['user_id'] == $value->faculty_id) {
                        $display['demo_all'][] = $value;
                    }
                }
                if (isset($display['demo_all'])) {
                    $display['demo_all'];
                }
            } else if (isset($_SESSION) && $_SESSION['Admin']['role'] == "hod") {
                foreach ($display['m_data'] as $key => $value) {
                    if ($_SESSION['user_id'] == $value->hod_id) {
                        $display['demo_all'][] = $value;
                    }
                }
                if (isset($display['demo_all'])) {
                    $display['demo_all'];
                }
            } else {
                $display['demo_all'] = $this->cm->view_all_data("demo");
                $display['curent_month_all'] = $this->cm->demo_index("demo");
            }
            // echo "hii;";
            // die;
            $display['grafwiseday_all'] = $this->cm->view_all("graf_wise_day");
            $display['untakegraph_all'] = $this->cm->view_all("untake_percentage_graph");
            ////councellordemo///
            $display['user_all_couseller'] = $this->cm->view_all_couseller("user");
            foreach ($display['user_all_couseller'] as $key => $value) {
                $taken_cc_demo[$key]['label'] = "Taken";
                $taken_cc_demo[$key]['y'] = count($this->cm->get_record_from_demo('demo', $value->name, 'addBy'));
                $done_cc_demo[$key]['label'] = "Done";
                $done_cc_demo[$key]['y'] = count($this->cm->get_record_from_demo_done('demo', $value->name, 'addBy', '1'));
                $cancle_cc_demo[$key]['label'] = "Cancel";
                $cancle_cc_demo[$key]['y'] = count($this->cm->get_record_from_demo_done('demo', $value->name, 'addBy', '3'));
                $leave_cc_demo[$key]['label'] = "Leave";
                $leave_cc_demo[$key]['y'] = count($this->cm->get_record_from_demo_done('demo', $value->name, 'addBy', '2'));
                $confusion_cc_demo[$key]['label'] = "Confusion";
                $confusion_cc_demo[$key]['y'] = count($this->cm->get_record_from_demo_done('demo', $value->name, 'addBy', '4'));
                $running_cc_demo[$key]['label'] = "Running";
                $running_cc_demo[$key]['y'] = count($this->cm->get_record_from_demo_done('demo', $value->name, 'addBy', '0'));
                $taken_name_demo[$key]['label'] = $value->name;
            }
            $display['taken_cc_demo'] = $taken_cc_demo;
            $display['done_cc_demo'] = $done_cc_demo;
            $display['cancle_cc_demo'] = $cancle_cc_demo;
            $display['leave_cc_demo'] = $leave_cc_demo;
            $display['confusion_cc_demo'] = $confusion_cc_demo;
            $display['running_cc_demo'] = $running_cc_demo;
            $display['taken_name_demo'] = $taken_name_demo;
            $demo_cousnselor = array();
            for ($i = 0;$i < sizeof($display['user_all_couseller']);$i++) {
                $demo_counselor[] = $this->cm->get_record_from_demo('demo', $display['user_all_couseller'][$i]->name, 'addBy');
            }
            $k = 0;
            for ($i = 0;$i < sizeof($demo_counselor);$i++) {
                for ($j = 0;$j < sizeof($demo_counselor[$i]);$j++) {
                    $data_get[$demo_counselor[$i][$j]->addBy][$k] = $demo_counselor[$i][$j]->name;
                    $k++;
                }
            }
            $counselor = array();
            if (isset($data_get)) {
                foreach ($data_get as $key => $dat) {
                    $record = count($dat);
                    $counselor[$key] = $record;
                }
            }
            $display['all_couselor'] = $counselor;
            $display['user_all_couselor_name'] = $display['user_all_couseller'];
            $display['user_graph_counselor'] = $this->cm->view_all('doned_counselor_graph');
            //////////------/////////////
            $display['all_f'] = $this->cm->demo_index("demo");
            if (isset($_SESSION) && $_SESSION['Admin']['role'] == "Faculty") {
                foreach ($display['all_f'] as $key => $value) {
                    if ($_SESSION['user_id'] == $value->faculty_id) {
                        $display['all_d'][] = $value;
                    }
                }
                if (isset($display['all_d'])) {
                    $display['all_d'];
                }
            } else if (isset($_SESSION) && $_SESSION['Admin']['role'] == "hod") {
                foreach ($display['all_f'] as $key => $value) {
                    if ($_SESSION['user_id'] == $value->hod_id) {
                        $display['all_d'][] = $value;
                    }
                }
                if (isset($display['all_d'])) {
                    $display['all_d'];
                }
            } else {
                $display['all_d'] = $this->cm->demo_index("demo");
            }
        }
        if (isset($_SESSION) && $_SESSION['logtype'] == "Counselor ") {
            // echo "hii";
            // die;
            // echo "<pre>";
            $b_id = explode(',', $_SESSION['branch_ids']);
            foreach ($b_id as $key => $value) {
                $bdata[$key] = $this->cm->select_data("branch", "branch_id", $value);
            }
            $m = 0;
            foreach ($bdata as $k => $v) {
                $f_b_id = $this->cm->select_data("seat_branch", "seat_branch_code", $v->branch_code);
                if (!empty($f_b_id)) {
                    $m = 1;
                    $bbid[] = $f_b_id->seat_branch_id;
                }
            }
            if ($m == 1) {
                foreach ($bbid as $m => $n) {
                    if (!empty($this->cm->filter_data("seat_assign", "seat_branch_id", $n))) {
                        $seat_assign[] = $this->cm->filter_data("seat_assign", "seat_branch_id", $n);
                    }
                }
                if (isset($seat_assign) && !empty($seat_assign)) {
                    // echo "<pre>";
                    // print_r($seat_assign);
                    // die;
                    foreach ($seat_assign as $p => $q) {
                        foreach ($q as $key => $value) {
                            $seat_batch[] = $value->seat_id;
                        }
                    }
                    foreach ($seat_batch as $m => $n) {
                        $seat_all_batch[] = $this->cm->filter_seat_data("seat_batch", "seat_id", $n, "batch_year", date('Y'));
                    }
                    foreach ($seat_all_batch as $key => $value) {
                        foreach ($value as $k => $v) {
                            $seat_all_batch[$key][$k]->seat_month = $this->cm->filter_data("seat_month", "month_seat_batch_id", $v->seat_batch_id);
                            //$seat_month[] = $this->cm->filter_data("seat_month","month_seat_batch_id",$v->seat_batch_id);
                            
                        }
                    }
                    // 				echo "<pre>";
                    // print_r($seat_all_batch);
                    // die;
                    $display['seat_month'] = $seat_all_batch;
                }
            }
        } else if (isset($_SESSION) && $_SESSION['logtype'] == "Super Admin") {
            $bdata = $this->cm->view_all("branch");
            $m = 0;
            foreach ($bdata as $k => $v) {
                $f_b_id = $this->cm->select_data("seat_branch", "seat_branch_code", $v->branch_code);
                if (!empty($f_b_id)) {
                    $m = 1;
                    $bbid[] = $f_b_id->seat_branch_id;
                }
            }
            if ($m == 1) {
                foreach ($bbid as $m => $n) {
                    if (!empty($this->cm->filter_data("seat_assign", "seat_branch_id", $n))) {
                        $seat_assign[] = $this->cm->filter_data("seat_assign", "seat_branch_id", $n);
                    }
                }
                // echo "<pre>";
                // print_r($seat_assign);
                // die;
                if (isset($seat_assign) && !empty($seat_assign)) {
                    // echo "hiii";
                    // die;
                    foreach ($seat_assign as $p => $q) {
                        foreach ($q as $key => $value) {
                            $seat_batch[] = $value->seat_id;
                        }
                    }
                    foreach ($seat_batch as $m => $n) {
                        $seat_all_batch[] = $this->cm->filter_seat_data("seat_batch", "seat_id", $n, "batch_year", date('Y'));
                    }
                    foreach ($seat_all_batch as $key => $value) {
                        foreach ($value as $k => $v) {
                            $data = $this->cm->select_data("seat_assign", "seat_id", $v->seat_id);
                            $adata = $this->cm->select_data("seat_branch", "seat_branch_id", $data->seat_branch_id);
                            $seat_all_batch[$key]['branch_name'] = $adata->seat_branch_name;
                            $seat_all_batch[$key][$k]->seat_month = $this->cm->filter_seat_data("seat_month", "month_seat_batch_id", $v->seat_batch_id, "month_name", date('n'));;
                            //$seat_month[] = $this->cm->filter_data("seat_month","month_seat_batch_id",$v->seat_batch_id);
                            
                        }
                    }
                    $display['seat_month'] = $seat_all_batch;
                }
            }
            // echo "<pre>";
            // print_r($_SESSION['logtype']);
            // die;
            
        }
        if (!empty($this->input->post('demo_analysis'))) {
            $data = $this->input->post();
            $display['demo_all_counselor'] = $this->cm->filter_demo_counsalor_analysis("demo", $data);
            $display['filter_demoDate_start'] = @$data['filter_demoDate_start'];
            $display['filter_demoDate_end'] = @$data['filter_demoDate_end'];
        } else {
            $display['demo_all_counselor'] = $this->cm->view_all("demo");
        }
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['upd_faculty'] = $this->cm->view_all("faculty");
        $display['upd_branch'] = $this->cm->view_all("branch");
        $display['upd_see'] = $this->cm->check_update("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['hod_all'] = $this->cm->view_all_hod_demo("hod");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        //$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['reason_list'] = $this->cm->view_all("cancel_reason_list");
        // echo "<pre>";
        // print_r($display['demo_all']);
        // die;
        $display['f_module'] = $this->cm->view_all("f_module");
        $display['m_module'] = $this->cm->view_all("m_module");
        $display['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('demo/demo_header', $update);
        $this->load->view('index', $display);
    }
    // public function index()
    // {
    //        	date_default_timezone_set("Asia/Calcutta");
    //        $ctimetamp =  date('Y-m-d h:i:s a');
    //     if(!empty($_SESSION['sts_msg']))
    //     {
    //         $display['sts_msg'] = $_SESSION['sts_msg'];
    //         unset($_SESSION['sts_msg']);
    //     }
    // 	if(!empty($this->input->post('take_attendance')))
    // 	{
    // 		$data = $this->input->post();
    // 		$demo_id = $data['demo_id'];
    // 		$select_demo=$this->cm->select_data("demo","demo_id",$demo_id);
    // 		$date = $data['attDate'];
    // 		$flag=1;
    // 		$all_att = explode("&&",$select_demo->attendance);
    // 		for($i=0;$i<sizeof($all_att);$i++)
    // 		{
    // 			$att = explode("/",$all_att[$i]);
    // 			if($date==$att[0])
    // 			{
    // 				$flag = 0;
    // 			}
    // 		}
    // 		if(@$data['demoStatus']==1)
    // 		{
    // 		    $insert['demoStatus'] = $data['demoStatus'];
    // 		    $insert['statusChangeDate'] =  date("Y-m-d");
    // 		    $qu=$this->cm->update_data("demo",$insert,"demo_id",$demo_id);
    // 		    if($qu)
    // 		    {
    // 		        $this->session->set_userdata("sts_msg","Demo done successfully");
    // 		    }
    // 		}
    // 		if(!empty($data['reason']) && @$data['reason']!="" && $data['demoStatus']=="2" || $data['demoStatus']=="3" || $data['demoStatus']=="4")
    // 		{
    // 		   $insert['demoStatus'] = $data['demoStatus'];
    // 		   $insert['statusChangeDate'] =  date("Y-m-d");
    // 		   if($data['demoStatus']=="3")
    // 		   {
    // 		       $insert['cancel_reason'] =  $this->input->post('cancel_reason');
    // 		       $data['reason'] = "Demo Cancel / ".$data['reason'];
    // 		   }
    // 		    if(!empty($data['leave_from_date']) && !empty($data['leave_to_date']) && $data['demoStatus']=="2")
    // 		    {
    // 		        $insert['leaveDate'] = $data['leave_from_date']."to".$data['leave_to_date'];
    // 		        $data['reason'] = "Demo Leave : ".$insert['leaveDate']." / ".$data['reason'];
    // 		    }
    // 		    if(!empty($data['leave_from_date']) && !empty($data['leave_to_date']) && $data['demoStatus']=="4")
    // 		    {
    // 		        $insert['leaveDate'] = $data['leave_from_date']."to".$data['leave_to_date'];
    // 		        $data['reason'] = "Demo Confusion : ".$insert['leaveDate']." / ".$data['reason'];
    // 		    }
    // 		    if($select_demo->reason=="")
    //    			{
    //    				  $insert['reason'] = $date."|/|".$data['reason']."|/|".$_SESSION['user_name']."|/|".$ctimetamp;
    //        		}
    //        		else
    //        		{
    //        			  $insert['reason'] = $select_demo->reason."&&".$date."|/|".$data['reason']."|/|".$_SESSION['user_name']."|/|".$ctimetamp;
    //        		}
    // 		    $qu=$this->cm->update_data("demo",$insert,"demo_id",$demo_id);
    //    			if($qu)
    // 		    {
    // 		        if($data['demoStatus']=="2" && !empty($data['leave_from_date']) && !empty($data['leave_to_date']) && !empty($data['reason']) && @$data['reason']!="")
    // 		        {
    // 		            $this->session->set_userdata("sts_msg","Demo Student has been added to the leave list");
    // 		        }
    // 		        else if($data['demoStatus']=="4" && !empty($data['leave_from_date']) && !empty($data['leave_to_date']) && !empty($data['reason']) && @$data['reason']!="")
    // 		        {
    // 		            $this->session->set_userdata("sts_msg","Demo Student has been added to the Confusion list");
    // 		        }
    // 		        else
    // 		        {
    // 		            $this->session->set_userdata("sts_msg","Demo Cancel successfully");
    // 		        }
    // 		    }
    // 		}
    //    			if($flag==1)
    //    			{
    //    				$insert['demoStatus'] = $data['demoStatus'];
    //    				$insert['statusChangeDate'] =  date("Y-m-d");
    //    				if($data['att']=="A")
    //    				{
    //    				    if($select_demo->reason=="")
    //    				    {
    //    					    $insert['reason'] = $date."|/|".$data['reason']."|/|".$_SESSION['user_name']."|/|".$ctimetamp;
    //        				}
    //        				else
    //        				{
    //        					$insert['reason'] = $select_demo->reason."&&".$date."|/|".$data['reason']."|/|".$_SESSION['user_name']."|/|".$ctimetamp;
    //        				}
    //    				}
    //    				if($select_demo->attendance=="")
    //    				{
    //    					$insert['attendance'] = $date."/".$data['att']."/".$_SESSION['user_name']."/".$ctimetamp;
    //    				}
    //    				else
    //    				{
    //    					$insert['attendance'] = $select_demo->attendance."&&".$date."/".$data['att']."/".$_SESSION['user_name']."/".$ctimetamp;
    //    				}
    //    				$re = $this->cm->update_data("demo",$insert,"demo_id",$demo_id);
    //    			    if($re) {   redirect('welcome'); }
    //    			}
    //    			else
    //    			{
    //    			    if(empty($qu))
    //    			    {
    //    			        if($_SESSION['logtype']=="Faculty" || $_SESSION['logtype']=="hod")
    //    			        {
    //    				        $display['msg']="Already Taken Attendance";
    //    			        }
    //    			        else
    //    			        {
    //    			            $all_att = explode("&&",$select_demo->attendance);
    // 		                $edit_att = "";
    //                			for($i=0;$i<sizeof($all_att);$i++)
    //                			{
    //                				$att = explode("/",$all_att[$i]);
    //                				if($date==$att[0])
    //                				{
    //                				    if($edit_att=="")
    //                				    {
    //                				        $edit_att=$date."/".$data['att']."/".$_SESSION['user_name']."/".$ctimetamp;
    //                				    }
    //                				    else
    //                				    {
    //                				        $edit_att=$edit_att."&&".$date."/".$data['att']."/".$_SESSION['user_name']."/".$ctimetamp;
    //                				    }
    //                				}
    //                				else
    //                				{
    //                				    if($edit_att=="")
    //                				    {
    //                				        $edit_att = $all_att[$i];
    //                				    }
    //                				    else
    //                				    {
    //                				        $edit_att = $edit_att."&&".$all_att[$i];
    //                				    }
    //                				}
    //                			}
    //                			if($data['att']=="A")
    //            				{
    //            				    if($select_demo->reason=="")
    //            				    {
    //            					    $insert1['reason'] = $date."|/|".$data['reason']."|/|".$_SESSION['user_name']."|/|".$ctimetamp;
    //                				}
    //                				else
    //                				{
    //                					$insert1['reason'] = $select_demo->reason."&&".$date."|/|".$data['reason']."|/|".$_SESSION['user_name']."|/|".$ctimetamp;
    //                				}
    //            				}
    //                			$insert1['attendance'] = $edit_att;
    //                			$res1 = $this->cm->update_data("demo",$insert1,"demo_id",$demo_id);
    //    			            if($res1) {   redirect('welcome'); }
    //    			        }
    //    			    }
    //    			    else
    //    			    {
    //    			        redirect('welcome');
    //    			    }
    //    			}
    // 	}
    // // 	echo "test";
    // // die;
    // 	if(!empty($this->input->post('search')))
    // 	{
    // 		 $data = $this->input->post();
    // 		$display['demo_data'] = $this->cm->filter_demo("demo",$data);
    // 			$display['all_f'] = $this->cm->demo_index("demo");
    // 		if(isset($_SESSION) && $_SESSION['Admin']['role'] == "Faculty" )
    // 		{
    // 					foreach ($display['all_f'] as $key => $value) {
    // 						if($_SESSION['user_id'] == $value->faculty_id)
    // 						{
    // 							$display['all_d'][] = $value;
    // 						}
    // 					}
    // 					if(isset($display['all_d'])){
    // 					$display['all_d'];
    // 				}
    // 		}
    // 		else if(isset($_SESSION) && $_SESSION['Admin']['role'] == "hod")
    // 		{
    // 				foreach ($display['all_f'] as $key => $value) {
    // 						if($_SESSION['user_id'] == $value->hod_id)
    // 						{
    // 							$display['all_d'][] = $value;
    // 						}
    // 					}
    // 					if(isset($display['all_d'])){
    // 					$display['all_d'];
    // 				}
    // 		}
    // 		else
    // 		{
    // 			$display['all_d'] = $this->cm->demo_index("demo");
    // 		}
    // 		$display['filter_branch'] = @$data['filter_branch'];
    // 		$display['filter_department'] = @$data['filter_department'];
    // 		$display['filter_course'] = @$data['filter_course'];
    // 		$display['filter_faculty'] = @$data['filter_faculty'];
    // 		$display['filter_demoDate_start'] = @$data['filter_demoDate_start'];
    // 		$display['filter_demoDate_end'] = @$data['filter_demoDate_end'];
    // 		$display['filter_demoName'] = @$data['filter_demoName'];
    // 		$display['filter_demoId'] = @$data['filter_demoId'];
    // 		$display['filter_phoneNo'] = @$data['filter_phoneNo'];
    // 	}
    // 	else if(!empty($this->input->post('search_filter')))
    // 	{
    // 		  $data = $this->input->post();
    // 		$display['demo_all'] = $this->cm->filter_demo_graph("demo",$data);
    // 			$display['all_f'] = $this->cm->demo_index("demo");
    // 		if(isset($_SESSION) && $_SESSION['Admin']['role'] == "Faculty" )
    // 		{
    // 					foreach ($display['all_f'] as $key => $value) {
    // 						if($_SESSION['user_id'] == $value->faculty_id)
    // 						{
    // 							$display['all_d'][] = $value;
    // 						}
    // 					}
    // 					if(isset($display['all_d'])){
    // 					$display['all_d'];
    // 				}
    // 		}
    // 		else if(isset($_SESSION) && $_SESSION['Admin']['role'] == "hod")
    // 		{
    // 			foreach ($display['all_f'] as $key => $value) {
    // 						if($_SESSION['user_id'] == $value->hod_id)
    // 						{
    // 							$display['all_d'][] = $value;
    // 						}
    // 					}
    // 					if(isset($display['all_d'])){
    // 					$display['all_d'];
    // 				}
    // 		}
    // 		else
    // 		{
    // 			$display['all_d'] = $this->cm->demo_index("demo");
    // 		}
    // 	}
    // 	else
    // 	{
    // 		$display['demo_data'] = $this->cm->view_all_demo_running("demo");
    // 		$display['m_data'] = $this->cm->view_all("demo");
    // 		// echo "<pre>";
    // 		// print_r($_SESSION);
    // 		// die;
    // 		if(isset($_SESSION) && $_SESSION['Admin']['role'] == "Faculty")
    // 		{
    // 					foreach ($display['m_data'] as $key => $value) {
    // 						if($_SESSION['user_id'] == $value->faculty_id)
    // 						{
    // 							$display['demo_all'][] = $value;
    // 						}
    // 					}
    // 					if(isset($display['demo_all'])){
    // 					$display['demo_all'];
    // 				}
    // 		}
    // 		else if(isset($_SESSION) && $_SESSION['Admin']['role'] == "hod")
    // 		{
    // 				foreach ($display['m_data'] as $key => $value) {
    // 						if($_SESSION['user_id'] == $value->hod_id)
    // 						{
    // 							$display['demo_all'][] = $value;
    // 						}
    // 					}
    // 					if(isset($display['demo_all'])){
    // 					$display['demo_all'];
    // 				}
    // 		}
    // 		else
    // 		{
    // 			$display['demo_all'] = $this->cm->view_all_data("demo");
    // 			$display['curent_month_all'] = $this->cm->demo_index("demo");
    // 		}
    // 		$display['grafwiseday_all'] = $this->cm->view_all("graf_wise_day");
    // 		$display['untakegraph_all'] = $this->cm->view_all("untake_percentage_graph");
    // 		////councellordemo///
    // 		$display['user_all_couseller'] = $this->cm->view_all_couseller("user");
    // 		foreach ($display['user_all_couseller'] as $key => $value) {
    // 			$taken_cc_demo[$key]['label'] = "Taken";
    // 			$taken_cc_demo[$key]['y'] = count($this->cm->get_record_from_demo('demo',$value->name,'addBy'));
    // 			$done_cc_demo[$key]['label'] = "Done";
    // 			$done_cc_demo[$key]['y'] = count($this->cm->get_record_from_demo_done('demo',$value->name,'addBy','1'));
    // 			$cancle_cc_demo[$key]['label'] = "Cancel";
    // 			$cancle_cc_demo[$key]['y'] = count($this->cm->get_record_from_demo_done('demo',$value->name,'addBy','3'));
    // 			$leave_cc_demo[$key]['label'] = "Leave";
    // 			$leave_cc_demo[$key]['y'] = count($this->cm->get_record_from_demo_done('demo',$value->name,'addBy','2'));
    // 			$confusion_cc_demo[$key]['label'] ="Confusion";
    // 			$confusion_cc_demo[$key]['y'] = count($this->cm->get_record_from_demo_done('demo',$value->name,'addBy','4'));
    // 			$running_cc_demo[$key]['label'] = "Running";
    // 			$running_cc_demo[$key]['y'] = count($this->cm->get_record_from_demo_done('demo',$value->name,'addBy','0'));
    // 			$taken_name_demo[$key]['label'] = $value->name;
    // 		}
    // 		$display['taken_cc_demo'] = $taken_cc_demo;
    // 		$display['done_cc_demo'] = $done_cc_demo;
    // 		$display['cancle_cc_demo'] = $cancle_cc_demo;
    // 		$display['leave_cc_demo'] = $leave_cc_demo;
    // 		$display['confusion_cc_demo'] = $confusion_cc_demo;
    // 		$display['running_cc_demo'] = $running_cc_demo;
    // 		$display['taken_name_demo'] = $taken_name_demo;
    // 		$demo_cousnselor = array();
    // 		for($i=0;$i<sizeof($display['user_all_couseller']); $i++)
    // 		{
    // 			$demo_counselor[] =  $this->cm->get_record_from_demo('demo',$display['user_all_couseller'][$i]->name,'addBy');
    // 		}
    // 		$k=0;
    // 		for($i=0; $i<sizeof($demo_counselor); $i++)
    // 		{
    // 			 for($j=0;$j<sizeof($demo_counselor[$i]);$j++)
    // 			 {
    // 			 	 $data_get[$demo_counselor[$i][$j]->addBy][$k] =   $demo_counselor[$i][$j]->name;
    // 			 	 $k++;
    // 			 }
    // 		}
    // 		$counselor = array();
    // 		if(isset($data_get)){
    // 		foreach($data_get as $key=>$dat)
    // 		{
    // 				$record = count($dat);
    // 				$counselor[$key] = $record;
    // 		}
    // 			}
    // 		   $display['all_couselor'] = $counselor;
    // 		   $display['user_all_couselor_name'] =  $display['user_all_couseller'];
    // 		   $display['user_graph_counselor'] = $this->cm->view_all('doned_counselor_graph');
    // 		   //////////------/////////////
    // 		$display['all_f'] = $this->cm->demo_index("demo");
    // 		if(isset($_SESSION) && $_SESSION['Admin']['role'] == "Faculty")
    // 		{
    // 					foreach ($display['all_f'] as $key => $value) {
    // 						if($_SESSION['user_id'] == $value->faculty_id)
    // 						{
    // 							$display['all_d'][] = $value;
    // 						}
    // 					}
    // 					if(isset($display['all_d'])){
    // 					$display['all_d'];
    // 				}
    // 		}
    // 		else if(isset($_SESSION) && $_SESSION['Admin']['role'] == "hod")
    // 		{
    // 			foreach ($display['all_f'] as $key => $value) {
    // 						if($_SESSION['user_id'] == $value->hod_id)
    // 						{
    // 							$display['all_d'][] = $value;
    // 						}
    // 					}
    // 					if(isset($display['all_d'])){
    // 					$display['all_d'];
    // 				}
    // 		}
    // 		else
    // 		{
    // 			$display['all_d'] = $this->cm->demo_index("demo");
    // 		}
    // 	}
    // 		if(isset($_SESSION) && $_SESSION['logtype'] == "Counselor ")
    // 	{
    // 		// echo "hii";
    // 		// die;
    // 		// echo "<pre>";
    // 		$b_id = explode(',', $_SESSION['branch_ids']);
    // 		foreach ($b_id as $key => $value)
    // 		{
    // 			$bdata[$key] = $this->cm->select_data("branch","branch_id",$value);
    // 		}
    // 		$m=0;
    // 		foreach ($bdata as $k => $v) {
    // 			$f_b_id = $this->cm->select_data("seat_branch","seat_branch_code",$v->branch_code);
    // 				if(!empty($f_b_id))
    // 				{
    // 					$m=1;
    // 					$bbid[]= $f_b_id->seat_branch_id;
    // 				}
    // 		}
    // 		if($m == 1)
    // 		{
    // 					foreach ($bbid as $m => $n) {
    // 						if(!empty($this->cm->filter_data("seat_assign","seat_branch_id",$n)))
    // 						{
    // 								$seat_assign[] =  $this->cm->filter_data("seat_assign","seat_branch_id",$n);
    // 						}
    // 					}
    // 					if(isset($seat_assign) && !empty($seat_assign))
    // 					{
    // 					// echo "<pre>";
    // 					// print_r($seat_assign);
    // 					// die;
    // 					foreach ($seat_assign as $p => $q) {
    // 						foreach ($q as $key => $value) {
    // 							$seat_batch[] = $value->seat_id;
    // 						}
    // 					}
    // 					foreach ($seat_batch as $m => $n) {
    // 						$seat_all_batch[]=  $this->cm->filter_seat_data("seat_batch","seat_id",$n,"batch_year",date('Y'));
    // 					}
    // 					foreach ($seat_all_batch as $key => $value) {
    // 						foreach ($value as $k => $v) {
    // 							$seat_all_batch[$key][$k]->seat_month = $this->cm->filter_data("seat_month","month_seat_batch_id",$v->seat_batch_id);
    // 							//$seat_month[] = $this->cm->filter_data("seat_month","month_seat_batch_id",$v->seat_batch_id);
    // 						}
    // 					}
    // 	// 				echo "<pre>";
    // 	// print_r($seat_all_batch);
    // 	// die;
    // 					$display['seat_month'] = $seat_all_batch;
    // 				}
    // 		}
    // 	}
    // 	else if(isset($_SESSION) && $_SESSION['logtype'] == "Super Admin")
    // 	{
    // 			$bdata = $this->cm->view_all("branch");
    // 		// echo "<pre>";
    // 		// print_r($bdata);
    // 		// die;
    // 		$m=0;
    // 		foreach ($bdata as $k => $v) {
    // 			$f_b_id = $this->cm->select_data("seat_branch","seat_branch_code",$v->branch_code);
    // 				if(!empty($f_b_id))
    // 				{
    // 					$m=1;
    // 					$bbid[]= $f_b_id->seat_branch_id;
    // 				}
    // 		}
    // 		if($m == 1)
    // 		{
    // 					foreach ($bbid as $m => $n) {
    // 						if(!empty($this->cm->filter_data("seat_assign","seat_branch_id",$n)))
    // 						{
    // 						$seat_assign[] =  $this->cm->filter_data("seat_assign","seat_branch_id",$n);
    // 						}
    // 					}
    // 					// echo "<pre>";
    // 					// print_r($seat_assign);
    // 					// die;
    // 					if(isset($seat_assign) && !empty($seat_assign))
    // 					{
    // 						// echo "hiii";
    // 						// die;
    // 							foreach ($seat_assign as $p => $q) {
    // 								foreach ($q as $key => $value) {
    // 									$seat_batch[] = $value->seat_id;
    // 								}
    // 							}
    // 							foreach ($seat_batch as $m => $n) {
    // 								$seat_all_batch[]=  $this->cm->filter_seat_data("seat_batch","seat_id",$n,"batch_year",date('Y'));
    // 							}
    // 							foreach ($seat_all_batch as $key => $value) {
    // 								foreach ($value as $k => $v) {
    // 									$data = $this->cm->select_data("seat_assign","seat_id",$v->seat_id);
    // 									$adata = 	$this->cm->select_data("seat_branch","seat_branch_id",$data->seat_branch_id);
    // 									$seat_all_batch[$key]['branch_name'] = $adata->seat_branch_name;
    // 									$seat_all_batch[$key][$k]->seat_month = $this->cm->filter_seat_data("seat_month","month_seat_batch_id",$v->seat_batch_id,"month_name",date('n'));;
    // 									//$seat_month[] = $this->cm->filter_data("seat_month","month_seat_batch_id",$v->seat_batch_id);
    // 								}
    // 							}
    // 							$display['seat_month'] = $seat_all_batch;
    // 					}
    // 		}
    // 	// // echo "<pre>";
    // 	// // print_r($_SESSION['logtype']);
    // 	// // die;
    // 	}
    // 	// // 	echo "<pre>";
    // 	// // 	$ddd = $this->cm->view_all('demo');
    // 	// // print_r($ddd);
    // 	// // die;
    // 	if(!empty($this->input->post('demo_analysis')))
    // 	{
    // 		$data = $this->input->post();
    // 		$display['demo_all_counselor'] = $this->cm->filter_demo_counsalor_analysis("demo",$data);
    // 		$display['filter_demoDate_start'] = @$data['filter_demoDate_start'];
    // 		$display['filter_demoDate_end'] = @$data['filter_demoDate_end'];
    // 	}
    // 	else
    // 	{
    // 		// echo "<pre>";
    // 		// print_r($this->cm->view_all("demo"));
    // 		// die;
    // 		if($_SESSION['logtype'] != "Super Admin"){
    // 			$display['demo_all_counselor'] = $this->cm->view_all("demo");
    // 		}
    // 	}
    // 	// echo "<pre>";
    // 	// print_r($display['demo_all_counselor']);
    // 	// die;
    // 	$update['upd_faculty'] = $this->cm->view_all("faculty");
    // 	$update['upd_branch'] = $this->cm->view_all("branch");
    // 	$update['upd_see'] = $this->cm->check_update("demo");
    // 	$display['upd_faculty'] = $this->cm->view_all("faculty");
    // 	$display['upd_branch'] = $this->cm->view_all("branch");
    // 	$display['upd_see'] = $this->cm->check_update("demo");
    // 	$display['department_all'] = $this->cm->view_all("department");
    // 	$display['branch_all'] = $this->cm->view_all("branch");
    // 	$display['course_all'] = $this->cm->view_all("course");
    // 		$display['hod_all'] = $this->cm->view_all_hod_demo("hod");
    // 	$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
    // 	//$display['faculty_all'] = $this->cm->view_all_faculty("faculty");
    // 	$display['reason_list'] = $this->cm->view_all("cancel_reason_list");
    // 	// echo "<pre>";
    // 	// print_r($display['demo_data']);
    // 	// die;
    // 	$update['f_module'] = $this->cm->view_all("f_module");
    // 	$update['m_module'] = $this->cm->view_all("m_module");
    // 	$update['l_module'] = $this->cm->view_all("l_module");
    // 	$display['to_ad_task'] = $this->tm->today_add_task();
    // 	$display['to_ob_task'] = $this->tm->today_observe_task();
    // 	$display['to_wo_task'] = $this->tm->all_task_note();
    // 	$update['tall'] = $this->tm->all_task_note();
    // 	$update['to_ob_task'] = $this->tm->today_observe_task();
    // 	// echo "<pre>";
    // 	// print_r($display['demo_all']);
    // 	// die;
    // 	$this->load->view('dashboard/header',$update);
    // 	$this->load->view('dashboard/index',$display);
    // }
    public function search_graph() {
        $data = $this->input->post();
        $k = $data['k1'];
        if ($k == 1) {
            $lastweek = date('Y-m-d', strtotime('-7 days'));
            $currentweek = date('Y-m-d');
            $record['all_d'] = $this->cm->get_lastWeek_data('demo', $lastweek, $currentweek);
            $record['grafwiseday_all'] = $this->cm->view_all("graf_wise_day");
            return $this->load->view('ajax_graph_wise', $record);
        } else if ($k == 2) {
            $lastweek = date('Y-m-d', strtotime('-30 days'));
            $currentweek = date('Y-m-d');
            $record['all_d'] = $this->cm->get_lastWeek_data('demo', $lastweek, $currentweek);
            $record['grafwiseday_all'] = $this->cm->view_all("graf_wise_day");
            return $this->load->view('ajax_graph_wise', $record);
        } else if ($k == 3) {
            $lastweek = date('Y-m-d', strtotime('-90 days'));
            $currentweek = date('Y-m-d');
            $record['all_d'] = $this->cm->get_lastWeek_data('demo', $lastweek, $currentweek);
            $record['grafwiseday_all'] = $this->cm->view_all("graf_wise_day");
            return $this->load->view('ajax_graph_wise', $record);
        } else if ($k == 4) {
            $lastweek = date('Y-m-d', strtotime('-180 days'));
            $currentweek = date('Y-m-d');
            $record['all_d'] = $this->cm->get_lastWeek_data('demo', $lastweek, $currentweek);
            $record['grafwiseday_all'] = $this->cm->view_all("graf_wise_day");
            return $this->load->view('ajax_graph_wise', $record);
        } else if ($k == 5) {
            $lastweek = date('Y-m-d', strtotime('-360 days'));
            $currentweek = date('Y-m-d');
            $record['all_d'] = $this->cm->get_lastWeek_data('demo', $lastweek, $currentweek);
            $record['grafwiseday_all'] = $this->cm->view_all("graf_wise_day");
            return $this->load->view('ajax_graph_wise', $record);
        } else {
            $lastweek = date('Y-m-d', strtotime('-29 days'));
            $currentweek = date('Y-m-d');
            $record['all_d'] = $this->cm->get_lastWeek_data('demo', $lastweek, $currentweek);
            $record['grafwiseday_all'] = $this->cm->view_all("graf_wise_day");
            return $this->load->view('ajax_graph_wise', $record);
        }
    }
    public function CounselorDone_graph() {
        $data = $this->input->post();
        $done = $data['k'];
        if ($done == 1) {
            $display['user_all_couseller'] = $this->cm->view_all_couseller("user");
            $demo_cousnselor = array();
            $lastweek = date('Y-m-d', strtotime('-7 days'));
            $currentweek = date('Y-m-d');
            // $main['all_couselor'] = $this->cm->get_lastWeek_data_demo('demo',$lastweek,$currentweek);
            for ($i = 0;$i < sizeof($display['user_all_couseller']);$i++) {
                $demo_counselor[] = $this->cm->get_lastWeek_data_demo('demo', $display['user_all_couseller'][$i]->name, 'addBy', $lastweek, $currentweek);
            }
            $k = 0;
            for ($i = 0;$i < sizeof($demo_counselor);$i++) {
                for ($j = 0;$j < sizeof($demo_counselor[$i]);$j++) {
                    $data_get[$demo_counselor[$i][$j]->addBy][$k] = $demo_counselor[$i][$j]->name;
                    $k++;
                }
            }
            if (isset($data_get)) {
                $counselor = array();
                foreach ($data_get as $key => $dat) {
                    $record = count($dat);
                    $counselor[$key] = $record;
                }
                $display['all_couselor'] = $counselor;
                //  echo "<pre>";
                //  print_r($display['all_couselor']);
                // exit;
                
            }
            // echo "<pre>";
            // print_r($main);
            // exit;
            $display['user_graph_counselor'] = $this->cm->view_all("doned_counselor_graph");
            return $this->load->view('ajax_graph_donedwise', $display);
        } else if ($done == 2) {
            $display['user_all_couseller'] = $this->cm->view_all_couseller("user");
            $demo_cousnselor = array();
            $lastweek = date('Y-m-d', strtotime('-30 days'));
            $currentweek = date('Y-m-d');
            // $main['all_couselor'] = $this->cm->get_lastWeek_data_demo('demo',$lastweek,$currentweek);
            for ($i = 0;$i < sizeof($display['user_all_couseller']);$i++) {
                $demo_counselor[] = $this->cm->get_lastWeek_data_demo('demo', $display['user_all_couseller'][$i]->name, 'addBy', $lastweek, $currentweek);
            }
            $k = 0;
            for ($i = 0;$i < sizeof($demo_counselor);$i++) {
                for ($j = 0;$j < sizeof($demo_counselor[$i]);$j++) {
                    $data_get[$demo_counselor[$i][$j]->addBy][$k] = $demo_counselor[$i][$j]->name;
                    $k++;
                }
            }
            if (isset($data_get)) {
                $counselor = array();
                foreach ($data_get as $key => $dat) {
                    $record = count($dat);
                    $counselor[$key] = $record;
                }
                $display['all_couselor'] = $counselor;
            }
            $display['user_graph_counselor'] = $this->cm->view_all("doned_counselor_graph");
            return $this->load->view('ajax_graph_donedwise', $display);
        } else if ($done == 3) {
            $display['user_all_couseller'] = $this->cm->view_all_couseller("user");
            $demo_cousnselor = array();
            $lastweek = date('Y-m-d', strtotime('-90 days'));
            $currentweek = date('Y-m-d');
            // $main['all_couselor'] = $this->cm->get_lastWeek_data_demo('demo',$lastweek,$currentweek);
            for ($i = 0;$i < sizeof($display['user_all_couseller']);$i++) {
                $demo_counselor[] = $this->cm->get_lastWeek_data_demo('demo', $display['user_all_couseller'][$i]->name, 'addBy', $lastweek, $currentweek);
            }
            $k = 0;
            for ($i = 0;$i < sizeof($demo_counselor);$i++) {
                for ($j = 0;$j < sizeof($demo_counselor[$i]);$j++) {
                    $data_get[$demo_counselor[$i][$j]->addBy][$k] = $demo_counselor[$i][$j]->name;
                    $k++;
                }
            }
            if (isset($data_get)) {
                $counselor = array();
                foreach ($data_get as $key => $dat) {
                    $record = count($dat);
                    $counselor[$key] = $record;
                }
                $display['all_couselor'] = $counselor;
            }
            $display['user_graph_counselor'] = $this->cm->view_all("doned_counselor_graph");
            return $this->load->view('ajax_graph_donedwise', $display);
        } else if ($done == 4) {
            $display['user_all_couseller'] = $this->cm->view_all_couseller("user");
            $demo_cousnselor = array();
            $lastweek = date('Y-m-d', strtotime('-180 days'));
            $currentweek = date('Y-m-d');
            // $main['all_couselor'] = $this->cm->get_lastWeek_data_demo('demo',$lastweek,$currentweek);
            for ($i = 0;$i < sizeof($display['user_all_couseller']);$i++) {
                $demo_counselor[] = $this->cm->get_lastWeek_data_demo('demo', $display['user_all_couseller'][$i]->name, 'addBy', $lastweek, $currentweek);
            }
            $k = 0;
            for ($i = 0;$i < sizeof($demo_counselor);$i++) {
                for ($j = 0;$j < sizeof($demo_counselor[$i]);$j++) {
                    $data_get[$demo_counselor[$i][$j]->addBy][$k] = $demo_counselor[$i][$j]->name;
                    $k++;
                }
            }
            if (isset($data_get)) {
                $counselor = array();
                foreach ($data_get as $key => $dat) {
                    $record = count($dat);
                    $counselor[$key] = $record;
                }
                $display['all_couselor'] = $counselor;
            }
            $display['user_graph_counselor'] = $this->cm->view_all("doned_counselor_graph");
            return $this->load->view('ajax_graph_donedwise', $display);
        } else if ($done == 5) {
            $display['user_all_couseller'] = $this->cm->view_all_couseller("user");
            $demo_cousnselor = array();
            $lastweek = date('Y-m-d', strtotime('-360 days'));
            $currentweek = date('Y-m-d');
            // $main['all_couselor'] = $this->cm->get_lastWeek_data_demo('demo',$lastweek,$currentweek);
            for ($i = 0;$i < sizeof($display['user_all_couseller']);$i++) {
                $demo_counselor[] = $this->cm->get_lastWeek_data_demo('demo', $display['user_all_couseller'][$i]->name, 'addBy', $lastweek, $currentweek);
            }
            $k = 0;
            for ($i = 0;$i < sizeof($demo_counselor);$i++) {
                for ($j = 0;$j < sizeof($demo_counselor[$i]);$j++) {
                    $data_get[$demo_counselor[$i][$j]->addBy][$k] = $demo_counselor[$i][$j]->name;
                    $k++;
                }
            }
            if (isset($data_get)) {
                $counselor = array();
                foreach ($data_get as $key => $dat) {
                    $record = count($dat);
                    $counselor[$key] = $record;
                }
                $display['all_couselor'] = $counselor;
            }
            $display['user_graph_counselor'] = $this->cm->view_all("doned_counselor_graph");
            return $this->load->view('ajax_graph_donedwise', $display);
        }
    }
    public function untake_graph() {
        $data = $this->input->post();
        // echo "<pre>";
        // print_r($data);
        // die;
        $untak = $data['k2'];
        if ($untak == 1) {
            $lastweek = date('Y-m-d', strtotime('-7 days'));
            $currentweek = date('Y-m-d');
            $record['curent_month_all'] = $this->cm->get_lastWeek_data('demo', $lastweek, $currentweek);
            $record['untakegraph_all'] = $this->cm->view_all("untake_percentage_graph");
            // print_r($record);
            // die;
            return $this->load->view('ajaxgraph_untake', $record);
        } else if ($untak == 2) {
            $lastweek = date('Y-m-d', strtotime('-30 days'));
            $currentweek = date('Y-m-d');
            $record['curent_month_all'] = $this->cm->get_lastWeek_data('demo', $lastweek, $currentweek);
            $record['untakegraph_all'] = $this->cm->view_all("untake_percentage_graph");
            return $this->load->view('ajaxgraph_untake', $record);
        } else if ($untak == 3) {
            $lastweek = date('Y-m-d', strtotime('-90 days'));
            $currentweek = date('Y-m-d');
            $record['curent_month_all'] = $this->cm->get_lastWeek_data('demo', $lastweek, $currentweek);
            $record['untakegraph_all'] = $this->cm->view_all("untake_percentage_graph");
            return $this->load->view('ajaxgraph_untake', $record);
        } else if ($untak == 4) {
            $lastweek = date('Y-m-d', strtotime('-180 days'));
            $currentweek = date('Y-m-d');
            $record['curent_month_all'] = $this->cm->get_lastWeek_data('demo', $lastweek, $currentweek);
            $record['untakegraph_all'] = $this->cm->view_all("untake_percentage_graph");
            return $this->load->view('ajaxgraph_untake', $record);
        } else if ($untak == 5) {
            $lastweek = date('Y-m-d', strtotime('-360 days'));
            $currentweek = date('Y-m-d');
            $record['curent_month_all'] = $this->cm->get_lastWeek_data('demo', $lastweek, $currentweek);
            $record['untakegraph_all'] = $this->cm->view_all("untake_percentage_graph");
            return $this->load->view('ajaxgraph_untake', $record);
        }
    }
    public function addemo() {
        date_default_timezone_set("Asia/Calcutta");
        if (!empty($this->input->post('action')) && !empty($this->input->post('id'))) {
            $id = $this->input->post('id');
            if ($this->input->post('action') == "edit") {
                $display['select_demo'] = $this->cm->select_data("demo", "demo_id", $id);
            }
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            $this->load->library('session');
            $all = $this->session->userdata("Admin");
            // echo "<pre>";
            // print_r($all);
            // die;
            $ins_data['admin_id'] = $all['admin_id'];
            $ins_data['name'] = $data['name'];
            $ins_data['demoDate'] = $data['demoDate'];
            $ins_data['mobileNo'] = $data['mobileNo'];
            $ins_data['branch_id'] = $data['branch_id'];
            $ins_data['department_id'] = $data['department_id'];
            if (!empty($data['course_type'])) {
                $ins_data['course_type'] = $data['course_type'];
            }
            if ($this->input->post('faculty_type') == "hod") {
                $ins_data['hod_id'] = $data['hod_id'];
                $ins_data['faculty_id'] = 0;
            } else {
                $ins_data['faculty_id'] = $data['faculty_id'];
                $ins_data['hod_id'] = 0;
            }
            $select_faculty = $this->cm->select_data("faculty", "faculty_id", $ins_data['faculty_id']);
            $ins_data['fromTime'] = $data['fromTime'];
            $ins_data['toTime'] = $data['toTime'];
            if (@$data['course_type'] == "Single Course") {
                @$cccccc = @$data['courses'];
                if (!empty($data['courses'])) {
                    $ins_data['courseName'] = implode(",", $data['courses']);
                } else {
                    $ins_data['courseName'] = $data['courseName'];
                }
            } else if (@$data['course_type'] == "Package") {
                $cccccc = $data['packageName'];
                $ins_data['packageName'] = $data['packageName'];
                $pk = $this->cm->select_data("package", "package_name", $data['packageName']);
                $course_all = $this->cm->view_all("course");
                $pk_course = explode(",", $pk->course_ids);
                $pkgc = "";
                foreach ($course_all as $row) {
                    if ($row->status == 0) {
                        if (in_array($row->course_id, $pk_course)) {
                            $pkgc = $pkgc . "," . $row->course_name;
                        }
                    }
                }
                $ins_data['courseName'] = trim($pkgc, ",");
            }
            if (!empty($this->input->post('update_id'))) {
                $id = $this->input->post('update_id');
                $re = $this->cm->update_data("demo", $ins_data, "demo_id", $id);
                if ($re) {
                    $this->session->set_userdata("msg_upd", "record updated successfully");
                    redirect('welcome/viewDemo/as');
                }
            } else {
                $ins_data['startingCourse'] = $data['courseName'];
                $ins_data['addDate'] = date("Y-m-d h:i:sa");
                $ins_data['addBy'] = $_SESSION['user_name'];
                date_default_timezone_set("Asia/Kolkata");
                $ins_data['last_update'] = date('Y-m-d H:i:s');
                $select_demo2 = $this->cm->select_data("demo", "mobileNo", $ins_data['mobileNo']);
                if (!empty($select_demo2->demo_id)) {
                    $display['exist_status'] = true;
                    $display['msg'] = "Demo Already exists with " . $ins_data['mobileNo'];
                    $display['showid'] = $select_demo2->demo_id;
                } else {
                    // echo "<pre>";
                    // print_r($ins_data);
                    // die();
                    $re = $this->cm->insert_demo("demo", $ins_data);
                    $ins_remark['demo_id'] = $re->demo_id;
                    $ins_remark['demo_remark_date'] = date("Y-m-d h:i:sa");
                    $ins_remark['demo_remark_comment'] = $data['remarks'];
                    $ins_remark['demo_remark_by'] = $_SESSION['user_name'];
                    $this->enq->insert_data("demo_remark", $ins_remark);
                    if ($re) {
                        if (!empty($select_faculty->phone)) {
                            @$facultymsg = "Demo Name :" . $ins_data['name'] . "   DemoDate :" . $ins_data['demoDate'] . "    Time :" . $ins_data['fromTime'] . "    Course :" . $cccccc;
                            $ch = curl_init();
                            $url = 'http://dndsms.vishawebsolutions.com/api/mt/SendSMS?user=hitesh-RNW&password=Hitz9898&senderid=RNWEDU&channel=Trans&DCS=0&flashsms=0&number=' . $select_faculty->phone . '&text=' . $facultymsg . '&route=15';
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_FAILONERROR, true); // Required for HTTP error codes to be reported via our call to curl_error($ch)
                            @curl_exec(@$ch);
                            if (@curl_error(@$ch)) {
                                //   echo $error_msg = curl_error($ch);
                                
                            }
                            @curl_close(@$ch);
                        }
                        $display['msg'] = "Demo added successfully";
                        $display['showid'] = "Demo ID = " . $re->demo_id;
                    }
                }
            }
        }
        $display['course_all'] = $this->cm->view_all_course("course");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('addemo', $display);
    }
    public function AdDemo_New() {
        date_default_timezone_set("Asia/Calcutta");
        if (!empty($this->input->post('action')) && !empty($this->input->post('id'))) {
            $id = $this->input->post('id');
            if ($this->input->post('action') == "edit") {
                $display['select_demo'] = $this->cm->select_data("demo", "demo_id", $id);
            }
        }
        if (!empty($this->input->post('submit'))) {
            $data = $this->input->post();
            $this->load->library('session');
            $all = $this->session->userdata("Admin");
            // echo "<pre>";
            // print_r($all);
            // die;
            $ins_data['admin_id'] = $all['admin_id'];
            $ins_data['name'] = $data['name'];
            $ins_data['demoDate'] = $data['demoDate'];
            $ins_data['mobileNo'] = $data['mobileNo'];
            $ins_data['branch_id'] = $data['branch_id'];
            $ins_data['department_id'] = $data['department_id'];
            $ins_data['subdepartment_id'] = $data['subdepartment_id'];
            if (!empty($data['course_type'])) {
                $ins_data['course_type'] = $data['course_type'];
            }
            if ($this->input->post('faculty_type') == "hod") {
                $ins_data['hod_id'] = $data['hod_id'];
                $ins_data['faculty_id'] = 0;
            } else {
                $ins_data['faculty_id'] = $data['faculty_id'];
                $ins_data['hod_id'] = 0;
            }
            $select_faculty = $this->cm->select_data("faculty", "faculty_id", $ins_data['faculty_id']);
            $ins_data['fromTime'] = $data['fromTime'];
            $ins_data['toTime'] = $data['toTime'];
            if (@$data['course_type'] == "Single Course") {
                @$cccccc = @$data['courses'];
                if (!empty($data['courses'])) {
                    $ins_data['courseName'] = implode(",", $data['courses']);
                } else {
                    $ins_data['courseName'] = $data['courseName'];
                }
            } else if (@$data['course_type'] == "Package") {
                $cccccc = $data['packageName'];
                $ins_data['packageName'] = $data['packageName'];
                $pk = $this->cm->select_data("package", "package_name", $data['packageName']);
                $course_all = $this->cm->view_all("course");
                $pk_course = explode(",", $pk->course_ids);
                $pkgc = "";
                foreach ($course_all as $row) {
                    if ($row->status == 0) {
                        if (in_array($row->course_id, $pk_course)) {
                            $pkgc = $pkgc . "," . $row->course_name;
                        }
                    }
                }
                $ins_data['courseName'] = trim($pkgc, ",");
            }
            if (!empty($this->input->post('update_id'))) {
                $id = $this->input->post('update_id');
                $re = $this->cm->update_data("demo", $ins_data, "demo_id", $id);
                if ($re) {
                    $this->session->set_userdata("msg_upd", "record updated successfully");
                    redirect('welcome/viewDemo/as');
                }
            } else {
                $ins_data['startingCourse'] = $data['courseName'];
                $ins_data['addDate'] = date("Y-m-d h:i:sa");
                $ins_data['addBy'] = $_SESSION['user_name'];
                date_default_timezone_set("Asia/Kolkata");
                $ins_data['last_update'] = date('Y-m-d H:i:s');
                $select_demo2 = $this->cm->select_data("demo", "mobileNo", $ins_data['mobileNo']);
                if (!empty($select_demo2->demo_id)) {
                    $display['exist_status'] = true;
                    $display['msg'] = "Demo Already exists with " . $ins_data['mobileNo'];
                    $display['showid'] = $select_demo2->demo_id;
                } else {
                    // echo "<pre>";
                    // print_r($ins_data);
                    // die();
                    $re = $this->cm->insert_demo("demo", $ins_data);
                    $ins_remark['demo_id'] = $re->demo_id;
                    $ins_remark['demo_remark_date'] = date("Y-m-d h:i:sa");
                    $ins_remark['demo_remark_comment'] = $data['remarks'];
                    $ins_remark['demo_remark_by'] = $_SESSION['user_name'];
                    $this->enq->insert_data("demo_remark", $ins_remark);
                    if ($re) {
                        if (!empty($select_faculty->phone)) {
                            @$facultymsg = "Demo Name :" . $ins_data['name'] . "   DemoDate :" . $ins_data['demoDate'] . "    Time :" . $ins_data['fromTime'] . "    Course :" . $cccccc;
                            $ch = curl_init();
                            $url = 'http://dndsms.vishawebsolutions.com/api/mt/SendSMS?user=hitesh-RNW&password=Hitz9898&senderid=RNWEDU&channel=Trans&DCS=0&flashsms=0&number=' . $select_faculty->phone . '&text=' . $facultymsg . '&route=15';
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_FAILONERROR, true); // Required for HTTP error codes to be reported via our call to curl_error($ch)
                            @curl_exec(@$ch);
                            if (@curl_error(@$ch)) {
                                //   echo $error_msg = curl_error($ch);
                                
                            }
                            @curl_close(@$ch);
                        }
                        $display['msg'] = "Demo added successfully";
                        $display['showid'] = "Demo ID = " . $re->demo_id;
                    }
                }
            }
        }
        if ($_SESSION['logtype'] == "Super Admin") {
            $display['course_all'] = $this->cm->view_all_course("course");
            $display['department_all'] = $this->cm->view_all("department");
            $display['subdepartment_all'] = $this->cm->view_all("subdepartment");
            $display['branch_all'] = $this->cm->view_all("branch");
            $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        } else {
            $display['course_all'] = $this->cm->view_all_course("course");
            $display['department_all'] = $this->cm->view_all_data("department");
            $display['subdepartment_all'] = $this->cm->view_all_data("subdepartment");
            $display['branch_all'] = $this->cm->view_all_data("branch");
            $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        }
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('AdDemo_New', $display);
    }
    public function fetch_department() {
        if ($this->input->post('branch_id')) {
            echo $this->cm->fetch_department($this->input->post('branch_id'));
        }
    }
    public function filter_subdepart() {
        if ($_SESSION['logtype'] == "Super Admin") {
            $department_id = $this->input->post('department_id');
            $subdepartment_all = $this->cm->view_all("subdepartment");
?>

			 <select class="form-control select2" required name="subdepartment_id" id="subdepartment" style="width: 100%;" onChange="selectcourse()">

                      <option>Select Sub Department</option>

                     <?php foreach ($subdepartment_all as $row) { ?>

   

                      <option <?php if (@$no == 1) {
                    echo "selected";
                } ?>  <?php if (@$select_demo->subdepartment_id == $row->subdepartment_id) {
                    echo "selected";
                } ?>   value="<?php echo $row->subdepartment_id; ?>"><?php echo $row->subdepartment_name; ?></option>

                     	<?php
            } ?>

                    </select>       

        <?php
        } else {
            $department_id = $this->input->post('department_id');
            $subdepartment_all = $this->cm->view_all_data("subdepartment");
?>

			 <select class="form-control select2" required name="subdepartment_id" id="subdepartment" style="width: 100%;" onChange="selectcourse()">

                      <option>Select Sub Department</option>

                     <?php foreach ($subdepartment_all as $row) { ?>

   

                      <option <?php if (@$no == 1) {
                    echo "selected";
                } ?>  <?php if (@$select_demo->subdepartment_id == $row->subdepartment_id) {
                    echo "selected";
                } ?>   value="<?php echo $row->subdepartment_id; ?>"><?php echo $row->subdepartment_name; ?></option>

                     	<?php
            } ?>

                    </select>       

        <?php
        }
    }
    public function filter_course_new() {
        $subdepartment_id = $this->input->post('subdepartment_id');
        $course_all = $this->cm->filter_data("course", "subdepart_ids", $subdepartment_id);
?>

    		<div class="input-group">

    				<select class="form-control select2" required id="courseName" name="courseName" onChange="select_faculty()" style="width: 100%;">

                          <option value="">Select Course</option>

                           <?php foreach ($course_all as $row) {
            if ($row->status == 0) { ?>

                          <option value="<?php echo $row->course_name; ?>"><?php echo $row->course_name; ?></option>

                         	<?php
            }
        } ?>

                        </select>     

                        <span class="input-group-addon"><Button type="button" onclick="addCourse()"><i class="glyphicon glyphicon-plus"></i></button></span>

            </div>

        <?php
    }
    public function filter_package_new() {
        $subdepartment_id = $this->input->post('subdepartment_id');
        $package_all = $this->cm->filter_data("package", "subdepart_ids", $subdepartment_id);
?>

				<select class="form-control select2" required id="packageName" name="packageName" onChange="select_package_course()" style="width: 100%;">

                      <option value="">Select Package</option>

                       <?php foreach ($package_all as $row) {
            if ($row->status == 0) { ?>

                      <option value="<?php echo $row->package_name; ?>"><?php echo $row->package_name; ?></option>

                     	<?php
            }
        } ?>

                    </select>        

        <?php
    }
    public function filter_faculty_new() {
        $branch_id = $this->input->post('branch_id');
        if (!empty($this->input->post('course_name'))) {
            $course_name = $this->input->post('course_name');
            $select_id = $this->tm->select_data("course", "course_name", $course_name);
            $faculty_all = $this->cm->view_all_faculty_new("faculty");
            $course_id = $select_id->course_id;
            $branch_all = $this->cm->view_all("branch");
            // echo "<pre>";
            // print_r($faculty_all);
            // print_r($course_id);
            //die;
            
?>

        				 <select class="form-control select2" required name="faculty_id" id="faculty" style="width: 100%;" onChange="selecttime()">

                              <option value="">Assign To</option> 

                              <?php foreach ($faculty_all as $row) {
                // echo "<pre>";
                // print_r($row);
                $co = explode(",", $row->course_ids);
                $flag = 0;
                for ($i = 0;$i < sizeof($co);$i++) {
                    if ($course_id == $co[$i]) {
                        $flag = 1;
                    }
                }
                $bns = explode(",", $row->branch_ids);
                $flag1 = 0;
                for ($i = 0;$i < sizeof($bns);$i++) {
                    if ($branch_id == $bns[$i]) {
                        $flag1 = 1;
                    }
                }
                if ($flag == 1 && $flag1 == 1) {
                    @$bids = explode(",", @$row->branch_ids);
                    $bname = "";
                    for ($i = 0;$i < sizeof(@$bids);$i++) {
                        foreach ($branch_all as $val) {
                            if ($val->branch_id == @$bids[$i]) {
                                if ($bname == "") {
                                    $bname = $bname . " " . $val->branch_name;
                                } else {
                                    $bname = $bname . " & " . $val->branch_name;
                                }
                            }
                        }
                    }
?>



                             <option <?php if (@$select_demo->faculty_id == $row->faculty_id) {
                        echo "selected";
                    } ?>  value="<?php echo $row->faculty_id; ?>"><?php echo $row->name; ?> -  <?php echo $row->subdepartment_name; ?>  - <?php echo $bname; ?> </option> 

                             	<?php
                }
            } ?> 

                            </select>     

                <?php
        }
        if (!empty($this->input->post('package_name'))) {
            $package_name = $this->input->post('package_name');
            $select_id = $this->cm->select_data("package", "package_name", $package_name);
            $faculty_all = $this->cm->view_all_faculty_new("faculty");
            $package_id = $select_id->package_id;
            $branch_all = $this->cm->view_all("branch");
?>

        				 <select class="form-control select2" required name="faculty_id" id="faculty" style="width: 100%;" onChange="selecttime()">

                              <option value="">Assign To</option>

                              <?php foreach ($faculty_all as $row) {
                $co = explode(",", $row->package_ids);
                $flag = 0;
                for ($i = 0;$i < sizeof($co);$i++) {
                    if ($package_id == $co[$i]) {
                        $flag = 1;
                    }
                }
                $bns = explode(",", $row->branch_ids);
                $flag1 = 0;
                for ($i = 0;$i < sizeof($bns);$i++) {
                    if ($branch_id == $bns[$i]) {
                        $flag1 = 1;
                    }
                }
                if ($flag == 1 && $flag1 == 1) {
                    @$bids = explode(",", @$row->branch_ids);
                    $bname = "";
                    for ($i = 0;$i < sizeof(@$bids);$i++) {
                        foreach ($branch_all as $val) {
                            if ($val->branch_id == @$bids[$i]) {
                                if ($bname == "") {
                                    $bname = $bname . " " . $val->branch_name;
                                } else {
                                    $bname = $bname . " & " . $val->branch_name;
                                }
                            }
                        }
                    }
?>

                              <option <?php if (@$select_demo->faculty_id == $row->faculty_id) {
                        echo "selected";
                    } ?>  value="<?php echo $row->faculty_id; ?>"><?php echo $row->name; ?> -  <?php echo $row->subdepartment_name; ?>  - <?php echo $bname; ?> </option>

                             	<?php
                }
            } ?> 

                            </select>     

                <?php
        }
    }
    public function filter_hod_new() {
        $branch_id = $this->input->post('branch_id');
        if (!empty($this->input->post('course_name'))) {
            $course_name = $this->input->post('course_name');
            $select_id = $this->cm->select_data("course", "course_name", $course_name);
            if ($this->input->post('faculty_type') == "hod") {
                $faculty_all = $this->cm->view_all_hod_new("hod");
            } else {
                $faculty_all = $this->cm->view_all_faculty_new("faculty");
            }
            // echo "<pre>";
            // print_r($faculty_all);
            // die;
            $course_id = $select_id->course_id;
            $branch_all = $this->cm->view_all("branch");
?>



        		<?php if ($this->input->post('faculty_type') == "hod") { ?>

        			<select class="form-control select2" required name="hod_id" id="faculty" style="width: 100%;" onChange="selecttime()">

        		<?php
            } else { ?>

        				 <select class="form-control select2" required name="faculty_id" id="faculty" style="width: 100%;" onChange="selecttime()">

        		<?php
            } ?>

                              <option value="">Assign To</option>

                              <?php foreach ($faculty_all as $row) {
                $co = explode(",", $row->course_ids);
                $flag = 0;
                for ($i = 0;$i < sizeof($co);$i++) {
                    if ($course_id == $co[$i]) {
                        $flag = 1;
                    }
                }
                $bns = explode(",", $row->branch_ids);
                $flag1 = 0;
                for ($i = 0;$i < sizeof($bns);$i++) {
                    if ($branch_id == $bns[$i]) {
                        $flag1 = 1;
                    }
                }
                if ($flag == 1 && $flag1 == 1) {
                    @$bids = explode(",", @$row->branch_ids);
                    $bname = "";
                    for ($i = 0;$i < sizeof(@$bids);$i++) {
                        foreach ($branch_all as $val) {
                            if ($val->branch_id == @$bids[$i]) {
                                if ($bname == "") {
                                    $bname = $bname . " " . $val->branch_name;
                                } else {
                                    $bname = $bname . " & " . $val->branch_name;
                                }
                            }
                        }
                    }
?>



                              <?php if ($this->input->post('faculty_type') == "hod") { ?>

                               <option <?php if (@$select_demo->hod_id == $row->hod_id) {
                            echo "selected";
                        } ?>  value="<?php echo $row->hod_id; ?>"><?php echo $row->name; ?> -  <?php echo $row->subdepartment_name; ?>  - <?php echo $bname; ?> </option>

                              <?php
                    } else { ?>

                              <option <?php if (@$select_demo->faculty_id == $row->faculty_id) {
                            echo "selected";
                        } ?>  value="<?php echo $row->faculty_id; ?>"><?php echo $row->name; ?> -  <?php echo $row->subdepartment_name; ?>  - <?php echo $bname; ?> </option>

                              <?php
                    } ?>

                             	<?php
                }
            } ?> 

                            </select>     

                <?php
        }
        if (!empty($this->input->post('package_name'))) {
            $package_name = $this->input->post('package_name');
            $select_id = $this->cm->select_data("package", "package_name", $package_name);
            if ($this->input->post('faculty_type') == "hod") {
                $faculty_all = $this->cm->view_all_hod_new("hod");
            } else {
                $faculty_all = $this->cm->view_all_faculty_new("faculty");
            }
            $package_id = $select_id->package_id;
            $branch_all = $this->cm->view_all("branch");
?>

        				<?php if ($this->input->post('faculty_type') == "hod") { ?>

        			<select class="form-control select2" required name="hod_id" id="faculty" style="width: 100%;" onChange="selecttime()">

        		<?php
            } else { ?>

        				 <select class="form-control select2" required name="faculty_id" id="faculty" style="width: 100%;" onChange="selecttime()">

        		<?php
            } ?>

                              <option value="">Assign To</option>

                              <?php foreach ($faculty_all as $row) {
                $co = explode(",", $row->package_ids);
                $flag = 0;
                for ($i = 0;$i < sizeof($co);$i++) {
                    if ($package_id == $co[$i]) {
                        $flag = 1;
                    }
                }
                $bns = explode(",", $row->branch_ids);
                $flag1 = 0;
                for ($i = 0;$i < sizeof($bns);$i++) {
                    if ($branch_id == $bns[$i]) {
                        $flag1 = 1;
                    }
                }
                if ($flag == 1 && $flag1 == 1) {
                    @$bids = explode(",", @$row->branch_ids);
                    $bname = "";
                    for ($i = 0;$i < sizeof(@$bids);$i++) {
                        foreach ($branch_all as $val) {
                            if ($val->branch_id == @$bids[$i]) {
                                if ($bname == "") {
                                    $bname = $bname . " " . $val->branch_name;
                                } else {
                                    $bname = $bname . " & " . $val->branch_name;
                                }
                            }
                        }
                    }
?>

                            <?php if ($this->input->post('faculty_type') == "hod") { ?>

                               <option <?php if (@$select_demo->hod_id == $row->hod_id) {
                            echo "selected";
                        } ?>  value="<?php echo $row->hod_id; ?>"><?php echo $row->name; ?> -  <?php echo $row->subdepartment_name; ?>  - <?php echo $bname; ?> </option>

                              <?php
                    } else { ?>

                              <option <?php if (@$select_demo->faculty_id == $row->faculty_id) {
                            echo "selected";
                        } ?>  value="<?php echo $row->faculty_id; ?>"><?php echo $row->name; ?> -  <?php echo $row->subdepartment_name; ?>  - <?php echo $bname; ?> </option>

                              <?php
                    } ?>

                             	<?php
                }
            } ?> 

                            </select>     

                <?php
        }
    }
    public function filter_package_course_new() {
        $package_name = $this->input->post('package_name');
        $pk = $this->cm->select_data("package", "package_name", $package_name);
        $course_all = $this->cm->view_all("course");
        $pk_course = explode(",", $pk->course_ids);
?>

		    <div id="sdc">

    		        <label for="inputPassword3" class="col-sm-2 control-label">Start  Demo Course*</label>

    		            <div class="col-sm-10">

            				<select class="form-control select2" required id="courseName" name="courseName" onChange="select_faculty()" style="width: 100%;">

                                  <option value="">Select Stating Course</option>

                                   <?php foreach ($course_all as $row) {
            if ($row->status == 0) {
                if (in_array($row->course_id, $pk_course)) { ?>

                                  <option value="<?php echo $row->course_name; ?>"><?php echo $row->course_name; ?></option>

                                 	<?php
                }
            }
        } ?>

                                </select> 

                        </div>

            </div>           

            

        <?php
    }
    public function checkTimefaculty() {
        $faculty_id = $this->input->post('faculty_id');
        $display['select_faculty'] = $this->cm->select_data("faculty", "faculty_id", $faculty_id);
        $display['all_time'] = $this->cm->view_all("time");
        $display['demo_all'] = $this->cm->view_all_demo_running("demo");
        $display['startingCourse'] = $this->input->post('courseName');
        $display['demo_date'] = $this->input->post('demo_date');
        $this->load->view('checkTimefaculty', $display);
    }
    public function fetch_subdepartment() {
        if ($this->input->post('department_ids')) {
            echo $this->cm->fetch_subdepartment($this->input->post('department_ids'));
        }
    }
    public function filter_course() {
        $department_id = $this->input->post('department_id');
        $course_all = $this->cm->filter_data("course", "department_id", $department_id);
?>

    		<div class="input-group">

    				<select class="form-control select2" required id="courseName" name="courseName" onChange="select_faculty()" style="width: 100%;">

                          <option value="">Select Course</option>

                           <?php foreach ($course_all as $row) {
            if ($row->status == 0) { ?>

                          <option value="<?php echo $row->course_name; ?>"><?php echo $row->course_name; ?></option>

                         	<?php
            }
        } ?>

                        </select>     

                        <span class="input-group-addon"><Button type="button" onclick="addCourse()"><i class="glyphicon glyphicon-plus"></i></button></span>

            </div>

        <?php
    }
    public function filter_package_course() {
        $package_name = $this->input->post('package_name');
        $pk = $this->cm->select_data("package", "package_name", $package_name);
        $course_all = $this->cm->view_all("course");
        $pk_course = explode(",", $pk->course_ids);
?>

		    <div id="sdc">

    		        <label for="inputPassword3" class="col-sm-2 control-label">Start  Demo Course*</label>

    		            <div class="col-sm-10">

            				<select class="form-control select2" required id="courseName" name="courseName" onChange="select_faculty()" style="width: 100%;">

                                  <option value="">Select Stating Course</option>

                                   <?php foreach ($course_all as $row) {
            if ($row->status == 0) {
                if (in_array($row->course_id, $pk_course)) { ?>

                                  <option value="<?php echo $row->course_name; ?>"><?php echo $row->course_name; ?></option>

                                 	<?php
                }
            }
        } ?>

                                </select> 

                        </div>

            </div>           

            

        <?php
    }
    public function filter_package() {
        $department_id = $this->input->post('department_id');
        $package_all = $this->cm->filter_data("package", "department_id", $department_id);
?>

				<select class="form-control select2" required id="packageName" name="packageName" onChange="select_package_course()" style="width: 100%;">

                      <option value="">Select Package</option>

                       <?php foreach ($package_all as $row) {
            if ($row->status == 0) { ?>

                      <option value="<?php echo $row->package_name; ?>"><?php echo $row->package_name; ?></option>

                     	<?php
            }
        } ?>

                    </select>        

        <?php
    }
    public function filter_package_demo() {
        $department_id = $this->input->post('department_id');
        $package_all = $this->cm->filter_data("package", "department_id", $department_id);
?>

				<select class="form-control select2" required id="packageName" name="packageName" onChange="select_package_course()" style="width: 100%;">

                      <option value="">Select Package</option>

                       <?php foreach ($package_all as $row) {
            if ($row->status == 0) { ?>

                      <option value="<?php echo $row->package_name; ?>"><?php echo $row->package_name; ?></option>

                     	<?php
            }
        } ?>

                    </select>        

        <?php
    }
    public function filter_depart() {
        $branch_id = $this->input->post('branch_id');
        $department_all = $this->cm->view_all("department");
        $select_branch = $this->cm->select_data("branch", "branch_id", $branch_id);
        @$depart = explode(",", @$select_branch->department_ids);
        $no = sizeof($depart);
?>

			 <select class="form-control select2" required name="department_id" id="department" style="width: 100%;" onChange="selectcourse()">

                      <option>Select Department</option>

                     

                      

                       <?php for ($i = 0;$i < sizeof($depart);$i++) {
            foreach ($department_all as $row) {
                if ($depart[$i] == $row->department_id) {
?>

                      <option <?php if (@$no == 1) {
                        echo "selected";
                    } ?>  <?php if (@$select_demo->department_id == $row->department_id) {
                        echo "selected";
                    } ?>   value="<?php echo $row->department_id; ?>"><?php echo $row->department_name; ?></option>

                     	<?php
                }
            }
        } ?>

                    </select>       

        <?php
    }
    public function checkTime() {
        $faculty_id = $this->input->post('faculty_id');
        $display['select_faculty'] = $this->cm->select_data("faculty", "faculty_id", $faculty_id);
        $display['all_time'] = $this->cm->view_all("time");
        $display['demo_all'] = $this->cm->view_all_demo_running("demo");
        $display['startingCourse'] = $this->input->post('courseName');
        $display['demo_date'] = $this->input->post('demo_date');
        $this->load->view('check_time', $display);
    }
    public function demo_download($vs) {
        $display['viewStatus'] = $vs;
        if (!empty($this->input->post('search'))) {
            $data = $this->input->post();
            $display['demo_all'] = $this->cm->filter_demo("demo", $data);
            $display['filter_branch'] = @$data['filter_branch'];
            $display['filter_department'] = @$data['filter_department'];
            $display['filter_faculty'] = @$data['filter_faculty'];
            $display['filter_course'] = @$data['filter_course'];
            $display['filter_demoStatus'] = @$data['filter_demoStatus'];
            $display['filter_demoDate_start'] = @$data['filter_demoDate_start'];
            $display['filter_demoDate_end'] = @$data['filter_demoDate_end'];
            $display['filter_demoName'] = @$data['filter_demoName'];
            $display['filter_demoId'] = @$data['filter_demoId'];
            $display['filter_cancel_reason'] = @$data['filter_cancel_reason'];
        }
        $display["demo_all"] = $this->cm->view_all("demo");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['course_all'] = $this->cm->view_all("course");
        $display['reason_list'] = $this->cm->view_all("cancel_reason_list");
        $display['all_remarks'] = $this->enq->view_all("demo_remark");
        $this->load->view('demo_download', $display);
    }
    public function viewDemo($vs) {
        $display['viewStatus'] = $vs;
        if (!empty($_SESSION['sts_msg'])) {
            $display['sts_msg'] = $_SESSION['sts_msg'];
            unset($_SESSION['sts_msg']);
        }
        if (!empty($this->input->get('action')) && !empty($this->input->get('id'))) {
            $id = $this->input->get('id');
            if ($this->input->get('action') == "delete") {
                if ($this->input->get('status') == 0) {
                    $st['discard'] = 1;
                }
                if ($this->input->get('status') == 1) {
                    $st['discard'] = 0;
                }
                $re = $this->cm->update_data("demo", $st, "demo_id", $id);
                if ($re) {
                    redirect('welcome/viewDemo/' . $vs);
                }
            }
        }
        if (!empty($this->input->post('search'))) {
            $data = $this->input->post();
            $display['demo_all'] = $this->cm->filter_demo("demo", $data);
            $display['filter_branch'] = @$data['filter_branch'];
            $display['filter_department'] = @$data['filter_department'];
            $display['filter_faculty'] = @$data['filter_faculty'];
            $display['filter_course'] = @$data['filter_course'];
            $display['filter_demoStatus'] = @$data['filter_demoStatus'];
            $display['filter_demoDate_start'] = @$data['filter_demoDate_start'];
            $display['filter_demoDate_end'] = @$data['filter_demoDate_end'];
            $display['filter_demoName'] = @$data['filter_demoName'];
            $display['filter_demoId'] = @$data['filter_demoId'];
            $display['filter_phoneNo'] = @$data['filter_phoneNo'];
            $display['filter_cancel_reason'] = @$data['filter_cancel_reason'];
        } else if ($vs == "rd" || $vs == "ord" || $vs == "ld" || $vs == "cfd") {
            if ($vs == "rd" || $vs == "ord") {
                $dst = 0;
            }
            if ($vs == "ld") {
                $dst = 2;
            }
            if ($vs == "cfd") {
                $dst = 4;
            }
            $display['demo_all'] = $this->cm->view_all_demo_status_wise("demo", $dst);
        } else {
            $display['demo_all'] = $this->cm->view_all_demo_limit("demo");
        }
        if (!empty($_SESSION['msg_upd'])) {
            $display['msg'] = $_SESSION['msg_upd'];
            unset($_SESSION['msg_upd']);
        }
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['course_all'] = $this->cm->view_all("course");
        $display['reason_list'] = $this->cm->view_all("cancel_reason_list");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('viewdemo', $display);
    }
    public function changeDemoStatus() {
        date_default_timezone_set("Asia/Calcutta");
        $ctimetamp = date('Y-m-d h:i:s a');
        if ($this->input->post('change_status')) {
            $demo_id = $this->input->post('demo_id');
            $select_demo = $this->cm->select_data("demo", "demo_id", $demo_id);
            $data = $this->input->post();
            $data['statusChangeDate'] = date("Y-m-d");
            $date = date("Y-m-d");
            $vs = $data['vs'];
            if (!empty($data['reason']) && @$data['reason'] != "" && $data['demoStatus'] == "2" || $data['demoStatus'] == "3" || $data['demoStatus'] == "4") {
                $insert['demoStatus'] = $data['demoStatus'];
                $insert['statusChangeDate'] = date("Y-m-d");
                if ($data['demoStatus'] == "3") {
                    $insert['cancel_reason'] = $this->input->post('cancel_reason');
                    $data['reason'] = "Demo Cancel / " . $data['reason'];
                }
                if (!empty($data['leave_from_date']) && !empty($data['leave_to_date']) && $data['demoStatus'] == "2") {
                    $insert['leaveDate'] = $data['leave_from_date'] . "to" . $data['leave_to_date'];
                    $data['reason'] = "Demo Leave : " . $insert['leaveDate'] . " / " . $data['reason'];
                }
                if (!empty($data['leave_from_date']) && !empty($data['leave_to_date']) && $data['demoStatus'] == "4") {
                    $insert['leaveDate'] = $data['leave_from_date'] . "to" . $data['leave_to_date'];
                    $data['reason'] = "Demo Confusion : " . $insert['leaveDate'] . " / " . $data['reason'];
                }
                if ($select_demo->reason == "") {
                    $insert['reason'] = $date . "|/|" . $data['reason'] . "|/|" . $_SESSION['user_name'] . "|/|" . $ctimetamp;
                } else {
                    $insert['reason'] = $select_demo->reason . "&&" . $date . "|/|" . $data['reason'] . "|/|" . $_SESSION['user_name'] . "|/|" . $ctimetamp;
                }
            } else if ($data['demoStatus'] == "1") {
                $insert['demoStatus'] = $data['demoStatus'];
            } else if ($data['demoStatus'] == "0") {
                $insert['demoStatus'] = $data['demoStatus'];
            }
            $qu = $this->cm->update_data("demo", $insert, "demo_id", $demo_id);
            if ($qu) {
                $this->session->set_userdata("sts_msg", "Demo Status has been Changed");
                redirect('welcome/viewDemo/' . $vs);
            }
        }
    }
    public function filter_faculty() {
        $branch_id = $this->input->post('branch_id');
        if (!empty($this->input->post('course_name'))) {
            $course_name = $this->input->post('course_name');
            $select_id = $this->cm->select_data("course", "course_name", $course_name);
            $faculty_all = $this->cm->view_all_faculty("faculty");
            $course_id = $select_id->course_id;
            $branch_all = $this->cm->view_all("branch");
?>

        				 <select class="form-control select2" required name="faculty_id" id="faculty" style="width: 100%;" onChange="selecttime()">

                              <option value="">Assign To</option>

                              <?php foreach ($faculty_all as $row) {
                $co = explode(",", $row->course_ids);
                $flag = 0;
                for ($i = 0;$i < sizeof($co);$i++) {
                    if ($course_id == $co[$i]) {
                        $flag = 1;
                    }
                }
                $bns = explode(",", $row->branch_ids);
                $flag1 = 0;
                for ($i = 0;$i < sizeof($bns);$i++) {
                    if ($branch_id == $bns[$i]) {
                        $flag1 = 1;
                    }
                }
                if ($flag == 1 && $flag1 == 1) {
                    @$bids = explode(",", @$row->branch_ids);
                    $bname = "";
                    for ($i = 0;$i < sizeof(@$bids);$i++) {
                        foreach ($branch_all as $val) {
                            if ($val->branch_id == @$bids[$i]) {
                                if ($bname == "") {
                                    $bname = $bname . " " . $val->branch_name;
                                } else {
                                    $bname = $bname . " & " . $val->branch_name;
                                }
                            }
                        }
                    }
?>

                              <option <?php if (@$select_demo->faculty_id == $row->faculty_id) {
                        echo "selected";
                    } ?>  value="<?php echo $row->faculty_id; ?>"><?php echo $row->name; ?> -  <?php echo $row->department_name; ?>  - <?php echo $bname; ?> </option>

                             	<?php
                }
            } ?> 

                            </select>     

                <?php
        }
        if (!empty($this->input->post('package_name'))) {
            $package_name = $this->input->post('package_name');
            $select_id = $this->cm->select_data("package", "package_name", $package_name);
            $faculty_all = $this->cm->view_all_faculty("faculty");
            $package_id = $select_id->package_id;
            $branch_all = $this->cm->view_all("branch");
?>

        				 <select class="form-control select2" required name="faculty_id" id="faculty" style="width: 100%;" onChange="selecttime()">

                              <option value="">Assign To</option>

                              <?php foreach ($faculty_all as $row) {
                $co = explode(",", $row->package_ids);
                $flag = 0;
                for ($i = 0;$i < sizeof($co);$i++) {
                    if ($package_id == $co[$i]) {
                        $flag = 1;
                    }
                }
                $bns = explode(",", $row->branch_ids);
                $flag1 = 0;
                for ($i = 0;$i < sizeof($bns);$i++) {
                    if ($branch_id == $bns[$i]) {
                        $flag1 = 1;
                    }
                }
                if ($flag == 1 && $flag1 == 1) {
                    @$bids = explode(",", @$row->branch_ids);
                    $bname = "";
                    for ($i = 0;$i < sizeof(@$bids);$i++) {
                        foreach ($branch_all as $val) {
                            if ($val->branch_id == @$bids[$i]) {
                                if ($bname == "") {
                                    $bname = $bname . " " . $val->branch_name;
                                } else {
                                    $bname = $bname . " & " . $val->branch_name;
                                }
                            }
                        }
                    }
?>

                              <option <?php if (@$select_demo->faculty_id == $row->faculty_id) {
                        echo "selected";
                    } ?>  value="<?php echo $row->faculty_id; ?>"><?php echo $row->name; ?> -  <?php echo $row->department_name; ?>  - <?php echo $bname; ?> </option>

                             	<?php
                }
            } ?> 

                            </select>     

                <?php
        }
    }
    public function filter_hod() {
        $branch_id = $this->input->post('branch_id');
        if (!empty($this->input->post('course_name'))) {
            $course_name = $this->input->post('course_name');
            $select_id = $this->cm->select_data("course", "course_name", $course_name);
            if ($this->input->post('faculty_type') == "hod") {
                $faculty_all = $this->cm->view_all_hod_demo("hod");
            } else {
                $faculty_all = $this->cm->view_all_faculty("faculty");
            }
            // echo "<pre>";
            // print_r($faculty_all);
            // die;
            $course_id = $select_id->course_id;
            $branch_all = $this->cm->view_all("branch");
?>



        		<?php if ($this->input->post('faculty_type') == "hod") { ?>

        			<select class="form-control select2" required name="hod_id" id="faculty" style="width: 100%;" onChange="selecttime()">

        		<?php
            } else { ?>

        				 <select class="form-control select2" required name="faculty_id" id="faculty" style="width: 100%;" onChange="selecttime()">

        		<?php
            } ?>

                              <option value="">Assign To</option>

                              <?php foreach ($faculty_all as $row) {
                $co = explode(",", $row->course_ids);
                $flag = 0;
                for ($i = 0;$i < sizeof($co);$i++) {
                    if ($course_id == $co[$i]) {
                        $flag = 1;
                    }
                }
                $bns = explode(",", $row->branch_ids);
                $flag1 = 0;
                for ($i = 0;$i < sizeof($bns);$i++) {
                    if ($branch_id == $bns[$i]) {
                        $flag1 = 1;
                    }
                }
                if ($flag == 1 && $flag1 == 1) {
                    @$bids = explode(",", @$row->branch_ids);
                    $bname = "";
                    for ($i = 0;$i < sizeof(@$bids);$i++) {
                        foreach ($branch_all as $val) {
                            if ($val->branch_id == @$bids[$i]) {
                                if ($bname == "") {
                                    $bname = $bname . " " . $val->branch_name;
                                } else {
                                    $bname = $bname . " & " . $val->branch_name;
                                }
                            }
                        }
                    }
?>



                              <?php if ($this->input->post('faculty_type') == "hod") { ?>

                               <option <?php if (@$select_demo->hod_id == $row->hod_id) {
                            echo "selected";
                        } ?>  value="<?php echo $row->hod_id; ?>"><?php echo $row->name; ?> -  <?php echo $row->department_name; ?>  - <?php echo $bname; ?> </option>

                              <?php
                    } else { ?>

                              <option <?php if (@$select_demo->faculty_id == $row->faculty_id) {
                            echo "selected";
                        } ?>  value="<?php echo $row->faculty_id; ?>"><?php echo $row->name; ?> -  <?php echo $row->department_name; ?>  - <?php echo $bname; ?> </option>

                              <?php
                    } ?>

                             	<?php
                }
            } ?> 

                            </select>     

                <?php
        }
        if (!empty($this->input->post('package_name'))) {
            $package_name = $this->input->post('package_name');
            $select_id = $this->cm->select_data("package", "package_name", $package_name);
            if ($this->input->post('faculty_type') == "hod") {
                $faculty_all = $this->cm->view_all_hod_demo("hod");
            } else {
                $faculty_all = $this->cm->view_all_faculty("faculty");
            }
            $package_id = $select_id->package_id;
            $branch_all = $this->cm->view_all("branch");
?>

        				<?php if ($this->input->post('faculty_type') == "hod") { ?>

        			<select class="form-control select2" required name="hod_id" id="faculty" style="width: 100%;" onChange="selecttime()">

        		<?php
            } else { ?>

        				 <select class="form-control select2" required name="faculty_id" id="faculty" style="width: 100%;" onChange="selecttime()">

        		<?php
            } ?>

                              <option value="">Assign To</option>

                              <?php foreach ($faculty_all as $row) {
                $co = explode(",", $row->package_ids);
                $flag = 0;
                for ($i = 0;$i < sizeof($co);$i++) {
                    if ($package_id == $co[$i]) {
                        $flag = 1;
                    }
                }
                $bns = explode(",", $row->branch_ids);
                $flag1 = 0;
                for ($i = 0;$i < sizeof($bns);$i++) {
                    if ($branch_id == $bns[$i]) {
                        $flag1 = 1;
                    }
                }
                if ($flag == 1 && $flag1 == 1) {
                    @$bids = explode(",", @$row->branch_ids);
                    $bname = "";
                    for ($i = 0;$i < sizeof(@$bids);$i++) {
                        foreach ($branch_all as $val) {
                            if ($val->branch_id == @$bids[$i]) {
                                if ($bname == "") {
                                    $bname = $bname . " " . $val->branch_name;
                                } else {
                                    $bname = $bname . " & " . $val->branch_name;
                                }
                            }
                        }
                    }
?>

                            <?php if ($this->input->post('faculty_type') == "hod") { ?>

                               <option <?php if (@$select_demo->hod_id == $row->hod_id) {
                            echo "selected";
                        } ?>  value="<?php echo $row->hod_id; ?>"><?php echo $row->name; ?> -  <?php echo $row->department_name; ?>  - <?php echo $bname; ?> </option>

                              <?php
                    } else { ?>

                              <option <?php if (@$select_demo->faculty_id == $row->faculty_id) {
                            echo "selected";
                        } ?>  value="<?php echo $row->faculty_id; ?>"><?php echo $row->name; ?> -  <?php echo $row->department_name; ?>  - <?php echo $bname; ?> </option>

                              <?php
                    } ?>

                             	<?php
                }
            } ?> 

                            </select>     

                <?php
        }
    }
    public function getReason() {
        $data = $this->input->post();
        $id = $this->input->post('demo_id');
        if ($data['status'] == "cancel") {
            $reason['reason'] = $data['reason'];
            $this->cm->update_data("demo", $reason, "demo_id", $id);
        }
    }
    public function demoReport() {
        if (!empty($this->input->post('search'))) {
            $data = $this->input->post();
            $display['demo_all'] = $this->cm->filter_demo("demo", $data);
            $display['filter_branch'] = @$data['filter_branch'];
            $display['filter_department'] = @$data['filter_department'];
            $display['filter_faculty'] = @$data['filter_faculty'];
            $display['filter_course'] = @$data['filter_course'];
            $display['filter_demoStatus'] = @$data['filter_demoStatus'];
            $display['filter_demoDate_start'] = @$data['filter_demoDate_start'];
            $display['filter_demoDate_end'] = @$data['filter_demoDate_end'];
            $display['filter_demoName'] = @$data['filter_demoName'];
            $display['filter'] = 1;
        }
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['course_all'] = $this->cm->view_all("course");
        $this->load->view('demo_report', $display);
    }
    public function analysis($stf) {
        $display['viewStatus'] = $stf;
        $data = $this->input->post();
        if (@$this->input->post('search') == "linechart" && @$data['filter_branch'] != "" || @$data['filter_department'] != "") {
            if ($data['filter_branch'] != "" && $data['filter_department'] != "") {
                $bid = $data['filter_branch'];
                $did = $data['filter_department'];
                $display['filter_branch'] = $data['filter_branch'];
                $display['filter_department'] = $data['filter_department'];
                $que = "SELECT * FROM demo 

WHERE demoDate < Now() and demoDate > DATE_ADD(Now(), INTERVAL- 6 MONTH) and branch_id='$bid' and department_id='$did'";
            } else if ($data['filter_branch'] != "") {
                $bid = $data['filter_branch'];
                $display['filter_branch'] = $data['filter_branch'];
                $que = "SELECT * FROM demo 

WHERE demoDate < Now() and demoDate > DATE_ADD(Now(), INTERVAL- 6 MONTH) and branch_id='$bid'";
            } else if ($data['filter_department'] != "") {
                $did = $data['filter_department'];
                $display['filter_department'] = $data['filter_department'];
                $que = "SELECT * FROM demo 

WHERE demoDate < Now() and demoDate > DATE_ADD(Now(), INTERVAL- 6 MONTH) and department_id='$did'";
            }
            if (!empty($que)) {
                $re = $this->db->query($que);
                $display['last'] = $re->result();
            }
        } else {
            $re = $this->db->query("SELECT * FROM demo 

WHERE demoDate < Now() and demoDate > DATE_ADD(Now(), INTERVAL- 6 MONTH)");
            $display['last'] = $re->result();
        }
        if (!empty($this->input->post('search')) && @$this->input->post('search') == "Filter") {
            $data = $this->input->post();
            $display['two_analysis'] = $this->cm->filter_demo_analysis("demo", $data);
            $display['filter_branch'] = @$data['filter_branch'];
            $display['filter_department'] = @$data['filter_department'];
            $display['filter_faculty'] = @$data['filter_faculty'];
            $display['filter_demoDate_start'] = @$data['filter_demoDate_start'];
            $display['filter_demoDate_end'] = @$data['filter_demoDate_end'];
        } else {
            $display['two_analysis'] = $this->cm->demo_analysis("demo");
        }
        if (!empty($this->input->post('faculty_analysis'))) {
            $data = $this->input->post();
            $display['faculty_analysis'] = $this->cm->filter_demo_faculty_analysis("demo", $data);
            $display['filter_demoDate_start'] = @$data['filter_demoDate_start'];
            $display['filter_demoDate_end'] = @$data['filter_demoDate_end'];
        } else {
            $display['faculty_analysis'] = $this->cm->view_all("demo");
        }
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['cancel_reason_all'] = $this->cm->view_all("cancel_reason_list");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $this->load->view('header', $update);
        $this->load->view('analysis', $display);
    }
    public function todayr() {
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['cancel_reason_all'] = $this->cm->view_all("cancel_reason_list");
        $display['demo_all'] = $this->cm->view_all("demo");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('today_report', $display);
    }
    public function courseDetails() {
        if (!empty($this->input->post('filter_course'))) {
            $data = $this->input->post();
            $display['coursefilter'] = $this->cm->filter_course($data);
            $display['filter_department'] = @$data['filter_department'];
            $display['filter_single_course'] = @$data['filter_single_course'];
        }
        if (!empty($this->input->post('filter_package_course'))) {
            $data = $this->input->post();
            $display['packagefilter'] = $this->cm->filter_packages($data);
            $display['filter_department2'] = @$data['filter_department2'];
            $display['filter_package'] = @$data['filter_package'];
        }
        $display['department_all'] = $this->cm->view_all("department");
        $display['course_all'] = $this->cm->view_all("course");
        $display['package_all'] = $this->cm->view_all("package");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('header', $update);
        $this->load->view('course_details', $display);
    }
    public function CounselorDone_graph_cc() {
        $data = $this->input->post();
        $done = $data['k'];
        $display['user_all_couseller'] = $this->cm->view_all_couseller("user");
        // echo "<pre>";
        // print_r($display['user_all_couseller']);
        // die;
        $demo_cousnselor = array();
        if ($done == 1) {
            $lastweek = date('Y-m-d', strtotime('-7 days'));
            $currentweek = date('Y-m-d');
        } else if ($done == 2) {
            $lastweek = date('Y-m-d', strtotime('-30 days'));
            $currentweek = date('Y-m-d');
            // die;
            // $main['all_couselor'] = $this->cm->get_lastWeek_data_demo('demo',$lastweek,$currentweek);
            
        } else if ($done == 3) {
            $lastweek = date('Y-m-d', strtotime('-90 days'));
            $currentweek = date('Y-m-d');
        } else if ($done == 4) {
            $lastweek = date('Y-m-d', strtotime('-180 days'));
            $currentweek = date('Y-m-d');
        } else if ($done == 5) {
            $lastweek = date('Y-m-d', strtotime('-360 days'));
            $currentweek = date('Y-m-d');
        }
        foreach ($display['user_all_couseller'] as $key => $value) {
            $taken_cc_demo[$key]['label'] = "Taken";
            $taken_cc_demo[$key]['y'] = count($this->cm->get_lastWeek_data_demo_cca('demo', $value->name, 'addBy', $lastweek, $currentweek));
            $done_cc_demo[$key]['label'] = "Done";
            $done_cc_demo[$key]['y'] = count($this->cm->get_lastWeek_data_demo_cc('demo', $value->name, 'addBy', $lastweek, $currentweek, '1'));
            $cancle_cc_demo[$key]['label'] = "Cancel";
            $cancle_cc_demo[$key]['y'] = count($this->cm->get_lastWeek_data_demo_cc('demo', $value->name, 'addBy', $lastweek, $currentweek, '3'));
            $leave_cc_demo[$key]['label'] = "Leave";
            $leave_cc_demo[$key]['y'] = count($this->cm->get_lastWeek_data_demo_cc('demo', $value->name, 'addBy', $lastweek, $currentweek, '2'));
            $confusion_cc_demo[$key]['label'] = "Confusion";
            $confusion_cc_demo[$key]['y'] = count($this->cm->get_lastWeek_data_demo_cc('demo', $value->name, 'addBy', $lastweek, $currentweek, '4'));
            $running_cc_demo[$key]['label'] = "Running";
            $running_cc_demo[$key]['y'] = count($this->cm->get_lastWeek_data_demo_cc('demo', $value->name, 'addBy', $lastweek, $currentweek, '0'));
            $taken_name_demo[$key]['label'] = $value->name;
        }
        $display['taken_cc_demo'] = $taken_cc_demo;
        $display['done_cc_demo'] = $done_cc_demo;
        $display['cancle_cc_demo'] = $cancle_cc_demo;
        $display['leave_cc_demo'] = $leave_cc_demo;
        $display['confusion_cc_demo'] = $confusion_cc_demo;
        $display['running_cc_demo'] = $running_cc_demo;
        $display['taken_name_demo'] = $taken_name_demo;
        // echo "<pre>";
        // print_r($taken_cc_demo);
        // exit;
        $display['user_graph_counselor'] = $this->cm->view_all("doned_counselor_graph");
        return $this->load->view('ajax_graph_cc', $display);
    }
    public function cc_graph() {
        $data = $this->input->post();
        $display['user_all_couseller'] = $this->cm->view_all_couseller("user");
        // echo "<pre>";
        // print_r($data['donekey']['sdata']);
        // die;
        $demo_cousnselor = array();
        $done = $data['k'];
        if ($done == 1) {
            $lastweek = date('Y-m-d', strtotime('-7 days'));
            $currentweek = date('Y-m-d');
        } else if ($done == 2) {
            $lastweek = date('Y-m-d', strtotime('-30 days'));
            $currentweek = date('Y-m-d');
            // die;
            // $main['all_couselor'] = $this->cm->get_lastWeek_data_demo('demo',$lastweek,$currentweek);
            
        } else if ($done == 3) {
            $lastweek = date('Y-m-d', strtotime('-90 days'));
            $currentweek = date('Y-m-d');
        } else if ($done == 4) {
            $lastweek = date('Y-m-d', strtotime('-180 days'));
            $currentweek = date('Y-m-d');
        } else if ($done == 5) {
            $lastweek = date('Y-m-d', strtotime('-360 days'));
            $currentweek = date('Y-m-d');
        } else if ($done == 6) {
            $lastweek = date('Y-m-01');
            $currentweek = date('Y-m-t');
        } else {
            $lastweek = date('Y-m-d', strtotime($data['sdate']));
            $currentweek = date('Y-m-d', strtotime($data['edate']));
        }
        $display['untakegraph_all'] = $this->cm->view_all("untake_percentage_graph");
        $display['demo_all_counselor'] = $this->cm->filter_demo_counsalor_analysis("demo", $lastweek, $currentweek);
        return $this->load->view('ajax_cc_performe', $display);
    }
    // New demo dashboard  ----------------------------------------------------------------------
    public function get_demo_Student_detail() {
        $demoId = $this->input->post('demoId');
        $data['demo_record'] = $this->cm->get_demo_details('demo', 'demo_id', $demoId);
        $data['remarks_re'] = $this->cm->get_demo_remarks_details('demo_remark', 'demo_id', $demoId);
        $data['branch'] = $this->cm->get_branch_record('branch');
        $data['department'] = $this->cm->get_branch_record('department');
        $data['package'] = $this->cm->get_branch_record('package');
        $data['faculty'] = $this->cm->get_branch_record('faculty');
        $data['course'] = $this->cm->get_branch_record('course');
        // echo "<pre>";
        // print_r($data);
        $this->load->view('dashboard/demo_student_details', $data);
    }
    public function add_demo_remarks() {
        $data = $this->input->post();
        date_default_timezone_set("Asia/Calcutta");
        $cdate = date('Y-m-d h:i:sa');
        $data['demo_remark_date'] = $cdate;
        $re = $this->cm->insert_add_record('demo_remark', $data);
        if ($re) {
            $record['remarks_re'] = $this->cm->get_demo_remarks_details('demo_remark', 'demo_id', $data['demo_id']);
            $this->session->set_flashdata('msg_alert', 'add remarks successfullty');
        } else {
        }
        $this->load->view('dashboard/add_remarks_by_ajax', $record);
    }
    public function edit_demo_students() {
        $data = $this->input->post();
        $updat['demoDate'] = $data['demoDate'];
        $updat['name'] = $data['name'];
        $updat['mobileNo'] = $data['mobileNo'];
        $updat['branch_id'] = $data['branch_id'];
        if ($data['demo_course_type'] == "Single Course") {
            if (!empty($data['courseName'])) {
                $updat['department_id'] = $data['department'];
                $updat['course_type'] = $data['demo_course_type'];
                $updat['courseName'] = $data['courseName'];
                $updat['startingCourse'] = $data['courseName'];
            }
        } else if ($data['demo_course_type'] == "Package") {
            // $startingCourse =  explode(',',$updat['courseName']);
            if (!empty($data['packageName'])) {
                $updat['department_id'] = $data['department'];
                $updat['course_type'] = $data['demo_course_type'];
                $updat['packageName'] = $data['packageName'];
                // $updat['startingCourse'] = $startingCourse[0];
                $pk = $this->cm->select_data("package", "package_name", $data['packageName']);
                $course_all = $this->cm->view_all("course");
                $pk_course = explode(",", $pk->course_ids);
                $pkgc = "";
                foreach ($course_all as $row) {
                    if ($row->status == 0) {
                        if (in_array($row->course_id, $pk_course)) {
                            $pkgc = $pkgc . "," . $row->course_name;
                        }
                    }
                }
                $updat['courseName'] = trim($pkgc, ",");
                $startingCourse = explode(',', $updat['courseName']);
                $updat['startingCourse'] = $startingCourse[0];
            }
        }
        $updat['faculty_id'] = $data['faculty_id'];
        $updat['fromTime'] = @$data['fromTIme'];
        $updat['toTime'] = @$data['toTime'];
        $old_demo_record = $this->cm->get_demo_record('demo', 'demo_id', $data['demo_id']);
        if ($updat['name'] != $old_demo_record->name) {
            $his_name = $updat['name'] . ",change";
        } else {
            $his_name = $updat['name'] . ",nochange";
        }
        if ($updat['demoDate'] != $old_demo_record->demoDate) {
            $his_demoDate = $updat['demoDate'] . ",change";
        } else {
            $his_demoDate = $updat['demoDate'] . ",nochange";
        }
        if ($updat['mobileNo'] != $old_demo_record->mobileNo) {
            $his_mobileNo = $updat['mobileNo'] . ",change";
        } else {
            $his_mobileNo = $updat['mobileNo'] . ",nochange";
        }
        if ($updat['branch_id'] != $old_demo_record->branch_id) {
            $his_branchId = $updat['branch_id'] . ",change";
        } else {
            $his_branchId = $updat['branch_id'] . ",nochange";
        }
        if ($updat['department_id'] != $old_demo_record->department_id) {
            $his_department = $updat['department_id'] . ",change";
        } else {
            $his_department = $updat['department_id'] . ",nochange";
        }
        if ($updat['course_type'] != $old_demo_record->course_type) {
            $his_course_type = $updat['course_type'] . ",change";
        } else {
            $his_course_type = $updat['course_type'] . ",nochange";
        }
        if ($updat['courseName'] != $old_demo_record->courseName) {
            $his_courseName = $updat['courseName'] . ",change";
        } else {
            $his_courseName = $updat['courseName'] . ",nochange";
        }
        if ($updat['startingCourse'] != $old_demo_record->startingCourse) {
            $his_startingcourse = $updat['startingCourse'] . ",change";
        } else {
            $his_startingcourse = $updat['startingCourse'] . ",nochange";
        }
        if ($updat['faculty_id'] != $old_demo_record->faculty_id) {
            $his_facultyId = $updat['faculty_id'] . ",change";
        } else {
            $his_facultyId = $updat['faculty_id'] . ",nochange";
        }
        if ($updat['fromTime'] != $old_demo_record->fromTime) {
            $his_fromTime = $updat['fromTime'] . ",change";
        } else {
            $his_fromTime = $updat['fromTime'] . ",nochange";
        }
        if ($updat['toTime'] != $old_demo_record->toTime) {
            $his_toTime = $updat['toTime'] . ",change";
        } else {
            $his_toTime = $updat['toTime'] . ",nochange";
        }
        $last_update_date = date("Y-m-d") . " " . date("h:i:s");
        $changed_by = @$_SESSION['Admin']['username'];
        $demo_history = array('demo_id' => $data['demo_id'], 'name' => $his_name, 'demoDate' => $his_demoDate, 'mobileNo' => $his_mobileNo, 'branch_id' => $his_branchId, 'department_id' => $his_department, 'courseName' => $his_courseName, 'course_type' => $his_course_type, 'startingCourse' => $his_startingcourse, 'faculty_id' => $his_facultyId, 'fromTime' => $his_fromTime, 'toTime' => $his_toTime, 'addBy' => $changed_by . ",nochange", 'last_updated_date' => $last_update_date);
        $this->cm->insert_demo_history('demo_history', $demo_history);
        $demo_id = $data['demo_id'];
        $redemo = $this->enq->update_data("demo", $updat, "demo_id", $demo_id);
        if ($redemo) {
            $this->session->set_flashdata('msg_alert1', "Demo update Successfully");
            $demoId = $data['demo_id'];
            $data1['demo_record'] = $this->cm->get_demo_details('demo', 'demo_id', $demoId);
            $data1['remarks_re'] = $this->cm->get_demo_remarks_details('demo_remark', 'demo_id', $demoId);
            $data1['branch'] = $this->cm->get_branch_record('branch');
            $data1['department'] = $this->cm->get_branch_record('department');
            $data1['package'] = $this->cm->get_branch_record('package');
            $data1['faculty'] = $this->cm->get_branch_record('faculty');
            $data1['course'] = $this->cm->get_branch_record('course');
            // echo "<pre>";
            // print_r($data);
            $this->load->view('dashboard/demo_student_details1', $data1);
        }
    }
    public function get_atten_follow() {
        $demoId = $this->input->post('demoId');
        $data['demo_record'] = $this->cm->get_demo_details('demo', 'demo_id', $demoId);
        // $data['remarks_re'] =  $this->cm->get_demo_remarks_details('demo_remark','demo_id',$demoId);
        // $data['branch'] =  $this->cm->get_branch_record('branch');
        // $data['department'] =  $this->cm->get_branch_record('department');
        // $data['package'] =  $this->cm->get_branch_record('package');
        // $data['faculty'] =  $this->cm->get_branch_record('faculty');
        // $data['course'] =  $this->cm->get_branch_record('course');
        // echo "<pre>";
        // print_r($data);
        $this->load->view('dashboard/demo_attendance_follow', $data);
    }
    public function discardDemo() {
        $data = $this->input->post();
        if (!empty($data['demo_id'])) {
            $demo_id = $data['demo_id'];
            $dupd['discard'] = 1;
            $dupd['demo_discard_by'] = $_SESSION['user_name'];
            $dupd['demo_discard_reason'] = $data['discard_cancel_reason'];
            $dupd['demo_discard_comment'] = $data['discard_cancel_comment'];
            $dupd['demo_discard_timestamp'] = date("Y-m-d") . " " . date("h:i:s");
            $resdemo = $this->cm->update_data("demo", $dupd, "demo_id", $demo_id);
            if ($resdemo) {
                $this->session->set_flashdata('discard_alert', "Demo Discard Successfully");
                // $display['response_list'] = $this->cm->view_all("list_student_response");
                // $this->load->view('discard_success_page',$display);
                
            }
        }
    }
    public function history_demo_student() {
        $demoId = $this->input->post('demoId');
        $response['student_history'] = $this->cm->get_history_demo_students('demo_history', 'demo_id', $demoId);
        $response['branch'] = $this->cm->view_all("branch");
        $response['department'] = $this->cm->view_all("department");
        $response['faculty'] = $this->cm->view_all("faculty");
        $response['demo_record'] = $this->cm->get_demo_details('demo', 'demo_id', $demoId);
        $this->load->view('dashboard/view_demo_student_history', $response);
    }
    public function dd() {
        if (count($_POST) > 0 && isset($_POST['user'])) {
            $data['user'] = $_POST['user'];
            $data['token'] = $_POST['token'];
        } else {
            $data['msg'] = "no data found";
        }
        echo json_encode($data);
    }
    public function hello() {
        echo json_encode($id);
    }
}
