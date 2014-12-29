<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *  USER ADMIN CONTROLLER
 */

class User extends Admin_Controller{




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

		$this->data['users'] = $this->admin_model->get();


		// display
		$this->data['page_title'] = 'Список администраторов';
		$view = 'user/users';
		$this->display_lib->view_admin_page($view, $this->data);
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

	public function new_admin()
	{	

		if($this->input->post('submit'))
		{

			$rules = $this->admin_model->reg_rules;
			// Отпровляем на валидацию
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_message('is_natural_no_zero', 'Поле "%s" должно быть выбрано');
			// Валидация успешна 
			if($this->form_validation->run() == TRUE)
			{	

				$email = $this->input->post('email');
		        $group = $this->input->post('group');
		        $rol_name= $this->input->post('roles_name');
		        $roles= $this->input->post('roles');

		        $pass = password_generate((int)6);
		       // var_dump($pass);
		        $is_admin = $this->input->post('group') === '1' ? '1': '0';
		        //Генерируем код активации
		        $activation_code = $pass->md5;

		        $data = array(
		            'login' => strstr($email, '@', TRUE),
		            'email' => $email,
		            'password' => $pass->hash,
		            'activation_code' => $activation_code,
		            'is_admin'=> $is_admin,
		            'id_group' => $group,
		            );

				// записываем данные пользователя и получаем ID записи
				$id_user = $this->admin_model->create_user($data);

				if ($id_user)
                {
                    // пользователь есть, записываем его роль 
                	$this->load->model('roles_model');
                	$id_role = $this->roles_model->create_roles();

                	if($id_role)
                	{	//есть роль, делаем связь группа - роль
                		$this->load->model('group_model');
                		if($this->group_model->create_group_roles($this->input->post('group'), $id_role) === TRUE)
                		{
                			

			    			$this->load->library('email');

							$this->email->from('hr@0370.ru', 'HR-Manager');
							$this->email->to(array('krdv@0370.ru', 'hr@0370.ru', set_value('email')));
							$this->email->subject('Регистрация нового пользователя');
							$this->email->message('Пожалуйста, подтвердите свой аккаунт. Для этого передите по ссылке '.
													base_url().'user/activate/'.$activation_code);
							
							 						
							if($this->email->send())
							{
								redirect('admin/user', 'refresh');
							}
							echo $this->email->print_debugger();
                			//redirect('admin/user', 'refresh');
                		}
                		
                	}

                }else{
                    $this->session->set_flashdata('error', 'Не удалось зарегистрировать пользователя!' );

                  //  redirect('admin/auth/login', 'refresh');
                }
			}
			

		}





		//Полномочия
		$this->load->model('permissions_model');
		$this->data['permissions'] = $this->permissions_model->get();
		// все роли
		$this->load->model('roles_model');
		$this->data['roles'] = $this->roles_model->get();
		// Группа пользователей
		$this->load->model('group_model');
		$this->data['group'] = $this->group_model->get_by(array('is_admin'=>'1'));
		//var_dump($this->data['role']);
		// display
		$this->data['page_title'] = 'Страница добавления администраторов';
		$view = 'user/new_user';
		$this->display_lib->view_admin_page($view, $this->data);
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