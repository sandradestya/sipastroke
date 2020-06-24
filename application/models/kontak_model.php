<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all()
	{
		$this->db->select('*');
		$this->db->from('kontak');
		$this->db->order_by('kontak.id_kontak DESC');
		return $this->db->get()->result();
	}

	public function get_by_id($id_kontak)
	{
		$this->db->where('id_kontak', $id_kontak);
		return $this->db->get('kontak')->row();
	}

	public function get_by_id_result($id_kontak)
    {
        $this->db->where('id_kontak', $id_kontak);
        return $this->db->get('kontak')->result();
    }

	public function get_by_update($id_kontak) {
		$this->db->where('id_kontak', $id_kontak);	
		$query = $this->db->get('kontak',1);
		return $query->result();
	}

	public function get_by_detail($id_kontak) {
		$this->db->where('id_kontak', $id_kontak);	
		$query = $this->db->get('kontak',1);
		return $query->result();
	}

	public function insert($data)
	{
		$this->db->insert('kontak', $data);
	}

	public function update($id_kontak, $data)
	{
		$this->db->where('id_kontak', $id_kontak);
		$this->db->update('kontak', $data);
	}

	public function delete($id_kontak)
	{
		$this->db->where('id_kontak', $id_kontak);
		$this->db->delete('kontak');
	}

}

/* End of file kontak_model.php */
/* Location: ./application/models/kontak_model.php */