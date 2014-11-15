<?php

class MY_User_Model extends MY_Model
{
	protected $_table_name = 'users';
    protected $_primary_key = 'id_user';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id_user';

    protected $_is_admin = array( 1 =>'admin', 2 =>'moder');
    
    protected $_timestamps = TRUE;

    
 
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		echo 'Hiloy';
	}

	public function admins()
	{
		return $this->_is_admin;
	}

	
}