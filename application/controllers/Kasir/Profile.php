<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		backButtonHandle();
	}

	public function index()
	{
		$data['tajuk'] = 'Kasir - User';

		$id_user = $this->session->userdata('id');
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();

		$id_outlet = $data['getProfile']->id_outlet;
		$data['getCabangOutlet'] = $this->mod_sb->mengambil('tb_outlet', ['id'=>$id_outlet])->row();
		$data['getTanggalLahir'] = $this->lps->getTanggalLahir($data['getProfile']->tgl_lahir);
		$data['getNoHp'] = $this->lps->getNoHp($data['getProfile']->tlp);
		// var_dump($ip = $this->input->ip_address());
		// die;
		// var_dump($data['getOutlet']);
		// die;
		
	    $this->lp->page('universal/user', $data);
	}

	public function editProfile()
	{
	    $data['tajuk'] = 'Kasir - Edit Profile';
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();
		
	    $this->lp->page('universal/profile/edit_profile', $data);
	}
}

/* End of file Profile.php */
/* Location: ./application/controllers/Kasir/Profile.php */