<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

public function __construct()
{
	parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('session', 'curl'));

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
		$data['dataBidang'] = $this->Diagnosa_model->get_oll();
        $this->render['content'] = $this->load->view('admin/dashboard',$data, TRUE);
    	$this->load->view('admin/sidebar', $this->render);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
?>