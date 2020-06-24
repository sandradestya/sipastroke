<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	
	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('akun');
		$this->db->where('username', $username);
		$this->db->where('password', MD5($password));
		$query = $this->db->get();

		if($query->num_rows()==1) {
			return $query->result();
		}
		else {
			return false;
		}
	}

	public function insertAdmin()
	{
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$data = array(
			'nama'=>$nama,
			'username'=>$username,
			'email'=>$email,
			'password'=>MD5($password)
		);
		$this->db->insert('akun',$data);
	}

	public function cekInsert($username)
	{
		$this->db->select('*');
		$this->db->from('akun');
		$this->db->where('username', $username);
		$query = $this->db->get();
		if ($query->num_rows()>=1) {
			return $query->result();
		}
		else {
			return false;
		}	
	}

}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */