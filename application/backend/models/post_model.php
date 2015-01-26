<?php

class Post_Model extends MY_Model
{   
    protected $_table_name = 'post';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'strval';
    protected $_order_by = 'id';
    
    protected $_timestamps = TRUE;

    public $rules = array(
		
		'text' => array(
			'field' => 'text', 
			'label' => 'Текст', 
			'rules' => 'trim'
		),
		'title' => array(
            'field' => 'title',
            'label' => 'Заголовок',
            'rules' => 'trim|required|xxs_clean'
        ),
	);




}