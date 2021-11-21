<?php

 
class Updates extends MX_Controller {

    public function __construct() {

      parent::__construct();
        User::logged_in();      
        
        $this->load->module('layouts');
        $this->load->library(array('template'));  
        $this->load->model(array('App','Update')); 
    }


    function index()
    {   
       $this->template->title('Updates '.config_item('company_name'));
      $data['page'] = 'Updates';  
      $this->template
      ->set_layout('users')
      ->build('index',isset($data) ? $data : NULL);		
    }


    
    function version($id)
    {   
       $this->template->title('Update '.config_item('company_name'));
      $data['page'] = 'Version Information';  
      $data['version_notifications_array'] = Update::version($id);
      $this->template
      ->set_layout('users')
      ->build('version',isset($data) ? $data : NULL);		
    }



    function fix ($id)
    {
      if(config_item('version') != $id) 
      {
        $this->session->set_flashdata('response_status', 'warning');
        $this->session->set_flashdata('message', lang('cannot_fix_version'));				
        redirect($_SERVER['HTTP_REFERER']);
      }     
      $this->template->title('Update '.config_item('company_name'));
      $data['page'] = 'Bugs Fixed';      
      $data['version_notifications_array'] = $this->process($id);
      $this->template
      ->set_layout('users')
      ->build('update',isset($data) ? $data : NULL);		
    }
    

    function install($id)
    {   
      if(config_item('version') >= $id) 
      {
        $this->session->set_flashdata('response_status', 'warning');
        $this->session->set_flashdata('message', lang('cannot_install_version'));				
        redirect($_SERVER['HTTP_REFERER']);
      }
      $this->template->title('Update '.config_item('company_name'));
      $data['page'] = 'Update Information';      
      $data['version_notifications_array'] = $this->process($id);
      $this->template
      ->set_layout('users')
      ->build('update',isset($data) ? $data : NULL);		
    }


    function process($id)
    {
      $response = Update::install($id);

      if($response['notification_case'] == "notification_operation_ok")
        {
          $database = Update::database($id);

          if ($database['notification_case'] == "notification_operation_ok")  
            {
                $sql = $database['notification_data'];
                $this->db->simple_query($sql);
            }
        }

        return $response;
    }
 
 

}