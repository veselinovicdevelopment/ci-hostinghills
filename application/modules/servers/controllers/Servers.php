<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Servers extends MX_Controller {

	function __construct()
	{		
		parent::__construct();	
		User::logged_in();

		$this->load->module('layouts');	
		$this->load->library(array('template'));
        $this->load->model(array('App'));  
    }
    
    

	function index($id = null)
	{		
        if($id) {
            $server = $this->db->where(array('id'=> $id))->get('servers')->row(); 
            $response = $this->test_server($id);
            $data['response'] = $server->name  .": ". $response;
        }
        $this->template->title(lang('servers'));
        $data['page'] = lang('servers');	
        $data['datatables'] = TRUE; 
        $this->template
        ->set_layout('users')
        ->build('index',isset($data) ? $data : NULL);       
    }


    
    function add_server(){
        if ($this->input->post()) {
            Applib::is_demo();

                $_POST['selected'] = ($this->input->post('selected') == 'on') ? 1 : 0;
                $_POST['use_ssl'] = ($this->input->post('use_ssl') == 'on') ? 'Yes' : 'No';
                if(App::save_data('servers', $this->input->post())){
                    $this->session->set_flashdata('response_status', 'success');
                    $this->session->set_flashdata('message', lang('server_added'));
                    redirect($_SERVER['HTTP_REFERER']);                
                }
            } 
        else{
            $this->load->view('modal/add_server');
        }     
    }



    function edit_server($id = null){

        if ($this->input->post()) {
            Applib::is_demo();

            if($this->input->post('selected') == 'on') {
                    $this->db->set('selected', 0); 
                    $this->db->where('selected', 1);  
                    $this->db->update('servers');                       
            }                        
                $update = array(
                    "type" => $this->input->post('type'),
                    "name" => $this->input->post('name'),
                    "selected" => ($this->input->post('selected') == 'on') ? 1 : 0,
                    "use_ssl" => ($this->input->post('use_ssl') == 'on') ? 'Yes' : 'No',
                    "hostname" => $this->input->post('hostname'),
                    "port" => $this->input->post('port'),			
                    "username" => $this->input->post('username'),
                    "authkey" => $this->input->post('authkey')
                ); 
                
                $this->db->where('id', $id);  
                if($this->db->update('servers', $update)) {
                    $this->session->set_flashdata('response_status', 'success');
                    $this->session->set_flashdata('message', lang('server_edited'));
                    redirect($_SERVER['HTTP_REFERER']);  
                }           
        } 
        else{
            $data['data'] = $this->db->where(array('id'=> $id))->get('servers')->row();
            $this->load->view('modal/edit_server', $data);
        }
    }



    function delete_server($id = NULL){
        if ($this->input->post() ){
            Applib::is_demo();
            $server_id = $this->input->post('id', TRUE);
            App::delete('servers',array('id' => $server_id));

            $this->session->set_flashdata('response_status', 'success');
            $this->session->set_flashdata('message', lang('server_deleted'));
            redirect($_SERVER['HTTP_REFERER']);
        }
        else{
            $data['id'] = $id;
            $this->load->view('modal/delete_server',$data);
        }
        
    }



    function create_order($item, $co_id, $a, $id)
    {
        $items = array(
            'invoice_id' 	=> 0,
            'item_name'		=> $item->item_name,
            'item_desc'		=> '-',
            'unit_cost'		=> $item->unit_cost,
            'item_order'	=> 1,
            'item_tax_rate'	=> $item->item_tax_rate,
            'item_tax_total'=> $item->item_tax_total,
            'quantity'		=> 1,
            'total_cost'	=> $item->total_cost,
            );
            
        $item_id = App::save_data('items', $items);

        $time = strtotime($a['startdate']);
        $date = gmdate("Y-m-d", $time);


        $order = array(
            'client_id' 	=> $co_id,
            'invoice_id'    => 0,
            'date'          => date('Y-m-d H:i:s'),
            'nameservers'	=> "",
            'item'		    => $item_id,
            'domain'        => $a['domain'],
            'item_parent'   => $item->item_id,
            'type'		    => 'hosting',
            'process_id'    => $time,
            'order_id'      => $time,
            'fee'           => 0,
            'processed'     => $date,
            'username'      => $a['user'],
            'password'      => $a['pass'],
            'renewal_date'  => $date,
            'status_id'     => 6,
            'server'        => $id,
            'renewal'       => ''
        );                                    

        return App::save_data('orders', $order); 
    }



    function test_server($id){

            $server = $this->db->where(array('id'=> $id))->get('servers')->row(); 

            if($server->type == 'cpanel') 
            {
                $params = array(
                    'user' => trim($server->username)
                ); 

                $this->load->library('Cpanel', trim($server->authkey));	
                $response = $this->cpanel->call('accountsummary', $params);
                return (isset($response['metadata']['reason'])) ? $response['metadata']['reason'] : 'Connection Failed!'; 
            }	


            if($server->type == 'directadmin') 
            { 			
                $req = array('user' => $server->username);
                $this->load->library('DirectAdmin', trim($server->authkey));			
                $response = $this->directadmin->query("CMD_API_SHOW_DOMAINS", $req, "GET");
                return (empty($response) || isset($response[0])) ? 'OK' : ((is_array($response) && !isset($response[0])) ? 'USE SSL' : '');
            }


            if($server->type == 'plesk') 
            { 
                $this->load->library('Plesk', trim($server->authkey)); 
                return $this->plesk->checkConnection();
            } 
 
    }



     function import($id = NULL){

        $list = array();       
        $server = $this->db->where(array('id'=> $id))->get('servers')->row();
        $count = 0;	

        if($server->type == 'plesk') 
        { 
            try {
                $this->load->library('Plesk', trim($server->authkey)); 
                $response = $this->plesk->getAccounts();   
                $response = json_encode($response);
                $response = json_decode($response, true);            
                        
                    if(is_array($response['result'])){
                        foreach($response['result'] as $key => $acc) {   
                            foreach($acc['data']['hosting']['vrt_hst']['property'] as $prop) {
                                if($prop['name'] == 'ftp_login') {
                                    $response['result'][$key]['user'] = $prop['value'];
                                }

                                if($prop['name'] == 'ftp_password') {
                                    $response['result'][$key]['pass'] = $prop['value'];
                                }
                            }             
                            $customer = $this->plesk->getCustomer($acc['data']['gen_info']['owner-id']);
                            $customer = json_encode($customer);
                            $customer = json_decode($customer, true); 
                            $response['result'][$key]['email'] = $customer['result']['data']['gen_info']['email'];   
                            $response['result'][$key]['startdate'] = $acc['data']['gen_info']['cr_date'];
                            $response['result'][$key]['domain'] = $acc['data']['gen_info']['name'];     
                            $plan = $this->plesk->getPlan($acc['data']['subscriptions']['subscription']['plan']['plan-guid']);
                            $plan = json_encode($plan);
                            $plan = json_decode($plan, true);
                            $response['result'][$key]['plan'] = $plan['name'];  
                            unset($response['result'][$key]['data']);
                        }
                 
                        $list = $response['result'];                    
                    } 

                }
            catch (Exception $e) {
                    $list = 'Error: '. $e->getMessage();  
                }  

        } 



        if($server->type == 'directadmin') 
        { 			
            $req = array('user' => $server->username);

            try {
                $this->load->library('DirectAdmin', trim($server->authkey));			
                $response = $this->directadmin->query("CMD_API_SHOW_USERS", $req, "GET");              
                if(is_array($response)){
                    foreach($response as $acc) { 
                        $req = array('user' => $acc);		
                        $response = $this->directadmin->query("CMD_API_SHOW_USER_CONFIG", $req, "GET");
                        if(is_array($response)) { 
                            $response['user'] = $response['username'];
                            $response['plan'] = $response['package'];
                            $response['startdate'] = $response['date_created'];
                            $response['pass'] = '';
                            $list[] = $response;
                        }
                    }
                }

              } catch (Exception $e) {
                 $list = 'Error: '. $e->getMessage();  
              } 
        }



        
        if($server->type == 'cpanel') 
        {
            $params = array(
                'user' => trim($server->username)
            ); 

            try {
                $this->load->library('Cpanel', trim($server->authkey));	
                $response = $this->cpanel->call('listaccts', $params);
                $list = (is_array($response['data']['acct'])) ? $response['data']['acct'] : ['metadata']['reason']; 
                if(is_array($list)) {
                    foreach($list as $key => $li){
                        $list[$key]['pass'] = '';
                    }
                }

              } catch (Exception $e) {
                 $list = 'Error: '. $e->getMessage();  
              }
        }
  

        $accounts = $this->db->where(array('type' => 'hosting', 'status_id' => 6))
                    ->join('companies', 'companies.co_id = orders.client_id')
                    ->get('orders')->result();  

        $clients = $this->db->where(array('co_id >' => 1))->get('companies')->result(); 

        if($this->input->post() && is_array($list)) {            
            foreach($this->input->post() as $key => $domain) {
                foreach($list as $k => $a) {
                    if($a['domain'] == str_replace("_",".",$key)) {                
                        $item = $this->db->where('package_name', $a['plan'])->join('servers', 'servers.id = items_saved.server')->get('items_saved')->row();        
                        $client = $this->db->where('company_email', $a['email'])->get('companies')->row();
                        if(is_object($client)) {
                            if($this->db->where('domain', $a['domain'])->where('type', 'hosting')->get('orders')->num_rows() == 0) {  
                                
                                if($this->create_order($item, $client->co_id, $a, $id))
                                {
                                    $count++;
                                }
                            }
                            else
                            {           
                                $this->db->where('domain', $a['domain'])
                                        ->where('client_id', $client->co_id)
                                        ->where('status_id', 6)
                                        ->update('orders', array('username' => $a['user']));
                            }
                           
                        }
                        else
                        {
                            $username = explode('@', $a['email'])[0];
                            $email = $a['email']; 
                            $password = $a['email']; 
                            
                            $hasher = new PasswordHash(
                                $this->config->item('phpass_hash_strength', 'tank_auth'),
                                $this->config->item('phpass_hash_portable', 'tank_auth'));
                                $hashed_password = $hasher->HashPassword($password);
                            
            
                            if (!is_username_available($username)) {    
                                $username = explode('.', $a['domain'], 2)[0]; 
                            }                             
                                                           
                                $data = array(
                                    'username'	=> $username, 
                                    'password'  => $hashed_password,
                                    'email'		=> $email,
                                    'role_id'	=> 2 
                                );
            
                                $user_id = App::save_data('users', $data);
                                             
                                $client = array(   
                                    'company_name'          => ucfirst($a['domain'])." ".lang('account'),
                                    'company_email'         => $a['email'],                       
                                    'company_ref'			=> $this->applib->generate_string(), 
                                    'language' 				=> config_item('default_language'),
                                    'currency' 				=> config_item('default_currency'),
                                    'primary_contact'       => $user_id,
                                    'individual' 			=> 0,                            
                                    'company_address_two' 	=> '',
                                    'company_phone'		  	=> '',
                                    'city'				  	=> '',
                                    'state'			      	=> '',
                                    'zip'				  	=> ''
                                    );

                                if($co_id = App::save_data('companies', $client)) {
                                    
                                    $profile = array(
                                        'user_id'           => $user_id,
                                        'company'	        => $co_id,
                                        'fullname'	        => ucfirst($a['domain'])." ".lang('account'),
                                        'phone'		        => '',
                                        'avatar'	        => 'default_avatar.jpg',
                                        'language'	        => config_item('default_language'),
                                        'locale'	        => config_item('locale') ? config_item('locale') : 'en_US'
                                    );
                
                                    App::save_data('account_details', $profile); 
                                    if($this->create_order($item, $co_id, $a, $id)) 
                                    {
                                        $count++;
                                    }
                                }
                                
                            }
                        }
                    }                
                }  
                
                
                $this->session->set_flashdata('response_status', 'info');
                $this->session->set_flashdata('message', "Created ".$count." accounts");			
                redirect($_SERVER['HTTP_REFERER']);
         }

    

        else {
            if(is_array($list)) { 
                foreach($list as $key => $a) {                   

                    foreach($clients as $client) {
                        if($a['email'] == $client->company_email) {
                            $list[$key]['client'] = $client->company_name;
                        }      
                    }
                    
                    $item = $this->db->where('package_name', $a['plan'])
                            ->join('servers', 'servers.id = items_saved.server')
                            ->where('reseller_package', 'No')
                            ->get('items_saved')->row(); 

                    if(isset($item->package_name)) {
                        $list[$key]['package'] = $item->item_name;
                        $list[$key]['server'] = $item->name;
                        $list[$key]['import'] = ($id == $item->server) ? 1 : 0;
                    }
                    
                    foreach($accounts as $acc) {
                        if($a['domain'] == $acc->domain && $a['user'] == $acc->username) {
                            unset($list[$key]);
                        }      
                    }
                }
           }
        } 
    

        $data['data'] = $list;
        $data['id'] = $id;
        $this->template->title(lang('import_accounts'));
        $data['page'] = lang('import_accounts'); 
        $this->template
        ->set_layout('users')
        ->build('import',isset($data) ? $data : NULL);  
    }




    function login($id) 
	{
		$server = $this->db->where(array('id'=> $id))->get('servers')->row();

		if($server->type == 'cpanel') 
		{		
            $this->load->library('Cpanel', trim($server->authkey));
            $this->session->set_userdata('port', 2087);
			$req = array(							
				'user' => $server->username,
				'service' => 'cpaneld'
			);			
			$response = $this->cpanel->call('create_user_session', $req); 

			if(isset($response['data'])) {
                $url = $response['data']['url'];
                $url = str_replace(2083,2087,$url);
				redirect($url);
			}
			
			else {			
				$this->session->set_flashdata('response_status', 'warning');
				$this->session->set_flashdata('message', $response['metadata']['reason']);
				redirect($_SERVER['HTTP_REFERER']);
			}
		}


		if($server->type == 'plesk') 
		{	$this->load->library('Plesk', trim($server->authkey));
			$result = $this->plesk->createSession($server->username, trim($server->hostname));
			
			$res = json_decode(json_encode($result), true);
			$result .= $res[0];
			$this->session->set_flashdata('response_status', 'warning');
			$this->session->set_flashdata('message', $result);
			redirect($_SERVER['HTTP_REFERER']);
        }



        if($server->type == 'directadmin') 
		{   $this->template->title('DirectAdmin');
            $data['page'] = 'Directadmin'; 
            $data['hostname'] = $server->hostname;
            $data['port'] = $server->port;
            $data['username'] = $server->username;
            $data['authkey'] = $server->authkey;
            $this->template
            ->set_layout('users')
            ->build('login',isset($data) ? $data : NULL);  
        }
        


        
	}


}

/* End of file Servers.php */