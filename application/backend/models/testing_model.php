<?php

class Testing_Model extends CI_Model
{   
    protected $_table_name_test = 'test';
    protected $_table_name_answ = 'answers';
    protected $_table_name_quest = 'questions';

    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';

    private $_arr_data = array();

/**
 * Получение списка тестов
 * @return object 
 */
   protected function _get_tests() 
   {
        return $this->db->where("public = '1'")->get($this->_table_name_test)->result();
   }


/**
 * Сортируем массив в дрововидный вид 
 * сортированный по родительскому элементу
 * @return [type] [description]
 */
   public function tree_array()
   {    //Получаем массив данных _get_tests() 
        $this->_arr_data['test'] = $this->_get_tests();

        if($this->_arr_data['test'])
        {
            $tree = array();

            foreach ($this->_arr_data['test'] as $row) {
                // сортированный по родительскому элементу
                $tree[(int) $row->parent_id][] = $row;
            }
            return $tree;
        }
        return FALSE;
   }


/**
 * Рекурсивный метод формирования древовидных категорий
 * @param  [type] $cats      [description]
 * @param  [type] $parent_id [description]
 * @return [type]            [description]
 */
    public function create_tree($cats, $parent_id, $is_admin = FALSE)
    {   
        if(is_array($cats) and isset($cats[$parent_id]))
        {   //Если есть админ то меняем адрес
            $url = $is_admin === TRUE? 'admin/testing/edit/':'testing/read/';

            $tree = '<ul>';
            foreach($cats[$parent_id] as $cat)
            {   
                if($cat->parent_id == 0)
                {
                    $tree .= "<li class='parent'><a href='".base_url($url.$cat->id)."'>".$cat->test_name."</a>";
                }
                else{
                    $tree .= "<li class='child'><a href='".base_url($url.$cat->id)."'>".$cat->test_name."</a>";
                }
                
                $tree .= $this->create_tree($cats, $cat->id);
                $tree .= '</li>';
            }

            $tree .= '</ul>';
        } 
        else return NULL;          
    return $tree;        
    } 

/**
 * Получение данных теста
 * @param  [type] $test_id [description]
 * @return [type]          [description]
 */
    public function get_test_data($test_id)
    {
        if(!$test_id) return FALSE;

       return $this->db->select('q.question, q.parent_test, a.id, a.answer, a.parent_question')
                        ->from($this->_table_name_quest.' q')
                        ->join($this->_table_name_answ. ' a', 'q.id = a.parent_question', 'left')
                        ->join($this->_table_name_test.' t','t.id = q.parent_test', 'left')
                        ->where('q.parent_test', $test_id)
                        ->where('t.public', '1')
                        ->get()->result();
    }
/**
 * Формируем массив данных теста
 * @param  array  $data [description]
 * @return [type]       [description]
 */
    public function test_data_array($test_id)
    {   
        $data = array();
        // Получение данных теста
        $data = $this->get_test_data($test_id);

       if(is_array($data))
       {    $arr = NULL;
           foreach ($data as $row) {
                if(!$row->parent_question) return FALSE;

                $arr[$row->parent_question][0] = $row->question; //вопросы
                $arr[$row->parent_question][$row->id] = $row->answer; // Варианты ответов к вопросу
               // $arr[$row->parent_question]
           }

           return $arr;
       }
       return FALSE;
    }
   
/**
 * Поиск заголовка теста в массиве
 * @param  [type] $keys [description]
 * @return [type]       [description]
 */
    public function get_title_in_array($keys)
    {
        if(is_array($this->_arr_data['test']))
        {  
            foreach ($this->_arr_data['test'] as $value) 
            {   // Если ID совподает с выбранным тестом возрошаем его название
                if($value->id == $keys)
                {
                   return $value->test_name;
                }
            }
        } 
        return FALSE;
    }


/**
 * Функция погинации табов
 * @param  [type] $count    [description]
 * @param  [type] $data_arr [description]
 * @return [type]           [description]
 */
    public function pagin_tabs($count, $data_arr)
    {   //Выбараем все клучи массива
        if(!$data_arr) return FALSE;

        $keys = array_keys($data_arr);

        $pagin = '<div class="tabs">';
            for ($i= 1; $i <= $count; $i++) { 
                $key = array_shift($keys);
                if($i == 1)
                {
                    $pagin .= '<a class="tab-active" href="#question-'.$key.'" title="'. $i .'">'. $i .'</a>';
                }else{
                     $pagin .= '<a href="#question-'.$key.'" title="'. $i .'">'. $i .'</a>';
                }
            }
        $pagin .= '</div>';

        return $pagin;
    }

    public function get_correct_answers($test)
    {
        if(!$test) return FALSE;

        $result = $this->db->select('q.id AS question_id, a.id AS answer_id')
                        ->from($this->_table_name_quest.' q')
                        ->join($this->_table_name_answ. ' a', 'q.id = a.parent_question', 'left')
                        ->join($this->_table_name_test.' t','t.id = q.parent_test', 'left')
                        ->where('q.parent_test', $test)
                        ->where('a.correct_answer', '1')
                        ->where('t.public', '1')
                        ->get()->result();
           if($result){
              return $this->create_answer_cerrect_array($result);
           }             
       
       return FALSE;

    }
/**
 * Метод получения массива правельных ответов 
 * @param  [type] $arr [description]
 * @return [type]      [description]
 */
    public function create_answer_cerrect_array($arr)
    {
        if(!is_array($arr)) return FALSE;

        $data = NULL;
        foreach ($arr as $row) {
            $data[$row->question_id] = $row->answer_id;
        }

       return $data; 
    }

    public function get_test_data_result($test_all_data, $result, $post)
    {
        if(!$test_all_data || !$result || !$post) return FALSE;
       // заполняем массив $test_all_data правильными ответами и данными о неотвеченных вопросах
        foreach($result as $q => $a){
            $test_all_data[$q]['correct_answer'] = $a;
            // добавим в массив данные о неотвеченных вопросах
            if( !isset($post[$q]) ){
                $test_all_data[$q]['incorrect_answer'] = 0;
            }
        }

            // добавим неверный ответ, если таковой был
        foreach($post as $q => $a){
            // удалим из POST "левые" значения вопросов
            if( !isset($test_all_data[$q]) ){
                unset($post[$q]);
                continue;
            }

            // если есть "левые" значения ответов
            if( !isset($test_all_data[$q][$a]) ){
                $test_all_data[$q]['incorrect_answer'] = 0;
                continue;
            }

            // добавим неверный ответ
            if( $test_all_data[$q]['correct_answer'] != $a ){
                $test_all_data[$q]['incorrect_answer'] = $a;
            }
        }
        return $test_all_data;
        }


/**
 * Метод печати результатов
 * @param  [type] $test_all_data_result [description]
 * @return [type]                       [description]
 */
    public function print_result($test_all_data_result)
    {
        if(!$test_all_data_result)return FALSE;
    // переменные результатов
    $all_count = count($test_all_data_result); // кол-во вопросов
    $correct_answer_count = 0; // кол-во верных ответов
    $incorrect_answer_count = 0; // кол-во неверных ответов
    $percent = 0; // процент верных ответов

    // подсчет результатов
    foreach($test_all_data_result as $item){
        if( isset($item['incorrect_answer']) ) $incorrect_answer_count++;
    }
    $correct_answer_count = $all_count - $incorrect_answer_count;
    $percent = round( ($correct_answer_count / $all_count * 100), 2);

    // вывод результатов
    $print_res = '<div class="questions">';
        $print_res .= '<div class="count-res">';
            $print_res .= "<p>Всего вопросов: <b>{$all_count}</b></p>";
            $print_res .= "<p>Из них отвечено верно: <b>{$correct_answer_count}</b></p>";
            $print_res .= "<p>Из них отвечено неверно: <b>{$incorrect_answer_count}</b></p>";
            $print_res .= "<p>% верных ответов: <b>{$percent}</b></p>";
        $print_res .= '</div>'; // .count-res

        // вывод теста...
        foreach($test_all_data_result as $id_question => $item){ // получаем вопрос + ответы
            $correct_answer = $item['correct_answer'];
            $incorrect_answer = null;
            if( isset($item['incorrect_answer']) ){
                $incorrect_answer = $item['incorrect_answer'];
                $class = 'question-res error';
            }else{
                $class = 'question-res ok';
            }
            $print_res .= "<div class='$class'>";
            foreach($item as $id_answer => $answer){ // проходимся по массиву ответов
                if( $id_answer === 0 ){
                    // вопрос
                    $print_res .= "<p class='q'>$answer</p>";
                }elseif( is_numeric($id_answer) ){
                    // ответ
                    if( $id_answer == $correct_answer ){
                        // если это верный ответ
                        $class = 'a ok2';
                    }elseif( $id_answer == $incorrect_answer ){
                        // если это неверный ответ
                        $class = 'a error2';
                    }else{
                        $class = 'a';
                    }
                    $print_res .= "<p class='$class'>$answer</p>";
                }
            }
            $print_res .= '</div>'; // .question-res
        }

    $print_res .= '</div>'; // .questions

    return $print_res;
}

}