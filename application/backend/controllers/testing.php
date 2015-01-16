<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testing extends Frontend_Controller{

    function __construct()
    {
        parent::__construct();

         $this->load->model('testing_model');


       
        // Получаем массив сортированный по родительскому элементу
        $this->data['tree'] = $this->testing_model->tree_array();

        // Если пришел запрос с ответами на тест
         if($this->input->post('test'))
        {   // Записываем ID теста в переменую
            $test = (int)$this->input->post('test');
            // и очишаем массив пост
            unset($_POST['test']);
            //получаем массив с правельными ответами
            $result = $this->testing_model->get_correct_answers($test);
            if(!is_array($result)) exit('Ошибка!');

           // print_r($this->input->post());
            //Данные теста
            $this->data['test_all_data'] = $this->testing_model->test_data_array($test);

            // 1 - массив вопрос/ответы, 2 - правильные ответы, 3 - ответы пользователя
            $test_all_data_result = $this->testing_model->get_test_data_result(
                                                                            $this->data['test_all_data'], 
                                                                            $result, 
                                                                            $this->input->post()
                                                                            );

            echo $this->testing_model->print_result($test_all_data_result);
            die();
        }

       
        $this->load->model('vacansy_model');

        $this->load->helper('csm_helper');

        //Категории
        $this->load->model('category_model');
        $this->data['category'] = $this->category_model->get();

        $this->load->model('resume_model');
        $this->data['new_resume'] = $this->resume_model->get_count_by(array('read'=>'0', 'public'=>'1'));

        foreach ($this->data['category'] as $key =>$value) 
        {

            $this->data['category'][$key] = $value;
            $this->data['category'][$key]->count = $this->vacansy_model->count_vacansy_by_category($value->id);

        }
        
        $this->load->model('page_model');
        $this->data['page'] = $this->page_model->get_by(array('url' => 'testing'), TRUE);
        
        // Список городов
        $this->load->model('city_model');
        $this->data['city'] = $this->city_model->get_by(array('public' => '1'));

       


        //DEbug
        //$this->output->enable_profiler(TRUE);
    }
    
    public function index()
    {

       
        //Получаем дерево категорий
        $this->data['tests'] = $this->testing_model->create_tree($this->data['tree'], 0);
        //print_r($this->data['tests']);
       // dump($this->data['tree']);

        $this->display_lib->view_page('testing/tests', $this->data);

    }

    public function read($id_test)
    {   
            if(!(int)$id_test || !isset($id_test)) 
            {
               return redirect('testing');
            }

            //id выбранного теста
            $this->data['test_id'] = $id_test;
             //Получение массив данных теста
            $this->data['test_data'] = $this->testing_model->test_data_array($id_test);

            //получаем категорию title
            $this->data['test_title'] = $this->testing_model->get_title_in_array($id_test);

            $this->data['count_quest'] = count($this->data['test_data']);
            $this->data['pagin_tabs'] = $this->testing_model->pagin_tabs($this->data['count_quest'], $this->data['test_data']);
            
            // print_r($this->data['test_arr']);
            //dump($this->data['test_title']);
            $this->display_lib->view_page('testing/test_questions', $this->data);
      
        

    }



  
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */