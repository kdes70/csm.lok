<?php
class Admin_Controller extends MY_Controller
{
    function __construct() {
        parent::__construct();
        
        $this->data['meta_title'] = "Админ - панель";
      //  $this->load->helper('form');
        $this->load->library('form_validation');
     //   $this->load->library('session');
        $this->load->model('admin_model');
        
        //Login check
        $exception_uris = array(
            'admin/auth/login', 
            'admin/auth/logout'
            );
        if(in_array(uri_string(),  $exception_uris) == FALSE)
        {
            if ($this->admin_model->loggedin() == FALSE)
            {
                redirect('admin/auth/login');
            }
        }
        
    }
} 
 