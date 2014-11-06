<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *  USER ADMIN CONTROLLER
 */

class User extends Admin_Controller{




	public function __construct()
	{
		parent::__construct();

		//DEbug
		$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$this->data['users'] = $this->user_model->get();

		//Основной слой вида 
		$view = 'admin/_layout_show';
		//Вид формы входа в админ панель
		$this->data['subview'] = 'admin/admin/user/users_row';
		$this->display_lib->dashboard($view, $this->data);

		//echo $this->user_model->is_admin(0);

		//echo $this->user_model->is_admin($this->session->userdata('group'));
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
		$dashboard = 'admin/dashboard';
		// Если залогинен напровляем на админ панель
		$this->user_model->admin_loggedin() == FALSE /*&& $this->user_model->loggedin() == FALSE*/ || redirect($dashboard);

		// Получаем правила для валидации
		// если пользователь не залогинен и отправил форму
		$rules = $this->user_model->rules;
		// Отпровляем на валидацию
		$this->form_validation->set_rules($rules);
		// Валидация успешна 
		if($this->form_validation->run() == TRUE)
		{	
			//Наверно тут будет условие по group

		// Логин успешен отпровляем в админ панель
			if($this->user_model->login() == TRUE)
			{	

				if($this->user_model->admin_loggedin() == TRUE)
				{
					//Если id_groups = is_admin
					//то посылаем в админку	
					redirect($dashboard);
				}
				else{

					redirect('page/show');
				}

				
			
				
				//А если нет то это просто пользователь 
				//посылаем его на сайт
			}
			else{ 
				// Если нет то выводим ошибку и перенапровляем снова на форму входа
				$this->session->set_flashdata('error', 'Email или Пароль не верный');
				redirect('admin/user/login', 'refresh');
			}
		}

		//Основной слой вида 
		$view = 'admin/_layout_show';
		//Вид формы входа в админ панель
		$this->data['subview'] = 'admin/admin/user/login';
		$this->display_lib->admin_login($view, $this->data);

	}

/**
 * Метод выхода из админ панели
 * @return [type] [description]
 */
	public function logout()
	{
		$this->user_model->logout();
		redirect('admin/user/login');
	}

	
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */