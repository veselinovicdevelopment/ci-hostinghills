<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends MX_Controller {  
 
    function __construct()
    {
        parent::__construct();   
        $this->load->model(array('Item', 'App', 'User'));
        $this->load->module('layouts');
        $this->load->library('template');
        
        if (!$this->session->userdata('cart')) {
            $this->session->set_userdata('cart', array());
        }

    }
    
    
    function layout($data, $view)
    {
        $data['page'] = lang($view);

        if(!User::is_logged_in()) 
        {   $this->template->set_theme(config_item('active_theme'));
            $this->template->set_partial('header', 'sections/header');
            $this->template->set_partial('footer', 'sections/footer');
            $this->template->set_layout('main')->build($view, isset($data) ? $data : NULL);
        }
        else
        {   
            $this->template->set_layout('users')->build($view, isset($data) ? $data : NULL);
        }
    }

  

    function index()
    {        
        $data = array();
        $this->template->title(config_item('company_name')); 
        $this->layout($data, 'shopping_cart');       
    }



    function options()
    {  
        $this->template->title(config_item('shopping_cart'));            
        $cart = $this->session->userdata('cart'); 
        
        if ($this->input->post()) { 
            $item = Item::view_item($this->input->post('id'));      
            
            $selected = $this->input->post('selected');
            $selected = explode(',', $selected);  
            $tax = (null != $item->item_tax_rate && $item->item_tax_rate > 0) ? ($selected[3]*$item->item_tax_rate)/100 : '0.00';
            if($item->require_domain == 'Yes') {           
                if(isset($cart[count($cart) - 1]->nameservers) && !isset($cart[count($cart) - 1]->domain_only)){                    
                    $cart[] = (object) array('cart_id' => $cart[count($cart) - 1]->cart_id, 
                    'item' => $selected[0], 
                    'name' => $selected[1], 
                    'renewal' => $selected[2], 
                    'price' => $selected[3],
                    'tax' => $tax, 
                    'authcode' => '', 
                    'domain' => $cart[count($cart) - 1]->domain);
                    $this->session->set_userdata('cart', $cart);
                    
                    $domain = $cart[count($cart) - 2];
                    $tld = explode('.', $domain->domain, 2);
                    $ext = $tld[1]; 

                    if($this->additional_fields($ext) || $domain->name == lang('domain_transfer'))
                    {     
                         if($domain->name == lang('domain_transfer')) {
                            $this->session->set_userdata('transfer', true);
                         } 

                        redirect('cart/domain_fields');
                    }

                    else {
                        redirect('cart');
                    }                    
                }

                else {
                                        
                    $this->session->set_userdata('hold', array(
                    'cart_id' => time(), 
                    'item' => $selected[0], 
                    'name' => $selected[1], 
                    'renewal' => $selected[2], 
                    'price' => $selected[3],       
                    'tax' => $tax,         
                    'domain' => '')); 
                    redirect('cart/domain');                
                } 
            }
            else 
            {            
                $cart[] = (object) array(
                'cart_id' => time(), 
                'item' => $selected[0], 
                'name' => $selected[1], 
                'renewal' => $selected[2], 
                'price' => $selected[3], 
                'tax' => $tax, 
                'domain' => '-');

                if($item->setup_fee > 0) { 
                    $cart[] = (object) array(
                    'cart_id' => time(), 
                    'item' => '', 
                    'name' => $selected[1]. ' ' .lang('setup_fee'), 
                    'renewal' => 'one_time_payment', 
                    'tax' => $tax, 
                    'price' => $item->setup_fee, 
                    'domain' => '-');
                }
                $this->session->set_userdata('cart', $cart); 
                redirect('cart');
            }
        }
        
        else {
            $item = '';
            if(isset($_GET['item'])) { 
                $item = Item::view_item($_GET['item']);
            }            
            $data['package'][] = $item;
            $this->layout($data, 'options'); 
        }       
    }



    function domain()
    { 
        $this->template->title(config_item('domain_registration'));
        $data['domains'] = Item::get_domains();  
        $this->layout($data,  'domain'); 
    }



    function hosting_packages()
    { 
        $this->template->title(config_item('domain_registration'));
        $data = array();
        $this->layout($data, 'hosting_packages'); 
    }



    function add_nameservers()
    { 
        $nameservers = $this->input->post('nameserver_1', true).",".$this->input->post('nameserver_2', true);
        if($this->input->post('nameserver_3', true) != '') : $nameservers .= ",".$this->input->post('nameserver_3', true); endif;
        if($this->input->post('nameserver_4', true) != '') : $nameservers .= ",".$this->input->post('nameserver_4', true); endif;
        $cart = $this->session->userdata('cart'); 
        $cart[count($cart) - 1]->nameservers = $nameservers;
        $this->session->set_userdata('cart', $cart); 

        $item = $cart[count($cart) - 1]; 
        $tld = explode('.', $item->domain, 2);
        $ext = $tld[1]; 
        
        if($this->additional_fields($ext) || $item->name == lang('domain_transfer'))
        {    
            if($item->name == lang('domain_transfer')) {
                $this->session->set_userdata('transfer', true);
            }
            redirect('cart/domain_fields');
        }

        else {
            redirect('cart'); 
        }       
    }




    function default_nameservers()
    { 
        $cart = $this->session->userdata('cart'); 
        $item = $cart[count($cart) - 1];
        $tld = explode('.', $item->domain, 2);
        $ext = $tld[1]; 

        if($this->additional_fields($ext) || $item->name == lang('domain_transfer'))
        {    
            if($item->name == lang('domain_transfer')) {
                $this->session->set_userdata('transfer', true);
            } 

            redirect('cart/domain_fields');
        }

        else {
            redirect('cart');
        }                    
               
    }



    function domain_only()
    { 
        $cart = $this->session->userdata('cart'); 
        if(isset($cart[count($cart) - 1]->nameservers)){
             $cart[count($cart) - 1]->domain_only = true;
        }
        $this->session->set_userdata('cart', $cart); 
        redirect('cart/nameservers');
    }



    function nameservers()
    {   $data = array();   
        $this->template->title(config_item('name_servers'));
        $this->layout($data, 'nameservers'); 
    }



    function add_existing()
    { 
        $data = array();        
        $data['page'] = lang('existing_domain');
        $this->template->title(config_item('company_name')); 
        $this->layout($data, 'existing_domain'); 
    }



    function existing_domain()
    {
        $cart = $this->session->userdata('cart');
        if ($this->input->post()) {
            if($this->session->userdata('hold')) {
                $held = $this->session->userdata('hold');
                $held['domain'] = $this->input->post('domain', true);
                $cart[] = (object) $held;
                $this->session->unset_userdata('hold');
            }

            $this->session->set_userdata('cart', $cart);  
                redirect('cart');             
        }
    }




    function add_domain()
    {
        $cart = $this->session->userdata('cart');
           if ($this->input->post()) {          

            $count = 0;

            foreach($cart AS $item) {
                if(
                    $item->domain == $this->input->post('domain') && $item->item == '') {
                    $count++;
                }
            }

            if($count == 0) {

                $time = time();
                $this->session->set_userdata('fields',  $time);

                $tld = explode('.', $this->input->post('domain'), 2);
                $ext = $tld[1]; 
                $item = $this->db->where('item_name', $ext)->get('items_saved')->row();

                $cart[] = (object) array(
                    'cart_id' =>  $time,
                    'item' => $item->item_id, 
                    'renewal' => 'annually', 
                    'name' => $this->input->post('type'),             
                    'price' => $this->input->post('price'), 
                    'domain' => $this->input->post('domain'), 
                    'tax' => '0.00',
                    'authcode' => '',
                    'nameservers' => ''); 


                if($this->session->userdata('hold')) {
                    $held = $this->session->userdata('hold');
                    $held['domain'] = $this->input->post('domain', true); 
                    $cart[] = (object) $held;
                    $this->session->unset_userdata('hold');
                }
            }

            $this->session->set_userdata('cart', $cart);     
            if($this->additional_fields($ext) || $item->name == lang('domain_transfer'))
            {    
                if($item->name == lang('domain_transfer')) {
                    $this->session->set_userdata('transfer', true);
                } 
    
                redirect('cart/domain_fields');
            }
    
            else {
                redirect('cart');
            }                  
        }
    }



    function additional_fields($tld = null)
    {
        $tlds = array("us", "co.uk", "net.uk", "org.uk", "plc.uk", "ltd.uk", "me.uk", "uk", "ca", "es", "sg", "com.sg", "edu.sg", "net.sg", "org.sg", "per.sg", "tel", "it", 
        "de", "com.au", "net.au", "org.au", "asn.au", "id.au", "asia", "pro", "coop", "cn", "fr", "re", "pm", "tf", "wf", "yt", "nu", "quebec", "jobs", "travel",
        "ru", "ro", "srts.ro", "co.ro", "com.ro", "firm.ro", "info.ro", "nom.ro", "nt.ro", "org.ro", "rec.ro", "ro.ro", "store.ro", "tm.ro", "www.ro",
        "hk", "com.hk", "edu.hk", "gov.hk", "idv.hk", "net.hk", "org.hk", "pl", "pc.pl", "miasta.pl", "atm.pl", "rel.pl", "gmina.pl", "szkola", "sos.pl",
        "media.pl", "edu.pl", "auto.pl", "agro.pl", "turystyka.pl", "gov.pl", "aid.pl", "nieruchomosci.pl", "com.pl", "priv.pl", "tm.pl", "travel.pl", "info.pl",
        "org.pl", "net.pl", "sex.pl", "sklep.pl", "powiat.pl", "mail.pl", "realestate.pl", "shop.pl", "mil.pl", "nom.pl", "gsm.pl", "tourism.pl", "targi.pl", "biz.pl",
        "se", "tm.se", "org.se", "pp.se", "parti.se", "presse.se");
        if(in_array($tld, $tlds)) {
            $this->session->set_userdata('tld', $tld);
            return true;
        }
        return false;
    }




    function remove($id)
    {
        $cart = $this->session->userdata('cart');
        foreach($cart as $key => $row) {
            if($row->cart_id == $id) {
                unset($cart[$key]);
            }           
        }  
        $this->session->set_userdata('cart', $cart);
        redirect('cart');         
    }



    function remove_all()
    {
        $this->session->set_userdata('cart', array()); 
        $this->session->unset_userdata('hold');
        $this->session->set_userdata('tld', '');
        redirect('cart');         
    }



    function continue()
    {   
        (User::is_logged_in()) ? redirect('orders/add_order') : redirect(base_url());
    }



    function shopping_cart()
    {   $data = array();
        $this->template->title(config_item('company_name')); 
        $this->layout($data, 'shopping_cart'); 
    }


    
    function domain_fields()
    {   $data = array();
        $this->template->title(config_item('company_name')); 
        if ($this->input->post()) {            
            foreach($this->input->post() as $key => $value)
                {    
                    if($key != 'authcode') {
                        $fields = array(
                        'domain' => $this->session->userdata('fields'),                
                        'field_name' => str_replace("_"," ",$key),
                        'field_value' => $value
                        );
                        App::save_data('additional_fields', $fields); 
                    }                   
                }

            $cart = $this->session->userdata('cart'); 
            $cart[count($cart) - 1]->authcode = $this->input->post('authcode');           
            $this->session->set_userdata('cart', $cart);
            $this->session->unset_userdata('transfer');
            $this->session->unset_userdata('tld');
            redirect('cart'); 
        }
        $this->layout($data, 'additional_fields'); 
    }

    	

	function checkout()
	{ 
        $order = (object) array('order' => $this->session->userdata('cart'));
        $data = array('order' => $order, 'process' => true);
        $this->session->set_userdata($data);
        redirect('auth/register');
	}


 

}

/* End of file cart.php */