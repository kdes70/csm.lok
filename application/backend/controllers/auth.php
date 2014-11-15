<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *  USER FRONT CONTROLLER
 */


class Auth extends Frontend_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('user/my_user_model', 'user_model');

        $this->load->library('my_form_validation');

        $this->load->model('user/roles_model');
		//$this->load->helper('csm_helper');
	}

    public function index()
    {
       
        $rules = $this->user_model->index();
        $rol =$this->roles_model->index();
        $rol_ad =$this->roles_model->admins();
        print_r($rol_ad);
       $rul = $this->form_validation->rules;

       var_dump($rul);



    }


}

/* End of file user.php */
/* Location: ./application/controllers/user.php */