<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrasi extends CI_Controller {
	
	public function index()
	{
		// load the session library
		$this->load->library('session');
		$this->load->helper(array('captcha','url'));
 
        // if form was submitted and given captcha word matches one in session
        if ($this->input->post() && ($this->input->post('secutity_code') == $this->session->userdata('mycaptcha'))) {
			$this->load->view('berhasil.php');
        }
		else
		{
            // load codeigniter captcha helper
            $this->load->helper('captcha');
 
            $vals = array(
                'img_path'	 => './captcha/',
                'img_url'	 => base_url().'captcha/',
                'img_width'	 => '200',
                'img_height' => 30,
                'border' => 0, 
                'expiration' => 7200
            );
 
            // create captcha image
            $cap = create_captcha($vals);
 
            // store image html code in a variable
            $data['image'] = $cap['image'];
 
            // store the captcha word in a session
            $this->session->set_userdata('mycaptcha', $cap['word']);
 
            $t
            his->load->view('registrasi_view.php', $data);
 
        }
	}
}
