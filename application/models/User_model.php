<?php
class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_user($data) {
        return $this->db->insert('users', $data);
    }

    public function get_user_by_username($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query->row_array();
    }

    public function validate_user($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password)); 
        $query = $this->db->get('users');
        return $query->row_array();
    }

    public function get_user_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->row_array();
    }
}
