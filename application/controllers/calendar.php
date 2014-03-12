<?php

class Calendar extends CI_Controller {

    public function index() {
        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
        $this->load->view('calendar_view');
        $this->load->view('common/footer_view');
    }

}

?>
