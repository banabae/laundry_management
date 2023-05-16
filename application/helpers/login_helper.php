<?php
function is_logged_in()
{
	$ci =& get_instance();

	if (!$ci->session->all_userdata()) {
		redirect(site_url('Auth/login'),'refresh');
	} else {
		// $is_active = $ci->session->userdata('is_active');
		$role = $ci->session->userdata('role');

		$menu = $ci->uri->segment(1);

		// if ($is_active != 1) {
		if ($role == 'admin') {
			if ($menu != 'Admin') {
				$ci->session->set_flashdata('message', '<div class="alert alert-danger text-center h3">Maaf Akun Anda hanya digunakan untuk Halaman Admin!</div>');
				redirect('Admin/Home','refresh');
			}
		} else if($role == 'kasir'){
			if ($menu != 'Kasir') {
				$ci->session->set_flashdata('message', '<div class="alert alert-danger text-center h3">Maaf Akun Anda hanya digunakan untuk Halaman Kasir!</div>');
				redirect('Kasir/Home','refresh');
			}
		} else if($role == 'owner'){
			if ($menu != 'Owner') {
				$ci->session->set_flashdata('message', '<div class="alert alert-danger text-center h3">Maaf Akun Anda hanya digunakan untuk Halaman Owner!</div>');
				redirect('Owner/Home','refresh');
			}
		}else{
			redirect('Auth','refresh');
		}
		
		
	}
	
	
}

function is_session_in()
{
	$ci =& get_instance();

	if (!$ci->session->all_userdata()) {
		redirect(site_url('Auth/login'),'refresh');
	} else {
		// $is_active = $ci->session->userdata('is_active');
		$role = $ci->session->userdata('role');

		$menu = $ci->uri->segment(1);

		// if ($is_active != 1) {
		if ($role == 'admin') {
			if ($menu != 'Admin') {
				redirect('Admin/Home','refresh');
			}
		} else if($role == 'kasir'){
			if ($menu != 'Kasir') {
				redirect('Kasir/Home','refresh');
			}
		} else if($role == 'owner'){
			if ($menu != 'Owner') {
				redirect('Owner/Home','refresh');
			}
		}
		
	}
	
	
}

// function universal_session()
// {
// 	$ci =& get_instance();

// 	if (!$ci->session->all_userdata()) {
// 		redirect(site_url('Auth/login'),'refresh');
// 	} else {
// 		// $is_active = $ci->session->userdata('is_active');
// 		$role = $ci->session->userdata('role');

// 		$menu = $ci->uri->segment(1);
// 		$menu2 = $ci->uri->segment(2);

// 		// if ($is_active != 1) {
// 		if ($menu == "Universal") {
// 			if ($role == 'owner') {
// 				$ci->session->set_flashdata('message', '<div class="alert alert-danger text-center h3">Maaf Anda tidak bisa mengakses Halaman ini!</div>');
// 				redirect('Owner/Home','refresh');
// 			} else {
// 				if ($menu2 == 'Member') {
// 					redirect('Universal/Member','refresh');
// 				}else{
// 					redirect('Universal/Transaksi','refresh');
// 				}
// 			}
// 		}else{
// 			$ci->session->set_flashdata('message', '<div class="alert alert-danger text-center h3">Maaf Anda tidak bisa mengakses Halaman ini!</div>');
// 			redirect('Owner/Home','refresh');
// 		}
		
// 	}
	
	
// }

function backButtonHandle(){
	$ci =& get_instance();

	// $ci->load->library(array('output'));
	$ci->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
	$ci->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
	$ci->output->set_header('Pragma: no-cache');
	$ci->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
}