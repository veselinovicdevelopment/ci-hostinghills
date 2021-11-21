<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Bitcoin extends MX_Controller {
	function __construct()
	{
		parent::__construct();	
		$this->load->model(array('App','Invoice','Client','Order'));

		$this->applib->set_locale();
	}
	
	function curl_get_contents($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
	function round_up ( $value, $precision ) 
	{ 
		$pow = pow ( 10, $precision ); 
		return ( ceil ( $pow * $value ) + ceil ( $pow * $value - ceil ( $pow * $value ) ) ) / $pow;
	}
	function pay($invoice = NULL)
	{

		$blockchain_root = "https://blockchain.info/";
		$blockchain_receive_root = "https://api.blockchain.info/";
		$secret = "7Q1Vasdeo8k6T51rQn9w5DQrcGG06VMF";
		$my_xpub = config_item('bitcoin_address');
		$my_api_key = config_item('bitcoin_api_key');


		$userid = User::get_id();
		$info = Invoice::view_by_id($invoice);
		$invoice_due = Invoice::get_invoice_due_amount($invoice);
		if ($invoice_due <= 0) {  $invoice_due = 0.00;	}
		$data['invoice_info'] = array('item_name'=> $info->reference_no, 
										'item_number' => $invoice,
										'currency' => $info->currency,
										'amount' => $invoice_due) ;
		$data['bitcoin'] = TRUE;

		$urls = $blockchain_root.'tobtc?currency='.$info->currency."&value=".$invoice_due;
		$btc_amount = $this->curl_get_contents($urls);

		$data['btc_amount'] = $this->round_up($btc_amount, 3);

		$callback_url = base_url().'bitcoin/success/?usdamount='.$invoice_due.'&invoicename='.$info->reference_no.'&btcamount='.$data['btc_amount'].'&invoice='.$invoice.'&client='.$info->client.'&secret='.$secret;

		$url = $blockchain_receive_root . "v2/receive?key=" . $my_api_key . "&callback=". urlencode($callback_url) . "&xpub=" . $my_xpub;

		$resp = $this->curl_get_contents($url);
		$decoded = json_decode($resp);
		
		$data['btc_address'] = $decoded->{'input_address'};
		
		$this->load->view('form',$data);
	}
	function cancel()
	{
		$this->session->set_flashdata('response_status', 'error');
		$this->session->set_flashdata('message', 'Bitcoin payment canceled.');
		redirect('clients');
	}
	
	function success(){
		echo "*ok*";
		function round_up ( $value, $precision ) { 
			$pow = pow ( 10, $precision ); 
			return ( ceil ( $pow * $value ) + ceil ( $pow * $value - ceil ( $pow * $value ) ) ) / $pow;
		}
		$transactionid = $_GET['transaction_hash'];
		$invoiceid = $_GET['invoice'];
		$invoicename = $_GET['invoicename'];
		$usdamount = $_GET['usdamount'];
		$btcamount = $_GET['btcamount'];
		$client = $_GET['client'];
		$amountsentsatoshi = $_GET['value'];
		$amountsent = $amountsentsatoshi / 100000000;
		$company_name = Client::view_by_id($client)->company_name; //get client username
		$company_email = Client::view_by_id($client)->company_email; //get client email
		$ratio = $amountsent / $btcamount;
		$paid = $usdamount * $ratio;
		$paid = round_up($paid, 2);
		
		$data = array(
			'invoice' => $invoiceid,
			'paid_by' => $client,
			'payment_method' => '1',
			'amount' => $paid,
			'trans_id' => $transactionid,
			'notes' => 'Amount in BTC: '.$amountsent,
			'month_paid' => date('m'),
			'year_paid' => date('Y'),
		);
		App::save_data('payments',$data); // insert to payments

		if(Invoice::get_invoice_due_amount($invoiceid) <= 0.00){
			App::update('invoices',array('inv_id'=> $invoiceid),array('status'=>'Paid'));
			modules::run('orders/process', $invoiceid);
		}

		$data = array(
				'user'				=> Client::view_by_id($client)->primary_contact,
				'module' 			=> 'invoices',
				'module_field_id'	=> $invoiceid,
				'activity'			=> 'activity_payment_of',
				'icon'				=> 'fa-btc',
				'value1'         	=> 'BTC '.$paid,
				'value2'            => Invoice::view_by_id($invoiceid)->reference_no
			);
		App::Log($data);		

		$this->_send_payment_email($invoiceid, $paid); // Send email to client
		
		if(config_item('notify_payment_received') == 'TRUE'){
			$cur = App::currencies(Invoice::view_by_id($invoiceid)->currency);
			$this->_notify_admin($invoiceid,$paid,$cur->symbol);
		}		
	}


	function _send_payment_email($invoice_id,$paid_amount){

		$message = App::email_template('payment_email','template_body');
		$subject = App::email_template('payment_email','subject');
		$signature = App::email_template('email_signature','template_body');


		$info = Invoice::view_by_id($invoice_id);
		$cur = App::currencies(Invoice::view_by_id($invoiceid)->currency);

		$logo_link = create_email_logo();

		$logo = str_replace("{INVOICE_LOGO}",$logo_link,$message);

		$invoice_ref = str_replace("{REF}",$info->reference_no,$logo);

		$invoice_currency = str_replace("{INVOICE_CURRENCY}",$cur->symbol,$invoice_ref);
		$amount = str_replace("{PAID_AMOUNT}",$paid_amount,$invoice_currency);
		$EmailSignature = str_replace("{SIGNATURE}",$signature,$amount);
		$message = str_replace("{SITE_NAME}",config_item('company_name'),$EmailSignature);

		$params['recipient'] = Client::view_by_id($info->client)->company_email;

		$params['subject'] = '['.config_item('company_name').'] '.$subject;
		$params['message'] = $message;
		$params['attached_file'] = '';

		modules::run('fomailer/send_email',$params);
}



	function _notify_admin($invoice,$amount,$cur)
    {
            $info = Invoice::view_by_id($invoice);

            foreach (User::admin_list() as $key => $user) {
                $data = array(
                                'email'         => $user->email,
                                'invoice_ref'   => $info->reference_no,
                                'amount'        => $amount,
                                'currency'      => $cur,
                                'invoice_id'    => $invoice,
                                'client'        => Client::view_by_id($info->client)->company_name
                            );

                $email_msg = $this->load->view('new_payment',$data,TRUE);

                $params = array(
                                'subject'       => '['.config_item('company_name').' ] Payment Confirmation',
                                'recipient'     => $user->email,
                                'message'       => $email_msg,
                                'attached_file' => ''
                                );

                modules::run('fomailer/send_email',$params);
            }

            
   
    }
}
////end