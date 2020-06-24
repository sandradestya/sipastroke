<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Process extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('session', 'curl','form_validation'));
	}
	
	public function index()
	{
		$this->load->view('process');
	}

	public function diagnosa($id)
	{
		$sub = (int)$id;

		if ($sub==2)
		{
			if((int)$this->input->post('pilih')<2) {
				echo "<script>alert('Masukan Pilihan Gejala Kurang');window.history.back();</script>";
				return false;
			}
			
			$this->db->order_by('kode_gejala', '');
			$sql = $this->db->get('gejala');
			$baru = "";
			foreach ($sql->result() as $row)
			{
				if(!empty($this->input->post('gejala-' . $row->kode_gejala . '')))//jika dicawang 
				{
					$baru = $baru . $row->kode_gejala . "#";
				}
			}

			$this->session->set_userdata('baru', $baru);
		}

		$this->load->view('process');
	}
}

?>