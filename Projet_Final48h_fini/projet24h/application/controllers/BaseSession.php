<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BaseSession extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        
        if(!$this->session->has_userdata('user')){
            redirect('Auth/index');
        }
    }

}
?>
