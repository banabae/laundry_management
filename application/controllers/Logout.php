<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// is_session_in();
		backButtonHandle();
	}

	public function index()
	{
		$id_user = $this->session->userdata('id');

		$ip_address = $this->input->ip_address();
		$browser_detail = $this->agent->browser()." ".$this->agent->version();
		$os = $this->agent->platform();

		$data = [
			'id_user' => $id_user,
			'ip_address' => $ip_address,
			'browser_detail' => $browser_detail,
			'sistem_operasi' => $os,
			'last_login' => date("Y-m-d H:i:s"),
		];

		// var_dump($data);
		// die;

		$insertLastLogin = $this->mod_sb->menambah('riwayat_log', $data);

		// $updateLastLogin = $this->mod_sb->mengubah('tb_user', ['id'=>$id_user], $data);

		$this->session->sess_destroy();
		// $this->session->unset_userdata('id');
		// $this->session->unset_userdata('nama');
		// $this->session->unset_userdata('photo_profile');
		// $this->session->unset_userdata('username');
		// $this->session->unset_userdata('role');

		$this->session->set_flashdata('message', '<div class="alert alert-success text-center">Anda berhasil keluar!</div>');
		redirect('Auth/login','refresh');
	}

}

/* End of file Logout.php */
/* Location: ./application/controllers/Kasir/Logout.php */