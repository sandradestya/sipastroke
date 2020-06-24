<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_oll()
	{
		$q = $this->db->query("SELECT * from akun");	
		return $q;	
	}

	public function get_by_id($id_akun)
	{
		$this->db->where('id_akun', $id_akun);
		return $this->db->get('akun')->row();
	}

	public function get_by_id_result($id_akun)
    {
        $this->db->where('id_akun', $id_akun);
        return $this->db->get('akun')->result();
    }

	public function get_by_update($id_akun) {
		$this->db->where('id_akun', $id_akun);	
		$query = $this->db->get('akun',1);
		return $query->result();
	}

	public function insert($data)
	{
		$this->db->insert('akun', $data);
	}

	public function update($id_akun, $data)
	{
		$this->db->where('id_akun', $id_akun);
		$this->db->update('akun', $data);
	}

	public function delete($id_akun)
	{
		$this->db->where('id_akun', $id_akun);
		$this->db->delete('akun');
	}

}

/* End of file bidang_model.php */
/* Location: ./application/models/bidang_model.php */