<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kpi_approve extends CI_Controller {

    public function index() {
        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
        $this->load->view('kpi_approve_view');
        $this->load->view('common/footer_view');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */