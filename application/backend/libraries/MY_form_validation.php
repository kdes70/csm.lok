<?php 

    /**
    * MY VALIDATION FORM CLASS
    */
    class MY_Form_validation extends CI_Form_validation
    {   

        // form login
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
         // form registration
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




        
        function __construct($config = array())
        {
            parent::__construct($config);
        }



        public function error_array()
        {
            if(count($this->_error_array > 0))
            {
                return $this->_error_array;
            }
        }

 
     
    }
            