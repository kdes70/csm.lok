<?php

class Page_Model extends MY_Model
{   
    protected $_table_name = 'pages';
    protected $_primary_key = 'url';
    protected $_primary_filter = 'strval';
    protected $_order_by = 'id_page';
    
    protected $_timestamps = FALSE;

    public $rules = array(
		
		'text' => array(
			'field' => 'text', 
			'label' => 'Текст', 
			'rules' => 'trim'
		)
	);

}