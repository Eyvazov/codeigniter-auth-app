<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function checkUser($from, $where = [])
	{
		$result = $this->db->from($from)->where($where)->get()->row();
		return $result;
	}
}


?>
