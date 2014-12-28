<?php

class Callback_Model extends MY_Model
{   
    protected $_table_name = 'callback';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';
    
    protected $_timestamps = TRUE;

    public $rules = array(
		
		'fio' => array(
			'field' => 'fio', 
			'label' => 'ФИО', 
			'rules' => 'trim|required|xxs_clean'
		),
		'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|xxs_clean'
        ),
		'phone' => array(
			'field' => 'phone', 
			'label' => 'Телефон', 
			'rules' => 'trim|required|numeric'
		),
		'comment' => array(
			'field' => 'comment', 
			'label' => 'Текст', 
			'rules' => 'trim|required'
		)
	);

}