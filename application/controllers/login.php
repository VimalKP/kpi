<?php

//if (!defined('BASEPATH'))
//    exit('No direct script access allowed');

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

            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('login_view', $data);
            $this->load->view('common/footer_view');
        } else {


            $this->load->model('registration_model');
//            $username = $this->input->post('username');
//            $password = $this->input->post('password');
            $out = $this->registration_model->select($loginValues);
            if ($out == null) {
                $data['error'] = "Invalid username or password.";

                $this->load->view('common/header_view');
                $this->load->view('common/sidebar_view');
                $this->load->view('login_view', $data);
                $this->load->view('common/footer_view');
            } else {
                if (count($out) > 0) {
//                    $this->session->set_userdata($out[0]);
//                    print_r($out[0]);
////                    print_r($out[0]->username);
//                    exit();

                    $newdata = array(
                        'user_id' => $out[0]->user_id,
                        'parent_id' => $out[0]->parent_id,
                        'username' => $out[0]->username,
                        'user_type_id_fk' => $out[0]->user_type_id_fk,
                        'company_id' => $out[0]->company_id, 
                        'profile_image' => $out[0]->profile_image  
                    );

                    $this->session->set_userdata($newdata);
                    
//                    $this->session->all_userdata();
                    
//                    print_r( $this->session->all_userdata());
//                    print_r( $this->session->all_userdata());
//                    exit();

                    $this->load->model('Company_detail_model');
                    $data['data'] = $this->Company_detail_model->getcompanydetail(1);

//                    $this->session->userdata('username');
                    if ($this->session->userdata('user_type_id_fk') != 1) {
                        // if session running then redirect to home page.
                        // if session expired then go to login
                        $this->load->view('common/header_view');
                        $this->load->view('common/sidebar_view');
                        $this->load->view('home_view');
                        $this->load->view('common/footer_view');
                    } else {
                        $this->load->view('common/header_view');
                        $this->load->view('common/sidebar_view');
                        $this->load->view("home_view");
                        $this->load->view('common/footer_view');
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

    public function logout()
    {
//        $this->session->unset_userdata($newdata);

        $this->session->unset_userdata('user_type_id_fk');


        $this->load->view('common/header_view');
                $this->load->view('common/sidebar_view');
                $this->load->view('login_view');
                $this->load->view('common/footer_view');
    }






}
