<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *  USER FRONT CONTROLLER
 */


class User extends Frontend_Controller{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('user_model');
		$this->load->helper('csm_helper');
	}

    public function index()
    {
        if (!$this->user_model->loggedin())
        {
            //redirect them to the login page
            redirect('user/login', 'refresh');
        } 

      

    }


/**
 * login user
 * @return [type] [description]
 */
    public function login()
    {
        // шаблон для админ панели
        // $dashboard = 'admin/dashboard';

        //$frontend = 'page/show/main';
        // Если залогинен напровляем на админ панель
      // $this->user_model->loggedin() == FALSE || redirect('/');
       // $this->user_model->loggedin() == FALSE || redirect($frontend);
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
                //посылаем его на сайт
                 redirect('/');
  
            }
            // Если нет то выводим ошибку и перенапровляем снова на форму входа
           $this->session->set_flashdata('error', 'Email или Пароль не верный');
            redirect('user/login', 'refresh');
            
        }
  
        $view = 'user/login';
        $this->display_lib->user_login($view, $this->data);
    }



    /**
     * Метод выхода из админ панели
     * @return [type] [description]
     */
    
    public function logout()
    {
        $this->user_model->logout();
        redirect('user/login');
    }



    public function profiles()
    {   
        if($this->user_model->loggedin() == FALSE)
        {
            return redirect('page/show/main');
        } 
        // TODO написать функцию проверки url(id_user) == session->id_user
       
        $this->data['user_profile'] = $this->user_model->get_profiles($this->session->userdata('id_user'));    

        $view = 'user/profiles';
        $this->display_lib->user_profile($view, $this->data);


        $this->load->model('roles_model');

        $roles = $this->roles_model->get_roles();

        var_dump($roles);

    }

    public function options()
    {
        echo "Options page";
    }


	public function registration()
	{
		
		// POST
    	$groups = $this->input->post('groups');
    	$profession = $this->input->post('profession');

    	$name = $this->input->post('name');
    	$surname = $this->input->post('surname');
    	$patronymic = $this->input->post('patronymic');

    	$email = $this->input->post('email');
    	$email_confirm = $this->input->post('email_confirm');

        // Валидация
        $rules = $this->user_model->rules_reg;
        // Отпровляем на валидацию
        $this->form_validation->set_rules($rules);

        $hash_session = $this->user_model->hash($this->session->userdata('session_id'));

        $pass = password_generate(8);
        //$password = $this->user_model->hash($pass['password']);
        // $this->form_validation->set_value($rules);

        // var_dump($rules);

         if($this->form_validation->run() == TRUE)
        {       
           



            //Если гость
            $data = array(
                'id_group' => $groups,
                'login'=> 'Гость',
                'email' => $email,
                'password' => $pass['hash'],
                'status' => '0',
                'name' => $name,
                'surname' => $surname,
                'patronymic' => '',
                'hash' => $hash_session//id_session
                );

        	//Первым делом проверяем поле groups
        	if($groups == 3 || $groups == 4)
        	{//Если сотрудник
    			//Профессия обезательна
    			$profession = $this->input->post('profession');
        		$data = array(
        			'id_group' => $groups,
        			'login'=> 'Пользовател',
        			'email' => $email,
                    'password' => $pass['hash'],
        			'status' => '1',
        			'profession' => $profession,
        			'name' => $name,
        			'surname' => $surname,
        			'patronymic' => $patronymic,
        			'hash' => $hash_session//TODO COOcie md5($this->session->userdata('session_id').SOLD)

        			);	
        	} 
        	
      	
        	//Отправляем на запись 
        		$id_user = $this->user_model->save($data);

        		if($id_user)
        		{	
        			//$this->session->set_userdata(['id_user' => $id_user]);	
        			//return true;
                    $this->load->library('email');


                    $this->email->clear();
                    $this->email->set_newline("\r\n");
                    $this->email->from('admin@mail.ru', 'HR-manager');
                    $this->email->to($email);
                    $this->email->subject('Данные о регистрации');
                    $this->email->message('Вы зарегистрировались на сайте 
                                            Email: '.$email.' Пароль: '.$pass['password']
                                            );
                    if ( $this->email->send() )
                    {
                        redirect('page/show/main');
                        return TRUE;
                    }
                    else
                    {
                       
                        return FALSE;
                    }

                       // redirect('page/show/main');
                   
                   //  redirect('user/activate/'.$hash_session.$id_user);
        		}
    	   
    	
    	
    	
		//Высылаем емаел письмо с данными о регистрации
		
		//перенапровляем на личный кобинет для продолженья регистрации
		
    }
    else
    {
         // Если нет то выводим ошибку и перенапровляем снова на форму входа
        $this->session->set_flashdata('error', 'Регистрация не удалась');
       // redirect('page/show/registration', 'refresh');
    }
       
		$this->output->enable_profiler(TRUE);
//	return false;	
//    
//          // Данные из таблицы Group
            $this->load->model('group_model');
            $this->data['groups'] = $this->group_model->get_by(array('public' => '1'));

            //var_dump($this->data);

            // if(isset($_POST['user_status'])) 
            // получаем данные из таблицы profession    
            $this->load->model('profession_model');
            $this->data['profession'] = $this->profession_model->get();
//    
//    
            $view = 'user/reg_form';
                //Подключаем виды для гланой страницы
            $this->display_lib->reg_page($view, $this->data);
	}

    public function activate($id_hash)
    {
       echo "ACTIVATE";
    }


/**
 * Проверка уникальности email
 * @param  [type] $str [description]
 * @return [type]      [description]
 */
    public function _unique_email($str)
    {   
        $id = $this->uri->segment(4);
        $this->db->where('email', $this->input->post('email'));
        !$id || $this->db->where('id !=', $id);
        $user = $this->user_model->get();

        if(count($user))
        {
            $this->form_validation->set_message('_unique_email', '%s должен быть уникальным');
            return FALSE;
        }
        return TRUE;
    }
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */