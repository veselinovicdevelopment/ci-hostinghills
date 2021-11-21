<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Paypal extends MX_Controller {

	function __construct()
	{
		parent::__construct();		
		User::logged_in();
		
		$this->load->library('Paypal_Lib');
		$this->load->model(array('Invoice','App'));
	}
	
	function index()
	{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('paypal_canceled'));
				redirect('clients');
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
								'client'		=> $info->client,
								'amount' 		=> $invoice_due
								);

		if (config_item('paypal_live') == 'FALSE') {
			$paypalurl = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
		}else{
			$paypalurl = 'https://www.paypal.com/cgi-bin/webscr';
		}
		$data['paypal_url'] = $paypalurl;
		
		$this->load->view('form',$data);
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
}


////end 