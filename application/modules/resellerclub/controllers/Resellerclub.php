<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Resellerclub extends MX_Controller {

	function __construct()
	{
		parent::__construct();		
		User::logged_in();      
		$this->load->module('layouts');	
		$this->load->library(array('template'));  
		$this->load->model(array('User', 'Order', 'Client', 'App', 'Domain'));		
        require_once APPPATH.'/libraries/resellerclub/index.php';
	}  


	function index()
	{
		redirect('domains');
	} 


	
	function check_domain ($sld, $tld) 
	{ 
		$domain = new \Resellerclub\Domain;
		$apiOut = $domain->checkAvailability($sld, array($tld));
		$result = json_encode($apiOut);	
		$result = json_decode($result, true);
 
		if(isset($result[$sld.'.'.$tld]) && $result[$sld.'.'.$tld]['status'] === "available") {
			return 1;
		}

		else {
			return 0;
		}	 
	}


    
	function create_contact($customer_id, $client, $domain, $id)
	{ 
		$rc_data = Order::get_resellerclub_ids($domain);
		if(isset($rc_data->contact_id) && $rc_data->contact_id != 0) {
			return $rc_data->contact_id;
		}

		$contact = new \Resellerclub\Contact;

		$contactDetails = array(
		'name' => User::displayName($client->primary_contact),
		'company' => ($client->individual == 0) ? 'N/A' : $client->company_name,
		'email' => $client->company_email,
		'address-line-1' => $client->company_address,
		'city' => $client->city,
		'state' => $client->state,
		'country' => App::country_code($client->country),
		'zipcode' => $client->zip,
		'phone-cc' => App::dialing_code($client->country),
		'phone' => $client->company_phone,
		'customer-id' => $customer_id,
		'type' => $this->contact_type($domain),
		);

		//$contactDetails = array_merge($contactDetails, $this->contact_fields($id, $client));

		$result = $contact->createContact($contactDetails);

		if(is_numeric($result)) {
			$this->db->set('contact_id', $result); 
			$this->db->where('domain', $domain);  
			$this->db->update('resellerclub_ids');
		}

		else {
			if(strtoupper($result->status) == "ERROR") {
				return (isset($result->message)) ? "Domain Contact: ".$result->message : "Domain Contact: ".$result->error;
			} 

			else {
				return lang('resellerclub_contact_error');
			}
		}		

		return $result;	 
	}    



	function create_admin_contact($customer_id, $domain)
	{ 
		$rc_data = Order::get_resellerclub_ids($domain);
		if(isset($rc_data->admin_id) && $rc_data->admin_id != 0) {
			return $rc_data->admin_id;
		}

		$contact = new \Resellerclub\Contact;

		$contactDetails = array(
		'name' => config_item('domain_admin_firstname')." ".config_item('domain_admin_lastname'),
		'company' => config_item('domain_admin_company'),
		'email' => config_item('domain_admin_email'),
		'address-line-1' => config_item('domain_admin_address_1')." ".config_item('domain_admin_address_2'),
		'city' => config_item('domain_admin_city'),
		'state' => config_item('domain_admin_state'),
		'country' => App::country_code(config_item('domain_admin_country')),
		'zipcode' => config_item('domain_admin_zip'),
		'phone-cc' => App::dialing_code(config_item('domain_admin_country')),
		'phone' => config_item('domain_admin_phone'),
		'customer-id' => $customer_id,
		'type' => 'Contact',
		);

		$result = $contact->createContact($contactDetails);
		if(is_numeric($result)) {
			$this->db->set('admin_id', $result); 
			$this->db->where('domain', $domain);  
			$this->db->update('resellerclub_ids');
		}

		else {
			if(strtoupper($result->status) == "ERROR") {
				return (isset($result->message)) ? "Admin Contact: ".$result->message : "Admin Contact: ".$result->error;
			} 

			else {
				return "Could not create domain admin contact in resellerclub!";
			}
		}	

		return $result;	 
	}    



	function get_customer ($email) {
		$customer = new \Resellerclub\Customer;
		$apiOut = $customer->getCustomerByUserName($email);
		return $apiOut;		 
	}



	function get_details ($order_id, $options) {
		$domain = new \Resellerclub\Domain;
		$apiOut = $domain->getDomainDetailsByOrderId($order_id, $options);
		return $apiOut;		 
	}



	function suspend_domain () {
		$id = $this->input->post('id');
		$reason = $this->input->post('reason');
		$order = Order::get_order($id);
		$domain = Order::get_resellerclub_ids($order->domain);
		$action = new \Resellerclub\Domain;
		$result = $action->suspendDomain($domain->order_id, $reason);
		
		if( strtoupper($result->status) == "ERROR" ) 
		{ 		
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', (isset($result->message)) ? $result->message : $result->error);			
			redirect($_SERVER['HTTP_REFERER']);	
		} 

		if($result->actionstatusdesc) {

			$this->db->set('status_id', 9); 
			$this->db->where('id', $id);  
			$this->db->update('orders');

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', $result->actionstatusdesc);			
			redirect($_SERVER['HTTP_REFERER']);		 
		} 
	}
	
	


	function unsuspend_domain ($id) { 

		$order = Order::get_order($id);
		$domain = Order::get_resellerclub_ids($order->domain);
		$action = new \Resellerclub\Domain;
		$result = $action->unsuspendDomain($domain->order_id);
		
		if( strtoupper($result->status) == "ERROR" ) 
		{ 
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', (isset($result->message)) ? $result->message : $result->error);			
			redirect($_SERVER['HTTP_REFERER']);	
		} 

		if($result->actionstatusdesc) {

			$this->db->set('status_id', 6); 
			$this->db->where('id', $id);  
			$this->db->update('orders');

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', $result->actionstatusdesc);			
			redirect($_SERVER['HTTP_REFERER']);	
		} 
	}


	



	static function renew_domain ($id)
	{ 
		$order = Order::get_order($id);
		$client = Client::view_by_id($order->client_id);
		$domain = Order::get_resellerclub_ids($order->domain);
		$options = 'OrderDetails';
		$details = $this->get_details($domain->order_id, $options);

		if($details->endtime) {

			$action = new \Resellerclub\Domain;	
			
			$domainDetails = array(
			'years' => '1',
			'exp-date' => $details->endtime, 
			'auto-renew' => false,
			'invoice-option' => 'NoInvoice',
			);


			$result = $action->renew($domain->order_id, $domainDetails);

			if( strtoupper($result->status) == "ERROR" ) 
			{ 
				return (isset($result->message)) ? $result->message : $result->error; 
			} 				 

				$this->db->set('status_id', 6); 
				$this->db->where('id', $id);  
				$this->db->update('orders');

				return $result->actionstatus; 
		}
	}



	function create_customer ($client, $domain) 
	{ 		
		$customer = new \Resellerclub\Customer;

		$customerDetails = array(
		'username' => $client->company_email,
		'passwd' => $this->generatePassword(),
		'name' => User::displayName($client->primary_contact),
		'company' => ($client->individual == 0) ? 'N/A' : $client->company_name,
		'address-line-1' => $client->company_address,
		'city' => $client->city,
		'state' => $client->state,
		'country' => App::country_code($client->country),
		'zipcode' => $client->zip,
		'phone-cc' => App::dialing_code($client->country),
		'phone' => $client->company_mobile,
		'lang-pref' => 'en',
		);
 
		$customerId = $customer->createCustomer($customerDetails);
		if(is_numeric($customerId)) {
			if($this->db->where('domain', $domain)->get('resellerclub_ids')->num_rows() == '0'){
				$data = array('customer_id' => $customerId, 'domain' => $domain);
				App::save_data('resellerclub_ids', $data);
			}
		}

		else {
			if($result && strtoupper($result->status) == "ERROR") {
				return (isset($result->message)) ? "Create Customer: ".$result->message : "Create Customer: ".$result->error;
			} 

			else {
				return lang('resellerclub_customer_error');
			}
		}	

		return $result;
	}


  
	function update_nameservers ($id)
	{

		$order = Order::get_order($id);
		$domain = Order::get_resellerclub_ids($order->domain);
		$nameservers = array();
			if($this->input->post('nameserver_1') != '') {
				$nameservers[] = $this->input->post('nameserver_1');
			}
			if($this->input->post('nameserver_2') != '') {
				$nameservers[] = $this->input->post('nameserver_2');
			}
			if($this->input->post('nameserver_3') != '') {
				$nameservers[] = $this->input->post('nameserver_3');
			}
			if($this->input->post('nameserver_4') != '') {
				$nameservers[] = $this->input->post('nameserver_4');
			} 

		$action = new \Resellerclub\Domain;
			
		$result = $action->setNameServer($domain->order_id, $nameservers);		
		
		if( strtoupper($result->status) == "ERROR" ) 
		{ 
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', (isset($result->message)) ? $result->message : $result->error);			
			redirect($_SERVER['HTTP_REFERER']);	
		} 

		if($result->actionstatusdesc) {

			$nameservers = $this->input->post('nameserver_1', true).",".$this->input->post('nameserver_2', true);
			if($this->input->post('nameserver_3', true) != '') : $nameservers .= ",".$this->input->post('nameserver_3', true); endif;
			if($this->input->post('nameserver_4', true) != '') : $nameservers .= ",".$this->input->post('nameserver_4', true); endif;
			$this->db->set('nameservers', $nameservers); 
			$this->db->where('id', $id);  
			$this->db->update('orders');

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', $result->actionstatusdesc);			
			redirect($_SERVER['HTTP_REFERER']);	
		}  
	}
	



	static function register_domain ($id)
	{ 
		$order = Order::get_order($id);
		$client = Client::view_by_id($order->client_id);

		$domain = new \Resellerclub\Domain;	

		$result = $this->get_customer($client->company_email); 
		if(isset($result->status) && strtoupper($result->status == "ERROR" ))
		{
			$customerId = $this->create_customer($client, $order->domain);
		}

		elseif($result->customerid) {
			$customerId = $result->customerid;

			if($this->db->where('domain', $order->domain)->get('resellerclub_ids')->num_rows() == '0'){
				$data = array('customer_id' => $customerId, 'domain' => $order->domain);
				App::save_data('resellerclub_ids', $data);
			}
			else {
				$this->db->set('customer_id', $customerId); 
				$this->db->where('domain', $order->domain);  
				$this->db->update('resellerclub_ids');
			}
		}

		else {
				return $error;	  
			
		}
	

		if(is_numeric($customerId) ) 
		{
			$contact = $this->create_contact($customerId, $client, $order->domain, $id);
			if(!is_numeric($contact)) 
			{	
				return $contact;				 	
			}

			$contactId = $contact;

			$admin = $this->create_admin_contact($customerId, $order->domain);
			if(!is_numeric($admin)) 
			{ 
				return $admin;
				 
			}

			$adminId = $admin;
		}

		else {
				return $customerId;				 
			}		 

		if($order->nameservers != '') {
			$nameservers = explode(",", $order->nameservers);

			if(count($nameservers) > 1) {
				$nameservers = $nameservers;
			}
		}
		

		else {
			$nameservers = array();
			if(config_item('nameserver_one') != '') {
				$nameservers[] = config_item('nameserver_one');
			}
			if(config_item('nameserver_two') != '') {
				$nameservers[] = config_item('nameserver_two');
			}
			if(config_item('nameserver_three') != '') {
				$nameservers[] = config_item('nameserver_three');
			}
			if(config_item('nameserver_four') != '') {
				$nameservers[] = config_item('nameserver_four');
			}
			if(config_item('nameserver_five') != '') {
				$nameservers[] = config_item('nameserver_five');
			}
		
		}
		 
		

		$domainDetails = array(
		'years' => '1',
		'ns' => $nameservers,
		'customer-id' => $customerId,
		'reg-contact-id' => $contactId,
		'admin-contact-id' => $adminId,
		'tech-contact-id' => $adminId,
		'billing-contact-id' => $adminId,
		'invoice-option' => 'NoInvoice',
		);


		$result = $domain->register($order->domain, $domainDetails);

		if( strtoupper($result->status) == "ERROR" ) 
		{ 
			return "Resellerclub: ". (isset($result->message)) ? $result->message : $result->error;
			
		} 

		if($result->entityid) {
			$this->db->set('order_id', $result->entityid); 
			$this->db->where('domain', $order->domain);  
			$this->db->update('resellerclub_ids');
		} 

		return "Resellerclub: " .$order->domain. " " .$response;
		
	}



	static function transfer_domain ($id)
	{ 
		$order = Order::get_order($id);
		$client = Client::view_by_id($order->client_id);

		$domain = new \Resellerclub\Domain;	

		$result = $this->get_customer($client->company_email); 
		if(isset($result->status) && strtoupper($result->status == "ERROR" ))
		{
			$customerId = $this->create_customer($client, $order->domain);
		}

		elseif($result->customerid) {
			$customerId = $result->customerid;
			
			if($this->db->where('domain', $order->domain)->get('resellerclub_ids')->num_rows() == '0'){
				$data = array('customer_id' => $customerId, 'domain' => $order->domain);
				App::save_data('resellerclub_ids', $data);
			}
			else {
				$this->db->set('customer_id', $customerId); 
				$this->db->where('domain', $order->domain);  
				$this->db->update('resellerclub_ids');
			}
		}

		else {
			$error = 'Could not get response. Please check your reseller club settings!';
			return $error;
		}
	

		if(is_numeric($customerId) ) 
		{
			$contact = $this->create_contact($customerId, $client, $order->domain);
			if(!is_numeric($contact)) 
			{					 
				return "Domain Contact: ".$contact;			
				 
			}

			$contactId = $contact;

			$admin = $this->create_admin_contact($customerId, $order->domain);
			if(!is_numeric($admin)) 
			{					 
				return "Admin Contact: ".$admin; 	
			}

			$adminId = $admin;
		}

		else {
				return $customerId;
			}		 

		if($order->nameservers != '') {
			$nameservers = explode(",", $order->nameservers);

			if(count($nameservers) > 1) {
				$nameservers = $nameservers;
			}
		}
			

			else {
				$nameservers = array();
				if(config_item('nameserver_one') != '') {
					$nameservers[] = config_item('nameserver_one');
				}
				if(config_item('nameserver_two') != '') {
					$nameservers[] = config_item('nameserver_two');
				}
				if(config_item('nameserver_three') != '') {
					$nameservers[] = config_item('nameserver_three');
				}
				if(config_item('nameserver_four') != '') {
					$nameservers[] = config_item('nameserver_four');
				}
				if(config_item('nameserver_five') != '') {
					$nameservers[] = config_item('nameserver_five');
				}
			
			}
			
			

			$domainDetails = array(
			'years' => '1',
			'ns' => $nameservers,
			'customer-id' => $customerId,
			'reg-contact-id' => $contactId,
			'admin-contact-id' => $adminId,
			'tech-contact-id' => $adminId,
			'billing-contact-id' => $adminId,
			'auth-code' => $order->authcode,
			'domain-name' => $order->domain,
			'auto-renew' => false,
			'invoice-option' => 'NoInvoice',
			);


			$result = $domain->transfer($order->domain, $domainDetails);

			if( strtoupper($result->status) == "ERROR" ) 
			{ 
				return (isset($result->message)) ? $result->message : $result->error; 
			} 
				
				$response = lang('transfer_initiated');
				return $response;		 
	}



	function generatePassword()
	{
		$password_string = 'abcdefghijklmnpqrstuwxyzABCDEFGHJKLMNPQRSTUWXYZ123456789';		 
		return substr(str_shuffle($password_string), 0, 10);
	}




	function contact_details ($id) {
		$contact = new \Resellerclub\Contact;
		$apiOut = $contact->getContact($id);
		return $apiOut;		 
	}



	function check_balance () {
		$account = new \Resellerclub\Billing;
		$result = $account->getResellerBalance(config_item('resellerclub_resellerid')); 
		$data = array();
		if(isset($result->status) && strtoupper($result->status) == "ERROR") {
			$data['response'] = (isset($result->message)) ? $result->message : $result->error;
		} 

		else {
			$data['response'] = $result->sellingcurrencybalance. " " .$result->sellingcurrencysymbol;
		}	
		
		$this->load->view('balance', $data);
	}




	function create_order($item, $co_id, $domain)
    {
 
        $items = array(
            'invoice_id' 	=> 0,
            'item_name'		=> 'Domain Imported',
            'item_desc'		=> '-',
            'unit_cost'		=> $item->renewal,
            'item_order'	=> 1,
            'item_tax_rate'	=> 0,
            'item_tax_total'=> 0,
            'quantity'		=> 1,
            'total_cost'	=> $item->renewal
            );
            
        $item_id = App::save_data('items', $items);
        $time = strtotime($domain['details']->Created);
		$created = $domain['details']->Created; 
		$expires = $domain['details']->Expires;

		
	 
        $order = array(
            'client_id' 	=> $co_id,
			'invoice_id'    => 0,
			'date'          => date('Y-m-d H:i:s'),
            'nameservers'	=> (null != $domain['details']->Nameservers) ? $domain['details']->Nameservers : '',
            'item'		    => $item_id,
            'domain'        => $domain['details']->Domain,
            'item_parent'   => $item->item_id,
            'type'		    => 'domain_only',
            'process_id'    => $time,
			'order_id'      => $time,
			'registrar' 	=> 'resellerclub',
            'fee'           => 0,
            'processed'     => $created, 
            'renewal_date'  => $expires,
			'status_id'     => ($domain['details']->Status == "Active") ? 6 : 5, 
            'renewal'       => 'annually'
		);    
		
		if($order_id = App::save_data('orders', $order)) 
		{ 
			return true;
		}
 
	}
	



	public function import_domains()
	{
		if($this->input->post()) 
		{
			$count = 0;			
		 
			$list = $this->input->post();

			if(count($list) > 0) {
				$accounts = $this->session->userdata('import');
				$domains = array();
		
					foreach($accounts as $account) {
						foreach($list as $key => $li) { 
							if($account->Domain == str_replace("_",".",$key)) { 

								$result = $this->contact_details($account->Contact_id); 
 
								if(isset($result->status) && strtoupper($result->status == "ERROR" ))
								{
									$this->session->set_flashdata('response_status', 'warning');
									$this->session->set_flashdata('message', $result->message);			
									redirect($_SERVER['HTTP_REFERER']);	
								}

								elseif($result) {
									$details = array('contact' => (object) $result, 'details' => $account);
									$domains[] = $details; 
								}								  								
							}					
						}			
					}
		  
			 

				foreach($domains as $domain) {
	
					$tld = explode('.', $domain['details']->Domain, 2);
					$ext = $tld[1]; 
					$item = $this->db->where('item_name', $ext)->join('item_pricing', 'item_pricing.item_id = items_saved.item_id')->get('items_saved')->row();
					$client = $this->db->where('company_email', $domain['contact']->emailaddr)->get('companies')->row();
		
					if(is_object($item)) {
						if(is_object($client)) {
	
							if($this->db->where('domain', $domain['details']->Domain)->where('(type = "domain" OR type = "domain_only")')->get('orders')->num_rows() == 0) { 							
								if($this->create_order($item, $client->co_id, $domain)) {
									$count++;
								}
							}					   
						}
						else
						{
							$username = explode('@', $domain['contact']->emailaddr)[0];
                            $email = $domain['contact']->emailaddr; 
                            $password = $domain['contact']->emailaddr; 
                            
                            $hasher = new PasswordHash(
                                $this->config->item('phpass_hash_strength', 'tank_auth'),
								$this->config->item('phpass_hash_portable', 'tank_auth')
							);
							
							$hashed_password = $hasher->HashPassword($password);
                                        
                            if (!is_username_available($username)) {    
                                $username = explode('.', $domain['details']->Domain, 2)[0]; 
                            }                             
                                                           
                                $data = array(
                                    'username'	=> $username, 
                                    'password'  => $hashed_password,
                                    'email'		=> $email,
                                    'role_id'	=> 2 
                                );
            
                                $user_id = App::save_data('users', $data); 
                                
								$client = array(   
									'company_name'          => $domain['contact']->name,
									'company_email'         => $domain['contact']->emailaddr,                       
									'company_ref'			=> $this->applib->generate_string(), 
									'language' 				=> config_item('default_language'),
									'currency' 				=> config_item('default_currency'),
									'primary_contact'       => $user_id,
									'individual' 			=> 0, 
									'company_address' 		=> $domain['contact']->address1,                         
									'company_phone'		  	=> $domain['contact']->telno,
									'city'				  	=> $domain['contact']->city,
									'state'			      	=> $domain['contact']->state,
									'zip'				  	=> $domain['contact']->zip,
									'country'			  	=> $domain['contact']->country
									); 

                                if($co_id = App::save_data('companies', $client)) {
                                    
                                    $profile = array(
                                        'user_id'           => $user_id,
                                        'company'	        => $co_id,
                                        'fullname'	        => $domain['contact']->name,
                                        'phone'		        => $domain['contact']->telno,
                                        'avatar'	        => 'default_avatar.jpg',
                                        'language'	        => config_item('default_language'),
                                        'locale'	        => config_item('locale') ? config_item('locale') : 'en_US'
                                    );
                
									App::save_data('account_details', $profile); 
						 
								if($this->create_order($item, $co_id, $domain)) {
									$count++; 
								} 
							}	
						}	
					}
				}
				 
				$this->session->unset_userdata('import');
			}			

			$this->session->set_flashdata('response_status', 'info');
			$this->session->set_flashdata('message', "Created ".$count." accounts");			
			redirect($_SERVER['HTTP_REFERER']);
		}
		else 
		{
 			$this->template->title(lang('import'));
			$data['page'] = 'Namecheap';	
			$data['datatables'] = TRUE; 
			$data['domains'] = $this->get_accounts();
			$this->template
			->set_layout('users')
			->build('import',isset($data) ? $data : NULL); 
		}
	}




	
	function upload()
	{		 
		if($this->input->post()) {

			$this->load->library('excel');
			ob_start();
			$file = $_FILES["import"]["tmp_name"];
			if (!empty($file)) {
				$valid = false;
				$types = array('Excel2007', 'Excel5', 'CSV');
				foreach ($types as $type) {
					$reader = PHPExcel_IOFactory::createReader($type);
					if ($reader->canRead($file)) {
						$valid = true;
					}
				}
				if (!empty($valid)) {
					try {
						$objPHPExcel = PHPExcel_IOFactory::load($file);
					} catch (Exception $e) {
						$this->session->set_flashdata('response_status', 'warning');
						$this->session->set_flashdata('message', "Error loading file:" . $e->getMessage());			
						redirect($_SERVER['HTTP_REFERER']);	
					
					}
					$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
					$domains = array();
					$list = array();
					for ($x = 2; $x <= count($sheetData); $x++) {					
						$domain = array();					 
						$domain['Domain'] = trim($sheetData[$x]["B"]);
						$domain['Created'] = date('Y-m-d', strtotime($sheetData[$x]["D"]));
						$domain['EmailAddress'] = trim($sheetData[$x]["E"]);
						$domain['Contact_id'] = trim($sheetData[$x]["F"]);
						$domain['Status'] = trim($sheetData[$x]["J"]);   
						$domain['Expires'] = date('Y-m-d', strtotime($sheetData[$x]["K"])); 
						$domains[] = (object) $domain;						
					}	
					
					$this->session->set_userdata('import', $domains);

				} else {
					$this->session->set_flashdata('response_status', 'warning');
					$this->session->set_flashdata('message', lang('not_csv'));			
					redirect($_SERVER['HTTP_REFERER']);	
				}
			} else {
				$this->session->set_flashdata('response_status', 'warning');
				$this->session->set_flashdata('message', lang('no_csv'));			
				redirect($_SERVER['HTTP_REFERER']);	
			}			
				$this->template->title(lang('import'));
				$data['page'] = 'ResellerClub';	 
				$data['domains'] = $domains; 
				$this->template
				->set_layout('users')
				->build('import',isset($data) ? $data : NULL); 
			}

		else {
			$this->template->title(lang('import'));
			$data['page'] = 'ResellerClub';	 
			$this->template
			->set_layout('users')
			->build('upload',isset($data) ? $data : NULL);
		}
	}





	function domain_end($domain) {
		$domain_parts = explode('.', $domain);
		return $domain_parts[count($domain_parts) - 1];
	}





	function contact_type($domain)
	{
		$ext = $this->domain_end($domain);
		
		$contacttype = "contact";
			
		if( $ext == "uk" ) 
		{
			$contacttype = "UkContact";
		}
		else
		{
			if( $ext == "eu" ) 
			{
				$contacttype = "EuContact";
			}
			else
			{
				if( $ext == "cn" ) 
				{
					$contacttype = "CnContact";
				}
				else
				{
					if( $ext == "co" ) 
					{
						$contacttype = "CoContact";
					}
					else
					{
						if( $ext == "ca" ) 
						{
							$contacttype = "CaContact";
						}
						else
						{
							if( $ext == "es" ) 
							{
								$contacttype = "EsContact";
							}
							else
							{
								if( $ext == "de" ) 
								{
									$contacttype = "DeContact";
								}
								else
								{
									if( $ext == "ru" ) 
									{
										$contacttype = "RuContact";
									}
									else
									{
										if( $ext == "nl" ) 
										{
											$contacttype = "NlContact";
										}
										else
										{
											if( $ext == "mx" ) 
											{
												$contacttype = "MxContact";
											}
											else
											{
												if( $ext == "br" ) 
												{
													$contacttype = "BrContact";
												}
												else
												{
													if( $ext == "nyc" ) 
													{
														$contacttype = "NycContact";
													}
													else
													{
														if( $ext == "tel" ) 
														{
															$contacttype = "Contact";
														}
														else
														{
															$contacttype = "Contact";
														}

													}

												}

											}

										}

									}

								}

							}

						}

					}

				}

			}

		}

		return $contacttype;
	}
 

	function contact_fields($id, $params)
	{

		$order = Order::get_order($id);
		$fields = array();
		$ext = $this->domain_end($order->domain);
		$fields = $this->db->where('domain', $order->additional_fields)->get('additional_fields')->result();

		$domain_fields = array();
		$params = (array) $params;

		foreach($fields as $key => $field) {
			$domain_fields[$field->field_name] = $field->field_value;
		}
 

		if( $ext == "us" ) 
		{
			$purpose = $domain_fields["Application Purpose"];
			$category = $domain_fields["Nexus Category"];
			if( $purpose == "Business use for profit" ) 
			{
				$purpose = "P1";
			}
			else
			{
				if( $purpose == "Non-profit business" || $purpose == "Club" || $purpose == "Association" || $purpose == "Religious Organization" ) 
				{
					$purpose = "P2";
				}
				else
				{
					if( $purpose == "Personal Use" ) 
					{
						$purpose = "P3";
					}
					else
					{
						if( $purpose == "Educational purposes" ) 
						{
							$purpose = "P4";
						}
						else
						{
							if( $purpose == "Government purposes" ) 
							{
								$purpose = "P5";
							}
	
						}
	
					}
	
				}
	
			}
	
			$fields["attr-name1"] = "purpose";
			$fields["attr-value1"] = (string) $purpose;
			$fields["attr-name2"] = "category";
			$fields["attr-value2"] = (string) $category;
			$fields["product-key"] = "domus";
		}
		else
		{
			if( $ext == "uk" ) 
			{
				if( $domain_fields["Registrant Name"] ) 
				{
					$fields["name"] = $domain_fields["Registrant Name"];
				}
	
			}
			else
			{
				if( $ext == "ca" ) 
				{
					if( $domain_fields["Legal Type"] == "Corporation" ) 
					{
						$legaltype = "CCO";
					}
					else
					{
						if( $domain_fields["Legal Type"] == "Canadian Citizen" ) 
						{
							$legaltype = "CCT";
						}
						else
						{
							if( $domain_fields["Legal Type"] == "Permanent Resident of Canada" ) 
							{
								$legaltype = "RES";
							}
							else
							{
								if( $domain_fields["Legal Type"] == "Government" ) 
								{
									$legaltype = "GOV";
								}
								else
								{
									if( $domain_fields["Legal Type"] == "Canadian Educational Institution" ) 
									{
										$legaltype = "EDU";
									}
									else
									{
										if( $domain_fields["Legal Type"] == "Canadian Unincorporated Association" ) 
										{
											$legaltype = "ASS";
										}
										else
										{
											if( $domain_fields["Legal Type"] == "Canadian Hospital" ) 
											{
												$legaltype = "HOP";
											}
											else
											{
												if( $domain_fields["Legal Type"] == "Partnership Registered in Canada" ) 
												{
													$legaltype = "PRT";
												}
												else
												{
													if( $domain_fields["Legal Type"] == "Trade-mark registered in Canada" ) 
													{
														$legaltype = "TDM";
													}
													else
													{
														$legaltype = "CCO";
													}
	
												}
	
											}
	
										}
	
									}
	
								}
	
							}
	
						}
	
					}
	
					$fields["attr-name1"] = "CPR";
					$fields["attr-value1"] = (string) $legaltype;
					$fields["attr-name2"] = "AgreementVersion";
					$fields["attr-value2"] = "2.0";
					$fields["attr-name3"] = "AgreementValue";
					$fields["attr-value3"] = "y";
					$fields["product-key"] = "dotca";
				}
				else
				{
					if( $ext == "es" ) 
					{
						 
						$legaltype =  false;

						if( !$legaltype ) 
						{
							$legaltype = "1";
						}
	
						if( $legaltype == "1" ) 
						{
							$fields["company"] = "N/A";
						} 

						$idtype = $domain_fields["ID Form Type"];
						if( $idtype == "Other Identification" ) 
						{
							$idtype = 0;
						}
						else
						{
							if( $idtype == "Tax Identification Number" || $idtype == "Tax Identification Code" ) 
							{
								$idtype = 1;
							}
							else
							{
								if( $idtype == "Foreigner Identification Number" ) 
								{
									$idtype = 3;
								}
	
							}
	
						}
	
						$idnumber = $domain_fields["ID Form Number"];
						$fields["attr-name1"] = "es_form_juridica";
						$fields["attr-value1"] = (string) $legaltype;
						$fields["attr-name2"] = "es_tipo_identificacion";
						$fields["attr-value2"] = (string) $idtype;
						$fields["attr-name3"] = "es_identificacion";
						$fields["attr-value3"] = (string) $idnumber;
						$fields["product-key"] = "dotes";
					}
					else
					{
						if( $ext == "asia" ) 
						{
							$fields["attr-name1"] = "locality";
							$fields["attr-value1"] = $params["country"];
							$fields["attr-name2"] = "legalentitytype";
							$fields["attr-value2"] = $domain_fields["Legal Type"];
							$fields["attr-name3"] = "identform";
							$fields["attr-value3"] = $domain_fields["Identity Form"];
							$fields["attr-name4"] = "identnumber";
							$fields["attr-value4"] = $domain_fields["Identity Number"];
							$fields["product-key"] = "dotasia";
						}
						else
						{
							if( $ext == "ru" ) 
							{
								$fields["attr-name1"] = "contract-type";
								if( $domain_fields["Registrant Type"] == "ORG" ) 
								{
									$fields["attr-value1"] = "ORG";
									$fields["attr-name3"] = "org-r";
									$fields["attr-value3"] = $params["company_name"];
									$fields["attr-name6"] = "kpp";
									$fields["attr-value6"] = $domain_fields["Russian Organizations Territory-Linked Taxpayer Number 2"];
									$fields["attr-name7"] = "code";
									$fields["attr-value7"] = $domain_fields["Russian Organizations Taxpayer Number 1"];
								}
								else
								{
									$fields["attr-value1"] = "PRS";
									$fields["attr-name2"] = "birth-date";
									$dateParts = explode("-", $domain_fields["Individuals Birthday"]);
									$fields["attr-value2"] = $dateParts[2] . "." . $dateParts[1] . "." . $dateParts[0];
									$fields["attr-name4"] = "person-r";
									$fields["attr-value4"] = (string) $params["company_name"];
									$fields["attr-name8"] = "passport";
									$dateParts = explode("-", $domain_fields["Individuals Passport Issue Date"]);
									$passportIssuanceDate = $dateParts[2] . "." . $dateParts[1] . "." . $dateParts[0];
									$fields["attr-value8"] = $domain_fields["Individuals Passport Number"] . ", issued by " . $domain_fields["Individuals Passport Issuer"] . ", " . $passportIssuanceDate;
								}
	
								$fields["attr-name5"] = "address-r";
								$fields["attr-value5"] = (string) $params["company_address"] . " " . $params["city"] . " " . $params["state"] . " " . $params["country"] . " " . $params["zip"];
							}
							else
							{
								if( $ext == "pro" ) 
								{
									$fields["attr-name1"] = "profession";
									$fields["attr-value1"] = $domain_fields["Profession"];
									$fields["product-key"] = "dotpro";
								}
								else
								{
									if( $ext == "nl" ) 
									{
										$fields["attr-name1"] = "legalForm";
										$fields["attr-value1"] = ($params["company_name"] ? "ANDERS" : "PERSOON");
										$fields["product-key"] = "dotnl";
									}
									else
									{
										if( $ext == "tel" ) 
										{
											$fields["attr-name1"] = "whois-type";
											if( $domain_fields["Legal Type"] == "Natural Person" ) 
											{
												$fields["attr-value1"] = "Natural";
											}
											else
											{
												if( $domain_fields["Legal Type"] == "Legal Person" ) 
												{
													$fields["attr-value1"] = "Legal";
												}
	
											}
	
										}
	
									}
	
								}
	
							}
	
						}
	
					}
	
				}
	
			}
	
		}
	
		return $fields;
	}

}


////end 