<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('role') !== 'admin') {
			show_error('Mohon maaf silahkan melakukan Login terlebih dahulu', 403);
		}
		
		$data['title'] = 'Dashboard';

		$this->load->view('templates/header', $data);	
		$this->load->view('templates/sidebar', $data);
		$this->load->view('dashboard');
		$this->load->view('templates/footer');
	}

}

/* End of file Dashboard.php */
