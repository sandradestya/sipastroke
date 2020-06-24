<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses extends CI_Controller {

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
	public function cbr($id_kasus)
	{
		if ($id_kasus==1)
		{
			$this->load->model('Gejala_model');

			$data['gejala'] = $this->Gejala_model->get_All()->result();
			$this->render['content'] = $this->load->view('admin/proses/cbr', $data, TRUE);
		    	$this->load->view('admin/sidebar', $this->render);
		}
		else if ($id_kasus==2)
		{
			$this->db->order_by('kode_gejala', '');
			$sql = $this->db->get('gejala');
			$baru = "";
			foreach ($sql->result() as $row)
			{
				if(!empty($this->input->post('gejala-' . $row->kode_gejala . '')))
				{
					$baru = $baru . $row->kode_gejala . "#";
				}
			}

			$this->session->set_userdata('baru', $baru);
		
			$this->render['content'] = $this->load->view('admin/proses/cbr', null, TRUE);
		    	$this->load->view('admin/sidebar', $this->render);
		}
		else if ($id_kasus==3)
		{
			$this->render['content'] = $this->load->view('admin/proses/cbr', null, TRUE);
		    	$this->load->view('admin/sidebar', $this->render);
		}
	}

}

?>