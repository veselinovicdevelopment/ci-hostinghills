<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Razorpay extends MX_Controller {

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
        $client_cur = 'INR';        
                                    
        $invoice_due = Applib::client_currency($client_cur, Invoice::get_invoice_due_amount($invoice));
        $data['symbol'] = App::currencies($client_cur)->symbol;
        $data['currency'] = $client_cur;
       
         
        if ($invoice_due <= 0) {  
            $invoice_due = 0.00;
        }
 

		$data['info'] = array(                           
                            'allow_stripe'	=> true,
                            'item_name'		=> $inv->reference_no, 
                            'item_number' 	=> $invoice,
                            'currency' 		=> $inv->currency,
                            'amount'        => round($invoice_due, 0)
                            );
	
    $this->template->title('Razorpay - '.config_item('company_name'));
        $data['page'] = 'Razorpay';			
        $this->template
        ->set_layout('users')
        ->build('form',isset($data) ? $data : NULL);
    }
    


    
   function processed_ipn () { 
  
            $paid_amount = $this->input->post('paid', true);
            $invoice = $this->input->post('invoice', true);
            $txn_id = $this->input->post('payment_id', true);      

            $invoice_due = Invoice::get_invoice_due_amount($invoice);
            $paid_amount = Applib::format_deci($invoice_due);
            $inv = Invoice::view_by_id($invoice);
            $client = Client::view_by_id($inv->client);
            $this->load->helper('string');

            
            $data = array(
                        'invoice' => $invoice,
                        'paid_by' => $inv->client,
                        'currency' => strtoupper($inv->currency),
                        'payer_email' => $client->company_email,
                        'payment_method' => '1',
                        'notes' => 'Razorpay: '.$txn_id,
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
                        $this->_notify_admin($invoice, $paid_amount, $cur_i->code); // Send email to admin
                    }

                    $invoice_due = Invoice::get_invoice_due_amount($invoice);
                    if($invoice_due <= 0) {
                        Invoice::update($invoice,array('status'=>'Paid'));
                        modules::run('orders/process', $invoice);
                    }
                }
                
                $result = array(
                    'status' => 'success',
                    'message' => lang('payment_added_successfully'),
                    'invoice_id' => $invoice
                );

            $this->output->set_content_type('application/json')->set_output(json_encode($result)); 
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

        $invoice_currency = str_replace("{INVOICE_CURRENCY}",$cur->symbol, $invoice_ref);
        $amount = str_replace("{PAID_AMOUNT}",$paid_amount, $invoice_currency);
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
                               'invoice_ref'    => $info->reference_no,
                               'amount'		    => $amount,
                               'currency'		=> $cur,
                               'invoice_id'	    => $invoice,
                               'client'         => Client::view_by_id($info->client)->company_name
                           );

               $email_msg = $this->load->view('new_payment',$data,TRUE);

               $params = array(
                               'subject' 		=> '['.config_item('company_name').'] '. lang('payment_notification'),
                               'recipient' 	    => $user->email,
                               'message'		=> $email_msg,
                               'attached_file'	=> ''
                               );

            modules::run('fomailer/send_email',$params);
           }


       }
}


////end 