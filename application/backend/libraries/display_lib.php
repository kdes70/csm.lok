<?php 

/**
* DISPLAY
*/
class Display_lib
{	

	private $_tpl = 'default'; //папка с видами по умолчанию

	
	public function view_page($view, $data)
	{
		$CI =& get_instance();

		
	 	$CI->load->view($this->_tpl.'/blocks/doctype', $data);
	    $CI->load->view($this->_tpl.'/blocks/header');
	    $CI->load->view($this->_tpl.'/blocks/menu');
	    $CI->load->view($this->_tpl.'/blocks/left_block');
	 	$CI->load->view($this->_tpl.'/'.$view, $data);
	 	$CI->load->view($this->_tpl.'/blocks/right_block');
	    $CI->load->view($this->_tpl.'/blocks/footer');
		
	}


	public function reg_page($view, $data)
	{
		$CI =& get_instance();

		
 	$CI->load->view($this->_tpl.'/blocks/doctype', $data);
    $CI->load->view($this->_tpl.'/blocks/header');
    $CI->load->view($this->_tpl.'/blocks/menu');
 	$CI->load->view($this->_tpl.'/'.$view, $data);
    $CI->load->view($this->_tpl.'/blocks/footer');
	 //    $CI->load->view($view, $data);
	 //    $CI->load->view('/footer');
	}

	public function user_login($view, $data)
	{
		$CI =& get_instance();

		
 	$CI->load->view($this->_tpl.'/blocks/doctype', $data);
    $CI->load->view($this->_tpl.'/blocks/header');
    $CI->load->view($this->_tpl.'/blocks/menu');
 	$CI->load->view($this->_tpl.'/'.$view, $data);
    $CI->load->view($this->_tpl.'/blocks/footer');
	 //    $CI->load->view($view, $data);
	 //    $CI->load->view('/footer');
	}

	public function user_profile($view, $data)
	{
		$CI =& get_instance();

		
 	$CI->load->view($this->_tpl.'/blocks/doctype', $data);
    $CI->load->view($this->_tpl.'/blocks/header');
    $CI->load->view($this->_tpl.'/blocks/menu');
 	$CI->load->view($this->_tpl.'/'.$view, $data);
    $CI->load->view($this->_tpl.'/blocks/footer');
	 //    $CI->load->view($view, $data);
	 //    $CI->load->view('/footer');
	}

	public function admin_login($view, $data)
	{
		$CI =& get_instance();

		
 	
 	$CI->load->view('admin/'.$view, $data);
   
	 //    $CI->load->view($view, $data);
	 //    $CI->load->view('/footer');
	}

	public function dashboard($view, $data)
	{
		$CI =& get_instance();

 	$CI->load->view('admin/'.$view, $data);
  
	}
	
	
}

 ?>