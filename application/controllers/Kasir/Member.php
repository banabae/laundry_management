<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		// universal_session();
		backButtonHandle();
	}

	private $table = 'tb_member';

	public function index()
	{

		$id_user = $this->session->userdata('id');
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();
		$data['tajuk'] = $data['getProfile']->role.' - '.'Member';

		$data['getDataMember'] = $this->mod_sb->mengambil($this->table)->result();

		$this->lp->page('universal/member/view_member', $data);
	}

	public function add_member()
	{
		$data['tajuk'] = 'Kasir - Add Member';
		$id_user = $this->session->userdata('id');
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();

		$this->lp->page('universal/member/add_member', $data);
	}

	public function edit_member($id)
	{
		$data['tajuk'] = 'Kasir - Edit Member';
		$id_user = $this->session->userdata('id');
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();
		$data['getDataMember'] = $this->mod_sb->mengambil($this->table, ['id'=>$id])->row();
		// var_dump($data['getDataOutlet']);
	    // die;

		$this->lp->page('universal/member/edit_member', $data);   
	}

	// //query
	public function mencari_member()
	{
	    $data['tajuk'] = 'Kasir - Member';
		$id_user = $this->session->userdata('id');
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();

		$keyword = $this->input->post('keyword');

		$data['getDataMember'] = $this->mod_sb->mencari2('tb_member', [
			'nama_member'   => $keyword,
			'alamat_member' => $keyword,
			'tlp_member'    => $keyword,
		])->result();

		// $data['getDataMember'] = $this->mod_sb->mengambil($this->table)->result();

		$this->lp->page('universal/member/view_member', $data);
	}
	
	// //query
	public function tambah_member()
	{
	    $post = $this->input->post();

	    $this->form_validation->set_rules('alamat_member', 'alamat_member', 'trim');
		
	    if ($this->form_validation->run() == FALSE) {
	    	echo "lah ko gagal";
	    } else {
	    	$data = [
				'id'            => $this->mod_sb->getId('tb_member', 'id', 'id'),
				'nama_member'   => $post['nama_member'],
				'tlp_member'    => $post['tlp_member'],
				'jenis_kelamin' => $post['jk'],
				'alamat_member' => $post['alamat_member'],
		    ];

		    $q = $this->mod_sb->menambah($this->table, $data);

			if ($q) {
				$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Berhasil menambah member.</div>');
			    redirect('Kasir/Member','refresh');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Gagal menambah member. silahkan cek kembali data yang Anda masukkan!</div>');
			    redirect('Kasir/Member/add_outlet','refresh');
			}
	    }
	    // var_dump($data);
	    // die;
	}

	// //query
	public function ubah_member()
	{
	    $post = $this->input->post();
		
		$id_member = $post['id_member'];
	    $data = [
			'nama_member'   => $post['nama_member'],
			'tlp_member'    => $post['tlp_member'],
			'jenis_kelamin' => $post['jk'],
			'alamat_member' => $post['alamat_member'],
	    ];

	    $q = $this->mod_sb->mengubah($this->table, ['id'=>$id_member], $data);

		if ($q) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Berhasil Mengubah member.</div>');
		    redirect('Kasir/Member','refresh');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Gagal Mengubah member. silahkan cek kembali data yang Anda masukkan!</div>');
		    redirect('Kasir/Member/edit_member/'.$id_member,'refresh');
		}
	    // var_dump($data);
	    // die;
	}

	// //query
	public function hapus_member($id)
	{
		$data = [
			'id' => $id
		];

		$this->mod_sb->menghapus($this->table, $data);
		
		$this->session->set_flashdata('message', '<div class="alert alert-danger text-center h3">Berhasil Menghapus member.</div>');
		redirect('Kasir/Member','refresh');

	}

}

/* End of file Member.php */
/* Location: ./application/controllers/Kasir/Member.php */