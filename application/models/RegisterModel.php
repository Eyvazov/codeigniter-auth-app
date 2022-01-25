<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegisterModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function Register($name, $email, $birthday, $password)
	{
		$password = password_hash($password, PASSWORD_DEFAULT);
		$query = $this->db->query("INSERT INTO users (user_name, user_email, user_birthday, user_password) VALUES ('$name', '$email', '$birthday', '$password')");
		return TRUE;
	}
}

?>
