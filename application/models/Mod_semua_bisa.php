<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_semua_bisa extends CI_Model {

	public function mengambil($table, $where = NULL, $limit = NULL, $like = NULL)
	{
	    if ($limit != NULL) {
	    	$this->db->limit($limit);
	    }

	    if ($like != NULL) {
	    	$this->db->like($like);
	    }

	    if ($where != NULL) {
	    	$this->db->where($where);
	    }
	    
    	$this->db->order_by('id', 'desc');

	    return $this->db->get($table);
	}

	public function mencari($table, $where, $like)
	{
	    if ($where != NULL) {
	    	$this->db->where($where);
	    }

	    if ($like != NULL) {
	    	$this->db->like($like);
	    }
	    return $this->db->get($table);
	}

	public function mencari2($table, $keyword)
	{
	    $this->db->select('*');
	    $this->db->from($table);
	    $this->db->like($keyword);
	    $this->db->or_like($keyword);
	    
    	$this->db->order_by('id', 'desc');

	    return $this->db->get();
	}

	public function mencariNilaiMaksimun($table, $field = NULL, $alias = NULL, $where = NULL)
	{
	    if ($field != NULL) {
	    	$this->db->select_max($field, $alias);
	    }
	    if ($where != NULL) {
	    	$this->db->where($where);
	    }
	    return $this->db->get($table);
	}

	public function mencariTotal($table, $field, $alias, $where = NULL)
	{
	    $this->db->select('sum('.$field.') as '.$alias);
	    if ($where != NULL) {
	    	$this->db->where($where);
	    }
	    return $this->db->get($table);
	}

	public function menghitung($table, $where = NULL)
	{
	    if ($where != NULL) {
	    	$this->db->where($where);
	    }
	    $this->db->from($table);
	    return $this->db->count_all_result();
	}

	public function menambah($table, $data)
	{
	    if ($this->db->insert($table, $data)) {
	    	return [
	    		'status' => 'berhasil',
	    		'nilai' => $this->db->insert_id()
	    	];
	    } else {
	    	return [
	    		'status' => 'gagal'
	    	];
	    }
	    
	}

	public function mengubah($table, $where, $data)
	{
	    $this->db->where($where);
	    if ($this->db->update($table, $data)) {
	    	return [
	    		'status' => 'berhasil'
	    	];
	    } else {
	    	return [
	    		'status' => 'gagal'
	    	];
	    }
	    
	}

	public function menghapus($table, $data)
	{
	    $this->db->where($data);
	    if ($this->db->delete($table)) {
	    	return [
	    		'status' => 'berhasil'
	    	];
	    } else {
	    	return [
	    		'status' => 'gagal'
	    	];
	    }

	}

	public function getId($table, $max, $alias) {
		$tahun = date("Y");
		// $kode = 'BRG';
		$query = $this->db->query("SELECT MAX(".$max.") as ".$alias." FROM ".$table.""); 
		$row = $query->row_array();
		$max_id = $row[$alias]; 
		$max_id1 =(int) substr($max_id,5,7);
		$id_order = $max_id1 +1;
		$maxid_order = $tahun.sprintf("%04s",$id_order);

		// var_dump($row);
	    // die;

		return $maxid_order;
	}

	public function getIdPaket($table, $max, $alias) {
		$tahunDanBulan = date("ym");
		// $kode = 'BRG';
		$query = $this->db->query("SELECT MAX(".$max.") as ".$alias." FROM ".$table.""); 
		$row = $query->row_array();
		$max_id = $row[$alias]; 
		$max_id1 =(int) substr($max_id,5,7);
		$id_order = $max_id1 +1;
		$maxid_order = $tahunDanBulan.sprintf("%04s",$id_order);

		// var_dump($row);
	    // die;

		return $maxid_order;
	}

	public function getIdTransaksi($table, $max, $alias) {
		$tahunDanBulan = date("m");
		// $kode = 'BRG';
		$query = $this->db->query("SELECT MAX(".$max.") as ".$alias." FROM ".$table.""); 
		$row = $query->row_array();
		$max_id = $row[$alias]; 
		$max_id1 =(int) substr($max_id,5,7);
		$id_order = $max_id1 +1;
		$maxid_order = $tahunDanBulan.sprintf("%05s",$id_order);

		// var_dump($row);
	    // die;

		return $maxid_order;
	}

	public function kodeInVoice($table, $max, $alias) {
		$kode = "INV";
		$tahunDanBulan = date("ymd");
		// $kode = 'BRG';
		$query = $this->db->query("SELECT MAX(".$max.") as ".$alias." FROM ".$table.""); 
		$row = $query->row_array();
		$max_id = $row[$alias]; 
		$max_id1 =(int) substr($max_id,5,7);
		$id_order = $max_id1 +1;
		$maxid_order = $kode."/".$tahunDanBulan."/".sprintf("%05s",$id_order);

		// var_dump($row);
	    // die;

		return $maxid_order;
	}

	public function autocompletepaket($title, $table)
	{
		$this->db->select($table.'.*');
		$this->db->select('tb_outlet.nama_outlet');
		$this->db->from($table);
		$this->db->join('tb_outlet', 'tb_outlet.id = '.$table.'.id_outlet', 'left');

	    $this->db->like($table.'.nama_paket', $title, 'BOTH');
	    $this->db->order_by($table.'.nama_paket', 'ASC');
	    $this->db->limit(10);

	    // if ($where != NULL) {
	    // 	$this->db->where($where);
	    // }

	    return $this->db->get();
	}

	public function autocompletemember($title, $table)
	{
	    $this->db->like('id', $title, 'BOTH');
	    $this->db->order_by('id', 'ASC');
	    $this->db->limit(10);

	    return $this->db->get($table);
	}

}

/* End of file Mod_semua_bisa.php */
/* Location: ./application/models/Mod_semua_bisa.php */