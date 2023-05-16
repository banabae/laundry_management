<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_session_in();
		backButtonHandle();
	}

	private $table = 'tb_user';

	public function index()
	{
		return redirect('Auth/login','refresh');
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_message('required', 'Form ini wajib diisi!');
		// $this->form_validation->set_message('min_length', 'Minimal panjang huruf tidak mencukupi! tambahkan beberapa kata lagi.');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		} else {
			# code...
			$this->_login();
			// return redirect('Auth','refresh');
		}
		// $this->session->set_flashdata('message', '<div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Selamat datang di NamaAplikasi</div>');

	}

	public function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		// echo "awokawoka";
		$user     = $this->mod_sb->mengambil($this->table, ['username'=>$username] )->row();

		// var_dump($user);
		// die;

		if ($user) {
			if (password_verify($password, $user->password)) {
				$data = [
					'id'             => $user->id,
					'nama'           => $user->nama,
					'id_outlet_user' => $user->id_outlet,
					'username'       => $username,
					'role'           => $user->role
				];

				$this->session->set_userdata($data);

				if ($user->role == 'admin') {
					$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Selamat Datang Admin!</div>');
					redirect('Admin/Home','refresh');
				} else if($user->role == 'kasir'){
					$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Selamat Datang Kasir!</div>');
					redirect('Kasir/Home','refresh');
				}else if($user->role == 'owner'){
					$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Selamat Datang Owner!</div>');
					redirect('Owner/Home','refresh');
				}else{
					$this->session->set_flashdata('message', '<div class="alert bg-danger text-center h3">Tidak ada Bug Untukmu!</div>');
					redirect('Auth/login','refresh');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert bg-danger text-center" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Password Salah!</div>');
				redirect('Auth/login','refresh');
			}
			
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-danger text-center" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Akun Anda tidak terdaftar!</div>');
			redirect('Auth/login','refresh');
		}
	}

	// private function validation()
	// {
	//     $this->form_validation->set_rules('fullname', 'fullname', 'trim|required|min_length[2]');
	// 	$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
	// 	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
	// 	$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]');
	// 	$this->form_validation->set_message('required', 'Form ini wajib diisi!');
	// 	$this->form_validation->set_message('min_length', 'Minimal panjang huruf tidak mencukupi! tambahkan beberapa kata lagi.');
	// }

	// public function register()
	// {
	// 	$this->validation();

	// 	if ($this->form_validation->run() == FALSE) {

	// 	    $this->load->view('register');
	// 	} else {
	// 		$data = [
	// 			// 'fullname'  => $this->input->post('fullname'),
	// 			// 'email'     => $this->input->post('email'),
	// 			// 'no_hp'     => $this->input->post('no_hp'),
	// 			// 'tgl_lahir' => $this->input->post('tgl_lahir'),
	// 			// 'jk'        => $this->input->post('jk'),
	// 			// 'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
	// 			// 'id_level'  => 2,
	// 			// 'photo_user' => NULL,
	// 		];

	// 		// $this->all->menambah($this->table, $data);
	// 		$this->session->set_flashdata('message', '<div class="alert bg-success text-center" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Selamat! Anda Berhasil mendaftar. Silahkan Masuk untuk melanjutkan</div>');

	// 		return redirect('Auth/login','refresh');
	// 	}
	// }

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */