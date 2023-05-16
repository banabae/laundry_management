<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_page
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function page($content = NULL, $data = NULL)
	{
	    $datas = [
	    	'topbar' => $this->ci->load->view('components/topbar', $data, true),
	    	'sidebar' => $this->ci->load->view('components/sidebar', $data, true),
	    	'content' => $this->ci->load->view(''.$content, $data, true),
	    ];
	    return $this->ci->load->view('index', $datas);
	}

}

/* End of file Lib_page.php */
/* Location: ./application/libraries/Lib_page.php */
