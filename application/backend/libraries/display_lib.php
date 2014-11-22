<?php 

/**
* DISPLAY
*/
class Display_lib
{	

	//private $_tpl = 'default'; //папка с видами по умолчанию
    private $_tpl = 'vacansy'; //папка с видами по умолчанию

	
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
    
    /**
     * Функция вида для верстки
     */
    public function view_developer_page()
	{
		$CI =& get_instance();

	    $CI->load->view($this->_tpl.'/index');
		
	}
    
  

 	
 	
		
 
	
}

