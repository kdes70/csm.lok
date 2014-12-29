<?php

class Permissions_Model extends MY_Model
{   
    protected $_table_name = 'permissions';
    protected $_primary_key = 'id_perm';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id_perm';
    
}