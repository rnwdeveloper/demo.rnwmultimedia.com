<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserModel extends CI_Model {
    public function __construct() {
        parent::__construct();
        // Your own constructor code
        
    }
    private $User = 'faculty';
    public function GetUserData() {
        $this->db->select("*");
        $this->db->from($this->User);
        $this->db->where("faculty_id", $this->session->userdata['Admin']['id']);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function IfExistEmail($email) {
        $this->db->select("*");
        $this->db->from($this->User);
        $this->db->where('email', $email);
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function PictureUrl() {
        $this->db->select("*");
        $this->db->from($this->User);
        $this->db->where("faculty_id", $this->session->userdata['Admin']['id']);
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->row_array();
        if (!empty($res['images'])) {
            return base_url('uploads/profiles/' . $res['images']);
        } else {
            return base_url('public/images/user-icon.jpg');
        }
    }
    public function PictureUrlById($table, $where, $id) {
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($where, $id);
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->row_array();
        if (!empty($res['image'])) {
            return base_url('dist/img/' . $res['image']);
        } else {
            return base_url('public/images/user-icon.jpg');
        }
    }
    public function GetName($table, $where, $id) {
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($where, $id);
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->row_array();
        return $res['name'];
    }
    public function GetIDByName($name) {
        $this->db->select("*");
        $this->db->from($this->User);
        $this->db->where("name", $name);
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->row_array();
        return $res['id'];
    }
    public function GetUserAddress($id) {
        $this->db->select("*");
        $this->db->from($this->User);
        $this->db->where("faculty_id", $id);
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->row_array();
        return $res;
    }
    public function UpdateProfileImageByID($data) {
        $res = $this->db->update($this->User, $data, ['id' => $this->session->userdata['Admin']['id']]);
        if ($res == 1) return true;
        else return false;
    }
    public function UpdateCustomerProfileImageByID($data) {
        $res = $this->db->update($this->User, $data, ['id' => $this->session->userdata['User']['id']]);
        if ($res == 1) return true;
        else return false;
    }
    public function GetUserDataById($id) {
        $this->db->select("*");
        $this->db->from($this->User);
        $this->db->where("faculty_id", $id);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function GetMemberNameById($id) {
        $this->db->select("*");
        $this->db->from($this->User);
        $this->db->where("faculty_id", $id);
        $this->db->limit(1);
        $query = $this->db->get();
        $u = $query->row_array();
        return $u['name'];
    }
    public function AddMember($data) {
        $res = $this->db->insert($this->User, $data);
        if ($res == 1) return $this->db->insert_id();
        else return false;
    }
    public function StatusUpdateByID($user_id, $status) {
        $res = $this->db->update($this->User, ['status' => $status], ['id' => $user_id]);
        if ($res == 1) return true;
        else return false;
    }
    public function TrashByID($user_id) {
        $res = $this->db->delete($this->User, ['id' => $user_id]);
        if ($res == 1) return true;
        else return false;
    }
    public function AllRoleTypes($role) {
        $this->db->select("*");
        $this->db->from($this->User);
        $this->db->where("logtype", $role);
        $query = $this->db->get();
        $u = $query->num_rows();
        return $u;
    }
    public function VendorsList() {
        $this->db->select("*");
        $this->db->from($this->User);
        $query = $this->db->get();
        $r = $query->result_array();
        return $r;
    }
    public function ClientsListCs($table) {
        $this->db->select("*");
        $this->db->from($table);
        $query = $this->db->get();
        $r = $query->result_array();
        return $r;
    }
    // my Create
    public function select_all($table) {
        $this->db->select("*");
        $this->db->from($table);
        $query = $this->db->get();
        $r = $query->result_array();
        return $r;
    }
    public function MyPictureUrlById($id) {
        $this->db->select("*");
        $this->db->from($this->User);
        $this->db->where("faculty_id", $id);
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->row_array();
        if (!empty($res['images'])) {
            return base_url('dist/img/' . $res['image']);
        } else {
            return base_url('public/images/user-icon.jpg');
        }
    }
}
