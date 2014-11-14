<?php
class Admin_Controller extends MY_Controller
{
    function __construct() {
        parent::__construct();
        
        $this->data['meta_title'] = "Админ - панель";
      //  $this->load->helper('form');
        $this->load->library('form_validation');
     //   $this->load->library('session');
        $this->load->model('user_model');
        
        //Login check
        $exception_uris = array(
            'user/login', 
            'user/logout'
            );
        if(in_array(uri_string(),  $exception_uris) == FALSE)
        {
            if ($this->user_model->admin_loggedin() == FALSE)
            {
                redirect('user/login');
            }
        }
        
    }
} 
 