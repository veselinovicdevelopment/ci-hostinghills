<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Instamojo extends MX_Controller {

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
        $this->session->set_flashdata('message', lang('instamojo_canceled'));
        redirect('invoices');
	}  
    

	function pay($invoice = NULL)
	{		
            $inv = Invoice::view_by_id($invoice);
            $client_cur = 'INR';
                                              
            $invoice_due = Applib::client_currency($client_cur, Invoice::get_invoice_due_amount($invoice));
            $data['symbol'] = App::currencies($client_cur)->symbol;
            $data['currency'] = $client_cur;
        
        
        if ($invoice_due <= 0) {  
                $invoice_due = 0.00;	
            }
            $data['due'] = $invoice_due;
            $data['id'] = $invoice;
 
	
		$this->template->title(lang('payment').' - '.config_item('company_name'));
		$data['page'] = lang('instamojo_payment');			
		$this->template
		->set_layout('users')
		->build('form', $data);
    }    


    
    function process ()
    {       $protocol = isset($_SERVER['HTTPS']) && strcasecmp('off', $_SERVER['HTTPS']) !== 0 ? "https" : "http";
            $hostname = $_SERVER['HTTP_HOST'];
            $path = dirname(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF']);
            if($this->input->post('currency') != 'INR') {
                $this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('currency_not_supported'));
                redirect($_SERVER['HTTP_REFERER']);
                return;      
            }

            $invoice_id = $this->input->post('invoice');
            $inv = Invoice::view_by_id($invoice_id);
            $company = Client::view_by_id($inv->client); 

            require_once APPPATH."libraries/instamojo/Instamojo.php"; 

            if(config_item('demo_mode') == 'TRUE') {            
                 $api = new Instamojo\Instamojo(config_item('instamojo_api_key'), config_item('instamojo_oath_token'), 'https://test.instamojo.com/api/1.1/');
            }
            else {
                $api = new Instamojo\Instamojo(config_item('instamojo_api_key'), config_item('instamojo_oath_token'));
            }

            try {
                $response = $api->paymentRequestCreate(array(
                    "purpose" => config_item('company_name'). " - ". $inv->reference_no,
                    "amount" => $this->input->post('amount'),
                    "send_email" => true,
                    "email" => $company->company_email, 
                    "redirect_url" => "{$protocol}://{$hostname}/instamojo/verify/{$invoice_id}",
                    "webhook" => "{$protocol}://{$hostname}/instamojo/verify/{$invoice_id}"
                    ));  
  
                header("Location: " . $response['longurl'], true, 303);                   
          
            }
            catch (Exception $e) {
                $this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', 'Error: ' . $e->getMessage());
                redirect($_SERVER['HTTP_REFERER']); 
            }
    }



    function verify($invoice = null) {
        
        $status = '';
        $response = lang('verify_no_transation');
        $inv = Invoice::view_by_id($invoice);  
        $verified = false;
        $amount = 0;

        if($_GET) {
                      
            require_once APPPATH."libraries/instamojo/Instamojo.php"; 

            if(config_item('demo_mode') == 'TRUE') {            
                 $api = new Instamojo\Instamojo(config_item('instamojo_api_key'), config_item('instamojo_oath_token'), 'https://test.instamojo.com/api/1.1/');
            }
            else {
                $api = new Instamojo\Instamojo(config_item('instamojo_api_key'), config_item('instamojo_oath_token'));
            }

            try { 
                $response = $api->paymentRequestPaymentStatus($_GET['payment_request_id'], $_GET['payment_id']); 
 
              if(($response['status'] == "Credit" || $response['status'] == "Completed") && $response['purpose'] ==  config_item('company_name'). " - ". $inv->reference_no && $inv->status == "Unpaid") {
                    $verified = true;
                    $status = "Completed";
                    $amount = $response['amount'];
                }
            }
            catch (Exception $e) {
                $this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', 'Error: ' . $e->getMessage());                
                $data['response'] = $e->getMessage();
            }
        }
        
        if($verified){

            if($status == "Credit" || $status == "Completed"){ 

                $client = Client::view_by_id($inv->client); 
                $paid = Applib::convert_currency($client->currency, $amount);
                $paid_amount = Applib::format_deci($paid);  

                $this->load->helper('string');
                $data = array(
                            'invoice' => $invoice,
                            'paid_by' => $inv->client,
                            'currency' => strtoupper($inv->currency),
                            'payer_email' => $client->company_email,
                            'payment_method' => '1',
                            'notes' => 'Instamojo: '.$_GET['payment_request_id'],
                            'amount' => $paid,
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
                    'module_field_id' => $invoice,
                    'user' => $client->primary_contact,
                    'activity' => 'activity_payment_of',
                    'icon' => 'fa-usd',
                    'value1' => $inv->currency.''.$paid,
                    'value2' => $inv->reference_no
                    );
    
                    App::Log($data);
    
                    $this->_send_payment_email($invoice, $amount); // Send email to client
    
                    if(config_item('notify_payment_received') == 'TRUE'){
                        $this->_notify_admin($invoice, $paid, $cur_i->code); // Send email to admin
                    }
        
        
                    $invoice_due = Invoice::get_invoice_due_amount($invoice);
                    if($invoice_due <= 0) {
                        Invoice::update($invoice, array('status'=>'Paid'));
                        modules::run('orders/process', $invoice);
                        }

                    $this->session->set_flashdata('response_status', 'success');
                    $this->session->set_flashdata('message', lang('payment_added_successfully'));
                    redirect('invoices/view/'. $invoice);
                }    
            }
            
            $data['response'] = $status;
        }
        else{
            $data['response'] = lang('failed_verification');
        }

        $this->template->title(lang('payment').' - '.config_item('company_name'));
		$data['page'] = lang('instamojo_payment');			
		$this->template
		->set_layout('users')
		->build('verify', $data);
  
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
        $cur = App::currencies(Client::view_by_id($info->client)->currency);

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
                               'subject' 		=> '['.config_item('company_name').'] ' . lang('payment_notification'),
                               'recipient' 	=> $user->email,
                               'message'		=> $email_msg,
                               'attached_file'	=> ''
                               );

            modules::run('fomailer/send_email',$params);
           }

    }
}


////end 