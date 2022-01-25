<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');
	}

	public function index()
	{
		if ($this->session->userdata('user_name')) {
			redirect(base_url() . 'profile');
		} else {
			$this->config->config["pageTitle"] = 'Login Page';
			$this->load->view('login');
		}
	}

	public function checkLogin()
	{
		if ($this->input->post('submit')) {
			$config = [
				[
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'trim|required|valid_email'
				],[
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'trim|required|min_length[6]',
				]
			];

			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE) {
				$this->index();
			} else {
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$user = $this->LoginModel->checkUser('users', ['user_email' => $email]);

				if (isset($user->user_email) == $email) {
					if (password_verify($password, $user->user_password)) {
						$session_data = [
							'user_name' => $user->user_name
						];
						$this->session->set_userdata($session_data);
						redirect(base_url() . 'profile');
					} else {
						$this->session->set_flashdata('error', 'Invalid Email or Password');
						redirect(base_url() . 'login');
					}
				} else {
					$this->session->set_flashdata('error', 'Invalid Email or Password');
					redirect(base_url() . 'login');
				}
			}
		}  else {
			$data['danger'] = 'Something went wrong. please try again later';
			$this->load->view('register', $data);
		}
	}

	public function logOut()
	{
		$this->session->unset_userdata('user_name');
		redirect(base_url() . 'login');
	}
}
