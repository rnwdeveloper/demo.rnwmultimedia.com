<?php

class Task extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Calcutta");
        $this->load->database("another_db", true);
        $CI = &get_instance();
        $this->db2 = $CI->load->database("another_db", true);
        // Your own constructor code
    }
    public function view_all($tbl)
    {
        // echo "<pre>";
        // print_r($_SESSION);
        // die;

        if ($_SESSION["logtype"] == "Super Admin") {
            $data = $this->db->get($tbl);
        } else {
            // echo "<pre>";
            // print_r($_SESSION['admin_id']);
            // die;
            $this->db->where("admin_id", $_SESSION["admin_id"]);
            $data = $this->db->get($tbl);
        }

        return $data->result();
    }
    public function insert_data($tbl, $data)
    {
        //print_r($data);
        //die();
        return $this->db->insert($tbl, $data);
    }
    public function insert_data_all($tbl, $data)
    {
        //print_r($data);
        //die();
        $this->db->insert($tbl, $data);
        return $this->db->insert_id();
    }

    public function seat_insert_data($tbl, $data)
    {
        //print_r($data);
        //die();
        $this->db->insert($tbl, $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function update_data($tbl, $data, $wher, $id)
    {
        // print_r($data);
        // die();
        $this->db->where($wher, $id);
        return $this->db->update($tbl, $data);
    }

    public function chart()
    {
        if (
            isset($_SESSION["logtype"]) &&
            $_SESSION["logtype"] == "Super Admin"
        ) {
            $query = "SELECT * FROM task_group";
        } else {
            if ($_SESSION["logtype"] == "Admin") {
                //...
                //$query = "SELECT * FROM task_group WHERE admin_id = '".$_SESSION['admin_id']."' ";
                $query = "SELECT * FROM task_group";
            } else {
                $t = "SELECT * FROM logtype ";
                $t1 = $this->db->query($t);
                $t2 = $t1->result();
                $id = 0;
                foreach ($t2 as $key => $value) {
                    if ($value->admin_id == 0) {
                        if ($value->logtype_name == $_SESSION["logtype"]) {
                            $id = $value->logtype_id;
                        }
                    }
                }
                $gid = 0;
                $k = "SELECT * FROM task_group_member";
                $k1 = $this->db->query($k);
                $k2 = $k1->result();

                foreach ($k2 as $key => $value) {
                    if ($value->member_account_id == $_SESSION["user_id"]) {
                        $gid = $value->member_group_id;
                    }
                }

                //.. $query = "SELECT * FROM task_group WHERE admin_id = '".$_SESSION['admin_id']."' && logtype_id = '".$id."' && group_id='".$gid."'";

                $query =
                    "SELECT * FROM task_group WHERE logtype_id = '" .
                    $id .
                    "' && group_id='" .
                    $gid .
                    "'";
            }
        }
        $res = $this->db->query($query);
        $data = $res->result();
        // echo "<pre>";
        // 			echo $gid.$id."<br>";
        // 			print_r($_SESSION['user_id']);
        // 			print_r($k2);
        // print_r($data);
        // die;

        if (!empty($gid)) {
            $nn =
                "SELECT * FROM task_group WHERE  group_child_id='" . $gid . "'";
            $nn1 = $this->db->query($nn);
            $nn2 = $nn1->result();
            if (!empty($nn2)) {
                foreach ($nn2 as $key => $value) {
                    $data[] = $value;
                }
            }
        }

        foreach ($data as $key => $value) {
            for ($k = $value->group_child_id; $k > 0; $k--) {
                if ($_SESSION["logtype"] == "Super Admin") {
                    $m = "SELECT * FROM task_group WHERE group_id = $k";
                } else {
                    //.. $m = "SELECT * FROM task_group WHERE group_id = $k AND admin_id='".$_SESSION['admin_id']."'";
                    $m = "SELECT * FROM task_group WHERE group_id = $k ";
                }
                $m1 = $this->db->query($m);
                $m2 = $m1->row();

                if (isset($m2) && $m2->logtype_id != 0) {
                    $p =
                        "SELECT * FROM logtype WHERE logtype_id='" .
                        $m2->logtype_id .
                        "'";
                    $p1 = $this->db->query($p);
                    $p2 = $p1->row();

                    if (isset($p2) && !empty($p2)) {
                        $value->group_nameall[$k] = $p2->logtype_name;
                    }
                }
            }
        }
        // 		die;

        // echo "<pre>";
        // print_r($data);
        // die;

        return $data;
    }
    public function view_single_data($tbl, $wh, $id)
    {
        $this->db->where($wh, $id);
        $data = $this->db->get($tbl);
        return $data->row();
    }
    public function view_all_data($tbl, $wh, $id)
    {
        $this->db->where($wh, $id);
        //$this->db->order_by("created_at","desc");
        if ($_SESSION["logtype"] == "Super Admin") {
            $data = $this->db->get($tbl);
        } else {
            $this->db->where("admin_id", $_SESSION["admin_id"]);
            $data = $this->db->get($tbl);
        }
        // $data=$this->db->get($tbl);

        return $data->result();
    }
    public function view_all_data_adby($tbl, $filed)
    {
        //$this->db->where($wh,$id);
        $this->db->order_by($filed, "desc");
        if ($_SESSION["logtype"] == "Super Admin") {
            $data = $this->db->get($tbl);
        } else {
            // echo "<pre>";
            // print_r($_SESSION['admin_id']);
            // die;
            //..$this->db->where('admin_id',$_SESSION['admin_id']);
            $data = $this->db->get($tbl);
        }
        // echo "<pre>";
        // print_r($data->result());
        // die;
        return $data->result();
    }
    public function view_all_data_done($tbl)
    {
        $data = $this->db->get($tbl);
        return $data->result();
    }
    public function view_all_select_done($tbl)
    {
        $data = $this->db->get($tbl);
        return $data->row();
    }
    public function select_data($tbl, $wher, $id)
    {
        $this->db->where($wher, $id);
        if ($_SESSION["logtype"] == "Super Admin") {
            $data = $this->db->get($tbl);
        } else {
            $this->db->where("admin_id", $_SESSION["admin_id"]);
            $this->db->select("*");
            $this->db->from($tbl);
            $data = $this->db->get();
        }
        return $data->row();
    }

    public function delete_record($tbl, $field, $data)
    {
        $this->db->where($field, $data);
        return $this->db->delete($tbl);
    }

    public function view_all_member($tbl, $fild, $id)
    {
        // echo "<pre>";
        // print_r($_SESSION);
        // die;
        $all = $id;
        foreach ($all as $key => $value) {
            $this->db->like($fild, $value);
        }
        if ($_SESSION["logtype"] == "Super Admin") {
            $data = $this->db->get($tbl);
        } else {
            // echo "<pre>";
            // print_r($_SESSION['admin_id']);
            // die;

            $this->db->where("admin_id", $_SESSION["admin_id"]);
            $data = $this->db->get($tbl);
        }

        return $data->result();
    }

    public function view_all_member_event($tbl, $fild, $id)
    {
        // echo "<pre>";
        // print_r($_SESSION);
        // die;
        $all = $id;
        foreach ($all as $key => $value) {
            $this->db->or_like($tbl . "." . $fild, $value);
        }
        $this->db->select("subdepartment.subdepartment_name," . $tbl . ".*");
        $this->db->join(
            "subdepartment",
            "subdepartment.subdepartment_id=" . $tbl . "." . $fild
        );
        if ($_SESSION["logtype"] == "Super Admin") {
            $data = $this->db->get($tbl);
        } else {
            // echo "<pre>";
            // print_r($_SESSION['admin_id']);
            // die;

            $this->db->where("" . $tbl . ".admin_id", $_SESSION["admin_id"]);
            $data = $this->db->get($tbl);
        }

        return $data->result();
    }

    public function view_all_member_event_depart($tbl, $fild, $id)
    {
        // echo "<pre>";
        // print_r($_SESSION);
        // die;
        $all = $id;
        foreach ($all as $key => $value) {
            $this->db->or_like($tbl . "." . $fild, $value);
        }
        $this->db->select("department.department_name," . $tbl . ".*");
        $this->db->join(
            "department",
            "department.department_id=" . $tbl . "." . $fild
        );
        if ($_SESSION["logtype"] == "Super Admin") {
            $data = $this->db->get($tbl);
        } else {
            $this->db->where("" . $tbl . ".admin_id", $_SESSION["admin_id"]);
            $data = $this->db->get($tbl);
        }

        return $data->result();
    }

    public function view_all_member_logtype($tbl, $fild, $id, $k, $v)
    {
        // echo "<pre>";
        // print_r($_SESSION);
        // die;
        $all = explode(",", $id);
        foreach ($all as $key => $value) {
            $this->db->like($fild, $value);
        }
        if ($_SESSION["logtype"] == "Super Admin") {
            $this->db->where($k, $v);
            $data = $this->db->get($tbl);
        } else {
            // echo "<pre>";
            // print_r($_SESSION['admin_id']);
            // die;

            $this->db->where("admin_id", $_SESSION["admin_id"]);
            $this->db->where($k, $v);
            $data = $this->db->get($tbl);
        }

        return $data->result();
    }

    public function gave_member_all($id)
    {
        if (
            isset($_SESSION["logtype"]) &&
            $_SESSION["logtype"] == "Super Admin"
        ) {
            $query = "SELECT * FROM task_group  ";
        } else {
            $query =
                "SELECT * FROM task_group WHERE admin_id = '" .
                $_SESSION["admin_id"] .
                "' AND group_child_id>='" .
                $id .
                "' OR group_id='" .
                $id .
                "' ";
        }
        $res = $this->db->query($query);
        $data = $res->result();
        foreach ($data as $key => $value) {
            $j =
                "SELECT * FROM task_group_member WHERE member_group_id='" .
                $value->group_id .
                "'";
            $j1 = $this->db->query($j);
            $data[$key]->member = $j1->result();
        }
        return $data;
        // echo "<pre>";

        // print_r($data);
        // die;

        //foreach ($data as $key => $value) {

        // for($k=$value->group_child_id;$k>0;$k--)
        // {

        // 	$m = "SELECT * FROM task_group WHERE group_id = $k";
        // 	$m1 = $this->db->query($m);
        // 	$m2 = $m1->row();
        // 	// print_r($m2);
        // 	// die;
        // 	if(isset($m2) && $m2->logtype_id !=0)
        // 	{
        // 			$p = "SELECT * FROM logtype WHERE logtype_id='".$m2->logtype_id."'";
        // 			$p1 = $this->db->query($p);
        // 			$p2 = $p1->row();

        // 			if(isset($p2) && !empty($p2))
        // 			{
        // 				$value->group_nameall[$k]=$p2->logtype_name;
        // 			}

        // 	}

        // }
        // $n=0;
        // $i=0;
        // 	while ($i <= $n)  {

        // 		$m = "SELECT * FROM task_group WHERE group_child_id = '".$value->group_id."'";
        // 		$m1 = $this->db->query($m);
        // 		$m2 = $m1->result();

        // 		foreach ($m2 as $m => $n) {
        // 			$all[]= $n->group_name;
        // 			}

        // 		if(count($m2)>0)
        // 		{
        // 			$i++;
        // 		}
        // 	}

        //}
    }

    public function gave_member_all_withou_me($id)
    {
        if (
            isset($_SESSION["logtype"]) &&
            $_SESSION["logtype"] == "Super Admin"
        ) {
            $query = "SELECT * FROM task_group WHERE  group_id!='" . $id . "' ";
        } else {
            $query =
                "SELECT * FROM task_group WHERE admin_id = '" .
                $_SESSION["admin_id"] .
                "' AND group_child_id>='" .
                $id .
                "'  ";
        }
        $res = $this->db->query($query);
        $data = $res->result();
        foreach ($data as $key => $value) {
            $j =
                "SELECT * FROM task_group_member WHERE member_group_id='" .
                $value->group_id .
                "'";
            $j1 = $this->db->query($j);
            $data[$key]->member = $j1->result();
        }
        return $data;
    }

    public function view_all_done_all_data($tbl, $wh, $id)
    {
        $this->db->where($wh, $id);
        $data = $this->db->get($tbl);
        return $data->result();
    }

    public function all_task_note()
    {
        $m =
            "SELECT * FROM task_group_member WHERE member_account_id='" .
            $_SESSION["user_id"] .
            "'";
        $m1 = $this->db->query($m);
        $m2 = $m1->result();
        // echo count($m1);
        // $m2 = mysqli_fetch_all($m1,MYSQLI_ASSOC);
        // print_r($m2[0]['member_id']);
        $all = [];
        foreach ($m2 as $key => $value) {
            $j =
                "SELECT task_submit.*,task_details.task_name,task_details.task_dedline_date,task_details.task_dedline_time FROM task_submit,task_details WHERE task_details.task_detail_id=task_submit.task_detail_id AND task_member_id='" .
                $value->member_id .
                "'  AND  DATE(task_submit.created_at) = DATE(NOW()) ORDER BY `created_at` DESC ";
            $j1 = $this->db->query($j);
            $j2 = $j1->result();

            // $j2 = mysqli_query($con,$j);
            // $j3 = mysqli_fetch_all($j2);
            $all[] = $j2;
        }
        //     	echo "<pre>";
        // print_r($all);
        // die;
        return $all;
    }

    public function today_add_task()
    {
        $m =
            "SELECT * FROM task_details WHERE task_creator_id='" .
            $_SESSION["user_id"] .
            "' AND  DATE(created_at) = DATE(NOW()) ORDER BY `created_at` DESC ";
        $m1 = $this->db->query($m);
        $m2 = $m1->result();

        // echo count($m1);
        // $m2 = mysqli_fetch_all($m1,MYSQLI_ASSOC);
        // print_r($m2[0]['member_id']);
        // $all =array();
        //      	foreach ($m2 as $key => $value) {
        //      		$j = "SELECT task_submit.*,task_details.task_name FROM task_submit,task_details WHERE task_details.task_detail_id=task_submit.task_detail_id AND task_member_id='".$value->member_id."'  AND  YEARWEEK(task_submit.created_at) = YEARWEEK(NOW()) ORDER BY `created_at` DESC ";
        //      		$j1 = $this->db->query($j);
        // 	$j2 = $j1->result();
        //      		// $j2 = mysqli_query($con,$j);
        //      		// $j3 = mysqli_fetch_all($j2);
        //      		$all[] = $j2;
        //      	}
        return $m2;
    }

    public function today_observe_task()
    {
        $m =
            "SELECT * FROM task_group_member WHERE member_account_id='" .
            $_SESSION["user_id"] .
            "'";
        $m1 = $this->db->query($m);
        $m2 = $m1->result();
        $all = [];
        // echo count($m1);
        // $m2 = mysqli_fetch_all($m1,MYSQLI_ASSOC);
        // print_r($m2[0]['member_id']);

        foreach ($m2 as $key => $value) {
            $j =
                "SELECT task_details.* FROM task_details WHERE task_observe_member_id='" .
                $value->member_id .
                "'  AND  DATE(created_at) = DATE(NOW()) ORDER BY `created_at` DESC ";
            $j1 = $this->db->query($j);
            $j2 = $j1->result();

            // $j2 = mysqli_query($con,$j);
            // $j3 = mysqli_fetch_all($j2);
            $all[] = $j2;
        }

        return $all;
    }

    public function fetch_user_chat_history($from_user_id, $to_user_id)
    {
        $s =
            "SELECT * FROM task_question WHERE (from_user_id = '" .
            $from_user_id .
            "' AND to_user_id = '" .
            $to_user_id .
            "') OR (from_user_id = '" .
            $to_user_id .
            "' AND to_user_id = '" .
            $from_user_id .
            "')  ORDER BY created_at ASC";

        $s1 = $this->db->query($s);
        $s2 = $s1->result();
        return $s2;
    }

    public function upd_question($from_user_id, $to_user_id)
    {
        $q =
            "UPDATE task_question SET status='0' WHERE from_user_id = '" .
            $to_user_id .
            "' AND to_user_id = '" .
            $from_user_id .
            "' AND status = '1' ";
        $q1 = $this->db->query($q);
        return $q1;
    }

    public function last_act($uid)
    {
        $m =
            "SELECT * FROM login_details WHERE user_id = '" .
            $uid .
            "' AND status=1 ORDER BY last_activity DESC LIMIT 1";
        $m1 = $this->db->query($m);
        $m2 = $m1->result();
        foreach ($m2 as $key => $value) {
            return $value->last_activity;
        }
    }

    public function final_act()
    {
        echo $q =
            "UPDATE login_details SET last_activity = now() WHERE login_details_id = '" .
            $_SESSION["login_detail_id"] .
            "'";
        $q1 = $this->db->query($q);
    }

    public function eventList()
    {
        // $this->db->select(array('e.id', 'e.name', 'e.start', 'e.end','e.status'));
        // $this->db->from('event as e');
        // $query = $this->db->get();
        // return $query->result_array();
        $m = "SELECT * FROM event";
        $m1 = $this->db->query($m);
        $m2 = $m1->result();
        return $m2;
    }

    public function fetch_typing($uid)
    {
        $m =
            "SELECT is_type FROM login_details WHERE user_id = '" .
            $uid .
            " AND status=1 ORDER BY last_activity DESC LIMIT 1' ";
        $m1 = $this->db->query($m);
        $m2 = $m1->result();
        return $m2;
    }
    public function cc_msg($from_user_id, $to_user_id)
    {
        $query = "SELECT * FROM task_question WHERE from_user_id='$from_user_id' AND to_user_id='$to_user_id' AND status='1'";
        $query1 = $this->db->query($query);
        $query2 = $query1->num_rows();
        return $query2;
    }

    public function Task_remind($tbl, $reminder, $filed, $tid, $uid)
    {
        echo $q = "UPDATE $tbl SET task_reminder='$reminder' WHERE $filed='$tid' AND task_member_id='$uid'";
        $query1 = $this->db->query($q);
        return $query1;
    }

    public function view_all_email($tbl, $wh, $id, $f, $i)
    {
        $this->db->where($wh, $id);
        $this->db->where($f, $i);
        $this->db->order_by("email_id", "desc");
        if ($_SESSION["logtype"] == "Super Admin") {
            $data = $this->db->get($tbl);
        } else {
            $this->db->where("admin_id", $_SESSION["admin_id"]);
            $data = $this->db->get($tbl);
        }
        // $data=$this->db->get($tbl);

        return $data->result();
    }

    public function get_task_cal_id()
    {
        $q =
            "SELECT * FROM  task_group_member WHERE member_account_id='" .
            $_SESSION["user_id"] .
            "' AND member_role = '" .
            $_SESSION["logtype"] .
            "'";
        $q1 = $this->db->query($q);
        $q2 = $q1->row();

        return $q2;
    }
    public function select_data_fact_permission($tbl, $wher, $id)
    {
        $this->db->where($wher, $id);

        $this->db->where("admin_id", "0");
        $this->db->select("*");
        $this->db->from($tbl);
        $data = $this->db->get();

        return $data->row();
    }
    public function view_all_super($tbl)
    {
        $this->db->where("admin_id", "0");
        $data = $this->db->get($tbl);

        return $data->result();
    }

    public function get_job_detail_com($tbl, $field, $data)
    {
        $this->db->where($field, $data);
        $this->db->join(
            "company_detail",
            "company_detail.company_id=job_post.company_id"
        );
        $this->db->from($tbl);
        $data = $this->db->get();
        return $data->row();
    }

    public function get_comment_reasons($tbl, $field, $data)
    {
        $this->db->where($field, $data);
        $this->db->join(
            "company_detail",
            "company_detail.company_id=job_deactive_remarks.de_company_id"
        );
        $this->db->join(
            "job_post",
            "job_post.jobpost_id=job_deactive_remarks.de_jobpost_id"
        );
        $this->db->from($tbl);
        $data = $this->db->get();
        return $data->result();
    }

    public function get_company_detail_ajax_wise($tbl, $field, $data)
    {
        $this->db->where($field, $data);
        // $this->db->join('company_detail','company_detail.company_id=job_post.company_id');
        $this->db->from($tbl);
        $data = $this->db->get();
        return $data->row();
    }

    public function filter_data($tbl, $wher, $id)
    {
        $this->db->where($wher, $id);
        $this->db->select("*");
        $this->db->from($tbl);
        $data = $this->db->get();
        return $data->result();
    }

    public function filterByMainPermission($tbl, $filter)
    {
        $this->db->like("logtype_name", $filter);
        if ($_SESSION["logtype"] == "Super Admin") {
            $data = $this->db->get($tbl);
        } else {
            $this->db->where("admin_id", $_SESSION["admin_id"]);
            $data = $this->db->get($tbl);
        }
        return $data->result();
    }

    public function filterByFaculty($tbl, $filter)
    {
        $this->db->like("name", $filter);
        if ($_SESSION["logtype"] == "Super Admin") {
            $data = $this->db->get($tbl);
        } else {
            $this->db->where("admin_id", $_SESSION["admin_id"]);
            $data = $this->db->get($tbl);
        }

        return $data->result();
    }

    public function loguser($tbl)
    {
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->group_by("logtype");
        $data = $this->db->get();
        // echo "<pre>";
        // print_r($data->result());
        // die;
        return $data->result();
    }

    public function get_live_data_attendance_2($tbl, $wh, $id)
    {
        $this->db2->select("*");
        $this->db2->where($wh, $id);
        $data = $this->db2->get($tbl);

        //print_r($data->result_array());
        // die;

        return $data->result_array();
    }
}
