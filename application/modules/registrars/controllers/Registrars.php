<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Registrars extends MX_Controller {

	function __construct()
	{		
		parent::__construct();	
		User::logged_in();
		$this->load->module('layouts');	
		$this->load->library(array('template','form_validation'));
        $this->load->model(array('App'));  
    }
    


	function index($id = null)
	{		
        $this->template->title(lang('servers'));
        $data['page'] = lang('domain_registrars');	
        $data['datatables'] = TRUE; 
        $this->template
        ->set_layout('users')
        ->build('index',isset($data) ? $data : NULL);       
    }


    function resellerclub(){ 
        $data = array();
       $this->load->view('modal/resellerclub', $data); 
    }


    function namecheap(){ 
        $data = array();
        $this->load->view('modal/namecheap', $data); 
     }


     function domainscoza(){ 
        $data = array();
        $this->load->view('modal/domainscoza', $data); 
     }


}

/* End of file Servers.php */