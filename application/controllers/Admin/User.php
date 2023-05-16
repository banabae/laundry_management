<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		backButtonHandle();
	}

	// private $table = 'tb_user';

	public function index()
	{
		$data['tajuk'] = 'Admin - User';

		$id_user = $this->session->userdata('id');
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();

		// $data['getDataUserDetail'] = $this->um->getUser(['tb_user.id'=>$id])->row();
		$data['getDataUser'] = $this->um->getUser()->result();

		$this->lp->page('admin/user/view_user', $data);
	}

	public function add_user()
	{
		$data['tajuk'] = 'Admin - Add User';
		$id_user = $this->session->userdata('id');
		$data['getDataOutlet'] = $this->mod_sb->mengambil('tb_outlet')->result();
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();

		$this->lp->page('admin/user/add_user', $data);   
	}

	public function edit_user($id)
	{
		$data['tajuk'] = 'Admin - Edit User';

		$id_user = $this->session->userdata('id');
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();
		$data['getDataUser'] = $this->um->getUser(['tb_user.id'=>$id])->row();
		$data['getDataOutlet'] = $this->mod_sb->mengambil('tb_outlet')->result();

		//get tgl-blm-tahun
		$data['tgl']   = substr($data['getProfile']->tgl_lahir, -2);
		$data['bulan'] = substr($data['getProfile']->tgl_lahir, 5, 2);
		$data['tahun'] = substr($data['getProfile']->tgl_lahir, 0, 4);
		// end
		
		// var_dump($data['getDatauser']);
	    // die;

		$this->lp->page('admin/user/edit_user', $data);   
	}

	public function detail_user($id)
	{
		$data['tajuk'] = 'Admin - Edit User';

		$id_user = $this->session->userdata('id');
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();
		$data['getDataUser'] = $this->um->getUser(['tb_user.id'=>$id])->row();
		$data['getDataOutlet'] = $this->mod_sb->mengambil('tb_outlet')->result();
		
		// var_dump($data['getDatauser']);
	    // die;

		$this->lp->page('admin/user/detail_user', $data);   
	}

	//query
	public function mencari_user()
	{
	    $data['tajuk'] = 'Admin - User';
		$id_user = $this->session->userdata('id');
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();

		$keyword = $this->input->post('keyword');

		$data['getDataUser'] = $this->um->getUser(NULL, [
			'tb_user.nama'          => $keyword,
			'tb_user.role'          => $keyword,
			'tb_user.tlp'           => $keyword,
			'tb_outlet.nama_outlet' => $keyword,
		])->result();

		// var_dump($data['getDataUser']);
		// var_dump($keyword);
		// die;

		// $data['getDatauser'] = $this->mod_sb->mengambil('tb_user')->result();

		$this->lp->page('admin/user/view_user', $data);
	}
	
	// //query
	public function tambah_user()
	{
	    $post = $this->input->post();

	    //get tgl lahir
	    $tgl = $post['tgl'];
	    $bln = $post['bln'];
	    $thn = $post['thn'];
	    // $p = $post['photo_profile'];

	    $tgl_lahir = $thn."-".$bln."-".$tgl;

	    $config['upload_path']   = './uploads/img/profile/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
		$config['max_size']      = 0;
		$config['max_width']     = 0;
		$config['max_height']    = 0;
		$config['file_name']    = date("ymd")."_".$post['username']."profile";
	    
	    $this->load->library('upload', $config);
	    
	    if ( ! $this->upload->do_upload('photo_profile')){
            $data = [
		    	// 'id' => $this->mod_sb->getId('tb_user', 'id', 'id'),
				'nama'          => $post['nama'],
				'username'      => $post['username'],
				'email'         => $post['email'],
				'tlp'           => $post['tlp'],
				'tgl_lahir'     => $tgl_lahir,
				'jenis_kelamin' => $post['jk'],
				'role'          => $post['jabatan'],
				'id_outlet'     => $post['id_outlet'],
				'password'      => password_hash(($post['password']), PASSWORD_DEFAULT),
		    ];

	        // var_dump($data);
	        // die;

	        $query = $this->mod_sb->menambah('tb_user', $data);
	        if($query){
				$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Berhasil Menambah Pegawai.</div>');
	            redirect('Admin/User','refresh');
	        }else{
				$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Gagal Menambah Pegawai.</div>');
	            redirect('Admin/User/add_user','refresh');
	        }
	    }
	    else{
	    	$_data = array('upload_data' => $this->upload->data());
	        $data = [
		    	// 'id' => $this->mod_sb->getId('tb_user', 'id', 'id'),
				'nama'          => $post['nama'],
				'username'      => $post['username'],
				'email'         => $post['email'],
				'tlp'           => $post['tlp'],
				'tgl_lahir'     => $tgl_lahir,
				'jenis_kelamin' => $post['jk'],
				'role'          => $post['jabatan'],
				'id_outlet'     => $post['id_outlet'],
				'photo_profile' => $_data['upload_data']['file_name'],
				'password'      => password_hash(($post['password']), PASSWORD_DEFAULT),
		    ];

	        // var_dump($data);
	        // die;

	        $query = $this->mod_sb->menambah('tb_user', $data);
	        if($query){
				$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Berhasil Menambah Pegawai.</div>');
	            redirect('Admin/User','refresh');
	        }else{
				$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Gagal Menambah Pegawai.</div>');
	            redirect('Admin/User/add_user','refresh');
	        }
	    }

	}

	// //query
	public function ubah_user()
	{
	    $post = $this->input->post();
		$id_user = $post['id_user'];
		//get tgl lahir
	    $tgl = $post['tgl'];
	    $bln = $post['bln'];
	    $thn = $post['thn'];
	    // $p = $post['photo_profile'];

	    $tgl_lahir = $thn."-".$bln."-".$tgl;

		$config['upload_path']   = './uploads/img/profile/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
		$config['max_size']      = 0;
		$config['max_width']     = 0;
		$config['max_height']    = 0;
		$config['overwrite']     = TRUE;
		$config['file_name']     = date("ymd")."_".$post['username']."profile";
	    
	    $this->load->library('upload', $config);
	    
	    if ( ! $this->upload->do_upload('photo_profile')){
            $data = [
		    	// 'id' => $this->mod_sb->getId('tb_user', 'id', 'id'),
				'nama'          => $post['nama'],
				'username'      => $post['username'],
				'email'         => $post['email'],
				'tlp'           => $post['tlp'],
				'tgl_lahir'     => $tgl_lahir,
				'jenis_kelamin' => $post['jk'],
				'role'          => $post['jabatan'],
				'id_outlet'     => $post['id_outlet'],
		    ];

	        // var_dump($data);
	        // die;

	        $query = $this->mod_sb->mengubah('tb_user', ['id'=>$id_user], $data);
	        if($query){
				$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Berhasil Mengubah Data Pegawai.</div>');
	            redirect('Admin/User','refresh');
	        }else{
				$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Gagal Mengubah Data Pegawai.</div>');
	            redirect('Admin/User/add_user','refresh');
	        }
	    }
	    else{
	    	$_data = array('upload_data' => $this->upload->data());
	        $data = [
		    	// 'id' => $this->mod_sb->getId('tb_user', 'id', 'id'),
				'nama'          => $post['nama'],
				'username'      => $post['username'],
				'email'         => $post['email'],
				'tlp'           => $post['tlp'],
				'tgl_lahir'     => $tgl_lahir,
				'jenis_kelamin' => $post['jk'],
				'role'          => $post['jabatan'],
				'id_outlet'     => $post['id_outlet'],
				'photo_profile' => $_data['upload_data']['file_name'],
		    ];

	        // var_dump($data);
	        // die;

	        $query = $this->mod_sb->mengubah('tb_user', ['id'=>$id_user], $data);
	        if($query){
				$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Berhasil Mengubah Data Pegawai.</div>');
	            redirect('Admin/User','refresh');
	        }else{
				$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Gagal Mengubah Data Pegawai.</div>');
	            redirect('Admin/User/add_user','refresh');
	        }
	    }
	}

	//query
	public function hapus_user($id)
	{
		$data = [
			'id' => $id
		];

		$query = $this->mod_sb->mengambil('tb_user', ['id'=>$id])->row();

		// var_dump($query->photo_profile);
		// die;
		if ($query) {
			$tes = unlink('uploads/img/profile/'.$query->photo_profile);
			
		}

		$this->mod_sb->menghapus('tb_user', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Berhasil Menghapus data user.</div>');
		redirect('Admin/User','refresh');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/Admin/User.php */