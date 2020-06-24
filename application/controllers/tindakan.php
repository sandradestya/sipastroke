<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tindakan extends CI_Controller {

public function __construct()
{
	parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('session', 'curl','form_validation'));
		$this->load->model('Tindakan_model','tindakan');

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
		$this->load->model('Tindakan_model');

		$data['dataTindakan'] = $this->Tindakan_model->get_All()->result();
		//$this->load->view('inventaris/data_inventaris', $data);


        $this->render['content'] = $this->load->view('admin/tindakan/index', $data,TRUE);
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
			$data['kode_tindakan'] = $this->input->post('kode_tindakan') ? $this->input->post('kode_tindakan') : '';
			$data['nama_tindakan'] = $this->input->post('nama_tindakan') ? $this->input->post('nama_tindakan') : '';
			
			 
		}

        $this->render['content'] = $this->load->view('admin/tindakan/tambah', $data, TRUE);
    	$this->load->view('admin/sidebar', $this->render);
	}

	public function create_action()
	{
		$data = array(
			'kode_tindakan' => $this->input->post('kode_tindakan'),
			'nama_tindakan' => $this->input->post('nama_tindakan'),
			
			
			
		);

		$this->tindakan->insert($data);

		redirect(site_url('index.php/tindakan'));
	}

	public function update($kode_tindakan)
	{
		$this->load->model('Tindakan_model');

		$this->rules();
		$data['dataTindakan'] = $this->Tindakan_model->get_by_update($kode_tindakan);
        $this->render['content'] = $this->load->view('admin/tindakan/edit', $data, TRUE);
    	$this->load->view('admin/sidebar', $this->render);
	}

	public function update_action($kode_tindakan)
	{
		$kode_tindakan = $this->input->post('kode_tindakan');

		$data = array(
			'kode_tindakan' => $this->input->post('kode_tindakan'),
			'nama_tindakan' => $this->input->post('nama_tindakan'),
			
			
		);

		$this->tindakan->update($kode_tindakan, $data);

		redirect(site_url('index.php/tindakan'));
	}

	public function delete($kode_tindakan)
	{
		$this->db->delete('kasus_tnd', array('tindakan' => $kode_tindakan));
		$this->load->model('Tindakan_model');
		
		$row = $this->Tindakan_model->get_by_id($kode_tindakan);

		if ($row) {
			$this->tindakan->delete($kode_tindakan);
			redirect(site_url('index.php/tindakan'));
		} 
		else {
			redirect(site_url('index.php/tindakan'));
		}
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
?>