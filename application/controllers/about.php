<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About extends CI_Controller {

    public function index() {
        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
        $this->load->view('about_us_view');
        $this->load->view('common/footer_view');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */