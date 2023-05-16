<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// is_logged_in();
		backButtonHandle();
	}

	public function index()
	{
		$data['tajuk'] = 'Admin - Profile';

		$id_user = $this->session->userdata('id');
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();

		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();
		$data['getTanggalLahir'] = $this->lps->getTanggalLahir($data['getProfile']->tgl_lahir);
		$data['getNoHp'] = $this->lps->getNoHp($data['getProfile']->tlp);
		$data['getOutlet'] = $this->mod_sb->mengambil('tb_outlet', ['id'=>$data['getProfile']->id_outlet])->row();
		// var_dump($ip = $this->input->ip_address());
		// die;
		
	    $this->lp->page('universal/user', $data);
	}

	public function editProfile($id_user)
	{
	    $data['tajuk'] = 'Admin - Edit Profile';
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();

		//get tgl-blm-tahun
		$data['tgl']   = substr($data['getProfile']->tgl_lahir, -2);
		$data['bulan'] = substr($data['getProfile']->tgl_lahir, 5, 2);
		$data['tahun'] = substr($data['getProfile']->tgl_lahir, 0, 4);
		// end
		

		
	    $this->lp->page('universal/profile/edit_profile', $data);
	}

	public function editPassword($id_user)
	{
	    $data['tajuk'] = 'Admin - Edit Password';
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();
	
	    $this->lp->page('universal/profile/edit_password', $data);
	}

	//query
	public function ubah_profile()
	{
	    $post = $this->input->post();

	    //get tgl lahir
	    $tgl = $post['tgl'];
	    $bln = $post['bln'];
	    $thn = $post['thn'];
	    // $p = $post['photo_profile'];

	    $tgl_lahir = $thn."-".$bln."-".$tgl;
	    //end

	    $id_user = $post['id_user'];

		$config['upload_path']   = './uploads/img/profile/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
		$config['max_size']      = 0;
		$config['max_width']     = 0;
		$config['max_height']    = 0;
		$config['overwrite']     = TRUE;
	    
	    $this->load->library('upload', $config);
	    
	    if ( ! $this->upload->do_upload('photo_profile')){
	        $data = array(
					'nama'          => $post['nama'],
					'username'      => $post['username'],
					'email'         => $post['email'],
					'tlp'           => $post['tlp'],
					'tgl_lahir'     => $tgl_lahir,
					'jenis_kelamin' => $post['jenis_kelamin'],
					'role'          => $post['role'],
					// 'photo_profile' => $post['photo_profile']
	            );

	        // var_dump($data);
	        // die;

	        $query = $this->mod_sb->mengubah('tb_user', ['id'=>$id_user], $data);
	        if($query){
	            echo 'berhasil di upload';
	            redirect('Profile','refresh');
	        }else{
	            echo 'gagal upload';
	        }
	    }
	    else{
	    	$_data = array('upload_data' => $this->upload->data());
	        $data = array(
					'nama'          => $post['nama'],
					'username'      => $post['username'],
					'email'         => $post['email'],
					'tlp'           => $post['tlp'],
					'tgl_lahir'     => $tgl_lahir,
					'jenis_kelamin' => $post['jenis_kelamin'],
					'role'          => $post['role'],
					'photo_profile' => $_data['upload_data']['file_name']
	            );

	        // var_dump($data);
	        // die;

	        $query = $this->mod_sb->mengubah('tb_user', ['id'=>$id_user], $data);
	        if($query){
	            echo 'berhasil di upload';
	            redirect('Profile','refresh');
	        }else{
	            echo 'gagal upload';
	        }
	    }
	}

	// query
	public function ubahPassword()
	{
	    $post = $this->input->post();
	    
	    $id_user = $post['id_user'];
	    $op = $post['old_password'];
	    $np = $post['new_password'];
	    $rnp = $post['retype_new_password'];
	    
		$getProfile = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();

		if (password_verify($op, $getProfile->password)) {
			if ($np != $rnp) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Password baru dan ulangi password tidak sama!</div>');
				redirect('Profile/editPassword/'.$id_user, 'refresh');
			} else {
				$data = [
					'password' => password_hash($np, PASSWORD_DEFAULT),
				];

		        $query = $this->mod_sb->mengubah('tb_user', ['id'=>$id_user], $data);

				if ($query) {
					$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Ubah Password Berhasil!</div>');
					redirect('Profile/editPassword/'.$id_user, 'refresh');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Ubah Password Gagal!</div>');
					redirect('Profile/editPassword/'.$id_user, 'refresh');
				}
				
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Password Lama Salah. silahkan ulangi kembali!</div>');
			redirect('Profile/editPassword/'.$id_user, 'refresh');
		}
		


	    // var_dump($op .= $np .= $rnp);
	    // die;
	}
}

/* End of file Profile.php */
/* Location: ./application/controllers/Admin/Profile.php */