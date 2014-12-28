<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resume extends Frontend_Controller{

	public function __construct()
		{
			parent::__construct();

		$this->load->model('vacansy_model');
		$this->load->helper('csm_helper');
		//Категории
		$this->load->model('category_model');
		$this->data['category'] = $this->category_model->get();

		$this->load->model('resume_model');
		$this->data['new_resume'] = $this->resume_model->get_count_by(array(
																		'read'=>'0',
																		'public'=>'1'));

		foreach ($this->data['category'] as $key =>$value) 
		{

			$this->data['category'][$key] = $value;
			$this->data['category'][$key]->count = $this->vacansy_model->count_vacansy_by_category($value->id);

		}

		$this->load->model('page_model');
		//$this->data['page'] = $this->page_model->get_by(array('url' => 'vacansy'), TRUE);
			
			
			//DEbug
			//$this->output->enable_profiler(TRUE);
		}	


	public function index()
	{
		//$this->load->view('welcome_message');
	//	echo phpinfo();
        echo phpinfo();
		
	}

	public function add_resume($id_vac)
	{	

		$this->data['vacansy'] = $this->vacansy_model->get_by(array('id_vac'=> $id_vac), TRUE);
		
		$this->data['view_form'] = ($this->data['vacansy']->id_type == 1)? 
										'vacansy/form_anceta_vrach.php' : 
										'vacansy/form_anceta_drugie.php';

		$this->load->model('resume_model');

		// Set up the form
		$rules = $this->resume_model->rules_resume_vrach;
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == TRUE)
		{
			//$id_vac = $this->input->post('id_vac');
			$surname = $this->input->post('surname');
			$name = $this->input->post('name');
			$patronymic = $this->input->post('patronymic');
			$birthday = $this->input->post('sel_year').$this->input->post('sel_month').$this->input->post('sel_date');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$institution = $this->input->post('institution');
			$training_period = $this->input->post('training_period');
			$specialty = $this->input->post('specialty');
			$status = $this->input->post('status');
			$main_specialty = $this->input->post('main_specialty');
			// $extra_specialty = $this->input->post('extra_specialty');
			$extra_actions = $this->input->post('extra_actions');
			$work_experience = $this->input->post('work_experience');

			$adds = array(
				'id_vac' => $id_vac,
				'surname' => $surname,
				'name' => $name,
				'patronymic' => $patronymic,
				'birthday' => $birthday,
				'email' => $email,
				'phone' => $phone,
				'institution' => $institution,
				'training_period' => $training_period,
				'specialty' => $specialty,
				'status' => $status,
				'main_specialty' => $main_specialty,
				// 'extra_specialty' => $extra_specialty,
				'extra_actions' => $extra_actions,
				'work_experience' => $work_experience,
				);

				//var_dump($adds);

				$id = $this->resume_model->save($adds);
				if($id)
				{	
					
					 
		
					$this->load->library('email');
					$this->email->from('hr@0370.ru', 'HR-Manager');
					$this->email->to(array('krdv@0370.ru', 'hr@0370.ru', set_value('email')));
					$this->email->subject('Поступило заявка на вакансию '. $this->data['vacansy']->title);
					$this->email->message( 'Поданно резюме от '.$surname.' '. $name. ' '. $patronymic);
					
					 						
					if($this->email->send())
					{
						redirect('vacansy');
					}
				}
			}

	
			//var_dump($this->data['vacansy']);
		//	print_r();
		$this->display_lib->view_page('resume/form_resume', $this->data);
}
	

	
	public function add()
	{	

		
		// Set up the form
		$rules = $this->resume_model->rules_resume_vrach;
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == TRUE)
		{	
			$id_vac = $this->input->post('id_vac');
			$surname = $this->input->post('surname');
			$name = $this->input->post('name');
			$patronymic = $this->input->post('patronymic');
			$birthday = $this->input->post('sel_year').$this->input->post('sel_month').$this->input->post('sel_date');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$institution = $this->input->post('institution');
			$training_period = $this->input->post('training_period');
			$specialty = $this->input->post('specialty');
			$status = $this->input->post('status');
			$main_specialty = $this->input->post('main_specialty');
			// $extra_specialty = $this->input->post('extra_specialty');
			$extra_actions = $this->input->post('extra_actions');
			$work_experience = $this->input->post('work_experience');

			$data = array(
				'id_vac' => $id_vac,
				'surname' => $surname,
				'name' => $name,
				'patronymic' => $patronymic,
				'birthday' => $birthday,
				'email' => $email,
				'phone' => $phone,
				'institution' => $institution,
				'training_period' => $training_period,
				'specialty' => $specialty,
				'status' => $status,
				'main_specialty' => $main_specialty,
				// 'extra_specialty' => $extra_specialty,
				'extra_actions' => $extra_actions,
				'work_experience' => $work_experience,
				);


			//var_dump($data);
		
		 $id = $this->resume_model->save($data);
		 if($id){
		 	
			$this->load->library('email');
			$this->email->from('hr@0370.ru', 'HR-Manager');
			$this->email->to(array('krdv@0370.ru', 'hr@0370.ru', set_value('email')));
			$this->email->subject('Поступило резюме');
			$this->email->message( 'Поданно резюме от '.$surname.' '. $name. ' '. $patronymic);
			
									
			if($this->email->send())
			{
				redirect('vacansy');
			}
			//echo $this->email->print_debugger();

		 }
		
		}

		$this->data['vac_list'] = $this->vacansy_model->get_by(array('public' => 1));
			//Категории
			$this->load->model('category_model');
			$this->data['category'] = $this->category_model->get();

			foreach ($this->data['category'] as $key =>$value) 
			{

				$this->data['category'][$key] = $value;
				$this->data['category'][$key]->count = $this->vacansy_model->count_vacansy_by_category($value->id);

			}
			
			$this->load->model('page_model');
			$this->data['page'] = $this->page_model->get_by(array('url' => 'resume'), TRUE);

		 $this->display_lib->view_page('resume/resume', $this->data);
	}



	public function get_type($id_vac)
	{
		

		$this->data['vac_form'] = $this->vacansy_model->get_by(array('id_vac'=>$id_vac), TRUE);

		echo($this->data['vac_form']->id_type);
	}

	// public function em()
	// {
	// 	 $this->display_lib->view_page('email/callback_to', $this->data);
	// }


	




}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */