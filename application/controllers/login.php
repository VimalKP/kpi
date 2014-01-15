<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
        $this->load->view('login_view');
        $this->load->view('common/footer_view');
    }

    public function dologin() {
        $loginValues = $this->input->post();
        $this->load->helper(array('form'));
        $this->load->library('form_validation');


        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = "";
            $this->load->view("login_view", $data);
        } else {
            $this->load->model('register_model');
//            $username = $this->input->post('username');
//            $password = $this->input->post('password');
            $out = $this->register_model->select($loginValues);
            if ($out == null) {
                $data['error'] = "Invalid username or password.";
//                $this->load->view('common/header_view');
                $this->load->view('login_view', $data);
//                $this->load->view('common/footer_view');
            } else {
                if (count($out) > 0) {
                    $this->load->view("create_kpi_view");
                }
            }
        }
//        if (count($out) > 0) {
//            $this->load->view("create_kpi_view");
//        } else {
//            $this->load->view("login_view", $data);
//            echo 'username or password not valid';
//        }
//        exit();
//        $this->load->view("create_kpi_view");
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */