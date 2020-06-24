<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosa extends CI_Controller {

public function __construct()
{
	parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('session', 'curl','form_validation'));
		$this->load->model('Diagnosa_model','diagnosa');

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
		$this->load->model('Diagnosa_model');

		$data['dataDiagnosa'] = $this->Diagnosa_model->get_oll()->result();
		//$this->load->view('inventaris/data_inventaris', $data);


        $this->render['content'] = $this->load->view('admin/diagnosa/index', $data, TRUE);
    	$this->load->view('admin/sidebar', $this->render);

    
	}

	public function rules()
	{
		$this->form_validation->set_rules('kode_diagnosa', 'kode_diagnosa', 'trim|required');
		$this->form_validation->set_rules('nama_diagnosa', 'nama_diagnosa', 'trim|required');
		
	}

	public function create()
	{
		$this->rules();
		if ($this->form_validation->run() == FALSE) {
			$data['kode_diagnosa'] = $this->input->post('kode_diagnosa') ? $this->input->post('kode_diagnosa') : '';
			$data['nama_diagnosa'] = $this->input->post('nama_diagnosa') ? $this->input->post('nama_diagnosa') : '';
			 
		}

        $this->render['content'] = $this->load->view('admin/diagnosa/tambah', $data, TRUE);
    	$this->load->view('admin/sidebar', $this->render);
	}

	public function create_action()
	{
		$data = array(
			'kode_diagnosa' => $this->input->post('kode_diagnosa'),
			'nama_diagnosa' => $this->input->post('nama_diagnosa'),
			
		);

		$this->diagnosa->insert($data);

		redirect(site_url('index.php/diagnosa'));
	}

	public function update($kode_diagnosa)
	{
		$this->load->model('Diagnosa_model');

		$this->rules();
		$data['dataDiagnosa'] = $this->Diagnosa_model->get_by_update($kode_diagnosa);
        $this->render['content'] = $this->load->view('admin/diagnosa/edit', $data, TRUE);
    	$this->load->view('admin/sidebar', $this->render);
	}

	public function update_action($kode_diagnosa)
	{
		$kode_diagnosa = $this->input->post('kode_diagnosa');

		$data = array(
			'kode_diagnosa' => $this->input->post('kode_diagnosa'),
			'nama_diagnosa' => $this->input->post('nama_diagnosa'),
			
		);

		$this->diagnosa->update($kode_diagnosa, $data);

		redirect(site_url('index.php/diagnosa'));
	}


	public function delete($kode_diagnosa)
	{
		$this->load->model('Diagnosa_model');

		
		$row = $this->Diagnosa_model->get_by_id($kode_diagnosa);

		if ($row) {
			$this->diagnosa->delete($kode_diagnosa);
			redirect(site_url('index.php/diagnosa'));
		} 
		else {
			redirect(site_url('index.php/diagnosa'));
		}
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
?>