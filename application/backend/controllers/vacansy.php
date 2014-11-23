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
	{	//Вакансии
		$this->load->model('vacansy_model');
		$this->data['vacansy'] = $this->vacansy_model->get();
		//Категории
		$this->load->model('category_model');
		$this->data['category'] = $this->category_model->get();

		$this->output->enable_profiler(TRUE);
        $this->display_lib->view_page('vacansy', $this->data);
		//var_dump($data);
	}

	public function cat($id_cat)
	{	

		//Категории
		$this->load->model('category_model');
		$this->data['category'] = $this->category_model->get();

		$this->output->enable_profiler(TRUE);
        $this->display_lib->view_page('vacansy', $this->data);
	}


}

/* End of file page.php */
/* Location: ./application/controllers/page.php */