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
    public $reg_rules =array(
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|is_unique[admins.email]|xss_clean'
        ),
        'group' => array(
            'field' => 'group',
            'label' => 'Группа пользователя',
            'rules' => 'trim|required|is_natural_no_zero'
        ),
        'roles_name' => array(
            'field' => 'roles_name',
            'label' => 'Название роли',
            'rules' => 'trim|required|xxs_clean'
        ),
        'roles' => array(
            'field' => 'roles',
            'label' => 'Код роли',
            'rules' => 'trim|required|alpha_dash|xxs_clean'
        ),
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
                'is_admin' => $user->is_admin,
		    );

		    $this->session->set_userdata($data);
		  	  return TRUE;
		}

        return FALSE;
	}

    public function create_user($data)
    {
        
         $id = $this->save($data);
         if($id)
         {
            return $id;
         }
         return FALSE;
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
    
    public function confirm_registration($code)
    {
        $query = "SELECT activation_code  FROM ".$this->_table_name." WHERE activation_code = ?";
        $result = $this->db->query($query, $code);

        if ($result->num_rows()==1) 
        {
            $query = "UPDATE  ".$this->_table_name."  SET  activation = 1 WHERE activation_code = ?";
            $result= $this->db->query($query, $code);


        return TRUE;

        }

       return false;
     
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

  










}



