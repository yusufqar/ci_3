<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa_model');		
		// $this->load->library('form_validation');
		// $this->load->library('session');
	}

	

	public function index()
	{
		
		if ($this->session->userdata('role') !== 'admin') {
			show_error('Mohon maaf silahkan melakukan Login terlebih dahulu', 403);
		}
		$data['title'] = 'Siswa';
		$data['siswa'] = $this->Siswa_model->get_data();

		$this->load->view('templates/header', $data);	
		$this->load->view('templates/sidebar', $data);
		$this->load->view('siswa', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		if ($this->session->userdata('role') !== 'admin') {
			show_error('Mohon maaf silahkan melakukan Login terlebih dahulu', 403);
		}
		$data['title'] = 'Tambah Siswa';

		$this->load->view('templates/header', $data);	
		$this->load->view('templates/sidebar', $data);
		$this->load->view('tambah_siswa', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$data = array(
				'nama_siswa' => $this->input->post('nama_siswa'),
				'kelas_siswa' => $this->input->post('kelas_siswa'),
				'alamat_siswa' => $this->input->post('alamat_siswa'),
				'nomor_telepon' => $this->input->post('nomor_telepon'),
			);
		}
		$this->Siswa_model->insert_data($data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
										<strong>Data Berhasil Ditambahkan</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										</div>');
		redirect('siswa');								
		
	}

	public function edit($id_siswa)
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'id_siswa' => $id_siswa,
				'nama_siswa' => $this->input->post('nama_siswa'),
				'kelas_siswa' => $this->input->post('kelas_siswa'),
				'alamat_siswa' => $this->input->post('alamat_siswa'),
				'nomor_telepon' => $this->input->post('nomor_telepon'),
			);
		}

		$this->Siswa_model->update_data($data);
		redirect('siswa');
	}

	public function delete($id)
	{
		$where = array('id_siswa'=>$id);

		$this->Siswa_model->delete($where);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong>Data Berhasil Dihapus</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										</div>');
		redirect('siswa');								
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required', array(
			'required' => '%s Harus diisi !!'
		));
		$this->form_validation->set_rules('kelas_siswa', 'Kelas Siswa', 'required', array(
			'required' => '%s Harus diisi !!'
		));
		$this->form_validation->set_rules('alamat_siswa', 'Alamat Siswa', 'required', array(
			'required' => '%s Harus diisi !!'
		));
		$this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required', array(
			'required' => '%s Harus diisi !!'
		));
	}
}

/* End of file Siswa.php */
