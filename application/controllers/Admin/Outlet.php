<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		backButtonHandle();
	}

	private $table = 'tb_outlet';

	public function index()
	{
		$data['tajuk'] = 'Admin - Outlet';

		$id_user = $this->session->userdata('id');
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();

		$data['getDataOutlet'] = $this->mod_sb->mengambil($this->table)->result();

		$this->lp->page('admin/outlet/view_outlet', $data);
	}

	public function add_outlet()
	{
		$data['tajuk'] = 'Admin - Add Outlet';
		$id_user = $this->session->userdata('id');
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();

		$this->lp->page('admin/outlet/add_outlet', $data);   
	}

	public function edit_outlet($id)
	{
		$data['tajuk'] = 'Admin - Edit Outlet';
		$id_user = $this->session->userdata('id');
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();
		$data['getDataOutlet'] = $this->mod_sb->mengambil($this->table, ['id'=>$id])->row();
		// var_dump($data['getDataOutlet']);
	    // die;

		$this->lp->page('admin/outlet/edit_outlet', $data);   
	}

	//query
	public function mencari_outlet()
	{
	    $data['tajuk'] = 'Admin - Outlet';
		$id_user = $this->session->userdata('id');
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();

		$keyword = $this->input->post('keyword');

		$data['getDataOutlet'] = $this->mod_sb->mencari2('tb_outlet', [
			'nama_outlet'   => $keyword,
			'alamat' => $keyword,
			'tlp'    => $keyword,
		])->result();

		// $data['getDataOutlet'] = $this->mod_sb->mengambil($this->table)->result();

		$this->lp->page('admin/outlet/view_outlet', $data);
	}
	
	//query
	public function tambah_outlet()
	{
	    $post = $this->input->post();
		
	    $data = [
	    	'id' => $this->mod_sb->getId('tb_outlet', 'id', 'id'),
			'nama_outlet'   => strtoupper($post['nama_outlet']),
			'alamat' => $post['alamat_outlet'],
			'tlp'    => $post['tlp_outlet'],
	    ];

	    $q = $this->mod_sb->menambah($this->table, $data);

		if ($q) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Berhasil menambah data outlet.</div>');
		    redirect('Admin/Outlet','refresh');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Gagal menambah data outlet. silahkan cek kembali data yang Anda masukkan!</div>');
		    redirect('Admin/Outlet/add_outlet','refresh');
		}
	    // var_dump($data);
	    // die;
	}

	//query
	public function ubah_outlet()
	{
	    $post = $this->input->post();
		
		$id_outlet = $post['id_outlet'];
	    $data = [
			'nama_outlet'   => strtoupper($post['nama_outlet']),
			'alamat' => $post['alamat_outlet'],
			'tlp'    => $post['tlp_outlet'],
	    ];

	    $q = $this->mod_sb->mengubah($this->table, ['id'=>$id_outlet], $data);

		if ($q) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Berhasil Mengubah data outlet.</div>');
		    redirect('Admin/Outlet','refresh');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Gagal Mengubah data outlet. silahkan cek kembali data yang Anda masukkan!</div>');
		    redirect('Admin/Outlet/edit_outlet/'.$id_outlet,'refresh');
		}
	    // var_dump($data);
	    // die;
	}

	//query
	public function hapus_outlet($id)
	{
		$data = [
			'id' => $id
		];

		$check1 = $this->mod_sb->mengambil('tb_paket', ['id_outlet'=>$id])->result();
		$check2 = $this->mod_sb->mengambil('tb_user', ['id_outlet'=>$id])->result();
		$check3 = $this->mod_sb->mengambil('tb_transaksi', ['id_outlet'=>$id])->result();

		if (!$check1 OR !$check2 OR !$check3) {
			$this->mod_sb->menghapus($this->table, $data);

			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center h3">Berhasil Menghapus outlet.</div>');
			redirect('Admin/Outlet','refresh');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center h3">Maaf Data Outlet Anda tidak bisa dihapus dikarenakan ada beberapa data yang masih berelasi dengan Outlet Anda.</div>');
			redirect('Admin/Outlet','refresh');
		}
		

	}

}

/* End of file Outlet.php */
/* Location: ./application/controllers/Admin/Outlet.php */