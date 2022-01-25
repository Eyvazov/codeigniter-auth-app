<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('RegisterModel');
	}

	public function index()
	{
		if ($this->session->userdata('user_name')){
			$title = $this->config->config["pageTitle"] = 'Profile';
			$this->load->view('profile');
		}else{
			redirect(base_url() . 'login');
		}
	}
}
