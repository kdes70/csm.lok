<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testing extends Admin_Controller{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('testing_model');

		$this->load->model('resume_model');

		$this->load->model('page_model');

		$this->load->model('vacansy_model');
		$this->load->helper('csm_helper');

		$this->data['new_resume'] = $this->resume_model->get_count_by(array('read'=>'0', 'public'=>'1'));

		//Категории
		$this->load->model('category_model');
		$this->data['category'] = $this->category_model->get();

		foreach ($this->data['category'] as $key =>$value) 
		{
			$this->data['category'][$key] = $value;
			$this->data['category'][$key]->count = $this->vacansy_model->count_vacansy_by_category($value->id);
		}

		//DEbug
		$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		// Получаем массив сортированный по родительскому элементу
        $this->data['tree'] = $this->testing_model->tree_array();
		//Получаем дерево категорий
        $this->data['tests'] = $this->testing_model->create_tree($this->data['tree'], 0, TRUE);

       

		$view = 'testing/testing';
		$this->display_lib->view_admin_page($view, $this->data);

	}

	public function edit($id_test)
	{
		

		$view = 'testing/testing_form';
		$this->display_lib->view_admin_page($view, $this->data);

	}

	
	
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */