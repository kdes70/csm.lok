<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testing extends Admin_Controller{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('admin_testing_model');

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
        $this->data['tree'] = $this->admin_testing_model->tree_array_adm();
		//Получаем дерево категорий
        $this->data['tests'] = $this->admin_testing_model->create_tree($this->data['tree'], 0, TRUE);


		$view = 'testing/testing';
		$this->display_lib->view_admin_page($view, $this->data);

	}

	public function edit($id)
	{	
		//Получаем список всех тестов для категории
		$this->data['cat_test'] = $this->admin_testing_model->all_testing();

		$this->data['arr'] = $this->admin_testing_model->tree_array_adm();

		$this->data['cat'] = $this->admin_testing_model->select_array_tree($this->data['arr'], 0);

		  //Получение массив данных теста
            $this->data['test_data'] = $this->admin_testing_model->test_data_array($id, TRUE);
           // dump($this->data['test_data']);


		if ($id) {
			$this->data['test_name'] = $this->admin_testing_model->get($id, 'test');
			count($this->data['test_name']) || $this->data['errors'][] = 'test could not be found';
		}
		if($this->input->post('submit'))
		{
				// Set up the form
			$rules = $this->admin_testing_model->rules;
			$this->form_validation->set_rules($rules);

			// Process the form
			if ($this->form_validation->run() == TRUE) {
				$data = $this->admin_testing_model->array_from_post(array(
					'test_name',
					'parent_id'
				));
				
				$id_test = $this->admin_testing_model->save('test', $data, $id);
				redirect('admin/testing/edit/'.$id);
			}
		}
		//
		if($this->input->post('on_public'))
		{
			$this->admin_testing_model->view_public($id, '1');
			redirect('admin/testing');
		}
		//
		if($this->input->post('off_public'))
		{
			$this->admin_testing_model->view_public($id, '0');
			redirect('admin/testing');
		}

		if($this->input->post('save'))
		{	
			

			$rules = $this->admin_testing_model->rules_qest;
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run() == TRUE) {
				
				foreach($_POST as $ArrKey => $ArrStr)
				{
					$add[$ArrKey] = $this->input->post($ArrKey);
					if(isset($add['save'])) unset($add['save']);
				}

				
				$this->admin_testing_model->save_qest_aswer($add, $id);
				// redirect('admin/testing/edit/'.$id);
				//dump($add);
			}

		}
		


        //dump($this->data['arr']);

		$view = 'testing/testing_form';
		$this->display_lib->view_admin_page($view, $this->data);

	}

	public function add()
	{	

		if($this->input->post('submit'))
		{
			$rules = $this->admin_testing_model->rules;
			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() == TRUE)
			{
				$name = $this->input->post('test_name');
				$parent = $this->input->post('id_cat');

				$data = array(
					'test_name' => $name,
					'parent_id' => $parent,
					);

				$id = $this->admin_testing_model->save('test', $data);

				redirect('admin/testing/edit/'.$id);
			}
		}
		// Получаем массив сортированный по родительскому элементу
        $this->data['cat_test'] = $this->admin_testing_model->all_testing();


		$view = 'testing/testing_form_add';
		$this->display_lib->view_admin_page($view, $this->data);
	}

	
	
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */