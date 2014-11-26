<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resume extends Frontend_Controller{

	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function bid_by()
	{
		$this->display_lib->view_page('modal', $this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */