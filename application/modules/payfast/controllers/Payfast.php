<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Payfast extends MX_Controller {

	function __construct()
	{
		parent::__construct();		
        User::logged_in();
        
        $this->load->module('layouts');
        $this->load->library('template');
		$this->load->model(array('Invoice','Client','App'));
	}    

    
	function index()
	{ 
        redirect('invoices');
	}    
    

	function pay($invoice = NULL)
	{
		$inv = Invoice::view_by_id($invoice); 
        $company = Client::view_by_id($inv->client); 
        $client_cur = 'ZAR';
                                       
        $invoice_due = Applib::client_currency('ZAR', Invoice::get_invoice_due_amount($invoice));
        $data['symbol'] = App::currencies($client_cur)->symbol;
        $data['currency'] = $client_cur;
     
         
        if ($invoice_due <= 0) {  
            $invoice_due = 0.00;
        }
            $data['due'] = $invoice_due;
            $data['id'] = $invoice;


		$data['info'] = array(
                            'company_name'	=> $company->company_name, 
                            'company_ref'	=> $company->company_ref, 
                            'company_email'	=> $company->company_email,
                            'company_id'	=> $inv->client,
                            'item_name'		=> $inv->reference_no, 
                            'item_number' 	=> $invoice,
                            'currency' 		=> $inv->currency,
                            'amount' 		=> $invoice_due
                            );
	
    $this->template->title(lang('payment').' - '.config_item('company_name'));
        $data['page'] = 'Payfast';			
        $this->template
        ->set_layout('users')
        ->build('form',isset($data) ? $data : NULL);
    }
    


    
   function processed_ipn () {

    require_once APPPATH.'/libraries/payfast/pf.inc.php';

    if (isset($_POST['payment_status'])) {  

        $pfHost = (config_item('demo_mode') == 'TRUE') ? 'https://sandbox.payfast.co.za' : 'https://www.payfast.co.za';
        $error = false;

        pflog('ITN received from payfast.co.za');
        if (!pfValidIP($_SERVER['REMOTE_ADDR'])) {
            pflog('REMOTE_IP mismatch: ');
            $error = true;
            return false;
        }

        $data = pfGetData();

        pflog('POST received from payfast.co.za: ' . print_r($data, true));

        if ($data === false) {
            pflog('POST is empty: ' . print_r($data, true));
            $error = true;
            return false;
        }

        if (!pfValidSignature($data, config_item('payfast_passphrase'))) {
            pflog('Signature mismatch on POST');
            $error = true;
            return false;
        }

        pflog('Signature OK');

        $itnPostData = array();
        $itnPostDataValuePairs = array();

        foreach ($_POST as $key => $value) {
            if ($key == 'signature')
                continue;

            $value = urlencode(stripslashes($value));
            $value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i', '${1}%0D%0A${3}', $value);
            $itnPostDataValuePairs[] = "$key=$value";
        }

        $itnVerifyRequest = implode('&', $itnPostDataValuePairs);
        if (!pfValidData($pfHost, $itnVerifyRequest, "$pfHost/eng/query/validate")) {
            pflog("ITN mismatch for $itnVerifyRequest\n");
            pflog('ITN not OK');
            $error = true;
            return false;
        }

        pflog('ITN OK');
        pflog("ITN verified for $itnVerifyRequest\n");

        if ($error == false and $_POST['payment_status'] == "COMPLETE") {
                $client_id = intval($_POST['custom_int1']);
                $amount_paid = $_POST['amount_gross'];
                $invoice = $_POST['m_payment_id'];
                $txn_id =  $_POST['pf_payment_id'];    
                $client = Client::view_by_id($client_id);
                $invoice_due = Invoice::get_invoice_due_amount($invoice);
                $paid_amount = Applib::convert_currency('ZAR', $amount_paid);
                $inv = Invoice::view_by_id($invoice);
                $this->load->helper('string');

                $data = array(
                            'invoice' => $invoice,
                            'paid_by' => $client_id,
                            'currency' => strtoupper($inv->currency),
                            'payer_email' => $client->company_email,
                            'payment_method' => '1',
                            'notes' => 'Payfast Transaction: '.$txn_id,
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
                    'module_field_id' => $invoice,
                    'user' => $client->primary_contact,
                    'activity' => 'activity_payment_of',
                    'icon' => 'fa-usd',
                    'value1' => $inv->currency.''.$paid_amount,
                    'value2' => $inv->reference_no
                    );

                    App::Log($data);

                    $this->_send_payment_email($invoice, $paid_amount); // Send email to client

                    if(config_item('notify_payment_received') == 'TRUE'){
                        $this->_notify_admin($trans->invoice, $paid, $cur_i->code); // Send email to admin
                    }

            $invoice_due = Invoice::get_invoice_due_amount($invoice);
                if($invoice_due <= 0) {
                    Invoice::update($invoice,array('status'=>'Paid'));
                    modules::run('orders/process', $invoice);
                    }
                }           
            }
        }
    }

    


	function cancel()
	{
        $this->session->set_flashdata('response_status', 'error');
        $this->session->set_flashdata('message', 'Payfast Payment Cancelled!');
        redirect('clients');
	}
    
    
	function success($id = null)
	{    
        $this->session->set_flashdata('response_status', 'success');
        $this->session->set_flashdata('message', lang('payment_added_successfully'));
        redirect('invoices/view/'.$id);       
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