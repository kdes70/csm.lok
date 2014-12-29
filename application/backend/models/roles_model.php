<?php

class Roles_Model extends MY_Model
{   
    protected $_table_name = 'roles';
    protected $_primary_key = 'id_roles';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id_roles';
    

    public function create_roles()
    {
    	$name = $this->input->post('roles_name');
    	$role = $this->input->post('roles');

    	$data = array(
    		'role' => $role,
    		'roles_name' =>$name,
    		);

    	$id_role = $this->save($data);
    	if($id_role)
    	{
    		return $id_role;
    	}

    	return FALSE;
    }
}