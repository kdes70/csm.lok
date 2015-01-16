<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Frontend_Controller{

	
	public function index()
	{
		$this->load->view('welcome_message');

		//echo phpinfo();
	}

	public function registration()
	{
		
	}



	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */