<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Orders extends MX_Controller {

	private $server;

	function __construct()
	{
		parent::__construct();
		$this->load->module('layouts');	
		User::logged_in();

		$this->load->library(array('template'));
		$this->load->model(array('Order','App', 'Client', 'User', 'Invoice', 'Domain', 'Item', 'Payment'));		
		$this->filter_by = $this->_filter_by(); 	
		$server = $this->db->where(array('selected'=> 1))->get('servers')->row();	

		if($server) {
			$this->server = $server->id;
		}				
	}
	


	function index()
	{
		App::module_access('menu_orders');
		$this->template->title(lang('orders').' - '.config_item('company_name'));
		$data['page'] = lang('orders');
		$data['datatables'] = TRUE;		
		$data['form'] = true;
		$array = $this->filter_by($this->filter_by);
		$data['orders'] = Order::list_orders($array);
		$this->template
		->set_layout('users')
		->build('orders',isset($data) ? $data : NULL);
	}


	
	function _filter_by()
	{
		$filter = isset($_GET['view']) ? $_GET['view'] : '';
		return $filter;
	}



	function filter_by($filter_by) 
	{
		switch ($filter_by) {
			case 'unpaid':
			return array('hd_invoices.status' => 'Unpaid', 'status_id <>' => 8);
			break;

			case 'paid':
			return array('hd_invoices.status' => "Paid", 'status_id <>' => 8);
			break; 
			
			default:
			return array('status_id <>' => 8);
			break;
		}
	}

		

function activate($id = null)
	{	

		App::module_access('menu_orders');
		if($this->input->post()) { 
		 
			if($this->input->post('o_id') == 0) {

				$result = "";
				if ($this->input->post('hosting')) {  

					$client = Client::view_by_id($this->input->post('client_id'));
					$accounts = $this->input->post('username');
					$domain = $this->input->post('domain');
					$passwords = $this->input->post('password');
					$hosting = $this->input->post('hosting');
					$service = $this->input->post('service');
					$servers = $this->input->post('server');
					$user = User::view_user($client->primary_contact);
					$profile = User::profile_info($client->primary_contact);

					$this->db->set('inv_deleted', "No"); 
					$this->db->where('inv_id', $this->input->post('inv_id'));  
					$this->db->update('invoices');

					foreach($accounts as $key => $account) {
							$item = $this->input->post('item_id');

							$update = array(
								"status_id" => 6,
								"username" => $accounts[$key],
								"password" => $passwords[$key],
								"server" => $servers[$key]				
							); 
							
							$this->db->where('id', $hosting[$key]);  
							if($this->db->update('orders', $update)) {
								$result .= $service[$key]." for ". $domain[$key] ." activated.<br>";
							}							
							
							if($this->input->post($account->username.'_send_details') == 'on') {
								Order::send_account_details($hosting[$key]);
							}

							$account = Order::get_order($hosting[$key]); 

							if(config_item('demo_mode') != 'TRUE') {
								if($this->input->post($account->username.'_controlpanel')  == 'on') {
									$package = $this->db->where(array('item_id'=> $account->item_parent))->get('items_saved')->row();
								 
									$server = $this->db->where(array('id'=> $servers[$key]))->get('servers')->row();	
									
									if($package->reseller_package == 'No') {

										if($server->type == 'cpanel') 
										{  	
										 
											$this->load->library('Cpanel', trim($server->authkey));

											$params = array(
												'plan' => $package->package_name,
												'username' => $accounts[$key],
												'password' => $passwords[$key],
												'domain' => $domain[$key],
												'contactemail' => $client->company_email,
												'cgi' => 1,
												'hasshell' => 1,
												'cpmod' => 'paper_lantern'
											); 
							
											$response = $this->cpanel->call('createacct', $params); 
											$result .= $domain[$key]." ".$response['metadata']['reason']."<br>";
										}

										if($server->type == 'directadmin') 
										{										 
											$req = array(
												'action' => 'create',
												'package' => $package->package_name,
												'username' => $accounts[$key],
												'passwd' => $passwords[$key],
												'passwd2' => $passwords[$key],
												'domain' => $domain[$key],
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
												'username' => $accounts[$key],
												'password' => $passwords[$key],
												'domain' => $domain[$key],
												'email' => $client->company_email 
											);

											$data = (object) array('plan' => (object) $req, 'user' => $user, 'profile' => $profile, 'client' => $client); 
											$this->load->library('Plesk', trim($server->authkey));
											$res = $this->plesk->createAccount($data);
											$result .= $domain[$key]." ".$res;
										} 
									}



									if($package->reseller_package == 'Yes') {

										if($server->type == 'cpanel') 
										{
											$this->load->library('Cpanel', trim($server->authkey));	
											$params = array(
												'plan' => $package->package_name,
												'username' => $accounts[$key],
												'password' => $passwords[$key],
												'domain' => $domain[$key],
												'contactemail' => $client->company_email,
												'cgi' => 1,
												'hasshell' => 1,
												'cpmod' => 'paper_lantern'
											);
				
											$response = $this->cpanel->call('createacct', $params);								
											$result .= $domain[$key]." ".$response['metadata']['reason'];	
											if(isset($response['metadata'])){
												$params = array(
													'makeowner' => 1,
													'username' => $accounts[$key]
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
												'username' => $accounts[$key],
												'passwd' => $passwords[$key],
												'passwd2' => $passwords[$key],
												'domain' => $domain[$key],
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
												'username' => $accounts[$key],
												'password' => $passwords[$key],
												'domain' => $domain[$key],
												'email' => $client->company_email 
											);
			
											$data = (object) array('plan' => (object) $req, 'user' => $user, 'profile' => $profile, 'client' => $client); 																
											$this->load->library('Plesk', trim($server->authkey));
											$res = $this->plesk->createReseller($data);
											$result .= $domain." ".$res;
										} 
			
									} 
								}
						}			
					}						
				}



				if ($this->input->post('domain')) {
					$domains = $this->input->post('domain'); 
					foreach($domains as $key => $account) {		
						
						$account = Order::get_order($domains[$key]); 
						
							$update = array(
								"status_id" => 6,
								"authcode" => $this->input->post('authcode')[$key],
								'registrar' => $this->input->post('registrar')[$key]
							); 
					
							$this->db->where('id', $domains[$key]);  
							if($this->db->update('orders', $update)){ 

								$domain = explode('.', $account->domain, 2);

								if($this->input->post($domain[0].'_activate') == 'on') { 

									if($this->input->post('registrar')[$key] != '') {									
										$registrar = $this->input->post('registrar')[$key]; 									
											$action = '/register_domain';
								
											if($account->item_name == lang('domain_renewal')) {
												$action = '/renew_domain';
											}

											if($account->item_name == lang('domain_transfer')) {
												$action = '/transfer_domain';
											} 

											$result .= modules::run($registrar.$action, $domains[$key]);		
										}										
										
										$data = array(
											'user' => User::get_id(),
											'module' => 'accounts',
											'module_field_id' => $domains[$key],
											'activity' => $result,
											'icon' => 'fa-usd',
											'value1' =>  $account->domain,
											'value2' => ''
										);
											App::Log($data); // Log activity
									
									$result .= "<p>" .$domain[$key]." activated! </p>";
							} 
						}				
					}						
				}

				$this->session->set_flashdata('response_status', 'warning');
                $this->session->set_flashdata('message', $result);				
				redirect($_SERVER['HTTP_REFERER']);				
			}
			else {
				$this->process_upgrade($this->input->post('o_id'));
			}
		}

		else {
			$data['order'] = $this->get_order($id);
			$data['servers'] = $this->db->get('servers')->result();
			$this->load->view('modal/activate', $data);
		}
	}





	function cancel($id = null)
	{
		App::module_access('menu_orders');
		if ($this->input->post()) { 

				if($this->input->post('credit_account') == 'on')
				{
					Invoice::credit_client($this->input->post('invoice_id'));
				}
 
				$result = "";
				if ($this->input->post('hosting')) {
					$accounts = $this->input->post('username');
					$hosting = $this->input->post('hosting');
					$service = $this->input->post('service');
					$domain = $this->input->post('account');

					$this->db->set('inv_deleted', "Yes"); 
					$this->db->where('inv_id', $this->input->post('invoice_id'));  
					$this->db->update('invoices');

					foreach($accounts as $key => $a) {
							$this->db->set('status_id', 7); 
							$this->db->where('id', $hosting[$key]);  
							if($this->db->update('orders')) {
								$result .=  $service[$key]." for ". $domain[$key] ." cancelled.<br>";
							}

						if(config_item('demo_mode') != 'TRUE') {

							$account = Order::get_order($hosting[$key]); 

							if($this->input->post($account->username.'_delete_controlpanel') == 'on') {
							$server = $this->db->where(array('id'=> $account->server))->get('servers')->row();
							$package = $this->db->where(array('item_id'=> $account->item_parent))->get('items_saved')->row();

							if($package->reseller_package == 'No') {

								if($server->type == 'cpanel') {
									$this->load->library('Cpanel', trim($server->authkey));
									$params = array(							
										'username' => $accounts[$key]								
									);
					
									$response = $this->cpanel->call('removeacct', $params);
									$result .= $domain[$key]." ".$response['metadata']['reason']."<br>";
								}

								if($server->type == 'directadmin') {
									$req = array(
										'confirmed' => 'Confirm',
										'delete' => 'yes',
										'select0' => $accounts[$key]
									);			
		
									$this->load->library('DirectAdmin', trim($server->authkey));			
									$result = $this->directadmin->query("CMD_SELECT_USERS", $req, "POST"); 
									$result .= $response['details'];
								}
								
								if($server->type == 'plesk') { 	
									$this->load->library('Plesk', trim($server->authkey));
									$result = $this->plesk->removeAccount($domain[$key]);
									$res = json_decode(json_encode($result), true);
									$result .= $res[0];
								}

							} 

							if($package->reseller_package == 'Yes') {								
									
								if($server->type == 'cpanel') {
									$this->load->library('Cpanel', trim($server->authkey));

									$params = array(							
										'username' => $accounts[$key]								
									);		
									$response = $this->cpanel->call('terminatereseller', $params); 
									$result .= $domain[$key]." ".$response['metadata']['reason'];
								}

								if($server->type == 'directadmin') {
									$req = array(
										'confirmed' => 'Confirm',
										'delete' => 'yes',
										'select0' => $accounts[$key]
									);			

									$this->load->library('DirectAdmin', trim($server->authkey));
									$result = $this->directadmin->query("CMD_SELECT_USERS", $req, "POST"); 
									$result .= $response['details'];
								}

								if($server->type == 'plesk') { 	
									$this->load->library('Plesk', trim($server->authkey));
									$result = $this->plesk->removeReseller($accounts[$key]);
									$res = json_decode(json_encode($result), true);
									$result .= $res[0];
								}

							}
	
						}
					}				
				}						
			}
			


				if ($this->input->post('domain')) {
					$domains = $this->input->post('domain');
					$domain = $this->input->post('domain_name');

					foreach($domains as $key => $account) { 

							$this->db->set('status_id', 7); 
							$this->db->where('id', $domains[$key]);  
							if($this->db->update('orders')){
								$result .= "Domain: " .$domain[$key]." cancelled!<br>";
						} 					 				
					}						
				}

				$this->session->set_flashdata('response_status', 'warning');
                $this->session->set_flashdata('message', $result);
                redirect($_SERVER['HTTP_REFERER']);

		}

		else {	
			$data['order'] = $this->get_order($id);
			$data['servers'] = $this->db->get('servers')->result();
			$this->load->view('modal/cancel', $data);
		}
	}




	function delete($id = null)
	{
		App::module_access('menu_orders');
		if ($this->input->post()) {

				if($this->input->post('credit_account') == 'on')
				{
					Invoice::credit_client($this->input->post('invoice_id'));
				}

				$result = "";
				if ($this->input->post('hosting')) {
					$accounts = $this->input->post('username');
					$hosting = $this->input->post('hosting');
					$service = $this->input->post('service');
					$domain = $this->input->post('account'); 

					foreach($accounts as $key => $a) {
					
						$this->db->where('id', $hosting[$key]);  
						if($this->db->delete('orders')) {
							$result .=  $service[$key]." for ". $domain[$key] ." deleted.<br>";
						}

					if(config_item('demo_mode') != 'TRUE') {

						$account = Order::get_order($hosting[$key]); 

						if($this->input->post($account->username.'_delete_controlpanel') == 'on') {
						$server = $this->db->where(array('id'=> $account->server))->get('servers')->row();
						$package = $this->db->where(array('item_id'=> $account->item_parent))->get('items_saved')->row();

						if($package->reseller_package == 'No') {

							if($server->type == 'cpanel') {
								$this->load->library('Cpanel', trim($server->authkey));
								$params = array(							
									'username' => $accounts[$key]								
								);
				
								$response = $this->cpanel->call('removeacct', $params);
								$result .= $domain[$key]." ".$response['metadata']['reason']."<br>";
							}

							if($server->type == 'directadmin') {
								$req = array(
									'confirmed' => 'Confirm',
									'delete' => 'yes',
									'select0' => $accounts[$key]
								);			
	
								$this->load->library('DirectAdmin', trim($server->authkey));			
								$result = $this->directadmin->query("CMD_SELECT_USERS", $req, "POST"); 
								$result .= $response['details'];
							}
							
							if($server->type == 'plesk') { 	
								$this->load->library('Plesk', trim($server->authkey));
								$result = $this->plesk->removeAccount($domain[$key]);
								$res = json_decode(json_encode($result), true);
								$result .= $res[0];
							}

						} 

						if($package->reseller_package == 'Yes') {								
								
							if($server->type == 'cpanel') {
								$this->load->library('Cpanel', trim($server->authkey));

								$params = array(							
									'username' => $accounts[$key]								
								);		
								$response = $this->cpanel->call('terminatereseller', $params); 
								$result .= $domain[$key]." ".$response['metadata']['reason'];
							}

							if($server->type == 'directadmin') {
								$req = array(
									'confirmed' => 'Confirm',
									'delete' => 'yes',
									'select0' => $accounts[$key]
								);			

								$this->load->library('DirectAdmin', trim($server->authkey));
								$result = $this->directadmin->query("CMD_SELECT_USERS", $req, "POST"); 
								$result .= $response['details'];
							}

							if($server->type == 'plesk') { 	
								$this->load->library('Plesk', trim($server->authkey));
								$result = $this->plesk->removeReseller($accounts[$key]);
								$res = json_decode(json_encode($result), true);
								$result .= $res[0];
							}
						}
					}
				  }									
				}
			}


				if ($this->input->post('domain')) {

					$domains = $this->input->post('domain');
					$domain = $this->input->post('domain_name');

					foreach($domains as $key => $account) { 
 
							$this->db->where('id', $domains[$key]);  
							if($this->db->delete('orders')){
								$result .= "Domain: " .$domain[$key]." deleted!<br>";
						} 
					 				
					}						
				}

				$invoice = $this->input->post('invoice_id');
				Invoice::delete($invoice);	


				$this->session->set_flashdata('response_status', 'warning');
                $this->session->set_flashdata('message', $result);				
                redirect($_SERVER['HTTP_REFERER']);

		}

		else {
			$data['order'] = $this->get_order($id);
			$data['servers'] = $this->db->get('servers')->result();
			$this->load->view('modal/delete', $data);
		}
	}


	function select_client()
	{
		if($this->input->post()) {
			$this->session->set_userdata(array('co_id' => $this->input->post('co_id')));
			redirect('orders/add_order'); 
		}
		else
		{
			$this->template->title(lang('orders').' - '.config_item('company_name'));
			$data['page'] = lang('new_order'); 
            $data['form'] = true;
			$this->template
			->set_layout('users')
			->build('select_client',isset($data) ? $data : NULL);
		}
	}


	function check_invoice($id)
	{ 
		$item = $this->db->where('invoice_id', $id)->get('items')->result(); 

		if($item[0]->item_name == "Add Funds") 
		{		 
			$payment = Payment::by_invoice($id);
			$amount = $payment[0]->amount;

			$client = Client::view_by_id(Invoice::view_by_id($id)->client);
			$credit = $client->transaction_value;
			$bal = $credit + $amount;
			
			$balance = array(
				'transaction_value' => Applib::format_deci($bal)
			);
			
			$this->db->where('co_id', $client->co_id)->update('companies', $balance);  

		}
	}



	
	function get_order($id) 
	{
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->join('items','orders.item = items.item_id','LEFT');
		$this->db->where('order_id',$id);			
		return $this->db->get()->result();
	}



	function add_order()
	{
		if ($this->input->post()) { 
				$this->session->set_flashdata('response_status', 'warning');
                $this->session->set_flashdata('message', $result);
                redirect($_SERVER['HTTP_REFERER']);

		}

		else { 		
			$this->template->title(lang('orders').' - '.config_item('company_name'));
			$data['page'] = lang('orders');
			$data['datepicker'] = true;
            $data['form'] = true;
			$this->template
			->set_layout('users')
			->build('add_order',isset($data) ? $data : NULL);
		}
	}




	private function process_upgrade($o_id) 
	{	
	 	$order =  $this->db->select('*')->from('orders')->join('items_saved','orders.item_parent = items_saved.item_id','inner')->where('o_id',$o_id)->get()->row();
		$domain =  $this->db->select('*')->from('orders')->where('domain',$order->domain)->get()->row();
		$package = $this->db->where(array('item_id'=> $order->item_parent))->get('items_saved')->row();
		
		if($order->renewal == 'annually') {
			$process_id = $domain->process_id; 
		}

		else {
			$process_id = time();
		}

  		$update = array(
			"status_id" => 6,
			"status_id" => 6,
			"order_id" => $domain->order_id,
			"process_id" => $process_id,
			"o_id" => 0
		); 
		
		$this->db->where('o_id', $o_id);  
		//activate cloned account
		if($this->db->update('orders', $update)) {
			$result = "Order updated. <br>";
			//update item
			$update_item = array(
				"item_name" => $order->item_name
			); 
			
			$this->db->where('item_id', $order->item);  
			$this->db->update('items', $update_item);

			//delete original account
			$this->db->where('id', $o_id);
			$this->db->delete('orders');

			if($order->server != null && config_item('demo_mode') != 'TRUE') {		

				$server = $this->db->where(array('id'=> $order->server))->get('servers')->row(); 

				if($package->reseller_package == 'No') {

					if($server->type == 'cpanel') {
						$this->load->library('Cpanel', trim($server->authkey)); 

						$params = array(
							'user' => $order->username,
							'pkg' => $order->package_name			
						);

						$response = $this->cpanel->call('changepackage', $params);
						$result .=  $response['metadata']['reason'];
					}


					if($server->type == 'directadmin') {										
						$req = array(
							'action' => 'package',
							'user' => $order->username,
							'package' => $order->package_name
						);					

						$this->load->library('DirectAdmin', trim($server->authkey));
						$response = $this->directadmin->query("CMD_API_MODIFY_USER", $req, "POST"); 
						$result .= $response['details'];
					} 


					if($server->type == 'plesk') { 	
						$this->load->library('Plesk', trim($server->authkey));
						$result = $this->plesk->changePackage($order->domain, $order->package_name); 
						$result .= $result;
					}
				}



				if($package->reseller_package == 'Yes') {

					if($server->type == 'cpanel') {
						$this->load->library('Cpanel', trim($server->authkey)); 

						$params = array(
							'user' => $order->username,
							'pkg' => $order->package_name			
						);

						$response = $this->cpanel->call('changepackage', $params);
						$result .=  $response['metadata']['reason'];
					}


					if($server->type == 'directadmin') {										
						$req = array(
							'action' => 'package',
							'user' => $order->username,
							'package' => $order->package_name
						);					

						$this->load->library('DirectAdmin', trim($server->authkey));
						$response = $this->directadmin->query("CMD_API_MODIFY_RESELLER", $req, "POST"); 
						$result .= $response['details'];
					} 


					if($server->type == 'plesk') { 	
						$this->load->library('Plesk', trim($server->authkey));
						$result = $this->plesk->changeReseller($order->domain, $order->package_name); 
						$result .= $result;
					}
				}
			}

			$this->session->set_flashdata('response_status', 'warning');
			$this->session->set_flashdata('message', $result);

			$from = $_SERVER['HTTP_REFERER'];
			$segments = explode('/', $from);
			
			if($segments[3] == 'invoices') {
				redirect('accounts');
			}
			
			else {
				redirect($_SERVER['HTTP_REFERER']);	
			}
					
		}
	}

	



	static function process($id)
	{
		$this->check_invoice($id);		
		if (config_item('automatic_activation') == 'TRUE') {

			$this->db->select('*');
			$this->db->from('orders');
			$this->db->join('items_saved','orders.item_parent = items_saved.item_id','LEFT');
			$this->db->join('invoices','orders.invoice_id = invoices.inv_id','inner');
			$this->db->where('inv_id', $id);
			$accounts = $this->db->get()->result();  

			if(count($accounts) == 1 && $accounts[0]->o_id > 0) {
				$this->process_upgrade($accounts[0]->o_id);
			}

			else {			 

			foreach($accounts AS $account) {

				$client =  Client::view_by_id($account->client_id);
				$user = User::view_user($client->primary_contact);
				$profile = User::profile_info($client->primary_contact);

				if($account->type == 'hosting') {	
					
					$update = array(
						"status_id" => 6,
						"server" => (null != $account->server && $account->server > 0 && $account->server != '') ? $account->server : $this->server	
					); 
					
					$this->db->where('id', $account->id);  
					if($this->db->update('orders', $update)) {

						$data = array(
							'user' => User::get_id(),
							'module' => 'accounts',
							'module_field_id' => $account->id,
							'activity' => 'activity_account_activated',
							'icon' => 'fa-usd',
							'value1' => $account->reference_no,
							'value2' => $account->inv_id
						);
							App::Log($data); 			
					}					
		
					 Order::send_account_details($account->id);
					 
					 $server = $this->db->where('id', $account->server)->get('servers')->row();
					 
					 if(!$server && !empty($this->server)) {
						$server = $this->db->where('id', $this->server)->get('servers')->row();
					 }
 
					 if ($server && config_item('demo_mode') != 'TRUE')
					 { 
					
						 if($server->type == 'cpanel') {								
								$params = array(
									'plan' => $account->package_name,
									'username' => $account->username,
									'password' => $account->password,
									'domain' => $account->domain,
									'contactemail' => $client->company_email,
									'cgi' => 1,
									'hasshell' => 1,
									'cpmod' => 'paper_lantern'
								);
								$this->load->library('Cpanel', trim($server->authkey));
								$response = $this->cpanel->call('createacct', $params);
							}

						if($server->type == 'directadmin') { 			
								$req = array(
									'action' => 'create',
									'package' => $account->package_name,
									'username' => $account->username,
									'passwd' => $account->password,
									'passwd2' => $account->password,
									'domain' => $account->domain,
									'email' => $client->company_email,
									'notify' => 'no',
									'ip' => gethostbyname($server->hostname)
								);					

								$this->load->library('DirectAdmin', trim($server->authkey));
								$response = $this->directadmin->query("CMD_API_ACCOUNT_USER", $req, "POST"); 
								$result .= $response['details'];
						}	


						if($server->type == 'plesk')  { 
						
							$req = array( 
									'package' => $account->package_name,
									'username' => $account->username,
									'password' => $account->password,
									'domain' => $account->domain,
									'email' => $client->company_email 
								);

								$data = (object) array('plan' => (object) $req, 'user' => $user, 'profile' => $profile, 'client' => $client); 
								$this->load->library('Plesk', trim($server->authkey));
								$res = $this->plesk->createAccount($data);
								$result .= $account->domain." ".$res;
						} 
								$data = array(
									'user' => User::get_id(),
									'module' => 'accounts',
									'module_field_id' => $account->id,
									'activity' => 'activity_cpanel_creation',
									'icon' => 'fa-usd',
									'value1' => $result,
									'value2' => $account->inv_id
								);
						}	

							App::Log($data);  				 
					 }
			 

				if($account->type == 'domain' || $account->type == 'domain_only') {
					$registrar = '';

					if(empty($account->registrar)) {
						$item = $this->db->where('item_id', $account->item_parent)->get('items_saved')->row();
						$item->default_registrar;

						$this->db->set('status_id', 6); 
						$this->db->set('registrar', $registrar);
						$this->db->where('id', $account->id);  
						$this->db->update('orders');
						}
						else {
							$registrar = $account->registrar;
						}
					 
						if(!empty($registrar)){

							$process = $account->domain. " activated!";

							if(config_item($registrar.'_live') == 'TRUE') { 
 	
							$action = '/register_domain';							
							if($account->item_name == lang('domain_renewal')) {
								$action = '/renew_domain';
							}
							if($account->item_name == lang('domain_transfer')) {
								$action = '/transfer_domain';
							}
 							$process .= modules::run($registrar.$action, $account->id);							 
							
							}

							$data = array(
								'user' => User::get_id(),
								'module' => 'accounts',
								'module_field_id' => $account->id,
								'activity' => $process,
								'icon' => 'fa-usd',
								'value1' =>  $account->domain,
								'value2' => ''
							);
								App::Log($data); // Log activity
						} 
					}
		  		}
			 			
			}
			
		}
	}
	
	
}
 

/* End of file orders.php */