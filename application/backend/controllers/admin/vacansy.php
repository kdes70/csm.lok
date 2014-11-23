<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vacansy extends Admin_Controller{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('vacansy_model');
		$this->load->helper('csm_helper');

		//DEbug
		$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		//Список вакансий
		$this->data['vacansy'] = $this->vacansy_model->get_vacansy();
		
		//var_dump($this->data['vacansy']);
		$view = 'admin/_layout_show';
		//$this->data['subview'] = 'admin/admin/vacansy/vacansy';
		$this->display_lib->view_admin_page($view, $this->data);
	}

	public function read()
	{	

		$this->data['vacansy'] = $this->vacansy_model->get();

		$view = 'admin/vacansy_table';
		//$this->data['subview'] = 'admin/admin/vacansy/vacansy_read';
		$this->display_lib->view_admin_page($view, $this->data);
	}

	
	public function public_view($id_vac)
	{
		$id = $this->vacansy_model->save(array('public' => '1'), $id_vac);

		if($id)
		{
			redirect('admin/vacansy');
		}

	}

	public function add_vacansy()
	{

		$email_moder = 'hr@mail.ru';

		//список локолизации
		$this->load->model('localis_model');
		$this->data['local'] = $this->localis_model->get();

		//Категории
		$this->load->model('category_model');
		$this->data['category'] = $this->category_model->get();

		//список должностей
		// $this->load->model('profession_model');
		// $this->data['profession'] = $this->profession_model->get();

		$rules = $this->vacansy_model->rules;

		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == TRUE)
		{
			// Сведенья о вакансии
			$city = $this->input->post('city');
			$local = $this->input->post('id_local');
			$category = $this->input->post('category');
			// Контактные данные
			$contact = $this->input->post('contact');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			// Описание вокансии
			$title = $this->input->post('title');
			$reason = $this->input->post('reason');
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
				'author' => $contact,
				'email' => $email,
				'phone' => $phone,
				'city' =>$city,
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
				'public' => '0',
				 );

			$id_vac = $this->vacansy_model->save_vacansy($data);

			if($id_vac)
			{

				$this->load->library('email');

				$this->email->clear();
				$this->email->set_newline("\r\n");
				$this->email->from('admin@mail.ru', 'HR-manager');
				$this->email->to($email, $email_moder);
				$this->email->subject('Заявка на вакансию');
				$this->email->message('Поступила заявка на вакансию  http://csm.lok/admin/vacansy/read/'.$id_vac);
				                       
				if ( $this->email->send() )
				{
				    redirect('admin/vacansy/read');
				    return TRUE;
				}
				else
				{				   
				    return FALSE;
				}	

				redirect('admin/vacansy');
			}
			
		}
		
		$view = 'admin/form_vacansy';
		//$this->data['subview'] = 'admin/admin/vacansy/form_vacansy';
		$this->display_lib->view_admin_page($view, $this->data);
	}

	
	 public function _is_null($var)
    {   

        if ((int)$var === 0 )
        {
            $this->form_validation->set_message('_is_null', '%s обязательно для заполнения');
            return FALSE;
        }
       return TRUE; 
    }
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */