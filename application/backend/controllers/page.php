<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends Frontend_Controller{

	public function __construct()
	{
		parent::__construct();
		//Модель page
		$this->load->model('page_model');

	}

/**
 * [index description]
 * @return [type] [description]
 */
	public function index()
	{	
		
		$data['page_manu'] = $this->page_model->get_by(array('section' => 'top'));

		var_dump($data);
	}
/**
 * [show description]
 * @param  [type] $id_page [description]
 * @return [type]          [description]
 */
	public function show($id_page)
	{
		$data = array();

		$data['page_info'] = $this->page_model->get($id_page);

		switch ($id_page) {

			case 'main':

				$view = 'main/main';
				//Подключаем виды для гланой страницы
				$this->display_lib->main_page($view, $data);

				$this->output->enable_profiler(TRUE);
				break;

			case 'news':
				//Подключаем виды для страницы новостей 
				break;
			case 'registration':
				//$data = array();
				// user model
				// 
				// Данные из таблицы Group
				$this->load->model('group_model');
				$this->data['groups'] = $this->group_model->get_by(array('public' => '1'));

				//var_dump($this->data);

				// if(isset($_POST['user_status'])) 
				// получаем данные из таблицы profession	
				$this->load->model('profession_model');
				$this->data['profession'] = $this->profession_model->get();
			
				// views
				$view = 'user/reg_form';
				//Подключаем виды для гланой страницы
				$this->display_lib->reg_page($view, $this->data);

				$this->output->enable_profiler(TRUE);
				break;
			case 'login':

				$view = 'user/login';

				$this->display_lib->user_login($view, $data);
				break;
			// case 'profiles':




			// 	$view = 'user/profiles';
			// 	$this->display_lib->user_login($view, $data);
			// 	break;
			default:
				// Значения по умолчанию
				break;
		}
	}


}

/* End of file page.php */
/* Location: ./application/controllers/page.php */