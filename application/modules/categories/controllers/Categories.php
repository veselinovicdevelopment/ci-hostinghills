<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');




class Clients extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		User::logged_in();
		
		$this->load->model(array('App','Order','Client','Ticket','Invoice'));

		if (User::is_admin()) {
			redirect('dashboard');
		}
		
		$this->applib->set_locale();
	}

	function index()
	{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->template->title(lang('welcome').' - '.config_item('company_name'));
	$data['page'] = lang('dashboard');
	$this->template
	->set_layout('users')
	->build('client_area',isset($data) ? $data : NULL);
	}
}

/* End of file clients.php */