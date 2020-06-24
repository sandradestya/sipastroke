<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tindakan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_All()
	{
		$q = $this->db->query("SELECT * from tindakan");	
		return $q;	
	}

	public function get_by_id($kode_tindakan)
	{
		$this->db->where('kode_tindakan', $kode_tindakan);
		return $this->db->get('tindakan')->row();
	}

	public function get_by_id_result($kode_tindakan)
    {
        $this->db->where('kode_tindakan', $kode_tindakan);
        return $this->db->get('tindakan')->result();
    }

	public function get_by_update($kode_tindakan) {
		$this->db->where('kode_tindakan', $kode_tindakan);	
		$query = $this->db->get('tindakan',1);
		return $query->result();
	}

	public function insert($data)
	{
		$this->db->insert('tindakan', $data);
	}

	public function update($kode_tindakan, $data)
	{
		$this->db->where('kode_tindakan', $kode_tindakan);
		$this->db->update('tindakan', $data);
	}

	public function delete($kode_tindakan)
	{
		$this->db->where('kode_tindakan', $kode_tindakan);
		$this->db->delete('tindakan');
	}

}

/* End of file tindakan_model.php */
/* Location: ./application/models/tindakan_model.php */