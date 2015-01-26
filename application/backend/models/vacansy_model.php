<?php

class Vacansy_Model extends MY_Model
{   
    protected $_table_name = 'vacansy';
    protected $_primary_key = 'id_vac';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'modified DESC';
    protected $_timestamps = TRUE;

 	public $rules = array(
        'city' => array(
            'field' => 'city',
            'label' => 'Город',
            'rules' => 'required|integer|numeric|callback__is_null'
        ),
        'id_cat' => array(
            'field' => 'id_cat',
            'label' => 'Рубрика',
            'rules' => 'required|integer|numeric|callback__is_null'
        ),
        'id_type' => array(
            'field' => 'id_type',
            'label' => 'Тип вакансии',
            'rules' => 'required|integer|numeric'
        ),
        'id_loc' => array(
            'field' => 'id_loc',
            'label' => 'Подразделение/Отдел',
            'rules' => 'integer|numeric'
        ),
        'author' => array(
            'field' => 'author',
            'label' => 'Контактное лицо',
            'rules' => 'trim|required|xxs_clean'
        ),
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|xxs_clean'
        ),
        'phone' => array(
            'field' => 'phone',
            'label' => 'Телефон',
            'rules' => 'trim|required|xxs_clean'
        ),
 		'title' => array(
 		    'field' => 'title',
 		    'label' => 'Наименование вакансии',
 		    'rules' => 'trim|required|xxs_clean'
 		),
        'reason' => array(
            'field' => 'reason',
            'label' => 'reason',
            'rules' => 'trim'
        ),
       /* 'count_candidate' => array(
            'field' => 'count_candidate',
            'label' => 'count_candidate',
            'rules' => 'trim|required'
        ),
        'planned_date' => array(
            'field' => 'planned_date',
            'label' => 'planned_date',
            'rules' => 'trim|required'
        ),*/
        'desc_candidate' => array(
            'field' => 'desc_candidate',
            'label' => 'desc_candidate',
            'rules' => 'trim'
        ),
        'education' => array(
            'field' => 'education',
            'label' => 'education',
            'rules' => 'trim'
        ),
        'profes_profession' => array(
            'field' => 'profes_profession',
            'label' => 'profes_profession',
            'rules' => 'trim'
        ),
        'special_requirement' => array(
            'field' => 'special_requirement',
            'label' => 'special_requirement',
            'rules' => 'trim|required'
        ),
        'other_requirements' => array(
            'field' => 'other_requirements',
            'label' => 'other_requirements',
            'rules' => 'trim'
        ),
        'workplace' => array(
            'field' => 'workplace',
            'label' => 'workplace',
            'rules' => 'trim'
        ),
        'schedule' => array(
            'field' => 'schedule',
            'label' => 'schedule',
            'rules' => 'trim'
        ),
        'nature_work' => array(
            'field' => 'nature_work',
            'label' => 'nature_work',
            'rules' => 'trim'
        ),
        'wage_rate' => array(
            'field' => 'wage_rate',
            'label' => 'wage_rate',
            'rules' => 'trim'
        ),
        'wage_structure' => array(
            'field' => 'wage_structure',
            'label' => 'wage_structure',
            'rules' => 'trim'
        ),
        'additional_terms' => array(
            'field' => 'additional_terms',
            'label' => 'additional_terms',
            'rules' => 'trim'
        ),
         'priority' => array(
            'field' => 'priority',
            'label' => 'Приоритет',
            'rules' => ''
        )
    );
    
    public function get_new ()
    {
        $vacansy = new stdClass();
        $vacansy->city = '';
        $vacansy->id_cat = '';
        $vacansy->id_loc = '';
        $vacansy->id_type = '';
        $vacansy->author = '';
        $vacansy->email = '';
        $vacansy->phone = '';
        $vacansy->title = '';
        $vacansy->reason = '';
        $vacansy->desc_candidate = '';
        $vacansy->education = '';
        $vacansy->profes_profession = '';
        $vacansy->special_requirement = '';
        $vacansy->other_requirements = '';
        $vacansy->workplace = '';
        $vacansy->schedule = '';
        $vacansy->nature_work = '';
        $vacansy->wage_rate = '';
        $vacansy->wage_structure = '';
        $vacansy->additional_terms = '';
        return $vacansy;
    }

	public function save_vacansy($data = array())
	{

		$id_vac = $this->save($data);
		if($id_vac)
		{
			return $id_vac;
		}

		return FALSE;
	}

    public function count_vacansy_by_category($cat)
    {
        return $this->db
            ->where('id_cat', $cat)
            ->count_all_results($this->_table_name);
    }

    public function count_all($where)
    {
        return  $this->db
                ->where($where)
                //->from($this->_table_name)
               // ->join('category', 'category.id = '.$this->_table_name.'.id_cat')
               // ->join('city', 'city.id_city = '.$this->_table_name.'.city')
                ->count_all_results($this->_table_name);
    }

    public function get_vacansy_by($where, $limit = NULL, $single = FALSE)
    {
        $this->db->where($where);
        return $this->get_vacansy(NULL, $limit, $single);
    }

	public function get_vacansy($id = NULL, $limit = NULL, $single = FALSE)
	{	
        if($id != NULL)
        {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->where($this->_primary_key, $id);
            $method = 'row';
        }
        if ($single == TRUE)
        {
            $method = 'row';
        }
        else{
            $method = 'result';
        }
       


		$fields = $this->_table_name.".* , category.name AS `cat`, city.name AS `cityname` ";

		$this->db->select($fields);
		$this->db->from($this->_table_name);
		$this->db->join('category', 'category.id = '.$this->_table_name.'.id_cat');
		$this->db->join('city', 'city.id_city = '.$this->_table_name.'.city');
        $this->db->order_by($this->_order_by); 
        if($limit != NULL)
        {
            $this->db->limit($limit);
        }

		return $this->db->get()->$method();

		
		//var_dump($query);

	}

    

}