<?php

class Group_Model extends MY_Model
{   
    protected $_table_name = 'groups';
    protected $_table_role_name = 'roles_group';
    protected $_primary_key = 'id_group';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id_group';
    

    public function create_group_roles($group, $role)
    {
    	$data = array(
    		'id_group' => $group,
    		'id_role' => $role,
    		);

    	if($this->db->insert($this->_table_role_name, $data))
    	{
    		return TRUE;
    	} 

    	return FALSE;
    }

}