<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_All()
	{
		$q = $this->db->query("SELECT * from gejala");	
		return $q;	
	}

	public function get_by_id($kode_gejala)
	{
		$this->db->where('kode_gejala', $kode_gejala);
		return $this->db->get('gejala')->row();
	}

	public function get_by_id_result($kode_gejala)
    {
        $this->db->where('kode_gejala', $kode_gejala);
        return $this->db->get('gejala')->result();
    }

	public function get_by_update($kode_gejala) {
		$this->db->where('kode_gejala', $kode_gejala);	
		$query = $this->db->get('gejala',1);
		return $query->result();
	}

	public function insert($data)
	{
		$this->db->insert('gejala', $data);
	}

	public function update($kode_gejala, $data)
	{
		$this->db->where('kode_gejala', $kode_gejala);
		$this->db->update('gejala', $data);
	}

	public function delete($kode_gejala)
	{
		$this->db->where('kode_gejala', $kode_gejala);
		$this->db->delete('gejala');
	}

}

/* End of file bidang_model.php */
/* Location: ./application/models/bidang_model.php */