<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Mollie extends MX_Controller {

	function __construct()
	{
		parent::__construct();		
        User::logged_in();
        
        $this->load->module('layouts');
        $this->load->library('template');
		$this->load->model(array('Invoice','Client','App','Order'));
	}    

    
	function index()
	{ 
        redirect('invoices');
    }    
    

    function cancel()
	{
        $this->session->set_flashdata('response_status', 'error');
        $this->session->set_flashdata('message', lang('molliepayment_canceled'));
        redirect('invoices');
	}   
    

	function pay($invoice = NULL)
	{		
        $inv = Invoice::view_by_id($invoice);
        $client_cur = Client::view_by_id($inv->client)->currency;        
 
            if(!User::is_admin() && !User::is_staff()) {                                         
                $invoice_due = Applib::client_currency($client_cur, Invoice::get_invoice_due_amount($invoice));
                $data['symbol'] = App::currencies($client_cur)->symbol;
                $data['currency'] = $client_cur;
            }
            else{
                $invoice_due = Invoice::get_invoice_due_amount($invoice);
                $data['symbol'] = App::currencies($inv->currency)->symbol;
                $data['currency'] = $inv->currency;
            } 
            
            if ($invoice_due <= 0) {  
                $invoice_due = 0.00;
            }
                $data['due'] = $invoice_due;
                $data['id'] = $invoice;

            try {
                require_once APPPATH."/libraries/mollie/vendor/autoload.php"; 
                $mollie = new \Mollie\Api\MollieApiClient();
                $mollie->setApiKey(config_item('mollie_api_key'));
                $data['methods'][] = $mollie->methods->allActive();
                
            } catch (\Mollie\Api\Exceptions\ApiException $e) {
                $data['methods'] = "API call failed: " . htmlspecialchars($e->getMessage());
            }
        
            $this->template->title(lang('payment').' - '.config_item('company_name'));
            $data['page'] = lang('mollie_payment');			
            $this->template
            ->set_layout('users')
            ->build('form', $data);
        
    }    


    
    function process ()
    {
        $invoice_id = $this->input->post('invoice',TRUE);
        $info = Invoice::view_by_id($invoice_id);
        $company = Client::view_by_id($info->client);
        $invoice_due = Invoice::get_invoice_due_amount($invoice_id);

        try {

            require_once APPPATH."/libraries/mollie/vendor/autoload.php"; 
            
            $mollie = new \Mollie\Api\MollieApiClient();
            $mollie->setApiKey(config_item('mollie_api_key'));   
        
            $protocol = isset($_SERVER['HTTPS']) && strcasecmp('off', $_SERVER['HTTPS']) !== 0 ? "https" : "http";
            $hostname = $_SERVER['HTTP_HOST'];
            $path = dirname(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF']);
            
            $payment = $mollie->payments->create([
                "amount" => [
                    "currency" => $this->input->post('currency'),
                    "value" => $this->input->post('due')  
                ],
                "description" => $info->reference_no,
                "redirectUrl" =>"{$protocol}://{$hostname}/invoices/view/{$invoice_id}",
                "webhookUrl" => "{$protocol}://{$hostname}/mollie/processed_ipn/".$invoice_id,
                "metadata" => [
                    "order_id" => $invoice_id
                ],
            ]);
  
             header("Location: " . $payment->getCheckoutUrl(), true, 303);

            } catch (\Mollie\Api\Exceptions\ApiException $e) {
                 $this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', 'Error: ' . $e->getMessage());
                redirect($_SERVER['HTTP_REFERER']);  
            }
    }



    function processed_ipn ($id) {

        require_once APPPATH."/libraries/mollie/vendor/autoload.php"; 
            
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey(config_item('mollie_api_key')); 
        $payment = $mollie->payments->get($this->input->post('id')); 

        if ($payment->isPaid())
        {
            $inv = Invoice::view_by_id($id); 
            $client = Client::view_by_id($inv->client);
            $invoice_due = Invoice::get_invoice_due_amount($id);
            $paid_amount = Applib::format_deci($invoice_due);
            $this->load->helper('string');
            $data = array(
                        'invoice' => $id,
                        'paid_by' => $inv->client,
                        'currency' => strtoupper($inv->currency),
                        'payer_email' => $client->company_email,
                        'payment_method' => '1',
                        'notes' =>  'Mollie: '.$this->input->post('id'),
                        'amount' => $paid_amount,
                        'trans_id' => random_string('nozero', 6),
                        'month_paid' => date('m'),
                        'year_paid' => date('Y'),
                        'payment_date' => date('Y-m-d')
                    );
    
                // Store the payment in the database.
                if ($payment_id = App::save_data('payments', $data)) {
                    $cur_i = App::currencies(strtoupper($inv->currency));
     
                    $data = array(
                    'module' => 'invoices',
                    'module_field_id' => $this->input->post('id'),
                    'user' => $inv->client, 
                    'activity' => 'activity_payment_of',
                    'icon' => 'fa-usd',
                    'value1' => $inv->currency.''.$paid_amount,
                    'value2' => $inv->reference_no
                    );
    
                    App::Log($data);
    
                    $this->_send_payment_email($id, $paid_amount); // Send email to client
    
                    if(config_item('notify_payment_received') == 'TRUE'){
                        $this->_notify_admin($id, $paid_amount, $cur_i->code); // Send email to admin
                    }
        
    
            $invoice_due = Invoice::get_invoice_due_amount($id);
            if($invoice_due <= 0) {
                Invoice::update($id,array('status'=>'Paid'));
                modules::run('orders/process', $id);
                }
            }           
        }         
    }
 
    


	function success()
	{
        if($_POST){
				$this->session->set_flashdata('response_status', 'success');
				$this->session->set_flashdata('message', lang('payment_added_successfully'));
				redirect('clients');
        }else{
        $this->session->set_flashdata('response_status', 'error');
        $this->session->set_flashdata('message', 'Something went wrong please contact us if your Payment doesn\'t appear shortly');
        redirect('clients');
        }
    }
    

    function _send_payment_email($invoice_id,$paid_amount){

        $message = App::email_template('payment_email','template_body');
        $subject = App::email_template('payment_email','subject');
        $signature = App::email_template('email_signature','template_body');


        $info = Invoice::view_by_id($invoice_id);
        $cur = App::currencies($info->currency);

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
                               'email'		    => $user->email,
                               'invoice_ref'   => $info->reference_no,
                               'amount'		=> $amount,
                               'currency'		=> $cur,
                               'invoice_id'	=> $invoice,
                               'client'        => Client::view_by_id($info->client)->company_name
                           );

               $email_msg = $this->load->view('new_payment',$data,TRUE);

               $params = array(
                               'subject' 		=> '['.config_item('company_name').'] Payment Confirmation',
                               'recipient' 	=> $user->email,
                               'message'		=> $email_msg,
                               'attached_file'	=> ''
                               );

            modules::run('fomailer/send_email',$params);
           }

}
}


////end 