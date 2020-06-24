<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosa_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_oll()
	{
		$q = $this->db->query("SELECT * from diagnosa");	
		return $q;	
	}

	public function get_by_id($kode_diagnosa)
	{
		$this->db->where('kode_diagnosa', $kode_diagnosa);
		return $this->db->get('diagnosa')->row();
	}

	public function get_by_id_result($kode_diagnosa)
    {
        $this->db->where('kode_diagnosa', $kode_diagnosa);
        return $this->db->get('diagnosa')->result();
    }

	public function get_by_update($kode_diagnosa) {
		$this->db->where('kode_diagnosa', $kode_diagnosa);	
		$query = $this->db->get('diagnosa',1);
		return $query->result();
	}

	public function insert($data)
	{
		$this->db->insert('diagnosa', $data);
	}

	public function update($kode_diagnosa, $data)
	{
		$this->db->where('kode_diagnosa', $kode_diagnosa);
		$this->db->update('diagnosa', $data);
	}

	public function delete($kode_diagnosa)
	{
		$this->db->where('kode_diagnosa', $kode_diagnosa);
		$this->db->delete('diagnosa');
	}

}

/* End of file bidang_model.php */
/* Location: ./application/models/bidang_model.php */