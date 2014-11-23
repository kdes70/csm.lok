<?php

class Category_Model extends MY_Model
{   
    protected $_table_name = 'category';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';
  //  protected $_sub_table_name = 'roles_group';

}