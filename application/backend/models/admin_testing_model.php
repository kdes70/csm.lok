<?php 

include_once 'testing_model.php';


class Admin_testing_Model extends Testing_Model
{   
    protected $_table_name_test = 'test';
    protected $_table_name_answ = 'answers';
    protected $_table_name_quest = 'questions';

    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';

     protected $_timestamps = TRUE;

   // private $_arr_data = array();

    public $rules = array(
        'test_name' => array(
            'field' => 'test_name',
            'label' => 'Название теста',
            'rules' => 'required|trim'
        ),
        'parent_id' => array(
            'field' => 'parent_id',
            'label' => 'Родительская категория',
            'rules' => 'trim|numeric'
        ),
        );

    public $rules_qest = array(
        'test_qest' => array(
            'field' => 'test_qest',
            'label' => 'Вопрос',
            'rules' => 'required|trim'
        ),
        'answer[]' => array(
            'field' => 'answer[]',
            'label' => 'Вариант ответа',
            'rules' => 'required|trim'
        ),
        );

public function save_qest_aswer($data, $id_test)
{
    dump($data);
    echo $id_test;
    if(!is_array($data) || !isset($id_test)) return FALSE;

       $question = array(
        'question' => $data['test_qest'],
        'parent_test'=> $id_test
        );
       $this->db->insert($this->_table_name_quest, $question);
       $id_qest = $this->db->insert_id();

    if($id_qest)
    {
             $add = array();
       foreach ($data['answer'] as $key => $value) {

        $add[$key]['answer']  = $value;
        if($key == $data['correct_answer'])
        {
             $add[$key]['correct_answer']  = '1';
        }else{
            $add[$key]['correct_answer']  = '0';
        }
       
        $add[$key]['parent_question'] = $id_qest;
        
       }
            
        $this->db->insert_batch($this->_table_name_answ, $add);

    }

    
     
      

         dump($add);

        // print_r($add);
}

 public function array_from_post($fields){
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }


/**
 * Метод выборки всех тестов
 * @return [type] [description]
 */
   public function all_testing()
    {
          return $this->db->get($this->_table_name_test)->result();
    }

/**
 * Метод выборки по ID
 * @param  [type]  $id     [description]
 * @param  [type]  $table  [description]
 * @param  boolean $single [description]
 * @return [type]          [description]
 */
    public function get($id = NULL, $table, $single = FALSE)
    {
        if($id != NULL)
        {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->where($this->_primary_key, $id);
            $method = 'row';
        }
        elseif ($single == TRUE)
        {
            $method = 'row';
        }
        else{
            $method = 'result';
        }
        if(!count($this->db->ar_orderby))
        {
            $this->db->order_by($this->_order_by);
        }
       
        return $this->db->get($table)->$method();
    }


    public function view_public($id_test, $key)
    {   
        if(!$id_test) return FALSE;
        $this->db->set('public', $key);
        $this->db->where($this->_primary_key, $id_test);
        $this->db->update($this->_table_name_test);
    }
/**
 * Метод сортировки массива данных для админки 
 * @return [type] [description]
 */
     public function tree_array_adm()
   {    //Получаем массив данных all_testing() 
        //Если вызываем из админского контроллера то выбираем все
        $arr = $this->all_testing();
        if($arr)
        {
            $tree = array();
            foreach ($arr as $row) {
                // сортированный по родительскому элементу
                $tree[(int) $row->parent_id][] = $row;
            }
            return $tree;
        }
        return FALSE;
   }

    public function select_array_tree($cats, $parent_id)
    {   
         if(is_array($cats) and isset($cats[$parent_id]))
        {  
             $tree = '';
            foreach($cats[$parent_id] as $cat)
            {   
                $select = ($cat->id == $cat->parent_id) ? 'selected="selected"' : NULL; 

                if($cat->parent_id == 0)
                {
                    $tree .= '<option class="option_chaild" value="'.$cat->id.'" '.$select.'  >'.$cat->test_name.'</option>';
                }
                else{
                    $tree .= '<option value="'.$cat->id.'" '.$select.'>'.$cat->test_name.'</option>';
                }
                
                $tree .= $this->select_array_tree($cats, $cat->id);
               
            }

           // $tree .= '</select>';
        } 
        else return NULL;   
    return $tree; 
    }


/**
 * Метод сохранения данных в БД
 * @param  array  $data [description]
 * @return [int]  $id     [description]
 */
      public function save($table, $data, $id = NULL) {

        // Set timestamps
        if ($this->_timestamps == TRUE) {
            $now = date('Y-m-d H:i:s');
            $id || $data['created'] = $now;
            $data['modified'] = $now;
        }

        // Insert
        if ($id === NULL) {
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
            $this->db->set($data);
            $this->db->insert($table);
            $id = $this->db->insert_id();
        }
        // Update
        else {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($table);
        }

        return $id;
    }

}