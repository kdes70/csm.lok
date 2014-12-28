<?php

class Resume_Model extends MY_Model
{   
    protected $_table_name = 'resume';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id DESC';
    protected $_timestamps = TRUE;

 	public $rules_resume_vrach = array(
       /* 'city' => array(
            'field' => 'city',
            'label' => 'Город',
            'rules' => 'required|integer|numeric|callback__is_null'
        ),*/
        'surname' => array(
            'field' => 'surname',
            'label' => 'Фамилия',
            'rules' => 'trim|required|xxs_clean'
        ),
        'name' => array(
            'field' => 'name',
            'label' => 'Имя',
            'rules' => 'trim|required|xxs_clean'
        ),
        'patronymic' => array(
            'field' => 'patronymic',
            'label' => 'Отчество',
            'rules' => 'trim|required|xxs_clean'
        ),
        'sel_date' => array(
            'field' => 'sel_date',
            'label' => 'Дата рождения',
            'rules' => 'trim|required|xxs_clean'
        ),
         'sel_month' => array(
            'field' => 'sel_month',
            'label' => 'Дата рождения',
            'rules' => 'trim|required|xxs_clean'
        ),
          'sel_year' => array(
            'field' => 'sel_year',
            'label' => 'Дата рождения',
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
 		'institution' => array(
 		    'field' => 'institution',
 		    'label' => 'Название учебного заведения',
 		    'rules' => 'trim|required|xxs_clean'
 		),
        'to' => array(
            'field' => 'to',
            'label' => 'Периуд обучения',
            'rules' => 'trim|required|xxs_clean'
        ),
        'up' => array(
            'field' => 'up',
            'label' => 'Периуд обучения',
            'rules' => 'trim|required|xxs_clean'
        ),
        'specialty' => array(
            'field' => 'specialty',
            'label' => 'Специальность',
            'rules' => 'trim|required|xxs_clean'
        ),
        'status' => array(
            'field' => 'status',
            'label' => 'Статус',
            'rules' => 'trim'
        ),
        'main_specialty' => array(
            'field' => 'main_specialty',
            'label' => 'Основная специальность',
            'rules' => 'trim'
        ),
        /*'extra_specialty' => array(
            'field' => 'extra_specialty',
            'label' => 'Дополнительная специальность',
            'rules' => 'trim|xxs_clean'
        ),*/
        'extra_actions' => array(
            'field' => 'extra_actions',
            'label' => 'Дополнительные действия',
            'rules' => 'trim|xxs_clean'
        ),
        'work_experience' => array(
            'field' => 'work_experience',
            'label' => 'Опыт работы',
            'rules' => 'trim|xxs_clean'
        )
    );


    public $rules_resume = array(
        'surname' => array(
            'field' => 'surname',
            'label' => 'Фамилия',
            'rules' => 'trim|required|xxs_clean'
        ),
        'name' => array(
            'field' => 'name',
            'label' => 'Имя',
            'rules' => 'trim|required|xxs_clean'
        ),
        'patronymic' => array(
            'field' => 'patronymic',
            'label' => 'Отчество',
            'rules' => 'trim|required|xxs_clean'
        ),
        'sel_date' => array(
            'field' => 'sel_date',
            'label' => 'Дата рождения',
            'rules' => 'trim|required|xxs_clean'
        ),
         'sel_month' => array(
            'field' => 'sel_month',
            'label' => 'Дата рождения',
            'rules' => 'trim|required|xxs_clean'
        ),
          'sel_year' => array(
            'field' => 'sel_year',
            'label' => 'Дата рождения',
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
        'institution' => array(
            'field' => 'institution',
            'label' => 'Название учебного заведения',
            'rules' => 'trim|required|xxs_clean'
        ),
        'to' => array(
            'field' => 'to',
            'label' => 'Периуд обучения',
            'rules' => 'trim|xxs_clean'
        ),
        'up' => array(
            'field' => 'up',
            'label' => 'Периуд обучения',
            'rules' => 'trim|xxs_clean'
        ),
        'specialty' => array(
            'field' => 'specialty',
            'label' => 'Специальность',
            'rules' => 'trim|required|xxs_clean'
        ),
        'status' => array(
            'field' => 'status',
            'label' => 'Статус',
            'rules' => 'trim'
        ),
        'main_specialty' => array(
            'field' => 'main_specialty',
            'label' => 'Основная специальность',
            'rules' => 'trim'
        ),
/*        'extra_specialty' => array(
            'field' => 'extra_specialty',
            'label' => 'Дополнительная специальность',
            'rules' => 'trim|xxs_clean'
        ),*/
        'extra_actions' => array(
            'field' => 'extra_actions',
            'label' => 'Дополнительные действия',
            'rules' => 'trim|xxs_clean'
        ),
        'work_experience' => array(
            'field' => 'work_experience',
            'label' => 'Опыт работы',
            'rules' => 'trim|xxs_clean'
        )
    );
    
    public function countResume()
    {       
        
    }
   
	
	
    

}