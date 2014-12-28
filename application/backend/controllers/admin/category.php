<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends Admin_Controller{

	public function __construct()
	{
		parent::__construct();
$this->load->helper('csm_helper');
		//Категории
		$this->load->model('category_model');
		$this->data['category'] = $this->category_model->get();

		$this->load->model('resume_model');
$this->data['new_resume'] = $this->resume_model->get_count_by(array('read'=>'0', 'public'=>'1'));


		$this->load->model('vacansy_model');
		foreach ($this->data['category'] as $key =>$value) 
		{

			$this->data['category'][$key] = $value;
			$this->data['category'][$key]->count = $this->vacansy_model->count_vacansy_by_category($value->id);

		}

		//DEbug
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		
		$view = 'admin/category';
		//$this->data['subview'] = 'admin/admin/vacansy/vacansy_read';
		$this->display_lib->view_admin_page($view, $this->data);

	}

	public function edit($id = NULL)
	{	
		if ($id) {
			$this->data['cat'] = $this->category_model->get($id);
			//count($this->data['cat']) || $this->data['errors'][] = 'category could not be found';
		}
		else{
			$this->data['cat'] = $this->category_model->get_new();
		}

	//	dump($this->data);

		$rules = $this->category_model->rules;
		$this->form_validation->set_rules($rules);
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->category_model->array_from_post(array(
				'name',
			));
			
			$this->category_model->save($data, $id);
			redirect('admin/category/edit');
		}
		//dump($this->data);
		$view = 'admin/category';
		//$this->data['subview'] = 'admin/admin/vacansy/vacansy_read';
		$this->display_lib->view_admin_page($view, $this->data);

	}

	public function delete($id)
	{	

		$this->category_model->delete($id);
		redirect('admin/category/edit');
	}
	
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */