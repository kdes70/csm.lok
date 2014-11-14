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
		$this->data['subview'] = 'admin/admin/vacansy/vacansy';
		$this->display_lib->dashboard($view, $this->data);

	}

	public function read($id_vac)
	{
		$this->data['vacansy_read'] = $this->vacansy_model->get($id_vac);

		$view = 'admin/_layout_show';
		$this->data['subview'] = 'admin/admin/vacansy/vacansy_read';
		$this->display_lib->dashboard($view, $this->data);
	}

	public function add_vacansy()
	{

		$email_moder = 'hr@mail.ru';


		//список локолизации
		$this->load->model('localis_model');
		$this->data['local'] = $this->localis_model->get();

		//список должностей
		$this->load->model('profession_model');
		$this->data['profession'] = $this->profession_model->get();

		$this->load->model('user_model');
		$this->data['author'] = $this->user_model->get($this->session->userdata('id_user'));
	
		$rules = $this->vacansy_model->rules;

		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == TRUE)
		{
			
			$title = $this->input->post('title');
			$reason = $this->input->post('reason');
			$count_candidate = $this->input->post('count_candidate');
			$planned_date = $this->input->post('planned_date');
			$desc_candidate = $this->input->post('desc_candidate');
			$education = $this->input->post('education');
			$profes_profession = $this->input->post('profes_profession');
			$special_requirement = $this->input->post('special_requirement');
			$other_requirements = $this->input->post('other_requirements');
			$workplace = $this->input->post('workplace');
			$schedule = $this->input->post('schedule');
			$nature_work = $this->input->post('nature_work');
			$wage_rate = $this->input->post('wage_rate');
			$wage_structure = $this->input->post('wage_structure');
			$additional_terms = $this->input->post('additional_terms');
			$author = $this->input->post('author_id');
			$local = $this->input->post('id_local');


			$data = array(
				'id_loc' => $local,
				'id_author' => $author,
				'title' => $title,
				'reason' => $reason,
				'count_candidate' => $count_candidate,
				'planned_date' => $planned_date,
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
				$this->email->to($email_moder);
				$this->email->subject('Заявка на вакансию');
				$this->email->message('Поступила заявка на вакансию  http://csm.lok/admin/vacansy/read/'.$id_vac);
				                       
				if ( $this->email->send() )
				{
				    redirect('page/show/main');
				    return TRUE;
				}
				else
				{				   
				    return FALSE;
				}	

				redirect('admin/vacansy');
			}
			
		}
		
		$view = 'admin/_layout_show';
		$this->data['subview'] = 'admin/admin/vacansy/form_vacansy';
		$this->display_lib->dashboard($view, $this->data);
	}

	
	
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */