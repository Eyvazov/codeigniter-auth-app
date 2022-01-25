<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('RegisterModel');
	}

	public function index()
	{
		if ($this->session->userdata('user_name')) {
			redirect(base_url() . 'profile');
		}
		$this->config->config["pageTitle"] = 'Register Page';
		$this->load->view('register');
	}

	public function registerController()
	{
		if ($this->input->post('submit')) {
			$config = [
				[
					'field' => 'name',
					'label' => 'Name',
					'rules' => 'trim|required',
				], [
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'trim|required|valid_email|is_unique[users.user_email]'
				], [
					'field' => 'birthday',
					'label' => 'Birthday',
					'rules' => 'trim|alpha_dash'
				], [
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'trim|required|min_length[6]',
				], [
					'field' => 'password_confirm',
					'label' => 'Password Confirm',
					'rules' => 'trim|required|min_length[6]|matches[password]',
				],
			];
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE) {
				$this->index();
			} else {
				$name = $this->input->post('name');
				$email = $this->input->post('email');
				$birthday = $this->input->post('birthday') ? $this->input->post('birthday') : null;
				$password = $this->input->post('password');
				$xss = $this->security->xss_clean($name);

				$user = $this->RegisterModel->Register($xss, $email, $birthday, $password);

				if ($user) {
					$session_data = [
						'user_name' => $name
					];
					$this->session->set_userdata($session_data);
					redirect(base_url() . 'profile');
				} else {
					$data['danger'] = 'Something went wrong. please try again later';
					$this->load->view('register', $data);
				}
			}
		} else {
			$data['danger'] = 'Something went wrong. please try again later';
			$this->load->view('register', $data);
		}
	}
}
