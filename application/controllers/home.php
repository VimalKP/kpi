<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        
//        print_r($this->session->all_userdata());
        
//        $data['data'] = $this->registration_model->get_user($this->session->userdata('user_id_fk'));
        
         
        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
        $this->load->view('home_view');
        
        $this->load->view('common/footer_view');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */