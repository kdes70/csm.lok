<?php

class User_Model extends MY_Model
{   
    protected $_table_name = 'users';
    protected $_primary_key = 'id_user';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id_user';

    protected $_is_admin = array( 1 =>'admin', 2 =>'moder');
    
    protected $_timestamps = TRUE;

     public $rules = array(
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|xxs_clean'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
        )
    );

     public $rules_admin = array(
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|xxs_clean'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
        )
    );


    public $rules_reg = array(
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|callback__unique_email|matches[email_confirm]|xxs_clean'
        ),
         'email_confirm' => array(
            'field' => 'email_confirm',
            'label' => 'email_confirm',
            'rules' => 'trim|required|matches[email]'
        ),
        'groups' => array(
            'field' => 'groups',
            'label' => 'groups',
            'rules' => 'trim|required|is_natural'
        ),
        'profession' => array(
            'field' => 'profession',
            'label' => 'profession',
            'rules' => 'trim|xxs_clean'
        ),
        'name' => array(
            'field' => 'name',
            'label' => 'name',
            'rules' => 'trim|required|xxs_clean'
        ),
        'surname' => array(
            'field' => 'surname',
            'label' => 'surname',
            'rules' => 'trim|required|xxs_clean'
        ),
        'patronymic' => array(
            'field' => 'patronymic',
            'label' => 'patronymic',
            'rules' => 'trim|required|xxs_clean'
        )
    );
 
	function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		$user = $this->get_by(array(
			'email' => $this->input->post('email'),
			'password' => $this->hash($this->input->post('password')), 
			), TRUE);

        $this->load->model('group_model');

	    if($user->id_groups)
		{	
			
			//$group = $this->group_model->get_by(array('id_group'=> $user->id_groups), TRUE);
			// Проверяем относится ли пользователь к группе админов
			if($this->is_admin($user->id_groups) == TRUE)
			{
				 $this->session->set_userdata(array('is_admin' =>TRUE));
			}
			
		}  

		if(count($user))
		{   //Log in user
		    $data = array(
		        'login' => $user->login,
		        'email' => $user->email,
		        'id_user' => $user->id_user,
		        'group' => $user->id_groups,
		        'loggedin' =>TRUE,
		      
		    );

		    $this->session->set_userdata($data);
		  	  return TRUE;
		}

        return FALSE;
	}

    public function registration()
    {
        //проверить на уникальность emaila
        
        // Если запись в БД успешна
        
        //посылаем письмо с активацией
    }

	public function confirmation()
	{
		
	}

	 public function logout()
    { 
        $this->session->sess_destroy();
    }


    public function loggedin()
    {
        return (bool) $this->session->userdata('loggedin');
    }

     public function admin_loggedin()
    {
        return (bool) $this->session->userdata('is_admin');
    }


    public function hash($string)
    {
        return hash('sha512', $string. config_item('encryption_key'));
    }
// new user save

// updata user

// delete user

/**
 * is admin user
 * @param  [type]  $id_groups [description]
 * @return boolean            [description]
 */
    public function is_admin($id_groups)
    {
    	//var_dump($this->_is_admin);
    	//$id_groups = $this->session->userdata('group');

    	 return (bool)array_key_exists($id_groups, $this->_is_admin);
    	 
    
    }

    public function get_profiles($id_user)
    {   
        

        $data = $this->get($id_user);
        
        if($data->profession)
        {
             $data->profession = $this->get_profession($data->profession);
        }
        // TODO продумать исключение  
        $data->profession = (object)array('name'=>'Нет профессии');
        return $data;
    }

    public function get_profession($id_prof)
    {   
        $this->load->model('profession_model');
       return $this->profession_model->get($id_prof);
       
    }


// is role user

// is prova of user


// ban user










}



