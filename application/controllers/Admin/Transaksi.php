<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		backButtonHandle();
	}

	private $table = 'tb_transaksi';

	public function index()
	{
		$data['tajuk'] = 'Admin - Transaksi';

		$id_user = $this->session->userdata('id');
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();

		// $data['getDataOutlet'] = $this->mod_sb->mengambil($this->table)->result();
		$data['kodeInVoice'] = $this->mod_sb->kodeInVoice($this->table, 'id', 'id');
		$data['id_user'] = $id_user;
		$data['kasir'] = $this->session->userdata('nama')." - ".$this->session->userdata('role');
		$data['getDataPaket'] = $this->mod_sb->mengambil('tb_paket', ['id_outlet'=>$this->session->userdata('id_outlet_user')])->result();
		// var_dump($data['getDataPaket']);
		// die;

		$data['getTemp'] = $this->tm->getTempWithJoin()->result();
		$getTotalSub = $this->tm->getTotalSub()->result();
		foreach ($getTotalSub as $gts) {
			$data['getTotal'] = $gts->sub_total;
			$data['pajak']    = (2.5 / 100 * $gts->sub_total);
			
			$t = $data['getTotal'] + $data['pajak'];
			$t2 = substr($t, -3);
			// if ($t2 < 500) {
			// 	$final = (500 - $t2) + $t;
			// }else{
			// 	$final = $t + (1000 - $t2);
			// }
			$final = $t;
			$data['hargaAfterDiskon'] = $final;
			
		}

		$this->lp->page('universal/transaksi/add_transaksi', $data);
	}

	public function DataTransaksi()
	{
	    $data['tajuk'] = 'Admin - Outlet';

		$id_user = $this->session->userdata('id');
	    $id_outlet = $this->session->userdata('id_outlet_user');
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();

		$data['getDataTransaksi'] = $this->trxm->getData($id_outlet)->result();

		$this->lp->page('universal/transaksi/data_transaksi', $data);
	}

	public function editTransaksi($id)
	{
	    $data['tajuk'] = 'Admin - Transaksi';
		$id_user = $this->session->userdata('id');
		$data['getProfile'] = $this->mod_sb->mengambil('tb_user', ['id'=>$id_user])->row();
		// $data['getDataTransaksi'] = $this->mod_sb->mengambil('tb_transaksi', ['id'=>$id])->row();
	    $id_outlet = $this->session->userdata('id_outlet_user');
		$data['getDataTransaksi'] = $this->trxm->getData2($id)->row();

		// var_dump($data['getDataTransaksi']);
	 //    die;

		$this->lp->page('universal/transaksi/edit_transaksi', $data);
	}

	public function updateTransaksi()
	{
	    $post = $this->input->post();
		
		$id = $post['id'];
		$tgl = $post['tgl'];
		$kode_invoice = $post['kode_invoice'];
		$nama_pelanggan = $post['nama_pelanggan'];
		$totalKeseluruhan = $post['totalKeseluruhan'];
		$dibayar = $post['dibayar'];
		$status = $post['status'];
		$id_outlet = $post['id_outlet'];
		if ($dibayar == 'dibayar') {
			$data = [
				'tgl'              => $tgl,
				'kode_invoice'     => $kode_invoice,
				'nama_pelanggan'   => $nama_pelanggan,
				'totalKeseluruhan' => $totalKeseluruhan,
				'dibayar'          => $dibayar,
				'status'           => $status,
				'id_outlet'        => $id_outlet,
			];
			// var_dump($data);
			// die;
		} else {
			$bayar = $post['bayar'];
			$kembalian = $post['kembalian'];
			if ($bayar != NULL) {
				$data = [
					'tgl'              => $tgl,
					'kode_invoice'     => $kode_invoice,
					'nama_pelanggan'   => $nama_pelanggan,
					'totalKeseluruhan' => $totalKeseluruhan,
					'dibayar'          => 'dibayar',
					'status'           => $status,
					'id_outlet'        => $id_outlet,
					'tunai'            => $bayar,
					'kembalian'        => $kembalian,
				];
			}else{
				$data = [
					'tgl'              => $tgl,
					'kode_invoice'     => $kode_invoice,
					'nama_pelanggan'   => $nama_pelanggan,
					'totalKeseluruhan' => $totalKeseluruhan,
					'dibayar'          => 'belum_diayar',
					'status'           => $status,
					'id_outlet'        => $id_outlet,
					'tunai'            => $bayar,
					'kembalian'        => $kembalian,
				];
			}
		}

		$q = $this->mod_sb->mengubah('tb_transaksi', ['id'=>$id], $data);

		if ($q) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Berhasil Mengubah data transaksi.</div>');
		    redirect('Admin/Transaksi/DataTransaksi','refresh');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Gagal Mengubah data outlet. silahkan cek kembali data yang Anda masukkan!</div>');
		    redirect('Admin/Transaksi/editTransaksi/'.$id,'refresh');
		}
	    // var_dump($data);
	    // die;
	}

	public function getHargaAfterDiskon()
	{
	    $getTotalSub = $this->tm->getTotalSub()->result();
		foreach ($getTotalSub as $gts) {
			$getTotal = $gts->sub_total;
			$pajak    = (2.5 / 100 * $gts->sub_total);
			
			$diskonMentah = $_GET['diskon'];

			if ($diskonMentah != NULL) {
				$total1 = $getTotal + $pajak;
				$diskon = ($diskonMentah / 100 * $total1);
				$final = $total1 - $diskon;
			}else{
				$final = $getTotal + $pajak;
			}

			$array_result[] = $final;
		}
			echo json_encode($array_result);
	}

	// public function getAutoCompletePaket()
	// {
	//     if (isset($_GET['term'])) {
	//     	$result = $this->mod_sb->autocompletepaket($_GET['term'], 'tb_paket', [
	//     		'id_outlet'=> $this->session->userdata('id_outlet'),
	//     	])->result();
	//     	// var_dump($result);
	//     	// die;
	// 	    foreach ($result as $row) {
	// 	    	// $array_result[] = $row->nama_paket." - ".$row->nama_outlet;
	// 	    	$array_result[] = $row->nama_paket;

	// 	    }
	//     	echo json_encode($array_result);
	//     }
	// }

	public function getAutoCompleteMember()
	{
	    if (isset($_GET['term'])) {
	    	$result = $this->mod_sb->autocompletemember($_GET['term'], 'tb_member')->result();
	    	
	    	foreach ($result as $row) {
	    		$array_result[] = array(
					'label'         => $row->id,
					'nama_member'   => $row->nama_member,
					'tlp_member'    => $row->tlp_member,
					'alamat_member' => $row->alamat_member,
	    		);
	    		// $array_result[] = $row->id;
	    		// $array_result[] = $row->nama_member;
	    		// foreach ($array_result as $rest) {
	    		// 	$tes[] = $rest;
	    		// }
	    	}
			    echo json_encode($array_result);
	    	// var_dump($array_result);
	    	// die;
	    }
	}

	public function tambah_tempData()
	{
	    $post = $this->input->post();

	    $nama_paket = $post['nama_paket'];
	    $qty = $post['qty'];
	    $keterangan = $post['keterangan'];

	    $getPaket = $this->mod_sb->mengambil('tb_paket', ['nama_paket'=>$nama_paket])->row();
	    //final
	    $id_paket = $getPaket->id;
	    $subTotal = $getPaket->harga * $qty;


	    $data = [
			'id_paket'   => $id_paket,
			'qty'        => $qty,
			'sub_total'  => $subTotal,
			'keterangan' => $keterangan,
	    ];

	    $q = $this->mod_sb->menambah('temp_detail_transaksi', $data);

		if ($q) {
			// $this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Berhasil menambah data outlet.</div>');
		    redirect('Admin/Transaksi/Index','refresh');
		} else {
			// $this->session->set_flashdata('message', '<div class="alert alert-success text-center h3">Gagal menambah data outlet. silahkan cek kembali data yang Anda masukkan!</div>');
		    redirect('Admin/Transaksi/Index','refresh');
		}
	    // var_dump($data);
	    // die;
	}

	public function bayar()
	{
		$post = $this->input->post();

	    $id_user = $post['id_user'];
	    $id_member = $post['id_member'];
	    $id_outlet = $this->session->userdata('id_outlet_user');
	    $id_transaksi = $this->mod_sb->getIdTransaksi('tb_transaksi', 'id', 'id');

	    if ($id_member != null) {
	    	$dataTransaksi = [
				'id'               => $id_transaksi,
				'id_member'        => $id_member,
				'id_outlet'        => $id_outlet,
				'nama_pelanggan'   => $post['nama_member'],
				'tlp_pelanggan'    => $post['tlp_member'],
				'alamat_pelanggan' => $post['alamat_member'],
				'kode_invoice'     => $post['kode_invoice'],
				'tgl'              => date("Y-m-d H:i:s"),
				'batas_waktu'      => $post['batas_waktu'],
				'tgl_bayar'        => date("Y-m-d H:i:s"),
				'biaya_tambahan'   => $post['biaya_tambahan'],
				'keterangan'       => $post['keterangan_tambahan'],
				'diskon'           => $post['diskon'],
				'pajak'            => $post['pajak'],
				'totalKeseluruhan' => $post['totalKeseluruhan'],
				'tunai'            => $post['bayar'],
				'kembalian'        => $post['kembalian'],
				'status'           => 1,
				'dibayar'          => 1,
				'id_user'          => $id_user,
	    	];
	    	//query
	    	$this->mod_sb->menambah('tb_transaksi', $dataTransaksi);
	    	//end query
	    	$getTemp = $this->tm->getTempWithJoin()->result();
	    	foreach ($getTemp as $gt) {
				$id_paket            = $gt->id_paket;
				$qty                 = $gt->qty;
				$sub_total           = $gt->sub_total;
				$keterangan          = $gt->keterangan;
				
				$dataDetailTransaksi = [];
				$index               = 0;

				array_push($dataDetailTransaksi, [
					'id_transaksi' => $id_transaksi,
					'id_paket'     => $id_paket,
					'qty'          => $qty,
					'sub_total'    => $sub_total,
					'keterangan'   => $keterangan
				]);
				$index++;
				//query
		    	// var_dump($dataDetailTransaksi);
		    	// die;
				$this->db->insert_batch('tb_detail_transaksi', $dataDetailTransaksi);
	    		//end query
	    	}
	    	//hapus data sementara
	    	$this->db->empty_table('temp_detail_transaksi');
				    	
			echo json_encode(array('status'=>TRUE));
	    	// $this->session->set_flashdata('message', '<div class="alert alert-success">Transaksi Berhasil!</div>');
		    // redirect(site_url('Admin/Transaksi'),'refresh');
	    }else{
	    	$dataTransaksi = [
				'id'               => $id_transaksi,
				'id_member'        => 1,
				'id_outlet'        => $id_outlet,
				'nama_pelanggan'   => $post['nama_nonmember'],
				'tlp_pelanggan'    => $post['tlp_nonmember'],
				'alamat_pelanggan' => $post['alamat_nonmember'],
				'kode_invoice'     => $post['kode_invoice'],
				'tgl'              => date("Y-m-d H:i:s"),
				'batas_waktu'      => $post['batas_waktu'],
				'tgl_bayar'        => date("Y-m-d H:i:s"),
				'biaya_tambahan'   => $post['biaya_tambahan'],
				'keterangan'       => $post['keterangan_tambahan'],
				'diskon'           => $post['diskon'],
				'pajak'            => $post['pajak'],
				'totalKeseluruhan' => $post['totalKeseluruhan'],
				'tunai'            => $post['bayar'],
				'kembalian'        => $post['kembalian'],
				'status'           => 1,
				'dibayar'          => 1,
				'id_user'          => $id_user,
	    	];
	    	//query
	    	$this->mod_sb->menambah('tb_transaksi', $dataTransaksi);
	    	//end query
	    	$getTemp = $this->tm->getTempWithJoin()->result();
	    	foreach ($getTemp as $gt) {
				$id_paket            = $gt->id_paket;
				$qty                 = $gt->qty;
				$sub_total           = $gt->sub_total;
				$keterangan          = $gt->keterangan;
				
				$dataDetailTransaksi = [];
				$index               = 0;

				array_push($dataDetailTransaksi, [
					'id_transaksi' => $id_transaksi,
					'id_paket'     => $id_paket,
					'qty'          => $qty,
					'sub_total'    => $sub_total,
					'keterangan'   => $keterangan
				]);
				$index++;
				//query
				$this->db->insert_batch('tb_detail_transaksi', $dataDetailTransaksi);
	    		//end query
	    	}
	    	//hapus data sementara
	    	$this->db->empty_table('temp_detail_transaksi');
				    	
			echo json_encode(array('status'=>TRUE));
	    	// $this->session->set_flashdata('message', '<div class="alert alert-success">Transaksi Berhasil!</div>');
		    // redirect(site_url('Admin/Transaksi'),'refresh');
	    }

	}

	public function bayarNanti()
	{
		$post = $this->input->post();

	    $id_user = $post['id_user'];
	    $id_member = $post['id_member'];
	    $id_outlet = $this->session->userdata('id_outlet_user');
	    $id_transaksi = $this->mod_sb->getIdTransaksi('tb_transaksi', 'id', 'id');

	    if ($id_member != null) {
	    	$dataTransaksi = [
				'id'               => $id_transaksi,
				'id_member'        => $id_member,
				'id_outlet'        => $id_outlet,
				'nama_pelanggan'   => $post['nama_member'],
				'tlp_pelanggan'    => $post['tlp_member'],
				'alamat_pelanggan' => $post['alamat_member'],
				'kode_invoice'     => $post['kode_invoice'],
				'tgl'              => date("Y-m-d H:i:s"),
				'batas_waktu'      => $post['batas_waktu']." ".date("H:i:s"),
				// 'tgl_bayar'        => date("Y-m-d"),
				'biaya_tambahan'   => $post['biaya_tambahan'],
				'keterangan'       => $post['keterangan_tambahan'],
				'diskon'           => $post['diskon'],
				'pajak'            => $post['pajak'],
				'totalKeseluruhan' => $post['totalKeseluruhan'],
				'status'           => 1,
				'dibayar'          => 2,
				'id_user'          => $id_user,
	    	];
	    	//query
	    	$this->mod_sb->menambah('tb_transaksi', $dataTransaksi);
	    	//end query
	    	$getTemp = $this->tm->getTempWithJoin()->result();
	    	foreach ($getTemp as $gt) {
				$id_paket            = $gt->id_paket;
				$qty                 = $gt->qty;
				$sub_total           = $gt->sub_total;
				$keterangan          = $gt->keterangan;
				
				$dataDetailTransaksi = [];
				$index               = 0;

				array_push($dataDetailTransaksi, [
					'id_transaksi' => $id_transaksi,
					'id_paket'     => $id_paket,
					'qty'          => $qty,
					'sub_total'    => $sub_total,
					'keterangan'   => $keterangan
				]);
				$index++;
				//query
		    	// var_dump($dataDetailTransaksi);
		    	// die;
				$this->db->insert_batch('tb_detail_transaksi', $dataDetailTransaksi);
	    		//end query
	    	}
	    	//hapus data sementara
	    	$this->db->empty_table('temp_detail_transaksi');
				    	
			echo json_encode(array('status'=>TRUE));
	    	// $this->session->set_flashdata('message', '<div class="alert alert-success">Transaksi Berhasil!</div>');
		    // redirect(site_url('Admin/Transaksi'),'refresh');
	    }else{
	    	$dataTransaksi = [
				'id'               => $id_transaksi,
				'id_member'        => 1,
				'id_outlet'        => $id_outlet,
				'nama_pelanggan'   => $post['nama_nonmember'],
				'tlp_pelanggan'    => $post['tlp_nonmember'],
				'alamat_pelanggan' => $post['alamat_nonmember'],
				'kode_invoice'     => $post['kode_invoice'],
				'tgl'              => date("Y-m-d H:i:s"),
				'batas_waktu'      => $post['batas_waktu']." ".date("H:i:s"),
				// 'tgl_bayar'        => date("Y-m-d"),
				'biaya_tambahan'   => $post['biaya_tambahan'],
				'keterangan'       => $post['keterangan_tambahan'],
				'diskon'           => $post['diskon'],
				'pajak'            => $post['pajak'],
				'totalKeseluruhan' => $post['totalKeseluruhan'],
				'status'           => 1,
				'dibayar'          => 2,
				'id_user'          => $id_user,
			];
	    	//query
	    	$this->mod_sb->menambah('tb_transaksi', $dataTransaksi);
	    	//end query
	    	$getTemp = $this->tm->getTempWithJoin()->result();
	    	foreach ($getTemp as $gt) {
				$id_paket            = $gt->id_paket;
				$qty                 = $gt->qty;
				$sub_total           = $gt->sub_total;
				$keterangan          = $gt->keterangan;
				
				$dataDetailTransaksi = [];
				$index               = 0;

				array_push($dataDetailTransaksi, [
					'id_transaksi' => $id_transaksi,
					'id_paket'     => $id_paket,
					'qty'          => $qty,
					'sub_total'    => $sub_total,
					'keterangan'   => $keterangan
				]);
				$index++;
				//query
				$this->db->insert_batch('tb_detail_transaksi', $dataDetailTransaksi);
	    		//end query
	    	}
	    	//hapus data sementara
	    	$this->db->empty_table('temp_detail_transaksi');
				    	
			echo json_encode(array('status'=>TRUE));
	    	// $this->session->set_flashdata('message', '<div class="alert alert-success">Transaksi Berhasil!</div>');
		    // redirect(site_url('Admin/Transaksi'),'refresh');
	    }

	}

	public function hapus_tempData($id)
	{
	    $data = [
	    	'id' => $id
	    ];

		$this->mod_sb->menghapus('temp_detail_transaksi', $data);
	    // $this->session->set_flashdata('message', '<div class="alert alert-danger text-center h3">Berhasil Menghapus outlet.</div>');
		redirect('Admin/Transaksi/Index','refresh');
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Admin/Transaksi.php */