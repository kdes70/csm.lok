<?php

class Vacansy_Model extends MY_Model
{   
    protected $_table_name = 'vacansy';
    protected $_primary_key = 'id_vac';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id_vac';
    protected $_timestamps = TRUE;

 	public $rules = array(
 		'title' => array(
 		    'field' => 'title',
 		    'label' => 'title',
 		    'rules' => 'trim|required|xxs_clean'
 		),
        'reason' => array(
            'field' => 'reason',
            'label' => 'reason',
            'rules' => 'trim|required'
        ),
        'count_candidate' => array(
            'field' => 'count_candidate',
            'label' => 'count_candidate',
            'rules' => 'trim|required'
        ),
        'planned_date' => array(
            'field' => 'planned_date',
            'label' => 'planned_date',
            'rules' => 'trim|required'
        ),
        'desc_candidate' => array(
            'field' => 'desc_candidate',
            'label' => 'desc_candidate',
            'rules' => 'trim|required'
        ),
        'education' => array(
            'field' => 'education',
            'label' => 'education',
            'rules' => 'trim|required'
        ),
        'profes_profession' => array(
            'field' => 'profes_profession',
            'label' => 'profes_profession',
            'rules' => 'trim|required'
        ),
        'special_requirement' => array(
            'field' => 'special_requirement',
            'label' => 'special_requirement',
            'rules' => 'trim|required'
        ),
        'other_requirements' => array(
            'field' => 'other_requirements',
            'label' => 'other_requirements',
            'rules' => 'trim|required'
        ),
        'workplace' => array(
            'field' => 'workplace',
            'label' => 'workplace',
            'rules' => 'trim|required'
        ),
        'schedule' => array(
            'field' => 'schedule',
            'label' => 'schedule',
            'rules' => 'trim|required'
        ),
        'nature_work' => array(
            'field' => 'nature_work',
            'label' => 'nature_work',
            'rules' => 'trim|required'
        ),
        'wage_rate' => array(
            'field' => 'wage_rate',
            'label' => 'wage_rate',
            'rules' => 'trim|required'
        ),
        'wage_structure' => array(
            'field' => 'wage_structure',
            'label' => 'wage_structure',
            'rules' => 'trim|required'
        ),
        'additional_terms' => array(
            'field' => 'additional_terms',
            'label' => 'additional_terms',
            'rules' => 'trim|required'
        )
    );



	public function save_vacansy($data = array())
	{

		$id_vac = $this->save($data);
		if($id_vac)
		{
			return $id_vac;
		}

		return FALSE;
	}

	public function get_vacansy()
	{	

		$fields = $this->_table_name.".* , localis.name AS `local`, CONCAT_WS( ' ',users.name,users.surname,users.patronymic )  AS `fio` ";

		$this->db->select($fields);
		$this->db->from($this->_table_name);
		$this->db->join('localis', 'localis.id_local = '.$this->_table_name.'.id_loc');
		$this->db->join('users', 'users.id_user = '.$this->_table_name.'.id_author');
		return $this->db->get()->result();

		
		//var_dump($query);

	}

}