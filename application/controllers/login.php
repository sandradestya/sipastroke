<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->helper('url','form');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('admin/login');
	}

	public function cekLogin()
	{
		$this->form_validation->set_rules('username','username','trim|required');
		$this->form_validation->set_rules('password','password','trim|required|callback_cekDb');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/login');
		}	
		else {
			redirect('index.php/dashboard','refresh');
		}
	}

	public function cekDb($password)
	{
		$username = $this->input->post('username');
		$result = $this->login_model->login($username,$password);

		if($result) {
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'id_akun'=>$row->id_akun,
					'username'=>$row->username
				);
				$this->session->set_userdata('logged_in',$sess_array);
			}
			return true;
		}
		else {
			$this->form_validation->set_message('cekDb',"<div class='alert alert-danger' role='alert'>MAAF LOGIN GAGAL! pastikan username dan password anda benar</div>");
			return false;
		}	
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('index.php/login','refresh');
	}

	public function daftar()
	{
		$this->form_validation->set_rules('nama','nama','trim|required');
		$this->form_validation->set_rules('username','username','trim|required|callback_cekDbInsert');
		$this->form_validation->set_rules('email','email','trim|required');
		$this->form_validation->set_rules('password','password','trim|required');

		if($this->form_validation->run()==FALSE) {
			$this->load->view('admin/register');
		}
		else {
			$this->login_model->insertAdmin();
			$this->load->view('admin/login');
		}
	}

	public function cekDbInsert()
	{
		$username = $this->input->post('username');
		$result = $this->login_model->cekInsert($username);
		if($result) {
			$this->form_validation->set_message('DbInsert',"<div class='alert alert-danger' role='alert'>MAAF username sudah ada, masukan yang lain!</div>");
			return false;
		}
		else {
			return true;
		}
	}

}
