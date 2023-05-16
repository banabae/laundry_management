<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_mod extends CI_Model {

	private $table = 'tb_paket';

	// List all your items
	public function getPaket($where = NULL)
	{
		$this->db->order_by(''.$this->table.'.id', 'desc');
		$this->db->select(''.$this->table.'.*');
		$this->db->select('tb_outlet.nama_outlet');
		$this->db->from($this->table);
		$this->db->join('tb_outlet', 'tb_outlet.id = '.$this->table.'.id_outlet', 'left');

		if ($where != NULL) {
	    	$this->db->where($where);
	    }

		return $this->db->get();
	}

	public function mencariPaket($keyword)
	{
	    $this->db->order_by(''.$this->table.'.id', 'desc');
		$this->db->select(''.$this->table.'.*');
		$this->db->select('tb_outlet.nama_outlet');
		$this->db->from($this->table);
		$this->db->join('tb_outlet', 'tb_outlet.id = '.$this->table.'.id_outlet', 'left');
		
	    $this->db->like($keyword);
	    $this->db->or_like($keyword);

	    return $this->db->get();
	}
}

/* End of file Paket_mod.php */
/* Location: ./application/models/Paket_mod.php */
