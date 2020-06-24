<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	
	public function index()
	{
		$data['konten']="home";
		$this->load->view('home');
	}

	public function login()
	{
		$data['konten']="login";
		$this->load->view('admin/login');
	}
}
