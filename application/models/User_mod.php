<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_mod extends CI_Model {

	private $table = 'tb_user';

	public function getUser($where = NULL, $keyword = NULL)
	{
		$this->db->order_by(''.$this->table.'.id', 'desc');
		$this->db->select(''.$this->table.'.*');
		$this->db->select('tb_outlet.nama_outlet');
		$this->db->from($this->table);
		$this->db->join('tb_outlet', 'tb_outlet.id = '.$this->table.'.id_outlet', 'left');

		if ($where != NULL) {
	    	$this->db->where($where);
	    }

	    if ($keyword != NULL) {
	    	$this->db->like($keyword);
		    $this->db->or_like($keyword);
	    }

		return $this->db->get();
	}

}

/* End of file User_mod.php */
/* Location: ./application/models/User_mod.php */