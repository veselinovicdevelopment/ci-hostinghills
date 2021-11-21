<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Contact extends MX_Controller {

	function __construct()
	{
		parent::__construct();
	 
		$this->load->module('layouts');
        $this->load->library(array('template','form_validation','recaptcha', 'tank_auth'));  
        $this->load->helper('security');
        $this->load->model(array('App'));
	}

	function index()
	{
		   
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');  

        $data['use_recaptcha'] = (config_item('use_recaptcha') == 'TRUE') ? TRUE : TRUE;
        if (config_item('captcha_login') == 'TRUE') {
            if ($data['use_recaptcha'])
                $this->form_validation->set_rules('g-recaptcha-response', 'Confirmation Code', 'trim|xss_clean|required|callback__check_recaptcha');
            else
                $this->form_validation->set_rules('captcha', 'Confirmation Code', 'trim|xss_clean|required|callback__check_captcha');
        }
        $data['errors'] = array(); 
			
            if ($this->form_validation->run($this)) {								// validation ok
                 
                    $msg = $this->input->post('message');
					$msg = wordwrap($msg,50);
                    $sbj = $this->input->post('subject', true); 
		           
                if(mail(config_item('company_email'),$sbj,$msg))
                {
                  $this->session->set_flashdata('message', lang('message_sent'));                   
                }
                else {
                    $this->session->set_flashdata('message', lang('message_not_sent'));  
                }
                redirect('contact');                 
				} 
				
				else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
                }		 
			
            
                $data['show_captcha'] = FALSE;
                if(config_item('captcha_registration') == 'TRUE'){
                    $data['show_captcha'] = TRUE;
                    if ($data['use_recaptcha']) {
                         $data['recaptcha_html'] = $this->_create_recaptcha();
                    } else {
                        $data['captcha_html'] = $this->_create_captcha();
                    }
                }
    ;
            $this->load->module('layouts');
            $this->load->library('template');
            $this->template->set_theme(config_item('active_theme'));
            $this->template->set_partial('header', 'sections/header');
            $this->template->set_partial('footer', 'sections/footer');
            $this->template->set_layout('main')->build('contact', isset($data) ? $data : NULL);

		}
		


 
    /**
     * Create CAPTCHA image to verify user as a human
     *
     * @return	string
     */
    function _create_captcha()
    {
        $this->load->helper('captcha');

        $cap = create_captcha(array(
            'img_path'		=> FCPATH.'resource/captcha/',
            'img_url'		=> base_url().config_item('captcha_path'),
            'font_path'		=> FCPATH.'resource/captcha.fonts/4.ttf',
            'font_size'		=> config_item('captcha_font_size'),
            'img_width'		=> config_item('captcha_width'),
            'img_height'	=> config_item('captcha_height'),
            'show_grid'		=> config_item('captcha_grid'),
            'expiration'	=> config_item('captcha_expire'),
        ));

        // Save captcha params in database
        $data = array(
            'captcha_time' => time(),
            'ip_address' => $this->input->ip_address(),
            'word' => $cap['word']
        );
        $query = $this->db->insert_string('hd_captcha', $data);
        $this->db->query($query);

        return $cap['image'];
    }

    /**
     * Callback function. Check if CAPTCHA test is passed.
     *
     * @param	string
     * @return	bool
     */
    function _check_captcha()
    {
        // First, delete old captchas
        $expiration = time() - config_item('captcha_expire');
        $this->db->query("DELETE FROM hd_captcha WHERE captcha_time < ".$expiration);

        // Then see if a captcha exists:
        $sql = "SELECT COUNT(*) AS count FROM hd_captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
        $binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();

        if ($row->count == 0){

            $this->form_validation->set_message('_check_captcha', lang('auth_incorrect_captcha'));
            return FALSE;
        }else{
            return TRUE;
        }
    }

    /**
     * Create reCAPTCHA JS and non-JS HTML to verify user as a human
     *
     * @return	string
     */
    function _create_recaptcha()
    {
        $this->load->helper('recaptcha');

        // Add custom theme so we can get only image
        $options = "<script>var RecaptchaOptions = {theme: 'custom', custom_theme_widget: 'recaptcha_widget'};</script>\n";

        // Get reCAPTCHA JS and non-JS HTML
        $html = recaptcha_get_html(config_item('recaptcha_public_key'));

        return $options.$html;
    }

    /**
     * Callback function. Check if reCAPTCHA test is passed.
     *
     * @return	bool
     */
    function _check_recaptcha()
    {
      // Catch the user's answer
      $captcha_answer = $this->input->post('g-recaptcha-response');
      // Verify user's answer
      $response = $this->recaptcha->verifyResponse($captcha_answer);
      // Processing ...
      if ($response['success']) {
          return TRUE;
      } else {
          // Something goes wrong
          $this->form_validation->set_message('_check_recaptcha', $this->lang->line('auth_incorrect_captcha'));
          return FALSE;
      }
    }

}

/* End of file contact.php */
