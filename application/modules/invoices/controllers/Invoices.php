<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Invoices extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        User::logged_in();

        $this->load->module('layouts');
        $this->load->library(array('template', 'form_validation'));
        $this->template->title(lang('invoices').' - '.config_item('company_name'));

        if (isset($_GET['login'])) {
            $this->tank_auth->remote_login($_GET['login']);
        }

        $this->load->model(array('Invoice', 'App', 'Client', 'User', 'Order', 'Item'));

        App::module_access('menu_invoices');

        $this->filter_by = $this->_filter_by();

        $this->applib->set_locale();
    }


    public function index()
    {
        $this->template->title(lang('invoices').' - '.config_item('company_name'));
        $data['page'] = lang('invoices');
        $data['datatables'] = true;
        $data['invoices'] = $this->_show_invoices();
        $this->template
    ->set_layout('users')
    ->build('invoices', isset($data) ? $data : null);
    }


    public function view($invoice_id = null)
    {
        if (!User::can_view_invoice(User::get_id(), $invoice_id)) {
            App::access_denied('invoices');
        }

        $this->template->title(lang('invoices').' - '.config_item('company_name'));
        $data['page'] = lang('invoice');
        $data['stripe'] = true;
        $data['twocheckout'] = true;
        $data['sortable'] = true;
        $data['typeahead'] = true;
        $data['invoices'] = $this->_show_invoices(); // GET a list of the Invoices
        $data['id'] = $invoice_id;
        Invoice::evaluate_invoice($invoice_id);

        $this->template
    ->set_layout('users')
    ->build('view', isset($data) ? $data : null);
    }


    public function autoitems()
    {
        $query = 'SELECT * FROM (
		SELECT item_name FROM hd_items
		UNION ALL
		SELECT item_name FROM hd_items_saved
	) a
	GROUP BY item_name
	ORDER BY item_name ASC';
        $names = $this->db->query($query)->result();
        $name = array();
        foreach ($names as $n) {
            $name[] = $n->item_name;
        }
        $data['json'] = $name;
        $this->load->view('json', isset($data) ? $data : null);
    }


    public function autoitem()
    {
        $name = $_POST['name'];
        $query = "SELECT * FROM (
		SELECT item_name, item_desc, quantity, unit_cost FROM hd_items
		UNION ALL
		SELECT item_name, item_desc, quantity, unit_cost FROM hd_items_saved
	) a
	WHERE a.item_name = '".$name."'";
        $names = $this->db->query($query)->result();
 
    $name = $names[0];
        $data['json'] = $name;
        $this->load->view('json', isset($data) ? $data : null);
    }


    
    public function add()
    {
        if (!User::can_add_invoice()) {
            App::access_denied('invoices');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('reference_no', 'Ref No', 'required|is_unique[invoices.reference_no]');
            $this->form_validation->set_rules('client', 'Client', 'required');
            if ($this->form_validation->run() == false) {
                $_POST = '';
                redirect('invoices/add');
            } else {
                if (config_item('increment_invoice_number') == 'TRUE') {
                    $_POST['reference_no'] = config_item('invoice_prefix').Invoice::generate_invoice_number();
                }

                $_POST['allow_paypal'] = ($this->input->post('allow_paypal') == 'on') ? 'Yes' : 'No';
                $_POST['allow_2checkout'] = ($this->input->post('allow_2checkout') == 'on') ? 'Yes' : 'No';
                $_POST['allow_stripe'] = ($this->input->post('allow_stripe') == 'on') ? 'Yes' : 'No';
                $_POST['allow_bitcoin'] = ($this->input->post('allow_bitcoin') == 'on') ? 'Yes' : 'No';
                $_POST['allow_coinpayments'] = ($this->input->post('allow_coinpayments') == 'on') ? 'Yes' : 'No';
                $_POST['allow_payfast'] = ($this->input->post('allow_payfast') == 'on') ? 'Yes' : 'No';
                $_POST['allow_instamojo'] = ($this->input->post('allow_instamojo') == 'on') ? 'Yes' : 'No';
                $_POST['allow_mollie'] = ($this->input->post('allow_mollie') == 'on') ? 'Yes' : 'No';
                $_POST['allow_razorpay'] = ($this->input->post('allow_razorpay') == 'on') ? 'Yes' : 'No';
                $_POST['allow_paystack'] = ($this->input->post('allow_paystack') == 'on') ? 'Yes' : 'No';

                 // Set defa currency           
                $_POST['currency'] = config_item('default_currency');
             
         
                $_POST['due_date'] = Applib::date_formatter($_POST['due_date']);
                unset($_POST['files']);

                if ($invoice_id = App::save_data('invoices', $this->input->post())) {
                    // Log Activity
                $activity = array(
                    'user' => User::get_id(),
                    'module' => 'invoices',
                    'module_field_id' => $invoice_id,
                    'activity' => 'activity_invoice_created',
                    'icon' => 'fa-plus',
                    'value1' => $_POST['reference_no'],
                );
                
                App::Log($activity); // Log activity
                Applib::go_to('invoices/view/'.$invoice_id, 'success', lang('invoice_created_successfully'));
                }
            }
        } else {
            $data['page'] = lang('create_invoice');
            $data['editor'] = true;
            $data['datepicker'] = true;
            $data['form'] = true;
            $data['invoices'] = $this->_show_invoices(); // GET a list of the Invoices

        $this->template
        ->set_layout('users')
        ->build('create_invoice', isset($data) ? $data : null);
        }
    }



    public function create($id = null)
    {         

        if ($this->session->userdata('process') && !empty($this->session->userdata('order')->order)) {       

                if($id && $id != 0) {
                    $co_id = $id;
                }

                else {
                    $user_id = $this->session->userdata('user_id');
                    $client = Client::get_by_user($user_id);
                    $co_id = $client->co_id;
                }

                if($this->session->userdata('co_id')) {
                    $co_id = $this->session->userdata('co_id');
                }

                $client = Client::view_by_id($co_id);

                $currency = config_item('default_currency');
                $renewals = array('monthly', 'quarterly', 'semi_annually', 'annually');
                $reference = config_item('invoice_prefix').Invoice::generate_invoice_number();
                $interval = array('monthly' => 30, 'quarterly' => 90, 'semi_annually' => 180, 'annually' => 365);

                if(null == $co_id) {
                    $this->session->set_flashdata('response_status', 'warning');
                    $this->session->set_flashdata('message', lang('primary_contact_required'));				
                    redirect($_SERVER['HTTP_REFERER']);
                }
            
                $data = array(
                    'reference_no' => $reference,                     
                    'currency' =>  $currency,
                    'due_date' => $this->get_date_due(date('Y-m-d')),
                    'client' => $co_id,
                    'tax' => (config_item('order_tax') == 'TRUE') ? config_item('default_tax') : '0.00',
                    'notes' => config_item('default_terms')
                );

                $data = array_merge($data, gateways());

                if ($invoice_id = App::save_data('invoices', $data)) {

                    $count = 1;
                    $order_id = time();
                    $type = "service";
                    $username = "";
                    $password = "";
           
                    $date = date('Y-m-d');

                    foreach($this->session->userdata('order')->order AS $item)                     
                    {   
                        $i = Item::view_item($item->item);
 
                        if($item->renewal != 'once_off' 
                        && $item->renewal != 'one_time_payment' 
                        && $item->renewal != 'total_cost') { 
                            $days = $interval[$item->renewal];
                            $renewal_date = Invoice::get_renewal_date($date, $days);                             
                        }
                        
                        $description = lang('one_time_payment');
                        
                        if(in_array($item->renewal, $renewals)) {
                            $description = "[".$item->domain."] ".$date. " - ".$renewal_date;
                        }

                        if(isset($i) && $i->parent == 10 && $item->renewal == 'total_cost') {
                            $description = lang($item->renewal);
                        }

                        $total_cost = $item->price;
                        $tax_rate = 0; 

                        if($item->tax > 0) 
                        { 
                            $total_cost =  Applib::format_deci($item->price + $item->tax);
                            $tax_rate = $i->item_tax_rate;
                        }


                        $items = array(
                            'invoice_id' 	=> $invoice_id,
                            'item_name'		=> $item->name,
                            'item_desc'		=> $description,
                            'unit_cost'		=> $item->price,
                            'item_order'	=> 1,
                            'item_tax_rate'	=> $tax_rate,
                            'item_tax_total'=> $item->tax,
                            'quantity'		=> 1,
                            'total_cost'	=> $total_cost
                            );            

                        if($item_id = App::save_data('items', $items)) { 

                            if($item->renewal != 'once_off'
                                && $item->renewal != 'one_time_payment') {   

                                    if(isset($i)) {                                                                                
                                            $type = "hosting";
                                            $username = str_replace(".","",$item->domain);

                                            if(strlen($username) > 8) {
                                                $username = substr($username,0,8);
                                            } 

                                            $account = $this->db->where('username', $username)->get('orders')->row();

                                            if(isset($account)) {
                                                $end = 0;
                                                while( 0 < $this->db->where('username', $username)->get('orders')->num_rows()) 
                                                {
                                                    $end++;
                                                    $trimlength = 8 - strlen($end);
                                                    $username = substr($username, 0, $trimlength) . $end;     
                                                 } 
                                                                                                                    
                                            }                                             

                                            $password = create_password();                                             
                                    } 

                                    if(isset($item->nameservers)) {
                                        $type = "domain";
                                    }

                                    if(isset($item->domain_only)) {
                                        $type = "domain_only";
                                    }
                        
                                    $order = array(
                                        'client_id' 	    => $co_id,
                                        'invoice_id'        => $invoice_id,
                                        'date'              => date('Y-m-d H:i:s'),
                                        'nameservers'	    => (isset($item->nameservers)) ? $item->nameservers : "",
                                        'item'		        => $item_id,
                                        'domain'            => $item->domain,
                                        'item_parent'       => (isset($item->item)) ? $item->item : 0,
                                        'type'		        => $type,
                                        'process_id'        => (in_array($item->renewal, $renewals)) ? time() + $count : $order_id,
                                        'order_id'          => $order_id,
                                        'fee'               => $total_cost,
                                        'processed'         => $date,
                                        'username'          => $username,
                                        'password'          => ($username != '-') ? $password : '-',
                                        'renewal_date'      => ($item->renewal == 'total_cost') ? date('Y-m-d') : $renewal_date,
                                        'renewal'           => $item->renewal,
                                        'additional_fields' => $item->cart_id,
                                        'authcode'          => (isset($item->authcode)) ? $item->authcode : ''
                                     ); 
                                     
                                     if($item->renewal == 'total_cost') {
                                         $order['status_id'] = 2;
                                     }

                                    App::save_data('orders', $order); 
                                    $username = "";
                                    $password = "";
                                    $count++;                        
                                } 
                            }   
                                                     
                        } 

                    }

                    $this->session->unset_userdata('cart');
                    $this->session->unset_userdata('order');
                    $this->session->unset_userdata('process');
                    $this->session->unset_userdata('co_id');

                    $activity = array(
                        'user' => User::get_id(),
                        'module' => 'orders',
                        'module_field_id' => $invoice_id,
                        'activity' => 'activity_order_created',
                        'icon' => 'fa-plus',
                        'value1' => $reference,
                    );


                $invoice_due = Invoice::get_invoice_due_amount($invoice_id);
                $inv = Invoice::view_by_id($invoice_id);

                 if($invoice_due <= 0) 
                    {
                        Invoice::update($invoice_id, array('status'=>'Paid'));
                        modules::run('orders/process', $invoice_id);
                    }

                else {
                
                    if(config_item('apply_credit') == 'TRUE' && $client->transaction_value > 0) {
                        $client->transaction_value = -1 * $client->transaction_value;
                        $payment = 0;                        
                        $balance = $client->transaction_value + $invoice_due;                                          

                        if(filter_var($balance, FILTER_VALIDATE_FLOAT) && $balance > 0) 
                        {
                            $payment = abs($client->transaction_value);
                            $funds = 0;
                        }

                        if(filter_var($balance, FILTER_VALIDATE_FLOAT) && $balance <= 0) 
                        {
                            $payment = $invoice_due;
                            $funds = abs($balance); 
                        }

                        $this->load->helper('string');

                        $data = array(
                            'invoice' => $invoice_id,
                            'paid_by' => $co_id,
                            'currency' => strtoupper($inv->currency),
                            'payer_email' => $client->company_email,
                            'payment_method' => '6',
                            'notes' => $payment . strtoupper($inv->currency) . 'Deducted from Account Funds',
                            'amount' => $payment,
                            'trans_id' => random_string('nozero', 6),
                            'month_paid' => date('m'),
                            'year_paid' => date('Y'),
                            'payment_date' => date('Y-m-d')
                        );

                        if ($payment_id = App::save_data('payments', $data)) {
                            $cur_i = App::currencies(strtoupper($inv->currency));
                            $data = array(
                            'module' => 'invoices',
                            'module_field_id' => $invoice_id,
                            'user' => $client->primary_contact,
                            'activity' => 'activity_payment_of',
                            'icon' => 'fa-usd',
                            'value1' => $inv->currency.''.$payment,
                            'value2' => $inv->reference_no
                            );

                            App::Log($data);
                        }
                    
                        $balance = array(
                            'transaction_value' => $funds
                        );
                        
                        $this->db->where('co_id', $client->co_id)->update('companies', $balance);                    
                        $invoice_due = Invoice::get_invoice_due_amount($invoice_id);
                        if($invoice_due <= 0) 
                        {
                            Invoice::update($invoice_id, array('status'=>'Paid'));
                            modules::run('orders/process', $invoice_id);
                        }
                    }
                }

                $this->send_invoice($invoice_id);
                redirect('invoices/view/'.$invoice_id);                
            
            }  
        else {
                $this->session->set_flashdata('response_status', 'warning');
                $this->session->set_flashdata('message', lang('empty_table'));				
                redirect($_SERVER['HTTP_REFERER']);
        }
    
    }




    public function upgrade()
    { 
        if ($this->input->post() && $this->input->post('upgrade') == "true") {

                $data = $this->session->userdata('upgrade');
              
                $this->db->select('*');
                $this->db->from('orders');
                $this->db->where('id', $data['account']);
                $order = $this->db->get()->row();  
                $current_item = Item::view_item($order->item_parent);          
                           
                $co_id = $order->client_id;
                $item = Item::view_item($data['item']);
                $currency = config_item('default_currency');         
                $reference = config_item('invoice_prefix').Invoice::generate_invoice_number();
                  
                $invoice = array(
                    'reference_no' => $reference,                   
                    'currency' =>  $currency,
                    'due_date' => $this->get_date_due(date('Y-m-d')),
                    'client' => $co_id
                ); 

                $invoice = array_merge($invoice, gateways());

                $item_tax_total = 0;
                $total_cost = $data['payable'];
                $tax_rate = 0; 

                if($item->item_tax_rate && $item->item_tax_rate > 0) 
                { 
                    $item_tax_total = Applib::format_deci(($item->item_tax_rate / 100) *  $data['payable']);
                    $total_cost =  Applib::format_deci($data['payable'] + $item_tax_total);
                    $tax_rate = $item->item_tax_rate;
                }

                if ($invoice_id = App::save_data('invoices', $invoice)) {
 
                        $items = array(
                                    'invoice_id' 	=> $invoice_id,                                    
                                    'item_name'		=> lang('upgrade_downgrade'),
                                    'item_desc'		=> $current_item->item_name ." - ". $item->item_name ,
                                    'unit_cost'		=> $data['payable'],
                                    'item_order'	=> 1,
                                    'item_tax_rate'	=> $tax_rate,
                                    'item_tax_total'=> $item_tax_total,
                                    'quantity'		=> 1,
                                    'total_cost'	=> $total_cost
                                    );            

                        if($item_id = App::save_data('items', $items)) {  
                                    $order = (array) $order;

                                    $order['invoice_id'] = $invoice_id;
                                    $order['item'] = $item_id;
                                    $order['item_parent']  = $data['item']; 
                                    $order['renewal_date'] = $data['renewal_date'];
                                    $order['renewal'] = $data['renewal'];
                                    $order['fee'] = $data['amount'];
                                    $order['order_id'] = time();
                                    $order['o_id'] = $order['id'];     
                                    $order['date'] = date('Y-m-d H:i:s');                     
                                    
                                    unset($order['id']);
                                    unset($order['date']);
                                    unset($order['status_id']);

                              App::save_data('orders', $order); 
                      
                         }                          
                            
                    } 

                    
                    $this->session->unset_userdata('item_id');
                    $this->session->unset_userdata('account_id');
                    $this->session->unset_userdata('upgrade');

                    $activity = array(
                        'user' => User::get_id(),
                        'module' => 'orders',
                        'module_field_id' => $invoice_id,
                        'activity' => 'activity_upgrade',
                        'icon' => 'fa-plus',
                        'value1' => $reference,
                    );

                    redirect('invoices/view/'.$invoice_id);
         }
           
    }




    public function edit($invoice_id = null)
    {
        if (User::is_admin() || User::perm_allowed(User::get_id(), 'edit_all_invoices')) {
            if ($this->input->post()) {
                $invoice_id = $this->input->post('inv_id', true);
                
                $this->form_validation->set_rules('client', 'Client', 'required');
                if ($this->form_validation->run() == false) {
                    $_POST = '';
                    Applib::go_to('invoices/edit/'.$invoice_id, 'error', lang('error_in_form'));
                } else {
                    $_POST['allow_2checkout'] = ($this->input->post('allow_2checkout') == 'on') ? 'Yes' : 'No';
                    $_POST['allow_paypal'] = ($this->input->post('allow_paypal') == 'on') ? 'Yes' : 'No';
                    $_POST['allow_stripe'] = ($this->input->post('allow_stripe') == 'on') ? 'Yes' : 'No';
                    $_POST['allow_bitcoin'] = ($this->input->post('allow_bitcoin') == 'on') ? 'Yes' : 'No';
                    $_POST['allow_coinpayments'] = ($this->input->post('allow_coinpayments') == 'on') ? 'Yes' : 'No';
                    $_POST['allow_payfast'] = ($this->input->post('allow_payfast') == 'on') ? 'Yes' : 'No';
                    $_POST['allow_instamojo'] = ($this->input->post('allow_instamojo') == 'on') ? 'Yes' : 'No';
                    $_POST['allow_mollie'] = ($this->input->post('allow_mollie') == 'on') ? 'Yes' : 'No';
                    $_POST['allow_razorpay'] = ($this->input->post('allow_razorpay') == 'on') ? 'Yes' : 'No';
                    $_POST['allow_paystack'] = ($this->input->post('allow_paystack') == 'on') ? 'Yes' : 'No';                    
                    $_POST['due_date'] = Applib::date_formatter($_POST['due_date']);

                    // $date = new DateTime($_POST['date_saved']);
                    $_POST['date_saved'] = Applib::date_formatter($_POST['date_saved']).' 00:00:00';

                    unset($_POST['files']);

                    if (Invoice::update($invoice_id, $this->input->post())) {
                        if ($this->input->post('r_freq') != 'none') {
                            Invoice::recur($invoice_id, $this->input->post());
                        }
                // Log Activity
                $activity = array(
                    'user' => User::get_id(),
                    'module' => 'invoices',
                    'module_field_id' => $invoice_id,
                    'activity' => 'activity_invoice_edited',
                    'icon' => 'fa-pencil',
                    'value1' => $_POST['reference_no'],
                );
                        App::Log($activity); // Log activity

                Applib::go_to('invoices/view/'.$invoice_id, 'success', lang('invoice_edited_successfully'));
                    }
                }
            } else {
                $data['page'] = lang('edit_invoice');
                $data['datepicker'] = true;
                $data['form'] = true;
                $data['editor'] = true; 
                $data['clients'] = Client::get_all_clients();
                $data['invoices'] = $this->_show_invoices();
                $data['currencies'] = App::currencies();
                $data['id'] = $invoice_id;
                $this->template
                ->set_layout('users')
                ->build('edit_invoice', isset($data) ? $data : null);
            }
        } else {
            App::access_denied('invoices');
        }
    }


    public function _show_invoices()
    {
        if (User::is_admin() || User::perm_allowed(User::get_id(), 'view_all_invoices')) {
            return $this->all_invoices($this->filter_by);
        } else {
            return $this->client_invoices(User::profile_info(User::get_id())->company, $this->filter_by);
        }
    }

    public function all_invoices($filter_by = null)
    {
        switch ($filter_by) {
            case 'paid':
            return Invoice::paid_invoices();
            break;

            case 'unpaid':
            return Invoice::unpaid_invoices();
            break;

            case 'partially_paid':
            return Invoice::partially_paid_invoices();
            break;

            case 'recurring':
            return Invoice::recurring_invoices();
            break;

            default:
            return Invoice::get_invoices();
            break;
        }
    }

    public function client_invoices($company, $filter_by)
    {
        switch ($filter_by) {

            case 'paid':
                return Invoice::paid_invoices($company);
                break;

            case 'unpaid':
                return Invoice::unpaid_invoices($company);
            break;

            case 'partially_paid':
                return Invoice::partially_paid_invoices($company);
            break;

            case 'recurring':
                return Invoice::recurring_invoices($company);
            break;

            default:
                return Invoice::get_client_invoices($company);
            break;
        }
    }

    public function pay($invoice = null)
    {
        if (!User::can_pay_invoice()) {
            App::access_denied('invoices');
        }
        $this->load->model('Payment');
        if ($this->input->post()) {
            $invoice_id = $this->input->post('invoice');

            $paid_amount = Applib::format_deci($this->input->post('amount'));

            $this->form_validation->set_rules('amount', 'Amount', 'required');

            if ($this->form_validation->run() == false) {
                Applib::go_to('invoices/view/'.$invoice_id, 'error', lang('payment_failed'));
            } else {
                $due = Invoice::get_invoice_due_amount($invoice_id);

                if ($paid_amount > $due) {
                    Applib::go_to('invoices/view/'.$invoice_id, 'error', lang('overpaid_amount'));
                }

                if ($this->input->post('attach_slip') == 'on') {
                    if (file_exists($_FILES['payment_slip']['tmp_name']) || is_uploaded_file($_FILES['payment_slip']['tmp_name'])) {
                        $upload_response = $this->upload_slip($this->input->post());
                        if ($upload_response) {
                            $attached_file = $upload_response;
                        } else {
                            $attached_file = null;
                            Applib::go_to('invoices/view/'.$invoice_id, 'error', lang('file_upload_failed'));
                        }
                    }
                }

                $data = array(
                'invoice' => $invoice_id,
                'paid_by' => Invoice::view_by_id($invoice_id)->client,
                'payment_method' => $this->input->post('payment_method'),
                'currency' => $this->input->post('currency'),
                'amount' => $paid_amount,
                'payment_date' => Applib::date_formatter($this->input->post('payment_date')),
                'trans_id' => $this->input->post('trans_id'),
                'notes' => $this->input->post('notes'),
                'month_paid' => date('m'),
                'year_paid' => date('Y'),
            );

                if($payment_id = Payment::save_pay($data))
                {
                    if($this->input->post('payment_method') == 6)
                    {
                        $client = Client::view_by_id(Invoice::view_by_id($invoice_id)->client);
                        $credit = $client->transaction_value;
                        $bal = $credit - $paid_amount;
                        
                        $balance = array(
                            'transaction_value' => Applib::format_deci($bal)
                        );
                        
                        $this->db->where('co_id', $client->co_id)->update('companies', $balance);    
                    }
                   
                        
                    if (isset($attached_file)) {
                        $data = array('attached_file' => $attached_file);
                        Payment::update_pay($payment_id, $data);
                    }

                    if (Invoice::payment_status($invoice_id) == 'fully_paid') {
                        Invoice::update($invoice_id, array('status' => 'Paid'));
                        modules::run('orders/process', $invoice_id);
                    }

                    // Log Activity
                    $cur = Invoice::view_by_id($invoice_id)->currency;
                    $cur_i = App::currencies($cur);

                    $data = array(
                    'user' => User::get_id(),
                    'module' => 'invoices',
                    'module_field_id' => $invoice_id,
                    'activity' => 'activity_payment_of',
                    'icon' => 'fa-usd',
                    'value1' => $cur_i->symbol.''.$paid_amount,
                    'value2' => Invoice::view_by_id($invoice_id)->reference_no,
                    );
                    App::Log($data); // Log activity

                if ($this->input->post('send_thank_you') == 'on') {
                    $this->_send_payment_email($invoice_id, $paid_amount);
                }  

                if (config_item('notify_payment_received') == 'TRUE') {
                    $this->_notify_admin($invoice_id, $paid_amount, $cur);
                }

                    Applib::go_to('invoices/view/'.$invoice_id, 'success', lang('payment_added_successfully'));
                }
            }


        } else {
            $data['page'] = lang('invoices');
            $data['id'] = $invoice;
            $data['datepicker'] = true;
            $data['attach_slip'] = true;
            $data['invoices'] = $this->_show_invoices();

            $this->template
        ->set_layout('users')
        ->build('pay_invoice', isset($data) ? $data : null);
        }
    }


 
    public function _notify_admin($invoice, $amount, $cur)
    {
        $client = Client::view_by_id(Invoice::view_by_id($invoice)->client)->company_name;
        $admins = User::admin_list();

        foreach ($admins as $key => $user) {
            $data = array(
                                'email' => $user->email,
                                'invoice_ref' => Invoice::view_by_id($invoice)->reference_no,
                                'amount' => Applib::format_quantity($amount),
                                'currency' => $cur,
                                'invoice_id' => $invoice,
                                'client' => $client,
                            );

            $email_msg = $this->load->view('new_payment', $data, true);

            $params = array(
                                'subject' => '['.config_item('company_name').'] Payment Confirmation',
                                'recipient' => $user->email,
                                'message' => $email_msg,
                                'attached_file' => '',
                                );

            modules::run('fomailer/send_email', $params);
        }
    }
 


    public function show($invoice_id = null)
    {
        $data = array('show_client' => 'Yes');
        Invoice::update($invoice_id, $data);
        Applib::go_to($_SERVER['HTTP_REFERER'], 'success', lang('invoice_visible'));
    }


    public function hide($invoice_id = null)
    {
        $data = array('show_client' => 'No');
        Invoice::update($invoice_id, $data);
        Applib::go_to($_SERVER['HTTP_REFERER'], 'success', lang('invoice_not_visible'));
    }


    public function cancel($invoice = null)
    {
        if ($this->input->post()) {
            $invoice_id = $this->input->post('id');
            $info = Invoice::view_by_id($invoice_id);

            $due = Invoice::get_invoice_due_amount($invoice_id);

            $data = array('status' => 'Cancelled');
            App::update('invoices', array('inv_id' => $invoice_id), $data);

            $inv_cur = $info->currency;
            $cur_i = App::currencies($inv_cur);

        // Log activity
            $data = array(
                'module' => 'invoices',
                'module_field_id' => $invoice_id,
                'user' => User::get_id(),
                'activity' => 'activity_invoice_cancelled',
                'icon' => 'fa-usd',
                'value1' => $info->reference_no,
                'value2' => $cur_i->symbol.''.$due,
                );
            App::Log($data);

            Applib::go_to('invoices/view/'.$invoice_id, 'success', lang('invoice_cancelled_successfully'));
        } else {
            $data = array('id' => $invoice);
            $this->load->view('modal/cancel', $data);
        }
    }

    public function mark_as_paid($invoice = null)
    {
        if ($this->input->post()) {
            $invoice_id = $this->input->post('invoice');
            $this->load->helper('string');
            $info = Invoice::view_by_id($invoice_id);

            $due = Invoice::get_invoice_due_amount($invoice_id);

            $transaction = array(
            'invoice' => $invoice_id,
            'paid_by' => $info->client,
            'payment_method' => '1',
            'currency' => $info->currency,
            'amount' => Applib::format_deci($due),
            'payment_date' => date('Y-m-d'),
            'trans_id' => random_string('nozero', 6),
            'month_paid' => date('m'),
            'year_paid' => date('Y'),
        );

            App::save_data('payments', $transaction);

            $data = array('status' => 'Paid');
            App::update('invoices', array('inv_id' => $invoice_id), $data);

            $inv_cur = $info->currency;
            $cur_i = App::currencies($inv_cur);

        // Log activity
            $data = array(
                'module' => 'invoices',
                'module_field_id' => $invoice_id,
                'user' => User::get_id(),
                'activity' => 'activity_payment_of',
                'icon' => 'fa-usd',
                'value1' => $cur_i->symbol.' '.$due,
                'value2' => $info->reference_no,
                );
            App::Log($data);

            Applib::go_to('invoices/view/'.$invoice_id, 'success', lang('payment_added_successfully'));
        } else {
            $data = array('invoice' => $invoice);
            $this->load->view('modal/mark_as_paid', $data);
        }
    }


    public function stop_recur($invoice_id = null)
    {
        if (User::is_client()) {
            Applib::go_to('invoices', 'error', lang('access_denied'));
        }

        if ($this->input->post()) {
            $invoice = $this->input->post('invoice', true);
            $this->load->model('invoices/invoices_recurring');

            if ($this->invoices_recurring->stop($invoice)) {
                // Log activity
            $data = array(
                'module' => 'invoices',
                'module_field_id' => $invoice,
                'user' => User::get_id(),
                'activity' => 'activity_recurring_stopped',
                'icon' => 'fa-plus',
                'value1' => Invoice::view_by_id($invoice)->reference_no,
                'value2' => '',
                );
                App::Log($data);
                Applib::go_to('invoices/view/'.$invoice, 'success', lang('recurring_invoice_stopped'));
            }
        } else {
            $data['invoice'] = $invoice_id;
            $this->load->view('modal/stop_recur', $data);
        }
    }



    public function get_date_due($invoice_date_created)
    {
        $invoice_date_due = new DateTime($invoice_date_created);
        $invoice_date_due->add(new DateInterval('P' . config_item('invoices_due_after') . 'D'));
        return $invoice_date_due->format('Y-m-d');
    } 


    public function transactions($invoice_id = null)
    {
        $this->load->model('Payment');
        $this->template->title(lang('payments'));
        $data['page'] = lang('payments');

        $data['invoices'] = $this->_show_invoices();
        $data['datatables'] = true;
        $data['payments'] = Payment::by_invoice($invoice_id);
        $data['id'] = $invoice_id;
        $this->template
    ->set_layout('users')
    ->build('invoice_payments', isset($data) ? $data : null);
    }


    public function delete($invoice_id = null)
    {
        if ($this->input->post()) {
            $invoice = $this->input->post('invoice', true);

            if($this->db->where('invoice_id', $invoice)->get('orders')->num_rows() > 0) {
                Invoice::update($invoice, array('inv_deleted' => 'Yes'));
            }
            else {
                Invoice::delete($invoice);
            }            

            Applib::go_to('invoices', 'success', lang('invoice_deleted_successfully'));
        } else {
            $data['invoice'] = $invoice_id;
            $this->load->view('modal/delete_invoice', $data);
        }
    }




    public function add_funds_invoice($company = null)
    {     
 
        if ($this->input->post() && null != $this->input->post('create_invoice')) {
            $user = User::get_id();            
            $user_company = User::profile_info($user)->company; 

            $data = array(
                'reference_no' => config_item('invoice_prefix').Invoice::generate_invoice_number(),                   
                'currency' => config_item('default_currency'),
                'due_date' => $this->get_date_due(date('Y-m-d')),
                'client' => $user_company,
                'notes' => config_item('default_terms')
            );

            $data = array_merge($data, gateways());

            if ($invoice_id = App::save_data('invoices', $data)) {
                $item = array(
                    'invoice_id' 	=> $invoice_id,
                    'item_name'		=> lang('add_funds'),
                    'item_desc'		=> config_item('company_name') . " " . lang('credit'),
                    'unit_cost'		=> Applib::format_deci($this->input->post('amount')),
                    'item_order'	=> 1,
                    'quantity'		=> 1,
                    'total_cost'	=> Applib::format_deci($this->input->post('amount'))
                    );            

                if($item_id = App::save_data('items', $item)) { 
                    redirect('invoices/view/'.$invoice_id); 
                }
            }
            
        }
        else {
            redirect('clients');
        }
           
    }



    
    public function add_funds($company)
    {  
        $data['company'] = $company;
        $this->load->view('modal/add_funds', $data);     
    }





    public function remind($invoice = null)
    {
        if ($this->input->post()) {
            $invoice = $this->input->post('invoice_id');
            $message = $this->input->post('message');

            $cur = Invoice::view_by_id($invoice)->currency;
            $reference = Invoice::view_by_id($invoice)->reference_no;

            $subject = $this->input->post('subject');
            $signature = App::email_template('email_signature', 'template_body');

            $logo_link = create_email_logo();

            $logo = str_replace('{INVOICE_LOGO}', $logo_link, $message);
            $ref = str_replace('{REF}', $reference, $logo);

            $client = str_replace('{CLIENT}', $this->input->post('client_name'), $ref);
            $amount = str_replace('{AMOUNT}', $this->input->post('amount'), $client);
            $currency = str_replace('{CURRENCY}', App::currencies($cur)->symbol, $amount);
            $link = str_replace('{INVOICE_LINK}', base_url().'invoices/view/'.$invoice, $currency);
            $signature = str_replace('{SIGNATURE}', $signature, $link);
            $message = str_replace('{SITE_NAME}', config_item('company_name'), $signature);

            $this->_email_invoice($invoice, $message, $subject, $cc = 'off');

        // Log Activity
        $activity = array(
            'user' => User::get_id(),
            'module' => 'invoices',
            'module_field_id' => $invoice,
            'activity' => 'activity_invoice_reminder_sent',
            'icon' => 'fa-shopping-cart',
            'value1' => $reference,
        );
            App::Log($activity); // Log activity

        Applib::go_to('invoices/view/'.$invoice, 'success', lang('reminder_sent_successfully'));
        } else {
            $data['id'] = $invoice;
            $this->load->view('modal/invoice_reminder', $data);
        }
    }


    public function send_invoice($invoice_id = null)
    {
        if ($this->input->post()) {
            $id = $this->input->post('invoice');
            $invoice = Invoice::view_by_id($id);

            $client = Client::view_by_id($invoice->client);
            $due = Invoice::get_invoice_due_amount($id);
            $cur = App::currencies($invoice->currency);

            if ($client->primary_contact > 0) {
                $login = '?login='.$this->tank_auth->create_remote_login($client->primary_contact);
            } else {
                $login = '';
            }

            $subject = $this->input->post('subject');
            $message = $this->input->post('message');
            $signature = App::email_template('email_signature', 'template_body');



            $logo_link = create_email_logo();

            $logo = str_replace('{INVOICE_LOGO}', $logo_link, $message);

            $client_name = str_replace('{CLIENT}', $client->company_name, $logo);
            $ref = str_replace('{REF}', $invoice->reference_no, $client_name);
            $amount = str_replace('{AMOUNT}', Applib::format_quantity($due), $ref);
            $currency = str_replace('{CURRENCY}', $cur->symbol, $amount);
            $link = str_replace('{INVOICE_LINK}', base_url().'invoices/view/'.$id.$login, $currency);
            $signature = str_replace('{SIGNATURE}', $signature, $link);
            $message = str_replace('{SITE_NAME}', config_item('company_name'), $signature);

            $this->_email_invoice($id, $message, $subject, $this->input->post('cc_self')); // Email Invoice

        $data = array('emailed' => 'Yes', 'date_sent' => date('Y-m-d H:i:s', time()));
            Invoice::update($id, $data);

        // Log Activity
        $activity = array(
            'user' => User::get_id(),
            'module' => 'invoices',
            'module_field_id' => $id,
            'activity' => 'activity_invoice_sent',
            'icon' => 'fa-envelope',
            'value1' => $invoice->reference_no,
        );
            App::Log($activity);

            Applib::go_to('invoices/view/'.$id, 'success', lang('invoice_sent_successfully'));
        } else {
            $data['id'] = $invoice_id;
            $this->load->view('modal/email_invoice', $data);
        }
    }

   
    public function pdf($invoice_id = null)
    {
        if (!User::can_view_invoice(User::get_id(), $invoice_id)) {
            App::access_denied('invoices');
        }

        $data['page'] = lang('invoices');
        $data['stripe'] = true;
        $data['twocheckout'] = true;
        $data['sortable'] = true;
        $data['typeahead'] = true;
        $data['rates'] = Invoice::get_tax_rates();
        $data['id'] = $invoice_id;

        $html = $this->load->view('invoice_pdf', $data, true);

        $pdf = array(
        'html' => $html,
        'title' => lang('invoice').' '.Invoice::view_by_id($invoice_id)->reference_no,
        'author' => config_item('company_name'),
        'creator' => config_item('company_name'),
        'filename' => lang('invoice').' '.Invoice::view_by_id($invoice_id)->reference_no.'.pdf',
        'badge' => config_item('display_invoice_badge'),
    );

        $this->applib->create_pdf($pdf);
    }


    public function attach_pdf($invoice_id)
    {
        if (!User::can_view_invoice(User::get_id(), $invoice_id)) {
            App::access_denied('invoices');
        }

        $data['page'] = lang('invoices');
        $data['stripe'] = true;
        $data['twocheckout'] = true;
        $data['sortable'] = true;
        $data['typeahead'] = true;
        $data['rates'] = Invoice::get_tax_rates();
        $data['id'] = $invoice_id;

        $html = $this->load->view('invoice_pdf', $data, true);

        $pdf = array(
        'html' => $html,
        'title' => lang('invoice').' '.Invoice::view_by_id($invoice_id)->reference_no,
        'author' => config_item('company_name'),
        'creator' => config_item('company_name'),
        'attach' => true,
        'filename' => lang('invoice').' '.Invoice::view_by_id($invoice_id)->reference_no.'.pdf',
        'badge' => config_item('display_invoice_badge'),
    );

        $invoice = $this->applib->create_pdf($pdf);

        return $invoice;
    }


    public function _send_payment_email($invoice_id, $paid_amount)
    {
        $message = App::email_template('payment_email', 'template_body');
        $subject = App::email_template('payment_email', 'subject');
        $signature = App::email_template('email_signature', 'template_body');

        $info = Invoice::view_by_id($invoice_id);

        $logo_link = create_email_logo();

        $logo = str_replace('{INVOICE_LOGO}', $logo_link, $message);
        $ref = str_replace('{REF}', $info->reference_no, $logo);
        $invoice_currency = str_replace('{INVOICE_CURRENCY}', App::currencies($info->currency)->symbol, $ref);
        $amount = str_replace('{PAID_AMOUNT}', Applib::format_quantity($paid_amount), $invoice_currency);
        $EmailSignature = str_replace('{SIGNATURE}', $signature, $amount);
        $message = str_replace('{SITE_NAME}', config_item('company_name'), $EmailSignature);

        $data['message'] = $message;
        $message = $this->load->view('email_template', $data, true);
        $params['recipient'] = Client::view_by_id($info->client)->company_email;
        $params['subject'] = '['.config_item('company_name').']'.' '.$subject;
        $params['message'] = $message;
        $params['attached_file'] = '';
        $params['alt_email'] = 'billing';

        modules::run('fomailer/send_email', $params);
    }


    public function _email_invoice($invoice_id, $message, $subject, $cc)
    {
        $data['message'] = $message;
        $invoice = Invoice::view_by_id($invoice_id);

        $message = $this->load->view('email_template', $data, true);

        $params = array(
        'recipient' => Client::view_by_id($invoice->client)->company_email,
        'subject' => $subject,
        'message' => $message,
    );

        $this->load->helper('file');
        $attach['inv_id'] = $invoice_id;
        if (config_item('pdf_engine') == 'invoicr') {
            $invoicehtml = modules::run('fopdf/attach_invoice', $attach);
        }
        if (config_item('pdf_engine') == 'mpdf') {
            $invoicehtml = $this->attach_pdf($invoice_id);
        }

        $params['attached_file'] = './resource/tmp/'.lang('invoice').' '.$invoice->reference_no.'.pdf';
        $params['attachment_url'] = base_url().'resource/tmp/'.lang('invoice').' '.$invoice->reference_no.'.pdf';

        if (strtolower($cc) == 'on') {
            $params['cc'] = User::login_info(User::get_id())->email;
        }

        modules::run('fomailer/send_email', $params);
    //Delete invoice in tmp folder
    if (is_file('./resource/tmp/'.lang('invoice').' '.$invoice->reference_no.'.pdf')) {
        unlink('./resource/tmp/'.lang('invoice').' '.$invoice->reference_no.'.pdf');
    }
    }


    public function _get_clients()
    {
        $sort = array('order_by' => 'date_added', 'order' => 'desc');

        return Applib::retrieve(Applib::$companies_table, array('co_id !=' => '0'));
    }


    public function upload_slip($data)
    {
        Applib::is_demo();

        if ($data) {
            $config['upload_path'] = './resource/uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf|docx|doc';
            $config['remove_spaces'] = true;
            $config['overwrite'] = false;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('payment_slip')) {
                $filedata = $this->upload->data();

                return $filedata['file_name'];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    
    public function _filter_by()
    {
        $filter = isset($_GET['view']) ? $_GET['view'] : '';

            switch ($filter) {

            case 'paid':
            return 'paid';
            break;

            case 'unpaid':
            return 'unpaid';
            break;

            case 'partially_paid':
            return 'partially_paid';

            break;
            case 'recurring':
            return 'recurring';
            break;

            default:
            return null;
            break;
        }
    }
}

/* End of file invoices.php */
