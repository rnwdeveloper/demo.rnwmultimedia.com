<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MenuTop extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model("Dbcommon", "cm");
        $this->load->model("Quickadmissionprocess", "admi");
        $this->load->model("AdminSettingsModel", "admin");
        $this->load->model("Task", "tm");
        $this->load->helper('loggs');
        $this->load->library('session');
        //$this->load->helper('urldata');
        date_default_timezone_set('Asia/Kolkata');
    }
    public function main_menu()
    {
        $display['country_all'] = $this->cm->view_all("country");
        $display['state_all'] = $this->cm->view_all("state");
        $display['city_all'] = $this->cm->view_all("cities");
        $display['user_all'] = $this->cm->Role_all_admin("user");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['department_all'] = $this->cm->view_all("department");
        $display['subdepartment_all'] = $this->cm->view_all("subdepartment");
        $display['all_gst_daynamic_field'] = $this->cm->view_all("gst_daynamic_field");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");

        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
        $update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
        $update['course_completed'] = $this->cm->course_completed_student("admission_courses");
        $update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
        $update['course_data'] = $this->cm->view_all("course");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");

        $this->load->view('erp/erpheader', $update);
        $this->load->view('sidebar/main_menu',$display);
    }

    public function ajax_mainmenu()
    {
       if ($this->input->post('submit')) {
            $data = $this->input->post();

            date_default_timezone_set('Asia/Kolkata');
            $data['created_at'] = date('d-m-Y h:i:s');
            // $data['created_by'] = $_SESSION['user_name'];
            unset($data['submit']);            

            if ($this->input->post('f_module_id')) {
                $id = $this->input->post('f_module_id');
                unset($data['f_module_id']);
                $query = $this->admin->update_record('f_module', $data, 'f_module_id', $id);
                if ($query) {
                    $recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
                    echo json_encode($recp); // echo "1";
                } else {
                    $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                    echo json_encode($recp); // echo "2";
                }
            } else {
                unset($data['f_module_id']);
                $query = $this->admin->import_record('f_module', $data);
                if ($query) {
                    $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
                    echo json_encode($recp); // echo "1";
                } else {
                    $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                    echo json_encode($recp); // echo "2";
                }

            }
        }
    }

    public function get_record_mainmenu()
    {
        $id = $this->input->post('f_module_id');
        $record['single_record'] = $this->admin->get_reco('f_module', 'f_module_id', $id);
        echo json_encode($record);
    }

    public function delete_mainmenu() {
        $table = $this->input->post('table');
        $field = $this->input->post('field');
        $id = $this->input->post('id');
        $query = $this->admin->delete_record($table, $field, $id);
        if ($query) {
            $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Deleted");
            echo json_encode($recp); // echo "1";
        } else {
            $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
            echo json_encode($recp); // echo "2";
        }
    }

    // public function update_status()
    // {
    //     $data = $this->input->post(); 
    //     $reco[$data['field']] = $data['status'];
    
    //     $re = $this->admin->update_record($data['table'], $reco, $data['check_field'], $data['id']);

    //     if ($re) {
    //         $recp["status"] = array('status' => 1, "msg" => "Status updated succefully.");
    //         echo json_encode($recp);
    //     } else {
    //         $recp["status"] = array('status' => 2, "msg" => "Something Wrong");
    //         echo json_encode($recp);
    //     }
    // }
    
    public function Multiple_rowremove()
    {
        $data = $this->input->post();
      
        // $status_check = 1;

        for ($i = 0; $i < sizeof($data['ids']); $i++) {
            $result = $this->admin->delete_record('f_module', 'f_module_id', $data['ids'][$i]);

            if ($result) {
                $status_check = 1;
            } else {
                $status_check = 0;
            }
        }
        if ($status_check == 1) {
            $record = array('status' => 1, "msg" => "These Records Deleted");
            $recp['all_record'] = $record;
            echo json_encode($recp);
        } else {
            $recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
            echo json_encode($recp);
        }
    }

    function mid_menu()
    {
        $display['country_all'] = $this->cm->view_all("country");
        $display['state_all'] = $this->cm->view_all("state");
        $display['city_all'] = $this->cm->view_all("cities");
        $display['user_all'] = $this->cm->Role_all_admin("user");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['department_all'] = $this->cm->view_all("department");
        $display['subdepartment_all'] = $this->cm->view_all("subdepartment");
        $display['all_gst_daynamic_field'] = $this->cm->view_all("gst_daynamic_field");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");

        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
        $update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
        $update['course_completed'] = $this->cm->course_completed_student("admission_courses");
        $update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
        $update['course_data'] = $this->cm->view_all("course");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");

        $this->load->view('erp/erpheader', $update);
        $this->load->view('sidebar/mid_menu',$display);
    }

    function ajax_midmenu()
    {
        
        if ($this->input->post('submit')) {
            $data = $this->input->post();

            date_default_timezone_set('Asia/Kolkata');
            // $data['created_date'] = date('d-m-Y h:i:s');
            // $data['created_by'] = $_SESSION['user_name'];
            unset($data['submit']);
            @$data['m_module_id'] = implode(',', $data['m_module_id']);
            // @$data['department_id'] = implode(',', $data['department_id']);

            if ($this->input->post('m_module_id')) {
                $id = $this->input->post('m_module_id');
                unset($data['m_module_id']);
                $query = $this->admin->update_record('m_module', $data, 'm_module_id', $id);
                if ($query) {
                    $recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
                    echo json_encode($recp); // echo "1";
                } else {
                    $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                    echo json_encode($recp); // echo "2";
                }
            } else {
                unset($data['m_module_id']);
                $query = $this->admin->import_record('m_module', $data);
                if ($query) {
                    $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
                    echo json_encode($recp); // echo "1";
                } else {
                    $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                    echo json_encode($recp); // echo "2";
                }
            }
        }
    }

    public function get_record_midmenu()
    {
        $id = $this->input->post('m_module_id');
        $record['single_record'] = $this->admin->get_reco('m_module', 'm_module_id', $id);
        echo json_encode($record);
    }

    public function midmenu() {
        $table = $this->input->post('table');
        $field = $this->input->post('field');
        $id = $this->input->post('id');
        $query = $this->admin->delete_record($table, $field, $id);
        if ($query) {
            $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Deleted");
            echo json_encode($recp); // echo "1";
        } else {
            $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
            echo json_encode($recp); // echo "2";
        }
    }

    // public function update_status_mid()
    // {
    //     $data = $this->input->post(); 
    //     $reco[$data['field']] = $data['status'];
    
    //     $re = $this->admin->update_record($data['table'], $reco, $data['check_field'], $data['id']);

    //     if ($re) {
    //         $recp["status"] = array('status' => 1, "msg" => "Status updated succefully.");
    //         echo json_encode($recp);
    //     } else {
    //         $recp["status"] = array('status' => 2, "msg" => "Something Wrong");
    //         echo json_encode($recp);
    //     }
    // }
    
    public function Multiple_rowremove_mid()
    {
        $data = $this->input->post();
      
        // $status_check = 1;

        for ($i = 0; $i < sizeof($data['ids']); $i++) {
            $result = $this->admin->delete_record('m_module', 'm_module_id', $data['ids'][$i]);

        // print_r($result);

            if ($result) {
                $status_check = 1;
            } else {
                $status_check = 0;
            }
        }
        if ($status_check == 1) {
            $record = array('status' => 1, "msg" => "These Records Deleted");
            $recp['all_record'] = $record;
            echo json_encode($recp);
        } else {
            $recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
            echo json_encode($recp);
        }
    }

    public function delete_midmenu() {
        $table = $this->input->post('table');
        $field = $this->input->post('field');
        $id = $this->input->post('id');
        $query = $this->admin->delete_record($table, $field, $id);
        if ($query) {
            $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Deleted");
            echo json_encode($recp); // echo "1";
        } else {
            $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
            echo json_encode($recp); // echo "2";
        }
    }

function las_menu()
    {
        $display['country_all'] = $this->cm->view_all("country");
        $display['state_all'] = $this->cm->view_all("state");
        $display['city_all'] = $this->cm->view_all("cities");
        $display['user_all'] = $this->cm->Role_all_admin("user");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['department_all'] = $this->cm->view_all("department");
        $display['subdepartment_all'] = $this->cm->view_all("subdepartment");
        $display['all_gst_daynamic_field'] = $this->cm->view_all("gst_daynamic_field");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");

        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
        $update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
        $update['course_completed'] = $this->cm->course_completed_student("admission_courses");
        $update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
        $update['course_data'] = $this->cm->view_all("course");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");

        $this->load->view('erp/erpheader', $update);
        $this->load->view('sidebar/las_menu',$display);
    }

    function ajax_lasmenu()
    {
        
        if ($this->input->post('submit')) {
            $data = $this->input->post();

            date_default_timezone_set('Asia/Kolkata');
            // $data['created_date'] = date('d-m-Y h:i:s');
            // $data['created_by'] = $_SESSION['user_name'];
            unset($data['submit']);
            @$data['l_module_id'] = implode(',', $data['l_module_id']);
            // @$data['department_id'] = implode(',', $data['department_id']);

            if ($this->input->post('l_module_id')) {
                $id = $this->input->post('l_module_id');
                unset($data['l_module_id']);
                $query = $this->admin->update_record('l_module', $data, 'l_module_id', $id);
                if ($query) {
                    $recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
                    echo json_encode($recp); // echo "1";
                } else {
                    $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                    echo json_encode($recp); // echo "2";
                }
            } else {
                unset($data['l_module_id']);
                $query = $this->admin->import_record('l_module', $data);
                if ($query) {
                    $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
                    echo json_encode($recp); // echo "1";
                } else {
                    $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                    echo json_encode($recp); // echo "2";
                }
            }
        }
    }

    public function get_record_lasmenu()
    {
        $id = $this->input->post('l_module_id');
        $record['single_record'] = $this->admin->get_reco('l_module', 'l_module_id', $id);
        echo json_encode($record);
    }

    public function lasmenu() {
        $table = $this->input->post('table');
        $field = $this->input->post('field');
        $id = $this->input->post('id');
        $query = $this->admin->delete_record($table, $field, $id);
        if ($query) {
            $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Deleted");
            echo json_encode($recp); // echo "1";
        } else {
            $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
            echo json_encode($recp); // echo "2";
        }
    }

    public function update_status()
    {
        $data = $this->input->post(); 
        $reco[$data['field']] = $data['status'];
    
        $re = $this->admin->update_record($data['table'], $reco, $data['check_field'], $data['id']);

        if ($re) {
            $recp["status"] = array('status' => 1, "msg" => "Status updated succefully.");
            echo json_encode($recp);
        } else {
            $recp["status"] = array('status' => 2, "msg" => "Something Wrong");
            echo json_encode($recp);
        }
    }
    
    public function Multiple_rowremove_las()
    {
        $data = $this->input->post();
      
        $status_check = 1;   

        for ($i = 0; $i < sizeof($data['ids']); $i++) {
            $result = $this->admin->delete_record('l_module', 'l_module_id', $data['ids'][$i]);

            if ($result) {
                $status_check = 1;
            } else {
                $status_check = 0;
            }
        }

        if ($status_check == 1) {
            $record = array('status' => 1, "msg" => "These Records Deleted");
            $recp['all_record'] = $record;
            echo json_encode($recp);
        } else {
            $recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
            echo json_encode($recp);
        }
    }

    public function ss() {
        $table = $this->input->post('table');
        $field = $this->input->post('field');
        $id = $this->input->post('id');
        $query = $this->admin->delete_record($table, $field, $id);
        if ($query) {
            $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Deleted");
            echo json_encode($recp); // echo "1";
        } else {
            $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
            echo json_encode($recp); // echo "2";
        }
    }

    public function las_menu_table()
    {
        $display['country_all'] = $this->cm->view_all("country");
        $display['state_all'] = $this->cm->view_all("state");
        $display['city_all'] = $this->cm->view_all("cities");
        $display['user_all'] = $this->cm->Role_all_admin("user");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['department_all'] = $this->cm->view_all("department");
        $display['subdepartment_all'] = $this->cm->view_all("subdepartment");
        $display['all_gst_daynamic_field'] = $this->cm->view_all("gst_daynamic_field");
        $display['l_module'] = $this->cm->view_all("l_module");
        $this->load->view('sidebar/ajex_lasmenu',$display);
    }
    public function mid_menu_table()
    {
        $display['country_all'] = $this->cm->view_all("country");
        $display['state_all'] = $this->cm->view_all("state");
        $display['city_all'] = $this->cm->view_all("cities");
        $display['user_all'] = $this->cm->Role_all_admin("user");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['department_all'] = $this->cm->view_all("department");
        $display['subdepartment_all'] = $this->cm->view_all("subdepartment");
        $display['all_gst_daynamic_field'] = $this->cm->view_all("gst_daynamic_field");
        $display['l_module'] = $this->cm->view_all("l_module");
        $display['m_module'] = $this->cm->view_all("m_module");
        $display['l_module'] = $this->cm->view_all("l_module"); 
        $display['country_all'] = $this->cm->view_all("country");
        $display['state_all'] = $this->cm->view_all("state");
        $display['city_all'] = $this->cm->view_all("cities");
        $display['user_all'] = $this->cm->Role_all_admin("user");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['department_all'] = $this->cm->view_all("department");
        $display['subdepartment_all'] = $this->cm->view_all("subdepartment");
        $display['all_gst_daynamic_field'] = $this->cm->view_all("gst_daynamic_field");
        $this->load->view('sidebar/ajex_midmenu',$display);
    }

    public function main_menu_table()
    {
        $display['country_all'] = $this->cm->view_all("country");
        $display['state_all'] = $this->cm->view_all("state");
        $display['city_all'] = $this->cm->view_all("cities");
        $display['user_all'] = $this->cm->Role_all_admin("user");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['department_all'] = $this->cm->view_all("department");
        $display['subdepartment_all'] = $this->cm->view_all("subdepartment");
        $display['all_gst_daynamic_field'] = $this->cm->view_all("gst_daynamic_field");
        $display['l_module'] = $this->cm->view_all("l_module");
        $display['m_module'] = $this->cm->view_all("m_module");
        $display['f_module'] = $this->cm->view_all("f_module"); 
        $display['country_all'] = $this->cm->view_all("country");
        $display['state_all'] = $this->cm->view_all("state");
        $display['city_all'] = $this->cm->view_all("cities");
        $display['user_all'] = $this->cm->Role_all_admin("user");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['department_all'] = $this->cm->view_all("department");
        $display['subdepartment_all'] = $this->cm->view_all("subdepartment");
        $display['all_gst_daynamic_field'] = $this->cm->view_all("gst_daynamic_field");
        $this->load->view('sidebar/ajex_mainmenu',$display);
    }

       public function page_menu()
    {
        $display['country_all'] = $this->cm->view_all("country");
        $display['state_all'] = $this->cm->view_all("state");
        $display['city_all'] = $this->cm->view_all("cities");
        $display['user_all'] = $this->cm->Role_all_admin("user");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['department_all'] = $this->cm->view_all("department");
        $display['subdepartment_all'] = $this->cm->view_all("subdepartment");
        $display['all_gst_daynamic_field'] = $this->cm->view_all("gst_daynamic_field");
        $display['p_module'] = $this->cm->view_all("p_module");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['p_module'] = $this->cm->view_all("p_module");
        $update['batch_datas'] = $this->cm->batch_notification_data("admission_courses");
        $update['count_batch'] = $this->cm->count_batch_notification("admission_courses");
        $update['course_completed'] = $this->cm->course_completed_student("admission_courses");
        $update['count_course_notifive'] = $this->cm->count_course_notification("admission_courses");
        $update['course_data'] = $this->cm->view_all("course");
        $update['upd_faculty'] = $this->cm->view_all("faculty");
        $update['upd_branch'] = $this->cm->view_all("branch");
        $update['upd_see'] = $this->cm->check_update("demo");

        $this->load->view('erp/erpheader', $update);
        $this->load->view('sidebar/page_menu',$display);
    }
    
    public function page_menu_table()
    {
        $display['country_all'] = $this->cm->view_all("country");
        $display['state_all'] = $this->cm->view_all("state");
        $display['city_all'] = $this->cm->view_all("cities");
        $display['user_all'] = $this->cm->Role_all_admin("user");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['department_all'] = $this->cm->view_all("department");
        $display['subdepartment_all'] = $this->cm->view_all("subdepartment");
        $display['all_gst_daynamic_field'] = $this->cm->view_all("gst_daynamic_field");
        $display['l_module'] = $this->cm->view_all("l_module");
        $display['m_module'] = $this->cm->view_all("m_module");
        $display['f_module'] = $this->cm->view_all("f_module"); 
        $display['country_all'] = $this->cm->view_all("country");
        $display['state_all'] = $this->cm->view_all("state");
        $display['city_all'] = $this->cm->view_all("cities");  
        $display['p_module'] = $this->cm->view_all("p_module");  
        $display['user_all'] = $this->cm->Role_all_admin("user");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['department_all'] = $this->cm->view_all("department");
        $display['subdepartment_all'] = $this->cm->view_all("subdepartment");
        $display['all_gst_daynamic_field'] = $this->cm->view_all("gst_daynamic_field");
        $this->load->view('sidebar/ajex_pagemenu',$display);
    }

    public function get_record_pagemenu()
    {
        $id = $this->input->post('p_module_id');
        $record['single_record'] = $this->admin->get_reco('p_module', 'p_module_id', $id);
        echo json_encode($record);
    }

    function ajax_pagemenu()
    {
        
        if ($this->input->post('submit')) {
            $data = $this->input->post();
            $data['created_at'] = date('d-m-Y h:i:s');
            date_default_timezone_set('Asia/Kolkata');
            unset($data['submit']);
            if ($this->input->post('p_module_id')) {
                $id = $this->input->post('p_module_id');
                unset($data['p_module_id']);    
                $query = $this->admin->update_record('p_module', $data, 'p_module_id', $id); 
                if ($query) {
                    $recp["all_record"] = array('status' => 2, "msg" => "HI! This Record Successfully Updated");
                    echo json_encode($recp); // echo "1";
                } else { 
                    $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                    echo json_encode($recp); // echo "2";
                }
            } else {
                unset($data['p_module_id']);
                $query = $this->admin->import_record('p_module', $data);
                if ($query) {
                    $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
                    echo json_encode($recp); // echo "1";
                } else {
                    $recp["all_record"] = array('status' => 3, "msg" => "Something Wrong");
                    echo json_encode($recp); // echo "2";
                }
            }
        }
    }

    public function Multiple_rowremove_page()
    {
        $data = $this->input->post();
        
        $status_check = 1;    

        for ($i = 0; $i < sizeof($data['ids']); $i++) {

            $result = $this->admin->delete_record('l_module', 'l_module_id', $data['ids'][$i]);

            if ($result) {
                $status_check = 1;
            } else {
                $status_check = 0;
            }
        }

        if ($status_check == 1) {
            $record = array('status' => 1, "msg" => "These Records Deleted");
            $recp['all_record'] = $record;
            echo json_encode($recp);
        } else {
            $recp['all_record'] = array('status' => 2, "msg" => "Something Wrong");
            echo json_encode($recp);
        }
    }

    public function get_midmenu(){
        $data = $this->input->post();
        $f_module_list = $this->admi->get_reco_multiple('m_module','f_module_id',$data['f_module_id']);
        echo '<option value="">Select Batch</option>';
        foreach($f_module_list as $db) { ?>
        <option value="<?php echo $db->m_module_id; ?>"><?php echo $db->module_name; ?></option>
        <?php } 
    }

    public function get_lasmenu(){
        $data = $this->input->post();
        $l_module_list = $this->admi->get_reco_multiple('l_module','m_module_id',$data['m_module_id']);
        echo '<option value="">Select Batch</option>';
        foreach($l_module_list as $db) { ?>
        <option value="<?php echo $db->l_module_id; ?>"><?php echo $db->name; ?></option>
        <?php } 
    }


}
?>
