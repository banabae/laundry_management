<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		backButtonHandle();
	}

	public function index()
	{
		$data['tajuk']                    = 'Admin - Dashboard';
		
		$id_user                          = $this->session->userdata('id');
		
		$data['getProfile']               = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();
		
		$data['getCountNewTransaksi']     = $this->mod_sb->mengambil('tb_transaksi', ['status'=>'baru'])->num_rows();
		$data['getCountTransaksiSuccess'] = $this->mod_sb->mengambil('tb_transaksi', ['status'=>'diambil','dibayar'=>'dibayar'])->num_rows();
		$getPemasukan = $this->mod_sb->mencariTotal('tb_transaksi', 'totalKeseluruhan', 'totalKeseluruhan')->result();
		foreach ($getPemasukan as $p) {
			$data['getSeluruhPemasukan'] = $this->lps->getRupiah($p->totalKeseluruhan);
		}
		$data['getCountOutlet']           = $this->mod_sb->mengambil('tb_outlet')->num_rows();
		$data['getCountMember']           = $this->mod_sb->mengambil('tb_member')->num_rows();
		$data['getCountPaket']            = $this->mod_sb->mengambil('tb_paket')->num_rows();
		$data['getCountUser']             = $this->mod_sb->mengambil('tb_user')->num_rows();
		
	    $id_outlet = $this->session->userdata('id_outlet_user');
		$data['getDataTransaksi']         = $this->trxm->getDataNew($id_outlet)->result();


		// var_dump(time());
		// die;
		
	    $this->lp->page('universal/dashboard', $data);
	}

	public function table()
	{
	    $data['tajuk'] = 'Admin - Tables';
		$id_user = $this->session->userdata('id');
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();
		
	    $this->lp->page('universal/table', $data);
	}

	public function addTable()
	{
	    $data['tajuk'] = 'Admin - Add Tables';
		$id_user = $this->session->userdata('id');
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();
		
	    $this->lp->page('universal/crud/addtable', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Admin/Home.php */