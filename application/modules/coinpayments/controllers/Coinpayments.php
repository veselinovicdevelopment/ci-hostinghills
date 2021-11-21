<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Coinpayments extends MX_Controller {

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
        $this->session->set_flashdata('response_status', 'error');
        $this->session->set_flashdata('message', lang('coinpayments_canceled'));
        redirect('invoices');
	}    
    

	function pay($invoice = NULL)
	{
		$info = Invoice::view_by_id($invoice);
		$invoice_due = Invoice::get_invoice_due_amount($invoice);
		if ($invoice_due <= 0) {  $invoice_due = 0.00;	}

		$data['info'] = array(
							    'item_name'		=> $info->reference_no, 
								'item_number' 	=> $invoice,
								'currency' 		=> $info->currency,
								'amount' 		=> $invoice_due
                                );
	
		$this->load->view('form',$data);
    }
    


    
    function process ()
    {
        $invoice_id = $this->input->post('invoice',TRUE);
        $info = Invoice::view_by_id($invoice_id);
        $company = Client::view_by_id($info->client);
        $invoice_due = Invoice::get_invoice_due_amount($invoice_id);

		require_once APPPATH.'/libraries/coinpayments/coinpayments.inc.php';

        $cps = new CoinPaymentsAPI();
        $cps->Setup(config_item('coinpayments_private_key'), config_item('coinpayments_public_key'));
    
        $result = $cps->CreateTransactionSimple($invoice_due, $info->currency, config_item('accept_coin'), $company->company_email, '', base_url().'coinpayments/processed_ipn/'.$invoice_id.'_'.$info->client);
        $data['reference'] = $info->reference_no;
        $data['result'] = $result;
        $data['coin'] = 'BTC';
        $this->template->title(lang('payment').' - '.config_item('company_name'));
			$data['page'] = lang('coinpayments');			
			$this->template
			->set_layout('users')
			->build('response',isset($data) ? $data : NULL);
    }



    function processed_ipn ($transaction) {

        $data = explode('_', $transaction);
        $inv = Invoice::view_by_id($data[0]); 

        if($inv->client == $data[1])  {

        $invoice = $data[0];
        $client = Client::view_by_id($inv->client);
        $invoice_due = Invoice::get_invoice_due_amount($invoice);
        $paid_amount = Applib::format_deci($invoice_due);
        $this->load->helper('string');
            $data = array(
                        'invoice' => $invoice,
                        'paid_by' => $data[1],
                        'currency' => strtoupper($inv->currency),
                        'payer_email' => $client->company_email,
                        'payment_method' => '1',
                        'notes' =>  lang('coinpayments').' '.lang('payment'),
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
                'user' => $inv->client,
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



    


	function cancel()
	{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('paypal_canceled'));
				redirect('clients');
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