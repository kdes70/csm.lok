<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *  USER ADMIN CONTROLLER
 */

class Auth extends Admin_Controller{




	public function __construct()
	{
		parent::__construct();

	//	print_r($this->admin_model->hash($this->input->post('password')));
		//DEbug
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		
	}


	public function edit($id = NULL)
	{
		$id == NULL || $this->data['user'] = $this->user_model->get($id);

		$rules = $this->user_model->rules_admin;
		$id || $rules['password'] .= '|required';
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == TRUE)
		{

		}

		// Тут виды для редактирования пользователя
	}

	public function delete($id)
	{
		# code...
	}

	public function profile($id_user)
	{
		$this->data['user_profile'] = $this->user_model->get($id_user);

		//Основной слой вида 
		$view = 'admin/_layout_show';
		//Вид формы входа в админ панель
		$this->data['subview'] = 'admin/admin/user/user_profile';
		$this->display_lib->dashboard($view, $this->data);

	}



/**
 * login user
 * @return [type] [description]
 */
	public function login()
	{
		// шаблон для админ панели
		$dashboard = 'admin/vacansy';
		// Если залогинен напровляем на админ панель
		$this->admin_model->loggedin() == FALSE || redirect($dashboard);
		// Получаем правила для валидации
		// если пользователь не залогинен и отправил форму
		$rules = $this->admin_model->rules;
		// Отпровляем на валидацию
		$this->form_validation->set_rules($rules);
		// Валидация успешна 
		if($this->form_validation->run() == TRUE)
		{	
		// Логин успешен отпровляем в админ панель
			  if ($this->admin_model->login() == TRUE)
                {
                    redirect($dashboard);
                }else{
                    $this->session->set_flashdata('error', 'Сочетание электронной почты / пароль не существует!' );

                    redirect('admin/auth/login', 'refresh');
                }
		}

		//Основной слой вида 
		$view = 'auth_form';
		//Вид формы входа в админ панель
		//$this->data['subview'] = 'admin/admin/user/login';
		$this->display_lib->view_auth_page($view, $this->data);

	}

/**
 * Метод выхода из админ панели
 * @return [type] [description]
 */
	public function logout()
	{
		$this->admin_model->logout();
		redirect('admin/auth/login');
	}

	
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */