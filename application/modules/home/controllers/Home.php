<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {

    function __construct()
    {
        parent::__construct();   
        $lang = config_item('default_language');
        if (isset($_COOKIE['fo_lang'])) { 
            $lang = $_COOKIE['fo_lang']; 
        }
        if ($this->session->userdata('lang')) { 
            $lang = $this->session->userdata('lang'); 
        }
        $this->lang->load('hd', $lang);

        $this->load->model(array('App', 'Page'));
        $this->load->module('layouts');
        $this->load->library('template'); 
        if (!$this->session->userdata('cart')) {
            $this->session->set_userdata('cart', array());
        }
 
    }  


    function index()
    {        
        $data['content'] = $this->Page->get_by_slug('home', TRUE, TRUE);
        $this->template->title('home');     
        $this->template->set_breadcrumb('home');
        $data['page'] = $data['content']->title;  
        $data['datatables'] = TRUE;        
        $this->template->set_theme(config_item('active_theme'));
        $this->template->set_partial('header', 'sections/header');
        $this->template->set_partial('footer', 'sections/footer');
        $this->template
        ->set_layout('main')
        ->build('home', isset($data) ? $data : NULL);
    }
 
}

/* End of file home.php */