<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends CI_Controller {

    public function index() {
        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
        $this->load->view('register_view');
        $this->load->view('common/footer_view');
    }

    public function reg() {
        $postArr = $this->input->post();

        $this->load->helper(array('form'));
        $this->load->library('form_validation');


        $this->form_validation->set_rules('firstname', 'Firstname', 'required');
        $this->form_validation->set_rules('lastname', 'Lastname', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[20]|is_unique[registration.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[20]|matches[cpassword]');
        $this->form_validation->set_rules('cpassword', 'Re-Password', 'required');
        $this->form_validation->set_rules('email_id', 'Email', 'required|valid_email|is_unique[registration.email_id]');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|min_length[10]|numeric');
        $this->form_validation->set_rules('birthdate', 'Birthdate', 'required');

//        var_dump($this->form_validation->run());
//        exit();

        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('register_view');
            $this->load->view('common/footer_view');
            
        } else {
            $this->load->model('register_model');
            $this->register_model->insertdata($postArr);

            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('login_view');
            $this->load->view('common/footer_view');
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */