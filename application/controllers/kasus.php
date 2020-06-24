<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasus extends CI_Controller {

public function __construct()
{
	parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('session', 'curl','form_validation'));
		$this->load->model('Kasus_model','kasus');
		$this->load->model('Diagnosa_model','diagnosa');
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
		$this->load->model('Kasus_model');
		$this->load->model('Diagnosa_model');
		$data['nama_diagnosa'] = $this->Diagnosa_model->get_oll()->result();
		$data['dataKasus'] = $this->Kasus_model->get_All()->result();
		//$this->load->view('inventaris/data_inventaris', $data);

		
        $this->render['content'] = $this->load->view('admin/kasus/index', $data, TRUE);
    	$this->load->view('admin/sidebar', $this->render);

    
	}

	public function rules()
	{
		
		$this->form_validation->set_rules('nama_diagnosa', 'nama_diagnosa', 'trim|required');
		
	}

	public function create()
	{
		$this->rules();
		if ($this->form_validation->run() == FALSE) {
			
			$data['nama_diagnosa'] = $this->input->post('nama_diagnosa') ? $this->input->post('nama_diagnosa') : '';
			
			 
		}
		$this->load->model('Diagnosa_model');
		$data['diagnosa'] = $this->Diagnosa_model->get_oll()->result();
        $this->render['content'] = $this->load->view('admin/kasus/tambah', $data, TRUE);
    	$this->load->view('admin/sidebar', $this->render);
	}

	public function create_action()
	{
		if(isset($_POST['submit'])){
            $data = array(
                'id_kasus'     	  =>  $this->input->post('id_kasus'),
                'kode_diagnosa'   =>  $this->input->post('kode_diagnosa'));


            $insert 				=  $this->Kasus_model->insert($data);
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect(site_url('index.php/kasudds'));
        }else{
			$this->load->model('Diagnosa_model');
            $this->load->model('Kasus_model');
			
			//$this->load->view('pengadaan/tambah_pengadaan', $data);
			redirect(site_url('index.php/kasus'));
			
        }
		
	}

	public function create_actionn()
	{
		$data = array(
			'id_kasus' => $this->input->post('id_kasus'),
			'kode_diagnosa' => $this->input->post('kode_diagnosa'),
			'acc' => '1'
		);
		$this->kasus->insert($data);
		
		$this->db->order_by('kode_gejala', '');
		$sql = $this->db->get('gejala');
		foreach ($sql->result() as $row)
		{
			if(!empty($this->input->post('gejala-' . $row->kode_gejala . '')))
			{
				$data = array(
					'kasus' => $this->input->post('id_kasus'),
					'gejala' => $this->input->post('gejala-' . $row->kode_gejala . ''),
					'acc' => '1'
				);
			
				$this->db->insert('kasus_gjl', $data);
			}
		}
		
		$this->db->order_by('kode_tindakan', '');
		$sql = $this->db->get('tindakan');
		foreach ($sql->result() as $row)
		{
			if(!empty($this->input->post('tindakan-' . $row->kode_tindakan . '')))
			{
				$data = array(
					'kasus' => $this->input->post('id_kasus'),
					'tindakan' => $this->input->post('tindakan-' . $row->kode_tindakan . '')
				);
			
				$this->db->insert('kasus_tnd', $data);
			}
		}
		
		$this->load->model('Diagnosa_model');

		$data['diagnosa'] = $this->Diagnosa_model->get_oll()->result();
		redirect(site_url('index.php/kasus'));
	}

	public function update($id_kasus)
	{
		$this->load->model('Kasus_model');
		$this->load->model('Diagnosa_model');
		$this->rules();
		
		$data['dataKasus'] = $this->Kasus_model->get_by_update($id_kasus);
        	$data['diagnosa'] = $this->Diagnosa_model->get_oll()->result();
		$this->render['content'] = $this->load->view('admin/kasus/edit', $data, TRUE);
    		$this->load->view('admin/sidebar', $this->render);
	}

	public function detail($id_kasus)
	{
		$this->load->model('Kasus_model');
		$this->load->model('Gejala_model');

		$this->rules();
		$data['dataKasus'] = $this->Kasus_model->get_by_update($id_kasus);
		$data['gejala'] = $this->Gejala_model->get_All()->result();
		$this->render['content'] = $this->load->view('admin/kasus/detail', $data, TRUE);
    		$this->load->view('admin/sidebar', $this->render);
	}

	public function update_action($id_kasus)
	{
		$this->db->delete('kasus_gjl', array('kasus' => $id_kasus));
		$this->db->delete('kasus_tnd', array('kasus' => $id_kasus));
		
		$data = array(
			'kode_diagnosa' => $this->input->post('kode_diagnosa'),			
		);
		$this->kasus->update($id_kasus, $data);

		$this->db->order_by('kode_gejala', '');
		$sql = $this->db->get('gejala');
		foreach ($sql->result() as $row)
		{
			if(!empty($this->input->post('gejala-' . $row->kode_gejala . '')))
			{
				$data = array(
					'kasus' => $id_kasus,
					'gejala' => $this->input->post('gejala-' . $row->kode_gejala . '')
				);
			
				$this->db->insert('kasus_gjl', $data);
			}
		}
		
		$this->db->order_by('kode_tindakan', '');
		$sql = $this->db->get('tindakan');
		foreach ($sql->result() as $row)
		{
			if(!empty($this->input->post('tindakan-' . $row->kode_tindakan . '')))
			{
				$data = array(
					'kasus' => $id_kasus,
					'tindakan' => $this->input->post('tindakan-' . $row->kode_tindakan . '')
				);
			
				$this->db->insert('kasus_tnd', $data);
			}
		}
		
		redirect(site_url('index.php/kasus'));
	}

	public function detail_action()
	{
		$this->db->delete('kasus_gjl', array('kasus' => $this->input->post('id_kasus')));
		
		$this->db->order_by('kode_gejala', '');
		$sql = $this->db->get('gejala');
		foreach ($sql->result() as $row)
		{
			if(!empty($this->input->post('gejala-' . $row->kode_gejala . '')))
			{
				$data = array(
					'kasus' => $this->input->post('id_kasus'),
					'gejala' => $this->input->post('gejala-' . $row->kode_gejala . '')
				);
			
				$this->db->insert('kasus_gjl', $data);
			}
		}
		
		redirect(site_url('index.php/kasus'));
	}
	
	public function delete($id_kasus)
	{
		$this->load->model('Kasus_model');

		
		$row = $this->Kasus_model->get_by_id($id_kasus);

		if ($row) {
			$this->kasus->delete($id_kasus);
			$this->db->delete('kasus_gjl', array('kasus' => $id_kasus));
			$this->db->delete('kasus_tnd', array('kasus' => $id_kasus));
			
			redirect(site_url('index.php/kasus'));
		} 
		else {
			redirect(site_url('index.php/kasus'));
		}
	}

	public function rekom($id_kasus)
	{
		$data = array(
			'acc' => '1'			
		);
		$this->db->where('id_kasus', $id_kasus);
		$this->db->update('kasus', $data);
		$this->db->where('kasus', $id_kasus);
		$this->db->update('kasus_gjl', $data);

		redirect(site_url('index.php/kasus'));		
	}	

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
?>