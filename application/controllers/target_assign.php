<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Target_assign extends CI_Controller {

    public function index() {

        $userid=$this->session->userdata('user_id');

        $this->load->model('registration_model');
        $data['usergetArr']=$this->registration_model->get_child_user($userid);

        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
        $this->load->view('target_assign_view',$data);
        $this->load->view('common/footer_view');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */