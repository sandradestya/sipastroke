<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller {

public function __construct()
{
	parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('session', 'curl','form_validation'));
		$this->load->model('Gejala_model','gejala');

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
		$this->load->model('Gejala_model');

		$data['dataGejala'] = $this->Gejala_model->get_All()->result();
		//$this->load->view('inventaris/data_inventaris', $data);


        $this->render['content'] = $this->load->view('admin/gejala/index', $data,TRUE);
    	$this->load->view('admin/sidebar', $this->render);


    
	}

	public function rules()
	{
		$this->form_validation->set_rules('kode_gejala', 'kode_gejala', 'trim|required');
		$this->form_validation->set_rules('nama_gejala', 'nama_gejala', 'trim|required');
		
	}

	public function create()
	{
		$this->rules();
		if ($this->form_validation->run() == FALSE) {
			$data['kode_gejala'] = $this->input->post('kode_gejala') ? $this->input->post('kode_gejala') : '';
			$data['nama_gejala'] = $this->input->post('nama_gejala') ? $this->input->post('nama_gejala') : '';
			$data['bobot'] = $this->input->post('bobot') ? $this->input->post('bobot') : '';
			$data['keterangan'] = $this->input->post('keterangan') ? $this->input->post('keterangan') : '';
			 
		}

        $this->render['content'] = $this->load->view('admin/gejala/tambah', $data, TRUE);
    	$this->load->view('admin/sidebar', $this->render);
	}

	public function create_action()
	{
		$data = array(
			'kode_gejala' => $this->input->post('kode_gejala'),
			'nama_gejala' => $this->input->post('nama_gejala'),
			'bobot' => $this->input->post('bobot'),
			'keterangan' => $this->input->post('keterangan'),
			
			
		);

		$this->gejala->insert($data);

		redirect(site_url('index.php/gejala'));
	}

	public function update($kode_gejala)
	{
		$this->load->model('Gejala_model');

		$this->rules();
		$data['dataGejala'] = $this->Gejala_model->get_by_update($kode_gejala);
        $this->render['content'] = $this->load->view('admin/gejala/edit', $data, TRUE);
    	$this->load->view('admin/sidebar', $this->render);
	}

	public function update_action($kode_gejala)
	{
		$kode_gejala = $this->input->post('kode_gejala');

		$data = array(
			'kode_gejala' => $this->input->post('kode_gejala'),
			'nama_gejala' => $this->input->post('nama_gejala'),
			'bobot' => $this->input->post('bobot'),
			'keterangan' => $this->input->post('keterangan'),
			
		);

		$this->gejala->update($kode_gejala, $data);

		redirect(site_url('index.php/gejala'));
	}

	public function delete($kode_gejala)
	{
		$this->db->delete('kasus_gjl', array('gejala' => $kode_gejala));
		
		$this->load->model('Gejala_model');
		
		$row = $this->Gejala_model->get_by_id($kode_gejala);

		if ($row) {
			$this->gejala->delete($kode_gejala);
			redirect(site_url('index.php/gejala'));
		} 
		else {
			redirect(site_url('index.php/gejala'));
		}
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
?>