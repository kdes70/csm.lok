<?php

class Roles_Model extends MY_Model
{   
    protected $_table_name = 'roles';
    protected $_primary_key = 'id_roles';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id_roles';
    protected $_sub_table_name = 'roles_group';
    


    public function get_roles()
    {
    	return $this->get();
    }
    
    
    


}