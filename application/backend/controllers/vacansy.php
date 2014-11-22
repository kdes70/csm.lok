<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vacansy extends Frontend_Controller{

	public function __construct()
	{
		parent::__construct();
		//Модель page
		$this->load->model('page_model');

	}

/**
 * [index description]
 * @return [type] [description]
 */
	public function index()
	{	

        $this->display_lib->view_developer_page();
		//var_dump($data);
	}


}

/* End of file page.php */
/* Location: ./application/controllers/page.php */