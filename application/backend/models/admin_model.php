<?php

class Admin_Model extends MY_Model
{   
    protected $_table_name = 'admins';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';

    protected $_is_admin = array( 1 =>'admin', 0 =>'moder');
    
    protected $_timestamps = TRUE;

     public $rules = array(
        'login' => array(
            'field' => 'login',
            'label' => 'Login',
            'rules' => 'trim|required|xxs_clean'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
        )
    );

	function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		$user = $this->get_by(array(
			'login' => $this->input->post('login'),
			'password' => $this->hash($this->input->post('password')), 
			), TRUE);

  //      print_r($this->hash($this->input->post('password')));

		if(count($user))
		{   //Log in user
		    $data = array(
		        'login' => $user->login,
		        'id_admin' => $user->id,
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


    public function is_admin($is_admin)
    {
        return (bool) $is_admin == 1;
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











}



