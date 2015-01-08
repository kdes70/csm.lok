<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Frontend_Controller{

	
	public function index()
	{
		$this->load->view('welcome_message');

		//echo phpinfo();
	}

	public function activate($code)
	{
		$this->load->model('admin_model');
		$this->load->helper('csm_helper');

		//if($this->uri->segment(3) == '')
//		{
			if($this->admin_model->confirm_registration($code))
			{	

			$data = $this->admin_model->get_by(array('activation_code' => $code), TRUE);

			$pass = password_generate((int)6);	

			$id_us = $this->admin_model->save(array('password' => $pass->hash), $data->id);
			
			if($id_us)
			{
				$this->load->library('email');

				$this->email->from('hr@0370.ru', 'HR-Manager');
				$this->email->to($data->email);
				$this->email->subject('Учетные данные');
				$this->email->message('Регистрация успешно пройденна <br>
										Данные для входа в административную зону:
										Логин: ' .$data->login.' Пароль: ' .$pass->password );
				
				 						
				if($this->email->send())
				{
					//$this->display_lib->view_page('mass', $this->data);
				}
				//redirect('vacansy');
		//	}

		  	
			
			}


		}

		echo "The registration_code missed in URL";

   exit();
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */