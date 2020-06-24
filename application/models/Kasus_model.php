<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasus_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function get_ill()
	{
		$this->db->select('*');
		$this->db->from('kasus');
		$this->db->order_by('kasus.id_kasus DESC');
		return $this->db->get()->result();
	}

	public function get_All()
	{
		$q = $this->db->query("SELECT id_kasus, acc, nama_diagnosa from kasus, diagnosa
							   WHERE kasus.kode_diagnosa = diagnosa.kode_diagnosa
									");	
		return $q;	
	}


	public function get_by_id($id_kasus)
	{
		$this->db->where('id_kasus', $id_kasus);
		return $this->db->get('kasus')->row();
	}

	public function get_by_update($id_kasus) {
		$this->db->where('id_kasus', $id_kasus);	
		$query = $this->db->get('kasus',1);
		return $query->result();
	}

	public function get_by_detail($id_kasus) {
		$this->db->where('id_kasus', $id_kasus);	
		$query = $this->db->get('kasus',1);
		return $query->result();
	}

	public function insert($data)
	{
		$data = array(
			'id_kasus' => $this->input->post('id_kasus'),
			'kode_diagnosa' => $this->input->post('kode_diagnosa')
			
			
		);
		$this->db->insert('kasus',$data);

	}

	public function update($id_kasus, $data)
	{
		$this->db->where('id_kasus', $id_kasus);
		$this->db->update('kasus', $data);
	}

	public function delete($id_kasus)
	{
		$this->db->where('id_kasus', $id_kasus);
		$this->db->delete('kasus');
	}

}

/* End of file kegiatan_model.php */
/* Location: ./application/models/kegiatan_model.php */