<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resume extends Admin_Controller{

	public function __construct()
	{
		parent::__construct();

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

		$this->load->model('city_model');
		$this->data['city'] = $this->city_model->get();
		//DEbug
		//$this->output->enable_profiler(TRUE);
	}

	public function callback()
	{
		$view = 'admin/main_page';
		$this->display_lib->view_admin_page($view, $this->data);
	}

	public function index()
	{	
		$this->data['page_title'] = 'Активные резюме';
		$this->data['page'] = $this->page_model->get_by(array('url' => 'resume'), TRUE);

		$this->data['resume'] = $this->resume_model->get_by(array('public'=>'1'));

		$this->data['count'] = $this->resume_model->get_count();
		$this->data['resume_archive_count'] = $this->resume_model->get_count_by(array('public'=>'0'));
		$this->data['resum_active_count'] = $this->resume_model->get_count_by(array('public'=>'1'));

		$view = 'admin/resume_table';
		$this->display_lib->view_admin_page($view, $this->data);
	}

	public function full($id_resum)
	{	

		//

		$this->data['resume'] = $this->resume_model->get_by(array('id'=>$id_resum, 'public'=>'1'), TRUE);
		//Если не прочитан заменяем на прочитанную
		if($this->data['resume']->read === '0')
		{
			$this->resume_model->save(array('read'=>'1'), $id_resum);
		}
		//if()
		$this->data['vacansy'] = $this->vacansy_model->get_by(array('id_vac'=>$this->data['resume']->id_vac), TRUE);

		$view = 'admin/resume_full';
		$this->display_lib->view_admin_page($view, $this->data);
	}

	public function full_arhive($id_resum)
	{	

		//

		$this->data['resume'] = $this->resume_model->get_by(array('id'=>$id_resum, 'public'=>'0'), TRUE);
		//Если не прочитан заменяем на прочитанную
		if($this->data['resume']->read === '0')
		{
			$this->resume_model->save(array('read'=>'1'), $id_resum);
		}
		//if()
		$this->data['vacansy'] = $this->vacansy_model->get_by(array('id_vac'=>$this->data['resume']->id_vac), TRUE);

		$view = 'admin/resume_full';
		$this->display_lib->view_admin_page($view, $this->data);
	}

	public function new_resume()	
	{	

		$this->data['page_title'] = 'Новые резюме';
		$this->data['count'] = $this->resume_model->get_count();
		$this->data['resume_archive_count'] = $this->resume_model->get_count_by(array('public'=>'0'));
		$this->data['resum_active_count'] = $this->resume_model->get_count_by(array('public'=>'1'));

		$this->data['resume'] = $this->resume_model->get_by(array('public'=>'1', 'read'=>'0'));

		$view = 'admin/resume_table';
		$this->display_lib->view_admin_page($view, $this->data);
	}
	public function archive()
	{	
		$this->data['page_title'] = 'Архив резюме';
		$this->data['count'] = $this->resume_model->get_count();
		$this->data['resume_archive_count'] = $this->resume_model->get_count_by(array('public'=>'0'));
		$this->data['resum_active_count'] = $this->resume_model->get_count_by(array('public'=>'1'));

		$this->data['resume'] = $this->resume_model->get_by(array('public'=>'0'));

		$view = 'admin/resume_table';
		$this->display_lib->view_admin_page($view, $this->data);
	}

	public function add_archive($id_resum)
	{
		$id = $this->resume_model->save(array('public' => '0', 'read'=>'1'), $id_resum);

		if($id)
		{
			redirect('admin/resume','refresh');
			return TRUE;
		}

		return FALSE;
	}

	public function delete($id_resum)
	{	

		$this->resume_model->delete($id_resum);
		redirect('admin/resume/archive');
	}





















/*
	public function edit_pages($page)
	{	
		$this->data['page'] = $this->page_model->get_by(array('url' => $page), TRUE);

		$rules = $this->page_model->rules;
		$this->form_validation->set_rules($rules);
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->page_model->array_from_post(array(
				'text', 
				
			));
			$this->page_model->save($data, $page);
			redirect('admin/pages');
		}
		


		$view = 'admin/form_page';
		$this->display_lib->view_admin_page($view, $this->data);

	}

	*/
	
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */