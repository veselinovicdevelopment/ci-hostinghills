<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Namecheap extends MX_Controller 
	{
		private $api_url;
		private $api_user;
		private $api_key;
		private $api_ip;

		public $Response;
		public $Error;
		public $Raw;
	 

		public function __construct() {
			parent::__construct();		
			User::logged_in();        
			$this->load->module('layouts');
        	$this->load->library(array('template'));
			$this->load->model(array('User', 'Order', 'Client', 'App', 'Domain'));	 
		 
			$this->api_url = (config_item('demo_mode') == 'TRUE') ? 'https://api.sandbox.namecheap.com/xml.response' : 'https://api.namecheap.com/xml.response';		 
			$this->api_key = config_item('namecheap_apikey');
			$this->api_user = config_item('namecheap_username');
			$this->api_ip = $this->detect_ip();
		}


		public function check_domain($sld, $tld)
		{ 
			if ( ! $this->execute( 'namecheap.domains.check', array( 'DomainList' => $sld.'.'.$tld ) ) ) {

				$this->session->set_flashdata('response_status', 'danger');
				$this->session->set_flashdata('message', $this->Error);			
				return false;
			}

			 if (null !== $this->Response->DomainCheckResult->attributes() 
			 && 'true' === strtolower( $this->Response->DomainCheckResult->attributes()->Available ) )
			{
				return 1;
			}

			else {
				return 0;
			}

		}
 
		
		public function register_domain($id, $years = 1) { 
			
			$order = Order::get_order($id);
			$client = Client::view_by_id($order->client_id);
			$name = explode(' ', User::displayName($client->primary_contact));
			$first_name = $name[0];
			$last_name = (isset($name[1])) ? $name[1] : $name[0];

			$data = array(); 
			$data["DomainName"] = $order->domain;
			$data["Years"] = $years;
			$data["AuxBillingFirstName"] = config_item('domain_admin_firstname');
			$data["AuxBillingLastName"] = config_item('domain_admin_lastname');
			$data["AuxBillingAddress1"] =  config_item('domain_admin_address_1')." ".config_item('domain_admin_address_2');
			$data["AuxBillingStateProvince"] = config_item('domain_admin_state');
			$data["AuxBillingPostalCode"] = config_item('domain_admin_zip');
			$data["AuxBillingCountry"] = App::country_code(config_item('domain_admin_country'));
			$data["AuxBillingPhone"] = "+".App::dialing_code(config_item('domain_admin_country')).".".config_item('domain_admin_phone');
			$data["AuxBillingEmailAddress"] = config_item('domain_admin_email');
			$data["AuxBillingCity"] = config_item('domain_admin_city');
			$data["TechFirstName"] = config_item('domain_admin_firstname');
			$data["TechLastName"] = config_item('domain_admin_lastname');
			$data["TechAddress1"] = config_item('domain_admin_address_1')." ".config_item('domain_admin_address_2');
			$data["TechStateProvince"] = config_item('domain_admin_state');
			$data["TechPostalCode"] = config_item('domain_admin_zip');
			$data["TechCountry"] = App::country_code(config_item('domain_admin_country'));
			$data["TechPhone"] = "+".App::dialing_code(config_item('domain_admin_country')).".".config_item('domain_admin_phone');
			$data["TechEmailAddress"] = config_item('domain_admin_email');
			$data["TechCity"] = config_item('domain_admin_city');
			$data["AdminFirstName"] = config_item('domain_admin_firstname');
			$data["AdminLastName"] = config_item('domain_admin_lastname');
			$data["AdminAddress1"] = config_item('domain_admin_address_1')." ".config_item('domain_admin_address_2');
			$data["AdminStateProvince"] = config_item('domain_admin_state');
			$data["AdminPostalCode"] = config_item('domain_admin_zip');
			$data["AdminCountry"] = App::country_code(config_item('domain_admin_country'));
			$data["AdminPhone"] = "+".App::dialing_code(config_item('domain_admin_country')).".".config_item('domain_admin_phone');
			$data["AdminEmailAddress"] = config_item('domain_admin_email');
			$data["AdminCity"] = config_item('domain_admin_city');
			$data["RegistrantFirstName"] = $first_name;
			$data["RegistrantLastName"] = $last_name;
			$data["RegistrantAddress1"] = $client->company_address;
			$data["RegistrantStateProvince"] = $client->state;
			$data["RegistrantPostalCode"] = $client->zip;
			$data["RegistrantCountry"] = App::country_code($client->country);
			$data["RegistrantPhone"] = "+".App::dialing_code($client->country).".".$client->company_phone;
			$data["RegistrantEmailAddress"] = $client->company_email;
			$data["RegistrantCity"] = $client->city;
			$data["Nameservers"] = $order->nameservers;
			

			if ( ! $this->execute( 'namecheap.domains.create', $data ) ) {
				return "Namecheap: ". $this->Error;
			}

			if (null !== $this->Response->DomainCreateResult->attributes() && 'true' == strtolower( $this->Response->DomainCreateResult->attributes()->Registered ) )
			{
				return 'Namecheap registration successful!';
			}

			return FALSE; 
		}

	

	public function transfer_domain($id) { 
		
		$order = Order::get_order($id);
		$data = array(); 
		$data["DomainName"] = $order->domain;
		$data["Years"] = 1;
		$data["EPPCode"] = $order->authcode;			

		if ( ! $this->execute('namecheap.domains.transfer.create', $data ) ) {
			return "Namecheap: ".$this->Error;
		}

		if (null !== $this->Response->DomainTransferCreateResult->attributes() && 'true' == strtolower( $this->Response->DomainTransferCreateResult->attributes()->Transfer ) )
		{
			return 'Namecheap transfer initiated!';
		}

		return FALSE;
	}




	public function renew_domain($id) { 
		
		$order = Order::get_order($id);
		$data = array(); 
		$data["DomainName"] = $order->domain;
		$data["Years"] = 1; 			

		if ( ! $this->execute('namecheap.domains.renew', $data ) ) {
			return "Namecheap: ".$this->Error;
		}

		if (null !== $this->Response->DomainRenewResult->attributes() && 'true' == strtolower( $this->Response->DomainRenewResult->attributes()->Renew ) )
		{
			return 'Namecheap renewal successful!';
		}

		return FALSE;
	}



 
	public function reactivate_domain($id) { 
		
		$order = Order::get_order($id);
		$data = array(); 
		$data["DomainName"] = $order->domain; 

		if ( ! $this->execute('namecheap.domains.reactivate', $data ) ) {
			return "Namecheap: ".$this->Error;
		}

		if (null !== $this->Response->DomainReactivateResult->attributes() && 'true' == strtolower( $this->Response->DomainReactivateResult->attributes()->IsSuccess ) )
		{
			return 'Namecheap re-activation successful!';
		}

		return FALSE;
	}



	public function detect_ip()
	{
		$ch = curl_init( 'http://icanhazip.com' );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE );
		$result = rtrim(curl_exec( $ch ) );
		curl_close( $ch );
		return $result;
	}

 
	private function execute( $command, $args = array() )
	{ 
		$this->Error = '';
		$this->Response = '';
		$this->Raw = '';

		$url = $this->api_url . 
			'?ApiUser=' . $this->api_user . 
			'&ApiKey=' . $this->api_key . 
			'&UserName=' . $this->api_user . 
			'&ClientIP=' . $this->api_ip .
			'&Command=' . $command;
		foreach ( $args as $arg => $value ) 
		{
			$url .= "&$arg=";
			$url .= urlencode( $value );
		}
		$ch = curl_init( $url );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE );
		$result = curl_exec( $ch );
		curl_close( $ch );
		if ( FALSE == $result ) {
			$this->Error = 'Communication error with Namecheap.';
			return FALSE;
		}
		$xml = new SimpleXMLElement( $result );
		$this->Raw = $xml;
		if ( 'ERROR' == $xml['Status'] )
		{
			$this->Error = (string) $xml->Errors->Error;
			 return FALSE;
		} elseif ( 'OK' == $xml['Status'] )
		{
			$this->Response = $xml->CommandResponse;
			return true;
		}
	}

	 

	public function domainsCheck( $domains )
	{
		if ( is_array( $domains ) ) {
			$domains = implode( ',', $domains );
		}
		if ( ! $this->execute( 'namecheap.domains.check', array( 'DomainList' => $domains ) ) ) {
			// communication error
			return FALSE;
		}
		if ( FALSE === strpos( $domains, ',' ) ) { 
			$status = ( 'true' == strtolower( (string)$this->Response->DomainCheckResult->attributes()->Available ) ) ? TRUE : FALSE;
			return $status;
		}
		$r = array();
		foreach ( $this->Response->DomainCheckResult as $result ) {
			$domain = (string)$result['Domain'];
			$status = ( 'true' == strtolower( (string)$result['Available'] ) ) ? TRUE : FALSE;
			$r[$domain] = $status;
		}
		return $r;
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

        $time = strtotime($domain->Created);
		$created = gmdate("Y-m-d", $time);
		
		$ext_time = strtotime($domain->Expires);
        $expires = gmdate("Y-m-d", $ext_time);

        $order = array(
            'client_id' 	=> $co_id,
			'invoice_id'    => 0,
			'date'          => date('Y-m-d H:i:s'),
            'nameservers'	=> "",
            'item'		    => $item_id,
            'domain'        => $domain->Domain,
            'item_parent'   => $item->item_id,
			'type'		    => 'domain_only',
			'registrar' 	=> 'namecheap',
            'process_id'    => $time,
            'order_id'      => $time,
            'fee'           => 0,
            'processed'     => $created, 
            'renewal_date'  => $expires,
            'status_id'     => 6, 
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
				$accounts = $this->get_accounts();
				$domains = array();
	
				foreach($accounts as $account) {
					foreach($list as $key => $li) {
						if($key != 'table-rates_length') {
							if($account->Domain == str_replace("_",".",$key)) {
								$domains[] = $account;
							}
						}					
					}			
				}
	
	
				foreach($domains as $domain) {
					$tld = explode('.', $domain->Domain, 2);
					$ext = $tld[1]; 
					$item = $this->db->where('item_name', $ext)->join('item_pricing', 'item_pricing.item_id = items_saved.item_id')->get('items_saved')->row();
					$client = $this->db->where('company_email', $domain->EmailAddress)->get('companies')->row();
					if(is_object($item)) { 
						if(is_object($client)) {	
							if($this->db->where('domain', $domain->Domain)->where('(type = "domain" OR type = "domain_only")')->get('orders')->num_rows() == 0) { 							
								if($this->create_order($item, $client->co_id, $domain)) {
									$count++;
								}
							}					   
						}
						else
						{

							$username = explode('@', $domain->EmailAddress)[0];
                            $email = $domain->EmailAddress; 
                            $password = $domain->EmailAddress; 
                            
                            $hasher = new PasswordHash(
                                $this->config->item('phpass_hash_strength', 'tank_auth'),
								$this->config->item('phpass_hash_portable', 'tank_auth')
							);
							
							$hashed_password = $hasher->HashPassword($password);
                                        
                            if (!is_username_available($username)) {    
                                $username = explode('.', $domain->Domain, 2)[0]; 
                            }                             
                                                           
                                $data = array(
                                    'username'	=> $username, 
                                    'password'  => $hashed_password,
                                    'email'		=> $email,
                                    'role_id'	=> 2 
                                );
            
                                $user_id = App::save_data('users', $data); 
                                
								$client = array(   
									'company_name'          => $domain->FirstName." ".$domain->LastName,
									'company_email'         => $domain->EmailAddress,                       
									'company_ref'			=> $this->applib->generate_string(), 
									'language' 				=> config_item('default_language'),
									'currency' 				=> config_item('default_currency'),
									'primary_contact'       => $user_id,
									'individual' 			=> 0, 
									'company_address' 		=> $domain['Address1'],                         
									'company_address_two' 	=> '',
									'company_phone'		  	=> explode('.', $domain->Phone, 2)[1],
									'city'				  	=> $domain->City,
									'state'			      	=> $domain->StateProvince,
									'zip'				  	=> $domain->PostalCode,
									'country'			  	=> $domain->Country
									); 

                                if($co_id = App::save_data('companies', $client)) {
                                    
                                    $profile = array(
                                        'user_id'           => $user_id,
                                        'company'	        => $co_id,
                                        'fullname'	        => $domain->FirstName." ".$domain->LastName,
                                        'phone'		        => explode('.', $domain->Phone, 2)[1],
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



	private function get_accounts()
	{
		if ( ! $this->execute( 'namecheap.domains.getList')) {
					
			$this->session->set_flashdata('response_status', 'danger');
			$this->session->set_flashdata('message', $this->Error);			
			redirect($_SERVER['HTTP_REFERER']);	
		}
		
		$domains = array();

		foreach ( $this->Response->DomainGetListResult->Domain as $domain ) {
			$x = array();
			foreach( $domain->attributes() as $k => $v ) {
				$x[$k] = (string)$v;
			}
			$domains[] = $x;
		}

		$domain_list = array();

		foreach($domains as $domain) {
			$_domain = $this->get_contact($domain['Name']);
			$_domain->Domain = $domain['Name'];	
			$_domain->Created = $domain['Created'];
			$_domain->Expires = $domain['Expires'];
			if($this->db->where('domain', $domain['Name'])->where('(type = "domain" OR type = "domain_only")')->get('orders')->num_rows() == 0) {
				$domain_list[] = $_domain;
			}
		}
		
		return $domain_list;
	}




	private function get_contact($domain)
	{
		if ( ! $this->execute( 'namecheap.domains.getContacts', array('DomainName' => $domain))) {

			$this->session->set_flashdata('response_status', 'danger');
			$this->session->set_flashdata('message', $this->Error);			
			redirect($_SERVER['HTTP_REFERER']);
		}

		if($contact = $this->Response->DomainContactsResult->Registrant) {
			return $contact;	
		}
	}


	

	public function nsCreate( $domain, $nameserver, $ip )
	{
		list( $sld, $tld ) = explode( '.', $domain );
		$args['SLD'] = $sld;
		$args['TLD'] = $tld;
		$args['Nameserver'] = $nameserver;
		$args['IP'] = $ip;
		if ( $this->execute( 'namecheap.domains.ns.create', $args ) ) {
			return TRUE;
		}
		return $false;
	}


	

	public function update_nameservers( $id )
	{
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

		if ( is_array( $nameservers ) ) {
			$nameservers = implode( ',', $nameservers );
		}

		$item = Order::get_order($id);

		$domain = explode('.', $item->domain, 2);
		$sld = $domain[0];
		$tld = $domain[1];
		
		$args = array();
		$args['SLD'] = $sld;
		$args['TLD'] = $tld;
		$args['NameServers'] = $nameservers;
		if ( ! $this->execute( 'namecheap.domains.dns.setCustom', $args ) ) {
			return "Namecheap: ".$this->Error;
		}
		if ( 'true' == strtolower( $this->Response->DomainDNSSetCustomResult->attributes()->Updated ) )
		{
			$nameservers = $this->input->post('nameserver_1', true).",".$this->input->post('nameserver_2', true);
			if($this->input->post('nameserver_3', true) != '') : $nameservers .= ",".$this->input->post('nameserver_3', true); endif;
			if($this->input->post('nameserver_4', true) != '') : $nameservers .= ",".$this->input->post('nameserver_4', true); endif;
			$this->db->set('nameservers', $nameservers); 
			$this->db->where('id', $id);  
			$this->db->update('orders');

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', "Namecheap: Nameservers updated!");			
			redirect($_SERVER['HTTP_REFERER']);	
		}
		return FALSE;
	}

	
	

	public function dnsSetDefault( $domain )
	{
		list( $sld, $tld ) = explode( '.', $domain );
		if ( ! $this->execute( 'namecheap.domains.dns.SetDefault', array( 'SLD' => $sld, 'TLD' => $tld ) ) ) {
			return FALSE;
		}
		if ( 'true' == strtolower( $this->Response->DomainDNSSetDefaultResult->attributes()->Updated ) ) {
			return TRUE;
		}
		return FALSE;
	}

	 

	public function dnsGetList( $domain )
	{
		list( $sld, $tld ) = explode( '.', $domain );
		if ( ! $this->execute( 'namecheap.domains.dns.getList', array( 'SLD' => $sld, 'TLD' => $tld ) ) ) {
			return FALSE;
		}
		$servers = array();
		foreach ( $this->Response->DomainDNSGetListResult->Nameserver as $ns ) {
			$servers[] = (string)$ns;
		}
		return $servers;
	}

	
	

	public function dnsSetHosts( $domain, $data )
	{
		list( $data['SLD'], $data['TLD'] ) = explode( '.', $domain );
		if ( ! $this->execute( 'namecheap.domains.dns.setHosts', $data ) ) {
			return FALSE;
		}
		if ( 'true' == strtolower( $this->Response->DomainDNSSetHostsResult->attributes()->IsSuccess ) ) {
			return TRUE;
		}
		return FALSE;
	}

 

	public function check_balance ()
	{
		$data = array();
		$balance = 0.00;
		if( ! $this->execute( 'namecheap.users.getBalances' ) ) {
			$data['response'] =	$this->Error;
			return false;
		} 

		$data['response'] = $this->Response->UserGetBalancesResult->attributes()->AvailableBalance ." ".$this->Response->UserGetBalancesResult->attributes()->Currency;
		$this->load->view('balance', $data); 
	}
	


	
	public function getPricing( $type = 'DOMAIN', $category ='', $promo = '' )
	{
		$args = array( 'ProductType' => $type );
		if ( ! empty( $category )  )
		{
			$args['ProductCategory'] = $category;
		}
		if ( ! empty( $promo ) )
		{
			$args['PromotionCode'] = $promo;
		}
		$this->execute( 'namecheap.users.getPricing', $args );
	}
}
	

////end 