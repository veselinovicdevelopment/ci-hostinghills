<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends MX_Controller {

	function __construct()
		{
			parent::__construct();
			User::logged_in();

			$this->load->module('layouts');
			$this->load->library('template');
			$this->load->model(array('App', 'Client', 'Order', 'Domain', 'Invoice', 'Item', 'User'));
			$this->filter_by = $this->_filter_by();		
		}
 


	function index() 
	{			
		$type = "(orders.type ='hosting')";
		$array = $this->filter_by($this->filter_by);
		
		if(User::is_admin() || User::perm_allowed(User::get_id(),'manage_accounts')){
			$data['accounts'] = Domain::by_where($array, $type);
		}else{
			$array['client_id'] = User::profile_info(User::get_id())->company;
			$data['accounts'] = Domain::by_where($array, $type);				
		}			

		$this->template->title(lang('accounts').' - '.config_item('company_name'));
		$data['page'] = lang('accounts');
		$data['datatables'] = TRUE;
		
		$this->template
		->set_layout('users')
		->build('accounts',isset($data) ? $data : NULL);
	}



	function _filter_by()
	{
		$filter = isset($_GET['view']) ? $_GET['view'] : '';
		return $filter;
	}



	function filter_by($filter_by) 
	{
		switch ($filter_by) {
			case 'pending':
			return array('status_id' => 5);
			break;

			case 'active':
			return array('status_id' => 6);
			break;

			case 'cancelled':
			return array('status_id' => 7);
			break;

			case 'suspended':
			return array('status_id' => 9);
			break;
			
			default:
			return array('status_id <>' => 8, 'status_id <>' => 2);
			break;
		}
	}





	function activate($id = null)
	{
		App::module_access('menu_accounts');
		if ($this->input->post()) {
				$result = ""; 

				$id = $this->input->post('id'); 		
				$account = Order::get_order($id); 		
		 
				$client = Client::view_by_id($account->client_id); 
				$user = User::view_user($client->primary_contact);
				$profile = User::profile_info($client->primary_contact);
 
				if ($this->input->post('server') != '') {
					$server = $this->db->where(array('id'=> $this->input->post('server')))->get('servers')->row();
				} 

				else{				
					$server = $this->db->where(array('selected'=> 1))->get('servers')->row();			
				}  
	
				$update = array(
					"status_id" => 6,
					"username" => $this->input->post('username'),
					"password" => $this->input->post('password')
				);

				if($server) {
					$update['server'] = $server->id;
				}


				$this->db->where('id', $id);  
				if($this->db->update('orders', $update)) {
					$result .= lang('account_activated')."<br>";

					$this->db->set('inv_deleted', "No"); 
					$this->db->where('inv_id', $account->invoice_id);  
					$this->db->update('invoices');
				} 
				

				if($this->input->post('send_details') == 'on') {
					Order::send_account_details($id);
				}

				if(config_item('demo_mode') != 'TRUE') {
					if($this->input->post('create_controlpanel') == 'on') {
		 
						$package = $this->db->where(array('item_id'=> $account->item_parent))->get('items_saved')->row();	
						
						if($package->reseller_package == 'No') {

							if($server->type == 'cpanel') 
							{ 				
								$this->load->library('Cpanel', trim($server->authkey));	
								$params = array(
									'plan' => $package->package_name,
									'username' => $this->input->post('username'),
									'password' => $this->input->post('password'),
									'domain' => $account->domain,
									'contactemail' => $client->company_email,
									'cgi' => 1,
									'hasshell' => 1,
									'cpmod' => 'paper_lantern'
								);
	
								$response = $this->cpanel->call('createacct', $params);
								$result .= $domain." ".$response['metadata']['reason'];	
							}	

							if($server->type == 'directadmin') 
							{ 			
								$req = array(
									'action' => 'create',
									'package' => $package->package_name,
									'username' => $this->input->post('username'),
									'passwd' => $this->input->post('password'),
									'passwd2' => $this->input->post('password'),
									'domain' => $account->domain,
									'email' => $client->company_email,
									'notify' => 'no',
									'ip' => gethostbyname($server->hostname)
								);					
	
								$this->load->library('DirectAdmin', trim($server->authkey));			
								$response = $this->directadmin->query("CMD_API_ACCOUNT_USER", $req, "POST"); 
								$result .= $response['details'];												
							}


							if($server->type == 'plesk') 
							{ 
								$req = array( 
									'package' => $package->package_name,
									'username' => $this->input->post('username'),
									'password' => $this->input->post('password'), 
									'domain' => $account->domain,
									'email' => $client->company_email 
								);
								

								$data = (object) array('plan' => (object) $req, 'user' => $user, 'profile' => $profile, 'client' => $client); 													
								$this->load->library('Plesk', trim($server->authkey));
								$res = $this->plesk->createAccount($data);
								$result .= $domain." ".$res;
							} 

						}
 


						if($package->reseller_package == 'Yes') {

							if($server->type == 'cpanel') 
							{
								$this->load->library('Cpanel', trim($server->authkey));		
								$params = array(
									'plan' => $package->package_name,
									'username' => $this->input->post('username'),
									'password' => $this->input->post('password'),
									'domain' => $account->domain,
									'contactemail' => $client->company_email,
									'cgi' => 1,
									'hasshell' => 1,
									'cpmod' => 'paper_lantern'
								);
	
								$response = $this->cpanel->call('createacct', $params);								
								$result .= $domain." ".$response['metadata']['reason'];	
								if(isset($response['metadata'])){
									$params = array(
										'makeowner' => 1,
										'username' => $this->input->post('username') 
									);

									$response = $this->cpanel->call('setupreseller', $params);
									$result .=  $response['metadata']['reason'];

								}
							}	

							if($server->type == 'directadmin') 
							{ 			
								$req = array(
									'action' => 'create',
									'package' => $package->package_name,
									'username' => $this->input->post('username'),
									'passwd' => $this->input->post('password'),
									'passwd2' => $this->input->post('password'),
									'domain' => $account->domain,
									'email' => $client->company_email,
									'notify' => 'no',
									'ip' => gethostbyname($server->hostname)
								);					
	
								$this->load->library('DirectAdmin', trim($server->authkey));			
								$response = $this->directadmin->query("CMD_ACCOUNT_RESELLER", $req, "POST"); 
								$result .= $response['details'];												
							}


							if($server->type == 'plesk') 
							{ 
								$req = array( 
									'package' => $package->package_name,
									'username' => $this->input->post('username'),
									'password' => $this->input->post('password'), 
									'domain' => $account->domain,
									'email' => $client->company_email 
								);

								$data = (object) array('plan' => (object) $req, 'user' => $user, 'profile' => $profile, 'client' => $client); 
								$this->load->library('Plesk', trim($account->authkey)); 
								$res = $this->plesk->createReseller($data);
								$result .= $domain." ".$res;
							} 

						} 
						
					}
				}
 
				$this->session->set_flashdata('response_status', 'info');
                $this->session->set_flashdata('message', $result);				
                redirect($_SERVER['HTTP_REFERER']);
		}

		else {
			$data['item'] = Order::get_order($id); 
			$data['servers'] = $this->db->get('servers')->result();
			$this->load->view('modal/activate', $data);
		}
	}





	function cancel($id = null)
	{
		App::module_access('menu_accounts');
		if ($this->input->post()) {

			if($this->input->post('credit_account') == 'on')
			{
				Invoice::credit_item($this->input->post('id'));
			}

			$result = "";			 
			$id = $this->input->post('id'); 		
			$account = Order::get_order($id); 		

			$this->db->set('status_id', 7); 
			$this->db->where('id', $id);  
			if($this->db->update('orders')) { 

				if(config_item('demo_mode') != 'TRUE') {

					$package = $this->db->where(array('item_id'=> $account->item_parent))->get('items_saved')->row();						
					
					if($this->input->post('delete_controlpanel') == 'on') {

						if($package->reseller_package == 'No') {

							if($account->server_type == 'cpanel') {
								$this->load->library('Cpanel', trim($account->authkey));	
								$params = array(							
									'username' => $account->username								
								);			
								$response = $this->cpanel->call('removeacct', $params); 
								$result .= $domain[$key]." ".$response['metadata']['reason'];
							}

							if($account->server_type == 'directadmin') {
								$req = array(
									'confirmed' => 'Confirm',
									'delete' => 'yes',
									'select0' => $account->username
								);			

								$this->load->library('DirectAdmin', trim($account->authkey));			
								$result = $this->directadmin->query("CMD_SELECT_USERS", $req, "POST"); 
								$result .= $response['details'];
							}

							if($account->server_type == 'plesk') { 	
								$this->load->library('Plesk', trim($account->authkey)); 
								$result = $this->plesk->removeAccount($account->domain);
								$res = json_decode(json_encode($result), true);
								$result .= $res[0];
							}

							$this->db->set('server', ''); 
							$this->db->where('id', $id);  
							$this->db->update('orders');						
						}
					
					 


						if($package->reseller_package == 'Yes') {					

							if($account->server_type == 'cpanel') {
								$this->load->library('Cpanel', trim($account->authkey));
								$params = array(							
									'username' => $account->username								
								);			
								$response = $this->cpanel->call('terminatereseller', $params); 
								$result .= $domain[$key]." ".$response['metadata']['reason'];
							}

							if($account->server_type == 'directadmin') {
								$req = array(
									'confirmed' => 'Confirm',
									'delete' => 'yes',
									'select0' => $account->username
								);			

								$this->load->library('DirectAdmin', trim($account->authkey));
								$result = $this->directadmin->query("CMD_SELECT_USERS", $req, "POST"); 
								$result .= $response['details'];
							}

							if($account->server_type == 'plesk') { 	
								$this->load->library('Plesk', trim($account->authkey));
								$result = $this->plesk->removeReseller($account->username);
								$res = json_decode(json_encode($result), true);
								$result .= $res[0];
							}

							$this->db->set('server', ''); 
							$this->db->where('id', $id);  
							$this->db->update('orders');						
						}
					
					}
						
				}								
			}
						
			$this->db->set('inv_deleted', "Yes"); 
			$this->db->where('inv_id', $this->input->post('inv_id'));  
			$this->db->update('invoices');
			
			$this->session->set_flashdata('response_status', 'info');
			$this->session->set_flashdata('message', $result);
			redirect($_SERVER['HTTP_REFERER']);
		}

		else {
			$data['item'] = Order::get_order($id); 
			$data['servers'] = $this->db->get('servers')->result();
			$this->load->view('modal/cancel', $data);
		}
	}




	function delete($id = null)
	{
		App::module_access('menu_accounts');
		if ($this->input->post()) {

			if($this->input->post('credit_account') == 'on')
			{
				Invoice::credit_item($this->input->post('id'));
			}			

			$result = "";			
			$id = $this->input->post('id'); 		
			$account = Order::get_order($id); 
			$terminate = false; 

			if($this->db->where('order_id', $account->order_id)->get('orders')->num_rows() == 1) {
				$this->db->where('id', $id);  
				if($this->db->delete('orders')) { 
					$terminate = true; 
					Invoice::delete($account->invoice_id);
				}
			}

			else {
				$this->db->where('id', $id);  
				if($this->db->delete('orders')) { 
					$terminate = true;
				}
			} 
			
			
			if($terminate){
		
				if(config_item('demo_mode') != 'TRUE') {					
					
					$package = $this->db->where(array('item_id'=> $account->item_parent))->get('items_saved')->row();						
					
					if($this->input->post('delete_controlpanel') == 'on') {

						if($package->reseller_package == 'No') {

							if($account->server_type == 'cpanel') {
								$this->load->library('Cpanel', trim($account->authkey));
								$params = array(							
									'username' => $account->username								
								);			
								$response = $this->cpanel->call('removeacct', $params); 
								$result .= $domain[$key]." ".$response['metadata']['reason'];
							}

							if($account->server_type == 'directadmin') {
								$req = array(
									'confirmed' => 'Confirm',
									'delete' => 'yes',
									'select0' => $account->username
								);			

								$this->load->library('DirectAdmin', trim($account->authkey));
								$result = $this->directadmin->query("CMD_SELECT_USERS", $req, "POST"); 
								$result .= $response['details'];
							}

							if($account->server_type == 'plesk') { 	
								$this->load->library('Plesk', trim($account->authkey));
								$result = $this->plesk->removeAccount($account->domain);
								$res = json_decode(json_encode($result), true);
								$result .= $res[0];
							}

							$this->db->set('server', ''); 
							$this->db->where('id', $id);  
							$this->db->update('orders');						
						}
					
					 


						if($package->reseller_package == 'Yes') {					

							if($account->server_type == 'cpanel') {
								$this->load->library('Cpanel', trim($account->authkey));
								$params = array(							
									'username' => $account->username								
								);			
								$response = $this->cpanel->call('terminatereseller', $params); 
								$result .= $domain[$key]." ".$response['metadata']['reason'];
							}

							if($account->server_type == 'directadmin') {
								$req = array(
									'confirmed' => 'Confirm',
									'delete' => 'yes',
									'select0' => $account->username
								);			

								$this->load->library('DirectAdmin', trim($account->authkey));
								$result = $this->directadmin->query("CMD_SELECT_USERS", $req, "POST"); 
								$result .= $response['details'];
							}

							if($account->server_type == 'plesk') { 	
								$this->load->library('Plesk', trim($account->authkey));
								$result = $this->plesk->removeReseller($account->username);
								$res = json_decode(json_encode($result), true);
								$result .= $res[0];
							} 						
						}
					
					}
				}									
			}
						
	
			$this->session->set_flashdata('response_status', 'info');
			$this->session->set_flashdata('message', $result);
			redirect('accounts');
		}

		else {
			$data['item'] = Order::get_order($id); 
			$data['servers'] = $this->db->get('servers')->result();
			$this->load->view('modal/delete', $data);
		}
	}



	function suspend($id = null)
	{
		App::module_access('menu_accounts');
		if ($this->input->post()) {
			$account = Order::get_order($this->input->post('id'));
			$reason = $this->input->post('reason');			
			$result = "";
			$this->db->set('status_id', 9); 
			$this->db->where('id', $this->input->post('id'));  
			if($this->db->update('orders')) {
				$result .=  $account->domain." has been suspended.<br>";

				$package = $this->db->where(array('item_id'=> $account->item_parent))->get('items_saved')->row();
					
				if($package->reseller_package == 'No') {

					if($account->server_type == 'cpanel') 
					{ 
						$this->load->library('Cpanel', trim($account->authkey));
						$req = array(							
							'user' => $account->username,
							'reason' => $reason
						);			
						$response = $this->cpanel->call('suspendacct', $req); 
						$result .= $response['metadata']['reason'];	
					}

					
					if($account->server_type == 'plesk') 
					{	 		 
						$client = Client::view_by_id($account->client_id); 
						$user = User::view_user($client->primary_contact);	
						$this->load->library('Plesk', trim($account->authkey));
						$result = $this->plesk->suspendAccount($account->domain);
						$res = json_decode(json_encode($result), true);
						$result .= $res[0];
					}
				}
				
				if($package->reseller_package == 'Yes') {
					if($account->server_type == 'cpanel') 
					{ 
						$this->load->library('Cpanel', trim($account->authkey));
						$req = array(							
							'user' => $account->username,
							'reason' => $reason
						);			
						$response = $this->cpanel->call('suspendreseller', $req); 
						$result .= $response['metadata']['reason'];	
					}
					
					
					if($account->server_type == 'plesk') 
					{	 		 
						$client = Client::view_by_id($account->client_id); 
						$user = User::view_user($client->primary_contact);	
						$this->load->library('Plesk', trim($account->authkey));
						$result = $this->plesk->suspendReseller($user->username);
						$res = json_decode(json_encode($result), true);
						$result .= $res[0];
					}
				}
			} 

			$this->session->set_flashdata('response_status', 'warning');
			$this->session->set_flashdata('message', $result);
			redirect($_SERVER['HTTP_REFERER']);
		}

		else {
			$data['id'] = $id; 
			$data['servers'] = $this->db->get('servers')->result();
			$this->load->view('modal/suspend', $data);
		}
	}




	function unsuspend($id = null)
	{
		App::module_access('menu_accounts');
		if ($this->input->post()) {
			$account = Order::get_order($this->input->post('id')); 
			$this->load->library('Cpanel', trim($account->authkey));
			$result = "";
			$this->db->set('status_id', 6); 
			$this->db->where('id', $this->input->post('id'));  
			if($this->db->update('orders')) {
				$result .=  $account->domain." has been unsuspended.<br>";	

				$package = $this->db->where(array('item_id'=> $account->item_parent))->get('items_saved')->row();
					
				if($package->reseller_package == 'No') {
					if($account->server_type == 'cpanel') 
					{
						$req = array(							
							'user' => $account->username,				
						);			
						$response = $this->cpanel->call('unsuspendacct', $req); 
						$result .= $response['metadata']['reason'];	
					}
					
					if($account->server_type == 'plesk') 
					{	 		 
						$client = Client::view_by_id($account->client_id); 
						$user = User::view_user($client->primary_contact);	
						$this->load->library('Plesk', trim($account->authkey));
						$result = $this->plesk->unsuspendAccount($account->domain);
						$res = json_decode(json_encode($result), true);
						$result .= $res[0];
					}
				}

				if($package->reseller_package == 'Yes') {
					if($account->server_type == 'cpanel') 
					{
						$req = array(							
							'user' => $account->username,				
						);			
						$response = $this->cpanel->call('unsuspendacct', $req); 
						$result .= $response['metadata']['reason'];	
					}
					
					if($account->server_type == 'plesk') 
					{	 		 
						$client = Client::view_by_id($account->client_id); 
						$user = User::view_user($client->primary_contact);	
						$this->load->library('Plesk', trim($account->authkey));
						$result = $this->plesk->unsuspendReseller($user->username);
						$res = json_decode(json_encode($result), true);
						$result .= $res[0];
					}
				}
			} 

			$this->session->set_flashdata('response_status', 'warning');
			$this->session->set_flashdata('message', $result);
			redirect($_SERVER['HTTP_REFERER']);
		}

		else {
			$data['id'] = $id; 
			$data['servers'] = $this->db->get('servers')->result();
			$this->load->view('modal/unsuspend', $data);
		}
	}





	function suspend_unsuspend($id = null)
	{
		$account = Order::get_order($id);	

		if($account->status_id == 6) {
			$message = lang('account_suspended');
			$action = 9;
		}

		if($account->status_id == 9) {
			$message = lang('account_unsuspended');
			$action = 6;
		}		

		$this->db->set('status_id', $action); 
			$this->db->where('id', $id);  
			if($this->db->update('orders')) {

			if($account->server_type == 'directadmin') {
				$req = array(							
					"suspend" => "Suspend/Unsuspend",
					"select0" => $account->username
				);
	
				$this->load->library('DirectAdmin', trim($account->authkey));
				$result = $this->directadmin->query("CMD_SELECT_USERS", $req, "POST");  
			}

		$this->session->set_flashdata('response_status', 'info');
		$this->session->set_flashdata('message', $message);
		redirect($_SERVER['HTTP_REFERER']);
		}
	}



	function change()
	{
		$id = $_GET['plan'];
		$current = Item::view_item($id);
		$parent = $current->parent;
		$this->session->set_userdata('account_id', $_GET['account']);
		$this->db->select('items_saved.item_id, item_name, item_features, monthly, quarterly, semi_annually, annually'); 
		$this->db->from('items_saved');  
		$this->db->join('item_pricing','items_saved.item_id = item_pricing.item_id','INNER');
		$this->db->join('categories','categories.id = item_pricing.category','LEFT');
		$this->db->where('deleted', 'No');
		$this->db->where('display', 'Yes');  
		$this->db->where('category', $current->category); 
		$this->db->where('items_saved.item_id <>', $id); 
		$data['packages'] = $this->db->get()->result(); 
		$this->load->view('modal/change', $data);		
	}



	function show_options($id)
	{	 
		$this->session->set_userdata('item_id', $id);
		$data['current'] =  $this->session->userdata('account_id'); 
		$data['options'] =  $id;
		$this->template->title(lang('review').' - '.config_item('company_name'));
		$data['page'] = lang('options');			
		$this->template
		->set_layout('users')
		->build('options', $data);	
	}




	function manage ($id = null)
	{ 
		if(User::is_admin() || User::perm_allowed(User::get_id(),'manage_accounts')) {

			if($this->input->post()) { 
				
				if(App::update('orders', array('id' => $this->input->post('id')), $this->input->post()))
				{
					Applib::go_to('accounts/account/'.$this->input->post('id'), 'success', lang('account_updated'));
				}
				else {
					redirect($_SERVER['HTTP_REFERER']);
				}
			}

			else {				
				$this->template->title(lang('account').' - '.config_item('company_name'));
				$data['account'] = array();
				$data['account_details'] = true;
				$data['page'] = lang('account');
				$data['datepicker'] = true;
				$data['form'] = true;
				$data['id'] = $id;			
				$this->template
				->set_layout('users')
				->build('manage', $data);	
			}
		}
		else {
			redirect(base_url()."accounts");
		}
	}



	function account ($id)
	{	
		$order = Order::get_order($id);
		$client = Client::get_by_user(User::get_id());
		if(User::is_admin() || User::perm_allowed(User::get_id(),'manage_accounts') || (isset($client) && $client->co_id == $order->client_id )){
			$this->template->title(lang('account').' - '.config_item('company_name'));
			$data['account_details'] = true;
			$data['page'] = lang('account');
			$data['id'] = $id;			
			$this->template
			->set_layout('users')
			->build('account', $data);	
		}
		else {
			redirect(base_url()."accounts");
		}
	}



	function review()
	{	 	 
		$data['renewal'] = $this->input->post('renewal');
		$data['renewal_date'] = $this->input->post('next_due');
		$data['payable'] = $this->input->post('payable');
		$data['amount'] = $this->input->post('amount'); 
		$data['item'] = $this->session->userdata('item_id');
		$data['account'] = $this->session->userdata('account_id');

		$upgrade = array(
			'renewal' => $data['renewal'],
			'renewal_date' => $data['renewal_date'],  
			'account' => $data['account'],
			'amount' => $data['amount'],
			'item' => $this->session->userdata('item_id'),
			'payable' => $data['payable']
		);
 
		$this->session->set_userdata('upgrade', $upgrade);
		$this->template->title(lang('review').' - '.config_item('company_name'));

		$data['page'] = lang('review');			
		$this->template
		->set_layout('users')
		->build('review', $data);
	}



	function view_logins($id = null)
	{	 
		$data['item'] = Order::get_order($id); 
		$data['servers'] = $this->db->get('servers')->result();
		$this->load->view('modal/view_logins', $data);
	}



	function change_password($id = null)
	{
		App::module_access('menu_accounts');
		if ($this->input->post()) {
			$account = Order::get_order($this->input->post('id'));
			$password = $this->input->post('password');

			$update = array(
				"password" => $password
			); 
			
			$this->db->where('id', $this->input->post('id'));  
			if($this->db->update('orders', $update)) {

				if($account->server_type == 'cpanel') 
				{
					$this->load->library('Cpanel', trim($account->authkey));								 
					$req = array(							
						"user" => $account->username,
						"password" => $password
					);			
					$response = $this->cpanel->call('passwd', $req); 
					$result = $response['metadata']['reason'];	
				}

				if($account->server_type == 'directadmin') 
				{
					$req = array(							
						"username" => $account->username,
						"passwd" => $password,
						"passwd2" => $password
					);	

					$this->load->library('DirectAdmin', trim($account->authkey));
					$result = $this->directadmin->query("CMD_API_USER_PASSWD", $req, 'POST'); 
					if(isset($result['details'])) {
						$result = $result['details'];
					}					
					else {
						$result = lang('connection_failed');
					}
				}
				
				
				if($account->server_type == 'plesk') 
				{	 		 
					$client = Client::view_by_id($account->client_id); 
					$user = User::view_user($client->primary_contact);
					$this->load->library('Plesk', trim($account->authkey));
					$result = $this->plesk->changePassword($user->username, $password);
					$res = json_decode(json_encode($result), true);
					$result = $res[0];
				}

			} 

			$this->session->set_flashdata('response_status', 'info');
			$this->session->set_flashdata('message', $result);
			redirect($_SERVER['HTTP_REFERER']);
		}

		else {
			$data['id'] = $id; 
			$this->load->view('modal/change_password', $data);
		}
	}




	function login($id) 
	{
		$account = Order::get_order($id);

		if($account->server_type == 'cpanel') 
		{		
			$this->load->library('Cpanel', trim($account->authkey));
			$req = array(							
				'user' => $account->username,
				'service' => 'cpaneld'
			);			
			$response = $this->cpanel->call('create_user_session', $req); 

			if(isset($response['data'])) {
				$url = $response['data']['url'];
				redirect($url);
			}
			
			else {			
				$this->session->set_flashdata('response_status', 'warning');
				$this->session->set_flashdata('message', $response['metadata']['reason']);
				redirect($_SERVER['HTTP_REFERER']);
			}
		}


		if($account->server_type == 'plesk') 
		{	 		 
			$client = Client::view_by_id($account->client_id); 
			$user = User::view_user($client->primary_contact);
			$this->load->library('Plesk', trim($account->authkey));
			$result = $this->plesk->createSession($user->username, trim($account->hostname));
			
			$res = json_decode(json_encode($result), true);
			$result .= $res[0];
			$this->session->set_flashdata('response_status', 'warning');
			$this->session->set_flashdata('message', $result);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
 
 

}