<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Companies extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        User::logged_in();

        $this->load->library(array('form_validation'));
        $this->load->model(array('Client', 'App', 'Invoice', 'Payment', 'Domain'));
        if (!User::is_admin() && !User::is_staff() ) {
            $this->session->set_flashdata('message', lang('access_denied'));
            redirect('');
        }

        foreach (config_item('tank_auth') as $key => $value) {
            $this->config->set_item($key, $value);
        }

        $this->load->helper(array('inflector'));
        $this->applib->set_locale();
    }

    public function index()
    {
        $this->load->module('layouts');
        $this->load->library('template');
        $this->template->title(lang('clients').' - '.config_item('company_name'));
        $data['page'] = lang('clients');
        $data['datatables'] = true;
        $data['form'] = true;
        $data['currencies'] = App::currencies();
        $data['languages'] = App::languages();
        $data['companies'] = Client::get_all_clients();
        $data['countries'] = App::countries();
        $this->template
                ->set_layout('users')
                ->build('companies', isset($data) ? $data : null);
    }



    public function view($company = null)
    {
        $this->load->module('layouts');
        $this->load->library('template');
        $this->template->title(lang('clients').' - '.config_item('company_name'));

        $servers = $this->db->get('servers')->result();		 

        $data['page'] = lang('client');
        $data['datatables'] = true;
        $data['form'] = true;
        $data['editor'] = true;
        $data['tab'] = ($this->uri->segment(4) == '') ? 'accounts' : $this->uri->segment(4);
        $data['company'] = $company;

        $this->template
        ->set_layout('users')
        ->build('view', isset($data) ? $data : null);
    }

    

    public function create()
    {

        if ($this->input->post()) {
            $custom_fields = array();
            foreach ($_POST as $key => &$value) {
                if (strpos($key, 'cust_') === 0) {
                    $custom_fields[$key] = $value;
                    unset($_POST[$key]);
                }
            }

            $this->form_validation->set_rules('company_ref', 'Client Ref', 'required|is_unique[companies.company_ref]');
            $this->form_validation->set_rules('company_name', 'Client Name', 'required');
            $this->form_validation->set_rules('company_email', 'Client Email', 'required|valid_email');
            $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean');
            $this->form_validation->set_rules('confirm_password', lang('confirm_password'), 'trim|xss_clean|matches[password]');

            if ($this->form_validation->run() == false) {
                $_POST = '';
                        // $errors = validation_errors();
                        Applib::go_to('companies', 'error', lang('error_in_form'));
            } else {
   
                $username = $this->input->post('username');
                $email = $this->input->post('company_email'); 
                $password = $this->input->post('password'); 
                
                $hasher = new PasswordHash(
					$this->config->item('phpass_hash_strength', 'tank_auth'),
					$this->config->item('phpass_hash_portable', 'tank_auth'));
			        $hashed_password = $hasher->HashPassword($password);
                

                if (!is_username_available($username)) { 
                     Applib::go_to('companies', 'error', lang('auth_username_in_use'));
        
                } elseif (!is_email_available($email)) { 
                    Applib::go_to('companies', 'error', lang('auth_email_in_use'));        
                } else {
            
                    unset($_POST['username']);
                    unset($_POST['password']);
                    unset($_POST['confirm_password']);


                    $data = array(
                        'username'	=> $username, 
                        'password'  => $hashed_password,
                        'email'		=> $email,
                        'role_id'	=> 2 
                    );

                    $user_id = App::save_data('users', $data);

                    $_POST['primary_contact'] = $user_id;

                    $company_id = Client::save($this->input->post(null, true)); 
                           
        
                    $profile = array(
                        'user_id'   => $user_id,
                        'company'	=> $company_id,
                        'fullname'	=> $this->input->post('company_name'),
                        'phone'		=> $this->input->post('company_phone'),
                        'avatar'	=> 'default_avatar.jpg',
                        'language'	=> $this->input->post('language'),
                        'locale'	=> config_item('locale') ? config_item('locale') : 'en_US'
                    );

                    $user_id = App::save_data('account_details', $profile);                    
                }


                foreach ($custom_fields as $key => $f) {
                    $key = str_replace('cust_', '', $key);
                    $r = $this->db->where(array('client_id'=>$company_id,'meta_key'=>$key))->get('formmeta');
                    $cf = $this->db->where('name',$key)->get('fields');
                    $data = array(
                        'module'    => 'clients',
                        'field_id'  => $cf->row()->id,
                        'client_id' => $company_id,
                        'meta_key'  => $cf->row()->name,
                        'meta_value'    => is_array($f) ? json_encode($f) : $f
                    );
                    ($r->num_rows() == 0) ? $this->db->insert('formmeta',$data) : $this->db->where(array('client_id'=>$company_id,'meta_key'=>$cf->row()->name))->update('formmeta',$data);
                }

                $args = array(
                            'user' => User::get_id(),
                            'module' => 'Clients',
                            'module_field_id' => $company_id,
                            'activity' => 'activity_added_new_company',
                            'icon' => 'fa-user',
                            'value1' => $this->input->post('company_name', true),
                        );
                App::Log($args);

                $this->session->set_flashdata('response_status', 'success');
                $this->session->set_flashdata('message', lang('client_registered_successfully'));
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->load->view('modal/create');
        }
    }



    public function update($company = null)
    {
        if ($this->input->post()) {

            $custom_fields = array();
            foreach ($_POST as $key => &$value) {
                if (strpos($key, 'cust_') === 0) {
                    $custom_fields[$key] = $value;
                    unset($_POST[$key]);
                }
            }
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span><br>');
            $this->form_validation->set_rules('company_ref', 'Company ID', 'required');
            $this->form_validation->set_rules('company_name', 'Company Name', 'required');
            $this->form_validation->set_rules('company_email', 'Company Email', 'required|valid_email'); 

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('response_status', 'error');
                $this->session->set_flashdata('message', lang('error_in_form'));
                $company_id = $_POST['co_id'];
                $_POST = '';
                redirect('companies/view/'.$company_id);
            } else {
                $company_id = $_POST['co_id'];

                foreach ($custom_fields as $key => $f) {
                    $key = str_replace('cust_', '', $key);
                    $r = $this->db->where(array('client_id'=>$company_id,'meta_key'=>$key))->get('formmeta');
                    $cf = $this->db->where('name',$key)->get('fields');
                    $data = array(
                        'module'    => 'clients',
                        'field_id'  => $cf->row()->id,
                        'client_id' => $company_id,
                        'meta_key'  => $cf->row()->name,
                        'meta_value'    => is_array($f) ? json_encode($f) : $f
                    );
                    ($r->num_rows() == 0) ? $this->db->insert('formmeta',$data) : $this->db->where(array('client_id'=>$company_id,'meta_key'=>$cf->row()->name))->update('formmeta',$data);
                }

        
                Client::update($company_id, $this->input->post());

                $args = array(
                            'user' => User::get_id(),
                            'module' => 'Clients',
                            'module_field_id' => $company_id,
                            'activity' => 'activity_updated_company',
                            'icon' => 'fa-edit',
                            'value1' => $this->input->post('company_name', true),
                        );
                App::Log($args);

                $this->session->set_flashdata('response_status', 'success');
                $this->session->set_flashdata('message', lang('client_updated'));
                redirect('companies/view/'.$company_id);
            }
        } else {
            $data['company'] = $company;
            $this->load->view('modal/edit', $data);
        }
    }





    public function file($id = null)
    {
        if ($this->uri->segment(3) == 'delete'): // Delete file code

                    if ($this->input->post()) {
                        $file_id = $this->input->post('file', true);

                        $file = $this->db->where('file_id', $file_id)->get('files')->row();

                        $fullpath = './resource/uploads/'.$file->file_name;
                        if (file_exists($fullpath)) {
                            unlink($fullpath);
                        }

                        App::delete('files', array('file_id' => $file_id));

                    // Log activity
                                $data = array(
                                    'module' => 'Clients',
                                    'module_field_id' => $file->client_id,
                                    'user' => User::get_id(),
                                    'activity' => 'activity_deleted_a_file',
                                    'icon' => 'fa-times',
                                    'value1' => $file->file_name,
                                    'value2' => '',
                                    );
                        App::Log($data);
                        Applib::go_to('companies/view/'.$file->client_id, 'success', lang('file_deleted'));
                    } else {
                        $data['file_id'] = $this->uri->segment(4);
                        $data['action'] = 'delete_file';
                        $this->load->view('modal/file_action', $data);
                    } elseif ($this->uri->segment(3) == 'add'): // Adding a file

                    if ($this->input->post()) {
                        Applib::is_demo();
                        $company = $this->input->post('company', true);
                        $description = $this->input->post('description', true);
                        $config['upload_path'] = './resource/uploads';
                        $config['allowed_types'] = config_item('allowed_files');
                        $config['max_size'] = config_item('file_max_size');
                        $config['overwrite'] = false;

                        $this->load->library('upload');

                        $this->upload->initialize($config);

                        if (!$this->upload->do_multi_upload('clientfiles')) {
                            Applib::make_flashdata(array(
                            'response_status' => 'error',
                            'message' => lang('operation_failed'),
                            'form_error' => $this->upload->display_errors('<span class="text-danger">', '</span><br>'),
                            ));
                            redirect('companies/view/'.$company);
                        } else {
                            $fileinfs = $this->upload->get_multi_upload_data();
                            foreach ($fileinfs as $findex => $fileinf) {
                                $data = array(
                                    'client_id' => $company,
                                    'path' => null,
                                    'file_name' => $fileinf['file_name'],
                                    'title' => $_POST['title'],
                                    'ext' => $fileinf['file_ext'],
                                    'size' => Applib::format_deci($fileinf['file_size']),
                                    'is_image' => $fileinf['is_image'],
                                    'image_width' => $fileinf['image_width'],
                                    'image_height' => $fileinf['image_height'],
                                    'description' => $description,
                                    'uploaded_by' => User::get_id(),
                                );
                                $file_id = App::save_data('files', $data);
                            }

                 // Log activity
                        $data = array(
                            'module' => 'Clients',
                            'module_field_id' => $company,
                            'user' => User::get_id(),
                            'activity' => 'activity_uploaded_file',
                            'icon' => 'fa-file',
                            'value1' => $this->input->post('title', true),
                            'value2' => '',
                            );
                            App::Log($data);
                            Applib::go_to($_SERVER['HTTP_REFERER'], 'success', lang('file_uploaded_successfully'));
                        }
                    } else {
                        $data['company'] = $this->uri->segment(4);
                        $data['action'] = 'add_file';
                        $this->load->view('modal/file_action', $data);
                    }
                    // End file add
                else: // Download file
        $this->load->helper('download');
        $file = $this->db->where('file_id', $id)->get('files')->row();

        $fullpath = './resource/uploads/'.$file->file_name;
        if ($fullpath) {
            $data = file_get_contents($fullpath); // Read the file contents
                        force_download($file->file_name, $data);
        } else {
            Applib::go_to('companies/view/'.$file->client_id, 'error', lang('operation_failed'));
        }
        endif;
    }

    public function send_invoice($user = null)
    {
        $company = $this->uri->segment('4');

        if ($this->input->post()) {
            $lib = new Applib();
            $invoice_id = $this->input->post('invoice_id', true);
            $company = $this->input->post('company', true);
            $contact = $this->input->post('user', true);

            $info = Invoice::view_by_id($invoice_id);
            $client = Client::view_by_id($info->client);

            if ($contact > 0) {
                $login = '?login='.$this->tank_auth->create_remote_login($contact);
            } else {
                $login = ''; 
            }

            $amount = number_format(Invoice::get_invoice_due_amount($invoice_id), 2, config_item('decimal_separator'), config_item('thousand_separator'));

            $cur = App::currencies($info->currency)->symbol;

            $message = App::email_template('invoice_message', 'template_body');
            $subject = App::email_template('invoice_message', 'subject');
            $signature = App::email_template('email_signature', 'template_body');

            $logo_link = create_email_logo();

            $logo = str_replace('{INVOICE_LOGO}', $logo_link, $message);

            $client_name = str_replace('{CLIENT}', $client->company_name, $logo);
            $Ref = str_replace('{REF}', $info->reference_no, $client_name);
            $Amount = str_replace('{AMOUNT}', $amount, $Ref);
            $Currency = str_replace('{CURRENCY}', $cur, $Amount);
            $link = str_replace('{INVOICE_LINK}', base_url().'invoices/view/'.$invoice_id.$login, $Currency);
            $EmailSignature = str_replace('{SIGNATURE}', $signature, $link);
            $message = str_replace('{SITE_NAME}', config_item('company_name'), $EmailSignature);

            $this->_email_invoice($invoice_id, $message, $subject, $contact); // Email Invoice

                    $data = array('emailed' => 'Yes', 'date_sent' => date('Y-m-d H:i:s', time()));

            App::update('invoices', array('inv_id' => $invoice_id), $data);

                    // Log Activity
                    $activity = array(
                        'user' => User::get_id(),
                        'module' => 'invoices',
                        'module_field_id' => $invoice_id,
                        'activity' => 'activity_invoice_sent',
                        'icon' => 'fa-envelope',
                        'value1' => $info->reference_no,
                    );
            App::Log($activity);

            Applib::go_to($_SERVER['HTTP_REFERER'], 'success', lang('invoice_sent_successfully'));
        } else {
            $data['invoices'] = Invoice::get_client_invoices($company);
            $data['company'] = $company;
            $data['user'] = $user;
            $this->load->view('modal/email_invoice', $data);
        }
    }

    public function _email_invoice($invoice_id, $message, $subject, $contact)
    {
        $info = Invoice::view_by_id($invoice_id);

        $data['message'] = $message;

        $message = $this->load->view('email_template', $data, true);

        $params = array(
                    'recipient' => User::login_info($contact)->email,
                    'subject' => $subject,
                    'message' => $message,
                );

        $this->load->helper('file');
        $attach['inv_id'] = $invoice_id;
        if (config_item('pdf_engine') == 'invoicr') {
            $invoicehtml = modules::run('fopdf/attach_invoice', $attach);
        }
        if (config_item('pdf_engine') == 'mpdf') {
            $invoicehtml = modules::run('invoices/attach_pdf', $invoice_id);
        }

        $params['attached_file'] = './resource/tmp/'.lang('invoice').' '.$info->reference_no.'.pdf';
        $params['attachment_url'] = base_url().'resource/tmp/'.lang('invoice').' '.$info->reference_no.'.pdf';

        modules::run('fomailer/send_email', $params);
                //Delete invoice in tmp folder
                if (is_file('./resource/tmp/'.lang('invoice').' '.$info->reference_no.'.pdf')) {
                    unlink('./resource/tmp/'.lang('invoice').' '.$info->reference_no.'.pdf');
                }
    }

    public function make_primary()
    {
        $contact = $this->uri->segment(3);
        $company = $this->uri->segment(4);
        $this->db->set('primary_contact', $contact);
        $this->db->where('co_id', $company)->update('companies');
        $this->session->set_flashdata('response_status', 'success');
        $this->session->set_flashdata('message', lang('primary_contact_set'));
        redirect('companies/view/'.$company);
    }

    public function account()
    {
        $client = $this->db->where('co_id', $this->uri->segment(4))->get('companies')->result();
        $data['client'] = $client[0];
        $data['type'] = $this->uri->segment(3);
        $this->load->view('modal/account', isset($data) ? $data : null);
    }

            // Delete Company
    public function delete()
    {
        if ($this->input->post()) {
            $company = $this->input->post('company', true);

            Client::delete($company);

            $this->session->set_flashdata('response_status', 'success');
            $this->session->set_flashdata('message', lang('company_deleted_successfully'));
            redirect('companies');
        } else {
            $data['company_id'] = $this->uri->segment(3);
            $this->load->view('modal/delete', $data);
        }
    }
}
/* End of file contacts.php */
