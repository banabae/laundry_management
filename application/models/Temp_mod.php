<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Temp_mod extends CI_Model {

	public function getTempWithJoin($where = NULL)
	{
	    $this->db->select('tdt.*');
	    $this->db->select('tp.id_outlet');
	    $this->db->select('tp.nama_paket');
	    $this->db->select('tp.jenis');
	    $this->db->select('tp.harga');
	    $this->db->select('to.nama_outlet');
	    $this->db->from('temp_detail_transaksi tdt');
	    $this->db->join('tb_paket tp', 'tp.id = tdt.id_paket', 'left');
	    $this->db->join('tb_outlet to', 'to.id = tp.id_outlet', 'left');

	    if ($where != NULL) {
	    	$this->db->where($where);
	    }

	    return $this->db->get();
	}

	public function getTotalSub()
	{
	    $this->db->select_sum('tdt.sub_total');
	    $this->db->from('temp_detail_transaksi tdt');

	    return $this->db->get();
	}
}

/* End of file Temp_mod.php */
/* Location: ./application/models/Temp_mod.php */