<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vacansy extends Admin_Controller{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('vacansy_model');
		$this->load->helper('csm_helper');

		$this->load->model('resume_model');
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
		$this->output->enable_profiler(TRUE);
	}

	public function index()
	{		
		

		$this->data['vacansy'] = $this->vacansy_model->get_vacansy();

		$view = 'vacansy_table';
	
		$this->display_lib->view_admin_page($view, $this->data);
	}

	public function delete($id)
	{
		$this->vacansy_model->delete($id);
		redirect('admin/vacansy');
	}

	
	public function card_vacansy($id_vac)
	{
		$this->data['vacansy'] = $this->vacansy_model->get_vacansy($id_vac, NULL, TRUE);

		$view = 'card_vacansy';
		
		$this->display_lib->view_admin_page($view, $this->data);
	}
	
	public function public_set($id_vac)
	{
		$id = $this->vacansy_model->save(array('public' => '1'), $id_vac);

			redirect('admin/vacansy');
		
	}

	

	public function edit ($id = NULL)
	{	
		
		// Fetch a article or set a new one
		if ($id) {
			$this->data['vacansy'] = $this->vacansy_model->get($id);
			count($this->data['vacansy']) || $this->data['errors'][] = 'article could not be found';
		}
		/*else {
			$this->data['vacansy'] = $this->vacansy_model->get_new();
		}*/
		
		// Set up the form
		$rules = $this->vacansy_model->rules;
		$this->form_validation->set_rules($rules);
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->vacansy_model->array_from_post(array(
				'city',
				'id_cat',
				'id_loc',
				'id_type',
				'author',
				'email',
				'phone',
				'title',
				'reason',
				'desc_candidate',
				'education',
				'profes_profession',
				'special_requirement',
				'other_requirements',
				'workplace',
				'schedule',
				'nature_work',
				'wage_rate',
				'wage_structure',
				'additional_terms',
				'priority'
			));
			
			$this->vacansy_model->save($data, $id);
			redirect('admin/vacansy');
		}

		//список локолизации
		$this->load->model('localis_model');
		$this->data['local'] = $this->localis_model->get();

		// Load the view
		$view = 'edit_vacansy';
		//$this->data['subview'] = 'admin/admin/vacansy/form_vacansy';
		$this->display_lib->view_admin_page($view, $this->data);
	}

	public function add_vacansy()
	{
		$email_moder = 'hr@mail.ru';
		//список должностей
		// $this->load->model('profession_model');
		// $this->data['profession'] = $this->profession_model->get();

		$rules = $this->vacansy_model->rules;

		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == TRUE)
		{
			// Сведенья о вакансии
			$city = $this->input->post('city');
			$local = $this->input->post('id_loc');
			$category = $this->input->post('id_cat');
			$reason = $this->input->post('reason');
			$type = $this->input->post('type');
			$priority = $this->input->post('priority');
			// Контактные данные
			$contact = $this->input->post('author');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			// Описание вокансии
			$title = $this->input->post('title');
			$desc_candidate = $this->input->post('desc_candidate');
			// Требования
			$education = $this->input->post('education');
			$profes_profession = $this->input->post('profes_profession');
			$special_requirement = $this->input->post('special_requirement');
			$other_requirements = $this->input->post('other_requirements');
			// Условия работы 
			$workplace = $this->input->post('workplace');
			$schedule = $this->input->post('schedule');
			$nature_work = $this->input->post('nature_work');
			$wage_rate = $this->input->post('wage_rate');
			$wage_structure = $this->input->post('wage_structure');
			$additional_terms = $this->input->post('additional_terms');
			
			$data = array(
				'id_loc' => $local,
				'id_cat' => $category,
				'city' =>$city,
				'id_type' => $category,
				'author' => $contact,
				'email' => $email,
				'phone' => $phone,
				'title' => $title,
				'reason' => $reason,
				'count_candidate' => '',
				'planned_date' => '',
				'desc_candidate' => $desc_candidate,
				'education' => $education,
				'profes_profession' => $profes_profession,
				'special_requirement' => $special_requirement,
				'other_requirements' => $other_requirements,
				'workplace' => $workplace,
				'schedule' => $schedule,
				'nature_work' => $nature_work,
				'wage_rate' => $wage_rate,
				'wage_structure' => $wage_structure,
				'additional_terms' => $additional_terms,
				'public' => '1',
				'priority' => $priority,
				 );

			$id_vac = $this->vacansy_model->save_vacansy($data);

			if($id_vac)
			{

				// $this->load->library('email');

				// $this->email->clear();
				// $this->email->set_newline("\r\n");
				// $this->email->from('admin@mail.ru', 'HR-manager');
				// $this->email->to($email, $email_moder);
				// $this->email->subject('Заявка на вакансию');
				// $this->email->message('Поступила заявка на вакансию  http://csm.lok/admin/vacansy/read/'.$id_vac);
				                       
				// if ( $this->email->send() )
				// {
				//     redirect('admin/vacansy');
				//     return TRUE;
				// }
				// else
				// {				   
				//     return FALSE;
				// }	

				redirect('admin/vacansy', 'location');
			}

			//redirect('admin/vacansy', 'location');
			
		}
		//список локолизации
		$this->load->model('localis_model');
		$this->data['local'] = $this->localis_model->get();

		$view = 'form_vacansy';
		//$this->data['subview'] = 'admin/admin/vacansy/form_vacansy';
		$this->display_lib->view_admin_page($view, $this->data);
	}

	
	 public function _is_null($var)
    {   

        if ((int)$var === 0 )
        {
            $this->form_validation->set_message('_is_null', 'Поле "%s" обязательно для заполнения');
            return FALSE;
        }
       return TRUE; 
    }
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */