<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Frontend_Controller{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('user_model');
		
	}



	public function confirmation()
	{
		//var_dump($data);
		//	
    	$groups = $this->input->post('groups');
    	$profession = $this->input->post('profession');

    	$name = $this->input->post('name');
    	$surname = $this->input->post('surname');
    	$patronymic = $this->input->post('patronymic');

    	$email = $this->input->post('email');
    	$email_confirm = $this->input->post('email_confirm');


    	//Первым делом проверяем поле groups
    	if($groups == 1)
    	{//Если сотрудник
			//Профессия обезательна
			//$profession = $this->input->post('profession');
    		$data = array(
    			'id_groups' => $groups,
    			'login'=> 'Сотрудник ЦСМ',
    			'email' => $email,
    			'password' => '',
    			'id_role' => '0',
    			'status' => '1',
    			'profession' => $profession,
    			'name' => $name,
    			'surname' => $surname,
    			'patronymic' => $patronymic,
    			'hash' => 'dsfsdfdfsdfsdfdsfsdfdsf',//id_session

    			);	
    	} 
    	elseif ($groups == 2) 
    	{//Если врач
    		$data = array(
    			'id_groups' => $groups,
    			'login'=> 'Врач',
    			'email' => $email,
    			'password' => '',
    			'id_role' => '0',
    			'status' => '1',
    			'profession' => $profession,
    			'name' => $name,
    			'surname' => $surname,
    			'patronymic' => $patronymic,
    			'hash' => 'dsfsdfdfsdfsdfdsfsdfdsf',//id_session

    			);
    	}
    	else
    	{//Если гость

    		$data = array(
    			'id_groups' => $groups,
    			'login'=> 'Гость',
    			'email' => $email,
    			'password' => '',
    			'id_role' => '0',
    			'status' => '1',
    			'profession' => $profession,
    			'name' => $name,
    			'surname' => $surname,
    			'patronymic' => '',
    			'hash' => 'dsfsdfdfsdfsdfdsfsdfdsf',//id_session
    			);
    	}
    	
    	if($data)
    	{//Отправляем на запись 
    		$id_user = $this->user_model->save($data);

    		if($id_user)
    		{	
    			//$this->session->set_userdata(['id_user' => $id_user]);	
    			//return true;
    		}
    	}
    	
    	
    	
		//Высылаем емаел письмо с данными о регистрации
		
		//перенапровляем на личный кобинет для продолженья регистрации
		

		$this->output->enable_profiler(TRUE);
//	return false;	
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