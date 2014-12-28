<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Callback extends Frontend_Controller{

	

	function __construct() {
		parent::__construct();

		//Подключаем модель callback
		
		$this->load->model('callback_model');

		$this->load->model('vacansy_model');
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
		
		$this->load->model('page_model');
		$this->data['page'] = $this->page_model->get_by(array('url' => 'vacansy'), TRUE);
		//DEbug
		//$this->output->enable_profiler(TRUE);
		// Список городов
		$this->load->model('city_model');
		$this->data['city'] = $this->city_model->get_by(array('public' => '1'));
	}
	public function index()
	{
		//echo phpinfo();

		$data = array();

		$rules = $this->callback_model->rules;
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == TRUE)
		{
			$fio = $this->input->post('fio');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$comm = $this->input->post('comment');


			$data = array(
					'fio' => $fio,
					'email' =>$email,
					'phone' => $phone,
					'comment' => $comm,
					'public' => '1'
					);

			$id = $this->callback_model->save($data);

			if($id)
			{
				
			$this->load->library('email');
			$this->email->from('hr@0370.ru', 'HR-Manager');
			$this->email->to(array('krdv@0370.ru', 'hr@0370.ru', set_value('email')));
			$this->email->subject('заявка на обратный звонок '.set_value('fio'));
			$this->email->message('Получина заявка на обратный звонок Телефон для звонка: '.$phone. ' Примечание: '.$comm);
			// $this->email->message($this->load->view('vacansy/email/callback_to'), $data);
			
			 						
			if($this->email->send())
			{
				redirect('vacansy');
				
			}

			// echo $this->email->print_debugger();
			
			

			}
		
		}

		$this->display_lib->view_page('callback/callback', $this->data);
	}

 	

}

