<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		backButtonHandle();
	}

	public function index()
	{
		$data['tajuk'] = 'Admin - Paket';

		$id_user = $this->session->userdata('id');
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();

		$data['getDataOutlet'] = $this->mod_sb->mengambil('tb_outlet')->result();
		$data['getDataPaket'] = $this->pm->getPaket()->result();

		$this->lp->page('admin/paket/view_paket', $data);
	}



	public function add_paket()
	{
		$data['tajuk'] = 'Admin - Add Paket';
		$id_user = $this->session->userdata('id');
		$data['getDataOutlet'] = $this->mod_sb->mengambil('tb_outlet')->result();

		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();

		$this->lp->page('admin/paket/add_paket', $data);   
	}

	public function edit_paket($id)
	{
		$data['tajuk'] = 'Admin - Edit Paket';
		$id_user = $this->session->userdata('id');
		$data['getDataOutlet'] = $this->mod_sb->mengambil('tb_outlet')->result();
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();

		$data['getDataPaket'] = $this->pm->getPaket(['tb_paket.id'=>$id])->row();
		// $data['getDataPaket'] = $this->mod_sb->mengambil('tb_paket', ['id'=>$id])->row();
		// var_dump($data['Paket']);
	    // die;

		$this->lp->page('admin/paket/edit_paket', $data);   
	}

	// //query
	public function mencari_paket()
	{
	    $data['tajuk'] = 'Admin - Paket';
		$id_user = $this->session->userdata('id');
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();

		$keyword = $this->input->post('keyword');
		$sort_by = $this->input->post('sort_by');

		// var_dump('tb_paket.'.$sort_by.'');
		// die;

		if ($sort_by != '') {
			if ($keyword != '') {
				$data['getDataPaket'] = $this->pm->mencariPaket([
					'tb_paket.'.$sort_by.'' => $keyword,
				])->result();
			}else{
				$data['getDataPaket'] = $this->pm->getPaket()->result();
			}
		} else {
			if ($keyword != '') {
				$data['getDataPaket'] = $this->pm->mencariPaket([
					'tb_paket.nama_paket' => $keyword,
					'tb_paket.jenis'      => $keyword,
					'tb_paket.harga'      => $keyword,
					// 'tb_outlet.nama'   => $keyword,
				])->result();
			} else {
				$data['getDataPaket'] = $this->pm->getPaket()->result();
			}
		}
		


		// $data['getDataOutlet'] = $this->mod_sb->mengambil($this->table)->result();

		$this->lp->page('admin/paket/view_paket', $data);
	}
	
	// //query
	public function tambah_paket()
	{
	    $post = $this->input->post();
		
	    $data = [
			'id'         => $this->mod_sb->getIdPaket('tb_paket', 'id', 'id'),
			'id_outlet'  => $post['id_outlet'],
			'nama_paket' => $post['nama_paket'],
			'jenis'      => $post['jenis'],
			'harga'      => $post['harga'],
	    ];

	    // var_dump($data);
	    // die;

	    $q = $this->mod_sb->menambah('tb_paket', $data);

		if ($q) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Berhasil menambah paket.</div>');
		    redirect('Admin/Paket','refresh');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Gagal menambah paket. silahkan cek kembali data yang Anda masukkan!</div>');
		    redirect('Admin/Paket/add_paket','refresh');
		}
	    // var_dump($data);
	    // die;
	}

	// //query
	public function ubah_paket()
	{
	    $post = $this->input->post();
		
		$id_paket = $post['id_paket'];
	    $data = [
			'id_outlet'  => $post['id_outlet'],
			'nama_paket' => $post['nama_paket'],
			'jenis'      => $post['jenis'],
			'harga'      => $post['harga'],
	    ];

	    //  var_dump($data);
	    // die;

	    $q = $this->mod_sb->mengubah('tb_paket', ['id'=>$id_paket], $data);

		if ($q) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Berhasil Mengubah paket.</div>');
		    redirect('Admin/Paket','refresh');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Gagal Mengubah paket. silahkan cek kembali data yang Anda masukkan!</div>');
		    redirect('Admin/Paket/edit_paket/'.$id_paket,'refresh');
		}
	    // var_dump($data);
	    // die;
	}

	// //query
	public function hapus_paket($id)
	{
		$data = [
			'id' => $id
		];


		$check = $this->mod_sb->mengambil('tb_paket', ['id_outlet'=>$id])->result();

		if (!$check) {
			$this->mod_sb->menghapus('tb_paket', $data);

			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center h3">Berhasil menghapus paket.</div>');
			redirect('Admin/Paket','refresh');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center h3">Maaf Data Paket Anda tidak bisa dihapus dikarenakan ada beberapa data yang masih berelasi.</div>');
			redirect('Admin/Paket','refresh');
		}
	}

}

/* End of file Paket.php */
/* Location: ./application/controllers/Admin/Paket.php */