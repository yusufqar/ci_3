<?php
class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

	public function index()
	{
		$data['title'] = 'Login';

		$this->load->view('templates/header', $data);	
		$this->load->view('login');
	}

    public function login() {
		$data['title'] = 'Login';

		$this->load->view('templates/header', $data);	
        $this->load->view('login');
    }

    public function login_action() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->user_model->validate_user($username, $password);
            if ($user) {
                $this->session->set_userdata('user_id', $user['id']);
                $this->session->set_userdata('role', $user['role']);
                redirect('dashboard'); 
            } else {
                $this->session->set_flashdata('error', 'Username atau Password Salah');
                redirect('auth/login');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

	public function register() {
		$data['title'] = 'Register';

		$this->load->view('templates/header', $data);	
        $this->load->view('register');
    }

    public function register_action() {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('register');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')), 
                'email' => $this->input->post('email'),
                'role' => 'admin'
            );
            $this->user_model->insert_user($data);
            redirect('auth/login');
        }
    }

}
