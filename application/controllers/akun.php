<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

public function __construct()
{
	parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('session', 'curl','form_validation'));
		$this->load->model('Akun_model','Akun');
if($this->session->userdata('logged_in')) {
			$session_data		= $this->session->userdata('logged_in');
			$data['username']	= $session_data['username'];
		}
		else {
			redirect('index.php/login','refresh');
		}
		
}
	public function index()
	{
		$this->load->model('Akun_model');

		$data['dataAkun'] = $this->Akun_model->get_oll()->result();
		//$this->load->view('inventaris/data_inventaris', $data);


        $this->render['content'] = $this->load->view('admin/akun/index', $data, TRUE);
    	$this->load->view('admin/sidebar', $this->render);

    
	}

	public function rules()
	{
		$this->form_validation->set_rules('id_Akun', 'id_Akun', 'trim|required');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		
	}

	public function create()
	{
		$this->rules();
		if ($this->form_validation->run() == FALSE) {
			$data['id_Akun'] = $this->input->post('id_Akun') ? $this->input->post('id_Akun') : '';
			$data['nama'] = $this->input->post('nama') ? $this->input->post('nama') : '';
			$data['username'] = $this->input->post('username') ? $this->input->post('username') : '';
			$data['password'] = $this->input->post('password') ? $this->input->post('password') : '';
			$data['email'] = $this->input->post('email') ? $this->input->post('email') : '';
			 
		}

        
    	$this->load->view('admin/register');
	}

	public function create_action()
	{
		$data = array(
			'id_Akun' => $this->input->post('id_Akun'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email'),
			
			
		);

		$this->Akun->insert($data);

		redirect(site_url('index.php/login'));
	}

	public function update($id_Akun)
	{
		$this->load->model('Akun_model');

		$this->rules();
		$data['dataAkun'] = $this->Akun_model->get_by_update($id_Akun);
        $this->render['content'] = $this->load->view('admin/Akun/edit', $data, TRUE);
    	$this->load->view('admin/sidebar', $this->render);
	}

	public function update_action($id_Akun)
	{
		$kode_Akun = $this->input->post('id_Akun');

		$data = array(
			'id_Akun' => $this->input->post('id_Akun'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post (md5('password')),
			'email' => $this->input->post('email'),
		);

		$this->Akun->update($id_Akun, $data);

		redirect(site_url('index.php/Akun'));
	}


	public function delete($id_Akun)
	{
		$this->load->model('Akun_model');

		
		$row = $this->Akun_model->get_by_id($id_Akun);

		if ($row) {
			$this->Akun->delete($id_Akun);
			redirect(site_url('index.php/Akun'));
		} 
		else {
			redirect(site_url('index.php/Akun'));
		}
	}

}