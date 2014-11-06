<?php

class Profession_Model extends MY_Model
{   
    protected $_table_name = 'profession';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'strval';
    protected $_order_by = 'name';
    protected $_rules = array();
    protected $_timestamps = FALSE;

}