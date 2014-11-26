<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vacansy extends Frontend_Controller{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('vacansy_model');
		//Категории
		$this->load->model('category_model');
		$this->data['category'] = $this->category_model->get();

		foreach ($this->data['category'] as $key =>$value) 
		{

			$this->data['category'][$key] = $value;
			$this->data['category'][$key]->count = $this->vacansy_model->count_vacansy_by_category($value->id);

		}
		
		$this->load->model('page_model');
		$this->data['page'] = $this->page_model->get_by(array('url' => 'vacansy'), TRUE);
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
	{	//Вакансии
		
		

		$this->data['vacansy'] = $this->vacansy_model->get_vacansy();
		//print_r($this->data['vacansy']);
		//$this->output->enable_profiler(TRUE);
        $this->display_lib->view_page('vacansy', $this->data);
		//var_dump($data);
	}

	public function cat($id_cat)
	{	
		$this->data['vacansy'] = $this->vacansy_model->get_vacansy_by(array('id_cat' => $id_cat));

        $this->display_lib->view_page('vacansy', $this->data);
	}

	public function city($id_city)
	{
		//Вакансии по городам
		
		$this->data['vacansy'] = $this->vacansy_model->get_by(array('city' => $id_city));

		 $this->display_lib->view_page('vacansy', $this->data);
	}

	
}

/* End of file page.php */
/* Location: ./application/controllers/page.php */