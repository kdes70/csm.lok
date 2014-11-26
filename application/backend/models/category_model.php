<?php

class Category_Model extends MY_Model
{   
    protected $_table_name = 'category';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';
    
    public $rules = array(
        'name' => array(
 		    'field' => 'name',
 		    'label' => 'Наименование рубрики',
 		    'rules' => 'trim|required|xxs_clean'
 		));

    public function get_new()
    {
        $cat = new stdClass();
        
        $cat->name = '';
        return $cat;
    }

}