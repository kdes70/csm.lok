<?php

class Group_Model extends MY_Model
{   
    protected $_table_name = 'groups';
    protected $_primary_key = 'id_group';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id_group';
    
}