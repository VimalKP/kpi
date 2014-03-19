<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kpi_entry extends CI_Controller {

    public function index() {
//        if ($this->session->userdata('user_type_id_fk') != 2) {
//            // if session running then redirect to home page.
//            // if session expired then go to login
//            $this->load->view('common/header_view');
//            $this->load->view('common/sidebar_view');
//
//            $this->load->view('login_view');
//            $this->load->view('common/footer_view');
//        } else {
        $user_id = $this->session->userdata('user_id');
        $this->load->model('entry_kpi_model');
        $data['data'] = $this->entry_kpi_model->getentrydetail($user_id);


        $data['get_target'] = $this->entry_kpi_model->get_assign_target($user_id);
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        exit();
        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');

        $this->load->view('kpi_entry_view', $data);
        $this->load->view('common/footer_view');
    }

}