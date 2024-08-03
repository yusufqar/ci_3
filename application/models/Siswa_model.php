<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

	// Konstruktor model
    public function __construct() {
        parent::__construct();
        // Memuat database
        // $this->load->database();
    }
	
	public function get_data() 
	{
		$query =  $this->db->get('tb_siswa');

		return $query->result();
	}

	public function insert_data($data)
	{
		$this->db->insert('tb_siswa', $data);
		
	}

	public function update_data($data)
	{
		$this->db->where('id_siswa', $data['id_siswa']);
		$this->db->update('tb_siswa', $data);
	}

	public function delete($where)
	{
		$this->db->where($where);
		$this->db->delete('tb_siswa');
	}

}

/* End of file Siswa_model.php */
