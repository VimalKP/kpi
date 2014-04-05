<?php

class Holiday extends CI_Controller {

    public function index() {
        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
        $this->load->view('holiday_view');
        $this->load->view('common/footer_view');
    }

}

?>
