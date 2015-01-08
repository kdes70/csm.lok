<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Callback extends Admin_Controller{

	public function __construct()
	{
		parent::__construct();
		// Модель обратного звонка
		$this->load->model('callback_model');
		// Модель страниц
		$this->load->model('page_model');
		// Модель вакансий
		$this->load->model('vacansy_model');
		// Хелпер 
		$this->load->helper('csm_helper');
		// Модель резюме 
		$this->load->model('resume_model');
		$this->data['new_resume'] = $this->resume_model->get_count_by(array('read'=>'0', 'public'=>'1'));
		// Модель категории
		$this->load->model('category_model');
		$this->data['category'] = $this->category_model->get();
		// Количество записей в каждой категории
		foreach ($this->data['category'] as $key =>$value) 
		{
			$this->data['category'][$key] = $value;
			$this->data['category'][$key]->count = $this->vacansy_model->count_vacansy_by_category($value->id);
		}
		// Модель городов
		$this->load->model('city_model');
		$this->data['city'] = $this->city_model->get();
		//DEbug
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{	
		$this->data['page_title'] = 'Заявки на звонок';
		$this->data['callback'] = $this->callback_model->get_by(array('public' => '1'));
		//$this->data['page'] = $this->page_model->get_by(array('url' => 'vacansy'), TRUE);
		
		$view = 'callback_table';
		$this->display_lib->view_admin_page($view, $this->data);

	}


}

/* End of file user.php */
/* Location: ./application/controllers/user.php */