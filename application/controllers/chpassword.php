<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chpassword extends CI_Controller {

    public function index() {
        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
        $this->load->view('chpassword_view');
        $this->load->view('common/footer_view');
    }

}

?>
