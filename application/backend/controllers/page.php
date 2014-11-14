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
				$this->display_lib->view_page($view, $data);

				$this->output->enable_profiler(TRUE);
				break;
			case 'tests':

				$this->load->model('user_model');

			  	if($this->user_model->loggedin() == FALSE)
		        {
		           redirect('page/show/main');
		        } 

				$view = 'tests/show';

				$this->display_lib->user_login($view, $data);
			break;

			case 'news':
				//Подключаем виды для страницы новостей 
				break;
			case 'registration':
			
				break;
			case 'vacansy':


			$this->load->model('localis_model');
			$data['local'] = $this->localis_model->get();

			$this->load->model('vacansy_model');
			$data['vac'] = $this->vacansy_model->get_by(array('public' => '1'));

			
			$view = 'vacansy/vacansy';
			$this->display_lib->view_page($view, $data);
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