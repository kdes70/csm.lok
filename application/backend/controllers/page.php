<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends Frontend_Controller{

	public function __construct()
	{
		parent::__construct();
		//Модель page
		$this->load->model('page_model');
		//Модель вакансии
		$this->load->model('vacansy_model');

		$this->load->helper('csm_helper');
		//Категории
		$this->load->model('category_model');
		$this->data['category'] = $this->category_model->get();

		$this->load->model('resume_model');
		$this->data['new_resume'] = $this->resume_model->get_count_by(array('read'=>'0', 'public'=>'1'));

		foreach ($this->data['category'] as $key =>$value) 
		{

			$this->data['category'][$key] = $value;
			$this->data['category'][$key]->count = $this->vacansy_model->count_vacansy_by_category($value->id);

		}
		
		//$this->load->model('page_model');
		//$this->data['page'] = $this->page_model->get_by(array('url' => 'vacansy'), TRUE);
		//DEbug
		//$this->output->enable_profiler(TRUE);
		// Список городов
		$this->load->model('city_model');
		$this->data['city'] = $this->city_model->get_by(array('public' => '1'));
	}

/**
 * [index description]
 * @return [type] [description]
 */
	public function index()
	{	
		
		//$data['page_manu'] = $this->page_model->get_by(array('section' => 'top'));

		//var_dump($data);
	}
/**
 * [show description]
 * @param  [type] $id_page [description]
 * @return [type]          [description]
 */
	public function show($id_page)
	{
		$data = array();

		$this->data['page_info'] = $this->page_model->get($id_page);

		switch ($id_page) {

			
			case 'info':
				//Подключаем виды для страницы информации
				$this->data['subview'] = 'page/post_row';
				$this->display_lib->view_page('page/info', $this->data);
				break;
			case 'registration':
			
				break;
			
			default:
				// Значения по умолчанию
				break;
		}
	}


}

/* End of file page.php */
/* Location: ./application/controllers/page.php */