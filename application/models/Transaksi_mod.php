<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_mod extends CI_Model {

	public function getData($id_outlet)
	{
	    $this->db->select('tt.*');
	    $this->db->select('to.nama_outlet');
	    $this->db->select('tu.nama');
	    $this->db->select('tu.role');
	    $this->db->from('tb_transaksi tt');
	    $this->db->join('tb_outlet to', 'to.id = tt.id_outlet', 'left');
	    $this->db->join('tb_user tu', 'tu.id = tt.id_user', 'left');
	    $this->db->where('tt.id_outlet', $id_outlet);
	    $this->db->order_by('tt.kode_invoice', 'desc');

	    return $this->db->get();
	}

	public function getData2($id)
	{
	    $this->db->select('tt.*');
	    $this->db->select('to.nama_outlet');
	    $this->db->select('tu.nama');
	    $this->db->select('tu.role');
	    $this->db->from('tb_transaksi tt');
	    $this->db->join('tb_outlet to', 'to.id = tt.id_outlet', 'left');
	    $this->db->join('tb_user tu', 'tu.id = tt.id_user', 'left');
	    $this->db->where('tt.id', $id);
	    $this->db->order_by('tt.kode_invoice', 'desc');

	    return $this->db->get();
	}

	public function getDataNew($id_outlet)
	{
	    $this->db->select('tt.*');
	    $this->db->select('to.nama_outlet');
	    $this->db->select('tu.nama');
	    $this->db->select('tu.role');
	    $this->db->from('tb_transaksi tt');
	    $this->db->join('tb_outlet to', 'to.id = tt.id_outlet', 'left');
	    $this->db->join('tb_user tu', 'tu.id = tt.id_user', 'left');
	    $this->db->where('tt.status', 'baru');
	    $this->db->limit(5);
	    $this->db->where('tt.id_outlet', $id_outlet);
	    $this->db->order_by('tt.kode_invoice', 'desc');

	    return $this->db->get();
	}

}

/* End of file Transaksi_mod.php */
/* Location: ./application/models/Transaksi_mod.php */