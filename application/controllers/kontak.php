<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kontak_model', 'kontak');
		$this->load->helper('url','form');
		$this->load->library(array('form_validation', 'session'));

		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
		}
		else {
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$data['dataKontak'] = $this->kontak->get_all();
        $this->render['content'] = $this->load->view('admin/kontak/index', $data, TRUE);
    	$this->load->view('admin/dashboard', $this->render);
	}

	public function detail($id_kontak)
	{
		$data['dataKontak'] = $this->kontak->get_by_detail($id_kontak);
        $this->render['content'] = $this->load->view('kontak/detail', $data, TRUE);
    	$this->load->view('admin/dashboard', $this->render);
	}

	public function rules()
	{
		$this->form_validation->set_rules('id_kontak', 'ID Kontak', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
		$this->form_validation->set_rules('jamker', 'JamKer', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('maps', 'Maps', 'trim|required');		
	}

	public function create()
	{
		$this->rules();
		if ($this->form_validation->run() == FALSE) {
			$data['alamat'] = $this->input->post('alamat') ? $this->input->post('alamat') : '';
			$data['telepon'] = $this->input->post('telepon') ? $this->input->post('telepon') : '';
			$data['jamker'] = $this->input->post('jamker') ? $this->input->post('jamker') : '';
			$data['email'] = $this->input->post('email') ? $this->input->post('email') : '';
			$data['maps'] = $this->input->post('maps') ? $this->input->post('maps') : '';
		}

        $this->render['content'] = $this->load->view('kontak/tambah', $data, TRUE);
    	$this->load->view('admin/dashboard', $this->render);
	}

	public function create_action()
	{
		$data = array(
			'alamat' => $this->input->post('alamat'),
			'telepon' => $this->input->post('telepon'),
			'jamker' => $this->input->post('jamker'),
			'email' => $this->input->post('email'),
			'maps' => $this->input->post('maps'),
		);

		$this->kontak->insert($data);

		redirect(site_url('kontak'));
	}

	public function update($id_kontak)
	{
		$this->rules();
		$data['dataKontak'] = $this->kontak->get_by_update($id_kontak);
        $this->render['content'] = $this->load->view('kontak/edit', $data, TRUE);
    	$this->load->view('admin/dashboard', $this->render);
	}

	public function update_action($id_kontak)
	{
		$id_kontak = $this->input->post('id_kontak');

		$data = array(
			'alamat' => $this->input->post('alamat'),
			'telepon' => $this->input->post('telepon'),
			'jamker' => $this->input->post('jamker'),
			'email' => $this->input->post('email'),
			'maps' => $this->input->post('maps'),
		);

		$this->kontak->update($id_kontak, $data);

		redirect(site_url('kontak'));
	}

	public function delete($id_kontak)
	{
		$row = $this->kontak->get_by_id($id_kontak);

		if ($row) {
			$this->kontak->delete($id_kontak);
			redirect(site_url('kontak'));
		} 
		else {
			redirect(site_url('kontak'));
		}
	}

}

/* End of file kontak.php */
/* Location: ./application/controllers/kontak.php */